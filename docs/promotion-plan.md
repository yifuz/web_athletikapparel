# Athletik Clothing 网站推广计划

> 网站：<https://www.athletikapparel.com/>
> 版本：1.4
> 创建日期：2026-08-03
> 文档对齐日期：2026-08-07
> 规划周期：首个 90 天
> 当前状态：网站、隐私、测试归因与转化链路已完成；Google 搜索广告与 Instagram 付费推广均已上线；真实广告点击和首个 30 天基线仍待验证；多渠道矩阵已按单人保守产能对齐，详见 `promotion-matrix.md`
> 首轮媒体预算：Google 每月 RMB 500–1,000（已确认）；Instagram/Meta 每日 RMB 50–100 在投（单独预算线）
> 首轮目标市场：原计划美国；实际投放美国和加拿大
> 首轮投放品类：Sportswear Manufacturer（已确认）

使用本计划时，请同时参考 `AGENTS.md`、`docs/progress.md`、
`docs/sitemap.md` 和 `seo.md`。本文件用于规划推广、数据归因、询盘筛选
和渠道运营，不授权发布未经确认的客户名称、认证、产能、工厂数量等信息，
也不授权更改已被索引的 URL。

---

## 1. 推广目标

为技术针织服装制造业务建立一套可持续、可追踪、可重复的 B2B 合格询盘
获取系统。流量、点击、曝光和普通表单提交只是辅助指标，不是最终业务成果。

### 核心转化目标

一条合格询盘通常应满足以下大部分条件：

- 产品需求属于 Athletik Clothing 的制造范围。
- 预计数量约为每款 1,000 件或以上。
- 买家来自真实品牌、批发商、进口商或其他合适的 B2B 企业。
- 目标市场和项目需求基本明确。
- 联系方式有效，询盘具有真实商业价值。
- 在可能的情况下提供产品需求、时间计划、企业网站、参考资料、Tech pack
  或 spec sheet。

### 90 天目标

- 建立从首次访问到提交询盘的可靠来源归因。
- 找出能带来合格询盘的市场、产品品类和搜索词。
- 建立初步的合格询盘成本、报价率和销售机会转化率基线。
- 建立付费搜索、目标客户开发、技术内容和销售漏斗复盘的固定周流程。

在获得真实的关键词成本、点击量、询盘质量和销售转化数据之前，本计划不承诺
固定的询盘数量。

---

## 2. 推广执行顺序

推广应按以下顺序进行：

1. 完成数据测量、隐私合规和公开品牌资料清理。
2. 开展高购买意图的 Google 搜索广告。
3. 完成线索记录、退订和目标市场合规流程后，针对匹配企业开展目标客户开发。
4. 持续建设技术 SEO 内容和 LinkedIn 自然内容。
5. 网站形成有效受众后，再开展 LinkedIn 或 Google 再营销。
6. 只扩大能带来合格询盘和真实销售机会的渠道。

前期不要从广泛的 Instagram、Facebook、TikTok、展示广告或 Performance
Max 开始。这些渠道应在转化质量和受众数据建立后再考虑。

2026-08-07 更新：Instagram 付费推广（每日 RMB 50–100）与 YouTube 自然运营
已实际上线，定位为品牌背书渠道，不承担询盘 KPI；询盘获取仍以
Google Search、目标客户开发和 SEO/GEO 为主。多渠道分工、预算线与 GEO
工作流详见 `promotion-matrix.md`。

2026-08-07 单人产能对齐：所有内容频率改为可长期维持的保守基线，不作为产出上限。
有余力时可以增加复用型短内容或少量目标客户开发，但额外产出不自动提高下一周期基线；
执行优先级始终是询盘与跟进、广告与归因、基线内容、目标客户开发、额外内容。

---

## 3. 当前基础

### 已具备的条件

- 12 个核心页面已经上线，并具备正常的技术索引条件。
- 7 个产品分类页可以直接作为对应搜索意图的广告落地页。
- Fluent Forms 表单 3 已收集产品品类、订单数量、客户类型、联系信息和项目需求。
- Google Site Kit 已提供 Google tag。
- 表单提交成功后会通过
  [`assets/js/inquiry-tracking.js`](../assets/js/inquiry-tracking.js)
  发送 GA4 推荐事件 `generate_lead`。
- [`assets/js/attribution-tracking.js`](../assets/js/attribution-tracking.js)
  已通过本地真实浏览器和表单提交验证：记录 UTM、GCLID、首次落地页和原始
  Referrer，并在提交表单 3 时写入 Fluent Forms Entries。
- Search Console、Sitemap、Canonical、H1、Meta Description 和 JSON-LD
  已完成首轮技术 SEO 整改，具体记录见 [`seo.md`](seo.md)。

### 付费推广当前状态（2026-08-07 文档对齐）

- Google Ads 已与 GA4 关联，`generate_lead` 已作为主要转化使用。
- 生产来源归因、Fluent Forms Entry、Tag Assistant、GA4 DebugView 和询盘邮件链路
  已完成验证。
- Cookiebot、WP Consent API、Site Kit Consent Mode、Privacy Policy 和页脚同意入口
  已部署生产。
- 首轮 Google 搜索广告已于 2026-08-05 开启；当前审核/投放状态需要在 Google Ads
  后台实时确认，不能继续把上线时的“审核中”当作当前事实。
- LinkedIn Insight Tag 尚未安装，重复及过时的 LinkedIn 公司资料仍待清理。
- Instagram @athletikclothinginc（约 300 粉丝 / 60 帖）已开始 Meta 付费推广，
  每日 RMB 50–100，定位为品牌背书与形象渠道，询盘为次要目标。
- YouTube @athletikclothinginc 已在运营，作为长视频证明渠道；Shorts 与
  Instagram Reels 复用素材。
- SEO 之外新增 GEO（生成式引擎优化）方向，具体范围、内容格式与月度监测方法见
  `promotion-matrix.md` 第 6 节。

---

## 4. 投放前必须完成的 P0 工作

### 4.1 数据测量与来源归因

- [x] 确认生产环境每次 Fluent Forms 表单 3 成功提交，只产生一次
      `generate_lead` 事件。
- [x] 在 GA4 中将 `generate_lead` 用作线索事件，并在 Google Ads 中设为主要转化。
- [x] 关联 GA4 与 Google Ads；当前同意状态继续由 Site Kit Consent Mode 控制。
- [x] 将网站询盘事件导入 Google Ads，未把 `form_submit` 同时设为主要转化。
- [x] 在网站端为表单 3 注入以下来源字段：
  - [x] `ma_utm_source`
  - [x] `ma_utm_medium`
  - [x] `ma_utm_campaign`
  - [x] `ma_utm_content`
  - [x] `ma_utm_term`
  - [x] `ma_gclid`
  - [x] `ma_first_landing_page`
  - [x] `ma_original_referrer`
- [x] 通过 Fluent Forms 6.2.8 的 `fluentform/insert_response_data` 钩子，
      将白名单来源字段安全保存到 Entries。
- [x] 2026-08-03 在本地提交测试询盘 Entry #2；八个来源字段均同时写入
      Fluent Forms 主响应数据和 Entry Details。
- [x] 使用真实 Chrome 标签页验证 Sportswear 落地页到 Contact 页的跨页归因；
      模拟 Fluent Forms 的 jQuery 和原生双成功信号时，只记录一次 `generate_lead`。
- [x] 2026-08-03 将归因存储接入 WP Consent API `marketing` 类别；自动测试确认：
      拒绝时不写入、允许时写入 UTM/GCLID、撤回时删除存储和表单隐藏字段。
- [x] Cookiebot 配置完成后，已在真实浏览器中复测接受、拒绝和撤回流程；
      广告 tracker 出现后的 Statistics-only 部分同意仍需单独验证。
- [x] 部署到生产环境后，已使用带 UTM 和测试 GCLID 的 URL 提交表单，
      核对 Entries 中的来源数据。
- [ ] 将来源摘要加入销售通知或后续线索记录。
- [ ] 将 WhatsApp 和电子邮件点击记录为辅助诊断事件，不作为核心转化。
- [ ] 建立每周更新线索状态的流程，包括合格、不合格、已报价、打样、成交和流失。
- [ ] 运营流程准备好后，增加以下 GA4 线索阶段事件：
  - [ ] `qualify_lead`
  - [ ] `disqualify_lead`
  - [ ] `working_lead`
  - [ ] `close_convert_lead`
  - [ ] `close_unconvert_lead`
- [ ] 只有在同意管理、客户数据处理和线下线索状态记录准备完成后，才评估
      Enhanced Conversions for Leads。

实现说明：当前归因数据仅保留在当前浏览器标签页的 `sessionStorage` 中；首次落地页
与原始 Referrer 会去除查询字符串和页面片段，UTM 与 GCLID 单独保存。该方案已部署生产，
并与 Privacy Policy、CMP 和 Consent Mode 一起完成生产验证。

部署后的测试入口：
`/sportswear-manufacturer/?utm_source=google&utm_medium=cpc&utm_campaign=us-sportswear-test&utm_content=ad-a&utm_term=sportswear-manufacturer&gclid=test-click-id`

### 4.2 隐私与用户同意

- [x] 完成本地与生产站隐私/标签现状审计，并形成
      [`privacy-consent-plan.md`](privacy-consent-plan.md)。
- [x] 确定推荐架构：Cookiebot CMP + WP Consent API + Site Kit 统一管理
      Google Consent Mode v2。
- [x] 确认 Privacy Policy 数据控制者为 Athletik Clothing Inc.，隐私联系邮箱为
      `info@athletikapparel.com`。
- [x] 确认关闭生产站 AdSense；Cookiebot 账户使用
      `zhangyifuzjg@gmail.com` 创建。
- [x] 在本地安装并启用 WP Consent API 2.0.1 与 Cookiebot 4.7.2。
- [x] 2026-08-04 在生产站安装并启用 WP Consent API 2.0.1，并验证前端脚本输出。
- [x] 2026-08-04 在生产站安装并连接 Cookiebot，验证 CBID、Auto blocking、
      WP Consent API 正常输出，并关闭 Cookiebot 自带 Consent Mode。
- [x] 2026-08-04 配置 Cookiebot CBID、Auto blocking 和 Cookie Declaration；
      Cookiebot 自带 Consent Mode 保持关闭。
- [x] 2026-08-04 完成 Cookiebot 首次扫描；当前 7 个 tracker 均已分类，
      没有 Unclassified 项目。
- [x] 2026-08-04 保存 Cookiebot 全访客 Explicit Consent 横幅、英文内容、
      Cookie Declaration、无关闭图标和启用浮动 Privacy Trigger 的配置。
- [x] 将 WordPress Privacy Policy 页面 ID 3 重构为结构化英文版本；版本控制源见
      [`privacy-policy-draft.md`](privacy-policy-draft.md)，生产页面已发布。
- [x] 2026-08-04 完整美国首轮公开正文经业务方批准并部署生产页面 ID 3；
      2026-08-05 实际广告范围扩展为美国和加拿大，加拿大适用范围仍需补充复核。
- [x] 将 UTM/GCLID 来源归因接入 WP Consent API `marketing` 类别；拒绝或撤回后删除存储。
- [x] 美国首轮 Privacy Policy 已经业务方批准、发布并部署生产。
- [x] 页脚已增加并验证 Privacy Policy 与 Cookie Settings 入口。
- [x] 选择并配置用户同意管理方案。
- [x] 在生产 Site Kit 启用 Google Consent Mode v2；默认代码只输出一次，自动浏览器测试
      确认 Reject all 与 Allow all 能正确更新四个 Google consent 信号。
- [x] 生产 Privacy Trigger 已上线；验证 Allow all 后可重新打开设置并撤回全部非必要同意。
- [ ] 接入 Google Ads、重新扫描出 Marketing tracker 后，验证只允许 Statistics、
      拒绝 Marketing 的部分同意流程。
- [x] 2026-08-04 从生产 Site Kit 断开 AdSense，并验证前端脚本与相关域名引用均已移除。
- [x] 将自定义 `sessionStorage` 来源归因接入 `marketing` 同意类别。
- [x] 已验证 Reject all 与 Allow all 对 WP Consent API 和四个 Google consent 信号的
      更新；真实广告点击和部分同意场景仍按上线清单继续验证。
- [ ] 在针对欧洲经济区、英国和瑞士用户投放或再营销前，完成区域行为验证。
- [ ] 安装 LinkedIn Insight Tag 或上传第一方线索数据前，更新 Privacy Policy。

隐私与广告合规事项应由了解目标市场法律要求的专业人员进行审核。

### 4.3 公开品牌资料清理

- [ ] 确认唯一的官方 LinkedIn 公司主页。
- [ ] 在账号权限允许的情况下，申请合并、重命名或移除重复及过期资料。
- [ ] 将官方网站统一为 `https://www.athletikapparel.com/`。
- [ ] 将公司简介统一为当前已批准的定位：
  - Vertically integrated OEM
  - 技术针织服装制造
  - FLATLOCK 和 ACTIVESEAM 结构
  - 面向中型 B2B 买家
  - 每款 MOQ 1,000 件
- [ ] 重新使用历史客户名称、认证、工厂数量、产能、地址或年份前，逐项核实。
- [ ] 更新 LinkedIn Logo、封面图、Contact CTA 和员工关联信息。
- [ ] 审核代表公司的个人主页，修改过期网站和业务描述。

---

## 5. 目标市场与买家画像

### 首批市场

原计划首轮市场为美国；2026-08-05 实际上线范围为：**美国和加拿大**。

选择英语北美市场作为微预算验证范围的原因：

- 当前站点和广告准备以英语为主，不需要拆分语言版本。
- 每月 RMB 500–1,000 的预算不足以同时覆盖美国和多个欧洲国家。
- 单一国家更容易判断搜索词、点击成本、询盘质量和落地页表现。
- 欧洲市场需要进一步按国家、语言和隐私要求拆分，不适合作为当前微预算的
  混合投放区域。

加拿大已经进入首轮实际投放，不再属于后续候选。由于现有 Privacy Policy 的业务批准
记录仍是美国首轮范围，应补做加拿大适用范围复核。澳大利亚和新西兰仍可作为以后候选。

完成 Consent Mode 和区域隐私要求，并在美国市场验证询盘链路后，再评估：

- 英国
- 荷兰
- 瑞典
- 挪威
- 芬兰
- 其他适合使用英语进行采购沟通的欧洲市场

在没有相应语言广告和落地页支持之前，不开展非英语广告。

### 目标岗位

- 产品开发：Product Development
- 采购：Sourcing / Procurement
- 生产与运营：Production / Operations
- 服装设计：Apparel Designer
- 品类经理：Category Manager
- 成熟品牌的创始人或负责人
- 批发商或进口商买手

### 企业匹配信号

- 已有运动服、内衣、户外服、base layer、Merino wool 或相关技术针织产品线。
- 产品复杂度适合采用 FLATLOCK、ACTIVESEAM、Carbondry、Laser perforation
  或 vertically integrated production。
- 商业订单数量与公开 MOQ 相匹配。
- 有成熟品牌、批发渠道、零售分销或持续采购计划。

---

## 6. 首轮渠道计划

### 6.1 Google 搜索广告：第一付费渠道

Google 搜索广告用于捕获已经主动寻找制造商的买家。每个广告组应进入最相关的
产品分类页，不要全部进入首页或 Contact 页面。

#### 首轮产品广告系列

首轮唯一投放品类已确定为：**Sportswear Manufacturer**。

微预算验证阶段只建立一个 Sportswear 广告系列，并将流量导向
`/sportswear-manufacturer/`。Underwear / Base Layer、Merino Wool Apparel
及其他品类不参与首轮付费测试。只有在 Sportswear 获得真实合格询盘、追踪链路
正常且搜索词质量可接受后，才选择第二个品类。

#### 技术采购意图关键词方向

以下关键词需要通过 Keyword Planner 验证：

- technical knitwear manufacturer
- performance knitwear manufacturer
- FLATLOCK clothing manufacturer
- ACTIVESEAM manufacturer
- vertically integrated apparel OEM
- performance base-layer manufacturer

#### 产品品类关键词方向

- sportswear manufacturer / sportswear OEM
- underwear manufacturer / base-layer manufacturer
- outdoor clothing manufacturer
- Merino wool apparel manufacturer
- knitted fabric manufacturer
- silk clothing manufacturer
- sports accessories manufacturer

#### 关键词匹配方式

- 前期使用精准匹配和词组匹配，保持流量可控。
- 上线前两周频繁检查 Search Terms 报告。
- 只有当转化追踪和合格询盘反馈稳定后，才增加广泛匹配。
- 出现垃圾或低质量询盘后，不要继续把普通表单数量作为唯一 Smart Bidding 信号。

#### 首批否定关键词方向

- low MOQ
- 50 pieces / 100 pieces
- print on demand
- dropshipping
- one piece / single piece
- retail shopping
- DIY
- sewing pattern
- sewing course
- jobs / salary / careers
- used sewing machine
- free samples

不要屏蔽 wholesale、importer、brand、Tech pack 或 sourcing 等词，
这些词可能代表目标买家。

#### 广告落地页对应关系

| 搜索意图 | 落地页 |
|---|---|
| 技术针织 / Performance OEM | 首页或最接近的产品分类页 |
| Sportswear | `/sportswear-manufacturer/` |
| Underwear / Base layer | `/underwear-manufacturer/` |
| Outdoor clothing | `/outdoor-clothing-manufacturer/` |
| Merino wool apparel | `/merino-wool-manufacturer/` |
| Knitted fabric | `/knitted-fabrics-manufacturer/` |
| Silk clothing | `/silk-wear-manufacturer/` |
| Sports accessories | `/sports-accessories-manufacturer/` |
| 品牌词 / 直接询盘 | 首页或 `/contact/` |

### 6.2 目标客户开发（单人保守基线）

- [ ] 启动前确定线索台账、访问权限、保存期限和退订/禁止联系流程，并同步隐私与数据流文档。
- [ ] 首轮以美国为主；加拿大主动外联在适用范围和营销合规完成复核后启动。
- [ ] 每周建立约 10–15 家匹配企业的目标名单。
- [ ] 每家企业优先选择 1–2 位相关联系人。
- [ ] 联系前研究对方现有产品线。
- [ ] 围绕一个相关的产品或制造需求进行沟通，不发送泛化能力介绍。
- [ ] 使用专属 UTM 链接到对应产品分类页。
- [ ] 使用简短的邮件和 LinkedIn 组合跟进，不进行大规模自动群发。
- [ ] 记录联系、回复、询盘、合格、报价、打样和成交结果。
- [ ] 保存退订和禁止联系记录，并遵守收件人所在市场的相关营销规定。
- [ ] 只有在上一周跟进无积压时，下一周才可临时增加到最多 20 家；加量后重新回到基线评估。

### 6.3 LinkedIn 自然内容与再营销

官方公司主页完成清理后，再开始自然内容运营。

单人基线发布频率：

- 公司主页每周发布一次，优先复用当周 Instagram、YouTube 或技术文章主题。
- 适当的员工或个人主页保持正常互动。
- 每月最多将其中一次更新扩展为更深入的技术或制造内容。

内容方向：

- 真实生产和设备照片
- FLATLOCK 和 ACTIVESEAM 结构
- 打样与 Tech pack 工作流程
- 面料开发与后整理
- Carbondry 与 Laser perforation 应用
- QC 与检验流程
- 出口文件能力
- 经批准或匿名化的制造案例

只有在隐私和同意管理完成后，才安装 LinkedIn Insight Tag。LinkedIn 付费推广
应从网站访客再营销开始，不从广泛冷受众广告开始。受众规模满足条件后，可按
产品页访问和表单行为创建再营销受众。

### 6.4 SEO 与技术内容

单人首轮基线产出：

- 每月一篇有深度的技术文章。
- 每周一篇简短 LinkedIn 内容，优先从同周素材复用。
- 每月整理一组可复用的工厂或流程照片、视频。
- 在具备条件时，每季度发布一个经批准或匿名化的制造案例。
- 当月基线、询盘处理和广告复盘均按时完成时，可以增加第二篇文章，但不自动提高下月基线。

首批文章主题：

- FLATLOCK 与传统缝制结构的差异
- ACTIVESEAM 在性能服装中的应用场景
- 技术针织服装 Tech pack 应包含哪些内容
- Merino wool base layer 制造注意事项
- 如何规划每款 1,000 件以上的生产项目
- 打样、批量生产、QC 与出口文件流程
- 运动服、内衣和户外服的面料选择
- 从样品到大货阶段常见的延误原因

长篇正文必须由用户编写或批准，并基于真实的一线制造经验。不要批量生产泛化的
AI SEO 文章，也不要编造业务事实。

2026-08-07：在 SEO 之外增加轻量 GEO 观察——以第一手制造经验、清晰结构、真实问题
和品牌实体一致性为主，不要求每篇文章机械套用“定义句 + FAQ + 对比表”，也不承诺
AI 引用。提示词基线、站内边界和月度监测方法见 `promotion-matrix.md` 第 6 节。

---

## 7. 90 天时间表

| 时间 | 工作内容 | 阶段完成标准 |
|---|---|---|
| 第 1–7 天 | 确认市场、优先品类、预算、合格询盘定义、GA4 事件、隐私范围和官方 LinkedIn 页面 | 必要业务信息已记录 |
| 第 8–14 天 | 实施 Consent Mode、UTM/GCLID 记录、GA4/Ads 关联、报表和品牌资料清理 | 测试询盘具有完整归因，并且 GA4 只记录一次 |
| 第 15–21 天 | 使用 Keyword Planner、建立精准/词组广告、否定词、落地页映射和广告素材 | 广告上线前检查完成，尚未引入流量 |
| 第 22–30 天 | 上线首批搜索广告，每日检查搜索词和表单行为 | 获得第一批干净的搜索词及询盘质量基线 |
| 第 31–45 天 | 清除无关词、调整地域、优化落地页映射，并先建立线索台账、退订记录和 Outbound 合规流程 | 广告基线可复盘，主动外联具备记录与合规前提 |
| 第 46–60 天 | 按每周 10–15 家启动美国目标客户开发，发布首篇技术文章和 LinkedIn 复用内容 | 合格和不合格线索得到稳定记录，单人工作量无积压 |
| 第 61–75 天 | 只扩大有真实询盘质量的广告，暂停浪费，并准备再营销受众 | 建立初步 CPQL 和报价率基线 |
| 第 76–90 天 | 在受众和同意条件满足时启动有限再营销，复盘销售漏斗和下一季度计划 | 对每个渠道和品类形成书面扩大或暂停决定 |

---

## 8. 预算框架

首轮预算已确认采用微预算验证模式：每月 RMB 500–1,000，约等于每天
RMB 17–33。该预算只用于验证追踪链路、搜索词质量和能否获得真实合格询盘，
不用于同时覆盖多个市场、多个品类或多个付费渠道。

2026-08-07 补充：Instagram/Meta 付费推广按每日 RMB 50–100（约每月
RMB 1,500–3,000）单独运行，不计入上述 Google Search 阶梯框架；其预算调整依据
品牌指标与整体效果，渠道分工与调整规则见 `promotion-matrix.md` 第 1–2 节。
在 Meta 账户结构、Google 真实点击归因和首个 30 天基线完成前，不继续增加 Meta 预算；
单人计划以每日 RMB 50 的低位作为首轮复盘基准，实际平台设置仍须单独核实。

| 阶段 | 每月媒体预算 | 启动条件 | 用途 |
|---|---:|---|---|
| 微预算验证 | RMB 500–1,000 | 当前阶段 | 仅投一个市场、一个品类和一组高意图 Google Search 关键词 |
| 第一次增加 | RMB 1,500–3,000 | 追踪链路正常、搜索词相关，并获得至少一条经人工确认的合格询盘 | 扩大有效关键词或增加第二个品类，不同时增加过多变量 |
| 第二次增加 | RMB 3,000–5,000 | 在连续测试周期内稳定获得合格询盘，且 CPQL 和销售机会质量可接受 | 扩大有效市场和品类，继续以 Search 为主 |
| 后续扩张 | 根据真实销售数据决定 | 已产生报价、打样或订单机会，并可计算渠道回报 | 评估再营销及其他渠道，不预设固定上限 |

预算规则：

- 小预算不要平均分散到 7 个品类和多个国家。
- 当前预算的付费流量全部用于 Google Search，不安排 LinkedIn 付费广告、
  展示广告、Performance Max 或社交媒体冷广告。
- 首轮实际只建立一个广告系列、覆盖美国和加拿大、只投一个产品品类；关键词以精准
  匹配和词组匹配为主。两个国家共享同一微预算，若数据过度分散，优先收缩地域而不是
  立即增加预算。
- 首轮关键词数量保持精简，以 5–10 个高购买意图主题为起点，并使用否定词
  控制低 MOQ、零售、求职和其他无关流量。
- 第一个月以学习和建立基线为主，不期待立即达到成熟效率。
- 逐步扩大有效广告，不因点击率高就直接增加预算。
- 对带来无关搜索、低于 MOQ 询盘或没有真实商业机会的广告进行暂停或重做。
- 根据毛利、询盘到订单转化率和实际销售经济性确定可接受 CPQL，
  不使用泛化行业平均值。
- 第一次增加预算不能只依据普通表单数量；至少要有一条经过人工确认、符合
  产品范围和 MOQ 的真实 B2B 合格询盘。

---

## 9. 询盘分级与销售处理

### A 级：优先处理

- 数量达到或超过 MOQ。
- 产品和制造需求匹配。
- 企业及目标市场真实可信。
- 提供时间、规格、网站或 Tech pack 等信息。

建议响应时间：条件允许时，在同一工作日回复。

### B 级：继续开发

- 产品可能匹配，但数量、时间、企业信息或规格不完整。

建议响应时间：一个工作日内回复，并要求补充缺失信息。

### C 级：淘汰或培育

- 零售需求、求职、明显低于 MOQ、无关服务、垃圾信息或没有可信商业需求。

必须记录淘汰原因，为广告优化提供依据。

### 必须记录的销售阶段

1. 新询盘
2. 已联系 / 跟进中
3. 合格
4. 不合格
5. 已报价
6. 打样 / 开发
7. 成交
8. 流失

---

## 10. 报表与 KPI

### 每周指标

- 各渠道和广告系列的媒体花费
- 搜索词及其中具有真实商业意图的比例
- 点击和落地页访问
- 表单开始填写次数
- 成功提交的询盘
- 合格询盘
- 合格询盘率
- 每条合格询盘成本 CPQL
- 询盘回复时间
- 已发出的报价
- 已开始的样品或开发项目
- 销售机会和预计销售漏斗金额

### 每月指标

- 按国家、品类、广告系列和关键词方向统计的合格询盘
- 报价率和打样/开发率
- 在销售周期足够后统计询盘到订单转化率
- 各来源带来的销售漏斗和成交收入
- Organic Search 展示、点击、查询词和已索引页面
- LinkedIn 主页访问和可归因询盘
- 影响付费落地页的 Core Web Vitals 或页面性能变化

### 决策规则

- 针对合格询盘优化，而不是针对普通表单提交优化。
- 销售人员确认询盘质量之前，不扩大渠道预算。
- B2B 销售周期较长时，不要仅因尚未成交就暂停高价值广告；应检查合格销售机会
  和中间阶段。
- 修改竞价前，先检查搜索意图、地域、落地页相关性、表单行为和销售跟进速度。
- 记录每次扩大、暂停、落地页修改或定向调整的原因与结果。

---

## 11. 每周运营节奏（单人保守基线）

固定优先级：询盘与跟进 → 广告和归因 → 当周基线内容 → Outbound → 额外内容。
新增询盘或交付任务集中时，允许减少额外短内容和 Outbound 数量，不允许拖延询盘回复、
事实核实或必要的广告检查。

### 周一

- 复盘花费、搜索词、归因、新询盘和询盘质量。
- 增加否定词并修复追踪问题。
- 确定当周一个核心制造主题。

### 周二至周三

- 集中拍摄或整理当周素材，准备第一条 Reel/Short。
- 建立 10–15 家目标企业名单并开始触达；未完成前一周跟进时不新增名单。

### 周四

- 推进一项月度深度内容：YouTube 长视频或技术文章。
- 检查落地页和表单行为，跟进 A、B 级询盘并更新销售阶段。

### 周五

- 记录合格询盘、报价、样品、销售机会和流失原因。
- 发布第二条 Instagram 内容和一条 LinkedIn 复用帖。
- 决定下一周是否保持基线；只有无积压时才安排额外内容或临时增加 Outbound。

### 每月

- 检查 Search Console 和 GA4 获客报告。
- 按合格询盘和销售机会质量比较品类及市场。
- 审核公开品牌表述和新增内容的事实准确性。
- 确认新增内容所用 uploads 图片已经独立于 Git 同步到生产环境。
- 检查是否完成 1 条 YouTube 长视频、1 篇技术文章、约 8 条 Instagram Feed 内容、
  约 4 条复用 Shorts 和约 4 条 LinkedIn 内容；少量周次差异不视为失败。

---

## 12. 上线推广前需要确认的信息

- `已确认：首轮每月媒体预算为 RMB 500–1,000；获得真实合格询盘后再逐级增加。`
- `实际设置：首轮广告覆盖美国和加拿大；加拿大适用范围仍需补充复核。欧洲继续作为
  完成跨境传输、代表和区域隐私 Gate 后的后续市场。`
- `已确认：首轮唯一投放品类为 Sportswear Manufacturer；其他品类在首轮询盘验证后再决定。`
- `【需要确认：用于计算 CPQL 的典型订单金额或毛利范围】`
- `已确认（2026-08-07）：首次回复与销售阶段更新由用户本人负责；正式接单后转交业务员跟进。`
- `【需要确认：正式的官方 LinkedIn 公司主页】`
- `已确认：Privacy Policy 数据控制者为 Athletik Clothing Inc.；隐私联系邮箱为 info@athletikapparel.com。`
- `已确认：生产站关闭 AdSense。`
- `已确认：Cookiebot 账户使用 zhangyifuzjg@gmail.com 创建。`
- `已确认：数据控制者地址为 228 Park Avenue S #30327, New York, NY 10003, United States。`
- `已确认：未成交询盘和邮件保留 24 个月；GA4 保留 14 个月且关闭活动重置；服务器、
  安全和诊断日志目标为 30 天。Cookiebot 服务端记录和服务商实际期限仍待核对。`
- `已确认：Cookiebot Domain Group ID / CBID 为 f81cac53-c468-4afd-9823-7adcc4839c5b。`
- `【需要确认：最终 Privacy Policy 和同意管理负责人】`
- `用户说明（2026-08-07）：大部分客户可接受公开展示；这不构成批量授权。单个客户名称、案例和素材仍须写入授权台账，没有书面记录即不发布。认证与业务事实沿用原有逐项核实规则。`
- `已确认（2026-08-07）：推广由用户本人单人全职负责；内容量采用保守基线，有余力时可额外更新，但额外产出不自动提高后续基线。`
- `【待建立：Outbound 线索台账、保存期限、退订/禁止联系记录与加拿大适用范围复核】`
- `【待建立：客户案例授权台账；没有书面记录的客户名称和素材不得发布】`

---

## 13. 第一轮执行清单

付费流量进入网站前，首轮执行必须完成以下事项：

- [ ] 确认第 12 节中的业务信息。
- [ ] 重新检查 Search Console Pages 和 Sitemap 报告。
- [ ] 清理并指定官方 LinkedIn 公司主页。
- [x] 发布 Privacy Policy 并实施 Consent Mode。
- [x] 测试 GA4 `generate_lead`，并将其作为 Google Ads 主要转化。
- [x] 关联 GA4 和 Google Ads。
- [x] 在本地站点验证 Fluent Forms 的 UTM、GCLID、首次落地页和 Referrer 记录。
- [x] 部署后通过带 UTM/GCLID 的 URL 提交测试询盘，验证完整数据链路。
- [ ] 对批准的市场和品类运行 Keyword Planner。
- [ ] 建立并持续维护否定关键词列表；首轮精准/词组关键词已经上线。
- [x] 首轮广告已映射到 Sportswear Manufacturer 落地页。
- [x] 首轮广告素材已经上线；完整标题、描述和站内链接仍应从 Google Ads 补录归档。
- [x] 已于 2026-08-05 启动可控的 Google 搜索广告测试。

---

## 14. 官方参考资料

- Google Analytics 线索获取事件和报告：<https://support.google.com/analytics/answer/16376749>
- 使用 `generate_lead` 建立 GA4 线索受众：<https://support.google.com/analytics/answer/13291822>
- Google Ads 关键词列表指南：<https://support.google.com/google-ads/answer/10039665>
- Google Keyword Planner：<https://support.google.com/google-ads/answer/7337243>
- Google Enhanced Conversions for Leads：<https://support.google.com/google-ads/answer/15479486>
- Google 对欧洲经济区流量的同意要求：<https://support.google.com/google-ads/answer/14625550>
- Google 以用户为中心的内容指南：<https://developers.google.com/search/docs/fundamentals/creating-helpful-content>
- LinkedIn 网站访客再营销：<https://www.linkedin.com/help/linkedin/answer/a420433>
