# Google AI Mode 采集归档及两平台逐题对照

整理日期：2026-10-30。Google AI Mode 的 11 条固定问题首次回答已归档并完成本次核对；以下对照使用此前已接受的 ChatGPT Search 样本。固定原题以 [Prompt 清单](../prompt-manifest.csv) 为准。

## 环境和证据边界

- Google 由 Dot 于 2026-10-29 在所有者同意的云电脑环境采集：普通浏览器、退出登录、中文界面、地区 unknown，各题新建 topic。与原计划的美国地区独立无痕环境不同，按实际环境记录。11 条首答均可用于本次回答观察；不将本次自动标为原方案的 `E3`，也不回填旧批次。
- ChatGPT E01 为所有者手动样本（10-09，M2，所有者确认有效）；E02、D03-R2 为 10-09～10-10 批次 C（M4，`valid / E3 / passed`）；其余为 10-29 批次 D 中 7 条 Dot 样本（M4，所有者确认有效）和手动 BD-01（M2，所有者接受的精简留证）。各自环境和证据见 [E01](../manual-e01/README.md)、[批次 C](../batch-c/README.md)、[批次 D](../batch-d-2026-10-29/README.md)。E01 和手动 BD-01 以已接受的证据范围为准，不声称已完成未做的全来源核验。
- Google 证据原件保留于 Downloads；私有归档在 `C:\Users\Administrator\seo-reports\geo-valid-retest\GEO-VALID-2026-10-GOOGLE-AI\`，不进入 Git。工作簿 `google_ai_mode_20261029.xlsx` SHA-256 为 `07CCB1FD9C4BE13AF0AABA805767970A8302D5C250478AF972B5FC54DA207C43`；证据包 `google_ai_mode_20261029_evidence.zip` SHA-256 为 `86A0D8F2B9458A275C93308B6A23FCE085D5A5C2B31F2A20A1255D9E060B871D`。包内包括各题首答、元数据、截图及来源材料；工作簿包含运行、引用、候选及问题账本。
- 5 题合计 16 个**引用位置**未取得最终 URL：D04 2、C07 1、BD-01 2、BD-02 7、BD-03 4；这不等于 16 个不同来源，也不否定首答观察或已有可核对引用。其余 6 题没有账本列出的最终 URL 缺口。缺失位置保留 unknown，不补造链接。
- 两平台日期、采集方式及地区不同；C06 Tech Pack 页的生产改动也发生在两批之间，精确部署时间及搜索引擎重新抓取状态 unknown。以下是各题各一次观察，不能作为平台因果对照、改版效果或稳定推荐率。

## 固定问题逐题对照

“实际引用”指回答引用中的规范站；“候选”指 Sources 中出现，不能等同于实际引用或推荐。

| 问题 | ChatGPT Search 已接受样本 | Google AI Mode 本次观察 |
|---|---|---|
| V2-E01 品牌实体 | 提及 Athletik、生产地点及官网；手动样本已按所有者决定接受 | 提及品牌并实际引用官网首页；生产基地来源组另共引 NYC、Canada 和中国站，详见 [E01 来源核查](../../e01-source-trace-2026-10-30.md) |
| V2-E02 官网理解 | 提及 Athletik，实际引用官网；指定域名理解题 | 提及 Athletik，实际引用官网首页；指定域名理解题，不能计为自然发现 |
| V2-D03 专业接缝制造商 | Athletik 第 1，实际引用官网技术指南和产品页 | Athletik 第 1，实际引用官网 FLATLOCK / ACTIVESEAM 指南 |
| V2-D04 技术针织制造商 | Athletik 第 1，实际引用 About | 未提 Athletik，未见官网实际引用；另有 2 个引用位置缺最终 URL |
| V2-D05 Merino 与 FLATLOCK | Athletik 第 1，实际引用 About 和 Merino 页面 | Athletik 第 2，实际引用官网 Merino 页面和 Top 5 文章 |
| V2-C06 Tech Pack | 未提 Athletik、未实际引用目标 Guide；另一篇 FLATLOCK Guide 为候选 | 未见官网实际引用；单次结果不能解释改版效果 |
| V2-C07 FLATLOCK vs OVERLOCK | 未提 Athletik、未实际引用官网；两篇相关 Guide 为候选 | 实际引用官网 FLATLOCK vs OVERLOCK 指南；另有 1 个引用位置缺最终 URL |
| V2-C08 OEM 尽调 | 未提 Athletik，交付的实际引用及候选清单中未见官网 | 未见官网实际引用；部分显示为权威机构的来源标签实际指向第三方页面，不能当作机构直接引用 |
| BD-01 宽泛 sportswear OEM/ODM | 未提 Athletik；官网 Top 5 文章在所有者截图的 Sources 候选中 | 未推荐 Athletik，但实际引用官网 Top 5 文章；另有 2 个引用位置缺最终 URL |
| BD-02 中国 activewear OEM/ODM | 未提 Athletik、未实际引用官网；Top 5 文章为候选 | 未提 Athletik，未见官网实际引用；另有 7 个引用位置缺最终 URL |
| BD-03 中国 activewear 采购 | 未提 Athletik、未实际引用官网；Top 5 文章为候选 | Athletik 第 1，实际引用官网 Top 5 文章；另有 4 个引用位置缺最终 URL |

## 判断和后续

1. D03 两次均推荐 Athletik 且引用官网；D04、D05 的顺序和是否出现因单次回答不同。指定网站的 E02 不作为自然发现。
2. C07 本次 Google 引用了对应官网指南；C06 未见官网实际引用，C08 也未见。官网进入候选或被引用均不证明整个回答的所有技术断言得到该页面支持。
3. BD-01 中 Google 引用官网文章但推荐其他供应商；BD-03 中 Google 推荐 Athletik 并引用官网。自有文章是第一方来源，不是独立第三方背书。
4. E01 的 `.nyc` / `.ca` 所有者已确认无控制权，接受残余风险并监测；中国站继续使用。只在常规观察出现反复且有实际影响的具体错误时重新评估，见 [来源核查](../../e01-source-trace-2026-10-30.md)。
5. 保持各平台、日期、模式分开，后续结合既有测量窗口观察；无需为补齐本次引用缺口重新采集，也不据此修改网站或安排外联。
