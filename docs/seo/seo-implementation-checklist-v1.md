# SEO 审计汇总与实施清单 V1

> 建立日期：2026-08-17
>
> 市场范围：北美与欧洲
>
> 当前对象：<https://www.athletikapparel.com/>
>
> 输入：[`Sportswear` 审计](page-audit-sportswear-manufacturer-v1.md)、[`Knitted Fabrics` 审计](page-audit-knitted-fabrics-manufacturer-v1.md)、[`Tech Pack Guide` 审计](page-audit-technical-knitwear-tech-pack-guide-v1.md)、[`关键词—页面映射`](keyword-page-mapping-v1.md)、[`US Performance Fabric 关键词验证`](data/keyword-planner-performance-fabric-validation-us-2026-08-17.csv)
>
> 状态说明：本文是实施真值表；历史审计继续保留当时快照，不回写成“已经通过”

## 1. 执行结论

当前网站没有全站抓取、索引、Canonical、Title、H1 或 Sitemap Critical 问题。下一阶段不是批量增加关键词，也不是重建更多近义页面，而是提高以下四类可积累信号：

1. **主题关系**：让商业页、技术指南和 Services 通过自然上下文内链形成清晰主题网络；
2. **页面证据**：用真实业务边界、规格、流程、测试和认证文件支持页面承诺；
3. **交付质量**：减少重复 CSS 和超大图片，控制移动端下载量及 Core Web Vitals 风险；
4. **外部权威与反馈**：持续获得真实引用/链接，并用 GSC 的 Query/Page 数据决定后续 Title、Meta 和正文微调。

“搜索权重”不是一个可以直接填写的单项分数。可控目标是让 Google 更容易确认：页面可以稳定抓取、与搜索任务匹配、站内主题关系明确、内容有一方证据、体验可靠，并且站外存在真实提及。

## 2. 三页审计汇总

| 页面 | 已通过 | 主要缺口 | 当前决策 |
|---|---|---|---|
| `/sportswear-manufacturer/` | 200、可索引、URL/Title/H1/Meta/Canonical、Schema、首页入口和基本内链正常 | 约 6.97 MB 产品 PNG；若干性能/绝对化表述缺一方证据；MOQ 资格信息偏后；`ACTIVESEAM` 术语漂移；社交图仍为 Logo | 保留 URL/Title/H1；先做性能与事实核验，不拆 Activewear/Fitness 页面 |
| `/knitted-fabrics-manufacturer/` | 200、可索引、URL/Title/H1/Canonical、页面所有权和基础面料语义正常；独立面料供货、fabric-specific MOQ/开发/报价语境已在本地补齐 | GRS、追溯、自有工艺、测试和性能声称仍待证据；约 11.47 MB 源产品 PNG 的响应式 WebP 待部署 | 保留 URL/Title/H1/Meta；`performance knit fabric` 与 `sportswear fabric manufacturer` 作为次级词；先完成 SEO-IMP-009 部署验收和 SEO-IMP-010 证据核验，不创建近义面料页 |
| `/technical-knitwear-tech-pack-guide/` | 已收录；Title/H1/Meta、Article/FAQ/Breadcrumb、技术术语、官方参考和 Hero 性能正常 | 商业页上下文链接较少；Open Graph/Twitter/WebPage 主图使用 Logo；重复 child stylesheet | 保留页面范围；先修内链、专属主图和共享 CSS，不做通用模板页 |

共同结论：当前排名上限更可能受主题连接、证据完整度、性能和域名权威影响，而不是关键词是否重复得足够多。

### 2.1 Knitted Fabrics 美国关键词验证

本批数据来自 Google Keyword Planner，美国、所有语言、Google 网络，区间为 2024-08 至 2026-07。`NR` 表示 Google 未报告可用数据，不等同于已经证明搜索量严格为零。`Competition` 是 Google Ads 广告竞争，不是自然搜索难度。

| 关键词 | Planner 月均量 | 重算近 12 个月均量 | 意图判断 | 页面决策 |
|---|---:|---:|---|---|
| `knitted fabric manufacturer` | 70 | 41.7 | 明确的 B2B 针织面料制造商采购 | 保持页面主词 |
| `sportswear fabric manufacturer` | 70 | 32.5 | 明确的运动服面料采购，但同比波动较大 | 保持次级商业词并监测 |
| `performance knit fabric` | 30 | 35.0 | 高度相关的产品/材料词，没有明确 manufacturer 限定 | 用于现有产品分类、H2 和自然正文 |
| `performance fabrics` | 2,400 | 2,275.0 | 高需求但混合服装、家居、室内装饰与知识型意图 | 仅作次级主题；条件式评估未来指南 |
| Performance + `manufacturer` 变体 | NR | NR | 精确采购变体未获得需求信号 | 不替换当前主词，不新建近义商业页 |

据此锁定当前页面架构：URL `/knitted-fabrics-manufacturer/`、Title 和 H1 继续由 `knitted fabric manufacturer` 承担；`performance knit fabric` 和 `sportswear fabric manufacturer` 作为同页次级词；宽泛的 `performance fabrics` 不进入 URL、Title 或 H1。搜索量高低不能覆盖业务事实门槛，SEO-IMP-009 与 SEO-IMP-010 仍是实施前置条件。

## 3. 优先级方法

每个项目按四个维度排序：

| 维度 | 高 | 中 | 低 |
|---|---|---|---|
| 预期收益 | 能影响多个目标页、抓取理解、相关性、性能或合格询盘 | 影响单页或辅助搜索展示 | 主要是维护一致性 |
| 变更风险 | 可能改变页面搜索任务、业务承诺、URL、表单或事实合规 | 需要回归页面/Schema/资源部署 | 可回滚的链接、元数据或资源去重 |
| 证据置信度 | 已由生产 HTML、官方资料或一方事实确认 | 有审计信号，但需生产验证 | 仅为推测或数据样本不足 |
| 依赖成本 | 需要所有者、证书、测试、图片处理或生产部署 | 需要代码和页面回归 | 只需小型代码/文档改动 |

执行原则：先做“高/中收益 + 低风险 + 高置信度”，再做“高收益 + 有事实依赖”，最后才做搜索词和页面结构实验。

## 4. SEO 实施主清单

### A. 第一批：高收益或中收益、低风险

| ID | 项目 | 收益 | 风险 | 状态 | 验收标准 |
|---|---|---|---|---|---|
| SEO-IMP-001 | Tech Pack Guide 增加到 Knitted Fabrics、Sportswear、Services 的正文上下文链接；Knitted Fabrics 回链指南 | 高：加强商业页与技术内容的主题图谱，并为合格买家提供下一步路径 | 低 | **本地已完成，待部署验证** | 4 个目标 URL 均为 200；锚文本自然；页面不产生重复/错误链接 |
| SEO-IMP-002 | Technical Guides Hub 和三篇指南使用各自批准封面作为 Open Graph、Twitter 及 WebPage `primaryImageOfPage` | 中：提高分享摘要相关性，并统一可见内容、Article 和 WebPage 图像实体 | 低 | **本地已完成，待部署验证** | 页面源代码输出专属 WebP；Logo 不再作为这些页面主图；JSON-LD 可解析 |
| SEO-IMP-003 | 移除 GeneratePress 自动 child stylesheet 与主题手动 enqueue 造成的重复 `style.css`，同时停止加载无实际规则的父主题 `style.css` 头文件 | 中：减少两个阻塞型 CSS 请求/解析项，覆盖全站 | 低 | **本地已完成，待部署验证** | 每页只出现 `generate-style`、Google Fonts 和一份 child `style.css`；视觉无回归 |
| SEO-IMP-004 | 将 Sitemap `lastmod` 与本次主题渲染正文/Schema 更新同步 | 低到中：帮助搜索引擎区分真实更新，不伪造全站新鲜度 | 低 | **本地已完成，待部署验证** | 只更新 Technical Guides、三篇指南和 Knitted Fabrics 等实际变化 URL |

### B. 第二批：高收益、需要资源处理或所有者输入

| ID | 项目 | 收益 | 风险 | 依赖 | 状态 |
|---|---|---|---|---|---|
| SEO-IMP-005 | Sportswear 四张产品图生成 6 档真无损 WebP，并补 `width`/`height`、`srcset`/`sizes`、`decoding="async"` | 高：480–800 px 候选相对原 PNG 合计减少 82.30%–93.68%，同时避免移动端过度分辨率 | 中：图片位于 uploads，需单独部署并做视觉回归 | 源 PNG 已保留；24 个派生图已生成；待同步 uploads | **本地已完成，待部署与生产验收** |
| SEO-IMP-006 | Knitted Fabrics 五张产品图执行同样的响应式真无损优化 | 高：480–800 px 候选相对原 PNG 合计减少 80.32%–93.37% | 中：细节图清晰度、资源路径和上传部署必须核对 | 源 PNG 已保留；30 个派生图已生成；待同步 uploads | **本地已完成，待部署与生产验收** |
| SEO-IMP-007 | 建立 Sportswear 公开能力事实表并修正绝对化表述 | 高：减少不可信承诺，提高专业采购页证据质量 | 中：错误修改会弱化真实能力或制造新声称 | 所有者确认 SP-01–SP-10 均可满足，但报告按项目提供；页面改为能力/规格/测试条件表达 | **本地已完成，待部署与生产验收** |
| SEO-IMP-008 | 评估将 Sportswear `MOQ 500 pieces per style` 资格信号移到首屏，并同步全站业务事实 | 中：资格信息有助于预筛，但不是直接排名因素 | 中：首屏信息层级和视觉节奏可能受损 | 500 件业务事实已同步；`Estimated Order Quantity` 与 per-style MOQ 保持分离 | **首屏方案已撤销；业务事实同步保留，待部署验收** |
| SEO-IMP-009 | 确认 Knitted Fabrics 是否接受独立面料订单，并建立 fabric-specific MOQ、报价单位、开发和交付流程 | 高：决定页面是否真正匹配 `knitted fabric manufacturer` 商业搜索承诺 | 高：错误答案会改变页面定位、表单和 Meta | 所有者已于 2026-08-18 完成 [`Knitted Fabrics 独立面料业务事实表`](knitted-fabrics-business-fact-sheet-v1.md)；URL/Title/H1/Meta 与表单结构保持不变 | **本地已完成，待部署与生产验收** |
| SEO-IMP-010 | 核验并重写 Knitted Fabrics 的 GRS、追溯、自有工艺、测试和性能声称 | 高：补强信任并降低认证/事实风险 | 高：必须与当前证书主体、范围和有效期一致 | scope certificate、适用实体/产品及可公开测试材料 | 阻塞于证据 |

### C. 第三批：数据驱动的页面微调

| ID | 项目 | 收益 | 风险 | 启动条件 | 状态 |
|---|---|---|---|---|---|
| SEO-IMP-011 | 统一产品页 SEO 字段真值来源，清理或注释未参与生产输出的 `meta_description` | 中：避免以后“代码已改、生产未变” | 低到中 | 先确认 Rank Math/代码各字段的最终职责 | 待处理 |
| SEO-IMP-012 | 修正 Sportswear 中 `ACTIVESEAM`/FLATLOCK 术语，并同步规范 Meta 与生产 Rank Math 字段 | 中：语义和品牌专业度一致 | 低到中 | 与 SEO-IMP-007 同批，避免只修大小写却保留无证据表达 | 待处理 |
| SEO-IMP-013 | 为 Sportswear、Knitted Fabrics 等类目选择批准的代表图作为社交图/Schema 主图 | 中：改善页面分享和主题图像信号 | 低到中 | 所有者确认每页代表图；生成合适派生尺寸 | 待选图 |
| SEO-IMP-014 | 复核首页及多个类目 157–165 字符 Meta、Services 63 字符 Title | 低到中：主要影响摘要截断和 CTR，不是索引问题 | 中：过早缩短可能损失意图信息 | 先取得页面级 GSC Query/CTR 数据 | 观察 |
| SEO-IMP-015 | 审计 Underwear、Outdoor、Merino、Silk、Sports Accessories 与三篇指南剩余两篇 | 高：扩大已验证的页面级基线 | 低 | 第一批部署稳定后逐页执行 | 待处理 |
| SEO-IMP-016 | 为类目页评估 `Service` Schema，保持可见内容和事实一致 | 低到中：增强机器可读服务关系，但不作为排名捷径 | 中 | 页面业务事实确认；通过 Schema Validator | 待评估 |
| SEO-IMP-022 | 固化 Knitted Fabrics 主次词架构：保留现有 URL/Title/H1，以 `performance knit fabric` 和 `sportswear fabric manufacturer` 补充产品、应用和询盘语境 | 中到高：同时保留精准采购意图和 Performance 主题覆盖，不引入近义页内耗 | 低到中：事实不足时扩写会放大未证实的工艺、测试或独立供货承诺 | SEO-IMP-009 已完成；SEO-IMP-010 证据核验后逐项复核产品与性能表述，不做关键词堆叠 | 商业语境已补齐；证据型扩写阻塞于 SEO-IMP-010 |

### D. 第四批：内容扩展与站外权威

| ID | 项目 | 收益 | 风险 | 启动条件 | 状态 |
|---|---|---|---|---|---|
| SEO-IMP-017 | 基于真实 Query/Page 数据决定是否补 Tech Pack 的简短 definition/scope 段 | 中到高：承接 `clothing/garment/apparel tech pack` 的相关曝光 | 中：可能把页面拉向模板、工具或 startup 意图 | 匹配查询持续获得曝光但排名/CTR不足 | 观察 |
| SEO-IMP-018 | QC Guide 内容简报与证据采集 | 高：独立的采购尽调任务和潜在链接资产 | 高：不能发明 QC 节点、记录或标准 | 一方 QC 流程、检查记录、图片和责任边界齐全 | 未批准新 URL |
| SEO-IMP-019 | NL / SE / NO / FI 本地语言研究 | 中：验证英语之外的欧洲买家语言 | 低 | 英语基线实施和监测稳定 | 待研究 |
| SEO-IMP-020 | 技术指南持续分发并争取真实行业引用、供应商目录/协会资料页及合作方链接 | 高：增加独立站外提及和引用域，而不是依赖站内信号 | 中：必须是真实关系，禁止购买批量垃圾链接 | 建立目标来源、发布记录和引用 URL 台账 | 持续 |
| SEO-IMP-021 | 每季度复核指南引用的 ASTM/AATCC/ISO 等标准版本和链接 | 中：维持技术内容可靠性和更新依据 | 低 | 指定复核日期与负责人 | 待建立节奏 |
| SEO-IMP-023 | 条件式评估 Performance Fabrics 信息指南，明确限定 performance apparel / knit fabric，避免进入家具和室内装饰意图 | 中：有机会承接宽泛研究流量并内链到面料商业页 | 高：宽词意图混杂，过早建页可能产生无效流量和主题稀释 | 当前商业页事实完整；GSC 出现相关 Query，或独立 SERP/内容缺口验证通过；具备一方材料与测试证据 | 候选研究，未批准新 URL |

## 5. 已完成的本地代码与资源范围

本地第一批修改严格限制在以下范围：

- `functions.php`：只保留一份 child stylesheet，并依赖 GeneratePress 的正式 `generate-style`；
- `template-parts/technical-article/content-technical-knitwear-tech-pack-guide.php`：增加三条上下文链接；
- `inc/product-category-data.php`：Knitted Fabrics 增加 Tech Pack Guide 回链；
- `rank-math.php`：技术内容使用已存在的批准封面作为社交图和 Schema 主图；同步真实 `lastmod`；
- `inc/product-category-data.php` 与 `template-parts/product-category/page.php`：Sportswear 和 Knitted Fabrics 共 9 张下滚图片接入 WebP `srcset`、PNG 回退、固有尺寸、描述性 alt、lazy loading 与 async decoding；
- `inc/product-category-data.php` 与 `template-parts/product-category/page.php`：Knitted Fabrics 增加品类级 Hero/能力标题/规格卡覆盖，展示独立面料供货、典型 `1,000-3,000 kg` MOQ、完整 fabric brief、开发周期和量产周期；其余六个成衣品类继续使用共用规格；
- `style.css`：补充 `<picture>` 的块级布局，不改变现有图片比例和交错版式；
- uploads：保留 9 张源 PNG，生成 54 个真无损响应式 WebP；详见 [`image-optimization-seo-imp-005-006-v1.md`](image-optimization-seo-imp-005-006-v1.md)；
- 未改变任何 URL、Title、H1、Meta、FAQ、主要关键词归属或未经确认的能力声称；
- uploads 不在主题 Git 仓库中，部署时必须单独同步图片资源。

## 6. 第二批所需所有者事实输入

### Sportswear

已建立并完成 [`sportswear-public-capability-fact-sheet-v1.md`](sportswear-public-capability-fact-sheet-v1.md)。所有者确认 SP-01–SP-10 均可作为开发能力满足，但报告不是每项、每个项目都能提供。页面已保留能力词并移除无条件结果保证；具体数值或合格结果只在对应报告可核对时使用。

### Knitted Fabrics

所有者已完成 [`knitted-fabrics-business-fact-sheet-v1.md`](knitted-fabrics-business-fact-sheet-v1.md)：接受独立面料订单；典型 MOQ 为 `1,000-3,000 kg`，实际随成分、价格、规格和项目变化；通常按 kg 报价，也可使用其他单位；完整 fabric brief 为报价输入；swatch、counter sample、lab dip、sample yardage 和 approval sample 均可按项目提供。

所有者授权开发、量产和交付先使用行业常规表达。本地页面暂用 `Typically 2-4 weeks` 开发和 `Typically 4-6 weeks` 量产，并写明起算条件与最终 quotation 确认边界。Contact Form 已有 `Knitted Fabrics` 选项，因此不新增表单分支；`Estimated Order Quantity` 保持成衣预计订单量含义，面料买家通过 Message 提供 kg 数量和完整规格。

SEO-IMP-010 仍需单独确认 knitting、dyeing、finishing、testing 的责任边界，以及 GRS 当前证书主体、编号、有效期、范围、适用产品和 transaction certificate 边界。在证据完成前，不扩大认证、测试、自有工艺或性能声称。

## 7. 部署与验收顺序

1. 在本地运行 PHP 语法和静态链接检查；
2. 逐页检查 Desktop 1440 px 与移动端布局，尤其是 Related links 和文章正文；
3. 部署主题代码到 staging/production，并单独同步 SEO-IMP-005/006 的 54 个 uploads WebP；
4. 检查页面源代码，确认只加载一份 child `style.css`；
5. 检查三篇指南及 Hub 的 `og:image`、`twitter:image` 与 JSON-LD `primaryImageOfPage`；
6. 使用 Rich Results Test 与 Schema Validator 复核 Article、FAQPage、BreadcrumbList 和 ImageObject；
7. 检查 Sitemap 中实际变化页面的 `lastmod`；
8. 在 Search Console 对实际变化的重点 URL 执行 URL Inspection；不对未变化的全部页面机械请求重新收录；
9. 记录部署日，并在 7 天与 28 天窗口比较数据。

## 8. Search Console 与转化监测

每周记录目标页的：

- Indexing 状态与最后抓取时间；
- Clicks、Impressions、CTR、Average position；
- Query × Page × Country，北美和欧洲分开；
- Brand / non-brand 查询分组；
- Knitted Fabrics 将 `knitted fabric manufacturer`、`sportswear fabric manufacturer`、`performance knit fabric` 与宽泛的 `performance fabrics` 分组记录，避免用宽词曝光掩盖合格采购词表现；
- Core Web Vitals 与移动端问题；
- GA4 `generate_lead` 按 Landing Page 的数量和合格度。

内部决策规则：

| 观察 | 优先动作 |
|---|---|
| 页面未收录或抓取异常 | 先查状态码、Canonical、robots、Sitemap 和实际内链；不先改文案 |
| 有匹配曝光但位置约 8–30 | 加强证据、上下文内链、页面任务完整度和外部引用 |
| 位置较好但 CTR 持续偏低 | 结合实际 Query 测试 Title/Meta，而不是同时改 H1/正文 |
| 有流量但无合格询盘 | 检查资格信息、搜索意图和 CTA，不把更多流量直接视为成功 |
| 28 天仍无匹配曝光 | 复核索引、页面所有权、搜索需求和域名权威；不立即创建近义页 |

建议每次 Title/Meta 测试只改一个主要变量，保留变更日期和前后 28 天对照。样本过小则继续观察，不从一两次曝光推导结论。

## 9. 不做事项

- 不修改已经收录且表现正常的 URL；
- 不为 Activewear/Fitness、Clothing/Garment/Apparel Tech Pack 或单复数变体创建平行页；
- 不因 `performance fabrics` 的宽泛高搜索量，把 Knitted Fabrics URL、Title 或 H1 改成 Performance Fabrics；
- 不堆叠 `manufacturer`、`supplier`、`factory` 等近义词；
- 不在证据不足时扩大认证、性能、工厂、测试、产能或客户声称；
- 不购买批量外链、目录包或 PBN；
- 不把 uploads 图片放入主题 Git 仓库；
- 不把 Schema 当成替代可见内容和真实证据的排名捷径；
- 不用短期 Average position 波动频繁重写 Title/H1。

## 10. 下一执行点

当前本地修改完成验证后，按以下顺序继续：

1. 将主题代码与 SEO-IMP-005/006 的 54 个 WebP 同步到 staging/production，完成视觉、HTTP、MIME 与 Network 候选验收；
2. 完成 SEO-IMP-007 的 staging/production 文案验收，并继续收集可公开的项目级测试证据；
3. 部署并验收 SEO-IMP-009 的 Knitted Fabrics fabric-specific 商业信息，确认其他六个成衣品类规格无回归；
4. 完成 SEO-IMP-010 证据核验，再按 SEO-IMP-022 复核 Knitted Fabrics 的产品、性能和次级词语境；
5. 建立 GSC 7 天/28 天页面级监测，分别观察商业采购词与宽泛 Performance 词；
6. 再开始剩余页面审计、欧洲本地语言研究和条件式新内容；Performance Fabrics Guide 仍需单独批准。
