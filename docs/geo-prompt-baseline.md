# GEO 提示词基线与实体一致性记录

> 建立日期：2026-08-08
> 范围：针对 ChatGPT Search、Perplexity 和 Gemini/Google AI 体验进行轻量级月度观察。本记录不构成排名保证。

## 1. 执行规则

- 每月使用全新对话，以英文运行一次相同的提示词。
- 保持联网/搜索功能开启；产品允许选择地区时，使用美国地区。
- 记录第一次回答，不要为了让品牌出现而反复重新生成。
- 分开记录品牌提及和网站引用：提到品牌但没有链接，不算网站引用。
- 保存回答链接或截图，并记录引擎、可见的模型/模式和运行日期，因为结果会随时间和用户而变化。
- 不跨引擎比较原始排名；每个引擎只与其自身上月结果比较。
- 如果 Search Console 已为此资源显示生成式 AI 效果报告，则每月记录其展示次数和被引用页面。该功能仍在逐步推出，菜单暂未出现不视为错误。
- 检查 GA4 获客/引荐数据中可归因的 AI 搜索访问。引荐流量比未附引用的品牌提及更有证明力。

单人执行基线：8 条提示词 × 3 个引擎 = 每月 24 次检查。如果某个引擎在当前账户或地区无法提供基于网页的回答，则暂停该引擎。

## 2. 核准实体信息源

| 字段 | 核准值 |
|---|---|
| 公开品牌 | Athletik Clothing |
| 法律实体 | Athletik Clothing Inc. |
| 规范主站 | <https://www.athletikapparel.com/> |
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
| 2026-08-10 | ChatGPT Search（未提供可见模型/模式） | GEO-02 | 是，但有一次将品牌称为“Athletik Apparel” | 是 | 首页、About Us、Underwear、Sportswear、Outdoor Clothing 和 Knitted Fabrics 页面 | 公开品牌名称漂移：使用“Athletik Apparel”，而不是“Athletik Clothing”。与“fashion sweater manufacturer”的对比由模型自行添加，并非网站原文。未出现无依据的工厂数量、产能或客户声明。 | 无 | 用户粘贴的第一次回答，2026-08-10 | 规范域名引用结果较强。制造能力陈述均可追溯至当前网站文案，而且回答明确将所有权、能力和认证信息标记为公司自行声明，而非独立核实。引用链接包含 `utm_source=chatgpt.com`，可用于衡量可归因的引荐访问。本次运行发生在实体 Schema 部署后、旧站开始返回 410 后。 |
| 2026-08-10 | ChatGPT Search（未提供可见模型/模式） | GEO-03 | 是，位列短名单第一；但使用“Athletik Clothing / Zhangjiagang Athletik Clothing Co., Ltd.”合并称谓 | 待确认：粘贴文本保留了“Athletik manufacturing profile”链接标题，但未保留实际 URL | 未随粘贴文本保留 | 当前核准实体基线不能直接证明合并称谓；“only a small number”、供应商置信度等级和“strongest”均为模型判断。竞品设备数主要来自企业自述，未获得独立核实。Yonglee 页面中的 `MB-40FD` 与 Merrow 官方型号 `MB-4DFO` 不一致。 | Shanghai Yonglee Textile Co., Ltd.；Merino Wool Apparel (Suzhou) Co., Ltd.；Zhangjiagang Huayu Import & Export Co., Ltd. / LeHeHe Merino；Royal International Industrial Ltd. | 用户粘贴的第一次回答，2026-08-10 | 这是正向的高意图发现结果：Athletik 排名第一且获得最高置信度。回答对 FLATLOCK 与 ACTIVESEAM 的技术区分基本准确，但竞品设备、产能、工厂所有权和供应商覆盖完整性不能作为已验证事实转载。 |

### GEO-03 核验备注（2026-08-10）

- [Merrow 官方 MB-4DFO 2.0 页面](https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo)支持核心技术区分：该设备生产两线或三线 ACTIVESEAM，ACTIVESEAM 是传统 FLATLOCK/INTERLOCK/OVERLOCK 的替代结构，并非 FLATLOCK 的通用同义词。
- [Yonglee 页面](https://yonglee.com/factory/baselayer)确实自行声明 30 多台 Yamato 四针六线设备和 10 多台美国 ACTIVESEAM 设备，但把型号写成 `MB-40FD`。[Merino Wool Apparel 页面](https://www.merinowoolapparel.com/about-us)使用了高度相似的数字和文案，因此两页不能视为相互独立的佐证，背后的公司或工厂关系仍不明确。
- 可检索的 [Huayu 第三方资料页](https://www.exporthub.com/zhangjiagang-huayu-import-amp-export-co-ltd/)明确提到四针 FLATLOCK、OVERLOCK 和 COVERSTITCH，但没有为本次回答中的 ACTIVESEAM 设备声明提供同等强度的证据。
- 本次检索没有找到可直接支持 Royal 所述 ACTIVESEAM 设备数、月产能和机器所有权的官方页面；这些数据继续按未核实的企业声明处理。
- “截至 2026 年 8 月只有少数中国供应商”属于无法由一次公开搜索穷尽证明的范围判断。该句和模型给出的 High/Medium 置信度只记录为回答内容，不写入 Athletik 的对外事实库。
- Merrow 过去的公开资料提到 ACTIVESEAM 品牌许可，但若产品要使用 ACTIVESEAM 名称或品牌标签，应直接向 Merrow 确认当前许可条款，不依据旧页面作当前授权结论。

## 6. 实体冲突登记表

公开搜索目前仍可能在规范新域名之前展示历史网站和第三方记录。除已经完全下线的 `myathletik.com` 外，以下来源必须先确认所有权和可编辑性，才能进行修正：

| 来源 | 发现的冲突类型 | 控制状态 | 下一步 |
|---|---|---|---|
| `myathletik.com` | 旧站下线前的 GEO-01 在规范域名之前引用了其历史 About Us 页面 | 站点内容已完全下线；所有已检查入口返回 410；按所有者决定不做 301 | 不修复旧站；只追踪搜索/AI 系统是否继续引用缓存中的旧页面 |
| `athletik.com` | 历史品牌/网站文案和联系信息 | 【需要确认：是否拥有且可编辑？】 | 确认所有权后再更新、设置规范指向或下线 |
| `athletik.nyc` | 历史公司简介、产能和工厂结构声明 | 【需要确认：是否拥有且可编辑？】 | 替换为当前核准实体信息，或在适当时重定向 |
| `athletik.com.cn` | 历史实体表述、邮箱和运营声明 | 【需要确认：是否拥有且可编辑？】 | 更新信息，或明确说明其当前用途 |
| `powermerino.com` / `ultramerino.com` / `sportsbaselayer.com` | 历史细分网站声明、日期和联系信息 | 【需要确认：是否拥有且可编辑？】 | 每次检查一个域名；没有流量证据时不要批量重定向 |
| 供应商目录和进口数据网站 | 不受控制或由账户管理的 MOQ、地址、产品和关联数据 | 【需要确认：哪些资料页可以编辑？】 | 只修正公司能够控制的资料页，不声称可以控制公开记录 |

## 7. 第一轮改进周期

1. 保留每条结果的时间背景。8 月样本不是严格的前后对照实验：Bing GEO-01 记录于旧站下线前；ChatGPT GEO-02 记录于旧站下线和实体 Schema 部署后。
2. 在不延迟有效改进的前提下继续运行其余固定提示词；始终在“备注”栏记录当时的部署和抓取条件。
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
