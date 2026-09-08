# PCD-007 Outdoor Clothing 采购决策审计

- Change ID：`PCD-007`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进候选
- 优先级：P1
- 状态：`audit-complete / needs-owner-input`
- 审计日期：2026-09-08
- 目标页面：`/outdoor-clothing-manufacturer/`
- 目标市场：美国、英国、加拿大
- 主要官网任务：`Discover / Qualify / Verify / Start`
- 当前 Finding outcome：`deferred / owner-capability-input`

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

## 需要所有者确认的一方能力

实施前需要确认：

1. 可稳定生产的准确 Outdoor 产品范围，尤其是 base-layer tops/bottoms、thermal underwear、fleece tops/hoodies、mid-layers、jackets、softshell/hardshell、waterproof or seam-taped outerwear、hiking pants，以及 balaclavas / neck warmers / beanies；
2. 买家可指定的材料和结构，例如 composition、GSM、single jersey、interlock、rib、fleece / brushed-back / grid structures、stretch/recovery、lamination or membrane、DWR 及 insulation；
3. 可稳定提供的工艺与 customization，例如 FLATLOCK、ACTIVESEAM、COVERSTITCH、OVERLOCK、seamless、bonded-welded、taped seams、zippers、thumbholes、pockets、reinforced panels、printing、branding、labels 与 packaging；
4. in-house 与第三方 testing 的真实边界，尤其是 colorfastness、shrinkage、pilling、GSM、fiber composition、stretch/recovery，以及 abrasion、thermal、moisture management、hydrostatic head / MVTR 是否可做、由谁做、是否必须客户指定标准。

在上述输入完成前，不实施正文，不修改 URL、Title、Meta、H1、Schema 或图片，也不把 PCD-007 加入 SEO V2 Backlog。
