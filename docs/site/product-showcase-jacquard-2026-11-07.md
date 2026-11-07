# Jacquard Merino-Mix 套装：本地接入与审核记录

日期：2026-11-07。状态：`local-review / not-deployed`。所有者已授权本地建页、四段视频与简短英文草稿；**不等于批准正文或生产发布**。日常提交只保留本地，未推送。

## 1. 确认范围与资料

- 所有者确认标题 `Women's wool jacquard base-layer set`、路径 `/product-showcase/womens-wool-jacquard-base-layer-set/`。
- 视频来源目录：`D:\B-视频素材\Google_Omni_成片\女款羊毛提花0624\`。全部四个 MP4 纳入本款，不只最初指定的 06。
- 技术来源：所有者提供的 `GIRLS Jacquard Merino-Mix_Top+Pant - Unbranded.pdf`，两页已阅读文字与图样。PDF 不上传公开网站，不进入 Git。
- 所有者补充 GSM 为 **240**；当前按主提花面料记录，已在对话说明不将其套用到拼接面料。
- 主面料 A：HY254931 jacquard，65% Polyester / 25% Merino wool / 10% Nylon。
- 拼接面料 B：HY254888，技术资料列 70% Merino wool / 30% Nylon，另列 `Inside: 100% PES`，black mélange。页面保留独立“inside”说明，不推算整件成分或内外层占比。
- **编号更正（所有者 2026-11-07 确认）：** 原 PDF 的 `HY25493`、`HY25888` 有误，分别改为 `HY254931`、`HY254888`。现行页面、展示卡、搜索及询盘引用以更正编号为准；原 PDF 和既有历史验收快照不覆盖，其旧编号不得作为现行依据。成分、240 GSM、视频、URL 与布局不变。
- PDF 包含女款／女孩设计；本次使用成年女模特视频、已批准女款标题，不额外创建儿童页面。
- 缝线 606／607、22 cm No. 3 reversed-coil zipper、4 cm 腰部宽度来自设计稿；tonal／contrast FLATLOCK mock-up 是待批准要求，不写成已经存在的两款成品或性能认证。

## 2. 页面与媒体安排

- Local 页面 ID：**85**；产品 key：`womens-wool-jacquard-set`。
- 四张视频抽帧：整套正面、背面、领口花型、腰部。提供 640／1280 WebP 与单独社交 JPEG。
- 四段视频独立保留，不拼接、不更改播放速度，不改原文件。网页 MP4 以 stream copy 重新封装并移动 moov 信息到文件开头，保留 1920×1080、24 fps、H.264 画面及 AAC 音轨。
- 视频入口桌面四列、手机两列；按访客点击加载，单个原生 `dialog` 播放；关闭暂停并恢复焦点。禁用 JS 后仍有四视频、四图片直达链接。
- 多视频是共享模板的向后兼容扩展；原两款继续使用原单视频 UI。详情可提供独立 facts 和技术参考标题，避免将不同面料挤成整件成分。
- Local 展示库增加新款；Merino 页改为最多两款的预览入口，按有效页面首次发布时间降序、同时间按 ID 降序选取。首页仍固定 Ocean Depth，不替换特色款。
- 所有者要求「展示两款就够了」：桌面两张紧凑卡片并排，小屏原生横向滑动；保留图片、名称、克重、面料编号及详情链接。成分、详细介绍和使用建议仍在完整 Showcase／详情页，不从产品资料删除。新款替换较早的入口，不向下追加；总展示库仍保留全部有效已发布产品。
- `wp-page-template-builder` 约束为共享数据／模板；`wp-image-optimize` 用于真实帧和网页媒体；`wp-design-polish` 使新增四视频入口沿用设计变量；`wp-brand-voice-guard` 区分事实、设计稿要求与未批准草稿。

## 3. 本地验收

- 建页前确认环境 `local`、域名 `http://myathletik-rebuild-02.local`，注册表仅原两款加本款。
- 已有 ID 80／81／84 的完整 post 与 metadata 建页前后不变；新建 ID 85；再次 setup 的 `changed=false`，ID／日期不漂移。
- 预检识别全库 33 个不同媒体文件（原 20 + 新 13），包括四视频全部 src／poster／thumbnail。
- 初次接入时，1440、1024、768、360px：详情、展示库及 Merino 入口检查；一页一个 H1、无横溢出，图片正常、筛选命中新款，当时入口数量为三款；随后按下述两款预览规则替代。
- 独立回归在 1440／360px 实际播放每段新视频：currentTime 增长，src／poster／标题一致，关闭暂停、焦点返回；总视频按钮恢复 overview。原两款照片切换与单视频播放正常。
- 四段 MP4 初次加载请求为 0；不为展示四段而同时下载四段。
- 新款 Contact 正确预填 Merino Wool、两种面料参考、240 GSM 和产品地址；没有提交表单。首页特色款仍为 HY254955。
- `X-Robots-Tag` 与 robots meta 均为 `noindex, follow`；Local Rank Math 原有行为是不输出 canonical。OG URL／分享图与 ItemPage／BreadcrumbList 正常，不添加零售 Product／Offer 或虚构 VideoObject。
- 本地漂亮链接 `/page-sitemap.xml`、`/sitemap_index.xml` 返回 404，未擅自刷新 rewrite 或改索引设置。只读查询入口 `/?sitemap=page&sitemap_n=1` 用于核对 XML；另直接确认 Rank Math sitemap entry 返回 false、WP core sitemap 排除 ID 85。
- 本机 PHP CLI 存在既有 `php_imagick.dll` 加载警告；本次媒体由 FFmpeg 输出，PHP 语法与页面渲染不依赖该扩展，未改环境配置。
- 本地截图、测试及建页前后快照保存在忽略目录 `.chrome-check/`，不作为生产部署文件。
- 编号更正仅需更新共享产品数据及上述内部记录；无需新增或替换媒体，也无需重建页面。加上两款预览后，整批上线按下方 8 个代码／13 个媒体／单款建页清单，当前没有生产部署授权。
- 更正后复核通过：详情、展示库筛选、Merino 入口及 Contact 预填均使用新编号；四档宽度的本地回归仍通过。ID 85 正文及 Rank Math 元数据原本不含货号，因此没有数据库更新；旧编号仅保留于本记录的明确作废说明与历史快照。
- 两款预览最终验收：1440／1024／768／360px，区块高度约为 886／790／920／914px；相较原三款长卡，1440px 高度从约 1883px 降低 53%，360px 从约 3398px 降低 73%。桌面双列、小屏整卡横滑；图片保持人物完整，克重和更正货号可读，无整页横向溢出。
- 小屏最终采用整卡宽度，而非露出下一卡的窄卡方案：真实浏览器 Tab 到第二张图片／标题／详情链接会自动显露；原生方向键、模拟触摸滑动和禁用 JS 后的浏览及详情跳转通过。无需增加脚本。首页仍为 Ocean Depth，展示库仍有三款且较早产品可搜索，预览不请求 MP4，页面脚本错误为 0。
- 独立纯内存测试 9 项通过：五个有效 Merino 及其他类目、草稿／私密／密码保护／缺页／错误归属的过滤，发布时间与同时间 ID 排序，普通内容修改不重新排序，总入口隐藏，以及零款／单款结果。测试不修改数据库。两款上限在服务端固定，不只是 CSS 隐藏多余卡片。

## 4. 后续获准上线时的准确清单

当前未进行任何生产操作。审核通过后按 `docs/operations/flywheel-ssh-deployment.md` 备份、传输和验收。

代码共 **8** 个：

- `inc/product-example-data.php`
- `inc/product-showcase.php`
- `inc/product-showcase-setup.php`
- `templates/product-example.php`
- `template-parts/product-showcase/card.php`
- `template-parts/product-showcase/entry.php`
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

两款预览布局这次增量单独需要 `inc/product-showcase.php`、`template-parts/product-showcase/entry.php`、`template-parts/product-showcase/card.php`、`style.css`，无新增媒体／数据库操作。它们与新款共享文件，部署时仍须核对整批批准范围，不将未批准的新款自动带入生产。

激活顺序：先准备新媒体、兼容的模板／JS／样式／setup，`inc/product-showcase.php` 中的新预览函数须先于调用它的 `entry.php` 激活，再启用新数据与建页；记录实际生产 ID。验证普通正式 URL、缓存、四视频动态播放、原两款回归、展示库三款／Merino 预览两款、询盘、canonical 和正式 Sitemap 后才能标记生产验收完成。
