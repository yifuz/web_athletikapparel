# SEO Change Card：SEO-V2-005 Knitted Fabrics 能力证据澄清

- Change ID：`SEO-V2-005-KF`
- Finding type：`opportunity`
- 优先级：P1
- 状态：`fixed / measuring`
- 实施阶段：`production-accepted / measurement-open`
- 实施日期：2026-09-01
- 生产验收日期：2026-09-01
- 目标页面：`/knitted-fabrics-manufacturer/`
- 目标市场：美国、英国、加拿大
- 搜索意图：寻找可开发和供应 performance、thermal、stretch 与 functional knitted fabrics 的 B2B fabric mill / manufacturer
- 买家任务：确认供应商是否具备功能针织面料开发、规格管理、测试与独立面料供货能力
- 唯一主要变量：现有正文对 fabric mill 所有权、in-house testing 和 approved specification 工作关系的可见表达
- 不变项：URL、Canonical、SEO Title、Meta Description、H1、图片、Schema 类型、导航、CTA、产品模块数量及站点信息架构
- 允许 outcome：`fixed / measuring`、`iterate`、`revert`

## 触发证据与判断

- GSC final 28 天 Page × Query 可见明细中，`functional knitted fabrics factory` 为 2 impressions、0 clicks、average position 37；样本只足以形成探索性假设，不能证明趋势或支持 Title / Meta 实验；
- Sportswear 同轮只出现 1 次不匹配的其他公司品牌词曝光；Sports Accessories 没有可见 Query 行。二者均不具备当前正文改动依据；
- 2026-09-01 DataForSEO Google Desktop Live SERP 在 US / GB / CA 的结果均以真实 knitted fabric supplier / mill 页面为主，反复出现功能整理、针织结构、服装应用、开发和测试能力。代表结果包括 [Huiliang Textile](https://www.huiliang-textile.com/en/category/Knit-Fabric.html)、[HerMin Textile](https://www.hermin.com/category-knit-fabric.html)、[Hong Li Textile](https://www.hongli.com.tw/en/category/Functional-Knits-Fabric.html) 与 [Fine Cotton Factory](https://www.finecottonfactory.com/)；单次快照只用于验证意图和页面所有权，不作为持续排名证据；
- 当前生产页已经覆盖 performance、thermal、functional、stretch、Merino wool、recycled、fabric brief、sample 与 testing requirement，不属于薄内容。实际缺口是已确认的 `our own fabric mill` 和 `in-house testing` 没有在该页当前正文中明确出现；
- 所有者此前确认 `our own fabric mill` 和 `in-house testing` 均可公开使用；检测方式可根据客户要求包含自有检测与第三方检测。Beta Textiles 资料只作为内部一方证据，公开页面不关联、互链或描述两个名称的关系；
- Finding outcome：Knitted Fabrics 为 `implementation-ready`；Sportswear 与 Sports Accessories 为 `no-change`。

## 实施内容

- Intro 明确独立面料订单与 B2B custom development 通过 `our own fabric mill` 承接，并将 in-house testing 绑定 agreed fabric specification；
- 将通用 H2 `What we make` 覆盖为 `Functional knitted fabrics for performance apparel`，强化已存在的页面主题，不改变 H1 或页面所有权；
- 将能力 H2 改为 `Develop functional knits against an approved specification`；
- 在既有 fabric brief 正文中明确 development 通过 own fabric mill 管理，knitting、dyeing、finishing 与 in-house testing 按 approved specification 协调；保留第三方测试按所需标准安排的条件式表达；
- 不加入 `factory` 的机械重复，不修改 Title / Meta，不创建 `Performance Fabrics` 或 `Functional Fabrics` 平行页。

## 风险与控制

- 主要风险：低曝光下自然波动远大于可归因变化，新增正文可能短期改变 Query 组合；
- 事实控制：不使用 `full in-house testing`、保证性结果、测试数值、产能、客户或未经核实的认证编号；
- 边界控制：`our own fabric mill` 不被扩写为所有工序均由单一法律实体完全自营；第三方测试仍明确为按标准和项目要求安排；
- Cannibalization 控制：Knitted Fabrics 保持独立面料供应商业页，Sportswear / Underwear 保持成衣 OEM 页面；不建立近义页面；
- 变量控制：本次三个正文位置属于同一 capability-evidence cluster；URL、Title、Meta、H1、图片和 Schema 类型均不变；
- 回滚条件：出现事实错误、渲染或索引回归，或完整观察窗口出现与目标 B2B fabric intent 明显相反且无法由其他发布解释的页面主题偏移。

## 验收标准

### 本地 / 部署前

- [x] `inc/product-category-data.php` 使用项目 PHP 8.2.30 语法检查通过；
- [x] 本地 Knitted Fabrics 返回 HTTP 200、单一 H1，URL、Title、Meta 与 H1 保持原值；
- [x] 新 H2、intro 与 capability 正文只在 Knitted Fabrics 输出；Sportswear 对照页未出现这些字段；
- [x] `our own fabric mill`、`in-house testing`、第三方测试与 approved specification 的关系清晰且无绝对化保证；
- [x] 无 Beta Textiles 公开关联、未解决占位符、营销空话或新增图片；
- [x] Git diff 仅包含 Knitted Fabrics 数据、本 Change Card 与执行状态记录。

### 生产 / 部署后

- [x] 页面返回 HTTP 200、`follow, index`、无 X-Robots-Tag、自引用 Canonical，只有一个 `Knitted Fabrics Manufacturer` H1；
- [x] Title、Meta、H1、OG/Twitter 图片与 Schema 类型保持不变；OG/Twitter 继续使用既有 Knitted Fabrics 1200×627 JPEG；
- [x] Intro、`Functional knitted fabrics for performance apparel`、`Develop functional knits against an approved specification` 与 capability 正文均在生产 HTML 生效；第三方测试边界仍保留；
- [x] 生产页无 Beta Textiles / BTEXCO 公开关联、未解决占位符或营销空话；1 个 JSON-LD block 解析通过，Schema 类型保持 CollectionPage、WebSite、ImageObject 与 PostalAddress；
- [x] Microsoft Edge + Playwright 在 1440×900 与 390×844 完成 full-page 渲染检查；两种 viewport 的 `scrollWidth / innerWidth` 分别为 `1440 / 1440` 与 `390 / 390`，滚动触发 lazy loading 后均为 7/7 图片加载、0 broken image。首屏、新 H2、能力正文、规格条、相关链接和询盘表单均正常，无文字截断、横向溢出或异常空白；
- [x] Page Sitemap 保留该规范 URL，生产首页保留现有品类入口；
- [x] Day 0 outcome 已写回本卡、V2 Backlog 与进度记录。

Day 0 说明：最初使用 Edge `--window-size=390,844` 截取外窗时出现右侧裁切；随后使用 Playwright 通过系统 Edge 建立真实 390×844 viewport 并完成 full-page 复验，页面没有相同裁切。前一截图属于工具外窗与 CSS viewport 不一致，不作为生产回归证据。

## 复盘窗口

- Day 0：生产 HTML、索引信号、正文边界和视觉验收；
- Day 7（2026-09-08）：只检查抓取、索引与明显 Query 偏移，不继续改文案；
- Day 28（2026-09-29）：按相同口径比较页面 GSC clicks / impressions / Query / country、GA4 Organic Search 与人工核验询盘；
- Day 90（2026-11-30）：结合季节性和其他发布记录决定 `keep`、`iterate` 或 `revert`。
