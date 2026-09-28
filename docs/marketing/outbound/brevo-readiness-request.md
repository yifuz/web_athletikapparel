# Brevo Outbound 发送资格确认与追踪复测

> 状态：`draft / user-action-required`
>
> 更新日期：2026-09-28

本文件用于关闭 Outbound 的两个平台闸门：Brevo 是否允许当前发送场景，以及未知联系人是否已
停止个体 open/click tracking。它不授权真实发送。

## 1. 发给 Brevo Support 的英文确认请求

Subject：

```text
Policy confirmation for low-volume one-to-one U.S. B2B prospecting via SMTP
```

Body：

```text
Hello Brevo Support,

We would like written confirmation before using our Brevo SMTP account for a small, manually researched U.S. B2B prospecting pilot.

The proposed workflow is:

- 10–15 U.S. companies per week;
- one or two individually reviewed business contacts per company;
- one-to-one, manually personalized emails only;
- no purchased, rented, borrowed, shared, guessed, or bulk-scraped lists;
- no Campaigns, Automations, or bulk sequences;
- no individual open or click tracking for recipients without separate tracking consent;
- a valid postal address and a clear reply-to-unsubscribe instruction in every email;
- immediate suppression after an opt-out, rejection, hard bounce, or request to stop.

Some contacts may be identified from a company’s own public website or professional profile. We will not import a list into Brevo unless you explicitly confirm that the source and use are permitted.

Could you please confirm in writing:

1. Whether this one-to-one U.S. B2B prospecting use is permitted through Brevo SMTP.
2. Which contact sources are permitted for this use, including whether a named work address or a role-based business address published by the company may be used.
3. Whether the recipients must be imported into Brevo Contacts and, if so, what proof of eligibility or consent Brevo requires.
4. Which account settings ensure that unknown recipients receive no individual tracking pixel or individualized click tracking through SMTP.
5. Whether Brevo adds List-Unsubscribe headers to these SMTP messages and how reply-based opt-outs should be synchronized with Brevo suppression.

We will not begin the pilot until we receive your confirmation and complete a test-message review.

Best regards,
Yifu Zhang
Athletik Clothing
info@athletikapparel.com
```

## 2. 保存证据

收到回复后：

- 将完整回复保存到 Git 之外的 `%LOCALAPPDATA%\Athletik\outbound\evidence\`。
- Git 文档只记录回复日期、工单号、结论和允许/禁止的来源类别，不复制联系人或账号敏感信息。
- Brevo 未明确回答某一来源时，该来源继续标记 `platform_eligibility=unverified`。

## 3. 追踪关闭与复测

当前 Brevo 官方文档说明，默认会在邮件中加入 open tracking pixel，并对链接做个体 click tracking；
SMTP/API 的发送渠道不会改变商业邮件的性质。执行人应在 Brevo 账户中启用 per-contact tracking
consent，并把 unknown contacts 的默认行为设置为不追踪。该设置会影响多个发送渠道，必须由所有者
确认后操作。

操作后向未参与配置的 Gmail 测试地址发送一封与首封邮件相同结构的测试邮件，然后检查：

- SPF、DKIM、DMARC 均 PASS。
- `From`、`Reply-To`、显示名和 Message-ID 正确。
- TLS 正常。
- 正文可见邮寄地址、commercial outreach 说明和 reply-to-opt-out。
- 原始 HTML 不含用于个体 open tracking 的不可见 pixel。
- 正文落地页 URL 没有被改写成 individualized click-tracking URL。
- List-Unsubscribe 头存在与否按实际记录；它不能替代正文可见退订方式。

复测结果只记录“通过/失败”和日期；测试收件地址、Message-ID、token、完整 header 和原始 HTML
不得提交到 Git。

参考：

- [Brevo — Email tracking pixels](https://help.brevo.com/hc/en-us/articles/37114679474706-About-email-tracking-pixels-and-the-CNIL-recommendation-in-Brevo)
- [Google — Email sender guidelines](https://support.google.com/mail/answer/81126?hl=en)
