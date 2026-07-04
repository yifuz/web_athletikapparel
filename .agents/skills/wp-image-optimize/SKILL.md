---
name: wp-image-optimize
description: >
  Image and media optimization for myathletik-child. Covers WebP/AVIF
  conversion, responsive srcset/sizes, native lazy loading, decoding hints,
  fetchpriority for LCP, compression, and image SEO (alt text, filenames,
  caption/figure semantics). Owns the "alt attribute" responsibility — the
  SEO-audit skill only checks presence, this one generates good alt text and
  implements the technical markup. Use whenever the user asks to 优化图片 /
  图片压缩 / WebP / 懒加载 / srcset / 响应式图片 / 图片 SEO / alt 属性,
  or says "optimize images", "convert to webp", "lazy load images", "responsive
  images", "image alt text", "compress images", "LCP image", or when adding
  images to templates / noticing large image payloads / replacing stock photos.
  Trigger on 首页那堆没标题的图 / 替换图片 / 图太多了 too.
---

# wp-image-optimize — Image & Media Optimization

This skill **owns alt text**. (`wp-seo-audit` only checks *whether* alt exists;
this skill writes good alt text and implements the technical markup.)

## Project context

- Images live in `assets/images/` — note the **Chinese subfolder `辅图`**
  (URL-encoded as `%E8%BE%85%E5%9B%BE` in `functions.php`).
- AGENTS.md §4: the home page has **30+ untitled, unlinked product images**
  that must be regrouped by category, given titles/alt, and linked.
- AGENTS.md §4: stock photography (Unsplash/Pexels, including the "Trusted
  Factory Partners" Hyundai stock image) must be replaced with real
  factory/product photos. Real phone-shot beats polished stock.
- Logo: `assets/images/辅图/cropped-ATHLETIK_R_512.jpg`.

## The four pillars

### 1. Format & compression
- **WebP** for photographic content (broad browser support, ~30% smaller).
- **AVIF** if you can produce it and the host supports it (even smaller,
  slightly less support — pair with WebP fallback).
- PNG only for transparency / sharp flat graphics. SVG for icons/logos.
- Target: photos ≤ 200KB at typical display size; hero ≤ 150KB.
- Tools to suggest (user runs these locally, this skill doesn't ship binaries):
  - `cwebp` / `avifenc` CLI
  - Squoosh.app (browser)
  - Imagick PHP extension (if server-side regeneration needed)
- WordPress 5.8+ creates WebP variants automatically when the server supports
  it — check if `wp_get_attachment_image()` emits `<source type="image/webp">`
  in `<picture>` (6.5+). If yes, lean on core; if not, manual conversion.

### 2. Responsive images (srcset + sizes)
**Always use `wp_get_attachment_image()`** rather than raw `<img src>`. WP core
auto-generates `srcset` and `sizes` from registered image sizes:

```php
echo wp_get_attachment_image(
    $attachment_id,
    'large',                 // default size
    false,
    [
        'loading'       => 'lazy',      // below-fold default
        'decoding'      => 'async',
        'alt'           => esc_attr( $alt ),
        // do NOT set fetchpriority here for non-LCP
    ]
);
```

If hardcoding `<img>` (e.g. in a static template part), include `srcset`,
`sizes`, `width`, `height` explicitly:

```php
<img
    src="<?php echo esc_url( $src ); ?>"
    srcset="<?php echo esc_attr( $srcset ); ?>"
    sizes="(max-width: 768px) 100vw, 50vw"
    width="800" height="600"
    loading="lazy"
    decoding="async"
    alt="<?php echo esc_attr( $alt ); ?>"
>
```

### 3. Lazy loading & LCP priority
- **Below-fold images:** `loading="lazy"` + `decoding="async"`.
- **LCP image (hero):** `loading="eager"` + `fetchpriority="high"` + preload
  via `wp_head`:
  ```php
  add_action( 'wp_head', function () {
      if ( is_front_page() ) {
          printf(
              '<link rel="preload" as="image" fetchpriority="high" href="%s">',
              esc_url( $hero_url )
          );
      }
  } );
  ```
- WP core auto-adds `loading="lazy"` to images, but it heuristically skips the
  first large image — **explicitly set the LCP image** so it's never lazy'd.
- Always include `width` and `height` (or CSS `aspect-ratio`) to prevent CLS.

### 4. Image SEO (alt text + filenames + semantics)

#### alt text rules
- **Describe the image** in real keywords (the category, the technique, the
  product). NOT the filename. NOT keyword stuffing.
- Good: `alt="Flatlock seam close-up on a merino wool base layer"`
- Bad: `alt="IMG_2048"`, `alt="photo"`, `alt="merino wool merino wool manufacturer"`
- Decorative images (purely visual, no information): `alt=""` (explicit empty,
  not omitted).
- Logos: `alt="Athletik Clothing logo"`.
- Don't duplicate the surrounding heading as alt — screen readers would read
  it twice.

#### Filenames
- Before upload: rename to descriptive slugs:
  `flatlock-seam-merino-base-layer.webp` (not `IMG_2048.webp`).
- Lowercase, hyphens, no spaces, no Chinese chars in filenames served to
  browsers (the existing `辅图` folder is an exception; new uploads should
  avoid non-ASCII paths).

#### Semantics
- Use `<figure>` + `<figcaption>` for images with captions.
- Don't put images inside `<a>` without accessible text — wrap a linked image
  in `<a aria-label="...">` or include alt that describes the link target.

## Home page image wall (specific task)

AGENTS.md §4 originally called out 30+ untitled unlinked product images.
**Status (verified 2026-07-04): the alt + linking work is DONE.** Both
`template-parts/home/product-categories.php` (7-card category grid) and
`template-parts/home/style-gallery.php` (marquee) already have:
- Descriptive, keyworded alt text on every `<img>` (real category terms, not
  filenames).
- Each card linked to its `*-manufacturer/` page.

**Before "fixing" missing alt here, VERIFY first** — grep the current template
for `alt=` before claiming alt is missing. The remaining real issues on these
images are technical, not SEO-text:
- No `width`/`height` (or `aspect-ratio`) → CLS risk.
- No `decoding="async"` → main-thread decode blocking.
- No `srcset`/`sizes` → oversize payloads on mobile.
- `style-gallery.php` multiplies the 26-image set ×3 = 78 images per page;
  review whether the multiplier is justified.
- No WebP variants.

The hero images (`template-parts/home/hero.php`) are a SEPARATE concern: their
`alt=""` is intentionally empty (wrapper is `aria-hidden`), but as the page's
most important visuals they forgo image-SEO equity — see `wp-seo-audit`
findings and author descriptive alts there.

Don't auto-generate marketing captions — those go to the user (AGENTS.md §5).

## Stock photo replacement workflow

When the user is ready to swap a stock image:
1. Identify the stock image (template + asset path).
2. Ask the user for the **real factory/product photo** replacement.
3. Optimize the replacement (WebP, resize to display size, compress).
4. Update the template's `<img>` (or `wp_get_attachment_image` call).
5. Write a real alt based on what the photo actually shows.
6. Commit as a small diff.

Don't suggest stock photo sources — AGENTS.md says no stock photography.

## Output format

```
## Image optimization — <page or section>

### Findings
- <image> — <issue: format/size/alt/lazy/srcset> — <fix>

### Suggested markup
<PHP or HTML snippet using --ma-* conventions and wp_get_attachment_image>

### Alt text proposed (real keywords)
- <image>: "<alt>"
- <image>: "<alt>"

### LCP / preload notes
- ...

### Conversions needed (user runs locally)
- <file> → WebP (target size)
```

## Rules
- **alt text comes from this skill.** Don't defer to other skills.
- **No stock sources.** Real photos only (AGENTS.md §4).
- **Use `wp_get_attachment_image()`** over raw `<img>` whenever there's an
  attachment ID, to get srcset for free.
- **Always include width/height** (prevents CLS).
- For images that are the page's LCP element, never lazy-load — preload instead.
