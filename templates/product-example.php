<?php
/**
 * Local-only real product detail with a shared photo/video stage.
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_preview_enabled' ) || ! myathletik_product_showcase_preview_enabled() ) {
	return;
}

$products    = myathletik_product_example_data();
$product_key = get_query_var( 'ma_product_example_key', 'ocean-depth' );
if ( ! isset( $products[ $product_key ] ) ) {
	return;
}
$product = $products[ $product_key ];
$images  = $product['media']['images'];
$front   = $images['front'];
$video   = $product['media']['video'];
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
	<?php get_template_part( 'template-parts/product-showcase/review-bar', null, array( 'current' => 'detail' ) ); ?>
	<nav class="ma-section-inner ma-pl-breadcrumb" aria-label="Breadcrumb">
		<a href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">Product Showcase</a>
		<span aria-hidden="true"> / </span><span aria-current="page"><?php echo esc_html( $product['name'] ); ?></span>
	</nav>
	<section class="ma-section-inner ma-pl-product" aria-labelledby="ma-pl-product-title">
		<div class="ma-pl-gallery" role="group" aria-label="Product photos and video">
			<div id="ma-pl-product-media" class="ma-pl-main-image">
				<img id="ma-pl-main-product-image" src="<?php echo esc_url( $front['src'] ); ?>" srcset="<?php echo esc_attr( $front['srcset'] ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" width="1280" height="720" alt="<?php echo esc_attr( $front['alt'] ); ?>" loading="eager" fetchpriority="high" decoding="async">
				<video id="ma-pl-product-video" controls playsinline preload="none" hidden tabindex="0" aria-label="Original video of the Merino wool-blend top and leggings" poster="<?php echo esc_url( $video['poster'] ); ?>">
					<source src="<?php echo esc_url( $video['src'] ); ?>" type="video/mp4">
					Your browser does not support this video.
				</video>
			</div>
			<p id="ma-pl-media-caption" class="ma-pl-image-caption" aria-live="polite">Front view · Frame from the original product video</p>
			<div class="ma-pl-thumbs" role="group" aria-label="Choose a photo or video">
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
		</div>
		<div class="ma-pl-product__text">
			<p class="ma-pl-eyebrow">Product example / <?php echo esc_html( $product['name'] ); ?></p>
			<h1 id="ma-pl-product-title"><?php echo esc_html( $product['title'] ); ?></h1>
			<p class="ma-pl-intro"><?php echo esc_html( $product['intro'] ); ?></p>
			<div class="ma-pl-state">Real product sample · OEM development reference</div>
			<dl class="ma-pl-quick">
				<?php foreach ( $facts as $label => $value ) : ?>
					<div class="ma-pl-quick__row"><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
			<div class="ma-pl-actions">
				<button class="ma-pl-button ma-pl-button--inactive" type="button" disabled>Request a project review</button>
				<button id="ma-pl-show-product-video" class="ma-pl-button ma-pl-button--secondary" type="button" aria-controls="ma-pl-product-media">View product video</button>
			</div>
			<p class="ma-pl-small-note">Inquiry button disabled in this local visual demo.</p>
		</div>
	</section>
	<section id="ma-pl-development-options" class="ma-pl-section" aria-labelledby="ma-pl-development-title">
		<div class="ma-section-inner">
			<div class="ma-pl-section-head">
				<div><p class="ma-pl-eyebrow">Development options</p><h2 id="ma-pl-development-title">Build around the buyer's brief</h2></div>
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
				<h3 id="ma-pl-set-options-title">Shared options for the set</h3>
				<dl class="ma-pl-set-options__list">
					<?php foreach ( $product['options']['shared'] as $label => $value ) : ?>
						<div class="ma-pl-set-options__item"><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
			</article>
			<div class="ma-pl-warning"><?php echo esc_html( $product['options']['note'] ); ?></div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
