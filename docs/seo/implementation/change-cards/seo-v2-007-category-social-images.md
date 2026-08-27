# SEO Change Card：SEO-V2-007 品类页社交图与 Schema 主图

- Change ID：`SEO-V2-007`
- 状态：`local-complete / production-pending`
- 变更日期：2026-08-27
- 目标页面：7 个现有 `*-manufacturer/` 品类页
- 搜索意图：保持各页既有 B2B 制造商搜索意图不变，仅让分享摘要与结构化数据使用与页面主题一致的产品/面料图
- 唯一主要变量：把每页 `og:image`、`twitter:image` 与 `CollectionPage.primaryImageOfPage` 从通用 270×270 Logo 改为所有者批准的该品类代表图
- 不变项：URL、Title、Meta Description、H1、正文、内链、可见页面图片、Organization Logo 与品类页面所有权
- 证据来源与数据状态：2026-08-27 `audit-urls` 对 7/7 页面完整抓取，全部 HTTP 200、可索引、0 fetch failure；生产 HTML 手工解析确认 7 页三个目标字段均指向通用 Logo；图片选择由所有者于 2026-08-27 明确批准
- 风险：社交平台缓存旧图；非 1.91:1 图片可能在不同平台裁切；图片路径含空格时需正确 URL 编码；不得把带 `BTEXCO` 字样的 Sports Accessories 首页卡片图用于 Athletik 社交摘要
- 失效判定：任一页面仍输出 Logo、OG/Twitter 与 Schema 不一致、图片非 200、MIME/尺寸与声明不符，或分享预览发生不可接受裁切
- 验收标准：7 页 OG/Twitter/Schema 图逐页一致；7 个资源均为 HTTP 200；声明尺寸与真实文件一致；MIME 正确；JSON-LD 可解析且 Organization Logo 不变；至少完成实际分享预览抽查
- Finding outcome：代码与资源引用当前为 `local-fixed / production-pending`；部署和生产验收通过后才可改为 `fixed / keep`
- 复盘窗口：本项为即时技术验收，不以排名或询盘变化归因；部署后立即复核 HTML、资源与分享预览，后续仅在图片变更或平台预览异常时重开

## 批准的页面映射

| 页面 | 图片 | 尺寸 | MIME |
|---|---|---:|---|
| `/sportswear-manufacturer/` | `sportswear/cat-sportswear-1527-q100.webp` | 1527×1030 | `image/webp` |
| `/underwear-manufacturer/` | `underwear/cat-underwear-1200-q100.webp` | 1200×632 | `image/webp` |
| `/outdoor-clothing-manufacturer/` | `outdoor clothing/cat-outdoor-1200-q100.webp` | 1200×600 | `image/webp` |
| `/merino-wool-manufacturer/` | `merino wool product/showcase_4X3.jpeg` | 1600×1200 | `image/jpeg` |
| `/silk-wear-manufacturer/` | `silkwear/cat-silk-960-q100.webp` | 960×384 | `image/webp` |
| `/knitted-fabrics-manufacturer/` | `knitted fabrics/cat-knitted-fabrics-1200-q100.webp` | 1200×666 | `image/webp` |
| `/sports-accessories-manufacturer/` | `sports accessories/Balaclavas.png` | 1448×1086 | `image/png` |

## 实施内容

- `inc/product-category-data.php`：为 7 个品类记录增加批准的 `social_image`、真实尺寸、MIME 与描述性 alt；
- `rank-math.php`：页面级过滤 Facebook/Twitter image array，并增加对应 `ImageObject`，让 `WebPage.primaryImageOfPage` 引用同一图片；
- Organization 的 Logo 图像实体保持原值，不把产品图误设为企业 Logo；
- 未新增、改写或复制 uploads 资源，以上 7 张图在实施前已存在于生产 uploads 并逐一确认 HTTP 200 与 MIME。

## 本地验收记录

- [x] 所有者明确批准 7 张代表图；
- [x] Sports Accessories 候选排除带可见 `BTEXCO` 字样的首页卡片图；
- [x] PHP 8.2 对 `inc/product-category-data.php` 与 `rank-math.php` 语法检查通过；
- [x] 过滤器函数桩测试 7/7 页面映射、尺寸、MIME 和非品类页作用域通过；
- [x] 本地文件真实尺寸与配置 7/7 一致；
- [x] 生产资源 HEAD 检查 7/7 为 HTTP 200，MIME 与配置一致；
- [x] `git diff --check` 通过；
- [ ] 部署 `inc/product-category-data.php` 与 `rank-math.php`；
- [ ] 生产 HTML 逐页确认 OG/Twitter/Schema 一致；
- [ ] 生产 JSON-LD 可解析且 Organization Logo 保持不变；
- [ ] 完成分享预览抽查并填写最终 Finding outcome。
