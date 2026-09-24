[CmdletBinding()]
param(
    [ValidatePattern('^([01]\d|2[0-3]):[0-5]\d$')]
    [string]$At = '09:00'
)

$ErrorActionPreference = 'Stop'
$taskName = 'Athletik 163 Mail Inquiry Analysis'
$analyzerPath = Join-Path $PSScriptRoot 'analyze_163.py'
$launcher = Get-Command 'py.exe' -ErrorAction Stop
$taskCommand = "`"$($launcher.Source)`" -3 `"$analyzerPath`" analyze"

& schtasks.exe /Create /TN $taskName /TR $taskCommand /SC DAILY /ST $At /RL LIMITED /F
if ($LASTEXITCODE -ne 0) {
    throw '计划任务创建失败。'
}

Write-Host "已创建每日 $At 运行的计划任务：$taskName"
Write-Host '该任务只读取 INBOX，不发送、删除、移动邮件，也不改变已读状态。'
