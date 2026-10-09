# ChatGPT Search 逐条重采批次 C

批次 `GEO-VALID-2026-10-C`，2026-10-09。所有者要求从 E02 起由 Codex 自行重采、当条验证纠错；E01 沿用已经接受的[手动有效样本](../manual-e01/README.md)，不再采集。

当前：E02 已完成采集与复核，`valid / E3 / passed`。本批 M4 有效样本为 **1**；手动 E01 的 M2 有效样本另为 **1**。A/B 的历史样本不覆盖，不合并不同采集模式计算表现率。D03 正在采集；D04、D05、C06～C08、BD-01～BD-03 待执行。

## 逐条验收规则

- 沿用[固定 Prompt 清单](../prompt-manifest.csv)，每题独立 Temporary Chat，只提交一次，保留第一次完整自然回答，不追问或 Regenerate。
- 完成文本必须与仍存活的原会话一致。截图须人工查看首尾、所有表格行列；文件存在和滚动高度检查不能替代视觉验收。
- `+N` 引用逐组展开，每个位置保留真实 URL；检查计数、顺序及首个链接，防止读取上一组残留 tooltip。
- Sources 搜索候选与最终回答引用分开。选择 Sources 面板时逐级排除隐藏祖先，并核对实际视窗范围，不能只凭 `aria-expanded=true`。
- 当条复核通过并保存验收清单后才开始下一题。截图或展开失败时在同一原会话内修复，不重新提问。
- 回答内容错误、引用支持不足也应如实记录；不为获得积极品牌结果重采。有效性与 GEO 表现分开。

## 环境与证据

私有证据根目录：`C:\Users\Administrator\seo-reports\geo-valid-retest\GEO-VALID-2026-10-C`。账号截图和完整原文不进入 Git。

- `yao-chatgpt-crawler` 的原始 preflight 因 Windows 的 `python3` / `opencli` 命令解析失败；使用实际 Python、OpenCLI PowerShell 入口分别核验。Node、Python、OpenCLI doctor、Browser Bridge、指定 profile 与登录状态均已核验，不把原脚本记为通过。
- `settings-neutral.json` 及对应截图：Memory、风格历史、录音历史、Space Search、Connector Search 关闭；Web Search 开启；四个个性化文本字段为空，风格 Default。原设置保存于 `settings-original.json`，收口后恢复。
- `network-before.json/.png`：实际浏览器出口 United States / California / Sacramento，2026-10-09 15:41 +08:00。城市按当次地理库结果记录，不沿用旧批次城市。
- 可见模式 `Pro`、英文界面、Desktop、登录态。这里记录 UI 标签，不臆测底层模型版本。

## E02 验收

样本：`GVC-CHT-V2-E02`，15:42:31 +08:00 开始，首答显示 `Worked for 2m 10s`。Prompt SHA-256 与清单一致，回答正文 3,122 字符。

| 项目 | 结果 |
|---|---|
| 完整回答 | 首尾、六行产品表格的两列及结尾限定均已视觉核对 |
| 实际引用 | 11 组、14 个位置、9 个不同 URL；三组 `+1` 的六张展开截图全部已查看 |
| Sources 候选 | 23 条，含 11 个网页条目和 12 个图像条目；两张重叠截图覆盖全部列表 |
| 核心事实 | 与引用的官网页面相符；属第一方公开声明，不是独立工厂审计 |
| 结果 | 提及 Athletik、引用规范站；指定域名理解题，不计自然发现或推荐排名 |
| 有效性 | `valid / E3 / passed`，Codex 当条复核 |

最终采纳的文件以样本目录下 `acceptance.json`、`accepted-file-manifest.csv` 为准：

- `GVC-CHT-V2-E02-answer-complete.png`：完整回答。
- `sources-panel/GVC-CHT-V2-E02-sources-visible-01.png` 与 `02.png`：实际可见 Sources 面板，覆盖区间 0～490、182～672。
- `sources-accepted.json`：候选标题与 URL、几何和截图路径。
- `citation-groups/citations.json/.csv`：14 个实际引用位置及对应原句；分组截图在同目录。

初次回答分段与 Sources 试拍存在布局/隐藏面板问题，均原样保留但**不进入验收清单**。修复只调整可见面板宽度和滚动区域高度，没有更改回答、来源内容、顺序或重新生成回答。

结构化结果见[复核账本](review-ledger.csv)与[引用支持关系](citation-ledger.csv)。官网事实核对日期为 2026-10-09；生产规模仍按 AI 所引官网的自述记录，不将其扩写为新的对外营销声明。
