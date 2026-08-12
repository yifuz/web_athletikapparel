---
name: wp-page-template-builder
description: >
  Generate consistent page templates and template parts for myathletik-child,
  especially the 7 category landing pages (/sportswear-manufacturer/,
  /underwear-manufacturer/, etc.) and other pages from a shared template part
  so heading hierarchy, block order, and SEO structure stay consistent. Per
  AGENTS.md §7: "Generating multiple pages → produce them from a shared
  template part so structure and heading hierarchy stay consistent." Use
  whenever the user asks to 创建页面 / 生成页面 / 批量生成 / 建模板 / category
  页 / 落地页, or says "create a page", "build the category pages", "generate
  the manufacturer pages", "new template", "page template for", "landing page",
  or when scaffolding any new page type. Trigger on 7 个 manufacturer 页 /
  产品分类页 / 子页面 / 共享模板 too.
---

# wp-page-template-builder — Consistent Page Templates from Shared Parts

AGENTS.md §7: *"Generating multiple pages → produce them from a shared template
part so structure and heading hierarchy stay consistent across pages."*

This skill scaffolds pages from a **shared template part** so every page of the
same type has identical structure, only different content.

## Source-of-truth (read first)

- `docs/sitemap.md` — every page's URL, H1, target keyword, block outline.
- `seo-tags.md` — the SEO Title / Meta Description per page.
- `docs/site/design-brief.md` — block order and visual direction for the homepage.

## Current state

**Before scaffolding, ALWAYS verify current state** — read `docs/sitemap.md`
(§9 lists category page status) and `docs/progress.md`, then `ls` the theme
root for existing `page-*-manufacturer.php` files. Don't re-create finished work.

As of 2026-07-04:
- All **7 manufacturer pages are DONE** (`sportswear`, `underwear`,
  `outdoor-clothing`, `merino-wool`, `silk-wear`, `knitted-fabrics`,
  `sports-accessories`). Each is a thin slug-based stub calling the shared
  `template-parts/product-category/page.php` part with a `category_slug` arg.
- Data layer `inc/product-category-data.php` has complete entries (H1, intro,
  what_we_make, construction, gallery, related links) for all 7.
- Open work per `progress.md`: Rank Math meta title/description per page
  (hand-off to user), final image review, 301s (→ `wp-redirect-guard`).

Other existing page templates (theme root):
- `front-page.php` — home
- `page-about-us.php`, `page-contact.php`, `page-services.php`,
  `page-sustainability.php` — full sub-page templates

Existing template parts:
- `template-parts/home/*.php` — homepage blocks
- `template-parts/product-category/page.php` — **the shared part** for category
  pages. Read this first when working on category pages.

This skill's job now is mostly: extending a category page (new section),
adding a NEW page type (not a manufacturer page), or auditing/verifying the
existing manufacturer pages' structure. For rebuilding one from scratch,
follow the workflow below.

## The shared-part pattern

For pages of the same type (e.g. all 7 manufacturer pages), do NOT duplicate
full-page markup 7 times. Instead:

1. **One shared template part** holds the structure.
2. **Each page template** is a thin wrapper that sets up data and calls the part.
3. **Per-page data** (H1, intro, product list, specs) comes from a data file
   or `get_post_meta()` / custom fields, not from copy-pasted HTML.

Existing example: `template-parts/product-category/page.php` +
`inc/product-category-data.php` (data layer) is exactly this pattern. Reuse it.

### Stub template structure (slug-based auto-apply, NOT Template Name)

WordPress auto-applies `page-{slug}.php` for a page with that slug — so the
manufacturer stubs need **no `Template Name` header**. Example real stub
(`page-sportswear-manufacturer.php`, ~280 bytes):

```php
<?php
/** Sportswear Manufacturer page (auto-applied by slug: /sportswear-manufacturer/). */
get_header();
get_template_part(
    'template-parts/product-category/page',
    null,
    array( 'category_slug' => 'sportswear-manufacturer' )
);
get_footer();
```

The stub's job: pass the right `category_slug` → render the shared part.
Nothing else. Don't add a `Template Name` header unless the user explicitly
wants a manually-assignable custom template (e.g. for a non-slug-matched page).

## Build workflow

### 1. Before scaffolding, confirm with the user

- Which page(s) to build.
- The single H1 per page (from `docs/sitemap.md`).
- The block outline (from `docs/sitemap.md`'s per-page "Block outline").
- Which content slots are real copy (user will write) vs. structure (you build).

### 2. Decide data source

Per category page, the data is:
- Slug (e.g. `sportswear-manufacturer`)
- H1 (e.g. "Sportswear Manufacturer")
- SEO Title + Meta Description (from `seo-tags.md`)
- Intro paragraph (use approved copy, draft it only with explicit user
  authorization, or insert `【CONTENT: user to write】`)
- Product sub-categories / specs (from user)
- Images (real factory/product photos only)

Put this data in `inc/product-category-data.php` as a structured array, OR use
WP custom fields / ACF if installed. Don't hardcode HTML in 7 templates.

### 3. Build the shared part

`template-parts/product-category/page.php` should render:
1. Breadcrumbs (Home → Products → <Category>)
2. `<h1>` — single, from data
3. Intro paragraph slot (placeholder until user writes)
4. Product/spec grid
5. Capability/differentiator strip
6. CTA (Contact / Get a Quote)
7. Cross-links to sibling category pages

Use `--ma-*` tokens throughout (see `wp-design-polish` skill). Vertical padding
`var(--ma-section-y)`. Container `var(--ma-container)`.

### 4. Heading hierarchy (SEO-critical)

Every category page:
- **One `<h1>`** — the category name + "Manufacturer" or the H1 from sitemap.md.
- `<h2>` for major sections (Products, Capabilities, Process, FAQ if any).
- `<h3>` for sub-items within an H2 section.
- No skipped levels.

### 5. Wire up the page in WordPress

- Template Name header in the PHP file → user assigns in Page Attributes.
- OR auto-assign via `template_include` filter keyed on slug.

### 6. SEO meta (hand-off)

After structure is built, the user fills SEO Title + Meta Description in Rank
Math (per `seo-tags.md`). Don't hardcode `<title>` in the template — that's
Rank Math's job.

## Sub-page templates (non-category)

For one-off pages (`/about-us/`, `/contact/`, `/services/`, `/sustainability/`),
full templates already exist. When extending:
- Read the existing template before adding sections.
- Reuse existing template parts where possible.
- For repeatable blocks (e.g. the CTA band), extract a shared partial in
  `template-parts/` rather than duplicating.
- Keep heading hierarchy consistent across these pages too.

## Output format

When scaffolding:
```
## Page Template — <name>

### Source of truth
- H1: <from sitemap.md>
- SEO Title/Meta: <from seo-tags.md>
- Block outline: <from sitemap.md>

### Files to create / edit
1. <path> — <purpose>
2. <path> — <purpose>

### Shared part
<PHP snippet>

### Data layer entry
<PHP array entry for inc/product-category-data.php>

### Content slots needing user copy
- <slot>: `【CONTENT: user to write】`
- <slot>: `【NEEDS INPUT: ...】`

### Heading hierarchy
H1: <text>
  H2: <section>
    H3: <sub>
```

## Rules

- **One shared template part per page type.** Don't copy-paste structure across
  siblings.
- **One `<h1>` per page.** (SEO rule, see `wp-seo-audit`.)
- **Body copy requires explicit authorization.** Use approved copy or draft
  only the scope the user explicitly requests; otherwise insert
  `【CONTENT: user to write】` (AGENTS.md §5).
- **No invented facts** (certifications, capacities, client names). Insert
  `【NEEDS INPUT: ...】` for unknown factual fields (AGENTS.md §5).
- **Use `--ma-*` tokens** for all visual values (see `wp-design-polish`).
- **Wire SEO meta via Rank Math / `seo-tags.md`** — don't hardcode `<title>`.
- Small, reviewable diffs. When building 7 pages at once, do them as a sequence
  of small commits, not one mega-commit.
