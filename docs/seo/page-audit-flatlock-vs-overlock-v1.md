# FLATLOCK vs OVERLOCK 技术指南页面只读 SEO 审计 V1（SEO-IMP-015）

> 审计日期：2026-08-18
>
> 生产 URL：<https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/>
>
> 主要词簇：`FLATLOCK vs OVERLOCK` / `technical knitwear seams`
>
> 页面类型：技术指南（Article + FAQPage + BreadcrumbList Schema）
>
> 依据：[`../../seo-tags.md`](../../seo-tags.md)（第 120–129 行）、[`../sitemap.md`](../sitemap.md) §2B、
> [`seo-implementation-checklist-v1.md`](seo-implementation-checklist-v1.md) §9、AGENTS.md §5/§6
>
> 本地数据源：`inc/technical-article-data.php:57-136`、
> `template-parts/technical-article/page.php`、
> `template-parts/technical-article/content-flatlock-vs-overlock-technical-knitwear.php`
>
> 审计方式：生产 HTML（curl）、生产资源 HEAD/GET、robots/Sitemap/入链页面响应与本地模板静态检查
>
> 实施边界：只读审计；本轮没有修改 URL、Title、H1、Meta、正文、Schema、图片、视频或前端资源

## 1. 结论先行

**结论：无 Critical 问题，无本页独有的新 Warning；页面处于健康状态，保持现有 URL/Title/H1/Meta。**

- 生产页 HTTP 200、可索引、Canonical 自引用正确、H1 唯一且与 `sitemap.md` §2B 真值一致；
- Title（54 字符）与 Meta Description（148 字符）与 `seo-tags.md` 逐字一致，均在内部软目标内；
- JSON-LD 单块可解析，包含 Article、FAQPage（4 问）、BreadcrumbList，Article 主图已使用正确的
  封面 WebP（1448×1086），不是 Logo；
- 两支第一方生产视频（Yamato FLATLOCK 5.5 MB / OVERLOCK 2.6 MB）与两张 poster 均返回 200，
  `preload="metadata"` 不阻塞首屏，robots Meta 已含 `max-video-preview:-1`；
- 入链与 `sitemap.md` §2B 的规划一致：Technical Guides 内容中心（2 处）、首页（1 处）、
  Sportswear（1 处）、Underwear（1 处）均已回链；GSC 已收录（所有者提供状态）；
- 术语大写规范（FLATLOCK / OVERLOCK / ACTIVESEAM / COVERSTITCH）执行干净，无 MOQ、
  区域、认证或绝对化声称问题；
- 本页仅存的两条 Warning 均为已知共享问题（OG/Twitter 主图、stylesheet 重复加载），
  本地已修复待部署，不列为新待办。

## 2. SEO Audit — `/flatlock-vs-overlock-technical-knitwear/`

### Findings by severity

#### 🔴 Critical

无。

生产页返回 HTTP 200；`robots` 为 `follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large`；
未发现缺失 Title、Meta、Canonical、Schema 或意外 `noindex`；H1 唯一。

#### 🟡 Warning

##### W1. OG/Twitter 分享主图仍是通用 270 × 270 Logo（已知共享问题，本地已修复待部署）

- **依据**：生产 HTML 中 `og:image` / `og:image:secure_url` / `twitter:image` 均指向
  `https://www.athletikapparel.com/wp-content/uploads/2026/06/cropped-ATHLETIK_R_512.jpg`
  （270×270）。同页 JSON-LD 的 Article `image` 已是正确的
  `flatlock-overlock-seam-comparison-v2.webp`（1448×1086），说明 Schema 主图无恙，
  偏差只在社交分享图层。`seo-implementation-checklist-v1.md:68` 记录 SEO-IMP-002
  （指南页 OG/Twitter/`primaryImageOfPage` 改用各自批准封面）状态为"本地已完成，待部署验证"。
- **失效判定**：部署后生产 HTML 的 `og:image`/`twitter:image` 变为本页封面 WebP 即关闭；
  若 Rank Math 侧另有页面级社交图覆盖导致代码改动不生效，则需另查 Rank Math 设置。
- **先行指标**：部署后用 curl 或 Facebook Sharing Debugger 重新抓取该 URL，确认 `og:image`
  指向 `flatlock-overlock-seam-comparison-v2.webp`；部署验收时看，不需要长期监测。
- **修法**：无新增动作；随 SEO-IMP-002 部署验收即可。

##### W2. Child stylesheet 在生产页面重复加载（已知共享问题，本地已修复待部署）

- **依据**：生产 HTML 同时输出 `myathletik-child-style-css` 与 `generate-child-css` 两个
  stylesheet，指向完全相同的 `style.css?ver=1786599842`。与 Sportswear 审计 W6 同源，
  SEO-IMP-003 已在本地去重，待部署。
- **失效判定**：部署后生产 HTML 中同一 `style.css` 只出现一个 `<link rel='stylesheet'>`
  即关闭；若 GeneratePress 更新后重新注册 `generate-child`，需复查依赖关系。
- **先行指标**：部署验收时查看页面源代码的 stylesheet 列表；无需长期监测。
- **修法**：无新增动作；随 SEO-IMP-003 部署验收即可。

##### W3. 页面内嵌两支第一方视频，但 JSON-LD 无 VideoObject（增强候选，非错误）

- **依据**：生产 HTML 有两个 `<video controls playsinline preload="metadata" width="720"
  height="1280">`，分别引用 `yamato-flatlock-knitwear-production.mp4` 与
  `overlock-knit-assembly-production.mp4`（均 200 `video/mp4`）；但生产 JSON-LD
  `@graph` 的节点类型只有 LocalBusiness/Organization、WebSite、WebPage、Article、
  FAQPage、BreadcrumbList，没有 `VideoObject`。robots Meta 已含 `max-video-preview:-1`，
  页面具备被视频索引抓取的许可条件，缺的只是结构化描述。
- **失效判定**：若 GSC 视频索引报告已把这两个视频纳入索引并产生视频曝光，或所有者决定
  这两支竖屏工序片段不作为视频搜索资产运营，则本条不成立。
- **先行指标**：实施后看 GSC"视频编入索引"报告是否收录本页、视频查询是否出现曝光；
  部署后 2–4 周观察。
- **修法**：在技术指南 Schema 输出层为两个 `<video>` 各加一条 `VideoObject`
  （`name`、`description`、`thumbnailUrl` 用现有 poster、`contentUrl` 用现有 mp4、
  `uploadDate` 用发布日期）；`duration` 可从 mp4 元数据读取，不需所有者输入。
  最小改动，不动可见内容与现有 Article/FAQPage Schema。优先级低，不阻塞任何部署。

##### W4. Rank Math 输出的 `twitter:data1` 阅读时长为 "Less than a minute"，与实际不符（观察项）

- **依据**：生产 HTML 含 `twitter:label1 = Time to read`、`twitter:data1 = Less than a
  minute`；正文纯文本约 12,000 字符，另有两段视频和对比表，实际阅读时间明显超过一分钟。
  这是 Rank Math 对代码渲染正文（正文在模板而非 post_content）的字数估算偏差，属元数据
  不准确，不影响索引与排名。
- **失效判定**：若 Rank Math 侧修正估算或所有者选择关闭阅读时长字段，本条消失；
  只要能证明该字段不影响分享卡片渲染与 CTR，也可主动关闭本条。
- **先行指标**：无独立指标；如处理，验收时看生产 HTML 中该字段消失或数值合理即可。
- **修法**：最小改动是在 Rank Math 页面/全局设置中关闭"阅读时长" twitter label，
  或在代码层为该页型关闭该 meta；不建议为此改写任何正文。

#### 🟢 Passed

- HTTP 200；robots.txt 未被屏蔽该路径（`/robots.txt` 301 到 `/?robots=1` 后正常输出
  Sitemap 指令，与全站其他页面一致，非本页问题）；
- Title 为 `FLATLOCK vs OVERLOCK for Technical Knitwear | Athletik`，54 字符，
  与 `seo-tags.md:124-125` 逐字一致；
- Meta Description 148 字符，与 `seo-tags.md:127-129` 逐字一致，含主要词与 607/514 参照；
- Canonical 自引用到当前 HTTPS/www URL；
- H1 唯一：`FLATLOCK vs OVERLOCK for Technical Knitwear`，与 `sitemap.md` §2B 一致；
- H2/H3 层级正确：正文 10 个 H2 平铺，4 个 FAQ H3 均位于 `Common buyer questions` H2 之下；
  `Company`/`Contact` 为全站页脚 H2，非本页内容结构问题；
- `og:type=article`，OG/Twitter 的 title/description 与 SEO 字段一致；
- JSON-LD 单块可解析：Article（headline、author=Organization、datePublished/dateModified、
  `about` 含 FLATLOCK/OVERLOCK/ACTIVESEAM/Technical knitwear）、FAQPage 4 问、
  BreadcrumbList 三级（Home → Technical Guides → 本页）；Breadcrumb `position` 为字符串
  属已知可接受偏差（GSC 判有效），不报；
- Hero 封面图标记完整：`srcset`（800w/1448w）、`sizes`、`width`/`height`、
  `loading="eager"`、`fetchpriority="high"`、`decoding="async"`，alt 为描述性文案
  （"Side-by-side comparison of FLATLOCK and OVERLOCK seams on black technical knit
  fabric"），且 `<head>` 有对应 `rel=preload`；这是全站图片标记的正面基准；
- 封面 WebP 268 KB（1448w）/ 77 KB（800w），poster JPEG 137 KB / 97 KB，均在合理范围；
- 两支 mp4（5.5 MB / 2.6 MB）均 200 `video/mp4`，`preload="metadata"` 不自动下载，
  poster 与 width/height 防止布局偏移；fallback 段落提供直接下载链接；
- 页面位于 `page-sitemap.xml` 且只出现一次，`lastmod` 与发布日期一致；
- 7 条外部技术参考链接中 6 条（Yamato ×3、Coats ×2、Merrow）curl 返回 200；
- 出链覆盖 Underwear、Sportswear、Services、Contact、About Us、Technical Guides，
  锚文本为描述性短语；入链与 `sitemap.md` §2B 规划一致且已全部落地；
- 面包屑可见导航与 BreadcrumbList Schema 一致；
- 页面无 `【CONTENT: ...】` / `【NEEDS INPUT: ...】` 占位符残留。

## 3. 搜索意图与页面覆盖

| 检查项 | 当前判断 | 决策 |
|---|---|---|
| `FLATLOCK vs OVERLOCK` 比较意图 | Title、H1、Meta、对比表和两支第一方工序视频直接承接 | 保持 |
| 607/514 线迹参照 | 正文、对比表和 tech pack 清单均给出 607 FLATLOCK / 514 OVERLOCK 参照，并明确 504 不可与 514 互换 | 保持，不扩写 |
| ACTIVESEAM 区分 | 独立 H2 与 FAQ 第 4 问说明 Merrow MB-4DFO 定位，明确不作视频展示且不等于 FLATLOCK | 保持 |
| 买家执行任务（何时指定哪种缝） | `When should a buyer specify FLATLOCK?` / `When may OVERLOCK be the appropriate construction?` 两个 H2 + tech pack 10 项清单覆盖 | 保持 |
| B2B 资格路径 | 文末 CTA 要求提供 garment drawing/tech pack、面料规格、order quantity 和测试要求，指向 Contact | 保持；本页为指南，不出现 MOQ 数字是正确边界 |
| 与其他指南重叠 | tech pack 详情归 `/technical-knitwear-tech-pack-guide/`，OEM 评估归 `/evaluate-technical-knitwear-oem/`，本页只做缝型比较 | 不拆页、不合并 |

页面内容全部由所有者批准的英文正文渲染（`content-flatlock-vs-overlock-technical-knitwear.php`
文件头注明 "Approved body copy"），本轮无文案授权问题。当前缺口不是关键词覆盖，
而是视频结构化数据（W3）这类增强项。

## 4. Brand Voice / Terminology Check

### Placeholders still present

无。

### Suspected facts needing owner confirmation

无新增。正文中所有技术性表述均带条件限定，例如：

- "stitch type 607—is a useful industrial reference, although it is not the only construction
  that may be described as flatlock"；
- "Its suitability must be evaluated on the nominated fabric rather than inferred from the
  stitch name alone"；
- 视频 figcaption 明确 "process evidence, not a controlled same-fabric test"。

Yamato 应用实例均表述为 "Published Yamato applications" / "representative industrial
applications"，有 `references` 区块的一方可核查来源支撑，未扩大为自有产能声称。

### Terminology drift

无。生产正文与 Meta 中：FLATLOCK（25 次）、OVERLOCK（29 次）、ACTIVESEAM（10 次）、
COVERSTITCH（1 次）全部大写规范。仅有的两处小写均为规范允许的自然描述：

- `content-flatlock-vs-overlock-technical-knitwear.php:17`："not the only construction that
  may be described as flatlock"（自然描述）；
- `content-flatlock-vs-overlock-technical-knitwear.php:137`："flat overlock system"
  （引述 Merrow 自身对 MB-4DFO 的措辞，属原生引文）。

Sportswear 审计中发现的 `activeseam` 小写漂移（`seo-tags.md` 历史遗留）在本页 Meta 中
不存在——本页 Meta 未使用 activeseam 一词，术语干净。

### Tone issues

无。全文为条件化技术表述，无 `never`、`chafe-free`、`guaranteed`、`best-in-class` 等
绝对化或空泛词；FAQ 对 "Is FLATLOCK always better…" 的直接回答是 "No"，符合反绝对化要求。

### Passed

- 无 MOQ 数字（指南页正确边界，公开成衣 MOQ 500 pieces per style 只在品类/资格场景出现）；
- 无区域表述，无俄罗斯；
- 无认证、产能、工厂数量、客户名称声称；
- Merrow / Yamato / Coats / ISO 均作为外部技术参照出现，未暗示代理或授权关系。

## 5. 301 / URL notes

当前规范 URL `https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/`
正确，200、自引用 Canonical、已收录，不建议任何改动（符合检查清单 §9"不修改已收录且
表现正常的 URL"）。

本页为本重建新增页面，无历史 URL 需要 301。全站范围内生产仍存在 6 条 `/products/<x>/`
的 WordPress 301（V2-005 调查中）与 Merino 历史路径 404，与本页无直接关联，只记录不动作。

## 6. Suggested next actions — do not auto-apply

1. 随 SEO-IMP-002/003 部署验收 W1、W2（OG/Twitter 主图、stylesheet 去重），无需本页单独动作；
2. 低优先候选：评估为两支内嵌视频补 `VideoObject`（W3），实施前先确认 GSC 视频索引报告
   当前状态；
3. 低优先候选：在 Rank Math 层处理 `twitter:data1` 阅读时长失真（W4），关闭该字段即可，
   不改正文；
4. 人工浏览器抽查一次 ISO 参考链接可用性（curl 被 Cloudflare challenge 拦截，无法确认
   真实访客体验）；若确实不可达，最小改动是替换为可公开访问的 ISO 4915 参照页；
5. 在 GSC 对该 URL 保持 URL Inspection 与 Query/Page 监测；样本不足前保持 Title/H1 不动；
6. 继续下一页审计。

## 7. 页面字段决策

| 字段 | 当前决策 | 原因 |
|---|---|---|
| URL | 保持 | 已收录、200、自引用 Canonical、无历史包袱 |
| Title | 保持 | 54 字符、精确主要词、与 `seo-tags.md` 逐字一致 |
| H1 | 保持 | 唯一且与 `sitemap.md` §2B 真值一致 |
| Meta | 保持 | 148 字符、含 607/514 参照、术语大写规范，无漂移 |
| 正文 | 保持 | 所有者已批准；条件化表述、有第一方视频证据和可核查外部参照 |
| 内链 | 保持 | 出入链均与 `sitemap.md` §2B 规划一致 |
| Schema | 保持现有 Article/FAQPage/BreadcrumbList；VideoObject 为低优先增强候选 | 现有 Schema 可解析且主图正确 |
| 媒体 | 保持 | Hero 图标记为全站正面基准；视频 preload 策略正确，无性能动作 |
| 新页面 | 不创建 | 缝型比较任务由本页完整承接，无蚕食风险 |
