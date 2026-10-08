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
| SEO-V2-002 | 28 天 GSC / GA4 / 询盘基线刷新 | IMP-014/022/033 | P0 | `completed / recurring baseline` | 2026-10-08 补齐 2026-09-01 至 09-30 自然月：GSC 32 clicks / 1,280 impressions；GA4 54 raw sessions，Organic Search 2 sessions / 0 `generate_lead`；邮箱人工复核确认 6 封真实询盘，但 0 封已确认每款达到 MOQ，且 0 封可确认归因 Organic Search。8 月对照保持 8 clicks / 329 impressions、112 raw sessions、0 正式询盘 | 结论 `visibility-up / conversion-unproven`、`no-change / baseline-established`；另记录 GSC 32 clicks 对 GA4 2 个 `google / organic` sessions 的 `measurement-gap / investigate`。先只读诊断标签、Consent 与过滤口径，再决定是否改代码或配置；继续按完整月份和 Day 28 / 90 比较，不以 GA4 事件替代人工询盘真值 |
| SEO-V2-003 | 索引、Crawl 与 HTML 响应持续监测 | IMP-033/038 | P0 | `monitoring` | 2026-09-18 Services 周度只读复查为 `NEUTRAL / URL is unknown to Google`，工具判定 unchanged、0 regression；生产 HTTP、robots、canonical、20 URL Page Sitemap 与首页 5 个发现入口均正常。此前实时测试已通过并请求编入索引一次 | 不重复提交或改页；继续周度只读 Services indexed snapshot 与周期 Crawl / Index Snapshot；只有出现明确抓取、Canonical、robots 或 Sitemap 阻塞才进入诊断 |
| SEO-V2-004 | 剩余 LCP 与 Field CWV 复核 | IMP-035–038 | P0 | `deferred / monitor-only` | 2026-09-19 所有者决定当前阶段不继续投入增量性能优化；现有 Hero poster-first、延迟 MP4、reduced-motion / Save-Data 防护及 Crawl Diff 均已通过，Lab 波动未证明存在可归因的曝光损失，CrUX Phone 仍 unavailable | 保持现状，不再主动调查共享渲染链或继续压缩非关键图片。只有出现可用 Field CWV 不良数据、抓取/渲染/indexability 回归、明显用户体验故障，或同配置 Lab 重复恶化并能提出单变量假设时才重开 |
| SEO-V2-005 | 用非品牌 Query 扩充现有页面证据与内链 | IMP-014/022 | P1 | `active / keep-measuring` | 2026-10-08 完成 Underwear、Knitted Fabrics 与 Merino Day 28：Underwear 为 0 / 25 → 2 clicks / 84 impressions，Knitted 为 0 / 41 → 1 / 90，均为 `keep / measuring`；Merino 经所有者接受 27 日近似窗口后正式关闭，为 3 / 43 → 3 / 166，曝光和平均排名改善但 clicks、可见商业 Query 与可归因询盘未同步增长，同样为 `keep / measuring` | 保持三个页面的 URL、Title、Meta、H1、正文与页面所有权；不建平行页或复制 UltraMerino 内容。Underwear / Knitted 下一正式节点为 2026-11-30 Day 90，Merino 为 2026-12-06 Day 90 |
| SEO-V2-006 | 站外行业引用与可信目录运营 | IMP-020 | P1 | `deferred / external-input` | ThomasNet 因地址与平台资格问题暂缓；2026-08-29 所有者确认 OEKO-TEX Buying Guide 与 WRAP 公开列名短期无法提供所需 certificate / label number、持证主体、WRAP ID、有效期及门户列名状态，同步暂缓 | ThomasNet 仅在平台书面确认资格或支持人工地址后重开；OEKO-TEX / WRAP 仅在完整可核验凭据可用后重开；不以链接总数作为成功指标 |
| SEO-V2-007 | 品类页社交图 / Schema 主图 | IMP-013 | P1 | `platform-failed / diagnosis-monitoring` | 2026-08-28 JPG 兼容修复的网站端技术验收通过，但所有者提供的 LinkedIn Post Inspector 重新抓取截图仍为 `No image found`。模拟 LinkedInBot 可访问页面和 JPG，根因尚未证实 | JPG 部署满 48 小时后复验；若仍失败，按准确时间检查 Cloudflare Security Events，再经所有者批准只对 Sportswear 做标准 JFIF/yuv420p 新文件名单页实验；不盲目批量换图 |
| SEO-V2-008 | 五个低曝光品类的响应式图片批次 | IMP-025 | P1 | `fixed / keep` | 2026-08-28 完成生产验收：五页 18/18 响应式节点、54/54 WebP、Desktop/Mobile 视觉、同一 5 URL 审计和三次 Sports Accessories Lab 均通过，无状态码、indexability、布局或可归因性能回归 | 保持现状；仅在生产资源失败、视觉回归或 Field CWV/同环境 Lab 重复恶化时重开 |
| SEO-V2-009 | Title / Meta 或 Knitted Fabrics 次级词实验 | IMP-014/022 | P2 | `deferred` | 单页达到至少 100 曝光观察门槛，且 Query 与 CTR 能支持一个明确假设 | 一次只改 Title 或 Meta 的一个主要变量；保留 28 天比较窗口 |
| SEO-V2-010 | Service Schema 与 VideoObject 可选增强 | IMP-016/027 | P2 | `conditional` | 可见内容与事实完整；GSC 视频索引或 Rich Results 证据显示实际缺口 | Validator 通过且 Schema 与可见内容一致；没有证据时允许 `not-needed` |
| SEO-V2-011 | 欧洲当地语言研究 | IMP-019 | P2 | `deferred` | 英语基线稳定；具体国家出现询盘、GSC Query 或销售需求，并具备母语审核资源 | 每个国家独立验证语言和 SERP；未批准前不建立复制页 |
| SEO-V2-012 | Performance Fabrics 信息指南条件式评估 | IMP-023 | P2 | `deferred` | GSC 出现相关 Query，或独立 SERP 研究证明 performance apparel / knit fabric 内容缺口，并有一方材料证据 | 先批准页面任务和 URL；避免家具、室内装饰意图与现有面料商业页内耗 |
| SEO-V2-013 | 技术指南标准与外链季度复核 | IMP-021 | P2 | `scheduled / last-reviewed-2026-Q3` | 2026-09-30 完成 Q3 全量复核：6 篇生产指南、36 次外链引用、30 个唯一生产 URL，确认断链 0；ASTM D2594/D2594M-21、AATCC TM135-2025、ISO 3759:2011、ISO 5077:2007 与 ANSI/ASQ Z1.4 保持 `no-change`。ISO 4915:1991 仍现行但处于 systematic review，继续监测。ISO 2859-1 已更新为 2026 版官方入口，QC Guide 生产验收通过，Finding outcome 为 `changed / keep` | 保持当前公开版本；Rank Math `Article.dateModified` 仍取 WordPress 数据库页面时间，与代码中的技术复核日期不是同一数据源，本轮不扩展 Schema 变量。ISO 4915 生命周期变化时重开，否则下次例行复核不晚于 2026-12-31；完整记录见 [2026 Q3 复核](implementation/change-cards/seo-v2-013-quarterly-standards-links-2026-q3.md) |
| SEO-V2-014 | HSTS 基础设施评估 | Crawl Low Finding | P3 | `owner-action` | 在 Cloudflare Edge Certificates 评估 HSTS；先确认子域、预加载和回滚影响 | 配置由所有者执行并验证响应头；不是排名实验，不与内容 SEO 混合归因 |
| SEO-V2-015 | 首页 `Technical Knitwear` 定位语义纠偏 | 所有者 Google 截图、业务确认与 US / GB / CA Live SERP | P1 | `fixed / keep-measuring` | 2026-10-08 Day 28 完成：GSC 4 clicks / 73 impressions → 6 / 135，方向正向但 low confidence；After retained Query 只有 11 impressions 且均为品牌或网址词，GA4 与正式询盘没有证明 Organic 转化，其他页面发布和分发活动构成干扰 | 保持当前首页，不重复修改 URL、Title、Meta、H1 或页面所有权；不把总量增长归因给本次改动。Day 90 再结合可见非品牌 Query 与合格询盘决定 `keep`、`iterate` 或 `revert` |
| SEO-V2-016 | 首页 Merino / Knitted Fabrics 类目卡图片交付 | SEO-V2-004 三次移动 Lab 的重复 image delivery Finding | P1 | `fixed / keep` | 生产 HTML、8 个 WebP、Desktop/Mobile 视觉与实际 responsive candidate 均通过；三次 Lab 的 image delivery 估算浪费由约 2,339 KiB 降至 1,379 KiB，减少约 960 KiB（41%），目标两图不再进入重复证据。LCP 中位数 4.566s → 4.494s，差异属波动，不写成提速；CLS 仍为 0 | 保持当前候选；Crawl Diff Run `df1f29f4-a015-4f02-977a-be091a16605b` 为 25 URL、0 changed / new errors / indexability flips。页面级 LCP Finding 继续 deferred，剩余 Sports Accessories / Outdoor 图片与共享渲染链必须作为新变量独立评估 |
| SEO-V2-017 | 首页 Outdoor 类目卡图片交付 | SEO-V2-016 三次移动 Lab 的重复 Outdoor image delivery evidence | P1 | `fixed / keep` | 生产 4 个 q80 WebP、HTML、Desktop/Mobile 视觉及实际候选均通过；三次有效移动 Lab 的 image delivery 估算浪费由约 1,379 KiB 降至约 1,305 KiB，减少约 74 KiB（约 5.4%），Outdoor 连续退出证据。LCP 中位数 3.356s、TBT 64ms、CLS 0，但不把 Lab 波动归因成本次下方图片提速 | 保持当前 Outdoor 候选；稳定 Crawl Diff Run `8fc3102b-06ff-4139-9105-8b898fe1925d` 为 25 URL、0 changed / new errors / indexability flips。Sports Accessories 继续 `deferred / owner-protected` 且未改动；页面级 LCP Finding 继续 deferred |
| SEO-V2-018 | Sportswear 商业词簇与现有页面适配研究 | 90 天 GSC、DataForSEO US / GB / CA SERP、生产页审计、GSC URL Inspection 与所有者业务边界 | P1 | `completed / measuring` | Program model 与 14 图 lookbook 已上线；生产页 200、可索引、自引用 Canonical、单一 H1，42/42 图片资源和 Desktop/Mobile lightbox 交互通过，其他六个品类保持隔离。GSC 为 `PASS / Submitted and indexed`，Google Canonical 一致，最后抓取为 2026-09-22。五个商业词在 US / GB / CA 的 15 组 depth-20 快照全部完成：`OEM activewear manufacturer` 最匹配，`sportswear OEM manufacturer` 可作次级表达，private-label 词簇需保留非现货边界；technical 词不稳定，performance apparel 继续归首页 | 2026-09-30 正式关闭部署记录：实施 `changed / keep`，SERP 研究 `research-complete / no-change`。保持 URL、Title、Meta、H1、Schema 与页面所有权，不建近义页、不主动针对 teamwear、不重复请求索引；转入常规 28 / 90 天 GSC、GA4 与有效询盘观察，仅在明确触发条件出现时重开 |

> SEO-V2-018 已于 2026-09-30 完成生产、索引与 SERP 关闭验收。Program model、14 图 lookbook、42 个图片资源及真实点击放大均已验证，图片仍属于同一 Sportswear 页面采购核验增强，不新增 Backlog 项。完整证据、边界和重开条件见 [SEO-V2-018 关闭记录](implementation/change-cards/seo-v2-018-sportswear-lookbook.md)。

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
