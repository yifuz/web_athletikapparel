<?php
/**
 * Homepage why myathletik section.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Vertical Integration', 'myathletik-child' ),
		'copy'  => __( 'From yarn and fabric development with full in-house testing to flatlock and activeseam garment construction, we control quality at every stage.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Technical Knit Construction', 'myathletik-child' ),
		'copy'  => __( 'Specialized in flatlock seam and activeseam production with Yamato and Merrow machines, refined over 15 years.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Performance Fabric Expertise', 'myathletik-child' ),
		'copy'  => __( 'Microfiber, merino wool, power stretch, Genesis fleece, 4-way stretch, and functional fabrics: moisture-wicking, UV-protective, and antimicrobial bamboo charcoal.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Flexible Capacity', 'myathletik-child' ),
		'copy'  => __( 'Scalable production that flexes with your order size, without compromising lead times or quality.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Global Brand Experience', 'myathletik-child' ),
		'copy'  => __( 'Producing for brands across Canada, the USA, the UK, Singapore, and the Nordics.', 'myathletik-child' ),
	),
);
?>

<section class="ma-home-why" aria-labelledby="ma-home-why-title">
	<div class="ma-section-inner ma-home-why__layout">
		<div class="ma-section-heading">
			<p class="ma-section-kicker"><?php esc_html_e( 'Why myathletik', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-why-title"><?php esc_html_e( 'Built for technical repeat orders, not tiny one-off runs', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( "We're not just a factory - we're an integrated production partner. From yarn and fabric development to finished-garment construction, we give performance brands the technical capability and flexible capacity to bring demanding designs to life.", 'myathletik-child' ); ?></p>
		</div>

		<div class="ma-home-why__list">
			<?php foreach ( $reasons as $index => $reason ) : ?>
				<article class="ma-reason-card">
					<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['copy'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
