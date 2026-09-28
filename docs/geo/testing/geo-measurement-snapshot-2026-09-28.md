# GEO 跨平台测量快照 — 2026-09-28

> 状态：`snapshot-complete / manual-ai-refresh-pending`。传统 GSC 与 GA4 已取得两个相邻、等长的 28 天完整窗口；GSC Generative AI 与 Bing AI Performance 仍使用各自最近一次人工导出，尚不能形成第二个完整可比窗口。本快照用于建立月度判断口径，不触发页面改写。

## 1. 窗口与证据边界

| 数据源 | 当前窗口 | 对比窗口 | 数据状态 |
|---|---|---|---|
| GSC Web Search | 2026-08-27～09-23 | 2026-07-30～08-26 | `complete / final`；API 完整返回 |
| GA4 AI referrals | 2026-08-27～09-23 | 2026-07-30～08-26 | `complete / measurement-contaminated`；API 完整返回，但已知内部测试与唯一用户重叠 |
| GSC Generative AI | 2026-07-21～09-02 | 无等长第二窗口 | `baseline-only`；最近人工导出为 2026-09-05 |
| Bing AI Performance | 2026-08-24～09-20 | 无等长第二窗口 | `baseline-only`；最近人工导出为 2026-09-22 |

采集时使用 GSC 属性 `sc-domain:athletikapparel.com` 与 GA4 Property `547377703`。GSC Web Search 的结束日采用 API 当前最新 `final` 数据日 2026-09-23，因此四个系统不能强行共用同一个日期范围，也不能把指标相加。

## 2. Google 传统 Web Search

### 2.1 属性总量

| 指标 | 2026-07-30～08-26 | 2026-08-27～09-23 | 变化 |
|---|---:|---:|---:|
| Clicks | 5 | 27 | +22（+440.0%） |
| Impressions | 230 | 1,047 | +817（+355.2%） |
| CTR | 2.17% | 2.58% | +0.40 个百分点 |
| Average position | 23.90 | 13.13 | 改善 10.76 位 |

这是明显的传统搜索发现增长，但不能归因给某一篇 Guide、社交帖子、Google 更新或单次页面修改。当前站点仍处于内容与索引覆盖扩展期，且两个窗口包含多批部署。

### 2.2 重点页面

| 页面 | 前窗 Clicks / Impressions / Position | 当前窗 Clicks / Impressions / Position | 判断 |
|---|---:|---:|---|
| `/` | 4 / 67 / 4.99 | 6 / 132 / 6.99 | 曝光与点击增加；排名小幅回落，不单独改页 |
| `/flatlock-vs-overlock-technical-knitwear/` | 0 / 41 / 22.63 | 4 / 268 / 7.84 | 当前最大技术内容发现信号；继续观察，不把 Web Search 当作 AI 引用 |
| `/garment-quality-control-checklist/` | 0 / 2 / 12.50 | 5 / 148 / 20.30 | 曝光和点击建立；前窗样本只有 2，不比较排名趋势 |
| `/merino-wool-manufacturer/` | 1 / 19 / 20.68 | 4 / 143 / 14.12 | 商业品类发现增强；仍不以低样本改写页面 |
| `/underwear-manufacturer/` | 0 / 25 / 24.48 | 2 / 78 / 11.83 | 方向改善，低于既定 100 impressions 内容决策门槛 |
| `/top-sportswear-manufacturers-china/` | 前窗未发布/无匹配行 | 1 / 70 / 8.66 | 已获得传统搜索可见性；不能据此证明 AI 引用或独立背书 |
| `/flatlock-vs-activeseam-technical-knitwear/` | 前窗未发布/无匹配行 | 0 / 11 / 13.45 | 新页已开始出现；样本不足，不改页 |

当前窗口 Query 维度完整返回 35 行，但低量查询仍可能被 GSC 匿名化。可见技术查询包括：

- `flatlock stitch vs overlock`：1 click / 24 impressions / position 9.38；
- `overlock vs flatlock`：0 / 24 / 8.08；
- `flatlock vs overlock`：0 / 19 / 9.53；
- `merino wool clothing manufacturer`：0 / 19 / 25.95。

宽泛商业查询只出现少量可见行：`sportswear manufacturer china` 2 impressions、`sportswear manufacturers in china` 1 impression、`sportswear oem china` 1 impression，平均排名约 45～55。由此只能判断宽泛发现尚弱，不能计算稳定的品牌入选率。

### 2.3 目标市场与设备

| 市场 | 前窗 Clicks / Impressions | 当前窗 Clicks / Impressions |
|---|---:|---:|
| United States | 3 / 123 | 6 / 388 |
| United Kingdom | 0 / 9 | 3 / 46 |
| Canada | 0 / 1 | 1 / 30 |
| Germany | 0 / 3 | 0 / 19 |

当前窗口 Desktop 为 15 clicks / 812 impressions，Mobile 为 11 / 224，Tablet 为 1 / 11；前窗为 Desktop 4 / 200、Mobile 1 / 30。设备增长只说明展示覆盖扩大，不代表买家质量或转化差异。

## 3. GSC Generative AI

最近可用人工导出仍为 2026-09-05，实际覆盖 2026-07-21～09-02：

- Property impressions：29；
- Page 表：13 个规范 URL；
- 主要页面：`/` 7、FLATLOCK vs OVERLOCK Guide 7、Privacy Policy 5、QC Guide 4、Sports Accessories 4、Underwear 2，其余 7 个 URL 各 1；
- Countries：United States 5、India 4、Bangladesh / United Kingdom / Hong Kong / Vietnam 各 3；
- Devices：Desktop 22、Mobile 7。

Property 与 Page 表是不同聚合面，Page 行不相加为“独立回答次数”。此报表也不提供 Query、答案原文、推荐位置或转化。由于 2026-09-03～09-30 的下一完整 28 天窗口尚未结束，本次不导出残缺窗口，也不声明生成式曝光上升或下降。建议在 2026-10-03 后等待数据延迟稳定，再导出相同维度。

## 4. Bing AI Performance

最近可用人工导出仍为 2026-09-22。完整 28 天窗口 2026-08-24～09-20 为：

- 5 citations；
- 4 cited-page-days，算术平均 0.1429 页/日；
- Pages 截图：FLATLOCK vs OVERLOCK Guide 2、About Us 2、首页 1；截图未显示日期范围，因此不强行归入同一 28 天窗口；
- Grounding Queries：所有者已在后台查看并确认无记录。

这证明 Bing 覆盖的 AI 体验曾引用规范站页面，不证明 Athletik 被推荐或进入采购短名单。下一个不重叠的完整窗口为 2026-09-21～10-18；建议 2026-10-20 后再导出 Overview、Pages 与 Grounding Queries，避免用 8 天残缺窗口制造趋势。

## 5. GA4 AI referral

GA4 使用 `sessionSource` 识别 AI referral。原始结果为：

| 指标 | 2026-07-30～08-26 | 2026-08-27～09-23 |
|---|---:|---:|
| AI referral sessions | 1 | 11 |
| Total users | 1 | 1 |
| Recognized source | ChatGPT | ChatGPT |
| `generate_lead` | 0 | 0 |

当前窗口 Landing Pages 为首页 5 sessions、Merino 4、About 1、Technical Guides Hub 1；11 个 sessions 集中在 2026-09-05、09-07、09-09、09-10、09-11 与 09-14。它们全部来自同一个 GA4 用户，并与已知的 ChatGPT Sources 面板/GEO 测试期重叠。

因此本次保留原始值，但不能把 11 sessions 认定为外部买家访问。按保守归因口径记录为：

- `11 raw AI-referral sessions / 1 user`；
- `0 confirmed external AI-referral sessions`；
- `0 recorded generate_lead events from chatgpt.com`；
- 外部真实访问仍为 `unverified`，而不是绝对 0；拒绝统计同意、浏览器拦截和被归入 Direct / Unassigned 的访问不可见。

以后人工点击 AI 来源链接时使用隔离浏览器和 `utm_medium=internal_qa`（平台允许时），并记录测试日期；代理出口变化不能作为可靠排除条件。

## 6. 本轮结论

1. **找到：正在改善。** 传统 GSC 的曝光、点击、页面覆盖和目标市场覆盖均明显扩大；FLATLOCK、QC、Merino 和 Top 5 页面已形成实际 Web Search 信号。
2. **被 AI 引用：已有基线证据，但没有本月趋势。** GSC Generative AI 有 29 Property impressions；Bing AI Performance 有 5 citations。两者均缺第二个完整同口径窗口。
3. **被 AI 推荐：本快照不能证明。** Search Console/Bing citation 指标不提供答案中的短名单位置；需要固定 Baseline v2 与 Broad Discovery v1 复测。
4. **访问与业务结果：尚未建立外部证据。** GA4 原始 AI referral 来自一个与内部测试重叠的用户，且没有 `generate_lead`；所以不能宣称 GEO 已带来外部访问或询盘。
5. **页面处置：`no-change / measuring`。** 不基于本轮低样本重写近期页面，不重复提交索引，不把传统搜索增长归因给单一改动。

## 7. 自动诊断 Finding 处置

`search-performance-overview` 返回 13 项自动 Finding，均已逐项处置：

| Finding IDs | 结果 | 理由 |
|---|---|---|
| `action-441d32e9d512`、`action-977a23b6c3d8`、`action-e9b35c52d5b4` | `not-needed` | 仅存在低置信度 Google 更新时间重叠；本快照没有作算法因果归因 |
| `action-323f5317d969` | `fixed` | 已分别核对 Page、Query、Country、Device 的相邻 28 天完整数据 |
| `action-732c2e495464`、`action-ab69d21aba40`、`action-a9749051ee50` | `not-needed` | 最大页面变化已核对；无索引/Canonical 缺陷证据，且样本与多批部署不足以触发改页 |
| `action-45e69e2c016a` | `not-needed` | retained rows 未发现需要处理的 URL 重叠 |
| `action-d6944e3a6ca6` | `not-needed` | retained rows 未发现需要处理的内容衰退 |
| `action-b17a80462de0`、`action-1058f37bea64` | `not-needed` | 保持既定 100 impressions 门槛，不为扩大候选而降低置信度 |
| `action-1860f8a714e5` | `not-needed` | 当前 Guides 已有 Hub 与品类内链；无证据支持因短期上涨继续堆叠内链 |
| `action-6fddc122c5de` | `fixed` | 相关部署、索引、分发和本次快照均已进入项目日志 |

## 8. 下一采集节点

1. **2026-10-03 后：**人工导出 GSC Generative AI 的 2026-09-03～09-30 完整窗口，保留 Property、Pages、Countries、Devices、Dates。
2. **随后：**使用完全相同的 Baseline v2 与 Broad Discovery v1，在独立 Temporary Chat / 无痕会话中复测第一次完整回答与 Sources 面板。
3. **2026-10-20 后：**导出 Bing AI Performance 的 2026-09-21～10-18 完整窗口及 Pages / Grounding Queries。
4. **GA4：**继续按 28 天窗口报告 raw AI referrals、confirmed external、`generate_lead` 与人工确认询盘；任何内部测试单独标记。
