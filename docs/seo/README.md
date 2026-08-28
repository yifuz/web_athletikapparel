# Athletik Clothing SEO 工作台

> 当前阶段：V1 已于 2026-08-25 收尾；V2 Backlog 已建立
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
| [`seo-process.md`](seo-process.md) | 规范 | SEO 证据层级、样本门槛、Change Card 和复盘流程 |
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

## 4. 当前生产结论

- V1 生产实施已经完成，SEO-IMP-035–037 决策为 `keep`，SEO-IMP-038 为 `keep-monitoring`；
- 最新冻结 Crawl 为 `crawl_40f88b6c25d74ba79ee193c7be26caf9`：20 页、0 fetch failure；没有新增状态码错误、Title 变化或 indexability flip；
- SEO-V2-003 两批 URL Inspection 已覆盖 18 个 Sitemap 页面：17 个 indexed / PASS，Services 为 `Discovered - currently not indexed`；Services 生产端 200、index/follow、自引用 canonical、Sitemap 和首页入口均正常，当前转为 GSC 网页版实时测试与一次性请求收录的 owner action。Page Sitemap 另有一个 QC Guide 完全重复条目，当前为 Info / P3 的独立清理复核；全站监测 Crawl 无状态码或 indexability 回归，GOTS 外链 Finding 已 `fixed`；
- SEO-V2-004 于 2026-08-27 完成当前轮 Lab 复核：首页 LCP 3.66s，无恶化；Services 3 次有效 LCP 中位数 4.44s，较既有 5.00s 改善。CrUX 因未配置 API key 且匿名接口 429 仍为 unavailable，当前 `no-change / monitoring`，不触发代码改动；
- SEO-V2-006 已按所有者 2026-08-27 决定暂时跳过：ThomasNet 中国主体表单无法选择真实 Zhangjiagang 地址，错误候选指向天津，且自助入口呈现明显北美范围约束；当前为 `deferred / platform-eligibility`，只有平台确认境外供应商资格或提供人工地址录入方式才重开；
- SEO-V2-007 的 7 张 1200×627 JPG 已通过生产 HTML、Schema、资源和 7 URL 定向审计，但 LinkedIn Post Inspector 实际重新抓取仍显示 `No image found`；当前为 `platform-failed / diagnosis-monitoring`。模拟 LinkedInBot 可访问页面和图片，根因未证实；先等部署满 48 小时复验，再查 Cloudflare Security Events，必要时只做 Sportswear 单页标准 JPEG 受控实验；
- SEO-V2-008 已完成生产验收并决定 `fixed / keep`：五页 18/18 响应式节点、54/54 WebP、生产二进制一致性、Desktop/Mobile 视觉、同一 5 URL 审计与三次 Sports Accessories 移动端 Lab 均通过；
- SEO-V2-002 已完成 2026-07-26 至 08-22 的 GSC / GA4 / 询盘基线：GSC 5 点击 / 184 曝光；GA4 Organic Search 2 sessions、0 `generate_lead`、0 有效询盘；全站 8 次 `generate_lead` 中有效询盘 1 次，来自 Organic Social。页面与查询均未达到修改门槛；
- Cloudflare `/cdn-cgi/l/email-protection`、Sitemap `noindex` 和 `/wp-sitemap.xml` 跳转均已有明确 `not-needed` / 有意控制处置；
- Breadcrumb 严格字段、HSTS、剩余大图、品类社交图和可选 Schema 不是 V1 阻塞项，重开条件统一记录在 V2 Backlog；
- 当前没有批准新的商业页面或近义页面。任何新 URL 必须重新经过业务匹配、SERP、页面所有权和 301 决策。

## 5. 维护规则

- 当前结论写入本页、V2 Backlog、GSC Log 或 Progress，不回写历史审计快照；
- 研究明细可以合并到分区 README，但原始 CSV 和关键证据不得删除；
- 已完成实施记录不继续追加新的项目状态；新的改动建立新的 Change Card；
- 移动文件必须更新仓库内引用并运行 Markdown 相对链接检查；
- 内部说明默认使用简体中文，对外英文文案、URL、Schema、代码和专有名词保留英文。
