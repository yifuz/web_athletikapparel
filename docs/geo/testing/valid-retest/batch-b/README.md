# ChatGPT Search 重采批次 B

- 批次：`GEO-VALID-2026-10-B`。
- 采集日期：2026-10-09（Asia/Shanghai）。
- 范围：Baseline v2 8 条、Broad Discovery v1 3 条，固定原文与 SHA-256 沿用 [`../prompt-manifest.csv`](../prompt-manifest.csv)。
- 状态：`collection-complete / collection-checks-passed / owner-review-pending`。
- 已取得完整回答 11/11；正式 `valid` 分母仍为 0，尚未作正式有效性判定。
- 账本：[`collection-ledger.csv`](collection-ledger.csv)。本表是 11 条重采记录，不替代批次 A 的 22 行平台运行账本。

## 采集结果

| Prompt | 回答字符 | 回答分段截图 | Sources 截图 | Sources 搜索条目 |
|---|---:|---:|---:|---:|
| V2-E01 | 717 | 1 | 3 | 14 |
| V2-E02 | 3,259 | 4 | 5 | 24 |
| V2-D03 | 4,644 | 4 | 10 | 186 |
| V2-D04 | 7,044 | 6 | 1 | 231 |
| V2-D05 | 4,494 | 3 | 1 | 348 |
| V2-C06 | 17,990 | 15 | 1 | 343 |
| V2-C07 | 8,498 | 7 | 1 | 203 |
| V2-C08 | 20,084 | 15 | 1 | 469 |
| BD-01 | 8,041 | 6 | 1 | 357 |
| BD-02 | 5,968 | 5 | 1 | 176 |
| BD-03 | 9,315 | 8 | 1 | 313 |
| **合计** | **90,054** | **74** | **26** | **2,664** |

另有 C07 宽表格补充截图 1 张。上述 Sources 条目包含搜索候选和图像链接，不能把 2,664 条算作最终答案引用。答案 DOM 单独保存了 172 个行内外链锚点；包含重复链接及 `+N` 合并引用的首个链接，尚未逐组复核为完整引用集合。

## 私有证据与复用入口

证据根目录：`C:\Users\Administrator\seo-reports\geo-valid-retest\GEO-VALID-2026-10-B`。

该目录中的 `README.md` 是逐条回答索引，另有：

- `collected-samples.json`：完整回答与元数据聚合。
- `collection-ledger.csv`：完整采集字段和私有证据路径。
- `inline-citations.csv`：答案行内外链锚点。
- `search-source-candidates.csv`：完整 Sources → Web search 搜索列表，独立于行内引用保存。
- `file-manifest.csv`：167 个正式证据文件的 SHA-256、大小及 PNG 尺寸；测试截图和中断目录另行保留。
- `collection-validation.json`：11 条提示词哈希、正文长度、完成状态、截图覆盖和文件完整性检查通过。
- `environment-neutral-*.json/.png` 与 `environment-restore-*.json/.png`：恢复段的采样设置和采集后设置恢复证据。
- `network-resume-2026-10-09.json`：恢复段的浏览器出口地区记录。

原始回答、账号界面截图和完整来源清单均保留在 Git 外。可在本机重新运行 `build-evidence-index.ps1` 更新派生索引和检查结果；不要覆盖原始样本。

## 取证修正与环境记录

- 使用 `yao-chatgpt-crawler` 的浏览器采集规范；每条固定原文分别在新的 Temporary Chat 运行，记录可见模式 `Pro`，保存第一条自然完成回答。
- Memory、Space Search、Connector Search 关闭；昵称、自定义指令、职业和补充资料为空；风格为 Default，Web Search 开启。恢复段结束后已逐项核验恢复原设置。
- 完整 Sources 面板通过右上角 `Toggle summary` → `Sources` → `Web search` 取得。批次 A 的缺口是当次未取得完整面板，不能据此断言产品没有 Sources 面板。
- 回答截图按实际 Conversation 内部滚动容器分段，保留重叠。长 Sources 列表采用临时放大的面板与单张长视窗；隐藏装饰 favicon，不改来源标题、链接或顺序。布局与截图高度均记录在 metadata。
- C06 页面与保存全文均为 18,252 字符，回答正文 17,990 字符；C08 页面与保存全文均为 20,375 字符，回答正文 20,084 字符。长度一致，回答尾部已保存。
- 暂停前六条沿用上午的美国加州 Los Angeles 环境记录；恢复后的 C07、C08、BD-01～BD-03 在浏览器中核验的出口为美国加州 San Jose（`209.137.178.218`）。这属于已记录的网络变化，不能写成整个批次均使用同一城市、同一 IP。
- C07 有两次未完成尝试：10:42 所有者要求暂停，已 Stop；另一恢复尝试因执行者核验地区时误导航采集页而中断，于 14:01 归档。两次目录与原因均保留，正式首答记录来自新的替补会话。成功采集 11 条之外，另有 2 次未完成尝试。

## 正式复核闸门

本次通过的是采集文件与覆盖检查，不能直接升级为 E3 / `valid`。后续须按 [`../README.md`](../README.md) 的有效性标准完成：

1. 逐条核对题意、实体事实、推荐与候选、排名及规范站引用。
2. 逐组展开 `+N` 合并引用，核对全部链接和相邻结论的支持关系；Sources 搜索候选不自动等于答案引用。
3. 检查宽表格是否存在横向遗漏；C07 已补宽视窗证据，其余表格仍须逐条审查。
4. 核验网络变化对同一口径比较的影响，补完复核字段后再决定可进入正式分母的样本。

Google AI Mode 的 11 条仍在批次 A 中保留为 `planned`，本次没有运行；Perplexity 可用性也未在本次重新核验。采集期间未部署网站改动，旧批次 A 的原始证据与 `partial` 记录继续保留。
