> This is the project instruction file for Claude Code / Codex. It is loaded automatically. Full page structure & URL/301 plan is in `docs/sitemap.md` — read it before creating or restructuring pages.

---
name: myathletik-website
description: >
  Project rules for rebuilding the myathletik.com website. myathletik (legal
  entity "Athletik Clothing Inc.") is a vertically integrated OEM knitwear
  manufacturer specializing in flatlock / activeseam technical knitwear. This
  skill encodes the site's tech stack, information architecture, URL/SEO rules,
  brand voice, and terminology standards. Apply it on ANY task that creates or
  edits theme code, page content, blocks, CSS, or redirects for this site.
---

# myathletik.com — Website Rebuild Project Rules

Read this file before writing any code, content, or block markup for this
project. These rules exist to protect the site's existing SEO equity and to
keep the rebuild consistent. When a task conflicts with these rules, stop and
flag it rather than silently overriding.

## 1. Tech stack (this is a CODE-FIRST project)

This site is rebuilt and maintained as a **code project**, not a visual
page-builder site. Claude Code / Codex are expected to do substantial work in
the theme code. Day-to-day layout/structure changes happen in code; only
routine text edits happen in the block editor.

- **Platform:** WordPress 7.0 (self-hosted on GoDaddy; developed locally on
  LocalWP, pushed to staging/production).
- **Parent theme:** **GeneratePress** (lightweight, developer-oriented, clean
  hook system, strong Core Web Vitals). Do NOT edit the parent theme.
- **All custom work lives in the child theme `myathletik-child`:**
  ```
  myathletik-child/
    ├── style.css        ← all custom styles
    ├── functions.php    ← enqueue, custom functions, block registration
    ├── templates/       ← page templates / template parts
    └── assets/          ← images, js, fonts
  ```
- **No Kadence, no Spectra, no other page-builder plugin.** (Previous plan
  assumed Kadence + Spectra; that is REVERSED — this is now a code-first build.)
- **No heavy CSS framework** (no Bootstrap/Tailwind). Write clean, scoped,
  commented CSS in the child theme. Use CSS custom properties (variables) for
  the design tokens (colors, spacing, type scale) defined once at `:root`.
- **No build step** unless explicitly introduced. Plain PHP templates + CSS +
  light vanilla JS. Server-rendered WordPress, not a SPA.
- **Version control: Git.** The child theme is a git repo. Every AI-made change
  is reviewable as a diff and revertable. Commit in small, logical units.

### Local/staging workflow
- Develop on **LocalWP** (Windows). Site files live at
  `…\Local Sites\<site>\app\public\`; child theme at
  `wp-content\themes\myathletik-child\`.
- Open the **child theme folder** in VS Code so Claude Code / Codex operate
  directly on these files.
- Changes flow: LocalWP (dev) → staging → production. Never assume direct
  production edits.

## 2. Information architecture

The rebuild reorganizes the site around search intent. Target structure:

- **Home**
- **Products** (hub) → category landing pages. Keep the EXISTING categories
    (no new sport-specific categories added at this stage):
  - Knitted Fabrics
  - Sports Accessories
  - Outdoor Clothing
  - Sportswear
  - Underwear
  - Merino Wool Apparel
  - Silk Wear
- **Capabilities / Production** → Factory, Equipment, Vertical Integration
- **Services / Process** → Sampling & Prototyping, Bulk Production, QC,
  Export & Shipping  (differentiation vs. Hongyu — the user's export
  documentation experience is a selling point here)
- **Sustainability** (note: fix the misspelled "Sustainabilty" slug — see §3)
- **About Us** → company, the four factories, regional merchandiser teams
  (North America / Europe / Nordics)
- **Contact** (with an inquiry form: budget tier + order quantity fields to
  filter out sub-MOQ leads)

### Positioning (drives all content decisions)
- Audience: **mid-sized B2B buyers** (brands/wholesalers placing technical knit
  orders), NOT startups doing tiny runs.
- MOQ ~500 pieces. Frame the site as a **technical manufacturing partner**, not
  a startup hand-holding service. (This is the key contrast vs. competitors like
  Hongyu Apparel, who target startups / low MOQ.)
- Differentiators to emphasize: vertical integration, flatlock/activeseam
  technical construction, Carbondry finishing, laser perforation, full export
  documentation capability, four factories, regional merchandiser coverage.

## 3. URL & SEO rules (SEO landmines — strictest section)

- **Never change an existing indexed URL without a 301 redirect.** The domain
  has existing search equity; broken/changed URLs without redirects throw it away.
- **URL convention for category pages: top-level, keyword-aligned slugs**
  (the "manufacturer" pattern, matching how B2B buyers search). Category pages
  move OUT of the `/products/` hierarchy to the top level. Example:
  `/products/sportswear/` → `/sportswear-manufacturer/`.
- **Auxiliary / structural pages stay in their hierarchy** (clearer site
  structure, these aren't primary search-traffic targets): `/production/`,
  `/factory/`, `/equipments/`, `/about-us/`, `/contact/`, etc. keep their paths.

### Required 301 redirect map (old indexed URL → new top-level URL)
Every category page that moves MUST have a 301. Add these to redirects when the
new pages go live:

| Old URL                              | New URL                                  |
|--------------------------------------|------------------------------------------|
| `/products/knitted-fabrics/`         | `/knitted-fabrics-manufacturer/`         |
| `/products/sports-accessories/`      | `/sports-accessories-manufacturer/`      |
| `/products/outdoor-clothing/`        | `/outdoor-clothing-manufacturer/`        |
| `/products/sportswear/`              | `/sportswear-manufacturer/`              |
| `/products/underwear/`               | `/underwear-manufacturer/`               |
| `/products/merino-wool-apparel/`     | `/merino-wool-manufacturer/`             |
| `/products/silk-wear/`               | `/silk-wear-manufacturer/`               |
| `/products/` (hub)                   | keep as `/products/` overview, or 301 to home — decide |

  【确认: 上面的新slug措辞可调。比如 merino-wool-manufacturer 也可写成
   merino-wool-apparel-manufacturer,看你想命中的搜索词。告诉我就改】

- **Auxiliary pages — preserve or 301:**
  - `/production/`, `/factory/`, `/equipments/` — keep
  - `/sustainabilty/` ← **misspelled.** If corrected to `/sustainability/`,
    you MUST 301 the old slug to the new one.
  - `/about-us/`, `/contact/` — keep
- Every page needs: a unique <title>, a meta description, one H1 only, logical
  H2/H3 hierarchy, and descriptive image alt text (real keywords, not filenames).
- When you delete or merge a page, output the 301 mapping explicitly so it can
  be added to redirects.

## 4. Known issues to fix during rebuild (cleanup checklist)

- [ ] Replace stock photography (Unsplash/Pexels) with **real factory/product
      photos.** The current "Trusted Factory Partners" image is a Hyundai stock
      photo — must go. Real phone-shot factory images beat polished stock here.
- [ ] Remove leftover test/demo links: footer `Contact_example` (`/contact-2/`).
- [ ] Fix dead social icon links (currently point to `#` / empty).
- [ ] Fix the `Sustainabilty` spelling (slug + nav label) — with 301.
- [ ] The 30+ untitled, unlinked product images on the home page: regroup by
      category, add titles/alt text, and link each cluster to its category page.

## 5. Brand voice & copy rules

- Language: **English**, written for North American / European B2B buyers.
- **The user writes all long-form body copy.** Do NOT auto-generate or
  ghost-write page body content, product descriptions, or marketing paragraphs
  unless explicitly asked. The agent's job here is structure, blocks, code,
  layout, headings/labels, alt text, and cleanup — not authoring prose. When a
  content slot is empty, insert a clearly marked placeholder
  (`【CONTENT: user to write】`) rather than filling it in.
- Tone (for the headings/labels/microcopy agents DO write): technical,
  confident, specific. Avoid startup-pitch warmth; this is a manufacturer
  talking to professional buyers.
- Do not invent facts, certifications, capacity numbers, or client names. If a
  factual detail is needed and unknown, insert a `【NEEDS INPUT: ...】` placeholder
  rather than fabricating.

## 6. Terminology — spelling consistency reference

The user writes long-form copy themselves. Agents should NOT auto-generate or
translate body content. This list exists only so that when an agent edits small
bits of text, fixes alt text, or generates headings/labels, it spells these
technical terms the same way the user does:

- FLATLOCK (flatlock seam / flatlock stitch)
- ACTIVESEAM
- SELF FABRIC
- SCREENPRINT (one word, as used in spec sheets)
- COVERSTITCH, OVERLOCK
- Carbondry (finishing) — capital C, one word
- Laser perforation
- Merino wool
- Vertically integrated OEM
- MOQ (Minimum Order Quantity)
- Tech pack / spec sheet

## 7. When in doubt

- Structural/IA changes, URL changes, or anything touching SEO → pause and ask.
- Pure content additions to an existing page → proceed, follow §5 and §6.
- New custom code → child theme `myathletik-child` only; never the GeneratePress
  parent, core, or plugins. Write clean commented PHP/CSS, use CSS variables for
  tokens, commit as a reviewable git diff.
- Generating multiple pages → produce them from a shared template part so
  structure and heading hierarchy stay consistent across pages.
- Prefer small, reviewable changes over large sweeping rewrites (the extension
  diff/review flow is the safety net — keep diffs digestible).
