# Product Showcase Phase 2：Seasonal Sample Gallery（LocalWP 待审）

日期：2026-11-26。状态：`local-verified / awaiting-owner-approval`。与 Phase 1（`3d9aa00`）合并停在 Local Gate；未获“批准上线”前不推送远程或部署生产。

## 改动内容

- **独立画廊注册表（不建独立 SEO 页）**：新增 `inc/product-seasonal-gallery-data.php`（并在 `functions.php` 引入），录入 8 款精选白底套图与实拍视频（女装 3–7 款 + 男装 1–3 款：`Sportswear` 6 款、`Outdoor Clothing` 2 款）。文案仅写客观款型、颜色印花与可见细节，零虚构成分、GSM、货号或 ISO 编号。
- **双层展厅与原地弹窗**：`templates/product-showcase.php` 上层加 `Featured Technical Samples` 分层标题（`card.php` 卡片标题降为 `<h3>` 保持 `H1→H2→H3`），下层新增 `template-parts/product-showcase/seasonal-gallery.php`（`#seasonal-sample-gallery`）；`assets/js/product-showcase.js` 与 `style.css` 实现独立品类筛选与 6/4 分页、原地 3 图轮播 + 按需视频播放器弹窗及关闭自动释放。
- **商业闭环与预填/预检扩展**：`template-parts/product-category/page.php` 在 Sportswear Lookbook 底部增加 `Browse full seasonal sample gallery in Product Showcase →`；`inc/product-showcase.php` 与 `assets/js/product-inquiry-context.js` 支持 `?category=...&sample=<slug>` 安全预填；`inc/product-showcase-setup.php` 将 64 个季节画廊媒体纳入只读预检。

## 合并部署清单（Phase 1 + Phase 2，批准后执行）

- **代码（共 14 个文件，含 Phase 1 + Phase 2）**：`functions.php`、`style.css`、`inc/product-example-data.php`、`inc/product-seasonal-gallery-data.php`、`inc/product-showcase.php`、`inc/product-showcase-setup.php`、`templates/product-showcase.php`、`templates/product-example.php`、`template-parts/product-showcase/card.php`、`template-parts/product-showcase/entry.php`、`template-parts/product-showcase/seasonal-gallery.php`、`template-parts/product-category/page.php`、`assets/js/product-showcase.js`、`assets/js/product-inquiry-context.js`。
- **媒体（共 115 个文件 / 38.16 MB，全部位于 `uploads/myathletik-theme/assets/images/`）**：Phase 1 `product-examples/` 3 目录（51 文件，24.29 MB）+ Phase 2 `product-seasonal/` 8 目录（64 文件，13.87 MB，含 48 张 `2:3` 竖版 WebP + 8 条去器材裁剪 `720×1080` MP4 + 8 张海报 WebP）。
- **数据库（仅 Phase 1 3 页，Phase 2 零建页）**：生产站仅通过受控建页流程新增 3 个 Sportswear Showcase 子页（严禁复制 Local ID `97/98/99`），Seasonal Gallery 8 款不建独立页面、不进 Sitemap。

## LocalWP 合并验收结果

- `php -l`（8 PHP）、`node --check`（2 JS）与 `myathletik_product_showcase_prepare( true )`（`media_count=169`、`plan_count=9`）通过；Local 页面保持 `9` 个且无变更。
- Playwright（1440px & 390px）与截图核查通过：上层 8 款与下层 8 款筛选/分页完全隔离、3 图切换与按需竖屏视频播放/关闭释放正常（首屏 0 MP4 请求）、8/8 新 MP4 Range 200/206、Lookbook 底部导流与 Contact `?sample=` 预填（未提交）正常、上层详情零回归、0 JS/本地 HTTP 错误。
