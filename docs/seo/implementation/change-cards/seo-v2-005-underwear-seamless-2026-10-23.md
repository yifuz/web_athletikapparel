# SEO-V2-005：Underwear seamless 能力补强

> Change ID：`SEO-V2-005-UW-SEAMLESS-20261023`
>
> 制作日期：2026-10-23；生产部署确认及验收日期：2026-10-27（具体部署时刻未提供）
>
> 状态：`deployed / production-verified / measuring`；本批部署记录已关闭
>
> Finding outcome：`changed / keep-measuring`；搜索收益 `unverified`

## 1. 目标、授权与主要变量

- 目标页：<https://www.athletikapparel.com/underwear-manufacturer/>。
- 搜索意图：寻找可按产品要求开发 seamless underwear / thermal base layers 的制造合作伙伴；现有 Underwear URL 继续承接，不创建 Seamless、Performance Underwear 或 Base Layer 平行页。
- 主要官网任务：`Discover / Qualify`。让买家确认产品适配、可定制内容及 construction route，减少把低轮廓缝线或 bonded details 误认成真正 seamless 的可能。
- 所有者在六品类缺口筛选后，明确确认能力、产品及定制范围；随后要求“开始制作”。最初交付为本地待审稿；2026-10-27 所有者确认“部署完成，验收”，本轮据此核查生产，不自行修改生产内容。
- 唯一主要变量：增加一个独立、服务器端输出的 **无图 seamless 能力模块**，位于四组现有产品展示之后、Development inputs 之前。包含产品范围、construction route 区分、四类定制项与按款确认说明。
- 按 `seo-process.md` §5.1 的 B 类采购决策完整性改进管理；不以低曝光或 exact-match 词缺失作为改写 Title / Meta / H1 的理由。
- URL、Title、Meta、H1、Canonical、robots、Schema、既有正文、内链、图片、视频、表单和 MOQ 不改；不引入 JavaScript 或新依赖。不新增 Backlog 项。

## 2. 事实与证据边界

### 所有者确认

- Athletik 可以提供真正的 seamless manufacturing；不是仅以 bonded-welded 或 FLATLOCK / ACTIVESEAM 代称。2026-09-01 的确认见[既有 Underwear Change Card](seo-v2-005-underwear-content.md)及 `docs/progress.md` 历史记录。
- 当前再次确认适用产品：男士 boxer briefs / trunks、女式 briefs / camisoles、thermal base-layer tops / bottoms。
- 可稳定定制：jacquard / knitted patterns、局部 ventilation / support zones、waist / leg openings、sizing / fit。
- 目前没有 seamless 实际订单、对应样品或产品图。**能力可介绍，交付履历不可虚构**；不公开写成已有样品、量产案例、设备品牌、客户、实测性能或认证。
- 收口、连接、附件部位是否仍需缝制尚未逐款确认。正文仅说明按款打样确认，不指定未经确认的位置，也不承诺所有成衣完全零接缝。
- 既有四张产品图片仍按原产品语境展示，alt 不变；新模块不复用这些照片作为 seamless 证据，不生成示意产品图。

### 需求筛选与生产观察

2026-10-23 六个商业服装品类的定向筛选不含 Knitted Fabrics：六页均 HTTP 200、单一 H1、自引用 Canonical、允许索引且无 X-Robots-Tag 阻断；生产 Page Sitemap 为 20 条 / 20 个唯一 URL，六页各一次。Underwear 的生产 Meta 已包含 seamless，但当时可见正文没有 seamless 表述；这是当前页面的能力覆盖缺口，不是声明历史页面从未提过该能力。

| 页面 | 既有需求覆盖与处置 |
|---|---|
| Sportswear | OEM / ODM / private-label、yoga / compression、真实 lookbook 已覆盖；`no-change` |
| Underwear | 产品、材料、采购输入、QC 已有；只制作获批的 seamless 增量 |
| Outdoor Clothing | 针织边界、thermal / mid-layer、材料和测试已有；`no-change`，不扩成普遍梭织能力 |
| Merino Wool | 四档产品、材料规格、测试和产品展示已有；`no-change`，实际规格样例待所有者选材 |
| Silk Wear | knitted / woven 范围和流程已有；`no-change`，不为 one-stop 精确词重复扩写 |
| Sports Accessories | 已确认配件、工艺及测试已有；`no-change`，第三张图片不动 |

历史三市场研究见 [2026-08-31 产品意图研究](../../research/serp-product-intent-refresh-2026-08-31.md)及既有 Underwear 实施卡。近期公开英文搜索仅用于核对行业采购语境，不冒充新的 US / GB / CA 标准化排名或搜索量。[Santoni 官方 seamless 分类](https://www.santoni.com/en/products/seamless)确认该类产品采用针织制造路线；它只能支持一般术语区分，不能证明 Athletik 拥有 Santoni 设备或已有项目。未新增付费 SERP 请求。

### 一方数据与工具 Finding

沿用本次筛选已读取的 GSC final Web Search、2026-09-23～10-20、六页精确 URL 范围、`dimensions=[page]`、`rowLimit=25000`，六行未触及行数上限：

| 页面 | Clicks | Impressions | Average position |
|---|---:|---:|---:|
| Sportswear | 5 | 57 | 10.86 |
| Underwear | 3 | 81 | 7.11 |
| Outdoor Clothing | 1 | 33 | 15.48 |
| Merino Wool | 4 | 177 | 6.56 |
| Silk Wear | 0 | 47 | 11.00 |
| Sports Accessories | 0 | 21 | 4.67 |

这些是页面聚合值，不是目标 manufacturer 查询的固定排名。90 天保留 Query 明细不能闭合 Page 总量；未返回 seamless 查询不等于零需求，也不能据此声称 GSC 已证明该词机会。Underwear 保留的 `stretch performance base layers oem` 为 3 impressions / average position 55.33；该意图已有覆盖。

筛选时 `page-opportunities` 报告生成于 `2026-10-23T08:39:32.934Z`，滚动窗口为 2026-07-22～10-19，与上述固定基线不同。4 个 exact-URL rows、3 个 eligible / returned、合计 5 impressions / 0 click；唯一工具 Finding `action-8b522974e45a` 建议把上述 exact phrase 放进元数据，处置 **`not-needed / already-covered / low-sample`**（1/1 已处置），不采用。保留 `report.dataStatus=available` 与 `findings.coverage.state=unknown`，非 HTTP 链接过滤提醒不视为断链，工具估计的 click lift 不作为预测。

本次 seamless 属于另行人工确认的 `review / Info / P1`，证据状态 `Confirmed` 仅指能力及当前正文缺口；“可能增加相关商业查询覆盖”为假设，收益仍 `Unverified`。工具报告读取生产页，未把未部署的本地稿重跑结果冒充上线验证。

## 3. 实施与本地验收

- `inc/product-category-data.php`：仅 Underwear 新增 `seamless_program` 数据，全部输出转义；不动 dormant metadata 数组。
- `template-parts/product-category/page.php`：条件式渲染该模块；其他六品类无该数据，故不输出空区块。
- `style.css`：新增 `.ma-product-seamless*` 专属样式；不改全局 token 或其他组件。桌面为工艺说明 + 四项定制的双栏；手机纵向排列，沿用暖色、轻边线和现有字号。
- `wp-brand-voice-guard` 用于能力 / 履历 / 性能边界，`wp-page-template-builder` 用于共享模板，`wp-design-polish` 用于 token 及响应式布局，`wp-seo-audit` 用于定向验收；不以技能代替所有者发布批准。

本地原始 HTML 对照时间：`2026-10-23T08:57:12.941Z` → `2026-10-23T08:58:30.918Z`；浏览器截图在后续同次测试完成。

| 验收项目 | 结果 |
|---|---|
| PHP 8.2.30 与 Git diff | 两个 PHP 文件语法通过；任务文件 `diff --check` 通过 |
| 源码隔离 | 去除三个文件中本次新增块、规范化换行后，均与 HEAD 原文件相同；无顺带正文或全局样式改写 |
| 七品类 raw HTML | 7/7 HTTP 200、单一 H1；只有 Underwear 出现一次新模块，其他六页为零 |
| 原内容与技术防护 | 七页 Title、Meta、Canonical、robots、X-Robots-Tag、H1、原正文、链接、媒体属性清单及解析后的 JSON-LD 均与本地改动前相同；正文比较排除了新模块及动态共用询盘区，不声称整页 raw bytes 相同 |
| 无图与服务端可见性 | 新模块 raw HTML 即存在，含四项定制；无 img / picture / video，无客户端注入依赖 |
| 响应式 | 实际 Chrome 360 / 768 / 1024 / 1440px 截图及 DOM 检查通过，模块与页面无横向溢出，四项完整可见；桌面 / 手机截图已人工查看 |
| 浏览器运行 | 四个测试宽度未捕获 pageerror；没有新交互或新增内链，无需改变现有表单 |

QA 快照与截图位于 Git 忽略的 `.chrome-check/underwear-seamless-*`，仅供本地复核，不属于部署文件。测试用未登录临时会话，拦截分析端点，不提交表单、不读邮箱、不改数据库、CMP 或广告。未运行本批全站 Crawl，部署前 / 后 Crawl ID 均为 `not-run`；不得沿用其他批次 Crawl 宣称全站无回归。生产部署和 Google 重新抓取均未验收。

## 4. 风险、指标与复盘

- 风险：无 seamless 实物 / 案例，新增说明不能代替样品验证；页面变长，但本轮只加一个无图模块，不重复扩充 QC / FAQ / 采购流程。所有者审核措辞与位置后才部署。
- 主要观察：Underwear 同口径 GSC 页面与相关非品牌商业查询的 impressions / clicks，随后检查可得的自然搜索询盘；保留 Query 缺失、低样本和来源未知边界。不以聚合 average position 充当具体商业词排名，不承诺增长。
- 防护：原 URL / 元数据 / H1 / Schema、四张产品图片及 Hero、原内容与内链、七品类条件式隔离、移动端可读性。
- 回滚条件：能力被撤回、产生无法支持的履历暗示、可复现的内容或布局回归；仅撤回本模块三处增量。短期无增长不是自动回滚理由。
- 本地制作日不作为 Day 0。以 **2026-10-27 部署确认及生产验收日**建立本模块的保守 Day 0；Day 7 / 28 / 90 为 **2026-11-03 / 2026-11-24 / 2027-01-25**。具体上线时刻未知，不倒推至 10-23。
- 排除 Day 0，首个完整 28 天后窗为 **2026-10-28～11-24**，等 GSC final 覆盖末日再读取，预计 11-27 起核验、实际以可用性为准；正式等长前窗优先为 **2026-09-29～10-26**，本次未重新提取该窗。第 2 节 09-23～10-20 的数值仅是既有研究基线，不能冒充紧邻部署的前窗。允许 `inconclusive`，不推断单变量因果。
- Underwear 原 **2026-11-30 Day 90 不重置**；原观察窗已经混入 seamless 内容变量，后续复盘必须披露。其他页面原监测节点不变。
- 最终决策：2026-10-27 生产验收通过，`changed / keep-measuring`；只关闭本模块的部署记录，不关闭整个 SEO-V2-005，不宣称 Google 已抓取新版或排名收益。

## 5. 已完成部署清单

所有者已确认部署；2026-10-27 生产正文及 CSS 输出与本地交付一致。以下三个文件的部署记录关闭，无需再次上传：

1. `wp-content/themes/myathletik-child/inc/product-category-data.php`
2. `wp-content/themes/myathletik-child/template-parts/product-category/page.php`
3. `wp-content/themes/myathletik-child/style.css`

无需新增图片、视频、JavaScript、插件或数据库修改。本卡与 `docs/progress.md` 是内部记录，不作为网站内容部署。用户既有 Backlog 与两份 GEO 未提交修改保持原样，不纳入本次提交。

## 6. 2026-10-27 生产关闭验收

覆盖模式 `targeted`：七个现有商业品类页的 raw HTML 与选定 URL 审计；Underwear 在 Chrome 360 / 768 / 1024 / 1440px 的实际渲染；另核查首页入口、robots.txt、Page Sitemap、共享 CSS 和 Underwear 原有产品图资源。生产采集完成时间为 `2026-10-27T01:30:50.258Z`。这不是全站全面审计，也不是 Google 抓取或搜索效果证明。

| 检查 | 生产结果 |
|---|---|
| 新模块部署 | Underwear raw HTML 恰好一个模块，正文与 10-23 本地稿完全一致；四类定制齐全，无图片 / 视频、无占位符、无虚构样品 / 订单 / 设备声明；仍在产品展示后、开发输入前 |
| CSS 与真实渲染 | 主题 CSS HTTP 200，包含新模块与桌面双栏规则；四种屏宽均可见、四项完整、无模块或文档横向溢出、无捕获到的 pageerror；桌面和手机截图已人工查看，raw / rendered 的目标元数据及模块文本一致 |
| 七品类隔离 | 七页均 HTTP 200、单一 H1、自引用 HTTPS Canonical、允许索引且无 X-Robots-Tag；其他六品类模块数为 0，无 LocalWP 主机泄漏 |
| 原内容 / 内链 / 媒体 | 规范化本地与生产 origin 后，七页原正文、链接与媒体属性清单均与 10-23 本地基线一致；排除新模块及动态询盘区。Underwear 四组产品的 12 个 WebP 与 4 个 JPG 共 **16/16 HEAD 200**、MIME 正确；原图片 alt 与用途不变，不作 seamless 实物证据 |
| Underwear SEO 字段 | Title 为 `Underwear Manufacturer | Athletik Clothing`，Meta 与本地交付及已记录的生产口径一致，H1 为 `Underwear Manufacturer`；没有新增关键词型 Title / Meta / H1 实验，无 URL 或 301 变更 |
| Schema | 七页 JSON-LD 均可解析，类型为 CollectionPage / ImageObject / LocalBusiness / Organization / PostalAddress / WebSite；Underwear 及五个其他品类在规范化 origin 后与本地基线一致，未增添虚构 Product / Service 或认证字段。Sportswear 的环境差异另见下文 |
| Sitemap / 入口 | Page Sitemap HTTP 200、20 条 / 20 个唯一 URL，七品类各一次；首页保留两个可抓取的 Underwear 入口。robots.txt HTTP 200，仅限制 `/wp-admin/`，未阻断目标页 |

### 跨环境差异，不误判为本批回归

- 七页 robots 的本地 `index, follow` 与生产 `follow, index` 只是顺序不同，指令集合相同。
- Sportswear 本地 Meta 为 `FLATLOCK/ACTIVESEAM`，生产为既有 `flatlock & activeseam`；其 CollectionPage `dateModified` 分别为 2026-08-19 与 2026-06-27。属于当前已观察到的环境数据库差异，不在本批改动中；不宣称七页元数据和 Schema 跨环境逐字全同，也不据此追加修复。Underwear 的 Schema 包括日期字段在 origin 规范化后相同。
- 本次没有保留可独立回读的 10-23 全套生产 raw 快照用于逐字段历史 Diff；七页原内容的精确比较参考是 **10-23 本地验收快照**，生产 indexability 则按本次实际响应确认。不能把这一比较写成完整生产部署前后 Diff。

### Structured report Finding 处置（2/2）

使用 CLI 0.2.36，先 `doctor` 与 `reports describe audit-urls`，再对相同七页执行 `audit-urls` action view，`refresh=true`、`maxPages=7`、`concurrency=2`、`saveReport=false`。报告 requested / attempted / fetched / retained 均为 7，failed / skipped / omitted 为 0、未触及页数上限、无输出截断，7 页 indexable，high / medium 为 0 / 0。Low 共 8 个实例，汇总为两个 review：

| ID / 类型 | 证据 / 覆盖 | Outcome 与原因 |
|---|---|---|
| `hsts_missing` / review | 七页均缺 HSTS，7/7 affected URLs 已查看；工具 Low，项目按 Info / P3 / Confirmed 处理 | `deferred / owner-action`：沿用 SEO-V2-014 基础设施评估，非本次新增回归，不修改 Cloudflare 或响应头，不把 HSTS 当排名保证 |
| `image_oversized_candidate` / review | Sportswear 一个 affected URL 已查看；工具 Low，项目按 Info / P3 处理，其尺寸启发式不证明用户体验或排名损失 | `deferred / monitor-only`：沿用既有性能暂缓决定，不在 Underwear 无图模块验收中改 Sportswear 图片；出现既定性能 / 渲染触发条件才重开 |

两项均未改站，不需为文档状态更新重跑报告。保留 `findings.coverage.state=unknown`，source completeness 未由工具声明；无 warning / caveat、完整返回不等于全站 all-clear。报告未关联 GSC / GA4，不能把其诊断零值解释成真实搜索或会话为零。原 `action-8b522974e45a` 的 `not-needed` 决策继续成立，未改元数据。

### 限制与后续

- 本批没有全站 Crawl / Crawl Diff，部署前 / 后 Crawl ID 仍为 `not-run`；选定 URL 报告与七页直接证据不是全站 Crawl ID。
- 未进行新的 URL Inspection、索引请求、GA4 / 询盘效果分析、视频播放、表单投递或性能测试；不证明 Google 已读取新模块，不重复提交索引。
- 浏览器为临时未登录会话，拦截分析端点；没有同意 Cookie、提交表单或修改线上配置。本轮只更新内部部署记录，没有网站代码变更、额外部署文件或新增付费 SERP 请求。
- 本模块进入按第 4 节日期的观察；今天到期的 Knitted Fabrics Day 7 是独立任务，本次尚未执行，不混入本模块验收结论。
