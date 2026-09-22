# SEO-V2-018 — Sportswear lookbook 图片证据

日期：2026-09-22
状态：`implemented / local-verified / deployment-pending`
Finding outcome：`changed / owner-directed / production-pending`

## 目标与证据

- 目标页面：`/sportswear-manufacturer/`；主要市场为北美与欧洲。
- 搜索意图：寻找可按规格开发与生产 sportswear 的 OEM / ODM 供应商。页面任务是让采购者快速核对 Athletik 的实际产品范围，并进入询盘。
- 证据：所有者指定 15 张真实产品照片，并确认 `IMG_4011.jpg` 取 Outdoor 灰色风帽衫、`IMG_4244.jpg` 取 Outdoor 骑行衣；随后明确要求删除骑行套装，保留其余图片原有标识，加入点击放大。最终采用 14 张。照片是产品展示证据，不等于已验证任何性能测试、客户关系或搜索排名收益。

## 主要变量、边界与风险

- 主要变量：Sportswear 页新增真实产品 lookbook；首屏 8 张，两排横向滚动，支持拖动、按钮和键盘浏览，点击图片进入放大查看器。放大查看是同一图片展示组件的交互，不单独归因 SEO 效果。
- 14 张照片分别提供 `480×600` WebP、`800×1000` WebP 与 `800×1000` JPG 后备，总计 42 个文件，均位于 `wp-content/uploads/myathletik-theme/assets/images/sportswear/lookbook/`；原始素材未改动，骑行套装的 3 个本地派生文件已删除。
- 风险：新增图片请求与页面体积、横向滚动和点击手势冲突、手机端弹窗溢出，以及部分原图可见 BTEXCO 标识。所有者明确决定不额外处理标识；页面文案、链接和结构化数据均不陈述 Athletik 与 Beta Textiles 的公开关系。
- 不改变：URL、Title、Meta、H1、Canonical、Schema、现有正文与其他六个品类的图片展示。

## 本地验收与生产门槛

- 已通过：Sportswear 本地 HTTP 200、单一 H1、14 个 lookbook 卡片与 14 个放大入口；骑行套装不再被引用。Merino 保持 16 个卡片且没有放大脚本，Underwear 没有新增展示。
- 已通过：42/42 图片尺寸与本地 HTTP 200；PHP 与 JS 语法检查；桌面和 390px 手机弹窗视觉、放大图载入、上一张/下一张、键盘方向键、关闭后焦点回到原图。
- 2026-09-22 真实指针复验纠正：首轮使用程序触发的 `.click()`，未覆盖真实鼠标事件。随后复现原画廊脚本在 `pointerdown` 即 `setPointerCapture`，令 `pointerup` / `click` 落到画廊 `DIV` 而非图片链接。共享画廊脚本改为鼠标移动超过 6px 才接管指针；修复后 Sportswear 真实鼠标点击可打开第 1/14 张，桌面拖动可滚动且不误开放大层，390px 触控点击可放大，Merino 原有画廊拖动仍正常。此前“真实鼠标点击已通过”的验收含义以本次复验为准。
- 生产验收：同步五个主题代码文件与 uploads 中的 42 个图片文件后，复查 Sportswear 200、单一 H1、Title/Meta/Canonical 未变、14/14 图像可访问、Desktop/Mobile 无横向溢出、弹窗与手势正常；确认其他六个品类无新增 lookbook/lightbox；再做定向 Crawl Diff。未完成前不得写成生产已验收。
- 观察：本次为采购核验体验改进，不用低样本 GSC 波动证明图片带来曝光或排名提升；随 SEO-V2-018 的后续窗口观察页面曝光、自然点击与有效询盘。
