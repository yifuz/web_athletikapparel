# Product Showcase Phase 1 架构升级与 Sportswear 3 款新品（LocalWP 待审）

日期：2026-11-26。状态：`local-verified / awaiting-owner-approval`。严禁未经所有者明确确认“批准上线”推送至远程或部署 Flywheel 生产站。

## 改动内容

- **架构升级（向后兼容旧 5 款 16:9 样本）**：新增竖图（`2:3`、`object-fit: contain` 不裁头脚）与混合比例展示支持；支持可选 `gsm` 省略（无空行与 Contact 预填空括号 `()`）与纯图模式详情页（无视频时不渲染视频弹窗/按钮）；接入 `/sportswear-manufacturer/` 最新 2 卡预览；`/product-showcase/` 新增 Category / Material 双组筛选与响应式分页（桌面 6 卡、手机 4 卡，服务端全量输出保 SEO）。
- **3 款 Sportswear 新品（纯实拍白底套图，事实边界严格受控）**：
  - `womens-silver-yarn-thermal-set`（Local ID `97`）：`HY244737` / `S2570-A0297`、`50.5% Nylon / 38% Modal / 4.3% Silver Fiber / 7% Spandex`、`ACTIVESEAM`，按所有者要求省略未确认 GSM，含 3 张白底图 + 社交图（不附绿幕视频）。
  - `womens-leaf-jacquard-yoga-set`（Local ID `98`）：`HY265075`、`85% Polyester / 15% Spandex`、`270 GSM`，leaf-and-line 提花运动内衣 + 高腰瑜伽裤（未公开内部款号），含 3 张白底图 + 社交图。
  - `womens-high-vis-cycling-jacket`（Local ID `99`）：`HY265135`、`Main shell: 100% Nylon`、`40 GSM (main shell)`，荧光绿网眼拼接骑行外壳；仅写 `UV-protective positioning; verified per buyer test method`（零 `UPF 50+` 虚构数值），含 3 张白底图 + 社交图。

## 待批准部署清单

- **代码（与 Phase 2 合并，共 14 个文件）**：`functions.php`、`style.css`、`inc/product-example-data.php`、`inc/product-seasonal-gallery-data.php`、`inc/product-showcase.php`、`inc/product-showcase-setup.php`、`templates/product-showcase.php`、`templates/product-example.php`、`template-parts/product-showcase/card.php`、`template-parts/product-showcase/entry.php`、`template-parts/product-showcase/seasonal-gallery.php`、`template-parts/product-category/page.php`、`assets/js/product-showcase.js`、`assets/js/product-inquiry-context.js`。
- **Phase 1 媒体（21 个文件，385,564 bytes / 376.5 KB，位于 `uploads/myathletik-theme/assets/images/product-examples/`）**：`womens-silver-yarn-thermal-set/`（7 文件）、`womens-leaf-jacquard-yoga-set/`（7 文件）、`womens-high-vis-cycling-jacket/`（7 文件），含 800×1200 & 533×800 白底 WebP 与 1200×627 社交 JPG（已按所有者指示移除绿幕视频）。
- **生产数据库操作（批准后按规范执行，严禁复制 Local ID `97/98/99`）**：上传代码与媒体后，在生产站通过受控建页流程仅新建此 3 个页面及 Rank Math 元数据（保留已有 `105/106/107/109/111/113` 不变）。

## LocalWP 验收结果

- `php -l`、`node --check` 与 `myathletik_product_showcase_prepare( true )`（`media_count=123`、`plan_count=9`）全部通过；旧 6 页日期不变；Local `indexing_allowed=false`、Rank Math 与 WP Sitemap 排除通过。
- Playwright（1440px & 390px）与全页截图复核通过：Hub 分页（6/4）及双组筛选、3 款新品纯图切换（零 `<video>` 与 MP4 请求）、1 款无空 GSM 行、旧 Ocean Depth 视频回归、`/sportswear-manufacturer/` 双卡预览及 Lookbook/4 卡证据区完好、Contact 预填正常（未提交表单）、0 JS/本地 HTTP 错误。
