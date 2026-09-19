# SEO Change Card：SEO-V2-017 首页 Outdoor 类目卡图片交付

- Change ID：`SEO-V2-017-HOME-OUTDOOR-IMAGE`
- 状态：`fixed / keep`
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
- 部署后 Crawl ID：首轮刷新 Run `029afd40-cf30-4635-a545-8efaa1450ad5`；同版本稳定复抓 Run `8fc3102b-06ff-4139-9105-8b898fe1925d`
- Finding / Inventory 处置：Outdoor image delivery 子项为 `fixed / keep`。三次部署后有效移动 Lab 均不再列出 Outdoor；总 image delivery 估算浪费由约 1,379 KiB 降至约 1,305 KiB，减少约 74 KiB（约 5.4%）。同一报告中的 Sports Accessories 图片维持 `deferred / owner-protected`：其当前素材带 BETXCO 标记，所有者此前明确要求该 Sports Accessories 图片不准改动，本批未重编码、替换或改路径。页面级 LCP Finding `action-1a2a7aafa456` 与本次下方卡片变量不同，继续 `deferred`
- 最终决策及原因：`fixed / keep`。生产资源、浏览器候选、Desktop/Mobile 视觉和 Crawl 均通过；目标 Outdoor 证据连续消失。三次有效移动 Lab 的 LCP 中位数为 3.356s、TBT 中位数为 64ms、CLS 均为 0；相较前一批的数值变化受网络、服务响应与 Lab 波动影响，不能归因成本次下方图片提速。CrUX Phone 仍 `not_configured`

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
- [x] 生产 4 个新 WebP 均为 HTTP 200，HTML `srcset` 不再引用 Outdoor q100 候选；
- [x] 1440px Desktop 与 390px Mobile 的 Outdoor 构图、清晰度、文字、链接和整体布局无回归，且无横向溢出；
- [x] 浏览器在 1440px / DPR 1 选择 640w、390px / DPR 3 选择 1200w；Sports Accessories 仍选择原 q100 候选，960w 文件为 137,242 bytes；
- [x] 三次有效同条件移动 Lighthouse 的 image delivery 均约 1,305 KiB，Outdoor 均未进入证据；LCP 为 3.356s / 3.260s / 3.407s，TBT 为 50ms / 64ms / 127ms，CLS 均为 0；一次仅返回 `fetch-fallback` 的无评分请求按数据状态排除；
- [x] 同范围稳定复抓检查 25 个 URL，0 changed / new errors / indexability flips；5 条大于 5 MB 的既有 MP4 读取提示不属于本次新增回归，Finding outcome 已填写。
