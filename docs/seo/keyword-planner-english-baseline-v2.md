# Google Ads Keyword Planner 七国英语基线 V2

> 完成日期：2026-08-17
>
> 数据周期：2024-08-01 至 2026-07-31（24 个月）
>
> 覆盖地区：美国、加拿大、英国、荷兰、瑞典、挪威、芬兰
>
> 输入语言：28 个英语代表词；Keyword Planner 界面设置为“所有语言”
>
> 归一化数据：[`data/keyword-planner-english-baseline-v2-2026-08-17.csv`](data/keyword-planner-english-baseline-v2-2026-08-17.csv)
>
> 当前状态：英语基线已完成；下一阶段为 US / CA / UK 的 P0/P1 SERP 意图验证

## 1. 本轮结论

28 个代表词的七国英语基线已经完整取得。当前证据支持以下判断：

1. `sportswear manufacturer` 是最强的商业发现主词，七国合计 2,070；
2. `activewear manufacturer`、`fitness clothing manufacturer`、`underwear manufacturer`、
   `yoga clothes manufacturer` 和 `gym clothing manufacturers` 均有可报告需求，但部分词存在
   startup、低 MOQ、teamwear、seamless、消费购物或通用服装意图，必须继续核查 SERP；
3. `clothing tech pack` 七国合计 1,520，确认现有 Tech Pack 指南所在主题具有明显的信息与采购准备需求；
4. `outdoor clothing manufacturer`、`knitted fabric manufacturer` 和
   `merino wool clothing manufacturer` 的量级较小，但与现有页面和业务能力直接匹配；
5. `technical knitwear manufacturer`、`silk wear manufacturer`、`base layer manufacturer` 和
   `performance underwear manufacturer` 七国均为 `NR`，只能解释为 Google 未报告这些精确表达，
   不能据此删除页面或改变网站定位；
6. 英语需求主要来自美国、英国和加拿大；荷兰及北欧的英语数据较小，仍需单独开展本地语言发现。

本轮只完成需求与市场分布基线，不授权修改 URL、Title、H1、Meta、正文或 Schema。

## 2. 数据来源与完整性

### 2.1 七份原始导出

| 国家 | 原始文件 | 有效目标词 |
|---|---|---:|
| 美国 | `Saved Keywords Stats 2026-08-17 at 13_28_19.csv` | 28 |
| 英国 | `Saved Keywords Stats 2026-08-17 at 13_29_09.csv` | 28 |
| 加拿大 | `Saved Keywords Stats 2026-08-17 at 13_29_34.csv` | 28 |
| 荷兰 | `Saved Keywords Stats 2026-08-17 at 13_30_30.csv` | 28 |
| 瑞典 | `Saved Keywords Stats 2026-08-17 at 13_30_47.csv` | 28 |
| 挪威 | `Saved Keywords Stats 2026-08-17 at 13_31_12.csv` | 28 |
| 芬兰 | `Saved Keywords Stats 2026-08-17 at 13_31_35.csv` | 28 |

七份文件的目标词集合一致，均包含 28 个有效代表词。

### 2.2 已排除的伪关键词 `keyword`

上传 CSV 的表头 `Keyword` 被 Google 当作一个普通搜索词写入了七份原始导出，导致每份文件实际出现
29 行关键词，并使顶部“所有/国家”总量包含了与本项目无关的通用词 `keyword`。

处理方式：

- 从归一化数据中排除大小写归一后的 `keyword` 行；
- 不使用原始文件顶部的总量；
- 使用剩余 28 个目标词重新计算国家、地区和七国合计；
- 28 个目标词的逐词指标不受该表头行影响。

### 2.3 与 V1 的周期差异

本批文件覆盖 2024-08 至 2026-07，共 24 个月；旧版 21 词 V1 覆盖 2025-08 至 2026-07，
共 12 个月。两版的关键词集合和统计周期均不同，因此不能把数值变化解释为同比增长或下降。
V1 继续作为历史探索记录，V2 是当前 28 词英语基线。

## 3. 解释边界

- `Avg. monthly searches` 是 Keyword Planner 的估算与近义聚合值，不是独立买家数量；
- `NR` 表示 Google 没有报告历史搜索量，可能是量低、数据不足或近义合并，不等于零需求；
- `0` 是文件明确报告的零值，与 `NR` 分开保留；
- 七国、北美和欧洲合计是简单算术和，只用于比较本轮代表词，未按人口或采购规模加权；
- `Competition` 和竞价字段属于 Google Ads，不是自然搜索 SEO 难度；
- “所有语言 + 英语输入词”只构成英语买家语言基线，不覆盖荷兰语、瑞典语、挪威语或芬兰语的完整需求；
- 代表词池同时包含商业页词和信息型指南词，因此国家总量不能解释为各国 OEM 市场规模。

## 4. 七国平均月搜索量矩阵

| 关键词 | US | CA | UK | NL | SE | NO | FI | 七国合计 |
|---|---:|---:|---:|---:|---:|---:|---:|---:|
| `sportswear manufacturer` | 1,600 | 70 | 320 | 50 | 10 | 10 | 10 | 2,070 |
| `clothing tech pack` | 880 | 140 | 390 | 50 | 30 | 20 | 10 | 1,520 |
| `fitness clothing manufacturer` | 880 | 20 | 40 | 10 | 10 | 10 | 10 | 980 |
| `activewear manufacturer` | 480 | 40 | 140 | 10 | 10 | 10 | 10 | 700 |
| `yoga clothes manufacturer` | 590 | 10 | 20 | 10 | 10 | 10 | 10 | 660 |
| `underwear manufacturer` | 480 | 30 | 70 | 10 | 10 | 10 | 10 | 620 |
| `gym clothing manufacturers` | 260 | 20 | 110 | 10 | 10 | 10 | 10 | 430 |
| `compression shirt manufacturer` | 260 | 10 | 10 | 10 | 10 | 10 | 10 | 320 |
| `outdoor clothing manufacturer` | 90 | 10 | 70 | 10 | 10 | 10 | 10 | 210 |
| `apparel tech pack` | 70 | 10 | 10 | 10 | 10 | 10 | 10 | 130 |
| `knitted fabric manufacturer` | 70 | 10 | 10 | 10 | 10 | 10 | 10 | 130 |
| `sportswear suppliers` | 40 | 10 | 40 | 10 | 10 | 10 | 10 | 130 |
| `sportswear fabric manufacturer` | 70 | 10 | 10 | 10 | 10 | 10 | 0 | 120 |
| `flatlock stitch vs overlock` | 50 | 10 | 10 | 10 | 10 | 10 | 10 | 110 |
| `garment quality control` | 30 | 10 | 40 | 10 | 10 | 10 | 0 | 110 |
| `flatlock stitch vs coverstitch` | 30 | 10 | 10 | 10 | 10 | 10 | 10 | 90 |
| `merino wool clothing manufacturer` | 20 | 10 | 10 | 10 | 10 | 10 | 10 | 80 |
| `clothing quality control checklist` | 20 | 10 | 10 | 10 | 10 | 0 | 10 | 70 |
| `sportswear tech pack` | 10 | 10 | 10 | 10 | 10 | 10 | 10 | 70 |
| `activewear tech pack` | 10 | 10 | 10 | 10 | 10 | 10 | 0 | 60 |
| `oem sportswear manufacturer` | 10 | 10 | 10 | 10 | 10 | 0 | 10 | 60 |
| `how to choose a clothing manufacturer` | 10 | 10 | 10 | 10 | NR | 10 | NR | 50 |
| `sports accessories manufacturer` | 10 | 0 | 10 | 0 | 10 | 0 | 10 | 40 |
| `garment factory audit` | 10 | 0 | 10 | 10 | NR | NR | 0 | 30 |
| `base layer manufacturer` | NR | NR | NR | NR | NR | NR | NR | 0* |
| `performance underwear manufacturer` | NR | NR | NR | NR | NR | NR | NR | 0* |
| `silk wear manufacturer` | NR | NR | NR | NR | NR | NR | NR | 0* |
| `technical knitwear manufacturer` | NR | NR | NR | NR | NR | NR | NR | 0* |

`0*` 只是为了便于矩阵排序而计算的报告值合计；实际状态为七国均 `NR`，不能写成已证明零需求。

## 5. 市场分布

| 市场 | 28 个目标词的重新计算合计 | 占七国合计 |
|---|---:|---:|
| 美国 | 5,980 | 68.0% |
| 英国 | 1,380 | 15.7% |
| 加拿大 | 480 | 5.5% |
| 荷兰 | 310 | 3.5% |
| 瑞典 | 240 | 2.7% |
| 挪威 | 210 | 2.4% |
| 芬兰 | 190 | 2.2% |
| 合计 | 8,790 | 100.0% |

北美合计 6,460，占 73.5%；欧洲五国合计 2,330，占 26.5%。欧洲内部以英国英语需求最明显。
荷兰和北欧的较低数值不能用于否定这些市场，因为当前输入仍然是英语，也没有做人口或商业规模归一化。

## 6. 页面与主题层面的基线结论

| 当前承接页面/主题 | 主要证据 | 当前判断 |
|---|---|---|
| `/sportswear-manufacturer/` | `sportswear manufacturer` 2,070；Activewear 700；Fitness 980；Yoga 660；Gym 430；Compression 320 | 当前最强商业机会页；保持 Sportswear 为主词，其他词作为需经 SERP 验证的次级产品意图，不拆平行页面 |
| `/underwear-manufacturer/` | `underwear manufacturer` 620；Base layer 和 Performance underwear 均为 NR | 通用主词有需求，但混合时尚/内衣意图；需确认技术内衣买家占比，不因两个 NR 改页 |
| `/outdoor-clothing-manufacturer/` | 210，且欧洲 110 略高于北美 100 | 体量中等但业务匹配明确；进入 US / UK SERP 核查 |
| `/knitted-fabrics-manufacturer/` | `knitted fabric manufacturer` 130；`sportswear fabric manufacturer` 120 | 窄而明确的 B2B 面料主题，继续独立承接，不与成衣页合并 |
| `/merino-wool-manufacturer/` | 80，七国均有报告 | 低量但跨市场一致且业务适配高；保留现有页面，不为近义词拆页 |
| `/sports-accessories-manufacturer/` | 40，并含 3 个明确零值 | 当前英语信号弱；等待 GSC、SERP 与询盘，不删除页面 |
| `/silk-wear-manufacturer/` | 七国均 NR | 当前精确表达没有可报告信号；需要自然变体发现，不能直接判定页面无价值 |
| 首页 Technical knitwear 定位 | `technical knitwear manufacturer` 七国均 NR | 这是定位语而非已验证的高量发现词；首页保持现状，等待 GSC 和自然表达研究 |
| Tech Pack 指南 | Clothing 1,520；Apparel 130；Sportswear 70；Activewear 60 | 信息主题已获得强需求信号；先验证不同查询的 SERP 类型和现有指南覆盖，不新建四个近义页面 |
| FLATLOCK 指南 | vs OVERLOCK 110；vs COVERSTITCH 90 | 小而稳定的跨市场技术主题；继续由现有指南集中承接 |
| OEM Evaluation 指南 | How to choose 50；Factory audit 30 | 搜索量低但买家阶段靠后；保留高业务价值，不以量级淘汰 |
| QC 指南候选 | Garment QC 110；Checklist 70 | 支持继续做 SERP 和一方证据验证；仍是未批准候选，不创建 URL |

## 7. 下一步验证队列

英语基线完成后，下一步不再重复导出 Keyword Planner。按以下顺序检查 US、CA、UK 的自然结果页：

### P0：现有商业页

1. `sportswear manufacturer`；
2. `activewear manufacturer`；
3. `fitness clothing manufacturer`；
4. `underwear manufacturer`；
5. `outdoor clothing manufacturer`；
6. `knitted fabric manufacturer`。

### P1：现有指南与内容缺口

1. `clothing tech pack`；
2. `garment quality control`；
3. `flatlock stitch vs coverstitch`；
4. `how to choose a clothing manufacturer`。

每个词至少记录：前 10 名页面、页面类型、服务对象、B2B/OEM 相关性、低 MOQ/startup/消费意图比例、
本地供应商偏好、可进入的内容角度以及当前 Athletik 页面是否匹配。SERP 验证完成后，才更新关键词—页面映射
和最多三个优先优化机会。随后再建立 NL / SE / NO / FI 的本地语言研究批次。
