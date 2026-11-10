# SEO V2 Backlog

> 建立日期：2026-08-25
>
> 状态：活跃；2026-11-10 核对记录
>
> 11-10 已刷新定向索引／生产检查、补齐 10-08～11-04 GSC＋GA4 基线及 Knitted 定向搜索诊断；其余外部状态按各条记录原日期理解。
>
> 前置基线：[`SEO 审计汇总与实施清单 V1`](seo-implementation-checklist-v1.md) 已收尾

V2 不以增加任务数量为目标。所有项目必须有一方数据、生产证据、真实买家需求或明确运营责任；没有达到触发条件的项目保持 `conditional` 或 `deferred`，不直接修改网站。

## 1. 优先级与状态

| ID | 工作项 | 来源 | 优先级 | 当前状态 | 启动条件 / 下一步 | 完成标准 |
|---|---|---|---|---|---|---|
| SEO-V2-001 | QC Guide GSC 网页版实时测试与索引记录 | IMP-018 | P0 | `completed` | 2026-08-26 所有者确认已请求编入索引；2026-08-27 SEO-V2-003 URL Inspection 返回 `PASS / Submitted and indexed`，最后抓取为 `2026-08-26T13:41:31Z` | 已在 [`gsc-data-log.md`](gsc-data-log.md) 记录操作与后续索引证据；继续常规曝光监测，不重复提交或改写页面 |
| SEO-V2-002 | 28 天 GSC / GA4 / 询盘基线刷新 | IMP-014/022/033 | P0 | `baseline-established / recurring / inquiry-unverified` | 2026-11-10 已补齐 10-08～11-04 恢复窗口：GSC 36 clicks / 1,443 impressions，前窗 28 / 1,259；七品类为 14 / 599，前窗 10 / 472。GA4 全站 137 sessions；Organic Search 16 sessions / 11 users，2 位用户浏览 Contact，未记录自然搜索成功提交。全站 3 次 generate_lead 的业务真实性与质量未核验，本次未读邮箱 | `no-change / baseline-established / keep-measuring`。10-08 Cookiebot 修复记录保留；本窗含 QA 及多项发布，不作单变量归因。9 月漏测不回填，不强求 GSC clicks 与 GA4 sessions 1:1。下一相邻窗口可用 11-05～12-02，待 final 覆盖后取数；正式询盘只在获准后补核，详见 [GSC Log](gsc-data-log.md) |
| SEO-V2-003 | 索引、Crawl 与 HTML 响应持续监测 | IMP-033/038 | P0 | `monitoring / services-no-change` | 2026-11-10 Services 月度复查为 `NEUTRAL / Discovered - currently not indexed`，已列出 Sitemap 发现来源，未返回抓取时间；相对 10-08 unknown 状态有发现证据，仍未收录，不作为 recovery。生产 HTTP 200、index / follow、自引用 Canonical、无 X-Robots 限制、Page Sitemap 一次、首页 5 个入口及四阶段采购流程正常；未查明未收录原因 | 保持 `no-change / monitoring`，不重复已于 08-28 确认的请求；下一常规复查不早于 2026-12-10。若 PASS 则关闭单页观察；明确 HTTP、抓取、robots、Canonical、Sitemap 阻塞或实质页面发布时提前重开。全站监测职责不关闭；本次仅四个到期页面定向检查，见 [GSC Log](gsc-data-log.md) |
| SEO-V2-004 | 剩余 LCP 与 Field CWV 复核 | IMP-035–038 | P0 | `deferred / monitor-only` | 2026-09-19 所有者决定当前阶段不继续投入增量性能优化；保留 poster-first、延迟 MP4、reduced-motion / Save-Data 控制。已记录正常 motion 播放、强制 reduced-motion、三次 Lab 与 Crawl Diff 验收；Save-Data、离屏／后台暂停的真实浏览器检查在原卡仍未勾选，不扩大为全部通过；CrUX Phone 仍为该次 `unavailable` | 保持现状，不主动重开共享渲染链或非关键图片压缩。只有可用 Field CWV 不良、抓取／渲染／indexability 回归、明显用户体验故障，或同配置 Lab 重复恶化且有单变量假设时重开；历史证据见 [Hero Change Card](implementation/change-cards/seo-v2-004-home-video-hero-lcp.md) |
| SEO-V2-005 | 用非品牌 Query 扩充现有页面证据与内链 | IMP-014/022 | P1 | `active / deployed-batches-measuring` | 原页面 Day 28 决策保留。Knitted 结构模块已于 10-27 完成 Day 7 技术／抓取复查，结果 `no-change / keep-measuring / not-enough-data`；Underwear seamless、Sportswear Yoga、配件头颈防护、FLATLOCK → Merino 入链均已各自完成部署验收，最新日期与未到期／已到期未复查项见下方分批表 | 各批使用原 Change Card 与独立 Day 0，不连续改写同页、不建近义页、不把低样本波动解释为因果；保留原 Day 90 并披露后续内容／内链／展示入口共同变量。Knitted 完整后窗 10-21～11-17 等 final 覆盖后预计 11-20 起核验；不把过期计划自动记为已完成 |
| SEO-V2-006 | 站外行业引用与可信目录运营 | IMP-020 | P1 | `deferred / external-input` | ThomasNet 因地址与平台资格问题暂缓；2026-08-29 所有者确认 OEKO-TEX Buying Guide 与 WRAP 公开列名短期无法提供所需 certificate / label number、持证主体、WRAP ID、有效期及门户列名状态，同步暂缓 | ThomasNet 仅在平台书面确认资格或支持人工地址后重开；OEKO-TEX / WRAP 仅在完整可核验凭据可用后重开；不以链接总数作为成功指标 |
| SEO-V2-007 | 品类页社交图 / Schema 主图 | IMP-013 | P1 | `platform-failed / diagnosis-monitoring` | 2026-08-28 JPG 兼容修复的网站端技术验收通过，但所有者提供的 LinkedIn Post Inspector 重新抓取截图仍为 `No image found`。模拟 LinkedInBot 可访问页面和 JPG，根因尚未证实 | JPG 部署满 48 小时后复验；若仍失败，按准确时间检查 Cloudflare Security Events，再经所有者批准只对 Sportswear 做标准 JFIF/yuv420p 新文件名单页实验；不盲目批量换图 |
| SEO-V2-008 | 五个低曝光品类的响应式图片批次 | IMP-025 | P1 | `fixed / keep` | 2026-08-28 完成生产验收：五页 18/18 响应式节点、54/54 WebP、Desktop/Mobile 视觉、同一 5 URL 审计和三次 Sports Accessories Lab 均通过，无状态码、indexability、布局或可归因性能回归 | 保持现状；仅在生产资源失败、视觉回归或 Field CWV/同环境 Lab 重复恶化时重开 |
| SEO-V2-009 | Title / Meta 或 Knitted Fabrics 次级词实验 | IMP-014/022 | P2 | `deferred` | 单页达到至少 100 曝光观察门槛，且 Query 与 CTR 能支持一个明确假设 | 一次只改 Title 或 Meta 的一个主要变量；保留 28 天比较窗口 |
| SEO-V2-010 | Service Schema 与 VideoObject 可选增强 | IMP-016/027 | P2 | `conditional` | 可见内容与事实完整；GSC 视频索引或 Rich Results 证据显示实际缺口 | Validator 通过且 Schema 与可见内容一致；没有证据时允许 `not-needed` |
| SEO-V2-011 | 欧洲当地语言研究 | IMP-019 | P2 | `deferred` | 英语基线稳定；具体国家出现询盘、GSC Query 或销售需求，并具备母语审核资源 | 每个国家独立验证语言和 SERP；未批准前不建立复制页 |
| SEO-V2-012 | Performance Fabrics 信息指南条件式评估 | IMP-023 | P2 | `deferred` | GSC 出现相关 Query，或独立 SERP 研究证明 performance apparel / knit fabric 内容缺口，并有一方材料证据 | 先批准页面任务和 URL；避免家具、室内装饰意图与现有面料商业页内耗 |
| SEO-V2-013 | 技术指南标准与外链季度复核 | IMP-021 | P2 | `scheduled / last-reviewed-2026-Q3` | 2026-09-30 完成 Q3 全量复核：6 篇生产指南、36 次外链引用、30 个唯一生产 URL，确认断链 0；ASTM D2594/D2594M-21、AATCC TM135-2025、ISO 3759:2011、ISO 5077:2007 与 ANSI/ASQ Z1.4 保持 `no-change`。该次核验时 ISO 4915:1991 现行但处于 systematic review，继续监测。ISO 2859-1 已更新为 2026 版官方入口，QC Guide 生产验收通过，Finding outcome 为 `changed / keep` | 保持已批准公开版本；Q3 验收时 Rank Math `Article.dateModified` 取 WordPress 数据库页面时间，与代码中的技术复核日期不是同一数据源，该次未扩展 Schema 变量。ISO 4915 生命周期变化时重开，否则下次例行复核不晚于 2026-12-31；完整记录见 [2026 Q3 复核](implementation/change-cards/seo-v2-013-quarterly-standards-links-2026-q3.md) |
| SEO-V2-014 | HSTS 基础设施评估 | Crawl Low Finding | P3 | `owner-action` | 在 Cloudflare Edge Certificates 评估 HSTS；先确认子域、预加载和回滚影响 | 配置由所有者执行并验证响应头；不是排名实验，不与内容 SEO 混合归因 |
| SEO-V2-015 | 首页 `Technical Knitwear` 定位语义纠偏 | 所有者 Google 截图、业务确认与 US / GB / CA Live SERP | P1 | `fixed / keep-measuring` | 2026-10-08 Day 28 完成：GSC 4 clicks / 73 impressions → 6 / 135，方向正向但 low confidence；After retained Query 只有 11 impressions 且均为品牌或网址词，GA4 与正式询盘没有证明 Organic 转化，其他页面发布和分发活动构成干扰 | 保持当前首页，不重复修改 URL、Title、Meta、H1 或页面所有权；不把总量增长归因给本次改动。Day 90 再结合可见非品牌 Query 与合格询盘决定 `keep`、`iterate` 或 `revert` |
| SEO-V2-016 | 首页 Merino / Knitted Fabrics 类目卡图片交付 | SEO-V2-004 三次移动 Lab 的重复 image delivery Finding | P1 | `fixed / keep` | 2026-09-19 生产 HTML、8 个 WebP、Desktop/Mobile 视觉与实际 responsive candidate 均通过；三次 Lab 的 image delivery 估算浪费由约 2,339 KiB 降至 1,379 KiB，减少约 960 KiB（41%），目标两图不再进入重复证据。LCP 中位数 4.566s → 4.494s，差异属波动，不写成提速；CLS 仍为 0 | 保持当前候选；Crawl Diff Run `df1f29f4-a015-4f02-977a-be091a16605b` 为 25 URL、0 changed / new errors / indexability flips。页面级 LCP Finding 继续 deferred；Outdoor 后续已由 SEO-V2-017 独立关闭，Sports Accessories 受保护图片与共享渲染链不随本项重开；详见 [Change Card](implementation/change-cards/seo-v2-016-home-category-image-delivery.md) |
| SEO-V2-017 | 首页 Outdoor 类目卡图片交付 | SEO-V2-016 三次移动 Lab 的重复 Outdoor image delivery evidence | P1 | `fixed / keep` | 2026-09-19 生产 4 个 q80 WebP、HTML、Desktop/Mobile 视觉及实际候选均通过；三次有效移动 Lab 的 image delivery 估算浪费由约 1,379 KiB 降至约 1,305 KiB，减少约 74 KiB（约 5.4%），Outdoor 连续退出证据。LCP 中位数 3.356s、TBT 64ms、CLS 0，但不把 Lab 波动归因成本次下方图片提速 | 保持当前 Outdoor 候选；稳定 Crawl Diff Run `8fc3102b-06ff-4139-9105-8b898fe1925d` 为 25 URL、0 changed / new errors / indexability flips。Sports Accessories 继续 `deferred / owner-protected` 且未改动；页面级 LCP Finding 继续 deferred；详见 [Change Card](implementation/change-cards/seo-v2-017-home-outdoor-image-delivery.md) |
| SEO-V2-018 | Sportswear 商业词簇与现有页面适配研究 | 90 天 GSC、DataForSEO US / GB / CA SERP、生产页审计、GSC URL Inspection 与所有者业务边界 | P1 | `completed / measuring` | 2026-09-30 关闭验收确认 Program model 与 14 图 lookbook 已上线；生产页 200、可索引、自引用 Canonical、单一 H1，42/42 图片资源和 Desktop/Mobile lightbox 交互通过，其他六个品类保持隔离。GSC 为 `PASS / Submitted and indexed`，Google Canonical 一致，最后抓取为 2026-09-22。五个商业词在 US / GB / CA 的 15 组 depth-20 快照全部完成：`OEM activewear manufacturer` 最匹配，`sportswear OEM manufacturer` 可作次级表达，private-label 词簇需保留非现货边界；technical 词不稳定，performance apparel 继续归首页 | 2026-09-30 正式关闭部署记录：实施 `changed / keep`，SERP 研究 `research-complete / no-change`。保持 URL、Title、Meta、H1、Schema 与页面所有权，不建近义页、不主动针对 teamwear、不重复请求索引；转入常规 28 / 90 天 GSC、GA4 与有效询盘观察，仅在明确触发条件出现时重开 |

> SEO-V2-018 已于 2026-09-30 完成生产、索引与 SERP 关闭验收。Program model、14 图 lookbook、42 个图片资源及真实点击放大均已验证，图片仍属于同一 Sportswear 页面采购核验增强，不新增 Backlog 项。完整证据、边界和重开条件见 [SEO-V2-018 关闭记录](implementation/change-cards/seo-v2-018-sportswear-lookbook.md)。

### SEO-V2-005 分批状态与后续窗口（2026-11-10 更新）

下表仅归集已经批准并实施的同项子批次，不新增 SEO 项目。时间为原记录的日历节点，实际效果复盘需等 GSC `final` 覆盖；索引、技术与效果分别判断。

| 子批次 / 证据 | 已完成的最后记录 | 后续与限制 |
|---|---|---|
| [Knitted Fabrics 结构模块](implementation/change-cards/seo-v2-005-knitted-fabric-structures-2026-10-20.md) | 10-20 部署；10-27 Day 7 技术与抓取检查关闭。11-10 定向诊断确认结构和采购流程覆盖，主词 US 自然第 25；GB／CA 各 45 条返回结果未见，不冒称完整 Top 50。页面 88→173 曝光不是独立改版实验，10-19 峰值早于部署；保持 `no-change`，见 [GSC Log](gsc-data-log.md) | Day 28 为 11-17；完整后窗 10-21～11-17，预计 11-20 起按 final 核验；本模块 Day 90 为 2027-01-18，原 Knitted 11-30 Day 90 不重置。HY254955／HY265077 已获确认可独立供货；后续最小内容变量为两款实物规格与视觉，需另行授权制作／上线，不重复结构文案或更换主词 |
| [Underwear seamless](implementation/change-cards/seo-v2-005-underwear-seamless-2026-10-23.md) | 10-27 部署；原定 11-03 Day 7 已于 11-10 补查关闭。Indexed、最后抓取 11-09，生产模块正常；早期曝光 21→16，精确前 28 日已补齐，效果样本不足 | `no-change / keep-measuring`；Day 28 为 11-24，后窗 10-28～11-24，预计 11-27 起核验；原 11-30 Day 90 不重置，不把抓取时间当作新正文采用证明 |
| [Sportswear Yoga 采购说明](implementation/change-cards/seo-v2-005-sportswear-yoga-2026-10-27.md) | 10-27 部署；原定 11-03 Day 7 已于 11-10 补查关闭。Indexed、最后抓取 11-03，三组说明和两链接移除正常；早期曝光 11→12，09-29～10-26 精确前窗已补齐 | `no-change / keep-measuring`；Day 28 为 11-24，后窗 10-28～11-24，预计 11-27 起核验；披露 11-05 图集改版共同变量，不重置原窗口 |
| [Sports Accessories 头颈防护](implementation/change-cards/seo-v2-005-accessories-head-neck-2026-10-28.md) | 10-29 部署；原定 11-05 Day 7 已于 11-10 补查关闭。Indexed、最后抓取 11-07，图文正常、代表媒体 4/4 成功；早期曝光 2→10，Query 仅品牌域名，不能判断商业收益；10-01～10-28 前窗已补齐 | `no-change / keep-measuring`；Day 28 为 11-26，后窗 10-30～11-26 等 final 覆盖后核验；原 12-08 Day 90 不重置。本次未重做受保护图历史 SHA 比较 |
| [FLATLOCK Guide → Merino 内链](implementation/change-cards/seo-v2-005-flatlock-merino-context-link-2026-10-23.md) | 10-23 部署；原定 10-30 Day 7 已于 11-02 补查，两页 indexed、生产链接及真实点击通过 | Day 28 为 11-20；后窗 10-24～11-20，预计 11-23 起核验；披露 10-31 同来源页另一内链共同变量，不将增长归因于单链 |
| [Merino 商业词固定观察](research/merino-commercial-monitor-v1.md) / [GSC Log](gsc-data-log.md) | 原定 10-30 周度已于 11-02 补做；10-03～10-30 页面为 5 clicks / 193 impressions，维度不闭合且可见商业词低样本，`no-change / keep-measuring` | 不重做已补查节点；原独立后窗 10-21～11-17 等 final 覆盖后预计 11-20 起核验；原计划固定 SERP 11-20／11-21，届时先复核预算与是否有重复快照；原 Merino 12-06 Day 90 不重置 |

上述子批次之外，原页面 Day 28 决策与窗口仍见 [GSC Log 10-08 记录](gsc-data-log.md)。2026-11-04 [Product Showcase 展示库及两款详情已正式发布](../site/product-showcase-release-candidate-2026-11-03.md)，首页和 Merino 的新增入口是后续归因时需披露的共同变量；不是既有品类实验的排名收益证明，也不重置其观察窗口。

### 当前执行顺序

1. 三个商业模块 Day 7、Services 月度复查及 **SEO-V2-002 的 10-08～11-04 GSC＋GA4 恢复基线**均已于 11-10 完成，结果见 [GSC Log](gsc-data-log.md)。七商业页曝光 472→599，增加 26.9%；自然搜索 16 sessions / 11 users，正式询盘尚未核验。下一效果重点为 **Knitted 与 Merino 的 10-21～11-17 完整后窗，预计 11-20 起按 final 核验**；当前汇总窗口不替代独立复盘，也不触发重复改版。
2. 8 月正式／有效询盘已由所有者于 09-08 更正为 **0**，08-27 旧分类只保留历史轨迹；正式询盘邮箱只在当前任务明确获准读取时核对，不因继续 SEO 自动读取。
3. Services 下一常规节点不早于 12-10，明确技术或发布触发条件出现时提前重开。Showcase 总览和女款已 indexed；男款 11-10 所有者确认已请求索引，建议 11-17 起复查一次，申请不等于收录。性能增量优化与外部凭据受阻项目继续暂缓。
4. Knitted 定向搜索诊断已完成，下一最有依据的内容工作是准备 HY254955／HY265077 两款面料参考的 Local 审核版。编号、成分、GSM 和独立供货资格已确认；成衣图可作面料应用展示，不能冒充布样近摄或推断结构。本轮尚未授权制作／上线，后续沿用 SEO-V2-005，另建实施卡并优先在现有完整后窗结束后部署。完整 28 天效果复盘仍依上表执行；不扩充无触发任务，标准／外链季度复核仍不晚于 12-31。

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
