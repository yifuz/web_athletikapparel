# AI 实际引用站点模式审计（2026-09-14）

## 1. 审计目的与结论

本审计不以普通 SEO 竞品排名为样本，而以 Athletik 已完成的 Baseline v2、Broad Discovery v1 和用户保存的 AI Sources 面板中**实际被选为来源的 URL**为样本，判断哪些页面模式能够帮助内容被 AI 找到、提取和引用，并评估哪些模式适合迁移到 `athletikapparel.com`。

结论：这个做法有较高价值，应成为 GEO 的长期输入，但不能演变成逐页模仿竞品。

它的主要价值是：

1. 观察 AI 在真实采购问题中如何选择来源，而不是根据“GEO 最佳实践”猜测。
2. 区分“被引用”和“被推荐”：某个页面可被用来支持技术事实，却不一定让该公司进入推荐名单。
3. 找出不同意图下的来源偏好：专业设备、Merino、技术工艺、供应商尽调和宽泛厂商发现并不使用同一种页面。
4. 发现主站已有优势和真正缺口，避免为了字数、FAQ 或 Schema 重写本来已经合格的页面。

本轮结果表明，影响来源选择的关键变量更接近：**查询与页面的精确匹配、靠前的直接答案、独有且可核验的第一方事实、清晰的事实归属、更新时间与外部佐证**。页面长度和复杂 Schema 不是必要条件。

## 2. 方法与适用边界

### 2.1 样本选择

只纳入以下来源：

- Baseline v2 或 Broad Discovery v1 的正文引用和 Sources 面板中实际出现的页面；
- 与 D03～D05、C06～C08 或 BD-01～BD-03 意图直接相关；
- 审计时仍可访问，能够检查 Title、H1、正文结构、表格、FAQ、Schema 和日期信息。

不把搜索结果中偶然出现、但没有进入 AI 来源面板的页面作为“已被 AI 采用”的证据。

### 2.2 四类来源必须分开判断

| 来源类型 | AI 可能采用的原因 | 对 Athletik 的意义 |
|---|---|---|
| 制造商产品/能力页 | 直接提供产品、设备、工艺、地点、MOQ 或产能事实 | 最适合借鉴页面意图和第一方证据组织 |
| 制造商自建 Top X / roundup | 标题与宽泛推荐问题高度一致，便于抽取候选名单 | 可研究结构，但不适合复制其自我排名和竞品导流模式 |
| 设备商、标准机构和行业权威 | 对机器、线迹、测试和合规事实具有更高原始权威 | 应作为技术声明的外部佐证，而不是把制造商博客互相引用当作验证 |
| LinkedIn、目录和第三方资料 | 提供独立发现入口、实体线索和新鲜度信号 | 可补足宽泛发现，但资料必须与规范站当前事实一致 |

## 3. 实际引用页面样本

以下结构数据来自 2026-09-14 对页面的可访问版本抽查；它们用于比较模式，不等于对页面全部商业声明作独立背书。

| 页面 | 页面形态与主要结构 | 可能被采用的核心原因 | 可迁移性 |
|---|---|---|---|
| [HUCAI：Top Reliable OEM/ODM Sportswear Manufacturers](https://m.hcactivewear.com/blog/Top-Reliable-OEM-ODM-Sportswear-Manufacturers-in-China-for-Premium-Brands_b15909) | 制造商自建 roundup；H1 与宽泛推荐意图高度一致，含 Top 5 和选择标准 | 直接给出可抽取名单，覆盖 broad discovery 的答案格式 | **只借鉴买家筛选维度**；不制作 Athletik 自有最佳厂商榜单 |
| [Sansansun：Custom Merino Wool & Performance Base Layer Manufacturer](https://sansansports.com/product-category/base-layers/) | 精确品类页；覆盖产品、定制、流程、QC 与 FAQ | 页面完整拥有 “custom Merino base layer manufacturer” 意图 | 借鉴单页意图完整性和采购路径，不复制其未核验商业声明 |
| [Royal：Merino wool base layer](https://royalapac.com/merino-wool-base-layer/) | 长篇品类页；标题直接对应供应商意图，并在 H2 中直接写 Yamato 4-needle/6-thread 和 Merrow ACTIVESEAM | Merino 产品与具体机器/工艺证据在同页出现，适合 D03/D05 抽取 | 借鉴产品—工艺—设备证据的同页组织；避免绝对化和关键词堆叠 |
| [Yonglee：Baselayer factory](https://yonglee.com/factory/baselayer) | 页面较短，结构简单，Schema 和 FAQ 并不突出 | 具有量化的 Yamato 与 ACTIVESEAM 设备声明，事实独特且高度贴题 | 证明“独特证据密度”可以比篇幅更重要；机器数量须有当前证据才可使用 |
| [Merino Wool Apparel：About Us](https://www.merinowoolapparel.com/about-us) | 较短的公司页，直接写法律实体、地点、工厂与设备 | 实体和生产能力集中、归属清楚 | 借鉴实体—地点—能力的紧凑表述，不借用客户或规模声明 |
| [LeelineWear：Overlock vs Flatlock](https://www.leelinewear.com/overlock-vs-flatlock/) | 精确比较型指南；直接对比表、接缝区域、成本/速度、tech pack 和 FAQ；带作者、日期及 Article/FAQ 数据 | 与 C06 类决策问题逐层匹配，内容容易按小节提取 | 借鉴问题分解和可扫描结构；固定成本、SPI 等数字必须另有可靠证据 |
| [Ninghow：Flatlock vs Overlock vs Coverstitch](https://ninghow.com/blog/flatlock-vs-overlock-vs-coverstitch-seam-choices-for-activewear/) | 完整技术指南；对比、线程/SPI、测试、QC、应用和生产图片 | 覆盖从技术判断到量产执行的完整决策链 | 借鉴决策路径和生产证据呈现；不采用泛化工艺参数 |
| [Yamato：VFK Flatseamer Specifications](https://www.yamato-sewing.com/en/product/flatseamer/vfk/specifications/) | 官方设备规格页，正文不长，表格集中 | 原始设备来源、精确型号和规格权威性高 | 应优先用于核实机器与线迹事实，说明“权威与精确”可胜过内容长度 |

## 4. 跨样本重复出现的有效模式

### 4.1 页面明确拥有一个买家任务

有效页面通常不是泛泛介绍“我们很好”，而是明确回答一个任务：寻找 Merino base-layer manufacturer、核实 FLATLOCK/ACTIVESEAM、比较接缝，或评估 OEM。Title、H1、开头结论和正文小节围绕同一意图展开。

对 Athletik 的含义：现有七个品类页和四篇 Guide 已具备较好的意图分工，不需要为了近义词建立重复页面。下一步应在已有页面补足该意图最关键的第一方证据。

### 4.2 第一屏或靠前位置给出可独立理解的答案

AI 更容易提取一个在脱离上下文后仍成立的段落，例如：制造什么、适合什么买家、在哪生产、MOQ 如何定义、哪种机器执行哪种工艺。答案需要带适用条件，不能只是口号。

对 Athletik 的含义：已上线的品类 Program Fit 是正确方向；About Us 综合 buyer-fit 段落仍应完成审核和部署。Merino 页可考虑在已有 FAQ 或靠前能力段中明确回答“是否能够生产采用工业 FLATLOCK 的 Merino wool base layers”，而不是新建重复页面。

### 4.3 独有事实的密度高于总字数

Yonglee 和 Merino Wool Apparel 的样本说明，短页面也能被采用；原因更可能是它们提供了设备、工艺、地点或数量等可直接支持答案的事实。相反，长篇 roundup 可能只提供候选名单，并不能证明被列公司的真实能力。

对 Athletik 的含义：优先把已核准的真实设备类型、线迹标准、适用产品、生产地点和当前 MOQ 与相应现场图片/视频放在正确页面。没有当前证据的设备数量、员工数量、客户名称或证书范围不应为了“信息密度”而上线。

### 4.4 技术结论需要第一方生产证据与原始权威来源配合

制造商自己的现场照片、设备铭牌、样品两面和测试记录可以证明“我们如何生产”；Yamato、Merrow、ISO、ASTM、AATCC 等原始来源用于界定设备、线迹和测试事实。两者职责不同。

对 Athletik 的含义：C06～C08 不应通过引用其他制造商博客来增强权威。应优先增加真实生产证据，并让关键技术结论靠近原始设备商或标准来源。

### 4.5 新鲜度和实体一致性影响可信度

可见 reviewed/updated 日期、Sitemap `lastmod`、规范站与站外资料的一致 MOQ/地址/实体名称，有助于降低 AI 在多个冲突来源中选择旧口径的概率。但日期必须对应真实复核，不能仅自动刷新。

对 Athletik 的含义：页面实际更新后应同步真实的 reviewed date 和 Sitemap `lastmod`；About、LinkedIn、目录资料及规范站必须统一为当前 500 pieces per style 口径和已核准实体角色。

## 5. 不值得复制的模式

1. **自建 Top 5 / Top 10 供应商榜单**：它可能进入 AI 来源，但独立性弱、容易形成循环自证，也会免费强化竞品实体。
2. **把 Title/H1 写成不自然的关键词串**：精确意图有价值，语法生硬和重复关键词没有品牌价值。
3. **绝对化声明**：`best`、`all`、`full control`、`guaranteed`、固定性能提升等必须有可审计证据和适用边界。
4. **照搬机器数量、SPI、成本和交期数字**：行业常见值不是 Athletik 的事实；材料、线迹、机器设置和订单条件不同会改变结果。
5. **为了形式添加 FAQ、表格或 Schema**：Yonglee 与 Yamato 样本证明它们不是被引用的必要条件；只有真实提升理解时才使用。
6. **以篇幅作为目标**：Athletik 现有主要品类和 Guide 已有足够结构，增加低信息密度正文只会稀释关键证据。

## 6. Athletik 当前差距与优先改进

### P0：先强化规范站可引用事实

1. 完成 About Us 综合 buyer-fit 段落的所有者审核与部署，使公司范围、目标买家、地点、技术能力、500 pieces/style 和独立面料项目边界可以在一个规范页面被直接提取。
2. 在 Merino 现有页面中审核是否需要一个简短直接答案，把 `Merino wool base layers + industrial FLATLOCK + OEM/ODM + 500 pieces/style` 连接在同一事实单元；不新建近义页面。
3. 核对真正发生内容更新的页面 reviewed date 与 Sitemap `lastmod`。当前日期不应长期停留在改版前，也不应对未更新页面伪造新日期。

### P1：建立主站原创生产证据层

1. 为 D03 建立当前设备证据：公开所有者确认的 30+ Yamato FLATLOCK machines、Merrow ACTIVESEAM 和 HSAT-K5 设备类型及实际用途；未提供的 Merrow/HSAT 台数和具体型号不推断。后续补充可公开现场图片、视频或铭牌。
2. 对 C06～C08 做“证据补强”而非全文重写：工艺对比使用真实样品两面，tech pack 使用已脱敏样张或检查项，OEM 尽调使用现场过程记录。
3. 技术定义优先连接设备商和标准机构；商业能力由 Athletik 自己的生产证据支持。

### P1：补足 broad discovery 的独立发现入口

Broad Discovery 目前的主要缺口不是 Athletik 没有足够长的 sportswear 页面，而是宽泛问题中缺乏可靠第三方候选信号。优先维护准确的 LinkedIn 公司资料、可验证行业/展会/认证目录和真实编辑报道；不购买目录包或发布伪装中立的自有榜单。

## 7. 建议建立的长期工作流

每月固定 Baseline 复测后，新增一轮轻量来源情报审计：

1. 只保存每个固定 Prompt 第一次回答及完整 Sources 面板。
2. 对每个引用 URL 记录：Prompt ID、平台、页面类型、被支持的具体结论、Title/H1、直接答案位置、独有证据、日期、Schema、来源独立性和事实风险。
3. 把发现归类为 `可直接借鉴结构`、`需 Athletik 证据后借鉴`、`只作观察`、`禁止迁移`。
4. 只有同一模式在多个提示词、多个平台或连续月份复现，才提升为站点改动；单次来源卡片不触发大规模重写。
5. 每项站点改动必须回答：它改善的是“找到、提取、引用、推荐”中的哪一层，以及部署后用什么固定指标验证。

## 8. 决策

将“AI 实际引用来源模式审计”纳入 GEO 常规流程，优先分析所有实际引用的规范站、竞品站、设备商、标准机构、第三方目录与社交页面，不再局限于 UltraMerino。

UltraMerino 仅保留为同方历史/专业站的来源冲突样本。由于该站当前不由本项目负责，GEO 主执行范围只优化 `athletikapparel.com`；可采用其能够由当前事实独立复核的生产知识，但不把其历史文案、数字或声明直接复制到规范站。
