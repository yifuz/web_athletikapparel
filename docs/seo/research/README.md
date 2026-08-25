# SEO 搜索语言与关键词研究索引

> 状态：V1 英语研究已完成；当前页面决策已进入生产与监测
>
> 数据日期：主要为 2026-08-15 至 2026-08-17

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

## 4. 重开条件

只有出现以下任一条件，才进入新一轮研究：

- 某页面达到流程规定的 GSC 页面/查询样本门槛；
- 新询盘反复使用当前映射未覆盖的采购语言；
- 美国、加拿大或具体欧洲市场的第一页 SERP 显示独立页面任务；
- 所有者批准新的产品、能力或当地语言市场；
- 现有两个页面出现同一查询的稳定重叠，需要检查 cannibalisation。
