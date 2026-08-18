# Outdoor Clothing Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/outdoor-clothing-manufacturer/>
>
> 主要词簇：`outdoor clothing manufacturer`（七国基线 210/月，同比 -73%，意图偏宽，SERP 消费品牌混杂；保留但非高优先）
>
> 次级词簇：`base layers`、`mid-layers`、`outerwear`、hiking、trekking、cold-weather layering、merino-blend、Genesis fleece
>
> 依据：[`../../seo-tags.md`](../../seo-tags.md)、[`../sitemap.md`](../sitemap.md)、[`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md)、[`Sportswear` 审计](page-audit-sportswear-manufacturer-v1.md)
>
> 审计方式：生产 HTML（curl）、生产 URL/robots/Sitemap/旧路径响应与本地模板静态检查（`inc/product-category-data.php`、`template-parts/product-category/page.php`、`functions.php`）
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源
>
> 任务编号：SEO-IMP-015（剩余页面逐页审计）

## 1. 结论先行

**结论：无 Critical 问题；当前不需要字段级动作，主要缺口与全站共享待部署修复重叠。**

- 保留 `/outdoor-clothing-manufacturer/`、当前 Title 和 H1；
- `outdoor clothing manufacturer` 继续作为页面主词。该词量小、同比下滑且 SERP 消费品牌混杂，但在 GSC 出现非品牌 Query/Page 数据前，不重写 Title/H1，也不拆 hiking/trekking 平行页；
- 页面已具备索引、语义结构、四个子类产品覆盖、内链和询盘路径；
- 本页独有的待办只有两类：产品图响应式优化（参照 SEO-IMP-005/006 流程）与术语大小写修正（并入 SEO-IMP-012 同批）；其余问题（MOQ 1,000、重复 stylesheet、Logo 社交图）均为已知共享项，本地已修复或已在清单中排队；
- 本轮 seo CLI 爬取中该页响应约 1.5s+，与全站均值一致，本次实测 0.74s，仅记录方向，不单列性能问题。

## 2. SEO Audit — `/outdoor-clothing-manufacturer/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，`robots` 为 `follow, index`，Canonical 自引用正确，只有一个 H1，未发现缺失 Title、Meta、Schema 或意外 `noindex`。

#### 🟡 Warning

##### W1. 生产 MOQ 仍显示 `1,000 pcs per style`，与当前业务真值 500 不符（本地已修复待部署）

- **依据**：生产 HTML 规格条渲染为 `MOQ 1,000 pcs Per style.`；所有者已于 2026-08-18 将公开 MOQ 调整为每款 500 件，本地 `functions.php:25-27` 的 `myathletik_public_moq_pieces()` 已返回 `500`（SEO-IMP-008 业务事实同步，待部署）。
- **失效判定**：部署后生产页面规格条显示 `500 pcs`，本条即关闭。
- **先行指标**：部署后查看本页源码规格条；GSC 重新抓取后 URL Inspection 的渲染 HTML。
- **修法**：无需新增工作，随 SEO-IMP-008 部署生效。
- **附带观察（不升级为 finding）**：询盘表 `Estimated Order Quantity` 下拉仍以 1,000 件分档（`Under 1,000 pcs` / `1,000–2,000 pcs` 等）。该配置在 Fluent Forms 插件数据中，SEO-IMP-008 已明确 `Estimated Order Quantity` 与 per-style MOQ 保持分离；MOQ 降至 500 后 `Under 1,000 pcs` 档位跨度变大，是否细分由所有者决定，本审计不改表单。

##### W2. 技术术语大小写与项目规范不一致

- **依据**：生产可见正文中 `activeseam` 与 `flatlock` 各出现 1 次（实测渲染文本计数），来源为 `inc/product-category-data.php:248` 的 `construction` 段（`Same flatlock and activeseam construction as our sportswear...`）。AGENTS.md §6 要求技术名称用 `ACTIVESEAM`；`FLATLOCK` 作为技术名称时保持大写，自然描述 `flatlock seam/stitch` 才允许小写。当前语境是技术结构名称，应大写。
- **失效判定**：若所有者确认该处按自然描述处理而非技术名称，则可保留小写；但同句把两种接缝并列作为 construction 卖点，更接近技术名称用法。
- **先行指标**：修正后页面渲染文本中 `ACTIVESEAM`/`FLATLOCK` 计数；无搜索指标预期，属一致性与专业度修复。
- **修法**：并入 SEO-IMP-012 同批处理，改 `inc/product-category-data.php:248` 一处；该段同时出现在 Sportswear 审计 W3，避免只修一页。

##### W3. SEO 元数据存在两个不同文本来源（已知待办 SEO-IMP-011，非新发现）

- **依据**：生产 Meta Description 为 156 字符，与 `seo-tags.md:48-49` 一致（`Outdoor clothing manufacturer for technical base layers, mid-layers & outerwear...`）；但 `inc/product-category-data.php:216` 另存一条不同文本（`...for hiking, skiing, and cold-weather layering - thermal base layers, mid-layers, and merino-blend knitwear for outdoor brands.`）。生产输出由 Rank Math 数据控制，PHP 字段未成为实际 Meta。
- **失效判定**：SEO-IMP-011 明确单一真值来源或为未使用字段加注释后，本条关闭。
- **先行指标**：后续维护时不再出现"改了代码但生产 Meta 未变"的误判；无搜索指标。
- **修法**：随 SEO-IMP-011 处理；本轮不修改。Meta 156 字符超出 155 内部软目标，V2-002 软长度警告已记录，按规则只报 🟡，不据此建议改写。

##### W4. 四张产品 JPG 缺少响应式图片标记与固有尺寸

- **依据**：实测下载四张生产产品图，均为 1600 × 1200 JPG：

  | 文件 | 像素 | 生产大小 |
  |---|---:|---:|
  | `IMG_7776(1)_4X3.JPG` | 1600 × 1200 | 0.18 MB |
  | `IMG_7874(1)_4X3.JPG` | 1600 × 1200 | 0.31 MB |
  | `1U153835(1)_4X3.JPG` | 1600 × 1200 | 0.28 MB |
  | `1U153247(1)_4X3.JPG` | 1600 × 1200 | 0.24 MB |

  合计约 1.01 MB，明显好于 Sportswear 的 6.97 MB PNG。生产 HTML 中四图均有 `loading="lazy"`，但缺 `width`/`height`、`srcset`/`sizes`、`decoding="async"` 和 WebP 派生。本地 `template-parts/product-category/page.php:143` 已补 `decoding="async"`（待部署），但宽度/高度/`image_webp` 数据字段在 Outdoor 数据中尚不存在（`inc/product-category-data.php:226-247`），部署后缺口仍在。
- **失效判定**：四图输出 `width`/`height`、`srcset`/`sizes`、`decoding` 并有 WebP 候选后，本条关闭。若所有者认为 1.01 MB 总量可接受且不做本页图片批次，也可明示降级关闭。
- **先行指标**：部署后 Network 面板移动端实际下载量；GSC Core Web Vitals（本页无首屏大图，风险主要是下滚下载量与移动端过度分辨率）。
- **修法**：参照 SEO-IMP-005/006 流程为 Outdoor 生成响应式 WebP 与数据字段；产物放 `uploads/myathletik-theme/assets/images/outdoor clothing/`，不入主题仓库。本批可与其他未优化品类页合并执行。

##### W5. 社交图与 Schema 主图仍使用通用 270 × 270 Logo（已在清单排队 SEO-IMP-013）

- **依据**：生产 `og:image`、`twitter:image` 与 JSON-LD `primaryImageOfPage` 均指向 `…/uploads/2026/06/cropped-ATHLETIK_R_512.jpg`（270 × 270 Logo）。SEO-IMP-002 只覆盖 Technical Guides Hub 与三篇指南（本地已修复待部署），品类页选图仍属 SEO-IMP-013（待选图）。
- **失效判定**：所有者批准 Outdoor 代表图并部署后，本条关闭。
- **先行指标**：页面被分享/抽取时的摘要图；无直接排名指标。
- **修法**：随 SEO-IMP-013 选图流程处理；不阻断索引，低优先。

##### W6. Child stylesheet 重复加载与 head 阻塞脚本（已知共享问题，本地已修复待部署）

- **依据**：生产 HTML 同时出现 `myathletik-child-style-css` 与 `generate-child-css`（另含 `generatepress-style`、`generate-style`）；head 中有 Cookiebot、WP Consent API、Cookiebot integration、jQuery、jQuery Migrate 五个无 `defer`/`async` 的阻塞脚本。与 Sportswear 审计 W6 完全相同。
- **失效判定**：部署后每页只加载一份 child `style.css`，本条关闭。
- **先行指标**：部署后页面源码 CSS handle 计数；PageSpeed 阻塞请求项。
- **修法**：随 SEO-IMP-003 部署生效；脚本延迟需结合同意管理与表单依赖单独验证，不在本审计动作。

##### W7. Header/Footer 共用 Logo 缺少固有尺寸（已知待办 SEO-IMP-024）

- **依据**：生产 HTML 中两张 `cropped-ATHLETIK_R_512.jpg`（header 与 footer）均无 `width`/`height` 属性。已在 SEO-IMP-024 记录为全站共享项。
- **失效判定 / 先行指标 / 修法**：随 SEO-IMP-024 单独处理；不阻塞本页其他工作。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index`；`robots.txt` 未屏蔽该路径（`/robots.txt` 经 301 到 `/?robots=1` 返回 200，为 WordPress 正常行为）；
- Title 为 `Outdoor Clothing Manufacturer | Athletik Clothing`，49 字符，与 `seo-tags.md:46` 一致；
- Meta Description 与 `seo-tags.md:48-49` 一致，包含主要词（156 字符软警告见 W3）；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Outdoor Clothing Manufacturer`，与 `docs/sitemap.md:100` 一致；
- H2/H3 顺序正确：四个子类 H3（Mid-layer tops and hoodies、Cold-weather layering pieces、Hiking and trekking knitwear、Merino-blend and Genesis fleece insulation layers）均位于产品范围 H2 下，与任务背景中的四个子类一致；
- 6 张 `<img>` 均有非空 alt，未用文件名作 alt；四张产品图 alt 使用子类标题；
- 四张产品图均在首屏以下并使用原生 lazy loading；页面无首屏大图，不存在 LCP 图被 lazy-load 的问题；
- JSON-LD 可解析，包含 `LocalBusiness`/`Organization`、`WebSite`、两个 `ImageObject` 和 `CollectionPage`；
- 页面在 `page-sitemap.xml` 中只出现一次，`lastmod` 为 2026-08-08；
- 首页生产 HTML 两处链接该 URL（导航 + 品类区块），主导航包含 Outdoor Clothing；
- 页面向 Sportswear、Merino Wool 和 Services 输出上下文相关内链；
- 页面覆盖 base layers、mid-layers、outerwear、hiking、skiing、trekking 与 cold-weather layering，未用 startup、低 MOQ 或消费零售文案迎合错误意图；
- 询盘表包含产品类别、预计数量和 Business Type，可用于过滤不合格询盘；
- 正文未出现俄罗斯区域表述（生产 HTML 中的 `Russia` 仅为 Fluent Forms 国家下拉选项，非业务声称）；区域表述问题不适用本页。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `outdoor clothing manufacturer` | Title、H1、Meta、URL 和正文一致承接；基线 210/月、同比 -73%、意图偏宽 | 保持主词；非高优先，等 GSC 数据再评估字段微调 |
| SERP 消费品牌混杂 | 任务背景的 SERP 意图验证显示该词消费品牌结果多 | 不改 B2B 定位迎合消费意图；当前 OEM/ODM kicker、MOQ 和询盘表已明确商业边界 |
| base/mid/outer 分层词 | Meta 覆盖 base layers、mid-layers、outerwear，正文展开 thermal、cold-weather layering | 保持自然覆盖，不堆叠变体 |
| hiking / trekking / skiing | 子类 H3 与正文自然覆盖 | 不创建 hiking/trekking 平行页（属不做事项的近义页拆分） |
| merino-blend / Genesis fleece | 子类 04 与 construction 段覆盖；Merino 主词归 `/merino-wool-manufacturer/` | 边界正确：本页只讲混纺应用，不抢 Merino 页主词 |
| B2B/OEM 任务 | Hero kicker、OEM/ODM、full-package、tech pack、MOQ、询盘表均覆盖 | 匹配；SEO-IMP-008 首屏资格条方案已撤销，资格信息保留在规格条，不再评估前移 |
| 技术指南内链 | 本页无指向三篇指南的上下文链接（SEO-IMP-001 只覆盖 Sportswear/Knitted Fabrics/Services） | 记录为候选增强，不自动执行；样本不足，等指南页 Query 数据 |

页面当前缺口不是关键词覆盖，而是与全站一致的待部署修复和证据/术语一致性。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无。生产页面未渲染 `【CONTENT: ...】` 或 `【NEEDS INPUT: ...】`。`inc/product-category-data.php:249` 的 `image_note` 占位符因子类存在而不渲染（`page.php:173` 在有 `subcategories` 时跳过 gallery 区块），无线上暴露。

### Suspected facts needing owner confirmation

- `Genesis fleece` 在页面出现 5 次，作为自有/特定保温面料名称使用。任务背景已将 `Merino-blend & Genesis fleece` 列为已确认子类，视为已批准事实，不置 `【NEEDS INPUT: ...】`；若未来在 Meta/Schema 中进一步放大该名称，需先确认其公开口径。
- `construction` 段中 `the seams that prevent chafing in a gym` 是机制性描述而非无条件结果保证，语气可接受；未出现 `chafe-free`、`guaranteed` 或未经确认的认证/产能/测试数值。
- `conditions sportswear was never meant to handle` 中的 `never` 指向泛类 sportswear 的修辞对比，不是对本页产品的绝对化声称；记录方向，不要求修改。

### Terminology drift

- `inc/product-category-data.php:248`：`activeseam` → `ACTIVESEAM`；`flatlock` → `FLATLOCK`（见 W2）。
- 其余规范术语（Merino wool、COVERSTITCH、OVERLOCK、SCREENPRINT、SELF FABRIC、Carbondry、Laser perforation）在本页未出现或大小写正确。

### Tone issues

- 整体为技术、具体的 B2B 语气；无 `world-class`、`industry-leading`、`best-in-class` 等空泛词；
- 无 startup 孵化、低 MOQ、客户名称或工厂数量声称。

### Passed

- 页面明确面向 outdoor brands 的 OEM/ODM 项目；
- 规格条 MOQ 字段由集中函数输出（生产值过时的处理见 W1）；
- 无编造认证、产能或客户。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/outdoor-clothing/` 返回 HTTP 301 并跳转到
`https://www.athletikapparel.com/outdoor-clothing-manufacturer/`，终点 HTTP 200。

该同域 301 属于 V2-005 调查中的 6 条 `/products/<x>/` WordPress 301 之一：只记录，不动作。本轮不新增、不删除也不改写任何重定向。

## 6. Suggested next actions — do not auto-apply

1. 随 SEO-IMP-003/008 部署验证本页：规格条显示 `MOQ 500 pcs`、child `style.css` 只加载一份；
2. 将 Outdoor 的 `activeseam`/`flatlock` 术语修正并入 SEO-IMP-012 同批，避免只修一页造成品类间不一致；
3. 参照 SEO-IMP-005/006 流程为 Outdoor 四张产品图生成响应式 WebP、`width`/`height`、`srcset`/`sizes`，产物放 uploads，可与其他未优化品类合并为一批；
4. 所有者按 SEO-IMP-013 流程确认 Outdoor 代表图，作为社交图/Schema 主图；
5. 在 Search Console 对该 URL 做 URL Inspection，等待非品牌 Query/Page 样本；无数据前保持当前 Title/H1/Meta；
6. 若指南页 Query 数据显示 Outdoor 相关主题有曝光，再评估为本页增加到 FLATLOCK 指南或 Tech Pack 指南的上下文链接（参照 SEO-IMP-001 模式）。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、旧路径 301 正常工作 |
| Title | 保持 | 49 字符、精确主要词、与规范一致；主词非高优先但无改写依据 |
| H1 | 保持 | 唯一且与 sitemap 真值一致 |
| Meta | 保持 | 与规范一致；156 字符软警告已记录，不据此改写；术语双真值问题随 SEO-IMP-011 处理 |
| 正文 | 仅术语大小写列为微调候选 | 无证据缺口或绝对化声称需要所有者输入 |
| MOQ 规格条 | 部署后应为 500 pcs | 本地已修复待部署（SEO-IMP-008） |
| 内链 | 保持；指南链接列为条件候选 | 相关品类与 Services 覆盖合理，指南链接等 Query 数据 |
| 图片 | 保持内容与 alt；响应式优化列为后续批次 | 1.01 MB 总量可控，缺静态标记与 WebP |
| Schema | 保持现有类型；主题图随 SEO-IMP-013 | CollectionPage 正确，Logo 主图不阻断索引 |
| 新页面 | 不创建 | hiking/trekking/merino-blend 属同一买家任务，拆页增加蚕食风险 |
