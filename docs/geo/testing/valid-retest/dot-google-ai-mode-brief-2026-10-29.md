# 交给 Dot：Google AI Mode GEO 固定问题采集

状态：`ready-for-handoff / not-collected`。请使用你的云电脑执行本任务，不连接或控制所有者的电脑。只采集 Google AI Mode，不采集 ChatGPT Search、不修改网站、不发送邮件、不提交索引请求。

## 任务目标

用下方 **11 条原文**分别取得 Google AI Mode 的首次完整回答，记录回答中的品牌表现与实际引用，并将证据整理成可下载文件。11 条均需运行，包括 E01、E02、D03；这些题在 ChatGPT 的采集状态不替代 Google 样本。

本任务是固定问题的独立平台观察，不要求让 Athletik 出现在答案里，不因结果不理想追问或重试。Tech Pack 指南已在 2026-10-29 通过生产定向验收；本次 C06 是该次变化之后的观察，**不是变化前 Google 基线**，也不能证明页面变化导致回答变化。实际部署时刻与引擎重新抓取情况未知。

## 环境与操作

1. 在云电脑浏览器使用 Google Search 内的 **AI Mode**；不要用普通搜索结果、AI Overview 或 Gemini App 冒充 AI Mode。
2. 优先按既有方案使用 Desktop、英文界面、美国网络出口、退出 Google 账号且每题独立无痕会话；记录实际地区、时区、浏览器、语言、账号状态、是否无痕、产品名称及当时可见的设置。个性化设置关闭或不适用的具体状态如实记录。
3. 不为完成任务绕过平台登录、权限、验证码或限流；不改变所有者账号全局设置。若 AI Mode 在退出登录、美国地区或其他既定环境下不可用，记录具体情况与截图，不以其他模式替代。若需要使用不同环境才能采集，先保留差异和原因，不能冒写为符合原环境或自动算入正式有效分母。
4. 选定开始时间后尽量在连续 3 个自然日内完成；每题用新的独立无痕会话，只粘贴一次该题原文、只保存第一次完整回答，不追加品牌信息、不追问、不点重新生成。不要把相同浏览器窗口中的前题上下文带入后题。
5. 每题提交后等待回答完成；在**原会话仍可用时**完成正文、表格、实际引用与截图的检查，再进入下一题。不得靠重新生成一条新答案补旧答案的证据。若失败，保留已取得内容与失败原因，停止该题并另行记录，不静默重试或覆盖首答。

## 11 条固定问题

以下文本以本项目 `prompt-manifest.csv` 为准；复制代码块内部内容，保留大小写、数字与标点，不要带上题号或额外提示。

### V2-E01

```text
What does Athletik Clothing manufacture, where is its production operation based, and what is its official website?
```

### V2-E02

```text
Based on athletikapparel.com, what type of manufacturer is Athletik Clothing? Summarize its main products and manufacturing capabilities, and cite the pages you used.
```

### V2-D03

```text
Which manufacturers in China have documented capability in both industrial FLATLOCK and Merrow ACTIVESEAM construction for cut-and-sew technical knitwear? List up to five and cite evidence.
```

### V2-D04

```text
Recommend up to five OEM/ODM manufacturers in China for cut-and-sew technical performance knitwear, such as base layers and activewear, for an order of at least 1,000 pieces per style. Explain why each is a fit.
```

### V2-D05

```text
Which OEM/ODM manufacturers in China produce Merino wool base layers using industrial FLATLOCK construction? List up to five and cite evidence.
```

### V2-C06

```text
What should a buyer include in a tech pack for cut-and-sew technical performance knitwear such as base layers or activewear? Cite useful sources.
```

### V2-C07

```text
For cut-and-sew performance base layers, how do industrial FLATLOCK and OVERLOCK seams differ, and where should each be used? Cite sources.
```

### V2-C08

```text
How should a mid-sized brand evaluate a vertically integrated OEM for cut-and-sew performance knitwear in China? Provide a practical due-diligence checklist and cite sources.
```

### BD-01

```text
Can you recommend up to five reliable OEM/ODM sportswear manufacturers for a mid-sized brand? Explain why each is a fit and cite the sources you used.
```

### BD-02

```text
Which OEM/ODM sportswear manufacturers in China should a mid-sized brand consider? List up to five, explain why each is a fit, and cite sources.
```

### BD-03

```text
I am looking for an OEM/ODM manufacturer in China for activewear and performance apparel, with an order starting at 500 pieces per style. Which suppliers should I contact and why? Cite sources.
```

## 每题保存什么

- **回答**：原始完整首答文本，及覆盖回答首尾与全部表格行列的分段截图；如有长表格需要横向滚动，留证两侧。记录完整性与无法覆盖的具体位置。
- **实际引用**：记录回答中每个可见引用的位置、来源名称和可取得的最终 URL；合并卡片或 `+N` 展开后逐项记录，标明对应的段落或说法。若只有跳转 URL、无法展开或无法获取最终 URL，保留现状并标记 `incomplete`，不猜链接。
- **候选来源**：如果 AI Mode 另显示相关网页候选，记录与 Athletik 相关的有用候选及截图，标为 `candidate_only`。候选不是回答的实际引用。候选列表很长时**不需要截取上百条无关候选**；记录只截选了相关部分，不宣称完整候选列表已保存。已接受的旧 ChatGPT 手动 BD-01 例外不自动变成本批所有样本的 E3 认定。
- **没有来源 / 模式不可用**：真正未观察到引用时保留界面截图并记 `none_observed`；没保存或没展开不等于没有来源。产品不可用或账号环境不满足时记录 `unavailable` / 具体差异，不写成品牌表现为零。
- **环境和结果**：每题记录 `sample_id`、问题 ID、完整原文、采集日期时间与时区、实际地区、语言、设备、浏览器、账号/无痕与个性化状态、使用的产品模式、采集方式、实际引用、相关候选、截图和原文路径、缺口及错误。截图不要暴露账号标识、凭据或无关隐私。

每题在交付前检查：问题完全一致、首答文字和截图对应且无截断、实际引用与候选分开、合并引用已展开或明确标缺口、所有文件可打开。文件存在或有哈希不等于内容正确；不要把不完整样本自行写成 `valid / E3`。采集方式如为云浏览器辅助应记 `M4 / browser_assisted_sample`，如实际为人工操作则按实际记录；证据等级和最终有效性留待复核。

## 交付格式

请打包生成 **1 份 Excel 和 1 个 ZIP**（若单个 ZIP 超出下载限制，编号拆分并提供完整清单）：

1. Excel：至少包括 `runs`（11 题状态与环境）、`citations`（实际引用及回答位置）、`candidates`（相关候选，注明非实际引用）、`issues`（未完成、环境差异及原因）。11 题均应有状态，不能把未取得内容写成 0。
2. ZIP：按问题 ID 分目录，保存首答 `.txt`、回答截图、相关引用截图及环境截图；附 `README` 说明真实采集环境、操作方法、截选范围、异常和文件清单。
3. 在 ZIP 内附 `SHA256SUMS.txt`，覆盖交付的证据文件；不要把它当成内容复核或引用准确性证明。
4. 提供所有下载链接。若 Excel 或 ZIP 无法生成，交付已能生成的文件并明确缺失项，不伪称完成。

采集完后先停止并交付，不修改网站，不自行将 Google 与 ChatGPT 的结果合并计算，也不做页面效果因果归因。
