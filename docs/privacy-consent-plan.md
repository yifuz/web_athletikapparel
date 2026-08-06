# Privacy Policy、CMP 与 Consent Mode v2 实施方案

> 版本：1.1
> 日期：2026-08-04
> 状态：美国首轮隐私政策、Cookiebot、CMP 与 Consent Mode 已完成生产部署和验证；欧洲推广前补充对应法律输入
> 适用站点：<https://www.athletikapparel.com/>

本文档把 Privacy Policy、CMP 和 Google Consent Mode v2 作为一个统一工作流管理，
但保留三个独立交付物和验收点。这样可以保证网站实际收集的数据、用户看到的告知内容、
同意按钮以及 Google 标签收到的状态一致。

本文档是技术实施清单，不是法律意见。最终隐私文本、法律依据、保留期限和跨境传输说明
应由熟悉目标市场要求的专业人员审核。

## 1. 当前审计结论

### 生产站

- 页面 Sitemap 当前包含 12 个公开页面；`/privacy-policy/` 返回 404。
- 首页加载 Google Site Kit 提供的 Google tag。
- 首页加载 AdSense JavaScript，但没有检测到广告单元或 `adsbygoogle.push()` 调用。
- 没有检测到常见 CMP、WP Consent API 或 Site Kit Consent Mode 代码。
- 页脚没有 Privacy Policy 链接，也没有重新打开同意设置的入口。
- 2026-08-04 保存 Cookiebot 横幅配置后复查生产首页，以上三项生产状态尚未改变：
  Cookiebot、WP Consent API 和 Site Kit Consent Mode 仍未输出，AdSense 请求仍存在。
- 2026-08-04 随后从生产 Site Kit 断开 AdSense；未登录、绕缓存复查确认
  `adsbygoogle.js` 和相关 `pagead2.googlesyndication.com` 引用均已移除。

### 本地站

- WordPress 已把页面 ID 3 指定为 Privacy Policy；美国首轮结构化版本已于 2026-08-04
  部署生产并验证公开访问。
- 旧 WordPress 通用模板已经替换，不再包含 Comments、Media 等与本站实际用途不匹配的
  通用章节。
- 本地原有 Fluent Forms、FluentSMTP 和 Rank Math；本轮已增加 WP Consent API 与
  Cookiebot。Site Kit 仍只在生产站使用。
- Fluent Forms 提交记录除表单字段外，还保存来源 URL、浏览器、设备和 IP 地址。
- 自定义归因脚本使用当前标签页的 `sessionStorage` 保存 UTM、GCLID、首次落地页和原始
  Referrer；2026-08-03 已改为仅在 WP Consent API 的 `marketing` 类别获准时写入。

实施更新：WP Consent API 2.0.1 与 Cookiebot 4.7.2 已在本地安装并启用。2026-08-04
已配置 CBID `f81cac53-c468-4afd-9823-7adcc4839c5b` 和 Auto blocking；Cookiebot
自带 Google Consent Mode 保持关闭，避免以后与 Site Kit 重复控制。

## 2. 推荐架构

```text
访客
  └─ Cookiebot 同意横幅
       ├─ Privacy Policy / Cookie Declaration
       ├─ WP Consent API（统一传递 statistics / marketing 状态）
       │    └─ Site Kit（唯一的 Google Consent Mode 管理者）
       │         └─ GA4 / Google Ads
       └─ 自定义来源归因脚本（按最终批准的同意类别启停）
```

采用以下职责边界：

1. **Privacy Policy** 解释实际收集什么数据、为何收集、发送给谁、保留多久以及用户权利。
2. **Cookiebot CMP** 展示同意界面、记录选择、提供拒绝和重新设置入口。
3. **WP Consent API** 在 WordPress 插件之间统一传递同意类别。
4. **Site Kit** 作为 Google Consent Mode v2 的唯一控制方。
5. **自定义归因代码** 单独读取同意状态；Consent Mode 不会自动管理本站写入的
   `sessionStorage`。

不要同时启用 Site Kit 和 CMP 各自的 Google Consent Mode 功能。Google 的 Site Kit
文档明确提示两套实现可能冲突；本项目让 Cookiebot 负责横幅和同意状态，Site Kit 负责
Google 标签。

## 3. CMP 选择

### 推荐：Cookiebot CMP

选择理由：

- 原生支持 WordPress，并在 Site Kit 官方兼容 CMP 列表中。
- Cookiebot 是 Google 认证 CMP，也是 IAB TCF CMP。
- 免费档支持 1 个域名和最多 50 个子页面；当前生产站只有 12 个 Sitemap 页面，新增
  隐私页后仍有明显余量。
- 当前公开价格显示 Premium 从每个域名每月 USD 8 起；如果免费档满足实际扫描页面数和
  所需地区规则，首轮无需增加固定支出。

使用免费档前仍要注意：

- 以 Cookiebot 扫描结果而不是 WordPress Sitemap 数量作为最终计费判断。
- 免费档只保留一个域名和一种法规配置，不包含本地/测试域名；本地验证需要利用试用期、
  临时测试方式，或直接在生产发布窗口完成受控验证。
- 免费档功能和价格可能变化，创建账户后要再次核对 IAB TCF、同意日志、扫描结果和
  地区配置是否满足本站需要。

### 暂不首选的方案

- **CookieYes 免费档：**支持 Consent Mode v2，但其当前价格表显示 IAB TCF v2.3
  不在免费档和 Basic 档内。如果保留 AdSense 并向 EEA、英国或瑞士用户提供个性化广告，
  低价档不匹配当前需求。
- **Complianz：**可与 Site Kit 配合，也是 Google 认证 CMP；但其 TCF 配置需要付费版，
  对当前低预算验证阶段没有明显优势。
- **自定义主题横幅：**不采用。它需要自行维护同意日志、脚本阻断、地区规则、撤回同意和
  Google/IAB 协议变化，风险和长期维护成本均高于成熟 CMP。

## 4. AdSense：已确认关闭

生产首页目前只检测到 AdSense 脚本，没有广告单元调用。本站的业务目标是获取 OEM 询盘，
不是依靠展示广告变现。用户已于 2026-08-03 确认关闭 AdSense；生产实施时应从 Site Kit
断开 AdSense 或关闭 Site Kit 放置的 AdSense 代码，并验证前端不再请求 AdSense 脚本。

这样做的收益包括：

- 避免展示广告干扰 B2B 询盘转化。
- 减少第三方请求和前端开销。
- 简化 Cookie Declaration 和数据接收方清单。
- 降低为发布商个性化广告实施 Google 认证 IAB TCF CMP 的额外复杂度。

如果以后重新启用 AdSense，必须重新审核 CMP 与 IAB TCF 配置。Google 明确要求
AdSense 等发布商产品在向 EEA、英国和瑞士用户提供个性化广告时使用 Google 认证且
接入 IAB TCF 的 CMP。

## 5. 当前数据与服务清单

| 数据或服务 | 当前用途 | 建议处理 | Policy/CMP 状态 |
|---|---|---|---|
| 联系人姓名、邮箱、公司、国家、网址 | 回复 OEM 询盘和评估匹配度 | 表单提交时收集 | 必须披露 |
| 产品品类、订单数量、客户类型、项目说明 | 询盘筛选与报价准备 | 表单提交时收集 | 必须披露 |
| IP、浏览器、设备、来源 URL | Fluent Forms 记录与安全/诊断 | 确认必要性与保留期限 | 必须披露 |
| UTM、GCLID、首次落地页、Referrer | 广告与询盘来源归因 | 按批准的 statistics/marketing 同意规则启停 | 尚待接入 CMP |
| GA4 / Google tag | 网站测量和转化事件 | 由 Site Kit Consent Mode 控制 | 尚待配置 |
| Google Ads | 搜索广告与询盘转化 | 由 Site Kit Consent Mode 控制 | 尚待账户关联 |
| AdSense | 展示广告发布商产品 | 已从生产 Site Kit 断开并验证脚本已移除 | 已完成 |
| FluentSMTP / Brevo | 发送询盘通知邮件 | 日志 1 个月且不保存新邮件预览；账户主体与处理地区仍需最终核对 | 必须披露 |
| 163.com 邮箱服务 | 接收 Cloudflare Email Routing 转发的询盘通知 | 服务商法律主体与处理地区仍需最终核对 | 必须披露 |
| Flywheel 托管 | 网站和数据库托管 | 确认正式合同主体与区域 | 必须披露 |
| Cloudflare | DNS、流量与邮件路由 | 确认启用的具体服务 | 必须披露 |
| 外部 Google Fonts | 字体加载 | 评估改为本地托管以减少第三方请求 | 待处理 |
| Instagram、YouTube、WhatsApp | 用户主动点击的外部链接 | 在 Policy 中说明离站后适用第三方政策 | 建议披露 |

## 6. Privacy Policy 交付结构

正式页面使用英文，并保留一个 H1。当前阶段只确定结构和待确认信息，不替业务方编写或
虚构法律事实。

1. `Who We Are`
   - Data controller: `Athletik Clothing Inc.`
   - Address: `228 Park Avenue S #30327, New York, NY 10003, United States`
   - Privacy contact: `info@athletikapparel.com`
2. `Information We Collect`
   - 询盘表单字段。
   - 技术数据：IP、浏览器、设备、来源 URL。
   - 测量和归因数据：GA4、UTM、GCLID、首次落地页、Referrer。
3. `How We Use Information`
   - 回复询盘、评估制造匹配度、准备报价、维护网站安全、测量推广效果。
   - `【NEEDS INPUT: approved legal basis for each purpose】`
4. `Cookies and Similar Technologies`
   - Cookiebot Cookie Declaration。
   - statistics / marketing 类别及撤回同意入口。
5. `How We Share Information`
   - 实际服务范围已确认：WordPress/Fluent Forms、Flywheel、Brevo、Cloudflare Email
     Routing、163.com 目标收件箱、Google 与 Cookiebot。
   - `【NEEDS INPUT: final legal entities for the service providers】`
6. `International Data Transfers`
   - `【NEEDS INPUT: hosting, email and Google processing regions/safeguards】`
7. `Data Retention`
   - 未成交询盘和相关邮件：最后一次实质联系后 24 个月。
   - GA4：14 个月，关闭“在新活动时重置”。
   - Flywheel Access、PHP Error 与 Slow Log：7 天。
   - Flywheel 网站和数据库备份：每晚生成，保留 30 天后永久删除。
   - Cloudflare Free 套餐：聚合站点流量统计最多回溯 30 天；Security Analytics 7 天；
     Security Events 24 小时；DNS Analytics 8 天；Turnstile Analytics 7 天；
     Email Routing Activity 最多查询 30 天。
   - Cloudflare Account Audit Logs：18 个月，仅用于管理员和系统配置操作审计。
   - Cloudflare 上述期限属于产品访问或回溯窗口，不代表所有底层 Network Data 的统一
     删除期限；最终服务商表述仍需法律审核。
   - Brevo 事务邮件日志：全部发件人保留 1 个月后自动删除。
   - Brevo 事务邮件正文预览：新邮件不保存；现有测试日志也没有可显示的正文预览。
   - 其他服务器、安全和诊断日志：目标 30 天，发布前核对服务商实际设置。
   - Cookiebot 浏览器同意 Cookie：最长 12 个月。
   - Cookiebot 服务端同意记录：官方文档没有固定账户月数；按证明同意、法律义务或
     法律请求所必需的期间保存，最终表述仍需法律审核。
8. `Your Privacy Rights`
   - `【NEEDS INPUT: approved rights and request procedure by target market】`
9. `Security`
   - `【NEEDS INPUT: approved operational description】`
10. `Changes to This Policy`
11. `Contact Us`
12. `Last Updated: 【NEEDS INPUT: publication date】`

表单下方应提供简短的数据使用提示和 Privacy Policy 链接，不要求访客勾选已经阅读；
如以后开展邮件营销，应另设独立且可选的营销同意，不与提交询盘捆绑。

## 7. 实施顺序和验收门

### Gate A：业务与法律信息确认

- [x] 确认数据控制者法律实体：Athletik Clothing Inc.
- [x] 确认隐私联系邮箱：`info@athletikapparel.com`。
- [x] 确认 Athletik Clothing Inc. 的注册地址：
      `228 Park Avenue S #30327, New York, NY 10003, United States`。
- [x] 从生产 Site Kit 断开 AdSense，并验证前端脚本及预连接引用均已移除。
- [x] 批准未成交询盘和邮件保留 24 个月；GA4 保留 14 个月并关闭活动重置；
      服务器、安全和诊断日志目标为 30 天。
- [x] 核对生产 GA4：事件数据和用户数据均为 14 个月，活动重置关闭。
- [x] 核对 Cookiebot 官方同意日志说明：浏览器 Cookie 最长 12 个月；没有需要在账户中
      设置的固定服务端同意日志月数。
- [x] 通过生产 Cookiebot 后台确认 `User Consent Logging` 和
      `Download User Consent Log` 入口可用；验证过程未下载实际访客日志。
- [x] 通过 Flywheel 后台与官方文档确认 Access、PHP Error、Slow Log 为 7 天，
      网站和数据库备份为 30 天。
- [x] 通过 Cloudflare 域名后台确认 Free 套餐，并按官方文档核对站点流量、Security、
      DNS、Turnstile、Email Routing 与 Account Audit Logs 的可用回溯窗口。
- [x] 将 Brevo 全部发件人的事务邮件日志设置为 1 个月，并启用
      `Never store previews` 后保存成功。
- [x] 确认 Brevo 首页 1 个 CRM 联系人为账户本人联系人，不是网站访客、客户或询盘记录。
- [x] 检查 Brevo 现有测试日志，确认当前规则下没有可显示的邮件正文预览。
- [x] 确认没有其他 CRM、表格、WhatsApp、邮箱或销售系统接收或保存网站询盘。
- [ ] 审核 Cookiebot 和 Cloudflare 的标准式服务商保留表述。
- [ ] 核对 Flywheel、Cloudflare、Brevo 和 Google 的实际账户/服务范围。
- [x] 2026-08-04 业务方确认美国首轮 Privacy Policy 正文可以发布；独立法律审核仍建议
      在服务、数据流或推广市场变化时进行。

### Gate B：CMP 和页面实施

- [x] 使用 `zhangyifuzjg@gmail.com` 创建 Cookiebot 账户，只添加正式域名
      `www.athletikapparel.com`。
- [x] 2026-08-04 完成首次扫描；当前列表显示 7 个 tracker，全部已归入
      Statistics 或 Necessary，没有 Unclassified 项目。
- [ ] 在扫描报告中确认实际扫描页数，并据此确认试用期结束后的所需套餐。
- [x] 在本地安装并启用 WP Consent API 2.0.1。
- [x] 在生产站安装并启用 WP Consent API 2.0.1；公开页面复查确认前端脚本已输出。
- [x] 在本地安装并启用 Cookiebot WordPress 插件 4.7.2。
- [x] 在本地关闭 Cookiebot 自带 Google Consent Mode，保留 Site Kit 为唯一控制方。
- [x] 使用 CBID `f81cac53-c468-4afd-9823-7adcc4839c5b` 连接本地 Cookiebot，
      启用横幅和 Auto blocking。
- [x] 在 Cookiebot Admin 保存全访客 Explicit Consent、非必要类别默认关闭、英文内容、
      无关闭图标和启用浮动 Privacy Trigger 的横幅配置。
- [x] 在生产站安装并连接 Cookiebot；公开页面验证 CBID、Auto blocking 和
      WP Consent API 均只加载一次，Cookiebot 自带 Consent Mode 输出为 0。
- [x] 将 WordPress Privacy Policy 页面 ID 3 替换为结构化美国首轮版本。
- [x] 2026-08-04 完成版本控制源文件中的完整英文正文，经业务方确认后部署到生产
      WordPress 页面 ID 3，并验证公开访问。
- [x] 在页脚加入发布状态感知的 Privacy Policy 链接；已在生产环境验证自动显示。
- [x] 在页脚增加 `Cookie Settings` 入口，通过 `Cookiebot.renew()` 重新打开设置。
- [x] 在两处 Fluent Forms 询盘表单后增加发布状态感知的 Privacy Policy 提示链接；
      页面仍为草稿时不显示，不增加必选阅读框。

### Gate C：Consent Mode 与自定义代码

- [x] 在生产 Site Kit 中启用 Consent Mode；公开源码确认仅输出一份默认拒绝配置。
- [x] 生产 Cookiebot 自带的第二套 Google Consent Mode 控制已关闭并通过源码验证。
- [x] 通过全新浏览器配置验证 Reject all 与 Allow all：Cookiebot、WP Consent API 和
      Site Kit 的 statistics / marketing 状态及 consent update 均正确。
- [x] 通过生产 Privacy Trigger 重新打开同意控制，并验证 Allow all 后撤回同意会将
      Preferences、Statistics、Marketing 及对应 WP Consent API 状态恢复为 false。
- [ ] 当前 Preferences 与 Marketing tracker 数量为 0；接入 Google Ads 并重新扫描后，
      验证只允许 Statistics、拒绝 Marketing 的部分同意。
- [x] 将来源归因脚本归入 `marketing` 类别；未同意时不写入，拒绝或撤回时删除
      `sessionStorage` 和表单隐藏字段。
- [ ] 确认 `generate_lead` 在拒绝和接受两种状态下的 Google 标签行为符合批准方案。

### Gate D：发布验证

- [x] 使用全新无 Cookie Chrome 配置验证：首页桌面端显示底部 Bar；390px 移动视口
      显示响应式 Dialog，左右留白、按钮宽度和横向溢出均正常。
- [x] 未选择前 Cookiebot 与 WP Consent API 的 statistics / marketing 为 false，
      Site Kit 默认 consent 状态先于后续 update 生效。
- [x] Reject all 与 Allow all 正确更新 `analytics_storage`、`ad_storage`、
      `ad_user_data` 和 `ad_personalization` 四种信号。
- [x] 浮动 Privacy Trigger 已上线；重新打开设置与撤回全部非必要同意已经验证。
- [ ] Google Ads 接入并产生 Marketing tracker 后验证部分接受。
- [ ] 拒绝后刷新和跨页面访问不会重新授予同意。
- [ ] Privacy Policy、Cookie Declaration、横幅分类和实际网络请求一致。
- [ ] 用 Google Tag Assistant 和浏览器 Network/Application 面板保存测试证据。
- [ ] 验证 Contact 表单、询盘通知和来源字段仍能正常工作。
- [x] 当前生产页脚尚无 Cookie Settings；浮动 Privacy Trigger 已启用并验证，可供访客
      修改或撤回同意。主题页脚入口部署前保持启用。

## 8. 用户确认记录与剩余输入

### 已确认（2026-08-03）

1. Privacy Policy 数据控制者：**Athletik Clothing Inc.**
2. 隐私联系邮箱：`info@athletikapparel.com`
3. 生产站关闭 AdSense。
4. Cookiebot 账户邮箱：`zhangyifuzjg@gmail.com`
5. 本网站以美国纽约州注册的 Athletik Clothing Inc. 为数据控制者；同名加拿大公司不作为
   本站 Privacy Policy 的控制者。
6. 数据控制者地址：`228 Park Avenue S #30327, New York, NY 10003, United States`。
7. 未成交询盘和邮件保留 24 个月；GA4 保留 14 个月且关闭活动重置；服务器、安全和
   诊断日志目标为 30 天。

### 仍需确认

1. Cookiebot 与 Cloudflare 的标准式服务商保留表述。
2. Cookiebot/Cloudflare 标准式表述的独立法律复核（不阻塞已获业务批准的美国首轮版本）。

本地审核草稿的版本控制源文件见 [`privacy-policy-draft.md`](privacy-policy-draft.md)。
发布前主体、地址和保留期限决策见 [`privacy-policy-decisions.md`](privacy-policy-decisions.md)。
生产配置的逐项操作见 [`consent-deployment-runbook.md`](consent-deployment-runbook.md)。

## 9. 官方参考

- [Site Kit Consent Mode 文档](https://sitekit.withgoogle.com/documentation/using-site-kit/consent-mode/)
- [Google AdSense 对认证 CMP 和 IAB TCF 的要求](https://support.google.com/adsense/answer/13554116?hl=en)
- [Google Consent Mode 的同意类型](https://support.google.com/analytics/answer/12334711?hl=en)
- [Google Tag Manager Consent Mode 设置](https://support.google.com/tagmanager/answer/10000067?hl=en)
- [Cookiebot WordPress 与价格说明](https://www.cookiebot.com/en/new-wp-cookie-plugin/)
- [Cookiebot TCF 说明](https://support.cookiebot.com/hc/en-us/articles/360007652694-Cookiebot-CMP-and-the-Transparency-and-Consent-Framework-TCF)
- [Cookiebot 同意记录与举证说明](https://support.cookiebot.com/hc/en-us/articles/360003782654-Logging-and-demonstration-of-user-consents)
- [Cookiebot 用户同意日志下载位置](https://support.cookiebot.com/hc/en-us/articles/360003782734-Where-can-I-find-the-consent-log)
- [Flywheel 日志导出与 7 天期限](https://getflywheel.com/wordpress-support/can-i-view-the-access-logs-and-error-logs/)
- [Flywheel 备份与 30 天期限](https://getflywheel.com/wordpress-support/backups-on-flywheel/)
- [Cloudflare Security Events 与 Security Analytics 期限](https://developers.cloudflare.com/waf/analytics/security-events/)
- [Cloudflare DNS Analytics 期限](https://developers.cloudflare.com/dns/additional-options/analytics/)
- [Cloudflare Turnstile 套餐与回溯期限](https://developers.cloudflare.com/turnstile/plans/)
- [Cloudflare Email Routing Activity Log](https://developers.cloudflare.com/email-service/observability/logs/)
- [Cloudflare Account Audit Logs 期限](https://developers.cloudflare.com/fundamentals/account/account-security/audit-logs/)
- [Brevo 事务邮件日志与预览保留规则](https://help.brevo.com/hc/en-us/articles/4415743225746-Configure-a-custom-retention-period-for-your-transactional-logs-and-email-previews)
