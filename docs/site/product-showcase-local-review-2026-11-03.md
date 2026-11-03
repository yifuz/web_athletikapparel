# Product Showcase：LocalWP 接入审核记录

日期：2026-11-03。范围：**仅 LocalWP，未上线，待所有者讨论正式版本**。

> 后续更正：所有者同日明确要求按生产站规格制作。本文保留早期 Demo 接入快照；当前实现与部署说明以[正式发布候选记录](product-showcase-release-candidate-2026-11-03.md)为准，旧 local-only 开关、审核栏及禁用按钮已撤换。

## 目标页面与当前状态

所有者先要求可扩展的实物产品展示入口，审核独立 Demo 后进一步要求“加入我们的 local 页面”。本轮接入真实 WordPress 页眉、页脚与页面模板；不把本地接入视为生产发布授权。

| 本地页面／入口 | 当前实现 |
|---|---|
| `/product-showcase/` | 展示库，LocalWP 页面 ID 80 |
| `/product-showcase/ocean-depth-merino-wool-blend-set/` | 单款详情，LocalWP 页面 ID 81，父级为 80 |
| 首页 | 七品类区块后增加精选产品及展示库入口 |
| `/merino-wool-manufacturer/` | 原产品图库后增加实物详情入口 |
| Products 下拉菜单 | 末尾增加 Product Showcase；七个商业品类保留 |

以上是本地审核路径，正式公开 URL 尚未定稿。没有修改现有已收录 URL，没有新增生产页面，也没有创建 `/products/`。

## 搜索意图与证据

- 七个既有商业品类页继续承接 manufacturer 采购需求；展示库服务于实物发现和资料浏览；单款详情用于了解某一真实产品及其可选开发方向。
- 不把产品展示库本身当作已验证的大搜索量关键词，不宣称本次可以带来多少曝光、排名或询盘。
- 第一款 Ocean Depth 的事实由所有者提供并审核：52% Merino wool / 43% Polyester / 5% Spandex，155 GSM，面料编号 HY254955；上衣与 leggings 使用同一种面料。
- 用途与开发选项沿用已审核 Demo；没有补写 micron、knit structure、seam construction、认证或测试结果。
- 原视频为所有者提供的公司宣传实拍；四张展示静帧来自同一支原视频，不当作四款不同产品。

## 主要变量

这是**本地页面架构与视觉评审**，不是生产 SEO 单变量实验。数据集中于 `inc/product-example-data.php`；总览、首页、Merino 入口共享卡片，同一产品始终指向同一详情。后续可新增资料完整的产品，不需复制整页模板。

总览筛选只改变显示状态，不生成参数 URL；产品卡片与链接在服务端 HTML 中存在，无 JavaScript 也能进入详情。照片和视频继续共用展示区，选择视频后才加载元数据，播放由用户主动控制，切回图片暂停。

## 本地限制与风险

- 启用条件同时要求 `WP_ENVIRONMENT_TYPE=local` 和数据库 `home` 的主机为 `myathletik-rebuild-02.local`；不使用请求 Host 判定。
- 菜单通过运行时 filter 加入，不改写已保存菜单；首页、Merino 入口也受同一个本地开关控制。
- 两个审核页设有专用 metadata、robots `noindex, nofollow`、HTTP `X-Robots-Tag` 与禁止缓存头，排除在 Rank Math / Core Sitemap 外。
- 如果误把这两个本地页面记录同步到其他环境，当前代码会返回 404；代码和媒体均不应在正式批准前安排部署。
- 审核页的项目询盘按钮保持停用；没有提交表单或向外发送消息。
- 现有站点头尾及 Rank Math 的默认行为继续保留；正式发布前还需另行确定公开 URL、metadata、Schema、生产媒体交付及验收，不能把本地验收等同生产索引验收。

## 媒体位置

真实文件在 uploads，未放入主题 Git：

`wp-content/uploads/myathletik-theme/assets/images/product-examples/ocean-depth/`

- `front-640.webp`、`front-1280.webp`
- `collar-close-640.webp`、`collar-close-1280.webp`
- `waist-close-640.webp`、`waist-close-1280.webp`
- `back-view-640.webp`、`back-view-1280.webp`
- `ocean-depth-review-1080.mp4`

四张实拍静帧转换为 WebP，没有生成、修饰或替换产品内容。原 208,676,665 字节视频保留不变；本地 1080p H.264 审核副本为 16,629,027 字节，保留原音轨内容并启用 faststart。主展示图按 `object-fit: cover` 的实际缩放需要选择清晰版本，缩略图使用较小版本。模板继续通过项目图片 URL 缓冲机制指向 uploads。

## 验收标准与 Finding outcome

- PHP 语法检查和 JS 语法检查通过；新增样式限定于 `.ma-pl` 组件及两个审核页的 body class。
- 验收覆盖总览、详情、首页入口、Merino 入口的 360 / 390 / 768 / 1024 / 1440 宽度、图片加载、单一 H1、无水平溢出、实际链接与移动端触控。
- 验收覆盖搜索、材料筛选、空结果、复位、无 JavaScript 原生入口、媒体键盘切换、视频实际播放、切换后暂停与固定展示区。
- 实际 HTTP 响应检查确认新页面可访问并禁止索引；本地 Page Sitemap 不含两个新 URL。
- 独立隔离测试覆盖四组不允许的环境／域名组合；确认审核模板与菜单停用、误同步记录返回 404、Sitemap 排除。
- 所有者已有的 GEO 与 SEO Backlog 未提交修改保留，本轮没有覆盖或代为提交。

**Finding outcome：本地审核实现，等待所有者视觉与结构反馈；生产状态仍为未部署。** 下一步先讨论入口位置、卡片信息量和详情布局，再决定正式实施和发布范围。

## 本轮部署清单

**无需部署。** 新代码仅用于本地审核。图片和视频也暂不上传生产；Git 提交推送只保存代码，不等于上线。
