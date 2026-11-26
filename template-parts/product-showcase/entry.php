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
	'merino'     => array( 'slug' => 'merino-wool-manufacturer', 'heading' => 'Merino wool product examples' ),
	'outdoor'    => array( 'slug' => 'outdoor-clothing-manufacturer', 'heading' => 'Outdoor clothing product examples' ),
	'sportswear' => array( 'slug' => 'sportswear-manufacturer', 'heading' => 'Sportswear product examples' ),
);
if ( 'home' !== $context && ! isset( $category_contexts[ $context ] ) ) {
	return;
}
$product_key = isset( $args['product_key'] ) ? sanitize_key( $args['product_key'] ) : 'ocean-depth';
$products    = myathletik_product_showcase_products();
$category_products = isset( $category_contexts[ $context ] ) ? myathletik_product_showcase_category_preview( $category_contexts[ $context ]['slug'] ) : array();
$home_oem_items      = array();
$home_seasonal_items = array();
$all_oem_count       = count( $products );
$all_seasonal_count  = 0;

if ( 'home' === $context ) {
	$home_oem_items      = myathletik_product_showcase_home_oem_preview( 3 );
	$home_seasonal_items = myathletik_product_showcase_home_seasonal_preview( 4 );
	$all_seasonal_count  = function_exists( 'myathletik_product_seasonal_gallery_data' ) ? count( myathletik_product_seasonal_gallery_data() ) : 0;
	if ( ! $home_oem_items && ! $home_seasonal_items ) {
		return;
	}
} elseif ( ! $category_products ) {
	return;
}

$showcase_url   = myathletik_product_showcase_url();
$seasonal_url   = $showcase_url ? $showcase_url . '#seasonal-sample-gallery' : '';
$entry_modifier = 'home' === $context ? ' ma-pl-entry--home' : ' ma-pl-entry--' . sanitize_html_class( $context );
?>
<section class="ma-pl ma-pl-section ma-pl-surface ma-pl-entry<?php echo esc_attr( $entry_modifier ); ?>" aria-labelledby="ma-pl-<?php echo esc_attr( $context ); ?>-title">
	<?php if ( 'home' === $context ) : ?>
		<div class="ma-section-inner">
			<div class="ma-pl-home-head">
				<div>
					<p class="ma-pl-eyebrow"><?php esc_html_e( 'Product Showcase', 'myathletik-child' ); ?></p>
					<h2 id="ma-pl-home-title"><?php esc_html_e( 'See the product behind the brief', 'myathletik-child' ); ?></h2>
					<p class="ma-pl-muted"><?php esc_html_e( 'Explore real garment examples with material details and development options to inform your next product brief.', 'myathletik-child' ); ?></p>
				</div>
				<?php if ( $showcase_url ) : ?>
					<a class="ma-pl-text-link" href="<?php echo esc_url( $showcase_url ); ?>"><?php esc_html_e( 'View all product examples', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
			</div>

			<?php if ( $home_oem_items ) : ?>
				<div class="ma-pl-home-tier">
					<div class="ma-pl-home-tier__head">
						<div>
							<h3 class="ma-pl-home-tier__title"><?php esc_html_e( 'OEM Product Examples', 'myathletik-child' ); ?></h3>
							<p class="ma-pl-home-tier__note"><?php esc_html_e( 'Fabric specifications, construction details, and OEM development options.', 'myathletik-child' ); ?></p>
						</div>
						<?php if ( $showcase_url ) : ?>
							<a class="ma-pl-home-tier__more" href="<?php echo esc_url( $showcase_url ); ?>">
								<?php
								echo esc_html(
									sprintf(
										/* translators: %d: total number of published OEM product examples. */
										__( 'All %d OEM examples', 'myathletik-child' ),
										$all_oem_count
									)
								);
								?>
								<span aria-hidden="true">→</span>
							</a>
						<?php endif; ?>
					</div>

					<div class="ma-pl-home-oem-grid">
						<?php foreach ( $home_oem_items as $oem_key => $product ) : ?>
							<?php
							$url         = myathletik_product_example_url( $oem_key );
							$image       = $product['media']['images']['front'];
							$img_width   = ! empty( $image['width'] ) ? absint( $image['width'] ) : 1280;
							$img_height  = ! empty( $image['height'] ) ? absint( $image['height'] ) : 720;
							$is_portrait = 'portrait' === ( $product['media']['aspect'] ?? '' ) || $img_height > $img_width;
							$card_facts  = array();
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
							<article class="ma-pl-home-oem-card">
								<a class="ma-pl-home-oem-card__media<?php echo $is_portrait ? ' ma-pl-home-oem-card__media--portrait' : ''; ?>" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( 'View ' . $product['name'] . ' product example' ); ?>">
									<img src="<?php echo esc_url( $image['src'] ); ?>" srcset="<?php echo esc_attr( $image['srcset'] ); ?>" sizes="(max-width: 767px) 82vw, (max-width: 1023px) 46vw, 370px" width="<?php echo esc_attr( $img_width ); ?>" height="<?php echo esc_attr( $img_height ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy" decoding="async">
								</a>
								<div class="ma-pl-home-oem-card__body">
									<p class="ma-pl-eyebrow"><?php echo esc_html( $product['material_label'] ); ?></p>
									<h4><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $product['title'] ); ?></a></h4>
									<dl class="<?php echo esc_attr( $facts_class ); ?>">
										<?php foreach ( $card_facts as $fact_label => $fact_value ) : ?>
											<div class="ma-pl-fact"><dt><?php echo esc_html( $fact_label ); ?></dt><dd><?php echo esc_html( $fact_value ); ?></dd></div>
										<?php endforeach; ?>
									</dl>
									<div class="ma-pl-product-card__footer">
										<p class="ma-pl-composition"><?php echo esc_html( $product['composition'] ); ?></p>
										<a class="ma-pl-product-card__link" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( 'View details for ' . $product['name'] ); ?>"><?php esc_html_e( 'Details', 'myathletik-child' ); ?> <span class="ma-pl-product-card__arrow" aria-hidden="true">→</span></a>
									</div>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $home_seasonal_items ) : ?>
				<div class="ma-pl-home-tier ma-pl-home-tier--seasonal">
					<div class="ma-pl-home-tier__head">
						<div>
							<h3 class="ma-pl-home-tier__title"><?php esc_html_e( 'Seasonal Sample Gallery', 'myathletik-child' ); ?></h3>
							<p class="ma-pl-home-tier__note"><?php esc_html_e( 'Recent studio samples for style, colourway, and silhouette reference.', 'myathletik-child' ); ?></p>
						</div>
						<?php if ( $seasonal_url ) : ?>
							<a class="ma-pl-home-tier__more" href="<?php echo esc_url( $seasonal_url ); ?>">
								<?php
								echo esc_html(
									sprintf(
										/* translators: %d: total number of seasonal gallery samples. */
										__( 'All %d seasonal samples', 'myathletik-child' ),
										$all_seasonal_count
									)
								);
								?>
								<span aria-hidden="true">→</span>
							</a>
						<?php endif; ?>
					</div>

					<div class="ma-pl-home-seasonal-grid">
						<?php foreach ( $home_seasonal_items as $item ) : ?>
							<?php $front = $item['images']['front']; ?>
							<article class="ma-pl-home-seasonal-card">
								<a class="ma-pl-home-seasonal-card__link" href="<?php echo esc_url( $seasonal_url ); ?>">
									<span class="ma-pl-home-seasonal-card__media">
										<img src="<?php echo esc_url( $front['src'] ); ?>" srcset="<?php echo esc_attr( $front['srcset'] ); ?>" sizes="(max-width: 767px) 68vw, (max-width: 1023px) 46vw, 270px" width="800" height="1200" alt="<?php echo esc_attr( $front['alt'] ); ?>" loading="lazy" decoding="async">
										<span class="ma-pl-media-note"><?php echo esc_html( count( $item['images'] ) . ' photos' ); ?></span>
									</span>
									<span class="ma-pl-home-seasonal-card__body">
										<span class="ma-pl-eyebrow"><?php echo esc_html( $item['category_label'] . ' · ' . $item['season'] ); ?></span>
										<h4><?php echo esc_html( $item['title'] ); ?></h4>
									</span>
								</a>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
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
			<div class="ma-pl-related-products<?php echo 1 === count( $category_products ) ? ' ma-pl-related-products--single' : ''; ?>" role="region" aria-labelledby="ma-pl-<?php echo esc_attr( $context ); ?>-title"<?php if ( count( $category_products ) > 1 ) : ?> tabindex="0" aria-describedby="ma-pl-<?php echo esc_attr( $context ); ?>-scroll-help"<?php endif; ?>>
				<?php foreach ( array_keys( $category_products ) as $category_key ) : ?>
					<?php get_template_part( 'template-parts/product-showcase/card', null, array( 'context' => $context, 'product_key' => $category_key ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
