[CmdletBinding()]
param()

$ErrorActionPreference = 'Stop'
$appDir = Join-Path ([Environment]::GetFolderPath('LocalApplicationData')) 'Athletik\mail-intake'
$configPath = Join-Path $appDir 'config.json'
$secretPath = Join-Path $appDir 'secret.dpapi'
$analyzerPath = Join-Path $PSScriptRoot 'analyze_163.py'

New-Item -ItemType Directory -Path $appDir -Force | Out-Null

$emailAddress = (Read-Host '请输入完整的 @163.com 邮箱地址').Trim()
if ($emailAddress -notmatch '^[^@\s]+@163\.com$') {
    throw '邮箱地址格式不正确；首版仅支持普通 @163.com 邮箱。'
}

Write-Host '请输入163邮箱生成的客户端授权码（不是网页登录密码）。输入内容不会显示。'
$secureCode = Read-Host -AsSecureString
$bstr = [Runtime.InteropServices.Marshal]::SecureStringToBSTR($secureCode)
$plainBytes = $null
try {
    $plainCode = [Runtime.InteropServices.Marshal]::PtrToStringBSTR($bstr)
    if ([string]::IsNullOrWhiteSpace($plainCode)) {
        throw '授权码不能为空。'
    }
    $plainBytes = [Text.Encoding]::UTF8.GetBytes($plainCode)
    $protectedBytes = [Security.Cryptography.ProtectedData]::Protect(
        $plainBytes,
        $null,
        [Security.Cryptography.DataProtectionScope]::CurrentUser
    )
    [IO.File]::WriteAllBytes($secretPath, $protectedBytes)
}
finally {
    if ($bstr -ne [IntPtr]::Zero) {
        [Runtime.InteropServices.Marshal]::ZeroFreeBSTR($bstr)
    }
    if ($null -ne $plainBytes) {
        [Array]::Clear($plainBytes, 0, $plainBytes.Length)
    }
    $plainCode = $null
}

$config = [ordered]@{
    email                   = $emailAddress
    imap_host               = 'imap.163.com'
    imap_port               = 993
    mailbox_roles           = @('inbox', 'junk', 'trash')
    report_timezone         = 'America/New_York'
    minimum_order_quantity = 500
    output_dir              = (Join-Path $appDir 'output')
}
[IO.File]::WriteAllText(
    $configPath,
    (($config | ConvertTo-Json -Depth 3) + [Environment]::NewLine),
    [Text.UTF8Encoding]::new($false)
)

Write-Host "配置已保存到 $appDir"
Write-Host '正在执行只读连接检查……'
& py -3 $analyzerPath check
if ($LASTEXITCODE -ne 0) {
    throw '只读连接检查失败。请确认 IMAP/SMTP 已开启，并使用客户端授权码。'
}

Write-Host '连接检查通过。现在可以运行分析：'
Write-Host "py -3 `"$analyzerPath`" analyze"
