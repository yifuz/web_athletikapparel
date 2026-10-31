# C06 / C08 日期修正与 Tech Pack 示范入口

日期：2026-10-31。状态：`implemented / locally-verified / deployment-pending`。所有者已授权修正两篇已更新指南的内容日期，随后要求检查当天可补做的官网工作并合并验收；同批增加 Tech Pack 示范入口说明。本次未直接部署生产。

## 日期依据与问题

| 页面 | 内容更新日期 | 已有依据 |
|---|---|---|
| `/technical-knitwear-tech-pack-guide/` | `2026-10-29` | [C06 示范实施及生产验收](valid-retest/batch-d-2026-10-29/c06-tech-pack-demo-2026-10-29.md)，实施提交 `6cd9686` |
| `/evaluate-technical-knitwear-oem/` | `2026-10-30` | [C08 增补及生产验收](valid-retest/batch-d-2026-10-29/c08-guide-copy-draft-2026-10-30.md)，实施提交 `dcb896d` |

两次内容变更均已获所有者批准并通过当日生产验收，精确部署时刻未知。因此只使用日期，不把提交时间、验收时刻或午夜写成实际部署时间。

修改前直接读取生产 HTML：两页均 HTTP 200，Article / WebPage 的 `dateModified` 分别仍为 `2026-08-11T07:36:02+00:00`、`2026-08-11T07:36:03+00:00`；可见发表与技术复核日期均为 8 月 11 日。正文由主题模板维护，WordPress 数据库修改时间没有随模板内容更新，是日期滞后的原因。

## 实施范围

- `inc/technical-article-data.php`：仅为两篇指南添加独立 `updated_on`，保留 `reviewed_on`。共用函数在站点时区下比较日期，保留更晚的数据库编辑；无该字段的指南沿用旧值。
- `template-parts/technical-article/page.php`：仅在设有 `updated_on` 的指南输出 `Content updated` 与 `<time>`。首次发表和技术复核日期保持原值。
- `rank-math.php`：沿用正在运行的 Rank Math 集成，同步两页 Article / WebPage `dateModified` 和 Page Sitemap 两个 URL 的 `lastmod`，使用日期粒度。其他页面日期不变。
- `functions.php`：升级一次性 Sitemap 缓存发布标记，使用 Rank Math 原生方法清理生成缓存；记录真实刷新时刻，供父索引中的 Page Sitemap 更新时间使用。父索引时间描述 Sitemap 缓存发布，不冒充页面内容更新时间；重复访问不刷新日期。

初次定向清理时，Page Sitemap 已变而主索引仍返回旧缓存。插件定向清理依赖缓存登记表，不能覆盖未登记的缓存文件；未查询登记表，不把可能的登记遗漏写成已证实根因。改用插件原生完整缓存清理后复测通过，仅在本次发布版本首次请求执行，不禁用缓存、不修改插件。

首次发表日期、技术复核日期、正文内容、URL、Title、Meta、H1、Canonical、FAQ、媒体及内链未改。没有改写 WordPress 文章的发表或修改字段；部署只自动维护缓存版本及刷新时间选项，无手动数据库迁移。

## 验证

- 四个 PHP 文件通过 PHP 8.2.30 语法检查。
- 两个目标及其余四篇已发布指南均为本地 HTTP 200。移除新增日期显示后，六页正文文本、Title、Meta、H1、Canonical、链接与媒体清单均与本地改动前一致。
- JSON-LD 可解析，只有两页 Article / WebPage 的 `dateModified` 发生预期变化；`datePublished`、其余节点及四篇对照指南不变。
- 本地 Page Sitemap 保持 21 个唯一 URL，仅目标两条 `lastmod` 改为 10-29 / 10-30。父索引仅 Page Sitemap 时间变更，重复读取保持稳定；本地 URL 数不冒充生产 URL 数。
- PHP 边界检查覆盖早于、同日、晚于内容更新的数据库日期、空日期、未管理页面，以及 Asia/Shanghai 与 UTC 跨日的同一时刻。
- 两篇页面的独立无头浏览器 390 / 1440px 检查全部通过，无整页横向溢出或页面 JS 错误，四张截图已视觉复核。未操作所有者日常浏览器。
- 证据目录：`C:\Users\Administrator\seo-reports\guide-dates-2026-10-31\`，含生产及本地改动前 HTML / XML、本地改动后证据、`local-checks.json`、`browser-checks.json`、截图及 `verify-local.py`；不进入 Git。

日期粒度依据 [Google 日期说明](https://developers.google.com/search/docs/appearance/publication-dates)、[Schema.org dateModified](https://schema.org/dateModified) 和 [Sitemap 协议](https://www.sitemaps.org/protocol.html)。本次通过的是本地解析、字段与渲染一致性检查，未运行外部 [Rich Results Test](https://search.google.com/test/rich-results) 或 [Schema Validator](https://validator.schema.org/)，不描述为外部验证通过或搜索引擎已采用。

## 同批补充：Tech Pack 示范入口说明

所有者提出当天补做并一并验收后，核查 [Guides Hub](https://www.athletikapparel.com/technical-guides/)、[Tech Pack Guide](https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/) 和 Services，均为生产 HTTP 200。Tech Pack 已有完整 PDF 入口，Hub 也已有该页卡片；实际可改善之处是卡片摘要与文章目录没有提示已经上线的示范内容。不是孤立页或缺 PDF，也不从 10-29 单次采样推断索引问题。

只追加修改 `inc/technical-article-data.php` 三处文字：

- 卡片摘要：`Define fabric, POMs, tolerances, seams, components, testing and approvals, with illustrative measurement and BOM examples and a demonstration PDF.`
- 目录尺寸表项：`POMs, tolerances and measurement example`。
- 目录组件项：`Trims, components and BOM example`。

已有 URL 和章节锚点保持不变；未增加下载按钮、Services 内链、页面或长篇正文。此项是既有示范的入口说明，不把微小导航调整作为新的实质内容日期，保留 C06 的 10-29。

局部验证：Hub 与 Tech Pack 的本地 HTML 均为 200，仅上述三处文字改变；Title、Meta、H1/H2/H3、Canonical、JSON-LD、媒体和所有 href 与本次补充前一致。9 行尺寸表示范、10 行 BOM 保留；PDF 200、MIME 为 `application/pdf`，SHA-256 仍为 `c022e24d4a4b97f244a54477c38eae6231c8c636936b46d139b60976e0919ac3`。两种屏宽分别检查卡片与目录并实际点击；证据位于 `C:\Users\Administrator\seo-reports\tech-pack-discovery-2026-10-31\`。这改善已有材料的可发现性，不宣称提高 AI 引用率。

## 部署与后续

统一部署包：`C:\Users\Administrator\Downloads\athletik-geo-batch-2026-10-31.zip`，包含日期修正与示范入口两项，替代先前仅含日期修正的 `athletik-guide-content-dates-2026-10-31.zip`。不需要两个包重复覆盖。包内仍仅有以下四个子主题文件，按原相对路径覆盖：

1. `inc/technical-article-data.php`
2. `rank-math.php`
3. `template-parts/technical-article/page.php`
4. `functions.php`

同批部署四个文件；若逐一上传，按上述顺序，先提供共用日期函数，最后上传缓存发布标记。无需上传 Markdown、PDF、图片、CSS 或 JS。部署后合并核对两页可见日期、Article / WebPage、Page Sitemap 与主索引，以及 Tech Pack 卡片、两处目录、实际跳转与 PDF；并验证其余指南没有新增日期。

本次修正既有内容更新记录，不重置 C06 / C08 原观察窗口，不重复索引申请，不宣称索引或 AI 引用改善。以后实质内容更新时按批准及发布记录维护 `updated_on`；技术复核另行记录，不自动跟随。
