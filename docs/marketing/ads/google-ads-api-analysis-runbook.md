# Google Ads API 只读分析操作手册

> 建立日期：2026-09-28
> 账户：Athletik Clothing
> Customer ID：`734-505-8603`（API 参数使用无连字符形式 `7345058603`）
> 当前已知账户时区：`America/New_York`
> 当前已知账户币种：CNY
> Agent 入口：Google Ads MCP 的 `customers`、`metadata` 与 `search` 只读工具
> 用途：让未来 Agent 可复现 Google Ads 快照与阶段复盘，不修改广告设置

历史数据和配置以日期化快照为准。最近一次已完成基线是
[`Google Ads API 快照与流量质量审计（2026-09-24）`](google-ads-api-snapshot-2026-09-24.md)；
它不是永久当前值，后续报告“当前状态”前必须重新查询。

## 1. 授权与只读边界

- 只有所有者在当前对话中明确要求读取、分析、复盘或检查 Google Ads 时，Agent 才调用 MCP。
- 默认只允许读取。不得修改 Campaign、预算、出价、地域、设备、广告、关键词、否定关键词、
  conversion action、受众或账户设置。
- 即使以后 MCP 出现 mutation / create / update / remove 工具，本手册也不授权使用。
- Customer ID 不是密钥，可以保留在内部文档；OAuth token、developer token、client secret、刷新
  token 或其他凭据不得输出、写入仓库或要求所有者粘贴到聊天中。
- 如工具缺失或认证失效，停止并报告阻塞；不要擅自创建服务账号、OAuth 客户端或重新申请 API
  权限。
- 平台 conversion 与人工确认询盘必须分开。没有明确自述、UTM/GCLID 或 CRM 证据时，不得把
  邮件询盘归因给 Google Ads。

## 2. 当前 MCP 工具

未来 Agent 应先确认以下工具存在：

| 工具 | 用途 |
|---|---|
| `mcp__google_ads__customers_list_accessible_customers` | 列出当前 OAuth 主体直接可访问的 Customer ID |
| `mcp__google_ads__metadata_get_resource_metadata` | 返回某个 resource 可选择、筛选、排序的字段、metrics 和 segments |
| `mcp__google_ads__search_search` | 对指定 Customer ID 执行只读 Google Ads API 查询 |

`metadata_get_resource_metadata` 是每种 resource 的前置步骤。不得根据旧快照或记忆猜字段；先取
metadata，再构造 `search_search` 的 `fields`、`conditions` 和 `orderings`。metadata 可以在同一
次任务中缓存，但跨较长时间复盘时应重新核对。

## 3. Agent 标准接手流程

### 3.1 确认账户访问

1. Customer ID 已由所有者明确提供，不需要遍历账号发现目标。
2. 可调用 `mcp__google_ads__customers_list_accessible_customers` 做 OAuth 基础检查；该工具只列出
   当前主体直接可访问的客户，经理账号层级中的下级账号不一定直接出现在列表中。
3. 以目标 ID 发起最小 `customer` metadata + 只读 search，才是本任务访问是否成功的最终检查。
4. 只有目标查询返回权限或认证错误时，才写 `blocked / authentication-or-access`；不把旧快照写成
   当前值。
5. 仍只能查询 `7345058603`，不得遍历或分析其他客户账号。

### 3.2 固定日期窗口

先用 `customer` resource 重新读取 `customer.id`、`customer.descriptive_name`、
`customer.currency_code` 和 `customer.time_zone`。报告日期必须按 API 返回的账户时区计算。

默认比较两个完整 30 天窗口，并排除运行当天：

- 最近 30 天：`as-of - 30 days` 至 `as-of - 1 day`。
- 此前 30 天：`as-of - 60 days` 至 `as-of - 31 days`。

示例：`as-of = 2026-09-28` 时，最近窗口为 2026-08-29～2026-09-27，此前窗口为
2026-07-30～2026-08-28。不要继续复用 2026-09-24 快照的旧窗口。

每个窗口单独查询并在报告顶部写明 `as-of`、开始日期、结束日期、账户时区与币种。如果用户指定
其他窗口，按用户窗口执行，但仍要明确是否包含当天、是否为完整自然日。

### 3.3 查询前读取 metadata

至少对本次实际使用的 resource 逐一调用 metadata：

- `customer`
- `campaign`
- `campaign_budget`
- `ad_group`
- `keyword_view`
- `search_term_view`
- `campaign_criterion`
- `geographic_view` 或 metadata 中可用的实际地域 resource
- `conversion_action`

如果某字段不在 `selectable`、某 condition 不在 `filterable`，或字段之间不兼容，应缩小查询或
改用兼容 resource，不得虚构返回值。编码损坏的名称写 `unavailable / encoding`，不要保存乱码。

### 3.4 执行只读查询

`search_search` 使用结构化参数，不直接拼接完整 GAQL。调用形状如下：

```text
customer_id: "7345058603"
resource: "campaign"
fields:
  - campaign.id
  - campaign.name
  - campaign.status
  - metrics.impressions
  - metrics.clicks
  - metrics.cost_micros
conditions:
  - segments.date BETWEEN '<start>' AND '<end>'
orderings:
  - campaign.id ASC
limit: 1000
```

上例只说明调用结构；实际字段必须以前一步 metadata 为准。`<start>` / `<end>` 必须替换为本次
动态窗口。若返回行数达到 `limit`，结果可能截断；应提高安全 limit 或按日期/Campaign 拆分查询，
并在确认全部取回前把明细标为 `partial`。

## 4. 最低查询清单

### 4.1 账户与 Campaign 配置

读取并记录：

- 账户名称、Customer ID、时区、币种、是否 test / manager account；
- Campaign ID、名称、状态、渠道类型、开始/结束日期；
- 日预算、delivery method、是否共享预算；
- 出价策略类型及可用目标；
- Google Search、Search Partners、Display / Content Network 等网络设置；
- 正向地域匹配类型、当前地域目标和排除地域。

当前已知 `Leads-Search-1`、United States、CNY 25 等只能作为 2026-09-24 历史参照，不能跳过
本次 API 查询。

### 4.2 两窗口表现

Campaign 层至少读取并对比：

- `metrics.cost_micros`
- `metrics.impressions`
- `metrics.clicks`
- `metrics.ctr`
- `metrics.average_cpc`
- `metrics.conversions`
- `metrics.conversions_from_interactions_rate`
- `metrics.cost_per_conversion`

同时用 `segments.date` 取得逐日结果，以确认有流量天数和是否存在中断。不要把不同有流量天数的
总量变化直接解释成效率变化。

### 4.3 结构与流量质量

- Ad group：ID、名称、状态、类型及同一组表现指标。
- Keyword：`keyword_view` 中的 keyword text、match type、状态、Quality Score/可用诊断及表现。
- Search term：`search_term_view` 中可见搜索词及表现；仅作可见样本，不代表全部查询。
- Device：使用 metadata 支持的 `segments.device` 分解 Campaign 表现。
- Network：使用 metadata 支持的 `segments.ad_network_type` 分解流量。
- Geography：用实际可用的地域 resource 与字段记录用户地域表现，并与 Campaign 的目标地域
  设置分开，不将“流量来自某地”写成“该地被定向”。
- Impression share：读取可用的 Search impression share、budget lost、rank lost、top 与
  absolute top 指标。
- Conversion action：用 `conversion_action` resource 读取名称、状态、Primary、类别与来源；窗口内
  conversion 使用 metadata 支持的 Campaign/Customer metrics 加 `segments.conversion_action` 等
  兼容分段查询，不能假定配置 resource 本身支持表现 metrics。隐藏 action 仍需列出。

## 5. 指标口径

- API 金额通常为 micros；展示为账户币种前先除以 `1,000,000`。
- CTR 使用 API 返回值或 `clicks / impressions` 复核；无 impressions 时写 `unavailable`。
- 平均 CPC 使用 API 返回值或 `cost / clicks` 复核；无 clicks 时写 `unavailable`，不是 0。
- Conversion rate 优先使用 `metrics.conversions_from_interactions_rate`，并注明 Google Ads 的
  interaction 口径；Search 中通常对应点击，但不要跨广告类型无条件写成 `conversions / clicks`。
- Conversions 为 0 时，cost per conversion 写 `unavailable`，不得写 CNY 0。
- 百分比变化以此前窗口为分母；此前值为 0 时写 `not comparable`，不得输出无限百分比。
- 报告至少同时保留绝对值、百分点变化和必要的按有流量天数标准化结果。

## 6. 搜索词隐私阈值与覆盖率

Google Ads 会省略部分低量搜索词。未来 Agent 必须分别汇总：

- Campaign 总点击与总花费；
- `search_term_view` 可见点击与可见花费；
- 可见点击覆盖率；
- 可见花费覆盖率；
- 差额，标记为 `unavailable / privacy-threshold`。

不能把可见搜索词的意图占比外推到全部流量，也不能把未返回搜索词记为零。任何
`keep / watch / exclude-candidate` 只属于分析建议；除非所有者另行明确授权，不添加否定关键词。

## 7. Conversion 与人工询盘核对

- Google Ads/GA4 `generate_lead` 只代表平台定义的 conversion，不自动等于有效 B2B 询盘。
- 普通邮件询盘不得根据日期接近广告点击而归因；来源不明写 `unknown`。
- 没有表单提交且 conversion 为 0 时，可记录两项事实一致，但不能因此证明追踪完全正常。
- 合格、不合格、已报价、打样、成交或流失状态以所有者提供的人工业务真值为准。
- 用户已决定自主推进邮箱。Google Ads Agent 不主动读取邮箱；需要对照时，只使用所有者明确
  提供的聚合结果或另一次明确授权的邮箱分析结果。

## 8. 输出与交接

每次正式复盘应新建日期化文件，不覆盖历史快照：

```text
docs/marketing/ads/google-ads-api-snapshot-YYYY-MM-DD.md
```

报告至少包含：

1. 账户、Customer ID、时区、币种、采集日期与两个窗口；
2. Campaign 当前配置；
3. 两窗口 Campaign 对比；
4. Ad group、keyword、search term、device、network、geography；
5. conversion action 与人工询盘口径；
6. 搜索词覆盖率和其他证据缺口；
7. `keep / change-one-variable / pause` 建议及其证据；
8. 明确声明本次为只读，未修改广告设置。

如果只是临时健康检查，不必创建新快照，但必须在回复中写明查询时间、窗口、Customer ID 和
任何缺口。需要把结果纳入 Promotion 状态时，再更新
[`promotion-timeline.md`](../promotion-timeline.md)和[`progress.md`](../../progress.md)。

## 9. 故障与停止条件

- MCP 工具不存在：报告 `blocked / tool-unavailable`，不要用网页截图猜当前值。
- OAuth / API 权限失败：报告 `blocked / authentication-or-access`，不要创建或下载服务账号密钥。
- metadata 不支持所需字段：记录 `unavailable / field-incompatible`，不要用其他字段冒充。
- 返回行数达到 limit、查询超时或部分层级失败：整体状态记为 `partial`，保留已成功层级和缺口。
- 名称乱码：保留 ID，名称写 `unavailable / encoding`。
- API 当前设置与旧文档冲突：以本次只读 API 为当前事实，保留旧文档作为历史，不回写历史值。
