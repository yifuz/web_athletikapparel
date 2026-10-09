# GEO 有效复测执行包

> 批次 ID：`GEO-VALID-2026-10-A`
>
> 最早开始日期：2026-10-04（完成 2026-10-03 后的月度观测窗口再开始）
>
> 数据模式：ChatGPT Search 为 `browser_assisted_sample`（M4）；Google AI Mode 为 `manual_authorized_sample`（M2）
>
> 单条目标证据等级：`E3`
>
> 当前状态：`in_progress / gsc-gate-passed / ChatGPT-collected / owner-review-pending`。2026-10-08 已取得要求的 GSC Generative AI 完整窗口，并完成 11 条 ChatGPT Search 采集；Google AI Mode 11 条仍为 `planned`。ChatGPT 样本因证据缺口暂记 `partial`，不进入正式有效分母。

> 2026-10-09 更新：[`重采批次 B`](batch-b/README.md) 的 11 条 ChatGPT Search 已全部完成，提示词哈希、完整文本长度、纵向截图覆盖和文件完整性检查通过，状态为 `collection-complete / owner-review-pending`。C06/C08 尾部文本已取得，完整 Sources 面板已通过右上角 Summary 入口识别。批次 A 的记录与证据保持历史 `partial`；B 的采集账本独立保存，尚未进入正式 `valid` 分母。

> 同日[首轮逐条复核](batch-b/review-2026-10-09.md)确认：D03、D05、C06 的截图有横向缺口；十条回答的合并引用未完整映射。E01 的内容与引用支持关系通过，但早间环境证据与所有者独立复核尚未关闭。原会话只读重开未恢复，未提交新 Prompt；正式有效分母仍为 0。文件检查不等同于 E3 验收。

本执行包用于完成 Baseline v2 与 Broad Discovery v1 的第一批严格有效复测。固定提示词仍以 [`../prompt-baseline.md`](../prompt-baseline.md) 为唯一规范来源；本目录只负责执行、证据和复核，不建立新版本，也不改写提示词。

> 最新决定：所有者已手动重采并明确接受 [E01 新样本](manual-e01/README.md)为 `valid / owner-confirmed`，当前已接受有效样本为 1 条。手动 M2 单独记录，不覆盖 A/B 的历史 E01 或把其他样本升级；以下 A/B 的 0 分母为对应批次历史状态。此决定不伪称缺少的材料已由程序验证。

## 1. 文件与职责

| 文件 | 用途 | 维护方式 |
|---|---|---|
| [`prompt-manifest.csv`](prompt-manifest.csv) | 11 条固定提示词、版本及 SHA-256 | 只读；若哈希或文字变化，停止本批并建立新版本 |
| [`run-ledger.csv`](run-ledger.csv) | 22 次实际运行的环境、证据、有效性和结果 | 每次运行完成后立即填一行 |
| [`citation-ledger.csv`](citation-ledger.csv) | 每个实际引用 URL 一行，记录最终 URL 与支持关系 | 展开 Sources 后逐条填写 |
| [`batch-summary.csv`](batch-summary.csv) | 按测试组和产品汇总正式分母 | 只在逐行复核完成后更新 |
| [`validate-pack.ps1`](validate-pack.ps1) | 校验行数、Prompt 哈希、字段对齐、E3 硬门槛、引用 URL 和分母闭合 | 批次开始前、每次填写后和最终收口时运行 |

原始回答、截图或录屏可能包含账号界面信息，不默认提交到 Git。批次开始前由执行者选择一个私有本地证据目录，并把实际路径写入 `run-ledger.csv`；不得用分享链接代替回答原文、Sources 截图或最终 URL。2026-10-08 ChatGPT 原始证据保存在 `C:\Users\Administrator\seo-reports\geo-valid-retest\GEO-VALID-2026-10-A\chatgpt-search-2026-10-08`，该目录不进入 Git。

## 2. 本批范围与分母

本批计划取得 22 条实际回答：

| 测试组 | ChatGPT Search | Google AI Mode | 合计 |
|---|---:|---:|---:|
| Baseline v2 | 8 | 8 | 16 |
| Broad Discovery v1 | 3 | 3 | 6 |
| **实际运行合计** | **11** | **11** | **22** |

Perplexity 仍属于原计划分母的一部分，但不进入这 22 条实际运行账本。批次开始时先检查一次现有账户权限：

- 若仍无可用的网页搜索能力，在 `batch-summary.csv` 中记录 Baseline v2 的 8 条和 Broad Discovery v1 的 3 条为 `unavailable / plan-access`。
- 不付费解锁、不绕过限制，也不用其他产品替代。
- 若权限后来自然可用，建立补充批次，不回填或覆盖本批记录。

## 3. 开始闸门

满足以下条件后才能把第一条 `run_state` 从 `planned` 改为 `in_progress`：

- 已完成 2026-10-03 后的 GSC Generative AI 完整窗口导出，并单独保存传统 GSC、Bing AI Performance 与 GA4 快照；这些数据不与 AI 回答样本混算。
- 已确认本批使用 [`prompt-manifest.csv`](prompt-manifest.csv) 中的固定原文。
- 已确定连续不超过 3 个自然日的执行窗口。
- 已冻结会改变实体信息、Guide 正文、导航、URL、Schema 或核心 buyer-fit 文案的生产部署。
- 已记录执行窗口内可能影响结果的外部事件；没有则填 `none_known`，不能留空。
- 已建立私有证据目录，并确定统一的文件命名：`<sample_id>-answer`、`<sample_id>-sources`。
- 已确定采集人和复核人。采集人可以是所有者；Codex 可复核用户带回的证据，但当前 Codex 对话不能充当中性 ChatGPT Search 样本。

任一闸门不满足时，不开始批次。

### 3.1 2026-10-08 闸门与执行进度

- **已通过：**GSC Generative AI 的 2026-09-03～09-30 完整窗口已导出、校验并归档；Property 等长窗口为 27 → 190 impressions。证据见 [`../geo-measurement-snapshot-2026-10-08.md`](../geo-measurement-snapshot-2026-10-08.md)。
- **已分开保存：**传统 GSC 与 GA4 已有 2026 年 9 月自然月基线；Bing 保留 2026-08-24～09-20 基线，第二窗口不早于 2026-10-20。
- **已固定：**执行窗口为 2026-10-08～10-10；采集期间冻结生产变更；外部事件记为 `none_known`；私有证据目录已建立；采集人为 Codex / OpenCLI Browser Bridge，复核人为所有者。
- **ChatGPT 运行环境：**11 条均为独立 Temporary Chat，登录态，英文界面与回答，Desktop，美国加州洛杉矶出口；采集期间 Memory、Custom Instructions、Space Search、Connector Search 与风格个性化均关闭，Web Search 开启，结束后已恢复原设置。
- **账本状态：**ChatGPT Search 11 条 `run_state=completed / validity_status=partial`；Google AI Mode 11 条仍为 `planned`。
- **已取得：**9 份完整首答文本、2 份截断首答文本、11 份运行元数据、11 份回答视口截图、11 份首个引用预览、169 条 inline citation 最终 URL。
- **批次 A 证据缺口：**当次未取得可核验的完整 Sources 面板；嵌套滚动容器使 `--full-page` 只保存当前视口，除 E01 外不能证明完整 UI 答案；C06 与 C08 超过采集器默认 20,000 字符分块，文本尾部未保存。上述历史样本不得升级为 `valid`。2026-10-09 已识别完整 Sources 入口并另建批次 B 重采，不能把当次采集缺口描述为产品没有 Sources 功能。

## 4. 平台预检

### 4.1 ChatGPT Search

每条提示词都必须重新建立独立的 Temporary Chat：

1. 使用标准 ChatGPT Search，不使用 Research、Deep Research 或同一会话追问。
2. Temporary Chat 开启；Custom Instructions 关闭。
3. 搜索/联网开启；不使用 Connected Apps、上传文件或历史对话作为上下文。
4. 英文界面、英文回答、Desktop；目标网络地区为 United States，并记录实际地区和固定网络配置。
5. 在提问前记录可见模型/模式、账号状态和上述环境字段。

### 4.2 Google AI Mode

每条提示词都必须重新建立独立的无痕会话：

1. 使用 Incognito、signed out 的 Google AI Mode，不在普通 Search 或 Gemini App 中替代运行。
2. Personalized Recommendations、Personal Intelligence、Search Services History 影响和 Preferred Sources 必须为关闭或不适用，并如实记录。
3. 英文界面、英文回答、Desktop；目标网络地区为 United States，并记录实际地区和固定网络配置。
4. 使用第一次完整回答，不追问、不重新生成，也不把后续展开内容并入第一次答案。

若平台自动切换模型、模式或登录状态，先保留证据，再将该行降级，不靠事后猜测补字段。

## 5. 单次运行步骤

每条提示词按以下顺序执行：

1. 在 `run-ledger.csv` 找到对应 `sample_id`，填写开始前环境字段。
2. 从 `prompt-manifest.csv` 复制完整提示词；不得翻译、增删标点、增加品牌提示或追加背景。
3. 提交一次，只保存第一次完整回答；不得点 Regenerate。
4. 保存回答原文，并截取能够证明完整答案、产品/模式和会话状态的截图。
5. 展开完整 Sources 面板：
   - 有来源：复制每个来源的最终 URL，并逐条写入 `citation-ledger.csv`。
   - 确实没有来源：将 `source_evidence_status` 写为 `none_observed`，并保存能够证明无来源状态的完整截图。
   - 面板没有展开、只保存标题、只有 `google.com/goto` 中转地址或最终 URL 缺失：写为 `incomplete`，该行不得判为 `valid`。
6. 填写品牌出现、候选、推荐、排名、规范站引用、意图匹配、实体准确性、事实错误和主要竞品字段。
7. 关闭本次会话，再开始下一条。
8. 由复核人检查原始证据并填写 `review_status`；采集人不能仅凭记忆补录。

## 6. 有效性判定

`validity_status` 只允许以下值：

| 状态 | 判定条件 | 是否进入正式分母 |
|---|---|---|
| `valid` | 固定原文、独立干净会话、环境完整、目标地区一致、第一次完整回答已保存，且来源为 `urls_captured` 或有截图证明 `none_observed`；达到 E3，复核通过 | 是 |
| `partial` | 取得回答，但环境、独立会话、完整答案、Sources 面板或最终 URL 任一证据不完整 | 否 |
| `personalized` | 出现用户关系、历史上下文、账号资料、Memory、文件、应用或来源偏好影响 | 否 |
| `intent-mismatch` | 回答主体落入与固定题意不同的类别，导致品牌未出现不能解释为目标 GEO 表现 | 否；单独分析 |
| `unavailable` | 产品、模式、地区或权限在本次计划中不可用，未取得目标回答 | 否 |
| `invalid` | 改写提示词、复用会话、关闭搜索、重新生成、使用错误产品/模式或证据不足到无法判断 | 否 |

### 6.1 `valid` 的硬门槛

每个 `valid` 行必须同时满足：

- `prompt_exact_match=yes`
- `independent_session=yes`
- `first_answer_only=yes`
- `answer_text_saved=yes`
- `full_answer_screenshot_saved=yes`
- `source_evidence_status=urls_captured` 或 `none_observed`
- 有来源时 `citation_ledger_complete=yes`
- 环境字段、采集时间、实际地区、设备、模型/模式、账号和会话状态均非空
- `evidence_level=E3`
- `review_status=passed`

“没有来源”可以是有效观测；“没有保存来源”不能。

## 7. 引用与结果口径

- 品牌出现、进入候选、明确推荐和排名分别记录，不能互相替代。
- `canonical_cited=yes` 只用于实际引用 `athletikapparel.com` 的样本；`athletik.com.cn`、LinkedIn、UltraMerino 或其他同方页面都不是规范站引用。
- 每个引用必须检查它是否支持相邻结论；链接存在不等于引用准确。
- 指定域名的 V2-E02 不计自然发现，但仍检查规范页引用与事实准确性。
- C06～C08 即使没有出现 Athletik 品牌，只要相关规范 Guide 被实际引用，仍属于内容引用信号。
- 排名和比率只能在同一平台、同一 Prompt 版本和同一有效性口径下比较。

## 8. 批次收口与验收

全部计划行完成后按以下顺序收口：

1. 复核 22 行运行账本和全部引用账本。
2. 检查每组满足：`valid + partial + personalized + intent-mismatch + unavailable + invalid = planned`。
3. 更新 `batch-summary.csv`；空白不是 0，只有经过逐行复核后才能填 0。
4. 正式品牌出现率、候选率、推荐率和规范站引用率只使用 `valid` 行。
5. `partial`、`personalized` 与 `intent-mismatch` 只做描述性诊断，不并入正式率。
6. 把本轮实际引用 URL 增量写入 [`../ai-cited-source-monthly-template.md`](../ai-cited-source-monthly-template.md) 的当月副本。
7. 对照执行窗口的 GSC Generative AI、Bing、传统 GSC 和 GA4，但只报告观察相关，不做强因果归因。
8. 只有相同缺口在两个产品、两个固定 Prompt 或连续两个月复现，才进入网站改动评审；明确事实错误、抓取阻断或规范来源错误除外。

批次验收标准：22 条实际运行全部有终态；每个 `valid` 样本均达到 E3 并通过复核；Perplexity 11 条均有明确可用性状态；分母闭合；执行窗口没有未记录的生产变更。

在本目录运行校验：

```powershell
pwsh -File .\validate-pack.ps1
```

批次尚未执行时，校验只检查静态结构；一旦某行填写 `validity_status`，脚本就会同时检查其终态与证据字段。

## 9. 本批禁止事项

- 不在当前 Codex 对话里测试 ChatGPT Search 并把结果当成中性样本。
- 不为了出现 Athletik 而追问、重试、改写或重新生成。
- 不把 Sources 卡片标题、搜索摘要或中转链接猜成最终 URL。
- 不将分享链接当作 Sources 证据。
- 不在执行中途部署页面、Schema、导航、URL 或实体文案变化。
- 不把 `partial` 结果补写成 `valid`，也不把 `unavailable` 写成 0 表现。
- 不因单次缺席、新出现或排序波动立即改站。
