# QC Guide 内容简报（SEO-IMP-018）

> 建立日期：2026-08-19
> 对应实施项：SEO-IMP-018（QC Guide 内容简报与证据采集）
> 状态：**已于 2026-08-20 完成生产部署与验收；待 GSC 请求编入索引**
> 质量标准：`seo-process.md` 阶段 F；`AGENTS.md` §5（长文案需所有者审核后发布）

---

## 1. 机会概述

### 搜索需求（关键词研究数据）

| 关键词 | 七国月均量 | 意图判断 |
|---|---:|---|
| `garment quality control` | 110 | 核心 QC 教育词，买家尽调任务明确 |
| `clothing quality control checklist` | 70 | Checklist 任务，可执行性强 |
| `garment quality inspection` | 10 | 偏检查执行 |
| `apparel quality control` | 10.8 | 自然近义词 |
| `garment qc checklist` | 6.7 | 低量专业缩写变体 |
| `garment quality control report` | 5.8 | 偏报告与记录模板 |

- Google Ads 页首出价 CNY 239–360，高于多数关键词，暗示商业价值
- 实时 SERP 覆盖材料、尺寸、缝制、外观、标签、包装、inline inspection、final inspection 和 AQL

### 业务价值

- QC 是中型 B2B 买家在选择制造商时的核心尽调任务之一
- 独立的 QC 指南可以承接 `garment quality control` 和 `clothing quality control checklist` 的搜索意图
- 有潜力成为链接资产（其他行业文章可能引用实用的 QC 检查清单）
- 与现有 OEM Evaluation 指南形成互补：OEM 指南回答"如何评估供应商"，QC 指南回答"QC 具体做什么"

### 页面重叠风险

- `/services/` 的 QC 段落只是流程概览，不构成内容竞争
- OEM Evaluation 指南的第 8 节（Examine quality data）涉及 QC 证据要求，但角度是"买家如何审查供应商的 QC 体系"，不是"QC 的具体操作流程"
- 两者可以共存：OEM 指南面向供应商选择阶段，QC 指南面向合同签订后的质量控制执行

---

## 2. 目标买家与市场

| 字段 | 值 |
|---|---|
| 目标买家 | 中型品牌的 Sourcing Manager、Product Developer、QA/Technical 团队 |
| 市场 | 北美（US/CA）和欧洲（UK/NL/SE/NO/FI） |
| 买家任务 | 尽调阶段：确认制造商的 QC 体系是否可靠，了解自己需要提供什么 |
| 期望动作 | 阅读后进入 Contact 提交询盘，或在 RFQ 中引用 QC 要求 |

---

## 3. 页面定位与 URL

### 提议 URL

`/garment-quality-control-checklist/`

选择理由：
- `clothing quality control checklist` 月均 70，意图明确（可执行清单）
- `garment quality control` 月均 110，但更宽泛
- "checklist" 后缀直接传达页面类型，CTR 预期更好
- 顶级路径，与现有指南 URL 结构一致

### 页面角色

**Guide**（技术教育 + 信任证明）

### H1 草案

`Garment Quality Control Checklist for Technical Knitwear`

### 与现有页面的关系

| 页面 | 关系 |
|---|---|
| `/services/` | Services 的 QC 段落链接到本指南作为详细展开 |
| `/evaluate-technical-knitwear-oem/` | OEM 指南第 8 节链接到本指南作为 QC 操作细节 |
| `/technical-knitwear-tech-pack-guide/` | Tech Pack 指南的测试章节链接到本指南 |
| `/technical-guides/` | Hub 新增卡片入口 |

---

## 4. 需要所有者确认的证据清单

> 所有者已于 2026-08-20 完成事实、素材和责任边界审核。未知或暂不公开的条目不进入页面。

### 4.1 QC 流程节点

以下 QC 节点已由所有者确认；不确定项目继续保持不公开：

| QC 节点 | 是否存在 | 可公开程度 | 备注 |
|---|---|---|---|
| 面料进厂检验（Incoming fabric inspection） | 存在 | 公开 | 是否有检验记录表？ |
| 首件确认（First-piece approval） | 存在 | 公开 | 是否有首件签样流程？ |
| 在线巡检（In-line / during-production inspection） | 存在 | 公开 | 是否有巡检记录？ |
| 尾期终检（Final inspection / pre-shipment inspection） | 存在 | 公开 | 是否有终检报告模板？ |
| AQL 抽样检验 | 存在 | 公开 | 是否使用 AQL 标准？哪个级别？ |
| 针检（Needle detection） | 不确定 | 暂时不公开 | 是否有针检机和记录？ |
| 尺寸测量（Measurement audit） | 存在 | 公开 | 是否有尺寸检验记录？ |
| 外观检验（Visual / workmanship inspection） | 存在 | 公开 | 是否有外观缺陷分类标准？ |
| 测试跟踪（Testing status tracking） | 不确定 | 暂时不公开 | 是否跟踪第三方测试状态？ |

### 4.2 可公开的图片/素材

以下素材可用性已由所有者确认：

| 素材 | 可用性 | 备注 |
|---|---|---|
| QC 检验台/工作区域照片 | 可用 | 需脱敏（不出现客户品牌/标签） |
| 检验记录表/报告模板（脱敏） | 没有专用的记录表和报告模版 | 可截图或重新制作为示意图 |
| 针检机照片 | 无 | 如有 |
| 尺寸测量操作照片 | 有视频 | 如有 |
| 面料检验照片 | 有视频 | 如有 |
| 缺陷分类示例图 | 有图片 | 可制作为示意图 |

### 4.3 责任边界

以下责任边界已由所有者确认：

| 问题 | 所有者确认 |
|---|---|
| QC 是 Athletik 内部执行还是第三方执行？ | 除非有客户指定的第三方QC，则我们自己内部执行 |
| 如果客户要求第三方验货（如 SGS/BV/TÜV），Athletik 的角色是什么？ | 辅助第三方完成验货 |
| 出现质量争议时的处理流程是什么？ | 修复，返工 |
| AQL 标准由谁定义？买家还是 Athletik？ | 买家 |
| 不合格品的返工/报废责任和成本分担？ | Athletik全部承担 |

### 4.4 与现有页面的一致性

| 问题 | 当前状态 | 决策 |
|---|---|---|
| Services 页仍有 "our own fabric mill with in-house testing" | 与 IMP-010 决定不一致 | **保留（所有者 2026-08-20 确认）** |
| About 页仍有 "our own fabric mill, with full in-house testing" | 同上 | **保留（同上）** |
| 首页 why-myathletik 仍有 "full in-house testing" | 同上 | **保留（同上）** |
| 首页 process-snapshot 仍有 "In-house testing and inspection at every stage" | 同上 | **保留（同上）** |

**所有者澄清（2026-08-20）：**
- Beta Textiles 不是独立法律实体，只是对外使用的名称/路径；因此 "our own fabric mill" 是准确表述。
- 检测能力包含自有检测设备和第三方检测，完全根据客户要求选择；"in-house testing" 是准确表述。
- 不过度抠字眼——目标是获客，具体细节在实际客户沟通中确认。
- IMP-010 从 Knitted Fabrics 页移除的 "our own fabric mill" 和 "in-house testing" 表述可恢复，保持全站口径一致。

---

## 5. 推荐结构

```
H1: Garment Quality Control Checklist for Technical Knitwear

1. Opening
   - 什么是 QC 在裁剪缝制针织服装中的角色
   - 与 OEM Evaluation 的区别（供应商选择 vs 质量控制执行）
   - 适用范围声明（cut-and-sew technical knitwear）

2. Pre-production quality controls
   - 面料进厂检验（incoming fabric inspection）
   - 色样/手感样/测试确认
   - 首件确认流程

3. In-line production controls
   - 在线巡检频率和内容
   - 关键尺寸在线测量
   - 缝制质量巡检

4. Final inspection
   - 终检流程和覆盖范围
   - AQL 抽样计划（如适用）
   - 外观缺陷分类
   - 尺寸测量审核
   - 包装和标签检查

5. Testing and compliance
   - 第三方测试与内部检验的关系
   - 测试状态跟踪
   - 认证声明的验证

6. Needle control and safety
   - 针检流程
   - 断针记录和处理

7. Documentation and records
   - 检验记录的类型和用途
   - 买家可以要求哪些记录
   - 不合格品处理流程

8. What buyers should specify in the tech pack
   - QC 要求如何写入 tech pack
   - AQL 级别和检验标准的选择
   - 与 Tech Pack Guide 的衔接

9. FAQ
   - 是否接受第三方验货？
   - AQL 2.5 是什么意思？
   - 最小订单量的 QC 覆盖是否与大货相同？
   - 质量争议的处理流程？

10. References
    - 相关 ASTM/AATCC/ISO 标准
    - AQL 标准参考

11. CTA
    - 提交 QC 要求和技术规格
```

---

## 6. 内容来源与限制

### 可以从现有批准事实写入的内容

- 裁剪缝制针织服装的 QC 通用知识（行业实践）
- 与 Tech Pack Guide 和 OEM Evaluation 指南的交叉引用
- AQL 标准的一般解释
- 检验类型的一般分类（incoming / in-line / final）

### 必须有一方证据才能写入的内容

- Athletik 的具体 QC 流程节点和频率
- 使用的检验记录表和报告模板
- 针检机的存在和使用
- 具体的 AQL 级别和检验覆盖范围
- 任何照片或图片素材

### 不得写入的内容

- 虚构的 QC 流程、记录或标准
- 客户名称或保密项目细节
- 未经验证的 "in-house testing" 声称（除非所有者确认）
- 工厂数量或产能数字

---

## 7. Title / Meta / H1 草案

| 字段 | 草案 |
|---|---|
| **SEO Title** | `Garment Quality Control Checklist for Knitwear | Athletik` |
| **Meta Description** | `QC checklist for cut-and-sew technical knitwear: incoming fabric checks, in-line inspection, AQL sampling, final inspection and needle control.` |
| **H1** | `Garment Quality Control Checklist for Technical Knitwear` |

---

## 8. 内链与出链计划

### 入链（其他页面指向本指南）

| 来源页面 | 锚文本方向 |
|---|---|
| `/services/` | QC 段落展开链接 |
| `/evaluate-technical-knitwear-oem/` | 第 8 节 "Examine quality data" 的延伸阅读 |
| `/technical-knitwear-tech-pack-guide/` | 测试章节的 QC 检查清单引用 |
| `/technical-guides/` | Hub 卡片入口 |

### 出链（本指南指向其他页面）

| 目标页面 | 锚文本方向 |
|---|---|
| `/technical-knitwear-tech-pack-guide/` | QC 要求如何写入 tech pack |
| `/evaluate-technical-knitwear-oem/` | 供应商评估中的 QC 证据要求 |
| `/services/` | QC 在四阶段流程中的位置 |
| `/contact/` | 提交 QC 要求 |

---

## 9. 图片需求

| 图片 | 用途 | 来源 |
|---|---|---|
| 封面图 | Hero / og:image | 需拍摄或从现有素材选择（QC 检验场景） |
| 检验操作照片 | 正文配图 | 需所有者提供 |
| 缺陷分类示意图 | 正文配图 | 可制作为信息图 |
| 流程图 | QC 流程可视化 | 可制作为信息图 |

---

## 10. 所有者审核记录

1. [x] §4.1 QC 节点的存在性和可公开程度（2026-08-20）
2. [x] §4.2 可用图片/视频素材（2026-08-20）
3. [x] §4.3 责任边界表述（2026-08-20）
4. [x] §4.4 Services/About/首页的 "in-house testing" 口径一致性（保留）
5. [x] Title / Meta / H1
6. [x] URL `/garment-quality-control-checklist/`
7. [x] 完整正文草稿

---

## 11. 时间线

| 阶段 | 动作 | 状态 |
|---|---|---|
| 1 | 内容简报建立 | ✅ 本文档 |
| 2 | 所有者回答 §4 证据清单 | ✅ 2026-08-20 |
| 3 | 搜索需求与意图验证 | ✅ 使用既有七国 Keyword Planner 与 SERP 研究 |
| 4 | 正文草稿撰写 | ✅ 2026-08-20 |
| 5 | 所有者审核 | ✅ 2026-08-20 |
| 6 | 页面注册、部署与生产验收 | ✅ 2026-08-20 |
| 7 | Day 28 / Day 90 复盘 | 生产部署后执行 |
