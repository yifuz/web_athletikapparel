# Services Page — Copy  (/services/)

Single overview page. Walks a buyer through "what it's like to work with us"
from sample to shipment. The 4 stages are sections on this one page (not
separate pages). Companion to docs/sitemap.md and docs/site/design-brief.md.

GUARDRAILS:
- "Vertically integrated / our own facility / our own fabric mill" only. NEVER
  factory count or subcontracting.
- Export documentation is industry-standard — mention it plainly, do NOT
  over-hype it as a differentiator.
- Numbers consistent: 15+ yrs · 4,500+ m² · 100,000+ pcs/month · MOQ 1,000 pcs
  per style. Sampling 1–2 weeks.
- Voice: professional + warm. User writes any deeper prose; placeholders for
  anything to expand. No stock photos.

================================================================
## H1
================================================================
**Our Services**
(only h1 on the page)

## Intro
> From first sample to final shipment, we work as an integrated production
> partner — handling the full process in-house so performance brands can move
> from design to delivery with one reliable team. Whether you bring a finished
> tech pack or an early concept, we'll guide it through every stage.

================================================================
## Capabilities summary (short strip near top)
================================================================
- Full-package OEM / ODM — to your designs, samples, or tech packs
- Vertically integrated — from our own fabric mill to finished garment
- Technical knit construction — flatlock, activeseam, bonded-welded
- 15+ years serving brands across North America, Europe & the Nordics

================================================================
## The 4 process stages (page sections)
================================================================

### 1. Sampling & Prototyping
> Every project starts with getting the sample right. We develop counter
> samples, prototypes, and pre-production samples from your tech packs, sketches,
> or reference garments — typically within 1–2 weeks, depending on complexity.
> Our sample room is equipped for flatlock, activeseam, and bonded-welded
> construction, so what you approve is what goes into production.

[IMAGE: real sample room / prototyping shot]

### 2. Bulk Production
> Once samples are approved, we move into bulk production in our own facility.
> With technical knit construction and flexible, scalable capacity, we handle
> orders from 1,000 pcs per style and scale up without compromising quality or
> lead times.

[IMAGE: real production floor shot]

### 3. Quality Control
> Quality is built in at every stage, not just inspected at the end. From our
> own fabric mill with in-house testing to in-line and final garment inspection,
> we control quality from yarn to finished piece — so every shipment meets the
> standard your brand depends on.

[IMAGE: real QC / inspection shot]

### 4. Export & Shipping
> We handle export and logistics in-house, booking freight directly. We support
> FOB and DDP terms and prepare the standard export documentation, so your order
> ships smoothly from our facility to your destination.

[IMAGE: optional — packing / shipment shot]

================================================================
## Closing CTA
================================================================
> Ready to start a project? Tell us what you're building and our team will get
> back to you with a quote and next steps.

Button: Request a Quote → /contact/

================================================================
## Build notes (for Codex)
================================================================
- Only one h1 ("Our Services"); the 4 stages are h2, sub-points h3.
- Unique <title> + meta description. Suggested title:
  "OEM Knitwear Services — Sampling to Shipping | Athletik Clothing".
- Reuse site layout/tokens (warm palette, accent CTA). Mobile-first AND verify
  desktop (e.g. the 4 stages as an alternating image/text layout or a clean
  numbered sequence on desktop; stacked on mobile).
- Link the closing CTA to /contact/. Optionally link relevant stages or the
  capabilities strip back to product category pages for internal SEO.
- `[CONTENT: ...]` / `[IMAGE: ...]` are editor placeholders — never render the
  literal text; replace images with real photos + descriptive alt text.
- Do NOT over-emphasize the Export stage; keep it factual and brief.
