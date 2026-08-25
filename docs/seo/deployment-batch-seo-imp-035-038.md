# SEO-IMP-035–038 合并部署清单

## 1. 批次范围

本批次按所有者要求将 SEO-IMP-035、036、037 一次部署；SEO-IMP-038 是只读监测与升级规则，不含生产运行时代码，部署后负责验收本批次的 HTML 响应。

对应提交：

- `d48ad42` — SEO-IMP-035 Services Hero；
- `acc92d1` — SEO-IMP-036 首页 Hero；
- `202c28c` — SEO-IMP-037 Manrope 自托管；
- SEO-IMP-038 的文档与监测脚本随 Git 保存，不需要上传到生产 WordPress 才能生效。

同批部署会让 IMP-035/036/037 的 Lighthouse 结果互相成为干扰因素，因此生产验收可以判断“批次是否改善”，不能把全站 FCP/LCP 变化精确归因给单一项。

## 2. 生产主题文件

通过 Local Connect / 主题部署同步以下最终版本：

- `functions.php`
- `page-services.php`
- `template-parts/home/hero.php`
- `style.css`
- `assets/fonts/manrope-latin-600-800.woff2`
- `assets/fonts/manrope-latin-ext-600-800.woff2`
- `assets/fonts/OFL-Manrope.txt`

`functions.php` 同时包含 Services image preload 和 Manrope preload，必须使用当前最终版本，不要从单个旧提交手工覆盖。

## 3. uploads 文件（Git 不会部署）

先上传到 `wp-content/uploads/myathletik-theme/assets/images/`：

### `services/`

- `services-production-line-480-lossless.webp`
- `services-production-line-640-lossless.webp`
- `services-production-line-800-lossless.webp`
- `services-production-line-960-lossless.webp`
- `services-production-line-1280-lossless.webp`
- `services-production-line-1672-lossless.webp`

### `sportswear/`

- `performance-knitwear-hero-480-lossless.webp`
- `performance-knitwear-hero-640-lossless.webp`
- `performance-garment-bento-160-q100.webp`
- `performance-garment-bento-240-q100.webp`
- `performance-garment-bento-320-q100.webp`
- `performance-garment-bento-400-q100.webp`

### `production/`

- `sewing-floor-bento-160-q100.webp`
- `sewing-floor-bento-240-q100.webp`
- `sewing-floor-bento-320-q100.webp`
- `sewing-floor-bento-400-q100.webp`
- `circular-knitting-bento-160-q100.webp`
- `circular-knitting-bento-240-q100.webp`
- `circular-knitting-bento-320-q100.webp`
- `circular-knitting-bento-400-q100.webp`

共 20 个 uploads 文件。原 PNG/JPG 保留，不删除。

## 4. 部署顺序

1. 先上传 20 个 uploads 图片，确认生产 URL 返回 200；
2. 部署当前 child theme 最终版本，确保两个 WOFF2 与 PHP/CSS 同批到达；
3. 清理 Flywheel site/server cache；Cloudflare HTML 当前为 `DYNAMIC`，不新增 Cache Rule；
4. 无痕窗口检查首页、Services、Sportswear、Contact；
5. 完成下述生产验收，再决定 `keep` / `iterate` / `revert`。

## 5. 生产验收

- [ ] `/`、`/services/`、`/sportswear-manufacturer/`、`/technical-guides/`、`/contact/` 均返回 200；
- [ ] 20 个 uploads 图片均返回 200 且 MIME 为 `image/webp`；
- [ ] 两个 Manrope 文件均返回 200 且 MIME 为 `font/woff2`；
- [ ] HTML 中 Google Fonts 引用为 0，本地 Manrope preload 为 1；
- [ ] Services Hero 输出 6 档 `srcset`、正确 `sizes`、1672×941、eager/high；
- [ ] 首页 Hero 输出 1 个 eager/high 与 3 个 lazy/low，Desktop/Mobile Bento 构图无回归；
- [ ] Contact 与首页表单可提交，Cookiebot、Consent 和 GA4 无回归；
- [ ] 首页、Services、Sportswear、Tech Pack Guide 各执行 3 次移动端 Lighthouse，记录 LCP/FCP/TBT/CLS 中位数；
- [ ] 运行 `scripts/seo/measure-html-response.ps1 -Rounds 3`，记录新的响应窗口；
- [ ] 执行部署后 Crawl Diff，保存 Crawl ID；
- [ ] 分别更新 SEO-IMP-035、036、037、038 Change Card 的结果与最终决策。

## 6. 回滚

若出现页面、表单、Consent、字体或 Hero 视觉回归，优先通过 Local Connect 回滚到本批次前主题版本。新增 uploads 图片可以保留，因为旧主题不会引用它们；不要删除原 PNG/JPG。回滚后清理 Flywheel cache，并重新检查首页、Services、Contact 与 HTTP 状态。
