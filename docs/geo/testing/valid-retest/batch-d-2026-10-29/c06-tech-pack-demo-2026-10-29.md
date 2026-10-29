# C06 Tech Pack 示范内容：本地实施记录

日期：2026-10-29。状态：`implemented-local / owner-approved / deployment-pending`。所有者提供一份从真实客户 Tech Pack 改造的九页示范文件，并授权在现有指南展示第 2 页尺寸表、第 4 页 BOM 与完整 PDF 辅助入口；所有者接受示范文件第 1 页引线和第 4 页缝位表述的已知细节，并于 2026-10-29 确认审核通过。网页仅称其为改造示范，不称客户原件、真实订单结果或生产记录；用户原文件中具体客户资料不进入 Git。

## 改动与证据边界

- 修改 `template-parts/technical-article/content-technical-knitwear-tech-pack-guide.php`，在既有 POM 和组件章节内加入 HTML 表格：尺寸表 9 行、S–2XL 和容差；BOM 10 行、组件 / 描述 / 位置 / 颜色 / 数量。内容与提供的示范文件第 2、4 页对照，拼写或大小写按网站术语统一。
- 两处显式标识 `Demonstration only` 和 `not for production`；尺寸、容差、数量、物料与颜色仅是示例，并非通用生产条件或实际测试结果。示范 BOM 数量不等于已核定消耗量。
- 在 POM 示例后提供完整九页 PDF 入口；代码仅在目标上传文件存在时输出链接，避免缺文件时产生断链，但本行为不能替代部署验收。
- `style.css` 仅为两张示范表增加窄屏固定首列，横向滚动时保留测量点 / 组件名称。不改现有 URL、Title、Meta、H1、目录、Schema、正文既有文字或其他页面；不生成新技术标准、认证或客户背书。不声称补充示例必然带来 AI 引用。
- PDF 原件 `C:\Users\Administrator\Downloads\Athletik_Tech_Pack_Demo.pdf` 保持原位；本机副本位于 `wp-content/uploads/myathletik-theme/documents/athletik-tech-pack-demo.pdf`，SHA-256 `C022E24D4A4B97F244A54477C38EAE6231C8C636936B46D139B60976E0919AC3`，复制前后相同。PDF 保留原有 Content Credentials，未重新生成或移除附件。uploads 不在 Git 中，必须与主题代码分开同步。

## 验收与部署

- 本地 PHP 8.2.30 语法通过；使用本地 Apache `127.0.0.1:10008` 加 `Host: myathletik-rebuild-02.local` 验证页面 HTML 与 PDF 链接，PDF 响应 `200 / application/pdf`、431759 字节。本地域名经默认入口返回 502；端口直连通过不等于默认入口已经修复。
- 独立无头浏览器覆盖 360 / 390 / 768 / 1440px；页面无整体横向溢出，表格可获得焦点并键盘横向滚动。首版手机 BOM 固定列遮挡末列，已缩小固定列并复测 360 / 390px，滚动到末端时 Qty 及所有值可见。PDF 实际下载后的 SHA-256 与原件一致；单一 H1、Meta、Canonical 和 JSON-LD 可解析，未声称已与生产逐项对比。浏览器为临时独立进程，不影响用户打开的页面。
- 所有者已确认审核通过；部署与生产验收仍待完成。LocalWP → staging → production 后，核验 PDF 副本已同步、生产链接 200 且哈希一致、示范说明和两张表可见，并核查原有 Title / H1 / Canonical / Schema 及移动端布局。
- 记录实际部署日期和其他同期变更，后续按原固定 Prompt、相同条件复测引用；单次观察及跨环境结果不作因果归因。此记录不代表生产已部署、页面已重新抓取或索引。
