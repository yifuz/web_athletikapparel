# SEO Change Card：SEO-V2-015 首页定位语义纠偏

- Change ID：`SEO-V2-015`
- Finding type：`fix`
- 优先级：P1
- 状态：`planned`
- 实施阶段：`implemented / pending-deployment`
- 实施日期：2026-08-31
- 目标页面：`/`
- 目标市场：美国、英国、加拿大，并覆盖北美与欧洲英语 B2B 买家
- 买家任务：寻找可生产 underwear、base layers、sportswear 与 yoga apparel 的 OEM/ODM performance apparel manufacturer
- 业务动作：进入对应品类页或提交符合 MOQ 的询盘
- 唯一主要变量：首页 umbrella terminology，由 `Technical/Performance Knitwear Manufacturer` 调整为 `Performance Apparel Manufacturer`
- 业务假设：更贴近 performance garment 采购语言的首页定位会减少 flat-knit / sweater 语义偏移，并提高目标非品牌曝光与合格买家匹配度
- 主要指标：首页目标非品牌 Clicks / Impressions、Query 组合、Average Position、Organic Search sessions 与人工核验有效询盘
- 防护指标：品牌 Query、首页索引状态、低 MOQ / 消费者询盘比例、状态码、Canonical 和 Crawl Finding
- 不变项：URL、Canonical、页面所有权、品类页、技术指南、导航、CTA、图片、Schema 类型和站点信息架构
- 允许 outcome：`fixed / keep`、`iterate`、`revert`

## 触发证据与数据状态

- 所有者确认 Athletik 的核心成衣业务为使用针织面料生产 underwear、base layers、sportswear 与 yoga apparel，不是 flat-knit sweater、fully fashioned 或 WHOLEGARMENT 制造；
- 所有者提供的 Google 搜索截图显示 `Technical Knitwear` 被解释为电脑横机、3D flat-knit、warp-knit 与 sweater 语境；
- 2026-08-31 DataForSEO Google Desktop Live SERP 显示，US / GB / CA 的 `technical knitwear manufacturer` 结果均由 flat-knit、sweater、technical knitting 或 fabric 意图主导；`performance apparel manufacturer` 更稳定地返回 activewear、sportswear、fitness、compression 和 performance garment manufacturers；
- `performance knit apparel manufacturer` 与 `knit apparel manufacturer` 仍偏向 fabric / textile mills 或 sweater / flat-knit；`cut and sew performance apparel manufacturer` 会稀释到通用 startup / low-MOQ 制造意图，因此 `Cut-and-Sew` 不作为首页主定位；
- DataForSEO Keyword Metrics 在本轮未返回可用搜索量，状态为 `unavailable`，不是零搜索量。本次决策依赖业务匹配和跨市场 SERP，不声明搜索量收益；
- 生产前首页为 HTTP 200、`index, follow`、自引用 Canonical；Title 为 `Technical Knitwear Manufacturer | Athletik Clothing`，Meta 仍以 `FLATLOCK & ACTIVESEAM knitwear` 为主，页面 H1 为 `Performance Knitwear Manufacturer`；最新冻结 Crawl 为 `crawl_40f88b6c25d74ba79ee193c7be26caf9`，20 页、0 fetch failure，无状态码或 indexability 回归。

## 基线与干扰因素

- 基线窗口：2026-07-26 至 2026-08-22，是当时 GSC 可返回 `dataState: final` 的最新完整 28 天窗口；
- GSC Property 总量为 5 clicks / 184 impressions；首页可见 Query 只有三个品牌或拼写变体、各 1 impression，低量匿名化 Query 未返回，因此没有可支持首页词级因果判断的完整 Query 样本；
- GA4 Organic Search 的首页为 2 sessions / 2 users / 0 `generate_lead`；同窗口 8 次全站 `generate_lead` 经所有者核验后只有 1 次有效询盘，来源为 Organic Social，不归因于 SEO；
- 部署前 Crawl ID：`crawl_40f88b6c25d74ba79ee193c7be26caf9`；部署后 Crawl ID：`pending`；
- 已知干扰因素：Google 算法更新、季节性、GEO / 社交分发、广告、其他站点部署、GSC 低量匿名化与 GA4 consent / attribution 口径。

## 实施内容

| 字段 | 部署前 | 本次值 |
|---|---|---|
| SEO Title | `Technical Knitwear Manufacturer \| Athletik Clothing` | `Performance Apparel Manufacturer \| Athletik Clothing` |
| Hero eyebrow | `Technical knitwear OEM/ODM partner` | `Performance apparel OEM/ODM partner` |
| H1 | `Performance Knitwear Manufacturer` | `Performance Apparel Manufacturer` |
| Hero subhead | 以 `performance knitwear programs` 概括 | 明确 knitted fabric development、underwear、base layer、sportswear、yoga apparel、FLATLOCK 与 ACTIVESEAM |
| Meta Description | 以 `FLATLOCK & ACTIVESEAM knitwear` 为主 | 以 `Performance apparel manufacturer` 开头，并明确目标品类与技术能力 |
| Social / Schema | 首页社交标题跟随旧 Title；描述依赖插件回退 | OG/Twitter Title 与 Description、WebPage `name` 与 `description` 统一使用新规范值 |
| Sitemap lastmod | 首页主题渲染基线为 2026-08-11 | 更新为本次首页实质变更时间 |

规范 Title、Meta、H1 与已批准首页记录同步更新至 `seo-tags.md`、`docs/sitemap.md` 和 `homepage-copy.md`。主题通过共享函数集中返回首页 Title 与 Meta，Rank Math 数据库 Title 在 `init` 时仅在不一致时同步；首页 Rank Math Description 继续保持为空，避免重复 `<meta name="description">`。

## 预期收益、风险与防护

- 预期收益：减少首页被归入 flat-knit / sweater / technical knitting 结果集的语义风险，更直接承接 performance garment OEM/ODM 买家；
- 主要风险：`performance apparel manufacturer` 竞争更广，短期排名和 CTR 可能波动；Title、H1、Meta 同时调整后，不能把单一短期变化归因到某一个字段；
- 防护指标：品牌查询、首页点击/曝光、目标非品牌 Query、首页平均排名、有效 B2B 询盘、低 MOQ / 消费者询盘比例；
- 防护边界：不新建 Activewear/Fitness/Performance Fabrics 近义页，不更改任何已收录 URL，不机械替换技术指南中已经明确定义的 `technical knitwear`；
- 回滚条件：完整观察窗口出现与本次时间一致的首页目标非品牌曝光持续下降，且无抓取、索引、季节性或其他发布因素可以解释；回滚只恢复首页字段，不改 URL。

## 验收标准

### 本地 / 部署前

- [x] PHP 8.2.30 对 `functions.php`、`rank-math.php` 和 `template-parts/home/hero.php` 语法检查通过；
- [x] Hero 模板桩渲染只有一个 H1，且为 `Performance Apparel Manufacturer`；
- [x] Title、Meta、Hero、OG/Twitter 和 WebPage Schema 的规范值静态一致性检查通过；
- [x] Title 52 characters、Meta 150 characters；长度仅作软检查，文案自然且无关键词堆砌；
- [x] 无未解决占位符、虚构认证、产能、客户或法律关系；
- [x] Git diff 只包含 SEO-V2-015 相关代码和控制文档。

本地 WordPress URL 在验收时未响应，因此完整 WordPress + Rank Math 集成 HTML、Schema 和 Sitemap 输出保留到 Day 0 生产验收；这项 unavailable 不替代上述源码与模板桩检查，也不写成生产通过。

### 生产 / 部署后

- [ ] `/` 返回 HTTP 200、`index, follow`、自引用 Canonical；
- [ ] 生产 HTML 只有一个 H1，并输出新 Title 与唯一 Meta Description；
- [ ] OG/Twitter Title 与 Description、WebPage `name` 与 `description` 与规范值一致；
- [ ] Page Sitemap 首页 `lastmod` 与 Sitemap index 时间不早于本次部署；
- [ ] 重跑生产 Crawl，确认无 fetch failure、状态码或 indexability 回归；
- [ ] 最终 Finding outcome 写回本卡与 V2 Backlog。

## 复盘窗口

- Day 0：完成生产 HTML、Schema、Sitemap 与 Crawl 验收；
- Day 7：只检查抓取、索引、Title 采用情况和明显技术回归，不因小样本回滚；
- Day 28：比较同口径 GSC Query/Page/Country、GA4 Organic Search 与人工核验有效询盘；
- Day 90：在跨季节与其他发布因素记录完整时，决定 `keep`、`iterate` 或 `revert`。
