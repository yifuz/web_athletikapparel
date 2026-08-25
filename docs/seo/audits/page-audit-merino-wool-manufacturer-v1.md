# Merino Wool Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/merino-wool-manufacturer/>
>
> 主要词簇：`merino wool apparel manufacturer` / `merino wool clothing manufacturer`
>
> 次级词簇：`merino base layer`（归本页）、`merino wool OEM`（GEO-05 已知缺口）
>
> 关键词决策背景：`clothing` 变体有七国搜索信号，但已明确决策**不立即改**现有 `Apparel` Title/H1；在 GSC 出现足够的非品牌 Query/Page 数据前保持现字段
>
> 依据：[`page-audit-sportswear-manufacturer-v1.md`](page-audit-sportswear-manufacturer-v1.md)（审计结构与深度基准）、[`../../seo-tags.md`](../../../seo-tags.md)、[`../sitemap.md`](../../sitemap.md)、[`seo-implementation-checklist-v1.md`](../seo-implementation-checklist-v1.md)
>
> 审计方式：生产 HTML（curl）、生产旧路径/Sitemap/首页与相邻品类页响应、本地模板与数据静态检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源

## 1. 结论先行

**结论：无 Critical 问题；主要风险是过时的 MOQ 业务事实（本地已修复待部署）与未经确认的能力声称。**

- 保留 `/merino-wool-manufacturer/`、当前 Title 和 H1；`clothing` 变体留待 GSC 数据决策，不立即改写字段；
- `merino base layer` 继续由本页承接，不拆平行页面；
- 页面已具备索引、语义结构、四种子类覆盖、相关品类内链和询盘路径；
- 下一轮优先级：部署本地已修复的 MOQ 事实 → 所有者确认 Merino 能力声称证据 → Merino 图片性能任务（本地尚未做）→ 术语大小写与 SEO-IMP-012 同批；
- GEO-05（`merino wool OEM` 在 AI 可见性中的缺口）只记录方向，样本不足，不据此动作。

## 2. SEO Audit — `/merino-wool-manufacturer/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，`robots` 为 `follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large`，自引用 Canonical 正确，全页只有一个 H1，未发现缺失 Title、Meta、Schema 或意外 `noindex`。

#### 🟡 Warning

##### W1. 生产规格条 MOQ 显示 `1,000 pcs`，与当前业务真值不符 —— 本地已修复待部署

**依据：** 生产 HTML 规格条输出 `<strong>1,000 pcs</strong>` + `Per style.`；当前业务真值为 `500 pieces per style`（所有者 2026-08-18 前已确认调整，见 Sportswear 审计状态更正与 SEO-IMP-008）。本地 `functions.php:25-27` 的 `myathletik_public_moq_pieces()` 已返回 `500`，`template-parts/product-category/page.php:30-36` 从该函数取值，因此这是“本地已修复、待部署”问题，不是新待办。同一 HTML 中的另一处 `1,000` 出现在询盘表单 `Estimated Order Quantity` 下拉选项（`Under 1,000 pcs` 等），该字段是预计订单量、与 per-style MOQ 刻意分离（SEO-IMP-008 验收口径），不属于本问题。

**失效判定：** 所有者再次把公开 MOQ 改回 1,000，则本条作废。

**先行指标：** 部署后页面源代码规格条出现 `500 pcs`；部署后 28 天窗口观察询盘合格度（GA4 `generate_lead` 按 Landing Page）是否因资格口径变化而改善。

**修法：** 随 SEO-IMP-001~010 批次部署本地主题代码即可；不改文案、不改表单选项。

##### W2. Merino 四项能力/性能表述需要所有者确认一方证据

**依据：** 生产正文与 `inc/product-category-data.php` 对应行包含以下声称：

- `inc/product-category-data.php:284`：Jacquard 图案 `will not crack, fade, or peel over time` —— 无时限、无条件的耐久承诺；
- `inc/product-category-data.php:284`：`A capability unique to merino programs with our gauge range` —— `unique` 是不可验证的全行业比较级；
- `inc/product-category-data.php:289`：`Prints are developed and tested in-house for color fastness on protein fibers` —— 内部测试声称；SEO-IMP-010 在 Knitted Fabrics 已移除 `in-house testing` 表述，两页口径目前不一致；
- `inc/product-category-data.php:299`：`we source fine-micron merino and develop the knit structure, gauge, and finish in-house` —— in-house 工序声称，同样与 IMP-010 后 Knitted Fabrics 的 broad coordination 口径不一致；
- `inc/product-category-data.php:294`：`merino warmth without merino fragility` —— 程度较轻，但暗示对纯 Merino 的负面断言。

这些表述不一定错误，但当前规范事实源中没有对应到具体纱线规格、印花工艺、测试方法或测试报告。

**失效判定：** 所有者提供可核对的一方证据（纱线采购规格、印花色牢度测试报告样例、工序所有权说明），或明确确认这些是可公开的一般能力，则相应条目降级或关闭。

**先行指标：** 修正并部署后，页面不再包含无条件耐久承诺和不可验证比较级；后续 GSC 非品牌 Query（`merino wool apparel manufacturer`、`merino base layer`）的曝光/位置不因措辞收敛而下降。

**修法：** 参照 Sportswear SP-01–SP-10 的做法，为 Merino 建立公开能力事实表，由所有者逐条确认；未确认项使用 `【NEEDS INPUT: confirm merino yarn sourcing / print testing / in-house development scope】`，不编造数值。本审计不撰写正文。

##### W3. 技术术语大小写与项目规范不一致

**依据：** 生产正文 construction 段落输出 `flatlock and activeseam construction`（`inc/product-category-data.php:303`）。项目术语规范要求 `ACTIVESEAM` 大写；`flatlock` 在自然描述 `flatlock seam/stitch` 语境允许小写，此处属可接受边界，主要漂移点是 `activeseam`。生产 Meta 与 H1 不含这两个术语，无字段级漂移。与 Sportswear 审计 W3 同源，已列入 SEO-IMP-012（待处理）。

**失效判定：** 项目术语规范文档改为允许小写 `activeseam`，则本条作废。

**先行指标：** 修正部署后正文出现 `ACTIVESEAM`；无其他回归。

**修法：** 与 SEO-IMP-012 同批更新 `inc/product-category-data.php:303`，避免只修大小写却保留 W2 未确认的声称。

##### W4. 四张子类产品图合计约 3.79 MB，缺少响应式图片标记 —— 本地尚未修复，是新候选任务

**依据：** 生产 HTML 中四张子类图均只有 `src` + `alt` + `loading="lazy"`，无 `width`/`height`、`srcset`/`sizes`、`decoding="async"`，无 WebP 派生。本地文件实测：

| 文件 | 像素 | 本地大小 |
|---|---:|---:|
| `showcase_4X3.jpeg`（Jacquard） | 1600 × 1200 | 0.56 MB |
| `1U153433_4X3.JPG`（Printed） | 1600 × 1200 | 0.28 MB |
| `1U153813_4X3.JPG`（Blend） | 1600 × 1200 | 0.22 MB |
| `Merino Yarn Sourcing.png`（Yarn sourcing） | 1448 × 1086 | 2.73 MB |

与 Sportswear（SEO-IMP-005）和 Knitted Fabrics（SEO-IMP-006）不同，Merino 数据尚未配置 `image_webp`/`image_width`/`image_height` 字段（`inc/product-category-data.php:281-302`），模板虽已在 `template-parts/product-category/page.php:115-147` 支持这些字段，但本地没有为 Merino 生成派生图——这是新工作项，不能标注“本地已修复”。四图 alt 当前回退为子类标题（`page.php:114`），可读但不是画面描述，可在同一任务中一并补足。Hero 使用背景视频而非首屏大图，不存在“首屏主图被错误 lazy-load”的问题；风险集中在下滚后的移动端下载量与潜在 CLS。

**失效判定：** 这些图片被整体替换，或所有者决定采用其他性能方案（如统一的图片 CDN 转换），则按新方案重估。

**先行指标：** 部署后 PageSpeed/Network 中该页图片传输量下降；Search Console Core Web Vitals 移动端无新增 CLS/LCP 问题。

**修法：** 参照 SEO-IMP-005/006 流程，用 wp-image-optimize 规范生成真无损 WebP 多档派生，产物放 `uploads/myathletik-theme/assets/images/merino wool product/`（不进主题仓库），并在数据数组补齐 `image_webp`/`image_width`/`image_height` 与描述性 `image_alt`。`Merino Yarn Sourcing.png` 是最大单点收益。图片内容不变。

#### 已知共享问题状态注记（不重复列为新发现）

- **Child stylesheet 重复加载 + 父主题 `style.css` 头文件加载**：生产 HTML 同时存在 `myathletik-child-style-css` 与 `generate-child-css`（同一文件同一版本号），以及 `generatepress-style-css`。SEO-IMP-003 本地已修复，待部署。
- **Hero 背景视频约 9.52 MB**：`merinowool.mp4` 实测 `Content-Length: 9,977,697`，`autoplay muted loop playsinline preload="auto"`。已知 V2-007，不重复升级。
- **社交图与 Schema 主图为通用 270 × 270 Logo**：生产 `og:image`、`twitter:image` 与 `CollectionPage.primaryImageOfPage` 均指向 `cropped-ATHLETIK_R_512.jpg`。与 Sportswear 审计 W7 同源，SEO-IMP-013 状态为“待选图”；本页未单独推进。
- **历史路径 404**：`https://www.athletikapparel.com/products/merino-wool-apparel/` 实测返回 HTTP 404。V2-005 调查中，调查前不动；注意其余 6 条 `/products/<x>/` 在生产仍有 WordPress 301，Merino 是唯一 404 的历史品类路径，差异本身值得在 V2-005 中记录。
- **面包屑 Schema `position` 字符串、`/cdn-cgi/l/email-protection` 404**：按既有口径不报。
- **数据卫生备注**：Merino 的 `gallery` 6 项与 `image_note` 占位（`inc/product-category-data.php:304-312`）当前不渲染——模板在存在 `subcategories` 时跳过 gallery 分支（`page.php:173`）。生产 HTML 已验证无 `[IMAGE]` 占位输出。不构成 SEO 问题，仅提醒后续维护者这些是休眠数据。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index`；
- Title 为 `Merino Wool Apparel Manufacturer | Athletik Clothing`，52 字符，与 `seo-tags.md:52` 一致；
- Meta Description 约 153 字符，包含主要词与 base layers/underwear/jacquard/printed 覆盖，与 `seo-tags.md:54-55` 一致；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Merino Wool Apparel Manufacturer`，与 `docs/sitemap.md:101` 一致；
- H2/H3 顺序正确，四个子类 H3（Jacquard / Printed / Blend / Yarn sourcing & fabric development）均位于 `Explore what we manufacture` H2 下；
- OG 与 Twitter 元数据齐全（title/description/url/site_name/card），description 与 Meta 一致；
- JSON-LD 可解析，`@graph` 含 LocalBusiness/Organization、WebSite、2 × ImageObject、CollectionPage、PostalAddress；`datePublished`/`dateModified` 存在；
- 页面位于 `page-sitemap.xml`；
- 四张子类图均使用原生 lazy loading 且位于首屏以下，alt 非空且不是文件名；
- 首页生产 HTML 两次链接本页（主导航 + 品类卡片）；Underwear 与 Outdoor 品类页生产 HTML 各两次链接本页（互链关系与本地数据一致）；
- 页面出链覆盖 Underwear、Outdoor Clothing 与 Services，形成品类—服务内链；
- 询盘表包含 Product Category of Interest、Estimated Order Quantity、Business Type，可用于过滤不合格询盘；
- 页面未用 startup、低 MOQ 文案迎合错误意图；无俄罗斯区域表述（HTML 中唯一 `Russia` 是表单国家下拉选项，非区域覆盖声称）。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `merino wool apparel manufacturer` | Title、H1、Meta、URL 和正文一致承接 | 保持主要词簇 |
| `merino wool clothing manufacturer` | `clothing` 变体有七国信号，但已明确决策不立即改 Apparel Title/H1 | 保持现字段；等 GSC 非品牌 Query 数据再评估 |
| `merino base layer` | 归本页；intro、Meta 和 Blend/Yarn 子类均覆盖 base layer 语义 | 保持自然覆盖，不拆平行页 |
| `merino wool OEM`（GEO-05） | 页面有 OEM/ODM 表达（规格条、Meta），但 AI 可见性仍是已知缺口 | 只记录方向；样本不足不动作 |
| B2B/OEM 任务 | Hero kicker、OEM/ODM full-package、tech pack CTA、MOQ 规格条和询盘表均有覆盖 | 匹配；MOQ 数值待部署修正 |
| 低 MOQ/startup | 页面没有主动迎合 | 边界正确 |
| 与其他页面重叠 | Underwear 有 microfiber/merino underwear 子类、Outdoor 有 merino-blend 子类，两页均回链本页 | 分工合理，不创建近义页 |

页面当前缺口与 Sportswear 同构：不是关键词密度，而是“搜索承诺—事实证据”的可验证性，外加一个本页特有的问题——公开 MOQ 数值落后于业务真值。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无渲染中的占位。生产 HTML 未输出 `【CONTENT: ...】`、`【NEEDS INPUT: ...】` 或 `[IMAGE: ...]`；`image_note` 与 `gallery` 为休眠数据（见第 2 节数据卫生备注）。

### Suspected facts needing owner confirmation

- Jacquard 图案 `will not crack, fade, or peel over time`；
- `A capability unique to merino programs with our gauge range`；
- `Prints are developed and tested in-house for color fastness on protein fibers`；
- `we source fine-micron merino and develop the knit structure, gauge, and finish in-house`；
- `merino warmth without merino fragility`。

需要确认这些是可公开的一般能力、具体工艺表现，还是有项目级测试支持。未经确认，不建议扩展到 Title、Meta、Schema 或新正文。

### Terminology drift

- `activeseam` → `ACTIVESEAM`（`inc/product-category-data.php:303`；与 SEO-IMP-012 同批）；
- `Merino wool` 大小写在 Title/H1/正文使用一致，未发现漂移；
- 其余规范术语（COVERSTITCH、OVERLOCK、SCREENPRINT、SELF FABRIC、Carbondry、Laser perforation）未出现在本页，无漂移对象。

### Tone issues

- `will not crack, fade, or peel over time` 与 `unique` 过于绝对；
- intro 的 `premium merino wool apparel` 偏消费品牌措辞，程度轻，可在事实表确认后一并评估。

### Passed

- 页面明确面向 B2B 品牌买家与 OEM/ODM 项目；
- 没有 startup 孵化、低 MOQ、客户名称或工厂数量声称；
- 没有 `world-class`、`industry-leading`、`best-in-class` 等空泛词；
- 区域表述无违规（无俄罗斯覆盖声称）。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/merino-wool-apparel/` 当前返回 **HTTP 404**（实测 2026-08-18）。这与其余六个品类历史路径仍存在 WordPress 301 的状态不同；该差异已在 V2-005 调查中登记，本审计只记录、不动作。若未来决定补齐，必须先核对 Search Console、访问日志、外链与重定向来源，并遵守 wp-redirect-guard 流程。

根据所有者 2026-08-08 的旧站退役决定，不规划跨域（旧 `myathletik.com`）重定向。

## 6. Suggested next actions — do not auto-apply

1. 随 SEO-IMP-001~010 批次部署本地主题代码，使本页 MOQ 规格条同步为 `500 pcs`，并验收无视觉回归（W1）；
2. 所有者确认 W2 中 Merino 五项能力声称的公开口径与证据，建立 Merino 公开能力事实表；
3. 与 SEO-IMP-012 同批修正 `activeseam` 术语大小写（W3），不与 W2 拆开单独上线；
4. 新建 Merino 图片性能任务（参照 SEO-IMP-005/006）：生成响应式 WebP、补 `width`/`height`/`srcset`/`sizes`/`decoding` 与描述性 `image_alt`，优先处理 2.73 MB 的 `Merino Yarn Sourcing.png`（W4）；
5. SEO-IMP-013 选图时把 Merino 代表图一并纳入，替换社交图/Schema 主图的通用 Logo；
6. 在 Search Console 对该 URL 做 URL Inspection，按 `merino wool apparel manufacturer` / `merino wool clothing manufacturer` / `merino base layer` 分组记录 Query，没有数据前保持当前 Title/H1；
7. GEO-05 缺口保持观察，不作为本轮动作；
8. 完成后继续审计 `/underwear-manufacturer/` 等剩余品类页（SEO-IMP-015）。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、已收录于 Sitemap |
| Title | 保持 | 52 字符、精确主要词、与规范一致；`clothing` 变体等 GSC 数据 |
| H1 | 保持 | 唯一且与页面任务一致 |
| Meta | 保持 | 约 153 字符、任务明确、与 `seo-tags.md` 一致，不需要重写 |
| 正文 | 需要所有者事实输入后再决定微调 | 主要风险是 W2 证据与绝对表述，不是缺关键词 |
| 规格条 MOQ | 部署本地修复（500 pcs） | 业务真值已确认，本地代码已就绪 |
| 内链 | 保持 | Underwear/Outdoor/Services 覆盖合理，双向互链正常 |
| Schema | 保持现有类型；主题图为低优先候选 | CollectionPage 正确，通用 Logo 不阻断索引（SEO-IMP-013 处理） |
| 新页面 | 不创建 | `clothing` 变体、`merino base layer`、GEO-05 均属同一买家任务，拆页会增加蚕食风险 |
