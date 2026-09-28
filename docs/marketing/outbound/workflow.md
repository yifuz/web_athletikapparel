# Outbound 目标客户开发流程 — 单人基线

> 状态：`preparation-in-progress / no-live-send`
>
> 更新日期：2026-09-28
>
> 首轮范围：United States；Canada、EEA、United Kingdom、Switzerland 保持禁用

本流程用于准备美国目标企业的小批量人工开发。它是内部操作控制，不是法律意见。
任何 Agent 可以协助研究、去重、起草和复盘，但不得在没有所有者明确逐批批准的情况下
发送邮件、提交联系表单、发送 LinkedIn 消息或把联系人导入任何营销平台。

## 1. 当前发送闸门

| 闸门 | 当前证据 | 状态 |
|---|---|---|
| 目标市场 | 首轮仅 United States | `ready` |
| 发件身份 | `From: info@athletikapparel.com`；显示名 `Athletik Clothing` | `ready` |
| 身份验证 | 2026-09-28 Gmail 原始邮件显示 SPF、DKIM、DMARC 均 PASS，传输使用 TLS 1.3 | `ready / point-in-time` |
| 私有工作区 | `%LOCALAPPDATA%\Athletik\outbound\`；位于当前 Windows 用户的 LocalAppData，不纳入 Git | `ready` |
| 空白线索台账 | [`lead-ledger-template.csv`](lead-ledger-template.csv) | `ready` |
| 抑制名单模板 | [`suppression-list-template.csv`](suppression-list-template.csv) | `ready` |
| 首批公司级研究名单 | 私有台账已写入 10 家美国 Sportswear 候选；未收集联系人、邮箱或 LinkedIn | `researching / no-contact-data` |
| 首封邮件草案 | [`us-sportswear-pilot-email.md`](us-sportswear-pilot-email.md) | `draft / owner-review-required` |
| Brevo 确认请求 | [`brevo-readiness-request.md`](brevo-readiness-request.md) | `draft / user-action-required` |
| 邮件追踪 | 当前测试邮件存在 Brevo tracking pixel；未知/未同意联系人必须关闭个体 open/click tracking 并复测 | `blocked` |
| Brevo 使用资格 | 官方页面对 B2B 非个人地址与 role-based 地址的说明存在表面冲突；不得把公开邮箱可见性视为平台授权 | `blocked / support-confirmation-required` |
| 未回复潜客保留期限 | 建议最后一次触达后 6 个月删除或匿名化，待所有者批准 | `pending-owner-decision` |
| 退订/禁止联系 | 邮件正文回复退订 + 最小化抑制名单流程已定义 | `ready / owner-review-required` |
| 实际发送 | 尚未获得逐批发送批准 | `not-authorized` |

只有全部 `blocked` 与 `pending-owner-decision` 项关闭、首封邮件经所有者审核，并获得
“允许发送本批”的明确指令后，才可以把首批记录从 `ready_to_contact` 改为 `approved_to_send`。

## 2. 数据存储边界

- Git 只保存空白模板和不含个人数据的流程文件。
- 私有工作副本固定放在当前 Windows 用户的 `%LOCALAPPDATA%\Athletik\outbound\`。不得共享该目录，
  也不得把已填写台账、联系人导出、
  邮件截图、原始邮件头或邮件归档复制到主题仓库。
- 不得在 UTM、文件名、Git commit、issue 标题或截图名中写姓名、邮箱、LinkedIn URL 或其他个人数据。
- 对外链接只使用匿名 `lead_id`，例如 `us-2026q4-001`。
- 私有工作副本不得上传到 Brevo Contacts、Google Sheets 或其他云服务，除非所有者另行批准并完成
  对应的数据流与保留审查。

私有目录应包含：

```text
%LOCALAPPDATA%\Athletik\outbound\
  lead-ledger.csv
  suppression-list.csv
```

## 3. 美国首轮范围与联系人来源

- 每周研究 10–15 家匹配企业；有回复或跟进积压时不扩量。
- 每家只选择 1–2 个与 sourcing、procurement、product development、production、operations、
  apparel design 或 category management 直接相关的联系人。
- 目标企业必须已有 sportswear、underwear、outdoor clothing、base layer、Merino wool apparel
  或 technical knitwear 产品线，并记录一条可核验的 fit signal。
- 公开 MOQ 为 500 pieces per style；明显只做低数量 startup、单队 teamwear 或零售定制的对象不进入首轮。
- 不购买、租用、借用或交换名单，不使用邮箱猜测器，不批量抓取网站或 LinkedIn 邮箱，不把第三方名单导入 Brevo。
- `contact_source_url` 只证明研究来源，不自动证明“允许发送”。联系人资格必须单独写入
  `contact_basis` 和 `platform_eligibility`。
- 已有业务关系、对方主动交换的 business card、referral 或经平台确认可用的来源可以进入人工审核。
- 从公开网站或社交页面复制出的邮箱默认记为 `platform_eligibility=unverified`，不能直接发送。

Brevo 的官方说明同时出现“B2B non-personal email addresses 可构成合法联系人列表”的概括，
以及“role-based email address 无法取得可验证同意”的否定示例。由于这两处表述不能可靠地证明
本项目的具体冷联系用法被允许，首批发送前必须取得 Brevo Support 对“少量、逐封、人工、
美国 B2B prospecting，经 Brevo SMTP 发送”的书面确认，或改用明确允许该场景的发送方式。
可直接使用的英文工单草案与复测清单见
[`brevo-readiness-request.md`](brevo-readiness-request.md)。

参考：

- [Brevo — Anti-spam policy](https://help.brevo.com/hc/en-us/articles/209405205-What-is-the-anti-spam-policy-of-Brevo)
- [Brevo — Build a legitimate contacts database](https://help.brevo.com/hc/en-us/articles/213405965-Build-a-legitimate-contacts-database-for-optimal-deliverability-and-compliance)

## 4. 研究与发送前检查

每条记录必须同时满足：

1. `country=United States`，公司与产品线匹配。
2. `fit_evidence_url`、`contact_source_url` 和一条具体 `personalization_evidence` 已填写。
3. 联系岗位与采购、产品开发、生产或品类决策相关。
4. `contact_basis` 与 `platform_eligibility` 有可复核说明，不以“网上公开”为充分依据。
5. 主题行、`From`、`Reply-To` 和显示名准确，不使用伪装的 `Re:` 或 `Fwd:`。
6. 正文只写与对方当前产品线相关的一项制造匹配点，不群发通用能力清单。
7. 只放一个匹配品类页链接，使用匿名 UTM；首封不带附件。
8. 邮件包含有效邮寄地址、商业外联说明和清晰的 reply-to-opt-out 文案。
9. 个体 open/click tracking 已关闭；`tracking_disabled=yes`。
10. `suppression-list.csv` 无匹配；`opt_out=no`、`do_not_contact=no`。
11. `batch_id`、`copy_version` 和 `owner_approval_date` 已填写；`owner_send_approval=yes`，
    且批准范围包含该批次和当前正文版本。

推荐 UTM：

```text
https://www.athletikapparel.com/sportswear-manufacturer/?utm_source=outbound&utm_medium=email&utm_campaign=us_sportswear_2026q4&utm_content=us-2026q4-001
```

`utm_content` 只能使用匿名 `lead_id`，不得包含个人或公司名称。

## 5. 发送方式与追踪控制

- 仅逐封人工发送；首轮不使用 Campaign、Automation 或批量序列。
- `From` 使用 `info@athletikapparel.com`，显示名使用 `Athletik Clothing`。
- 发送前用未参与配置的 Gmail 测试地址复测原始邮件头：SPF、DKIM、DMARC、TLS、From/Reply-To、
  正文退订文案和邮寄地址均正确。
- 当前 Brevo 测试邮件包含 tracking pixel。首轮冷联系不得依赖 open rate 或 click rate，
  必须先将未知联系人个体追踪设为关闭，并从原始 HTML 确认不再出现个体 tracking pixel 或
  individualized tracking link。
- 若无法关闭追踪、无法确认 Brevo 允许该发送场景，或测试邮件验证失败，则保持 `blocked`。
- 可用结果只包括人工确认的 delivery、reply、qualified、quoted、sampling、won、lost 和 opt-out；
  open/click 不作为首轮效果 KPI。

Brevo 说明，商业邮件通过 SMTP 或 API 发送并不会因此变成 transactional email；个体 pixel/link
追踪与邮件发送本身是不同的许可问题。参考：
[Brevo — Email tracking pixels](https://help.brevo.com/hc/en-us/articles/37114679474706-About-email-tracking-pixels-and-the-CNIL-recommendation-in-Brevo)。

Google 建议发件域配置 SPF/DKIM/DMARC、TLS，并保持身份与内容准确。参考：
[Google — Email sender guidelines](https://support.google.com/mail/answer/81126?hl=en)。

## 6. 邮件结构与退订

首封和所有 follow-up 都必须包含：

```text
Athletik Clothing Inc.
228 Park Avenue S #30327, New York, NY 10003, United States
This is a commercial business outreach message from Athletik Clothing.
If you prefer not to receive further marketing emails from us, reply “unsubscribe”.
```

美国 CAN-SPAM 适用于 B2B commercial email。发件头与主题必须准确，正文应清楚说明商业性质，
提供有效邮寄地址与易用退订方式；退订机制在发送后至少 30 天可用，并在 10 个工作日内处理。
本流程采用更严格的操作标准：收到退订后立即停止，不等待法定上限。

参考：[FTC — CAN-SPAM compliance guide](https://www.ftc.gov/business-guidance/resources/can-spam-act-compliance-guide-business)。

## 7. 节奏与状态

默认最多三次人工触达，且总窗口不超过 21 天：

- Day 0：first touch
- Day 5 business days：follow-up 1
- 再过约 7 天：final close
- 任一 reply、rejection、opt-out、role mismatch、hard bounce 或 delivery failure：立即停止自动计划

`status` 只使用：

- `researching`
- `ready_to_contact`
- `approved_to_send`
- `contacted`
- `follow_up_1`
- `follow_up_2`
- `replied`
- `qualified`
- `disqualified`
- `quoted`
- `sampling`
- `won`
- `lost`
- `do_not_contact`

`qualification` 只使用 `unknown`、`A`、`B`、`C`。定义沿用
[`promotion-plan.md`](../promotion-plan.md) 第 9 节；状态与分级不得混用。

其他受控字段：

- `contact_basis`：`existing_business_relationship`、`business_card`、`referral`、
  `company_published_named_address`、`company_published_role_address`、`other`。
- `platform_eligibility`：`unverified`、`support_approved`、`not_permitted`。
- `tracking_disabled`：`pending`、`yes`、`no`。
- `owner_send_approval`：`no`、`yes`。
- `delivery_status`：`not_sent`、`delivered`、`soft_bounce`、`hard_bounce`、`failed`、`unknown`。

`support_approved` 必须能对应到私有 evidence 目录中的 Brevo 工单结论；不得由 Agent 自行推断。

## 8. 退订、退信与抑制名单

- 任一退订或明确“不要再联系”的请求：立即设置 `opt_out=yes`、`do_not_contact=yes`、
  `status=do_not_contact`，记录 `opt_out_date`，取消全部后续动作。
- 将最小必要字段写入私有 `suppression-list.csv`；不得在 Git 模板中填真实地址。
- hard bounce、地址不存在或持续 delivery failure：停止该地址，并记录 `delivery_status`；
  不用猜测的新邮箱替换后继续发送。
- 每次发送前都检查抑制名单，包括新 Campaign 或同公司重新研究的联系人。
- 抑制记录只用于防止再次联系，不出售、不共享、不用于其他 Campaign。

## 9. 保留期限提案

以下是待所有者批准的内部最小化方案，不代表法律结论：

- 从未回复且未形成业务关系的研究/触达记录：最后一次触达后 6 个月删除或匿名化。
- 已回复并形成询盘的记录：转入已批准的询盘流程，按最后一次实质联系后 24 个月规则处理。
- 退订抑制记录：只保留规范化邮箱、退订日期和必要原因；Outbound 项目运行期间保留，
  每 12 个月复核一次，除非法律顾问或所有者批准更明确期限。
- 删除研究记录时，不删除仍为防止重新联系所必需的最小抑制记录。

未批准此节前，不得开始真实触达。

## 10. 每周复盘

每周五仅记录可核验数据：

- companies researched
- contacts approved / attempted
- delivered / bounced
- replies
- qualified / disqualified
- quoted / sampling / won / lost
- opt-outs
- overdue follow-ups

有跟进积压时不提高下一周数量。访问量、open、click 或平台估算不能替代真实 reply 或人工确认的
qualified opportunity。

## 11. Agent 接手规则

1. 先读本文件、[`us-sportswear-pilot-email.md`](us-sportswear-pilot-email.md) 与空白模板。
2. 真实数据只读写 `%LOCALAPPDATA%\Athletik\outbound\`，不得打印完整邮箱到对话或命令输出。
3. 默认只做研究、去重、草拟和汇总；外部发送必须有当前批次的明确授权。
4. 不得绕过 `blocked` 闸门，不得把 `pending verification` 写成通过。
5. 不得修改 Google Ads、网站、邮箱、Brevo 或 LinkedIn 设置，除非用户另行明确授权。
