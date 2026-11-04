# HY265077 第二款产品展示接入

日期：2026-11-04。状态：视频已获所有者审核通过；产品页已接入 Local，页面内容与视觉等待所有者审核，未生产部署。

## 目标与依据

- 目标页面：`/product-showcase/mens-merino-tencel-mesh-long-sleeve-shirt/`。展示库与 Merino 品类页增加对应入口；首页继续使用 Ocean Depth 特色产品及展示库总入口。
- 搜索意图：具体男式长袖 T-shirt 的样品外观、面料规格与 OEM 开发参考。`/merino-wool-manufacturer/` 继续承接 Merino 制造商采购需求；不替换既有 URL，无需 301。
- 所有者确认规格：HY265077，80% Tencel / 20% Merino wool，115 GSM；产品名称包含 Mesh LS T-shirts。画面可见灰色长袖和 thumbhole cuffs。模特所穿黑色长裤不属于本产品。
- 视频来源：所有者指定的 `D:\B-视频素材\Google_Omni_成片\男灰色羊毛长袖`，取代此前的 Agent 灰棚处理版本。2026-11-04 所有者明确“视频审核通过”。
- 沿用此前按生产规格制作本地 Product Showcase 的授权。视频批准不等于页面正文／开发选项批准，也不等于生产发布授权。

## 主要变量

1. 在共享数据中增加 `merino-tencel-mesh-top`，复用路由、详情、筛选、Schema、询盘上下文与建页脚本。
2. 统一展示区包含 4 张视频静帧和批准视频。初始显示正面图，视频保持手动播放、`preload="none"`，切回照片暂停。
3. 单件产品使用 `Branding and project details`；Ocean Depth 继续使用 `Shared options for the set`。媒体说明改为中性 `Frame from the product video`，不把换背景成片称为未经编辑的原片。
4. Merino 产品入口按已发布、有效且属于该品类的记录循环，当前两款；首页保留原特色产品与展示库总入口。
5. 正文仅引用已确认材料和可见外观；开发选项是供所有者审核的草案，以买家 brief 和样品确认为条件。不添加缝型、micron、性能测试、认证或库存信息。

## 素材记录

素材目录（不进入 Git）：

`wp-content/uploads/myathletik-theme/assets/images/product-examples/hy265077-mens-merino-tencel/`

| 文件 | 来源位置 | 尺寸／大小 |
|---|---|---|
| `front-640.webp` / `front-1280.webp` | 批准成片第 408 帧，17.000 秒 | 640×360 / 1280×720，6,736 / 19,018 bytes |
| `back-view-640.webp` / `back-view-1280.webp` | 第 270 帧，11.250 秒 | 6,456 / 17,096 bytes |
| `fabric-close-640.webp` / `fabric-close-1280.webp` | 第 1076 帧，44.833 秒 | 25,826 / 78,260 bytes |
| `cuff-close-640.webp` / `cuff-close-1280.webp` | 第 1340 帧，55.833 秒 | 12,248 / 37,744 bytes |
| `front-social.jpg` | 同正面帧 | 1280×720，38,976 bytes |
| `hy265077-owner-approved-video.mp4` | 所有者处理背景的 01–06 片段合成 | 1920×1080，24 fps，56.375 秒，37,944,142 bytes |

静帧保留 16:9，不另行裁切、调色或重绘。成片此前仅清理片段 01 起始 6 帧和片段 04 的角落设备边；所有者素材与原绿幕视频保留不变。视频 SHA-256：`508A346801151FE7F51C7C9E186AC077E7D111D155573A49BACD7739AAE83AB3`。

旧 `hy265077-gray-studio-review.mp4`、旧封面和独立审核封面 `hy265077-owner-approved-poster.webp` 均不在页面引用／本轮部署清单内。页面视频封面使用 `front-1280.webp`。

## 风险与验收标准

- 原素材已由所有者处理背景；不推断其编辑技术，不将新成片描述为完全未经处理的原片。
- 20% Merino 含量在主规格与卡片中清楚列出，不能暗示 100% Merino。建议用途不扩写为保暖、排汗等保证。
- 四张静帧必须真实加载，视频能播放及暂停；桌面与手机不溢出，图片／视频切换布局稳定。
- 展示库显示两项，编号／材料搜索有效；旧款内容不回归。Merino 两个入口、首页特色入口、详情回链和 Contact 预填正确，不提交测试询盘。
- 新页唯一 H1、独立 title／description／分享图、可解析 ItemPage；Local 保持 noindex 且排除 Sitemap。生产 Canonical、HTTPS、robots、Sitemap 和媒体响应等待部署后复核。
- 显式建页脚本仅在已核实的 Local 环境执行；再次运行必须幂等，不重复建页或刷新修改日期。

## 验收记录

- Local 环境确认：`WP_ENVIRONMENT_TYPE=local`，域名 `myathletik-rebuild-02.local`。新增详情 ID 84；原展示库 ID 80、Ocean Depth ID 81 保留；ID 不写入主题路由。
- PHP／JS 语法检查及 `git diff --check` 通过。
- 第二次运行 setup 返回 `Already current; page content and modification dates unchanged`。
- Chrome 实际渲染检查通过：1440／768／390 三种宽度下，新详情、展示库、Merino 入口、首页入口均 HTTP 200，唯一 H1，无横向溢出；已检查桌面与手机截图。
- 新页四张图可切换，批准视频实际播放，浏览器读取 56.375 秒／1920×1080；切回照片暂停，媒体区高度稳定。分享图 HTTP 200，独立 title／description、ItemPage 与本地 noindex 正确。
- 展示库两个产品及 HY265077／Tencel／HY254955 搜索正确，Merino 两卡、首页旧特色卡正确；Contact 预填 Merino Wool 和 HY265077 产品参考，保留用户已填内容，未提交表单。禁用 JavaScript 后仍可使用图片、视频和页面链接。
- Local Page Sitemap 不包含 Product Showcase。QA 脚本与 12 张截图保存在忽略目录 `.chrome-check/hy265077-*`；生产仍需另行验收。
- 共 15 项功能检查通过；独立健康复核覆盖 5 个页面，零页面 JS 错误、零本地 HTTP 错误。初轮 QA 主动阻止的 60 次请求均为 LocalWP browser-sync POST，已与产品资源错误分开核验。Ocean Depth 详情追加回归通过，原套装标题、52%／43%／5%、155 GSM、HY254955 保留。
- Local PHP CLI 启动有现存 Imagick 扩展加载警告，未阻断建页与输出；本轮素材通过独立视频／图片工具准备，不修改 PHP 环境。

**Finding outcome：`local-page-review-pending / video-owner-approved`。生产发布仍未执行。**

## 同日文案修正：直接面向客户

- 所有者审核 `buyer` 的用法后授权修改。目标为两款产品详情，搜索意图仍是具体样品、材料与开发参考。
- 证据：原套装说明 `your buyer's brief` 容易被理解为读者的客户提出的需求；展示页直接与采购方交流，使用 `your product brief` 更清楚。
- 主要变量：共享标题改为 `Build around your product brief`；两款的尺寸表、颜色参考、吊牌及目标 GSM 表述统一使用 `your`。
- 风险：仅调整称谓，不改变实物规格、能力条件、URL、SEO metadata 或媒体。技术文章等其它页面不在本次替换范围。
- 验收标准：两款 Local 页显示新标题及相应文案，Development options 不残留 `buyer`，PHP 语法检查通过。
- 验收结果：两款 Local 页面 HTTP 200，Development options 显示新标题及称谓，`buyer` 残留为 0；两个 PHP 文件语法检查及独立文案 diff 审阅通过。
- Finding outcome：`copy-revised / local-verified`。措辞修改已授权，整页与生产发布状态沿用上方记录。
- 本次增量部署文件仅 `inc/product-example-data.php` 与 `templates/product-example.php`；没有新增媒体或数据库步骤。整个展示库第一次上线仍须按完整发布清单执行。

## 审核入口与部署

- [本地新产品页](http://myathletik-rebuild-02.local/product-showcase/mens-merino-tencel-mesh-long-sleeve-shirt/)
- [本地展示库](http://myathletik-rebuild-02.local/product-showcase/)

本轮改动的主题文件：

```text
inc/product-example-data.php
templates/product-example.php
template-parts/product-showcase/entry.php
assets/js/product-showcase.js
style.css
```

发布时另上传上述媒体表的 10 个文件，并显式创建 WordPress 页面。当前整个 Product Showcase 尚未生产部署，因此不能只上传本轮差异文件；第一次发布须使用[完整发布清单](product-showcase-release-candidate-2026-11-03.md)，包含原功能、两款媒体和三个 WordPress 页面。

代码提交／推送与 Local 页面的 publish 状态都不表示生产部署。未修改生产、GSC 或外部平台，也不提前宣称 SEO 增长。
