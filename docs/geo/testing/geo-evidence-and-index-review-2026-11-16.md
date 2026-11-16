# GEO 新资产证据与指南索引复核

日期：2026-11-16（Asia/Shanghai）。本次延续既有 GEO 项目，完成 C06 / C08 只读 URL Inspection 和近期面料、产品资产的定向证据核对；不是完整站点审计，也没有运行新的 AI 回答采样。

## C06 / C08：Search Console 索引快照

使用 `seo` CLI 0.2.36 的 URL Inspection API 查询 `sc-domain:athletikapparel.com`，未提交索引请求。状态是 Google 返回的索引版本快照，不是当日实时测试。

| 固定题与页面 | 索引状态 | Google 最后报告抓取时间 | 与已上线内容的关系 |
|---|---|---|---|
| [C06 Tech Pack](https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/) | `PASS / Submitted and indexed` | 2026-10-16 13:23:03 UTC（北京时间 10-16 21:23:03） | 早于 10-29 示范内容生产验收；尚无更新后抓取证据。已收录不等于新版已抓取。 |
| [C08 OEM Evaluation](https://www.athletikapparel.com/evaluate-technical-knitwear-oem/) | `PASS / Submitted and indexed` | 2026-11-11 20:18:53 UTC（北京时间 11-12 04:18:53） | 晚于 10-30 增补生产验收。Inspection 未提供 Google 存储正文，不能据此声称逐字核验了新版。 |

两页本次均返回 `robotsTxtState=ALLOWED`、`indexingState=INDEXING_ALLOWED`、`pageFetchState=SUCCESSFUL`、`crawledAs=MOBILE`，Google / User Canonical 均为对应规范 URL。与 [10-30 快照](c06-c08-crawl-status-2026-10-30.md)比较，C08 从 `Crawled - currently not indexed` 变为 `Submitted and indexed`；C06 仍已收录，最后报告抓取时间未变。所有者此前确认已申请 C08 索引；不推断此次状态变化的具体原因。

## 近期第一方资产能支持哪些采购问题

本次正式网址 HTTP GET：面料页与下列两款产品页均为 200，canonical 均指向各自规范网址。11-13 [面料库生产验收](../../site/fabric-library-expansion-2026-11-10.md#6-2026-11-10-生产发布缓存验收未完成)及 [Outdoor 发布验收](../../site/product-showcase-outdoor-release-2026-11-13.md)提供既有实施与审核背景。

| 资产与事实 | 可支持的固定问题方向 | 边界 |
|---|---|---|
| [Knitted Fabrics 面料库](https://www.athletikapparel.com/knitted-fabrics-manufacturer/#merino-fabric-examples)：97 个参考料号、成分及 GSM，注明为代表性选样 | E02 对面料供应能力的理解；D04 / BD 的生产商筛选可参考材料开发范围 | 这是第一方规格参考，不是实时库存、完整面料范围、实测性能或独立背书。 |
| [男款半拉链摇粒绒上衣](https://www.athletikapparel.com/product-showcase/mens-half-zip-fleece-top/)：页面与面料库均有 HY254900，250 GSM，100% Polyester fleece | D04 / BD 的成衣与材料例子；帮助买家理解已有产品方向 | 只能支持对应产品和已公开规格，不扩写为接缝性能或实际客户订单。 |
| [男款半拉链上衣及紧身裤](https://www.athletikapparel.com/product-showcase/mens-half-zip-top-and-tights/)：HY265048、180 GSM、86% Graphene Polyester / 14% Elastane | D04 / BD 的成衣与材料例子 | 根据[制作记录](../../site/product-showcase-half-zip-set-2026-11-13.md)，画面为 Omni 成片；不能把生成画面当作实拍、实测性能或工艺测试证据，不推断石墨烯添加量。HY265048 本次未在面料页初始 HTML 定位，不能据此认定公司没有该面料。 |
| [买家公开名单](buyer-disclosures-2026-11-02.md)：Canadian Tire 与 Sainsbury's 的日期化中国实体列名 | D04 / BD 的独立来源核验 | 只证明名单列名范围，不自动证明当前订单、直接合同、工艺或质量背书。 |
| [C07 接缝素材盘点](valid-retest/batch-d-2026-10-29/c06-c07-evidence-inventory-2026-10-29.md) | C07 的 FLATLOCK / OVERLOCK 结构解释 | 现有两个视频使用不同面料与成衣；同面料正反面实物样本是否存在及可公开仍未确认。Google AI Mode 10-29 曾实际引用官网 C07 指南，不能称从未被引用。 |

## 初始 HTML 定向检查

11-16 对面料页分别以 `Mozilla/5.0`、`Googlebot`、`OAI-SearchBot`、`PerplexityBot` 访问：四次均 HTTP 200，初始 HTML 各有 97 个 `fabric-hy...` 料号锚点、`Fabric selection library` 和 `HY254900`，robots meta 为 `follow, index`。这只能说明本次模拟请求的初始 HTML 包含这些内容，不能证明真实爬虫已访问、已完整索引或 AI 会引用。产品页本次普通访问亦分别可见对应料号。

面料库源码服务端输出所有记录，JS 用于筛选分页；近期型号 HY254900 未在面料页 HTML 中出现到其产品页的直接链接。此前所有者明确要求移除 `View garment example`，不能把恢复卡片链接列为默认修复。面料与产品可作为互补证据，但不因一次核对就改动新上线页面或重开已决设计。

## 判断与下一步

- **本次最有价值的新结果：** C08 已收录且报告了增补后的抓取，C06 尚缺示范更新后的抓取证据；均无足够证据断言最终 AI 引用效果。
- **下一项优先工作：** 已完成 [Dot 隔离复测任务包](valid-retest/dot-chatgpt-search-brief-2026-11-16.md)，待在云电脑执行：比较 D04 和 BD-02 的实际回答与引用，并用 C08 观察指南的来源选择。沿用历史样本各自环境与有效性，不混成统一推荐率，也不以单次变化归因于某个页面更新。
- **C07：** 在确认同面料 FLATLOCK / OVERLOCK 的可公开正反面样本前，不把现有不同面料视频当作同条件比较；不为这个缺口阻止其他 GEO 工作。
- **暂缓事项：** 按所有者决定，本轮不增加 Bing AI Performance 工作。LinkedIn 10-30 帖的后台指标与实际 URL 仍以可获得证据为准，不推断为零。

本次没有改动生产、社交账号、用户浏览器、面料库设计、索引请求或固定 Prompt。没有把 HTTP 200、已收录或官方自述解释为 AI 推荐。
