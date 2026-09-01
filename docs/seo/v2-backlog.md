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
| SEO-V2-003 | 索引、Crawl 与 HTML 响应持续监测 | IMP-033/038 | P0 | `monitoring` | 2026-08-28 两批 URL Inspection 为 18 个 Sitemap 页面中 17 个 indexed / PASS、Services `Discovered - currently not indexed`。Services 已通过实时测试并请求编入索引一次；2026-08-29 QC Guide 重复 Page 清理后，Sitemap 已恢复为 18/18 唯一 URL | 不重复提交；在合理抓取窗口内复查 Services indexed snapshot，并继续周期 Crawl / Index Snapshot |
| SEO-V2-004 | 剩余 LCP 与 Field CWV 复核 | IMP-035–038 | P0 | `monitoring` | 2026-08-27 首页 Lab LCP 3.66s，与既有 3.68s 一致；Services 3 次有效 Lab LCP 中位数 4.44s，较既有 5.00s 改善。CrUX 未配置且匿名 PageSpeed API 返回 429，Field 数据仍 unavailable；当前 `no-change / monitoring` | 分开记录 Lab 与 Field；只有取得 scope 明确的 CrUX，或同环境重复稳定恶化才重开代码优化 |
| SEO-V2-005 | 用非品牌 Query 扩充现有页面证据与内链 | IMP-014/022 | P1 | `ready-to-deploy` | 2026-09-01 所有者批准先优化 `/underwear-manufacturer/`；跨市场 SERP 支持 `performance underwear manufacturer` 的 B2B 页面所有权，US 补充 SERP 反复出现 product scope、fit、customization、testing、QC、MOQ 与 buyer questions。低 GSC 样本不支持 Title / Meta 实验，因此只增强既有页面正文、专属 H2、Customization / QC、Buyer Questions 与技术指南内链 | 保持 URL、Title、Meta、H1、图片与 Schema 类型不变；Day 0 完成生产 HTML、视觉和 Crawl 验收，Day 28 / 90 按同口径评估；不创建 Performance Underwear / Base Layer 近义页 |
| SEO-V2-006 | 站外行业引用与可信目录运营 | IMP-020 | P1 | `deferred / external-input` | ThomasNet 因地址与平台资格问题暂缓；2026-08-29 所有者确认 OEKO-TEX Buying Guide 与 WRAP 公开列名短期无法提供所需 certificate / label number、持证主体、WRAP ID、有效期及门户列名状态，同步暂缓 | ThomasNet 仅在平台书面确认资格或支持人工地址后重开；OEKO-TEX / WRAP 仅在完整可核验凭据可用后重开；不以链接总数作为成功指标 |
| SEO-V2-007 | 品类页社交图 / Schema 主图 | IMP-013 | P1 | `platform-failed / diagnosis-monitoring` | 2026-08-28 JPG 兼容修复的网站端技术验收通过，但所有者提供的 LinkedIn Post Inspector 重新抓取截图仍为 `No image found`。模拟 LinkedInBot 可访问页面和 JPG，根因尚未证实 | JPG 部署满 48 小时后复验；若仍失败，按准确时间检查 Cloudflare Security Events，再经所有者批准只对 Sportswear 做标准 JFIF/yuv420p 新文件名单页实验；不盲目批量换图 |
| SEO-V2-008 | 五个低曝光品类的响应式图片批次 | IMP-025 | P1 | `fixed / keep` | 2026-08-28 完成生产验收：五页 18/18 响应式节点、54/54 WebP、Desktop/Mobile 视觉、同一 5 URL 审计和三次 Sports Accessories Lab 均通过，无状态码、indexability、布局或可归因性能回归 | 保持现状；仅在生产资源失败、视觉回归或 Field CWV/同环境 Lab 重复恶化时重开 |
| SEO-V2-009 | Title / Meta 或 Knitted Fabrics 次级词实验 | IMP-014/022 | P2 | `deferred` | 单页达到至少 100 曝光观察门槛，且 Query 与 CTR 能支持一个明确假设 | 一次只改 Title 或 Meta 的一个主要变量；保留 28 天比较窗口 |
| SEO-V2-010 | Service Schema 与 VideoObject 可选增强 | IMP-016/027 | P2 | `conditional` | 可见内容与事实完整；GSC 视频索引或 Rich Results 证据显示实际缺口 | Validator 通过且 Schema 与可见内容一致；没有证据时允许 `not-needed` |
| SEO-V2-011 | 欧洲当地语言研究 | IMP-019 | P2 | `deferred` | 英语基线稳定；具体国家出现询盘、GSC Query 或销售需求，并具备母语审核资源 | 每个国家独立验证语言和 SERP；未批准前不建立复制页 |
| SEO-V2-012 | Performance Fabrics 信息指南条件式评估 | IMP-023 | P2 | `deferred` | GSC 出现相关 Query，或独立 SERP 研究证明 performance apparel / knit fabric 内容缺口，并有一方材料证据 | 先批准页面任务和 URL；避免家具、室内装饰意图与现有面料商业页内耗 |
| SEO-V2-013 | 技术指南标准与外链季度复核 | IMP-021 | P2 | `scheduled` | 每季度检查 ASTM / AATCC / ISO 等引用版本、链接和适用范围 | 记录复核日期、变动和负责人；没有变化也记录 `no-change` |
| SEO-V2-014 | HSTS 基础设施评估 | Crawl Low Finding | P3 | `owner-action` | 在 Cloudflare Edge Certificates 评估 HSTS；先确认子域、预加载和回滚影响 | 配置由所有者执行并验证响应头；不是排名实验，不与内容 SEO 混合归因 |
| SEO-V2-015 | 首页 `Technical Knitwear` 定位语义纠偏 | 所有者 Google 截图、业务确认与 US / GB / CA Live SERP | P1 | `fixed / measuring` | 2026-08-31 Day 0 生产验收完成：页面 HTML、Title/Meta/H1、OG/Twitter、WebPage Schema、21 URL Crawl 与 Rank Math Sitemap cache fix 均通过；Page Sitemap 保持 18 个唯一 URL，首页及 Sitemap index `lastmod` 均更新为 `2026-08-31T03:37:11+00:00` | 不重复修改首页；Day 7 检查抓取、索引和 Google Title 采用情况，Day 28 / 90 比较同口径 GSC、GA4 与有效询盘后决定 `keep`、`iterate` 或 `revert` |

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
