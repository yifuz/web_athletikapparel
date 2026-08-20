# GSC 数据记录（持续更新）

> 网站属性：`sc-domain:athletikapparel.com`（siteOwner）
> 用途：按 `seo-process.md` 阶段 B / 阶段 L 保存 Google Search Console 的周期性数据快照，
> 作为 Title/Meta 测试、页面优先级和月度复盘的一方数据真值。
> 数据获取：2026-08-18 起通过 `seo` CLI 只读 API 导出（接入记录见
> [`seo-cli-baseline-2026-08-18.md`](seo-cli-baseline-2026-08-18.md)）；更早的数据为网页版手工截图。
> 原始 JSON 存于本机 `~/seo-reports/`（不进 Git）。
>
> 记录纪律：
> - GSC 对低量查询做匿名化处理；某维度单行缺失不等于零流量，各维度合计口径可能不同。
> - 样本低于 100 曝光门槛时只记录方向，不触发页面修改（`seo-process.md` §5）。
> - 新条目追加在最新日期处，不覆写历史快照。

## 2026-08-20：QC Guide 部署与 URL Inspection 尝试

- `/garment-quality-control-checklist/` 已完成生产部署，普通浏览器、Googlebot、OAI-SearchBot 和 PerplexityBot 请求均返回 HTTP 200；Canonical 自指，robots meta 为 `follow, index`，Page Sitemap 已包含该 URL。
- `seo technical-watch` 使用 `sc-domain:athletikapparel.com` 对该 URL 发起只读 URL Inspection；API 返回 `internal_error: fetch failed`，本次状态为 `partial`，未获得 Google 索引快照。
- 该错误表示 URL Inspection 检查不完整，不等于页面抓取或索引失败。下一步在 GSC 网页版执行“测试实际网址”，通过后请求编入索引；不要在结果出现前重复改写页面。

## 2026-08-18：28 天窗口（2026-07-17 至 2026-08-13）

对比窗口 2026-06-19 至 07-16 为上线前，无数据属预期；本轮为上线后单窗口数据，不存在环比下降。
总量与 2026-08-15 网页版截图一致（国家口径 5 点击 / 94 曝光），API 数据通道与手工观察一致。

### 页面（含匿名化行，合计 170 曝光）

| 页面 | 点击 | 曝光 | 平均排名 |
|---|---:|---:|---:|
| `/` | 3 | 55 | 6.5 |
| `/about-us/` | 0 | 20 | 5.7 |
| `/sportswear-manufacturer/` | 0 | 16 | 10.0 |
| `/underwear-manufacturer/` | 0 | 10 | 26.9 |
| `/merino-wool-manufacturer/` | 0 | 9 | 14.9 |
| `/sports-accessories-manufacturer/` | 0 | 9 | 4.3 |
| `http://athletikapparel.com/`（非规范变体） | 2 | 8 | 4.4 |
| `/knitted-fabrics-manufacturer/` | 0 | 8 | 38.8 |
| `/privacy-policy/` | 0 | 8 | 9.0 |
| `/outdoor-clothing-manufacturer/` | 0 | 7 | 17.6 |
| `/technical-knitwear-tech-pack-guide/` | 0 | 7 | 10.7 |
| `/flatlock-vs-overlock-technical-knitwear/` | 0 | 4 | 20.0 |
| `/sustainability/` | 0 | 4 | 8.0 |
| 其余 5 页（contact / evaluate-oem / services / guides hub / 首页锚点） | 0 | 各 1 | 8–30 |

### 查询

仅 4 行品牌变体词可见：`atheletik`（1 曝光，排名 1）、`athletik`（1，5）、
`athletique clothing`（1，22）、`sukartik clothing private limited`（1，45），均 0 点击。
无非品牌查询进入可见行。

### 国家（目标市场节选）

| 国家 | 点击 | 曝光 | 平均排名 |
|---|---:|---:|---:|
| US | 2 | 51 | 13.7 |
| CA | 0 | 7 | 4.7 |
| DE | 0 | 3 | 3.7 |
| GB | 0 | 3 | 14.0 |
| NL | 0 | 2 | 8.0 |

另有土耳其、丹麦、以色列各 1 次点击（非目标市场，样本噪声）。SE / NO / FI 本轮无可见行。

### 本轮解读与决策

- 样本远低于 100 曝光观察门槛：本轮不触发任何 Title/Meta/正文修改。
- `sportswear-manufacturer` 16 曝光、平均排名 10.0，是最接近第一页的商业页；
  `knitted-fabrics-manufacturer` 排名 38.8 最靠后——与关键词研究的竞争度判断方向一致，仅作方向记录。
- `http://athletikapparel.com/` 非规范变体出现 2 点击 / 8 曝光：Canonical 与跳转链工作正常
  （GSC 按页面归组时可能分开显示），不处理，持续观察。
- 90 天总览中"日均曝光 2.3 → 9.3"的 anomaly 信号对应网站上线与指南发布，属预期，不是异常流量事件。
- GSC 网页版 Page indexing 的未收录原因示例 URL 无 API，仍需登录网页版人工核对。

### 例行导出命令

```bash
export HTTPS_PROXY=http://127.0.0.1:7892 HTTP_PROXY=http://127.0.0.1:7892
seo reports run segment-impact --params '{"site":"sc-domain:athletikapparel.com","dimension":"query","days":28,"compareDays":28,"maxRows":100}' --json
# dimension 可换 page / country；代理端口以本机 Fastlink 实际系统代理为准
```

---

## 2026-08-15（网页版截图，历史补录）

3 个月视图（可见区间 2026-07-21 至 08-12）：总点击 5、总曝光 94、平均 CTR 5.3%、平均排名 12.7。
查询表 4 行品牌变体词各 1 曝光 0 点击。Sitemap 状态成功，2026-08-13 最后读取，发现 17 个网页。
4 个 Technical Guides URL Inspection 均显示已收录、HTTPS 通过。
Page indexing 汇总停留在 2026-08-07（已收录 11 / 未收录 12），早于指南上线，不代表当前覆盖率。
Core Web Vitals 移动端与桌面端均因 90 天数据不足无现场结论。
