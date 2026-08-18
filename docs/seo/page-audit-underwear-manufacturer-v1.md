# Underwear Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/underwear-manufacturer/>
>
> 主要词簇：`underwear manufacturer`
>
> 次级词簇：Performance underwear / Base layer 意图簇（归属本页，当前最大验证缺口之一）
>
> 依据：[`serp-intent-validation-us-ca-uk-v1.md`](serp-intent-validation-us-ca-uk-v1.md)、keyword-page-mapping-v1、[`../../seo-tags.md`](../../seo-tags.md)、[`../sitemap.md`](../sitemap.md)
>
> 审计方式：生产 HTML（curl 实测）、生产 URL/robots/Sitemap/旧路径响应与本地模板静态检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源
>
> 状态提示：本地仓库含未部署的 SEO-IMP-001~010 修改；凡生产问题在本地代码中已修复的，标注"本地已修复待部署"，不列为新待办。

## 1. 结论先行

**结论：微调候选，无 Critical 问题。**

- 保留 `/underwear-manufacturer/`、当前 Title 和 H1；
- `underwear manufacturer` 继续作为主要词簇，Performance underwear / Base layer 簇继续由本页承接，不拆平行页面；
- 页面已具备索引、语义结构、四个子类覆盖、FLATLOCK 指南内链和询盘路径；
- 生产页最大的事实偏差是 MOQ 规格条仍为 `1,000 pcs`（当前业务真值 500 pieces per style），但本地代码已修复、待部署；
- SERP 意图被 lingerie/intimates 消费意图稀释，暂不优先行动；在 GSC 出现足够的非品牌 Query/Page 数据前，不重写 Title 或 H1。

## 2. SEO Audit — `/underwear-manufacturer/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，可索引、自引用 Canonical 正确、只有一个 H1，未发现缺失 Title、Meta、Schema 或意外 `noindex`。

#### 🟡 Warning

##### W1. MOQ 规格条仍为 `1,000 pcs`，与当前业务真值不符（本地已修复待部署）

**依据**：生产 HTML 规格条输出 `MOQ / 1,000 pcs / Per style.`（`ma-product-specs` 区块，curl 实测 2026-08-18）。所有者已于 2026-08-18 将公开成衣 MOQ 调整为每款 500 件（见 Sportswear 审计状态更正）。本地 `functions.php:25-27` 的 `myathletik_public_moq_pieces()` 已返回 `500`，`template-parts/product-category/page.php:30-35` 统一从该函数取值，部署后本页规格条将变为 `500 pcs`。

**失效判定**：部署后生产页规格条显示 `500 pcs` 即关闭本条。

**先行指标**：部署后复查生产 HTML 的 `ma-product-specs` 区块文本；观察询盘表数量档位的分布是否变化（`Under 1,000 pcs` 档与 500 件 MOQ 之间的询盘是否增加）。

**修法**：随既有 SEO-IMP 批次部署即可，不单独动作。补充观察：询盘表 `Under 1,000 pcs / 1,000–2,000 pcs …` 是 Fluent Forms 筛选档位、不是公开 MOQ 声明，不构成矛盾；MOQ 真值变更后如需调整档位划分属表单配置事项，不在本审计范围。

##### W2. 技术术语大小写与项目规范不一致（与 Sportswear W3 同源）

**依据**：生产 Meta（curl 实测）与 `seo-tags.md:42-43` 均使用小写 `flatlock, activeseam & seamless`；生产正文实测 5 处 `activeseam`、8 处 `flatlock` 小写（另有 2 处 `FLATLOCK`、1 处 `OVERLOCK` 大写，来自相关链接标签 `FLATLOCK vs OVERLOCK Guide`）。本地数据源同样漂移：`inc/product-category-data.php:162`（meta_description）、`:167`（intro）、`:177`、`:182`、`:187`、`:192`、`:196`（construction）均为小写。项目术语规范（AGENTS.md §6）要求技术名称用 `FLATLOCK` / `ACTIVESEAM`，自然描述 `flatlock seam/stitch` 才允许小写。

**失效判定**：若所有者决定规范真值（seo-tags.md）保留小写写法，则本条改为"规范文档更新"事项而非页面缺陷。

**先行指标**：微调后复查生产 Meta、正文与 `seo-tags.md` 三处一致；GSC 查询词大小写不敏感，本条不预期排名信号变化，主要看品牌术语一致性。

**修法**：同一轮微调中同时更新规范真值与生产 Rank Math 字段及本地数据源，避免只改一个位置；本审计不改写文案。

##### W3. SEO 元数据存在两个不同文本来源（与 Sportswear W4 同源）

**依据**：生产 Meta Description（curl 实测，157 字符）与 `seo-tags.md:42-43` 一致：

```text
Technical underwear manufacturer — flatlock, activeseam & seamless construction. Boxers, thermals, 4-way stretch & merino. Full-package OEM/ODM. Get a quote.
```

但 `inc/product-category-data.php:162` 保存了另一条不同的 `meta_description`（`Underwear manufacturer for flatlock, activeseam, bonded-welded, microfiber, merino wool, and technical OEM/ODM underwear programs.`），该字段未成为实际页面 Meta，生产输出由 Rank Math 数据控制。Meta 长度 157 字符超出 155 内部软目标，已按 V2-002 记录为软长度警告，不因此改写。

**失效判定**：若实施阶段删除或注释掉 PHP 侧未使用字段、或将其与 Rank Math 同步为同一文本，本条关闭。

**先行指标**：无排名信号预期；看维护期是否再出现"改了代码生产没变"的误判。

**修法**：实施阶段明确单一真值来源，或为 PHP 字段加"未被生产使用"注释；本轮不修改。

##### W4. 四张子类 JPG 共约 1.36 MB，缺少响应式图片标记，且本地尚未修复

**依据**：生产 HTML 中四张子类图（curl 实测字节数与像素）：

| 文件 | 像素 | 生产字节数 |
|---|---:|---:|
| `underwear/boxer-brief-4x3-1600x1200.jpg` | 1600 × 1200 | 388,179 |
| `underwear/IMG_7661_4X3.jpg` | 1600 × 1200 | 350,977 |
| `underwear/IMG_5675_4x3.jpg` | 1600 × 1200 | 368,302 |
| `underwear/1U153309_4x3.jpg` | 1600 × 1200 | 255,715 |

四图均有 `loading="lazy"`、无非空 alt 缺失，但生产 `<img>` 标签均无 `width`/`height`（实测 0 个）、无 `srcset`/`sizes`、无 `decoding`、无 WebP/AVIF 派生。与 Sportswear（SEO-IMP-010 已做图文优化）不同，本地 `inc/product-category-data.php:174-195` 的 underwear `subcategories` 数组没有 `image_width`/`image_height`/`image_webp` 字段，模板 `template-parts/product-category/page.php:114-147` 在缺省时不输出尺寸与 `<picture>`，因此**本地未修复**，这是本页的新待办。

**失效判定**：若实测四图在生产 HTML 中已带 `width`/`height`/`decoding="async"` 及 WebP `srcset`，或所有者决定本页沿用 JPG 直出，本条关闭。

**先行指标**：修复后看 PageSpeed Insights / CrUX 的 LCP 与 CLS（`width`/`height` 主要防 CLS）；移动端下滚后的总图片下载量。当前四图总量约 1.36 MB，移动端按 1600px 宽原图下载存在过度分辨率。

**修法**：参照 Sportswear SEO-IMP-010 的做法生成响应式 WebP 派生并回填 `image_width`/`image_height`/`image_webp`；产物放 `uploads/myathletik-theme/assets/images/underwear/`，不放入主题仓库（AGENTS.md §1.6）；不改变图片内容。

##### W5. OG / Twitter / Schema 主图仍为通用 270 × 270 Logo（指南页已修复，品类页不在其范围）

**依据**：生产 HTML（curl 实测）中 `og:image`、`twitter:image` 与 JSON-LD `primaryImageOfPage` 均指向 `…/uploads/2026/06/cropped-ATHLETIK_R_512.jpg`（270 × 270 通用 Logo）。已知共享修复 SEO-IMP-002 只覆盖 Technical Guides Hub 和三篇指南（见 `seo-implementation-checklist-v1.md:68`），品类页主图不在其范围内，因此对本页是仍然存在的低优先问题，而非"本地已修复待部署"。

**失效判定**：若所有者明确品类页社交图继续使用 Logo，本条转为"已决策不做"。

**先行指标**：修复后看 Facebook/Twitter 分享调试工具的抓取结果与分享摘要图；不预期排名变化。

**修法**：选定批准的 Underwear 代表图并完成合适尺寸派生后，再调整 Rank Math 社交图与 Schema 主图；只有图像资产确认后才动手。

##### W6. Child stylesheet 重复加载与 head 脚本（本地已修复待部署）

**依据**：生产 HTML 同时输出 `myathletik-child-style-css` 与 `generate-child-css` 两个 handle，指向完全相同的 `style.css` 和版本号 `ver=1786599842`（curl 实测）。已知共享问题：本地已按 SEO-IMP-003 修复，待部署。此外 `<head>` 中 Cookiebot、WP Consent API、Cookiebot integration、jQuery、jQuery Migrate 等脚本未标注 `defer`/`async`，是否能延迟需结合 Fluent Forms、同意管理和跟踪依赖验证，不能在 SEO 审计中直接处理。

**失效判定**：部署后生产 HTML 只剩一个 child stylesheet handle 即关闭。

**先行指标**：部署后复查页面源码；观察样式渲染无回归。

**修法**：随既有批次部署，不单独动作。

##### W7. Hero 自动播放背景视频约 5.26 MB（已知 V2-007，等真实 CWV 数据）

**依据**：生产 HTML 中 `<video class="ma-product-hero__video" autoplay muted loop playsinline preload="auto">`，源文件 `underwear/underwear-hero-black-white-base-layer.mp4` 实测下载 5,261,031 字节（≈5.02 MiB）。本地 `inc/product-category-data.php:165-166` 配置该视频。此为已知 V2-007，等真实 CWV 数据再决策，本条仅记录状态，不列为新发现、不建议立即改动。

**失效判定**：CrUX/真实用户 CWV 数据显示 LCP/INP 达标，则不做处理；反之进入视频优化任务（压缩、poster、`preload` 策略）。

**先行指标**：GSC Core Web Vitals 报告与 CrUX 该 URL 分组数据，积累到足够样本后再看。

**修法**：暂不动；如需优化，压缩视频、加 poster、调整 `preload` 属性能否延迟需与首屏视觉验证一起评估。

##### W8. 舒适性/性能表述需所有者确认可公开口径（程度低于 Sportswear）

**依据**：本地数据源（部署基线与生产正文一致，curl 实测生产 HTML 无 `never`/`chafe-free`/`guaranteed`）：

- `inc/product-category-data.php:177`：`flatlock seams that stay smooth against the skin`、`stay-put waistbands engineered for everyday comfort`；
- `:182`：`warm without bulk`、`stay comfortable under a pack hipbelt or harness`；
- `:187`：`Quick-dry and shape-retentive knits`；
- `:192`：merino `odor resistance and temperature regulation`；
- `:196`：`moisture-wicking and antimicrobial finishes available`。

这些表述没有 Sportswear 页 `never dig` / `chafe-free` 那样的绝对化措辞，`:196` 的 `available` 也是条件式表达；但 `stay-put`、`shape-retentive`、`quick-dry` 仍属产品性能声称，当前规范事实源中没有对应到具体材料、测试方法或报告。merino 的 odor resistance / temperature regulation 属纤维通性描述，风险较低。

**失效判定**：所有者确认这些是可供应选项的一般描述或有项目级测试支持，本条关闭；或所有者要求统一改为条件式表述，按确认口径执行。

**先行指标**：无短期排名信号预期；看后续询盘是否引用这些性能点作为需求（说明表述被买家采信）。

**修法**：需要所有者事实输入后再决定微调；未经确认不把这些表述扩展到 Title、Meta、Schema 或新正文。事实缺失处用 `【NEEDS INPUT: confirm which underwear performance claims are approved for public copy】`。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index`；`robots.txt` 只屏蔽 `/wp-admin/`，没有屏蔽该路径；
- Title 为 `Underwear Manufacturer | Athletik Clothing`，42 个字符，与 `seo-tags.md` 精确一致；
- Meta Description 157 字符，与 `seo-tags.md` 一致，包含主要词（157 超 155 内部软目标已按 V2-002 记录，不因此改写）；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Underwear Manufacturer`（`id="ma-product-title"`），与 `docs/sitemap.md` 一致；
- H2/H3 顺序正确：What we make → Explore what we manufacture（下挂 4 个子类 H3）→ Construction & fabric → Related → 询盘区；
- 4 个子类与任务背景一致：Boxer/brief、Thermal base layer、4-way-stretch、Microfiber & merino；
- 6 张生产 HTML 图片都有非空 alt，未用文件名作为 alt（4 张子类图 alt 为子类标题，可接受）；
- 子类图均在首屏以下并使用原生 `loading="lazy"`；Hero 为背景视频，不存在首屏主图被错误 lazy-load 的问题；
- JSON-LD 单块可解析，含 CollectionPage、WebSite、ImageObject ×2、LocalBusiness/Organization 组合类型与 PostalAddress；
- 页面位于 `page-sitemap.xml`，只出现一次，带 `lastmod`（2026-08-11）；
- 首页生产 HTML 两次链接该 URL，主导航包含 Underwear；
- 页面向 Sportswear、Merino Wool、FLATLOCK vs OVERLOCK 指南和 Services 输出上下文相关内链（与任务背景"已链接 FLATLOCK vs OVERLOCK 指南"一致）；
- 生产正文无 `never`/`chafe-free`/`guaranteed` 等绝对化声称（实测 0 命中），无 `world-class`/`industry-leading`/`best-in-class` 空泛词；
- 生产正文无俄罗斯等区域表述（`Russia` 仅出现在询盘表国家下拉选项中，非区域声称）；
- 询盘表包含产品类别、预计数量档位与国家字段，可用于过滤不合格询盘。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `underwear manufacturer` | Title、H1、Meta、URL 和正文一致承接 | 保持主要词簇 |
| Performance underwear / Base layer 簇 | 子类覆盖 Thermal base layers、4-way-stretch performance underwear、Microfiber and merino；正文为 B2B OEM/ODM 口径 | 继续由本页承接，不拆页；该簇是当前最大验证缺口之一，等 GSC 数据 |
| lingerie/intimates 消费意图 | SERP 验证中该意图稀释 `underwear` 相关查询；页面没有消费零售文案，hero kicker 为 `OEM/ODM technical knitwear category`，有 MOQ 规格条与询盘过滤 | 暂不优先行动；不为消费意图改写任何字段 |
| B2B/OEM 任务 | OEM/ODM、full-package、tech pack review、Request a Quote 均有覆盖 | 匹配；MOQ 规格条部署 500 后资格表达更准确 |
| 低 MOQ/startup | 页面没有主动迎合；规格条（当前 1,000，部署后 500）构成资格边界 | 边界正确 |
| 与其他页面重叠 | Sportswear（activewear）、Merino Wool（材料簇）、Silk Wear（silk base layers）各有独立任务；本页 merino 子类是"underwear 中的 merino 选项"，与 Merino 页不冲突 | 不创建平行页 |

页面当前缺口不是关键词覆盖，而是：(1) 图片性能与事实证据（W4/W8）；(2) Performance underwear / Base layer 簇缺少 GSC 验证样本，样本不足只记录方向，不行动。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无。生产页面及 underwear 数据中未发现 `【CONTENT: ...】` 或 `【NEEDS INPUT: ...】`。`inc/product-category-data.php:197` 的 `image_note`（`[IMAGE: real underwear product shots]`）只在无 gallery 时渲染，当前子类结构下不输出。

### Suspected facts needing owner confirmation

见 W8：`stay-put waistbands`、`shape-retentive`、`quick-dry`、`warm without bulk`、moisture-wicking / antimicrobial finishes。未经确认，不建议扩展到 Title、Meta、Schema 或新正文。

### Terminology drift

- `activeseam` → `ACTIVESEAM`（Meta、seo-tags.md、正文多处）；
- 技术名称位置的 `flatlock` → `FLATLOCK`；自然描述 `flatlock seam/stitch` 可保留小写；
- 生产 Meta 与正文混用：`FLATLOCK` 大写仅出现在相关链接标签 `FLATLOCK vs OVERLOCK Guide`；
- `merino wool` 在正文小写多处，规范写法为 `Merino wool`（生产实测 4 处 `Merino Wool`、5 处 `merino wool`）。

### Region wording

- 生产 intro 含 `private labels worldwide`（`inc/product-category-data.php:167`）。项目区域表述标准为 `North America, Europe, and Asia-Pacific`；`worldwide` 不属于禁止项（无俄罗斯），但与标准口径不一致，列为微调候选，不单独行动。

### Tone issues

- `A trusted production partner for … worldwide` 偏泛营销语气；其余正文整体为技术、具体、B2B 口径，符合 §5。

### Passed

- 页面明确面向 underwear brands、importers、private labels 的 OEM/ODM 项目；
- 无 startup 孵化、低 MOQ、客户名称、工厂数量或未经确认的认证/产能/测试数值声称；
- 询盘表数量档位是筛选选项，不是公开 MOQ 声明。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/underwear/` 返回 HTTP 301 并跳转到 `https://www.athletikapparel.com/underwear-manufacturer/`，终点 HTTP 200（curl 实测 2026-08-18）。该同域 301 是 V2-005 调查的 6 条 `/products/<x>/` WordPress 301 之一，状态为调查中、只记录不动作。本轮不新增、不删除也不改写任何重定向。

## 6. Suggested next actions — do not auto-apply

1. 随既有 SEO-IMP 批次部署，验证本页 MOQ 规格条变为 `500 pcs`（W1）、child stylesheet 去重生效（W6）；
2. 所有者确认 W8 中可公开的舒适性/性能表述与证据口径；
3. 参照 Sportswear SEO-IMP-010 单独执行 Underwear 子类图性能任务：生成响应式 WebP、回填 `image_width`/`image_height`/`image_webp`，产物放 uploads，不改图片内容（W4）；
4. 术语微调与 `seo-tags.md` 规范真值同步进行（W2），区域口径 `worldwide` 一并评估；
5. 确认品类页 OG/Schema 主图是否沿用 Logo；如需更换，先选定批准的 Underwear 代表图（W5）；
6. 等 CrUX/GSC 真实 CWV 数据后再评估 Hero 视频（W7，V2-007）；
7. 在 Search Console 对该 URL 做 URL Inspection，等待 `underwear manufacturer` 与 Performance underwear / Base layer 簇的非品牌样本；没有数据前保持当前 Title/H1；
8. 完成本页决策后，继续审计下一品类页。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、旧路径已有 301 |
| Title | 保持 | 42 字符、精确主要词、与规范一致 |
| H1 | 保持 | 唯一且与页面任务一致 |
| Meta | 保持结构；术语大小写列为微调候选 | 157 字符软长度警告已记录（V2-002），不重写 |
| 正文 | 需要所有者事实输入后再决定微调 | 当前主要风险是性能表述证据与术语一致性，不是缺关键词 |
| 内链 | 保持 | Sportswear、Merino、FLATLOCK 指南、Services 覆盖合理 |
| Schema | 保持现有类型；品类页主图为低优先候选 | CollectionPage 正确，通用 Logo 不阻断索引 |
| 图片 | 子类图响应式优化列为待办 | 1.36 MB 总量、无尺寸/srcset/decoding，本地未修复 |
| 新页面 | 不创建 | Performance underwear / Base layer 属于同一买家任务，拆页会增加蚕食风险；lingerie/intimates 消费意图不承接 |
