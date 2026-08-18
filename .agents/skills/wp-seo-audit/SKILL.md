---
name: wp-seo-audit
description: >
  Comprehensive WordPress SEO audit for the myathletik-child theme. Checks
  <title>/meta description presence & length, single-H1 rule, H2/H3 hierarchy,
  image alt text, URL slug ↔ keyword alignment, internal links, canonical,
  robots, schema presence, and Core Web Vitals signals (LCP/CLS/font loading).
  Use whenever the user asks to 审计 SEO / 检查 SEO / 查 SEO 问题 / 优化 SEO,
  or says "audit this page's SEO", "check SEO on", "is this page SEO-ready",
  "检查标题/meta/H1/alt", or after creating/editing any page template,
  category landing page, or template part. Also trigger on 批量检查 / 全站 SEO.
---

# wp-seo-audit — WordPress SEO Audit (myathletik-child)

Audit-type skill. **Read-only**: produce a report, do not auto-edit unless the
user explicitly asks you to fix something.

## Source-of-truth files (read these first)

- `AGENTS.md` §3 — URL & SEO rules (the strictest section).
- `seo-tags.md` — the canonical SEO Title / Meta Description for every page.
  Compare the rendered page against this file. If they differ, that's a finding.
- `docs/sitemap.md` — every page's URL, single H1, target keyword, 301 source.
- `docs/seo/seo-process.md` §5 — diagnostic thresholds and sample-size gates
  (e.g. no CTR-driven Title/Meta rewrites below ~100 matched impressions).
- `docs/seo/gsc-data-log.md` — latest GSC snapshots; check whether real
  query/CTR data exists before recommending snippet changes.

## What to audit (in this order)

### 1. Title & meta description
For the target page, confirm:
- `<title>` matches `seo-tags.md` for that route (± brand suffix).
- SEO title ≤ ~60 chars; meta description ≤ ~155 chars. These are INTERNAL
  SOFT TARGETS (heuristics), not Google rules. Report overruns as 🟡 at most,
  and never recommend a rewrite on length alone when GSC shows no CTR problem
  (see `seo-process.md` §5 and finding V2-002's precedent).
- Meta description contains the page's primary keyword naturally.
- `<meta name="description">` is present and unique (not the site-wide default).
- `<link rel="canonical">` points to the page's own URL.

Render the page (or grep the template + `wp_head` output) — don't trust the
template alone, because Rank Math may inject tags dynamically.

### 2. Heading hierarchy
- **Exactly one `<h1>`** per page. Flag zero or multiple.
- H1 matches the H1 declared in `docs/sitemap.md` for that route.
- H2/H3 nesting is logical (no H3 before an H2, no skipped levels).
- Headings are semantic `<h1>–<h6>`, not `<div class="h2">` styled as headings.

### 3. Image alt text
- Every `<img>` has a non-empty `alt`. Flag empty `alt=""` only if the image is
  decorative (then it should be explicitly `alt=""`, not missing).
- alt text uses real keywords (the category/term), NOT filenames
  (`alt="IMG_2048"` is a finding).
- For the home page's image wall (AGENTS.md §4), specifically check the 30+
  product images — these are known to be untitled/unlinked.

### 4. URL & slug
- Slug follows the manufacturer pattern in `seo-tags.md` /
  `docs/sitemap.md`: `/sportswear-manufacturer/`, etc.
- If the page moved (old `/products/<x>/` → new top-level), confirm a 301
  exists. If unsure, output the 301 mapping row and flag it for the user
  (this skill doesn't manage redirects — that's `wp-redirect-guard`).

### 5. Internal links
- Page links out to at least one sibling category page (the `/products/` hub or
  another `-manufacturer/` page).
- Page is linked *to* from the home page and the products hub.
- Nav menu includes the page (check `functions.php`
  `myathletik_ensure_primary_menu` for the seeded menu items).
- No orphan pages.

### 6. Schema / structured data
- Confirm at least one JSON-LD block in `wp_head`. (See `wp-schema-markup`
  skill for what types each page should have.) Presence check only here.
- If field-level validation is needed, run the `seo` CLI crawl
  (`docs/seo/seo-cli-baseline-2026-08-18.md`) — it checks rich-result required
  properties per block. Known acceptable deviation: Rank Math emits
  BreadcrumbList `position` as a string; GSC URL Inspection accepts it.

### 7. Core Web Vitals signals (static checks)
This skill does **not** run Lighthouse. It checks static signals that predict
good CWV:
- Hero/LCP image is not lazy-loaded (no `loading="lazy"` on the first
  viewport's image).
- Below-fold images use `loading="lazy"` and `decoding="async"`.
- Fonts use `display=swap` (already true for Manrope in `functions.php`).
- `preconnect` hints present for any third-party origin.
- No render-blocking CSS beyond parent + child + Google Fonts.
- `width`/`height` (or `aspect-ratio`) on images, to prevent CLS.

## Output format

Always return a structured report. Every 🔴/🟡 finding must be **falsifiable
and verifiable** — a finding without evidence, a failure-mode check, and a
verification method is not complete:

```
## SEO Audit — <page URL>

### Findings by severity
🔴 Critical (blocks indexing / breaks H1 rule / missing title):
  - <finding> — <file:line or production URL evidence>
    Evidence (observed): <what was actually measured/seen in rendered HTML,
      crawl data, or GSC — never "best practice says so">
    Falsification check: <what observation would prove this finding wrong
      or unnecessary — e.g. "if GSC shows CTR already normal for this
      position, do not act">
    Leading indicator: <what signal confirms the fix worked, and when to
      look — e.g. "re-crawl shows single H1", "28-day GSC CTR vs prior window">
    Fix: <minimal change — or 【NEEDS INPUT: ...】 if facts are missing>
🟡 Warning (suboptimal but not blocking):
  - <same four fields>
🟢 Passed:
  - <what's already correct> (plain list, no extra fields needed)

### 301 / URL notes
<if any slug issues — otherwise "none">

### Suggested next actions (do NOT auto-apply)
1. ... (ordered by expected gain / risk, per seo-implementation-checklist logic)
2. ...
```

## Evidence discipline (adapted from claude-seo / iannuttall-seo practice)

- **Separate observation from inference from recommendation.** State which of
  the three each sentence is. A rendered-HTML fact is observation; "this may
  truncate in SERP" is inference; "shorten it" is recommendation.
- **Label heuristics as heuristics.** Character limits, keyword-density ideas,
  and third-party tool scores are conventions, not search-engine rules. Never
  present them as requirements.
- **Partial data is not zero.** If GSC/crawl data is sampled, capped, or
  missing, say so explicitly; do not conclude "no problem" from absent data.
- **Respect sample gates.** Below the thresholds in `seo-process.md` §5
  (e.g. ~100 matched impressions), report direction only and recommend
  observation, not edits.
- **Every fix ships with a re-check.** Use whichever applies: re-render the
  page and inspect source; run `seo crawl https://www.athletikapparel.com
  --save` then `seo crawl-reports --compare latest --against previous`
  (setup/proxy notes: `docs/seo/seo-cli-baseline-2026-08-18.md`); or pull fresh
  GSC rows (commands in `docs/seo/gsc-data-log.md`).

## Rules

- **Never auto-edit.** This skill reports; the user decides. If they then say
  "fix it", switch to normal editing workflow (and invoke `wp-redirect-guard`
  if any URL change is involved).
- **Never invent facts** to fill missing titles/meta. If `seo-tags.md` is
  missing an entry for this page, say so and insert a `【NEEDS INPUT: ...】`
  placeholder.
- **No body copy.** Per AGENTS.md §5, suggest the *structure* of a meta
  description, don't author marketing prose unless explicitly asked.
- **Respect the "do not do" list** in
  `docs/seo/seo-implementation-checklist-v1.md` §9 — never recommend URL
  changes on indexed pages, near-duplicate pages for keyword variants, or
  keyword stacking, no matter what a generic audit rule says.
