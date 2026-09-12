<?php
/**
 * Homepage process snapshot.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'title' => __( 'Sampling & Prototyping', 'myathletik-child' ),
		'url'   => '/services/',
		'copy'  => __( 'Samples in 1-2 weeks, depending on complexity. We work from your samples, designs, or concepts.', 'myathletik-child' ),
		'icon'  => 'sampling',
	),
	array(
		'title' => __( 'Bulk Production', 'myathletik-child' ),
		'url'   => '/services/',
		/* translators: %s: public MOQ in pieces per style. */
		'copy'  => sprintf( __( 'MOQ %s pcs per style, built on technical knit construction.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
		'icon'  => 'production',
	),
	array(
		'title' => __( 'Quality Control', 'myathletik-child' ),
		'url'   => '/services/',
		'copy'  => __( 'In-house testing and inspection at every stage.', 'myathletik-child' ),
		'icon'  => 'quality',
	),
	array(
		'title' => __( 'Export & Shipping', 'myathletik-child' ),
		'url'   => '/services/',
		'copy'  => __( 'FOB and DDP supported, with our own freight booking.', 'myathletik-child' ),
		'icon'  => 'shipping',
	),
);
?>

<section class="ma-home-process" aria-labelledby="ma-home-process-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading">
			<p class="ma-section-kicker"><?php esc_html_e( 'Process snapshot', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-process-title"><?php esc_html_e( 'From first sample to final shipment', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'From first sample to final shipment, every order runs through our integrated process - built for technical knitwear and the brands that depend on it.', 'myathletik-child' ); ?></p>
		</div>

		<div class="ma-home-process__grid">
			<?php foreach ( $steps as $index => $step ) : ?>
				<a class="ma-process-step<?php echo 3 === $index ? ' ma-process-step--featured' : ''; ?>" href="<?php echo esc_url( home_url( $step['url'] ) ); ?>">
					<span class="ma-process-step__meta" aria-hidden="true">
						<span class="ma-process-step__icon">
							<?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => $step['icon'] ) ); ?>
						</span>
						<span class="ma-process-step__index"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					</span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['copy'] ); ?></p>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
