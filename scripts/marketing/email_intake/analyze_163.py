#!/usr/bin/env python3
"""只读抓取 163 邮箱并生成不含原始正文的询盘候选快照。"""

from __future__ import annotations

import argparse
import csv
import ctypes
import hashlib
import html
import imaplib
import json
import os
import re
import ssl
import sys
from collections import Counter
from ctypes import wintypes
from dataclasses import asdict, dataclass
from datetime import date, datetime, timedelta, timezone
from email import policy
from email.header import decode_header, make_header
from email.parser import BytesParser
from email.utils import parsedate_to_datetime, parseaddr
from html.parser import HTMLParser
from pathlib import Path
from typing import Any, Iterable
from zoneinfo import ZoneInfo


APP_DIR = Path(os.environ.get("LOCALAPPDATA", Path.home() / "AppData" / "Local")) / "Athletik" / "mail-intake"
CONFIG_PATH = APP_DIR / "config.json"
SECRET_PATH = APP_DIR / "secret.dpapi"
DEFAULT_OUTPUT_DIR = APP_DIR / "output"

INQUIRY_TERMS: dict[str, int] = {
    "request for quote": 5,
    "request a quote": 5,
    "quotation": 4,
    "inquiry": 3,
    "enquiry": 3,
    "minimum order": 3,
    "moq": 3,
    "tech pack": 3,
    "private label": 3,
    "manufacturer": 2,
    "manufacturing": 2,
    "supplier": 2,
    "factory": 2,
    "oem": 2,
    "odm": 2,
    "custom apparel": 2,
    "custom clothing": 2,
    "sample": 1,
    "pricing": 1,
    "price": 1,
}

PRODUCT_TERMS: dict[str, tuple[str, ...]] = {
    "sportswear": ("sportswear", "activewear", "gym wear", "fitness wear", "cycling jersey", "teamwear"),
    "underwear": ("underwear", "briefs", "boxers", "lingerie"),
    "outdoor-clothing": ("outdoor clothing", "outdoor apparel", "jacket", "hoodie", "base layer"),
    "merino-wool": ("merino", "wool apparel", "wool base layer"),
    "silk-wear": ("silk wear", "silkwear", "silk garment"),
    "knitted-fabrics": ("knitted fabric", "knit fabric", "fabric development"),
    "sports-accessories": ("sports accessories", "arm sleeve", "headband", "sports bag"),
}

VENDOR_TERMS: dict[str, int] = {
    "seo service": 5,
    "seo proposal": 5,
    "guest post": 5,
    "backlink": 5,
    "link building": 5,
    "website design": 5,
    "web development": 5,
    "digital marketing": 5,
    "lead generation service": 5,
    "email marketing service": 5,
    "social media marketing": 5,
    "domain for sale": 5,
    "buy this domain": 5,
    "contact database": 4,
    "business loan": 4,
    "investment opportunity": 4,
}

COUNTRY_TERMS: dict[str, tuple[str, ...]] = {
    "United States": ("united states", "u.s.a.", "usa"),
    "Canada": ("canada",),
    "United Kingdom": ("united kingdom", "u.k.", "england", "scotland", "wales"),
    "Australia": ("australia",),
    "New Zealand": ("new zealand",),
    "Germany": ("germany",),
    "France": ("france",),
    "Italy": ("italy",),
    "Spain": ("spain",),
    "Netherlands": ("netherlands",),
    "Sweden": ("sweden",),
    "Norway": ("norway",),
    "Denmark": ("denmark",),
    "China": ("china",),
    "Japan": ("japan",),
    "South Korea": ("south korea", "korea"),
}

QUANTITY_PATTERN = re.compile(
    r"(?<![\w.])([1-9]\d{0,2}(?:[,.]\d{3})*|[1-9]\d{0,6})\s*"
    r"(pcs?|pieces?|units?|sets?|garments?|items?)\b",
    re.IGNORECASE,
)


class _HTMLTextExtractor(HTMLParser):
    def __init__(self) -> None:
        super().__init__()
        self.parts: list[str] = []
        self.suppressed_depth = 0

    def handle_starttag(self, tag: str, attrs: list[tuple[str, str | None]]) -> None:
        if tag in {"script", "style"}:
            self.suppressed_depth += 1
        elif tag in {"br", "p", "div", "li", "tr"}:
            self.parts.append("\n")

    def handle_endtag(self, tag: str) -> None:
        if tag in {"script", "style"} and self.suppressed_depth:
            self.suppressed_depth -= 1
        elif tag in {"p", "div", "li", "tr"}:
            self.parts.append("\n")

    def handle_data(self, data: str) -> None:
        if not self.suppressed_depth:
            self.parts.append(data)

    def text(self) -> str:
        return re.sub(r"\n{3,}", "\n\n", html.unescape("".join(self.parts))).strip()


@dataclass(frozen=True)
class Window:
    name: str
    start: date
    end: date


@dataclass
class MailRecord:
    message_key: str
    received_at: str
    sender_domain: str
    classification: str
    inquiry_score: int
    vendor_score: int
    quantity_mentions: list[int]
    max_quantity_mention: int | None
    moq_signal: str
    product_mentions: list[str]
    country_mentions: list[str]
    source_signal: str
    needs_manual_review: bool


def _decode_header(value: str | None) -> str:
    if not value:
        return ""
    try:
        return str(make_header(decode_header(value)))
    except (LookupError, UnicodeError, ValueError):
        return value


def _html_to_text(value: str) -> str:
    parser = _HTMLTextExtractor()
    parser.feed(value)
    return parser.text()


def _part_text(part: Any) -> str:
    try:
        content = part.get_content()
        return content if isinstance(content, str) else ""
    except (LookupError, UnicodeError):
        payload = part.get_payload(decode=True)
        if not isinstance(payload, bytes):
            return ""
        charset = part.get_content_charset() or "utf-8"
        return payload.decode(charset, errors="replace")


def extract_message_text(message: Any) -> str:
    plain_parts: list[str] = []
    html_parts: list[str] = []
    parts = message.walk() if message.is_multipart() else (message,)

    for part in parts:
        if part.is_multipart() or part.get_content_disposition() == "attachment":
            continue
        content_type = part.get_content_type()
        if content_type not in {"text/plain", "text/html"}:
            continue
        value = _part_text(part)
        if content_type == "text/plain":
            plain_parts.append(value)
        else:
            html_parts.append(_html_to_text(value))

    selected = plain_parts or html_parts
    return "\n".join(selected)[:100_000]


def _term_score(text: str, terms: dict[str, int]) -> int:
    return sum(weight for term, weight in terms.items() if term in text)


def _mentions(text: str, groups: dict[str, tuple[str, ...]]) -> list[str]:
    return sorted(label for label, terms in groups.items() if any(term in text for term in terms))


def extract_quantities(text: str) -> list[int]:
    quantities: list[int] = []
    for match in QUANTITY_PATTERN.finditer(text):
        raw = match.group(1).replace(",", "").replace(".", "")
        try:
            value = int(raw)
        except ValueError:
            continue
        if 0 < value <= 1_000_000:
            quantities.append(value)
    return sorted(set(quantities))


def detect_source_signal(text: str) -> str:
    google_patterns = (
        "google ads",
        "google search",
        "found you on google",
        "found your company on google",
        "searched on google",
    )
    if any(pattern in text for pattern in google_patterns):
        return "self_reported_google"
    web_patterns = ("found your website", "came across your website", "online search")
    if any(pattern in text for pattern in web_patterns):
        return "self_reported_web_unspecified"
    return "unknown"


def classify_message(subject: str, body: str, minimum_order_quantity: int = 500) -> dict[str, Any]:
    normalized = re.sub(r"\s+", " ", f"{subject}\n{body}".lower())
    quantities = extract_quantities(normalized)
    products = _mentions(normalized, PRODUCT_TERMS)
    countries = _mentions(normalized, COUNTRY_TERMS)
    inquiry_score = _term_score(normalized, INQUIRY_TERMS)
    vendor_score = _term_score(normalized, VENDOR_TERMS)

    if quantities:
        inquiry_score += 2
    if products:
        inquiry_score += 2
    if "unsubscribe" in normalized and not quantities:
        vendor_score += 2

    if vendor_score >= 5 and vendor_score >= inquiry_score:
        classification = "vendor_or_spam"
        needs_review = False
    elif inquiry_score >= 5:
        classification = "inquiry_candidate"
        needs_review = True
    elif inquiry_score >= 2 or vendor_score >= 2:
        classification = "needs_review"
        needs_review = True
    else:
        classification = "other"
        needs_review = False

    max_quantity = max(quantities) if quantities else None
    if max_quantity is None:
        moq_signal = "unknown"
    elif max_quantity >= minimum_order_quantity:
        moq_signal = "meets_or_exceeds_moq_mention"
    else:
        moq_signal = "below_moq_mention"

    return {
        "classification": classification,
        "inquiry_score": inquiry_score,
        "vendor_score": vendor_score,
        "quantity_mentions": quantities,
        "max_quantity_mention": max_quantity,
        "moq_signal": moq_signal,
        "product_mentions": products,
        "country_mentions": countries,
        "source_signal": detect_source_signal(normalized),
        "needs_manual_review": needs_review,
    }


def report_windows(as_of: date) -> tuple[Window, Window]:
    recent_end = as_of - timedelta(days=1)
    recent_start = recent_end - timedelta(days=29)
    previous_end = recent_start - timedelta(days=1)
    previous_start = previous_end - timedelta(days=29)
    return (
        Window("recent_30_days", recent_start, recent_end),
        Window("previous_30_days", previous_start, previous_end),
    )


def _dpapi_unprotect(ciphertext: bytes) -> str:
    if os.name != "nt":
        raise RuntimeError("DPAPI 凭据只能在创建它的 Windows 用户下解密。")

    class DataBlob(ctypes.Structure):
        _fields_ = [("cbData", wintypes.DWORD), ("pbData", ctypes.POINTER(ctypes.c_byte))]

    buffer = ctypes.create_string_buffer(ciphertext, len(ciphertext))
    input_blob = DataBlob(len(ciphertext), ctypes.cast(buffer, ctypes.POINTER(ctypes.c_byte)))
    output_blob = DataBlob()
    crypt32 = ctypes.windll.crypt32
    kernel32 = ctypes.windll.kernel32
    crypt32.CryptUnprotectData.argtypes = [
        ctypes.POINTER(DataBlob),
        ctypes.c_void_p,
        ctypes.POINTER(DataBlob),
        ctypes.c_void_p,
        ctypes.c_void_p,
        wintypes.DWORD,
        ctypes.POINTER(DataBlob),
    ]
    crypt32.CryptUnprotectData.restype = wintypes.BOOL
    kernel32.LocalFree.argtypes = [ctypes.c_void_p]
    kernel32.LocalFree.restype = ctypes.c_void_p

    if not crypt32.CryptUnprotectData(
        ctypes.byref(input_blob), None, None, None, None, 0, ctypes.byref(output_blob)
    ):
        raise ctypes.WinError()

    try:
        plaintext = ctypes.string_at(output_blob.pbData, output_blob.cbData)
        return plaintext.decode("utf-8")
    finally:
        kernel32.LocalFree(ctypes.cast(output_blob.pbData, ctypes.c_void_p))


def load_config() -> dict[str, Any]:
    if not CONFIG_PATH.exists() or not SECRET_PATH.exists():
        raise FileNotFoundError(
            f"尚未完成本机配置。请先运行 setup-163.ps1。配置目录：{APP_DIR}"
        )
    config = json.loads(CONFIG_PATH.read_text(encoding="utf-8"))
    required = {"email", "imap_host", "imap_port", "report_timezone", "minimum_order_quantity"}
    missing = sorted(required - config.keys())
    if missing:
        raise ValueError(f"config.json 缺少字段：{', '.join(missing)}")
    if not str(config["email"]).lower().endswith("@163.com"):
        raise ValueError("首版仅支持普通 @163.com 邮箱。")
    return config


def _message_datetime(message: Any, report_tz: ZoneInfo) -> datetime | None:
    raw_date = message.get("Date")
    if not raw_date:
        return None
    try:
        parsed = parsedate_to_datetime(raw_date)
    except (TypeError, ValueError, OverflowError):
        return None
    if parsed.tzinfo is None:
        parsed = parsed.replace(tzinfo=timezone.utc)
    return parsed.astimezone(report_tz)


def _message_key(message: Any, received_at: datetime, sender: str, subject: str) -> str:
    source = message.get("Message-ID") or f"{received_at.isoformat()}|{sender}|{subject}"
    return hashlib.sha256(str(source).encode("utf-8", errors="replace")).hexdigest()[:20]


def parse_mail(raw_message: bytes, config: dict[str, Any]) -> MailRecord | None:
    message = BytesParser(policy=policy.default).parsebytes(raw_message)
    report_tz = ZoneInfo(config["report_timezone"])
    received_at = _message_datetime(message, report_tz)
    if received_at is None:
        return None

    subject = _decode_header(message.get("Subject"))
    sender_header = _decode_header(message.get("From"))
    sender_address = parseaddr(sender_header)[1].strip().lower()
    own_address = str(config["email"]).strip().lower()
    if sender_address == own_address:
        return None

    sender_domain = sender_address.rsplit("@", 1)[1] if "@" in sender_address else "unknown"
    body = extract_message_text(message)
    result = classify_message(subject, body, int(config["minimum_order_quantity"]))
    return MailRecord(
        message_key=_message_key(message, received_at, sender_address, subject),
        received_at=received_at.isoformat(),
        sender_domain=sender_domain,
        **result,
    )


def _connect(config: dict[str, Any], secret: str) -> imaplib.IMAP4_SSL:
    context = ssl.create_default_context()
    client = imaplib.IMAP4_SSL(
        str(config["imap_host"]), int(config["imap_port"]), ssl_context=context, timeout=30
    )
    try:
        client.login(str(config["email"]), secret)
        status, _ = client.select(str(config.get("mailbox", "INBOX")), readonly=True)
        if status != "OK":
            raise RuntimeError("无法以只读模式打开 INBOX。")
        return client
    except Exception:
        try:
            client.logout()
        except Exception:
            pass
        raise


def check_connection(config: dict[str, Any], secret: str) -> None:
    client = _connect(config, secret)
    try:
        print("连接成功：已以只读模式打开 INBOX；未抓取、发送、删除或移动邮件。")
    finally:
        client.logout()


def fetch_records(config: dict[str, Any], secret: str, since: date) -> tuple[list[MailRecord], int]:
    client = _connect(config, secret)
    records: list[MailRecord] = []
    parse_gaps = 0
    try:
        since_token = since.strftime("%d-%b-%Y")
        status, response = client.uid("search", None, "SINCE", since_token)
        if status != "OK":
            raise RuntimeError("IMAP 搜索失败。")
        uids = response[0].split() if response and response[0] else []
        for uid in uids:
            status, payload = client.uid("fetch", uid, "(BODY.PEEK[])")
            if status != "OK":
                parse_gaps += 1
                continue
            raw = next(
                (item[1] for item in payload if isinstance(item, tuple) and isinstance(item[1], bytes)),
                None,
            )
            if raw is None:
                parse_gaps += 1
                continue
            try:
                record = parse_mail(raw, config)
            except Exception:
                parse_gaps += 1
                continue
            if record is not None:
                records.append(record)
    finally:
        client.logout()
    return records, parse_gaps


def _record_date(record: MailRecord, report_tz: ZoneInfo) -> date:
    return datetime.fromisoformat(record.received_at).astimezone(report_tz).date()


def _records_in_window(records: Iterable[MailRecord], window: Window, report_tz: ZoneInfo) -> list[MailRecord]:
    return [record for record in records if window.start <= _record_date(record, report_tz) <= window.end]


def summarize_window(records: list[MailRecord], window: Window, report_tz: ZoneInfo) -> dict[str, Any]:
    selected = _records_in_window(records, window, report_tz)
    inquiries = [record for record in selected if record.classification == "inquiry_candidate"]
    return {
        "window": asdict(window),
        "emails_read": len(selected),
        "inquiry_candidates": len(inquiries),
        "vendor_or_spam": sum(record.classification == "vendor_or_spam" for record in selected),
        "needs_review": sum(record.needs_manual_review for record in selected),
        "moq_meets_or_exceeds_mentions": sum(
            record.moq_signal == "meets_or_exceeds_moq_mention" for record in inquiries
        ),
        "below_moq_mentions": sum(record.moq_signal == "below_moq_mention" for record in inquiries),
        "moq_unknown": sum(record.moq_signal == "unknown" for record in inquiries),
        "self_reported_google": sum(record.source_signal == "self_reported_google" for record in inquiries),
        "source_unknown": sum(record.source_signal == "unknown" for record in inquiries),
        "product_mentions": dict(Counter(tag for record in inquiries for tag in record.product_mentions)),
        "country_mentions": dict(Counter(tag for record in inquiries for tag in record.country_mentions)),
    }


def _json_default(value: Any) -> Any:
    if isinstance(value, date):
        return value.isoformat()
    raise TypeError(f"Object of type {type(value).__name__} is not JSON serializable")


def _markdown_report(summary: dict[str, Any]) -> str:
    recent, previous = summary["windows"]
    lines = [
        "# 163 邮箱询盘候选快照",
        "",
        f"> 生成时间：{summary['generated_at']}",
        f"> 报告时区：`{summary['report_timezone']}`",
        "> 数据方式：IMAP SSL，只读 `INBOX`，使用 `BODY.PEEK[]`",
        "> 隐私：未保存原始正文、完整发件地址或附件",
        "",
        "## 两个 30 天窗口",
        "",
        "| 指标 | 此前 30 天 | 最近 30 天 |",
        "|---|---:|---:|",
    ]
    rows = (
        ("收到邮件", "emails_read"),
        ("询盘候选（未人工确认）", "inquiry_candidates"),
        ("推销/垃圾候选", "vendor_or_spam"),
        ("需要人工复核", "needs_review"),
        ("邮件明确数量达到 MOQ", "moq_meets_or_exceeds_mentions"),
        ("邮件明确数量低于 MOQ", "below_moq_mentions"),
        ("MOQ 未知", "moq_unknown"),
        ("明确自述来自 Google", "self_reported_google"),
        ("来源未知", "source_unknown"),
    )
    for label, key in rows:
        lines.append(f"| {label} | {previous[key]} | {recent[key]} |")
    lines.extend(
        [
            "",
            "## 证据边界",
            "",
            "- `inquiry_candidate` 只是规则筛选结果，不能替代人工确认。",
            "- 数量字段只代表邮件中出现的最大数量，不证明是每款数量或最终订单数量。",
            "- 国家字段只记录正文明确提及项，不根据邮箱后缀、IP 或语言推断。",
            "- 只有发件人明确提及 Google 才记录 `self_reported_google`；其余来源为 `unknown`。",
            "- 本报告不能将邮件询盘因果归因给 Google Ads；需要 UTM/GCLID/CRM 才能建立可靠广告归因。",
            f"- 无法解析或读取的邮件数：{summary['parse_gaps']}。",
            "",
        ]
    )
    return "\n".join(lines)


def write_outputs(
    records: list[MailRecord], config: dict[str, Any], windows: tuple[Window, Window], parse_gaps: int
) -> Path:
    output_dir = Path(config.get("output_dir", DEFAULT_OUTPUT_DIR))
    output_dir.mkdir(parents=True, exist_ok=True)
    report_tz = ZoneInfo(config["report_timezone"])
    filtered = [
        record
        for record in records
        if windows[1].start <= _record_date(record, report_tz) <= windows[0].end
    ]
    filtered.sort(key=lambda record: record.received_at, reverse=True)
    summary = {
        "generated_at": datetime.now(report_tz).isoformat(),
        "report_timezone": config["report_timezone"],
        "parse_gaps": parse_gaps,
        "windows": [summarize_window(records, window, report_tz) for window in windows],
    }

    summary_path = output_dir / "latest-summary.json"
    summary_path.write_text(
        json.dumps(summary, ensure_ascii=False, indent=2, default=_json_default) + "\n",
        encoding="utf-8",
    )
    (output_dir / "latest-report.md").write_text(_markdown_report(summary), encoding="utf-8")

    fieldnames = [field.name for field in MailRecord.__dataclass_fields__.values()]
    with (output_dir / "latest-records.csv").open("w", encoding="utf-8-sig", newline="") as handle:
        writer = csv.DictWriter(handle, fieldnames=fieldnames)
        writer.writeheader()
        for record in filtered:
            row = asdict(record)
            for key in ("quantity_mentions", "product_mentions", "country_mentions"):
                row[key] = ";".join(str(value) for value in row[key])
            writer.writerow(row)
    return output_dir


def build_parser() -> argparse.ArgumentParser:
    parser = argparse.ArgumentParser(description=__doc__)
    subparsers = parser.add_subparsers(dest="command", required=True)
    subparsers.add_parser("check", help="验证登录并以只读模式打开 INBOX，不抓取邮件")
    analyze = subparsers.add_parser("analyze", help="生成最近30天和此前30天询盘候选快照")
    analyze.add_argument(
        "--as-of",
        type=date.fromisoformat,
        help="报告生成日，YYYY-MM-DD；默认使用报告时区的今天，并排除当天",
    )
    return parser


def main(argv: list[str] | None = None) -> int:
    args = build_parser().parse_args(argv)
    try:
        config = load_config()
        secret = _dpapi_unprotect(SECRET_PATH.read_bytes())
        if args.command == "check":
            check_connection(config, secret)
            return 0

        report_tz = ZoneInfo(config["report_timezone"])
        as_of = args.as_of or datetime.now(report_tz).date()
        recent, previous = report_windows(as_of)
        records, parse_gaps = fetch_records(config, secret, previous.start - timedelta(days=1))
        output_dir = write_outputs(records, config, (recent, previous), parse_gaps)
        print(f"分析完成：{output_dir}")
        print("结果为询盘候选快照；请人工复核，不要直接作为 Google Ads 归因结论。")
        return 0
    except (FileNotFoundError, ValueError, RuntimeError, imaplib.IMAP4.error, OSError) as exc:
        print(f"错误：{exc}", file=sys.stderr)
        return 1


if __name__ == "__main__":
    raise SystemExit(main())
