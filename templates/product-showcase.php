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

$products        = myathletik_product_showcase_products();
$total_products  = count( $products );
$category_order  = array(
	'sportswear-manufacturer'       => 'Sportswear',
	'merino-wool-manufacturer'      => 'Merino Wool',
	'outdoor-clothing-manufacturer' => 'Outdoor Clothing',
);
$category_counts = array_fill_keys( array_keys( $category_order ), 0 );
$material_labels = array(
	'merino'    => 'Merino wool',
	'polyester' => 'Polyester',
	'nylon'     => 'Nylon & blends',
);
$materials       = array();
$material_counts = array();
$categories      = array(
	'sportswear-manufacturer'         => 'Sportswear',
	'underwear-manufacturer'          => 'Underwear',
	'outdoor-clothing-manufacturer'   => 'Outdoor Clothing',
	'merino-wool-manufacturer'        => 'Merino Wool',
	'silk-wear-manufacturer'          => 'Silk Wear',
	'knitted-fabrics-manufacturer'    => 'Knitted Fabrics',
	'sports-accessories-manufacturer' => 'Sports Accessories',
);
foreach ( $products as $product ) {
	$cat_slug = $product['category_slug'] ?? '';
	if ( $cat_slug && isset( $category_counts[ $cat_slug ] ) ) {
		$category_counts[ $cat_slug ]++;
	}
	$mat_key = $product['material'] ?? '';
	if ( $mat_key ) {
		$materials[ $mat_key ]       = $material_labels[ $mat_key ] ?? $product['material_label'];
		$material_counts[ $mat_key ] = ( $material_counts[ $mat_key ] ?? 0 ) + 1;
	}
}

get_header();
?>
<main id="primary" class="site-main ma-pl ma-pl-library" data-showcase-library>
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
		<section aria-labelledby="ma-pl-featured-title">
			<div class="ma-pl-tier-head">
				<div>
					<p class="ma-pl-eyebrow">Featured Technical Samples</p>
					<h2 id="ma-pl-featured-title">Detailed product examples with confirmed fabric references</h2>
				</div>
				<p class="ma-pl-tier-head__note">Complete garment specifications, fiber compositions, GSM weights, and OEM development options.</p>
			</div>
			<div class="ma-pl-filter-bar" id="ma-pl-product-filters" role="search" aria-label="Filter product examples" hidden>
				<div class="ma-pl-filter-groups">
					<div class="ma-pl-filter-group">
						<span class="ma-pl-filter-label" id="ma-pl-category-label">Category</span>
						<div class="ma-pl-filter-options" role="group" aria-labelledby="ma-pl-category-label">
							<button class="ma-pl-filter-chip" type="button" aria-pressed="true" aria-controls="ma-pl-product-results" data-category="all" data-category-label="All categories">
								<span>All</span>
								<span class="ma-pl-filter-chip__count"><?php echo esc_html( (string) $total_products ); ?></span>
							</button>
							<?php foreach ( $category_order as $cat_slug => $cat_label ) : ?>
								<?php if ( ! empty( $category_counts[ $cat_slug ] ) ) : ?>
									<button class="ma-pl-filter-chip" type="button" aria-pressed="false" aria-controls="ma-pl-product-results" data-category="<?php echo esc_attr( $cat_slug ); ?>" data-category-label="<?php echo esc_attr( $cat_label ); ?>">
										<span><?php echo esc_html( $cat_label ); ?></span>
										<span class="ma-pl-filter-chip__count"><?php echo esc_html( (string) $category_counts[ $cat_slug ] ); ?></span>
									</button>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="ma-pl-filter-group">
						<span class="ma-pl-filter-label" id="ma-pl-material-label">Material</span>
						<div class="ma-pl-filter-options" role="group" aria-labelledby="ma-pl-material-label">
							<button class="ma-pl-filter-chip" type="button" aria-pressed="true" aria-controls="ma-pl-product-results" data-material="all" data-material-label="All materials">
								<span>All materials</span>
								<span class="ma-pl-filter-chip__count"><?php echo esc_html( (string) $total_products ); ?></span>
							</button>
							<?php foreach ( $materials as $material => $label ) : ?>
								<button class="ma-pl-filter-chip" type="button" aria-pressed="false" aria-controls="ma-pl-product-results" data-material="<?php echo esc_attr( $material ); ?>" data-material-label="<?php echo esc_attr( $label ); ?>">
									<span><?php echo esc_html( $label ); ?></span>
									<span class="ma-pl-filter-chip__count"><?php echo esc_html( (string) ( $material_counts[ $material ] ?? 0 ) ); ?></span>
								</button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="ma-pl-search-field">
					<label for="ma-pl-product-search">Find a product reference</label>
					<input id="ma-pl-product-search" type="search" placeholder="Product, material or fabric reference" autocomplete="off" aria-controls="ma-pl-product-results">
				</div>
			</div>
			<div class="ma-pl-result-summary">
				<p id="ma-pl-result-count" role="status" aria-live="polite" aria-atomic="true"><?php echo esc_html( sprintf( _n( '%s product example', '%s product examples', $total_products, 'myathletik-child' ), number_format_i18n( $total_products ) ) ); ?></p>
				<span>Actual sample · Material details · Development options</span>
			</div>
			<div class="ma-pl-product-grid" id="ma-pl-product-results" tabindex="-1">
				<?php foreach ( array_keys( $products ) as $product_key ) : ?>
					<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'product_key' => $product_key, 'context' => 'library' ) ); ?>
				<?php endforeach; ?>
			</div>
			<div id="ma-pl-empty-results" class="ma-pl-empty-results" hidden>
				<h2>No matching example</h2>
				<p>Try another category, material, product name or fabric reference.</p>
				<button class="ma-pl-button" id="ma-pl-reset-products" type="button">Show all examples</button>
			</div>
			<nav id="ma-pl-pagination" class="ma-pl-pagination" aria-label="Product showcase pages" hidden>
				<button class="ma-pl-button ma-pl-button--secondary" id="ma-pl-page-prev" type="button" aria-controls="ma-pl-product-results">
					<span aria-hidden="true">← </span>Previous
				</button>
				<div class="ma-pl-pagination__pages" id="ma-pl-page-numbers"></div>
				<button class="ma-pl-button ma-pl-button--secondary" id="ma-pl-page-next" type="button" aria-controls="ma-pl-product-results">
					Next<span aria-hidden="true"> →</span>
				</button>
			</nav>
		</section>
		<?php get_template_part( 'template-parts/product-showcase/seasonal-gallery' ); ?>
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
