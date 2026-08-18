# OEM Evaluation 指南页面只读 SEO 审计 V1

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/evaluate-technical-knitwear-oem/>
>
> 主要词簇：`evaluate technical knitwear OEM`
>
> 次级词簇：`vertically integrated knitwear OEM`、`supplier evaluation`、cut-and-sew、traceability、process ownership
>
> 依据：[`../../seo-tags.md`](../../seo-tags.md)、[`../sitemap.md`](../sitemap.md)、[`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md)、[`page-audit-sportswear-manufacturer-v1.md`](page-audit-sportswear-manufacturer-v1.md)（结构与深度基准）
>
> 审计方式：生产 HTML（curl 抓取，HTTP 200，77,109 字节）、生产 Sitemap、生产相关页面入链核查与本地模板静态检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片或前端资源
>
> 页面类型：技术指南（Article + FAQPage + BreadcrumbList Schema），代码渲染自 `template-parts/technical-article/`

## 1. 结论先行

**结论：内容质量好、无 Critical 问题；主要缺口是内链（V2-006 核实仍未修复）。**

- 保留 `/evaluate-technical-knitwear-oem/`、当前 Title 和 H1；
- Title（51 字符）与 Meta（147 字符）均在内部软目标内且与 `seo-tags.md` 一致，不需要改写；
- 正文约 1,964 词，11 个编号章节 + Red flags + 4 条 FAQ + 6 条一方权威来源，术语拼写全部符合 §6 规范，未发现绝对化声称、MOQ 表述或区域表述问题；
- 实体边界表述安全：正文是通用买家指南，未把多个法律实体写成同一实体，未推断母子公司关系，未提及 BTEXCO；
- 生产正文内链双向弱：正文无一条指向品类页 / Services / 姊妹指南的上下文链接；全站生产页面中只有 Hub 一个正文入口（首页、两条姊妹指南、品类页相关链接均为 0）。这是本页最实质的待办；
- OG/Twitter 主图与 child stylesheet 重复加载属于已知共享问题，本地已修复待部署，不算新发现。

## 2. SEO Audit — `/evaluate-technical-knitwear-oem/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200，`robots` 为 `follow, index`，自引用 Canonical 正确，只有一个 H1，Title/Meta/JSON-LD 完整，未发现 `noindex` 或索引阻断。

#### 🟡 Warning

##### W1. 正文内链双向弱，V2-006 核实在本页仍未修复

**观察（生产实测）：**

- 生产正文（`<main>` 内）的站内链接只有 4 条：面包屑 Home、面包屑 Technical Guides、作者署名行 About Us、页尾 CTA Contact；没有任何指向品类页、Services 或姊妹指南的上下文链接；
- 入链侧：`/` 首页生产 HTML 对该 URL 出现 0 次；`/flatlock-vs-overlock-technical-knitwear/` 0 次；`/technical-knitwear-tech-pack-guide/` 0 次；`/technical-guides/` Hub 出现 1 条正文卡片链接（另 1 次为同一卡片内的重复出现）；七个品类页的本地相关链接数据（`inc/product-category-data.php:155,209,493`）只指向 FLATLOCK 指南和 Tech Pack 指南，没有指向本页；
- 对照：Tech Pack 指南正文（`template-parts/technical-article/content-technical-knitwear-tech-pack-guide.php:20,82,110`）已有 4 条上下文站内链接（Knitted Fabrics、Sportswear、FLATLOCK 指南、Services），即 IMP-001 只给 Tech Pack Guide 加了链接，本页未覆盖。

**依据：** 生产 HTML `<main>` 链接抽取（curl，2026-08-18）；本地 `template-parts/technical-article/content-evaluate-technical-knitwear-oem.php` 全文无 `home_url()` 站内链接；`inc/product-category-data.php:155,209,493`。

**失效判定：** 若未部署的本地分支已为本页正文或其他页面加入指向本页的链接（审计时 grep 全仓库未发现），或部署后生产正文出现上下文站内链接，则本条关闭。

**先行指标：** 修复部署后 curl 复查本页 `<main>` 内站内上下文链接数（目标 ≥2 条出站、≥2 个非 Hub 入链页面）；GSC Links 报告中该 URL 的 Internal links 计数变化（修复后 4–8 周观察）。

**修法（最小改动，不自动执行）：**

1. 在本页正文加入 2–4 条自然上下文链接，候选落点：§5 面料控制 → `/knitted-fabrics-manufacturer/`；§4 技术接缝 → `/flatlock-vs-overlock-technical-knitwear/`；§6 开发审批或 §10 报价 → `/technical-knitwear-tech-pack-guide/` 与 `/services/`；
2. 在 Tech Pack 指南（审批/测试章节）和 FLATLOCK 指南正文各加 1 条指向本页的链接；评估是否在相关品类页 `related_links` 中补一条；
3. 锚文本用自然描述性短语，不堆叠 `manufacturer`/`supplier`/`factory` 近义词（检查清单 §9）。

##### W2. OG/Twitter 主图仍为 270 × 270 通用 Logo（已知共享问题，本地已修复待部署）

**观察：** 生产 `og:image` 与 `twitter:image` 均为 `…/uploads/2026/06/cropped-ATHLETIK_R_512.jpg`（270 × 270）；同页 Article JSON-LD 的 `image` 已正确指向封面 `technical-knitwear-oem-evaluation-cover.webp`（1536 × 1024）。

**依据：** 生产 HTML meta 标签与 JSON-LD 抽取；本地 `rank-math.php:126-145` 已为技术文章注册 `og/twitter image_array` 过滤器输出特色封面（SEO-IMP-002），尚未部署。

**失效判定：** 部署后生产 `og:image` 变为封面 WebP 即关闭。

**先行指标：** 部署后 curl 复查 meta；Facebook Sharing Debugger / Twitter Card Validator 抓取预览。

**修法：** 不新增工作，随 SEO-IMP-002 部署验收。本条不重复升级为待办，仅记录生产现状。

##### W3. Twitter 卡片阅读时间显示 "Less than a minute"，与实际篇幅不符

**观察：** 生产 `twitter:label1` = `Time to read`、`twitter:data1` = `Less than a minute`；正文实测约 1,964 词，正常阅读时间约 8–10 分钟。原因是正文由代码模板渲染，Rank Math 从近乎为空的 `post_content` 计算阅读时间。

**依据：** 生产 HTML meta 抽取；`page-evaluate-technical-knitwear-oem.php` 只调用模板，编辑器正文为空。

**失效判定：** 若该字段不影响任何分享展示或点击行为证据，可降级为忽略项；反之部署后字段修正即关闭。

**先行指标：** 修复后 curl 复查 `twitter:data1`；无直接排名信号，仅作元数据准确性改进。

**修法（最小改动）：** 用 Rank Math 的 snippet/reading-time 过滤器按代码渲染正文的词数覆盖该值，或对技术文章关闭阅读时间 snippet。低优先级，可与 W2 同批部署验证。

##### W4. Child stylesheet 在生产页面重复加载（已知共享问题，本地已修复待部署）

**观察：** 生产 `<head>` 同时输出 `myathletik-child-style-css` 与 `generate-child-css`，两者指向同一 `style.css`、同一版本号 `1786599842`。

**依据：** 生产 HTML stylesheet link 抽取；SEO-IMP-003 已在本地去重，待部署。

**失效判定：** 部署后生产只出现一个 child stylesheet handle 即关闭。

**先行指标：** 部署后 curl 复查 `<head>`；Network 面板确认无重复请求。

**修法：** 不新增工作，随 SEO-IMP-003 部署验收。本条仅记录生产现状。

#### 🟢 Passed

- HTTP 200，`robots` 为 `follow, index, max-snippet:-1, max-image-preview:large`；
- Title 为 `How to Evaluate a Technical Knitwear OEM | Athletik`，51 字符，与 `seo-tags.md:148-149` 一致；
- Meta Description 为 147 字符，与 `seo-tags.md:151-153` 一致，含主要词语义（evaluate、cut-and-sew、knitwear OEM）；
- Canonical 自引用到当前 HTTPS/www URL；
- 页面只有一个 H1：`How to Evaluate a Vertically Integrated Knitwear OEM`，与 `docs/sitemap.md:169` 一致；Title 与 H1 的差异（Technical vs Vertically Integrated）是有意的关键词互补，不构成冲突；
- H2/H3 层级正确：15 条文章 H2（11 条编号章节 + Red flags + FAQ + References + CTA）+ 2 条页脚 H2；4 条 FAQ 问题为 H3，位于 FAQ H2 之下；
- JSON-LD 单块可解析，@type 包含 LocalBusiness/Organization、WebSite、WebPage、Article、FAQPage、BreadcrumbList；Article 的 headline、image（封面 WebP + 尺寸）、datePublished/dateModified、author（Organization → About Us）、mainEntityOfPage 完整；
- FAQPage 含 4 条 Question/Answer，与可见 FAQ 一一对应；
- BreadcrumbList 三级（Home → Technical Guides → 本页）与可见面包屑一致；`position` 为字符串属已知可接受偏差，不报；
- Hero 封面图：WebP、`srcset`（800w/1536w）、`sizes`、`width`/`height`、`loading="eager"`、`fetchpriority="high"`、`decoding="async"` 齐全，alt 为描述性文本（`Athletik technical knitwear garment production floor in Zhangjiagang, Jiangsu`），非文件名；这是图片标记的正面样板；
- 页面位于 `page-sitemap.xml`，只出现一次，lastmod 为 `2026-08-11T07:36:03+00:00`，与 Article datePublished/dateModified 一致；
- 6 条外部权威来源链接（Textile Exchange CCS、GOTS、OEKO-TEX、SLCP、DHS UFLPA、ZDHC MRSL）全部可达；Textile Exchange 对 curl 返回 403 属反爬，经浏览器式抓取确认页面存活，不是死链；
- 术语拼写全部符合 §6：FLATLOCK ×2、ACTIVESEAM ×3、OVERLOCK ×1、COVERSTITCH ×1 均为规范大写，无 `activeseam` 小写漂移；正文还专门说明 ACTIVESEAM 是 Merrow 平台名称、不作通用平缝同义词，术语纪律良好；
- 未发现 `never`、`guaranteed`、`chafe-free`、`world-class`、`industry-leading` 等绝对化或空泛声称；未发现未经确认的认证/产能/测试数值声称；
- 正文无 MOQ 数字表述（指南性质页面不需要）；无区域列表，未出现俄罗斯；
- 实体边界安全：正文为通用买家指南，未点名任何 Athletik 法律实体、未把多实体写成同一法律实体、未推断母子公司关系、未提及 BTEXCO；Hero alt 中的 "Zhangjiagang, Jiangsu" 与已确认的中国生产基地表述一致；
- CTA 区（`Start with a controlled project brief` → Contact）与 B2B 买家任务匹配，无 startup/低 MOQ 迎合。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `evaluate technical knitwear OEM` | Title、Meta、URL slug 与正文任务一致承接 | 保持主要词簇 |
| `vertically integrated knitwear OEM` | H1 精确覆盖，§3 专门解构该术语 | 保持，不拆页 |
| 工序所有权 / 可追溯性 / 认证范围 | §3、§5、§9 深度覆盖，附一方标准来源 | 覆盖充分 |
| 法律主体核实 | §2 覆盖，且表述为通用尽调建议，不暴露自身实体关系细节 | 边界正确 |
| 采购任务衔接 | CTA 指向 Contact，但与品类页 / Services 缺正文级衔接 | 见 W1，补内链而非改正文 |
| 错误意图（startup、低 MOQ、消费零售） | 页面无任何迎合 | 边界正确 |

页面当前缺口不是内容深度或关键词，而是它作为一个约 2,000 词的纵深资产，在站内链接图中近似孤岛：只有 Hub 一个正文入口，正文也不向商业页面导流。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无。生产页面与本地数据源（`inc/technical-article-data.php:206-285`、正文模板）未发现 `【CONTENT: ...】` 或 `【NEEDS INPUT: ...】`。该页正文为所有者 2026-08-11 批准的发布稿。

### Suspected facts needing owner confirmation

无。正文全部表述为尽调方法建议（"request / verify / agree"句式），未作任何关于 Athletik 自身能力、认证、产能、客户的事实声称。§9 对 CCS/GOTS/OEKO-TEX/SLCP/UFLPA/ZDHC 的转述均限定了标准适用范围，并明确 "verify the current scope"，没有过度引申。

### Terminology drift

无。FLATLOCK、ACTIVESEAM、OVERLOCK、COVERSTITCH 全部为规范大写；本页是站内术语纪律的正面样本。

### Tone issues

无。语气为技术尽调口吻，符合 §5 "technical, confident, specific"；无消费品牌式修辞。

### Passed

- 面向专业 B2B 买家，无 startup 孵化、低 MOQ 迎合、客户名称或工厂数量声称；
- 正确使用一方权威外部来源支撑方法论，符合 "Schema 与内容不替代真实证据" 的检查清单原则；
- FAQ 回答明确否定 "universal scorecard / arbitrary weights"，与 sitemap 批准的页面目的一致。

## 5. 301 / URL notes

当前规范 URL 正确，不建议改变。

- 本页为 2026-08-11 新建页面，无历史 URL，不需要 301；
- 旧域 `myathletik.com` 已按所有者决定整体 410 下线，不做跨域重定向（AGENTS.md §3）；
- 生产站仍存在的 6 条 `/products/<x>/` 同域 WordPress 301 属 V2-005 调查中事项，与本页无直接映射关系，只记录不动作。

## 6. Suggested next actions — do not auto-apply

1. 按 W1 修法制定本页内链微调简报：本页正文补 2–4 条上下文出站链接，Tech Pack 指南 / FLATLOCK 指南 / 相关品类页补指向本页的入链；属结构性内链工作，参照 IMP-001 的既有模式执行，锚文本避免近义词堆叠；
2. 随 SEO-IMP-002/003 部署验收 W2（OG/Twitter 主图）与 W4（stylesheet 去重），部署后 curl 复查本页；
3. 评估 W3 阅读时间元数据的修复方式（Rank Math 过滤器覆盖或关闭），与 W2 同批验证；
4. 在 GSC 对该 URL 做 URL Inspection，积累 Query/Page 非品牌样本；无数据前保持当前 Title/H1；
5. 本页内容质量可作为后续指南页的正面对照模板（术语纪律、一方来源引用、无绝对化声称）。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 关键词对齐、200、自引用 Canonical、新建页面无历史负担 |
| Title | 保持 | 51 字符、与规范真值一致、任务明确 |
| H1 | 保持 | 唯一、与 sitemap 真值一致，与 Title 形成关键词互补 |
| Meta | 保持 | 147 字符、与 `seo-tags.md` 一致，无术语漂移 |
| 正文 | 保持内容，仅评估内链微调 | 深度、术语、证据纪律均为正；无事实待确认项 |
| 内链 | 需要补强调度（W1） | 双向弱，V2-006 在本页仍未修复 |
| Schema | 保持 | Article + FAQPage + BreadcrumbList 完整，主图问题随 SEO-IMP-002 解决 |
| 社交元数据 | 随 SEO-IMP-002 部署验收；阅读时间低优先修复（W3） | Logo 主图与错误阅读时间均为元数据准确性问题，不阻断索引 |
| 新页面 | 不创建 | 评估类词簇由本页完整承接，拆近义页违反检查清单 §9 |
