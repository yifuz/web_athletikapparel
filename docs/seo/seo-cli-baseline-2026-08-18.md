# SEO CLI 工具接入、首轮与生产后基线（2026-08-18 至 2026-08-20）

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

## 2. 网络约束（重要操作经验）

- 本机直连 Google API 不通；`seo auth login` 初始报 `fetch failed` 的原因即此。
- Fastlink（Clash 内核）系统代理端口为 `127.0.0.1:7892`，实测可连通 `accounts.google.com` 与 `oauth2.googleapis.com`。
- 所有需要访问 Google 的 `seo` 命令必须带代理环境变量运行：

  ```bash
  HTTPS_PROXY=http://127.0.0.1:7892 HTTP_PROXY=http://127.0.0.1:7892 seo <command>
  ```

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
- [ ] 核对 GA4 `generate_lead` 的实际事件与 Landing Page 数据，再启用转化层面的月度报告；
- [x] 为首页、商业品类页、Technical Guide、Services/Contact 各选一个模板 URL，建立首次移动端 Lighthouse 基线；本次无 CrUX 字段数据，四项均按单次 Lab 证据标记 `deferred`；
- [ ] 按上述容量使用代表性 URL 做周期 Index Snapshot，并为四类模板补充重复 Lab 运行与可用 CrUX 数据；
- [ ] 每月例行 GSC 导出归档到 [`gsc-data-log.md`](gsc-data-log.md)，与 `seo-process.md` 月度复盘模板对齐；
- [ ] Cloudflare HSTS 开启（低优先顺手项）。
