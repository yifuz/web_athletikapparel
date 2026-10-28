# SEO-V2-005：Sports Accessories 头颈配件采购信息

日期：2026-10-28

状态：`local-draft / local-verified / owner-review-pending`

Finding outcome：`changed / local-draft`；搜索效果尚未验证。

## 目标与证据

- 目标页面：`https://www.athletikapparel.com/sports-accessories-manufacturer/`；仍由既有品类页承接相关搜索，不新增平行页面。
- 搜索意图：美国、英国和加拿大 B2B 买家寻找定制 balaclava / ski mask 或 neck gaiter / neck warmer 制造与采购信息。
- 2026-10-27 第二轮 SERP 的 R2-006 覆盖两个制造词、三个市场，各一次深层快照；每组保留 46–50 条自然结果，主站未出现在保留结果中。结果含 promotional、POD 和低 MOQ 等混合意图；单次快照不代表固定排名或需求量。详见 `docs/seo/research/serp-commercial-round2-us-gb-ca-2026-10-27.md`。
- 上一轮 2026-10-28 的 GSC 读取：2026-09-28～10-25 的 final 28 天，页面 0 clicks / 20 impressions；可见 Query 仅有品牌域名词 7 次曝光，其他曝光未披露。90 天（2026-07-28～10-25）为 2 clicks / 74 impressions。页面平均排名不能当成产品词排名。`page-opportunities` 的低行动性过滤不等于真实曝光为零，原行动 `action-6532d4726488` 已处置为 `not-needed`。
- 所有者确认可稳定提供相关产品和定制、工艺与测试，并于 2026-10-28 确认所选护脖为可在主站公开使用的 Merino wool 实物图。该示例不证明具体比例、GSM、测试结果或其他项目必须使用相同材料。

## 主要变量与英文草稿

在现有首组产品内，将 balaclava 和 neck gaiter 的采购输入分开，并在原头套图旁加入已确认的护脖产品图，作为一次采购信息与视觉证据的组合改动。沿用已有产品 H3；不改变 URL、Title、Meta、H1、Schema，不增加链接，不改第三张配件图。

> Develop balaclavas, ski masks, neck gaiters, and neck warmers for the intended activity and climate. Define thermal, stretch, and wind-resistance targets and select FLATLOCK or ACTIVESEAM construction where suitable.

> **Balaclavas and ski masks:** Specify the face opening, head and neck coverage, fit, and compatibility with the intended helmet or hood.

> **Neck gaiters and neck warmers:** Specify length, circumference, coverage, knit fabric, and stretch for the intended activity. The Merino wool gaiter shown is a product example; other materials can be developed to the buyer's brief.

图片标注：`Balaclavas and ski masks`、`Merino wool neck gaiter`。英文仍须所有者审核后发布。

## 文件与部署

主题代码：`inc/product-category-data.php`、`template-parts/product-category/page.php`、`style.css`。仅配件页首组启用双图和新增说明；共用模板保留其他品类行为。

图片原图为 `D:\C-网站素材\source-merino\neck-gaiter-1-rev1-1.png`，2048 × 2048，透明背景；原图未修改。以下为同一张图的响应式资源，必须单独同步至生产 `wp-content/uploads/myathletik-theme/assets/images/sports accessories/`，不进主题 Git：

| 文件 | 尺寸 | 字节 |
| --- | --- | ---: |
| `merino-neck-gaiter-480.webp` | 480 × 480 | 47,008 |
| `merino-neck-gaiter-800.webp` | 800 × 800 | 114,424 |
| `merino-neck-gaiter-1200.webp` | 1200 × 1200 | 228,354 |
| `merino-neck-gaiter-800.png` | 800 × 800 | 727,712 |

## 风险与验收

- 本次是组合变量，未来即使曝光改变也不能将效果单独归因于图片或正文；现有样本偏小，不能承诺排名增长。
- 本地七个品类页均 HTTP 200；相对改动前，目标区块外的可见内容、链接、媒体以及各页 Title、Meta、Canonical、H1、Schema 和 robots 检查一致。目标区块保留原头套图及 srcset，仅为双图调整 `sizes`；其他六个品类没有新增该模块。
- 360、390、768、1024、1440 px 本地浏览器检查无横向溢出，图片加载，未新增区块链接。四个新资源均 HTTP 200，签名与格式一致；本地 WebP 未返回 `Content-Type`，已有 WebP 也存在同样情况，浏览器可解码。生产部署后另查生产响应头，不将本地情况推定为生产状态。
- 第三张 Sports Accessories 图及其既有响应式资源不在改动范围。图片不表示订单、客户、认证或测试结论。
- 生产部署、抓取与索引验收尚未执行；部署后确认 Day 0 和基线，再定 Day 7 / 28 等观察节点。原 Sports Accessories 的 2026-12-08 Day 90 不重置；如本批在该日之前上线，复盘必须披露混入本批变量。
