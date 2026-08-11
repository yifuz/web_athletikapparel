<?php
/**
 * Approved body copy for the FLATLOCK versus OVERLOCK technical article.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$media_base = get_stylesheet_directory_uri() . '/assets/images/production/articles/flatlock-vs-overlock/';
?>

<section id="what-is-flatlock" aria-labelledby="ma-flatlock-title">
	<h2 id="ma-flatlock-title">What is FLATLOCK construction?</h2>
	<p>In technical knitwear, FLATLOCK commonly refers to a flatseam construction that joins garment panels without a conventional projecting seam allowance. A four-needle, six-thread configuration—stitch type 607—is a useful industrial reference, although it is not the only construction that may be described as flatlock.</p>
	<p>The joined edges may be overlapped or arranged according to the required seam class and machine setup. Thread formations cover both faces of the join and help distribute the seam over a relatively flat area. This is why FLATLOCK is frequently selected for next-to-skin garments where seam bulk is a design constraint.</p>
	<p>Published Yamato applications show four-needle, six-thread flatseam operations for T-shirt shoulders, sleeve closing and underwear crotch seams. These are representative industrial applications, not a universal seam map for every garment. The position and construction still need to be confirmed against the product design and fabric.</p>

	<figure class="ma-technical-article__media">
		<video controls playsinline preload="metadata" width="720" height="1280" poster="<?php echo esc_url( $media_base . 'yamato-flatlock-knitwear-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( $media_base . 'yamato-flatlock-knitwear-production.mp4' ); ?>" type="video/mp4">
			<p>Your browser does not support embedded video. <a href="<?php echo esc_url( $media_base . 'yamato-flatlock-knitwear-production.mp4' ); ?>">Download the Yamato FLATLOCK production example.</a></p>
		</video>
		<figcaption>Yamato FLATLOCK production example. This video and the OVERLOCK example below show different garments and fabrics; they are process evidence, not a controlled same-fabric test.</figcaption>
	</figure>
</section>

<section id="what-is-overlock" aria-labelledby="ma-overlock-title">
	<h2 id="ma-overlock-title">What is OVERLOCK construction?</h2>
	<p>OVERLOCK joins knitted fabric while enclosing the cut edges with looped threads. In a typical assembly operation, the cut edges and seam allowance sit inside the garment. This creates more internal profile than a flatseam, but it also provides a practical and widely used way to assemble stretch fabrics.</p>
	<p>For this comparison, the main reference is two-needle, four-thread OVERLOCK, stitch type 514. One-needle, three-thread OVERLOCK, stitch type 504, is a different configuration and should not be treated as interchangeable with 514 in a tech pack or spec sheet.</p>
	<p>OVERLOCK is not limited to low-stretch or low-quality garments. Yamato's published T-shirt production examples include two-needle, four-thread OVERLOCK for joining shoulders, closing sleeves and attaching sleeves. With the appropriate thread, differential feed, tension and stitch setting, an OVERLOCK seam can be soft and extensible. Its suitability must be evaluated on the nominated fabric rather than inferred from the stitch name alone.</p>

	<figure class="ma-technical-article__media">
		<video controls playsinline preload="metadata" width="720" height="1280" poster="<?php echo esc_url( $media_base . 'overlock-knit-assembly-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( $media_base . 'overlock-knit-assembly-production.mp4' ); ?>" type="video/mp4">
			<p>Your browser does not support embedded video. <a href="<?php echo esc_url( $media_base . 'overlock-knit-assembly-production.mp4' ); ?>">Download the OVERLOCK production example.</a></p>
		</video>
		<figcaption>OVERLOCK knit-assembly production example. It is presented separately from the Yamato FLATLOCK video because the garment and fabric are not the same.</figcaption>
	</figure>
</section>

<section id="comparison" aria-labelledby="ma-seam-comparison-title">
	<h2 id="ma-seam-comparison-title">FLATLOCK vs OVERLOCK: the practical differences</h2>
	<div class="ma-technical-article__table-wrap" role="region" aria-label="FLATLOCK and OVERLOCK comparison" tabindex="0">
		<table>
			<thead>
				<tr>
					<th scope="col">Decision factor</th>
					<th scope="col">FLATLOCK</th>
					<th scope="col">OVERLOCK</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">Basic construction</th>
					<td>Flatseam joining with thread formations on both faces; four-needle, six-thread stitch type 607 is a common reference.</td>
					<td>Cut edges are enclosed by looped threads; two-needle, four-thread stitch type 514 is a common knit-assembly reference.</td>
				</tr>
				<tr>
					<th scope="row">Inside profile</th>
					<td>Low profile, without a conventional projecting seam allowance.</td>
					<td>Normally retains an internal seam allowance and a more noticeable ridge.</td>
				</tr>
				<tr>
					<th scope="row">Typical use</th>
					<td>Next-to-skin panel joins and areas where seam bulk is restricted.</td>
					<td>General knitted-garment assembly where an enclosed edge and internal allowance are acceptable.</td>
				</tr>
				<tr>
					<th scope="row">Stretch</th>
					<td>Can be engineered for high extension; performance depends on fabric, thread and settings.</td>
					<td>Can also provide high extension; performance depends on fabric, thread and settings.</td>
				</tr>
				<tr>
					<th scope="row">Common garment areas</th>
					<td>Shoulder or raglan seams, sleeve closing, underarm or side body, crotch or inseam, depending on the design.</td>
					<td>Shoulder, sleeve and side seams, sleeve attachment, and selected band or elastic operations, depending on the design.</td>
				</tr>
				<tr>
					<th scope="row">Buyer specification</th>
					<td>Identify the seam location, stitch reference, required width and approved appearance on both faces.</td>
					<td>Identify the seam location, stitch reference, seam allowance and approved inside/outside appearance.</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p class="ma-technical-article__note">The table describes common production logic, not a rule that every seam must follow. Both constructions may appear in one garment. A technical base layer, for example, may use FLATLOCK through high-contact body panels while using OVERLOCK, COVERSTITCH or binding for other operations.</p>
</section>

<section id="when-flatlock" aria-labelledby="ma-when-flatlock-title">
	<h2 id="ma-when-flatlock-title">When should a buyer specify FLATLOCK?</h2>
	<p>FLATLOCK is usually the stronger starting point when the seam will remain in direct contact with the body for long periods or sit under repeated pressure. Relevant products include <a href="<?php echo esc_url( home_url( '/underwear-manufacturer/' ) ); ?>">base layers and performance underwear</a>, compression garments, running tops, leggings and close-fitting outdoor layers.</p>
	<p>Areas worth evaluating include:</p>
	<ul>
		<li>Shoulder and raglan joins that may sit below a backpack strap.</li>
		<li>Underarm and side-body seams exposed to repeated arm movement.</li>
		<li>Crotch and inseam joins on close-fitting bottoms.</li>
		<li>Panel joins on compression garments or next-to-skin underwear.</li>
		<li>Other positions where a conventional internal seam allowance would create unwanted bulk.</li>
	</ul>
	<p>The word “FLATLOCK” alone is not a complete instruction. Seam placement can be as important as seam type. A low-profile join located in a high-pressure area may still be uncomfortable, while a well-positioned OVERLOCK seam may perform acceptably. The tech pack should therefore show both the construction and the exact garment location.</p>
</section>

<section id="when-overlock" aria-labelledby="ma-when-overlock-title">
	<h2 id="ma-when-overlock-title">When may OVERLOCK be the appropriate construction?</h2>
	<p>OVERLOCK is appropriate for many general assembly operations on knitted garments, including shoulders, sleeves and side seams. It may also be selected for neckband, waistband or elastic-related operations when the design and finish require it.</p>
	<p>It is a practical choice when:</p>
	<ul>
		<li>The internal seam allowance does not sit in a sensitive or high-pressure position.</li>
		<li>The required edge enclosure and assembly method suit the garment design.</li>
		<li>The nominated fabric and thread combination achieves the required stretch and recovery in sampling.</li>
		<li>The approved sample confirms acceptable bulk, appearance and wearer comfort.</li>
	</ul>
	<p>Do not reject OVERLOCK merely because the product is a performance garment. Conversely, do not choose it only because it is familiar. The decision should be based on the operation, fabric and acceptance criteria.</p>
</section>

<section id="fabric-and-testing" aria-labelledby="ma-fabric-testing-title">
	<h2 id="ma-fabric-testing-title">Fabric, thread and machine settings affect the result</h2>
	<p>The same stitch type can behave differently across a lightweight jersey, a high-modulus compression knit, a brushed thermal fabric and a Merino wool blend. Before approving the seam, review at least the following variables:</p>
	<ul>
		<li>Fabric composition, construction and weight.</li>
		<li>Stretch percentage, recovery and direction of stretch.</li>
		<li>Fabric thickness and edge stability after cutting.</li>
		<li>Sewing thread type, size and elongation.</li>
		<li>Needle selection, stitch density and seam width.</li>
		<li>Differential feed, looper-thread balance and thread tension.</li>
		<li>Seam placement relative to pressure and movement zones.</li>
	</ul>
	<p>The production sample should be reviewed from both sides. Testing should be matched to the product risk and may include seam extension, seam strength, seam slippage, dimensional stability after laundering and a practical wearer trial. The approved pre-production sample should remain the visual and functional reference for bulk production.</p>
</section>

<section id="activeseam" aria-labelledby="ma-activeseam-title">
	<h2 id="ma-activeseam-title">ACTIVESEAM is not another name for FLATLOCK</h2>
	<p>ACTIVESEAM should be specified separately. Merrow describes its MB-4DFO ACTIVESEAM platform as a two-needle, two- or three-thread flat overlock system and an alternative to conventional FLATLOCK, INTERLOCK and OVERLOCK construction. It is therefore inaccurate to use ACTIVESEAM as a generic synonym for any visually flat seam.</p>
	<p>If ACTIVESEAM is required, the buyer and manufacturer should confirm the machine platform, seam version, required appearance and sample performance. This article does not use an ACTIVESEAM production video; the distinction is included to prevent an ambiguous stitch callout.</p>
</section>

<section id="tech-pack" aria-labelledby="ma-tech-pack-title">
	<h2 id="ma-tech-pack-title">What should the tech pack or spec sheet include?</h2>
	<p>A buyer does not need to prescribe every machine adjustment, but the intended construction and acceptance criteria must be unambiguous. For each relevant operation, include:</p>
	<ol>
		<li>A seam map showing the exact garment location.</li>
		<li>The required stitch type or construction reference, such as 607 FLATLOCK or 514 OVERLOCK.</li>
		<li>A seam diagram, close-up photograph or approved reference sample.</li>
		<li>Required seam width, stitch density and seam allowance where these are critical.</li>
		<li>Thread material, size and color requirements where specified by design or performance.</li>
		<li>The fabric article, composition, weight, stretch and recovery requirements.</li>
		<li>The required appearance on both the face and inside of the garment.</li>
		<li>Measurement tolerances and any areas where seam growth or puckering must be controlled.</li>
		<li>Relevant seam-performance and laundering acceptance criteria.</li>
		<li>Pre-production sample approval before bulk cutting and sewing.</li>
	</ol>
	<p>Where the buyer does not specify a numeric machine setting, the manufacturer can propose the setup during development. That proposal should still be confirmed through the approved sample and recorded before bulk production.</p>
</section>

<section aria-labelledby="ma-seam-function-title">
	<h2 id="ma-seam-function-title">Specify the seam function, not only the seam name</h2>
	<p>For technical knitwear, the most useful question is not “Which stitch is better?” but “What must this seam do in this garment and this fabric?” Define the location, pressure exposure, required profile, stretch, recovery, appearance and testing standard. Then confirm the proposed construction on a pre-production sample.</p>
	<p>For an OEM/ODM project, send the garment drawing or tech pack, fabric specification, intended use, order quantity and required testing. Athletik Clothing can then review the seam map and develop samples around the confirmed construction requirements. See our <a href="<?php echo esc_url( home_url( '/sportswear-manufacturer/' ) ); ?>">sportswear manufacturing capabilities</a> or <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">OEM/ODM process</a> for related information.</p>
</section>
