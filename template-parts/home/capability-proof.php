<?php
/**
 * Homepage capability proof strip.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$proof_items = array(
	array(
		'label' => __( 'Own Integrated Facility', 'myathletik-child' ),
		'copy'  => __( 'Fabric development, in-house testing, sampling, and garment production are coordinated within one full-package program.', 'myathletik-child' ),
		'icon'  => 'integration',
	),
	array(
		'label' => __( '30+ Yamato FLATLOCK Machines', 'myathletik-child' ),
		'copy'  => __( 'Industrial four-needle, six-thread stitch type 607 construction for base layers, underwear, sportswear, and other approved seam maps.', 'myathletik-child' ),
		'icon'  => 'construction',
	),
	array(
		'label' => __( 'Merrow ACTIVESEAM Equipment', 'myathletik-child' ),
		'copy'  => __( 'Dedicated ACTIVESEAM construction for projects that specify the Merrow seam platform and an approved seam appearance.', 'myathletik-child' ),
		'icon'  => 'activeseam',
	),
	array(
		'label' => __( 'HSAT-K5 Elastic Joining', 'myathletik-child' ),
		'copy'  => __( 'Automatic elastic-band joining supports repeatable waistband preparation before garment assembly and approval.', 'myathletik-child' ),
		'icon'  => 'elastic',
	),
);

$proof_media_base = get_stylesheet_directory_uri() . '/assets/images/production/equipment/technical-yarn-equipment-floor';
$proof_media_srcset = implode(
	', ',
	array(
		$proof_media_base . '-480.webp 480w',
		$proof_media_base . '-800.webp 800w',
		$proof_media_base . '-1536.webp 1536w',
	)
);
?>

<section class="ma-home-proof" aria-labelledby="ma-home-proof-title">
	<div class="ma-section-inner">
		<div class="ma-home-proof__panel">
			<picture class="ma-home-proof__background" aria-hidden="true">
				<img
					src="<?php echo esc_url( $proof_media_base . '-800.webp' ); ?>"
					srcset="<?php echo esc_attr( $proof_media_srcset ); ?>"
					sizes="(max-width: 75rem) calc(100vw - 3rem), 72rem"
					width="1536"
					height="1024"
					loading="lazy"
					decoding="async"
					alt=""
				>
			</picture>
			<div class="ma-home-proof__foreground">
				<h2 id="ma-home-proof-title" class="ma-section-kicker"><?php esc_html_e( 'Manufacturing proof points', 'myathletik-child' ); ?></h2>
				<div class="ma-home-proof__content">
					<div class="ma-home-proof__grid">
						<?php foreach ( $proof_items as $item ) : ?>
							<article class="ma-home-proof__item">
								<span class="ma-home-proof__icon" aria-hidden="true">
									<?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => $item['icon'] ) ); ?>
								</span>
								<h3><?php echo esc_html( $item['label'] ); ?></h3>
								<p><?php echo esc_html( $item['copy'] ); ?></p>
							</article>
						<?php endforeach; ?>
					</div>
					<p class="ma-home-proof__note">
						<?php esc_html_e( 'Equipment and stitch construction are assigned by fabric, seam location, stretch requirement, and approved sample rather than applied as a blanket specification.', 'myathletik-child' ); ?>
						<a href="<?php echo esc_url( home_url( '/flatlock-vs-overlock-technical-knitwear/' ) ); ?>"><?php esc_html_e( 'Review the FLATLOCK vs OVERLOCK production guide', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
