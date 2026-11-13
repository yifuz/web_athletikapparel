# 男款半拉链上衣及紧身裤：Local 审核版

日期：2026-11-13。状态：`local-review / not-deployed`；文字、素材与生成画面的产品准确性均待所有者审核，不等于生产发布授权。

## 确认与事实边界

- 所有者确认标题 `Men's half-zip top & tights`、路径 `/product-showcase/mens-half-zip-top-and-tights/`，归入 Outdoor Clothing，并授权按所供资料与视频起草简短英文 Local 审核稿。
- 规格图写有 HY265048、180 GSM、86% Graphene / 14% Elastane。所有者补充：Graphene 的基础纤维为 Polyester，且此面料同时用于上衣与裤子；Local 文案因此写 `86% Graphene Polyester / 14% Elastane`，不是宣称石墨烯本身占 86%。面料规格不扩展至拉链、腰头等辅料。
- 不推断 Graphene 添加量、生产工艺、测试结果、抗菌／保暖等性能或认证；也不把生成视频作为性能证据。未公开客户专属技术包的内部要求。
- 两段媒体来自所有者指定的 `D:\B-视频素材\Google_Omni_成片\男蓝白拉链套装\`。这是 Omni 成片，视频与抽帧可供视觉审核，但生成画面与原实物的款式、细节一致性须由所有者核对。第二段开头右侧有少量拍摄器材入镜，未擅自裁剪或删除。

## Local 实现与验收

- 产品 key `mens-half-zip-top-tights`，Local 页面 ID **89**，Showcase 父页 ID **80**。只新增此页面；5 个既有 Showcase 页面 post／metadata 创建前后保持一致。
- 复用现有多视频 Showcase 模板；两段 1080p 视频各约 10 秒，分别为 `overview-1080.mp4`、`collar-and-fit-1080.mp4`，共 **8,471,256 bytes**。只做不重编码的封装调整以支持 faststart，原始视频不变。
- 四组视频抽帧（front、side、collar、full-set），各含 640／1280 WebP，另有一张社交 JPEG；共 11 个新增媒体。Alt 描述可见画面，不把图片改称实拍或测试证据。
- Chrome Local 在 1440／1024／768／360／320px 检查详情、素材、单 H1、noindex、无整页溢出、5 款总库、HY265048 搜索／Polyester 筛选，以及 Outdoor 两款精选。1440／360px 两段视频实际播放，关闭后暂停并返回焦点；初始加载不请求本款 MP4。
- Contact 正确预填 Outdoor Clothing、HY265048 和 180 GSM，未提交表单；无 JS 时两段视频和四张图片直达链接可用。Merino 与首页精选回归通过；页面脚本及本站 HTTP 错误为 0。第三方请求被阻断，不构成 Cookiebot、统计或表单投递验收。
- 测试与截图留在 `.chrome-check/blue-set-local-qa-20261113.json`、`blue-set-product-{1440,1024,768,360,320}.png`、`blue-set-outdoor-{1440,1024,768,360,320}.png`，不提交 Git 或上传生产。

## 未来获准上线时的清单

当前尚未获生产发布授权。届时先按 SSH 流程核对已批准范围及生产状态，不整库同步、不开批量发布：

- 代码增量：`inc/product-example-data.php`；该共享文件**同时包含尚待审核的摇粒绒产品**，若两款不同时批准，须先精准拆分，不能整文件夹带。若同时发布 Outdoor 入口，还需该入口的 4 个代码文件，详见[摇粒绒记录](product-showcase-fleece-2026-11-13.md)。
- 新增媒体目录 `uploads/myathletik-theme/assets/images/product-examples/mens-half-zip-tights-set/`：`front-640.webp`、`front-1280.webp`、`side-640.webp`、`side-1280.webp`、`collar-640.webp`、`collar-1280.webp`、`full-set-640.webp`、`full-set-1280.webp`、`front-social.jpg`、`overview-1080.mp4`、`collar-and-fit-1080.mp4`。不包含摇粒绒媒体。
- 数据库：仅对获准的本款精准新建生产页面和 SEO metadata，关联现有 Showcase 父页；不得复制 Local ID 89。部署后复核真实网址、缓存、两视频、入口及既有页面。
