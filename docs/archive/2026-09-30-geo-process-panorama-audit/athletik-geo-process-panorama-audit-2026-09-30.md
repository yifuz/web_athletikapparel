# Athletik Clothing GEO 流程全景审计

**官网事实、实体一致性、测量闭环与站内外证据审计**

> 本报告使用 yao-geo-panorama-audit 的官网优先、断言级核验、十二域诊断和站内/站外拆分方法。生产环境于 2026-09-30 只读核验；GSC、GA4、Bing AI Performance 数值沿用仓库内最近一次已记录快照，未登录后台刷新。报告不把索引、展示、引用或社交发布直接写成推荐与询盘成效。

## 诊断元信息

- 品牌：Athletik Clothing
- 规范官网：https://www.athletikapparel.com/
- 行业与区域：中国技术针织品 OEM/ODM；目标市场为北美与欧洲 B2B 买家
- 目标用户：中型品牌、批发商和进口商；成衣 MOQ 500 pieces per style
- 审计范围：GEO 控制文档、固定提示词、官网 20 个 Sitemap URL、Schema、社交分发、测量快照、历史域名与公开资料页
- 线上核验时间：2026-09-30（Asia/Shanghai）
- 数据边界：公开网页实时取证 + 仓库证据快照；不包含后台新导出、未授权客户资料或私有询盘内容
- 总体判断：有条件通过；流程骨架成熟，但实体真值漂移和测量有效性债务阻止扩量

## 执行摘要

- **技术发现层通过**：Page Sitemap 当前 20 个 URL 全部 HTTP 200、单一 H1、自引用 Canonical，HTML 图片节点未发现缺失 alt；Googlebot、OAI-SearchBot、PerplexityBot 与 ChatGPT-User 抽查首页和 ACTIVESEAM Guide 均返回 200。
- **P0 是实体真值，不是继续增产内容**：旧/新 LinkedIn 页面、athletik.com.cn、UltraMerino 与 retired domain 仍形成冲突公开语料。myathletik.com 当前对多个测试 UA 返回 200 验证挑战，不再满足文档所写的统一 410。
- **Baseline 已运行，不等于有效基线已闭合**：Baseline v2 与 Broad Discovery 的多数首轮记录为 partial，常见缺口是环境字段、最终来源 URL 或完整 Sources 面板。中央工作台的 8/8 完成应明确解释为运行完成，而非全部 valid。
- **测量边界总体严谨**：现有流程正确区分 Web Search、GSC Generative AI、Bing citation、GA4 referral、社交后台与人工询盘，并能识别内部 QA 污染；这是当前最成熟的部分。
- **暂不扩量**：八维可控 GEO 准备度均值为 3.6/5；权威信号、鲁棒性和跨域贡献低于 3。先修真值与证据链，再决定新增页面、内容批次或外联。

## 方法依据与评分口径

| 方法环节 | 执行方式 | 关键字段 | 控制风险 |
| --- | --- | --- | --- |
| 官网抓取 | 从 robots、Sitemap、导航和核心页面建立实时清单 | 状态码、H1、Canonical、alt、Schema、爬虫 UA | 排除只依据文档判断生产状态 |
| 断言核验 | 把实体、MOQ、设备、产能、域名状态和测量结论拆成短断言 | 当前官网、项目文档、公开资料页、核验日期 | 冲突写入台账，不以最新文案覆盖历史证据 |
| 流程追踪 | 检查输入、发布、索引、测量、复盘和决策是否闭环 | 任务状态、负责人、门槛、复核窗口、验收标准 | 区分 run-complete、valid、partial 与 unavailable |
| 公开信源扫描 | 核对当前与历史 LinkedIn、类目站、设备方和搜索可见入口 | 来源独立性、可控性、冲突字段、可编辑性 | 自有社交与历史站不算独立背书 |
| 评分 | 按八项 GEO 特征分别评分，并增加完整性判断 | 1–5 分；低于 3 必须进入修复清单 | 分数只定位可控问题，不预测推荐概率 |

## 权威参考映射

| 权威来源 | 采用原则 | 本次落点 | 边界 |
| --- | --- | --- | --- |
| GEO 研究 | 生成式答案综合多源材料 | 建立规范站、外部证据与用户问题三者映射 | 不反推平台内部排名机制 |
| 生成式搜索可验证性研究 | 流畅答案仍可能出现错配引用 | 每个关键断言记录来源是否真正支持 | 引用数量不等于引用精度 |
| Google Generative AI 指南 | 继续依赖 SEO 基础、索引和独特非商品化内容 | 保留技术 SEO、原创生产证据和用户价值门槛 | 不制作 llms.txt、AI 专用 Schema 或批量近义页 |
| GSC Generative AI 报告 | 提供 impressions、Pages、Countries、Devices、Dates | 按完整窗口记录链接展示 | 不提供 Query、答案原文、推荐位置或转化 |
| OpenAI Publishers FAQ | OAI-SearchBot 可访问有助于发现、摘要与引用；referral 可在分析平台观察 | 核验 robots 与 UA 访问，单列 ChatGPT referral | 可抓取不保证答案采用 |
| Bing AI Performance | citation、cited pages、grounding context 是观察指标 | 建立独立完整窗口并保留页面/查询证据 | Citation Share 不是排名或流量份额 |
| Google / Schema.org 结构化数据 | 标记应与可见事实一致并保持最新 | 实体角色先进入可见页面，再更新 JSON-LD | Schema 不是 GEO 排名开关 |

## 官网抓取与事实交叉验证表

| 来源 ID | 断言 | 证据 | 交叉来源 | 核验状态 | GEO 用途/风险 |
| --- | --- | --- | --- | --- | --- |
| S01 | 规范站技术可访问 | Page Sitemap 20/20 URL 为 200、单一 H1、自引用 Canonical；缺失 alt 计数为 0 | 生产抓取 2026-09-30 | 已核验 | 找到层基础通过 |
| S02 | 机器人访问 | Googlebot、OAI-SearchBot、PerplexityBot、ChatGPT-User 抽查首页与 ACTIVESEAM Guide 均为 200 | 生产抓取 2026-09-30 | 已核验 | 排除明显 UA/WAF 阻断 |
| S03 | 实体角色 | Contact 显示中国实体；Privacy Policy 显示美国实体；首页/About 未完整解释两者公开角色 | 生产页面 + AGENTS.md | 部分核验 | 实体消歧入口不集中 |
| S04 | Organization Schema | 首页 LocalBusiness 与 Contact Organization/LocalBusiness 当前均未输出 legalName；sameAs 指向当前三个官方社媒 | 生产 JSON-LD 2026-09-30 | 来源冲突 | 与 prompt-baseline.md 中已部署 legalName 的记录不一致 |
| S05 | retired domain 状态 | 文档写明所有变体返回 410；当前 default、Googlebot、OAI、Perplexity、ChatGPT UA 均得到 200 验证挑战 | myathletik.com 实时请求 | 来源冲突 | Cloudflare/边缘规则需复核 |
| S06 | LinkedIn 实体 | 当前页为 Athletik Clothing；旧 Athletik Clothing Inc. 页仍公开并含旧网站、纽约总部、客户/审核/人数等声明 | LinkedIn 公开页 2026-09-30 | 来源冲突 | 旧页更易放大历史实体污染 |
| S07 | 历史矩阵站 | athletik.com.cn 仍公开 50+ circular knitting machines；UltraMerino 仍公开 1,000 MOQ、100,000/120,000 capacity 等历史口径 | 公开网页搜索与实时可达性 | 部分核验 | 不自动并入规范事实库 |
| S08 | 指南与 Sitemap 数量 | 生产 Sitemap 为 20 URL、Technical Guides 当前 6 篇；GEO.md 部分章节仍写 18 URL、4 篇 | 生产 Sitemap + GEO.md | 来源冲突 | 中央工作台内部真值漂移 |
| S09 | GSC Generative AI | 最近记录为 29 Property impressions、13 个规范 URL；尚无第二完整可比窗口 | geo-measurement-snapshot-2026-09-28.md | 基线有效 | 只能证明链接展示 |
| S10 | Bing AI Performance | 最近完整 28 天为 5 citations；Pages 截图 3 URL，Grounding Queries 无记录 | bing-ai-performance-baseline.md | 基线有效 | 不能证明推荐 |
| S11 | GA4 AI referral | 11 raw sessions / 1 user 与内部测试重叠；0 confirmed external、0 recorded generate_lead | geo-measurement-snapshot-2026-09-28.md | 受污染 | 污染处置口径正确 |
| S12 | 固定提示词有效性 | 首轮多数记录为 partial；环境字段或最终来源 URL 不完整 | prompt-baseline.md | 部分核验 | 完成率与有效率必须拆分 |
| S13 | 社交分发证据 | 2026-08 三项发布仍有公开 URL、Story 和七日平台数据债务；9 月两项已识别内部 UTM 污染 | publishing-log.md | 部分核验 | 缺失字段应最终关闭为 unavailable 或补证 |

## 官网抓取覆盖清单

| 资产 | URL/范围 | 技术状态 | 可抽取事实 | 缺口 | 动作 |
| --- | --- | --- | --- | --- | --- |
| 首页 | https://www.athletikapparel.com/ | 200；单一 H1；自引用 Canonical | 定位、品类、设备、MOQ、生产证明 | 实体法律角色未集中说明 | 保持内容；P0 先做实体真值设计 |
| About | https://www.athletikapparel.com/about-us/ | 200；单一 H1；自引用 Canonical | buyer-fit、地点、设施、能力 | 未呈现中美实体公开角色 | 经所有者授权后补实体说明 |
| Contact / Privacy | /contact/；/privacy-policy/ | 均 200 | 分别承载中国实体和美国数据控制者 | 关系需跨页拼接 | 建立一处可引用实体事实单元 |
| Services | https://www.athletikapparel.com/services/ | 200；技术通过 | 样衣、量产、QC、出口 | 最近 GSC 记录仍为 unknown | 继续周度只读，不重复申请 |
| 七个品类页 | Sitemap 中 7 个 manufacturer URL | 7/7 为 200、单一 H1、自引用 Canonical | 产品范围、Program Fit、商业起点 | 宽泛发现仍弱 | 保持整批结构，等待固定窗口 |
| Technical Guides Hub | https://www.athletikapparel.com/technical-guides/ | 200；CollectionPage + ItemList | 六篇技术指南入口 | 中央文档仍有四篇旧描述 | 文档对齐，不改页面 |
| 六篇 Guide | FLATLOCK、Tech Pack、OEM、QC、Top 5、ACTIVESEAM | 6/6 为 200；Article/FAQ/Breadcrumb 可解析 | 专业采购与技术问题 | 对应 Guide 的 AI 规范引用仍弱 | 继续按固定题复测，不堆近义页 |
| robots / Sitemap | /robots.txt；/sitemap_index.xml；/page-sitemap.xml | 均 200；Page Sitemap 20 URL | 发现与抓取入口 | 内部文档计数滞后 | P0 对齐控制文档 |
| retired domain | myathletik.com 四种 host/scheme 变体 | 当前返回 200 验证挑战 | 本应为退役证据 | 不再是统一 410 | 恢复稳定 410，不做跨域 301 |

## 品牌实体与事实档案

| 实体/入口 | 当前口径 | 来源 | 状态 | 处理建议 |
| --- | --- | --- | --- | --- |
| 公开品牌 | Athletik Clothing | 规范站与当前 LinkedIn | 已核验 | 保持品牌名不替代法律实体 |
| 美国实体 | Athletik Clothing Inc.；数据控制者；可表述 North America sales office | AGENTS.md；Privacy Policy | 已确认但公开说明不完整 | 所有者批准后在实体事实页说明 |
| 中国实体 | Zhangjiagang Athletik Clothing Co., Limited；主要 manufacturer and seller | AGENTS.md；Contact | 已确认但公开说明不完整 | 与生产地址和角色同页表达 |
| 当前 LinkedIn | linkedin.com/company/111831319/ | sameAs 与公开页 | 当前可控入口 | About 仍只使用 Athletik Clothing Inc. + Asia production base，建议补角色边界 |
| 旧 LinkedIn | linkedin.com/company/athletik-clothing-inc | 公开索引页 | 冲突且控制权未知 | 优先取得管理权后更新/合并/停用；否则建立监测 |
| 旧主域名 | myathletik.com | 项目决策应为 410；当前为验证挑战 | 冲突 | 恢复稳定 410 并按 UA/host 验收 |
| athletik.com.cn | 历史实体与设备口径仍公开 | 公开页面 | 所有权/当前角色待确认 | 确认可编辑性并更新或明确用途 |
| UltraMerino | 同方控制 Merino 专业站；本项目外 | 所有者确认 + 公开页面 | 历史口径冲突 | 继续记录冲突；不复制、不跨域 Canonical、不擅自重定向 |
| Beta Textiles | 同一运营体系的独立面料销售名称 | 所有者决策 | 内部可共享材料，公开不得关联 | 旧资料页若公开关联需列入风险台账 |

## 产品服务与商业信息地图

| 产品/服务 | 范围 | 适用对象 | 商业口径 | 事实来源 | 限制 |
| --- | --- | --- | --- | --- | --- |
| 成衣品类 | Sportswear、Underwear、Outdoor、Merino、Silk、Sports Accessories | 中型 B2B 品牌/批发商/进口商 | 500 pieces per style | 七品类页 + About | 不推断每色 MOQ 或固定价格 |
| 面料项目 | Knitted Fabrics 与定制开发 | 独立面料采购 | 按规格与项目确认 | Knitted Fabrics 页 | 不得套用成衣 500 件口径 |
| 制造服务 | Sampling、Bulk、QC、Export & Shipping | 已有 tech pack 或概念的买家 | 咨询制报价 | Services | Services 索引状态仍需监测 |
| 技术能力 | FLATLOCK、ACTIVESEAM、OVERLOCK、Carbondry、laser perforation | performance knitwear 项目 | 按面料、部位、样品与测试确认 | 首页、About、Guides | 避免无条件性能保证 |
| 价格与交付 | 未公开统一单价；MOQ 和部分 sampling 口径公开 | 项目制 B2B 采购 | 以 RFQ/quotation 为准 | Contact、Services、品类页 | 价格类问题只能回答报价变量，不能创造价目表 |

## 用户问题覆盖矩阵

| 意图 | 用户问题 | 覆盖状态 | 证据缺口 | 最小动作 |
| --- | --- | --- | --- | --- |
| 推荐 | 哪些中国 OEM 适合 technical knitwear / activewear？ | 专业意图强；宽泛意图弱 | Broad Discovery 0/6 mentions | 保留专业定位，补可信外部发现入口 |
| 比较 | FLATLOCK、OVERLOCK、ACTIVESEAM 怎么选？供应商怎么比？ | 覆盖较强 | Top 5 自有内容独立性有限 | 技术比较与供应商比较分开衡量 |
| 替代 | Athletik 与其他供应商/工艺的替代边界？ | 部分覆盖 | 缺少系统替代场景 | 不为替代词批量建页；在现有比较内容加边界 |
| 教程 | tech pack、QC、OEM 尽调如何做？ | 覆盖强 | 对应 Guide 的 AI 规范引用弱 | 补原创过程证据而非重写全文 |
| 价格 | MOQ、报价变量、样衣和交付怎么确定？ | 部分覆盖 | 无统一价格是业务事实，不是缺陷 | 建立可引用的报价输入与不可公开边界 |
| 风险 | 认证、测试、产能、外包与项目适配风险？ | 覆盖较强 | 实体/历史站冲突会削弱可信度 | 先修实体证据链 |
| 真实性 | Athletik 是谁、在哪里生产、哪个站点/实体是官方？ | 官网可回答，但跨来源冲突严重 | 旧 LinkedIn、旧域名、矩阵站并存 | P0 实体消歧 |
| 购买决策 | 什么项目适合 Athletik，询价要提供什么？ | 覆盖强 | 尚无授权客户结果证据 | 保持 Program Fit；案例需授权 |
| 场景解决 | base layer、Merino、sportswear 等项目如何落地？ | 专业场景强，宽泛 sportswear 弱 | 缺少跨站独立佐证 | 以一个真实证据主题推进，不扩内容量 |

## 官网与内容资产盘点

| 资产层 | 现有资产 | 状态 | 可支持问题 | 缺口 |
| --- | --- | --- | --- | --- |
| 规范商业页 | 首页、About、Services、Contact、7 个品类页 | 完整 | 定位、品类、MOQ、流程 | 实体角色和外部证据仍需补强 |
| 技术指南 | 6 篇生产 Guide + Hub | 完整 | 技术解释、FAQ、来源、复核日期 | AI 对应 Guide 引用尚未稳定 |
| 生产媒体 | 真实机器、接缝和生产视频/图片 | 部分公开 | 第一方原创证据 | 专项铭牌、同面料 sew-off、匿名 tech pack/test record 尚缺 |
| 社交分发 | 当前 LinkedIn + Instagram | 已运行但证据不齐 | 发现入口、主题一致性 | 8 月 URL/Story/平台数据债务；9 月 UTM 污染 |
| 测量资产 | Baseline、Broad Discovery、GSC、Bing、GA4 快照 | 框架完整 | 四阶段分离与数据边界 | valid/partial 分母和第二窗口不足 |
| 客户/案例 | 未见授权公开项目结果矩阵 | 缺口 | 推荐可信度与购买决策 | 无授权时不发布客户名或结果 |
| 独立第三方信源 | 设备方、认证方、行业编辑、合作伙伴 | 薄弱/受输入阻塞 | 品牌外部佐证 | 不以目录数量替代质量 |

## 技术可抓取与结构化数据诊断

| 技术项 | 状态 | 证据 | 风险 | 动作 |
| --- | --- | --- | --- | --- |
| HTTP / H1 / Canonical | 通过 | 20/20 URL 为 200、单一 H1、自引用 Canonical | 未发现全站级技术阻断 | 保持监测 |
| 图片 alt | 通过 | 生产 HTML 的 img 节点缺失 alt 计数为 0 | 不代表 alt 语义全部最优 | 后续只在页面改动时复核 |
| robots 与 UA | 通过 | robots 允许公开页；四种 AI/Search UA 抽查为 200 | 真实爬虫日志未检查 | 出现引擎抓取失败再查 CDN/WAF |
| Sitemap | 通过但文档滞后 | Page Sitemap 当前 20 URL | GEO.md 存 18 URL 历史描述 | 对齐中央工作台 |
| Guide Schema | 通过 | Article、FAQPage、BreadcrumbList 与可见正文同页 | FAQ rich result 不是 GEO 成功指标 | 保持，不新增 AI 专用标记 |
| 实体 Schema | 需修复 | sameAs 正确；live legalName 为空 | 与内部记录及双实体治理不一致 | 先批准可见实体说明，再更新 JSON-LD |
| retired domain | 不通过 | 多个 UA 得到 200 verification challenge | 搜索缓存与 AI 可继续保留旧站信号 | 恢复所有 host/scheme 的稳定 410 |
| Services 索引 | 待确认 | 最近仓库记录为 URL unknown to Google | 技术通过不等于已索引 | 只读周度复核，不重复提交 |

## 外部信源与竞品模式对标

| 来源类型 | 当前优势 | 主要风险/差距 | 独立性 | 行动 |
| --- | --- | --- | --- | --- |
| 当前 LinkedIn | 规范站链接、当前技术定位、近期原创帖子 | 角色说明仍不完整；关注者少 | 可控非规范 | P0 更新 About 与实体角色 |
| 旧 LinkedIn | 历史关注者和索引积累 | 旧网站、纽约总部、客户/审核/人数等高风险声明 | 可控性待确认 | 优先取回、更新、合并或停用 |
| athletik.com.cn | 精确 FLATLOCK/ACTIVESEAM 与实体词 | 50 台圆机等未纳入当前核准事实 | 历史第一方 | 确认控制权后治理 |
| UltraMerino | Merino + FLATLOCK 意图匹配强 | MOQ、产能、材料和认证存在历史口径 | 同方但项目外 | 保留冲突样本，不复制 |
| 竞品产品/roundup 页 | 标题与买家意图精确、候选表可抽取 | 常为制造商自述或循环自证 | 第三方二手/竞品第一方 | 只借鉴透明结构，不复制声明 |
| Yamato / Merrow / 标准机构 | 机器、线迹与术语原始权威 | 当前未形成 Athletik 品牌背书 | 独立一手 | 用于技术核验；品牌案例需单独获得 |
| 客户/行业编辑证据 | 可直接支持项目适配与真实性 | 当前公开样本不足 | 独立来源缺口 | 仅在授权和专项素材齐全后推进 |

## GEO 特征评分

| 维度 | 评分 | 证据判断 | 优先动作 |
| --- | --- | --- | --- |
| 语义密度 | 4.5/5 | 产品、设备、MOQ、设施、流程与适用边界集中且具体 | 保持事实密度，不增加模板文案 |
| 结构规范性 | 4.5/5 | 页面标题层级、Guide 目录、表格/FAQ、Schema 与内链较成熟 | 只修文档真值与实体单元 |
| 可引用性 | 3.5/5 | Guides 有来源和复核日期，但品牌实体事实分散、对应 Guide 引用仍弱 | 补可见实体事实单元与原创过程证据 |
| 权威信号 | 2.5/5 | 主要仍是官网和自有社交；独立设备方案例、授权客户结果和行业编辑证据不足 | 进入修复清单 |
| 可读性 | 4.2/5 | 买家导向结构清楚，边界表达较严谨 | 避免因 GEO 再堆答案块 |
| 鲁棒性 | 2.8/5 | 专业题表现强，但宽泛发现弱；历史站与双 LinkedIn 使同义问法下实体答案不稳 | 进入修复清单 |
| 新颖性 | 4.2/5 | 真实生产视频、设备和技术指南提供非商品化信息 | 下一步优先脱敏原始记录 |
| 跨域贡献 | 2.6/5 | 当前 LinkedIn 已被 Google Sources 发现，但独立第三方生态薄弱 | 进入修复清单 |
| 完整性 | 3.4/5 | 十二域多数已有记录；外部证据、案例授权、有效运行分母和历史来源治理未闭环 | 修完 P0 后再评估扩量 |

判断含义：评分只衡量可控 GEO 准备度；均值 3.6/5 不等于推荐率或业务效果。

## 机会地图与优先级矩阵

| 类型 | 机会 | 问题 | 价值 | 工作量 | 优先级 | 负责人建议 | 验收标准 |
| --- | --- | --- | --- | --- | --- | --- | --- |
| 实体/基础设施 | 恢复 retired domain 稳定 410 | 当前 200 challenge 与决策冲突 | 高 | 中 | P0 | 所有者 + Cloudflare/域名负责人 | HTTP/HTTPS、www/裸域及 Googlebot/OAI/Perplexity/ChatGPT UA 全部稳定 410；无旧正文 |
| 实体/站外 | 治理双 LinkedIn 与历史资料页 | 旧页持续输出高风险实体和客户声明 | 高 | 中 | P0 | 所有者 + LinkedIn 管理员 | 旧页已更新/合并/停用，或记录无法控制；当前页明确官网与核准角色 |
| 治理/站内 | 建立统一实体事实单元并对齐 Schema | 可见页面和 JSON-LD 无完整角色映射 | 高 | 中 | P0 | 所有者审核 + 网站负责人 | 可见正文先批准；Schema 与正文一致；不推断法律关系 |
| 测量 | 把运行完成率与有效率拆开 | 多数首轮记录为 partial | 高 | 低 | P0 | GEO 执行者 | 每批单列 valid/partial/unavailable 分母；关键结论仅用有效运行或明确降级 |
| 文档治理 | 对齐 GEO.md 与 prompt-baseline.md 真值 | 4/6 Guides、18/20 Sitemap、410、legalName 等记录冲突 | 高 | 低 | P0 | 文档维护者 | 生产事实、历史快照和所有者决策不再互相覆盖 |
| 分发 | 关闭 8 月发布证据债务 | URL、Story、七日数据长期待补 | 中 | 低 | P1 | 社交管理员 | 能取则补；不能取则以日期和原因最终写 unavailable，不无限 overdue |
| 测量 | 按既定节点建立第二窗口 | GSC/Bing 只有基线 | 中 | 低 | P1 | 所有者导出 + GEO 执行者 | 10-03 后 GSC AI 完整窗口；10-20 后 Bing 完整窗口；口径一致 |
| 站外证据 | 专项生产证据 + 独立一手佐证 | 品牌外证据不足 | 中 | 中 | P1 | 所有者 + 内容/行业关系 | 一项真实设备/测试/项目主题形成规范页证据和独立一手来源；无材料则保持 deferred |

判断含义：P0 只保留真值、测量有效性与控制文档问题；内容扩量不属于当前 P0。

## 站内系统方案

| 站内模块 | 动作 | 优先级 | 负责人建议 | 验收口径 |
| --- | --- | --- | --- | --- |
| 控制文档 | 修正当前事实与历史快照边界 | P0 | 文档维护者 | GEO.md 与 prompt-baseline.md 无已知生产冲突；旧值保留为日期化历史 |
| 实体事实单元 | 在 About 或 Contact 建立品牌、美国实体、中国实体和角色的可引用说明 | P0 | 所有者审核 + 网站负责人 | 可见文本准确；不写母子公司、签约、出口或雇佣推断 |
| 实体 JSON-LD | 在可见事实批准后补 legalName/实体关系所需字段 | P0 | 网站负责人 | Schema Validator 通过且与页面一致；sameAs 保持当前官方资料 |
| Baseline 记录表 | 新增批次摘要与必填环境闸门 | P0 | GEO 执行者 | 缺字段自动降级 partial；结果摘要显示有效分母 |
| 来源台账 | 为核心断言增加 source_id、最后核验日、控制权和冲突状态 | P1 | GEO 执行者 | 实体、设备、MOQ、产能、认证、域名状态可回查 |
| 原创证据 | 对 C06/C08 补脱敏 tech pack/checklist/test evidence，而非全文重写 | P1 | 生产/QC + 内容负责人 | 材料真实、可公开、与 Guide 对应；无材料不实施 |

## 站外证据建设方案

| 站外信源 | 动作 | 支撑断言 | 优先级 | 负责人建议 | 验收口径 |
| --- | --- | --- | --- | --- | --- |
| 旧 LinkedIn | 取得管理权并更新、合并或停用 | 实体真实性、客户/审核边界 | P0 | 所有者 | 公开页不再输出未核准信息 |
| 当前 LinkedIn | 统一品牌、官网、地点与中美角色说明 | 实体消歧 | P0 | 社交管理员 | 与规范站实体事实单元一致 |
| myathletik.com | 恢复永久 410，不做跨域 301 | 旧站退役 | P0 | 基础设施负责人 | 全部变体和主要 UA 返回 410 |
| athletik.com.cn | 确认所有权、用途和编辑权限后治理 | 历史设备与实体声明 | P1 | 所有者 | 每个冲突字段有更新、下线或保留理由 |
| UltraMerino | 继续项目外冲突监测 | Merino 来源归属 | P1 | 所有者/该站负责人 | 不从本项目擅自修改；月度记录是否仍被引用 |
| 设备/标准方 | 专项素材齐全后争取一项编辑佐证 | D03/C07 技术与品牌能力 | P1 | 所有者 + 行业关系 | 公开可索引且准确；不把自有帖子当独立背书 |
| 客户/合作伙伴 | 仅经书面授权发布结构化案例 | 真实性、购买决策 | P2 | 销售 + 客户负责人 | 授权、实体、问题、方案、结果、限制字段齐全 |

## 页面与内容资产修复清单

| 页面/文档 | 主要问题 | 修复动作 | 输出 | 依赖 | 验收 |
| --- | --- | --- | --- | --- | --- |
| docs/geo/GEO.md | 指南数、Sitemap 数和部分分发状态滞后 | 按 2026-09-30 生产与日志状态对齐 | 中央工作台真值 | 生产 Sitemap、Publishing Log | 当前态与日期化历史分开 |
| docs/geo/testing/prompt-baseline.md | 410、legalName、历史站角色和运行完成语义冲突 | 修正文档并新增批次有效率摘要 | 实体冲突表 + 批次摘要 | 实时抓取、Schema、原始运行记录 | valid/partial/unavailable 清楚 |
| docs/geo/distribution/publishing-log.md | 8 月证据债务长期 open | 补证或最终关闭为 unavailable | 完成状态 | 社交后台/公开 URL/所有者确认 | 不再无限 overdue |
| 公开实体来源登记 | 现有实体冲突散落多文档 | 建立一张可控/不可控来源登记 | source_id、所有者、角色、最后核验日 | 官网、社媒、历史域名、目录 | 每月可复核 |
| About / Contact / Privacy | 实体角色需跨页推理 | 经授权建立统一可见事实单元 | 品牌与法律实体说明 | AGENTS.md 所有者确认口径 | AI 无需拼接推断角色 |
| Organization Schema | live legalName 为空且与记录冲突 | 在可见事实批准后同步 JSON-LD | Organization/LocalBusiness 字段 | 可见页面 + Validator | 无不可见或推断性断言 |
| retired domain 边缘规则 | 当前返回 200 challenge | 恢复一致 410 | Cloudflare/hosting 配置 | 四变体 + 多 UA | 所有检查均为 410 |

## 风险、假设与待确认项

| 风险 | 影响 | 优先级 | 负责人建议 | 处理方式 |
| --- | --- | --- | --- | --- |
| 旧域名不再统一 410 | 高 | P0 | 基础设施负责人 | 可能延长旧内容缓存与实体污染；先验证 Cloudflare/源站规则 |
| 双 LinkedIn 页面冲突 | 高 | P0 | 所有者/社交管理员 | 旧页含客户、审核、人数、成立年份和旧地址，风险高于缺少新内容 |
| Schema/文档与生产不一致 | 高 | P0 | 网站 + 文档维护者 | 错误的真值会进入后续 Agent 与 AI 判断 |
| partial 运行被当作完整基线 | 高 | P0 | GEO 执行者 | 会产生虚假稳定性或错误对比 |
| 内部 QA 污染 | 中 | P1 | 分析负责人 | 现已识别；后续使用 internal_qa 和拒绝统计同意的视觉检查 |
| 独立外部证据不足 | 中 | P1 | 所有者/内容负责人 | 限制宽泛发现和推荐可信度；不以低质目录补量 |
| 客户/认证未经授权或范围不清 | 高 | P0 红线 | 所有者 | 不得把旧 LinkedIn、历史站或 Logo 直接升级为当前公开事实 |
| 外部站不在项目控制内 | 中 | P1 | 所有者 | UltraMerino 等只记录冲突，不在本项目擅自修改 |

## 来源台账

| 来源 ID | 来源 | URL/路径 | 类型 | 状态 | 支持断言 | 核验日期 |
| --- | --- | --- | --- | --- | --- | --- |
| S01 | 规范站首页 | https://www.athletikapparel.com/ | 官网主页 | 已核验 | 定位、设备、MOQ、生产证明 | 2026-09-30 |
| S02 | About Us | https://www.athletikapparel.com/about-us/ | 官网页面 | 已核验 | 品牌定义、地点、buyer-fit | 2026-09-30 |
| S03 | Contact | https://www.athletikapparel.com/contact/ | 官网页面 | 已核验 | 中国实体与生产地址 | 2026-09-30 |
| S04 | Privacy Policy | https://www.athletikapparel.com/privacy-policy/ | 官网页面 | 已核验 | 美国数据控制者 | 2026-09-30 |
| S05 | Page Sitemap | https://www.athletikapparel.com/page-sitemap.xml | 官网技术入口 | 已核验 | 20 个规范 URL 与 lastmod | 2026-09-30 |
| S06 | robots.txt | https://www.athletikapparel.com/robots.txt | 官网技术入口 | 已核验 | 抓取策略与 Sitemap | 2026-09-30 |
| S07 | 当前 LinkedIn | https://www.linkedin.com/company/111831319/ | 可控非规范 | 已核验 | 当前实体与分发 | 2026-09-30 |
| S08 | 旧 LinkedIn | https://www.linkedin.com/company/athletik-clothing-inc | 历史公开资料 | 冲突 | 旧实体、客户、审核、地址 | 2026-09-30 |
| S09 | athletik.com.cn | https://athletik.com.cn/ | 历史第一方 | 部分核验 | 历史设备与实体声明 | 2026-09-30 |
| S10 | UltraMerino | https://www.ultramerino.com/ | 同方项目外站 | 冲突 | Merino、MOQ、产能、认证 | 2026-09-30 |
| S11 | retired domain | https://myathletik.com/ | 退役域名 | 冲突 | 当前 200 challenge；历史 410 决策 | 2026-09-30 |
| S12 | GEO 中央工作台 | docs/geo/GEO.md | 内部控制文档 | 部分过期 | 阶段、任务、门槛 | 2026-09-30 |
| S13 | 提示词基线 | docs/geo/testing/prompt-baseline.md | 内部证据日志 | 部分过期 | 固定题、环境、答案、冲突 | 2026-09-30 |
| S14 | 跨平台快照 | docs/geo/testing/geo-measurement-snapshot-2026-09-28.md | 内部数据快照 | 已核验 | GSC、Bing、GA4 边界 | 2026-09-28 |
| S15 | 发布日志 | docs/geo/distribution/publishing-log.md | 内部运营日志 | 部分核验 | 社交发布、UTM、七日复盘 | 2026-09-30 |
| S16 | Google AI 优化指南 | https://developers.google.com/search/docs/fundamentals/ai-optimization-guide | 平台官方 | 已核验 | SEO 基础、独特内容、反捷径 | 2026-09-30 |
| S17 | GSC Generative AI 报告 | https://support.google.com/webmasters/answer/16984139 | 平台官方 | 已核验 | 指标与聚合边界 | 2026-09-30 |
| S18 | OpenAI Publishers FAQ | https://help.openai.com/en/articles/12627856-publishers-and-developers-faq | 平台官方 | 已核验 | OAI-SearchBot 与 referral | 2026-09-30 |
| S19 | Bing AI Performance | https://blogs.bing.com/webmaster/2026/2/Introducing-AI-Performance-in-Bing-Webmaster-Tools-Public-Preview/ | 平台官方 | 已核验 | citation 指标边界 | 2026-09-30 |
| S20 | Google 结构化数据规范 | https://developers.google.com/search/docs/appearance/structured-data/sd-policies | 平台官方 | 已核验 | 可见内容一致性 | 2026-09-30 |

## 诊断问题池

1. Which China-based OEMs are a strong fit for cut-and-sew technical knitwear at 500 pieces per style?
2. How should a buyer compare FLATLOCK, OVERLOCK and Merrow ACTIVESEAM for a base-layer seam map?
3. What information should a mid-sized brand include in a technical knitwear tech pack?
4. How can a buyer verify whether Athletik Clothing, Athletik Clothing Inc. and Zhangjiagang Athletik Clothing Co., Limited refer to the same business system without treating them as one legal entity?
5. What should a buyer verify before relying on a garment factory's certification logos, capacity or customer claims?
6. How does a 500 pieces per style garment MOQ differ from standalone knitted-fabric commercial terms?
7. Which evidence proves Athletik's current Yamato FLATLOCK and Merrow ACTIVESEAM capability?
8. What are the risks and limitations when sourcing Merino wool base layers from a vertically integrated OEM?
9. What inputs should a buyer provide before requesting a sample and quotation from Athletik Clothing?

## 结论

Athletik 的 GEO 流程已经具备强于多数早期项目的结构纪律：有冻结提示词、四阶段漏斗、来源矩阵、跨平台数据边界、污染识别和改动门槛。当前失败点不是缺少更多文章，而是公开实体真值没有被同样严格地持续治理，以及首轮手工测试的有效性字段未完全闭合。先完成 retired domain、双 LinkedIn、可见实体事实、Schema 与控制文档的 P0 修复，再在 2026-10-03 和 2026-10-20 之后建立第二完整窗口。完成这些门槛前，保持近期页面 no-change，不扩量、不重复索引、不用低质目录补权威。
