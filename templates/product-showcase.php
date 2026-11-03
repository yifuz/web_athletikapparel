<?php
/**
 * Product Showcase library.
 *
 * Routing, metadata and availability are controlled by the integration module.
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_enabled' ) || ! myathletik_product_showcase_enabled() ) {
	return;
}

$products   = myathletik_product_showcase_products();
$materials  = array();
$categories = array(
	'sportswear-manufacturer'         => 'Sportswear',
	'underwear-manufacturer'          => 'Underwear',
	'outdoor-clothing-manufacturer'   => 'Outdoor Clothing',
	'merino-wool-manufacturer'        => 'Merino Wool',
	'silk-wear-manufacturer'          => 'Silk Wear',
	'knitted-fabrics-manufacturer'    => 'Knitted Fabrics',
	'sports-accessories-manufacturer' => 'Sports Accessories',
);
foreach ( $products as $product ) {
	$materials[ $product['material'] ] = $product['material_label'];
}

get_header();
?>
<main id="primary" class="site-main ma-pl ma-pl-library">
	<div class="ma-section-inner">
		<section class="ma-pl-library-intro" aria-labelledby="ma-pl-library-title">
			<div>
				<p class="ma-pl-eyebrow">From sample to development brief</p>
				<h1 id="ma-pl-library-title">Product Showcase</h1>
				<p class="ma-pl-library-intro__lead">Explore real garment examples, their materials and development options. Find a reference for your next OEM apparel project.</p>
			</div>
			<div class="ma-pl-library-intro__aside">
				<strong>A closer look at the product.</strong>
				<p>See the sample in photos and video, review its fabric specification, then explore the choices for your own program.</p>
			</div>
		</section>
		<section aria-label="Browse product examples">
			<div class="ma-pl-filter-bar" id="ma-pl-product-filters" hidden>
				<div>
					<span class="ma-pl-filter-label" id="ma-pl-material-label">Material</span>
					<div class="ma-pl-filter-options" role="group" aria-labelledby="ma-pl-material-label">
						<button class="ma-pl-filter-chip" type="button" aria-pressed="true" data-material="all">All examples</button>
						<?php foreach ( $materials as $material => $label ) : ?>
							<button class="ma-pl-filter-chip" type="button" aria-pressed="false" data-material="<?php echo esc_attr( $material ); ?>"><?php echo esc_html( $label ); ?></button>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="ma-pl-search-field">
					<label for="ma-pl-product-search">Find a product reference</label>
					<input id="ma-pl-product-search" type="search" placeholder="Product, material or fabric reference" autocomplete="off" aria-controls="ma-pl-product-results">
				</div>
			</div>
			<div class="ma-pl-result-summary">
				<p id="ma-pl-result-count" role="status" aria-live="polite" aria-atomic="true"><?php echo esc_html( sprintf( _n( '%s product example', '%s product examples', count( $products ), 'myathletik-child' ), number_format_i18n( count( $products ) ) ) ); ?></p>
				<span>Actual sample · Material details · Development options</span>
			</div>
			<div class="ma-pl-product-grid" id="ma-pl-product-results">
				<?php foreach ( array_keys( $products ) as $product_key ) : ?>
					<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'product_key' => $product_key, 'context' => 'library' ) ); ?>
				<?php endforeach; ?>
			</div>
			<div id="ma-pl-empty-results" class="ma-pl-empty-results" hidden>
				<h2>No matching example</h2>
				<p>Try another material, product name or fabric reference.</p>
				<button class="ma-pl-button" id="ma-pl-reset-products" type="button">Show all examples</button>
			</div>
		</section>
		<section class="ma-pl-capability-section" aria-labelledby="ma-pl-capability-title">
			<h2 id="ma-pl-capability-title">Explore our manufacturing capabilities</h2>
			<p>Review the wider product range, material choices and production support for your category.</p>
			<ul class="ma-pl-category-links">
				<?php foreach ( $categories as $slug => $label ) : ?>
					<li><a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"><?php echo esc_html( $label ); ?> <span aria-hidden="true">→</span></a></li>
				<?php endforeach; ?>
			</ul>
		</section>
	</div>
</main>
<?php get_footer(); ?>
