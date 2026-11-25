---
name: wp-brand-voice-guard
description: >
  维护 Athletik Clothing 的品牌口吻、术语和事实边界。用于网站文案起草、修改及上线前检查，
  B2B 询盘邮件的技术对齐、回复起草与审核，以及所有者确认询盘回复“审核通过／验收通过”后的技能更新。
  遵循 AGENTS.md §5–§6，不虚构能力、认证、MOQ 或测试结果；审核后重点提炼跨客户可复用的回复策略，
  保留必要的通用商务条件与能力边界，不积累面料规格或单个项目参数，客户身份与邮件全文不写入 Git。
---

# wp-brand-voice-guard — Brand Voice, Terminology & Anti-Fabrication

This skill enforces the **content rules** in AGENTS.md §5 and §6. It's the
"don't embarrass the brand" guard.

## The two hard rules

### Rule 1 — Draft body copy only with explicit authorization (AGENTS.md §5)

> Agents may draft long-form body copy only when the user explicitly asks or
> authorizes them to do so. A scoped request to write, draft, rewrite or
> translate specific content counts as authorization for that content. The
> result remains a draft until the owner reviews and approves it for
> publication.

What the agent **may always** write (structural / microcopy):
- Headings and labels (H1/H2/H3 text, nav labels, button labels)
- alt text (real keywords — see `wp-image-optimize`)
- SEO Title / Meta Description (per `seo-tags.md`, technical tone)
- Schema field values that are factual (entity name, URL — not marketing copy)
- Code comments, commit messages

What the agent **may write only with explicit user authorization**:
- Page intro paragraphs
- Product descriptions
- Marketing / positioning paragraphs
- About-us / sustainability narrative
- Service process explanations
- Blog posts

When authorization is absent, or a required fact is unknown, insert:
- `【CONTENT: user to write】` — for prose the user will author.
- `【NEEDS INPUT: <what's needed>】` — for a specific unknown fact.

### Rule 2 — No invented facts (AGENTS.md §5)

> Do not invent facts, certifications, capacity numbers, or client names. If a
> factual detail is needed and unknown, insert a `【NEEDS INPUT: ...】`
> placeholder rather than fabricating.

Specifically never invent:
- 未经所有者确认的认证或审核。可用清单与边界见[询盘回复手册的认证、审核与评估资料](../../../docs/marketing/inquiry-reply-playbook.md#认证审核与评估资料)；区分认证、审核、平台和评估工具，按具体材料／订单核对适用范围。
- Factory count (the brief mentions "four factories" — confirm with user
  before stating a number)
- Founding year, years of operation ("15+ years" appears in `seo-tags.md` —
  that's the user's stated figure, OK to reuse; don't invent new ones)
- Capacity numbers (pieces/month, knit meters, etc.)
- Client / brand names
- 未经确认或被改写的 MOQ。所有者于 2026-10-22 采纳的组合口径为
  **500 pieces per style** 作为标准入口；定制面料每款每色通常按 **400–500 件**评估，可混码。
  每款与每色条件同时满足，按面料最低米数、单件耗料、配色及定样、生产、QC、运输成本核算；
  具体供应商的采购米数按当前项目核实，不作为默认回复条款。
  不因客户首批数量较小自动拒绝，也不自行承诺更低 MOQ 或任意混色均可行；同款返单按下文已确认的灵活性评估。
- Awards, partnerships, media mentions
- An unconfirmed legal/operational responsibility split between Athletik
  Clothing Inc. and Zhangjiagang Athletik Clothing Co., Limited

If a fact is needed and not in `seo-tags.md` / `docs/sitemap.md` /
`*-copy.md`, **ask the user** or use `【NEEDS INPUT: ...】`.

## Terminology (AGENTS.md §6)

When the agent writes any text (headings, labels, alt, microcopy), spell these
technical terms **exactly** as below:

| Term                  | Correct form             | Common wrong forms                |
|-----------------------|--------------------------|-----------------------------------|
| FLATLOCK              | FLATLOCK (all-caps brand-style for the technique; lowercase "flatlock seam" / "flatlock stitch" OK in prose) | Flat-lock, flat lock, FlatLock |
| ACTIVESEAM            | ACTIVESEAM (all-caps)    | Active seam, ActiveSeam, Active Seam |
| SELF FABRIC           | SELF FABRIC              | Self-fabric, self fabric          |
| SCREENPRINT           | SCREENPRINT (one word)   | Screen print, screen-print, ScreenPrint |
| COVERSTITCH           | COVERSTITCH              | Cover stitch, cover-stitch        |
| OVERLOCK              | OVERLOCK                 | Over-lock, over lock              |
| Carbondry             | Carbondry (capital C, one word) | Carbon dry, CarbonDry, Carbondry™ (no ™ unless user says so) |
| Laser perforation     | Laser perforation        | laser-perforation (hyphen only as adjective: "laser-perforated") |
| Merino wool           | Merino wool              | merino Wool, Merino Wool (caps vary; "Merino wool" is the user's form) |
| Vertically integrated OEM | Vertically integrated OEM | vertically-integrated (no hyphen needed) |
| MOQ                   | MOQ (abbr.) / Minimum Order Quantity (first use) | M.O.Q, moq |
| Tech pack / spec sheet | tech pack / spec sheet   | tech-pack, TechPack               |
| Brand / entities      | Athletik Clothing (public brand); Athletik Clothing Inc. (U.S. entity); Zhangjiagang Athletik Clothing Co., Limited (China entity) | MyAthletik, Myathletik, ATHLETIK (caps), or treating either jurisdictional entity name as the sole public brand |

The owner confirmed that the U.S. and China entity names belong to the same
Athletik business but have different operational responsibilities. Confirmed
roles (updated 2026-11-20): `Athletik Clothing Inc.` (U.S.-registered company)
serves as website privacy data controller, North America sales office, and the
standard commercial contracting, Proforma Invoice (PI), and payment collection
entity; `Zhangjiagang Athletik Clothing Co., Limited` (Chinese legal name
`张家港市雅诗蓝泰制衣有限公司`, USCC `91320582MA20YTQJ6K`, factory at No. 15,
Zhongxing Road, Yangshe Town, Zhangjiagang) is the China manufacturing entity,
supported by our Zhangjiagang office (`Suite 618, Huafang International Plaza,
No. 178, Chengbei Road, Zhangjiagang`). Do not invent unconfirmed
responsibilities (such as China export customs declarant, employment, or IP
ownership) or describe the two as one legal entity or parent/subsidiary.

## Pre-publish / pre-commit check

Before committing any page or template that contains text:

1. **Confirm the authorization and approval state.** Long-form copy needs an
   explicit user request or authorization. Treat new agent-written copy as a
   draft until the owner approves it for publication.
2. **Scan for placeholders still in place.** If `【CONTENT: ...】` or
   `【NEEDS INPUT: ...】` is still in the file, decide:
   - If publishing to production → block / warn (placeholders must not ship).
   - If local dev / staging → OK to commit, but flag in the commit message.
3. **Scan for fabricated facts.** Grep for numbers, certifications, years,
   client names that aren't sourced from `seo-tags.md` / `docs/` / user input.
4. **Scan for terminology drift.** Check the terms above are spelled correctly.
5. **Scan for stock-photo-style marketing fluff** the agent might have slipped
   in ("world-class", "industry-leading", "cutting-edge", "premier",
   "top-tier", "best-in-class"). These violate the technical-confident tone.
   Replace with specific technical claims or remove.

## Tone (for agent-written text)

From AGENTS.md §5 + `docs/site/design-brief.md`:
- **Technical, confident, specific.** Like a manufacturer talking to
  professional buyers.
- **Not startup-pitch warm.** No "we're passionate about...", "your success is
  our mission", "let's build something amazing together".
- **Not cold-industrial catalogue.** Warmth comes from specificity and
  competence, not from buzzwords.
- **Specific > generic.** "Flatlock seam construction at 14 SPI" beats
  "high-quality stitching".
- 主要面向采购技术针织服装的中型 B2B 品牌和批发商，优先较大订单和持续返单；
  小客户和小单保留沟通与项目评估空间，MOQ 使用上方已确认的每款与每色组合口径。
- 询盘邮件语气应友善、亲切、专业；首封简短但覆盖客户关键问题。先回答已确认事项，
  对待评估性能和商务条件说明需要哪些资料，不虚构价格、测试结果或交期。
  样品收费、寄样、制样前数量评估、排期、英国运输与首封回复策略见
  [询盘回复技术口径与策略](../../../docs/marketing/inquiry-reply-playbook.md)。

## 询盘回复与审核后的持续更新

所有者于 2026-10-22 明确要求：以后本项目每篇询盘回复通过审核后，都执行技能提炼更新。
2026-10-23 补充：重点积累回复策略；具体面料型号、规格、供应商采购米数和临时库存留在项目上下文中，相关客户需要时再核实。

- 技术对齐和起草前，读取[询盘回复技术口径与策略](../../../docs/marketing/inquiry-reply-playbook.md)中的现行事实与适用范围。首封围绕客户实际问题组织，不机械套用其他项目的 MOQ、运输或性能承诺。
- 所有者于 2026-11-06 确认 Foxmail 已配置自动签名；邮件草稿只提供必要的主题、称呼和正文，不重复附结束敬语或签名。
- 回答客户实际问题，按沟通阶段选择信息：直接说明标准 MOQ，避免不必要地强调客户询价数量低于标准；客户未询问的打样费用与细节不必主动展开。定制项目未提供 tech pack 时，简短说明准确报价需要技术资料，优先索取 tech pack，暂不展开过多具体报价、生产或打样细节；参考图片可辅助理解，但不保证足以准确报价。
- 不自行确定未经所有者确认的技术路线或设计方案；对尚未确认的结构、材料适配和生产可行性先审核资料并与所有者对齐。面料推荐仅使用已确认选项，具体项目适用性仍需评估。
- 所有者于 2026-11-06 确认：公司提供 OEM 制造，不提供独立产品设计服务；常规由客户提供最终设计、图案排位及成衣 tech pack，我方评估生产。区分产品设计与面料开发／生产技术转化，不自行要求客户提供机器编织文件。2026-11-20 补充修正：公司没有标准化的公开现款私标（private-label）目录库，官网展示款默认作为过往生产参考；但对缺少自有设计师的客户，可按品类匹配度与版型权属边界，经所有者按项目确认后评估沿用或微调过往做过款式的参考版型／tech pack，不写成一刀切“不可套用”，也不自动承诺任意品类均有可授权私标现款。
- 配套围脖的 MOQ 按实际用料区分：与成衣不同面料时每款 500 件；同面料时可结合成衣订单和面料用量调整，不承诺固定更低件数或推广至其他配件。具体适用范围见手册。
- 可使用所有者批准的既有案例参考价帮助客户了解价格范围，但应明确对应材料／系列及计价条件；新项目仍需技术资料后报价，不将案例价格、成分或可供面料等同于已满足客户的新设计。下单时核实原材料价格，不积累个案报价。
- 所有者于 2026-11-05 确认：客户技术要求较多但订单计划不明确时，先了解款式、每款数量、颜色与时间，关键技术边界简短承接，详细核验随项目推进；已有文字 brief 不等于没有技术资料。公司行业或邮件写法不能单独证明客户的纺织专业程度或是否使用 AI。
- 分享产品页、成衣案例和社交渠道时，区分展示生产经验与推荐已符合要求的方案；材料限制按实际成分及整件要求评估，不把混纺优势写成保证。非常规材料如需寻找与评估，如实说明，不将当前库存或生产占比固化为长期能力限制；详见手册中的采购与首封回复策略。
- 所有者于 2026-10-28 授权按项目匹配度与潜在订单规模调整跟进优先级和回复深度。2026-10-29 补充：尚未提供任何技术资料的询盘，内部暂按低价值、低优先级跟进，简短友善地回答核心问题并优先索取已有 tech pack；收到技术资料后结合其他信息重新评估。此分类是内部资源分配规则，不证明客户采购能力或长期价值，也不自动拒绝；不要对客户使用低价值标签。其他资料不足的情形仍按实际信息判断。报价档位是近期计划规模的重要信号，但不等于确定订单量或长期采购规模；邮箱类型不能单独证明客户的公司性质或商业价值。
- 所有者于 2026-10-28 确认首次接触客户通常收取打样费，寄样运费包含在打样费中，具体金额按项目核算。2026-11-06 确认可按项目批准免费样品及国内运费，明确样品类型、数量和寄送范围，不改为全面免费，也不将国内免运费扩展到国际寄送。通常先了解预计数量与基本订单方案；所有者已批准先看样的项目按获准范围推进。款式与面料分别确认，现样、新制样品、费用及制样／运输周期不混用，详见手册。
- 区分面料采购 MOQ 与成衣生产 MOQ：除面料要求，还需覆盖定样、生产、QC 和运输成本。首次询盘问最低件数时直接回答每款 500 件的标准，低于标准仅作项目评估，不把采购米数直接换算成可接成衣件数。
- 返单与首单区分评估：所有者于 2026-11-05 确认，同款返单 MOQ 可适当放宽，但仍受面料最低量限制，不承诺任意小量或固定更短交期。客户关心持续合作时，说明已确认的返单经验和同等质量责任，具体事实与条件见手册；“100% 负责”不延伸为逐件全检或零缺陷承诺。
- 客户需要比较指定面料与定制替代时，说明路线和取舍，由客户选择；库存、样布可供性、采购前提及交期按当前项目确认，不把“可采购”写成“有现货”。
- 当前 bonded seam 能力限于口袋、袖口等局部；ACTIVESEAM 有充分制造经验。局部胶合与主拼缝分别确认，不将局部能力扩大为整件全胶合。
- 成本优势、性能接近和工艺效果按开发目标沟通，最终结果由样品或测试确认；不把某次项目的材料规格、工艺参数或估计结果推广为通用承诺。
- 已确认材料或处理方式不符合客户要求时，先披露差异并确认客户是否仍接受作为参考，再安排样品。纤维成分、处理阶段与所用助剂分别核实，不从成分或加工顺序推定无树脂／无合成材料。
- 所有者于 2026-11-20 确认：低于 500 件标准 MOQ 的小单仅能在有合适库存面料时评估（受库存颜色与数量限制），不得将 500 件定制方案混称为更低数量的定制报价；定制面料的端到端全流程与齐料、书面批样且约定付款后的纯成衣生产阶段须分开沟通，且均以当时工厂排期为准。
- 所有者于 2026-11-20 确认：初次供应商核验可提供 2026-05 更新的现行 amfori BSCI 摘要报告（如实说明是否另有单独 CAP 文件），营业执照副本须待确认具体合作意向后再提供；跟进回复避免重复首封已述定位或保密承诺、不冗长复述所附报告明细、不加防御性客套，发附件前须核对文档细节与既往回复的一致性。
- 所有者于 2026-11-25 确认询盘回复结构与“去 AI 味”标准：多问题可保留 `1. 2. 3. 4.` 分点便于扫读，但语气须自然直接、不死板；避免滥用长破折号（`—`）、避免各条机械重复相同开头（如连用 `Yes—`）、少用模板化过渡语与公关腔，结尾围绕核心下一步精简收口，详见手册。
- 所有者于 2026-11-25 确认跨项目能力与物流边界：支持实物来样定制面料开发（收样分析后再确认可行性与周期）；具备 COOLMAX 等品牌功能纱线生产经验，品牌吊牌资格、纱线最低量与测试要求须按纱线品牌方规定核对，不提前承诺自动获批；支持一站式辅料、车缝、吊牌与零售包装（指定品牌辅料可按型号直采或走客指渠道）；支持按要求分仓分批交付，常用贸易术语以 FOB 和 DDP 为主。

当所有者明确确认某篇询盘回复“审核通过”“验收通过”或同义表述后：

1. 自动提炼该轮可跨客户复用的回复策略，例如沟通顺序、MOQ 解释、小单评估和技术承诺边界；只保留必要、稳定的公司通用条款，无需再次询问是否更新技能。
2. 将有新增价值的策略合并到现有手册；需要改变技能触发或约束时同步本文件。保留通用条款的确认日期、来源类型和适用范围；没有新增策略时核对现有条目并说明，不为每封获批回复增加记录。
3. 区分所有者明确确认的事实、公开来源、团队初判和待测目标。文案通过审核本身不把估计变成测试结论，也不将单个图样、面料或客户的条件扩大为普遍承诺。
4. 不将单个项目的面料型号、成分克重、纱线规格、供应商采购米数或临时库存积累到通用技能及手册；按需回到项目资料核实。客户姓名、邮箱、公司身份、邮件主题、原文、附件和个案价格或数量不进入 Git，不复制整封获批回复作为学习记录。
5. 核对旧口径冲突、引用链接和技能格式，按项目 Git 约定先保存本地提交，并简短汇报已更新内容。所有者于 2026-11-06 改为阶段性批量推送；单篇回复验收不再触发立即推送或单独请求推送确认，批次范围按 `AGENTS.md` 核对。审核通过仍不代表已发送或允许发送邮件。

## Output format

When checking existing content:
```
## Brand Voice / Terminology Check — <file or page>

### Placeholders still present (must resolve before production)
- <file:line>: `【CONTENT: ...】`
- <file:line>: `【NEEDS INPUT: ...】`

### Suspected fabricated facts (need user confirmation)
- <file:line>: "<claim>" — not found in seo-tags.md / docs / user input

### Terminology drift
- <file:line>: "<wrong>" → "<correct>"

### Tone issues (fluff / wrong audience)
- <file:line>: "<phrase>" — <why it's off> — <suggested direction>

### Passed
- <what's correct>
```

When the user explicitly asks the agent to write long-form body copy:
- Draft only the requested scope.
- Mark the result as a draft requiring owner review before publication.
- Use approved facts and primary sources; use `【NEEDS INPUT: ...】` for any
  missing factual detail instead of filling the gap.

When the request is ambiguous and would require substantial new body copy:
- Ask whether the user wants a full draft, or provide an outline with
  `【CONTENT: user to write】` placeholders.

## Rules

- **Authorization before prose.** Draft long-form copy only within an explicit
  user request. When authorization or a required fact is missing, insert
  `【CONTENT: ...】` / `【NEEDS INPUT: ...】` and ask.
- **Reuse user-stated facts only.** What's in `seo-tags.md`, `docs/sitemap.md`,
  `*-copy.md`, or that the user said in conversation. Cite the source when
  reusing.
- **Terminology table above is authoritative** for agent-written text.
- **No fluff words.** If a phrase could appear on any OEM site, it's too generic.
