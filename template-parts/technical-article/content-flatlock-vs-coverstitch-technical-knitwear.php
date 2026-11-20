<?php
/**
 * Draft body copy for the FLATLOCK versus COVERSTITCH technical article.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$flatlock_base = get_stylesheet_directory_uri() . '/assets/images/production/articles/flatlock-vs-overlock/';
$video_base    = get_stylesheet_directory_uri() . '/assets/images/production/articles/videos/';
?>

<section id="direct-answer" aria-labelledby="ma-fc-direct-answer-title">
	<h2 id="ma-fc-direct-answer-title">Direct answer: structural panel join vs. hem and topstitching</h2>
	<p>FLATLOCK and COVERSTITCH serve fundamentally different roles in cut-and-sew technical knitwear. Industrial FLATLOCK—commonly referenced as 4-needle, 6-thread stitch type ISO 607—is a structural flatseam that trims and joins two fabric panels edge-to-edge or with a controlled flat overlap, leaving no conventional folded seam allowance inside the garment.</p>
	<p>COVERSTITCH—most commonly 3-needle, 5-thread top-and-bottom COVERSTITCH (ISO 605) or 2-needle, 3-thread bottom COVERSTITCH (ISO 406)—in standard hemming and topstitching setups does not trim panel edges on its own. It is engineered primarily to secure folded hems and cuffs, attach elastic or binding, and topstitch or reinforce an existing seam allowance.</p>
	<p>Most performance garments use both. A technical running top, compression legging or <a href="<?php echo esc_url( home_url( '/merino-wool-manufacturer/' ) ); ?>">Merino wool base layer</a> often uses FLATLOCK (or <a href="<?php echo esc_url( home_url( '/flatlock-vs-activeseam-technical-knitwear/' ) ); ?>">Merrow ACTIVESEAM</a>) along high-contact body joins while relying on COVERSTITCH at the bottom hem, sleeve openings, neck binding and waistband.</p>
</section>

<section id="industrial-flatlock" aria-labelledby="ma-fc-flatlock-title">
	<h2 id="ma-fc-flatlock-title">What is industrial FLATLOCK (ISO 607)?</h2>
	<p>In performance knitwear production, industrial FLATLOCK typically refers to a 4-needle, 6-thread flatseam produced on a feed-off-the-arm flatseamer under ISO 4915 stitch type 607. Four needle threads, one bottom looper thread and one top-covering thread interlock across the panel junction while integrated trimming knives prepare the cut edges.</p>
	<p>Because the panels are joined flat without an upright internal seam ridge, FLATLOCK minimizes bulk at skin-contact zones. On Yamato FD-62G series flatseamers, published submodel applications include T-shirt shoulder and sleeve closing, lightweight knitted-fabric joins and underwear crotch seams. Exact needle spacing, overlap, thread tension and differential feed still depend on the fabric structure and garment operation.</p>

	<figure class="ma-technical-article__media">
		<video controls playsinline preload="metadata" width="720" height="1280" poster="<?php echo esc_url( $flatlock_base . 'yamato-flatlock-knitwear-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( $flatlock_base . 'yamato-flatlock-knitwear-production.mp4' ); ?>" type="video/mp4">
			<p>Your browser does not support embedded video. <a href="<?php echo esc_url( $flatlock_base . 'yamato-flatlock-knitwear-production.mp4' ); ?>">Download the Yamato FLATLOCK production example.</a></p>
		</video>
		<figcaption>Yamato 4-needle, 6-thread FLATLOCK production example. This footage and the COVERSTITCH video below show different garments and fabrics; they demonstrate separate industrial operations and are not a controlled same-fabric performance test.</figcaption>
	</figure>
</section>

<section id="industrial-coverstitch" aria-labelledby="ma-fc-coverstitch-title">
	<h2 id="ma-fc-coverstitch-title">What is industrial COVERSTITCH (ISO 605 and ISO 406)?</h2>
	<p>Industrial COVERSTITCH creates parallel straight needle rows on the exterior face and an extensible looper formation underneath to cover the raw folded edge or seam allowance. Compared with a single-needle lockstitch, the chain-and-looper structure offers substantially greater seam elasticity for knitted fabrics, though actual stretch and recovery still depend on the fabric, thread and machine settings.</p>
	<p>In Athletik Clothing's technical knitwear production, two industrial COVERSTITCH configurations are most relevant:</p>
	<ul>
		<li><strong>3-needle, 5-thread top-and-bottom COVERSTITCH (ISO 605) — Athletik's primary high-frequency setup:</strong> Uses three needle threads, one bottom looper thread and one top-covering thread. It produces a clean decorative and reinforcing top cover on the exterior while securing the folded edge or underlying seam allowance on the inside. Widely specified across high-specification <a href="<?php echo esc_url( home_url( '/sportswear-manufacturer/' ) ); ?>">sportswear and technical activewear</a> for hems, waistbands, bindings and topstitched seams.</li>
		<li><strong>2-needle, 3-thread bottom COVERSTITCH (ISO 406) — supported per project requirements:</strong> Uses two needle threads and one bottom looper thread with no top-covering thread. It leaves two clean parallel stitch lines on the garment face and a single looper cover on the reverse, making it a frequent choice for clean T-shirt hems, sleeve cuffs, lightweight base layers and minimalist activewear silhouettes.</li>
	</ul>
	<p>Machine setup, folder attachments, needle gauge, thread and tension are confirmed around the garment geometry and nominated fabric during sampling.</p>

	<figure class="ma-technical-article__media">
		<video controls playsinline preload="metadata" width="720" height="1280" poster="<?php echo esc_url( $video_base . 'coverstitch-hemming-production-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( $video_base . 'coverstitch-hemming-production-web.mp4' ); ?>" type="video/mp4">
			<p>Your browser does not support embedded video. <a href="<?php echo esc_url( $video_base . 'coverstitch-hemming-production-web.mp4' ); ?>">Download the JACK COVERSTITCH hemming production example.</a></p>
		</video>
		<figcaption>JACK industrial flatbed COVERSTITCH hemming in Athletik production. Shown on a separate garment and knitted fabric from the Yamato FLATLOCK footage above; process demonstration only, not a controlled same-fabric performance comparison.</figcaption>
	</figure>
</section>

<section id="faux-flatlock" aria-labelledby="ma-fc-faux-flatlock-title">
	<h2 id="ma-fc-faux-flatlock-title">True FLATLOCK (ISO 607) vs. "Faux Flatlock" (OVERLOCK + ISO 605 COVERSTITCH)</h2>
	<p>One of the most frequent misunderstandings in activewear sourcing occurs when a buyer inspects the outside of a garment, sees a top-covering thread lattice across a panel join and assumes the seam is true FLATLOCK. In many garments, that appearance is actually a two-step construction often called <strong>faux flatlock</strong> (or topstitched overlock): the panels are first joined with 2-needle, 4-thread <a href="<?php echo esc_url( home_url( '/flatlock-vs-overlock-technical-knitwear/' ) ); ?>">OVERLOCK (ISO 514)</a>, and the internal seam allowance is then pressed to one side and stitched down from the outside using 3-needle, 5-thread COVERSTITCH (ISO 605).</p>
	<p>From the exterior, true FLATLOCK and faux flatlock can look remarkably similar at a glance—especially in tonal thread. On the inside of the garment, however, the physical structure is completely different:</p>
	<ul>
		<li><strong>Internal layer thickness:</strong> True ISO 607 FLATLOCK joins edges flat without a folded-over seam allowance. Faux flatlock traps the entire 514 OVERLOCK seam allowance flat against one side of the body, creating three layers of fabric plus both overlock and coverstitch thread bulk along the seam line.</li>
		<li><strong>Next-to-skin comfort and chafing risk:</strong> In tight compression garments, underwear gussets, high-friction underarms or seams sitting under backpack straps, the extra folded allowance of faux flatlock is noticeably thicker and stiffer than true FLATLOCK.</li>
		<li><strong>Where faux flatlock is still practical:</strong> On mid-weight fleece, relaxed-fit hoodies, outer mid-layers or structured sportswear panels where the seam does not press tightly against bare skin, OVERLOCK plus ISO 605 COVERSTITCH provides strong join security, flattens the overlock allowance cleanly and delivers an athletic topstitched aesthetic without requiring a feed-off-the-arm flatseamer.</li>
	</ul>
	<p>Because the two constructions behave differently in bulk, weight and production routing, a tech pack should never rely on a vague note such as "flatlock look." State explicitly whether the operation requires true ISO 607 FLATLOCK or 514 OVERLOCK topstitched with ISO 605 COVERSTITCH.</p>
</section>

<section id="comparison" aria-labelledby="ma-fc-comparison-title">
	<h2 id="ma-fc-comparison-title">FLATLOCK vs. COVERSTITCH: practical comparison</h2>
	<div class="ma-technical-article__table-wrap" role="region" aria-label="Comparison of ISO 607 FLATLOCK, ISO 605 and ISO 406 COVERSTITCH, and Faux Flatlock" tabindex="0">
		<table>
			<colgroup>
				<col style="width: 14%;">
				<col style="width: 21.5%;">
				<col style="width: 21.5%;">
				<col style="width: 21.5%;">
				<col style="width: 21.5%;">
			</colgroup>
			<thead>
				<tr>
					<th scope="col">Decision factor</th>
					<th scope="col">True FLATLOCK (ISO 607)</th>
					<th scope="col">COVERSTITCH (ISO 605 — 3-needle, 5-thread)</th>
					<th scope="col">COVERSTITCH (ISO 406 — 2-needle, 3-thread)</th>
					<th scope="col">Faux Flatlock (ISO 514 OVERLOCK + ISO 605)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">Primary function</th>
					<td>Structural flat panel-to-panel joining in a single pass.</td>
					<td>Hemming, binding, elastic attachment and topstitching with top-and-bottom cover.</td>
					<td>Clean-face hemming, cuff finishing and light binding with bottom cover only.</td>
					<td>Two-step panel joining plus flattened seam-allowance topstitching.</td>
				</tr>
				<tr>
					<th scope="row">Edge trimming</th>
					<td>Integrated trimming knives align edges during sewing.</td>
					<td>Standard setups do not trim panel edges; typically used on folded hems, bindings or pre-joined seams.</td>
					<td>Standard setups do not trim panel edges; typically used on folded hems or bindings.</td>
					<td>Trimmed during step 1 (OVERLOCK); flattened in step 2 (COVERSTITCH).</td>
				</tr>
				<tr>
					<th scope="row">Exterior appearance</th>
					<td>4 parallel needle rows with interlocking top-cover thread.</td>
					<td>3 parallel needle rows with decorative/reinforcing top-cover thread.</td>
					<td>2 clean parallel needle rows (no top-cover thread).</td>
					<td>3 parallel needle rows with top-cover thread; visually close to FLATLOCK.</td>
				</tr>
				<tr>
					<th scope="row">Interior profile</th>
					<td>Lowest profile; no folded seam allowance projecting inside.</td>
					<td>Flat folded hem edge enclosed by bottom looper thread.</td>
					<td>Clean folded hem edge enclosed by bottom looper thread.</td>
					<td>Thickest join; folded 514 OVERLOCK allowance stays pinned beneath coverstitch.</td>
				</tr>
				<tr>
					<th scope="row">Typical garment zones</th>
					<td>Base-layer body seams, underarms, gussets, crotch, raglan shoulders.</td>
					<td>Activewear hems, waistbands, neck/armhole bindings, topstitched joins.</td>
					<td>T-shirt hems, sleeve cuffs, lightweight base-layer hems, minimalist tops.</td>
					<td>Mid-layers, hoodies, relaxed sportswear seams where skin friction is low.</td>
				</tr>
				<tr>
					<th scope="row">Athletik production note</th>
					<td>Run on Yamato feed-off-the-arm flatseamers; settings confirmed on the production fabric during sampling.</td>
					<td>Primary high-frequency COVERSTITCH setup for technical knitwear programs.</td>
					<td>Supported per project requirements where a 2-needle clean face is specified.</td>
					<td>Available when specified; must be called out separately from true ISO 607.</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p class="ma-technical-article__note">Performance metrics such as seam extension, seam strength, recovery and wash distortion depend on the actual knitted fabric, sewing thread, needle gauge, differential feed and tension—never on the ISO stitch number alone.</p>
</section>

<section id="applications" aria-labelledby="ma-fc-applications-title">
	<h2 id="ma-fc-applications-title">Garment applications: mapping seams to zones</h2>
	<p>Effective technical knitwear engineering assigns each stitch type to the zone where its geometry solves a real functional requirement rather than forcing one machine across an entire garment.</p>

	<h3>Where FLATLOCK belongs</h3>
	<ul>
		<li><strong>High-friction base-layer joins:</strong> Underarm panels, side-body seams, raglan sleeves and shoulder lines worn beneath backpacks or outer layers.</li>
		<li><strong>Next-to-skin bottoms and underwear:</strong> Crotch gussets, inseams and contoured leg panels on <a href="<?php echo esc_url( home_url( '/underwear-manufacturer/' ) ); ?>">performance underwear</a>, compression tights and running shorts where an upright internal allowance causes chafing.</li>
		<li><strong>Lightweight Merino wool and stretch knits:</strong> Close-fitting <a href="<?php echo esc_url( home_url( '/merino-wool-manufacturer/' ) ); ?>">Merino wool thermal layers</a> where minimal internal seam bulk improves long-duration comfort.</li>
	</ul>

	<h3>Where COVERSTITCH belongs</h3>
	<ul>
		<li><strong>Bottom hems and sleeve cuffs:</strong> Securing a single-folded knit edge with an extensible looper structure to support wear stretch and recovery during dressing and movement.</li>
		<li><strong>Necklines, armholes and bindings:</strong> Attaching SELF FABRIC or fold-over elastic bindings cleanly on tanks, running singlets and technical tees.</li>
		<li><strong>Waistbands and elastic channels:</strong> Topstitching folded waistbands or securing internal elastic so it does not roll during laundering.</li>
		<li><strong>Topstitched seams on structured layers:</strong> Flattening and reinforcing OVERLOCK joins on heavier fleece, hoodies or outer-layer <a href="<?php echo esc_url( home_url( '/sportswear-manufacturer/' ) ); ?>">sportswear</a> panels when true FLATLOCK is unnecessary or structurally unsuitable for bulky fabric layers.</li>
	</ul>
</section>

<section id="tech-pack" aria-labelledby="ma-fc-tech-pack-title">
	<h2 id="ma-fc-tech-pack-title">Tech pack callouts checklist</h2>
	<p>To avoid receiving faux flatlock when true FLATLOCK was intended—or receiving ISO 406 where ISO 605 top-cover was expected—specify every seam and hem operation explicitly in the <a href="<?php echo esc_url( home_url( '/technical-knitwear-tech-pack-guide/' ) ); ?>">tech pack or spec sheet</a>:</p>
	<ol>
		<li><strong>Map every operation separately:</strong> Label panel joins, hems, cuffs, neck bindings and waistband topstitching individually on the technical flats.</li>
		<li><strong>State the exact ISO stitch reference:</strong> Specify <code>ISO 607</code> for true 4-needle, 6-thread FLATLOCK; <code>ISO 605</code> for 3-needle, 5-thread top-and-bottom COVERSTITCH; <code>ISO 406</code> for 2-needle, 3-thread bottom COVERSTITCH; or <code>ISO 514 + ISO 605</code> if faux flatlock is explicitly approved.</li>
		<li><strong>Define needle gauge / stitch width:</strong> State the required finished seam or coverstitch width (for example, narrow vs. wide needle gauge on hems and bindings) and hem fold-back depth.</li>
		<li><strong>Specify thread and color placement:</strong> Note whether top-covering and needle threads are tonal or contrast, and indicate bulk/textured looper thread where softness against skin is required.</li>
		<li><strong>Call out both-face appearance:</strong> Attach reference photos or a physical standard showing acceptable exterior and interior finish, including raw-edge coverage inside hems.</li>
		<li><strong>Include fabric and test criteria:</strong> Pair the seam map with the finished-fabric specification (composition, GSM, stretch/recovery) and any required extension, seam-strength or laundering-twist tolerances.</li>
	</ol>
	<p>If you are also evaluating standard assembly seams or Merrow flat-overlock alternatives, compare these callouts alongside our <a href="<?php echo esc_url( home_url( '/flatlock-vs-overlock-technical-knitwear/' ) ); ?>">FLATLOCK vs OVERLOCK guide</a> and <a href="<?php echo esc_url( home_url( '/flatlock-vs-activeseam-technical-knitwear/' ) ); ?>">FLATLOCK vs Merrow ACTIVESEAM guide</a>.</p>
</section>

<section id="validation" aria-labelledby="ma-fc-validation-title">
	<h2 id="ma-fc-validation-title">Sample validation before bulk production</h2>
	<p>Stitch specifications should always be verified on the actual bulk-intent fabric before approving bulk cutting. Subtle shifts in GSM, elastane content, yarn twist or surface brushing can cause hem waviness or roping, skipped coverstitches over cross-seams or excessive seam rigidity.</p>
	<ol>
		<li><strong>Seam-map review:</strong> Confirm which joins require true ISO 607 FLATLOCK and which hems, bindings or topstitches use ISO 605 or ISO 406 COVERSTITCH.</li>
		<li><strong>Production-fabric sew-off:</strong> Run sample joins and folded hems on the nominated production fabric, including cross-seam intersections (such as side seams crossing the bottom hem).</li>
		<li><strong>Both-face and stretch inspection:</strong> Check natural flatness, raw-edge enclosure on the inside of hems, stitch balance and absence of thread breakage under agreed extension.</li>
		<li><strong>Wash and dimensional check:</strong> Verify hem twist, roping, shrinkage and stitch recovery after the buyer's specified laundering cycles.</li>
		<li><strong>Pre-production sign-off:</strong> Lock the approved sample and controlled tech pack as the binding reference for in-line and final inspection.</li>
	</ol>
	<p>See our <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">OEM knitwear services</a> overview for how sampling, bulk sewing, quality control and export documentation connect across a full program.</p>
</section>
