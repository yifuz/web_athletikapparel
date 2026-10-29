<?php
/**
 * Approved body copy for the technical knitwear tech pack guide.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tech_pack_uploads = wp_get_upload_dir();
$tech_pack_demo    = '/myathletik-theme/documents/athletik-tech-pack-demo.pdf';
?>

<div class="ma-technical-article__opening">
	<p>A tech pack is the controlled production document that tells a manufacturer exactly what to make, how to make it, and what evidence to use for approval. Whether the product is a casual T-shirt or a compression base layer, the document should answer three questions without relying on assumptions:</p>
	<ol>
		<li>What is being made?</li>
		<li>How must it perform and be constructed?</li>
		<li>What evidence will be used to approve the sample and bulk production?</li>
	</ol>
	<p>This guide uses “technical knitwear” to mean garments cut and sewn from <a href="<?php echo esc_url( home_url( '/knitted-fabrics-manufacturer/' ) ); ?>">knitted fabrics</a> for <a href="<?php echo esc_url( home_url( '/sportswear-manufacturer/' ) ); ?>">sportswear</a>, underwear, base layers and outdoor applications. The same principles apply to any cut-and-sew apparel tech pack, but the fabric, seam and testing details here are specific to knitted construction. It is not a specification for fully fashioned or whole-garment flat knitting, which requires a different set of machine and knitting-program instructions.</p>
</div>

<section id="document-control" aria-labelledby="ma-tech-pack-document-control-title">
	<h2 id="ma-tech-pack-document-control-title">1. Start with document control and intended use</h2>
	<p>Every page should identify the style number, product name, season or program, size range, document version, issue date and responsible approver. A revision history should state what changed, when it changed and which sample or purchase order the revision applies to.</p>
	<p>The intended use also matters. A close-fitting base layer, compression garment, running top and casual knit T-shirt may use similar silhouettes but require different stretch, recovery, seam placement and testing. Record the target activity, fit, layering position, expected skin contact and relevant pressure zones before specifying construction.</p>
	<p>Commercial assumptions that affect development should be stated separately, including estimated quantity, color split, size ratio, sales market and target delivery window. These fields do not replace the purchase order, but they help the manufacturer review feasibility and material requirements early.</p>
</section>

<section id="technical-flats" aria-labelledby="ma-tech-pack-technical-flats-title">
	<h2 id="ma-tech-pack-technical-flats-title">2. Provide technical flats and a construction callout page</h2>
	<p>Include clear front, back and relevant inside views. Add enlarged drawings for the neckline, armhole, gusset, waistband, pocket, zipper, hem, elastic join, binding and any unusual panel intersection.</p>
	<p>Use numbered callouts that connect the drawing to a construction table. Each callout should identify the operation rather than relying on a general note such as “flat seams throughout.” If the inside appearance matters, show both faces of the approved seam.</p>
	<p>For asymmetrical products, state which view represents the wearer's left or right side. For placement-sensitive products, identify the reference point from which each artwork, pocket or trim position is measured.</p>
</section>

<section id="pom-and-tolerances" aria-labelledby="ma-tech-pack-pom-title">
	<h2 id="ma-tech-pack-pom-title">3. Define POMs, measurement method and tolerances</h2>
	<p>The point-of-measurement table should contain:</p>
	<ul>
		<li>POM code and description.</li>
		<li>Diagram showing the measurement location.</li>
		<li>Base-size measurement.</li>
		<li>Grade rules or measurements for every size.</li>
		<li>Tolerance for each POM.</li>
		<li>Whether the garment is measured relaxed, stretched or under another stated condition.</li>
		<li>Any pre-wash and after-wash measurement requirements.</li>
	</ul>
	<p>Avoid ambiguous terms such as “body length” without showing the start and end points. Curved seams, elastic openings and stretch panels need a stated measurement method because different handling can produce different results.</p>
	<h3>Example: finished-garment measurement table</h3>
	<p class="ma-technical-article__note"><strong>Demonstration only:</strong> This example is adapted from an actual tech pack. All measurements and tolerances are illustrative and are not for production. The full demonstration does not replace a project-specific specification.</p>
	<p>The example records finished-garment measurements in centimeters for a performance T-shirt. Measure the garment laid flat without stretching; confirm measurement methods and tolerances for the actual project. On smaller screens, scroll horizontally to view all sizes.</p>
	<div class="ma-technical-article__table-wrap ma-tech-pack-demo-table" role="region" aria-label="Demonstration finished-garment measurement table in centimeters; scroll horizontally for all sizes" tabindex="0">
		<table>
			<thead>
				<tr><th scope="col">Point of measurement</th><th scope="col">Tolerance</th><th scope="col">S</th><th scope="col">M</th><th scope="col">L</th><th scope="col">XL</th><th scope="col">2XL</th></tr>
			</thead>
			<tbody>
				<tr><th scope="row">1/2 Chest at underarm</th><td>±1.0</td><td>48.5</td><td>52.5</td><td>56.5</td><td>60.5</td><td>64.5</td></tr>
				<tr><th scope="row">1/2 Bottom opening</th><td>±1.0</td><td>47.0</td><td>51.0</td><td>55.0</td><td>59.0</td><td>63.0</td></tr>
				<tr><th scope="row">Centre-back length</th><td>±1.0</td><td>68.5</td><td>70.5</td><td>72.5</td><td>74.5</td><td>76.5</td></tr>
				<tr><th scope="row">Sleeve length from centre back</th><td>±0.8</td><td>35.5</td><td>36.5</td><td>37.5</td><td>38.5</td><td>39.5</td></tr>
				<tr><th scope="row">Armhole straight</th><td>±0.8</td><td>21.5</td><td>22.5</td><td>23.5</td><td>24.5</td><td>25.5</td></tr>
				<tr><th scope="row">1/2 Sleeve opening</th><td>±0.5</td><td>15.5</td><td>16.0</td><td>16.5</td><td>17.0</td><td>17.5</td></tr>
				<tr><th scope="row">Back neck drop</th><td>±0.3</td><td>2.3</td><td>2.3</td><td>2.3</td><td>2.3</td><td>2.3</td></tr>
				<tr><th scope="row">Neck width</th><td>±0.5</td><td>17.5</td><td>18.5</td><td>19.5</td><td>20.5</td><td>21.5</td></tr>
				<tr><th scope="row">Front neck drop</th><td>±0.5</td><td>8.2</td><td>8.7</td><td>9.2</td><td>9.7</td><td>10.2</td></tr>
			</tbody>
		</table>
	</div>
	<?php if ( empty( $tech_pack_uploads['error'] ) && is_file( $tech_pack_uploads['basedir'] . $tech_pack_demo ) ) : ?>
		<p><a href="<?php echo esc_url( $tech_pack_uploads['baseurl'] . $tech_pack_demo ); ?>">View the complete demonstration tech pack (PDF)</a></p>
	<?php endif; ?>
</section>

<section id="finished-fabric" aria-labelledby="ma-tech-pack-fabric-title">
	<h2 id="ma-tech-pack-fabric-title">4. Specify the finished fabric, not only the fiber composition</h2>
	<p>“Polyester/spandex jersey” does not identify a production fabric. The bill of materials and fabric specification should record, where applicable:</p>
	<ul>
		<li>Approved supplier and finished-fabric article number.</li>
		<li>Fiber composition and permitted tolerance or verification requirement.</li>
		<li>Knit construction.</li>
		<li>Finished weight in GSM and the agreed test method.</li>
		<li>Usable width.</li>
		<li>Stretch and recovery in the relevant directions, with the test method, conditioning and acceptance values.</li>
		<li>Finished hand, surface, brushing or fleece requirement.</li>
		<li>Color standard, shade approval method and lot-control requirement.</li>
		<li>Functional finish and its test method, where a finish is required.</li>
		<li>Dimensional-change, spirality, colorfastness, pilling or bursting-strength requirements relevant to the end use.</li>
	</ul>
	<p>The test method must suit the material. For example, <a href="https://store.astm.org/d2594_d2594m-21.html">ASTM D2594/D2594M-21</a> covers stretch and growth of certain low-power knitted fabrics and explicitly notes limitations for support applications. A buyer should not copy one stretch method into every program without checking its scope.</p>
	<p>If a recycled, organic or other certified-material claim is required, specify the exact claim, applicable product and required documentation. A supplier or upstream material certificate does not automatically prove that the final garment and transaction can carry the same claim.</p>
</section>

<section id="seam-map" aria-labelledby="ma-tech-pack-seam-map-title">
	<h2 id="ma-tech-pack-seam-map-title">5. Draw a seam map and identify stitch construction</h2>
	<p>A seam map should label every joining and finishing operation. It should distinguish, where applicable:</p>
	<ul>
		<li>607 four-needle, six-thread FLATLOCK.</li>
		<li>514 two-needle, four-thread OVERLOCK.</li>
		<li>ACTIVESEAM as a separate Merrow construction rather than a generic name for any visually flat seam.</li>
		<li>COVERSTITCH for relevant hems or top-cover operations.</li>
		<li>Binding, elastic attachment, bartack or other reinforcement operations.</li>
	</ul>
	<p>For each critical seam, state the location, stitch reference, required seam width, seam allowance where relevant, thread specification, stitch density or SPI where applicable, and approved appearance on both faces. Attach a close-up photo or signed seam sample when appearance cannot be communicated adequately by a drawing.</p>
	<p>The seam map should also consider pressure and movement. A low-profile seam may be preferred beneath a backpack strap or at a high-contact next-to-skin join, but the final choice still depends on the fabric, fit, thread, seam geometry and approved sample. See the separate <a href="<?php echo esc_url( home_url( '/flatlock-vs-overlock-technical-knitwear/' ) ); ?>">FLATLOCK vs OVERLOCK guide</a> for the construction comparison.</p>
</section>

<section id="trims-and-components" aria-labelledby="ma-tech-pack-trims-title">
	<h2 id="ma-tech-pack-trims-title">6. Control trims, elastic and component compatibility</h2>
	<p>List every component in the bill of materials with supplier or article details where nominated. Include elastic width and extension requirements, zipper type and length, drawcord, stopper, label, transfer, reflective component, thread, padding and packaging items.</p>
	<p>Identify attachment and joining requirements for components that affect fit or durability. For elastic, define the finished opening measurement or extension relationship and approve the join and attachment on the production fabric. For heat-applied graphics, identify placement, artwork revision, finished size, color standard and any laundering or adhesion requirement.</p>
	<h3>Example: bill of materials</h3>
	<p class="ma-technical-article__note"><strong>Demonstration only:</strong> The following component list is illustrative and not for production. Material, labeling and packaging requirements must be agreed for the actual order.</p>
	<p>On smaller screens, scroll horizontally to view all component details.</p>
	<div class="ma-technical-article__table-wrap ma-tech-pack-demo-table ma-tech-pack-demo-table--bom" role="region" aria-label="Demonstration bill of materials; scroll horizontally for all columns" tabindex="0">
		<table>
			<colgroup><col><col><col><col><col></colgroup>
			<thead>
				<tr><th scope="col">Component</th><th scope="col">Description</th><th scope="col">Position</th><th scope="col">Color / finish</th><th scope="col">Qty</th></tr>
			</thead>
			<tbody>
				<tr><th scope="row">Main fabric</th><td>Polyester / elastane single jersey</td><td>Body and sleeves</td><td>As colorway</td><td>1</td></tr>
				<tr><th scope="row">Contrast fabric</th><td>Matching stretch knit</td><td>Upper yoke</td><td>As colorway</td><td>1</td></tr>
				<tr><th scope="row">Neck tape</th><td>SELF FABRIC tape</td><td>Inside back neck</td><td>Contrast color</td><td>1</td></tr>
				<tr><th scope="row">Sewing thread</th><td>FLATLOCK / COVERSTITCH thread</td><td>All seams</td><td>As colorway</td><td>As req.</td></tr>
				<tr><th scope="row">Front logo</th><td>Heat-transfer artwork</td><td>Left front shoulder</td><td>Red</td><td>1</td></tr>
				<tr><th scope="row">Back logo</th><td>Heat-transfer artwork</td><td>Centre back below neck</td><td>Red</td><td>1</td></tr>
				<tr><th scope="row">Neck print</th><td>Size, fiber and brand details</td><td>Inside back neck</td><td>Soft grey</td><td>1</td></tr>
				<tr><th scope="row">Care label</th><td>Printed care and origin details</td><td>Inside left seam</td><td>White / dark print</td><td>1</td></tr>
				<tr><th scope="row">Hangtag</th><td>Athletik sample card</td><td>Attached at neck</td><td>White / red</td><td>1</td></tr>
				<tr><th scope="row">Packaging</th><td>Individual polybag</td><td>Finished garment</td><td>Clear</td><td>1</td></tr>
			</tbody>
		</table>
	</div>
	<p>The quantities shown are illustrative. A production BOM should identify the units and consumption or other agreed requirements for each material and component.</p>
</section>

<section id="testing" aria-labelledby="ma-tech-pack-testing-title">
	<h2 id="ma-tech-pack-testing-title">7. State testing methods and pass criteria</h2>
	<p>A requirement such as “must pass shrinkage” is incomplete. State the test method, specimen or garment condition, wash and dry procedure, number of cycles, measurement method and acceptance value.</p>
	<p><a href="https://members.aatcc.org/store/tm135/543/">AATCC TM135-2025</a> is intended for dimensional changes of fabrics after home laundering. <a href="https://www.iso.org/standard/57309.html">ISO 3759:2011</a> covers preparation, marking and measurement of fabrics and garments for dimensional-change tests, while <a href="https://www.iso.org/standard/41877.html">ISO 5077:2007</a> covers the determination of dimensional change after specified washing and drying. These references demonstrate why the procedure and measurement basis must accompany the pass value.</p>
	<p>Depending on the product risk, the test plan may address:</p>
	<ul>
		<li>Fabric weight, stretch and recovery.</li>
		<li>Dimensional change and garment twist after laundering.</li>
		<li>Colorfastness to washing, perspiration or rubbing.</li>
		<li>Pilling, abrasion or bursting strength.</li>
		<li>Seam extension, seam strength or seam appearance after laundering.</li>
		<li>Print or transfer adhesion.</li>
		<li>Functional claims that will be used in product marketing.</li>
	</ul>
	<p>Do not add every possible test to every program. Select methods and acceptance values according to the fabric, garment, end use, target market and buyer's quality standard.</p>
</section>

<section id="sample-approvals" aria-labelledby="ma-tech-pack-approvals-title">
	<h2 id="ma-tech-pack-approvals-title">8. Define sample stages and approval authority</h2>
	<p>The tech pack should state which samples are required and what each approval allows the manufacturer to do next. A typical sequence may include development or proto sample, fit sample, size set, color or material approval and pre-production sample. The exact sequence depends on the project; our <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">OEM knitwear services</a> page shows how sampling and approvals connect to bulk production, quality control and shipping.</p>
	<p>Record comments against the current sample and tech pack version. When an approved change affects pattern, fabric, seam construction, trim, artwork or measurement, update the controlled document rather than relying on email or chat history alone.</p>
	<p>Bulk production should use the approved pre-production sample, signed material standards and current tech pack as a coordinated reference. If they conflict, the responsible parties should resolve the conflict before cutting.</p>
</section>

<section id="handoff-checklist" aria-labelledby="ma-tech-pack-handoff-title">
	<h2 id="ma-tech-pack-handoff-title">9. Final handoff checklist</h2>
	<p>Before requesting a quotation or sample, confirm that the package contains:</p>
	<ol>
		<li>Style identity, intended use and current revision.</li>
		<li>Front, back, inside and detail drawings.</li>
		<li>POM diagrams, graded measurements and tolerances.</li>
		<li>BOM with finished-fabric and component specifications.</li>
		<li>Color, artwork, label and placement files.</li>
		<li>Seam map and critical stitch construction.</li>
		<li>Testing methods and pass criteria.</li>
		<li>Packaging and shipment-marking requirements.</li>
		<li>Sample stages and named approval authority.</li>
		<li>Quantity, color/size assumptions and target timing for feasibility review.</li>
	</ol>
	<p>The goal is not to create the longest possible document. It is to remove material ambiguity before sampling and to keep every approved change connected to one controlled product specification. The same controlled package is also the basis for comparing candidate manufacturers; the <a href="<?php echo esc_url( home_url( '/evaluate-technical-knitwear-oem/' ) ); ?>">OEM evaluation guide</a> covers the supplier-side checks that follow.</p>
</section>
