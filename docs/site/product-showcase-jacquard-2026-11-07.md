# Jacquard Merino-Mix 套装：本地接入与审核记录

日期：2026-11-07。状态：`local-review / not-deployed`。所有者已授权本地建页、四段视频与简短英文草稿；**不等于批准正文或生产发布**。日常提交只保留本地，未推送。

## 1. 确认范围与资料

- 所有者确认标题 `Women's wool jacquard base-layer set`、路径 `/product-showcase/womens-wool-jacquard-base-layer-set/`。
- 视频来源目录：`D:\B-视频素材\Google_Omni_成片\女款羊毛提花0624\`。全部四个 MP4 纳入本款，不只最初指定的 06。
- 技术来源：所有者提供的 `GIRLS Jacquard Merino-Mix_Top+Pant - Unbranded.pdf`，两页已阅读文字与图样。PDF 不上传公开网站，不进入 Git。
- 所有者补充 GSM 为 **240**；当前按主提花面料记录，已在对话说明不将其套用到拼接面料。
- 主面料 A：HY25493 jacquard，65% Polyester / 25% Merino wool / 10% Nylon。
- 拼接面料 B：HY25888，技术资料列 70% Merino wool / 30% Nylon，另列 `Inside: 100% PES`，black mélange。页面保留独立“inside”说明，不推算整件成分或内外层占比。
- PDF 包含女款／女孩设计；本次使用成年女模特视频、已批准女款标题，不额外创建儿童页面。
- 缝线 606／607、22 cm No. 3 reversed-coil zipper、4 cm 腰部宽度来自设计稿；tonal／contrast FLATLOCK mock-up 是待批准要求，不写成已经存在的两款成品或性能认证。

## 2. 页面与媒体安排

- Local 页面 ID：**85**；产品 key：`womens-wool-jacquard-set`。
- 四张视频抽帧：整套正面、背面、领口花型、腰部。提供 640／1280 WebP 与单独社交 JPEG。
- 四段视频独立保留，不拼接、不更改播放速度，不改原文件。网页 MP4 以 stream copy 重新封装并移动 moov 信息到文件开头，保留 1920×1080、24 fps、H.264 画面及 AAC 音轨。
- 视频入口桌面四列、手机两列；按访客点击加载，单个原生 `dialog` 播放；关闭暂停并恢复焦点。禁用 JS 后仍有四视频、四图片直达链接。
- 多视频是共享模板的向后兼容扩展；原两款继续使用原单视频 UI。详情可提供独立 facts 和技术参考标题，避免将不同面料挤成整件成分。
- Local 展示库和 Merino 页增加新款；首页仍固定 Ocean Depth，不替换特色款。
- `wp-page-template-builder` 约束为共享数据／模板；`wp-image-optimize` 用于真实帧和网页媒体；`wp-design-polish` 使新增四视频入口沿用设计变量；`wp-brand-voice-guard` 区分事实、设计稿要求与未批准草稿。

## 3. 本地验收

- 建页前确认环境 `local`、域名 `http://myathletik-rebuild-02.local`，注册表仅原两款加本款。
- 已有 ID 80／81／84 的完整 post 与 metadata 建页前后不变；新建 ID 85；再次 setup 的 `changed=false`，ID／日期不漂移。
- 预检识别全库 33 个不同媒体文件（原 20 + 新 13），包括四视频全部 src／poster／thumbnail。
- 1440、1024、768、360px：详情、展示库及 Merino 入口检查；一页一个 H1、无横溢出，图片正常、筛选命中新款，入口数量为三款。
- 独立回归在 1440／360px 实际播放每段新视频：currentTime 增长，src／poster／标题一致，关闭暂停、焦点返回；总视频按钮恢复 overview。原两款照片切换与单视频播放正常。
- 四段 MP4 初次加载请求为 0；不为展示四段而同时下载四段。
- 新款 Contact 正确预填 Merino Wool、两种面料参考、240 GSM 和产品地址；没有提交表单。首页特色款仍为 HY254955。
- `X-Robots-Tag` 与 robots meta 均为 `noindex, follow`；Local Rank Math 原有行为是不输出 canonical。OG URL／分享图与 ItemPage／BreadcrumbList 正常，不添加零售 Product／Offer 或虚构 VideoObject。
- 本地漂亮链接 `/page-sitemap.xml`、`/sitemap_index.xml` 返回 404，未擅自刷新 rewrite 或改索引设置。只读查询入口 `/?sitemap=page&sitemap_n=1` 用于核对 XML；另直接确认 Rank Math sitemap entry 返回 false、WP core sitemap 排除 ID 85。
- 本机 PHP CLI 存在既有 `php_imagick.dll` 加载警告；本次媒体由 FFmpeg 输出，PHP 语法与页面渲染不依赖该扩展，未改环境配置。
- 本地截图、测试及建页前后快照保存在忽略目录 `.chrome-check/`，不作为生产部署文件。

## 4. 后续获准上线时的准确清单

当前未进行任何生产操作。审核通过后按 `docs/operations/flywheel-ssh-deployment.md` 备份、传输和验收。

代码共 **6** 个：

- `inc/product-example-data.php`
- `inc/product-showcase-setup.php`
- `templates/product-example.php`
- `template-parts/product-showcase/card.php`
- `assets/js/product-showcase.js`
- `style.css`

新增媒体共 **13** 个，均位于 `wp-content/uploads/myathletik-theme/assets/images/product-examples/womens-wool-jacquard-set/`：

| 文件 | 来源／用途 |
|---|---|
| `overview-1080.mp4` | `女款羊毛提花重塑01_a9812214_1080p.mp4`；约 9.96 秒 |
| `back-side-1080.mp4` | `女款羊毛提花重塑02_ecbaf190_1080p.mp4`；约 9.96 秒 |
| `neckline-1080.mp4` | `女款羊毛提花重塑03_e305c785_1080p.mp4`；约 9.96 秒 |
| `waist-1080.mp4` | `女款羊毛提花重塑06_9a384601_1080p.mp4`；约 8.46 秒 |
| `front-640.webp`、`front-1280.webp` | 视频 01，3.8 秒 |
| `back-view-640.webp`、`back-view-1280.webp` | 视频 02，2.0 秒 |
| `neckline-detail-640.webp`、`neckline-detail-1280.webp` | 视频 03，7.2 秒 |
| `waist-detail-640.webp`、`waist-detail-1280.webp` | 视频 06，0.3 秒 |
| `front-social.jpg` | 视频 01，3.8 秒；1280×720 |

数据库：只新增此款受管页面及 SEO metadata，父级为现有生产 Showcase。**不可直接复制 Local ID 85，不整库同步**；先核对当前注册表／父子页状态，避免 setup 顺带发布未批准条目。现有原两款页面不覆盖。无需新重定向、插件或导航数据库操作。

激活顺序：先准备新媒体、兼容的模板／JS／样式／setup，再启用新数据与建页；记录实际生产 ID。验证普通正式 URL、缓存、四视频动态播放、原两款回归、三个产品入口、询盘、canonical 和正式 Sitemap 后才能标记生产验收完成。
