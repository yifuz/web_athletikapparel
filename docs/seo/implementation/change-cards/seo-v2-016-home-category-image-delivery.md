# SEO Change Card：SEO-V2-016 首页类目卡图片交付

- Change ID：`SEO-V2-016-HOME-CATEGORY-IMAGES`
- 状态：`fixed / keep`
- 变更日期：2026-09-19
- 变更页面或分组：`/` 的 `What we make`；仅 Merino Wool 与 Knitted Fabrics 两张类目卡
- 搜索与采购意图：保持首页产品品类发现和对应采购入口，不改变品类名称、链接、替代文字或页面所有权
- 证据来源与数据状态：SEO-V2-004 部署后三次 Lighthouse 13.4.1 移动 Lab 均重复提示图片交付浪费；其中 `cat-merino-960-lossless.webp` 为约 782 KB，`cat-knitted-fabrics-1200-q100.webp` 为约 285 KB。当前 Merino 最小 640w 候选仍约 314 KB，Knitted Fabrics 在 640w 与 1200w 之间没有候选
- 唯一主要变量：保留同一源图、构图、裁切与显示尺寸，只把两张首页卡片的 responsive WebP 候选改为 q80 的 480 / 640 / 960 / 原尺寸梯度
- 业务假设：减少首页滚动到类目区时的图片传输与解码负担，尤其避免高 DPR 移动端直接选择过重的 960w / 1200w 文件；不把结果归因到 Hero、Cookiebot 或 jQuery
- 主要指标：生产浏览器实际选中候选及 transferred size；同条件移动 Lighthouse 的 image delivery savings 与页面 LCP / TBT
- 防护指标：HTTP 200、单一 H1、CLS、卡片构图、文字可读性、链接、alt、Desktop/Mobile 清晰度和 7 张卡片布局不变
- 基线窗口：2026-09-19 部署前；Merino 640 / 960 / 1280 分别约 314 / 782 / 1502 KB，Knitted Fabrics 640 / 1200 分别约 82 / 285 KB
- 干扰因素：Cloudflare 缓存、设备 DPR、视口宽度、浏览器候选选择、网络与 Lighthouse 波动
- 部署前 Crawl / Lab：Crawl Diff Run `2b028751-ef61-4650-bb49-f2c54e2f2b36`；SEO-V2-004 部署后三次移动 Lab
- 部署后 Crawl Diff Run ID：`df1f29f4-a015-4f02-977a-be091a16605b`（25 个 URL；0 added / removed / changed / new errors / indexability flips）
- Finding / Inventory 处置：本批次 Merino / Knitted Fabrics 的 image delivery 子项为 `fixed / keep`：两张图均从三次部署后报告的重复证据中消失，三轮估算图片浪费由部署前约 2,339 KiB 稳定降至 1,379 KiB，减少约 960 KiB（41%）。页面级 LCP Finding `action-1a2a7aafa456` 仍为 `deferred`，因为 LCP 节点仍是 Hero poster，剩余渲染阻塞与其他类目图不属于本次变量
- 最终决策及原因：`fixed / keep`。生产 HTML、8 个候选、浏览器实际选图和 Desktop / Mobile 视觉均通过；目标图片传输显著减少且无 CLS、状态码或 indexability 回归。LCP 中位数从 4.566s 变为 4.494s，仅减少约 72ms（1.6%），属于 Lab 波动，不能作为提速结论，也不影响保留本次图片优化

## 实施内容

### Merino Wool

- 新增 480 / 640 / 960 / 1280w q80 WebP，文件约 7.1 / 10.5 / 18.6 / 29.7 KB；
- 原 640 / 960 / 1280w lossless WebP 保留，不删除，用于快速回滚；
- `src` 与 `srcset` 指向新候选，`sizes`、固有尺寸、lazy loading、alt、object-position 和链接不变。

### Knitted Fabrics

- 新增 480 / 640 / 960 / 1200w q80 WebP，文件约 15.5 / 26.1 / 56.2 / 89.4 KB；
- 原 640 / 1200w q100 WebP 保留，不删除，用于快速回滚；
- 补齐 480w 与 960w 中间候选；`sizes`、固有尺寸、lazy loading、alt、object-position 和链接不变。

## 风险与回滚

- q80 有损编码可能在面料纹理、黑色渐变或人像边缘出现可见压缩痕迹，因此生产验收必须覆盖 Desktop 与高 DPR Mobile；
- 若出现构图变化、肉眼可见色带/块状噪点、候选 404、整页布局变化，或同条件 Lab 无法重复降低图片交付浪费，则仅把模板中的两组路径切回原文件；
- 不删除既有 lossless / q100 文件，不修改另外五张类目卡，避免扩大变量。

## 验收标准

- [x] 8 个新 WebP 均可解码，尺寸分别为 Merino 480×720、640×960、960×1440、1280×1920，以及 Knitted Fabrics 480×266、640×356、960×532、1200×666；
- [x] 960w 新文件人工检查保持原构图、主体和可接受细节；
- [x] `template-parts/home/product-categories.php` 通过 LocalWP PHP 8.2.30 语法检查，`git diff --check` 通过；
- [ ] LocalWP 全页验收：本地域名当前返回 502，转生产部署后验证，不把 unavailable 写成通过；
- [x] 生产 8 个新 WebP 均为 HTTP 200、`image/webp`，字节数与本地文件一致；HTML 恰好包含 8 个 q80 引用，0 个旧 lossless / q100 引用；
- [x] 1440×900 Desktop 与 390×844 Mobile 截图中两张卡片构图、清晰度、文字、链接和布局无回归，页面无横向溢出；
- [x] Desktop DPR 1 实际选择 Merino 480w（约 7 KB）与 Knitted Fabrics 640w（约 26 KB）；Mobile DPR 3 选择 Merino 1280w（约 30 KB）与 Knitted Fabrics 1200w（约 89 KB）；
- [x] 三次有效移动 Lighthouse 完成：LCP 为 3.279s / 4.605s / 4.494s，中位数 4.494s；TBT 为 122ms / 127ms / 82ms，中位数 122ms；CLS 三次均为 0；score 为 83 / 69 / 70，中位数 70。一次初始 Lighthouse navigation 失败并回退为 unscored HTTP fetch，已按数据状态排除，不计入三轮 Lab；
- [x] `image-delivery-insight` 三次均为约 1,379 KiB，较部署前约 2,339 KiB 减少约 960 KiB（41%），且 Merino / Knitted Fabrics 不再进入报告的图片证据；
- [x] 首次部署后 Crawl Diff Run `de96d11b-9c86-4fad-bd61-8110589b18ff` 出现 8 个低优先级 content-hash 变化，但 0 new errors / indexability flips / high-priority recommendation；其中返回内容受输出预算限制。随即以相同范围复核，Run `df1f29f4-a015-4f02-977a-be091a16605b` 为 25 个 URL、0 added / removed / changed / new errors / indexability flips，确认没有持续技术回归；
- [x] Finding outcome 记录为 `fixed / keep`；CrUX Phone 仍为 `not_configured`，因此没有 Field CWV 结论。
