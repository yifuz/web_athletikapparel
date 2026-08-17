# Sportswear 公开能力事实表 V1

> 建立日期：2026-08-17  
> 对应实施项：SEO-IMP-007  
> 目标页面：`/sportswear-manufacturer/`  
> 状态：等待所有者确认；确认前不发布性能声称改写

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
| MOQ 为每款 1,000 件 | 资格信息 | 不替换为其他数字；SEO-IMP-008 另行处理展示位置 |

## 3. 仓库证据复核结果

当前仓库中能够找到相同或相近的历史文案，但没有找到可直接支撑下列 Sportswear 成品性能声称的产品编号、适用材料、测试方法、验收值或测试报告。

`docs/source-content/performancefabrics-btexco/` 记录了历史面料网站和第三方实验室/检验描述，可作为追查资料的线索，但不能直接作为 Athletik Clothing Sportswear 成品性能证据，原因是：

- 资料主体为 Beta Textiles Co., Limited；当前网站允许公开的实体关系和职责边界不足；
- 资料只说明可能进行第三方测试，没有给出本页具体材料或成品的测试方法、报告和合格值；
- 功能性面料选项不等于使用该面料的所有成衣都达到同一最终性能。

技术指南中的测试和样品批准原则可支持“应按实际材料、样品和验收条件确认”的采购语言，但不能证明某款产品已经通过测试。

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
| SP-01 | knit `keeps its shape after repeated wash cycles` | 洗后保形属于可测试结果，未给洗涤程序、次数和允许变化 | 适用材料/产品；洗涤方法和次数；尺寸或外观合格条件 | 待填 | 待填 |
| SP-02 | `squat-proof opacity` | 对所有颜色、GSM、拉伸率和尺码作了近似保证 | 适用材料/颜色；拉伸条件；不透明度检查或测试方法 | 待填 | 待填 |
| SP-03 | `muscle-support compression` / graduated compression | 涉及压缩效果，可能被理解为功能或健康结果 | 适用产品；压缩级别/测量方法；是否仅为 compression silhouette | 待填 | 待填 |
| SP-04 | flatlock seams `never dig` / `chafe-free` | `never` 和 `chafe-free` 是绝对结果，受版型、线迹、材料和使用条件影响 | 可否只描述 low-profile seam option；是否有穿着或摩擦测试 | 待填 | 待填 |
| SP-05 | `moisture-wicking` / moisture management | 可能是材料或后整理选项，不一定是所有成品表现 | 适用纤维/面料/finish；测试方法；是供应商数据还是成品测试 | 待填 | 待填 |
| SP-06 | `quick-dry` / `stay dry under exertion` | `stay dry` 接近结果保证，缺少干燥方法和阈值 | 适用材料/finish；干燥测试方法和合格条件 | 待填 | 待填 |
| SP-07 | `UV-protective` | 需要 UPF/UV 测试、颜色和材料范围 | 适用材料/finish；测试方法；UPF 等级或可公开范围 | 待填 | 待填 |
| SP-08 | `antimicrobial finishes` | 需确认处理方式、目标微生物、测试方法及法规/市场边界 | finish 名称或类型；适用产品；测试方法；允许公开的措辞 | 待填 | 待填 |
| SP-09 | mesh ventilation zones | 属于结构能力，但需确认是否为常规可提供选项 | 是自有开发能力、供应商面料选项还是只适用于历史项目 | 待填 | 待填 |
| SP-10 | power-band waistbands | 属于具体结构能力，需确认是否可作为一般产品范围公开 | 适用产品；是否可按 tech pack 开发；是否需要改为通用 waistband construction | 待填 | 待填 |

## 5. 快速回复格式

如果暂时没有报告，不需要等待资料整理完再回复。可先按以下格式给出范围与证据：

```text
SP-01: N / 0
SP-02: P / S — 仅适用于【材料或产品】
SP-03: N / 0
SP-04: G / E — 只能写 low-profile seam option，不能写 never/chafe-free
SP-05: P / R — 【测试方法/报告范围】
SP-06: P / S — 【适用材料】
SP-07: N / 0
SP-08: P / R — 【finish 与测试范围】
SP-09: G / E
SP-10: G / E
```

不确定时可直接写 `N / 0`；页面将采用不声称该性能的保守版本，以后有证据再恢复。

## 6. 待确认的保守改写草案

以下是证据不足时的默认草案，仅作为 SEO-IMP-007 实施准备，尚未写入公开页面。所有者确认后再按实际范围保留、收紧或删除具体功能词。

### Intro

> Sportswear programs for gym, training, running, and studio applications, developed around the buyer's fit, movement, fabric, finish, and testing requirements. We produce tight, fitted, and compression silhouettes for B2B activewear brands, with specifications confirmed through material selection and approved samples.

### Training tops

> Close-fit training tops developed for movement-driven applications. FLATLOCK construction can be specified where a low-profile seam is required. Fabric stretch, recovery, and wash-performance requirements should be defined in the tech pack and confirmed on the selected fabric and approved sample.

### Leggings and compression pieces

> Leggings, shorts, and compression silhouettes in 4-way-stretch and power-stretch knits. Opacity, compression level, waistband recovery, and moisture-management requirements should be defined for the selected material and confirmed during sampling and testing.

### Yoga and studio wear

> Yoga and studio styles developed with soft-drape knit options and low-profile seam construction. Hand feel, seam placement, stretch/recovery, and next-to-skin comfort should be approved on the actual fabric and garment sample.

### Running layers

> Running singlets and performance layers developed in lightweight knit options, with ventilation details available where specified. Moisture-management and drying requirements depend on the selected fabric, finish, garment construction, and test criteria.

### Construction

> Construction options include FLATLOCK and, where specified, ACTIVESEAM, together with power-stretch and 4-way-stretch knits. Seam, stretch/recovery, comfort, and finished-performance requirements should be defined for the selected fabric and approved through sampling and testing.

## 7. 实施门槛

收到第 4 节确认后再执行：

1. 只修改 `inc/product-category-data.php` 中 Sportswear 的 Intro、四个产品描述和 Construction；
2. 一并使用正确的 FLATLOCK / ACTIVESEAM 术语，但不在本项修改生产 Meta；
3. 不改变 URL、Title、H1、主要词归属、图片和 Schema；
4. 对有报告的声称记录证据主体、适用范围和公开限制；不把报告全文放进代码；
5. 本地检查页面正文、H1/H2/H3、内链和响应式布局，再部署生产；
6. 更新 SEO-IMP-007 状态。SEO-IMP-012 的 Rank Math/Meta 真值同步仍单独执行。

