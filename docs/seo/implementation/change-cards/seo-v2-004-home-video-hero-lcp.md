# SEO Change Card：SEO-V2-004 首页视频 Hero LCP

- Change ID：`SEO-V2-004-HERO`
- 状态：`inconclusive / keep-monitoring`
- 变更日期：2026-09-18
- 变更页面或分组：`/`
- 搜索与采购意图：保持首页 `Performance Apparel Manufacturer` 的 B2B 供应商发现和采购入口职责，不改变页面主题或关键词所有权
- 唯一主要变量：首页 Hero 视频的首屏资源调度；保留现有 poster、MP4、构图、文案和覆盖层，只把 MP4 从首屏自动请求改为 `window.load` 后空闲加载
- 业务假设：让 13 KB poster 成为唯一首屏高优先级 Hero 媒体，并阻止 367 KB / 943 KB MP4 与首屏 CSS、字体和图片争夺带宽，可降低首页移动端 Lab FCP / LCP，同时保留后续动态展示
- 证据来源与数据状态：部署前为 2026-09-18 生产首页三次同条件 Lighthouse 13.4.1 移动端 Lab，LCP 为 4.529s / 4.612s / 4.532s，中位数 4.532s，三次 LCP 节点均为 `video.ma-home-hero__video`。部署后于 2026-09-19 再做三次同条件 Lab，LCP 为 4.566s / 4.586s / 3.338s，中位数 4.566s，三次 LCP 节点均改为 `img.ma-home-hero__poster`。中位数差异为 +34ms（约 +0.75%），属于 Lab 正常波动，既不能证明提速，也不构成回归；CrUX Phone 仍为 `not_configured`，因此不写成 Field CWV 结论
- 主要指标：部署后同条件三次移动 Lighthouse 的 LCP / FCP 中位数；首屏网络瀑布中 MP4 是否在 `window.load` 前发起；poster 是否为 eager/high LCP 候选
- 防护指标：HTTP 200、单一 H1、CLS、TBT、Desktop/Mobile 构图、poster 到视频的过渡、静音循环播放、CTA、Consent 与 GA4 不受影响；reduced-motion、Save-Data、后台标签页和离屏状态不得强制播放
- 基线窗口：2026-09-18 部署前；移动 Lab LCP 中位数 4.532s、CLS 0、TBT 0–140ms
- Day 7 / 28 / 90 复盘日期：性能项以 Day 0 同条件 Lab 和后续可得 CrUX 为主；GSC 排名不作为本次代码的直接归因指标
- 干扰因素：Cookiebot 与 jQuery 阻塞链、Cloudflare/Flywheel 响应、网络波动、首页其他 eager 资源、Lighthouse 运行环境
- 部署前 Crawl ID：`crawl_40f88b6c25d74ba79ee193c7be26caf9`（最近冻结 Crawl，仅作无回归参考）
- 部署后 Crawl Diff Run ID：`2b028751-ef61-4650-bb49-f2c54e2f2b36`（25 个 URL；added / removed / changed / new errors / indexability flips 均为 0）
- Finding / Inventory 处置：所有者报告的“视频一直不会播放”经生产浏览器复现判定为 `not-a-code-defect / environment-expected`：正常 motion 的 Desktop / Mobile 均播放，当前 Windows 的系统动画状态关闭，触发站点既定 reduced-motion poster-only 分支。性能报告 Finding `action-1a2a7aafa456` 处置为 `deferred`：Hero 已退出 LCP 节点且请求顺序符合目标，但页面级 LCP 仍处于 needs-work，应由独立的渲染阻塞链与图片交付调查承接，不能把 Cookiebot、jQuery 或首页下方产品图混入本次单变量结果
- 最终决策及原因：`inconclusive / keep-monitoring`。保留当前实现：它消除了 MP4 的首屏竞争并恢复 reduced-motion / Save-Data 防护，没有造成可测回归；但 LCP 中位数没有改善，不能标记为 `fixed`。不继续修改 Hero，等待可得 CrUX，并把重复出现的共享渲染链和图片交付问题作为独立变量评估

## 实施内容

### `template-parts/home/hero.php`

- 新增独立装饰性 poster `<img>`，使用既有 1280×720 WebP、`loading="eager"`、`fetchpriority="high"`、固有尺寸与异步解码；
- 移除视频 `autoplay`，把 `preload` 从 `auto` 改为 `none`；
- 两个 MP4 `<source>` 初始只输出 `data-src`，HTML 首屏阶段不暴露可下载的 `src`；
- URL、Title、Meta、H1、正文、CTA、Schema、视频文件和 poster 文件均不改变。

### `assets/js/home-hero-video.js`

- 仅在 `window.load` 完成后通过 `requestIdleCallback` 激活当前视口对应的 MP4；不支持该 API 时使用 1200ms 回退；
- `playing` 后才淡入视频，加载或播放失败时继续显示 poster；
- `prefers-reduced-motion: reduce` 或 Save-Data 环境不注入 MP4 `src`；
- 使用 IntersectionObserver 与 `visibilitychange` 暂停离屏或后台视频，并在恢复可见后继续播放。

### `functions.php` 与 `style.css`

- 新控制器仅在首页、页脚、`defer` 加载，并继续使用 `filemtime()` 做缓存失效；
- poster 与视频共用现有全屏裁切、桌面偏移和 mask；视频仅在播放成功后淡入；
- reduced-motion 下 CSS 直接隐藏视频，poster 保持可见。

## 风险与回滚

- 视频会比旧实现更晚开始，首屏短时间只显示同一 poster；这是本次性能换取，不能误判为视频加载故障。
- 若 poster 与首帧构图不一致、视频未能恢复播放、页面出现闪黑/跳动、三次同条件 Lab LCP 中位数较 4.532s 恶化超过 10%，或 CLS 超过 0.1，则回滚本 Change Card 的四个运行时文件。
- 如果 LCP 变化落在正常波动范围，但生产网络瀑布已确认 MP4 不再参与首屏竞争，则记录为 `inconclusive / keep-monitoring`，不叠加 Cookiebot 或图片改动解释结果。

## 验收记录

### 本地 / 部署前

- [x] `functions.php` 与 `template-parts/home/hero.php` 使用 LocalWP PHP 8.2.30 语法检查通过；
- [x] `assets/js/home-hero-video.js` 通过 `node --check`；
- [x] 模板桩渲染为 1 个 H1、1 个 eager/high 1280×720 poster、2 个 `data-src`，不存在 `<source src>` 或 `autoplay`；
- [x] 隔离控制器测试通过：普通环境在 `window.load` 与 idle 前不注入 MP4，之后只加载一次；reduced-motion 与 Save-Data 均保持 0 个 MP4 请求；
- [x] `git diff --check` 通过；
- [ ] LocalWP 全页视觉与运行时网络验收：本次本地域名返回 502，转生产部署后验收，不把 unavailable 写成通过。

### 生产 / Day 0

- [x] 首页、控制器、poster 与两个 MP4 均返回 HTTP 200；
- [x] HTML 只有一个 eager/high poster，两个 MP4 初始为 `data-src`，控制器只在首页 defer 加载；
- [x] 正常 motion 的 1440×900 Desktop 与 390×844 Mobile 浏览器运行态均成功播放；MP4 分别在 load 后约 467ms / 266ms 发起，6.5 秒观察点的 `currentTime` 为 5.75s / 5.45s，`readyState=4`、`paused=false`、`is-playing` 与 opacity 1；
- [x] 强制 reduced-motion 的生产浏览器为 0 个 MP4 请求、`currentSrc=""`、`paused=true`、poster-only；当前 Windows `SPI_GETCLIENTAREAANIMATION Enabled=False` 且 `MinAnimate=0`，与所有者浏览器不播放现象一致；
- [ ] Desktop 与 Mobile 的 poster 构图、覆盖层、文字和 CTA 无视觉回归；视频在首屏稳定后静音循环播放且无闪黑；
- [ ] Save-Data、后台标签页和离屏状态完成真实浏览器验收；
- [x] 三次相同条件移动 Lighthouse 完成：LCP / FCP 为 4.566s / 4.586s / 3.338s，中位数 4.566s；TBT 为 44ms / 153ms / 169ms，中位数 153ms；CLS 三次均为 0；三次 LCP 节点均为 `img.ma-home-hero__poster`；
- [x] 同范围 Crawl Diff 完成：Run ID `2b028751-ef61-4650-bb49-f2c54e2f2b36`，25 个 URL，0 added / removed / changed / new errors / indexability flips。四个 Technical Guide MP4 因响应超过 5 MB 产生既有媒体读取警告，不属于首页 Hero 新回归；
- [x] 最终决策记录为 `inconclusive / keep-monitoring`；当前 Hero 实现保留，页面级 LCP Finding 转入独立性能调查。
