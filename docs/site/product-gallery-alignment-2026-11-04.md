# Sportswear 与 Merino Wool 产品图集视觉统一

日期：2026-11-04。状态：`local-verified / owner-review-pending`。所有者先要求按 Merino Wool 图集标准统一，随后明确：照片宽度不必相同、尽量不要白边、Sportswear 做成一行四列，以及 Merino Wool 也加入点击放大。当前采用 Sportswear 单排竖幅和两页共享大图查看的第二版；两版均仅本地开发，未获生产上线授权。

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
- **Finding outcome**：所有本轮授权事项完成，本地审核待确认；未修改媒体、提交询盘或部署生产。

## 待审核部署清单

```text
style.css
inc/product-category-data.php
template-parts/product-category/page.php
functions.php
assets/js/product-showcase-lightbox.js
```

以上五份代码为两版累计相对生产的完整清单；必须同时更新模板、样式、数据、加载函数及大图脚本。无媒体或数据库操作，轮播脚本无需更新。内部记录不上传生产；所有者审核本地效果并确认上线后，再按 SSH 部署流程发布。
