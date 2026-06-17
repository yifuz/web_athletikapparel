# myathletik.com — Sitemap & Page Plan (Rebuild v1)

Companion to `SKILL.md`. This is the build blueprint: every page, its URL, its
single H1, its target search intent, the 301 source (if it replaces an old
URL), and a content-block outline. The user writes all long-form body copy;
this plan defines structure only.

Legend:
- **NEW** = page didn't exist before, no redirect needed
- **301 from** = replaces an existing indexed URL, requires a 301 redirect
- **KEEP** = existing URL stays as-is

---

## 0. Site structure at a glance

```
Home  /
│
├── PRODUCTS (top-level keyword pages — the SEO traffic engine)
│   ├── /sportswear-manufacturer/
│   ├── /underwear-manufacturer/
│   ├── /outdoor-clothing-manufacturer/
│   ├── /merino-wool-manufacturer/
│   ├── /silk-wear-manufacturer/
│   ├── /knitted-fabrics-manufacturer/
│   └── /sports-accessories-manufacturer/
│   └── /products/  (overview hub linking to all of the above)
│
├── CAPABILITIES / PRODUCTION (auxiliary — hierarchy kept)
│   ├── /production/
│   ├── /factory/
│   └── /equipments/
│
├── SERVICES / PROCESS (differentiation vs. competitors)
│   ├── /services/            (overview)
│   ├── /sampling-prototyping/
│   ├── /bulk-production/
│   ├── /quality-control/
│   └── /export-shipping/
│
├── /sustainability/   (301 from misspelled /sustainabilty/)
├── /about-us/
└── /contact/
```

---

## 1. Home — `/`  (KEEP)

**H1:** Vertically Integrated OEM Knitwear Manufacturer
*(or your preferred headline — one H1 only)*

**Purpose:** Establish positioning in 5 seconds, route buyers to the right
category page, capture inquiries.

**Block outline:**
1. Hero — headline + one-line positioning + primary CTA (Contact / Get a Quote).
   **Real factory image, not stock.**
2. Capability strip — 3–4 proof points (vertical integration, flatlock/
   activeseam, four factories, full export docs). Icons + short labels.
3. Product categories grid — 7 cards, each linking to its `*-manufacturer/`
   page. Replaces the current 30-image untitled wall.
4. Why myathletik — 3 differentiators (technical construction, finishing
   capabilities like Carbondry & laser perforation, regional merchandiser teams).
5. Process snapshot — 4-step strip (Sample → Production → QC → Export),
   links to /services/.
6. Certifications / audits strip — the existing badge row (keep, it's good).
7. Latest from blog — 1–3 posts.
8. Inquiry CTA band — short form (budget tier + order quantity fields to
   filter sub-MOQ leads).

【CONTENT: user to write hero headline + positioning paragraph】

---

## 2. Product category pages (top-level, keyword-aligned)

All 7 follow the SAME template so structure stays consistent. Each is a 301
target replacing an old `/products/<x>/` URL.

### Shared template for every category page
**H1:** `[Category] Manufacturer` (e.g. "Sportswear Manufacturer")
1. Intro — what you make in this category + who it's for (B2B, MOQ ~500).
2. Capabilities — fabrics, construction (flatlock/activeseam where relevant),
   finishing options.
3. Product/style examples — real photos, grouped, with alt text.
4. Specs band — MOQ, lead time, sampling availability.
5. Related: link to /services/ and to 1–2 sibling categories (internal linking).
6. Inquiry CTA.

【CONTENT: user to write body copy per page】

| Page | URL | H1 | 301 from |
|------|-----|----|----------|
| Sportswear | `/sportswear-manufacturer/` | Sportswear Manufacturer | `/products/sportswear/` |
| Underwear | `/underwear-manufacturer/` | Underwear Manufacturer | `/products/underwear/` |
| Outdoor Clothing | `/outdoor-clothing-manufacturer/` | Outdoor Clothing Manufacturer | `/products/outdoor-clothing/` |
| Merino Wool | `/merino-wool-manufacturer/` | Merino Wool Apparel Manufacturer | `/products/merino-wool-apparel/` |
| Silk Wear | `/silk-wear-manufacturer/` | Silk Wear Manufacturer | `/products/silk-wear/` |
| Knitted Fabrics | `/knitted-fabrics-manufacturer/` | Knitted Fabrics Manufacturer | `/products/knitted-fabrics/` |
| Sports Accessories | `/sports-accessories-manufacturer/` | Sports Accessories Manufacturer | `/products/sports-accessories/` |

### Products hub — `/products/`  (KEEP as overview)
**H1:** Our Products
Simple overview page: 7 category cards linking out. Keeps the `/products/` URL
alive (it has equity) and gives the nav a parent landing page.

---

## 3. Capabilities / Production (auxiliary — URLs kept)

### Production overview — `/production/`  (KEEP)
**H1:** Production & Manufacturing Capabilities
Overview of the vertically integrated process; links to Factory and Equipment.

### Factory — `/factory/`  (KEEP)
**H1:** Our Factories
The four factories, locations, capacity, what makes vertical integration real.
**Use real factory photos.**

### Equipment — `/equipments/`  (KEEP)
**H1:** Manufacturing Equipment
Machine list — Yamato flatlock machines, coverstitch, overlock, laser
perforation, Carbondry finishing line. This is concrete proof; lean into specifics.

【CONTENT: user to write】

---

## 4. Services / Process  (the differentiation layer — mostly NEW)

This is what most factory-type competitors lack. Your export-documentation and
full-service capability lives here.

### Services overview — `/services/`  (NEW)
**H1:** Our Services
4–6 service cards (Sampling, Bulk Production, QC, Export & Shipping) linking out.
Mirrors the proven competitor structure but framed for mid-sized technical orders.

### Sampling & Prototyping — `/sampling-prototyping/`  (NEW)
**H1:** Sampling & Prototyping
Tech pack handling, pattern making, sample lead times, revision policy.

### Bulk Production — `/bulk-production/`  (NEW)
**H1:** Bulk Production
MOQ, capacity, quality system, how orders run.

### Quality Control — `/quality-control/`  (NEW)
**H1:** Quality Control
Inspection process, audits/certifications (tie to the badge row), pre-ship video.

### Export & Shipping — `/export-shipping/`  (NEW)
**H1:** Export & Global Shipping
**Your edge:** full export documentation (Commercial Invoice, Packing List, CO),
sea freight handling, incoterms, regional merchandiser support (NA/Europe/Nordics).
Most pure factories can't speak to this — make it prominent.

【CONTENT: user to write】

---

## 5. Sustainability — `/sustainability/`  (301 from `/sustainabilty/`)

**H1:** Sustainability
**Critical:** the old slug is misspelled (`/sustainabilty/`). New page uses the
correct spelling; old slug MUST 301 to the new one. Fix the nav label too.

【CONTENT: user to write】

---

## 6. About Us — `/about-us/`  (KEEP)

**H1:** About myathletik
Company story, the four factories, regional merchandiser teams (North America /
Europe / Nordics), foreign-trade capability. Replace stock imagery.

---

## 7. Contact — `/contact/`  (KEEP)

**H1:** Contact Us
Inquiry form with lead-filtering fields:
- Budget tier (set thresholds appropriate for ~500 MOQ technical orders —
  higher than a startup-focused competitor's tiers)
- Estimated order quantity
- Product category of interest
- Company / selling channel
- Message + file upload (tech packs)

Plus: direct contact details, factory location(s).

### Cleanup tied to this page
- Remove the leftover `/contact-2/` ("Contact_example") demo page from footer.
  301 `/contact-2/` → `/contact/` if it was ever indexed.

---

## 8. Master 301 redirect list (hand this to the redirect plugin)

| Old URL | New URL | Reason |
|---------|---------|--------|
| `/products/sportswear/` | `/sportswear-manufacturer/` | category → top-level |
| `/products/underwear/` | `/underwear-manufacturer/` | category → top-level |
| `/products/outdoor-clothing/` | `/outdoor-clothing-manufacturer/` | category → top-level |
| `/products/merino-wool-apparel/` | `/merino-wool-manufacturer/` | category → top-level |
| `/products/silk-wear/` | `/silk-wear-manufacturer/` | category → top-level |
| `/products/knitted-fabrics/` | `/knitted-fabrics-manufacturer/` | category → top-level |
| `/products/sports-accessories/` | `/sports-accessories-manufacturer/` | category → top-level |
| `/sustainabilty/` | `/sustainability/` | spelling fix |
| `/contact-2/` | `/contact/` | remove demo page |

---

## 9. Build order (recommended sequence)

1. **Home** — biggest visibility, sets the template/design language.
2. **7 category pages** — from the shared template; these carry SEO + 301s.
3. **Services pages** — the differentiation layer.
4. **Factory / Equipment / About** — fill with real photos + real specs.
5. **Sustainability + Contact cleanup** — fix slugs, forms, remove demo page.
6. **Apply all 301s** before/at launch — never after, to avoid an index gap.

【确认项 still open from SKILL.md:
 - merino slug: /merino-wool-manufacturer/ vs /merino-wool-apparel-manufacturer/
 - any category H1 wording you'd phrase differently】
