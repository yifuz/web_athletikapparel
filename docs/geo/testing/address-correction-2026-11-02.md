# 中国生产地址门牌更正

日期：2026-11-02。状态：`deployed / owner-accepted`。

## 事实与更正范围

所有者在当前对话明确确认：**正确地址应该是 15 号，官网写错了。** 因此中兴路 15 号是当前核准事实；此前官网 25 号是误写，不是搬迁或第三方名单出错的证据。

本轮只把 `No.25` 改为 `No.15`，不根据外部名单改写邮编或其他字段。

| 部署文件 | 改动 |
|---|---|
| `page-contact.php` | 联系页地址和 Google Maps 搜索 query |
| `functions.php` | 共用页脚地址 |
| `rank-math.php` | 全站组织 `PostalAddress.streetAddress` |

同时更正 `AGENTS.md`、Contact 文案源、GEO 当前事实表和 Prompt 基线的核准实体表。历史 AI 回答和来源摘录保留原文；E01 手动样本追加事实更正，不撤销所有者已接受的采集有效性，不要求重采。

## 本地验证与部署

部署包：`C:\Users\Administrator\Downloads\athletik-address-correction-2026-11-02.zip`，仅包含上表三个主题文件；覆盖生产子主题中对应路径。

后续交付决定：所有者要求与[买家公开名单 GEO 内容](buyer-disclosures-2026-11-02.md)一起部署，并于同日确认“那一起部署吧”。改用已批准的五文件合并包 `athletik-geo-buyer-evidence-2026-11-02.zip` 统一部署；旧三文件包只保留历史交付记录，无需单独执行。

本地验证已通过：

- 三个部署文件均通过 PHP 8.2.30 语法检查。
- 首页、Contact、About、Privacy 均为 HTTP 200；可见中国地址和解析后的 JSON-LD 地址均为 15 号，相关 HTML 中无 25 号残留；Contact 的地图 query 为 15 号。
- 首页、Contact、Privacy 与改动前快照相比，title / canonical 保持一致；排除 Fluent Forms 隐藏蜜罐字段每次请求变化的标签后，可见正文只有门牌变更。Privacy 的纽约数据控制者地址不变。
- ZIP 内文件清单准确，各文件与本地源码逐字节一致。ZIP SHA-256：`dc5bb6dab538b2d8702fb069c6fb875d0a1be64a4c8f5b75fdea7d33872cbf8f`。

证据目录：`C:\Users\Administrator\seo-reports\address-correction-2026-11-02\`，含前后 HTML、`local-checks.json` 和包内文件哈希。上述检查为本地字段修正验证，未运行外部全量 Schema 验证。

所有者于 2026-11-02 确认五文件合并包“已验收 并部署”，据此关闭地址更正的部署与验收。状态依据为所有者确认，不是由本地通过、Git 提交或 ZIP 生成推断；本次没有新增 Agent 生产验收记录。

## GEO 后续

买家名单与官网的 15 / 25 号差异，已由所有者确认原因是官网误写并完成更正。Canadian Tire 与 Sainsbury's 买家公开名单的版本、列名范围和官网引用内容已核验并一起部署；公开列名不自动证明当前订单、直接合同或质量背书。
