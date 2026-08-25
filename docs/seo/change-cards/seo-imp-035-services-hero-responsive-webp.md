# SEO Change Card：SEO-IMP-035 Services Hero 响应式 WebP

- Change ID：`SEO-IMP-035`
- 状态：`ready-to-deploy`
- 变更日期：2026-08-25
- 变更页面或分组：`/services/`
- 唯一主要变量：将 1672×941、1,917,246 bytes 的单一 Hero PNG 请求替换为 480–1672px 的真无损响应式 WebP，并补齐 LCP preload、`srcset`、`sizes`、固有尺寸、`fetchpriority` 与 `decoding`
- 业务假设：移动设备选择贴近实际显示密度的候选文件，可显著减少 LCP 图片传输，同时保持原始画质和现有构图，从而改善 Services 的移动端 LCP
- 证据来源与数据状态：SEO-IMP-034 的 Lighthouse Lab `perf_14a90ed2ca302abc70ba`；Services LCP 14.1s，LCP 元素为 `img.ma-services-hero__bg`，原 PNG 约 1.9 MB，Lighthouse 估算可减少约 1,798 KiB
- 主要指标：部署后移动端 Lighthouse LCP 与所选 Hero 候选传输大小；生产 HTML 只 preload 浏览器按 `imagesrcset/imagesizes` 选择的一个 LCP 候选
- 防护指标：HTTP 200、正确 `image/webp` MIME、CLS 不恶化、Hero 裁切/覆盖层/文字可读性不变、Desktop/Mobile 视觉正常、Contact CTA 与 Consent/GA4 不受影响
- 基线窗口：2026-08-25 部署前；Lab LCP 14.1s，原始图片 1,917,246 bytes
- Day 7 / 28 / 90 复盘日期：生产部署日期确定后填写；低流量阶段不把不足的 Field 样本解释为排名结果
- 干扰因素：Cloudflare/Flywheel 动态 HTML、Cookiebot 与字体阻塞链、网络波动、同期插件或缓存配置变更
- 部署前 Crawl ID：`crawl_c3321e593dcd4a54bec9811ec8775f40`
- 部署后 Crawl ID：待部署后填写
- Finding / Inventory 处置：SEO-IMP-034 的 Services LCP Finding 维持 `deferred`，生产部署及复测通过后改为 `fixed`
- 最终决策及原因：待生产验收后填写 `keep` / `iterate` / `revert`

## 实施内容

### Git 代码

- `page-services.php`：增加 480 / 640 / 800 / 960 / 1280 / 1672w `srcset`、`sizes="100vw"`、真实 `width="1672" height="941"`、`loading="eager"`、`fetchpriority="high"` 与 `decoding="async"`；
- `functions.php`：仅在 `/services/` 输出一个带 `imagesrcset` / `imagesizes` 的响应式 image preload；
- 保留现有 alt、页面 URL、H1、正文、覆盖层、CSS 和视觉构图。

### uploads 资源（不进入 Git）

目标目录：`wp-content/uploads/myathletik-theme/assets/images/services/`

| 文件 | 尺寸 | Bytes | SHA-256 |
|---|---:|---:|---|
| `services-production-line-480-lossless.webp` | 480×270 | 124,800 | `6A6E906780F3DCD2A807059D361ED8182A9534E4BB58EB041D99378F8C524DA4` |
| `services-production-line-640-lossless.webp` | 640×360 | 216,156 | `BE895C9C1DE4EC462888C63BEA3D0B5D2B36FF2A411D6D5BC880264D73D2C357` |
| `services-production-line-800-lossless.webp` | 800×450 | 328,508 | `E3E100EE0868D30927AEFB9317B7B103714CDF86EB77C0C88E554C744833647C` |
| `services-production-line-960-lossless.webp` | 960×540 | 469,234 | `188A760BB4805FC7BEF078454911A216443105C9328EE5919D7179525C51474C` |
| `services-production-line-1280-lossless.webp` | 1280×720 | 831,472 | `27D72EE3BE88089A62F5505AC73B052489DBA8799810FF82E6CA317CE244F174` |
| `services-production-line-1672-lossless.webp` | 1672×941 | 1,357,344 | `E91CF54F1AB65669B0FC35D9D3D6FA3C5D7F9659436176C5B78C9A51FA31ED8A` |

原 `hero.png` 保留在同目录，作为源文件和回滚资产，不删除。

## 编码与画质验证

- 所有候选均为 WebP `VP8L` 真无损编码；
- 1672×941 WebP 与原 PNG 解码后逐像素 PSNR 为 `r:inf g:inf b:inf average:inf`；
- 缩放使用 Lanczos，960px 候选与原图完成视觉并排检查，构图、颜色与细节无可见变化；
- 未采用先转 YUV420 再封装为“lossless”的伪无损输出。

## 验收记录

- [x] 六个文件名为 ASCII、小写、连字符格式；
- [x] 六个资源尺寸、Bytes、SHA-256 和 `VP8L` chunk 已验证；
- [x] 完整尺寸 WebP 与原 PNG 的 PSNR 为 `inf`；
- [x] 960px 候选视觉检查通过；
- [x] `php -l functions.php` 通过；
- [x] `php -l page-services.php` 通过；
- [x] `git diff --check` 通过；
- [ ] LocalWP 运行时 HTML / Desktop / Mobile 验收（本次本地站未运行）；
- [ ] 主题代码与六个 uploads 文件部署到生产；
- [ ] 生产 HTML、响应式候选、MIME、视觉与 Lighthouse 复测；
- [ ] 保存部署后 Crawl ID，并填写最终决策。
