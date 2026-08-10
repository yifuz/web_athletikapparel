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

### Legacy-domain status

`myathletik.com` was retired without redirects by owner decision and now
returns HTTP 410 across its public URLs and HTTP/HTTPS host variants. Before
retirement, a Bing answer for GEO-01 cited its About Us page rather than the
canonical `athletikapparel.com` site. It is not a GEO optimization target;
record any later citation only as a stale search/AI cache signal while all
improvement work stays focused on the canonical new site.

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

Deployment verified on 2026-08-10:

- The canonical Organization/LocalBusiness entity includes `legalName` =
  `Athletik Clothing Inc.` and the verified LinkedIn, Instagram and YouTube
  `sameAs` URLs.
- The homepage, About Us and Sportswear Manufacturer pages returned HTTP 200,
  and their server-rendered JSON-LD parsed successfully.
- No `myathletik.com` URL remained in the canonical site's JSON-LD.

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
| 2026-08-08 | Microsoft Bing domestic web, AI answer block (supplemental) | GEO-01 | Yes | No | `https://myathletik.com/about-us/` | Answer relies on the legacy domain and repeats “seamless technology,” which is not part of the approved current entity baseline | None visible | User-provided screenshot, 2026-08-08 | Answer: based in Zhangjiagang, Suzhou, China; specializes in flatlock stitch construction, seamless technology and technical sportswear. This supplemental Bing check does not replace a ChatGPT/Perplexity/Gemini monthly row. |
| 2026-08-10 | ChatGPT Search (visible model/mode not supplied) | GEO-02 | Yes, but called the brand “Athletik Apparel” once | Yes | Homepage, About Us, Underwear, Sportswear, Outdoor Clothing and Knitted Fabrics pages | Public-brand naming drift: “Athletik Apparel” instead of “Athletik Clothing.” The contrast with a “fashion sweater manufacturer” is model-added rather than site wording. No unsupported factory count, capacity or client claim. | None | User-pasted first response, 2026-08-10 | Strong canonical-domain citation result. Manufacturing claims were traceable to current site copy, and the answer explicitly labeled ownership/capability/certification details as company-reported rather than independently verified. Citation links included `utm_source=chatgpt.com`, enabling attributable referral measurement. Run occurred after the entity-schema deployment and after the legacy site began returning 410. |

## 6. Entity-conflict register

Public search currently surfaces historical websites and third-party records
before the new canonical domain. The following sources require ownership and
editability confirmation before any correction work:

| Source | Observed conflict type | Control status | Next action |
|---|---|---|---|
| `myathletik.com` | Pre-retirement GEO-01 cited its historical About Us page ahead of the canonical domain | Retired; all checked variants return 410; no 301s by owner decision | No remediation; track only whether search/AI systems continue citing cached legacy pages |
| `athletik.com` | Historical brand/site copy and contact details | 【NEEDS INPUT: owned and editable?】 | Update, canonicalize or retire after ownership confirmation |
| `athletik.nyc` | Historical company description, capacity and factory-structure claims | 【NEEDS INPUT: owned and editable?】 | Replace with current approved entity facts or redirect if appropriate |
| `athletik.com.cn` | Historical entity wording, email and operational claims | 【NEEDS INPUT: owned and editable?】 | Update or clearly identify its current role |
| `powermerino.com` / `ultramerino.com` / `sportsbaselayer.com` | Historical niche-site claims, dates and contact information | 【NEEDS INPUT: owned and editable?】 | Review one domain at a time; do not mass-redirect without traffic evidence |
| Supplier directories and import-data sites | Uncontrolled or account-managed MOQ, address, product and association data | 【NEEDS INPUT: which profiles can be edited?】 | Correct only profiles the company controls; do not claim control over public records |

## 7. First improvement cycle

1. Preserve the timing of every result. The August sample is not a clean
   before/after experiment: Bing GEO-01 was recorded before legacy retirement,
   while ChatGPT GEO-02 was recorded after legacy retirement and entity-schema
   deployment.
2. Continue the remaining fixed prompts without delaying useful improvements;
   always record the deployment/crawl conditions in the Notes column.
3. `legalName` and verified official-profile `sameAs` links are deployed on the
   canonical Organization/LocalBusiness entity.
4. Confirm which historical domains and directory profiles the company controls,
   excluding the retired `myathletik.com` site from remediation work.
5. Correct the highest-visibility owned source before publishing new directory
   listings.
6. Produce one first-hand technical article using
   [`content-brief-flatlock-vs-overlock.md`](content-brief-flatlock-vs-overlock.md).
7. Repeat the same 24 checks after entity corrections and the first article are
   publicly crawlable; continue monthly without changing the prompt wording.

## 8. Official references

- Google: <https://developers.google.com/search/docs/fundamentals/ai-optimization-guide>
- Google Search Console generative-AI reporting:
  <https://developers.google.com/search/blog/2026/06/gen-ai-performance-reports>
- OpenAI publisher guidance: <https://help.openai.com/en/articles/12627856-publishers-and-developers-faq>
- Perplexity crawlers: <https://docs.perplexity.ai/docs/resources/perplexity-crawlers>
- Anthropic crawlers: <https://support.anthropic.com/en/articles/8896518-does-anthropic-crawl-data-from-the-web-and-how-can-site-owners-block-the-crawler>
