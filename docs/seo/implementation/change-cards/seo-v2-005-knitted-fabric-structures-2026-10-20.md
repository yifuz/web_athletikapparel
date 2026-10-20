# SEO-V2-005：Knitted Fabrics 结构、材料与应用补强

> Change ID：`SEO-V2-005-KF-STRUCTURE-20261020`
>
> 实施日期：2026-10-20
>
> 状态：`implemented / owner-review / deployment-pending`
>
> Finding outcome：`changed / owner-review`，不是排名改善或生产验收通过

## 1. 目标、授权与唯一变量

- 目标页面：`https://www.athletikapparel.com/knitted-fabrics-manufacturer/`。
- 搜索意图：寻找可按规格开发、独立供应针织面料的制造商；不扩展为毛衫、工业纺织品、零售面料或英国本地工厂页面。
- 2026-10-20 所有者明确把 Google 曝光和排名列为本轮优先目标，并批准开始现有面料页内容补强。表单默认品类的准确性问题移出本轮，不修改表单。
- 唯一主要变量：补足现有商业页的“针织结构—材料方向—服装应用—开发输入”内容覆盖。改动类型按流程 §5.1 的 **B 类采购决策完整性改进** 管理，主要官网任务为 `Discover / Qualify`，目标仍是搜索需求匹配，而非表单微调。
- 只增加一个服务器端输出的内容模块；URL、页面所有权、Title、Meta、H1、Canonical、Schema、原正文、图片、内链和表单保持不变。
- 四类结构为 single jersey、interlock、rib、jacquard。不创建近义平行页，不改已有主词，不机械重复 `functional knit fabrics manufacturers`。

## 2. 证据与置信度

### 一方事实

1. 本对话所有者已确认 Merino 产品可以指定 composition、micron、yarn count、GSM，以及 single jersey、interlock、rib、jacquard；Underwear / Outdoor 的材料、结构及相关产品范围已有确认。
2. [独立面料业务事实表](../../evidence/knitted-fabrics-business-fact-sheet-v1.md)确认接受 standalone fabric orders，开发规格、swatches、counter samples、lab dips、sample yardage 和 approval samples 可按项目提供；面料 MOQ 按项目，不套用成衣 500 pieces per style。
3. [内部材料来源快照](../../../source-content/performancefabrics-btexco/03-materials.md)支持 polyester / nylon 等一般材料方向；只作为内部一方证据，不在公开页面出现 Beta Textiles、BTEXCO、关联声明或跨站链接。材料组合仍为开发方向，不是统一成分或固定性能规格。
4. 当前 `AGENTS.md` 与所有者确认优先于 2026-08-18 历史矩阵中已被取代的 `our own fabric mill` / `in-house testing` 限制；本轮不改这些已批准表述，也不扩展认证声称。

### GSC 与 SERP

- 2026-08-23～09-19 与 2026-09-20～10-17 为两组等长 28 天 final 窗口。页面为 0 clicks / 92 impressions → 1 / 84；页面平均排名 27.05 → 13.63，不能当成固定商业词的排名变化或本次尚未部署改动的收益。
- 后窗 exact-page Query 返回 9 行、无行数截断：网址词 2 impressions；其余 8 行合计 15。排除一条带 `uk` 的超长查询后，固定观察的 7 个相关商业词合计仅 14 impressions / 0 clicks，属于低样本机会，不足以做 CTR 元数据实验。
- 2026-10-20 DataForSEO Google Desktop English、depth 10，`functional knit fabrics manufacturers`：US 和 CA 快照成功，Athletik 不在返回的自然结果中；GB 两次失败，记录为 `unavailable`，不再循环重试，不声称已完成三市场研究。
- US task：`10200146-2417-0139-0000-e540714eb777`；CA task：`10200146-2417-0139-0000-db04ef2e7dc9`。结果混合制造商、榜单、目录和零售，不以榜单/目录充当商业页模板。
- 对排名结果中的 [Caracol](https://www.caracolknits.com/products-services/knit-fabric) 和 [Huiliang](https://www.huiliang-textile.com/en/category/Functional-Knit-Fabric.html) 的直接页面检查，只观察到结构/材料/用途分类、具体面料例子等呈现方式；这些不是已证实的排名原因，也不是 Athletik 的事实来源。
- 结构解释使用 [CottonWorks：Single & Double Knits](https://cottonworks.com/learning-hub/knitting/single-and-double-knits/)核对一般原理；不复制其数字，不把它的棉织物实例转换成 Athletik 的 Merino 实测性能。

判断：内容覆盖缺口为 `Confirmed / Info / P1 / review`；预期排名收益为 `Unverified`。授权的可交付能力与采购任务支持本轮小范围补全，不以曝光少或竞争页字数作为改动理由。完整原始查询表见 [GSC Log](../../gsc-data-log.md)。

## 3. 实施与事实边界

- 四张卡片分别说明结构特点、`Material direction`、`Apparel applications`、`Specify for development`。
- 位置在现有五组面料产品图之前；暖灰底、桌面双列、手机单列，使用既有 `--ma-*` tokens，不改全局 tokens 或其他组件。
- 所有新增英文正文为待所有者审核的草稿，不是已批准生产文案。
- 不新增 GSM 范围、纤维百分比、测试结果、认证、SKU、产能、交期或价格。
- 不新增或重标图片。现有图不能仅凭文件名确认 single jersey / interlock / rib / jacquard；真实布样展示需取得图片与结构/成分的可靠对应后，在本项内另行审核，不先制造产品证据。

## 4. 验证结果与限制

| 检查 | 结果 |
|---|---|
| 两个改动 PHP 文件语法 | 通过，PHP 8.2.30 |
| 七品类数据与共享模板隔离 | 通过：其余六页数据及去空白 HTML hash 与修改前一致；面料页移除新增字段/模块后也与原数据/HTML 一致 |
| 原有 Title / Meta / H1 数据 | 七页均不变；隔离渲染均只有一个 H1 |
| 新模块 | 面料页恰好一个模块、四张卡片、十二组 `dt` / `dd`；其他六页为零 |
| 浏览器离线渲染 | 360 / 768 / 1024 / 1440px 均无文档或模块子元素横向溢出；Desktop 成对卡片等高、顶端对齐；无页面脚本错误 |
| 新正文检查 | 无占位符、Beta/BTEXCO 公开关联、认证或量化性能声称 |
| 完整 LocalWP | `unavailable`：本机没有运行中的 Local/php/nginx/mysql 服务，HTTP 请求连接失败；没有改动环境或数据库以假装通过 |
| 生产部署、Rank Math、Canonical、Schema、表单及 Crawl Diff | `pending`，离线模板桩不替代完整 WordPress 或生产验收 |

离线检查加载现有父/子主题 CSS、实际共享模板和本地字体；Inquiry CTA 明确使用桩，不提交测试询盘。截图保存在 Git 忽略的 `.chrome-check/fabric-structures-{360,768,1024,1440}.png`，不是生产截图。

部署前 Crawl ID：本轮未创建新全站 Crawl，`unavailable`；同日生产单页只读检查无 issue，不冒用历史 Crawl ID。部署后 Crawl ID：`pending`。

## 5. 风险、验收与复盘

- 风险：新增内容使页面变长；材料/用途若不符合实际需所有者修订；小样本、竞争变化及其他营销活动会干扰比较。收益不保证。
- 生产验收：HTTP 200、可索引、自引用 Canonical、单一 H1；Title/Meta 与部署前一致；四张卡片存在于原始 HTML 且事实准确；原五图、表单、内链和 Schema 不变；手机/桌面无溢出，另外六品类不出现模块，定向 Crawl Diff 无新增状态或索引回归。
- 主指标：该页 GSC Web 非品牌查询曝光、同一固定商业词在相同国家/设备的排名与点击；页面总量只作辅助。匿名化缺失不能补算，Page 平均排名不能替代目标词排名。
- 固定 7 词：`knitted fabric manufacturer`、`functional knit fabrics manufacturers`、`functional knitted fabrics factory`、`performance knit fabric oem`、`performance knit supplier`、`custom knit fabric oem`、`breathable knitted fabric supplier`。结构相关新查询作为新增覆盖观察，不预设已有搜索量或排名。
- 防护指标：索引/抓取、元数据、原有内容与图片完整性、移动布局、其他六品类隔离；合格询盘为长期业务指标，不把本轮转化细节放在曝光目标之前。
- Day 0 以**审核后真实生产部署日 D**为准；记录部署前最近完整 28 天 final 基线。Day 7 为 D+7，Day 28 为 D+28，Day 90 为 D+90；按 GSC final 延迟选择实际读取日，不把今天当成已部署日期。
- 原 Knitted 2026-11-30 Day 90 节点保留为历史批次观察；若本模块已上线，必须注明后窗混入新变量，不能继续将整页增长归因到原批次。
- 如果事实有误、出现渲染/索引回归或模块串页，先修正/移除本模块；若只是低样本或没有明显增长，记录 `inconclusive`，不自动换主词、重写全页或新建近义页。

## 6. 部署清单与下一步

先由所有者审核文案和完整 LocalWP 页面，再部署以下三个 child-theme 文件：

1. `inc/product-category-data.php`
2. `template-parts/product-category/page.php`
3. `style.css`

本轮没有新增图片或 JavaScript，不需要同步 uploads、修改数据库或 Rank Math 字段。文档和忽略目录中的 QA 工具/截图不需要部署。生产部署后补验收与真实 D，未通过前不写 `deployed / keep`，不自动请求编入索引。
