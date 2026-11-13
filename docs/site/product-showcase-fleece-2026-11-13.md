# 男款半拉链摇粒绒上衣：制作与发布记录

日期：2026-11-13。状态：`deployed / production-verified-with-warning`。所有者审核通过后，本款、另一款男装及 Outdoor 入口已一同上线；完整范围、验收与待排查项见[本批生产发布记录](product-showcase-outdoor-release-2026-11-13.md)。下文 Local 验收为历史记录。

## 授权、事实与边界

- 所有者确认标题 `Men's half-zip fleece top`、路径 `/product-showcase/mens-half-zip-fleece-top/`，归入 Outdoor Clothing；授权根据资料和视频起草简短英文介绍用于 Local 审核。
- 视频由所有者提供，来源 `Z:\Veronica Huang\服装照片\2026-9-12 6件男装和13件女装\绿幕 视频9.14\1 男军绿摇粒绒.mp4`；原视频约 60 秒、3840×2160，虽然目录名提及绿幕，实际画面为浅色影棚背景。
- 所有者提供的规格图载明面料 `HY254900`、`100% Polyester`、`250 GSM`，与本地现有面料库一致。成分及克重标注为 fleece fabric，不推断拼接料、辅料或整件成分；不公开客户专属技术指令，不虚构性能测试或认证。
- 产品介绍与选项经所有者审核后发布；可见的立领、半拉链及前口袋是款式特征，不冒充保暖、透气等未经确认的性能特性。

## 实现与验证

- 复用既有 `templates/product-example.php`、展示库和产品数据结构；Local 页面 ID **87**，父页 ID **80**，产品 key `mens-half-zip-fleece`。旧展示页 post／metadata 的创建前后快照一致；仅 Local 新增一页。
- 图片均为原视频真实帧：正面 7.5 秒、背面 47.5 秒、领口 34 秒、口袋 37.5 秒；各生成 640／1280 WebP，另有一张社交 JPEG。媒体内容没有生成式重绘。
- 完整视频重新编码为 1920×1080 H.264/AAC，约 60 秒、18,381,042 bytes，使用 faststart；源文件未修改。页面只在用户播放时请求视频。
- Chrome Local 1440／1024／768／360px 检查：详情图像、单 H1、规格、无整页横溢出、noindex、展示库 4 款与 HY254900 搜索／Polyester 筛选通过；1440／360px 视频实际播放并关闭后暂停。Merino 仍为两款、首页保留 Ocean Depth。
- Contact 正确预填 Outdoor Clothing、HY254900 和 250 GSM；未提交表单。禁用 JS 时视频与四张图片的直达链接可用。页面脚本及本站 HTTP 错误为 0；阻断第三方请求，因此不属于 Cookiebot、统计或完整表单投递验收。
- 证据：`.chrome-check/fleece-local-qa-20261113.json`、`fleece-product-{1440,1024,768,360}.png`、建页前快照；均不进 Git 或生产。Local PHP CLI 既有 imagick 加载警告未处理，PHP 语法及实际页面检查通过。

## Outdoor 页面入口（Local 审核）

- 所有者要求参考 Merino 的 Product Showcase 入口，在 Outdoor 产品分类介绍之后、生产能力之前加入 `Outdoor clothing product examples`；单款时桌面居中限宽，手机完整显示。卡片复用现有图片、名称、面料克重、货号和详情链接，不新复制媒体、不预取视频。
- 复用 Merino 的服务端精选逻辑：只显示对应类目中有效且公开的产品，按首次发布时间及 ID 选择最新两款；无可展示产品时隐藏区块，两款在桌面并排、手机原生横滑，并提供键盘焦点与提示。完整入口链接至现有 Showcase 总页。
- Local Chrome 在 1440／1024／768／360／320px 检查单卡、链接、位置、页面横溢出及零视频请求；浏览器内模拟第二张卡，验证双列和小屏横滑。独立纯内存测试实际服务端筛选及零／一／两款输出、未公开或密码保护产品排除、无效 Hub 隐藏；不修改数据库。Merino 五档宽度及手机键盘操作、首页、Sportswear 和 Outdoor 无 JS 详情跳转回归通过。证据见 `.chrome-check/outdoor-preview-qa-20261113.json` 及对应截图。
- 本入口增量为 `template-parts/product-category/page.php`、`template-parts/product-showcase/entry.php`、`template-parts/product-showcase/card.php`、`style.css`；入口本身不新增媒体、不改数据库。后续已与两款详情一起上线；若无有效 Outdoor 产品，入口自动隐藏。

## 本款获准部署的清单

2026-11-13 已经所有者批准并按专用 SSH 流程部署；以下为本款清单，两款合并发布详情和验证见[生产发布记录](product-showcase-outdoor-release-2026-11-13.md)：

- 代码：`inc/product-example-data.php`，以及 Outdoor 入口的 `template-parts/product-category/page.php`、`template-parts/product-showcase/entry.php`、`template-parts/product-showcase/card.php`、`style.css`，合计 5 个。须比对届时完整文件与生产差异，避免夹带未批准的数据。
- 媒体：`uploads/myathletik-theme/assets/images/product-examples/mens-half-zip-fleece/` 下 `front-640.webp`、`front-1280.webp`、`back-view-640.webp`、`back-view-1280.webp`、`collar-zip-detail-640.webp`、`collar-zip-detail-1280.webp`、`pocket-detail-640.webp`、`pocket-detail-1280.webp`、`front-social.jpg`、`fleece-overview-1080.mp4` 共 10 个文件，不整目录同步其他媒体。
- 数据库：仅精准新建此产品的生产页面及对应 SEO metadata，关联既有 Showcase 父页；不可直接复制 Local ID、整库同步或运行会批量发布其他产品的操作。核对新路径空闲、旧页面不变及生产 noindex／canonical／Sitemap 后再交付。
