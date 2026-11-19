# Athletik Clothing SEO 工作台

> 当前阶段：V1 已于 2026-08-25 收尾并冻结；V2 已部署批次进入观察与到期复查
>
> 最近更新：2026-11-10；已补齐恢复基线及 Knitted Fabrics 定向搜索诊断；本次主词 US 自然结果第 25，保留现有定位，所有者确认两款现有面料可作为独立供货例子。其余指标与验收仍按各自原日期理解。
>
> 适用网站：<https://www.athletikapparel.com/>
>
> 主要市场：北美与欧洲

本目录只保留少量高频控制文档。研究过程、页面审计、事实证据和实施记录分别进入子目录；历史资料继续保留用于追溯，但不得覆盖当前生产状态。

## 1. 新会话读取顺序

1. [`../progress.md`](../progress.md)：全项目当前状态和下一步；
2. [`v2-backlog.md`](v2-backlog.md)：当前 SEO 待办、优先级和重开条件；
3. 需要核对历史数据时再查 [`gsc-data-log.md`](gsc-data-log.md)；不要求每次通读；
4. [`seo-process.md`](seo-process.md)：研究、实施、发布和复盘规则；
5. 只有需要历史实施依据时，才读取 [`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md) 或对应子目录。

URL、H1 和页面所有权仍以 [`../sitemap.md`](../sitemap.md) 为准；Title / Meta 以 [`../../seo-tags.md`](../../seo-tags.md) 为准。

## 2. 根目录控制文档

| 文件 | 状态 | 用途 |
|---|---|---|
| [`v2-backlog.md`](v2-backlog.md) | 活跃 | 当前优先级、触发条件、依赖和关闭标准 |
| [`gsc-data-log.md`](gsc-data-log.md) | 持续更新 | 近期 Search Console / GA4 快照与月度速查（8～10 月归档见 `../archive/gsc-data-log-history-2026-08-to-10.md`） |
| [`seo-process.md`](seo-process.md) | 规范 | V1.3：SEO 证据层级、采购决策任务、A/B 改动门槛、Change Card 和复盘流程 |
| [`seo-cli-baseline-2026-08-18.md`](seo-cli-baseline-2026-08-18.md) | 基线 / 持续补录 | `seo` CLI、Crawl、性能和索引自动化基线 |
| [`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md) | 已冻结 | V1 审计、实施、Finding 处置与生产验收记录 |

## 3. 子目录

| 目录 | 入口 | 内容定位 |
|---|---|---|
| `research/` | [`research/README.md`](research/README.md) | 买家搜索语言、Keyword Planner、SERP、页面映射和原始 CSV |
| `audits/` | [`audits/README.md`](audits/README.md) | 2026-08-17/18 的十份页面只读审计快照 |
| `evidence/` | [`evidence/README.md`](evidence/README.md) | 所有者确认事实、能力边界、证据矩阵和内容简报 |
| `implementation/` | [`implementation/README.md`](implementation/README.md) | 图片、MOQ、性能、部署批次和 Change Cards |
| `authority/` | [`authority/README.md`](authority/README.md) | 站外名录、编辑引用和合作机会 |

## 4. 当前执行口径与证据日期

- **唯一执行入口仍为 [V2 Backlog](v2-backlog.md)**，各批次状态、到期检查与完整效果窗口集中在那里。V1 已冻结，SEO-IMP-035～037 为 `keep`，038 为 `keep-monitoring`；`crawl_40f88b6c25d74ba79ee193c7be26caf9` 的 20 页／0 fetch failure 是 V1 冻结证据，不当作今天的全站 Crawl 或 URL 总量。
- **基线与询盘（SEO-V2-002）**：11-10 已补齐 **10-08～11-04** 恢复基线：GSC 28 clicks / 1,259 impressions → **36 / 1,443**，七品类曝光 472→599；GA4 Organic Search 为 **16 sessions / 11 users**，2 位用户浏览 Contact，未记录自然搜索成功提交。全站 3 次 generate_lead 尚未核验业务真实性，本次未读邮箱。窗口含 QA 和多次发布，不归因于单次优化；9 月 Cookiebot 故障漏测不回填。下一相邻窗口可用 11-05～12-02，等 final 覆盖后取数。8 月正式／有效询盘仍以所有者 09-08 更正的 **0** 为准，历史不冒充本窗。见 [GSC / GA4 / 询盘日志](gsc-data-log.md)。
- **Services（SEO-V2-003）**：11-10 月度快照为 `NEUTRAL / Discovered - currently not indexed`，未返回抓取时间；生产定向检查没有发现 HTTP、robots、Canonical、Sitemap 或入口阻断，未确定未收录原因。保持 `no-change / monitoring`，不重复已确认的请求；下一常规复查不早于 **12-10**，明确技术／发布触发时提前重开。
- **性能（SEO-V2-004）**：09-19 已按所有者决定转为 `deferred / monitor-only`，当前不继续投入增量性能优化。首页类目图的 SEO-V2-016／017 已完成并为 `fixed / keep`，生产与 Lab 证据只支持各自范围，不将 Lab 波动解释为曝光收益；只有达到 Backlog 的性能、抓取／渲染或用户体验触发条件才重开。
- **内容与内链（SEO-V2-005）**：Knitted 结构模块 10-27 Day 7 已完成，效果样本不足；完整后窗 10-21～11-17，预计 11-20 起按 final 核验。Underwear seamless、Sportswear Yoga 和配件头颈模块的到期 Day 7 已于 **11-10** 补查：均 indexed、部署后发生抓取、生产模块正常；前后 7 日曝光分别为 21→16、11→12、2→10，可见 Query 仍仅品牌域名，效果 `not-enough-data`。三页精确前 28 日基线已补齐，保留原后窗并披露后续共同变量，见 [Backlog 分批表](v2-backlog.md) 和 [GSC Log](gsc-data-log.md)。
- **新 Showcase**：11-10 总览和 Ocean Depth 为 indexed；HY265077 男款为 discovered-not-indexed，所有者随后确认已请求索引，建议 11-17 起复查一次。Jacquard 仍仅 Local，不提交生产索引。恢复基线已完成；下一主要效果节点为 **Knitted 与 Merino 的 10-21～11-17 完整后窗**，预计 11-20 起按 final 核验。
- **Knitted 定向诊断（11-10）**：两词三市场共 6 组、232 条返回自然结果全部核对，费用 $0.052。`knitted fabric manufacturer` US 为自然第 25，GB／CA 各 45 条返回结果未见；`performance knit fabric oem` 意图混合，不替换主词。现页结构和采购流程充分覆盖，具体面料规格与视觉对应是下一优先变量。所有者已确认 HY254955／HY265077 均可独立供货，可准备两款示例的 Local 审核版；本轮仅诊断，尚未制作或部署。10-19 峰值早于 10-20 发布，不能作改版收益；原完整后窗不变，详见 [GSC Log](gsc-data-log.md)。
- **Merino 商业词观察**：原定 10-30 的周度观察与 FLATLOCK 入链 Day 7 已于 **11-02** 补做；该次 10-03～10-30 Page 数据为 5 clicks／193 impressions，细分维度不闭合且可见商业词样本小，保持 `no-change / keep-measuring`。页面平均位置不是固定关键词排名，历史滚动窗口不能作为独立效果比较。见 [GSC Log](gsc-data-log.md) 及 [固定监测记录](research/merino-commercial-monitor-v1.md)。
- **既有关闭记录**：SEO-V2-013 已于 09-30 完成 Q3 六篇指南标准／外链复核和 QC Guide 的 ISO 2859-1:2026 更新，下次不晚于 **12-31**；SEO-V2-015 的 10-08 Day 28 为 `keep / measuring`；SEO-V2-018 已于 09-30 关闭 Sportswear lookbook、索引与三市场研究的部署记录，后续观察不重列为待上线任务。以上是带日期记录，不冒称 11-04 已重查标准或搜索状态。
- **暂缓与历史未关闭项**：SEO-V2-006 的 ThomasNet、OEKO-TEX、WRAP 仍依外部资格／可核验凭据重开；SEO-V2-007 最后记录的平台结果仍为 08-28 LinkedIn `No image found`，没有新的实际平台成功证据就不写修复完成；SEO-V2-008 的五品类响应式图片保留 `fixed / keep`。本次不重跑平台测试或扩充研究。
- **页面边界**：继续优先现有七个商业品类页，不为 Activewear／Fitness、Performance Fabrics 或单复数创建近义平行页。另经批准的 [Product Showcase 展示库与两款详情](../site/product-showcase-release-candidate-2026-11-03.md) 已于 11-04 上线，发布记录与品类实验分开；上线及进入 Sitemap 不等于 Google 已收录。
- Cloudflare `/cdn-cgi/l/email-protection`、Sitemap `noindex` 和 `/wp-sitemap.xml` 跳转沿用既定 `not-needed`／有意控制处置；HSTS、可选 Schema 和其他条件项按 Backlog 触发，不为提高工具分数重开冻结 V1。

## 5. 维护规则

- 当前结论写入本页、V2 Backlog、GSC Log 或 Progress，不回写历史审计快照；
- 研究明细可以合并到分区 README，但原始 CSV 和关键证据不得删除；
- 已完成实施记录不继续追加新的项目状态；新的改动建立新的 Change Card；
- 移动文件必须更新仓库内引用并运行 Markdown 相对链接检查；
- 内部说明默认使用简体中文，对外英文文案、URL、Schema、代码和专有名词保留英文。
