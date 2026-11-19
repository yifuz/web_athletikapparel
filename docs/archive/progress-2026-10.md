# 项目进度月度归档：2026-10

> 📅 **按月进度导航**：[2026-07](progress-2026-07.md) · [2026-08](progress-2026-08.md) · [2026-09](progress-2026-09.md) · [2026-10](progress-2026-10.md) · [2026-11（当月活跃）](../progress.md)

> 本文件归档 2026 年 10 月全部工作记录：上方为全月 1 事 1 行速查表，下方保留 10 月下旬原始分段详录。

## 1. 2026-10 全月工作流水速查表

| 日期 | 完成事项与核心结果 |
|---|---|
| 2026-10-08 | 2026 年 9 月自然月 GSC / GA4 / 正式询盘基线完成：GSC final 为 32 clicks / 1,280 impressions / 2.50% CTR / average position 11.75，较 8 月 8 / 329 明显上升；GA4 为 54 raw sessions / 10 users / 28 engaged sessions，Organic Search 仍为 2 sessions、0 engaged session、0 `generate_lead`。163 邮箱合并既有人工台账与 09-24～09-30 新邮件逐封复核，确认 6 封真实询盘、0 封已确认每款达到 MOQ、0 封可确认归因 Organic Search；来源未知不按非 Google 处理。结论为 `visibility-up / conversion-unproven` 与 `no-change / baseline-established`；GSC 32 clicks 对 GA4 2 个 `google / organic` sessions 另记 `measurement-gap / investigate`，先做只读标签、Consent 与过滤诊断，不新增 Backlog 或直接改站。 |
| 2026-10-08 | 到期 Day 28 页面复盘全部关闭：首页为 4 / 73 → 6 clicks / 135 impressions，Underwear 为 0 / 25 → 2 / 84，Knitted 为 0 / 41 → 1 / 90，均保持 `keep / measuring`；Contact、Services 与 Sportswear 低于判断门槛，B 类采购内容维持 `changed / measuring`。所有者决定接受 Merino 27 日与 Outdoor 26 日近似等长 final 窗口：Merino 为 3 / 43 → 3 / 166，曝光和平均排名改善但 clicks、商业 Query 与可归因询盘未同步增长；Outdoor 为 0 / 21 → 0 / 27，仍无 click 或 GA4 Landing Page session。两页均正式关闭为 `keep / measuring`，保留低置信度并转入 Day 90。Targeted 生产审计 8/8 URL 为 HTTP 200、可索引、0 high / medium issue；HSTS 沿用 owner-action，Sportswear 图片提示沿用 performance monitor-only。未触发 URL、Title、Meta、H1、Schema、页面所有权或 Backlog 变更。 |
| 2026-10-08 | Merino Wool 阶段性 targeted 检查完成：生产单页 HTTP 200、robots 允许、自引用 Canonical、单一 H1、Title/Meta 规范一致、22 图 alt 和 JSON-LD 均通过，`audit-page` 为 0 issue / 0 recommendation；URL Inspection 为 `PASS / Submitted and indexed`，Google Canonical 一致且最后抓取为 2026-10-02。90 天 retained 非品牌 Query 只有 25 impressions / 0 click，主商业词 `merino wool clothing manufacturer` 为 19 / position 25.95；页面机会工具的 exact-phrase 建议没有 page-one CTR benchmark，现有页面也已覆盖相同意图。Cannibalization 为 0 material candidate，Internal Links 没有 ready-to-apply 缺口。结论 `no-change / keep-measuring`：不继续扩写、不改 Title/H1、不建近义页，转入 2026-12-06 Day 90。Schema/OG 修改时间与 Twitter reading time 的 code-first 元数据来源偏差记录为 Info / P3，不建立单页补丁。 |
| 2026-10-08 | Silk Wear + Sports Accessories 联合阶段检查完成：两页生产抓取均为 HTTP 200、可索引、自引用 Canonical、单一 H1、0 high / medium issue，采购决策内容、Sitemap 与首页入口均在线；URL Inspection 均为 `PASS / Submitted and indexed`，最后抓取均为 2026-10-02。以 2026-09-09 为观察锚点的等长窗口当前只有 25 个 final 日：Silk 为 1 / 28 → 1 click / 35 impressions，Sports Accessories 为 2 / 29 → 0 / 20；两者均为 `partial / not-enough-data`，GA4 Landing Page 均为 0 → 0。Silk 90 天唯一可审查非品牌词只有 3 impressions，Sports Accessories 无可执行非品牌 Query；不改 URL、Title、Meta、H1、正文或页面所有权，不建近义页。两张 Change Card 从滞后的 `owner-review` 修正为 `deployed / production-verified / keep-measuring`，联合 outcome `changed / keep-measuring`，下一正式节点不早于 2026-12-08 Day 90。 |
| 2026-10-08 | SEO-V2-003 Services 索引复查完成：GSC `index-watch` 为 complete，1/1 inspected，当前仍为 `NEUTRAL / URL is unknown to Google`、`indexStatus=excluded`；相对 2026-09-30 的 `Discovered - currently not indexed`，工具判定同一 excluded 状态 unchanged，0 regression / recovery / alert，仍无 Google Canonical 或最后抓取时间。生产普通请求与模拟 Googlebot 均为 HTTP 200、`index`、无 X-Robots-Tag、自引用 Canonical、单一 H1 和完整采购流程内容；Page Sitemap 唯一条目、首页 5 个入口、robots 与 Title/Meta 均正常，单页审计 0 issue / 0 recommendation。Finding outcome 保持 `no-change / monitoring`：不重复申请、不改页面；Services 单页由周度改为月度或触发式复查，下一常规节点不早于 2026-11-08，全站 Crawl / Index Snapshot 继续运行。 |
| 2026-10-08 | SEO-V2-002 GSC / GA4 测量差距诊断完成：Google 登录、GSC / GA4 scope、GSC Property 与 GA4 Property `547377703` 均正常，9 月 54 个 GA4 sessions 的 host 全部为 `www.athletikapparel.com`；生产 Site Kit tag `GT-WBLS3B9D` 存在，主题无第二份基础 GA4 tag。根因是 Cookiebot CBID `f81cac53-c468-4afd-9823-7adcc4839c5b` 的 `cc.js` 对 `www` 与裸域均明确返回 `not authorized`：新浏览器无法初始化 Banner，Statistics / WP consent 保持 false，仅加载 `gtag.js` 而不发送 GA4 `g/collect`。Finding outcome `diagnosed / no-code-change / owner-action-required`；所有者需在 Cookiebot Manager 授权两个域名或换用正确 CBID，验收 Allow / Reject 与 GA4 网络请求后，从修复日起重建 28 天基线。9 月 GA4 Organic Search 继续视为不完整下限，不用于否定 GSC 32 clicks。 |
| 2026-10-08 | SEO-V2-002 Cookiebot / GA4 测量链生产修复验收通过：Cookiebot Manager 显示 `www.athletikapparel.com` 为正式 Domain，当前 CBID 的实时 `cc.js` 对 `www` 与裸域均返回完整配置且无 `not authorized`。两个独立无 Cookie 浏览器会话均显示首次 Banner；Allow all 后 Statistics / WP consent 为 true，写入 `CookieConsent`、`_ga` 与 `_ga_JV4NTPDVQB`，首页和 Merino 页均发送 GA4 `page_view`；Reject all 后 Statistics 保持 false，仅保留 `CookieConsent`，Underwear 页无 `_ga` 或 GA4 collect；页脚 Cookie Settings 可重新打开 Banner。本次无主题、插件、CBID 或 Site Kit 代码修改，Finding outcome `fixed / external-config / production-verified / keep`。9 月历史漏测不回填；新 28 天恢复窗口为 2026-10-08～11-04，正式复核不早于 11-07。 |
| 2026-10-08 | GSC Generative AI 首个等长 28 天对比完成：所有者导出的 2026-09-03～09-30 XLSX 已按 SHA-256 归档，28 个日期行、14 个 Page、50 个 Country、3 个 Device 均通过完整性检查。Property impressions 为 190，对比 2026-08-06～09-02 的 27，增加 163（+603.7%，7.04×）；有展示日期为 27/28。Page 表合计 199，主要为 FLATLOCK 63、Top Sportswear 31、QC 29、首页 19、Merino 17、Underwear 12、ACTIVESEAM 9；页面合计不等于独立回答。前窗含已知日志异常，当前窗混合两篇新 Guide 上线前后，因此 outcome 为 `visibility-up / attribution-unproven / no-site-change`。有效复测 GSC 数据闸门已通过，22 条运行仍全部 `planned`；Bing 第二窗口仍待 2026-10-20 后导出。 |
| 2026-10-08 | 有效复测 ChatGPT Search 首轮采集完成：固定 11 条 Prompt 均在独立 Temporary Chat、美国洛杉矶出口、Web Search 开启且个性化关闭的环境中运行，并保存元数据、回答文本、页面截图、首个引用预览及 169 条行内引用 URL。描述性结果为实体题 2/2 提及并引用规范站，专业发现题 D03～D05 为 3/3 提及、首位推荐并引用规范站，内容题 C06～C08 为 0/3，宽泛发现题 BD01～BD03 为 0/3；这些不是正式有效率。由于 10 条截图只覆盖可视区域、当次未取得完整 Sources 面板，且 C06/C08 的回答尾部文本超过采集上限，11 条统一记录为 `partial / owner-review-pending`，有效分母仍为 0；不据此修改网站。原始证据位于 Git 外私有目录，结构化台账见 [`有效复测执行包`](../geo/testing/valid-retest/README.md)。 |
| 2026-10-20 | SEO-V2-005：Knitted Fabrics 新增 single jersey / interlock / rib / jacquard 四结构模块并完成生产部署验收（[Change Card](../seo/implementation/change-cards/seo-v2-005-knitted-fabric-structures-2026-10-20.md)） |
| 2026-10-23 | SEO-V2-005：建立 Merino 商业词固定监测 V1；FLATLOCK → Merino 单处上下文内链生产部署验收；完成 Underwear seamless 本地稿（[Change Card](../seo/implementation/change-cards/seo-v2-005-flatlock-merino-context-link-2026-10-23.md)） |
| 2026-10-27 | SEO-V2-005：Underwear seamless 生产部署验收关闭；Knitted Fabrics Day 7 复查完成；完成针织结构词与六品类第二轮三市场 SERP 研究；Sportswear Yoga 模块生产部署验收关闭（[第二轮研究](../seo/research/serp-commercial-round2-us-gb-ca-2026-10-27.md)） |
| 2026-10-28～29 | SEO-V2-005：Sports Accessories 头颈配件（balaclava / neck gaiter）模块完成本地稿与生产部署验收（[Change Card](../seo/implementation/change-cards/seo-v2-005-accessories-head-neck-2026-10-28.md)） |
| 2026-10-29 | GEO：ChatGPT Search 批次 D（Dot 7 条 + 手动 BD-01）验收收口、来源对照完成；C06 Tech Pack 真实改造示范（尺寸表/BOM/9 页 PDF）上线并通过生产验收（[C06 示范](../geo/testing/valid-retest/batch-d-2026-10-29/c06-tech-pack-demo-2026-10-29.md)） |
| 2026-10-30 | GEO：E01 来源核查完成；Google AI Mode 11 题归档对照；C08 OEM 尽调指南两处核验路径增补上线并请求索引；LinkedIn Tech Pack 新示范帖发布（[C08 增补](../geo/testing/valid-retest/batch-d-2026-10-29/c08-guide-copy-draft-2026-10-30.md)） |
| 2026-10-31 | GEO：FLATLOCK → ACTIVESEAM 正文衔接内链上线验收；C06/C08 内容更新日期与 Hub 示范提示完成本地准备；确认官网 + LinkedIn + Instagram 纳入 GEO 范围（[指南内链](../geo/testing/guide-context-links-2026-10-31.md)） |

---

## 2. 2026-10 下旬原始分段详录（原样保留）

## 2026-10-20 SEO-V2-005 实施补记

所有者明确当前阶段优先 Google 非品牌曝光和商业词排名，不将面料页表单默认品类的准确性作为本轮任务。既有 URL、Title、Meta、H1 与页面所有权不变，仅在 Knitted Fabrics 新增 single jersey / interlock / rib / jacquard 的结构、材料方向、服装应用和开发输入模块。文案使用已确认能力与一般结构原理，不新增固定 GSM、成分比例、性能结果、认证或图片证据；初版经本地审核流程后，所有者已于当日确认生产部署。

PHP 语法、七品类数据/模板隔离、LocalWP 与生产 360 / 768 / 1024 / 1440px 均通过；生产七品类 200、单一 H1、7/7 可索引、0 high / medium issue，新模块仅面料页显示，实际 Title/Meta、Canonical、CollectionPage、五组图片、Sitemap 唯一条目及首页入口正常，生产 CSS 与本地一致。GSC 为 `PASS / Submitted and indexed`，Canonical 一致，最后抓取 `2026-10-19T11:38:33Z`，早于本次部署，不能证明新版已被抓取。25 URL 部署后稳定 Diff 无新增状态或索引回归；首次历史 Diff 的 9 个 changed 未展开逐 URL 明细，不用于本批归因。HSTS / Sportswear 大图沿用既有 deferred；Turnstile 在重用会话导航时有间歇报错，但两页独立新会话未复现，实际提交未测试，记录 monitor-only。完整证据及处置见 Change Card。当前 `deployed / production-verified / measuring`，Finding outcome `changed / keep-measuring`。

`inc/product-category-data.php`、`template-parts/product-category/page.php`、`style.css` 已部署；没有新增图片或 JavaScript，本次验收无额外部署文件。Day 0 为 2026-10-20，Day 7 / 28 / 90 为 2026-10-27 / 11-17 / 2027-01-18；完整效果窗口为 10-21～11-17，等 final 数据覆盖末日后读取。原 Knitted 2026-11-30 Day 90 后窗已混入新变量，须披露。详见 [Change Card](../seo/implementation/change-cards/seo-v2-005-knitted-fabric-structures-2026-10-20.md) 与 [GSC 基线](../seo/gsc-data-log.md)。

## 2026-10-23 Merino 固定商业查询监测

按所有者决定，产品样例与行业引用暂由所有者继续选材 / 关注，先执行 SEO-V2-005 的固定商业词观察。已建立并回读本机查询组 `merino-commercial-core-v1`：apparel、clothing、base layer、underwear 四个精确 manufacturer 查询，固定 US / GB / CA、English、Google Desktop、Top 50，不改公开页面或页面所有权。GSC 2026-09-23～10-20 的 final 28 日 Page 为 4 clicks / 177 impressions，但 Query 明细仅覆盖 13 impressions，四个固定词均未返回行；国家 / 设备明细也不闭合，保持 partial。今天 apparel US 取得自然排名第 28、absolute 32，GB / CA 超时；与 10-20 五组历史成功快照合并的最近记录矩阵仍为 6/12 可得，不写成完整当前排名或已证明增长。

下次 GSC 周度节点为 10-30；首个不重叠 28 天后窗为 10-21～11-17，预计 11-20 起等 final 覆盖后分析。下一批付费排名按四词 × 三地分 11-20 / 11-21 两天采集，先检查预算，不自动调高限额或持续重试；没有安装后台付费任务或提醒。Merino 12-06 Day 90 不变。本轮仅更新监测记录，现有 Backlog 与两份 GEO 未提交修改保留不动。详见 [固定监测 V1](../seo/research/merino-commercial-monitor-v1.md) 与 [数据记录](../seo/gsc-data-log.md)。

## 2026-10-23 SEO-V2-005：FLATLOCK → Merino 单处内链

所有者批准只在 FLATLOCK Guide 的材料段，把已有 `Merino wool blend` 链接至 `/merino-wool-manufacturer/`；不执行 OEM Evaluation 的可选链接，不扩写 GEO 正文。仅修改一个主题 PHP 文件的一行，原文字、URL、Title、Meta、H1、Canonical、Schema、技术复核日期、媒体、CSS、JS 和表单不变。2026-10-23 所有者确认部署后，生产 raw HTML 与 390 / 1440px 浏览器均确认新增链接恰好一个；键盘焦点和实际点击到 Merino HTTP 200 均通过，来源页正文、元数据、Schema、媒体清单及原链接与部署前一致。三 URL 防护检查、Sitemap 唯一条目与 Merino 反向入口正常；目标整页 textContent hash 不作为逐字零差异证据，完整边界保留在 Change Card。

状态 `deployed / production-verified / measuring`，本批部署记录关闭，Finding outcome `changed / keep-measuring`，排名收益仍 `unverified`。唯一主题文件 `template-parts/technical-article/content-flatlock-vs-overlock-technical-knitwear.php` 已上线，无额外部署。Day 0 / 7 / 28 / 90 为 2026-10-23 / 10-30 / 11-20 / 2027-01-21；本链接后窗 10-24～11-20 等 final 完整后再分析。Merino 原 12-06 Day 90 与既定监测保持不变，未来比较需披露这次入链变量。审计覆盖、GSC 基线、工具 Finding 处置、风险及验收边界见 [Change Card](../seo/implementation/change-cards/seo-v2-005-flatlock-merino-context-link-2026-10-23.md)。既有 Backlog 与两份 GEO 未提交修改保留不动，不新增 Backlog 项。

## 2026-10-23 SEO-V2-005：Underwear seamless 本地稿

六个商业服装品类的需求覆盖筛选后，只选择当前已确认的 Underwear seamless 正文缺口；其他五页 `no-change`，不扩充 Backlog。所有者确认 genuine seamless 适用于男士 boxer briefs / trunks、女式 briefs / camisoles、thermal base-layer tops / bottoms，并可稳定定制 knitted patterns、ventilation / support zones、waist / leg openings、sizing / fit；目前没有对应订单、样品或实物照片，故只介绍能力，不虚构履历、设备或实测性能，也不把既有图片当 seamless 证据。

经“开始制作”授权，现有 Underwear 页在产品展示后新增一个条件式无图模块，区分 seamless 与 FLATLOCK / ACTIVESEAM / bonded details，并说明必要连接和收口按款打样确认。URL、Title、Meta、H1、Schema、原内容、链接、图片、视频与表单不改。PHP、七品类 raw HTML 前后字段对照及 Chrome 360 / 768 / 1024 / 1440px 布局通过；只有 Underwear 出现该模块，其他六页无新增输出。

10-23 制作时状态为 `local-draft / local-verified / owner-review-pending`；2026-10-27 所有者确认部署后已完成下述生产验收。完整证据、GSC 基线、工具 Finding 处置和风险见 [Change Card](../seo/implementation/change-cards/seo-v2-005-underwear-seamless-2026-10-23.md)。既有 Backlog 与两份 GEO 未提交修改保留不动。

## 2026-10-27 SEO-V2-005：Underwear seamless 部署验收关闭

生产新模块与 10-23 本地稿一致，CSS 已生效；Chrome 360 / 768 / 1024 / 1440px 无横向溢出、四项定制完整，16/16 原产品图资源 HTTP 200，未把原图当 seamless 实物证据。七品类均为 HTTP 200、可索引、单一 H1、自引用 Canonical；只有 Underwear 输出该模块。相对本地基线，七页原正文、内链及媒体清单保持一致，Underwear Title / Meta / H1 和规范化 origin 后的 Schema 一致；robots 指令顺序及 Sportswear Meta / dateModified 的环境差异如实保留，不冒称完整生产部署前后 Diff。Page Sitemap 为 20 条 / 20 个唯一 URL，七品类各一次，首页保留两个 Underwear 入口。

`audit-urls` 7/7 fetched、0 failed / skipped、0 high / medium；两个 review 全部处置：`hsts_missing` 沿用 `deferred / owner-action`，`image_oversized_candidate` 沿用 Sportswear `deferred / monitor-only`。保留工具 coverage unknown，不扩大为全站无回归或排名收益。状态 `deployed / production-verified / measuring`，本模块部署记录关闭，Finding outcome `changed / keep-measuring`。三个主题文件已上线，无需额外部署；本轮只有内部记录变更。

以 10-27 部署确认和验收日为保守 Day 0（具体上线时刻未知），Day 7 / 28 / 90 为 **2026-11-03 / 2026-11-24 / 2027-01-25**；完整后窗 10-28～11-24 等 final 覆盖后读取，计划比较前窗 09-29～10-26，本轮未取该窗数值。Underwear 原 **11-30 Day 90 不重置**，须披露新增 seamless 变量。未做新 URL Inspection，不声称 Google 已抓取新版，也不重复请求索引。该段只记录 Underwear 验收；Knitted Fabrics 的独立 Day 7 结果见下一节。详见上述 Change Card。

## 2026-10-27 SEO-V2-005：Knitted Fabrics Day 7 完成

URL Inspection 为 `PASS / Submitted and indexed`，最后抓取更新为 **2026-10-21T19:26:22Z（北京时间 10-22 03:26:22）**，Canonical 一致且抓取成功，确认部署后重新抓取。生产结构四卡 / 十二组定义及原五图正常，360 / 1440px 无横向溢出，元数据、原内容、链接、媒体和 Schema 与规范化 origin 后的 10-23 本地快照一致；单页审计 0 Finding，保留 coverage unknown 和非 HTTP 链接过滤提醒。既有 Turnstile 间歇错误未在一次新会话中复现，但验证码响应字段与实际提交未验证，保持 Info / monitor-only，不宣称提交通过。

GSC final 本次只到 **10-24**：最新 28 天 09-27～10-24 为 **0 clicks / 132 impressions / average position 12.89**，Query 仅覆盖 19 次，其中固定七个商业词 15 次；Country 合计同样只有 19，单维控制未闭合，不判全部流量市场。前四日 10-16～19 为 **0 / 44**，排除部署日的后四日 10-21～24 为 **0 / 6**；10-18 / 19 的尖峰不能记成本次 10-20 模块收益，四日回落也不足判失败或回滚。当前滚动 28 日与冻结基线重叠 21 天，不归因于单一改动。

Day 7 技术 / 抓取检查关闭，outcome **`no-change / keep-measuring / not-enough-data`**，不改网站、不新增 Backlog、无需部署。Day 28 仍为 **11-17**，完整后窗 10-21～11-17 等 final 覆盖后预计 **11-20 起**核验；原 11-30 和新模块 2027-01-18 Day 90 保留。全部 Query、日期与市场缺口见 [GSC Log](../seo/gsc-data-log.md)，技术和处置见 [Change Card](../seo/implementation/change-cards/seo-v2-005-knitted-fabric-structures-2026-10-20.md)。

## 2026-10-27 SEO-V2-005：结构采购词三市场研究完成

按所有者授权，完成 single jersey / interlock / rib knit / jacquard knit 四个精确 manufacturer 查询的 US / GB / CA Google Desktop 快照：**12/12 单元、configured depth 10、112 个自然结果行 / 102 个唯一 URL**。三个失败单元各重试一次后全部恢复；日账本已知实际 $0.026、unknown $0.002，日／月额度未调整。保留两个 rank 字段、角色初分及选定官网复核限制；不把快照结果数当搜索量，也不把有界范围未见 Athletik 当成未收录或全网无排名。

四词均有供货意图，但并非纯 B2B。single jersey / interlock 优先作为现有面料页的真实样布准备方向，不是流量或易排名排序；rib 区分整幅服装面料与袖口／领口辅料，jacquard 排除梭织／家居语义扩散。现有四卡已覆盖结构、材料、应用及开发输入，未确认需要立即补定义或改主词；下一候选是所有者选定 **1～2 款真实样布与对应实际结构、composition / GSM**，缺少照片不等于否定已确认能力。

Finding outcome **`no-change / evidence-preparation / keep-measuring`**。首轮只归档研究，不改网站、Backlog、页面所有权或观察窗口，**无需部署**；若未来上线样例，另行批准并披露新增变量。Knitted Day 28 仍为 11-17，等 final 覆盖预定后窗后预计 11-20 起读取。完整浅层结果、费用、七个 review 和三条 action 提示处置见[结构词研究](../seo/research/knit-structure-serp-us-gb-ca-2026-10-27.md)。

随后所有者确认 DataForSEO 充值，明确批准扩充研究并将原金额限额提高十倍。本机已设置并回读：**daily notice $0.50 / daily hard $1.00 / monthly hard $5.00**，每报告 10 请求 / 1000 行不变；保留新值，不恢复旧 $0.10。账户充值后余额核验为 $50.152680。新增 24 单元各最多复试一次，**20 成功 / 4 unavailable**；结构词 depth 50 与材料组合 depth 10 各 10/12 成功，保留 **595 行 / 439 唯一 URL**，25 个单元内重复行不重新编号，73 条描述性 Finding 均 `no-change`。不可得为 single jersey GB / CA 深层、merino jersey CA、nylon spandex rib US，不能补零或冒称完整三市场 Top 50。

扩充后，**服装用 polyester interlock 优先准备实物例，performance polyester jacquard 是新增待确认方向**；Merino jersey 仍混零售，nylon/spandex rib 仍扩散至泛弹力与 tricot，不能自动新建页面或认定低竞争。新增费用本机已知 $0.132、unknown $0.056、effective $0.188，未超本轮 $0.25；今日累计本机 actual $0.158 + unknown $0.058 = effective $0.216，账户余额 $50.004680（账户与本机口径不强行对齐）。最终 `research-complete-with-limitations / no-site-change / keep-measuring`，无网站部署文件。详见[扩充报告](../seo/research/knit-structure-serp-expanded-2026-10-27.md)，当前预算口径同步到 SEO Process 与 Merino 监测规则；原观察日期保持不变。

## 2026-10-27 SEO-V2-005：六个商业品类第二轮 SERP 研究完成

所有者批准对 Underwear、Sportswear、Merino、Outdoor、Silk 和 Accessories 扩充研究，不包含已在同日完成的 Knitted Fabrics。24 词 × US / GB / CA 的 72 组 depth-10 初筛为 **68 可用 / 4 unavailable**；据意图和现页内容选 8 词，24 组 depth-50 为 **22 可用 / 2 unavailable**（US Yoga 为 `partial`，结果数估算无效但保留 50 行）。共保留 **1,685 行 / 1,117 唯一 URL**，186 条工具 Finding 全部 `no-change`；113 条 coverage 保留 111 次 fresh 尝试及 2 次免费缓存恢复，不把失败补零或以浅层代替深层。

主站的浅层出现为 performance underwear GB 6 / CA 5；深层 Merino T-shirt CA 原始 rankGroup 15 / rankAbsolute 18。CA performance underwear 深层只返回 9 行且未见主站，US / GB 深层不可得；本轮不构成稳定排名历史或因果证明。PowerMerino 经所有者确认控制，仅作内部自有站分类，不计独立竞争对手/第三方背书或主站排名，不互链、合并或修改。

六个生产页正文均已对照，**最值得下一步窄范围评估的是 Sportswear Yoga 的产品级开发说明，以及 Accessories balaclava / neck gaiter 的分别呈现**；不是新增能力或关键词缺口。Underwear seamless、Merino 梯度、Outdoor knit fleece 和 Silk underwear/base layers 已覆盖，不重复写通用 OEM/QC。只建议真实产品证据与已批准范围，不创建平行页、不改 metadata、不修改 Backlog；第三张 Accessories 图片继续锁定。19 个官网 URL 成功内容抽样，另 1 个经两次读取仍 unavailable，不把抽样当成全站技术验收。

本轮新增本机 **actual $0.364 + unknown $0.058 = effective $0.422**，低于额外 $0.65；最终日累计 actual $0.522 + unknown $0.116 = effective $0.638，月 effective $0.810。账户余额 $49.614680 / 日 spend $0.566 分开记录。金额限额仍为 notice $0.50/day、hard $1/day、hard $5/month，每报告 10 请求 / 1000 行不变。

Outcome：`research-complete-with-limitations / no-site-change / keep-measuring`。Underwear seamless 11-03/11-24、Merino 10-30 GSC 与 11-20/21 固定 SERP、Knitted 11-17 Day 28、Silk/Accessories 12-08 等原窗口不变。完整方法、失败清单、原始位置与下一步依赖见[第二轮研究](../seo/research/serp-commercial-round2-us-gb-ca-2026-10-27.md)。**本轮无网站部署文件，无需重新请求索引。**

## 2026-10-27 SEO-V2-005：Sportswear Yoga 本地草稿验收完成，待所有者审核

所有者批准先制作第二轮研究 R2-002 对应的 Yoga 产品开发区块。已仅替换现有 `Yoga and studio wear` 简介，加入 Product and fit / Fabric and construction / Sample approval 三组要点及 lookbook / Contact 入口；复用原产品图和现有 lookbook，不增加数字、材料配方或性能承诺，不改 URL、metadata、H1、Schema 配置、MOQ 或表单。共享模板条件渲染，样式仅限新组件。

两个 PHP 文件语法、七品类配置前后隔离与源码 diff 检查通过；其他六品类数据不变。初次 LocalWP 502 经所有者启动/重启后解除，已采集本批源码补丁前后真实本地 HTML：七页 HTTP 200、各一个 H1，metadata / Canonical / robots / JSON-LD 相同；排除 Yoga 目标区和动态询盘区后，原正文、链接及媒体清单相同。360 / 390 / 768 / 1024 / 1440px 截图无横向溢出，两条入口有效、44px 触控高度，既有 lookbook 点击/键盘放大、切图和关闭正常；未提交表单。768px 下此产品组改为上下排列，避免窄双栏留白；原图属性与其他产品组布局不变。状态为 `local-draft / local-verified / owner-review-pending`，Finding outcome `changed / local-draft`，搜索收益仍 unverified。

现在可在本地 `#subcat-yoga-and-studio-wear` 审核，尚未部署；所有者审核通过后待部署文件仅 `inc/product-category-data.php`、`template-parts/product-category/page.php`、`style.css`，没有 uploads / JS / 数据库改动。Day 0 和后续窗口待生产部署确认，不从草稿日期计时；本地通过不等于生产或 Google 抓取验收。完整英文稿、事实边界、风险与验收清单见 [Yoga Change Card](../seo/implementation/change-cards/seo-v2-005-sportswear-yoga-2026-10-27.md)。原 Backlog 与两份 GEO 未提交修改保留。

所有者随后视觉复审要求删除该初稿的两个 CTA 链接，已从数据、共享模板和专属 CSS 一并移除，不保留空容器。七品类原字段对照及 360 / 390 / 768 / 1024 / 1440px 本地截图复测通过；三组正文、原图及现有其他入口不变，链接位置无残留留白。现稿仍为 `local-verified / owner-review-pending`，尚未部署，仍须上述三个主题文件一起部署；详见 Change Card 第 9 节。

## 2026-10-27 SEO-V2-005：Sportswear Yoga 生产部署验收关闭

所有者确认最终无链接版本已部署。生产 Yoga 简介、Product and fit / Fabric and construction / Sample approval 三组要点及原图与本地交付一致，两条 CTA 和空容器均已移除；生产 CSS 规范化换行后全文一致。Chrome 360 / 390 / 768 / 1024 / 1440px 无横向溢出或残留底部留白；14/14 个 lookbook 大图 GET 200，手机和桌面的点击/键盘放大、切图、关闭均通过。七品类全部 HTTP 200、可索引、单一 H1、自引用 Canonical；只有 Sportswear 输出新模块，其他六页无新增。Page Sitemap 20/20 唯一 URL，七品类各一次，首页保留两个 Sportswear 入口。

本地/生产 origin 规范化后，七页原正文、内链和媒体清单一致；保留生产 / 本地既有 robots 顺序、HTTPS social 属性，以及 Sportswear Meta / dateModified 环境差异，不冒称完整生产部署前后 Diff。定向 `audit-urls` 7/7 fetched、0 failed / skipped，0 high / medium；两个 review 均保持 deferred（HSTS owner-action、Sportswear 图片 monitor-only），coverage unknown 不改写。多次导航浏览器再次捕获既有 Turnstile 初始化提醒，沿用独立人工观察，不声明表单投递或全页面无 JS 异常；未提交表单或改线上配置。一次网页抽取旧简介与直接请求/Chrome 新版的矛盾已保留，不等同 Google 抓取状态。

状态 `deployed / production-verified / measuring`，Finding outcome `changed / keep-measuring`，本批部署记录关闭。以 **2026-10-27** 为保守 Day 0，Day 7 / 28 / 90 为 **2026-11-03 / 2026-11-24 / 2027-01-25**；完整后窗 **10-28～11-24** 等 final 覆盖后读取，预计 11-27 起核验。计划前窗 09-29～10-26 本轮未重新提取，保持 pending，不以历史快照代替。Sportswear 原观察窗口不重置，披露 Yoga 变量混入；其他既定节点不变。

三个主题文件已上线，**本次无需额外部署**，只更新内部记录。未运行新 GSC / GA4 / URL Inspection / 付费 SERP / 全站 Crawl，不重复请求索引、不扩充 Backlog；用户既有 Backlog 与两份 GEO 修改完整保留。完整范围、差异、Finding 处置和限制见 [Yoga Change Card 第 10 节](../seo/implementation/change-cards/seo-v2-005-sportswear-yoga-2026-10-27.md)。

## 2026-10-28 SEO-V2-005：Sports Accessories 头颈配件本地草稿

根据第二轮三市场 SERP 与所有者确认的 Merino wool 护脖实物图，现有首组区分 balaclava 与 neck gaiter 的采购输入，并与原头套图展示；第三张图不变，不新增页面、链接或修改 metadata。七个本地品类页与五种屏宽检查通过。2026-10-29 所有者确认后续视觉调整、代码与图片已部署，生产定向验收及图片 MIME 检查通过；2026-11-02 补录，状态 `changed / production-verified / keep-measuring`，搜索效果尚未验证。以 10-29 为保守 Day 0，11-05 为 Day 7、11-26 为 Day 28；原 12-08 Day 90 不重置并须披露本批变量。详见 [变更卡](../seo/implementation/change-cards/seo-v2-005-accessories-head-neck-2026-10-28.md)。

## 2026-11-02 SEO-V2-005：Merino 周度与 FLATLOCK 内链 Day 7 补查

Merino 的 10-03～10-30 final 28 天精确 Page 为 5 clicks / 193 impressions；Query 明细仅 17 impressions，固定四词仅 `merino wool clothing manufacturer` 返回 2 impressions，其余 `not-returned`，缺口不可补算。与旧基线重叠 18 日，不做因果结论；详见 [GSC 记录](../seo/gsc-data-log.md)。FLATLOCK 来源与 Merino 目标生产 URL 均正常，链接在 390 / 1440 px 可聚焦点击；GSC 来源最后抓取 10-27、目标 10-29，均已收录。来源 10-31 新增 ACTIVESEAM 链接为共同变量，不能因旧抓取时间断言新版已被 Google 解析。完整后窗仍待 final；均 `no-change / keep-measuring`，没有网站部署文件。

## 2026-10-29 GEO：ChatGPT Search 独立续测收口

Dot 云端 7 条经所有者确认有效；Dot 原 BD-01 首条引用卡缺失，保留 partial。所有者手动重采 BD-01，确认采用精简 Sources 留证范围，记为 `valid / owner_accepted`；首条引用卡与部分 Sources 图片留在对话，未伪称本地保存或全部来源已截图。采集模式分开，云端地区未知，正式证据等级不冒称 E3。D04/D05 本次推荐 Athletik；C06～C08 和 BD-01～BD-03 未在回答中提及 Athletik，相关官网候选不等于正文引用。结论限单次观察，不证明稳定趋势或因果。原始 Excel、6 个 ZIP 与手动回答已复制到私有证据目录并核对复制哈希，原文件保留。详见[验收与账本](../geo/testing/valid-retest/batch-d-2026-10-29/README.md)和[结论与行动](../geo/testing/valid-retest/batch-d-2026-10-29/findings.md)。未更改网站或既有 GEO/SEO 未提交修改。

同日[C06～C08 与 BD-01～BD-03 来源对照](../geo/testing/valid-retest/batch-d-2026-10-29/source-comparison-2026-10-29.md)完成：三篇官网 Guide 均已覆盖对应核心主题，C07 Guide 已进入本次 Sources 候选；宽泛问题的来源对照仅作为历史观察，单次结果无法证明官网未被引用的原因。所有者随后明确只处理 GEO，将 MOQ / 颜色沟通方案排除出本工作范围；优先盘点真实技术证据。当前不修改页面、购买目录、外联或重复请求索引。未知地区、受限来源、未核验条款及用户的手动留证例外均保持原边界。

同日完成 [C06 / C07 技术证据盘点](../geo/testing/valid-retest/batch-d-2026-10-29/c06-c07-evidence-inventory-2026-10-29.md)：两篇指南已有基本内容，C07 的两段已公开视频为不同面料的工艺示例，不是受控性能对比；既有 Merrow 自然状态素材不等于 FLATLOCK 样本。限定范围的文件名搜索未找到真实匿名 Tech Pack 样本，不代表公司不存在此材料。需先确认真实来源、项目授权与保密边界，再评估是否补充页面；本轮未修改网站。

所有者随后提供真实 Tech Pack 改造示范并授权使用；[C06 示范内容实施及生产验收](../geo/testing/valid-retest/batch-d-2026-10-29/c06-tech-pack-demo-2026-10-29.md)在现有指南加入尺寸表、BOM 和完整 PDF 入口，均标明仅供示范、不用于生产。所有者于 2026-10-29 确认审核通过，同日生产定向验收通过，状态 `owner-approved / production-verified / observation-pending`；精确部署时刻及搜索引擎重新抓取状态 unknown，未声称带来引用增长。

## 2026-10-30 GEO：E01 来源定向核查

[E01 本轮实际引用来源核查](../geo/testing/e01-source-trace-2026-10-30.md)已关联既有 `GEO-BV2-002`：生产基地段共引 `.nyc`、`.ca` 和中国站，不能把结果单独归因给某一来源；`.nyc` 当前首页仍有旧伙伴工厂表述，中国站首页未见此表述且继续使用，`.ca` 仅记录解析网址但当前无法读取正文。所有者确认 `.nyc` / `.ca` 无控制权，接受残余风险并监测；不擅自登录、修改、联系、关闭或重定向。规范站和中国站各自角色及此前第三方目录决定不变。

Google AI Mode 的 11 题 Dot 首答已私有归档，完成[逐题观察及与 ChatGPT 对照](../geo/testing/valid-retest/google-ai-mode-2026-10-29/README.md)。五题的部分引用位置缺最终 URL，已知答案与可核对引用仍可观察；环境和日期与 ChatGPT 样本不同，不能混算表现率或归因于页面改动。

同日已完成 [C08 官网指南证据与内容缺口核查](../geo/testing/valid-retest/batch-d-2026-10-29/c08-guide-gap-audit-2026-10-30.md)：现有尽调框架保留，优先建议补充中国企业登记和实验室认可范围的具体核验路径；目前为内部建议，尚未修改网站正文。

同日 [C08 两处英文增补](../geo/testing/valid-retest/batch-d-2026-10-29/c08-guide-copy-draft-2026-10-30.md)已获所有者批准并确认部署，生产两段与批准稿逐字一致；HTTP、元信息和 360 / 390 / 1440px 定向呈现验收通过，状态 `owner-approved / production-verified / observation-pending`。后续核对搜索引擎抓取状态并按既有节奏观察，不以部署验收替代引用效果。所有者明确自身登记资料问题仅为讨论，不追加资料披露或 Contact 改动任务。

同日 [C06 / C08 GSC 最新抓取快照](../geo/testing/c06-c08-crawl-status-2026-10-30.md)确认：C06 已收录，C08 为 `Crawled - currently not indexed`，最后抓取均为 10-16 UTC，早于本次更新。C08 当前前台定向检查未见明显技术阻断；优先做 GSC 网页版实时测试，通过后针对本次更新申请一次索引，尚未执行。C06 保持观察，暂不从单次 AI 结果判断新内容效果。

所有者随后确认 C08 已于同日请求编入索引，已记为 `indexing-requested / owner-confirmed`，等待后续 API 结果；建议 2026-11-06 复查，不重复申请。此前未收录结果保留为请求前快照。

所有者同日根据 Bing 后台截图决定略过本轮 AI Performance 分析：`6 M` 所选窗口显示 34 次引用，Grounding Queries 无明细。已在 [Bing 基线](../geo/testing/bing-ai-performance-baseline.md)记为 `deferred / low-signal`，不再要求本轮导出；不将截图当作零引用或与旧 28 天基线直接比较。

同日按所有者授权完成 [Tech Pack 新示范分发包](../geo/distribution/publishing-log.md)：LinkedIn 单张 1080 × 1350 JPG、英文正文、替代文字、中文发布说明和 390px 预览已准备并校验，素材位于 `D:\B-视频素材\营销内容包\2026-10-tech-pack-demo\`。所有者已确认审核及发布完成，状态 `published / owner-confirmed / public-url-pending / measuring`；七日窗口为 10-31～11-06，11-07 起复盘，实际帖子 URL 与后台数据待补。不因 C06 / C08 处于抓取观察期而停止新素材分发。

同日完成 [YouTube 既有视频英文信息核对与三条更新稿](../geo/distribution/youtube-video-details-2026-10-30.md)：公开列出 90 条、核对 6 条相关视频元数据与缩略图，针对 `YUxwc5DoFSk`、`fyu-1_aarzY`、`sPS4_jD8nBc` 准备原视频标题、说明及规范指南入口。2026-10-31 所有者明确该账号不在其管辖，方案现为 `closed / out-of-scope / not-applied`；保留历史草稿，撤下 YouTube 编辑待办，不要求接管账号。

2026-10-31 已完成 [技术指南正文衔接及生产验收](../geo/testing/guide-context-links-2026-10-31.md)：只在 FLATLOCK / OVERLOCK 的 ACTIVESEAM 介绍段将既有词语链接到对应专页，Tech Pack 和反向入口已有，不重复堆链。所有者确认部署后，生产原始 HTML 与 390 / 1440px 浏览器均确认新链接生效，实际点击进入 HTTP 200 的目标指南；来源正文、元信息、Schema 和媒体清单与部署前一致。状态 `deployed / production-verified`，本次部署验收关闭；10-31 链接上线作为既有 Merino 观察期的来源页新增变量记录，保留原窗口。

2026-10-31 已按所有者授权完成 [C06 / C08 内容更新日期修正](../geo/testing/guide-content-dates-2026-10-31.md)：分别使用已有发布记录中的 10-29 / 10-30，新增独立 `Content updated`，并对齐 Article / WebPage 及两条 Page Sitemap 日期；首次发表和技术复核时间保留。PHP、本地回归及两页 390 / 1440px 检查通过。2026-11-02 所有者确认部署后，生产日期、Schema、Sitemap 及缓存刷新已全部通过，状态 `deployed / production-verified`，保留原观察窗口。

同日所有者要求当天可做工作一并验收，已在同一批次追加 Tech Pack 示范入口说明：Guides Hub 卡片摘要提示已有尺寸表 / BOM 示范及 PDF，两处目录标签明确示范内容。统一包 `athletik-geo-batch-2026-10-31.zip` 的四个文件已于 2026-11-02 确认部署；[合并生产验收](../geo/testing/guide-content-dates-2026-10-31.md)覆盖 7 个 URL、20 条生产 Page Sitemap 记录、PDF 及 390 / 1440px 实际跳转，全部通过。两项部署验收关闭，尚未以此判断搜索或 AI 表现。

2026-10-31 后续范围更正：所有者确认控制 Instagram 与 LinkedIn，撤销此前“只做官网”的结论。官网与这两个可控账号均可纳入后续 GEO 优化和内容准备；YouTube 不在其管辖的决定保持。已同步 `AGENTS.md` 与 YouTube 关闭记录，当前官网合并部署包继续完成，不因范围更正遗漏已授权事项。

