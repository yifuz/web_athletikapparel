<?php
/** Related product entry for the existing homepage or Merino page. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_enabled' ) || ! myathletik_product_showcase_enabled() ) {
	return;
}
$context = isset( $args['context'] ) ? $args['context'] : 'home';
if ( ! in_array( $context, array( 'home', 'merino' ), true ) ) {
	return;
}
$product_key = isset( $args['product_key'] ) ? sanitize_key( $args['product_key'] ) : 'ocean-depth';
$products    = myathletik_product_showcase_products();
$merino_products = array_filter( $products, static function ( $product ) {
	return 'merino-wool-manufacturer' === ( $product['category_slug'] ?? '' );
} );
if ( ( 'home' === $context && ! isset( $products[ $product_key ] ) ) || ( 'merino' === $context && ! $merino_products ) ) {
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
			<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'context' => 'home', 'product_key' => $product_key ) ); ?>
		</div>
	<?php else : ?>
		<div class="ma-section-inner">
			<div class="ma-pl-section-head">
				<div><p class="ma-pl-eyebrow">Product Showcase</p><h2 id="ma-pl-merino-title">Merino wool product examples</h2></div>
				<a class="ma-pl-text-link" href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">View all product examples <span aria-hidden="true">→</span></a>
			</div>
			<div class="ma-pl-related-products">
				<?php foreach ( array_keys( $merino_products ) as $merino_key ) : ?>
					<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'context' => 'merino', 'product_key' => $merino_key ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
