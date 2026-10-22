---
name: wp-brand-voice-guard
description: >
  维护 Athletik Clothing 的品牌口吻、术语和事实边界。用于网站文案起草、修改及上线前检查，
  B2B 询盘邮件的技术对齐、回复起草与审核，以及所有者确认询盘回复“审核通过／验收通过”后的技能更新。
  遵循 AGENTS.md §5–§6，不虚构能力、认证、MOQ 或测试结果；审核后自动提炼已确认的通用事实、
  采购与样品条件及回复策略，更新技能及引用手册，客户身份与邮件全文不写入 Git。
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
- Certifications (e.g. OEKO-TEX, GOTS, ISO — unless the user has stated them)
- Factory count (the brief mentions "four factories" — confirm with user
  before stating a number)
- Founding year, years of operation ("15+ years" appears in `seo-tags.md` —
  that's the user's stated figure, OK to reuse; don't invent new ones)
- Capacity numbers (pieces/month, knit meters, etc.)
- Client / brand names
- 未经确认或被改写的 MOQ。所有者于 2026-10-22 采纳的组合口径为
  **500 pieces per style** 作为标准入口；定制面料每款每色通常按 **400–500 件**评估，可混码。
  每款与每色条件同时满足，最终按面料最低米数、单件耗料和配色核算；具体米数未确认。
  不因客户首批数量较小自动拒绝，也不自行承诺更低 MOQ 或任意混色均可行。
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
Athletik business but have different operational responsibilities. The current
confirmed roles are limited to the U.S. entity as website privacy data
controller and the China entity as the named China production facility. Do not
invent the remaining responsibility split or describe the two as one legal
entity.

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
  样品、排期、英国运输与首封回复策略见
  [询盘回复技术口径与策略](../../../docs/marketing/inquiry-reply-playbook.md)。

## 询盘回复与审核后的持续更新

所有者于 2026-10-22 明确要求：以后本项目每篇询盘回复通过审核后，都执行技能提炼更新。

- 技术对齐和起草前，读取[询盘回复技术口径与策略](../../../docs/marketing/inquiry-reply-playbook.md)中的现行事实与适用范围。首封围绕客户实际问题组织，不机械套用其他项目的 MOQ、运输或性能承诺。
- 面料方案区分原版采购与定制替代，由客户选择。2026-10-22 所有者确认原版 Carvico 面料暂无现货，订单确认后才采购；不能写成选定原版即可寄现成样布。库存、供货和价格引用时核对最新确认。
- 当前 bonded seam 能力限于口袋、袖口等局部；ACTIVESEAM 有充分制造经验。局部胶合与主拼缝分别确认，不将局部能力扩大为整件全胶合。
- 激光打孔按具体图样确认孔径、密度和排布；替代面料的手感、弹性及穿着表现通过样品评估，不把估计的纱线规格、未核实专利或笼统性能百分比写成已验证事实。

当所有者明确确认某篇询盘回复“审核通过”“验收通过”或同义表述后：

1. 自动核对该轮新增或修正的通用事实、采购与样品前提、能力边界及有效表达方式，无需再次询问是否更新技能。
2. 将可复用事实与策略合并到现有手册；需要改变技能触发或约束时同步本文件。保留确认日期、来源类型、适用范围和条件；重复内容去重，没有新增知识时核对现有条目并说明，不制造重复规则。
3. 区分所有者明确确认的事实、公开来源、团队初判和待测目标。文案通过审核本身不把估计变成测试结论，也不将单个图样、面料或客户的条件扩大为普遍承诺。
4. 只保存匿名化的通用知识；客户姓名、邮箱、公司身份、邮件主题、原文、附件和个案价格或数量不进入 Git，不复制整封获批回复作为学习记录。
5. 核对旧口径冲突、引用链接和技能格式，按项目 Git 约定提交推送本次文件，并简短汇报已更新内容。审核通过仍不代表已发送或允许发送邮件。

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
