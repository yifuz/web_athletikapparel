[CmdletBinding()]
param(
    [string]$BaseUrl = 'https://www.athletikapparel.com',
    [string[]]$Paths = @(
        '/',
        '/services/',
        '/technical-guides/',
        '/sportswear-manufacturer/',
        '/contact/'
    ),
    [ValidateRange(3, 20)]
    [int]$Rounds = 3,
    [ValidateRange(5, 120)]
    [int]$TimeoutSeconds = 20,
    [double]$ReviewMedianSeconds = 1.2,
    [double]$EscalationMedianSeconds = 2.0,
    [string]$CsvPath
)

$ErrorActionPreference = 'Stop'

if (-not (Get-Command 'curl.exe' -ErrorAction SilentlyContinue)) {
    throw 'curl.exe is required for time_starttransfer measurements.'
}

function Get-Median {
    param([double[]]$Values)

    $sorted = @($Values | Sort-Object)
    if ($sorted.Count -eq 0) {
        return $null
    }

    $middle = [math]::Floor($sorted.Count / 2)
    if ($sorted.Count % 2 -eq 1) {
        return [double]$sorted[$middle]
    }

    return ([double]$sorted[$middle - 1] + [double]$sorted[$middle]) / 2
}

function Get-ResponseHeaderMap {
    param([string]$HeaderText)

    $blocks = @(
        [regex]::Split($HeaderText.Trim(), "\r?\n\r?\n") |
            Where-Object { $_ -match '(?m)^HTTP/' }
    )

    $finalBlock = if ($blocks.Count -gt 0) { $blocks[-1] } else { '' }
    $map = @{}

    foreach ($line in [regex]::Split($finalBlock, "\r?\n") | Select-Object -Skip 1) {
        if ($line -match '^([^:]+):\s*(.*)$') {
            $map[$Matches[1].Trim().ToLowerInvariant()] = $Matches[2].Trim()
        }
    }

    return $map
}

$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/140.0 Safari/537.36'
$writeOut = "`n__SEO_TIMING__|%{http_code}|%{time_starttransfer}|%{time_total}|%{remote_ip}|%{http_version}|%{num_redirects}|%{url_effective}"
$samples = [System.Collections.Generic.List[object]]::new()

for ($round = 1; $round -le $Rounds; $round++) {
    foreach ($path in $Paths) {
        $uri = [uri]::new([uri]($BaseUrl.TrimEnd('/') + '/'), $path.TrimStart('/')).AbsoluteUri
        $rawLines = @(
            & curl.exe `
                --silent `
                --show-error `
                --location `
                --connect-timeout 10 `
                --max-time $TimeoutSeconds `
                --user-agent $userAgent `
                --dump-header - `
                --output NUL `
                --write-out $writeOut `
                $uri
        )

        if ($LASTEXITCODE -ne 0) {
            throw "curl.exe failed for $uri with exit code $LASTEXITCODE."
        }

        $raw = $rawLines -join "`n"
        $marker = '__SEO_TIMING__|'
        $markerIndex = $raw.LastIndexOf($marker, [System.StringComparison]::Ordinal)
        if ($markerIndex -lt 0) {
            throw "No timing marker was returned for $uri."
        }

        $headers = Get-ResponseHeaderMap -HeaderText $raw.Substring(0, $markerIndex)
        $timing = $raw.Substring($markerIndex + $marker.Length).Trim().Split('|')
        if ($timing.Count -lt 7) {
            throw "Unexpected timing output for $uri."
        }

        $samples.Add([pscustomobject]@{
            CheckedAtUtc = [datetime]::UtcNow.ToString('o')
            Round = $round
            Path = $path
            HttpCode = [int]$timing[0]
            TtfbSeconds = [math]::Round([double]::Parse($timing[1], [Globalization.CultureInfo]::InvariantCulture), 3)
            TotalSeconds = [math]::Round([double]::Parse($timing[2], [Globalization.CultureInfo]::InvariantCulture), 3)
            RemoteIp = $timing[3]
            HttpVersion = $timing[4]
            Redirects = [int]$timing[5]
            EffectiveUrl = $timing[6]
            CfCacheStatus = $headers['cf-cache-status']
            FlywheelCache = $headers['x-cache']
            FlywheelCacheHits = $headers['x-cache-hits']
            FlywheelCacheable = $headers['x-cacheable']
            FlywheelServedBy = $headers['x-served-by']
            FlywheelType = $headers['x-fw-type']
            FlywheelDynamic = $headers['x-fw-dynamic']
            FlywheelStatic = $headers['x-fw-static']
            CacheControl = $headers['cache-control']
            Age = $headers['age']
            CfRay = $headers['cf-ray']
            Server = $headers['server']
        })
    }
}

$summary = foreach ($path in $Paths) {
    $pathSamples = @($samples | Where-Object { $_.Path -eq $path })
    $medianTtfb = Get-Median -Values @($pathSamples.TtfbSeconds)
    $maxTtfb = ($pathSamples.TtfbSeconds | Measure-Object -Maximum).Maximum
    $status = if ($pathSamples.HttpCode -contains 0 -or @($pathSamples.HttpCode | Where-Object { $_ -ne 200 }).Count -gt 0) {
        'http-error'
    } elseif ($medianTtfb -ge $EscalationMedianSeconds) {
        'escalation-window'
    } elseif ($medianTtfb -ge $ReviewMedianSeconds) {
        'review-window'
    } else {
        'normal'
    }

    [pscustomobject]@{
        Path = $path
        Samples = $pathSamples.Count
        MedianTtfbSeconds = [math]::Round($medianTtfb, 3)
        MaxTtfbSeconds = [math]::Round([double]$maxTtfb, 3)
        Status = $status
        CfCacheStatus = (($pathSamples.CfCacheStatus | Sort-Object -Unique) -join ',')
        FlywheelCache = (($pathSamples.FlywheelCache | Sort-Object -Unique) -join ' / ')
        FlywheelCacheable = (($pathSamples.FlywheelCacheable | Sort-Object -Unique) -join ',')
        FlywheelServedBy = (($pathSamples.FlywheelServedBy | Sort-Object -Unique) -join ' / ')
        FlywheelType = (($pathSamples.FlywheelType | Sort-Object -Unique) -join ',')
        FlywheelDynamic = (($pathSamples.FlywheelDynamic | Sort-Object -Unique) -join ',')
        FlywheelStatic = (($pathSamples.FlywheelStatic | Sort-Object -Unique) -join ',')
    }
}

if ($CsvPath) {
    $parent = Split-Path -Parent $CsvPath
    if ($parent -and -not (Test-Path -LiteralPath $parent)) {
        New-Item -ItemType Directory -Path $parent -Force | Out-Null
    }
    $samples | Export-Csv -LiteralPath $CsvPath -NoTypeInformation -Encoding utf8
}

Write-Output '--- Samples ---'
$samples | Format-Table Round, Path, HttpCode, TtfbSeconds, TotalSeconds, HttpVersion, CfCacheStatus, FlywheelCache, FlywheelCacheHits, FlywheelCacheable, FlywheelType -AutoSize
Write-Output '--- Summary ---'
$summary | Format-Table -AutoSize

[pscustomobject]@{
    Samples = @($samples)
    Summary = @($summary)
}
