# Project Progress Snapshot - myathletik.com Rebuild

Read this together with AGENTS.md / CLAUDE.md, docs/sitemap.md,
docs/design-brief.md, and docs/homepage-copy.md when starting a new session.
This file tracks WHAT IS DONE and WHAT IS LEFT, since the rule docs only
define HOW. Also check `git log` for the latest commits.

Last updated: 2026-07-27 (PM) — Homepage lookbook image optimization.
Converted the 46 images referenced by style-gallery.php to WebP@82 /
max-2000px (137 MB -> 4.5 MB, -97%). Originals kept; WebP files sit
next to them with the same name + .webp extension. style-gallery.php now
emits <picture> with a WebP <source> + JPG/PNG <img> fallback. Marquee
node count cut from 138 to 92 (46 × 3 -> 46 × 2) and the scroll keyframe
shifted from translateX(-33.3333%) to translateX(-50%) to keep the loop
seamless with 2 copies instead of 3. SCOPE: only the lookbook images
were touched; certificate/brand/hero/subcategory images are unchanged per
user direction (see "Image optimization policy" below).
Previous: 2026-07-27 (AM) Contact page bg hero + Ken Burns removal +
hero text color hierarchy (H1 white, intro rgba(255,255,255,0.72)).
Pre-previous: 2026-07-24 uploads asset migration (27G -> 0.27G local;
Flywheel server cleanup pending — see docs/flywheel-cleanup-guide.md).
Pre-pre-previous: 2026-07-22 LAUNCH DAY. Site live on Flywheel at
https://www.athletikapparel.com (see TO DO #0 for the full launch record).

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

### Background-image heroes (About / Services / Sustainability / Contact)
- All four non-product landing pages use the same full-bleed `<img>` hero
  pattern: a cover-fit photo, a left-dark/right-transparent gradient overlay
  for text legibility, white H1, and a soft grey-white intro paragraph.
- Photos: About = production/工厂全景.png; Services = services/hero.png;
  Sustainability = sustainable/hero.png; Contact = contact/hero.png
  (sample-room photo, added 2026-07-27).
- **Ken Burns animation REMOVED 2026-07-27.** The CSS `@keyframes` zoom had
  been written (scale 1->1.12 over 24s) but never rendered reliably across
  browsers in user testing — even at exaggerated debug params (3s / scale
  1.5) nothing visibly moved. Rather than chase the cause, the animation was
  dropped entirely; heroes now use a static `transform: scale(1.04)` so the
  photo still fills the frame with a touch of depth. The `prefers-reduced-
  motion` fallbacks were removed at the same time (no animation -> no
  fallback needed). Do NOT reintroduce CSS Ken Burns here; if motion is
  wanted later, use a JS (IntersectionObserver + rAF) approach instead.
- **Hero text colour hierarchy (2026-07-27):** H1 = pure white
  (`--ma-color-white`); intro paragraph = soft grey-white
  `rgba(255,255,255,0.65)` so the title reads as the primary element.
  Tuning sequence: started at `rgba(255,255,255,0.82)` (too close to H1),
  tried 0.72, settled on **0.65** per user preference for maximum title
  emphasis. An earlier attempt used warm cream `#e8ddc9`, which read too
  gold against the photo and was rejected. All 4 bg heroes (About/Services/
  Sustainability/Contact) use 0.65.

### Homepage lookbook — WebP + node optimization (2026-07-27 PM)
- The 46 images referenced by `template-parts/home/style-gallery.php` were
  converted to **WebP @ quality 82, max edge 2000px**. Total payload
  dropped from **137 MB to 4.5 MB (-97%)**. Originals are kept untouched;
  the WebP files live next to them with the same basename + `.webp`
  extension (e.g. `sportswear/1U128570.jpg` + `sportswear/1U128570.webp`).
- `style-gallery.php` now emits `<picture>` with a `<source type="image/webp">`
  followed by the original JPG/PNG `<img>` as fallback. Browsers that
  support WebP (all modern ones) fetch the WebP; old browsers fall back.
  `loading="lazy"` and `decoding="async"` are set on the `<img>`.
- **Marquee node count cut 138 -> 92.** The PHP loop previously rendered
  the 46-image set 3 times (`for $set < 3`) with a keyframe of
  `translateX(-33.3333%)`. Reduced to 2 copies + `translateX(-50%)` — the
  loop stays seamless (copy 2 picks up exactly where copy 1 ends) while
  shedding a third of the DOM nodes and decode work.
- Conversion was done with `sharp` 0.35.3 (Node), installed to a temp dir
  outside the repo. No build step is wired into the theme; if more images
  need converting later, re-run a one-off script (do NOT commit sharp into
  the repo — it is a dev-only tool).
- **Quality 82 chosen after a 5-sample A/B/B compare** (sportswear-max,
  merino, underwear, silkwear, contact-hero). User reviewed the compare
  page (`/webp-compare/compare.html`, served locally) and judged q82
  visually acceptable; q78 was rejected as slightly too lossy.
- Verified in browser: 92 `<picture>` + 92 `<source type="image/webp">`
  nodes render on the homepage; first card's `<source srcset>` points to
  the `.webp` and `<img src>` to the `.jpg` fallback as expected.

### Other pages
- Services: page-services.php, single overview, 4-stage process strip.
  H-tag bug (P1-7b: broken `<h3>` open + `<h2>...</h3>` mismatch) FIXED.
- About Us: page-about-us.php.
- Contact: page-contact.php — full-bleed background hero (sample-room photo,
  contact/hero.png, 2026-07-27) + FluentForm shortcode id=3.
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

-2. **FluentForm plugin folder was emptied (2026-07-24):** Before a push,
   the `plugins/fluentform/` folder became an EMPTY skeleton (4 subdirs,
   0 files, no fluentform.php). WP dropped it from active_plugins (so the
   plugin "disappeared" from admin) and re-installing failed with
   "Destination folder already exists."
   **Root cause:** the folder existed but had no files — WP couldn't load
   the plugin (no main file) AND the empty folder blocked re-install.
   **DB state — all SAFE:** 7 fluentform_* tables intact, all 3 forms
   preserved (id=1 Contact Form Demo, id=2 Subscription Form,
   id=3 "inquiry form" — the one page-contact.php uses via
   `[fluentform id="3"]`). Form id=3 will auto-restore once the plugin
   files are reinstalled + reactivated; no rebuild needed.
   **Fixed 2026-07-24:** deleted the empty `fluentform/` folder
   (confirmed 0 files first) — "Destination folder already exists" error
   now resolved. Next: reinstall FluentForm via WP admin
   (Plugins → Add New → search "Fluent Forms" → Install → Activate).
   Diagnostic script ff-diag.php (used to verify DB state) was deleted
   after use (it exposed DB/plugin info). Verify after activation:
   contact page at /contact/ renders the inquiry form, and a test
   submission lands in the entries + sends the notification email.

-1. **Flywheel server 27G cleanup (2026-07-24):** LocalWP Local Connect push
   pushed the entire uploads (27G) to Flywheel, blowing past Tiny plan storage.
   **Local side DONE 2026-07-24:**
   - Migrated 4446 unused asset files (26.38G) out of uploads to
     `D:\C-网站素材\` (local archive, structure mirrored). uploads now
     218 files / 0.27G (only code-referenced assets + brand-partner logos).
   - Fixed 3 dead image refs in inc/product-category-data.php:
     `merino-wool-base-layer-10` -> `-19`, `-16` -> `-20` (avoided
     dup with Outdoor page's -17/-18), `underwear/X-IMG_4877-scaled.jpg`
     normalized to `underwear/IMG_4877-scaled.jpg` (copied from 6/IMG_4877.JPG).
   - Verified: static audit of 195 unique image refs = 0 missing in uploads;
     homepage first fetch = 200 with 162 images rendered; output buffer
     rewriting theme->uploads URLs correctly. (502 errors during testing were
     LocalWP being hammered by the audit's concurrency, NOT a migration issue.)
   - Decision: Local Connect CANNOT exclude uploads subdirs (no config, no
     rule file — only per-push manual deselect, impractical at 4k+ files).
     Root-cause fix = keep uploads lean, which is now done.
   - Cleanup scripts: tools/plan_asset_move.py, exec_asset_move.py,
     audit_image_refs.py, audit_all_refs.py, verify_pages.py. Keep/move lists:
     tools/move_plan_KEEP.txt (218), tools/move_plan_MOVE.txt (4446).
   **PENDING (user does in Flywheel panel):** see docs/flywheel-cleanup-guide.md
   — (1) delete server `uploads/myathletik-theme/` (the 27G), (2) re-upload
   the 270MB zip at `D:\C-网站素材\myathletik-theme-upload-to-flywheel.zip`
   (218 files), (3) verify pages load with no 404s.

0. **Domains (2026-07-22):** purchased at Cloudflare Registrar —
   **athletikapparel.com = PRIMARY** (site, email, all branding);
   athletik-clothing.com = defensive, 301 to primary. myathletik.com stays
   at GoDaddy, was experimental only — decision 2026-07-22: NO 301 needed
   (site never actually used, zero traffic); keep the domain parked or let
   it lapse, no redirect work. Hosting: Flywheel Tiny (~$150/yr), deploy via
   Local Connect push (Files + Database). Launch directly on
   athletikapparel.com.
   **2026-07-22: pushed to Flywheel via Local Connect, temp-domain
   acceptance PASSED.**
   **2026-07-22 PM — LAUNCHED on athletikapparel.com:**
   - Domain attached via Flywheel's Cloudflare integration (www = primary;
     A/CNAME records auto-created, Proxied). Privacy Mode disabled.
   - SSL: Let's Encrypt issued on Flywheel (valid to 2026-10-20, auto-renews).
     Gotcha: cert issuance FAILS while Cloudflare proxy is on — fix was to
     temporarily set both records to DNS-only, run CHECK DNS AGAIN +
     COMPLETE SSL SETUP, then re-enable proxy. Cloudflare SSL/TLS mode now
     Full (strict) + Always Use HTTPS on.
   - All four entries verified live: http/https x apex/www all funnel to
     https://www.athletikapparel.com (200).
   - Email: GoDaddy mailbox (info@myathletik.com) confirmed EXPIRED — no
     email product left on GoDaddy, nothing to preserve there. New setup:
     Cloudflare Email Routing (free) forwards info@athletikapparel.com ->
     alanzhang@athletik.com; MX/SPF auto-created; forwarding test PASSED.
   - Public contact email in footer (functions.php) + contact page
     (page-contact.php) changed info@athletik.com.cn ->
     info@athletikapparel.com (commit 31f4b99 — needs a Local push to go
     live).
   - FluentForm id=3 admin notification recipient: was {wp.admin_email},
     now hardcoded to info@athletikapparel.com (edited live via wp-admin).
     Gotcha: FluentForms' Vue admin silently ignores programmatic fills
     unless the native setter + input/change events are used; verify saves
     via the network response, the list view shows stale values.
   - Live end-to-end test inquiry PASSED: 3 submissions -> 3 notification
     emails received at alanzhang@athletik.com via the info@ forward +
     entries stored. (Frontend gotcha: page <head> has a
     <meta name="description"> — any script must target
     textarea[name="description"], never [name="description"].)
   - athletik-clothing.com: Cloudflare Redirect Rule deployed 2026-07-22 —
     "Redirect to athletikapparel.com", All incoming requests -> static
     https://www.athletikapparel.com, 301. Verified: http/https/www all
     301 correctly.
   - Google Search Console: Domain property athletikapparel.com verified
     2026-07-22 (auto-verified, no TXT needed); sitemap
     https://www.athletikapparel.com/sitemap_index.xml submitted (initial
     "couldn't fetch" status is normal for fresh submissions; robots.txt
     301s to WP's virtual robots file which allows all + declares the
     sitemap, Googlebot UA gets 200 — verified fine).
   - STILL OPEN (post-launch optional): (a) WP Mail SMTP / FluentSMTP on
     Flywheel as a deliverability upgrade (wp_mail works today, but
     unauthenticated); (b) Cloudflare Turnstile anti-spam (optional).
   - CLOSED user-side 2026-07-22: GoDaddy hosting auto-renew turned OFF
     (myathletik.com domain renewal kept, no 301 planned); email-display
     commit 31f4b99 confirmed live (decoded from Cloudflare's
     email-obfuscation data-cfemail on the live homepage footer).

1. **WhatsApp footer link still `#`:** ✅ FIXED 2026-07-21 — filled with
   `https://wa.me/16044049819`. (Closes QA P0-2.)
2. **Contact form (FluentForm id=3) field audit:** ✅ AUDITED 2026-07-21
   via browser inspection of the form editor. Current fields: Name, Email*,
   Company, Country, Website, Product Category of Interest* (7 cats + Other),
   Estimated Order Quantity* (Under 500 / 500–2,000 / 2,000–5,000 / 5,000+),
   Business Type* (Established brand / New brand / Wholesaler-Importer /
   Other), Message*, plus a full Address block. Gaps found:
   (a) ✅ tech pack prompt added 2026-07-21 via the Message field
   placeholder ("...Include a link to your tech pack if you have one.") —
   File Upload itself is a Fluent Forms PRO feature, placeholder link prompt
   chosen as the free-tier solution; (b) no budget-tier dropdown (sitemap
   §7 asks for one, quantity field partially covers the filtering role);
   (c) anti-spam NOT configured — reCAPTCHA keys empty, no honeypot
   field rendering on the frontend; enable honeypot or Cloudflare Turnstile;
   (d) email notifications: admin notification recipient hardcoded to
   info@athletikapparel.com 2026-07-22 (was {wp.admin_email}); live
   delivery test PASSED same day (3 submissions -> 3 emails via Email
   Routing forward + entries stored); no customer auto-reply (optional);
   (e) ✅ local submission test passed 2026-07-21 — frontend success message
   shown, entry stored correctly in Fluent Forms Entries (all dropdown
   values captured); email delivery test still pending on staging/
   production (GoDaddy wp_mail is unreliable, install FluentSMTP).
   (Note: an unsaved stray Address field seen in one editor session was
   never part of the saved form — re-verified absent 2026-07-21.)
3. **Remove the /sustainabilty/ -> /sustainability/ 301 redirect** ✅ DONE
   2026-07-21 — function removed from functions.php.
4. **Video hero rollout beyond Merino:** the architecture is ready
   (hero_video + hero_video_position fields). Pending video assets for the
   other 6 category pages + the homepage hero.
5. **Remote git repository:** ✅ DONE 2026-07-21 — pushed to
   https://github.com/yifuz/web_myathletik.git. Remember: uploads/ images
   are NOT in git and must be transferred separately on deploy.
6. **Language switcher (header):** ✅ HIDDEN 2026-07-21 — the 6-button
   switcher (functions.php myathletik_header_actions) now returns early with
   no output. **Decision 2026-07-21: defer multilingual.** Go live EN-only,
   watch Search Console country data, then decide whether to translate
   DE/FR/ES. Machine translation rejected. Real translation would require
   Polylang + restructuring inc/product-category-data.php. To re-enable the
   switcher: remove the early return in myathletik_header_actions().

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
- **(2026-07-24) uploads stays LEAN.** Only code-referenced images (218 files,
  0.27G) live in uploads. The full raw asset library (4446 files, 26.38G) was
  moved OUT of uploads to `D:\C-网站素材\` because LocalWP Local Connect
  pushes the entire uploads folder and has NO exclusion mechanism. Putting
  unused assets back in uploads = server storage blowup again. Raw/unused
  assets go in `D:\C-网站素材\<category>\`, NOT uploads.
- An output buffer in `functions.php` (`myathletik_rewrite_image_urls`, hooked
  via `ob_start` on `template_redirect`) rewrites theme-relative image URLs to
  the uploads path at render time. So PHP keeps writing
  `get_stylesheet_directory_uri() . '/assets/images/...'` and the browser is
  silently served from uploads.
- Videos follow the same pattern — place them anywhere under
  `uploads/myathletik-theme/assets/images/` and reference theme-relative.
- Therefore: to add/change an image or video that the SITE USES, drop ONLY
  that file into the matching folder under
  `uploads/myathletik-theme/assets/images/`. Do NOT copy it into the theme
  dir (404) and do NOT bulk-dump unused assets into uploads (server bloat).

## Image optimization policy (decision: 2026-07-27)

Different image groups get different treatment. Respect this when adding
or regenerating images — do NOT apply a blanket rule across all folders.

| Group | Treatment | Why |
|-------|-----------|-----|
| **Homepage lookbook** (`sportswear/` `underwear/` `silkwear/` `merino wool product/` `outdoor clothing/` — only the files referenced by `style-gallery.php`) | **WebP @ q82, max edge 2000px**, served via `<picture>` + JPG fallback. Done 2026-07-27. | 46 images scroll in a marquee — payload matters; q82 judged visually acceptable in A/B compare. |
| **Certificates** (`audit&certificates/`) | **Unchanged.** No WebP, no resize. | Small text on cert scans would suffer; tiny files anyway. |
| **Brand partner logos** (`brand-partner/`) | **Unchanged.** | Logos are sharp flat graphics; converting would blur edges. |
| **Hero banners** (`contact/` `services/` `sustainable/` + `production/工厂全景.png`) | **Unchanged.** Keep full resolution. | Full-bleed background needs high clarity; user explicitly wanted these preserved. |
| **Product-page subcategory images** (~27 files across category folders) | **Unchanged.** | These are decision-critical close-ups; user wanted them kept as-is. |
| **Homepage hero bento** (`sportswear/hero_bento_*`, `production/hero_bento_*`) | **Already optimal.** Pre-sized to exact display dimensions in a prior pass (largest is 150 KB). | No action needed. |

When adding a NEW image: identify which group it belongs to from the table
above and apply that group's rule. If it doesn't fit any group, ASK before
converting — the user makes per-group calls, not the agent.

When converting: keep the original (do NOT delete), emit the WebP next to
it with the same basename, and use `<picture>` with a JPG/PNG fallback.
Never wire a build step into the theme — conversion is a one-off `sharp`
script run outside the repo.

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
