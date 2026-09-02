# PCD-001 Contact 表单采购资格字段

- Change ID：`PCD-001`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`production-accepted / changed-measuring`
- 本地实施日期：2026-09-02
- 生产验收日期：2026-09-02
- 目标表单：Fluent Forms `inquiry form`，Form ID `3`
- 目标页面：`/`、7 个产品品类页、`/contact/`
- 搜索与采购意图：B2B supplier qualification、RFQ preparation 与 `Start`

## 观察与决策

生产表单原有 `Estimated Order Quantity` 只提供 `Under 1,000 pcs`、`1,000–2,000 pcs`、`2,000–5,000 pcs` 和 `5,000+ pcs`。该分组不能区分低于公开 MOQ 的询盘与符合 `500 pieces per style` 的 500–999 件项目，也不能保存买家给出的精确预计数量。

所有者于 2026-09-02 决定：

1. 将数量下拉选择改为精确数字输入；
2. 增加 `Do you have a tech pack?` 项目成熟度字段；
3. 文件上传因当前仅安装 Fluent Forms Free 6.2.8 而暂缓，不绕过 Pro 授权或自制上传处理；
4. PCD-002 不实施：网站继续以中国制造主体为主要公开实体，不主动增加美国实体职责；
5. 首页询盘区增加采购准备信息，将共用表单压缩为更适合桌面采购输入的两列布局；所有者于 2026-09-02 完成最终视觉审核并批准部署。

## 主要变量

### 数量字段

- 本地字段名：`estimated_order_quantity`；生产 Fluent Forms 自动字段名：`numeric_field_1`
- 类型：required numeric input
- 标签：`Estimated Order Quantity`
- placeholder：`e.g. 1000`
- `min=1`、`step=1`
- 自定义空值与数字验证消息

保留低于 500 的输入能力，用于准确识别不合格询盘；不在前端阻止买家提交。

### Tech pack 状态

- 本地字段名：`tech_pack_status`；生产 Fluent Forms 自动字段名：`dropdown_3`
- 类型：required select，与 `Business Type` 同处两列容器；生产可见标签为 `Tech Pack`
- 选项：
  - `Ready to share`
  - `In development`
  - `No`

现有 Message placeholder 继续提示买家在可用时提供安全文件链接。文件上传字段保持未实施。

### 首页询盘区

- 左栏使用 `Product brief`、`Order scope`、`Tech pack status`、`Sales email` 四张采购准备卡片；
- 卡片使用暖深灰而非纯黑背景，保留可见边界、图标和直接邮箱入口；
- Desktop 有效内容宽度约 1200px，左右栏比例约 35% / 65%，表单约 754px，栏间距约 40px；
- 768px 使用两列提示卡与整行表单，低于该宽度改为单列；1024px 起进入左右分栏；
- 首页 Message 视觉高度与表单内边距缩小，Contact 与品类页共用字段和验证逻辑保持一致。

## 不变项

- 不修改页面 URL、Title、Meta、H1、Canonical、Schema 或页面所有权；
- 不修改表单 ID、shortcode、通知接收人、GA4 `generate_lead` 逻辑或归因字段；
- 不修改公开法律实体职责；
- 不安装 Fluent Forms Pro，不增加新的表单插件。

## 风险与部署边界

- Fluent Forms 字段结构存储在 WordPress 数据库，不属于子主题 Git 文件；部署主题代码只会同步首页采购准备卡片和视觉布局，不会自动同步字段配置。
- 不应通过整库推送覆盖生产环境，以免覆盖生产询盘和其他数据库状态；生产 Form ID `3` 应在 Fluent Forms 后台人工复制同一配置。
- 本地修改前的 Form ID `3` 配置已保存到非 autoload WordPress option：`myathletik_form_3_backup_20260902_pcd001`。
- 后续布局与数量标签修改前另存 `myathletik_form_3_backup_20260902_layout_before`、`myathletik_form_3_backup_20260902_quantity_label_before`。
- 当前通知启用且正文包含 `{all_data}`，因此新字段会自动进入通知正文；生产部署后仍需确认实际通知。
- 文件上传只有在 Fluent Forms Pro、文件访问控制、允许类型、大小、保留期与删除策略全部确定后才可重开。

## 本地验收

- [x] 首页、7 个品类页与 Contact 共 9/9 页面返回 HTTP 200；
- [x] 9/9 页面输出 `estimated_order_quantity` numeric input，旧 `dropdown_1` 不再输出；
- [x] 9/9 页面输出 required `tech_pack_status` select，不再输出同名 radio；
- [x] 空数量显示 `Please enter the estimated quantity per style.`；输入 500 后数量错误消失；
- [x] 未选择 tech pack 状态时显示 `Please select the current tech pack status.`；
- [x] 360、768、1024、1200、1440、2048px 均无横向溢出；Desktop 左栏约 406px、表单约 754px、间距约 40px；
- [x] 数量标签、Tech Pack Status、Message、提交按钮和隐私提示在桌面、平板与移动端正常显示；
- [x] 通知正文使用 `{all_data}`，无需为两个新字段改通知模板；
- [x] 未执行成功提交，避免产生新的测试询盘与 GA4 lead。
- [x] 所有者于 2026-09-02 审核最终暖深灰卡片、35% / 65% 比例与紧凑表单并批准部署。

## 生产部署与验收

生产部署包括主题文件和 WordPress 后台 Form ID `3` 配置：

1. 部署 `style.css` 与 `template-parts/home/inquiry-cta.php`；
2. 把 `Estimated Order Quantity` 改为上述 required Numeric Field；
3. 把 Tech Pack 字段改为上述 required Select，并与 `Business Type` 放入两列容器；
4. 保存表单并清理相关页面缓存；
5. 复查首页、7 个品类页和 Contact 的 HTML 与 Desktop/Mobile 渲染；
6. 验证空值错误、500 的有效输入和 tech pack 必选状态；
7. 如执行一次受控成功提交，必须标记为测试询盘并从询盘基线排除。

## 生产验收

- [x] 主题代码与 Form ID `3` 配置已部署；
- [x] 首页、7 个品类页与 Contact 共 9/9 返回 HTTP 200，继续输出 `index`；
- [x] 9/9 页面输出短标签 `Estimated Order Quantity`、required Numeric Field、`min=1`、`step=1`；
- [x] 9/9 页面输出 required `Tech Pack` Select，并与 required `Business Type` 同行；
- [x] 生产首页输出四张采购准备卡片，1440px 表单约 754px，Desktop/Mobile 无横向溢出；
- [x] 客户端空值验证只产生 `Estimated Order Quantity` 与 `Tech Pack` 两个错误，未进入成功状态；
- [x] 未执行成功提交，未产生测试询盘或 GA4 lead。

Finding outcome 更新为 `changed / measuring`。后续在 28 个完整自然日后观察不合格询盘识别率、字段完整度和有效询盘；该 B 类采购决策改进不解释为自然搜索排名变化。
