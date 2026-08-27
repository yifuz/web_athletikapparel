# SEO 实施与部署记录索引

> 状态：V1 实施批次已完成生产验收

实施总表见 [`../seo-implementation-checklist-v1.md`](../seo-implementation-checklist-v1.md)。本目录只保存需要独立复核的代码、资源、部署和性能记录。

| 记录 | 对应项目 | 最终状态 |
|---|---|---|
| [`image-optimization-seo-imp-005-006-v1.md`](image-optimization-seo-imp-005-006-v1.md) | SEO-IMP-005/006 | 54 个响应式 WebP 已部署验收 |
| [`moq-update-seo-imp-008-v1.md`](moq-update-seo-imp-008-v1.md) | SEO-IMP-008 | 成衣 MOQ 500 pieces per style 已同步；Hero 资格条撤销 |
| [`performance-diagnosis-seo-imp-034-v1.md`](performance-diagnosis-seo-imp-034-v1.md) | SEO-IMP-034 | 根因诊断完成，形成 035–038 |
| [`deployment-batch-seo-imp-035-038.md`](deployment-batch-seo-imp-035-038.md) | SEO-IMP-035–038 | 生产验收完成；035–037 `keep`，038 `keep-monitoring` |
| [`change-cards/`](change-cards/) | SEO-IMP-024/035/036/037/038、SEO-V2-007 | 单一变量、基线、Crawl 和最终决策；V2-007 当前待生产部署验收 |

最新部署后 Crawl：`crawl_40f88b6c25d74ba79ee193c7be26caf9`，20 页、0 fetch failure。历史部署记录不得作为当前生产状态的替代；新增变更建立新的 Change Card，并在部署后补回归证据。

uploads 图片不进入 Git。实施记录中涉及的图片必须继续通过 `wp-content/uploads/myathletik-theme/assets/images/` 单独部署，原始资源不得因文档整理删除。
