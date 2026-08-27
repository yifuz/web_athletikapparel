# Athletik SEO audit contract

Read this reference for broad or multi-source audits and before classifying a
finding as Critical or Warning.

## Classification

Keep technical severity, business priority, and evidence confidence separate.

### Severity

- `Critical`: confirmed production condition that blocks or seriously corrupts
  crawling, indexing, canonical ownership, rendering, or access for an
  important URL set. Missing data and optional enhancements are never Critical.
- `Warning`: confirmed defect or material risk affecting discovery,
  interpretation, experience, or conversion, without a site-wide blocking
  condition.
- `Info`: observation, enhancement opportunity, intentional control, or item
  that needs more evidence.

### Business priority

- `P0`: active, material business or indexation risk requiring immediate owner
  attention.
- `P1`: high expected gain or risk reduction after dependencies are satisfied.
- `P2`: useful improvement with bounded impact or moderate effort.
- `P3`: monitor, document, or revisit only when its reopening condition occurs.

Severity does not determine priority by itself. A Warning on the main
commercial template may outrank a more severe issue on an intentionally
non-indexable, low-value URL.

### Confidence

- `Confirmed`: directly observed in authoritative rendered output, source,
  first-party data, or reproducible tool evidence.
- `Probable`: several consistent signals support the inference, but one
  material verification step remains.
- `Unverified`: hypothesis or third-party indication that cannot yet support a
  fix.

## Data status

Use one or more precise states: `complete`, `partial`, `sampled`, `capped`,
`filtered`, `skipped`, or `unavailable`. State the affected source and scope.
None of these states implies zero.

## Finding shape

Every Critical or Warning finding must include:

- stable ID and exact title;
- type: `fix` or `review`;
- severity, business priority, and confidence;
- affected URL(s), template, or segment;
- evidence source and data status;
- observed evidence, separate from inference;
- falsification condition;
- minimal proposed action;
- dependency or required owner decision;
- verification method and review window;
- allowed outcome.

Allowed outcomes:

- fixes: `fixed`, `deferred`, `not-needed`;
- reviews: `changed`, `no-change`, `deferred`.

An `Unverified` item normally remains a review. Do not turn it into a fix until
its verification condition passes.

## Duplicate and contradiction handling

- Preserve every original tool finding ID and inventory disposition.
- Group findings that share one root cause, but do not erase their source IDs.
- Mark repeated items `duplicate` and point to the owning finding.
- When sources conflict, mark the item `contradicted`, show both observations,
  state which source is authoritative for the question, and define the next
  verification step.
- Do not increase severity because several tools repeat the same heuristic.
- A tool finding may end `not-needed` or `no-change` when project truth or
  direct evidence falsifies it.

## Failure and stopping rules

| Condition | Required response |
|---|---|
| CLI or required tool missing | Report the blocker; do not install without authorization. |
| Authentication unavailable | Continue with sources that do not need it; mark the missing dataset unavailable. |
| DNS, timeout, or provider rate limit | Retry the same source at most once, then stop that source. |
| One structured report fails | Preserve successful evidence; name the failed scope; do not claim completeness. |
| Result is partial, capped, or paginated | Retrieve remaining pages when proportionate; otherwise state the exact unreviewed scope. |
| Source and rendered output disagree | Preserve both; verify environment, cache, and rendering before recommending a fix. |
| Data cannot distinguish two explanations | Return a review with the test that would falsify each explanation. |

Do not enter repeated fallback loops or replace missing first-party data with an
unlabelled third-party estimate.

## Coverage modes

Choose and disclose one mode:

- `full`: every in-scope URL and inventory row reviewed;
- `stratified`: representative URLs sampled by page type, template, index
  state, and business importance, while status/canonical inventories remain
  counted across the full available set;
- `targeted`: only the explicit URL or issue set reviewed.

Use full coverage for the current small Athletik site when practical. Switch to
stratified coverage only when URL volume or repeated patterns make full content
review disproportionate. Report sample selection, counts, excluded patterns,
and reopening conditions. Never call a sample a full-site all-clear.

## Output order

1. scope, environment, date, coverage mode, and evidence sources;
2. Critical, Warning, then Info findings;
3. passed checks;
4. URL and redirect notes;
5. actions ordered by business gain, risk, dependencies, and effort;
6. evidence gaps, deferred items, and reopening conditions;
7. finding and inventory reconciliation totals.

Do not create a report file, HTML artifact, ticket, or external submission
unless the user requests that output or action. Do not reduce the conclusion to
a single 0–100 score.
