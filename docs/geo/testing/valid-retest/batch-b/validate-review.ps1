param([string]$EvidenceRoot)
$ErrorActionPreference = 'Stop'
$rows = @(Import-Csv (Join-Path $PSScriptRoot 'review-ledger.csv'))
$prompts = @(Import-Csv (Join-Path $PSScriptRoot '../prompt-manifest.csv'))
if ($rows.Count -ne 11 -or @($rows.prompt_id | Sort-Object -Unique).Count -ne 11) {
    throw 'Expected exactly 11 unique reviewed prompts.'
}
foreach ($prompt in $prompts) {
    if ($prompt.prompt_id -notin $rows.prompt_id) { throw "Missing prompt: $($prompt.prompt_id)" }
}
foreach ($row in $rows) {
    if ($row.batch_id -ne 'GEO-VALID-2026-10-B' -or $row.owner_review_status -ne 'pending') {
        throw "Unexpected batch or owner approval: $($row.prompt_id)"
    }
    if ($row.suggested_validity -notin @('partial', 'pending_environment_and_owner_review')) {
        throw "First-pass ledger must not upgrade formal validity: $($row.prompt_id)"
    }
    if ([int]$row.grouped_citation_count -gt 0 -and $row.complete_citation_mapping -ne 'no') {
        throw "Unexpanded groups marked complete: $($row.prompt_id)"
    }
    if ($row.brand_rank -and ($row.brand_mentioned -ne 'yes' -or $row.brand_candidate -ne 'yes')) {
        throw "Rank without target candidate: $($row.prompt_id)"
    }
    if ($EvidenceRoot) {
        $sampleDir = Join-Path $EvidenceRoot "chatgpt-search-2026-10-09/$($row.sample_id)"
        $metadata = Get-Content -LiteralPath (Join-Path $sampleDir "$($row.sample_id)-metadata.json") -Raw | ConvertFrom-Json -DateKind String
        $answer = Get-Content -LiteralPath (Join-Path $sampleDir "$($row.sample_id)-answer.md") -Raw
        $groups = @($metadata.external_anchors | Where-Object { $_.testid -eq 'chatgpt-citation' -and $_.text -match '\+\d+' })
        $additional = 0
        foreach ($group in $groups) { if ($group.text -match '\+(\d+)') { $additional += [int]$Matches[1] } }
        if ($groups.Count -ne [int]$row.grouped_citation_count -or $additional -ne [int]$row.additional_source_positions_unmapped) {
            throw "Citation gap count disagrees with raw evidence: $($row.prompt_id)"
        }
        $canonical = @($metadata.external_anchors | Where-Object {
            $_.testid -eq 'chatgpt-citation' -and ([uri]$_.href).Host -in @('athletikapparel.com', 'www.athletikapparel.com')
        })
        if (($canonical.Count -gt 0) -ne ($row.visible_canonical_cited -eq 'yes')) {
            throw "Visible canonical citation flag disagrees with metadata: $($row.prompt_id)"
        }
        if (($answer -match '(?i)athletik') -ne ($row.brand_mentioned -eq 'yes')) {
            throw "Body target mention flag disagrees with answer: $($row.prompt_id)"
        }
    }
}
$groupCount = [int]($rows | Measure-Object grouped_citation_count -Sum).Sum
$additionalCount = [int]($rows | Measure-Object additional_source_positions_unmapped -Sum).Sum
if ($groupCount -ne 71 -or $additionalCount -ne 89) { throw 'Unexpanded citation totals do not close.' }
Write-Output "REVIEW_LEDGER_VALIDATION_PASSED samples=11 grouped=71 additional_positions=89 owner_approved_valid=0"
Write-Output 'This validates ledger consistency, not semantic accuracy, unseen citations, or owner approval.'
