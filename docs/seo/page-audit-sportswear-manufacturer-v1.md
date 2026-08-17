# Sportswear Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-17
>
> 生产 URL：<https://www.athletikapparel.com/sportswear-manufacturer/>
>
> 主要词簇：`sportswear manufacturer`
>
> 次级词簇：`activewear manufacturer`、`fitness clothing manufacturer`、Gym、Training、Running、Yoga、Compression
>
> 依据：[`serp-intent-validation-us-ca-uk-v1.md`](serp-intent-validation-us-ca-uk-v1.md)、[`keyword-planner-english-baseline-v2.md`](keyword-planner-english-baseline-v2.md)、[`../../seo-tags.md`](../../seo-tags.md)、[`../sitemap.md`](../sitemap.md)
>
> 审计方式：生产 HTML、生产 URL/robots/Sitemap/旧路径响应与本地模板静态检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源
>
> 状态更正（2026-08-17）：所有者已将当前公开 MOQ 从每款 1,000 件调整为每款 500 件，并通过 SEO-IMP-008 在本地把资格信号移到 Sportswear 首屏附近。下文的 1,000 件和“位置偏后”保留为实施前审计快照，不代表当前业务真值或本地实现状态。

## 1. 结论先行

**结论：微调候选，无 Critical 问题。**

- 保留 `/sportswear-manufacturer/`、当前 Title 和 H1；
- `sportswear manufacturer` 继续作为主要词簇，Activewear/Fitness/Gym/Yoga/Compression 继续由同一页面承接，不拆平行页面；
- 页面已具备索引、语义结构、产品覆盖、内链和询盘路径；
- 下一轮不应先“增加关键词”，而应先解决性能图片、事实证据、术语一致性和首屏资格表达；
- 在 GSC 出现足够的非品牌 Query/Page 数据前，不建议重写 Title 或 H1。

## 2. SEO Audit — `/sportswear-manufacturer/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，可索引、自引用 Canonical 正确、只有一个 H1，未发现缺失 Title、Meta、Schema 或意外 `noindex`。

#### 🟡 Warning

##### W1. 多项性能表述需要所有者确认一方证据

当前正文包含以下可测试或近似绝对化的声称：

- `inc/product-category-data.php:79`：洗涤后保持形状；
- `inc/product-category-data.php:84`：`squat-proof opacity`、`muscle-support compression`；
- `inc/product-category-data.php:89`：FLATLOCK seams `never dig`；
- `inc/product-category-data.php:94`：`moisture-wicking`、`quick-dry`；
- `inc/product-category-data.php:98`：`chafe-free`、`UV-protective`、`antimicrobial finishes`。

这些表述不一定错误，但在当前规范事实源中没有对应到具体产品、材料、测试方法、测试报告或适用条件。特别是 `never` 和 `chafe-free` 属于绝对表达。下一步需要所有者确认哪些能力可作为一般可选项公开，哪些必须改为带条件的项目级表述，哪些有可公开的测试证据。

##### W2. B2B/MOQ 资格信息存在，但出现位置偏后

首屏已有 `OEM/ODM technical knitwear category`、品牌买家和 Request a Quote，说明页面不是消费零售页；但明确的 `MOQ 1,000 pcs per style` 位于产品与能力区之后：

- `template-parts/product-category/page.php:31-38`：Hero；
- `template-parts/product-category/page.php:139-145`：MOQ 规格条。

US/CA/UK 搜索样本中低 MOQ、startup 和 teamwear 页面很多。资格信息过晚可能让不合格访客先进入询盘路径。建议下一轮评估在首屏附近增加简短资格信号，但本审计不撰写或修改正文。

##### W3. 技术术语大小写与项目规范不一致

生产 Meta、`seo-tags.md:36` 和正文多处使用小写 `activeseam`。项目术语规范要求 `ACTIVESEAM`；FLATLOCK 作为技术名称时也应保持规范形式，只有自然描述 `flatlock seam/stitch` 时允许小写。

当前生产 Meta 与 `seo-tags.md` 一致，因此这不是 Rank Math 同步错误，而是规范文档本身存在历史术语漂移。若后续微调，应同时更新规范真值与生产字段，避免只改一个位置。

##### W4. SEO 元数据存在两个不同文本来源

生产页面的 Meta Description 为 150 个字符，并与 `seo-tags.md:36-37` 一致：

```text
OEM/ODM sportswear manufacturer specializing in flatlock & activeseam technical activewear. Performance fabrics, full-package production. Get a quote.
```

但 `inc/product-category-data.php:63` 还保存了一条不同的 `meta_description`。当前生产输出由 Rank Math 数据控制，该 PHP 字段没有成为实际页面 Meta。两个来源继续并存会让后续维护者误判“改了代码却没有改生产 Meta”。建议在实施阶段明确单一真值来源或至少为未使用字段加注释；本轮不修改。

##### W5. 四张产品 PNG 总计约 6.97 MB，缺少响应式图片标记

当前四张 Sportswear 产品图：

| 文件 | 像素 | 本地大小 |
|---|---:|---:|
| `IMG_3515_4x3.png` | 1448 × 1086 | 1.83 MB |
| `1U128568_4x3_background_extended_final_v2.png` | 2732 × 2049 | 1.73 MB |
| `1U128579_4X3.png` | 1448 × 1086 | 1.83 MB |
| `IMG_7601_4X3.png` | 1448 × 1086 | 1.57 MB |

生产 HTML 中四图均使用 `loading="lazy"`，且 CSS 通过 `aspect-ratio: 4 / 3` 预留比例，这是正确方向；但仍缺少：

- `width` / `height`；
- `srcset` / `sizes`；
- `decoding="async"`；
- WebP/AVIF 等更适合网页的派生版本。

页面 Hero 没有首屏大图，因此不存在“首屏主图被错误 lazy-load”的问题；当前风险主要是下滚后的总下载量和移动端过度分辨率。图片优化必须遵循项目规则，产物放在 `uploads/myathletik-theme/assets/images/sportswear/`，不放入主题仓库。

##### W6. Child stylesheet 在生产页面重复加载

生产 HTML 同时出现：

- `myathletik-child-style-css`；
- `generate-child-css`。

两者指向完全相同的 `style.css` 和版本号。`functions.php:129-149` 手动 enqueue parent/child stylesheet，同时 GeneratePress 自身也输出 `generate-style` / `generate-child`。这会重复请求或至少增加重复样式解析，应在单独的前端性能修复中核对依赖关系后去重。

此外，页面 `<head>` 中有 Cookiebot、WP Consent API、Cookiebot integration、jQuery 和 jQuery Migrate 五个未标注 `defer`/`async` 的外部脚本。是否能延迟需要结合 Fluent Forms、同意管理和跟踪依赖验证，不能在 SEO 审计中直接删除或改执行顺序。

##### W7. 社交图与 Schema 主图仍使用通用 270 × 270 Logo

Rank Math 输出了 `CollectionPage`，但 `primaryImageOfPage`、Open Graph 和 Twitter image 都指向通用 Logo，而不是 Sportswear 产品图。它不阻止索引，也不否定现有 Schema；但页面被分享或被系统抽取时，主题相关性和视觉表现偏弱。只有选定批准的 Sportswear 代表图并完成合适尺寸派生后，才考虑调整。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index`；`robots.txt` 没有屏蔽该路径；
- Title 为 `Sportswear Manufacturer | Athletik Clothing`，43 个字符，与 `seo-tags.md` 一致；
- Meta Description 为 150 个字符，包含主要词且与 `seo-tags.md` 一致；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Sportswear Manufacturer`，与 `docs/sitemap.md` 一致；
- H2/H3 顺序正确，四个产品 H3 均位于产品范围 H2 下；
- 6 个生产 HTML 图片都有非空 alt，未使用文件名作为 alt；
- 四个产品图均在首屏以下并使用原生 lazy loading；
- 字体 URL 使用 `display=swap`，Google Fonts 已配置 `preconnect`；
- JSON-LD 可解析，包含 Organization、WebSite、ImageObject 和 CollectionPage；
- 页面位于 `page-sitemap.xml`，只出现一次；
- 首页生产 HTML 两次链接该 URL，主导航配置也包含 Sportswear；
- 页面向 Underwear、Outdoor、FLATLOCK Guide 和 Services 输出上下文相关内链；
- 页面覆盖 Training、Running、Yoga、Gym 和 Compression，未用 teamwear、startup 或低 MOQ 文案迎合错误意图；
- 询盘表包含产品类别、预计数量和 Business Type，可用于进一步过滤不合格询盘。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `sportswear manufacturer` | Title、H1、Meta、URL 和正文一致承接 | 保持主要词簇 |
| `activewear manufacturer` | Meta 包含 technical activewear，正文说明 activewear brands | 继续作为次级词，不拆页 |
| `fitness clothing manufacturer` | 没有机械重复该完整短语，但 Gym、Training、Running、Yoga 和 Compression 已形成自然语义覆盖 | 保持自然覆盖；等待 GSC 再决定是否补词 |
| B2B/OEM 任务 | Hero kicker、OEM/ODM、full-package、tech pack、MOQ 和询盘表均有覆盖 | 匹配，但资格位置可优化 |
| 低 MOQ/startup/teamwear | 页面没有主动迎合，MOQ 明确为每款 1,000 件 | 边界正确 |
| 与其他页面重叠 | Underwear、Outdoor、Knitted Fabrics 和技术指南各有独立任务 | 不创建 Activewear/Fitness 平行页 |

页面当前缺口不是关键词密度，而是“搜索承诺—事实证据—资格过滤”的排列顺序和可验证性。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无。生产模板及 Sportswear 数据中未发现 `【CONTENT: ...】` 或 `【NEEDS INPUT: ...】`。

### Suspected facts needing owner confirmation

- 洗涤后保持形状；
- squat-proof opacity；
- muscle-support compression；
- `never dig` / `chafe-free`；
- moisture-wicking / quick-dry；
- UV-protective / antimicrobial finishes。

需要确认这些是可供应选项、具体材料表现，还是有项目级测试支持的成品声称。未经确认，不建议把它们进一步扩展到 Title、Meta、Schema 或新正文。

### Terminology drift

- `activeseam` → `ACTIVESEAM`；
- 技术名称位置的 `flatlock` → `FLATLOCK`；自然描述 `flatlock seam/stitch` 可保留小写。

### Tone issues

- `never dig` 与 `chafe-free` 过于绝对；
- `perform as hard as the athletes wearing them` 偏消费品牌语气，不如具体规格、应用条件或测试信息适合 B2B 采购页。

### Passed

- 页面明确面向 activewear brands 和 B2B OEM/ODM 项目；
- 使用了已确认的 MOQ 1,000 pieces per style；
- 没有 startup 孵化、低 MOQ、客户名称或工厂数量声称；
- 没有 `world-class`、`industry-leading`、`best-in-class` 等空泛词。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/sportswear/` 当前返回 HTTP 301，并跳转到
`https://www.athletikapparel.com/sportswear-manufacturer/`，终点为 HTTP 200。

该同域 301 已存在且工作正常。本轮不新增、不删除也不改写。若以后要清理，必须先核对 Search Console、访问日志、外链和 WordPress canonical redirect 来源。

## 6. Suggested next actions — do not auto-apply

1. 所有者确认 W1 中可公开的性能能力、适用条件和现有证据；
2. 基于已确认事实制作 Sportswear 单页微调简报，范围只包括资格位置、绝对表述、术语一致性和必要内链；
3. 单独执行 Sportswear 图片性能任务：生成响应式 WebP/AVIF、补尺寸/`srcset`/`sizes`/`decoding`，不改变图片内容；
4. 单独检查 GeneratePress 与 child theme 的 stylesheet enqueue，消除重复 `style.css`，验证后再评估 head scripts；
5. 在 Search Console 对该 URL 做 URL Inspection，并等待 Query/Page 非品牌样本；没有数据前保持当前 Title/H1；
6. 完成 Sportswear 决策后，继续审计 `/knitted-fabrics-manufacturer/`。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、已有旧路径 301 |
| Title | 保持 | 43 字符、精确主要词、与规范一致 |
| H1 | 保持 | 唯一且与页面任务一致 |
| Meta | 保持结构；术语大小写列为微调候选 | 150 字符且任务明确，不需要重写 |
| 正文 | 需要所有者事实输入后再决定微调 | 当前主要风险是证据和绝对表述，不是缺关键词 |
| 内链 | 保持 | 相关品类、Services 和技术指南覆盖合理 |
| Schema | 保持现有类型；主题图为低优先候选 | CollectionPage 正确，通用 Logo 不阻断索引 |
| 新页面 | 不创建 | Activewear/Fitness 属于同一买家任务，拆页会增加蚕食风险 |
