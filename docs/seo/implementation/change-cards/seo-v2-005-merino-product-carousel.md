# SEO-V2-005 Merino Wool 产品轨道 Change Card

> 建立日期：2026-09-10  
> 当前状态：`changed / owner-review`

## 目标页面与买家任务

- 页面：`https://www.athletikapparel.com/merino-wool-manufacturer/`
- 区块：`Merino wool product programs`
- 搜索与采购意图：验证 Athletik 可开发的 Merino wool base layers、thermal tops、performance bottoms、women's base layers 与 mid-layers，不依靠抽象能力说明完成判断
- 业务动作：浏览更多真实产品形式后进入采购讨论

## 证据与触发条件

所有者于 2026-09-10 指定从 `D:\C-网站素材\merino wool product\羊毛立体照片-2025.4.18` 增加真实产品图，并要求首屏保持现有 8 张密度、可拖动查看更多。源目录包含 67 张 4000 × 4000 JPG，现有页面只选用了其中 8 个产品方向。

本次从源目录补选 8 个不重复的正面产品形式：printed crew base layer、blue half-zip thermal top、two-tone hooded base layer、performance base-layer bottom、jogger bottom、women's V-neck base layer、women's turtleneck base layer、full-zip hooded mid-layer。图片中的既有 logo 按所有者此前指示不作为排除条件，但公开 alt 和 caption 不写客户或第三方品牌名。

## 主要变量

唯一主要变量是把既有 8 图静态网格扩展为 16 图产品轨道：

- Desktop 首屏继续显示 4 × 2 共 8 张；Mobile 显示 2 × 2 共 4 张，避免卡片过小；
- 支持鼠标拖动、触屏原生横向滑动、左右方向键和可访问的前后按钮；
- 新增图片继续使用 480 / 800 WebP、800 JPG fallback、固定 800 × 800 尺寸、`srcset` / `sizes`、lazy loading、async decoding 与语义化 caption；
- JavaScript 只在 `/merino-wool-manufacturer/` 加载；无 JavaScript 时仍可通过原生横向滚动查看。

保持不变：URL、Title、Meta、H1、Canonical、Schema 类型、Hero、首批 8 张图片、其他品类页面和图片。

## 风险与控制

- 图片数量增加导致负载增长：不部署 4000 × 4000 原图；新增 480 WebP 合计约 76 KB、800 WebP 合计约 235 KB、800 JPG 仅作 fallback，全部首屏以下 lazy-load；
- 横向轨道隐藏内容：保留说明文字、可见箭头、原生滚动条和键盘焦点；
- 鼠标拖动触发图片原生拖拽：轨道图片设置 `draggable=false`，脚本同时阻止 `dragstart`；
- 触屏操作影响页面纵向滚动：触屏不进入自定义 pointer drag，使用浏览器原生滚动；
- 共享模板或脚本影响其他页面：只有图片数大于 8 的数据集输出 carousel markup，脚本只在 Merino URL enqueue；
- 与排名实验混合归因：本项属于 B 类采购验证与视觉证据增强，不改变元数据，不单独声称排名收益。

## 验收标准

### 本地

- [x] PHP 8.2、JavaScript 语法与 `git diff --check` 通过；
- [x] 页面 HTTP 200、单一 H1、16 张 figure、carousel markup、两个控制按钮和专属脚本完整；
- [x] 新增 24 个响应式图片资源均可访问，单个文件小于 200 KB；
- [x] 1440px 实际浏览器轨道 `clientWidth=1152`、`scrollWidth=2328`，首屏显示 8 张；真实鼠标拖动后 `scrollLeft` 从 0 变为 294，Previous 按钮进入可用状态；
- [x] 390px 实际浏览器为两列双排、页面无横向溢出；箭头可从 `scrollLeft=0` 移动至终点 `1074`，终点 Previous / Next 状态分别为 enabled / disabled；
- [ ] 所有者完成 Desktop / Mobile 视觉与交互审核。

### 生产

- [ ] 单独部署主题代码文件与 uploads 图片文件；
- [ ] 16 张图片及全部 48 个响应式候选返回 HTTP 200 和正确 MIME；
- [ ] Desktop 首屏 8 张，Mobile 2 × 2，鼠标、触屏、键盘和按钮均可查看剩余图片；
- [ ] 页面无横向溢出、CLS、控制台错误或其他品类回归；
- [ ] 部署后 Crawl / HTML / URL Inspection 无 indexability 回归。

## Finding outcome

当前 outcome：`changed / owner-review`。完成生产验收后转为 `changed / measuring`；该变更按采购验证与页面互动观察，不与 Title / Meta 排名实验混合归因。
