# 结构词扩充研究：深层结果与材料组合

> 日期：2026-10-27
>
> 归属：SEO-V2-005；承接[首轮四词三市场研究](knit-structure-serp-us-gb-ca-2026-10-27.md)
>
> 授权：所有者确认已充值并允许扩充研究，随后要求将原金额限额提高十倍
>
> 状态：`research-complete-with-limitations / no-site-change / keep-measuring`
>
> 覆盖：新增 24 单元尝试，20 成功、4 unavailable；不冒称全量完成

## 1. 扩充后的判断

初轮“保持现有页面所有权、不拆四页”的结论未改变，但 **材料组合不能一概视为更精准**：

| 精确候选词 | 观察到的证据 | 对 Athletik 的判断 |
|---|---|---|
| `merino jersey fabric manufacturer` | US / GB 成功；retail、按米产品、教程、榜单和标签归档仍明显，GB 有 Merino 供货候选；CA 不可得 | 继续作为既有 single jersey / Merino 能力语境，未证明需要独立页面，也未证明比泛结构词更容易排名 |
| `polyester interlock fabric manufacturer` | 三市场成功；有结构产品目录、供应商页和 sportswear / activewear 产品入口；仍含 lining、retail、榜单和 Marketplace | **优先准备真实产品例的方向之一**；选择服装用途、实际结构与规格，别让泛 polyester / lining 需求偏移页面任务 |
| `nylon spandex rib fabric manufacturer` | GB / CA 成功；部分页面直接是 rib，其余扩散至泛 nylon-spandex、stretch、tricot，甚至 woven 自述；US 不可得 | 不能把“尼龙＋氨纶”直接等同 rib，也不据此创建独立入口；先核实具体组织与应用，再决定是否强化 |
| `polyester jacquard knit fabric manufacturer` | 三市场成功；GB / CA 均出现同一 sportswear jacquard mesh 产品，US 出现技术针织能力页；仍有目录、社交与 retail | **新增值得验证的方向**：比泛 jacquard 更贴近服装用结构／图案，但仅为方向线索，不能由一次快照确认长期搜索意图、需求量或自有能力 |

因此，证据准备顺序可由初轮的泛 single jersey / interlock，细化为 **优先服装用 interlock，旁侧验证 performance jacquard；single jersey 保留，rib 按实物组织区分**。这不是搜索量、排名难度或回报排序，也不自动批准任何改页。

当前 Jacquard 卡主要以 Merino wool / blends 表达材料。如果所有者确实希望增强 polyester jacquard / mesh 的采购范围，需要核对可稳定提供的具体路线与公开表达，再判断现有材料表述是否过窄；**不把竞品产品自动当成 Athletik 能力证据**。不能在没有该确认的情况下直接补成“全部支持”或捏造固定成分、GSM、性能与测试结果。

## 2. 研究设计与覆盖

- 第一层：原四个精确结构词 × US / GB / CA，configured `depth=50`；10/12 成功，返回 **497 行**，每成功单元 49～50 个自然结果行。
- 第二层：上述四个精确材料组合词 × US / GB / CA，configured `depth=10`；10/12 成功，返回 **98 行**，每成功单元 9～10 行。
- 新增合计 **595 行 / 439 个唯一 URL**；首轮 112 行仍单独保留，不合并排名或择优挑选成绩。
- Google、English、Desktop、DataForSEO；成功采集时间 UTC **02:06:56～02:16:40**，北京时间 **10:06:56～10:16:40**。不同单元不是同一秒采集。
- 取得结果的 20 个报告中，19 个 `dataStatus=complete`；`rib50_us` 为 **`partial`**，因为 provider 的结果总数估计小于已保留自然行数，CLI 丢弃该估计并返回 `invalid-serp-result-count` warning。其 50 个自然行仍保留，不能把它的报告标签改成 complete。
- 所有有效自然行均为 0 query correction、0 invalid row、0 output truncation / omission；**批次覆盖仍为 partial**，还包括四个失败单元没有有效结果。完整 24 单元状态见[覆盖 CSV](data/knit-structure-serp-expanded-coverage-2026-10-27.csv)。
- [归一化结果 CSV](data/knit-structure-serp-expanded-us-gb-ca-2026-10-27.csv)保留每一行的原始两个 rank 字段、时间、市场、URL、核验等级和处置。它不是固定历史排名，更不是 GSC 平均排名。
- 深层 497 行是排名清单，没有将全部 497 个页面逐页审计或统计成已验证制造商数。材料层 98 行完成 title / snippet 角色初分，含非明确供货的 tag archive 和待核页面；选定官网另核对正文，等级单列。
- 新增结果中，规范站 Athletik 未见于成功保留范围；**不声称其在所有市场“Top 50 外”**，尤其 single jersey GB / CA 深层请求失败。也不把其他域名或客户品牌算成主站成绩。
- 没有运行搜索量／CPC／KD 估算或新 GSC 效果对比。本次依然只能支持意图与证据准备判断，不能给出增量曝光预期。

### 深层四词矩阵

`sj` = single jersey；`il` = interlock；`rib` = rib knit；`jq` = jacquard knit。失败说明为最后一次复试结果；各失败单元最多复试一次。

| 单元 | 自然结果行 | 单元内唯一 URL | UTC checkedAt / 最后错误 | Task ID |
|---|---:|---:|---|---|
| sj50_us | 50 | 50 | 2026-10-27T02:11:43.000Z | `10270211-2417-0139-0000-199b92abc6bd` |
| sj50_gb | unavailable | — | dataforseo did not respond within 15000ms. | — |
| sj50_ca | unavailable | — | DataForSEO could not complete serp-snapshot (40101: Internal SE Server Error.). | — |
| il50_us | 50 | 49 | 2026-10-27T02:06:56.000Z | `10270206-2417-0139-0000-3d17b6b6fda8` |
| il50_gb | 49 | 39 | 2026-10-27T02:07:35.000Z | `10270207-2417-0139-0000-fa6a2082738d` |
| il50_ca | 49 | 49 | 2026-10-27T02:07:41.000Z | `10270207-2417-0139-0000-c88206a5d4f1` |
| rib50_us | 50 | 43 | 2026-10-27T02:08:16.000Z | `10270208-2417-0139-0000-9ca1e07a3dae` |
| rib50_gb | 50 | 50 | 2026-10-27T02:08:17.000Z | `10270208-2417-0139-0000-4237c9d7fd7d` |
| rib50_ca | 49 | 49 | 2026-10-27T02:08:27.000Z | `10270208-2417-0139-0000-f5cf9e02c403` |
| jq50_us | 50 | 49 | 2026-10-27T02:12:44.000Z | `10270212-2417-0139-0000-02da6deccc18` |
| jq50_gb | 50 | 47 | 2026-10-27T02:13:09.000Z | `10270212-2417-0139-0000-cc15b358912b` |
| jq50_ca | 50 | 47 | 2026-10-27T02:13:25.000Z | `10270213-2417-0139-0000-dd1b5fb84c2d` |

### 材料组合矩阵

`sjm` = merino jersey；`ilp` = polyester interlock；`ribn` = nylon spandex rib；`jqp` = polyester jacquard knit。

| 单元 | 自然结果行 | UTC checkedAt / 最后错误 | Task ID |
|---|---:|---|---|
| sjm_us | 10 | 2026-10-27T02:13:42.000Z | `10270213-2417-0139-0000-ebe694afd19e` |
| sjm_gb | 10 | 2026-10-27T02:09:09.000Z | `10270209-2417-0139-0000-12c15bfade1c` |
| sjm_ca | unavailable | DataForSEO could not complete serp-snapshot (40101: Internal SE Server Error.). | — |
| ilp_us | 10 | 2026-10-27T02:09:28.000Z | `10270209-2417-0139-0000-4bd47619296d` |
| ilp_gb | 9 | 2026-10-27T02:14:21.000Z | `10270214-2417-0139-0000-07b84748b96c` |
| ilp_ca | 9 | 2026-10-27T02:14:41.000Z | `10270214-2417-0139-0000-c2bfb4aa1312` |
| ribn_us | unavailable | dataforseo did not respond within 15000ms. | — |
| ribn_gb | 10 | 2026-10-27T02:15:20.000Z | `10270215-2417-0139-0000-887fcc49fcdb` |
| ribn_ca | 10 | 2026-10-27T02:15:52.000Z | `10270215-2417-0139-0000-b79e7c2fd782` |
| jqp_us | 10 | 2026-10-27T02:16:00.000Z | `10270215-2417-0139-0000-5ea979821558` |
| jqp_gb | 10 | 2026-10-27T02:16:22.000Z | `10270216-2417-0139-0000-71588b16e30f` |
| jqp_ca | 10 | 2026-10-27T02:16:40.000Z | `10270216-2417-0139-0000-6c222f7b0f2c` |

### 数据质量的额外限制

深层请求中，**同一单元内有 25 个重复 URL 行**：interlock US 1、GB 10，rib US 7，jacquard US 1、GB 3、CA 3。保留原始 rank，不去重后重新编号；不能把“50 行”说成“50 个不同页面”，也不把分页重叠误判为 Athletik 的 canonical 问题。重复的产生原因未诊断。

部分同词、同市场的深层前段与首轮浅层结果差异明显。例如 interlock GB 浅层前段有 Starke / Runtangtex，深层前段则不同。请求深度与时刻都不同，**不能据此写成竞争对手短时间升降、SEO 走势或稳定性已通过**。首轮角色计数仅适用于首轮，不套用到本批。

## 3. 官网复核与可采用的信息框架

### EYSAN：结构—产品—用途—询价

[Interlock 分类](https://www.eysan.com.tw/product-category/knitting-structure/interlock/)在泛结构查询及 polyester interlock 查询中重复出现。可读正文按具体产品关联 interlock、sportswear / activewear 及用途，并把筛选后的目标规格接到询价。它说明“结构页不必只写定义”，不证明该框架是排名原因。

Athletik 已有结构说明和报价输入；若要新增内容，实物例应把 **实际结构 → 材料／规格 → 服装用途 → 项目询价** 连起来，而不是复制其产品名称、成分数字、功能或证书。

### Fuzhou Textile：服装用 Jacquard 的具体示例

其[polyester knit weft jacquard mesh for sportswear 产品页](https://www.fuzhoutextile.com/breathable-polyester-knit-weft-jacquard-mesh-fabric-for-sportswear-product/)在本次 jqp GB / CA 均为自然组内第 4。可读正文确有网眼／提花产品图、规格与服装用途信息。这支持 **“jacquard 不止时装图案或家居织物，也存在服装用针织结构采购任务”**；它不是 Athletik 产品／性能证明，也不代表该单款需求量已知。

该域名在新增八个查询中出现七个，是跨查询反复遇到的供货站；重复频次仍不等于权威、质量或流量份额。当前 Athletik 不能据此复制大量近义落地页。

### Beverly Knits：补充的能力表达参考，不照搬业务边界

[Knitted performance fabrics 页面](https://www.beverlyknits.com/knitted-performance-fabrics)在 jqp US 自然组内第 3，正文将 circular knitting、jacquard、服装用途等相连。但同时服务家居、工业等任务，故只作能力组织方式补充，不将其全部业务视作 Athletik 的同类覆盖目标，更不照搬 Made-in-USA、军用法规等限定声明。

### 未完成与自述边界

- Orneule 的 Merino 页面请求超时，未将 snippet 升格为官网正文核验。
- 新官网内容均为对方自述，不验证其实际工厂、认证、测试或履约；仅作公开信息结构参考。
- EYSAN 的可读缓存为 10-27 当天，Beverly 约三天前，Fuzhou 具体 Jacquard 产品约四个月前；不是同分钟原始生产 HTML 抓取。
- 原[首轮研究](knit-structure-serp-us-gb-ca-2026-10-27.md)的 Starke / Runtangtex 参考、Runtang 数据字段错位以及 Mono 只读到导航等限制仍保留。

## 4. Finding 完整处置

- 新增成功 raw 报告共有 **73 条 `repeated-domain` review**，全部按 Info / P3 / `no-change` 记录在 [Finding CSV](data/knit-structure-serp-expanded-findings-2026-10-27.csv)，保留 cell / evidenceRef / 原始 detail。它们不是网站 fix，不转为“域名强／弱”评分。
- 新增的 595 个 inventory 行全部记录 `no-change`：它们是排名清单，不是网站缺陷；没有任何页面改动需要假称已修复。材料层初分不冒充独立制造商认证。
- 人工观察 `SEO-KF-SERP-PAGINATION-20261027`：Info / P3 / Confirmed（重复行事实），根因 Unverified；outcome `no-change / retain-limitation`，不据此修网站。
- Provider warning `rib50_us / invalid-serp-result-count / resultCount`：Info / P3 / Confirmed（估计不一致），outcome `no-change / discard-estimate / retain-partial`。本报告不使用该总数估计推导搜索量或市场大小，不修网站，也不丢弃已保留的有效自然行。
- 四个最终 unavailable 属于数据范围缺口，不是 Critical / Warning，也不是零结果；outcome `deferred / unavailable`，无持续付费排错。
- 首轮缓存 action view 三条泛化提示维持原处置，不因扩充研究自动变为网站修复任务。本轮未实施建议，因此没有“修复后重跑并通过”的结论。

## 5. 费用、限额与失败恢复

### 现行本机成本控制（所有者 10-27 明确批准）

| 字段 | 原值 | 现值 |
|---|---:|---:|
| daily notice | $0.05 | **$0.50** |
| daily hard limit | $0.10 | **$1.00** |
| monthly hard limit | $0.50 | **$5.00** |
| maxRequestsPerReport | 10 | 10（不变） |
| maxRowsPerReport | 1000 | 1000（不变） |

先临时改日限额至 $0.25，随后所有者要求提高十倍，现值按**原项目金额限额**十倍设置并回读；后一个明确决定取代临时恢复旧值的计划，**不恢复 $0.10**。改的是本机 CLI 金额护栏，未修改 DataForSEO 门户的 API 每分钟频率或其他账户限制。

- 充值后账户余额曾核验为 **$50.152680**，并非只凭所有者口述判断到账。
- 扩充共 **24 次初始尝试 + 16 次单次复试 = 40 次 fresh CLI 尝试**；6 次初始尝试在 account-status 40202 前置检查即止，新增实际 SERP provider 账本请求 **34 个**。每报告仅一 provider 请求，不绕过每报告 10 次上限。
- 先以最多两个并行请求采集；遇到连续 account-status 40202 后停止并行，并以 **串行、请求起点至少间隔 20 秒**完成每个失败单元的一次复试。未做第三次尝试。
- [官方错误说明](https://docs.dataforseo.com/v3/appendix/errors/)将 `40202` 定义为每分钟频率限制，`40101` 为搜索引擎处理错误；15 秒 timeout 是 CLI 返回的超时，不能与付款不足混为一谈。具体账户频率阈值及超时根因未核实。
- 初估基础请求 $0.144；计入失败与未知预留后，本轮上限改为 $0.25。扩充后账本相对首轮增量为：**已知 actual $0.132 + unknown $0.056 = effective $0.188**，未超本轮 $0.25。
- 截至 `2026-10-27T02:16:58.161Z`，**今日本机**为 actual **$0.158**、unknown **$0.058**、effective **$0.216**、48 请求；**月** actual $0.256、unknown $0.132、effective $0.388、77 请求。
- 同时的**账户**余额 $50.004680、日 spending $0.176。账户可含其他客户端且超时记账时点不同，不能强行与本机已知费用对齐；unknown 不是已确认收费，也不能忽略。
- 付款与额度充足不代表持续抓取有收益。下一次只在明确决策、既定复盘或失败条件变化时继续；本轮不继续收费请求。

## 6. 下一步与验收边界

1. 现页继续承接四种结构及材料子意图，不建平行页，不改主词／Title／Meta／H1／URL，不重发索引请求。
2. 所有者可先挑 **1～2 个真实服装用 interlock／single jersey 样布例**；若希望优先拓展 performance jacquard，再确认 polyester jacquard / mesh 的具体路线及可公开范围，按真实业务选样，不必凑满四类。
3. 对每个样例只要能把图片、实际结构、composition / GSM 对应起来即可起步；有 usable width、用途、允许公开的开发输入再补。没有历史订单或照片不否定制造能力，也不阻止已确认能力的概括性表达。
4. 研究与材料准备可立即做；上线内容须另获批准、记录独立变量并披露测量污染。Knitted 原定 Day 28 **11-17**、完整后窗 **10-21～11-17**、预计 final 复核 **11-20 起**保持不变，不把新增 SERP 采集当成网站改动 Day 0。
5. 结果 CSV / 覆盖 CSV / Finding CSV / 本报告、研究索引、进度及预算口径文档是内部记录；本机金额护栏已按授权更新。**无主题、图片、数据库或线上配置改动，无需网站部署。**
6. raw 首次尝试在 Git 忽略的 `.chrome-check/knit-structure-serp-expanded-2026-10-27.json`；最终成功／错误／复试及归一化数据在 `.chrome-check/knit-structure-serp-expanded-final-2026-10-27.json`。不把原始整段他站摘要、账户标识或本地 QA 文件提交。
