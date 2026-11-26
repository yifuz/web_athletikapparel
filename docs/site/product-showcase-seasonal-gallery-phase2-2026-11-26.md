# Product Showcase Phase 2：Seasonal Sample Gallery（LocalWP 待审）

日期：2026-11-26。状态：`local-verified / awaiting-owner-approval`。与 Phase 1 合并停在 Local Gate；未获“批准上线”前不推送远程或部署生产。

## 改动内容

- **独立纯图画廊注册表（不建独立 SEO 页）**：新增 `inc/product-seasonal-gallery-data.php`（并在 `functions.php` 引入），录入 8 款精选白底套图（女装 3–7 款 + 男装 1–3 款：`Sportswear` 6 款、`Outdoor Clothing` 2 款）。按所有者精简要求：每款仅保留产品名、1 句客观款型描述与 3 张 `2:3` 竖版白底图，**移除绿幕视频、细节列表与卡片底部冗余链接**，零虚构成分/GSM/货号/ISO 编号。
- **双层展厅与原地 3 图弹窗**：`templates/product-showcase.php` 上层加 `Featured Technical Samples` 分层标题（`card.php` 卡片标题降为 `<h3>` 保持 `H1→H2→H3`），下层新增 `template-parts/product-showcase/seasonal-gallery.php`（`#seasonal-sample-gallery`）；`assets/js/product-showcase.js` 与 `style.css` 实现独立品类筛选与 6/4 分页、原地 3 图切换弹窗（首屏全懒加载，无视频请求）。
- **商业闭环与预填/预检扩展**：`template-parts/product-category/page.php` 在 Sportswear Lookbook 底部增加 `Browse full seasonal sample gallery in Product Showcase →`；`inc/product-showcase.php` 与 `assets/js/product-inquiry-context.js` 支持 `?category=&sample=` 安全预填；`inc/product-showcase-setup.php` 将 48 个季节画廊图片纳入只读预检。

## 合并部署清单（Phase 1 + Phase 2，批准后执行）

- **代码（共 14 个文件）**：`functions.php`、`style.css`、`inc/product-example-data.php`、`inc/product-seasonal-gallery-data.php`、`inc/product-showcase.php`、`inc/product-showcase-setup.php`、`templates/product-showcase.php`、`templates/product-example.php`、`template-parts/product-showcase/card.php`、`template-parts/product-showcase/entry.php`、`template-parts/product-showcase/seasonal-gallery.php`、`template-parts/product-category/page.php`、`assets/js/product-showcase.js`、`assets/js/product-inquiry-context.js`。
- **媒体（共 69 个文件 / 1.74 MB，全部位于 `uploads/myathletik-theme/assets/images/`）**：Phase 1 `product-examples/` 3 目录（21 文件，376.5 KB）+ Phase 2 `product-seasonal/` 8 目录（48 个 `2:3` 竖版 WebP，1,407.9 KB）。
- **数据库（仅 Phase 1 3 页，Phase 2 零建页）**：生产站仅通过受控建页流程新增 3 个 Sportswear Showcase 子页（严禁复制 Local ID `97/98/99`），Seasonal Gallery 8 款不建独立页面、不进 Sitemap。

## LocalWP 合并验收结果

- `php -l`、`node --check` 与 `myathletik_product_showcase_prepare( true )`（`media_count=123`、`plan_count=9`）通过；Local 页面保持 `9` 个。
- Playwright（1440px & 390px）与截图核查通过：上层 8 款与下层 8 款筛选/分页完全隔离、卡片仅显示标题+1 句描述（无冗余文字与细节列表）、原地 3 图弹窗切换正常、Lookbook 底部导流与 Contact `?sample=` 预填（未提交）正常、旧 Merino 视频回归正常、0 JS/本地 HTTP 错误。
