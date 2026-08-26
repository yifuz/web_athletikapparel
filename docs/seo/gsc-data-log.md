# GSC / GA4 / 询盘数据记录（持续更新）

> 网站属性：`sc-domain:athletikapparel.com`（siteOwner）
> GA4 Property：`547377703`
> 用途：按 `seo-process.md` 阶段 B / 阶段 L 保存 Google Search Console、GA4 与人工询盘核验的周期性数据快照，
> 作为 Title/Meta 测试、页面优先级、获客质量和月度复盘的一方数据真值。
> 数据获取：2026-08-18 起通过 `seo` CLI 只读 API 导出（接入记录见
> [`seo-cli-baseline-2026-08-18.md`](seo-cli-baseline-2026-08-18.md)）；更早的数据为网页版手工截图。
> 原始 JSON 存于本机 `~/seo-reports/`（不进 Git）。
>
> 记录纪律：
> - GSC 对低量查询做匿名化处理；某维度单行缺失不等于零流量，各维度合计口径可能不同。
> - GA4 `generate_lead` 是分析事件，不自动等于真实、有效或合格 B2B 询盘；必须与表单、收件箱或 CRM 人工核对。
> - 样本低于 100 曝光门槛时只记录方向，不触发页面修改（`seo-process.md` §5）。
> - 新条目追加在最新日期处，不覆写历史快照。

## 2026-08-26：SEO-V2-002 28 天基线（2026-07-26 至 2026-08-22）

这是 GSC 可返回 `dataState: final` 的最新完整 28 天窗口。对比窗口 2026-06-28 至 07-25 大部分位于 2026-07-22 正式上线前，因此本轮建立上线后基线，不把前后差异写成自然增长或改版因果。

### 数据完整性

- GSC：总量、Page、Query、Country、Device 与 Query × Page 均完成全量 API 读取；Page 19 行、Query 6 行、Country 34 行、Device 2 行，均无分页截断。Query 仍受低量匿名化影响，缺失查询不等于零需求。
- GA4：同一窗口完成 Channel、Organic Landing Page 与 `generate_lead` 读取；API 未返回 sampling metadata。Property 时区为 `Asia/Shanghai`。Consent 和埋点口径仍可能使 GA4 与 GSC 不一一对应。
- 询盘：状态为 `partial / owner-input`。本轮无表单后台、最终收件箱或 CRM 读取权限；下方 8 次 `generate_lead` 只能作为待核对事件，不能直接写成 8 条真实或合格询盘。

### GSC 总量与设备

总量为 5 次点击、184 次曝光、2.72% CTR、平均排名 21.3。

| Device | 点击 | 曝光 | CTR | 平均排名 |
|---|---:|---:|---:|---:|
| Desktop | 5 | 164 | 3.05% | 23.1 |
| Mobile | 0 | 20 | 0% | 6.6 |

### GSC 页面

Page 维度按 URL 计数，多个本站结果可在同一搜索结果中分别产生曝光，因此各行不可与 Property 总量机械相加。

| 页面 | 点击 | 曝光 | CTR | 平均排名 |
|---|---:|---:|---:|---:|
| `http://athletikapparel.com/`（非规范变体） | 2 | 8 | 25.00% | 4.4 |
| `/` | 2 | 67 | 2.99% | 5.7 |
| `/merino-wool-manufacturer/` | 1 | 16 | 6.25% | 19.5 |
| `/#ma-home-categories-title` | 0 | 1 | 0% | 8.0 |
| `/about-us/` | 0 | 31 | 0% | 5.9 |
| `/contact/` | 0 | 14 | 0% | 27.6 |
| `/evaluate-technical-knitwear-oem/` | 0 | 8 | 0% | 16.5 |
| `/flatlock-vs-overlock-technical-knitwear/` | 0 | 26 | 0% | 26.3 |
| `/knitted-fabrics-manufacturer/` | 0 | 15 | 0% | 49.1 |
| `/outdoor-clothing-manufacturer/` | 0 | 21 | 0% | 25.3 |
| `/privacy-policy/` | 0 | 21 | 0% | 8.9 |
| `/services/` | 0 | 1 | 0% | 8.0 |
| `/silk-wear-manufacturer/` | 0 | 13 | 0% | 13.9 |
| `/sports-accessories-manufacturer/` | 0 | 20 | 0% | 6.9 |
| `/sportswear-manufacturer/` | 0 | 27 | 0% | 9.5 |
| `/sustainability/` | 0 | 15 | 0% | 12.2 |
| `/technical-guides/` | 0 | 6 | 0% | 23.2 |
| `/technical-knitwear-tech-pack-guide/` | 0 | 23 | 0% | 16.7 |
| `/underwear-manufacturer/` | 0 | 19 | 0% | 24.9 |

`/garment-quality-control-checklist/` 未进入 Page 返回行。该页面较新且 Query/Page 数据受延迟和低量保护影响，本次只记为 `monitoring`，不写成零曝光、未收录或页面失败。

### GSC 查询

| Query | Target page | 点击 | 曝光 | 平均排名 |
|---|---|---:|---:|---:|
| `atheletik` | `/` | 0 | 1 | 1.0 |
| `athletik` | `/` | 0 | 1 | 5.0 |
| `athletique clothing` | `/` | 0 | 1 | 22.0 |
| `flatlock vs overlock` | `/flatlock-vs-overlock-technical-knitwear/` | 0 | 2 | 22.5 |
| `overlock vs flatlock` | `/flatlock-vs-overlock-technical-knitwear/` | 0 | 1 | 11.0 |
| `sukartik clothing private limited` | `/sportswear-manufacturer/` | 0 | 1 | 45.0 |

可见 Query 只覆盖 7 次曝光，不能代表全部 184 次 Property 曝光。两条 FLATLOCK / OVERLOCK 非品牌变体是首轮可见的指南发现信号，但合计仅 3 次曝光，不触发内容或 Title/Meta 修改。

### GSC 国家

| 目标市场 | 点击 | 曝光 | CTR | 平均排名 |
|---|---:|---:|---:|---:|
| US | 3 | 96 | 3.13% | 16.8 |
| CA | 0 | 7 | 0% | 3.9 |
| GB | 0 | 7 | 0% | 10.4 |
| DE | 0 | 4 | 0% | 4.8 |
| NL | 0 | 2 | 0% | 8.0 |
| SE | 0 | 3 | 0% | 1.7 |

Israel 为 1 点击 / 1 曝光，Türkiye 为 1 点击 / 6 曝光。其余完整返回行为：ARG 1、AUS 1、BGD 2、CHN 4、DNK 1、ESP 1、FRA 1、GHA 1、HKG 3、IDN 2、IND 10、JOR 1、KAZ 1、KOR 1、MAR 2、MEX 1、MYS 2、PAK 2、PHL 7、RUS 1、SAU 1、SGP 2、SVK 2、UKR 1、UZB 1、VNM 6 次曝光，均 0 点击。NO / FI 本轮无返回行；缺行不等于零搜索需求。

### GA4 Organic Search 与 `generate_lead`

| Channel | Sessions | Total users | Event count | Key events |
|---|---:|---:|---:|---:|
| Direct | 94 | 81 | 407 | 2 |
| Organic Social | 37 | 29 | 220 | 1 |
| Paid Search | 24 | 16 | 104 | 1 |
| Organic Search | 2 | 2 | 10 | 0 |
| Unassigned | 2 | 1 | 8 | 0 |
| AI Assistant | 1 | 1 | 2 | 0 |

Organic Search 只有一个 Landing Page 行：`/` 为 2 sessions、2 users、10 events、0 key events。Organic Search × `generate_lead` 返回 0 行，因此本窗口没有可归因到自然搜索的 GA4 lead event。

全站 `generate_lead` 返回 8 次 event count、4 次 key events：

| 日期 | Channel | Landing Page | Event count | Key events |
|---|---|---|---:|---:|
| 2026-07-28 | Direct | `/` | 1 | 0 |
| 2026-07-29 | Direct | `/` | 1 | 0 |
| 2026-08-01 | Organic Social | `/` | 1 | 0 |
| 2026-08-05 | Direct | `/contact` | 1 | 1 |
| 2026-08-05 | Direct | `/outdoor-clothing-manufacturer` | 1 | 1 |
| 2026-08-05 | Paid Search | `/contact` | 1 | 0 |
| 2026-08-05 | Paid Search | `/sportswear-manufacturer` | 1 | 1 |
| 2026-08-10 | Organic Social | `/` | 1 | 1 |

`eventCount` 与 `keyEvents` 的 8 / 4 差异与窗口内可能存在的事件配置启用时间相容，但本轮未取得管理界面变更记录，不能确定原因。月度基线继续以 `eventName = generate_lead` 的 event count 作技术信号，以人工确认的有效/合格询盘作业务结果。

### 页面级决策与 Finding outcome

- `no-change / deferred`：没有单页或可比较 Query × Page 达到 100 曝光门槛；不修改 URL、Title、Meta、H1、正文或页面所有权，不新增近义页面。
- `monitoring`：首页、About、Sports Accessories 与 Sportswear 已出现靠前但低量曝光；Merino 获得 1 次点击；FLATLOCK 指南出现首批非品牌查询。以上只建立方向，不形成因果结论。
- `monitoring`：最近 7 天曝光相对前 21 天日均上升 92.9%，点击下降 25%；只有曝光达到异常阈值。报告识别到算法更新时间重叠，但未建立归因，不据此改站。
- `owner-input`：请所有者对上表 8 个日期/渠道/落地页在 Fluent Forms、最终收件箱或 CRM 中核对，并仅返回汇总：真实询盘数、合格 B2B 询盘数、测试/垃圾数；无需把联系人个人数据写入 Git。

## 2026-08-26：QC Guide 已请求编入索引

- 所有者确认已在 GSC 网页版对 `/garment-quality-control-checklist/` 请求编入索引；SEO-V2-001 的平台操作已完成。
- 证据来源为所有者操作确认，数据状态为 `partial`：本次未提供 GSC 截图，因此“测试实际网址”的精确结论、当前索引覆盖分类、最后抓取日期与状态均为 `unavailable`，不得据此写成已收录。
- 处置结论：SEO-V2-001 标记为 `completed`；不重复请求、不改写页面，后续发现、抓取、收录和首次曝光统一归入 SEO-V2-003 的正常监测窗口。未收录或报告延迟本身不等于页面失败。

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
