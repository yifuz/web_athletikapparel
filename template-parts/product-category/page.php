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
?>

<main id="primary" class="site-main ma-product-category">
	<section class="ma-product-hero" aria-labelledby="ma-product-title">
		<div class="ma-product-hero__content">
			<p class="ma-section-kicker"><?php esc_html_e( 'OEM/ODM technical knitwear category', 'myathletik-child' ); ?></p>
			<h1 id="ma-product-title"><?php echo esc_html( $category['h1'] ); ?></h1>
			<p><?php echo esc_html( $category['intro'] ); ?></p>
			<div class="ma-product-hero__actions">
				<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?></a>
				<a class="ma-button ma-button--secondary" href="#product-examples"><?php esc_html_e( 'View Examples', 'myathletik-child' ); ?></a>
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
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<section class="ma-product-section ma-product-capabilities">
		<div class="ma-section-inner ma-product-feature">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Construction & fabric', 'myathletik-child' ); ?></p>
				<h2><?php esc_html_e( 'Built for technical B2B production requirements', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-product-copy-slot">
				<p><?php echo esc_html( $category['construction'] ); ?></p>
			</div>
		</div>
	</section>

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

	<section class="ma-product-section ma-product-specs">
		<div class="ma-section-inner">
			<div class="ma-product-specs__grid">
				<article>
					<span><?php esc_html_e( 'MOQ', 'myathletik-child' ); ?></span>
					<strong><?php esc_html_e( '500 pcs / style', 'myathletik-child' ); ?></strong>
					<p><?php esc_html_e( '300 pcs / style for multi-style orders.', 'myathletik-child' ); ?></p>
				</article>
				<article>
					<span><?php esc_html_e( 'Sampling', 'myathletik-child' ); ?></span>
					<strong><?php esc_html_e( '1-2 weeks', 'myathletik-child' ); ?></strong>
					<p><?php esc_html_e( 'Depending on style complexity and materials.', 'myathletik-child' ); ?></p>
				</article>
				<article>
					<span><?php esc_html_e( 'Service', 'myathletik-child' ); ?></span>
					<strong><?php esc_html_e( 'OEM/ODM / full-package', 'myathletik-child' ); ?></strong>
					<p><?php esc_html_e( 'To your designs, samples, or tech packs.', 'myathletik-child' ); ?></p>
				</article>
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

	<section class="ma-product-section ma-product-redirect-note" aria-label="<?php esc_attr_e( 'Launch redirect note', 'myathletik-child' ); ?>">
		<div class="ma-section-inner">
			<p>
				<?php
				printf(
					/* translators: %1$s: old URL, %2$s: current URL. */
					esc_html__( 'Launch note: 301 redirect %1$s to %2$s before this page goes live.', 'myathletik-child' ),
					esc_html( $category['old_url'] ),
					esc_html( '/' . $category_slug . '/' )
				);
				?>
			</p>
		</div>
	</section>

	<?php get_template_part( 'template-parts/home/inquiry-cta' ); ?>
</main>
