<?php
/**
 * Sustainability page.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sustainability_points = array(
	array(
		'title' => __( 'Verified material programs', 'myathletik-child' ),
		'copy'  => __( 'GRS recycled fabrics, Better Cotton sourcing, and OEKO-TEX Standard 100 tested materials can be supported and documented by project.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Vertical integration & traceability', 'myathletik-child' ),
		'copy'  => __( 'With our own fabric mill and in-house testing, we maintain clearer visibility from yarn and fabric development through finished garments.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Fabric development support', 'myathletik-child' ),
		'copy'  => __( 'We help brands review fiber choice, construction, hand feel, performance targets, and testing needs before sampling and bulk production.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Responsible manufacturing', 'myathletik-child' ),
		'copy'  => __( 'Our production is supported by recognized social-compliance audits, memberships, and assessments, including BSCI, Sedex, WRAP, and Higg Index review.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Documentation on request', 'myathletik-child' ),
		'copy'  => __( 'For specific projects, we can support certificate review, material documentation, and environmental footprint or LCA data collection where required.', 'myathletik-child' ),
	),
);

$badge_base = get_stylesheet_directory_uri() . '/assets/images/audit&certificates/';
$badge_groups = array(
	array(
		'title'  => __( 'Environmental & material certifications', 'myathletik-child' ),
		'copy'   => __( 'Material programs include OEKO-TEX Standard 100, GRS recycled materials, Better Cotton sourcing, and FSC where relevant to paper, packaging, or fiber programs. Documentation can be reviewed by project.', 'myathletik-child' ),
		'badges' => array(
			array( 'file' => 'OEKO-100-300x300-150x150-1.png', 'alt' => __( 'OEKO-TEX Standard 100 badge', 'myathletik-child' ) ),
			array( 'file' => 'GRS-300x300-150x150-1.png', 'alt' => __( 'GRS certification badge', 'myathletik-child' ) ),
			array( 'file' => 'better-cotton-300x300-150x150-1.jpg', 'alt' => __( 'Better Cotton badge', 'myathletik-child' ) ),
			array( 'file' => 'FSC-300X300-150x150-1.jpg', 'alt' => __( 'FSC badge', 'myathletik-child' ) ),
		),
	),
	array(
		'title'  => __( 'Social compliance & responsible sourcing', 'myathletik-child' ),
		'copy'   => __( 'Social-compliance records include BSCI audit, Sedex membership, SMETA assessment, WRAP certification, and Higg Index assessment. Related documents can be shared where applicable.', 'myathletik-child' ),
		'badges' => array(
			array( 'file' => 'audit-bsci-sm-150x150-1.jpg', 'alt' => __( 'BSCI audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-sedex-150x150-1.jpg', 'alt' => __( 'Sedex audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-SMETA-150by150.png', 'alt' => __( 'SMETA audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-wrap-sm-150x150-1.jpg', 'alt' => __( 'WRAP audit badge', 'myathletik-child' ) ),
			array( 'file' => 'Higg_300X300-150x150-1.jpg', 'alt' => __( 'Higg Index assessment badge', 'myathletik-child' ) ),
		),
	),
);

$fabric_image_base = get_stylesheet_directory_uri() . '/assets/images/sustainable/';
$sustainable_fabrics = array(
	array(
		'title' => __( 'Recycled Polyester (rPET)', 'myathletik-child' ),
		'copy'  => __( 'GRS-certified recycled polyester fabric options made from recycled PET, helping reduce reliance on virgin petroleum-based fibers while keeping performance requirements practical for OEM/ODM development.', 'myathletik-child' ),
		'image' => 'recycled polyester.png',
	),
	array(
		'title' => __( 'Bamboo Charcoal Fiber', 'myathletik-child' ),
		'copy'  => __( 'A performance-oriented fiber option designed to support odor-control performance and moisture management in base-layer, activewear, and next-to-skin knitwear applications.', 'myathletik-child' ),
		'image' => 'bamboo charcoal fiber.png',
	),
	array(
		'title' => __( 'Coffee Yarn', 'myathletik-child' ),
		'copy'  => __( 'Made with recycled coffee grounds, coffee yarn can support odor control, moisture-wicking, and UV-related performance depending on fabric construction, finishing, and testing requirements.', 'myathletik-child' ),
		'image' => 'coffee yarn.png',
	),
	array(
		'title' => __( 'Natural & Cellulosic Comfort Fibers', 'myathletik-child' ),
		'copy'  => __( 'Wood-pulp-based cellulosic fibers such as lyocell and modal offer a soft hand feel, breathable comfort, and elegant drape. For OEM/ODM programs, they are often selected for underwear, base layers, loungewear, and lightweight knitwear where next-to-skin comfort is a priority.', 'myathletik-child' ),
		'image' => 'natural fiber.png',
	),
	array(
		'title' => __( 'Additional sustainable fibers on request', 'myathletik-child' ),
		'copy'  => __( 'For OEM/ODM programs with specific fiber, certification, or performance targets, we can review sourcing options and align material selection with sampling, testing, and production requirements.', 'myathletik-child' ),
		'image' => 'additional fibers.png',
	),
);

get_header();
?>

<main id="primary" class="site-main ma-sustainability-page">
	<section class="ma-sustainability-hero" aria-labelledby="ma-sustainability-title">
		<div class="ma-section-inner">
			<p class="ma-section-kicker"><?php esc_html_e( 'Materials, compliance & traceability', 'myathletik-child' ); ?></p>
			<h1 id="ma-sustainability-title"><?php esc_html_e( 'Sustainability', 'myathletik-child' ); ?></h1>
			<p><?php esc_html_e( 'As a vertically integrated manufacturer, we are able to make responsible choices at each stage of production, from the fabrics we knit to the way we work with our brand partners. We focus on practical, verifiable steps rather than broad claims.', 'myathletik-child' ); ?></p>
		</div>
	</section>

	<section class="ma-sustainable-fabrics" aria-labelledby="ma-sustainable-fabrics-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Sustainable fabrics', 'myathletik-child' ); ?></p>
				<h2 id="ma-sustainable-fabrics-title"><?php esc_html_e( 'For OEM/ODM Development', 'myathletik-child' ); ?></h2>
				<p><?php esc_html_e( 'For brands developing lower-impact or material-conscious collections, we support a focused range of verified, development-ready fabric options. For other recycled or sustainable fibers, we can source according to your fiber, certification, and performance requirements.
', 'myathletik-child' ); ?></p>
			</div>
			<div class="ma-sustainable-fabrics__grid">
				<?php foreach ( $sustainable_fabrics as $fabric ) : ?>
					<article class="ma-sustainable-fabric-card">
						<div class="ma-sustainable-fabric-card__media" aria-hidden="<?php echo empty( $fabric['image'] ) ? 'true' : 'false'; ?>">
							<?php if ( ! empty( $fabric['image'] ) ) : ?>
								<img src="<?php echo esc_url( $fabric_image_base . $fabric['image'] ); ?>" alt="<?php echo esc_attr( $fabric['title'] ); ?>" loading="lazy">
							<?php endif; ?>
						</div>
						<div class="ma-sustainable-fabric-card__body">
							<h3><?php echo esc_html( $fabric['title'] ); ?></h3>
							<p><?php echo esc_html( $fabric['copy'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="ma-sustainable-fabrics__note"><?php esc_html_e( 'Material certificates, test reports, and supporting documentation can be reviewed by project where applicable.', 'myathletik-child' ); ?></p>
		</div>
	</section>

	<section class="ma-sustainability-actions" aria-labelledby="ma-sustainability-actions-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Responsible manufacturing', 'myathletik-child' ); ?></p>
				<h2 id="ma-sustainability-actions-title"><?php esc_html_e( 'Practical steps we can document', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-sustainability-actions__grid">
				<?php foreach ( $sustainability_points as $point ) : ?>
					<article class="ma-sustainability-card">
						<h3><?php echo esc_html( $point['title'] ); ?></h3>
						<p><?php echo esc_html( $point['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-sustainability-badges" aria-labelledby="ma-sustainability-badges-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Certifications & compliance', 'myathletik-child' ); ?></p>
				<h2 id="ma-sustainability-badges-title"><?php esc_html_e( 'Certifications and compliance documentation', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-certification-groups">
				<?php foreach ( $badge_groups as $group ) : ?>
					<section class="ma-certification-group" aria-label="<?php echo esc_attr( $group['title'] ); ?>">
						<h3><?php echo esc_html( $group['title'] ); ?></h3>
						<p><?php echo esc_html( $group['copy'] ); ?></p>
						<div class="ma-home-certifications__strip">
							<?php foreach ( $group['badges'] as $badge ) : ?>
								<div class="ma-certification-badge">
									<img src="<?php echo esc_url( $badge_base . $badge['file'] ); ?>" alt="<?php echo esc_attr( $badge['alt'] ); ?>" loading="lazy">
								</div>
							<?php endforeach; ?>
						</div>
					</section>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-sustainability-cta" aria-labelledby="ma-sustainability-cta-title">
		<div class="ma-section-inner ma-sustainability-cta__inner">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Project requirements', 'myathletik-child' ); ?></p>
				<h2 id="ma-sustainability-cta-title"><?php esc_html_e( 'Have specific sustainability requirements?', 'myathletik-child' ); ?></h2>
				<p><?php esc_html_e( 'Tell us what your brand needs and we will review suitable materials, documentation, testing, and production paths for your program.', 'myathletik-child' ); ?></p>
			</div>
			<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'myathletik-child' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
