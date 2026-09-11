# 全站链接下划线渲染修复 Change Card

> 建立日期：2026-09-10  
> 当前状态：`fixed / production-verified`

## 目标页面与搜索意图

- 目标：规范站全部前端页面中使用原生 `text-decoration` 的文字链接。
- 搜索与采购意图：不改变关键词所有权或页面主题；提高正文、技术指南、联系信息与采购 CTA 的可读性和交互识别。

## 证据

所有者在 100% 浏览器缩放下观察到多个链接的下划线在字母下伸部附近产生割裂，而 90% 或 110% 下表现不同。该现象符合浏览器默认 `text-decoration-skip-ink: auto` 在不同子像素取整下避让字形的渲染行为，并非链接文本、HTML 空格或 URL 错误。

## 主要变量

- 全站锚点统一设置 `text-decoration-skip-ink: none`，关闭字形避让，让原生下划线连续穿过字母下伸部；
- 不给所有链接改用 `border-bottom`，避免破坏多行正文链接、按钮、导航及 inline child 布局；
- 已使用 `text-decoration: none` 的按钮、卡片和导航不受影响；Merino 当前合并后的 outline button CTA 同样不受影响。

保持不变：链接文字、URL、Title、Meta、H1、Canonical、Schema、颜色、粗细、offset、hover/focus 行为和页面内容。

## 风险与控制

- 下划线会穿过 `g`、`p`、`y` 等字母下伸部：这是换取连续线条的预期视觉结果；
- 全站选择器范围较广：该属性只影响实际使用原生文字下划线的链接，不会为按钮或无下划线链接新增装饰；
- 不以该视觉修复声称排名收益，并通过代表性页面和不同 viewport 检查布局回归。

## 验收标准

- [x] CSS 语法边界与 `git diff --check` 通过；
- [x] 代表性文字链接的 computed `text-decoration-skip-ink` 为 `none`；
- [x] 原有 `text-decoration: none` 的按钮、卡片与导航保持无下划线；
- [ ] 所有者在 Desktop 90% / 100% / 110% 缩放下完成视觉审核；
- [x] 生产抽查首页、Contact、Merino 品类页和 QC Technical Guide；共 39 个原生下划线链接的 computed `text-decoration-skip-ink` 均为 `none`，四页无横向溢出。

## Finding outcome

当前 outcome：`fixed / production-verified`。浏览器计算样式与代表性页面布局已通过；所有者完成 90% / 100% / 110% 主观视觉复核后转为 `fixed / keep`。
