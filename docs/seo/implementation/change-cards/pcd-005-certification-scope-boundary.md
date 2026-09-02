# PCD-005 认证与审核范围边界

- Change ID：`PCD-005`
- Finding type：`review`
- 变更类型：V1.3 B 类采购决策完整性改进
- 优先级：P2
- 状态：`production-accepted / external-input`
- 本地实施日期：2026-09-02
- 生产验收日期：2026-09-02
- 目标页面：`/` 认证与审核区块
- 主要官网任务：`Verify`
- 对应外部项目：`SEO-V2-006`

## 观察与决策

首页原 H2 使用 `Verified badges, grouped by purpose`，但当前不能公开核对每个 badge 对应的 certificate / label number、持证主体、生产地点、产品范围和有效期。`Verified` 因此超出当前可证明范围。

本轮采取最小风险缓解：

1. 移除 `Verified`；
2. H2 改为 `Program references, grouped by purpose`；
3. 两个分组改为不直接推断证书所有权的 program 名称；
4. 增加可见范围说明：适用性取决于 legal entity、production site、material or product、program scope 与 current validity，买家应在 supplier review 阶段确认适用于订单的文件。

## 外部输入边界

该文案修正不等于完成证书验证。ThomasNet、OEKO-TEX Buying Guide 与 WRAP 公开列名仍按 `SEO-V2-006` 维持 `deferred / external-input`，只有取得完整凭据后才重开。不得根据徽章文件名推断编号、持证主体、有效期或门户列名状态。

## 验收标准

### 本地

- [x] 首页返回 HTTP 200；
- [x] `Verified badges` 已移除；
- [x] 范围说明可见，未新增证书编号、主体、有效期或法律关系；
- [x] badge 文件、图片数量、alt 与链接行为不变；
- [x] 不扩充 SEO V2 Backlog。

### 生产 / 部署后

- [x] 新 H2、分组标题和范围说明正常渲染；
- [x] 认证区块图片与布局无回归；
- [x] 首页 Title、Meta、H1、Schema、Canonical 与索引信号不变。

生产 Desktop / Mobile 视觉验收确认 10 张 program reference 图片均按原分组显示，范围说明可见，无截断或横向溢出。当前 Finding outcome：`copy-risk-mitigated / external-verification-deferred`；页面风险缓解已经上线，但外部名录与证书凭据验证仍未完成。
