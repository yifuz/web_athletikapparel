# 面料库扩充：HY24／HY25／HY26 与生产发布记录

日期：2026-11-10。当前状态：`deployed / production-verified`。所有者已批准当天改动上线，9 文件已发布；2026-11-13 使用普通正式网址完成浏览器验收。Git 未推送。下文 Local 与缓存待验收状态保留为历史，最终状态见第 6 节末尾。

## 1. 授权与范围

所有者提供 `D:\张一夫\面料整理_20261110.xlsx`，要求选择 HY26、HY25、HY24 开头且信息齐全的近期常用面料，整合到既有 Fabric Library，不需导入全部数百款。

保留[首批 24 款羊毛选样](fabric-library-2026-11-10.md)及 Merino 页 3 个精选入口；本次仅增加可核对的记录，不删除原合集中的较早料号，不自动覆盖已审核数据。

## 2. 数据选择与复核

工作簿只读打开，原文件未修改；无公式。来源哈希（SHA-256）：

`3c67b3831bb5dc70b0a9f85f4f4168d04718bb5f375e079c49d7dea4ce0c62c1`

| 阶段 | 数量 | 处理 |
|---|---:|---|
| 面料汇总主表 | 763 | 不把来源明细／待核对页重复计数 |
| HY24／HY25／HY26 | 93 | 按精确料号前缀选择 |
| 主表标为信息齐全 | 88 | 继续检查实际规格，不仅依赖状态栏 |
| 现有库已含 | 8 | 保留原记录，不重复导入 |
| 原料／认证表述待明确 | 7 | 暂不导入 |
| 本轮新增 | 73 | HY24：20，HY25：29，HY26：24 |
| 合并后的库 | 97 | 无重复料号，GSM 范围 75–530 |

新增记录位于 `inc/fabric-library-recent.php`，每项以 `Workbook row N` 注释关联主表行号。73 项全部经 PHP 实际加载后与 Excel 逐字段独立复核；料号、克重、成分和行号一致。单层比例合计 100%；分层分别合计 100%，不推算整体比例。

原始工作簿、来源照片／文件索引、客户名称和其他内部信息不进入 Git 或公开页面；仅提取本轮获准展示的料号、GSM、成分。

### 暂不导入的记录

| 料号 | 原因 |
|---|---|
| HY244636 | GSM 缺失，标称与实测并存 |
| HY244723 | 成分记录冲突，主表留空 |
| HY254827 | GSM 有涂改，主表留空 |
| HY254853 | 190／200 GSM 未确认 |
| HY265012 | GSM 与成分均缺失 |
| HY244569、HY244593 | 仅写 Graphene，未明确承载纤维 |
| HY254782 | Coffee fiber 未明确实际纤维组成 |
| HY254821 | Outlast／Coolpass 等名称未明确实际纤维组成 |
| HY264989 | Anti-static yarn 未明确纤维种类 |
| HY244720 | 含 FSC 标记，来源明确说明认证未验证；本轮不扩展认证声称 |
| HY265011 | Bamboo 未明确纤维加工类别，本轮保守暂缓 |

暂缓并不表示面料不可供或性能有问题；只表示当前资料不足以支持本轮清晰、准确的公开规格。

### 与旧库重叠及来源差异

- HY254776、HY254869、HY254931：一致，不重复添加。
- HY254785、HY254932、HY254938：新表为一般 Wool，旧合集明确 Merino wool；本轮保留旧合集，不凭新表较泛名称自动降级或升级其他记录。
- HY254888：新表提供整体比例，旧库分别列外层和内层；不是同一种计量层次，本轮保留已审核的分层表示，不替换或自行计算。
- **HY254955：所有者本轮明确要求保留网站原规格，新表条目待核实。** 旧规格为 52% Merino wool / 43% Polyester / 5% Spandex；新表为 52.3% Wool / 42.8% Nylon / 4.9% Spandex。此差异不只是取整，不能自动合并。现有面料入口与已发布 Ocean Depth 案例不改。

### 需要保留的来源边界

- HY244663 使用主表 145 GSM、50% Recycled Polyester / 50% Wool，不采用“合集参考，不参与定值”的 185 GSM／Merino 写法。
- HY244701、HY254877 保留普通 Polyester，不从参考合集添加 Recycled。
- HY265087 保留 **250–255 GSM** 区间，不取中位值或单个端点；与 HY265088 均保留主表的整体 Wool 成分，不改用手写原标的 Merino 或分层比例。
- HY244685 独立列 `Outer` 和 `Inner`，各层合计 100%。
- HY244586 保留 `Mercerized wool`，不推断 Merino；HY244598 保留主表已明确的 175 GSM 打样值。
- Graphene Polyester、Thermolite Hollow Polyester、Recycled Polyester 等已明确纤维名称保留原文；不据此新增抗菌、保暖等级、认证、测试结果或供货保证。

## 3. 页面与交互

- 维持 `Fabric selection library` 总标题与代表性／非库存范围说明。
- 当前收录栏分为 `Recent fabric references · HY24 / HY25 / HY26` 与 `Merino wool · 2025 collection`，不把前缀推断为某次正式合集或生产年份。
- 新增 73 款按料号降序在前，原 24 款继续保留。分页仍桌面／平板 6 款、手机 3 款；数据增加不导致全量卡片纵向展开。
- `Fiber content` 改为实际成分多标签筛选：Wool / Merino wool、Cotton、Polyester、Nylon / Polyamide、Modal / Viscose / Tencel、Polypropylene、Acrylic、HPPE。混纺可匹配多个选项，不把一般 Wool 自动标为 Merino，不根据品牌纱推断纤维种类。
- 卡片标签使用明确的纯成分、Merino 混纺、分层或占比最大的已声明纤维；完整成分始终显示，不添加未经证实的结构／用途。
- GSM 记录增加 min/max，仅用于区间筛选与汇总，前台仍显示原始区间。筛选按区间相交，避免错误排除跨边界规格。
- 来源区间的数字字号使用现有 H3 token，避免手机料号与区间挤压；其余卡片最小高度、自然换行和视觉 token 保持。
- 精确料号锚点、键盘焦点、无 JS 原生展开回退继续保留。URL、H1、SEO 元数据、Schema 和既有 Showcase 不变。

## 4. 验收

- 73 项源数据全字段复核及源文件哈希检查通过；所有 PHP 修改文件语法通过。
- JS 多材料／区间交集、分页、搜索、深链、焦点和回退 17 项离线 DOM 测试通过，浏览器异常 0。
- Local 12 组浏览器验收全部通过，JS 异常／Local HTTP 错误均为 0；1440／1024／768／360／320 五档全 97 款可分页遍历，无横向溢出或截字。桌面卡片统一 288px；手机自然高度约 194–280px。
- 8 类纤维匹配数分别为 wool 41、cotton 13、polyester 62、nylon 24、cellulosic 9、polypropylene 4、acrylic 2、hppe 1（多标签可交叉，不相加为总数）；克重分组分别 6／38／17／36。组合筛选、搜索、空结果、重置、跨断点焦点、Merino 3 个料号／2 款成衣入口、旧 HY254955 值及无 JS 全 97 款和后页锚点均通过。
- 报告 `.chrome-check/fabric-expansion.json`；桌面与手机整模块、320px 区间卡片截图已人工复看。数据复核脚本 `.chrome-check/verify-recent-fabric-data.py`，JS 离线报告 `.chrome-check/fabric-material-filter-fixture.json`。
- 测试脚本、截图和报告仅在 Git 忽略的 `.chrome-check/`，不发布。

### 同日修订：翻页不主动滚动

所有者反馈 Next／Previous 点击后画面跳动。本轮移除分页回调中的列表顶部滚动及强制移焦，保留分页按钮焦点和结果数量播报；精确料号链接仍按用户指定目标滚动定位。没有修改数据、文案或每页数量。

本轮运行时增量为 `assets/js/fabric-library.js`；语法检查及 17 项离线交互回归通过。1440／768／360／320 四档共 208 次真实鼠标／Enter／Space 激活后，滚动坐标变化均为 0；包含首尾页、筛选结果和禁用状态，精确料号链接定位正常，JS／Local HTTP 错误均为 0。报告 `.chrome-check/fabric-pagination-nojump.json`。

本次只取消主动滚动，不强制固定列表高度；末页卡片较少、手机成分长短不同时，区块与分页按钮仍会随内容自然移动，但视窗不自动跳转。不为此增加大片空槽。仍仅本地，不部署生产。

## 5. 已批准部署清单

本轮增量 6 个运行时文件：

1. `inc/fabric-library-recent.php`（新增）
2. `inc/fabric-library.php`
3. `assets/js/fabric-library.js`
4. `template-parts/fabric-library/card.php`
5. `template-parts/fabric-library/library.php`
6. `style.css`

所有者随后要求“把今天的改动部署吧”，授权完整面料库最终版本，包括上述扩充与翻页不主动滚动。完整实际发布清单共 **9 个**，按依赖顺序：

1. `inc/fabric-library-recent.php`
2. `inc/fabric-library.php`
3. `template-parts/fabric-library/card.php`
4. `template-parts/fabric-library/library.php`
5. `template-parts/fabric-library/preview.php`
6. `assets/js/fabric-library.js`
7. `style.css`
8. `functions.php`
9. `template-parts/product-category/page.php`

无媒体、数据库或新 URL 操作；不上传 Excel、内部记录或测试产物。

先部署新数据文件，再启用引用，按[专用 SSH 部署流程](../operations/flywheel-ssh-deployment.md)精准备份、传输与生产验收。Git 本地提交不等于推送或上线。

## 6. 2026-11-10 生产发布（缓存验收未完成）

- 授权：所有者批准今天的改动；上午已上线 Jacquard 不重复发布，本批仅发布面料库全部研发修订及 Next／Previous 不主动滚动。
- 目标：Knitted Fabrics 面料选型入口及 Merino 精选关联；主要变量为具体料号／成分／GSM 参考与可搜索筛选，不改 H1、SEO 元数据、URL 或成衣 Showcase。
- 冻结版本：`1e2b88f`，相对已部署基线 `128de86` 恰好 9 个运行时文件；3 个旧文件的生产内容与基线规范化比对一致，6 个新文件未被占用。工作区文件与批准提交一致。
- 生产环境：专用 SSH 确认域名、`production`、活动主题和 theme／uploads 路径匹配。既有 `fileperms(/www/.wordpress/)` CLI 警告未修改平台核心，所有命令退出状态及正式页分别检查。
- 私有备份：`C:\Users\Administrator\.ssh\athletik-deploy-backups\2026-11-10-1e2b88f-fabric-20261110T093921Z`，含 3 个原代码文件、6 个相关页面 post／metadata 只读快照及完整 manifest；不在公开目录或 Git。
- 实际传输：9 文件经同目录临时文件哈希／大小与 7 个 PHP 服务器语法检查后激活；先依赖，再 `functions.php`，最后共用类目模板，未发生回退。生产 9 文件 SHA-256、大小、权限均与冻结发布源一致。
- 数据库与媒体：未执行写入；6 个相关页面的 post／metadata 前后完全一致，没有整库同步、建页、表单提交或额外媒体上传。
- 公开静态资源：正式 HTML 引用的 `style.css?ver=1794303653`（184449 bytes）及 `fabric-library.js?ver=1794303653`（9344 bytes）均 HTTP 200，解码后的 SHA-256 与发布源一致。
- 公开页面：6 个普通 URL HTTP 200，单 H1、title、description、canonical、robots 与发布前基线保持。PowerShell 普通 GET 已见 97 款；但标准 Chrome `x-fw-type: VISIT` 及 Headless `FLYWHEEL_BOT` 普通请求均收到 `x-cache: MISS,HIT` 旧 HTML，Knitted 0 款、Merino 0 面料入口。不能用部分请求成功替代浏览器验收。
- 缓存处理：只读核查当前 WP-CLI 没有平台页面缓存命令，标准 `wp cache flush` 仅是 Object Cache，未误用或伪造平台事件。已请所有者按 [Flywheel 官方步骤](https://getflywheel.com/wordpress-support/how-do-i-clear-my-cache/)在 Advanced → Flush Cache 刷新，随后继续普通 URL 验收；没有用查询参数或强制绕缓存请求冒充通过。
- 证据：`.chrome-check/fabric-deploy-manifest-20261110.json`、`fabric-production-20261110-baseline.json`、`fabric-production-cache-20261110.json`、`fabric-production-cache-20261110-standard.json`；均 Git 忽略。
- Finding outcome：代码发布已完成，**普通浏览器功能／缓存最终验收待完成**，不标记 `production-verified`。Git 未推送；记录先保存本地。

### 2026-11-13 正式页面复验

- 以普通正式网址、Chrome 无头浏览器复验，未使用缓存绕过；Knitted Fabrics 返回新版，97 款完整加载，Merino 的 3 个精选入口及跳转均正常。未确认用户是否手动刷新缓存，不推断旧缓存消失的原因。
- 1440、360、320px 面料库分页检查通过，Next 鼠标点击与 Previous 键盘操作视口滚动差值均为 0；1440、360px 的 8 类纤维、4 档 GSM、搜索／无结果／重置通过。关闭 JavaScript 后，97 款及指定料号锚点可访问。
- 6 个正式页面 HTTP 200、单 H1，title／description／canonical／robots 与部署前基线一致；首页、Sportswear、Showcase 列表及 Jacquard 页面 360px 基础回归通过。未提交表单。
- 验收脚本最初将同页锚点导航返回空响应误判为失败，修正测试脚本后完整重跑：18 项通过，页面脚本错误及本站 HTTP 错误为 0。证据为 `.chrome-check/fabric-production-20261110-verified.json` 及对应截图；测试阻断第三方请求，因此不构成 Cookiebot、分析或 Turnstile 的验收。
- 当前结果：`deployed / production-verified`；替代上方 11-10 缓存待验收状态。
