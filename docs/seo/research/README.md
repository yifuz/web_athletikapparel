# SEO 搜索语言与关键词研究索引

> 状态：V1 英语研究已完成并冻结；V2 按授权补充有界研究，页面改动另按 Backlog 与变更流程审批
>
> 数据日期：V1 主要为 2026-08-15 至 2026-08-17；最新 V2 结构词与六品类第二轮研究为 2026-10-27

本目录保留研究链路和原始数据。日常决策先读本页和 [`../v2-backlog.md`](../v2-backlog.md)，只有需要复核来源时再进入明细文件。

## 1. 已合并的核心结论

- 当前采用一个英文规范站，英语基线覆盖美国、加拿大、英国、荷兰、瑞典、挪威和芬兰；这不等于已经验证当地语言页面需求。
- 商业搜索以“产品 / 材料 / 工艺 + manufacturer / OEM / supplier”为主，但必须排除消费品、招聘、教程、Marketplace 和低 MOQ 错配意图。
- `/sportswear-manufacturer/` 继续承接 Sportswear / Activewear 制造商采购意图，不创建 Activewear 或 Fitness 平行页。
- `/knitted-fabrics-manufacturer/` 继续以 `knitted fabric manufacturer` 为主词；`performance knit fabric` 和 `sportswear fabric manufacturer` 作为同页次级语境。
- `performance fabrics` 搜索量较高但意图混杂，不进入现有面料页 URL、Title 或 H1，也不自动批准新指南。
- Tech Pack、Garment QC、OEM Evaluation 和 FLATLOCK / OVERLOCK 属于独立信息任务，由现有四篇 Technical Guides 承接。
- 当前没有足够一方数据支持批量改 Title / Meta、建立当地语言页面或扩建近义 URL。

## 2. 推荐读取路径

| 目的 | 文件 |
|---|---|
| 查看六个商业品类的第二轮 US / GB / CA 需求筛选、分层深度快照、现页覆盖对照与自有站区分（不改页） | [`serp-commercial-round2-us-gb-ca-2026-10-27.md`](serp-commercial-round2-us-gb-ca-2026-10-27.md) |
| 查看 2026-10-27 结构词 depth 50 扩充与材料组合词三市场结果、4 个不可得单元、当前十倍金额限额 | [`knit-structure-serp-expanded-2026-10-27.md`](knit-structure-serp-expanded-2026-10-27.md) |
| 查看 2026-10-27 single jersey / interlock / rib / jacquard 四组结构词 US / GB / CA 快照、采购意图与样布准备建议（不改页） | [`knit-structure-serp-us-gb-ca-2026-10-27.md`](knit-structure-serp-us-gb-ca-2026-10-27.md) |
| 查看 2026-09-01 FLATLOCK Guide US / GB / CA 查询意图观测（后续内容归 GEO） | [`serp-flatlock-guide-us-gb-ca-2026-09-01.md`](serp-flatlock-guide-us-gb-ca-2026-09-01.md) |
| 查看 2026-08-31 US / GB / CA 产品型商业查询刷新 | [`serp-product-intent-refresh-2026-08-31.md`](serp-product-intent-refresh-2026-08-31.md) |
| 理解北美与欧洲买家任务和搜索语言 | [`seo-search-language-research-v1.md`](seo-search-language-research-v1.md) |
| 查看首轮候选词和实时 SERP 风险 | [`keyword-validation-v1.md`](keyword-validation-v1.md) |
| 查看七国首轮历史量 | [`keyword-planner-country-validation-v1.md`](keyword-planner-country-validation-v1.md) |
| 查看 28 个代表词的 24 个月英语基线 | [`keyword-planner-english-baseline-v2.md`](keyword-planner-english-baseline-v2.md) |
| 查看 US / CA / UK SERP 意图样本 | [`serp-intent-validation-us-ca-uk-v1.md`](serp-intent-validation-us-ca-uk-v1.md) |
| 查看最终词簇与页面所有权 | [`keyword-page-mapping-v1.md`](keyword-page-mapping-v1.md) |

三轮美国自然变体发现分别保存在：

- [`keyword-discovery-commercial-us-v1.md`](keyword-discovery-commercial-us-v1.md)；
- [`keyword-discovery-product-material-us-v1.md`](keyword-discovery-product-material-us-v1.md)；
- [`keyword-discovery-procurement-info-us-v1.md`](keyword-discovery-procurement-info-us-v1.md)。

## 3. 原始与归一化数据

[`data/`](data/) 保存 Keyword Planner 输入、七国矩阵、三批美国发现结果和机会主表。CSV 是历史证据，不直接代表当前搜索表现；Google Ads Competition 和出价不等于自然搜索难度。

2026-10-27 [结构词归一化 CSV](data/knit-structure-serp-us-gb-ca-2026-10-27.csv) 保存四词 × 三市场的 112 个自然结果行（102 个唯一 URL）。配置 depth 10，实际每单元 8～10 行；页面角色多数为 title / snippet 初分，官网复核等级单列，不当作搜索量、完整 Top 10 或当前长期排名。

同日[扩充结果 CSV](data/knit-structure-serp-expanded-us-gb-ca-2026-10-27.csv)另保留 595 行 / 439 唯一 URL：结构词 depth 50 与材料组合词 depth 10 各 10/12 单元成功，失败留空，不用浅层结果冒充深层恢复；深层清单不是逐页内容审计。[73 条 Finding](data/knit-structure-serp-expanded-findings-2026-10-27.csv)全部按描述性观察处置，单元内分页重复不去重后重编号。

六品类第二轮的[结果](data/serp-commercial-round2-2026-10-27-results.csv)、[逐次 coverage](data/serp-commercial-round2-2026-10-27-coverage.csv)和[Finding 处置](data/serp-commercial-round2-2026-10-27-findings.csv)另行保留，不与面料结构词合并为单一排名历史。研究对照六页生产正文：优先评估 Yoga 产品级说明及 balaclava / neck gaiter 的呈现，其他已有内容不重复报缺口。PowerMerino 已由所有者确认控制，不计独立竞争对手或第三方背书；本次不互链、合并或改站。

## 4. 重开条件

只有出现以下任一条件，才进入新一轮研究：

- 某页面达到流程规定的 GSC 页面/查询样本门槛；
- 新询盘反复使用当前映射未覆盖的采购语言；
- 美国、加拿大或具体欧洲市场的第一页 SERP 显示独立页面任务；
- 所有者批准新的产品、能力或当地语言市场；
- 现有两个页面出现同一查询的稳定重叠，需要检查 cannibalisation。
