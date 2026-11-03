<?php
/**
 * One product record rendered for the library or a related category entry.
 *
 * @param array $args product_key and context (library, home, merino).
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_enabled' ) || ! myathletik_product_showcase_enabled() ) {
	return;
}
$product_key = isset( $args['product_key'] ) ? sanitize_key( $args['product_key'] ) : 'ocean-depth';
$context     = isset( $args['context'] ) ? $args['context'] : 'library';
$products    = myathletik_product_showcase_products();
if ( ! isset( $products[ $product_key ] ) || ! in_array( $context, array( 'library', 'home', 'merino' ), true ) ) {
	return;
}
$product = $products[ $product_key ];
$image   = $product['media']['images']['front'];
$url     = myathletik_product_example_url( $product_key );
// Cover crops a 16:9 source into a taller frame; size the source for that frame height.
$sizes   = '(max-width: 760px) 684px, 854px';
?>
<?php if ( 'library' === $context ) : ?>
	<article class="ma-pl-product-card" data-material="<?php echo esc_attr( $product['material'] ); ?>" data-search="<?php echo esc_attr( $product['search'] ); ?>">
		<a class="ma-pl-product-card__image" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( 'View ' . $product['name'] . ' product example' ); ?>">
			<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" width="1280" height="720" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="eager" decoding="async">
			<span class="ma-pl-media-note">Photos + product video <span aria-hidden="true">↗</span></span>
		</a>
		<div class="ma-pl-product-card__body">
			<p class="ma-pl-eyebrow"><?php echo esc_html( $product['material_label'] . ' · ' . $product['name'] ); ?></p>
			<h2><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h2>
			<p class="ma-pl-product-card__description"><?php echo esc_html( $product['summary'] ); ?></p>
			<dl class="ma-pl-product-facts">
				<div class="ma-pl-fact"><dt>Fabric weight</dt><dd><?php echo esc_html( $product['gsm'] ); ?></dd></div>
				<div class="ma-pl-fact"><dt>Fabric reference</dt><dd><?php echo esc_html( $product['fabric_ref'] ); ?></dd></div>
			</dl>
			<p class="ma-pl-composition"><?php echo esc_html( $product['composition'] ); ?></p>
			<a class="ma-pl-button" href="<?php echo esc_url( $url ); ?>">Explore this product <span aria-hidden="true">→</span></a>
		</div>
	</article>
<?php elseif ( 'home' === $context ) : ?>
	<article class="ma-pl-compact-product">
		<a class="ma-pl-compact-product__image" href="<?php echo esc_url( $url ); ?>">
			<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="720px" width="1280" height="720" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy" decoding="async">
		</a>
		<div class="ma-pl-compact-product__body">
			<p class="ma-pl-eyebrow"><?php echo esc_html( $product['material_label'] ); ?></p>
			<h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['name'] ); ?></a></h3>
			<p class="ma-pl-muted"><?php echo esc_html( $product['title'] ); ?></p>
			<dl class="ma-pl-product-facts">
				<div class="ma-pl-fact"><dt>Fabric weight</dt><dd><?php echo esc_html( $product['gsm'] ); ?></dd></div>
				<div class="ma-pl-fact"><dt>Fabric reference</dt><dd><?php echo esc_html( $product['fabric_ref'] ); ?></dd></div>
			</dl>
			<a class="ma-pl-text-link" href="<?php echo esc_url( $url ); ?>">View product example <span aria-hidden="true">→</span></a>
		</div>
	</article>
<?php else : ?>
	<article class="ma-pl-related-product">
		<div class="ma-pl-related-product__image">
			<a href="<?php echo esc_url( $url ); ?>">
				<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" width="1280" height="720" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy" decoding="async">
			</a>
		</div>
		<div class="ma-pl-related-product__body">
			<p class="ma-pl-eyebrow"><?php echo esc_html( $product['name'] ); ?></p>
			<h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h3>
			<p class="ma-pl-muted"><?php echo esc_html( $product['summary'] ); ?></p>
			<dl class="ma-pl-product-facts">
				<div class="ma-pl-fact"><dt>Composition</dt><dd><?php echo esc_html( $product['composition'] ); ?></dd></div>
				<div class="ma-pl-fact"><dt>Fabric weight</dt><dd><?php echo esc_html( $product['gsm'] ); ?></dd></div>
				<div class="ma-pl-fact"><dt>Fabric reference</dt><dd><?php echo esc_html( $product['fabric_ref'] ); ?></dd></div>
				<div class="ma-pl-fact"><dt>Suggested use</dt><dd><?php echo esc_html( $product['use'] ); ?></dd></div>
			</dl>
			<a class="ma-pl-button" href="<?php echo esc_url( $url ); ?>">Explore this product example <span aria-hidden="true">→</span></a>
		</div>
	</article>
<?php endif; ?>
