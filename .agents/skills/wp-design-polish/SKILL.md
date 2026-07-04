---
name: wp-design-polish
description: >
  Visual design polish for myathletik-child pages. Covers typography, color,
  spacing, layout, responsiveness, button/card styling, micro-animations,
  hover/focus states, and brand consistency — all driven by the --ma-* design
  tokens in style.css :root. Use whenever the user asks to 美化页面 / 调整排版 /
  改样式 / 优化视觉 / 配色调整 / 间距调整 / 响应式 / 按钮样式 / 卡片样式 /
  动画, or says "polish this section", "make this look better", "improve the
  visual design", "tune colors/spacing/typography", "this looks off",
  "align / center / pad", or after noticing hardcoded colors/sizes that bypass
  the token system. Trigger on 微调 / 视觉优化 / 不好看 / 风格统一 too.
---

# wp-design-polish — Visual Design Polish (token-driven)

This project uses a token-driven CSS system. **All visual values come from the
`:root` block at the top of `style.css`** (prefix `--ma-`). Polish means
*tuning tokens and using them consistently* — not hardcoding new values.

## Read these first

- `style.css` — the `:root` block (colors, type scale, spacing, layout).
  Read it before proposing any visual change.
- `docs/design-brief.md` — the visual direction (warm, technical-but-warm,
  anti-catalogue, anti-startup). Don't drift toward cold industrial or
  startup-framing aesthetics.

## The token system (use, don't bypass)

```css
/* Colors */
--ma-color-bg        warm off-white / cream
--ma-color-surface   warm light surface for cards/sections
--ma-color-text      warm near-black (not pure #000)
--ma-color-muted     warm gray, secondary text
--ma-color-accent    terracotta — CTAs, links, highlights
--ma-color-accent-2  darker terracotta — hovers/links
--ma-color-border    warm border
--ma-color-white     surfaces
--ma-color-dark      footer / CTA bands

/* Typography */
--ma-font-body       system-ui stack
--ma-font-head       "Manrope", fallback to body
--ma-fs-h1/h2/h3     fluid via clamp()
--ma-fs-base         1rem
--ma-lh-body         1.6

/* Spacing scale (use these, not raw rem) */
--ma-space-1 .. 6    0.25 / 0.5 / 1 / 1.5 / 2.5 / 4rem
--ma-section-y       5rem vertical section padding

/* Layout */
--ma-container       1200px
--ma-radius          6px
```

### Hard rules
- **No hardcoded hex / px / rem for anything a token covers.** Use the token.
- If a value truly isn't tokenized (e.g. a one-off hero gradient), add a new
  token to `:root` with a `--ma-` name and a comment, rather than inline value.
- **No `!important`** to override parent theme — win via dependency order
  (child stylesheet is enqueued after parent) and selector specificity.
- Fluid type already exists via `clamp()`; don't add media-query font sizes.

## Polish checklist

### Typography
- One H1 per page (also an SEO rule — see `wp-seo-audit`).
- Headings use `var(--ma-font-head)` (Manrope); body uses `var(--ma-font-body)`.
- Body line-height `var(--ma-lh-body)` = 1.6 for readability.
- Don't set font sizes outside the `--ma-fs-*` scale unless it's a one-off
  display size — then add a token.
- Check heading color = `--ma-color-text`, not pure black.
- Long paragraphs: max-width ~65ch for readability.

### Color
- Background uses `--ma-color-bg` (cream), sections alternate with
  `--ma-color-surface`.
- CTAs / links / accents use `--ma-color-accent`, hover `--ma-color-accent-2`.
- Muted/secondary text uses `--ma-color-muted`.
- WCAG AA contrast: text-on-bg, text-on-accent (terracotta). If a contrast
  pair fails, tune the token (don't ad-hoc override).
- No pure `#000` on text; no pure `#fff` backgrounds except surfaces.

### Spacing
- Vertical section padding = `var(--ma-section-y)` (5rem). Sub-pages use this.
- Internal gaps use the `--ma-space-1..6` scale, not raw rem.
- Consistent rhythm: pick 2-3 spacing values and reuse, don't sprinkle
  `1.2rem`, `1.3rem`, `1.5rem`.
- Container max-width = `var(--ma-container)` = 1200px, centered.

### Buttons / cards
- Buttons: use the existing button variants in `style.css`. There's a default
  (filled accent) and an `--outline` variant (added in commit 4f93509).
  Don't invent new button styles — extend the variants.
- Card radius = `var(--ma-radius)` = 6px consistently.
- Hover states use color shift (`--ma-color-accent-2`), not shadow puffery.
- Focus states must be visible (also accessibility — see below).

### Responsive
- Mobile breakpoints: GP default is fine; add media queries only for genuine
  layout shifts.
- Test at 360px, 768px, 1024px, 1200px+.
- Touch targets ≥ 44×44px on mobile.
- No horizontal scroll (the `html, body { overflow-x: hidden; }` rule exists
  for this — don't remove it).

### Motion
- Subtle only — this is a B2B manufacturer site, not a portfolio.
- Transitions 150–250ms, `ease` / `ease-out`.
- Respect `prefers-reduced-motion`:
  ```css
  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
      animation-duration: 0.01ms !important;
      transition-duration: 0.01ms !important;
    }
  }
  ```
- Hover animations on cards: subtle lift / border shift, not scale-105 bounces.

### Accessibility (visual side)
- Focus outlines visible (`:focus-visible`).
- Don't rely on color alone to convey meaning (icons + labels too).
- Link underlines visible or clear hover affordance.

## Workflow when polishing a specific section

1. **Read the section's template part** (e.g. `template-parts/home/hero.php`).
2. **Read the relevant CSS block** in `style.css` (search for the section's
   class name comment, e.g. `/* --- Hero --- */`).
3. Identify what feels off (spacing rhythm, contrast, alignment, hierarchy).
4. Prefer tuning a **token** over a one-off rule. Prefer reusing an existing
   component class over adding a new one.
5. Make the change, then describe the visual delta to the user before
   committing (so they can preview in LocalWP).

## Output format

When proposing changes:
```
## Design polish — <section name>

### What feels off
- <observation, e.g. "hero CTA is too small relative to headline">

### Proposed changes (smallest first)
1. <token change or class change> — file:line — visual effect
   ...

### Tokens affected (if any)
- --ma-xxx: <old> → <new>  (cascades to: <list of components>)
```

## Rules
- **Tune, don't replace.** AGENTS.md / design-brief say the warm palette is a
  starting point to tune, not throw out.
- **Never hardcode values that tokens cover.**
- **No body copy changes.** This skill is visual; copy edits go through the
  user (AGENTS.md §5). If copy is clearly placeholder `【...】`, leave it.
- Small, reviewable diffs (AGENTS.md §7).
