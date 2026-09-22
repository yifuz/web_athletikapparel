# Bing Webmaster Tools AI Performance 基线

> 状态：`baseline-established`。2026-09-22 已用只读 Bing Webmaster API 确认已验证站点，取得 AI Performance 的 `OverviewStats` 逐日 CSV 和 Pages 列表截图；所有者已在后台查看并确认 Grounding Queries 当前**无记录**。首份概览与页面级基线已建立。

## 0. API 连接核验（2026-09-22）

- 只读 `GetUserSites` 请求成功，返回 `https://athletikapparel.com/`，`IsVerified = true`。API 返回的是站点 URL 与验证状态，不提供本次需要的 AI 引用指标；界面属性类型仍待查看。
- API Key 是账户级凭据。此次没有将密钥、验证代码、完整 API 响应或请求 URL 写入仓库；后续文档只保留非敏感核验结果。
- 当前查到的 [Bing Webmaster API 官方文档](https://learn.microsoft.com/en-us/bingwebmaster/)列举常规搜索、链接和抓取接口，未列出 AI Performance 数据读取方法。该报表的[官方帮助](https://www.bing.com/webmasters/help/ai-performance-9f8e7d6c)说明可在后台导出查询、页面及时间序列的 CSV/Excel。不能把常规搜索 API 的 impressions/clicks 当作 AI citations。

## 1. 采集范围与口径

- 站点：在 Bing Webmaster Tools 中实际选中的 `athletikapparel.com` 属性；记录属性类型和界面显示的准确名称，勿自行合并其他站点或历史域名。
- 首次窗口：优先选最近 **28 个完整且已有数据的自然日**，记录起止日期、后台时区、截图时间和数据最后更新日。如果界面只允许其他窗口，保留实际所选日期；下一次使用相同长度和口径比较。
- 核心指标：`Total Citations`、`Average Cited Pages`、逐日趋势、`Cited Pages` 的 URL 与引用次数、`Grounding Queries` 的实际可见样本。若界面已提供 `Intents`、`Topics`、`Citation Share` 或 `Compare`，另存为补充观察，不混入核心指标。
- 证据：优先保留后台导出的 CSV/Excel；同时保留显示站点属性、日期范围和总览指标的截图。若当前界面没有导出入口，保留完整的页面/查询列表截图。证据可以放在本地或用户附件，不把敏感账户信息提交到 Git。

微软定义 `Total Citations` 为所选时间内 AI 回答作为来源展示的引用次数；`Average Cited Pages` 为所选时间内每天被作为来源展示的本站不同页面平均数；`Grounding Queries` 是抽样的检索短语，不是完整用户提问清单。逐页次数表示被引用频率，不代表推荐位置、页面权重或排名。报表覆盖 Microsoft Copilot、Bing 的 AI 摘要和部分合作方体验，不能直接代表 ChatGPT、Google AI Mode 或所有 AI 产品。参见 [Bing AI Performance 官方说明](https://blogs.bing.com/webmaster/February-2026/Introducing-AI-Performance-in-Bing-Webmaster-Tools-Public-Preview)。新增四项预览功能的定义见 [Bing 官方更新](https://blogs.bing.com/search/June-2026/New-AI-Visibility-Insights-in-Bing-Webmaster-Tools-Intents-Topics-Citation-Share-Compare)。

## 2. 首次快照（概览与页面已入档）

原始文件：`C:\Users\Administrator\Downloads\athletikapparel.com_AIPerformanceOverviewStats_9_22_2026.csv`；本地 SHA-256：`C74B1AA333EADC07BC5E632E1C1FCB52D299CD8AC12AD7BCFCE694B6FFFD87A1`。CSV 只有 `Date`、`Citations`、`Cited Pages` 三列。已核对 54 个连续日期、无重复或缺日；文件名和本地修改时间均为 2026-09-22，但 CSV 内未注明后台时区或报表生成时间。下表中统计值均来自**逐日 CSV 计算**，不是后台概览卡片的直接读数。

| 字段 | 记录 |
|---|---|
| 报表状态 | `有数据：OverviewStats 逐日 CSV 与 Pages 截图已取得；Grounding Queries 当前无记录（所有者后台确认）` |
| 属性名称与类型 | API 返回 `https://athletikapparel.com/`，`IsVerified = true`；CSV 文件名为同域，界面属性类型仍 `未取得` |
| 导出时间与时区 | 文件名日期为 `2026-09-22`；准确导出时刻和后台时区 `未取得` |
| CSV 完整范围 | `2026-07-29` 至 `2026-09-20`，54 个连续自然日；后台时区 `未取得` |
| 可比 28 天窗口 | `2026-08-24` 至 `2026-09-20`，28 个连续自然日 |
| 数据最后更新日 | CSV 最后一行是 `2026-09-20`；是否等于后台最后更新日 `未确认` |
| Total Citations | 后台卡片 `未取得`；28 天逐日 `Citations` **合计 5**；54 天逐日合计也为 5 |
| Average Cited Pages | 后台卡片 `未取得`；28 天逐日 `Cited Pages` 合计 4，算术平均 **0.1429 页/日**；不与后台卡片读数混同 |
| 逐日趋势 | 54 天内 4 天非零，其余 50 天在此 CSV 中为 0；非零日期见下表 |
| 页面列表完整性 | 所有者提供的 Pages 截图显示 `3 rows`、三条规范站 URL，次数为 2＋2＋1；截图不显示日期范围，不能独立证明与 28 天 CSV 窗口完全一致，尽管两者合计同为 5 |
| Grounding Queries 完整性 | 所有者 2026-09-22 在后台查看并确认当前无记录；按此记入基线。Bing 的抽样/聚合机制下，稀少引用可能没有可展示的查询短语，不推算实际提问量 |
| Intents / Topics / Citation Share / Compare | `未查看`；若界面未出现，记录 `未显示`，不推断为 0 |
| 原始证据位置 | 上述本地 CSV（SHA-256 可复核）及 2026-09-22 所有者在本对话提供的 Pages 截图；截图未另存 Git |

### 非零日期（CSV 原值）

| 日期 | Citations | Cited Pages |
|---|---:|---:|
| 2026-08-26 | 1 | 1 |
| 2026-08-27 | 1 | 1 |
| 2026-09-05 | 1 | 1 |
| 2026-09-07 | 2 | 1 |

这份导出只证明上述 Bing 报表范围内存在少量引用记录，不能识别具体页面、grounding query、回答原文、买家意图、品牌提及或供应商推荐。微软说明 AI Performance 为汇总/抽样数据，不同视图的总数可能不同；取得页面和查询导出后应分别保留各自读数，不强制凑成 5。[官方口径](https://www.bing.com/webmasters/help/ai-performance-9f8e7d6c)

### Cited Pages

以下来自所有者提供的 Pages 截图，界面显示 `3 rows`，页面次数合计 5；**截图没有日期范围**，不把这些页面次数强行归入 CSV 的 28 天窗口，也不能推断每个页面出现在哪个非零日期。

| URL（保留实际主机名） | 引用次数 | 页面类型 | 是否规范站 | 备注 |
|---|---:|---|---|---|
| <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/> | 2 | Technical Guide | 是 | 页面级引用；不代表该 Guide 被推荐 |
| <https://www.athletikapparel.com/about-us/> | 2 | 公司介绍 | 是 | 页面级引用；具体支持何种结论未知 |
| <https://www.athletikapparel.com/> | 1 | 首页 | 是 | 页面级引用；具体支持何种结论未知 |

### Grounding Queries（当前无记录）

| 查询短语 | 界面指标（如有） | 意图判断 | 相关规范页 | 备注 |
|---|---|---|---|---|
| 无可记录短语 | — | 不可判断 | — | 所有者已在后台确认当前无记录 |

[Bing 官方帮助](https://www.bing.com/webmasters/help/ai-performance-9f8e7d6c)说明：引用很少或不频繁时，Grounding Queries 可能不出现；这不代表处罚或被排除。查询短语是汇总/抽样结果，不是完整用户提示词。因此本次只记录“报表无可见查询短语”，不记录“没有相关用户查询”。

## 3. 与 GEO 漏斗的对应关系

| 观察 | 可以支持的判断 | 不能据此推断 |
|---|---|---|
| 规范站页面出现于 Cited Pages | 至少在该报表覆盖的 AI 体验中出现过本站引用 | Athletik 被推荐、进入供应商短名单，或获得点击/询盘 |
| Grounding Queries 出现专业采购主题 | 可识别被引用内容关联的主题和部分检索语境 | 真实用户完整提示词、全部查询量或采购转化 |
| 仅首页/品牌页有引用 | 当前引用集中在实体或品牌层面 | Guides 和品类页一定未被 AI 找到 |
| 数值变化 | 同属性、同长度完整窗口下的引用趋势线索 | 单次网站/社交改动的因果效果 |

后续月度复核使用同一属性、同长度完整窗口；同时记录 GSC Generative AI、固定 Baseline/Broad Discovery 答案和 GA4 引荐，各系统指标分别呈现，**不相加**。小样本阶段先记录事实和相关 URL，不因单次升降立即改写近期上线页面。

## 4. 后续复测

1. 首份基线已建立，无需为 Grounding Queries 的空表重复截图或导出。
2. 下一个完整可比窗口继续记录引用总量、被引用页面和 Grounding Queries 是否出现记录；若届时有查询短语再记录实际内容。
3. 若有 `Intents`、`Topics`、`Citation Share`，以后有足够数据时再观察，不为首份小样本基线额外分析。

当前基线可以用于后续同口径趋势比较。页面截图未显示日期范围，因此页面次数与 28 天 CSV 同为 5 只能记为数值一致，不作日期级页面归因；这不影响对 Grounding Queries“当前无记录”的记录。首个 28 天窗口数据量很小，暂不据此归因近期页面发布或改写内容。
