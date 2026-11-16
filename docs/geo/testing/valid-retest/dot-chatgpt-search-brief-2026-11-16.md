# Dot 任务：ChatGPT Search 三题 GEO 复测

日期：2026-11-16。历史状态：`prepared / not-run`。所有者随后说明 Dot 已到期，改为[手动采集](manual-2026-11-16/README.md)；D04 已接受，BD-02 / C08 待采。下文保留原固定题与云电脑任务方案，不能写成 Dot 已执行。目标是观察宽泛采购问题中的 Athletik 提及与引用，以及 C08 指南的来源选择；不承诺获得推荐，不为正面结果重采。

## 平台与环境

- 只使用 **ChatGPT Search**，三题各开启一个全新独立会话，按下列原文输入；不使用现有聊天、不引用本任务包中的品牌、网站或既有结论作为额外提示。
- 记录实际日期、时间、时区、国家／地区（无法确定写 `unknown`）、界面语言、账号状态、个性化／记忆状态、设备／浏览器及产品模式。不要修改用户本机浏览器或关闭其他工作页面。
- 搜索模式或平台不可用时记 `unavailable` 和原因，不切换到普通聊天或其他平台冒充。采用实际环境留证，不将未知地区补写为美国，也不声称与历史批次完全同环境。

## 固定提示词

以下原文与 [`prompt-manifest.csv`](prompt-manifest.csv) 一致。每题只提交一次，取得完整首答，不添加品牌名或指定网站。

### V2-D04

Recommend up to five OEM/ODM manufacturers in China for cut-and-sew technical performance knitwear, such as base layers and activewear, for an order of at least 1,000 pieces per style. Explain why each is a fit.

### BD-02

Which OEM/ODM sportswear manufacturers in China should a mid-sized brand consider? List up to five, explain why each is a fit, and cite sources.

### V2-C08

How should a mid-sized brand evaluate a vertically integrated OEM for cut-and-sew performance knitwear in China? Provide a practical due-diligence checklist and cite sources.

## 逐题采集与交付

1. 每题等待首答完成，在同一会话保存完整正文及必要截图；宽表要检查左右两侧。记录回答是否提及 Athletik、具体措辞和推荐理由；未提及照实记录。
2. 逐项展开回答中**实际引用**，记录最终 URL、来源名称及其支持的回答位置；合并引用若无法展开，保留未完成状态和原因。Sources 面板中相关但未被正文引用的条目单列为**候选**。只截取与判断相关的内容，无需把上百条无关候选全部截图。
3. 每题保存后立即核对原题、完整正文、必要截图、引用与 URL、环境记录；发现截断或引用无法展开时，先在原会话补救。仍无法补齐则记录 `partial`、原因和范围，不静默重问或编造 URL；中断尝试及原因也要保留。
4. 交付一个 Excel，含 `runs`、`citations`、`candidates`、`issues` 四个工作表；再交付按题分文件夹的 ZIP，包含首答文本、必要截图、环境与问题记录、README 和 `SHA256SUMS`。哈希只用于文件完整性，不代替对内容的审核。
5. 不要自行填写未知地区、缺失链接、排名或测试结果；不把 Sources 候选算作正文引用。不要自行把所有记录判为 `valid / E3`：由原始证据及所有者已接受的适用范围复核。此前手动 BD-01 的接受决定继续有效，不自动推广到新样本。

## 结果边界

单次首答是观察，不是稳定推荐率。保持不同日期、ChatGPT Search / Google AI Mode、M2 / M4 和实际环境分开；记录本轮是否引用 About 买家名单、面料库、产品页或 C08 原文，但不把结果变化归因于某次部署或宣称 Google 已抓取 C06 新版。采集完成后仅交付文件，不修改官网、社交账号或第三方资料。
