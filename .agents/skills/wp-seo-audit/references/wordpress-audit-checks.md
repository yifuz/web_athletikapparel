# Athletik WordPress SEO audit checks

Read this reference for theme, plugin, metadata, Schema, rendering, mobile,
URL-normalisation, or other technical WordPress checks. Apply only the sections
relevant to the request.

## Environment and public identity

- Confirm local, staging, or production before interpreting output.
- Check that production canonical, Open Graph, Schema, Sitemap, internal links,
  and assets do not leak LocalWP, staging, localhost, or private hostnames.
- Treat production rendered output as current public truth. Source arrays and
  local templates provide implementation context, not proof of deployment.

## Raw HTML and rendered DOM

1. Fetch the server response and retain raw HTML.
2. Inspect browser-rendered DOM when JavaScript, caching, optimization, or
   plugin output could change the result.
3. Compare Title, meta description, robots, canonical, headings, internal
   links, visible text, and JSON-LD between raw and rendered forms.
4. Classify important content or Schema as server-rendered or client-injected.

`curl` and ordinary HTTP clients return raw HTML and can detect JSON-LD present
in that response. A text-extraction tool may remove `<script>` elements; that
tool limitation is not evidence that Schema is absent. Report missing Schema
only after inspecting an appropriate raw or rendered source. Use Rich Results
Test as supplementary validation, not as the sole inventory.

## WordPress and Rank Math ownership

- Compare rendered Title, Meta, H1, social tags, and canonical with
  `seo-tags.md` and `docs/sitemap.md`.
- Check whether Rank Math, WordPress core, GeneratePress, or child-theme hooks
  emit duplicate or conflicting Title, robots, canonical, Open Graph, or
  JSON-LD output.
- Confirm one intended XML Sitemap owner and flag duplicate or conflicting
  Rank Math and WordPress core Sitemap discovery.
- Review attachment, author, date, search, taxonomy archive, feed, pagination,
  and REST-discoverable URLs only when they exist or appear in crawl/index
  evidence. Confirm intentional index controls before calling them defects.
- Verify template conditions against production output; dormant PHP metadata
  arrays are not production truth.

## Indexability, canonicalisation, and URLs

- Check HTTP status, robots meta, X-Robots-Tag, canonical, Sitemap membership,
  and crawlable internal discovery together.
- Verify HTTPS, preferred host, lowercase and trailing-slash consistency only
  where variants resolve or appear in evidence.
- Trace every redirect hop for changed or failing URLs; flag loops, chains,
  temporary redirects used as permanent moves, and final-target conflicts.
- Distinguish genuine soft 404s from concise but valid contact, legal, or
  utility pages.
- Never use a `site:` result count as index coverage. Use GSC and representative
  URL Inspection evidence when available.
- Invoke `wp-redirect-guard` before implementing any current-site URL change.

## Mobile, HTTPS, and response quality

- Check viewport configuration, horizontal overflow, tap-target usability, and
  meaningful mobile/desktop content parity on representative templates.
- Verify valid HTTPS, HTTP-to-HTTPS behavior, mixed content, and broken secure
  subresources.
- Treat HSTS and other security headers as security or resilience reviews, not
  automatic ranking defects.
- Do not cite the retired Google Mobile-Friendly Test. Use rendered mobile
  inspection, Lighthouse, and current first-party evidence.

## Performance and media

- Keep Lighthouse lab results separate from CrUX field data and state URL- or
  origin-level scope.
- Ensure an LCP image is discoverable early, is not lazy-loaded, and receives
  appropriate priority. Lazy-load below-fold images when useful.
- Check intrinsic dimensions or stable aspect ratio, responsive candidates,
  MIME/status, compression, decoding, and duplicate payloads.
- Informational images require concise descriptive alt text; decorative images
  use `alt=""`.
- Check font display, preconnect/preload evidence, blocking resources, and the
  accepted single child-theme `style.css` production baseline.

## Architecture and content ownership

- A page is not orphaned when it has at least one crawlable, relevant internal
  entry. Do not force unrelated sibling links or a generic three-click rule.
- Confirm one primary intent and owning URL. Use GSC query-to-page overlap
  before diagnosing cannibalisation.
- Treat title and description lengths as soft review heuristics, not defects by
  themselves.
- Do not require mechanical keyword placement in the first words, H1, Title,
  and URL. Evaluate intent, clarity, visible content, and SERP evidence.

## Conditional checks

- Crawl budget, faceted navigation, session IDs, and infinite-scroll fallback:
  only when URL volume or crawl evidence makes them relevant.
- Hreflang and locale parity: only when multiple language or regional URLs
  exist.
- Local SEO and NAP: only when the page or listing has a local-search purpose.
- E-E-A-T indicators: treat qualifications, citations, cases, clients, and
  certifications as evidence to verify, never content to invent.
- Competitor and backlink metrics: label provider source, market, date, caps,
  and estimates; do not convert them directly into changes.

## Verification after an authorized fix

- Build or lint the affected source as appropriate.
- Recheck raw and rendered output on the changed URL or representative
  template.
- Rerun the originating structured report when available.
- Confirm no new URL, canonical, Schema, metadata, or performance regression.
- Record the finding outcome and review window from `audit-contract.md`.
