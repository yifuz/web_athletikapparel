# Athletik SEO CLI 路由（中文阅读版）

> 本文件是 `seo-cli-routing.md` 的简体中文阅读版。实际执行以英文文件为准。

只有任务需要结构化抓取、GSC、GA4、性能、索引、链接、竞品、AI Search 或回退证据时，才读取本参考。

## 维护基线

- 站点：`sc-domain:athletikapparel.com`
- 抓取起点：`https://www.athletikapparel.com/`
- GA4 property：`547377703`
- 已验证 CLI 版本：`0.2.36`
- 路由表最后验证日期：`2026-08-27`

认证、账户身份、代理设置、已保存项目和旧 crawl ID 都属于本机状态，不要写入受版本控制的参考文件。非秘密项目基线记录在 `docs/seo/seo-cli-baseline-2026-08-18.md`。

## 预检与发现

1. 运行 `seo --version` 和 `seo doctor --json`。未经明确授权，不得重新安装或修复 CLI。
2. 将已安装版本与上面的已验证版本比较。版本不同表示需要兼容性复核，不代表自动失败；使用前应列出报告并验证所选路由。
3. 存在已保存的 `athletikapparel` 项目时优先使用；否则显式传入 site、URL 和 GA4 property。
4. CLI 版本变化或找不到路由时，运行 `seo reports list --json`。
5. 首次使用某个报告前运行 `seo reports describe <report-id> --json`，遵守 `readOrder`、`doNotClaim`、验证要求、限制和 schema。
6. 只运行第一个足以回答问题的报告；只有返回证据确实需要时，才升级到另一个报告。
7. 实施决策需要 action view，并保留完整结构化结果。不得通过 `head` 截断或丢弃 finding、inventory、warning 或分页。

## 报告路由

| 任务 | 首个报告或命令 | 仅在需要时升级 |
|---|---|---|
| 广泛生产审计 | `report` | `site-crawl`、`top-fixes`、`affected-urls` |
| 单页审计 | `audit-page` | `performance-audit`、源代码检查 |
| 指定发布 URL | `audit-urls` | `crawl-diff` |
| 部署后回退 | `crawl-diff` | `compare-crawls`、`affected-urls` |
| 索引诊断 | `index-coverage` | `index-coverage-plan`、`index-monitor`、`index-watch` |
| 流量或点击下降 | `search-performance-overview` | `traffic-anomaly`、`segment-impact`、`decaying-pages` |
| 现有页面增长 | `page-opportunities` | `quick-wins`、`second-page`、`striking-distance` |
| CTR 调查 | `ctr-underperformers` | 手动 SERP 和摘要复核 |
| 查询词重叠 | `cannibalisation` | 页面归属和内部链接复核 |
| 内部链接机会 | `internal-links` | 源代码检查 |
| 性能 | `performance-audit` | `audit-page`、前端源代码检查 |
| 已知 SEO 变更 | `measure-change` | `segment-impact`；不得声称因果关系 |
| 月度优先事项 | `search-performance-overview` | `monthly-action-plan`、聚焦报告 |
| 内容下降 | `decaying-pages` | `refresh-priorities` |
| 竞品 | `serp-competitors` | `competitor-keyword-gap`、精确 SERP 检查 |
| 引荐链接 | `link-evidence` | `link-recovery`；provider/export 可选 |
| 实体一致性 | `entity-readiness` | 源代码、Schema 和 profile 复核 |
| AI/GEO 技术准备度 | `ai-readiness` | `geo-gaps`、`agent-readiness` |
| AI/GEO 观察 | 先使用现有固定 GEO 协议 | 将 `seo-to-ai-query`、`ai-prompt-observations` 放入独立探索组 |
| 爬虫证据 | 使用所有者提供日志的 `server-log-analysis` | 在源日志中验证重要行 |

广泛审计命令形式：

```powershell
seo report --url https://www.athletikapparel.com/ --actions-only --json
```

## 失败与降级

- CLI 缺失：报告 blocker，不自动安装。
- 版本不匹配：通过 `reports list` 和 `reports describe` 验证路由。
- 认证失败：继续使用抓取/源代码证据，将 GSC 或 GA4 标记为 unavailable。
- 网络、DNS、超时或限流：同一来源最多重试一次，然后带着明确限制继续。
- 报告失败：保留成功证据，说明失败范围，不得声称完成了全量审计。
- provider 缺失：使用所有者提供的 export 或报告记录的 research-file schema；不得猜测字段映射。

## 广泛审计完成规则

对每个返回 finding 和 inventory URL 记录：

- 精确 ID/title 和 `fix`/`review` 类型；
- 处置结果及原因；
- 已修改文件或外部责任人操作（如有）；
- 验证结果；
- 尚未解决的覆盖范围或数据限制。

实施修复后重新运行原报告。证据不足以支持编辑时，review 项可以合理结束为 `no-change`。

## 项目专用门槛

- 未达到 `seo-process.md` 的样本门槛时，不得用 CTR 报告改写元数据。
- 机会报告不能直接授权修改页面；必须先通过业务匹配、SERP intent、页面归属和证据检查。
- 使用少量、稳定、搜索意图一致的制造业竞品；目录、出版商、市场平台、零售商和无关行业必须单独分类。
- Lighthouse 实验室数据与 CrUX 真实用户数据必须分开。
- AI prompt 观察与冻结 GEO baseline 分开；一次未提及不等于普遍缺失。
- `llms.txt` 和 IndexNow 是可选协议，不是 Google 排名因素。IndexNow 会产生外部写入，提交前必须即时获得明确授权。
- 当前范围内 Search Console URL Inspection 是只读的；请求 Google 索引仍是手动 GSC 操作。
