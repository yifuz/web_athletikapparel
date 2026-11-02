# 买家公开供应商名单：GEO 核验与官网部署

日期：2026-11-02。状态：`owner-approved / deployment-pending`。

后续[买家名单扩查](buyer-disclosures-expansion-2026-11-02.md)已完成：本轮没有取得可新增的第三家买家官方列名；保持以下两家和现有五文件合并包，不把聚合贸易数据或同一买家的旧表计为新增来源。

## 授权与目标

所有者要求“我们做完一起部署，推进买家公开名单 GEO”。本轮在现有 About 页补充可独立打开的买家原始披露，并与已经完成的中兴路 15 号更正合并交付；新英文内容由所有者审核后统一部署。依据 `AGENTS.md` §5，已获内容准备授权不等同新增文案已通过发布审核。

所有者随后确认“那一起部署吧 要部署哪些”，新增文案与合并部署均已批准，无需再次索要文案批准；生产仍待所有者部署和线上验收。

这项工作服务于未点名采购问题的证据质量。两平台已有的 D04 / BD 样本只用来确定研究方向，不能证明缺少这些名单是未被推荐的原因，也不能承诺上线后 AI 会引用或推荐。

## 官方来源与核验

| 来源 | 版本依据与直接入口 | 原始名单中的相关事实 |
|---|---|---|
| Canadian Tire Corporation | [当前 Responsible Sourcing 页面](https://corp.canadiantire.ca/English/Environmental-Social-Governance/Responsible-Sourcing/default.aspx)的 Download our Supplier List 直接指向 [PDF](https://s201.q4cdn.com/326551073/files/doc_downloads/2026/03/CTC-Tier-1-Owned-Brand-Supplier-List_EN.pdf)。PDF 第 1 页明确写 `Last updated January 6, 2026`，不采用 URL 的 2026/03 作为内容日期 | 第 4 页列 `Zhangjiagang Athletik Clothing Co., Ltd.`，地址 No.15 Zhongxing Road, Yangshe Town, Zhangjiagang。名单为 Tier 1 Owned Brand 供应工厂；名单说明将 vendor 与工厂区分 |
| Sainsbury's | [当前官方供应链透明度页面](https://corporate.sainsburys.co.uk/sustainability/explore-by-a-z/people-in-our-supply-chain/increasing-transparency-in-our-supply-chain/)的 Tier 1 sites for GM and clothing 指向 [2026 年 9 月 PDF](https://corporate.sainsburys.co.uk/media/334du1a0/tier-one-supplier-list-gm-clothing-september-2026.pdf)。月份依据为官方链接文件名；元数据创建日不是正式发布日期，正文不声称精确发布日 | 第 10 页列 `Zhangjiagang Athletik Clothing Co.,Ltd`，No.15 Zhongxing Road, Yangshe Town, Zhangjiagang，China，Apparel，Main production site |

两个原 PDF 均直接下载成功（HTTP 200 / application/pdf），公司所在页已经渲染目视核对。CTC 官方入口由网页工具确认其直接链接；本机 requests 访问入口为 403，不把它描述为本机 HTML 下载成功。Sainsbury's 官方入口 HTML 与两个版本 PDF 均已保存。

Sainsbury's / Tu 的 2024 年原 PDF 只作历史留档；官网引用采用已确认仍列有 Athletik 的 2026 年 9 月新版，不把旧材料包装成最新资料。

所有者已经确认中兴路 15 号正确，官网原 25 号是误写，见[地址更正记录](address-correction-2026-11-02.md)。原名单的 `Co., Ltd.` / `Co.,Ltd` 为企业名称缩写，官网保留核准中国实体名 `Zhangjiagang Athletik Clothing Co., Limited`；不据此建立额外实体。保留原件字段，不根据名单擅自更新邮编、员工人数或其他经营参数。

## 可公开范围

- 可以准确说明中国生产实体在上述有日期的买家公开名单中列名，并链接原 PDF 对应页。
- 名单不能单独证明直接签约、具体产品项目、当前订单、质量认证、推荐背书或某项工艺性能。
- 官网不展示客户 Logo，不复制整份名单，不公布员工数据、Sedex 编号、订单或联系人；不将这些披露加入 Organization `sameAs`，不创建虚假的合作关系 Schema。
- 这一轮没有外联、登记或改动买家网站。买家来源内容独立存在；官网的解释仍属于第一方内容，不把官网自行引用来源计为新增外部背书或 AI 成效。

## 官网落位与已批准英文

页面：`/about-us/`。在现有 Who we serve 后、CTA 前补充 Public supplier disclosures 小节；沿用既有页面 URL、Title、H1、canonical 和组织结构化数据类型。公开文案见 [`about-page-copy.md`](../../../about-page-copy.md#公开供应商披露2026-11-02-已批准部署)。

`page-about-us.php` 输出标题、核准中国实体名、两个有版本依据的事实句和可见 PDF 来源链接，链接附 `#page=4` / `#page=10`。`style.css` 只补充该区块的 scoped 样式。无需上传新图片、复制 PDF 至主站或创建新页面。

## 私有证据与校验值

根目录：`C:\Users\Administrator\seo-reports\buyer-disclosures-2026-11-02\`。原 PDF、源页面、截图和本地验收文件保留在此，不进入 Git。

| 文件 | 页数 / 字节 | SHA-256 |
|---|---|---|
| CTC 2026 名单 | 4 页 / 485867 | `6db6ce2392afd792ca5e8e9f72fac3c85a91b179088c6ddce4664ef46d4e2870` |
| Sainsbury's 2026 年 9 月名单 | 23 页 / 806561 | `740b450427a673cb264d198fc27ba95aa8926b81fcba716823a00d120aa14c3e` |
| Tu 2024 历史名单 | 12 页 / 512342 | `662f7710f21bb7c39e8c47ff4c7b329058e4afc16c0bff123d6a5c57e65be50d` |

## 合并部署与验收

合并包：`C:\Users\Administrator\Downloads\athletik-geo-buyer-evidence-2026-11-02.zip`。所有者已批准覆盖以下五个子主题文件：

1. `page-about-us.php`：已批准的买家公开披露内容。
2. `style.css`：该小节样式。
3. `page-contact.php`：15 号联系地址与地图搜索。
4. `functions.php`：15 号共用页脚。
5. `rank-math.php`：15 号组织地址。

本包包含此前三文件地址包，使用合并包即可，不需再单独部署地址包。ZIP SHA-256：`312232cab0b8c4896d974b914230e87577ee4ca5f5d88dfaad0897079623bdd7`。包内五文件与工作区源码逐字节一致，三个地址文件沿用已验证版本；生产仍待部署，未发起索引请求或宣称 AI 结果改善。

本地验收通过：

- `page-about-us.php` PHP 语法检查通过，渲染 HTTP 200、单一 H1，小节为 H2、两个来源为 H3。
- 两个原始 PDF URL、版本、页码、核准中国实体名称正确，无占位符。CTC 与 Sainsbury's 来源、页码和表述经过独立复核。
- 与修改前 About HTML 比较：去除新增区块后，原有 main 正文一致；Title、meta description、robots、canonical、H1 和 JSON-LD 均未变化，15 号地址更正保持有效。
- 隔离 headless Chrome 的 390 / 1440px 两种视口检查通过：小节文字和链接完整、无整页或区块横向溢出、无 pageerror；两张截图已目视复核。没有操作所有者正在使用的浏览器。
- `local-checks.json`、`browser/browser-checks.json`、`browser/about-disclosures-390.png`、`browser/about-disclosures-1440.png` 和 `package-hashes.json` 位于上述私有证据目录。

部署后先确认 About 的两项事实与 PDF 链接、移动和桌面展示以及全站地址一致。后续沿用既有固定采购问题观察，记录是否引用 About 或买家原名单，不立即追加新一轮提示词测试，也不将一条回答的变化归因于本次修改。
