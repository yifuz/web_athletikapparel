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
		'title' => __( 'Recycled & responsibly sourced materials', 'myathletik-child' ),
		'copy'  => __( 'We offer GRS-certified recycled fabrics for brands incorporating recycled content, and support more responsibly sourced materials including Better Cotton. Our fabrics are tested to OEKO-TEX Standard 100 for harmful substances.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Vertical integration & traceability', 'myathletik-child' ),
		'copy'  => __( 'Because we run our own fabric mill with in-house testing, we have visibility into the materials that go into our garments, supporting traceability and consistent quality from yarn to finished piece.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Natural and performance fibers', 'myathletik-child' ),
		'copy'  => __( 'Our range includes natural fibers such as merino wool alongside engineered performance fabrics, giving brands options that balance performance with material choice.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Responsible manufacturing', 'myathletik-child' ),
		'copy'  => __( 'Our production is backed by recognized social-compliance audits and memberships including BSCI, Sedex, and WRAP, reflecting our commitment to responsible manufacturing.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Footprint data on request', 'myathletik-child' ),
		'copy'  => __( 'For brands that require it, we can support environmental footprint or LCA data collection for specific products as part of a project.', 'myathletik-child' ),
	),
);

$badge_base = get_stylesheet_directory_uri() . '/assets/images/audit&certificates/';
$badge_groups = array(
	array(
		'title'  => __( 'Environmental & material certifications', 'myathletik-child' ),
		'copy'   => __( 'Material and environmental badges are shown separately from social-compliance audits so buyers can review each type of documentation clearly.', 'myathletik-child' ),
		'badges' => array(
			array( 'file' => 'OEKO-100-300x300-150x150-1.png', 'alt' => __( 'OEKO-TEX Standard 100 badge', 'myathletik-child' ) ),
			array( 'file' => 'GRS-300x300-150x150-1.png', 'alt' => __( 'GRS certification badge', 'myathletik-child' ) ),
			array( 'file' => 'better-cotton-300x300-150x150-1.jpg', 'alt' => __( 'Better Cotton badge', 'myathletik-child' ) ),
			array( 'file' => 'FSC-300X300-150x150-1.jpg', 'alt' => __( 'FSC badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-RWS-150by150.png', 'alt' => __( 'RWS badge', 'myathletik-child' ) ),
		),
	),
	array(
		'title'  => __( 'Social compliance & responsible sourcing', 'myathletik-child' ),
		'copy'   => __( 'Social-compliance and responsible-sourcing programs are listed as audits, memberships, or assessments according to their role.', 'myathletik-child' ),
		'badges' => array(
			array( 'file' => 'audit-bsci-sm-150x150-1.jpg', 'alt' => __( 'BSCI audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-sedex-150x150-1.jpg', 'alt' => __( 'Sedex audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-SMETA-150by150.png', 'alt' => __( 'SMETA audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-wrap-sm-150x150-1.jpg', 'alt' => __( 'WRAP audit badge', 'myathletik-child' ) ),
			array( 'file' => 'Higg_300X300-150x150-1.jpg', 'alt' => __( 'Higg Index assessment badge', 'myathletik-child' ) ),
		),
	),
);

get_header();
?>

<main id="primary" class="site-main ma-sustainability-page">
	<section class="ma-sustainability-hero" aria-labelledby="ma-sustainability-title">
		<div class="ma-section-inner">
			<p class="ma-section-kicker"><?php esc_html_e( 'Sustainability', 'myathletik-child' ); ?></p>
			<h1 id="ma-sustainability-title"><?php esc_html_e( 'Sustainability', 'myathletik-child' ); ?></h1>
			<p><?php esc_html_e( 'As a vertically integrated manufacturer, we are able to make responsible choices at each stage of production, from the fabrics we knit to the way we work with our brand partners. We focus on practical, verifiable steps rather than broad claims.', 'myathletik-child' ); ?></p>
		</div>
	</section>

	<section class="ma-sustainability-actions" aria-labelledby="ma-sustainability-actions-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'What we do today', 'myathletik-child' ); ?></p>
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
				<h2 id="ma-sustainability-badges-title"><?php esc_html_e( 'Grouped for clear review', 'myathletik-child' ); ?></h2>
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
				<p><?php esc_html_e( 'Tell us what your brand needs and we will work with you to review the right materials, documentation, and production path.', 'myathletik-child' ); ?></p>
			</div>
			<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'myathletik-child' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
