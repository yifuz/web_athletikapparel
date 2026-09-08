# PCD-007 Outdoor Clothing 采购决策审计

- Change ID：`PCD-007`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进候选
- 优先级：P1
- 状态：`deployed / measuring`
- 审计日期：2026-09-08
- 目标页面：`/outdoor-clothing-manufacturer/`
- 目标市场：美国、英国、加拿大
- 主要官网任务：`Discover / Qualify / Verify / Start`
- 当前 Finding outcome：`changed / measuring`

## 数据与技术状态

- 生产单页审计为 targeted coverage；HTTP 200、`follow, index`、无重定向、自引用 Canonical、单一 `Outdoor Clothing Manufacturer` H1、Viewport 与 1 个 JSON-LD block 均正常，0 technical issue；
- URL Inspection 为 `PASS / Submitted and indexed`，`INDEXING_ALLOWED / ALLOWED / SUCCESSFUL`；Google Canonical 与用户 Canonical 一致，最后抓取时间为 `2026-09-03T20:21:04Z`；
- GSC final 28 天窗口为 2026-08-07 至 09-03；页面级数据为 0 clicks / 25 impressions / 0% CTR / average position 22.64；
- 同窗口精确 URL 没有返回可见 Query × Page 行，数据状态为 `empty`。这只表示没有保留的可见 Query 行，不等于页面零曝光；25 次页面级曝光与 0 个可见 Query 行的差异符合低量查询匿名化；
- 页面当前约 286 words，6 张图片 alt 完整，Title、Meta、OG/Twitter 与 Schema 主图已正常输出。Page Sitemap 与首页/导航均提供可抓取入口；
- 本次没有达到 100 impressions 的 Title / Meta 实验门槛，不以 CTR 或平均排名触发元数据修改。

## SERP 意图

2026-09-08 使用 DataForSEO 完成 10 次 Google Desktop Top 20 Live SERP：

1. `outdoor apparel manufacturer`：US / GB / CA；
2. `outdoor clothing manufacturer`：US / GB / CA；
3. US 辅助边界词：`technical outdoor apparel manufacturer`、`outdoor base layer manufacturer`、`thermal base layer manufacturer`、`outdoor mid layer manufacturer`。

10 次快照均为 `complete`、无 provider warning，总成本 USD 0.040；Athletik 未进入任何一次 retained Top 20。单次快照不是排名历史，也不证明页面质量或排名可行性。

核心两组词在三国都是混合意图：真实 OEM/ODM manufacturer 与品牌、零售商、目录、媒体、社区、视频及部分 local pack 同时出现；六次核心查询均出现 AI Overview。`outdoor apparel manufacturer` 的顶部结果更稳定包含 B2B 工厂页面，`outdoor clothing manufacturer` 更容易混入本地品牌、零售和宽泛 outerwear 供应商。代表性制造商结果包括 Sansansun、Spectre、Royal APAC、Bridge & Stitch 与 Direct Alpine。

辅助词说明页面边界：

- `outdoor base layer manufacturer` 与 `thermal base layer manufacturer` 仍含明确 B2B 制造结果，但同时有大量消费者评测、品牌和零售结果；它们适合作为 Outdoor 的支持意图，不足以推翻 Underwear / Merino 对一般 base layer 需求的既有页面所有权；
- `outdoor mid layer manufacturer` 的 US Top 20 几乎由评测、品牌、零售和教育内容构成，不适合作为当前页面主词；
- `technical outdoor apparel manufacturer` 仍是混合但具有 OEM 采购意图，同时广泛覆盖 base layers、jackets、pants、waterproof shells、UPF、insulation 与测试，因此必须先确认 Athletik 的真实产品边界，不能直接照搬 SERP 产品范围。

参考页面：

- Sansansun Outdoor Apparel：<https://sansansports.com/product-category/outdoor-apparel/>
- Spectre Outdoor Clothing：<https://spectre.dk/outdoor-clothing-manufacturer/>
- Royal APAC Outdoor Clothing：<https://royalapac.com/outdoor-clothing/>
- Thygesen Base Layers：<https://thygesenapparel.com/custom-workwear-manufacturing/custom-base-layers-manufacturing>

## Findings

### PCD-007-A：页面名称宽于当前可见产品证据

- 类型：`review`
- 严重度：Info
- 业务优先级：P1
- 置信度：Probable
- 观察：Title/H1 使用宽泛的 `Outdoor Clothing Manufacturer`，Meta 还包含 `outerwear`；正文主要展示 knitted base layers、mid-layers、thermal knits、Merino blends、Genesis fleece tops/hoodies，没有明确展示 waterproof shells、seam-taped jackets、woven hiking pants 或其他广义 outerwear。
- 推断：若 Athletik 实际只稳定生产针织贴身层和保暖中间层，当前定位容易让采购者误以为可承接完整 woven / waterproof outerwear；若这些产品确实可生产，则页面缺少相应一方证据。
- 证伪条件：所有者确认并能以真实产品/流程证明广义 outerwear 范围，或确认页面应明确限定 technical knit outdoor layering。
- 最小动作：先确认产品边界；本轮不改 URL。Title / Meta 仍受 100 impressions 门槛控制。
- 允许 outcome：`changed`、`no-change`、`deferred`。

### PCD-007-B：采购决策信息不足

- 类型：`review`
- 严重度：Info
- 业务优先级：P1
- 置信度：Confirmed
- 观察：页面有产品范围、FLATLOCK / ACTIVESEAM、MOQ、sampling 与 Services 入口，但没有集中回答买家应提供哪些 product / climate / activity / material / GSM / construction / testing 输入，也没有 customization、QC checkpoints、Buyer Questions 或从 brief 到 delivery 的页面内流程。
- 推断：页面能完成基础 Discover，但对 `Qualify / Verify / Start` 支持弱于已升级的 Sportswear、Underwear 和 Merino 页面。
- 证伪条件：真实买家不需要这些字段，或相关信息已在当前页面可见且审计提取遗漏；当前生产 HTML 不支持后一种情况。
- 最小动作：在能力事实确认后，以一个 capability-and-procurement cluster 增强现有页面，不创建 Outdoor Apparel / Base Layer 平行页。
- 允许 outcome：`changed`、`no-change`、`deferred`。

### PCD-007-C：部分性能文案缺少项目条件边界

- 类型：`review`
- 严重度：Warning
- 业务优先级：P1
- 置信度：Confirmed
- 观察：当前页面使用 `conditions sportswear was never meant to handle`、`durable, abrasion-resistant knits built for repeated days on trail`、`regulate temperature`、`trap warmth and move moisture`、`the durability a hiker needs under a pack strap` 等无项目条件表达。
- 推断：这些句子容易被理解为所有相关面料或成衣均已达到固定 outdoor performance 结果，而页面没有对应 test method、acceptance criteria 或 approved specification 边界。
- 证伪条件：所有者提供可公开适用于全部相关产品的固定测试结果及范围；在此之前按项目表达更准确。
- 最小动作：实施时把性能结果绑定 buyer specification、实际面料/成衣样品、agreed test method 与 acceptance criteria；删除泛化比较句，不虚构测试数值。
- 验证：生产正文检查、术语检查、所有者英文审核。
- 允许 outcome：`changed`、`no-change`、`deferred`。

### PCD-007-D：缺少现有技术指南的采购上下文入口

- 类型：`review`
- 严重度：Info
- 业务优先级：P2
- 置信度：Confirmed
- 观察：当前 Related 只链接 Sportswear、Merino Wool 与 Services，没有 Tech Pack Guide、QC Guide 或 FLATLOCK Guide。
- 最小动作：仅在相应正文能够解释链接用途时增加上下文内链，不机械增加链接数量。
- 允许 outcome：`changed`、`no-change`、`deferred`。

## 所有者确认的一方能力

所有者于 2026-09-08 确认：

1. 审计列出的 Outdoor 产品均可稳定生产，包括 base-layer tops/bottoms、thermal underwear、fleece tops/hoodies、mid-layers、jackets、softshell/hardshell、waterproof or seam-taped outerwear、hiking pants，以及 balaclavas / neck warmers / beanies；
2. 买家可以指定 composition、GSM、single jersey、interlock、rib、fleece / brushed-back / grid structures、stretch/recovery、lamination or membrane、DWR 与 insulation；但 Athletik 的制造范围限于针织和 knit-based 结构，非针织面料结构无法承接；
3. 审计列出的 FLATLOCK、ACTIVESEAM、COVERSTITCH、OVERLOCK、seamless、bonded-welded、taped seams、zippers、thumbholes、pockets、reinforced panels、printing、branding、labels 与 packaging 均可提供；
4. colorfastness、shrinkage、pilling、GSM、fiber composition、stretch/recovery、abrasion、thermal、moisture management、hydrostatic head 与 MVTR 均可提供测试；需要独立第三方测试时，由客户指定要求。

## 本地实施

2026-09-08 在 `inc/product-category-data.php` 完成以下受控修改：

- 重写 Hero intro 与 4 个既有产品说明，把性能结果绑定 intended use、approved specification、agreed test method 与 acceptance criteria，移除无条件的对比和性能承诺；
- 将 Development inputs 扩展到 activity / climate、composition、GSM、knit structure、stretch/recovery、weather protection、construction、testing、quantity 与 tech pack / reference sample，并明确非针织面料结构不属于本页生产范围；
- 新增 2 张 Outdoor customization / quality control 执行卡，覆盖已确认的产品、工艺、配件、测试与第三方测试边界；
- 新增 4 个折叠 Buyer Questions，回答 MOQ、sampling inputs、knit-based jackets / hiking pants / waterproof styles 与性能验证；
- 以 5 阶段采购流程替换 Outdoor 的通用三卡规格条，从 Project Brief & Quotation 到 Export & Delivery；
- 增加 FLATLOCK、Tech Pack 与 QC 三条上下文技术指南内链；
- 保留 URL、Title、Meta、H1、Schema 类型、图片和 4 个既有产品卡结构，不创建 Outdoor Apparel、Base Layer 或其他平行 URL。

本地验收：PHP 8.2.30 语法通过；数据层仍为 7 个品类，Outdoor 输出 4 个既有产品卡、2 张执行卡、4 个 Buyer Questions、5 个采购步骤和 6 条 Related 链接；`git diff --check` 通过。LocalWP 未监听 80/443，因此浏览器级渲染与生产 HTTP、Canonical、H1、Schema、响应式布局验收留到部署后 Day 0。

## Day 0 生产验收

所有者于 2026-09-08 确认部署。生产验收采用 targeted coverage，结果如下：

- 页面 HTTP 200、无重定向、`index`、自引用 Canonical、单一 H1；Title、Meta、H1、OG/Twitter 与 JSON-LD 类型保持不变，1 个 JSON-LD block 可解析且无 invalid JSON-LD；
- 新 intro、4 个条件化产品说明、Development inputs、2 张执行卡、4 个折叠 Buyer Questions、5 个采购步骤和 6 条 Related 链接均由服务器端 HTML 输出；页面正文提取从审计前约 286 words 增至约 904 words；
- QC Guide、Tech Pack Guide、FLATLOCK Guide 与 Services 四个目标 URL 均返回 HTTP 200；Page Sitemap 与首页继续提供 Outdoor 的可抓取入口；
- 7/7 品类页均返回 HTTP 200 并保持单一 H1；Outdoor 专属范围、问答和流程标记只在目标页出现，没有泄漏到其他六页；
- 页面解析出的 34 个 CSS、JS、字体和图片资源中，33 个返回 HTTP 200；唯一 404 是 Cloudflare 注入的 `/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js`。同一控制台 404 与 Turnstile `async/defer` 提示也出现在未改动的 Merino 控制页，判定为既有全站脚本问题，不是 PCD-007 回归，也不阻止本次验收；
- 1440 × 900 与 390 × 844 浏览器检查通过。移动端 `innerWidth / clientWidth / document scrollWidth / body scrollWidth` 均为 390，0 个真实越界元素；桌面端 document/body scrollWidth 均为 1440。2 张执行卡、4 个问答和 5 个采购步骤均正常布局，问答可展开并显示答案；
- URL Inspection 数据状态 `complete`，1/1 inspected、0 failed、0 issue、0 regression；结果仍为 `PASS / Submitted and indexed`，Canonical 一致，最后抓取时间 `2026-09-03T20:21:04Z`。该索引快照早于本次部署，只证明既有索引状态，不证明 Google 已抓取新正文。

验收结论：`changed / measuring`。以 2026-09-08 为观察起点，Day 7 / 28 / 90 分别为 2026-09-15、2026-10-06、2026-12-07；在数据门槛或明确范围问题出现前，不修改 URL、Title、Meta、H1 或页面所有权，也不把本项加入 SEO V2 Backlog。
