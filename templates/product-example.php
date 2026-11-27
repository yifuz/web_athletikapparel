<?php
/**
 * Real product detail with a photo gallery, video viewer and project inquiry links.
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
$video   = $product['media']['video'] ?? array();
// Existing records keep their single-video controls; multiple clips share one player.
$videos  = ! empty( $product['media']['videos'] ) ? $product['media']['videos'] : ( ! empty( $video['src'] ) ? array( 'overview' => $video ) : array() );
$has_video       = ! empty( $videos );
$multiple_videos = count( $videos ) > 1;
$video   = $has_video ? ( $videos['overview'] ?? reset( $videos ) ) : array();
$inquiry_url = myathletik_product_example_inquiry_url( $product_key );
$category_slug  = ! empty( $product['category_slug'] ) ? sanitize_title( $product['category_slug'] ) : '';
$category_label = ! empty( $product['category_label'] ) ? $product['category_label'] : '';
$front_width    = ! empty( $front['width'] ) ? absint( $front['width'] ) : 1280;
$front_height   = ! empty( $front['height'] ) ? absint( $front['height'] ) : 720;
$is_portrait    = 'portrait' === ( $product['media']['aspect'] ?? '' ) || $front_height > $front_width;
$caption_suffix = $product['media']['caption_suffix'] ?? 'Frame from the product video';
// A 624px-tall cover frame needs approximately 1110 source pixels at a 16:9 ratio.
$sizes   = $is_portrait ? '(max-width: 850px) 100vw, 600px' : '1110px';
$facts   = ! empty( $product['facts'] ) ? $product['facts'] : array(
	'Sample material' => $product['sample_material'],
	'Composition'     => $product['composition'],
	'Fabric weight'   => $product['gsm'],
	'Fabric reference'=> $product['fabric_ref'],
	'Suggested use'   => $product['use'],
);
$facts   = array_filter( $facts, static function ( $value ) {
	return '' !== (string) $value;
} );
$photo_count  = count( $images );
$thumbs_class = 'ma-pl-thumbs';
if ( $multiple_videos || ! $has_video ) {
	$thumbs_class .= ' ma-pl-thumbs--photos';
}
if ( $is_portrait ) {
	$thumbs_class .= ' ma-pl-thumbs--portrait';
}
if ( ( $multiple_videos || ! $has_video ) && 3 === $photo_count ) {
	$thumbs_class .= ' ma-pl-thumbs--count-3';
}
$video_count = count( $videos );
$video_tiles_class = 'ma-pl-video-tiles' . ( in_array( $video_count, array( 2, 3 ), true ) ? ' ma-pl-video-tiles--count-' . $video_count : '' );

get_header();
?>
<main id="primary" class="site-main ma-pl ma-pl-detail">
	<nav class="ma-section-inner ma-pl-breadcrumb" aria-label="Breadcrumb">
		<a href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>">Product Showcase</a>
		<span aria-hidden="true"> / </span><span aria-current="page"><?php echo esc_html( $product['name'] ); ?></span>
	</nav>
	<section class="ma-section-inner ma-pl-product" aria-labelledby="ma-pl-product-title">
		<header class="ma-pl-product__heading">
			<p class="ma-pl-eyebrow">Product example / <?php echo esc_html( $product['name'] ); ?></p>
			<h1 id="ma-pl-product-title"><?php echo esc_html( $product['title'] ); ?></h1>
			<p class="ma-pl-intro"><?php echo esc_html( $product['intro'] ); ?></p>
		</header>
		<div class="ma-pl-gallery" role="group" aria-label="<?php echo esc_attr( $has_video ? 'Product photos and video' : 'Product photos' ); ?>">
			<div id="ma-pl-product-media" class="ma-pl-main-image<?php echo $is_portrait ? ' ma-pl-main-image--portrait' : ''; ?>">
				<img id="ma-pl-main-product-image" src="<?php echo esc_url( $front['src'] ); ?>" srcset="<?php echo esc_attr( $front['srcset'] ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" width="<?php echo esc_attr( $front_width ); ?>" height="<?php echo esc_attr( $front_height ); ?>" alt="<?php echo esc_attr( $front['alt'] ); ?>" loading="eager" fetchpriority="high" decoding="async">
			</div>
			<p id="ma-pl-media-caption" class="ma-pl-image-caption" aria-live="polite" data-caption-suffix="<?php echo esc_attr( $caption_suffix ); ?>"><?php echo esc_html( $front['caption'] . ' · ' . $caption_suffix ); ?></p>
			<div class="<?php echo esc_attr( $thumbs_class ); ?>" role="group" aria-label="<?php echo esc_attr( $multiple_videos || ! $has_video ? 'Choose a photo' : 'Choose a photo or video' ); ?>" hidden>
				<?php foreach ( $images as $image_key => $image ) : ?>
					<?php
					$thumb_w = ! empty( $image['thumb_width'] ) ? absint( $image['thumb_width'] ) : ( $is_portrait ? 533 : 640 );
					$thumb_h = ! empty( $image['thumb_height'] ) ? absint( $image['thumb_height'] ) : ( $is_portrait ? 800 : 360 );
					?>
					<button class="ma-pl-thumb" type="button" aria-label="<?php echo esc_attr( $image['control'] ); ?>" aria-pressed="<?php echo 'front' === $image_key ? 'true' : 'false'; ?>" aria-controls="ma-pl-product-media" data-media="image" data-caption="<?php echo esc_attr( $image['caption'] ); ?>" data-caption-suffix="<?php echo esc_attr( $caption_suffix ); ?>" data-alt="<?php echo esc_attr( $image['alt'] ); ?>" data-src="<?php echo esc_url( $image['src'] ); ?>" data-srcset="<?php echo esc_attr( $image['srcset'] ); ?>" data-sizes="<?php echo esc_attr( $sizes ); ?>">
						<img src="<?php echo esc_url( $image['thumbnail'] ); ?>" width="<?php echo esc_attr( $thumb_w ); ?>" height="<?php echo esc_attr( $thumb_h ); ?>" alt="" loading="lazy" decoding="async">
					</button>
				<?php endforeach; ?>
				<?php if ( $has_video && ! $multiple_videos ) : ?>
					<button class="ma-pl-thumb ma-pl-thumb--video" type="button" aria-label="View product video" aria-haspopup="dialog" aria-controls="ma-pl-video-dialog" data-media="video" data-video-aspect="<?php echo esc_attr( $video['aspect'] ?? 'landscape' ); ?>">
						<img src="<?php echo esc_url( $front['thumbnail'] ); ?>" width="640" height="360" alt="" loading="lazy" decoding="async">
						<span class="ma-pl-thumb__video-mark" aria-hidden="true"><span>▶ Video</span></span>
					</button>
				<?php endif; ?>
			</div>
			<?php if ( $has_video && $multiple_videos ) : ?>
				<div class="ma-pl-videos" role="group" aria-labelledby="ma-pl-videos-label" hidden>
					<p id="ma-pl-videos-label" class="ma-pl-videos__label">Product videos</p>
					<div class="<?php echo esc_attr( $video_tiles_class ); ?>">
						<?php foreach ( $videos as $clip ) : ?>
							<?php
							$clip_aspect  = $clip['aspect'] ?? 'landscape';
							$clip_thumb_w = ! empty( $clip['thumb_width'] ) ? absint( $clip['thumb_width'] ) : ( 'portrait' === $clip_aspect ? 400 : 640 );
							$clip_thumb_h = ! empty( $clip['thumb_height'] ) ? absint( $clip['thumb_height'] ) : ( 'portrait' === $clip_aspect ? 600 : 360 );
							?>
							<button class="ma-pl-video-tile" type="button" aria-label="<?php echo esc_attr( sprintf( __( 'Watch video: %s', 'myathletik-child' ), $clip['label'] ) ); ?>" aria-haspopup="dialog" aria-controls="ma-pl-video-dialog" data-media="video" data-video-src="<?php echo esc_url( $clip['src'] ); ?>" data-video-poster="<?php echo esc_url( $clip['poster'] ); ?>" data-video-title="<?php echo esc_attr( $clip['label'] ); ?>" data-video-aspect="<?php echo esc_attr( $clip_aspect ); ?>">
								<span class="ma-pl-video-tile__image<?php echo 'portrait' === $clip_aspect ? ' ma-pl-video-tile__image--portrait' : ''; ?>"><img src="<?php echo esc_url( $clip['thumbnail'] ); ?>" width="<?php echo esc_attr( $clip_thumb_w ); ?>" height="<?php echo esc_attr( $clip_thumb_h ); ?>" alt="" loading="lazy" decoding="async"><span class="ma-pl-thumb__video-mark" aria-hidden="true"><span>▶</span></span></span>
								<span class="ma-pl-video-tile__label"><?php echo esc_html( $clip['label'] ); ?></span>
							</button>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
			<noscript>
				<div class="ma-pl-media-fallback">
					<?php if ( $has_video && $multiple_videos ) : ?>
						<p>Product videos</p>
						<ul>
							<?php foreach ( $videos as $clip ) : ?>
								<li><a href="<?php echo esc_url( $clip['src'] ); ?>"><?php echo esc_html( $clip['label'] ); ?> <span aria-hidden="true">→</span></a></li>
							<?php endforeach; ?>
						</ul>
					<?php elseif ( $has_video ) : ?>
						<a class="ma-pl-text-link" href="<?php echo esc_url( $video['src'] ); ?>">Watch the product video <span aria-hidden="true">→</span></a>
					<?php endif; ?>
					<ul>
						<?php foreach ( $images as $image ) : ?>
							<li><a href="<?php echo esc_url( $image['src'] ); ?>"><?php echo esc_html( $image['caption'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</noscript>
		</div>
		<div class="ma-pl-product__text">
			<?php if ( ! empty( $product['characteristics'] ) ) : ?>
				<p class="ma-pl-characteristics"><?php echo esc_html( $product['characteristics'] ); ?></p>
			<?php endif; ?>
			<div class="ma-pl-state"><?php echo esc_html( $product['state'] ?? 'Real product sample · OEM development reference' ); ?></div>
			<dl class="ma-pl-quick">
				<?php foreach ( $facts as $label => $value ) : ?>
					<div class="ma-pl-quick__row"><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
				<?php endforeach; ?>
			</dl>
			<?php if ( ! empty( $product['facts_note'] ) ) : ?>
				<p class="ma-pl-facts-note"><?php echo esc_html( $product['facts_note'] ); ?></p>
			<?php endif; ?>
			<div class="ma-pl-actions">
				<a class="ma-pl-button" href="<?php echo esc_url( $inquiry_url ); ?>">Request a project review</a>
				<?php if ( $has_video ) : ?>
					<button id="ma-pl-show-product-video" class="ma-pl-button ma-pl-button--secondary" type="button" aria-haspopup="dialog" aria-controls="ma-pl-video-dialog" data-video-aspect="<?php echo esc_attr( $video['aspect'] ?? 'landscape' ); ?>"<?php if ( $multiple_videos ) : ?> data-video-title="<?php echo esc_attr( $video['label'] ); ?>"<?php endif; ?> hidden>View product video</button>
				<?php endif; ?>
			</div>
			<?php if ( $category_slug && $category_label ) : ?>
				<a class="ma-pl-text-link ma-pl-related-category" href="<?php echo esc_url( home_url( '/' . $category_slug . '/' ) ); ?>"><?php echo esc_html( sprintf( __( 'Explore %s manufacturing', 'myathletik-child' ), $category_label ) ); ?> <span aria-hidden="true">→</span></a>
			<?php endif; ?>
		</div>
	</section>
	<?php if ( $has_video ) : ?>
	<dialog id="ma-pl-video-dialog" class="ma-pl-video-dialog" aria-labelledby="ma-pl-video-title">
		<div class="ma-pl-video-dialog__toolbar">
			<p id="ma-pl-video-title">Product video</p>
			<button class="ma-pl-button ma-pl-button--secondary" type="button" data-ma-pl-video-close autofocus aria-label="Close product video">Close <span aria-hidden="true">×</span></button>
		</div>
		<video id="ma-pl-product-video" controls playsinline preload="none" tabindex="0" aria-label="<?php echo esc_attr( sprintf( __( 'Product video: %s', 'myathletik-child' ), $product['title'] ) ); ?>" poster="<?php echo esc_url( $video['poster'] ); ?>">
			<source src="<?php echo esc_url( $video['src'] ); ?>" type="video/mp4">
			<a href="<?php echo esc_url( $video['src'] ); ?>">Watch the product video</a>
		</video>
	</dialog>
	<?php endif; ?>
	<?php if ( ! empty( $product['options'] ) ) : ?>
	<section id="ma-pl-development-options" class="ma-pl-section" aria-labelledby="ma-pl-development-title">
		<div class="ma-section-inner">
			<div class="ma-pl-section-head">
				<div><p class="ma-pl-eyebrow"><?php echo esc_html( $product['options']['eyebrow'] ?? 'Development options' ); ?></p><h2 id="ma-pl-development-title"><?php echo esc_html( $product['options']['title'] ?? 'Build around your product brief' ); ?></h2></div>
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
	<?php endif; ?>
	<section class="ma-pl-section ma-pl-surface" aria-labelledby="ma-pl-project-title">
		<div class="ma-section-inner ma-pl-next-step">
			<div><p class="ma-pl-eyebrow">Your next program</p><h2 id="ma-pl-project-title"><?php echo esc_html( $category_label ? sprintf( __( 'Discuss your %s project', 'myathletik-child' ), $category_label ) : __( 'Discuss your next apparel project', 'myathletik-child' ) ); ?></h2></div>
			<a class="ma-pl-button" href="<?php echo esc_url( $inquiry_url ); ?>">Request a project review <span aria-hidden="true">→</span></a>
		</div>
	</section>
</main>
<?php get_footer(); ?>
