# PCD-008 Silk Wear 采购决策内容

- Change ID：`PCD-008`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`local-validated / owner-review`
- 审计与实施日期：2026-09-09
- 目标页面：`/silk-wear-manufacturer/`
- 目标市场：美国、英国、加拿大
- 主要官网任务：`Discover / Qualify / Verify / Start`
- 当前 Finding outcome：`changed / owner-review`

## 搜索意图与证据

- 规范页面负责 Silk Wear 的 B2B OEM/ODM 采购意图，当前 URL、Title、H1 与页面所有权保持不变；
- 最近一份已确认的 GSC 页面快照为 1 click / 25 impressions / average position 19.24。当前刷新因 SEO CLI `fetch failed` 不可用，因此不把旧快照当作 2026-09-09 实时数据，也不以低样本触发 Title / Meta 实验；
- 2026-09-09 英文公开 SERP 抽样显示，`silk clothing manufacturer`、`custom silk clothing` 与 `silk underwear manufacturer` 具有 OEM/ODM 采购意图，但宽泛结果大量覆盖 woven silk、sleepwear、robes、dresses、bedding 与 accessories；`knitted silk`、base layer 和 underwear 是 Athletik 更具体的差异化范围；
- 生产页定向检查通过：HTTP 200、`index`、自引用 Canonical、单一 H1、Page Sitemap 收录，现有询盘表单和三张响应式产品图正常；
- 审计前页面能完成基础 Discover，但缺少集中呈现的规格输入、customization、QC/testing、Buyer Questions、五阶段采购流程和技术指南上下文入口。

代表性公开 SERP 页面：

- Silkua：<https://www.silkua.com/reliable-oem-silk-clothing-manufacturer-in-china/>
- DreamSilk：<https://dreamsilken.com/custom-silk-clothing>
- SinYoo Silk：<https://sinyoosilk.com/silk-garment/>

## 所有者确认的一方能力

所有者于 2026-09-09 确认：

1. 审计列出的 knitted silk 产品均可生产，包括 base-layer tops/bottoms、underwear、T-shirts、camisoles、leggings、long underwear 与 lightweight apparel；
2. woven silk 产品可以按项目提供支持；公开文案只使用 `support`，不延伸声明生产责任或自有梭织设施；
3. 买家可以指定 composition、yarn、GSM、knit or woven construction、color、finish 与其他产品规格；
4. FLATLOCK、ACTIVESEAM、printing、trims、labels、branding、private-label packaging 与 care information 可以稳定提供；
5. fiber composition、GSM、colorfastness、shrinkage、pilling、stretch/recovery、snagging、seam slippage、seam appearance、measurements 与 workmanship 可以按适用范围测试；需要独立第三方测试时由客户指定。

## 唯一主要变量

只增强 Silk Wear 页面采购决策完整性：产品范围、开发输入、customization、quality checkpoints、Buyer Questions、采购流程和相关技术指南内链。保留 URL、Title、Meta、H1、Schema 类型、社交图与现有图片文件不变，不创建 `Silk Clothing`、`Silk Underwear` 或 woven silk 平行页。

## 本地实施

在 `inc/product-category-data.php` 的 Silk Wear 独立数据块中：

- 扩展已确认的 knitted silk 产品范围，并以 `supported by project` 表述 woven silk；
- 删除 `lighter than any other fiber`、`no synthetic fiber can replicate` 与固定低价暗示等绝对化表达；
- 增加 composition、yarn、GSM、construction、fit、care、testing、quantity、timeline 与 delivery destination 等 Development inputs；
- 增加 2 张 customization / quality checkpoints 执行卡；
- 增加 4 个折叠 Buyer Questions；
- 以从 Project Brief & Quotation 到 Export & Delivery 的 5 阶段采购流程替换通用三卡规格条；
- 增加 FLATLOCK、Tech Pack 与 QC Guide 三条上下文内链；
- 未增加或替换图片，uploads 无部署变更。

## 风险与验收标准

主要风险：把 `support woven silk programs` 错写成自有生产声明；把可测试能力写成所有产品固定通过；低样本下同时修改元数据；共享品类模板导致内容泄漏到其他页面。

本地与部署后验收：

1. PHP 语法、`git diff --check` 与术语/占位符检查通过；
2. Silk Wear 输出 4 个产品范围、3 个产品卡、2 张执行卡、4 个 Buyer Questions、5 个采购步骤与 6 条 Related 链接；
3. 其他六个品类页不出现 Silk 专属字段；
4. 生产 HTTP 200、`index`、Canonical、单一 H1、JSON-LD、Sitemap、图片和相关链接无回归；
5. 1440 × 900 与 390 × 844 无横向溢出、截断或折叠问答交互问题；
6. 所有者完成英文内容与视觉审核后再部署；部署后记录 Day 0，并安排 Day 7 / 28 / 90 观察。

## 本地验收

- PHP 8.2.30 对 `inc/product-category-data.php` 与共享品类模板语法检查通过，`git diff --check` 通过；
- 本地生产式 HTML 返回 HTTP 200、单一 H1，并输出 4 个产品范围、3 个既有产品卡、2 张执行卡、4 个折叠 Buyer Questions、5 个采购步骤和 6 条 Related 链接；
- 六个非目标品类页均未出现 Silk 专属采购流程或 Buyer Questions；
- 1440 × 900 与 390 × 844 浏览器渲染通过，document/body scrollWidth 均等于 viewport width，无真实横向溢出；
- 术语、占位符、禁用泛化词与三个被删除的绝对化表达检查均通过；图片文件未变。

允许 outcome：`changed`、`no-change`、`deferred`。当前为 `changed / owner-review`。
