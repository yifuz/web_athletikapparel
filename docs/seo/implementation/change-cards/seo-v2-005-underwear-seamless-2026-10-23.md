# SEO-V2-005：Underwear seamless 能力补强

> Change ID：`SEO-V2-005-UW-SEAMLESS-20261023`
>
> 制作日期：2026-10-23；生产部署日期：`pending`
>
> 状态：`local-draft / local-verified / owner-review-pending`，不是已批准发布
>
> Finding outcome：`changed / owner-review`；搜索收益 `unverified`

## 1. 目标、授权与主要变量

- 目标页：<https://www.athletikapparel.com/underwear-manufacturer/>。
- 搜索意图：寻找可按产品要求开发 seamless underwear / thermal base layers 的制造合作伙伴；现有 Underwear URL 继续承接，不创建 Seamless、Performance Underwear 或 Base Layer 平行页。
- 主要官网任务：`Discover / Qualify`。让买家确认产品适配、可定制内容及 construction route，减少把低轮廓缝线或 bonded details 误认成真正 seamless 的可能。
- 所有者在六品类缺口筛选后，明确确认能力、产品及定制范围；随后要求“开始制作”。授权范围为现有页面内的本地英文文案与版式草稿，正式部署前仍需所有者审核。
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
- 本地制作日不作为 Day 0。生产 Day 0 待所有者审核、实际部署确认与定向验收后登记；Day 7 / 28 / 90 按真实 Day 0 计算。排除部署日，Day 28 等完整后窗被 GSC final 覆盖后再分析，允许 `inconclusive`。
- Underwear 原 **2026-11-30 Day 90 不重置**；若新模块上线，必须披露原观察窗混入这次内容变量。其他页面原监测节点不变。
- 最终决策：本地验收通过，`changed / owner-review`，等待所有者审核；没有生产发布或搜索收益结论。

## 5. 审核后部署清单

**目前先不要部署。所有者审核通过后，同步以下三个主题文件：**

1. `wp-content/themes/myathletik-child/inc/product-category-data.php`
2. `wp-content/themes/myathletik-child/template-parts/product-category/page.php`
3. `wp-content/themes/myathletik-child/style.css`

无需新增图片、视频、JavaScript、插件或数据库修改。本卡与 `docs/progress.md` 是内部记录，不作为网站内容部署。用户既有 Backlog 与两份 GEO 未提交修改保持原样，不纳入本次提交。
