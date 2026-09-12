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
		'label' => __( 'Vertically Integrated', 'myathletik-child' ),
		'copy'  => __( 'Our own production facility with flexible, scalable capacity.', 'myathletik-child' ),
		'icon'  => 'integration',
	),
	array(
		'label' => __( 'Technical Construction', 'myathletik-child' ),
		'copy'  => __( 'Yamato FLATLOCK and Merrow ACTIVESEAM machines.', 'myathletik-child' ),
		'icon'  => 'construction',
	),
	array(
		'label' => __( "15 Years' Experience", 'myathletik-child' ),
		'copy'  => __( 'Trusted by brands across North America, Europe and the Nordics.', 'myathletik-child' ),
		'icon'  => 'experience',
	),
	array(
		'label' => __( 'Full-Package OEM/ODM', 'myathletik-child' ),
		'copy'  => __( 'From yarn to finished garment.', 'myathletik-child' ),
		'icon'  => 'oem',
	),
);
?>

<section class="ma-home-proof" aria-labelledby="ma-home-proof-title">
	<div class="ma-section-inner">
		<h2 id="ma-home-proof-title" class="ma-section-kicker"><?php esc_html_e( 'Manufacturing proof points', 'myathletik-child' ); ?></h2>
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
	</div>
</section>
