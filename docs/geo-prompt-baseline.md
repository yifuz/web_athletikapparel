# GEO Prompt Baseline and Entity Consistency Log

> Started: 2026-08-08
> Scope: lightweight monthly observation for ChatGPT Search, Perplexity and
> Gemini/Google AI experiences. This is not a ranking guarantee.

## 1. Operating rules

- Run the same prompts once per month, in English, using a fresh conversation.
- Keep web/search access enabled and use a United States locale where the
  product allows it.
- Record the first answer. Do not regenerate until the brand appears.
- Record mentions and citations separately: a brand mention without a link is
  not a website citation.
- Save the answer link or a screenshot. Note the engine, visible model/mode and
  run date because results vary over time and by user.
- Do not compare raw rankings across engines. Compare each engine with its own
  previous monthly result.
- If Search Console shows the Generative AI performance report for this
  property, record its impressions and cited pages monthly. The report is being
  rolled out gradually, so a missing menu is not treated as an error.
- Check GA4 acquisition/referral data for attributable AI-search visits. Treat
  referral traffic as stronger evidence than an uncited brand mention.

Single-operator baseline: 8 prompts × 3 engines = 24 checks once per month.
Pause an engine if it cannot provide web-grounded answers in the current
account or region.

## 2. Approved entity source of truth

| Field | Approved value |
|---|---|
| Public brand | Athletik Clothing |
| Legal entity | Athletik Clothing Inc. |
| Canonical website | <https://www.athletikapparel.com/> |
| Public email | `info@athletikapparel.com` |
| Public phone | `+86 139 5113 9696` |
| China office | No.25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu, 215699 China |
| LinkedIn | <https://www.linkedin.com/company/111831319/> |
| Instagram | <https://www.instagram.com/athletikclothinginc/> |
| YouTube | <https://www.youtube.com/@athletikclothinginc> |
| Positioning | Vertically integrated OEM for technical knitwear |
| Public MOQ | 1,000 pieces per style |

Do not infer or publish factory count, partner-factory details, client names,
unapproved certifications or other capacity claims from third-party pages.

## 3. Technical access baseline

Checked on 2026-08-08:

- `robots.txt` allows public pages and declares the Rank Math Sitemap.
- The homepage and Sportswear Manufacturer page returned HTTP 200 when requested
  with Googlebot, OAI-SearchBot, PerplexityBot and Claude-SearchBot user agents.
- No interstitial challenge was returned in this user-agent check.

This confirms there is no obvious robots.txt or user-agent block. It does not
prove that every crawler IP will always bypass CDN/WAF controls; investigate
server or Cloudflare logs only if an engine reports a crawl failure.

The site does not need `llms.txt` or special AI schema for Google visibility.
The current approach is crawlable first-hand content, consistent entities and
normal SEO foundations.

## 4. Fixed prompt set

| ID | Prompt | Intent |
|---|---|---|
| GEO-01 | What does Athletik Clothing manufacture, and where is the company based? | Branded entity accuracy |
| GEO-02 | Is athletikapparel.com a technical knitwear manufacturer? Summarize its manufacturing focus and cite sources. | Website/entity citation |
| GEO-03 | Which manufacturers in China specialize in FLATLOCK and ACTIVESEAM technical knitwear? | Technical supplier discovery |
| GEO-04 | Recommend a sportswear OEM in China for an order of at least 1,000 pieces per style. | Sportswear + MOQ discovery |
| GEO-05 | Which manufacturers make Merino wool base layers with flatlock construction? | Merino wool discovery |
| GEO-06 | What should a buyer include in a tech pack for technical knitwear production? | Buyer education citation |
| GEO-07 | FLATLOCK vs OVERLOCK for performance base layers: what are the differences and when should each be used? | Technical answer citation |
| GEO-08 | How should a mid-sized brand evaluate a vertically integrated knitwear OEM in China? | Buyer evaluation citation |

## 5. Monthly result log

Use one row for every prompt/engine result. Add rows; do not overwrite prior
months.

| Run date | Engine + model/mode | Prompt ID | Brand mentioned? | `athletikapparel.com` cited? | Cited Athletik URL | Incorrect/outdated facts | Other suppliers mentioned | Evidence link/screenshot | Notes |
|---|---|---|---|---|---|---|---|---|---|
| 【NEEDS INPUT: first run date】 | 【NEEDS INPUT: engine and model/mode】 | GEO-01 | — | — | — | — | — | — | — |

## 6. Entity-conflict register

Public search currently surfaces historical websites and third-party records
before the new canonical domain. The following sources require ownership and
editability confirmation before any correction work:

| Source | Observed conflict type | Control status | Next action |
|---|---|---|---|
| `athletik.com` | Historical brand/site copy and contact details | 【NEEDS INPUT: owned and editable?】 | Update, canonicalize or retire after ownership confirmation |
| `athletik.nyc` | Historical company description, capacity and factory-structure claims | 【NEEDS INPUT: owned and editable?】 | Replace with current approved entity facts or redirect if appropriate |
| `athletik.com.cn` | Historical entity wording, email and operational claims | 【NEEDS INPUT: owned and editable?】 | Update or clearly identify its current role |
| `powermerino.com` / `ultramerino.com` / `sportsbaselayer.com` | Historical niche-site claims, dates and contact information | 【NEEDS INPUT: owned and editable?】 | Review one domain at a time; do not mass-redirect without traffic evidence |
| Supplier directories and import-data sites | Uncontrolled or account-managed MOQ, address, product and association data | 【NEEDS INPUT: which profiles can be edited?】 | Correct only profiles the company controls; do not claim control over public records |

## 7. First improvement cycle

1. Add `legalName` and verified official-profile `sameAs` links to the canonical
   Organization entity.
2. Confirm which historical domains and directory profiles the company controls.
3. Correct the highest-visibility owned source before publishing new directory
   listings.
4. Produce one first-hand technical article using
   [`content-brief-flatlock-vs-overlock.md`](content-brief-flatlock-vs-overlock.md).
5. Run the 24-check baseline after entity corrections and the first article are
   publicly crawlable; repeat monthly without changing the prompt wording.

## 8. Official references

- Google: <https://developers.google.com/search/docs/fundamentals/ai-optimization-guide>
- Google Search Console generative-AI reporting:
  <https://developers.google.com/search/blog/2026/06/gen-ai-performance-reports>
- OpenAI publisher guidance: <https://help.openai.com/en/articles/12627856-publishers-and-developers-faq>
- Perplexity crawlers: <https://docs.perplexity.ai/docs/resources/perplexity-crawlers>
- Anthropic crawlers: <https://support.anthropic.com/en/articles/8896518-does-anthropic-crawl-data-from-the-web-and-how-can-site-owners-block-the-crawler>
