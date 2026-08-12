# Athletik Clothing GEO 工作台

> 建立日期：2026-08-12
>
> 规范站：<https://www.athletikapparel.com/>
>
> 当前阶段：第一轮 GEO 基础建设与 GEO-07 内容分发已完成；GEO-06 分发包已准备并等待所有者审核，
> 同时进入抓取等待、其余指南分发和月度复测阶段。
>
> 使用范围：以后与 Athletik Clothing GEO 有关的计划、执行顺序和阶段结论先更新本文件；详细测试证据继续追加到对应日志。

## 1. GEO 在本项目中的定义

本项目把 GEO 视为 SEO、第一方技术内容、实体一致性和站外传播共同形成的长期可见性工作，
目标是提高 Athletik Clothing 在生成式搜索回答中被准确识别、提及并引用规范站的概率。

GEO 不等于添加特殊 AI 标记，也不承诺固定排名。当前执行环包括：

1. 建立中性提示词基线。
2. 统一公开品牌、法律实体、地址、官网和社交资料。
3. 发布可抓取、可引用的第一方技术内容。
4. 通过 LinkedIn、Instagram 和后续可用渠道分发内容，形成站外发现入口和一致的主题信号。
5. 等待抓取后用相同提示词复测，并结合 GA4、Search Console 和平台数据判断是否产生真实引用或访问。

因此，2026-08-12 完成的官网指南 → LinkedIn/Instagram 七图内容分发属于 GEO 第一轮执行的一环，
同时也是品牌内容运营。社交发布本身不是生成式引擎引用的保证，价值在于扩大内容发现、保持实体与主题一致，
并为真实用户和搜索系统提供可追踪的规范站入口。

## 2. 文档路由

| 文档 | 用途 |
|---|---|
| 本文件 `GEO.md` | GEO 总状态、优先级和下一步工作台 |
| [`testing/prompt-baseline.md`](testing/prompt-baseline.md) | 固定 GEO-01～08、各引擎原始结果、证据和实体冲突明细 |
| [`distribution/social-content-sop.md`](distribution/social-content-sop.md) | 官网指南改编为 LinkedIn/Instagram 内容的执行 SOP |
| [`distribution/publishing-log.md`](distribution/publishing-log.md) | 每次站外分发的发布时间、链接和七日数据 |
| [`../sitemap.md`](../sitemap.md) | 规范 URL、页面定位与信息架构 |
| [`../progress.md`](../progress.md) | 全项目状态；只有 GEO 阶段摘要，不替代本工作台 |

新 agent 开始 GEO 工作时，应先读 `AGENTS.md`、本文件和 `testing/prompt-baseline.md`，
再按任务读取分发 SOP 或发布日志。不要仅依赖聊天历史。

## 3. 核准实体与边界

| 字段 | 当前核准值 |
|---|---|
| 公开品牌 | Athletik Clothing |
| 美国实体 | Athletik Clothing Inc. |
| 中国实体 | Zhangjiagang Athletik Clothing Co., Limited |
| 规范站 | <https://www.athletikapparel.com/> |
| LinkedIn | <https://www.linkedin.com/company/111831319/> |
| Instagram | <https://www.instagram.com/athletikclothinginc/> |
| YouTube | <https://www.youtube.com/@athletikclothinginc> |
| 定位 | Vertically integrated OEM for technical knitwear |
| 公开 MOQ | 每款 1,000 件 |

两家实体属于同一 Athletik 业务体系，但分别为美国和中国实体名称，运营职责不同；
不得写成同一个法律实体，也不得自行推断母子公司、签约、出口、雇佣或知识产权关系。

`myathletik.com` 已按所有者决定完全下线，已检查入口返回 HTTP 410，不做跨域 301，
不再属于优化范围。以后若搜索或 AI 仍引用它，只作为过期缓存信号记录。

## 4. 当前完成状态

### A. 基线与实体层 — 已完成

- [x] 建立固定 GEO-01～08 提示词和记录口径。
- [x] 在独立 Temporary Chat 中完成 ChatGPT Search GEO-01～08 首轮中性基线。
- [x] 将个性化回答与中性基线分开；出现 `your own` 等上下文信号的结果不计入中性成绩。
- [x] 确认公开品牌、美国实体、中国实体、规范站、办公地址和官方社交页面。
- [x] 在规范站 JSON-LD 中部署核准的 `legalName` 与官方 `sameAs`。
- [x] 旧 `myathletik.com` 下线并从当前 GEO 改进范围排除。

### B. 技术与可抓取性 — 已完成当前阶段

- [x] `robots.txt` 与 Rank Math Sitemap 可访问。
- [x] 浏览器、Googlebot、OAI-SearchBot 和 PerplexityBot 可访问指南页面。
- [x] Technical Guides 内容中心与三篇基础指南已上线。
- [x] 四个新 URL 已进入 Sitemap，并已在 Search Console 逐个申请索引。
- [x] 三篇指南具备自引用 canonical、唯一 H1、内部链接、图片 alt 和相应 Article/FAQ/Breadcrumb/ItemList Schema。

当前只需要等待 Search Console 更新，不重复申请索引，也不因短期未收录频繁修改页面。

### C. 第一方内容 — 三篇基础建设已完成

| 对应意图 | 已上线内容 | 分发状态 |
|---|---|---|
| GEO-07 | <https://www.athletikapparel.com/flatlock-vs-overlock-technical-knitwear/> | LinkedIn 七图帖与 Instagram Carousel 已于 2026-08-12 发布；Story 状态待补录 |
| GEO-06 | <https://www.athletikapparel.com/technical-knitwear-tech-pack-guide/> | 官网已上线；七图分发包已于 2026-08-12 准备，待所有者审核与发布 |
| GEO-08 | <https://www.athletikapparel.com/evaluate-technical-knitwear-oem/> | 官网已上线；站外分发待做 |

内容中心：<https://www.athletikapparel.com/technical-guides/>。

### D. GEO-07 首轮分发 — 已完成

- [x] 使用真实 Yamato FLATLOCK 和 OVERLOCK 生产画面制作七张 1080 × 1350 JPG。
- [x] LinkedIn 使用技术教育型七图帖；当前公司主页实际界面不支持 PDF，因此 PDF 只作内部预览。
- [x] Instagram 使用更短的 Carousel 文案，强调滑动、收藏和 tech pack 应用。
- [x] LinkedIn 与 Instagram 使用独立 UTM。
- [x] 素材包、最终文案、发布说明和数据模板已归档。
- [ ] 补录 LinkedIn 与 Instagram 公开帖子 URL。
- [ ] 确认 Instagram Story 是否发布。
- [ ] 2026-08-19 起记录满七个自然日的平台和 GA4 数据。

详细记录见 [`distribution/publishing-log.md`](distribution/publishing-log.md)。

## 5. 当前 GEO 结果摘要

首轮 ChatGPT Search 中性基线的方向性结论如下；所有逐条证据以
[`testing/prompt-baseline.md`](testing/prompt-baseline.md) 为准：

- GEO-01：能识别技术针织定位和中国制造基地，但旧 LinkedIn 的 New York headquarters 字段造成实体口径干扰。
- GEO-02：能认可规范站的 technical/performance knitwear OEM/ODM 定位，但实体角色说明仍不完整。
- GEO-03：独立 Temporary Chat 中 Athletik 位列 FLATLOCK/ACTIVESEAM 中国供应商短名单第一，属于当前最强的非品牌提示词信号。
- GEO-04：中性测试未出现 Athletik，说明通用 sportswear OEM + 1,000 件采购意图仍是缺口。
- GEO-05：中性测试未出现 Athletik，且提示词容易被解释成消费品牌/产品推荐；Merino wool OEM 发现仍是缺口。
- GEO-06：中性回答偏向横机毛衫 tech pack，Athletik 未出现；已上线 cut-and-sew technical knitwear 指南用于纠正语义。
- GEO-07：中性回答没有引用 Athletik，且技术结论过于绝对；对应第一方指南和首轮社交分发已经完成。
- GEO-08：中性回答没有引用 Athletik，并偏向横机毛衫尽调；对应 OEM 评估指南已经上线。

不能因为第一轮站内建设和分发完成，就把上述可见性缺口标记为已经解决。只有后续干净环境复测、
规范站引用或可归因访问才能说明变化。

## 6. 下一步工作顺序

### 优先级 1 — 完成本轮记录，不马上重测

1. 补录 2026-08-12 LinkedIn 与 Instagram 公开帖子 URL。
2. 确认 Story 是否发布；若没有，可补发已准备的 Story，并记录实际时间。
3. 2026-08-19 起记录 GEO-07 分发的七日平台数据与 GA4 `technical_guides` Campaign 数据。
4. 在 Search Console 下一次正常更新后检查四个新 URL 的索引状态；目前不重复提交。

### 优先级 2 — 分发另外两篇已上线指南

按单人保守节奏，一次只做一个主题，不要求连续两天完成：

1. `What to Include in a Tech Pack for Technical Knitwear`（对应 GEO-06；素材包已准备，待审核与发布）。
2. `How to Evaluate a Vertically Integrated Knitwear OEM`（对应 GEO-08）。

两篇都复用已经验证的七图或精简五图流程，并分别建立内容包、UTM、发布记录和七日复盘。
优先做 GEO-06，因为当前中性回答存在明显的 sweater/flat-knitting 语义偏移，第一方内容可提供更直接的纠偏材料。

GEO-06 运营素材包位于 `D:\B-视频素材\营销内容包\2026-08-technical-knitwear-tech-pack\`（Git 外）。
它包含七张 LinkedIn/Instagram 卡片、Story、英文文案、独立 UTM、alt text、可编辑 PPTX、审核 PDF、
联系表和七日数据模板。没有使用额外视频，也没有把“已准备”误记为“已发布”。

### 优先级 3 — 等待抓取后进行第一轮复测

- 不在当前长期 GEO 工作对话中运行中性测试，因为该对话已经包含大量 Athletik 上下文。
- 继续使用全新的 Temporary Chat；每条提示词单独开一个对话，记录第一次回答。
- 固定 GEO-01～08 不改写，才能与 2026-08-10 首轮结果比较。
- 建议在三篇指南已获得合理抓取时间后进行；以 2026 年 9 月的月度窗口为首选，而不是发布当天反复测试。
- ChatGPT Search、Perplexity、Gemini/Google AI 体验按可用性执行；某引擎不可用时如实记录，不用其他产品替代后混算。

### 优先级 4 — 处理仍可控制的实体冲突

- 旧 LinkedIn 国际页面仍可能干扰 GEO-01；如能取得管理权限，再核对和更新。
- `ultramerino.com` 所有权已确认，但保留、更新、canonical 或下线策略尚未决定；先审计流量、索引、反向链接和历史声明。
- `athletik.com`、`athletik.nyc`、`athletik.com.cn`、`powermerino.com` 和 `sportsbaselayer.com` 的所有权、可编辑性与当前价值仍需逐个确认。
- 不批量处理历史域名，也不把历史站中的认证、设备、产能或材料声明自动并入规范站。

### 暂不优先

- 不制作 `llms.txt` 或所谓 AI 专用 Schema。
- 不为了 GEO 临时堆量发布低信息密度文章。
- 不每日重复同一提示词。
- 不把 Instagram/LinkedIn 的展示量等同于 GEO 提及或引用。
- 不在没有证据的情况下采购目录链接或制造第三方评价。

## 7. 本对话的工作约定

从 2026-08-12 起，当前对话作为 Athletik Clothing 的 GEO 工作台，适合进行：

- 确定下一篇 GEO 内容与站外分发包。
- 分析用户从 Temporary Chat 或其他引擎带回的回答、链接和截图。
- 更新基线表、实体冲突、索引状态和七日/月度数据。
- 根据证据决定下一轮站内内容或可控资料修正。

本对话不作为中性 GEO 测试环境。新对话或新 agent 应通过本文件恢复项目状态；中性测试仍必须在无 Athletik 历史上下文的 Temporary Chat 中完成。

## 8. 每次 GEO 回合的最小记录

每次完成实际动作后至少记录：

- 日期和对应 GEO 提示词/意图。
- 改动或发布的规范 URL。
- 渠道、公开内容 URL 和 UTM。
- 测试所用引擎、模式、是否 Temporary Chat，以及第一次回答证据。
- 品牌是否被提及、规范站是否被引用、是否出现过时/错误实体信息。
- 下一次检查日期；未知字段明确写待补录。

GEO 是持续循环，不使用单一“全部完成”状态。当前准确表述是：**第一轮基础建设和 GEO-07 分发已完成；效果验证与后续两篇分发仍在进行中。**
