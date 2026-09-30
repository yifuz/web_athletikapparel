# SEO-V2-018 — Sportswear 商业适配与产品证据关闭记录

实施日期：2026-09-19～2026-09-22

正式关闭日期：2026-09-30

状态：`completed / production-verified / measuring`

实施 Finding outcome：`changed / keep`

SERP Finding outcome：`research-complete / no-change`

## 目标与证据

- 目标页面：`/sportswear-manufacturer/`；主要市场为北美与欧洲。
- 搜索意图：寻找可按规格开发与生产 sportswear 的 OEM / ODM 供应商。页面任务是让采购者快速核对 Athletik 的实际产品范围，并进入询盘。
- 证据：所有者指定 15 张真实产品照片，并确认 `IMG_4011.jpg` 取 Outdoor 灰色风帽衫、`IMG_4244.jpg` 取 Outdoor 骑行衣；随后明确要求删除骑行套装，保留其余图片原有标识，加入点击放大。最终采用 14 张。照片是产品展示证据，不等于已验证任何性能测试、客户关系或搜索排名收益。

## 主要变量、边界与风险

- 主要变量：Sportswear 页新增真实产品 lookbook；首屏 8 张，两排横向滚动，支持拖动、按钮和键盘浏览，点击图片进入放大查看器。放大查看是同一图片展示组件的交互，不单独归因 SEO 效果。
- 14 张照片分别提供 `480×600` WebP、`800×1000` WebP 与 `800×1000` JPG 后备，总计 42 个文件，均位于 `wp-content/uploads/myathletik-theme/assets/images/sportswear/lookbook/`；原始素材未改动，骑行套装的 3 个本地派生文件已删除。
- 风险：新增图片请求与页面体积、横向滚动和点击手势冲突、手机端弹窗溢出，以及部分原图可见 BTEXCO 标识。所有者明确决定不额外处理标识；页面文案、链接和结构化数据均不陈述 Athletik 与 Beta Textiles 的公开关系。
- 不改变：URL、Title、Meta、H1、Canonical、Schema、现有正文与其他六个品类的图片展示。

## 本地验收

- 已通过：Sportswear 本地 HTTP 200、单一 H1、14 个 lookbook 卡片与 14 个放大入口；骑行套装不再被引用。Merino 保持 16 个卡片且没有放大脚本，Underwear 没有新增展示。
- 已通过：42/42 图片尺寸与本地 HTTP 200；PHP 与 JS 语法检查；桌面和 390px 手机弹窗视觉、放大图载入、上一张/下一张、键盘方向键、关闭后焦点回到原图。
- 2026-09-22 真实指针复验纠正：首轮使用程序触发的 `.click()`，未覆盖真实鼠标事件。随后复现原画廊脚本在 `pointerdown` 即 `setPointerCapture`，令 `pointerup` / `click` 落到画廊 `DIV` 而非图片链接。共享画廊脚本改为鼠标移动超过 6px 才接管指针；修复后 Sportswear 真实鼠标点击可打开第 1/14 张，桌面拖动可滚动且不误开放大层，390px 触控点击可放大，Merino 原有画廊拖动仍正常。此前“真实鼠标点击已通过”的验收含义以本次复验为准。

## 生产验收与索引状态（2026-09-30）

- 生产页 HTTP 200、可索引、自引用 Canonical、单一 `Sportswear Manufacturer` H1；Title、Meta、Canonical 与 Schema 均保持既有核准值。页面审计为 0 issues / 0 recommendations，JSON-LD 可解析，无 mixed content。
- Program model 三条合作路径和 Sportswear lookbook 均已上线；14 个放大入口完整，42/42 个 `480.webp`、`800.webp`、`800.jpg` 派生资源均返回 HTTP 200 且 MIME 正确。
- 真实浏览器桌面验收通过：点击打开第 1/14 张、Next 切换至第 2/14 张、Escape 关闭并将焦点归还触发图。390×844 手机视口无横向溢出。
- 其他六个品类页均为 HTTP 200，未出现 Sportswear Program model、lookbook 或 lightbox 脚本；Page Sitemap 为 HTTP 200，规范 URL 仅出现一次。
- GSC URL Inspection 为 `PASS / Submitted and indexed`，索引允许、抓取成功，Google Canonical 与用户 Canonical 一致；最后抓取时间为 `2026-09-22T08:21:22Z`。索引请求与当前收录状态分开记录，不把收录归因于单次请求，也不重复提交。

## SERP 研究关闭结论

- 已完成 `OEM activewear manufacturer`、`sportswear OEM manufacturer`、`private label sportswear manufacturer`、`technical sportswear manufacturer`、`performance apparel manufacturer` 在 US / GB / CA 的 15 组 Google Desktop English depth-20 快照；最终快照全部完整。
- `OEM activewear manufacturer` 是五词中与现有 Sportswear 页最匹配的支持性商业词；`sportswear OEM manufacturer` 可作为次级表达；`private label sportswear manufacturer` 混入 startup、low-MOQ、teamwear 与现货意图，只保留支持性语言及“不做 ready-stock”边界。
- `technical sportswear manufacturer` 意图不稳定；`performance apparel manufacturer` 继续由首页承接。Athletik 未出现在本轮 15 组 depth-20 结果中，但单次快照不等于长期排名结论。
- 不修改 Sportswear 的 URL、Title、Meta、H1 或页面所有权，不建立近义平行页；teamwear 保持“可承接但不主动获客”的业务边界。

## 关闭处置与重开条件

- SEO-V2-018 的部署记录正式关闭为 `completed / production-verified / measuring`；实施保留为 `changed / keep`，SERP 研究为 `research-complete / no-change`。
- 后续只进入常规 28 / 90 天 GSC、GA4 与有效询盘观察，不使用低样本波动证明本次模块或图片提升了曝光、排名或询盘。
- 仅在以下条件之一出现时重开：状态码、indexability 或 Canonical 回归；生产 lightbox / 图片资源失败；达到项目门槛的相关 GSC Query 支持新的单变量测试；合格询盘证据显示采购意图与页面表述不匹配。
- 本关闭记录只更新内部 Markdown；生产代码与 uploads 图片已经部署并验收，无需再次部署。
