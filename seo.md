# Athletik Clothing SEO 审查与处理记录

> 网站：<https://www.athletikapparel.com/>  
> 首次审查日期：2026-07-29  
> 当前阶段：网站主体已完成，进入 SEO 清理与性能优化阶段  
> 文档用途：记录 SEO 基线、待处理问题、处理顺序、验证结果和后续决策

## 1. 当前结论

网站整体 SEO 基础正常，没有发现会阻止搜索引擎抓取或收录的全站性问题：

- `robots.txt` 可访问，并声明了 Rank Math Sitemap。
- 核心页面均返回 HTTP 200。
- 核心页面均为 `index, follow`。
- Canonical 均指向正确的 HTTPS 自身地址。
- 首选域名已统一为 `https://www.athletikapparel.com/`。
- 核心页面标题唯一，关键词方向基本正确。
- 核心页面之间的内部链接未发现 404。
- 搜索结果页和作者归档页已设置为 `noindex`。
- 7 个产品分类页正文约为 670–760 词，没有明显的内容过薄问题。

当前需要处理的重点是：默认 WordPress 页面、重复 Meta Description、首页双 H1、图片性能、社交分享元数据和结构化数据语义。

## 2. 本次审查范围

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

## 3. 待处理清单

状态说明：

- `待处理`：尚未开始
- `处理中`：已经开始修改，尚未完成验证
- `待上线验证`：代码已完成，等待生产环境核对
- `已完成`：线上验证通过
- `暂缓`：已决定以后处理

| ID | 优先级 | 状态 | 问题 | 处理目标 |
|---|---|---|---|---|
| SEO-001 | 高 | 已完成 | 默认 WordPress 页面允许索引并出现在 Sitemap | 删除或设为 noindex，并从 Sitemap 移除 |
| SEO-002 | 高 | 已完成 | 10 个核心页面输出两份 Meta Description | 每页只保留一份描述，统一管理来源 |
| SEO-003 | 高 | 已完成 | 首页存在两个 H1 | Hero 保留 H1，页头品牌名称改为非 H1 元素 |
| SEO-004 | 高 | 已完成 | 首页图片负载约 29.9MB，移动端性能较差 | 已使用无损/Q100 WebP 和响应式尺寸替换主要图片 |
| SEO-005 | 中 | 已完成 | 首页 Open Graph、Twitter 和部分 Schema 标题显示为 `Athletik Clothing -` | 与正式首页 SEO 标题统一 |
| SEO-006 | 中 | 已完成 | 多个企业落地页被标记为 Article，并带个人作者 | 调整为更准确的页面类型和 Schema |
| SEO-007 | 中 | 待处理 | Sitemap 存在默认页面、首页重复及较旧的 lastmod | 清理 Sitemap 并核对更新时间来源 |
| SEO-008 | 中 | 待处理 | `/products/` 当前返回 404 | 决定是否建设真正的产品 Hub；不创建空页面 |
| SEO-009 | 低 | 待处理 | 裸域 HTTP 存在两跳，页脚 Sitemap 链接发生一次 301 | 有条件时改为一步跳转和最终链接 |
| SEO-010 | 持续 | 待处理 | 需要确认 Google 实际收录状态 | 使用 Search Console 检查 Sitemap、Pages 和 URL Inspection |
| SEO-011 | 低 | 待处理 | 首页部分图片使用空 alt | 区分装饰图与内容图，只补充有意义的替代文本 |

## 4. 问题证据与处理要求

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

当前 Sitemap：

`https://www.athletikapparel.com/sitemap_index.xml`

发现：

- 默认文章、默认页面和默认分类仍在 Sitemap。
- 首页同时出现在 post sitemap 和 page sitemap。
- 多个页面的 `lastmod` 仍为 2026 年 6 月日期。
- `/wp-sitemap.xml` 会跳转到 Rank Math Sitemap。

处理时不要为了更新时间而每天伪造 `lastmod`；只在页面内容真实改变时更新。

### SEO-008：Products Hub

`/products/` 当前返回 404，并且未出现在 Sitemap。

这不是当前的收录阻塞问题。后续需要在以下方案中选择：

1. 建立具有独立内容、分类入口和内部链接价值的 Products Hub。
2. 明确不使用该 URL，继续由首页和各产品分类页承担导航功能。

在做出决定前，不建立内容空洞的占位页面。

### SEO-009：跳转与链接清理

- `http://athletikapparel.com/` 当前经过两次 301 后到达最终 www HTTPS 地址。
- `http://www.athletikapparel.com/` 可一步到达最终地址。
- 页脚指向 `/wp-sitemap.xml`，该地址再跳转到 `/sitemap_index.xml`。

这些属于低优先级清理，不会阻止网站收录。

### SEO-010：Google Search Console

网站上线时间较短，外部 `site:` 抽查暂未观察到明确收录结果，但这不能单独证明存在问题。

后续核对项目：

- Sitemap 状态是否为读取成功。
- 首页是否已编入索引。
- 7 个产品分类页是否已编入索引。
- Services、Sustainability、About Us、Contact 是否已编入索引。
- Pages 报告中的未收录原因。
- Core Web Vitals 的移动端真实用户数据。
- 是否存在旧 URL、软 404、重复页面或错误 Canonical。

## 5. 当前确认正常的项目

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
- 所有已检查图片都具有 alt 属性；空 alt 需要按图片用途进一步判断，不应机械填充。

## 6. 建议处理顺序

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
3. SEO-008：决定是否建立 Products Hub
4. SEO-009：清理次要跳转

### 第四阶段：收录验证

1. SEO-010：Search Console URL Inspection
2. 检查 Pages 和 Sitemap 报告
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
