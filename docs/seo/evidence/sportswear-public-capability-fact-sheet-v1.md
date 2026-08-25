# Sportswear 公开能力事实表 V1

> 建立日期：2026-08-17  
> 对应实施项：SEO-IMP-007  
> 目标页面：`/sportswear-manufacturer/`  
> 所有者确认：2026-08-17，SP-01–SP-10 均可作为开发能力提供，但不是每项都能提供对应报告
> 状态：已于 2026-08-20 完成生产部署与验收

## 1. 目的与边界

本表用于区分“制造能力”“材料或后整理选项”“具体产品性能”和“已经有测试证据的公开结论”。搜索词或历史页面中重复出现的说法不能代替事实证据。

本轮保持以下 SEO 决策不变：

- URL、Title、H1、Canonical 和主要词 `sportswear manufacturer` 不变；
- Activewear、Fitness、Gym、Training、Running、Yoga 和 Compression 继续由同一页面承接；
- 不创建 Activewear/Fitness 平行页面；
- 不把具体材料、样品或测试结果扩大成所有 Sportswear 产品的一般保证。

## 2. 当前可用的确认基础

下列内容来自当前项目规范，可作为保守改写的基础：

| 事实 | 可公开范围 | 使用边界 |
|---|---|---|
| Athletik Clothing 面向北美和欧洲 B2B 买家提供 Sportswear OEM 项目 | 一般定位 | 不扩展为未经确认的客户名称、市场份额或产能 |
| 产品范围包括 training、running、yoga/studio、leggings、shorts 和 compression silhouettes | 产品范围 | 不自动代表每款产品具有相同功能性表现 |
| FLATLOCK 和 ACTIVESEAM 属于项目的技术制造定位 | 制造能力 | 两者必须分别表述；ACTIVESEAM 不是 FLATLOCK 的通用别名 |
| 可使用 4-way-stretch、power-stretch 等针织材料方向 | 材料方向 | 具体 stretch/recovery、压缩级别和耐久性仍按材料与项目确认 |
| MOQ 为每款 500 件 | 资格信息 | 2026-08-17 由所有者确认；首屏资格条已于 2026-08-18 撤销，页面下方规格栏继续展示 |

## 3. 仓库证据复核结果

当前仓库中能够找到相同或相近的历史文案，但没有找到可直接支撑下列 Sportswear 成品性能声称的产品编号、适用材料、测试方法、验收值或测试报告。

`docs/source-content/performancefabrics-btexco/` 记录了历史面料网站和第三方实验室/检验描述，可作为追查资料的线索，但不能直接作为 Athletik Clothing Sportswear 成品性能证据，原因是：

- 资料主体为 Beta Textiles Co., Limited；当前网站允许公开的实体关系和职责边界不足；
- 资料只说明可能进行第三方测试，没有给出本页具体材料或成品的测试方法、报告和合格值；
- 功能性面料选项不等于使用该面料的所有成衣都达到同一最终性能。

技术指南中的测试和样品批准原则可支持“应按实际材料、样品和验收条件确认”的采购语言，但不能证明某款产品已经通过测试。

已核对的本地来源：

- [`../source-content/performancefabrics-btexco/01-about-us.md`](../../source-content/performancefabrics-btexco/01-about-us.md)：记录 moisture management（wicking / quick dry）、antimicrobial 和 UV protective 等功能方向；
- [`../source-content/performancefabrics-btexco/02-products.md`](../../source-content/performancefabrics-btexco/02-products.md)：记录按买家样品/技术规格开发针织面料，以及功能面料分类；
- [`../source-content/performancefabrics-btexco/05-testing-and-inspections.md`](../../source-content/performancefabrics-btexco/05-testing-and-inspections.md)：记录 BV、SGS、ITS 等第三方测试安排，但不包含本页具体成品的报告编号、样品和结果。

## 4. 所有者确认表

每项请确认“公开范围”和“证据类型”。

公开范围代码：

- `G`：可作为一般能力公开，但仍需写成可选能力，不写成所有成品保证；
- `P`：仅适用于特定材料、后整理、产品或项目；
- `N`：不应公开，删除该声称。

证据代码：

- `R`：有测试报告，可补充测试机构/方法、样品和合格值；
- `S`：有已批准样品、规格书、供应商 datasheet 或内部记录，但不公开完整报告；
- `E`：只有实际项目经验，可作为开发能力描述，不能写成已验证性能；
- `0`：目前没有可用证据。

| ID | 当前公开声称 | 当前风险 | 需要确认的最小信息 | 公开范围 | 证据 |
|---|---|---|---|---|---|
| SP-01 | knit `keeps its shape after repeated wash cycles` | 洗后保形属于可测试结果，未给洗涤程序、次数和允许变化 | 适用材料/产品；洗涤方法和次数；尺寸或外观合格条件 | P | E |
| SP-02 | `squat-proof opacity` | 对所有颜色、GSM、拉伸率和尺码作了近似保证 | 适用材料/颜色；拉伸条件；不透明度检查或测试方法 | P | E |
| SP-03 | `muscle-support compression` / graduated compression | 涉及压缩效果，可能被理解为功能或健康结果 | 适用产品；压缩级别/测量方法；是否仅为 compression silhouette | P | E |
| SP-04 | flatlock seams `never dig` / `chafe-free` | `never` 和 `chafe-free` 是绝对结果，受版型、线迹、材料和使用条件影响 | 可否只描述 low-profile seam option；是否有穿着或摩擦测试 | G（仅 low-profile construction） | E |
| SP-05 | `moisture-wicking` / moisture management | 可能是材料或后整理选项，不一定是所有成品表现 | 适用纤维/面料/finish；测试方法；是供应商数据还是成品测试 | G（作为项目选项） | S；报告按项目 |
| SP-06 | `quick-dry` / `stay dry under exertion` | `stay dry` 接近结果保证，缺少干燥方法和阈值 | 适用材料/finish；干燥测试方法和合格条件 | G（作为项目选项） | S；报告按项目 |
| SP-07 | `UV-protective` | 需要 UPF/UV 测试、颜色和材料范围 | 适用材料/finish；测试方法；UPF 等级或可公开范围 | G（作为项目选项） | S；报告按项目 |
| SP-08 | `antimicrobial finishes` | 需确认处理方式、目标微生物、测试方法及法规/市场边界 | finish 名称或类型；适用产品；测试方法；允许公开的措辞 | G（作为项目选项） | S；报告按项目 |
| SP-09 | mesh ventilation zones | 属于结构能力，但需确认是否为常规可提供选项 | 是自有开发能力、供应商面料选项还是只适用于历史项目 | G | E |
| SP-10 | power-band waistbands | 属于具体结构能力，需确认是否可作为一般产品范围公开 | 适用产品；是否可按 tech pack 开发；是否需要改为通用 waistband construction | G | E |

## 5. 所有者确认与实施解释

所有者于 2026-08-17 确认 SP-01–SP-10 理论上均能满足，但并不是所有项目都能提供对应报告。因此页面采用以下统一规则：

- 允许公开“可按项目开发/可作为材料、finish 或结构选项”；
- 不公开“所有产品都会实现”的无条件保证；
- 不写具体 UPF、压缩、干燥、洗后变化或抗菌合格值，除非对应项目存在可核对报告；
- `never dig`、`chafe-free`、`stay dry` 改为 low-profile construction、买家要求、样品批准和项目测试语言；
- 历史 performancefabrics.com 资料只支持功能面料方向与第三方测试安排，不被描述成当前某款 Sportswear 成品报告。

## 6. 已实施的页面文案

以下文案已写入本地 `inc/product-category-data.php`，保留能力词，同时将结果保证改成项目开发与验证边界。

### Intro

> Sportswear programs for gym, training, running, and studio applications, developed around the buyer's fit, movement, fabric, finish, and testing requirements. We produce tight, fitted, and compression silhouettes for B2B activewear brands, with specifications confirmed through material selection and approved samples.

### Training tops

> Close-fit training tops developed for range-of-motion requirements. FLATLOCK construction can be specified for a low-profile seam, while fabric stretch/recovery and wash-performance targets should be confirmed against the selected material, buyer test criteria, and approved sample.

### Leggings and compression pieces

> High-stretch leggings, shorts, and compression pieces - including graduated compression programs where specified - can be developed with power-band waistbands, 4-way-stretch, and power-stretch knits. Opacity, including squat-proof targets, compression level, moisture management, and waistband recovery should be specified for the selected material and confirmed during sampling and project-specific testing.

### Yoga and studio wear

> Yoga and studio styles can be developed with soft-drape knit options and FLATLOCK construction where a low-profile seam is required. Hand feel, seam placement, stretch/recovery, and next-to-skin comfort should be reviewed on the actual fabric and garment sample.

### Running layers

> Running singlets and performance layers can be developed with lightweight knits, mesh ventilation zones, and project-specific moisture-wicking or quick-dry options. Required performance depends on the selected fabric and finish and should be confirmed against buyer test criteria.

### Construction

> Construction options include FLATLOCK and, where specified for the program, ACTIVESEAM, together with power-stretch and 4-way-stretch knit options. Moisture management, quick-dry, UV protection, and antimicrobial performance can be developed through material selection and finishing options. The required result should be confirmed for the actual fabric and garment against the agreed test method and acceptance criteria.

## 7. 实施结果与后续证据管理

1. 已只修改 `inc/product-category-data.php` 中 Sportswear 的 Intro、四个产品描述和 Construction；
2. 已使用正确的 FLATLOCK / ACTIVESEAM 术语，但未在本项修改生产 Meta；
3. URL、Title、H1、主要词归属、图片和 Schema 均未改变；
4. 以后取得具体报告时，单独记录报告主体、样品、材料、测试方法、结果、有效范围和可公开限制；
5. 报告只支持其实际项目，不自动升级为全页一般性能保证；
6. SEO-IMP-012 的 Rank Math/Meta 真值同步仍单独执行。

本地渲染验收：PHP 语法通过；Title、唯一 H1、Canonical、图片标记和主要词归属未变化；六组绝对化旧表达已从页面 HTML 移除；SP-01–SP-10 的能力语义均以条件式表述保留。
