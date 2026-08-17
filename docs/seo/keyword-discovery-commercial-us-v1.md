# 美国商业关键词自然变体发现 V1

> 数据日期：2026-08-17
>
> 原始导出：`Keyword Stats 2026-08-17 at 10_55_42.csv`
>
> 原始周期：2024-08-01 至 2026-07-31
>
> 地区：美国；语言设置：所有语言；输入种子词：英语
>
> 当前状态：首批商业发现完成；已清洗 Google 扩展词并形成第二批产品/材料种子词
>
> 归一化候选：[`data/keyword-planner-commercial-discovery-us-2026-08-17.csv`](data/keyword-planner-commercial-discovery-us-2026-08-17.csv)

## 1. 本轮目的

七国历史指标显示 21 个精确短语中有 15 个未获得 Google 报告量。本轮使用 Keyword Planner“发现新关键字”，不是为了自动采用 Google 推荐词，而是寻找买家更自然的商业表达，并识别错误流量。

本轮重点检查：

1. `sportswear`、`activewear`、`fitness`、`gym`、`athletic` 之间的真实搜索表达；
2. `manufacturer`、`supplier`、`OEM`、`private label` 和 `production partner` 的需求差异；
3. Google 是否把近义词合并为同一数据簇；
4. 队服、印花、POD、低 MOQ、初创和消费定制对结果的污染程度。

## 2. 数据处理

### 2.1 文件检查

- 正确导出类型为 `Keyword Stats`，包含 289 行种子词与关键字提示；
- 其中 284 行获得 24 个月平均搜索量；
- 原始页面仍使用 24 个月周期；
- 为与七国矩阵保持一致，本报告使用原始逐月字段重新计算 2025-08 至 2026-07 的 12 个月平均值；
- 原始 `Competition` 和出价仍只表示 Google Ads 商业竞争，不是 SEO 难度。

### 2.2 显式错误意图筛查

基于关键词文本的第一轮规则筛查发现：

| 错误意图类型 | 命中行数 |
|---|---:|
| Team / uniform / jersey / 具体球类 | 66 |
| Sublimation / print-on-demand / embroidery | 30 |
| Personalized / near me / cheap / customizer | 16 |
| Startup / wholesale / dropship | 24 |

各类存在重叠；去重后至少 109/289 行命中一种显式错配模式。该数字只是规则筛查下限，不能替代逐词判断。例如 `wholesale` 可能包含 B2B 买家，但常指现货目录而不是按 tech pack 生产。

## 3. Google 近义聚合

多组关键词具有完全相同的 12 个月逐月序列、平均量、趋势、竞争度和出价。它们应视为同一 Google 数据簇，不能把搜索量相加：

| 代表簇 | 相同数据的表达 | 近 12 个月平均量 |
|---|---|---:|
| Sportswear manufacturer | `sportswear manufacturer`、`sports clothing manufacturers`、`sportswear clothing manufacturer` | 1,560 |
| Fitness clothing | `fitness clothing manufacturer`、`workout clothes manufacturer`、`fitness clothing suppliers`、`fitness wear manufacturers`、`workout clothes supplier`、`fitness wear suppliers` | 1,112.5 |
| Activewear manufacturer | `activewear manufacturer`、`activewear clothing manufacturers`、`activewear apparel manufacturers` | 436.7 |
| Sports apparel | `athletic clothing manufacturers`、`sports apparel manufacturers`、`sports clothing suppliers`、`sports apparel suppliers`、`sports garment manufacturers`、`sportswear apparel manufacturers`、`sportswear garment manufacturing` | 258.3 |
| Custom sportswear | `custom sportswear manufacturer`、`custom sportswear suppliers` | 712.5 |

因此，最终页面可以自然覆盖近义表达，但不能为每个复数、词序或 `clothing/apparel/garment` 变体建立独立页面。

## 4. 新增商业候选

| 代表词 | 24 个月平均量 | 重算 12 个月平均量 | 初步意图 | 当前判断 |
|---|---:|---:|---|---|
| `sportswear manufacturer` | 1,600 | 1,560 | 广泛制造商发现 | 核心商业词 |
| `fitness clothing manufacturer` | 880 | 1,112.5 | 健身、训练、gym wear 制造 | 新增高优先级次级商业词 |
| `yoga clothes manufacturer` | 590 | 954.2 | Yoga/leggings/sets 制造 | 产品子主题，继续验证 |
| `custom sportswear manufacturer` | 390 | 712.5 | 定制制造、队服、印花 | 有量但错配风险高 |
| `activewear manufacturer` | 480 | 436.7 | Activewear OEM/private label | 核心商业词 |
| `sports apparel manufacturers` | 390 | 258.3 | Sportswear 的近义制造表达 | 支持同义词，不单独建页 |
| `gym clothing manufacturers` | 260 | 185 | Gym/fitness clothing 制造 | 次级商业词，继续验证 |
| `athletic wear manufacturers` | 170 | 132.5 | Athletic/sports apparel 制造 | 支持同义词 |
| `private label activewear manufacturer` | 50 | 46.7 | Private label activewear | 商业意图强，但低 MOQ/startup 风险高 |
| `sportswear suppliers` | 40 | 20.8 | 供应商、批发或制造 | 支持词，需排除现货批发 |
| `oem sportswear` | 20 | 15.8 | OEM 生产模型 | 低量支持词 |

### 4.1 `fitness clothing manufacturer`

该词是本轮最重要的新发现：

- 近 12 个月平均量高于 `activewear manufacturer`；
- 实时结果以 fitness/gym/activewear 制造、private label、sampling 和 bulk production 为主，采购意图真实存在；
- 同时大量竞争页面强调 startup、100 件左右低 MOQ、现货/wholesale 和快速品牌启动；
- Athletik 当前已确认的 Sportswear 范围包含 gym、training、running、leggings/compression 和 yoga/studio，产品适配成立。

当前决策：把它加入 Sportswear 商业集群的次级高优先级词，而不是创建 `/fitness-clothing-manufacturer/` 新页面。是否进入当前 Sportswear 页的 Title/H1，必须等页面级 SERP、GSC 和询盘数据完成后再决定。

### 4.2 `yoga clothes manufacturer`

该词的量较高且产品适配，但存在三个问题：

- Google 结果容易混入 private label、startup 和低 MOQ；
- `yoga clothes` 可能偏向特定女装/套装，而 Athletik 的主定位更宽；
- Seamless yoga sets 可能指整件 circular seamless knitting，不能与 Athletik 的 cut-and-sew 和接缝能力混淆。

当前决策：作为 Sportswear 页的产品子主题和后续查询候选，不单独建页。

### 4.3 `private label`、`custom` 与 `supplier`

- `private label activewear manufacturer` 有明确商业意图和较高广告竞争，但实时结果普遍以 10–100 件 MOQ、startup 和 ready styles 为卖点；
- `custom sportswear manufacturer` 有较高量，但队服、球衣、logo/printing 和低 MOQ 仍是主要噪声；
- `sportswear suppliers` 可能指制造商、批发商、贸易商或现货商，适合作为正文支持语言，不适合作为唯一页面主词；
- `OEM sportswear` 搜索量较低，但与 Athletik 生产模式高度匹配，继续作为资格和转化语言。

## 5. Google“扩大搜索范围”建议判定

| Google 建议 | 是否进入研究池 | 原因 |
|---|---|---|
| `sportswear industries` | 否 | 更可能指行业、公司名、市场研究或就业，不是明确供应商发现词 |
| `sportswear supplier` | 支持词 | 有采购可能，但批发、贸易和现货歧义明显；实际导出出现复数变体 |
| `women's clothing manufacturer` | 否 | 范围过宽，主要指一般女装和时尚制造，无法表达技术 Sportswear 优势 |
| `fitness clothing manufacturer` | 是，P1 次级 | 量、采购意图和当前产品范围均匹配，但需排除低 MOQ/startup |
| `custom apparel` | 否 | 大量指消费者定制、促销服、印花和本地服务 |
| `sportswear` | 不作商业主词 | 主要是消费品类、品牌和购物词；可作为正常产品语言使用 |

“扩大搜索范围”只是 Google 的种子主题建议，不是关键词推荐或页面策略批准。

## 6. 代表性实时结果

以下页面用于证明结果类型和竞争语言，不代表对其声明背书：

- [Fitness Clothing Manufacturer](https://www.fitnessclothingmanufacturer.com/)：fitness、workout、wholesale、private label 和 lowest MOQ 混合；
- [FittDesign](https://www.fittdesign.com/fitness-clothing-manufacturer)：fitness clothing、tech pack、sampling、bulk production，同时面向 startup 和低 MOQ；
- [Active Wear Productions](https://www.activewearproductions.com/fitness-clothing-manufacturer/)：OEM/ODM、全球生产和 800 件左右 MOQ，证明该词也可以承接较成熟项目；
- [ZYPFIT](https://zypfit.com/private-label-activewear-manufacturer)：private label、tech pack、sample-first 与 30 件低 MOQ；
- [GYMHUR](https://gymhur.com/)：activewear/sportswear、OEM/ODM、teamwear 和 15–50 件低 MOQ 混合；
- [Thomasnet Athletic Clothing](https://www.thomasnet.com/suppliers/usa/athletic-clothing-15240203)：目录型 Athletic Clothing 结果，同时混入 uniforms 和 screen printing。

## 7. 对当前站点的临时影响

本轮不触发新 URL 或页面重写。当前只更新研究判断：

1. Sportswear 商业集群以 `sportswear manufacturer` 为核心；
2. `activewear manufacturer` 和 `fitness clothing manufacturer` 是最重要的次级商业表达；
3. `yoga clothes manufacturer`、`gym clothing manufacturer` 和 `athletic wear manufacturer` 作为产品/语义支持；
4. `sports clothing manufacturer`、`sports apparel manufacturer` 和 `sports garment manufacturer` 视为近义覆盖，不建立独立页面；
5. `custom`、`private label` 和 `supplier` 保留但必须同时显示 MOQ、tech pack、bulk production 和目标客户资格；
6. 队服、球衣、印花/POD 和低 MOQ 查询不进入自然内容扩张目标。

## 8. 下一批种子词

下一轮转向产品、材料和更高技术适配的采购语言：

```text
merino wool clothing manufacturer
merino apparel manufacturer
merino base layer manufacturer
base layer manufacturer
performance underwear manufacturer
compression clothing manufacturer
outdoor clothing manufacturer
technical apparel manufacturer
knitted fabric manufacturer
performance knitted fabric manufacturer
```

仍先以美国为发现市场，语言保持“所有语言”，网站过滤留空。导出 `Keyword Stats` 后再清洗，不将 Google 建议词自动加入。
