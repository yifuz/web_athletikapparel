# Outbound Lead Workflow — Single-Operator Baseline

Status: preparation only. No live outreach is authorized by this document.

This workflow prepares the first United States target-account test described in
`promotion-plan.md` and `promotion-matrix.md`. It is an internal operating
control, not legal advice. Canada, the EEA, the United Kingdom, and Switzerland
remain outside the first outbound test until their separate market and privacy
gates are reviewed.

## 1. Storage boundary

- The repository contains only the blank
  [`outbound-lead-ledger-template.csv`](outbound-lead-ledger-template.csv).
- Create the working copy outside Git in one access-restricted location controlled
  by the user. Do not store populated copies, exports, contact screenshots, or
  email archives in the theme repository.
- Do not put a person's name, email address, LinkedIn URL, or other personal data
  in UTM parameters, filenames, Git commits, or issue titles.
- Use an anonymous `lead_id` such as `us-202608-001` for UTM content and internal
  file references.

## 2. Decisions required before the first send

- [ ] Select the private working-ledger location and confirm who can access it.
- [ ] Confirm the business sending mailbox and verify that its From / Reply-To
      information identifies Athletik Clothing accurately.
- [ ] Confirm a retention rule for researched prospects who never reply. The
      approved 24-month rule applies to unsuccessful inquiries and related email;
      it does not automatically establish a retention period for non-responsive
      outbound prospects.
- [ ] Keep Canada disabled until the applicable CASL consent route is reviewed and
      documented.
- [ ] Review one real first-touch email for factual accuracy, brand terminology,
      sender identification, postal address, and opt-out wording.

## 3. United States first-round scope

- Research 10–15 matching companies per week only when prior follow-up is clear.
- Select one or two relevant contacts per company; do not build broad employee
  lists.
- Record the public source URL used to identify the company and business contact.
- Research the company's current product line before contact and record one
  specific fit signal.
- Do not buy lists, scrape at scale, or use automated bulk sequences in the first
  test.
- Default operating cap: no more than three manual touches over 21 days. Stop
  earlier after a reply, rejection, opt-out, role mismatch, or delivery failure.

## 4. Required pre-send checks

1. The company operates a relevant sportswear, underwear, outdoor, base-layer,
   Merino wool, or technical knitwear product line.
2. The target role is relevant to sourcing, procurement, product development,
   production, operations, apparel design, or category management.
3. The subject line and sender identity accurately describe the message.
4. The email addresses one relevant product or manufacturing need; it is not a
   generic capability blast.
5. The landing-page link matches the product topic and uses an anonymous UTM ID.
6. The message contains the valid sender postal address and a simple opt-out.
7. The lead is not already marked `do_not_contact=yes`.

Recommended UTM pattern:

```text
https://www.athletikapparel.com/sportswear-manufacturer/
  ?utm_source=outbound
  &utm_medium=email
  &utm_campaign=us_sportswear_2026q3
  &utm_content=us-202608-001
```

Join that example onto one line before sending. Change the campaign value when
the market, product category, or period changes; never use personal data in it.

## 5. Compliance footer and opt-out control

The user writes and approves the outreach body. The following operational footer
may be appended after factual and legal review:

```text
Athletik Clothing Inc.
228 Park Avenue S #30327, New York, NY 10003, United States
This is a business outreach message from Athletik Clothing Inc.
If you prefer not to receive further marketing messages from us, reply "unsubscribe".
```

United States commercial email requirements apply to B2B messages as well as
bulk email. Use accurate headers and subjects, provide a valid postal address and
clear opt-out, keep the opt-out route working, and honor a request within the
required period. Operationally, mark the record immediately and stop further
contact rather than waiting for the legal maximum.

Primary reference: [FTC CAN-SPAM compliance guide](https://www.ftc.gov/business-guidance/resources/can-spam-act-compliance-guide-business).

Canada remains disabled because CASL generally requires consent for commercial
electronic messages and the sender must be able to demonstrate the applicable
consent basis. Primary reference: [Government of Canada — Getting consent to send email](https://ised-isde.canada.ca/site/canada-anti-spam-legislation/en/getting-consent-send-email).

## 6. Status vocabulary

Use only these values in the working ledger:

- `researching`
- `ready_to_contact`
- `contacted`
- `follow_up_1`
- `follow_up_2`
- `replied`
- `qualified`
- `disqualified`
- `quoted`
- `sampling`
- `won`
- `lost`
- `do_not_contact`

Qualification values:

- `unknown`
- `A`
- `B`
- `C`

Apply the A/B/C definitions in `promotion-plan.md` section 9. Keep the status and
qualification separate: a lead can be `replied` while its qualification remains
`unknown`.

## 7. Opt-out and suppression handling

- On any opt-out or clear request to stop, set `opt_out=yes`,
  `do_not_contact=yes`, record `opt_out_date`, set status to `do_not_contact`, and
  cancel every planned follow-up.
- Keep only the minimum suppression information needed to avoid re-contacting the
  address. Remove unnecessary research notes during the next retention review.
- Never sell, share, or reuse an opted-out address for another campaign.
- Check `do_not_contact` before every send, including a later campaign or a newly
  researched contact at the same company.

## 8. Weekly review

Every Friday record:

- companies researched
- contacts attempted
- replies
- qualified and disqualified leads
- quotes, samples, wins, and losses
- opt-outs and delivery failures
- outstanding follow-ups

Do not increase above 10–15 companies in the following week when follow-up is
backlogged. Content views, email opens, or link clicks do not replace a real reply
or manually qualified opportunity.
