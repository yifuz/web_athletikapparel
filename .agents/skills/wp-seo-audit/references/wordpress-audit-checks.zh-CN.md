# Athletik WordPress SEO 审计检查（中文阅读版）

> 本文件是 `wordpress-audit-checks.md` 的简体中文阅读版。实际执行以英文文件为准。

涉及主题、插件、元数据、Schema、渲染、移动端、URL 规范化或其他 WordPress 技术检查时读取本参考，只应用与请求相关的部分。

## 环境与公开身份

- 解读输出前确认 local、staging 或 production。
- 检查生产 canonical、Open Graph、Schema、Sitemap、内部链接和资源是否泄漏 LocalWP、staging、localhost 或私有主机名。
- 将生产环境实际渲染输出视为当前公开真值；源代码数组和本地模板只能提供实施上下文，不能证明已部署。

## 原始 HTML 与渲染后 DOM

1. 获取服务器响应并保留原始 HTML。
2. JavaScript、缓存、优化或插件可能改变结果时，检查浏览器渲染后的 DOM。
3. 比较原始与渲染形式中的 Title、Meta、robots、canonical、标题、内部链接、可见正文和 JSON-LD。
4. 将重要内容或 Schema 分类为 server-rendered 或 client-injected。

`curl` 和普通 HTTP client 会返回原始 HTML，可以检测响应中存在的 JSON-LD。文本提取工具可能删除 `<script>`；这是工具限制，不是 Schema 缺失的证据。只有检查了合适的原始或渲染来源后，才能报告 Schema 缺失。Rich Results Test 是补充验证，不能作为唯一 inventory。

## WordPress 与 Rank Math 输出归属

- 将实际渲染的 Title、Meta、H1、社交标签和 canonical 与 `seo-tags.md`、`docs/sitemap.md` 对比。
- 检查 Rank Math、WordPress core、GeneratePress 或子主题 hook 是否重复或冲突输出 Title、robots、canonical、Open Graph 或 JSON-LD。
- 确认只有一个预期 XML Sitemap 输出方，标记 Rank Math 与 WordPress core Sitemap 的重复或冲突发现路径。
- attachment、author、date、search、taxonomy archive、feed、pagination 和 REST 可发现 URL，只有实际存在或出现在抓取/索引证据中时才复核；诊断缺陷前先确认索引控制是否为有意设置。
- 根据生产输出验证模板条件；未启用的 PHP 元数据数组不是生产真值。

## 可索引性、规范化与 URL

- 同时检查 HTTP 状态、robots meta、X-Robots-Tag、canonical、Sitemap membership 和可抓取内部发现路径。
- 只有 URL variant 实际响应或出现在证据中时，才检查 HTTPS、首选主机、小写和尾部斜杠一致性。
- 对改变或失败的 URL 跟踪每次重定向，标记 loop、chain、把临时重定向用于永久迁移，以及最终目标冲突。
- 区分真正 soft 404 与简短但有效的联系、法律或工具页面。
- 绝不能用 `site:` 结果数量作为索引覆盖率；可用时使用 GSC 和代表性 URL Inspection 证据。
- 实施当前网站任何 URL 变更前调用 `wp-redirect-guard`。

## 移动端、HTTPS 与响应质量

- 在代表性模板检查 viewport、水平溢出、点击目标可用性和有意义的移动端/桌面端内容一致性。
- 验证 HTTPS、HTTP-to-HTTPS 行为、mixed content 和损坏的安全子资源。
- HSTS 和其他安全响应头属于安全/韧性 review，不是自动排名缺陷。
- 不得引用已退役的 Google Mobile-Friendly Test；使用移动端渲染检查、Lighthouse 和当前第一方证据。

## 性能与媒体

- Lighthouse 实验室结果与 CrUX 真实用户数据分开，并注明 URL 级或 origin 级范围。
- LCP 图片必须能够被尽早发现、不得 lazy-load，并获得合适优先级；首屏以下图片在有价值时懒加载。
- 检查固有尺寸或稳定宽高比、响应式候选、MIME/状态、压缩、解码和重复 payload。
- 信息型图片需要简洁描述性的 alt；装饰性图片使用 `alt=""`。
- 检查 font display、preconnect/preload 证据、阻塞资源，以及生产环境只加载一份子主题 `style.css` 的已接受基线。

## 架构与内容归属

- 页面只要至少有一个可抓取且相关的内部入口，就不属于孤立页面；不要强制添加无关同级链接或通用“三次点击”规则。
- 确认一个主要意图和归属 URL；诊断关键词蚕食前使用 GSC query-to-page overlap。
- Title 和 Meta 长度只作为软复核参考，不能单独构成缺陷。
- 不要求关键词机械出现在前几个词、H1、Title 和 URL；应评估 intent、清晰度、可见内容和 SERP 证据。

## 条件性检查

- Crawl budget、faceted navigation、session ID 和 infinite-scroll fallback：仅在 URL 数量或抓取证据表明相关时检查。
- Hreflang 和 locale parity：仅在存在多语言或多地区 URL 时检查。
- Local SEO 和 NAP：仅在页面或 listing 具有本地搜索用途时检查。
- E-E-A-T 指示项：资质、引用、案例、客户和认证只能作为待验证证据，绝不能编造。
- 竞品和外链指标：标记 provider、market、date、cap 和 estimate；不能直接转化成修改。

## 获得授权并修复后的验证

- 根据影响范围构建或 lint 源代码。
- 在改变的 URL 或代表性模板重新检查原始和渲染输出。
- 可用时重新运行原结构化报告。
- 确认没有新增 URL、canonical、Schema、元数据或性能回退。
- 按 `audit-contract.md` 记录 finding 结果和复核周期。
