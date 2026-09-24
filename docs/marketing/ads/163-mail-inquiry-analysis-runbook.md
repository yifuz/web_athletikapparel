# 163 邮箱询盘只读分析操作手册

> 建立日期：2026-09-24
> 邮箱类型：普通 `@163.com` 邮箱
> 状态：本机工具已实现，等待所有者在本机输入客户端授权码并完成首次采集
> 用途：补齐 Promotion P0 的人工询盘数量与质量证据，不修改 Google Ads 或邮箱内容

## 1. 能做什么

本工具通过 `imap.163.com:993` 和 SSL 只读访问 `INBOX`，生成最近 30 个完整自然日与
此前 30 个完整自然日的询盘候选快照。窗口采用 Google Ads 账户时区
`America/New_York`，并排除报告生成当天，以便与 Google Ads API 快照直接对照。

输出包括：

- 收到邮件、询盘候选、推销/垃圾候选和待人工复核数量；
- 邮件中明确出现的数量及其相对 MOQ 500 的信号；
- 明确出现的产品和国家词；
- 发件人是否明确自述来自 Google；
- 无法解析的邮件数量与数据边界。

自动分类不是最终销售判断。`inquiry_candidate` 只代表邮件符合规则，需要人工确认后才能写成
合格、不合格、已报价、打样、成交或流失。

## 2. 隐私与只读边界

- 使用163“客户端授权码”，不使用网页登录密码。
- 授权码通过 Windows DPAPI 按当前用户加密，保存在
  `%LOCALAPPDATA%\Athletik\mail-intake\secret.dpapi`。
- 邮箱地址、配置、CSV 和报告全部位于 `%LOCALAPPDATA%\Athletik\mail-intake\`，不进入 Git。
- IMAP 以 `readonly=True` 打开 `INBOX`，读取命令使用 `BODY.PEEK[]`，不会主动标记已读。
- 不发送、删除、移动、归档邮件，不读取或保存附件。
- 不保存原始邮件正文、完整发件地址或主题；CSV 只保存哈希 ID、发件域名和抽取字段。
- 首版不读取 Sent，因此“是否回复、报价、打样、成交或流失”仍需人工确认。

## 3. 首次连接

先在163网页版邮箱中开启 `IMAP/SMTP`，并生成一个客户端授权码。不要把授权码发到聊天、文档
或 Git。

在项目根目录的 PowerShell 7 运行：

```powershell
.\scripts\marketing\email_intake\setup-163.ps1
```

脚本会在本机依次询问完整邮箱地址和客户端授权码，然后只验证登录与只读打开 `INBOX`，不会
抓取邮件。验证通过后运行首次分析：

```powershell
py -3 .\scripts\marketing\email_intake\analyze_163.py analyze
```

结果目录：

```text
%LOCALAPPDATA%\Athletik\mail-intake\output\
├── latest-report.md
├── latest-summary.json
└── latest-records.csv
```

## 4. 每日自动运行

首次手动分析成功后，可创建当前 Windows 用户的每日计划任务，默认每天 09:00 执行：

```powershell
.\scripts\marketing\email_intake\install-daily-task.ps1
```

如需修改时间：

```powershell
.\scripts\marketing\email_intake\install-daily-task.ps1 -At '10:30'
```

计划任务名称为 `Athletik 163 Mail Inquiry Analysis`。脚本每次重建最近两个完整 30 天窗口，
不会在项目仓库或线上网站写入数据。

## 5. 归因边界

邮件内容能够补齐真实询盘数量与质量，但不能单独证明询盘由 Google Ads 带来：

- 只有发件人明确写明通过 Google 找到 Athletik 时，才记录 `self_reported_google`。
- “通过网站找到”只记录 `self_reported_web_unspecified`。
- 没有明确来源的邮件一律记录 `unknown`。
- 邮件日期与广告点击日期接近不构成因果归因。
- 如以后需要广告级归因，应在网站或 CRM 保存 UTM/GCLID；本阶段不启用 `mailto` 点击转化。

## 6. 当前证据缺口

- 尚未完成邮箱授权与首次 60 天采集。
- 规则分类尚未用真实样本校准，首次结果必须人工抽查。
- 首版未读取 Sent，销售阶段和回复状态为 `unavailable`。
- 邮件未明确说明来源时，Google Ads 来源保持 `unknown`，不能按比例推算。
