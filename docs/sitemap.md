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
├── CAPABILITIES / PRODUCTION  ❌ CANCELLED (2026-07)
│   └── /production/ /factory/ /equipments/  — not being built this phase
│
├── SERVICES / PROCESS
│   └── /services/            (overview only — single page)
│   ❌ CANCELLED (2026-07): sub-pages /sampling-prototyping/ /bulk-production/
│      /quality-control/ /export-shipping/ — folded into /services/ overview
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
   activeseam, own production facility, full export docs). Do not publish a
   factory count or subcontracting details. Icons + short labels.
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

## 3. Capabilities / Production  ❌ CANCELLED (2026-07)

Originally planned `/production/` / `/factory/` / `/equipments/` auxiliary
pages. **Not being built this phase.** Capability proof points live on the
homepage (capability-proof, numbers-proof blocks) and inline on category pages.

---

## 4. Services / Process

### Services overview — `/services/`  ✅ DONE (single page, `page-services.php`)
**H1:** Our Services
4-stage process strip (Sample → Production → QC → Export) on one page.

**❌ CANCELLED (2026-07):** sub-pages `/sampling-prototyping/`
`/bulk-production/` `/quality-control/` `/export-shipping/` — folded into the
single `/services/` overview. Home page process-snapshot links all point to
`/services/` (no dead links).

---

## 5. Sustainability — `/sustainability/`  (301 from `/sustainabilty/`)

**H1:** Sustainability
**Critical:** the old slug is misspelled (`/sustainabilty/`). New page uses the
correct spelling; old slug MUST 301 to the new one. Fix the nav label too.

【CONTENT: user to write】

---

## 6. About Us — `/about-us/`  (KEEP)

**H1:** About myathletik
Company story, own production facility / vertical integration, regional
coverage, and foreign-trade capability. Do not publish a factory count or
subcontracting details. Replace stock imagery.

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
- ✅ The leftover `/contact-2/` ("Contact_example") footer link was removed.
  No historical redirect was added because the old site had no inherited
  search equity.

---

## 8. Historical 301 redirect plan — NOT IMPLEMENTED

The old site's pages were confirmed dead with no inherited search equity.
The mappings below are retained only as historical planning context and must
not be added unless Search Console later proves that a specific old URL still
has indexed traffic or inbound links.

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

1. ~~**Home**~~ — ✅ DONE
2. ~~**7 category pages**~~ — ✅ DONE (carry SEO + 301s)
3. ~~**Services pages**~~ — ✅ `/services/` single page DONE; sub-pages CANCELLED
4. ~~**Factory / Equipment**~~ — ❌ CANCELLED this phase
5. ~~**About / Sustainability / Contact**~~ — ✅ pages DONE and polished
6. ~~**Historical 301 plan**~~ — ✅ cancelled; old site had no equity to preserve
7. ~~**Page-by-page visual polish + QA cleanup**~~ — ✅ completed before launch
8. **Production launch** — ✅ complete on Flywheel; final site and uploads
   synchronized 2026-07-28

Confirmed slug: `/merino-wool-manufacturer/`.
