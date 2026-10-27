# 六个商业品类页第二轮 SERP 研究：US / GB / CA

日期：2026-10-27。执行归属：SEO-V2-005 的有界搜索需求研究；不是新实施项。

## 1. 结论与边界

本轮要找的是“现有页面尚未清楚证明、同时确实存在采购搜索任务的内容”，不是把所有含 `manufacturer` 的词加入网站。**正文补强最值得先评估的是 Sportswear 的 Yoga 产品开发说明，以及 Sports Accessories 中 balaclava / neck gaiter 的产品级呈现。**二者现页已有覆盖，属于具体度与组织方式候选，不是“没有写过”的缺陷。是否实施、使用哪些实物及英文草稿，须另经所有者审核。

Underwear 的 performance / seamless、Merino 的产品梯度与材料规格、Outdoor 的针织中间层，以及 Silk 的 underwear / base layers 已在生产正文中出现；不能重复包装成新的覆盖缺口。当前最有用的深化方向是可核实的产品例，而非再加一套通用 OEM / MOQ / QC / FAQ。

- 不改六页 URL、Title、Meta、H1、Schema、图片、正文、内链或页面所有权；不建立近义平行页。
- 不修改 V2 Backlog，不重开 V1，不进入 GEO、广告、邮件或增量性能优化。
- 不把零售商、POD、现货印标、医疗压缩、器材厂、榜单或同一厂商的新闻稿转载当成同意图独立制造商。
- 预算提升不等于需求增长证据，也不是缩短观察窗口的理由。
- 所有者在本轮确认控制 `powermerino.com`：只作内部自有站分类，既不计为独立竞争对手/第三方佐证，也不计为 `athletikapparel.com` 排名。不推断法律关系，不互链、合并或修改该站。

## 2. 方法、范围与可复核数据

### 2.1 两阶段冻结查询

Google / English / Desktop，国家 US、GB、CA。不是城市级或移动端排名；不是搜索量、难度、点击率、流量或询盘预测。

| 页面 / ID | 初筛四词（各三市场，配置 depth 10） | 入选深层词（配置 depth 50，各三市场） |
|---|---|---|
| Underwear / U | `underwear manufacturer`；`performance underwear manufacturer`；`seamless underwear manufacturer`；`thermal underwear manufacturer` | performance underwear；seamless underwear 两词 |
| Sportswear / S | `sportswear manufacturer`；`OEM activewear manufacturer`；`private label activewear manufacturer`；`yoga wear manufacturer` | yoga wear |
| Merino / M | `merino wool thermal underwear manufacturer`；`merino wool t shirt manufacturer`；`merino wool blend clothing manufacturer`；`private label merino wool clothing manufacturer` | merino wool t shirt |
| Outdoor / O | `outdoor clothing manufacturer`；`outdoor base layer manufacturer`；`fleece jacket manufacturer`；`outdoor midlayer manufacturer` | fleece jacket |
| Silk / K | `silk wear manufacturer`；`silk clothing manufacturer`；`silk underwear manufacturer`；`silk base layer manufacturer` | silk underwear |
| Accessories / A | `sports accessories manufacturer`；`compression sleeve manufacturer`；`neck gaiter manufacturer`；`balaclava manufacturer` | neck gaiter；balaclava 两词 |

深层完整查询与初筛原词一致，不省略 manufacturer。`D` 前缀代表深层新快照。Merino 选的是新探索变体，不提前复跑既定四核心词 × 三市场的固定排名监测。

覆盖模式为 **stratified**：六个自有生产页面正文全部核对；可用初筛结果逐行阅读 URL / Title / snippet 并初分角色；深层完整保留 URL / rank / provider 字段并核对自有站出现情况，不冒称所有外部 URL 均逐页审计。官网内容只对下列明确列出的代表样本复核。大量深层行仍为 `inventory-retained-content-unreviewed`。

### 2.2 数据文件及语义

- [全部保留结果行](data/serp-commercial-round2-2026-10-27-results.csv)：浅/深层、原查询/effective 查询、市场、检查时间、task ID、原始 rankGroup / rankAbsolute / page、重复行、自有站和角色依据。
- [逐次尝试与 coverage](data/serp-commercial-round2-2026-10-27-coverage.csv)：成功、失败、唯一付费复试、缓存恢复、费用、错误、coverage / outputBudget / warnings / caveats / features / local-pack 均保留。
- [全部工具 Finding 与限制处置](data/serp-commercial-round2-2026-10-27-findings.csv)：不只摘录对实施有利的 Finding；描述性观察不升级为网站缺陷。

完整本机原始 stdout、stderr 和结构化响应保存在忽略目录 `.chrome-check/r2-serp-2026-10-27/`；包含第三方全文 snippet 的原始载荷不进入 Git。CSV 不复制第三方正文或批量 snippet。

浅层 **68/72 单元可用**，654 行 / 547 唯一 URL，实际每个可用单元 8～10 行：Underwear 12/12（116 行）、Sportswear 12/12（110）、Merino 9/12（87）、Outdoor 12/12（116）、Silk 11/12（107）、Accessories 12/12（118）。唯一付费复试后仍不可得：

- M1 US：`merino wool thermal underwear manufacturer`；
- M3 GB：`merino wool blend clothing manufacturer`；
- M4 GB：`private label merino wool clothing manufacturer`；
- K4 GB：`silk base layer manufacturer`。

深层 **22/24 单元可用**：其中 21 个 `complete`，US Yoga 为 `partial`；保留 1,031 行 / 722 唯一 URL，实际每单元 9～50 行。两个不可得单元为 `performance underwear manufacturer` US / GB；三市场深层排名矩阵不完整，不能用浅层补成深层成功。

合计保留 **1,685 行 / 1,117 唯一 URL**，其中 44 个单元内重复 URL 行保留原序号。深层 1,005 行未作官网正文复核，不能当作 1,005 家已审计竞争对手；全部原始位置/URL 均进入清单并完成自有站匹配。186 条原工具 Finding 全部保留并处置 `no-change`；另保留 23 条原始错误记录（包括 2 次本地解析失败）、1 条结果数估算 warning 和 1 条显式查询纠错处置，共 211 条记录。Coverage 为 111 次 fresh CLI 尝试 + 2 次免费缓存恢复，共 113 条，原始失败不因恢复或重试而消失。下表是本轮主站的全部出现，不是抽取最好排名：

| 快照 | 查询 / 市场 | 原 rankGroup / rankAbsolute | 目标页 |
|---|---|---|---|
| U2 GB 浅层 | performance underwear manufacturer / GB | 6 / 6 | Underwear |
| U2 CA 浅层 | performance underwear manufacturer / CA | 5 / 5 | Underwear |
| DM2 CA 深层 | merino wool t shirt manufacturer / CA | 15 / 18 | Merino |

其余成功单元仅可表述“保留行中未见”；不可得单元不作排名判断。另 M1 GB 浅层出现 PowerMerino 4 / 4，不在上述主站表中。

CSV 角色代码：M = 自述供货/制造服务，R = 零售/现货/POD/印标，D = 目录/Marketplace，L = 榜单，I = 信息内容，S = 社交/视频/论坛，T = 标签归档，P = 转载通稿，X = 未做内容分类。M 不是已验证工厂，也不保证产品/商业模式匹配；深层仅复用完全相同 URL 的浅层角色或明确列出的官网复核，其余不冒称完成角色判断。

排名解释：`未见` 只代表该次成功快照保留行中没有目标 URL，不是排名 0，也不是 Google 未收录；失败为 unavailable。depth 是请求配置，不保证恰好返回 10 或 50 个自然结果。分页重复 URL 原样保留，不去重后重编号。浅层与深层是两个时间点，不取二者最好值伪造单一排名或趋势。

`outdoor base layer manufacturer` 的 CA 浅层被 Google 修正为 `outdoor base layers manufacturer`，仅解释 effective 查询，不纳入 requested exact-query 排名比较。大小写规范化（OEM → oem）而 correctedQuery=false 不另报拼写修正。

US Yoga 深层保留了 50 行，但工具因 provider 的 `resultCount` 估算小于已保留结果而丢弃该估算、报告 `partial`；自然结果清单仍保留，不拿该估算判断搜索量。重复域名的所有工具 Finding 也只是描述性信息，不是竞争强度或质量分。

两次本地 JSON 解码失败通过 `refresh=false` 取回同一缓存报告：U4 US 与 S3 GB；cache=hit、actual=0，沿用原 task ID / checkedAt，不是新采样或第三次付费重试。原始失败不删除。后续请求使用仅对本次子进程生效的 UTF-8 输出设置；未改已安装 CLI、持久环境或凭据，也不宣称已证明乱码根因。

## 3. 六页搜索任务与当前覆盖

### 3.1 Underwear：performance 是更贴合的观察入口，seamless 已补齐

浅层 `performance underwear manufacturer` 在 GB 观察到目标页 **rankGroup 6 / rankAbsolute 6**，CA 为 **5 / 5**；US 浅层未见。它仅是当次观测，不是长期固定名次，不能归因给刚部署的 seamless。CA 稍后的 depth-50 请求只返回 9 行、未见目标页，且结果与浅层不同；`complete` 表示报告完整保留 provider 本次返回，不代表取得完整 50 个自然结果。保留两次，不解释成半小时内排名下降或选择较好的一次当“当前排名”。

通用 underwear 混有目录、品牌榜单、fashion lingerie 与社交。performance 在 GB / CA 出现较多直接采购页面，但 US 仍混有榜单、社交和面料供应；例如面料厂不能直接作为内衣成衣 OEM 同业。seamless 同时出现真正针织成形与激光切割/粘合的无痕内衣，不可以同一个英文标签推断工艺相同。thermal underwear 则明显混入消费零售与测评。

生产页已包含 performance 产品范围、男士 boxer briefs / trunks / briefs、thermal tops / bottoms、4-way-stretch、microfiber / Merino、腰口/标识/包装、采购输入、测试、流程和 MOQ。新 seamless 模块还明确两类结构、可定制部位及样品确认边界。**不再增加同义介绍或索要尚不存在的实物照片。**后续有真实样品/订单时才评估产品例；不得用生成图假装已生产案例。

Outcome：`no-change / keep-measuring`。seamless Day 7 / 28 / 90 保持 11-03 / 11-24 / 2027-01-25。

### 3.2 Sportswear：从重复合作模式转向 Yoga 产品级说明候选

本次 `OEM activewear manufacturer` 并非稳定纯 OEM SERP：US 混有 OEM vs ODM 教育、榜单和社交，GB / CA 也混有本地采购和 team uniforms；private label 又混入 POD、现货与低 MOQ。它限定了历史“最贴合 OEM”的判断，不能将旧一次结论写成永久事实。

Yoga 词存在 leggings / sports bras 等定制页面，但同时有消费品牌、评论、榜单、社交与归档页。生产页已覆盖 OEM、development-led ODM、private label、明确不做 ready-stock，已有 14 图 lookbook、leggings / shorts / compression、Yoga and studio wear、测试和采购输入。

**可评估的最小改动**：在现有 Yoga 区块内，用所有者认可的具体产品组合和开发选择讲清“做什么、怎么定义样品”，把已有 lookbook 的相应产品与文字对应。现有 Yoga 段落主要谈 soft-drape 和 seam / comfort 的通用样品检查，具体度可提高；不需要再写一套 Program model、另建 Activewear / Fitness / Yoga 页或转向球队小单。

实施依赖：明确本次主动展示的 bra / leggings / shorts / tops 组合、可用真实照片和规格示例；不擅自承诺支撑等级、squat-proof、色牢度或已通过某测试。Outcome：`review-candidate / deferred-until-owner-scope`，不是批准改页。

### 3.3 Merino：新长尾仍大量偏零售，现有产品梯度不是缺项

thermal underwear、T-shirt 的 US / CA 样本主要为消费品牌、零售、讨论或榜单。GB T-shirt 出现一些直接供货/制造服务，但 Paul James 同时有 sweater、flat-knit / WHOLEGARMENT 与库存 white-label，不能全当成 Athletik 针织面料成衣的同意图标杆。

blend / private-label 长句也没有自动变纯采购：可返回泛 private-label、linen、织造羊毛或同一 WOOLCANO / Sinosky 通稿的多个转载 URL。转载不能算多个独立背书，也不构成购买新闻稿外链的建议。

CA `merino wool t shirt manufacturer` 深层快照（task `10270314-2417-0139-0000-090cb7f1e707`）出现主站 Merino 页，原始 rankGroup **15**、rankAbsolute **18**；同词 US / GB 的这次保留行未见。浅层 CA 亦未见，反映深度/时间样本差异，不是历史增长。

生产页已有 16 图、四档采购产品梯度、T-shirts / hoodies / mid-layers、underwear / thermal、composition / micron / yarn / GSM / structure、定制、测试及流程。**优先等待所有者正在选择的具体产品，再做一个能用于 RFQ 的真实示例，而不是继续扩品或把 apparel 改成 clothing。**

Outcome：`no-change / product-evidence-preparation`。10-30 GSC、11-20/21 既定固定词深层检查和 12-06 Day 90 不变。

### 3.4 Outdoor：fleece 有采购分支，但不能照搬现货印标或梭织外套

outdoor clothing / base layer / midlayer 仍混入品牌零售、how-to 与测评。fleece jacket 的直接 OEM 分支存在，但大量结果是现成 fleece 的 embroidery、工作服、企业标识、零售或面料，而非按买家材料和版型开发成衣。

生产页已有针织范围、hooded / crew / zip-front 中间层、grid / brushed-back / thermal knit、Genesis fleece、Merino blend、材料/构造/测试输入。可用的深化是 **一个真实 knit fleece 产品的材料—用途—版型—样品检验信息组合**；不是新增 fleece 同义页，也不因广义 Outdoor 结果而扩至非针织 hard shell。

Outcome：`no-change / evidence-preparation`。有可公开实物与所有者确认规格时才重开；本轮没有新增技术缺陷结论。

### 3.5 Silk：产品级 underwear 比泛称更可解释，但现页已承接

silk wear / silk clothing 均混 fashion、fabric、品牌零售、目录和文章；不能仅凭哪一个英文读起来更自然决定改 Title/H1。silk underwear 尤其 GB / CA 出现直接供货和定制页面，但仍混库存 underwear、lingerie、目录和消费品牌；base layer 也不保证纯 B2B。

生产页已明确 knitted silk base layers / underwear、T-shirts / camisoles / leggings / long underwear、blends、规格定制与测试；woven silk 是所有者已批准的按项目支持范围，不能误套 Outdoor 的“非针织不做”。

后续可将 **knitted silk base-layer / underwear 实物与规格**对应起来；现有表达不缺这个词本身。不能把真 silk 与市场上的 “ice silk” 混同，也不为了复制供应商范围扩至 bedding / scarves 等非本页任务。

Outcome：`no-change / monitor-product-intent`。不改 URL 或 metadata；原 12-08 Day 90 不提前关闭。

### 3.6 Accessories：产品词优于硬器材泛词，但产品名并未缺失

`sports accessories manufacturer` 在三市场大量覆盖器材、球队用品、品牌榜单与目录；压缩 sleeve 还显著混入医疗淋巴水肿/治疗压缩。**不应为争取该泛词把 Athletik 写成器材厂或医疗器械制造商。**

neck gaiter / balaclava 出现定制生产页面，不过 neck gaiter 也有促销品、POD 和小批印标。balaclava 不同款式与材料页面反复出现在同一供应商域名，不能当作多个独立厂家。

生产页已具名 balaclavas、ski masks、neck gaiters / warmers、beanies、wristbands、gloves / liners 和 sleeves；还写了 face opening、helmet/hood interface、coverage、材料和工艺。因此不是新能力缺口。

**可评估的最小改动**：在现有 Accessories 页，把 balaclava 与 neck gaiter 从同一个笼统产品组中分别做清晰的款式/用途/材料/尺寸定义及对应实物呈现；产品词仍由本页承接，Merino/Outdoor 只保留材料/用途支持关系。不复制医疗、过滤、防护等级或未经测试的 UPF 承诺。第三张既有 Sports Accessories 图片继续锁定不改。

Outcome：`review-candidate / deferred-until-product-evidence`。原 12-08 Day 90 保留；若批准新变量，另立 Change Card，而不是覆盖旧窗口。

## 4. 官网内容复核样本与反证

以下只验证公开页面“如何组织服务/产品信息”，不是独立核验其认证、产能、客户、工厂所有权、交期、性能或价格。低 MOQ / 白牌等数字不迁移到 Athletik。

| 类别 | 复核页面 | 对本轮的有效启示 / 限制 |
|---|---|---|
| Underwear | [Thygesen](https://thygesenapparel.com/custom-underwear-manufacturing)、[Appareify seamless](https://appareify.com/underwear-manufacturer/seamless)、[Portugal Textile](https://portugaltextile.com/underwear-factory/) | 产品/材料/定制/样品为主要信息结构；Athletik 已覆盖大部分。Thygesen 局部重复无关 hoodies 文案，说明有排名不等于可照抄；Appareify 标签本身也不足以证明具体 seamless 设备路线 |
| Underwear 深层补样 | [B.D.Seamless boxer](https://www.bdseamless.com/seamless-boxer-briefs/) | 页面明确自述 circular knitting 与 waistband / fit / branding，但出现绝对化质量/性能保证与不同流程天数；只支持“有产品级制造页面”判断，不证明这些参数真实，也不转成 Athletik 设备或成绩声明 |
| Sportswear | [Hingto 首页](https://www.hingto.com/)、[其 private-label 页](https://www.hingto.com/pages/private-label-fitness-apparel)、[ZCH Yoga](https://zchyoga.com/yoga-wear-manufacturer/) | Hingto 分列完全定制与 brandable wholesale，业务不完全同型；首页可提取正文有限。ZCH 提供产品组合/图片参考，但只是单词样本中的补充，不称跨市场主导同业 |
| Sportswear 深层补样 | [Thygesen Yoga buyer guide](https://thygesenapparel.com/blog/yoga-leggings-manufacturer) | 三市场深层均出现，页面任务仍是厂商撰写的采购指南，不误分成直接制造服务页；款型、腰口、版型与工艺路线分解可作为开发问题参考，不照搬其 GSM、配方或性能结论 |
| Merino | [Paul James](https://www.pauljamesknitwear.com/pages/merino-wool-knitwear-manufacturer)、[Merinotex 产品](https://www.merinotex.com/product-detail/merino-clothing-1/)、[PowerMerino equipment](https://www.powermerino.com/equipment.html) | 区分 flat-knit/库存与功能成衣 OEM；Merinotex 显示产品型 RFQ 路径，但范围在 Athletik 已有。PowerMerino 为所有者确认自有，仅内部去重 |
| Outdoor | [JIMJACKETS fleece](https://www.jimjackets.com/custom-jackets/fleece-jackets)、[Cion fleece](https://www.cionclothing.com/fleece-jacket/) | 具体款型、材料、重量、口袋/拉链、branding 对应询价；Athletik 不需要复制很长的同义词或可持续性声明。两页为不同市场单词样本，不夸称稳定主导者 |
| Silk | [Romankelly underwear](https://www.fstexsilk.com/products-62575)、[Esa Silk underwear](https://www.esasilk.com/silk-underwear) | 能区分产品目录和厂商博客，看到 underwear / thermals 与可见产品；不等于证实 Athletik 需增加范围。Romankelly 首次返回旧缓存，定位正文后重读得到今日抓取版本，以后者为内容参考 |
| Accessories | [Foremost](https://foremosthat.com/pages/custom-balaclavas)、[Mr Balaclava](https://mrbalaclava.com/balaclavas/open-face-balaclava-manufacturer/)、[Ruixing neck gaiters](https://ruixinggifts.com/custom-neck-gaiters-wholesale)、[CNCAPS](https://www.cncaps.com/custom-printed-neck-gaiter/) | 具体开口/长度/材料/单双层等选择路径可参考。Foremost 针/梭织称呼有歧义，Ruixing 同页 MOQ 500 与 1000 冲突；不抄其通用参数/认证/性能。CNCAPS 的防疫延伸不是 Athletik 本页任务 |

成功读取共 19 个公开 URL，其中 1 个为本轮确认自有站；18 个非已知自有 URL 不等于 18 个已独立验证的同型工厂。另对 [INGORSPORTS Yoga set](https://www.ingorsports.com/custom-yoga-set-manufacturer-for-activewear-brands.html) 请求两次均无法通过网页工具访问，保留 `unavailable`，不据 snippet 冒称读过正文，也不将工具访问失败判为该站技术故障。Mr Balaclava 的第一次抽取与重读版本结构不同，只保留稳定可见的产品/定制结构，不把版本差异当作排名变动原因。

## 5. 研究处置与下一步

本轮没有足够证据新增 Critical / Warning：这是搜索意图与覆盖研究，不是全站 technical all-clear。以下均为 `Info / review`，不直接授权站点修复。

| Finding | 优先级 / 置信度 | 处置 | 重开条件与验收 |
|---|---|---|---|
| R2-001 Underwear 已覆盖的 performance / seamless | P2 / Confirmed（正文） | `no-change` | 11-03 起按既定窗口看同查询/国家；新增实物时再评估，不将今日排名归因给新模块 |
| R2-002 Yoga 产品级具体度候选 | P2 / Probable | `deferred` | 所有者确认产品组合及真实例；批准后仅改现页最小区块，保留 URL/metadata；验收正文与图一致、无新性能承诺、无跨页串入，并重建该变量基线 |
| R2-003 Merino 内容范围与自有站区分 | P2 / Confirmed（覆盖/所有者控制确认） | `no-change` | 具体产品例资料齐备再开；自有站不计独立佐证，不合并/互链；固定监测日期不变 |
| R2-004 Outdoor fleece 分支与现货错配 | P2 / Probable | `deferred` | 一个真实 knit fleece 例及材料/款型确认；只评估现页，不扩非针织范围；实物与文字一致才通过 |
| R2-005 Silk 产品任务非命名替换 | P3 / Probable | `no-change` | 新 GSC 稳定查询证据或具体 silk 产品例出现；现有 scope 已覆盖即不重复加段落 |
| R2-006 Accessories 产品组织候选 | P2 / Probable | `deferred` | 有可公开 balaclava / neck gaiter 例且所有者批准；若现有组已充分满足任务则推翻改动；第三图不动、无医疗/PPE性能扩张 |
| R2-007 快照/纠错/缺失/深度限制 | P3 / Confirmed | `no-change` | 所有失败留空；下一次有业务决策需要才刷新，不为填完整矩阵连续重试 |
| R2-008 未确认的制造/认证/第三方权威 | P3 / Confirmed（仅见网站自述） | `no-change` | 不把同一来源多次出现算独立背书；需外部核验的结论保持 unknown，不买链接、不冒称已核实 |

建议下一步只选 **Sportswear Yoga 产品开发说明**或 **Accessories 两类产品呈现**之一，先形成窄范围草稿和证据清单再审批；不同时大改六页。若暂时没有新产品资料，现有页保持观察也是有效结果。

## 6. 费用与失败处理

本轮预算为额外 **$0.65**，包含唯一重试和不可确认费用预留。72 组 depth 10 的基础估算 $0.144；选入 8 词 × 三市场共 24 组 depth 50，基础估算 $0.240。请求串行、起点间隔至少 15 秒；每个失败单元最多一次付费重试。不绕过 CLI 的每报告 10 请求 / 1000 行上限。

最终回读时间为 `2026-10-27T03:20:27.775Z`（账户观测时间）。以开始时本机日账本 $0.158 actual + $0.058 unknown = $0.216 effective、48 requests 为基准：

| 口径 | 本轮前 | 本轮后 | 新增 |
|---|---|---|---|
| 本机已知 actual | $0.158 | $0.522 | **$0.364** |
| 本机 estimated / unknown | $0.058 | $0.116 | **$0.058** |
| 本机 effective（含预留） | $0.216 | $0.638 | **$0.422** |
| 本机日请求 | 48 | 159 | 111 |

因此本轮含失败预留的 **$0.422 < $0.65**。按所有 111 次尝试都取配置深度的基础单价计算，独立保守上界为 $0.454，也未超预算；它不是实付金额，不能与 actual 相加。部分错误响应没有费用字段、部分请求实回行数更少，CSV 所见费用不代替最终本机账本。两次缓存恢复为 $0，不是新 provider 请求。

本机月累计 actual $0.620 + unknown $0.190 = effective $0.810；reserved=0。账户余额 **$49.614680**、账户当日 spending **$0.566**，与开始时余额 $50.004680 / 日 spend $0.176 分别列示，不强行与本机对账。当前本机日 effective 已超过 notice $0.50，但低于 hard $1.00；本轮已结束，不继续追加请求。

保留所有者已批准的十倍金额限额：daily notice **$0.50**、daily hard **$1.00**、monthly hard **$5.00**。不恢复旧 $0.10，也不因账户约 $50 余额而取消限额。账户余额/日 spend 与本机 actual / unknown 口径分别报告，不强行对齐；失败预留不是已确认收费。

## 7. 观察窗口和部署

- Knitted Fabrics 不在本轮六页内；其 Day 28 仍为 11-17，等 final 覆盖末日后预计 11-20 起读取。
- Merino 10-30 GSC / 11-20或21 固定词 SERP / 12-06 Day 90 不变。
- Underwear seamless 11-03 / 11-24 / 2027-01-25 不变；原 Underwear 11-30 历史窗口继续披露混合变量。
- Silk / Accessories 原 12-08 Day 90 不变。
- 六个生产页面在本轮取证时均返回 HTTP 200，正文与本次判断所需范围吻合；Silk 初次 TLS 读取失败后一次重取成功。这里不据此宣称已完成 robots / canonical / indexation / CWV 全项验收。

最终 outcome：`research-complete-with-limitations / no-site-change / keep-measuring`。**只更新内部研究资料，无网站部署文件，也无需重新申请索引。**
