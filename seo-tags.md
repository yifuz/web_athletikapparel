# SEO Tags — All Pages (for Rank Math)

Fill these into Rank Math's "SEO Title" and "Meta Description" fields on each
page. Guidelines followed:
- SEO title ≤ ~60 chars (so it doesn't truncate in Google). Brand = "Athletik
  Clothing".
- Meta description ≤ ~155 chars, includes the target keyword naturally, ends
  with a soft hook.
- Each page targets ONE primary keyword (the long-tail "[category] manufacturer"
  pattern), avoiding broad red-ocean terms.
- Keep claims consistent with site (no factory count, MOQ not stated as a rule).

Keyword note: FLATLOCK / ACTIVESEAM are low-competition, high-intent technical
terms — leaned into on the homepage. Category pages own their "[x] manufacturer"
long-tails.

================================================================
## Home  (/)
================================================================
Primary keyword: technical knitwear manufacturer / FLATLOCK manufacturer

**SEO Title:**
Technical Knitwear Manufacturer | Athletik Clothing

**Meta Description:**
Vertically integrated OEM manufacturer of FLATLOCK & ACTIVESEAM knitwear —
underwear, sportswear & outdoor for global brands. 15+ years. Request a quote.

================================================================
## Product category pages
================================================================

### Sportswear  (/sportswear-manufacturer/)
**SEO Title:** Sportswear Manufacturer | Athletik Clothing
**Meta Description:**
OEM/ODM sportswear manufacturer specializing in FLATLOCK & ACTIVESEAM technical
activewear. Performance fabrics, full-package production. Get a quote.

### Underwear  (/underwear-manufacturer/)
**SEO Title:** Underwear Manufacturer | Athletik Clothing
**Meta Description:**
Technical underwear manufacturer — FLATLOCK, ACTIVESEAM & seamless construction.
Boxers, thermals, 4-way stretch & merino. Full-package OEM/ODM. Get a quote.

### Outdoor Clothing  (/outdoor-clothing-manufacturer/)
**SEO Title:** Outdoor Clothing Manufacturer | Athletik Clothing
**Meta Description:**
Outdoor clothing manufacturer for technical base layers, mid-layers & outerwear.
Thermal & performance knit construction, full-package OEM. Request a quote.

### Merino Wool  (/merino-wool-manufacturer/)
**SEO Title:** Merino Wool Apparel Manufacturer | Athletik Clothing
**Meta Description:**
Merino wool apparel manufacturer — base layers, underwear, jacquard & printed
pieces with technical knit construction. Full-package OEM/ODM. Get a quote.

### Silk Wear  (/silk-wear-manufacturer/)
**SEO Title:** Silk Wear Manufacturer | Athletik Clothing
**Meta Description:**
Knitted silk wear manufacturer — lightweight, breathable base layers & apparel
with FLATLOCK and ACTIVESEAM construction. Full-package OEM. Request a quote.

### Knitted Fabrics  (/knitted-fabrics-manufacturer/)
**SEO Title:** Knitted Fabrics Manufacturer | Athletik Clothing
**Meta Description:**
Knitted fabrics manufacturer for performance, thermal, stretch, Merino wool,
and recycled knit programs. Custom development for B2B apparel buyers.

### Sports Accessories  (/sports-accessories-manufacturer/)
**SEO Title:** Sports Accessories Manufacturer | Athletik Clothing
**Meta Description:**
Technical knit sports accessories manufacturer — balaclavas, gloves & liners
with performance fabrics and FLATLOCK construction. Full-package OEM. Get a quote.

================================================================
## Services  (/services/)
================================================================
**SEO Title:** OEM Knitwear Services: Sampling to Shipping | Athletik Clothing
**Meta Description:**
Full-package OEM/ODM knitwear services — sampling, bulk production, QC and
export. Vertically integrated, from our own fabric mill to finished garment.

================================================================
## About  (/about-us/)
================================================================
**SEO Title:** About Us — Knitwear Manufacturer | Athletik Clothing
**Meta Description:**
Athletik Clothing is a vertically integrated OEM knitwear manufacturer in the
Suzhou area, China, with 15+ years producing technical knitwear for global brands.

================================================================
## Contact  (/contact/)
================================================================
**SEO Title:** Contact Us — Get a Quote | Athletik Clothing
**Meta Description:**
Tell us about your knitwear project and our team will reply with a quote and
next steps. OEM/ODM full-package manufacturing for performance brands.

================================================================
## Sustainability  (/sustainability/)
================================================================
**SEO Title:** Sustainability & Certifications | Athletik Clothing
**Meta Description:**
Responsible knitwear manufacturing — GRS recycled fabrics, OEKO-TEX 100, BSCI,
Sedex, WRAP & more. Practical, verifiable steps for performance brands.

================================================================
## Technical Guides hub  (/technical-guides/)
================================================================
Primary keyword: technical knitwear guides / performance knitwear production

**SEO Title:**
Technical Knitwear Guides for Buyers | Athletik Clothing

**Meta Description:**
Practical technical guides for cut-and-sew performance knitwear buyers,
covering seam construction, tech packs, testing and OEM evaluation.

================================================================
## Technical guide  (/flatlock-vs-overlock-technical-knitwear/)
================================================================
Primary keyword: FLATLOCK vs OVERLOCK / technical knitwear seams

**SEO Title:**
FLATLOCK vs OVERLOCK for Technical Knitwear | Athletik

**Meta Description:**
Compare FLATLOCK and OVERLOCK for technical knitwear: seam profile, 607/514
stitch references, garment applications, testing and tech pack callouts.

================================================================
## Technical guide  (/technical-knitwear-tech-pack-guide/)
================================================================
Primary keyword: technical knitwear tech pack

**SEO Title:**
Technical Knitwear Tech Pack Guide | Athletik Clothing

**Meta Description:**
Build a cut-and-sew technical knitwear tech pack with fabric specifications,
seam maps, POMs, tolerances, testing requirements and approval stages.

================================================================
## Technical guide  (/evaluate-technical-knitwear-oem/)
================================================================
Primary keyword: evaluate technical knitwear OEM

**SEO Title:**
How to Evaluate a Technical Knitwear OEM | Athletik

**Meta Description:**
Evaluate a cut-and-sew knitwear OEM by checking process ownership, fabric
controls, seam capability, testing, traceability, capacity and approvals.

================================================================
## Image alt text (general rule for Codex)
================================================================
Every image needs descriptive alt text with a natural keyword, e.g.:
- hero: alt="vertically integrated knitwear manufacturing facility"
- category cards: alt="FLATLOCK sportswear base layer", alt="merino wool underwear"
- process: alt="garment sample room", alt="knitwear production floor"
- certifications: alt="OEKO-TEX Standard 100 certification", etc.
NOT filenames, NOT "image1". Describe what's shown + relevant keyword.

================================================================
## Rank Math setup notes
================================================================
- Enable Rank Math's XML sitemap (Rank Math → Sitemap Settings). Submit it to
  Google Search Console after launch.
- Set a default Title separator and a fallback OG image (a strong brand image)
  for social sharing.
- Each page: paste SEO Title + Meta Description above into the Rank Math box
  under the page editor. Aim for the green/“good” score but don't obsess —
  readable and accurate beats keyword-stuffed.

================================================================
## 字段真值来源（SEO-IMP-011，2026-08-19 核定）
================================================================
本文档是全部页面 SEO Title / Meta Description 的**规范真值**。但实际生产输出
由不同机制落地，改动前先看下面这张表，避免“改了代码/文档，生产却没变”：

| 页面 | 生产 Meta 的实际来源 |
|---|---|
| 首页 `/` | `functions.php` 的 `myathletik_home_meta_description()` 硬编码（首页 Rank Math 描述字段保持为空，防止输出两个 description 标签） |
| 六个服装品类页（Sportswear、Underwear、Outdoor、Merino、Silk、Sports Accessories） | **仅** Rank Math 后台字段（数据库）。`inc/product-category-data.php` 里的 `seo_title` / `meta_description` 不参与生产输出，改它们无效 |
| Knitted Fabrics 品类页 | `inc/product-category-data.php` 的 `meta_description`（唯一例外）。主题 `rank-math.php` 的过滤器用它覆盖前端、OG/Twitter 和 WebPage Schema 描述 |
| 三篇技术指南 + `/technical-guides/` Hub | `inc/technical-article-data.php` 的 `seo_title` / `meta_description`。`functions.php` 的 init 钩子把它们写入 Rank Math 数据库字段，`rank-math.php` 过滤器再从同一份数据覆盖输出 |
| Services、About、Contact、Sustainability | **仅** Rank Math 后台字段（数据库），代码中没有对应字段 |

关键机制说明：

- 主题根目录的 `rank-math.php` **不是** `functions.php` 加载的；Rank Math 插件
  会自动加载启用主题下的 `rank-math.php`（见插件主文件
  `seo-by-rank-math/rank-math.php` 的 `includes()`）。插件停用时这些过滤器
  随之失效，因此数据库字段值应始终与本文档保持一致，作为兜底。
- 修改任何页面的 Title/Description 时：先改本文档（规范），再按上表同步
  对应的 Rank Math 后台字段或代码字段，三处保持一致。
