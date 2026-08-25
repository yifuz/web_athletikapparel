# 关键词机会主表与页面映射 V1

> 决策日期：2026-08-17
>
> 市场范围：北美与欧洲；本轮发现数据主要来自美国，七国验证覆盖美国、加拿大、英国、荷兰、瑞典、挪威和芬兰
>
> 语言：当前输入词为英语；Keyword Planner 界面设置为“所有语言”
>
> 数据主表：[`data/keyword-opportunity-master-v1.csv`](data/keyword-opportunity-master-v1.csv)
>
> 七国验证输入：[`data/keyword-planner-validation-input-v2.csv`](data/keyword-planner-validation-input-v2.csv)
>
> 当前状态：页面映射 V1、28 个代表词的七国英语基线、US / CA / UK 的 P0/P1 搜索意图样本筛查，以及 Sportswear、Knitted Fabrics、Tech Pack Guide 首批三页审计均已完成；后续实施由 [`SEO 审计汇总与实施清单 V1`](../seo-implementation-checklist-v1.md) 管理

## 1. 本轮产出

本轮把三批 Keyword Planner 发现数据和首轮七国验证合并为 45 个意图簇，并完成以下决策：

1. 同义词和相同买家任务归入同一集群，不按每个词建立页面；
2. 每个集群只指定一个主要承接页面，避免内部竞争；
3. 明确区分页面主词、次级词、支持词、证据门槛词和排除词；
4. 把没有按同一方法验证的现有页面主词标记为 `NOT_TESTED`，不写成零需求；
5. 本轮不修改 URL、Title、H1、Meta、正文或 Schema。

## 2. 评分方法

评分沿用 [`seo-process.md`](../seo-process.md) 的五维模型，每项 0–3 分：

| 维度 | 权重 | 本轮解释 |
|---|---:|---|
| 业务匹配 | 30% | 是否对应 Athletik 希望获得且已确认可承接的订单 |
| 采购意图 | 25% | 搜索者是否在发现、筛选、技术确认或尽调供应商 |
| 证据优势 | 20% | 是否已有批准的一方产品、生产、流程或指南证据 |
| 可竞争性 | 15% | 当前页面和结果类型是否存在合理进入机会 |
| 需求信号 | 10% | Keyword Planner、跨国数据或其他证据是否显示需求 |

加权分只用于排序，不自动决定页面。业务错配、能力未确认或明显消费意图可以覆盖分数。

主表数据解释：

- `us_avg_12m_representative` 只记录代表词，不与 `query_variants` 的搜索量相加；
- `0` 配合 `not-reported-*` 表示原始逐月字段重算为 0，但 Google 未报告该精确短语，不能解释为已证明没有需求；
- `NR` 表示只有七国汇总导出的未报告状态，没有可重算的美国发现逐月字段；
- `NOT_TESTED` 表示该现有页面主词尚未进入 Keyword Planner，不是零搜索量；
- `competitiveness_0_3` 是基于页面与结果类型的研究判断，不是 Google Ads 的 Competition 指标。

优先级定义：

- **P0**：现有页面与搜索任务高度匹配，已有需求或跨国信号；
- **P1**：高业务价值，下一轮必须补跨国或页面级验证；
- **P2**：相关支持词、产品子主题或低量高价值任务；
- **P3**：混合意图明显，只观察或作为自然语言使用；
- **HOLD / EXCLUDE**：能力未确认或意图不匹配，不进入页面优化。

## 3. 规范页面映射

| 规范页面 | 当前 Title / H1 | 主要意图簇 | 次级与支持簇 | V1 决策 |
|---|---|---|---|---|
| `/` | Technical Knitwear Manufacturer / Performance Knitwear Manufacturer | Technical knitwear manufacturer（七国 NR，定位驱动） | Technical apparel manufacturer | 保留当前定位；等待 GSC 与更自然变体，不因 NR 改首页 |
| `/sportswear-manufacturer/` | Sportswear Manufacturer / Sportswear Manufacturer | Sportswear manufacturer | Activewear、Fitness/Gym、OEM、Compression、Yoga、Supplier | 核心商业页；Sportswear 为主，Activewear/Fitness 为次，不拆新页 |
| `/underwear-manufacturer/` | Underwear Manufacturer / Underwear Manufacturer | Underwear manufacturer（尚未测试） | Performance underwear、Base layer | 当前最大验证缺口之一；Base layer 由本页负责，Merino/Outdoor 只交叉链接 |
| `/outdoor-clothing-manufacturer/` | Outdoor Clothing Manufacturer / Outdoor Clothing Manufacturer | Outdoor clothing manufacturer | Hiking、Outdoor supplier | 保留单页；Waterproof 词等待能力和测试证据 |
| `/merino-wool-manufacturer/` | Merino Wool Apparel Manufacturer / Merino Wool Apparel Manufacturer | Merino wool clothing manufacturer | Merino clothing、Merino base layer | `clothing` 变体有七国信号；不立即改当前 Apparel Title/H1 |
| `/silk-wear-manufacturer/` | Silk Wear Manufacturer / Silk Wear Manufacturer | Silk wear manufacturer（尚未测试） | 待发现 | 保留现页；进入下一批页面主词验证 |
| `/knitted-fabrics-manufacturer/` | Knitted Fabrics Manufacturer / Knitted Fabrics Manufacturer | Knitted fabric manufacturer | Sportswear fabric、Factory、Mill、Jersey | 独立承接面料买家，不与成衣 Sportswear 页混合 |
| `/sports-accessories-manufacturer/` | Sports Accessories Manufacturer / Sports Accessories Manufacturer | Sports accessories manufacturer（尚未测试） | 待发现 | 保留现页；进入下一批页面主词验证 |
| `/services/` | OEM Knitwear Services: Sampling to Shipping / Our Services | Process / Service navigation | OEM、Sampling、Bulk production、QC、Export | 作为流程页，不抢 Sportswear 或 QC 指南的主词 |
| `/technical-guides/` | Technical Knitwear Guides for Buyers / Technical Knitwear Guides | 指南内容中心 | FLATLOCK、Tech pack、OEM evaluation | 保持 Hub 角色，不与单篇指南竞争 |
| `/flatlock-vs-overlock-technical-knitwear/` | FLATLOCK vs OVERLOCK for Technical Knitwear / 同名 H1 | FLATLOCK vs OVERLOCK | FLATLOCK vs COVERSTITCH | 现有指南精准承接；不建立反向语序页面 |
| `/technical-knitwear-tech-pack-guide/` | Technical Knitwear Tech Pack Guide / What to Include in a Tech Pack for Technical Knitwear | Activewear / Sportswear tech pack | Generic clothing / garment / apparel tech pack | 产品级词是核心；泛 Tech pack 高量但混合，不立即扩大页面范围 |
| `/evaluate-technical-knitwear-oem/` | How to Evaluate a Technical Knitwear OEM / How to Evaluate a Vertically Integrated Knitwear OEM | Choose / evaluate manufacturer | Factory audit、Supplier evaluation | 低量但高业务价值；继续由现有指南承接 |

About、Sustainability 和 Contact 分别承担 Trust、Trust 和 Conversion 角色，不把本轮制造商发现词强行映射到这些页面。

## 4. 尚未批准的新内容机会

### QC 指南候选

`garment quality control`、`clothing quality control checklist`、inspection 和 report 形成独立尽调任务，不能长期只依靠 `/services/` 的流程概览承接。

当前只批准以下动作：

1. 建立 QC 内容简报候选；
2. 向所有者确认可公开的实际 QC 节点、检查记录、批准机制、责任边界和图片；
3. 验证 US / CA / UK 结果页及跨国需求；
4. 完成证据和页面重叠检查后，再决定是否提议新 URL。

当前主表中的 Target 使用 `UNAPPROVED_FUTURE_QC_GUIDE`，它不是 URL，也不授权创建页面。

## 5. 关键词所有权与防止内部竞争

### Sportswear 与 Underwear

- Compression shirt、Yoga、Fitness/Gym 由 Sportswear 页负责；
- Performance underwear 和 Base layer 由 Underwear 页负责；
- Merino base layer 由 Merino 页负责；
- 页面之间通过产品和技术关系交叉链接，不复制相同主段落。

### 成衣与面料

- `sportswear manufacturer`、`activewear manufacturer` 属于成衣 Sportswear 页；
- `sportswear fabric manufacturer`、`knitted fabric manufacturer` 属于 Knitted Fabrics 页；
- 不把 fabric 与 garment 查询数据混算。

### 商业页与指南

- 商业页回答“谁能生产、能生产什么、如何开始项目”；
- Tech Pack、FLATLOCK 和 OEM Evaluation 指南回答技术确认和尽调问题；
- 指南通过上下文链接把合格买家送往相关品类页、Services 或 Contact；
- 不为复数、语序、`clothing/apparel/garment` 近义词建立平行页面。

## 6. 七国验证清单

完成状态：已于 2026-08-17 完成。归一化矩阵、数据周期、表头伪关键词排除和初步决策见
[`keyword-planner-english-baseline-v2.md`](keyword-planner-english-baseline-v2.md)。以下清单继续保留为本轮输入记录，
不再重复导出 Keyword Planner。

本轮使用 Keyword Planner 的“获取搜索量和预测数据”完成七国导出，输入来自
[`keyword-planner-validation-input-v2.csv`](data/keyword-planner-validation-input-v2.csv)。Google 将表头 `Keyword`
也作为普通搜索词写入原始结果，归一化时已排除；以后重新上传时应优先使用无表头纯关键词文件，或在导出后继续执行同一排除规则。

这样只需要按 7 个目标国家各导出一次，共 7 份 `Keyword Stats`，不需要做 3 × 7 次“发现新关键字”。下列分组主要用于人工复核和界面限制时的后备输入。

### A 组：现有商业页主词

```text
sportswear manufacturer
activewear manufacturer
fitness clothing manufacturer
compression shirt manufacturer
outdoor clothing manufacturer
knitted fabric manufacturer
merino wool clothing manufacturer
underwear manufacturer
silk wear manufacturer
sports accessories manufacturer
```

### B 组：生产模型、面料与 Tech pack

```text
technical knitwear manufacturer
oem sportswear manufacturer
sportswear suppliers
sportswear fabric manufacturer
clothing tech pack
apparel tech pack
activewear tech pack
sportswear tech pack
garment quality control
clothing quality control checklist
```

### C 组：采购问题与页面边界

```text
how to choose a clothing manufacturer
garment factory audit
flatlock stitch vs overlock
flatlock stitch vs coverstitch
base layer manufacturer
performance underwear manufacturer
yoga clothes manufacturer
gym clothing manufacturers
```

目标国家仍为美国、加拿大、英国、荷兰、瑞典、挪威和芬兰，每个国家分别导出一份完整 `Keyword Stats`。英语发现数据不能代替荷兰语、瑞典语、挪威语或芬兰语的本地语言研究；本轮只是统一验证英语买家语言。

## 7. 映射前 SEO 审计

核验时间：2026-08-17；范围为上表 13 个生产 URL。此处是映射所需的只读检查，不替代完整 Lighthouse 或浏览器视觉 QA。

### Findings by severity

🔴 Critical：

- 无。13 个 URL 均返回 HTTP 200，没有发现缺失 Title、Canonical 或 H1。

🟡 Warning：

- 首页及 Underwear、Outdoor、Merino、Silk、Knitted Fabrics、Sports Accessories 的 Meta Description 为 157–165 字符，超过本项目约 155 字符目标；
- `/services/` Title 为 63 字符，超过约 60 字符目标；
- 生产 HTML 中大量图片没有显式 `width` / `height` 属性；CSS 可能已预留比例，但仍需在独立 CWV/图片审计中确认 CLS 风险；
- 首页有 97 个 `alt=""` 图片，需要在图片审计中区分装饰图片和应描述的产品/Logo，不能仅凭空 alt 直接判错；
- 当前 GSC 只有站点级小样本，无法给每个意图簇填写可靠的页面点击、曝光、CTR 和排名。

🟢 Passed：

- 13 个页面 Title 与 [`seo-tags.md`](../../../seo-tags.md) 一致；
- 每页只有一个 H1，并与 [`sitemap.md`](../../sitemap.md) 一致；
- 每页 Canonical 自引用；
- 每页至少有一份可解析 JSON-LD；
- 未发现 H2/H3 层级跳级；
- 页面包含可抓取站内链接，未出现本轮映射造成的孤立页；
- 本次检查的所有 `img` 均存在 alt 属性。

### 301 / URL notes

无。本轮不改变、合并或删除 URL，不产生新的 301 映射。

### Suggested next actions

1. Sportswear、Knitted Fabrics 与 Tech Pack Guide 首批三页审计已完成；先汇总事实输入、上下文内链、社交图和共享性能候选，不直接批量改页；
2. 获取第一方 QC 证据后再决定是否提出 QC 新页面；
3. 等 GSC 出现可用的非品牌页面查询数据后，复核页面主词与实际匹配；
4. 建立 NL / SE / NO / FI 本地语言研究批次，与英语基线分开记录；
5. 最后才提出 Title、H1、Meta 或正文调整，URL 保持不变。

## 8. 当前实施结论

现在不是批量改页面的时候。V1 已经明确了页面所有权、数据缺口和排除边界；US / CA / UK 样本结论见
[`serp-intent-validation-us-ca-uk-v1.md`](serp-intent-validation-us-ca-uk-v1.md)。Sportswear、Knitted Fabrics 和 Tech Pack Guide 的页面级审计已经完成；低风险第一批与事实依赖项现统一由
[`SEO 审计汇总与实施清单 V1`](../seo-implementation-checklist-v1.md) 排序和验收。只有某个词簇同时通过业务匹配、SERP、跨国需求、页面适配和事实证据检查，才进入具体页面优化。
