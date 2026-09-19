# SEO Change Card：SEO-V2-016 首页类目卡图片交付

- Change ID：`SEO-V2-016-HOME-CATEGORY-IMAGES`
- 状态：`implemented / deployment-pending`
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
- 部署后 Crawl ID：`【DEPLOYMENT PENDING】`
- Finding / Inventory 处置：三轮重复的 image delivery Finding 转为 `implemented / deployment-pending`；其他五张卡片没有并入本次变量
- 最终决策及原因：`【PENDING：生产视觉、响应式候选、同条件 Lab 与 Crawl Diff 后填写】`

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
- [ ] 生产 8 个新 WebP 均为 HTTP 200，HTML `srcset` 只引用已部署候选；
- [ ] 1440px Desktop 与 390px Mobile 卡片构图、清晰度、文字、链接和布局无回归；
- [ ] 浏览器按视口 / DPR 选择合理候选，Merino 与 Knitted Fabrics 不再传输旧 lossless / q100 文件；
- [ ] 三次同条件移动 Lighthouse 记录 image delivery、LCP、TBT 与 CLS；
- [ ] 同范围 Crawl Diff 无新增状态码、Canonical 或 indexability 回归，并填写最终 Finding outcome。
