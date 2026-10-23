# SEO-V2-005：FLATLOCK Guide 到 Merino 商业页的上下文链接

> Change ID：`SEO-V2-005-FL-MERINO-LINK-20261023`
>
> 实施日期：2026-10-23
>
> 状态：`owner-approved / implemented / local-verified / deployment-pending`
>
> Finding outcome：`changed`；已完成本地验收，尚未生产部署，不宣称排名收益

## 1. 目标、搜索意图与授权

- 来源页：<https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>。
- 承接页：<https://www.athletikapparel.com/merino-wool-manufacturer/>。
- 来源搜索意图：比较 FLATLOCK / OVERLOCK 的应用及面料、接缝与测试要求。承接页负责 Merino 成衣制造项目、材料规格与开发要求，不改变页面所有权，不将这次链接视为独立面料采购页的替代。
- 采购任务：`Discover / Qualify`。读到 Merino blend 接缝开发语境时，买家可以进一步查看 Athletik 的 Merino 产品及规格范围。
- 所有者先批准 SEO-V2-005 内链核查，再明确批准本次提出的 FLATLOCK 单处链接实施；OEM Evaluation 的可选位置不在批准范围内。
- 唯一主要变量：只把已有的 `Merino wool blend` 包装为指向既有 Merino 商业页的普通 `<a href>`。没有新增、删除或改写可见正文。
- 按 `seo-process.md` §5.1 的 B 类相关内链改进管理。保持 URL、Title、Meta、H1、Canonical、Schema、技术复核日期、图片、视频、样式、脚本和表单不变；不创建页面、不新增 Backlog 项。

## 2. 改动前证据与覆盖

2026-10-23 只读核查覆盖六篇已发布指南、七个品类页、Services 和 Guides Hub，共 15 个明确 URL（`targeted`，不是全站全面审计）：均为 HTTP 200、单一 H1、自引用 Canonical、允许索引的 meta robots、无 X-Robots-Tag 阻断；在生产 Page Sitemap 中各出现一次。Sitemap 合计 20 个条目 / 20 个唯一 URL。

六篇指南正文均已有至少一个商业品类入口，Hub 覆盖全部六篇；不能据此称网站缺少内链，也不要求每篇指南链接所有品类。具体处置如下：

| 指南 | 现有正文商业入口（不含导航和页脚） | 本轮处置 |
|---|---|---|
| FLATLOCK vs OVERLOCK | Underwear、Sportswear、Services | 只补本卡获批的 Merino 上下文入口 |
| Tech Pack | Knitted Fabrics、Sportswear、Services | `no-change`；不继续在品类枚举句中堆链接 |
| OEM Evaluation | Knitted Fabrics、Services | `deferred`；Merino base layers 位置相关，但未获本轮实施批准 |
| QC Checklist | Knitted Fabrics、Sportswear、Services | `no-change`；保留既有上下文 |
| Top Sportswear Manufacturers | Sportswear（正文及来源清单） | `no-change`；不扩展榜单正文或改变 GEO 任务 |
| FLATLOCK vs ACTIVESEAM | Underwear、Merino | `no-change`；Merino 入口已经存在 |

GSC 一方数据为 `type=web`、`dataState=final`、2026-09-23～10-20、六篇指南精确 URL 正则、`dimensions=[page]`、`rowLimit=100`。一批 API 请求返回六行，无行数截断：

| 页面 | Clicks | Impressions |
|---|---:|---:|
| FLATLOCK vs OVERLOCK | 3 | 328 |
| Top Sportswear Manufacturers | 5 | 300 |
| FLATLOCK vs ACTIVESEAM | 4 | 67 |
| Tech Pack | 0 | 20 |
| QC Checklist | 1 | 12 |
| OEM Evaluation | 0 | 4 |

本表是传统 GSC Web Search 页面表现，不是 Google 生成式数据或固定商业词排名。Merino 承接页沿用同日已核验的同窗口基线：4 clicks / 177 impressions；四个固定商业词没有返回保留行，不写成零曝光。完整监测边界见[固定监测 V1](../../research/merino-commercial-monitor-v1.md)。

人工核对生产原始 HTML、真实浏览器 DOM 与模板：FLATLOCK 的 `fabric-and-testing` 段落已有 `Merino wool blend`，正文没有 Merino 目标链接；目标页包含相关产品、composition、GSM、knit structure、接缝及开发信息。该位置的缺链状态为 `Confirmed / Info / P2 / review`；链接对读者的适用性属于编辑判断，预期排名收益为 `Unverified`，并非已确认的排名低因。

GSC 驱动的 `internal-links` 报告范围为 2026-07-21～10-18、90 天、非品牌、最低 1 次保留曝光：六个 eligible target queries 只匹配一个来源 Underwear，该页已经有 Merino 链接，0 ready-to-apply 缺口、0 failed / unchecked。工具 `report.dataStatus=complete` 与 `findings.coverage.state=unknown` 同时保留；不能扩大成全站完整性结论。`action-811b6a235dc6` 为泛化 fix 提示，处置 `not-needed`：它并未发现需要修复的链接。两条 extractor warning 仅过滤非 HTTP 链接，已见电话链接，不作为断链。获批的新链接来自额外的人工编辑核查，不冒充工具建议。

本地实施后，于 `2026-10-23T06:36:47.535Z` 以同一参数刷新重跑该报告，结果与上述一致：仅有的工具 Finding 仍为 `not-needed`（1/1 已处置）。报告读取的是生产页，不能作为本地新链接已上线的验收；本地改动以精确源码、raw HTML 与真实点击验证。

## 3. 实施文件与验收

代码仅修改 `template-parts/technical-article/content-flatlock-vs-overlock-technical-knitwear.php` 一行，复用 `esc_url( home_url( '/merino-wool-manufacturer/' ) )`；无 `nofollow`、无新窗口、无点击脚本。目标 URL 没有变化，无需 301。

| 验收 | 结果 |
|---|---|
| PHP 8.2.30 语法 | 通过 |
| 源码隔离 | 通过：移除这一个新 anchor 后，文件与改动前逐字相同（规范化换行后）；正文、元数据注册表及其他页面源码未改 |
| LocalWP 原始 HTML | 来源页 HTTP 200，新 anchor 恰好一个，正确解析为本地 Merino URL；正文区域链接 13 → 14 |
| 来源页防护字段 | Title、Meta、单一 H1、Canonical、robots、正文 textContent、可解析 JSON-LD 和媒体清单均与本地改动前一致 |
| LocalWP 浏览器 | 390 / 1440px 均无页面或该段横向溢出；锚文本可见、可获得键盘焦点；真实点击均到 HTTP 200 的 Merino 页，H1 正确 |
| 对照与承接页 | OEM Evaluation 正文、链接、元数据、Schema 与媒体均不变；Merino 的元数据、链接清单、Schema 和媒体不变，目标源码未改 |
| 生产状态 | 来源、目标及 OEM 对照均 HTTP 200，受检字段与生产改动前一致；来源正文仍为 0 个 Merino 链接，符合尚未部署的预期 |

来源页本地正文去空白 SHA-256 为 `576750e574ed74ff7b2c3ac75fb2e4b6d1b36a894eb072e0093c6eceb1d6fd20`，改动前后相同。初次 LocalWP 来源请求 12 秒超时，一次重试成功；不据此断言网站有持续故障。Merino 本地整页 `main.textContent` 前后 hash 不一致，尚未定位差异来源，不以此声称整页 DOM 逐字零差异；这不改变该页源码未修改、上述防护字段相同的已验证事实，不扩展为表单或运行时排障。

验收浏览器使用临时未登录会话并拦截分析端点；未提交表单、未发邮件、未修改 CMP、WordPress 数据库、广告或认证信息。本轮无新增付费 SERP 请求。

## 4. 风险、回滚与观察

- 风险：正文已有相关商业入口，这一增量可能只有有限边际收益；锚文本谈的是 blend，承接页是 Merino 成衣项目页，不能据此承诺独立面料现货或未经验证的性能。现有承接内容可以支持项目延伸，但不是排名收益证明。
- 回滚：仅移除本次 anchor，保留 `Merino wool blend` 原文字。实际错链、正文变动或可复现的可访问性/布局回归才需要修正；没有短期增长不自动触发回滚或再次重写。
- Day 0 为所有者实际生产部署并验收之日，当前 `pending`，不把本地实施日当上线日；届时记录 Day 7 / 28 / 90 日期，排除部署日计算效果窗口。
- Day 0 / 7：生产 raw HTML 与浏览器确认新增链接恰好一个、HTTPS 目标正确、来源和目标最终 200、原链接与元数据不变；不凭 Sitemap 或索引请求证明 Google 已抓到新链接，不重复提交索引。
- Day 28：在 final 数据完整后结合来源及 Merino 页的同口径 GSC、固定商业词和可得询盘观察，允许 `inconclusive`；不将页面总量、平均排名、低量 Query 缺失或其他活动归因给这一个链接。
- Merino 固定监测、既有 2026-12-06 Day 90 和面料页节点不重置。本次部署后，Merino 10-21～11-17 预定后窗将混入入链变量，复盘必须披露；原监测建立记录所说“没有网站改动”只描述当时的监测任务，不覆盖后续部署。
- 本次没有独立全站 Crawl；部署前后 Crawl ID 为 `not-run / pending`，不冒用其他批次。链接直接证据和三 URL 防护对比为本次定向验收，不宣称全站无回归。

## 5. 部署清单

只部署以下一个主题文件到相同相对路径：

`wp-content/themes/myathletik-child/template-parts/technical-article/content-flatlock-vs-overlock-technical-knitwear.php`

无需部署 Markdown、图片、视频、CSS、JavaScript 或数据库。部署后清理相关页面缓存，通知 Agent 做生产定向验收。本卡与 [`docs/progress.md`](../../../progress.md) 为内部记录，不同步为网站内容。
