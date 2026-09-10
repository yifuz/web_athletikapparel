# SEO-V2-005 Merino Wool 采购入口强化 Change Card

> 建立日期：2026-09-10  
> 当前状态：`changed / owner-review`

## 目标页面与买家任务

- 页面：`https://www.athletikapparel.com/merino-wool-manufacturer/`
- 市场：US / GB / CA 英语市场
- 搜索意图：寻找可承接 Merino wool base layers、thermal layers 与 performance underwear 的 OEM/ODM 制造商
- 业务动作：让采购方从具体产品任务进入询盘，而不是只浏览宽泛的 Merino wool 产品能力

## 证据与触发条件

2026-09-10 的 9 个 DataForSEO Desktop Top 50 快照覆盖三个商业词簇及 US / GB / CA：

- `merino wool base layer manufacturer`：Athletik 在 US organic #34、CA organic #26，GB 未进入 Top 50；
- `merino thermal underwear manufacturer`：Athletik 主站三地均未进入 Top 50；
- `merino wool underwear manufacturer`：Athletik 主站三地均未进入 Top 50。

SERP 为制造商、零售品牌、目录和编辑内容混合意图，但三组词均存在明确 OEM 采购结果。生产 URL Inspection 于 2026-09-10 返回 `PASS / Submitted and indexed`，最后抓取时间为 `2026-09-07T07:52:36Z`；该抓取早于 9 月 7 日后续完整 Merino 页面改动。最近 final 28 天 GSC 页面数据仍为低样本，不支持 Title / Meta 实验。

所有者于 2026-09-10 确认 `ultramerino.com` 为同方控制的 Merino 专业站，希望 UltraMerino 与 Athletik 主站同时获得排名。双站因此按页面任务区分：UltraMerino 保持 Merino 专业站定位；Athletik 主站承接可纳入完整 OEM/ODM 项目的 Merino 产品采购入口。本次不复制 UltraMerino 文案、不互链、不建立新的近义 URL。

## 主要变量

唯一主要变量是在既有 Merino 页面 Category overview 与完整 Product range 之间增加一个条件式采购入口区块：

1. `Merino Wool Base Layers`：常见起始 brief 为 150–170 GSM；
2. `Midweight Merino Thermal Layers`：常见起始 brief 为 180–210 GSM；
3. `Merino Wool Performance Underwear`：常见起始 brief 为 150–180 GSM。

每张卡说明对应产品任务、首次报价需确认的规格，并进入现有 `/contact/`。区块明确 GSM 只属于行业常见 briefing starting points，不是 Athletik 固定生产上下限；最终 composition、micron、GSM、structure、fit、construction 与 testing 继续按买家规格和 approved sample 确认。

保持不变：URL、Title、Meta、H1、Canonical、Schema 类型、Hero、MOQ、既有产品范围与 UltraMerino 网站。

## 预期收益与风险

预期收益：

- 让页面更直接对应已验证的三个商业采购词簇；
- 帮助采购方以产品角色、GSM 和关键开发输入开始报价；
- 在不创建平行页的情况下，建立 Athletik 主站的 Merino OEM 项目入口。

风险与控制：

- GSM 被误解为固定能力范围：在区块底部明确为 common starting points，并绑定 buyer specification；
- 与 `/underwear-manufacturer/` 页面所有权重叠：Merino 页只承接 material-first 查询，Underwear 页继续承接 construction / product-first 查询；
- 与 UltraMerino 形成重复内容：不复制文案、结构或页面元数据；Athletik 强调其完整 OEM/ODM 项目中的 Merino 采购入口；
- 低样本被错误解释为排名结果：不改 Title / Meta，Day 7 只做抓取与技术复查，Day 28 / 90 才结合 Query 与有效询盘判断。

## 验收标准

### 本地

- [x] PHP 8.2 语法与 `git diff --check` 通过；
- [x] 本地目标 URL 返回 HTTP 200、保持单一 H1；
- [x] 三张采购入口卡、三组 GSM 起始范围、三个 Contact 入口和范围说明完整输出；
- [x] 共享模板只在提供 `buying_paths` 数据时输出新模块；其他六个品类页保持原结构；
- [x] Desktop 三张卡的两行标题轨道统一，分隔线、GSM、正文与底部 CTA 对齐；CTA 改用连续 `border-bottom`，避免浏览器文本下划线在 100% 缩放下因字形避让和子像素取整出现割裂；
- [ ] 所有者完成英文文案和视觉审核。

### 生产

- [ ] 部署 `inc/product-category-data.php`、`template-parts/product-category/page.php` 与 `style.css`；
- [ ] 页面 HTTP 200、可索引、自引用 Canonical、单一 H1 与 JSON-LD 无回归；
- [ ] Desktop / Mobile 无横向溢出、卡片高度或触控入口问题；
- [ ] 其他六个品类页不输出 Merino 专属采购入口；
- [ ] 部署后在 GSC 执行“测试实际网址”，通过后请求编入索引一次。

## Finding outcome

当前 outcome：`changed / owner-review`。所有者审核并完成生产验收后转为 `changed / measuring`；计划从生产部署日重新计算 Day 7 / 28 / 90。
