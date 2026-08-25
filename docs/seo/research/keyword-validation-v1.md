# 北美与欧洲 SEO 候选词验证台账 V1

> 验证日期：2026-08-17
>
> 当前状态：已完成第一阶段实时英语 SERP 意图筛查、七国 Keyword Planner 历史指标验证及 US / CA / UK 搜索意图样本筛查；固定位置 Google 前 10 名、GSC 增量和真实询盘语言仍待补充
>
> 关联研究：[`seo-search-language-research-v1.md`](seo-search-language-research-v1.md)
>
> 关联流程：[`seo-process.md`](../seo-process.md) 阶段 D“关键词发现、SERP 验证与评分”
>
> 国家数据：[`keyword-planner-country-validation-v1.md`](keyword-planner-country-validation-v1.md)

## 1. 本轮验证目的

本轮不是决定页面最终关键词，而是验证研究池中的短语是否真的对应 Athletik 希望获得的采购任务。重点回答：

1. 结果页是否以制造商、OEM、供应商筛选或专业生产知识为主；
2. 结果中混入多少团队制服、低 MOQ、初创孵化、消费购物、毛衫或其他错误意图；
3. Athletik 是否有已确认的产品、工艺和流程证据支撑该主题；
4. 候选词应继续进入国家数据验证、降级为支持主题，还是暂时停止使用。

本轮没有修改任何 URL、Title、Meta、H1、正文或页面映射。

## 2. 方法、判定与限制

### 2.1 本轮方法

- 对 V1 的 P1 商业词、P1 信息词及关键技术定位词运行实时英语网页搜索；
- 观察结果页中的页面类型、常见标题语言、目标买家、MOQ 倾向和产品范围；
- 把结果与 Athletik 已确认的产品、MOQ、技术和目标客户边界交叉检查；
- 每个词记录判断、风险和下一项所需证据，而不是只记录“有无结果”；
- 新发现的自然变体可以进入验证池，但不能直接触发新页面。

### 2.2 状态定义

| 状态 | 含义 | 当前允许动作 |
|---|---|---|
| 条件通过 | 实时结果已证明相关搜索意图存在，且业务适配较高 | 进入 Keyword Planner、逐国 SERP、GSC 和询盘语言验证 |
| 继续验证 | 有相关意图，但歧义或错误流量较高 | 保留在研究池，不作为唯一主词 |
| 支持主题 | 能帮助解释技术、流程或资格，但不适合承担页面主要获客任务 | 放入现有页面的小节、FAQ、内链或语义支持候选 |
| 暂不采用 | 当前查询的主导意图与 Athletik 不匹配 | 不进入页面映射；等待新的真实需求证据再复审 |

### 2.3 重要限制

- 本轮工具提供的是实时英语网页结果样本，不是固定地理位置下的 Google 前 10 名，也不代表美国、加拿大、英国或欧洲各国的个性化 SERP。
- 结果数量和供应商页面数量不能替代月搜索量、趋势、点击率或转化数据。
- 排名靠前的供应商文案主要证明竞争页面如何描述服务，不能单独证明买家会使用相同语言。
- 当前 GSC 仅有 94 次展示、5 次点击，无法可靠验证非品牌词。
- 因此，本文的“条件通过”只表示通过第一阶段意图检查，不等于批准页面映射或内容改写。

## 3. 商业发现词验证

| 候选词 | 实时结果中的主要意图 | 主要错误意图或风险 | 第一阶段判断 | 下一步 |
|---|---|---|---|---|
| `sportswear manufacturer` | 制造商发现、定制生产、品牌/批发商供应 | 团队制服、球衣、俱乐部、sublimation、10–100 件低 MOQ | 条件通过 | 比较 US/CA/UK/NL/北欧的需求量、结果类型和合格询盘率 |
| `custom sportswear manufacturer` | 定制运动服生产、logo、面料、打样到大货 | 团队定制和低 MOQ 占比很高，容易吸引按件印花项目 | 继续验证 | 测试 `OEM`、`bulk production`、`tech pack` 修饰后的意图变化 |
| `activewear manufacturer` | activewear 工厂、private label、OEM/ODM | startup、yoga/leggings、seamless whole garment、低 MOQ | 条件通过 | 与 `sportswear manufacturer` 比较国家需求和询盘质量 |
| `performance apparel manufacturer` | 功能服装和技术面料制造 | 运动、户外、PPE、制服和消费品牌范围过宽 | 继续验证 | 用具体产品限定；暂不作为全站唯一主词 |
| `sportswear OEM manufacturer` / `OEM sportswear manufacturer` | 按买家规格或 tech pack 生产，采购模型较明确 | `OEM` 常被供应商堆叠；结果仍偏低 MOQ 和团队服 | 条件通过 | 分别核验两种语序的国家需求和 GSC 曝光 |
| `performance underwear manufacturer` | 功能内衣、压缩类和贴身层生产 | period underwear、lingerie、medical/incontinence；样本较稀疏 | 继续验证 | 用 `sports`、`base layer`、`flatlock` 组合验证真实采购语言 |
| `base layer manufacturer` | 贴身层或保暖层制造 | 消费品牌、产品评测、FR/PPE、seamless 混入明显 | 暂不采用为独立主词 | 只保留带 `merino`、`performance` 或明确服装制造限定的变体 |
| `merino base layer manufacturer` | Merino 贴身层成衣供应与 OEM | 消费品牌、成品推荐、面料商和毛衫生产 | 继续验证 | 补国家需求量并检查当前 Merino 页能否完整证明产品范围 |
| `merino wool clothing manufacturer` | Merino 成衣制造和供应商发现 | 毛衫、婴童、面料和宽泛 wool clothing | 条件通过 | 与 `apparel`、`garment` 变体做国家级对照 |
| `merino wool apparel manufacturer` | Merino 服装 OEM/制造 | 结果样本相对较少，仍有毛衫和消费品牌混入 | 条件通过 | 保留为当前页面定位候选，等待需求数据 |
| `merino wool garment manufacturer` | 与 `clothing/apparel` 相同的 B2B 制造意图 | 同样混入毛衫和一般 wool garments | 新增验证变体 | 加入 Keyword Planner 和逐国 SERP 导出，不单独建立页面 |

### 3.1 当前商业判断

第一阶段最值得继续验证的不是品牌词，也不是泛 `technical knitwear`，而是产品词与 `manufacturer/OEM` 的组合：

- `sportswear manufacturer`；
- `activewear manufacturer`；
- `sportswear OEM manufacturer`；
- `merino wool clothing/apparel/garment manufacturer`。

但前三组结果普遍以低 MOQ、初创品牌和团队服作为卖点。即使后续搜索量较高，也必须通过页面资格语言、MOQ 和真实转化数据避免追逐错误流量。

## 4. 技术定位词验证

| 候选词 | 实时结果中的主要含义 | 第一阶段判断 | 使用边界 |
|---|---|---|---|
| `technical knitwear manufacturer` | 大量结果指 flat-knit sweaters、fully fashioned garments、Stoll machines 或 technical knitted components | 暂不采用为主要获客词 | 可保留为品牌定位语言，但必须由 `cut-and-sew`、产品类别和接缝证据消除歧义 |
| `technical sportswear manufacturer` | 部分制造商和买家使用 technical fabrics、performance、training apparel；结果不够标准化 | 继续验证 | 作为 `sportswear manufacturer` 的语义支持，不先建立独立页面 |
| `cut-and-sew technical knitwear` | 能准确澄清生产类型，但不是成熟、统一的高频类别表达 | 支持主题 | 适合定义性文案、About/Services 说明和相关指南正文 |
| `FLATLOCK` / `flatlock apparel` | 接缝工艺、设备、教程和专业服装应用 | 支持主题 | 用于技术证据和长尾，不替代产品制造商词 |
| `ACTIVESEAM` | 品牌化缝线技术、机器和许可相关实体 | 支持主题 | 作为差异化能力和实体证据，不作为宽泛流量词 |

结论：`technical knitwear` 对 Athletik 的定位有价值，但自然搜索中的毛衫/横机语义漂移已再次出现。后续不能仅因为它“听起来专业”就把它设为首页唯一主词。

## 5. 信息型采购词验证

| 候选词 | 实时结果中的主要任务 | 主要风险 | 第一阶段判断 | 建议承接方式 |
|---|---|---|---|---|
| `flatlock vs overlock` | 比较接缝结构、外观和用途 | 百科、家用缝纫和教程结果较多 | 条件通过 | 现有技术指南继续承接，用制造应用和规格证据形成差异 |
| `flatlock seam for activewear` | 了解贴身运动服的舒适性和接缝应用 | 视频、DIY 和设备内容混入 | 支持主题 | 作为 FLATLOCK 指南中的重点小节和相关长尾 |
| `sportswear tech pack requirements` | 准备 BOM、尺寸、公差、结构、印花和包装资料 | 部分结果面向初创品牌，但任务本身专业且明确 | 条件通过 | 现有 Tech Pack Guide 优先覆盖，并连接商业页和 Contact |
| `technical apparel tech pack` | 准备技术服装规格文件 | `technical` 可能指技术设计、技术纺织品或泛 tech pack | 继续验证 | 作为 tech pack 集群变体，不单独建页 |
| `how to evaluate an apparel manufacturer` | 选择工厂、核验能力、打样、沟通、质量和交付 | 泛教程、平台内容和初创入门内容较多 | 继续验证 | 由现有 OEM Evaluation Guide 承接，强化中型买家尽调深度 |
| `apparel manufacturer quality control checklist` | 从来料、裁剪、缝制、inline 到 pre-shipment 的检查 | 竞争内容多，部分厂商文章较通用 | 条件通过 | 进入未来 QC 内容优先池；必须使用真实可披露流程证据 |
| `apparel supplier evaluation checklist` | 供应商审计、批准和风险评估 | 可能混入泛供应商管理和采购模板 | 条件通过 | 与 OEM Evaluation 集群合并研究，不重复建立近义页面 |
| `inline inspection apparel manufacturing` | 了解大货生产中的过程检查 | 培训材料、术语解释和工厂流程内容为主 | 支持主题 | 放入 Services/QC 或 QC 指南章节，不单独抢主词 |

### 5.1 当前信息词优先顺序

1. `sportswear tech pack requirements`：买家任务最清晰，现有页面也已有承接基础；
2. `apparel manufacturer quality control checklist`：与成熟采购和生产风险直接相关，但必须先确认可公开的一方 QC 事实；
3. `apparel supplier evaluation checklist` 与 `how to evaluate an apparel manufacturer`：应作为同一供应商尽调集群，避免两篇近义内容互相竞争；
4. `flatlock vs overlock`：已有页面可以继续积累，但应以专业制造应用区别于 DIY 教程；
5. 其他技术短语先作为上述页面的小节和支持主题。

## 6. 临时评分

按 [`seo-process.md`](../seo-process.md) 的 0–3 分模型记录当前可判断维度。`需求信号` 暂不评分，因此不计算加权总分，避免制造虚假精度。

| 主题集群 | 业务匹配 30% | 采购意图 25% | 证据优势 20% | 可竞争性 15% | 需求信号 10% | 当前状态 |
|---|---:|---:|---:|---:|---:|---|
| Sportswear manufacturer | 3 | 3 | 3 | 1 | — | 条件通过 |
| Custom sportswear | 2 | 3 | 2 | 1 | — | 继续验证 |
| Activewear manufacturer | 3 | 3 | 2 | 1 | — | 条件通过 |
| Performance apparel | 2 | 2 | 2 | 1 | — | 继续验证 |
| Sportswear OEM | 3 | 3 | 3 | 1 | — | 条件通过 |
| Performance underwear | 3 | 2 | 3 | 2 | — | 继续验证 |
| Base layer（不带限定） | 2 | 1 | 2 | 1 | — | 暂不采用为独立主词 |
| Merino manufacturer 集群 | 3 | 3 | 3 | 2 | — | 条件通过/继续验证 |
| Technical knitwear | 2 | 1 | 3 | 1 | — | 支持主题 |
| Sportswear tech pack | 3 | 2 | 3 | 2 | — | 条件通过 |
| Apparel QC checklist | 3 | 2 | 2 | 2 | — | 条件通过 |
| Supplier evaluation | 3 | 2 | 2 | 2 | — | 条件通过/继续验证 |

评分中的“证据优势”只基于当前已批准的产品、工艺和流程范围。若实际页面缺少可公开的一方图片、检查记录或详细事实，发布前必须降分或补证，不能用通用行业文字替代。

## 7. 本轮代表性证据记录

以下页面用于记录 2026-08-17 实时结果中出现的页面类型和语言，不代表对其业务声明背书：

| 查询组 | 代表性结果 | 本轮用途 |
|---|---|---|
| Sportswear manufacturer | [Bromely Sports](https://www.bromelysports.com/)、[DesignTo Clothing](https://www.designtoclothing.com/sportswear-activewear-manufacturing) | 观察 custom、teamwear、fabric、sampling、bulk 和低 MOQ 竞争语言 |
| Activewear/custom sportswear | [Yueyi Active](https://yueyiactive.com/custom-sportswear)、[Linushi](https://linushimanufacturer.com/sportswear/) | 观察 private label、OEM/ODM、startup 和完整生产流程语言 |
| Sportswear OEM | [Sunshell](https://www.sunshellgroup.com/) | 观察 OEM、tech pack、sampling 与工厂能力表达 |
| Merino manufacturer | [Royal Angora](https://www.royal-angora.com/)、[Apex Apparels](https://www.apexapparels.in/)、[Shepherd Merino](https://shepherdmerino.com/) | 确认 B2B Merino 制造意图存在，同时观察 base layer、毛衫和消费产品混合 |
| Technical knitwear | [Eurostil](https://eurostil-knitwear.com/)、[Leeline Apparel](https://www.leelineapparel.com/knitwear-manufacturer/)、[Texture Clothing](https://textureclothingcompany.com/) | 对照 flat-knit/fully fashioned 与 cut-and-sew knitwear 的语义分裂 |
| Sportswear tech pack | [Apparel Production](https://www.apparelproduction.com/resources/tech-packs/)、[Gymhur](https://gymhur.com/how-to-write-a-tech-pack/)、[GloryStar](https://glorystarwears.com/resources/custom-sportswear-tech-pack.html) | 观察 BOM、POM、公差、结构和生产文件意图 |
| Apparel QC | [SafetyCulture](https://safetyculture.com/checklists/quality/garment-quality-control)、[Argus Apparel](https://argusapparel.com/blog/apparel-manufacturing-quality-control-checklist/) | 确认完整 QC checklist 意图和 pre-production/inline/final inspection 结构 |
| Supplier evaluation | [Fabrikn Supplier Audit Checklist](https://www.fabrikn.com/blog/apparel-supplier-audit-checklist-for-brand-buyers/) | 确认 supplier audit、透明度和采购筛选任务 |
| Inline inspection | [NSDC Inline Checker PDF](https://www.nsdcindia.org/scmp/assets/image/1519620954-Inline_Checker_English.pdf) | 确认术语属于生产过程检查和培训语境 |

## 8. 仍需完成的验证

### 8.1 国家级需求数据（首批已完成）

首批 21 个词已在 Google Ads Keyword Planner 中按相同词表分别导出：

- 美国；
- 加拿大；
- 英国；
- 荷兰；
- 瑞典；
- 挪威；
- 芬兰。

结果、限制和下一轮自然变体任务见 [`keyword-planner-country-validation-v1.md`](keyword-planner-country-validation-v1.md)。归一化矩阵已保留 `keyword` 和七国 `avg monthly searches`；原始导出还包括 `3 month change`、`YoY change`、`competition`、`top of page bid low/high` 和逐月数据。广告竞争和出价只作为商业价值旁证，不等于 SEO 难度。

### 8.2 逐国 SERP（搜索意图样本已完成）

US / CA / UK 的第一轮搜索意图样本、限制和首批三个页面级机会见
[`serp-intent-validation-us-ca-uk-v1.md`](serp-intent-validation-us-ca-uk-v1.md)。该轮足以筛除明显错配并确定审计优先级，
但不等于固定地理位置 Google 前 10 名。

对条件通过的商业词，在目标国家环境中各记录自然前 10 名：

- 页面 URL 与页面类型；
- 制造商、目录、媒体、品牌或电商结果占比；
- 是否主打 startup、low MOQ、teamwear 或当地制造；
- 标题和摘要中的主要同义词；
- 是否出现地图、购物、视频、图片或 AI 摘要等 SERP 功能。

### 8.3 一方买家语言

从至少 20–50 条去标识化询盘、RFQ、邮件或会议问题中记录：

- 买家原话；
- 市场与角色；
- 产品、材料和工艺；
- 预计数量；
- 当前采购阶段；
- 供应商筛选问题；
- 是否为合格机会及原因。

原始客户名称、邮箱、电话、未公开设计和 tech pack 不进入 Git。

### 8.4 GSC 增量

继续按 Query、Page、Country 和 Device 导出，品牌词与非品牌词分开。当前样本不足时只观察，不因单次展示修改页面。

## 9. 下一决策门槛

只有当某个主题同时满足以下条件，才进入关键词—页面映射：

1. 实时和逐国 SERP 的主导意图与 Athletik 业务一致；
2. Keyword Planner、GSC 或真实询盘至少提供一种可复核需求信号；
3. 有足够一方证据回答该主题，而不是复述竞争对手；
4. 能明确排除低 MOQ、团队服、消费购物或毛衫等错误意图；
5. 已检查现有页面是否可以承接，避免创建近义页面和关键词蚕食；
6. 若涉及新 URL、合并或改 slug，先完成所有者审批和 301 方案。

在这些条件完成前，现有页面结构与 SEO 元数据继续保持不变。
