# SEO-V2-005：Sportswear Yoga 产品开发说明草稿

> Change ID：`SEO-V2-005-SW-YOGA-20261027`
>
> 制作与部署确认日期：2026-10-27；状态：`deployed / production-verified / measuring`
>
> Finding outcome：`changed / keep-measuring`；本批部署记录关闭，搜索收益仍 `unverified`

> 当前修订：所有者视觉复审要求删除两个链接，已移除并确认部署；第 5～6 节为初稿本地记录，第 9 节为链接移除记录，最新生产验收见第 10 节。三组正文、原图与页面定位不变。

## 1. 目标、授权与主要变量

- 目标页面：<https://www.athletikapparel.com/sportswear-manufacturer/>。
- 搜索意图：为 yoga / studio clothing 项目寻找可按款式、面料和版型开发的 OEM/ODM 制造商；继续由 Sportswear 现有页承接，不创建 Yoga、Activewear 或 Fitness 平行页。
- 主要官网任务：`Qualify / Verify / Start`。让买家辨认具体产品范围、准备款式开发输入并发起项目讨论。
- 所有者在第二轮 SERP 研究结束后同意先制作该区块本地草稿，随后要求“开始做，如果需要什么没有告诉我”；制作阶段不自动视为公开发布批准。视觉复审删除两条链接后，所有者已于 2026-10-27 明确确认部署并要求验收。
- 唯一主要变量：增强现有 `Yoga and studio wear` 产品组的采购开发具体度，替换原简介，增加三组 definition-list 要点。初稿的两个站内入口已按所有者视觉复审删除。产品组位置、标题、anchor 和现有图片不变。
- 改动类型：SEO Process §5.1 **B 类采购决策完整性改进**。排名改善是待测假设，不把通用内容增加、单次 SERP 或缺少 exact-match 词当作已证明的收益。
- 不改 URL、Title、Meta、H1、robots、Canonical、Schema 配置、Hero、MOQ、表单、lookbook 图片/顺序/脚本或其他六个品类；不新增 Backlog 项。

## 2. 证据与事实边界

需求依据为[2026-10-27 六品类第二轮研究](../../research/serp-commercial-round2-us-gb-ca-2026-10-27.md)的 R2-002：yoga wear 结果包含具体 leggings / sports bra 制造页面和采购指南，也混有零售、目录、榜单和低 MOQ。不能据此声称这是纯 B2B、低竞争或已证明高收益的词。

当前 Sportswear 页与数据已覆盖 yoga、sports bras、leggings、shorts、tops、针织材料开发、FLATLOCK / ACTIVESEAM、版型、测试输入及项目确认；lookbook 中已有 sports bra / shorts / tops 等真实照片。原 Yoga 段落主要说明 soft-drape 和通用样品检查，故本轮只提高该产品组的具体度，不重复增加 OEM 模式或 QC 大区块。

本次不引入尚未确认的硬事实：

- 产品组合沿用现有公开范围与所有者已确认的针织运动/瑜伽能力；coordinated sets 不代表现货、固定配方或指定材料库存。
- bra shape / support target、rise / length、coverage、size range、composition、GSM、opacity 等写作买家需定义的项目输入，不是对所有款式的性能保证。
- FLATLOCK / ACTIVESEAM 路线仍依选定材料和成衣确认；不扩张为 moulded-cup、underwire 或整件 bonded construction 声明。
- 不给出未经确认的具体成分、GSM 范围、支撑等级、测试方法编号、合格阈值、认证、产能、客户或实际测试成绩。
- 不新增、重生成或重命名图片。现有 Yoga leggings 图片与 14 图 lookbook 不变，不把图片视作某个性能已通过的证据。
- 当前没有制作草稿所必需的业务资料缺口；若后续要加入具体款型/材料实例或测试阈值，再向所有者确认。

## 3. 已部署英文内容

以下已写入数据层，2026-10-27 生产验收确认与本地交付一致：

**简介**

Custom yoga clothing programs can include sports bras, leggings, shorts, and fitted tops. Develop individual styles or coordinated sets around the buyer's material, fit, and construction brief.

**Product and fit**

Specify the bra shape and intended support target, legging or short rise and length, top coverage, size range, and intended activity.

**Fabric and construction**

Define composition, GSM, hand feel, stretch/recovery, opacity targets, and seam placement. Review FLATLOCK or ACTIVESEAM options against the selected material and garment.

**Sample approval**

Confirm fit in movement, waistband recovery, seam extension, and fabric opacity on the actual sample. Required results follow the agreed test method and acceptance criteria.

初稿曾有 `View sportswear examples` 与 `Discuss your yoga program` 两个入口；所有者认为视觉突兀，已全部移除。现稿此产品组不含 CTA 链接，不增加 UTM、预填参数、脚本或新页面。

## 4. 文件与视觉范围

| 文件 | 本次变化 |
|---|---|
| `inc/product-category-data.php` | 只改 Sportswear `subcategories[2].description`，新增该项的 `development` 数据；metadata、图片等原字段不动 |
| `template-parts/product-category/page.php` | 复用共享产品组模板，以 options 数据为开关输出三组 `<dt>/<dd>`；移除本次链接渲染分支，文本转义，不在其他品类输出空区块 |
| `style.css` | `.ma-subcat--development` / `.ma-subcat__development*` 专属样式；沿用字号、颜色、间距和 touch-target token，不改全局 token，不使用新 JS |

视觉草案：保留现有 Yoga 产品图，文字侧增加轻分隔线的三组要点，不再使用一组独立大卡片。按设计技能的真实截图检查，发现 768px 原双栏使左侧留白偏大，因此仅此产品组在 48～63.99rem 改为上下排列，图片最大宽度维持 35rem，与既有响应式 sizes 一致；桌面保留双栏，手机正常堆叠。未更改图片文件、原图标签属性或其他产品组布局。

## 5. 初稿本地验收结果（历史）

| 项目 | 当前结果 |
|---|---|
| Git | 制作前 `main` 与 `origin/main` 对齐于 `f7c9b35`；保留既有 Backlog 与两份 GEO 未提交修改 |
| PHP | LocalWP PHP 8.2.30 对两个修改文件 `php -l` 通过 |
| 数据隔离 | 使用不启动数据库的 PHP fixture 比较改动前后完整七品类数组；其他六页相同，Sportswear 仅上述 description / development 变化；原图、metadata 与其余数据相同 |
| Diff | 任务源码 `git diff --check` 通过 |
| 文案 | 本次范围无占位符、无新增数字/认证/客户/性能保证；FLATLOCK / ACTIVESEAM 术语一致，正文待所有者审核 |
| LocalWP | 初次访问与草稿完成后复试曾为 nginx 502；所有者确认启动/重启后恢复。改动前基线 `2026-10-27T08:16:14.427Z`、最终改动后 `2026-10-27T08:19:42.744Z`，七个品类页均 HTTP 200、各一个 H1 |
| 原始 HTML 前后对照 | 恢复后临时撤下本任务三个源码文件的补丁，采集 HEAD `f7c9b35` 本地基线，并立即恢复且校验文件 hash。七页 Title、description / robots / OG / Twitter meta、X-Robots-Tag、Canonical、H1 及解析后 JSON-LD 均相同；排除目标 Yoga 产品组与动态询盘区块后，原正文、链接和媒体清单相同。此项不验证动态表单或生产部署 |
| 模块与图片隔离 | 仅 Sportswear 输出一个 development 模块、三组要点；其他六页为零。Yoga 原标题与 picture / img 标签属性逐项一致；lookbook 原资源与顺序未变 |
| 视觉 | Chrome 360 / 390 / 768 / 1024 / 1440px 截图与 DOM 尺寸检查通过；页面宽度均等于 viewport，无横向溢出，三组内容完整，Yoga 图片实际加载成功；两条入口高度均为 44px |
| 入口与交互 | lookbook 锚点有效；Contact HTTP 200。既有 14 图 lightbox 点击开启、图片加载、ArrowRight 切到 `2 / 14`、Escape 关闭、Enter 开启及关闭按钮均通过；这些浏览器访问无 pageerror。没有提交表单 |
| Crawl / GSC / GA4 | 本轮未运行新 Crawl、GSC、GA4 或付费 SERP；生产验证、部署前/后 Crawl ID 均为 `not-run` |

初稿阶段 LocalWP 环境阻塞解除后曾交付所有者审核，未自动部署；随后完成第 9 节修改及第 10 节生产验收。本地路径：`http://myathletik-rebuild-02.local/sportswear-manufacturer/#subcat-yoga-and-studio-wear`。

QA helper、前后 JSON 和五种宽度截图保存在忽略目录 `.chrome-check/sportswear-yoga-*`，配置 fixture 为 `.chrome-check/category-data-snapshot.php`；不是部署文件。首次浏览器取证没有取得 WordPress `<main>`，已停止该次进程。最终 helper 等待图片加载与 lightbox 初始化后复测通过；早期 helper 的瞬时未加载断言不作为网站故障结论。

## 6. 验收标准与未完成项

1. 已通过：七个本地品类页 HTTP 200、各一个 H1，只有 Sportswear Yoga 产品组出现新要点；其他六页无新模块。
2. 已通过：本地前后 URL、Title、Meta、Canonical、robots、解析后 Schema 一致；不将其写成生产可索引性或部署前后证明。
3. 已通过：Yoga 原图与所测 lightbox 大图实际加载，两条入口和原点击放大/切图/关闭正常；原媒体清单相同。本轮未单独逐张请求全部 lookbook 图片。
4. 已通过：360 / 390 / 768 / 1024 / 1440px 实际浏览器检查及截图；无横向溢出、文字截断或内容隐藏，链接触控高度均 44px。
5. 已完成：所有者确认部署；生产可见内容及索引防护见第 10 节。GSC 完整前窗尚未提取，不把旧研究快照冒充新基线。

## 7. 测量、风险与回滚

- 基线：本轮研究是查询意图与单次 SERP 证据，不是 GSC 效果基线。历史 2026-09-23～10-20 Sportswear 为 5 clicks / 57 impressions / average position 10.86（见既有 [Underwear Change Card 的筛选数据](seo-v2-005-underwear-seamless-2026-10-23.md)），只作旧快照，不标为实时或新变量前窗。
- 以所有者部署确认及验收日 **2026-10-27** 为保守 Day 0，具体上线时刻未知；Day 7 / 28 / 90 为 **2026-11-03 / 2026-11-24 / 2027-01-25**，不是从更早制作时刻倒推。
- 排除部署日，首个完整 28 天后窗为 **2026-10-28～11-24**，等 GSC final 覆盖末日后读取，预计 **11-27 起**核验，实际以可用性为准。计划等长前窗为 **2026-09-29～10-26**，本轮没有重新取数，保持 `pending-final-baseline`；Day 7 可优先补齐。Sportswear 既有观察窗不重置，需披露本轮 Yoga 变量混入；其他页面原节点不变。
- 主要指标：目标页在相关 yoga / sports bra / leggings 制造采购查询中的曝光、点击与位置；尽量使用同查询、同国家/设备和等长 final 窗口，查询匿名化缺口单列。新增泛零售词不能自动算成功。
- 防护：索引与 canonical、原页面任务、lookbook/图片、手机可读性；GA4 与合格询盘作为后续辅助，低量不强行归因。
- 风险：正文长度与版面比例、通用内容重复、把待测目标误读为保证、后续其他页面/营销改动干扰。新变量一经部署应披露对 Sportswear 原观察窗口的混入，不覆盖旧记录。
- 回滚条件：确认的事实错误、渲染/访问回归或明显移动端问题优先修复；不得因几天无排名变化自动回滚。回滚范围限本次 Yoga description / development 和对应条件渲染及样式，不丢失其他人修改。

## 8. 已完成的部署清单

所有者已确认部署，生产内容及 CSS 验证通过；以下三个主题文件的部署记录关闭，无需再次上传：

1. `inc/product-category-data.php`
2. `template-parts/product-category/page.php`
3. `style.css`

没有 uploads 新文件，没有图片、JS、数据库、Rank Math 设置或 URL 迁移。内部文档与 `.chrome-check/` 不属于生产部署包。Git 提交/推送不等于发布批准或生产上线。

## 9. 2026-10-27 视觉复审：删除两个链接

- 授权与证据：所有者提供本地截图，明确要求删除 `View sportswear examples` 和 `Discuss your yoga program`，理由是视觉突兀。
- 主要变量：只删除这两个链接的数据、共享模板专属渲染分支及不再使用的专属 CSS；不隐藏 DOM、不保留空链接容器，不改三组正文、图片、导航或其他 Contact 入口。
- 验收：相对删除前本地快照，七页均 HTTP 200；metadata、H1、Canonical、robots、解析后 JSON-LD、非目标正文、原内链与媒体清单保持一致。Yoga 仅少两个链接及其文字，原标题、三组说明和图片属性相同。
- 视觉：Chrome 360 / 390 / 768 / 1024 / 1440px 无横向溢出，链接和链接容器均为零，三组说明完整。区块末尾无残留链接留白；1440px 高度约 603→551px，390px 约 1134→1030px；本次页面访问无 pageerror。
- 覆盖与限制：本次仅本地回归，不重复付费研究、GSC、GA4 或生产 Crawl；未再次操作表单或 lightbox，前述原媒体、脚本和相关链接未改。QA 快照与截图位于忽略目录 `.chrome-check/sportswear-yoga-*`。
- 风险与结果：局部新增入口已移除，但现页 lookbook、导航和原询盘入口保留；没有新 URL 或 301 需求。Finding outcome 为 `changed / local-verified / owner-review-pending`，不宣称曝光或排名效果。
- 删除链接时仍待生产部署确认；随后所有者已确认部署并完成第 10 节验收。三个主题文件无需再次上传。

## 10. 2026-10-27 生产验收关闭

覆盖模式为 `targeted`：七个品类的原始 HTML 与选定 URL 技术审计；Sportswear 在 Chrome 360 / 390 / 768 / 1024 / 1440px 的渲染；另检查生产 CSS、14 个 lookbook 大图、首页入口、robots.txt 与 Page Sitemap。采集完成于 `2026-10-27T09:11:43.737Z`。本次不证明全站无问题、Google 已抓取新版或搜索收益。

| 验收项 | 生产结果 |
|---|---|
| 正文与链接移除 | Yoga 简介和三组 `<dt>/<dd>` 与最终本地交付一致；区块内链接及专属空容器均为 0，正文在原始 HTML 中可读；未改产品组标题、位置或原图 |
| 生产 CSS | HTTP 200；规范化换行及末尾空白后与当前本地 `style.css` 全文一致，含 development 样式，不含已删除的链接样式 |
| 响应式 | 五种宽度均无横向溢出、三组内容完整、区块底部无残留链接空白，Yoga 图片实际加载；768px 单栏、1024 / 1440px 双栏，符合最终稿 |
| lookbook | 14/14 个 800px WebP 大图 GET 200、MIME 正确；桌面 1440px 与手机 390px 的点击放大、大图加载、ArrowRight 到 `2 / 14`、Escape、Enter 开启及关闭按钮均通过；未重新请求每个历史 JPG / srcset 变体 |
| 七品类防护 | 7/7 HTTP 200、各一个 H1、自引用 HTTPS Canonical、无 noindex / nofollow 阻断，仅 Sportswear 有一个 development 模块，其他六页为 0；所测 URL / 媒体未泄漏 LocalWP 主机 |
| 对照边界 | 规范化本地与生产 origin 后，七页原正文、内链及媒体属性清单均与最终本地快照一致，排除目标 Yoga 区和动态询盘区；Yoga 单独逐字段相同。不是完整生产部署前后 Diff |
| SEO 字段 | Title 为 `Sportswear Manufacturer | Athletik Clothing`，H1 为 `Sportswear Manufacturer`；生产 Meta 沿用既有 `flatlock & activeseam` 版本，未增加 metadata 实验；原始 / 渲染后的 Title、description、Canonical、H1 与 JSON-LD 相同 |
| Schema / 环境差异 | 七页 JSON-LD 可解析；规范化 HTTP / HTTPS 本地主机后，六页与本地相同，Sportswear 只保留先前已记录的 `dateModified` 差异。robots 指令顺序、生产多一个与 `og:image` 一致的 HTTPS `og:image:secure_url`，不作为回归；Sportswear 的 description / 社交 description / 更新时间数据库差异不冒称逐字全同，不据此追加修改 |
| Sitemap / 入口 | Page Sitemap HTTP 200，20 条 / 20 个唯一 URL，七品类各一次；首页有两个 Sportswear 链接。robots.txt HTTP 200，仅限制 `/wp-admin/`，未阻断目标页 |

一次网页抽取仍返回旧 Yoga 简介；正常生产 URL 的直接请求和真实 Chrome 均返回最终稿。旧抽取与新输出的矛盾如实保留，不把抽取缓存当成部署失败，也不把它解释成 Google 已抓取或未抓取的证据。

### Structured report 及人工观察处置

CLI 0.2.36 的 doctor / describe 后，以 `audit-urls` actions、refresh=true、maxPages=7、concurrency=2、saveReport=false 检查相同七页。requested / attempted / fetched 为 7/7/7，failed / skipped / extraction failure / omitted 为 0，未触及页数或输出限制；7 页 indexable，high / medium 为 0 / 0，low 为 8 个实例，汇总为下列 **2/2 review**，全部保留与处置。保留 `findings.coverage.state=unknown`，无 warning / caveat 不等于全站 all-clear。

| ID / 类型 | 证据与结果 | Outcome |
|---|---|---|
| `hsts_missing` / review / Info / P3 | 7/7 affected URL 已查看；沿用基础设施 owner-action，不归因于 Yoga 内容，不改响应头或 Cloudflare | `deferred / owner-action` |
| `image_oversized_candidate` / review / Info / P3 | Sportswear 1/1 affected URL 已查看；启发式不证明图片已损害曝光，沿用性能暂缓，不因本次文本改动重开图片优化 | `deferred / monitor-only` |
| `SEO-KF-QA-TURNSTILE-20261020` / 人工 review / Info | 本次多次导航浏览器再次捕获 `turnstile.ready()` 的 async/defer 提醒，与既有记录同类；未做独立初始化专项诊断、未验证提交影响，不声称没有 pageerror 或表单投递已通过 | `no-change / monitor-only`；真实投递异常，或独立新会话稳定复现且影响组件初始化时，再单独诊断 |

仅更新本卡及进度记录，没有修改网站代码或线上配置。浏览器是临时未登录会话，拦截分析端点；Cookiebot 遮挡交互时仅在该会话选择 Reject all，没有 Allow-all、表单投递或广告改动。未运行新的 GSC / GA4 / URL Inspection / 付费 SERP、全站 Crawl 或 Crawl Diff，部署前 / 后 Crawl ID 仍为 `not-run`；不重复请求索引。证据与截图在 Git 忽略目录 `.chrome-check/sportswear-yoga-production-*`，不是额外部署文件。

最终 Finding outcome：`changed / keep-measuring`，状态 `deployed / production-verified / measuring`。仅关闭这批 Yoga 内容及链接移除的部署记录，不关闭整个 SEO-V2-005；Day 0 和效果观察按第 7 节执行。
