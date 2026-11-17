# BD-02：Sportswear 采购证据补强

日期：2026-11-16。最新状态：`deployed / production-cache-pending`。所有者于 2026-11-17 说“审核发布吧”，批准最终版本；三个文件已上传并校验，但普通正式网址仍显示 Flywheel 旧缓存，最终生产验收待刷新后完成。下文 Local 审核状态为历史，实际部署见文末。

## 问题与判断

[11-16 手动样本](valid-retest/manual-2026-11-16/README.md)中，具体技术针织问题 D04 推荐 Athletik，而宽泛运动服 OEM 问题 BD-02 没有提及；10-29 的 BD-02 同样未提。两次采集方式不同，不证明稳定缺席或原因。此次提供的 BD-02 来源包括供应商官网、FAQ、工厂资料与供应商平台；来源清单不自动等于每一项都已核实为正文引用。

定向对照：

| 来源 | 本次观察 | 与 Athletik 的关系 |
|---|---|---|
| [INGOR 工厂页](https://www.ingorsports.com/view-of-factory.html) | 供应商将工厂介绍、OEM/ODM 和工厂影像入口集中呈现 | 内容是供应商自述，不等于独立审核；Athletik 已有生产过程材料但分散在技术指南。 |
| [HUCAI 首页](https://www.hcactivewear.com/)和 [Eationwear 首页](https://www.eationwear.com/) | 分别提供生产能力、工艺、面料、质量等可供买家深入查看的入口 | 为厂商自述，不判断其工厂、认证或绩效。Athletik Sportswear 已有 buyer fit、产品、工艺、质量和流程内容，不重复创建。 |
| Alibaba / Made-in-China / SourceReady 条目 | 属平台或聚合来源 | 平台展示及验证标签不自动证明工艺性能、订单履约或完整独立审计。本轮没有申请、更新或联系平台。 |
| [Athletik About](https://www.athletikapparel.com/about-us/)及 [Sportswear](https://www.athletikapparel.com/sportswear-manufacturer/) | About 已有日期化买家公开名单；Sportswear 已有 14 张获准产品展示与生产能力说明 | 本轮补的是运动服采购落点上对现有证据的集中组织，不是新获得的第三方背书。 |

## Local 实施

在现有 Sportswear 页的 Construction & fabric 后、Program execution 前，增加 **Manufacturing evidence** 区块，四项各提供说明和可见链接：

1. 已获准的 Sportswear lookbook：展示训练上衣、运动内衣、紧身裤与短裤等，不凭照片推断客户、订单或性能。
2. 已公开的 [FLATLOCK / ACTIVESEAM 生产指南](https://www.athletikapparel.com/flatlock-vs-activeseam-technical-knitwear/#industrial-flatlock)：Yamato 与 Merrow 是分别拍摄的生产示范，所展示自然状态接缝不当作性能测试；链接从 FLATLOCK 处开始，可继续看到 ACTIVESEAM 及成衣接缝。
3. [面料规格库](https://www.athletikapparel.com/knitted-fabrics-manufacturer/#merino-fabric-examples)：仅以代表性成分和 GSM 供项目参考，不称实时库存或测试结果。
4. 中国生产实体在 [Canadian Tire 名单](https://s201.q4cdn.com/326551073/files/doc_downloads/2026/03/CTC-Tier-1-Owned-Brand-Supplier-List_EN.pdf#page=4)及 [Sainsbury's 名单](https://corporate.sainsburys.co.uk/media/334du1a0/tier-one-supplier-list-gm-clothing-september-2026.pdf#page=10)的日期化公开列名，沿用 About 已批准的事实与原 PDF 页码；区块明确名单不证明特定 sportswear 订单或推荐背书。

11-16 核查两家官方入口仍指向上述 PDF；两份 PDF 均 HTTP 200、`application/pdf`，各自与 11-02 保存的原件 SHA-256 相同。两份原件分别在第 4 页和第 10 页列有 Athletik；保留原名单，不公开员工人数等额外信息。链接日期和范围详见[原核验记录](buyer-disclosures-2026-11-02.md)。

这不是新增第三方发表，不承诺 AI 使用这些资料。现有 Sportswear 的技术指南相关链接、客户披露与已接受样本继续保留；不重做 MOQ / 颜色沟通、外联、第三方建档、企业注册信息或近义榜单。

## 代码与交付

| 类型 | 文件 / 操作 |
|---|---|
| 代码 | `template-parts/product-category/sportswear-evidence.php` 新增区块 |
| 代码 | `template-parts/product-category/page.php` 仅 Sportswear slug 条件调用 |
| 样式 | `style.css` 增加 scoped 卡片布局 |
| 媒体 / 数据库 | 无新增或变更 |

新增内容位于现有页面，未改 URL、H1、Title、meta、canonical 或 Schema 的实现。Local 与生产的现有 meta description 文本存在差异，本轮未修改相应 SEO 设置；不能把两个环境文本差异归因于新增区块。上线前按 SSH 部署流程再次对照生产共享文件、备份并只部署审核批准的变更。

## 验证

- 两个 PHP 文件均通过 PHP 8.2.35 语法检查；`git diff --check` 通过。
- Local Sportswear 返回 HTTP 200、单一 H1，服务端初始 HTML 含四张证据卡和五个链接，不依赖 JS。两个站内落点的目标锚点均存在。
- 隔离 headless Chrome 在 1440、768、390、320px 检查区块、链接数量和页面横向溢出，均通过；1440 与 390 截图已目视核对，页内无 pageerror。Underwear、Outdoor、Merino、Knitted Fabrics、Silk Wear、Sports Accessories 六个类目均未显示新增区块。
- 检查文件位于 Git 忽略目录 `.chrome-check/sportswear-evidence-qa-20261116.json` 和 `.chrome-check/sportswear-evidence-{1440,768,390,320}.png`，只用于本地审核。未使用或关闭所有者的浏览器页面。
- 下一步：所有者审核 Sportswear 页面新增区块与英文；批准上线后由 Codex 按项目 SSH 部署流程核对、备份、部署并做生产验收。无生产操作、索引申请或 AI 结果重采。

## 2026-11-16 视觉优化（Local 审核）

按所有者对新增区块的反馈，在 Local 调整视觉呈现，不改变原有标题、正文、来源说明、链接或其顺序：桌面将三项站内证据入口并列，并把较长的买家公开名单独立成横向资料区；平板与手机依屏宽换行。四项复用站内线性图标，内部链接采用品牌强调色，两个 PDF 入口使用独立可聚焦的链接框。保留名单不证明特定订单或背书的说明，不把图标作为认证或背书。

本轮视觉增量仅 `style.css` 和 `template-parts/product-category/sportswear-evidence.php`，无新增媒体、数据库操作或生产部署。整个新增区块仍为 `local-review / not-deployed`；如获准发布，需要结合原实施一起核对三个文件：上述两项及 `template-parts/product-category/page.php`。

Local 检查覆盖 1440、1200、1024、768、390、360、320px：原文与五个链接和视觉调整前快照一致，四个图标正常、无页面横向溢出，链接可依次键盘聚焦并显示焦点；六个其他产品类别页未出现该区块。PHP 语法及 `git diff --check` 通过。截图、原文与链接快照及测试汇总保存在 Git 忽略目录 `.chrome-check/sportswear-evidence-polish-20261116-*`。内容和视觉仍待所有者审核，不代表上线授权。

## 2026-11-17 部署与缓存验收

- 所有者明确批准“审核发布吧”；冻结最终代码 `161118e`，包含原证据区和后续视觉调整。发布前 SSH 已确认正式域名、`production`、活动子主题及目录；生产 `style.css` 和共用模板均与此前 `969f94f` 基线完全一致，新增模板此前不存在，既有线性图标依赖与批准版本一致。
- 按依赖顺序上传 `template-parts/product-category/sportswear-evidence.php`、`style.css`、`template-parts/product-category/page.php`；两个 PHP 临时文件通过服务器语法检查，三个正式文件的 SHA-256、大小及 `0644` 权限与冻结版本一致。未上传媒体，未修改数据库或 WordPress 设置。
- 私有备份目录：`C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-17-161118e-geo-20261117T052226Z`。含两个原生产文件、三个冻结发布文件、清单、公开基线及上传结果；不在 Git 或公开目录。
- Cloudflare 对普通 Sportswear URL 与旧版 CSS URL 的定向 purge 返回成功；但普通正式网址仍返回 `x-cache: MISS, HIT` 的 Flywheel 旧 HTML，未出现证据区；旧 CSS 也仍从上游旧缓存返回。未把 Cloudflare 成功回执或 WordPress Object Cache 等同 Flywheel 页面缓存刷新。
- 使用带临时查询参数的生产预览，确认新版 HTML 和 CSS 已由服务器正确输出，CSS 哈希与冻结文件一致；隔离 Chrome 的 1440 / 1024 / 768 / 390 / 320px 均显示 4 项证据、5 个链接、4 个图标，无横向溢出；六个其他品类无新增区块。首页及七品类的 title、description、H1、canonical、robots、JSON-LD 相对上线前基线一致；PDF、技术指南和面料锚点可访问。上述预览不等于普通网址缓存验收。
- 所有者确认已在 Flywheel 刷新缓存。随后再次定向清除 Cloudflare 的页面及旧 CSS，普通网址在 Flywheel SSH 出口的 Chicago 节点已返回新版：4 项、5 个链接、CSS 哈希与冻结文件一致，页面 SEO 元数据及 JSON-LD 与上线前一致；本机的 San Jose 节点仍返回旧 HTML 和旧 CSS（桌面、手机和机器人访问均复现）。公开 URL 的 `PURGE` 请求被 Cloudflare 返回 400，未形成 Fastly 清理结果；没有修改 DNS、缓存规则或站点设置。结果说明不同访问路径当时不一致，不能宣布所有普通访客均已看到新版。
- 普通网址仍须从本机访问节点确认新版 HTML / CSS、响应式显示及链接，才可将状态升级为 `production-verified`。无需重复要求所有者刷新；未重试索引申请、未提交询盘、未推送 Git。
