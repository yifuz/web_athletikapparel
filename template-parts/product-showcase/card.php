<?php
/**
 * One product record rendered for the library or a related category entry.
 *
 * @param array $args product_key and context (library, home, merino, outdoor).
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
if ( ! isset( $products[ $product_key ] ) || ! in_array( $context, array( 'library', 'home', 'merino', 'outdoor', 'sportswear' ), true ) ) {
	return;
}
$product     = $products[ $product_key ];
$image       = $product['media']['images']['front'];
$url         = myathletik_product_example_url( $product_key );
$img_width   = ! empty( $image['width'] ) ? absint( $image['width'] ) : 1280;
$img_height  = ! empty( $image['height'] ) ? absint( $image['height'] ) : 720;
$is_portrait = 'portrait' === ( $product['media']['aspect'] ?? '' ) || $img_height > $img_width;

$card_facts = array();
if ( ! empty( $product['gsm'] ) ) {
	$card_facts['Fabric weight'] = $product['gsm'];
} elseif ( ! empty( $product['stitching'] ) ) {
	$card_facts['Construction'] = $product['stitching'];
} elseif ( ! empty( $product['style_ref'] ) ) {
	$card_facts['Style reference'] = $product['style_ref'];
}
if ( ! empty( $product['fabric_ref'] ) ) {
	$card_facts['Fabric reference'] = $product['fabric_ref'];
}
$facts_class = 'ma-pl-product-facts' . ( 1 === count( $card_facts ) ? ' ma-pl-product-facts--single' : '' );
?>
<?php if ( 'library' === $context ) : ?>
	<?php $sizes = $is_portrait ? '(max-width: 760px) 533px, 600px' : '(max-width: 760px) 684px, 854px'; ?>
	<article class="ma-pl-product-card" data-category="<?php echo esc_attr( $product['category_slug'] ?? '' ); ?>" data-material="<?php echo esc_attr( $product['material'] ); ?>" data-search="<?php echo esc_attr( $product['search'] ); ?>">
		<a class="ma-pl-product-card__image<?php echo $is_portrait ? ' ma-pl-product-card__image--portrait' : ''; ?>" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( 'View ' . $product['name'] . ' product example' ); ?>">
			<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" width="<?php echo esc_attr( $img_width ); ?>" height="<?php echo esc_attr( $img_height ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="eager" decoding="async">
			<span class="ma-pl-media-note"><?php echo esc_html( count( $product['media']['videos'] ?? array() ) > 1 ? sprintf( __( 'Photos + %d product videos', 'myathletik-child' ), count( $product['media']['videos'] ) ) : 'Photos + product video' ); ?> <span aria-hidden="true">↗</span></span>
		</a>
		<div class="ma-pl-product-card__body">
			<p class="ma-pl-eyebrow"><?php echo esc_html( $product['material_label'] . ' · ' . $product['name'] ); ?></p>
			<h2><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h2>
			<p class="ma-pl-product-card__description"><?php echo esc_html( $product['summary'] ); ?></p>
			<dl class="<?php echo esc_attr( $facts_class ); ?>">
				<?php foreach ( $card_facts as $fact_label => $fact_value ) : ?>
					<div class="ma-pl-fact"><dt><?php echo esc_html( $fact_label ); ?></dt><dd><?php echo esc_html( $fact_value ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
			<p class="ma-pl-composition"><?php echo esc_html( $product['composition'] ); ?></p>
			<a class="ma-pl-button" href="<?php echo esc_url( $url ); ?>">Explore this product <span aria-hidden="true">→</span></a>
		</div>
	</article>
<?php elseif ( 'home' === $context ) : ?>
	<article class="ma-pl-compact-product">
		<a class="ma-pl-compact-product__image<?php echo $is_portrait ? ' ma-pl-compact-product__image--portrait' : ''; ?>" href="<?php echo esc_url( $url ); ?>">
			<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="720px" width="<?php echo esc_attr( $img_width ); ?>" height="<?php echo esc_attr( $img_height ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy" decoding="async">
		</a>
		<div class="ma-pl-compact-product__body">
			<p class="ma-pl-eyebrow"><?php echo esc_html( $product['material_label'] ); ?></p>
			<h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['name'] ); ?></a></h3>
			<p class="ma-pl-muted"><?php echo esc_html( $product['title'] ); ?></p>
			<dl class="<?php echo esc_attr( $facts_class ); ?>">
				<?php foreach ( $card_facts as $fact_label => $fact_value ) : ?>
					<div class="ma-pl-fact"><dt><?php echo esc_html( $fact_label ); ?></dt><dd><?php echo esc_html( $fact_value ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
			<a class="ma-pl-text-link" href="<?php echo esc_url( $url ); ?>">View product example <span aria-hidden="true">→</span></a>
		</div>
	</article>
<?php else : ?>
	<?php $related_sizes = $is_portrait ? '533px' : '570px'; ?>
	<article class="ma-pl-related-product">
		<div class="ma-pl-related-product__image<?php echo $is_portrait ? ' ma-pl-related-product__image--portrait' : ''; ?>">
			<a href="<?php echo esc_url( $url ); ?>">
				<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="<?php echo esc_attr( $related_sizes ); ?>" width="<?php echo esc_attr( $img_width ); ?>" height="<?php echo esc_attr( $img_height ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy" decoding="async">
			</a>
		</div>
		<div class="ma-pl-related-product__body">
			<p class="ma-pl-eyebrow"><?php echo esc_html( $product['name'] ); ?></p>
			<h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h3>
			<dl class="<?php echo esc_attr( $facts_class ); ?>">
				<?php foreach ( $card_facts as $fact_label => $fact_value ) : ?>
					<div class="ma-pl-fact"><dt><?php echo esc_html( $fact_label ); ?></dt><dd><?php echo esc_html( $fact_value ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
			<a class="ma-pl-text-link" href="<?php echo esc_url( $url ); ?>">View product details <span aria-hidden="true">→</span></a>
		</div>
	</article>
<?php endif; ?>
