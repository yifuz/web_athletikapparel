# Athletik Clothing — Sitemap & Page Plan (Rebuild v1)

Status reconciled: 2026-08-10. Current implementation and URL decisions below
supersede the earlier planning assumptions retained in historical sections.

Legacy-domain correction: `myathletik.com` has been fully taken offline without
cross-domain redirects by explicit owner decision; all checked public endpoints
and host variants return HTTP 410. It is outside this
rebuild's implementation scope; current URL/SEO work applies only to
`https://www.athletikapparel.com/`.

Companion to `AGENTS.md`. This is the build blueprint: every page, its URL, its
single H1, target search intent, historical URL context, and content-block
outline. Agents may draft long-form body copy when the user explicitly requests
or authorizes it; owner review is required before publication.

Legend:
- **NEW** = page didn't exist before, no redirect needed
- **Historical old URL** = planning reference only; do not add a redirect
  unless current Search Console, server-log, or backlink evidence justifies it
- **KEEP** = current live URL stays as-is

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
│   ├── /sports-accessories-manufacturer/
│   └── /#ma-home-categories-title  (current Products hub; `/products/` is not built)
│
├── CAPABILITIES / PRODUCTION  ❌ CANCELLED (2026-07)
│   └── /production/ /factory/ /equipments/  — not being built this phase
│
├── SERVICES / PROCESS
│   └── /services/            (overview only — single page)
│   ❌ CANCELLED (2026-07): sub-pages /sampling-prototyping/ /bulk-production/
│      /quality-control/ /export-shipping/ — folded into /services/ overview
│
├── TECHNICAL GUIDES
│   └── /flatlock-vs-overlock-technical-knitwear/
│
├── /sustainability/   (correct live slug; no historical redirect implemented)
├── /about-us/
└── /contact/
```

---

## 1. Home — `/`  (KEEP)

**Current H1:** Performance Knitwear Manufacturer

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
7. Latest from blog — deferred and disabled until real posts exist.
8. Inquiry CTA band — shared Fluent Form 3 with product category, estimated
   order quantity, business type, company details, and project message.

Current approved homepage copy is recorded in `homepage-copy.md` and the live
template; this structure document does not override it.

---

## 2. Product category pages (top-level, keyword-aligned)

All 7 follow the SAME template so structure stays consistent. The old
`/products/<x>/` paths are historical references only. No legacy category
redirects are planned under the owner's 2026-08-08 retirement decision.

### Shared template for every category page
**H1:** `[Category] Manufacturer` (e.g. "Sportswear Manufacturer")
1. Intro — what you make in this category + who it's for (B2B, MOQ 1,000 pcs
   per style).
2. Capabilities — fabrics, construction (flatlock/activeseam where relevant),
   finishing options.
3. Product/style examples — real photos, grouped, with alt text.
4. Specs band — MOQ, lead time, sampling availability.
5. Related: link to /services/ and to 1–2 sibling categories (internal linking).
6. Inquiry CTA.

【CONTENT: user to write body copy per page】

| Page | URL | H1 | Historical old URL (no redirect) |
|------|-----|----|----------------------------------|
| Sportswear | `/sportswear-manufacturer/` | Sportswear Manufacturer | `/products/sportswear/` |
| Underwear | `/underwear-manufacturer/` | Underwear Manufacturer | `/products/underwear/` |
| Outdoor Clothing | `/outdoor-clothing-manufacturer/` | Outdoor Clothing Manufacturer | `/products/outdoor-clothing/` |
| Merino Wool | `/merino-wool-manufacturer/` | Merino Wool Apparel Manufacturer | `/products/merino-wool-apparel/` |
| Silk Wear | `/silk-wear-manufacturer/` | Silk Wear Manufacturer | `/products/silk-wear/` |
| Knitted Fabrics | `/knitted-fabrics-manufacturer/` | Knitted Fabrics Manufacturer | `/products/knitted-fabrics/` |
| Sports Accessories | `/sports-accessories-manufacturer/` | Sports Accessories Manufacturer | `/products/sports-accessories/` |

### Products hub — homepage product section (current implementation)

The homepage product section at `/#ma-home-categories-title` is the current
Products hub and links to all 7 category pages. `/products/` is intentionally
not built, is absent from navigation and the Sitemap, and currently returns
404. Only create a standalone hub or add a redirect if future Search Console,
server-log, or backlink evidence shows that `/products/` has real value.

---

## 2A. Technical guide — `/flatlock-vs-overlock-technical-knitwear/`  (NEW)

**H1:** FLATLOCK vs OVERLOCK for Technical Knitwear

**Purpose:** Answer a high-intent buyer question with first-party production
evidence, clarify stitch types 607 and 514, distinguish ACTIVESEAM, and give
buyers an actionable seam-map and tech pack checklist.

**Block outline:**
1. Direct answer and publication/review metadata.
2. FLATLOCK definition with the approved Yamato production video.
3. OVERLOCK definition with the approved production video.
4. Comparison table and garment-area decision logic.
5. Fabric, thread, machine-setting and testing considerations.
6. ACTIVESEAM distinction.
7. Tech pack / spec sheet checklist.
8. Visible FAQ, primary technical references and inquiry CTA.

The page is linked from the Sportswear and Underwear category pages. It is a
top-level technical guide, not the start of a `/blog/` hierarchy.

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

## 5. Sustainability — `/sustainability/`

**H1:** Sustainability
The current page and navigation use the correct spelling. The historical
misspelling `/sustainabilty/` has no redirect currently implemented. Check the
exact legacy-domain URL, indexed traffic and backlinks during the migration
inventory before deciding whether a redirect is required.

【CONTENT: user to write】

---

## 6. About Us — `/about-us/`  (KEEP)

**H1:** About Us
Company story, own production facility / vertical integration, regional
coverage, and foreign-trade capability. Do not publish a factory count or
subcontracting details. Replace stock imagery.

---

## 7. Contact — `/contact/`  (KEEP)

**H1:** Contact Us
Inquiry form with lead-filtering fields:
- Estimated order quantity
- Product category of interest
- Company / business type
- Message with a prompt to include a tech pack link when available

File Upload is not part of the current Fluent Forms free-tier implementation.

Plus: direct contact details and the own-facility address. Do not publish a
factory count or partner-factory locations.

### Cleanup tied to this page
- ✅ The leftover `/contact-2/` ("Contact_example") footer link was removed.
  No historical redirect is planned under the owner's legacy-domain decision.

---

## 8. Legacy-domain redirects — NOT PLANNED (owner decision)

The legacy `myathletik.com` site now returns HTTP 410 without cross-domain
redirects. The mappings below remain historical planning context only and must
not be implemented unless the owner later reopens the decision.

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
2. ~~**7 category pages**~~ — ✅ DONE (top-level keyword-aligned URLs; no historical redirects)
3. ~~**Services pages**~~ — ✅ `/services/` single page DONE; sub-pages CANCELLED
4. ~~**Factory / Equipment**~~ — ❌ CANCELLED this phase
5. ~~**About / Sustainability / Contact**~~ — ✅ pages DONE and polished
6. ~~**Legacy-domain redirects**~~ — ❌ out of scope by owner decision
7. ~~**Page-by-page visual polish + QA cleanup**~~ — ✅ completed before launch
8. **Production launch** — ✅ complete on Flywheel; final site and uploads
   synchronized 2026-07-28
9. **First technical guide** — ✅ approved and implemented locally on
   2026-08-11; production synchronization pending

Confirmed slug: `/merino-wool-manufacturer/`.
