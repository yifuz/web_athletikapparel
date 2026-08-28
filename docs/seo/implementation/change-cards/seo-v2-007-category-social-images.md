# SEO Change Card：SEO-V2-007 品类页社交图与 Schema 主图

- Change ID：`SEO-V2-007`
- 状态：`reopened / local-fix-pending-deployment`
- 变更日期：2026-08-27
- 目标页面：7 个现有 `*-manufacturer/` 品类页
- 搜索意图：保持各页既有 B2B 制造商搜索意图不变，仅让分享摘要与结构化数据使用与页面主题一致的产品/面料图
- 唯一主要变量：把每页 `og:image`、`twitter:image` 与 `CollectionPage.primaryImageOfPage` 从通用 270×270 Logo 改为所有者批准的该品类代表图
- 不变项：URL、Title、Meta Description、H1、正文、内链、可见页面图片、Organization Logo 与品类页面所有权
- 证据来源与数据状态：2026-08-27 `audit-urls` 对 7/7 页面完整抓取，全部 HTTP 200、可索引、0 fetch failure；生产 HTML 手工解析确认 7 页三个目标字段均指向通用 Logo；图片选择由所有者于 2026-08-27 明确批准
- 风险：社交平台缓存旧图；WebP 在 LinkedIn 桌面端/分享抓取中兼容性不足；非 1.91:1 图片可能在不同平台裁切；图片路径含空格时需正确 URL 编码；不得把带 `BTEXCO` 字样的 Sports Accessories 首页卡片图用于 Athletik 社交摘要
- 失效判定：任一页面仍输出 Logo、OG/Twitter 与 Schema 不一致、图片非 200、MIME/尺寸与声明不符，或分享预览发生不可接受裁切
- 验收标准：7 页 OG/Twitter/Schema 图逐页一致；7 个资源均为 HTTP 200；声明尺寸与真实文件一致；MIME 正确；JSON-LD 可解析且 Organization Logo 不变；至少完成实际分享预览抽查
- Finding outcome：2026-08-27 所有者提供的 LinkedIn Post Inspector 新抓取截图显示 `No image found`，已满足重开条件；当前为 `reopened / local-fix-pending-deployment`。已从原批准素材制作 7 张 1200×627 JPG 兼容图，只有部署后 LinkedIn 能取图且裁切可接受时才能改为 `fixed / keep`
- 复盘窗口：本项为即时技术验收，不以排名或询盘变化归因；部署后立即复核 HTML、资源与分享预览，后续仅在图片变更或平台预览异常时重开

## 批准的页面映射

| 页面 | 图片 | 尺寸 | MIME |
|---|---|---:|---|
| `/sportswear-manufacturer/` | `sportswear/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |
| `/underwear-manufacturer/` | `underwear/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |
| `/outdoor-clothing-manufacturer/` | `outdoor clothing/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |
| `/merino-wool-manufacturer/` | `merino wool product/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |
| `/silk-wear-manufacturer/` | `silkwear/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |
| `/knitted-fabrics-manufacturer/` | `knitted fabrics/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |
| `/sports-accessories-manufacturer/` | `sports accessories/social-share-1200x627.jpg` | 1200×627 | `image/jpeg` |

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
- [x] 部署 `inc/product-category-data.php` 与 `rank-math.php`；
- [x] 生产 HTML 逐页确认 OG/Twitter/Schema 一致；
- [x] 生产 JSON-LD 可解析且 Organization Logo 保持不变；
- [ ] 完成分享预览抽查并填写最终 Finding outcome。

## 生产验收记录

- 2026-08-27 逐页读取 7/7 生产原始 HTML：`og:image`、`og:image:secure_url`、`twitter:image` 与 `primaryImageOfPage` 皆指向各页批准图片，路径中空格已正确编码；
- 7/7 页面返回 HTTP 200；7/7 图片返回 HTTP 200，生产二进制读取的实际尺寸和 MIME 与声明值完全一致；
- 7/7 JSON-LD 解析无错，每页 `ImageObject` 的 URL、尺寸和 caption 正确；Organization Logo 仍为 `cropped-ATHLETIK_R_512.jpg`；
- 同一 7 URL 的部署后 `audit-urls` 定向报告：7 requested / 7 attempted / 7 fetched / 0 failed，7 页均为 200 且可索引，0 个 high/medium issue；报告 coverage 字段仍为 `unknown`，但本次明确 URL 集合已全部实际抓取；
- 报告保留两个部署前已存在的 low review：`hsts_missing` 与本项无关，结论 `no-change`；Sportswear 的 `image_oversized_candidate` 未显示为本次发布新增回归，且当前证据不支持在 SEO-V2-007 内改图，结论 `deferred / separate image-performance review`；
- 报告附带 Caveat：1 个外部 URL 阻止自动验证、3 个外部 URL 在有界重试后不可达，GSC page/query 联接失败。这些不影响 SEO-V2-007 的页面 HTML、JSON-LD 和图片资源验收；
- LinkedIn Post Inspector 未在当前自动化环境返回可见预览，Meta Sharing Debugger 也未取得可用的登录态结果；因此不虚假声称平台缓存与实际裁切已通过。重开条件为所有者在任一实际社交平台预览中发现旧 Logo、取图失败或不可接受裁切。

## LinkedIn 兼容性重开（2026-08-27）

- 所有者提供的 Post Inspector 截图显示页面为刚抓取，Title、Description、Canonical 与 URL 访问正常，但 Image 明确为 `No image found`。观察为 Confirmed；
- 生产 `og:image` 当时为 WebP。LinkedIn 官方分享图建议为 1200×627、1.91:1，其公开媒体支持表中 WebP 不支持桌面端而 JPEG/PNG 支持；“当前 LinkedIn 桌面分享抓取不接受该 WebP”为 Probable 根因；
- 已用 FFmpeg 从七张原批准素材制作同主题 1200×627 JPG。Underwear、Outdoor、Silk 与 Knitted Fabrics 使用安全中心裁切；Sportswear、Merino 与 Sports Accessories 使用背景补边保留完整人物/产品；
- 7/7 新图均为 1200×627 JPEG，约 41–185 KB，已完成视觉检查；alt、页面主题和 Organization Logo 不变；
- [ ] 部署 `inc/product-category-data.php` 和 7 张 uploads JPG；
- [ ] 生产 HTML 逐页确认 OG/Twitter/Schema 统一为 1200×627 `image/jpeg`；
- [ ] LinkedIn Post Inspector 重新抽查能显示图片且裁切可接受；
- 证伪条件：部署 JPG 并重新抓取后仍显示 `No image found`；若发生，改查 LinkedIn bot 回源响应、资源头、缓存和 Cloudflare 规则，不继续盲目换图。
