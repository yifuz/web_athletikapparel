# Sportswear 与 Merino Wool 产品图集视觉统一

日期：2026-11-04；部署更新：2026-11-05。状态：`deployed / production-verified`。所有者先要求按 Merino Wool 图集标准统一，随后明确：照片宽度不必相同、尽量不要白边、Sportswear 做成一行四列，以及 Merino Wool 也加入点击放大。第二版已获所有者“部署”授权，采用 Sportswear 单排竖幅和两页共享大图查看；实际发布记录见末节。

## 范围与实现

- **页面／意图**：`/sportswear-manufacturer/` 与 `/merino-wool-manufacturer/` 的 Product Examples 图集；改善产品浏览一致性并支持大图查看，不调整页面搜索意图、URL、章节顺序或 SEO 设置。
- **差异证据**：修改前1440px视口下，两页卡片同宽270px，但 Sportswear 图片框268×335px，Merino 为268×268px。Sportswear 额外使用 `portrait` 覆盖及14个常驻放大镜装饰。
- **主要变量（第二版）**：Sportswear 使用独立 `ma-product-showcase--lookbook` 样式，图片框由第一版正方形改为2:3，使用居中的 `object-fit: cover`。按最终要求改为单排水平轮播：768px起四列，手机两列，不再使用中途试排的五列／双排方案。Merino 保留原有两排、桌面四列／手机两列和方形图片框。
- **白边证据与处理边界**：逐张只读扫描14张800×1000 JPG的完整像素列，左右近纯白留边（RGB均≥248）各至少64px，多数为66／67px；两张白底抠图的白区更宽。2:3显示框取画布中间约666.7×1000区域，去除两侧约66.7px留边，只涉及白边及最多约3px的近白压缩边缘，完整保留照片高度及人物，不用4:5框直接放大而截掉头脚。只改变CSS取景，原图文件和大图查看不变；画面本身的白色摄影背景仍保留。中途4:5试排不是最终交付。
- **设计与资源**：新增 `--ma-lookbook-image-ratio`、`--ma-lookbook-columns`、`--ma-lookbook-gap`，间距继续引用现有 spacing token；沿用相同配色、圆角、标题条和翻页按钮。Sportswear 的 `picture sizes` 同步列宽，Merino 的尺寸提示不变。
- **控件**：两页均无常驻放大镜图标，保留整张图片链接、放大光标、屏幕阅读器提示及键盘焦点。为 Merino 开启现有共享大图脚本，支持前后切图、方向键、Escape／关闭按钮／背景关闭及焦点恢复；弹窗名称使用当前图集标题，图片尺寸按各张原始宽高设置，不把 Merino 方图按 Sportswear 竖图处理。函数名同步改为类别通用名，仅两页加载脚本。
- **首尾焦点修复**：回归实测原大图查看器点击下一张到14／14后，禁用按钮使 `activeElement` 变为 `BODY`，方向键不再进入弹窗。现记录禁用前焦点，并在首／末按钮禁用时移至仍可用的反向按钮（无可用导航时移到关闭按钮），保持键盘操作连续；两页共用该修复。
- **内容边界**：Sportswear 14张、Merino 16张图片及各自标题、导语、产品名和 alt 保留；Merino 操作提示按新增功能显示“Select a photo to enlarge it.”。不为凑齐导语新增正文或留白，手机长标题自然换行，不强行等高裁切文字。
- **风险与验收标准**：共享模板不得影响其他产品页；Merino 图卡几何与两排行列布局保持，Sportswear 为单排2:3并去除侧边留白、不裁切人物。检查两页360／768／1024／1440px及列数断点，全部图片加载、最后一组可达、翻页与拖动、两页大图键盘操作及无 JavaScript 降级。新增提示允许 Merino 工具栏自然增高，不再以整区截图完全一致作为最终要求。

## 第一版方形方案验收（历史）

- 两份 PHP 语法与 `git diff --check` 通过。Chrome LocalWP 独立回归9场景通过：两页各360／768／1024／1440px，加 Sportswear 无 JavaScript 降级。
- 1440px Sportswear 图片框由268×335变为268×268px，卡片高度由387.89降为320.89px，与 Merino 一致；两页同宽视口下均使用相同方形图片框。小屏标题按原文自然换行，因此总卡高不强行相等。
- Merino 四种宽度的前后截图 SHA-256 完全一致；Sportswear 14张及 Merino 16张图片均成功解码，全部标题、提示、alt、图片路径和顺序保持不变。无页面 JS 错误或横向溢出。
- 两页上一组／下一组、方向键和鼠标拖动正常；Sportswear 拖动不误开大图。整图链接键盘焦点可见，Enter 打开、弹层方向键、Escape／关闭／背景关闭与焦点恢复通过，无 JavaScript 原图直链 HTTP 200。
- 前后证据位于忽略目录 `.chrome-check/gallery-alignment-before-independent.json`、`.chrome-check/gallery-alignment-after-independent.json` 及同前缀截图；已目视桌面与手机效果。未提交询盘、未连接生产。
- **当时结果**：方形方案本地验证通过；所有者随后要求放宽尺寸一致性，已由本记录中的第二版替代。没有新增图片、重裁切或改动 Merino 基准样式。

## 第二版窄幅方案验收

- 三份 PHP 语法、共享大图 JavaScript 语法及 `git diff --check` 通过。
- 最终独立验收12场景通过：两页各360／768／1024／1440px、两页无 JavaScript 降级，以及两页844×390横屏弹窗检查。没有页面 JS 错误或横向溢出。
- Sportswear 为单排，桌面四列／手机两列；1440px 卡宽270px、图片框268×402px。14张原图、标题及alt均保留，最后一组可达；固定视口截图前后 `scrollLeft` 均为最大值2940，末张与轨道右边对齐、下一组按钮禁用，排除动画中途截图。
- 黑底第11／12／13张480×600 WebP逐列扫描确认左右各40px纯白，2:3取景恰好移除每侧40px；已目视首组与末组，没有额外白边，原有摄影背景和构图不作重绘。
- Merino 原有图卡几何、方形比例、两排行列与16张图片数据保持不变，仅增加操作提示和整图点击入口。两页在四种宽度逐张遍历全部14／16张大图，解码成功、alt／caption正确、原比例保持。
- 轮播按钮、方向键、拖动不误开弹层、Enter打开、弹层前后按钮／方向键、Escape／关闭按钮／背景关闭及焦点恢复均通过。首末按钮禁用后的方向键测试不依赖人工重置焦点，修复确认有效。
- 两页无 JavaScript 时仍提供可访问的原图链接；横屏弹窗608×358px、关闭按钮初始位于视口内，允许内部纵向滚动，关闭可达且焦点恢复正常。
- 最终证据：`.chrome-check/gallery-alignment-dual-independent.json`、`.chrome-check/gallery-alignment-dual-last-evidence.json` 及同前缀截图。`portrait`、`trim` 等中途双排试排结果不是最终交付证据；旧中途末组截图不得代替最终稳定视口截图。
- **当时 Finding outcome**：本地实现与验证完成，待所有者审核；当时未修改媒体、提交询盘或部署生产。2026-11-05 的上线授权及验收另记于末节。

## 已批准的部署清单

```text
style.css
inc/product-category-data.php
template-parts/product-category/page.php
functions.php
assets/js/product-showcase-lightbox.js
```

以上五份代码为两版累计相对生产的完整清单；必须同时更新模板、样式、数据、加载函数及大图脚本。无媒体或数据库操作，轮播脚本无需更新。内部记录不上传生产。

## 2026-11-05 SSH 生产发布

- **授权与版本**：所有者在本对话明确要求“部署”；固定 `main` 上已推送的 `1638b93d9f5a51a449d290b8e2b178e19b8ef655`，包含前一提交 `b1d89eb` 的累计图集改动。没有上传工作区草稿或内部文档。
- **生产预检**：规范站、`production` 环境、活动主题 `myathletik-child`、主题 `/www/wp-content/themes/myathletik-child` 与 uploads `/www/wp-content/uploads` 均匹配。五份原文件按换行归一后与上一批生产版本 `1a0065a` 一致，没有未知线上独立改动。
- **私有备份**：`C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-05-1638b93-20261105T010435Z\`，包含五份原始字节文件及 manifest。原始 SHA-256、权限、大小与备份内容已逐项核对，不将备份放入 Git 或公开目录。
- **实际执行**：北京时间09:05，按 CSS → 共享大图 JS → functions → 类目模板 → 类目数据的顺序激活五份文件。全部文件先同目录暂存、核对大小和哈希，三份 PHP 先通过服务器语法检查，再连续替换；激活耗时27.67ms。每次替换前复核原哈希及权限，部署后五份文件均与批准提交逐字节一致，权限均保持0644。无回退、媒体上传或数据库修改。

| 实际上传文件 | 字节数 | 生产 SHA-256 |
|---|---:|---|
| `style.css` | 171832 | `85d702fb46696b79ebec657d6d510294de71d99ad5c4a9bbdf9a0fcdaed368a7` |
| `assets/js/product-showcase-lightbox.js` | 5636 | `dbe32be000838d07375ed55e033b2eb9110d691808e4affd20a24a9d8b845b8f` |
| `functions.php` | 51997 | `497f52ce7969a84b81bb49b7551d5328798874c35d0270a666af57fb46e56d10` |
| `template-parts/product-category/page.php` | 32581 | `717282443d89282dcb057d853b13b33acc07a4d0cb05000676d2310049cf9fa5` |
| `inc/product-category-data.php` | 132205 | `34730e1f3f8f49304583590fe0ae4b8f15f58554be791712979fee98bd0845ac` |

### 缓存处置与普通 URL 复核

- 初次浏览器验收及时阻止误报通过：Sportswear 普通 URL 的 HTML 仍引用 `style.css?ver=1793782137`，公开 CSS 命中旧哈希 `39c8d162…`；相同 HTML 的共享 JS 已为新版本。SSH 文件哈希及 PHP `filemtime()` 均正确为新版本，不以“文件已上传”替代浏览器验收。
- Chrome 普通／无头 UA 均观察到 Flywheel/Fastly HTML `x-cache: MISS,HIT`；PowerShell 部分请求已返回新引用。不同请求结果不能用于推定所有访客缓存已更新；没有用加参数预览或强制请求头冒充普通 URL 通过。
- 只读核对平台机制后，没有将标准 `wp cache flush` 误当作页面/CDN刷新，也没有伪造 `FW_EVENT`、触发 `save_post` 或创建公开清缓存接口。平台 [Smart Refresh](https://getflywheel.com/wordpress-support/what-is-smart-refresh/) 与[后台 Flush Cache](https://getflywheel.com/wordpress-support/how-do-i-clear-my-cache/) 是不同入口；官方默认 HTML [缓存期限为90分钟](https://getflywheel.com/wordpress-support/flycache-default-path-exclusions-and-cache-expiration-times/)，不能假设几分钟自动更新。
- 所有者选择在 Flywheel 后台刷新缓存。随后北京时间09:17的全新 Chrome 会话经普通 URL 验证：首页和七个产品页均 HTTP 200、各一个 H1、无文档横向溢出；Sportswear／Merino 分别有14／16个大图入口，其余五类目没有误加大图入口。页面实际引用的 CSS、共享大图 JS 以及未修改的轮播 JS 均与批准提交逐字节一致。
- **最终图集验收**：独立 Chrome 测试12/12场景通过，均使用普通正式 URL、无缓存旁路参数：两页各360／768／1024／1440px、两页无 JavaScript 降级、两页844×390横屏。Sportswear 为单排四列／手机两列，Merino 保持两排四列／手机两列；两页全部14／16张大图逐张解码、alt与caption、原图比例、翻页／拖动、Enter打开、首末方向键焦点、Escape／关闭按钮／背景关闭和焦点恢复均通过。
- **目视与末组证据**：已查看正式站 Sportswear 首组／末组及 Merino 手机弹窗截图；Sportswear 1440px末组截图前后 `scrollLeft=max=2940`，最后卡片与轨道右边缘均为1296，下一组按钮禁用。三个黑底480px WebP均确认左右40px白边被2:3显示框去除，没有重写媒体。横屏弹窗608×358px，关闭按钮可达、内部可滚动。
- **已知独立问题**：最终八个带 JavaScript 的响应式场景均记录到既有 Cloudflare Turnstile 的 `Remove async/defer from the Turnstile api.js script tag before using turnstile.ready()` 错误，与上一批生产记录一致；本批没有修改该脚本或表单。测试只将这条精确已知错误单独记录，其他 JS 错误仍视为失败，未发现其他错误；未提交真实询盘，不将图集通过表述为全站表单或全站零错误验收。
- **Finding outcome**：批准的五文件发布、备份、公开资源一致性及两页图集生产验收全部完成；没有本轮未完成项。Turnstile 属独立既有问题，不因本次部署而扩大修复范围。网站代码提交已推送，发布记录提交随后同步推送；内部记录不上传生产。
- **证据**：私有备份 manifest；忽略目录 `.chrome-check/gallery-deploy-manifest-20261105.json`、`gallery-production-smoke-20261105.json`、`gallery-production-cache-observations.json`、`gallery-production-final-dual-independent.json`、`gallery-production-final-dual-last-evidence.json` 及最终同前缀截图。初次旧缓存失败和缓存旁路诊断证据保留，与最终普通 URL 结果区分。
