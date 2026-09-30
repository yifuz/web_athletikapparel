# SEO-V2-013 — 2026 Q3 技术标准与外链复核

复核日期：2026-09-30

覆盖模式：`full`

状态：`review-complete / implemented / deployment-pending`

复核执行：Codex（只读证据核验与内部记录）

生产修改审批与部署负责人：网站所有者（2026-09-30 已批准实施）

下次例行复核：不晚于 2026-12-31

## 1. 范围与证据

本轮完整复核以下 6 篇已发布 Technical Guides：

1. `/flatlock-vs-overlock-technical-knitwear/`
2. `/flatlock-vs-activeseam-technical-knitwear/`
3. `/technical-knitwear-tech-pack-guide/`
4. `/evaluate-technical-knitwear-oem/`
5. `/garment-quality-control-checklist/`
6. `/top-sportswear-manufacturers-china/`

证据包括生产 HTML、主题当前源文件、各引用 URL 的 GET 状态与最终地址，以及 ISO、ASTM、AATCC、ASQ、Textile Exchange、Global Standard、OEKO-TEX、SLCP、DHS 和 ZDHC 的当前官方页面。全站共享的 WhatsApp、Instagram、LinkedIn 公司页和 YouTube 页不属于技术引用，未计入本项目。

生产页面共出现 36 次正文/参考资料外链，去重后为 30 个 URL。主题数据中另有 3 个未渲染的供应商根域备用值；三者也做了可达性检查，但不计入生产链接总数。

## 2. 标准版本与适用范围

| 标准 | 2026-09-30 官方状态 | 页面用途与范围结论 | 处置 |
|---|---|---|---|
| ISO 4915:1991 | 现行 Edition 2；2026-07-15 起处于 systematic review | 用于 stitch-type classification；Athletik 只把 607 / 514 作为线迹参考，没有把标准当作性能保证 | `no-change / monitor` |
| ASTM D2594/D2594M-21 | ASTM 页面标记 `Active` | 页面准确限定为 certain low-power knitted fabrics，并提示 support applications 可能需要其他方法 | `no-change` |
| AATCC TM135-2025 | AATCC 当前商品页为 2025 版 | 用于 fabrics after home laundering 的 dimensional change；页面未把它误写成所有成衣或所有洗涤场景的统一方法 | `no-change` |
| ISO 3759:2011 | 现行 Edition 5；2022 年复审确认 | 用于 dimensional-change testing 的 preparation、marking 与 measurement，适用于 woven / knitted fabrics 和 made-up textile articles，页面表述一致 | `no-change` |
| ISO 5077:2007 | 现行 Edition 2；2022 年复审确认 | 用于 specified washing and drying 后的 dimensional change，页面表述一致 | `no-change` |
| ISO 2859-1:2026 | 现行 Edition 3，2026-01 发布；替代并撤销 1999 版及其 amendments/corrigendum | QC Guide 对 AQL、sample size 和 accept/reject thresholds 的概括仍与新版官方摘要一致；正文与 references 已更新为 2026 版官方入口 | `changed / deployment-pending` |
| ANSI/ASQ Z1.4-2003 (R2018) | ASQ 标记为 current edition | 页面只将其作为美国 attributes sampling 对应标准，没有写入错误版本号 | `no-change` |

补充体系复核：Textile Exchange CCS v3.1 当前正在修订，但现有 chain-of-custody、scope / transaction certificates、volume reconciliation 与 segregation 的概括仍与官方页面一致；GOTS 已发布 8.0，现有对 processing / manufacturing / trading certification 与最终标签范围的概括仍成立；OEKO-TEX STANDARD 100 已进入 Edition 01.2026，现有 harmful-substances 与 certificate scope 表述仍成立；SLCP、DHS UFLPA 与 ZDHC MRSL 的当前官方说明也与页面用途一致。因此这些项目均为 `no-change`，不因版本发布机械加入更多数字或条款。

## 3. Finding

### SEO-V2-013-F01 — ISO 2859-1 当前版引用需要明确化

- 类型：`review`
- 严重度：`Info`
- 业务优先级：`P2`
- 置信度：`Confirmed`
- 影响页面：`/garment-quality-control-checklist/`
- 数据状态：标准状态与页面内容 `complete`；标准全文为付费内容，未用于逐表验证
- 观察：ISO 官方页面确认 `ISO 2859-1:2026` 为现行 Edition 3，1999 版及其 amendment / corrigendum 已撤销。生产页仍链接 `https://www.iso.org/obp/ui/#iso:std:iso:2859:-1:en`，页面与参考资料标签都没有写明 2026 版。
- 推断：正文当前没有明示旧版，AQL 概括也没有被官方公开摘要推翻，因此不是事实性错误或索引风险；但改成稳定的现行标准落地页并写明版本，可减少季度复核歧义。
- 推翻条件：ISO 官方撤销 2026 版，或项目决定所有标准引用一律有意不标版本且通用 OBP 链接可稳定解析到现行版。
- 最小修改：将 QC Guide 正文及 references 中的 ISO 链接改为 `https://www.iso.org/standard/85464.html`，可见引用改为 `ISO 2859-1:2026`；不改 AQL 示例、URL、Title、Meta、H1、Schema 或其他页面。
- 依赖：公开正文修改已由所有者于 2026-09-30 明确批准。
- 验收：本地与生产 HTTP 200、单一 H1、正文与 references 均指向现行标准页；定向页面审计无新 indexability / canonical / schema 问题。
- 复核窗口：部署后立即技术验收；下一次季度复核不晚于 2026-12-31。
- 当前 outcome：`changed / source-verified / local-render-unavailable / deployment-pending`

### SEO-V2-013-F02 — ISO 4915 处于系统复审

- 类型：`review`
- 严重度：`Info`
- 业务优先级：`P3`
- 置信度：`Confirmed`
- 影响页面：两篇 FLATLOCK 指南
- 观察：ISO 4915:1991 仍为现行标准，但官方生命周期自 2026-07-15 起显示 `under systematic review`。
- 处置：`no-change / monitor`。在 ISO 发布确认、修订版或撤销决定前，不预先改写线迹编号或页面说明。
- 重开条件：ISO 生命周期进入 confirmed、revised 或 withdrawn，或官方发布替代版。

本轮没有 Critical 或 Warning finding。

## 4. 外链完整清单与处置

### 直接返回 HTTP 200 的 22 个生产链接

- Global Standard：GOTS how-it-works
- AATCC：TM135
- Sansan Sports：manufacturing、ODM/OEM
- SLCP：Converged Assessment Framework
- ASTM：D2594/D2594M-21
- Bella Sports：主页、About
- DHS：UFLPA
- Hucai Sportswear：Factory and Production Procedures、MOQ
- Ingor Sports：categories、custom sportswear manufacturer、产品证据页
- Merrow：MB-4DFO
- OEKO-TEX：STANDARD 100
- Yamato：FD-62Dry submodels、FD-62G、FD-62G submodels、VFK specifications、T-shirt applications
- ZDHC：MRSL

### 自动请求受限、但经官方搜索或浏览器证据确认存在的 8 个生产链接

| URL / 来源 | 自动请求 | 二次核验 | 处置 |
|---|---:|---|---|
| Textile Exchange CCS | 403 | 官方页面可读取，内容与引用用途一致 | `pass / bot-protected` |
| Coats Seam Types | 429 | 官方搜索结果与正文可读取 | `pass / rate-limited` |
| Coats Soft and Secure Seams | 429 | 官方搜索结果与正文可读取 | `pass / rate-limited` |
| ISO 4915 | 403 | 官方落地页确认现行且处于 systematic review | `pass / monitor` |
| ISO 3759 | 403 | 官方落地页确认现行 | `pass` |
| ISO 5077 | 403 | 官方落地页确认现行 | `pass` |
| ISO 2859-1 原通用 OBP 入口 | 403 | 官方确认现行版已变为 ISO 2859-1:2026；本地实现已改用稳定标准页 | `changed / deployment-pending` |
| Bella Sports LinkedIn 帖子 | 451，区域跳转至 `linkedin.cn` | 公共 Web 结果可打开原帖并匹配引用主体 | `pass / region-restricted` |

### 未渲染的 3 个源数据备用链接

`https://sansansports.com/`、`https://www.hcsportswear.com/`、`https://www.ingorsports.com/` 均返回 HTTP 200，但当前生产 HTML 未渲染这些根域。保留为源数据备用值，不将其误报为生产外链。

## 5. 季度结论

- 30/30 个生产技术引用均有可达或可复核的当前目标，确认断链为 0；403、429、451 是自动访问或区域限制，不等于页面不存在。
- 除 ISO 2859-1 的入口与版本标签外，其余标准引用均保持 `no-change` 或 `no-change / monitor`；ISO 2859-1 的公开解释保持不变，正文与 references 已明确更新为 2026 版官方入口。
- 不更新所有指南的公开 `reviewed_on` 日期来制造机械 freshness。只有实际修改 ISO 2859-1 引用时，才更新 QC Guide 的真实复核日期。
- 本轮没有 URL、Title、Meta、H1、Schema、页面所有权或内链结构修改，也没有需要 301 的 URL 变更。QC Guide 的 `reviewed_on` 已按真实复核日期更新为 2026-09-30。
