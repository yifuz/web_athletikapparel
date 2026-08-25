# Knitted Fabrics Manufacturer 页面只读 SEO 审计 V1

> 审计日期：2026-08-17
>
> 生产 URL：<https://www.athletikapparel.com/knitted-fabrics-manufacturer/>
>
> 主要词簇：`knitted fabric manufacturer`
>
> 次级词簇：`sportswear fabric manufacturer`、`knit fabric mill`、`knitted fabric factory`、`jersey fabric supplier`、Performance / Thermal / Stretch / Recycled Knit Fabrics
>
> 依据：[`serp-intent-validation-us-ca-uk-v1.md`](../research/serp-intent-validation-us-ca-uk-v1.md)、[`keyword-planner-english-baseline-v2.md`](../research/keyword-planner-english-baseline-v2.md)、[`../../seo-tags.md`](../../../seo-tags.md)、[`../sitemap.md`](../../sitemap.md)
>
> 审计方式：生产 HTML、生产 URL/robots/Sitemap/旧路径响应、本地模板、公开声称与静态图片/资源检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、表单、图片或前端资源
>
> 状态更正（2026-08-17）：当前成衣公开 MOQ 已由每款 1,000 件调整为每款 500 件。Fluent Forms 的 `Estimated Order Quantity` 是预计订单量，不等同于 per-style MOQ，现有档位未随之自动改写。下文保留实施前审计快照；其核心问题仍成立，因为 `pieces per style` 不是独立面料采购的专用单位，Knitted Fabrics 仍等待 fabric-specific 业务输入。

> 实施更新（2026-08-18）：SEO-IMP-009 已解决独立面料供货、MOQ、报价输入、开发与量产语境；SEO-IMP-010 已按 [`Knitted Fabrics 声称—证据矩阵`](../evidence/knitted-fabrics-claim-evidence-matrix-v1.md) 处理 GRS、追溯、工序、测试和性能强声称。下文继续保留 2026-08-17 的只读审计快照，不能再视为当前本地页面状态。

## 1. 结论先行

**结论：需要所有者事实输入后微调；无索引 Critical 问题。**

- 保留 `/knitted-fabrics-manufacturer/`、当前 Title 和 H1；复数 `Fabrics` 不影响其自然承接单数查询 `knitted fabric manufacturer`；
- 页面已经与 Sportswear/Underwear 成衣页分工，US / CA / UK 样本也证明针织面料采购是独立 B2B 任务，不需要新建近义页面；
- 当前最大问题不是关键词密度，而是面料页仍复用了成衣规格和询盘语言：`MOQ 1,000 pcs per style`、按件数量选项、`style complexity` 和 garment tech pack 路径无法准确服务独立面料买家；
- 在任何优化前，所有者需要确认是否接受独立面料订单，以及面料 MOQ 单位、打样/开发流程、报价输入和交付边界；
- Meta 与正文包含 `own fabric mill`、`full in-house testing`、`GRS certified`、`full traceability`、功能后整理和性能等效声称。当前审计范围内没有找到足以公开核验这些声称的当前证书、测试报告或适用条件；
- 五张产品 PNG 合计约 11.47 MB，是本页最明确的静态性能问题；
- 在事实与商业边界确认前，不建议重写 Title、H1、Meta 或批量增加关键词。

## 2. SEO Audit — `/knitted-fabrics-manufacturer/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，允许索引，自引用 Canonical 正确，只有一个 H1，并位于页面 Sitemap。没有发现缺失 Title、Meta、Schema 或意外 `noindex`。

#### 🟡 Warning

##### W1. 面料采购任务与成衣规格、询盘单位不匹配

页面把自己定位为独立面料制造/供应入口，但共享类目模板输出的是成衣项目规格：

- `template-parts/product-category/page.php:143-145`：`MOQ 1,000 pcs / Per style.`；
- `template-parts/product-category/page.php:148-150`：`Sampling 1-2 weeks / Depending on style complexity and materials.`；
- `template-parts/product-category/page.php:153-155`：`OEM/ODM / full-package / To your designs, samples, or tech packs.`；
- 生产询盘表虽然可选择 `Knitted Fabrics`，但 Estimated Order Quantity 只有 `Under 1,000 pcs`、`1,000–2,000 pcs`、`2,000–5,000 pcs` 和 `5,000+ pcs`。

真正的面料采购询盘通常需要明确适用的数量单位和报价基础。这里不能自行假设是米、公斤、卷、每色还是每个结构，也不能把成衣 MOQ 直接换算为面料 MOQ。实施前至少需要所有者确认：

1. 是否接受独立面料采购订单，还是只为成衣 OEM 项目开发面料；
2. 面料 MOQ 的单位、按色/按结构规则和适用条件；
3. 可公开的 swatch、counter sample、lab dip、sample yardage 或其他开发流程；
4. 买家报价前需要提供的 composition、GSM、width、stretch/recovery、finish、color、quantity、testing 和 delivery 信息；
5. 面料项目的样品周期、量产周期和服务边界。

如果 Athletik 不接受独立面料订单，则当前页面与 `knitted fabric manufacturer` 的商业搜索承诺需要重新评估，而不是仅替换数量单位。

##### W2. GRS、追溯和性能等效声称需要当前可核验证据

当前生产页面和 Meta 包含以下声称：

- `seo-tags.md:66-67`：`recycled (GRS)`；
- `inc/product-category-data.php:332`、`:356-357`：`GRS certified` / `GRS-certified recycled polyester and nylon knits`；
- `inc/product-category-data.php:357`：`Full traceability documentation`；
- 同一行还声称与原生纤维材料具有 `the same performance specs as virgin-fiber equivalents`。

本地 uploads 中存在 GRS 徽标图片，但徽标本身不能证明当前认证状态、认证主体、适用产品或交易范围；本轮也没有在规范文档或仓库内找到当前 scope certificate、transaction certificate 或与该页面声称对应的测试报告。

上线声称至少需要核对：认证法律主体、证书编号、有效期、认证范围、适用纤维/产品、是否能按项目提供 transaction certificate，以及哪些追溯文件能够公开描述。`same performance specs` 是跨材料和跨性能指标的概括性承诺，除非有明确规格和对比测试，否则不应继续作为无条件表达。

##### W3. 自有面料生产、测试和功能后整理边界需要一方事实输入

页面还公开表达：

- `inc/product-category-data.php:326`：`our own performance and thermal knit fabrics`、`true vertical integration`、`full in-house testing`；
- `inc/product-category-data.php:337`：按指定 gauge、weight 和 stretch 生产；
- `inc/product-category-data.php:342`：thermal knit 的保暖和 moisture-wicking 表现；
- `inc/product-category-data.php:346-347`：moisture management、UV protection、antimicrobial treatment、bamboo charcoal infusion 和 odor control；
- `inc/product-category-data.php:361`：`Our own fabric mill`、`full in-house testing for quality and performance`、counter samples 和 fabric collections。

这些内容在站内多个历史文案和当前页面重复出现，但重复出现不等于外部可核验。下一步需要形成项目事实表，明确：

- knitting、dyeing、finishing 和 testing 分别是自有、关联、外协还是按项目安排；
- `in-house testing` 实际覆盖哪些设备、方法、指标和记录；
- 功能性是纤维固有、面料结构产生、后整理实现，还是供应商材料选项；
- UV、antimicrobial、odor control、wicking、thermal 和 stretch/recovery 可对应哪些测试方法、合格值或项目条件。

竞争页面的工艺语言只能用于理解买家任务，不能作为 Athletik 的事实来源。

##### W4. 已有面料语义，但采购决策信息仍不完整

页面已经覆盖 single/double knit、gauge、weight、stretch、thermal、functional finish、recycled、swatch 和 counter sample，说明它不是单纯堆叠关键词。但是面料买家做初筛时仍无法从页面确认：

- 可公开的针织结构、机器 gauge、成品幅宽或 GSM 范围；
- composition 和纱线/纤维选择边界；
- 定制颜色、染色和后整理的流程所有权；
- swatch → development sample → approval → bulk 的真实节点；
- 质量测试方法、可交付记录和异常处理；
- 面料 MOQ、报价基础、开发周期和大货周期。

这不是要求把竞争对手的参数抄进页面。每一项都必须先判断是否适用于 Athletik、是否可公开、是否有证据；未知项使用事实输入清单，不编造范围或数字。

##### W5. Meta 长度略高且存在两个文本来源

生产 Meta Description 为 157 个字符，与 `seo-tags.md:66-67` 一致：

```text
Performance knitted fabrics manufacturer with our own fabric mill & in-house testing. Moisture-wicking, thermal, 4-way stretch & recycled (GRS). Get a quote.
```

它略高于本项目约 155 字符目标，但长度不是当前主要风险；更重要的是其中三个核心卖点都依赖 W2/W3 的事实确认。

`inc/product-category-data.php:323` 还保存了一条不同的 `meta_description`，但生产输出由 Rank Math 数据控制。两个来源并存会导致后续维护者误判。事实确认后，应在一次实施中同步决定规范 Meta、生产字段和未使用 PHP 字段的单一真值策略；本轮不改。

##### W6. 五张产品 PNG 合计约 11.47 MB，缺少响应式图片标记

当前五张 Knitted Fabrics 产品图均为 1448 × 1086 PNG：

| 文件 | 像素 | 本地大小 |
|---|---:|---:|
| `Performance knit fabrics.png` | 1448 × 1086 | 2.30 MB |
| `Thermal knit fabrics.png` | 1448 × 1086 | 2.28 MB |
| `Functional Fabrics.png` | 1448 × 1086 | 2.63 MB |
| `High-stretch performance knits.png` | 1448 × 1086 | 2.12 MB |
| `recycled fabrics.png` | 1448 × 1086 | 2.14 MB |

生产 HTML 中五图都位于首屏以下并使用 `loading="lazy"`，CSS 也通过 `aspect-ratio: 4 / 3` 预留比例，这是正确方向；但仍缺少：

- `width` / `height`；
- `srcset` / `sizes`；
- `decoding="async"`；
- WebP/AVIF 等更适合网页的派生版本。

优化产物必须继续放在 `uploads/myathletik-theme/assets/images/knitted fabrics/`，不能写入主题仓库。

##### W7. Child stylesheet 在生产页重复加载，多个脚本未标记延迟

生产 HTML 同时输出 `myathletik-child-style-css` 和 `generate-child-css`，两者指向完全相同的 `style.css` 及版本号。`functions.php:129-149` 手动 enqueue parent/child stylesheet，同时 GeneratePress 也输出自己的 parent/child 样式。

页面还加载 Cookiebot、WP Consent API、jQuery、jQuery Migrate、Fluent Forms、Turnstile 和 tracking 脚本等多个未标记 `defer`/`async` 的资源。是否能够延迟必须结合表单、同意管理和事件追踪依赖单独验证，不能在 SEO 审计中直接删除或调整顺序。

##### W8. 社交图与 Schema 主图仍使用通用 270 × 270 Logo

Rank Math 输出可解析的 `CollectionPage`，但 `primaryImageOfPage`、Open Graph 和 Twitter image 都指向通用 Logo，而非代表 Knitted Fabrics 主题的图片。这不阻止索引；待 W6 完成并确认一张可公开的面料代表图后，再考虑页面级社交图和 Schema 主图。

#### 🟢 Passed

- HTTP 200；`robots` 为 `follow, index`；`robots.txt` 没有屏蔽该路径；
- Title 为 `Knitted Fabrics Manufacturer | Athletik Clothing`，48 个字符，并与 `seo-tags.md` 一致；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`Knitted Fabrics Manufacturer`，与 `docs/sitemap.md` 一致；
- H2/H3 顺序正确，五个产品 H3 均位于 Product range H2 下；
- 生产 HTML 的 7 个图片节点都有非空 alt；五个产品图的 alt 与相应面料类别一致；
- 五个产品图均在首屏以下并使用原生 lazy loading；
- 字体 URL 使用 `display=swap`；
- JSON-LD 可解析，包含 LocalBusiness/Organization、WebSite、ImageObject 和 CollectionPage；
- 页面位于 `page-sitemap.xml` 且只出现一次；
- 首页生产 HTML 两次链接该 URL；
- 页面链接 Sportswear、Underwear、Services、Technical Guides 和其他主要站点页面，没有孤立；
- 页面没有用 startup、低 MOQ、消费者零售或 teamwear 语言迎合错误意图；
- 旧路径 `/products/knitted-fabrics/` 返回 HTTP 301 并指向当前 URL。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `knitted fabric manufacturer` | URL、Title、H1、Meta 和正文直接承接；US / CA / UK 样本均以 B2B mill 意图为主 | 保持主要词簇，不改 URL/Title/H1 |
| `sportswear fabric manufacturer` | 正文明确 activewear、underwear 和 performance knit 用途 | 作为次级应用词，不创建 Sportswear Fabric 平行页 |
| `knit fabric mill` / `knitted fabric factory` | 页面使用 `own fabric mill`，但工艺所有权和证据边界未完成 | 事实确认前不扩大 factory/mill 声称 |
| `jersey fabric supplier` | 当前只写 single/double knit，没有足够证据把 Jersey 建成独立主目标 | 保持支持词，等待产品事实与 GSC |
| 功能/再生面料采购 | 页面覆盖度高，但认证、功能测试和适用条件需要验证 | 先补证据，不把性能声称扩展进新 Meta/Schema |
| 独立面料询盘 | 页面语义成立，规格栏和表单仍是成衣单位 | 先确认业务边界，再设计 fabric-specific 资格与表单路径 |
| 与成衣页面重叠 | Sportswear/Underwear 负责成衣，当前页负责面料 | 分工正确，不合并、不复制正文 |

当前页面已经有“搜索承诺”，但“采购规格—证据—询盘单位”尚未形成闭环。SEO 微调应从真实业务输入开始，而不是继续增加同义关键词。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无。`image_note` 和旧 gallery 数据在当前有 subcategories 的页面分支中不渲染，生产页未出现 `【CONTENT: ...】` 或 `【NEEDS INPUT: ...】`。

### Suspected facts needing owner confirmation

- 是否接受独立面料订单；
- own fabric mill / own performance and thermal knit fabrics；
- full in-house testing；
- 指定 gauge、weight 和 stretch 的实际能力范围；
- moisture-wicking、UV protection、antimicrobial、bamboo charcoal odor control 和 thermal 表现；
- GRS 认证主体、范围和当前有效性；
- full traceability documentation；
- 与 virgin-fiber equivalents 具有相同 performance specs；
- counter sample、fabric collection 和面料项目开发流程。

### Terminology drift

- `merino knits` 建议在后续微调中统一为 `Merino wool knits`；
- `GRS certified` 必须明确是材料、供应链项目还是特定法律主体的 scope，不应让徽标替代范围说明；
- `true vertical integration` 应由实际 process ownership map 支持，避免被理解为从纺纱、染纱到所有后整理环节全部自有。

### Tone issues

- `true vertical integration` 带有绝对化倾向；
- `the same performance specs as virgin-fiber equivalents` 是未经条件限定的广泛性能承诺；
- 当前 B2B 语气总体合适，但规格和证据密度仍低于采购页需要。

### Passed

- 页面面向 brands 和 B2B OEM/ODM 项目；
- 没有 startup 孵化、低 MOQ、客户名称、工厂数量或产能数字；
- 没有 `world-class`、`industry-leading`、`best-in-class` 等空泛词；
- 页面明确把面料能力与成衣制造连接，但没有把两个任务合并成同一主关键词。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

生产环境中，`https://www.athletikapparel.com/products/knitted-fabrics/` 当前返回 HTTP 301，并跳转到 `https://www.athletikapparel.com/knitted-fabrics-manufacturer/`，终点为 HTTP 200。

该同域 301 已存在并工作正常。本轮不新增、不删除也不改写。若以后要清理，必须先核对 Search Console、访问日志、外链和 WordPress canonical redirect 来源。

## 6. Suggested next actions — do not auto-apply

1. 由所有者先完成“独立面料业务边界与商业单位”事实表，回答 W1 的五项问题；
2. 收集当前 GRS scope certificate、适用法律主体/范围/有效期，以及项目级 transaction certificate 和追溯文件边界；
3. 建立面料 process ownership 与 testing 表，分别标明自有、关联、外协、按项目以及可公开证据；
4. 事实确认后制作 Knitted Fabrics 单页优化简报，只调整必要的规格栏、Meta、绝对化声称、采购信息和上下文内链；
5. 单独执行图片性能任务：生成响应式 WebP/AVIF、补尺寸/`srcset`/`sizes`/`decoding`，不改变图片内容；
6. 单独检查 GeneratePress 与 child theme 的 stylesheet enqueue，并在回归表单/同意/追踪后再评估脚本延迟；
7. 在事实充分时，考虑从面料页上下文链接到 Tech Pack Guide 和 OEM Evaluation Guide，承接 fabric specification、testing 和 supplier evaluation 任务；
8. 在 Search Console 对该 URL 做 URL Inspection，并等待非品牌 Query/Page 样本；没有数据前保持当前 Title/H1；
9. 完成该页事实输入后，继续只读审计 `/technical-knitwear-tech-pack-guide/`。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、已有旧路径 301 |
| Title | 保持 | 48 字符、主词清晰、与规范一致 |
| H1 | 保持 | 唯一且与页面任务一致 |
| Meta | 事实确认后微调 | 157 字符不是首要问题；own mill、testing 和 GRS 声称需要先验证 |
| 正文 | 需要所有者事实输入后再微调 | 缺口集中在业务边界、工艺所有权、测试、认证和采购规格，不是关键词密度 |
| MOQ/规格栏 | 需要 fabric-specific 决策 | `1,000 pcs per style` 是成衣单位，不能代表面料采购条件 |
| 询盘表 | 需要 fabric-specific 决策 | Knitted Fabrics 与纯按件数量选项不匹配 |
| 内链 | 保持现有；指南上下文链接为候选 | 当前不孤立，后续可加强 fabric specification/testing 主题连接 |
| Schema | 保持现有类型；主题图为低优先候选 | CollectionPage 可用，通用 Logo 不阻断索引 |
| 新页面 | 不创建 | 当前页已经拥有该任务；拆分近义页会增加蚕食风险 |
