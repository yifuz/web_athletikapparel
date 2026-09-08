# PCD-006 Merino Wool 采购决策内容

- Change ID：`PCD-006`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`production-accepted / measuring`
- 本地实施日期：2026-09-07
- 生产部署日期：2026-09-07
- 生产验收日期：2026-09-08
- 目标页面：`/merino-wool-manufacturer/`
- 主要官网任务：`Qualify / Verify / Start`
- 搜索与采购意图：Merino wool clothing manufacturer、Merino wool base layer manufacturer、custom Merino wool apparel

## 观察与证据

生产页技术状态健康：HTTP 200、可索引、自引用 Canonical、单一 H1、JSON-LD 可解析，图片 alt 完整。最近 28 个 GSC 最终日为 2026-08-06 至 2026-09-02，页面合计 2 clicks / 36 impressions / average position 20.92；可见非品牌 Query 行中：

- `merino wool clothing manufacturer`：0 clicks / 6 impressions / average position 25.67；
- `merino wool clothing manufacturers`：0 clicks / 2 impressions / average position 45。

Query 行不包含 GSC 匿名查询，因此 8 次可见 Query 曝光不能替代 36 次页面总曝光。当前样本只支持页面所有权和内容缺口判断，不支持 CTR 或排名效果归因。

2026-09-07 使用 DataForSEO 对 US / GB / CA 的 `merino wool clothing manufacturer` 与 US 的 `merino wool base layer manufacturer` 做 Desktop Top 10 Live SERP。四次快照均为 `complete`，总成本 USD 0.008。SERP 同时包含制造商、零售品牌、目录、媒体和社区，属于混合意图；Thai Son 与 Merinotex 等制造商跨市场出现，说明该词仍包含 OEM 采购意图。制造商结果通常公开产品范围、composition、micron、yarn/gauge、GSM、结构、MOQ、开发输入和质量流程，而不是只解释 Merino wool 的通用优点。

原页面约 303 words，能完成 Discover，但存在以下采购缺口：

1. 产品卡首先展示 Jacquard、Printed、Blend 和 Yarn sourcing，未突出实际可稳定生产的 base layers、underwear、T-shirts、hoodies、mid-layers、balaclavas 和 neck warmers；
2. 未集中说明买家可指定 composition、micron、yarn count、GSM、single jersey、interlock、rib 和 jacquard；
3. 未说明 colorfastness、shrinkage、pilling、GSM、fiber composition、stretch/recovery 可 in-house testing，以及客户可指定 third-party testing；
4. `will not ... fade` 属于无法成立的绝对承诺；`A capability unique to merino programs` 也缺少明确比较边界；
5. 页面只有产品与 Services 内链，缺少 Tech Pack Guide、QC Guide 和 seam construction 指南的采购上下文入口。

## 一方业务确认

所有者于 2026-09-07 确认：

1. Athletik 有稳定生产 Merino wool base-layer tops、bottoms、underwear、T-shirts、hoodies、mid-layers、balaclavas 和 neck warmers 的经验；
2. 买家可以按项目指定 composition、micron、yarn count、GSM、single jersey、interlock、rib、jacquard 等结构；
3. colorfastness、shrinkage、pilling、GSM、fiber composition、stretch/recovery 均可进行 in-house testing；需要第三方测试时由客户指定。
4. 同日所有者提供 `D:\C-网站素材\merino wool product\羊毛立体照片-2025.4.18` 的真实产品立体图，并明确可用于页面展示、无需因图片中的 logo 排除素材。

行业范围只作为选材判断，不作为 Athletik 的固定上下限。Woolmark 的 fibre/end-use 说明将低于约 19.5 microns 的 finer Merino wool 对应到 base layers、underwear 和 fine knitwear，同时指出其他 micron 区间适用于更广的 apparel 和 outerwear。公开页面因此使用 `below about 19.5 microns is a common starting point`，并明确最终 composition、micron、GSM 与结构按项目要求确定，不发布未经必要的固定 GSM 范围。

参考来源：

- Woolmark：<https://www.woolmark.com/fibre/what-is-the-wool-fibre/>
- Paul James Merino manufacturer page：<https://www.pauljamesknitwear.com/pages/merino-wool-knitwear-manufacturer>
- Thai Son Merino manufacturer page：<https://thaisonsp.com/sustainable-fabrics/merino-wool-choosing-the-right-natural-fiber-for-your-lifestyle/>
- Sansansun Base Layer manufacturer page：<https://sansansports.com/product-category/base-layers/>

## 主要变量

唯一主要变量是现有 Merino Wool 页面中的采购决策内容：

1. 首段自然承接 `custom Merino wool clothing`，并列明已确认的成衣范围；
2. 四个产品模块改为 base layers/underwear、T-shirts/hoodies/mid-layers、jacquard/print/accessory development、yarn/fabric development；继续复用原有四张图片和响应式资源；
3. 增加 `Development inputs`，说明 composition、micron、yarn count、GSM、knit structure、fit、construction、testing 和项目输入；
4. 第三张规格卡从通用 Service 改为已确认的 `Testing / In-house`，保留客户指定 third-party testing 的边界；
5. 增加两张 customization / quality checkpoint 卡和四个 Buyer Questions；
6. 增加 FLATLOCK Guide、Tech Pack Guide 和 QC Guide 内链；
7. 删除 `will not fade`、无边界的 `unique` 与 `merino fragility` 等绝对化或含糊表达。
8. 在 `Development inputs` 后增加 8 张真实产品立体图，分别覆盖 printed base layer、long-sleeve base layer、base-layer bottom、T-shirt、hooded mid-layer、neck warmer、beanie 和 balaclava；Desktop 为 4 × 2，Mobile 为 2 列。每张图片提供 480 / 800 WebP 与 800 JPG fallback、固定宽高、`srcset` / `sizes`、lazy loading、语义化 caption 和描述性 alt。
9. Merino 专属 `Buyer Questions` 改为原生 `<details>` 折叠显示，减少页面初始文字密度；共享模板通过数据开关控制，其他品类继续使用原卡片结构。
10. 将原三卡规格条替换为 Merino 专属完整采购流程：`Project Brief & Quotation` → `Material & Sample Development` → `Approval & Order Confirmation` → `Bulk Production & Quality Control` → `Export & Delivery`。MOQ、1–2 周典型打样、已确认 testing 能力和 FOB / DDP 边界分别进入对应阶段，并增加 `/services/` 深入入口；未确认的付款节点不公开。

URL、Title、Meta、H1、Canonical、Schema 类型、Hero、MOQ 和页面所有权均不改变，也不创建 Merino Base Layer 平行页。图片变化仅限新增的页面内视觉证明，不替换 Hero 或既有四张产品范围图片。

## 风险与控制

- 风险：`below about 19.5 microns` 被误解为 Athletik 的固定供货范围。
  - 控制：明确标注为 next-to-skin products 的 common starting point，并说明最终规格按 hand feel、warmth、durability、stretch、climate 和 care requirements 决定。
- 风险：测试项目被理解为所有产品自动通过同一标准。
  - 控制：所有测试均绑定 agreed method、acceptance criteria、approved specification 和具体项目；第三方测试由客户指定。
- 风险：产品范围扩充吸引个人消费者或低 MOQ 询盘。
  - 控制：保留 500 pieces per style，并继续使用 OEM/ODM、buyer specification、tech pack 和 project quotation 语言。
- 风险：低曝光内容改动被解释为排名实验成功。
  - 控制：本项属于 B 类采购决策完整性改进；28 / 90 天只观察 Query、合格询盘和页面行为，不把自然波动归因于单次改写。
- 风险：直接部署 67 张 4000 × 4000 源图造成页面过长和图片负载回归。
  - 控制：只选 8 个互不重复的产品类型；原图不进入生产，网页端 WebP 组合在 480w 为约 75.5 KB、800w 为约 201.7 KB，全部首屏以下 lazy-load。
- 风险：共享模板改动影响其他品类页的问题卡片。
  - 控制：产品图与折叠问答都由 Merino 数据字段显式启用；其他品类不输出 `product_showcase`，也不启用 `buyer_questions_collapsible`。
- 风险：共享模板新增采购流程后改变其他产品页已经验收的三卡规格条。
  - 控制：模板仅在分类数据提供 `process_steps` 时输出有序流程；当前只有 Merino 启用，其他品类继续使用原规格条结构和三列布局。
- 风险：把完整采购流程写成所有项目固定不变的 SOP，或擅自补充付款节点。
  - 控制：页面使用 `review`、`align`、`confirm` 和 `available by project`，时间、testing、commercial terms 与 delivery responsibilities 均绑定具体 quotation；付款节点因没有已确认口径而省略。

## 验收标准

### 本地

- [x] PHP 8.2 语法与 `git diff --check` 通过；
- [x] 数据桩确认 Merino 仍为原 H1，包含 4 个产品模块、2 张 assurance cards、4 个 Buyer Questions 和 6 个 related links；
- [x] `sprintf` 正确输出 `100% Merino wool` 与 `500 pieces per style`；
- [x] LocalWP HTTP 200，新增 gallery 与 collapsible question markup 均已输出；
- [x] 24 个图片衍生 URL 全部返回 HTTP 200；
- [x] 1440px Desktop 与 390px Mobile full-page 截图检查通过，无横向溢出，产品图均为固定 1:1 比例；
- [x] 共享模板与 CSS 只增加可选模块；URL、Title、Meta、H1、Schema 与 Hero 未修改；
- [x] Merino 采购流程在 Desktop 为五阶段横向顺序卡、Tablet 为 2 列、Mobile 为单列；阶段内容与 Services、Tech Pack、QC 和出口口径一致；
- [x] 所有者完成英文草稿与页面视觉审核并部署；

### 生产 / 部署后

- [x] 页面返回 HTTP 200、可索引、自引用 Canonical且保持单一 H1；
- [x] 新产品范围、Development inputs、Testing 规格卡、两张执行卡、四个 Buyer Questions 和三条新增指南内链完整；
- [x] 四张原产品范围图片与新增 8 张产品立体图的响应式资源正常加载；页面引用的 42 个 Merino 图像/视频资源均返回 HTTP 200，其中 24 个新增衍生图片 URL 全部返回正确 WebP/JPEG MIME；
- [x] Merino `Buyer Questions` 继续使用原生 `<details>` / `<summary>` 键盘语义，其他品类保持原卡片结构；
- [x] Merino 五阶段采购流程与 `/services/` 内链完整，其他六个品类的既有三卡规格条保持不变；
- [x] 其他六个品类页不输出 Merino 专属内容且无布局回归；7/7 品类页均返回 HTTP 200 并保持单一 H1；
- [x] 1440 × 900 Desktop 与 390 × 844 Mobile 生产渲染无横向溢出或文字截断；
- [x] 所有者确认后完成部署。

当前 Finding outcome：`changed / measuring`。以 2026-09-07 生产部署为观察起点，Day 7 / 28 / 90 分别为 2026-09-14、2026-10-05、2026-12-06；复查 GSC Query、页面互动与有效询盘，不与 Title / Meta 实验混合归因。
