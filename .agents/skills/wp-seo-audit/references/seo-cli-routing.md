# Athletik SEO CLI routing

Read this reference only when the task benefits from structured crawl, GSC,
GA4, performance, index, link, competitor, AI-search, or regression evidence.

## Maintained baseline

- Site: `sc-domain:athletikapparel.com`
- Crawl start: `https://www.athletikapparel.com/`
- GA4 property: `547377703`
- Verified CLI version: `0.2.36`
- Route table last verified: `2026-08-27`

Authentication, account identity, proxy settings, saved projects, and old crawl
IDs are local machine state. Do not add them to this tracked reference. The
non-secret project baseline is recorded in
`docs/seo/seo-cli-baseline-2026-08-18.md`.

## Preflight and discovery

1. Run `seo --version` and `seo doctor --json`. Do not reinstall or repair the
   CLI without explicit authorization.
2. Compare the installed version with the verified version above. A difference
   is a compatibility review, not automatic failure: list reports and verify
   the selected route before using it.
3. Prefer the saved `athletikapparel` project when present. Otherwise pass the
   explicit site, URL, and GA4 property.
4. Run `seo reports list --json` when the CLI version changed or a route is not
   found.
5. Run `seo reports describe <report-id> --json` before the first use of a
   report. Follow `readOrder`, `doNotClaim`, verification, limits, and schema.
6. Run only the first report that can answer the question. Escalate only when
   its returned evidence requires another report.
7. For implementation decisions, request the action view and retain the full
   structured result. Never pipe it through `head` or discard findings,
   inventories, warnings, or pagination.

## Report routing

| Job | First report or command | Escalate only when needed |
|---|---|---|
| Broad production audit | `report` | `site-crawl`, `top-fixes`, `affected-urls` |
| One page | `audit-page` | `performance-audit`, source inspection |
| Selected release URLs | `audit-urls` | `crawl-diff` |
| Post-deploy regression | `crawl-diff` | `compare-crawls`, `affected-urls` |
| Indexing diagnosis | `index-coverage` | `index-coverage-plan`, `index-monitor`, `index-watch` |
| Traffic or click drop | `search-performance-overview` | `traffic-anomaly`, `segment-impact`, `decaying-pages` |
| Existing-page growth | `page-opportunities` | `quick-wins`, `second-page`, `striking-distance` |
| CTR investigation | `ctr-underperformers` | manual SERP and snippet review |
| Query overlap | `cannibalisation` | page ownership and internal-link review |
| Internal-link opportunity | `internal-links` | source inspection |
| Performance | `performance-audit` | `audit-page`, frontend source inspection |
| Known SEO change | `measure-change` | `segment-impact`; never claim causation |
| Monthly priorities | `search-performance-overview` | `monthly-action-plan`, focused report |
| Content decline | `decaying-pages` | `refresh-priorities` |
| Competitors | `serp-competitors` | `competitor-keyword-gap`, exact SERP checks |
| Referring links | `link-evidence` | `link-recovery`; provider/export optional |
| Entity consistency | `entity-readiness` | source, Schema, and profile review |
| AI/GEO readiness | `ai-readiness` | `geo-gaps`, `agent-readiness` |
| AI/GEO observations | existing fixed GEO protocol first | `seo-to-ai-query`, `ai-prompt-observations` in a separate exploratory set |
| Crawler evidence | `server-log-analysis` with an owner-supplied log | verify important rows in the source log |

For a broad audit, the command form is:

```powershell
seo report --url https://www.athletikapparel.com/ --actions-only --json
```

## Failure and fallback

- Missing CLI: report the blocker; do not install it automatically.
- Version mismatch: verify the route with `reports list` and `reports describe`.
- Authentication failure: continue with crawl/source evidence and mark GSC or
  GA4 unavailable.
- Network, DNS, timeout, or rate limit: retry the same source at most once,
  then continue with explicit limitations.
- Failed report: retain successful evidence, report the failed scope, and do
  not claim a complete audit.
- Missing provider: use owner-supplied exports or the report's documented
  research-file schema; never guess column mappings.

## Broad-audit completion rule

For every returned finding and inventory URL, record:

- exact ID/title and type (`fix` or `review`);
- disposition and reason;
- changed file or external owner action, if any;
- verification result;
- unresolved coverage or data caveat.

Rerun the originating report after an implemented fix. A review item may end
as `no-change` when the evidence does not justify editing.

## Project-specific gates

- Do not use CTR reports to rewrite metadata below the sample gate in
  `seo-process.md`.
- Do not treat opportunity reports as permission to change a page until
  business fit, SERP intent, page ownership, and evidence pass.
- Use a few recurring same-intent manufacturing competitors. Classify
  directories, publishers, marketplaces, retailers, and unrelated verticals
  separately.
- Keep lab Lighthouse data separate from CrUX field data.
- Keep AI prompt observations separate from the frozen GEO baseline. One
  missing mention is not universal absence.
- `llms.txt` and IndexNow are optional protocols, not Google ranking factors.
  IndexNow writes externally and requires explicit authorization immediately
  before submission.
- Search Console URL Inspection is read-only in the current scope. A request
  for Google indexing remains a manual GSC action.
