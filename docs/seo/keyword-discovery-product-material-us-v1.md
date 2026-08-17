# 美国产品与材料关键词自然变体发现 V1

> 数据日期：2026-08-17
>
> 原始导出：`Keyword Stats 2026-08-17 at 11_06_03.csv`
>
> 原始周期：2024-08-01 至 2026-07-31
>
> 地区：美国；语言设置：所有语言；输入种子词：英语
>
> 当前状态：产品与材料批次已完成；下一批转向 Tech pack、QC、供应商评估和 FLATLOCK 信息词
>
> 归一化候选：[`data/keyword-planner-product-material-discovery-us-2026-08-17.csv`](data/keyword-planner-product-material-discovery-us-2026-08-17.csv)

## 1. 本轮目的

本轮从泛 Sportswear 商业词转向产品、材料和技术制造语言，检查：

1. Merino、base layer、compression 和 performance underwear 的自然产品级表达；
2. Outdoor clothing 的制造采购需求；
3. Knitted fabric 与成衣制造是否形成独立意图；
4. `knit manufacturer`、`merino wool manufacturer` 等短词是否产生纱线、面料、毛衫或其他语义漂移。

## 2. 数据检查

- 正确导出类型为 `Keyword Stats`；
- 共 41 行种子词与关键词提示，其中 35 行获得 24 个月报告量；
- 原始周期仍是 24 个月；
- 本报告使用逐月字段重算 2025-08 至 2026-07 的 12 个月平均值；
- 语言设置为“所有语言”，但所有输入和输出短语均为英语；
- 广告竞争和出价不等于 SEO 难度。

## 3. 输入种子词结果

| 输入种子词 | 24 个月平均量 | 重算 12 个月平均量 | 当前判断 |
|---|---:|---:|---|
| `merino wool clothing manufacturer` | 20 | 15 | 低量但高适配 |
| `merino apparel manufacturer` | NR | 0 | 表达未报告，不能单独建页 |
| `merino base layer manufacturer` | NR | 0 | 表达未报告，保留为产品支持语言 |
| `base layer manufacturer` | NR | 0 | 精确短语未报告，意图仍可能由产品词承接 |
| `performance underwear manufacturer` | NR | 0 | 精确短语未报告，需寻找更自然产品变体 |
| `compression clothing manufacturer` | 20 | 21.7 | 小而相关的商业词 |
| `outdoor clothing manufacturer` | 90 | 64.2 | 当前 Outdoor 页的核心商业候选 |
| `technical apparel manufacturer` | NR | 0 | 继续作为定位支持词，不承担主要获客 |
| `knitted fabric manufacturer` | 70 | 41.7 | 独立面料采购意图 |
| `performance knitted fabric manufacturer` | NR | 0 | 精确短语未报告，用具体结构/用途扩展 |

`NR` 表示 Google 没有报告该短语的平均搜索量；表中的 `0` 是本报告重算月度字段时得到的零值，不代表已证明没有任何需求。

## 4. 重要新增候选

### 4.1 `compression shirt manufacturer`

- 24 个月平均量为 260；
- 重算近 12 个月平均量为 473.3，是本轮最高的产品级制造词；
- 实时结果具有明确的 OEM/private label、tech pack、performance fabric 和 bulk production 意图；
- 同时大量页面主打 30–100 件低 MOQ、sublimation、SCREENPRINT、team/fitness startup 和快速交付；
- 2025-12 至 2026-01 出现异常高点，平均值不能视为稳定的固定月需求。

Athletik 当前产品证据包含 compression pieces、leggings、technical tops、base layers 和 FLATLOCK/ACTIVESEAM 应用，因此产品适配高。

当前决策：加入 Sportswear/Underwear 交叉产品研究池，优先由现有 Sportswear 页面和 FLATLOCK 指南承接，不立即创建 `/compression-shirt-manufacturer/`。

### 4.2 `outdoor clothing manufacturer`

- 与 `outdoor apparel manufacturers`、`outdoor wear manufacturers` 具有完全相同的逐月数据，属于同一近义簇；
- 重算近 12 个月平均量为 64.2；
- 广告竞争指数 73，说明存在商业竞价；
- 同比变化为 -73%，且 Outdoor 结果会覆盖 hiking、ski、hunting、waterproof、workwear 和 gear 等宽范围。

当前决策：保留为现有 `/outdoor-clothing-manufacturer/` 的核心候选，但页面必须明确实际产品范围，不能用泛 Outdoor 词暗示未确认的硬壳、PPE 或全部户外装备能力。

### 4.3 `knitted fabric manufacturer`

- 与 `knit fabric supplier` 具有相同数据，重算近 12 个月平均量为 41.7；
- 实时结果明确指 single jersey、rib、interlock、fleece、knitting、dyeing、finishing、GSM 和按公斤 MOQ；
- 这是面料买家意图，不是成衣 OEM 意图；
- `knitted fabric factory`、`knit fabric mills`、`jersey fabric supplier` 是较低量支持词。

当前决策：由现有 `/knitted-fabrics-manufacturer/` 独立承接，不能把该词并入 Sportswear 成衣页，也不能把 fabric 流量与 garment 询盘混算。

### 4.4 Merino 词组

- `merino clothing manufacturer` 与 `merino wool clothing manufacturer` 具有相同数据，重算近 12 个月平均量为 15；
- `merino wool manufacturers` 为 32.5，但会混合羊毛原料、纱线、面料、袜子、毛衫和成衣；
- `merino wool yarn suppliers`、`knitting wool manufacturers` 等扩展词是原料/纱线意图；
- `merino apparel manufacturer` 和 `merino base layer manufacturer` 没有报告量。

当前决策：继续以 `merino wool clothing manufacturer` / `merino clothing manufacturer` 作为当前成衣页面商业候选，不因为更短的 `merino wool manufacturers` 数值较高就牺牲意图准确性。

## 5. 需要排除或降级的语义

| 关键词或类型 | 处理 | 原因 |
|---|---|---|
| `knit manufacturers` | 不作为成衣页目标词 | 同时覆盖毛衫、横机、面料、针织厂和一般 knitwear |
| `outdoor clothing and gear companies` | 排除 | 更像品牌榜单、公司研究和消费市场，不是 OEM 发现 |
| `medi compression garments` | 排除 | `Medi` 是品牌/医疗压缩相关表达，不是 Athletik 目标产品 |
| Yarn / wool suppliers | 从成衣集群排除 | 原料采购意图，与服装 OEM 页面不同 |
| `waterproof clothing manufacturers` | 等待能力确认 | 不能因搜索提示而暗示未确认的防水服装能力 |
| `warp knit fabric manufacturers` | 等待能力确认 | 必须先确认实际设备、结构和产品证明 |
| Circular/seamless knit | 与 cut-and-sew 分开 | 整件 seamless 和圆机/横机生产不能由接缝能力替代 |

## 6. 页面承接边界

本轮不批准新 URL，只形成当前页面候选关系：

| 主题 | 当前最合理的候选页面 | 边界 |
|---|---|---|
| Compression shirts / clothing | `/sportswear-manufacturer/`，并由 FLATLOCK 指南支持 | 不新建产品页；先验证询盘和页面深度 |
| Outdoor clothing | `/outdoor-clothing-manufacturer/` | 只写真实可做产品，不扩张到 gear/PPE |
| Knitted fabric | `/knitted-fabrics-manufacturer/` | 与成衣采购意图分开 |
| Merino clothing | `/merino-wool-manufacturer/` | 避免原毛、纱线和毛衫语义 |
| Performance underwear / base layer | `/underwear-manufacturer/` 与相关技术指南 | 当前精确词无报告量，继续找自然产品词 |
| Technical apparel | 首页/品类页的定位支持 | 不单独承担主要关键词 |

这只是候选承接关系，不等于批准修改 Title、H1 或页面正文。

## 7. 代表性实时结果

以下页面用于证明结果类型，不代表对其声明背书：

- [Seetime Luxury compression shirt manufacturer comparison](https://seetimeluxury.com/top-10-compression-shirt-manufacturers/)：采购量、规格、面料、打样和供应商比较意图；
- [Mughal Apparel Compression Shirts](https://www.mughalapparel.com/products/fitness-wear/compression-shirts/)：OEM/private label 与 50 件低 MOQ、印花定制混合；
- [SANSANSUN Compression Shirt](https://sansansports.com/product-category/compression-shirt/)：compression、base layer、FLATLOCK 和生产流程语言；
- [ArDee Komfab](https://ardeekomfab.com/)：single jersey、rib、fleece 等面料制造意图；
- [Runtang Textile](https://runtangtex.com/)：knitted fabric、GSM、定制颜色、按公斤 MOQ 和 finishing 语言；
- [Henitex](https://www.henitex.fr/en/)：knitted fabric、performance fabric、seamless underwear/sportswear 的多重生产语义。

## 8. 下一批：采购信息词

下一轮使用以下 10 个种子词寻找更自然的 Tech pack、QC 和供应商评估表达：

```text
sportswear tech pack
activewear tech pack
apparel tech pack
garment quality control
apparel quality control checklist
clothing quality control checklist
apparel supplier evaluation
garment factory audit
how to choose a clothing manufacturer
flatlock vs overlock
```

继续使用美国、所有语言、网站过滤留空，并下载完整 `Keyword Stats`。
