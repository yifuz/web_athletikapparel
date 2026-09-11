# Athletik Clothing GEO 工作台

> 建立日期：2026-08-12
>
> 规划更新：2026-09-05
>
> 规范站：<https://www.athletikapparel.com/>
>
> 最终目的：**被 AI 找到 → 被 AI 准确提取 → 被 AI 引用 → 在匹配的 B2B 采购问题中被 AI 推荐**
>
> 当前阶段：GSC 已确认规范站获得 Google 生成式 AI 链接曝光，站内发现基础从技术资格升级为实际展示证据；Baseline v2 首轮月度测试仍在进行，当前主要缺口是引用相关性、实体提取准确性和未点名供应商问题中的独立推荐证据。

本文件是 Athletik Clothing GEO 的中央工作台。以后有关目标、阶段判断、优先级和执行顺序的结论先更新本文件；逐次测试、站外发布和平台数据继续写入对应证据日志。

## 1. 北极星目标与四阶段结果漏斗

本项目使用以下四阶段管理 GEO，但它们不是一个必然自动转化的算法。页面可抓取不代表一定会被检索，
被引用也不保证被推荐；推荐通常还取决于问题匹配度、事实可信度、外部来源和整个公开网络形成的共识。

| 阶段 | 本项目中的定义 | 可观察证据 | 不可越界的解释 |
|---|---|---|---|
| 被 AI 找到 | 规范页面具备抓取、索引、检索和展示资格 | HTTP 200、robots 允许、Sitemap、Canonical、搜索索引、爬虫访问、搜索曝光 | 技术通过只能证明“有资格被发现”，不能证明某次模型内部一定检索过页面 |
| 被 AI 提取 | 回答准确复述 Athletik 的实体、位置、产品、能力或指南结论 | 固定提示词答案中的事实覆盖、准确性、旧域名/错误实体是否出现 | 未附来源的正确提及仍只是提取/提及，不升级为引用 |
| 被 AI 引用 | 回答把 Athletik 规范 URL 作为支持具体结论的可点击来源 | 引用 URL、支持的结论、引用相关性、来源位置、平台引用报告 | 指定网站提示词中的引用只证明站内理解，不等于未点名自然发现 |
| 被 AI 推荐 | 在未点名、符合 ICP 的供应商选择问题中，Athletik 进入短名单并给出准确匹配理由 | 是否入选、名单位置、推荐理由、保留意见、引用组合、竞品 | 一次第一名不是稳定推荐；个性化回答、品牌点名题和自身宣传页不能独立证明市场推荐 |

最终成功不是“回答里出现 Athletik”这么宽泛，而是：在 V2-D03～D05 等未点名采购问题中，
Athletik 能稳定进入符合业务边界的候选名单，理由来自可核验的第一方生产证据，并逐步获得可信第三方来源佐证。

### 1.1 各阶段的主责资产

- **找到**：技术 SEO、索引、Sitemap、内链、爬虫/CDN 可访问性。
- **提取**：清晰可见的英文正文、稳定实体口径、自包含的答案段落、真实表格/清单、图片与视频旁的文本说明。
- **引用**：有独特价值的技术指南、生产证据、来源链接、明确作者/发布与复核日期、Schema 与可见正文一致。
- **推荐**：前述基础加上可信的站外实体资料、设备/认证/行业来源、真实买家证据或经授权案例，以及长期一致的公开共识。

## 2. 公司与市场背景（当前工作口径）

### 2.1 我们是谁

| 字段 | 当前核准口径 |
|---|---|
| 公开品牌 | Athletik Clothing |
| 美国实体 | Athletik Clothing Inc.；可公开表述为 North America sales office |
| 中国实体 | Zhangjiagang Athletik Clothing Co., Limited；主要 manufacturer and seller，并对应中国生产设施 |
| 中国生产地址 | No. 25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu 215699, China |
| 规范站 | <https://www.athletikapparel.com/> |
| 官方渠道 | [LinkedIn](https://www.linkedin.com/company/111831319/) · [Instagram](https://www.instagram.com/athletikclothinginc/) · [YouTube](https://www.youtube.com/@athletikclothinginc) |
| 核心定位 | Vertically integrated OEM for technical knitwear |
| 目标客户 | 北美和欧洲的中型 B2B 品牌、批发商和进口商；不以初创企业和小批量试单为主要受众 |
| 成衣商业门槛 | MOQ 500 pieces per style |
| 独立面料业务 | 接受独立面料项目；MOQ、开发和交付按面料规格与项目确认，不套用成衣 500 件口径 |
| 主要转化 | 买家提交产品类别、预计数量、业务类型、公司信息、tech pack/specification 和项目要求，进入开发与报价审核 |

### 2.2 产品、能力与差异化

- 产品范围：underwear/base layers、sportswear/activewear、outdoor clothing、Merino wool apparel、silk wear、sports accessories 和 knitted fabrics。
- 制造能力：从 knitted fabric development 到 finished garments 的一体化开发与生产；拥有自有生产设施、面料开发和 in-house testing 证据。
- 技术重点：Yamato FLATLOCK、Merrow ACTIVESEAM、OVERLOCK、Carbondry finishing、laser perforation，以及按项目确认的面料、测试与质量控制。
- 核准量化证据：15+ 年经验、4,500+ m² 自有生产设施、100,000+ pieces/month、成衣 MOQ 500 pieces/style。
- 品牌角色：以能审查 specification、sample、construction、testing 和 bulk approval 的技术制造伙伴出现，而不是泛化的低价服装供应商。

所有能力表达都必须区分“长期稳定能力”“按项目可选能力”和“需通过样品/测试确认的结果”。
不得把可做的工艺写成对所有面料或产品的无条件性能保证。

### 2.3 买家要完成的决策

GEO 内容需要帮助目标买家依次完成四个任务，而不只是获取流量：

1. **Discover**：确认 Athletik 是否承接 technical knitwear、目标品类和目标订单规模。
2. **Qualify**：判断面料、FLATLOCK/ACTIVESEAM、款式、测试、MOQ 和时间要求是否匹配。
3. **Verify**：核对生产设施、设备、样品、QC、认证适用范围和第三方资料，而不是只接受营销措辞。
4. **Start**：知道询价前应提供哪些 tech pack、fabric specification、数量和测试要求。

能进入 AI 推荐名单的内容必须至少帮助其中一个真实采购决策，并清楚说明适用条件和证据边界。

### 2.4 实体和站点边界

两家 Athletik 实体属于同一业务体系，但不是可互换的法律名称；不得自行推断母子公司、签约、出口、雇佣或知识产权关系。

Beta Textiles / BTEXCO 是同一运营体系的面料销售名称，但对外独立运营；公开页面、站外资料和内容中不得把它与 Athletik 关联、互链或描述为关联公司。

`myathletik.com` 已按所有者决定完全下线，已检查入口返回 HTTP 410，不做跨域 301，后续出现只记录为过期缓存信号。
`ultramerino.com`、`athletik.com.cn` 和其他历史/类目矩阵站的所有权、当前角色和去留必须逐站核验；它们不是规范站事实的自动来源，也不能在未确认时被描述为 Athletik 当前官方子站。

## 3. 平台事实与策略边界

当前规划采用以下官方平台边界，不采用未经证明的“GEO 捷径”：

- Google 说明 AI Overviews / AI Mode 继续依赖常规搜索基础；页面需可索引并可展示摘要，不需要特殊 AI Schema、`llms.txt` 或把正文强行切成固定长度片段。GSC 当前已为本属性开放 Generative AI Beta 专用报表，可观察 impressions、Pages、Countries、Devices 和 Dates，但没有 Query、答案原文、推荐位置或转化。参见 [Google AI features and your website](https://developers.google.com/search/docs/appearance/ai-features)、[Google generative AI optimization guide](https://developers.google.com/search/docs/fundamentals/ai-optimization-guide) 与 [Generative AI performance report](https://support.google.com/webmasters/answer/16984139)。
- OpenAI 说明允许 `OAI-SearchBot` 有助于内容在 ChatGPT 搜索中被发现、摘要和引用；ChatGPT 引荐流量可在 Analytics 中观察。参见 [OpenAI Publishers and Developers FAQ](https://help.openai.com/en/articles/12627856-publishers-and-developers-faq)。
- Perplexity 将 `PerplexityBot` 定义为用于在搜索结果中发现和链接网页的 crawler；其访问状态需要与其他搜索 crawler 分开验证。参见 [Perplexity Crawlers](https://docs.perplexity.ai/docs/resources/perplexity-crawlers)。
- Bing Webmaster Tools 已提供 AI Performance 公开预览，可观察 citation count、cited pages 和 grounding queries；若当前账户可用，应把它作为引用证据源，而不是购买第三方“可见性分数”。参见 [Bing AI Performance](https://blogs.bing.com/webmaster/February-2026/Introducing-AI-Performance-in-Bing-Webmaster-Tools-Public-Preview)。

因此，Schema 的职责是帮助统一实体与内容表达，并与可见正文一致；它不是推荐排名开关。
FAQ 只在页面存在真实买家问题时使用，表格和清单只在它们确实比段落更清楚时使用。

## 4. 文档路由

| 文档 | 用途 |
|---|---|
| 本文件 `GEO.md` | GEO 目标漏斗、公司背景、现状诊断、优先级和执行计划 |
| [`testing/prompt-baseline.md`](testing/prompt-baseline.md) | Baseline v1 历史快照、Baseline v2 固定提示词、逐次结果和实体冲突证据 |
| [`distribution/social-content-sop.md`](distribution/social-content-sop.md) | 官网指南改编为 LinkedIn / Instagram 内容的执行 SOP |
| [`distribution/publishing-log.md`](distribution/publishing-log.md) | 每次站外分发的发布时间、链接和七日数据 |
| [`../seo/authority/offsite-authority-opportunity-pool-v1.md`](../seo/authority/offsite-authority-opportunity-pool-v1.md) | 站外行业引用、目录、认证名录和编辑机会的证据与状态 |
| [`../seo/v2-backlog.md`](../seo/v2-backlog.md) | SEO 索引、性能、页面实验和站外输入依赖；不由 GEO 重复建单 |
| [`../sitemap.md`](../sitemap.md) | 规范 URL、页面定位与信息架构 |
| [`../progress.md`](../progress.md) | 全项目状态；只保留 GEO 摘要，不替代本工作台 |

新 agent 开始 GEO 工作时，先读 `AGENTS.md`、本文件和 `testing/prompt-baseline.md`，再按任务读取分发或站外权威日志。不要仅依赖聊天历史。

## 5. 当前资产与证据状态

### 5.1 找到层：基础基本完成

- 2026-09-03 生产抽查：`robots.txt`、Sitemap index、Technical Guides Hub 与四篇指南均返回 HTTP 200；Page Sitemap 含 18 个 URL。
- 同日以 Googlebot、OAI-SearchBot、PerplexityBot、Claude-SearchBot 和 ChatGPT-User 抽查 Tech Pack Guide，均返回 HTTP 200。该测试只排除明显的 UA/robots/CDN 阻拦，不代替真实爬虫日志。
- 当前仓库中的 GSC 最新索引快照为 18 个 Sitemap 页面中 17 个 `PASS / Submitted and indexed`；`/services/` 为 `Discovered - currently not indexed`，实时测试曾通过并已请求一次，当前按周监测，不重复提交或改页。
- Technical Guides Hub、首页、导航、页脚、品类页和指南之间已有稳定内链。
- 2026-09-05 首次 GSC Generative AI 导出返回 2026-07-21 至 09-02 共 29 次 Property impressions，证明本站链接已在实际 AI Overviews / AI Mode 结果中展示；这比 crawler/索引资格更强，但仍不证明答案准确提取或推荐了 Athletik。

### 5.2 提取与引用层：结构完成，结果仍需复测

- 已上线四篇第一方技术指南：
  - <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>
  - <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/>
  - <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/>
  - <https://www.athletikapparel.com/garment-quality-control-checklist/>
- 四篇指南使用可见正文、唯一 H1、文章目录、内部链接、外部技术参考、可见复核日期和 Organization 作者；JSON-LD 与页面正文对应，包含 Article、FAQPage 和 BreadcrumbList，Hub 使用 ItemList。
- Baseline v1 已证明规范站在品牌点名和指定网站问题中可以被识别与引用；这不能外推为未点名推荐。
- GSC Generative AI Page 表返回 13 个规范 URL；四篇 Technical Guides 均至少出现一次，FLATLOCK Guide 7 次、QC Guide 4 次。它们属于页面级链接曝光和 citation-surface evidence；报表没有 Query 与答案原文，不能验证链接支持的具体结论。
- Baseline v2 首批可执行测试已完成：ChatGPT Search 8/8、Google AI Mode 8/8；Perplexity 8 条按 `unavailable / plan-access` 记录。ChatGPT D03～D05 均把 Athletik 列第 1，但 D05 的核心引用来自旧 `ultramerino.com`；C06～C08 为 0/3 个已验证对应 Guide 引用。Google AI Mode E01/E02 找到规范站但仍受旧站候选/旧口径影响；D03 第 1但引用历史矩阵站、D04 未出现、D05 第 3并引用当前规范 Merino 页面；C06 未引目标 Guide，C07 只引首页，C08 的 Sources 面板把 Athletik LinkedIn 尽调帖列为第一张卡片，但仍未引用官网目标 Guide。推荐已跨产品复现，站外分发已进入 Google 来源候选；规范内容引用、证据归属和语义稳定性仍是主要缺口。

### 5.3 站外分发层：三项均有发布信号，证据补录滞后

| 对应意图 | 官网母文章 | LinkedIn / Instagram 状态 | 证据缺口 |
|---|---|---|---|
| V2-C07 | FLATLOCK vs OVERLOCK | 2026-08-12 已发布 | 两个平台公开 URL、Story 状态和七日数据待补录 |
| V2-C06 | Technical Knitwear Tech Pack | 2026-08-13 已发布 | 两个平台公开 URL、Story 状态和七日数据待补录 |
| V2-C08 | Evaluate a Vertically Integrated Knitwear OEM | Google AI Mode Sources 面板已发现 2026-08-14 Athletik LinkedIn 尽调帖；Instagram 状态待确认 | LinkedIn 实际公开 URL、Instagram 发布状态、Story 状态和七日数据待补录 |

社交分发有助于真实用户发现和实体/主题一致性，但 LinkedIn/Instagram 的自身帖子仍属于品牌可控内容，
不能替代独立行业来源，也不能用展示量证明 AI 已经引用或推荐。

### 5.4 推荐层：出现首轮强信号，稳定性与来源质量仍是缺口

- Baseline v1 中 V1-03 曾在干净 Temporary Chat 把 Athletik 列为中国 FLATLOCK/ACTIVESEAM 供应商短名单第一，这是有价值但尚未形成跨引擎、跨月份稳定性的单次信号。
- Baseline v2 的首次 ChatGPT Search 结果中，D03、D04 和 D05 均把 Athletik 列为第一推荐，并给出与 technical knitwear、base layers、FLATLOCK/ACTIVESEAM 和 Merino wool 相关的明确理由。这是同一产品内跨三个采购意图的强正向信号，但不是跨产品或跨月份稳定性证明。
- D03 已确认 About Us 规范 URL；D04 来源面板可见 About、Sportswear 和 Sustainability 规范站卡片；D05 虽然实体名称与推荐理由准确，核心来源却是旧 `ultramerino.com`，并产生 Beta Textiles 与 Athletik 的未核准关系推断。规范站引用质量和实体隔离仍未稳定。
- 站外权威机会池已经识别 Woolmark 条目、认证名录、Merrow、行业媒体和制造商目录等来源，但 ThomasNet、OEKO-TEX、WRAP 和 Merrow 等当前分别受平台资格、可核验输入或所有者优先级限制，不能写成已完成。
- 当前缺少的是“与具体采购判断相关的独立佐证”，不是链接总数。更多低质量目录、付费链接或自建推荐榜单不会解决该问题。

## 6. 阶段诊断

| 阶段 | 当前判断 | 主要理由 | 下一道门槛 |
|---|---|---|---|
| 找到 | 已获得 Google 实际展示证据，持续监测 | 生产 200、Sitemap、Canonical、内链、主要 crawler 可访问；17/18 GSC indexed；Generative AI 首个基线 29 impressions | Services 转为 indexed；完整可比窗口持续出现目标页面；无新的抓取/indexability 回归 |
| 提取 | 部分达成，历史来源污染已复现 | 品牌题可提取核心业务、地点与规范站，但 Google AI Mode E01 混入 `athletik.nyc` 的 5 家伙伴工厂、年产 500 万件及未核准区域域名关系 | E01/E02 在两个可用产品或跨月份准确覆盖规范实体口径，且不引入未核准站点关系 |
| 引用 | Google 链接曝光与站外来源候选已出现，但内容题尚未取得规范指南引用 | GSC 中四篇指南均有页面级链接曝光；ChatGPT C06～C08 为 0/3；Google C06 未引目标 Guide、C07 只引首页、C08 只在 Sources 面板出现 Athletik LinkedIn 尽调帖，三题均未取得对应官网 Guide 引用 | 同一固定内容题在至少两个独立产品/月份出现相关规范指南引用，且引用支持结论 |
| 推荐 | 跨产品出现但排序不稳定，规范引用开始形成 | ChatGPT D03～D05 均为第 1；Google AI Mode D03 第 1/历史站引用、D04 未出现、D05 第 3/规范 Merino 页面引用 | 下一月在独立会话中继续进入匹配短名单；规范站与可信独立来源支持准确理由，且不混淆实体关系 |

不建立一个把四阶段相加的“GEO 总分”。四阶段分别记录，否则品牌题的高准确率会掩盖未点名推荐的缺口。

## 7. Baseline v2 提示词—资产—缺口映射

| Prompt | 目标阶段 | 当前主要承接资产 | 当前缺口/决策 |
|---|---|---|---|
| V2-E01 | 提取 | 首页、About、Organization Schema | Google AI Mode 已复现旧 `athletik.nyc` 工厂数量/年产能污染；先完成八题，再审计历史域名和旧档案，不在批次中改页 |
| V2-E02 | 提取 + 引用 | 首页、七个品类页、About、Services | Google AI Mode 当前事实提取准确，但只列首页且来源候选混入旧站；指定站点题不计自然发现 |
| V2-D03 | 推荐 | 首页、FLATLOCK Guide、生产证据 | 已跨产品第 1，但 Google 引用落在 `athletik.com.cn`/`powermerino.com`；完成批次后优先治理规范站证据归属，再判断是否建立原创 ACTIVESEAM 内容 |
| V2-D04 | 推荐 | Sportswear、Underwear、Services、OEM Evaluation | Google AI Mode 首轮未出现且竞品多为泛 activewear/规模叙述；先完成 D05，再决定是否补强 1,000+ 件项目匹配摘要与独立佐证 |
| V2-D05 | 推荐 | Merino Wool、Underwear、About、FLATLOCK Guide | Google AI Mode 已直接引用规范 Merino 页面并列第 3，证明当前页可承接该意图；ChatGPT 仍依赖旧 `ultramerino.com`，批次后重点转为历史站冲突治理和可信独立佐证，不机械新建重复指南 |
| V2-C06 | 引用 | Tech Pack Guide | ChatGPT 与 Google AI Mode 均准确进入 cut-and-sew performance knitwear 语境，但都未引用目标 Guide，citation source-selection 缺口已跨产品复现；Google 回答还出现 stitch type 命名、固定 SPI/tolerance/extended measurement 等过度概括。本批结束前不改页，完成 C07/C08 后再统一判断可引用摘要、原创生产证据、标准来源或站外引用入口 |
| V2-C07 | 引用 | FLATLOCK vs OVERLOCK Guide | ChatGPT 与 Google AI Mode 都未选择目标 Guide；Google 只引用规范首页，source-to-claim 支持不足，并采用制造商博客中的固定 SPI 与未经透明验证的 8%–18% 成本数字。完成 C08 后再结合 GSC、Bing grounding query 与跨产品结果判断可引用摘要、原创生产证据、一手标准来源和外部引用入口 |
| V2-C08 | 引用 | OEM Evaluation + QC Guide | Google Sources 面板已把 Athletik LinkedIn 尽调帖列为首张卡片，证明站外分发可被找到；但正文未提品牌、两篇官网 Guide 未被引用，并回漂到 9GG–16GG/Stoll/Shima fully fashioned 语境。批后优先区分站外发现、规范引用和技术准确性，再决定是否强化 cut-and-sew 定义块、一手证据和外部引用入口 |

## 8. 单人执行计划

### P0 — 有效测量基线（首批完成）

1. 完成 8 条 Baseline v2 × ChatGPT Search、Perplexity、Google AI Mode 的首批记录；Perplexity 因当前无会员权限按 8 条 `unavailable / plan-access` 记录，不付费、不换产品替代。
2. 每条提示词使用独立干净会话，保存第一次回答、全部引用 URL、来源面板和环境元数据；缺项结果标为 `partial`，不补猜。
3. 首批测试期间冻结了会影响实体、指南正文、导航或 Schema 的上线修改；该冻结现已随 Google C08 完成而结束。
4. 先形成批后阶段诊断和最小改动清单，不因为一次未出现就立刻改页；关键变化至少需要另一产品或下一月复现。

### P1 — 清掉证据债务并补引用观测（本批结束后 1 周内）

1. 核实 GEO-08 的实际发布状态：Google 已发现 2026-08-14 Athletik LinkedIn 尽调帖；补录其公开 URL、实际时间和 UTM，并确认 Instagram Carousel/Story 是否已发布，未发布部分再审核执行。
2. 补录 GEO-07、GEO-06 的公开帖子 URL、Story 状态和已到期的七日平台/GA4 数据；无法取得的字段明确写 `unavailable`。
3. 将网站加入或核对 Bing Webmaster Tools；若账户出现 AI Performance，记录 total citations、cited pages 和 grounding queries 的月度快照。
4. 每月导出 GSC Generative AI 的 Property impressions、Pages、Countries、Devices 和 Dates；与传统 Web Search、GA4、固定提示词和第三方估算分开。Page 明细不与 Property 总量机械相加，也不把链接曝光直接写成准确提取或推荐。

### P1 — 建立“可被推荐”的证据链（未来 30～60 天）

每月只推进一个主主题，维持网站 1 篇深度内容/月的保守基线：

1. 建立 D03～D05 推荐证据矩阵：买家问题、Athletik 匹配事实、站内原始证据、可信第三方佐证、缺失输入、可公开边界。
2. 第一优先候选为 `Industrial FLATLOCK vs Merrow ACTIVESEAM for Cut-and-Sew Technical Knitwear`：仅在设备画面、应用部位、机器/线迹口径、样品和测试边界完成所有者核验后立项。它必须提供原创生产证据，而不是改写通用定义。
3. D04 不再优先增加另一篇泛化供应商清单。更有价值的是经授权的项目案例，或不披露客户名称的可核验开发/QC 流程证据；没有授权和真实结果时不建案例。
4. D05 先审计 Merino Wool 规范页与历史矩阵站的重复、冲突、索引和引用，再决定是增强现页、建立技术指南还是保持不变。
5. 站外每月只推进一项：优先真实设备方/认证方/行业编辑来源，其次是可维护的高质量制造商资料页；不以目录数量为 KPI。当前被外部输入阻塞的项目保持 deferred，不使用错误地址或不完整证书提交。

### P2 — 90 天验证与扩量条件

1. 每月按固定 v2 提示词运行一次，不增加日常重复测试。
2. 内容发布后至少观察 28～90 天的索引、查询、引用和引荐；短周期只处理事实错误或技术阻断。
3. 只有某主题出现相关 grounding query、规范页引用、非品牌展示增长或短名单进入信号时，才继续同一 topic cluster。
4. 如果 90 天后仍只有品牌题能提取、未点名题无引用，优先重新评估独特证据和站外来源，不继续堆同类文章。

## 9. 活跃行动清单

| ID | 行动 | 对应阶段 | 优先级 | 状态 | 完成标准 |
|---|---|---|---|---|---|
| GEO-V2-001 | 完成首批 24 条 Baseline v2 记录 | 全漏斗测量 | P0 | `complete / ChatGPT 8 of 8; Google AI Mode 8 of 8; Perplexity unavailable` | ChatGPT Search 与 Google AI Mode 共 16 条实际运行已记录；Perplexity 8 条按 `unavailable / plan-access` 记录；未混用替代品 |
| GEO-V2-002 | 补齐 V2-E01 环境和来源证据 | 测量有效性 | P0 | `partial` | Temporary Chat、模式、个性化、地区、设备和来源面板均已记录；否则保留 partial |
| GEO-V2-003 | 核实并完成 GEO-08 分发 | 引用发现入口 | P1 | `partial / LinkedIn-source-card` | 补录已被 Google 找到的 LinkedIn 帖子公开 URL、UTM 和时间；确认 Instagram/Story 状态，未发布部分审核执行 |
| GEO-V2-004 | 补录 GEO-06/07 发布与七日数据 | 运营证据 | P1 | `overdue / owner-input` | 可得字段全部补录，不可得字段写 unavailable |
| GEO-V2-005 | 启用 Bing Webmaster Tools AI 引用观测 | 引用 | P1 | `owner-action` | 站点已验证；AI Performance 可用则建立首个快照，不可用则记录 unavailable |
| GEO-V2-006 | 建立 D03～D05 推荐证据矩阵 | 推荐 | P1 | `planned` | 每题至少有匹配事实、第一方 URL、第三方候选、缺失证据和公开边界 |
| GEO-V2-007 | ACTIVESEAM 原创技术内容立项判断 | 提取/引用/推荐 | P1 | `conditional` | 原创生产证据和事实审核完成后批准 brief；不满足则 not-needed |
| GEO-V2-008 | Merino 历史站与规范页冲突审计 | 提取/推荐 | P1 | `planned` | 确认所有权、索引、流量、引用、重复声明及处置建议；未经批准不改 URL/重定向 |
| GEO-V2-009 | 每月一个可信站外佐证动作 | 推荐 | P1 | `external-input` | 获得可公开、可索引、信息准确的真实条目/编辑内容；未成功不写完成 |
| GEO-V2-010 | 建立 GSC Generative AI 月度观测 | 找到/引用入口 | P0 | `baseline-established` | 首个三个月导出完整入档；以后使用完整 28 天可比窗口并保持各维度口径分离 |

## 10. 统一记录与判断口径

### 10.1 每次提示词测试至少记录

- 日期、产品、可见模型/模式、登录/Temporary Chat、个性化设置、网络地区、界面语言和设备。
- 固定 Prompt ID 与未经改写的提示词。
- 第一次完整回答、全部引用 URL 和来源面板证据。
- Athletik 是否被提及、是否进入短名单、位置、推荐理由和主要竞品。
- 规范站是否被引用、引用具体支持什么结论、是否出现过期域名或错误实体。
- 结果有效性：`valid`、`partial`、`personalized`、`product-unavailable` 或 `intent-mismatch`。

### 10.2 月度结果分别报告

- **实体准确性 E01/E02**：关键事实正确率和冲突类型；不计算自然推荐率。
- **供应商发现 D03～D05**：入选题数/有效运行数、平均名单位置、第一推荐次数、推荐理由准确性、规范站与第三方引用覆盖。
- **内容权威性 C06～C08**：Athletik 指南被引用题数/有效运行数、引用相关性、错误结论和竞品来源。
- **Google 生成式搜索展示**：GSC Property impressions、获得页面级链接曝光的规范 URL、Countries、Devices 和 Dates；不推断报表未提供的 Query、Clicks、答案内容或推荐位置。
- **访问与业务结果**：AI referral sessions、engaged sessions、有效询盘；样本不足时只报绝对值，不报趋势。

“稳定改善”的最低工作定义是：同一固定意图在至少两个独立产品或连续两个月出现同方向变化，且没有依赖品牌点名、历史聊天或错误事实。它仍不是永久排名保证。

## 11. 内容与站外工作的硬边界

- 不制作 `llms.txt`、所谓 AI 专用 Schema 或固定字数“答案块”来追求捷径。
- 不把自有页面上的“best manufacturers”榜单当作推荐建设；它容易缺乏独立性并替竞争者导流。
- 不批量生成低信息密度文章，不为了覆盖提示词建立近义页面。
- 不采购传递排名权重的链接、目录包、虚假评论或伪装成用户的社区提及。
- Reddit/论坛只用于真实身份下解决问题和参与讨论，不做脚本化品牌植入。
- 客户名称、Logo、订单结果和案例必须先进入授权台账；未授权时不发布。
- 认证、设备、产能和材料声明都必须对应当前可核验证据；历史站内容不能自动升级为现行事实。
- 不把 Instagram/LinkedIn 展示、传统 GSC 排名或单次 AI 回答互相替代。

## 12. 当前准确状态

截至 2026-09-11，Athletik 已完成规范站、实体基础、四篇技术指南、主要 Schema、索引和两轮社交分发；GSC 首个专用报表确认 29 次 Google 生成式 AI Property impressions，四篇指南均出现页面级链接曝光。ChatGPT Search 的首轮 V2-D03～D05 又连续给出第一推荐，说明找到、提取和推荐链条已出现正向信号，但尚未获得跨产品/月份稳定性。
下一阶段不应因为首轮第一推荐立刻扩大宣传或无差别增加页面，而应先完成 24 次 Baseline v2。D05 已明确暴露旧 `ultramerino.com` 抢占规范站引用及 Beta 实体关系泄漏；本批结束后再决定规范站证据强化与历史矩阵站治理，并继续补充可信第三方佐证。

本对话可以用于规划、分析用户带回的 Temporary Chat 结果、更新证据和制定内容；不得作为中性测试环境。
