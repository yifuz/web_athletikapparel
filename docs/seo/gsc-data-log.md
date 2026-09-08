# GSC / GA4 / 询盘数据记录（持续更新）

> 网站属性：`sc-domain:athletikapparel.com`（siteOwner）
> GA4 Property：`547377703`
> 用途：按 `seo-process.md` 阶段 B / 阶段 L 保存 Google Search Console、GA4 与人工询盘核验的周期性数据快照，
> 作为 Title/Meta 测试、页面优先级、获客质量和月度复盘的一方数据真值。
> 数据获取：2026-08-18 起通过 `seo` CLI 只读 API 导出（接入记录见
> [`seo-cli-baseline-2026-08-18.md`](seo-cli-baseline-2026-08-18.md)）；更早的数据为网页版手工截图。
> GSC Generative AI Beta 的专用数据当前使用网页版导出。原始 JSON / XLSX 存于本机 `~/seo-reports/`（不进 Git）。
>
> 记录纪律：
> - GSC 对低量查询做匿名化处理；某维度单行缺失不等于零流量，各维度合计口径可能不同。
> - GA4 `generate_lead` 是分析事件，不自动等于真实、有效或合格 B2B 询盘；必须与表单、收件箱或 CRM 人工核对。
> - 样本低于 100 曝光门槛时只记录方向，不触发页面修改（`seo-process.md` §5）。
> - GSC Generative AI 的 Property 总量与 Page 明细使用不同聚合方式；Page 行不可机械相加后当作独立 AI 回答次数。
> - 新条目追加在最新日期处，不覆写历史快照。

## 2026-09-08：SEO-V2-005 Underwear Day 7

### 来源与覆盖

- 本次为 `/underwear-manufacturer/` targeted Day 7 复查；`seo` CLI `0.2.36`、Google 登录、GSC readonly scope 与 GA4 readonly scope 均通过。
- `measure-change` 请求部署前后各 7 天，但 GSC `dataState: final` 当前只到 2026-09-04，因此实际比较 2026-08-28 至 08-31 与 2026-09-01 至 09-04 各 4 个完整日。报告为 `partial`、`afterWindowTruncated=true`，结论为 `not-enough-data / low confidence`。
- `page-opportunities` 使用 2026-08-08 至 09-04 的 final 28 天 Query × Page 数据；精确 URL 返回 3 行、无截断，生产内容验证为 `verified`。
- `index-watch` 为 `complete`：1/1 inspected、0 failed、0 quota blocked、0 current issue、0 regression。

### 搜索表现与 Query

部署前 4 个最终日为 0 clicks / 1 impression / average position 10；部署后 4 个最终日为 0 clicks / 2 impressions / average position 36。绝对样本只有 1–2 impressions，不能把排名差异解释为下降、趋势或改版因果。GA4 同一 before / after 窗口均为 0 landing-page sessions / 0 engaged sessions / 0 conversions。

生产页当前 28 天 Page 汇总为 0 clicks / 24 impressions / average position 24.04。可见 Query × Page 仅有 3 行，均为 1 impression：

| Query | Clicks | Impressions | Average position | 处置 |
|---|---:|---:|---:|---|
| `underwear` | 0 | 1 | 2 | 宽泛且单次曝光，不做 CTR 或 Title 实验 |
| `mens underwear` | 0 | 1 | 20 | 页面正文已覆盖 men's underwear；不因机械词面提示修改 Title / H1 |
| `stretch performance base layers oem` | 0 | 1 | 45 | 与页面 performance / base layer / OEM 范围相容；继续观察 |

Query 明细受低量匿名化影响，3 次可见曝光不是 24 次 Page impressions 的完整解释。报告把三行均列为 `serp-framing` 或 CTR review，并估算 0.15 click lift；在每行仅 1 impression、没有 peer sample 且低于项目 100 impressions 门槛时，这些是机械建议，不构成改页证据。

### 索引与生产状态

- URL Inspection：`PASS / Submitted and indexed`，`INDEXING_ALLOWED / ALLOWED / SUCCESSFUL`；Google Canonical 与用户 Canonical 均为规范 URL。
- Google 最后抓取时间为 `2026-09-07T05:02:43Z`，晚于 2026-09-01 部署；此前快照最后抓取为 `2026-08-22T17:46:29Z`。这证明 Google 已抓取部署后页面，但不证明新增正文产生排名提升。
- 生产页 HTTP 200、`follow, index`、无 X-Robots-Tag、自引用 Canonical、单一 `Underwear Manufacturer` H1；Title 与 Meta 保持既有核准值。
- JSON-LD 0 invalid，主图、Open Graph 与 Twitter 图为既有 1200 × 627 JPEG；页面 6 张图片均有 alt，未发现 oversized candidate 或 mixed content。
- Page Sitemap 包含规范 URL，首页保留可抓取入口；页面级审计为 0 issues / 0 recommendations。唯一 Warning 是工具排除 1 个 non-HTTP link，不是页面缺陷。

Finding outcome：`no-change / measuring`。Day 7 的发现、抓取、索引和生产健康目标通过；效果比较因只有 4 个最终日且绝对样本极低保持 `not-enough-data`。不修改 URL、Title、Meta、H1、正文、Schema、图片或页面所有权；下一正式复盘为 2026-09-29 的 Day 28。

## 2026-09-08：2026 年 8 月自然月 GSC / GA4 / 询盘基线

### 来源与口径

- 窗口统一为 2026-08-01 至 2026-08-31；GSC 使用 `dataState: final`，总量、Page、Query、Country 与 Device 均为完整 API 返回，无分页截断。GA4 Property `547377703` 返回 `complete`，Property 时区为 `Asia/Shanghai`。
- 这是完整自然月补充基线，不替换 2026-07-26 至 08-22 的 28 天滚动基线；后者继续作为当时 SEO-V2-002 的执行快照。
- 2026-09-08 所有者最新确认：**2026 年 8 月正式/有效询盘为 0**。该业务真值取代 2026-08-27 将 08-01 事件记为 1 次有效询盘的旧分类；旧条目保留为历史审计轨迹，后续月度比较统一使用 0。

### GSC 自然搜索基线

全站 Web Search 为 **8 clicks / 329 impressions / 2.43% CTR / average position 23.27**。

| Device | Clicks | Impressions | CTR | Average position |
|---|---:|---:|---:|---:|
| Desktop | 6 | 277 | 2.17% | 26.00 |
| Mobile | 2 | 52 | 3.85% | 8.71 |

主要市场中，美国为 4 clicks / 164 impressions，英国为 1 / 14，加拿大为 0 / 3。美国贡献约一半 Property impressions，但总样本仍小，不据此判断市场质量或设备差异。

Page 维度曝光靠前的规范页面如下。Page 行可能因同一搜索结果展示多个本站 URL 而与 Property 总量口径不同，不机械相加：

| Page | Clicks | Impressions | CTR | Average position |
|---|---:|---:|---:|---:|
| `/` | 5 | 79 | 6.33% | 4.15 |
| `/flatlock-vs-overlock-technical-knitwear/` | 0 | 68 | 0% | 18.13 |
| `/about-us/` | 0 | 47 | 0% | 9.45 |
| `/knitted-fabrics-manufacturer/` | 0 | 41 | 0% | 48.56 |
| `/sportswear-manufacturer/` | 0 | 39 | 0% | 10.05 |
| `/sports-accessories-manufacturer/` | 1 | 32 | 3.13% | 6.03 |
| `/contact/` | 0 | 32 | 0% | 20.53 |
| `/garment-quality-control-checklist/` | 1 | 31 | 3.23% | 31.58 |
| `/merino-wool-manufacturer/` | 1 | 31 | 3.23% | 21.35 |

Query 维度只返回 17 行、合计 45 impressions，且这些可见行均为 0 clicks；其余低量 Query 受 GSC 匿名化影响。可见量相对较高的查询为 `overlock vs flatlock`（9 impressions / position 9）、`flatlock vs overlock`（7 / 16.14）、`garment inspection checklist`（5 / 61.6）、`merino wool clothing manufacturer`（5 / 25.2）与 `flatlock stitch vs overlock`（4 / 9.75）。这些信号与现有页面所有权基本一致，但没有任何单页或 Query 达到 100 impressions 门槛。

### GA4 流量与事件基线

全站为 **112 sessions / 82 total users / 79 new users / 48 engaged sessions**；engagement rate 为 **42.86%**，average session duration 为 **158.60 seconds**，event count 为 503，key events 为 4。

| Default channel group | Sessions | Total users | Engaged sessions | Event count |
|---|---:|---:|---:|---:|
| Direct | 54 | 48 | 12 | 214 |
| Organic Social | 28 | 18 | 23 | 162 |
| Paid Search | 24 | 16 | 12 | 104 |
| Unassigned | 3 | 1 | 0 | 11 |
| Organic Search | 2 | 2 | 1 | 10 |
| AI Assistant | 1 | 1 | 0 | 2 |

GA4 全站 Landing Page 以 `/` 73 sessions、`/sportswear-manufacturer` 18、`(not set)` 6、`/contact` 3 和 `/technical-knitwear-tech-pack-guide` 3 为主。Organic Search 只有 `/` 这一行，为 2 sessions / 2 users / 1 engaged session / 10 events；没有 `generate_lead` 行。

8 月共记录 6 次 `generate_lead`、涉及 5 users：08-01 为 1 次、08-05 为 4 次、08-10 为 1 次；渠道拆分为 Direct 2、Organic Social 2、Paid Search 2。Landing Page 拆分为 `/` 2、`/contact` 2、`/outdoor-clothing-manufacturer` 1、`/sportswear-manufacturer` 1。同期另有 9 次 `form_start` 与 4 次 `form_submit`；这些事件计数不等于去重表单、可联系买家或合格询盘。

### 询盘真值与决策

- 正式/有效询盘：**0**。
- Organic Search：2 sessions、0 `generate_lead`、0 正式/有效询盘。
- GA4 的 6 次 `generate_lead` 全部不计入正式/有效询盘；它们只能作为测试、无效或不合格互动的技术信号，不能作为获客成果。
- `eventCount` 6 与全站 `keyEvents` 4 的差异继续按事件配置时间或定义差异的未决项记录；没有 GA4 管理界面变更证据，不自行归因。

Finding outcome：`no-change / baseline-established`。8 月搜索可见性仍处于低样本期，Organic Search 尚未产生正式询盘；本基线不支持修改 URL、Title、Meta、H1、页面所有权或新增近义页。后续按既定 Day 28 / Day 90 节点和完整自然月复盘，重点观察非品牌 impressions、Organic Search engaged sessions、`generate_lead` 与人工确认正式询盘是否同时改善。

## 2026-09-08：SEO-V2-005 Knitted Fabrics Day 7

### 来源与覆盖

- `seo` CLI 版本为项目已验证的 `0.2.36`；`seo doctor` 通过 Google 登录、GSC readonly scope 与默认属性检查。
- `measure-change` 请求部署前后各 7 天，但 GSC `dataState: final` 当前只到 2026-09-03，因此实际只能比较 2026-08-29 至 08-31 与 2026-09-01 至 09-03 各 3 个完整日；报告状态为 `partial`、`afterWindowTruncated=true`，结论为 `not-enough-data / low confidence`。
- `page-opportunities` 使用 2026-08-07 至 09-03 的 final 28 天 Query × Page 数据，精确 URL 共 3 行、无分页截断，生产页面验证为 `verified`。
- `index-watch` 为 `complete`：1/1 inspected、0 failed、0 quota blocked、0 current issue、0 regression。
- 生产页面定向检查覆盖 HTTP、robots、Canonical、H1、JSON-LD、Sitemap、首页入口、已部署能力表达和页面媒体资源。

### 搜索表现与 Query

部署前 3 个完整日为 0 clicks / 9 impressions / average position 49.222；部署后 3 个完整日为 0 clicks / 4 impressions / average position 31.75。曝光差值 -5、平均排名方向改善 17.472，但只有 3 个部署后最终日，不能据此判断增长、下降或因果。

当前 final 28 天精确 URL 可见 Query 为 0 clicks / 7 impressions：

| Query | Clicks | Impressions | Average position | 处置 |
|---|---:|---:|---:|---|
| `functional knitted fabrics factory` | 0 | 5 | 32.6 | 与页面所有权和已部署 functional knits / own fabric mill 内容一致；继续观察 |
| `acetate knit fabric manufacturer` | 0 | 1 | 73 | 单次曝光且 Acetate 能力未获一方确认；不追加正文 |
| `lightweight performance knit tops factory` | 0 | 1 | 95 | 单次、偏成衣意图；不足以判定主题偏移或改变页面所有权 |

GSC Query 受低量匿名化影响，以上 7 次可见 Query 曝光不是页面总曝光的替代。工具生成的三个 `content-gap` 建议均属于机械词项覆盖提示；页面已明确覆盖 `functional knitted fabrics`，不因缺少精确单词 `factory`、Acetate 或 `tops` 而堆词或扩页。

GA4 同一 3 日 before / after 落地页均返回 0 sessions / 0 engaged sessions / 0 conversions。数据源状态为 `complete`，但极低样本不能支持转化判断。

### 索引与生产状态

- URL Inspection：`PASS / Submitted and indexed`，`INDEXING_ALLOWED / ALLOWED / SUCCESSFUL`；Google Canonical 与用户 Canonical 均为规范 URL。
- Google 最后抓取时间为 `2026-09-05T00:01:46Z`，晚于 2026-09-01 部署；此前快照最后抓取为 `2026-08-22T23:20:47Z`。
- 当前搜索结果快照展示既有 Title `Knitted Fabrics Manufacturer | Athletik Clothing`，并已提取新 H2 与 own fabric mill / in-house testing 正文。该快照不保证所有 Query、地区和设备都采用相同摘要。
- 生产页 HTTP 200、`follow, index`、无 X-Robots-Tag、自引用 Canonical、单一 H1、1/1 JSON-LD 可解析；Page Sitemap 保留规范 URL，首页有 2 个可抓取入口。
- 新 H2、`our own fabric mill` 与 `in-house testing` 均存在，Beta Textiles / BTEXCO 公开提及为 0；页面发现的 36 个唯一图片候选 URL 全部返回 HTTP 200。

Finding outcome：`no-change / measuring`。Day 7 的抓取、索引和生产健康目标通过；搜索效果比较因只有 3 个最终日保持 `not-enough-data`，不修改 URL、Title、Meta、H1、正文、Schema 或页面所有权。下一正式复盘为 2026-09-29 的 Day 28。

## 2026-09-07：本周 SEO 监测与 SEO-V2-015 Day 7

### 来源与覆盖

- `seo` CLI 版本为项目已验证的 `0.2.36`；Google 登录、GSC `webmasters.readonly` scope 与属性 `sc-domain:athletikapparel.com` 均通过。
- 初次 `index-watch` 因当前进程未注入本机代理而对首页和 Services 返回 `fetch failed`，数据状态为 `partial`；按同一来源只重试一次，在注入既有 `EnvHttpProxyAgent` 后成功。有效复验为 `complete`：2/2 inspected、0 failed、0 quota blocked、0 deferred。
- GSC Search Performance 使用 `dataState: final`，窗口为 2026-08-06 至 09-02；最近 7 天比较段为 2026-08-27 至 09-02。页面和国家跨窗口保留行不完整、Query 跨窗口没有匹配保留行，因此综合报告为 `partial`；日期总量 28/28 完整。
- 生产技术检查为 targeted：`/`、`/services/`、`/contact/` 三页；3/3 HTTP 200、可索引、单一 H1、自引用 Canonical，0 fetch failure、0 high/medium issue。Page Sitemap 为 18 个条目 / 18 个唯一 URL，三页均在 Sitemap，`robots.txt` 正常声明 Sitemap。Contact 原始 HTML 仍包含 `Estimated Order Quantity` 与 `Tech Pack` 字段；本轮未提交表单，不能据此声明邮件投递链路已重新测试。

### SEO-V2-015 首页 Day 7

- URL Inspection 为 `PASS / Submitted and indexed`，`INDEXING_ALLOWED / ALLOWED / SUCCESSFUL`；Google Canonical 与用户 Canonical 均为 `https://www.athletikapparel.com/`。
- Google 最后抓取时间为 `2026-09-04T20:21:54Z`，发生在 2026-08-31 首页语义纠偏部署之后，证明 Google 已重新抓取部署后的规范 URL。
- 生产 HTML 继续输出 `Performance Apparel Manufacturer | Athletik Clothing`、单一 H1、自引用 Canonical 与 `follow, index`；当前 `site:` 搜索快照也展示新 Title。该快照只说明本次可见搜索结果采用了新标题，不保证所有 Query、国家、设备或时间均使用同一标题。
- 2026-08-27 至 09-02 全站为 5 clicks / 184 impressions；此前 21 天为 4 clicks / 213 impressions，日均点击从 0.19 升至 0.714、日均曝光从 10.143 升至 26.286。首页在 2026-08-06 至 09-02 窗口为 4 clicks / 99 impressions / average position 4.343，相邻前 28 天保留行为 2 / 23 / 9.739。
- 以上方向为正，但 9 月 2 日是当前最终数据截止日，只有 8 月 31 日至 9 月 2 日三个最终日处于改版后；首页精确 Query × Page 返回 0 个保留行，低量匿名化查询不可见。因此 Day 7 不做搜索效果归因，也不修改 Title、Meta、H1 或正文。

Finding outcome：`fixed / measuring`。Day 7 技术与抓取目标通过；SEO-V2-015 保持当前版本，下一检查点为 2026-09-28 的 Day 28 同口径 GSC / GA4 / 有效询盘复盘。

### SEO-V2-003 Services 周度复查

- Services 仍为 `NEUTRAL / Discovered - currently not indexed`，没有返回 Google Canonical、最后抓取时间或具体抓取状态；与既有快照相同，`changeKind=unchanged`，0 regression、0 alert。
- 生产页面继续为 HTTP 200、`follow, index`、自引用 Canonical、单一 H1；Page Sitemap 和站内入口保持。当前仍没有代码、robots、Canonical、Sitemap 或发现路径阻塞证据。

Finding `SEO-V2-003-SERVICES-INDEX` outcome 保持 `no-change / monitoring`。此前实时测试已经通过并请求编入索引一次，本周不重复提交、不改 URL 或正文；下一周继续只读 indexed snapshot。

### 报告 Finding reconciliation

- `action-732c2e495464`、`action-ab69d21aba40`、`action-a9749051ee50`：均为同一首页页面移动复核建议；已核对 URL Inspection、生产 HTML、近期部署和 Query 数据，outcome 为 `not-needed / verified-monitoring`，不重复计为三个缺陷。
- `action-45e69e2c016a`：报告本身未发现 URL overlap，outcome 为 `not-needed`。
- `action-d6944e3a6ca6`：未发现 retained-row content decay，outcome 为 `not-needed`。
- `action-b17a80462de0`：不为制造低置信机会而降低最小曝光门槛，outcome 为 `not-needed / sample-gate`。
- `action-1058f37bea64`：没有 striking-distance row，outcome 为 `not-needed`。
- `action-485ffd6ad089`：已核对近期站点变更、索引和页面分段；没有官方 Google Ranking update 窗口重叠，也没有因果证据，outcome 为 `not-needed / investigated`。
- `hsts_missing`：3 页 low review，延续 SEO-V2-014，outcome 为 `deferred / existing-owner-action`；它是基础设施安全评估，不是本周排名缺陷。
- `image_oversized_candidate`：首页 1 页 low review；响应式 Hero 已完成既有生产验收，当前没有稳定 Field 或同环境 Lab 回归，outcome 为 `no-change / unchanged-heuristic`。
- 报告另有 1 个外部 URL 阻止自动验证、4 个外部 URL 在有限重试后不可达，以及定向 Crawl 的 GSC join 因未注入代理而 `partial`；这些不改变上述生产页面、Sitemap 与单独成功取得的 GSC 证据。

## 2026-09-05：GSC Generative AI 首个三个月基线

### 来源与覆盖

- 来源：所有者从 GSC `效果 > 生成式 AI 功能（Beta）` 导出的 XLSX；过滤器为 `搜索类型：网络`、`日期：过去 3 个月`。
- 导出日期：2026-09-05；图表实际返回 2026-07-21 至 2026-09-02 共 44 个日期行。
- 数据范围：日期、网页、国家/地区、设备和过滤器五个工作表均存在；本次视为 `complete / owner-export`。
- 本地归档：`~/seo-reports/gsc-generative-ai/athletikapparel-generative-ai-baseline-2026-09-05.xlsx`（不进 Git）。
- SHA-256：`EF33D0FE565081F3970DE4EA9B7EDDC372F3297A6D61E4FEFD18C6207740A165`。

Google 对该报表的定义是：生成式 AI 功能向用户展示本站链接时计一次 impression；Search 报告覆盖 AI Overviews 和 AI Mode，但不提供触发 Query、答案原文、Clicks、推荐位置或转化。若同一生成式结果展示同一站点的多个页面，Property 图表计一次，Page 表会为各页面分别计数。因此以下 Page 数值只称为“页面级链接曝光”，不称为独立回答数或已验证推荐。参见 [Google Generative AI performance report](https://support.google.com/webmasters/answer/16984139) 与 [功能公告](https://developers.google.com/search/blog/2026/06/gen-ai-performance-reports)。

### Property、日期与设备

- Property 总曝光：**29**。
- 设备：Desktop 22（75.9%），Mobile 7（24.1%）。
- 2026-08-29 至 09-02 集中了 18 次（62.1%）；其中 08-31 至 09-02 为 15 次（51.7%）。这是低量首个快照中的后段集中，只记录为方向，不能写成持续增长或由某次内容发布造成。
- Google 曾在 2026-08-13 至 08-17 记录 Generative AI Search impressions 日志故障；该区间的零值不用于建立自然趋势。参见 [Search Console data anomalies](https://support.google.com/webmasters/answer/6211453?hl=zh-Hans)。

### 页面级链接曝光

Page 表返回 13 个 URL、合计 36 次页面级曝光；该合计高于 Property 的 29 次符合上述聚合规则。

| 页面组 | 页面级曝光 | 明细 |
|---|---:|---|
| Technical Guides | 13 | FLATLOCK vs OVERLOCK 7；QC Checklist 4；OEM Evaluation 1；Tech Pack 1 |
| 商业品类页 | 9 | Sports Accessories 4；Underwear 2；Knitted Fabrics 1；Merino Wool 1；Sportswear 1 |
| 品牌/转化入口 | 9 | Home 7；About 1；Contact 1 |
| 法律/非目标页 | 5 | Privacy Policy 5 |

关键观察：

- 四篇已上线 Technical Guides 均至少获得 1 次页面级链接曝光；FLATLOCK Guide 以 7 次成为并列最高页面，QC Guide 获得 4 次。第一方技术内容已经获得 Google 生成式结果中的实际展示证据，不再只是“可抓取/可索引”的理论资格。
- Product category 页面也已进入生成式结果，但当前不能知道它们对应品牌查询、产品查询还是采购查询。
- Privacy Policy 的 5 次归入法律/非目标曝光，不作为 B2B 买家发现、内容权威或推荐成果。
- 未返回的 Sitemap 页面只表示本次 Page 表没有可见行，不解释为没有需求、无法提取或页面失败。

### 国家/地区

国家/地区表的 29 次与 Property 总量一致：美国 5、印度 4、孟加拉 3、英国 3、中国香港 3、越南 3；澳大利亚、加拿大、瑞士、法国、印度尼西亚、新西兰、菲律宾、土耳其各 1。

北美和欧洲目标市场可见行为美国 5、英国 3、加拿大 1、瑞士 1、法国 1，合计 11 次（37.9%）。这只证明链接在对应地区被展示；没有 Query 和答案上下文，不能据此判断访问者身份、采购意图或市场质量。

### GEO Audit 结论与处置

| 阶段 | 本次能证明什么 | 本次不能证明什么 |
|---|---|---|
| 被 AI 找到 | Google 已在实际 AI Overviews / AI Mode 结果中展示规范站链接 | 不知道触发 Query 和检索链路 |
| 被 AI 提取 | 无直接字段 | 不知道答案采用或准确复述了哪些事实 |
| 被 AI 引用 | 13 个规范 URL 获得页面级链接曝光，可作为 citation-surface evidence | 不知道链接支持哪项结论，不能完成引用相关性审核 |
| 被 AI 推荐 | 无直接字段 | 不知道 Athletik 是否进入供应商短名单、名单位置或推荐理由 |

Finding outcome：`no-change / baseline-established`。当前样本小、没有 Query/答案上下文且是首个专用报表快照，不修改 URL、Title、Meta、H1、正文、Schema 或内部链接。GSC 用于持续量化 Google 端链接曝光；`docs/geo/testing/prompt-baseline.md` 的干净 Temporary Chat 测试继续负责提取准确性、引用相关性和推荐结果。下一次在 2026-09-03 至 09-30 的完整 28 天数据可用后建立首个可比窗口。

## 2026-09-01：SEO-V2-003 Services indexed snapshot 复查

只对 `https://www.athletikapparel.com/services/` 运行只读 `index-watch`。CLI 版本为项目已验证的 `0.2.36`，Search Console OAuth、`webmasters.readonly` scope 与默认属性均正常；报告 `dataStatus=complete`，`requested=1`、`attempted=1`、`inspected=1`、`failed=0`、`quotaBlocked=0`、`deferred=0`。

Google URL Inspection indexed snapshot 仍为 `NEUTRAL / Discovered - currently not indexed`，未返回 Google canonical、最后抓取时间或具体抓取状态。与 2026-08-28 快照相比 `changeKind=unchanged`，没有 regression、recovery 或 alert。该结果是 Google 的索引快照，不是实时测试，也不能证明当前页面存在技术阻塞。

同轮生产定向复核结果：Googlebot User-Agent 请求 HTTP 200；页面输出 `follow, index` 与自引用 canonical；无 `X-Robots-Tag`；robots.txt 未屏蔽 `/services/`；`page-sitemap.xml` 包含该 URL；首页仍有可抓取 Services 链接。结合 2026-08-28 GSC 实时测试通过和一次性请求编入索引记录，没有出现新的代码、robots、canonical、Sitemap 或发现路径问题。

Finding `SEO-V2-003-SERVICES-INDEX` outcome 保持 `no-change / monitoring`。不重复请求编入索引，不改 URL、Title、Meta、H1、正文或 Schema；下一次按周度 indexed snapshot 节奏复查，若变为 `PASS / Submitted and indexed` 则关闭该单页观察，若 Google 返回明确抓取或 canonical 阻塞再进入诊断。

## 2026-08-31：SEO-V2-005 GSC 代理故障修复与 Underwear 检查

为核对 Underwear、Merino、Outdoor 与 Sportswear 页是否达到 SEO-V2-005 门槛，先运行 `seo --version` 与 `seo doctor --json`。CLI 版本为项目已验证的 `0.2.36`，Google 登录、Search Console `webmasters.readonly` scope 和默认属性 `sc-domain:athletikapparel.com` 均通过。

初次裸跑两个不同只读报告时，均在取数阶段返回相同的非重试型错误：

- `page-opportunities`，目标 `/underwear-manufacturer/`：`INTERNAL_ERROR / fetch failed / retryable=false`；
- `search-performance-overview`，最新 28 天、非品牌范围：`INTERNAL_ERROR / fetch failed / retryable=false`。

诊断确认本机直连 `searchconsole.googleapis.com:443` 失败，Fastlink 系统代理 `127.0.0.1:7892` 正常，但重启后当前进程没有注入既有 `EnvHttpProxyAgent`。在同一 PowerShell 进程内设置 `HTTP_PROXY`、`HTTPS_PROXY` 和 `NODE_OPTIONS=--import=.../undici-proxy-loader.mjs` 后：

- `seo sites --json` 成功返回 `sc-domain:athletikapparel.com / siteOwner`；
- 同参数重跑 Underwear `page-opportunities` 成功，数据状态 `available`、GSC `dataState: final`、页面验证 `verified`；
- 窗口为 2026-07-31 至 08-27，Query × Page 为 2 行：`underwear` 1 曝光 / 0 点击 / 平均排名 2，`mens underwear` 1 曝光 / 0 点击 / 平均排名 20；
- 目标页 HTTP 200，Title 与 H1 均为 `Underwear Manufacturer`；报告无分页截断，唯一 Warning 为排除 1 个 non-HTTP link。

恢复后以相同 final 28 天、非品牌、最低 1 曝光参数完成其余三个候选页：

| 页面 | 可见 Query × Page | 点击 | 曝光 | 平均排名 | 处置 |
|---|---|---:|---:|---:|---|
| `/merino-wool-manufacturer/` | `merino wool clothing manufacturer` | 0 | 1 | 23 | `no-change / below-threshold`；意图和页面所有权匹配，但不足以改页 |
| `/outdoor-clothing-manufacturer/` | 未返回可见非品牌 Query 行 | — | — | — | `no-change / sparse-data`；不解释为页面零曝光 |
| `/sportswear-manufacturer/` | `sukartik clothing private limited` | 0 | 1 | 45 | `not-needed / mismatched-query`；这是其他公司品牌，不扩写页面 |

根因是代理注入遗漏，不是 GSC、OAuth 或报告服务故障。四页均未达到 100 曝光门槛；工具对 Underwear 的 CTR/serp-framing、Merino 的 content-gap 与 Sportswear 的 content-gap 建议均不能直接触发修改。Merino 查询只确认当前页面所有权方向；Sportswear 建议已被意图核验推翻。四份报告均无分页截断，页面验证范围中的重复 Warning 仅为各排除 1 个 non-HTTP link。

## 2026-08-28：SEO-V2-003 第二批 URL Inspection 完成

在本机保守 UTC 日配额重置后，只对首轮未选择的 8 个 Sitemap URL 重跑只读 `index-watch`。本次结果为 `dataStatus=complete`：`requested=8`、`unique=8`、`attempted=8`、`inspected=8`、`failed=0`、`quotaBlocked=0`、`deferred=0`、`currentIssues=1`、`regressions=0`。没有重复检查首批 10 个 URL，也没有向 Google 请求编入索引。

| URL | Verdict / Coverage | Google / User Canonical | Google 最后抓取时间（UTC） | 处置 |
|---|---|---|---|---|
| `/services/` | `NEUTRAL / Discovered - currently not indexed` | 未返回 | 未返回 | `deferred / owner-action` |
| `/silk-wear-manufacturer/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-11T09:14:20Z` | `no-change` |
| `/sports-accessories-manufacturer/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-08T01:20:53Z` | `no-change` |
| `/sportswear-manufacturer/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-27T17:44:58Z` | `no-change` |
| `/sustainability/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-22T11:50:44Z` | `no-change` |
| `/technical-guides/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-11T08:52:14Z` | `no-change` |
| `/technical-knitwear-tech-pack-guide/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-11T08:56:16Z` | `no-change` |
| `/underwear-manufacturer/` | `PASS / Submitted and indexed` | 一致、自引用 | `2026-08-22T17:46:29Z` | `no-change` |

首批与第二批合计覆盖当前 18 个 Sitemap 页面：17 个 `PASS / Submitted and indexed`，1 个 Services 为 `NEUTRAL / Discovered - currently not indexed`。这是当前 Google indexed snapshot，不是实时抓取或搜索结果展示保证。

### Finding：SEO-V2-003-SERVICES-INDEX

- 类型：`review`；严重度：Info；业务优先级：P1；信心：Confirmed；
- 数据状态：Google URL Inspection 为 `complete`；生产复核为 targeted；
- 观察：Google 已发现 `/services/`，但当前快照尚未编入索引，且没有返回最后抓取时间或 canonical；这不是从既有 PASS 快照发生的 regression；
- 生产证据：Googlebot User-Agent 请求返回 HTTP 200；页面输出 `index,follow`、自引用 canonical、无 X-Robots-Tag；`page-sitemap.xml` 包含该 URL 并输出 `lastmod=2026-08-08T02:30:00+00:00`；首页有 5 个指向 Services 的可抓取链接；
- GSC 实时测试：所有者提供的 2026-08-28 17:28 GSC“测试实际版本”截图显示绿色通过，结论为“网址可编入 Google 索引”，网页可用性为“网页可以编入索引”，没有增强功能阻塞；该结果证明当前实时版本可索引，但不等于 indexed snapshot 已更新；
- 推断：现有证据没有显示代码、robots、canonical、Sitemap 或发现路径阻塞。仅凭 `Discovered - currently not indexed` 不支持改 URL、Title、H1、Meta 或正文；
- 失效判定：后续 Inspection 变为 `PASS / Submitted and indexed`，或 Google 后续返回明确抓取/索引阻塞；
- 最小动作：实时测试已通过；所有者确认已于 2026-08-28 点击“请求编入索引”一次，平台操作完成；
- 验收与窗口：不重复提交；在合理抓取窗口内按 SEO-V2-003 复查 indexed snapshot。允许 outcome 为 `changed`、`no-change` 或 `deferred`；当前为 `changed / monitoring`。

### Finding：SEO-V2-003-SITEMAP-DUPLICATE

- 类型：`review`；严重度：Info；业务优先级：P3；信心：Confirmed；
- 目标页面：`/garment-quality-control-checklist/`；搜索意图：technical knitwear buyer 的 garment quality control checklist 信息型意图；
- 初始证据：2026-08-28 生产 `page-sitemap.xml` 有 19 个 `<url>` 条目和 18 个唯一 URL；QC Guide 以相同 URL 与 `lastmod=2026-08-20T08:31:05+00:00` 重复两次；
- 根因证据：2026-08-29 生产 WordPress REST API 返回两个同 slug、同发布时间和同内容的已发布 Page（ID `79`、`80`）；生产前台实际渲染 ID `79`，shortlink 为 `?p=79`。随机查询参数、`no-cache` 请求和 CDN 双 MISS 后重复仍存在，排除浏览器/CDN 旧缓存；本地数据库和本地 Sitemap 均只有一个 QC Guide 对象；
- 主要变量：仅将生产重复 Page ID `80` 移至回收站，保留实际渲染和已收录的 ID `79`；未改 URL、正文、Title、canonical、模板或主题代码；
- 风险：误删 ID `79` 会影响现有页面；因此按前台 `page-id-79` 与 shortlink 证据锁定保留对象，并在操作后复查 HTTP、canonical、robots 与 Sitemap；
- 验收标准：生产 Page Sitemap 全部 URL 唯一、QC Guide 只出现一次、REST API 只返回一个已发布对象、页面保持 HTTP 200、自引用 canonical 且无 `noindex`；
- 2026-08-29 验收：生产 Sitemap 为 18 个条目 / 18 个唯一 URL，QC Guide 计数为 1；REST API 只返回 ID `79`；页面 HTTP 200、canonical 为规范 URL、前台仍渲染 ID `79` 且未检测到 `noindex`；
- Finding outcome：`fixed / keep`。该重复项未产生 canonical 或索引回归，也不解释 Services 的既有收录状态。

## 2026-08-27：SEO-V2-003 第二批 URL Inspection 尝试

按首轮清单对剩余 8 个 URL 运行只读 `index-watch`。本机保守 UTC 日配额尚未重置：8 个 URL 均未向 Google 发送 Inspection 请求，汇总为 `requested=8`、`unique=8`、`attempted=0`、`inspected=0`、`failed=0`、`quotaBlocked=1`、`deferred=7`、`currentIssues=0`。Services 首先返回 `inspection_quota_blocked`，其余 7 个 URL 随后按同一属性配额状态 deferred。

本次结果的数据状态为 `partial / operational`，不提供新的 Google 索引快照，也不代表任何页面未收录或发生索引故障。工具给出的统一 `retryAt` 为 `2026-08-28T00:00:00Z`（北京时间 2026-08-28 08:00）。在该时间之后只重试这 8 个 URL，不重复检查首批 10 个 URL，不改页面或请求编入索引。

同轮 `index-coverage` 的直连与仅设置代理环境变量调用先返回 `INTERNAL_ERROR: fetch failed`；按既有网络约束改用一次性 `EnvHttpProxyAgent` 注入后刷新成功。完整结果与首轮一致：21 个跨源唯一 URL、18 个有保留 Search Analytics 可见性、1 个可抓取但无保留可见性的 QC Guide、2 个预期非索引端点，Crawl / Sitemap / Search Console 三方 completeness 均为 `complete`。前两次失败调用不作为 coverage 证据，也不写成零覆盖或新 Finding。第二批 Inspection 处置仍为 `deferred`，失效条件是配额重置后 8 个 URL 均取得可读 URL Inspection 结果。

## 2026-08-27：SEO-V2-003 首轮 Index Snapshot

`index-coverage` 完整读取冻结 Crawl、Page Sitemap 与 2026-07-26 至 08-22 的 GSC Page 数据：21 个跨源唯一 URL 中，18 个有保留的 Search Analytics 可见性；唯一“可抓取但无保留可见性”的页面是 `/garment-quality-control-checklist/`。这只是 URL Inspection 候选，不是未收录判定。

`index-monitor` 按每日 10 个 URL 的保守配额执行首批检查：10 次调用全部成功，0 failed、0 quota blocked、0 deferred、0 current issue。每个 URL 均为 `PASS / Submitted and indexed / INDEXING_ALLOWED / ALLOWED / SUCCESSFUL`，Google Canonical 与用户 Canonical 一致：

| URL | Google 最后抓取时间（UTC） | 结论 |
|---|---|---|
| `/` | 2026-08-22T19:35:48Z | indexed / PASS |
| `/about-us/` | 2026-08-22T18:36:29Z | indexed / PASS |
| `/contact/` | 2026-08-12T16:37:01Z | indexed / PASS |
| `/evaluate-technical-knitwear-oem/` | 2026-08-11T08:56:15Z | indexed / PASS |
| `/flatlock-vs-overlock-technical-knitwear/` | 2026-08-12T19:07:28Z | indexed / PASS |
| `/garment-quality-control-checklist/` | 2026-08-26T13:41:31Z | indexed / PASS |
| `/knitted-fabrics-manufacturer/` | 2026-08-22T23:20:47Z | indexed / PASS |
| `/merino-wool-manufacturer/` | 2026-08-15T01:58:03Z | indexed / PASS |
| `/outdoor-clothing-manufacturer/` | 2026-08-12T11:36:38Z | indexed / PASS |
| `/privacy-policy/` | 2026-08-15T04:28:01Z | indexed / PASS |

本批未选择的 8 个 Sitemap URL 为 Services、Silk Wear、Sports Accessories、Sportswear、Sustainability、Technical Guides Hub、Tech Pack Guide 与 Underwear；状态是 `unselectedDue / skipped`，不是检查失败或未收录。它们均在同窗口有保留的 GSC Page 行，并在最新 Crawl 中保持 200、可索引和自引用 Canonical；后续配额窗口再补 URL Inspection，不据此推断完整站点覆盖率。

QC Guide 已确认进入 Google 索引，最后抓取发生在所有者请求编入索引当日。处置为 `no-change / monitoring`：不重复请求编入索引，不修改页面；继续观察首次保留曝光与查询。

## 2026-08-26：SEO-V2-002 28 天基线（2026-07-26 至 2026-08-22）

这是 GSC 可返回 `dataState: final` 的最新完整 28 天窗口。对比窗口 2026-06-28 至 07-25 大部分位于 2026-07-22 正式上线前，因此本轮建立上线后基线，不把前后差异写成自然增长或改版因果。

### 数据完整性

- GSC：总量、Page、Query、Country、Device 与 Query × Page 均完成全量 API 读取；Page 19 行、Query 6 行、Country 34 行、Device 2 行，均无分页截断。Query 仍受低量匿名化影响，缺失查询不等于零需求。
- GA4：同一窗口完成 Channel、Organic Landing Page 与 `generate_lead` 读取；API 未返回 sampling metadata。Property 时区为 `Asia/Shanghai`。Consent 和埋点口径仍可能使 GA4 与 GSC 不一一对应。
- 询盘：初次导出时为 `partial / owner-input`；2026-08-27 已由所有者完成业务核验，当前状态为 `complete`。核验结果见下方，仅保存汇总，不记录联系人个人数据。

### GSC 总量与设备

总量为 5 次点击、184 次曝光、2.72% CTR、平均排名 21.3。

| Device | 点击 | 曝光 | CTR | 平均排名 |
|---|---:|---:|---:|---:|
| Desktop | 5 | 164 | 3.05% | 23.1 |
| Mobile | 0 | 20 | 0% | 6.6 |

### GSC 页面

Page 维度按 URL 计数，多个本站结果可在同一搜索结果中分别产生曝光，因此各行不可与 Property 总量机械相加。

| 页面 | 点击 | 曝光 | CTR | 平均排名 |
|---|---:|---:|---:|---:|
| `http://athletikapparel.com/`（非规范变体） | 2 | 8 | 25.00% | 4.4 |
| `/` | 2 | 67 | 2.99% | 5.7 |
| `/merino-wool-manufacturer/` | 1 | 16 | 6.25% | 19.5 |
| `/#ma-home-categories-title` | 0 | 1 | 0% | 8.0 |
| `/about-us/` | 0 | 31 | 0% | 5.9 |
| `/contact/` | 0 | 14 | 0% | 27.6 |
| `/evaluate-technical-knitwear-oem/` | 0 | 8 | 0% | 16.5 |
| `/flatlock-vs-overlock-technical-knitwear/` | 0 | 26 | 0% | 26.3 |
| `/knitted-fabrics-manufacturer/` | 0 | 15 | 0% | 49.1 |
| `/outdoor-clothing-manufacturer/` | 0 | 21 | 0% | 25.3 |
| `/privacy-policy/` | 0 | 21 | 0% | 8.9 |
| `/services/` | 0 | 1 | 0% | 8.0 |
| `/silk-wear-manufacturer/` | 0 | 13 | 0% | 13.9 |
| `/sports-accessories-manufacturer/` | 0 | 20 | 0% | 6.9 |
| `/sportswear-manufacturer/` | 0 | 27 | 0% | 9.5 |
| `/sustainability/` | 0 | 15 | 0% | 12.2 |
| `/technical-guides/` | 0 | 6 | 0% | 23.2 |
| `/technical-knitwear-tech-pack-guide/` | 0 | 23 | 0% | 16.7 |
| `/underwear-manufacturer/` | 0 | 19 | 0% | 24.9 |

`/garment-quality-control-checklist/` 未进入 Page 返回行。该页面较新且 Query/Page 数据受延迟和低量保护影响，本次只记为 `monitoring`，不写成零曝光、未收录或页面失败。

### GSC 查询

| Query | Target page | 点击 | 曝光 | 平均排名 |
|---|---|---:|---:|---:|
| `atheletik` | `/` | 0 | 1 | 1.0 |
| `athletik` | `/` | 0 | 1 | 5.0 |
| `athletique clothing` | `/` | 0 | 1 | 22.0 |
| `flatlock vs overlock` | `/flatlock-vs-overlock-technical-knitwear/` | 0 | 2 | 22.5 |
| `overlock vs flatlock` | `/flatlock-vs-overlock-technical-knitwear/` | 0 | 1 | 11.0 |
| `sukartik clothing private limited` | `/sportswear-manufacturer/` | 0 | 1 | 45.0 |

可见 Query 只覆盖 7 次曝光，不能代表全部 184 次 Property 曝光。两条 FLATLOCK / OVERLOCK 非品牌变体是首轮可见的指南发现信号，但合计仅 3 次曝光，不触发内容或 Title/Meta 修改。

### GSC 国家

| 目标市场 | 点击 | 曝光 | CTR | 平均排名 |
|---|---:|---:|---:|---:|
| US | 3 | 96 | 3.13% | 16.8 |
| CA | 0 | 7 | 0% | 3.9 |
| GB | 0 | 7 | 0% | 10.4 |
| DE | 0 | 4 | 0% | 4.8 |
| NL | 0 | 2 | 0% | 8.0 |
| SE | 0 | 3 | 0% | 1.7 |

Israel 为 1 点击 / 1 曝光，Türkiye 为 1 点击 / 6 曝光。其余完整返回行为：ARG 1、AUS 1、BGD 2、CHN 4、DNK 1、ESP 1、FRA 1、GHA 1、HKG 3、IDN 2、IND 10、JOR 1、KAZ 1、KOR 1、MAR 2、MEX 1、MYS 2、PAK 2、PHL 7、RUS 1、SAU 1、SGP 2、SVK 2、UKR 1、UZB 1、VNM 6 次曝光，均 0 点击。NO / FI 本轮无返回行；缺行不等于零搜索需求。

### GA4 Organic Search 与 `generate_lead`

| Channel | Sessions | Total users | Event count | Key events |
|---|---:|---:|---:|---:|
| Direct | 94 | 81 | 407 | 2 |
| Organic Social | 37 | 29 | 220 | 1 |
| Paid Search | 24 | 16 | 104 | 1 |
| Organic Search | 2 | 2 | 10 | 0 |
| Unassigned | 2 | 1 | 8 | 0 |
| AI Assistant | 1 | 1 | 2 | 0 |

Organic Search 只有一个 Landing Page 行：`/` 为 2 sessions、2 users、10 events、0 key events。Organic Search × `generate_lead` 返回 0 行，因此本窗口没有可归因到自然搜索的 GA4 lead event。

全站 `generate_lead` 返回 8 次 event count、4 次 key events：

| 日期 | Channel | Landing Page | Event count | Key events |
|---|---|---|---:|---:|
| 2026-07-28 | Direct | `/` | 1 | 0 |
| 2026-07-29 | Direct | `/` | 1 | 0 |
| 2026-08-01 | Organic Social | `/` | 1 | 0 |
| 2026-08-05 | Direct | `/contact` | 1 | 1 |
| 2026-08-05 | Direct | `/outdoor-clothing-manufacturer` | 1 | 1 |
| 2026-08-05 | Paid Search | `/contact` | 1 | 0 |
| 2026-08-05 | Paid Search | `/sportswear-manufacturer` | 1 | 1 |
| 2026-08-10 | Organic Social | `/` | 1 | 1 |

`eventCount` 与 `keyEvents` 的 8 / 4 差异与窗口内可能存在的事件配置启用时间相容，但本轮未取得管理界面变更记录，不能确定原因。月度基线继续以 `eventName = generate_lead` 的 event count 作技术信号，以人工确认的有效/合格询盘作业务结果。

### 2026-08-27：询盘人工核验

- 所有者确认 2026-08-01 的 Organic Social → `/` 事件对应 1 次有效询盘。
- 所有者确认 2026-08-10 的 Organic Social → `/` 事件对应 1 次不合格询盘。
- 其余 6 次事件均为测试或无效询盘；本次未进一步拆分测试与无效数量，因此只按“未计入有效询盘”汇总，不推断明细。
- 本窗口业务基线：8 次 `generate_lead` 中有效询盘 1 次，未计入有效询盘 7 次。唯一有效询盘归因为 Organic Social；Organic Search 仍为 0 次 `generate_lead`、0 次有效询盘。
- 数据状态为 `complete`：GA4 事件与所有者业务核验已经对齐，未记录联系人个人数据。SEO-V2-002 可关闭。

### 页面级决策与 Finding outcome

- `no-change / deferred`：没有单页或可比较 Query × Page 达到 100 曝光门槛；不修改 URL、Title、Meta、H1、正文或页面所有权，不新增近义页面。
- `monitoring`：首页、About、Sports Accessories 与 Sportswear 已出现靠前但低量曝光；Merino 获得 1 次点击；FLATLOCK 指南出现首批非品牌查询。以上只建立方向，不形成因果结论。
- `monitoring`：最近 7 天曝光相对前 21 天日均上升 92.9%，点击下降 25%；只有曝光达到异常阈值。报告识别到算法更新时间重叠，但未建立归因，不据此改站。
- `no-change / completed`：询盘业务核验已补齐；唯一有效询盘来自 Organic Social，Organic Search 没有 lead event 或有效询盘。SEO-V2-002 关闭，不把社交流量成果归因给 SEO。

## 2026-08-26：QC Guide 已请求编入索引

- 所有者确认已在 GSC 网页版对 `/garment-quality-control-checklist/` 请求编入索引；SEO-V2-001 的平台操作已完成。
- 证据来源为所有者操作确认，数据状态为 `partial`：本次未提供 GSC 截图，因此“测试实际网址”的精确结论、当前索引覆盖分类、最后抓取日期与状态均为 `unavailable`，不得据此写成已收录。
- 处置结论：SEO-V2-001 标记为 `completed`；不重复请求、不改写页面，后续发现、抓取、收录和首次曝光统一归入 SEO-V2-003 的正常监测窗口。未收录或报告延迟本身不等于页面失败。

## 2026-08-20：QC Guide 部署与 URL Inspection 尝试

- `/garment-quality-control-checklist/` 已完成生产部署，普通浏览器、Googlebot、OAI-SearchBot 和 PerplexityBot 请求均返回 HTTP 200；Canonical 自指，robots meta 为 `follow, index`，Page Sitemap 已包含该 URL。
- `seo technical-watch` 使用 `sc-domain:athletikapparel.com` 对该 URL 发起只读 URL Inspection；API 返回 `internal_error: fetch failed`，本次状态为 `partial`，未获得 Google 索引快照。
- 该错误表示 URL Inspection 检查不完整，不等于页面抓取或索引失败。下一步在 GSC 网页版执行“测试实际网址”，通过后请求编入索引；不要在结果出现前重复改写页面。

## 2026-08-18：28 天窗口（2026-07-17 至 2026-08-13）

对比窗口 2026-06-19 至 07-16 为上线前，无数据属预期；本轮为上线后单窗口数据，不存在环比下降。
总量与 2026-08-15 网页版截图一致（国家口径 5 点击 / 94 曝光），API 数据通道与手工观察一致。

### 页面（含匿名化行，合计 170 曝光）

| 页面 | 点击 | 曝光 | 平均排名 |
|---|---:|---:|---:|
| `/` | 3 | 55 | 6.5 |
| `/about-us/` | 0 | 20 | 5.7 |
| `/sportswear-manufacturer/` | 0 | 16 | 10.0 |
| `/underwear-manufacturer/` | 0 | 10 | 26.9 |
| `/merino-wool-manufacturer/` | 0 | 9 | 14.9 |
| `/sports-accessories-manufacturer/` | 0 | 9 | 4.3 |
| `http://athletikapparel.com/`（非规范变体） | 2 | 8 | 4.4 |
| `/knitted-fabrics-manufacturer/` | 0 | 8 | 38.8 |
| `/privacy-policy/` | 0 | 8 | 9.0 |
| `/outdoor-clothing-manufacturer/` | 0 | 7 | 17.6 |
| `/technical-knitwear-tech-pack-guide/` | 0 | 7 | 10.7 |
| `/flatlock-vs-overlock-technical-knitwear/` | 0 | 4 | 20.0 |
| `/sustainability/` | 0 | 4 | 8.0 |
| 其余 5 页（contact / evaluate-oem / services / guides hub / 首页锚点） | 0 | 各 1 | 8–30 |

### 查询

仅 4 行品牌变体词可见：`atheletik`（1 曝光，排名 1）、`athletik`（1，5）、
`athletique clothing`（1，22）、`sukartik clothing private limited`（1，45），均 0 点击。
无非品牌查询进入可见行。

### 国家（目标市场节选）

| 国家 | 点击 | 曝光 | 平均排名 |
|---|---:|---:|---:|
| US | 2 | 51 | 13.7 |
| CA | 0 | 7 | 4.7 |
| DE | 0 | 3 | 3.7 |
| GB | 0 | 3 | 14.0 |
| NL | 0 | 2 | 8.0 |

另有土耳其、丹麦、以色列各 1 次点击（非目标市场，样本噪声）。SE / NO / FI 本轮无可见行。

### 本轮解读与决策

- 样本远低于 100 曝光观察门槛：本轮不触发任何 Title/Meta/正文修改。
- `sportswear-manufacturer` 16 曝光、平均排名 10.0，是最接近第一页的商业页；
  `knitted-fabrics-manufacturer` 排名 38.8 最靠后——与关键词研究的竞争度判断方向一致，仅作方向记录。
- `http://athletikapparel.com/` 非规范变体出现 2 点击 / 8 曝光：Canonical 与跳转链工作正常
  （GSC 按页面归组时可能分开显示），不处理，持续观察。
- 90 天总览中"日均曝光 2.3 → 9.3"的 anomaly 信号对应网站上线与指南发布，属预期，不是异常流量事件。
- GSC 网页版 Page indexing 的未收录原因示例 URL 无 API，仍需登录网页版人工核对。

### 例行导出命令

```bash
export HTTPS_PROXY=http://127.0.0.1:7892 HTTP_PROXY=http://127.0.0.1:7892
seo reports run segment-impact --params '{"site":"sc-domain:athletikapparel.com","dimension":"query","days":28,"compareDays":28,"maxRows":100}' --json
# dimension 可换 page / country；代理端口以本机 Fastlink 实际系统代理为准
```

---

## 2026-08-15（网页版截图，历史补录）

3 个月视图（可见区间 2026-07-21 至 08-12）：总点击 5、总曝光 94、平均 CTR 5.3%、平均排名 12.7。
查询表 4 行品牌变体词各 1 曝光 0 点击。Sitemap 状态成功，2026-08-13 最后读取，发现 17 个网页。
4 个 Technical Guides URL Inspection 均显示已收录、HTTPS 通过。
Page indexing 汇总停留在 2026-08-07（已收录 11 / 未收录 12），早于指南上线，不代表当前覆盖率。
Core Web Vitals 移动端与桌面端均因 90 天数据不足无现场结论。
