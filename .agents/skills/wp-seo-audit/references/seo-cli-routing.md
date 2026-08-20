# Athletik SEO CLI routing

Read this reference only when the task benefits from structured crawl, GSC,
GA4, performance, index, link, or regression evidence.

## Local project constants

- Site: `sc-domain:athletikapparel.com`
- Crawl start: `https://www.athletikapparel.com/`
- GA4 property: `547377703`
- Google account: `zhangyifuzjg@gmail.com`
- Installed CLI baseline: `seo` v0.2.36
- Google API commands may require:
  `HTTPS_PROXY=http://127.0.0.1:7892` and
  `HTTP_PROXY=http://127.0.0.1:7892`

Configuration and old crawl IDs are recorded in
`docs/seo/seo-cli-baseline-2026-08-18.md`. Authentication and project profiles
are local machine state and must not be committed.

## Preflight and discovery

1. Run `seo --version` and `seo doctor --json`. Do not reinstall a working
   CLI. If it is missing, report the blocker rather than installing without
   authorization.
2. Prefer the saved `athletikapparel` project when present. Otherwise pass the
   explicit site, URL, and GA4 property.
3. Run `seo reports describe <report-id> --json` before the first use of a
   report. Follow `readOrder`, `doNotClaim`, limits, and the input schema.
4. Run only the first report that can answer the question. Use related reports
   only when its evidence shows they are necessary.
5. For implementation decisions, request the action view and retain the full
   JSON result. Never pipe it through `head` or discard findings/inventories.

## Report routing

| Job | First report or command | Escalate only when needed |
|---|---|---|
| Broad production audit | `seo report --url https://www.athletikapparel.com/ --actions-only --json` | `site-crawl`, `top-fixes`, `affected-urls` |
| One page | `audit-page` | `performance-audit`, source inspection |
| Selected release URLs | `audit-urls` | `crawl-diff` |
| Post-deploy regression | `crawl-diff` | `compare-crawls`, `affected-urls` |
| Indexing diagnosis | `index-coverage` | `index-coverage-plan`, `index-monitor`, `index-watch` |
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
| Entity consistency | `entity-readiness` | source/Schema/profile review |
| AI/GEO exploration | existing fixed GEO protocol first | `seo-to-ai-query`, `ai-prompt-observations` in a separate exploratory set |
| Crawler evidence | `server-log-analysis` with an owner-supplied log | verify important rows in the source log |

## Broad-audit completion rule

For every returned finding and inventory URL, record:

- exact ID/title and type (`fix` or `review`);
- disposition and reason;
- changed file or external owner action, if any;
- verification result;
- unresolved coverage or data caveat.

Rerun the originating report after an implemented fix. A review item may
legitimately end as `no-change` when the evidence does not justify editing.

## Project-specific gates

- Do not use CTR reports to rewrite metadata below the sample gate in
  `seo-process.md`.
- Do not treat `quick-wins` or `second-page` output as permission to change a
  page until business fit, SERP intent, page ownership, and evidence pass.
- Use a few recurring same-intent manufacturing competitors. Keep directories,
  publishers, marketplaces, retailers, and unrelated verticals classified
  separately.
- Keep lab Lighthouse data separate from CrUX field data.
- Keep AI prompt observations separate from the frozen GEO baseline and never
  interpret one missing mention as universal absence.
- `llms.txt` and IndexNow are optional protocols, not Google ranking factors.
  IndexNow writes externally and requires explicit authorization immediately
  before submission.
- Search Console URL Inspection is read-only through the current scope. A
  request for Google indexing remains a manual GSC action.
