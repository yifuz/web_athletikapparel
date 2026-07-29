# Contact Page — Copy & Form Spec  (/contact/)

Companion to docs/sitemap.md, design-brief.md. The conversion endpoint — all
homepage and product-page CTAs point here. Goal: capture qualified B2B
inquiries and gently filter out sub-MOQ leads via the order-quantity field
(without stating MOQ outright).

GUARDRAILS:
- Do NOT state MOQ as a hard rule on this page. The quantity dropdown's lowest
  tier softly signals scale instead.
- Address: publish ONLY the company's own facility address (real, public).
  Do NOT mention partner factories or factory count.
- Voice: professional + warm. Inviting, not gatekeeping.
- Form is front-end structure now; backend/email handling is a later task.

================================================================
## H1
================================================================
**Contact Us**
(only h1 on the page)

## Intro
> Tell us about your project and our team will get back to you with a quote and
> next steps. Whether you have a finished tech pack or just a concept, we're
> here to help you move from design to production.

================================================================
## Inquiry form fields
================================================================

**Contact details**
- Name* (text)
- Company* (text)
- Email* (email)
- Country / Region (text or dropdown) — helps route to the right regional team
- Website (url) — optional

**Project details**
- Product category of interest (dropdown — your 7 categories):
  Sportswear · Underwear · Outdoor Clothing · Merino Wool · Silk Wear ·
  Knitted Fabrics · Sports Accessories · Other
- Estimated order quantity (dropdown — softly signals scale, no MOQ stated):
  - Under 500 pcs
  - 500 – 2,000 pcs
  - 2,000 – 5,000 pcs
  - 5,000+ pcs
- Business type (dropdown):
  Established brand · New brand · Wholesaler / Importer · Other
- Message* (textarea) — "Tell us about your project: products, fabrics,
  timeline, or any questions."
- Attachment (file upload, OPTIONAL) — "Optional: attach a tech pack, sketch,
  or reference (PDF, image)."

**Submit button:** Send Inquiry

Note (microcopy under submit, optional):
> We typically reply within one business day.

================================================================
## Company details block (beside or below the form)
================================================================

**Get in touch**
- Email: info@athletikapparel.com
- WhatsApp: +1 604 404 9819 (`https://wa.me/16044049819`)

**Our facility**
- [CONTENT: user to fill in own-facility address — publish the self-owned
  factory address only; do NOT list partner factories]
- Optional: an embedded map of the facility location

[IMAGE: optional — real photo of the facility exterior or entrance]

================================================================
## Form behavior / build notes (for Codex)
================================================================
- Front-end structure + styling only for now; no backend submission/email yet
  (separate later task). Mark required fields with *.
- Use design-brief tokens (warm palette, accent color for the Send button).
- Mobile-first AND verify desktop (two-column: form left, company details
  right on desktop; stacked on mobile).
- File upload is optional — do not make it required; accept PDF + common image
  types; show a size limit hint.
- The "Under 500 pcs" tier stays in the dropdown (it's the soft signal) but MOQ
  is never stated as a rule anywhere on the page.
- `[CONTENT: ...]` / `[IMAGE: ...]` are editor placeholders — never render the
  literal text on the live page.

================================================================
## Cleanup tied to this page (from sitemap §8)
================================================================
- ✅ The leftover demo "Contact_example" / `/contact-2/` footer link was
  removed. No historical redirect was required because the old site had no
  inherited search equity.
