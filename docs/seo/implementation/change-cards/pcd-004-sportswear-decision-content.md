# PCD-004 Sportswear 采购决策内容

- Change ID：`PCD-004`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`local-implemented / owner-review`
- 本地实施日期：2026-09-02
- 目标页面：`/sportswear-manufacturer/`
- 主要官网任务：`Qualify / Verify / Start`
- 搜索与采购意图：sportswear OEM、activewear development、custom sportswear、sportswear QC

## 观察与证据

Sportswear 已覆盖 Training、Running、Yoga、Compression、FLATLOCK、ACTIVESEAM、材料与项目级性能验证，但缺少集中展示的 customization、QC checkpoints 和 buyer questions。现有页面能说明“做什么”，但买家仍需从分散段落推断“如何定义项目、如何确认结果、如何进入询盘”。

实施依据为 [`../../evidence/sportswear-public-capability-fact-sheet-v1.md`](../../evidence/sportswear-public-capability-fact-sheet-v1.md)：所有者已确认 SP-01–SP-10 可作为开发能力提供。各项性能继续写成材料、finish、结构或项目选项，不扩大为所有 Sportswear 成品保证。

## 主要变量

1. 新增 `Sportswear customization and quality checkpoints`，含 `Program customization` 与 `Sportswear quality checkpoints` 两张卡；
2. customization 只使用已确认的 FLATLOCK、ACTIVESEAM、power-band waistband、mesh ventilation、4-way-stretch、power-stretch 与项目级 finish 方向；
3. QC 绑定 current tech pack / specification、approved sample 与 buyer acceptance criteria；
4. 新增四个可见 Buyer Questions，回答 MOQ、采样输入、性能目标确认和组合技术结构；不新增 FAQ Schema；
5. 增加 Tech Pack Guide 与 QC Guide 的上下文内链；
6. 复用已验收的品类共享模板结构，不改其他六个品类页的数据。

## 风险与控制

- 风险：opacity、compression、quick-dry、UV 或 antimicrobial 被理解为无条件结果。
- 控制：所有答案均要求实际材料、成衣、test method、acceptance criteria、approved sample 与 project-specific testing；不写具体等级或测试值。
- 风险：低曝光页面被当成关键词扩写实验。
- 控制：本项不改 URL、Title、Meta、H1、主词或页面所有权，不创建 Activewear / Fitness 平行页；它属于采购决策完整性改进。

## 验收标准

### 本地

- [x] `/sportswear-manufacturer/` 返回 HTTP 200并保持单一 H1；
- [x] 两张执行卡、四个 Buyer Questions 与两个新增技术指南内链正常渲染；
- [x] 1440 × 900 与 390 × 844 full-page 渲染无可见横向溢出或文字截断；
- [x] PHP 8.2 语法与 `git diff --check` 通过；
- [x] URL、Title、Meta、H1、Schema 类型、图片和产品模块数量不变。

### 生产 / 部署后

- [ ] 页面返回 HTTP 200、可索引、自引用 Canonical；
- [ ] 新区块、Questions 与内链完整；
- [ ] 其余六个品类页无内容或布局回归；
- [ ] Desktop / Mobile 无横向溢出；
- [ ] 所有者确认公开能力和业务流程准确。

当前 Finding outcome：`changed / owner-review`。部署后按 28 / 90 天同口径观察，不把本项与 Title / Meta 或关键词实验混合归因。
