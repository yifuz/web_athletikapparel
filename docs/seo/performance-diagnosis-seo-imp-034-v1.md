# SEO-IMP-034 生产性能根因诊断 V1

> 诊断日期：2026-08-25
>
> 范围：生产站 HTML 响应、Cloudflare/Flywheel 缓存状态，以及首页、Sportswear、Technical Guide、Services 四类模板的移动端 LCP
>
> 性质：只读取证；本项未修改生产页面、插件配置或图片资源

## 1. 结论摘要

SEO-IMP-034 已完成根因分层。当前最值得先修的不是 WordPress PHP 执行时间，而是首屏图片传输与资源优先级：

1. **Services 是最明确的单页瓶颈。** 首屏 LCP 元素为 `services/hero.png`；源图 1672×941、1,917,246 bytes，页面仅输出单一 PNG，没有 `srcset`、`sizes`、固有尺寸、`decoding` 或 `fetchpriority`。本次移动端 Lab LCP 为 14.1s，Lighthouse 估算该图可减少约 1,814 KiB。
2. **首页存在首屏带宽竞争。** Hero 四张图全部 `loading="eager"`；主图移动端实际选择 720×1260 的真无损 WebP，仍为 660,394 bytes，另三张 JPG 也在首屏立即请求。受控测试中，阻断所有主题图片时 LCP 约由 8.7s 降至 4.1s；只阻断三张次要 Hero 图时降至约 6.9s。说明图片调度是主要可控变量。
3. **全站有共同的首屏阻塞链，但不是唯一根因。** Google Fonts CSS、Cookiebot、jQuery、WP Consent API、Fluent Forms CSS、GeneratePress CSS 与 child CSS 均出现在首屏渲染链中。首页直接 Lighthouse 样本中，Cookiebot 单独阻断只改善 FCP/LCP 约 0.6–0.8s，因此应排在图片之后，并需保留同意管理与追踪正确性。
4. **HTML 动态响应需要监测，不足以判定为当前 LCP 主因。** 五个代表 URL 均为 `CF-Cache-Status: DYNAMIC`、`x-fw-dynamic: TRUE`、`x-fw-static: NO`。本轮三次新连接测得 HTML 首字节约 0.70–1.02s；Lighthouse 内部 Root Document 为 280–540ms。此前 1.2–3.0s 的慢响应没有稳定复现，不能据此改主题 PHP 或宣称主机故障。
5. **没有可用 CrUX 字段数据。** 以下数值均为受控 Lighthouse Lab 诊断，不是实际用户 CWV，也不能直接解释排名变化。

## 2. HTML 与缓存证据

每个请求均新建连接，因此 `time_starttransfer` 同时包含 DNS/TCP/TLS 与服务器处理，不等同于纯源站 TTFB。

| URL | 三次 `time_starttransfer` | 三次总耗时 | HTML 缓存信号 |
|---|---:|---:|---|
| `/` | 0.765 / 1.016 / 0.734s | 1.109 / 1.375 / 1.078s | Cloudflare `DYNAMIC`；Flywheel dynamic |
| `/sportswear-manufacturer/` | 0.719 / 0.734 / 0.718s | 0.891 / 0.937 / 0.890s | 同上 |
| `/technical-knitwear-tech-pack-guide/` | 0.718 / 0.703 / 0.719s | 0.890 / 0.875 / 0.891s | 同上 |
| `/services/` | 0.718 / 0.703 / 0.734s | 0.750 / 0.734 / 0.781s | 同上 |
| `/technical-guides/` | 0.719 / 0.703 / 0.719s | 0.782 / 0.750 / 0.766s | 同上 |

Child stylesheet 返回 `Cache-Control: public, max-age=31536000`，说明静态资源已有长缓存策略；HTML 与静态资源不能按同一缓存规则判断。Cloudflare 单次 `MISS` 也不足以证明静态缓存长期失效。

## 3. 四类模板 Lab 复测

| 模板 | 分数 | FCP | LCP | TBT | CLS | Root Document | 本次 LCP 元素 |
|---|---:|---:|---:|---:|---:|---:|---|
| 首页 | 59 | 7.2s | 7.2s | 0ms | 0 | 294ms | Hero 正文段落 `.ma-home-hero__subhead` |
| Sportswear | 60 | 6.9s | 6.9s | 0ms | 0 | 279ms | Hero 介绍段落 `.ma-product-hero__content > p` |
| Tech Pack Guide | 59 | 7.2s | 7.2s | 0ms | 0 | 543ms | 已 preload、`fetchpriority="high"` 的文章封面 |
| Services | 56 | 8.4s | 14.1s | 0ms | 0 | 284ms | `img.ma-services-hero__bg` |

Lab 运行 ID：

- 首页：`perf_f6a90fcbd63d3e273810`
- Sportswear：`perf_d5e1963a60b85a70327f`（首次运行失败后重跑成功）
- Tech Pack Guide：`perf_49fd4fd0bc59aef8c2db`
- Services：`perf_14a90ed2ca302abc70ba`

共同的 `TBT=0` 与 `CLS=0` 表明当前优先级不是减少业务 JavaScript 计算量或修布局跳动，而是让首屏内容和 LCP 资源更早、更轻地到达。

## 4. 受控 A/B 与资源归因

为减少单次 Lab 误判，另用相同 Lighthouse 13.4.1 移动端模拟条件对首页做了资源阻断测试。该测试只用于方向判断，数值存在运行波动，不能与 CrUX 混用。

| 变体 | 分数 | FCP | LCP | 解释 |
|---|---:|---:|---:|---|
| 直接基线样本 | 62 | 3.21s | 8.38s | LCP 为 Hero 正文；另一诊断样本的 Element Render Delay 约 5.29s |
| 阻断 Cookiebot | 64 | 2.57s | 7.63s | 有改善，但不足以解释全部延迟 |
| 阻断三张次要 Hero JPG | 63 | 3.12s | 6.87s | 证明次要 eager 图片在受限网络中争抢首屏带宽 |
| 阻断全部主题图片 | 72 | 3.14s | 4.09s | 证明图片传输/调度是主页 LCP 的主要可控变量 |

首页 Lighthouse 图片证据还包括：

- 主 Hero 720px 真无损 WebP：660,394 bytes；估算浪费约 607 KiB；
- Merino 首页分类图：800,330 bytes；估算浪费约 699–767 KiB；
- 多张懒加载分类图仍进入移动端候选下载窗口，需在 Hero 修复后再按真实页面负载排序；
- Child CSS 未压缩，Lighthouse 单次估算约 5 KiB / 940ms 潜在节省，但收益和稳定性低于图片项。

## 5. Finding 处置

| Finding | Outcome | 依据与后续 |
|---|---|---|
| 部署后 Crawl 的 `/services/`、`/technical-guides/` `slow_response` | `deferred` | 本轮未稳定复现 1.2–3.0s；继续保留同参数 Crawl 与外部重复请求，不改主题 PHP |
| 四页 HTML 均为 Cloudflare `DYNAMIC` | `deferred` | 可评估 Flywheel/Cloudflare 页面缓存，但必须排除登录、Cookie、表单和 Consent 影响；由主机/CDN配置项处理 |
| 首页 LCP | `deferred` | 已定位图片调度与资源体积；转 SEO-IMP-036 实施并用 Change Card 验证 |
| Sportswear LCP | `deferred` | LCP 为文本，优先跟随全站阻塞链处理；本页无独立 Hero 图片根因，不单独扩写或改 SEO 文案 |
| Tech Pack Guide LCP | `deferred` | 封面已 preload、responsive、high priority，单图仅约 52 KiB；不重复返工该模板图片，先处理共同阻塞链 |
| Services LCP | `deferred` | 已明确定位 1.9 MB 单一 PNG；转 SEO-IMP-035 |
| Cookiebot | `deferred` | A/B 有中等收益，但不可在未验证 Consent/GA4 前简单删除或异步化 |
| TBT / CLS | `not-needed` | 四类模板本轮均为 0，不建立对应修复项 |

## 6. 按收益与风险排序的实施队列

### P0 — SEO-IMP-035：Services Hero 响应式图片

- 生成保持最大实用清晰度的 WebP 响应式候选，文件放在 uploads，不进入 Git；
- 用 `<picture>` / `srcset` / `sizes` 让移动端不再下载 1672px PNG；
- 输出真实 `width`、`height`、`decoding="async"`、`loading="eager"`、`fetchpriority="high"`；
- 保留 PNG 作为必要回退，不改变页面 URL、文案或视觉构图；
- 预期收益最高、代码风险低，必须同时部署 uploads 文件与主题代码。

### P0 — SEO-IMP-036：首页 Hero 请求优先级与候选尺寸

- 主视觉保留一个高优先级候选；补充更贴合移动端显示尺寸的候选；
- 三张次要拼图改为非关键请求，优先评估 `loading="lazy"`、`decoding="async"` 与较小响应式 WebP；
- 保持桌面和移动端构图、固有比例与装饰图 `alt=""`；
- 以单一 Change Card 对比修改前后 Lab，避免与其他性能改动混批。

### P1 — SEO-IMP-037：全站首屏阻塞链

- 优先评估 self-host Manrope 或使外部字体不再阻塞首屏；
- 检查 Fluent Forms CSS 是否必须全站首屏加载；
- 检查 jQuery、WP Consent API 与 Cookiebot 的依赖和加载位置；
- Cookiebot 仅在 Consent、GA4、表单和地区策略全部回归通过后调整；
- CSS minify 作为同项低风险子步骤，不将 5 KiB 节省夸大为主要 LCP 修复。

### P2 — SEO-IMP-038：Flywheel / Cloudflare HTML 缓存与响应监测

- 向 Flywheel 确认访客 HTML 是否应命中平台页面缓存，以及 `FLYWHEEL_BOT` / `DYNAMIC` 的预期行为；
- 不对 WordPress 登录、表单提交、Consent 或带用户 Cookie 的响应做盲目 Cache Everything；
- 只有在同地区、同协议、同 URL 的多轮监测再次稳定超过阈值时，才升级为主机/CDN故障项。

## 7. 下一批验收标准

- 每个实施项独立提交、独立部署、独立 Change Card；
- 移动端至少重复 3 次 Lab，报告中记录中位数及运行失败；
- 保留 TBT、CLS、HTTP 状态、表单、Consent、GA4、桌面/移动视觉作为防护指标；
- 没有 CrUX 时明确标注 Lab；获得 CrUX 后单独记录，不与 Lab 算术平均；
- 图片资源在生产返回 200 且 MIME 正确；uploads 部署与 Git 部署必须同时验收。
