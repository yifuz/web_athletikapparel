---
name: wp-brand-voice-guard
description: >
  Brand voice, terminology, and anti-fabrication guard for myathletik-child.
  Enforces AGENTS.md §5 (no auto-authored body copy, use placeholders) and §6
  (consistent technical term spelling: FLATLOCK, ACTIVESEAM, SELF FABRIC,
  SCREENPRINT, COVERSTITCH, OVERLOCK, Carbondry, Laser perforation, Merino
  wool, Vertically integrated OEM, MOQ, Tech pack / spec sheet). Also blocks
  invented facts (certifications, factory counts, capacity numbers, client
  names) and ensures empty content slots use 【CONTENT: user to write】 /
  【NEEDS INPUT: ...】 placeholders. Use whenever the user asks to 写文案 /
  改文字 / 检查术语 / 拼写检查 / 品牌口吻, or says "write copy", "check
  terminology", "fix spelling", "brand voice", "rewrite this text", "what
  should this say", or before publishing/committing any page that contains
  body copy or marketing prose. Trigger on 术语一致 / 拼写 / 占位符 /
  不要乱编 / 品牌一致性 / 上线前检查 too.
---

# wp-brand-voice-guard — Brand Voice, Terminology & Anti-Fabrication

This skill enforces the **content rules** in AGENTS.md §5 and §6. It's the
"don't embarrass the brand" guard.

## The two hard rules

### Rule 1 — No auto-authored body copy (AGENTS.md §5)

> The user writes all long-form body copy. Do NOT auto-generate or ghost-write
> page body content, product descriptions, or marketing paragraphs unless
> explicitly asked. When a content slot is empty, insert a clearly marked
> placeholder rather than filling it in.

What the agent **may** write (structural / microcopy):
- Headings and labels (H1/H2/H3 text, nav labels, button labels)
- alt text (real keywords — see `wp-image-optimize`)
- SEO Title / Meta Description (per `seo-tags.md`, technical tone)
- Schema field values that are factual (entity name, URL — not marketing copy)
- Code comments, commit messages

What the agent **must NOT** write (long-form prose):
- Page intro paragraphs
- Product descriptions
- Marketing / positioning paragraphs
- About-us / sustainability narrative
- Service process explanations
- Blog posts

When such a slot is empty, insert:
- `【CONTENT: user to write】` — for prose the user will author.
- `【NEEDS INPUT: <what's needed>】` — for a specific unknown fact.

### Rule 2 — No invented facts (AGENTS.md §5)

> Do not invent facts, certifications, capacity numbers, or client names. If a
> factual detail is needed and unknown, insert a `【NEEDS INPUT: ...】`
> placeholder rather than fabricating.

Specifically never invent:
- Certifications (e.g. OEKO-TEX, GOTS, ISO — unless the user has stated them)
- Factory count (the brief mentions "four factories" — confirm with user
  before stating a number)
- Founding year, years of operation ("15+ years" appears in `seo-tags.md` —
  that's the user's stated figure, OK to reuse; don't invent new ones)
- Capacity numbers (pieces/month, knit meters, etc.)
- Client / brand names
- MOQ as a hard rule (`seo-tags.md` notes don't state MOQ as a rule — the
  ~500 figure is internal guidance)
- Awards, partnerships, media mentions

If a fact is needed and not in `seo-tags.md` / `docs/sitemap.md` /
`*-copy.md`, **ask the user** or use `【NEEDS INPUT: ...】`.

## Terminology (AGENTS.md §6)

When the agent writes any text (headings, labels, alt, microcopy), spell these
technical terms **exactly** as below:

| Term                  | Correct form             | Common wrong forms                |
|-----------------------|--------------------------|-----------------------------------|
| FLATLOCK              | FLATLOCK (all-caps brand-style for the technique; lowercase "flatlock seam" / "flatlock stitch" OK in prose) | Flat-lock, flat lock, FlatLock |
| ACTIVESEAM            | ACTIVESEAM (all-caps)    | Active seam, ActiveSeam, Active Seam |
| SELF FABRIC           | SELF FABRIC              | Self-fabric, self fabric          |
| SCREENPRINT           | SCREENPRINT (one word)   | Screen print, screen-print, ScreenPrint |
| COVERSTITCH           | COVERSTITCH              | Cover stitch, cover-stitch        |
| OVERLOCK              | OVERLOCK                 | Over-lock, over lock              |
| Carbondry             | Carbondry (capital C, one word) | Carbon dry, CarbonDry, Carbondry™ (no ™ unless user says so) |
| Laser perforation     | Laser perforation        | laser-perforation (hyphen only as adjective: "laser-perforated") |
| Merino wool           | Merino wool              | merino Wool, Merino Wool (caps vary; "Merino wool" is the user's form) |
| Vertically integrated OEM | Vertically integrated OEM | vertically-integrated (no hyphen needed) |
| MOQ                   | MOQ (abbr.) / Minimum Order Quantity (first use) | M.O.Q, moq |
| Tech pack / spec sheet | tech pack / spec sheet   | tech-pack, TechPack               |
| Brand name            | myathletik (lowercase, the domain/entity) / Athletik Clothing (public brand name, legal: Athletik Clothing Inc.) | MyAthletik, Myathletik, ATHLETIK (caps) |

## Pre-publish / pre-commit check

Before committing any page or template that contains text:

1. **Scan for placeholders still in place.** If `【CONTENT: ...】` or
   `【NEEDS INPUT: ...】` is still in the file, decide:
   - If publishing to production → block / warn (placeholders must not ship).
   - If local dev / staging → OK to commit, but flag in the commit message.
2. **Scan for fabricated facts.** Grep for numbers, certifications, years,
   client names that aren't sourced from `seo-tags.md` / `docs/` / user input.
3. **Scan for terminology drift.** Check the terms above are spelled correctly.
4. **Scan for stock-photo-style marketing fluff** the agent might have slipped
   in ("world-class", "industry-leading", "cutting-edge", "premier",
   "top-tier", "best-in-class"). These violate the technical-confident tone.
   Replace with specific technical claims or remove.

## Tone (for the text the agent IS allowed to write)

From AGENTS.md §5 + `docs/design-brief.md`:
- **Technical, confident, specific.** Like a manufacturer talking to
  professional buyers.
- **Not startup-pitch warm.** No "we're passionate about...", "your success is
  our mission", "let's build something amazing together".
- **Not cold-industrial catalogue.** Warmth comes from specificity and
  competence, not from buzzwords.
- **Specific > generic.** "Flatlock seam construction at 14 SPI" beats
  "high-quality stitching".
- **Mid-sized B2B buyer audience** (brands/wholesalers placing technical knit
  orders, MOQ ~500). Not startups, not end consumers.

## Output format

When checking existing content:
```
## Brand Voice / Terminology Check — <file or page>

### Placeholders still present (must resolve before production)
- <file:line>: `【CONTENT: ...】`
- <file:line>: `【NEEDS INPUT: ...】`

### Suspected fabricated facts (need user confirmation)
- <file:line>: "<claim>" — not found in seo-tags.md / docs / user input

### Terminology drift
- <file:line>: "<wrong>" → "<correct>"

### Tone issues (fluff / wrong audience)
- <file:line>: "<phrase>" — <why it's off> — <suggested direction>

### Passed
- <what's correct>
```

When the user asks the agent to write something it shouldn't (body copy):
- Refuse politely: "That's body copy, which per AGENTS.md §5 you write. I've
  left a `【CONTENT: ...】` placeholder. Want me to draft a structure/outline
  for you to fill?"
- Offer the structural help (heading outline, key points list) without
  authoring the prose.

## Rules

- **Placeholders over prose.** When in doubt, insert `【CONTENT: ...】` /
  `【NEEDS INPUT: ...】` and ask.
- **Reuse user-stated facts only.** What's in `seo-tags.md`, `docs/sitemap.md`,
  `*-copy.md`, or that the user said in conversation. Cite the source when
  reusing.
- **Terminology table above is authoritative** for agent-written text.
- **No fluff words.** If a phrase could appear on any OEM site, it's too generic.
