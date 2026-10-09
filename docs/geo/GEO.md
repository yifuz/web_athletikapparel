# Athletik Clothing GEO 工作台

> 建立日期：2026-08-12
>
> 规划更新：2026-10-09
>
> 规范站：<https://www.athletikapparel.com/>
>
> 最终目的：**被 AI 找到 → 被 AI 准确提取 → 被 AI 引用 → 在匹配的 B2B 采购问题中被 AI 推荐**
>
> 当前阶段：Baseline v2 与 Broad Discovery v1 的首轮**记录采集**均已完成，但 2026-09-30 回算确认有效中性分母仍为 0：Baseline v2 为 16 条 `partial` + 8 条 `unavailable`，Broad Discovery v1 为 6 条 `partial` + 3 条 `unavailable`。Athletik 在 FLATLOCK / ACTIVESEAM / Merino 等专业采购题的 `partial` 观察中出现强推荐信号，Broad Discovery 的 6 条 `partial` 观察为 `0/6 answer mentions`、`0/6 canonical citations`；这些用于描述性诊断，不作为正式推荐率或稳定趋势。当前主要瓶颈是测量有效性、宽泛 buyer-fit、规范来源归属、对应 Guide 引用和独立第三方佐证。

> 2026-10-08 的 11 条 ChatGPT Search M4 样本因截图、完整 Sources 面板和 C06/C08 文本尾部缺口保持历史 `partial`。2026-10-09 已另建 [`重采批次 B`](testing/valid-retest/batch-b/README.md)，11/11 完整首答已取得，保存 74 张回答分段截图、26 张 Sources 截图及 C07 宽表格补图；文本长度、提示词哈希、文件与纵向覆盖检查通过。Sources 面板现已通过 Summary 入口识别。B 仍为 `collection-complete / owner-review-pending`，合并引用、横向表格与网络变化待复核，正式有效分母仍为 0。Google AI Mode 11 条尚未开始，本次未修改网站。

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
- 核准量化证据：15+ 年经验、4,500+ m² 自有生产设施、30+ Yamato FLATLOCK machines、around 100 sewing workers、100,000+ pieces/month、成衣 MOQ 500 pieces/style。Merrow ACTIVESEAM 与 HSAT-K5 的设备类型和用途可公开，但未提供的台数不推断。
- 当前已发布的认证和审核范围由所有者确认为有效；公开引用仍需保留法律实体、生产地点、材料或产品、项目范围和当前有效期边界，不能解释为每个订单自动覆盖。
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

`myathletik.com` 已按所有者决定完全下线，不做跨域 301。2026-09-30 复核 HTTP/HTTPS、www/裸域，并以普通 UA、Googlebot 和 OAI-SearchBot 请求，全部返回 HTTP 410；该风险记为 `closed / monitoring`，后续只有重新出现 200/3xx、旧正文或 AI 持续引用缓存时才重新打开。

旧 LinkedIn 页面 `linkedin.com/company/athletik-clothing-inc` 是历史介绍页。所有者于 2026-09-30 确认页面内容属实，但管理账号已丢失且不会再发布新内容。它不再作为当前运营渠道，风险从 P0 降为 `accepted-residual / monitor-only`：以后所有新发布与官方社交信号只使用当前 [LinkedIn](https://www.linkedin.com/company/111831319/)；旧页中的客户、审核、人数、地址和成立年份仍按历史页面的原有范围理解，不自动作为当前项目可重复使用的最新断言。只有 AI/搜索结果因该页产生新的实体误判，或重新取得账号权限时，才重新评估治理动作。
所有者已确认 `ultramerino.com` 为同方控制的 Merino 专业站，但该站当前不由本项目负责。GEO 主执行范围只优化 Athletik 规范站；UltraMerino 只作为来源冲突和历史事实样本，不在本项目中安排页面修改、跨域 Canonical、301 或内容复制。其生产知识只有在被当前证据独立复核后才可用于规范站，历史商业和能力声明不能自动升级为现行事实。

`athletik.com.cn` 已由所有者于 2026-09-30 确认仍在继续使用，不再归类为待下线的历史站，也不安排关闭、301 或跨域 Canonical。`athletikapparel.com` 仍是本项目的 GEO 规范站；`athletik.com.cn` 作为持续运行的中国实体站点单独维护。两站重叠的实体、客户、审核、设备、产能和地址断言应保留各自日期、法律实体与适用范围，未经当前复核不自动互相升级为最新事实。其他历史/类目矩阵站的所有权、当前角色和去留仍须逐站核验。

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
| [`testing/baseline-v2-post-batch-diagnosis-2026-09-11.md`](testing/baseline-v2-post-batch-diagnosis-2026-09-11.md) | Baseline v2 首批测试后的四阶段诊断、finding、证据缺口和最小行动顺序 |
| [`testing/baseline-integrated-diagnosis-2026-09-11.md`](testing/baseline-integrated-diagnosis-2026-09-11.md) | 汇总 Baseline v1、v2、Broad Discovery、GSC 生成式曝光和分发证据的综合诊断与 90 天方案 |
| [`testing/claim-to-source-matrix-2026-09-14.md`](testing/claim-to-source-matrix-2026-09-14.md) | D03～D05 / C06～C08 的规范来源、实际 AI 来源、公开边界、独立证据缺口和优先级 |
| [`testing/ultramerino-canonical-conflict-audit-2026-09-14.md`](testing/ultramerino-canonical-conflict-audit-2026-09-14.md) | UltraMerino 的可访问性、Sitemap、Canonical、AI 来源选择、冲突声明和双站治理建议 |
| [`testing/ai-cited-source-pattern-audit-2026-09-14.md`](testing/ai-cited-source-pattern-audit-2026-09-14.md) | AI 实际引用站点的页面模式、可迁移做法、风险边界和 Athletik 优先改进项 |
| [`testing/ai-cited-source-monthly-template.md`](testing/ai-cited-source-monthly-template.md) | 每月固定 Baseline 复测后的 Sources URL、模式、迁移判断和改动门槛模板 |
| [`testing/bing-ai-performance-baseline.md`](testing/bing-ai-performance-baseline.md) | Bing AI Performance 的首份概览与页面级基线；Grounding Queries 已由所有者确认无记录 |
| [`testing/geo-measurement-snapshot-2026-09-28.md`](testing/geo-measurement-snapshot-2026-09-28.md) | 传统 GSC、GSC Generative AI、Bing AI Performance 与 GA4 AI referral 的首份跨平台月度快照 |
| [`testing/geo-measurement-snapshot-2026-10-08.md`](testing/geo-measurement-snapshot-2026-10-08.md) | GSC Generative AI 首个等长 28 天对比窗口、当前页面/国家/设备分布及有效复测数据闸门 |
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
- 2026-09-30 全景审计复核：Page Sitemap 已增至 20 个 URL，20/20 均返回 HTTP 200、单一 H1 和自引用 Canonical；Technical Guides Hub 当前列出六篇指南。该结果是生产可访问性快照，不代替 GSC 索引覆盖或真实 crawler 日志。
- 同日以 Googlebot、OAI-SearchBot、PerplexityBot、Claude-SearchBot 和 ChatGPT-User 抽查 Tech Pack Guide，均返回 HTTP 200。该测试只排除明显的 UA/robots/CDN 阻拦，不代替真实爬虫日志。
- 截至 2026-09-30，仓库中的 GSC 最新完整索引快照仍属于 18 URL 阶段：其中 17 个 `PASS / Submitted and indexed`，`/services/` 为 `Discovered - currently not indexed`。当前生产 Sitemap 已有 20 个 URL，但尚无对应的完整 20 URL GSC 快照；实时测试曾通过并已请求一次，当前按周监测，不重复提交或改页。
- Technical Guides Hub、首页、导航、页脚、品类页和指南之间已有稳定内链。
- 2026-09-05 首次 GSC Generative AI 导出返回 2026-07-21 至 09-02 共 29 次 Property impressions，证明本站链接已在实际 AI Overviews / AI Mode 结果中展示；这比 crawler/索引资格更强，但仍不证明答案准确提取或推荐了 Athletik。
- 2026-10-08 已取得 2026-09-03～09-30 的完整 28 天导出：Property impressions 为 190，对比前一等长窗口 27，增加 163（+603.7%，7.04×），有展示日期由 11/28 增至 27/28。前窗与 2026-08-13～08-17 日志异常重叠，当前窗也混合两篇新 Guide 上线前后日期，因此只确认链接可见性上升，不作页面或部署因果归因。

### 5.2 提取与引用层：结构完成，结果仍需复测

- 截至 2026-09-30 已上线六篇第一方技术指南：
  - <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>
  - <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/>
  - <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/>
  - <https://www.athletikapparel.com/garment-quality-control-checklist/>
  - <https://www.athletikapparel.com/top-sportswear-manufacturers-china/>
  - <https://www.athletikapparel.com/flatlock-vs-activeseam-technical-knitwear/>
- 六篇指南使用可见正文、唯一 H1、文章目录、内部链接、外部技术参考、可见复核日期和 Organization 作者；JSON-LD 与页面正文对应，包含 Article、FAQPage 和 BreadcrumbList，Hub 使用 ItemList。
- Baseline v1 已证明规范站在品牌点名和指定网站问题中可以被识别与引用；这不能外推为未点名推荐。
- 截至 2026-09-02 的首份 GSC Generative AI Page 表返回 13 个规范 URL；当时已上线的四篇早期 Technical Guides 均至少出现一次，FLATLOCK Guide 7 次、QC Guide 4 次。它们属于页面级链接曝光和 citation-surface evidence；报表没有 Query 与答案原文，不能验证链接支持的具体结论，也不代表后来上线的第五、第六篇 Guide 已进入该历史窗口。
- 2026-09-03～09-30 的 Page 表返回 14 个规范 URL、199 次页面级链接曝光，其中 FLATLOCK Guide 63、Top Sportswear Guide 31、QC Guide 29、ACTIVESEAM Guide 9；Tech Pack 与 OEM Evaluation 没有返回行。Page 合计可高于 190 次 Property impressions，不能写成 199 个独立回答；没有返回行也不写成零需求或内容失败。
- Baseline v2 首轮记录采集已完成：ChatGPT Search 8/8、Google AI Mode 8/8，16 条实际回答均为 `partial`；Perplexity 8 条按 `unavailable / plan-access` 记录，正式 `valid` 分母为 0。描述性观察中，ChatGPT D03～D05 均把 Athletik 列第 1，但 D05 的核心引用来自旧 `ultramerino.com`；C06～C08 为 0/3 个已验证对应 Guide 引用。Google AI Mode E01/E02 找到规范站但仍受旧站候选/旧口径影响；D03 第 1但引用非规范来源、D04 未出现、D05 第 3并引用当前规范 Merino 页面；C06 未引目标 Guide，C07 只引首页，C08 的 Sources 面板把 Athletik LinkedIn 尽调帖列为第一张卡片，但仍未引用官网目标 Guide。这些信号可用于定位来源和内容缺口，不能写成有效中性样本上的推荐率或稳定复现。
- 2026-10-08 有效复测包完成 11 条 ChatGPT Search 运行并保存 169 条 inline citation 最终 URL。描述性观察为：D03、D04、D05 均把 Athletik 列第 1并引用 `athletikapparel.com`；E01/E02 正确提取品牌、生产地、产品和主要能力；C06～C08 未提及 Athletik，也未引用规范 Guide；三条 Broad Discovery 均未提及 Athletik。因完整 UI 截图、整合 Sources 面板和两条超长文本存在证据缺口，11 条仍为 `partial`，不得与历史 partial 合并计算正式推荐率或引用率。

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
- Broad Discovery v1 的 BD-01 已在 Google AI Mode 与 ChatGPT Search 各完成一次：两边均未提 Athletik。Google 偏向由制造商自建榜单支持的区域供应商，ChatGPT 偏向大型 Tier-1 集团；两次均缺完整环境/来源面板证据，因此只记录为全球宽泛问题下的初步缺席，不与 D03～D05 的专业匹配推荐结果合并。
- BD-02 在限定 China 后，两边仍未提 Athletik，但候选已经收敛到中国 activewear OEM/ODM；Google 继续依赖制造商榜单/roundup，ChatGPT 主要引用候选官网。ChatGPT 额外把 `mid-sized` 自行限定为约 100–500 units/style/color，并出现 HUCAI 200 与引用页当前 100 pcs/style 的不一致，因此此次缺席不能触发网站改动；先用 BD-03 的明确 500 pieces/style 条件完成商业匹配测试。
- Broad Discovery v1 首轮现已完成 6/6：BD-01～BD-03 在 Google AI Mode 与 ChatGPT Search 中均未出现 Athletik，也未引用规范站。BD-03 已明确 China、activewear/performance apparel 和 500 pieces/style，缺席仍然持续；这说明品牌在泛 sportswear supplier discovery 中存在真实可见性缺口。它与专业 D03～D05 的强推荐信号并存，当前应优化“宽泛买家匹配入口”和第三方证据，而不是稀释 technical knitwear 定位或发布自建最佳厂商榜单。
- 站外权威机会池已经识别 Woolmark 条目、认证名录、Merrow、行业媒体和制造商目录等来源，但 ThomasNet、OEKO-TEX、WRAP 和 Merrow 等当前分别受平台资格、可核验输入或所有者优先级限制，不能写成已完成。
- 当前缺少的是“与具体采购判断相关的独立佐证”，不是链接总数。更多低质量目录、付费链接或自建推荐榜单不会解决该问题。

## 6. 阶段诊断

| 阶段 | 当前判断 | 主要理由 | 下一道门槛 |
|---|---|---|---|
| 找到 | 已获得 Google 实际展示证据，持续监测 | 2026-09-30 生产 20/20 URL 为 200、单一 H1、自引用 Canonical；主要 crawler 抽查可访问；17/18 GSC indexed 属于 18 URL 阶段的历史索引快照；Generative AI 首个基线 29 impressions | 为当前 20 URL 建立新的完整索引快照；完整可比窗口持续出现目标页面；无新的抓取/indexability 回归 |
| 提取 | 部分达成，历史来源污染已复现 | 品牌题可提取核心业务、地点与规范站，但 Google AI Mode E01 混入 `athletik.nyc` 的 5 家伙伴工厂、年产 500 万件及未核准区域域名关系 | E01/E02 在两个可用产品或跨月份准确覆盖规范实体口径，且不引入未核准站点关系 |
| 引用 | Google 链接曝光与站外来源候选已出现，但内容题尚未取得规范指南引用 | 历史 GSC 窗口中四篇早期 Guide 均有页面级链接曝光；6 条 C06～C08 跨产品记录均为 `partial`，其中 ChatGPT 为 0/3 已验证目标 Guide 引用，Google C06 未引目标 Guide、C07 只引首页、C08 只在 Sources 面板出现 Athletik LinkedIn 尽调帖 | 在 `valid` 运行中取得相关规范 Guide 引用；同题在至少两个独立产品或月份复现，且引用支持结论 |
| 推荐 | `partial` 观察中跨产品出现，正式有效率尚不可计算 | ChatGPT D03～D05 的 3 条 `partial` 记录均为第 1；Google AI Mode D03 第 1/非规范来源引用、D04 未出现、D05 第 3/规范 Merino 页面引用；这些不构成 `valid` 推荐率 | 下一月以完整环境和独立会话取得 `valid` 记录并继续进入匹配短名单；规范站与可信独立来源支持准确理由，且不混淆实体关系 |

不建立一个把四阶段相加的“GEO 总分”。四阶段分别记录，否则品牌题的高准确率会掩盖未点名推荐的缺口。

### 6.1 风险台账（2026-09-30）

状态含义：`active` 需要执行动作；`controlled` 已有持续控制但仍需监测；`accepted-residual` 是所有者知情接受且当前不投入修复；`closed / monitoring` 已满足验收条件，只观察是否复发；`red-line` 是持续适用、不能以一次完成关闭的发布边界。

| ID | 类型 | 风险与当前状态 | 优先级 | 负责人建议 | 决策、动作与验收口径 |
|---|---|---|---|---|---|
| GEO-RISK-001 | 事实/治理 | 中央文档、历史快照与生产真值漂移；`controlled / reconciliation-complete` | P1 监测 | 文档维护者 + 网站负责人 | 2026-09-30 已扫描 `docs/geo/` 的 21 个 Markdown 文件，并对齐 20 个 Sitemap URL、六篇 Guide、`legalName`、退役域名、LinkedIn 与 `athletik.com.cn` 当前口径；日期化历史快照保留原值并明确日期。以后生产资产或所有者决策变化时复查当前态入口。 |
| GEO-RISK-002 | 测量 | 批次 `complete` 标签可能掩盖单次 `partial`；`controlled / denominator-established` | P1 监测 | GEO 执行者 | 2026-09-30 已建立首轮有效分母表：Baseline v2 为 `valid 0 / partial 16 / unavailable 8`，Broad Discovery v1 为 `valid 0 / partial 6 / unavailable 3`。以后每批继续同时报告 `valid / partial / unavailable / personalized / intent-mismatch`；正式比率只使用 `valid`。 |
| GEO-RISK-003 | 测量 | 内部 QA 污染 GA4/UTM；`controlled` | P1 | 分析负责人 | 保留原始值并标记 `measurement-contaminated`，从外部访问和转化中剔除；验收为快照同时给出 raw 与 confirmed-external。 |
| GEO-RISK-004 | 信源 | 与采购判断相关的独立外部证据不足；`active / suspended-awaiting-media` | P1 | 所有者 + 内容负责人 | 等待机器铭牌、接缝细节和同面料 sew-off 等专项素材；恢复后每月最多推进一项可信来源，不以低质目录、付费链接或自建榜单补量。 |
| GEO-RISK-005 | 合规/证据 | 客户、Logo、认证和审核存在授权与范围边界；`red-line` | P0 红线 | 所有者 | 发布前核对授权、法律实体、站点、产品/材料/工序范围和有效期；历史页面属实不等于可脱离原范围作为当前营销断言复用。 |
| GEO-RISK-006 | 执行边界 | UltraMerino 等站点不由本项目控制；`accepted-scope` | P2 | 所有者 | 本项目只记录冲突，不擅自修改、复制、设置 Canonical 或重定向；若职责改变再重新立项。 |
| GEO-RISK-007 | 外部资料 | 旧 LinkedIn 管理权丢失；`accepted-residual / monitor-only` | P2 | 所有者 + 社交管理员 | 所有者确认历史内容属实且页面不再更新；当前不投入追索或修复，新内容只发当前 LinkedIn。若 AI/搜索产生新的实体误判或账号找回，再重新打开。 |
| GEO-RISK-008 | 基础设施 | `myathletik.com` 退役状态；`closed / monitoring` | P2 | 基础设施负责人 | 2026-09-30 已验证四种 host/scheme 与普通、Googlebot、OAI UA 均为 410；任一入口重新出现 200/3xx 或旧正文时重新打开。 |
| GEO-RISK-009 | 跨站治理 | `athletik.com.cn` 持续运行带来的双站事实同步；`active-governance` | P1 | 所有者 + 两站维护者 | 不关闭、不重定向；保持其中国实体站点角色。重叠断言按法律实体、日期和范围核验；AI 引用该站时单独记录来源归属，不把它误判为退役缓存或独立第三方背书。 |

风险台账不把 `accepted-residual` 或 `closed / monitoring` 计入当前 P0。P0 只保留会直接污染事实源、测量结论或未经授权公开声明的问题。

2026-09-30 真值清理说明：本轮把 `GEO.md` 与 `testing/prompt-baseline.md` 作为当前控制入口；`baseline-*-diagnosis-2026-09-11.md`、`*-2026-09-14.md`、测量快照和全景审计等日期化文件继续保存当日证据，不把其中的 18 URL、四篇 Guide 或当时待确认状态机械改写为今天的事实。后续引用日期化文件时必须同时读取本工作台的当前状态。

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
| BD-01 | 宽泛推荐 | 首页、Sportswear、站外实体信号 | 无国家、无技术和无 MOQ 限定；用于观察全球 sportswear OEM/ODM 候选池，不用未出现否定专业匹配 |
| BD-02 | 宽泛推荐 | 首页、Sportswear、About、站外实体信号 | 只限定中国与 mid-sized brand；观察 Athletik 是否进入通用中国 sportswear OEM/ODM 短名单及主要竞争者 |
| BD-03 | 商业匹配推荐 | About、七个品类页、Services、Contact、当前 MOQ 500 口径 | 两个产品均未出现 Athletik；七品类 Program Fit 与 About 综合 buyer-fit 段落均已于 2026-09-14 完成生产部署和复核，集中表达目标买家、项目范围和商业起点；不推断每色 MOQ 或价格，按完整月度窗口复测 |

## 8. 单人执行计划

### P0 — 有效测量基线（首批完成）

1. 完成 8 条 Baseline v2 × ChatGPT Search、Perplexity、Google AI Mode 的首批记录；Perplexity 因当前无会员权限按 8 条 `unavailable / plan-access` 记录，不付费、不换产品替代。
2. 每条提示词使用独立干净会话，保存第一次回答、全部引用 URL、来源面板和环境元数据；缺项结果标为 `partial`，不补猜。
3. 首批测试期间冻结了会影响实体、指南正文、导航或 Schema 的上线修改；该冻结现已随 Google C08 完成而结束。
4. 批后阶段诊断和最小改动清单已形成，见 [`testing/baseline-v2-post-batch-diagnosis-2026-09-11.md`](testing/baseline-v2-post-batch-diagnosis-2026-09-11.md)；不因为一次未出现就立刻改页，关键变化至少需要另一产品或下一月复现。

### P1 — 清掉证据债务并补引用观测（本批结束后 1 周内）

1. 核实 GEO-08 的实际发布状态：Google 已发现 2026-08-14 Athletik LinkedIn 尽调帖；补录其公开 URL、实际时间和 UTM，并确认 Instagram Carousel/Story 是否已发布，未发布部分再审核执行。
2. 补录 GEO-07、GEO-06 的公开帖子 URL、Story 状态和已到期的七日平台/GA4 数据；无法取得的字段明确写 `unavailable`。
3. 将网站加入或核对 Bing Webmaster Tools；若账户出现 AI Performance，记录 total citations、cited pages 和 grounding queries 的月度快照。
4. 每月导出 GSC Generative AI 的 Property impressions、Pages、Countries、Devices 和 Dates；与传统 Web Search、GA4、固定提示词和第三方估算分开。Page 明细不与 Property 总量机械相加，也不把链接曝光直接写成准确提取或推荐。

### P1 — 建立“可被推荐”的证据链（未来 30～60 天）

每月只推进一个主主题，维持网站 1 篇深度内容/月的保守基线：

1. 建立 D03～D05 推荐证据矩阵：买家问题、Athletik 匹配事实、站内原始证据、可信第三方佐证、缺失输入、可公开边界。
2. `Industrial FLATLOCK vs Merrow ACTIVESEAM for Cut-and-Sew Technical Knitwear` 已完成证据 intake、英文正文、所有者 copy/视觉审核、生产部署、技术验收、社交公开 URL 核验、一次 GSC 索引申请与首轮七日复盘，现为 `deployed / production-verified / social-feed-published / public-urls-confirmed / indexed-snapshot-confirmed / seven-day-measurement-contaminated / measuring`。2026-09-28 URL Inspection 已确认 `Submitted and indexed`；固定窗口取得 18 次 Web Search 展示、0 点击。原记录中的 LinkedIn UTM 活动已确认来自所有者使用 Windows / Edge 与 Clash Verge 切换中国、美国出口进行的内部 QA，因此外部成效统计为 0 个已确认外部 UTM 会话；平台后台和人工询盘仍缺，不能据此推断社交曝光为 0。正文继续使用原创生产证据，不把自然状态展示写成拉伸测试，也不列未确认的 Slim / Comfort / Infused 版本；月度 GSC 生成式窗口已取得 9 次页面级链接曝光，下一步进入固定 Prompt 有效复测，不单独改页。
3. D04 不再优先增加另一篇泛化供应商清单。更有价值的是经授权的项目案例，或不披露客户名称的可核验开发/QC 流程证据；没有授权和真实结果时不建案例。
4. D05 的 Merino Wool 规范页与 UltraMerino 重复、冲突、索引和引用审计已完成；UltraMerino 当前不由本项目负责，因此本项目保留冲突记录但不安排跨站修改。若未来职责改变，再依据届时证据决定同步、增强或保持不变。
5. 站外每月只推进一项：优先真实设备方/认证方/行业编辑来源，其次是可维护的高质量制造商资料页；不以目录数量为 KPI。当前被外部输入阻塞的项目保持 deferred，不使用错误地址或不完整证书提交。

### P2 — 90 天验证与扩量条件

1. 每月按固定 v2 提示词运行一次，不增加日常重复测试。
2. 内容发布后至少观察 28～90 天的索引、查询、引用和引荐；短周期只处理事实错误或技术阻断。
3. 只有某主题出现相关 grounding query、规范页引用、非品牌展示增长或短名单进入信号时，才继续同一 topic cluster。
4. 如果 90 天后仍只有品牌题能提取、未点名题无引用，优先重新评估独特证据和站外来源，不继续堆同类文章。

## 9. 活跃行动清单

| ID | 行动 | 对应阶段 | 优先级 | 状态 | 完成标准 |
|---|---|---|---|---|---|
| GEO-V2-001 | 完成首批 24 条 Baseline v2 记录 | 全漏斗测量 | P0 | `record-complete / valid 0; partial 16; unavailable 8` | ChatGPT Search 与 Google AI Mode 共 16 条实际回答均为 `partial`；Perplexity 8 条为 `unavailable / plan-access`。完成的是记录采集，不是有效中性基线；未混用替代品 |
| GEO-V2-002 | 补齐 V2-E01 环境和来源证据 | 测量有效性 | P0 | `partial` | Temporary Chat、模式、个性化、地区、设备和来源面板均已记录；否则保留 partial |
| GEO-V2-003 | 核实并完成 GEO-08 分发 | 引用发现入口 | P1 | `partial / LinkedIn-source-card` | 补录已被 Google 找到的 LinkedIn 帖子公开 URL、UTM 和时间；确认 Instagram/Story 状态，未发布部分审核执行 |
| GEO-V2-004 | 补录 GEO-06/07 发布与七日数据 | 运营证据 | P1 | `overdue / owner-input` | 可得字段全部补录，不可得字段写 unavailable |
| GEO-V2-005 | 启用 Bing Webmaster Tools AI 引用观测 | 引用 | P1 | `baseline-established` | 2026-09-22 只读 API 已确认站点验证；[首份 Bing 基线](testing/bing-ai-performance-baseline.md)在 2026-08-24～09-20 的完整 28 天 CSV 中汇总 5 次引用、4 个 cited-page-days。Pages 截图列出 FLATLOCK vs OVERLOCK Guide 2 次、About Us 2 次、首页 1 次；所有者已在后台确认 Grounding Queries 当前无记录。页面截图未显示日期范围，不作日期级页面归因；引用不等于推荐 |
| GEO-V2-006 | 建立 D03～D05 / C06～C08 claim-to-source 证据矩阵 | 引用/推荐 | P1 | `complete` | 已记录六题的匹配事实、规范第一方 URL、AI 实际来源、第三方候选、缺失证据与公开边界；见日期化矩阵 |
| GEO-V2-007 | ACTIVESEAM 原创技术内容与分发 | 提取/引用/推荐 | P1 | `deployed / production-verified / social-feed-published / public-urls-confirmed / indexed-snapshot-confirmed / seven-day-measurement-contaminated / measuring` | 两支 Merrow ACTIVESEAM 实际操作视频、一支自然状态成衣接缝展示和一支 Yamato FLATLOCK 对照视频均已核验；Merrow 型号为 `MB-4DFO 2.0`，2 线与 3 线按项目要求使用。页面、Technical Guides Hub、Article / FAQPage / BreadcrumbList Schema、Sitemap 和真实生产媒体已部署；2026-09-18 完成生产复核和一次 GSC 索引申请，同日补录 LinkedIn 视频帖与 Instagram 6 页 Carousel 的公开 URL。2026-09-28 固定窗口复核确认 URL Inspection 为 `PASS / Submitted and indexed`，页面 Search Analytics 为 18 impressions、0 clicks。原始 LinkedIn UTM 为 `sessions = 6`、`engagedSessions = 4`、`totalUsers = 1`，但唯一用户已由设备、地区切换和所有者操作确认属于内部 QA；Instagram 无匹配行，所以本轮为 0 个已确认外部 UTM 会话。平台后台与人工询盘仍 `unavailable`，不能扩写为 0 次曝光。未写入 Slim / Comfort / Infused 版本、Athletik 自测性能百分比或把自然状态画面写成测试；详见[分发日志](distribution/publishing-log.md) |
| GEO-V2-008 | Merino 专业站与规范页冲突审计 | 提取/推荐 | P0 | `complete / conflicts-recorded / remediation-outside-project-control` | 已确认 UltraMerino 为同方控制、双站同时运营；完成 HTTP、robots、41 URL Sitemap、自引用 Canonical、页面结构、AI 引用和冲突声明审计。该站当前不由本项目负责，因此不在本项目执行整改；未取得的该域名 GSC/Bing、反链和当前设备/许可专项证据只在未来职责改变时补查 |
| GEO-V2-009 | 每月一个可信站外佐证动作 | 推荐 | P1 | `suspended / awaiting-dedicated-media` | 2026-09-18 所有者决定先暂停第三方佐证包与外联，待补拍机器铭牌、接缝细节、同面料 sew-off 等专项素材后恢复；暂停期间不建立半成品资料包、不联系设备商或媒体。恢复后以获得可公开、可索引、信息准确的真实条目或编辑内容为完成标准 |
| GEO-V2-010 | 建立 GSC Generative AI 月度观测 | 找到/引用入口 | P0 | `first-comparable-window-established` | 首个三个月基线与 2026-09-03～09-30 完整窗口均已入档；Property 等长窗口为 27 → 190 impressions。继续保持 Property、Page、Country、Device 与 AI 回答样本口径分离 |
| GEO-V2-011 | 完成 Baseline v2 首批测试后四阶段诊断 | 全漏斗决策 | P0 | `complete` | 诊断分别覆盖找到、提取、引用与推荐；技术阻断、来源归属、证据债务和最小行动已分开记录 |
| GEO-V2-012 | 建立并运行 Broad Discovery v1 | 宽泛推荐发现 | P0 | `record-complete / valid 0; partial 6; unavailable 3` | BD-01～BD-03 共 6 次首次回答均为 `partial`；Perplexity 3 条为 `unavailable / plan-access`。Athletik 在 6 条 `partial` 观察中正文出现与规范站引用均为 0/6；不写成有效中性样本的出现率，结果不与 Baseline v2 合并 |
| GEO-V2-013 | 审核 Sportswear buyer-fit answer block | 宽泛推荐入口 | P1 | `superseded by GEO-V2-016` | 原单页实验方案已由所有者调整为七品类整批结构优化；Sportswear 仍包含在新批次中，不再单独等待低样本前后差异 |
| GEO-V2-014 | 完成全部 Baseline 数据综合诊断与 90 天方案 | 全漏斗决策 | P0 | `complete / strategy-adjusted` | 已分别判断找到、提取、规范引用、专业推荐、宽泛推荐和业务结果；低曝光阶段由严格单变量调整为可审计的整批结构优化，仍保留证据依赖和固定复测门槛 |
| GEO-V2-015 | About Us 综合 buyer-fit paragraph | 提取/宽泛推荐入口 | P0 | `deployed / production-verified / measuring` | 2026-09-14 生产验收：综合段落已上线；页面 HTTP 200、单一 H1、自引用 Canonical、`index` 且 JSON-LD 可解析。后续只按完整月度窗口观察，不从低样本即时波动归因 |
| GEO-V2-016 | 七品类 Program Fit 整批优化 | 提取/宽泛推荐入口 | P0 | `deployed / production-verified` | 2026-09-14 线上复核：七个品类页均 HTTP 200、单一 H1、单一 Program Fit；六个成衣品类各有两处 500 pieces/pcs，Knitted Fabrics 没有成衣 500 口径；不改 URL、Title、H1 或 Schema |
| GEO-V2-017 | UltraMerino 事实同步 | 提取/来源归属 | P2 | `deferred / outside-project-control` | 该站当前不由本项目负责；保留冲突记录，不在本项目修改。若未来职责改变，再核对 MOQ、产能、设备/员工数量、工艺边界、认证、材料来源和 Schema |
| GEO-V2-018 | 建立 AI 实际引用来源模式审计 | 全漏斗决策 | P0 | `operational` | 已按实际 Sources 面板完成首轮审计并建立月度模板；以后随固定 Baseline 每月增量更新，不按单次样本大改网站 |
| GEO-V2-019 | 主站可引用事实与设备证据补强 | 提取/引用/推荐 | P0 | `deployed / production-verified / measuring` | 2026-09-14 生产验收：首页、About、Merino 均 HTTP 200、单一 H1、自引用 Canonical、`index` 且 JSON-LD 可解析；新增事实完整出现。Page Sitemap 为 18/18 唯一 URL，三页及 Sitemap index 的 `lastmod` 已更新为 `2026-09-14T02:50:00+00:00`；AI 相关爬虫未被 robots.txt 屏蔽 |
| GEO-V2-020 | 自有 Top 5 供应商指南受控试验 | 宽泛发现/引用/推荐 | P1 | `deployed / production-verified / social-feed-published / indexed-snapshot-confirmed / seven-day-measurement-contaminated / measuring` | `/top-sportswear-manufacturers-china/` 已接入共用 Technical Guides 架构；比较 Athletik、HUCAI、SANSANSUN、INGORSPORTS 与 Bellasports，首屏公开发布者利益关系，并提供筛选方法、MOQ 冲突、来源和事实限制。LinkedIn 单图帖已公开核验，Instagram Feed 已由所有者确认发布。2026-09-16 生产页与社交 UTM 目标均恢复 HTTP 200 并完成一次索引请求；2026-09-22 GSC 只读 URL Inspection 返回 `PASS / Submitted and indexed`，最后抓取为 2026-09-16。9 月 15～21 日原始 GA4 曾记录 LinkedIn 帖子 UTM 7 sessions、5 engagedSessions、1 totalUsers，其中 3 sessions 以该文章为入口；2026-09-28 已确认该唯一用户属于内部 QA，故从外部成效统计中排除。Instagram 无匹配行，平台后台精确指标与人工询盘仍 `unavailable`。详细口径见[发布日志](distribution/publishing-log.md)；不把内部会话、引用或索引状态当作买家推荐，也不因污染样本改页 |
| GEO-V2-021 | 建立首份 GEO 跨平台月度快照 | 全漏斗测量 | P0 | `gsc-ai-refresh-complete / bing-refresh-pending` | 传统 GSC 与 GA4 已建立 9 月自然月基线；GSC Generative AI 的 2026-09-03～09-30 完整窗口为 190 Property impressions，对比前窗 27。该指标只证明链接展示，不证明推荐或转化。Bing 第二个完整窗口仍不早于 2026-10-20；详见[10 月 8 日补充快照](testing/geo-measurement-snapshot-2026-10-08.md) |
| GEO-V2-022 | 对齐 GEO 当前真值与日期化历史快照 | 治理 | P0 | `complete / monitoring` | 已扫描 21 个 GEO Markdown 文件，修正当前控制入口中的 20 URL、六篇 Guide、`legalName`、域名和社交资料口径；日期化文件保留原值并明确不可当作当前事实。以后资产或所有者决策变化时复查 |
| GEO-V2-023 | 建立 Baseline / Broad Discovery 有效分母 | 全漏斗测量 | P0 | `complete / valid-baseline-not-yet-established` | 已逐条读取“运行有效性”字段并发布平台分母表；首轮 `valid` 为 0。下一窗口只有满足环境、独立会话、第一次完整回答和来源证据要求的记录才进入正式比率 |
| GEO-V2-024 | 建立首轮有效复测执行包 | 全漏斗测量 | P0 | `in-progress / ChatGPT-recollected / owner-review-pending` | GSC 数据闸门已通过；批次 A 的 11 条 ChatGPT 为历史 `partial`，Google AI Mode 11 条仍为 `planned`。2026-10-09 [批次 B](testing/valid-retest/batch-b/README.md) 已取得 11 条完整首答并通过采集文件检查；复核合并引用、横向表格及恢复段 Los Angeles → San Jose 网络变化后再判定正式有效性。Perplexity 可用性本次未重核 |

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
- **宽泛供应商发现 BD-01～BD-03**：按全球宽泛、中国宽泛、500 pieces/style 商业匹配分别报告；记录短名单位置、规范站/矩阵站/第三方来源类型与竞品，不与 D03～D05 合并。
- **内容权威性 C06～C08**：Athletik 指南被引用题数/有效运行数、引用相关性、错误结论和竞品来源。
- **Google 生成式搜索展示**：GSC Property impressions、获得页面级链接曝光的规范 URL、Countries、Devices 和 Dates；不推断报表未提供的 Query、Clicks、答案内容或推荐位置。
- **访问与业务结果**：AI referral sessions、engaged sessions、有效询盘；样本不足时只报绝对值，不报趋势。

社交 Campaign 在解释前必须先排除内部 QA。若生产 UTM 与固定 Windows / Edge 用户、代理国家切换、
异常 Landing Page 或人工检查时间一致，原始 GA4 数字继续保留，但标记为 `measurement-contaminated`
并从外部访问和转化统计中剔除。`0 confirmed external UTM sessions` 只表示没有已确认的外部 UTM 会话；
它不等于平台曝光或真实浏览为 0，也不能排除拒绝统计同意或浏览器拦截造成的未测访问。

“稳定改善”的最低工作定义是：同一固定意图在至少两个独立产品或连续两个月出现同方向变化，且没有依赖品牌点名、历史聊天或错误事实。它仍不是永久排名保证。

## 11. 内容与站外工作的硬边界

- 不制作 `llms.txt`、所谓 AI 专用 Schema 或固定字数“答案块”来追求捷径。
- 不把自有“best manufacturers”名单伪装成独立评级或批量复制。允许将其作为宽泛发现的受控试验，但必须披露发布者利益关系、公开筛选方法、事实来源与验证边界，并单独衡量抓取、引用、品牌提及和推荐。
- 不批量生成低信息密度文章，不为了覆盖提示词建立近义页面。
- 不采购传递排名权重的链接、目录包、虚假评论或伪装成用户的社区提及。
- Reddit/论坛只用于真实身份下解决问题和参与讨论，不做脚本化品牌植入。
- 客户名称、Logo、订单结果和案例必须先进入授权台账；未授权时不发布。
- 认证、设备、产能和材料声明都必须对应当前可核验证据；历史站内容不能自动升级为现行事实。
- 不把 Instagram/LinkedIn 展示、传统 GSC 排名或单次 AI 回答互相替代。

## 12. 当前准确状态

截至 2026-10-09，Athletik 已完成规范站、实体基础和六篇已上线指南；主要 Schema、索引基础和首轮社交分发均已建立。第五篇供应商比较指南和第六篇 ACTIVESEAM 技术指南均已部署、分发并取得 GSC `Submitted and indexed` 快照；这只证明对应 URL 已收录，不代表获得 AI 引用或推荐。GSC Generative AI 的首个等长 28 天比较已建立：2026-09-03～09-30 为 190 Property impressions，前窗为 27；Page 表返回 14 个规范 URL，四篇 Guide 合计 132 次页面级链接曝光。该结果确认生成式链接可见性扩大，但不提供 Query、答案、推荐位置或转化。Baseline v2 的历史记录采集仍为 ChatGPT Search 8 条与 Google AI Mode 8 条 `partial`、Perplexity 8 条 `unavailable`，正式 `valid` 分母仍为 0。

Broad Discovery v1 的记录采集也已完成：Google AI Mode 与 ChatGPT Search 共 6 条实际回答全部为 `partial`，Perplexity 3 条为 `unavailable`；6 条 `partial` 观察均未提 Athletik、未引用规范站。这说明现有描述性信号呈现“专业意图强、宽泛供应商发现弱；链接展示已发生、规范内容引用仍弱”的分层状态，但在取得 `valid` 分母前不能升级为稳定率或因果结论。七品类 Program Fit 与 About 综合 buyer-fit 已上线并完成生产复核；GEO-V2-020 于 2026-09-22 取得 GSC 已收录快照，首轮七日 GA4 原始数据随后被确认由内部 QA 污染，平台后台与有效询盘仍缺，不能把自有名单型页面当作独立背书。GEO-V2-007 于 2026-09-28 取得 GSC 已收录快照和 18 次 Web Search 展示；原始 LinkedIn UTM 的 6 个会话同样已确认属于内部 QA，Instagram 无匹配行。两次活动目前均为 0 个已确认外部 UTM 会话，但平台曝光/浏览未知，状态改为 `seven-day-measurement-contaminated`，不从污染样本归因。D03～D05 / C06～C08 [`claim-to-source 证据矩阵`](testing/claim-to-source-matrix-2026-09-14.md)、[`UltraMerino 冲突审计`](testing/ultramerino-canonical-conflict-audit-2026-09-14.md)和 [`AI 实际引用来源模式审计`](testing/ai-cited-source-pattern-audit-2026-09-14.md)均已完成。UltraMerino 当前不由本项目负责，因此事实同步降为外部范围；完整 GSC Generative AI 月度窗口已取得，下一步执行有效复测，不重复提交、不从污染或低样本强行归因。

2026-10-08 的 [GSC Generative AI 补充快照](testing/geo-measurement-snapshot-2026-10-08.md)已使复测的数据时间闸门通过，没有把 GSC 业务导出当成 AI 回答样本。同日已在固定环境中采集 11 条 ChatGPT Search：实体题 2/2 提及并引用规范站，专业发现题 D03～D05 为 3/3 提及、首位推荐并引用规范站，内容题 C06～C08 与宽泛发现题 BD01～BD03 均为 0/3 提及；这些只属于描述性观察。由于 10 条记录没有完整 UI 答案截图、当次未取得完整 Sources 面板，且 C06/C08 回答尾部文本截断，11 条全部保持 `partial / owner-review-pending`，正式 `valid` 分母仍为 0。下一步按同一冻结 Prompt 完成 11 条 Google AI Mode，并改进完整回答与 Sources 证据保存；Bing 第二窗口在 2026-10-20 后导出。继续把生成式链接展示、AI 回答、GA4 会话和询盘分别报告，不从残缺、污染或低样本窗口强行归因。

2026-10-09 已完成 [ChatGPT 重采批次 B](testing/valid-retest/batch-b/README.md) 的 11 条完整首答，保存完整文本、74 张回答分段截图、26 张 Sources 截图及 C07 宽表格补图；提示词哈希、文本长度、文件和纵向覆盖检查通过。原设置已恢复，旧批次 A 保留历史 `partial`。B 的合并引用、横向表格与恢复段 San Jose 出口仍须正式复核，当前 `valid` 分母保持 0；下一步先完成该复核，再按冻结 Prompt 运行 Google AI Mode，不重复重采已完成的回答。

本对话可以用于规划、分析用户带回的 Temporary Chat 结果、更新证据和制定内容；不得作为中性测试环境。
