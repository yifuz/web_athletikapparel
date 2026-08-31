# US / GB / CA 产品型商业查询 Live SERP 刷新（2026-08-31）

## 1. 研究目的

本轮用于确认 SEO-V2-015 完成后的相邻采购语言边界，并筛选可由现有品类页承接的下一阶段机会。研究不批准新页面、不改变现有 URL，也不替代 GSC 页面/Query 样本门槛。

重点回答三个问题：

1. `technical apparel`、`functional apparel` 是否比当前首页 `performance apparel` 更准确；
2. Yoga、Base Layer、Performance Underwear 等产品词是否呈现稳定 B2B 制造采购意图；
3. 哪些机会应继续由现有页面承接，而不是创建近义平行页。

## 2. 方法与数据状态

- 数据源：DataForSEO `Google Organic Live Advanced`；
- 市场：美国、英国、加拿大；
- 语言与设备：English、Desktop；
- 深度：每次保留前 10 个 Organic Results；
- 采样时间：2026-08-31；
- 成功查询：16 个，全部 `dataStatus: complete`；
- 本轮实际 API 成本：USD 0.032；
- 一次并发请求曾返回可重试限流，顺序重试后成功，不作为 SERP 证据；
- 这是单次地点、语言与设备快照，不是排名历史；`rankAbsolute` 会因 AI Overview、PAA、Local Pack 或 Popular Products 等功能模块而大于 Organic 顺序。

## 3. 查询与意图结论

| 查询 | 市场 | 第一页主要结果类型 | 页面所有权 | 结论 |
|---|---|---|---|---|
| `technical apparel manufacturer` | US | 通用服装工厂、startup/低 MOQ、目录、教程 | 首页仅作支持语义 | 意图过宽，不替换首页主定位 |
| `functional apparel manufacturer` | US | 通用服装工厂、定义页、低 MOQ 与小企业内容 | 首页仅作支持语义 | `functional` 没有提高目标买家匹配度 |
| `performance clothing manufacturer` | US | Activewear、Sportswear、Fitness 与 Performance Garment 工厂 | 首页支持语义 | 与当前定位相符，但 SEO-V2-015 观察期内不再改首页 |
| `activewear manufacturer` | US | Activewear 工厂为主，混合 startup、超低 MOQ、社交与 blank apparel | `/sportswear-manufacturer/` | 继续作为同页次级词，不建 Activewear 平行页 |
| `yoga wear manufacturer` | US / GB / CA | OEM/ODM、private label、factory 与供应商页高度集中 | `/sportswear-manufacturer/` | 跨三国呈现稳定商业采购意图 |
| `yoga clothing manufacturer` | US | 制造商、供应商和采购讨论占主导 | `/sportswear-manufacturer/` | 与 `yoga wear` 属同一页面任务，不拆页 |
| `base layer manufacturer` | US / GB / CA | 前部有明确工厂页，后部混合零售、测评、Marketplace | `/underwear-manufacturer/` 为主；Outdoor / Merino 支持 | 有价值但意图混合，不建立 Base Layer 独立页 |
| `performance underwear manufacturer` | US / GB / CA | Underwear factory、private label 与制造商页占主导 | `/underwear-manufacturer/` | 当前最清晰的现有页面机会；等待 GSC 门槛 |
| `compression clothing manufacturer` | US | 运动压缩服、医疗压缩、消费品牌、专利/名录混合 | `/sportswear-manufacturer/` 支持 | 医疗与消费歧义明显，不独立建页 |
| `thermal underwear manufacturer` | US | 工厂、供应商目录、百科、零售与消费评测混合 | `/underwear-manufacturer/` 支持 | 作为 Base Layer/Underwear 语义，不独立建页 |

## 4. 关键 SERP 证据

### 4.1 Yoga 为稳定商业词簇

- `yoga wear manufacturer` 在 GB 前 10 个 Organic Results 全部为制造商、供应商或制造商榜单；
- CA 除 Reddit 与 Instagram 外，其余主要结果仍为 OEM、wholesale、custom manufacturing 或制造商榜单；
- US 的 `yoga clothing manufacturer` 与 `yoga wear manufacturer` 返回高度重叠的制造商集合，说明两种表达属于同一个页面任务；
- 现有 Sportswear 页面已经明确包含 gym、training、running、yoga activewear 与 Yoga and studio wear，页面所有权一致。

### 4.2 Base Layer 有采购意图，但不支持独立 URL

- CA 前四个 Organic Results 均为 Custom Base Layer、Technical Base Layer、Seamless Base Layer 或制造商榜单；
- GB 第 2–5 位同样为制造商或制造商榜单，但第 1 位为零售型 Base Layer 专站；
- US 后半页和 CA/GB 均混有测评、零售与 Marketplace；
- 现有 Underwear、Outdoor Clothing 与 Merino Wool 页面均有真实 Base Layer 产品范围。按照既有映射，由 Underwear 作为主要承接页，其余页面保留材料/用途边界与相关内链。

### 4.3 Performance Underwear 是第一观察候选

- US 第一页以 Underwear Manufacturer、Custom、Private Label 与 Performance Underwear 工厂页为主；
- GB 第一页同样由工厂和制造商目录主导；
- DataForSEO GB Live SERP 中，`https://www.athletikapparel.com/underwear-manufacturer/` 的 `rankAbsolute` 为 10；
- CA 仍有较多制造商结果，但也混入零售、视频和消费品牌，Athletik 未出现在本次前 10 Organic Results；
- GB 第 10 名是单次 Live SERP 证据，不等于稳定排名，也不能代替 GSC Average Position。

## 5. 页面与执行决策

1. SEO-V2-015 继续保持 `fixed / measuring`。本轮没有证据支持再次修改首页 Title、H1、Meta 或 URL。
2. 不创建 Yoga、Activewear、Base Layer、Performance Underwear、Compression 或 Thermal Underwear 平行页。
3. `/underwear-manufacturer/` 是下一轮 SEO-V2-005 的第一观察候选，优先观察 `performance underwear manufacturer` 及同意图变体。
4. `/sportswear-manufacturer/` 是第二观察候选，观察 Yoga 与 Activewear 相关非品牌 Query；当前页面已经覆盖相应产品和应用，不做无证据扩写。
5. `base layer manufacturer` 继续执行一主多辅的页面边界：Underwear 主承接，Outdoor 与 Merino 以用途/材料支持；不竞争同一个主 Title/H1。

## 6. 启动 SEO-V2-005 的门槛

只有满足以下条件后，才为单个现有页面建立 Change Card：

- GSC 页面或 Query 达到 `seo-process.md` 规定的样本门槛；
- Query 意图与现有页面所有权一致；
- GSC Average Position 约为 8–30，或其他一方证据形成同等明确的可验证假设；
- 一次只选择一个主要变量，并保留 28 天前后窗口；
- 不与 SEO-V2-015 首页 Day 7 / 28 / 90 观察混淆归因。

当前 `performance underwear manufacturer` 只满足 Live SERP 与页面所有权证据，尚未满足 GSC 样本门槛，因此 Finding outcome 为 `keep / conditional-monitoring`。

## 7. 代表性 DataForSEO Task ID

- US `functional apparel manufacturer`：`08310457-2417-0139-0000-c5f33d76d805`；
- GB / CA `yoga wear manufacturer`：`08310458-2417-0139-0000-02d9f65d121b`、`08310458-2417-0139-0000-14803954fa5f`；
- GB / CA `base layer manufacturer`：`08310458-2417-0139-0000-b079bc84beb8`、`08310458-2417-0139-0000-ed1809a4453f`；
- US `yoga clothing manufacturer`：`08310459-2417-0139-0000-63583e434841`；
- US / GB / CA `performance underwear manufacturer`：`08310459-2417-0139-0000-78e2dbad25c2`、`08310500-2417-0139-0000-f2a156a1f7b9`、`08310500-2417-0139-0000-5fc512a11a5f`；
- US `compression clothing manufacturer`：`08310459-2417-0139-0000-cc4e36927923`；
- US `thermal underwear manufacturer`：`08310459-2417-0139-0000-367f7ab25cb3`。

## 8. Merino 产品词后续验证

周报把 Merino Base Layer 识别为产品与销售方向，但市场机会不自动等于搜索意图。为验证现有 `/merino-wool-manufacturer/` 是否具备可执行的搜索机会，本轮追加 8 个 Live SERP 快照，实际 API 成本为 USD 0.016。

### 8.1 美国泛 Merino 制造词

| 查询 | 结果类型 | 判断 |
|---|---|---|
| `merino base layer manufacturer` | 消费品牌、零售集合、Reddit、榜单为主，仅少量制造商 | 偏消费发现，不是干净 B2B 工厂词 |
| `merino wool clothing manufacturer` | 消费品牌占多数，混合采购讨论、制造商和行业榜单 | 商业意图存在但不纯 |
| `merino apparel manufacturer` | 消费品牌、制造商、Reddit 与榜单混合 | `apparel` 没有明显改善页面任务 |
| `thermal base layer manufacturer` | 少量 Custom/Technical Base Layer 工厂，混合评测、零售和军品 | 有制造意图但歧义明显 |
| `merino wool clothing OEM` | 仍由消费品牌主导，`OEM` 没有清洗结果 | 停止扩展 |

Athletik 的 Merino 页面未进入上述美国快照的前 10 Organic Results。该观察只覆盖本次地点与设备，不代表稳定排名或完全不可见。

### 8.2 `custom` 修饰词的跨市场结果

`custom merino wool clothing manufacturer` 是本轮唯一明显改善 B2B 意图的表达：

- US 前部出现 Merinotex、Thai Son、Jiayan 等制造商，也有 Reddit 采购讨论；后部仍混入定制服装零售和消费品牌；
- GB 前部出现制造商与 Europages B2B 目录，但同时出现传统 Merino knitwear manufacturer，存在 flat-knit / sweater 语义漂移；
- CA 前部同样由数个制造商占据，后部混入消费品牌、榜单和目录；
- Athletik 未进入 US / GB / CA 本次前 10 Organic Results。

因此该词可作为现有 Merino 页的条件式次级观察词，但不支持新页面、URL、Title 或 H1 修改。周报中的 Merino 商业方向更适合先推动真实样品、面料规格和生产证据，再等待 GSC 或后续跨周期 SERP 信号。

### 8.3 执行结论与 Task ID

- Finding outcome：`no-change / conditional-monitoring`；
- 不建立 Merino Base Layer 平行页；
- 不把消费品牌或传统 flat-knit 结果误判为 Athletik 的直接 B2B 竞争集；
- 只有 GSC 出现相关 Query 并达到门槛，或跨周期 SERP 显示更稳定的工厂任务，才为现有 Merino 页建立 Change Card。

同日恢复 GSC 代理链路后，`/merino-wool-manufacturer/` 在 2026-07-31 至 08-27 final 窗口返回 `merino wool clothing manufacturer` 1 曝光、0 点击、平均排名 23。该一方信号与既有页面所有权一致，也位于 SEO-V2-005 的观察排名范围内，但只有 1 次曝光，不能触发页面修改。SERP 与 GSC 当前共同支持“继续观察现有页”，不支持新 URL 或立即扩写。

Task ID：

- US 四个首轮词：`08310519-2417-0139-0000-3cf2b76b18f3`、`08310519-2417-0139-0000-a9077f485724`、`08310519-2417-0139-0000-331880473019`、`08310519-2417-0139-0000-1b1649eb2526`；
- US 两个采购修饰词：`08310520-2417-0139-0000-d2a26b5351d3`、`08310520-2417-0139-0000-d19b952282ba`；
- GB / CA `custom merino wool clothing manufacturer`：`08310521-2417-0139-0000-098b2effe490`、`08310521-2417-0139-0000-58afee0af3bf`。
