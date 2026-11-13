# 代表性面料库——Local 审核版（首批 2025 羊毛选样）

日期：2026-11-10。当前状态：`deployed / production-verified`。所有者已授权整批上线，9 文件已发布，并于 2026-11-13 完成普通正式网址浏览器复验；详见[生产发布记录](fabric-library-expansion-2026-11-10.md#6-2026-11-10-生产发布缓存验收未完成)。下文保留首批 Local 研发历史。

同日后续：所有者提供常用面料工作簿，已按 HY24／HY25／HY26 与规格完整性筛选新增 73 款，当前库共 97 款；通用纤维筛选、来源边界与最终部署清单见[面料库扩充记录](fabric-library-expansion-2026-11-10.md)。下文 24 款与 8 文件是首批历史阶段，实际完整发布为 9 个运行时文件。

## 1. 授权与范围

所有者提供 2025 羊毛合集规格照片，说明这只是部分代表性面料，不是目前全部面料；2026 合集尚未完成。
所有者随后批准：先在现有 Knitted Fabrics 页加入代表性面料库，Merino 页放精选入口，不新增独立页面；先做料号、成分、GSM 规格卡，实拍图片以后补。

- 原始资料：`C:\Users\Administrator\Pictures\微信图片_20261110142950_298_41.jpg`。
- 原图只用于核对，不复制到主题、Git 或公开媒体目录，不使用通用纹理冒充对应面料。
- 本轮仅 Local；不上传生产、不改生产数据库、不推送 Git。
- 此任务独立于同日已经上线的 Jacquard Showcase，不沿用其上线授权。

## 2. 页面位置与交互

| 位置 | 本轮内容 |
|---|---|
| `/knitted-fabrics-manufacturer/#merino-fabric-examples` | 在既有 Fabric structures 之后加入规格库；24 款原顺序展示 |
| `/merino-wool-manufacturer/#merino-yarn-sourcing-and-fabric-development` | 在既有面料开发区块内加入 HY254776、HY254955、HY254931 三条紧凑入口 |
| `/knitted-fabrics-manufacturer/#fabric-hy254955` 等 | 精确定位料号；JS 自动显示所在分页，不让目标留在隐藏页 |

完整库标题为 `Fabric selection library`，不将总模块限定为 Merino 或某一年份；当前收录系列单独标注 `Merino wool · 2025 collection`，只描述目前展示的资料，不代表全部生产能力。Merino 的精选入口仍标注 `Selected Merino wool fabrics · 2025`，带范围提示和动态计数的 `View all 24 fabric references` 链接。

- 桌面 3 列、平板 2 列、手机 1 列；每页桌面／平板 6 款、手机 3 款，新增记录不会无限追加页面高度。
- 搜索支持料号或纤维名称，配合成分类别、GSM 区间筛选；有结果数量、空结果、重置及上一页／下一页状态。
- GSM 分组：小于 150、150–199、200–249、250 及以上；不是产品适用场景或性能分级。
- 手机筛选单列，避免较长成分选项截字；按钮使用独立浅色底，避免继承父主题低对比深色底。手机页码单独居中，两个翻页按钮在下一行等宽排列。
- 全部记录由 PHP 输出；无 JS 时前 6 款直接显示，其余分为三个可展开的原生 `details` 组。
- 增强脚本异常时恢复原生分组；键盘焦点、筛选状态提示与深链接同时保留。
- 卡片只保留类别、料号、GSM 和成分；所有者审核后要求移除初版的 `View garment example` 入口。既有 Showcase 和 Merino 精选入口保持不变，数据中的已有成衣关联不再用于卡片输出。
- Contact 仅一个公共入口，没有新建表单字段、预填参数或自动提交。

## 3. 数据与表达边界

单一数据源为 `inc/fabric-library.php`。24 款逐项与照片核对，并由独立代理复核：纯 Merino 9 款、混纺 13 款、内外层分别标注 2 款，范围 95–330 GSM。

- 每个独立成分字段均合计 100%；内外层比例不合并、不平均。
- HY254798 按原图保留 `Polyamide`，HY254888 保留 `Nylon`；`Tencel`、`Coolmax`、`Bamboo Fiber` 也按来源保留，不擅自替换或推断。
- HY254931 为 240 GSM；HY254888 为 210 GSM。不得将成衣主提花的 240 GSM 自动套用至另一料号。
- 不推断宽幅、微米、针织组织、结构厚度、现货、MOQ、测试结果或性能等级；原图未明确的 GSM 层级不作扩写。
- 页面明确说明 `Compare representative fabric references by composition and weight. This selection is not our complete fabric range or a live stock list.`；2025 移入当前系列标签，不再限定整个面料库。
- 本轮不纳入 HY265077，因为它不在本次 2025 原图清单中；其他已批准单独供货示例仍是后续独立内容，不伪装为该合集记录。
- 本轮只有简短标题、标签、规格和范围说明，不改写既有长篇营销正文、SEO 标题／描述、canonical 或 Schema。

实施沿用 `wp-page-template-builder` 的共享模板与转义约束、`wp-design-polish` 的设计 token／响应式／焦点要求，以及 `wp-brand-voice-guard` 的来源和事实边界。

## 4. 验证

### 初版检查（`75c0d24`）

- PHP 六个新增／变更文件语法检查通过；JS 语法与 14 组独立 DOM fixture 检查通过。
- 原图与数据 24 条完全一致；料号唯一、分类数量、GSM 范围及分层比例检查通过。
- 真实 Chrome 的 31 组 Local 检查通过：1440／1024／768／360 响应式，320 窄屏补测，24 款分页无遗漏／重复，成分 9／13／2 分类，GSM 边界，料号／纤维／大小写／多词组合搜索，筛选交集／空结果／重置，键盘与缩放焦点，三个精选链接和离开首页的料号锚点，异常 hash，以及无 JS 展开组／深链接。
- 单 H1、按钮触控尺寸至少 44px、无页面横向溢出；Showcase 3 款／Merino 成衣预览 2 款／首页 Ocean Depth 保持不变，筛选 JS 只在 Knitted Fabrics 加载。
- 浏览器 JS 异常 0、本地 HTTP 4xx／5xx 0。检查隔离外部请求，未测试 Cookiebot／其他第三方服务，也不据此宣称生产验收完成。
- 目检发现并修复父主题按钮低对比、手机筛选截字及窄屏页码折行；最终追加 3 组检查全部通过：360／320 首尾页的页码和等宽按钮、触控及溢出，以及全新无 JS 页面直达后续组料号并自动展开。
- 主报告 `.chrome-check/fabric-local-independent.json`；最终补验 `.chrome-check/fabric-local-mobile-final.json`。共 31 组主验加 3 组补验通过，最终截图已人工复看。
- 测试脚本、截图、报告保存在 Git 忽略的 `.chrome-check/`，不随代码发布；没有提交询盘或操作生产。

### 同日后续：规格卡简化与高度统一

所有者指出个别卡片的成衣入口打破各行和不同分页的高度一致性，批准移除入口并统一桌面卡片基准高度。

- `card.php` 移除入口输出和成衣 URL 解析，不改变 24 款规格、料号锚点或筛选数据。
- `style.css` 清理入口专用样式，新增局部 `--ma-fabric-card-min-height` token，以最小高度而非固定高度统一非手机端卡片；不裁剪或省略成分内容。
- 手机端解除最小高度，保留自然排版，不为短规格增加无意义空白。
- 最终 token 为 `18rem`；1440／1200／1024／768／601 宽度下，24 款跨行、跨 4 页均为 288px（测试标准字号），高度差 0px，成分完整显示。
- 手机 360／320 的 8 页卡片自然高度约 194–280px，无横向溢出或裁剪；保留不同内容所需高度。
- 21 组追加验收全部通过，覆盖成分筛选、长成分、三个深链接、无 JS 分组和锚点；规格卡成衣链接为 0，Merino 的 3 个面料入口／2 款成衣精选、Showcase 的 3 款展示不变。数据和 JS 对比 `75c0d24` 无变更。
- 浏览器 JS 异常和 Local HTTP 错误均为 0；报告 `.chrome-check/fabric-card-height.json`，截图 `.chrome-check/fabric-card-height-{width}-{page-1,page-2,layered}.png` 已人工复看。本轮仍 `local-review / not-deployed`。

### 同日后续：明确完整库与精选入口的分工

所有者再次确认完整规格库留在面料页、Merino 仅保留精选入口，并要求先做一版。原有位置、数量和链接目标已经符合分工，本次小幅明确标题与入口表达，不搬动或复制整套规格库。
本节是 `5560a8d` 的历史版本；总标题与主库简介随后按下节更正，Merino 精选不变。

- 完整库 H2 改为 `Merino wool fabric selection`，原有 2025 代表性、非全部范围、非实时库存说明继续保留。
- Merino 精选标题明确材料和年份，新增简短范围提示：`A preview of our 2025 selection, not our complete fabric range.`
- 查看全部入口改为 `View all 24 fabric references`，数量读取共享数据，不手工固化；仍跳转面料页原有锚点。
- 不改规格数据、筛选／分页 JS、卡片等高规则、页面 H1／SEO 元数据／URL 或既有 Showcase。
- 1440／768／360／320 四档共 16 组本地验收通过：完整 24 款仅在 Knitted，Merino 保留 3 款面料精选与 2 款成衣入口，动态 CTA 和三个料号均经实际点击定位，单 H1、触控尺寸至少 44px、无横溢出或范围说明裁剪。JS 异常／Local HTTP 错误均为 0。
- 报告 `.chrome-check/fabric-page-roles.json`；截图 `.chrome-check/fabric-page-roles-{knitted,merino}-{1440,768,360,320}.png` 已人工复看，仍未获生产发布授权。

### 同日更正：通用面料库与当前收录系列分层

所有者指出将来会增加非 Merino 面料，原总标题和简介范围过窄。本轮按已授权要求重新组织头部层级：

- 总标题 `Fabric selection library` 和通用选型说明不绑定纤维或年份；范围声明继续明确非完整系列、非实时库存。
- 右侧 `In this library` 仅显示当前记录总数和 GSM 范围，按数据计算；不是全公司的面料总数或供货范围。
- 新增轻量、非交互的 `Currently included` 系列条，当前仅显示有来源的 `Merino wool / 2025 collection`，不创建空系列、预告款或虚构非 Merino 规格。列表允许换行以容纳以后确认的系列标签。
- 当前 Composition 筛选仍准确对应这 24 款：纯 Merino／Merino 混纺／分层成分。不将其改成含义更广但没有对应数据的泛称。
- 以后实际加入非 Merino 时，需要同时更新记录分组、筛选选项／验证及系列标签；本次是呈现与表达调整，不声称已经完成通用多材质分类引擎。
- 保留 `#merino-fabric-examples` 作为既有入口的兼容锚点；不改页面 URL、H1、SEO 元数据，Merino 页精选和 Showcase 不变。
- 本轮 1440／1024／768／360／320 五档共 9 组 Local 验收通过：总标题、范围说明与当前系列无截字或横溢出；24 款和 9／13／2 分组、桌面与手机分页筛选、三个料号深链接及 Merino 的 3 款面料／2 款成衣入口均保留。JS 异常和 Local HTTP 错误为 0。
- 报告 `.chrome-check/fabric-generic-library.json`；截图 `.chrome-check/fabric-generic-library-{width}-header-first-row.png`，桌面与手机已人工复看。仍为 `local-review / not-deployed`。

## 5. 待批准部署清单

本轮运行时代码共 **8 个文件**：

1. `inc/fabric-library.php`
2. `assets/js/fabric-library.js`
3. `template-parts/fabric-library/card.php`
4. `template-parts/fabric-library/library.php`
5. `template-parts/fabric-library/preview.php`
6. `template-parts/product-category/page.php`
7. `functions.php`
8. `style.css`

媒体：无。数据库：无。新增页面／URL／301：无。内部记录与原始资料不上传生产。

同日卡片简化修订相对初版的增量仅 `template-parts/fabric-library/card.php`、`style.css` 两个文件；整个面料库尚未上线，后续正式发布仍使用上述完整 8 文件清单的最终版本。

随后的两页分工表达微调增量为 `template-parts/fabric-library/library.php`、`template-parts/fabric-library/preview.php`、`style.css` 三个文件，仍包含在完整 8 文件清单中，无额外媒体或数据库步骤。

通用面料库头部重设计增量仅 `template-parts/fabric-library/library.php`、`style.css`，同样属于上述完整清单；不新增媒体或数据库操作。

获批后仍按 [SSH 部署流程](../operations/flywheel-ssh-deployment.md) 核对当前生产版本、精准备份和传输。
先放置新数据文件、JS 和模板部件，再启用 `functions.php` 引入及共用模板调用，避免出现缺失依赖的发布窗口。
发布后需要复核两页普通 URL、分页／筛选／跨页锚点和既有 Showcase；本地提交不等于上线。

后续实拍图或 2026 合集需另外提供、核对并批准，不自动替换本批 2025 来源说明。
