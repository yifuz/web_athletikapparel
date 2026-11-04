# Athletik Clothing SEO 工作台

> 当前阶段：V1 已于 2026-08-25 收尾并冻结；V2 已部署批次进入观察与到期复查
>
> 记录核对：2026-11-04；本次未刷新外部数据，指标和生产证据按原记录日期理解。
>
> 适用网站：<https://www.athletikapparel.com/>
>
> 主要市场：北美与欧洲

本目录只保留少量高频控制文档。研究过程、页面审计、事实证据和实施记录分别进入子目录；历史资料继续保留用于追溯，但不得覆盖当前生产状态。

## 1. 新会话读取顺序

1. [`../progress.md`](../progress.md)：全项目当前状态和下一步；
2. [`v2-backlog.md`](v2-backlog.md)：当前 SEO 待办、优先级和重开条件；
3. [`gsc-data-log.md`](gsc-data-log.md)：GSC / GA4 / 询盘周期数据和样本门槛；
4. [`seo-process.md`](seo-process.md)：研究、实施、发布和复盘规则；
5. 只有需要历史实施依据时，才读取 [`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md) 或对应子目录。

URL、H1 和页面所有权仍以 [`../sitemap.md`](../sitemap.md) 为准；Title / Meta 以 [`../../seo-tags.md`](../../seo-tags.md) 为准。

## 2. 根目录控制文档

| 文件 | 状态 | 用途 |
|---|---|---|
| [`v2-backlog.md`](v2-backlog.md) | 活跃 | 当前优先级、触发条件、依赖和关闭标准 |
| [`gsc-data-log.md`](gsc-data-log.md) | 持续更新 | Search Console、GA4 与人工询盘核验的周期快照和数据解读 |
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
- **基线与询盘（SEO-V2-002）**：08-27 的滚动快照保留为历史；所有者于 09-08 更正 8 月正式／有效询盘为 **0**。10-08 已补齐 9 月自然月基线并诊断、修复 Cookiebot Domain Group 授权故障；9 月 GA4 历史漏测不回填，也不能用它否定 GSC。恢复观察窗口为 **10-08～11-04**，等 GSC final 覆盖后，正式复核不早于 **11-07**。见 [GSC / GA4 / 询盘日志](gsc-data-log.md)。
- **Services（SEO-V2-003）**：最后已记录的单页 indexed snapshot 为 10-08 的 `NEUTRAL / URL is unknown to Google`；同日生产定向检查没有发现 HTTP、robots、Canonical、Sitemap 或入口阻断。保持 `no-change / monitoring`；一次已确认的索引请求不重复。下一常规复查不早于 **11-08**，按月度／明确触发条件执行，不沿用早期每周重复轮询。
- **性能（SEO-V2-004）**：09-19 已按所有者决定转为 `deferred / monitor-only`，当前不继续投入增量性能优化。首页类目图的 SEO-V2-016／017 已完成并为 `fixed / keep`，生产与 Lab 证据只支持各自范围，不将 Lab 波动解释为曝光收益；只有达到 Backlog 的性能、抓取／渲染或用户体验触发条件才重开。
- **内容与内链（SEO-V2-005）**：Knitted 结构模块 10-27 Day 7 技术／抓取检查已完成，效果为 `partial / not-enough-data`；11-17 是 Day 28 日历节点，预定 10-21～11-17 后窗须等 final 覆盖，预计 11-20 起核验。Underwear seamless、Sportswear Yoga、配件头颈模块及 FLATLOCK → Merino 内链都已有独立部署记录，分别按 [Backlog 分批表](v2-backlog.md) 的日期复查；前两项原定 11-03 Day 7 尚无完成记录，配件 Day 7 为 11-05。
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
