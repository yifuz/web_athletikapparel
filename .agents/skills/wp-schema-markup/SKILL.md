---
name: wp-schema-markup
description: >
  Generate and inject JSON-LD structured data for the myathletik-child theme.
  Covers Organization, WebSite, BreadcrumbList, Product/Service, FAQPage,
  Article, and LocalBusiness (manufacturer) schemas. Output is server-rendered
  via wp_head / wp_footer hooks in functions.php — no plugin. Use whenever the
  user asks to 加 schema / 结构化数据 / JSON-LD / 富媒体摘要 / rich results,
  or says "add schema", "structured data", "JSON-LD for", "schema for this
  page", "rich snippets", "schema.org", or when a page type that should have
  schema (product category, FAQ, breadcrumb) is missing it. Trigger on 面包屑
  schema / FAQ schema / 组织 schema / 产品 schema too.
---

# wp-schema-markup — JSON-LD Structured Data (server-rendered, no plugin)

This project renders schema server-side via `wp_head` / `wp_footer` hooks in
`functions.php`. **No SEO plugin is required** for schema (Rank Math may be
present for title/meta — see `seo-tags.md` — but schema is hand-coded so it
stays reviewable in git).

## Schema map (what each page type gets)

| Page / template                      | Schema types                          |
|--------------------------------------|---------------------------------------|
| Site-wide (`wp_head`)                | `Organization`, `WebSite` (with SearchAction) |
| All pages with breadcrumbs           | `BreadcrumbList`                      |
| Category landing `*-manufacturer/`   | `Service` or `Product` (manufacturer service) |
| Home `/`                             | + `Organization` (already in site-wide) |
| FAQ sections (if present)            | `FAQPage`                             |
| Approved technical guide / blog post | `Article`                             |
| Technical Guides hub                 | `CollectionPage`, `ItemList`          |
| Contact `/contact/`                  | `LocalBusiness`/`Organization` with contactPoint |

Confirm against `docs/sitemap.md` for the canonical page list.

## Canonical site-wide facts (use these, don't invent)

- **U.S. entity:** Athletik Clothing Inc.
- **China entity:** Zhangjiagang Athletik Clothing Co., Limited
- **Brand / public name:** Athletik Clothing (used in `<title>` brand suffix)
- **Domain:** https://www.athletikapparel.com/
- **Business type:** Vertically integrated OEM knitwear manufacturer
- **Specialties:** flatlock, activeseam, self-fabric, Carbondry finishing,
  laser perforation, merino wool
- **MOQ:** 1,000 pieces per style
- **Audience:** mid-sized B2B buyers, regional merchandiser teams
  (North America / Europe / Nordics)

**Never invent** certifications, factory counts, founding year, client names,
or capacity numbers. If a schema field needs such a fact and it's unknown,
omit the field or insert `【NEEDS INPUT: ...】` and ask the user.
Keep the public Organization distinct from both jurisdictional entity names.
Do not combine a U.S. `legalName` with the China production address in one
Organization entity or infer the remaining responsibility split.

## Implementation pattern

### 1. Site-wide Organization + WebSite (in `wp_head`)

```php
add_action( 'wp_head', function () {
    $home = esc_url( home_url( '/' ) );
    $org = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Athletik Clothing',
        'url'      => $home,
        'logo'     => esc_url( get_stylesheet_directory_uri() . '/assets/images/辅图/cropped-ATHLETIK_R_512.jpg' ),
        'description' => 'Vertically integrated OEM knitwear manufacturer specializing in flatlock and activeseam technical knitwear.',
        // sameAs: populate with REAL profile URLs only. Verified 2026-08-10:
        // LinkedIn, Instagram and YouTube are the approved entity profiles.
        'sameAs'   => [
            'https://www.linkedin.com/company/111831319/',
            'https://www.instagram.com/athletikclothinginc/',
            'https://www.youtube.com/@athletikclothinginc',
        ],
    ];
    $site = [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'url'      => $home,
        'name'     => 'Athletik Clothing',
        'publisher'=> [ '@id' => $home . '#org' ],
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => $home . '?s={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ];
    echo '<script type="application/ld+json">'
       . wp_json_encode( $org ) . '</script>';
    echo '<script type="application/ld+json">'
       . wp_json_encode( $site ) . '</script>';
} );
```

(Adjust the logo path — the assets folder uses a Chinese subfolder `辅图`,
URL-encoded in `functions.php`. Match the existing convention.)

### 2. BreadcrumbList (per page)

For each category/landing page, emit a `BreadcrumbList` mapping the trail:
`Home → Products → <Category>`. Reuse the slug from the current page; do not
hardcode URLs — use `home_url()` + the known slug from `docs/sitemap.md`.

### 3. Service schema for category pages

```php
[
    '@context' => 'https://schema.org',
    '@type'    => 'Service',
    'name'     => '<Category> Manufacturing — Athletik Clothing',
    'provider' => [ '@id' => home_url( '/' ) . '#org' ],
    'serviceType' => '<Category> OEM manufacturing',
    'areaServed'  => [ 'Global', 'North America', 'Europe', 'Nordics' ],
    'url'       => get_permalink(),
]
```

Use `Service` (not `Product`) for the `-manufacturer/` pages — they sell a
manufacturing service, not a SKU. Reserve `Product` for actual SKU pages if
they're ever added.

### 4. FAQPage

Only if the page actually has FAQ content visible in the HTML. Mirror the
on-page Q&A exactly — Google penalizes mismatched FAQ schema. Each `Question`
must have an `acceptedAnswer` `Answer` with `text` matching the on-page answer.

### 5. Article

For approved technical guides and single blog posts. Include `headline`,
`datePublished`, `dateModified`, `image`, `publisher` (@id reference to Org),
and an `author` that matches the visible byline. The author may be a real
`Person` or the public `Organization`; never invent a Person identity merely to
fill the field.

### 6. Technical Guides hub

Use `CollectionPage` for `/technical-guides/` and add an `ItemList` containing
only owner-approved, publicly visible guides. Draft briefs must not appear in
the ItemList. The visible hub cards and JSON-LD list must use the same titles
and URLs.

## Validation

After generating schema, the user should validate via:
- https://search.google.com/test/rich-results
- https://validator.schema.org/

Mention these. Don't claim schema is "correct" without external validation.

## Output format

When adding schema:
```
## Schema — <page or site-wide>

### Schemas to add
1. <@type> — <where: wp_head / template> — <fields>

### Code
<PHP snippet to drop into functions.php or template>

### Fields needing user input
- <field> — why it's needed — `【NEEDS INPUT: ...】`

### Validate at
- Rich Results Test: <url>
- Schema Validator: <url>
```

## Rules
- **Server-rendered JSON-LD via `wp_*` hooks.** No microdata scattered in
  templates (harder to maintain). No plugin.
- **Never invent facts.** Omit unknown factual fields rather than fabricate.
- **Mirror visible content.** FAQ/Article schema must match what's on the page.
- **SameAs only with real URLs.** Verify current state before populating
  `sameAs`. As of 2026-08-10, the approved profiles are LinkedIn company
  `111831319`, Instagram `athletikclothinginc`, and YouTube
  `@athletikclothinginc`. Re-verify each session, since these can change.
- All output escapes properly: `esc_url`, `wp_json_encode`, `esc_html` as needed.
