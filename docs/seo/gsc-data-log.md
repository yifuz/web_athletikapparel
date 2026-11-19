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
> - 100 次曝光是 CTR 元数据实验的初始观察门槛，不是所有内容改进的禁改线；低样本的 B 类改进须满足 `seo-process.md` §5.1 的业务事实、采购任务、单一变量、授权与复盘要求。
> - GSC Generative AI 的 Property 总量与 Page 明细使用不同聚合方式；Page 行不可机械相加后当作独立 AI 回答次数。
> - 新条目追加在最新日期处，不覆写历史快照。


## 历史月度基线速查

| 窗口 | GSC Clicks / Impressions | 七商业品类页 | GA4 Organic Search | 备注与归档 |
|---|---:|---:|---:|---|
| 2026-08 自然月 | 8 / 329 | — | 2 sessions（0 lead） | 正式有效询盘 0（09-08 更正） |
| 2026-09 自然月 | 32 / 1,280 | — | 2 sessions（Cookiebot 漏测下限） | 163 邮箱核验 6 封真实询盘；Generative AI 09-03～09-30 为 190 impressions |
| 2026-10-08～11-04（恢复窗） | 36 / 1,443 | 14 / 599 | 16 sessions / 11 users | AI Assistant 21 sessions；正式询盘未核验 |

> 2026-08 至 2026-10 完整历史记录已原样归档至 [docs/archive/gsc-data-log-history-2026-08-to-10.md](../archive/gsc-data-log-history-2026-08-to-10.md)。

## 2026-11-19：URL Inspection 复查与 Knitted / Merino 完整 28 天后窗

只读复查（`seo-clash` v0.2.36，`sc-domain:athletikapparel.com`，`type=web`、`dataState=final`、`rowLimit=25000`，均未触顶）；未修改网站或重复提交索引。

### 1. 五个规范 URL 索引复查

| URL | Verdict / Coverage | Google / User Canonical | Last Crawl (UTC) | 说明 |
|---|---|---|---|---|
| `/product-showcase/mens-merino-tencel-mesh-long-sleeve-shirt/` | `PASS / Submitted and indexed` | 一致 | `2026-11-16T20:08:39Z` | 11-10 申请已收录，11-17 到期复查关闭 |
| `/product-showcase/womens-wool-jacquard-base-layer-set/` | `PASS / Submitted and indexed` | 一致 | `2026-11-16T00:15:03Z` | 已收录，Breadcrumbs Rich Results `PASS` |
| `/product-showcase/mens-half-zip-fleece-top/` | `NEUTRAL / Discovered - currently not indexed` | 未返回 | 未返回 | Sitemap 已列出；robots/indexing/fetch 均 `UNSPECIFIED` |
| `/product-showcase/mens-half-zip-top-and-tights/` | `PASS / Submitted and indexed` | 一致 | `2026-11-15T23:02:13Z` | 已收录，Breadcrumbs Rich Results `PASS` |
| `/technical-knitwear-tech-pack-guide/` | `PASS / Submitted and indexed` | 一致 | `2026-10-16T13:23:03Z` | 仍未越过 `2026-10-16` 抓取 |

### 2. Final 边界与 Knitted / Merino 28 天后窗（`2026-10-21～11-17`）

日期边界探测（`11-01～11-19`）返回连续 17 日，最新 `final` 已覆盖 **`2026-11-17`**（`11-18 / 19` 未返回）；全站控制窗 `10-21～11-17` 为 28/28 连续 `final` 日（35 clicks / 1,300 impressions）。

| 页面与窗口（均 28 天 `final`） | 精确 Page（Clicks / Imp / CTR / Pos） | Query × Page（行 / Clicks / Imp） | 固定观察词表现与关键限制 |
|---|---|---|---|
| **Knitted** 前窗 `09-20～10-17` | 1 / 84 / 1.19% / 13.63 | 9 / 0 / 17 | 固定 7 词 14 imp / 0 clicks |
| **Knitted** 后窗 `10-21～11-17` | **1 / 177 / 0.56% / 25.17** | **19 / 0 / 108** | 固定 7 词返回 5/7，合计 **58 imp / 0 clicks**（加权位 31.81）：`knitted fabric manufacturer` 50 / 33.36、`functional knitted fabrics factory` 3 / 24.00、`performance knit fabric oem` 3 / 21.67、`functional knit fabrics manufacturers` 1 / 12.00、`performance knit supplier` 1 / 28.00；另 2 词及四类结构词 `not-returned`。Country×Device 19 行 0/108（US 55），与 Page 177 不闭合 |
| **Merino** 前窗 `09-23～10-20` | 4 / 177 / 2.26% / 6.56 | 5 / 0 / 13 | 固定 4 词均 `not-returned` |
| **Merino** 后窗 `10-21～11-17` | **7 / 201 / 3.48% / 8.60** | **14 / 0 / 28** | 固定 4 词返回 1/4：`merino wool clothing manufacturer` **4 imp / 0 clicks / 26.75**（四维：US desktop 2/29、VN desktop 2/24.5）；另 3 词 `not-returned`。相邻词有 `merino wool manufacturers` 2/6、`merino wool clothing manufacturers` 1/12、`merino wool manufacturer` 1/29、`oem base layer manufacturer` 1/1、`lightweight base layer manufacturer` 1/45 等；Country×Device 11 行及四维 17 行均 0/28（US 17），7 次点击全在未披露查询 |

- **特例与处置**：两页 Query / Country 均与 Page 总量不闭合，披露查询均 0 点击，且后窗混入 10-23 / 10-31 内链与 11-04 Showcase 等共同变量。Knitted 判 `no-change / inconclusive`（商业词曝光扩大但点击持平且主词位置偏后），Merino 判 `no-change / keep-measuring`；均不改 URL / Title / Meta / H1，原 Day 90 节点不重置。

## 2026-11-10：Knitted Fabrics 定向搜索诊断

结论为 **`no-change / diagnosis-complete / fabric-examples-confirmed`**。现有主词和独立面料采购任务匹配；可见核心商业词的位置偏后，尚无足够证据将零点击归因于 Title／Meta。现页已覆盖结构、定制与采购流程，最值得准备的下一变量是 **具体面料编号、成分、GSM 与真实展示的对应关系**。该呈现缺口已确认，但是否解释当前排名、补齐后能提升多少仍未验证。本轮没有网站代码、媒体、数据库或部署改动，也没有新增 Backlog ID。

### 范围、证据与完整性

- 环境／日期／模式：2026-11-10 生产 `https://www.athletikapparel.com/knitted-fabrics-manufacturer/`，`targeted`。检查该页原始 HTML、响应头、首页入口、robots 和 Page Sitemap；不把单页检查写成全站无问题。本轮没有重新进行 URL Inspection、视觉／性能或表单提交测试。
- 结构化入口：`page-opportunities` 先读取 actions，再读取同次缓存的 full 报告；窗口 **10-09～11-05**。14 条源 Query、1 条低可操作性排除、13 条 eligible 全部检查，共 52 impressions／0 clicks；报告未截断。它与下列固定窗口日期不同，不混合数值。
- GSC：沿用上次恢复基线，追加 **9 份、74 行**精确页或精确页＋查询报表，全部核对。固定前窗 **09-10～10-07**、当前窗 **10-08～11-04**，均 `web / final / rowLimit=25000`；没有输出截断。明细聚合不闭合处见下文，不当作取得全部真实查询。
- SERP：两词 × US／GB／CA，Google、English、desktop、请求 depth 50；**6/6 成功，232 条返回 organic 结果全部阅读标题／摘要及目标 URL**。覆盖的是返回结果，非六份完整 50 条自然结果。原始 Google 跳转 URL 全部解析到实际目标；保留原始排名和 URL，派生目标单列，不用去重结果重排 Athletik 名次。
- 232 条合计 187 个完全相同目标 URL 去重后项；组内额外重复共 5 条（core-CA 2、performance-US 2、performance-GB 1），另 performance-US rank 9／11 仅 `srsltid` 不同。角色分类按标题、摘要、目标地址判断，不代表逐页核验 232 个网站的工厂身份或正文。
- 今日 DataForSEO 新增费用 **$0.052**，6 次付费请求、0 次付费重试；账户余额 **$49.562680**，当日 spend 与本批一致。现有日硬限额 $1、月限额 $5 未变。Google 跳转解析不是新增付费 SERP 请求；其中 1 条首次未解析、单次重试成功，最终 232/232。
- 原始响应、页面 HTML、逐行分类、跳转链、支出核验和 SHA-256 manifest 留在 Git 忽略目录 `.chrome-check/knitted-search-diagnosis-2026-11-10/`。未调用邮件或 Google Ads，也未修改任何外部设置。

### 排名与搜索意图：保留主词，不能把 OEM 次级词直接升级为主词

| Exact query | 市场 | 本次返回 organic 行 | Athletik 正式面料页 |
|---|---|---:|---|
| `knitted fabric manufacturer` | US | 46 | **自然结果 rankGroup 25**；rankAbsolute 32，page 3，落地 URL 正确 |
| 同上 | GB | 45 | 返回结果中未见 |
| 同上 | CA | 45 | 返回结果中未见 |
| `performance knit fabric oem` | US | 48 | 返回结果中未见 |
| 同上 | GB | 26 | 返回结果中未见 |
| 同上 | CA | 22 | 返回结果中未见 |

“未见”只描述这一日期、地区、设备和保留结果集，不等于无排名、未索引或已验证排在第 50 名以后。不得把单次 US 第 25 名和跨日期／市场的 GSC 平均位置 35.05 当成排名改善 10 位。

核心词仍包含真实面料制造／供应采购页，也混入目录、榜单、零售和社交结果；GB 更偏直接厂家页面，但仍有成衣／梭织等混合结果。没有支持改 URL、Title、H1 或另建近义页的证据。`performance knit fabric oem` 在本次 US **36/48**、CA **13/22** 返回行属于零售／现货／消费者平台；GB 混合程度不同，不能由 US 推及所有市场。含 OEM 并不自动使一个查询更精准；该词保留为次级需求线索，不替换主词。上述比率是保留结果行数，含已披露重复，不是独立商家市场份额。

### GSC：商业词可见度扩大，但峰值不证明 10-20 改版收益

| 口径 | 前窗 | 当前窗 | 解释 |
|---|---:|---:|---|
| 精确页 clicks／impressions／average position | 1／88／14.95 | **0／173／16.71** | 曝光增加，尚未带来本窗点击增长 |
| 精确页可见 Query 合计 | 0／17 | 0／54 | 前窗 71、当前 119 次页面曝光无法由返回查询解释 |
| `knitted fabric manufacturer` impressions／position | 2／25.50 | **22／35.05** | 核心商业词覆盖增加，位置仍偏后；市场、设备和日期构成可能变化，不能当作固定条件下的排名变化 |
| `performance knit fabric oem` impressions／position | **1／26.00** | **3／21.67** | 本次精确页前值；下方历史基线的全站 Query 4／40.5 不是该页前值 |

固定七个商业词（core、functional knit fabrics manufacturers、functional knitted fabrics factory、performance knit fabric oem、performance knit supplier、custom knit fabric oem、breathable knitted fabric supplier）可见曝光 **11→32**，均零点击；加权位置 26.00→31.94，保留低量与构成变化限制。新增精确页 Query 与此前当前窗 Query × Page 的 14 行一致。当前没有披露四种结构词，不等于这些结构无需求或模块失败。

精确页 Country 和 Device 合计同为 **17→54 impressions**，加权位置与 Query 样本相同，却不与页面 **88→173** 闭合，状态为 **`partial / non-reconciled`**。只确认规模与保留查询样本一致，不能证明具体过滤机制或诊断 CLI／GSC 故障。US 14→28、GB 1→4 仅为返回行值，不是整页国家份额；无 CA 行不等于零曝光。Desktop 53／Mobile 1 也不能当整页设备比例。另对当前 core 查询单独按国家／设备分组可闭合 22 impressions，其中 US 8／position 37.375、22 次均 desktop；该更窄结果不外推给整页。

当前精确页 Date 28 行完整闭合 **173 impressions／0 clicks／position 16.7052**。最高峰 **10-19 的 29 次曝光在 10-20 部署之前**；10-08～19 为 81 次、部署日 17 次、10-21～11-04 为 75 次。因此不能把图中最高峰归因于结构模块，也不能将整个窗口描述为部署后持续增长；同样没有证据证明模块造成下降。

### 页面覆盖、工具处置与真实缺口

生产检查通过：HTTP 200、`follow, index`、无 X-Robots 限制、唯一 self-canonical 和 H1；Title／Meta／社交描述与 `seo-tags.md` 一致；首页有 2 个可抓取入口、Page Sitemap 出现 1 次。四种结构卡及 12 组说明存在；独立面料供应、own fabric mill、in-house testing、五产品族、材料／用途、开发输入、按项目 MOQ、样品审批、测试和四步采购流程均已覆盖。不新增一组重复能力文案或采购流程。

`page-opportunities` 的 13 行全部处置如下；工具的“精确字面未出现”不直接构成内容缺陷：

| 源 Query／组 | 行数 | 人工核对与 outcome |
|---|---:|---|
| `verified functional knit fabric from china recommended manufacturers`；`excellent functional knit fabric brand buying guide` | 2 | 8／1 次曝光，不能支持 CTR 实验；不加入 verified／recommended／excellent 自荐词，不把商业页改成买家指南。`no-change` |
| core；复数 manufacturers；functional knit fabrics manufacturers；performance knit fabric oem | 4 | 采购主题已覆盖，排名与低样本需观察；不做单复数堆词或凭零点击改 metadata。`no-change` |
| functional knitted fabrics factory；apparel knit textile manufacturer；performance knit supplier；breathable knitted fabric supplier | 4 | 自有面料厂、面料供应及功能开发已有表达；不为补 factory／textile／supplier 字面而重复写作，不补无测试支撑的性能结果。`no-change` |
| premium knitted apparel fabrics；UK 长串采购词；acetate knit fabric manufacturer | 3 | 不加 premium 自夸、不暗示英国本地工厂、不扩张未确认的 acetate 能力。`no-change` |

两个工具 fix action **`action-23418f3fc3aa`、`action-958fe698952f` 均为 `not-needed`**：分别针对上述自荐词及机械归组的 8 个 content gaps；现有证据不能支持原建议。工具 estimatedClickLift **0.55** 使用默认曲线及极小样本，不作为预期点击收益。报告的 1 个非 HTTP 链接排除是覆盖提示，非已证实断链。六份 SERP 的 **`repeated-domain`／`domains[0]`** 均为 `not-needed`：原始 URL 全为 Google 跳转而误算成 google.com 集中，真实目标已另行解析；不能据此诊断竞争者垄断或 Athletik 缺席。

本次没有确认新的 Critical／Warning。以下为同一现有 Backlog 项内的 `review / Info / P1`：

- **观察（Confirmed）**：五组类别图片尚未与某一实际面料的编号、确切成分和 GSM 一一对应；类别覆盖不等于买家能评估一个具体布样。
- **推断（Unverified）**：补充实物规格可能增强采购任务匹配与内容独特性，但不是已证实的低排名原因；未核验外链竞争强度，不把剩余差距全部归因于内容或域名权重。
- **最小后续变量**：在现有面料页准备少量真实面料例子，展示编号、成分、GSM、应用及已确认的对应视觉。结构／幅宽可在取得资料后加入，不为凑规格阻塞最小版本；不创建一批薄产品页。
- **证伪／调整条件**：若现页已经存在同等可识别的实物规格，或目标词进一步证据证明需要完全不同的采购产品，则重评该模块，不继续机械扩建。
- **outcome**：本轮 `no-change`；下一批经授权实施时另建 Change Card，记录单一主变量、生产检查与独立前后窗。原观察窗口不重置。

作为展示组织参考，读取了 [EYSAN 具体 interlock 产品](https://www.eysan.com.tw/product/100-polyester-micro-birdseye-mesh-interlock-fabric/)、[Fuzhou 具体 jacquard 产品](https://www.fuzhoutextile.com/breathable-polyester-knit-weft-jacquard-mesh-fabric-for-sportswear-product/)和 [Caracol 面料总页](https://www.caracolknits.com/products-services/knit-fabric)：可参考编号／规格／应用／取样入口的连接方式，不复制对方参数、商业条款或将其内容归因为排名原因。前两页亦存在模板残留／内部表述冲突，不能当作整体质量标杆；这些补充样本不冒充本次全部排名页审核。

另定向读取本次快照的 [Huiliang Circular Knitted Fabric](https://www.huiliang-textile.com/en/category/Circular-Knitted-Fabric.html)（core-US 第 10）与 [Fuzhou FTT-WB364](https://www.fuzhoutextile.com/88-polyester-12-spandex-stretch-jersey-knit-fabric-for-sportswear-product/)（performance-GB 第 7）：前者把有编号布样连接详情与 Request Swatches，后者把具体货号、成分／GSM／幅宽、用途和询盘放在一起。Web 读取标注分别为三周前／上月缓存，不当作今天的新鲜 HTTP 验收；只支持展示组织参照，不能证明这些模块造成其排名。连同 [EYSAN interlock 类目入口](https://www.eysan.com.tw/product-category/knitting-structure/interlock/)共读取 6 个官方代表页面，而非全体搜索结果正文。

### 所有者确认与下一步

所有者在本轮明确确认以下两款均可作为**对外独立供货的面料例子**，此前“是否可复用”的依赖已解除：

| Fabric reference | 已批准 Composition | Fabric weight | 可复用的现有展示 |
|---|---|---:|---|
| HY254955 | 52% Merino wool／43% Polyester／5% Spandex | 155 GSM | Ocean Depth 女式上衣与 leggings 套装 |
| HY265077 | 80% Tencel／20% Merino wool | 115 GSM | 男式长袖 Showcase |

可先准备这两款的本地面料示例模块，沿用已批准规格与实际成衣应用；**成衣图片只表示面料应用，不冒充布样近摄**。本次确认不包含库存、可订颜色、幅宽、具体 MOQ、价格、未确认结构或性能数值；公开面料 MOQ 仍按项目确认，不套用成衣 500 件、不公开旧内部 1,000–3,000 kg 口径，不关联 Beta Textiles。

本轮完成的是诊断与事实补齐，尚未获新模块制作／上线授权。后续最值得执行的是两款实物证据的 Local 审核版；优先在原结构模块完整后窗 **10-21～11-17** 结束后再安排新变量上线，预计 **11-20** 起按 final 数据核验。原页面 **11-30 Day 90**、结构模块 **2027-01-18 Day 90** 不重置。无需再为相同问题扩充结构词研究或立即修改 Title／Meta。

## 2026-11-10：10-08～11-04 GSC＋GA4 恢复窗口基线

SEO-V2-002 本轮 **GSC＋GA4 基线已补齐**，状态 `baseline-established / keep-measuring`；正式／合格询盘及其来源为 `unverified`，本次没有读取邮箱。此窗口是 10-08 Cookiebot 修复后第一份指定的 28 天观测，**不是修复效果或任一页面改版的因果实验**。10-08 本身包含修复前时段及明确内部 QA，不将整日视为纯净的修复后样本；9 月漏测不回填。

### 范围、覆盖与原始证据

- GSC：`sc-domain:athletikapparel.com`，`web / final / refresh`；当前窗 **2026-10-08～11-04**、相邻前窗 **2026-09-10～10-07**，均 28 日。按日期、总量、Page、Query、Country、Device 分别取数，另取当前 Query × Page。13 份响应、513 行全部检查，最大单份 104 行、`rowLimit=25000`，无本次输出截断或触顶；两窗日期各连续 28 行。Search Analytics 仍有匿名化和内部保留限制，未触顶不代表取得全部潜在查询。GSC 日期使用 PT，与 GA4 的时区分开。[官方 API 口径](https://developers.google.com/webmaster-tools/v1/searchanalytics/query)
- GA4：`547377703 / www.athletikapparel.com`，metadata 时区 **Asia/Shanghai**。15 份报表、118 行全部检查，rowCount 与实际返回一致，最大 27 行、limit 10000；metadata 未返回 sampling、thresholding、other-row loss 或 schema restriction 警告。日期表 27 行，**10-25 未返回行**，不能单凭缺行诊断持续漏测，也不补造访问；日期累计与总量一致。API 完整返回不等于全部真实访客都被采集。[GA4 metadata 定义](https://developers.google.com/analytics/devguides/reporting/data/v1/rest/v1beta/ResponseMetaData)
- 请求、完整响应及 SHA-256 manifest 保存于 Git 忽略目录 `.chrome-check/seo-baseline-2026-10-08_2026-11-04/`；13 次 Search Analytics、15 次 GA4 report 均成功，另只读核对属性身份。没有付费 SERP、Google Ads API、邮件、后台配置或生产部署操作。
- 结构化 `search-performance-overview` 的已描述 schema 只有滚动窗口参数，不支持这次固定日期；按其 avoidWhen 指引改用精确日期的原始只读报表，避免把滚动结果冒充指定恢复窗口。

### GSC 全站与搜索需求

| Property 指标 | 前窗 09-10～10-07 | 当前窗 10-08～11-04 | 变化 |
|---|---:|---:|---:|
| Clicks | 28 | **36** | +8，+28.6% |
| Impressions | 1,259 | **1,443** | +184，+14.6% |
| CTR | 2.22% | **2.49%** | +0.27 个百分点 |
| Average position | 10.45 | **9.79** | 数值改善 0.66，不是固定关键词排名 |

两窗 Date、Country、Device 的 clicks / impressions 及曝光加权位置均与 Property 总行一致。Page 合计为 **28 / 1,453 → 36 / 1,715**，与 Property 曝光不是同一聚合口径；不得把 1,715 当全站曝光。Query 合计为 **2 / 180 → 1 / 248**，当前仅披露 36 次点击中的 1 次，35 次点击无法由查询表解释，不能猜词或精确计算全站非品牌点击占比。当前 Query × Page 87 行合计 **1 / 385**，也不与独立 Query 表机械相加。

七个商业品类的同口径 Page 数据如下；页面合计增长不等于其中每次曝光都来自商业词：

| 页面 | 前窗 clicks / impressions | 当前 clicks / impressions | 当前 Page average position |
|---|---:|---:|---:|
| Knitted Fabrics | 1 / 88 | **0 / 173** | 16.71 |
| Merino Wool | 3 / 162 | **6 / 205** | 7.62 |
| Sportswear | 3 / 38 | **3 / 57** | 10.14 |
| Underwear | 2 / 93 | **3 / 77** | 7.47 |
| Outdoor Clothing | 0 / 27 | **1 / 21** | 8.19 |
| Silk Wear | 1 / 40 | **1 / 46** | 9.96 |
| Sports Accessories | 0 / 24 | **0 / 20** | 6.95 |
| 七页合计 | **10 / 472** | **14 / 599** | 不计算商业词综合排名 |

商业页面曝光 +26.9%、点击 +40%，但绝对点击仅增加 4。Knitted 曝光 +96.6%、点击 1→0，可确认发现量扩大，尚不能称流量或询盘收益提升。当前曝光前五页为 FLATLOCK vs OVERLOCK **3 clicks / 295 impressions**、首页 **9 / 245**、Top Sportswear 比较指南 **3 / 240**、Merino **6 / 205**、Knitted **0 / 173**。

五篇技术／采购指南（两篇 FLATLOCK、QC、Tech Pack、OEM Evaluation）为 **7 / 450 → 9 / 384**，厂商比较指南单列 **5 / 253 → 3 / 240**，六内容页合计 **12 / 703 → 12 / 624**。Guides Hub 为 **0 / 11 → 0 / 36**，首页 **5 / 132 → 9 / 245**。因此这次整体曝光增长并非完全来自技术信息页，商业页与首页也有增量；不将页面分组曝光相加后等同 Property。

可见 Query × Page 仅作为需求线索：

| 查询 | 前窗 → 当前 impressions | 当前 average position | 当前实际落地 |
|---|---:|---:|---|
| `knitted fabric manufacturer` | 2 → 22 | 35.05 | Knitted Fabrics |
| `knitted fabric manufacturers` | 未披露 → 3 | 38.00 | Knitted Fabrics |
| `performance knit fabric oem` | 4 → 3 | 21.67 | Knitted Fabrics |
| `merino wool clothing manufacturer` | 2 → 3 | 26.00 | Merino |
| `merino wool clothing manufacturers` | 未披露 → 2 | 11.00 | Merino |
| `lightweight base layer manufacturer` | 未披露 → 1 | 45.00 | Merino |
| `stretch performance base layers oem` | 3 → 1 | 23.00 | Merino，不是 Underwear |
| `odm silk apparel supplier` | 未披露 → 3 | 19.67 | Silk Wear |
| `one-stop silk garment manufacturer` | 1 → 3 | 41.00 | Silk Wear |
| `sportswear manufacturer china` | 6 → 5 | 10.80 | Top Sportswear 比较指南，不是 Sportswear 商业页 |

表中前窗值来自独立 Query 表，当前落地来自 Query × Page；未提取前窗 Query × Page，因此不声称这些查询在前窗也归属同一页面。`knitted fabric manufacturer` 前窗 average position 25.50、当前 35.05；曝光增加同时平均位置变靠后，可能涉及覆盖范围变化，不能当作固定市场／设备排名复核。Sportswear、Underwear、Accessories、Outdoor 的当前可见 Query × Page 仅品牌域名词，不能推出没有非品牌曝光。`china sportswear manufacturers` 当前 12 impressions / 5.00 也归比较指南，不挪给商业页。

按 `athletik`／明显拼写 `athetik` 对可见词分类：品牌曝光 **24→31**，可见其余词曝光 **156→217**、clicks **2→1**；这是披露样本，不是全站品牌／非品牌份额。当前 6 条 Athleta 问句、25 impressions 落在 Sustainability，属于其他品牌／意图不匹配线索，不当作 Athletik 品牌需求或合格采购增长。唯一披露点击词 `is genuine` 落在首页，采购语义不足；不把长问句或其他品牌词自动归类为 AI 搜索流量。

### 市场与设备

| 市场 | 前窗 clicks / impressions | 当前 clicks / impressions |
|---|---:|---:|
| 美国 | 8 / 386 | **14 / 454** |
| 英国 | 2 / 54 | **1 / 73** |
| 加拿大 | 0 / 49 | **1 / 54** |
| US＋GB＋CA | 10 / 489 | **16 / 581** |
| 欧洲市场组：EU27＋UK＋EFTA | 4 / 200 | **8 / 307** |

欧洲组包含英国，不与三市场组直接相加；只汇总已返回国家行，不把缺失国家补零。美国为当前 14 / 36 次点击，是最明显的目标市场点击增量。样本不足以判断各市场询盘质量。

Desktop 为 **11 clicks / 902 impressions → 29 / 1,134**；Mobile **16 / 345 → 6 / 300**；Tablet **1 / 12 → 1 / 9**。移动点击下降需保留为观察，不根据 10 次点击差异诊断移动体验，也不能归因于只影响采集的 Cookiebot 修复。

### GA4 恢复后的原始基线

全站 **137 sessions / 88 total users / 86 new users / 85 engaged sessions**，engagement rate **62.04%**，**243 page views / 729 events / 3 key events**。Host 表只有 `www.athletikapparel.com`，与总量一致。存在已知内部 QA 与可能的分发测试，不能把 137 当净外部买家访问，也不从原始值推测扣除内部流量。用户数通常不可跨分组相加去重。

| Session default channel | Sessions | Total users | Engaged sessions | Key events |
|---|---:|---:|---:|---:|
| Organic Social | 43 | 17 | 26 | 0 |
| Direct | 30 | 15 | 14 | 1 |
| Paid Search | 27 | 27 | 19 | 0 |
| AI Assistant | 21 | 18 | 19 | 2 |
| Organic Search | **16** | **11** | **7** | **0** |

本窗 Organic Search 的来源均为 **google / organic**，共 10 new users、21 page views、68 events、43.75% engagement rate。36 GSC clicks 与 16 GA4 sessions 的定义、时区、同意状态、拦截与归因不同，不把 16/36 当采集成功率，不回填差额。数据证明恢复窗口已有自然搜索访问记录，不证明所有访问都已采集；9 月受故障影响，不能把 2→16 当作同口径 SEO 增长实验。

| Organic Search 落地页 | Sessions | Total users | Engaged sessions |
|---|---:|---:|---:|
| FLATLOCK vs ACTIVESEAM | 6 | 1 | 0 |
| 首页 | 4 | 4 | 3 |
| Merino | 2 | 2 | 2 |
| About | 1 | 1 | 1 |
| FLATLOCK vs OVERLOCK | 1 | 1 | 0 |
| Outdoor | 1 | 1 | 1 |
| Sportswear | 1 | 1 | 0 |

其他商业页没有返回 Organic Landing Page 行，不写成没有真实访问。6 次 ACTIVESEAM sessions 只对应 1 位用户且无 engaged session，不按 6 位潜在采购商理解；尚无证据判断该用户是否内部。Organic 市场／设备表全部为 desktop：US 7 sessions / 2 users / 0 engaged，Pakistan 3 / 3 / 1，UK、Bulgaria、Estonia、China、Puerto Rico、Taiwan 各 1 session。该少量样本与 GSC country 数据不做用户级拼接。

全渠道落地页主要为首页 51 sessions、Sportswear 29、`(not set)` 9、Contact 8、Merino 8；这是原始全渠道值，不能把 Sportswear 的 29 次全渠道会话当 SEO 访问（自然搜索为 1 次）。Source / campaign 核对显示 `linkedin / organic_social` 的 25 sessions / 1 user 均为 `technical_guides / flatlock_activeseam_video`，不能归入 10-30 新 Tech Pack 帖；该帖的 `tech_pack_demo_single_image` 在本窗口没有返回行。其余来源含 `linkedin.com / referral` 2 sessions、`ig / social` 16 sessions；不对社交发布作完整七日成效结论，也不读取或复盘广告平台。

### Contact、成功事件与真实询盘边界

Organic Search 的 pagePath 表有 **2 Contact page views / 2 users**；进一步按 Organic Search＋`pagePath=/contact/`＋`eventName=page_view` 过滤，分组到首页落地、Merino 落地各 **1 session / 1 user / 1 view**。这说明两类自然搜索会话中发生了 Contact 浏览，不是逐跳点击路径或特定 CTA 的因果证明。

全站记录 `form_start=5`、`form_submit=2`、`generate_lead=3`、`contact_email_click=2`、`contact_whatsapp_click=1`。本次事件明细未返回 Organic Search 的上述事件，Organic 总 keyEvents 为 0，故可报告**没有记录到自然搜索成功提交**；不等于正式询盘为 0，不把邮件／WhatsApp 点击当询盘。`form_submit` 与 Fluent Forms 成功回调事件定义不同，次数不能直接拼成严格漏斗或据此诊断漏报。

| `generate_lead` 日期（GA4 时区） | Session channel / source | Landing Page | Event count |
|---|---|---|---:|
| 2026-10-20 | AI Assistant / chatgpt.com | Services | 1 |
| 2026-10-20 | Direct | Contact | 1 |
| 2026-11-04 | AI Assistant / chatgpt.com | 首页 | 1 |

三个事件共 3 users / 3 keyEvents，但它们是分析系统的成功信号，**是否测试、是否正式询盘、是否合格及真实来源均未进行业务核验**；不因与 QA 同日就判定测试，也不写成 3 个客户或 2 个 GEO 获客。当前主题 `generate_lead` 来自 Form 3 成功回调，只有 2 秒客户端防重复，不是业务去重；UTM 隐字段依 marketing consent 保存，缺字段不代表没有来源。本次未读取 163 或 Gmail，9 月 6 封真实询盘与 8 月 0 封的历史结论不沿用为本窗数字。

### 共同变量、处置与下一步

- 窗口包含 10-08 Cookiebot Allow-all 内部 QA、10-20 Knitted 结构、10-23 FLATLOCK→Merino 内链、10-27 seamless／Yoga、10-29 配件与 Tech Pack 示范、10-30 OEM Evaluation 及 LinkedIn 分发、10-31 Guide 内链、11-02 日期／入口／About／地址更新，以及末日 11-04 Showcase。部分 QA 明确拦截分析或 Reject all，但不能据此排除所有内部访问；11-05 Sportswear 图集改版在本窗之外。
- `SEO-V2-002`：GSC／GA4 取数与口径核对完成，`no-change / baseline-established / keep-measuring`；业务询盘部分 `unverified`。既有 `SEO-MEASUREMENT-001` 10-08 外部配置修复记录保留，不因 click/session 不等重开故障，也不把 API 完整返回当作 consent coverage 完整。
- `Info / review / P1`：商业页与美国搜索可见性增加，但非品牌查询和自然搜索转化证据不足，`no-change / keep-measuring`。本轮没有支持立即重写 Title、Meta、H1、URL 或创建平行页的新证据；未触发性能优化或表单改版。
- 下一 SEO 重点保持 **Knitted Fabrics 与 Merino 的既定完整后窗 10-21～11-17，预计 11-20 起按 final 核验**。Knitted 出现更多 manufacturer 曝光，Merino 有最多商业页点击并出现自然搜索 Contact 浏览，优先在这两页验证需求及真实产品／面料证据；本窗跨越多次改动，不替代两项的独立效果复盘。Underwear／Yoga／配件按原 Day 28 继续，Showcase 男款 11-17 起按先前约定复查索引。
- 下一相邻 28 日恢复观察窗口可用 **11-05～12-02**，等 final 覆盖后再取；仅记录建议窗口，不创建自动任务。若需要将本次 3 个分析事件与正式询盘核对，应另获当前任务的邮箱读取授权或由所有者提供业务分类，本基线不等待该补充才交付。

## 2026-11-10：三个商业模块到期复查与 Services 月度索引检查

按 SEO-V2-005 三张 Change Card 补做 Underwear seamless、Sportswear Yoga 原定 11-03，以及 Sports Accessories 头颈模块原定 11-05 的 Day 7 检查；另执行 SEO-V2-003 Services 月度复查。本轮覆盖模式 `targeted`，不是全站审计。生产 HTTP 与 GSC URL Inspection 均成功；没有修改网站、部署、提交表单、重试索引或读取邮箱、GA4、Google Ads、付费 SERP。

### 索引与生产防护

| 页面 | GSC indexed snapshot | 最后抓取（UTC） | 生产核对 |
|---|---|---|---|
| Underwear | `PASS / Submitted and indexed` | 2026-11-09T14:46:04Z | seamless 模块及四类定制保留，无图，不把既有产品图写成 seamless 样品证据 |
| Sportswear | `PASS / Submitted and indexed` | 2026-11-03T08:09:45Z | Yoga 三组说明保留，目标产品组链接为 0，已删除的两条 CTA 未回归 |
| Sports Accessories | `PASS / Submitted and indexed` | 2026-11-07T00:34:07Z | Balaclava / neck gaiter 采购说明和真实护脖图保留 |
| Services | `NEUTRAL / Discovered - currently not indexed` | 未返回 | 四阶段采购流程完整；没有查明未收录原因 |

前三页均 `ALLOWED / INDEXING_ALLOWED / SUCCESSFUL`，Google 与 User Canonical 一致，Googlebot Smartphone 抓取。最后抓取晚于各自部署日，只能说明部署后发生过抓取，不能直接证明 Google 已采用每一段新正文。Services 的 robots / indexing / fetch 字段为 unspecified，没有返回抓取时间或 Canonical，不能将这些缺失写成禁止抓取或抓取失败；Google 已列出 Sitemap 与 Page Sitemap 发现来源。相较 10-08 的 `URL is unknown to Google`，当前有发现证据，但仍未收录，不把分类变化当作收录恢复。

四页生产普通请求均 HTTP 200、`index, follow`、无 X-Robots-Tag 限制、自引用 Canonical、单一 H1、Page Sitemap 各一次；首页可抓取入口依次为 2 / 2 / 2 / 5 个。robots.txt 只限制 `/wp-admin/`，未阻断目标页。护脖和受保护第三张配件图各一个 PNG / WebP，共 4/4 GET 200、MIME 正确；本次未重新比较第三图历史 SHA，不扩大为字节未变证明。未重新做浏览器视觉、性能、Google 实时测试或全站 Crawl。

### 精确日期与早期结果

GSC `web / final / refresh` 全站日期查询 10-20～11-09 返回连续 10-20～11-07 共 19 日；11-08 / 09 未返回，不当零。以下早期窗口末日均已覆盖。`dimensions=[page]`，精确规范 URL 过滤（Underwear / Sportswear 用锚定两 URL 的 regex，配件用 equals），全国家 / 全设备，`rowLimit=25000`，每次最多 2 行，未触及上限。日期沿用 GSC 报告时区，不把 API 抓取 UTC 时间直接混作表现日期。

| 页面 | 前 7 日 → 后 7 日（均排除 Day 0） | Clicks | Impressions | Page average position |
|---|---|---:|---:|---:|
| Underwear | 10-20～10-26 → 10-28～11-03 | 0 → 2 | 21 → 16 | 6.62 → 12.69 |
| Sportswear | 10-20～10-26 → 10-28～11-03 | 1 → 0 | 11 → 12 | 13.55 → 18.50 |
| Sports Accessories | 10-22～10-28 → 10-30～11-05 | 0 → 0 | 2 → 10 | 5.50 → 9.90 |

同后 7 日窗的 `dimensions=[query,page]` 只保留品牌域名词 `www.athletikapparel.com`：Underwear 0 clicks / 4 impressions / 11.75，Sportswear 0 / 5 / 6.20，Accessories 0 / 8 / 10.75。保留 Query 与 Page 不闭合，未返回 seamless、yoga 或 balaclava 等商业查询不等于零需求、零曝光；不能将未披露差额或 Underwear 的点击归给新增内容。Page average position 不是固定商业词排名。每个 7 日窗包含完整一周，但隔开了部署日，仍不是受控因果实验；尤其配件基数只有 2 次曝光，不用增长百分比判断成功。

已补齐并冻结正式前 28 日基线，替代此前尚未提取的精确前窗（历史滚动快照不覆盖）：

| 页面 | 前 28 日 | Clicks | Impressions | CTR | Page average position |
|---|---|---:|---:|---:|---:|
| Underwear | 09-29～10-26 | 2 | 86 | 2.33% | 6.97 |
| Sportswear | 09-29～10-26 | 5 | 55 | 9.09% | 7.40 |
| Sports Accessories | 10-01～10-28 | 0 | 18 | 0% | 4.94 |

**决策：**三页 Day 7 技术／索引复查关闭，效果 `partial / not-enough-data`，本轮 `no-change / keep-measuring`，不改 Title、Meta、H1、正文或 URL。Underwear / Yoga 的后 28 日仍为 10-28～11-24，预计 11-27 起核验 final；配件仍为 10-30～11-26，等末日 final 覆盖后复盘。原页面 Day 90 不重置。披露配件正文／图片／颜色组合变量、11-04 Showcase 新入口和 11-05 Sportswear 图集改版（该图集改版不在 Yoga 首个后 7 日窗内，但在正式后 28 日窗内）。

Services 原 Finding `SEO-V2-003-SERVICES-INDEX` 保持 `review / Info / P1 / no-change / monitoring`：当前未收录事实确定，原因未确定；未见上述技术阻断，不重复已于 08-28 确认的请求。下一常规复查不早于 12-10，若提前出现明确 HTTP、robots、Canonical、Sitemap、抓取错误或实质页面发布再重开。

本轮 4 次 URL Inspection、9 次 Search Analytics 查询均成功；8 个页面／查询窗口结果加 1 个日期覆盖结果完整检查，最多 19 行，未分页或截断。原始请求、响应、生产 HTML 与 `live-html-summary.json` 位于 Git 忽略目录 `.chrome-check/seo-mainline-2026-11-10/`。本批次检查时尚未执行 SEO-V2-002 的恢复基线，也未读取正式询盘邮箱；随后已于同日另批补齐 10-08～11-04 GSC＋GA4，见本文件顶部记录。

## 2026-11-10：Product Showcase 索引检查与男款申请确认

只读 URL Inspection：展示库 `/product-showcase/` 与 Ocean Depth 女装套装均为 `PASS / Submitted and indexed`，最后抓取分别为 `2026-11-04T12:05:43Z`、`2026-11-04T13:14:34Z`；均允许索引、抓取成功，Google / User Canonical 一致。男式 HY265077 `/product-showcase/mens-merino-tencel-mesh-long-sleeve-shirt/` 为 `NEUTRAL / Discovered - currently not indexed`，无最后抓取时间，已列出 Sitemap index 和 Showcase 总览发现来源。

三页均已在 Page Sitemap 各出现一次；总览和男款实时 HTTP 200、index / follow、自引用 Canonical、单一 H1，男款无 X-Robots 限制，robots.txt 未阻断，总览原始 HTML 有可抓取详情链接。女款本轮未重新取 HTML，不把其 GSC PASS 写成新的完整生产验收。未发现男款在上述技术检查范围内的阻断；Jacquard 新款仍仅 Local / noindex，不进入本次生产索引清单。

随后所有者回复“做好了”，据上下文记录男款已于 **2026-11-10 请求编入索引**，状态 `indexing-requested / owner-confirmed`。实时测试读数和具体申请时刻未提供，不补写为已独立验收；上述 API 快照发生在请求前，不据申请更新为 indexed。无需再申请总览或女款；男款建议 11-17 起复查一次，或收到明确失败信息时提前检查。

## 2026-11-02：Merino 商业词 GSC 周度观察

补做原定 10-30 的只读观察；`web / final` 全站日期查询在 10-01～11-01 返回连续 10-01～10-30 共 30 日，因此最新完整 28 日窗口为 **10-03～10-30**。精确目标页 `/merino-wool-manufacturer/` 返回 **5 clicks / 193 impressions / 2.59% CTR / average position 7.24**。这是全部查询、国家和设备混合的 Page 平均位置，不是单个关键词的固定排名。

| Query × Page（完整保留返回行） | Clicks | Impressions | Average position |
| --- | ---: | ---: | ---: |
| `blend` | 0 | 1 | 2 |
| `custom tailor made` | 0 | 1 | 4 |
| `i want blanks` | 0 | 1 | 5 |
| `merino wool clothing manufacturer` | 0 | 2 | 25 |
| `merino wool clothing manufacturers` | 0 | 2 | 11 |
| `www.athletikapparel.com` | 0 | 10 | 10 |

固定四词中只有 `merino wool clothing manufacturer` 返回行；`merino wool apparel manufacturer`、`merino wool base layer manufacturer`、`merino wool underwear manufacturer` 均 `not-returned`，不是零曝光。复数词不混入单数固定词。该单数词在四维数据中为 US desktop 1 impression / position 30，Vietnam desktop 1 / 20；样本很小，不外推排名趋势。

Country 单维仅返回 17 impressions / 0 clicks：US 12、GB 1、DE 1、Bahrain 1、Hong Kong 1、Vietnam 1；Country × Device 中 US desktop 11、US mobile 1、GB mobile 1，其余四国 / 地区各 1。GB desktop 和 Canada 没有返回行，不能写零。四维 Query × Page × Country × Device 有 8 行、合计 17 impressions / 0 clicks；四维和 Query / Country 同样与 Page 的 193 impressions / 5 clicks 不闭合，原因未证实，不分配差额或点击；最大 8 行，低于 25,000 上限。

10-23 的 09-23～10-20 Page 基线为 4 / 177；本次滚动窗口与之重叠 18 天，不是独立实验或可归因比较。原 10-21～11-17 独立后窗、11-20 起按 final 覆盖核验，以及 11-20 / 11-21 固定 SERP 计划保持。10-23 入链及 10-31 来源页另一内链是后续比较的共同变量。本轮 `no-change / keep-measuring`，不改页面或 metadata，不读取 GA4、邮箱、Google Ads，也未请求付费 SERP。

本次 CLI doctor 初次本地数据库 locked，停止并发后单次重试恢复；四维请求首次 `fetch failed`，同请求一次重试成功，未改代理或认证配置。
