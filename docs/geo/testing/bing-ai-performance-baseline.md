# Bing Webmaster Tools AI Performance 基线

> 状态：`capture-ready / owner-data-pending`。2026-09-22 已确定采集口径，但尚未取得 `athletikapparel.com` 的 AI Performance 后台截图或导出；**没有建立数值基线**。不得把未取得数据写成 0，也不得把站点验证等同于该报表已可用。

## 1. 采集范围与口径

- 站点：在 Bing Webmaster Tools 中实际选中的 `athletikapparel.com` 属性；记录属性类型和界面显示的准确名称，勿自行合并其他站点或历史域名。
- 首次窗口：优先选最近 **28 个完整且已有数据的自然日**，记录起止日期、后台时区、截图时间和数据最后更新日。如果界面只允许其他窗口，保留实际所选日期；下一次使用相同长度和口径比较。
- 核心指标：`Total Citations`、`Average Cited Pages`、逐日趋势、`Cited Pages` 的 URL 与引用次数、`Grounding Queries` 的实际可见样本。若界面已提供 `Intents`、`Topics`、`Citation Share` 或 `Compare`，另存为补充观察，不混入核心指标。
- 证据：优先保留后台原始导出；若没有导出入口，保留显示站点属性和日期范围的概览截图，以及完整的页面/查询列表截图。证据可以放在本地或用户附件，不把敏感账户信息提交到 Git。

微软定义 `Total Citations` 为所选时间内 AI 回答作为来源展示的引用次数；`Average Cited Pages` 为所选时间内每天被作为来源展示的本站不同页面平均数；`Grounding Queries` 是抽样的检索短语，不是完整用户提问清单。逐页次数表示被引用频率，不代表推荐位置、页面权重或排名。报表覆盖 Microsoft Copilot、Bing 的 AI 摘要和部分合作方体验，不能直接代表 ChatGPT、Google AI Mode 或所有 AI 产品。参见 [Bing AI Performance 官方说明](https://blogs.bing.com/webmaster/February-2026/Introducing-AI-Performance-in-Bing-Webmaster-Tools-Public-Preview)。新增四项预览功能的定义见 [Bing 官方更新](https://blogs.bing.com/search/June-2026/New-AI-Visibility-Insights-in-Bing-Webmaster-Tools-Intents-Topics-Citation-Share-Compare)。

## 2. 首次快照（待后台证据）

| 字段 | 记录 |
|---|---|
| 报表状态 | `未查看`；查看后改为 `有数据 / 界面可用但显示 0 / 界面不可用 / 权限不足 / 加载或导出失败` |
| 属性名称与类型 | `未取得` |
| 截图/导出时间与时区 | `未取得` |
| 统计起止日期及后台时区 | `未取得` |
| 数据最后更新日 | `未取得` |
| Total Citations | `未取得` |
| Average Cited Pages | `未取得` |
| 逐日趋势 | `未取得` |
| 页面列表完整性 | `未取得`；记录总行数、分页及是否为截取的前几行 |
| Grounding Queries 完整性 | `未取得`；注明官方定义为样本，不推算总查询量 |
| Intents / Topics / Citation Share / Compare | `未查看`；若界面未出现，记录 `未显示`，不推断为 0 |
| 原始证据位置 | `未取得` |

### Cited Pages

| URL（保留实际主机名） | 引用次数 | 页面类型 | 是否规范站 | 备注 |
|---|---:|---|---|---|
| 待填 | — | — | — | — |

### Grounding Queries（界面实际显示的样本）

| 查询短语 | 界面指标（如有） | 意图判断 | 相关规范页 | 备注 |
|---|---|---|---|---|
| 待填 | — | — | — | — |

## 3. 与 GEO 漏斗的对应关系

| 观察 | 可以支持的判断 | 不能据此推断 |
|---|---|---|
| 规范站页面出现于 Cited Pages | 至少在该报表覆盖的 AI 体验中出现过本站引用 | Athletik 被推荐、进入供应商短名单，或获得点击/询盘 |
| Grounding Queries 出现专业采购主题 | 可识别被引用内容关联的主题和部分检索语境 | 真实用户完整提示词、全部查询量或采购转化 |
| 仅首页/品牌页有引用 | 当前引用集中在实体或品牌层面 | Guides 和品类页一定未被 AI 找到 |
| 数值变化 | 同属性、同长度完整窗口下的引用趋势线索 | 单次网站/社交改动的因果效果 |

后续月度复核使用同一属性、同长度完整窗口；同时记录 GSC Generative AI、固定 Baseline/Broad Discovery 答案和 GA4 引荐，各系统指标分别呈现，**不相加**。小样本阶段先记录事实和相关 URL，不因单次升降立即改写近期上线页面。

## 4. 所有者取数最短清单

1. 打开 Bing Webmaster Tools，选中 `athletikapparel.com` 对应属性，再进入 `AI Performance`；先截一张能同时看到属性、日期范围、总引用数、平均引用页面数和趋势的图。
2. 截 `Cited Pages` 列表；如有分页或导出，提供全部行，至少保留行数和所选排序。
3. 截 `Grounding Queries` 列表；若有 `Intents`、`Topics`、`Citation Share`，可顺手截取，不必为了首份基线额外分析。
4. 如果找不到 `AI Performance`、出现空白/权限提示或显示 0，也请截相应界面。0 只有在选定属性、日期范围、报表正常加载后才记为 0。

收到证据后，将本文件状态改为 `baseline-established` 或据实记录不可用原因；只在有数据时填写数值、URL 和查询短语。
