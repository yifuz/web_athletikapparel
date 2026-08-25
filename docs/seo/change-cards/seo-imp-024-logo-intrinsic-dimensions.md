# SEO Change Card：SEO-IMP-024 Logo 固有尺寸

- Change ID：`SEO-IMP-024`
- 状态：`keep`（生产验收通过）
- 变更日期：2026-08-21；生产部署与验收：2026-08-25
- 变更页面或分组：全站共用 Header 与 Footer
- 唯一主要变量：为两处 `cropped-ATHLETIK_R_512.jpg` 增加真实固有尺寸 `width="512" height="512"`
- 业务假设：浏览器在 CSS 和图片完成加载前即可预留 1:1 空间，降低共享 Header/Footer Logo 造成布局偏移的可能性
- 证据来源与数据状态：2026-08-21 生产 HTML 与 uploads 源文件；目标两处已完整核对，源图为 512×512
- 主要指标：生产 HTML 中两处 Logo 均输出 `width="512" height="512"`；后续可用 Field CLS 不恶化
- 防护指标：Header/Footer 的 CSS 显示尺寸、比例、对齐、响应式布局和链接行为不变
- 基线窗口：2026-08-21 部署前生产 HTML；两处 Logo 均无 `width`/`height`
- Day 7 / 28 / 90 复盘日期：2026-09-01 / 2026-09-22 / 2026-11-23；低流量阶段以标记和视觉验证为主，不从不足的 Field 样本推导排名效果
- 干扰因素：缓存、GeneratePress 更新、Header/Footer CSS 调整、同期性能改动
- 部署前 Crawl ID：`crawl_3f1fc0fbb955403791272722942441a9`
- 部署后 Crawl ID：`crawl_c3321e593dcd4a54bec9811ec8775f40`
- Finding / Inventory 处置：`SEO-IMP-024` 为 `fixed`；生产复验完成并关闭
- 验证结果：源图尺寸 512×512；GeneratePress Header 使用 `generate_logo_attributes` 子主题过滤器；Footer 使用子主题自有 markup；PHP 语法通过；生产首页与 Contact 均返回 200，每页两处 Logo 均渲染 `width="512" height="512"`；图片资源返回 `200 image/jpeg`；Desktop 与 Mobile Logo 无拉伸或错位。部署后 Crawl 保留 20 个页面、0 个 fetch failure、无新增状态码错误
- 最终决策及原因：`keep`。目标属性在生产生效且未产生 Logo 视觉回归。部署后 Crawl 新增的两项 `slow_response` 出现在 Services 与 Technical Guides，重复请求仍约 1.2–3.0 秒；该信号与本次只增加图片尺寸属性的变量不匹配，转入 SEO-IMP-034 单独诊断，不归因于 SEO-IMP-024

## 验收记录

- [x] `php -l functions.php` 通过；
- [x] 本地 Header Logo 输出 `width="512" height="512"`；
- [x] 本地 Footer Logo 输出 `width="512" height="512"`；
- [x] Desktop 与 Mobile Header/Footer 的 Logo 无拉伸或错位；现有 CSS 显示尺寸保持不变；
- [x] 生产部署后两处属性生效；
- [x] 保存部署后 Crawl Snapshot，并填写部署后 Crawl ID。
