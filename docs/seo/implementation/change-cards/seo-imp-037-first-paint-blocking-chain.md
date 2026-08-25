# SEO Change Card：SEO-IMP-037 首屏阻塞链

- Change ID：`SEO-IMP-037`
- 状态：`production-accepted`
- 变更日期：2026-08-25
- 变更页面或分组：全站公开页面
- 唯一主要变量：将 Manrope 从 Google Fonts 外部 CSS/字体链改为子主题内自托管 WOFF2；其他阻塞资源仅审计，不同时改动
- 业务假设：移除 `fonts.googleapis.com` 与 `fonts.gstatic.com` 的 DNS、TLS、外部 CSS 和字体发现链，可缩短标题字体的可用路径并降低跨站波动，同时保持现有字形和 `font-display: swap`
- 证据来源与数据状态：SEO-IMP-034 的生产移动端 Lighthouse Lab 与受控阻断测试；共同阻塞链出现在四类模板，Cookiebot 单独阻断约改善 0.6–0.8s，但涉及 Consent/GA4，不能据此直接修改。证据为 Lab，不等同于 CrUX
- 主要指标：部署后移动端 Lighthouse FCP/LCP 中位数；首屏字体请求发现时间；外部字体请求数量
- 防护指标：HTTP 200、字体 MIME、CLS、标题字形/换行、Desktop/Mobile 视觉、Fluent Forms、Consent、GA4 与 Cookiebot 状态
- 基线窗口：2026-08-25 部署前；所有公开页面加载 Google Fonts CSS，随后访问 `fonts.gstatic.com`
- Day 7 / 28 / 90 复盘日期：以 2026-08-25 为部署日；低流量阶段不把不足的 Field 样本解释为排名结果
- 干扰因素：SEO-IMP-035/036 同批部署、Cloudflare/Flywheel 动态 HTML、网络波动及浏览器字体缓存
- 部署前 Crawl ID：`crawl_c3321e593dcd4a54bec9811ec8775f40`
- 部署后 Crawl ID：`crawl_40f88b6c25d74ba79ee193c7be26caf9`
- Finding / Inventory 处置：Google Fonts 外部发现链已修复；共同首屏阻塞链 Finding 仍为 `deferred`，Cookiebot、Consent 与表单依赖按风险控制保持不变，四模板 Lab LCP 仍需后续 Field/重复窗口观察
- 最终决策及原因：`keep`。生产页面 Google Fonts 引用为 0，本地 Manrope preload 为 1；两个字体均返回 HTTP 200 与 `font/woff2`，Desktop/Mobile 字形和换行无回归。四模板同批复测未出现 TBT/CLS 回归，不把整体变化单独归因于字体

## 实施内容

- `functions.php`：移除 `myathletik-google-fonts` enqueue 与 Google Fonts preconnect；child stylesheet 仅依赖 `generate-style`；在 `wp_head` 优先级 2 预加载 Latin Manrope WOFF2。
- `style.css`：增加 Latin 与 Latin-ext 两个 `@font-face`，使用同一可变字重文件覆盖 600–800，保留 `font-display: swap` 与原有系统字体回退。
- `assets/fonts/manrope-latin-600-800.woff2`：24,836 bytes，SHA-256 `A30DDCD349703AFF7464C34BEF3FFFDFF405EE50C113440D7C8693C02D210972`。
- `assets/fonts/manrope-latin-ext-600-800.woff2`：15,120 bytes，SHA-256 `3911B66D9F2E005A4B989223405D0E5032619C668597BA467CC76A23C8FFFCFB`。
- `assets/fonts/OFL-Manrope.txt`：保留 Manrope 的 SIL Open Font License 1.1。

## 审计后明确不改的子项

| 子项 | 结论 | 原因 |
|---|---|---|
| Fluent Forms CSS | `no-change` | 本地抽样显示仅首页、产品分类页和 Contact 等实际含表单页面加载；Services、Technical Guides Hub 与 Tech Pack Guide 不加载，不存在全站误载 |
| jQuery | `no-change` | 仅随 Fluent Forms/询盘追踪在表单页出现，插件 submission script 依赖 jQuery；改位置会扩大表单与 inline dependency 回归面 |
| WP Consent API / Cookiebot | `no-change` | Cookiebot 使用 automatic blocking，Consent 状态需要早于受控脚本建立；未完成地区、GA4、表单全套同意回归前不延后 |
| CSS minify | `no-change` | 当前估算收益约 5 KiB，低于字体链与图片收益；源码无构建流程，直接压缩会显著降低审查和维护性 |
| Critical CSS inline | `deferred` | 变量风险高且会与全局 stylesheet 形成重复；先验证字体和图片批次后再决定是否值得单独测试 |

## 本地验收记录

- [x] `functions.php` PHP 语法通过；
- [x] 本地首页 HTTP 200；
- [x] HTML 中 `fonts.googleapis.com` / `fonts.gstatic.com` 引用均为 0；
- [x] HTML 中仅有 1 个本地 Manrope preload 和 1 份 child stylesheet；
- [x] 两个 WOFF2 文件本地均返回 HTTP 200，文件头均为 `wOF2`；
- [x] 1440×1000 Chrome Headless 首页截图检查通过，标题字体、换行和布局未见回归；
- [x] 生产字体文件返回 HTTP 200 与 `font/woff2`；
- [x] 生产 Desktop/Mobile 字体和换行视觉回归通过；
- [x] 首页、Services、Sportswear、Tech Pack Guide 各取得三次有效移动端 Lighthouse 中位数；
- [x] 保存部署后 Crawl ID，并填写最终决策。
