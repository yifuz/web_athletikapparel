# 美国 Sportswear Outbound 首轮邮件草案

> 状态：`draft / owner-review-required / no-live-send`
>
> 更新日期：2026-09-28
>
> 适用范围：United States、Sportswear Manufacturer、小批量人工逐封发送
>
> `copy_version`：`us-sportswear-v1-2026-09-28`

本文件只提供首轮邮件结构和审核口径。不得把占位符未替换、事实未核验或没有当前批次批准的
版本直接发送。正文是 Agent 草案，所有者审核后才能使用。

## 1. 适用对象

- 已有 technical sportswear / activewear 产品线的美国中型 B2B 品牌、批发商或进口商。
- 公开产品和商业模式能够合理支持 500 pieces per style 的 MOQ。
- 联系岗位与 sourcing、procurement、product development、production、operations 或
  category management 直接相关。
- 必须有一条来自公司官网或可靠第一方页面的具体 `personalization_evidence`。

不用于低数量 startup、单队 teamwear、零售定制、无明确服装产品线或来源资格未确认的联系人。

## 2. First touch

推荐 Subject：

```text
{{company_name}} — {{relevant_product_line}} manufacturing
```

备选 Subject：

```text
OEM support for {{company_name}}’s {{relevant_product_line}}
```

正文草案：

```text
Hi {{first_name_or_team}},

I noticed {{specific_fit_signal_from_first_party_source}}.

Athletik Clothing supports established sportswear brands with OEM development and production for technical knit garments. We work from a complete tech pack or a reference sample, with a public MOQ of 500 pieces per style.

Would it be relevant to compare capabilities for an upcoming {{product_category}} program? If useful, I can send a concise overview of our development and production process.

Best regards,
Yifu Zhang
Athletik Clothing
info@athletikapparel.com
https://www.athletikapparel.com/sportswear-manufacturer/?utm_source=outbound&utm_medium=email&utm_campaign=us_sportswear_2026q4&utm_content={{anonymous_lead_id}}

Athletik Clothing Inc.
228 Park Avenue S #30327, New York, NY 10003, United States
This is a commercial business outreach message from Athletik Clothing.
If you prefer not to receive further marketing emails from us, reply “unsubscribe”.
```

审核要求：

- `specific_fit_signal` 必须能从记录的第一方 URL 复核；不得只写 “I came across your website”。
- 不写未确认的客户、认证、工厂数量、产能、交期、价格或法律实体分工。
- 首封只放一个匹配落地页链接，不加 PDF、图片或其他附件。
- 不使用 open/click tracking；`utm_content` 只写匿名 `lead_id`。
- 若姓名不确定，使用 `Hi {{company_or_team_name}} team,`，不得猜测。

## 3. Follow-up 1

在 first touch 后约 5 个工作日发送；仅限未回复、未退订、未退信且仍匹配的记录。

```text
Hi {{first_name_or_team}},

Following up on my note about {{company_name}}’s {{relevant_product_line}}. The potential fit I had in mind is {{one_specific_manufacturing_match}}.

If this is outside your role, I would appreciate being directed to the appropriate sourcing or product development contact. If it is not relevant, I will close the loop.

Best regards,
Yifu Zhang
Athletik Clothing
info@athletikapparel.com

Athletik Clothing Inc.
228 Park Avenue S #30327, New York, NY 10003, United States
This is a commercial business outreach message from Athletik Clothing.
If you prefer not to receive further marketing emails from us, reply “unsubscribe”.
```

## 4. Final close

再过约 7 天仍无回复时发送，之后停止；总触达不超过三次或 21 天。

```text
Hi {{first_name_or_team}},

I’ll close the loop after this note. If {{product_category}} manufacturing becomes relevant later, you can reach me at info@athletikapparel.com.

Best regards,
Yifu Zhang
Athletik Clothing

Athletik Clothing Inc.
228 Park Avenue S #30327, New York, NY 10003, United States
This is a commercial business outreach message from Athletik Clothing.
If you prefer not to receive further marketing emails from us, reply “unsubscribe”.
```

## 5. 发送前逐封核对

- [ ] 公司、国家、产品线与 MOQ 匹配。
- [ ] `specific_fit_signal` 与来源 URL 一致。
- [ ] 联系人来源和平台使用资格已人工确认。
- [ ] 抑制名单无匹配。
- [ ] 所有占位符均已替换。
- [ ] 主题、From、Reply-To、显示名、地址与退订说明准确。
- [ ] tracking pixel 和 individualized click tracking 已关闭并复测。
- [ ] `batch_id`、`copy_version` 和 `owner_approval_date` 已写入私有台账。
- [ ] `owner_send_approval=yes`。
- [ ] 本批仍在每周 10–15 家和每家 1–2 联系人的上限内。
