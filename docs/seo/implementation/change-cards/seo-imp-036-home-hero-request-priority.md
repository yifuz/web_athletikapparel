# SEO Change Card：SEO-IMP-036 首页 Hero 请求优先级

- Change ID：`SEO-IMP-036`
- 状态：`production-accepted`
- 变更日期：2026-08-25
- 变更页面或分组：`/`
- 唯一主要变量：首页 Hero 图片调度；保留一张主视觉为 `loading="eager"` / `fetchpriority="high"`，三张次要拼图改为 `loading="lazy"` / `fetchpriority="low"`，并为四张图片提供贴合实际显示宽度的响应式候选
- 业务假设：减少首屏同时发起的高优先级图片请求，并让浏览器按显示尺寸选择较小文件，可降低图片与首页文字 LCP 的带宽竞争，同时保持现有 Bento 构图和视觉清晰度
- 证据来源与数据状态：SEO-IMP-034 的生产移动端 Lighthouse Lab 与受控资源阻断测试；首页 Lab LCP 为 7.2s，LCP 元素为 `.ma-home-hero__subhead`；另一轮受控测试中，阻断三张次要 Hero 图片后 LCP 约由 8.7s 降至 6.9s。该证据为 Lab、单次及受控测试，不等同于 CrUX
- 主要指标：部署后移动端 Lighthouse LCP 中位数；Hero 主图实际选中候选；首屏图片请求数量、优先级与总传输量
- 防护指标：HTTP 200、图片 MIME 正确、CLS 不恶化、主图人物裁切不变、三张次图无明显延迟空白、Desktop/Mobile Bento 构图不变、H1/正文/CTA/Consent/GA4 不受影响
- 基线窗口：2026-08-25 部署前；首页移动端 Lab LCP 7.2s，四张 Hero 图片全部 `loading="eager"`
- Day 7 / 28 / 90 复盘日期：以 2026-08-25 为部署日；低流量阶段不把不足的 Field 样本解释为排名结果
- 干扰因素：Cloudflare/Flywheel 动态 HTML、Cookiebot、Manrope 与插件阻塞链、网络波动、同期缓存或插件配置变化
- 部署前 Crawl ID：`crawl_c3321e593dcd4a54bec9811ec8775f40`
- 部署后 Crawl ID：`crawl_40f88b6c25d74ba79ee193c7be26caf9`
- Finding / Inventory 处置：Hero 请求调度已修复并保留；页面整体 LCP Finding 仍为 `deferred`，因为 LCP 元素已是文字、三次移动端 Lab 中位数仍为 3.68s，且本次没有 CrUX 字段数据
- 最终决策及原因：`keep`。生产 HTML 为唯一 1 个 eager/high 主图与 3 个 lazy/low 次图，14 个新资源全部通过 HTTP/MIME；三次有效 Lab LCP 中位数由部署前单次 7.2s 降至 3.68s，TBT 42ms、CLS 0，Desktop/Mobile Bento 构图无回归。该变化仅作为同批部署后的方向性证据

## 实施内容

### Git 代码

- `template-parts/home/hero.php`：
  - 主视觉新增 480w / 640w 真无损 WebP 候选，并将 `sizes` 对齐移动端 26rem 上限和桌面约 22rem 实际显示宽度；
  - 主视觉继续保持唯一的 `loading="eager"`、`fetchpriority="high"` 图片；
  - 三张次要拼图各新增 160w / 240w / 320w / 400w Q100 WebP 候选；
  - 三张次图改为 `loading="lazy"`、`fetchpriority="low"`、`decoding="async"`；
  - 四张图片继续使用 `alt=""`，因为整个视觉容器为 `aria-hidden="true"`，属于装饰性组合图；
  - 不改 CSS、页面 URL、H1、正文、CTA 或 Bento 排列。

首页本轮 LCP 是文字而不是图片，因此没有为主视觉增加 preload。浏览器仍可通过 HTML preload scanner 发现唯一的 eager/high 主图，避免图片 preload 进一步争抢文字 LCP 所需资源。

### uploads 资源（不进入 Git）

目标根目录：`wp-content/uploads/myathletik-theme/assets/images/`

| 相对目录 | 文件 | 尺寸 | 编码 | Bytes | SHA-256 |
|---|---|---:|---|---:|---|
| `sportswear/` | `performance-knitwear-hero-480-lossless.webp` | 480×840 | VP8L | 262,076 | `3E9FD7F4184389DF199DBDF47E3B410B54953342F297C518023D475C2098DDD8` |
| `sportswear/` | `performance-knitwear-hero-640-lossless.webp` | 640×1120 | VP8L | 510,300 | `136804E061B57C4021862E9F8AC5E08358734B40AE4AF8CCD90DF1599B781049` |
| `production/` | `sewing-floor-bento-160-q100.webp` | 160×160 | VP8 Q100 | 17,072 | `090B2FDEB843C18061EADFBB7B705680F5552D909F0272B6285A52476D0FA829` |
| `production/` | `sewing-floor-bento-240-q100.webp` | 240×240 | VP8 Q100 | 32,558 | `FA81564606B0985ABE0C68E2F9E9653CCDA9210D8E27C14C0E2D6A512A6B9C77` |
| `production/` | `sewing-floor-bento-320-q100.webp` | 320×320 | VP8 Q100 | 51,276 | `4A33EEDC9AE2FEE65332EE5BE4D13B2FE80D8CDE14CE6FBA8F1538A78F97C9A3` |
| `production/` | `sewing-floor-bento-400-q100.webp` | 400×400 | VP8 Q100 | 72,952 | `E0BABAC3BFAB289B9422C6DA4FCBD899852F9EB505E7DD4B6A7F9931D8C01610` |
| `production/` | `circular-knitting-bento-160-q100.webp` | 160×160 | VP8 Q100 | 18,044 | `9142C7DF236F2CD8D3650A6D78CED1B8D7582432EF7B40AD94C2D4F1669C66AE` |
| `production/` | `circular-knitting-bento-240-q100.webp` | 240×240 | VP8 Q100 | 36,990 | `CA502AE81FF124E24571B42FE31305F51B03196EE55481C1EBA8271D496C1DAD` |
| `production/` | `circular-knitting-bento-320-q100.webp` | 320×320 | VP8 Q100 | 60,424 | `807A9A1FAF21ACC08FDE829F25F49959773C1B7D8AF4DD85D416F04347B1AE9C` |
| `production/` | `circular-knitting-bento-400-q100.webp` | 400×400 | VP8 Q100 | 87,502 | `FA13D8339AD31E40654BC81A1EF04269865B0E60CEEBC08667E8CB050677C13E` |
| `sportswear/` | `performance-garment-bento-160-q100.webp` | 160×160 | VP8 Q100 | 5,568 | `B2101A8869F83CD666D0BA1E611631FF2675D9CC2C8AD45494E86ECCC6094D55` |
| `sportswear/` | `performance-garment-bento-240-q100.webp` | 240×240 | VP8 Q100 | 10,332 | `88AC1E7E5CDFDF99D66406975DF7B0A2C91D4426579804985FC8DAC02A0F1256` |
| `sportswear/` | `performance-garment-bento-320-q100.webp` | 320×320 | VP8 Q100 | 16,316 | `1116347B3F11315D8572DD4631E2FF6523FE94E2A8BA721C46B0D73F86161B73` |
| `sportswear/` | `performance-garment-bento-400-q100.webp` | 400×400 | VP8 Q100 | 24,998 | `7E8CC26742802124D2187767B2E465168949E2AC412718FAACB39B11C7E53846` |

原始 PNG/JPG 与既有 720w / 960w / 1280w 主图候选全部保留，不删除，作为源文件、较大候选和回滚资产。

## 清晰度与编码决策

- 主视觉来自 PNG，480w 与 640w 候选使用 VP8L 真无损编码；与同一 Lanczos 缩放参考逐像素比较，PSNR 均为 `inf`；
- 三张次图的源文件本身是 JPEG。测试表明再封装为 VP8L 会使 400w 文件大于或接近源 JPEG，不符合性能目标，因此使用 WebP Q100；
- 400w 候选相对同尺寸 Lanczos 参考的 PSNR：sewing 52.38 dB、circular knitting 51.96 dB、garment 54.10 dB；三张 400w 文件均小于各自原始 506/800px JPEG；
- 已逐张检查 480w 主图和三张 400w 次图，人物、设备、色彩和细节无可见异常。

## 本地验收记录

- [x] `php -l functions.php` 通过；
- [x] `php -l template-parts/home/hero.php` 通过；
- [x] 本地首页返回 HTTP 200；
- [x] Hero 渲染为 4 张图片、4 个 `srcset`、4 个 `decoding="async"`、4 个 `alt=""`；
- [x] 请求优先级为 1 个 eager/high 与 3 个 lazy/low；
- [x] 没有新增首页图片 preload；
- [x] 14 个新增 uploads 资源本地均返回 HTTP 200；
- [x] 14 个资源的尺寸、编码块、Bytes 与 SHA-256 已验证；
- [x] 新候选逐张视觉检查通过；布局未修改 CSS 或固有比例；
- [x] LocalWP 1440px Desktop 与 390px Mobile 的 Bento 构图和次图加载体验通过；
- [x] 主题代码与 14 个 uploads 文件同步部署到生产；
- [x] 生产 HTML、14 个资源 MIME、Desktop/Mobile 视觉与三轮移动端 Lighthouse 复测通过；
- [x] 三次有效移动端 Lighthouse：LCP/FCP 中位数 3.68s、TBT 42ms、CLS 0；
- [x] 保存部署后 Crawl ID，并填写最终决策。
