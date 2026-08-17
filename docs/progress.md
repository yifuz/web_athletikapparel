# Athletik Clothing 网站项目进度快照

新会话开始时，请将本文件与 `AGENTS.md`、[`sitemap.md`](sitemap.md)、
[`site/design-brief.md`](site/design-brief.md) 及相关页面文案一起阅读，并用 `git log`
确认最近提交。

本文件回答“已经完成什么、目前是什么状态、下一步做什么”。规则和实施边界以
`AGENTS.md` 为准；页面结构和 URL 决策以 `sitemap.md` 为准；本文件是仓库进度的主要入口。
带日期的发布、广告、审计及平台记录是历史快照，除非记录了更晚的核验结果。
Google Ads、Search Console、GA4、Meta 等外部平台状态容易变化，引用为“当前状态”前必须实时核验。

最后更新：2026-08-17。

---

## 1. 当前状态摘要

### 1.1 网站与内容

- 规范站：<https://www.athletikapparel.com/>，运行于 Flywheel。
- WordPress 重建已上线，使用 GeneratePress 父主题和 `myathletik-child` 子主题。
- 首页、7 个产品类目页、Services、About、Contact、Sustainability 和 Privacy Policy 已上线。
- Technical Guides 内容中心及 3 篇基础指南已上线，站点导航、首页和页脚均有稳定入口。
- Rank Math Page Sitemap 最近一次生产核验包含 17 个 URL，其中包括内容中心与 3 篇指南。
- 浏览器、Googlebot、OAI-SearchBot 和 PerplexityBot 访问 4 个指南 URL 均返回 HTTP 200。
- 4 个新 URL 已在 Google Search Console 逐个申请索引；目前进入等待和观察阶段，不重复提交。
- `myathletik.com` 已按所有者决定完全下线，已检查入口返回 HTTP 410；不做跨域 301，也不再优化旧站。

### 1.2 GEO

- [`geo/GEO.md`](geo/GEO.md) 是 GEO 中央工作台和路由文档。
- Baseline v1（原 GEO-01～08）的第一轮 Temporary Chat 中性基线已经完成并冻结；Baseline v2 已建立，等待首次月度运行。
- 实体、技术可抓取性、三篇指南和 GEO-07 首轮 LinkedIn/Instagram 分发已经完成。
- GEO-06 LinkedIn 单图帖和 Instagram Carousel 已于 2026-08-13 发布；公开帖子 URL 与 Story 状态待补录。GEO-08 分发包已准备并完成初检，等待所有者审核和发布；
  GEO-07/GEO-06 七日数据、Search Console 索引观察和后续月度复测仍待进行。
- 当前长期 GEO 对话只用于规划和证据分析，不能作为中性测试环境。

### 1.3 营销与广告

- Instagram、官网和 YouTube 正在运营；LinkedIn 公司主页已完成基础配置并进入低频自然更新。
- Meta Ads 当前目标是获取真实粉丝和扩大影响力，不以 Instagram 直接询盘为主要目标。
- 已记录的 Meta 对照 Reel 表现较强；详见
  [`marketing/ads/meta-ads-baseline-2026-08-07.md`](marketing/ads/meta-ads-baseline-2026-08-07.md)。
- Google Ads 是独立的询盘获客路径。仓库中最新记录仍是 2026-08-05 上线快照；报告当前状态前必须登录平台核验。
- Outbound 已有流程和空白台账模板，但真实联系人数据不得进入 Git；在工作存储、留存规则和发送邮箱确认前不启动。

### 1.4 隐私、归因与询盘

- Cookiebot、WP Consent API、Google Consent Mode、GA4、UTM/GCLID 归因和 Fluent Forms 询盘路径已部署。
- `generate_lead` 是唯一主要网站转化；`contact_email_click` 与
  `contact_whatsapp_click` 是辅助诊断事件。
- 生产询盘、Brevo 发信、Cloudflare Email Routing 和最终收件箱均已完成端到端验证。
- 美国与加拿大是首轮广告地区。EEA、英国和瑞士的主动推广仍受跨境传输与代表问题约束。
- 隐私详细决策以 [`privacy/`](privacy/) 内文档为准，不从本摘要推断法律结论。

---

## 2. 定位与不可突破的边界

- 公开品牌：Athletik Clothing。
- 美国实体：Athletik Clothing Inc.。
- 中国实体：Zhangjiagang Athletik Clothing Co., Limited。
- 两个实体属于同一 Athletik 业务体系，但运营职责不同；不得写成同一个法律实体，
  也不得自行推断母子公司、签约、出口、雇佣或知识产权关系。
- 当前确认的公开角色仅包括：美国实体是网站隐私数据控制者；中国实体名称用于中国生产设施。
- 定位：面向中型 B2B 品牌买家的技术针织 Vertically integrated OEM。
- 公开 MOQ：每款 1,000 件。
- 可强调：自有生产设施、从纱线到成衣的垂直整合、FLATLOCK / ACTIVESEAM、
  Carbondry、Laser perforation、完整出口文件能力与区域覆盖。
- 不公开工厂数量或分包安排，不杜撰认证、产能、客户或法律实体关系。
- 已确认的网站数字：15+ 年、4,500+ sq m 自有设施、100,000+ pcs/month、3 continents。
- 区域统一写作 `North America, Europe, and Asia-Pacific`，不再列出俄罗斯。
- 正式网站文案使用面向北美和欧洲 B2B 买家的英文；内部 Markdown 文档默认使用简体中文。
- agent 只有在用户明确要求或授权时才能起草长篇正文，且必须经过所有者审核后才能发布。
- 实际页面不使用图库式库存照片；缺少真实素材时使用明确占位符。
- 已上线并被索引的 URL 不得在没有 301 的情况下修改。

---

## 3. 已完成的网站实现

### 3.1 技术基础与全局组件

- 完成子主题基础结构：`style.css`、`functions.php`、`front-page.php`、
  `template-parts/home/*`、`template-parts/product-category/*` 等。
- 所有定制代码位于 `myathletik-child`；未修改 GeneratePress 父主题。
- `:root` 中建立暖色系设计变量，包括 `--ma-color-white`、`--ma-color-dark`、
  字体、间距和尺寸变量，减少硬编码颜色。
- 标题字体使用 Manrope，Google Fonts 设置 `display=swap` 并配置预连接。
- Header 品牌字标通过 `generate_site_title_output` 过滤器实现双色排版。
- 响应式桌面导航和移动菜单已完成；`Contact` 是最后一项和唯一填充色 CTA。
- `Guides` 为普通导航项，紧邻并位于 `Contact` 前。
- 自定义 B2B 页脚包含品牌介绍、服务/公司导航、联系方式、询盘 CTA、Instagram、YouTube 和 WhatsApp。
- WhatsApp 链接为 <https://wa.me/16044049819>，页脚社交链接已全部解决。
- Services、About、Sustainability、7 个产品类目页和 3 篇指南均具备独立 SEO 标题与 meta description。

### 3.2 首页

首页当前区块顺序：

1. Hero
2. Client logos
3. Product categories
4. Capability proof
5. Why Athletik
6. Style gallery / Lookbook
7. Numbers proof
8. Process snapshot
9. Partnership trust
10. Certifications
11. Inquiry CTA

此外已增加稳定的 Technical Guides 入口。`latest-posts` 在没有普通博客文章时保持禁用。

主要实现状态：

- Hero 使用 4 单元 Bento 拼图，全部为真实产品、工厂和生产素材；不再使用 Pexels 图。
- 主视觉使用核准的 4:7 campaign 图片，桌面端焦点和缩放已经锁定；移动端保留 16:10 布局。
- Client logo marquee 全宽连续滚动，默认灰度，悬停显示彩色；客户标志均已获授权。
- Product categories 为三级 Bento：Sportswear 为左侧最大主卡，Merino 为右侧高卡；
  第二层为 Knitted Fabrics + Outdoor，第三层为 Silk + Accessories + Underwear。
- 7 张类目图与 Hero、Lookbook、Partnership 区域不重复。
- Merino 卡片使用副标题 `Apparel & base layers`，避免被理解成原料羊毛。
- 类目区 H2 为 `What we make`。
- Lookbook 从 23 张扩展为 46 张唯一图片；页面渲染两组副本，共 92 个节点，滚动仍保持无缝。
- Lookbook 分布：Silk Wear 15、Merino 10、Sportswear 8、Underwear 7、Outdoor 6；
  不展示 Knitted Fabrics 与 Sports Accessories。
- Capability、Why Athletik、Numbers、Process、Partnership、Certifications、Inquiry CTA 均已完成。
- Process Snapshot 的链接统一指向 `/services/`。

### 3.3 产品类目页（7 个）

- 7 个顶级关键词 URL 由共享数据文件、共享模板部件和对应 `page-{slug}.php` 模板生成。
- 统一页面结构：Hero → `What we make` 锚点索引 → Product range 子类展示 →
  Construction & fabric → Specs band → Related links → Inquiry CTA。
- 每个子类具有图片、标题和一行说明；平板及以上交替左右排版。
- `What we make` 项目可跳转至匹配的 `#subcat-{slug}` 详情区块。
- 所有 7 个类目已有子类数据，因此旧的 Sample image groups 库存图画廊不再渲染。
- Hero 的 `View Examples` 在有子类时跳转至子类标题。
- Sportswear 与 Underwear 页面已链接 FLATLOCK vs OVERLOCK 指南。

#### 子类结构

| 类目 | 数量 | 当前子类 |
|---|---:|---|
| Sportswear | 4 | Training tops / tanks / tees；Leggings & compression；Yoga & studio；Running singlets & layers |
| Underwear | 4 | Boxer / brief；Thermal base layer；4-way-stretch；Microfiber & merino |
| Outdoor Clothing | 4 | Mid-layer / hoodies；Cold-weather layering；Hiking / trekking；Merino-blend & Genesis fleece |
| Merino Wool | 4 | Jacquard；Printed；Blend；Yarn sourcing & fabric development |
| Silk Wear | 3 | Base layer / underwear；Lightweight apparel；Blend |
| Knitted Fabrics | 5 | Performance knit；Thermal；Functional finishes；Stretch / microfiber / merino；Recycled (GRS) |
| Sports Accessories | 3 | Balaclavas；Gloves / liners；Knit accessories |

已完成去重：Thermal base layer 归入 Underwear；Outdoor 不重复 base layer；
Merino 的第四项改为纱线采购与面料开发；Knitted Fabrics 保持独立面料供应业务定位。

### 3.4 视频和背景 Hero

- Merino Wool 与 Underwear 使用静音、自动播放、循环的背景视频 Hero。
- `hero_video` 控制是否使用视频；`hero_video_position` 控制裁切焦点。
- 其他 5 个类目和首页 Hero 的视频仍是可选增强，不是当前缺陷。
- About、Services、Sustainability、Contact 使用统一全宽背景图 Hero：
  cover 图片、左深右透明渐变、白色 H1 与较柔和的介绍文字。
- 背景图 Hero 的 CSS Ken Burns 动画已于 2026-07-27 移除；当前使用静态
  `transform: scale(1.04)`。不要重新加入该 CSS 动画；未来需要动态效果时应使用经测试的 JS 方案。
- Hero H1 使用纯白，介绍文字使用 `rgba(255,255,255,0.65)`；暖米黄色方案已被否决。

### 3.5 Technical Guides 内容中心

已上线 URL：

1. <https://www.athletikapparel.com/technical-guides/>
2. <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>
3. <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/>
4. <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/>

实施要点：

- 内容中心为稳定的数据驱动 Hub，只读取状态为 `publish` 的核准条目。
- 首页、主导航、页脚和文章面包屑均有入口。
- 三篇文章共用技术文章模板；每页只有一个 H1，并包含目录、正文、FAQ、参考资料、内部链接和询盘 CTA。
- Rank Math 输出独立 title、description、canonical 以及对应的 Article、FAQPage、BreadcrumbList；
  Hub 输出 ItemList。
- 未提供个人作者身份，因此公开 Organization 作为 Article 作者。
- Publisher Schema 不再把美国实体法律名称与中国生产地址错误混用。
- Hub 与文章 Hero 已压缩文字长度、统一全宽页面外壳，并减少桌面和移动端的面包屑、导语及元数据间距。
- 三篇正文均经所有者审核后上线。
- FLATLOCK vs OVERLOCK 文章使用真实 Yamato FLATLOCK 与 OVERLOCK 生产视频；
  Web 文件为静音 720 × 1280 H.264，并配有 JPEG poster。
- Merrow ACTIVESEAM 与 HSAT-K5 在该文章中只作文字说明，没有使用视频。

### 3.6 其他页面

- `/services/`：单页概览，包含 4 阶段流程；历史 H2/H3 标签不匹配问题已修复。
- `/about-us/`：已上线。
- `/contact/`：全宽背景图 Hero + Fluent Form 3。
- `/sustainability/`：已上线；当前规范拼写正确。
- Privacy Policy：美国首发英文版已上线，包含 Cookiebot declaration shortcode。
- 普通 Blog 区块在无文章时不会渲染；未来有内容时再启用。

---

## 4. SEO 与 GEO 状态

### 4.1 规范域名与旧域名

- `athletikapparel.com` 是网站、邮箱和品牌推广的主域名。
- `athletik-clothing.com` 是防御性域名，通过 Cloudflare 301 到主域名。
- `myathletik.com` 是独立旧站，已于 2026-08-10 完全下线并返回 HTTP 410。
- 所有当前 SEO/GEO 工作只针对 `https://www.athletikapparel.com/`。
- 旧站继续出现在搜索或 AI 回答中时，只记录为缓存滞后，不恢复旧站，也不建立跨域 301。

### 4.2 当前实体 Schema

- 已部署核准的 `legalName`、官方 LinkedIn / Instagram / YouTube `sameAs`、联系方式和地址。
- JSON-LD 为服务端渲染，不包含旧域名。
- 当前可公开陈述的职责边界有限；需要更详细的中美实体职责时必须向所有者确认。

### 4.3 Baseline v1（原 GEO-01～08）中性结果

完整证据见 [`geo/testing/prompt-baseline.md`](geo/testing/prompt-baseline.md)。方向性结论：

- GEO-01：可识别技术针织定位和张家港/苏州制造基地；旧 LinkedIn 的 New York headquarters 字段仍会造成干扰。
- GEO-02：可认可 technical/performance knitwear OEM/ODM 定位，但中美实体角色说明不完整。
- GEO-03：Temporary Chat 将 Athletik 列为中国 FLATLOCK/ACTIVESEAM 供应商短名单第一，
  是当前最强的非品牌发现信号。
- GEO-04：中性测试未出现 Athletik；通用 sportswear OEM + 1,000 件采购意图仍是缺口。
- GEO-05：中性测试未出现 Athletik，且提示词容易产生消费品牌推荐；Merino wool OEM 发现仍是缺口。
- GEO-06：中性回答偏向横机毛衫 tech pack；Athletik 未出现。已上线 cut-and-sew 技术针织指南用于纠偏。
- GEO-07：中性回答没有引用 Athletik，且部分结论过于绝对；第一方指南和首轮社交分发已完成。
- GEO-08：中性回答没有引用 Athletik，并偏向毛衫供应商尽调；对应 OEM 评估指南已上线。

原始个性化测试中出现过 `your own` 等用语，说明 Memory 或历史上下文影响回答；
这些结果只保留为探索性观察，不计入中性成绩。Baseline v1 的 8 条提示词均已有独立 Temporary Chat 结果，现已冻结为 2026-08 历史快照。

### 4.4 历史域名与第三方资料

- `ultramerino.com` 已由所有者确认属于公司，是早期矩阵中的类目站之一。
- 该站当前保留、更新、canonical 或下线策略尚未决定；历史认证、设备、产能和材料声明不能自动复用到规范站。
- `athletik.com`、`athletik.nyc`、`athletik.com.cn`、`powermerino.com`、
  `sportsbaselayer.com` 的所有权、可编辑性和当前价值仍需逐项确认。
- Panjiva、ImportInfo 等记录可辅助证明相关名称下的贸易/运输活动，
  但不能独立证明工厂所有权、垂直整合或产能。

### 4.5 当前 GEO 后续动作

1. 补录 GEO-07 LinkedIn 与 Instagram 公开帖子 URL，并确认 Story 状态。
2. 2026-08-19 起记录 GEO-07 满 7 个自然日的平台与 GA4 数据。
3. 补录 GEO-06 LinkedIn 与 Instagram 公开帖子 URL，并确认 Story 状态；2026-08-21 起记录满 7 个自然日的数据。
4. GEO-06 Feed 分发已完成；按单人保守节奏继续审核和分发 GEO-08。
5. 等待 Search Console 正常刷新，不重复申请索引。
6. 三篇指南获得合理抓取时间后，按固定 Baseline v2 建立新的月度时间序列；首选 2026 年 9 月窗口。

暂不制作 `llms.txt` 或所谓 AI 专用 Schema，不每日重复提示词，不以社交展示量替代 GEO 引用证据，
也不通过低信息密度文章、购买目录链接或虚构第三方评价追求数量。

### 4.6 SEO Baseline V2（2026-08-15）

完整证据见 [`seo/seo.md`](seo/seo.md) 第 10 节。

- 当前 Page Sitemap 包含 17 个唯一 URL：16 个受主题管理的核心页面，加 Privacy Policy。
- 17 个页面全部返回 HTTP 200；每页只有一份 Title、Meta Description、H1、自引用 Canonical 和可解析 JSON-LD，未发现意外 `noindex`。
- 16 个受管页面的 Title/Meta 与 `seo-tags.md` 一致，H1 与 `sitemap.md` 一致；没有孤立页或业务内链 404。
- 本轮没有 Critical 问题，记录了 8 组非阻断警告。2026-08-15 已补录首轮 Search Console 数据：3 个月视图为 5 次点击、94 次曝光、5.3% CTR、平均排名 12.7；样本不足以支持页面微调。
- Sitemap 状态成功，2026-08-13 最后读取并发现 17 个网页；4 个 Technical Guides URL Inspection 均显示已收录、HTTPS 通过并检测到有效路径内容，无需重复申请索引。
- Page indexing 汇总仍停留在 2026-08-07，早于指南上线；“11 个已收录 / 12 个未收录”属于所有已知网页旧快照，不能作为当前 17 个 Sitemap URL 的覆盖率。
- Core Web Vitals 的移动端和桌面端均因过去 90 天数据不足而没有现场结论；这不是失败判定。
- 生产域存在 6 条由 WordPress 输出的 `/products/<x>/` 301，Merino 历史路径仍为 404；在核实 Search Console、日志和旧 slug 来源前不改变这些行为。
- Privacy Policy 专用 SEO 标签、首页社交描述、新指南上下文内链、Hero 视频性能和 SEO 字段真值来源属于后续评估项。

### 4.7 北美与欧洲买家关键词研究（2026-08-17）

- 已完成 21 个首轮候选词在美国、加拿大、英国、荷兰、瑞典、挪威和芬兰的 Keyword Planner 历史指标对照；
- 已完成美国商业、产品/材料和采购信息三批自然变体发现，并统一重算 2025-08 至 2026-07 的 12 个月平均量；
- 已建立 45 个搜索意图簇的机会主表和关键词—页面映射 V1，明确现有页面所有权、错配词、能力门槛和未来 QC 内容候选；
- 已完成 28 个代表词的七国英语基线 V2；本批覆盖 2024-08 至 2026-07，共 24 个月，与首轮 12 个月基线不直接比较；
- 原始导出把输入表头 `Keyword` 当成第 29 个词，归一化数据已排除该伪关键词并按 28 个有效目标词重算；
- 28 词合计中，北美占 73.5%，欧洲五国占 26.5%；该比例只描述当前英语代表词，不代表总体市场规模或本地语言需求；
- 已完成 US / CA / UK 的 P0/P1 搜索意图样本筛查；Sportswear、Knitted Fabrics 和 Tech Pack Guide 进入首批页面级只读审计；
- Sportswear 页面只读审计已完成：无 Critical，URL/Title/H1 保持；性能图片、事实证据、术语、资格位置和重复 stylesheet 列为后续微调候选；
- Knitted Fabrics 页面只读审计已完成：无索引 Critical，URL/Title/H1 保持；独立面料业务边界、fabric-specific MOQ/询盘单位、GRS/追溯/测试证据和 11.47 MB 产品图列为实施前输入与优化项；
- Technical Knitwear Tech Pack Guide 只读审计已完成：无 Critical，URL/Title/H1/Meta 保持；官方标准与术语通过复核，通用 Tech Pack 查询边界、上下文内链、社交主图和重复 stylesheet 列为后续候选；
- Underwear、Outdoor 和 FLATLOCK vs COVERSTITCH 因错配较高暂不优先，QC Guide 继续等待可公开的一方流程证据；
- 本轮没有修改 URL、Title、H1、Meta、正文或 Schema；
- 搜索结果样本不能代替固定地理位置 Google 前 10 名；首批三页审计已完成，下一步汇总实施前输入并人工补录本地 SERP，再建立 NL / SE / NO / FI 本地语言研究批次。

---

## 5. 内容分发与营销记录

### 5.1 GEO-07 首轮内容分发

- 2026-08-12 将官网 `FLATLOCK vs OVERLOCK` 指南分发到官方 LinkedIn Page 与 Instagram。
- 素材包包含 7 张 1080 × 1350 卡片、平台专用文案、独立 UTM、alt text、Story 素材和七日数据模板。
- LinkedIn 当前公司主页界面不支持 PDF，因此正式发布采用 7 图帖；生成的 PDF 只作内部预览。
- Instagram 使用 Carousel 形式，文案更短，并强调滑动、收藏及 tech pack 应用。
- 执行 SOP：[`geo/distribution/social-content-sop.md`](geo/distribution/social-content-sop.md)。
- 发布记录：[`geo/distribution/publishing-log.md`](geo/distribution/publishing-log.md)。
- 尚未补录：公开帖子 URL、Story 最终状态、2026-08-19 七日数据。

### 5.2 单人运营基线

当前保守、可持续的内容基线：

- Instagram：每周 2 个 feed posts。
- Shorts：每周复用 1 条。
- LinkedIn：每周 1 条。
- YouTube：每月 1 条长视频。
- 官网：每月 1 篇技术文章。
- Outbound：合规和记录条件完成后，每周 10～15 家目标公司。

额外产出只视为有余力时的增量，不自动提高持续基线。客户案例必须有书面授权记录；没有记录就不发布。

### 5.3 LinkedIn

- 官方推广主页：<https://www.linkedin.com/company/111831319/>。
- 页面名称、Logo、真实车间封面、官网、简介、公司详情和张家港地址已配置。
- 历史面料出口主页因无管理权限保持独立；已弃用的 LinkedIn China 页面不再作为运营目标。
- 当前采用低频自然内容积累；LinkedIn 付费广告和 Insight Tag 暂缓。

### 5.4 Meta Ads 基线

2026-08-07 保存的对照 Reel 数据：

- 浏览量 7,785；覆盖 6,325；互动 123；综合关注 135。
- 推广视图直接归因 68 次主页访问和 14 次关注。
- 花费 RMB 170.08；单个广告归因关注 RMB 12.15；主页访问到关注转化率 20.6%。
- 截图时已投放 4 天，日预算 RMB 68。

综合 135 次关注与广告归因 14 次关注采用不同统计范围，差额不得直接标记为“纯自然”。
若其他素材只有更低主页访问成本，却没有带来关注或互动，不应仅凭点击成本判为更优。

### 5.5 Google Ads 快照

- GA4 已链接 Google Ads 账号 `734-505-8603`。
- 首个搜索 Campaign：`Leads-Search-1`。
- 落地页：Sportswear manufacturer。
- 地区：United States + Canada；语言：English；Search Network only。
- 出价：Maximize Clicks；日预算 RMB 25。
- AI Max、Search Partners、Display expansion、text adaptation、final URL expansion 均关闭。
- 2026-08-05 启动并进入 Google 审核；后续是否开始展示必须实时核验，不能沿用该历史快照。

---

## 6. 隐私、同意、归因和询盘

### 6.1 同意管理

- WP Consent API 2.0.1 与 Cookiebot 4.7.2 已在生产启用。
- Cookiebot CBID：`f81cac53-c468-4afd-9823-7adcc4839c5b`，使用 Auto blocking。
- Cookiebot 自带 Google Consent Mode 已关闭，由 Site Kit 单独控制 Google consent。
- Banner 对所有访问者采用明确同意；可选类别不预选；桌面为底部 Bar，移动端为响应式 Dialog。
- `Reject all` 保持可选 WP consent 和 Google 广告/分析信号为 denied；`Allow all` 将其设为 granted。
- Privacy Trigger 与页脚 `Cookiebot.renew()` 均可重新打开同意设置。
- 撤回同意会将 Preferences、Statistics、Marketing 及对应 WP Consent API 状态恢复为 false。
- AdSense 已从生产 Site Kit 断开；公开 HTML 已确认不再加载 AdSense 脚本或域名引用。

### 6.2 Privacy Policy 与区域边界

- WordPress Privacy Policy 页面 ID 3 为经业务核准的美国首发英文版。
- 页面包含 14 个 H2、无正文级 H1、一个有效 Cookiebot declaration shortcode、有效 Gutenberg blocks，且无公开占位符。
- 数据控制者：Athletik Clothing Inc.；隐私邮箱：`info@athletikapparel.com`。
- 纽约控制者地址已记录在隐私决策文档，不在本摘要中重复作为生产总部声明。
- 普通制造询盘不要求强制勾选 Privacy Policy；表单使用简短隐私提示。
- 未来营销邮件同意必须独立且可选。
- EEA/英国/瑞士主动推广前，必须解决 163.com 目的邮箱涉及的签约实体、处理地点、传输机制和地区代表问题。
- 所有者确认当前未达到三项主要 CCPA business thresholds；最终法律审查仍需考虑受控实体及其他州法路径。

### 6.3 数据保留已确认项

- 未成交询盘及相关邮件：最后一次实质联系后 24 个月。
- GA4：14 个月，activity reset 关闭。
- 服务器/安全/诊断日志：目标 30 天；实际供应商可见窗口按产品记录。
- Flywheel：最近 7 天访问/PHP 错误/慢日志；夜间站点及数据库备份保留 30 天。
- Brevo：交易日志自动删除设为 1 个月；新交易邮件预览不存储。
- Cookiebot 浏览器 consent cookie 最长约 12 个月；账户侧日志没有公开固定期限，最终政策表述仍需法律复核。

### 6.4 归因与表单

- 生产 UTM/GCLID 归因代码只有在 WP Consent API `marketing` 同意后才存储数据；拒绝或撤回时删除。
- `generate_lead` 已通过 Tag Assistant 和 GA4 DebugView 验证。
- Fluent Form 3 当前字段：Name、Email、Company、Country、Website、Product Category、
  Estimated Order Quantity、Business Type、Message。
- 订单量选项围绕每款 1,000 件 MOQ 设计；Message 提示可附 tech pack 链接。
- File Upload 是 Fluent Forms PRO 功能，当前免费方案采用链接提示。
- 表单只保留一个启用的 `New Notification`：Send To / From Email =
  `info@athletikapparel.com`，From Name = `Athletik Clothing`，Reply-To = `{inputs.email}`。
- 2026-07-29 最终生产测试仅产生一个 Brevo `request → delivered → opened` 链路，
  Cloudflare 转发到 `zhangyifuzjg0609@163.com`，已确认收件。

---

## 7. 域名、托管、部署与版本控制

### 7.1 当前基础设施

- Registrar / DNS / Email Routing：Cloudflare。
- Hosting：Flywheel Tiny。
- 本地开发：LocalWP。
- 部署：Local Connect。
- GoDaddy 不再属于当前托管、邮箱或部署链路。

### 7.2 生产上线记录

- 2026-07-22：站点在 `athletikapparel.com` 正式上线。
- `www` 为主域名；apex 和 HTTP/HTTPS 变体统一进入
  `https://www.athletikapparel.com/`。
- Flywheel Let's Encrypt SSL 已签发并自动续期；Cloudflare 使用 Full (strict) 和 Always Use HTTPS。
- 证书签发若被 Cloudflare proxy 阻碍，可临时切为 DNS-only，完成 SSL 后再恢复 proxy。
- `athletik-clothing.com` 的 Cloudflare Redirect Rule 已验证为 301 到主域名。
- Google Search Console Domain property 已验证；Sitemap 为
  <https://www.athletikapparel.com/sitemap_index.xml>。

### 7.3 Git 与媒体部署

- 子主题 Git 远程仓库：<https://github.com/yifuz/web_myathletik.git>。
- Codex 在当前 checkout 成功提交后必须立即推送当前分支。
- 图片和视频位于 uploads，不进入 Git；每次变更必须通过 Local Connect、FTP/SCP 或迁移工具另行同步。
- 代码提交成功不代表图片已经部署。

---

## 8. 已关闭的重要事故与修复

### 8.1 Flywheel 27 GB 存储清理 — 2026-07-28 关闭

- Local Connect 曾把整个 27 GB uploads 推到 Flywheel，超过 Tiny 计划容量。
- 本地将 4,446 个未使用素材、共约 26.38 GB 移出 uploads，归档到外部素材盘。
- uploads 保留约 218 个在用文件，基线约 0.27 GB；增加核准 WebP 和 Hero 后约 0.31 GB。
- 静态核验 195 个唯一图片引用，缺失数为 0。
- 生产旧 27 GB 资产目录已删除，重新部署后 Flywheel 总使用量约 660 MB。
- 2026-07-24 的 270 MB ZIP 是过期历史快照，不得用于未来部署。
- Local Connect 没有可靠的 uploads 子目录排除机制，因此必须长期保持 uploads 精简。

### 8.2 Fluent Forms 空目录恢复 — 2026-07-27 关闭

- `plugins/fluentform/` 曾只剩空目录骨架，导致插件从激活列表消失且重新安装提示目标目录已存在。
- 数据库中的 7 个 `fluentform_*` 表和 3 个表单保持安全。
- 在确认目录无文件后删除空目录，重新安装并恢复插件。
- Form 3 已重新渲染、保存 Entries 并成功发送通知。
- 临时诊断脚本 `ff-diag.php` 使用后已删除，避免泄露数据库/插件信息。

### 8.3 Turnstile secret 文件 — 2026-07-29 关闭

- 本地公开 uploads 树中曾发现 `Turnstile-KEY/secret-key.txt`。
- 已从本地公开树删除；确认该文件从未推到 Flywheel。
- 旧 secret 按泄露处理并在 Cloudflare 轮换；公开旧 URL 返回 404。
- 凭据不得放在 `wp-content/uploads/`，因为该目录可被 Web 读取且不受仓库 `.gitignore` 保护。

### 8.4 SMTP / Brevo — 2026-07-29 关闭

- FluentSMTP 2.2.95 通过 Brevo 原生 API 连接。
- From Email：`info@athletikapparel.com`；From Name：`Athletik Clothing`；强制发件人名称启用。
- Brevo 中域名已 verified + authenticated；API key 只保存在加密数据库配置中。
- Email Test 和最终真实表单提交均完成端到端验证。

---

## 9. 2026-07-03 QA 审计状态

完整审计见 [`site/qa-audit-2026-07-03.md`](site/qa-audit-2026-07-03.md)。

| ID | 项目 | 当前状态 |
|---|---|---|
| P0-1 | Process Snapshot 死链 | 已修复 |
| P0-2 | 页脚社交 `#` 链接 | 已修复；Instagram、YouTube、WhatsApp 均为真实 URL |
| P0-3 | 页脚 `/sitemap/` 死链 | 已修复为 `/wp-sitemap.xml` |
| P0-4 | 页脚 `/blog/` | 已移除；普通 Blog 区块禁用 |
| P1-1 | Hero 库存图 | 已替换为真实 Bento 素材 |
| P1-2 | 类目页库存图 | 已通过子类详情系统停止渲染 |
| P1-3 | 前台可见的重定向说明 | 已移除 |
| P1-4 | Style Gallery / Partnership 占位内容 | 已修复 |
| P1-5 | Latest Posts 占位内容 | 已修复 |
| P1-6 | 硬编码颜色 | 已迁移至设计变量 |
| P1-7 | Services 标题层级及标签不匹配 | 已修复 |
| P1-8 | Contact 表单字段和通知 | 已完成并通过端到端验证 |
| P1-9 | `3 continents` 与俄罗斯表述 | 已修复 |
| P1-10 | Hero 图片 alt | 已修复 |

---

## 10. 图片和视频存储规则

### 10.1 唯一存储位置

所有站点图片和视频必须放在：

```text
wp-content/uploads/myathletik-theme/assets/images/
```

不得放入：

```text
themes/myathletik-child/assets/images/
```

主题中的图片代码仍使用：

```php
get_stylesheet_directory_uri() . '/assets/images/...'
```

`functions.php` 的输出缓冲会在渲染时把主题相对 URL 改写到 uploads。
把文件误放进主题目录会被改写到不存在的 uploads 路径并产生 404。

只把网站实际使用的文件放入 uploads。原始或暂未使用素材保留在外部素材盘，不能批量倒回 uploads。

### 10.2 图片优化策略

不同素材组采用不同策略，不得全局机械转换：

| 素材组 | 当前处理 | 原因 |
|---|---|---|
| 首页 Lookbook | WebP q82，最长边 2000 px，通过 `<picture>` + JPG/PNG fallback | 46 张连续滚动，必须控制总负载 |
| 证书 | 保持原图 | 小字清晰度优先，文件本身较小 |
| Brand partner logos | 保持原图 | 平面边缘清晰度优先 |
| About / Services / Sustainability / Contact Hero | 保持全分辨率 | 全宽背景需要清晰度 |
| 产品页子类图 | 保持原图 | 属于买家判断所需细节图 |
| 首页主 Bento 图 | 核准 PNG 保留为源图；线上使用 720w / 960w / 1280w lossless WebP `srcset` | 保持视觉焦点，同时控制交付尺寸 |

新增图片如果无法归类，转换前先询问所有者。转换时保留原图，在同目录生成同 basename 的 WebP，
通过 `<picture>` 提供 fallback；不要把 `sharp` 等一次性工具加入主题构建链路。

### 10.3 Lookbook 优化记录

- 46 张图片转换为 WebP q82、最长边 2000 px，总负载从约 137 MB 降至 4.5 MB，约减少 97%。
- q82 经 5 张样图对比后由所有者接受；q78 被认为损失略大。
- 节点从 138 减至 92，动画位移由 `translateX(-33.3333%)` 改为 `translateX(-50%)`。
- 2026-07-29 修复 `sportswear/IMG_5836.webp` 的 EXIF 方向问题。
- Marquee 桌面速度由 35s 调整为 110s，移动端由 28s 调整为 90s；悬停和键盘焦点均可暂停。

---

## 11. 已知操作注意事项

- LocalWP 若因 MySQL 无法启动，先在任务管理器结束残留 `mysqld.exe`，再重启站点。
- 使用 Clash/VPN 时应旁路 `.local`，或临时关闭系统代理访问本地站。
- VS Code Git UI 若因 pipe ENOENT 卡住，改用终端；确认无 Git 进程后再处理 `.git/index.lock`。
- 桌面端布局一直是高风险区域，每次必须显式检查 1440 px、100% 缩放，不只看移动端。
- Stats / proof cards 的数字与单位必须使用分离元素，保持不同数值在桌面和移动端对齐。
- 修改标题级别时同时检查开始和结束标签。
- 修正菜单 URL 时，`wp_update_nav_menu_item` 的不完整参数可能清空其他字段；
  仅改 URL 时优先更新 `_menu_item_url` post meta。
- 方形或竖版 Hero 视频在横向容器中需要设置 `hero_video_position`，避免人物头部被裁切。
- Fluent Forms Vue 管理界面可能忽略程序化填充值；保存后需查看网络响应，并进行真实表单测试。
- 页面 `<head>` 中存在 `<meta name="description">`；自动化脚本必须使用
  `textarea[name="description"]` 定位表单 Message，而不是宽泛的 `[name="description"]`。

---

## 12. 关键时间线

| 日期 | 里程碑 |
|---|---|
| 2026-07-21 | 远程 Git 仓库建立；语言切换器隐藏；决定先只上线英文站 |
| 2026-07-22 | Flywheel 正式上线；域名、SSL、Cloudflare、Search Console、Email Routing 与表单首轮测试完成 |
| 2026-07-24 | 本地 uploads 从约 27 GB 精简至约 0.27 GB |
| 2026-07-27 | Contact Hero、Hero 文字层级、Lookbook WebP 与节点优化完成；Ken Burns 动画移除 |
| 2026-07-28 | 生产全量部署和 Flywheel 27 GB 清理完成，存储约 660 MB |
| 2026-07-29 | Lookbook 方向/速度修复；FluentSMTP + Brevo、表单通知与 Turnstile secret 事件关闭 |
| 2026-08-04 | 美国首发 Privacy Policy 发布并核验 |
| 2026-08-05 | Consent/归因与首个 Google Ads Campaign 上线快照完成 |
| 2026-08-07 | 单人保守营销基线、LinkedIn 官方主页状态和 Meta Ads 基线记录完成 |
| 2026-08-08 | GEO Baseline v1 固定提示词、实体冲突表和首轮爬虫可访问性检查启动 |
| 2026-08-10 | `myathletik.com` 以 HTTP 410 完全下线；中美实体命名和 Baseline v1 完成 |
| 2026-08-11 | Technical Guides Hub 与 3 篇基础指南全部完成、核验并部署 |
| 2026-08-12 | GEO-07 LinkedIn/Instagram 分发完成；GEO 文档和 docs 目录完成整合；Baseline v1 冻结并建立 Baseline v2 |
| 2026-08-13 | GEO-06 Technical Knitwear Tech Pack 完成 LinkedIn 单图帖与 Instagram Carousel 分发；公开 URL 和 Story 状态待补录 |
| 2026-08-15 | SEO Baseline V2 完成：17 URL 技术审查通过，无 Critical 问题；补录 Search Console 首轮数据并确认 4 个 Technical Guides URL 全部收录 |
| 2026-08-17 | 北美与欧洲关键词研究完成美国三批发现和关键词—页面映射 V1；形成 45 个意图簇主表与 28 词七国验证清单 |
| 2026-08-17 | 28 词七国英语基线 V2 完成；排除原始导出中的 `keyword` 表头伪词，并形成 US / CA / UK 的 P0/P1 SERP 队列 |
| 2026-08-17 | US / CA / UK 搜索意图样本筛查完成；选出 Sportswear、Knitted Fabrics 和 Tech Pack Guide 三个页面级审计机会 |
| 2026-08-17 | Sportswear 页面只读 SEO 审计完成：无 Critical；保持 URL/Title/H1，记录内容证据与静态性能微调项 |
| 2026-08-17 | Knitted Fabrics 页面只读 SEO 审计完成：无索引 Critical；保持 URL/Title/H1，记录面料商业边界、采购单位、证据与图片性能问题 |
| 2026-08-17 | Technical Knitwear Tech Pack Guide 页面只读 SEO 审计完成：无 Critical；保持 URL/Title/H1/Meta，完成技术参考、内链、Schema 与性能复核 |

---

## 13. 下一步优先级

1. 完成 GEO-07 发布 URL、Story 状态和七日数据记录。
2. 审核并发布已经准备好的 GEO-08 OEM Evaluation 内容包；补录 GEO-06 公开帖子 URL 与 Story 状态。
3. 等待 Search Console Page indexing 从 2026-08-07 快照刷新，并核对“已抓取/已发现但尚未编入索引”、robots.txt 屏蔽和 404 的示例 URL。
4. 汇总首批三页实施前事实输入与低风险技术候选；确认 Sportswear 与 Knitted Fabrics 声称的一方证据，并人工补录 US / CA / UK 固定位置 Google 前 10 名；完成后再开展 NL / SE / NO / FI 本地语言研究。
5. 在 2026 年 9 月窗口运行 Baseline v2；ChatGPT Search 使用全新 Temporary Chat，其余产品按各自中性环境规则执行。
6. 广告数据达到可分析样本后，再进行阶段性复盘；不做无意义的每日分析。
7. Outbound 继续暂缓，直到真实数据存储、留存规则和发送邮箱确认。
