# Google Ads API 快照与流量质量审计（2026-09-24）

> 账户：Athletik Clothing
> Customer ID：`734-505-8603`
> 采集日期：2026-09-24
> 数据窗口：2026-08-25 至 2026-09-23（最近 30 个完整自然日）
> 对照窗口：2026-07-26 至 2026-08-24（此前 30 个完整自然日）
> 账户时区：`America/New_York`
> 账户币种：CNY
> 数据来源：Google Ads API / 官方 Google Ads MCP，只读查询
> 状态：P0 平台数据快照与人工询盘初步核对均已完成

本文件记录 2026-09-24 可复现的 Google Ads 当前事实。它取代
[`google-ads-launch-2026-08-05.md`](google-ads-launch-2026-08-05.md)
作为当前配置和近期表现的引用入口；8 月 5 日文件继续保留为上线历史，不回写历史事实。

## 1. 当前账户与 Campaign 设置

| 项目 | API 当前值 |
|---|---|
| Campaign | `Leads-Search-1`（ID `24106243424`） |
| 状态 / 类型 | `ENABLED` / `SEARCH` |
| 日预算 | CNY 25，`STANDARD` delivery，非共享预算 |
| 出价策略 | `TARGET_SPEND`（Maximize Clicks） |
| 地域目标 | 仅 United States（`geoTargetConstants/2840`） |
| 地域匹配 | `PRESENCE`，即用户实际位于目标地区 |
| 网络 | Google Search only |
| Search Partners | 关闭 |
| Display Network | 关闭 |
| 最近 30 天日均花费 | CNY 24.91，约为日预算的 99.64% |

### 历史记录冲突

2026-08-05 上线记录写的是 United States + Canada；2026-09-24 API 当前设置只有
United States，且近 30 天全部 745 次展示、73 次点击和 CNY 747.28 花费均来自美国。
这说明加拿大已不在当前 Campaign 地域目标中。何时、由谁移除及原因在 API 快照中
`unavailable`，不得继续把“美国 + 加拿大”写成当前投放状态。

## 2. 两个 30 天窗口

| 指标 | 此前 30 天 | 最近 30 天 | 变化 |
|---|---:|---:|---:|
| 有流量天数 | 16 | 30 | 不同口径风险 |
| 花费 | CNY 497.29 | CNY 747.28 | +50.3% |
| 展示 | 447 | 745 | +66.7% |
| 点击 | 44 | 73 | +65.9% |
| CTR | 9.84% | 9.80% | -0.04 个百分点 |
| 平均 CPC | CNY 11.30 | CNY 10.24 | -9.4% |
| Conversions | 0 | 0 | 无可比转化 |
| Conversion rate | 0% | 0% | 无可比转化 |
| Cost per conversion | `unavailable` | `unavailable` | 无转化时不能写成 CNY 0 |

此前窗口仅 2026-08-06 至 2026-08-24 的 16 天有流量，最近窗口 30 天都有流量。
因此总量增长主要来自投放天数增加，不能直接解释为效率提升。按有流量天数标准化后，
日均花费从 CNY 31.08 降至 CNY 24.91，日均展示下降 11.1%，日均点击下降 11.5%。

## 3. Ad group 与关键词

API 只返回一个有花费的 Ad group，ID 为 `204132163812`，状态 `ENABLED`，类型
`SEARCH_STANDARD`。名称在本次 Windows MCP 输出中出现编码损坏，因此名称记为
`unavailable`，不保存乱码。

| 关键词 | Match type | 花费 | 展示 | 点击 | CTR | 平均 CPC | Quality Score / 诊断 |
|---|---|---:|---:|---:|---:|---:|---|
| `sportswear manufacturer` | PHRASE | CNY 404.66 | 352 | 40 | 11.36% | CNY 10.12 | 7；Ad relevance above average |
| `performance sportswear manufacturer` | PHRASE | CNY 141.79 | 285 | 14 | 4.91% | CNY 10.13 | `unavailable` |
| `sportswear oem` | PHRASE | CNY 84.44 | 57 | 8 | 14.04% | CNY 10.56 | `unavailable` |
| `sportswear manufacturer` | EXACT | CNY 73.95 | 34 | 7 | 20.59% | CNY 10.56 | 7；Ad relevance above average |
| `activewear manufacturer` | EXACT | CNY 42.44 | 15 | 4 | 26.67% | CNY 10.61 | 6；Landing page below average |
| `custom sportswear manufacturer` | PHRASE | CNY 0 | 2 | 0 | 0% | — | 4；Expected CTR below average |
| `activewear manufacturer` | PHRASE | CNY 0 | 0 | 0 | — | — | 6；Landing page below average |
| `technical sportswear manufacturer` | PHRASE | CNY 0 | 0 | 0 | — | — | `unavailable` |

`sportswear manufacturer` PHRASE 一项占最近 30 天 54.2% 花费和 54.8% 点击，是当前主要流量入口。
`performance sportswear manufacturer` PHRASE 占 38.3% 展示但 CTR 仅 4.91%，需要继续观察
其搜索词扩展质量；当前无转化证据，不据此立即暂停。

## 4. 搜索词可见覆盖与意图

隐私阈值下，`search_term_view` 只公开 28/73 次点击和 CNY 285.60/747.28 花费：

- 点击覆盖率：38.4%。
- 花费覆盖率：38.2%。
- 45 次点击和 CNY 461.68 花费没有可见搜索词，记为 `unavailable`。

可见的付费搜索词按意图分为：

| 候选组 | 可见点击 | 可见花费 | 可见花费占比 | 代表搜索词 | 当前结论 |
|---|---:|---:|---:|---|---|
| `keep`：明确制造商/供应商意图 | 13 | CNY 140.44 | 49.2% | `activewear manufacturer`、`sports clothing manufacturers`、`sports jersey supplier`、`leggings manufacturer` | 与 B2B 制造定位一致，保留观察 |
| `watch`：批发/现货分销意图 | 10 | CNY 97.47 | 34.1% | `wholesale activewear`、`wholesale athletic wear`、`wholesale track pants` | 可能寻找现货、分销商或低 MOQ，与 OEM 需求不完全等价 |
| `exclude-candidate`：特定品牌供应链研究 | 5 | CNY 47.69 | 16.7% | `darc sport manufacturer`、`who is young la supplier`、`sun active wholesale activewear` | 可能是品牌研究而非直接采购；仅列候选，不自动加否定词 |

以上分类只覆盖可见搜索词，不能外推到全部 Campaign 流量。当前没有任何搜索词产生可归因转化，
所以 `exclude-candidate` 仍需结合后续人工询盘与更多样本确认。

## 5. 地域、设备和网络

### 地域

- 当前只定向 United States。
- 最近 30 天流量 100% 来自 United States。
- `PRESENCE` 已启用，没有把仅对美国有兴趣但不在美国的用户计入目标流量。
- Canada 当前未配置，也没有流量。

### 设备

| 设备 | 花费 | 花费占比 | 展示 | 点击 | CTR | 平均 CPC | 转化 |
|---|---:|---:|---:|---:|---:|---:|---:|
| Mobile | CNY 643.26 | 86.1% | 654 | 63 | 9.63% | CNY 10.21 | 0 |
| Desktop | CNY 92.73 | 12.4% | 84 | 9 | 10.71% | CNY 10.30 | 0 |
| Tablet | CNY 11.29 | 1.5% | 7 | 1 | 14.29% | CNY 11.29 | 0 |

Mobile 承担 86.3% 点击，但没有转化或人工归因结果，当前不能据此调整设备出价。

### 网络

全部数据来自 `SEARCH`；Search Partners、Display Network 和 partner search 均关闭。

## 6. 展示份额与预算约束

| 指标 | 最近 30 天 |
|---|---:|
| Search impression share | `<10%`（API 阈值值 `0.0999`） |
| Search budget lost impression share | 20.68% |
| Search rank lost impression share | 72.95% |
| Search top impression share | `<10%` |
| Search absolute top impression share | `<10%` |

Campaign 几乎打满 CNY 25 日预算，但更大的曝光损失来自 Ad Rank，而不是预算。
这可能同时涉及出价、广告质量和落地页体验。由于当前没有转化证据，不能把“增加预算”
当作解决方案，也不能仅为 impression share 提升出价。

## 7. Conversion 与询盘事实

| Conversion action | 状态 | Primary | 类型 | 最近 30 天 |
|---|---|---|---|---:|
| `www.athletikapparel.com (web) generate_lead` | `ENABLED` | 是 | `GOOGLE_ANALYTICS_4_GENERATE_LEAD` | 0 |
| `www.athletikapparel.com (web) purchase` | `HIDDEN` | 否 | `GOOGLE_ANALYTICS_4_PURCHASE` | 0 |

所有者确认：近一个月没有实际表单提交；收到的询盘大部分通过邮件直接发送，暂不记录
`mailto` 点击。因此 `generate_lead = 0` 与已知表单事实一致，不单独判定为追踪故障。
同期三个目标邮箱文件夹的 20 封邮件经内容级复核，确认 5 封真实询盘、15 封非询盘。
真实询盘中 1 封自述来自一般网络渠道但未指明 Google，另外 4 封来源未知；没有一封可以
归因给 Google Ads。邮件询盘数量不能写入 Google Ads conversion，也不能用邮件日期与
广告点击时间接近代替归因证据。

## 8. 当前结论与 P0 状态

- API、账户、Campaign、预算、地域、Ad group、关键词、搜索词、设备、网络和 conversion
  数据已经可以稳定复现。
- 不增加预算，不改出价，不添加否定关键词，不调整设备或地域。
- 平台侧快照和人工邮件询盘初步核对均已完成；P0 整体转为 `已完成`。无法确认 Google Ads
  来源是核对后的证据结论，不再作为 P0 阻塞项。
- 已建立[普通 163 邮箱询盘只读分析工具](163-mail-inquiry-analysis-runbook.md)。
  [完整两个 30 天窗口快照](163-mail-inquiry-snapshot-2026-09-24.md)覆盖 `INBOX + Junk/Spam +
  Trash`：最近窗口 20 封邮件已确认 5 封真实询盘、15 封非询盘；4 封真实询盘位于 `INBOX`、
  1 封位于 Junk/Spam。
- 本机私有复核台账已经建立。下一步进入 P1，持续补齐负责人、MOQ、回复、报价、打样、成交
  或流失状态；来源无法确认时必须写 `unknown`，不得推定为 Google Ads。
