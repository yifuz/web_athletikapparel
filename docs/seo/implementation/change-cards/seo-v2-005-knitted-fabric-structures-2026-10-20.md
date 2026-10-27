# SEO-V2-005：Knitted Fabrics 结构、材料与应用补强

> Change ID：`SEO-V2-005-KF-STRUCTURE-20261020`
>
> 实施日期：2026-10-20
>
> 状态：`deployed / production-verified / measuring`
>
> Finding outcome：`changed / keep-measuring`；本批部署验收关闭，排名收益尚未验证

## 1. 目标、授权与唯一变量

- 目标页面：`https://www.athletikapparel.com/knitted-fabrics-manufacturer/`。
- 搜索意图：寻找可按规格开发、独立供应针织面料的制造商；不扩展为毛衫、工业纺织品、零售面料或英国本地工厂页面。
- 2026-10-20 所有者明确把 Google 曝光和排名列为本轮优先目标，并批准开始现有面料页内容补强。表单默认品类的准确性问题移出本轮，不修改表单。
- 唯一主要变量：补足现有商业页的“针织结构—材料方向—服装应用—开发输入”内容覆盖。改动类型按流程 §5.1 的 **B 类采购决策完整性改进** 管理，主要官网任务为 `Discover / Qualify`，目标仍是搜索需求匹配，而非表单微调。
- 只增加一个服务器端输出的内容模块；URL、页面所有权、Title、Meta、H1、Canonical、Schema、原正文、图片、内链和表单保持不变。
- 四类结构为 single jersey、interlock、rib、jacquard。不创建近义平行页，不改已有主词，不机械重复 `functional knit fabrics manufacturers`。

## 2. 证据与置信度

### 一方事实

1. 本对话所有者已确认 Merino 产品可以指定 composition、micron、yarn count、GSM，以及 single jersey、interlock、rib、jacquard；Underwear / Outdoor 的材料、结构及相关产品范围已有确认。
2. [独立面料业务事实表](../../evidence/knitted-fabrics-business-fact-sheet-v1.md)确认接受 standalone fabric orders，开发规格、swatches、counter samples、lab dips、sample yardage 和 approval samples 可按项目提供；面料 MOQ 按项目，不套用成衣 500 pieces per style。
3. [内部材料来源快照](../../../source-content/performancefabrics-btexco/03-materials.md)支持 polyester / nylon 等一般材料方向；只作为内部一方证据，不在公开页面出现 Beta Textiles、BTEXCO、关联声明或跨站链接。材料组合仍为开发方向，不是统一成分或固定性能规格。
4. 当前 `AGENTS.md` 与所有者确认优先于 2026-08-18 历史矩阵中已被取代的 `our own fabric mill` / `in-house testing` 限制；本轮不改这些已批准表述，也不扩展认证声称。

### GSC 与 SERP

- 2026-08-23～09-19 与 2026-09-20～10-17 为两组等长 28 天 final 窗口。页面为 0 clicks / 92 impressions → 1 / 84；页面平均排名 27.05 → 13.63，不能当成固定商业词的排名变化或本次尚未部署改动的收益。
- 后窗 exact-page Query 返回 9 行、无行数截断：网址词 2 impressions；其余 8 行合计 15。排除一条带 `uk` 的超长查询后，固定观察的 7 个相关商业词合计仅 14 impressions / 0 clicks，属于低样本机会，不足以做 CTR 元数据实验。
- 2026-10-20 DataForSEO Google Desktop English、depth 10，`functional knit fabrics manufacturers`：US 和 CA 快照成功，Athletik 不在返回的自然结果中；GB 两次失败，记录为 `unavailable`，不再循环重试，不声称已完成三市场研究。
- US task：`10200146-2417-0139-0000-e540714eb777`；CA task：`10200146-2417-0139-0000-db04ef2e7dc9`。结果混合制造商、榜单、目录和零售，不以榜单/目录充当商业页模板。
- 对排名结果中的 [Caracol](https://www.caracolknits.com/products-services/knit-fabric) 和 [Huiliang](https://www.huiliang-textile.com/en/category/Functional-Knit-Fabric.html) 的直接页面检查，只观察到结构/材料/用途分类、具体面料例子等呈现方式；这些不是已证实的排名原因，也不是 Athletik 的事实来源。
- 结构解释使用 [CottonWorks：Single & Double Knits](https://cottonworks.com/learning-hub/knitting/single-and-double-knits/)核对一般原理；不复制其数字，不把它的棉织物实例转换成 Athletik 的 Merino 实测性能。

判断：内容覆盖缺口为 `Confirmed / Info / P1 / review`；预期排名收益为 `Unverified`。授权的可交付能力与采购任务支持本轮小范围补全，不以曝光少或竞争页字数作为改动理由。完整原始查询表见 [GSC Log](../../gsc-data-log.md)。

## 3. 实施与事实边界

- 四张卡片分别说明结构特点、`Material direction`、`Apparel applications`、`Specify for development`。
- 位置在现有五组面料产品图之前；暖灰底、桌面双列、手机单列，使用既有 `--ma-*` tokens，不改全局 tokens 或其他组件。
- 新增英文初版为待审稿；所有者于 2026-10-20 确认文件已部署，本轮按已发布内容记录，不再保持滞后的 `owner-review` 状态。
- 不新增 GSM 范围、纤维百分比、测试结果、认证、SKU、产能、交期或价格。
- 不新增或重标图片。现有图不能仅凭文件名确认 single jersey / interlock / rib / jacquard；真实布样展示需取得图片与结构/成分的可靠对应后，在本项内另行审核，不先制造产品证据。

## 4. 验证结果与限制

| 检查 | 结果 |
|---|---|
| 两个改动 PHP 文件语法 | 通过，PHP 8.2.30 |
| 七品类数据与共享模板隔离 | 通过：其余六页数据及去空白 HTML hash 与修改前一致；面料页移除新增字段/模块后也与原数据/HTML 一致 |
| 原有 Title / Meta / H1 数据 | 七页均不变；隔离渲染均只有一个 H1 |
| 新模块 | 面料页恰好一个模块、四张卡片、十二组 `dt` / `dd`；其他六页为零 |
| 浏览器离线渲染 | 360 / 768 / 1024 / 1440px 均无文档或模块子元素横向溢出；Desktop 成对卡片等高、顶端对齐；无页面脚本错误 |
| 新正文检查 | 无占位符、Beta/BTEXCO 公开关联、认证或量化性能声称 |
| 完整 LocalWP | 所有者启动后复验通过：七品类均为 HTTP 200、单一 H1，新模块仅面料页存在；实际 WordPress 页面在四种屏宽无横向溢出，Desktop 卡片成对等高、顶端对齐 |
| LocalWP 页面输出与资源 | 面料页 Title / 单一 Meta Description / H1 符合既有基线，单一 Canonical 正确使用本地地址；新增内容已在原始 HTML 中，Schema JSON 可解析；五组产品图实际加载、alt 非空，共用表单正常渲染但未提交 |
| 生产内容与样式 | 通过：四类结构已在服务器 HTML 输出；生产 `style.css` 与本地内容一致；360 / 768 / 1024 / 1440px 无溢出，Desktop 卡片成对等高、顶端对齐 |
| 生产七品类隔离 | 7/7 HTTP 200、单一 H1，新模块仅面料页存在；定向 `audit-urls` 为 7/7 可索引、0 fetch failure、0 high / medium issue |
| 生产 SEO / 发现路径 / 媒体 | 面料页 Title / Meta / H1 符合原基线、`index, follow`、无 X-Robots-Tag、自引用 HTTPS Canonical；无 LocalWP 地址泄漏；CollectionPage URL / description 与页面一致；Page Sitemap 唯一条目及首页入口存在，原五图正常加载且 alt 保留 |
| GSC indexed snapshot | `PASS / Submitted and indexed`，Google / User Canonical 一致；最后抓取 `2026-10-19T11:38:33Z`，早于本批部署，不能据此确认新版本已被 Google 抓取 |
| 表单 / Consent 边界 | 仅核对渲染，未提交测试询盘、未复测邮件投递或 Allow-all 分析链路；浏览器 QA 拦截分析端点并在临时会话拒绝非必要 Cookie。Turnstile 的间歇报错见下方处置 |

离线检查加载现有父/子主题 CSS、实际共享模板和本地字体；Inquiry CTA 明确使用桩，不提交测试询盘。截图保存在 Git 忽略的 `.chrome-check/fabric-structures-{360,768,1024,1440}.png`，不是生产截图。

2026-10-20 补充真实 LocalWP 验收：源代码覆盖全部七品类，浏览器完整渲染覆盖 Knitted Fabrics 的 360 / 768 / 1024 / 1440px，真实截图为 `.chrome-check/local-fabric-structures-{360,768,1024,1440}.png`。浏览器未登录、未提交表单，并设置分析端点拦截以避免测试流量。没有页面 JavaScript 异常；但网络记录出现本地域名 `myathletik-rebuild-02.local` 的 Cookiebot configuration 404，以及一次 `/browser-sync/socket.io/` 400（页面仍显示 Instant Reload connected）。两项作为本地环境观察记录为 `Info / no-theme-change`，不归因于新增模块，不据此断言生产 Cookiebot 有故障；生产 Consent 状态仍须在生产验收时独立确认。本轮没有更改网站代码、CMP 配置或数据库。

部署前专用 Crawl ID：`unavailable`，本批没有紧邻部署前的同配置全站快照，不冒用历史 Crawl。部署后稳定 Crawl Diff Run：`397bd089-3124-4416-bdb2-f90194be53db`，对比 `90e3e47f-7181-42b8-a1b6-883c5be07bf2`；两次均为 2026-10-20 部署后、首页起点、limit 25、urlCount 25，added / removed / changed / newErrors / indexabilityFlips / highPriorityRecommendations 均为 0。它证明本次有界范围的部署后稳定性，不是部署前后零内容变化，也不是全站无遗漏认证。

首次 Crawl Diff 动作视图曾返回 9 changed、0 newErrors、0 indexabilityFlips；其逐 URL 清单和更早基线没有在动作视图展开，因此保留 `historical-delta-detail-partial`，不把 9 项全部归因给本批或断言全部预期。复取 raw 视图实际生成了上面的第二个稳定快照，不能把它冒称为原首次历史比较。

### 生产 Finding / Inventory 处置

定向审计的 7 个请求全部成功且无省略，但工具 `findings.coverage.state` 仍为 `unknown`，不改写工具标签。两个自动 review 分组、一个首次 Diff fix 提示及一个人工观察均保留：

| ID / 类型 | 证据与处置 | Outcome |
|---|---|---|
| `hsts_missing` / review | 7 个品类低优先级提示；沿用 SEO-V2-014 的基础设施 `owner-action`，不作为本次曝光实验修复项 | `deferred` |
| `image_oversized_candidate` / review | 仅 Sportswear 低优先级提示；沿用 SEO-V2-004 的性能 `monitor-only`，本批不重开图片优化 | `deferred` |
| `action-ba74be3d0f21` / fix：Main content changed | 首次 Diff 指向 Sportswear 的泛化 content-change 提示，没有状态或索引回归、没有当前流量损失证据；不把“正文变化”本身当缺陷，稳定复核无新增变化 | `not-needed` |
| `SEO-KF-QA-TURNSTILE-20261020` / review / Info | 重用浏览器会话多次导航时出现 `turnstile.ready()` 的 async/defer 报错；独立新会话分别复测 Contact 与面料页均无 page error，表单及 `cf-turnstile-response` 字段存在、无可见错误；实际提交影响仍 unverified | `no-change / monitor-only` |

Turnstile 仅记录已观察到的间歇报错，不推断根因、不改主题或插件；只有真实提交异常，或独立新会话可稳定复现且影响组件初始化时，才转入专门诊断。此次没有发送测试询盘。生产 Cookiebot 配置 404 未在本轮网络记录中重现，但不以此替代完整 Consent Mode 验收。

实际生产截图与原始页面证据在 Git 忽略的 `.chrome-check/production-fabric-structures-*`。Coverage 为 `targeted`：七个品类原始 HTML / 技术审计、一个面料页四种屏宽与五图、首页入口与 Sitemap；不含全站浏览器、真实性能、表单投递、其他页面内容审计或新的 SERP 排名快照。

## 5. 风险、验收与复盘

- 风险：新增内容使页面变长；材料/用途若不符合实际需所有者修订；小样本、竞争变化及其他营销活动会干扰比较。收益不保证。
- 生产验收：HTTP 200、可索引、自引用 Canonical、单一 H1；Title/Meta 与部署前一致；四张卡片存在于原始 HTML 且事实准确；原五图、表单、内链和 Schema 不变；手机/桌面无溢出，另外六品类不出现模块，定向 Crawl Diff 无新增状态或索引回归。
- 主指标：该页 GSC Web 非品牌查询曝光、同一固定商业词在相同国家/设备的排名与点击；页面总量只作辅助。匿名化缺失不能补算，Page 平均排名不能替代目标词排名。
- 固定 7 词：`knitted fabric manufacturer`、`functional knit fabrics manufacturers`、`functional knitted fabrics factory`、`performance knit fabric oem`、`performance knit supplier`、`custom knit fabric oem`、`breathable knitted fabric supplier`。结构相关新查询作为新增覆盖观察，不预设已有搜索量或排名。
- 防护指标：索引/抓取、元数据、原有内容与图片完整性、移动布局、其他六品类隔离；合格询盘为长期业务指标，不把本轮转化细节放在曝光目标之前。
- Day 0：**2026-10-20**，按所有者部署确认与当日生产验收建立；具体部署时刻未记录，不推算到分钟。
- 冻结的最近已核验 28 天 final 基线为 **2026-09-20～10-17**：页面 1 click / 84 impressions / average position 13.63，固定 7 个商业观察词 14 impressions / 0 clicks；沿用已归档值，不把部署前数据写成新模块收益。
- Day 7：**2026-10-27**；Day 28：**2026-11-17**；Day 90：**2027-01-18**。Day 7 先查抓取、索引和技术状态；完整 28 天效果窗口预先固定为 **2026-10-21～11-17**，排除部署日，待 final 覆盖窗口末日后读取，预计 11-20 起可正式比较，实际以数据可用性为准。
- 前窗使用最近已核验 final 快照而非紧邻部署日的未完成数据；两窗日期间隔、匿名化、国家/设备与查询集合变化须保留为比较限制，不事后静默换窗或作单变量因果断言。
- 原 Knitted 2026-11-30 Day 90 节点保留为历史批次观察；若本模块已上线，必须注明后窗混入新变量，不能继续将整页增长归因到原批次。
- 如果事实有误、出现渲染/索引回归或模块串页，先修正/移除本模块；若只是低样本或没有明显增长，记录 `inconclusive`，不自动换主词、重写全页或新建近义页。

## 6. 部署清单与下一步

以下三个 child-theme 文件已由所有者确认部署，并通过本批内容与技术验收：

1. `inc/product-category-data.php`
2. `template-parts/product-category/page.php`
3. `style.css`

本轮没有新增图片或 JavaScript，不需要同步 uploads、修改数据库或 Rank Math 字段。生产验收阶段仅更新记录，没有新增网站部署文件。文档和忽略目录中的 QA 工具/截图不需要部署；不自动或重复请求编入索引。实施记录关闭为 `production-verified / measuring`，后续按固定日期观察相关非品牌曝光与商业词排名，不立即连续改写同页。

## 7. 2026-10-27 Day 7：抓取检查关闭，效果继续观察

本轮 `targeted`、只读，未改网站。Day 7 Finding outcome 为 **`no-change / keep-measuring`**，效果证据为 **`partial / not-enough-data`**；本卡既有实施 outcome `changed / keep-measuring` 不覆盖。

### 抓取及技术

- URL Inspection 为 `PASS / Submitted and indexed`、robots / indexing 允许、fetch 成功、Google / User Canonical 一致、MOBILE。最后抓取由 Day 0 的 10-19 更新为 **2026-10-21T19:26:22Z（北京时间 10-22 03:26:22）**，确认部署后重新抓取；API 未给出存储 HTML，不把时间证据写成新模块逐字被 Google 读取的证明。
- CLI 0.2.36 `doctor` 通过；描述并运行 `audit-page` action view，0 Finding / 0 issue / 0 recommendation。保留 `findings.coverage.state=unknown`、1 个非 HTTP 链接过滤 warning；当前页面存在 mailto / tel 链接，不把协议过滤当断链。本次无自动 Finding 需处置。
- 生产 QA 完成于 `2026-10-27T01:38:50.491Z`：目标 HTTP 200、无 X-Robots-Tag、index、self-Canonical、单一 H1、无本地主机泄漏；一个结构模块、四卡、十二组定义、无占位符或 Beta 公开关联。360 / 1440px raw / rendered 内容一致、无横向溢出，Desktop 成对等高对齐，五组原图均实际加载且 alt 保留，桌面 / 手机截图已查看。
- 规范化 origin 后，与 10-23 本地快照的 Title / Meta / H1、正文、链接、媒体和解析后的 Schema 一致；这不是紧邻本批部署前的生产快照 Diff。同日早间 Underwear 验收已确认七品类状态 / Canonical / 唯一 H1、Page Sitemap 20 条 / 20 unique、七品类各一次、首页入口和 robots.txt 正常，本次复用该日期明确的发现路径证据；不额外抓全站，也不冒用新 Crawl ID。
- 既有 `SEO-KF-QA-TURNSTILE-20261020` 间歇 async/defer pageerror 在首轮出现；一次独立新会话复查无 pageerror、有一份表单、无可见表单错误，但等待 1.5 秒时未见验证码响应字段，不能宣称验证码 / 提交通过。沿用 `review / Info / no-change / monitor-only`，提交影响 `unverified`；未提交测试询盘，未改插件 / CMP / 主题。独立会话稳定复现并影响初始化或真实提交失败才重开。

### 搜索数据及解读

全属性 `dataState=all` 与 `final` Date 对照请求均至 10-26，final 只覆盖连续 **10-01～10-24**；10-25 / 26 的 preliminary 行不用于比较。因此排除部署日后目前仅有 **10-21～10-24 四个 final 日**，未满足 `measure-change` 至少前后各七个 final 日的方向闸门，本次不强行运行该报告的效果 verdict。

| 窗口 | Clicks / Impressions | Average position | 限制 |
|---|---|---:|---|
| 冻结 28 日前窗：09-20～10-17 | 1 / 84 | 13.63 | 历史冻结值不覆盖 |
| 最新 28 日：09-27～10-24 | 0 / 132 | 12.89 | 与前窗重叠 21 天，大量数据早于部署 |
| 前四日：10-16～10-19 | 0 / 44 | 6.77 | Query 未返回行，不等于没有搜索 |
| 后四日：10-21～10-24 | 0 / 6 | 10.00 | 低样本 / 短窗口，不作成功或失败判断 |

10-18 / 19 的曝光为 12 / 29，10-20 为 17；后四日为 1 / 2 / 1 / 2。不能把部署日期口径之前的尖峰归因为本次新增模块，也不能把四日回落据为技术回归或自动撤销理由。具体部署时刻未记录，不作 GSC 日历与上海时区的逐分钟对齐。

最新 28 日精确 URL Query × Page 返回全部 9 行，只覆盖 **19 / 132 impressions**，固定七个相关商业词为 **15 impressions / 0 clicks**；`functional knit fabrics manufacturers` 5 / position 19、`knitted fabric manufacturer` 4 / 33.5、`functional knitted fabrics factory` 2 / 24，其余四个固定词各 1。另有英国超长相关查询 2 和网址词 2。未返回新的四类结构查询，记 `not-returned` 而非零需求。Page average position 与低量 Query 平均位置都不等于标准化 SERP 固定排名。

Country × Page 的 US 15、GB 2、Israel 1、Türkiye 1 合计也只有 19；Country 单维控制同样 19，保持 `partial / non-reconciled`，不据此判断整页主要流量市场或为缺失国家补零。后四日 Query 只有一个商业词及网址词各一次；国家只返回 US 2，均未闭合 Page 6。完整九行、每日值、日期控制及限制见 [GSC Log](../../gsc-data-log.md) 最新 10-27 条目。所有 raw 请求 `rowLimit=25000`、未触及上限，原始证据存于 Git 忽略的 `.chrome-check/knitted-fabrics-day7-gsc-2026-10-27.json`。

### 处置与后续

- Day 7 技术 / 抓取检查完成；保持本模块和所有元数据，不改页面，不新增 Backlog，不进行付费排名请求或重复索引申请。本轮没有 Google / GA4 / 询盘因果或转化结论。
- 既有 HSTS / Sportswear 图片 deferred 状态及历史 Diff Finding 处置不变；单页报告无新自动 Finding，Turnstile 人工观察仍按上述边界监控，不把缺证据写成健康通过。
- Day 28 仍为 **2026-11-17**，预定后窗 **10-21～11-17**、冻结前窗 **09-20～10-17**，等 final 覆盖末日后预计 11-20 起核验；仍允许 `inconclusive`。本模块 **2027-01-18 Day 90** 与原批次 **2026-11-30 Day 90** 都不重置，原批次须披露这次内容变量。
- 无新代码、图片、CSS、JS 或数据库修改；只更新内部记录，**无需部署文件**。既有 Backlog 与两份 GEO 未提交修改不纳入本次提交。
