# Privacy Policy 发布前决策表

> 日期：2026-08-04
> 文档对齐日期：2026-08-07
> 状态：内部审核文件，不得作为 Privacy Policy 发布
> 原则：未确认的主体、地址、期限和法律依据继续保留为待确认项。

## 1. 已确认

- 数据控制者：在美国纽约州注册的 `Athletik Clothing Inc.`。
- 同名加拿大公司也由业务方注册，但不作为本网站 Privacy Policy 的数据控制者。
- 数据控制者地址：`228 Park Avenue S #30327, New York, NY 10003, United States`。
- 网站：<https://www.athletikapparel.com/>
- 隐私联系邮箱：`info@athletikapparel.com`
- AdSense：已从生产 Site Kit 断开。
- CMP：Cookiebot，CBID `f81cac53-c468-4afd-9823-7adcc4839c5b`。
- Google Consent Mode：由 Site Kit 统一管理；Cookiebot 自带版本关闭。
- Cookiebot Privacy Trigger：已启用，可修改或撤回同意。

## 2. 数据控制者地址：已确认

公开资料曾存在以下冲突：

- 纽约相关公开资料出现 `228 Park Avenue S`，但邮箱编号同时出现 `#45956` 与
  `#30327`。
- 另有同名加拿大公司公开资料，地址为 Richmond, British Columbia。

业务方于 2026-08-04 确认采用更新地址：
`228 Park Avenue S #30327, New York, NY 10003, United States`。`#45956` 视为旧资料，
不得用于当前 Privacy Policy。

## 3. 已批准的保留期限方案

业务方于 2026-08-04 批准以下内部保留期限方案。Flywheel 日志与备份已按后台截图和
官方文档核对；其他服务商控制的日志、备份、同意记录和 Google Ads 报告仍需按实际账户、
合同和产品政策核对：

| 数据 | 批准方案 | 说明 |
|---|---|---|
| 未成交询盘与表单记录 | 最后一次实质联系后 24 个月 | 覆盖较长的 B2B 采购周期；到期删除或匿名化 |
| 未成交询盘邮件与回复 | 最后一次实质联系后 24 个月 | 与表单记录保持一致 |
| 已成交客户记录 | 按合同、会计和税务义务另行保存 | 不能直接套用未成交询盘期限 |
| GA4 用户与事件数据 | 14 个月，关闭“在新活动时重置” | 支持年度推广比较，同时避免活跃用户期限无限刷新 |
| 浏览器内 UTM/GCLID | 当前标签页会话结束前 | 当前实现使用 `sessionStorage`；提交后进入询盘记录期限 |
| Cookiebot 浏览器同意 Cookie | 最长 12 个月 | Cookiebot 官方说明为浏览器端最长保存期限 |
| Cookiebot 服务端同意记录 | 按证明同意、法律义务或法律请求所必需的期间保存 | 官方文档没有提供可直接设置或统一采用的固定月数；最终表述仍需法律审核 |
| Flywheel Access、PHP Error 与 Slow Log | 7 天 | 官方说明仅可导出最近 7 天 |
| Flywheel 网站和数据库备份 | 30 天 | 每晚自动备份；30 天后永久删除，备份存放于与正式站不同的服务器 |
| Cloudflare 聚合站点流量统计 | 后台最多回溯 30 天 | 当前 Free 套餐后台截图确认；这是统计回溯窗口，不等于所有底层网络数据的统一删除期限 |
| Cloudflare Security Analytics / Security Events | 7 天 / 24 小时 | Free 套餐官方产品期限 |
| Cloudflare DNS Analytics | 8 天 | Free 套餐 zone historical data |
| Cloudflare Turnstile Analytics | 最多 7 天 | Free 套餐官方回溯窗口 |
| Cloudflare Email Routing Activity | 后台查询最多 30 天 | 官方说明的 Activity Log 查询范围 |
| Cloudflare Account Audit Logs | 18 个月 | 记录管理员与系统配置操作，不等同于普通访客流量日志 |
| Brevo 事务邮件日志 | 1 个月 | 已对全部发件人启用自动删除；日志仅用于投递与故障诊断 |
| Brevo 事务邮件正文预览 | 不保存新邮件预览 | 已选择 `Never store previews`；现有测试日志也无法显示正文预览 |
| 其他服务器、安全和诊断日志 | 目标 30 天 | 继续核对尚未确认的服务商实际设置 |
| Google Ads 报告数据 | 按 Google Ads 产品政策披露 | 该期限由 Google 产品控制，不应写成本站可自行删除的期限 |

GA4 标准属性当前可选择 2 个月或 14 个月的数据保留期：
<https://support.google.com/analytics/answer/7667196>

Google Ads 自 2026-06-01 起的报告保留政策：小时/日/周数据 37 个月，月/季/年数据
11 年：<https://support.google.com/google-ads/answer/15188209>

Flywheel 官方说明：Access、PHP Error 和 Slow Log 可导出最近 7 天；网站与数据库每晚
备份并保存 30 天，之后永久删除：

- <https://getflywheel.com/wordpress-support/can-i-view-the-access-logs-and-error-logs/>
- <https://getflywheel.com/wordpress-support/backups-on-flywheel/>

Cloudflare 当前域名后台截图确认 `athletikapparel.com` 使用 Free 套餐、无 Workers 连接，
并显示最长 30 天的聚合站点流量统计入口。其余产品窗口按官方文档核对：

- <https://developers.cloudflare.com/waf/analytics/security-events/>
- <https://developers.cloudflare.com/waf/analytics/security-analytics/>
- <https://developers.cloudflare.com/dns/additional-options/analytics/>
- <https://developers.cloudflare.com/turnstile/plans/>
- <https://developers.cloudflare.com/email-service/observability/logs/>
- <https://developers.cloudflare.com/fundamentals/account/account-security/audit-logs/>

Brevo 官方说明：事务邮件日志默认可能无限期保存，可设置 1 至 24 个月；日志规则会追溯
应用，邮件正文预览的开关只影响保存后的新邮件。当前账户已设置全部发件人日志保留 1 个月，
并选择不保存新邮件预览：

- <https://help.brevo.com/hc/en-us/articles/4415743225746-Configure-a-custom-retention-period-for-your-transactional-logs-and-email-previews>

Cookiebot 会在服务端记录同意，并允许从后台下载 User Consent Log；其浏览器端
`CookieConsent` Cookie 最长保存 12 个月。官方说明没有提供一个可由本站账户选择、或可直接
写入隐私政策的统一服务端日志月数，因此采用“为证明同意、履行法律义务或处理法律请求所必需
的期间”的标准，并保留最终法律审核：

- <https://support.cookiebot.com/hc/en-us/articles/360003782654-Logging-and-demonstration-of-user-consents>
- <https://support.cookiebot.com/hc/en-us/articles/360003782734-Where-can-I-find-the-consent-log>
- <https://support.cookiebot.com/hc/en-us/articles/14455846346652-Data-processed-when-using-Cookiebot-CMP>
- <https://www.cookiebot.com/en/data-processing-agreement/>

## 4. 法律依据候选：必须审核

以下只作为法律审核问题，不直接写入正式政策：

- 回复询盘、评估制造匹配度和准备报价：核对是否采用合同前措施和/或合法利益。
- 网站安全、反垃圾信息和故障诊断：核对合法利益及利益衡量记录。
- 非必要统计和广告测量：以用户同意为前提。
- 合同、会计和税务记录：按适用法律义务确定。

美国、EEA、英国和瑞士访客的权利说明、身份验证步骤和回复期限应由了解目标市场的
负责人或法律顾问审核。

## 5. 发布后仍需确认或复核

- [x] 数据控制者法人注册地：美国纽约州。
- [x] 纽约数据控制者地址：228 Park Avenue S #30327, New York, NY 10003, United States。
- [x] 未成交询盘与邮件保留 24 个月。
- [x] 生产 GA4 的事件数据和用户数据均设置为 14 个月，并关闭“在新活动时重置”；
      2026-08-04 已通过后台截图确认并保存。
- [x] 2026-08-04 通过 Flywheel 后台截图确认每日备份及 `Export Logs` 入口，并通过
      官方文档确认日志为 7 天、备份为 30 天。
- [x] 2026-08-04 通过 Cloudflare 域名后台确认 Free 套餐，并按官方产品文档核对站点流量、
      Security、DNS、Turnstile、Email Routing 与 Account Audit Logs 的可用回溯窗口。
- [ ] Cloudflare 底层 Network Data 的标准式服务商保留表述获得最终法律审核。
- [x] 2026-08-04 将 Brevo 全部发件人的事务邮件日志设置为 1 个月，并保存
      `Never store previews`；超过期限的日志自动删除，新邮件不保存正文预览。
- [x] Brevo 首页显示的 1 个 CRM 联系人已由用户确认是账户本人联系人，不是网站访客、
      客户或询盘记录，因此不写入面向访客的 Privacy Policy。
- [x] 检查现有 Brevo 测试日志：当前规则下没有可显示的邮件正文预览，无需逐条删除日志。
- [x] 用户确认询盘不会额外进入 CRM、Excel、Google Sheets、WhatsApp、其他邮箱或销售
      系统；当前路径限定为 WordPress/Fluent Forms、Brevo、Cloudflare Email Routing 和
      163.com 目标收件箱。
- [x] 核对 Cookiebot 官方同意日志说明：没有需要在账户中设置的固定服务端日志月数；
      浏览器同意 Cookie 最长 12 个月。
- [x] 2026-08-04 通过 Cookiebot 后台截图确认 `User Consent Logging` 已启用，
      `Download User Consent Log` 入口可用；未下载或复制实际访客日志。
- [x] 2026-08-04 根据已确认的数据流和保留设置完成完整英文 Privacy Policy；美国首轮
      公开正文经业务方确认后已部署到生产 WordPress 页面 ID 3，并验证公开访问。
- [ ] 确认 163.com 收件服务的合同主体、处理地区，以及面向 EEA、英国和瑞士访客的
      跨境传输依据；无法确认时，在欧洲推广前更换目标收件箱。
- [x] 2026-08-04 用户确认 Athletik Clothing Inc. 不满足三项主要 CCPA business
      thresholds：适用年度总营收门槛、处理 100,000 名以上加州消费者或家庭的个人信息、
      以及 50% 以上年收入来自出售或共享个人信息。当前初筛不表明公司属于 CCPA covered
      business。
- [ ] 最终法律审核仍需确认不存在因受控实体、合资、合伙或自愿认证产生的 CCPA 适用性，
      并评估其他适用的美国州隐私法。Google Ads 已于 2026-08-05 启动，因此原定的
      “启用前重新筛查”触发点已经到达；扩大转化测量、受众或行为广告前应完成复核。
- [ ] 因公司位于美国但计划主动面向欧洲和英国买家推广，由法律审核判断是否必须指定
      EEA representative 和 UK representative；如适用，在政策中加入其名称和联系方式。
- [ ] 2026-08-04 的批准范围是首轮仅面向美国，但 2026-08-05 实际广告设置包含美国和
      加拿大。需要补充加拿大适用范围复核；EEA、英国和瑞士的代表与跨境事项仍是区域
      启用 Gate，未完成前不得主动向这些地区投放。
- [ ] Cookiebot 服务端同意记录的标准式保留表述获得最终法律审核。
- [ ] 已成交客户记录适用的合同、会计和税务保存期限。
- [x] 2026-08-04 业务方确认英文正文可以发布；此确认作为美国首轮发布批准记录。
      Cookiebot/Cloudflare 标准式表述的独立法律审核仍作为后续建议项保留。

## 6. 完成这些确认后的执行

1. ~~用已确认信息形成完整 `policy-draft.md` 英文审核稿。~~ 已完成。
2. ~~由业务方确认英文正文及发布日期。~~ 已于 2026-08-04 完成；独立法律审核仍建议在
   服务、数据流或推广市场发生变化时进行。
3. ~~更新本地 WordPress Privacy Policy 页面 ID 3，保留单一页面标题 H1 和
   `[cookie_declaration]`。~~ 已完成。
4. ~~发布本地页面并确认页脚 Privacy Policy 链接出现。~~ 已于 2026-08-04 完成，
   随后部署生产并验证。
5. ~~在询盘表单下方加入简短的数据使用提示和 Privacy Policy 链接，不设置必选阅读框。~~
   已部署；如果以后开展邮件营销，再单独评估并提供可选的营销同意。
6. 用全新浏览器持续复查页面、Cookie Declaration、CMP 分类和实际网络请求；
   Google Ads tracker 出现后的部分同意测试仍待完成。
