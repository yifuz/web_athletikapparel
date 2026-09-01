# SEO Change Card：SEO-V2-005 Underwear 页面证据增强

- Change ID：`SEO-V2-005`
- Finding type：`opportunity`
- 优先级：P1
- 状态：`ready-to-deploy`
- 实施阶段：`local-complete / production-pending`
- 实施日期：2026-09-01
- 目标页面：`/underwear-manufacturer/`
- 目标市场：美国、英国、加拿大，并覆盖北美与欧洲英语 B2B 买家
- 搜索意图：寻找可承接 performance underwear、men's boxer briefs、thermal base layers 与相关 OEM/ODM 项目的制造商
- 买家任务：判断供应商的产品范围、材料与接缝能力、开发输入和 MOQ 是否适合项目
- 业务动作：进入技术指南或提交符合 MOQ 的询盘
- 唯一主要变量：现有 Underwear 页采购证据与买家决策模块的完整性，包括正文和规格条
- 不变项：URL、Canonical、SEO Title、Meta Description、H1、图片、Schema 类型、导航、CTA、其他品类页正文与站点信息架构
- 允许 outcome：`fixed / measuring`、`iterate`、`revert`

## 触发证据与数据状态

- 2026-08-31 DataForSEO Google Desktop Live SERP 显示，US / GB / CA 的 `performance underwear manufacturer` 主要返回 manufacturer、factory、private label 与 OEM 页面；Athletik 的 `/underwear-manufacturer/` 在 GB 单次快照中为 `rankAbsolute 10`。该结果只证明页面所有权和商业意图匹配，不是持续排名证据；
- 2026-09-01 US Desktop Live SERP 复核了 `performance underwear manufacturer`、`underwear OEM manufacturer`、`boxer briefs manufacturer`、`thermal underwear manufacturer`、`private label performance underwear manufacturer`、`sports underwear manufacturer` 与 `custom base layer manufacturer`。Performance Underwear / Private Label 结果反复出现 product scope、fit、waistband/pouch、fabric、testing、QC、MOQ 与 buyer questions；Thermal 和 Base Layer 仍混合零售、目录、workwear、equestrian 与 seamless 意图，因此只增强现有 Underwear 页，不创建平行页；
- 上述 7 个 DataForSEO task ID 依次为 `09010220-2417-0139-0000-e15cff89fc88`、`09010220-2417-0139-0000-58bc2db513fc`、`09010220-2417-0139-0000-b13294324dd7`、`09010220-2417-0139-0000-0ba2d8f95e1e`、`09010223-2417-0139-0000-034bc59159f3`、`09010223-2417-0139-0000-05d1566db224`、`09010223-2417-0139-0000-87be4e0ff9fb`；均为单次 Live snapshot，不作为排名历史；
- GSC final 28 天 Query/Page 可见明细样本仍很低：此前非品牌明细合计 2 impressions。2026-09-01 `audit-page` 的页面汇总为 26 impressions / 0 clicks / average position 23.85，但两种报告口径和可见 Query 完整性不同，不能混写成同一词级样本；
- 生产页上线前审计为 HTTP 200、`index, follow`、单一自引用 Canonical、单一 H1、0 issue；正文抽取为 237 words。技术索引并非当前阻塞，缺口主要在买家判断所需的产品、材料、接缝和开发输入信息；
- 所有者确认核心成衣业务包括各类 underwear、base layer、sportswear 与 yoga apparel，均使用针织面料；公开成衣 MOQ 为每款 500 pieces；`our own fabric mill` 和 `in-house testing` 可公开使用；
- 2026-09-01 所有者进一步确认 Athletik 可稳定提供 men's / women's performance underwear、custom elastic waistband、woven or printed branding、main / care labels、private-label packaging、supportive pouch development 与 mesh ventilation panels；这些能力按项目 specification 和 approved sample 表述，不延伸为未确认的材料参数或测试结果；
- 2026-09-01 所有者确认 Athletik 可稳定提供真正的 `seamless construction`。因此当前生产 Meta 中该能力表述准确，Finding outcome 为 `keep`；`seamless construction` 与 `bonded-welded construction` 是不同能力，不互相替换；
- 因曝光不足，当前数据不能支持 Title / Meta CTR 实验，也不能证明新增近义 URL 有收益。本次由所有者批准在既有页面内做受控正文增强，不把低曝光本身当作关键词替换证据。

## 实施内容

- 保留 `Underwear Manufacturer` 的 URL、Title、Meta 与 H1；Hero eyebrow 调整为 `Performance underwear OEM/ODM`，正文明确页面承接 performance underwear、men's boxer briefs、thermal base layers、microfiber 与 Merino wool 项目；
- 四个既有产品模块分别补充 fit、pouch、waistband、layering、stretch/recovery、moisture management、fabric weight、care 与 sample approval 等买家判断信息；不添加图片，不改变产品模块数量；
- 将能力模块改为“采样前应定义什么”，列明 intended use、size range、target fit、tech pack、fabric、seam map、trim、testing 和 order quantity，并使用已确认的 own fabric mill、in-house testing 与 500 pieces per style；
- 将两个通用品类 H2 覆盖为 `Performance underwear programs` 与 `Performance underwear products we manufacture`；其他品类继续使用共享默认标题；
- 增加 `Private-label customization and underwear quality control` 模块，公开已确认的男/女 performance underwear、waistband branding、label、packaging、pouch 与 mesh 能力，并把 inspection criteria 绑定 approved sample / specification / buyer acceptance criteria；
- 增加 4 个可见 Buyer Questions，回答 MOQ、采样输入、private-label options 与性能要求确认方式；不添加 FAQ Schema；
- 补充 intended activity / climate、target market、delivery destination、packaging requirements 与 target price range 等开发输入；
- 增加到 `/technical-knitwear-tech-pack-guide/` 与 `/garment-quality-control-checklist/` 的上下文相关内链；保留 Sportswear、Merino、FLATLOCK guide 与 Services 链接；
- 删除旧文案中把有接缝结构概括为 `seamless feel` 的模糊表达，所有性能要求均改为依赖实际材料、成衣、测试方法和买家标准确认的条件式表述；
- 将深色规格条从双重纵向 padding 收紧为单层紧凑布局，数字与单位拆为独立元素；仅在 Underwear 中把重复的 `Service` 卡改为 `Construction`，展示 `FLATLOCK / ACTIVESEAM`，并以 `Seamless and bonded-welded options by project.` 说明已确认的不同结构能力；
- 所有者决定暂不增加第二组页面视频：既有 Hero 已承担动态展示，工艺视频继续通过 Instagram 入口提供。页面不嵌入 Instagram Feed，不新增视频 URL、Schema 或第三方脚本。

## 风险与控制

- 主要风险：正文扩充后 Google 可能重新理解页面主题，短期曝光、Query 组合和排名会波动；低样本下不能把自然波动归因于本次发布；
- Cannibalization 控制：不新建 Performance Underwear、Base Layer 或关键词单复数平行页；Underwear 仍为 performance underwear 与一般 base layer 的主承接页，Outdoor / Merino 保持材料或应用支持角色；
- 事实控制：不声明认证编号、精确产能、客户、测试结果或未确认的法律关系；不把可选性能直接写成保证结果；
- 变量控制：本轮不改 Title、Meta、H1、图片或 Schema 类型；专属 H2、Buyer Questions、Customization / QC 与技术指南内链均属于同一正文证据变量，不拆成独立排名实验；
- 共享模板控制：数字/单位拆分和规格条紧凑样式会作用于 7 个品类页，但只有 Underwear 覆盖第三张卡的内容；Knitted Fabrics 的 fabric-specific 三卡内容不变；
- 回滚边界：出现索引、渲染、结构、品牌事实错误，或完整窗口显示页面主题明显偏离目标 B2B Query 且无其他因素可解释时，恢复本次数据字段；URL 不变。

## 验收标准

### 本地 / 部署前

- [x] `inc/product-category-data.php` 通过项目 PHP 8.2.30 语法检查；
- [x] `template-parts/product-category/page.php` 通过项目 PHP 8.2.30 语法检查；
- [x] 数据与共享模板桩确认 Title、Meta、H1 与部署前配置值一致，Underwear 保持单一 H1；
- [x] 四个 `what_we_make` 锚点与四个 subcategory title 一一对应；
- [x] Underwear 桩输出 1 个 Assurance section、2 个执行卡片、1 个 Buyer Questions section 和 4 个问题卡片；Sportswear 桩中相应区块均为 0；
- [x] Tech Pack Guide 与 QC Guide 内链指向既有 URL；
- [x] 无未解决占位符、虚构认证、精确产能、客户、测试结果或法律关系；
- [x] 新样式只使用现有 `--ma-*` token，并在 48rem 断点从单列切换为双列；无 `!important` 或新图片；
- [x] 规格条删除外层重复 padding，内部使用 `--ma-space-5`；卡片使用 `--ma-space-3` / `--ma-space-4`，没有新增硬编码颜色、间距或断点；
- [x] 默认成衣规格把 `500` / `pcs` 与 `1-2` / `weeks` 拆成独立元素；Underwear 第三张卡为 `Construction`，其余成衣品类仍为 `Service`，Knitted Fabrics 三张自定义卡保持原内容；
- [x] 本地 7/7 品类页规格条均正常输出且 HTTP 200；CSS 花括号 716/716 平衡；
- [x] Git diff 仅包含本 Change Card、Underwear 数据、共享条件式模板、对应样式与执行状态记录。

补充区块实施后的本地 WordPress URL 已恢复响应：7/7 品类页均返回 HTTP 200 且各有 1 个 H1；Underwear 输出 6 个页面主体 H2、2 个 Assurance cards、4 个 Buyer Questions 和 5 个 related links，其余 6 个品类的 Assurance / Buyer Questions 均为 0。QC Guide 使用 Assurance card 内的一条上下文链接，不在 Related 区重复。受当前命令行浏览器截图不可用限制，桌面/移动端视觉检查仍保留到部署预览与 Day 0 生产验收，不把源码断点检查写成视觉通过。

### 生产 / 部署后

- [ ] `/underwear-manufacturer/` 返回 HTTP 200、`index, follow`、自引用 Canonical；
- [ ] 生产 HTML 只有一个 H1，Title、Meta、H1、OG/Twitter 与部署前规范值保持不变；
- [ ] 新正文、四个产品模块、能力模块、2 个 Assurance cards、4 个 Buyer Questions 和 5 个 related links 正常渲染；
- [ ] Underwear 规格条显示 `MOQ 500 pcs`、`Sampling 1-2 weeks` 与 `Construction FLATLOCK / ACTIVESEAM`，深色区块上下留白明显收紧；
- [ ] 其余 6 个品类页规格条无内容、换行或移动端回归；
- [ ] 桌面与移动端布局无回归，既有图片均返回 200；
- [ ] 定向 Crawl / audit 无新增状态码、indexability、结构化数据或内部链接回归；
- [ ] Day 0 技术 outcome 写回本卡与 V2 Backlog；商业结果保留至 Day 28 / 90。

## 复盘窗口

- Day 0：生产 HTML、索引信号、正文、内链与视觉验收；
- Day 7：检查抓取、索引、Google Title 采用和明显 Query 偏移，不因小样本继续改页；
- Day 28：按相同口径比较页面 GSC clicks / impressions / Query / country、GA4 Organic Search 与人工核验有效询盘；
- Day 90：结合季节性和其他发布记录决定 `keep`、`iterate` 或 `revert`。
