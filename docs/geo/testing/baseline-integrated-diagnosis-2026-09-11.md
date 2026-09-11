# GEO Baseline 综合诊断与后续方案（2026-09-11）

## 1. 结论先行

Athletik 当前已经完成从“不可见”到“能够被找到、被提取，并在专业采购问题中被推荐”的跨越，但尚未形成稳定的广义供应商发现能力。

最重要的结果不是一个单一 GEO 分数，而是两条明显分化的路径：

- **专业意图路径较强**：当问题包含 FLATLOCK、ACTIVESEAM、technical knitwear、Merino wool 或 base layers 等明确条件时，Athletik 已能进入短名单，ChatGPT Search 的 V2-D03～D05 首轮均列第 1；Google AI Mode 的 D03 列第 1、D05 列第 3。
- **宽泛发现路径较弱**：Broad Discovery v1 的 BD-01～BD-03 在 Google AI Mode 与 ChatGPT Search 共 6 次运行中，Athletik 为 `0/6 answer mentions`、`0/6 canonical citations`。即使问题已限定 China、activewear/performance apparel 和 500 pieces/style，仍未进入候选名单。

因此，现阶段不应继续无差别增加文章数量，也不应削弱 technical knitwear 定位去追逐泛化流量。优先任务是：

1. 让 Sportswear 页面更清楚地承接宽泛但符合业务条件的买家意图；
2. 让官网规范页面取代历史矩阵站和社交帖子，成为结论的主要证据来源；
3. 用真实、可核验的独立来源补足“为什么值得推荐”，而不只是“公司自己说能做”；
4. 在低曝光阶段采用可审计的整批结构优化，并使用固定 Baseline 按月验证；不从低样本强行归因到单一页面。

> **所有者策略调整（2026-09-11）：** 当前整体曝光不足以高效区分 About 与单个品类页的前后效果，因此不再逐项等待严格单变量结果。About 综合 buyer-fit 与七品类 Program Fit 作为同一批结构优化推进；部署日期、页面清单和固定提示词保持可追踪，后续分别观察整体、页面与提示词变化。

## 2. 本次诊断使用的数据

本诊断综合以下证据，不把不同性质的数据机械相加：

| 数据组 | 覆盖 | 用途 | 主要限制 |
|---|---|---|---|
| Baseline v1 | 8 条历史提示词 | 观察早期实体识别、专业推荐与内容回答 | 提示词与 v2 不同，只作历史方向参考 |
| Baseline v2 | ChatGPT Search 8/8；Google AI Mode 8/8；Perplexity 8 条 unavailable | 分别测实体提取、专业供应商推荐和内容引用 | 首轮、单月；部分运行环境字段不完整 |
| Broad Discovery v1 | Google AI Mode 3/3；ChatGPT Search 3/3 | 模拟客户从全球宽泛到 China + 500 pieces/style 的真实供应商发现 | 6 次环境元数据均不完整，只能作为首轮跨产品观察 |
| GSC Generative AI | 2026-07-21 至 09-02；Property 29 impressions | 证明规范站链接已实际出现在 Google 生成式结果 | 无 Query、答案原文、点击、推荐位置或引用结论 |
| 网站与索引检查 | 18 个 Sitemap URL 中 17 个 indexed；关键页面 HTTP 200 | 排除主要技术发现阻断 | 不能证明某次 AI 一定采用页面 |
| 站外分发 | LinkedIn / Instagram 发布；Google C08 找到 LinkedIn 尽调帖 | 观察品牌可控站外内容是否进入来源候选 | 帖子仍是第一方内容；URL 和七日数据补录不完整 |

本次仍不建立综合 GEO 总分。品牌点名题、内容引用题和未点名推荐题承担不同任务，把它们合并会掩盖真正瓶颈。

## 3. 四阶段综合判断

| 阶段 | 当前状态 | 已有证据 | 核心缺口 |
|---|---|---|---|
| 被 AI 找到 | **较强** | 技术基础正常；17/18 indexed；GSC 已记录 29 次生成式 AI Property impressions；四篇 Guide 均有页面级链接曝光 | 样本仍小；Services 索引待稳定；没有生成式 Query 维度 |
| 被 AI 提取 | **部分达成** | 品牌题通常能准确提取 technical knitwear、Zhangjiagang/Jiangsu、主要品类、MOQ 500 和规范站 | `athletik.nyc`、`athletik.com.cn`、`ultramerino.com` 等旧站或矩阵站会带入旧产能、工厂数量和实体关系推断 |
| 被 AI 引用 | **当前最弱环节** | GSC 证明 Guide 链接已被展示；Google C08 找到 LinkedIn 尽调帖 | C06～C08 两个产品共 6 次运行均未引用对应官网 Guide；引用经常落在首页、旧站、社交帖子或竞品内容 |
| 被 AI 推荐：专业意图 | **首轮较强** | ChatGPT D03～D05 均第 1；Google D03 第 1、D05 第 3 | 尚未跨月份稳定；部分推荐依赖历史站或第一方自述，第三方佐证不足 |
| 被 AI 推荐：宽泛意图 | **弱** | Broad Discovery 已覆盖全球、中国和 China + 500 pieces/style 三层意图 | 0/6 提及、0/6 规范站引用；Athletik 尚未自然进入泛 sportswear/activewear 候选池 |
| 业务结果 | **尚无足够证据** | 已建立 GA4、GSC 与询盘人工核验口径 | 当前无法把生成式曝光、固定提示词结果与有效询盘建立因果链 |

## 4. 跨产品结果说明

### 4.1 ChatGPT Search

- 优点：对具体采购约束的理解通常更好，能够区分 per style 与 per color；在专业 D03～D05 中连续把 Athletik 列为第一。
- 缺点：会选择旧 `ultramerino.com` 等非规范来源，并据此推断未核准的实体关系；在 Broad Discovery 中更偏向大型集团或公开 MOQ 更显眼的供应商。
- 结论：Athletik 已进入 ChatGPT 的专业候选知识面，但规范证据归属和泛品类匹配尚未稳定。

### 4.2 Google AI Mode

- 优点：能够找到规范站；D03、D05 已产生自然推荐；GSC 也提供了实际生成式链接曝光证据。
- 缺点：宽泛采购题明显受制造商自建榜单、roundup、新闻稿和 LinkedIn 内容影响；内容题没有优先选择 Athletik 对应 Guide；旧站内容容易重新进入回答。
- 结论：Google 的瓶颈不是抓取，而是来源选择、页面与问题的匹配，以及外部网络中的候选共识。

### 4.3 Perplexity

本轮因账户权限不可用，8 条全部记录为 `unavailable / plan-access`。不使用其他产品替代，也不把缺失结果计入命中率。后续只有在现有账户自然获得权限时再补测，不为完成表格单独付费。

## 5. 当前做得好的地方

### 5.1 技术与索引不是主要瓶颈

规范站、Canonical、robots、Sitemap、核心内链、Article / FAQPage / BreadcrumbList 等基础已经建立。GSC 生成式 AI 报表进一步证明 Google 已实际展示站内链接，因此不需要用 `llms.txt`、AI 专用 Schema 或批量重写来解决一个并不存在的“完全抓不到”问题。

### 5.2 专业定位已经形成可识别优势

FLATLOCK、ACTIVESEAM、technical knitwear、base layers 和 Merino wool 的组合足够具体，AI 能把它们与 Athletik 建立关联。这是当前最有价值的品牌资产，不应为了 broad discovery 改成模糊的“什么运动服都做”。

### 5.3 公开商业边界比多数竞品更严谨

站内已经明确 garment MOQ 为 500 pieces/style，并保留材料、颜色、尺码拆分、测试和最终条款需按项目确认的边界。这比 AI 回答中把 500 件泛化成统一能力门槛更可靠，也避免了错误承诺每色 MOQ。

### 5.4 内容已具备真实被展示的迹象

四篇 Guide 均在 GSC Generative AI Page 表中出现，说明内容资产并非没有价值。当前问题是它们没有在可观察的固定内容题中成为首选来源，而不是需要立即推倒重写。

## 6. 不足与根因假设

以下按业务影响排序。只有“观察”是当前证据；“原因”仍需通过实验验证。

### P0 — 宽泛 buyer-fit 信号分散

**观察：** BD-01～BD-03 为 0/6；Sportswear 页面已包含 activewear、OEM/ODM 和 MOQ 500 等事实，但这些信息分散在 intro、能力段和 FAQ。

**假设：** AI 在宽泛 shortlist 任务中没有快速获得一个同时回答“在哪里、做什么、服务谁、从什么订单规模开始”的完整片段，因此没有把 Athletik 与 mid-sized China activewear buyer-fit 直接关联。

**边界：** 这不是已证明的排名原因。页面改动必须只做一个集中式 buyer-fit 段落，并等待重新抓取和下一月复测，不能同时改 Title、H1、Schema 和多段正文。

### P0 — 规范引用没有赢得来源选择

**观察：** C06～C08 两个产品共 6 次运行中，对应官网 Guide 引用为 0；Google C07 只引用首页，C08 找到 LinkedIn 帖而非官网母文章。

**假设：** 现有 Guide 虽然全面，但可被直接支撑具体结论的原创证据密度、结论—来源邻接、作者/复核身份和外部引用入口仍不够强；通用解释与网上既有内容相比缺少不可替代性。

**改进方向：** 优先增加真实机器、样品、seam map、测试方法、适用边界和复核责任，而不是增加更多通用定义或固定字数“答案块”。

### P0 — 历史与矩阵站造成证据分流

**观察：** AI 多次选择 `athletik.com.cn`、`ultramerino.com`、`powermerino.com` 或 `athletik.nyc`，并出现旧产能、工厂数量、区域站角色和 Beta Textiles 关系推断。

**风险：** 即使回答提到 Athletik，错误或过期信息也会降低可用性；不同站点争夺同一结论会削弱规范站成为主证据源的概率。

**改进方向：** 建立逐站声明清单，区分当前可保留、需更新、需删除、不可公开关联和需所有者确认的内容。未经批准不做跨域重定向，也不公开连接 Beta Textiles 与 Athletik。

### P1 — 第三方权威不足

**观察：** 专业推荐主要由 Athletik 自有站点支撑；宽泛结果中的竞品则常通过行业目录、Alibaba profiles、LinkedIn、展会条目或彼此的 roundup 获得候选资格。

**判断：** 自有内容可以证明“我们如何描述自己”，但不足以稳定证明设备、实体、产能、认证范围和交付可靠性。当前缺的不是链接数量，而是与具体采购判断对应的独立佐证。

**改进方向：** 每月只推进一个可维护的高质量来源，优先设备方、认证/审核名录、展会/协会、可信行业编辑或真实第三方厂商资料。低质量目录包和付费链接不计成果。

### P1 — 测试数据完整性不足

**观察：** Broad Discovery 6/6 均缺完整环境元数据；部分 Baseline v2 也缺可见模型、登录状态、地区或完整 Sources 面板。

**影响：** 当前 0/6 足以确认首轮缺席，但还不能严谨比较地区、登录状态、模型版本或月份变化，也不能把所有候选来源写成严格全集。

**改进方向：** 下一轮每题固定记录产品、可见模式、Temporary Chat/无痕、登录状态、个性化、网络地区、界面语言、设备、第一次答案、正文引用和完整 Sources 面板。

### P1 — 分发闭环没有完整备案

**观察：** LinkedIn / Instagram 已有发布，Google 也找到过 C08 LinkedIn 帖，但 GEO-06/07/08 的公开 URL、Story 状态、UTM 和七日数据没有全部补齐。

**影响：** 无法判断某个平台是否真的提供了发现入口，也无法把有效格式沉淀为可重复 SOP。

### P2 — 从曝光到询盘尚未建立业务证据

**观察：** GSC Generative AI 能提供链接曝光，但不能提供答案内容、推荐位置或转化；现有 GA4 和有效询盘样本过小。

**改进方向：** 保持 AI referral、engaged session 和有效询盘的独立月度记录。没有足够样本前只报绝对值，不报转化率趋势或内容归因。

## 7. 后续执行方案

### 阶段 A：7～14 天，完成 P0 结构优化与证据准备

1. **About Us 综合 buyer-fit 段落审计与草稿**
   - 页面：`/about-us/`。
   - 必须同时覆盖：China production operation、OEM/ODM technical knitwear、适合 established/mid-sized B2B apparel brands、完整产品范围、FLATLOCK/ACTIVESEAM，以及 garment MOQ 500 pieces/style。
   - 独立面料项目与成衣 MOQ 分开表达，避免把 500 件口径错误套用到 fabric programs。
   - 复用现有 Hero 公司摘要位置，不新增重复定义；不改 URL、Title、Meta、H1、Schema 或页面结构。
   - 与七品类 Program Fit 作为同一批结构优化审核和部署；不从低曝光样本拆分 About 与单个品类页的因果效果。

2. **七品类 Program Fit 整批优化**
   - 页面：全部七个规范品类 URL。
   - 在 Hero 后使用共享模板输出一段可独立提取的适配答案，以及 `Best suited to`、`Program scope`、`Commercial starting point` 三项事实。
   - 六个成衣品类使用 500 pieces/style；Knitted Fabrics 按所选面料规格与项目要求报价。
   - 不改 URL、Title、H1、Schema 或图片；每个品类保留自身产品与范围边界。

3. **建立 claim-to-source 证据矩阵**
   - 覆盖 D03～D05 和 C06～C08。
   - 每一项记录：买家问题、允许公开的事实、规范第一方 URL、当前被 AI 采用的 URL、可信第三方候选、冲突、缺失输入和负责人。
   - 先修高风险冲突：实体角色、工厂地址、MOQ、设备型号/工艺、产能、认证范围。

4. **完成历史/矩阵站审计**
   - 最低覆盖：`athletik.com.cn`、`athletik.nyc`、`ultramerino.com`、`powermerino.com`。
   - 输出逐声明处置建议，不擅自合并网站、不改变 URL、不实施跨域重定向。

5. **补齐分发证据**
   - 补录 GEO-06/07/08 的 LinkedIn / Instagram URL、发布时间、UTM、Story 状态和可得七日数据。
   - 无法取得的字段写 `unavailable`，不推断。

### 阶段 B：30～60 天，增强可引用性与独立佐证

1. **只立项一项原创生产证据内容**
   - 首选：`Industrial FLATLOCK vs Merrow ACTIVESEAM for Cut-and-Sew Technical Knitwear`。
   - 立项前必须具备：真实设备信息、可公开机器画面、生产应用部位、样品正反面、准确 stitch/machine 口径、测试或验收边界。
   - 若输入不足，状态保持 `not-ready`，不以通用网络资料拼成文章。

2. **增强现有 Guide，而非批量新建近义文章**
   - 每篇只增加能够独立验证的证据模块：真实 factory media、明确适用条件、可复核技术参数、来源紧邻结论、作者/技术复核信息。
   - C06～C08 哪一题先出现规范 Guide 引用，就优先扩展对应主题；连续两月仍为 0 时再重审页面结构和证据独特性。

3. **获得至少一个高质量第三方信号**
   - 目标不是“发外链”，而是让独立页面准确说明实体、地点、产品范围或真实能力，并指向 `athletikapparel.com`。
   - 任何认证、设备授权或展会条目必须先核对当前法律实体、有效期和适用范围。

4. **统一可控公共资料**
   - LinkedIn Company Page、Instagram bio、可维护目录和中国实体资料使用一致的规范站、实体角色、核心定位与 MOQ。
   - 不披露未核准的工厂数量、合作工厂、客户名称或产能扩张叙述。

### 阶段 C：60～90 天，复测并决定扩量

1. 每月使用完全相同的 Baseline v2 与 Broad Discovery v1；每题一个独立干净会话，只保留第一次答案。
2. GSC Generative AI 使用完整 28 天窗口，分别记录 Property、Pages、Countries、Devices 和 Dates；Page 合计不与 Property 总量相加。
3. 单独记录 GA4 中可识别的 AI referral、engaged sessions 和人工确认的有效询盘。
4. 按以下规则决策：
   - buyer-fit 段落部署并被重新抓取后，在下一月复测 BD-02/03；期间不继续修改 Sportswear 主体。
   - 若 BD-02/03 仍为 0，但 Sportswear 的生成式/搜索曝光增加，优先解决站外权威，不继续堆站内关键词。
   - 若 Sportswear 没有任何新发现信号，重新检查意图匹配、内链和页面承接，而不是直接新建近义 URL。
   - 若 C06～C08 连续两个月仍无规范 Guide 引用，优先增加原创第一方证据和可信第三方引用入口，不增加通用篇幅。
   - 若专业 D03～D05 下一月仍稳定入选，继续巩固专业主题；若下降，先检查来源变化和事实冲突，不追逐一次性措辞。

## 8. 内容优先级

未来 60 天采用“证据优先、低频发布”，而不是继续快速累计文章：

| 优先级 | 内容/资产 | 类型 | 目的 | 启动条件 |
|---|---|---|---|---|
| 1 | About Us comprehensive buyer-fit paragraph | 现有实体页增强 | 建立覆盖完整产品与商业边界的公司级提取入口 | 所有者审核事实与英文 |
| 2 | D03～D05 / C06～C08 claim-to-source matrix | 内部证据资产 | 规范来源与第三方缺口治理 | 立即 |
| 3 | Industrial FLATLOCK vs Merrow ACTIVESEAM | 原创技术证据 | 提升 C07/D03 可引用性与专业推荐 | 真实设备、样品、应用与测试输入齐全 |
| 4 | 匿名项目流程或 QC evidence module | 第一方过程证据 | 支撑 D04/C08 | 有可公开记录且不涉及客户授权风险 |
| 5 | 新的泛 sportswear Guide | 暂缓 | 避免近义内容和自我榜单 | 只有 Baseline/Query 显示明确未覆盖意图时重开 |

内容资源配比暂定为：60% 搜索型采购问题、30% 可分发的原创技术证据、10% 格式实验。该比例是运营起点，不是平台排名规则。

## 9. 月度仪表盘

| 层级 | 核心指标 | 当前基线 | 下一判断点 |
|---|---|---|---|
| 找到 | GSC Generative AI Property impressions；有曝光的目标页数；索引状态 | 29 Property impressions；13 个 URL；17/18 indexed | 下一个完整 28 天窗口 |
| 提取 | E01/E02 核心事实准确率；历史站/实体冲突次数 | 核心事实总体可提取；旧站污染已复现 | 下一月同提示词 |
| 引用 | C06～C08 对应规范 Guide 引用题数；D03～D05 规范站引用覆盖 | C06～C08 为 0/6 次运行 | 下一月与原创证据上线后的 28～90 天 |
| 专业推荐 | D03～D05 入选题数、第一名次数、平均位置、理由准确性 | ChatGPT 3/3 第 1；Google 2/3 入选 | 下一月复测 |
| 宽泛推荐 | BD-01～BD-03 提及率与规范引用率，分题报告 | 0/6；0/6 | buyer-fit 整批页面被抓取后的下一完整月度窗口 |
| 业务 | AI referral sessions、engaged sessions、有效询盘 | 样本不足 | 每月自然月复核 |

“稳定改善”的最低工作定义继续保持：同一固定意图在至少两个独立产品或连续两个月出现同方向变化，并且没有依赖品牌点名、历史聊天或错误事实。

## 10. 本轮明确不做

- 不因为 Broad Discovery 0/6 就改成低 MOQ/startup 定位；当前商业边界仍是 500 pieces/style 和中型 B2B 买家。
- 不把 `technical knitwear` 替换为宽泛 `sportswear factory`；应增加连接层，而不是删除专业差异化。
- 不创建 Athletik 自有的“Top/Best manufacturers”排行榜来制造自我推荐。
- 不批量新建同义页面，不改现有规范 URL，不用无证据的 Schema、`llms.txt` 或固定字数公式。
- 不把 GSC 生成式曝光、社交展示、Sources 面板出现和 AI 正文推荐视为同一指标。
- 不引用或公开连接 Beta Textiles 与 Athletik。

## 11. 立即执行顺序

1. 先起草并审核 About Us comprehensive buyer-fit paragraph；这是当前唯一建议立即进入生产审查的站内变量。Sportswear 专项段落等待本项形成独立观察窗口后再决定。
2. 同步建立 D03～D05 / C06～C08 claim-to-source matrix，并开始历史站声明审计。
3. 向所有者收集 ACTIVESEAM 原创证据所需的机器、样品、seam application 和测试输入，再决定是否写文章。
4. 补齐社交发布备案与 GSC 月度窗口。
5. 等待重新抓取和下月固定复测，不在观察期连续改 Sportswear 页面。

这套顺序的目的，是先补“宽泛买家匹配”和“规范证据归属”两个已观察到的缺口，再用跨产品、跨月份数据判断是否需要扩大内容和站外投入。
