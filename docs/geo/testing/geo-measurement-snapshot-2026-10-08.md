# GSC Generative AI 28 天测量快照 — 2026-10-08

> 状态：`gsc-ai-refresh-complete / valid-retest-gsc-gate-passed / bing-refresh-pending`。
>
> 数据接入：`business_data_import (M5)`；证据等级：`E3 / auditable export`；权限依据：所有者提供的 GSC 原始 XLSX 导出。该数据可以进入链接展示趋势分析，但不能替代 AI 回答采样。
>
> 当前窗口：2026-09-03～09-30；等长对比窗口：2026-08-06～09-02。

## 1. 原始证据与完整性

当前窗口原始文件已复制到本机非 Git 归档：

- 路径：`~/seo-reports/gsc-generative-ai/2026-09-03_2026-09-30/athletikapparel-generative-ai-2026-09-03_2026-09-30.xlsx`
- 文件大小：7,295 bytes
- SHA-256：`0CB3BF40FCBB5F40FC6437137563BB686FD4BAD30948EA4DE4C64D6A9456518D`
- 过滤器：`搜索类型：网络`；`日期：2026年9月3日-2026年9月30日`
- 工作表：日期 28 行、网页 14 行、国家/地区 50 行、设备 3 行，另有过滤器表

等长对比窗口从 2026-10-08 的滚动导出中只按日期行截取：

- 路径：`~/seo-reports/gsc-generative-ai/rolling-3-months-2026-10-08/athletikapparel-generative-ai-2026-07-21_2026-10-05.xlsx`
- 文件大小：8,176 bytes
- SHA-256：`5C581D35ABD952338686ACD10D96A95FB6D02752AD5AAC38BAAB5B70579F69AD`

滚动导出的 Pages、Countries 和 Devices 是整个 2026-07-21～10-05 范围的聚合，不能切出 2026-08-06～09-02，因此本快照只比较两个窗口的 Property 日期总量；页面、国家和设备只报告当前窗口。

## 2. Property 等长窗口

| 指标 | 2026-08-06～09-02 | 2026-09-03～09-30 | 变化 |
|---|---:|---:|---:|
| Property impressions | 27 | 190 | +163 / +603.7% / 7.04× |
| 有展示日期 | 11 / 28 | 27 / 28 | +16 天 |
| 零展示日期 | 17 / 28 | 1 / 28 | -16 天 |
| 日均 impressions | 0.96 | 6.79 | +5.82 |
| 日中位数 | 0 | 6.5 | +6.5 |
| 单日最高 | 9（08-31） | 17（09-29、09-30） | +8 |

这是 Google 生成式结果中本站链接展示覆盖明显扩大的信号。它仍有三项限制：

1. 对比窗口与 Google 已记录的 2026-08-13～08-17 Generative AI Search impressions 日志异常重叠，前窗可能被低估；因此 7.04× 只作描述性变化，不作为精确增量归因。
2. 当前窗口混合了第五篇 Top Sportswear Manufacturers Guide 和第六篇 ACTIVESEAM Guide 上线前后的日期，不能把全部增长归因给任一页面或部署。
3. 报表没有 Query、答案原文、Clicks、短名单位置或转化，不能由 190 impressions 推导提取准确率、推荐率、访问或询盘。

## 3. 当前窗口页面级链接曝光

Page 表共 14 个规范 URL、199 次页面级链接曝光。该合计高于 Property 的 190 次，是同一生成式结果可能展示本站多个页面所致；它不是 199 个独立回答，也不能与 Property 总量相加。

| 页面 | 页面级曝光 |
|---|---:|
| `/flatlock-vs-overlock-technical-knitwear/` | 63 |
| `/top-sportswear-manufacturers-china/` | 31 |
| `/garment-quality-control-checklist/` | 29 |
| `/` | 19 |
| `/merino-wool-manufacturer/` | 17 |
| `/underwear-manufacturer/` | 12 |
| `/flatlock-vs-activeseam-technical-knitwear/` | 9 |
| `/about-us/` | 6 |
| `/silk-wear-manufacturer/` | 4 |
| `/knitted-fabrics-manufacturer/` | 3 |
| `/privacy-policy/` | 3 |
| `/contact/` | 1 |
| `/sports-accessories-manufacturer/` | 1 |
| `/sportswear-manufacturer/` | 1 |

按页面角色汇总：

| 页面组 | 页面级曝光 | 说明 |
|---|---:|---|
| Technical Guides | 132 | FLATLOCK vs OVERLOCK 63；Top Sportswear 31；QC 29；ACTIVESEAM 9 |
| 商业品类页 | 38 | Merino 17；Underwear 12；Silk 4；Knitted Fabrics 3；Sports Accessories 1；Sportswear 1 |
| 品牌/转化入口 | 26 | Home 19；About 6；Contact 1 |
| 法律/非目标页 | 3 | Privacy Policy 3 |

Technical Knitwear Tech Pack 与 OEM Evaluation 两篇 Guide 没有进入本次 Page 返回行。这里记录为 `no returned row`，不写成零需求、抓取失败或内容失败。Top Sportswear 与 ACTIVESEAM 已取得当前窗口内的页面级链接展示，但因上线时间位于窗口中段，尚不能做同口径部署前后比较。

## 4. 国家与设备

国家/地区表 50 行、合计 190，与 Property 总量一致。前 12 个地区如下：

| 国家/地区 | 展示 | 占 Property |
|---|---:|---:|
| 美国 | 55 | 28.9% |
| 印度 | 16 | 8.4% |
| 英国 | 12 | 6.3% |
| 巴基斯坦 | 8 | 4.2% |
| 加拿大 | 7 | 3.7% |
| 中国香港 | 7 | 3.7% |
| 澳大利亚 | 6 | 3.2% |
| 印度尼西亚 | 5 | 2.6% |
| 孟加拉 | 4 | 2.1% |
| 德国 | 4 | 2.1% |
| 新加坡 | 4 | 2.1% |
| 泰国 | 4 | 2.1% |

设备表同样闭合到 190：Desktop 130（68.4%）、Mobile 57（30.0%）、Tablet 3（1.6%）。国家与设备只说明链接展示分布，不代表买家身份、意图质量或转化质量。

## 5. 四阶段判断

| 阶段 | 本次可以确认 | 本次不能确认 |
|---|---|---|
| 被 AI 找到 | Google AI Overviews / AI Mode 中的规范站 Property impressions 已由 27 增至 190，覆盖 27/28 天 | 触发 Query、检索链路和具体答案场景 |
| 被 AI 提取 | 无直接字段 | 哪些事实被采用、描述是否准确、实体是否混淆 |
| 被 AI 引用 | 14 个规范 URL 获得页面级链接曝光，可作为 citation-surface evidence | 链接支持了哪项结论、引用是否相关、是否进入答案正文 |
| 被 AI 推荐 | 无直接字段 | 是否进入供应商短名单、名单位置、推荐理由和跨产品稳定性 |

Finding outcome：`visibility-up / attribution-unproven / no-site-change`。本轮不修改 URL、Title、Meta、H1、正文、Schema 或内部链接，也不因未返回行重复提交索引。

## 6. 复测闸门与下一步

- 2026-10-03 后的 GSC Generative AI 完整窗口已经取得，GSC 数据时间闸门通过。
- 传统 GSC 与 GA4 的 2026 年 9 月自然月基线已经单独归档；Bing AI Performance 继续使用 2026-08-24～09-20 基线，第二窗口不早于 2026-10-20 导出。
- [`valid-retest/README.md`](valid-retest/README.md) 中 22 条 ChatGPT Search / Google AI Mode 记录仍全部是 `planned`；本文件没有产生任何 AI 回答样本，也没有把 M5 导出当成 M2 采样。
- 下一执行动作是先固定不超过 3 个自然日的采样窗口、私有证据目录、采集人、复核人、生产冻结和外部事件记录，再从 11 条 ChatGPT Search 样本开始。每题使用独立 Temporary Chat，只保留第一次完整回答与完整 Sources 证据。

有效复测用于回答提取准确性、规范引用和推荐结果；本快照继续只承担 Google 生成式链接展示趋势。两类证据分别报告，不合并分母。
