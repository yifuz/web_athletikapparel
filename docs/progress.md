# Project Progress Snapshot - myathletik.com Rebuild

Read this together with AGENTS.md / CLAUDE.md, docs/sitemap.md,
docs/design-brief.md, and docs/homepage-copy.md when starting a new session.
This file tracks WHAT IS DONE and WHAT IS LEFT, since the rule docs only
define HOW. Also check `git log` for the latest commits.

Last updated: 2026-07-21 — reflects code re-audit after the visual-polish
phase (homepage product-area rebuild, product-page subcategory system,
subcategory de-duplication, video hero, lookbook expansion).

---

## Project at a glance

- Code-first WordPress rebuild. LocalWP (Windows) -> will deploy to GoDaddy.
- Base theme: GeneratePress. All work in child theme `myathletik-child`.
- Agents: Codex (AGENTS.md) and Claude Code (CLAUDE.md), same rules.
- Git initialized in the child theme dir; commit per meaningful change.
- Reference site for STRUCTURE only: hongyuapparel.com. Do not copy its
  startup tone or visuals.

## Key positioning / guardrails (do not violate)

- Athletik Clothing, 15+ yrs technical knit OEM.
- Public story: "our own production facility / vertically integrated." NEVER
  reveal the real number of factories or that orders are subcontracted.
- Vertical capability can be stated as "from yarn to finished garment."
- Audience: mid-sized B2B brand clients. MOQ 500/style (300/style multi-style).
- Voice: professional + credible + warm. Not startup hand-holding.
- URLs: top-level keyword style (/sportswear-manufacturer/ etc.). See §"301
  redirects" below — NOT being done (old site dead).
- User writes all long-form body copy unless explicitly requested otherwise.
- No stock photos on live pages. Use placeholders for missing real photos.
- Confirmed numbers: 15+ yrs / 4,500+ sq m own facility / 100,000+ pcs/month /
  3 continents. Russia deliberately removed from the regions list
  (geopolitically sensitive); regions now read "North America, Europe, and
  Asia-Pacific."

---

## DONE

### Foundation & global
- Full child theme scaffold (style.css with :root warm tokens, functions.php,
  front-page.php, template-parts/home/*, template-parts/product-category/).
- Design tokens in :root include --ma-color-white and --ma-color-dark so dark
  bands and white surfaces no longer hardcode hex (QA P1-6 resolved).
- Heading font: Manrope (Google Fonts, enqueued with display=swap);
  --ma-font-head token; hero/site title use lighter 600 weight. Preconnect
  hints configured.
- Navigation: WP menu system + custom styling (logo left, menu right, Products
  dropdown, Contact as accent CTA button). Desktop single-row, mobile hamburger.
- Header brand wordmark: two-tone "Athletik" (dark bold) + "Clothing" (muted
  accent, uppercase, thin) with a 1px divider. Implemented via the
  `generate_site_title_output` filter so it overrides GP's default markup.
- Custom B2B footer (functions.php): brand blurb, Services/Company nav,
  contact block, quote CTA. Social links: Instagram + YouTube point to the
  real @athletikclothinginc accounts. WhatsApp still pending (see TODO).
- Per-page SEO <title> + meta description for: Services, About, Sustainability,
  and all 7 product category pages (driven by inc/product-category-data.php).

### Homepage (front-page.php — 11 blocks)
Block order: hero, client-logos, product-categories, capability-proof,
why-myathletik, style-gallery, numbers-proof, process-snapshot,
partnership-trust, certifications, inquiry-cta.
(latest-posts is commented out — no posts yet.)
- Hero: 4-cell bento collage of real photos (2 sportswear garments + sewing +
  knitting). Stock pexels photo removed. <img> with alt/width/height, eager.
- Client logo marquee: full-bleed seamless auto-scroll, grayscale with
  color-on-hover. Clients all authorized.
- Product-categories grid: REBUILT as 3-tier Bento (v2). Sportswear is the
  large feature card on the left (biggest area = visual focus); Merino is a
  tall card on the right. Tier 2 = Knitted Fabrics + Outdoor; Tier 3 = Silk +
  Accessories + Underwear. Hierarchy driven by card AREA, each tier locks an
  aspect ratio so the grid stays aligned. 7 dedicated cat_* images, no overlap
  with Hero or lookbook. Section sits ABOVE capability-proof now. Merino card
  has a subtitle "Apparel & base layers" to clarify it is apparel, not raw
  wool. H2 simplified to "What we make".
- Style-gallery (lookbook): EXPANDED 12 -> 24 columns (46 unique images, was
  23). Fixed 3 missing merino images that were broken. Distribution: silkwear
  15, merino 10, sportswear 8, underwear 7, outdoor 6. Zero overlap with hero /
  bento / partnership / product-page subcats. Excludes Knitted Fabrics &
  Accessories (non-apparel).
- Capability-proof, why-myathletik, certifications, numbers-proof,
  process-snapshot, partnership-trust, inquiry-cta: built and copy-filled.
  Numbers-proof regions corrected to "North America, Europe, and Asia-Pacific"
  (Russia removed). Process-snapshot links all point to /services/.

### Product category pages (7) — subcategory showcase system
- All 7 top-level SEO slugs built from a shared data file + shared template
  part + slug-specific page templates (page-{slug}.php).
- Each category page structure: hero (H1 + intro + CTAs) -> "What we make"
  index list (each item is an anchor link that jumps to its detail block
  below) -> "Product range" subcategory showcase -> Construction & fabric ->
  Specs band -> Related links -> Inquiry CTA.
- Subcategory showcase: every subcategory gets image + title + one-line
  description, alternating left/right on tablet+. Data lives in the
  `subcategories` array (title/description/image) per category.
- "What we make" text list items become clickable anchor links to the matching
  `#subcat-{slug}` detail block when subcategories exist.
- Old "Sample image groups" gallery section is HIDDEN when subcategories exist
  (all 7 categories have them now) — so the unsplash stock images that used
  to live there (P1-2) no longer render. The block only shows for categories
  without subcategories (currently none).
- Hero "View Examples" button points to the subcats heading when subcats
  exist, else to #product-examples.
- Subcategory de-duplication (strict): see §"Subcategory structure" below.

### Video hero (Merino Wool prototype)
- Merino Wool page renders a muted autoplay looping <video> behind the hero
  text, with a dual-gradient overlay (left-dark for text legibility +
  bottom-dark). Driven by the `hero_video` field in category data.
- `hero_video_position` field supports per-video object-position to keep
  portrait subjects' heads in frame when cropped to a wide hero (Merino uses
  "center 20%").
- Backward compatible: categories without hero_video keep the plain
  surface-color hero. Prototype on Merino; other categories pending video
  assets.

### Other pages
- Services: page-services.php, single overview, 4-stage process strip.
  H-tag bug (P1-7b: broken `<h3>` open + `<h2>...</h3>` mismatch) FIXED.
- About Us: page-about-us.php.
- Contact: page-contact.php (FluentForm shortcode id=3).
- Sustainability: page-sustainability.php.
- Blog: latest-posts block returns early when empty AND is commented out in
  front-page.php. Re-enable by uncommenting get_template_part line once posts
  exist.

## Subcategory structure (after 2026-07 de-duplication)

Each subcategory owns unique content; no overlap across categories. All 7
SEO landing-page URLs preserved.

| Category | # subcats | Subcategories |
|----------|-----------|---------------|
| Sportswear | 4 | Training tops/tanks/tees; Leggings & compression; Yoga & studio; Running singlets & layers (merged two compression items into one) |
| Underwear | 4 | Boxer/brief; Thermal base layer (absorbed Outdoor's base layers); 4-way-stretch; Microfiber & merino (dropped 5th "Seamless bonded-welded") |
| Outdoor Clothing | 4 | Mid-layer/hoodies; Cold-weather layering; Hiking/trekking; Merino-blend & Genesis fleece (dropped base layer -> moved to Underwear) |
| Merino Wool | 4 | Jacquard; Printed; Blend; Yarn sourcing & fabric development (dropped base layer -> unique vertical-integration story) |
| Silk Wear | 3 | Base layer/underwear; Lightweight apparel; Blend (structure kept, copy stresses silk-only properties) |
| Knitted Fabrics | 5 | Performance knit; Thermal; Functional finishes; Stretch/microfiber/merino; Recycled (GRS). Independent fabric-supply business. |
| Sports Accessories | 3 | Balaclavas; Gloves/liners; Knit accessories |

## 301 redirects — NOT being done (decision: 2026-07-21)

User confirmed: **301 redirects are not needed and not being implemented.**
The old site's pages are all dead, no inherited search equity to preserve.
- The 7 category-page redirects in docs/sitemap.md §8 (/products/<x>/ ->
  /<x>-manufacturer/) are NOT required and should not be added.
- The misspelled `/sustainabilty/` -> `/sustainability/` 301 in functions.php
  is also being removed per the same decision (no indexed inbound links to
  protect). See TODO #5.

## TO DO

1. **WhatsApp footer link still `#`:** functions.php has `href="#"` +
   `[NEEDS INPUT: WhatsApp URL]`. Instagram + YouTube are done; WhatsApp is
   the last social link. Either provide the URL or hide the icon.
   (QA P0-2 — partial, last item.)
2. **Contact form (FluentForm id=3) field audit:** backend confirmation that
   the form has the sitemap-required lead-filtering fields (budget tier,
   order quantity, selling channel, website, tech-pack upload). Code can't
   verify this — needs WP admin check. (QA P1-8 — open.)
3. **Remove the /sustainabilty/ -> /sustainability/ 301 redirect** in
   functions.php (`myathletik_redirect_misspelled_sustainability_slug`).
   Per the 2026-07-21 decision, redirects are not being done.
4. **Video hero rollout beyond Merino:** the architecture is ready
   (hero_video + hero_video_position fields). Pending video assets for the
   other 6 category pages + the homepage hero.
5. **Remote git repository:** no remote configured yet. Pending user
   providing a repo URL (GitHub/GitLab/etc.) when ready.

## Notes / status of the 07-03 QA audit

Full audit in docs/qa-audit-260703.md. As of 2026-07-21 the code-reverified
status of each item:

| ID  | Item | Status |
|-----|------|--------|
| P0-1 | process-snapshot dead links | ✅ fixed |
| P0-2 | footer social `#` links | ⚠️ partial — IG/YT done, WhatsApp still `#` (TODO #1) |
| P0-3 | footer `/sitemap/` dead | ✅ fixed → /wp-sitemap.xml |
| P0-4 | footer `/blog/` | ✅ removed; blog block disabled |
| P1-1 | hero stock photo | ✅ fixed — real bento collage |
| P1-2 | knitted-fabrics/accessories stock | ✅ effectively resolved — the gallery section that showed those unsplash images is now hidden behind the subcategory showcase on all 7 pages |
| P1-3 | redirect-note visible to visitors | ✅ fixed |
| P1-4 | style-gallery/partnership placeholders | ✅ fixed |
| P1-5 | latest-posts placeholder | ✅ fixed |
| P1-6 | hardcoded hex -> tokens | ✅ fixed |
| P1-7 | services stage H2 -> H3 | ✅ fixed (and P1-7b tag-mismatch bug also fixed) |
| P1-8 | contact form field audit | ⏳ needs WP admin (TODO #2) |
| P1-9 | "3 continents" wording / Russia | ✅ fixed |
| P1-10 | hero image alt | ✅ fixed |

## Image storage rule (IMPORTANT — read before placing any image)

- ALL theme images live in `wp-content/uploads/myathletik-theme/assets/images/`
  (NOT in `themes/myathletik-child/assets/images/`). The theme assets dir is
  kept empty except for a `.gitkeep`, and is gitignored.
- An output buffer in `functions.php` (`myathletik_rewrite_image_urls`, hooked
  via `ob_start` on `template_redirect`) rewrites theme-relative image URLs to
  the uploads path at render time. So PHP keeps writing
  `get_stylesheet_directory_uri() . '/assets/images/...'` and the browser is
  silently served from uploads.
- Videos follow the same pattern — place them anywhere under
  `uploads/myathletik-theme/assets/images/` and reference theme-relative.
- Therefore: to add/change an image or video, drop the file into the matching
  folder under `uploads/myathletik-theme/assets/images/` only. Do NOT copy it
  into the theme dir (it would be ignored and never served).

## Notes / gotchas learned

- LocalWP: if site won't start / MySQL error, kill stray `mysqld.exe` in Task
  Manager, then restart site.
- VPN (Clash): bypass `.local` so system proxy can stay on. Or toggle system
  proxy off to view local site.
- Git: if VSCode git UI hangs (pipe ENOENT), use the terminal. If locked,
  delete `.git\index.lock`.
- Desktop layout has been a recurring weak spot - always verify desktop
  (1440px, 100% zoom) explicitly, not just mobile.
- Stats / proof cards: use separate number/unit elements so cards align.
- When editing heading levels, double-check BOTH opening and closing tags —
  the services.php bug (H2 opened, H3 closed; missing h3 open) slipped through
  a P1-7 "fix."
- For nav menu URL corrections: `wp_update_nav_menu_item` with partial args
  can wipe other fields. Use `update_post_meta( $db_id, '_menu_item_url', ... )`
  for surgical URL-only changes.
- For square/portrait hero videos cropped to a wide hero, set
  `hero_video_position` (e.g. "center 20%") to keep the subject's head in
  frame.
