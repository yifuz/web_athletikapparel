> Canonical project instruction file for AI agents (Codex / Gemini). Full page structure and URL/SEO decisions are in [`docs/sitemap.md`](docs/sitemap.md) — read it before creating or restructuring pages.

---
name: myathletik-website
description: >
  Project rules for athletikapparel.com (Athletik Clothing). U.S. entity:
  "Athletik Clothing Inc."; China entity: "Zhangjiagang Athletik Clothing Co.,
  Limited" — vertically integrated OEM technical knitwear manufacturer
  (FLATLOCK / ACTIVESEAM). Fabric sales also use the Beta Textiles name (not a
  separate legal entity, publicly isolated). Apply on ANY task editing theme
  code, content, blocks, CSS, docs, or redirects.
---

# Athletik Clothing — Website Project Rules

Read before writing any code, content, or markup. When a task conflicts with these rules, stop and flag it rather than silently overriding.

## 工作清单与交付核对

- 获授权执行多项工作时按完整清单逐项落实并核对结果；未完成或受阻项明确说明剩余工作与原因，不将部分完成表述为全部完成。
- 提出下一步前先核对已承诺事项；每次回答结合当前进度指出最值得做的工作，所有者要求暂缓时遵循其安排。
- **GEO 范围（2026-10-31 更正）**：官网、当前 Instagram 和 LinkedIn 纳入优化与内容准备（每次公开发布仍需对应授权）。所有者不管理 `@athletikclothinginc` YouTube 账号，视频更新已停止，不要求接管。其他站外账号、外联或第三方建档不自动获得授权。

## 精简文档与状态维护

- **唯一入口**：`docs/progress.md` 只留跨项目现状与少量下一步；GEO 以 `docs/geo/GEO.md` 为准；SEO 以 `docs/seo/v2-backlog.md` 为准；历史归档统一放入 `docs/archive/`。专题细节只留在一处，其他入口给简短状态与链接。
- **三级记录制（控增量）**：
  - **L1 微改**（少量文案/单条内链/样式微调/无异常只读复查）：**不新建独立 `.md`**；靠清晰的 `git commit` 说明 + 在领域工作台更新 1 行状态。
  - **L2 常规上线/专题诊断**（新页面、新模块、批量媒体、专题审计）：最多 1 份 **≤ 40 行的单页简报**（改了什么 / 部署清单 / 验收结果与异常 / 观察窗口）。
  - **L3 月度/周期复盘**：一页表格封顶（核心数据 + 1 句结论 + 1 个下一步）。
- **通用免责默认生效**：除明确标注已验证的事项外，所有内部记录**默认**不主张因果归因、不覆盖未测页面/地区、不将未返回数据视为零、不代表已复验真实表单送达或搜索引擎已重抓。单次文档**只写特例与异常**，不再反复默写通用免责段。
- **过程与历史边界（100% 有迹可循）**：每次完成工作必须在 `docs/progress.md` 的【近期工作流水账】表格追加 1 行（`日期 | 领域 | 动作与核心结果 | 证据/文件/Commit`），**严禁抹除已发生的工作记录**；仅顶部“当前状态与下一步”做原地刷新，流水账满 1～2 个月后整表原样归档至 `docs/archive/`。SSH 重试、缓存刷新等过程噪音不写入业务文档（部署备份、清单与必要验收仍按流程执行）。固定提示词与历史样本原文不改写；归档内容不自动视为当前事实；不新建空月报、平行 Backlog、重复报告或四格式文件。文档精简不改变既有采样频率、有效性决定、SEO 门槛或观察窗口。

## 1. Tech stack (CODE-FIRST project)

- **Platform:** WordPress 7.0 on Flywheel (production); LocalWP (Windows) for development & local review. GoDaddy is NOT in current hosting, email, or deployment.
- **Theme:** GeneratePress parent (DO NOT edit). All custom code lives in child theme `myathletik-child/` (`style.css`, `functions.php`, `templates/`, `template-parts/`, `inc/`, `assets/` for JS/fonts only — NOT images, see §1.6).
- **Stack constraints:** No page builders (no Kadence/Spectra), no Bootstrap/Tailwind, no build step unless explicitly introduced. Plain PHP + scoped CSS using `:root` `--ma-*` variables + light vanilla JS. Server-rendered WordPress.
- **Git:** The child theme is a Git repo. Commit in small, logical, reviewable units.

### 本地审核与生产部署
- 默认流程：**LocalWP 开发与本地审核 → 所有者确认上线 → 通过专用 SSH 直接部署生产并验收**（2026-11-04 确认）。
- 部署前读 [`docs/operations/flywheel-ssh-deployment.md`](docs/operations/flywheel-ssh-deployment.md)。已有上线授权的同一批改动直接完成，不要求所有者手动传文件或执行服务器命令；未批准草稿留在 Local。
- 完成后列出代码、媒体与必要数据库部署清单，按清单备份与传输，不整库覆盖生产，不覆盖未批准改动；部署后明确实际上传文件、验收结果及未完成项。
- **Git 提交与推送（2026-11-06 更正）**：日常验证后保留本地提交，积累一批再阶段性统一推送；不为每次提交单独发起推送确认，不设自动推送任务。推送前核对范围，仅限本地的内容不得带入远程；失败如实报告，保留用户修改，严禁 `git reset --hard`。

### 内部 Markdown 文档语言
- 新建或实质性改写的内部 `.md` 默认使用**简体中文**；正式网站英文文案、已核准 Title/H1/Meta、固定提示词、原始引文、代码/API/Schema/事件名、URL、路径、命令、字段名与专有名称保留原生英文。
- 网站对外文案仍按 §5 使用面向北美/欧洲 B2B 买家的英文。

## 1.6 Image storage — images live in uploads, NOT in the theme/git repo

> **READ BEFORE TOUCHING ANY IMAGE.** Putting an image inside the theme folder causes a guaranteed 404.

- **唯一物理路径**：`app/public/wp-content/uploads/myathletik-theme/assets/images/<category>/`（子目录含 `sportswear/`、`underwear/`、`outdoor clothing/`、`merino wool product/`、`silkwear/`、`knitted fabrics/`、`sports accessories/`、`production/`、`主图/`、`辅图/`、`audit&certificates/`、`sustainable/`、`brand-partner/` 等）。`brand-partner/` 由 `client-logos.php` 运行时扫描，不得改名。
- **严禁放入主题目录**：`themes/myathletik-child/assets/images/` 仅保留 `.gitkeep`（已被 `.gitignore`）。新文件优先使用小写 ASCII 连字符命名。
- **URL 改写机制**：PHP 代码继续写 `get_stylesheet_directory_uri() . '/assets/images/...'`，`functions.php` 中的 `myathletik_start_image_url_buffer`（`template_redirect`）会自动将其改写为 `uploads/myathletik-theme/assets/images/...`。切勿盲改缓冲函数或 `myathletik_images_uri()` / `myathletik_images_dir()`（仅在需要真实路径做 `glob()`/`scandir()` 时调用）。
- **媒体部署**：uploads 不在 Git 中，生产发布时按批准清单通过 SSH 单独上传新增或替换文件，不同步整个目录。

## 2. Information architecture

- **Home** & **Products hub**：首页 `/#ma-home-categories-title` 链接 7 个现有品类页（Knitted Fabrics、Sports Accessories、Outdoor Clothing、Sportswear、Underwear、Merino Wool Apparel、Silk Wear）；当前阶段不建 `/products/`，不新增近义或细分运动品类页。
- **Product Showcase & Technical Guides**：按 [`docs/sitemap.md`](docs/sitemap.md) 维护现有展示库与技术指南。
- **Capabilities / Services**：不单建 `/production/`、`/factory/`、`/equipments/` 或 4 个服务子页；能力在首页与品类页呈现，流程统一在 `/services/` 单页。
- **Sustainability / About / Contact**：`/sustainability/` 拼写已修正；`/about-us/` 不公开工厂数量或分包；`/contact/` 表单用于项目匹配评估，不因首批数量低于标准 MOQ 自动筛除客户。

### Positioning
- 面向北美/欧洲采购技术针织服装的中型 B2B 品牌与批发商，优先较大订单与持续返单，同时保留小客户/小单的项目评估空间。
- **MOQ 口径（2026-10-22）**：标准入口 **500 pieces per style**；定制面料每款每色通常按 **400–500 件**评估，可混码，结合最低米数、耗料与颜色拆分核算。两条件同时满足，不理解为任意拆色，也不统一要求 1,000 件/款；小单可评估但不自动承诺降 MOQ。详口径见 [`docs/marketing/inquiry-reply-playbook.md`](docs/marketing/inquiry-reply-playbook.md)。
- 定位为 **technical manufacturing partner**（非初创低门槛代工）；突出差异点：vertical integration、FLATLOCK / ACTIVESEAM、Carbondry、laser perforation、完整出口文件、own production facility 与区域覆盖（`North America, Europe, and Asia-Pacific`，不含俄罗斯）。

### Entity naming and relationship
- **Public brand:** Athletik Clothing（保持品牌与法人名区分，勿用法人名静默替代品牌名）。
- **U.S. entity:** `Athletik Clothing Inc.` — 隐私数据控制者，可公开表述为 **North America sales office**。
- **China entity:** `Zhangjiagang Athletik Clothing Co., Limited` — 中国生产设施主体，可公开表述为 **primary manufacturer and seller**。
- **中国生产地址门牌（2026-11-02 确认）**：中兴路 **15 号**（`No.15, Zhongxing Road, Yangshe Town`）；此前官网 25 号为误写，非搬迁，历史采样保留原文并注明更正。
- **实体关系边界**：两 Athletik 实体属同一业务体系但运营职责不同；未获所有者明确表述前，不得写成同一法人、母子公司或自行推断签约/出口/雇佣/知识产权分工（缺项用 `【NEEDS INPUT: confirm U.S./China entity responsibility】`）。目录注册允许双主体双档案，均须保持最新口径并链向 `athletikapparel.com`。
- **Beta Textiles (BTEXCO) 隔离规则（2026-08-18 / 08-20）**：Beta Textiles 是同一运营体系对外销售面料的名称（非独立法人），因此 `"our own fabric mill"` 属实，其资料可作为内部一方能力证据；但**公开网络严禁将 Beta Textiles（`performancefabrics.com` / `betatextiles.com`）与 Athletik 关联**（不互链、不写关联/姐妹/母子公司表述）。
- **同系营销站**：`woolbaselayer.com`、`betatextiles.com`、`performancefabrics.com`、`ultramerino.com`、`powermerino.com`、`athletik.com.cn` 等未经明确指令不合并、不跳转、不互链。

## 3. URL & SEO rules (strictest section)

- **规范域唯一焦点**：聚焦 `https://www.athletikapparel.com/`。旧域 `myathletik.com` 已按所有者决定完全下线并返回 HTTP 410，不做跨域 301（历史映射见 [`docs/sitemap.md`](docs/sitemap.md) §8，除非重开否则不实施）。
- **Never change a live, indexed URL without a 301 redirect.** 删除或合并任何现网页面时，必须显式输出 301 映射。
- **URL 约定**：品类页为顶级关键词路径 `/<x>-manufacturer/`；功能/辅助页保持 `/about-us/`、`/contact/`、`/services/`、`/sustainability/` 等现有层级。
- **单页基本面**：每页须有唯一 `<title>`、meta description、唯一 H1、合理 H2/H3 层级及描述性图片 `alt`（真实关键词，非文件名）。

## 4. Rebuild cleanup — completed

早期上线前清理（去库存图、清演示链接、修社媒与 `/sustainability/` 拼写、重排首页类目图）已全部完成；历史详情见 `docs/archive/progress-history-2026-11-18.md` 与 `docs/site/qa-audit-2026-07-03.md`。

## 5. Brand voice & copy rules

- Language: **English**, written for North American / European B2B buyers.
- **长篇正文授权**：仅在用户明确要求或授权时起草长篇正文（定向要求撰写/改写/翻译即构成授权）；否则限于结构、代码、布局、标题/标签、alt 与清理，空正文位使用 `【CONTENT: user to write】`。Agent 起草的长篇正文均视为草稿，须基于核准事实并经所有者审核后发布。
- **Tone**：technical, confident, specific — 专业制造商对话专业买家，避免初创推销腔。
- **Fact discipline**：严禁虚构事实、认证、产能、测试结果或客户名；未知项使用 `【NEEDS INPUT: ...】`。
- **询盘回复与持续沉淀**：使用 [`.agents/skills/wp-brand-voice-guard/SKILL.md`](.agents/skills/wp-brand-voice-guard/SKILL.md)。每篇询盘回复经所有者确认审核通过后，**自动**提炼跨客户可复用的回复策略及稳定通用条款更新技能与手册（去重，不保存客户身份、邮件全文、单项目面料型号/库存参数）；首次接触客户通常收取含寄样运费的打样费（按项目核算，不默认承诺免费打样或单独免运费）。此更新有持续授权，无需再次询问；文案审核不等于发送授权。

## 6. Terminology — spelling consistency reference

In all authored or edited text (under §5 authorization), spell these terms consistently:

- FLATLOCK (flatlock seam / flatlock stitch)
- ACTIVESEAM
- SELF FABRIC
- SCREENPRINT (one word, as used in spec sheets)
- COVERSTITCH, OVERLOCK
- Carbondry (finishing) — capital C, one word
- Laser perforation
- Merino wool
- Vertically integrated OEM
- MOQ (Minimum Order Quantity)
- Tech pack / spec sheet

## 7. When in doubt

- **Google Ads**：仅在当前对话明确要求时运行；先读 `docs/marketing/ads/google-ads-api-analysis-runbook.md`，仅只读 MCP，不得改广告设置或把未知来源询盘归因给 Google Ads。
- **163 邮箱**：仅在当前对话明确要求时运行；先读 `docs/marketing/ads/163-mail-inquiry-analysis-runbook.md`。获准读取邮件时可直接按需查看附件（2026-10-30 授权）；不得索要授权码、不得主动读 Sent，真实联系人/邮件/附件严禁进 Git。
- **图片操作**：先复读 §1.6；放 `uploads/myathletik-theme/assets/images/`，不放主题目录。
- **IA / URL / SEO 结构变动**：先停下确认；现有页面的合规内容补充按 §5–§6 执行。
- **代码边界**：只改 `myathletik-child`，不动 GeneratePress 父主题、WP 核心或插件；多页共用 template part 保持结构与标题层级一致；优先小步、可审核的 diff。
