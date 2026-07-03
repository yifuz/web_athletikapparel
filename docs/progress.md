# Project Progress Snapshot - myathletik.com Rebuild

Read this together with AGENTS.md / CLAUDE.md, docs/sitemap.md,
docs/design-brief.md, and docs/homepage-copy.md when starting a new session.
This file tracks WHAT IS DONE and WHAT IS LEFT, since the rule docs only define
HOW. Also check `git log` for the latest commits.

Last updated: covers through homepage core completion, product category page
scaffold, first-pass category copy, and category image galleries.

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
- URLs: top-level keyword style (/sportswear-manufacturer/ etc.). Old indexed
  URLs must 301. See docs/sitemap.md.
- User writes all long-form body copy unless explicitly requested otherwise.
- No stock photos. Use [IMAGE: ...] placeholders for missing real photos.
- Confirmed numbers: 15+ yrs / 4,500+ sq m own facility / 100,000+ pcs/month /
  3 continents.

---

## DONE

- Full child theme scaffold (style.css with :root warm tokens, functions.php,
  front-page.php, template-parts/home/*).
- Homepage: all 10 blocks built and assembled in front-page.php:
  hero, client-logos, capability-proof, product-categories, why-myathletik,
  numbers-proof, process-snapshot, partnership-trust, certifications,
  latest-posts, inquiry-cta.
- Homepage copy filled (front half) per docs/homepage-copy.md.
- Heading font set to Manrope (Google Fonts, enqueued in functions.php);
  --ma-font-head token updated; hero and site title use lighter 600 weight.
- Navigation: WP menu system + custom styling (logo left, menu right, Products
  dropdown, Contact as accent CTA button). Desktop single-row, mobile hamburger.
- Client logo marquee: full-bleed full-width seamless auto-scroll, grayscale
  with color-on-hover, logos enlarged, white background. Clients all authorized.
- Certifications block: DONE (copy completed).
- Partnership / clients block: DONE (copy completed; clients authorized so real
  brands can be shown).
- Numbers-proof block: DONE. Stat cards now split the figure into separate
  number and unit lines so all four cards wrap consistently.
- Product category page skeletons: DONE for all 7 top-level SEO slugs using a
  shared data file, shared template part, and slug-specific page templates.
- Product category page first-pass copy and galleries: DONE using
  https://athletik.com.cn/products.html as reference content. Each category now
  has short positioning copy, overview copy, capability copy, and at least 6
  gallery images that differ from its title/hero image.

## TO DO (next priorities)

1. **Hero background image** - currently a stock pexels photo. User is NOT
   replacing it for now. Leave as-is until a real factory photo is provided.
2. **Product category SEO details** - the 7 category page first-pass copy and
   image galleries exist, but meta titles/descriptions and final image review
   still need to be completed.
3. **Services sub-pages — CANCELLED (2026-07).** Only `/services/` overview
   exists (page-services.php, 4-stage process strip). The originally planned
   sub-pages (/sampling-prototyping/ /bulk-production/ /quality-control/
   /export-shipping/) are folded into the single overview. Home page
   process-snapshot links all point to /services/.
   - Capabilities pages (/production/ /factory/ /equipments/) — also CANCELLED
     this phase. Capability proof lives on homepage + category pages.
   - About / Contact / Sustainability pages — DONE (page-about-us.php,
     page-contact.php, page-sustainability.php).
4. **301 redirects** - apply per docs/sitemap.md section 8 before/at launch.
5. **Inquiry form backend** - inquiry-cta form is front-end only; backend/email
   handling is a later task.

## Notes / gotchas learned

- LocalWP: if site won't start / MySQL error, kill stray `mysqld.exe` in Task
  Manager, then restart site.
- VPN (Clash): bypass `.local` so system proxy can stay on (Codex/agents need
  proxy for API; LocalWP needs `.local` direct). Or toggle system proxy off to
  view local site.
- Git: if VSCode git UI hangs (pipe ENOENT), use the terminal: `git status`,
  `git add .`, `git commit`. If locked, delete `.git\index.lock`.
- Codex desktop has no plan-mode/diff preview historically - user added diff
  preview + php self-check. Still: review diffs, commit per block.
- Desktop layout has been a recurring weak spot - always verify desktop
  (1440px, 100% zoom) explicitly, not just mobile.
- Stats / proof cards: do not combine number and unit in one free-wrapping
  string. Use separate number and unit elements so cards stay aligned across
  desktop and mobile.
