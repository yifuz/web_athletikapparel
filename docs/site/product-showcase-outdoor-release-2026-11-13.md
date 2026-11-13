# 两款 Outdoor Showcase：生产发布与验收

日期：2026-11-13。状态：`deployed / production-verified-with-warning`。所有者审核通过后授权两款产品及既有请求的 Outdoor 精选入口一起上线。本记录以正式站点实际检查为准，不把发布或 Sitemap 收录等同于搜索引擎已收录。

## 发布范围

- 代码冻结版本 `e00b611`；发布前对照此前已部署基线 `1e2b88f` 与生产文件，确认属于获批准范围。未改既有 URL。
- 新建 [Men's half-zip fleece top](https://www.athletikapparel.com/product-showcase/mens-half-zip-fleece-top/)：生产页面 ID **111**；其 fleece fabric 为 HY254900、100% Polyester、250 GSM。产品信息与素材边界见[制作记录](product-showcase-fleece-2026-11-13.md)。
- 新建 [Men's half-zip top & tights](https://www.athletikapparel.com/product-showcase/mens-half-zip-top-and-tights/)：生产页面 ID **113**；所有者确认上下装同用 HY265048、180 GSM、86% Graphene Polyester / 14% Elastane。产品信息与生成画面边界见[制作记录](product-showcase-half-zip-set-2026-11-13.md)。
- 两页均关联现有 Product Showcase 父页 ID **105**；Outdoor 类目展示两款精选，最多两款，不追加无限长的产品列表。首页和 Merino 原有精选未更改。

## 实际部署清单

- 替换五个子主题代码文件：`style.css`、`template-parts/product-showcase/card.php`、`template-parts/product-showcase/entry.php`、`inc/product-example-data.php`、`template-parts/product-category/page.php`。
- 在 `uploads/myathletik-theme/assets/images/product-examples/` 下按文件上传 21 个新增媒体文件，共 **27,216,864 bytes**，不覆盖其他媒体或整目录同步：
  - `mens-half-zip-fleece/`：`front-640.webp`、`front-1280.webp`、`back-view-640.webp`、`back-view-1280.webp`、`collar-zip-detail-640.webp`、`collar-zip-detail-1280.webp`、`pocket-detail-640.webp`、`pocket-detail-1280.webp`、`front-social.jpg`、`fleece-overview-1080.mp4`。
  - `mens-half-zip-tights-set/`：`front-640.webp`、`front-1280.webp`、`side-640.webp`、`side-1280.webp`、`collar-640.webp`、`collar-1280.webp`、`full-set-640.webp`、`full-set-1280.webp`、`front-social.jpg`、`overview-1080.mp4`、`collar-and-fit-1080.mp4`。
- 数据库仅精准新增上述两篇页面及其相应设置／SEO metadata；未导入本地数据库或批量发布。Outdoor、Merino、Showcase Hub 及三款既有 Showcase 共六篇关联页面的 post／metadata 创建前后快照一致。重复运行只读建页预检分别返回 `changed: false`、ID 111／113。
- 五个代码文件与 21 个媒体文件的 SHA-256、大小及权限经生产校验；四个 PHP 文件通过生产端语法检查。部署前备份位于本机私有目录 `C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-13-e00b611-outdoor-20261113T065153Z`。本批未执行全站 Flywheel 页面缓存刷新。

## 正式站验收

- 普通正式 URL 在 1440、1024、768、360、320px 宽度检查了两篇详情与 Outdoor 双卡入口；图片、文字、链接及布局正常，未见整页横向溢出。详情和目录均未发现本站脚本异常或本站 HTTP 请求错误。
- 桌面及手机实测三段视频均可播放；切换来源、关闭后暂停及焦点返回正常，页面初始加载不预取视频。21 个媒体 URL 均返回 HTTP 200，三段视频的 Range 请求返回 HTTP 206。
- Showcase 总览显示五款，按 HY 料号搜索和 Polyester 筛选通过；Outdoor 两卡、Merino 精选两款与首页原有 Ocean Depth 回归通过。禁用 JS 后图片及视频直达链接可用。
- 两篇详情的可见 H1、title、description、canonical、OG URL 与 index/follow 核对通过；`/page-sitemap.xml` 中各出现一次。五个既有页面的 title、H1、description、canonical、robots 部署前后对照一致。**这不是 Google 实际收录的证据。**
- Contact 只检查两款询盘信息预填，**未提交表单**。浏览器检查阻断了第三方请求，因此不构成 Cookiebot、统计、Turnstile 或表单投递验收。
- 验收脚本与截图保存在本机 Git 忽略目录 `.chrome-check/`；汇总为 `two-outdoor-production-20261113-verification.json`，不部署生产。首轮严格 JSON-LD 名称检查发现下述差异；其余功能检查通过，并在复验汇总中保留该警告，而非将其视为完全一致。

## 待排查：结构化数据名称中的 HTML 实体

- 记录 `SHOWCASE-SCHEMA-AMP-20261113`；类型 `review`，优先级 `P3`，样本内现象 `confirmed`，状态 `deferred`。
- 正式套装页的 JSON-LD `ItemPage.name` 解析后包含字面字符串 `Men's half-zip top &amp; tights`，而可见 H1 为 `Men's half-zip top & tights`。既有 Ocean Depth 页的同一字段也观察到字面 `&amp;`，因此不把现象归因于本次新增产品数据；目前只核验这两个样本，不推断全部页面。
- 可见标题、浏览器 title、canonical 与页面功能正常；搜索引擎是否将实体规范化、是否有收录或展示影响均未核实。根因也未在生产端确认，不能断言具体插件或过滤器负责。
- 后续应在 Local 定向追查共享 Schema 输出及安全过滤，比较原始 JSON 解析后的 `name` 与 H1，保留现有转义安全性，并复测新旧 Showcase；独立评估、审核后再决定是否部署共享代码。本次未修改插件、未为非阻断性差异回滚获批准的页面。
