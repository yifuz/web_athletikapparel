<?php
/** Local-only related product entry for the existing homepage or Merino page. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_preview_enabled' ) || ! myathletik_product_showcase_preview_enabled() ) {
	return;
}
$context = isset( $args['context'] ) ? $args['context'] : 'home';
if ( ! in_array( $context, array( 'home', 'merino' ), true ) ) {
	return;
}
?>
<section class="ma-pl ma-pl-section ma-pl-surface ma-pl-entry" aria-labelledby="ma-pl-<?php echo esc_attr( $context ); ?>-title">
	<?php if ( 'home' === $context ) : ?>
		<div class="ma-section-inner ma-pl-feature-entry">
			<div class="ma-pl-feature-entry__intro">
				<p class="ma-pl-eyebrow">Product Showcase</p>
				<h2 id="ma-pl-home-title">See the product behind the brief</h2>
				<p class="ma-pl-muted">Explore real garment examples with material details and development options to inform your next product brief.</p>
				<a class="ma-pl-text-link" href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">View all product examples <span aria-hidden="true">→</span></a>
			</div>
			<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'context' => 'home', 'product_key' => 'ocean-depth' ) ); ?>
		</div>
	<?php else : ?>
		<div class="ma-section-inner">
			<div class="ma-pl-section-head">
				<div><p class="ma-pl-eyebrow">Product Showcase</p><h2 id="ma-pl-merino-title">Merino wool product examples</h2></div>
				<a class="ma-pl-text-link" href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">View all product examples <span aria-hidden="true">→</span></a>
			</div>
			<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'context' => 'merino', 'product_key' => 'ocean-depth' ) ); ?>
		</div>
	<?php endif; ?>
</section>
