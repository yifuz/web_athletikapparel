# Athletik Clothing — 网站地图与页面规划（重建版 v1）

状态对齐日期：2026-08-10。下文记录的当前实现和 URL 决策取代历史章节中保留的早期规划假设。

旧域名状态修正：根据所有者明确决定，`myathletik.com` 已完全下线且不设置跨域重定向；
所有已检查的公开入口和主机变体均返回 HTTP 410。旧域名不属于本次重建的实施范围；
当前 URL 与 SEO 工作仅适用于 `https://www.athletikapparel.com/`。

本文件是 `AGENTS.md` 的配套构建蓝图，记录每个页面、URL、唯一 H1、目标搜索意图、
历史 URL 背景和内容区块结构。只有在用户明确要求或授权时，agent 才能起草长篇正文；
正式发布前必须由所有者审核。

图例：

- **新增**：以前不存在的页面，无需重定向。
- **历史旧 URL**：只作规划参考；除非当前 Search Console、服务器日志或反向链接证据证明有必要，否则不添加重定向。
- **保留**：当前线上 URL 保持不变。

---

## 0. 网站结构概览

```text
首页  /
│
├── 产品（顶级关键词页面——SEO 流量核心）
│   ├── /sportswear-manufacturer/
│   ├── /underwear-manufacturer/
│   ├── /outdoor-clothing-manufacturer/
│   ├── /merino-wool-manufacturer/
│   ├── /silk-wear-manufacturer/
│   ├── /knitted-fabrics-manufacturer/
│   ├── /sports-accessories-manufacturer/
│   └── /#ma-home-categories-title  （当前产品中心；未建设 `/products/`）
│
├── 生产能力 / 生产  ❌ 已取消（2026-07）
│   └── /production/ /factory/ /equipments/  — 本阶段不建设
│
├── 服务 / 流程
│   └── /services/            （仅保留单页概览）
│   ❌ 已取消（2026-07）：子页面 /sampling-prototyping/ /bulk-production/
│      /quality-control/ /export-shipping/ — 已并入 /services/ 概览
│
├── 技术指南
│   ├── /technical-guides/  （内容中心）
│   ├── /flatlock-vs-overlock-technical-knitwear/  （已发布）
│   ├── /technical-knitwear-tech-pack-guide/  （已发布）
│   ├── /evaluate-technical-knitwear-oem/  （已发布）
│   └── /garment-quality-control-checklist/  （已发布，2026-08-20 生产验收）
│
├── /sustainability/   （当前正确 slug；未实施历史重定向）
├── /about-us/
└── /contact/
```

---

## 1. 首页 — `/`（保留）

**当前 H1：** Performance Apparel Manufacturer

**目的：** 在 5 秒内建立定位、把买家引导至正确品类页并承接询盘。

**区块结构：**

1. Hero：标题、单行定位和主要 CTA（Contact / Get a Quote）。必须使用真实工厂图片，不使用图库图片。
2. 能力条：3–4 个证明点（垂直整合、FLATLOCK/ACTIVESEAM、自有生产设施、完整出口文件能力）。不公开工厂数量或分包细节；使用图标和短标签。
3. 产品品类网格：7 张卡片，分别链接对应的 `*-manufacturer/` 页面；取代原来的 30 张无标题图片墙。
4. Why myathletik：3 个差异点（技术结构、Carbondry 与 Laser perforation 等后整理能力、区域跟单团队）。
5. 流程概览：四步流程条（Sample → Production → QC → Export），链接到 `/services/`。
6. 认证 / 审核条：保留现有徽章行。
7. Technical Guides：稳定的内容中心入口和最新一篇已批准技术指南；通用 WordPress 文章流保持关闭。
8. 询盘 CTA：共用 Fluent Form 3，包含产品类别、预计订单量、业务类型、公司信息和项目说明。

当前已批准的首页文案记录在 `homepage-copy.md` 和线上模板中；本结构文件不覆盖已批准文案。

---

## 2. 产品品类页（顶级、关键词对齐）

全部 7 个品类页使用同一个模板，以保证结构一致。旧 `/products/<x>/` 路径只作历史参考；
根据所有者 2026-08-08 的旧站退役决定，不规划旧品类 URL 的重定向。

### 所有品类页的共用模板

**H1：** `[Category] Manufacturer`，例如 “Sportswear Manufacturer”。

1. 简介：说明该品类生产内容及目标客户。成衣品类面向 B2B 买家，每款 MOQ 500 件；Knitted Fabrics 作为独立面料供货能力页，使用 fabric-specific 商业口径，MOQ 按所选面料与具体项目确认，不公开未经稳定验证的固定数字范围。
2. 能力：面料、结构（适用时包括 FLATLOCK/ACTIVESEAM）和后整理选项。
3. 产品 / 款式示例：按组展示真实图片，并配置 alt 文本。
4. 规格条：MOQ、交期和打样可用性；Knitted Fabrics 使用品类级覆盖，不复用成衣 `pieces per style`、Sampling 和 Service 字段。
5. 相关链接：链接 `/services/` 及 1–2 个相关品类页，形成内链。
6. 询盘 CTA。

【CONTENT: user to write body copy per page】

| 页面 | URL | H1 | 历史旧 URL（不重定向） |
|---|---|---|---|
| Sportswear | `/sportswear-manufacturer/` | Sportswear Manufacturer | `/products/sportswear/` |
| Underwear | `/underwear-manufacturer/` | Underwear Manufacturer | `/products/underwear/` |
| Outdoor Clothing | `/outdoor-clothing-manufacturer/` | Outdoor Clothing Manufacturer | `/products/outdoor-clothing/` |
| Merino Wool | `/merino-wool-manufacturer/` | Merino Wool Apparel Manufacturer | `/products/merino-wool-apparel/` |
| Silk Wear | `/silk-wear-manufacturer/` | Silk Wear Manufacturer | `/products/silk-wear/` |
| Knitted Fabrics | `/knitted-fabrics-manufacturer/` | Knitted Fabrics Manufacturer | `/products/knitted-fabrics/` |
| Sports Accessories | `/sports-accessories-manufacturer/` | Sports Accessories Manufacturer | `/products/sports-accessories/` |

### 产品中心——首页产品区块（当前实现）

首页 `/#ma-home-categories-title` 产品区块是当前产品中心，并链接全部 7 个品类页。
`/products/` 被有意保留为未建设状态，不出现在导航和 Sitemap 中，目前返回 404。
只有未来 Search Console、服务器日志或反向链接证据证明 `/products/` 具有实际价值时，
才创建独立产品中心或添加重定向。

---

## 2A. Technical Guides 内容中心 — `/technical-guides/`（新增）

**H1：** Technical Knitwear Guides

**目的：** 建立一个稳定、可抓取的买家教育内容中心，同时让各个关键词对齐的指南 URL 保持顶级路径。
首页、主导航、页脚和指南面包屑均链接至此。

**区块结构：**

1. 直接说明本内容库聚焦裁剪缝制类功能针织服装。
2. 数据驱动的指南卡片，只显示所有者已批准且已发布的内容。
3. 范围条：结构选择、tech pack 准备和 OEM 评估。
4. 项目审核 CTA。

未完成的内容简报不得渲染为公开卡片或 Schema 条目。每篇新指南只在所有者批准后加入，
无需重构首页或内容中心。

---

## 2B. 技术指南 — `/flatlock-vs-overlock-technical-knitwear/`（新增）

**H1：** FLATLOCK vs OVERLOCK for Technical Knitwear

**目的：** 使用第一方生产证据回答高意向买家问题，解释 607 和 514 线迹类型、区分 ACTIVESEAM，
并向买家提供可执行的接缝图和 tech pack 检查清单。

**区块结构：**

1. 直接答案和发布 / 复核元数据。
2. FLATLOCK 定义及已批准的 Yamato 生产视频。
3. OVERLOCK 定义及已批准的生产视频。
4. 对比表与成衣部位选择逻辑。
5. 面料、缝线、机器设置和测试注意事项。
6. ACTIVESEAM 区分说明。
7. tech pack / spec sheet 检查清单。
8. 可见 FAQ、主要技术参考资料和询盘 CTA。

本页从 Technical Guides 内容中心、首页、Sportswear 和 Underwear 品类页获得内链。
保留现有顶级 URL；内容中心不要求增加 `/blog/` 层级，也不要求更改文章 URL。

---

## 2C. 技术指南 — `/technical-knitwear-tech-pack-guide/`（新增）

**H1：** What to Include in a Tech Pack for Technical Knitwear

**目的：** 解释裁剪缝制类功能针织服装的 tech pack，而非横机毛衫生产，以纠正 GEO-06 的语义偏移。
所有者已于 2026-08-11 批准完整草稿发布。本页使用共用文章布局，内容包括文件控制、技术平面图、
POM、成品面料规格、接缝图、测试和样品批准。

---

## 2D. 技术指南 — `/evaluate-technical-knitwear-oem/`（新增）

**H1：** How to Evaluate a Vertically Integrated Knitwear OEM

**目的：** 使用面向裁剪缝制功能服装的风险评估框架纠正 GEO-08 的语义偏移。
不把任意评分权重或未经验证的认证声明作为证明。所有者已于 2026-08-11 批准完整草稿发布。
本页使用共用文章布局，覆盖法律主体、工序所有权、技术能力、面料控制、可追溯性、项目级产能和报价范围。

---

## 2E. 技术指南 — `/garment-quality-control-checklist/`（新增）

**H1：** Garment Quality Control Checklist for Technical Knitwear

**目的：** 承接 `garment quality control`（七国 110/月）和 `clothing quality control checklist`（七国 70/月）
搜索意图，为买家提供可执行的 QC 检查清单。所有者已于 2026-08-20 确认证据清单、URL、Title、Meta、H1 和正文；同日完成生产部署与验收。
本页使用共用文章布局，覆盖产前检验、在线巡检、终检/AQL、测试合规、针检、QC 记录和 tech pack QC 条款。
包含三支第一方 QC 视频（面料进厂检验、在线巡检、终检）。

---

## 3. 生产能力 / 生产页面 ❌ 已取消（2026-07）

原计划建设 `/production/`、`/factory/` 和 `/equipments/` 等辅助页面，**本阶段不建设**。
能力证明放在首页的 capability-proof、numbers-proof 区块及各品类页正文中。

---

## 4. 服务 / 流程

### 服务概览 — `/services/` ✅ 已完成（单页，`page-services.php`）

**H1：** Our Services

单页展示四阶段流程（Sample → Production → QC → Export）。

**❌ 已取消（2026-07）：** 子页面 `/sampling-prototyping/`、`/bulk-production/`、
`/quality-control/`、`/export-shipping/` 已并入单一 `/services/` 概览。
首页 process-snapshot 的所有链接均指向 `/services/`，不存在失效链接。

---

## 5. Sustainability — `/sustainability/`

**H1：** Sustainability

当前页面和导航已使用正确拼写。历史拼写错误 `/sustainabilty/` 目前没有实施重定向。
只有在迁移清单中核对准确的旧域名 URL、索引流量和反向链接后，才决定是否需要重定向。

【CONTENT: user to write】

---

## 6. About Us — `/about-us/`（保留）

**H1：** About Us

内容包括公司介绍、自有生产设施 / 垂直整合、区域覆盖和外贸能力。
不公开工厂数量或分包细节；替换图库图片。

---

## 7. Contact — `/contact/`（保留）

**H1：** Contact Us

询盘表单包含以下线索筛选字段：

- 预计订单量。
- 感兴趣的产品品类。
- 公司 / 业务类型。
- 项目说明，并提示在有条件时提供 tech pack 链接。

当前 Fluent Forms 免费版未实施文件上传。

同时显示直接联系方式和自有生产设施地址；不公开工厂数量或合作工厂地点。

### 与本页相关的清理

- ✅ 已移除页脚遗留的 `/contact-2/`（“Contact_example”）链接。
- 根据所有者的旧域名决定，不规划历史重定向。

---

## 8. 旧域名重定向——不规划（所有者决定）

旧 `myathletik.com` 站点目前返回 HTTP 410，且不设置跨域重定向。
下表只保留为历史规划背景；除非所有者以后重新开启此决定，否则不得实施。

| 旧 URL | 新 URL | 原规划原因 |
|---|---|---|
| `/products/sportswear/` | `/sportswear-manufacturer/` | 品类页移至顶级路径 |
| `/products/underwear/` | `/underwear-manufacturer/` | 品类页移至顶级路径 |
| `/products/outdoor-clothing/` | `/outdoor-clothing-manufacturer/` | 品类页移至顶级路径 |
| `/products/merino-wool-apparel/` | `/merino-wool-manufacturer/` | 品类页移至顶级路径 |
| `/products/silk-wear/` | `/silk-wear-manufacturer/` | 品类页移至顶级路径 |
| `/products/knitted-fabrics/` | `/knitted-fabrics-manufacturer/` | 品类页移至顶级路径 |
| `/products/sports-accessories/` | `/sports-accessories-manufacturer/` | 品类页移至顶级路径 |
| `/sustainabilty/` | `/sustainability/` | 修正拼写 |
| `/contact-2/` | `/contact/` | 移除演示页面 |

---

## 9. 建设顺序（建议执行次序）

1. ~~**首页**~~ — ✅ 已完成。
2. ~~**7 个品类页**~~ — ✅ 已完成；使用顶级关键词 URL，不设置历史重定向。
3. ~~**服务页面**~~ — ✅ `/services/` 单页已完成；子页面已取消。
4. ~~**工厂 / 设备页面**~~ — ❌ 本阶段已取消。
5. ~~**About / Sustainability / Contact**~~ — ✅ 页面已完成并优化。
6. ~~**旧域名重定向**~~ — ❌ 根据所有者决定，不在范围内。
7. ~~**逐页视觉优化与 QA 清理**~~ — ✅ 上线前完成。
8. **生产上线** — ✅ 已在 Flywheel 完成；最终网站和 uploads 于 2026-07-28 同步。
9. ~~**Technical Guides 内容中心**~~ — ✅ 2026-08-11 完成。内容中心、首页 / 页脚入口、
   三篇已批准基础指南及其封面资源均已上线；Hub 与三篇指南共四个 URL 已在生产 Page Sitemap 和爬虫访问中验证。
   第四篇 QC Guide 已于 2026-08-20 完成生产部署；Sitemap、元数据、图片、视频和 Schema 均已重新核验。

已确认 slug：`/merino-wool-manufacturer/`。
