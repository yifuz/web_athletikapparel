# 面料库扩充：HY24／HY25／HY26 本地审核版

日期：2026-11-10。状态：`local-review / not-deployed`。本轮不推送 Git、不部署生产。

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

## 5. 部署清单（未批准）

本轮增量 6 个运行时文件：

1. `inc/fabric-library-recent.php`（新增）
2. `inc/fabric-library.php`
3. `assets/js/fabric-library.js`
4. `template-parts/fabric-library/card.php`
5. `template-parts/fabric-library/library.php`
6. `style.css`

整个面料库从未上线；未来获批时，部署首批清单的 8 个运行时文件最终版本，再加本次新增的数据文件，共 **9 个**。无媒体、数据库或新 URL 操作；不上传 Excel、内部记录或测试产物。

先部署新数据文件，再启用引用，按[专用 SSH 部署流程](../operations/flywheel-ssh-deployment.md)精准备份、传输与生产验收。Git 本地提交不等于推送或上线。
