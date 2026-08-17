# Athletik Clothing 文档索引

`docs/` 按工作领域归档。新会话先读 `AGENTS.md`，再从本页进入对应主题；不要为了找状态而扫描全部文档。

## 根目录：项目入口

| 文件 | 用途 |
|---|---|
| [`progress.md`](progress.md) | 当前项目完成状态、历史里程碑和待办；状态判断的主要入口 |
| [`sitemap.md`](sitemap.md) | 页面结构、URL 与 SEO 信息架构；创建或重构页面前必读 |
| `README.md` | 本索引 |

## `geo/`：生成式搜索可见性

- [`geo/GEO.md`](geo/GEO.md)：GEO 中央工作台、当前阶段与下一步。
- [`geo/testing/prompt-baseline.md`](geo/testing/prompt-baseline.md)：冻结的 Baseline v1、当前 Baseline v2、测试结果和实体冲突证据。
- `geo/content/`：三篇 GEO 基础指南的批准草稿和内容简报。
- `geo/distribution/`：LinkedIn/Instagram 分发 SOP 与发布日志。

## `marketing/`：推广与获客

- [`marketing/promotion-plan.md`](marketing/promotion-plan.md)：90 天推广、归因、预算与询盘计划。
- [`marketing/promotion-matrix.md`](marketing/promotion-matrix.md)：渠道分工、单人内容基线和复盘指标。
- `marketing/ads/`：Google Ads 与 Meta Ads 的日期化上线/基线记录。
- `marketing/outbound/`：Outbound 操作流程和空白线索台账模板；真实联系人数据不得进入 Git。

## `privacy/`：隐私、同意与部署

- [`privacy/consent-plan.md`](privacy/consent-plan.md)：Privacy Policy、CMP、Consent Mode 与归因实施方案。
- [`privacy/consent-deployment-runbook.md`](privacy/consent-deployment-runbook.md)：生产部署清单。
- [`privacy/policy-decisions.md`](privacy/policy-decisions.md)：法律主体、地址、保留期限等决策记录。
- [`privacy/policy-draft.md`](privacy/policy-draft.md)：版本控制中的 Privacy Policy 文本。

## `site/`：网站设计与 QA

- [`site/design-brief.md`](site/design-brief.md)：视觉与交互基线。
- [`site/qa-audit-2026-07-03.md`](site/qa-audit-2026-07-03.md)：历史上线前 QA 审计；当前状态仍以 `progress.md` 为准。

## `seo/`：搜索优化

- [`seo/seo.md`](seo/seo.md)：技术 SEO 审查、修复记录与基线。
- [`seo/seo-process.md`](seo/seo-process.md)：面向北美和欧洲 B2B 买家的完整 SEO 研究、实施、发布与复盘流程。
- [`seo/seo-search-language-research-v1.md`](seo/seo-search-language-research-v1.md)：北美和欧洲买家搜索语言、意图歧义、排除词与首轮验证池。
- [`seo/keyword-validation-v1.md`](seo/keyword-validation-v1.md)：候选商业词、技术词和信息词的实时 SERP 意图验证、风险判定与待补数据台账。
- [`seo/keyword-planner-country-validation-v1.md`](seo/keyword-planner-country-validation-v1.md)：21 个候选词在美国、加拿大、英国、荷兰和北欧三国的历史搜索量对照与决策。
- [`seo/keyword-discovery-commercial-us-v1.md`](seo/keyword-discovery-commercial-us-v1.md)：美国商业种子词的 289 条 Keyword Planner 扩展结果、近义聚合、错误意图清洗与保留词。
- [`seo/keyword-discovery-product-material-us-v1.md`](seo/keyword-discovery-product-material-us-v1.md)：美国产品与材料种子词的 Compression、Outdoor、Merino 和 Knitted Fabric 意图验证。
- [`seo/keyword-discovery-procurement-info-us-v1.md`](seo/keyword-discovery-procurement-info-us-v1.md)：美国采购信息种子词的 Tech pack、QC、供应商尽调与 FLATLOCK 意图验证。
- [`seo/keyword-page-mapping-v1.md`](seo/keyword-page-mapping-v1.md)：三批关键词机会主表、现有页面所有权、排除边界和下一轮七国验证清单。
- [`seo/keyword-planner-english-baseline-v2.md`](seo/keyword-planner-english-baseline-v2.md)：28 个英语代表词在美国、加拿大、英国、荷兰和北欧三国的 24 个月需求基线与下一轮 SERP 队列。
- [`seo/serp-intent-validation-us-ca-uk-v1.md`](seo/serp-intent-validation-us-ca-uk-v1.md)：US / CA / UK 的 P0/P1 英语搜索意图样本、错配风险与首批三个页面级机会。
- [`seo/page-audit-sportswear-manufacturer-v1.md`](seo/page-audit-sportswear-manufacturer-v1.md)：Sportswear 商业页的生产 HTML、搜索意图、内容证据、内链、Schema 与静态性能只读审计。
- [`seo/page-audit-knitted-fabrics-manufacturer-v1.md`](seo/page-audit-knitted-fabrics-manufacturer-v1.md)：Knitted Fabrics 商业页的面料采购意图、商业单位、事实证据、认证、询盘路径与静态性能只读审计。
- [`seo/page-audit-technical-knitwear-tech-pack-guide-v1.md`](seo/page-audit-technical-knitwear-tech-pack-guide-v1.md)：Technical Knitwear Tech Pack Guide 的通用查询边界、内容覆盖、技术参考、内链、Schema 与静态性能只读审计。
- [`seo/seo-implementation-checklist-v1.md`](seo/seo-implementation-checklist-v1.md)：首批三页审计汇总，以及按收益、风险、证据依赖和验收条件排序的网站 SEO 实施真值表。
- [`seo/image-optimization-seo-imp-005-006-v1.md`](seo/image-optimization-seo-imp-005-006-v1.md)：Sportswear 与 Knitted Fabrics 共 9 张图片的真无损 WebP、响应式候选、质量验证和 uploads 部署记录。
- [`seo/sportswear-public-capability-fact-sheet-v1.md`](seo/sportswear-public-capability-fact-sheet-v1.md)：SEO-IMP-007 的 Sportswear 性能声称、公开范围、证据类型、快速确认格式与保守改写草案。
- [`seo/moq-update-seo-imp-008-v1.md`](seo/moq-update-seo-imp-008-v1.md)：公开 MOQ 调整为每款 500 件的代码真值、首屏实施、文档同步、历史保留和部署验收记录。

## `operations/`：环境与维护

- [`operations/flywheel-cleanup-guide.md`](operations/flywheel-cleanup-guide.md)：已完成的 Flywheel 清理操作记录。

## `source-content/`：历史来源材料

这里保存公司可控制的历史类目站内容摘录和清单，用于核验与迁移研究。它们不是当前规范站的自动批准事实库；
历史认证、产能、设备、客户和实体表述在重新使用前仍须按 `AGENTS.md` 核验。

## 维护规则

- 新建或实质性改写的内部 Markdown 文档默认使用简体中文。正式网站英文文案、固定测试提示词、原始引文、代码/API/Schema/事件名、URL、路径、命令、字段名、法律实体名和其他必须保留原貌的内容继续使用原生英文；用户明确要求英文时除外。
- 新文档放入最接近的主题目录，不再直接堆到 `docs/` 根目录。
- 根目录只保留高频跨领域入口。
- 日期化快照写入对应领域子目录，并在 `progress.md` 或领域入口中建立链接。
- 移动文档时必须更新仓库内引用并运行 Markdown 本地链接检查。
