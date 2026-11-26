<?php
/**
 * Seasonal Sample Gallery section and in-place photo lightbox for /product-showcase/.
 *
 * Studio photography selections only (title + one-sentence summary),
 * without creating standalone SEO pages.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_seasonal_gallery_data' ) ) {
	return;
}

$items = myathletik_product_seasonal_gallery_data();
if ( ! $items ) {
	return;
}

$category_order = array(
	'sportswear-manufacturer'         => 'Sportswear',
	'outdoor-clothing-manufacturer'   => 'Outdoor Clothing',
	'merino-wool-manufacturer'        => 'Merino Wool',
	'underwear-manufacturer'          => 'Underwear',
	'silk-wear-manufacturer'          => 'Silk Wear',
	'sports-accessories-manufacturer' => 'Sports Accessories',
);
$category_counts = array_fill_keys( array_keys( $category_order ), 0 );
foreach ( $items as $item ) {
	$cat_slug = $item['category_slug'] ?? '';
	if ( $cat_slug && isset( $category_counts[ $cat_slug ] ) ) {
		$category_counts[ $cat_slug ]++;
	}
}
$total_items = count( $items );
$payload     = array();
foreach ( $items as $id => $item ) {
	$views = array();
	foreach ( $item['images'] as $view_key => $img ) {
		$views[] = array(
			'key'    => $view_key,
			'src'    => $img['src'],
			'thumb'  => $img['thumbnail'],
			'srcset' => $img['srcset'],
			'label'  => $img['label'],
			'alt'    => $img['alt'],
		);
	}
	$payload[ $id ] = array(
		'id'             => $id,
		'title'          => $item['title'],
		'category_label' => $item['category_label'],
		'season'         => $item['season'],
		'summary'        => $item['summary'],
		'images'         => $views,
		'inquiry_url'    => myathletik_product_seasonal_inquiry_url( $id ),
	);
}
?>
<section id="seasonal-sample-gallery" class="ma-pl-seasonal" aria-labelledby="ma-pl-seasonal-title" data-seasonal-gallery>
	<div class="ma-pl-tier-head ma-pl-tier-head--seasonal">
		<div>
			<p class="ma-pl-eyebrow">Recent studio samples</p>
			<h2 id="ma-pl-seasonal-title">Seasonal Sample Gallery</h2>
		</div>
		<p class="ma-pl-tier-head__note">Selected seasonal styles for OEM/ODM reference—fabrics, weights, and trims are developed to your project brief.</p>
	</div>

	<div class="ma-pl-seasonal-toolbar" id="ma-pl-seasonal-filters" hidden>
		<div class="ma-pl-filter-group">
			<span class="ma-pl-filter-label" id="ma-pl-seasonal-cat-label">Filter by category</span>
			<div class="ma-pl-filter-options" role="group" aria-labelledby="ma-pl-seasonal-cat-label">
				<button class="ma-pl-filter-chip" type="button" aria-pressed="true" aria-controls="ma-pl-seasonal-grid" data-seasonal-category="all" data-seasonal-label="All categories">
					<span>All</span>
					<span class="ma-pl-filter-chip__count"><?php echo esc_html( (string) $total_items ); ?></span>
				</button>
				<?php foreach ( $category_order as $cat_slug => $cat_label ) : ?>
					<?php if ( ! empty( $category_counts[ $cat_slug ] ) ) : ?>
						<button class="ma-pl-filter-chip" type="button" aria-pressed="false" aria-controls="ma-pl-seasonal-grid" data-seasonal-category="<?php echo esc_attr( $cat_slug ); ?>" data-seasonal-label="<?php echo esc_attr( $cat_label ); ?>">
							<span><?php echo esc_html( $cat_label ); ?></span>
							<span class="ma-pl-filter-chip__count"><?php echo esc_html( (string) $category_counts[ $cat_slug ] ); ?></span>
						</button>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<p id="ma-pl-seasonal-count" class="ma-pl-seasonal-status" role="status" aria-live="polite" aria-atomic="true">
			<?php echo esc_html( sprintf( _n( '%s seasonal sample', '%s seasonal samples', $total_items, 'myathletik-child' ), number_format_i18n( $total_items ) ) ); ?>
		</p>
	</div>

	<div class="ma-pl-seasonal-grid" id="ma-pl-seasonal-grid" tabindex="-1">
		<?php foreach ( $items as $id => $item ) : ?>
			<?php
			$front   = $item['images']['front'];
			$inquiry = myathletik_product_seasonal_inquiry_url( $id );
			?>
			<article class="ma-pl-seasonal-card" data-seasonal-card data-seasonal-category="<?php echo esc_attr( $item['category_slug'] ); ?>">
				<button class="ma-pl-seasonal-card__trigger" type="button" data-seasonal-open="<?php echo esc_attr( $id ); ?>" aria-label="<?php echo esc_attr( 'View photos of ' . $item['title'] ); ?>" aria-haspopup="dialog" aria-controls="ma-pl-seasonal-dialog">
					<span class="ma-pl-seasonal-card__media">
						<img src="<?php echo esc_url( $front['src'] ); ?>" srcset="<?php echo esc_attr( $front['srcset'] ); ?>" sizes="(max-width: 639px) 92vw, (max-width: 1023px) 46vw, 370px" width="800" height="1200" alt="<?php echo esc_attr( $front['alt'] ); ?>" loading="lazy" decoding="async">
						<span class="ma-pl-media-note"><?php echo esc_html( count( $item['images'] ) . ' photos' ); ?></span>
					</span>
					<span class="ma-pl-seasonal-card__body">
						<span class="ma-pl-eyebrow"><?php echo esc_html( $item['category_label'] . ' · ' . $item['season'] ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<span class="ma-pl-seasonal-card__summary"><?php echo esc_html( $item['summary'] ); ?></span>
					</span>
				</button>
				<noscript>
					<div class="ma-pl-seasonal-card__noscript">
						<a href="<?php echo esc_url( $front['src'] ); ?>">View photo</a> ·
						<a href="<?php echo esc_url( $inquiry ); ?>">Inquire about this style</a>
					</div>
				</noscript>
			</article>
		<?php endforeach; ?>
	</div>

	<nav id="ma-pl-seasonal-pagination" class="ma-pl-pagination" aria-label="Seasonal gallery pages" hidden>
		<button class="ma-pl-button ma-pl-button--secondary" id="ma-pl-seasonal-prev" type="button" aria-controls="ma-pl-seasonal-grid">
			<span aria-hidden="true">← </span>Previous
		</button>
		<div class="ma-pl-pagination__pages" id="ma-pl-seasonal-pages"></div>
		<button class="ma-pl-button ma-pl-button--secondary" id="ma-pl-seasonal-next" type="button" aria-controls="ma-pl-seasonal-grid">
			Next<span aria-hidden="true"> →</span>
		</button>
	</nav>

	<dialog id="ma-pl-seasonal-dialog" class="ma-pl-seasonal-dialog" aria-labelledby="ma-pl-seasonal-dialog-title">
		<div class="ma-pl-seasonal-dialog__toolbar">
			<p class="ma-pl-eyebrow" id="ma-pl-seasonal-dialog-kicker">Seasonal sample</p>
			<button class="ma-pl-button ma-pl-button--secondary" type="button" data-seasonal-close autofocus aria-label="Close sample viewer">Close <span aria-hidden="true">×</span></button>
		</div>
		<div class="ma-pl-seasonal-dialog__body">
			<div class="ma-pl-seasonal-dialog__stage">
				<div class="ma-pl-seasonal-dialog__frame">
					<button class="ma-pl-seasonal-dialog__nav ma-pl-seasonal-dialog__nav--prev" type="button" data-seasonal-slide-prev aria-label="Previous photo">
						<span aria-hidden="true">←</span>
					</button>
					<img id="ma-pl-seasonal-stage-img" src="" alt="" width="800" height="1200" decoding="async">
					<button class="ma-pl-seasonal-dialog__nav ma-pl-seasonal-dialog__nav--next" type="button" data-seasonal-slide-next aria-label="Next photo">
						<span aria-hidden="true">→</span>
					</button>
				</div>
				<p class="ma-pl-image-caption" id="ma-pl-seasonal-stage-caption" aria-live="polite"></p>
				<div class="ma-pl-seasonal-dialog__thumbs" id="ma-pl-seasonal-thumbs" role="group" aria-label="Choose a sample view"></div>
			</div>
			<div class="ma-pl-seasonal-dialog__info">
				<h3 id="ma-pl-seasonal-dialog-title"></h3>
				<p class="ma-pl-muted" id="ma-pl-seasonal-dialog-summary"></p>
				<p class="ma-pl-seasonal-dialog__note">Studio sample reference only. Fabric composition, GSM, colourways, and trims are confirmed for your OEM/ODM program brief (standard starting baseline: 500 pieces per style).</p>
				<a id="ma-pl-seasonal-inquiry" class="ma-pl-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Inquire about this style <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</dialog>

	<script type="application/json" id="ma-pl-seasonal-data"><?php echo wp_json_encode( $payload, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG ); ?></script>
</section>
