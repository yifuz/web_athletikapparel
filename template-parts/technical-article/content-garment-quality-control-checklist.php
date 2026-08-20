<?php
/**
 * Approved body copy for the garment quality control checklist guide.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="ma-technical-article__opening">
	<p>Quality control in cut-and-sew garment manufacturing is the system of checks that verifies materials, construction, measurements, packing and documentation against one agreed specification — before, during and after production. It is not a single inspection at the end of the line. A workable garment quality control program combines incoming material checks, in-line process controls, a final pre-shipment inspection and the records that connect each result to the purchase order.</p>
	<p>QC execution is different from supplier evaluation. Evaluation asks whether a factory <em>can</em> meet the requirement and is done before the order; the <a href="<?php echo esc_url( home_url( '/evaluate-technical-knitwear-oem/' ) ); ?>">OEM evaluation guide</a> covers that supplier-side review. This guide covers what happens after the supplier is approved: how a specific order is verified against its tech pack.</p>
	<p>The scope is cut-and-sew technical knitwear — garments cut and sewn from finished <a href="<?php echo esc_url( home_url( '/knitted-fabrics-manufacturer/' ) ); ?>">knitted fabrics</a> for <a href="<?php echo esc_url( home_url( '/sportswear-manufacturer/' ) ); ?>">sportswear</a>, underwear, base layers and outdoor applications. The checklist structure applies to most apparel programs, but the fabric, seam and measurement details here are specific to knitted construction.</p>
</div>

<section id="pre-production" aria-labelledby="ma-qc-pre-production-title">
	<h2 id="ma-qc-pre-production-title">1. Pre-production quality controls</h2>
	<p>Most bulk defects are cheaper to prevent at the material and approval stage than to sort at final inspection. Pre-production controls verify that the inputs and the first output match the approved references before volume cutting and sewing begin.</p>
	<p>Incoming fabric inspection should check, against the approved fabric specification:</p>
	<ul>
		<li>Finished weight in GSM, using the agreed test method.</li>
		<li>Usable width, which directly affects marker efficiency and panel dimensions.</li>
		<li>Shade against the approved color standard, including roll-to-roll and within-roll variation.</li>
		<li>Visual defects such as holes, stains, slubs, barré, needle lines and contamination. Many programs grade these with the four-point system, which assigns penalty points by defect size.</li>
		<li>Fiber composition verification where a specific blend or certified content is claimed.</li>
		<li>Spot checks of stretch and recovery in the relevant directions, where fit depends on them.</li>
	</ul>
	<p>Rolls should be identified and segregated by lot so that shading and performance differences can be traced back to a dye lot or finishing batch.</p>
	<p>Color and surface approvals come before bulk processing. Lab dips confirm shade on the nominated fabric quality; hand-feel and finish standards confirm brushing, fleece or functional finishing; a strike-off approves print or placement artwork before bulk printing. Bulk fabric should not be released against a verbal approval.</p>
	<p>First-piece approval closes the loop between approval and production. The first complete garment from the line — cut from bulk fabric and sewn under production conditions — is measured and compared against the approved pre-production sample and the POM table. Cutting continues only after the first piece passes.</p>
	<p>Every one of these controls depends on the same source document. The finished-fabric specification, color standard, seam map and POM table in the <a href="<?php echo esc_url( home_url( '/technical-knitwear-tech-pack-guide/' ) ); ?>">tech pack</a> are what pre-production checks are measured against; without them, incoming inspection becomes a matter of opinion.</p>
</section>

<section id="in-line" aria-labelledby="ma-qc-in-line-title">
	<h2 id="ma-qc-in-line-title">2. In-line production controls</h2>
	<p>In-line inspection checks work while it can still be corrected at the operation. It typically covers:</p>
	<ul>
		<li>Measurement checks against the POM table at agreed garment stages.</li>
		<li>Workmanship: stitch formation, skipped or broken stitches, puckering, tunnelling, loose threads and trim alignment.</li>
		<li>Seam quality: construction, width and appearance of FLATLOCK, OVERLOCK, COVERSTITCH and ACTIVESEAM operations against the approved seam sample.</li>
		<li>Cutting accuracy, panel count and matching of printed or striped panels.</li>
		<li>Placement of prints, heat transfers, labels and elastics against the approved positioning dimensions.</li>
	</ul>
	<p>Sampling is normally a mix of operator self-checks at each operation and periodic checks by dedicated QC staff, with the first output of every new operation, size or bundle reviewed before the run continues. Frequency and sample size vary by fabric, construction complexity and line stability, and are confirmed for each project; a critical or hard-to-rework operation may justify 100% checking while a stable operation may need only periodic sampling.</p>
	<p>In-line control differs from final inspection in purpose, not just timing. In-line checks exist to find and fix the cause — a wrong folder setting, a dull knife, a drifting print registration — before the defect is multiplied across the order. Final inspection is an accept-or-reject decision on finished goods. A program that relies only on final inspection discovers problems when the only options left are rework, discount or remake.</p>
	<p>Common in-line checkpoints for knitted garments include cutting-room panel audits, print and heat-transfer placement checks, seam audits at critical joins such as the crotch, underarm and neck rib, elastic attachment tension and join appearance, and mid-line measurement audits on half-finished and finished garments.</p>
</section>

<section id="final-inspection" aria-labelledby="ma-qc-final-inspection-title">
	<h2 id="ma-qc-final-inspection-title">3. Final inspection before shipment</h2>
	<p>Final inspection — often called pre-shipment inspection — is the last systematic check before goods leave the factory. It normally covers visual workmanship across the sample, a measurement audit, packaging and labeling verification, and quantity and assortment confirmation. It is usually performed when a high percentage of the order is finished and packed; the exact stage should be stated in the inspection terms.</p>
	<p>Most apparel final inspections use AQL sampling rather than checking every piece. AQL — acceptance quality limit — comes from the attribute sampling system published as <a href="https://www.iso.org/obp/ui/#iso:std:iso:2859:-1:en">ISO 2859-1</a> and its US counterpart ANSI/ASQ Z1.4. The lot size determines a sample-size code letter and therefore the sample quantity; the chosen AQL then gives the accept and reject numbers for each defect class. AQL is a statistical acceptance basis, not a promise that the lot contains no defects.</p>
	<p>A common apparel arrangement is:</p>
	<ul>
		<li>Critical defects: not accepted — any single safety, legal or regulatory defect fails the inspection.</li>
		<li>Major defects: AQL 2.5 — defects likely to cause a return or make the product unsalable, such as an open seam, a missing component or a measurement out of tolerance.</li>
		<li>Minor defects: AQL 4.0 — appearance deviations unlikely to affect salability, within the agreed limits.</li>
	</ul>
	<p>General inspection level II is the usual default sample size; tighter or looser levels can be agreed based on product risk and order history. Whatever the choice, the buyer should state the sampling standard, inspection level and AQL per defect class in the tech pack or purchase order — “AQL 2.5” alone does not define the plan.</p>
	<p>The measurement audit compares sampled garments against the POM table and its tolerances, using the measurement method defined in the tech pack. For stretch knits, the stated measuring condition — relaxed, extended or otherwise — matters as much as the numbers.</p>
	<p>Packaging, labeling and marking checks confirm folding method, polybag type and warning text, care and content labels, hangtags, size stickers, barcodes, country-of-origin marking, carton assortment and shipping marks against the packing specification.</p>
</section>

<section id="testing-compliance" aria-labelledby="ma-qc-testing-compliance-title">
	<h2 id="ma-qc-testing-compliance-title">4. Testing and compliance verification</h2>
	<p>Inspection and laboratory testing answer different questions. Inspection verifies workmanship, measurement and packing — attributes visible or measurable on the garment. Laboratory testing verifies physical and chemical performance that cannot be judged by eye: dimensional change, colorfastness, pilling, bursting strength, fiber composition and restricted substances. One does not replace the other; a garment can pass final inspection and still fail a shrinkage test.</p>
	<p>Test status should be tracked during production, not discovered at shipment. For each required method, the program should record which stage the specimen comes from — bulk fabric, printed panel or finished garment — when it was submitted, and whether the result is approved before the affected stage proceeds. Testing can be arranged based on the required standard; the methods and acceptance values themselves belong in the tech pack, as covered in the <a href="<?php echo esc_url( home_url( '/technical-knitwear-tech-pack-guide/' ) ); ?>">tech pack guide</a>.</p>
	<p>Certification claims need documentary verification alongside any garment check. For a GRS or other certified-content claim, the <a href="https://textileexchange.org/content-claim-standard/">Textile Exchange Content Claim Standard</a> describes the chain-of-custody controls — scope certificates, transaction certificates, volume reconciliation and segregation — that connect the certified input to the shipped product. For <a href="https://www.oeko-tex.com/en/our-standards/oeko-tex-standard-100">OEKO-TEX STANDARD 100</a>, the certificate number, product class, article scope and validity can be checked against the issuing institute before the claim is used. A logo on a presentation is not verification.</p>
	<p>Depending on the product and market, buyers commonly request test reports covering:</p>
	<ul>
		<li>Dimensional change after home laundering, for example <a href="https://members.aatcc.org/store/tm135/543/">AATCC TM135</a> or the ISO 5077 procedure with <a href="https://www.iso.org/standard/57309.html">ISO 3759</a> marking and measurement.</li>
		<li>Colorfastness to washing, rubbing and perspiration.</li>
		<li>Pilling and, for knitted structures, bursting strength.</li>
		<li>Fiber composition against the labeled blend.</li>
		<li>Restricted-substances testing against the buyer's RSL or the destination market's requirements.</li>
	</ul>
</section>

<section id="needle-control" aria-labelledby="ma-qc-needle-control-title">
	<h2 id="ma-qc-needle-control-title">5. Needle control and product safety</h2>
	<p>A broken needle fragment left in a garment is a product-safety hazard and is treated as a critical defect by most buyers — for children's wear it can also trigger legal obligations in the destination market. Needle control is therefore a standard part of garment QC, not an optional extra.</p>
	<p>A typical broken-needle procedure in the industry works as follows:</p>
	<ol>
		<li>Needle issues and changes are recorded per machine and operator.</li>
		<li>When a needle breaks, production at that machine stops and all fragments are collected and reassembled against a spare needle.</li>
		<li>If any fragment is missing, all work produced since the last confirmed good check is isolated and searched, normally with a hand-held detector.</li>
		<li>The incident, the recovery and the disposition of the isolated goods are recorded.</li>
	</ol>
	<p>Many programs add needle detection as a final safety check: finished garments pass through a conveyor-type metal detector before packing, with the machine's sensitivity verified at defined intervals using calibration test cards. Whether detection is required — and at what sensitivity — varies by fabric and project requirements and should be stated by the buyer, since metal trims such as zippers and snaps affect how detection is applied.</p>
	<p>Metal contamination control extends beyond needles. Good practice restricts staples and loose pins at production workstations, controls small tools such as scissors and snips, and manages machine parts that can shed fragments into product.</p>
</section>

<section id="qc-documentation" aria-labelledby="ma-qc-documentation-title">
	<h2 id="ma-qc-documentation-title">6. QC documentation and records</h2>
	<p>Inspections that are not recorded cannot be verified, compared or disputed. A complete QC file for one order typically contains:</p>
	<ul>
		<li>Incoming fabric inspection reports, keyed to roll and lot identification.</li>
		<li>Lab dip, hand-feel and strike-off approval records.</li>
		<li>First-piece approval with its measurement results.</li>
		<li>In-line inspection reports by date, line and operation.</li>
		<li>Laboratory test reports for the required methods.</li>
		<li>Final inspection report, including the sampling plan used, defect counts by class, measurement results and packing checks.</li>
		<li>Needle-control and detection records where required.</li>
	</ul>
	<p>Buyers can reasonably request the records for their own purchase order, including trend or corrective-action summaries where a defect recurred. Records that would reveal another customer's styles, quantities or specifications are normally shared in redacted or summary form.</p>
	<p>Every record should reference the same identifiers: style number, purchase order, tech pack revision and, for final inspection, the agreed sampling plan. This is what allows a reported defect to be traced back to a material lot, a line and a specific approval.</p>
	<p>When nonconforming product is found, the handling route should be agreed before the order, not negotiated under shipment pressure. The usual options are rework or 100% sorting with re-inspection, rejection with remake, replacement or commercial settlement per the purchase-order terms, or a written concession in which the buyer knowingly accepts a defined deviation for that lot. A concession should state exactly which defect, quantity and lot it covers.</p>
</section>

<section id="tech-pack-requirements" aria-labelledby="ma-qc-tech-pack-requirements-title">
	<h2 id="ma-qc-tech-pack-requirements-title">7. What buyers should specify in the tech pack</h2>
	<p>QC requirements are most effective when they are part of the controlled specification rather than a separate email chain. The items that belong in the tech pack or purchase order include:</p>
	<ol>
		<li>Defect classification — which defects are critical, major and minor for this product, with examples.</li>
		<li>The sampling standard, inspection level and AQL per defect class for final inspection.</li>
		<li>Inspection stages required: incoming fabric, first piece, in-line checkpoints and final inspection, and who performs each.</li>
		<li>Measurement method and condition for every POM, with tolerances.</li>
		<li>Required laboratory tests, methods, specimen stage and acceptance values.</li>
		<li>Needle-control and detection requirements, where applicable.</li>
		<li>Packaging, labeling and carton-marking specification.</li>
		<li>The nonconforming-product procedure: rework, rejection and concession authority.</li>
	</ol>
	<p>AQL selection should follow product risk, not habit. A premium compression garment sold under a performance claim, a basic promotional T-shirt and a children's base layer justify different inspection levels and defect definitions. State the reasoning once in the program standard, then reference it per style.</p>
	<p>For the full structure these QC clauses attach to — document control, flats, POMs, fabric specification, seam map, testing and approval stages — see the <a href="<?php echo esc_url( home_url( '/technical-knitwear-tech-pack-guide/' ) ); ?>">technical knitwear tech pack guide</a>. The same specification also feeds the four-stage workflow of sampling, bulk production, quality control and export described on our <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">OEM knitwear services</a> page.</p>
</section>
