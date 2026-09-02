# PCD-001 Contact 表单采购资格字段

- Change ID：`PCD-001`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P1
- 状态：`local-accepted / production-form-config-pending`
- 本地实施日期：2026-09-02
- 目标表单：Fluent Forms `inquiry form`，Form ID `3`
- 目标页面：`/`、7 个产品品类页、`/contact/`
- 搜索与采购意图：B2B supplier qualification、RFQ preparation 与 `Start`

## 观察与决策

生产表单原有 `Estimated Order Quantity` 只提供 `Under 1,000 pcs`、`1,000–2,000 pcs`、`2,000–5,000 pcs` 和 `5,000+ pcs`。该分组不能区分低于公开 MOQ 的询盘与符合 `500 pieces per style` 的 500–999 件项目，也不能保存买家给出的精确预计数量。

所有者于 2026-09-02 决定：

1. 将数量下拉选择改为精确数字输入；
2. 增加 `Do you have a tech pack?` 项目成熟度字段；
3. 文件上传因当前仅安装 Fluent Forms Free 6.2.8 而暂缓，不绕过 Pro 授权或自制上传处理；
4. PCD-002 不实施：网站继续以中国制造主体为主要公开实体，不主动增加美国实体职责。

## 主要变量

### 数量字段

- 字段名：`estimated_order_quantity`
- 类型：required numeric input
- 标签：`Estimated Order Quantity (pieces per style; MOQ 500)`
- placeholder：`e.g. 1000`
- `min=1`、`step=1`
- 自定义空值与数字验证消息

保留低于 500 的输入能力，用于准确识别不合格询盘；不在前端阻止买家提交。

### Tech pack 状态

- 字段名：`tech_pack_status`
- 类型：required radio
- 选项：
  - `Yes — ready to share`
  - `In development`
  - `No`

现有 Message placeholder 继续提示买家在可用时提供安全文件链接。文件上传字段保持未实施。

## 不变项

- 不修改页面 URL、Title、Meta、H1、Canonical、Schema 或页面所有权；
- 不修改表单 ID、shortcode、通知接收人、GA4 `generate_lead` 逻辑或归因字段；
- 不修改公开法律实体职责；
- 不安装 Fluent Forms Pro，不增加新的表单插件。

## 风险与部署边界

- Fluent Forms 表单结构存储在 WordPress 数据库，不属于子主题 Git 文件；部署主题代码不会同步本变更。
- 不应通过整库推送覆盖生产环境，以免覆盖生产询盘和其他数据库状态；生产 Form ID `3` 应在 Fluent Forms 后台人工复制同一配置。
- 本地修改前的 Form ID `3` 配置已保存到非 autoload WordPress option：`myathletik_form_3_backup_20260902_pcd001`。
- 当前通知启用且正文包含 `{all_data}`，因此新字段会自动进入通知正文；生产部署后仍需确认实际通知。
- 文件上传只有在 Fluent Forms Pro、文件访问控制、允许类型、大小、保留期与删除策略全部确定后才可重开。

## 本地验收

- [x] 首页、7 个品类页与 Contact 共 9/9 页面返回 HTTP 200；
- [x] 9/9 页面输出 `estimated_order_quantity` numeric input，旧 `dropdown_1` 不再输出；
- [x] 9/9 页面输出 3 个 `tech_pack_status` radio；
- [x] 空数量显示 `Please enter the estimated quantity per style.`；输入 500 后数量错误消失；
- [x] 未选择 tech pack 状态时显示 `Please select the current tech pack status.`；
- [x] 1440×900 与 390×844 Contact full-page 渲染无横向溢出，`scrollWidth / innerWidth` 分别为 `1440 / 1440` 与 `390 / 390`；
- [x] 数量标签、三个选项、Message、提交按钮和隐私提示在桌面与移动端正常显示；
- [x] 通知正文使用 `{all_data}`，无需为两个新字段改通知模板；
- [x] 未执行成功提交，避免产生新的测试询盘与 GA4 lead。

## 生产部署与验收

生产部署不是文件上传，而是在 WordPress 后台更新 Fluent Forms Form ID `3`：

1. 把 `Estimated Order Quantity` 改为上述 Numeric Field；
2. 在 Business Type 后增加上述 required Radio Field；
3. 保存表单并清理相关页面缓存；
4. 复查首页、7 个品类页和 Contact 的 HTML 与 Desktop/Mobile 渲染；
5. 验证空值错误、500 的有效输入和 tech pack 必选状态；
6. 如执行一次受控成功提交，必须标记为测试询盘并从询盘基线排除。

生产验收通过后，Finding outcome 由 `deferred` 更新为 `changed / measuring`；后续按 28 天窗口观察不合格询盘识别率、字段完整度和有效询盘，不把表单变化解释为自然搜索排名原因。
