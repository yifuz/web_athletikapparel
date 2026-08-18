# Sports Accessories Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/sports-accessories-manufacturer/>
>
> 主要词簇：`sports accessories manufacturer`（主词尚未测试，保留现页待验证）
>
> 次级语义：Balaclavas、Gloves and liners、Knit accessories（neck gaiters、headbands、arm sleeves）
>
> 依据：[`page-audit-sportswear-manufacturer-v1.md`](page-audit-sportswear-manufacturer-v1.md)（结构与深度基准）、[`../../seo-tags.md`](../../seo-tags.md)、[`../sitemap.md`](../sitemap.md)、[`AGENTS.md`](../../AGENTS.md) §5/§6、[`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md) §9
>
> 审计方式：生产 HTML（`curl` 抓取，HTTP 200）、生产 robots/Sitemap/旧路径响应与本地模板静态检查（`inc/product-category-data.php:497-541`、`template-parts/product-category/page.php`、`rank-math.php`、`functions.php`）
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源
>
> 页面特定背景：子类 3 个（Balaclavas、Gloves/liners、Knit accessories）；首页 Lookbook 不展示该类目为有意决策（首页品类网格卡片仍链接本页）；无视频 Hero（数据无 `hero_video`，符合现状设计）。

## 1. 结论先行

**结论：微调候选，无 Critical 问题。**

- 保留 `/sports-accessories-manufacturer/`、当前 Title 和 H1；主词未测试，在 GSC 出现非品牌 Query/Page 样本前不重写 Title/H1；
- 页面已具备索引、语义结构、3 个子类产品覆盖、内链和询盘路径；
- 本页最突出的问题不是 SEO 字段，而是**生产端 MOQ 仍显示 1,000 pcs**（当前业务真值为每款 500 件，本地 `functions.php` 已改为 500，属待部署）以及询盘表数量选项仍以 1,000 为分档锚点；
- 其余问题与 Sportswear 审计同型：术语小写漂移、双 Meta 来源、产品 PNG 过大且缺响应式标记、社交/Schema 主图用通用 Logo；
- 首页 Lookbook 不展示该类目为有意决策，不作为缺口处理。

## 2. SEO Audit — `/sports-accessories-manufacturer/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，`robots` 为 `follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large`；Canonical 自引用正确；只有一个 H1；未发现缺失 Title、Meta、Schema 或意外 `noindex`。

#### 🟡 Warning

##### W1. 生产端 MOQ 规格条仍显示 `1,000 pcs`，询盘表数量分档锚点过时

**依据**（实测观察）：

- 生产 HTML 规格条渲染为 `MOQ / 1,000 pcs / Per style.`；
- 生产询盘表（Fluent Forms）数量选项为 `Under 1,000 pcs`、`1,000–2,000 pcs`、`2,000–5,000 pcs`、`5,000+ pcs`；
- 当前业务真值为每款 500 件（AGENTS.md §2 与 `docs/sitemap.md` §2 均已确认）；本地 `functions.php:25-27` 的 `myathletik_public_moq_pieces()` 已返回 `500`，`template-parts/product-category/page.php:20,30-36` 通过该函数输出规格条。

即：主题侧**本地已修复待部署**；表单选项在 Fluent Forms 插件侧，不随主题部署更新。MOQ 下调到 500 后，`Under 1,000 pcs` 一档同时混入合格（500–999）与不合格询盘，削弱了该字段的线索过滤作用。

**失效判定**：部署后生产规格条显示 `500 pcs`，且表单选项按所有者确认的新分档（例如以 500 为起点）调整，则本条失效。

**先行指标**：部署后 curl 生产页确认规格条数值； Fluent Forms 表单选项在后台更新后复查前台渲染；后续观察询盘表单中低于 MOQ 的线索占比是否下降（月度人工回顾即可，样本不足只记录方向）。

**修法**：1) 随 SEO-IMP 批次部署主题代码（无需新改动）；2) 由所有者在 Fluent Forms 后台确认并调整数量分档文案，使最低档与 500 件 MOQ 对齐；表单结构调整超出本审计范围，本审计不改表单。

##### W2. 技术术语大小写与项目规范不一致

**依据**（实测观察 + 本地文件）：

- 生产正文与 `inc/product-category-data.php:503`（intro）使用小写 `flatlock and activeseam construction`；
- `inc/product-category-data.php:512`（Balaclavas 子类）为 `Flatlock and activeseam construction for comfort under a helmet or hood.`；
- 生产正文 `activeseam` 共 2 处，`ACTIVESEAM` 0 处；
- 生产 Meta 与 `seo-tags.md:72-73` 使用小写 `flatlock construction`。

项目术语规范（AGENTS.md §6）要求技术名称使用 `ACTIVESEAM`；FLATLOCK 作为技术名称应保持规范形式，自然描述 `flatlock seam/stitch` 可小写。与 Sportswear 审计 W3 同型：生产 Meta 与规范文档一致，属于规范真值本身的历史漂移，不是 Rank Math 同步错误。

**失效判定**：若所有者决定术语规范仅适用于正文展示而不适用于 Meta/规范文档，或统一更新后生产与 `seo-tags.md` 同步为大写规范形式，本条失效。

**先行指标**：微调上线后复查生产正文与 Meta 的术语形式；无排名指标预期（属一致性修复，不要期望排名变化）。

**修法**：列入下一轮品类页微调简报，正文 `activeseam` → `ACTIVESEAM`；Meta 是否同步调整由所有者决定，若改须同时更新 `seo-tags.md` 真值与 Rank Math 字段，避免只改一处。本审计不改文案。

##### W3. SEO 元数据存在两个不同文本来源

**依据**：生产 Meta Description 为 159 字符，与 `seo-tags.md:71-73` 一致：

```text
Technical knit sports accessories manufacturer — balaclavas, gloves & liners with performance fabrics and flatlock construction. Full-package OEM. Get a quote.
```

但 `inc/product-category-data.php:500` 还保存了另一条不同的 `meta_description`（`Sports accessories manufacturer for balaclavas, gloves, liners, technical knit accessories, and OEM/ODM outdoor performance accessory programs.`）。当前生产输出由 Rank Math 数据控制，该 PHP 字段未成为实际页面 Meta。与 Sportswear 审计 W4 同型。

**失效判定**：明确单一真值来源（或为未使用字段加注释说明）后失效。

**先行指标**：无排名指标；维护性指标是后续微调时不再出现“改了 PHP 字段但生产 Meta 不变”的误判。

**修法**：实施阶段为 `inc/product-category-data.php:500` 的未使用字段加注释，或在品类页统一改用该字段并经 Rank Math 过滤器输出；本轮不修改。

##### W4. 三张产品 PNG 总计约 6.13 MB，缺响应式标记；`decoding` 属性本地已修复待部署

**依据**（生产 HTML + 本地 uploads 实测）：

| 文件 | 像素 | 本地大小 |
|---|---:|---:|
| `sports accessories/Balaclavas.png` | 1448 × 1086 | 1.78 MB |
| `sports accessories/gloves.png` | 1448 × 1086 | 2.43 MB |
| `sports accessories/sports-accessory-product-category.png` | 1402 × 1122 | 1.92 MB |

生产 HTML 中三图均有非空 alt（等于子类标题，非文件名）且 `loading="lazy"`，方向正确；但仍缺：

- `width` / `height`（`inc/product-category-data.php:509-525` 未提供 `image_width`/`image_height`）；
- `srcset` / `sizes` 与 WebP 派生（数据无 `image_webp`；`template-parts/product-category/page.php:118-147` 的 `<picture>` 逻辑已就绪，只差数据与产物）；
- `decoding="async"`：本地模板 `page.php:143` 已输出，生产 HTML 中三图均无该属性 —— **本地已修复待部署**。

SEO-IMP-005/006 的 WebP 派生覆盖了首页卡片（`cat-sports-accessories-640/960-q100.webp` 已存在于 uploads）和 Sportswear/Knitted Fabrics 页面图，本品类子类图尚未派生。页面无视频 Hero、无首屏大图，风险主要是下滚后的总下载量与移动端过度分辨率。

**失效判定**：三图以 WebP `srcset`+尺寸属性上线，且生产 HTML 出现 `decoding="async"` 后失效。

**先行指标**：部署后 PageSpeed/Lighthouse 的 LCP 与本页图片总传输量下降；GSC Core Web Vitals 按组观察（样本不足只记录方向）。

**修法**：按 §1.6 在 `uploads/myathletik-theme/assets/images/sports accessories/` 生成 WebP 派生，并在 `inc/product-category-data.php` 子类数据补 `image_webp`/`image_width`/`image_height`；不改变图片内容，不放入主题仓库。

##### W5. 社交图与 Schema 主图仍使用通用 270 × 270 Logo

**依据**：生产 `og:image`、`twitter:image` 与 JSON-LD `CollectionPage.primaryImageOfPage` 均指向 `…/uploads/2026/06/cropped-ATHLETIK_R_512.jpg`（270 × 270 通用 Logo）。SEO-IMP-002 的修复（`rank-math.php:125-145`）只覆盖技术指南与指南中心页，品类页不在其范围内，因此本条对品类页**仍是开放问题**（与 Sportswear 审计 W7 同型），不是“本地已修复待部署”。

**失效判定**：所有者选定并批准本品类代表图、完成合适尺寸派生，且生产 OG/Twitter/Schema 主图指向该图后失效。

**先行指标**：分享调试工具（Facebook Sharing Debugger）抓取预览变化；无直接排名指标。

**修法**：低优先。只有在批准的 Sports Accessories 代表图与派生尺寸就绪后，才按 `rank-math.php` 既有过滤器模式扩展覆盖品类页；事实缺失时用 `【NEEDS INPUT: 确认 Sports Accessories 社交/Schema 代表图】`。

**记录而非新发现**（已知共享问题，注明状态）：

- 生产 `<head>` 中 `myathletik-child-style-css` 与 `generate-child-css` 重复加载同一 `style.css`：本地已修复（SEO-IMP-003），待部署；
- Meta 159 字符超出 155 内部软目标：V2-002 软长度警告已记录，属内部软目标而非 Google 规则，不据此建议改写；
- 面包屑 Schema `position` 为字符串：已知可接受偏差，不报；
- `/cdn-cgi/l/email-protection` 404：Cloudflare 邮箱混淆端点，不报。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index`；`robots.txt` 仅屏蔽 `/wp-admin/`，未屏蔽该路径（生产 `robots.txt` 经 301 跳转后内容正常）；
- Title 为 `Sports Accessories Manufacturer | Athletik Clothing`，51 字符，与 `seo-tags.md:70` 一致；
- Meta Description 159 字符，包含主要词与三个子类语义，与 `seo-tags.md:71-73` 一致；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Sports Accessories Manufacturer`，与 `docs/sitemap.md:104` 一致；
- H2/H3 层级正确：`What we make` → `Explore what we manufacture`（下含 Balaclavas / Gloves and liners / Knit accessories 三个 H3）→ `Built for technical B2B production requirements` → `Build the rest of your program` → 询盘 CTA H2；
- 1 个 JSON-LD 块可解析，包含 LocalBusiness+Organization、WebSite、CollectionPage 与 ImageObject；Article/Person 实体已被正确移除；
- 页面位于 `page-sitemap.xml`（共 17 个 URL），只出现一次，带 `lastmod`；
- 首页生产 HTML 两处链接该 URL（主导航菜单 + 品类网格卡片）；
- 页面向 Outdoor Clothing、Sportswear、Services 输出上下文相关内链，Hero 与 CTA 区链接 `/contact/`；
- 三张产品图均有描述性 alt（等于子类标题），均位于首屏以下并使用原生 lazy loading；
- 无视频 Hero，与数据设计一致；`[IMAGE: real accessories shots]` 占位与含 Unsplash 文件名的备用 gallery 因子类存在而不渲染（`page.php:173-199`），符合清理清单说明；
- 未发现 `never`、`chafe-free`、`guaranteed` 等绝对化表述；
- `Russia` 仅出现在 Fluent Forms 国家下拉选项中，非区域覆盖声称；正文无区域表述漂移；
- 询盘表包含产品类别、预计数量和 Business Type，可用于过滤不合格询盘（分档锚点问题见 W1）。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `sports accessories manufacturer` | Title、H1、Meta、URL 和正文一致承接；主词尚未测试 | 保留现页待验证，GSC 数据前不动 Title/H1 |
| 子类语义（balaclava / glove liner / knit accessories） | 三个子类 H3 + 描述覆盖，Meta 含 balaclavas、gloves & liners | 保持自然覆盖，不拆子类平行页 |
| B2B/OEM 任务 | Hero kicker、full-package、tech pack、MOQ 规格条和询盘表均覆盖 | 匹配；MOQ 数值与表分档见 W1 |
| 低 MOQ/startup 意图 | 页面没有主动迎合 | 边界正确 |
| 与其他页面重叠 | Outdoor/Sportswear 各有独立任务；本页定位为服装线的配件延伸 | 不创建平行页 |
| 首页 Lookbook 不展示该类目 | 有意决策；品类网格卡片与导航仍提供入链 | 维持现状 |

页面当前缺口不是关键词覆盖，而是 MOQ 事实同步（W1）、图片性能（W4）与术语一致性（W2）。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无渲染。`inc/product-category-data.php:527` 的 `[IMAGE: real accessories shots]` 与备用 gallery 数据存在于本地但不输出到生产页面。

### Suspected facts needing owner confirmation

- `inc/product-category-data.php:512`：`thermal and wind-resistant fabrics`、`comfort under a helmet or hood`；
- `inc/product-category-data.php:517`：`touchscreen-compatible tips`、`grip-print palms`；
- `inc/product-category-data.php:522,526`：`moisture-wicking, thermal, and stretch`。

这些表述无绝对化用词、语气为可选项描述，风险低于 Sportswear 的 `never dig`/`chafe-free`；但仍未对应到具体材料或测试证据。未经所有者确认，不建议把它们扩展到 Title、Meta、Schema 或新正文。

### Terminology drift

- `activeseam` → `ACTIVESEAM`（2 处，见 W2）；
- 技术名称位置的 `flatlock`/`Flatlock` 按 W2 一并评估；自然描述 `flatlock seam/stitch` 可保留小写。

### Tone issues

无消费品牌语气或空泛词（无 `world-class`、`industry-leading` 等）。

### Passed

- 页面明确面向 B2B OEM/ODM 配件项目，定位为服装品类的延伸线；
- 没有 startup 孵化、低 MOQ、客户名称或工厂数量声称；
- 无 `【NEEDS INPUT: ...】` 占位渲染。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/sports-accessories/` 返回 HTTP 301 并跳转到 `https://www.athletikapparel.com/sports-accessories-manufacturer/`，终点 HTTP 200。该同域 301 属 V2-005 调查中的 6 条 `/products/<x>/` WordPress 301 之一：只记录，不新增、不删除、不改写。若以后清理，必须先核对 Search Console、访问日志、外链和 WordPress canonical redirect 来源。

## 6. Suggested next actions — do not auto-apply

1. 随 SEO-IMP 批次部署主题代码，验收本页 MOQ 规格条变为 `500 pcs`、`decoding="async"` 生效及 stylesheet 去重（W1 主题侧、W4 部分、共享 CSS 问题）；
2. 由所有者确认 Fluent Forms 数量分档是否按 500 件 MOQ 重设最低档（W1 表单侧）；
3. 单独执行 Sports Accessories 图片性能任务：生成 WebP 派生并补 `image_webp`/尺寸/`srcset` 数据（W4），产物放入 uploads 对应目录；
4. 将 `activeseam` → `ACTIVESEAM` 与双 Meta 来源注释并入下一轮品类页微调简报（W2、W3），Meta 改动须同步 `seo-tags.md` 真值；
5. 所有者批准代表图后再处理社交/Schema 主图（W5），低优先；
6. 在 Search Console 对该 URL 做 URL Inspection，等待非品牌 Query/Page 样本；没有数据前保持当前 Title/H1；
7. 可选观察：本页未链接任何技术指南（Sportswear/Underwear 链接 FLATLOCK Guide）；若后续微调正文，可评估在 Balaclavas/结构段落加入 FLATLOCK Guide 内链，本轮样本不足不强制。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、旧路径 301 工作正常（V2-005 只记录） |
| Title | 保持 | 51 字符、精确主要词、与规范一致；主词未测试 |
| H1 | 保持 | 唯一且与 `docs/sitemap.md` 真值一致 |
| Meta | 保持 | 159 字符软超长已记录（V2-002），非 Google 规则，不据此改写；术语大小写列微调候选 |
| 正文 | 保持；MOQ 数值随部署自动更新 | 主要风险是生产端过时 MOQ 与术语漂移，不是缺关键词 |
| 内链 | 保持 | 相关品类、Services、Contact 覆盖合理；指南内链为可选候选 |
| Schema | 保持现有类型；主题图为低优先候选 | CollectionPage 正确，通用 Logo 不阻断索引 |
| 新页面 | 不创建 | 子类语义由本页承接，拆页增加蚕食风险 |
