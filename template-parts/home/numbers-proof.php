<?php
/**
 * Homepage numbers and proof section.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$numbers = array(
	array( 'value' => '15+', 'label' => __( 'Years of production experience', 'myathletik-child' ), 'note' => __( 'Technical knitwear manufacturing experience for repeat B2B orders.', 'myathletik-child' ) ),
	array( 'value' => '4,500+ sq m', 'label' => __( 'Own production facility', 'myathletik-child' ), 'note' => __( 'Integrated manufacturing space for sample development and bulk production.', 'myathletik-child' ) ),
	array( 'value' => '100,000+', 'label' => __( 'Pieces per month capacity', 'myathletik-child' ), 'note' => __( 'Scalable capacity for underwear, sportswear, outdoor clothing, and knit programs.', 'myathletik-child' ) ),
	array( 'value' => '3 continents', 'label' => __( 'Brands served', 'myathletik-child' ), 'note' => __( 'Across North America, Europe, and Asia.', 'myathletik-child' ) ),
);
?>

<section class="ma-home-numbers" aria-labelledby="ma-home-numbers-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading ma-section-heading--center">
			<p class="ma-section-kicker"><?php esc_html_e( 'Production proof', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-numbers-title"><?php esc_html_e( 'Specific, current, and confirmable manufacturing capacity', 'myathletik-child' ); ?></h2>
		</div>

		<div class="ma-home-numbers__grid">
			<?php foreach ( $numbers as $item ) : ?>
				<article class="ma-number-card">
					<strong><?php echo esc_html( $item['value'] ); ?></strong>
					<h3><?php echo esc_html( $item['label'] ); ?></h3>
					<p><?php echo esc_html( $item['note'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
