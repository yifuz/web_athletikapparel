# Athletik Clothing GEO 工作台

> 建立日期：2026-08-12
>
> 规划更新：2026-09-03
>
> 规范站：<https://www.athletikapparel.com/>
>
> 最终目的：**被 AI 找到 → 被 AI 准确提取 → 被 AI 引用 → 在匹配的 B2B 采购问题中被 AI 推荐**
>
> 当前阶段：站内发现与提取基础已基本建立，Baseline v2 首轮月度测试正在进行；当前主要缺口已经从“能否抓取”转为“未点名供应商问题中的稳定引用与独立推荐证据”。

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

- Google 说明 AI Overviews / AI Mode 继续依赖常规搜索基础；页面需可索引并可展示摘要，不需要特殊 AI Schema、`llms.txt` 或把正文强行切成固定长度片段。参见 [Google AI features and your website](https://developers.google.com/search/docs/appearance/ai-features) 与 [Google generative AI optimization guide](https://developers.google.com/search/docs/fundamentals/ai-optimization-guide)。
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

### 5.2 提取与引用层：结构完成，结果仍需复测

- 已上线四篇第一方技术指南：
  - <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>
  - <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/>
  - <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/>
  - <https://www.athletikapparel.com/garment-quality-control-checklist/>
- 四篇指南使用可见正文、唯一 H1、文章目录、内部链接、外部技术参考、可见复核日期和 Organization 作者；JSON-LD 与页面正文对应，包含 Article、FAQPage 和 BreadcrumbList，Hub 使用 ItemList。
- Baseline v1 已证明规范站在品牌点名和指定网站问题中可以被识别与引用；这不能外推为未点名推荐。
- Baseline v2 已于 2026-09-03 启动。V2-E01 回答正确识别主要业务、张家港生产地和规范站，但未说明中美实体角色，并引入了尚未核准角色的 `athletik.com.cn`；由于环境元数据和来源面板不完整，该次仅暂存。

### 5.3 站外分发层：两篇完成，一篇待发布，证据补录滞后

| 对应意图 | 官网母文章 | LinkedIn / Instagram 状态 | 证据缺口 |
|---|---|---|---|
| V2-C07 | FLATLOCK vs OVERLOCK | 2026-08-12 已发布 | 两个平台公开 URL、Story 状态和七日数据待补录 |
| V2-C06 | Technical Knitwear Tech Pack | 2026-08-13 已发布 | 两个平台公开 URL、Story 状态和七日数据待补录 |
| V2-C08 | Evaluate a Vertically Integrated Knitwear OEM | 内容包已准备 | Baseline v2 本批结束后审核、发布并建档 |

社交分发有助于真实用户发现和实体/主题一致性，但 LinkedIn/Instagram 的自身帖子仍属于品牌可控内容，
不能替代独立行业来源，也不能用展示量证明 AI 已经引用或推荐。

### 5.4 推荐层：当前主要缺口

- Baseline v1 中 V1-03 曾在干净 Temporary Chat 把 Athletik 列为中国 FLATLOCK/ACTIVESEAM 供应商短名单第一，这是有价值但尚未形成跨引擎、跨月份稳定性的单次信号。
- 通用 sportswear OEM 与 Merino wool OEM 问题中 Athletik 当时未出现；GEO-06～08 的内容型问题也未引用 Athletik。新页面上线后的变化尚未通过 Baseline v2 验证。
- 站外权威机会池已经识别 Woolmark 条目、认证名录、Merrow、行业媒体和制造商目录等来源，但 ThomasNet、OEKO-TEX、WRAP 和 Merrow 等当前分别受平台资格、可核验输入或所有者优先级限制，不能写成已完成。
- 当前缺少的是“与具体采购判断相关的独立佐证”，不是链接总数。更多低质量目录、付费链接或自建推荐榜单不会解决该问题。

## 6. 阶段诊断

| 阶段 | 当前判断 | 主要理由 | 下一道门槛 |
|---|---|---|---|
| 找到 | 基础就绪，持续监测 | 生产 200、Sitemap、Canonical、内链、主要 crawler 可访问；17/18 GSC indexed | Services 转为 indexed；无新的抓取/indexability 回归 |
| 提取 | 部分达成 | 品牌题可提取核心业务与地点，但实体角色和历史站点仍可能混淆 | E01/E02 在三个产品中准确覆盖规范实体口径，且不引入未核准站点关系 |
| 引用 | 品牌题已出现，非品牌内容引用待验证 | 规范站可被引用，四篇指南结构完整；C06～C08 新基线尚未完成 | 同一固定内容题在至少两个独立产品/月份出现相关规范指南引用，且引用支持结论 |
| 推荐 | 尚未稳定，是主瓶颈 | D03 有单次正向信号；D04/D05 历史缺失；独立站外佐证不足 | Athletik 在匹配业务边界的 D03～D05 中跨产品/月份进入短名单，并给出准确理由 |

不建立一个把四阶段相加的“GEO 总分”。四阶段分别记录，否则品牌题的高准确率会掩盖未点名推荐的缺口。

## 7. Baseline v2 提示词—资产—缺口映射

| Prompt | 目标阶段 | 当前主要承接资产 | 当前缺口/决策 |
|---|---|---|---|
| V2-E01 | 提取 | 首页、About、Organization Schema | 中美实体角色与历史站关系仍可能被混淆；先完成测试，不在批次中改页 |
| V2-E02 | 提取 + 引用 | 首页、七个品类页、About、Services | 指定站点题是站内理解控制组，不计自然发现 |
| V2-D03 | 推荐 | 首页、FLATLOCK Guide、生产证据 | 需要更直接的 FLATLOCK 与 Merrow ACTIVESEAM 第一方证据；后续条件式建立专门内容 |
| V2-D04 | 推荐 | Sportswear、Underwear、Services、OEM Evaluation | 不再写泛化“best supplier”自荐文；优先补强项目匹配与独立佐证 |
| V2-D05 | 推荐 | Merino Wool 品类页、FLATLOCK Guide | 先审计 `ultramerino.com` 等历史矩阵站冲突和现有 Merino 证据，再决定是否建新指南，避免重复与内耗 |
| V2-C06 | 引用 | Tech Pack Guide | 等待 v2 复测；未出现引用前先判断来源覆盖和搜索意图，不机械改写 |
| V2-C07 | 引用 | FLATLOCK vs OVERLOCK Guide | 内容完整但核心词自然 SERP 尚弱；观察引用、GSC 和 Bing grounding query 后再迭代 |
| V2-C08 | 引用 | OEM Evaluation + QC Guide | 本批测试后发布已有社交包；不把品牌社交帖当独立背书 |

## 8. 单人执行计划

### P0 — 先建立有效测量基线（当前立即执行）

1. 在连续 3 个自然日内完成 8 条 Baseline v2 × ChatGPT Search、Perplexity、Google AI Mode 的首批 24 次测试。
2. 每条提示词使用独立干净会话，保存第一次回答、全部引用 URL、来源面板和环境元数据；缺项结果标为 `partial`，不补猜。
3. 本批结束前冻结会影响实体、指南正文、导航或 Schema 的上线修改，也不发布 GEO-08，避免改变观察条件。
4. 批次结束后只形成阶段诊断，不因为一次未出现就立刻改页；关键变化至少需要另一产品或下一月复现。

### P1 — 清掉证据债务并补引用观测（本批结束后 1 周内）

1. 发布已准备的 GEO-08 LinkedIn 单图与 Instagram Carousel，并记录公开 URL、实际时间、UTM 和 Story 状态。
2. 补录 GEO-07、GEO-06 的公开帖子 URL、Story 状态和已到期的七日平台/GA4 数据；无法取得的字段明确写 `unavailable`。
3. 将网站加入或核对 Bing Webmaster Tools；若账户出现 AI Performance，记录 total citations、cited pages 和 grounding queries 的月度快照。
4. 继续 GSC / GA4 现有监测；Google AI 功能数据若只汇总在 Web 搜索，不把无法拆分的流量写成 GEO 成果。

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
| GEO-V2-001 | 完成首批 24 次 Baseline v2 | 全漏斗测量 | P0 | `in-progress` | 24 行结果完整；不可用产品按规则记录，不混用替代品 |
| GEO-V2-002 | 补齐 V2-E01 环境和来源证据 | 测量有效性 | P0 | `partial` | Temporary Chat、模式、个性化、地区、设备和来源面板均已记录；否则保留 partial |
| GEO-V2-003 | 发布 GEO-08 分发包 | 引用发现入口 | P1 | `blocked-by-test-freeze` | 本批测试完成后发布，公开 URL、UTM、时间和 Story 状态入日志 |
| GEO-V2-004 | 补录 GEO-06/07 发布与七日数据 | 运营证据 | P1 | `overdue / owner-input` | 可得字段全部补录，不可得字段写 unavailable |
| GEO-V2-005 | 启用 Bing Webmaster Tools AI 引用观测 | 引用 | P1 | `owner-action` | 站点已验证；AI Performance 可用则建立首个快照，不可用则记录 unavailable |
| GEO-V2-006 | 建立 D03～D05 推荐证据矩阵 | 推荐 | P1 | `planned` | 每题至少有匹配事实、第一方 URL、第三方候选、缺失证据和公开边界 |
| GEO-V2-007 | ACTIVESEAM 原创技术内容立项判断 | 提取/引用/推荐 | P1 | `conditional` | 原创生产证据和事实审核完成后批准 brief；不满足则 not-needed |
| GEO-V2-008 | Merino 历史站与规范页冲突审计 | 提取/推荐 | P1 | `planned` | 确认所有权、索引、流量、引用、重复声明及处置建议；未经批准不改 URL/重定向 |
| GEO-V2-009 | 每月一个可信站外佐证动作 | 推荐 | P1 | `external-input` | 获得可公开、可索引、信息准确的真实条目/编辑内容；未成功不写完成 |

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

截至 2026-09-03，Athletik 已完成规范站、实体基础、四篇技术指南、主要 Schema、索引和两轮社交分发，
具备被搜索与 AI 系统发现和提取的良好基础；Baseline v2 正在建立新的中性时间序列。
下一阶段不应继续无差别增加页面，而应先完成 24 次基线，再用结果确定哪一项需要修正，并集中建立 D03～D05 所需的原创生产证据和可信第三方佐证。

本对话可以用于规划、分析用户带回的 Temporary Chat 结果、更新证据和制定内容；不得作为中性测试环境。
