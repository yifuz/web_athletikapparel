# Design Brief — myathletik Homepage (v1)

Status: implemented. Use `docs/progress.md` and the current templates for live
copy, block status, and asset delivery; this file remains the visual-direction
brief.

Companion to `AGENTS.md` and `docs/sitemap.md`. Read this before
building the homepage. It defines the visual direction, the homepage block
order, and what to borrow vs. avoid from the reference site.

Reference site studied: **hongyuapparel.com** (homepage). We adapt its proven
*structure*, but NOT its visual style or tone. Hongyu targets fashion startups;
myathletik targets mid-sized brand clients placing technical knit orders. Do not
copy Hongyu's look, copy, or startup framing.

---

## 1. Desired impression

**"Professional, credible, and warm technical manufacturing partner."**
Technical competence is the foundation; warmth and brand personality are how
it's delivered. Avoid two failure modes:
- Cold industrial "parts catalogue" feel (what many knit OEM sites look like).
- Startup hand-holding tone (what Hongyu does — NOT us).

The visitor should feel: *this is a capable, established factory I can build a
long-term partnership with, run by real people who understand my brand.*

---

## 2. Visual direction (this drives the :root tokens in style.css)

### Color — warm, not cold
- Base: warm off-white / cream backgrounds (not stark white), soft warm grays.
- Text: warm near-black (not pure #000).
- Accent: a warm energetic tone (terracotta / burnt orange) used sparingly for
  CTAs, links, and highlights — signals activewear energy + human warmth.
- Keep contrast accessible (WCAG AA for text).
- Current `:root` tokens in style.css are set to this warm palette as a starting
  point. Tune values, don't replace the system.

### Typography
- Clean, modern sans for body; a slightly characterful sans (or high-quality
  geometric/humanist sans) for headings to add warmth without losing
  professionalism. Avoid cold corporate Helvetica-clone sterility.
- Generous line-height and sizing; readability over density.

### Texture & shape
- Rounded corners (use `--ma-radius`), soft shadows, real photography.
- Generous whitespace and breathing room between sections — warmth comes partly
  from NOT cramming.
- **Real factory / people / sample photography**, never stock. The current site's
  stock imagery (incl. a Hyundai stock photo) is a credibility problem. Warmth =
  real machinists at flatlock machines, the sample room, the regional
  merchandiser team, real products. Use `[IMAGE: description]` placeholders where
  the user will supply real photos.

---

## 3. Homepage block order (adapted from Hongyu's funnel)

Build the homepage as these sections, top to bottom. Each is a template part in
the child theme. User writes the prose; agent builds structure + microcopy +
placeholders.

1. **Hero**
   - One H1 (the page's only H1), a one-line positioning subhead, primary CTA
     ("Request a Quote" / "Start a Project"), real factory hero image.
   - Tone: confident partner, not "new brand? we're your first stop." 
   - The approved production headline and subhead are recorded in
     `homepage-copy.md` and the live template.

2. **Capability proof strip**
   - 3–4 quick trust signals: vertically integrated, flatlock/activeseam
     technical construction, own production facility, full export
     documentation. Never publish a factory count or subcontracting details.
   - Icons + short labels (microcopy agent may draft).

3. **Product categories grid** (7 cards)
   - Borrowed from Hongyu's category wall. Each card → its `*-manufacturer/` page.
   - Replaces the current 30-image untitled wall. Real category photos + alt text.

4. **Why myathletik** (adapted from "Why Choose Hongyu")
   - 4–5 reasons, but TECHNICAL framing (not startup framing):
     vertical integration · technical knit construction (flatlock/activeseam) ·
     finishing capabilities (Carbondry, laser perforation) · regional
     merchandiser teams (NA/Europe/Nordics) · export & trade competence.
   - `[CONTENT: user to write the body of each reason]`

5. **Numbers / proof** (adapted from Hongyu's "Numbers We Are Proud Of")
   - Use only the confirmed public proof points recorded in `AGENTS.md` and
     `docs/progress.md`. Never publish a factory count, subcontracting detail,
     or unconfirmed team size.
   - Keep the number and unit in separate elements with stable spacing and
     height so mixed-length values remain aligned across desktop and mobile.
   - For any new figure, use `【NEEDS INPUT: confirm exact number】` rather than
     inferring or fabricating it.

6. **Process snapshot** (adapted from "How We Make It")
   - 4-step strip: Sampling & Prototyping → Bulk Production → QC →
     Export & Shipping. Links to /services/.
   - The Export step is the differentiator (CI/PL/CO, sea freight, incoterms) —
     give it weight. `[CONTENT: user to write step descriptions]`

7. **Client / partnership trust** (adapted from Hongyu's testimonials)
   - Real client relationships (e.g. equestrian brand work) framed as
     partnership stories. Only with the user's approval on what's public.
   - `[CONTENT + NEEDS INPUT: user to confirm what client info is shareable]`

8. **Certifications / audits strip**
   - Keep the existing badge row (it's legitimate proof). Real badges only.

9. **Latest from blog** — deferred; the current homepage keeps this block
   disabled until real posts exist.

10. **Inquiry CTA band + form**
    - The current shared form uses product category, estimated order quantity,
      business type, website, and a project message. Fluent Forms File Upload
      is not available in the current free-tier setup, so the Message prompt
      asks for a tech pack link when available.

### Explicitly DROP from Hongyu (do not build these)
- The 3-tier "difficulty level" comparison with percentage bars (startup
  education device — wrong audience).
- Price-competition language ("best value", "affordable", "lower your inventory
  risk", "100 pieces to start").
- Startup-targeted hero framing ("new fashion brand?", "your secret weapon").
- Keyword-stuffed SEO prose.

---

## 4. Build approach for Codex

- Build section by section as template parts; assemble into the homepage
  template. Keep each part independently editable.
- Use the `:root` design tokens for ALL colors/spacing/type — no hardcoded hex
  values in section CSS.
- Mobile-first responsive; this is a server-rendered GeneratePress child theme.
- Every text slot the user must write → `[CONTENT: user to write]`.
  Every fact to confirm → `[NEEDS INPUT: ...]`. Never invent numbers, clients,
  or certifications.
- Propose the template-file plan and section structure FIRST (Codex has no plan
  mode / diff preview — review before it writes), then implement on approval.
