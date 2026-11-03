# Product Showcase 正式发布候选

日期：2026-11-03。当前状态：**按生产规格实现，Local 验收，未部署生产**。

## 范围与证据

所有者在本地 Demo 接入后明确要求“按照生产站的规格来，这个版本是准备上线的版本”。本轮将实际页面、功能和发布流程转换为正式实现；继续遵守此前暂不上线、共同审核后再正式发布的安排。

- 目标：`/product-showcase/` 与 `/product-showcase/ocean-depth-merino-wool-blend-set/`；首页、Merino 页及 Products 菜单作为入口。
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

**Finding outcome：正式发布候选，等待所有者在 Local 确认视觉与内容；未生产部署。**

## 批准后部署清单

以下清单是正式发布准备，**不是当前要求立即部署**。只推主题 Git 不会创建生产页面，也不会上传媒体；不要整库覆盖生产。

### 主题代码（相对 `wp-content/themes/myathletik-child/`）

```text
functions.php
style.css
front-page.php
inc/product-example-data.php
inc/product-showcase.php
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

### WordPress 页面记录

从 WordPress 根目录运行；先上传代码和媒体，再显式建页：

```sh
# 可选：先准备草稿（不会降低已有发布页状态）
wp eval-file wp-content/themes/myathletik-child/scripts/setup-product-showcase.php

# 仅在最终批准上线后执行
wp eval-file wp-content/themes/myathletik-child/scripts/setup-product-showcase.php publish
```

脚本先预检全部 URL／归属冲突和媒体，不覆盖无关页面，不自动改现有 URL；创建父子页面、metadata 并清除 Rank Math Sitemap 缓存。已存在的正式页面正文与自定义 SEO 设置保留；已有设置如人为 noindex，不强制覆盖，须在上线验收中处理。

如暂不具备服务器 WP-CLI，需要按同样字段在后台创建／标记两页后再验收；不能只上传 PHP 就宣称页面上线。当前尚未对生产执行任何建页操作。

## 技术依据

- [Schema.org CollectionPage](https://schema.org/CollectionPage)：用于集合页面，与本库用途匹配。
- [Google Product structured data](https://developers.google.com/search/docs/appearance/structured-data/product)：Product snippets 与 Merchant listings 有不同的数据和资格要求。本轮不以编造价格或评价换取富结果。
- 当前 Local 安装的 Rank Math 源码与实际 HTML，用于核对 noindex Canonical 行为、分享图解析及默认 Article 移除。
