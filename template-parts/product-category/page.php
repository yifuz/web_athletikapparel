<?php
/**
 * Shared product category page template part.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$category_slug = isset( $args['category_slug'] ) ? sanitize_key( $args['category_slug'] ) : '';
$category      = myathletik_get_product_category_data( $category_slug );

if ( ! $category ) {
	return;
}

$image_base = get_stylesheet_directory_uri() . '/assets/images/';
$public_moq = number_format_i18n( myathletik_public_moq_pieces() );
$hero_kicker = ! empty( $category['hero_kicker'] )
	? $category['hero_kicker']
	: __( 'OEM/ODM technical knitwear category', 'myathletik-child' );
$capability_kicker = ! empty( $category['capability_kicker'] )
	? $category['capability_kicker']
	: __( 'Construction & fabric', 'myathletik-child' );
$capability_heading = ! empty( $category['capability_heading'] )
	? $category['capability_heading']
	: __( 'Built for technical B2B production requirements', 'myathletik-child' );
$specs = array(
	array(
		'label'       => __( 'MOQ', 'myathletik-child' ),
		/* translators: %s: public MOQ in pieces per style. */
		'value'       => sprintf( __( '%s pcs', 'myathletik-child' ), $public_moq ),
		'description' => __( 'Per style.', 'myathletik-child' ),
	),
	array(
		'label'       => __( 'Sampling', 'myathletik-child' ),
		'value'       => __( '1-2 weeks', 'myathletik-child' ),
		'description' => __( 'Depending on style complexity and materials.', 'myathletik-child' ),
	),
	array(
		'label'       => __( 'Service', 'myathletik-child' ),
		'value'       => __( 'OEM/ODM / full-package', 'myathletik-child' ),
		'description' => __( 'To your designs, samples, or tech packs.', 'myathletik-child' ),
	),
);

if ( ! empty( $category['specs'] ) && is_array( $category['specs'] ) ) {
	$specs = $category['specs'];
}
?>

<main id="primary" class="site-main ma-product-category">
	<section class="ma-product-hero<?php echo ! empty( $category['hero_video'] ) ? ' ma-product-hero--video' : ''; ?>" aria-labelledby="ma-product-title">
		<?php if ( ! empty( $category['hero_video'] ) ) : ?>
			<?php $video_pos = ! empty( $category['hero_video_position'] ) ? $category['hero_video_position'] : 'center'; ?>
			<video class="ma-product-hero__video" autoplay muted loop playsinline preload="auto" aria-hidden="true" style="object-position: <?php echo esc_attr( $video_pos ); ?>;">
				<source src="<?php echo esc_url( $image_base . $category['hero_video'] ); ?>" type="video/mp4">
			</video>
			<div class="ma-product-hero__video-overlay" aria-hidden="true"></div>
		<?php endif; ?>
		<div class="ma-product-hero__content">
			<p class="ma-section-kicker"><?php echo esc_html( $hero_kicker ); ?></p>
			<h1 id="ma-product-title"><?php echo esc_html( $category['h1'] ); ?></h1>
			<p><?php echo esc_html( $category['intro'] ); ?></p>
			<div class="ma-product-hero__actions">
				<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?></a>
				<a class="ma-button ma-button--secondary" href="<?php echo ! empty( $category['subcategories'] ) ? '#ma-product-subcats-title' : '#product-examples'; ?>"><?php esc_html_e( 'View Examples', 'myathletik-child' ); ?></a>
			</div>
		</div>
	</section>

	<section class="ma-product-section ma-product-intro">
		<div class="ma-section-inner ma-product-intro__grid">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Category overview', 'myathletik-child' ); ?></p>
				<h2><?php esc_html_e( 'What we make', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-product-copy-slot">
				<ul class="ma-product-list">
					<?php foreach ( $category['what_we_make'] as $item ) : ?>
						<li>
							<?php
							// When subcategories exist, turn each list item into an
							// anchor link that jumps to the matching detail block below.
							$has_subs = ! empty( $category['subcategories'] );
							if ( $has_subs ) :
								$slug = sanitize_title( $item );
								?>
								<a href="#subcat-<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $item ); ?></a>
							<?php else : ?>
								<?php echo esc_html( $item ); ?>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $category['subcategories'] ) ) : ?>
	<section class="ma-product-section ma-product-subcategories" aria-labelledby="ma-product-subcats-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Product range', 'myathletik-child' ); ?></p>
				<h2 id="ma-product-subcats-title"><?php esc_html_e( 'Explore what we manufacture', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-subcategories">
				<?php foreach ( $category['subcategories'] as $index => $sub ) : ?>
					<?php
					$is_even       = ( $index % 2 === 1 ); // alternate image side
					$sub_slug      = sanitize_title( $sub['title'] );
					$image_alt     = ! empty( $sub['image_alt'] ) ? $sub['image_alt'] : $sub['title'];
					$image_width   = ! empty( $sub['image_width'] ) ? absint( $sub['image_width'] ) : 0;
					$image_height  = ! empty( $sub['image_height'] ) ? absint( $sub['image_height'] ) : 0;
					$image_sizes   = '(max-width: 47.99rem) calc(100vw - 3rem), 35rem';
					$webp_srcset   = array();

					if ( ! empty( $sub['image_webp'] ) && is_array( $sub['image_webp'] ) ) {
						foreach ( $sub['image_webp'] as $variant_width => $variant_path ) {
							$variant_width = absint( $variant_width );
							if ( $variant_width && $variant_path ) {
								$webp_srcset[] = esc_url( $image_base . ltrim( $variant_path, '/' ) ) . ' ' . $variant_width . 'w';
							}
						}
					}
					?>
					<article class="ma-subcat <?php echo $is_even ? 'ma-subcat--reverse' : ''; ?>" id="subcat-<?php echo esc_attr( $sub_slug ); ?>">
						<div class="ma-subcat__media">
							<?php if ( $webp_srcset ) : ?>
								<picture>
									<source type="image/webp" srcset="<?php echo esc_attr( implode( ', ', $webp_srcset ) ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>">
							<?php endif; ?>
							<img
								src="<?php echo esc_url( $image_base . $sub['image'] ); ?>"
								<?php if ( $image_width && $image_height ) : ?>
									width="<?php echo esc_attr( $image_width ); ?>"
									height="<?php echo esc_attr( $image_height ); ?>"
								<?php endif; ?>
								alt="<?php echo esc_attr( $image_alt ); ?>"
								loading="lazy"
								decoding="async"
							>
							<?php if ( $webp_srcset ) : ?>
								</picture>
							<?php endif; ?>
						</div>
						<div class="ma-subcat__body">
							<span class="ma-subcat__index"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<h3><?php echo esc_html( $sub['title'] ); ?></h3>
							<p><?php echo esc_html( $sub['description'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="ma-product-section ma-product-capabilities">
		<div class="ma-section-inner ma-product-feature">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php echo esc_html( $capability_kicker ); ?></p>
				<h2><?php echo esc_html( $capability_heading ); ?></h2>
			</div>
			<div class="ma-product-copy-slot">
				<p><?php echo esc_html( $category['construction'] ); ?></p>
			</div>
		</div>
	</section>

	<?php if ( empty( $category['subcategories'] ) ) : ?>
	<section id="product-examples" class="ma-product-section ma-product-examples">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Product examples', 'myathletik-child' ); ?></p>
				<h2><?php esc_html_e( 'Sample image groups for this category', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-product-examples__grid">
				<?php if ( ! empty( $category['gallery'] ) ) : ?>
					<?php foreach ( $category['gallery'] as $image ) : ?>
						<figure class="ma-product-example-card">
							<img src="<?php echo esc_url( $image_base . $image['image'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy">
						</figure>
					<?php endforeach; ?>
				<?php else : ?>
					<?php for ( $i = 1; $i <= 6; $i++ ) : ?>
						<figure class="ma-product-example-card ma-product-example-card--placeholder">
							<div class="ma-product-image-placeholder" aria-label="<?php echo esc_attr( $category['image_note'] ); ?>">
								<span><?php esc_html_e( '[IMAGE]', 'myathletik-child' ); ?></span>
							</div>
						</figure>
					<?php endfor; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="ma-product-section ma-product-specs">
		<div class="ma-section-inner">
			<div class="ma-product-specs__grid">
				<?php foreach ( $specs as $spec ) : ?>
					<article>
						<span><?php echo esc_html( $spec['label'] ); ?></span>
						<strong><?php echo esc_html( $spec['value'] ); ?></strong>
						<p><?php echo esc_html( $spec['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-product-section ma-product-related">
		<div class="ma-section-inner ma-product-related__layout">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Related', 'myathletik-child' ); ?></p>
				<h2><?php esc_html_e( 'Build the rest of your program', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-product-related__links">
				<?php foreach ( $category['related'] as $related ) : ?>
					<a href="<?php echo esc_url( home_url( $related['url'] ) ); ?>"><?php echo esc_html( $related['label'] ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/home/inquiry-cta' ); ?>
</main>
