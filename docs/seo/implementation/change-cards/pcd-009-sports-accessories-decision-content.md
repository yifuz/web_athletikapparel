# PCD-009 Sports Accessories 采购决策内容

- Change ID：`PCD-009`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`local-validated / owner-review`
- 审计与实施日期：2026-09-09
- 目标页面：`/sports-accessories-manufacturer/`
- 目标市场：美国、英国、加拿大
- 主要官网任务：`Discover / Qualify / Verify / Start`
- 当前 Finding outcome：`changed / owner-review`

## 搜索意图与证据

- 规范页面负责 technical knit / textile sports accessories 的 B2B OEM/ODM 采购意图，当前 URL、Title、H1 与页面所有权保持不变；
- 最近一份已确认的 GSC 页面快照为 2 clicks / 34 impressions / average position 6.79。当前刷新因 SEO CLI `fetch failed` 不可用，因此不把旧快照当作 2026-09-09 实时数据，也不以低样本触发 Title / Meta 实验；
- 2026-09-09 英文公开 SERP 抽样显示，宽泛 `sports accessories manufacturer` 混合体育器材、健身用品与纺织配件，而 `balaclava manufacturer`、`neck gaiter manufacturer`、`arm sleeve manufacturer` 和 `glove liner manufacturer` 更接近本页可承接的 OEM/private-label 意图；
- 生产页定向检查通过：HTTP 200、`index`、自引用 Canonical、单一 H1、Page Sitemap 收录与 JSON-LD 输出正常；
- 审计前页面只有三个产品组、通用 construction 说明和三张规格卡，缺少完整规格输入、customization、QC/testing、Buyer Questions、采购流程及技术指南上下文入口；部分性能表达也未明确绑定买家规格和测试条件。

## 所有者确认的一方能力

所有者于 2026-09-09 确认：

1. 审计列出的纺织配件均可生产，并可加入 beanies、wristbands、leg sleeves 与 compression sleeves；
2. 页面范围排除硬质体育器材，聚焦与 sportswear、outdoor 和 performance apparel collections 配套的 technical knit / textile accessories；
3. 买家可以指定产品类型、composition、GSM、knit structure、fit、stretch/recovery、thermal/wind、compression、UPF、功能细节、装饰、标签、包装与测试要求；
4. FLATLOCK、ACTIVESEAM、OVERLOCK、COVERSTITCH、seamless、bonded-welded、sublimation、SCREENPRINT、silicone grip 与 reflective details 可按适用产品稳定提供；
5. 相关材料、尺寸、接缝、功能与成衣测试可以提供；需要独立第三方测试时由客户指定。

## 唯一主要变量

只增强 Sports Accessories 页面采购决策完整性：明确纺织配件范围、产品范围、开发输入、customization、quality checkpoints、Buyer Questions、采购流程和相关技术指南内链。保留 URL、Title、Meta、H1、Schema 类型、社交图与现有三张产品图不变，不创建单品平行页。

第三张 Sports Accessories 图片按所有者既有明确要求锁定：继续使用 `sports accessories/sports-accessory-product-category.png` 及其现有响应式衍生图，不替换、不重构、不改变路径。

## 本地实施

在 `inc/product-category-data.php` 的 Sports Accessories 独立数据块中：

- 将产品范围扩展为 balaclavas、ski masks、neck gaiters/warmers、glove liners/lightweight gloves、headbands/ear warmers、arm/leg/compression sleeves、beanies 与 wristbands；
- 明确页面仅覆盖 sportswear、outdoor 与 performance apparel collections 的 technical knit / textile accessories，不覆盖 hard sports equipment；
- 把 thermal、wind、touchscreen、grip、compression、UPF 等性能表达绑定到买家规格、适用产品和测试要求，避免绝对化承诺；
- 增加完整 Development inputs，以及 2 张 customization / quality checkpoints 执行卡；
- 增加 4 个折叠 Buyer Questions；
- 以从 Project Brief & Quotation 到 Export & Delivery 的 5 阶段采购流程替换通用三卡规格条；
- 增加 FLATLOCK、Tech Pack 与 QC Guide 三条上下文内链；
- 未增加或替换图片，uploads 无部署变更。

## 风险与验收标准

主要风险：宽泛 `sports accessories` 被搜索引擎理解为硬质体育器材；把可选性能写成所有产品固定能力或测试通过；低样本下同时修改元数据；共享品类模板导致内容泄漏到其他页面；误改所有者锁定的第三张图。

本地与部署后验收：

1. PHP 语法、`git diff --check` 与术语/占位符检查通过；
2. Sports Accessories 输出 3 个范围入口、3 个产品卡、2 张执行卡、4 个 Buyer Questions、5 个采购步骤与 6 条 Related 链接；
3. 其他六个品类页不出现 Sports Accessories 专属采购流程或 Buyer Questions；
4. 生产 HTTP 200、`index`、Canonical、单一 H1、JSON-LD、Sitemap、图片和相关链接无回归；
5. 第三张原图路径及现有响应式衍生图保持不变并正常加载；
6. 1440 × 900 与 390 × 844 无横向溢出、截断或折叠问答交互问题；
7. 所有者完成英文内容与视觉审核后，与 Silk Wear 一起部署；部署后分别记录 Day 0，并安排 Day 7 / 28 / 90 观察。

## 本地验收

- PHP 8.2.30 对 `inc/product-category-data.php` 的语法检查通过，`git diff --check` 通过；
- 本地生产式 HTML 返回 HTTP 200、单一 H1，并输出 3 个范围入口、3 个既有产品卡、2 张执行卡、4 个折叠 Buyer Questions、5 个采购步骤和 6 条 Related 链接；三个范围锚点均准确对应产品卡；
- 六个非目标品类页均未出现 Sports Accessories 专属采购流程或 Buyer Questions；
- 1440 × 900 与 390 × 844 浏览器渲染通过，document/body scrollWidth 均等于 viewport width，无真实横向溢出；
- 第三张原图 `sports-accessory-product-category.png` 未改动；滚动进入视口后，现有 `technical-knit-accessories-800-q85.webp` / `-480-q85.webp` 响应式衍生图正常加载；
- 术语、占位符、禁用泛化词与绝对化承诺检查通过；图片文件未变。

允许 outcome：`changed`、`no-change`、`deferred`。当前为 `changed / owner-review`。
