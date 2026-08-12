# Contact Page — Copy & Form Spec  (/contact/)

Status: the page and Fluent Form ID 3 are live. This document now reflects the
current production field set and replaces the earlier front-end-only plan.

Companion to docs/sitemap.md and docs/site/design-brief.md. The conversion endpoint — all
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
- Name (text)
- Email* (email)
- Company (text)
- Country / Region (text)
- Website (url) — optional

**Project details**
- Product category of interest* (dropdown — your 7 categories):
  Sportswear · Underwear · Outdoor Clothing · Merino Wool · Silk Wear ·
  Knitted Fabrics · Sports Accessories · Other
- Estimated order quantity per style* (dropdown — softly signals scale, no MOQ
  stated):
  - Under 1,000 pcs
  - 1,000 – 2,000 pcs
  - 2,000 – 5,000 pcs
  - 5,000+ pcs
- Business type* (dropdown):
  Established brand · New brand · Wholesaler / Importer · Other
- Message* (textarea) — includes a prompt to add a link to a tech pack when
  available. File Upload is a Fluent Forms PRO feature and is not part of the
  current form.

**Submit button:** Send Inquiry

Note (microcopy under submit, optional):
> We typically reply within one business day.

================================================================
## Company details block (beside or below the form)
================================================================

**Get in touch**
- Email: info@athletikapparel.com
- Tel: +86 139 5113 9696
- WhatsApp remains available in the global site footer.

**Our facility**
- Zhangjiagang Athletik Clothing Co., Limited
- No.25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu, 215699 China
- The page links to Google Maps; do not list partner factories.

[IMAGE: optional — real photo of the facility exterior or entrance]

================================================================
## Form behavior / implementation status
================================================================
- Fluent Form ID 3 is live on Contact and the homepage inquiry CTA. Entries,
  Brevo notification delivery, and the destination inbox have been verified.
- Use design-brief tokens (warm palette, accent color for the Send button).
- Mobile-first AND verify desktop (two-column: form left, company details
  right on desktop; stacked on mobile).
- File Upload is not enabled in the current free-tier setup; keep the tech pack
  link prompt in the Message field unless the form architecture changes.
- The "Under 1,000 pcs" tier stays in the dropdown (it's the soft signal) but
  MOQ is not presented as a hard rejection rule on the Contact page.
- `[CONTENT: ...]` / `[IMAGE: ...]` are editor placeholders — never render the
  literal text on the live page.

================================================================
## Cleanup tied to this page (from sitemap §8)
================================================================
- ✅ The leftover demo "Contact_example" / `/contact-2/` footer link was
  removed. No historical redirect was required because the old site had no
  inherited search equity.
