# GEO 固定提示词与采样条件

> 当前项目状态与简明月度摘要见 [GEO 工作台](../GEO.md)。本页只保留已约定的采样条件和固定原题。
> 原逐题答案、旧版分析、分类及完整记录均保存在[2026-11-18 历史快照](../../archive/prompt-baseline-history-2026-11-18.md)；历史数据不重写、不重新判定。

Baseline v1 已冻结；Baseline v2 与 Broad Discovery v1 分别保留原文和独立口径。V1-04 与 V2-D04 中的 1,000 pieces 是固定问题的历史条件，不替换当前公开的 500 pieces per style。其他有效样本和实际采集频率以已约定安排为准；本次文档整理不强制补采。

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
- 保存首次完整回答、与结论相关的实际引用 URL 和必要来源证据；来源列表很长时无需截图全部候选项。分享链接不能替代实际来源 URL；记录可得的产品、模式、地区和日期，未知项保留未知。所有者已确认符合要求的样本按原接受范围保留。
- 不跨引擎比较原始排名；每个引擎只与其自身上月结果比较。
- 如果 Search Console 已为此资源显示生成式 AI 效果报告，则每月记录其展示次数和被引用页面。该功能仍在逐步推出，菜单暂未出现不视为错误。
- 检查 GA4 获客/引荐数据中可归因的 AI 搜索访问。引荐流量比未附引用的品牌提及更有证明力。
- 单独标记个性化运行。凡回答出现“your own”、引用用户身份/业务关系，或 Memory Sources 显示历史聊天、Saved Memory、文件或应用来源，均只作为个性化观察，不计入中性 GEO 基线。
- 每月默认每条提示词运行一次。若出现关键状态变化，例如“未提及 → 进入短名单”“无引用 → 引用规范站”或反向变化，在相同条件下增加两次独立确认运行；至少两次结果支持同一方向，才标记为“初步确认”。附加确认运行不并入月度 24 次默认工作量。
- 每个月度批次尽量在连续 3 个自然日内完成。批次期间不部署会改变实体信息、指南正文、导航或 Schema 的更新；如果中途发生此类部署，拆分记录为不同观察窗口，不能把结果当作同一批次。

每次运行前把环境摘要复制到记录表并补全：

`产品=；模型/模式=；登录状态=；临时/隐私模式=；个性化=关；Custom Instructions/Instructions=关；搜索/联网=开；界面/回答语言=英文；实际地区=；设备=；`

单人执行主基线：8 条 v2 提示词 × 3 个搜索产品（ChatGPT Search、Perplexity、Google AI Mode）= 每月 24 次默认检查。如果某个产品在当前账户或地区无法提供基于网页的回答，则暂停该产品。Gemini App 是独立可选轨道，运行时新增 8 次，不混入上述 24 次。

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


## 历史结果与证据

- [2026-11-18 之前的完整基线记录](../../archive/prompt-baseline-history-2026-11-18.md)：原始回答、来源、批次有效性和当时结论。
- [2026-11-16 手动采样](valid-retest/manual-2026-11-16/README.md)：所有者确认有效的 D04、BD-02、C08 及实际证据范围。
- [10 月 ChatGPT Search 采样](valid-retest/batch-d-2026-10-29/README.md)与 [Google AI Mode 采样](valid-retest/google-ai-mode-2026-10-29/README.md)：分别保存，不合并为跨平台推荐率。
