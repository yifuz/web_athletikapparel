# Product Showcase 正式发布候选

日期：2026-11-03；2026-11-04 更新。当前状态：**已部署生产并发布三个页面，公开 HTTPS／SEO 及真实浏览器筛选、媒体交互验收通过；验收范围见下方发布记录**。

2026-11-04 更新：已加入[第二款男式 Merino-Tencel 产品](product-showcase-hy265077-2026-11-04.md)，所有者随后明确“目前的改动一起部署”，授权展示库加两款详情共三个页面发布。后台「工具 → Product Showcase」入口已部署；所有者又授权建立 SSH 连接，现已通过同一建页核心完成正式发布。

## 范围与证据

所有者在本地 Demo 接入后明确要求“按照生产站的规格来，这个版本是准备上线的版本”。本轮将实际页面、功能和发布流程转换为正式实现；2026-11-04 后续整包部署授权已替代此前暂不上线的安排。

- 目标：`/product-showcase/`、`/product-showcase/ocean-depth-merino-wool-blend-set/` 与 `/product-showcase/mens-merino-tencel-mesh-long-sleeve-shirt/`；首页、Merino 页及 Products 菜单作为入口。首页保留 Ocean Depth 特色卡，Merino 入口与展示库展示两款。
- 搜索意图：展示库承接真实产品发现，详情承接具体样品、材料与开发参考。七个商业品类页继续拥有 manufacturer 采购能力需求，现有 URL 不改，无需 301。
- 事实来源：所有者已确认的实拍、公开使用权、Ocean Depth 名称、相同面料套装、52% Merino wool / 43% Polyester / 5% Spandex、155 GSM、HY254955；开发选项沿用已审稿。
- 不新增 micron、knit structure、seam construction、认证或测试结论，不构造价格、库存、评分和评价。

## 主要变量与正式行为

1. 去掉 LOCAL REVIEW 条、中文审核说明、禁用按钮和临时界面文案。使用真实网站页眉、页脚、品类链接及可操作的项目询盘按钮。
2. 单款详情的询盘入口指向 `/contact/?product_example=ocean-depth#ma-contact-form-title`。仅接受代码中已发布产品的白名单 key；Message 为空时填入产品、面料和详情 URL，品类在尚为表单默认值时预选 Merino Wool。用户已填写的 Message 保留，无内部 UTM，不自动提交表单或发送消息。
3. 共享数据／模板保留；所有卡片只列出实际存在、已发布、无密码的受管页面。总览缺失或未发布时不显示入口；无效的受管详情返回 404 并排除 Sitemap，避免回退为不完整普通页面。
4. 图片和视频使用同一展示区；视频由用户手动选择和播放，切回照片暂停。无 JavaScript 时保留主图、真实图片／视频链接及询盘链接。
5. Local／staging 自动 noindex 并排除 Sitemap；production 依据环境、WordPress `blog_public` 和页面 Rank Math 索引设置工作。不再存在写死的 LocalWP 主机门禁。
6. Title／Description 在显式建页时写入 Rank Math，来源为 `inc/product-example-data.php`；正式 Canonical 对应自身 WordPress permalink。Rank Math 在 noindex 的 Local 页面有意省略 Canonical 标签，本轮不为本地审核另造重复输出。生产 Canonical 仍列入部署验收。
7. 正式 OG/Twitter 分享图为 1280×720 实拍 JPEG，直接通过 Rank Math image_array hook 提供，避免非媒体库附件回退为 Logo。模板图片使用 WebP。
8. 展示库使用 CollectionPage + ItemList，详情使用 ItemPage + BreadcrumbList，去掉默认 Article。Schema 的卡片数量、名称和 URL 与可见内容一致；没有添加 Product/Offer 或虚构可购物字段。

这是准备发布的新功能，不是已经上线的 SEO 单变量成效实验；不提前宣称曝光或询盘增量。

## 本地验证与边界

- 两个页面沿用 Local 页面 ID 80／81，迁移时去除旧 `Local Review` metadata、`nofollow` 与 `_ma_product_showcase_preview` 标记；ID 不写入生产代码。
- PHP／JS 语法检查；Local 桌面、平板、手机实际渲染检查，覆盖标题层级、图片、入口、筛选、媒体操作、询盘预填及原生无 JS 入口。
- 独立 PHP 隔离测试 177 项断言、19 组场景通过，包含 production/local/staging、关闭全站索引、draft/password/invalid key/moved route、404、菜单、两套 Sitemap 和 Schema。该测试不连接 WordPress 数据库，也不冒充生产 HTTP 验收。
- 一次性建页脚本已在 Local 迁移成功；第二次运行显示 `Already current`，没有重复创建页面或刷新修改日期。
- 连续自动化跳转曾出现本地图片解码及 Contact 导航异常；独立重开后 Merino 图片和真实 Contact 预填均正常。未在产品代码添加重试掩盖，生产媒体与页面响应仍需部署后复核，不能以本地通过代替生产验收。
- 未向真实收件人发送测试询盘；生产主题、媒体、数据库与搜索索引均未写入。
- 生产部署后仍要验证 HTTPS、Canonical、robots、Sitemap、分享图 HTTP/MIME、真实导航及询盘入口；[Rich Results Test](https://search.google.com/test/rich-results)／[Schema Validator](https://validator.schema.org/) 需对正式公开 URL 补验。当前仅验证 JSON-LD 可解析及与可见内容一致，不承诺富结果。

验收过程发现并修复了两个迁移缺口：非媒体库分享图回退到 Logo，以及首页／Merino 调用仍指向已删除的 Demo 函数。最终以本轮完整渲染复测结果为准。

**Finding outcome（2026-11-04）：`deployed / published / production-verified`。原本地验证保留；最新生产证据及验收限制见末尾发布记录。**

## 批准后部署清单

以下清单已获所有者整包部署授权。只推主题 Git 不会创建生产页面，也不会上传媒体；不要整库覆盖生产。

### 主题代码（相对 `wp-content/themes/myathletik-child/`）

```text
functions.php
style.css
front-page.php
inc/product-example-data.php
inc/product-showcase.php
inc/product-showcase-setup.php
inc/product-showcase-admin.php
templates/product-showcase.php
templates/product-example.php
template-parts/product-showcase/card.php
template-parts/product-showcase/entry.php
template-parts/product-category/page.php
assets/js/product-showcase.js
assets/js/product-inquiry-context.js
scripts/setup-product-showcase.php
```

若目标环境曾复制旧 Demo 文件，移除以下已停用文件：`inc/product-showcase-preview.php`、`assets/js/product-library-preview.js`、`template-parts/product-showcase/review-bar.php`。新代码无引用。

### 媒体（不在 Git）

目录：`wp-content/uploads/myathletik-theme/assets/images/product-examples/ocean-depth/`

```text
front-640.webp
front-1280.webp
collar-close-640.webp
collar-close-1280.webp
waist-close-640.webp
waist-close-1280.webp
back-view-640.webp
back-view-1280.webp
front-social.jpg
ocean-depth-1080.mp4
```

MP4 为 16,629,027 字节的 1080p H.264 副本，`preload=none`；原始公司视频不变。旧文件名 `ocean-depth-review-1080.mp4` 已替换，不再使用。JPEG 为 27,132 字节，来自相同真实原视频静帧，无 AI 或产品内容修改。

第二款目录：`wp-content/uploads/myathletik-theme/assets/images/product-examples/hy265077-mens-merino-tencel/`

```text
front-640.webp
front-1280.webp
back-view-640.webp
back-view-1280.webp
fabric-close-640.webp
fabric-close-1280.webp
cuff-close-640.webp
cuff-close-1280.webp
front-social.jpg
hy265077-owner-approved-video.mp4
```

第二款使用所有者处理背景并审核通过的成片，56.375 秒、37,944,142 字节；静帧均从该版本提取。页面封面为 `front-1280.webp`。不要上传旧灰棚审核版替代此 MP4；不把第一款“原视频／无 AI”的说明套用到这款已处理背景的成片。

### WordPress 页面记录

推荐从后台操作，先上传上列代码和媒体（新增 `inc/` 文件先传，`functions.php` 最后覆盖）：

1. 登录生产站 WordPress 后台，进入 **工具 / Tools → Product Showcase**。
2. 核对站点网址为 `https://www.athletikapparel.com`；检查三个页面及 20 个媒体文件。失败时显示错误并禁用发布按钮，先修复错误，不要另建同名空白页。
3. 点击 **创建并发布展示页**。后台执行 URL／归属和媒体复检，再创建或补齐页面记录。
4. 成功后打开三个页面，清理生产页面缓存并执行下述上线验收；后台成功提示不等于 Google 已收录。

后台要求 `manage_options` 和 `publish_pages`，只接受带有效 nonce 的 POST；打开检查页不创建页面，重复执行保留页面 ID、内容、自定义 SEO 与未变化的修改时间。共享核心有互斥锁，阻止同时建页；异常中断后若持续提示已有任务运行，由维护者检查锁及实际页面状态。素材路径和发布对象全部来自已部署代码，不接受任意文件或页面执行输入。

CLI 仍作为可选途径保留。已有 SSH 环境时可从 WordPress 根目录运行：

```sh
# 可选：先准备草稿（不会降低已有发布页状态）
wp eval-file wp-content/themes/myathletik-child/scripts/setup-product-showcase.php

# 仅在最终批准上线后执行
wp eval-file wp-content/themes/myathletik-child/scripts/setup-product-showcase.php publish
```

脚本先预检全部 URL／归属冲突和媒体，不覆盖无关页面，不自动改现有 URL；创建父子页面、metadata 并清除 Rank Math Sitemap 缓存。已存在的正式页面正文与自定义 SEO 设置保留；已有设置如人为 noindex，不强制覆盖，须在上线验收中处理。

脚本当前覆盖展示库与两款详情，`publish` 会发布全部已配置记录，不是仅发布第二款。生产执行前须确认三个页面均获发布批准。

无需服务器 WP-CLI 时使用上述后台入口；仅在普通「页面 → 新增」中输入同名 slug 不会关联模板所需的标记。2026-11-04 已通过授权的 SSH／CLI 完成三个页面发布，所有者无需再次点击建页按钮。

## 2026-11-04 后台部署入口

- 目标页面与搜索意图：沿用上方三个正式 URL 及采购样品参考任务；不调整 URL 或公开正文。
- 证据：所有者已批准整包部署，并希望直接在 wp-admin 完成建页；原脚本仅能通过 WP-CLI 执行。
- 主要变量：将原建页逻辑提取为共享核心，后台与 CLI 调用同一套预检和写入流程。
- 风险：缺少素材、同名无关页面、重复操作、无权限或过期请求、数据库写入失败。
- 验收标准：预检只读；未授权／无效请求不写页面；错误清楚呈现；首次创建正确父子记录与 SEO；重复不增页；保持本地 noindex；生产发布由所有者在后台操作后另验。
- 本地结果：5 个 PHP 文件 lint 与 diff whitespace 检查通过；隔离模拟测试 78 项断言通过，覆盖首次创建、幂等、路由冲突、媒体缺失／越界、受保护页面、保留自定义 SEO、旧 Demo 迁移、写入失败和互斥锁。
- 真实 Local 后台：检查页列出三个页面及 20 个媒体；GET 误用发布端点返回 405，缺 nonce 返回 403，匿名 POST 返回 400；两次有效按钮提交均提示已是最新状态，前后页面记录及全部 metadata 的 SHA-256 完全相同，锁已释放。三个前台 URL 仍为 200 + noindex。临时 QA 会话已撤销，测试未提交询盘。
- CLI 兼容复测：同一共享核心输出三个原有页面 ID 80／81／84 与 `Already current`，未重复创建。浏览器证据保存在忽略目录 `.chrome-check/showcase-admin-*`；不作为生产验收证据。
- Finding outcome：`implemented / local-verified / production-pending`。本轮补传 `functions.php`、`inc/product-showcase.php`、`inc/product-showcase-setup.php`、`inc/product-showcase-admin.php`、`scripts/setup-product-showcase.php`；此前完整主题和 20 个媒体清单仍适用，`functions.php` 最后覆盖。

## 2026-11-04 生产部署与发布

- 所有者完成 Flywheel 公钥登记后，建立[专用 SSH 部署连接](../operations/flywheel-ssh-deployment.md)，核实规范域名、生产环境、活动子主题与 `blog_public=1`。
- 部署前 3 个待覆盖文件均与上一代码提交一致，无独立线上修改；原文件已备份至本机私有目录。新增后台所需 2 文件，并补齐原完整清单漏传的 2 个 JS，本轮总共上传 7 文件；`functions.php` 最后替换。服务器 PHP lint 与 SHA-256 检查通过。
- 部署后完整 15 个主题依赖均与本地逐字节一致；20 个媒体存在且非空，包含两个完整 MP4。
- 建页脚本已发布：展示库 ID 105，Ocean Depth ID 106，HY265077 ID 107；两个详情的 parent 均为 105。再次运行返回无变化，没有重复创建或修改页面。
- 从生产服务器发起公开 HTTPS 请求：首页、Merino 页、展示库及两款详情均为 HTTP 200，响应为实际页面内容。三个新页各有一个 H1、唯一自身 canonical、`index, follow`、正确 OG 图；没有 LocalWP 域名或运行时错误混入。
- 展示库输出 CollectionPage + ItemList，详情输出 ItemPage + BreadcrumbList，无 Product/Offer 或 Article 误用；首页与 Merino 的展示入口已出现在实际 HTML。
- `/page-sitemap.xml` 返回有效 XML，三个新 URL 各出现一次。公开页面可索引不等于 Google 已收录，本轮没有执行 GSC 请求。
- 两个 MP4 的公开 HEAD 均为 200 + `video/mp4`，大小分别为 16,629,027 和 37,944,142 字节；两个 JS 均为 200 + `application/javascript`。
- 外部标准 Chrome：首页、展示库及两款详情均为 200，无访问挑战；展示库两个面料编号筛选正常，两款图片可解码、视频实际播放且切回图片后暂停。1440／390 宽度无横向溢出，同源 HTTP 请求失败为 0；展示库和详情无页面 JavaScript 错误。
- 验收限制：截图保留 Cookiebot 未选择的同意弹窗，遮挡区域未做完整视觉确认；未提交真实询盘，未运行第三方 Rich Results Test／Schema Validator。首页另捕获一条 Turnstile 错误：`Remove async/defer from the Turnstile api.js script tag before using turnstile.ready()`，尚未确定是否既存或影响提交；作为独立待诊断问题记录，不归因于本次展示功能，也不宣称全站表单验收通过。
- 证据：`.chrome-check/production-showcase-preflight-2026-11-04.json`、`showcase-production-upload-result.json`、`showcase-production-records-2026-11-04.json`、`showcase-production-http-2026-11-04.json`、`showcase-production-seo-2026-11-04.json`；忽略目录原始记录不进入 Git。
- 浏览器证据：`.chrome-check/showcase-production-browser-2026-11-04.json` 及同目录 8 张截图。以上生产证据取代前文实施阶段的 `production-pending` 状态。

## 技术依据

- [Schema.org CollectionPage](https://schema.org/CollectionPage)：用于集合页面，与本库用途匹配。
- [Google Product structured data](https://developers.google.com/search/docs/appearance/structured-data/product)：Product snippets 与 Merchant listings 有不同的数据和资格要求。本轮不以编造价格或评价换取富结果。
- 当前 Local 安装的 Rank Math 源码与实际 HTML，用于核对 noindex Canonical 行为、分享图解析及默认 Article 移除。
