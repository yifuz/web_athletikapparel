# PCD-003 Services 采购阶段决策信息

- Change ID：`PCD-003`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`production-accepted / measuring`
- 本地实施日期：2026-09-02
- 生产验收日期：2026-09-02
- 目标页面：`/services/`
- 主要官网任务：`Verify / Start`
- 搜索与采购意图：sampling、bulk production、quality control、export shipping、quotation scope

## 观察与证据

原页面正确展示 Sampling、Bulk Production、Quality Control 与 Export & Shipping 四阶段，但每个阶段只有一个说明段落。买家无法快速确认需要提供什么、Athletik 会审核什么、进入下一阶段前需要对齐什么，以及哪些变量影响报价。

本次使用以下已批准的一方事实与页面证据：

- `page-services.php` 的现有四阶段服务范围、FOB / DDP 与标准出口文件能力；
- `/technical-knitwear-tech-pack-guide/` 的 tech pack、材料、construction、testing 与批准输入；
- `/garment-quality-control-checklist/` 的 incoming material、in-line、final inspection、approved sample 与 acceptance criteria；
- `/evaluate-technical-knitwear-oem/` 的 quotation normalization 与项目级范围边界；
- 公开成衣 MOQ 为 `500 pieces per style`。

本项不依赖 GSC 排名样本，不改变 Title、Meta、H1、URL 或页面所有权。

## 主要变量

1. 每个阶段增加四个固定字段：`Buyer provides`、`Athletik reviews`、`Approval before next stage`、`Quotation variables`；
2. 保留现有四阶段顺序，不建立服务子页面；
3. 将 Bulk、QC 与 Export 的旧绝对化或宣传式说明改为 project-specific、approved sample、specification、acceptance criteria 与 quotation scope 语言；
4. Desktop 使用 2 × 2 阶段网格，每个阶段内部使用 2 × 2 决策卡；较窄视口回落为单列，全部样式使用现有 `--ma-*` token。

## 风险与控制

- 风险：买家可能把公开字段理解为所有项目固定不变的 SOP。
- 控制：使用 `aligned`、`confirmed`、`available by project` 和 `depends on`，不公开未经确认的产能、固定交期、测试结果或认证结论。
- 风险：信息密度上升后页面过长或移动端溢出。
- 控制：Desktop 阶段双列、字段卡片紧凑排列；生产部署后复核 1440 × 900 与 390 × 844。

## 验收标准

### 本地

- [x] `/services/` 返回 HTTP 200；
- [x] 页面保持单一 H1；
- [x] 四个阶段均输出四个决策字段，共 16 个字段；
- [x] PHP 8.2 语法与 `git diff --check` 通过；
- [x] 1440 × 900 与 390 × 844 full-page 渲染无可见横向溢出或文字截断；
- [x] 未改 URL、Title、Meta、H1、Schema、图片或 Sitemap。

### 生产 / 部署后

- [x] 生产 `/services/` 返回 HTTP 200、可索引、自引用 Canonical；
- [x] 四阶段与 16 个决策字段完整渲染；
- [x] Desktop / Mobile 无横向溢出或布局回归；
- [x] 首页到 Services 的入口、Sitemap 与现有索引信号保持；
- [x] 所有者审核后完成部署。

生产验收覆盖首页、Services 与 7 个品类页，共 9/9 HTTP 200、可索引、单一 H1、自引用 Canonical、0 fetch failure、0 high/medium issue。结构化审计仅保留既有 HSTS 与图片尺寸启发式两项 low review，均与本项无关，分别记录为 `no-change / existing-owner-action` 与 `no-change / unchanged-heuristic`。

当前 Finding outcome：`changed / measuring`。作为 B 类采购决策改进，本项不单独归因为自然搜索排名变化；后续观察 Services engagement、Contact 进入路径和询盘资料完整度。
