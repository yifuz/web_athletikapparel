# Silk Wear Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/silk-wear-manufacturer/>
>
> 主要词簇：`silk wear manufacturer`（七国关键词基线为 NR，未验证；保留现页待 GSC 数据验证）
>
> 次级词簇：`silk base layers`、`silk underwear`、`silk-blend knit`
>
> 依据：[`seo-tags.md`](../../seo-tags.md)、[`../sitemap.md`](../sitemap.md)、[`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md)、Sportswear/Knitted Fabrics 既有审计的结构基准
>
> 审计方式：生产 HTML（`curl` 直连，83,277 字节）、生产图片 URL/旧路径/Sitemap/首页入链响应与本地模板静态检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源
>
> 状态说明：本地仓库含尚未部署的 SEO-IMP-001~010 修改。本审计以生产站现状为准；本地已修复的问题标注"本地已修复待部署"，不列为新待办。

## 1. 结论先行

**结论：存在 1 条 Critical（子类图片生产 404），其余为与 Sportswear 同类的 Warning；URL/Title/H1/Meta 全部保持。**

- 保留 `/silk-wear-manufacturer/`、当前 Title（42 字符）和 H1；
- `silk wear manufacturer` 继续作为主要词簇，Base layer/underwear、Lightweight apparel、Blend 三个子类继续由同一页面承接，不拆平行页面；
- 页面已具备索引、语义结构、三个子类覆盖、内链和询盘路径；
- 最优先动作不是关键词或文案，而是修复 C1 的生产图片 404——这是当前页面上唯一一条"用户和爬虫立即可见"的硬错误；
- 在 GSC 出现足够的非品牌 Query/Page 数据前，不建议重写 Title、H1 或 Meta。

## 2. SEO Audit — `/silk-wear-manufacturer/`

### Findings by severity

#### 🔴 Critical

##### C1. 第三个子类产品图在生产环境 404（文件名大小写不匹配）

**依据（观察）：**

- 生产 HTML 中 "Silk-blend knit pieces" 子类的 `<img>` 指向
  `https://www.athletikapparel.com/wp-content/uploads/myathletik-theme/assets/images/silkwear/IMG_5550.JPG`（大写扩展名）；
- `curl` 实测该 URL 返回 **HTTP 404**；同目录小写 `IMG_5550.jpg` 返回 200（3,259,027 字节）；
- 本地 uploads 目录只有小写 `IMG_5550.jpg`，不存在大写 `.JPG` 文件；
- 引用来源：`inc/product-category-data.php:345`：`'image' => 'silkwear/IMG_5550.JPG'`；
- 原因推断：Windows/LocalWP 文件系统不区分大小写，本地开发不暴露该问题；生产为大小写敏感的 Linux 文件系统，因此只在生产 404。本地数据源与生产 HTML 一致，代码改动无法绕过——必须改数据或改文件名。

**失效判定：** 生产环境请求 `…/silkwear/IMG_5550.JPG` 返回 HTTP 200 且 Content-Type 为图片；或页面 HTML 改为引用实际存在的小写 URL 后返回 200。

**先行指标：** 修复后立即可用 `curl -I` 验证 200；部署后 7 天内在 GSC URL Inspection 复核该页渲染截图中三张子类图全部可见；GA4/GSC 层面该页无直接流量指标可绑定，以渲染验证为准。

**修法（最小改动，二选一，本轮不执行）：**

1. 将 `inc/product-category-data.php:345` 的 `'silkwear/IMG_5550.JPG'` 改为 `'silkwear/IMG_5550.jpg'`（一行代码改动，推荐）；或
2. 在 uploads 中将文件重命名为大写 `.JPG`（不推荐，与 §1.6 新增文件 ASCII 小写惯例相悖）。
   若该图后续进入图片优化批次（见 W2），可在同批一并处理，但 404 不应等待图片优化排期。

#### 🟡 Warning

##### W1. 生产规格条 MOQ 仍为 `1,000 pcs`，与当前业务真值不符（本地已修复待部署）

**依据（观察）：**

- 生产 HTML 规格条输出 `<span>MOQ</span><strong>1,000 pcs</strong><p>Per style.</p>`；
- 业务真值：所有者已于 2026-08-18 将公开成衣 MOQ 调整为 **500 pieces per style**（见 Sportswear 审计状态更正与 `docs/seo/moq-update-seo-imp-008-v1.md`）；
- 本地代码真值源 `functions.php:25-27` `myathletik_public_moq_pieces()` 已返回 `500`，共用模板 `template-parts/product-category/page.php:20,31-36` 从该函数取值——**本地已修复，属 SEO-IMP-008 业务事实同步的待部署部分**；
- 附带观察：询盘表 `Estimated Order Quantity` 下拉仍以 1,000 为分档边界（`Under 1,000 pcs` / `1,000–2,000 pcs` …）。该字段是 Fluent Forms 管理配置、含义是"预计订单量"而非 per-style MOQ，二者按既定决策保持分离；但 MOQ 降到 500 后，最低档同时混入合格（500–999）与不合格（<500）询盘，筛选粒度变粗。表单选项调整属站点管理配置，不在主题代码范围。

**失效判定：** 生产页面规格条输出 `500 pcs`；本条件即消失。表单分档是否调整由所有者另行决定，不阻塞本条关闭。

**先行指标：** 部署后 `curl` 复核页面源码含 `500 pcs`；询盘合格度按 GA4 `generate_lead` Landing Page 在 28 天窗口观察，样本不足只记录方向。

**修法：** 部署 SEO-IMP-008 已完成的主题代码即可；无需为本页单独改代码。表单分档如需细化，属 Fluent Forms 配置决策，`【NEEDS INPUT: 所有者确认询盘表数量分档是否随 MOQ 500 调整】`。

##### W2. 三张产品 JPEG 总计约 7.58 MB，缺少响应式图片标记（本地未修复，新待办）

**依据（观察）：**

| 文件 | 像素 | 大小 | 生产状态 |
|---|---:|---:|---|
| `silkwear/IMG_5784.jpg` | 1920 × 1280 | 1.79 MB | 200 |
| `silkwear/IMG_5393.jpg` | 1920 × 1280 | 2.53 MB | 200 |
| `silkwear/IMG_5550.jpg`（HTML 引用为 `.JPG`，见 C1） | 1920 × 1280 | 3.26 MB | 404/200 |

- 生产 HTML 中三图均有 `loading="lazy"` 和非空描述性 alt，但**均无** `width`/`height`、`srcset`/`sizes`、`decoding="async"`，也无 WebP/AVIF 派生；
- 本地 `inc/product-category-data.php:331-347` 的 Silk 子类数据没有 `image_webp`/`image_width`/`image_height` 字段——SEO-IMP-005/006 只覆盖了 Sportswear 与 Knitted Fabrics，**本页图片优化是尚未立项的新工作，不是"已修复待部署"**；
- 页面无视频 Hero、无首屏大图，三图均在首屏以下且 lazy loading 方向正确；风险是下滚后的总下载量与移动端过度分辨率（1920 px 源图服务约 560 px 的展示位）。

**失效判定：** 三图输出带固有尺寸、多档 WebP `srcset`/`sizes`、`decoding="async"` 与 JPEG 回退，且生产 Network 面板中移动端实际命中小尺寸候选。

**先行指标：** 部署后页面图源码检查；GSC Core Web Vitals 与移动端 LCP/CLS 在 28 天窗口观察；图片流量体积对比按 480–800 px 候选与原 JPEG 的字节差记录（Sportswear 同口径曾达 82%–94% 减量，此处样本未测，只记录方向）。

**修法：** 参照 SEO-IMP-005/006 的既有流程：源 JPEG 保留在 uploads，生成 6 档 WebP 派生放入 `uploads/myathletik-theme/assets/images/silkwear/`，在 `inc/product-category-data.php` 的 Silk 子类补 `image_webp`/`image_width`/`image_height` 字段（模板 `page.php:110-155` 已支持该数据结构，无需改模板）。图片内容不变，产物不进主题 Git 仓库。C1 的文件名修正可在同批完成。

##### W3. 技术术语大小写与项目规范不一致

**依据（观察）：**

- 生产 Meta Description 与 `seo-tags.md:60-61` 使用小写 `flatlock and activeseam`；正文 construction 句同样小写（`inc/product-category-data.php:348`）；生产 HTML 全文 `activeseam` 出现 4 次、`flatlock` 4 次，全部小写；
- AGENTS.md §6 要求技术名称作专有名词时使用 `FLATLOCK` / `ACTIVESEAM`，只有自然描述 `flatlock seam/stitch` 允许小写；
- 生产 Meta 与规范文档一致，因此这不是 Rank Math 同步错误，而是规范真值本身的历史漂移，与 Sportswear 审计 W3 同类。

**失效判定：** 规范文档与生产字段同步使用规范大写后，本条件消失；若所有者明确决定品类页统一用小写，则反向更新 AGENTS.md §6 口径后本条也可关闭。

**先行指标：** 无排名指标可绑定；以规范文档、生产 Meta 与正文三处一致性检查为准。

**修法：** 与 SEO-IMP-012 同批处理：同时更新 `seo-tags.md`、Rank Math 生产字段和 `inc/product-category-data.php:348`，避免只改一个位置造成新的双真值。本审计不据此建议重写 Meta（见 §2 W4 与长度说明）。

##### W4. SEO 元数据存在两个不同文本来源

**依据（观察）：**

- 生产 Meta Description（156 字符，含 `—` 与 `&`）与 `seo-tags.md:59-61` 一致；
- 但 `inc/product-category-data.php:322` 另存一条不同文本：`Silk wear manufacturer for knitted silk base layers, silk underwear, lightweight performance apparel, and OEM/ODM silk-blend knit pieces.`；
- 当前生产输出由 Rank Math 数据控制，该 PHP 字段未参与实际输出——与 Sportswear 审计 W4 同构，对应待处理项 SEO-IMP-011。

**失效判定：** 明确单一真值来源（Rank Math 或代码），未使用字段被移除或加注释说明后，本条件消失。

**先行指标：** 无外部指标；以后续维护中不再出现"改了代码生产没变"的误判为准。

**修法：** 并入 SEO-IMP-011 统一处理七个品类页，不单独改 Silk 一页。

##### W5. 社交图与 Schema 主图仍使用通用 270 × 270 Logo

**依据（观察）：**

- 生产 `og:image`、`twitter:image` 均为 `cropped-ATHLETIK_R_512.jpg`（270 × 270 Logo）；JSON-LD 可解析，含 `LocalBusiness`/`Organization`、`WebSite`、`CollectionPage`、`ImageObject`，但 `primaryImageOfPage` 等 5 处图像引用均指向 Logo；
- SEO-IMP-002 的主图修复只覆盖 Technical Guides Hub 与三篇指南（本地已完成待部署），品类页对应的是待选图项 SEO-IMP-013——**本条是已知共享问题的品类页实例，不是新发现**；
- 它不阻止索引，也不否定现有 Schema；只是页面被分享或被抽取时主题相关性和视觉表现偏弱。

**失效判定：** 所有者批准 Silk 代表图并完成合适尺寸派生后，`og:image`/`twitter:image`/`primaryImageOfPage` 指向该图而非 Logo。

**先行指标：** 页面源码检查；无直接排名指标，分享摘要相关性按部署后抽查记录。

**修法：** 并入 SEO-IMP-013 流程：所有者选图 → 生成派生尺寸 → 按 `rank-math.php` 已有机制替换。候选图可在 C1/W2 图片批次中一并评估。

##### W6. Child stylesheet 在生产页面重复加载（本地已修复待部署）

**依据（观察）：** 生产 HTML 同时出现 `myathletik-child-style-css` 与 `generate-child-css`，指向同一 `style.css`。对应 SEO-IMP-003，**本地已修复待部署**，全站共享问题，非本页独有。`<head>` 中另有 Cookiebot、WP Consent API、Cookiebot integration、jQuery、jQuery Migrate 五个未标注 `defer`/`async` 的脚本；是否能延迟需结合同意管理与表单依赖验证，不在 SEO 审计中直接处理。

**失效判定：** 每页只输出 `generate-style`、Google Fonts 与一份 child `style.css`。

**先行指标：** 部署后逐页源码检查；视觉回归抽查。

**修法：** 部署 SEO-IMP-003 即可；head scripts 另列前端性能任务评估。

##### W7. 两处 Silk 专属表述需要所有者确认证据口径

**依据（观察）：** 当前正文包含两处偏绝对的声称，均来自 `inc/product-category-data.php`：

- `:339`：`a finish no synthetic fiber can replicate`——跨材料全称否定，无法逐项证伪，属绝对表达；
- `:334`：`pack down smaller and feel lighter on the body than any other fiber we work with`——内部比较级，范围限于"we work with"，方向可由材料规格（克重、旦数）支持，但当前无对应公开数据；
- `:334`：`Natural temperature regulation`——蚕丝材料学常见属性，风险较低，但与 Sportswear 的 moisture-wicking 等表述同属"有词无论据"类别。

这些表述不一定错误，但当前规范事实源中没有对应材料规格、测试或可公开证据。对照清单 §9"不在证据不足时扩大性能声称"，维持现状可接受，不应把它们再扩展到 Title、Meta 或 Schema。

**失效判定：** 所有者确认哪些表述有可公开的一方依据（材料规格、供应商品控文件），或将绝对表达改为带条件的能力表达后，本条件消失。

**先行指标：** 无直接排名指标；以页面声称—证据对应表（参照 Sportswear fact sheet 模式）建立为准。

**修法：** 所有者确认后按 SEO-IMP-007 的 Sportswear 模式处理；确认前不改动正文，也不新增同类表述。`【NEEDS INPUT: 确认 Silk 页面两处比较/绝对表述的可公开依据】`。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large`；该路径未被屏蔽；
- 响应声明 `charset="UTF-8"`，Meta 中 em-dash（`—`）字节为合法 UTF-8，无乱码；
- Title 为 `Silk Wear Manufacturer | Athletik Clothing`，42 字符，与 `seo-tags.md` 一致；
- Meta Description 为 156 字符，与 `seo-tags.md` 一致，含主要词与 CTA；超出 155 内部软目标 1 字符，V2-002 软长度警告已记录，不据此建议改写；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Silk Wear Manufacturer`，与 `docs/sitemap.md` 一致；
- H2/H3 层级正确：三个子类 H3（Base layers and underwear / Lightweight performance apparel / Silk-blend knit pieces）均位于 Product range H2 下，其余 H2 无跳级；
- 3 张子类图均有非空描述性 alt（如 `Silk base layers and underwear`），未用文件名作 alt，均使用原生 lazy loading；
- JSON-LD 可解析，含 `LocalBusiness`/`Organization`、`WebSite`、`CollectionPage`、`ImageObject`；
- 页面位于 `page-sitemap.xml`（检索确认存在）；旧路径 `/products/silk-wear/` 返回 301 并跳转到当前规范 URL（终点 200）——属 V2-005 调查中的 6 条同域 301 之一，只记录不动作；
- 首页生产 HTML 两次链接该 URL，主导航包含 Silk Wear；
- 页面向 Merino Wool、Underwear 两个相关品类与 Services 输出上下文内链，方向与 `docs/sitemap.md` §2 模板一致；
- 页面无视频 Hero，与页面特定背景记录一致，不存在"首屏主图被错误 lazy-load"的问题；
- Google Fonts 使用 `display=swap` 且配置 `preconnect`；
- 询盘表包含产品类别、预计订单量和 Business Type，可用于过滤不合格询盘；
- 生产 HTML 中 `Russia` 仅出现在询盘表的标准国家下拉选项中，非区域覆盖文案；本地 `numbers-proof` 已统一为 `North America, Europe, and Asia-Pacific`，不构成区域表述问题；
- 无 `never`、`chafe-free`、`guaranteed`、`world-class`、`industry-leading` 等词；
- Header/Footer 两处共用 Logo `<img>` 缺显式 `width`/`height`——已知全站共享项 SEO-IMP-024，不升级为本页新发现。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `silk wear manufacturer` | Title、H1、Meta、URL 和正文一致承接；七国基线 NR，需求未验证 | 保持主要词簇，等 GSC 数据验证 |
| `silk base layers` / `silk underwear` | 子类 H3、列表与正文自然覆盖 | 继续作为次级词，不拆页 |
| `silk-blend knit` | 子类 H3 与正文覆盖，含 cotton/modal/synthetics 混纺说明 | 继续作为次级词，不拆页 |
| B2B/OEM 任务 | Hero kicker、full-package、tech pack、MOQ 规格条和询盘表均有覆盖 | 匹配 |
| 低 MOQ/startup | 页面没有主动迎合；但生产 MOQ 仍为 1,000（见 W1，待部署修正为 500） | 边界正确，等部署 |
| 与其他页面重叠 | Merino、Underwear 各有独立任务；Silk 与 Underwear 在 base layer 语义上有自然交集，但材料维度区分清晰 | 不创建 silk underwear 等平行页 |

页面当前缺口不是关键词覆盖，而是 C1 的可见硬错误和 W2 的交付质量；`silk wear manufacturer` 需求本身未验证（NR），在 GSC 数据出现前不做任何 Title/H1 实验。

## 4. Brand Voice / Terminology Check

### Placeholders still present

- 可见正文无 `【CONTENT: ...】` 或 `【NEEDS INPUT: ...】`；
- `inc/product-category-data.php:349` 的 `image_note` 占位（`[IMAGE: real silk wear shots]`）和 `:350-357` 的 gallery 数据因存在子类而不渲染（`page.php:173`），属非活跃回退数据，不输出到页面。

### Suspected facts needing owner confirmation

- `a finish no synthetic fiber can replicate`（绝对表达）；
- `pack down smaller and feel lighter … than any other fiber we work with`（内部比较级）；
- `Natural temperature regulation`（材料属性，低风险）。

未经确认，不把这些表述扩展到 Title、Meta、Schema 或新正文。

### Terminology drift

- `activeseam` → `ACTIVESEAM`；
- 技术名称位置的 `flatlock` → `FLATLOCK`；自然描述 `flatlock seam/stitch` 可保留小写。

### Tone issues

- 除上述两处外，Silk 页整体语气符合 B2B 技术制造商定位；无消费品牌式口号。

### Passed

- 页面明确面向 premium brands 的 B2B OEM 项目；
- 没有 startup 孵化、低 MOQ、客户名称、工厂数量或分包声称；
- 没有空泛营销词；
- MOQ 表述使用模板统一口径（当前生产值过时，属 W1 待部署项，非文案漂移）。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/silk-wear/` 返回 HTTP 301 并跳转到
`https://www.athletikapparel.com/silk-wear-manufacturer/`，终点为 HTTP 200。

该同域 301 是 V2-005 调查中 6 条 `/products/<x>/` WordPress 301 之一，已存在且工作正常。本轮不新增、不删除也不改写。若以后要清理，必须先核对 Search Console、访问日志、外链和 WordPress canonical redirect 来源。

## 6. Suggested next actions — do not auto-apply

1. **优先**：修正 C1——将 `inc/product-category-data.php:345` 的 `IMG_5550.JPG` 改为小写 `.jpg`，随下一次主题部署上线；这是当前唯一用户可见硬错误，不应等待图片优化排期；
2. 部署已完成的 SEO-IMP-003/008，使生产 MOQ 显示 500 pcs 并消除重复 stylesheet（本页随全站生效，无 Silk 专属动作）；
3. 为 Silk 三张子类图立项响应式 WebP 优化（参照 SEO-IMP-005/006 流程，模板已支持数据结构）；
4. 所有者确认 W7 两处 Silk 表述的证据口径；确认前不改正文；
5. SEO-IMP-011/012/013 批次处理时把 Silk 一并纳入（Meta 双真值、术语大小写、社交主图选图），不单页先行；
6. 评估 Silk 页增加一条到 FLATLOCK vs OVERLOCK 指南的上下文内链（与 SEO-IMP-001 同模式；construction 段提到 flatlock/activeseam，是自然的锚点位置）——仅在第一批部署稳定后执行；
7. 在 Search Console 对该 URL 做 URL Inspection（含渲染截图复核 C1 修复后的三图显示），并等待 `silk wear manufacturer` 及次级词的 Query/Page 样本；没有数据前保持当前 Title/H1/Meta；
8. 完成 Silk 决策后，继续审计 SEO-IMP-015 清单中的其余页面。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、旧路径 301 正常 |
| Title | 保持 | 42 字符、精确主要词、与规范一致 |
| H1 | 保持 | 唯一且与 `docs/sitemap.md` 一致 |
| Meta | 保持文本；术语大小写列为微调候选 | 156 字符（超内部软目标 1 字符，V2-002 已记录）、任务明确、与规范一致，不重写 |
| 正文 | 需要所有者事实输入后再决定微调 | 当前主要风险是 C1 硬错误与两处待证表述，不是缺关键词 |
| 内链 | 保持；指南上下文链接为低优先候选 | Merino/Underwear/Services 覆盖合理，与模板一致 |
| Schema | 保持现有类型；主题图为低优先候选（SEO-IMP-013） | CollectionPage 正确，通用 Logo 不阻断索引 |
| 新页面 | 不创建 | silk underwear / silk base layer 属于同一买家任务，且主词需求 NR 未验证，拆页增加蚕食风险 |
