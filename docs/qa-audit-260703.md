# myathletik-child — 上线前 QA 审计报告

**审计日期**: 2026-07-03
**审计范围**: 全部 PHP 模板 + style.css + functions.php + inc/product-category-data.php
**审计方式**: 静态代码审计（LocalWP 实测因站点 502 未能进行渲染层验证）

---

## P0 — 阻塞上线（必须修复）

### P0-1 首页 process-snapshot 链接全部指向已取消的子页（4 条死链）
- **位置**: `template-parts/home/process-snapshot.php:16,21,26,31`
- **现状**: 4 个步骤卡片分别链接到 `/sampling-prototyping/`、`/bulk-production/`、`/quality-control/`、`/export-shipping/`，这些子页已确认取消，链接将 404。
- **建议**: 将 4 个步骤的 `href` 全部改为 `home_url('/services/')`，或去掉 `<a>` 包裹改为纯展示卡片。推荐前者（保留跳转能力）。
- **工作量**: 小

### P0-2 footer 社交链接全部指向 `#`（3 条死链）
- **位置**: `functions.php:542,551,559`（Instagram / YouTube / WhatsApp）
- **现状**: `href="#"`，aria-label 明确写着 `[NEEDS INPUT: ... URL]`。
- **建议**: 上线前必须填入真实社媒 URL，或暂时隐藏社交图标区块。留 `#` 上线会让点击跳到页顶，体验极差。
- **工作量**: 小（需用户提供 URL）或小（隐藏）

### P0-3 footer 仍引用不存在的 `/sitemap/` 页面
- **位置**: `functions.php:587`
- **现状**: 链接 `home_url('/sitemap/')`，但主题内无 `page-sitemap.php`，也未确认 WP 后台有该页。
- **建议**: 确认 WP 是否启用了 sitemap 插件（如 Yoast/Rank Math 的 XML sitemap），否则改为 `home_url('/wp-sitemap.xml')` 或删除该链接。
- **工作量**: 小

### P0-4 footer 引用 `/blog/` 但未确认存在
- **位置**: `functions.php:586`
- **现状**: 链接 `home_url('/blog/')`，主题内无 blog 页面模板，需确认 WP 后台是否有 posts page。
- **建议**: 确认 WP 设置 > 阅读 > 文章页是否分配。若没有博客内容，删除该链接。
- **工作量**: 小

---

## P1 — 应修复

### P1-1 首页 hero 仍使用 stock 照片（pexels）
- **位置**: `template-parts/home/hero.php:12`
- **现状**: `主图/pexels-cottonbro-4614224.jpg` —— Pexels stock 图作为首屏 hero。
- **影响**: AGENTS.md §4 明确要求替换为真实工厂照片；design-brief.md 也强调 "never stock"。首屏是信任建立的第一眼，stock 图损害 B2B 信誉。
- **建议**: 替换为真实工厂/生产线照片（`production/` 下有 Athletik-Factory-scaled.jpg 等可候选）。用户此前说"暂不换"，但上线前应最终确认。
- **工作量**: 小（换路径）+ 用户提供真实图

### P1-2 产品类目页 "Knitted Fabrics" 和 "Sports Accessories" 图库含 stock 图
- **位置**: `inc/product-category-data.php:223-226`（4 张 unsplash）、`:251-253`（3 张 unsplash）
- **现状**: knitted-fabrics 类目图库用了 4 张 `*-unsplash.jpg`；sports-accessories 用了 3 张 `*-unsplash.jpg`。首页产品卡片 `sports accessories/mieke-campbell-esmxlhT-68w-unsplash.jpg` 也是 stock。
- **影响**: 同 P1-1，违反"never stock"规则，且这两个类目恰好是最需要真实物料的。
- **建议**: 优先补拍真实面料/配件照片替换。临时方案可从 `辅图/fabrics-wall.png` 等已有真实图替换面料类目。
- **工作量**: 中（需真实照片）

### P1-3 产品类目页底部 "Launch redirect note" 提示文字会面向访客显示
- **位置**: `template-parts/product-category/page.php:125-138`
- **现状**: 每个类目页底部渲染一段 "Launch note: 301 redirect /products/sportswear/ to /sportswear-manufacturer/ before this page goes live." 用户确认 301 已完成，这段文字现在是面向前端访客可见的内部备注，极不专业。
- **建议**: 删除整个 `ma-product-redirect-note` section（301 已完成，备注无用）。
- **工作量**: 小

### P1-4 首页 style-gallery 和 partnership-trust 含未填写的 `[CONTENT]` 占位符
- **位置**: `template-parts/home/style-gallery.php:69` `[CONTENT: user to write short lookbook intro]`；`template-parts/home/partnership-trust.php:23` `[CONTENT + NEEDS INPUT: ...]`
- **现状**: 占位符文字直接显示在前端。
- **建议**: 上线前必须替换为真实文案，或暂时注释掉该段。partnership-trust 整段需用户确认可公开的客户信息。
- **工作量**: 小（注释）+ 用户写文案

### P1-5 latest-posts 区块在无博客文章时显示占位符
- **位置**: `template-parts/home/latest-posts.php:44`
- **现状**: 无文章时显示 `[CONTENT: user to publish or select latest blog posts]`。
- **建议**: 上线前若无博客内容，应隐藏整个区块（return early），避免占位符外露。
- **工作量**: 小

### P1-6 style.css 有大量硬编码 hex 值未走 :root 变量
- **位置**: `style.css:62,652,656,1456,1576,1615,1721,1907,2276,2352,2597,2669`（多处 `#ffffff` / `#fff`）、`:2744,2750`（`#050505` / `#0c0b0a` 暗色区块）、`:2775,2783,2801,2827,2844,2883`（`#fff`）
- **现状**: :root 定义了 `--ma-color-bg` 等暖色 token，但 body 里 `#ffffff`（纯白）散落十几处，与设计 brief 要求的"暖 off-white / cream 背景"冲突。暗色区块（footer/CTA band）的 `#050505` 也未定义为 token。
- **建议**: 新增 `--ma-color-white: #ffffff`（或改用 `--ma-color-surface`）、`--ma-color-dark: #0c0b0a` token，全局替换硬编码。
- **工作量**: 中

### P1-7 Services 页 process section 用 H2 标记每个 stage 标题，层级重复
- **位置**: `page-services.php:81`
- **现状**: section 已有 H2（`:74` "How your order moves..."），每个 stage 的标题又用 `<h2>`，导致同一 section 多个 H2 且语义扁平化。
- **建议**: stage 标题改 `<h3>`，保持 H1 > H2 > H3 层级。
- **工作量**: 小

### P1-8 联系表单字段无法从代码确认是否含 lead-filtering
- **位置**: `page-contact.php:32`、`template-parts/home/inquiry-cta.php:24`
- **现状**: 两处都用 `[fluentform id="3"]` shortcode，表单字段在 FluentForm 后台配置，代码层无法验证是否含 sitemap 要求的 budget tier / order quantity / selling channel / website / tech pack 上传字段。
- **建议**: 需在 WP 后台 FluentForms 确认表单 id=3 的字段配置，确保 lead-filtering 字段存在且必填。
- **工作量**: 需后台确认

### P1-9 numbers-proof 区块 "3 continents" 描述与列表不一致
- **位置**: `template-parts/home/numbers-proof.php:16`
- **现状**: value="3" unit="continents"，但 note 列出 "Canada, USA, Singapore, UK, Sweden, Russia, Norway, Finland" —— 这些跨 4 大洲（北美、亚洲、欧洲，且 Russia 跨欧亚）。capability-proof.php:23 又写 "North America, Europe and the Nordics"（Nordics 属欧洲）。
- **建议**: 统一口径。推荐改为 value="3" + note 改为 "North America, Europe, and Asia-Pacific"（新加坡代表亚太），删去 Russia（当前地缘敏感且可能已不合作）。
- **工作量**: 小（需用户确认实际合作国家）

### P1-10 首页 hero 图 alt 文本缺失
- **位置**: `template-parts/home/hero.php:16`
- **现状**: hero 用 `background-image`（CSS），无 `<img>` 标签，因此没有 alt 文本。对 SEO 和无障碍不友好。
- **建议**: 改用 `<img>` 标签 + `alt="Athletik Clothing technical knitwear manufacturing facility"`，或保留 background 但添加 `role="img" aria-label="..."`。
- **工作量**: 小

---

## P2 — 优化项

### P2-1 首页 client-logos 的 alt 文本从文件名自动生成，质量参差
- **位置**: `template-parts/home/client-logos.php:36-38`
- **现状**: `$brand_name` 由文件名去除扩展名和数字前缀生成，若文件名不规范（如 `1-yamato-sewing-machine.jpg` → "yamato sewing machine"）alt 就是 "yamato sewing machine client logo"，不一定准确。
- **建议**: 可接受，但建议后续维护时统一 logo 文件名为品牌名。
- **工作量**: 小

### P2-2 Manrope 字体只加载 3 个 weight（600/700/800），body 字体用 system-ui
- **位置**: `functions.php:37`
- **现状**: 标题用 Manrope，正文用 system-ui。design-brief 要求"clean modern sans for body"——system-ui 在不同 OS 上表现不一（Windows=Segoe UI, Mac=SF, Android=Roboto）。
- **建议**: 可接受（性能优先）。若要统一，可加载 Manrope 400/500 weight 用于正文。preconnect 已正确配置。
- **工作量**: 小

### P2-3 style-gallery 跑马灯重复渲染 3 倍图片（性能）
- **位置**: `template-parts/home/style-gallery.php:75` `for ( $set = 0; $set < 3; $set++ )`
- **现状**: 12 组图片循环 3 次 = 36 组 DOM，约 60+ 张 `<img>`，全部 `loading="lazy"` 但量级大。
- **建议**: 可接受（跑马灯需要重复以无缝循环）。建议加 `decoding="async"` 和明确的 `width/height` 防止 CLS。
- **工作量**: 小

### P2-4 语言切换器是纯占位（无功能）
- **位置**: `functions.php:496-509`
- **现状**: 6 个语言按钮（AR/NL/FR/DE/IT/ES）无任何行为，aria-label 已注明 "placeholder"。
- **建议**: 上线前若无多语言计划，建议隐藏；或保留 EN 单语言无切换器。
- **工作量**: 小

### P2-5 brand-partner logo 文件夹含非 brand 文件
- **位置**: `assets/images/brand-partner/`（通过 glob 自动读取）
- **现状**: client-logos.php 自动 glob 该目录所有图片。若目录内混入非客户 logo 文件（如设备图、测试图），会被当成 client logo 展示。
- **建议**: 上线前人工检查该目录，确保只含真实客户 logo。
- **工作量**: 小

### P2-6 "Athletik Clothing" 与 "myathletik" 品牌名混用
- **现状**: 法律实体 "Athletik Clothing Inc."，网站品牌 "myathletik"（小写）。代码里 footer/页面用 "Athletik Clothing"，hero eyebrow 用 "myathletik"，域名是 myathletik.com。
- **建议**: 统一规则——面向用户的品牌名用 "Athletik Clothing"（更正式），URL/技术层用 myathletik。当前基本一致，无需大改。
- **工作量**: 无

---

## 修复优先级总表

| 优先级 | 编号 | 问题 | 工作量 | 需用户输入？ |
|--------|------|------|--------|-------------|
| **P0** | P0-1 | process-snapshot 4 条死链 | 小 | 否 |
| **P0** | P0-2 | footer 社交链接 `#` | 小 | 是（URL）或隐藏 |
| **P0** | P0-3 | footer `/sitemap/` 死链 | 小 | 否 |
| **P0** | P0-4 | footer `/blog/` 待确认 | 小 | 是（有无博客） |
| **P1** | P1-1 | hero stock 图 | 小 | 是（真实图） |
| **P1** | P1-2 | knitted-fabrics/accessories stock 图 | 中 | 是（真实图） |
| **P1** | P1-3 | redirect-note 面向前端显示 | 小 | 否 |
| **P1** | P1-4 | style-gallery / partnership `[CONTENT]` 占位 | 小 | 是（文案） |
| **P1** | P1-5 | latest-posts 占位符 | 小 | 否 |
| **P1** | P1-6 | 硬编码 hex 值 | 中 | 否 |
| **P1** | P1-7 | services stage H2 层级 | 小 | 否 |
| **P1** | P1-8 | 联系表单字段待后台确认 | — | 是（后台） |
| **P1** | P1-9 | numbers "3 continents" 口径 | 小 | 是（实际国家） |
| **P1** | P1-10 | hero 图无 alt | 小 | 否 |
| **P2** | P2-1~6 | 优化项 | 小 | 视情况 |

---

## 可立即批量修复的（无需用户输入，共 6 项）

以下可立即动手，不需要等用户决策：
1. **P0-1** process-snapshot 4 死链 → 改指向 `/services/`
2. **P1-3** 删除 redirect-note section
3. **P1-5** latest-posts 无文章时隐藏区块
4. **P1-6** 硬编码 hex → 改用 token
5. **P1-7** services stage H2 → H3
6. **P1-10** hero 图加 aria-label

## 需用户决策的（共 6 项）
1. **P0-2** 社交链接 URL（或隐藏）
2. **P0-4** 有无博客 / `/blog/` 去留
3. **P1-1** hero 真实图（用户说暂不换，上线前最终确认）
4. **P1-2** knitted-fabrics / accessories 真实图
5. **P1-4** style-gallery / partnership 文案
6. **P1-8** FluentForm 后台确认 + **P1-9** 合作国家口径
