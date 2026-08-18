# SEO CLI 工具接入与首轮自动化基线（2026-08-18）

> 工具：[`iannuttall/seo`](https://github.com/iannuttall/seo)（Apache-2.0，本地 CLI + MCP）
> 安装版本：v0.2.36，全局 npm 安装于本机（Node v22.23.1）
> 定位：**取证工具**，只产出证据，不替代 `seo-process.md` 的决策流程和本地 skill 的真值判断
> 本文件记录安装状态、网络约束与首轮技术爬取基线；GSC 周期数据见 [`gsc-data-log.md`](gsc-data-log.md)

## 1. 安装与授权状态

- `seo` v0.2.36 已通过 `npm i -g seo` 全局安装；`seo doctor` 基础检查通过。
- 匿名遥测已关闭（`seo telemetry disable`，与项目隐私纪律一致）。
- Google 只读授权已完成：账号 `zhangyifuzjg@gmail.com`，Scope 为 Search Console 只读 + Google Analytics 只读，OAuth app 为 `SEO Skill app`。
- GSC 属性可见：`sc-domain:athletikapparel.com`（siteOwner）。
- GA4 属性可见：`547377703`（`www.athletikapparel.com`，账号 Athletik Clothing），尚未绑定进项目 profile。
- 原始 JSON 报告保存在本机 `~/seo-reports/`（仓库外，不进 Git）：
  - `baseline-2026-08-18.json`（技术爬取，crawl ID `crawl_49a0a4ec2cdc45f98efde6997e4464c1`）
  - `gsc-report-2026-08-18.json`（主报告）
  - `gsc-perf-overview-2026-08-18.json`（90 天表现总览）
  - `gsc-pages-28d.json` / `gsc-queries-28d.json` / `gsc-countries-28d.json`

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

## 4. GSC 数据

GSC 周期性数据快照已移入独立持续记录文件 [`gsc-data-log.md`](gsc-data-log.md)，
首轮 28 天数据（2026-07-17 至 2026-08-13）见该文件的 2026-08-18 条目。

## 5. 例行命令（可重复）

```bash
# 技术爬取（无需代理）
seo crawl https://www.athletikapparel.com --save

# 与上一次爬取对比（部署验收用）
seo crawl-reports --compare latest --against previous
```

GSC 数据导出命令见 [`gsc-data-log.md`](gsc-data-log.md)。

## 6. 后续待办

- [ ] 绑定 GA4 属性 `547377703` 进项目 profile，使报告可关联 `generate_lead` 落地页数据；
- [ ] SEO-IMP-001–010 部署后：跑一次 `seo crawl --save` 并与本次基线 `--compare`，替代人工逐页查源代码；
- [ ] 每月例行 GSC 导出归档到 [`gsc-data-log.md`](gsc-data-log.md)，与 `seo-process.md` 月度复盘模板对齐；
- [ ] Cloudflare HSTS 开启（低优先顺手项）。
