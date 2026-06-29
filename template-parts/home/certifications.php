<?php
/**
 * Homepage certifications and audit strip.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$badge_base = get_stylesheet_directory_uri() . '/assets/images/audit&certificates/';
$badge_groups = array(
	array(
		'title'  => __( 'Environmental & material certifications', 'myathletik-child' ),
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
		'badges' => array(
			array( 'file' => 'audit-bsci-sm-150x150-1.jpg', 'alt' => __( 'BSCI audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-sedex-150x150-1.jpg', 'alt' => __( 'Sedex audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-SMETA-150by150.png', 'alt' => __( 'SMETA audit badge', 'myathletik-child' ) ),
			array( 'file' => 'audit-wrap-sm-150x150-1.jpg', 'alt' => __( 'WRAP audit badge', 'myathletik-child' ) ),
			array( 'file' => 'Higg_300X300-150x150-1.jpg', 'alt' => __( 'Higg Index assessment badge', 'myathletik-child' ) ),
		),
	),
);
?>

<section class="ma-home-certifications" aria-labelledby="ma-home-certifications-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading ma-section-heading--center">
			<p class="ma-section-kicker"><?php esc_html_e( 'Audits and certifications', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-certifications-title"><?php esc_html_e( 'Verified badges, grouped by purpose', 'myathletik-child' ); ?></h2>
		</div>

		<div class="ma-certification-groups">
			<?php foreach ( $badge_groups as $group ) : ?>
				<section class="ma-certification-group" aria-label="<?php echo esc_attr( $group['title'] ); ?>">
					<h3><?php echo esc_html( $group['title'] ); ?></h3>
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
