# 163 邮箱询盘只读分析操作手册

> 建立日期：2026-09-24
> 邮箱类型：普通 `@163.com` 邮箱
> 状态：本机工具、完整文件夹范围重跑与首轮内容级校准已完成；每日计划任务未启用
> 用途：补齐 Promotion P0 的人工询盘数量与质量证据，不修改 Google Ads 或邮箱内容
> Agent 入口：项目根目录下的 `scripts/marketing/email_intake/`

## 1. 能做什么

本工具通过 `imap.163.com:993` 和 SSL 只读访问 `INBOX`，并自动发现服务器以 SPECIAL-USE
标记的 Junk/Spam 和 Trash，生成最近 30 个完整自然日与
此前 30 个完整自然日的询盘候选快照。窗口采用 Google Ads 账户时区
`America/New_York`，并排除报告生成当天，以便与 Google Ads API 快照直接对照。
连接器在认证后发送 Coremail 声明支持的 RFC 2971 `ID` 握手，再以 `EXAMINE` 打开
各目标文件夹；缺少该握手时，163 会返回 `Unsafe Login` 并拒绝打开邮箱。

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
- IMAP 以 `readonly=True` 打开 `INBOX`、Junk/Spam 和 Trash，读取命令使用 `BODY.PEEK[]`，
  不会主动标记已读；同一 Message-ID 跨文件夹只计一次。
- 不发送、删除、移动、归档邮件，不读取或保存附件。
- 不保存原始邮件正文、完整发件地址或主题；CSV 只保存哈希 ID、发件域名和抽取字段。
- 首版不读取 Sent，因此“是否回复、报价、打样、成交或流失”仍需人工确认。

## 3. Agent 接手与获取步骤

### 3.1 触发条件

- 邮箱由所有者自主推进。除非所有者在当前对话中明确要求读取或分析，否则 Agent 不主动连接邮箱。
- 当前授权范围只包括只读 `INBOX + Junk/Spam + Trash`，不包括 Sent、附件、发送、删除、移动、
  归档、改已读状态或修改邮箱设置。
- 不要求所有者在聊天中发送邮箱地址、客户端授权码、网页登录密码或 DPAPI 文件。
- 不将真实联系人、完整发件地址、主题、正文或附件写入 Git。

### 3.2 标准运行流程

未来 Agent 从项目根目录使用 PowerShell 7 执行以下步骤：

```powershell
$repoRoot = (git rev-parse --show-toplevel).Trim()
Set-Location -LiteralPath $repoRoot

$mailAppDir = Join-Path ([Environment]::GetFolderPath('LocalApplicationData')) 'Athletik\mail-intake'
$mailConfigPath = Join-Path $mailAppDir 'config.json'
$mailSecretPath = Join-Path $mailAppDir 'secret.dpapi'

if (-not (Test-Path -LiteralPath $mailConfigPath)) {
    throw '缺少本机邮箱配置；请由所有者运行 setup-163.ps1。'
}
if (-not (Test-Path -LiteralPath $mailSecretPath)) {
    throw '缺少本机 DPAPI 授权码；请由所有者运行 setup-163.ps1。'
}

py -3 .\scripts\marketing\email_intake\analyze_163.py check
if ($LASTEXITCODE -ne 0) {
    throw '163 邮箱只读连接检查失败；停止分析，不要反复尝试授权码。'
}

py -3 .\scripts\marketing\email_intake\analyze_163.py analyze
if ($LASTEXITCODE -ne 0) {
    throw '163 邮箱只读分析失败。'
}
```

`check` 只验证登录、Coremail `ID` 握手和只读打开三个目标角色，不抓取邮件。`analyze` 默认以
运行当天为 `as-of`，生成“最近 30 个完整自然日”和“此前 30 个完整自然日”，不包含当天。
如任务要求复现指定日期，可显式运行：

```powershell
py -3 .\scripts\marketing\email_intake\analyze_163.py analyze --as-of 2026-09-28
```

不要在日常运行中硬编码旧日期。指定 `--as-of` 后，该日期本身仍被排除。

### 3.3 读取脱敏输出

分析完成后，只读取仓库外的脱敏结果：

```powershell
$mailOutputDir = Join-Path $mailAppDir 'output'
Get-Content -LiteralPath (Join-Path $mailOutputDir 'latest-summary.json') -Raw -Encoding UTF8
Get-Content -LiteralPath (Join-Path $mailOutputDir 'latest-report.md') -Raw -Encoding UTF8
Import-Csv -LiteralPath (Join-Path $mailOutputDir 'latest-records.csv')
```

Agent 在报告结论前必须检查：

- `mailbox_roles_missing` 为空；否则缺失文件夹的数据记为 `unavailable`，不能记为 0。
- `parse_gaps = 0`；否则明确报告解析缺口。
- `windows` 中的开始和结束日期与请求窗口一致。
- `latest-records.csv` 只包含哈希 ID、发件域名和抽取字段，不能把规则候选直接写成合格询盘。
- `latest-reviewed-records.csv` 是 2026-09-24 首轮人工复核台账，不由 `analyze` 自动覆盖，也不能
  被当成以后新邮件的最新人工状态。

每次 `analyze` 会重建 `latest-report.md`、`latest-summary.json` 和 `latest-records.csv`。原始邮件
正文只在内存中用于解析，不保存到输出目录。运行完成后，Agent 只汇报聚合数、证据缺口和明确
获准的业务结论；未经额外授权不读取 Sent 或附件。

### 3.4 配置缺失或失效

如果配置文件不存在、DPAPI 解密失败或163客户端授权码失效，停止运行，并请所有者在同一
Windows 用户下亲自执行下节的交互式初始化。DPAPI 文件只对创建它的 Windows 用户有效；
Agent 不应输出、复制、解密展示或提交 `config.json` / `secret.dpapi`。

## 4. 首次连接或凭据失效

先在163网页版邮箱中开启 `IMAP/SMTP`，并生成一个客户端授权码。不要把授权码发到聊天、文档
或 Git。

在项目根目录的 PowerShell 7 运行：

```powershell
.\scripts\marketing\email_intake\setup-163.ps1
```

脚本会在本机依次询问完整邮箱地址和客户端授权码，然后只验证登录与只读打开 `INBOX`、
Junk/Spam 和 Trash，不会抓取邮件。验证通过后运行首次分析：

```powershell
py -3 .\scripts\marketing\email_intake\analyze_163.py analyze
```

结果目录：

```text
%LOCALAPPDATA%\Athletik\mail-intake\output\
├── latest-report.md
├── latest-summary.json
├── latest-records.csv
└── latest-reviewed-records.csv  # 首轮人工复核台账；不由每次自动分析覆盖
```

## 5. 每日自动运行

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

## 6. 归因边界

邮件内容能够补齐真实询盘数量与质量，但不能单独证明询盘由 Google Ads 带来：

- 只有发件人明确写明通过 Google 找到 Athletik 时，才记录 `self_reported_google`。
- “通过网站找到”只记录 `self_reported_web_unspecified`。
- 没有明确来源的邮件一律记录 `unknown`。
- 邮件日期与广告点击日期接近不构成因果归因。
- 如以后需要广告级归因，应在网站或 CRM 保存 UTM/GCLID；本阶段不启用 `mailto` 点击转化。

## 7. 当前证据缺口

- 完整 60 天窗口已覆盖 `INBOX + Junk/Spam + Trash`，详见
  [`163 邮箱询盘确认快照（2026-09-24）`](163-mail-inquiry-snapshot-2026-09-24.md)。三个目标角色
  全部读取成功，缺失角色与解析失败均为 0。
- 最近窗口 20 封邮件已逐封完成内容级复核，并用于校准规则：5 封真实询盘、15 封非询盘；
  校准后的自动规则也识别出同一组 5 封候选，没有发现真实询盘漏判。
- 真实询盘中 4 封位于 `INBOX`、1 封位于 Junk/Spam；垃圾箱必须纳入，但不能将垃圾箱邮件
  直接视为询盘。
- 1 封真实询盘自述来自一般网络渠道但未指明 Google，其余 4 封来源未知；0 封可以归因给
  Google Ads。
- 工具不读取 Sent，销售阶段和回复状态为 `unavailable`；附件也不读取，因此附件中的数量、
  规格或商业条件仍需人工补录。
- 新授权码已由所有者在本机配置并经 DPAPI 加密；尚未启用每日计划任务。
