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
