# SEO 审计汇总与实施清单 V1

> 建立日期：2026-08-17
>
> 市场范围：北美与欧洲
>
> 当前对象：<https://www.athletikapparel.com/>
>
> 输入：[`Sportswear` 审计](page-audit-sportswear-manufacturer-v1.md)、[`Knitted Fabrics` 审计](page-audit-knitted-fabrics-manufacturer-v1.md)、[`Tech Pack Guide` 审计](page-audit-technical-knitwear-tech-pack-guide-v1.md)、[`关键词—页面映射`](keyword-page-mapping-v1.md)、[`US Performance Fabric 关键词验证`](data/keyword-planner-performance-fabric-validation-us-2026-08-17.csv)
>
> 状态说明：本文是实施真值表；历史审计继续保留当时快照，不回写成“已经通过”

## 1. 执行结论

当前网站没有全站抓取、索引、Canonical、Title、H1 或 Sitemap Critical 问题。下一阶段不是批量增加关键词，也不是重建更多近义页面，而是提高以下四类可积累信号：

1. **主题关系**：让商业页、技术指南和 Services 通过自然上下文内链形成清晰主题网络；
2. **页面证据**：用真实业务边界、规格、流程、测试和认证文件支持页面承诺；
3. **交付质量**：减少重复 CSS 和超大图片，控制移动端下载量及 Core Web Vitals 风险；
4. **外部权威与反馈**：持续获得真实引用/链接，并用 GSC 的 Query/Page 数据决定后续 Title、Meta 和正文微调。

“搜索权重”不是一个可以直接填写的单项分数。可控目标是让 Google 更容易确认：页面可以稳定抓取、与搜索任务匹配、站内主题关系明确、内容有一方证据、体验可靠，并且站外存在真实提及。

## 2. 三页审计汇总

| 页面 | 已通过 | 主要缺口 | 当前决策 |
|---|---|---|---|
| `/sportswear-manufacturer/` | 200、可索引、URL/Title/H1/Meta/Canonical、Schema、首页入口、条件式性能表达、500 pcs per style、术语和响应式 WebP 均已生产验收 | 品类页社交图仍为 Logo；Header/Footer 共用 Logo 缺少固有尺寸 | 保留 URL/Title/H1；不拆 Activewear/Fitness 页面；社交图与 Logo 尺寸分别由 SEO-IMP-013/024 处理 |
| `/knitted-fabrics-manufacturer/` | 200、可索引；独立面料供货、fabric-specific MOQ/开发/报价、IMP-010 商业能力语境及 30 个 WebP 已生产验收 | 品类页社交图仍为 Logo；Header/Footer 共用 Logo 缺少固有尺寸 | 保留 URL/Title/H1/Meta；继续由同页承接次级词，不创建近义面料页 |
| `/technical-knitwear-tech-pack-guide/` | 已收录；Title/H1/Meta、Article/FAQ/Breadcrumb、definition/scope、商业页内链、专属社交图、阅读时长和单一 child stylesheet 已生产验收 | 当前无阻塞项 | 保留页面范围，进入 7/28/90 天观察，不做通用模板页 |

共同结论：当前排名上限更可能受主题连接、证据完整度、性能和域名权威影响，而不是关键词是否重复得足够多。

### 2.1 Knitted Fabrics 美国关键词验证

本批数据来自 Google Keyword Planner，美国、所有语言、Google 网络，区间为 2024-08 至 2026-07。`NR` 表示 Google 未报告可用数据，不等同于已经证明搜索量严格为零。`Competition` 是 Google Ads 广告竞争，不是自然搜索难度。

| 关键词 | Planner 月均量 | 重算近 12 个月均量 | 意图判断 | 页面决策 |
|---|---:|---:|---|---|
| `knitted fabric manufacturer` | 70 | 41.7 | 明确的 B2B 针织面料制造商采购 | 保持页面主词 |
| `sportswear fabric manufacturer` | 70 | 32.5 | 明确的运动服面料采购，但同比波动较大 | 保持次级商业词并监测 |
| `performance knit fabric` | 30 | 35.0 | 高度相关的产品/材料词，没有明确 manufacturer 限定 | 用于现有产品分类、H2 和自然正文 |
| `performance fabrics` | 2,400 | 2,275.0 | 高需求但混合服装、家居、室内装饰与知识型意图 | 仅作次级主题；条件式评估未来指南 |
| Performance + `manufacturer` 变体 | NR | NR | 精确采购变体未获得需求信号 | 不替换当前主词，不新建近义商业页 |

据此锁定当前页面架构：URL `/knitted-fabrics-manufacturer/`、Title 和 H1 继续由 `knitted fabric manufacturer` 承担；`performance knit fabric` 和 `sportswear fabric manufacturer` 作为同页次级词；宽泛的 `performance fabrics` 不进入 URL、Title 或 H1。SEO-IMP-009 与 SEO-IMP-010 已完成本地实施和再验收，下一阶段以部署、收录、Query 和询盘反馈验证该单页架构。

## 3. 优先级方法

每个项目按四个维度排序：

| 维度 | 高 | 中 | 低 |
|---|---|---|---|
| 预期收益 | 能影响多个目标页、抓取理解、相关性、性能或合格询盘 | 影响单页或辅助搜索展示 | 主要是维护一致性 |
| 变更风险 | 可能改变页面搜索任务、业务承诺、URL、表单或事实合规 | 需要回归页面/Schema/资源部署 | 可回滚的链接、元数据或资源去重 |
| 证据置信度 | 已由生产 HTML、官方资料或一方事实确认 | 有审计信号，但需生产验证 | 仅为推测或数据样本不足 |
| 依赖成本 | 需要所有者、证书、测试、图片处理或生产部署 | 需要代码和页面回归 | 只需小型代码/文档改动 |

执行原则：先做“高/中收益 + 低风险 + 高置信度”，再做“高收益 + 有事实依赖”，最后才做搜索词和页面结构实验。

## 4. SEO 实施主清单

### A. 第一批：高收益或中收益、低风险

| ID | 项目 | 收益 | 风险 | 状态 | 验收标准 |
|---|---|---|---|---|---|
| SEO-IMP-001 | Tech Pack Guide 增加到 Knitted Fabrics、Sportswear、Services 的正文上下文链接；Knitted Fabrics 回链指南 | 高：加强商业页与技术内容的主题图谱，并为合格买家提供下一步路径 | 低 | **生产验收通过（2026-08-20）** | 目标 URL 和上下文锚文本均已在生产确认，链接终点为 200 |
| SEO-IMP-002 | Technical Guides Hub 和四篇指南使用各自批准封面作为 Open Graph、Twitter 及 WebPage `primaryImageOfPage` | 中：提高分享摘要相关性，并统一可见内容、Article 和 WebPage 图像实体 | 低 | **生产验收通过（2026-08-20）** | Hub 与四篇指南均输出非 Logo 专属 WebP，OG/Twitter 一致，JSON-LD 可解析 |
| SEO-IMP-003 | 移除 GeneratePress 自动 child stylesheet 与主题手动 enqueue 造成的重复 `style.css`，同时停止加载无实际规则的父主题 `style.css` 头文件 | 中：减少两个阻塞型 CSS 请求/解析项，覆盖全站 | 低 | **生产验收通过（2026-08-20）** | 15 个关键页面均只加载一份 child `style.css` |
| SEO-IMP-004 | 将 Sitemap `lastmod` 与本次主题渲染正文/Schema 更新同步 | 低到中：帮助搜索引擎区分真实更新，不伪造全站新鲜度 | 低 | **生产验收通过（2026-08-20）** | Page Sitemap 含 19 个 URL；QC Guide 已出现并输出 2026-08-20 `lastmod` |

### B. 第二批：高收益、需要资源处理或所有者输入

| ID | 项目 | 收益 | 风险 | 依赖 | 状态 |
|---|---|---|---|---|---|
| SEO-IMP-005 | Sportswear 四张产品图生成 6 档真无损 WebP，并补 `width`/`height`、`srcset`/`sizes`、`decoding="async"` | 高：480–800 px 候选相对原 PNG 合计减少 82.30%–93.68%，同时避免移动端过度分辨率 | 中：图片位于 uploads，需单独部署并做视觉回归 | 源 PNG 与 24 个派生 WebP 已部署 | **生产验收通过（2026-08-20）**：4 个 `<picture>`、24 个 WebP 和 4 个 PNG 回退均通过 HTTP/MIME 与静态标记检查 |
| SEO-IMP-006 | Knitted Fabrics 五张产品图执行同样的响应式真无损优化 | 高：480–800 px 候选相对原 PNG 合计减少 80.32%–93.37% | 中：细节图清晰度、资源路径和上传部署必须核对 | 源 PNG 与 30 个派生 WebP 已部署 | **生产验收通过（2026-08-20）**：5 个 `<picture>`、30 个 WebP 和 5 个 PNG 回退均通过 HTTP/MIME 与静态标记检查 |
| SEO-IMP-007 | 建立 Sportswear 公开能力事实表并修正绝对化表述 | 高：减少不可信承诺，提高专业采购页证据质量 | 中：错误修改会弱化真实能力或制造新声称 | 所有者确认 SP-01–SP-10 均可满足，但报告按项目提供；页面改为能力/规格/测试条件表达 | **生产验收通过（2026-08-20）**：条件式性能、买家测试标准和项目测试语境已出现在生产 HTML |
| SEO-IMP-008 | 评估将 Sportswear `MOQ 500 pieces per style` 资格信号移到首屏，并同步全站业务事实 | 中：资格信息有助于预筛，但不是直接排名因素 | 中：首屏信息层级和视觉节奏可能受损 | 500 件业务事实已同步；`Estimated Order Quantity` 与 per-style MOQ 保持分离 | **生产验收通过（2026-08-20）**：首页 Hero 无 MOQ 资格条，六个成衣品类显示 `500 pcs`，面料页保持项目制 MOQ |
| SEO-IMP-009 | 确认 Knitted Fabrics 是否接受独立面料订单，并建立 fabric-specific MOQ、报价单位、开发和交付流程 | 高：决定页面是否真正匹配 `knitted fabric manufacturer` 商业搜索承诺 | 高：错误答案会改变页面定位、表单和 Meta | 所有者已于 2026-08-18 完成 [`Knitted Fabrics 独立面料业务事实表`](knitted-fabrics-business-fact-sheet-v1.md)；URL/Title/H1/Meta 与表单结构保持不变 | **生产验收通过（2026-08-20）**：standalone fabric、项目制 MOQ、fabric brief、开发和量产周期字段均已核对 |
| SEO-IMP-010 | 核验并重写 Knitted Fabrics 的 GRS、追溯、自有工艺、测试和性能声称 | 高：强化商业主题、买家相关性与信任 | 中到高：硬认证和量化结果仍需准确，服务能力不要求已有公开案例 | 所有者确认 BTEXCO 也是本业务主体；按 [`Knitted Fabrics 声称—证据矩阵`](knitted-fabrics-claim-evidence-matrix-v1.md) 保留可交付能力并缩短限定语 | **生产验收通过（2026-08-20）**：Meta 与页面能力语境一致，URL/Title/H1 保持不变 |

### C. 第三批：数据驱动的页面微调

| ID | 项目 | 收益 | 风险 | 启动条件 | 状态 |
|---|---|---|---|---|---|
| SEO-IMP-011 | 统一产品页 SEO 字段真值来源，清理或注释未参与生产输出的 `meta_description` | 中：避免以后“代码已改、生产未变” | 低到中 | 先确认 Rank Math/代码各字段的最终职责 | **已完成（2026-08-19）**：本地 curl 逐页核实生产来源；`inc/product-category-data.php` 增加真值来源 docblock（六个服装品类页字段不参与生产输出，Knitted Fabrics 为唯一例外并加行内注释）；`functions.php` 首页 description 与 `rank-math.php` 头部补注释（`rank-math.php` 由 Rank Math 插件自动加载，非 functions.php）；`seo-tags.md` 新增“字段真值来源”一节作为单一规范文档 |
| SEO-IMP-012 | 修正 Sportswear 中 `ACTIVESEAM`/FLATLOCK 术语，并同步规范 Meta 与生产 Rank Math 字段 | 中：语义和品牌专业度一致 | 低到中 | 与 SEO-IMP-007 同批，避免只修大小写却保留无证据表达 | **生产验收通过（2026-08-20）**：15 个关键页面可见文本未发现小写 `flatlock`/`activeseam` 漂移；URL、文件名和 ID 未改 |
| SEO-IMP-013 | 为 Sportswear、Knitted Fabrics 等类目选择批准的代表图作为社交图/Schema 主图 | 中：改善页面分享和主题图像信号 | 低到中 | 所有者确认每页代表图；生成合适派生尺寸 | 待选图 |
| SEO-IMP-014 | 复核首页及多个类目 157–165 字符 Meta、Services 63 字符 Title | 低到中：主要影响摘要截断和 CTR，不是索引问题 | 中：过早缩短可能损失意图信息 | 先取得页面级 GSC Query/CTR 数据 | 观察 |
| SEO-IMP-015 | 审计 Underwear、Outdoor、Merino、Silk、Sports Accessories 与三篇指南剩余两篇 | 高：扩大已验证的页面级基线 | 低 | 第一批部署稳定后逐页执行 | **已完成（2026-08-18，7 份只读审计文档；发现汇总见本文 §4A）** |
| SEO-IMP-016 | 为类目页评估 `Service` Schema，保持可见内容和事实一致 | 低到中：增强机器可读服务关系，但不作为排名捷径 | 中 | 页面业务事实确认；通过 Schema Validator | 待评估 |
| SEO-IMP-022 | 固化 Knitted Fabrics 主次词架构：保留现有 URL/Title/H1，以 `performance knit fabric` 和 `sportswear fabric manufacturer` 补充产品、应用和询盘语境 | 中到高：同时保留精准采购意图和 Performance 主题覆盖，不引入近义页内耗 | 低到中：事实不足时扩写会放大未证实的工艺、测试或独立供货承诺 | SEO-IMP-009/010 已完成；后续只依据 GSC 和新增一方证据迭代，不做关键词堆叠 | **本地核验完成（2026-08-18）**：URL/Title/H1 保持；`performance knit fabric` 已进入 What we make、子类标题、正文与 alt 语境；`sportswear fabric manufacturer` 精确短语未出现，列为所有者批准的微文案候选，不自行改写；GSC 分组监测见 `gsc-data-log.md` |
| SEO-IMP-024 | 为 Header 与 Footer 共用 Logo 补充固有 `width`/`height` | 低到中：减少共享布局的潜在 CLS，完善全站图片静态信号 | 低：需确认 GeneratePress Logo 输出与 Footer markup 的统一尺寸策略 | 2026-08-21 已核对源图为 512×512，生产 Header/Footer 两处均缺尺寸属性 | **生产验收通过（2026-08-25）**：首页与 Contact 每页两处 Logo 均输出 `512×512`，资源 200/MIME 正确，Desktop/Mobile 显示正常；部署后 Crawl 无新增状态码错误。Change Card 决策 `keep`：[`SEO-IMP-024`](change-cards/seo-imp-024-logo-intrinsic-dimensions.md) |

### D. 第四批：内容扩展与站外权威

| ID | 项目 | 收益 | 风险 | 启动条件 | 状态 |
|---|---|---|---|---|---|
| SEO-IMP-017 | 基于真实 Query/Page 数据决定是否补 Tech Pack 的简短 definition/scope 段 | 中到高：承接 `clothing/garment/apparel tech pack` 的相关曝光 | 中：可能把页面拉向模板、工具或 startup 意图 | 匹配查询持续获得曝光但排名/CTR不足 | **生产验收通过（2026-08-20）**：definition、cut-and-sew apparel scope 和 Schema `Apparel tech pack` 均已生效；URL/Title/H1/Meta 保持不变 |
| SEO-IMP-018 | QC Guide 内容简报、事实确认、正文与页面实施 | 高：独立的采购尽调任务和潜在链接资产 | 高：不能发明 QC 节点、记录或标准 | 一方 QC 流程、素材和责任边界由所有者确认 | **生产验收通过（2026-08-20）**：URL 200 且可索引；Title/Meta/H1/Canonical、Article/FAQPage/BreadcrumbList、3 支视频、7 个媒体资源、Hub 与 Sitemap 入口均通过。GSC API Inspection 暂时 `fetch failed`，待网页版实时测试与请求编入索引 |
| SEO-IMP-019 | NL / SE / NO / FI 本地语言研究 | 中：验证英语之外的欧洲买家语言 | 低 | 英语基线实施和监测稳定 | 待研究 |
| SEO-IMP-020 | 技术指南持续分发并争取真实行业引用、供应商目录/协会资料页及合作方链接 | 高：增加独立站外提及和引用域，而不是依赖站内信号 | 中：必须是真实关系，禁止购买批量垃圾链接 | 建立目标来源、发布记录和引用 URL 台账 | **已收尾（2026-08-19）**：机会池已建立（[`offsite-authority-opportunity-pool-v1.md`](offsite-authority-opportunity-pool-v1.md)）；ThomasNet 中国主体已注册；Merrow 邮件草稿已备好但所有者决定暂缓；Kompass $70/3y 待决策；OEKO-TEX/WRAP 免费登记待执行；收益评估见附录 C |
| SEO-IMP-021 | 每季度复核指南引用的 ASTM/AATCC/ISO 等标准版本和链接 | 中：维持技术内容可靠性和更新依据 | 低 | 指定复核日期与负责人 | 待建立节奏 |
| SEO-IMP-023 | 条件式评估 Performance Fabrics 信息指南，明确限定 performance apparel / knit fabric，避免进入家具和室内装饰意图 | 中：有机会承接宽泛研究流量并内链到面料商业页 | 高：宽词意图混杂，过早建页可能产生无效流量和主题稀释 | 当前商业页事实完整；GSC 出现相关 Query，或独立 SERP/内容缺口验证通过；具备一方材料与测试证据 | 候选研究，未批准新 URL |

## 4A. SEO-IMP-015 审计发现汇总（2026-08-18）

七份只读审计文档：`page-audit-underwear-manufacturer-v1.md`、`page-audit-outdoor-clothing-manufacturer-v1.md`、`page-audit-merino-wool-manufacturer-v1.md`、`page-audit-silk-wear-manufacturer-v1.md`、`page-audit-sports-accessories-manufacturer-v1.md`、`page-audit-flatlock-vs-overlock-v1.md`、`page-audit-evaluate-technical-knitwear-oem-v1.md`。

共同结论：7 页均无索引/Canonical/Title/H1 级 Critical；各页 URL/Title/H1/Meta 全部保持。已知共享问题（生产 MOQ 1,000 旧值、重复 stylesheet、Logo 社交图、Meta 双来源）均与既有 IMP 项对应，不重复列项。

### 本轮新发现与处理

| ID | 项目 | 收益 | 状态 |
|---|---|---|---|
| （已修复） | Silk 页第三张子类图引用 `IMG_5550.JPG`（大写扩展名），生产 Linux 环境 404；Windows 本地不暴露 | 高：用户可见破图 | **本地已修复**（`inc/product-category-data.php` 改小写 `.jpg`），随批次部署 |
| SEO-IMP-025 | 五个品类页产品图响应式批次：Underwear 约 1.36 MB、Outdoor 约 1.01 MB、Merino 约 3.79 MB（单张最大 2.73 MB PNG）、Silk 约 7.58 MB、Sports Accessories 约 6.13 MB，均缺 width/height、srcset/sizes 与 WebP 派生 | 中到高：延续 IMP-005/006 的移动端负载收益 | **暂缓（所有者 2026-08-18 确认优先级逻辑）**：这五页 GSC 曝光接近零、主词搜索量极低或未验证（Silk 七国 NR、Accessories 未测试；Underwear/Outdoor 有量但 SERP 意图错配），图片优化预算先集中在高搜索量页面；待任一页 GSC 曝光起量或真实 CWV 报警再启动 |
| SEO-IMP-026 | OEM Evaluation 指南正文零上下文出站链接，全站仅 Hub 一个正文入口（V2-006 在本页核实仍未修复；IMP-001 只覆盖了 Tech Pack Guide） | 中：两篇指南中本页内链最弱 | **生产验收通过（2026-08-20）**：OEM 指南 4 条上下文出链及 Tech Pack/FLATLOCK 两条入链均已在生产确认 |
| SEO-IMP-027 | FLATLOCK 指南有两支第一方生产视频但无 VideoObject Schema | 低到中：视频富媒体增强空间 | 待评估；先看 GSC 视频索引报告再决定 |
| SEO-IMP-028 | 技术指南 Twitter/阅读时长字段曾显示 "Less than a minute"（Rank Math 从空 `post_content` 计算） | 低：社交卡片元数据失真 | **生产验收通过（2026-08-20）**：四篇指南分别输出 8、8、9、13 分钟 |
| （并入 IMP-012） | 术语小写漂移不限于 Sportswear：Outdoor（`inc/product-category-data.php:248`）、Merino、Sports Accessories、Silk construction 段均有小写 `flatlock`/`activeseam` | 中 | 并入 SEO-IMP-012 同批执行，逐页修 |
| （所有者后台项） | Fluent Forms `Estimated Order Quantity` 分档仍以 1,000 为锚点；MOQ 降至 500 后 `Under 1,000 pcs` 一档会混入合格线索 | 中：询盘过滤有效性 | 插件后台字段，需所有者手动确认调整，非主题代码 |

### E. SEO 运营控制面

| ID | 项目 | 收益 | 风险 | 状态 |
|---|---|---|---|---|
| SEO-IMP-029 | 将 `wp-seo-audit` 升级为项目感知的 V2：修正 `/products/`、旧域名 301、装饰图 alt、首页历史问题和 CSS 基线；增加结构化报告路由、Finding outcome 与完整覆盖要求 | 高：减少假阳性、漏项和通用规则误改 | 低：只影响内部审计方法 | **已完成（2026-08-20）**；CLI 路由采用按需 reference，不复制完整工具目录 |
| SEO-IMP-030 | 建立本机 `athletikapparel` SEO 项目 Profile，绑定 GSC、GA4、规范站、品牌词和 10 个重点 URL | 高：让抓取、Search Console、GA4 与监控使用一致项目上下文 | 低：本机配置，不改变公开网站 | **已完成（2026-08-20）**；OAuth/Profile 不进入 Git |
| SEO-IMP-031 | 冻结 SEO 批次部署后的生产 Crawl Snapshot，并与 2026-08-18 全站基线比较 | 高：建立以后可重复的技术回归基准 | 低：只读抓取；不同范围不得强行比较 | **已完成（2026-08-20）**：新 Crawl ID `crawl_3f1fc0fbb955403791272722942441a9`；无新增状态码错误，可比性 `review-required` 的原因已记录 |
| SEO-IMP-032 | 在 SEO 流程中增加 Change Card，记录主要变量、基线、指标、防护指标、干扰因素、Finding 处置及 Day 7/28/90 决策 | 高：避免“修改很多但无法判断哪项有效” | 低 | **流程已完成（2026-08-20）**；从下一项 SEO 改动开始使用，数据成熟后运行 `measure-change` |
| SEO-IMP-033 | 建立索引覆盖抽样、模板性能基线和周期报告路由 | 中到高：把 Page indexing、CWV 和增长机会从临时检查变为持续监控 | 低到中：需控制 URL Inspection 配额，并区分 Lab/Field 数据 | **基线已完成（2026-08-20）**：18 个 Sitemap URL 按每日 10 个预计 2 天一轮；首页、Sportswear、Tech Pack Guide、Services 已建立首次移动端 Lab 基线。本次无 CrUX，4 个 LCP Finding 均因需重复运行和资源归因而 `deferred`；未提交索引或修改页面 |
| SEO-IMP-034 | 定位生产 HTML 慢响应与四类模板 LCP 根因，区分页面代码、WordPress、Cloudflare 缓存和主机响应 | 高：如果可复现，可直接改善抓取效率与用户体验；比继续扩写内容更接近当前性能上限 | 中：单次 Lab 与外部网络波动不能直接触发代码改动；主机/CDN 项需要所有者执行 | **诊断完成（2026-08-25）**：HTML 为 Cloudflare/Flywheel 动态响应，但本轮首字节约 0.70–1.02s、Lab Root Document 280–540ms，慢响应未稳定复现；Services 1.9 MB Hero PNG 与首页四张 eager Hero 图为主要可控 LCP 根因；共同阻塞链次之。详见 [`performance-diagnosis-seo-imp-034-v1.md`](performance-diagnosis-seo-imp-034-v1.md) |
| SEO-IMP-035 | Services Hero 改为保持最大实用清晰度的响应式 WebP，补齐固有尺寸与 LCP 优先级 | 高：直接处理 14.1s Lab LCP 与约 1.8 MB 可减少传输 | 低到中：uploads 与代码必须同步部署，需验证裁切和回退 | **本地实施完成（2026-08-25）**：生成 480–1672px 六档 VP8L 真无损 WebP；模板增加响应式 preload、`srcset/sizes`、真实尺寸、eager/high priority 与 async decode；完整尺寸 PSNR=`inf`，PHP 语法通过。待同步部署主题与 uploads 后生产验收；见 [`Change Card`](change-cards/seo-imp-035-services-hero-responsive-webp.md) |
| SEO-IMP-036 | 首页 Hero 仅保留一个关键高优先级图片，三张次要拼图延后并补较小响应式候选 | 高：受控 A/B 显示次要 Hero 图片约影响 1.8s LCP，全部主题图约影响 4.6s | 中：需同时保护桌面构图和移动端首屏视觉 | **本地实施完成（2026-08-25）**：主图增加 480w / 640w VP8L 候选并保持唯一 eager/high；三张次图改为 lazy/low/async，各增加 160–400w Q100 WebP；首页文字为本轮 LCP，故不增加图片 preload。PHP、HTML、14 个资源和候选图视觉检查通过，待 Local Desktop/Mobile 所有者确认及同步部署生产；见 [`Change Card`](change-cards/seo-imp-036-home-hero-request-priority.md) |
| SEO-IMP-037 | 优化全站首屏阻塞链：Manrope、Fluent Forms CSS、jQuery、WP Consent API、Cookiebot 与 CSS minify | 中到高：影响多模板 FCP/LCP | 中到高：Consent、GA4、表单和插件依赖不可破坏 | 待图片 P0 项后逐个 A/B，不混批 |
| SEO-IMP-038 | 核实 Flywheel / Cloudflare HTML 页面缓存策略并建立慢响应升级阈值 | 中：可能改善 HTML 交付稳定性与抓取体验 | 中到高：错误页面缓存会影响登录、Consent、表单或个性化响应 | 平台配置项；当前只监测，不执行 Cache Everything |



## 5. 已完成的本地代码与资源范围

本地第一批修改严格限制在以下范围：

- `functions.php`：只保留一份 child stylesheet，并依赖 GeneratePress 的正式 `generate-style`；
- `template-parts/technical-article/content-technical-knitwear-tech-pack-guide.php`：增加三条上下文链接；
- `inc/product-category-data.php`：Knitted Fabrics 增加 Tech Pack Guide 回链；
- `rank-math.php`：技术内容使用已存在的批准封面作为社交图和 Schema 主图；同步真实 `lastmod`；
- `inc/product-category-data.php` 与 `template-parts/product-category/page.php`：Sportswear 和 Knitted Fabrics 共 9 张下滚图片接入 WebP `srcset`、PNG 回退、固有尺寸、描述性 alt、lazy loading 与 async decoding；
- `inc/product-category-data.php` 与 `template-parts/product-category/page.php`：Knitted Fabrics 增加品类级 Hero/能力标题/规格卡覆盖，展示独立面料供货、按面料与项目确认的 MOQ、完整 fabric brief、开发周期和量产周期；其余六个成衣品类继续使用共用规格；
- `inc/product-category-data.php`、`rank-math.php` 与 `seo-tags.md`：Knitted Fabrics 的 Meta、Open Graph、Twitter、WebPage Schema 和可见产品文案统一使用 SEO 优先的能力表达；保留 performance、functional、GRS recycled fabrics 与 testing 主题，移除 `our own fabric mill`、`in-house testing`、`full traceability` 和跨材料性能等效承诺；
- `style.css`：补充 `<picture>` 的块级布局，不改变现有图片比例和交错版式；
- `inc/product-category-data.php`（2026-08-18）：Silk 子类图引用 `IMG_5550.JPG` 改小写 `.jpg`，修复生产 404 破图（SEO-IMP-015 审计发现）；
- uploads：保留 9 张源 PNG，生成 54 个真无损响应式 WebP；详见 [`image-optimization-seo-imp-005-006-v1.md`](image-optimization-seo-imp-005-006-v1.md)；
- 未改变任何 URL、Title、H1、FAQ 或主要关键词归属；SEO-IMP-010 更新 Knitted Fabrics Meta 与相关能力正文，并让页面/社交/Schema description 使用同一代码真值；
- uploads 不在主题 Git 仓库中，部署时必须单独同步图片资源。

## 6. 第二批所需所有者事实输入

### Sportswear

已建立并完成 [`sportswear-public-capability-fact-sheet-v1.md`](sportswear-public-capability-fact-sheet-v1.md)。所有者确认 SP-01–SP-10 均可作为开发能力满足，但报告不是每项、每个项目都能提供。页面已保留能力词并移除无条件结果保证；具体数值或合格结果只在对应报告可核对时使用。

### Knitted Fabrics

所有者已完成 [`knitted-fabrics-business-fact-sheet-v1.md`](knitted-fabrics-business-fact-sheet-v1.md)：接受独立面料订单；MOQ 按所选面料与具体项目确认，不公开固定数字范围；通常按 kg 报价，也可使用其他单位；完整 fabric brief 为报价输入；swatch、counter sample、lab dip、sample yardage 和 approval sample 均可按项目提供。

开发和量产周期不再使用未经稳定验证的行业常规周数。页面分别使用 `Based on fabric brief` 与 `Based on order requirements`，具体周期在 quotation 中提供。Contact Form 已有 `Knitted Fabrics` 选项，因此不新增表单分支；`Estimated Order Quantity` 保持成衣预计订单量含义，面料买家通过 Message 提供 kg 数量和完整规格。

所有者于 2026-08-18 确认 Beta Textiles Co., Limited 也是本业务主体，因此 `performancefabrics.com` 快照可作为一方能力证据。SEO-IMP-010 已按 SEO 流程 V1.1 再调整：工序使用 broad coordination 表达；功能面料、GRS-certified inputs、project-specific traceability documentation 和第三方测试作为可交付能力直接呈现；不在公开页面展开认证范围、交易文件、实验室范围和验收流程。

当前 GRS scope certificate、脱敏 transaction certificate、process ownership map 和测试报告样例仍值得收集，但不阻塞这版商业能力文案。取得文件后只增强与文件直接对应的段落，不恢复跨项目绝对承诺。

## 7. 部署与验收顺序

1. 在本地运行 PHP 语法和静态链接检查；
2. 逐页检查 Desktop 1440 px 与移动端布局，尤其是 Related links 和文章正文；
3. 部署主题代码到 staging/production，并单独同步 SEO-IMP-005/006 的 54 个 uploads WebP；
4. 检查页面源代码，确认只加载一份 child `style.css`；
5. 检查四篇指南及 Hub 的 `og:image`、`twitter:image` 与 JSON-LD `primaryImageOfPage`；
6. 使用 Rich Results Test 与 Schema Validator 复核 Article、FAQPage、BreadcrumbList 和 ImageObject；
7. 部署后先清理 Rank Math Sitemap cache，再检查实际变化页面的 `lastmod`；
8. 在 Search Console 对实际变化的重点 URL 执行 URL Inspection；不对未变化的全部页面机械请求重新收录；
9. 记录部署日，并在 7 天与 28 天窗口比较数据。

## 8. Search Console 与转化监测

每周记录目标页的：

- Indexing 状态与最后抓取时间；
- Clicks、Impressions、CTR、Average position；
- Query × Page × Country，北美和欧洲分开；
- Brand / non-brand 查询分组；
- Knitted Fabrics 将 `knitted fabric manufacturer`、`sportswear fabric manufacturer`、`performance knit fabric` 与宽泛的 `performance fabrics` 分组记录，避免用宽词曝光掩盖合格采购词表现；
- Core Web Vitals 与移动端问题；
- GA4 `generate_lead` 按 Landing Page 的数量和合格度。

内部决策规则：

| 观察 | 优先动作 |
|---|---|
| 页面未收录或抓取异常 | 先查状态码、Canonical、robots、Sitemap 和实际内链；不先改文案 |
| 有匹配曝光但位置约 8–30 | 加强证据、上下文内链、页面任务完整度和外部引用 |
| 位置较好但 CTR 持续偏低 | 结合实际 Query 测试 Title/Meta，而不是同时改 H1/正文 |
| 有流量但无合格询盘 | 检查资格信息、搜索意图和 CTA，不把更多流量直接视为成功 |
| 28 天仍无匹配曝光 | 复核索引、页面所有权、搜索需求和域名权威；不立即创建近义页 |

建议每次 Title/Meta 测试只改一个主要变量，保留变更日期和前后 28 天对照。样本过小则继续观察，不从一两次曝光推导结论。

## 9. 不做事项

- 不修改已经收录且表现正常的 URL；
- 不为 Activewear/Fitness、Clothing/Garment/Apparel Tech Pack 或单复数变体创建平行页；
- 不因 `performance fabrics` 的宽泛高搜索量，把 Knitted Fabrics URL、Title 或 H1 改成 Performance Fabrics；
- 不堆叠 `manufacturer`、`supplier`、`factory` 等近义词；
- 不在证据不足时扩大认证、性能、工厂、测试、产能或客户声称；
- 不购买批量外链、目录包或 PBN；
- 不把 uploads 图片放入主题 Git 仓库；
- 不把 Schema 当成替代可见内容和真实证据的排名捷径；
- 不用短期 Average position 波动频繁重写 Title/H1。

## 10. 下一执行点

生产部署与验收已完成，按以下顺序继续：

1. 在 GSC 网页版对 QC Guide 执行实时测试并请求编入索引；
2. 按 SEO-IMP-033 的容量计划执行代表性 URL Index Snapshot，并复跑四类模板性能测试、补充可用 CrUX 数据；
3. 执行 SEO-IMP-034，只读定位生产 HTML 响应与四类模板 LCP 资源，再决定代码或主机/CDN 动作；
4. 建立 GSC 7 天/28 天页面级监测，分别观察商业采购词、QC/Tech Pack 信息词与宽泛 Performance 词；
5. 核对 GA4 `generate_lead` 与 Organic Landing Page 后，再运行转化层面月度报告；
6. 收集当前 GRS scope certificate、可公开交易/追溯文件和测试报告样例，作为后续证据增强输入；
7. 评估 SEO-IMP-013 品类页社交图和 SEO-IMP-027 VideoObject，继续以实际收益与风险排序；
8. 英语基线稳定后再开始欧洲本地语言研究和条件式新内容；Performance Fabrics Guide 仍需单独批准。
