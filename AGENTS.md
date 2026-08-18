> This is the canonical project instruction file for Codex. Full page
> structure and URL/SEO decisions are in `docs/sitemap.md` — read it before
> creating or restructuring pages.

---
name: myathletik-website
description: >
  Project rules for the Athletik Clothing website on athletikapparel.com.
  Athletik Clothing operates through the U.S. entity "Athletik Clothing Inc.",
  the China entity "Zhangjiagang Athletik Clothing Co., Limited", and the
  textile entity "Beta Textiles Co., Limited" as a vertically integrated OEM
  knitwear manufacturer specializing in FLATLOCK / ACTIVESEAM technical
  knitwear. This
  skill encodes the site's tech stack, information architecture, URL/SEO rules,
  brand voice, and terminology standards. Apply it on ANY task that creates or
  edits theme code, page content, blocks, CSS, or redirects for this site.
---

# Athletik Clothing — Website Project Rules

Read this file before writing any code, content, or block markup for this
project. These rules exist to protect the site's existing SEO equity and to
keep the rebuild consistent. When a task conflicts with these rules, stop and
flag it rather than silently overriding.

## 1. Tech stack (this is a CODE-FIRST project)

This site is rebuilt and maintained as a **code project**, not a visual
page-builder site. Codex is expected to do substantial work in
the theme code. Day-to-day layout/structure changes happen in code; only
routine text edits happen in the block editor.

- **Platform:** WordPress 7.0 (hosted on Flywheel; developed locally on
  LocalWP and deployed with Local Connect). GoDaddy is not part of the
  current hosting, email, or deployment stack.
- **Parent theme:** **GeneratePress** (lightweight, developer-oriented, clean
  hook system, strong Core Web Vitals). Do NOT edit the parent theme.
- **All custom work lives in the child theme `myathletik-child`:**
  ```
  myathletik-child/
    ├── style.css        ← all custom styles
    ├── functions.php    ← enqueue, custom functions, block registration
    ├── templates/       ← page templates / template parts
    └── assets/          ← js, fonts, .gitkeep (NOT images — see §1.6)
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
- Open the **child theme folder** in VS Code so Codex operates
  directly on these files.
- Changes flow: LocalWP (dev) → staging → production. Never assume direct
  production edits.

### 内部 Markdown 文档语言

- 新建或实质性改写的内部 `.md` 文档默认使用**简体中文**，包括标题、说明、状态、计划、审计结论和操作记录。
- 下列内容保留原生英文，不做机械翻译：正式网站英文文案、已核准的 title / H1 / meta、固定测试提示词、原始引文或来源摘录、代码/API/Schema/事件名、URL、路径、命令、字段名、法律实体名与其他专有名称。
- 用户明确要求英文，或文档本身就是待上线的英文正文/英文源材料时，继续使用英文。
- 既有英文历史资料不要求仅为语言统一而批量翻译；但以后更新内部叙述时，新增内容应使用中文。
- 本规则只适用于内部项目文档；网站对外文案仍按第 5 节使用面向北美和欧洲 B2B 买家的英文。

## 1.6 Image storage — images live in uploads, NOT in the theme/git repo

> **READ THIS BEFORE TOUCHING ANY IMAGE.** This is the #1 source of bugs
> for agents new to this project. The image pipeline is non-obvious and
> putting a file in the wrong place will silently produce a 404.

**As of 2026-07-09, all images were migrated OUT of the theme directory and
OUT of the git repo.** Reasons: the repo had grown to 259 MB of image blobs;
git history was rewritten to strip them (`.git` is now <1 MB). Images are no
longer version-controlled — they are bulk assets, not code.

### Where images physically live

```
app/public/wp-content/uploads/myathletik-theme/assets/images/<category>/
```

The on-disk directory tree is **identical** to the old theme-relative layout
(`sportswear/`, `production/`, `audit&certificates/`, `主图/`, `辅图/`,
`brand-partner/`, etc.) — only the root changed from the theme to uploads.
Existing categories include:

| Folder | Contents |
|--------|----------|
| `sportswear/` `underwear/` `outdoor clothing/` `merino wool product/` `silkwear/` `knitted fabrics/` `sports accessories/` | Product photos per category |
| `production/` | Factory / workshop / machinery photos |
| `主图/` `辅图/` | Homepage hero & supporting visuals (Chinese folder names, URL-encoded in code) |
| `audit&certificates/` `sustainable/` | Certification badges, sustainability material swatches |
| `brand-partner/` | Client logo wall — **scanned at runtime by `client-logos.php`** (do not rename) |

### The single rule: put images in uploads, NEVER in the theme

- **Any new or regenerated image goes into the matching `uploads/.../images/<category>/` folder.** Period.
- **Do NOT put images in `themes/myathletik-child/assets/images/`.** That folder is `.gitignore`d (only a `.gitkeep` is tracked) and, critically, images placed there **will not load** — see the URL-rewrite mechanism below. The theme folder stays empty.
- Use ASCII filenames (lowercase, hyphenated, e.g. `flatlock-detail-01.jpg`). Chinese/space/uppercase names work but invite URL-encoding bugs; prefer ASCII for new files.

### How URLs work — why a file in the theme folder 404s

Code references images using the theme-relative path, exactly as before:
```php
$image = get_stylesheet_directory_uri() . '/assets/images/sportswear/photo.jpg';
```
This emits a URL pointing at the **theme** directory. But `functions.php`
registers an output buffer (`myathletik_start_image_url_buffer`, hooked on
`template_redirect`) that rewrites every `…/themes/myathletik-child/assets/images/…`
URL in the final HTML to `…/uploads/myathletik-theme/assets/images/…`. So:

- File in uploads → URL rewritten to uploads → **loads ✓**
- File in theme → URL rewritten to uploads (where it doesn't exist) → **404 ✗**

Therefore the **code path never changes** — keep writing
`get_stylesheet_directory_uri() . '/assets/images/…'`. The buffer handles
the redirect. The only file you must not edit blindly is the buffer itself
or the `myathletik_images_uri()` / `myathletik_images_dir()` helpers in
`functions.php`.

### The two helpers in functions.php

For the rare case where code needs the real location (not a rewritten URL):
- **`myathletik_images_uri()`** → public URL to uploads image dir (for building `<img src>`).
- **`myathletik_images_dir()`** → filesystem path to uploads image dir (for `glob()`/`scandir()`).
  Used by `template-parts/home/client-logos.php` to scan the brand logo folder.

For normal `<img>` output, keep using `get_stylesheet_directory_uri()` and let the buffer rewrite it — no need to call the helpers.

### Deploying images (uploads is not in git)

Because uploads is outside the repo, `git push` does NOT carry images. When
syncing to staging/production, transfer `uploads/myathletik-theme/` separately
(FTP/SCP the whole folder, or use WP Migrate / All-in-One WP Migration). Plan
for this on every environment sync.

## 2. Information architecture

The rebuild reorganizes the site around search intent. Target structure:

- **Home**
- **Products hub:** the homepage product section at
  `/#ma-home-categories-title` links to the category landing pages. A separate
  `/products/` page is not built in the current phase. Keep the EXISTING
  categories (no new sport-specific categories added at this stage):
  - Knitted Fabrics
  - Sports Accessories
  - Outdoor Clothing
  - Sportswear
  - Underwear
  - Merino Wool Apparel
  - Silk Wear
- **Capabilities / Production:** no standalone `/production/`, `/factory/`, or
  `/equipments/` pages in the current phase. Capability proof lives on the
  homepage and product category pages.
- **Services / Process:** one `/services/` overview contains Sampling &
  Prototyping, Bulk Production, QC, and Export & Shipping. The four originally
  planned service sub-pages are cancelled.
- **Sustainability:** the current `/sustainability/` slug is correct. No
  historical redirect is implemented. The owner explicitly excluded the
  legacy domain from redirect/migration work on 2026-08-08.
- **About Us** → company, own production facility / vertical integration,
  regional coverage. Do not disclose factory count or subcontracting.
- **Contact** (with an inquiry form: product category, estimated order
  quantity, business type, company details, and project message to filter out
  sub-MOQ leads)

### Positioning (drives all content decisions)
- Audience: **mid-sized B2B buyers** (brands/wholesalers placing technical knit
  orders), NOT startups doing tiny runs.
- MOQ 500 pieces per style. Frame the site as a **technical manufacturing partner**, not
  a startup hand-holding service. (This is the key contrast vs. competitors like
  Hongyu Apparel, who target startups / low MOQ.)
- Differentiators to emphasize: vertical integration, flatlock/activeseam
  technical construction, Carbondry finishing, laser perforation, full export
  documentation capability, own production facility, regional coverage.

### Entity naming and relationship

- **Public brand:** Athletik Clothing.
- **U.S. entity name:** Athletik Clothing Inc.
- **China entity name:** Zhangjiagang Athletik Clothing Co., Limited.
- **Textile entity name:** Beta Textiles Co., Limited (BTEXCO).
- The owner confirmed on 2026-08-10 that both Athletik entity names belong to the same Athletik
  business, while their operational responsibilities differ. Do not describe
  them as one legal entity, a parent/subsidiary pair, or interchangeable legal
  names unless the owner supplies that exact legal relationship.
- The owner confirmed on 2026-08-18 that Beta Textiles Co., Limited is also a
  business entity within the same operation. Its `performancefabrics.com`
  materials may be treated as first-party capability evidence. Keep the public
  relationship broad unless the owner supplies the exact legal and operational
  split; do not call it a parent, subsidiary, or sister company in public copy.
- Current confirmed public roles are limited to: Athletik Clothing Inc. is the
  U.S. entity and the website privacy data controller; Zhangjiagang Athletik
  Clothing Co., Limited is the China entity and the name shown for the China
  production facility. If content needs a more detailed responsibility split,
  use `【NEEDS INPUT: confirm U.S./China entity responsibility】` rather than
  inventing sales, contracting, manufacturing, export, employment, or IP roles.
- Keep the public brand distinct from all entity names. A page may name the
  relevant jurisdictional entity, but should not silently replace the public
  brand with that entity name.

## 3. URL & SEO rules (SEO landmines — strictest section)

> **Status correction (2026-08-10): `myathletik.com` has been fully taken
> offline without redirects by explicit owner decision; all checked public
> endpoints and host variants return HTTP 410.** It remains out
> of scope; focus SEO/GEO work on `https://www.athletikapparel.com/`. Any later
> legacy-domain citation is a stale search/AI cache signal, not a reason to
> restore or optimize the old site.

- **Never change a live, indexed URL without a 301 redirect.** Once this
  rebuild reaches production and pages start getting indexed, every subsequent
  URL change throws away search equity unless redirected. The owner's explicit
  no-redirect retirement decision for the separate legacy domain is a scoped
  exception and is not precedent for current canonical-site URL changes.
- **URL convention for category pages: top-level, keyword-aligned slugs**
  (the "manufacturer" pattern, matching how B2B buyers search). Category pages
  move OUT of the `/products/` hierarchy to the top level. Example:
  `/products/sportswear/` → `/sportswear-manufacturer/`.
- **Auxiliary / structural pages stay in their hierarchy** (clearer site
  structure, these aren't primary search-traffic targets): `/production/`,
  `/factory/`, `/equipments/`, `/about-us/`, `/contact/`, etc. keep their paths.

### Legacy-domain redirects — OUT OF SCOPE (owner decision)

These category pages were originally planned to move from `/products/<x>/` to
top-level `/<x>-manufacturer/` with a 301. The legacy site now returns 410, and
the owner decided on 2026-08-08 not to create cross-domain redirects. Do not
inventory, implement or propose these mappings unless that decision is later
reopened:

| Candidate legacy URL                | Current canonical URL                    | Status |
|--------------------------------------|------------------------------------------|--------|
| `/products/knitted-fabrics/`         | `/knitted-fabrics-manufacturer/`         | NOT PLANNED |
| `/products/sports-accessories/`      | `/sports-accessories-manufacturer/`      | NOT PLANNED |
| `/products/outdoor-clothing/`        | `/outdoor-clothing-manufacturer/`        | NOT PLANNED |
| `/products/sportswear/`              | `/sportswear-manufacturer/`              | NOT PLANNED |
| `/products/underwear/`               | `/underwear-manufacturer/`               | NOT PLANNED |
| `/products/merino-wool-apparel/`     | `/merino-wool-manufacturer/`             | NOT PLANNED |
| `/products/silk-wear/`               | `/silk-wear-manufacturer/`               | NOT PLANNED |
| `/products/`                         | `/#ma-home-categories-title` or a future hub | NOT PLANNED |

- **Auxiliary-page decisions:**
  - `/production/`, `/factory/`, `/equipments/` — not built in the current phase
  - `/sustainabilty/` ← **misspelled.** Already corrected to `/sustainability/`
    in this rebuild. No legacy-domain redirect is planned.
  - `/about-us/`, `/contact/` — keep
- Every page needs: a unique <title>, a meta description, one H1 only, logical
  H2/H3 hierarchy, and descriptive image alt text (real keywords, not filenames).
- When you delete or merge a page, output the 301 mapping explicitly so it can
  be added to redirects.

## 4. Rebuild cleanup checklist — completed

- [x] Remove live stock photography and replace it with approved
      factory/product/campaign visuals. Inactive fallback gallery data may
      still contain Unsplash filenames but does not render on current pages.
- [x] Remove leftover test/demo footer links such as `Contact_example`.
- [x] Fix Instagram, YouTube, and WhatsApp links.
- [x] Fix the `Sustainabilty` spelling in the live URL and navigation; no
      historical 301 was needed.
- [x] Regroup homepage product imagery by category and connect cards/sections
      to the corresponding category pages.

## 5. Brand voice & copy rules

- Language: **English**, written for North American / European B2B buyers.
- **Agents may draft long-form body copy only when the user explicitly asks or
  authorizes them to do so.** A scoped request to write, draft, rewrite or
  translate specific content is authorization for that content. Without such
  authorization, limit work to structure, blocks, code, layout,
  headings/labels, alt text and cleanup, and use `【CONTENT: user to write】` for
  empty prose slots. Agent-written long-form copy must be clearly treated as a
  draft, grounded in approved facts and sources, and reviewed and approved by
  the owner before publication.
- Tone (for all agent-written text): technical,
  confident, specific. Avoid startup-pitch warmth; this is a manufacturer
  talking to professional buyers.
- Do not invent facts, certifications, capacity numbers, or client names. If a
  factual detail is needed and unknown, insert a `【NEEDS INPUT: ...】` placeholder
  rather than fabricating.

## 6. Terminology — spelling consistency reference

Agents may draft or translate body content only under the explicit-authorization
rule in §5. In all authored or edited text, spell these technical terms the same
way the user does:

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

- **Adding/swapping/regenerating ANY image → re-read §1.6 first.** Images go
  in `uploads/myathletik-theme/assets/images/`, NOT the theme folder. Code
  paths stay theme-relative; the output buffer rewrites them. Putting a file
  in the theme folder = guaranteed 404.
- Structural/IA changes, URL changes, or anything touching SEO → pause and ask.
- Pure content additions to an existing page → proceed, follow §5 and §6.
- New custom code → child theme `myathletik-child` only; never the GeneratePress
  parent, core, or plugins. Write clean commented PHP/CSS, use CSS variables for
  tokens, commit as a reviewable git diff.
- Generating multiple pages → produce them from a shared template part so
  structure and heading hierarchy stay consistent across pages.
- Prefer small, reviewable changes over large sweeping rewrites (the extension
  diff/review flow is the safety net — keep diffs digestible).
