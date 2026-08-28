# SEO Change Card：SEO-V2-008 五个品类页响应式图片

- Change ID：`SEO-V2-008`
- 状态：`local-complete / production-pending`
- 变更日期：2026-08-27
- 目标页面：`/underwear-manufacturer/`、`/outdoor-clothing-manufacturer/`、`/merino-wool-manufacturer/`、`/silk-wear-manufacturer/`、`/sports-accessories-manufacturer/`
- 搜索意图：保持五页现有 B2B 品类制造商意图与页面所有权不变，降低子类产品图在移动端和高密度屏幕上的传输负担
- 唯一主要变量：为 18 张现有子类产品图增加 480 / 800 / 1200w `q85` WebP 候选、`srcset` / `sizes`、真实固有尺寸、`loading="lazy"`、`decoding="async"` 与描述性 alt
- 不变项：URL、Title、Meta Description、H1、正文、内链、Hero 媒体、OG/Twitter/Schema 主图与页面所有权
- Finding outcome：SEO-IMP-025 的已确认图片负载问题进入 `fixed-pending-production`；部署后需用同一 5 URL `audit-urls`、资源检查、视觉检查和受控 Lab 复验后决定 `fixed / keep` 或回滚
- 复盘窗口：部署后立即完成资源与 HTML 验收；Lab 只作同环境方向性比较；Field CWV 仍为 unavailable，不把 Lab 或排名变化写成因果

## 触发证据与生产前基线

- 2026-07-26 至 08-22 的完整 GSC 28 天窗口中，Sports Accessories 为 20 次曝光、平均排名 6.9；Merino 为 1 次点击 / 16 次曝光、平均排名 19.5。样本不支持 Title/Meta 修改，但已经满足图片技术优化的页面优先级触发条件；
- 18 张当前源图合计约 19.91 MB；五页均缺本批子类图片的 WebP 响应式候选与固有尺寸；
- Sports Accessories 的三次部署前移动端 Lighthouse Lab LCP 为 3169ms（`complete`）、3698ms（`partial`，1 个 run warning）和 3213ms（`partial`，1 个 run warning），数值中位数为 3213ms；只有一次为完整数据，因此不把中位数写成稳定 Field 结论。Finding `action-1a2a7aafa456` 为 `Improve the largest visible content`，当前处置为 `deferred to SEO-V2-008 production verification`；
- 生产前 `audit-urls` 完整抓取 5/5 URL：全部 HTTP 200、可索引、0 failed、0 high/medium issue；唯一返回项 `hsts_missing` 与本批无关，继续 `no-change / owner-action SEO-V2-014`；
- 同轮 GSC page/query 与 GA4 联接因 `fetch failed` 为 unavailable；不把联接失败写成零数据，优先级继续引用已经冻结的完整 28 天基线。

## 候选负载对比

下表为每页全部子类图的文件大小合计；实际浏览器请求由 viewport、DPR、懒加载和缓存决定，不等于首屏传输量。

| 页面 | 图片数 | 原源图合计 | 800w WebP 合计 | 1200w WebP 合计 | 800w 相对减少 |
|---|---:|---:|---:|---:|---:|
| Underwear | 4 | 1,363,173 B | 96,392 B | 181,616 B | 92.9% |
| Outdoor Clothing | 4 | 1,058,157 B | 76,570 B | 173,304 B | 92.8% |
| Merino Wool | 4 | 3,790,366 B | 208,126 B | 395,094 B | 94.5% |
| Silk Wear | 3 | 7,576,562 B | 132,158 B | 367,098 B | 98.3% |
| Sports Accessories | 3 | 6,123,991 B | 99,602 B | 220,192 B | 98.4% |

## 实施内容

### Git 代码

- `inc/product-category-data.php`：为五页 18 个子类图片条目增加描述性 alt、真实宽高与 480 / 800 / 1200w WebP 映射；
- 共用 `template-parts/product-category/page.php` 已在此前批次支持 `<picture>`、WebP `srcset`、`sizes`、固有尺寸、lazy loading 与 async decoding，本批无需修改模板；
- Sports Accessories 第三张继续使用 `sports-accessory-product-category.png`。所有者于 2026-08-27 明确决定其袖口可见 `BTEXCO` 不影响本页使用，并于 2026-08-28 再次确认该图不得改动；本批保留原图、原路径及现有三档响应式版本。

### uploads 资源（不进入 Git）

目标根目录：`wp-content/uploads/myathletik-theme/assets/images/`

每个下列 stem 均有三个文件：`<stem>-480-q85.webp`、`<stem>-800-q85.webp`、`<stem>-1200-q85.webp`。

| 目录 | Stem |
|---|---|
| `underwear/` | `boxer-briefs` |
| `underwear/` | `thermal-base-layers` |
| `underwear/` | `stretch-performance-underwear` |
| `underwear/` | `microfiber-merino-underwear` |
| `outdoor clothing/` | `mid-layer-tops-hoodies` |
| `outdoor clothing/` | `cold-weather-layering` |
| `outdoor clothing/` | `hiking-trekking-knitwear` |
| `outdoor clothing/` | `merino-genesis-fleece-layers` |
| `merino wool product/` | `jacquard-merino-apparel` |
| `merino wool product/` | `printed-merino-apparel` |
| `merino wool product/` | `merino-blend-performance` |
| `merino wool product/` | `merino-yarn-fabric-development` |
| `silkwear/` | `silk-base-layers-underwear` |
| `silkwear/` | `silk-performance-apparel` |
| `silkwear/` | `silk-blend-knitwear` |
| `sports accessories/` | `technical-balaclavas` |
| `sports accessories/` | `technical-gloves-liners` |
| `sports accessories/` | `technical-knit-accessories` |

54 个 WebP 总计 2,186,422 bytes；单文件最大 212,782 bytes。原 JPG/PNG/JPEG 均保留作为 fallback 与回滚资产，没有删除或覆盖。

## 风险与防护

- uploads 不进入 Git，部署代码但漏传图片会让 WebP `<source>` 404；必须先或同步传输 54 个资源；
- 目录含空格，生产 URL 必须正确编码并返回 `image/webp`；
- 压缩、缩放可能造成织纹丢失、色偏、旋转或不可接受裁切；已对五组 1200w contact sheet 和代表性单图完成视觉检查，生产仍需 Desktop/Mobile 抽查；
- 固有尺寸错误会造成 CLS 或比例变化；本地已逐项核对源图宽高，并验证 54 个 WebP 的实际宽度和 MIME；
- 现有 Hero、正文、Title/Meta/H1、Canonical 与 Schema 不得因本批变化。

## 本地验收记录

- [x] 5 个目标页面、18 个子类图片和 54 个 WebP 引用全部枚举；
- [x] 54 个 WebP 文件存在，实际 MIME 为 `image/webp`，候选宽度与 480 / 800 / 1200 声明一致；
- [x] 54 个资源总计 2,186,422 bytes，单文件最大 212,782 bytes；
- [x] 五组 1200w contact sheet 与丝绸、Merino yarn、balaclava 代表图完成视觉检查；
- [x] PHP 8.2 对 `inc/product-category-data.php` 与共享模板语法检查通过；
- [x] 函数桩数据检查：5 页、18 个子类、54 个引用、54 个唯一资源、0 error；
- [x] 共享模板渲染检查：18/18 `<picture>`、`source`、`img` 数量一致，全部具备 3 档 `srcset`、`sizes`、width/height、alt、lazy 与 async；
- [x] 品牌术语与反虚构检查：本批只新增图片 alt 与技术字段，没有新增长篇营销正文、认证、产能、客户或法律关系声称；
- [x] 生产前 `audit-urls` 5/5 fetched、0 failed、全部 200 且可索引；
- [ ] 部署 `inc/product-category-data.php` 与 54 个 uploads WebP；
- [ ] 生产 HTML 确认 18/18 `<picture>`、三档候选、尺寸、alt 与加载属性；
- [ ] 54 个生产资源全部 HTTP 200、`image/webp`，无 URL 编码错误；
- [ ] Desktop/Mobile 视觉检查通过；
- [ ] 用同一 5 URL 重跑 `audit-urls`，并在同环境重复 Sports Accessories Lab；
- [ ] 填写最终 Finding outcome 与 `keep` / rollback 决策。
