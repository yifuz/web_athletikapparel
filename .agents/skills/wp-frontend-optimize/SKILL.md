---
name: wp-frontend-optimize
description: >
  Frontend performance optimization for the myathletik-child GeneratePress theme.
  Covers CSS/JS enqueue tuning (defer/async, dependency order), lazy loading,
  font optimization (self-host vs Google Fonts, display=swap, preload, fallback
  fonts), critical above-fold CSS, preload hints, and removing render-blocking
  resources — all WITHOUT a build step (no webpack/vite). Use whenever the user
  asks to 优化前端性能 / 加速网站 / 提升加载速度 / Core Web Vitals / 性能优化,
  or says "speed up the site", "improve load time", "defer JS", "lazy load",
  "self-host fonts", "critical CSS", "render-blocking", or after noticing slow
  LCP / large CSS bundles / chained requests in templates or functions.php.
  Trigger on LCP / CLS / INP / FCP / TTFB mentions too.
---

# wp-frontend-optimize — Frontend Performance (no build step)

This project is **code-first, no build step** (AGENTS.md §1). All optimization
happens via `wp_enqueue_*` tuning, `functions.php` filters, server-side
template changes, and clean hand-written CSS. No webpack, no PostCSS, no
critical-CSS-injection plugin — propose only what works in plain WP+GP.

## Current baseline (already done — don't redo)

`functions.php` already:
- Enqueues parent (GeneratePress) → Google Fonts (Manrope) → child stylesheet,
  in that dependency order.
- Loads Manrope with `display=swap` and only weights 600/700/800.
- Adds `preconnect` for `fonts.googleapis.com` + `fonts.gstatic.com` (crossorigin).
- Versions child stylesheet by `filemtime()` (cache-busts on edit).

Confirm these are intact before suggesting changes.

## Optimization playbook (pick what applies, explain trade-offs)

### 1. Defer / async JavaScript
- Non-critical JS (analytics, third-party widgets) → `defer` or `async`.
- Use `script_loader_tag` filter to add `defer`/`async` per-handle:
  ```php
  add_filter( 'script_loader_tag', function ( $tag, $handle ) {
      $defer = [ 'myathletik-some-script', 'comment-reply' ];
      if ( in_array( $handle, $defer, true ) ) {
          return str_replace( ' src', ' defer src', $tag );
      }
      return $tag;
  }, 10, 2 );
  ```
- GeneratePress itself is lightweight; only touch what the child theme enqueues.

### 2. Lazy-load below-fold images
- Add `loading="lazy"` + `decoding="async"` to non-LCP `<img>` in templates.
- WordPress core auto-adds `loading="lazy"` for images ≥ 1000px wide since 5.5,
  but **explicitly mark the hero/LCP image** with `loading="eager"` /
  `fetchpriority="high"` so it's not lazy'd.
- Use `wp_get_attachment_image()` with explicit `$size` so WP emits `srcset` +
  `sizes` automatically.

### 3. Self-host fonts (recommended upgrade path)
Current Google Fonts via `<link>` works but: (a) costs 2 DNS lookups, (b) sends
user IP to Google. To self-host Manrope:
1. Download woff2 weights 600/700/800 from Google Fonts.
2. Put in `assets/fonts/`.
3. Add `@font-face` rules in `style.css` (top, before other rules).
4. Remove the `myathletik-google-fonts` enqueue.
5. Keep `preconnect` removed (no longer needed).
6. Add `<link rel="preload" as="font" type="font/woff2" crossorigin>` for the
   600 weight (used by H1) in `wp_head`.

### 4. Preload the LCP asset
For each page, identify the LCP element (usually hero image / H1 font) and:
- LCP image: `<link rel="preload" as="image" fetchpriority="high" href="...">`
  in `wp_head`, scoped to that page template.
- LCP font: preload the woff2 (see §3).

Don't preload everything — preload only the single LCP asset per template.

### 5. Critical above-fold CSS
Without a build tool, the pragmatic version:
- Inline the most above-fold-critical rules (header layout, hero, container,
  font-display) in a `<style>` block in `wp_head`.
- Keep the full stylesheet loaded normally afterwards.
- Use `--ma-*` tokens (defined in `:root` of `style.css`) — don't hardcode.
- Re-extract when the design changes; mark the inline block with a comment
  `<!-- CRITICAL CSS — sync with style.css :root + header + hero -->`.

### 6. CSS housekeeping
- Audit `style.css` for dead rules, duplicate selectors, overly broad selectors.
- Prefer scoped class names (`--ma-`-prefix or page-specific prefixes) over
  re-deep `main nav ul li a`-style chains.
- Don't import heavy frameworks (no Bootstrap/Tailwind — AGENTS.md §1).

### 7. Disable unused GeneratePress modules
GeneratePress loads modules on demand, but if any are enabled but unused
(WooCommerce, Back-to-Top, Off-canvas panel, etc.), disable them in
Appearance → GeneratePress. Mention this to the user — it's a Customizer
change, not a code change.

### 8. Server-side (flag, don't fix in code)
These need hosting config (GoDaddy / LocalWP) — call them out as
recommendations, not code edits:
- Page caching, object cache (Redis), Gzip/Brotli, HTTP/2 or HTTP/3, HSTS.
- `Cache-Control` headers for static assets (currently busted by `filemtime`).

## Output format

```
## Frontend Optimization — <page or whole site>

### Current state
- (what's already correct — list before proposing changes)

### Proposed changes (with trade-offs)
1. <change> — file:line — expected impact — trade-off
   ...

### Hosting/server recommendations (NOT code)
- ...

### Quick wins (≤ 30 min, low risk)
- ...

### Larger refactors (flag for user approval)
- ...
```

## Rules

- **No build step.** If a suggestion requires npm/webpack/PostCSS, reframe it
  as hand-written code or flag it as "needs user decision to add a build step".
- **Never edit the GeneratePress parent.** All changes via child theme
  `functions.php` filters, `style.css`, or template parts.
- **Don't break the `filemtime()` cache-bust** — keep it on the child stylesheet.
- Test proposed changes don't deprioritize the parent stylesheet (the child
  must always win cascade order via dependency, not `!important`).
