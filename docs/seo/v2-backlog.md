# SEO V2 Backlog

> 建立日期：2026-08-25
>
> 状态：活跃；2026-11-04 核对记录
>
> 本次只整理已有证据与执行状态，未刷新 GSC / GA4 / 生产数据；外部状态按各条记录日期理解。
>
> 前置基线：[`SEO 审计汇总与实施清单 V1`](seo-implementation-checklist-v1.md) 已收尾

V2 不以增加任务数量为目标。所有项目必须有一方数据、生产证据、真实买家需求或明确运营责任；没有达到触发条件的项目保持 `conditional` 或 `deferred`，不直接修改网站。

## 1. 优先级与状态

| ID | 工作项 | 来源 | 优先级 | 当前状态 | 启动条件 / 下一步 | 完成标准 |
|---|---|---|---|---|---|---|
| SEO-V2-001 | QC Guide GSC 网页版实时测试与索引记录 | IMP-018 | P0 | `completed` | 2026-08-26 所有者确认已请求编入索引；2026-08-27 SEO-V2-003 URL Inspection 返回 `PASS / Submitted and indexed`，最后抓取为 `2026-08-26T13:41:31Z` | 已在 [`gsc-data-log.md`](gsc-data-log.md) 记录操作与后续索引证据；继续常规曝光监测，不重复提交或改写页面 |
| SEO-V2-002 | 28 天 GSC / GA4 / 询盘基线刷新 | IMP-014/022/033 | P0 | `completed / recurring baseline / measurement-restored` | 2026-10-08 补齐 9 月自然月后，针对 GSC 32 clicks 对 GA4 Organic Search 2 sessions 的测量差距，诊断确认 Cookiebot Domain Group 授权故障；同日外部配置恢复并完成生产浏览器验收：两个 host 均获授权，首次 Banner、Allow all、Reject all、WP Consent API、GA4 Cookie / `page_view` 与页脚 Cookie Settings 全部按预期工作，主题及 CBID 无需修改 | 结论 `measurement-gap / diagnosed / fixed`。9 月 GA4 继续保留为不完整原始值，不回填或用于否定 GSC；从 2026-10-08 起重新累计 consented-session 数据，恢复窗口为 10-08 至 11-04，考虑 GSC final 延迟，正式复核不早于 2026-11-07。继续以人工询盘真值校验转化，不要求 GSC click 与 GA4 session 1:1 |
| SEO-V2-003 | 索引、Crawl 与 HTML 响应持续监测 | IMP-033/038 | P0 | `monitoring / services-no-change` | 2026-10-08 Services 只读复查仍为 `NEUTRAL / URL is unknown to Google`；相对 2026-09-30 的 `Discovered - currently not indexed`，工具仍判定 excluded 状态 unchanged、0 regression / recovery / alert。生产普通请求与模拟 Googlebot 均为 200，`index`、自引用 Canonical、无 X-Robots-Tag、Page Sitemap 唯一条目、首页 5 个入口及完整采购流程内容均正常，单页审计 0 issue / 0 recommendation | 不重复提交或改页；Services 单页从低收益周度轮询改为月度或触发式复查，下一常规 indexed snapshot 不早于 2026-11-08。若变为 `PASS / Submitted and indexed` 则关闭单页观察；只有出现明确抓取、Canonical、robots、Sitemap 或服务端阻塞才进入修复诊断。全站 Crawl / Index Snapshot 继续按既定监测运行 |
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

### SEO-V2-005 分批状态与后续窗口（2026-11-04 核对）

下表仅归集已经批准并实施的同项子批次，不新增 SEO 项目。时间为原记录的日历节点，实际效果复盘需等 GSC `final` 覆盖；索引、技术与效果分别判断。

| 子批次 / 证据 | 已完成的最后记录 | 后续与限制 |
|---|---|---|
| [Knitted Fabrics 结构模块](implementation/change-cards/seo-v2-005-knitted-fabric-structures-2026-10-20.md) | 10-20 部署；10-27 Day 7 技术与抓取检查关闭。Google 最后抓取 10-21 晚于部署，但当时只有四个完整 final 后日；效果 `partial / not-enough-data` | Day 28 为 11-17；完整后窗 10-21～11-17，预计 11-20 起按 final 核验；本模块 Day 90 为 2027-01-18，原 Knitted 11-30 Day 90 不重置 |
| [Underwear seamless](implementation/change-cards/seo-v2-005-underwear-seamless-2026-10-23.md) | 10-27 部署验收关闭；仅确认制造能力，未声称有 seamless 样品／订单图 | 原定 11-03 Day 7 已到期，本次未找到完成记录，待补查；Day 28 为 11-24，后窗 10-28～11-24，预计 11-27 起核验；原 11-30 Day 90 不重置 |
| [Sportswear Yoga 采购说明](implementation/change-cards/seo-v2-005-sportswear-yoga-2026-10-27.md) | 10-27 最终稿部署验收关闭；所有者要求删除的两个局部链接已移除 | 原定 11-03 Day 7 已到期，本次未找到完成记录，待补查；Day 28 为 11-24，后窗 10-28～11-24，预计 11-27 起核验；前窗 09-29～10-26 未在原卡提取，不能用其他旧快照替代 |
| [Sports Accessories 头颈防护](implementation/change-cards/seo-v2-005-accessories-head-neck-2026-10-28.md) | 10-29 部署验收，11-02 补录与定向 HTTP／媒体复核；第三张受保护图片哈希不变 | Day 7 为 11-05，Day 28 为 11-26；后窗 10-30～11-26 等 final 覆盖后核验；原 12-08 Day 90 不重置 |
| [FLATLOCK Guide → Merino 内链](implementation/change-cards/seo-v2-005-flatlock-merino-context-link-2026-10-23.md) | 10-23 部署；原定 10-30 Day 7 已于 11-02 补查，两页 indexed、生产链接及真实点击通过 | Day 28 为 11-20；后窗 10-24～11-20，预计 11-23 起核验；披露 10-31 同来源页另一内链共同变量，不将增长归因于单链 |
| [Merino 商业词固定观察](research/merino-commercial-monitor-v1.md) / [GSC Log](gsc-data-log.md) | 原定 10-30 周度已于 11-02 补做；10-03～10-30 页面为 5 clicks / 193 impressions，维度不闭合且可见商业词低样本，`no-change / keep-measuring` | 不重做已补查节点；原独立后窗 10-21～11-17 等 final 覆盖后预计 11-20 起核验；原计划固定 SERP 11-20／11-21，届时先复核预算与是否有重复快照；原 Merino 12-06 Day 90 不重置 |

上述子批次之外，原页面 Day 28 决策与窗口仍见 [GSC Log 10-08 记录](gsc-data-log.md)。2026-11-04 [Product Showcase 展示库及两款详情已正式发布](../site/product-showcase-release-candidate-2026-11-03.md)，首页和 Merino 的新增入口是后续归因时需披露的共同变量；不是既有品类实验的排名收益证明，也不重置其观察窗口。

### 当前执行顺序

1. 先补查 Underwear seamless 与 Sportswear Yoga 已到期的 Day 7，再按 11-05 节点复查配件头颈模块；本轮仅整理文档，没有执行这些检查。
2. SEO-V2-002 的 10-08～11-04 恢复窗口正式复核不早于 11-07；8 月正式／有效询盘已由所有者于 09-08 更正为 **0**，08-27 旧分类只保留历史轨迹，不再作当前获客结论。
3. Services 单页沿 10-08 决策按月度／触发式复查，下一常规节点不早于 11-08；性能增量优化与外部凭据受阻项目继续暂缓。
4. 完整 28 天效果复盘依上表分批执行；不因等待窗口而重写页面或扩充 Backlog。标准／外链下次季度复核仍不晚于 12-31。

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
