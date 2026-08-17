# Google Ads Keyword Planner 七国验证 V1

> 导出日期：2026-08-17
>
> 数据周期：2025-08-01 至 2026-07-31
>
> 覆盖地区：美国、加拿大、英国、荷兰、瑞典、挪威、芬兰；语言设置为“所有语言”
>
> 当前状态：21 个首轮候选词的七国指标、美国三批自然变体发现和关键词—页面映射 V1 已完成；28 个代表词的新版七国指标仍待补充
>
> 归一化数据：[`data/keyword-planner-country-matrix-2026-08-17.csv`](data/keyword-planner-country-matrix-2026-08-17.csv)

## 1. 本轮回答的问题

本轮使用 Google Ads Keyword Planner 检查第一批英语候选短语在北美和欧洲目标国家中的历史需求信号。Keyword Planner 当前界面使用“所有语言”，因此数据表示这些国家内、所有语言设置下对所输入英语短语的搜索，而不是只统计英语界面用户。主要回答：

1. 哪些精确表达获得了 Google 可报告的历史搜索量；
2. 需求主要出现在哪些国家；
3. 哪些高搜索量词同时存在明显错误流量或异常波动；
4. 哪些低量词仍因业务适配和跨国一致性值得保留；
5. 下一轮应该扩展哪些自然变体，而不是立即修改页面。

## 2. 数据完整性与解释边界

### 2.1 已确认

- 七份文件均包含相同的 21 个关键词；
- 七份文件的数据周期均为 2025-08-01 至 2026-07-31；
- CSV 内部地区行分别确认了 US、CA、UK、NL、SE、NO、FI；
- 用户确认 Keyword Planner 当前界面的语言设置为“所有语言”，该入口无法单独修改语言；
- 指标包括平均月搜索量、近三个月变化、同比变化、广告竞争度、页首出价和逐月搜索量；
- 账户货币为 CNY，只影响出价字段的货币显示。

### 2.2 无法从 CSV 独立确认

- CSV 本身不包含 `Language` 字段；“所有语言”来自本轮操作界面的用户确认，因此未来重新导出时仍需单独记录该设置；
- CSV 不包含 Search Network 设置字段；后续导出继续统一选择 `Google`；
- Keyword Planner 的搜索量是估算和聚合值，不是精确用户人数；
- `Competition` 与 `Competition (indexed value)` 是 Google Ads 广告竞争，不是 SEO 排名难度。

### 2.3 `NR` 与 `0` 的区别

归一化数据使用：

- `NR`：Google 没有为该精确短语报告历史搜索量，可能是数据不足、搜索量过低或被近义变体合并；
- `0`：Google 在原始导出中明确返回数字 0；
- 数字 `10`：通常处于工具可报告的最低量级，不应被理解为精确等于 10 个独立买家。

因此，`NR` 不能直接写成“没有人搜索”，也不能单独触发主题淘汰。

## 3. 七国平均月搜索量矩阵

| 关键词 | US | CA | UK | NL | SE | NO | FI | 七国合计 |
|---|---:|---:|---:|---:|---:|---:|---:|---:|
| `sportswear manufacturer` | 1,600 | 70 | 260 | 20 | 10 | 10 | 10 | 1,980 |
| `custom sportswear manufacturer` | 720 | 10 | 20 | 10 | 10 | 10 | 10 | 790 |
| `activewear manufacturer` | 480 | 30 | 110 | 10 | 10 | 10 | 10 | 660 |
| `flatlock vs overlock` | 50 | 10 | 10 | 10 | 10 | 10 | 10 | 110 |
| `merino wool clothing manufacturer` | 10 | 10 | 10 | 10 | 10 | 10 | 10 | 70 |
| `oem sportswear manufacturer` | 10 | 10 | 10 | 10 | 0 | 0 | 0 | 40 |

其余 15 个精确短语在七国均为 `NR`：

- `activewear oem manufacturer`；
- `apparel manufacturer quality control checklist`；
- `apparel supplier evaluation checklist`；
- `base layer manufacturer`；
- `flatlock seam for activewear`；
- `how to evaluate an apparel manufacturer`；
- `merino base layer manufacturer`；
- `merino wool apparel manufacturer`；
- `merino wool garment manufacturer`；
- `performance apparel manufacturer`；
- `performance underwear manufacturer`；
- `sportswear oem manufacturer`；
- `sportswear tech pack requirements`；
- `technical apparel tech pack`；
- `technical knitwear manufacturer`。

## 4. 市场分布

| 市场 | 21 个输入词的平均月搜索量合计 | 占七国合计 |
|---|---:|---:|
| 美国 | 2,870 | 78.6% |
| 英国 | 420 | 11.5% |
| 加拿大 | 140 | 3.8% |
| 荷兰 | 70 | 1.9% |
| 瑞典 | 50 | 1.4% |
| 挪威 | 50 | 1.4% |
| 芬兰 | 50 | 1.4% |
| 合计 | 3,650 | 100% |

北美合计 3,010，占 82.5%；欧洲五国合计 640，占 17.5%。这个比例只适用于本轮在“所有语言”设置下输入的 21 个英语精确短语，不能解释为 Athletik 潜在市场规模分布。各国人口规模、使用英语短语进行采购搜索的习惯、关键词选择和 `custom sportswear manufacturer` 的异常高值都会影响该比例。

## 5. 关键词层面的解释

### 5.1 `sportswear manufacturer`

- 七国合计最高，为 1,980；
- US 1,600、UK 260、CA 70，确认其是北美和英国最清晰的商业发现主干；
- NL 20，三个北欧国家均为 10，说明该英语表达存在，但量级很小；
- 美国逐月值在 260 至 5,400 之间，平均数受少数高峰月份明显影响，不能把 1,600 当作稳定的每月固定需求。

当前决策：继续作为核心商业候选词，但必须通过页面内容排除团队制服、球衣印花和低 MOQ 意图。

### 5.2 `activewear manufacturer`

- 七国合计 660，US 480、UK 110、CA 30；
- 美国月度值相对 `sportswear manufacturer` 和 `custom sportswear manufacturer` 更稳定；
- UK、CA 和欧洲小市场均有记录；
- 广告竞争在 UK、CA 和多个欧洲国家较高，说明存在商业竞价，但不代表自然排名一定更难。

当前决策：继续作为核心商业候选词，与 `sportswear manufacturer` 对照真实询盘质量和产品适配。

### 5.3 `custom sportswear manufacturer`

- 七国合计 790，其中美国 720，占该词七国总量约 91%；
- 美国逐月值在 30 至 1,900 之间，波动明显；
- 结合实时 SERP，结果大量主打团队服、印花、startup 和低 MOQ。

当前决策：搜索量不能抵消业务错配风险。保留在验证池，但不作为 Athletik 当前第一主词，也不因 720 的数值立即改 Title/H1。

### 5.4 `flatlock vs overlock`

- US 50，其余六国均为 10；
- 这是本轮唯一获得跨国历史量的信息型精确词；
- 意图仍会混入 DIY、缝纫设备和教程，但 Athletik 可以通过真实制造应用、接缝选择和 tech pack 规范形成差异。

当前决策：现有指南继续承接，优先改善专业深度和到商业页的内部链接，不新建近义页面。

### 5.5 Merino 制造词

- `merino wool clothing manufacturer` 在七国均为 10，合计 70；
- `merino wool apparel manufacturer`、`merino wool garment manufacturer` 和 `merino base layer manufacturer` 均为 `NR`；
- 数据提示 `clothing manufacturer` 是本轮最自然的可报告表达，但最低量级数据存在取整和聚合限制。

当前决策：Merino 仍是高业务适配的窄商业主题；优先围绕 `merino wool clothing manufacturer` 验证 SERP 和真实询盘，不为三个近义表达分别建页。

### 5.6 OEM 语序

- `oem sportswear manufacturer` 在 US、CA、UK、NL 各为 10，在 SE、NO、FI 为 0；
- `sportswear oem manufacturer` 在七国均为 `NR`；
- 这可能来自语序偏好、搜索量过低或 Google 近义聚合，不能证明 OEM 概念没有商业价值。

当前决策：使用 `OEM sportswear manufacturer` 作为研究和支持变体；OEM 继续作为生产模型与资格语言，不单独创建近义页面。

### 5.7 其余 `NR` 主题

以下两类必须区分：

1. 表达可能过长或不自然，例如 `apparel manufacturer quality control checklist`、`sportswear tech pack requirements`；应进入“发现新关键字”寻找更自然的 `garment quality control`、`apparel QC`、`tech pack` 变体。
2. 主题本身可能真的很窄，例如 `performance underwear manufacturer`、`technical knitwear manufacturer`；应结合 SERP、GSC 和询盘，而不是机械缩短后强行追量。

## 6. 更新后的验证优先级

| 主题 | 需求信号 | 业务适配 | 当前处理 |
|---|---|---|---|
| Sportswear manufacturer | 强 | 高，但错误流量明显 | 核心商业验证词 |
| Activewear manufacturer | 中强且相对稳定 | 高 | 核心商业验证词 |
| Custom sportswear manufacturer | 美国强、其他市场弱且波动 | 中等 | 谨慎保留，不主导定位 |
| Merino wool clothing manufacturer | 低但七国一致 | 高 | 窄商业高价值词 |
| OEM sportswear manufacturer | 很低 | 高 | 支持生产模型，继续验证自然语序 |
| Flatlock vs overlock | 小而跨国 | 高信息适配 | 现有指南主题 |
| 其余 15 个精确短语 | 未报告 | 各不相同 | 先做自然变体发现，不直接淘汰 |

## 7. 下一步

### 7.1 关键词自然变体发现

使用 Keyword Planner“发现新关键字”，按每批最多 10 个种子词拆成三个任务集：

1. 商业发现：sportswear、activewear、performance apparel、OEM、manufacturer、production partner；
2. 产品材料：performance underwear、base layer、Merino、outdoor、knitted fabric；
3. 采购问题：tech pack、quality control、supplier evaluation、factory audit、flatlock/overlock。

先在 US、CA、UK 发现英语变体。由于当前“所有语言”设置不会自动把英语输入词翻译为当地表达，荷兰和北欧仍需另行输入本地语言种子词，并研究当地买家使用本地语言或英语搜索的切换情况，不能只复制英美词表。

美国商业发现首批结果已记录在 [`keyword-discovery-commercial-us-v1.md`](keyword-discovery-commercial-us-v1.md)。该轮确认 `fitness clothing manufacturer` 是新的高优先级次级商业词，同时排除了大量 teamwear、uniform、printing、POD 和 startup/low-MOQ 扩展词。下一批转向产品与材料主题。

三批自然变体发现和首版页面映射现已完成，统一决策与下一轮 28 词清单见 [`keyword-page-mapping-v1.md`](keyword-page-mapping-v1.md)。

### 7.2 逐国 SERP 与一方数据

- 对核心商业词继续记录逐国自然前 10 名和错误意图比例；
- 从去标识化询盘/RFQ 中验证 `sportswear`、`activewear`、`performance apparel` 和 `OEM` 的真实使用频率；
- 等 GSC 积累非品牌曝光后，检查 Google 实际把现有页面匹配到哪些近义词；
- 在完成以上验证前，不修改 URL、Title、H1 或建立国家页面。
