# Baseline v2 首批测试后 GEO 诊断（2026-09-11）

## 1. 结论先行

Athletik 已经跨过“完全不可见”阶段：Google Search Console（GSC）已经记录 Google 生成式搜索链接曝光，ChatGPT Search 和 Google AI Mode 也都能找到、提取并在部分未点名采购题中推荐 Athletik。

当前主要瓶颈不是 robots、索引、Schema 或页面缺失，而是以下三项：

1. **规范来源归属不稳定**：AI 会在 `athletikapparel.com`、历史矩阵站、旧区域站和品牌自有社交内容之间选择证据。
2. **对应官网 Guide 尚未成为内容题的首选来源**：V2-C06～C08 在 ChatGPT Search 和 Google AI Mode 共 6 次实际运行中，目标 Guide 引用为 0；Google C08 找到了对应 LinkedIn 帖，但仍没有选择官网母文章。
3. **推荐理由缺少稳定的独立佐证**：当前推荐已经出现，但主要依据仍来自 Athletik 可控页面或历史站点，尚不足以证明跨产品、跨月份的稳定第三方共识。

因此，本阶段不建议立刻大改四篇 Guide、增加近义文章、制作 AI 专用 Schema、创建 `llms.txt`、重复请求索引或改变 URL。应先补齐证据债务、治理规范来源归属，并选择一个能加入真实生产证据的主题做单变量增强。

## 2. 范围、环境与数据状态

| 项目 | 本次范围与状态 |
|---|---|
| 生产站 | `https://www.athletikapparel.com/` |
| 诊断日期 | 2026-09-11（Asia/Shanghai） |
| 覆盖模式 | `full` 用于当前 20 个可抓取站内页面的技术 AI-readiness 检查；`targeted` 用于 8 条固定 Baseline v2 提示词及四篇 Guide |
| 固定提示词 | ChatGPT Search 8/8；Google AI Mode 8/8；Perplexity 8/8 为 `unavailable / plan-access` |
| GSC 生成式搜索导出 | `complete`；2026-07-21 至 2026-09-02，Property impressions 29 |
| 页面维度 | 13 个规范 URL 获得页面级展示；页面行合计 36，不能与 Property impressions 相加或解释为 36 次引用 |
| 技术现场检查 | SEO CLI `0.2.36`；`ai-readiness`、`geo-gaps` 与 `entity-readiness` 均未返回可执行 finding |
| 技术覆盖限制 | `geo-gaps` 评估 20 个页面，GSC 数据连接 18/20；5 个外部 URL 无法自动验证；工具没有声明 source acquisition 为全覆盖 |
| 站外分发记录 | `partial`；GEO-06/07 公开 URL、Story 状态和七日数据未补齐；Google C08 Sources 面板证明 GEO-08 LinkedIn 帖存在，但实际 href 未保存 |

GSC 导出的日期、国家/地区和设备维度各自合计 29；页面维度之和为 36，符合一次搜索结果中可能展示多个本站链接的报表形态。该数据证明本站进入了 Google 生成式搜索链接展示面，但报表不提供 Query、回答原文、推荐位置或链接支持的具体结论。

## 3. 四阶段诊断

| 阶段 | 当前状态 | 直接证据 | 诊断 |
|---|---|---|---|
| 被 AI 找到 | **已达成，继续监测** | GSC 29 次 Property impressions；13 个规范 URL 有页面级展示；现场技术报告无阻断 finding | 不需要再以 robots、Sitemap、Schema 或重复索引申请作为主动作 |
| 被 AI 提取 | **部分达成** | E01/E02 能提取主要业务、张家港生产地点和规范站；Google E01 仍混入 `athletik.nyc` 的旧产能/工厂口径 | 当前问题是来源冲突和实体陈述治理，而不是缺少公司介绍 |
| 被 AI 引用 | **存在曝光，但目标 Guide 选择失败** | 四篇 Guide 均进入 GSC 页面表；C06～C08 两产品共 6 次运行均未引用对应官网 Guide；Google C08 选择了对应 LinkedIn 帖作为来源候选 | 内容语义大体匹配，但官网 Guide 的 source selection / authority 仍不足 |
| 被 AI 推荐 | **强信号已出现，但不稳定** | ChatGPT D03～D05 三题均列 Athletik 第 1；Google D03 第 1、D04 未出现、D05 第 3 | 不能称为稳定排名；规范站支持程度和名单位置随意图明显变化 |

## 4. Findings

### GEO-BV2-001 — 对应官网 Guide 未成为内容题首选来源

- **类型**：`review`
- **Severity**：Warning
- **Business priority**：P1
- **Confidence**：Confirmed
- **影响范围**：
  - `/technical-knitwear-tech-pack-guide/`
  - `/flatlock-vs-overlock-technical-knitwear/`
  - `/evaluate-technical-knitwear-oem/`
  - `/garment-quality-control-checklist/`
- **证据状态**：固定提示词记录 `complete/partial` 混合；跨 ChatGPT Search 与 Google AI Mode 共 6 次 C06～C08 实际运行。
- **观察**：六次内容题均未引用对应官网 Guide。Google C07 引用了首页；Google C08 的 Sources 面板找到了对应 LinkedIn 尽调帖；GSC 页面表又证明四篇 Guide 均至少获得一次生成式搜索链接曝光。
- **推断**：页面不是不可访问或完全不相关；更符合“能被检索，但在具体答案中未赢得来源选择”的模式。原因可能包括独特证据不足、第一方权威不足、外部引用图谱不足或竞争来源更贴近子查询，当前数据不能把原因归结为单一页面结构问题。
- **反证条件**：下一次相同固定提示词中，至少两个独立产品或连续两个月选择对应规范 Guide，并且引用能够支持答案结论。
- **最小建议动作**：先为 C06～C08 建立“AI 结论—一手来源—Athletik 原创证据—官网承接页”矩阵；只选择一个有真实设备、样品、测试方法或质检记录可公开的主题增强，不同时改四页。
- **依赖**：所有者确认哪些生产图片、设备信息、样品对比、测试方法和结果可以公开。
- **验证窗口**：页面增强后至少 28 天观察 GSC；下一个月用完全相同提示词复测。
- **允许结果**：`changed`、`no-change`、`deferred`。

### GEO-BV2-002 — 规范站证据被历史矩阵站与旧口径分流

- **类型**：`review`
- **Severity**：Warning
- **Business priority**：P1
- **Confidence**：Confirmed
- **影响范围**：Athletik 品牌/实体题及 D03、D05；`athletik.nyc`、`athletik.com.cn`、`powermerino.com`、`ultramerino.com` 等历史或矩阵站候选。
- **证据状态**：两产品首批结果；部分运行缺少完整来源 href 或会话元数据。
- **观察**：Google E01 混入 `athletik.nyc` 的旧工厂/产能表述；Google D03 的 Athletik 推荐证据落到 `athletik.com.cn` 和 `powermerino.com`；ChatGPT D05 主要依赖 `ultramerino.com`，并推断未核准的 Beta Textiles 公开关系。
- **推断**：多个可控站点扩大了检索面，同时稀释了哪个页面代表当前规范事实。它们不能自动视为负面资产，但相互冲突或过时陈述会增加模型拼接错误。
- **反证条件**：后续 E01/E02/D03/D05 连续两个月以规范站为主要证据，且不再出现旧产能、旧区域站角色或未核准实体关系。
- **最小建议动作**：建立矩阵域名事实清单，逐项标记控制权、当前用途、索引状态、规范事实、冲突陈述与是否应维护；只同步事实口径，不建立未经批准的交叉链接、合并、重定向或公开同主体声明。
- **依赖**：所有者确认各矩阵站的当前运营角色与可编辑权限。
- **验证窗口**：事实同步后 28～90 天，并用固定 E01/E02/D03/D05 复测。
- **允许结果**：`changed`、`no-change`、`deferred`。

### GEO-BV2-003 — 推荐信号缺少稳定的独立第三方佐证

- **类型**：`review`
- **Severity**：Info
- **Business priority**：P1
- **Confidence**：Probable
- **影响范围**：D03～D05 的推荐理由与名单稳定性。
- **证据状态**：首批跨产品观察；尚无跨月份确认。
- **观察**：推荐已经出现，但被使用的 Athletik 证据主要来自规范站、历史矩阵站或品牌自有 LinkedIn。品牌自有社交帖是有效发现入口，但不是独立背书。
- **推断**：缺少与具体采购判断直接相关的独立证据，可能限制推荐稳定性和规范站引用质量；当前不能证明这是唯一原因。
- **反证条件**：可信独立行业来源、设备方、认证名录或编辑内容在固定采购题中支持 Athletik 的准确能力陈述。
- **最小建议动作**：每月只推进一个真实、可维护、可核验的站外证据机会；不购买目录包、不制造自有“最佳厂家”榜单、不伪装社区用户。
- **依赖**：可核验证书/设备/企业资料，以及外部平台资格与所有者批准。
- **验证窗口**：首次公开收录后 28～90 天。
- **允许结果**：`changed`、`no-change`、`deferred`。

### GEO-BV2-004 — 分发记录不足以归因站外内容效果

- **类型**：`review`
- **Severity**：Info
- **Business priority**：P0
- **Confidence**：Confirmed
- **影响范围**：GEO-06、GEO-07、GEO-08 LinkedIn / Instagram 记录。
- **证据状态**：`partial`。
- **观察**：GEO-06/07 缺少公开帖子 URL、Story 状态和七日平台/GA4 数据；Google C08 Sources 面板证明 2026-08-14 Athletik LinkedIn 尽调帖已进入来源候选，但实际 LinkedIn href 未保存，Instagram 状态仍未确认。
- **推断**：当前可以确认“站外内容被找到”，但不能判断哪个帖子、UTM、渠道或格式贡献了官网访问、Guide 引用或推荐。
- **反证条件**：发布日志补齐可取得字段，无法取得的字段明确标记 `unavailable`。
- **最小建议动作**：从 LinkedIn/Instagram 后台复制实际公开 URL，并补录平台七日数据与 GA4 `technical_guides` Campaign；不反向猜测历史 Story。
- **依赖**：所有者的平台后台访问。
- **验证窗口**：补录完成即关闭记录缺口；归因结论至少使用完整自然日窗口。
- **允许结果**：`changed`、`no-change`、`deferred`。

### GEO-BV2-005 — AI 回答中的技术漂移不能反向成为网站事实

- **类型**：`review`
- **Severity**：Info
- **Business priority**：P1
- **Confidence**：Confirmed
- **影响范围**：C06～C08 与 D03/D05 的生成答案。
- **证据状态**：已保存的首次回答与核验备注。
- **观察**：答案出现 `ISO 607`、固定 SPI/公差、统一 8%–18% 成本节省、9GG–16GG/Stoll/Shima Seiki 毛衫语境、vertical integration 必须全部自有、认证/审核概念混用及未来法规被写成当前要求等问题。
- **推断**：Athletik 可以通过更精确的一手技术证据成为纠错来源，但这些外部答案错误不能直接证明当前 Guide 有缺陷，也不能复制进官网。
- **反证条件**：后续答案采用正确的 stitch type / seam / process 边界，并由目标 Guide 或可信一手来源支持。
- **最小建议动作**：把错误整理成 future evidence brief；只有当 Athletik 有真实设备/样品/测试证据时，才制作原创 ACTIVESEAM 或工艺验证内容。
- **依赖**：生产事实核验和可公开证据。
- **验证窗口**：新证据上线 28～90 天后复测。
- **允许结果**：`changed`、`no-change`、`deferred`。

### GEO-BV2-006 — GSC 生成式 AI 报表只能测链接曝光面

- **类型**：`review`
- **Severity**：Info
- **Business priority**：P0
- **Confidence**：Confirmed
- **影响范围**：GSC Generative AI 月度观测口径。
- **证据状态**：导出 `complete`。
- **观察**：Property impressions 为 29；页面维度合计 36，其中首页 7、FLATLOCK Guide 7、Privacy Policy 5、QC Guide 4，另有 9 个 URL 共 13。国家/地区和设备维度分别合计 29。
- **推断**：页面表反映链接展示分布，不等于答案引用次数、准确提取次数或推荐次数；Privacy Policy 获得 5 次展示也说明页面链接可能作为结果中的辅助链接出现。
- **反证条件**：Google 后续报表明确提供 Query、citation、answer text 或 recommendation position 等新字段。
- **最小建议动作**：每月分别保存 Property、Pages、Countries、Devices 和 Dates；维度内比较，不跨维度相加；与固定提示词、GA4 和询盘记录分开报告。
- **依赖**：完整可比导出窗口。
- **验证窗口**：每个完整 28 天或自然月窗口。
- **允许结果**：`changed`、`no-change`、`deferred`。

## 5. 已通过检查

- 生产站已有真实 GSC 生成式搜索展示，不再停留在“理论上可被 AI 抓取”。
- `ai-readiness` 没有返回访问、索引或 snippet control 的可执行 finding。
- `geo-gaps` 在 20 个评估页面中没有返回需要处理的 AI 搜索限制；该结果不等于保证索引、选择或引用。
- `entity-readiness` 没有返回可执行 finding；该结果不等于 Knowledge Graph 识别或推荐保证。
- 四篇 Guide 均出现在 GSC 页面维度中，排除“全部从未进入 Google 生成式搜索展示面”的判断。
- C06/C07 的回答已经进入正确的 cut-and-sew technical performance knitwear 主题，说明固定提示词与承接页并非完全语义错配。
- D03～D05 已产生跨产品推荐信号；D05 已在 Google AI Mode 中直接引用规范 Merino 页面。

## 6. URL 与重定向说明

- 本次没有发现需要改变当前规范 URL 的证据。
- `myathletik.com` 已按所有者决定返回 410，继续排除在本诊断与重定向范围外。
- 历史/矩阵站治理不等于合并站点。未经所有者重新决策，不创建跨域 301、不公开关联 Beta Textiles、不把多个法律实体写成同一法律主体。

## 7. 按收益、依赖与风险排序的下一步

1. **P0 / 低风险 / 所有者输入**：补齐 GEO-06/07/08 的公开帖子 URL、实际发布时间、Story 状态和可得七日数据；无法取得的字段写 `unavailable`。
2. **P1 / 中收益 / 低技术风险**：完成 D03～D05 推荐证据矩阵，明确每个采购问题需要的 Athletik 事实、规范页、可信外部佐证和缺失原始证据。
3. **P1 / 高收益 / 需所有者决策**：完成历史与矩阵域名事实审计，先找冲突陈述，再决定逐站维护；不把重定向当默认方案。
4. **P1 / 高收益 / 证据依赖**：只选择一个原创证据主题。当前优先候选是 `Industrial FLATLOCK vs Merrow ACTIVESEAM for Cut-and-Sew Technical Knitwear`，前提是设备、应用部位、样品与测试边界都能核验。
5. **P1 / 外部依赖**：争取一个与设备、认证或行业采购判断直接相关的可信站外佐证；品牌自有 LinkedIn 继续用于分发，但不计作独立背书。
6. **P2 / 监测**：下一月按原文运行同一套 Baseline v2；Perplexity 继续标记 unavailable，不购买会员、不用其他产品冒充。

## 8. 本轮明确不做

- 不修改 URL、Canonical 或当前重定向策略。
- 不重复申请四篇 Guide 索引。
- 不因为一次未引用就同时重写四篇 Guide。
- 不增加近义页面、自建供应商榜单或低质量目录链接。
- 不用 `llms.txt`、AI 专用 Schema、固定字数答案块或关键词堆叠替代证据建设。
- 不把 GSC 页面 impressions、LinkedIn 来源卡或单次第一推荐写成稳定推荐率。

## 9. 证据缺口与重开条件

| 缺口 | 当前状态 | 重开/关闭条件 |
|---|---|---|
| Perplexity 基线 | `unavailable / plan-access` | 产品权限自然可用时，使用原固定提示词补跑；不追溯填充当前批次 |
| V2-E01 完整环境元数据 | `partial` | Temporary Chat、可见模式、地区、个性化与完整来源证据全部可核验 |
| LinkedIn / Instagram URL 与数据 | `partial / overdue` | 后台补齐可得字段，不可得字段标记 unavailable |
| Google Sources 面板实际 href | `partial` | 后续运行直接复制最终 URL；不从卡片标题猜测 |
| 独立第三方推荐证据 | `external-input` | 出现可公开、可索引、信息准确且非品牌自控的来源 |
| 生成式 AI 对业务结果的贡献 | `unavailable / low-sample` | 可归因 AI referral、engaged session 或有效询盘达到可解释样本 |

## 10. Finding 与覆盖核对

| 项目 | 数量 |
|---|---:|
| Critical | 0 |
| Warning | 2 |
| Info | 4 |
| Fix 类型 | 0 |
| Review 类型 | 6 |
| SEO CLI 返回的 actionable findings | 0 |
| 技术检查评估页面 | 20 |
| GSC 数据成功连接页面 | 18 / 20 |
| 固定提示词实际运行 | 16 |
| 因产品权限不可运行 | 8 |

本诊断不提供单一 GEO 分数。下一阶段是否成功，必须继续分别判断找到、提取、引用和推荐，而不能用品牌题的高准确率掩盖未点名内容引用的缺口。
