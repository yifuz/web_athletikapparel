# Project Progress Snapshot - myathletik.com Rebuild

Read this together with AGENTS.md, docs/sitemap.md,
docs/design-brief.md, and homepage-copy.md when starting a new session.
This file tracks WHAT IS DONE and WHAT IS LEFT, since the rule docs only
define HOW. Also check `git log` for the latest commits.

Status precedence: `AGENTS.md` is canonical for project rules; this file is
canonical for repository progress; dated launch/audit records are historical
snapshots unless they explicitly contain a later verification. External states
such as Google Ads review, Search Console counts, and provider dashboards must
be checked live before being described as current.

Last updated: 2026-08-07 — The promotion matrix and execution plan were revised
for one full-time operator using conservative, sustainable baselines: two
Instagram feed posts per week, one reused Short and one LinkedIn post per week,
one YouTube long-form video and one technical article per month, and 10–15
outbound target companies per week only after lead-record, opt-out, and market
compliance gates are ready. Extra content is optional capacity, not a new
recurring baseline. Customer cases now require a written authorization record;
no record means no publication. GEO is a lightweight SEO-adjacent observation
workflow rather than a special-markup promise.

The first verified Meta Ads observation is recorded in
`docs/meta-ads-baseline-2026-08-07.md`. The control Reel has 7,785 views, 6,325
reach, 123 interactions, and 135 combined follows. Its promotion-performance
view directly attributes 68 profile visits and 14 follows to RMB 170.08 spend,
for RMB 12.15 per ad-attributed follow and a 20.6% profile-visit-to-follow rate.
The promotion was active for four days at RMB 68/day when captured. The
remaining difference from the combined 135 follows is not labelled purely
organic because the Reel and promotion views use different scopes. Several
cheaper profile-visit creatives did not produce meaningful follows or
engagement. The control remains unchanged through the initial seven-day review;
Instagram's confirmed objective is real follower growth and broader brand
influence, not direct inquiry generation. A 30-account aggregate sample is used
as an authenticity guardrail: genuine general followers count toward growth,
while buyer and apparel-industry accounts are reported as a secondary strategic
segment. Google Ads remains the separate inquiry-acquisition track and is still
in strategy learning with no performance data reported by the user.

Previous: 2026-08-07 — Documentation reconciled with the 2026-08-06
theme commits. The homepage now has a prominent social bar, the footer content
and responsive layout were refined, and Underwear now joins Merino Wool as the
second product category with a video hero. The Google Ads status in this repo
is still the 2026-08-05 launch snapshot; its current review/delivery state must
be checked in Google Ads before being reported as current.

Previous: 2026-08-05 — Production privacy, consent, attribution, and first
Google Ads launch completed.
WP Consent API 2.0.1 and Cookiebot 4.7.2 are active; CBID
`f81cac53-c468-4afd-9823-7adcc4839c5b` uses Auto blocking. Cookiebot's own
Google Consent Mode is disabled, leaving Site Kit as the sole Google consent
controller. The first production scan contains 7 categorized trackers and no
Unclassified entries. The banner uses explicit consent for all visitors, no
preselected optional categories, English content, a bottom Bar on desktop, a
responsive Dialog on mobile, Outline buttons, no close icon, and an enabled
Privacy Trigger. Exact 390px emulation confirmed no horizontal overflow.
Fresh-profile automation confirmed Reject all keeps optional WP consent and
the four Google advertising/analytics consent signals denied, while Allow all
grants them. The live Privacy Trigger can reopen the consent controls, and an
Allow all -> Withdraw consent test reset Preferences, Statistics, Marketing,
and their WP Consent API states to false. The current scan has Statistics
trackers but zero Preferences or Marketing trackers, so the live banner
currently collapses to Allow all / Reject all; granular Statistics-versus-
Marketing testing is deferred until the Google Ads tag is added and Cookiebot
is rescanned.

AdSense was disconnected from production Site Kit; a cache-bypassed public
HTML recheck confirmed the AdSense script and related domain references were
removed. WordPress Privacy Policy page ID 3 is a structured English United States
first-launch version containing the Cookiebot declaration shortcode. It was approved
by the business, published locally on 2026-08-04, deployed to production, and
verified on the public site. The production theme footer includes a Cookie
Settings control using `Cookiebot.renew()`. The live Privacy Trigger remains
enabled as a second route for visitors to review or change consent. The
production UTM/GCLID attribution code requires WP Consent API
`marketing` consent and deletes stored attribution when consent is denied or
revoked. The user confirmed Athletik Clothing Inc. as data controller and
`info@athletikapparel.com` as privacy contact. The New York controller address
is `228 Park Avenue S #30327, New York, NY 10003, United States`. The approved
retention plan is 24 months after last substantive contact for unsuccessful
inquiries and related email, 14 months for GA4 with activity reset disabled,
and a 30-day target for server/security/diagnostic logs. Cookiebot's browser consent
cookie lasts up to 12 months; its official documentation does not expose a fixed
account-level server consent-log period, so the criterion-based policy wording still
requires final legal review. The production Cookiebot dashboard confirms that User
Consent Logging is active and the consent-log download control is available; no visitor
log was downloaded during verification. Flywheel provides the most recent 7 days of access,
PHP error, and slow logs, while nightly website/database backups are retained for 30 days
and then permanently deleted. The production Cloudflare zone is on the Free plan with no
Workers connected. Verified customer-visible windows are: zone traffic analytics up to 30
days, Security Analytics 7 days, Security Events 24 hours, DNS Analytics 8 days, Turnstile
Analytics 7 days, Email Routing activity queries up to 30 days, and administrative account
audit logs 18 months. These product windows are not treated as a universal deletion period
for all Cloudflare Network Data. Brevo transactional logs are now configured for all senders
to auto-delete after 1 month, and new transactional email previews are not stored. Final
Cookiebot/Cloudflare provider wording still requires review. An existing Brevo test log was
checked and no email-content preview was available under the current retention rules. The single
CRM contact shown in the Brevo account was confirmed by the user as the account owner's own
contact, not a website visitor, customer, or inquiry record. The user also confirmed that no
additional CRM, spreadsheet, WhatsApp account, mailbox, or sales system receives website inquiry
data; the current path is WordPress/Fluent Forms, Brevo, Cloudflare Email Routing, and the 163.com
destination inbox.
The version-controlled source now contains a complete English Privacy Policy review draft covering
the confirmed collection, purposes, legal-basis candidates, consent controls, processors, retention
periods, rights, security, external links, and children's privacy. The United States first-launch
public copy was approved and published to local WordPress Privacy Policy page ID 3 on 2026-08-04,
then deployed to production and verified. The page contains 14 H2 sections, no
content-level H1, one working Cookiebot declaration shortcode, valid Gutenberg blocks, and no public
placeholders. The principal European activation blocker is the current 163.com destination mailbox:
the contracting entity, processing location, and EEA/UK/Swiss transfer mechanism must be confirmed,
or the destination must be changed, before European promotion. Legal
review must also confirm whether active EEA/UK targeting requires Athletik to appoint regional
privacy representatives. The user confirmed that Athletik does not meet any of the three principal
CCPA business thresholds, so the initial screen does not indicate that the company is a covered CCPA
business. Final review must still check controlled-entity and other routes to coverage, other US
state privacy laws, and reassess before any future cross-context behavioral advertising is used.
The initial plan targeted the United States only; the actual first search campaign was launched for
the United States and Canada. EEA, UK,
and Swiss representative and transfer requirements are now tracked as a regional activation gate;
those regions must not be actively targeted until the 163.com transfer and representative questions
are resolved.
The inquiry-form privacy implementation was revised after review: an ordinary manufacturing inquiry
does not require a mandatory Privacy Policy acknowledgment checkbox. Both production form placements now
show a concise Privacy Policy notice only after the assigned policy page is published. Any future
email-marketing consent must remain separate and optional.
The production GA4 property was verified with both event and user data set to 14 months
and activity reset disabled. GA4 is linked to Google Ads account `734-505-8603`,
and the `generate_lead` inquiry conversion was verified in Tag Assistant and
GA4 DebugView after analytics consent. The first search campaign,
`Leads-Search-1`, uses the sportswear manufacturer landing page, Search Network
only, United States and Canada targeting, English, Maximize Clicks, and a
custom daily budget of RMB 25. AI Max, Search Partners, Display expansion,
text adaptation, and final URL expansion are disabled. The campaign was
launched on 2026-08-05 and entered Google review. See
`docs/privacy-consent-plan.md`, `docs/privacy-policy-draft.md`, and
`docs/consent-deployment-runbook.md`. The complete launch baseline and
monitoring rules are recorded in
`docs/google-ads-launch-record-2026-08-05.md`.

Previous: 2026-07-29 — Homepage Lookbook QA fixes completed. Corrected
`sportswear/IMG_5836.webp`, whose EXIF orientation had been lost during the
WebP conversion; the replacement is auto-oriented and remains WebP quality 82
with a 2000px maximum edge. Slowed the continuous marquee from 35s to 110s on
desktop and from 28s to 90s on mobile. Hovering anywhere over the Lookbook now
pauses the marquee; keyboard focus continues to pause it as before. The WebP
asset lives in uploads and must be transferred separately when deploying.
Previous: 2026-07-29 — Production SMTP hardening completed. FluentSMTP
2.2.95 is connected to Brevo via its native API using
`info@athletikapparel.com` / `Athletik Clothing`; the sender is active and the
Cloudflare-hosted domain is verified + authenticated in Brevo. The API key is
encrypted in the WordPress database and is not stored in the public site tree
or theme repo. An initial production Email Test to `alanzhang@athletik.com`
completed the Brevo `request` -> `delivered` flow and was received
successfully. A final production inquiry-form test on 2026-07-29 produced
exactly one notification to `info@athletikapparel.com`; Brevo recorded
`request` -> `delivered` -> `opened`, and Cloudflare Email Routing currently
forwards that public address to `zhangyifuzjg0609@163.com`. Receipt in the
163.com destination inbox was confirmed by the user.
Previous: 2026-07-28 — Full production deployment completed. The finalized
site, theme changes, and current uploads assets were pushed to Flywheel. The
old 27 GB server asset directory was removed; current Flywheel storage usage is
approximately 660 MB. Git `main` is synchronized with `origin/main` at
`77a12c6`.
Previous: 2026-07-27 (PM) — Homepage Hero copy and Bento A visual finalized.
Eyebrow = "Technical knitwear OEM/ODM partner"; H1 = "Performance Knitwear" /
"Manufacturer". Bento A now uses the approved 4:7 campaign image
`sportswear/performance-knitwear-campaign-4x7-2160x3780.png` (2160 × 3780,
full-resolution PNG). The desktop Bento grid was widened from 1.5:1 to
1.75:1 so the A card renders close to 4:7, and the image is uniformly scaled
to 1.15 from the bottom center to reduce internal whitespace without
distorting the model. Mobile keeps the existing 16:10 A-card layout.
The image lives in uploads and is not carried by Git; transfer it separately
with uploads when deploying. Current source size is ~4.97 MB, so web delivery
optimization remains a separate follow-up after the visual lock.
Earlier: 2026-07-27 — Status correction: Flywheel is the current host
and GoDaddy is no longer used; WhatsApp and Contact Form issues are fully
resolved and closed.
Earlier: 2026-07-27 (PM) — Homepage lookbook image optimization.
Converted the 46 images referenced by style-gallery.php to WebP@82 /
max-2000px (137 MB -> 4.5 MB, -97%). Originals kept; WebP files sit
next to them with the same name + .webp extension. style-gallery.php now
emits <picture> with a WebP <source> + JPG/PNG <img> fallback. Marquee
node count cut from 138 to 92 (46 × 3 -> 46 × 2) and the scroll keyframe
shifted from translateX(-33.3333%) to translateX(-50%) to keep the loop
seamless with 2 copies instead of 3. SCOPE: only the lookbook images
were touched; certificate/brand/hero/subcategory images are unchanged per
user direction (see "Image optimization policy" below).
Pre-previous: 2026-07-27 (AM) Contact page bg hero + Ken Burns removal +
hero text color hierarchy (H1 white, intro rgba(255,255,255,0.72)).
Historical: 2026-07-24 uploads asset migration (27G -> 0.27G local);
Flywheel server cleanup completed 2026-07-28. See the archived
docs/flywheel-cleanup-guide.md.
Launch: 2026-07-22. Site live on Flywheel at
https://www.athletikapparel.com (see the current status section for the full
launch record).

---

## Project at a glance

- Code-first WordPress rebuild. LocalWP (Windows) -> Flywheel via Local
  Connect. GoDaddy is no longer used.
- Base theme: GeneratePress. All work in child theme `myathletik-child`.
- Agent rules: `AGENTS.md` is the single canonical project instruction file.
  The unused `CLAUDE.md` was removed 2026-07-28 to prevent rule drift.
- Git initialized in the child theme dir; commit per meaningful change.
- Reference site for STRUCTURE only: hongyuapparel.com. Do not copy its
  startup tone or visuals.

## Key positioning / guardrails (do not violate)

- Athletik Clothing, 15+ yrs technical knit OEM.
- Public story: "our own production facility / vertically integrated." NEVER
  reveal the real number of factories or that orders are subcontracted.
- Vertical capability can be stated as "from yarn to finished garment."
- Audience: mid-sized B2B brand clients. MOQ 1,000 pcs per style.
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
  real @athletikclothinginc accounts. WhatsApp is live at
  `https://wa.me/16044049819`; all footer social links are resolved.
- Per-page SEO <title> + meta description for: Services, About, Sustainability,
  and all 7 product category pages (driven by inc/product-category-data.php).

### Homepage (front-page.php — 11 blocks)
Block order: hero, client-logos, product-categories, capability-proof,
why-myathletik, style-gallery, numbers-proof, process-snapshot,
partnership-trust, certifications, inquiry-cta.
(latest-posts is commented out — no posts yet.)
- Hero: 4-cell bento collage (approved 4:7 campaign model image + sportswear
  garment + sewing + knitting). Stock pexels photo removed. Bento A uses
  correct width/height, eager loading, and `fetchpriority="high"`.
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

### Video heroes (Merino Wool + Underwear)
- Merino Wool and Underwear render muted autoplay looping `<video>` elements
  behind the hero text, with a dual-gradient overlay (left-dark for text
  legibility + bottom-dark). Driven by the `hero_video` field in category data.
- `hero_video_position` field supports per-video object-position to keep
  portrait subjects' heads in frame when cropped to a wide hero (Merino uses
  "center 20%").
- Backward compatible: categories without `hero_video` keep the plain
  surface-color hero. The other 5 product categories remain optional future
  video additions.

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
- The misspelled `/sustainabilty/` -> `/sustainability/` 301 was removed from
  functions.php. No historical redirect was implemented because there were no
  indexed inbound links to protect.

## Current status / remaining enhancements

-4. **Production SMTP / Brevo — ✅ CLOSED 2026-07-29:** FluentSMTP 2.2.95
   is configured locally and on the Flywheel production site with the native
   Brevo API connection. From address = `info@athletikapparel.com`; From name =
   `Athletik Clothing`; forced sender name is enabled. Brevo reports
   `athletikapparel.com` as both verified and authenticated. The API key is
   encrypted in the WordPress database, and a public-tree scan found no
   plaintext key. Production Email Test delivery was confirmed in both Brevo
   events (`request` -> `delivered`) and the recipient inbox. A final
   production form submission then produced exactly one Brevo event chain to
   `info@athletikapparel.com` (`request` -> `delivered` -> `opened`);
   Cloudflare currently forwards this address to
   `zhangyifuzjg0609@163.com`, where inbox receipt was confirmed. The Fluent
   Forms id=3 notification was also normalized locally and in production on
   2026-07-29: the duplicate default `{wp.admin_email}` notification was
   removed; one enabled `New Notification` remains with Send To / From Email =
   `info@athletikapparel.com`, From Name = `Athletik Clothing`, and Reply-To =
   `{inputs.email}`. This also removed the stale `info@myathletik.com`
   recipient that had been restored by an earlier database sync.

-3. **Public Turnstile secret file — ✅ CLOSED 2026-07-29:** A
   `Turnstile-KEY/secret-key.txt` file was found under the public
   `wp-content/uploads/myathletik-theme/assets/` tree on 2026-07-28.
   - Deleted the key files from the local uploads asset tree 2026-07-29.
   - **Verified the key file was never pushed to Flywheel** (server uploads
     was clean — no public exposure on production).
   - **Rotated the Turnstile secret in Cloudflare** (old secret treated as
     compromised); new secret lives only in the WP plugin config / DB / env,
     never under uploads/.
   - **Verified the old public URL now returns 404.**
   Lesson: never place credentials under `wp-content/uploads/` — it is
   web-readable and outside the repo's gitignore safety net.

-2. **FluentForm plugin recovery — ✅ CLOSED 2026-07-27:** Before a push,
   the `plugins/fluentform/` folder became an EMPTY skeleton (4 subdirs,
   0 files, no fluentform.php). WP dropped it from active_plugins (so the
   plugin "disappeared" from admin) and re-installing failed with
   "Destination folder already exists."
   **Root cause:** the folder existed but had no files — WP couldn't load
   the plugin (no main file) AND the empty folder blocked re-install.
   **DB state remained SAFE:** 7 fluentform_* tables and all 3 forms were
   preserved (id=1 Contact Form Demo, id=2 Subscription Form,
   id=3 "inquiry form" — the one page-contact.php uses via
   `[fluentform id="3"]`).
   **Fixed 2026-07-24:** deleted the empty `fluentform/` folder
   (confirmed 0 files first) — "Destination folder already exists" error
   was resolved.
   **Confirmed closed 2026-07-27:** Fluent Forms is restored, form id=3
   renders on `/contact/`, submissions are stored in Entries, and notification
   email delivery works. No form rebuild or further corrective action is
   required.
   Diagnostic script ff-diag.php (used to verify DB state) was deleted
   after use because it exposed DB/plugin information.

-1. **Flywheel server 27G cleanup — ✅ CLOSED 2026-07-28:** LocalWP Local Connect push
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
   **Production side completed 2026-07-28:** the old 27 GB server asset
   directory was removed, the finalized site and current uploads assets were
   pushed again through Local Connect, and Flywheel storage now reports
   approximately 660 MB. The 2026-07-24 270 MB ZIP is an obsolete historical
   snapshot and must not be used for future deployments.

0. **Domains (2026-07-22):** purchased at Cloudflare Registrar —
   **athletikapparel.com = PRIMARY** (site, email, all branding);
   athletik-clothing.com = defensive, 301 to primary. myathletik.com was
   experimental only and is not part of the current website stack — decision
   2026-07-22: NO 301 needed (site never actually used, zero traffic).
   **Current stack:** Flywheel Tiny hosting + Local Connect deployment +
   Cloudflare DNS/email routing. GoDaddy is no longer used.
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
   - Email: the legacy info@myathletik.com mailbox is expired and unused.
     Current setup:
     Cloudflare Email Routing (free) forwards info@athletikapparel.com ->
     `zhangyifuzjg0609@163.com` (current destination as of 2026-07-29);
     MX/SPF auto-created; forwarding test PASSED. The previous forwarding
     destination was `alanzhang@athletik.com`.
   - Public contact email in footer (functions.php) + contact page
     (page-contact.php) changed info@athletik.com.cn ->
     info@athletikapparel.com (commit 31f4b99; confirmed live).
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
   - SMTP deliverability enhancement: ✅ CLOSED 2026-07-29 via FluentSMTP +
     Brevo API; production Email Test passed. Cloudflare Turnstile anti-spam
     remains optional.
   - CLOSED user-side 2026-07-22: legacy hosting was discontinued;
     email-display commit 31f4b99 confirmed live (decoded from Cloudflare's
     email-obfuscation data-cfemail on the live homepage footer).

1. **WhatsApp footer link — ✅ FULLY RESOLVED:** filled with
   `https://wa.me/16044049819`, verified in `functions.php`. Closes QA P0-2.
2. **Contact form (FluentForm id=3) — ✅ FULLY RESOLVED:** audited in the
   WordPress admin and confirmed operational. Current fields: Name, Email*,
   Company, Country, Website, Product Category of Interest* (7 cats + Other),
   Estimated Order Quantity* (Under 1,000 / 1,000–2,000 / 2,000–5,000 /
   5,000+; tiers updated for the 1,000 pcs-per-style MOQ),
   Business Type* (Established brand / New brand / Wholesaler-Importer /
   Other), and Message*. Resolution details:
   (a) tech pack prompt added 2026-07-21 via the Message field
   placeholder ("...Include a link to your tech pack if you have one.") —
   File Upload itself is a Fluent Forms PRO feature, placeholder link prompt
   chosen as the free-tier solution; (b) order quantity and business type
   provide the required lead filtering; (c) email notification recipient is
   `info@athletikapparel.com`; live delivery test PASSED 2026-07-22
   (3 submissions -> 3 emails via Email Routing forward + entries stored).
   On 2026-07-29, a stale `info@myathletik.com` recipient and a duplicate
   `{wp.admin_email}` notification were found after database synchronization.
   Both local and production settings were corrected to one enabled
   notification with Send To / From Email = `info@athletikapparel.com`, From
   Name = `Athletik Clothing`, and Reply-To = `{inputs.email}`. A final
   production submission on 2026-07-29 generated exactly one Brevo
   `request` -> `delivered` -> `opened` chain to
   `info@athletikapparel.com`; Cloudflare's current destination is
   `zhangyifuzjg0609@163.com`, and receipt in that inbox was confirmed; (d)
   local submission test passed —
   frontend success message
   shown, entry stored correctly in Fluent Forms Entries (all dropdown
   values captured). No Contact Form issue remains open. SMTP hardening was
   completed 2026-07-29 via FluentSMTP + Brevo. Customer auto-reply or
   additional anti-spam services remain optional future enhancements, not
   unresolved form defects.
3. **Remove the /sustainabilty/ -> /sustainability/ 301 redirect** ✅ DONE
   2026-07-21 — function removed from functions.php.
4. **Video hero rollout beyond Merino and Underwear:** the architecture is
   ready (`hero_video` + `hero_video_position` fields). Merino Wool and
   Underwear are live; video assets remain optional enhancements for the other
   5 category pages and the homepage hero.
5. **Remote git repository:** ✅ DONE 2026-07-21 — pushed to
   https://github.com/yifuz/web_myathletik.git. Latest theme changes were
   pushed through commit `77a12c6`; current uploads assets were separately
   synchronized to Flywheel on 2026-07-28. Future uploads changes must still
   be transferred separately because images are not in Git.
6. **Language switcher (header):** ✅ HIDDEN 2026-07-21 — the 6-button
   switcher (functions.php myathletik_header_actions) now returns early with
   no output. **Decision 2026-07-21: defer multilingual.** Go live EN-only,
   watch Search Console country data, then decide whether to translate
   DE/FR/ES. Machine translation rejected. Real translation would require
   Polylang + restructuring inc/product-category-data.php. To re-enable the
   switcher: remove the early return in myathletik_header_actions().

## Notes / status of the 07-03 QA audit

Full audit in docs/qa-audit-260703.md. Status updated 2026-07-27:

| ID  | Item | Status |
|-----|------|--------|
| P0-1 | process-snapshot dead links | ✅ fixed |
| P0-2 | footer social `#` links | ✅ fixed — IG/YT and WhatsApp all use live URLs |
| P0-3 | footer `/sitemap/` dead | ✅ fixed → /wp-sitemap.xml |
| P0-4 | footer `/blog/` | ✅ removed; blog block disabled |
| P1-1 | hero stock photo | ✅ fixed — real bento collage |
| P1-2 | knitted-fabrics/accessories stock | ✅ effectively resolved — the gallery section that showed those unsplash images is now hidden behind the subcategory showcase on all 7 pages |
| P1-3 | redirect-note visible to visitors | ✅ fixed |
| P1-4 | style-gallery/partnership placeholders | ✅ fixed |
| P1-5 | latest-posts placeholder | ✅ fixed |
| P1-6 | hardcoded hex -> tokens | ✅ fixed |
| P1-7 | services stage H2 -> H3 | ✅ fixed (and P1-7b tag-mismatch bug also fixed) |
| P1-8 | contact form field audit | ✅ fully resolved — fields, entries, and notification delivery verified |
| P1-9 | "3 continents" wording / Russia | ✅ fixed |
| P1-10 | hero image alt | ✅ fixed |

## Image storage rule (IMPORTANT — read before placing any image)

- ALL theme images live in `wp-content/uploads/myathletik-theme/assets/images/`
  (NOT in `themes/myathletik-child/assets/images/`). The theme assets dir is
  kept empty except for a `.gitkeep`, and is gitignored.
- **Uploads stays LEAN.** The 2026-07-24 cleanup baseline was 218 files /
  0.27G. After the approved WebP and Hero additions, the 2026-07-28 local
  snapshot is approximately 0.31G. The full raw asset library (4446 files,
  26.38G) was
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
| **Homepage hero bento** (`sportswear/performance-knitwear-campaign-4x7-2160x3780.png`, responsive `performance-knitwear-hero-*-lossless.webp`, and the remaining `hero_bento_*` files) | **Responsive delivery optimization completed 2026-07-29.** Keep the approved PNG as the source asset; the live template serves 720w / 960w / 1280w lossless WebP variants through `srcset`. The other three cells remain pre-sized and lightweight. | The approved 4:7 source and CSS focal treatment remain visually locked, while browsers receive an appropriately sized WebP. Uploads assets must still be synchronized separately from Git. |

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
