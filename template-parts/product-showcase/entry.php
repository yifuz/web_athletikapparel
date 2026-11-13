<?php
/** Related product entry for the homepage or an enabled category page. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_enabled' ) || ! myathletik_product_showcase_enabled() ) {
	return;
}
$context = isset( $args['context'] ) ? $args['context'] : 'home';
$category_contexts = array(
	'merino'  => array( 'slug' => 'merino-wool-manufacturer', 'heading' => 'Merino wool product examples' ),
	'outdoor' => array( 'slug' => 'outdoor-clothing-manufacturer', 'heading' => 'Outdoor clothing product examples' ),
);
if ( 'home' !== $context && ! isset( $category_contexts[ $context ] ) ) {
	return;
}
$product_key = isset( $args['product_key'] ) ? sanitize_key( $args['product_key'] ) : 'ocean-depth';
$products    = myathletik_product_showcase_products();
$category_products = isset( $category_contexts[ $context ] ) ? myathletik_product_showcase_category_preview( $category_contexts[ $context ]['slug'] ) : array();
if ( ( 'home' === $context && ! isset( $products[ $product_key ] ) ) || ( 'home' !== $context && ! $category_products ) ) {
	return;
}
?>
<section class="ma-pl ma-pl-section ma-pl-surface ma-pl-entry<?php echo 'outdoor' === $context ? ' ma-pl-entry--outdoor' : ''; ?>" aria-labelledby="ma-pl-<?php echo esc_attr( $context ); ?>-title">
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
				<div><p class="ma-pl-eyebrow">Product Showcase</p><h2 id="ma-pl-<?php echo esc_attr( $context ); ?>-title"><?php echo esc_html( $category_contexts[ $context ]['heading'] ); ?></h2></div>
				<a class="ma-pl-text-link" href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">View all product examples <span aria-hidden="true">→</span></a>
			</div>
			<?php if ( count( $category_products ) > 1 ) : ?>
				<p id="ma-pl-<?php echo esc_attr( $context ); ?>-scroll-help" class="ma-pl-preview-help">Swipe or scroll to view both examples.</p>
			<?php endif; ?>
			<div class="ma-pl-related-products<?php echo 'outdoor' === $context && 1 === count( $category_products ) ? ' ma-pl-related-products--single' : ''; ?>" role="region" aria-labelledby="ma-pl-<?php echo esc_attr( $context ); ?>-title"<?php if ( count( $category_products ) > 1 ) : ?> tabindex="0" aria-describedby="ma-pl-<?php echo esc_attr( $context ); ?>-scroll-help"<?php endif; ?>>
				<?php foreach ( array_keys( $category_products ) as $category_key ) : ?>
					<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'context' => $context, 'product_key' => $category_key ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
