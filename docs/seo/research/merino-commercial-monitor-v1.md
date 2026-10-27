# Merino 商业查询固定监测 V1

> 建立日期：2026-10-23（Asia/Shanghai）
>
> 所属项目：SEO-V2-005，不新增 Backlog 项
>
> 状态：`configured / baseline-partial / no-site-change`

所有者批准先执行商业词固定观察。产品开发样例由所有者选材，行业引用机会由所有者继续关注；本轮不实施这两项，也不修改公开页面、URL、Title、Meta、H1、Schema、图片或内链。

## 1. 冻结查询与页面归属

目标页面：<https://www.athletikapparel.com/merino-wool-manufacturer/>。

| ID | 精确查询 | 观察任务 |
|---|---|---|
| M01 | `merino wool apparel manufacturer` | 当前页面标题使用的制造商表达 |
| M02 | `merino wool clothing manufacturer` | 既有 GSC 中出现的同意图变体，单独记录，不替代 M01 |
| M03 | `merino wool base layer manufacturer` | 贴身层制造采购 |
| M04 | `merino wool underwear manufacturer` | Merino underwear 制造采购 |

- SERP 为四词 × US / GB / CA，共 12 个独立单元；English、Google、Desktop、`depth=50`、DataForSEO，保留每次实际 location、checkedAt、effectiveKeyword、返回行数和错误。
- 不将 `clothing manufacturers` 复数、其他长尾或品牌 / 网址词混入上述四个精确查询。新查询进入旁侧研究池，不为改善成绩而替换固定词。
- 主指标为目标页面的 `rankGroup`；保留 `rankAbsolute` 但不混用。其他 Athletik URL 若出现，另记域内排名与页面归属复核，不把它算作 Merino 页排名。
- `ultramerino.com`、`powermerino.com` 等不同域名均不计入主站成绩；不因这项观察合并、跳转或互链。

## 2. 已建立的本地配置

`seo` CLI 已实际保存并回读查询组 `merino-commercial-core-v1`：

```text
site: sc-domain:athletikapparel.com
dimension: query
matchType: regex
pattern: ^(merino wool apparel manufacturer|merino wool clothing manufacturer|merino wool base layer manufacturer|merino wool underwear manufacturer)$
```

查看命令：

```powershell
seo-clash content-groups list --site sc-domain:athletikapparel.com --json
```

这是本地可复用查询组，不是后台抓取服务或已启用的原生 rank-tracking keyword set。尚未安装 Windows Task Scheduler、cron、日历提醒或自动付费任务；后续需按本记录发起复查。CLI 的 `monitoring` 当前主要处理技术监测，不能把它的存在表述为本清单已自动运行。

## 3. 两类数据严格分开

### GSC：真实搜索展示与点击

- Property 为 `sc-domain:athletikapparel.com`，`type=web`，使用 `dataState=final`。
- 固定基线为 2026-09-23～10-20，共 28 日。全站 Date 查询返回连续 28 个 final 日期，证明所选窗口已覆盖；不据此宣称 10-20 是属性最新 final 日。
- 每次用 `page equals` 精确限定目标页面，分别读取 Page 总量、Query × Page、Country × Device，以及 Query × Page × Country × Device。`rowLimit=25000`；遇到行数上限时继续分页或明确 capped。
- Page 总量保留所有国家 / 设备；市场对照单独看 `usa / gbr / can`、Desktop。不得把全设备 GSC 平均位置直接与 Desktop 单次 SERP 当成同一指标。
- 查询不返回行写 `not-returned`，不写零曝光 / 零排名；国家、设备和 Query 聚合不闭合时保留差额，不能补算或猜词。

### SERP：指定环境的当次名次

| 状态 | 含义 | 数值记录 |
|---|---|---|
| `ranked` | 目标规范 URL 出现在成功返回的自然结果中 | 实际 `rankGroup` 与 URL |
| `not-observed-within-depth` | 成功完整返回配置深度，但其中没有目标 URL | 排名留空，注明“本次返回的 Top 50 未出现” |
| `unavailable` | 内部错误、网络失败或超时 | 排名留空并保留原始错误，不计为排名丢失 |
| `not-checked` | 本周期未请求该单元 | 排名留空，不能沿用旧值冒充当期结果 |
| `partial / corrected-query` | 返回范围不足或搜索词被纠正 | 保留实际范围与有效词，不直接与原查询完整快照比较 |

不能用 `51`、`100` 等虚拟名次代替未观测或失败。保留 provider 的排序，不因重复 URL 重新编排名次。

## 4. 初始 SERP 台账

下表是“最近一次记录”，不是同一天的完整三市场排名。10-20 来源为本对话此前已取得的 Top 50 快照；10-23 仅补此前缺失的 apparel 三市场，不再次购买已有五组历史结果。

| 精确查询 | US | GB | CA |
|---|---|---|---|
| `merino wool apparel manufacturer` | **28**；10-23 | `unavailable`；10-23 | `unavailable`；10-23 |
| `merino wool clothing manufacturer` | Top 50 未出现；10-20 | Top 50 未出现；10-20 | Top 50 未出现；10-20 |
| `merino wool base layer manufacturer` | `unavailable`；10-20 | `unavailable`；10-20 | `unavailable`；10-20 |
| `merino wool underwear manufacturer` | Top 50 未出现；10-20 | `unavailable`；10-20 | Top 50 未出现；10-20 |

今日 US 的证据为 `checkedAt=2026-10-23T05:43:58Z`（北京时间 13:43:58），task ID `10230543-2417-0139-0000-d677d4911e48`。返回 50 条自然结果、0 invalid row、未纠正查询、cache bypass；目标 URL 为自然顺序第 28、absolute 第 32、page 3。不能把这解读为从“无排名”升至 28，之前同一 apparel 单元没有有效基线。

今日 GB / CA 均返回 `PROVIDER_UNAVAILABLE / dataforseo did not respond within 15000ms.`。没有降深度、换词、用 `site:` 搜索或人工浏览器结果替代；不连续付费重试。今日为 1/3 成功；最近记录矩阵为 6/12 有成功快照、6/12 不可得，历史五组均明确保留 10-20 日期。

历史成功 task ID：

- M02 US：`10200904-2417-0139-0000-d97f95400b29`
- M02 GB：`10200904-2417-0139-0000-11d348bd540d`
- M02 CA：`10200904-2417-0139-0000-155c37b21b73`
- M04 US：`10200906-2417-0139-0000-677c9a7b1f85`
- M04 CA：`10200906-2417-0139-0000-80921db8bdea`

## 5. GSC 初始基线与限制

2026-10-23 采集，窗口 2026-09-23～10-20：

| 维度 | 返回行数 | Clicks | Impressions | 说明 |
|---|---:|---:|---:|---|
| 精确 Page | 1 | 4 | 177 | CTR 2.26%，Page average position 6.5593，不是 M01 的名次 |
| Query × Page | 5 | 0 | 13 | 未截断，但匿名化 / 未返回数据缺口仍存在 |
| Country | 3 | 0 | 13 | 与 Page 不闭合；市场完整性为 partial |
| Country × Device | 4 | 0 | 13 | 与 Page 不闭合；不用于市场增长判断 |
| Query × Page × Country × Device | 5 | 0 | 13 | 仅限这些可见行，不能外推 |

Query × Page 全部返回行：

| Query | Clicks | Impressions | Average position | 归类 |
|---|---:|---:|---:|---|
| `blend` | 0 | 1 | 2 | 泛词，不作为目标 |
| `i want blanks` | 0 | 1 | 5 | 未确认采购匹配，不据此调整定位 |
| `merino wool clothing manufacturers` | 0 | 1 | 10 | 相邻复数观察词，不混入 M02 |
| `stretch performance base layers oem` | 0 | 1 | 17 | 次级观察，不替代 M03 |
| `www.athletikapparel.com` | 0 | 9 | 9.7778 | 网址词，不计非品牌目标词 |

四个固定精确查询都未返回行，不能写成零曝光；13 次可见 Query 曝光不能代表 177 次 Page 曝光，4 次页面点击也不能归给某个可见查询。国家单维控制查询同样只有 13 次曝光，因此不能仅用“增加 Country × Device 维度”解释缺口；原因未证实，后续在同源控制与数据口径明确前保持 partial，不回填数据。

GSC 探测首次 `INTERNAL_ERROR / fetch failed`，相同请求只重试一次后成功；没有重做 OAuth、安装工具或修改代理持久配置。后续 final Date 与目标页五组查询均取得数据，窗口完整性与细分覆盖限制分开记录。

## 6. 节奏、预算与下一节点

| 节奏 | 工作 | 下一节点 |
|---|---|---|
| 每周 | GSC final 28 天滚动观察，保留所有可见查询并单列固定四词；检查数据缺口与实际落地 URL | 2026-10-30；届时验证窗口末日是否 final，不自动假设延迟天数 |
| 每 28 天 | 固定 12 单元 Desktop Top 50 复测，所有单元保留实际采集日期 | 下一批分 2026-11-20 / 2026-11-21 两天执行 |
| 首个独立 GSC 对比 | 基线 09-23～10-20 对比 10-21～11-17，各 28 天；后窗等 final 覆盖后读取 | 预计 2026-11-20 起核验，不保证届时平台一定已完整 |

- 周度滚动窗口互相重叠，只用于监测，不当作独立重复实验。页面原有 Merino 2026-12-06 Day 90 不变；本轮没有网站改动，不设新的改动 Day 0 或声称改动收益。
- 成功 Top 50 请求实付约 USD 0.01/次，12 单元基础预算约 USD 0.12/轮。原定 11-20 查 M01/M02 六组、11-21 查 M03/M04 六组、基础约 USD 0.06/天的执行计划保持；不因提高金额限额自动提前监测、合并日期或扩大固定查询。
- 每批开始前检查 `providers dataforseo limits` 与 `spend`。所有者于 **2026-10-27** 明确将原金额限额提高十倍，现行为每日提醒 **USD 0.50**、每日硬限额 **USD 1.00**、每月硬限额 **USD 5.00**；每报告最多 10 次请求、1000 行不变。同批仍计入已用费用、未知预留、其他任务和账户余额，详见 [SEO Process 成本控制](../seo-process.md)。
- 不自动调高限额、充值或持续付费排错；每个失败单元最多重试一次，且总请求 / 预算不足时宁可保留不可得。若同一词持续内部错误，下一次有新条件或到期节点再查，不换词冒充恢复。
- 本次只请求三组 apparel 初始快照，未授权后台自动执行；上述日期为项目执行计划，不是已建立的自动提醒或定时器。
- 2026-10-23 建立本计划时，本机费用台账为 3 次请求、USD 0.01 已知实际费用、USD 0.02 未知费用预留，合计有效占用 USD 0.03；当时限额为原配置，未临时提高。该历史快照保留，现行限额采用上述 10-27 所有者批准值。未知预留不是已确认扣费，不能只报成功请求费用而忽略失败请求。

## 7. 可复现请求与决策闸门

SERP 单元模板，每次从表中取精确词与国家：

```powershell
$serpParams = @{
  keyword = 'merino wool apparel manufacturer'
  countryCode = 'us'
  languageCode = 'en'
  searchEngine = 'google'
  device = 'desktop'
  depth = 50
  provider = 'dataforseo'
  refresh = $true
} | ConvertTo-Json -Compress
seo-clash reports run serp-results --params $serpParams --json
```

GSC 目标页精确请求模板，`dimensions` 分别使用第 5 节五种组合，日期须先经过 final 窗口核验：

```powershell
$gscBody = @{
  startDate = '2026-09-23'
  endDate = '2026-10-20'
  type = 'web'
  dataState = 'final'
  dimensions = @('query', 'page', 'country', 'device')
  dimensionFilterGroups = @(@{ filters = @(@{
    dimension = 'page'
    operator = 'equals'
    expression = 'https://www.athletikapparel.com/merino-wool-manufacturer/'
  }) })
  rowLimit = 25000
} | ConvertTo-Json -Depth 8 -Compress
seo-clash gsc-query --site sc-domain:athletikapparel.com --body $gscBody --refresh --json
```

只有同词、同市场、同设备、同深度的有效快照才比较名次；进入前 20 / 前 10、URL 变化和 GSC 可见商业查询增长都是调查信号，不单独证明因果。达到可比较 Query / Page 曝光门槛且存在明确 CTR 假设后，才另行申请 Title / Meta 单变量实验；不因 Page 平均位置或一次快照自动改页。新的真实产品材料可以按既有 B 类规则另行评估，不因本清单而拖延或自动实施。

处置：监测配置 `configured / measuring`；SERP 失败与国家细分不闭合为 Info / `deferred`，不是排名损失或索引故障。US 报告的 8 个 `repeated-domain` 仅为结果分布观测，统一 `no-change`；本轮不作整站技术通过声明，不提交索引，不读取 GA4、Google Ads 或邮箱。
