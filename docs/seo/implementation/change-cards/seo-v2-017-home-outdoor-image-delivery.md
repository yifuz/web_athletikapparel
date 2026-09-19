# SEO Change Card：SEO-V2-017 首页 Outdoor 类目卡图片交付

- Change ID：`SEO-V2-017-HOME-OUTDOOR-IMAGE`
- 状态：`implemented / deployment-pending`
- 变更日期：2026-09-19
- 变更页面或分组：`/` 的 `What we make`；仅 Outdoor Clothing 类目卡
- 搜索与采购意图：保持首页 Outdoor Clothing 产品发现和采购入口，不改变品类名称、链接、替代文字或页面所有权
- 证据来源与数据状态：SEO-V2-016 部署后三次 Lighthouse 13.4.1 移动 Lab 均重复列出 `cat-outdoor-1200-q100.webp`，传输约 100 KB、估算浪费约 75,565 bytes；该证据在三次有效报告中一致
- 唯一主要变量：保留同一源图、构图、裁切与显示尺寸，只把 Outdoor 首页卡片的 responsive WebP 候选改为 q80 的 480 / 640 / 960 / 1200w 梯度
- 业务假设：减少高 DPR Mobile 选择 1200w Outdoor 图片时的传输和解码负担；不把结果归因到 Hero、Cookiebot、jQuery 或其他类目图
- 主要指标：生产浏览器实际选中候选及 transferred size；同条件移动 Lighthouse 的 Outdoor evidence 与 image delivery savings
- 防护指标：HTTP 200、单一 H1、CLS、卡片构图、文字可读性、链接、alt、Desktop/Mobile 清晰度和 7 张卡片布局不变
- 基线窗口：2026-09-19；Outdoor 640 / 1200w q100 分别约 32.7 / 98.1 KB，三次 Lighthouse 均记录约 75,565 bytes 浪费
- 干扰因素：Cloudflare 缓存、设备 DPR、视口宽度、浏览器候选选择、网络与 Lighthouse 波动
- 部署前 Crawl / Lab：Crawl Diff Run `df1f29f4-a015-4f02-977a-be091a16605b`；SEO-V2-016 部署后三次移动 Lab
- 部署后 Crawl ID：`【DEPLOYMENT PENDING】`
- Finding / Inventory 处置：Outdoor image delivery 子项转为 `implemented / deployment-pending`。同一报告中的 Sports Accessories 图片维持 `deferred / owner-protected`：其当前素材带 BETXCO 标记，所有者此前明确要求该 Sports Accessories 图片不准改动，本批不重编码、不替换、不改路径
- 最终决策及原因：`【PENDING：生产视觉、响应式候选、同条件 Lab 与 Crawl Diff 后填写】`

## 实施内容

- 从现有 `cat-outdoor-1200-q100.webp` 生成 480 / 640 / 960 / 1200w q80 WebP，文件约 7.1 / 10.7 / 19.7 / 27.7 KB；
- 原 640 / 1200w q100 WebP 保留，不删除，用于快速回滚；
- `src` 与 `srcset` 指向新候选，`sizes`、固有尺寸、lazy loading、alt、object-position 和链接不变；
- Sports Accessories 的代码、文件和显示保持原样。

## 风险与回滚

- q80 有损编码可能在人物轮廓、车轮辐条或浅色背景出现压缩痕迹，因此生产验收必须覆盖 Desktop 与高 DPR Mobile；
- 若出现构图变化、细线明显糊化、候选 404、整页布局变化，或同条件 Lab 不再支持 Outdoor 子项改善，则仅把 Outdoor 模板路径切回原 q100 文件；
- 不删除旧文件，不修改其他六张卡片，尤其不触碰 Sports Accessories 受保护图片。

## 验收标准

- [x] 4 个新 WebP 均可解码，尺寸为 480×240、640×320、960×480、1200×600；
- [x] 1200w q80 文件人工检查保持原构图，人物轮廓、车轮和服装细节可接受；
- [x] `template-parts/home/product-categories.php` 通过 LocalWP PHP 8.2.30 语法检查，模板恰好引用 4 个 Outdoor q80 候选，Sports Accessories diff 为 0；
- [ ] 生产 4 个新 WebP 均为 HTTP 200，HTML `srcset` 不再引用 Outdoor q100 候选；
- [ ] 1440px Desktop 与 390px Mobile 的 Outdoor 构图、清晰度、文字、链接和整体布局无回归；
- [ ] 浏览器按视口 / DPR 选择合理候选，Sports Accessories 的 URL、字节和视觉保持不变；
- [ ] 三次同条件移动 Lighthouse 记录 image delivery、LCP、TBT 与 CLS；
- [ ] 同范围 Crawl Diff 无新增状态码、Canonical 或 indexability 回归，并填写最终 Finding outcome。
