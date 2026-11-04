# Sportswear 与 Merino Wool 产品图集视觉统一

日期：2026-11-04。状态：`local-verified / owner-review-pending`。所有者要求按 Merino Wool 图集标准统一截图中的两个区块；本轮仅本地开发，未获生产上线授权。

## 范围与实现

- **页面／意图**：`/sportswear-manufacturer/` 的 Product Examples 图集，参考 `/merino-wool-manufacturer/` 同一区块；改善产品浏览一致性，不调整页面搜索意图、URL、章节顺序或 SEO 设置。
- **差异证据**：修改前1440px视口下，两页卡片同宽270px，但 Sportswear 图片框268×335px，Merino 为268×268px。Sportswear 额外使用 `portrait` 覆盖及14个常驻放大镜装饰。
- **主要变量**：取消 Sportswear 的竖图比例覆盖，复用现有 Merino 方形图片框与 `object-fit: contain`；图片完整显示、不裁切、不修改原始媒体。沿用现有列数、间距、配色、圆角、标题条和翻页按钮，不增加设计 token。
- **控件**：移除常驻放大镜图标，保留整张图片链接、放大光标、屏幕阅读器提示及键盘焦点；原有点击大图、拖动、箭头和键盘翻页均保留。
- **内容边界**：Sportswear 14张、Merino 16张图片及各自标题、导语、操作提示、产品名和 alt 均保留。Merino 本身不改，不为凑齐导语新增正文或留白。手机长标题可自然换行，不强行等高裁切文字。
- **风险与验收标准**：共享模板不得影响其他产品页；Merino 图集的前后布局应一致，Sportswear 图片框应改为正方形。检查两页360／768／1024／1440px、全部图片加载、翻页与拖动、Sportswear 大图键盘操作及无 JavaScript 降级。

## 本地验收

- 两份 PHP 语法与 `git diff --check` 通过。Chrome LocalWP 独立回归9场景通过：两页各360／768／1024／1440px，加 Sportswear 无 JavaScript 降级。
- 1440px Sportswear 图片框由268×335变为268×268px，卡片高度由387.89降为320.89px，与 Merino 一致；两页同宽视口下均使用相同方形图片框。小屏标题按原文自然换行，因此总卡高不强行相等。
- Merino 四种宽度的前后截图 SHA-256 完全一致；Sportswear 14张及 Merino 16张图片均成功解码，全部标题、提示、alt、图片路径和顺序保持不变。无页面 JS 错误或横向溢出。
- 两页上一组／下一组、方向键和鼠标拖动正常；Sportswear 拖动不误开大图。整图链接键盘焦点可见，Enter 打开、弹层方向键、Escape／关闭／背景关闭与焦点恢复通过，无 JavaScript 原图直链 HTTP 200。
- 前后证据位于忽略目录 `.chrome-check/gallery-alignment-before-independent.json`、`.chrome-check/gallery-alignment-after-independent.json` 及同前缀截图；已目视桌面与手机效果。未提交询盘、未连接生产。
- **Finding outcome**：本地视觉统一及交互回归完成，待所有者审核；本轮没有新增图片、重裁切或改动 Merino 基准样式。

## 待审核部署清单

```text
style.css
inc/product-category-data.php
template-parts/product-category/page.php
```

无媒体或数据库操作，现有轮播与大图脚本无需更新。内部记录不上传生产；所有者审核本地效果并确认上线后，再按 SSH 部署流程发布这三个文件。
