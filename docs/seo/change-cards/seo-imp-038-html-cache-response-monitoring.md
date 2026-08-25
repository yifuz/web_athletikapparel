# SEO Change Card：SEO-IMP-038 HTML 缓存与响应监测

- Change ID：`SEO-IMP-038`
- 状态：`monitoring-ready`
- 变更日期：2026-08-25
- 变更页面或分组：`/`、`/services/`、`/technical-guides/`、`/sportswear-manufacturer/`、`/contact/`
- 唯一主要变量：不修改生产缓存；建立匿名 HTML 的重复响应监测、缓存头判读和升级阈值
- 业务假设：先区分 Cloudflare 外层 HTML 行为、Flywheel/Fastly 页面缓存命中和本地网络波动，只有可重复超阈值时才升级主机问题，可避免错误 Cache Rule 影响登录、Consent、表单或个性化响应
- 证据来源与数据状态：2026-08-25 同一 Windows 工作站、同一网络、HTTP/1.1、匿名 GET 的三组监测窗口；Chrome Headless 的真实浏览器响应头交叉验证；Flywheel 与 Cloudflare 官方文档
- 主要指标：每个 URL 三轮 `time_starttransfer` 中位数、最大值、HTTP 状态、`x-cache`、`x-cacheable`、`x-cache-hits`、`cf-cache-status`、`CF-Ray`
- 防护指标：不修改 Cloudflare/Flywheel 配置；登录、Contact Form、Cookiebot、Consent、GA4 响应不被公共 HTML 缓存；静态 CSS 继续命中 CDN
- 基线窗口：2026-08-25 14:55–15:01 CST；三个相邻监测窗口
- Day 7 / 28 / 90 复盘日期：部署后立即复测；之后仅在 Crawl/Lighthouse 再次出现慢响应或月度性能复核时运行
- 干扰因素：当前工作站到 SJC 边缘网络、HTTP/1.1 客户端、连接冷启动、Flywheel/Fastly 多层边缘节点、并行下载及同期主机负载
- 部署前 Crawl ID：`crawl_c3321e593dcd4a54bec9811ec8775f40`
- 部署后 Crawl ID：待 IMP-035–037 合并部署后填写
- Finding / Inventory 处置：HTML 缓存错误 Finding 为 `no-change`；慢响应 Finding 维持 `monitoring`，当前证据不足以修改 Cloudflare/Flywheel 配置
- 最终决策及原因：`keep-monitoring`。Flywheel/Fastly 页面缓存有命中证据；Cloudflare HTML `DYNAMIC` 符合其默认不缓存动态 HTML 的行为。暂不启用 Cache Everything，也不增加 WordPress 缓存插件

## 1. 缓存层判读结论

匿名 HTML 响应同时出现：

- `cf-cache-status: DYNAMIC`；
- `x-fw-dynamic: TRUE`、`x-fw-static: NO`；
- `x-cacheable: YES`；
- `x-cache: MISS, HIT`；
- `x-cache-hits` 在不同边缘样本中出现 `0, 0`、`0, 2`、`0, 5` 等值；
- `x-served-by` 指向两层 SJC Fastly 节点。

因此不能把 `cf-cache-status: DYNAMIC` 或 `x-fw-dynamic: TRUE` 单独解释为“页面完全未缓存”。Cloudflare 外层未缓存 HTML，但 Flywheel/Fastly 内层将页面标记为可缓存并返回 HIT。静态 `style.css` 重复 GET 返回 `Cache-Control: public, max-age=31536000`、`x-fw-static: YES`、`cf-cache-status: HIT` 和 `Age`，说明静态 CDN 路径正常。

官方依据：

- [FlyCache on Flywheel](https://getflywheel.com/wordpress-support/what-is-flycache/) 明确说明 FlyCache 提供 full-page HTML caching，并对登录、购物车等页面执行智能排除；
- [Cloudflare Get started with Cache](https://developers.cloudflare.com/cache/get-started/) 说明动态 HTML 默认不缓存，需显式 Cache Rule 才缓存；
- [Cloudflare Investigate uncached responses](https://developers.cloudflare.com/cache/troubleshooting/investigating-uncached-responses/) 将 `DYNAMIC` 定义为 Cloudflare 在查找缓存前已判定该请求不具备缓存资格。

## 2. 2026-08-25 基线

每个窗口均为 5 个 URL × 3 轮，共 15 个匿名 GET。以下为每页三轮 TTFB 中位数范围：

| 窗口 | 时间约值（CST） | 中位数范围 | 最大样本 | 判读 |
|---|---|---:|---:|---|
| A | 14:55 | 1.11–1.14s | 2.17s | 正常窗口；有冷连接离群值 |
| B | 14:59 | 2.08–2.19s | 2.28s | 超阈值窗口 |
| C | 15:01 | 2.09–2.14s | 3.05s（Services） | 超阈值窗口 |

三个窗口全部 HTTP 200，HTML 均为 `x-cacheable: YES` 与 `x-cache: MISS, HIT`。窗口 B/C 连续但间隔过短，不能排除当前网络或连接层波动；按下述规则进入 `review`，尚不直接修改缓存或向主机宣告故障。

## 3. 固定监测与升级阈值

运行方式：

```powershell
pwsh -NoProfile -File .\scripts\seo\measure-html-response.ps1 -Rounds 3
```

需要存档原始样本时：

```powershell
pwsh -NoProfile -File .\scripts\seo\measure-html-response.ps1 -Rounds 3 -CsvPath .\tmp\html-response.csv
```

阈值是本站运营告警线，不是 Google 排名阈值：

| 状态 | 条件 | 动作 |
|---|---|---|
| `normal` | 同一窗口内各 URL 三轮 TTFB 中位数 `<1.2s`，全部 200 | 记录，不处理 |
| `review` | 任一 URL 中位数 `>=1.2s`，或单次 `>=2.0s` 重复出现 | 15 分钟后按同设备、同网络、同协议重跑；同步检查 Lighthouse Root Document |
| `host-escalation-ready` | 同一 URL 在 3 个独立窗口中位数均 `>=2.0s`，窗口至少间隔 15 分钟，且仍有 Flywheel cache HIT；或两个窗口重复出现 5xx/timeout | 向 Flywheel 提交时间、URL、`CF-Ray`、`x-served-by`、`x-cache`、`x-timer` 与 CSV；同时检查 Flywheel status |
| `urgent` | 多个 URL 持续 5xx、超时或生产页面内容错误 | 立即按故障流程联系 Flywheel；不通过 Cache Everything 掩盖源站错误 |

若换地区或换协议，必须建立新窗口，不与本基线直接求平均。当前脚本使用系统 `curl.exe` 的 HTTP/1.1；Chrome/Lighthouse 的 HTTP/2/3 数据作为独立浏览器证据记录。

## 4. 明确不执行

- 不启用 Cloudflare Cache Everything；
- 不为 HTML 新增 Cache Rule；
- 不安装 WordPress 缓存插件；
- 不把登录、Consent、Contact Form 或带 Cookie 响应加入公共缓存；
- 不因一次慢样本直接归因于主题 PHP、Flywheel 或 Cloudflare。

## 5. 验收记录

- [x] 5 个代表 URL × 3 轮脚本可重复运行；
- [x] HTTP 状态、TTFB、总时长、协议、Cloudflare 与 Flywheel/Fastly 缓存头均可输出；
- [x] HTML 的 Flywheel/Fastly HIT 与静态 CSS 的 Cloudflare HIT 已确认；
- [x] 正常、复核、主机升级和紧急阈值已固定；
- [x] 无生产配置、主题运行时代码或数据库改动；
- [ ] IMP-035–037 部署后运行一轮新窗口并保存部署后 Crawl ID；
- [ ] 若满足 `host-escalation-ready`，再由所有者携证据联系 Flywheel。
