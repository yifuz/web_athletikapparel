---
name: wp-seo-audit
description: >
  Evidence-backed SEO audit and diagnosis for the myathletik-child WordPress
  theme. Use for page or site audits, indexing and crawl problems, Search
  Console analysis, keyword/page opportunities, SEO regressions, Core Web
  Vitals, internal links, schema, metadata, and post-deployment SEO acceptance.
  Audit and diagnosis are read-only; explicit implementation requests may
  proceed through the relevant project skill and change-control workflow.
---

# wp-seo-audit — Athletik SEO Audit and Diagnosis V2

Produce decisions that are traceable to live-page, source, Search Console,
analytics, or market evidence. Do not treat a generic SEO score as a result.

Audit and diagnosis are read-only. If the user explicitly requests a fix,
finish the diagnosis first, then use the relevant implementation skill. Invoke
`wp-redirect-guard` before any current-site URL change.

## Project truth to read first

Read only the files needed for the request, starting with:

- `AGENTS.md` §2–§6 for positioning, entities, URL decisions, copy, and terms.
- `seo-tags.md` for approved Title, Meta, H1, social image, and alt truth.
- `docs/sitemap.md` for current information architecture and page ownership.
- `docs/progress.md` for current deployment state.
- `docs/seo/seo-process.md` for evidence hierarchy, sample gates, and review
  windows.
- `docs/seo/gsc-data-log.md` before interpreting queries, CTR, or index status.
- `docs/seo/seo-implementation-checklist-v1.md` before proposing another item.

Do not revive a superseded historical issue merely because an old audit or
generic checklist mentions it.

## Choose the smallest useful evidence path

1. Establish whether the user means local, staging, or production.
2. For a broad audit, regression check, indexing diagnosis, performance test,
   or Search Console opportunity analysis, read
   [`references/seo-cli-routing.md`](references/seo-cli-routing.md) and use one
   described structured report before manual exploration.
3. For a narrow source-only check, inspect the relevant source and rendered
   production HTML directly; do not run unrelated reports.
4. Read every returned finding, coverage field, warning, caveat, and inventory
   row. Never truncate a structured JSON result before evaluating it.
5. Inspect theme source only where evidence requires implementation context or
   a source-of-truth comparison.

## Project-aware audit checks

### Indexability and metadata

- Confirm HTTP status, robots meta, X-Robots-Tag, canonical, Sitemap inclusion,
  and discoverable internal links.
- Compare rendered Title, Meta, and H1 with `seo-tags.md` and
  `docs/sitemap.md`; Rank Math output, not a dormant PHP array, is production
  truth.
- Treat roughly 60-character titles and 155-character descriptions as soft
  review heuristics. Do not rewrite on length alone or below the data gates in
  `seo-process.md`.

### Headings and content ownership

- Require exactly one H1 and a logical H2/H3 hierarchy.
- Confirm one primary search intent and one owning URL. Check GSC query-to-page
  overlap before diagnosing cannibalisation.
- A split-intent SERP is evidence to investigate, not automatic permission to
  create two pages.

### Images and media

- Every `<img>` must have an `alt` attribute. Informational images need concise,
  descriptive alt text; decorative images should use `alt=""`.
- Flag filenames, keyword lists, or unrelated terms used as alt text.
- Do not assume the homepage gallery is broken; verify current rendered output.
- Check intrinsic dimensions or stable aspect ratio, responsive candidates,
  MIME/status, loading, decoding, and LCP priority as appropriate.

### URL and internal-link rules

- Current commercial category URLs are top-level `*-manufacturer/` routes.
- There is no standalone `/products/` page in the current phase. Category
  discovery comes from the homepage product section, navigation, contextual
  links, and Sitemap.
- The retired `myathletik.com` domain and its candidate `/products/<x>/`
  mappings are explicitly out of redirect scope. Do not flag their absence.
- For any future change to a live `athletikapparel.com` URL, invoke
  `wp-redirect-guard` before editing and require an explicit 301 map.
- A page is not an orphan when it has at least one crawlable, relevant internal
  entry; do not require an unrelated sibling link merely to increase count.

### Schema and entity signals

- Parse every JSON-LD block and compare types and facts with visible content.
- Presence alone is not a pass. Validate required fields for the applicable
  page type, while keeping optional enhancements separate from errors.
- Keep Athletik Clothing, Athletik Clothing Inc., Zhangjiagang Athletik
  Clothing Co., Limited, and the non-public Beta Textiles relationship within
  the boundaries in `AGENTS.md`.
- Schema, `llms.txt`, or AI-crawler access is not a substitute for useful,
  indexable content or independent citations.

### Performance and rendering

- Static checks cover LCP loading priority, below-fold lazy loading, dimensions,
  responsive images, font display, preconnects, and blocking resources.
- The accepted production baseline is one child-theme `style.css`; do not
  restore or accept a redundant parent stylesheet without evidence.
- When performance is material, use Lighthouse lab data and available CrUX
  field data, clearly separated. An origin-level CrUX result is not page-level
  evidence.

## Finding contract

Every Critical or Warning finding must include:

- stable ID and `fix` or `review` type;
- affected URL(s) and evidence source;
- data status: complete, partial, sampled, capped, skipped, or unavailable;
- observed evidence, separate from inference;
- falsification condition;
- minimal proposed action;
- verification method and review window;
- allowed outcome: `fixed`, `deferred`, `not-needed` for fixes, or `changed`,
  `no-change`, `deferred` for reviews.

Do not omit a tool finding or inventory row from the handoff. If pagination
exists, retrieve every page or state precisely what remains unreviewed.

## Output

Return:

1. findings by severity, with the complete finding contract above;
2. passed checks;
3. URL/redirect notes;
4. ordered next actions by expected business gain, risk, and effort;
5. evidence gaps and the exact condition for reopening each deferred action.

## Evidence discipline

- Keep live crawl, source code, GSC, GA4, inquiry data, SERP snapshots, and
  third-party estimates separate.
- Partial or missing data is never zero and cannot support an all-clear.
- GSC grouped totals may undercount; query, page, country, and device tables
  are not interchangeable.
- Search volume, difficulty, authority, traffic, and AI visibility from third
  parties are estimates, not Google measurements.
- Do not promise indexing, rankings, traffic, leads, or AI citations.
- Do not use fixed word counts, keyword density, generic E-E-A-T scores, or a
  single 0–100 audit score as change triggers.
- Never invent facts or long-form copy. Follow `AGENTS.md` approval and evidence
  boundaries.
- Respect the do-not-do list in the implementation checklist: no keyword
  stacking, doorway pages, automatic near-duplicate pages, bulk low-quality
  links, or unsupported Schema.
