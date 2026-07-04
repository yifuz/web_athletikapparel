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
	),
	array(
		'label' => __( 'Technical Construction', 'myathletik-child' ),
		'copy'  => __( 'Yamato flatlock and Merrow activeseam machines.', 'myathletik-child' ),
	),
	array(
		'label' => __( "15 Years' Experience", 'myathletik-child' ),
		'copy'  => __( 'Trusted by brands across North America, Europe and the Nordics.', 'myathletik-child' ),
	),
	array(
		'label' => __( 'Full-Package OEM/ODM', 'myathletik-child' ),
		'copy'  => __( 'From yarn to finished garment.', 'myathletik-child' ),
	),
);
?>

<section class="ma-home-proof" aria-labelledby="ma-home-proof-title">
	<div class="ma-section-inner">
		<h2 id="ma-home-proof-title" class="ma-section-kicker"><?php esc_html_e( 'Manufacturing proof points', 'myathletik-child' ); ?></h2>
		<div class="ma-home-proof__grid">
			<?php foreach ( $proof_items as $index => $item ) : ?>
				<article class="ma-home-proof__item">
					<span class="ma-home-proof__mark" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $item['label'] ); ?></h3>
					<p><?php echo esc_html( $item['copy'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
