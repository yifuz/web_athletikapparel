# Athletik Clothing SEO 审查与处理记录

> 网站：<https://www.athletikapparel.com/>  
> 首次审查日期：2026-07-29  
> Baseline V2 审查日期：2026-08-15
> 当前阶段：Baseline V2 线上技术审查已完成；无抓取阻断，等待最新 Search Console 数据
> 文档用途：记录 SEO 基线、待处理问题、处理顺序、验证结果和后续决策
> 状态边界：Baseline V2 的公开页面、Sitemap 和 robots 检查是 2026-08-15 当前结果；
> 本文仍未记录 2026-08-06 之后的新一轮 Search Console 复查结果，不能把历史收录数字当作当前数字

## 1. 当前结论

2026-08-15 的 Baseline V2 结论仍然是：网站整体 SEO 基础正常，没有发现会阻止搜索引擎抓取或收录的全站性问题：

- `page-sitemap.xml` 当前包含 17 个唯一 URL：16 个受主题管理的核心页面，加 Privacy Policy。
- 17 个 Sitemap URL 均返回 HTTP 200，未发现意外 `noindex`。
- 每页均只有一个 Title、一个 Meta Description、一个 H1、一个自引用 Canonical 和一个可解析的 JSON-LD 数据块。
- 16 个受管页面的 Title、Meta Description 和 H1 均与 `seo-tags.md` / `docs/sitemap.md` 一致。
- `robots.txt` 可访问，并声明最终的 Rank Math Sitemap。
- 首选域名已统一为 `https://www.athletikapparel.com/`。
- 17 个页面均至少从另一个站内页面获得链接，没有孤立页；未发现业务页面内链 404。
- 页面标题层级没有 H1 重复或 H2/H3 跳级。
- 全站图片标签未发现缺少 `alt` 属性或直接使用文件名作为 alt 的情况。

Baseline V2 没有 Critical 问题，但记录了 8 组非阻断警告：最新 Search Console 数据缺口、部分 Title/Meta 软长度超限、Privacy Policy 元数据与 Schema、首页社交描述缺失、历史路径跳转与规划状态不一致、两篇新指南的内链入口较少、两段较大的自动播放 Hero 视频，以及 SEO 字段存在两套来源。完整证据见第 10 节。

## 2. 首轮审查范围（2026-07-29）

### 核心页面

- 首页
- Sportswear Manufacturer
- Underwear Manufacturer
- Outdoor Clothing Manufacturer
- Merino Wool Manufacturer
- Silk Clothing Manufacturer
- Knitted Fabric Manufacturer
- Sports Accessories Manufacturer
- Services
- Sustainability
- About Us
- Contact

### 技术项目

- HTTP 状态码
- robots.txt
- XML Sitemap
- index/noindex
- Canonical
- Title
- Meta Description
- H1
- Open Graph / Twitter 元数据
- JSON-LD 结构化数据
- 内部链接
- 默认 WordPress 内容
- 首页 Lighthouse 移动端实验室测试
- HTTPS 和首选域名跳转

## 3. 首轮处理清单

状态说明：

- `待处理`：尚未开始
- `处理中`：已经开始修改，尚未完成验证
- `待上线验证`：代码已完成，等待生产环境核对
- `已完成`：线上验证通过
- `已跳过`：复核后确认影响接近零或当前实现正确，不进行修改
- `暂缓`：已决定以后处理

| ID | 优先级 | 状态 | 问题 | 处理目标 |
|---|---|---|---|---|
| SEO-001 | 高 | 已完成 | 默认 WordPress 页面允许索引并出现在 Sitemap | 删除或设为 noindex，并从 Sitemap 移除 |
| SEO-002 | 高 | 已完成 | 10 个核心页面输出两份 Meta Description | 每页只保留一份描述，统一管理来源 |
| SEO-003 | 高 | 已完成 | 首页存在两个 H1 | Hero 保留 H1，页头品牌名称改为非 H1 元素 |
| SEO-004 | 高 | 已完成 | 首页图片负载约 29.9MB，移动端性能较差 | 已使用无损/Q100 WebP 和响应式尺寸替换主要图片 |
| SEO-005 | 中 | 已完成 | 首页 Open Graph、Twitter 和部分 Schema 标题显示为 `Athletik Clothing -` | 与正式首页 SEO 标题统一 |
| SEO-006 | 中 | 已完成 | 多个企业落地页被标记为 Article，并带个人作者 | 调整为更准确的页面类型和 Schema |
| SEO-007 | 中 | 已完成 | Sitemap 旧记录包含默认内容、首页重复及不可靠的 lastmod | 保持 URL 清洁，并让 lastmod 反映真实重要更新 |
| SEO-008 | 中 | 已完成 | Products 导航实际指向首页产品区，需核实 `/products/` 的 404 是否构成问题 | 确认首页产品区承担 Hub 功能，不建立重复的空页面 |
| SEO-009 | 低 | 已跳过 | 非首选裸域 HTTP 存在两跳，页脚 Sitemap 链接发生一次 301 | 影响接近零，保留现状 |
| SEO-010 | 高 | 已完成 | 公开查询暂未发现 Google 收录结果 | Search Console 已确认首页收录、Sitemap 可读且代表性产品页可以编入索引 |
| SEO-011 | 低 | 已跳过 | 首页部分图片使用空 alt | 已确认全部为空的图片均为装饰图或无障碍隐藏的重复 Logo |

## 4. 首轮问题证据与处理要求

### SEO-001：默认 WordPress 页面

以下页面当前返回 200、允许索引，并出现在 XML Sitemap：

- `/hello-world/`
- `/sample-page/`
- `/category/uncategorized/`

2026-07-29 开始处理时重新核对：

- `Hello world`：文章 ID 1，状态为 `publish`，分类 ID 1。
- `Sample Page`：页面 ID 2，状态为 `publish`。
- `Uncategorized`：分类 ID 1，当前文章数量为 1。
- 三个公开 URL 当前均返回 HTTP 200。

2026-07-29 删除内容并刷新 Rank Math、固定链接和 Flywheel 缓存后复查：

- `/hello-world/` 已稳定返回 HTTP 404，REST 中已无公开对象。
- `/sample-page/` 已稳定返回 HTTP 404，REST 中已无公开对象。
- 两个默认内容 URL 已从全部 Sitemap 中移除。
- `Uncategorized` 的文章数量已归零，并已从 Sitemap Index 和分类 Sitemap 中移除。
- `/category/uncategorized/` 仍返回 HTTP 200；Rank Math 后台设置没有在直接 URL 上稳定输出 `noindex`。
- 第一版 `rank_math/frontend/robots` 兜底规则上线后，直接 URL 仍未输出 robots 标签，因此不继续依赖插件的归档元数据流程。
- 子主题已改为只在 `Uncategorized` 为空时将该归档设为真正的 HTTP 404；如果以后该分类有文章，规则不会触发。
- PHP 语法检查已通过。

2026-07-29 最终线上验收：

- `/hello-world/` 返回 HTTP 404。
- `/sample-page/` 返回 HTTP 404。
- `/category/uncategorized/` 返回 HTTP 404。
- 首页和 Sportswear 核心产品页仍返回 HTTP 200，未被规则误伤。
- Sitemap Index、post sitemap 和 page sitemap 均无上述默认 URL 或分类 Sitemap 残留。
- SEO-001 状态：已完成。

处理要求：

1. 确认这些页面没有业务用途。
2. 删除默认文章、默认页面和无用分类，或将其设置为 `noindex`。
3. 清理后确认它们不再出现在 Sitemap。
4. 再次访问 URL，确认返回 404/410，或仍存在时带有 `noindex`。

### SEO-002：重复 Meta Description

发现重复描述的页面：

- 7 个产品分类页
- Services
- Sustainability
- About Us

初步原因：

- Rank Math 输出一份 Meta Description。
- 子主题 `functions.php` 中的 `wp_head` 回调又手动输出一份。

2026-07-29 处理记录：

- 已逐页核对 7 个产品分类页、Services、Sustainability 和 About Us 的线上描述，确认 Rank Math 中均已有完整描述。
- 已从子主题移除产品分类页共用的手动描述输出，以及 Services、Sustainability、About Us 的三组手动描述输出。
- 首页原本只有主题输出的一份描述，继续保留。
- Contact 原本只有 Rank Math 输出的一份描述，未做改动。
- 本地检查 12 个核心页面，每页均只输出一个 Meta Description。
- PHP 语法检查通过。

2026-07-29 最终线上验收：

- 7 个产品分类页、Services、Sustainability、About Us、首页和 Contact 均返回 HTTP 200。
- 上述 12 个核心页面均只输出一个非空 Meta Description。
- 10 个原重复页面均保留 Rank Math 描述，首页和 Contact 的原唯一描述保持不变。
- SEO-002 状态：已完成。

处理要求：

1. 每个页面最终只能输出一个 `<meta name="description">`。
2. 保留现有已确认的描述文案。
3. 明确以后由 Rank Math还是主题代码统一管理，避免两套来源并存。
4. 上线后检查页面源代码，而不只检查后台输入框。

### SEO-003：首页双 H1

当前首页 H1：

1. 页头品牌名称：`Athletik Clothing`
2. Hero 标题：`Performance Knitwear Manufacturer`

处理目标：

- Hero 标题继续使用唯一的 H1。
- 页头品牌名称改为 `p` 或其他非标题元素。
- 保持现有视觉样式不变。

2026-07-29 处理记录：

- 页头品牌 `Athletik Clothing` 的容器已从条件性 `h1` 改为固定的 `p`。
- 现有 `.main-title` 和 `.ma-brand-title` 类名及内部链接结构保持不变，不需要修改 CSS。
- Hero 标题 `Performance Knitwear Manufacturer` 继续使用 H1。
- 本地首页 H1 数量为 1，品牌容器为 `p`。
- 本地其余 11 个核心页面均保持一个 H1。
- PHP 语法检查通过。

2026-07-29 最终线上验收：

- 首页返回 HTTP 200，唯一 H1 为 `Performance Knitwear Manufacturer`。
- 页头品牌容器为 `p.ma-brand-title`，不再使用 H1。
- 其余 11 个核心页面均返回 HTTP 200，并且每页恰好一个 H1。
- SEO-003 状态：已完成。

### SEO-004：首页图片性能

2026-07-29 移动端 Lighthouse 实验室数据：

- SEO：100
- Performance：59
- 总网络传输量：约 29.9MB
- FCP：6.2 秒
- LCP：33.1 秒
- TBT：100ms
- CLS：接近 0

体积最大的资源包括：

1. Merino 分类图片：约 12.1MB
2. 首页 Hero 图片：约 5.1MB
3. Knitted Fabrics 分类图片：约 2.4MB
4. Sports Accessories 分类图片：约 1.9MB
5. Underwear 首页图片：约 1.7MB
6. Silk 分类图片：约 1.6MB
7. Outdoor 分类图片：约 1.6MB
8. Sportswear 分类图片：约 1.4MB

处理要求：

- 优先处理以上 8 个资源。
- 为实际显示尺寸生成合适的桌面端和移动端版本。
- 优先使用 WebP 或 AVIF。
- 首屏关键图片不能错误地延迟加载。
- 非首屏图片应继续使用懒加载。
- 优化前后分别记录 Lighthouse 数据。
- 最终性能判断以 Search Console Core Web Vitals 的真实用户数据为准。

### SEO-004 图片盘点（2026-07-29）

本轮只盘点资源，没有修改、压缩、改名或替换任何图片，也没有修改页面模板。

最新 Lighthouse 实验室基线：

| 模式 | Performance | FCP | LCP | TBT | CLS | 总传输量 | 图片预计可节省 |
|---|---:|---:|---:|---:|---:|---:|---:|
| 移动端 | 57 | 7.8s | 33.8s | 0ms | 0 | 29,879KiB | 28,365KiB |
| 桌面端 | 68 | 2.9s | 2.9s | 0ms | 0.001 | 29,733KiB | 28,558KiB |

首页图片结构：

| 区域 | 唯一文件数 | 当前资源体积 | 当前情况 | 优先级 |
|---|---:|---:|---|---|
| Hero | 4 | 5.27MB | 4 张均 eager，主图为高优先级 PNG，无响应式尺寸 | 第一批 |
| 产品分类卡 | 7 | 22.66MB | JPG/PNG 原图直接加载，无 WebP/AVIF 和 srcset | 第一批 |
| Brand partner logos | 93 | 2.47MB | 每个 Logo 在循环轨道中出现两次；显示尺寸约 56–72px | 第二批 |
| Partnership 图片 | 1 | 1.96MB | 1672×941 PNG，lazy，实际显示区域远小于原图 | 第二批 |
| Lookbook | 46 | 4.48MB | 已优先加载 WebP，但 WebP 仍保持较大的原始像素；轨道中每张出现两次 | 第三批 |
| Certifications | 10 | 0.15MB | 体积已经较小 | 暂不处理 |
| Site Logo | 1 | 0.04MB | 体积较小 | 暂不处理 |

说明：

- 首页共有 302 个 `<img>` 标签，对应 162 个唯一 fallback 图片 URL。
- 其中 186 个标签来自 93 个品牌 Logo 的双轨重复，92 个标签来自 46 张 Lookbook 图片的双轨重复。
- Lookbook 的 JPG/PNG fallback 原图很大，但现代浏览器当前会使用对应 WebP；46 张实际 WebP 合计约 4.48MB，因此不应排在 Hero 和分类卡之前。
- 当前首屏/近首屏最主要的负载来自 Hero 与产品分类卡，两组共约 27.93MB。

#### 第一批：Hero 与产品分类卡

| 页面用途 | 相对路径 | 原始尺寸 | 当前体积 | 实际显示尺寸：桌面 / 移动 | 建议输出 |
|---|---|---:|---:|---:|---|
| Hero 主图 | `sportswear/performance-knitwear-campaign-4x7-2160x3780.png` | 2160×3780 | 4.97MB | 396×706 / 360×224 | 保持原视觉焦点；生成约 720w、960w 的 WebP/AVIF；移动端横向裁切需单独预览 |
| Hero sewing | `production/hero_bento_b.jpg` | 800×800 | 0.15MB | 194×194 / 112×112 | 生成约 240w、400w 的 WebP |
| Hero knitting | `production/hero_bento_c.jpg` | 506×506 | 0.09MB | 194×194 / 112×112 | 生成约 240w、400w 的 WebP |
| Hero garment D | `sportswear/hero_bento_d.jpg` | 800×800 | 0.06MB | 194×194 / 112×112 | 生成约 240w、400w 的 WebP |
| Sportswear 分类卡 | `sportswear/sportwear-category.png` | 1527×1030 | 1.35MB | 858×500 / 364×243 | 生成约 640w、900w、1600w 的响应式 WebP/AVIF |
| Merino 分类卡 | `merino wool product/cat_merino.jpg` | 4480×6720 | 12.35MB | 270×500 / 364×455 | 最高优先；生成约 640w、960w 的竖版 WebP/AVIF |
| Knitted Fabrics 分类卡 | `knitted fabrics/product-category-003.png` | 1683×935 | 2.40MB | 564×280 / 364×273 | 生成约 640w、1200w 的响应式 WebP/AVIF |
| Outdoor 分类卡 | `outdoor clothing/cat_outdoor.png` | 1774×887 | 1.53MB | 564×280 / 364×273 | 生成约 640w、1200w 的响应式 WebP/AVIF |
| Silk 分类卡 | `silkwear/cat_silkwear.png` | 1983×793 | 1.56MB | 270×220 / 364×218 | 生成约 320w、640w 的响应式 WebP/AVIF |
| Sports Accessories 分类卡 | `sports accessories/cat_accessories.png` | 1402×1122 | 1.83MB | 270×220 / 364×218 | 生成约 320w、640w 的响应式 WebP/AVIF |
| Underwear 分类卡 | `underwear/homepage.png` | 1729×910 | 1.64MB | 564×220 / 364×218 | 生成约 640w、1200w 的响应式 WebP/AVIF |

#### Hero 主图与 Merino 分类卡候选（2026-07-29）

本轮只生成候选文件，没有覆盖原图，也没有修改模板或接入首页。候选文件已通过解码检查，并与同尺寸原图缩放参考进行 SSIM 对比。

| 图片 | 候选文件 | 尺寸 | 体积 | SSIM |
|---|---|---:|---:|---:|
| Hero | `performance-knitwear-hero-720-q90.webp` | 720×1260 | 26KB | 0.993679 |
| Hero | `performance-knitwear-hero-960-q90.webp` | 960×1680 | 38KB | 0.993401 |
| Hero | `performance-knitwear-hero-960-q95.webp` | 960×1680 | 71KB | 0.994154 |
| Hero fallback | `performance-knitwear-hero-960-fallback.jpg` | 960×1680 | 72KB | 0.994042 |
| Merino | `cat-merino-640-q90.webp` | 640×960 | 17KB | 0.995718 |
| Merino | `cat-merino-960-q90.webp` | 960×1440 | 33KB | 0.994183 |
| Merino | `cat-merino-960-q95.webp` | 960×1440 | 57KB | 0.995087 |
| Merino fallback | `cat-merino-960-fallback.jpg` | 960×1440 | 69KB | 0.995851 |

人工复核结果：

- Q90 已无明显失真，Q95 在人物头发、服装边缘、黑色面料纹理和缝线处提供更高的质量余量。
- Q95 相比 Q90 只增加约 33KB（Hero）和 24KB（Merino），相对原图仍分别减少约 98.6% 和 99.5%。
- 基于首页大图的清晰度优先原则，进一步补充了 Q95、Q100 和 1280w 候选。
- `uploads` 中的候选文件不受 Git 跟踪，部署时需要与主题代码分开同步。

高质量候选补充：

| 图片 | 候选文件 | 尺寸 | 体积 | SSIM |
|---|---|---:|---:|---:|
| Hero | `performance-knitwear-hero-720-q95.webp` | 720×1260 | 45.4KB | 0.994471 |
| Hero | `performance-knitwear-hero-720-q100.webp` | 720×1260 | 86.9KB | 0.995036 |
| Hero | `performance-knitwear-hero-960-q100.webp` | 960×1680 | 150.2KB | 0.994871 |
| Hero | `performance-knitwear-hero-1280-q95.webp` | 1280×2240 | 117.6KB | 0.994159 |
| Hero | `performance-knitwear-hero-1280-q100.webp` | 1280×2240 | 243.7KB | 0.994898 |
| Merino | `cat-merino-640-q95.webp` | 640×960 | 27.7KB | 0.996330 |
| Merino | `cat-merino-640-q100.webp` | 640×960 | 46.6KB | 0.996824 |
| Merino | `cat-merino-960-q100.webp` | 960×1440 | 105.1KB | 0.995912 |
| Merino | `cat-merino-1280-q95.webp` | 1280×1920 | 106.5KB | 0.995274 |
| Merino | `cat-merino-1280-q100.webp` | 1280×1920 | 197.2KB | 0.996188 |

候选决策与实施结果（2026-07-29）：

- Hero 改用 720 / 960 / 1280w 三档真无损 `VP8L` WebP，体积分别约 645KB、1.13MB、1.93MB。
- Merino 改用 640 / 960 / 1280w 三档真无损 `VP8L` WebP，体积分别约 314KB、782KB、1.47MB。
- Sportswear、Knitted Fabrics、Outdoor、Silk、Sports Accessories 和 Underwear 分类卡全部使用 Q100 WebP 响应式图片。
- 模板已加入 `srcset`、`sizes`、准确宽高和 `decoding="async"`；Hero 继续使用 `loading="eager"` 与 `fetchpriority="high"`，分类卡继续 lazy load。
- 浏览器只会根据当前显示宽度和像素密度下载每组中的一个文件，不会同时下载所有候选尺寸。
- 最高分辨率最终文件合计约 4.20MB；实际单次页面传输量会因浏览器选择较小响应式尺寸而低于该数值。
- 16 张未采用的 Hero/Merino Q90、Q95、Q100 WebP 候选已移入 Windows 回收站；最终资源目录只保留正在引用的无损版本。
- 本地首页返回 HTTP 200，20 个最终 WebP 均可正常解码并返回 HTTP 200；最终文件在 HTML 中全部出现，8 个旧首页图片引用均已消失。
- 1440px 桌面与 390px 移动端截图检查通过，Hero 和 7 张分类卡均正常显示。
- 手机端 Hero 原本因竖图在横向卡片中从顶部裁切，只露出人物头部；现已用首页专属移动端样式将焦点调整为 `center 28%`，显示头部、上衣和腰部，桌面端不受影响。

线上验收（2026-07-29）：

- 生产首页、移动端专属 CSS 和 20 个最终 WebP 均返回 HTTP 200；图片 MIME 均为 `image/webp`。
- 生产 HTML 中 20 个最终文件名全部出现，8 个旧首页图片引用为 0，`srcset` 与 `sizes` 已生效。
- 390px 手机端截图确认 Hero 显示人物头部、上衣和腰部；1440px 延迟渲染截图确认 7 张分类卡全部正常。
- 移动端 Lighthouse 13.4.1：Performance 62、SEO 100、FCP 4.1s、LCP 8.0s、TBT 88ms、CLS 0.00014、总传输约 4.29MiB。
- 对比旧移动端基线：Performance 57 → 62，FCP 7.8s → 4.1s，LCP 33.8s → 8.0s，总传输约 29.9MiB → 4.29MiB。
- 桌面端 Lighthouse 13.4.1：Performance 56、SEO 100、FCP 5.2s、LCP 6.4s、TBT 0ms、CLS 0.0044、总传输约 3.26MiB。
- 桌面总传输相较旧基线约 29.7MiB 已大幅下降；单次实验室分数受首字节、字体与第三方资源影响，本轮没有用降低图片质量追求分数。
- Lighthouse 的响应式图片、图片压缩和现代格式三项预计节省均为 0，说明 SEO-004 的图片交付目标已完成。
- 当前移动端 LCP 元素是 Hero 说明文字，桌面端 LCP 元素是 Hero 主图；后续性能优化应重点检查服务器首字节、渲染阻塞、Google Tag 和 Cloudflare Turnstile，而不是继续压缩已批准图片。
- SEO-004 状态：已完成。

第一批目标：

- 优化前 11 张图片合计约 27.93MB。
- 当前采用清晰度优先策略：Hero 与 Merino 真无损，其余分类卡 Q100。
- 不覆盖原图；在 uploads 对应目录生成并引用优化衍生文件。
- 模板使用 `srcset` 和 `sizes`，由浏览器选择合适分辨率。
- 部署后以 Lighthouse 实际传输量、LCP 和桌面/移动端视觉检查作为验收依据。

#### 第二批：Logo 与 Partnership

- 93 个品牌 Logo 当前合计约 2.47MB，实际只显示约 56–72px。
- Logo 原始像素大多已是 150×150，主要问题是压缩和格式，而不是尺寸。
- 建议统一生成优化 WebP 或重新压缩 JPG/PNG，单个目标约 5–15KB。
- `production/客户.png` 为 1672×941、约 1.96MB；建议生成约 640w、1200w 的 WebP/AVIF，目标控制在约 100–200KB。

#### 第三批：Lookbook

- 46 张唯一 WebP 合计约 4.48MB，页面循环轨道中每张出现两次，但浏览器通常只下载一次相同 URL。
- Lookbook 列宽约 168–248px；高 DPI 情况下约 500–600px 宽的文件已经足够。
- 当前部分 WebP 仍为 1024–2000px 宽，单张最高约 283KB。
- 建议重新生成最大宽度约 600px 的 WebP/AVIF，保留现有构图和比例。
- 第三批总量目标约 1.5–2.5MB。

#### 暂不处理

- Certifications 10 张合计约 0.15MB。
- Site Logo 约 0.04MB。
- 这些资源当前收益较低，先不投入处理时间。

#### 后续实施约束

- 图片物理位置继续使用 `wp-content/uploads/myathletik-theme/assets/images/`，不放入主题 Git 仓库。
- 新衍生文件优先使用小写 ASCII 文件名，并带宽度后缀，例如 `cat-merino-640.webp`。
- 图片文件需单独同步到 staging/production；Git push 只会同步模板代码，不会同步 uploads。
- 每完成一批都重新运行移动端和桌面端 Lighthouse，并记录优化前后数据。

### SEO-005：社交分享元数据

首页浏览器 `<title>` 正常：

`Technical Knitwear Manufacturer | Athletik Clothing`

处理前，以下位置显示不完整标题：

- Open Graph title
- Twitter title
- 部分 Schema 页面名称

处理前异常值：

`Athletik Clothing -`

2026-07-29 处理记录：

- 已在子主题根目录新增 Rank Math 官方支持的 `rank-math.php` 集成文件。
- 仅在首页覆盖 Open Graph 和 Twitter 标题，统一为 `Technical Knitwear Manufacturer | Athletik Clothing`。
- 仅修改首页 JSON-LD 中页面级 `WebPage` / `CollectionPage` 实体的 `name`；`LocalBusiness` 和 `WebSite` 名称继续保持 `Athletik Clothing`。
- 本地首页返回 HTTP 200，浏览器 Title、Open Graph title、Twitter title 和 `CollectionPage` Schema 名称已经完全一致。
- 本地首页只输出一份 Open Graph title 和一份 Twitter title。
- 本地其余 11 个核心页面均返回 HTTP 200，原有 Open Graph 和 Twitter 标题未被首页规则覆盖。
- PHP 语法检查通过。
- 生产环境验收前状态为待上线验证。

2026-07-29 最终线上验收：

- 首页返回 HTTP 200。
- 浏览器 Title、Open Graph title、Twitter title 和 `CollectionPage` Schema 名称均为 `Technical Knitwear Manufacturer | Athletik Clothing`。
- 首页仅输出一份 Open Graph title、一份 Twitter title 和一个可正常解析的 JSON-LD 数据块。
- `LocalBusiness` 和 `WebSite` 名称仍为 `Athletik Clothing`，未被页面长标题覆盖。
- 其余 11 个核心页面均返回 HTTP 200，并保留各自的 Open Graph 和 Twitter 标题。
- SEO-005 状态：已完成。

同时，当前首页社交分享图片约为 270×270 的 Logo 裁切图。后续建议制作一张约 1200×630 的品牌分享图片。

### SEO-006：结构化数据

处理前，Rank Math 将 Pages 的默认 Schema 设置为 `Article`。生产环境与本地环境中，除首页外的全部 11 个核心页面都输出了 `Article` 和个人作者 `zhangyifu`，包括 Contact、About Us、Services 等企业页面。

页面类型处理目标：

- 产品分类落地页：`CollectionPage`
- Services：`WebPage`
- About Us：`AboutPage`
- Contact：`ContactPage`
- Sustainability：`WebPage`
- 首页：`WebPage`

处理前的 `LocalBusiness` 数据还存在以下问题：

- Logo 的 `url` 和 `contentUrl` 使用 HTTP。
- 地址、电话和邮箱没有写入 Schema。
- 营业时间被设置为每周七天 09:00–17:00，但该时间未经过确认。

2026-07-29 处理记录：

- 已在子主题 `rank-math.php` 中增加仅针对 12 个核心页面的结构化数据规则。
- 7 个产品分类落地页改为 `CollectionPage`。
- About Us 改为 `AboutPage`，Contact 改为 `ContactPage`。
- Services、Sustainability 和首页使用 `WebPage`；本轮不创建字段不完整的独立 `Service` 实体。
- 从 11 个核心内页移除 `Article`、`BlogPosting`、`NewsArticle` 和关联的个人作者实体；普通 Posts 和映射范围外页面不受影响。
- `LocalBusiness` 名称和网站 URL 保持不变；Logo URL 强制使用 HTTPS。
- Schema 电话、邮箱和地址已与网站公开的 Contact 页面及页脚信息统一。
- 未确认的营业时间已从 Schema 移除，避免发布推测数据。
- 本地 12 个核心页面全部返回 HTTP 200，页面类型均符合映射。
- 本地 11 个核心内页均无 `Article`、个人作者、作者 URL 或 `#richSnippet` 残留。
- 首页 SEO 标题仍为 `Technical Knitwear Manufacturer | Athletik Clothing`，SEO-005 修复未发生回退。
- PHP 语法检查通过。
- 生产环境验收前状态为待上线验证。

2026-07-30 最终线上验收：

- 12 个核心页面均返回 HTTP 200，并且每页只有一个可正常解析的 JSON-LD 数据块。
- 7 个产品分类页均为 `CollectionPage`；Services、Sustainability 和首页均为 `WebPage`；About Us 为 `AboutPage`；Contact 为 `ContactPage`。
- 12 个核心页面均无 `Article`、`BlogPosting`、`NewsArticle`、个人作者 `Person`、作者 URL 或 `#richSnippet` 残留。
- 全部核心页面的 `LocalBusiness` 均使用 HTTPS Logo，并包含与网站公开信息一致的电话、邮箱和工厂地址。
- 未确认的 `openingHours` 已从全部核心页面移除。
- HTTPS Logo 资源返回 HTTP 200。
- 首页 Title、Open Graph、Twitter 和页面级 Schema 名称仍为 `Technical Knitwear Manufacturer | Athletik Clothing`，SEO-005 未发生回退。
- SEO-006 状态：已完成。

### SEO-007：Sitemap

主 Sitemap：

`https://www.athletikapparel.com/sitemap_index.xml`

2026-07-30 开始处理时重新审计生产环境：

- Sitemap Index 返回 HTTP 200，Content-Type 为 XML。
- Sitemap Index 当前只包含 `page-sitemap.xml`，原来的 post 和 category Sitemap 已随 SEO-001 清理完成。
- `page-sitemap.xml` 恰好包含 12 个唯一核心 URL；默认文章、默认页面和默认分类均无残留。
- 首页只出现一次，不再存在跨 post/page Sitemap 的重复。
- 12 个 Sitemap URL 均返回 HTTP 200、使用自引用 Canonical，并且没有 `noindex`。
- `robots.txt` 返回 HTTP 200，并声明最终的 `https://www.athletikapparel.com/sitemap_index.xml`。
- 12 个 URL 的 `lastmod` 仍为 2026 年 6 月 26–27 日。
- 这些页面的主要内容和结构化数据由子主题模板输出；7 月的模板、链接和 Schema 更新不会改变 WordPress 页面表中的修改时间，因此 Rank Math 默认读取的数据库时间已经不能准确代表实际页面更新。
- `/wp-sitemap.xml` 到 Rank Math Sitemap 的跳转及页脚链接归入 SEO-009，不在本轮扩大处理范围。

Google 只在 `<lastmod>` 持续且可验证地准确时使用它；主要内容、结构化数据和页面链接的显著变化都属于有效更新，但版权年份变化不属于。本轮采用以下规则：

- 以 SEO-005/SEO-006 已上线的全站标题和结构化数据更新作为 12 个核心页面的最低真实更新时间：`2026-07-30T01:00:00+00:00`。
- 如果某个 WordPress 页面以后有更晚的真实修改时间，则自动使用更晚值。
- 不按访问时间、当天日期或定时任务每天刷新 `lastmod`。
- 以后只有在核心页面的主要内容、结构化数据或内部链接发生全局显著变化时，才更新代码中的基线。

2026-07-30 处理记录：

- 已在子主题 `rank-math.php` 中增加 Rank Math Sitemap 输出规则。
- 规则只识别首页和 11 个核心内页，不覆盖映射范围外的 URL。
- Page Sitemap Index 的 `lastmod` 与核心页面条目使用同一真实基线。
- 本地清除 Rank Math Sitemap 缓存后，Sitemap Index 与 Page Sitemap 均返回 HTTP 200，并可正常解析为 XML。
- 本地 12 个核心 URL 的 `lastmod` 均更新为 `2026-07-30T01:00:00+00:00`。
- 本地仍存在的 `sample-page` 保持原数据库时间，证明规则没有把全站所有 URL 强制改成同一天；该本地演示内容不在生产环境。
- 已验证未来晚于基线的 WordPress 修改时间会优先输出，映射范围外 URL 和非 page Sitemap Index 不受影响。
- PHP 语法检查通过。
- 部署后已清除 Rank Math Sitemap 缓存。

2026-07-30 最终线上验收：

- Sitemap Index 和 Page Sitemap 均返回 HTTP 200，并可正常解析为 XML。
- Sitemap Index 只包含一个 `page-sitemap.xml` 条目，其 `lastmod` 为 `2026-07-30T01:00:00+00:00`。
- Page Sitemap 恰好包含 12 个唯一核心 URL，无缺失、重复或额外 URL。
- 12 个核心 URL 的 `lastmod` 均为 `2026-07-30T01:00:00+00:00`，没有旧日期残留。
- 12 个 Sitemap URL 均返回 HTTP 200、使用正确的自引用 Canonical，并且没有 `noindex`。
- `robots.txt` 返回 HTTP 200，并继续声明最终的 Rank Math Sitemap 地址。
- SEO-007 状态：已完成。

### SEO-008：Products Hub

2026-07-30 重新核实生产环境：

- 顶部导航、页脚及首页 `View Products` 按钮的 Products 目标均为 `https://www.athletikapparel.com/#ma-home-categories-title`，并不指向 `/products/`。
- 从 Services、Contact 和产品分类页等内页点击 Products，会打开首页并定位到产品分类区。
- 首页的 `ma-home-categories-title` 锚点存在且唯一。
- 首页产品区包含 7 张分类卡，分别链接至 7 个正式的 `*-manufacturer/` 产品分类页。
- Sitemap 中的 12 个核心页面均未发现指向 `/products/` 的站内链接。
- 字面路径 `/products/` 仍返回 HTTP 404，但它没有出现在 Sitemap，也没有被当前导航或正文使用。

处理决定：

- 当前首页产品分类区已经承担 Products Hub 的导航功能，访客入口不是空按钮或死链。
- 不再为了消除一个未使用路径的 404 而创建与首页产品区重复、内容薄弱的 `/products/` 页面。
- 当前不为新站 `/products/` 添加跳转，因为现站 Sitemap、导航和正文均未使用该路径。旧站 `myathletik.com` 已按站点所有者决定下线并返回 410；不做旧站 301，也不纳入新站 GEO 优化范围。
- 如果以后 Search Console、服务器日志或外部反向链接显示 `/products/` 存在真实访问或索引信号，再决定为其建立具有独立价值的 Hub，或添加到首页产品区的 301。
- 本轮不需要修改主题代码或 WordPress 页面。
- SEO-008 状态：已完成。

### SEO-009：跳转与链接清理

2026-07-30 重新核实生产环境：

- `http://athletikapparel.com/` 经过两次永久跳转后到达最终的 `https://www.athletikapparel.com/`。
- `http://www.athletikapparel.com/` 和 `https://athletikapparel.com/` 均只经过一次跳转。
- 正式的 `https://www.athletikapparel.com/` 不发生跳转。
- 页脚 Sitemap 链接指向 `/wp-sitemap.xml`，该地址经过一次跳转到 `/sitemap_index.xml`。
- `robots.txt` 和 Sitemap 输出均已经直接声明最终的 `/sitemap_index.xml`。
- 核心页面的 Canonical、Sitemap URL 和站内主要链接均使用最终 www HTTPS 地址。

影响评估与决定：

- Google 可以处理永久跳转，并建议避免过长的跳转链；当前最长链只有两跳，低于其建议保持在三跳以内的范围。
- 当前额外跳转只发生在非首选域入口和页脚辅助链接，不影响核心页面的抓取、Canonical 或 Sitemap 提交。
- 优化后最多减少一次请求，不会带来可衡量的排名或收录改善。
- 按“影响接近零则不处理”的原则，本项不修改服务器跳转或主题代码。
- SEO-009 状态：已跳过。

### SEO-010：Google Search Console

2026-07-30 公开收录信号复核：

- `site:athletikapparel.com`、品牌词和核心页面精确查询均暂未返回本站结果。
- 网站于 2026-07-28 完成生产上线，目前只有约两天；公开搜索暂时无结果不能单独证明存在技术问题。
- 12 个核心页面均已确认返回 HTTP 200、允许索引、使用自引用 Canonical，并包含在有效 Sitemap 中。
- 公开搜索结果不是完整的索引报告，必须使用 Search Console 才能区分“尚未发现”“已发现未抓取”“已抓取未收录”或其他状态。

影响评估：

- 该项不是低价值的页面微调，而是确认 Google 是否已经发现并处理网站的关键诊断，影响程度为高，不能跳过。

2026-07-30 Search Console 验证记录：

- `Page indexing` 报告显示 3 个 URL 已编入索引，3 个 URL 未编入索引。
- 两个“网页会自动重定向”示例分别是 `http://www.athletikapparel.com/` 和 `https://athletikapparel.com/`，它们正确跳转到首选 www HTTPS 地址，属于预期排除。
- 唯一“已抓取但尚未编入索引”的示例是非业务路径 `https://www.athletikapparel.com/wp-content/themes/generatepress/*`；实时请求返回 HTTP 404，不需要收录或修复。
- `sitemap_index.xml` 已于 2026-07-22 提交，Google 于 2026-07-29 成功读取；报告中的 16 个 URL 和 category/post 子 Sitemap 是 SEO-001/SEO-007 清理前的历史快照。
- 当前线上 Sitemap Index 只包含 Page Sitemap，Page Sitemap 包含 12 个核心 URL；已于 2026-07-30 重新提交同一 Sitemap，等待 Google 更新报告。
- 首页 URL Inspection 显示“网址已收录到 Google”，网页索引和 HTTPS 状态均正常。
- `/sportswear-manufacturer/` 最初显示 Google 尚未发现；Live Test 随后通过，结果为“网址可编入 Google 索引”且网页可用性正常。
- Sportswear 页面已成功提交编入索引请求。
- 未发现 robots、`noindex`、Canonical、HTTPS、抓取可用性或 Sitemap 有效性方面的技术性收录障碍。

后续观察：

- 不逐页重复提交其余核心页面，由已重新提交的 Sitemap 负责批量发现。
- 2026-08-06 起复查 Sitemap 的最后读取时间、发现 URL 数量以及 Page indexing 数量。
- 如果两周后核心页面仍大量未被发现，再使用 URL Inspection 检查具体页面并依据实际原因处理。
- SEO-010 首轮收录基线状态：已完成。

### SEO-011：首页图片 alt

2026-07-30 重新核实生产环境和模板：

- 首页共输出 302 张图片，没有任何图片缺少 `alt` 属性。
- 其中 97 张使用 `alt=""`：4 张位于 `aria-hidden="true"` 的 Hero 装饰拼图中；另外 93 张是客户 Logo 跑马灯的第二套无障碍隐藏副本。
- 客户 Logo 的第一套可见语义副本均具有品牌名称 alt；第二套只为实现无缝循环，重复朗读会造成无障碍噪音。
- 产品卡、Lookbook、认证标志、合作伙伴图片及站点 Logo 等有信息价值的图片均具有描述性 alt。

影响评估与决定：

- 空 alt 与缺少 alt 属性不是同一情况；对装饰图和已隐藏的重复内容使用 `alt=""` 是正确实现。
- 为这些图片强行添加关键词不会提高页面 SEO，反而会制造重复语义和屏幕阅读器噪音。
- 本项不修改模板代码。
- SEO-011 状态：已跳过。

## 5. 首轮确认正常的项目

- robots.txt 没有屏蔽前台页面。
- Rank Math Sitemap 可以正常访问。
- `/wp-sitemap.xml` 已指向 Rank Math Sitemap。
- 12 个核心页面返回 200。
- 12 个核心页面具有自引用 Canonical。
- 核心页面没有发现意外 `noindex`。
- 搜索页为 `noindex`。
- 作者归档为 `noindex`。
- 核心页面 Title 唯一。
- 产品分类页均有一个内容主 H1。
- 核心页面内部链接未发现 404。
- 旧地址 `/sustainabilty/` 和 `/contact-2/` 返回 404/noindex；除非 Search Console 以后发现外链或历史流量，否则暂不要求重定向。
- 首页所有图片都具有 alt 属性；当前空 alt 仅用于装饰图和无障碍隐藏的重复 Logo，属于正确实现。

## 6. 首轮已执行顺序与后续观察

### 第一阶段：低风险技术清理

1. SEO-001：清理默认 WordPress 页面
2. SEO-002：去掉重复 Meta Description
3. SEO-003：修复首页双 H1
4. SEO-005：修正首页社交标题

### 第二阶段：性能

1. SEO-004：优化首页最大的 8 个图片资源
2. 重新运行移动端 Lighthouse
3. 检查桌面和移动端视觉是否保持一致

### 第三阶段：语义与站点结构

1. SEO-006：调整结构化数据
2. SEO-007：整理 Sitemap
3. SEO-008：确认首页产品区承担 Products Hub 功能（已完成）
4. SEO-009：清理次要跳转（已跳过，影响接近零）

### 第四阶段：收录验证

1. SEO-010：Search Console URL Inspection（首轮已完成）
2. 2026-08-06 起复查 Pages 和 Sitemap 报告
3. 记录实际收录日期和异常原因
4. 根据真实数据决定是否需要进一步操作

## 7. 每次修改的记录格式

后续每解决一项，在本节追加记录：

```text
日期：
问题 ID：
修改内容：
涉及文件或后台设置：
本地验证：
线上验证：
结果：
遗留问题：
```

## 8. 参考资料

- Google SEO Starter Guide：<https://developers.google.com/search/docs/fundamentals/seo-starter-guide>
- Google Crawling and Indexing：<https://developers.google.com/search/docs/crawling-indexing>
- Google Sitemap Guide：<https://developers.google.com/search/docs/crawling-indexing/sitemaps/overview>
- Google Canonical Guide：<https://developers.google.com/search/docs/crawling-indexing/consolidate-duplicate-urls>
- Google Structured Data Policies：<https://developers.google.com/search/docs/appearance/structured-data/sd-policies>
- Google Core Web Vitals：<https://developers.google.com/search/docs/appearance/core-web-vitals>

## 9. 首轮 SEO 收尾总结

收尾日期：2026-07-30

处理结果：

- SEO-001 至 SEO-011 共 11 项：9 项已完成，2 项因影响接近零或当前实现正确而明确跳过。
- 当前没有状态为 `待处理`、`处理中`、`待上线验证` 或 `暂缓` 的问题。
- 12 个核心页面最终线上自动化抽查全部通过。
- 每个核心页面均返回 HTTP 200，并且只输出一个 Title、一个 Meta Description、一个 H1、一个自引用 Canonical、一个 Open Graph title 和一个可正常解析的 JSON-LD 数据块。
- 12 个核心页面均无意外 `noindex`。
- robots.txt 返回 HTTP 200，并声明最终的 Rank Math Sitemap。
- Page Sitemap 包含 12 个唯一核心 URL，没有默认内容、重复首页或额外 URL。
- 首页已被 Google 收录；代表性产品页通过 Search Console Live Test，并已成功提交收录请求。
- 未发现会阻止 Google 抓取或编入索引的全站性技术问题。

后续只进行常规观察，不作为当前整改遗留项：

- 2026-08-06 起复查 Search Console 的 Sitemap 最后读取时间、发现 URL 数量和 Page indexing 数量。
- 新增页面、修改 URL、调整主要内容或 Schema 后，重新进行对应页面级检查。
- 只有在 Search Console 出现持续的抓取/收录异常，或真实用户 Core Web Vitals 数据出现问题时，才重新开启专项整改。

结论：网站首轮 SEO 技术整改可以正式收尾。

---

## 10. SEO Baseline V2（2026-08-15）

### 10.1 审查范围与方法

本轮为生产环境只读审查，没有修改 WordPress、主题代码、Rank Math 设置、URL 或重定向。

审查对象：

- `https://www.athletikapparel.com/sitemap_index.xml`
- `https://www.athletikapparel.com/page-sitemap.xml`
- `https://www.athletikapparel.com/robots.txt`
- Page Sitemap 中的全部 17 个 URL
- 当前站内 HTML 链接和 `docs/sitemap.md` 中记录的历史路径
- 主题中的 Title/Meta、Schema、图片加载、字体和 Hero 媒体实现

自动化检查项目：

- HTTP 状态、最终 URL、Title、Meta Description、Canonical 和 robots
- H1 数量、H1 真值匹配及 H2/H3 层级跳级
- Open Graph / Twitter 标题与描述
- JSON-LD 数量、JSON 可解析性和主要 `@type`
- 图片 alt、文件名式 alt、`loading`、`decoding`、`fetchpriority` 和尺寸稳定信号
- Sitemap 唯一性与 `lastmod`
- 站内链接目标和页面入链
- 历史 URL 的首跳状态、Location 与 `X-Redirect-By`

边界：

- 本轮不运行 Lighthouse；真实 Core Web Vitals 仍以 Search Console / CrUX 为准。
- 公开 HTML 只能确认页面“允许索引”，不能确认 Google 已经编入索引。
- 本轮没有 Search Console 账户级数据，因此不更新点击、展示、查询词、平均排名或 Page indexing 数量。

### 10.2 页面级结果

`seo-tags.md` 没有 Privacy Policy 条目，因此该页只核对技术输出，不把当前 Title/Meta 视为已批准真值。

| URL | HTTP | Title 字符 | Meta 字符 | H1 | 主要页面 Schema | 结果 |
|---|---:|---:|---:|---|---|---|
| `/` | 200 | 51 | 153 | `Performance Knitwear Manufacturer` | `WebPage` | 通过；社交描述见 V2-004 |
| `/sportswear-manufacturer/` | 200 | 43 | 150 | `Sportswear Manufacturer` | `CollectionPage` | 通过 |
| `/underwear-manufacturer/` | 200 | 42 | 157 | `Underwear Manufacturer` | `CollectionPage` | Meta 软长度警告 |
| `/outdoor-clothing-manufacturer/` | 200 | 49 | 156 | `Outdoor Clothing Manufacturer` | `CollectionPage` | Meta 软长度警告 |
| `/merino-wool-manufacturer/` | 200 | 52 | 153 | `Merino Wool Apparel Manufacturer` | `CollectionPage` | 通过 |
| `/silk-wear-manufacturer/` | 200 | 42 | 156 | `Silk Wear Manufacturer` | `CollectionPage` | Meta 软长度警告 |
| `/knitted-fabrics-manufacturer/` | 200 | 48 | 157 | `Knitted Fabrics Manufacturer` | `CollectionPage` | Meta 软长度警告 |
| `/sports-accessories-manufacturer/` | 200 | 51 | 159 | `Sports Accessories Manufacturer` | `CollectionPage` | Meta 软长度警告 |
| `/services/` | 200 | 63 | 151 | `Our Services` | `WebPage` | Title 软长度警告 |
| `/sustainability/` | 200 | 51 | 150 | `Sustainability` | `WebPage` | 通过 |
| `/about-us/` | 200 | 52 | 160 | `About Us` | `AboutPage` | Meta 软长度警告 |
| `/contact/` | 200 | 44 | 147 | `Contact Us` | `ContactPage` | 通过 |
| `/technical-guides/` | 200 | 56 | 139 | `Technical Knitwear Guides` | `CollectionPage` + `ItemList` | 通过 |
| `/flatlock-vs-overlock-technical-knitwear/` | 200 | 54 | 148 | `FLATLOCK vs OVERLOCK for Technical Knitwear` | `WebPage` + `Article` + `FAQPage` | 通过 |
| `/technical-knitwear-tech-pack-guide/` | 200 | 54 | 147 | `What to Include in a Tech Pack for Technical Knitwear` | `WebPage` + `Article` + `FAQPage` | 通过；内链见 V2-006 |
| `/evaluate-technical-knitwear-oem/` | 200 | 51 | 147 | `How to Evaluate a Vertically Integrated Knitwear OEM` | `WebPage` + `Article` + `FAQPage` | 通过；内链见 V2-006 |
| `/privacy-policy/` | 200 | 34 | 58 | `Privacy Policy` | `WebPage` + `Article` + `Person` | 见 V2-003 |

全部 17 个页面还同时满足：

- Title、Meta Description、H1、Canonical 和 JSON-LD 各只有一份。
- Canonical 指向当前页面自身的最终 www HTTPS URL。
- 没有意外 `noindex`。
- JSON-LD 均可解析，没有损坏的 JSON。
- H1 只有一个，H2/H3 顺序没有跳级。
- Open Graph title 和 Twitter title 各只有一份。

### 10.3 Findings by severity

#### Critical

无。未发现阻止抓取、破坏 Canonical、缺失 Title/Meta/H1 或损坏 JSON-LD 的问题。

#### Warning

| ID | 优先级 | 状态 | 发现 | 建议动作 |
|---|---|---|---|---|
| V2-001 | 高 | 待外部验证 | 当前文档没有 2026-08-06 之后的 Search Console 数据；公开页面检查不能确认实际收录 | 获取最新 Page indexing、Sitemap、Performance 和 4 个 Technical Guides URL Inspection 结果后补录 |
| V2-002 | 低 | 待评估 | `/services/` Title 为 63 字符；6 个页面 Meta 为 156–160 字符，略高于内部约 60/155 的软目标 | 先看 GSC CTR 与实际 SERP 截断；没有数据前不为长度机械改写 |
| V2-003 | 中 | 待确认 | Privacy Policy 没有 `seo-tags.md` 真值条目；当前 Meta 只是 `Effective date...Last updated...` 拼接文本，Schema 仍含 `Article` 和个人作者 `Person` | `【NEEDS INPUT: approve a dedicated Privacy Policy SEO title and meta description】`；确认后再决定是否改为普通 `WebPage` |
| V2-004 | 低 | 待评估 | 首页有 Open Graph / Twitter title，但没有 `og:description` 或 `twitter:description` | 若社交预览实际缺少描述，再让 Rank Math/主题复用已批准首页 Meta；不影响 Google 抓取 |
| V2-005 | 中 | 待调查 | 6 个当前域 `/products/<x>/` 历史路径由 WordPress 301 到新页面，但 Merino 历史路径仍为 404；与“当前不规划这些跳转”的文档状态不一致 | 在 Search Console、服务器日志和 WordPress 旧 slug 数据核实前，不删除现有 301，也不擅自补齐 Merino |
| V2-006 | 中 | 待评估 | Tech Pack 和 OEM Evaluation 两篇新指南当前各只有 Technical Guides Hub 的一个正文入口；不是孤立页，但上下文内链弱于 FLATLOCK 指南 | 从确实相关的品类页、Services 或指南正文增加少量上下文链接，前提是不强行堆关键词 |
| V2-007 | 中 | 待性能数据 | Underwear 与 Merino 类目 Hero 使用 `autoplay` + `preload="auto"` 视频，本地文件约 5.02MB 和 9.52MB | 先用真实 CWV 或页面级 Lighthouse 判断影响；若有问题，再评估 poster、preload 策略和视频压缩 |
| V2-008 | 中 | 待整理 | `seo-tags.md` 与生产输出一致，但 `inc/product-category-data.php` 还保存另一套类目 Meta；Merino 的代码内 `seo_title` 也与生产值不同 | 后续选定唯一真值来源并删除或同步非活动字段，避免以后误改或环境漂移 |

#### Passed

- 17 个 Sitemap URL 全部返回 HTTP 200，没有重复 URL。
- `robots.txt` 只阻止 `/wp-admin/`，允许 `admin-ajax.php`，并声明最终 Sitemap。
- Sitemap Index 只包含 `page-sitemap.xml`；Index `lastmod` 为 `2026-08-11T07:36:03+00:00`。
- 16 个受主题管理页面的 Title/Meta 与 `seo-tags.md` 一致，H1 与 `docs/sitemap.md` 一致。
- 首页和指南首屏图片使用 eager；首页主要 Hero 使用 `fetchpriority="high"`。
- 首页 303 个图片标签均有 alt；97 个空 alt 仍对应装饰 Hero 图和隐藏的重复 Logo，不计为缺失。
- 其余页面没有缺失 alt 或文件名式 alt。
- Manrope 请求包含 `display=swap`，并存在 Google Fonts preconnect。
- 产品图、指南卡片、Lookbook、Logo 等缺少 HTML 宽高的图片多数由固定容器或 CSS `aspect-ratio` 保留布局，本轮不直接判定为 CLS 错误。
- 自动化共检查 18 个站内页面目标；唯一直接返回 404 的 `/cdn-cgi/l/email-protection` 是 Cloudflare 邮箱混淆端点，不是业务页面死链。
- 全部 17 个页面均有站内入链；没有孤立页面。

### 10.4 301 / URL notes

以下是 2026-08-15 对生产域的首跳实测，不代表本轮新增了重定向：

| Source | 首跳 | Target | 响应来源 |
|---|---:|---|---|
| `/products/sportswear/` | 301 | `/sportswear-manufacturer/` | `X-Redirect-By: WordPress` |
| `/products/underwear/` | 301 | `/underwear-manufacturer/` | `X-Redirect-By: WordPress` |
| `/products/outdoor-clothing/` | 301 | `/outdoor-clothing-manufacturer/` | `X-Redirect-By: WordPress` |
| `/products/silk-wear/` | 301 | `/silk-wear-manufacturer/` | `X-Redirect-By: WordPress` |
| `/products/knitted-fabrics/` | 301 | `/knitted-fabrics-manufacturer/` | `X-Redirect-By: WordPress` |
| `/products/sports-accessories/` | 301 | `/sports-accessories-manufacturer/` | `X-Redirect-By: WordPress` |
| `/products/merino-wool-apparel/` | 404 | 无 | 无跳转 |

其他 URL 状态：

- `/products/`、`/sustainabilty/` 和 `/contact-2/` 均返回 404。
- `https://myathletik.com/` 与 `https://www.myathletik.com/` 均返回 410；旧域名不做跨域跳转的所有者决定没有改变。
- `https://athletik-clothing.com/` 一跳进入 `https://www.athletikapparel.com/`。
- `http://athletikapparel.com/` 两跳进入规范首页；其余非规范主域变体为一跳。

V2 不修改任何上述行为。特别是已经存在的 301，在确认 Search Console、访问日志和数据库旧 slug 来源前不得移除。

### 10.5 Suggested next actions

1. 获取最新 Search Console 数据，完成 V2-001；优先检查 4 个 Technical Guides URL 的发现、抓取和收录状态。
2. 调查 V2-005 的 WordPress 301 来源，记录它们是旧 slug 自动跳转、插件规则还是数据库历史记录；本阶段只调查，不改动。
3. 用 GSC 查询与 CTR 数据判断 V2-002 是否值得改写，避免为了字符数改动已经准确的 Title/Meta。
4. 所有者确认 Privacy Policy 的 Title/Meta 后，再处理 V2-003；没有批准文本前保留占位符，不编写法律页营销文案。
5. 依据相关性补强两篇新指南的上下文内链，并在修改后重新跑页面级 SEO 审查。
6. 只有在真实 CWV 或页面级实验室数据显示问题时，才启动 Hero 视频性能专项。

### 10.6 Baseline V2 结论

Baseline V2 的技术健康状态为通过：没有 Critical 问题，抓取、Canonical、页面级元数据、标题结构、Schema 可解析性、Sitemap 和基础内链均正常。

下一阶段的主任务不是继续做无证据的页面微调，而是补齐 Search Console 当前数据，并围绕真实收录、查询和 CTR 处理上述 Warning。V2-003、V2-005 和 V2-008 涉及真值或历史行为，在确认来源前只记录、不自动修改。
