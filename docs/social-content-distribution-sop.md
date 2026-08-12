# LinkedIn + Instagram 技术内容分发 SOP

适用范围：Athletik Clothing 将官网已审核的技术指南改编为 LinkedIn 公司主页和
Instagram 的自然内容。本文按单人运营的实际工作量设计；完成基线后再考虑加量。

最后核对：2026-08-12。

## 1. 内容与事实来源

1. 以已经审核、上线的官网技术指南为内容母本，不从社交平台文案反向创造新的制造事实。
2. 产品应用、机器、针线配置、测试结论和实体名称只使用站内已批准内容或所有者本轮确认的信息。
3. 术语统一使用 `FLATLOCK`、`OVERLOCK`、`ACTIVESEAM`、`tech pack` 和
   `Merino wool` 等项目核准写法。
4. 不把常见应用写成绝对规则，也不把一种接缝笼统描述为比另一种更好。
5. 真实生产图片或视频由所有者选择；不同面料或产品的画面只能作为各自工艺证据，不能包装成同面料对照实验。

## 2. 单主题内容包结构

每个主题建立一个独立文件夹，建议命名为：

```text
YYYY-MM-topic-slug/
├── source/                 原始图片、视频截图和文章封面
├── linkedin/images/       LinkedIn 多图帖
├── instagram/             Instagram Carousel 与 Story
├── preview/               联系表或总览图
├── captions.md            两个平台的最终文案和 UTM
├── alt-text.md            图片替代文字
├── metrics-template.csv   七天数据记录
├── 发布说明.md             本轮操作步骤
└── generate-package.ps1   可重复生成的脚本（如适用）
```

素材包属于运营资产，保存在视频素材盘，不放入 WordPress 主题或 Git。网站图片继续遵守
`AGENTS.md` 的 uploads 规则；社交媒体素材不复制进网站 uploads，除非它们也被网站页面实际使用。

## 3. 图片规格与页面顺序

- 主规格：JPG，1080 × 1350 px，4:5。
- 建议数量：5–7 张；本次验证使用 7 张。
- 通用顺序：问题封面 → 概念 A → 概念 B → 对照 → 判断方法 → 买家检查清单 → 官网文章 CTA。
- 首图必须能在不依赖正文的情况下说明主题。
- 最后一张只放一个主要动作，通常是阅读官网完整指南。
- 发布前同时检查单张图片和联系表，避免字号、裁切、重复信息或不可见文字。

## 4. LinkedIn 执行

当前 Athletik Clothing 公司主页的实际发布界面不支持 PDF。以后仍以当时后台实际界面为准；
在功能没有变化时，使用 7 张 4:5 JPG 组成多图帖，不再把 PDF Document Post 当成默认方案。

LinkedIn 文案采用技术教育型结构：

1. 首句指出买家常见的规格误区。
2. 简要解释两种结构解决的不同问题。
3. 给出可执行的 tech pack 检查项。
4. 说明完整指南还覆盖哪些内容。
5. 使用 LinkedIn 专属 UTM 链接，并保留 4–6 个精准标签。

推荐 UTM 结构：

```text
utm_source=linkedin
utm_medium=organic_social
utm_campaign=technical_guides
utm_content=<topic>_multi_image
```

如果当时的 LinkedIn 界面不能一次上传全部图片，使用首图发布单图帖并保留完整正文和文章链接；
不要为了迁就界面把一套内容拆成多条连续帖子。

## 5. Instagram 执行

Instagram 文案比 LinkedIn 更短：首句提出选择问题，第二行提示滑动，然后用简短段落解释判断条件。
正文不重复图片上的全部文字，结尾使用“保存供下次 tech pack 审核参考”一类的收藏动作。

本轮采用的进站路径是：Carousel 负责内容阅读与收藏，Story 使用原生 Link Sticker 指向完整指南。
Sticker 与 Instagram 使用独立 UTM：

```text
utm_source=instagram
utm_medium=organic_social
utm_campaign=technical_guides
utm_content=<topic>_story
```

标签控制在约 5–7 个，优先技术、产品和制造意图，不堆叠泛流量标签。

## 6. 审核与发布清单

- [ ] 官网母文章已上线，URL、移动端和 CTA 正常。
- [ ] 所有工艺和设备陈述都有站内批准内容或所有者确认支持。
- [ ] 所有者审核七张图片、顺序和两版英文文案。
- [ ] LinkedIn 与 Instagram 使用各自的 UTM。
- [ ] 图中和正文中的技术术语一致。
- [ ] 没有未确认的客户、认证、产能、交期或性能结论。
- [ ] 发布身份、公开范围、图片顺序和链接目标正确。
- [ ] 发布日期和帖子 URL 写入发布日志。

## 7. 复盘节奏

起步阶段不做每日分析。每条内容满七个完整自然日后记录一次结果；阶段性汇总时再比较主题和平台。

LinkedIn 至少记录：展示、覆盖（如平台提供）、互动、反应、评论、转发、链接点击、主页访问和新增关注。

Instagram Carousel 至少记录：覆盖、展示、点赞、评论、收藏、分享、主页活动和新增关注；
Story 记录覆盖与 Link Sticker 点击。GA4 按 `technical_guides` Campaign 检查 Sessions 和 Engaged sessions。

不使用两个平台不同口径的数字直接判定哪个平台“更好”。首轮目标是验证内容能否获得专业互动、收藏、关注和可归因的网站访问。

## 8. 首次验证案例

首轮已发布案例和待补录项见
[`social-content-publishing-log.md`](social-content-publishing-log.md)。以后新主题复制本 SOP，
而不是从聊天记录重新推导流程。
