# GSC / GA4 / 询盘数据记录（持续更新）

> 网站属性：`sc-domain:athletikapparel.com`（siteOwner）
> GA4 Property：`547377703`
> 用途：按 `seo-process.md` 阶段 B / 阶段 L 保存 Google Search Console、GA4 与人工询盘核验的周期性数据快照，
> 作为 Title/Meta 测试、页面优先级、获客质量和月度复盘的一方数据真值。
> 数据获取：2026-08-18 起通过 `seo` CLI 只读 API 导出（接入记录见
> [`seo-cli-baseline-2026-08-18.md`](seo-cli-baseline-2026-08-18.md)）；更早的数据为网页版手工截图。
> 原始 JSON 存于本机 `~/seo-reports/`（不进 Git）。
>
> 记录纪律：
> - GSC 对低量查询做匿名化处理；某维度单行缺失不等于零流量，各维度合计口径可能不同。
> - GA4 `generate_lead` 是分析事件，不自动等于真实、有效或合格 B2B 询盘；必须与表单、收件箱或 CRM 人工核对。
> - 样本低于 100 曝光门槛时只记录方向，不触发页面修改（`seo-process.md` §5）。
> - 新条目追加在最新日期处，不覆写历史快照。

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
- 数据状态：2026-08-28 生产 `page-sitemap.xml` 完整读取；
- 观察：Page Sitemap 有 19 个 `<url>` 条目和 18 个唯一 URL；`/garment-quality-control-checklist/` 以完全相同的 URL 与 `lastmod=2026-08-20T08:31:05+00:00` 重复两次；
- 影响判断：重复条目不产生新 URL、重定向、canonical 冲突或索引阻塞，不能解释 Services 未收录；QC Guide 本次首批 Inspection 已为 indexed / PASS；
- 失效判定：刷新 Rank Math Sitemap 缓存后只剩一个 QC Guide 条目，或查明两个不同公开对象确实需要不同规范 URL；
- 最小动作：单独核对生产 WordPress 中对应 Page 对象和 Rank Math Sitemap 缓存/生成链，优先刷新缓存后复验，不在 SEO-V2-003 内改 URL 或页面正文；
- 当前 outcome：`deferred / separate sitemap cleanup`。

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
