# SEO CLI 工具接入、首轮与生产后基线（2026-08-18 至 2026-08-25）

> 工具：[`iannuttall/seo`](https://github.com/iannuttall/seo)（Apache-2.0，本地 CLI + MCP）
> 安装版本：v0.2.36，全局 npm 安装于本机（Node v22.23.1）
> 定位：**取证工具**，只产出证据，不替代 `seo-process.md` 的决策流程和本地 skill 的真值判断
> 本文件记录安装状态、网络约束与首轮技术爬取基线；GSC 周期数据见 [`gsc-data-log.md`](gsc-data-log.md)

## 1. 安装与授权状态

- `seo` v0.2.36 已通过 `npm i -g seo` 全局安装；`seo doctor` 基础检查通过。
- 匿名遥测已关闭（`seo telemetry disable`，与项目隐私纪律一致）。
- Google 只读授权已完成：账号 `zhangyifuzjg@gmail.com`，Scope 为 Search Console 只读 + Google Analytics 只读，OAuth app 为 `SEO Skill app`。
- GSC 属性可见：`sc-domain:athletikapparel.com`（siteOwner）。
- 已于 2026-08-20 建立默认项目 Profile `athletikapparel`：绑定 GSC `sc-domain:athletikapparel.com`、GA4 `547377703`、规范站、品牌词与 10 个重点监控 URL。Profile 和 OAuth 留在本机，不进入 Git。
- 原始 JSON 报告保存在本机 `~/seo-reports/`（仓库外，不进 Git）：
  - `baseline-2026-08-18.json`（技术爬取，crawl ID `crawl_49a0a4ec2cdc45f98efde6997e4464c1`）
  - `gsc-report-2026-08-18.json`（主报告）
  - `gsc-perf-overview-2026-08-18.json`（90 天表现总览）
  - `gsc-pages-28d.json` / `gsc-queries-28d.json` / `gsc-countries-28d.json`
  - 2026-08-20 生产后 Crawl Snapshot：`crawl_3f1fc0fbb955403791272722942441a9`
  - 2026-08-25 SEO-IMP-024 部署后 Crawl Snapshot：`crawl_c3321e593dcd4a54bec9811ec8775f40`
  - 2026-08-25 SEO-IMP-035–038 部署后 Crawl Snapshot：`crawl_40f88b6c25d74ba79ee193c7be26caf9`

## 2. 网络约束（重要操作经验）

- 本机直连 Google API 不通；`seo auth login` 初始报 `fetch failed` 的原因即此。
- Fastlink（Clash 内核）系统代理端口为 `127.0.0.1:7892`，实测可连通 `accounts.google.com` 与 `oauth2.googleapis.com`。
- 所有需要访问 Google 的 `seo` 命令必须通过 Fastlink 代理运行。仅设置下列环境变量适用于原有 shell 环境：

  ```bash
  HTTPS_PROXY=http://127.0.0.1:7892 HTTP_PROXY=http://127.0.0.1:7892 seo <command>
  ```

- 2026-08-26 在当前 PowerShell 7 + Node v22.23.1 环境复核发现：`seo` 使用自带的 `undici`，只设置 `HTTPS_PROXY` / `HTTP_PROXY` 仍会报 `fetch failed`。本轮采用一次性进程级 `EnvHttpProxyAgent` 注入后成功读取 GSC / GA4；没有改动 CLI、OAuth 或项目配置。以后若复现，先用 `seo doctor --json` 核对授权，再采用同一临时注入方式，不把代理凭据写入仓库。

- `seo auth login` 是交互式流程（浏览器 + 本地回调），必须在真实终端中运行，不能放在无 TTY 的后台进程。
- 纯爬取目标站（`seo crawl` / `seo report --url`）不访问 Google，不需要代理。

## 3. 技术爬取基线与 Baseline V2 对照

2026-08-18 全站爬取：19 个 URL（17 个可索引页面 + 2 个 sitemap），18 × HTTP 200 + 1 × 404，平均响应 1529ms。工具报告 2 高 / 5 中 / 23 低，逐条核对结论：

| 工具发现 | 严重度 | 核对结论 | 处理 |
|---|---|---|---|
| `broken_internal_link` + `client_error` → `/cdn-cgi/l/email-protection` 404 | 高 ×2 | 已知：Cloudflare 邮箱混淆端点，Baseline V2 §10.3 已记录为非业务死链 | 不处理，工具通用规则无此上下文 |
| `rich_result_required_fields_missing`（4 个指南页） | 中 | 已核实生产 JSON-LD：`BreadcrumbList` 的 `position` 输出为字符串 `"1"` 而非整数（Rank Math 默认行为）；GSC URL Inspection 此前已判定路径内容有效，Google 接受该写法 | 低优先 cosmetic 候选，暂不加过滤器 |
| `x_robots_noindex` → `sitemap_index.xml` | 中 | Sitemap 本不应被索引，正确实现 | 不处理 |
| `og_description_missing` → 首页 | 低 | 与已知 V2-004 一致，工具独立复现 | 维持 V2-004 原决策（待评估） |
| `hsts_missing`（18 页） | 低 | **新观察**：全站未发送 HSTS 响应头，属 Cloudflare 层面设置 | 顺手项：可在 Cloudflare Edge Certificates 开启 HSTS，不阻塞当前部署 |
| `image_oversized_candidate` → 首页 Hero 1280w（1280×2240） | 低 | 触发条件是高度 > 2000px 启发式；该图是所有者批准的无损 Hero srcset 候选（§10.2），浏览器按 sizes 选择 | 不处理 |
| `slow_response` → Outdoor 页面与 sitemap | 低 | 与全站平均 1529ms 一致 | 观察，等真实 CWV |
| `redirected_url` → `/wp-sitemap.xml` 一跳 | 低 | 已知 SEO-009，已明确跳过 | 不处理 |

结论：自动化复现了 Baseline V2 的核心判断（无 Critical），零新增阻断问题；增量贡献为面包屑类型严格性与 HSTS 两条观察。

### 3.1 2026-08-20 生产后 Crawl Snapshot

SEO-IMP 批次完成生产部署后重新抓取：20 个 URL、0 个 fetch failure、31 个 Finding（2 High / 6 Medium / 23 Low），保存为 `crawl_3f1fc0fbb955403791272722942441a9`。

与冻结的 2026-08-18 全站基线 `crawl_49a0a4ec2cdc45f98efde6997e4464c1` 显式比较：20 个页面（+1，为新 QC Guide），无新增状态码错误，`slow_response` 由 2 降为 0。工具把可比性标为 `review-required`，因为两次抓取范围、上限或定义存在差异；因此只用于逐项复核，不能把全部 Delta 归因于本次部署。

| Delta | 解释与处置 |
|---|---|
| `hsts_missing` 18 → 19 | 新增 QC URL 延续全站同一 Cloudflare 响应头状态；仍是低优先平台配置项，不是本次页面回归 |
| `rich_result_required_fields_missing` 4 → 5 | 新 QC Guide 加入既有严格字段检查队列；按 Finding ID 核对可见内容和 Google 类型要求，不因通用规则自动补字段 |
| `image_oversized_candidate` 1 → 2 | 新增 Sportswear 启发式候选；页面已有响应式 WebP，需以浏览器实际候选和 Lab/Field 性能复核后再决定，不按尺寸启发式返工 |
| `broken_internal_link` / `client_error` | 仍为 Cloudflare `/cdn-cgi/l/email-protection` 通用端点，维持已核实的 `not-needed` 处置 |
| `x_robots_noindex` | 仍只作用于 Sitemap，维持有意控制结论 |

这份 Snapshot 作为后续生产部署比较的新参考点；比较时仍必须保持抓取参数一致，并读取完整 Caveat。

### 3.2 索引容量与模板性能基线（2026-08-20）

`index-coverage-plan` 从 Sitemap 解析出 18 个 URL；按每日检查 10 个 URL，预计 2 天完成一轮，低于 7 天目标周期。该结果只用于安排 URL Inspection 抽样容量，不代表 18 个 URL 均已收录，也没有触发请求编入索引。

四类代表页面完成首次移动端 Lighthouse Lab 基线：

| 模板 | URL | 单次 Lab LCP | CrUX 字段数据 | 当前处置 |
|---|---|---:|---|---|
| 首页 | `/` | 10.8s | 本次未检查 | `deferred`：需可重复运行并定位 LCP 资源 |
| 商业品类页 | `/sportswear-manufacturer/` | 5.2s | 本次未检查 | `deferred`：需可重复运行并定位 LCP 资源 |
| Technical Guide | `/technical-knitwear-tech-pack-guide/` | 7.2s | 本次未检查 | `deferred`：需可重复运行并定位 LCP 资源 |
| Services/Contact | `/services/` | 14.6s | 本次未检查 | `deferred`：需可重复运行并定位 LCP 资源 |

四次报告均只返回 `Improve the largest visible content` 一项。数值属于受控环境中的单次 Lab 诊断，不能当作真实用户 CWV 或排名结果；在取得重复运行和可用 CrUX 数据前，不据此直接修改页面。

### 3.3 2026-08-25 SEO-IMP-024 部署后 Crawl Snapshot

Logo 固有尺寸部署后抓取 20 个页面、0 个 fetch failure、33 个 Finding（2 High / 6 Medium / 25 Low），保存为 `crawl_c3321e593dcd4a54bec9811ec8775f40`。与 2026-08-20 Snapshot `crawl_3f1fc0fbb955403791272722942441a9` 比较结果为 `comparable / complete`：页面数不变、无新增或修复的状态码错误，唯一变差的规则是 `slow_response` 由 0 增至 2。

受影响 URL 为 `/services/` 与 `/technical-guides/`。部署后各重复请求三次：Services 约 2962 / 1247 / 1188ms，Technical Guides 约 1566 / 1243 / 1243ms，Cloudflare 均返回 `CF-Cache-Status: DYNAMIC`。该信号可以复现，但与 SEO-IMP-024 只增加两处图片固有尺寸属性的变量不匹配，因此不归因于 Logo 改动，转入 SEO-IMP-034 做 HTML 响应、缓存与 LCP 根因诊断。

其余既有 Finding 分组未变：Cloudflare 邮箱混淆端点维持 `not-needed`；Sitemap `noindex` 为有意控制；Rich Result 严格字段、HSTS、首页 `og:description`、图片尺寸启发式和 `/wp-sitemap.xml` 跳转继续按原结论处理。

### 3.4 SEO-IMP-034 性能根因诊断（2026-08-25）

五个代表 URL 的三次新连接测量中，HTML `time_starttransfer` 约为 0.70–1.02s；Cloudflare/Flywheel 仍返回 `DYNAMIC`，但此前 1.2–3.0s 的慢响应未稳定复现。本轮四模板移动端 Lab 为：首页 LCP 7.2s、Sportswear 6.9s、Tech Pack Guide 7.2s、Services 14.1s；TBT 与 CLS 均为 0，Root Document 为 280–540ms，本次仍无 CrUX。

根因优先级已经由受控资源 A/B 收敛：Services 的 1.9 MB 单一 Hero PNG 是明确 LCP 资源；首页四张 Hero 图全部 eager，阻断三张次要图时 LCP 约由 8.7s 降至 6.9s，阻断全部主题图片时约降至 4.1s。Cookiebot 单独阻断的改善约 0.6–0.8s，属于后续共同阻塞链项。详细证据、Finding outcome 与 SEO-IMP-035–038 队列见 [`performance-diagnosis-seo-imp-034-v1.md`](implementation/performance-diagnosis-seo-imp-034-v1.md)。

### 3.5 SEO-IMP-035–038 部署后验收（2026-08-25）

保存 Crawl `crawl_40f88b6c25d74ba79ee193c7be26caf9`：20 页、0 fetch failure、31 个 Finding（2 High / 6 Medium / 23 Low）。与 `crawl_c3321e593dcd4a54bec9811ec8775f40` 比较时工具标记 `review-required`，原因是 maxPages / 配置 ID 不同；在该 Caveat 下，页面数不变、无新增状态码错误、无 Title 或 indexability 变化，唯一改善分组是 `slow_response` 从 2 降为 0。另一次即时同参数 Crawl Diff run `56e0bbeb-466a-4079-8e80-9a16a01c9927` 覆盖 21 URL，added / removed / changed / new errors / indexability flips 均为 0；4 个 Warning 都是既有 MP4 超出工具 5 MB 响应上限。

四模板各取得 3 次有效移动端 Lighthouse Lab：

| 模板 | LCP 中位数 | FCP 中位数 | TBT 中位数 | CLS 中位数 | 部署前单次 LCP |
|---|---:|---:|---:|---:|---:|
| 首页 | 3.68s | 3.68s | 42ms | 0 | 7.2s |
| Services | 5.00s | 4.50s | 0ms | 0 | 14.1s |
| Sportswear | 3.43s | 3.43s | 0ms | 0 | 6.9s |
| Tech Pack Guide | 3.30s | 3.30s | 0ms | 0 | 7.2s |

Tech Pack 有 1 次 `dataStatus: partial` / `fetch-fallback` 失败样本，已排除并补跑，不计作 0。Services 移动端实际选择 800w、328,508-byte Hero；首页保持 1 个 eager/high 与 3 个 lazy/low；Google Fonts 引用为 0。上述改善是同批部署后的方向性 Lab 证据，不等同 CrUX、排名或单项因果。四页整体 LCP Finding 均继续标记 `deferred`，图片/字体实施决策为 `keep`。

部署后 HTML 监测 15 个请求全部 200，各页 TTFB 中位数为 0.89–1.22s；Services 1.22s 仅轻微进入 review，没有满足 `host-escalation-ready`，继续 `keep-monitoring`。

### 3.6 SEO-V2-003 首轮监测（2026-08-27）

索引侧先运行完整 `index-coverage`，再按既定每日 10 个 URL 配额运行 `index-monitor`。18 个 Sitemap URL 中首批选择 10 个，全部成功返回 `indexed / PASS`，0 failed、0 quota blocked、0 current issue。QC Guide 的 Google 最后抓取时间为 `2026-08-26T13:41:31Z`，Google Canonical 与用户 Canonical 均为规范 URL；其余 8 个 URL 因本批上限标记为 `unselectedDue`，不是失败。逐 URL 结果见 [`gsc-data-log.md`](gsc-data-log.md)。

保存新生产 Crawl `crawl_25cbeefdbea740e2b2a571976e535de7`：20 页、0 fetch failure、18 个可索引页面、2 个预期非索引端点；19 × HTTP 200 + 1 × Cloudflare `/cdn-cgi/l/email-protection` 404。Page Sitemap 完整返回 18 个 URL，所有业务页面均为单一 H1、自引用 Canonical、允许索引。与冻结 Crawl `crawl_40f88b6c25d74ba79ee193c7be26caf9` 比较：页面数、状态码错误、Title 和 indexability 均无变化；工具把可比性标为 `review-required`，因为本轮使用 `refresh=true`、concurrency 4，而基线为缓存读取、concurrency 8。因此平均响应 85ms → 1030ms 不作为性能回归或主机升级证据。

| Finding | 本轮数量 | 证据与处置 |
|---|---:|---|
| `broken_internal_link` / `client_error` | 各 1 | 仍只指向 Cloudflare `/cdn-cgi/l/email-protection`；`not-needed` |
| `rich_result_required_fields_missing` | 5 | 仍为 Breadcrumb `position` 字符串的已知严格类型检查；`not-needed`，不为工具分数添加过滤器 |
| `x_robots_noindex` | 1 | 仍只作用于 Sitemap；有意控制，`not-needed` |
| `hsts_missing` | 19 | 无变化；保持 SEO-V2-014 `owner-action / deferred` |
| `og_description_missing` | 1 | 首页既有低优先社交字段观察；`deferred` |
| `image_oversized_candidate` | 2 | 首页和 Sportswear 的既有启发式候选；响应式实现与既有验收不变，`not-needed / monitoring` |
| `redirected_url` | 1 | `/wp-sitemap.xml` 单跳到 Rank Math Sitemap；有意控制，`not-needed` |
| `broken_external_link` | 0 | OEM Evaluation Guide 的旧 GOTS URL 曾对 HEAD/GET 均返回 404；生产部署后定向 Crawl 已确认当前官方 URL 为 200，`fixed` |

新增外链 Finding 的失效条件是旧 URL 恢复 2xx/有效跳转，或页面改用仍支持原陈述的官方来源。2026-08-27 实时核验确认当前 GOTS 官方说明已迁移至 `https://global-standards.org/our-standards/gots/how-it-works`，该 URL 返回 200，且内容仍覆盖加工、制造和贸易阶段的认证要求。同日已同步更新 `inc/technical-article-data.php`、`template-parts/technical-article/content-evaluate-technical-knitwear-oem.php` 与 owner-approved publication source；没有修改正文、页面 URL、Title、H1 或主要页面所有权。

生产部署后保存定向验收 Crawl `crawl_44a15b2ff9d84b4e8324057f94bd67b1`：`mode=page`、`refresh=true`、1 页、HTTP 200、可索引、0 fetch failure。完整 HTML 已输出新 GOTS URL，外链 HEAD 验证为 200，`confirmed-broken=0`，因此该 Finding 结论为 `fixed`。外链验证整体仍为 `partial`，原因是 1 个社交平台 URL provider-blocked、3 个社交/消息 URL unavailable，与 GOTS 修复无关；Breadcrumb 严格 `position` 与 HSTS 仍沿用既有 `not-needed` / `deferred` 处置。本 Finding 的重开条件是生产 HTML 再次输出旧 URL，或当前 GOTS URL 在后续受控验证中成为 confirmed-broken。

全站 Crawl 当时的外链验证状态为 `partial`：27 个保留 URL 中 15 available、1 confirmed-broken、6 provider-blocked、5 unavailable。provider-blocked / unavailable 不计作死链，也不触发删除；其中唯一 confirmed-broken 的 GOTS URL 已通过上述生产定向验收关闭。

### 3.7 SEO-V2-003 第二批 URL Inspection 尝试（2026-08-27）

对首轮未选择的 8 个 Sitemap URL 运行定向 `index-watch`。本次返回 `dataStatus=partial`：`requested=8`、`unique=8`、`attempted=0`、`inspected=0`、`failed=0`、`quotaBlocked=1`、`deferred=7`、`currentIssues=0`。Services 先命中本机保守 UTC 日配额，其余 7 个 URL 随后 deferred；所有项目均为 `requestSent=false`、`indexStatus=unknown`，没有产生新的 Google URL Inspection 证据。统一重试时间为 `2026-08-28T00:00:00Z`（北京时间 08:00）。

同轮完整 `index-coverage` 的直连与仅设置代理环境变量调用先返回 `INTERNAL_ERROR: fetch failed`；按本文件第 2 节的既有网络约束改用一次性 `EnvHttpProxyAgent` 注入后刷新成功。结果仍为 21 个跨源唯一 URL、18 个有保留 Search Analytics 可见性、1 个可抓取但无保留可见性的 QC Guide、2 个预期非索引端点，Crawl / Sitemap / Search Console completeness 均为 `complete`，没有新增 coverage Finding。8 个目标 URL 继续沿用首轮完整清单，第二批 Inspection 处置为 `deferred / quota`。重开动作是在上述时间后只重试这 8 个 URL；验收标准是 8 个 URL 均返回可读 Inspection 结果，并逐项记录 verdict、canonical 与最后抓取时间。

2026-08-28 配额重置后只重试同一 8 个 URL。本次 `dataStatus=complete`：8/8 attempted、8/8 inspected、0 failed、0 quota blocked、0 deferred。Silk Wear、Sports Accessories、Sportswear、Sustainability、Technical Guides Hub、Tech Pack Guide 与 Underwear 共 7 个 URL 均为 `PASS / Submitted and indexed`，Google Canonical 与用户 Canonical 一致；Services 为 `NEUTRAL / Discovered - currently not indexed`，未返回 canonical 或最后抓取时间。两批合计 18 个 Sitemap 页面中 17 个 PASS、1 个 Services 待复核。

Services 的生产 targeted 复核为 HTTP 200、`index,follow`、自引用 canonical、无 X-Robots-Tag，存在于 `page-sitemap.xml` 且首页有 5 个入口。当前无代码、robots、canonical、Sitemap 或发现路径阻塞证据；不改页面，转为 GSC 网页版“测试实际网址”，通过后只请求编入索引一次。逐 URL 结果与 Finding 处置见 [`gsc-data-log.md`](gsc-data-log.md)。

同轮完整读取生产 `page-sitemap.xml` 时确认 19 个条目对应 18 个唯一 URL；QC Guide 以相同 URL 和 lastmod 重复两次。该项不造成唯一 URL 缺失，且 QC Guide 已 indexed / PASS，因此按 Info / P3 转为独立 Rank Math Sitemap 缓存与对象来源复核，不与 Services 未收录混合归因。

### 3.8 SEO-V2-004 LCP 与 Field CWV 复核（2026-08-27）

按既有移动端 Lighthouse 环境复核首页与 Services。首页取得 1 次完整 Lab：LCP/FCP 3.66s、TBT 0ms、CLS 0、Root Document 267ms，与 2026-08-25 的 3.68s LCP 中位数一致，没有恶化。Services 首次运行进入 `fetch-fallback`，该 3373ms 完整抓取耗时不计作 LCP、TTFB 或 CWV；补跑后取得 3 次完整 Lab，LCP 为 5.44s / 4.44s / 4.40s，中位数 4.44s，比既有 5.00s 中位数改善约 11%。Services 的 TBT 中位数 0ms、CLS 中位数 0、Root Document 中位数 246ms。

首页 LCP 仍为 Hero subhead 文字；Services LCP 仍为 800w、328,508-byte 的响应式 Hero WebP。Lighthouse 继续提示 Cookiebot / 页面 CSS 等 render-blocking 以及图片交付启发式机会，但本轮没有重复 Lab 恶化，且没有 Field CWV 证据，不能据此重开代码优化或把 Lab 分数解释为排名结果。

CrUX 数据状态为 `unavailable`：两页报告均返回 `fieldDataStatus=not_configured`，本机没有配置 `SEO_CRUX_API_KEY`；官方 PageSpeed 接口的匿名请求返回 HTTP 429，未取得 URL 级或 Origin 级字段数据。该缺口不等于 CWV 为 0 或通过。SEO-V2-004 当前结论为 `no-change / monitoring`；重开条件仍是取得可用且 scope 明确的 CrUX 字段数据，或同环境重复 Lab 出现稳定恶化。若以后只有 Origin 级 CrUX，必须与页面级 Lab 分开记录。

## 4. GSC 数据

GSC 周期性数据快照已移入独立持续记录文件 [`gsc-data-log.md`](gsc-data-log.md)，
首轮 28 天数据（2026-07-17 至 2026-08-13）见该文件的 2026-08-18 条目。

## 5. 例行命令（可重复）

```bash
# 检查本机项目、授权和报告输入
seo doctor --json
seo projects list --json
seo reports describe crawl-diff --json

# 技术爬取（无需代理）
seo crawl https://www.athletikapparel.com --save

# 与明确指定的同范围基线比较（部署验收用）
seo crawl-reports --compare <after-crawl-id> --against <before-crawl-id>
```

GSC 数据导出命令见 [`gsc-data-log.md`](gsc-data-log.md)。

## 6. 后续待办

- [x] 建立默认项目 Profile 并绑定 GSC、GA4、品牌词和重点 URL；
- [x] SEO 批次部署后保存新 Crawl Snapshot，并与 2026-08-18 全站基线显式比较；
- [x] 建立 quota-aware `index-coverage-plan`：Sitemap 当前解析出 18 个 URL，按每日 10 个 URL 预计 2 天完成一轮，低于 7 天目标周期；该报告只制定抽样容量，不代表页面已经收录；
- [x] 核对 GA4 `generate_lead` 与 Organic Landing Page：2026-07-26 至 08-22 的 Organic Search 为 2 sessions、0 `generate_lead`、0 有效询盘；全站 8 次事件中有效询盘 1 次，来自 Organic Social，其余 7 次未计入有效询盘；
- [x] 为首页、商业品类页、Technical Guide、Services/Contact 各选一个模板 URL，建立首次移动端 Lighthouse 基线；本次无 CrUX 字段数据，四项均按单次 Lab 证据标记 `deferred`；
- [x] SEO-IMP-024 部署后保存 Crawl Snapshot 并完成可比回归检查；Logo 生产验收通过，慢响应转入独立诊断；
- [x] SEO-IMP-035–038 合并部署生产验收完成：资源、字体、HTML、视觉、重复 Lab、响应窗口与 Crawl 均已归档；035–037 `keep`，038 `keep-monitoring`；
- [ ] 按上述容量使用代表性 URL 做周期 Index Snapshot，并为四类模板补充重复 Lab 运行与可用 CrUX 数据；
- [x] 首次完整 GSC / GA4 28 天基线已归档到 [`gsc-data-log.md`](gsc-data-log.md)，并与 `seo-process.md` 月度复盘模板对齐；后续继续按月追加；
- [ ] Cloudflare HSTS 开启（低优先顺手项）。
