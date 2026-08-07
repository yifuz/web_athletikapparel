# Meta Ads Provisional Baseline — 2026-08-07

> Status: provisional baseline; the follow result still needs a matched reporting window.
> Evidence: user-provided Meta Ads Manager screenshot and user-confirmed Instagram result.
> Screenshot report range: 2026-07-07 to 2026-08-05.
> Decision use: establish what to measure before changing creative or budget.

## 1. Current observations

The screenshot is an **Ad Set-level** view. The active row that began on
2026-08-03 shows:

| Metric | Screenshot value |
|---|---:|
| Result | 61 Instagram profile visits |
| Cost per result | RMB 2.29 per profile visit |
| Amount spent | RMB 139.52 |
| Impressions | 1,132 |
| Reach | 1,038 |

The user confirmed that the currently promoted video produced approximately
120 follows. The user also confirmed that several historical videos delivered
much cheaper profile visits but produced little or no follow, like, or other
meaningful engagement.

The screenshot does not show a follows column, and its selected report window
ends on 2026-08-05. The 120 follows may come from a different Instagram
Insights window or may combine paid and organic results. Therefore this record
does **not** calculate cost per follow by dividing RMB 139.52 by 120. The two
figures must first be matched to the same dates, ad level, and attribution scope.

## 2. Working interpretation

- Low profile-visit cost alone is not evidence of a useful audience.
- The current video is the provisional control because it has produced the
  strongest user-confirmed downstream follow result.
- Meta should be evaluated on follower quality and follow conversion, with
  profile-visit cost retained as a diagnostic metric rather than the main KPI.
- The Google Search campaign remains in strategy learning with no reportable
  performance data. Keep checking delivery and errors, but do not infer
  performance from an empty report.

## 3. KPI order for the first baseline

1. **Cost per qualified follow:** spend divided by follows from target-industry accounts.
2. **Qualified follower rate:** target-industry follows divided by sampled new follows.
3. **Matched cost per follow:** spend divided by follows in the same reporting window.
4. **Profile-to-follow rate:** follows divided by profile visits only when the two metrics
   use the same dates and attribution scope.
5. Profile visits, cost per profile visit, reach, impressions, frequency, and content engagement.

For follower-quality review, check a sample of 30 recent followers and record
aggregate counts only:

- A: target buyer or business account — brand, wholesaler, importer, sourcing, apparel business.
- B: relevant industry account — supplier, designer, factory, or apparel professional.
- C: consumer, unrelated, suspicious, or otherwise not useful for B2B promotion.

Do not store follower usernames or other personal identifiers in this repository.

## 4. Immediate operating decision

- Keep the current winning video as the control and keep its existing budget stable
  during the initial observation period, unless a delivery, policy, audience-quality,
  or factual-content problem appears.
- Do not reactivate historical ads solely because they achieved cheaper profile visits.
- Do not edit the control while it is still establishing a baseline. Meta recommends
  allowing sufficient budget over at least seven days so delivery can learn; see
  [Meta's budget guidance](https://www.facebook.com/business/ads/pricing).
- After the matched baseline is complete, test one creative variable at a time by
  creating a separate variant; keep the control unchanged for comparison.
- Do not increase Meta budget until follower quality, matched cost per follow, and
  the Google real-click attribution baseline can be reviewed together.

## 5. Data needed for the matched baseline

Use the same custom date range in Ads Manager and Instagram Insights, preferably
from the control ad's start date through the latest complete day:

- Ad-level amount spent, profile visits, reach, impressions, and content engagement.
- Follows attributed to the promoted video, if the account exposes that metric.
- Instagram account net follower change for the same dates.
- Whether the reported 120 follows are lifetime, paid plus organic, or ad-attributed.
- Audience country distribution and the A/B/C quality sample of 30 recent followers.

Once these fields are available, this provisional record can be promoted to the
first verified Meta baseline without changing the campaign during measurement.
