---
name: wp-redirect-guard
description: >
  URL & 301 redirect workflow guard for the myathletik-child theme. Enforces
  AGENTS.md §3 — never change an indexed URL without a 301 redirect. Produces
  the redirect mapping table, identifies the right redirect mechanism (Rank
  Math, Redirection plugin, .htaccess, or functions.php fallback), and writes
  the redirects. Also handles slug normalization (e.g. the misspelled
  /sustainabilty/ → /sustainability/) and tracks the canonical redirect map.
  Use whenever the user asks to 改 URL / 改 slug / 301 跳转 / 重定向 / 换链接,
  or says "change this URL", "rename this slug", "redirect old to new",
  "301 redirect", "this page moved", "fix broken link", or before deleting /
  merging / renaming any page or post. Trigger on 改 permalink / 移动页面 /
  合并页面 / 删除页面 / URL 变更 / SEO 权重 too. CRITICAL: invoke BEFORE the
  URL change is committed, not after.
---

# wp-redirect-guard — URL & 301 Redirect Workflow (the SEO landmine skill)

This is the **strictest-section** skill. AGENTS.md §3 is explicit: *never
change an indexed URL without a 301 redirect*. Lost redirects throw away
existing search equity. This skill exists to make that automatic.

## When to invoke

Invoke this skill **BEFORE** any action that changes a **currently live or
previously indexed** URL. Trigger cases:
- Changing a published page/post's slug
- Deleting or trashing a published page
- Merging two published pages into one
- Reparenting a category that's already live
- Correcting a misspelled slug that was already indexed or externally linked

**Not needed for:** never-published stubs, dead-site URLs, local-dev-only
pages, or URLs that were never indexed and never linked. (See "Rule of thumb"
under the historical 301 map below.)

If the user mentions a slug/URL change and you're about to act, **stop and run
this skill first** to produce the redirect plan — UNLESS the change is clearly
in the "not needed" category above, in which case confirm with the user that
the old URL is truly dead before skipping the redirect.

## Legacy-domain status (from AGENTS.md §3) — OUT OF SCOPE

**Status correction (2026-08-10): `myathletik.com` has been retired without
cross-domain redirects by explicit owner decision and returns HTTP 410.** Do
not inventory, implement or propose legacy-domain mappings unless the owner
later reopens that decision. This scoped exception does not relax redirect
protection for any current `athletikapparel.com` URL.

The original plan (kept for historical reference, in case the assumption
changes — e.g. a specific old URL turns out to still be indexed):

| Old URL                              | New URL                                  | Status |
|--------------------------------------|------------------------------------------|--------|
| `/products/knitted-fabrics/`         | `/knitted-fabrics-manufacturer/`         | NOT PLANNED (owner decision) |
| `/products/sports-accessories/`      | `/sports-accessories-manufacturer/`      | NOT PLANNED |
| `/products/outdoor-clothing/`        | `/outdoor-clothing-manufacturer/`        | NOT PLANNED |
| `/products/sportswear/`              | `/sportswear-manufacturer/`              | NOT PLANNED |
| `/products/underwear/`               | `/underwear-manufacturer/`               | NOT PLANNED |
| `/products/merino-wool-apparel/`     | `/merino-wool-manufacturer/`             | NOT PLANNED |
| `/products/silk-wear/`               | `/silk-wear-manufacturer/`               | NOT PLANNED |

No legacy `/sustainabilty/` redirect is planned under the same owner decision.

### When this skill still applies

The redirects above are off the table, but this skill STILL triggers for:
- **Renaming any CURRENTLY LIVE page's slug** — old URL is dead is fine, but
  if `/sportswear-manufacturer/` is already indexed and you rename it to
  `/activewear-manufacturer/`, THAT needs a 301 (the new URL is live).
- **Merging two currently-live pages** into one.
- **Deleting a currently-live page** (vs. a never-live stub).
- **Correcting a misspelled slug** that's already indexed or linked.
- **Any new slug change once the site goes to production** — from launch
  onward, every URL change needs a 301 by default.

Rule of thumb: if the old URL was ever (a) indexed by Google, (b) linked from
external sites, or (c) live on the production domain → its change needs a 301.
If it only ever existed as a never-published stub or on a dead site → no
redirect needed.

## Workflow

### 1. Before the URL change — produce the mapping

```
## 301 Redirect Plan

### Change being made
<old URL> → <new URL>
Reason: <rename / merge / delete / slug fix>

### Redirect(s) to add
| Old URL | New URL | Status | Mechanism |
|---------|---------|--------|-----------|
| /old/   | /new/   | 301    | <Rank Math / Redirection / .htaccess> |

### Side effects to check
- Internal links pointing to /old/ (grep templates + nav menu):
  - <file:line> ...
- sitemap.xml entries
- canonical tags
- Any structured data referencing /old/ (JSON-LD @id, breadcrumbs)

### Pre-flight checklist
- [ ] New page exists and is published before redirect goes live
- [ ] Redirect is 301 (not 302/307 — those don't pass equity)
- [ ] Internal links updated to point directly to /new/
- [ ] User has confirmed the new slug wording
```

### 2. Pick the redirect mechanism

In priority order:
1. **Rank Math Redirections** (if Rank Math Pro / free with redirection add-on
   is active) — managed in WP admin, version-controlled via DB export.
2. **Redirection plugin** (free, widely used) — also DB-stored, has logging.
3. **Hosting/CDN redirect rules** (current stack: Flywheel + Cloudflare) — use
   only when the rule belongs at the edge/server and can be reviewed and
   validated in that environment.
4. **`functions.php` `template_redirect` hook** — last-resort fallback, only
   for a handful of redirects:
   ```php
   add_action( 'template_redirect', function () {
       $map = [
           '/products/sportswear/'     => '/sportswear-manufacturer/',
           '/products/underwear/'      => '/underwear-manufacturer/',
           // ... full map
       ];
       $path = untrailingslashit( $_SERVER['REQUEST_URI'] ?? '' );
       $path = untrailingslashit( strtok( $path, '?' ) );
       if ( isset( $map[ $path ] ) ) {
           wp_safe_redirect( home_url( $map[ $path ] ), 301 );
           exit;
       }
   } );
   ```
   The `functions.php` approach is **reviewable in git**, which fits this
   project's code-first philosophy — prefer it unless volume is high.

Ask the user which mechanism they use. Default recommendation: **Rank Math or
Redirection plugin** for visibility, with `functions.php` as the code-first
fallback.

### 3. After the redirect — update internal links

Don't rely on the redirect for internal links. Update every internal link to
point directly to the new URL:
- Nav menu ( seeded in `functions.php` `myathletik_ensure_primary_menu` —
  the manufacturer URLs there are already the new ones).
- In-template `home_url( '/...' )` calls.
- Body content links (if any).
- `sitemap.xml` (let WP/Rank Math regenerate).
- JSON-LD `@id` / breadcrumb references.

### 4. Validate

After redirect is live, the user should:
- `curl -I https://www.athletikapparel.com/old-url/` → expect `301` +
  `Location: /new-url/`.
- Google Search Console → mark the old URL as moved (optional but accelerates
  reindexing).

## Slug normalization rules

- Lowercase, hyphen-separated, no underscores, no trailing inconsistency
  (decide on trailing slash and stick with it — this site uses trailing slash).
- No non-ASCII characters in slugs (the assets folder `辅图` is a separate
  issue; slugs must be ASCII).
- Match the keyword pattern in `seo-tags.md` (the `[category]-manufacturer`
  pattern).

## Deleting / merging pages

When a page is deleted or merged:
1. Note its old URL.
2. Decide destination: most relevant surviving page, or home.
3. Add a 301 **before** the page is removed (otherwise 404 in the gap).
4. Update internal links.

## Output format

Always emit the redirect plan in the format shown in step 1. Even for a single
slug rename, the structured plan is the deliverable.

## Rules

- **Never change a URL without first producing the 301 plan.** Pause and ask
  if the user is about to.
- **301, not 302/307.** Only 301 passes link equity.
- **Confirm slug wording with the user** when it's tunable.
- **Update internal links too** — don't lean on the redirect forever.
- **Prefer code-first mechanisms** (`functions.php` `template_redirect`) for
  git-reviewability, unless volume warrants Redirection plugin / .htaccess.
- The new page must exist and be published before the redirect goes live
  (otherwise visitors bounce to a 404 on the destination).
