import importlib.util
import json
import sys
import tempfile
import unittest
from datetime import date
from email.message import EmailMessage
from pathlib import Path


MODULE_PATH = Path(__file__).resolve().parents[1] / "analyze_163.py"
SPEC = importlib.util.spec_from_file_location("analyze_163", MODULE_PATH)
assert SPEC and SPEC.loader
MODULE = importlib.util.module_from_spec(SPEC)
sys.modules[SPEC.name] = MODULE
SPEC.loader.exec_module(MODULE)


class ClassificationTests(unittest.TestCase):
    def test_manufacturing_inquiry_with_moq(self):
        result = MODULE.classify_message(
            "Request for quotation",
            "We need a private label activewear manufacturer for 800 pieces.",
        )
        self.assertEqual(result["classification"], "inquiry_candidate")
        self.assertEqual(result["moq_signal"], "meets_or_exceeds_moq_mention")
        self.assertIn("sportswear", result["product_mentions"])

    def test_vendor_pitch_is_not_inquiry(self):
        result = MODULE.classify_message(
            "SEO proposal",
            "We provide SEO service, guest post and backlink packages for your website.",
        )
        self.assertEqual(result["classification"], "vendor_or_spam")

    def test_google_source_requires_explicit_statement(self):
        explicit = MODULE.classify_message(
            "Apparel enquiry",
            "I found your company on Google and need 600 pcs sportswear.",
        )
        generic = MODULE.classify_message(
            "Apparel enquiry",
            "I found your website and need 600 pcs sportswear.",
        )
        self.assertEqual(explicit["source_signal"], "self_reported_google")
        self.assertEqual(generic["source_signal"], "self_reported_web_unspecified")

    def test_largest_explicit_quantity_sets_moq_signal(self):
        result = MODULE.classify_message(
            "Sample and order",
            "First 3 pieces as samples, then 1,000 units for the order.",
        )
        self.assertEqual(result["quantity_mentions"], [3, 1000])
        self.assertEqual(result["max_quantity_mention"], 1000)
        self.assertEqual(result["moq_signal"], "meets_or_exceeds_moq_mention")

    def test_total_quantity_range_extracts_both_bounds(self):
        result = MODULE.classify_message(
            "Manufacturing enquiry",
            "Our initial order may be approximately 1,500–2,500 total pieces across several designs.",
        )
        self.assertEqual(result["quantity_mentions"], [1500, 2500])
        self.assertEqual(result["moq_signal"], "meets_or_exceeds_moq_mention")

    def test_supplier_pitch_is_vendor_not_buyer(self):
        result = MODULE.classify_message(
            "Custom sportswear",
            "We are a factory specialized in sportswear, activewear, hoodies and gym wear. "
            "Our sales rep can send our catalogue and quotation.",
        )
        self.assertEqual(result["classification"], "vendor_or_spam")

    def test_website_quotation_pitch_is_vendor(self):
        result = MODULE.classify_message(
            "Re: Cost",
            "Can I share the website overview and quotation?",
        )
        self.assertEqual(result["classification"], "vendor_or_spam")

    def test_online_contact_source_is_not_google(self):
        result = MODULE.classify_message(
            "Product inquiry",
            "I found your business contact online and need a custom apparel producer.",
        )
        self.assertEqual(result["source_signal"], "self_reported_web_unspecified")


class ParsingTests(unittest.TestCase):
    def test_html_message_prefers_plain_text(self):
        message = EmailMessage()
        message.set_content("Plain inquiry body")
        message.add_alternative("<p>HTML inquiry body</p>", subtype="html")
        self.assertEqual(MODULE.extract_message_text(message).strip(), "Plain inquiry body")

    def test_two_complete_windows_exclude_as_of_day(self):
        recent, previous = MODULE.report_windows(date(2026, 9, 24))
        self.assertEqual((recent.start, recent.end), (date(2026, 8, 25), date(2026, 9, 23)))
        self.assertEqual((previous.start, previous.end), (date(2026, 7, 26), date(2026, 8, 24)))

    def test_output_contains_only_extracted_fields(self):
        recent, previous = MODULE.report_windows(date(2026, 9, 24))
        record = MODULE.MailRecord(
            message_key="sample-hash",
            received_at="2026-09-01T12:00:00-04:00",
            sender_domain="example.com",
            mailbox_role="junk",
            classification="inquiry_candidate",
            inquiry_score=9,
            vendor_score=0,
            quantity_mentions=[800],
            max_quantity_mention=800,
            moq_signal="meets_or_exceeds_moq_mention",
            product_mentions=["sportswear"],
            country_mentions=["United States"],
            source_signal="unknown",
            needs_manual_review=True,
        )
        with tempfile.TemporaryDirectory() as temporary_directory:
            config = {
                "report_timezone": "America/New_York",
                "output_dir": temporary_directory,
                "mailbox_roles": ["inbox", "junk", "trash"],
            }
            output_dir = MODULE.write_outputs(
                [record], config, (recent, previous), 0, ("inbox", "junk", "trash")
            )
            summary = json.loads((output_dir / "latest-summary.json").read_text(encoding="utf-8"))
            csv_text = (output_dir / "latest-records.csv").read_text(encoding="utf-8-sig")
            self.assertEqual(summary["windows"][0]["inquiry_candidates"], 1)
            self.assertEqual(summary["windows"][0]["mailbox_counts"]["junk"], 1)
            self.assertEqual(summary["mailbox_roles_missing"], [])
            self.assertIn("example.com", csv_text)
            self.assertNotIn("subject", csv_text.lower())
            self.assertNotIn("body", csv_text.lower())

    def test_coremail_client_id_is_sent_when_advertised(self):
        class FakeClient:
            capabilities = ("IMAP4REV1", "ID")

            def __init__(self):
                self.command = None

            def _simple_command(self, command, argument):
                self.command = (command, argument)
                return "OK", [b"ID completed"]

        client = FakeClient()
        MODULE._send_client_id(client)
        self.assertEqual(client.command[0], "ID")
        self.assertIn("AthletikMailAnalyzer", client.command[1])

    def test_special_use_junk_and_trash_are_discovered(self):
        class FakeClient:
            def list(self):
                return "OK", [
                    b'(\\HasNoChildren) "/" "INBOX"',
                    b'(\\HasNoChildren \\Junk) "/" "&V4NXPpCuTvY-"',
                    b'(\\HasNoChildren \\Trash) "/" "&XfJT0ZAB-"',
                    b'(\\HasNoChildren \\Sent) "/" "&XfJT0ZCuTvY-"',
                ]

        targets = MODULE.discover_mailboxes(
            FakeClient(), {"mailbox_roles": ["inbox", "junk", "trash"]}
        )
        self.assertEqual([target.role for target in targets], ["inbox", "junk", "trash"])
        self.assertEqual(targets[1].name, "&V4NXPpCuTvY-")


if __name__ == "__main__":
    unittest.main()
