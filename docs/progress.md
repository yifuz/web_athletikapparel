# Athletik Clothing 项目进度

> 更新：2026-11-23。这里保留跨项目最新现状、下一步及**当月（2026-11）工作流水账**；每月底将当月流水账按月归档至 `docs/archive/progress-YYYY-MM.md`。
> 📅 **历月进度归档直达**：[2026-07](archive/progress-2026-07.md) · [2026-08](archive/progress-2026-08.md) · [2026-09](archive/progress-2026-09.md) · [2026-10](archive/progress-2026-10.md) · **2026-11（当月见下表）** · [全量合集快照](archive/progress-history-2026-11-18.md)

## 当前状态

- **网站**：https://www.athletikapparel.com/ 已在 Flywheel 运行。Local 审核、所有者批准、生产部署和验收是独立步骤；实施及回退见[部署流程](operations/flywheel-ssh-deployment.md)。
- **GEO**：宽泛采购问题中的独立佐证仍是主要缺口。已发布的买家公开名单、Sportswear 证据及现有样本见 [GEO 工作台](geo/GEO.md)；已上线不代表已被 AI 引用或推荐。
- **询盘来源**：2026-11-18 已在首页、联系页和七个类目页上线可多选的客户自报来源，同时更新 Privacy Policy。线上显示与字段规则已验收；本次未发送真实测试询盘，邮件实际送达未复验。
- **SEO**：既有页面和观察窗口以 [SEO 工作台](seo/README.md) 及 [V2 Backlog](seo/v2-backlog.md) 为准。2026-11-19 已按覆盖至 11-17 的 `final` 数据完成 Knitted（1/84→1/177）与 Merino（4/177→7/201）完整 28 天后窗复盘（均 `no-change`，明细见 [GSC Log](seo/gsc-data-log.md)）；同日 URL Inspection 确认 Showcase 男款 HY265077 等 3 页已收录，`mens-half-zip-fleece-top` 与 Tech Pack Guide 已于 11-19 由所有者请求索引（建议 11-26 起复查）。下一窗口为 FLATLOCK→Merino 入链（11-23 起）及 Underwear / Yoga（11-27 起）。
- **对外账号**：官网、当前 Instagram 和 LinkedIn 纳入 GEO；公开发布仍需对应授权。YouTube 账号不由所有者管理。
- **隐私与询盘**：当前 Privacy Policy 见[批准文本](privacy/policy-draft.md)，其他同意与营销边界见 [privacy 目录](privacy/)。不把来源未知的询盘推断为某一渠道的成果。

## 接下来的工作

1. **站外权威跟进**：OS Hub 认领（`#6327`）、SourceReady 更正、Merrow 案例合作与 Woolmark 并列主站询问均已发出并等待平台/官方回复；`athletik.com.cn` 与 `SourceReady` 截至 11-23 仍显示 `No.25`；Europages 已实测确认强制欧洲注册国家与 VAT 税号，改为 `deferred / platform-eligibility`（同 ThomasNet）。
2. **站内下一批高曝光技术指南**：**方案 A：`Merino Wool Base Layer GSM Guide`**（`/merino-wool-base-layer-gsm-guide/`，生产 ID 118）已于 11-23 上线部署（反哺 `/merino-wool-manufacturer/`）；接下来推进 **方案 B：`Activewear & Compression Garment Manufacturing Guide`**（反哺 `/sportswear-manufacturer/`）。
3. **到期观察窗口**：`11-26` 起复查摇粒绒 Showcase、升级版 Tech Pack 与 `FLATLOCK vs COVERSTITCH` 的 GSC 抓取/收录；`11-28` 起复盘 `sportswear-manufacturing-evidence` 社媒七日表现；`12-01` 起复盘 `FLATLOCK vs COVERSTITCH` 视频帖七日表现。

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
| 2026-11-20 | 询盘 / 品牌规范 | 完成一轮 B2B 询盘两封英文回复审核通过，并自动提炼更新询盘手册与品牌规范技能（无公开私标目录库但过往款版型/tech pack 可按项目评估沿用或微调、小单限库存布、全流程与成衣阶段排期拆分、美中实体分工与 USCC/办公地址、BSCI 与营业执照分阶段披露及精简跟进原则） | [`inquiry-reply-playbook.md`](marketing/inquiry-reply-playbook.md) · [`SKILL.md`](../.agents/skills/wp-brand-voice-guard/SKILL.md) |
| 2026-11-20 | GEO / 社媒分发 | 完成 `2026-11-sportswear-manufacturing-evidence` 社媒素材包（1080×1350 主图与 390×488 手机预览零溢出、双端 UTM 经 `Invoke-WebRequest` 验证 HTTP 200 且参数保留）；同日所有者确认 LinkedIn 与 Instagram Feed 均已发布，双端公开 URL 匿名复验 HTTP 200，七日复盘窗 `2026-11-21～11-27`（11-28 起复盘；Story 状态待确认） | [`publishing-log.md`](geo/distribution/publishing-log.md) · 本地素材包 |
| 2026-11-20 | SEO / 网站 | Tech Pack 指南（`/technical-knitwear-tech-pack-guide/`，生产 ID 74）完成 Title / Meta / H1 / JSON-LD `about` / `updated_on`（`2026-11-20`）及首句微调破圈升级（保留原 URL、POM/BOM 示范表与 9 页 PDF 入口）；Local 1440/390px 审核通过后经所有者批准 SSH 部署生产（仅传 2 个 PHP，未传含本地预览的 `functions.php`），线上 HTTP 200、Meta/OG/Twitter/JSON-LD、Hub 卡片与 `/page-sitemap.xml` `lastmod=2026-11-20` 验收通过 | [`seo-tags.md`](../seo-tags.md) · `inc/technical-article-data.php` · `content-technical-knitwear-tech-pack-guide.php` |
| 2026-11-20 | SEO / 网站 | 新增第 7 篇技术指南 `/flatlock-vs-coverstitch-technical-knitwear/`（生产 ID 116，ISO 607 vs ISO 605/406 与假平缝拆解；含 JACK 平板绷缝 720×1280 30fps SDR 静音视频/海报及 Yamato+JACK 拼图封面，复用既有 Yamato 视频，并在 OVERLOCK 指南补充导流内链）；按所有者 8 处复审修订后批准 SSH 部署生产（5 PHP + 4 媒体全量 SHA-256 校验），线上 HTTP 200、单一 H1、Meta/OG/Twitter、Article+FAQPage(5)+BreadcrumbList、视频 200/206、OVERLOCK 内链及 `/page-sitemap.xml` `lastmod=2026-11-20` 验收通过（`/technical-guides/` 源站已现 7 卡，裸 URL 待 Flywheel Varnish 缓存过期或后台 Flush） | [`seo-tags.md`](../seo-tags.md) · `page-flatlock-vs-coverstitch-technical-knitwear.php` · `content-flatlock-vs-coverstitch-technical-knitwear.php` |
| 2026-11-20 | GEO / 站外权威 | 所有者完成可控社媒主页地址更正（No.15），并向 Merrow（`support@merrow.com`，附 `MB-4DFO 2.0` ACTIVESEAM 指南与视频链接）及 Woolmark（Licence `0030001176` 询问并列添加主站网址、保留 `woolbaselayer.com`）发送合作/更新邮件 | [`GEO.md`](geo/GEO.md) · [`offsite-authority-opportunity-pool-v1.md`](seo/authority/offsite-authority-opportunity-pool-v1.md) |
| 2026-11-20 | 网站 | `/technical-guides/` 枢纽页升级：新增 4 主题筛选标签与实时搜索、桌面每页 6 篇／手机 4 篇分页（服务端仍全量输出 7 篇内链保 SEO）、16:9 紧凑卡片、Library scope 改桌面 4 列单行，并将 Hero 统一为全站全幅实拍背景图+左侧深色渐变遮罩；Local 验收后经所有者批准 SSH 部署生产（4 文件全量 SHA-256 校验，无媒体/库变更），源站 HTTP 200 与浏览器交互验收通过（裸 URL 待 Flywheel 边缘缓存刷新或自然过期） | `8b7d0fe` · `inc/technical-article-data.php` · `template-parts/technical-article/hub.php` · `assets/js/technical-guides.js` · `style.css` |
| 2026-11-23 | GEO / 站外与社媒 | 所有者确认发布 `FLATLOCK vs COVERSTITCH` LinkedIn + Instagram 原生车间视频帖（双端 UTM 预验 HTTP 200，七日窗 11-24～11-30）；实测 Europages 强制欧洲注册国家与 VAT 税号，标为 `deferred / platform-eligibility` 并跳过；批准连续立项 Merino GSM 与 Activewear/Compression 两篇高曝光技术指南 | [`publishing-log.md`](geo/distribution/publishing-log.md) · [`offsite-authority-opportunity-pool-v1.md`](seo/authority/offsite-authority-opportunity-pool-v1.md) |
| 2026-11-23 | SEO / 网站 | 新增第 8 篇技术指南 `/merino-wool-base-layer-gsm-guide/`（生产 ID 118，覆盖 140–260 GSM 四档、真实面料库货号、Micron/结构/混纺/ISO 607+605+406 工艺、Woolmark `0030001176` & GRS `ITS-TE-00013212-GRS-04011700`、MOQ 500/400–500 口径，全幅背景 Hero 与羊毛微距配图均用 WebP，并在 `/merino-wool-manufacturer/` 增设入口卡及 `/knitted-fabrics-manufacturer/#fabric-library` 锚点）；Local 1440/390px 审核后经所有者批准直接 SSH 部署生产（10 代码文件 + 4 WebP 全量 SHA-256 校验，执行 `wp cache flush`、`wp rewrite flush` 与 Rank Math Sitemap 缓存清理；按所有者指示未执行线上复验；Flywheel 边缘 Varnish 如需即时显现 8 卡可在后台 Flush） | `a3c2799` · [`seo-tags.md`](../seo-tags.md) · `page-merino-wool-base-layer-gsm-guide.php` · `content-merino-wool-base-layer-gsm-guide.php` |

## 使用与维护

- **顶部“当前状态/接下来的工作”**保持最新快照；**每次完成工作必须在上方【近期工作流水账】追加 1 行**，保证所有做过的工作 100% 有迹可循。
- 专项详情留在对应工作台或单页简报中，流水账通过链接指向证据，不重复抄写长篇免责声明。
- 文档入口见 [README](README.md)；涉及网站事实、发布授权及保密边界时先读根目录 AGENTS.md。
