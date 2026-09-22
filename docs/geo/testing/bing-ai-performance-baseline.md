# Bing Webmaster Tools AI Performance 基线

> 状态：`overview-baseline-established / page-query-pending`。2026-09-22 已用只读 Bing Webmaster API 确认该账户可访问已验证站点，并取得 AI Performance 的 `OverviewStats` 逐日 CSV；**概览时序基线已建立**，但后台指标卡、被引用 URL 与 Grounding Queries 仍待取证。不得把缺失明细写成 0。

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

## 2. 首次快照（概览已入档，页面和查询待补）

原始文件：`C:\Users\Administrator\Downloads\athletikapparel.com_AIPerformanceOverviewStats_9_22_2026.csv`；本地 SHA-256：`C74B1AA333EADC07BC5E632E1C1FCB52D299CD8AC12AD7BCFCE694B6FFFD87A1`。CSV 只有 `Date`、`Citations`、`Cited Pages` 三列。已核对 54 个连续日期、无重复或缺日；文件名和本地修改时间均为 2026-09-22，但 CSV 内未注明后台时区或报表生成时间。下表中统计值均来自**逐日 CSV 计算**，不是后台概览卡片的直接读数。

| 字段 | 记录 |
|---|---|
| 报表状态 | `有数据：OverviewStats 逐日 CSV 已取得；后台卡片、Pages、Grounding Queries 未取得` |
| 属性名称与类型 | API 返回 `https://athletikapparel.com/`，`IsVerified = true`；CSV 文件名为同域，界面属性类型仍 `未取得` |
| 导出时间与时区 | 文件名日期为 `2026-09-22`；准确导出时刻和后台时区 `未取得` |
| CSV 完整范围 | `2026-07-29` 至 `2026-09-20`，54 个连续自然日；后台时区 `未取得` |
| 可比 28 天窗口 | `2026-08-24` 至 `2026-09-20`，28 个连续自然日 |
| 数据最后更新日 | CSV 最后一行是 `2026-09-20`；是否等于后台最后更新日 `未确认` |
| Total Citations | 后台卡片 `未取得`；28 天逐日 `Citations` **合计 5**；54 天逐日合计也为 5 |
| Average Cited Pages | 后台卡片 `未取得`；28 天逐日 `Cited Pages` 合计 4，算术平均 **0.1429 页/日**；不与后台卡片读数混同 |
| 逐日趋势 | 54 天内 4 天非零，其余 50 天在此 CSV 中为 0；非零日期见下表 |
| 页面列表完整性 | `未取得`；记录总行数、分页及是否为截取的前几行 |
| Grounding Queries 完整性 | `未取得`；注明官方定义为样本，不推算总查询量 |
| Intents / Topics / Citation Share / Compare | `未查看`；若界面未出现，记录 `未显示`，不推断为 0 |
| 原始证据位置 | 上述本地 CSV；未复制进 Git，文件完整性以 SHA-256 复核 |

### 非零日期（CSV 原值）

| 日期 | Citations | Cited Pages |
|---|---:|---:|
| 2026-08-26 | 1 | 1 |
| 2026-08-27 | 1 | 1 |
| 2026-09-05 | 1 | 1 |
| 2026-09-07 | 2 | 1 |

这份导出只证明上述 Bing 报表范围内存在少量引用记录，不能识别具体页面、grounding query、回答原文、买家意图、品牌提及或供应商推荐。微软说明 AI Performance 为汇总/抽样数据，不同视图的总数可能不同；取得页面和查询导出后应分别保留各自读数，不强制凑成 5。[官方口径](https://www.bing.com/webmasters/help/ai-performance-9f8e7d6c)

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

1. 打开 Bing Webmaster Tools，选中 API 已验证的 `https://athletikapparel.com/` 属性，再进入 `AI Performance`；先截一张能同时看到属性、日期范围、总引用数、平均引用页面数和趋势的图。
2. 时间序列 CSV 已取得。下一步优先选 `2026-08-24` 至 `2026-09-20`，导出页面引用与 Grounding Queries 的 CSV/Excel；若界面无法选择同一窗口或无法导出，则保留实际日期、完整列表截图、行数、分页和所选排序。
3. 若有 `Intents`、`Topics`、`Citation Share`，可顺手截取，不必为了首份基线额外分析。
4. 如果找不到 `AI Performance`、出现空白/权限提示或显示 0，也请截相应界面。0 只有在选定属性、日期范围、报表正常加载后才记为 0。

收到页面、查询与概览卡片证据后，将本文件状态改为 `baseline-complete`；只在有数据时填写 URL、查询短语和后台卡片数值。首个 28 天窗口数据量很小，暂不据此归因近期页面发布或改写内容。
