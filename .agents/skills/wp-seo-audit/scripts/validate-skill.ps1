[CmdletBinding()]
param(
    [string]$SkillPath = (Resolve-Path (Join-Path $PSScriptRoot '..')).Path,
    [switch]$SkipCli
)

$ErrorActionPreference = 'Stop'
$failures = [System.Collections.Generic.List[string]]::new()

function Add-Failure {
    param([string]$Message)
    $script:failures.Add($Message)
}

$skillFile = Join-Path $SkillPath 'SKILL.md'
$translatedSkillFile = Join-Path $SkillPath 'SKILL.zh-CN.md'
$routingFile = Join-Path $SkillPath 'references/seo-cli-routing.md'

if (-not (Test-Path -LiteralPath $skillFile -PathType Leaf)) {
    throw "Missing required skill entrypoint: $skillFile"
}

if (-not (Test-Path -LiteralPath $translatedSkillFile -PathType Leaf)) {
    Add-Failure "Missing Chinese reading copy: $translatedSkillFile"
}

$skillText = Get-Content -LiteralPath $skillFile -Raw

if ($skillText -notmatch '(?ms)\A---\s*\r?\n.*?^name:\s*wp-seo-audit\s*$.*?^description:\s*>') {
    Add-Failure 'SKILL.md frontmatter is missing the expected name or folded description.'
}

$markdownFiles = Get-ChildItem -LiteralPath $SkillPath -Recurse -File -Filter '*.md'
$englishReferences = Get-ChildItem -LiteralPath (Join-Path $SkillPath 'references') -File -Filter '*.md' |
    Where-Object { $_.Name -notlike '*.zh-CN.md' }

foreach ($reference in $englishReferences) {
    $translatedReference = Join-Path $reference.DirectoryName ($reference.BaseName + '.zh-CN.md')
    if (-not (Test-Path -LiteralPath $translatedReference -PathType Leaf)) {
        Add-Failure "Missing Chinese reference copy for $($reference.Name): $translatedReference"
    }
}

foreach ($file in $markdownFiles) {
    $text = Get-Content -LiteralPath $file.FullName -Raw
    $matches = [regex]::Matches($text, '\[[^\]]+\]\((?!https?://|#)([^)]+)\)')
    foreach ($match in $matches) {
        $relativeTarget = $match.Groups[1].Value.Trim('<', '>') -replace '#.*$', ''
        if ([string]::IsNullOrWhiteSpace($relativeTarget)) {
            continue
        }

        $resolvedTarget = Join-Path $file.DirectoryName $relativeTarget
        if (-not (Test-Path -LiteralPath $resolvedTarget)) {
            Add-Failure "Broken relative link in $($file.FullName): $relativeTarget"
        }
    }
}

$retiredTerms = @(
    'Mobile-Friendly Test',
    'Google Mobile Friendly Test'
)

foreach ($term in $retiredTerms) {
    $hits = $markdownFiles | Select-String -SimpleMatch -Pattern $term
    foreach ($hit in $hits) {
        if ($hit.Line -notmatch '(?i)retired|do not cite|已退役|不得引用') {
            Add-Failure "Unqualified retired tool reference in $($hit.Path):$($hit.LineNumber): $term"
        }
    }
}

if (-not $SkipCli) {
    if (-not (Get-Command 'seo' -ErrorAction SilentlyContinue)) {
        Add-Failure 'SEO CLI is unavailable. Re-run with -SkipCli only for structural validation.'
    }
    elseif (-not (Test-Path -LiteralPath $routingFile -PathType Leaf)) {
        Add-Failure "Missing routing reference: $routingFile"
    }
    else {
        $routingText = Get-Content -LiteralPath $routingFile -Raw
        $versionMatch = [regex]::Match($routingText, 'Verified CLI version:\s*`([^`]+)`')
        if (-not $versionMatch.Success) {
            Add-Failure 'Routing reference does not declare a verified CLI version.'
        }
        else {
            $installedVersion = (& seo --version | Out-String).Trim()
            if ($LASTEXITCODE -ne 0) {
                Add-Failure 'Unable to read the installed SEO CLI version.'
            }
            elseif ($installedVersion -ne $versionMatch.Groups[1].Value) {
                Add-Failure "SEO CLI version $installedVersion differs from verified version $($versionMatch.Groups[1].Value). Review routes before updating the baseline."
            }
        }

        $reportJson = (& seo reports list --json | Out-String)
        if ($LASTEXITCODE -ne 0) {
            Add-Failure 'Unable to list SEO CLI reports.'
        }
        else {
            try {
                $catalog = $reportJson | ConvertFrom-Json
                $availableIds = @($catalog.reports.id)
                $routingSection = [regex]::Match($routingText, '(?ms)^## Report routing\s*(.*?)(?=^## )').Groups[1].Value
                $routeIds = [regex]::Matches($routingSection, '`([a-z0-9-]+)`') |
                    ForEach-Object { $_.Groups[1].Value } |
                    Where-Object { $_ -ne 'report' } |
                    Sort-Object -Unique

                foreach ($routeId in $routeIds) {
                    if ($routeId -notin $availableIds) {
                        Add-Failure "Routing reference uses unknown report id: $routeId"
                    }
                }
            }
            catch {
                Add-Failure "Unable to parse SEO report catalog: $($_.Exception.Message)"
            }
        }
    }
}

if ($failures.Count -gt 0) {
    $failures | ForEach-Object { Write-Error $_ }
    exit 1
}

Write-Output "wp-seo-audit validation passed: $($markdownFiles.Count) Markdown files checked; CLI validation skipped: $SkipCli"
