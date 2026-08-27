# SEO V2 Backlog

> 建立日期：2026-08-25
>
> 状态：活跃
>
> 前置基线：[`SEO 审计汇总与实施清单 V1`](seo-implementation-checklist-v1.md) 已收尾

V2 不以增加任务数量为目标。所有项目必须有一方数据、生产证据、真实买家需求或明确运营责任；没有达到触发条件的项目保持 `conditional` 或 `deferred`，不直接修改网站。

## 1. 优先级与状态

| ID | 工作项 | 来源 | 优先级 | 当前状态 | 启动条件 / 下一步 | 完成标准 |
|---|---|---|---|---|---|---|
| SEO-V2-001 | QC Guide GSC 网页版实时测试与索引记录 | IMP-018 | P0 | `completed` | 2026-08-26 所有者确认已请求编入索引；2026-08-27 SEO-V2-003 URL Inspection 返回 `PASS / Submitted and indexed`，最后抓取为 `2026-08-26T13:41:31Z` | 已在 [`gsc-data-log.md`](gsc-data-log.md) 记录操作与后续索引证据；继续常规曝光监测，不重复提交或改写页面 |
| SEO-V2-002 | 28 天 GSC / GA4 / 询盘基线刷新 | IMP-014/022/033 | P0 | `completed` | 2026-08-27 已完成 2026-07-26 至 08-22 的 GSC、GA4 与询盘人工核验：8 次 `generate_lead` 中有效询盘 1 次，其余 7 次为不合格、测试或无效 | 数据完整性、样本门槛与页面级 `no-change` 决策已记录；唯一有效询盘来自 Organic Social，Organic Search 为 0 lead / 0 有效询盘 |
| SEO-V2-003 | 索引、Crawl 与 HTML 响应持续监测 | IMP-033/038 | P0 | `monitoring` | 2026-08-27 首轮 Index Snapshot 为 10/10 indexed / PASS，QC Guide 已收录；全站 Crawl `crawl_25cbeefdbea740e2b2a571976e535de7` 无状态码或 indexability 回归；OEM Guide GOTS 外链已 `fixed`。第二批 8 个 URL 因本机保守 UTC 日配额 `attempted=0`，当前为 `deferred / quota`，北京时间 2026-08-28 08:00 后重试 | 保存 Crawl / Index Snapshot；Finding 均有 `fixed`、`deferred`、`not-needed` 或 `monitoring` 结论 |
| SEO-V2-004 | 剩余 LCP 与 Field CWV 复核 | IMP-035–038 | P0 | `monitoring` | Services Lab LCP 中位数 5.00s，首页 3.68s；取得可用 CrUX 或同环境重复恶化后重开 | 分开记录 Lab 与 Field；确认最小变量、回归防护和 keep / iterate / revert 决策 |
| SEO-V2-005 | 用非品牌 Query 扩充现有页面证据与内链 | IMP-014/022 | P1 | `conditional` | 页面或 Query 达到流程样本门槛，且排名约 8–30、意图和页面所有权匹配 | 只优化一个主要变量；完成 28 天前后窗口，不创建近义页 |
| SEO-V2-006 | 站外行业引用与可信目录运营 | IMP-020 | P1 | `operational` | 跟进 ThomasNet 中国主体可见性；按收益选择 OEKO-TEX/WRAP、Merrow 或编辑型来源 | 获得可核实公开 URL 并记录维护责任；不以链接总数作为成功指标 |
| SEO-V2-007 | 品类页社交图 / Schema 主图 | IMP-013 | P1 | `owner-input` | 所有者为需要优化的品类确认代表图；不得默认使用不相关或未批准图片 | OG/Twitter/Schema 图一致，生产资源、尺寸、MIME 和分享预览通过 |
| SEO-V2-008 | 五个低曝光品类的响应式图片批次 | IMP-025 | P1 | `deferred` | 任一目标页 GSC 曝光起量、真实 CWV 报警，或该页进入明确获客优先级 | 使用 uploads 响应式资源并完成视觉、MIME、Lab 与部署回归 |
| SEO-V2-009 | Title / Meta 或 Knitted Fabrics 次级词实验 | IMP-014/022 | P2 | `deferred` | 单页达到至少 100 曝光观察门槛，且 Query 与 CTR 能支持一个明确假设 | 一次只改 Title 或 Meta 的一个主要变量；保留 28 天比较窗口 |
| SEO-V2-010 | Service Schema 与 VideoObject 可选增强 | IMP-016/027 | P2 | `conditional` | 可见内容与事实完整；GSC 视频索引或 Rich Results 证据显示实际缺口 | Validator 通过且 Schema 与可见内容一致；没有证据时允许 `not-needed` |
| SEO-V2-011 | 欧洲当地语言研究 | IMP-019 | P2 | `deferred` | 英语基线稳定；具体国家出现询盘、GSC Query 或销售需求，并具备母语审核资源 | 每个国家独立验证语言和 SERP；未批准前不建立复制页 |
| SEO-V2-012 | Performance Fabrics 信息指南条件式评估 | IMP-023 | P2 | `deferred` | GSC 出现相关 Query，或独立 SERP 研究证明 performance apparel / knit fabric 内容缺口，并有一方材料证据 | 先批准页面任务和 URL；避免家具、室内装饰意图与现有面料商业页内耗 |
| SEO-V2-013 | 技术指南标准与外链季度复核 | IMP-021 | P2 | `scheduled` | 每季度检查 ASTM / AATCC / ISO 等引用版本、链接和适用范围 | 记录复核日期、变动和负责人；没有变化也记录 `no-change` |
| SEO-V2-014 | HSTS 基础设施评估 | Crawl Low Finding | P3 | `owner-action` | 在 Cloudflare Edge Certificates 评估 HSTS；先确认子域、预加载和回滚影响 | 配置由所有者执行并验证响应头；不是排名实验，不与内容 SEO 混合归因 |

## 2. 不进入 V2 的项目

- 不为 Activewear / Fitness 或关键词单复数建立平行商业页；
- 不把 `performance fabrics` 直接替换进 Knitted Fabrics URL、Title 或 H1；
- 不恢复旧 `myathletik.com` 跨域重定向计划；
- 不为提高工具分数修复 Cloudflare `/cdn-cgi/l/email-protection` 伪 404 或 Sitemap `noindex`；
- 不在没有 GSC、真实询盘、SERP 或业务输入时批量扩写正文；
- 不把 Schema、LLMs.txt、目录数量或第三方 Authority Score 当作排名保证。

## 3. 启动新项目的最小记录

从本 Backlog 启动任何网站改动时，至少记录：

1. 目标页面、市场、买家任务和业务动作；
2. 证据来源、数据状态和样本门槛；
3. 唯一主要变量、预期收益、风险和防护指标；
4. Finding 类型及允许 outcome；
5. 部署前 Crawl / GSC / Lab 基线；
6. 生产验收和 Day 7 / 28 / 90 决策。

新发现先加入本文件，不继续扩写已冻结的 V1 清单。
