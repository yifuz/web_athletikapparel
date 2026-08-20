# Athletik Clothing SEO 全流程

> 版本：V1.2
>
> 建立日期：2026-08-15
>
> 最近更新：2026-08-20
>
> 适用网站：`https://www.athletikapparel.com/`
>
> 主要市场：北美与欧洲
>
> 主要受众：采购技术针织产品的中型品牌、批发商及其 Sourcing、Product Development、Merchandising 和 Technical 团队

## 1. 目的与基本原则

本流程用于把 SEO 从零散的页面修改，转为可重复、可审核、可衡量的长期运营系统。最终目标不是提高某个第三方工具分数，而是让符合 Athletik Clothing 能力和 MOQ 要求的 B2B 买家：

1. 在搜索制造商、产品、材料、技术和采购问题时发现网站；
2. 通过页面内容确认 Athletik 是否符合其项目要求；
3. 进入相关品类页、Services 或 Contact；
4. 提交可以判断产品、数量、公司和项目阶段的合格询盘。

执行时遵守以下原则：

- 业务价值优先于流量规模；合格询盘优先于泛流量。
- Google Search Console 和真实询盘数据优先于第三方估算。
- 北美与欧洲为并列主要市场；北美至少分别观察美国和加拿大，欧洲按国家和语言观察，不能把任一区域视为一个统一搜索数据库。
- 当前先运营一个英文规范站；没有真实需求、翻译资源和合规准备时，不建立国家或语言复制页。
- 先充分利用现有页面；只有独立搜索意图无法由现有页面承接时，才考虑新 URL。
- 不为每个关键词变体创建页面，不堆关键词，不以固定字数或批量产量作为质量目标。
- 公开页面可以主动描述当前已有或能够通过项目组织、供应链协同实现的服务能力；不要求每项服务都已有公开案例、历史订单或现成报告。
- 不确定的项目变量使用概括性表达并留到询盘阶段确认；不得用未经验证的精确数字制造确定感。
- 认证、测试结果、量化性能、产能、工厂数量、客户和法律实体关系等硬事实仍不得虚构。
- 长篇公开正文必须由所有者明确授权，并在发布前完成所有者审核。
- 已上线 URL 默认保持稳定；任何删除、合并或 slug 变化必须先设计 301，并遵守 `AGENTS.md` 和重定向流程。
- SEO 与 GEO 共享技术基础、内容和实体证据，但测试协议和成绩分开记录。

### 1.1 SEO 优先与商业表达尺度

Athletik 网站的第一目标是通过自然搜索触达北美和欧洲的潜在 B2B 买家，并形成有效询盘。页面结构、关键词、标题、正文、内链和 CTA 的取舍首先服务于搜索意图覆盖、搜索可见性和客户触达，不把“公开每项业务细节”本身当作页面目标。

公开文案按以下尺度执行：

| 信息类型 | 公开策略 | 推荐表达方向 |
|---|---|---|
| 已有或可合理组织交付的服务能力 | 主动、清晰地营销，不因暂时没有案例而省略 | `We offer...`、`We support...`、`Available for...` |
| 随材料、规格、数量或项目变化的商业条件 | 使用概括性表述，将细节留到 RFQ、打样或订单确认 | `Varies by fabric and project requirements.`、`Confirmed for each project.` |
| 可按客户要求协调的测试、文件或外部资源 | 说明可以支持或安排，不必展开全部执行边界 | `Testing can be arranged based on the required standard.` |
| 认证状态、证书范围、客户名称、精确产能、测试数值和保证性结果 | 只有具备相应依据时才作明确、具体的事实声称 | 使用当前文件支持的准确表述；证据不足时不写具体编号、数值或 `guaranteed` |

执行边界如下：

1. SEO 和客户触达优先，但不通过关键词堆叠、Doorway Pages 或明显虚假硬事实换取短期曝光；
2. “能够交付”可以作为服务能力，不要求“已经为公开客户做过”才允许进入页面；
3. 不确定信息优先模糊化，不把内部限制、供应链分工和全部执行细节写成面向客户的免责声明；
4. 页面负责建立相关性、专业度和询盘动机，项目级条件在后续沟通、Tech pack、quotation、sampling 或合同阶段确认；
5. 必要限定语保持简短，避免连续使用 `must be confirmed`、`subject to` 等措辞削弱商业表达。

## 2. 文档与数据真值层级

### 2.1 项目真值

| 真值 | 文件 | 用途 |
|---|---|---|
| 页面、URL、H1 与信息架构 | [`../sitemap.md`](../sitemap.md) | 新建、删除、合并或重构页面前必读 |
| 已批准 Title / Meta | [`../../seo-tags.md`](../../seo-tags.md) | 页面元数据真值 |
| 技术审查与历史证据 | [`gsc-data-log.md`](gsc-data-log.md)、[`seo-cli-baseline-2026-08-18.md`](seo-cli-baseline-2026-08-18.md) | GSC 周期数据快照、`seo` CLI 自动化基线与取证工具用法（2026-08-18 前的历史修正记录 `seo.md` 已删除，可从 git 历史查阅） |
| 当前项目状态 | [`../progress.md`](../progress.md) | 已完成事项、优先级和约束 |
| GEO 状态与测试 | [`../geo/GEO.md`](../geo/GEO.md) | AI 搜索基线和独立测试流程 |
| 长期 SEO 运营 | 本文件 | 从研究到复盘的标准流程 |

当不同来源涉及认证、数值、法律主体或其他硬事实冲突时，先确认日期和用途，不直接选择更有利的说法。服务能力以所有者确认的当前可交付范围为准，不因缺少历史公开案例自动判定为不可宣传；第三方数据库、历史网站和 AI 回答只能作为线索。

### 2.2 数据真值

按以下优先级解释数据：

1. 合格询盘、成交和销售反馈；
2. Google Search Console、GA4 和表单归因；
3. Bing Webmaster Tools；
4. 美国、加拿大和欧洲各目标国的真实 SERP；
5. Google Trends、Keyword Planner、Autocomplete、Related Searches 和 People Also Ask；
6. Semrush、Ahrefs 等第三方估算；
7. AI 或 SEO 工具自动生成的建议。

第三方工具可用于发现机会、比较竞争和监控选定关键词，但不能覆盖一方数据，也不能单独触发页面、URL、Title 或内容修改。

## 3. 成功定义与指标层级

### 3.1 一级：业务结果

- Organic 渠道带来的合格询盘数量；
- 询盘中的产品类别、预计数量、企业身份和项目要求是否完整；
- 询盘是否符合 MOQ 500 pieces per style；
- Organic 询盘进入报价、打样或后续沟通的比例；
- 北美与欧洲分别产生的有效机会，其中美国和加拿大单独记录。

### 3.2 二级：搜索结果

- 非品牌查询的点击和曝光；
- 商业页与技术指南分别获得的点击；
- 美国、加拿大与欧洲国家维度的查询、页面和点击；
- 目标主题进入前 20、前 10 和前 3 的页面数量；
- Organic 访问到 Contact 和表单提交的转化；
- 新页面发现、抓取、收录和首次曝光所需时间。

### 3.3 三级：健康与领先信号

- Sitemap 中规范 URL 的收录状态；
- 抓取、Canonical、robots、HTTP 状态和 Schema 健康；
- 页面之间的有效上下文内链；
- LCP、INP、CLS 和移动体验；
- 相关行业网站的自然提及和引用域；
- 品牌名称、公开实体和制造定位的一致性。

### 3.4 不作为核心 KPI

- Semrush Authority Score 或类似第三方分数；
- 单纯的 Backlinks 总数；
- 没有意图和国家上下文的搜索量；
- AI Visibility 的单个平台汇总分；
- 发布文章数量；
- Sitemap URL 数量；
- 没有询盘质量说明的总流量。

## 4. 端到端 SEO 工作流

每项 SEO 工作都应从阶段 A 开始，按需要进入后续阶段。已有页面优化可以跳过“新 URL 审批”，但不能跳过事实、意图和上线验证。

### 阶段 A：业务输入与事实边界

开始任何关键词、页面或内容工作前，先记录：

- 本轮优先产品或能力；
- 目标买家角色和企业规模；
- 北美与欧洲的具体目标国家；
- 产品、材料、结构、工艺、MOQ、交付和合规事实；
- 有哪些真实图片、样品、Tech pack、QC 或流程证据；
- 哪些事实尚未批准，必须使用 `【NEEDS INPUT: ...】`；
- 本轮希望产生的业务动作：了解、比较、联系、报价或打样。

输出：一份“SEO Opportunity Card”，至少包含业务目标、目标市场、买家、证据、限制和负责人。

### 阶段 B：测量与基线

#### 必需设置

- Google Search Console Domain Property；
- GA4 与表单提交事件；
- UTM 和 Organic / Referral / Paid 渠道区分；
- Sitemap 提交与读取状态；
- Bing Webmaster Tools 验证与 Sitemap；
- 关键页面 URL Inspection；
- 询盘台账中的首次来源、落地页和合格状态。

#### 基线保存

每个新周期保存：

- 日期范围和对比范围；
- Clicks、Impressions、CTR、Average Position；
- Queries、Pages、Countries、Devices；
- Indexed / Not indexed 及示例 URL；
- Organic Landing Pages 与询盘；
- 已知发布、站点修改、广告和分发事件。

小样本阶段只记录方向，不因几次曝光或单个查询立刻改页。

#### 自动化项目与证据状态

- 本机 `seo` CLI 使用 `athletikapparel` 项目 Profile 统一保存 GSC 属性、GA4 属性、规范站、品牌词与重点监控 URL；Profile 和 OAuth 只保存在本机，不进入 Git。
- 宽泛审计先运行结构化主报告；单页、索引、性能、回归或机会问题只运行能够回答当前问题的第一个专项报告，不批量运行全部工具。
- 第一次使用报告前先读取其 `describe` 输出中的输入 Schema、`readOrder`、`doNotClaim`、数据限制和复验方法。
- 所有证据必须标注 `complete`、`partial`、`sampled`、`capped`、`skipped` 或 `unavailable`；缺失和不完整数据不能写成零或“无问题”。
- 自动化 Finding 必须保留稳定 ID、受影响 URL、证据来源、处理结论和复验结果；Inventory 存在分页时必须读完，或明确记录未覆盖范围。

### 阶段 C：买家与搜索语言研究

研究对象不是“所有会搜索服装的人”，而是符合 Athletik 定位的 B2B 采购参与者。

#### 买家任务

| 阶段 | 买家正在做什么 | 可能出现的搜索语言类型 |
|---|---|---|
| 发现 | 寻找可生产某类产品或工艺的制造商 | 产品/材料/工艺 + manufacturer、OEM、supplier、factory |
| 筛选 | 判断 MOQ、产品范围、地区和技术是否匹配 | capability、MOQ、custom、private label、contract manufacturing |
| 技术确认 | 解决结构、材料、Tech pack、测试和做工问题 | how、difference、requirements、specification、construction |
| 尽调 | 比较供应商、QC、垂直整合和出口能力 | evaluate、audit、quality control、sampling、lead time |
| 行动 | 联系、索取报价或准备打样 | contact、request quote、send tech pack、sampling inquiry |

#### 研究来源

- 去标识化的历史询盘、RFQ、Tech pack 和销售问题；
- Contact 表单字段和不合格询盘原因；
- GSC 已出现的非品牌查询；
- Google/Bing 的 Autocomplete、Related Searches、People Also Ask 和 SERP；
- 目标国家搜索结果中的页面类型、标题、制造商和目录；
- 真实竞争网站的页面结构和主题覆盖；
- Google Trends 与 Keyword Planner；
- 第三方关键词工具的免费或付费数据，若可用。

不得把客户名称、邮箱、电话、未公开设计或真实联系人数据提交到 Git。

### 阶段 D：关键词发现、SERP 验证与评分

#### 关键词发现

从主题和买家任务建立种子词，不先限定为某个工具数据库：

- 产品：Sportswear、Underwear、Outdoor Clothing、Merino Wool Apparel、Silk Wear、Knitted Fabrics、Sports Accessories；
- 制造关系：manufacturer、OEM、ODM、supplier、factory、contract manufacturer、private label；
- 技术结构：FLATLOCK、ACTIVESEAM、OVERLOCK、COVERSTITCH、Laser perforation；
- 材料与性能：Merino wool、technical knitwear、performance fabric；
- 采购流程：Tech pack、sampling、MOQ、QC、bulk production、export；
- 评估与比较：difference、requirements、checklist、evaluate、compare。

上述词只是研究入口，不代表已经确认搜索量、意图或目标页面。

#### SERP 验证

每个候选关键词至少检查美国、加拿大和一个相关欧洲国家的第一页结果：

- 当前结果是制造商、零售商品、目录、招聘、教程还是媒体文章；
- Google 是否把它理解为 B2B 商业、信息或消费意图；
- 排名页面使用何种页面类型和证据；
- Athletik 是否有真实能力和独特信息提供更合适的结果；
- 是否会吸引低 MOQ、个人消费者、求职或缝纫教学等不匹配流量；
- 同义词在美国、加拿大与欧洲是否存在明显差异。

竞争结果同时按页面角色分类：制造商、目录、媒体/信息发布者、Marketplace、零售品牌及其他。只有在同一市场、同一意图下跨多个目标词反复出现的真实制造商，才进入页面结构或关键词差距比较；目录、媒体和零售页面可以说明 SERP 形态，但不直接作为 Athletik 的内容模板。

Competitor Gap 只产生研究候选，不自动产生页面。任何候选仍须依次通过业务匹配、采购意图、SERP 页面类型、现有页面所有权和一方证据门槛。

#### 优先级评分

每个主题按 0–3 分评估，分数只用于排序，不替代判断：

| 维度 | 权重 | 判断问题 |
|---|---:|---|
| 业务匹配 | 30% | 是否对应可生产且希望获得的订单？ |
| 采购意图 | 25% | 搜索者是否可能参与供应商发现或采购决策？ |
| 证据优势 | 20% | 是否有真实工厂、产品、工艺或经验可以证明？ |
| 可竞争性 | 15% | 当前站点是否有合理机会进入可见位置？ |
| 需求信号 | 10% | GSC、SERP、趋势、客户语言或工具是否显示需求？ |

高搜索量但业务不匹配的主题不得进入高优先级；搜索量未知但客户反复提出、商业价值高的问题可以进入测试队列。

### 阶段 E：关键词聚类与页面映射

把表达不同但意图相同的词归为一个主题集群，再为集群指定一个主要页面。原则是“一个主要意图对应一个规范页面”，不是“一个关键词对应一个页面”。

映射表至少包含：

| 字段 | 说明 |
|---|---|
| Market | 美国、加拿大或具体欧洲国家 |
| Language | 当前为 English；未来语言版本单独记录 |
| Buyer stage | 发现、筛选、技术确认、尽调或行动 |
| Intent cluster | 聚类后的主要搜索意图 |
| Query variants | 自然同义词和修饰词 |
| Target URL | 当前规范页面或候选新页面 |
| Page role | Commercial、Guide、Trust、Process 或 Conversion |
| Evidence | 页面可使用的已确认事实和资产 |
| Current performance | GSC 点击、曝光、CTR、排名和国家 |
| Gap | 缺少内容、证据、内链、页面或无缺口 |
| Priority | P0–P3 |
| Decision | 保留、优化、合并、观察或提议新建 |

#### 新 URL 审批门槛

只有同时满足以下条件才提议新 URL：

1. 搜索意图与现有页面明显不同；
2. 现有页面加入该内容会破坏主要目的或产生混乱；
3. Athletik 具备直接或协同交付能力，并能形成对目标买家有用的独立内容；不要求必须已有公开案例；
4. 主题具有业务价值或稳定的客户需求；
5. 页面能够获得合理内链并长期维护；
6. 已在 [`../sitemap.md`](../sitemap.md) 中审批 URL、H1、定位和页面关系。

不为城市、国家或关键词排列组合创建 Doorway Pages。

### 阶段 F：内容组合与选题队列

#### 页面组合

| 层级 | 当前页面 | SEO 任务 |
|---|---|---|
| 品牌与总定位 | 首页 | 承接品牌、总体技术针织制造定位和主要入口 |
| 商业承接 | 7 个 `*-manufacturer/` 品类页 | 承接产品、材料和制造商采购意图 |
| 流程承接 | `/services/` | 解释 Sampling、Bulk Production、QC、Export & Shipping |
| 技术教育 | Technical Guides Hub 与指南 | 回答采购和技术问题，并把读者送往商业页 |
| 信任证明 | About、Sustainability | 提供实体、制造、区域和责任证据 |
| 转化 | Contact | 收集可以判断匹配度的询盘信息 |

#### 内容队列优先方向

1. Athletik 有明确差异化证据的技术结构；
2. 中型买家在 Tech pack、Sampling、QC、MOQ 和 OEM 评估中的真实问题；
3. 与重点品类页直接相关的材料、结构和应用决策；
4. GSC 或客户问题中持续出现但现有页面回答不足的主题；
5. 北美与欧洲市场存在不同搜索意图、且值得单独解释的主题。

当前单人运营默认上限为每月一篇高质量技术指南。没有真实输入、图片或审核能力时允许暂停，不以补数量为目标。

#### 每篇内容 Brief 必备字段

- 目标买家与市场；
- 买家任务和主要搜索意图；
- Target URL 与页面角色；
- Primary topic 和自然相关问题；
- 可主动营销的交付能力；
- 需要证据支持的硬事实及其来源；
- 应使用概括性表达或留到询盘阶段确认的变量；
- 推荐结构和读者完成页面后应采取的动作；
- 出链和内链；
- 图片需求、alt 方向和版权状态；
- Title、Meta、H1 草案状态；
- 所有者审核项；
- 发布与复盘日期。

### 阶段 G：页面制作与 On-page SEO

每个新页面或实质修改必须完成以下项目：

#### 搜索结果元素

- 独立且准确的 `<title>`；
- 独立 Meta Description；
- 自引用 Canonical；
- Open Graph / Twitter 基础信息；
- 不输出意外 `noindex`；
- 规范 URL 与 [`../../seo-tags.md`](../../seo-tags.md) 保持一致。

Title 和 Meta 用于准确表达页面价值，不机械追求字符数，也不在样本不足时频繁改写。

#### 页面结构

- 全页只有一个 H1；
- H1 与 [`../sitemap.md`](../sitemap.md) 的真值一致；
- H2/H3 层级连续且反映真实结构；
- 首屏明确说明页面对象、能力或问题；
- 重要内容使用可抓取 HTML，不仅存在于图片、视频或交互控件中；
- CTA 与买家所处阶段相匹配。

#### 内容质量

- 回答该意图下最重要的采购问题；
- 优先使用一方知识、图片、工艺和流程建立专业度，同时允许描述 Athletik 能够组织交付但暂时没有公开案例的服务；
- 区分可主动营销的交付能力、需要硬证据的具体声称，以及应留到询盘阶段确认的项目变量；
- 对 MOQ、交期、价格、测试范围和材料表现等不稳定变量使用概括性表达，不用未经确认的具体数字装饰页面；
- 不复制竞争对手，不拼接通用资料，不捏造客户经历、认证、报告或量化结果；
- 限定语只保留到控制风险所需的最低程度，避免因过度解释削弱关键词主题和商业吸引力；
- 不要求固定字数；以完整解决问题为停止条件；
- 更新日期只在内容发生实质变化时更新。

#### 图片与媒体

- 新图片只存入 `uploads/myathletik-theme/assets/images/` 对应分类；
- 文件名使用小写 ASCII 和连字符；
- 信息图片使用描述性 alt，装饰图片使用 `alt=""`；
- 图片靠近相关正文；
- 使用合适的 WebP/AVIF、`srcset`、`sizes`、尺寸、lazy loading 和 decoding；
- LCP 媒体不懒加载，并根据实际页面设置优先级；
- 视频必须有明确业务价值，不能只为视觉效果牺牲加载性能。

#### Schema

- Schema 必须代表页面可见内容；
- 只使用与页面类型匹配的 Organization、WebSite、BreadcrumbList、WebPage、CollectionPage、Article 或 FAQPage 等；
- 不创建虚假 Product、Review、Rating、LocalBusiness、Person 或认证数据；
- Rich Results Test 通过不等于一定获得富媒体结果；
- 不为 AI 搜索添加未经支持的特殊 Schema。

### 阶段 H：内部链接系统

内部链接用于建立页面关系和引导买家，不用于重复堆精确关键词。

#### 基本关系

- 首页 → 7 个品类页、Services、Technical Guides 和 Contact；
- Technical Guides Hub → 所有已批准指南；
- 指南 → 最相关品类页、Services、相关指南和适当 CTA；
- 品类页 → 与该产品真实相关的指南、Services 和 Contact；
- Services → 相关指南、重点品类和 Contact；
- About / Sustainability → 在事实相关时连接制造能力或 Contact。

#### 质量要求

- 锚文本描述目标页面，不使用 `click here`；
- 同一页面不要反复使用相同精确匹配锚文本；
- 每个可索引页面至少有一个可抓取站内入口；
- 不为了“链接数量”添加不相关链接；
- 新页面发布前必须确认没有孤立页；
- 合并或删除页面时同步更新所有站内链接。

### 阶段 I：技术 SEO 与变更控制

#### 持续检查

- HTTP 200、301、404、410 和重定向链；
- `robots.txt`、Meta robots 和 X-Robots-Tag；
- Canonical、Sitemap 和内部链接中的 URL 一致性；
- 重复页面、参数 URL、附件页和 WordPress 默认内容；
- 移动端渲染、HTTPS 和安全问题；
- JSON-LD 解析和页面类型；
- LCP、INP、CLS、字体、Hero 媒体和图片尺寸稳定；
- Sitemap 只包含希望出现在搜索结果中的规范 URL；
- `lastmod` 只在主要内容实际更新时变化。

每次具有 SEO 影响的部署都保存可比较 Crawl Snapshot。部署后使用相同起始 URL、抓取范围和渲染方式运行 `crawl-diff`；若范围、抓取上限或数据状态不同，只能报告“不可直接比较”，不能把缺失 URL 判定为删除或修复。

性能检查分为两层：HTML 静态信号用于提前发现明显风险；Lighthouse 作为实验室诊断，CrUX 作为真实用户字段数据。两者分开记录，不把 Origin 级 CrUX 当作单页数据，也不把 Lighthouse 分数直接解释为排名结果。

#### URL 变更门槛

URL 删除、改名、合并或移动前必须：

1. 查看 GSC 点击、曝光、查询和入链；
2. 核对历史 URL 和当前索引状态；
3. 输出 Source → Target 301 映射；
4. 确认 Target 内容与旧意图相符；
5. 更新内部链接、Canonical、Sitemap、导航和 Schema；
6. 上线后验证首跳、最终 200 和 Search Console；
7. 记录变更日期和观察期。

不得因第三方工具提示或 slug 偏好直接改动已索引 URL。

### 阶段 J：发布、发现与收录

#### 发布前

- 事实和公开正文已获批准；
- URL、Title、Meta、H1、Canonical 和 Schema 已核对；
- 桌面、移动端和键盘操作检查；
- 图片 URL、alt、尺寸和加载策略检查；
- 站内入口和 CTA 检查；
- 表单和转化事件测试；
- 没有意外占位符、测试链接或 `noindex`。

#### 发布后

1. 清理缓存并检查生产 HTML；
2. 确认页面返回 200；
3. 确认 Sitemap 自动包含规范 URL；
4. 对重要新 URL 运行 URL Inspection；
5. 必要时申请一次收录，不重复提交；
6. 在 Bing Webmaster Tools 检查发现状态；
7. 以相同抓取范围运行部署前后比较，逐条处置新增、消失和持续存在的 Finding；
8. 记录发布日期、检查结果、相关分发与 SEO Change Card。

默认检查点：

- Day 0：生产 QA；
- Day 7–14：发现、抓取与初步收录；
- Day 28：首次查询和页面表现；
- Day 90：内容、排名、转化和后续决策。

索引不是排名保证；Sitemap 成功也不等于页面已经收录。

### 阶段 K：外部权威与品牌信号

目标是获得真实、相关、可验证的行业提及，而不是购买链接数量。

优先来源：

- 获授权客户、供应商或合作伙伴页面；
- 行业协会、展会、专业目录和活动资料；
- 相关材料、设备和技术合作内容；
- 有编辑审核的专业媒体或客座技术内容；
- 原创研究、检查表、技术图解或可引用的一方资料；
- 官方 LinkedIn、Instagram、YouTube 等分发带来的真实发现和品牌一致性。

每个机会检查：

- 与技术针织或目标买家是否相关；
- 页面是否真实、可索引且有编辑价值；
- 品牌和实体名称是否准确；
- 链接是否自然置于相关上下文；
- 是否要求购买传递排名权重的链接、交换链接或自动生成链接；
- 是否可能损害品牌或引入错误事实。

不因 Semrush Toxic Score 自动提交 Disavow。只有存在明确、持续且具有操纵意图的链接风险，并完成证据审查后才考虑该工具。

### 阶段 L：监控、诊断与迭代

#### 报告路由

| 问题 | 首选证据 | 何时继续深入 |
|---|---|---|
| 全站健康或部署回归 | 主报告、`crawl-diff` | 出现新增 Finding 后查看 `affected-urls` 与源代码 |
| 收录异常 | `index-coverage` | 需要代表性 URL 时再建立 `index-coverage-plan` 并运行 `index-monitor` |
| 单页增长 | `page-opportunities` | 达到样本门槛后再看 `quick-wins`、`second-page` 或 CTR |
| 多页查询重叠 | `cannibalisation` | 核对页面目的、实际 Query 和内部锚文本后决定是否处理 |
| 页面性能 | `performance-audit` | 能复现具体 Lab 问题或取得 CrUX 数据时才进入代码优化 |
| 已知 SEO 改动 | `measure-change` | 前后至少各有 7 个完整最终日；仍只说明相关变化，不宣称因果 |
| 竞争机会 | `serp-competitors` | 确认真实同类制造商后再做 `competitor-keyword-gap` |
| 抓取到达证据 | `server-log-analysis` | 仅在取得服务器日志时使用，并核对重要原始日志行 |

以上报告是取证入口，不替代本流程的业务价值、事实、页面所有权和审批门槛。

#### 每周：异常监控，约 10–15 分钟

- GSC 是否出现安全、人工处置或明显收录异常；
- Sitemap、服务器、表单和主要 URL 是否正常；
- 点击或曝光是否出现突发且可解释的变化；
- 新发布页是否被发现。

不做每日排名情绪化调整。

#### 每月：完整 SEO 复盘

- 与前 28 天或可比期间比较；
- Queries、Pages、Countries、Devices 分开分析；
- 品牌与非品牌查询分开；
- Commercial、Guide、Trust 页面分组；
- 北美与欧洲分开，其中美国、加拿大和欧洲重点国家分别查看；
- 检查曝光增长但未点击的主题；
- 检查有点击但无转化的落地页；
- 检查一个意图是否出现多个竞争页面；
- 把新查询加入研究池，不直接变成页面；
- 更新机会队列和下一月唯一优先级。

每月同时复核本月 SEO Change Card：只有对比窗口完整、范围可比且数据状态足够时才给出方向结论。广告、分发、季节、算法更新、站点部署和表单变化等干扰因素必须与结果一起记录。

#### 每季度：策略复盘

- 哪些主题产生合格询盘；
- 哪些页面获得稳定非品牌发现；
- 内容集群是否形成商业页支持；
- 是否需要合并、更新或停止某些内容；
- 美国、加拿大和欧洲重点国家的差异是否足以改变内容；
- 是否具备新增语言版本、案例页或专题页的条件；
- 外部提及和品牌实体是否更一致；
- SEO、GEO、广告和社交是否共享了正确证据。

## 5. 诊断与决策门槛

以下门槛是 Athletik 的内部运营规则，不是 Google 排名公式。

| 现象 | 先检查 | 建议决策 |
|---|---|---|
| 页面未发现 | Sitemap、内链、HTTP、robots | 修复发现路径，不重复提交 |
| 已发现但未抓取 | 站点健康、内链、页面价值、报告延迟 | 等待合理时间并核对示例 URL |
| 已抓取但未收录 | Canonical、重复内容、内容独特性和价值 | 先诊断，不靠增加字数解决 |
| 已收录但无曝光 | 意图、页面主题、市场、竞争和搜索需求 | 重新做 SERP 与买家语言研究 |
| 有曝光、排名 20 名以后 | 内容匹配、证据、内链、页面类型 | 补足真实价值，避免只改关键词密度 |
| 排名可见但 CTR 低 | Query、Title、Snippet、品牌和 SERP 功能 | 有足够样本后测试 Title/Meta |
| 有点击但无询盘 | 流量意图、页面证明、CTA、表单和市场匹配 | 优化转化或停止追逐不匹配查询 |
| 多页获得同一查询 | 页面目的、Canonical、内部锚文本 | 判断正常覆盖还是关键词蚕食 |
| 排名或点击下降 | 站点改动、季节、算法、竞争、索引和需求 | 找到页面/查询范围后再处理 |

默认样本门槛：

- Critical 技术问题立即处理，不等待流量；
- CTR 修改至少基于一个可比较查询/页面组合的足够曝光，当前可用 100 次曝光作为内部初始观察门槛；
- 新内容除事实错误或技术故障外，通常观察至少 90 天再决定大改、合并或放弃；
- 单月波动不直接触发战略改变，优先观察连续两个可比周期；
- 所有门槛都要结合询盘质量，不机械执行。

## 6. 北美与欧洲市场流程

### 当前阶段

- 规范站保持英文；
- 页面不按国家复制；
- GSC 以 Country 维度分别观察美国、加拿大和欧洲国家；
- SERP 研究至少包含美国、加拿大和相关欧洲目标国；
- 记录同一采购意图在不同国家的词汇、结果类型和竞争差异；
- 不通过 IP 自动替换正文或强制跳转。

### 启动本地化的门槛

只有满足以下条件才提议语言或地区版本：

- 某国家持续产生相关曝光、询盘或明确业务机会；
- 买家确实使用非英文搜索并需要本地语言页面；
- 可以提供人工审核的完整专业翻译；
- 可以长期维护每个语言版本；
- 法律、隐私、表单、销售和服务能力适配目标市场；
- 已设计独立 URL、双向 `hreflang`、Canonical 和 Sitemap；
- 本地化不是只替换城市或国家名称的 Doorway Page。

## 7. SEO 与 GEO 的关系

Google 的 AI 搜索功能仍建立在抓取、索引、质量和核心搜索系统之上，因此以下工作同时支持 SEO 与 Google AI 搜索：

- 可抓取、可索引的规范页面；
- 独特、准确、可验证的一方内容；
- 清晰的品牌、实体、产品和制造定位；
- 真实图片、视频和现场证据；
- 有帮助的页面结构和内部链接；
- 一致的第三方资料与自然引用。

不建立以下“捷径”：

- 不为 Google 添加 `llms.txt`；
- 不创建 AI 专用虚假 Schema；
- 不为每个提示词变体制作页面；
- 不购买或伪造第三方提及；
- 不把 AI 平台一次回答当作持续可见性；
- 不把 GEO 固定提示词测试混入 SEO 排名 KPI。

GEO 的中性测试、分发和月度比较继续在 [`../geo/GEO.md`](../geo/GEO.md) 中独立执行。

## 8. 工具栈：必需、免费与可选

### 必需

- Google Search Console；
- GA4 和表单/询盘记录；
- Google/Bing 实际搜索结果；
- 浏览器开发者工具和生产 HTML；
- 当前 Git 仓库、`docs/` 真值与部署 QA；
- Bing Webmaster Tools。

### 免费或低成本补充

- Google Trends；
- Google Keyword Planner（若账户可用）；
- PageSpeed Insights；
- Rich Results Test；
- Google Autocomplete、Related Searches、People Also Ask；
- Bing Keyword Research 和 Site Scan（若账户可用）。

### 可选付费工具

- Semrush、Ahrefs、Screaming Frog 或其他专业工具；
- 适合用于关键词发现、竞争研究、爬取和排名监控；
- 没有订阅不阻塞本流程；
- 任何工具建议都必须回到真实 SERP、GSC、业务事实和询盘验证。

## 9. 发布审批与安全门槛

以下事项必须由所有者确认后才能实施：

- 新页面、页面删除、合并或 URL 变化；
- 新的 Title/H1/Meta 真值；
- 长篇公开正文；
- 认证、客户、精确产能、工厂或设备归属、可量化材料性能和法律实体关系等硬事实声明；
- 客户 Logo、案例、评价或合作关系；
- 新国家或语言版本；
- 付费外链、赞助内容或高风险目录；
- Privacy Policy 或法律相关页面的 SEO 文案。

服务能力只要经业务判断可以直接或协同交付，即可进入正常 SEO 内容制作流程，不要求先提供历史订单或公开报告。技术审查、内部研究、数据汇总和不改变外部状态的诊断可以直接进行。

## 10. 初始执行路线

### 0–30 天：研究和控制面

1. 等待并核对当前 Page indexing 刷新；
2. 完成 Bing Webmaster Tools 验证和 Sitemap 状态确认；
3. 建立北美与欧洲买家搜索语言研究池；
4. 建立现有 17 页的关键词—页面映射 V1；
5. 将品牌词、非品牌商业词、技术词和不匹配词分组；
6. 核对 V2-005 历史 301 来源，不改变行为；
7. 选出最多三个下一阶段 P1 机会。

### 31–90 天：现有页面与首轮增长

1. 优先强化最符合业务、证据最完整的现有商业页；
2. 补强 Tech Pack 与 OEM Evaluation 指南的上下文内链；
3. 按研究结果发布最多 1–2 篇新技术指南；
4. 建立相关行业提及与自然链接机会池；
5. 在 Day 28 和 Day 90 记录 GSC、GA4 与询盘结果；
6. 不因早期第三方分数低而改变方向。

### 4–6 个月：主题集群与市场差异

1. 根据真实查询扩大表现最好的主题集群；
2. 更新有曝光但回答不足的现有页面；
3. 把指南与商业页形成稳定双向内链；
4. 分析美国、加拿大与欧洲重点国家的词汇、点击和询盘差异；
5. 评估是否需要新的案例、技术资产或行业合作；
6. 删除重复选题，保持每个 URL 的主要目的清晰。

### 7–12 个月：巩固与扩展决策

1. 以合格询盘和非品牌增长评估主题价值；
2. 合并或更新长期没有独立价值的内容；
3. 评估语言/地区版本是否达到启动门槛；
4. 评估是否需要独立专题页、案例页或新商业页；
5. 建立年度技术、内容、链接和实体一致性审查；
6. 冻结年度快照，并生成下一年度路线。

## 11. 标准记录模板

### 11.1 SEO Opportunity Card

```text
日期：
机会名称：
业务目标：
目标市场/国家：
买家角色与任务：
搜索意图：
真实客户/搜索证据：
可主动营销的交付能力：
需证据支持的硬事实：
留到询盘阶段确认的变量：
现有承接页面：
是否需要新 URL：
预期业务动作：
负责人：
下一步：
```

### 11.2 页面映射记录

```text
Intent cluster：
Query variants：
Market / Language：
Target URL：
Page role：
Current GSC data：
SERP result type：
Evidence：
Gap：
Internal links：
Priority：
Decision：
Review date：
```

### 11.3 发布记录

```text
发布日期：
URL：
页面类型：
批准的 Title / Meta / H1：
事实审核：
技术 QA：
生产 QA：
Sitemap：
Google URL Inspection：
Bing 状态：
GA4 / 表单测试：
Day 28 复盘日期：
Day 90 复盘日期：
```

### 11.4 月度复盘

```text
比较区间：
业务结果：
非品牌 Clicks / Impressions：
主要 Queries：
主要 Pages：
美国表现：
加拿大表现：
欧洲国家表现：
新收录页面：
索引异常：
CTR 机会：
内容/意图缺口：
询盘质量：
本月唯一 P1：
明确不做的事项：
```

### 11.5 SEO Change Card

```text
Change ID：
状态：planned / deployed / measuring / keep / revise / rollback / inconclusive
变更日期：
变更页面或分组：
唯一主要变量：
业务假设：
证据来源与数据状态：
主要指标：
防护指标：
基线窗口：
Day 7 / 28 / 90 复盘日期：
干扰因素：
部署前 Crawl ID：
部署后 Crawl ID：
Finding / Inventory 处置：
验证结果：
最终决策及原因：
```

## 12. 官方参考

- Google SEO Starter Guide：<https://developers.google.com/search/docs/fundamentals/seo-starter-guide>
- Google Search Essentials：<https://developers.google.com/search/docs/essentials>
- Google People-first Content：<https://developers.google.com/search/docs/fundamentals/creating-helpful-content>
- Google AI Search Optimization Guide：<https://developers.google.com/search/docs/fundamentals/ai-optimization-guide>
- Google Search Console Performance：<https://support.google.com/webmasters/answer/10268906>
- Google Sitemaps：<https://developers.google.com/search/docs/crawling-indexing/sitemaps/overview>
- Google International / Multilingual Sites：<https://developers.google.com/search/docs/advanced/crawling/managing-multi-regional-sites>
- Google Localized Versions / hreflang：<https://developers.google.com/search/docs/specialty/international/localized-versions>
- Google Core Web Vitals：<https://developers.google.com/search/docs/appearance/core-web-vitals>
- Google Structured Data Guidelines：<https://developers.google.com/search/docs/appearance/structured-data/sd-policies>
- Google Image SEO：<https://developers.google.com/search/docs/appearance/google-images>
- Google Spam Policies：<https://developers.google.com/search/docs/essentials/spam-policies>
- Bing Webmaster Guidelines：<https://www.bing.com/webmasters/help/webmaster-guidelines-30fba23a>
- Bing Webmaster Tools Getting Started：<https://www.bing.com/webmasters/help/getting-started-checklist-66a806de>
