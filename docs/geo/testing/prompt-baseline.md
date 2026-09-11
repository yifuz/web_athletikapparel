# GEO 提示词基线与实体一致性记录

> 建立日期：2026-08-08
> 范围：针对 ChatGPT Search、Perplexity 和 Google AI Mode 进行轻量级月度观察；Gemini App 作为独立可选轨道，不与 Google AI Mode 混算。本记录不构成排名保证。
> 中央 GEO 状态、已完成工作与下一步顺序见 [`../GEO.md`](../GEO.md)；本文件保留 Baseline v1 历史快照、Baseline v2 固定提示词、逐次结果和证据明细。
>
> 版本状态：Baseline v1 冻结于 2026-08-12；Baseline v2 自 2026-08-12 起成为后续月度主基线。两个版本不能逐题硬比较，也不能合并为同一时间序列。
>
> MOQ 状态更新（2026-08-17）：当前公开 MOQ 调整为每款 500 件。冻结的 V1-04、V2-D04 及历史结果保留 1,000 件原文，以维持时间序列和证据完整性；新的 500 件供应商发现测试必须建立新版本或新 ID，不能回写旧提示词。

## 1. 执行规则

- 每月以英文运行一次相同版本的固定提示词；每条提示词单独开启一个全新会话，不在同一对话中连续测试。
- ChatGPT Search 使用 Temporary Chat，并关闭 Custom Instructions；Temporary Chat 不使用或创建 Memory，但仍会执行启用中的 Custom Instructions。
- Perplexity 使用未登录匿名会话或 Incognito；如果使用登录账户，必须确认 Company、Occupation、Custom Instructions、Personalization 和 Connectors 不含 Athletik 或服装业务上下文。
- Google AI Mode 关闭 Personalized Recommendations、Personal Intelligence、Search Services History 影响和 Preferred Sources；使用隐私浏览窗口。即使关闭个性化，仍记录实际网络地区、界面语言和设备类型。
- Gemini App 若单独测试，使用 Temporary Chat，关闭 Memory/Personal Intelligence、Instructions 和 Connected Apps。Gemini App 与 Google AI Mode 分开记录，不能互相替代。
- 保持联网/搜索功能开启；统一使用英文界面/英文回答，地区目标固定为美国。若产品只能按实际网络地区运行，记录实际地区，不伪装成美国结果。
- 使用各产品的标准网页搜索回答，不使用 Deep Research、Research 或其他需要额外提示/长流程的研究模式；如果产品自动切换模式，如实记录可见模式。
- 记录第一次回答，不要为了让品牌出现而反复重新生成。
- 分开记录品牌提及和网站引用：提到品牌但没有链接，不算网站引用。
- 保存完整回答、来源面板中的实际 URL 和截图；分享链接不能替代来源 URL。记录产品、登录状态、临时/隐私模式、搜索模式、可见模型、语言、实际地区和运行日期。
- 不跨引擎比较原始排名；每个引擎只与其自身上月结果比较。
- 如果 Search Console 已为此资源显示生成式 AI 效果报告，则每月记录其展示次数和被引用页面。该功能仍在逐步推出，菜单暂未出现不视为错误。
- 检查 GA4 获客/引荐数据中可归因的 AI 搜索访问。引荐流量比未附引用的品牌提及更有证明力。
- 单独标记个性化运行。凡回答出现“your own”、引用用户身份/业务关系，或 Memory Sources 显示历史聊天、Saved Memory、文件或应用来源，均只作为个性化观察，不计入中性 GEO 基线。
- 每月默认每条提示词运行一次。若出现关键状态变化，例如“未提及 → 进入短名单”“无引用 → 引用规范站”或反向变化，在相同条件下增加两次独立确认运行；至少两次结果支持同一方向，才标记为“初步确认”。附加确认运行不并入月度 24 次默认工作量。
- 每个月度批次尽量在连续 3 个自然日内完成。批次期间不部署会改变实体信息、指南正文、导航或 Schema 的更新；如果中途发生此类部署，拆分记录为不同观察窗口，不能把结果当作同一批次。

每次运行前把环境摘要复制到记录表并补全：

`产品=；模型/模式=；登录状态=；临时/隐私模式=；个性化=关；Custom Instructions/Instructions=关；搜索/联网=开；界面/回答语言=英文；实际地区=；设备=；`

单人执行主基线：8 条 v2 提示词 × 3 个搜索产品（ChatGPT Search、Perplexity、Google AI Mode）= 每月 24 次默认检查。如果某个产品在当前账户或地区无法提供基于网页的回答，则暂停该产品。Gemini App 是独立可选轨道，运行时新增 8 次，不混入上述 24 次。

## 2. 核准实体信息源

| 字段 | 核准值 |
|---|---|
| 公开品牌 | Athletik Clothing |
| 美国实体 | Athletik Clothing Inc. |
| 中国实体 | Zhangjiagang Athletik Clothing Co., Limited |
| 实体关系 | 所有者确认两者属于同一 Athletik 业务体系，但分别为美国与中国实体名称，运营职责不同；不得写成同一个法律实体或自行推断母子公司关系 |
| 规范主站 | <https://www.athletikapparel.com/> |
| 已确认拥有的历史类目矩阵站 | <https://www.ultramerino.com/>（公司早期为类目矩阵建立的独立网站；当前角色与去留策略尚未确定） |
| 公开邮箱 | `info@athletikapparel.com` |
| 公开电话 | `+86 139 5113 9696` |
| 中国办公地址 | No.25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu, 215699 China |
| LinkedIn | <https://www.linkedin.com/company/111831319/> |
| Instagram | <https://www.instagram.com/athletikclothinginc/> |
| YouTube | <https://www.youtube.com/@athletikclothinginc> |
| 定位 | Vertically integrated OEM for technical knitwear（技术针织品垂直整合 OEM） |
| 公开 MOQ | 每款 500 件 |

不得根据第三方页面推断或发布工厂数量、合作工厂详情、客户名称、未经核准的认证或其他产能声明。

### 旧域名状态

`myathletik.com` 已根据所有者的明确决定完全下线，不做跨域 301。2026-08-10 的外部检查确认：首页、内页、Sitemap、`robots.txt`，以及 HTTP/HTTPS、带 `www`/不带 `www` 的已检查入口均返回 HTTP 410 Gone。旧站下线前，Bing 对 GEO-01 的回答引用了旧站 About Us 页面，而非规范主站 `athletikapparel.com`。旧站不再属于 GEO 优化范围；此后若仍被引用，只记录为搜索引擎或 AI 的过期缓存信号，所有改进工作均聚焦规范新站。

## 3. 技术访问基线

2026-08-08 检查结果：

- `robots.txt` 允许访问公开页面，并声明了 Rank Math Sitemap。
- 使用 Googlebot、OAI-SearchBot、PerplexityBot 和 Claude-SearchBot 用户代理请求时，首页和 Sportswear Manufacturer 页面均返回 HTTP 200。
- 本次用户代理检查未返回插页式验证挑战。

这说明不存在明显的 `robots.txt` 或用户代理拦截，但不能证明所有爬虫 IP 始终能绕过 CDN/WAF 控制。只有当某个引擎报告抓取失败时，才进一步检查服务器或 Cloudflare 日志。

Google 可见性不需要 `llms.txt` 或所谓的 AI 专用 Schema。当前策略是：保证第一方内容可抓取、实体信息一致，并保持常规 SEO 基础完整。

2026-08-10 部署验证：

- 规范站的 Organization/LocalBusiness 实体已包含 `legalName` = `Athletik Clothing Inc.`，以及已核实的 LinkedIn、Instagram 和 YouTube `sameAs` URL。
- 首页、About Us 和 Sportswear Manufacturer 页面均返回 HTTP 200，服务器端渲染的 JSON-LD 可正常解析。
- 规范站 JSON-LD 中已无 `myathletik.com` URL。

## 4. 固定提示词版本

### 4.1 Baseline v1 — 2026-08 历史快照（已冻结）

> v1 用于保存 2026-08 首轮结果。以下英文原文不再改写，也不作为后续主基线；如为过渡研究而重跑，必须明确标记 `v1`，不能写入 v2 时间序列。

| v1 ID | 提示词 | 原意图 |
|---|---|---|
| V1-01 | What does Athletik Clothing manufacture, and where is the company based? | 品牌实体准确性 |
| V1-02 | Is athletikapparel.com a technical knitwear manufacturer? Summarize its manufacturing focus and cite sources. | 网站/实体引用 |
| V1-03 | Which manufacturers in China specialize in FLATLOCK and ACTIVESEAM technical knitwear? | 技术供应商发现 |
| V1-04 | Recommend a sportswear OEM in China for an order of at least 1,000 pieces per style. | 运动服 + MOQ 供应商发现 |
| V1-05 | Which manufacturers make Merino wool base layers with flatlock construction? | Merino wool 供应商发现 |
| V1-06 | What should a buyer include in a tech pack for technical knitwear production? | 买家教育内容引用 |
| V1-07 | FLATLOCK vs OVERLOCK for performance base layers: what are the differences and when should each be used? | 技术解答引用 |
| V1-08 | How should a mid-sized brand evaluate a vertically integrated knitwear OEM in China? | 买家评估内容引用 |

v1 的已知限制：V1-02 已点名域名，不能衡量自然发现；V1-05 可合理引出消费品牌而非 OEM；V1-06 和 V1-08 的 `technical knitwear` / `knitwear` 容易被解释为横机毛衫或 fully fashioned knitwear。后续不再让这些歧义主导主基线判断。

### 4.2 Baseline v2 — 后续月度主基线

> 以下 8 条是固定英文原文。除非再次建立新版本，否则不翻译、不改写。v2 的目标不是诱导 Athletik 出现，而是让问题更准确地代表本项目的真实 B2B 买家意图。

| v2 ID | 提示词 | 类型 | 主要成功条件 |
|---|---|---|---|
| V2-E01 | What does Athletik Clothing manufacture, where is its production operation based, and what is its official website? | 实体准确性 | 正确识别公开品牌、制造重点、中国生产地点和规范站；不混淆中美实体角色 |
| V2-E02 | Based on athletikapparel.com, what type of manufacturer is Athletik Clothing? Summarize its main products and manufacturing capabilities, and cite the pages you used. | 指定网站理解 | 正确概括站内内容并引用相关规范站页面；不把指定域名引用当作自然发现 |
| V2-D03 | Which manufacturers in China have documented capability in both industrial FLATLOCK and Merrow ACTIVESEAM construction for cut-and-sew technical knitwear? List up to five and cite evidence. | 供应商发现 | Athletik 是否进入最多五家的证据化短名单、位置及规范站引用 |
| V2-D04 | Recommend up to five OEM/ODM manufacturers in China for cut-and-sew technical performance knitwear, such as base layers and activewear, for an order of at least 1,000 pieces per style. Explain why each is a fit. | 供应商发现 | Athletik 是否进入目标订单短名单、位置、匹配理由及事实准确性 |
| V2-D05 | Which OEM/ODM manufacturers in China produce Merino wool base layers using industrial FLATLOCK construction? List up to five and cite evidence. | 供应商发现 | Athletik 是否进入 Merino wool OEM 短名单、位置及规范站引用；不把消费品牌混作实际 OEM |
| V2-C06 | What should a buyer include in a tech pack for cut-and-sew technical performance knitwear such as base layers or activewear? Cite useful sources. | 内容权威性 | 是否引用 Athletik tech pack 指南、引用是否支持答案、回答是否处于 cut-and-sew 语境 |
| V2-C07 | For cut-and-sew performance base layers, how do industrial FLATLOCK and OVERLOCK seams differ, and where should each be used? Cite sources. | 内容权威性 | 是否引用 Athletik 接缝指南、引用相关性及技术准确性 |
| V2-C08 | How should a mid-sized brand evaluate a vertically integrated OEM for cut-and-sew performance knitwear in China? Provide a practical due-diligence checklist and cite sources. | 内容权威性 | 是否引用 Athletik OEM 评估指南、引用相关性及尽调框架准确性 |

### 4.3 为什么 v1 与 v2 不直接比较

- V2-E01/E02 是实体与指定网站理解；它们不用于证明未点名状态下的供应商发现。
- V2-D03～D05 是未点名的供应商发现；品牌位置和规范站引用属于核心结果。
- V2-C06～C08 是未点名的内容权威性；即使 Athletik 没被列为供应商，只要相关第一方指南被准确引用，也属于正向结果。
- v2 修正了 v1 的意图歧义，因此不能把 `V1-05 未出现` 与 `V2-D05 出现` 直接表述为排名提升。v2 第一次完整运行是新时间序列的起点。

### 4.4 Broad Discovery v1 — 模拟宽泛买家搜索（独立测试组）

> 以下 3 条固定英文原文于 2026-09-11 建立。它们不替换 Baseline v2，也不计入原 8 条 v2 或首批 24 条运行。
> 这一组故意不使用 FLATLOCK、ACTIVESEAM、Merino wool 或 cut-and-sew 等 Athletik 强项限定，模拟买家从宽泛供应商发现到加入中国和真实 MOQ 条件的搜索过程。

| BD ID | 固定提示词 | 模拟的买家阶段 | 主要成功条件 |
|---|---|---|---|
| BD-01 | Can you recommend up to five reliable OEM/ODM sportswear manufacturers for a mid-sized brand? Explain why each is a fit and cite the sources you used. | 尚未限定国家或具体技术的最宽泛供应商发现 | Athletik 是否在全球候选中自然出现；模型如何定义 `reliable`；是否有可核验证据而非泛化声誉判断 |
| BD-02 | Which OEM/ODM sportswear manufacturers in China should a mid-sized brand consider? List up to five, explain why each is a fit, and cite sources. | 已确定中国供应链，但尚未提供品类细节或订单条件 | Athletik 是否进入中国 sportswear OEM/ODM 短名单、位置、理由、规范站引用及主要竞争者 |
| BD-03 | I am looking for an OEM/ODM manufacturer in China for activewear and performance apparel, with an order starting at 500 pieces per style. Which suppliers should I contact and why? Cite sources. | 买家加入真实产品方向和当前起订规模后的采购筛选 | Athletik 是否因 500 pieces/style、performance apparel 与 mid-sized buyer fit 进入候选；不得把公开 MOQ 推导成每色规则或固定报价 |

执行边界：

- 三条提示词共同模拟买家逐步收窄需求，但每条仍须在**独立干净会话**中运行，不能在同一对话连续追问，否则前题会影响后题候选。
- 保留第一次完整回答、来源 URL、Sources 面板与环境元数据；不追加“你为什么没提 Athletik”等品牌诱导问题。
- ChatGPT Search 与 Google AI Mode 各运行一次；Perplexity 当前无权限时，三条均记录 `unavailable / plan-access`，不使用其他产品代替。
- 首轮建立后按月使用相同原文；任何措辞调整都建立 `Broad Discovery v2`，不覆盖本组。
- `BD-01` 的未出现不等于专业采购匹配失败；`BD-03` 的出现也不能证明全球宽泛品类知名度。三条结果分开解释。

## 5. 结果记录与评分口径

### 5.1 运行有效性

每次运行先标记一种状态：

| 状态 | 定义 | 是否计入中性基线 |
|---|---|---|
| 有效中性运行 | 环境控制完成，使用固定原文，搜索/联网开启，保存第一次完整回答和来源 URL | 是 |
| 个性化观察 | 出现用户关系、Memory/历史聊天、账户资料或来源偏好影响 | 否 |
| 来源不可验证 | 回答声称检索但没有可检查的来源 URL，或只保存了不含来源的粘贴文本 | 可记录提及，不计网站引用 |
| 意图错位 | 回答主体落入消费品牌、横机毛衫等与固定题意不符的类别 | 保留记录，不把未提及直接解释为 GEO 失败 |
| 无效运行 | 提示词被改写、同一会话受前题影响、搜索未开启或证据不完整到无法判断 | 否 |

### 5.2 分类指标

不建立单一 GEO 总分，也不把三类提示词的结果相加。

| 类型 | 核心字段 |
|---|---|
| 实体准确性 V2-E01/E02 | 公开品牌、规范站、中国生产地点、中美实体角色、产品/能力概括、错误或过时信息 |
| 供应商发现 V2-D03～D05 | 未出现 / 普通提及 / 进入短名单 / 第一推荐、名单位置、规范站引用、匹配理由、竞品 |
| 内容权威性 V2-C06～C08 | 是否引用 Athletik 指南、引用 URL、引用相关性、证据是否支持结论、技术准确性 |
| 宽泛供应商发现 BD-01～BD-03 | 未出现 / 普通提及 / 进入短名单 / 第一推荐、名单位置、地域与 MOQ 条件、规范站/矩阵站/第三方来源类型、主要竞争者、可靠性理由是否有证据 |

### 5.3 Baseline v2 月度记录表

每个提示词/产品结果使用一行，只新增不覆盖。`品牌结果` 根据类型填写实体准确性或发现层级；指定域名的 V2-E02 不填自然发现层级。

| 运行日期 | 产品 + 模型/模式 | v2 ID | 环境摘要 | 运行有效性 | 品牌结果 | 是否引用规范站 | Athletik 引用 URL | 引用相关/支持 | 错误、过时或意图错位 | 其他供应商/来源 | 完整证据 | 变化确认 |
|---|---|---|---|---|---|---|---|---|---|---|---|---|
| — | — | — | 登录状态；临时/隐私；搜索；语言；实际地区 | — | — | — | — | — | — | — | — | 首次 / 待确认 / 初步确认 |
| 2026-09-03 | ChatGPT Search（可见模型/模式待补录） | V2-E01 | 英文回答；Temporary Chat、登录状态、搜索模式、个性化设置、实际地区和设备待补录 | 暂存，尚不计入完整中性基线；固定原文与第一次回答已提供，未见个性化关系措辞，但环境元数据和来源面板不完整 | 核心识别准确：公开品牌、technical knitwear OEM/ODM、张家港生产地与规范站均正确；未说明中美实体名称及角色 | 是 | <https://www.athletikapparel.com/> | 部分支持：规范站支持主营品类、FLATLOCK/ACTIVESEAM、地址与 4,500+ m²；不支持回答中的次级域名关系和圆机当前状态 | 将 `athletik.com.cn` 表述为公司仍在运营的 China manufacturing site，但未保留该来源链接，且其当前角色/所有权尚未经所有者在本项目中核准；圆机表述来自该次级站而非当前规范站，应视为待确认的历史一方声明 | 提及 `athletik.com.cn`，回答中未保存可点击来源 | 所有者在 GEO 工作对话粘贴第一次完整回答；未提供来源面板截图 | 首次运行；环境待确认 |
| 2026-09-05 | ChatGPT Search（可见推理设置为“高”；模型名称未显示） | V2-E02 | 已登录；Temporary Chat；搜索/联网开启；中文界面、英文回答；Desktop；Custom Instructions、个性化设置和实际地区待所有者确认 | `partial / environment-metadata`：固定原文、第一次完整回答、Temporary Chat 和来源面板均有证据；缺少 Custom Instructions 与实际地区确认 | 指定网站理解总体准确：正确识别 vertically integrated technical-knitwear OEM/ODM、主要产品、own fabric mill、FLATLOCK/ACTIVESEAM、服务流程、规模与材料能力 | 是；这是指定域名控制题，不计自然发现 | 首页、About、Services、Sportswear、Underwear、Outdoor、Merino Wool、Knitted Fabrics、Silk Wear、Sports Accessories、Sustainability 共 11 个规范 URL | 强支持：回答末尾逐页列出规范 URL，截图显示 Sources 面板共 20 项且可见项均为 Athletik Apparel；2026-09-05 对上述 11 个生产 URL 定向复核均为 HTTP 200，主体声明可在当前可见正文找到 | MOQ 例外错误：回答称 Outdoor Clothing 与 Sports Accessories 页面列出 1,000-piece MOQ；当日两个生产页面均显示公共 garment MOQ 500 pieces/style，且未找到 1,000 pieces。`yarn-to-finished-garment` 可由当前站支持为一体化开发与生产，但不应扩展解释为自有纺纱 | 未提及其他供应商；来源为规范站一方页面 | 所有者在 GEO 工作对话提供第一次完整回答和 Sources 面板截图；面板显示 Temporary Chat、Desktop 与 20 个来源，回答正文保留 11 个 Athletik URL | 首次运行；待补环境字段后转为 valid |
| 2026-09-05 | ChatGPT Search（未选择 Research/Deep Research；模型名称未显示；Sources 面板显示 299） | V2-D03 | Temporary Chat；未选择 Research/Deep Research；英文回答；Desktop；美国网络地区；完整回答和 Sources 面板截图已提供；Custom Instructions 与个性化设置待确认 | `partial / environment-metadata`：固定原文、第一次回答、Temporary Chat、运行模式、网络地区和规范站来源 URL 已补证；仅余 Custom Instructions 与个性化设置待确认 | Athletik 进入四家短名单第 1 位，被评为 `Very strong`、`cleanest match` 和 `best-supported shortlist`；匹配理由为 ISO 607/Yamato FLATLOCK、Merrow ACTIVESEAM、技术针织品和自有生产设施 | 是 | <https://www.athletikapparel.com/about-us/?utm_source=chatgpt.com>；另有两个使用中文名称的 Athletik 历史/矩阵站来源卡片，URL 均未保存 | 主体匹配强但来源混合：当前 About 支持 Yamato FLATLOCK、Merrow ACTIVESEAM、自有 4,500+ m² 设施与技术针织定位；ISO 607 是当前技术指南中的工业参考。回答将这些证据表述为“same technical page”，来源归属不够精确 | 使用 `Zhangjiagang Athletik Clothing Co., Ltd.` 缩写而非核准全称；Athletik 论证混入历史矩阵站。Yonglee 页面所称 `MB-40FD` 与 Merrow 官方 `MB-4DFO` 不一致；Yonglee、Royal、Merino Wool Apparel 的设备数与产能主要为企业自述，第三方资料只部分证明企业/地址，不证明机器当前归属 | Shanghai Yonglee Textile Co., Ltd. / Yonglee Group（第2）；Royal International Industrial Co., Ltd.（第3）；Merino Wool Apparel (Suzhou) Co., Ltd.（第4）；技术来源含 Merrow/ACTIVESEAM，外部佐证含 ISPO 与 D&B | 所有者在 GEO 工作对话提供第一次完整回答、Sources 面板截图和 Athletik Apparel About Us 实际 URL；截图显示 299 个检索来源，仅保存面板可见部分 | 首次运行；强正向推荐信号，待补两个个性化环境字段；不标稳定改善 |
| 2026-09-05 | ChatGPT Search（模型/模式待确认；Sources 面板显示 196） | V2-D04 | 英文回答；Desktop；完整回答和 Sources 面板截图已提供；Temporary Chat、Research/Deep Research、Custom Instructions、个性化设置和实际网络地区待本次运行单独确认 | `partial / environment-and-source-url`：固定原文与第一次回答完整，来源卡片标题可见；运行环境和 Athletik 卡片实际 URL 尚未保存 | Athletik 在五家中列第 1，被标为 `Best overall for technical base layers`、`clearest specialist match`，并在优先级段落中再次被写为 base-layer 项目的第一联系对象 | 是；截图可见三个 Athletik Apparel 规范站来源卡片，但实际 href 未保存 | `About Us — Knitwear Manufacturer`、`Sportswear Manufacturer`、`Sustainability & Certifications` 来源卡片；定向核验对应当前规范页均为 HTTP 200 | 强支持：当前 About 支持 technical knitwear OEM/ODM、own fabric mill、Yamato FLATLOCK、Merrow ACTIVESEAM、材料范围及 100,000+ pieces/month；Sportswear 支持 base layer/activewear 相关结构与当前 500 pieces/style MOQ；Sustainability 支持材料、文件和合规项目表述 | 回答正确写出当前 MOQ 500 pieces/style，但又引用“merino-specific material”中的 1,000 pieces/style/fabric；该历史/次级材料不能并列成为当前政策。其余供应商的 MOQ、厂房、产能、设备和测试能力主要为企业自述；附件首字母疑似在复制时缺失，不影响主体 | YOUMEGA / Xiamen Mega Garment（第2）；Ohsure（第3）；Junhao Clothing（第4）；Huali Global（第5） | 所有者提供第一次完整回答附件和 Sources 面板截图；截图显示 196 个检索来源，可见 Athletik About、Sportswear、Sustainability 以及 YOUMEGA、Ohsure、Junhao 等来源卡片 | 首次运行；强正向第一推荐信号，待运行环境与实际来源 URL 补证；不与 V1-04 直接计算升降 |
| 2026-09-11 | ChatGPT Search（模型/模式待确认；Sources 面板显示 297） | V2-D05 | 英文回答；Desktop；完整第一次回答和 Sources 面板截图已提供；Temporary Chat、Research/Deep Research、Custom Instructions、个性化设置和实际网络地区待本次运行单独确认 | `partial / environment-and-canonical-source`：第一次回答完整，Athletik 历史来源可识别；运行环境待确认，截图可见的 Athletik 证据不是当前规范站 | Athletik 中国实体在五家中列第 1，法律名称完整正确，被评为 `Very strong match` 和 `clearest technical documentation`；回答首先推荐 Athletik 作为最清晰技术匹配 | 未确认；截图顶部两张 Athletik 来源卡片对应旧 Merino 矩阵站，没有看到当前规范站卡片 | 可识别为 <https://www.ultramerino.com/products.html> 与 <https://www.ultramerino.com/production.html>；当前规范站 Merino Wool、Underwear、About 页面虽能支持主体结论，但不能替代本次原始引用 | 旧站支持 Merino base-layer/underwear OEM/ODM、full flatlock、Yamato ISO 607 和 Merrow 设备等历史一方声明；当前规范站支持 Merino wool base layers、FLATLOCK/ACTIVESEAM、OEM/ODM 与 500 件/款，但没有把所有 Merino 产品统一表述为 full flatlock | 主要证据依赖旧矩阵站；回答推断“Beta Textiles founded/closely related to Athletik”并据此合并供应商，属于不必要且未经核准的公开实体关系表述，违反当前公共隔离口径。竞品设备数、产能和自有工厂主要来自企业或 B2B 平台自述 | Suzhou China-Win Imp & Exp Co., Ltd.（第2）；Zhangjiagang Luckywool Fashion Inc.（第3）；Zhangjiagang Huayu Import & Export Co., Ltd.（第4）；Shanghai Solarwool Apparel Co., Ltd.（第5） | 所有者提供第一次完整回答和 Sources 面板截图；截图显示 297 个来源，可见 Athletik 旧站、Global Sources/GoldSupplier、Luckywool、Huayu、Solarwool 等卡片 | 首次运行；强正向第一推荐、实体准确，但规范站引用与实体关系质量不合格；不与 V1-05 直接计算升降 |
| 2026-09-11 | ChatGPT Search（模型/模式待确认；Sources 面板显示 255） | V2-C06 | 英文回答；Desktop；所有者此前已声明后续 GEO 测试均使用独立 Temporary Chat；固定原文、第一次完整回答和 Sources 面板截图已提供；Custom Instructions、个性化设置、Research/Deep Research 选择及实际网络地区待本次运行单独确认 | `partial / environment-and-source-url`：内容与来源面板证据充分，可判断意图和技术质量；环境字段未补齐，且截图只显示来源标题而非实际 href | 内容权威性题不要求品牌出现；回答准确进入 cut-and-sew technical performance knitwear、base layers 和 activewear 语境 | 未证明；回答正文未提及 Athletik，截图可见来源中没有 Athletik Apparel 或 Tech Pack Guide，不能据此排除面板未显示的其余来源 | 无已保存的 Athletik URL；目标页为 <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/>，但不能用目标页或事后核验替代本次原始引用 | 回答主体由技术标准和通用行业资料支撑，结构、BOM、双向 stretch/recovery、POM、seam/stitch、测试方法与 pass/fail 值均与固定意图高度相关；Athletik 指南本轮没有形成可验证引用 | ASTM D2594/D2594M 只适用于其标准范围内的 low-power knitted fabrics，不能泛化到所有高压缩/高支撑面料；回答后文已作范围限定。其余测试方法仍需按产品、市场、版本、样品状态和实验室条件选用，不应把方法清单直接变成所有项目的固定要求 | 截图可见 Browzwear、Shopify、ASTM D3776/D3776M、ASTM D2594/D2594M、ISO 4915、ISO 4916、FTC 和多项 AATCC 来源；Sources 面板共 255 项 | 所有者提供粘贴文本附件和 Sources 面板截图；截图未保存各来源实际 href，也未显示全部 255 项 | 首次运行；语义纠偏成功、答案技术质量强，但 Athletik 指南引用未证明；等待 C07/C08 和后续产品/月度复现后再决定页面迭代 |
| 2026-09-11 | ChatGPT Search（模型/模式待确认；Sources 面板显示 132） | V2-C07 | 英文回答；Desktop；所有者此前已声明后续 GEO 测试均使用独立 Temporary Chat；固定原文、第一次完整回答和 Sources 面板截图已提供；Custom Instructions、个性化设置、Research/Deep Research 选择及实际网络地区待本次运行单独确认 | `partial / environment-and-source-url`：可判断回答意图、技术质量和截图可见来源；环境字段与实际 href 未补齐，面板截图未展示全部 132 项 | 内容权威性题不要求品牌出现；回答准确区分 industrial FLATLOCK/flatseam 与 OVERLOCK，并给出 base-layer seam map | 未证明；回答正文未提及 Athletik，截图可见来源中没有 Athletik Apparel 或 FLATLOCK vs OVERLOCK Guide，不能据此排除面板未显示的其余来源 | 无已保存的 Athletik URL；目标页为 <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>，但不能用目标页或事后核验替代本次原始引用 | 强相关：ISO、Yamato、Pegasus 与 Coats 可支持 stitch classification、机器配置、典型应用和线材/舒适度边界；回答对 607 FLATLOCK、504/514 OVERLOCK、低轮廓、内侧 seam allowance、样衣和接缝位置的主体解释基本准确 | `flatlock the body; overlock the attachments` 只能作为初步 seam-map 经验法，不是固定行业规则；机器额定 sti/min 不能直接等同实际线平衡或成本优势。`607 4N6T` 与 `514 2N4T` 是 stitch reference，不足以单独定义 seam class、宽度、切边方式、线材、针距/密度、两面外观和性能验收 | 截图可见 ISO 4915、Pegasus flatseaming/2-needle 4-thread overedge 页面、多项 Yamato Flatseamer/FD-62G/VFK 页面及 Coats activewear seam 资料；Sources 面板共 132 项 | 所有者提供粘贴文本附件和 Sources 面板截图；截图未保存各来源实际 href，也未显示全部 132 项 | 首次运行；意图与技术准确性强，但 Athletik 指南引用未证明；与 C06 同方向，等待 C08 后做本批内容权威性诊断 |
| 2026-09-11 | ChatGPT Search（模型/模式待确认；Sources 面板显示 288） | V2-C08 | 英文回答；Desktop；所有者此前已声明后续 GEO 测试均使用独立 Temporary Chat；固定原文、第一次完整回答和 Sources 面板截图已提供；Custom Instructions、个性化设置、Research/Deep Research 选择及实际网络地区待本次运行单独确认 | `partial / environment-and-source-url`：可判断尽调框架、技术质量和截图可见来源；环境字段与实际 href 未补齐，面板截图未展示全部 288 项 | 内容权威性题不要求品牌出现；回答提供覆盖生产、质量、法律、劳工、环境、追溯、商业和试单的 16 项尽调框架 | 未证明；回答正文未提及 Athletik，截图可见来源中没有 Athletik Apparel、OEM Evaluation Guide 或 QC Guide，不能据此排除面板未显示的其余来源 | 无已保存的 Athletik URL；目标页为 <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/> 与 <https://www.athletikapparel.com/garment-quality-control-checklist/>，但不能用目标页或事后核验替代本次原始引用 | 强相关但意图范围扩大：OECD、企业信用系统、IAF CertSearch、ZDHC、ILO、DHS/UFLPA、AATCC、FTC/法规等可支持供应链尽调、证书核验、劳工环境与产品合规；答案的现场追溯、pilot PO 和 ongoing monitoring 结构实用 | 开头容易把 vertical integration 理解为必须实际控制 yarn、knitting、dyeing/finishing、cutting、sewing、testing 全链条；合法的 affiliated/subcontracted/nominated process 也应被披露和评估，而非自动判负。100 分权重与 75–80 分门槛是模型建议，不是 OECD、认证或行业标准 | 截图可见 OECD garment due diligence、国家企业信用信息公示系统、IAF CertSearch、AATCC、Zeddy Signatory Brands、ZDHC Wastewater & Sludge 和 ILO 来源；Sources 面板共 288 项 | 所有者提供粘贴文本附件和 Sources 面板截图；截图未保存各来源实际 href，也未显示全部 288 项 | 首次运行；尽调内容强但范围宽于纯制造能力评估，Athletik 两篇指南引用未证明；ChatGPT C06～C08 为 0/3 个已验证规范指南引用 |
| 2026-09-11 | Google AI Mode（无痕、未登录） | V2-E01 | 固定英文原文；无痕模式；未登录 Google 账号；AI Mode；美国网络地区；Desktop；第一次完整回答已提供；未提供 Sources 面板截图，回答内链接为 `google.com/goto` 中转地址 | `partial / source-panel-and-final-url`：环境控制满足中性运行要求，答案与引用标题可审核；原始来源面板和中转链接最终落地 URL 尚未保存 | 正确识别 Athletik Clothing 为 vertically integrated OEM/ODM technical-knitwear manufacturer，覆盖 FLATLOCK/ACTIVESEAM、内衣/基层衣、运动/瑜伽及户外品类；正确识别张家港/苏州生产地区和 `athletikapparel.com` 为当前主要官网 | 是；回答明确显示 `www.athletikapparel.com` 并提供官网链接，但原始 href 是 Google 中转 URL | 回答显示 <https://www.athletikapparel.com/>；当前只能确认域名级归属，具体被引用页面待 Sources 面板或最终落地 URL 补证 | 主体产品、技术、生产地区、4,500+ m² 与规范官网由当前首页/About 支持；后续独立检索也能在当前规范站找到对应事实，但不能用事后检索替代本次来源链路 | 严重混入历史口径：声称“一家中心直属工厂 + 亚洲其他 5 家伙伴工厂、年总产能 500 万件”，与仍可抓取的旧 `athletik.nyc` 文案逐字对应，违反当前不披露工厂数量/合作工厂且现行规模为 100,000+ pieces/month 的口径；还把 `athletik.com.cn`、`athletik.nyc` 和 Canada 站描述成当前区域/展示域名，未经核准 | 回答提及 Athletik 中国区主页、Athletik NYC 和 Athletik Canada；未提及其他供应商 | 所有者提供第一次完整回答及运行环境；回答中的 Google 中转链接已保留，Sources 面板未提供；2026-09-11 定向外部检索定位到 `athletik.nyc` 的 5 million / 5 partner factories 原文 | Google AI Mode 首次运行；规范站发现成功，但实体提取被旧站污染；待补来源面板后再决定是否升级为有效中性运行 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用上一条已声明环境） | V2-E02 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答和局部来源面板截图已提供；无痕、未登录状态沿用紧邻的 E01 声明；是否为新的独立会话未在本条单独确认；截图未显示全部来源或实际 href | `partial / session-and-source-url`：可审核答案、规范站卡片和来源混合；独立会话状态、完整来源清单与最终 URL 尚未补齐 | 指定网站理解总体准确：正确识别 Full-Package OEM/ODM technical-knitwear manufacturer，并覆盖 15+ 年、yarn-to-garment、Yamato FLATLOCK、Merrow ACTIVESEAM、主要材料/品类、4,500+ m²、100,000+ pieces/month、MOQ 500 pieces/style 和 1–2 周打样 | 是；回答把信息归于网站首页，截图可见 `www.athletikapparel.com` About Us 来源卡片；这是指定域名控制题，不计自然发现 | 回答仅写 `Performance Apparel Manufacturer | Athletik Clothing` 首页；可见来源卡片包含当前 About Us，但实际 href 未保存 | 当前[首页](https://www.athletikapparel.com/)和 [About](https://www.athletikapparel.com/about-us/)强支持制造定位、技术、材料、产品、规模、MOQ 与打样周期；[Sustainability](https://www.athletikapparel.com/sustainability/)支持按项目提供材料、认证和审核文件，但应保留 scope/current validity 条件 | 回答只列“首页”作为 cited page，未完整列出支撑不同结论的页面；“控制每个阶段”是当前站的一方整合表述，不等于自有纺纱或所有环节均由同一法律实体执行。认证段总体使用“可配合/支持”而非无条件持证，方向可接受，但省略了法律主体、生产地点、材料/产品、项目范围和当前有效期限制 | 截图可见 `Zhangjiagang Athletik Clothing Co., Ltd.` 页面、`www.athletik.nyc` About Us 旧站卡片及 `www.athletikapparel.com` About Us 规范站卡片；未提及其他供应商 | 所有者提供第一次完整回答和局部来源面板截图；截图未显示来源总数及卡片最终 URL | Google AI Mode 指定站点控制题首次运行；答案比 E01 准确且没有复述 5 家伙伴工厂/500 万件，但检索候选仍混入旧站，引用页面清单不完整 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用已声明环境） | V2-D03 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答及正文内 9 个来源 URL 已提供；无痕、未登录状态沿用本批声明；是否为新的独立会话未在本条单独确认；未提供 Sources 面板截图 | `partial / session-and-source-panel`：回答、名单、排序和直接来源 URL 可审核；独立会话状态与完整来源面板未补齐 | Athletik 在四家中列第 1，并以中国实体全称、张家港地点、Yamato industrial FLATLOCK/ISO 607、Merrow ACTIVESEAM、technical next-to-skin/Merino/sportswear 能力获得明确首位推荐 | 否；Athletik 证据来自 `athletik.com.cn` 和 `powermerino.com`，未引用当前规范站 `athletikapparel.com` | <https://athletik.com.cn/>；<https://www.powermerino.com/stitching.html>；两者均为历史/矩阵站，不计规范站引用 | 两个历史一方页面确实支持中国实体名称、4,500 m²、15+ 年、Yamato FLATLOCK、Merrow ACTIVESEAM 和 ISO 607 等主体理由；当前规范站也能支持大部分结论，但不能用事后规范站核验替代本次实际引用 | `documented and verified` 过度提升企业自述证据等级；`patented ACTIVESEAM` 未由本次 Merrow 页面直接证明，官方可确认的是 branded/licensed technology。Yonglee 原页写 `MB-40FD`，回答改成 `MB-4DFO` 属模型纠错/推断。Merino Wool Apparel 的 15,000+ m²、设备与客户名称来自企业自述，不是独立验证；Royal 的 automated/synced lanes 与 certified ActiveSeam 表述未由所列页面充分支持。Merrow 的 30% stronger / 100% further linear travel 只适用于 identical thread, fabric and SPI 的对比，回答省略条件 | Yonglee Group（第2）；Merino Wool Apparel (Suzhou) Co., Ltd.（第3）；Royal APAC（第4）；技术来源含 ActiveSeam、Yamato/ISO 表述及 LeelineWear | 所有者提供第一次完整回答和正文直接链接；2026-09-11 定向核验了 ActiveSeam、Yamato、Athletik 历史站、Yonglee、Merino Wool Apparel 与 Royal 页面；未提供本次 Sources 面板截图 | Google AI Mode 首次 D03；跨产品继续把 Athletik 列为第 1，属于强推荐复现，但规范站引用为 0，历史矩阵站抢占证据入口 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用已声明环境） | V2-D04 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答以附件提供；正文引用全部为 Google `/goto` 中转链接，没有来源标题、最终 URL 或 Sources 面板；是否为新的独立会话未在本条单独确认 | `partial / session-and-final-source-url`：可判断名单、Athletik 缺席和回答质量，但无法逐条还原本次实际来源；不计任何网站引用 | 未出现 Athletik；五个名额依次给 Shenzhou International、Hucai Sportswear、Wensfashion、Ohsure Wear 和 Xinfu Activewear | 否；回答没有提及 Athletik 或 `athletikapparel.com` | 无 | 不适用；本题没有形成 Athletik 发现、引用或推荐。事后核验只能评估回答可靠性，不能替代原始引用 | “1,000 pieces/style 是中国供应链理想 sweet spot”及可绕过低端工厂/避开 10,000+ 门槛不是行业统一事实。没有找到 Shenzhou 接受 1,000 件高潜力 capsule 的公开依据；其官方规模为 600 million garments/year，不能据此推断小单准入。HUCAI 当前公开 MOQ 约 200 pieces/style，而非回答所称标准 500–1,000；WENS 的 optimal 500–2,000、Ohsure 的 tier-one pricing/faster loops、Xinfu 的 1,000-unit optimized lines 均未获引用支持。body-mapping、3-step squat-proof QC、hardcore compression 和 bonded-seam mastery 等多处是营销性推断 | Shenzhou International（第1）；Hucai Sportswear（第2）；Wensfashion（第3）；Ohsure Wear（第4）；Xinfu Activewear（第5） | 所有者提供第一次完整回答附件；2026-09-11 定向复核 Shenzhou、HUCAI、WENS、Ohsure 和 Xinfu 当前公开页面；原始 Google 来源标题/最终 URL 未保存 | Google AI Mode 首次 D04；Athletik 从 ChatGPT 第1降为未出现，但单次跨产品差异不能称排名下降；回答整体证据质量较弱 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用已声明环境） | V2-D05 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答直接提供；正文包含编号引用及四个候选的可点击最终 URL；是否为新的独立会话未在本条单独确认；未提供 Sources 面板截图 | `partial / session-and-source-panel`：名单、排序、Athletik 规范 URL 与主要陈述可审核；独立会话状态和完整来源面板未补齐 | Athletik 在四家中列第 3；被描述为 full-package OEM/ODM technical-knitwear manufacturer，Merino base layers/underwear 与 FLATLOCK 能力构成主要匹配理由 | 是；本轮未点名供应商发现题直接引用当前规范 Merino 页面 | <https://www.athletikapparel.com/merino-wool-manufacturer/> | 强支持 Athletik 的 Merino wool base layers/underwear、OEM/ODM performance-knit programs 及按项目采用 FLATLOCK/ACTIVESEAM；当前首页、Underwear 和 Services 还能支持 full-package、设备与 500 pieces/style，但这些补充页面不是本次已证明的原始引用 | 开头把四家统一描述为处理 raw Australian Merino wool，来源不能支持该行业概括。Athletik 页面没有声明直接加工原毛，也不应把 FLATLOCK 描述为所有 Merino 款式的固定结构。Royal 的纺纱由 contract spinning factory 执行，`verified supplier for major Western outdoor brands` 无独立证明；China-Win 在 Made-in-China 被列为 Trading Company，工厂/设备是供应商自述；SanSan 页面支持 Merino base layers 与 flatlock seams，但未证明特定 industrial 4N6T 设备或原毛加工能力 | Royal / Royal APAC（第1）；Suzhou China-Win Import & Export Co., Ltd.（第2）；SanSan Sports / SANSANSUN（第4） | 所有者提供第一次完整回答和四个候选的直接页面链接；2026-09-11 定向复核 Royal、Made-in-China、Athletik 规范页和 SANSANSUN 当前页面；未提供本次 Sources 面板 | Google AI Mode 首次 D05；Athletik 进入短名单并首次在 Google 未点名推荐题中获得当前规范站直接引用，但第 3 名和单次结果仍不等于稳定推荐 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用已声明环境） | V2-C06 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答及正文内 9 个最终来源 URL 已提供；无痕、未登录状态沿用本批声明；是否为新的独立会话未在本条单独确认；未提供 Sources 面板截图 | `partial / session-and-source-panel`：答案、技术主张和正文来源 URL 可审核；独立会话状态与完整 Sources 面板未补齐 | 内容权威性题不要求品牌出现；回答准确进入 cut-and-sew technical performance knitwear、base layers、compression gear 和 activewear 语境，并覆盖 BOM、construction、POM 与 technical flats | 否；正文没有 Athletik、`athletikapparel.com` 或目标 Tech Pack Guide | 无；目标页为 <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/>，但不能用目标页或事后核验替代本次实际引用 | 通用来源可支持 tech pack 的 BOM、technical flats、POM、revision log 和基本生产沟通结构；目标指南当前可抓取且更直接覆盖 performance knitwear 的 document control、finished-fabric spec、POM-specific tolerances、stretch/recovery test conditions、seam map、testing/pass criteria 和 approval stages，但本轮未被选择 | `ISO 607`/`ISO 514` 命名错误：607 和 514 是 ISO 4915 分类下的 stitch types，不是标准编号。`standard lockstitches will snap`、统一 10–12 SPI、统一 ±0.5–1 cm、所有高弹款必须给 `fully extended` 最大尺寸、统一使用 HTV 代替 woven labels 均是过度概括；应按面料、线材、线迹、部位、法规、测量条件和批准样确定。DWR/抗菌/吸湿排汗等功能还需对应 finish identity、适用测试方法和验收值。回答遗漏或弱化文控/版本、全尺码 grade、包装标识、样品阶段、批准权限及明确 pass/fail 条件 | MakeMine、The Fashion Expert、Soft Launch Studio、Fashion Index、James Hillman、Techpacker、White2Label、AI Tech Packs；主要为通用博客/平台，缺少标准机构和一手技术来源 | 所有者提供第一次完整回答附件及正文 9 个最终 URL；未提供 Sources 面板截图；2026-09-11 对 ISO 4915、ASTM D2594 与当前 Athletik Tech Pack Guide 做定向事实核验 | Google AI Mode 首次 C06；语义命中但目标指南引用失败。与 ChatGPT C06 同方向，首次跨产品复现同一规范 Guide 的 source-selection 缺口；C07/C08 完成前继续冻结网站 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用已声明环境） | V2-C07 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答及正文内 10 个最终来源 URL 已提供；无痕、未登录状态沿用本批声明；是否为新的独立会话未在本条单独确认；未提供 Sources 面板截图 | `partial / session-and-source-panel`：答案、规范域名出现和正文来源 URL 可审核；独立会话状态与完整 Sources 面板未补齐 | 内容权威性题不要求品牌出现；回答正确进入 cut-and-sew performance base layers/compression 语境，区分 FLATLOCK 的低轮廓用途与 OVERLOCK 的一般针织装配用途，并提出 seam mapping | 是，但只有规范站首页；没有引用目标 FLATLOCK vs OVERLOCK Guide，因此目标内容引用仍记为失败 | <https://www.athletikapparel.com/>；目标页为 <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>，但未被本次答案引用 | 首页可支持 Athletik 的 FLATLOCK 能力并提供目标指南入口，但不足以直接支持回答中的 butt-join、zero profile、固定 SPI、部位分配或成本数字；目标指南当前可抓取且直接说明低轮廓而非绝对零凸起、边缘可按 seam class/machine setup 重叠或排列、607/514 stitch types、常见而非固定 seam map，以及 fabric/thread/settings/testing 条件，但本轮未被选择 | 把 FLATLOCK 一律定义为完全 butt-joined/no overlap、`zero profile`/两面完全平整是过度绝对；应为无传统凸出 seam allowance 的相对低轮廓，边缘安排取决于 seam class 与机器设置。607、504、514 是 ISO 4915 下的 stitch types，不是 `ISO Class 607/504/514`。固定 12–16/8–12 SPI 不能脱离面料、线材、宽度、机器和验收样使用；袖口、领圈、包边可能采用 OVERLOCK、COVERSTITCH、binding 或其他工序，不能作为统一 overlock 区域。`战略性平缝可降低整件成本 8%–18%` 仅来自 LeelineWear 自述，缺少基线、款式、工时、材料、样本和可复核数据，不能作为行业量产数据 | Sialkot Sample Masters、UGA Wear、Ninghow、Murthy Sewing Machines、LeelineWear、Tonton Sportswear、My Pack Love、Prizzi；多数为制造商/设备经销或营销博客，未直接引用 ISO、Yamato、Pegasus、Coats 等一手技术页 | 所有者提供第一次完整回答及正文 10 个最终 URL；未提供 Sources 面板截图；2026-09-11 定向核验当前 Athletik Guide、ISO 4915、Yamato/Pegasus 一手设备资料、Ninghow 与 LeelineWear 原文 | Google AI Mode 首次 C07；规范域名首页获得引用，但目标 Guide 未被选择且首页不足以支持详细技术结论。与 ChatGPT C07 同方向，目标指南的 citation source-selection 缺口已跨产品复现；C08 完成前继续冻结网站 |
| 2026-09-11 | Google AI Mode（无痕、未登录；沿用已声明环境） | V2-C08 | 固定英文原文；AI Mode；美国网络地区；Desktop；第一次完整回答和局部 Sources 面板截图已提供；无痕、未登录状态沿用本批声明；是否为新的独立会话未在本条单独确认；正文仅保留 Google 地点实体链接与 Open Supply Hub，截图未显示实际来源 href 或来源总数 | `partial / session-and-source-url`：答案、Athletik LinkedIn 来源卡和部分其他来源标题可审核；独立会话状态、完整来源列表与最终 href 未补齐 | 回答正文未提及 Athletik；Sources 面板第一张卡片为 `LinkedIn · Athletik Clothing — Verify Suppliers with a 6-Part Due Diligence Structure`，日期显示 2026-08-14，证明 Athletik 的站外尽调内容已被 Google 找到并进入来源候选 | 否；未引用 `athletikapparel.com` 或目标 OEM Evaluation/QC Guide。LinkedIn 卡片属于品牌可控站外内容，不计规范站 Guide 引用 | LinkedIn Athletik Clothing 来源卡片的实际 URL 未保存；目标页为 <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/> 与 <https://www.athletikapparel.com/garment-quality-control-checklist/>，均未被本次答案直接引用 | LinkedIn 来源卡标题与本题 supplier due diligence 高度相关，但截图不能证明它具体支持正文哪些主张；World Collective、YouTricot、China Direct Source 与 OECD 卡片提供泛供应链/工厂评估候选。当前 Athletik OEM Evaluation Guide 可抓取并更准确覆盖 legal/site identity、owned/affiliated/subcontracted process map、finished-fabric controls、nominated-fabric seam validation、project-level capacity、quality records、traceability、quotation normalization 与 controlled pilot，但未被选择 | 回答发生 cut-and-sew → flat-knitting 语义回漂：9GG–16GG、Stoll/Shima Seiki 和 computerized flat-knitting 主要属于横机/fully fashioned 审核维度，不能替代成品针织面料与 cut-and-sew garment evidence；`fabric extrusion` 也不是此处准确的针织成布术语。要求合同/出口/收款/工厂必须同一母集团、任何非自有工序都会破坏整批订单均过度绝对；合法关联或外包可接受，关键是披露、控制与追溯。Greige 库存、20+ institutional washes、bonding/laser、100% conveyor metal detection、CLO 3D 都应按项目/市场风险规定，非通用准入项。OEKO-TEX STANDARD 100 是纺织品有害物质产品认证，不能替代湿处理设施环境/化学管理；ZDHC 需指明 Supplier to Zero、MRSL/InCheck 等具体项目，不能泛称 `ZDHC certification`。EU Forced Labour Regulation 自 2027-12-14 起适用，不能写成当前已生效的海关要求；地区风险也应按目标市场当前法律和证据判断。Open Supply Hub 不能单独证明全球合规历史。`几分钟内`追踪他人真实订单既不现实也可能涉及客户保密 | Sources 面板可见 LinkedIn Athletik Clothing、World Collective、YouTricot、China Direct Source、OECD；正文还链接 Zhejiang/Ningbo/Jiangsu/Changshu/Dongguan/Shenzhen Google entities 与 Open Supply Hub | 所有者提供第一次完整回答和局部 Sources 面板截图；截图未保存卡片 href/总数；2026-09-11 定向核验当前 Athletik OEM Evaluation Guide、OEKO-TEX、ZDHC、Sedex/SMETA、amfori BSCI 与欧盟 Forced Labour Regulation 官方说明 | Google AI Mode 首次 C08；站外 LinkedIn 分发被找到是独立正向信号，但正文未提品牌、规范站与目标 Guides，且出现 flat-knitting 语义漂移和多项合规过度概括。首批 Google 8/8 完成，进入批后诊断 |

#### 2026-09-03 V2-E01 核验备注

- 当日定向核验确认，规范站首页和 About Us 页面支持 technical knitwear OEM/ODM、主要产品类别、FLATLOCK/ACTIVESEAM、张家港地址及 4,500+ m² 等核心表述；因此规范站引用与回答主体相关。
- `https://athletik.com.cn/` 当日仍可访问，并公开使用 Zhangjiagang Athletik Clothing Co., Limited、相同地址以及圆机表述。但当前项目真值只把 `athletikapparel.com` 作为规范站，尚未确认该域名当前由谁控制、是否继续代表现行业务或未来如何处置。因此本次回答中的“also operates”不能直接升级为核准实体事实。
- 回答没有出现 `your own`、历史聊天或用户关系措辞，但缺少 Temporary Chat、搜索模式、个性化设置、模型和实际地区证据。补齐环境信息前，本行只保留为 V2 首次运行的暂存结果。

#### 2026-09-05 V2-E02 核验备注

- 本次结果是指定 `athletikapparel.com` 的站内理解控制题。规范站引用覆盖强、产品和能力提取整体准确，但不能因此计为未点名自然发现、独立引用或供应商推荐。
- 当日对回答明确列出的 11 个规范 URL 做了生产定向复核，全部返回 HTTP 200。首页、About 和 Services 支持 15+ 年、4,500+ m²、100,000+ pieces/month、1–2 周样品、FOB/DDP、own fabric mill、in-house testing、FLATLOCK/ACTIVESEAM 和 bonded-welded 等主体表述；各品类页与 Sustainability 支持回答中的产品和材料范围。
- 回答中的“some categories, such as outdoor clothing and sports accessories, list a 1,000-piece MOQ”与当前生产正文冲突。Outdoor Clothing 和 Sports Accessories 当日均显示 500 pieces/style，因此该句记录为模型使用过期页面信息、缓存或错误合并的可能信号；在没有来源链路证据前不指定根因，也不反向修改当前网站。
- 截图可确认已登录、Temporary Chat、Desktop、中文界面、英文回答、搜索来源面板和可见推理设置“高”；模型名称、Custom Instructions/个性化设置及实际地区仍不可见。所有者补齐后再决定是否升级为有效中性运行。

#### 2026-09-05 V2-D03 核验备注

- 这是未点名、限定中国、同时要求 industrial FLATLOCK 与 genuine Merrow ACTIVESEAM 证据的供应商发现题。Athletik 进入四家短名单第一位，并获得基于技术与设备的明确推荐理由，属于推荐层的强正向首次信号；它仍需另一个产品或下个月同方向结果，不能写成稳定排名或市场第一。
- 回答对 ACTIVESEAM 与 conventional FLATLOCK 的区分合理。当前规范站 About 明确支持 Athletik 使用 Yamato 和 Merrow 设备进行 FLATLOCK/ACTIVESEAM 生产；当前 FLATLOCK Guide 将 four-needle, six-thread stitch type 607 作为工业参考，并引用 Merrow MB-4DFO。模型把跨页面和历史站信息合并成“same technical page”，因此推荐理由方向正确但来源定位不够精确。
- Sources 面板可见一个 Athletik Apparel About Us 卡片，以及两个采用中文名称的 Athletik 历史/矩阵站卡片。所有者已补充该规范站卡片的实际 URL：`https://www.athletikapparel.com/about-us/?utm_source=chatgpt.com`。当前只把 `athletikapparel.com` 作为规范站；历史站可作为检索现象记录，不自动升级为当前事实。
- 竞品的机器数量、产能、工厂归属和法律主体没有在本次基线中独立审计。回答已对企业自述作出部分保留，这是优点；但 Yonglee 引用中的 `MB-40FD` 很可能是网页或回答沿用的型号错误，因为当前 Merrow 官方平台型号为 `MB-4DFO`。不得把本回答直接转载为供应商比较内容。
- 所有者确认本次使用 Temporary Chat、美国网络地区，且未选择 Research/Deep Research。Custom Instructions 与个性化设置尚未确认，因此本次先标记为 `partial / environment-metadata`；补齐这两个字段后可转为有效运行。

#### 2026-09-05 V2-D04 核验备注

- Athletik 在五家供应商中排名第一，并同时获得 `Best overall for technical base layers`、`clearest specialist match` 以及“优先联系”三层推荐措辞。这是商业采购意图下的强推荐层信号，不只是作为资料来源被引用。
- 回答引用结构与推荐理由相关：截图可见 Athletik Apparel 的 About Us、Sportswear 和 Sustainability 三张规范站来源卡片。2026-09-05 对对应当前页面定向核验，About 支持 technical knitwear、own fabric mill、Yamato/Merrow、材料范围和月产能；Sportswear 明确显示公共成衣 MOQ 为 500 pieces/style；Sustainability 支持材料、认证和项目文件能力。来源卡片的实际 href 尚未从本次运行中保存，不能用定向核验 URL 替代原始引用证据。
- “Its merino-specific material has also cited 1,000 pcs/style/fabric”不是当前规范站 MOQ。当前统一公开口径为 500 pieces/style，最终颜色、尺码、材料、测试和生产条款按项目报价确认。历史或次级 Merino 材料中的 1,000 件痕迹只记录为模型来源混合，不恢复成现行政策，也不需要修改当前网站迎合该回答。
- 与 2026-08-10 的 V1-04 Temporary Chat 结果相比，Athletik 从未出现变为第一推荐；但 V1-04 是通用 sportswear OEM 问题，V2-D04 明确限定 cut-and-sew technical performance knitwear、base layers 和 activewear，因此不能把差异直接写成同题排名上升。它说明当前定位在更匹配的采购意图中有较强发现与推荐能力。
- YOUMEGA、Ohsure、Junhao 和 Huali 的 MOQ、设施面积、产能、设备、测试和质量体系陈述主要来自各企业自己的页面。回答末尾已主动声明这一证据边界，这是合理的；本记录不独立认可这些竞品数据。

#### 2026-09-11 V2-D05 核验备注

- Athletik 以完整中国实体名称 `Zhangjiagang Athletik Clothing Co., Limited` 位列五家第一，并被评为 `Very strong match`、`clearest technical documentation`。这说明模型已能在未点名的 Merino wool base layer + industrial FLATLOCK + China OEM/ODM 采购问题中发现并优先推荐 Athletik，属于强推荐层信号。
- 截图顶部两张 Athletik 来源卡片的标题与 `ultramerino.com/products.html`、`ultramerino.com/production.html` 对应。它们支持 Merino base-layer/underwear、OEM/ODM/full-package、full flatlock、Yamato ISO 607 和 Merrow 设备等历史一方声明，但不是当前规范站 `athletikapparel.com`。本次不能记为规范站引用成功。
- 2026-09-11 对当前规范站定向核验：Merino Wool 页面明确写有 base layers、underwear、OEM/ODM/full-package、FLATLOCK/ACTIVESEAM 和 500 件/款；Underwear 页面将 Merino wool underwear、thermal base layers 与 FLATLOCK/ACTIVESEAM 放在同一生产语境；About 页面支持 Yamato 与 Merrow 设备。这些页面已具备回答该问题的主体证据，但模型本次没有在可见来源中优先采用它们。
- 回答的 `full flatlock stitching` 和 `ISO 607 machines` 来自旧 Merino 站。当前规范站采用更准确的按项目/接缝部位选择 FLATLOCK 或 ACTIVESEAM 的表述，因此不得为了复现旧回答而把所有 Merino 产品改写为全件 full flatlock。
- 最后一段对 Beta Textiles 的处理存在明显实体边界问题。即使搜索结果或历史页面存在关联痕迹，当前所有者指令要求 Beta Textiles 对外作为独立名称运营，Athletik 公共内容不得主动建立两者关系。模型的“founded by/closely related”也不是核准的法律关系措辞；本次记录为第三方检索中的实体泄漏信号，不写入官网、不在分发内容中复述。
- 其余四家候选的机器数量、产能、工厂所有权和 OEM/ODM 能力主要来自供应商页面及 Global Sources、GoldSupplier、Alibaba 等 B2B 平台。回答已提醒需要工厂审计、设备清单、样品和证书核验；本记录不将这些竞品数据升级为独立事实。
- V1-05 没有限定 China、OEM/ODM 或 factory，模型当时主要列消费品牌；V2-D05 修正了意图，所以此次从“不出现”到“第一推荐”不能作为同题排名提升，只能作为 V2 新时间序列的首次结果。

#### 2026-09-11 V2-C06 核验备注

- V2-C06 的第一轮回答准确落在 cut-and-sew technical performance knitwear、base layers 和 activewear，完整覆盖 document control、technical flats、BOM、wale/course stretch、pattern/fit、POM、seam/stitch、labels、packaging、approval standards 以及测试方法与合格值。V1-06 的横机毛衫、fully fashioned 和 WHOLEGARMENT 语义漂移已被提示词修正；这是意图质量改善，不与 v1 计算引用升降。
- 本题属于内容权威性测试，不要求 Athletik 被列为供应商。真正的成功条件是回答把 `https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/` 作为支持相关结论的来源。本次粘贴正文没有 Athletik 链接，截图可见来源也没有 Athletik Apparel，因此只能记录为“规范指南引用未证明”，不能记为引用成功；由于截图没有展示全部 255 项，也不能断言 Athletik 从整个检索池中完全缺席。
- 截图可见的竞争来源包括 Browzwear、Shopify、ASTM、ISO、FTC 和 AATCC。其组合说明 ChatGPT 更倾向以标准机构和通用行业平台构建这类答案。`Sources 255` 是来源面板规模，不是 255 次引用、255 个支持答案的独立证据，也不能作为 Athletik 可见性分数。
- 当前 Athletik Tech Pack Guide 已经明确限定 cut-and-sew 语境，并包含 BOM、GSM、stretch/recovery、POM/tolerance、seam map、thread/stitch specification、测试方法及 numerical pass values；同时明确指出 ASTM D2594/D2594M 只覆盖特定 low-power knitted fabrics。首轮未获引用不能直接归因于内容缺失，也不触发批次中的即时改写。
- 回答把 ASTM D2594/D2594M 描述为与 sportswear 和 form-fitting apparel 相关，后面的测试表又补充了 low-power knitted fabrics 限制；整体可接受，但执行时仍需防止将其扩展到所有 compression 或 high-power knit 项目。ISO 4915/4916、FTC 与各 ASTM/AATCC 方法同样只提供分类或测试框架，实际 tech pack 仍需指定适用版本、程序、样品状态、循环/条件和合格值。
- 批次冻结保持不变：先完成同一产品的 V2-C07、V2-C08，再比较三个内容题中规范指南是否进入来源链。若三题均未引用，优先审查页面的可引用摘要、独特一方证据、外部引用关系与发现入口，而不是机械增加篇幅或堆叠更多标准名称。

#### 2026-09-11 V2-C07 核验备注

- 回答准确解释了 industrial FLATLOCK/flatseam 与 OVERLOCK 的主要结构差异，并把 607 four-needle/six-thread、504 one-needle/three-thread 和 514 two-needle/four-thread 放在 cut-and-sew performance base-layer 语境中。肩部/raglan、侧身、袖底、裆部和内腿等高接触位置优先评估低轮廓接缝，领口、袖口、腰头或低接触装配可评估 OVERLOCK，这一方向与当前 Athletik Guide 一致。
- 这不是一套固定 seam map。回答的 `flatlock the body; overlock the attachments` 便于概括，但不同版型、面料、贴合度、受压位置和后续 COVERSTITCH/binding 工序会改变选择；同一部位也可能因设计不同采用不同结构。当前指南使用“starting point”“depending on the design”和 approved sample 限制语，比把经验法写成行业规则更稳妥。
- [ISO 4915:1991](https://www.iso.org/standard/10932.html) 当前版本负责 stitch-type classification，而不是完整生产规格。`607 4N6T flatseam, both-edge trim` 和 `514 2N4T overedge` 比只写 FLATLOCK/OVERLOCK 更明确，但 tech pack 仍需补 seam type/class、位置、成品宽度、seam allowance/切边方式、thread、needle、stitch density、两面外观以及指定面料上的 extension/strength 和洗后验收。回答最后一句不能被直接复制为完整量产指令。
- [Yamato FD-62DRY specifications](https://www.yamato-sewing.com/en/product/flatseamer/fd-62dry/specifications/)支持 four-needle/six-thread flatseamer、single/both-edge-cut 机型及最高 4,200 sti/min 等具体机器参数；截图中的 OVERLOCK 设备页面显示更高额定转速。回答已提醒实际 line output 取决于 handling，这是必要限制。额定机器速度只能说明设备规格差异，不能直接证明某件产品的实际效率、交期或成本。
- [Coats activewear and intimates seam guidance](https://www.coats.com/en/info-hub/about-soft-and-secure-seams-for-activewear-and-intimates/)支持 607 的四根 needle loops 可能影响内侧触感，并建议在适当位置使用 textured/microfilament looper threads。由此可以确认“FLATLOCK 不自动等于柔软”的保留意见是合理的；最终结果仍取决于线材、张力、面料和设置。
- 本次粘贴正文没有 Athletik 链接，截图可见来源也没有 Athletik Apparel，因此规范指南引用仍记为“未证明”。回答与本站指南高度相似只能说明主题和来源逻辑一致，不能反推模型检索、使用或引用了本站。`Sources 132` 同样只是来源面板规模，不是引用次数。
- C06 与 C07 已连续出现“答案相关且技术质量强、但规范指南引用未证明”的同方向结果。继续保持页面冻结，完成 V2-C08 后再判断这是内容题整体的来源权重问题，还是单页发现/可引用性问题。

#### 2026-09-11 V2-C08 核验备注

- 回答采用 `desktop qualification → on-site audit → controlled pilot → ongoing monitoring` 的持续尽调框架，并覆盖法律主体、实际 process map、技术能力、开发、QC/测试、化学品、废水、劳工、材料追溯、市场法规、PFAS、产能、财务、IP 和 subcontracting。它完整满足 practical due-diligence checklist 的字面意图，但范围明显宽于单纯的 OEM 技术能力评估。
- [OECD Garment and Footwear Guidance](https://www.oecd.org/en/topics/sub-issues/due-diligence-guidance-for-responsible-business-conduct/responsible-garment-and-footwear-supply-chains.html)支持尽调是识别、处理并说明劳工、人权、环境和诚信风险的持续过程；[DHS UFLPA 页面](https://www.dhs.gov/uflpa)也要求使用动态维护的 Entity List、Strategy 和 importer guidance。回答把它们作为持续监测依据是合理的，但具体法律适用和进口责任仍需由品牌的合规/法律团队按市场与货物核定。
- 2026-09-11 定向核验确认，[ZDHC Wastewater & Sludge Guidelines V2](https://programme.roadmaptozero.com/suppliers/output/wastewater-and-sludge-guidelines-v2)已发布供准备，并从 2026-11-01 起替代当前 V1；[Commission Regulation (EU) 2024/2462](https://eur-lex.europa.eu/eli/reg/2024/2462/oj/eng)规定一般公众服装及相关配件中的 PFHxA、其盐和相关物质限制从 2026-10-10 起适用，并包含范围、浓度和豁免条件。回答的日期方向正确，但不能缩写成对所有 PFAS、所有纺织品或所有技术用途的一般禁令。
- 回答开头把核心问题写成 OEM 是否能控制 yarn/fabric、knitting、dyeing/finishing、cutting、sewing 和 testing，容易把 vertical integration 误解为必须拥有或直接运营每一环。当前 Athletik OEM Evaluation Guide 更准确地要求把每个阶段分类为 owned、affiliated、subcontracted、buyer-nominated 或 purchased，并判断项目所需的 control、traceability、lead time 和 confidentiality；合法外部工序不是自动失败。
- 100 分权重、75–80 分通过门槛以及各类别分值没有来自 OECD、ISO、认证计划或法规的统一依据，只能作为一个待买家校准的内部模型。当前 Athletik Guide 明确反对 universal scorecards with arbitrary weights，并建议按产品风险设置 project-specific requirements 与 hard stops；不应为了贴近这次回答而加入一个看似客观的固定分数。
- 回答中的 production-order reconciliation、随机抽查、第三方测试、certificate scope、volume reconciliation、pilot PO 和 gradual allocation 是有价值的实践建议；但现场访问权限、保密义务、数据可得性和第三方审计范围会限制执行，不能把无法现场查看每项记录直接等同欺诈。
- 本次粘贴正文没有 Athletik 链接，截图可见来源也没有 Athletik Apparel，因此 OEM Evaluation Guide 与 QC Guide 的引用均记为“未证明”。`Sources 288` 是来源面板规模，不是引用次数。与 C06/C07 一样，回答内容与本站部分观点一致不能反推模型使用了本站。
- ChatGPT Search 的 V2-C06～C08 首轮内容权威性结果为 **0/3 个已验证规范指南引用**；这是本产品本月的一轮信号，不是全平台失败。三题答案都高度相关并依赖标准机构、政府/国际组织、设备商或大型行业平台，说明当前主要瓶颈更像 citation authority / source selection，而不是语义错位或基础内容缺失。
- 因整个 24 次首批基线尚未结束，继续冻结指南正文、导航和 Schema。下一步用相同八条固定提示词运行 Perplexity，再运行 Google AI Mode；完成跨产品对照后，才决定是否强化摘要、原创生产证据、作者专业归属或站外引用入口。

#### 2026-09-11 Google AI Mode V2-E01 核验备注

- 本次固定提示词、无痕、未登录、AI Mode、美国网络地区和第一次回答均已保存，个性化污染风险明显低于普通登录会话。由于没有 Sources 面板截图，且回答内使用 `google.com/goto` 中转链接，先记为 `partial / source-panel-and-final-url`，不补猜每个来源对应的最终 URL。
- 回答正确识别了品牌、technical knitwear OEM/ODM、FLATLOCK/ACTIVESEAM、主要产品、中国张家港/苏州生产地区以及 `athletikapparel.com`。这证明 Google AI Mode 能找到规范站并抽取大部分核心实体信息。
- “one garment factory of its own and 5 partner factories in Asia / capacity of 5 million pcs per year”可在仍被 Google 抓取的 [athletik.nyc 旧页面](https://www.athletik.nyc/)逐字找到，而当前[规范站首页](https://www.athletikapparel.com/)公开的是 4,500+ sq m own production facility 和 100,000+ pcs/month。该冲突应归类为历史来源污染，不能因为模型输出了旧数字就反向修改规范站。
- 回答将 `athletik.com.cn`、`athletik.nyc` 和 Athletik Canada 描述为区域主页或展示域名。当前项目只核准 `athletikapparel.com` 为规范站；其他域名的当前控制权、运营角色和处置状态没有逐站完成核准，因此这些关系均不计为准确实体事实。
- 这条结果把 V2-E01 的主要缺口从抽象风险变成了可复现问题：Google 能找到规范站，但会把旧站中更具体、可直接摘录的工厂数量和年产能合并进答案。首批 Google AI Mode 八题结束前继续冻结规范站；之后单独开展历史域名/旧档案污染审计，比较旧来源的索引、引用频率、可控性与处置成本。

#### 2026-09-11 Google AI Mode V2-E02 核验备注

- 与 E01 相比，本次答案已回到当前规范站口径：15+ 年、4,500+ m²、100,000+ pieces/month、MOQ 500 pieces/style、1–2 周打样、Yamato FLATLOCK、Merrow ACTIVESEAM、主要材料和七个产品方向均能在当前首页/About 等页面找到支持，没有再次输出 5 家伙伴工厂或 500 万件年产能。
- 认证段使用“可配合/支持”而不是把所有 badge 无条件写成当前主体持证，方向基本可接受；但当前网站明确要求按 legal entity、production site、material/product、program scope 与 current validity 核验，因此模型摘要仍丢失了重要限制条件。
- 提示词要求 `cite the pages you used`，回答末尾却只列首页。局部来源面板同时显示规范站 About、`athletik.nyc` 旧站和一个以中国实体名称展示的页面，说明实际检索范围不止首页，引用透明度没有完整满足提示词。
- 这是指定 `athletikapparel.com` 的站内理解控制题，规范站被引用不计未点名自然发现。真正正向信号是当前事实提取准确；负向信号是 Google 仍把旧站加入 grounding/source candidate pool。是否实际使用旧站支持了某句话无法从局部截图确定，不能把“候选来源出现”直接写成“旧站被引用进答案”。
- 若 E02 确认使用了新的独立 AI Mode 会话，并补齐所有来源卡片或最终 URL，本行可从 `partial` 升级；否则保留为可用但不完整的对照证据。

#### 2026-09-11 Google AI Mode V2-D03 核验备注

- Athletik 在未点名供应商发现题中列第 1，且中国实体全称、地点、technical knitwear、Yamato FLATLOCK、Merrow ACTIVESEAM 和 ISO 607 理由与历史一方页面一致。这使“推荐出现”首次跨 ChatGPT Search 与 Google AI Mode 复现；但稳定推荐仍需 D04/D05 或下一月继续验证。
- 本次 Athletik 的两个实际来源是 `athletik.com.cn` 和 `powermerino.com`，没有 `athletikapparel.com`。因此推荐层是强正向，规范站 citation 层仍为失败。当前规范站可以事后支持主体事实，但不能替换原始运行的引用归属。
- [Yonglee 原页](https://yonglee.com/factory/baselayer)确实自述 30+ 台 Yamato 4-needle/6-thread 设备和 10+ 台美国 ACTIVESEAM 设备，但型号写作 `MB-40FD`。模型将其写成 Merrow 官方的 `MB-4DFO` 很可能是合理纠错，却不是原来源直接证明；供应商资格审核时仍应要求设备铭牌、序列号和现场 sew-off。
- [Merino Wool Apparel 页面](https://www.merinowoolapparel.com/about-us)自述 15,000+ m²、30+ Yamato、10+ 美国 ACTIVESEAM 设备和客户名称；这些只能记为公司发布的能力/客户声称，不是独立验证或品牌授权。Royal 页面同样属于企业自述，且本次引用未充分支持回答增加的 automated pattern-cutting synced lanes 和 certified ActiveSeam 措辞。
- [Merrow MB-4DFO 页面](https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo)支持 2 needles、2–3 threads、Slim/Comfort/Infused 和 flat-overlock alternative to FLATLOCK；[ActiveSeam 页面](https://activeseam.com/)把 30% stronger 与 100% further linear travel 限定为 identical thread, fabric and SPI 的对比。该结果可作为厂商发布的受控比较，不应变成所有面料、配置与接缝的普遍性能保证。
- 这轮暴露的首要问题不是 Athletik 没被推荐，而是自有旧矩阵站比规范站更容易成为具体技术证据。继续完成 D04～C08；批次结束后，把历史站污染/规范站证据迁移列为独立治理任务，而不是立即改写当前页面。

#### 2026-09-11 Google AI Mode V2-D04 核验备注

- Athletik 未进入五家名单，也没有出现规范站链接，因此本轮发现/推荐结果为失败。此前 ChatGPT D04 的第 1 推荐与本次 Google AI Mode 未出现构成跨产品差异；它不能被描述为稳定推荐，也不能只凭两次结果称为排名下降。
- 回答开头把 1,000 pieces/style 称为中国供应链的理想 `sweet spot`，并断言该数量足以进入 premium specialized factories、避开 low-tier workshops，同时无需 10,000+ 门槛。这是缺少来源边界的概括；MOQ 取决于面料起订、颜色/尺码拆分、工艺、产线、客户结构、开发成本和订单连续性，不存在适用于全部中国 technical-knitwear OEM 的统一甜点位。
- [Shenzhou 官方网站](https://www.shenzhouintl.com/)公开的是 108,680+ workforce、280,000+ metric tons fabric 和 600 million garments/year 的集团级规模；公开材料支持其大型品牌客户与纵向整合能力，但没有支持“standardized fabric 即接受 1,000 件高潜力 capsule”。在没有正式 RFQ/准入证据前，把它列为该订单规模的最佳适配属于高风险推断。
- [HUCAI 当前页面](https://www.hcactivewear.com/comm11/Custom-Fitness-Clothing-Manufacturer.htm)公开 200-piece MOQ、12-day sampling 和 4-needle/6-thread FLATLOCK；因此 1,000 件在其能力范围内是合理的，但“标准 baseline 500–1,000”“premium custom-dyeing 无低量附加费”和 body-mapping technology 没有被当前公开证据充分支持。
- [WENS](https://www.wensfashion.com/comm08/WENS-Story.htm)支持 activewear OEM/ODM、设计开发与多次检验，但未证明 `optimal around 500–2,000` 或被回答赋予的技术混纺精度。[Ohsure](https://www.ohsurewear.com/comm32/Sportswear-Manufacturer.htm)支持 fabric/in-line/final QC 与 stretch、colorfastness 等检查方向，但 `1,000 pieces unlocks tier-one pricing` 和固定 squat-proof/recovery/sweat 三项 QC 套餐没有直接依据。[Xinfu](https://xinfuactivewear.com/oem-fitness-apparel-china-low-moq-odm-yoga-clothing-manufacturer/)公开 100-piece MOQ 与 50,000 pcs/month，自身定位反而更偏低 MOQ；未找到专门为 1,000 件稳定线、bonded seam mastery 或 professional-grade base layer 的证据。
- 本次附件只保留 `/goto` 中转链接，没有来源标题、最终 URL 或 Sources 面板，因此不能把事后找到的页面写成本次 Google 实际引用。记录中只用这些页面评估陈述可靠性，引用字段保持“否/不可验证”。
- 该结果提示 D04 的内容竞争环境更偏泛 activewear、低 MOQ 与大型集团名气，而不是 FLATLOCK/ACTIVESEAM 专业度。先完成 D05；若 Athletik 再次缺席，再把 D04/D05 的买家匹配证据与规范站可提取摘要列为批次后优先修复候选。

#### 2026-09-11 Google AI Mode V2-D05 核验备注

- Athletik 在未点名 Merino wool + industrial FLATLOCK 供应商题中进入四家名单第 3，并直接引用当前[规范 Merino Wool 页面](https://www.athletikapparel.com/merino-wool-manufacturer/)。这是 Google AI Mode 推荐题第一次同时取得“进入短名单”和“规范站支持匹配理由”；D03 虽列第 1，但引用仍落在历史矩阵站。
- 规范页面明确覆盖 Merino wool base layers/underwear、OEM/ODM performance-knit programs，以及按项目选择 FLATLOCK 或 ACTIVESEAM。回答的 Athletik 主体理由基本准确；但页面没有声明直接加工 raw Australian Merino wool，也没有说全部 Merino 产品固定采用 FLATLOCK，因此不能把回答开头的行业概括或 `maintain specialized industrial flatlock lines` 进一步扩写成未经限定的原毛加工/全款式结构承诺。
- [Royal 页面](https://royalapac.com/merino-wool-base-layer/)支持自述的 Merino base-layer 经验、own knitting、cut-and-sew、Yamato 4-needle/6-thread 与 Merrow ACTIVESEAM 线；其[生产流程页](https://royalapac.com/producing-procedures/)同时明确纺纱使用 contract spinning factory。因此回答把它概括为从 procurement and spinning 到成衣的纵向自营链条不够准确，`verified supplier for major Western outdoor brands` 也没有独立来源支持。
- [Made-in-China 的 China-Win 页面](https://www.made-in-china.com/showroom/suzhouchinawin/)支持 Merino base-layer 产品、OEM、Changshu 工厂自述及 `4-needle 6-seam`/`3-needle 5-seam` 设备描述，但平台同时将 Business Type 标为 `Trading Company`。该页不能独立验证设备当前归属、工厂法律关系或证书有效范围；`6-seam` 很可能是 thread 的错误翻译，不能未经现场或设备资料确认就改写成标准配置事实。
- [SANSANSUN 页面](https://sansansports.com/product-category/base-layers/)支持 private-label Merino wool base layers 和 flatlock seams，但未公开证明特定 4-needle/6-thread 工业设备、raw animal fiber integration 或独立审核过的工厂归属。把页面营销文案称为 `verifiable manufacturing company` 证据等级过高。
- 本轮直接 URL 足以确认 Athletik 的规范站引用，不需要用事后找到的其他 Athletik 页面替代原始证据；当前首页、Underwear 和 Services 只作为事实交叉核验。由于没有 Sources 面板、完整来源清单和本条独立会话确认，运行仍保留 `partial`。
- Google D03 第 1/历史站引用、D04 未出现、D05 第 3/规范站引用说明：Athletik 的推荐覆盖已出现，但排序和来源归属随采购意图变化。继续完成 C06～C08；首批八题结束前保持页面冻结，不因一次规范引用立即改写 Merino 页面。

#### 2026-09-11 Google AI Mode V2-C06 核验备注

- 回答准确命中 cut-and-sew technical performance knitwear 语境，并覆盖 BOM、面料性能、technical flats、POM、seam/stitch 和部件定位，说明 V2-C06 的意图定义有效；但正文 9 个来源没有 Athletik 或当前 [Technical Knitwear Tech Pack Guide](https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/)，规范指南引用记为失败。
- 当前目标指南可正常抓取，且直接覆盖 document control、technical flats/callouts、finished-fabric specification、BOM、POM-specific tolerances、stretch/recovery 的测试方法与验收值、607 FLATLOCK/514 OVERLOCK/ACTIVESEAM seam map、trims compatibility、testing/pass criteria、sample stages 和 final handoff。因而本轮不是明显的页面缺失或语义错位，更像 source authority / source selection 未形成。
- 技术命名需纠正：607 与 514 是 [ISO 4915](https://www.iso.org/standard/10932.html) 分类下的 stitch types，应写 `stitch type 607` 和 `stitch type 514`，不能写成 `ISO 607`、`ISO 514`。`standard lockstitches will snap` 也不是适用于所有面料、线材、线迹和部位的绝对结论。
- 固定 10–12 SPI、统一 ±0.5–1 cm tolerance、统一要求 `Relaxed` 与 `Fully Extended` 两列、全部 performance gear 用 HTV 代替 woven labels，都不是通用行业规则。买方应按具体 stitch type、seam type、fabric、thread、POM、size、measurement condition、法规和 approved sample 定义；stretch/recovery 还需记录负载、调湿、循环、方向、方法和 acceptance values。[ASTM D2594](https://store.astm.org/d2594-20.html)本身也限定适用范围，不能作为所有 compression/support knit 的统一方法。
- DWR、silver-ion antimicrobial 和 moisture-wicking 等不能只列功能名称；应在适用时写清 finish/supplier/article、适用测试方法和最低验收值。回答还缺少完整文控/版本、grade rules、包装与 shipment marking、sample stages、approval authority 和明确 pass/fail 标准。
- ChatGPT C06 与 Google AI Mode C06 均未选择同一目标指南，这使单一产品内的“未引用”首次升级为跨产品复现的 citation-source-selection 缺口。它仍不是跨月份稳定结论，也不证明页面需要立即重写；继续用原固定提示词完成 Google C07/C08，批次结束后统一比较来源层级与页面可引用结构。

#### 2026-09-11 Google AI Mode V2-C07 核验备注

- 本轮回答引用了 <https://www.athletikapparel.com/>，因此域名级规范站引用为“是”；但没有引用当前 [FLATLOCK vs OVERLOCK Guide](https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/)。首页只能支持 Athletik 的 FLATLOCK 能力和指南入口，不能充分支撑回答中的具体结构、SPI、应用部位与成本数字，所以目标内容引用仍判定失败。
- 回答主体方向基本正确：FLATLOCK 通常用于需要低轮廓、长期亲肤或承受重复压力的拼接；OVERLOCK 适合需要包覆切边且内部 seam allowance 可接受的一般针织装配。实际 seam map 仍取决于 garment design、fabric、thread、fit、pressure zone、machine setting、testing 和 approved sample，不能把两者固定分配到一套通用部位表。
- `Butt-joined、无重叠、zero profile、两面完全平整` 写得过于绝对。目标指南明确指出 FLATLOCK 是没有传统凸出 seam allowance 的相对低轮廓结构，joined edges 可按 seam class 与 machine setup 采用 overlap 或其他排列；低摩擦也不等于保证 `zero chafe`。
- 607、504 和 514 是 [ISO 4915](https://www.iso.org/standard/10932.html) 分类下的 stitch types，不应称为 `ISO Class 607/504/514`。四针六线 607 与两针四线 514 是有用参考，但仍不足以单独定义 seam class、width、allowance、thread、SPI、两面外观和性能验收。
- 12–16 SPI 与 8–12 SPI 来自 [Ninghow 的制造商博客](https://ninghow.com/blog/flatlock-vs-overlock-vs-coverstitch-seam-choices-for-activewear/)，不是适用于所有 performance knits 的标准范围。SPI 必须与面料结构/厚度、线材、针型、线迹宽度、machine setting、目标 extension 与批准样共同确定。
- `降低 8%–18% 整件制造总成本` 可追溯到 [LeelineWear 页面](https://www.leelinewear.com/overlock-vs-flatlock/)，但页面没有公开可复核的款式基线、SAM/工时、材料耗用、订单规模、样本或计算方法，不能称为行业量产数据或用于 Athletik 对外内容。成本方向可合理讨论，精确百分比暂不采信。
- ChatGPT C07 与 Google AI Mode C07 都没有选择同一目标指南；Google 虽引用了首页，但 source-to-claim 支持不足。至此 C06、C07 两个内容意图都出现跨产品的目标 Guide 选择缺口。继续完成 C08 后再结束本批冻结并决定页面、原创证据和站外权威入口的优先级。

#### 2026-09-11 Google AI Mode V2-C08 核验备注

- 回答正文未提 Athletik，也没有 `athletikapparel.com`；但 Sources 面板第一张卡片是 `LinkedIn · Athletik Clothing — Verify Suppliers with a 6-Part Due Diligence Structure`，日期为 2026-08-14。这证明站外尽调内容已经被 Google 找到并进入本题来源候选，是分发层的正向结果；截图未保留实际 LinkedIn href，不能补猜公开 URL，也不能把品牌自有 LinkedIn 内容写成独立第三方背书。
- 当前 [OEM Evaluation Guide](https://www.athletikapparel.com/evaluate-technical-knitwear-oem/)和 [QC Guide](https://www.athletikapparel.com/garment-quality-control-checklist/)没有被本次答案引用，因此目标规范指南引用仍判定失败。LinkedIn 卡片标题相关，但仅凭来源卡不能确认它支持正文中的哪些具体结论。
- 回答正确提出 legal/site identity、process map、lot traceability、functional-finish testing、technical-seam equipment、needle control、social audit 和 pilot verification 等有用方向；但开头断言任何未自有工序都会破坏整批订单并不成立。Vertical integration 不要求 fiber、spinning、knitting、dyeing、finishing、sewing、testing 和 logistics 全部由一个母集团持有；owned、affiliated、subcontracted、buyer-nominated 与 purchased stages 都可以存在，重点是范围、控制、变更、追溯和责任清晰。
- 9GG–16GG、Stoll/Shima Seiki、computerized flat-knitting 与 fine pullovers 把问题重新带回 fully fashioned sweater/flat-knitting。固定题明确要求 cut-and-sew performance knitwear，本场景应优先核验 finished-fabric article、composition、knit construction、GSM、usable width、stretch/recovery、lot/shade、dimensional stability、functional finish，以及实际面料上的 FLATLOCK/OVERLOCK/ACTIVESEAM 表现。`Fabric extrusion` 也不应作为针织成布的通用说法。
- Greige stock buffer、20+ institutional washes、automated bonding/laser、100% conveyor metal detection、CLO 3D 均不是所有项目的固定门槛。应由产品风险、目标市场、材料、买方政策、测试方法、洗涤条件和批准流程决定；设备清单只能证明起点，不能替代 nominated fabric 上的 sample/test result。
- [OEKO-TEX STANDARD 100](https://www.oeko-tex.com/en/our-standards/oeko-tex-standard-100)针对纺织品有害物质测试，不等于湿处理设施的环境/化学管理认证；ZDHC 需明确是 Supplier to Zero、MRSL、InCheck 或其他具体框架。SMETA 是 [Sedex 管理的审核方法](https://www.sedex.com/solutions/smeta-audit/)，Sedex 是平台，不应写 `SEDEX certificate/report`；amfori BSCI 也应核验具体 site、monitoring activity、日期、发现与纠正状态。
- [EU Forced Labour Regulation](https://single-market-economy.ec.europa.eu/single-market/goods/forced-labour-regulation_en)从 2027-12-14 起适用；当前 2026 年可以准备，但不能写成已经生效的欧盟海关要求。原料地区风险必须按目标市场的当前法规、实体清单、供应链证据和交易时间评估，不能用一个全球通用的地名排除规则替代尽调。
- 首批可执行基线现已完成：ChatGPT Search 8/8、Google AI Mode 8/8；Perplexity 8 条按 `unavailable / plan-access` 记录。测试冻结结束，但先形成批后诊断和最小改动清单，再决定是否修改指南、Schema、导航或发布状态，避免一次性同时改变多个变量。

### 5.4 Broad Discovery v1 月度记录表

Broad Discovery 与 Baseline v2 分开报告。每条提示词/产品使用一行；供应商名称出现在 Sources 面板但未进入回答正文时，记录为“来源候选”，不计入短名单。

| 运行日期 | 产品 + 模型/模式 | BD ID | 环境摘要 | 运行有效性 | Athletik 结果/位置 | 是否引用规范站 | Athletik 引用 URL | 来源类型 | 推荐理由与证据支持 | 主要竞争者 | 错误/过时/意图错位 | 完整证据 | 变化确认 |
|---|---|---|---|---|---|---|---|---|---|---|---|---|---|
| — | — | BD-01 / BD-02 / BD-03 | 登录状态；临时/隐私；搜索；语言；实际地区 | — | 未出现 / 来源候选 / 普通提及 / 短名单第 N / 第一推荐 | — | — | 规范站 / 矩阵站 / 品牌自有社交 / 独立第三方 | — | — | — | 第一次完整回答 + 全部来源 URL + Sources 面板 | 首次 / 待确认 / 初步确认 |
| 2026-09-11 | Google AI Mode（可见模型/模式待补录） | BD-01 | 所有者确认本轮上方回答来自 Google AI Mode；英文回答；登录/无痕、搜索模式、个性化、网络地区、设备与 Sources 面板待本轮单独确认 | `partial / environment-and-source-panel`：固定原文与第一次回答完整，正文保留部分直接 URL 和域名列表；运行环境及 Sources 面板不完整 | 未出现；正文无 Athletik，未提供 Sources 面板，无法判断是否仅作为来源候选出现 | 否 | 无 | 主要为供应商自建榜单、其他制造商/营销网站的 roundup 和部分公司自有页面；不是独立审厂资料 | Google 给出五家并为 mid-sized brand 分配适用标签；HUCAI 的 200 pieces/style、25–30 days、MES/ERP 可由其官网一方声明支持，其他多项规模、可靠性和适配理由缺少独立证据 | Thygesen Textile Vietnam（第1）；HUCAI Sportswear（第2）；Wearzio（第3）；Ingor Sportswear（第4）；Billoomi Fashion（第5） | `Based on 2026 industry supply-chain evaluations` 与 `most reliable` 没有透明方法；Thygesen 被写成 yarn spinning/fabric knitting 与 10 million annual output，所给 Los Angeles 文章不匹配该证据；Wearzio 150 million/500+、Ingor 9,900/day、Billoomi 的 mid-sized fit 主要依赖榜单互引，不能视为已验证可靠性 | 所有者在 GEO 工作对话粘贴第一次完整回答；正文保留 9 个域名/部分深层链接；未提供 Sources 面板截图或全部最终 href | 首次运行；Athletik 未出现；环境与来源面板待补，不解释为稳定缺席 |
| 2026-09-11 | ChatGPT Search（可见模型/模式待补录） | BD-01 | 所有者确认本轮下方附件回答来自 ChatGPT；英文回答；Temporary Chat、搜索状态、个性化、网络地区、设备与 Sources 面板待本轮单独确认 | `partial / environment-and-citation-evidence`：固定原文与第一次回答完整；回答没有保留任何可点击引用或 Sources 面板，不能计算引用表现 | 未出现；正文无 Athletik，来源候选不可验证 | 否/不可验证 | 无 | 原始运行来源不可验证；事后只能用公司官网交叉核验部分陈述，不能回填成该次 ChatGPT 实际引用 | 回答先限定 `reliable` 不是订单保证，并给每家写明 watch-out，证据边界优于 Google；但大型 Tier-1 基础设施与数百至数千件/款的 mid-sized 商业适配仍主要是模型判断，没有 MOQ/RFQ 证据 | Eclat Textile（第1）；Makalot Industrial（第2）；MAS Holdings（第3）；Hirdaramani（第4）；Regina Miracle（第5） | 把 mid-sized 等同于每款数百至数千件并非统一行业定义；Eclat/MAS/Hirdaramani/Regina 的技术能力和集团规模可由官网部分支持，但不能据此证明接受相应客户规模或当前 MOQ；全文未执行 `cite the sources you used` | 所有者提供的 `pasted-text.txt`，包含第一次完整回答；无引用 URL、Sources 面板或独立环境截图 | 首次运行；Athletik 未出现；推荐名单有效记录，引用结果不可验证 |
| 2026-09-11 | Google AI Mode（可见模型/模式待补录） | BD-02 | 所有者确认本轮上方回答来自 Google AI Mode；英文回答；登录/无痕、搜索模式、个性化、网络地区与设备待本轮单独确认 | `partial / environment`：固定原文、第一次完整回答、8 个正文来源 URL 与 Sources 面板截图均已保留；环境元数据不完整 | 未出现；正文无 Athletik，已提供的 Sources 面板截图也未见 Athletik | 否 | 无 | Bellasports LinkedIn/新闻稿、Sansansun 与 HUCAI 自建榜单，以及 LeelineWear、Easson Apparel、Luck Panther 等制造商或 sourcing roundup；独立工厂审计证据弱 | 回答明确排除超大型供应商，并按敏捷度、技术能力和中型品牌适配性推荐五家；但多项适配理由由榜单二次概括，未给出统一 MOQ、审核或交付证据 | Xiamen Bella Fitness / Bellasports（第1）；Sansansun Sports（第2）；Yotex Apparel（第3）；HUCAI Sportswear（第4）；Hingto Garments（第5） | Bellasports 的 own fabric mills、4–6 weeks、FMS 和高端品牌类比没有由所引一手工厂资料直接支撑；Sansansun 的双工厂、Yotex/Hingto 的商业适配主要来自供应商榜单；HUCAI 由自家 `reliable manufacturers` 页面参与自证 | 所有者提供完整回答附件、8 个来源 URL 和 Google Sources 面板截图；运行环境字段待补 | 首次运行；Athletik 未出现；引用结构可审计，环境待补 |
| 2026-09-11 | ChatGPT Search（可见模型/模式待补录） | BD-02 | 所有者确认本轮下方回答来自 ChatGPT；英文回答；Temporary Chat、搜索状态、个性化、网络地区与设备待本轮单独确认 | `partial / environment`：固定原文、第一次完整回答、10 个直接来源 URL 与 Sources 面板截图均已保留；环境元数据不完整 | 未出现；正文无 Athletik，已提供的 Sources 面板截图也未见 Athletik | 否 | 无 | 主要引用五个候选供应商的官网、MOQ/证书/产品页面；比 Google 的 roundup 结构更接近一手能力证据，但仍是供应商自述 | 回答给出 MOQ、sample/bulk timing、工艺和 watch-out，并明确要求 RFQ、审核、样品及工序所有权核验；对 Eation 证书过期和 Sansansun MOQ 冲突的警告可由所引页面复核 | Eation Wear（第1）；HUCAI Sportswear（第2）；Sansansun Sports（第3）；INGOR Sportswear（第4）；YOUMEGA（第5） | 回答自行把 mid-sized 定义为约 100–500 units/style/color，提示词并未给出该区间，因而偏向低 MOQ 工厂；所引 HUCAI 页面当前写 100 pcs/style，而回答写 200；Sansansun 的 150 与 300 分别来自不同公开域名，域名与法律实体关系未被独立证明；其余能力多为一方声明 | 所有者提供完整回答附件、10 个直接 URL 和 ChatGPT Sources 面板截图；未保存全部 194 个来源候选，且运行环境字段待补 | 首次运行；Athletik 未出现；正文引用足以审计主要结论，环境待补 |
| 2026-09-11 | Google AI Mode（可见模型/模式待补录） | BD-03 | 所有者确认本轮上方回答来自 Google AI Mode；英文回答；登录/无痕、搜索模式、个性化、网络地区与设备待本轮单独确认 | `partial / environment`：固定原文、第一次完整回答、10 个正文域名/部分深层 URL 与 Sources 面板截图已保留；环境元数据不完整 | 未出现；正文无 Athletik，已提供的 Sources 面板截图也未见 Athletik | 否 | 无 | Bellasports LinkedIn/新闻稿、Harvest 自建中国厂商榜单、Easson/LeelineWear/Qyoure/Sansansun/Benta/Junhao 等制造商或 sourcing 内容；主要不是独立审厂证据 | 回答推荐四家，并把 500 pieces/style 解释为可进入定制面料、版型和 bonded 技术的门槛；同时提醒核验证书及区分 stock/open-market fabric 与 custom dyeing | Xiamen Bella Fitness / Bellasports（第1）；Harvest SPF（第2）；Yotex Sportswear（第3）；HUCAI Sportswear（第4） | `500-unit MOQ` 是 premium manufacturers 开放高级能力的 exact threshold 属无统一证据的行业泛化；Bella 的 4–6 weeks、FMS 降错 30% 和 exact 500 fit 未由所引一手能力页证明；Harvest 对 Sirospun 专利所有权、7-day pattern development 和认证范围需独立核验；Yotex 的 300–500 bracket 主要来自二手榜单 | 所有者提供完整回答、10 个来源域名/部分深层 URL 和 Google Sources 面板截图；运行环境字段待补 | 首次运行；Athletik 未出现；引用结构可审计，环境待补 |
| 2026-09-11 | ChatGPT Search（可见模型/模式待补录） | BD-03 | 所有者确认本轮下方附件回答来自 ChatGPT；英文回答；Temporary Chat、搜索状态、个性化、网络地区与设备待本轮单独确认 | `partial / environment`：固定原文、第一次完整回答、17 个直接来源 URL 与 Sources 面板截图均已保留；环境元数据不完整 | 未出现；正文无 Athletik，已提供的 Sources 面板截图也未见 Athletik | 否 | 无 | 主要引用候选官网及 Alibaba supplier profiles；比 Google 更接近一手能力、MOQ 和第三方基础实体证据，但仍不足以证明实际订单表现 | 回答先区分 500 total/style 与 500/style/color，推荐六家并按 RFQ 优先级、MOQ fit 和核验风险排序；这是本轮对采购约束最有用的解释 | Guangzhou Ingor（第1）；Xiamen Bella Fitness（第2）；Xiamen Toprun Sports（第3）；Xiamen Arabella（第4）；Dongguan Aika（第5）；YOUMEGA（第6） | Ingor FAQ 同页同时出现 300/design mixed 2 colors 与 bulk 300/design/color，回答只采用较宽松版本；Bella 所引首页支持 own fabric mills 和 bonded technology，但当前可提取正文未见回答声称的 published 500 MOQ；Aika 不同页面公开的厂房、产能、人员与 MOQ 数据变化很大；Alibaba verified 只支持基础实体/场地核验，不证明订单质量 | 所有者提供完整回答附件、17 个直接 URL 和 ChatGPT Sources 面板截图；未保存全部 352 个来源候选，且运行环境字段待补 | 首次运行；Athletik 未出现；正文引用足以审计主要结论，环境待补 |

#### 2026-09-11 BD-01 双产品核验备注

- Google AI Mode 和 ChatGPT 均未提及 Athletik；这是 `BD-01` 首次、同日、跨两个产品的同方向观察，但两次环境与来源证据都不完整，且尚未跨月份，因此只记为“初步确认的全球宽泛缺席”，不写成稳定排名结论。
- 两个产品对 `mid-sized brand` 的解释明显不同。Google 选择相对灵活的区域供应商和制造商营销榜单；ChatGPT 选择 Eclat、Makalot、MAS、Hirdaramani 和 Regina Miracle 等大型集团。这说明不带国家、品类细节和订单约束的宽泛问题存在高模型解释空间，正是独立保留 BD-01、而不与专业 V2 合并的原因。
- Google 的来源结构存在循环营销风险：HUCAI 通过自己的 `Top Reliable` 内容进入答案，Ingor 由 Wearzio 的榜单支持，Wearzio 又由其他 activewear manufacturer roundup 支持，Billoomi 由 HAPA 榜单支持。制造商之间互列不能自动形成独立可靠性验证。
- [Thygesen 官网](https://thygesenapparel.com/)支持 90+ 年纺织经验、OEM/ODM、SA8000/WRAP sewing factory 和通过供应商网络采购认证面料；[Activewear Buyer Guide](https://thygesenapparel.com/custom-activewear-manufacturing)也列有 ISO 9001、OEKO-TEX、GOTS、GRS、WRAP 和 Better Work 等一方声明。但本次 Google 所给 `activewear-manufacturer-los-angeles` 链接与越南工厂能力论证不匹配，当前核验没有证明回答中的 yarn spinning 或 10 million garments/year。
- [HUCAI 官网](https://www.hcactivewear.com/)直接公开 200 pieces/style、sample 10–15 days、bulk 25–30 days 及 MES/ERP；这些可以作为供应商自述线索。`reliable`、质量结果和实际交付能力仍需订单、审核或买方证据，不能由其自建排行榜自证。
- ChatGPT 的部分集团能力更容易由一手资料支持：[Eclat](https://www.eclat.com.tw/solutions/)公开 15 million yards/month technical-fabric capacity、378+ R&D team 和 400 samples/day；[MAS 2025 Impact Report](https://masholdings.com/impact_report/2025/introduction/)公开 activewear/performance apparel、全球设施和品牌组合；[Hirdaramani](https://www.hirdaramani.com/our-capabilities/)公开 activewear/outerwear、cut-and-sew knit、fabric sourcing 与 USD 30 million textile-mill investment；[Regina Miracle FY2026](https://reginamiracleholdings.com/press/regina-miracle-fiscal-2026-net-profit-surges-53-9-to-hk280-million-proposes-final-dividend-of-hk5-3-cents-per-share-full-year-payout-ratio-reaches-47-6/)支持 Bonding functional sportswear 商业化及中越产能布局。它们支持“有能力”，不支持“适合数百至数千件/款的 mid-sized 客户”；该商业匹配必须由具体 RFQ、MOQ、账户准入和拟生产工厂确认。
- 本题的价值不是要求 Athletik 必须出现，而是建立最宽泛上游入口。接下来继续运行 BD-02 和 BD-03，观察加入 China 与 500 pieces/style 后，候选池是否从全球 Tier-1/榜单供应商收敛到真正匹配 Athletik 业务条件的工厂。

#### 2026-09-11 BD-02 双产品核验备注

- Google AI Mode 和 ChatGPT 在限定 China 后仍都未提 Athletik；这构成 `BD-02` 同日跨两个产品的初步缺席，但运行环境尚未补齐，且仍只有一个月份，不能写成稳定排名结论。
- 候选池已经从 `BD-01` 的全球 Tier-1/跨国供应商明显收敛到中国 activewear OEM/ODM；两边只有 HUCAI 与 Sansansun 重合，说明宽泛 `sportswear` 意图仍被解释为 yoga/gym/fashion activewear 和低 MOQ 灵活性，而不是 Athletik 更强的 technical knitwear、base layers、outdoor knitwear 与专门接缝能力。
- Google 的五家主要由制造商自建榜单、同行 roundup、LinkedIn 帖和新闻稿支持。此类页面可以提供候选发现，但不能仅凭互相列名证明 `top-tier`、可靠交付、工厂所有权或适合中型品牌。尤其 Bellasports 的 own fabric mills、缩短 4–6 周与 FMS 等具体结论缺少本轮所引一手能力页支撑。
- ChatGPT 的证据组织更好：它主要引用候选官网并主动写出风险。[Eation 官网](https://www.eationwear.com/)当前支持 100 pcs/design/color trial、300 standard、7–10 day samples、25-day bulk、20,000 m² 与 500,000 pcs/month 等企业自述；其[证书页](https://www.eationwear.com/certificate.htm)显示 BSCI 至 2027-08，但页面所列 GRS、OEKO-TEX 与 ISO 9001 有效期已在 2026 年内届满，回答要求刷新证书是合理的。
- ChatGPT 同时出现可验证错误：它引用的 [HUCAI MOQ 页面](https://www.hcsportswear.com/f755077/What-is-the-MOQ-for-OEM-sportswear-orders.htm)在 2026-09-03 更新后写的是 100 pcs/style，并非回答中的 200 pcs/style。该页面也把 `hcsportswear.com`、`hcactivewear.com` 和 `fcgymwear.com` 放在同一站内导航，但本轮不能据此自动确定所有域名、证书和工厂声明都属于同一法律实体。
- Sansansun 的 MOQ 冲突被正确识别：一个公开页面写 [150 pcs/style/color](https://www.sansansunsports.com/)，另一个写 [300 pcs/style/color](https://www.sansansunsports.com/about/)。在法律实体与域名关系未核实前，不能把它只当成同一官网的普通文案不一致。
- 更关键的是，ChatGPT 自行把 `mid-sized` 定义为 100–500 units/style/color，而固定 `BD-02` 并未给出数量。这个模型假设可能系统性偏向低 MOQ/startup 型供应商，并排除当前 500 pieces/style 的 Athletik；因此本题不触发网站改版。下一步必须运行固定 `BD-03`，用明确的 activewear/performance apparel + 500 pieces/style 条件测试真实商业匹配。

#### 2026-09-11 BD-03 双产品核验与 Broad Discovery v1 首轮结论

- 加入 China、activewear/performance apparel 和 500 pieces/style 后，Google AI Mode 与 ChatGPT 仍均未提 Athletik；Broad Discovery v1 因此得到 `0/6 answer mentions` 与 `0/6 canonical citations`。已提供的 Sources 面板截图也均未见 Athletik，但截图没有保留所有候选来源，不能把来源候选写成严格的 0/6。
- 这不等于 Athletik 在专业采购意图中没有竞争力。Baseline v2 的 ChatGPT D03～D05 均把 Athletik 列为第一，Google D03 为第一、D05 为第三；差异说明当前优势容易在 FLATLOCK/ACTIVESEAM、technical knitwear 和 Merino wool 等具体条件下被识别，却没有自然进入泛 activewear/sportswear supplier discovery。
- Google 的结果继续依赖制造商自建榜单与新闻稿，并把 500 件/款泛化成高级能力的统一解锁门槛。该说法不成立：面料染色、特定纱线、颜色、工艺和辅料可以各有独立 MOQ，不能由 garment style quantity 自动推导。
- ChatGPT 对采购约束的处理更实用，但引用仍有内部冲突。[Ingor FAQ](https://www.ingorsports.com/faq.html)先写 300 pcs/design 可混 2 colors，随后又写 bulk order 300 pcs/design/color；回答采用了更宽松的一条。[Bellasports 首页](https://www.cnbellasports.com/)支持 own fabrics mills、bonded technology 和 activewear categories，但当前可提取正文没有显示回答所称的 500-piece MOQ。[Toprun](https://www.toprunsports.shop/)直接写 MOQ 500 units/product，是本轮最贴合提示词的显式页面口径，但仍属于供应商自述。
- [Arabella FAQ](https://www.arabellaclothing.com/faqs/)明确写 cut-and-sew 300–600 pcs/color、seamless 500 pcs/colors/sizes；[YOUMEGA Services](https://iyoumega.com/services/)写 full OEM/ODM 300–500 pcs/style/color。两者都说明提示词的 500 total/style 不等于实际可拆成多色，ChatGPT 对颜色拆分风险的提醒正确。
- 本地页面核对显示，Athletik 并非缺少基础事实：Sportswear 页已经覆盖 gym/training/running/yoga activewear、performance layers、OEM/ODM、FLATLOCK/ACTIVESEAM，并在 FAQ 公开 500 pieces/style；Services 和首页也使用相同 MOQ。更可能的站内缺口是 China + OEM/ODM + activewear/performance apparel + established/mid-sized B2B fit + 500 pieces/style 没有集中在页面靠前的单个可独立提取答案块。这是证据支持的优化候选，不是已证明的排名因果。
- 首轮行动边界：不发布 Athletik 自建 `best manufacturers` 榜单，不追随竞争者的循环互评；保留专业技术定位。下一步优先审核 Sportswear 页首屏附近的 40–60 word buyer-fit answer block，同时继续推进真实第三方制造商资料、设备/认证/行业来源。任何对生产页的修改必须单独审核并作为一个可测变量上线。

#### Broad Discovery v1 首轮摘要

| 指标 | Google AI Mode | ChatGPT Search | 合计 |
|---|---:|---:|---:|
| 已运行 | 3/3 | 3/3 | 6/6 |
| Athletik 正文出现 | 0/3 | 0/3 | 0/6 |
| 规范站正文引用 | 0/3 | 0/3 | 0/6 |
| 完整环境元数据 | 0/3 | 0/3 | 0/6；均保留为 `partial` |
| 主要来源模式 | 制造商榜单、roundup、新闻稿 | 候选官网、supplier profiles、部分集团官网 | 宽泛推荐仍高度依赖第一方营销与聚合来源 |

Broad Discovery 首轮完成前不建立出现率结论。首轮完成后分别报告：

- `BD-01`：无地域、无技术条件下的全球宽泛发现。
- `BD-02`：中国 sportswear OEM/ODM 宽泛发现。
- `BD-03`：中国 activewear/performance apparel + 500 pieces/style 商业匹配发现。
- 三条均单独列出 Athletik 位置、规范站引用、来源类型和竞争者；不与 V2-D03～D05 合并为一个推荐率。

### 5.5 Baseline v1 历史结果（冻结）

以下结果全部属于 v1。为保留原始历史，旧表中的 `GEO-01～08` 应理解为 `V1-01～08`；不回写或改写原始证据行。

| 运行日期 | 引擎 + 模型/模式 | 提示词 ID | 是否提及品牌？ | 是否引用 `athletikapparel.com`？ | 引用的 Athletik URL | 错误/过时信息 | 提及的其他供应商 | 证据链接/截图 | 备注 |
|---|---|---|---|---|---|---|---|---|---|
| 2026-08-08 | Microsoft Bing 国内版网页，AI 回答区块（补充记录） | GEO-01 | 是 | 否 | `https://myathletik.com/about-us/` | 回答依赖旧域名，并重复使用了不属于当前核准实体基线的“seamless technology” | 未看到 | 用户提供的截图，2026-08-08 | 回答称公司位于中国苏州张家港，专注 flatlock stitch construction、seamless technology 和 technical sportswear。本次 Bing 补充检查不能替代 ChatGPT/Perplexity/Gemini 的月度记录。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-01 | 是，公开品牌和制造定位正确 | 无法确认：粘贴文本没有保留可点击来源 | 无 | “Athletik Clothing Inc. also lists a New York, NY headquarters”可追溯到仍被索引的旧 LinkedIn 页面，但当前核准 LinkedIn 页面把 Headquarters 标为 Zhangjiagang, Jiangsu；纽约地址目前核准为美国实体/网站数据控制者地址，不自动等于当前公开品牌总部。“production facilities are in Asia”也来自旧资料，表述过于宽泛。 | 无 | 用户提供的第一次回答，2026-08-10 | 计入中性 GEO-01 基线。回答正确识别 technical knitwear、underwear/base layers、sportswear/activewear、outdoor clothing、knitted fabrics、Merino wool、FLATLOCK、ACTIVESEAM 以及张家港/苏州/江苏制造地点；总体结论准确。主要问题是把旧 LinkedIn 的纽约总部字段与当前中国制造基线合并，没有说明新旧 LinkedIn 页面和美国/中国实体角色差异。粘贴文本未保留 Sources，因此不计规范站可点击引用。 |
| 2026-08-10 | ChatGPT Search（个性化状态未控制；未提供可见模型/模式） | GEO-02 | 是，但有一次将品牌称为“Athletik Apparel” | 是 | 首页、About Us、Underwear、Sportswear、Outdoor Clothing 和 Knitted Fabrics 页面 | 公开品牌名称漂移：使用“Athletik Apparel”，而不是“Athletik Clothing”。与“fashion sweater manufacturer”的对比由模型自行添加，并非网站原文。未出现无依据的工厂数量、产能或客户声明。 | 无 | 用户粘贴的第一次回答，2026-08-10 | 规范域名引用结果较强。制造能力陈述均可追溯至当前网站文案，而且回答明确将所有权、能力和认证信息标记为公司自行声明，而非独立核实。引用链接包含 `utm_source=chatgpt.com`，可用于衡量可归因的引荐访问。本次运行发生在实体 Schema 部署后、旧站开始返回 410 后；因未控制 Memory/历史聊天状态，暂作为探索性个性化结果。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认后续测试均来自 Temporary Chat；未提供可见模型/模式） | GEO-02 | 是，使用正确公开品牌 Athletik Clothing；但只把网站归为中国实体 Zhangjiagang Athletik Clothing Co., Limited | 无法确认：回答提到规范域名，但粘贴文本没有保留可点击来源 | 无 | Zhangjiagang Athletik Clothing Co., Limited 确为核准的中国实体名称，不是幻觉；但回答没有同时说明 Athletik Clothing Inc. 是美国实体，也没有说明两者属于同一 Athletik 业务体系且运营职责不同。50+ 台圆机来自旧公司资料，不是当前规范站核准事实。Panjiva/ImportInfo 可以支持相关名称存在出口记录，但不能独立证明工厂所有权、纵向整合、产能或所有记录均属于同一法律主体。 | 无供应商；提及 LinkedIn、Panjiva 和 ImportInfo 作为资料来源 | 用户粘贴的第一次回答，2026-08-10 | 计入中性 GEO-02 基线。这是强正向网站/实体发现结果：回答明确认可 technical/performance knitwear 和 Vertically integrated OEM/ODM 定位，产品、技术、4,500+ m² 与 100,000+ 件/月等主要当前站声明基本准确。与首次个性化状态未控制的结果方向一致，且没有“your own”等可见用户关系措辞。不过粘贴文本没有保留实际来源链接，所以不能把本次单独计为规范站可点击引用。回答对中国实体名称的识别有第一方依据，但把第一方声明与贸易记录组合成“独立制造商验证”时仍存在证据层级过度外推。 |
| 2026-08-10 | ChatGPT Search（个性化状态未控制；未提供可见模型/模式） | GEO-03 | 是，位列短名单第一；但使用“Athletik Clothing / Zhangjiagang Athletik Clothing Co., Ltd.”合并称谓 | 待确认：粘贴文本保留了“Athletik manufacturing profile”链接标题，但未保留实际 URL | 未随粘贴文本保留 | Zhangjiagang Athletik Clothing Co., Limited 已确认为中国实体名称，但“Athletik Clothing / ...”不是核准的合并公开品牌，也没有说明美国实体角色；“only a small number”、供应商置信度等级和“strongest”均为模型判断。竞品设备数主要来自企业自述，未获得独立核实。Yonglee 页面中的 `MB-40FD` 与 Merrow 官方型号 `MB-4DFO` 不一致。 | Shanghai Yonglee Textile Co., Ltd.；Merino Wool Apparel (Suzhou) Co., Ltd.；Zhangjiagang Huayu Import & Export Co., Ltd. / LeHeHe Merino；Royal International Industrial Ltd. | 用户粘贴的第一次回答，2026-08-10 | 这是正向的高意图发现结果：Athletik 排名第一且获得最高置信度。回答对 FLATLOCK 与 ACTIVESEAM 的技术区分基本准确，但竞品设备、产能、工厂所有权和供应商覆盖完整性不能作为已验证事实转载。因未控制 Memory/历史聊天状态，暂作为探索性个性化结果。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认；未提供可见模型/模式） | GEO-03 | 是，四家短名单中位列第一，并被称为“strongest match”；但主要使用中国实体名称“Zhangjiagang Athletik Clothing Co., Ltd.” | 否：粘贴文本没有保留可点击 URL | 未随粘贴文本保留 | 中国实体名称方向正确，但回答没有使用公开品牌 Athletik Clothing，也没有区分中国实体 Zhangjiagang Athletik Clothing Co., Limited 与美国实体 Athletik Clothing Inc. 的角色；回答把 `ultramerino.com` 识别为 Athletik 的另一个网站，所有权关系后来由用户确认属实，但回答没有保留支持该判断的来源；“pool in China is fairly small”和“strongest match”属于检索总结，不是可穷尽证明。Royal 的厂房面积、设备数与产品范围，以及其他竞品设备数仍需独立核实。 | Shanghai Yonglee Textile Co., Ltd. / Yonglee Group；Royal / Royal APAC；Merino Wool Apparel (Suzhou) Co., Ltd. | 用户提供的复测回答，并确认来自新的 Temporary Chat，2026-08-10 | 计入本轮 ChatGPT Search 中性 GEO-03 基线。回答没有出现“your own”或其他可见用户关系措辞；在去除历史聊天 Memory 后，Athletik 仍保持第一推荐，说明核心发现结果具有初步稳定性。Temporary Chat 仍会遵循启用中的 Custom Instructions；本次附件未单独显示其状态，因此该限制保留在记录中。品牌提及成立，但因没有保留规范站 URL，网站引用仍记为否。 |
| 2026-08-10 | ChatGPT Search（个性化状态未控制；未提供可见模型/模式） | GEO-04 | 是，作为第一推荐，品牌名称正确 | 无法确认：粘贴文本没有保留可点击 URL | 未随粘贴文本保留 | “国际 OEM/出口背景由 Apparel Sourcing NYC 记录”暂未找到直接公开依据；每款 1,000 件在测试当日符合当时核准 MOQ，但每色数量仍需询价确认。AQL 2.5 是模型提出的采购条款，不是 Athletik 已公布的固定验货标准。 | Hucai Sportswear；Harvest SPF | 用户粘贴的第一次回答，2026-08-10 | 这是强正向商业发现结果：回答直接将 Athletik 作为首选，并将其与技术针织运动服、压缩衣/打底层、瑜伽服、Merino wool 和户外服装需求匹配。竞品产能、认证和 MOQ 仍按企业自述处理。因未控制 Memory/历史聊天状态，暂作为探索性个性化结果。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认；未提供可见模型/模式） | GEO-04 | 否 | 否 | 无 | HUCAI 官网不同页面同时出现每款 100、200 和 1,000 件等 MOQ，个别产品页内部也存在字段冲突；Alibaba 页面显示的员工数和厂房面积并不一致。HUCAI、Yueyi 的产能与交期主要来自企业自述；认证必须按法律主体、证书编号、范围和有效期逐项核实。 | Dongguan Humen HUCAI Garment Co., Ltd.（首选）；Yueyi Active；Ohsure Activewear / Dongguan Ohsure Clothing Co., Ltd. | 用户粘贴的第一次回答，并确认来自新的 Temporary Chat，2026-08-10 | 与此前个性化状态未控制的 GEO-04 结果方向相反：Athletik 未出现，HUCAI 成为首选。本次计入中性基线，并视为 Athletik 在通用 sportswear OEM + 1,000 件采购意图上的未提及结果；这比个性化回答中的第一推荐更能反映当前公开搜索竞争力。粘贴文本未保留实际引用 URL，因此所有网站引用均记为否。 |
| 2026-08-10 | ChatGPT Search（确认受到用户上下文影响；未提供可见模型/模式） | GEO-05 | 是，但使用“Athletik/UltraMerino”合并称谓，并称“your own” | 否 | `https://www.ultramerino.com/products.html` | 回答引用历史细分站而非规范新站，并将两个名称合并；16–19.5 micron、Yamato ISO 607 和 Woolmark licensed production 均来自历史站，不属于当前核准实体事实。题目问 manufacturers，回答主体却先列出 12 个消费品牌，意图只得到部分满足。 | OEM/ODM：BTEXCO、Sansansun；另列 Icebreaker、Smartwool、Devold、Aclima、Kari Traa、Minus33、Ridge Merino、Ibex、KUIU、First Lite、Helly Hansen、Mons Royale 等品牌 | 用户粘贴的第一次回答及其中 URL，2026-08-10 | “your own”证明回答使用了本次提示词之外的用户上下文，但仅凭措辞无法区分来源是当前对话、历史聊天、Saved Memory 还是 Custom Instructions。本行只作为个性化观察，不计入中性 GEO 基线；需要在干净 Temporary Chat 中复测。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认；未提供可见模型/模式） | GEO-05 | 否 | 否 | 无 | 回答把消费品牌称为 manufacturers，但品牌产品页只能证明具体 SKU 的材料和接缝，不能证明品牌是实际缝制制造商；“strongest verified options”没有随粘贴文本保留引用。Aclima 的表述停留在产品系列层面，回答也承认必须逐款核验。 | Icebreaker；Smartwool；Minus33；Ridge Merino；Devold；Helly Hansen；Mons Royale；Kari Traa；Aclima | 用户粘贴的第一次回答，并确认来自新的 Temporary Chat，2026-08-10 | 计入中性 GEO-05 基线。Athletik 与 UltraMerino 均未出现，进一步说明此前回答中的“your own Athletik/UltraMerino”来自个性化上下文。固定提示词没有限定 China、OEM/ODM 或 supplier，因此本次按消费品牌回答并非严格偏题；但它同时表明 Athletik 当前没有进入通用 Merino wool base layer + flatlock 产品发现结果。粘贴文本未保留实际引用 URL，因此网站引用记为否。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-06 | 否 | 否 | 无 | 回答把 technical/engineered knitwear 主要解释成电脑横机毛衫、fully fashioned、linking 和整件成型生产，而不是 Athletik 所处的针织面料裁剪缝制技术服装语境；`WHOLEGARMENT` 是 SHIMA SEIKI 注册商标，不应当作为所有整件或无缝针织的通用名称。20 项清单中的测试与性能要求没有提供具体方法或合格值，但回答已明确要求买家自行指定。 | STOLL；SHIMA SEIKI / WHOLEGARMENT（均作为技术来源或平台提及，不是供应商推荐） | 用户提供的粘贴回答，2026-08-10 | 计入中性 GEO-06 基线。回答结构完整，适合作为 flat-knit sweater / engineered flat knitting 的 tech pack 参考，但与网站目标的 cut-and-sew technical performance knitwear buyer education 意图错位。Athletik 和规范站均未出现，粘贴文本也未保留实际引用 URL。结果暴露出“technical knitwear”在公开检索中的语义歧义。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-07 | 否 | 否 | 无 | “chafing risk lowest”“OVERLOCK generally very robust”以及“高接触部位用 FLATLOCK、低接触部位用 OVERLOCK”都是有条件的工程判断，不是适用于所有面料、版型和针线配置的绝对规则。回答没有给出 stitch class、针线配置、缝宽或测试依据。 | 无 | 用户提供的第一次回答，2026-08-10 | 计入中性 GEO-07 基线。回答对 FLATLOCK 的低凸起接缝、OVERLOCK 的包边与生产效率、工业 FLATLOCK 与家用/普通包缝机 flatlock-style seam 的区别，以及接缝位置的重要性均把握正确；但 Athletik 和规范站均未出现，粘贴文本也没有保留来源 URL。结果直接支持现有第一方 FLATLOCK vs OVERLOCK 技术文章的优先级。回答结尾在一句未完成的话处截断，但不影响主体记录。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-08 | 否 | 否 | 无 | 100 分权重和 75–80 分准入线属于模型提出的采购框架，不是行业标准；“5% 价差”和不同客户规模的金额只是示例。回答再次把 knitwear 主要解释为横机毛衫，重点使用 gauge、fully-fashioned、linking、intarsia 和洗后手感等指标，没有覆盖 Athletik 买家更需要的针织面料、GSM、伸长/回复、接缝图、FLATLOCK/ACTIVESEAM 和成衣测试规格。 | Textile Exchange；GOTS；Better Cotton；DHS / UFLPA；SLCP；ZDHC；OEKO-TEX（均作为标准、法规或尽调框架提及，不是供应商推荐） | 用户提供的第一次回答，2026-08-10 | 计入中性 GEO-08 基线。框架对核实实际自有/关联/外包工序、追溯批次、检查质量趋势、压力测试成本与 MOQ、核验证书范围及先做试单均有实用价值；合规方向也与官方资料基本一致。但 Athletik 和规范站均未出现，回答未保留实际引用 URL，并再次暴露“knitwear”容易被解释为 sweater/flat knitting 的语义偏移。作为单人运营项目，先完成已规划的 FLATLOCK vs OVERLOCK 内容，再把本题作为后续买家尽调指南选题，不提高本轮内容量。 |

### V1-01 核验备注（2026-08-10）

- 独立 Temporary Chat 首次回答准确识别了 Athletik Clothing 的主要产品、技术针织定位和张家港/苏州/江苏制造地点，没有引用已经 410 下线的 `myathletik.com`。这比旧站下线前 Bing GEO-01 仍引用旧域名的结果更健康，但两个样本来自不同引擎和不同部署时点，不能当作严格前后对照。
- 回答中的纽约总部并非无来源生成。[仍可索引的旧 LinkedIn 页面](https://www.linkedin.com/company/athletik-clothing-inc)把 Headquarters 写为 New York, NY，并列出纽约和张家港两个地点；但该页面还使用旧网站、旧地址，以及未纳入当前核准事实库的客户、审核、人数和成立年份声明。用户此前确认其中国版入口已经弃用，当前推广主页面是[新 LinkedIn 页面](https://www.linkedin.com/company/111831319/)。
- 用户提供的新 LinkedIn 页面截图把 Headquarters 显示为 Zhangjiagang, Jiangsu；当前规范站 About Us 也写明业务制造基地位于 Zhangjiagang / Suzhou area of China。项目已确认纽约地址属于美国实体 Athletik Clothing Inc. 和网站数据控制者地址，但尚未把“New York headquarters”批准为当前公开品牌口径。因此回答最后的“corporate presence in New York”比“New York headquarters”更稳妥。
- “production facilities are in Asia”是旧 LinkedIn 的宽泛表述。当前核准的可公开事实是中国实体及张家港生产设施；不能据此推断其他亚洲工厂、工厂数量或地区分布。
- 本次结果完成了 ChatGPT Search 独立 Temporary Chat 的 Baseline v1 首轮基线。v1 已冻结，只保留为 2026-08 历史快照；后续使用 Baseline v2 建立新的月度时间序列，不把两个版本硬比较或合并。

### V1-02 核验备注（2026-08-10）

- 独立 Temporary Chat 复测与首次结果方向一致：两次都将 `athletikapparel.com` 正确归类为 technical/performance knitwear OEM/ODM，而不是普通时装毛衫网站。复测还准确覆盖 sportswear、base layers、underwear、outdoor clothing、Merino wool products、knitted fabrics、FLATLOCK 和 ACTIVESEAM 等核心主题。这说明品牌型固定问题的识别结果具有初步稳定性。
- [当前首页](https://www.athletikapparel.com/)和 [About Us](https://www.athletikapparel.com/about-us/)确实公开 4,500+ m²、100,000+ 件/月、Yamato FLATLOCK、Merrow ACTIVESEAM、功能性针织面料及 vertically integrated OEM/ODM 定位。因此这些句子可作为“回答准确复述当前网站”的依据，但仍属于公司第一方声明，不是第三方独立审厂结论。
- 回答首句称网站“represents Zhangjiagang Athletik Clothing Co., Limited”。[当前 Contact 页面](https://www.athletikapparel.com/contact/)确实把该名称列在生产设施区块，而网站 JSON-LD 和隐私文件使用 Athletik Clothing Inc.。所有者已确认前者是中国实体名称、后者是美国实体名称，两者属于同一 Athletik 业务体系，但运营职责不同。因此模型识别中国实体有第一方依据，问题在于它省略了美国实体与角色区分。对外应同时保持公开品牌和相关实体角色清晰，不能把两个名称写成同一个法律实体。
- “50+ circular knitting machines”来自旧公司资料，并未进入当前规范站核准实体事实。即使旧资料来自同一集团，也必须重新确认当前设备数量、所有权和适用站点后才能写入新站或销售材料。
- [Panjiva 的 Athletik 页面](https://panjiva.com/Athletik-Clothing-Co-Ltd/42368843)把 HS 61 列为首要 HS 类别，并列出 underwear、pants、performance 和 tee 等 top products；这可以支持相关出口记录以针织服装为主，但贸易数据库不是独立工厂审核，不能证明具体货物由哪家自有工厂生产，也不能验证 4,500+ m²、100,000+ 件/月或设备所有权。
- [ImportInfo 的 Athletik 页面](https://www.importinfo.com/athletik-clothing-inc)显示 2017 年至 2026-04-09 共有 290 条提单记录，并明确列出 `ATHLETIK CLOTHING INC.`、`ATHLETIK CLOTHING CO.,LIMITED`、`ATHLETIK CLOTHING INTERNATIONAL,INC` 等名称变体。它能支持“存在持续美国进口记录”，但公开页面也提示合并记录不保证完全准确；回答提到的 2026 knit socks 等记录部分使用 `ATHLETIK CLOTHING INTERNATIONAL,INC`，不能在未确认主体关系时全部归入 Athletik Clothing Inc.
- “trade-data support that it is an active apparel manufacturer/exporter”应拆开理解：贸易数据支持 exporter/shipping activity，制造商定位主要仍来自网站第一方材料和实体关系。回答最后承认 HS 62 等非针织分类存在是合理保留意见，但 HS 分类本身也不能判断公司是自产、外协还是贸易出口。
- 本次粘贴内容没有保留 Sources 区域或可点击引用。虽然回答显然使用了规范站信息，“是否引用 `athletikapparel.com`”仍记为无法确认；下次应保留共享链接或 Sources 截图。

### V1-03 核验备注（2026-08-10）

- Temporary Chat 复测与首次个性化状态未控制的结果方向一致：两次都把 Athletik 放在第一位，并把 FLATLOCK、ACTIVESEAM 和技术针织品作为核心匹配依据。这说明品牌的核心发现结果没有依赖“your own”式个性化措辞；但单次复测只能作为初始基线，不能解释为稳定排名保证。
- 复测名单从首次的五家缩小为四家，删除了 Huayu，同时继续出现 Yonglee、Merino Wool Apparel 和 Royal。供应商覆盖范围和排序仍会随检索时间、地区及来源可用性变化。
- 复测回答没有保留任何实际引用 URL，因此只能确认“品牌被提及”，不能确认 `athletikapparel.com` 获得引用。下次应优先保存回答的共享链接或包含 Sources 区域的截图。
- 用户已确认 `ultramerino.com` 由公司拥有，是早期为类目矩阵建立的独立网站。因此复测识别出的共同所有权方向正确；“Zhangjiagang Athletik Clothing Co., Ltd.”也指向已经确认的中国实体，但回答没有使用完整核准名称、公开品牌或区分美国实体角色。“Athletik/UltraMerino”仍不应作为新的合并公开品牌使用。
- [Merrow 官方 MB-4DFO 2.0 页面](https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo)支持核心技术区分：该设备生产两线或三线 ACTIVESEAM，ACTIVESEAM 是传统 FLATLOCK/INTERLOCK/OVERLOCK 的替代结构，并非 FLATLOCK 的通用同义词。
- [Yonglee 页面](https://yonglee.com/factory/baselayer)确实自行声明 30 多台 Yamato 四针六线设备和 10 多台美国 ACTIVESEAM 设备，但把型号写成 `MB-40FD`。[Merino Wool Apparel 页面](https://www.merinowoolapparel.com/about-us)使用了高度相似的数字和文案，因此两页不能视为相互独立的佐证，背后的公司或工厂关系仍不明确。
- 可检索的 [Huayu 第三方资料页](https://www.exporthub.com/zhangjiagang-huayu-import-amp-export-co-ltd/)明确提到四针 FLATLOCK、OVERLOCK 和 COVERSTITCH，但没有为本次回答中的 ACTIVESEAM 设备声明提供同等强度的证据。
- 本次检索没有找到可直接支持 Royal 所述 ACTIVESEAM 设备数、月产能和机器所有权的官方页面；这些数据继续按未核实的企业声明处理。
- “截至 2026 年 8 月只有少数中国供应商”属于无法由一次公开搜索穷尽证明的范围判断。该句和模型给出的 High/Medium 置信度只记录为回答内容，不写入 Athletik 的对外事实库。
- Merrow 过去的公开资料提到 ACTIVESEAM 品牌许可，但若产品要使用 ACTIVESEAM 名称或品牌标签，应直接向 Merrow 确认当前许可条款，不依据旧页面作当前授权结论。

### V1-04 核验备注（2026-08-10）

- Temporary Chat 复测完全没有提及 Athletik，首选从此前个性化回答中的 Athletik 变为 HUCAI，两个备选也变为 Yueyi Active 和 Ohsure。这说明此前“首选 Athletik”很可能受用户上下文影响，不能作为通用采购发现表现。
- [HUCAI 当前 MOQ FAQ](https://www.hcsportswear.com/f755077/What-is-the-MOQ-for-OEM-sportswear-orders.htm)写明从每款 200 件起；较早的 [MOQ FAQ](https://www.hcsportswear.com/f717969/What-is-your-MOQ.htm)也写 200 件并允许一个颜色、四个尺码。但是部分产品页的摘要字段写每款 1,000 件，同页详情又写 100 件，另有页面写 200 件。因此回答所称“有些产品明确报价 1,000 件”有页面依据，但不能据此推导统一 MOQ 或稳定的产品级门槛。
- HUCAI 官网自行声明月产 100,000 件以上、使用 MES、首样约 12–15 天，以及大货在产前样确认后约 25–35 天；这些可作为询价线索，不能替代针对具体款式、面料和排期的书面产能确认。[样品周期页面](https://www.hcsportswear.com/n1914926/How-Long-Does-It-Take-to-Develop-and-Approve-a-Custom-Sportswear-Sample.htm)与[大货周期 FAQ](https://www.hcsportswear.com/f717970/The-details-you-may-care-about-for-mass-products.htm)支持相应的企业自述。
- Alibaba 的 HUCAI 页面支持 Verified Supplier、制造能力和现场核验方向，但公开摘要同时出现 100+ 人/3,200+ 平方米与 121 人/5,031 平方米两组数据。平台核验不能消除资料版本差异；引用时必须注明页面和核验日期。
- [HUCAI 认证页面](https://www.hcsportswear.com/comm18/hucai-Certificates.htm)公开了 BSCI monitoring ID，并自行声明 BSCI、OEKO-TEX、GRS 和 SGS；另一篇企业博客还提到 WRAP。回答要求索取当前证书并核对法律主体是必要的，不能把网站列表直接写成已独立验证的当前认证组合。
- [Yueyi Active 官网](https://yueyiactive.com/custom-sportswear)确实自行声明 24 条生产线、月产 200,000 件以上、标准 MOQ 每款/每色 300 件，以及每款 10,000 件以上项目；这些仍是供应商自述。[Ohsure 官网](https://m.ohsurewear.com/aboutus.htm)支持其位于东莞虎门并从事男女健身服 OEM/ODM，但本次核验没有找到回答所称 Made-in-China 身份的直接页面。
- “Athletik 作为第一推荐”及其与技术针织品类的匹配是本次最重要的结果。每款 1,000 件在 2026-08-10 测试当日与当时核准的公开 MOQ 一致；当前公开 MOQ 已于 2026-08-17 调整为每款 500 件。“每色数量应确认”是合理的询价提醒，但不是网站已经公布的 MOQ 细则。
- 本次公开检索没有找到 Apparel Sourcing NYC 直接记录 Athletik OEM/出口背景的展商资料或公司页面。除非后续补充原始链接或参展文件，否则该句只作为模型生成内容记录，不作为第三方背书使用。
- [Hucai LinkedIn 页面](https://www.linkedin.com/company/hucai-sportswear/)自行声明月产约 100,000 件；其[认证页面](https://www.hcsportswear.com/comm18/hucai-Certificates.htm)列出了 Amfori BSCI monitoring ID。这比无编号的笼统认证声明更具体，但产能和证书当前有效性仍应在供应商尽调时核实。
- [Harvest SPF activewear 页面](https://www.spftex.com/activewear-manufacturer/)在 full-package OEM/ODM 区块写有 1,000 件 MOQ 和每色 500 件，但同页表单又出现“Full-Package Production (500+ units)”。其[订单流程页面](https://www.spftex.com/news/how-harvest-spf-takes-orders-from-quotation-to-global-delivery/)还按产品、现货面料和定制面料列出不同门槛，因此不能把“1,000 件”理解为所有 Harvest SPF 项目的统一 MOQ。
- 预生产样、面料测试、交期、FOB 报价和第三方终检都是合理的供应商尽调项目；“AQL 2.5”应视为需要双方约定的建议条款，而不是本次搜索已证明的 Athletik 固定标准。

### V1-05 核验备注（2026-08-10）

- Temporary Chat 复测没有提及 Athletik、`athletikapparel.com` 或 `ultramerino.com`，而此前个性化回答主动称“your own Athletik/UltraMerino”。两次差异进一步确认：此前对 Athletik 的纳入不能作为中性 GEO 表现使用。
- V1-05 只问“Which manufacturers make...”，没有限定 China、OEM/ODM 或 factory，因此 ChatGPT 将其解释为消费品牌/产品发现具有语言合理性。这项缺陷已经通过 V2-D05 修正；不再为 v1 添加补充提示词，也不把 V2-D05 与 V1-05 直接比较。
- 代表性产品声明可由品牌官网支持：[Icebreaker Merino 200 Oasis](https://na.icebreaker.com/en-us/products/women-merino-200-oasis-ls-crewe-ib0a5600401)写有 100% Merino wool 和 flatlock seams；[Smartwool Classic Thermal Merino](https://www.smartwool.com/en-us/women/base-layers/tops/womens-classic-thermal-merino-base-layer-1%2F4-zip/SW002828P06.html)写有 100% Merino wool 和 flatlock seam construction；[Minus33 的 100% Merino wool + Flat Lock Seams 筛选页](https://minus33.com/collections/100-merino-wool/flat-lock-seams)列出多个相关 SKU。
- [Ridge Merino Inversion](https://www.ridgemerino.com/products/mens-inversion-heavyweight-bottoms-merino-wool-baselayer)当前写有 100% Merino wool、270 GSM 和 low-profile flatlock seams；[Aspect](https://www.ridgemerino.com/products/mens-aspect-midweight-merino-wool-baselayer-long-sleeve-shirt)则是 84% Merino wool / 16% nylon、180 GSM，同样使用 low-profile flatlock seams。回答使用“84–100% depending on model”基本准确。
- [Devold Duo Active](https://www.devold.com/en-de/product/duo-active-merino-205-shirt-woman-go237226a/)写有 flatlock seams，但其结构是内层 100% ThermoLite、外层 80% Merino wool / 20% polyamide，不能归入“100% Merino wool only”选项。[Kari Traa Tale](https://www.karitraa.com/us/en/tale-base-layer-pants-black/)写有 100% Merino wool 和 smooth flatlock seams，[Faith](https://www.karitraa.com/us/en/faith-base-layer-pants-thyme/)写有 90% Merino wool、semi-seamless construction 和 smooth flatlock seams。[Mons Royale Cascade](https://eu.monsroyale.com/products/cascade-merino-base-layer-long-sleeve-black-womens-acc)写有 81% Merino wool 混纺和 flatlocked seams。
- 上述页面都属于品牌自有产品页，只能支持“这些品牌当前销售相应结构的产品”。它们没有公开证明实际裁剪、缝制工厂或 OEM/ODM 供应商身份，因此不能作为采购工厂短名单转载。
- “your own”是本轮测试方法受到个性化影响的明确信号，但不是 Saved Memory 的单独确证。[OpenAI Memory FAQ](https://help.openai.com/en/articles/8590148-memory-in-chatgpt-faq)说明，回答可使用历史聊天、Saved Memory、Custom Instructions、文件等个性化来源，并可通过回答下方的书本图标查看 Memory Sources；该界面不一定展示影响回答的全部因素。
- [OpenAI ChatGPT Search 说明](https://help.openai.com/en/articles/9237897-chatgpt-search)明确指出，Memory 开启时，ChatGPT Search 在把提示词重写为搜索查询时可能使用相关记忆。因此影响不只限于“your own”的措辞，也可能延伸到实际查询、检索结果和来源选择；它不会因此改变公开网站索引或其他用户的非个性化结果。
- 干净复测方法：每条提示词使用独立 Temporary Chat；确认 Custom Instructions 不包含 Athletik 相关信息；保持相同地区与联网设置；保存第一次回答。OpenAI 说明 Temporary Chat 不读取或创建 Memory，但仍会遵循启用中的 Custom Instructions。
- 这是第一次在本轮 ChatGPT 测试中明确引用 `ultramerino.com`。用户已确认该站由公司拥有，是早期类目矩阵中的独立网站；其[产品页](https://www.ultramerino.com/products.html)自行声明 16–19.5 micron Merino wool、full FLATLOCK、Woolmark licensed factory 和 Yamato ISO 607。回答并非凭空生成这些细节，但这些仍是历史站的企业自述，不能自动升级为 `athletikapparel.com` 的当前核准事实。
- “Athletik/UltraMerino”是模型根据共同所有权合并出的称谓，但不是当前核准的公开品牌写法。规范主站仍使用 Athletik Clothing；Athletik Clothing Inc. 是美国实体，Zhangjiagang Athletik Clothing Co., Limited 是中国实体。在决定历史矩阵站的当前角色之前，不在新站或销售材料中复用该合并称谓。
- Woolmark 许可属于时效敏感的认证/授权信息。即使历史页面曾声明 licensed factory，也必须取得当前许可证编号、适用主体和有效期，才能在新站或销售材料中使用。
- 消费品牌产品页可以证明某个 SKU 使用 Merino wool 和 flatlock seam，例如 [Icebreaker 200 Oasis](https://eu.icebreaker.com/en-dk/products/merino-200-oasis-long-sleeve-crew-thermal-top-ib104365013)当前写有 100% Merino wool 与 flatlock seams；但品牌拥有产品不等于品牌是实际缝制制造商，因此这部分没有直接完成供应商发现意图。
- [Fibre2Fashion 的 BTEXCO 文章](https://www.fibre2fashion.com/industry-article/8252/specialised-oem-odm-manufacturer-of-flatlock-baselayer-sportswear-and-outdoor-apparel)确实列出 FLATLOCK、Merino wool 和制造能力，但页面免责声明明确不保证准确性或作出背书，应按投稿/企业宣传资料处理，而非独立验证。
- [Sansansun base-layer 页面](https://sansansports.com/product-category/base-layers/)自行声明生产 Merino wool base layers 和 flatlock seams，但没有在该页提供足以独立核实设备、工厂所有权或认证状态的证据。
- 技术提醒“确认 stitch class、针线配置、缝宽以及接缝两面照片”是合理的采购核验建议，可以保留；它不构成对任何一家供应商能力的验证。

### V1-06 核验备注（2026-08-10）

- 回答的 20 项结构本身具有实用性，涵盖款号、technical flats、yarn/BOM、machine gauge、knit structure、POM、stretch、finishing、testing、packaging、sample approvals 和 revision control；问题不在清单完整度，而在生产类型错位。
- Athletik 当前定位中的 technical knitwear 主要指使用针织面料进行裁剪缝制并结合 FLATLOCK、ACTIVESEAM 等技术接缝的性能服装。回答则把主题带向 flat knitting、fully fashioned、linking、intarsia、plating、针织密度、横机针距和整件成型毛衫。两者有少量共用字段，但不能直接把这份回答当作 Athletik 买家的 tech pack 指南。
- [STOLL 的 technical textiles / sport 页面](https://www.stoll.com/zh/%E5%BA%94%E7%94%A8/%E4%BA%A7%E4%B8%9A%E7%94%A8%E7%BA%BA%E7%BB%87%E5%93%81/tt-sport/)支持其横机技术可用于 compression、stretch、plating 和 intarsia 等运动用途；[STOLL gauge 培训资料](https://nfc.stoll.com/faq/223788_01_train_learner_en.pdf)也说明 gauge 涉及针床针距和针钩规格。它们证明回答描述的是一套真实的横机生产语境，但不是 Athletik 当前网站的核心生产路线。
- [SHIMA SEIKI 官方说明](https://www.shimaseiki.com/wholegarment/business/index.html)将 WHOLEGARMENT 定义为在指定 SHIMA SEIKI 横机上三维整件针织的产品；其[商标指南](https://www.shimaseiki.com/news/site/intellectual-property-20210604.html)明确要求获得许可才能使用该商标。因此回答中的“WHOLEGARMENT-type”应理解为特定技术参照，不能在对外内容中泛化为普通 whole-garment 或 seamless knitting 的同义词。
- 对 Athletik 更匹配的 tech pack 内容还应明确：finished fabric supplier/article、composition、GSM、stretch/recovery、colour and finishing、POM/tolerance、seam map、FLATLOCK/ACTIVESEAM 或其他 stitch type、seam width、thread specification、SPI（如适用）、接缝强度/伸长要求、测试方法及合格值。回答虽然覆盖了部分通用字段，但没有把技术接缝规格作为中心。
- V1-06 暴露出的横机毛衫语义偏移已经通过 V2-C06 的 `cut-and-sew technical performance knitwear such as base layers or activewear` 语境修正；不再为 v1 添加补充提示词，也不把两个版本直接比较。

### V1-07 核验备注（2026-08-10）

- 回答的核心技术区分基本成立，但应使用“通常”“在相同面料和合适设置下”等条件语，而不是把舒适度、强度和耐磨表现写成固定排序。实际结果还取决于 stitch type、针线配置、缝宽、线材、针距/线迹密度、面料、接缝位置、贴合度和洗后状态。
- [Yamato VFK 官方规格](https://www.yamato-sewing.com/en/product/flatseamer/vfk/specifications/)列出了四针六线 flatbed flatseamer；[Yamato FD-62DRY 官方规格](https://www.yamato-sewing.com/en/product/flatseamer/fd-62dry/specifications/)也列出四针六线 feed-off-the-arm flatseamer 及不同针距和裁边配置。这支持“工业 FLATLOCK 需要专门设备和具体配置”，但不能单凭设备类别推出成衣接缝的最终强度或防磨等级。
- [Coats 的技术资料](https://cdn.coats.com/wp-content/uploads/Coats-Surfilor-Product-Information-Sheet-2025.pdf)把 504/514 列为 OVERLOCK、605/607 列为 flatseam、406 列为 coverseam，说明回答涉及的是不同 stitch type，不应把普通包缝机拉开的 flatlock-style seam 与工业 FLATLOCK 混为一谈。[ISO 4915:1991](https://www.iso.org/standard/10932.html)是当前的 stitch type 分类与术语标准；1981 版已撤销。
- “高接触接缝用 FLATLOCK、低接触接缝用 OVERLOCK”可以作为早期 seam map 启发，不能直接作为量产规格。买家还应要求接缝两面照片、批准样、指定面料上的接缝伸长/强力及洗后测试，并结合背包带、腋下、裆部和腰头等实际受压位置确认。
- [Merrow MB-4DFO 官方页面](https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo)把 ACTIVESEAM 定义为两线或三线 flat overlock，并明确称其是传统 FLATLOCK、INTERLOCK 和 OVERLOCK 的替代结构。未来的 Athletik 第一方文章应单独说明这一点，而不是把 ACTIVESEAM 当作 FLATLOCK 的别名。
- 本次回答没有提及 Athletik 或引用任何第一方制造页面，因此没有形成品牌引用。现有 [`../content/flatlock-vs-overlock-brief.md`](../content/flatlock-vs-overlock-brief.md) 正好覆盖这一内容缺口，仍是下一篇第一方技术内容的首选。

### V1-08 核验备注（2026-08-10）

- 100 分表格适合作为内部采购模板起点，但 25/20/15 等权重和 75–80 分门槛没有外部标准依据。实际项目应按产品复杂度、订单规模、销售市场、材料声明和合规风险调整权重，并设置独立的一票否决项，而不是把总分当作客观认证。
- 回答中的 gauge、fully-fashioned、linking、jacquard、intarsia 和 panel relaxation 主要属于横机毛衫语境。面向 Athletik 的 cut-and-sew technical performance knitwear 买家时，应增加或替换为 finished fabric article、composition、GSM、stretch/recovery、色牢度、缩水率、起球、seam map、FLATLOCK/ACTIVESEAM 配置、线材、缝宽、接缝强力/伸长、成衣尺寸和测试方法。
- “fiber → spinning → yarn dyeing → ...”应当理解为让买家绘制完整供应链并标记 owned / affiliated / subcontracted / nominated，不代表每一家 vertically integrated OEM 都必须自有所有环节。特别是对 Athletik 的对外内容，不能据此新增“自有纤维、纺纱或染纱”等未经核准的能力声明。
- 追溯部分方向正确：[Textile Exchange Content Claim Standard](https://textileexchange.org/content-claim-standard/)要求通过文件、数量平衡、隔离及 scope/transaction certificates 追踪认证材料；[GOTS 官方说明](https://global-standard.org/certification-and-labelling/who-needs-to-be-certified)要求最终产品使用 GOTS 标识时相关加工、制造和贸易阶段满足认证要求。证书必须核对法律主体、站点、产品/工序范围和有效期，不能只看供应链中某一家持证。
- 美国进口风险的提醒也有当前官方依据：[DHS UFLPA 页面](https://www.dhs.gov/uflpa)说明，全部或部分在新疆生产或涉及 UFLPA Entity List 实体的货物适用可反驳推定；名单会更新，因此任何对外尽调指南都应链接当前 DHS/CBP 资料并标注核验日期，而不是固化某一份名单。
- [SLCP 官方说明](https://slconvergence.org/tool)明确其 CAF 提供经核验的工厂社会与劳工数据，但 SLCP 本身不评分或作价值判断；品牌仍需按自己的准则分析。[ZDHC 供应商化学品管理说明](https://programme.roadmaptozero.com/suppliers/process/chemical-management-strategy-v1/plan-and-allocate-resources-to-implement-the-chemical-management-strategy)支持检查化学品清单、MRSL、SDS、废水和改进记录。[OEKO-TEX STANDARD 100](https://www.oeko-tex.com/en/our-standards/oeko-tex-standard-100)只证明相应纺织品通过有害物质测试，不证明劳动、工厂所有权或全部环境表现；回答对此限制说明正确。
- 2026-08-11 的 owner decision 取代上述旧排期：现在先建立稳定的
  Technical Guides 内容中心，并一次性完成三篇基础内容。GEO-08 因此作为
  第三篇完整草稿推进，并在 owner 审核通过后与 tech pack 指南一起接入公开
  内容中心。这是一次性的内容基础建设，不代表单人运营此后固定采用每期三篇
  的更新节奏。

## 6. 实体冲突登记表

公开搜索目前仍可能在规范新域名之前展示历史网站和第三方记录。用户确认公司早期曾为类目矩阵建立多个独立网站；下表只记录目前已经提供或发现的域名，并分别跟踪所有权、可编辑性、当前用途和内容有效性：

| 来源 | 发现的冲突类型 | 控制状态 | 下一步 |
|---|---|---|---|
| `myathletik.com` | 旧站下线前的 GEO-01 在规范域名之前引用了其历史 About Us 页面 | 站点内容已完全下线；所有已检查入口返回 410；按所有者决定不做 301 | 不修复旧站；只追踪搜索/AI 系统是否继续引用缓存中的旧页面 |
| `athletikapparel.com/contact/` | 当前页面把 Zhangjiagang Athletik Clothing Co., Limited 列为中国生产设施；当前 JSON-LD 和隐私文件使用美国实体 Athletik Clothing Inc.。GEO-02 因此只把网站归为中国实体 | 已确认：两者属于同一 Athletik 业务体系，分别为中国与美国实体名称，运营职责不同；当前已知角色为中国生产设施名称与美国网站数据控制者 | 保留两个准确实体名称；对外内容需要更详细职责时由所有者补充，不自行推断母子公司、签约、出口、雇佣或知识产权关系，也不把两者写成同一个法律实体 |
| `linkedin.com/company/athletik-clothing-inc` | 旧 LinkedIn 页面仍被国际搜索索引，显示 New York, NY headquarters、旧网站/地址，以及尚未进入当前核准事实库的客户、审核、人数和成立年份等资料；GEO-01 采用了其 New York 字段 | 中国版入口已弃用；当前主推广页为 `linkedin.com/company/111831319/`。旧国际页面的管理权限和可编辑性尚未确认 | 不把旧页声明并入当前事实库；若无法取得管理权，则继续用规范站和当前 LinkedIn 强化准确实体信息，并监测后续 GEO 是否仍引用旧页 |
| `athletik.com` | 历史品牌/网站文案和联系信息 | 【需要确认：是否拥有且可编辑？】 | 确认所有权后再更新、设置规范指向或下线 |
| `athletik.nyc` | 历史公司简介、产能和工厂结构声明 | 【需要确认：是否拥有且可编辑？】 | 替换为当前核准实体信息，或在适当时重定向 |
| `athletik.com.cn` | 历史实体表述、邮箱和运营声明 | 【需要确认：是否拥有且可编辑？】 | 更新信息，或明确说明其当前用途 |
| `ultramerino.com` | 公司早期为类目矩阵建立的独立网站；GEO-03 识别出其与 Athletik 的关系，GEO-05 将其作为“Athletik/UltraMerino”引用；页面包含历史实体名称、认证、设备、产能和材料声明 | 用户已确认公司拥有；当前角色、内容有效性和去留策略尚未确定 | 所有权问题已关闭；核验流量、索引、反向链接和历史声明后，再决定保留并更新、设置规范指向或下线。未完成评估前，不把历史站声明自动并入规范新站 |
| `powermerino.com` / `sportsbaselayer.com` | 历史细分网站声明、日期和联系信息 | 【需要确认：是否拥有且可编辑？】 | 每次检查一个域名；没有流量证据时不要批量重定向 |
| 供应商目录和进口数据网站 | 不受控制或由账户管理的 MOQ、地址、产品和关联数据 | 【需要确认：哪些资料页可以编辑？】 | 只修正公司能够控制的资料页，不声称可以控制公开记录 |

## 7. 第一轮改进周期

1. 保留每条结果的时间背景。8 月样本不是严格的前后对照实验：Bing GEO-01 记录于旧站下线前；ChatGPT GEO-02 记录于旧站下线和实体 Schema 部署后。
2. ChatGPT Search 的 Baseline v1 已完成并冻结；不再补跑其他产品来拼接旧版基线。后续从 Baseline v2 开始，在同一月度窗口运行三个主产品，并记录当时的部署、抓取和环境条件。
3. 规范站的 Organization/LocalBusiness 实体已经部署 `legalName` 和经过核实的官方资料 `sameAs` 链接。
4. 确认公司能控制哪些历史域名和目录资料页；已完全下线的 `myathletik.com` 不进入修复范围。
5. 先修正可控制且可见度最高的来源，再发布新的目录资料。
6. 已完成：FLATLOCK vs OVERLOCK、technical knitwear tech pack 和 OEM evaluation 三篇第一方指南已发布到 Technical Guides 内容中心。
7. 已完成：GEO-07 对应指南已于 2026-08-12 分发到 LinkedIn 和 Instagram；其余两篇分发和七日数据记录见 [`../GEO.md`](../GEO.md)。
8. 等三篇内容获得合理抓取时间后首次运行 Baseline v2；以后按月执行，不改变 v2 提示词原文。若确需改题，建立新版本并开启新的时间序列。

## 8. 官方参考资料

- Google AI 搜索优化指南：<https://developers.google.com/search/docs/fundamentals/ai-optimization-guide>
- Google Search Console 生成式 AI 效果报告：<https://developers.google.com/search/blog/2026/06/gen-ai-performance-reports>
- OpenAI 发布者指南：<https://help.openai.com/en/articles/12627856-publishers-and-developers-faq>
- OpenAI Temporary Chat FAQ：<https://help.openai.com/en/articles/8914046-temporary-chat-faq>
- Google AI Mode 个性化推荐控制：<https://support.google.com/websearch/answer/17026260?hl=en>
- Google AI Mode Personal Intelligence 控制：<https://support.google.com/websearch/answer/17212611?hl=en>
- Google Preferred Sources 控制：<https://support.google.com/websearch/answer/16379181?hl=en>
- Perplexity 账户、Personalization 与 Incognito 设置：<https://www.perplexity.ai/help-center/en/articles/10352990-account-settings>
- Gemini Apps Privacy Hub 与 Temporary Chat：<https://support.google.com/gemini/answer/13594961?hl=en>
- Perplexity 爬虫说明：<https://docs.perplexity.ai/docs/resources/perplexity-crawlers>
- Anthropic 爬虫说明：<https://support.anthropic.com/en/articles/8896518-does-anthropic-crawl-data-from-the-web-and-how-can-site-owners-block-the-crawler>
