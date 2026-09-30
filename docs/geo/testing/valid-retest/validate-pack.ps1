[CmdletBinding()]
param(
    [string]$PackRoot = $PSScriptRoot
)

$ErrorActionPreference = 'Stop'

$runPath = Join-Path $PackRoot 'run-ledger.csv'
$manifestPath = Join-Path $PackRoot 'prompt-manifest.csv'
$citationPath = Join-Path $PackRoot 'citation-ledger.csv'
$summaryPath = Join-Path $PackRoot 'batch-summary.csv'

$errors = [System.Collections.Generic.List[string]]::new()

foreach ($path in @($runPath, $manifestPath, $citationPath, $summaryPath)) {
    if (-not (Test-Path -LiteralPath $path -PathType Leaf)) {
        $errors.Add("Missing file: $path")
    }
}

if ($errors.Count -gt 0) {
    $errors | ForEach-Object { Write-Error $_ }
    exit 1
}

$runs = @(Import-Csv -LiteralPath $runPath)
$manifest = @(Import-Csv -LiteralPath $manifestPath)
$citations = @(Import-Csv -LiteralPath $citationPath)
$summary = @(Import-Csv -LiteralPath $summaryPath)

if ($runs.Count -ne 22) {
    $errors.Add("run-ledger.csv must contain 22 rows; found $($runs.Count).")
}

if (($runs.sample_id | Sort-Object -Unique).Count -ne $runs.Count) {
    $errors.Add('sample_id values must be unique.')
}

if (($manifest.prompt_id | Sort-Object -Unique).Count -ne 11) {
    $errors.Add('prompt-manifest.csv must contain 11 unique prompt IDs.')
}

if ($summary.Count -ne 6) {
    $errors.Add("batch-summary.csv must contain 6 rows; found $($summary.Count).")
}

$allowedValidity = @('valid', 'partial', 'personalized', 'intent-mismatch', 'unavailable', 'invalid')
$allowedRunState = @('planned', 'in_progress', 'completed', 'skipped')
$validRequiredFields = @(
    'sampled_at_local',
    'model_mode',
    'account_state',
    'session_mode',
    'personalization_state',
    'custom_instructions_state',
    'search_network_state',
    'interface_language',
    'answer_language',
    'actual_region',
    'device',
    'network_profile',
    'answer_text_path',
    'screenshot_path',
    'validity_reason',
    'evidence_level',
    'permission_basis',
    'collector',
    'reviewer',
    'external_events'
)

foreach ($item in $manifest) {
    $bytes = [Text.Encoding]::UTF8.GetBytes($item.prompt_text)
    $sha = [Convert]::ToHexString([Security.Cryptography.SHA256]::HashData($bytes)).ToLowerInvariant()

    if ($sha -ne $item.sha256) {
        $errors.Add("Prompt hash mismatch: $($item.prompt_id).")
    }

    $linkedRuns = @($runs | Where-Object prompt_id -eq $item.prompt_id)
    if ($linkedRuns.Count -ne 2) {
        $errors.Add("Prompt $($item.prompt_id) must have exactly two run rows; found $($linkedRuns.Count).")
    }

    foreach ($run in $linkedRuns) {
        if ($run.prompt_sha256 -ne $item.sha256) {
            $errors.Add("Run prompt hash mismatch: $($run.sample_id).")
        }
    }
}

foreach ($run in $runs) {
    if ($allowedRunState -notcontains $run.run_state) {
        $errors.Add("Invalid run_state for $($run.sample_id): $($run.run_state).")
    }

    if ($run.sample_mode -ne 'manual_authorized_sample') {
        $errors.Add("Unexpected sample_mode for $($run.sample_id): $($run.sample_mode).")
    }

    if ($run.target_evidence_level -ne 'E3') {
        $errors.Add("Unexpected target evidence level for $($run.sample_id): $($run.target_evidence_level).")
    }

    if ([string]::IsNullOrWhiteSpace($run.validity_status)) {
        continue
    }

    if ($allowedValidity -notcontains $run.validity_status) {
        $errors.Add("Invalid validity_status for $($run.sample_id): $($run.validity_status).")
        continue
    }

    if ($run.run_state -notin @('completed', 'skipped')) {
        $errors.Add("Terminal validity requires completed or skipped run_state: $($run.sample_id).")
    }

    if ($run.validity_status -ne 'valid') {
        continue
    }

    foreach ($field in $validRequiredFields) {
        if ([string]::IsNullOrWhiteSpace($run.$field)) {
            $errors.Add("Valid row $($run.sample_id) is missing $field.")
        }
    }

    foreach ($field in @('prompt_exact_match', 'independent_session', 'first_answer_only', 'answer_text_saved', 'full_answer_screenshot_saved')) {
        if ($run.$field -ne 'yes') {
            $errors.Add("Valid row $($run.sample_id) requires $field=yes.")
        }
    }

    if ($run.source_evidence_status -notin @('urls_captured', 'none_observed')) {
        $errors.Add("Valid row $($run.sample_id) has unacceptable source_evidence_status: $($run.source_evidence_status).")
    }

    if ($run.source_panel_screenshot_saved -ne 'yes') {
        $errors.Add("Valid row $($run.sample_id) requires source_panel_screenshot_saved=yes.")
    }

    if ($run.evidence_level -ne 'E3') {
        $errors.Add("Valid row $($run.sample_id) requires evidence_level=E3.")
    }

    if ($run.review_status -ne 'passed') {
        $errors.Add("Valid row $($run.sample_id) requires review_status=passed.")
    }

    $runCitations = @($citations | Where-Object sample_id -eq $run.sample_id)
    if ($run.source_evidence_status -eq 'urls_captured') {
        if ($run.citation_ledger_complete -ne 'yes') {
            $errors.Add("Valid cited row $($run.sample_id) requires citation_ledger_complete=yes.")
        }
        if ($runCitations.Count -eq 0) {
            $errors.Add("Valid cited row $($run.sample_id) has no citation-ledger rows.")
        }
    }

    if ($run.source_evidence_status -eq 'none_observed' -and $runCitations.Count -gt 0) {
        $errors.Add("Row $($run.sample_id) is none_observed but has citation-ledger rows.")
    }
}

$runIds = @($runs.sample_id)
foreach ($citation in $citations) {
    if ($runIds -notcontains $citation.sample_id) {
        $errors.Add("Citation references unknown sample_id: $($citation.sample_id).")
    }

    $uri = $null
    if (-not [Uri]::TryCreate($citation.source_url_final, [UriKind]::Absolute, [ref]$uri) -or $uri.Scheme -notin @('http', 'https')) {
        $errors.Add("Citation has invalid final URL for $($citation.sample_id): $($citation.source_url_final).")
    }
}

foreach ($row in $summary) {
    if ($row.review_status -ne 'passed') {
        continue
    }

    $numericFields = @('answers_obtained', 'valid', 'partial', 'personalized', 'intent_mismatch', 'unavailable', 'invalid')
    foreach ($field in $numericFields) {
        $value = 0
        if (-not [int]::TryParse($row.$field, [ref]$value)) {
            $errors.Add("Passed summary row $($row.test_group) / $($row.platform) has non-numeric $field.")
        }
    }

    $terminal = [int]$row.valid + [int]$row.partial + [int]$row.personalized + [int]$row.intent_mismatch + [int]$row.unavailable + [int]$row.invalid
    if ($terminal -ne [int]$row.planned) {
        $errors.Add("Passed summary denominator does not close for $($row.test_group) / $($row.platform).")
    }
}

if ($errors.Count -gt 0) {
    $errors | ForEach-Object { Write-Error $_ }
    Write-Output "VALIDATION_FAILED errors=$($errors.Count)"
    exit 1
}

Write-Output "VALIDATION_PASSED runs=$($runs.Count) prompts=$($manifest.Count) citations=$($citations.Count) summary_rows=$($summary.Count)"
