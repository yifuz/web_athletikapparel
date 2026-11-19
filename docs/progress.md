# Athletik Clothing 项目进度

> 更新：2026-11-19。这里保留跨项目最新现状、下一步及**当月（2026-11）工作流水账**；每月底将当月流水账按月归档至 `docs/archive/progress-YYYY-MM.md`。
> 📅 **历月进度归档直达**：[2026-07](archive/progress-2026-07.md) · [2026-08](archive/progress-2026-08.md) · [2026-09](archive/progress-2026-09.md) · [2026-10](archive/progress-2026-10.md) · **2026-11（当月见下表）** · [全量合集快照](archive/progress-history-2026-11-18.md)

## 当前状态

- **网站**：https://www.athletikapparel.com/ 已在 Flywheel 运行。Local 审核、所有者批准、生产部署和验收是独立步骤；实施及回退见[部署流程](operations/flywheel-ssh-deployment.md)。
- **GEO**：宽泛采购问题中的独立佐证仍是主要缺口。已发布的买家公开名单、Sportswear 证据及现有样本见 [GEO 工作台](geo/GEO.md)；已上线不代表已被 AI 引用或推荐。
- **询盘来源**：2026-11-18 已在首页、联系页和七个类目页上线可多选的客户自报来源，同时更新 Privacy Policy。线上显示与字段规则已验收；本次未发送真实测试询盘，邮件实际送达未复验。
- **SEO**：既有页面和观察窗口以 [SEO 工作台](seo/README.md) 及 [V2 Backlog](seo/v2-backlog.md) 为准。2026-11-19 已按覆盖至 11-17 的 `final` 数据完成 Knitted（1/84→1/177）与 Merino（4/177→7/201）完整 28 天后窗复盘（均 `no-change`，明细见 [GSC Log](seo/gsc-data-log.md)）；同日 URL Inspection 确认 Showcase 男款 HY265077 等 3 页已收录，`mens-half-zip-fleece-top` 与 Tech Pack Guide 已于 11-19 由所有者请求索引（建议 11-26 起复查）。下一窗口为 FLATLOCK→Merino 入链（11-23 起）及 Underwear / Yoga（11-27 起）。
- **对外账号**：官网、当前 Instagram 和 LinkedIn 纳入 GEO；公开发布仍需对应授权。YouTube 账号不由所有者管理。
- **隐私与询盘**：当前 Privacy Policy 见[批准文本](privacy/policy-draft.md)，其他同意与营销边界见 [privacy 目录](privacy/)。不把来源未知的询盘推断为某一渠道的成果。

## 接下来的工作

1. 核查可控社交资料及相关公开档案的公司名称、正确地址和官网入口；2026-11-19 已提交 OS Hub 档案（`CN2021314PF2M92`，Claim `#6327`）认领并挂载主站网址（待平台审核），中国站与 SourceReady 公开页仍为 No.25，继续等待修复/回复。
2. Knitted 完整后窗已收尾，待授权后可推进 HY254955 / HY265077 两款实物面料 Local 审核版；按原计划核查 11-20/21 Merino 固定 SERP 安排与 11-23 起 FLATLOCK→Merino 入链后窗。
3. 其余 GEO 问题、样本和候选内容只在 [GEO 工作台](geo/GEO.md)维护；网站结构与 URL 以 [sitemap](sitemap.md) 为准。

## 2026-11 当月工作流水账（按日追加，严禁抹除，月底归档为 `archive/progress-2026-11.md`）

> 📅 切换月份：[2026-07](archive/progress-2026-07.md) · [2026-08](archive/progress-2026-08.md) · [2026-09](archive/progress-2026-09.md) · [2026-10](archive/progress-2026-10.md) · **2026-11（当前月）**

| 日期 | 领域 | 完成事项与核心结果 | 证据 / 详录入口 |
|---|---|---|---|
| 2026-11-02 | GEO / 网站 | 中国生产地址更正为中兴路 15 号；C06/C08 内容日期同步；About 上线 Canadian Tire 与 Sainsbury's 公开名单 | [`address-correction-2026-11-02.md`](geo/testing/address-correction-2026-11-02.md) · [`buyer-disclosures-2026-11-02.md`](geo/testing/buyer-disclosures-2026-11-02.md) |
| 2026-11-02 | SEO | Merino 周度 GSC 复查（10-03～10-30 为 5/193）与 FLATLOCK→Merino 内链 Day 7 验收通过 | [`gsc-data-log.md`](seo/gsc-data-log.md) |
| 2026-11-04 | 网站 | 建立专用 Flywheel SSH 部署流程；Product Showcase 总览及女装 Ocean Depth、男装 HY265077 正式上线 | [`flywheel-ssh-deployment.md`](operations/flywheel-ssh-deployment.md) · [`product-showcase-release-candidate-2026-11-03.md`](site/product-showcase-release-candidate-2026-11-03.md) |
| 2026-11-05 | 网站 | Sportswear 单排 2:3 图集与 Merino 共用大图查看器 SSH 部署及生产验收通过 | [`product-gallery-alignment-2026-11-04.md`](site/product-gallery-alignment-2026-11-04.md) |
| 2026-11-10 | SEO | 完成 10-08～11-04 GSC+GA4 恢复窗口基线（GSC 36/1,443，GA4 Organic 16、AI 21）、三模块 Day 7 及 Knitted 搜索诊断 | [`gsc-data-log.md`](seo/gsc-data-log.md) |
| 2026-11-10 | 网站 | 女款 Wool Jacquard 提花四视频 Showcase 上线（ID 109）；Merino 预览限定两款 | [`product-showcase-jacquard-2026-11-07.md`](site/product-showcase-jacquard-2026-11-07.md) |
| 2026-11-13 | 网站 | Knitted Fabrics 97 款代表性面料库（11-10 部署）及两款 Outdoor Showcase（摇粒绒 ID 111、石墨烯套装 ID 113）生产验收完成 | [`fabric-library-expansion-2026-11-10.md`](site/fabric-library-expansion-2026-11-10.md) · [`product-showcase-outdoor-release-2026-11-13.md`](site/product-showcase-outdoor-release-2026-11-13.md) |
| 2026-11-16 | GEO | C06/C08 索引复核（C08 已重抓收录）；所有者手动复测 D04（第 1）、BD-02（未提）、C08（未提）入账 | [`geo-evidence-and-index-review-2026-11-16.md`](geo/testing/geo-evidence-and-index-review-2026-11-16.md) · [`manual-2026-11-16/README.md`](geo/testing/valid-retest/manual-2026-11-16/README.md) |
| 2026-11-17 | GEO / 网站 | Sportswear 4 卡采购证据区、About + Sportswear 的 Asda 与 New Balance（Licensee Q1-2026）OS Hub 公开记录上线验收 | [`bd02-sportswear-evidence-2026-11-16.md`](geo/testing/bd02-sportswear-evidence-2026-11-16.md) · [`buyer-disclosures-osh-2026-11-17.md`](geo/testing/buyer-disclosures-osh-2026-11-17.md) |
| 2026-11-17～18 | GEO | 核查 SourceReady 中国实体档案（门牌 25 号、缺主站）并发送官方更正请求；梳理功能针织面料测试指南候选 | [`source-ready-bd02-audit-2026-11-17.md`](geo/testing/source-ready-bd02-audit-2026-11-17.md) · [`performance-knit-testing-guide-opportunity-2026-11-17.md`](geo/testing/performance-knit-testing-guide-opportunity-2026-11-17.md) |
| 2026-11-18 | 网站 / 隐私 | 表单 3 上线 6 项可多选“客户自报询盘来源”字段并同步更新生产 Privacy Policy | [`policy-draft.md`](privacy/policy-draft.md) · `367d50b` / `0b06e15` |
| 2026-11-18～19 | 文档治理 | 完成两轮文档减负：瘦身 `AGENTS.md`（13.9 KB）、确立三级记录制、历史快照与 8～10 月 GSC 日志统一归入 `docs/archive/` | [`archive/README.md`](archive/README.md) · `01a22c6` / `87ac4c6` |
| 2026-11-19 | SEO | 5 URL 索引复查（3 款新 Showcase 已收录）；完成 Knitted（1/84→1/177）与 Merino（4/177→7/201）完整 28 天 final 后窗复盘 | [`gsc-data-log.md`](seo/gsc-data-log.md) · `10dcb2c` |
| 2026-11-19 | GEO / SEO | 提交并保存 OS Hub 工厂档案（`CN2021314PF2M92`，Claim `#6327`）认领及主站外链；对摇粒绒 Showcase 与 C06 指南请求 GSC 索引 | [`GEO.md`](geo/GEO.md) · [`v2-backlog.md`](seo/v2-backlog.md) · `8b99417` |

## 使用与维护

- **顶部“当前状态/接下来的工作”**保持最新快照；**每次完成工作必须在上方【近期工作流水账】追加 1 行**，保证所有做过的工作 100% 有迹可循。
- 专项详情留在对应工作台或单页简报中，流水账通过链接指向证据，不重复抄写长篇免责声明。
- 文档入口见 [README](README.md)；涉及网站事实、发布授权及保密边界时先读根目录 AGENTS.md。
