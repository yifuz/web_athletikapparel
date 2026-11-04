# Athletik Clothing GEO 工作台

> 建立日期：2026-08-12；工作台核对更新：2026-11-04。
>
> 规范站：<https://www.athletikapparel.com/>
>
> 最终目的：**被 AI 找到 → 被 AI 准确提取 → 被 AI 引用 → 在匹配的 B2B 采购问题中被 AI 推荐**
>
> 当前阶段：基础建设和首轮内容实施已完成，正在核对来源选择、补强真实证据并观察已部署内容。10 月已有按各自验收范围接受的 ChatGPT Search 样本，Google AI Mode 11 题也已采集归档；不能再把 9 月历史 `valid 0` 当作全部当前状态。两平台、不同日期和 M2 / M4 采集模式分开，不汇总为同一推荐率。
>
> 最近已关闭交付：C06 示范与 C08 内容增补已通过生产验收；两页内容日期及 Tech Pack 入口说明于 11-02 完成合并生产验收。About 买家公开名单与中国生产地址 15 号更正于同日由所有者确认 `deployed / owner-accepted`。部署完成不等于 Google 重抓或 AI 成效。

本文件是 GEO 中央工作台，管理当前目标、判断和执行顺序。逐题样本、发布与数据保留在日期化来源；本次仅按仓库证据整理，没有重新抓取生产、平台或外部数据。

当前范围以 `AGENTS.md` 为准：官网、Instagram、当前 LinkedIn 均可优化和准备内容；公开发布仍需对应授权。所有者不管理 YouTube，既有视频信息更新已 `closed / out-of-scope / not-applied`，不要求接管；其他域名、账号与外联不自动纳入。

下一步沿用已有安排：先确认 C07 同面料 FLATLOCK / OVERLOCK 正反面实物样本及公开许可，再评估是否补充既有指南；不把外观示范写成性能测试。11-06 建议复查 C06 / C08 抓取与索引，10-30 LinkedIn Tech Pack 新帖的完整七日窗口为 10-31～11-06，11-07 起复盘。Bing 本轮按所有者决定暂缓，不重复催导出。

对应证据：[10 月有效样本验收](testing/valid-retest/batch-d-2026-10-29/README.md)、[Google AI Mode 对照](testing/valid-retest/google-ai-mode-2026-10-29/README.md)、[指南合并生产验收](testing/guide-content-dates-2026-10-31.md)、[买家名单](testing/buyer-disclosures-2026-11-02.md)、[技术证据盘点](testing/valid-retest/batch-d-2026-10-29/c06-c07-evidence-inventory-2026-10-29.md)、[分发日志](distribution/publishing-log.md)。

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
| 中国生产地址 | No. 15, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu 215699, China（所有者于 2026-11-02 更正官网误写的 25 号；不是搬迁记录） |
| 规范站 | <https://www.athletikapparel.com/> |
| 可控 GEO 渠道 | 规范官网、[LinkedIn](https://www.linkedin.com/company/111831319/) 与 [Instagram](https://www.instagram.com/athletikclothinginc/)；YouTube 是既有公开入口，但所有者不管理，本轮不执行编辑 |
| 核心定位 | Vertically integrated OEM for technical knitwear |
| 目标客户 | 北美和欧洲的中型 B2B 品牌、批发商和进口商；优先较大订单与持续返单，同时保留小客户、小单的项目评估空间 |
| 成衣商业门槛 | 标准入口为 500 pieces per style；定制面料每款每色通常按 400–500 件评估，可混码，结合最低米数、耗料及颜色拆分核算；不承诺任意拆色或接受所有小单 |
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
所有者已确认 `ultramerino.com` 为同方控制的 Merino 专业站，但该站当前不由本项目负责。GEO 网站执行范围以 Athletik 规范站为主，另含获准的 Instagram / LinkedIn 工作；UltraMerino 只作为来源冲突和历史事实样本，不在本项目中安排页面修改、跨域 Canonical、301 或内容复制。其生产知识只有在被当前证据独立复核后才可用于规范站，历史商业和能力声明不能自动升级为现行事实。

`athletik.com.cn` 已由所有者于 2026-09-30 确认仍在继续使用，不再归类为待下线的历史站，也不安排关闭、301 或跨域 Canonical。`athletikapparel.com` 仍是本项目的 GEO 规范站；`athletik.com.cn` 作为持续运行的中国实体站点单独维护。两站重叠的实体、客户、审核、设备、产能和地址断言应保留各自日期、法律实体与适用范围，未经当前复核不自动互相升级为最新事实。其他历史/类目矩阵站的所有权、当前角色和去留仍须逐站核验。

`powermerino.com` 已由所有者在[10-27 第二轮 SERP 研究](../seo/research/serp-commercial-round2-us-gb-ca-2026-10-27.md)中确认控制，仅作内部自有站分类，不计独立竞品/第三方佐证，不自动互链、合并或修改。

`athletik.nyc` / `athletikclothinginc.ca` 于 10-30 被所有者确认为无控制权，采用 `accepted-residual / monitor-only`；不安排登录、修改、关闭、重定向或外联。E01 的生产基地段同时共引这两站与中国站，不能确定某一站是全部细节的唯一来源；详见 [E01 来源核查](testing/e01-source-trace-2026-10-30.md)。

## 3. 平台事实与策略边界

以下是此前研究采用的平台边界与来源路由；本次文档整理没有重新核验外部页面或平台功能。遇实际功能变化再定向核查，不采用未经证明的“GEO 捷径”：

- Google 说明 AI Overviews / AI Mode 继续依赖常规搜索基础；页面需可索引并可展示摘要，不需要特殊 AI Schema、`llms.txt` 或把正文强行切成固定长度片段。GSC 当前已为本属性开放 Generative AI Beta 专用报表，可观察 impressions、Pages、Countries、Devices 和 Dates，但没有 Query、答案原文、推荐位置或转化。参见 [Google AI features and your website](https://developers.google.com/search/docs/appearance/ai-features)、[Google generative AI optimization guide](https://developers.google.com/search/docs/fundamentals/ai-optimization-guide) 与 [Generative AI performance report](https://support.google.com/webmasters/answer/16984139)。
- OpenAI 说明允许 `OAI-SearchBot` 有助于内容在 ChatGPT 搜索中被发现、摘要和引用；ChatGPT 引荐流量可在 Analytics 中观察。参见 [OpenAI Publishers and Developers FAQ](https://help.openai.com/en/articles/12627856-publishers-and-developers-faq)。
- Perplexity 将 `PerplexityBot` 定义为用于在搜索结果中发现和链接网页的 crawler；其访问状态需要与其他搜索 crawler 分开验证。参见 [Perplexity Crawlers](https://docs.perplexity.ai/docs/resources/perplexity-crawlers)。
- Bing Webmaster Tools 已提供 AI Performance 公开预览，可观察 citation count、cited pages 和 grounding queries；此前已建立账户基线；10-30 起按所有者决定 `deferred / low-signal`，不把下一窗口导出列为当前待办。参见 [Bing AI Performance](https://blogs.bing.com/webmaster/February-2026/Introducing-AI-Performance-in-Bing-Webmaster-Tools-Public-Preview)。

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
| [`testing/valid-retest/batch-d-2026-10-29/README.md`](testing/valid-retest/batch-d-2026-10-29/README.md) | 10-29 ChatGPT Search 独立续测验收、模式与证据限制 |
| [`testing/valid-retest/google-ai-mode-2026-10-29/README.md`](testing/valid-retest/google-ai-mode-2026-10-29/README.md) | Google AI Mode 11 题归档及跨平台逐题观察，不混算比率 |
| [`testing/guide-content-dates-2026-10-31.md`](testing/guide-content-dates-2026-10-31.md) | C06 / C08 内容日期及 Tech Pack 入口的 11-02 合并生产验收 |
| [`testing/buyer-disclosures-2026-11-02.md`](testing/buyer-disclosures-2026-11-02.md) | 买家公开列名、批准措辞与部署确认；不等同订单或背书 |
| [`testing/address-correction-2026-11-02.md`](testing/address-correction-2026-11-02.md) | 中国生产地址 15 号更正，历史样本原文保留 |
| [`distribution/social-content-sop.md`](distribution/social-content-sop.md) | 官网指南改编为 LinkedIn / Instagram 内容的执行 SOP |
| [`distribution/publishing-log.md`](distribution/publishing-log.md) | 每次站外分发的发布时间、链接和七日数据 |
| [`../seo/authority/offsite-authority-opportunity-pool-v1.md`](../seo/authority/offsite-authority-opportunity-pool-v1.md) | 站外行业引用、目录、认证名录和编辑机会的证据与状态 |
| [`../seo/v2-backlog.md`](../seo/v2-backlog.md) | SEO 索引、性能、页面实验和站外输入依赖；不由 GEO 重复建单 |
| [`../sitemap.md`](../sitemap.md) | 规范 URL、页面定位与信息架构 |
| [`../progress.md`](../progress.md) | 全项目状态；只保留 GEO 摘要，不替代本工作台 |

新 agent 开始 GEO 工作时，先读 `AGENTS.md`、本文件和 `testing/prompt-baseline.md`，再按任务读取分发或站外权威日志。不要仅依赖聊天历史。

## 5. 资产与日期化证据状态

下列 HTTP、Sitemap、GSC 与社交数值均属于标注日期的历史快照，不能当作 11-04 的实时总量或重新验收。

### 5.1 找到层：基础基本完成

- 2026-09-03 生产抽查：`robots.txt`、Sitemap index、Technical Guides Hub 与四篇指南均返回 HTTP 200；Page Sitemap 含 18 个 URL。
- 2026-09-30 全景审计复核：Page Sitemap 已增至 20 个 URL，20/20 均返回 HTTP 200、单一 H1 和自引用 Canonical；Technical Guides Hub 当前列出六篇指南。该结果是生产可访问性快照，不代替 GSC 索引覆盖或真实 crawler 日志。
- 2026-09-03 以 Googlebot、OAI-SearchBot、PerplexityBot、Claude-SearchBot 和 ChatGPT-User 抽查 Tech Pack Guide，均返回 HTTP 200。该测试只排除明显的 UA/robots/CDN 阻拦，不代替真实爬虫日志。
- 截至 2026-09-30，仓库中的 GSC 最新完整索引快照仍属于 18 URL 阶段：其中 17 个 `PASS / Submitted and indexed`，`/services/` 为 `Discovered - currently not indexed`。当时生产 Sitemap 已有 20 个 URL，但没有对应的完整 20 URL GSC 快照。这是历史差异；Services 后续以 SEO Backlog 的日期化记录为准，不据此重开任务或重复提交。
- Technical Guides Hub、首页、导航、页脚、品类页和指南之间已有稳定内链。
- 2026-09-05 首次 GSC Generative AI 导出返回 2026-07-21 至 09-02 共 29 次 Property impressions，证明本站链接已在实际 AI Overviews / AI Mode 结果中展示；这比 crawler/索引资格更强，但仍不证明答案准确提取或推荐了 Athletik。
- 2026-10-08 已取得 2026-09-03～09-30 的完整 28 天导出：Property impressions 为 190，对比前一等长窗口 27，增加 163（+603.7%，7.04×），有展示日期由 11/28 增至 27/28。前窗与 2026-08-13～08-17 日志异常重叠，当前窗也混合两篇新 Guide 上线前后日期，因此只确认链接可见性上升，不作页面或部署因果归因。

### 5.2 提取与引用层：结构完成，结果仍需复测

- 2026-09-30 已上线以下六篇指南，11-02 [合并验收](testing/guide-content-dates-2026-10-31.md)再次确认六页与 Hub 可用：
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

### 5.3 10 月采样与已部署证据补强

- [10-09 批次 B](testing/valid-retest/batch-b/README.md)已取得 11 条完整首答，但[逐条复核](testing/valid-retest/batch-b/review-2026-10-09.md)仍发现合并引用与部分横向表格截图缺口；文件/文本检查通过不等于整批有效。A/B 保留历史状态，后续独立样本不能反向补齐原记录。
- [手动 E01](testing/valid-retest/manual-e01/README.md) 已按所有者确认接受为 M2 有效样本；[批次 C](testing/valid-retest/batch-c/README.md) 的 E02 / D03-R2 为 M4 `valid / E3 / passed`。D03 首次记录及 A/B 仍保留原 `partial`，不覆盖。E02 为指定域名理解题，不计自然发现。
- [10-29 批次 D](testing/valid-retest/batch-d-2026-10-29/README.md)：Dot 7 条为 `valid / owner_confirmed`（M4）；手动 BD-01 为 `valid / owner_accepted`（M2）；Dot 原 BD-01 仍 `partial`。地区未知、手动 Sources 精简留证等限制保留，不冒称全部经 Codex 独立核验或 E3。
- [Google AI Mode 10-29 首答](testing/valid-retest/google-ai-mode-2026-10-29/README.md) 11 题已归档；5 题 16 个引用位置缺最终 URL，地区 unknown。可观察已知答案和引用，不补链接，不自动升级原方案 E3；不与 ChatGPT 不同日期/模式混算表现率。
- [C06 示范](testing/valid-retest/batch-d-2026-10-29/c06-tech-pack-demo-2026-10-29.md) 的尺寸表、BOM 与 PDF 已于 10-29 通过生产验收，仅供示范、不用于生产；[C08 增补](testing/valid-retest/batch-d-2026-10-29/c08-guide-copy-draft-2026-10-30.md) 于 10-30 通过生产验收。[C07 → ACTIVESEAM 上下文链接](testing/guide-context-links-2026-10-31.md) 于 10-31 完成生产验收。
- [C06 / C08 日期及 Tech Pack 入口说明](testing/guide-content-dates-2026-10-31.md) 于 11-02 生产验收关闭，保留原观察窗口。当天 [15 号地址更正](testing/address-correction-2026-11-02.md)与[买家公开名单](testing/buyer-disclosures-2026-11-02.md)按所有者确认关闭；后者未冒称 Agent 新执行生产验收。公开列名只证明原名单日期和范围，不证明当前订单、直接合同或质量背书。

### 5.4 站外分发层：发布与效果分别记录

| 对应意图 | 官网母文章 | LinkedIn / Instagram 状态 | 证据缺口 |
|---|---|---|---|
| V2-C07 | FLATLOCK vs OVERLOCK | 2026-08-12 已发布 | 两个平台公开 URL、Story 状态和七日数据待补录 |
| V2-C06 | Technical Knitwear Tech Pack | 2026-08-13 已发布 | 两个平台公开 URL、Story 状态和七日数据待补录 |
| V2-C08 | Evaluate a Vertically Integrated Knitwear OEM | Google AI Mode Sources 面板已发现 2026-08-14 Athletik LinkedIn 尽调帖；Instagram 状态待确认 | LinkedIn 实际公开 URL、Instagram 发布状态、Story 状态和七日数据待补录 |

10-30 Tech Pack 新示范 LinkedIn 帖已由所有者确认发布，状态 `published / owner-confirmed / public-url-pending / measuring`；公开 URL 与精确时分仍待补。完整七日窗口 10-31～11-06，11-07 起复盘。上述 8 月旧帖缺口和本次新帖分开，详见[发布日志](distribution/publishing-log.md)。

社交分发有助于真实用户发现和实体/主题一致性，但 LinkedIn/Instagram 的自身帖子仍属于品牌可控内容，
不能替代独立行业来源，也不能用展示量证明 AI 已经引用或推荐。

### 5.5 推荐层：历史观察与当前限制

以下 Baseline v1 / v2 和 Broad Discovery 首轮均为历史观察；v2 的有效性按 9 月回算结果保留 `partial`，不作为当前平台最新结果。

- Baseline v1 中 V1-03 曾在干净 Temporary Chat 把 Athletik 列为中国 FLATLOCK/ACTIVESEAM 供应商短名单第一，这是有价值但尚未形成跨引擎、跨月份稳定性的单次信号。
- Baseline v2 的首次 ChatGPT Search 结果中，D03、D04 和 D05 均把 Athletik 列为第一推荐，并给出与 technical knitwear、base layers、FLATLOCK/ACTIVESEAM 和 Merino wool 相关的明确理由。这是同一产品内跨三个采购意图的强正向信号，但不是跨产品或跨月份稳定性证明。
- D03 已确认 About Us 规范 URL；D04 来源面板可见 About、Sportswear 和 Sustainability 规范站卡片；D05 虽然实体名称与推荐理由准确，核心来源却是旧 `ultramerino.com`，并产生 Beta Textiles 与 Athletik 的未核准关系推断。规范站引用质量和实体隔离仍未稳定。
- Broad Discovery v1 的 BD-01 已在 Google AI Mode 与 ChatGPT Search 各完成一次：两边均未提 Athletik。Google 偏向由制造商自建榜单支持的区域供应商，ChatGPT 偏向大型 Tier-1 集团；两次均缺完整环境/来源面板证据，因此只记录为全球宽泛问题下的初步缺席，不与 D03～D05 的专业匹配推荐结果合并。
- BD-02 在限定 China 后，两边仍未提 Athletik，但候选已经收敛到中国 activewear OEM/ODM；Google 继续依赖制造商榜单/roundup，ChatGPT 主要引用候选官网。ChatGPT 额外把 `mid-sized` 自行限定为约 100–500 units/style/color，并出现 HUCAI 200 与引用页当前 100 pcs/style 的不一致，因此该次缺席未单独触发网站改动；后续 BD-03 已完成。
- Broad Discovery v1 首轮记录采集为 6/6（均 `partial`）：BD-01～BD-03 在 Google AI Mode 与 ChatGPT Search 中均未出现 Athletik，也未引用规范站。BD-03 已明确 China、activewear/performance apparel 和 500 pieces/style，当时仍未出现；这是宽泛发现缺口线索，不是有效中性样本的稳定缺席率。后续 Program Fit、About 与受控 Top 5 试验已有实施，最新 10-29 观察见下文，不重复执行旧建议。
- 站外权威机会池已经识别 Woolmark 条目、认证名录、Merrow、行业媒体和制造商目录等来源，但 ThomasNet、OEKO-TEX、WRAP 和 Merrow 等当前分别受平台资格、可核验输入或所有者优先级限制，不能写成已完成。
- 当前缺少的是“与具体采购判断相关的独立佐证”，不是链接总数。更多低质量目录、付费链接或自建推荐榜单不会解决该问题。

## 6. 阶段诊断（按已有证据更新至 2026-11-04）

| 阶段 | 当前判断 | 主要理由 | 下一道门槛 |
|---|---|---|---|
| 找到 | 基础与实际链接展示已建立 | 既有 GSC Generative AI 等长窗口 27 → 190 属于 9 月；11-02 六指南和 Hub 的生产技术验收通过 | 按已排窗口观察抓取与展示，不把历史页面数当作当前全站统计 |
| 提取 | 核心实体可提取，跨域关系仍有残余风险 | 10-29 Google E01 共引规范站、中国站、NYC / Canada；10-30 已核查，无权域名按所有者决定监测 | 在可控渠道保持准确口径；只有反复出现且有实际影响的错误再评估处置 |
| 引用 | 已有对应 Guide 的实际引用，仍不稳定 | 10-29 Google C07 实际引用 FLATLOCK Guide；ChatGPT 同题仅候选，C06 / C08 两平台本次未见官网实际引用 | 先观察已部署 C06 / C08；区分候选与正文引用，不把单次变化归因为改版 |
| 推荐 | 专业题有已接受的推荐观察，宽泛题结果分化 | ChatGPT D03 / D04 / D05 各次推荐；Google D03 第1、D05 第2、D04 未提，BD-03 第1，BD-01 只引自有 Top 5 而未推荐 Athletik | 不同日期、平台、M2 / M4 分开；保留未知地区与引用缺口，等待独立可比复现 |

不建立四阶段相加的“GEO 总分”。品牌题、指定域名题、候选来源、实际引用与采购推荐分别记录。具体结果以[两平台逐题对照](testing/valid-retest/google-ai-mode-2026-10-29/README.md)为准。

### 6.1 风险台账（保留既有 ID，11-04 核对更新）

状态含义：`active` 需要执行动作；`controlled` 已有持续控制但仍需监测；`accepted-residual` 是所有者知情接受且当前不投入修复；`closed / monitoring` 已满足验收条件，只观察是否复发；`red-line` 是持续适用、不能以一次完成关闭的发布边界。

| ID | 类型 | 风险与当前状态 | 优先级 | 负责人建议 | 决策、动作与验收口径 |
|---|---|---|---|---|---|
| GEO-RISK-001 | 事实/治理 | 中央文档与日期化证据漂移；`controlled / reconciliation-complete` | P1 监测 | 文档维护者 + 网站负责人 | 9-30 清理记录保留；11-04 定向恢复被删进度并核对 10-29～11-02 来源。当前入口区分已部署、owner-accepted、采样有效性和实时数据；未重做全站审计。 |
| GEO-RISK-002 | 测量 | 批次完成标签掩盖证据差异；`controlled` | P1 监测 | GEO 执行者 | 9 月首轮 valid 0 保留为历史；10 月 E01 / C / D 按各自已接受范围记录，旧 partial 不升级；不混算平台、日期、M2 / M4 或未知地区，也不将 owner-accepted 自动写成 E3。 |
| GEO-RISK-003 | 测量 | 内部 QA 污染 GA4/UTM；`controlled` | P1 | 分析负责人 | 保留原始值并标记 `measurement-contaminated`，从外部访问和转化中剔除；验收为快照同时给出 raw 与 confirmed-external。 |
| GEO-RISK-004 | 信源 | 采购判断所需独立佐证仍有限；`controlled / monitoring` | P1 | 所有者 + 内容负责人 | 11-02 已核验两家买家公开列名并上线 About，范围限日期化名单；既有设备方外联仍 suspended-awaiting-media。两者分别记录，不把公开列名写成工艺性能或当前订单背书。 |
| GEO-RISK-005 | 合规/证据 | 客户、Logo、认证和审核存在授权与范围边界；`red-line` | P0 红线 | 所有者 | 发布前核对授权、法律实体、站点、产品/材料/工序范围和有效期；历史页面属实不等于可脱离原范围作为当前营销断言复用。 |
| GEO-RISK-006 | 执行边界 | UltraMerino 等站点不在本项目执行范围；`accepted-scope` | P2 | 所有者 | 本项目只记录冲突，不擅自修改、复制、设置 Canonical 或重定向；若职责改变再重新立项。 |
| GEO-RISK-007 | 外部资料 | 旧 LinkedIn 管理权丢失；`accepted-residual / monitor-only` | P2 | 所有者 + 社交管理员 | 所有者确认历史内容属实且页面不再更新；当前不投入追索或修复，新内容只发当前 LinkedIn。若 AI/搜索产生新的实体误判或账号找回，再重新打开。 |
| GEO-RISK-008 | 基础设施 | `myathletik.com` 退役状态；`closed / monitoring` | P2 | 基础设施负责人 | 2026-09-30 已验证四种 host/scheme 与普通、Googlebot、OAI UA 均为 410；任一入口重新出现 200/3xx 或旧正文时重新打开。 |
| GEO-RISK-009 | 跨站治理 | `athletik.com.cn` 持续运行带来的双站事实同步；`active-governance` | P1 | 所有者 + 两站维护者 | 不关闭、不重定向；保持其中国实体站点角色。重叠断言按法律实体、日期和范围核验；AI 引用该站时单独记录来源归属，不把它误判为退役缓存或独立第三方背书。 |

风险台账不把 `accepted-residual` 或 `closed / monitoring` 计入当前 P0。P0 只保留会直接污染事实源、测量结论或未经授权公开声明的问题。

2026-09-30 历史清理说明：当时把 `GEO.md` 与 `testing/prompt-baseline.md` 作为当前控制入口；`baseline-*-diagnosis-2026-09-11.md`、`*-2026-09-14.md`、测量快照和全景审计等日期化文件继续保存当日证据，不把其中的 18 URL、四篇 Guide 或当时待确认状态机械改写为今天的事实。后续引用日期化文件时必须同时读取本工作台的当前状态。

## 7. Baseline v2 提示词—资产—缺口映射

本表使用已归档的 10 月观察和后续部署记录，不改写固定问题原文；每题的限制见[逐题对照](testing/valid-retest/google-ai-mode-2026-10-29/README.md)。

| Prompt | 目标阶段 | 当前承接资产 | 当前缺口/决策 |
|---|---|---|---|
| V2-E01 | 提取 | 首页、About、Organization Schema | 手动样本已接受；Google 共引跨域来源的风险已核查，NYC / Canada 无控制权，接受残余风险并监测；地址现为15号 |
| V2-E02 | 提取 + 引用 | 首页、品类、About、Services | 批次 C 已 valid / E3 / passed，Google 亦实际引用官网；指定域名题不计自然发现 |
| V2-D03 | 推荐 | FLATLOCK / ACTIVESEAM 指南、产品及生产证据 | ChatGPT D03-R2 已通过验收，Google 亦推荐并引官网指南；ACTIVESEAM 已上线，不重新立项 |
| V2-D04 | 推荐 | Sportswear、Underwear、About、Services | ChatGPT 本次第1，Google 本次未提；About 买家名单已上线，独立可比结果仍待后续观察 |
| V2-D05 | 推荐 | Merino Wool、Underwear、About | ChatGPT 本次第1，Google 第2且引官网；同方站不是独立背书，UltraMerino 冲突审计已完成且站点改动范围外 |
| V2-C06 | 引用 | Tech Pack Guide 与示范 PDF | 两平台本次未见目标实际引用；10-29 示范、11-02 日期/入口均已部署，先复查抓取并观察，不重复堆清单 |
| V2-C07 | 引用 | FLATLOCK vs OVERLOCK Guide | Google 本次实际引用，ChatGPT 仅候选；先确认同面料正反面样本及公开许可，现有不同面料视频不能当性能对比 |
| V2-C08 | 引用 | OEM Evaluation + QC Guide | 两平台本次未见官网实际引用；10-30 登记与实验室核验增补、11-02 日期同步已部署，观察既有窗口 |
| BD-01 | 宽泛推荐 | 首页、Sportswear、Top 5、站外信号 | ChatGPT 手动样本未提；Google 引 Top 5 却推荐其他供应商；引用不等于推荐 |
| BD-02 | 宽泛推荐 | Sportswear、About、Top 5 | 两平台本次未提；Google 有引用 URL 缺口，不补造或据此判定唯一原因 |
| BD-03 | 商业匹配推荐 | About、品类 Program Fit、Top 5、Contact | ChatGPT 未提，Google 第1并引 Top 5；自有榜单不是独立评级，不以一次结果扩大同类页面 |

## 8. 单人执行计划（当前顺序）

1. **收口既有交付后观察。** C06 示范、C08 内容、C07 上下文链接和 11-02 日期/入口均完成生产验收；地址与 About 买家名单按所有者确认关闭。11-06 建议核对 C06 / C08 抓取与索引，不重复申请、不重置原观察窗口。部署及内容日期不等于搜索重抓日期。
2. **确认 C07 可公开实物。** 继续既有[技术证据盘点](testing/valid-retest/batch-d-2026-10-29/c06-c07-evidence-inventory-2026-10-29.md)的同面料 FLATLOCK / OVERLOCK 正反面样本机会。未确认存在与许可前不制作虚构案例、启动拍摄或改页；外观与性能证据分开。
3. **维护可控分发证据。** 10-30 LinkedIn 新帖待实际 URL，11-07 起复盘完整七日窗口；旧 GEO-06/07/08 的 URL、Story 和可得数据缺口继续按[发布日志](distribution/publishing-log.md)补录。Instagram / LinkedIn 可准备内容，但每次公开发布按授权执行，YouTube 更新已关闭。
4. **保持测量口径。** 9 月首轮与 A/B 的 partial 不覆盖；E01、C、D、Google 独立入账。已完成两平台 10 月采集，不重新批量采样或用缺少来源的记录补齐分母。GSC 生成式展示、实际回答、GA4、正式询盘分开；Bing 本轮 deferred / low-signal。
5. **有触发再扩量。** claim-to-source 矩阵、Program Fit、About、ACTIVESEAM、UltraMerino 冲突审计和 Top 5 试验已有记录，不重新立项。设备方佐证/外联继续按暂缓决定；买家公开名单已核验并应用，不等同外联解禁。新材料或重复出现的明确证据缺口成立后，再评估既有页面的增量价值。

每月保留固定 Prompt 与可比环境，内容效果按既定完整窗口观察；短周期仅修复已证实的事实错误或技术阻断。本轮不增加 Backlog，不因单次未提及改 URL、Title、Schema 或建立近义页面。

## 9. 活跃行动清单

| ID | 行动 | 对应阶段 | 优先级 | 状态 | 完成标准 |
|---|---|---|---|---|---|
| GEO-V2-001 | 完成首批 24 条 Baseline v2 记录 | 全漏斗测量 | P0 | `record-complete / valid 0; partial 16; unavailable 8` | ChatGPT Search 与 Google AI Mode 共 16 条实际回答均为 `partial`；Perplexity 8 条为 `unavailable / plan-access`。完成的是记录采集，不是有效中性基线；未混用替代品 |
| GEO-V2-002 | 补齐 V2-E01 环境和来源证据 | 测量有效性 | P0 | `closed / manual-valid / historical-partial-preserved` | 9 月和 A/B 原记录保留 partial；10-09 手动 E01 已按所有者确认接受为 M2 有效样本，不再要求重复补证或采样，见[记录](testing/valid-retest/manual-e01/README.md) |
| GEO-V2-003 | 核实并完成 GEO-08 分发 | 引用发现入口 | P1 | `partial / LinkedIn-source-card` | 补录已被 Google 找到的 LinkedIn 帖子公开 URL、UTM 和时间；确认 Instagram/Story 状态，未发布部分审核执行 |
| GEO-V2-004 | 补录 GEO-06/07 发布与七日数据 | 运营证据 | P1 | `overdue / owner-input` | 可得字段全部补录，不可得字段写 unavailable |
| GEO-V2-005 | 启用 Bing Webmaster Tools AI 引用观测 | 引用 | P1 | `baseline-established / current-cycle-deferred-low-signal` | 9-22 已建立首份基线；10-30 所有者选择暂缓本轮额外导出和分析，保留截图 34 citations 的原范围，不与历史28天直接比较，见[Bing 基线](testing/bing-ai-performance-baseline.md) |
| GEO-V2-006 | 建立 D03～D05 / C06～C08 claim-to-source 证据矩阵 | 引用/推荐 | P1 | `complete` | 已记录六题的匹配事实、规范第一方 URL、AI 实际来源、第三方候选、缺失证据与公开边界；见日期化矩阵 |
| GEO-V2-007 | ACTIVESEAM 原创技术内容与分发 | 提取/引用/推荐 | P1 | `deployed / production-verified / social-feed-published / public-urls-confirmed / indexed-snapshot-confirmed / seven-day-measurement-contaminated / measuring` | 两支 Merrow ACTIVESEAM 实际操作视频、一支自然状态成衣接缝展示和一支 Yamato FLATLOCK 对照视频均已核验；Merrow 型号为 `MB-4DFO 2.0`，2 线与 3 线按项目要求使用。页面、Technical Guides Hub、Article / FAQPage / BreadcrumbList Schema、Sitemap 和真实生产媒体已部署；2026-09-18 完成生产复核和一次 GSC 索引申请，同日补录 LinkedIn 视频帖与 Instagram 6 页 Carousel 的公开 URL。2026-09-28 固定窗口复核确认 URL Inspection 为 `PASS / Submitted and indexed`，页面 Search Analytics 为 18 impressions、0 clicks。原始 LinkedIn UTM 为 `sessions = 6`、`engagedSessions = 4`、`totalUsers = 1`，但唯一用户已由设备、地区切换和所有者操作确认属于内部 QA；Instagram 无匹配行，所以本轮为 0 个已确认外部 UTM 会话。平台后台与人工询盘仍 `unavailable`，不能扩写为 0 次曝光。未写入 Slim / Comfort / Infused 版本、Athletik 自测性能百分比或把自然状态画面写成测试；详见[分发日志](distribution/publishing-log.md) |
| GEO-V2-008 | Merino 专业站与规范页冲突审计 | 提取/推荐 | P0 | `complete / conflicts-recorded / remediation-outside-project-control` | 已确认 UltraMerino 为同方控制、双站同时运营；完成 HTTP、robots、41 URL Sitemap、自引用 Canonical、页面结构、AI 引用和冲突声明审计。该站当前不由本项目负责，因此不在本项目执行整改；未取得的该域名 GSC/Bing、反链和当前设备/许可专项证据只在未来职责改变时补查 |
| GEO-V2-009 | 每月一个可信站外佐证动作 | 推荐 | P1 | `equipment-outreach-suspended / buyer-disclosures-applied` | 9-18 设备方佐证包与外联因专项素材暂缓，未解禁。11-02 已按后续专项授权核验并应用两家买家公开名单，部署按所有者确认关闭；不把这项完成扩大为联系设备商/媒体或取得工艺性能背书 |
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
| GEO-V2-021 | 建立首份 GEO 跨平台月度快照 | 全漏斗测量 | P0 | `gsc-ai-refresh-complete / bing-deferred-low-signal` | 9 月自然月和 9-03～9-30 的 GSC Generative AI 窗口已有日期化记录；Property 前窗27、后窗190为历史数据。10-30 Bing 已按所有者决定暂缓，不继续列待导出 |
| GEO-V2-022 | 对齐 GEO 当前真值与日期化历史快照 | 治理 | P0 | `complete / monitoring` | 9-30 的原清理已完成；11-04 对本工作台回退差异定向核对并恢复，按10月验收、11-02部署、15 号地址及最新渠道范围更新当前摘要；历史证据不覆盖 |
| GEO-V2-023 | 建立 Baseline / Broad Discovery 有效分母 | 全漏斗测量 | P0 | `complete / historical-denominators-retained` | 9月回算首轮 valid 为0是历史结论；10月E01、C、D已有按各自标准接受的样本。按平台、日期、模式分别报告，不把两者矛盾化或混算统一表现率 |
| GEO-V2-024 | 建立首轮有效复测执行包 | 全漏斗测量 | P0 | `accepted-samples-recorded / google-observations-archived` | E01手动M2已接受；批次C的E02 / D03-R2为M4 valid / E3 / passed；10-29批次D为Dot七条M4 valid / owner_confirmed与手动BD-01 M2 valid / owner_accepted。旧partial不覆盖，Google AI Mode 11题已独立归档但保留未知地区及5题16个引用位置URL缺口；不混算或冒称全部E3 |

## 10. 统一记录与判断口径

### 10.1 每次提示词测试至少记录

- 日期、产品、可见模型/模式、登录/Temporary Chat、个性化设置、网络地区、界面语言和设备。
- 固定 Prompt ID 与未经改写的提示词。
- 第一次完整回答、全部引用 URL 和来源面板证据。
- Athletik 是否被提及、是否进入短名单、位置、推荐理由和主要竞品。
- 规范站是否被引用、引用具体支持什么结论、是否出现过期域名或错误实体。
- 结果有效性：`valid`、`partial`、`personalized`、`product-unavailable` 或 `intent-mismatch`。

### 10.2 月度结果分别报告

所有者对特定样本接受的留证范围只适用于该样本，不改变其他批次规则；`valid / owner_accepted`、独立核验的 E3 与跨批可比性分开。缺失的来源、地区或采集字段仍保留 unknown。

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

截至 2026-11-04 的文档核对，六篇技术指南已经上线；Program Fit、About、主站事实证据增强与 Top 5 受控试验的既有部署记录保留。C06 / C08 新增内容和 11-02 日期/入口验收已关闭；买家公开列名与15 号地址按所有者确认关闭。上文生产、索引、GSC与GA4数字均沿用各自日期化来源，本次没有实时刷新，不把 20 URL或 9 月展示量当作 11 月全站现值。

测量已从“历史首轮 valid 0”推进到按独立批次接受样本及两平台逐题观察。Google 10-29 的 C07 已实际引用目标指南，BD-03 已推荐 Athletik；ChatGPT 的相关候选不等于引用，专业题推荐不等于宽泛发现稳定。旧 partial、未知地区、缺失最终URL和内部QA污染仍显式保留，不计算混合推荐率、不归因于近期部署。

下一步是核实 C07 同面料可公开样本，按11-06/11-07既有节点复查抓取和LinkedIn新帖窗口。没有当前材料则保留待确认，不重复重写近期指南；Bing与YouTube按已确认决定暂缓/关闭。官网和可控Instagram、LinkedIn范围保持，不自动扩张到其他站点或外联。

本轮 Finding outcome：`documentation-reconciled / source-checked`。恢复的是已有执行与证据边界，未新增 Backlog、网站改动、生产操作、外部研究或采样。

本对话可以用于规划、分析用户带回的 Temporary Chat 结果、更新证据和制定内容；不得作为中性测试环境。
