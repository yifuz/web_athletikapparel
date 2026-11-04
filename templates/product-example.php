<?php
/**
 * Real product detail with a shared photo/video stage and project inquiry links.
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_enabled' ) || ! myathletik_product_showcase_enabled() ) {
	return;
}

$products    = myathletik_product_showcase_products();
$product_key = sanitize_key( get_query_var( 'ma_product_example_key', '' ) );
if ( ! isset( $products[ $product_key ] ) ) {
	return;
}
$product = $products[ $product_key ];
$images  = $product['media']['images'];
$front   = $images['front'];
$video   = $product['media']['video'];
$inquiry_url = myathletik_product_example_inquiry_url( $product_key );
$category_slug  = ! empty( $product['category_slug'] ) ? sanitize_title( $product['category_slug'] ) : '';
$category_label = ! empty( $product['category_label'] ) ? $product['category_label'] : '';
// A 624px-tall cover frame needs approximately 1110 source pixels at a 16:9 ratio.
$sizes   = '1110px';
$facts   = array(
	'Sample material' => $product['sample_material'],
	'Composition'     => $product['composition'],
	'Fabric weight'   => $product['gsm'],
	'Fabric reference'=> $product['fabric_ref'],
	'Suggested use'   => $product['use'],
);

get_header();
?>
<main id="primary" class="site-main ma-pl ma-pl-detail">
	<nav class="ma-section-inner ma-pl-breadcrumb" aria-label="Breadcrumb">
		<a href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">Product Showcase</a>
		<span aria-hidden="true"> / </span><span aria-current="page"><?php echo esc_html( $product['name'] ); ?></span>
	</nav>
	<section class="ma-section-inner ma-pl-product" aria-labelledby="ma-pl-product-title">
		<div class="ma-pl-gallery" role="group" aria-label="Product photos and video">
			<div id="ma-pl-product-media" class="ma-pl-main-image">
				<img id="ma-pl-main-product-image" src="<?php echo esc_url( $front['src'] ); ?>" srcset="<?php echo esc_attr( $front['srcset'] ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" width="1280" height="720" alt="<?php echo esc_attr( $front['alt'] ); ?>" loading="eager" fetchpriority="high" decoding="async">
				<video id="ma-pl-product-video" controls playsinline preload="none" hidden tabindex="0" aria-label="<?php echo esc_attr( sprintf( __( 'Product video: %s', 'myathletik-child' ), $product['title'] ) ); ?>" poster="<?php echo esc_url( $video['poster'] ); ?>">
					<source src="<?php echo esc_url( $video['src'] ); ?>" type="video/mp4">
					<a href="<?php echo esc_url( $video['src'] ); ?>">Watch the product video</a>
				</video>
			</div>
			<p id="ma-pl-media-caption" class="ma-pl-image-caption" aria-live="polite"><?php echo esc_html( $front['caption'] ); ?> · Frame from the product video</p>
			<div class="ma-pl-thumbs" role="group" aria-label="Choose a photo or video" hidden>
				<?php foreach ( $images as $image_key => $image ) : ?>
					<button class="ma-pl-thumb" type="button" aria-label="<?php echo esc_attr( $image['control'] ); ?>" aria-pressed="<?php echo 'front' === $image_key ? 'true' : 'false'; ?>" aria-controls="ma-pl-product-media" data-media="image" data-caption="<?php echo esc_attr( $image['caption'] ); ?>" data-alt="<?php echo esc_attr( $image['alt'] ); ?>" data-src="<?php echo esc_url( $image['src'] ); ?>" data-srcset="<?php echo esc_attr( $image['srcset'] ); ?>" data-sizes="<?php echo esc_attr( $sizes ); ?>">
						<img src="<?php echo esc_url( $image['thumbnail'] ); ?>" width="640" height="360" alt="" loading="lazy" decoding="async">
					</button>
				<?php endforeach; ?>
				<button class="ma-pl-thumb ma-pl-thumb--video" type="button" aria-label="View product video" aria-pressed="false" aria-controls="ma-pl-product-media" data-media="video">
					<img src="<?php echo esc_url( $front['thumbnail'] ); ?>" width="640" height="360" alt="" loading="lazy" decoding="async">
					<span class="ma-pl-thumb__video-mark" aria-hidden="true"><span>▶ Video</span></span>
				</button>
			</div>
			<noscript>
				<div class="ma-pl-media-fallback">
					<a class="ma-pl-text-link" href="<?php echo esc_url( $video['src'] ); ?>">Watch the product video <span aria-hidden="true">→</span></a>
					<ul>
						<?php foreach ( $images as $image ) : ?>
							<li><a href="<?php echo esc_url( $image['src'] ); ?>"><?php echo esc_html( $image['caption'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</noscript>
		</div>
		<div class="ma-pl-product__text">
			<p class="ma-pl-eyebrow">Product example / <?php echo esc_html( $product['name'] ); ?></p>
			<h1 id="ma-pl-product-title"><?php echo esc_html( $product['title'] ); ?></h1>
			<p class="ma-pl-intro"><?php echo esc_html( $product['intro'] ); ?></p>
			<?php if ( ! empty( $product['characteristics'] ) ) : ?>
				<p class="ma-pl-characteristics"><?php echo esc_html( $product['characteristics'] ); ?></p>
			<?php endif; ?>
			<div class="ma-pl-state">Real product sample · OEM development reference</div>
			<dl class="ma-pl-quick">
				<?php foreach ( $facts as $label => $value ) : ?>
					<div class="ma-pl-quick__row"><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
			<div class="ma-pl-actions">
				<a class="ma-pl-button" href="<?php echo esc_url( $inquiry_url ); ?>">Request a project review</a>
				<button id="ma-pl-show-product-video" class="ma-pl-button ma-pl-button--secondary" type="button" aria-controls="ma-pl-product-media" hidden>View product video</button>
			</div>
			<?php if ( $category_slug && $category_label ) : ?>
				<a class="ma-pl-text-link ma-pl-related-category" href="<?php echo esc_url( home_url( '/' . $category_slug . '/' ) ); ?>"><?php echo esc_html( sprintf( __( 'Explore %s manufacturing', 'myathletik-child' ), $category_label ) ); ?> <span aria-hidden="true">→</span></a>
			<?php endif; ?>
		</div>
	</section>
	<section id="ma-pl-development-options" class="ma-pl-section" aria-labelledby="ma-pl-development-title">
		<div class="ma-section-inner">
			<div class="ma-pl-section-head">
				<div><p class="ma-pl-eyebrow">Development options</p><h2 id="ma-pl-development-title">Build around your product brief</h2></div>
				<p><?php echo esc_html( $product['options']['intro'] ); ?></p>
			</div>
			<div class="ma-pl-options">
				<?php foreach ( $product['options']['groups'] as $group ) : ?>
					<article class="ma-pl-option-card">
						<h3><?php echo esc_html( $group['title'] ); ?></h3>
						<p><?php echo esc_html( $group['intro'] ); ?></p>
						<ul>
							<?php foreach ( $group['items'] as $label => $value ) : ?>
								<li><span><?php echo esc_html( $label ); ?></span><span><?php echo esc_html( $value ); ?></span></li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
			<article class="ma-pl-set-options" aria-labelledby="ma-pl-set-options-title">
				<h3 id="ma-pl-set-options-title"><?php echo esc_html( $product['options']['shared_title'] ?? 'Additional development options' ); ?></h3>
				<dl class="ma-pl-set-options__list">
					<?php foreach ( $product['options']['shared'] as $label => $value ) : ?>
						<div class="ma-pl-set-options__item"><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
			</article>
			<p class="ma-pl-option-note"><?php echo esc_html( $product['options']['note'] ); ?></p>
		</div>
	</section>
	<section class="ma-pl-section ma-pl-surface" aria-labelledby="ma-pl-project-title">
		<div class="ma-section-inner ma-pl-next-step">
			<div><p class="ma-pl-eyebrow">Your next program</p><h2 id="ma-pl-project-title"><?php echo esc_html( $category_label ? sprintf( __( 'Discuss your %s project', 'myathletik-child' ), $category_label ) : __( 'Discuss your next apparel project', 'myathletik-child' ) ); ?></h2></div>
			<a class="ma-pl-button" href="<?php echo esc_url( $inquiry_url ); ?>">Request a project review <span aria-hidden="true">→</span></a>
		</div>
	</section>
</main>
<?php get_footer(); ?>
