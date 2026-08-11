# GEO 提示词基线与实体一致性记录

> 建立日期：2026-08-08
> 范围：针对 ChatGPT Search、Perplexity 和 Gemini/Google AI 体验进行轻量级月度观察。本记录不构成排名保证。

## 1. 执行规则

- 每月使用全新的 Temporary Chat，以英文运行一次相同的提示词；每条提示词单独开启一个 Temporary Chat，不在同一对话中连续测试。
- 测试前确认 Custom Instructions 中没有 Athletik、服装业务或供应商偏好。Temporary Chat 不使用或创建 Memory，但仍会执行已启用的 Custom Instructions；如果无法使用 Temporary Chat，则采用退出登录的独立浏览器会话。
- 保持联网/搜索功能开启；产品允许选择地区时，使用美国地区。
- 记录第一次回答，不要为了让品牌出现而反复重新生成。
- 分开记录品牌提及和网站引用：提到品牌但没有链接，不算网站引用。
- 保存回答链接或截图，并记录引擎、可见的模型/模式和运行日期，因为结果会随时间和用户而变化。
- 不跨引擎比较原始排名；每个引擎只与其自身上月结果比较。
- 如果 Search Console 已为此资源显示生成式 AI 效果报告，则每月记录其展示次数和被引用页面。该功能仍在逐步推出，菜单暂未出现不视为错误。
- 检查 GA4 获客/引荐数据中可归因的 AI 搜索访问。引荐流量比未附引用的品牌提及更有证明力。
- 单独标记个性化运行。凡回答出现“your own”、引用用户身份/业务关系，或 Memory Sources 显示历史聊天、Saved Memory、文件或应用来源，均只作为个性化观察，不计入中性 GEO 基线。

单人执行基线：8 条提示词 × 3 个引擎 = 每月 24 次检查。如果某个引擎在当前账户或地区无法提供基于网页的回答，则暂停该引擎。

## 2. 核准实体信息源

| 字段 | 核准值 |
|---|---|
| 公开品牌 | Athletik Clothing |
| 美国实体 | Athletik Clothing Inc. |
| 中国实体 | Zhangjiagang Athletik Clothing Co., Limited |
| 实体关系 | 所有者确认两者属于同一 Athletik 业务体系，但分别为美国与中国实体名称，运营职责不同；不得写成同一个法律实体或自行推断母子公司关系 |
| 规范主站 | <https://www.athletikapparel.com/> |
| 已确认拥有的历史类目矩阵站 | <https://www.ultramerino.com/>（公司早期为类目矩阵建立的独立网站；当前角色与去留策略尚未确定） |
| 公开邮箱 | `info@athletikapparel.com` |
| 公开电话 | `+86 139 5113 9696` |
| 中国办公地址 | No.25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu, 215699 China |
| LinkedIn | <https://www.linkedin.com/company/111831319/> |
| Instagram | <https://www.instagram.com/athletikclothinginc/> |
| YouTube | <https://www.youtube.com/@athletikclothinginc> |
| 定位 | Vertically integrated OEM for technical knitwear（技术针织品垂直整合 OEM） |
| 公开 MOQ | 每款 1,000 件 |

不得根据第三方页面推断或发布工厂数量、合作工厂详情、客户名称、未经核准的认证或其他产能声明。

### 旧域名状态

`myathletik.com` 已根据所有者的明确决定完全下线，不做跨域 301。2026-08-10 的外部检查确认：首页、内页、Sitemap、`robots.txt`，以及 HTTP/HTTPS、带 `www`/不带 `www` 的已检查入口均返回 HTTP 410 Gone。旧站下线前，Bing 对 GEO-01 的回答引用了旧站 About Us 页面，而非规范主站 `athletikapparel.com`。旧站不再属于 GEO 优化范围；此后若仍被引用，只记录为搜索引擎或 AI 的过期缓存信号，所有改进工作均聚焦规范新站。

## 3. 技术访问基线

2026-08-08 检查结果：

- `robots.txt` 允许访问公开页面，并声明了 Rank Math Sitemap。
- 使用 Googlebot、OAI-SearchBot、PerplexityBot 和 Claude-SearchBot 用户代理请求时，首页和 Sportswear Manufacturer 页面均返回 HTTP 200。
- 本次用户代理检查未返回插页式验证挑战。

这说明不存在明显的 `robots.txt` 或用户代理拦截，但不能证明所有爬虫 IP 始终能绕过 CDN/WAF 控制。只有当某个引擎报告抓取失败时，才进一步检查服务器或 Cloudflare 日志。

Google 可见性不需要 `llms.txt` 或所谓的 AI 专用 Schema。当前策略是：保证第一方内容可抓取、实体信息一致，并保持常规 SEO 基础完整。

2026-08-10 部署验证：

- 规范站的 Organization/LocalBusiness 实体已包含 `legalName` = `Athletik Clothing Inc.`，以及已核实的 LinkedIn、Instagram 和 YouTube `sameAs` URL。
- 首页、About Us 和 Sportswear Manufacturer 页面均返回 HTTP 200，服务器端渲染的 JSON-LD 可正常解析。
- 规范站 JSON-LD 中已无 `myathletik.com` URL。

## 4. 固定提示词组

> 为保证月度结果可比，以下 8 条测试提示词保留英文原文，不翻译、不改写。

| ID | 提示词 | 意图 |
|---|---|---|
| GEO-01 | What does Athletik Clothing manufacture, and where is the company based? | 品牌实体准确性 |
| GEO-02 | Is athletikapparel.com a technical knitwear manufacturer? Summarize its manufacturing focus and cite sources. | 网站/实体引用 |
| GEO-03 | Which manufacturers in China specialize in FLATLOCK and ACTIVESEAM technical knitwear? | 技术供应商发现 |
| GEO-04 | Recommend a sportswear OEM in China for an order of at least 1,000 pieces per style. | 运动服 + MOQ 供应商发现 |
| GEO-05 | Which manufacturers make Merino wool base layers with flatlock construction? | Merino wool 供应商发现 |
| GEO-06 | What should a buyer include in a tech pack for technical knitwear production? | 买家教育内容引用 |
| GEO-07 | FLATLOCK vs OVERLOCK for performance base layers: what are the differences and when should each be used? | 技术解答引用 |
| GEO-08 | How should a mid-sized brand evaluate a vertically integrated knitwear OEM in China? | 买家评估内容引用 |

## 5. 月度结果记录

每个提示词/引擎结果使用一行。只新增记录，不覆盖以前月份。

| 运行日期 | 引擎 + 模型/模式 | 提示词 ID | 是否提及品牌？ | 是否引用 `athletikapparel.com`？ | 引用的 Athletik URL | 错误/过时信息 | 提及的其他供应商 | 证据链接/截图 | 备注 |
|---|---|---|---|---|---|---|---|---|---|
| 2026-08-08 | Microsoft Bing 国内版网页，AI 回答区块（补充记录） | GEO-01 | 是 | 否 | `https://myathletik.com/about-us/` | 回答依赖旧域名，并重复使用了不属于当前核准实体基线的“seamless technology” | 未看到 | 用户提供的截图，2026-08-08 | 回答称公司位于中国苏州张家港，专注 flatlock stitch construction、seamless technology 和 technical sportswear。本次 Bing 补充检查不能替代 ChatGPT/Perplexity/Gemini 的月度记录。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-01 | 是，公开品牌和制造定位正确 | 无法确认：粘贴文本没有保留可点击来源 | 无 | “Athletik Clothing Inc. also lists a New York, NY headquarters”可追溯到仍被索引的旧 LinkedIn 页面，但当前核准 LinkedIn 页面把 Headquarters 标为 Zhangjiagang, Jiangsu；纽约地址目前核准为美国实体/网站数据控制者地址，不自动等于当前公开品牌总部。“production facilities are in Asia”也来自旧资料，表述过于宽泛。 | 无 | 用户提供的第一次回答，2026-08-10 | 计入中性 GEO-01 基线。回答正确识别 technical knitwear、underwear/base layers、sportswear/activewear、outdoor clothing、knitted fabrics、Merino wool、FLATLOCK、ACTIVESEAM 以及张家港/苏州/江苏制造地点；总体结论准确。主要问题是把旧 LinkedIn 的纽约总部字段与当前中国制造基线合并，没有说明新旧 LinkedIn 页面和美国/中国实体角色差异。粘贴文本未保留 Sources，因此不计规范站可点击引用。 |
| 2026-08-10 | ChatGPT Search（个性化状态未控制；未提供可见模型/模式） | GEO-02 | 是，但有一次将品牌称为“Athletik Apparel” | 是 | 首页、About Us、Underwear、Sportswear、Outdoor Clothing 和 Knitted Fabrics 页面 | 公开品牌名称漂移：使用“Athletik Apparel”，而不是“Athletik Clothing”。与“fashion sweater manufacturer”的对比由模型自行添加，并非网站原文。未出现无依据的工厂数量、产能或客户声明。 | 无 | 用户粘贴的第一次回答，2026-08-10 | 规范域名引用结果较强。制造能力陈述均可追溯至当前网站文案，而且回答明确将所有权、能力和认证信息标记为公司自行声明，而非独立核实。引用链接包含 `utm_source=chatgpt.com`，可用于衡量可归因的引荐访问。本次运行发生在实体 Schema 部署后、旧站开始返回 410 后；因未控制 Memory/历史聊天状态，暂作为探索性个性化结果。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认后续测试均来自 Temporary Chat；未提供可见模型/模式） | GEO-02 | 是，使用正确公开品牌 Athletik Clothing；但只把网站归为中国实体 Zhangjiagang Athletik Clothing Co., Limited | 无法确认：回答提到规范域名，但粘贴文本没有保留可点击来源 | 无 | Zhangjiagang Athletik Clothing Co., Limited 确为核准的中国实体名称，不是幻觉；但回答没有同时说明 Athletik Clothing Inc. 是美国实体，也没有说明两者属于同一 Athletik 业务体系且运营职责不同。50+ 台圆机来自旧公司资料，不是当前规范站核准事实。Panjiva/ImportInfo 可以支持相关名称存在出口记录，但不能独立证明工厂所有权、纵向整合、产能或所有记录均属于同一法律主体。 | 无供应商；提及 LinkedIn、Panjiva 和 ImportInfo 作为资料来源 | 用户粘贴的第一次回答，2026-08-10 | 计入中性 GEO-02 基线。这是强正向网站/实体发现结果：回答明确认可 technical/performance knitwear 和 Vertically integrated OEM/ODM 定位，产品、技术、4,500+ m² 与 100,000+ 件/月等主要当前站声明基本准确。与首次个性化状态未控制的结果方向一致，且没有“your own”等可见用户关系措辞。不过粘贴文本没有保留实际来源链接，所以不能把本次单独计为规范站可点击引用。回答对中国实体名称的识别有第一方依据，但把第一方声明与贸易记录组合成“独立制造商验证”时仍存在证据层级过度外推。 |
| 2026-08-10 | ChatGPT Search（个性化状态未控制；未提供可见模型/模式） | GEO-03 | 是，位列短名单第一；但使用“Athletik Clothing / Zhangjiagang Athletik Clothing Co., Ltd.”合并称谓 | 待确认：粘贴文本保留了“Athletik manufacturing profile”链接标题，但未保留实际 URL | 未随粘贴文本保留 | Zhangjiagang Athletik Clothing Co., Limited 已确认为中国实体名称，但“Athletik Clothing / ...”不是核准的合并公开品牌，也没有说明美国实体角色；“only a small number”、供应商置信度等级和“strongest”均为模型判断。竞品设备数主要来自企业自述，未获得独立核实。Yonglee 页面中的 `MB-40FD` 与 Merrow 官方型号 `MB-4DFO` 不一致。 | Shanghai Yonglee Textile Co., Ltd.；Merino Wool Apparel (Suzhou) Co., Ltd.；Zhangjiagang Huayu Import & Export Co., Ltd. / LeHeHe Merino；Royal International Industrial Ltd. | 用户粘贴的第一次回答，2026-08-10 | 这是正向的高意图发现结果：Athletik 排名第一且获得最高置信度。回答对 FLATLOCK 与 ACTIVESEAM 的技术区分基本准确，但竞品设备、产能、工厂所有权和供应商覆盖完整性不能作为已验证事实转载。因未控制 Memory/历史聊天状态，暂作为探索性个性化结果。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认；未提供可见模型/模式） | GEO-03 | 是，四家短名单中位列第一，并被称为“strongest match”；但主要使用中国实体名称“Zhangjiagang Athletik Clothing Co., Ltd.” | 否：粘贴文本没有保留可点击 URL | 未随粘贴文本保留 | 中国实体名称方向正确，但回答没有使用公开品牌 Athletik Clothing，也没有区分中国实体 Zhangjiagang Athletik Clothing Co., Limited 与美国实体 Athletik Clothing Inc. 的角色；回答把 `ultramerino.com` 识别为 Athletik 的另一个网站，所有权关系后来由用户确认属实，但回答没有保留支持该判断的来源；“pool in China is fairly small”和“strongest match”属于检索总结，不是可穷尽证明。Royal 的厂房面积、设备数与产品范围，以及其他竞品设备数仍需独立核实。 | Shanghai Yonglee Textile Co., Ltd. / Yonglee Group；Royal / Royal APAC；Merino Wool Apparel (Suzhou) Co., Ltd. | 用户提供的复测回答，并确认来自新的 Temporary Chat，2026-08-10 | 计入本轮 ChatGPT Search 中性 GEO-03 基线。回答没有出现“your own”或其他可见用户关系措辞；在去除历史聊天 Memory 后，Athletik 仍保持第一推荐，说明核心发现结果具有初步稳定性。Temporary Chat 仍会遵循启用中的 Custom Instructions；本次附件未单独显示其状态，因此该限制保留在记录中。品牌提及成立，但因没有保留规范站 URL，网站引用仍记为否。 |
| 2026-08-10 | ChatGPT Search（个性化状态未控制；未提供可见模型/模式） | GEO-04 | 是，作为第一推荐，品牌名称正确 | 无法确认：粘贴文本没有保留可点击 URL | 未随粘贴文本保留 | “国际 OEM/出口背景由 Apparel Sourcing NYC 记录”暂未找到直接公开依据；每款 1,000 件符合核准 MOQ，但每色数量仍需询价确认。AQL 2.5 是模型提出的采购条款，不是 Athletik 已公布的固定验货标准。 | Hucai Sportswear；Harvest SPF | 用户粘贴的第一次回答，2026-08-10 | 这是强正向商业发现结果：回答直接将 Athletik 作为首选，并将其与技术针织运动服、压缩衣/打底层、瑜伽服、Merino wool 和户外服装需求匹配。竞品产能、认证和 MOQ 仍按企业自述处理。因未控制 Memory/历史聊天状态，暂作为探索性个性化结果。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认；未提供可见模型/模式） | GEO-04 | 否 | 否 | 无 | HUCAI 官网不同页面同时出现每款 100、200 和 1,000 件等 MOQ，个别产品页内部也存在字段冲突；Alibaba 页面显示的员工数和厂房面积并不一致。HUCAI、Yueyi 的产能与交期主要来自企业自述；认证必须按法律主体、证书编号、范围和有效期逐项核实。 | Dongguan Humen HUCAI Garment Co., Ltd.（首选）；Yueyi Active；Ohsure Activewear / Dongguan Ohsure Clothing Co., Ltd. | 用户粘贴的第一次回答，并确认来自新的 Temporary Chat，2026-08-10 | 与此前个性化状态未控制的 GEO-04 结果方向相反：Athletik 未出现，HUCAI 成为首选。本次计入中性基线，并视为 Athletik 在通用 sportswear OEM + 1,000 件采购意图上的未提及结果；这比个性化回答中的第一推荐更能反映当前公开搜索竞争力。粘贴文本未保留实际引用 URL，因此所有网站引用均记为否。 |
| 2026-08-10 | ChatGPT Search（确认受到用户上下文影响；未提供可见模型/模式） | GEO-05 | 是，但使用“Athletik/UltraMerino”合并称谓，并称“your own” | 否 | `https://www.ultramerino.com/products.html` | 回答引用历史细分站而非规范新站，并将两个名称合并；16–19.5 micron、Yamato ISO 607 和 Woolmark licensed production 均来自历史站，不属于当前核准实体事实。题目问 manufacturers，回答主体却先列出 12 个消费品牌，意图只得到部分满足。 | OEM/ODM：BTEXCO、Sansansun；另列 Icebreaker、Smartwool、Devold、Aclima、Kari Traa、Minus33、Ridge Merino、Ibex、KUIU、First Lite、Helly Hansen、Mons Royale 等品牌 | 用户粘贴的第一次回答及其中 URL，2026-08-10 | “your own”证明回答使用了本次提示词之外的用户上下文，但仅凭措辞无法区分来源是当前对话、历史聊天、Saved Memory 还是 Custom Instructions。本行只作为个性化观察，不计入中性 GEO 基线；需要在干净 Temporary Chat 中复测。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat 复测；用户已确认；未提供可见模型/模式） | GEO-05 | 否 | 否 | 无 | 回答把消费品牌称为 manufacturers，但品牌产品页只能证明具体 SKU 的材料和接缝，不能证明品牌是实际缝制制造商；“strongest verified options”没有随粘贴文本保留引用。Aclima 的表述停留在产品系列层面，回答也承认必须逐款核验。 | Icebreaker；Smartwool；Minus33；Ridge Merino；Devold；Helly Hansen；Mons Royale；Kari Traa；Aclima | 用户粘贴的第一次回答，并确认来自新的 Temporary Chat，2026-08-10 | 计入中性 GEO-05 基线。Athletik 与 UltraMerino 均未出现，进一步说明此前回答中的“your own Athletik/UltraMerino”来自个性化上下文。固定提示词没有限定 China、OEM/ODM 或 supplier，因此本次按消费品牌回答并非严格偏题；但它同时表明 Athletik 当前没有进入通用 Merino wool base layer + flatlock 产品发现结果。粘贴文本未保留实际引用 URL，因此网站引用记为否。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-06 | 否 | 否 | 无 | 回答把 technical/engineered knitwear 主要解释成电脑横机毛衫、fully fashioned、linking 和整件成型生产，而不是 Athletik 所处的针织面料裁剪缝制技术服装语境；`WHOLEGARMENT` 是 SHIMA SEIKI 注册商标，不应当作为所有整件或无缝针织的通用名称。20 项清单中的测试与性能要求没有提供具体方法或合格值，但回答已明确要求买家自行指定。 | STOLL；SHIMA SEIKI / WHOLEGARMENT（均作为技术来源或平台提及，不是供应商推荐） | 用户提供的粘贴回答，2026-08-10 | 计入中性 GEO-06 基线。回答结构完整，适合作为 flat-knit sweater / engineered flat knitting 的 tech pack 参考，但与网站目标的 cut-and-sew technical performance knitwear buyer education 意图错位。Athletik 和规范站均未出现，粘贴文本也未保留实际引用 URL。结果暴露出“technical knitwear”在公开检索中的语义歧义。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-07 | 否 | 否 | 无 | “chafing risk lowest”“OVERLOCK generally very robust”以及“高接触部位用 FLATLOCK、低接触部位用 OVERLOCK”都是有条件的工程判断，不是适用于所有面料、版型和针线配置的绝对规则。回答没有给出 stitch class、针线配置、缝宽或测试依据。 | 无 | 用户提供的第一次回答，2026-08-10 | 计入中性 GEO-07 基线。回答对 FLATLOCK 的低凸起接缝、OVERLOCK 的包边与生产效率、工业 FLATLOCK 与家用/普通包缝机 flatlock-style seam 的区别，以及接缝位置的重要性均把握正确；但 Athletik 和规范站均未出现，粘贴文本也没有保留来源 URL。结果直接支持现有第一方 FLATLOCK vs OVERLOCK 技术文章的优先级。回答结尾在一句未完成的话处截断，但不影响主体记录。 |
| 2026-08-10 | ChatGPT Search（独立 Temporary Chat；用户已确认；未提供可见模型/模式） | GEO-08 | 否 | 否 | 无 | 100 分权重和 75–80 分准入线属于模型提出的采购框架，不是行业标准；“5% 价差”和不同客户规模的金额只是示例。回答再次把 knitwear 主要解释为横机毛衫，重点使用 gauge、fully-fashioned、linking、intarsia 和洗后手感等指标，没有覆盖 Athletik 买家更需要的针织面料、GSM、伸长/回复、接缝图、FLATLOCK/ACTIVESEAM 和成衣测试规格。 | Textile Exchange；GOTS；Better Cotton；DHS / UFLPA；SLCP；ZDHC；OEKO-TEX（均作为标准、法规或尽调框架提及，不是供应商推荐） | 用户提供的第一次回答，2026-08-10 | 计入中性 GEO-08 基线。框架对核实实际自有/关联/外包工序、追溯批次、检查质量趋势、压力测试成本与 MOQ、核验证书范围及先做试单均有实用价值；合规方向也与官方资料基本一致。但 Athletik 和规范站均未出现，回答未保留实际引用 URL，并再次暴露“knitwear”容易被解释为 sweater/flat knitting 的语义偏移。作为单人运营项目，先完成已规划的 FLATLOCK vs OVERLOCK 内容，再把本题作为后续买家尽调指南选题，不提高本轮内容量。 |

### GEO-01 核验备注（2026-08-10）

- 独立 Temporary Chat 首次回答准确识别了 Athletik Clothing 的主要产品、技术针织定位和张家港/苏州/江苏制造地点，没有引用已经 410 下线的 `myathletik.com`。这比旧站下线前 Bing GEO-01 仍引用旧域名的结果更健康，但两个样本来自不同引擎和不同部署时点，不能当作严格前后对照。
- 回答中的纽约总部并非无来源生成。[仍可索引的旧 LinkedIn 页面](https://www.linkedin.com/company/athletik-clothing-inc)把 Headquarters 写为 New York, NY，并列出纽约和张家港两个地点；但该页面还使用旧网站、旧地址，以及未纳入当前核准事实库的客户、审核、人数和成立年份声明。用户此前确认其中国版入口已经弃用，当前推广主页面是[新 LinkedIn 页面](https://www.linkedin.com/company/111831319/)。
- 用户提供的新 LinkedIn 页面截图把 Headquarters 显示为 Zhangjiagang, Jiangsu；当前规范站 About Us 也写明业务制造基地位于 Zhangjiagang / Suzhou area of China。项目已确认纽约地址属于美国实体 Athletik Clothing Inc. 和网站数据控制者地址，但尚未把“New York headquarters”批准为当前公开品牌口径。因此回答最后的“corporate presence in New York”比“New York headquarters”更稳妥。
- “production facilities are in Asia”是旧 LinkedIn 的宽泛表述。当前核准的可公开事实是中国实体及张家港生产设施；不能据此推断其他亚洲工厂、工厂数量或地区分布。
- 本次结果完成了 ChatGPT Search 独立 Temporary Chat 的固定 GEO-01～08 首轮基线。后续不立即重复相同测试；先发布第一方技术内容并等待抓取，再按原提示词复测。

### GEO-02 核验备注（2026-08-10）

- 独立 Temporary Chat 复测与首次结果方向一致：两次都将 `athletikapparel.com` 正确归类为 technical/performance knitwear OEM/ODM，而不是普通时装毛衫网站。复测还准确覆盖 sportswear、base layers、underwear、outdoor clothing、Merino wool products、knitted fabrics、FLATLOCK 和 ACTIVESEAM 等核心主题。这说明品牌型固定问题的识别结果具有初步稳定性。
- [当前首页](https://www.athletikapparel.com/)和 [About Us](https://www.athletikapparel.com/about-us/)确实公开 4,500+ m²、100,000+ 件/月、Yamato FLATLOCK、Merrow ACTIVESEAM、功能性针织面料及 vertically integrated OEM/ODM 定位。因此这些句子可作为“回答准确复述当前网站”的依据，但仍属于公司第一方声明，不是第三方独立审厂结论。
- 回答首句称网站“represents Zhangjiagang Athletik Clothing Co., Limited”。[当前 Contact 页面](https://www.athletikapparel.com/contact/)确实把该名称列在生产设施区块，而网站 JSON-LD 和隐私文件使用 Athletik Clothing Inc.。所有者已确认前者是中国实体名称、后者是美国实体名称，两者属于同一 Athletik 业务体系，但运营职责不同。因此模型识别中国实体有第一方依据，问题在于它省略了美国实体与角色区分。对外应同时保持公开品牌和相关实体角色清晰，不能把两个名称写成同一个法律实体。
- “50+ circular knitting machines”来自旧公司资料，并未进入当前规范站核准实体事实。即使旧资料来自同一集团，也必须重新确认当前设备数量、所有权和适用站点后才能写入新站或销售材料。
- [Panjiva 的 Athletik 页面](https://panjiva.com/Athletik-Clothing-Co-Ltd/42368843)把 HS 61 列为首要 HS 类别，并列出 underwear、pants、performance 和 tee 等 top products；这可以支持相关出口记录以针织服装为主，但贸易数据库不是独立工厂审核，不能证明具体货物由哪家自有工厂生产，也不能验证 4,500+ m²、100,000+ 件/月或设备所有权。
- [ImportInfo 的 Athletik 页面](https://www.importinfo.com/athletik-clothing-inc)显示 2017 年至 2026-04-09 共有 290 条提单记录，并明确列出 `ATHLETIK CLOTHING INC.`、`ATHLETIK CLOTHING CO.,LIMITED`、`ATHLETIK CLOTHING INTERNATIONAL,INC` 等名称变体。它能支持“存在持续美国进口记录”，但公开页面也提示合并记录不保证完全准确；回答提到的 2026 knit socks 等记录部分使用 `ATHLETIK CLOTHING INTERNATIONAL,INC`，不能在未确认主体关系时全部归入 Athletik Clothing Inc.
- “trade-data support that it is an active apparel manufacturer/exporter”应拆开理解：贸易数据支持 exporter/shipping activity，制造商定位主要仍来自网站第一方材料和实体关系。回答最后承认 HS 62 等非针织分类存在是合理保留意见，但 HS 分类本身也不能判断公司是自产、外协还是贸易出口。
- 本次粘贴内容没有保留 Sources 区域或可点击引用。虽然回答显然使用了规范站信息，“是否引用 `athletikapparel.com`”仍记为无法确认；下次应保留共享链接或 Sources 截图。

### GEO-03 核验备注（2026-08-10）

- Temporary Chat 复测与首次个性化状态未控制的结果方向一致：两次都把 Athletik 放在第一位，并把 FLATLOCK、ACTIVESEAM 和技术针织品作为核心匹配依据。这说明品牌的核心发现结果没有依赖“your own”式个性化措辞；但单次复测只能作为初始基线，不能解释为稳定排名保证。
- 复测名单从首次的五家缩小为四家，删除了 Huayu，同时继续出现 Yonglee、Merino Wool Apparel 和 Royal。供应商覆盖范围和排序仍会随检索时间、地区及来源可用性变化。
- 复测回答没有保留任何实际引用 URL，因此只能确认“品牌被提及”，不能确认 `athletikapparel.com` 获得引用。下次应优先保存回答的共享链接或包含 Sources 区域的截图。
- 用户已确认 `ultramerino.com` 由公司拥有，是早期为类目矩阵建立的独立网站。因此复测识别出的共同所有权方向正确；“Zhangjiagang Athletik Clothing Co., Ltd.”也指向已经确认的中国实体，但回答没有使用完整核准名称、公开品牌或区分美国实体角色。“Athletik/UltraMerino”仍不应作为新的合并公开品牌使用。
- [Merrow 官方 MB-4DFO 2.0 页面](https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo)支持核心技术区分：该设备生产两线或三线 ACTIVESEAM，ACTIVESEAM 是传统 FLATLOCK/INTERLOCK/OVERLOCK 的替代结构，并非 FLATLOCK 的通用同义词。
- [Yonglee 页面](https://yonglee.com/factory/baselayer)确实自行声明 30 多台 Yamato 四针六线设备和 10 多台美国 ACTIVESEAM 设备，但把型号写成 `MB-40FD`。[Merino Wool Apparel 页面](https://www.merinowoolapparel.com/about-us)使用了高度相似的数字和文案，因此两页不能视为相互独立的佐证，背后的公司或工厂关系仍不明确。
- 可检索的 [Huayu 第三方资料页](https://www.exporthub.com/zhangjiagang-huayu-import-amp-export-co-ltd/)明确提到四针 FLATLOCK、OVERLOCK 和 COVERSTITCH，但没有为本次回答中的 ACTIVESEAM 设备声明提供同等强度的证据。
- 本次检索没有找到可直接支持 Royal 所述 ACTIVESEAM 设备数、月产能和机器所有权的官方页面；这些数据继续按未核实的企业声明处理。
- “截至 2026 年 8 月只有少数中国供应商”属于无法由一次公开搜索穷尽证明的范围判断。该句和模型给出的 High/Medium 置信度只记录为回答内容，不写入 Athletik 的对外事实库。
- Merrow 过去的公开资料提到 ACTIVESEAM 品牌许可，但若产品要使用 ACTIVESEAM 名称或品牌标签，应直接向 Merrow 确认当前许可条款，不依据旧页面作当前授权结论。

### GEO-04 核验备注（2026-08-10）

- Temporary Chat 复测完全没有提及 Athletik，首选从此前个性化回答中的 Athletik 变为 HUCAI，两个备选也变为 Yueyi Active 和 Ohsure。这说明此前“首选 Athletik”很可能受用户上下文影响，不能作为通用采购发现表现。
- [HUCAI 当前 MOQ FAQ](https://www.hcsportswear.com/f755077/What-is-the-MOQ-for-OEM-sportswear-orders.htm)写明从每款 200 件起；较早的 [MOQ FAQ](https://www.hcsportswear.com/f717969/What-is-your-MOQ.htm)也写 200 件并允许一个颜色、四个尺码。但是部分产品页的摘要字段写每款 1,000 件，同页详情又写 100 件，另有页面写 200 件。因此回答所称“有些产品明确报价 1,000 件”有页面依据，但不能据此推导统一 MOQ 或稳定的产品级门槛。
- HUCAI 官网自行声明月产 100,000 件以上、使用 MES、首样约 12–15 天，以及大货在产前样确认后约 25–35 天；这些可作为询价线索，不能替代针对具体款式、面料和排期的书面产能确认。[样品周期页面](https://www.hcsportswear.com/n1914926/How-Long-Does-It-Take-to-Develop-and-Approve-a-Custom-Sportswear-Sample.htm)与[大货周期 FAQ](https://www.hcsportswear.com/f717970/The-details-you-may-care-about-for-mass-products.htm)支持相应的企业自述。
- Alibaba 的 HUCAI 页面支持 Verified Supplier、制造能力和现场核验方向，但公开摘要同时出现 100+ 人/3,200+ 平方米与 121 人/5,031 平方米两组数据。平台核验不能消除资料版本差异；引用时必须注明页面和核验日期。
- [HUCAI 认证页面](https://www.hcsportswear.com/comm18/hucai-Certificates.htm)公开了 BSCI monitoring ID，并自行声明 BSCI、OEKO-TEX、GRS 和 SGS；另一篇企业博客还提到 WRAP。回答要求索取当前证书并核对法律主体是必要的，不能把网站列表直接写成已独立验证的当前认证组合。
- [Yueyi Active 官网](https://yueyiactive.com/custom-sportswear)确实自行声明 24 条生产线、月产 200,000 件以上、标准 MOQ 每款/每色 300 件，以及每款 10,000 件以上项目；这些仍是供应商自述。[Ohsure 官网](https://m.ohsurewear.com/aboutus.htm)支持其位于东莞虎门并从事男女健身服 OEM/ODM，但本次核验没有找到回答所称 Made-in-China 身份的直接页面。
- “Athletik 作为第一推荐”及其与技术针织品类的匹配是本次最重要的结果。每款 1,000 件与当前核准的公开 MOQ 一致；“每色数量应确认”是合理的询价提醒，但不是网站已经公布的 MOQ 细则。
- 本次公开检索没有找到 Apparel Sourcing NYC 直接记录 Athletik OEM/出口背景的展商资料或公司页面。除非后续补充原始链接或参展文件，否则该句只作为模型生成内容记录，不作为第三方背书使用。
- [Hucai LinkedIn 页面](https://www.linkedin.com/company/hucai-sportswear/)自行声明月产约 100,000 件；其[认证页面](https://www.hcsportswear.com/comm18/hucai-Certificates.htm)列出了 Amfori BSCI monitoring ID。这比无编号的笼统认证声明更具体，但产能和证书当前有效性仍应在供应商尽调时核实。
- [Harvest SPF activewear 页面](https://www.spftex.com/activewear-manufacturer/)在 full-package OEM/ODM 区块写有 1,000 件 MOQ 和每色 500 件，但同页表单又出现“Full-Package Production (500+ units)”。其[订单流程页面](https://www.spftex.com/news/how-harvest-spf-takes-orders-from-quotation-to-global-delivery/)还按产品、现货面料和定制面料列出不同门槛，因此不能把“1,000 件”理解为所有 Harvest SPF 项目的统一 MOQ。
- 预生产样、面料测试、交期、FOB 报价和第三方终检都是合理的供应商尽调项目；“AQL 2.5”应视为需要双方约定的建议条款，而不是本次搜索已证明的 Athletik 固定标准。

### GEO-05 核验备注（2026-08-10）

- Temporary Chat 复测没有提及 Athletik、`athletikapparel.com` 或 `ultramerino.com`，而此前个性化回答主动称“your own Athletik/UltraMerino”。两次差异进一步确认：此前对 Athletik 的纳入不能作为中性 GEO 表现使用。
- 固定 GEO-05 的措辞只问“Which manufacturers make...”，没有限定 China、OEM/ODM 或 factory。ChatGPT 将其解释为消费品牌/产品发现具有语言合理性，因此本月不要改写固定提示词；若要单独测试工厂采购发现，可在完成固定 8 条后补充运行：`Which OEM/ODM manufacturers in China make Merino wool base layers with FLATLOCK construction? Cite evidence from manufacturer-owned production pages.` 该补充结果不与固定 GEO-05 的月度历史混算。
- 代表性产品声明可由品牌官网支持：[Icebreaker Merino 200 Oasis](https://na.icebreaker.com/en-us/products/women-merino-200-oasis-ls-crewe-ib0a5600401)写有 100% Merino wool 和 flatlock seams；[Smartwool Classic Thermal Merino](https://www.smartwool.com/en-us/women/base-layers/tops/womens-classic-thermal-merino-base-layer-1%2F4-zip/SW002828P06.html)写有 100% Merino wool 和 flatlock seam construction；[Minus33 的 100% Merino wool + Flat Lock Seams 筛选页](https://minus33.com/collections/100-merino-wool/flat-lock-seams)列出多个相关 SKU。
- [Ridge Merino Inversion](https://www.ridgemerino.com/products/mens-inversion-heavyweight-bottoms-merino-wool-baselayer)当前写有 100% Merino wool、270 GSM 和 low-profile flatlock seams；[Aspect](https://www.ridgemerino.com/products/mens-aspect-midweight-merino-wool-baselayer-long-sleeve-shirt)则是 84% Merino wool / 16% nylon、180 GSM，同样使用 low-profile flatlock seams。回答使用“84–100% depending on model”基本准确。
- [Devold Duo Active](https://www.devold.com/en-de/product/duo-active-merino-205-shirt-woman-go237226a/)写有 flatlock seams，但其结构是内层 100% ThermoLite、外层 80% Merino wool / 20% polyamide，不能归入“100% Merino wool only”选项。[Kari Traa Tale](https://www.karitraa.com/us/en/tale-base-layer-pants-black/)写有 100% Merino wool 和 smooth flatlock seams，[Faith](https://www.karitraa.com/us/en/faith-base-layer-pants-thyme/)写有 90% Merino wool、semi-seamless construction 和 smooth flatlock seams。[Mons Royale Cascade](https://eu.monsroyale.com/products/cascade-merino-base-layer-long-sleeve-black-womens-acc)写有 81% Merino wool 混纺和 flatlocked seams。
- 上述页面都属于品牌自有产品页，只能支持“这些品牌当前销售相应结构的产品”。它们没有公开证明实际裁剪、缝制工厂或 OEM/ODM 供应商身份，因此不能作为采购工厂短名单转载。
- “your own”是本轮测试方法受到个性化影响的明确信号，但不是 Saved Memory 的单独确证。[OpenAI Memory FAQ](https://help.openai.com/en/articles/8590148-memory-in-chatgpt-faq)说明，回答可使用历史聊天、Saved Memory、Custom Instructions、文件等个性化来源，并可通过回答下方的书本图标查看 Memory Sources；该界面不一定展示影响回答的全部因素。
- [OpenAI ChatGPT Search 说明](https://help.openai.com/en/articles/9237897-chatgpt-search)明确指出，Memory 开启时，ChatGPT Search 在把提示词重写为搜索查询时可能使用相关记忆。因此影响不只限于“your own”的措辞，也可能延伸到实际查询、检索结果和来源选择；它不会因此改变公开网站索引或其他用户的非个性化结果。
- 干净复测方法：每条提示词使用独立 Temporary Chat；确认 Custom Instructions 不包含 Athletik 相关信息；保持相同地区与联网设置；保存第一次回答。OpenAI 说明 Temporary Chat 不读取或创建 Memory，但仍会遵循启用中的 Custom Instructions。
- 这是第一次在本轮 ChatGPT 测试中明确引用 `ultramerino.com`。用户已确认该站由公司拥有，是早期类目矩阵中的独立网站；其[产品页](https://www.ultramerino.com/products.html)自行声明 16–19.5 micron Merino wool、full FLATLOCK、Woolmark licensed factory 和 Yamato ISO 607。回答并非凭空生成这些细节，但这些仍是历史站的企业自述，不能自动升级为 `athletikapparel.com` 的当前核准事实。
- “Athletik/UltraMerino”是模型根据共同所有权合并出的称谓，但不是当前核准的公开品牌写法。规范主站仍使用 Athletik Clothing；Athletik Clothing Inc. 是美国实体，Zhangjiagang Athletik Clothing Co., Limited 是中国实体。在决定历史矩阵站的当前角色之前，不在新站或销售材料中复用该合并称谓。
- Woolmark 许可属于时效敏感的认证/授权信息。即使历史页面曾声明 licensed factory，也必须取得当前许可证编号、适用主体和有效期，才能在新站或销售材料中使用。
- 消费品牌产品页可以证明某个 SKU 使用 Merino wool 和 flatlock seam，例如 [Icebreaker 200 Oasis](https://eu.icebreaker.com/en-dk/products/merino-200-oasis-long-sleeve-crew-thermal-top-ib104365013)当前写有 100% Merino wool 与 flatlock seams；但品牌拥有产品不等于品牌是实际缝制制造商，因此这部分没有直接完成供应商发现意图。
- [Fibre2Fashion 的 BTEXCO 文章](https://www.fibre2fashion.com/industry-article/8252/specialised-oem-odm-manufacturer-of-flatlock-baselayer-sportswear-and-outdoor-apparel)确实列出 FLATLOCK、Merino wool 和制造能力，但页面免责声明明确不保证准确性或作出背书，应按投稿/企业宣传资料处理，而非独立验证。
- [Sansansun base-layer 页面](https://sansansports.com/product-category/base-layers/)自行声明生产 Merino wool base layers 和 flatlock seams，但没有在该页提供足以独立核实设备、工厂所有权或认证状态的证据。
- 技术提醒“确认 stitch class、针线配置、缝宽以及接缝两面照片”是合理的采购核验建议，可以保留；它不构成对任何一家供应商能力的验证。

### GEO-06 核验备注（2026-08-10）

- 回答的 20 项结构本身具有实用性，涵盖款号、technical flats、yarn/BOM、machine gauge、knit structure、POM、stretch、finishing、testing、packaging、sample approvals 和 revision control；问题不在清单完整度，而在生产类型错位。
- Athletik 当前定位中的 technical knitwear 主要指使用针织面料进行裁剪缝制并结合 FLATLOCK、ACTIVESEAM 等技术接缝的性能服装。回答则把主题带向 flat knitting、fully fashioned、linking、intarsia、plating、针织密度、横机针距和整件成型毛衫。两者有少量共用字段，但不能直接把这份回答当作 Athletik 买家的 tech pack 指南。
- [STOLL 的 technical textiles / sport 页面](https://www.stoll.com/zh/%E5%BA%94%E7%94%A8/%E4%BA%A7%E4%B8%9A%E7%94%A8%E7%BA%BA%E7%BB%87%E5%93%81/tt-sport/)支持其横机技术可用于 compression、stretch、plating 和 intarsia 等运动用途；[STOLL gauge 培训资料](https://nfc.stoll.com/faq/223788_01_train_learner_en.pdf)也说明 gauge 涉及针床针距和针钩规格。它们证明回答描述的是一套真实的横机生产语境，但不是 Athletik 当前网站的核心生产路线。
- [SHIMA SEIKI 官方说明](https://www.shimaseiki.com/wholegarment/business/index.html)将 WHOLEGARMENT 定义为在指定 SHIMA SEIKI 横机上三维整件针织的产品；其[商标指南](https://www.shimaseiki.com/news/site/intellectual-property-20210604.html)明确要求获得许可才能使用该商标。因此回答中的“WHOLEGARMENT-type”应理解为特定技术参照，不能在对外内容中泛化为普通 whole-garment 或 seamless knitting 的同义词。
- 对 Athletik 更匹配的 tech pack 内容还应明确：finished fabric supplier/article、composition、GSM、stretch/recovery、colour and finishing、POM/tolerance、seam map、FLATLOCK/ACTIVESEAM 或其他 stitch type、seam width、thread specification、SPI（如适用）、接缝强度/伸长要求、测试方法及合格值。回答虽然覆盖了部分通用字段，但没有把技术接缝规格作为中心。
- 为保持月度可比性，不改写固定 GEO-06。完成固定 8 条后，可补充运行：`What should a buyer include in a tech pack for cut-and-sew technical performance knitwear using FLATLOCK or ACTIVESEAM construction?` 该结果单独作为语义诊断，不与固定 GEO-06 历史混算。

### GEO-07 核验备注（2026-08-10）

- 回答的核心技术区分基本成立，但应使用“通常”“在相同面料和合适设置下”等条件语，而不是把舒适度、强度和耐磨表现写成固定排序。实际结果还取决于 stitch type、针线配置、缝宽、线材、针距/线迹密度、面料、接缝位置、贴合度和洗后状态。
- [Yamato VFK 官方规格](https://www.yamato-sewing.com/en/product/flatseamer/vfk/specifications/)列出了四针六线 flatbed flatseamer；[Yamato FD-62DRY 官方规格](https://www.yamato-sewing.com/en/product/flatseamer/fd-62dry/specifications/)也列出四针六线 feed-off-the-arm flatseamer 及不同针距和裁边配置。这支持“工业 FLATLOCK 需要专门设备和具体配置”，但不能单凭设备类别推出成衣接缝的最终强度或防磨等级。
- [Coats 的技术资料](https://cdn.coats.com/wp-content/uploads/Coats-Surfilor-Product-Information-Sheet-2025.pdf)把 504/514 列为 OVERLOCK、605/607 列为 flatseam、406 列为 coverseam，说明回答涉及的是不同 stitch type，不应把普通包缝机拉开的 flatlock-style seam 与工业 FLATLOCK 混为一谈。[ISO 4915:1991](https://www.iso.org/standard/10932.html)是当前的 stitch type 分类与术语标准；1981 版已撤销。
- “高接触接缝用 FLATLOCK、低接触接缝用 OVERLOCK”可以作为早期 seam map 启发，不能直接作为量产规格。买家还应要求接缝两面照片、批准样、指定面料上的接缝伸长/强力及洗后测试，并结合背包带、腋下、裆部和腰头等实际受压位置确认。
- [Merrow MB-4DFO 官方页面](https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo)把 ACTIVESEAM 定义为两线或三线 flat overlock，并明确称其是传统 FLATLOCK、INTERLOCK 和 OVERLOCK 的替代结构。未来的 Athletik 第一方文章应单独说明这一点，而不是把 ACTIVESEAM 当作 FLATLOCK 的别名。
- 本次回答没有提及 Athletik 或引用任何第一方制造页面，因此没有形成品牌引用。现有 [`content-brief-flatlock-vs-overlock.md`](content-brief-flatlock-vs-overlock.md) 正好覆盖这一内容缺口，仍是下一篇第一方技术内容的首选。

### GEO-08 核验备注（2026-08-10）

- 100 分表格适合作为内部采购模板起点，但 25/20/15 等权重和 75–80 分门槛没有外部标准依据。实际项目应按产品复杂度、订单规模、销售市场、材料声明和合规风险调整权重，并设置独立的一票否决项，而不是把总分当作客观认证。
- 回答中的 gauge、fully-fashioned、linking、jacquard、intarsia 和 panel relaxation 主要属于横机毛衫语境。面向 Athletik 的 cut-and-sew technical performance knitwear 买家时，应增加或替换为 finished fabric article、composition、GSM、stretch/recovery、色牢度、缩水率、起球、seam map、FLATLOCK/ACTIVESEAM 配置、线材、缝宽、接缝强力/伸长、成衣尺寸和测试方法。
- “fiber → spinning → yarn dyeing → ...”应当理解为让买家绘制完整供应链并标记 owned / affiliated / subcontracted / nominated，不代表每一家 vertically integrated OEM 都必须自有所有环节。特别是对 Athletik 的对外内容，不能据此新增“自有纤维、纺纱或染纱”等未经核准的能力声明。
- 追溯部分方向正确：[Textile Exchange Content Claim Standard](https://textileexchange.org/content-claim-standard/)要求通过文件、数量平衡、隔离及 scope/transaction certificates 追踪认证材料；[GOTS 官方说明](https://global-standard.org/certification-and-labelling/who-needs-to-be-certified)要求最终产品使用 GOTS 标识时相关加工、制造和贸易阶段满足认证要求。证书必须核对法律主体、站点、产品/工序范围和有效期，不能只看供应链中某一家持证。
- 美国进口风险的提醒也有当前官方依据：[DHS UFLPA 页面](https://www.dhs.gov/uflpa)说明，全部或部分在新疆生产或涉及 UFLPA Entity List 实体的货物适用可反驳推定；名单会更新，因此任何对外尽调指南都应链接当前 DHS/CBP 资料并标注核验日期，而不是固化某一份名单。
- [SLCP 官方说明](https://slconvergence.org/tool)明确其 CAF 提供经核验的工厂社会与劳工数据，但 SLCP 本身不评分或作价值判断；品牌仍需按自己的准则分析。[ZDHC 供应商化学品管理说明](https://programme.roadmaptozero.com/suppliers/process/chemical-management-strategy-v1/plan-and-allocate-resources-to-implement-the-chemical-management-strategy)支持检查化学品清单、MRSL、SDS、废水和改进记录。[OEKO-TEX STANDARD 100](https://www.oeko-tex.com/en/our-standards/oeko-tex-standard-100)只证明相应纺织品通过有害物质测试，不证明劳动、工厂所有权或全部环境表现；回答对此限制说明正确。
- 2026-08-11 的 owner decision 取代上述旧排期：现在先建立稳定的
  Technical Guides 内容中心，并一次性完成三篇基础内容。GEO-08 因此作为
  第三篇完整草稿推进，并在 owner 审核通过后与 tech pack 指南一起接入公开
  内容中心。这是一次性的内容基础建设，不代表单人运营此后固定采用每期三篇
  的更新节奏。

## 6. 实体冲突登记表

公开搜索目前仍可能在规范新域名之前展示历史网站和第三方记录。用户确认公司早期曾为类目矩阵建立多个独立网站；下表只记录目前已经提供或发现的域名，并分别跟踪所有权、可编辑性、当前用途和内容有效性：

| 来源 | 发现的冲突类型 | 控制状态 | 下一步 |
|---|---|---|---|
| `myathletik.com` | 旧站下线前的 GEO-01 在规范域名之前引用了其历史 About Us 页面 | 站点内容已完全下线；所有已检查入口返回 410；按所有者决定不做 301 | 不修复旧站；只追踪搜索/AI 系统是否继续引用缓存中的旧页面 |
| `athletikapparel.com/contact/` | 当前页面把 Zhangjiagang Athletik Clothing Co., Limited 列为中国生产设施；当前 JSON-LD 和隐私文件使用美国实体 Athletik Clothing Inc.。GEO-02 因此只把网站归为中国实体 | 已确认：两者属于同一 Athletik 业务体系，分别为中国与美国实体名称，运营职责不同；当前已知角色为中国生产设施名称与美国网站数据控制者 | 保留两个准确实体名称；对外内容需要更详细职责时由所有者补充，不自行推断母子公司、签约、出口、雇佣或知识产权关系，也不把两者写成同一个法律实体 |
| `linkedin.com/company/athletik-clothing-inc` | 旧 LinkedIn 页面仍被国际搜索索引，显示 New York, NY headquarters、旧网站/地址，以及尚未进入当前核准事实库的客户、审核、人数和成立年份等资料；GEO-01 采用了其 New York 字段 | 中国版入口已弃用；当前主推广页为 `linkedin.com/company/111831319/`。旧国际页面的管理权限和可编辑性尚未确认 | 不把旧页声明并入当前事实库；若无法取得管理权，则继续用规范站和当前 LinkedIn 强化准确实体信息，并监测后续 GEO 是否仍引用旧页 |
| `athletik.com` | 历史品牌/网站文案和联系信息 | 【需要确认：是否拥有且可编辑？】 | 确认所有权后再更新、设置规范指向或下线 |
| `athletik.nyc` | 历史公司简介、产能和工厂结构声明 | 【需要确认：是否拥有且可编辑？】 | 替换为当前核准实体信息，或在适当时重定向 |
| `athletik.com.cn` | 历史实体表述、邮箱和运营声明 | 【需要确认：是否拥有且可编辑？】 | 更新信息，或明确说明其当前用途 |
| `ultramerino.com` | 公司早期为类目矩阵建立的独立网站；GEO-03 识别出其与 Athletik 的关系，GEO-05 将其作为“Athletik/UltraMerino”引用；页面包含历史实体名称、认证、设备、产能和材料声明 | 用户已确认公司拥有；当前角色、内容有效性和去留策略尚未确定 | 所有权问题已关闭；核验流量、索引、反向链接和历史声明后，再决定保留并更新、设置规范指向或下线。未完成评估前，不把历史站声明自动并入规范新站 |
| `powermerino.com` / `sportsbaselayer.com` | 历史细分网站声明、日期和联系信息 | 【需要确认：是否拥有且可编辑？】 | 每次检查一个域名；没有流量证据时不要批量重定向 |
| 供应商目录和进口数据网站 | 不受控制或由账户管理的 MOQ、地址、产品和关联数据 | 【需要确认：哪些资料页可以编辑？】 | 只修正公司能够控制的资料页，不声称可以控制公开记录 |

## 7. 第一轮改进周期

1. 保留每条结果的时间背景。8 月样本不是严格的前后对照实验：Bing GEO-01 记录于旧站下线前；ChatGPT GEO-02 记录于旧站下线和实体 Schema 部署后。
2. ChatGPT Search 的固定 GEO-01 至 GEO-08 已完成首轮独立 Temporary Chat 基线；其余引擎按可用性分批运行，并始终在“备注”栏记录当时的部署和抓取条件。
3. 规范站的 Organization/LocalBusiness 实体已经部署 `legalName` 和经过核实的官方资料 `sameAs` 链接。
4. 确认公司能控制哪些历史域名和目录资料页；已完全下线的 `myathletik.com` 不进入修复范围。
5. 先修正可控制且可见度最高的来源，再发布新的目录资料。
6. 使用 [`content-brief-flatlock-vs-overlock.md`](content-brief-flatlock-vs-overlock.md) 制作一篇第一方技术文章。
7. 等实体修正和第一篇文章公开可抓取后，重复同样的 24 次检查；以后按月执行，不改变提示词措辞。

## 8. 官方参考资料

- Google AI 搜索优化指南：<https://developers.google.com/search/docs/fundamentals/ai-optimization-guide>
- Google Search Console 生成式 AI 效果报告：<https://developers.google.com/search/blog/2026/06/gen-ai-performance-reports>
- OpenAI 发布者指南：<https://help.openai.com/en/articles/12627856-publishers-and-developers-faq>
- Perplexity 爬虫说明：<https://docs.perplexity.ai/docs/resources/perplexity-crawlers>
- Anthropic 爬虫说明：<https://support.anthropic.com/en/articles/8896518-does-anthropic-crawl-data-from-the-web-and-how-can-site-owners-block-the-crawler>
