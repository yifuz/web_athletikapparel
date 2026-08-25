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

- [x] `/`、`/services/`、`/sportswear-manufacturer/`、`/technical-guides/`、`/technical-knitwear-tech-pack-guide/`、`/contact/` 均返回 200；
- [x] 20 个 uploads 图片均返回 200 且 MIME 为 `image/webp`；
- [x] 两个 Manrope 文件均返回 200 且 MIME 为 `font/woff2`；
- [x] HTML 中 Google Fonts 引用为 0，本地 Manrope preload 为 1；
- [x] Services Hero 输出 6 档 `srcset`、正确 `sizes`、1672×941、eager/high；
- [x] 首页 Hero 输出 1 个 eager/high 与 3 个 lazy/low，Desktop/Mobile Bento 构图无回归；
- [x] Contact 与首页表单 markup、Fluent Forms、Cookiebot、Consent 和询盘追踪脚本正常加载；为避免创建真实外部询盘，本轮未执行成功提交；
- [x] 首页、Services、Sportswear、Tech Pack Guide 各取得 3 次有效移动端 Lighthouse，并记录 LCP/FCP/TBT/CLS 中位数；Tech Pack 有 1 次 partial/fetch-fallback 失败，已按规则排除并补跑 1 次；
- [x] 运行 `scripts/seo/measure-html-response.ps1 -Rounds 3`，记录新的响应窗口；
- [x] 执行部署后 Crawl Diff，保存 Crawl ID；
- [x] 分别更新 SEO-IMP-035、036、037、038 Change Card 的结果与最终决策。

### 生产验收结论（2026-08-25）

| 模板 | 移动端 Lab LCP 中位数 | FCP 中位数 | TBT 中位数 | CLS 中位数 | 部署前单次 LCP |
|---|---:|---:|---:|---:|---:|
| 首页 | 3.68s | 3.68s | 42ms | 0 | 7.2s |
| Services | 5.00s | 4.50s | 0ms | 0 | 14.1s |
| Sportswear | 3.43s | 3.43s | 0ms | 0 | 6.9s |
| Tech Pack Guide | 3.30s | 3.30s | 0ms | 0 | 7.2s |

部署后 Crawl `crawl_40f88b6c25d74ba79ee193c7be26caf9` 为 20 页、0 fetch failure。与 `crawl_c3321e593dcd4a54bec9811ec8775f40` 比较时工具标记 `review-required`（抓取上限/配置不同），但页面数不变、无新增状态码错误、无 Title 或 indexability 变化，`slow_response` 由 2 降为 0。另一次同参数即时 `crawl-diff`（run `56e0bbeb-466a-4079-8e80-9a16a01c9927`）为 21 URL、0 added/removed/changed/new errors/indexability flips；4 个 Warning 均为既有大于工具 5 MB 上限的 MP4。

最终决策：SEO-IMP-035、036、037 均 `keep`；SEO-IMP-038 为 `keep-monitoring`。以上 Lab 改善是同批部署后的方向性证据，不等同 CrUX 或排名变化，也不精确归因到单项。

## 6. 回滚

若出现页面、表单、Consent、字体或 Hero 视觉回归，优先通过 Local Connect 回滚到本批次前主题版本。新增 uploads 图片可以保留，因为旧主题不会引用它们；不要删除原 PNG/JPG。回滚后清理 Flywheel cache，并重新检查首页、Services、Contact 与 HTTP 状态。
