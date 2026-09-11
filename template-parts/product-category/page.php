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
$overview_heading = ! empty( $category['overview_heading'] )
	? $category['overview_heading']
	: __( 'What we make', 'myathletik-child' );
$product_range_heading = ! empty( $category['product_range_heading'] )
	? $category['product_range_heading']
	: __( 'Explore what we manufacture', 'myathletik-child' );
$hero_video_variant = ! empty( $category['hero_video_variant'] )
	? sanitize_html_class( $category['hero_video_variant'] )
	: '';
$has_dark_video_hero = ! empty( $category['hero_video'] ) && 'split' !== $hero_video_variant;
$examples_button_class = $has_dark_video_hero
	? 'ma-button--secondary'
	: 'ma-button--outline';
$hero_classes = array( 'ma-product-hero' );

if ( ! empty( $category['hero_video'] ) ) {
	$hero_classes[] = 'ma-product-hero--video';

	if ( $hero_video_variant ) {
		$hero_classes[] = 'ma-product-hero--video-' . $hero_video_variant;
	}
}
$specs = array(
	array(
		'label'       => __( 'MOQ', 'myathletik-child' ),
		'value'       => $public_moq,
		'unit'        => __( 'pcs', 'myathletik-child' ),
		'description' => __( 'Per style.', 'myathletik-child' ),
	),
	array(
		'label'       => __( 'Sampling', 'myathletik-child' ),
		'value'       => __( '1-2', 'myathletik-child' ),
		'unit'        => __( 'weeks', 'myathletik-child' ),
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
	<section class="<?php echo esc_attr( implode( ' ', $hero_classes ) ); ?>" aria-labelledby="ma-product-title">
		<?php if ( ! empty( $category['hero_video'] ) ) : ?>
			<?php $video_pos = ! empty( $category['hero_video_position'] ) ? $category['hero_video_position'] : 'center'; ?>
			<?php $video_poster = ! empty( $category['hero_video_poster'] ) ? $image_base . $category['hero_video_poster'] : ''; ?>
			<video class="ma-product-hero__video" autoplay muted loop playsinline preload="auto"<?php echo $video_poster ? ' poster="' . esc_url( $video_poster ) . '"' : ''; ?> aria-hidden="true" style="object-position: <?php echo esc_attr( $video_pos ); ?>;">
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
				<a class="ma-button <?php echo esc_attr( $examples_button_class ); ?>" href="<?php echo ! empty( $category['subcategories'] ) ? '#ma-product-subcats-title' : '#product-examples'; ?>"><?php esc_html_e( 'View Examples', 'myathletik-child' ); ?></a>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $category['buyer_fit']['summary'] ) && ! empty( $category['buyer_fit']['facts'] ) && is_array( $category['buyer_fit']['facts'] ) ) : ?>
	<section class="ma-product-section ma-product-fit" aria-labelledby="ma-product-fit-title">
		<div class="ma-section-inner ma-product-fit__layout">
			<div class="ma-product-fit__answer">
				<p class="ma-section-kicker"><?php esc_html_e( 'Program fit', 'myathletik-child' ); ?></p>
				<h2 id="ma-product-fit-title">
					<?php echo esc_html( ! empty( $category['buyer_fit']['heading'] ) ? $category['buyer_fit']['heading'] : __( 'Is this program a fit?', 'myathletik-child' ) ); ?>
				</h2>
				<p><?php echo esc_html( $category['buyer_fit']['summary'] ); ?></p>
			</div>
			<dl class="ma-product-fit__facts">
				<?php
				$fit_icons = array( 'audience', 'garment', 'commercial' );
				foreach ( $category['buyer_fit']['facts'] as $fact_index => $fact ) :
				?>
					<?php if ( ! empty( $fact['label'] ) && ! empty( $fact['value'] ) ) : ?>
						<div>
							<dt>
								<?php if ( isset( $fit_icons[ $fact_index ] ) ) : ?>
									<span class="ma-feature-icon ma-product-fit__fact-icon" aria-hidden="true">
										<?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => $fit_icons[ $fact_index ] ) ); ?>
									</span>
								<?php endif; ?>
								<span><?php echo esc_html( $fact['label'] ); ?></span>
							</dt>
							<dd><?php echo esc_html( $fact['value'] ); ?></dd>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</dl>
		</div>
	</section>
	<?php endif; ?>

	<section class="ma-product-section ma-product-intro">
		<div class="ma-section-inner ma-product-intro__grid">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Category overview', 'myathletik-child' ); ?></p>
				<h2><?php echo esc_html( $overview_heading ); ?></h2>
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

	<?php if ( ! empty( $category['product_showcase'] ) && is_array( $category['product_showcase'] ) ) : ?>
	<?php $has_showcase_carousel = count( $category['product_showcase'] ) > 8; ?>
	<section class="ma-product-section ma-product-showcase" aria-labelledby="ma-product-showcase-title"<?php echo $has_showcase_carousel ? ' data-ma-product-carousel' : ''; ?>>
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php echo esc_html( ! empty( $category['showcase_kicker'] ) ? $category['showcase_kicker'] : __( 'Product examples', 'myathletik-child' ) ); ?></p>
				<h2 id="ma-product-showcase-title"><?php echo esc_html( $category['showcase_heading'] ); ?></h2>
				<?php if ( ! empty( $category['showcase_intro'] ) ) : ?>
					<p><?php echo esc_html( $category['showcase_intro'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( $has_showcase_carousel ) : ?>
				<div class="ma-product-showcase__toolbar">
					<p id="ma-product-showcase-help"><?php esc_html_e( 'Drag the gallery or use the arrow buttons to view more products.', 'myathletik-child' ); ?></p>
					<div class="ma-product-showcase__controls">
						<button type="button" data-ma-carousel-prev aria-controls="ma-product-showcase-track" disabled>
							<span aria-hidden="true">←</span>
							<span class="screen-reader-text"><?php esc_html_e( 'View previous Merino wool products', 'myathletik-child' ); ?></span>
						</button>
						<button type="button" data-ma-carousel-next aria-controls="ma-product-showcase-track">
							<span aria-hidden="true">→</span>
							<span class="screen-reader-text"><?php esc_html_e( 'View more Merino wool products', 'myathletik-child' ); ?></span>
						</button>
					</div>
				</div>
			<?php endif; ?>
			<div
				class="ma-product-showcase__grid<?php echo $has_showcase_carousel ? ' ma-product-showcase__grid--carousel' : ''; ?>"
				<?php if ( $has_showcase_carousel ) : ?>
					id="ma-product-showcase-track"
					tabindex="0"
					aria-label="<?php esc_attr_e( 'Merino wool product gallery', 'myathletik-child' ); ?>"
					aria-describedby="ma-product-showcase-help"
				<?php endif; ?>
			>
				<?php foreach ( $category['product_showcase'] as $image ) : ?>
					<?php
					$image_sizes = '(max-width: 47.99rem) 50vw, 25vw';
					$webp_srcset = array();

					if ( ! empty( $image['image_webp'] ) && is_array( $image['image_webp'] ) ) {
						foreach ( $image['image_webp'] as $variant_width => $variant_path ) {
							$variant_width = absint( $variant_width );
							if ( $variant_width && $variant_path ) {
								$webp_srcset[] = esc_url( $image_base . ltrim( $variant_path, '/' ) ) . ' ' . $variant_width . 'w';
							}
						}
					}
					?>
					<figure class="ma-product-showcase-card">
						<div class="ma-product-showcase-card__media">
							<?php if ( $webp_srcset ) : ?>
								<picture>
									<source type="image/webp" srcset="<?php echo esc_attr( implode( ', ', $webp_srcset ) ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>">
							<?php endif; ?>
							<img
								src="<?php echo esc_url( $image_base . $image['image'] ); ?>"
								width="<?php echo esc_attr( absint( $image['image_width'] ) ); ?>"
								height="<?php echo esc_attr( absint( $image['image_height'] ) ); ?>"
								alt="<?php echo esc_attr( $image['alt'] ); ?>"
								loading="lazy"
								decoding="async"
								<?php if ( $has_showcase_carousel ) : ?>draggable="false"<?php endif; ?>
							>
							<?php if ( $webp_srcset ) : ?>
								</picture>
							<?php endif; ?>
						</div>
						<figcaption><?php echo esc_html( $image['caption'] ); ?></figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $category['buying_paths'] ) && is_array( $category['buying_paths'] ) ) : ?>
	<section class="ma-product-section ma-product-buying-paths" aria-labelledby="ma-product-buying-paths-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading ma-product-buying-paths__heading">
				<div class="ma-product-buying-paths__heading-copy">
					<p class="ma-section-kicker"><?php echo esc_html( ! empty( $category['buying_paths_kicker'] ) ? $category['buying_paths_kicker'] : __( 'Procurement entry points', 'myathletik-child' ) ); ?></p>
					<h2 id="ma-product-buying-paths-title"><?php echo esc_html( $category['buying_paths_heading'] ); ?></h2>
				</div>
				<?php if ( ! empty( $category['buying_paths_intro'] ) ) : ?>
					<p><?php echo esc_html( $category['buying_paths_intro'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="ma-product-buying-paths__grid">
				<?php foreach ( $category['buying_paths'] as $path_index => $path ) : ?>
					<?php
					$spec_label = '';
					$spec_value = $path['spec'];
					$spec_parts = array_map( 'trim', explode( ':', $path['spec'], 2 ) );

					if ( 2 === count( $spec_parts ) ) {
						$spec_label = $spec_parts[0];
						$spec_value = $spec_parts[1];
					}
					?>
					<article class="ma-product-buying-path">
						<header class="ma-product-buying-path__header">
							<div>
								<p class="ma-product-buying-path__label"><?php echo esc_html( $path['label'] ); ?></p>
								<h3><?php echo esc_html( $path['title'] ); ?></h3>
							</div>
							<span class="ma-product-buying-path__index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $path_index + 1 ) ); ?></span>
						</header>
						<div class="ma-product-buying-path__facts">
							<p class="ma-product-buying-path__spec">
								<?php if ( $spec_label ) : ?>
									<span><?php echo esc_html( $spec_label ); ?></span>
								<?php endif; ?>
								<strong><?php echo esc_html( $spec_value ); ?></strong>
							</p>
							<?php if ( ! empty( $path['material'] ) ) : ?>
								<p class="ma-product-buying-path__material"><strong><?php esc_html_e( 'Material direction:', 'myathletik-child' ); ?></strong> <span><?php echo esc_html( $path['material'] ); ?></span></p>
							<?php endif; ?>
						</div>
						<p class="ma-product-buying-path__description"><?php echo esc_html( $path['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="ma-product-buying-paths__footer">
				<?php if ( ! empty( $category['buying_paths_note'] ) ) : ?>
					<p class="ma-product-buying-paths__note"><?php echo esc_html( $category['buying_paths_note'] ); ?></p>
				<?php endif; ?>
				<a class="ma-button ma-button--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a program review', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $category['subcategories'] ) ) : ?>
	<section class="ma-product-section ma-product-subcategories" aria-labelledby="ma-product-subcats-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Product range', 'myathletik-child' ); ?></p>
				<h2 id="ma-product-subcats-title"><?php echo esc_html( $product_range_heading ); ?></h2>
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

	<?php if ( ! empty( $category['assurance_cards'] ) && is_array( $category['assurance_cards'] ) ) : ?>
	<section class="ma-product-section ma-product-assurance" aria-labelledby="ma-product-assurance-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php echo esc_html( ! empty( $category['assurance_kicker'] ) ? $category['assurance_kicker'] : __( 'Program execution', 'myathletik-child' ) ); ?></p>
				<h2 id="ma-product-assurance-title"><?php echo esc_html( $category['assurance_heading'] ); ?></h2>
				<?php if ( ! empty( $category['assurance_intro'] ) ) : ?>
					<p><?php echo esc_html( $category['assurance_intro'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="ma-product-assurance__grid">
				<?php
				$assurance_icons = array( 'customize', 'quality' );
				foreach ( $category['assurance_cards'] as $card_index => $card ) :
				?>
					<article class="ma-product-assurance-card">
						<header class="ma-product-assurance-card__heading">
							<?php if ( isset( $assurance_icons[ $card_index ] ) ) : ?>
								<span class="ma-feature-icon" aria-hidden="true">
									<?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => $assurance_icons[ $card_index ] ) ); ?>
								</span>
							<?php endif; ?>
							<h3><?php echo esc_html( $card['title'] ); ?></h3>
						</header>
						<?php if ( ! empty( $card['description'] ) ) : ?>
							<p><?php echo esc_html( $card['description'] ); ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $card['items'] ) && is_array( $card['items'] ) ) : ?>
							<ul>
								<?php foreach ( $card['items'] as $item ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( ! empty( $card['link']['url'] ) && ! empty( $card['link']['label'] ) ) : ?>
							<a class="ma-text-link" href="<?php echo esc_url( home_url( $card['link']['url'] ) ); ?>"><?php echo esc_html( $card['link']['label'] ); ?> <span aria-hidden="true">→</span></a>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $category['buyer_questions'] ) && is_array( $category['buyer_questions'] ) ) : ?>
	<section class="ma-product-section ma-product-questions" aria-labelledby="ma-product-questions-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Buyer questions', 'myathletik-child' ); ?></p>
				<h2 id="ma-product-questions-title"><?php echo esc_html( $category['buyer_questions_heading'] ); ?></h2>
			</div>
			<div class="ma-product-questions__grid">
				<?php foreach ( $category['buyer_questions'] as $question ) : ?>
					<?php if ( ! empty( $category['buyer_questions_collapsible'] ) ) : ?>
						<details class="ma-product-question ma-product-question--collapsible">
							<summary>
								<span class="ma-product-question__title"><?php echo esc_html( $question['question'] ); ?></span>
								<span class="ma-product-question__icon" aria-hidden="true"></span>
							</summary>
							<p><?php echo esc_html( $question['answer'] ); ?></p>
						</details>
					<?php else : ?>
						<article class="ma-product-question">
							<h3><?php echo esc_html( $question['question'] ); ?></h3>
							<p><?php echo esc_html( $question['answer'] ); ?></p>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

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

	<?php if ( ! empty( $category['process_steps'] ) && is_array( $category['process_steps'] ) ) : ?>
	<section class="ma-product-section ma-product-procurement" aria-labelledby="ma-product-procurement-title">
		<div class="ma-section-inner">
			<div class="ma-product-procurement__heading">
				<p class="ma-section-kicker"><?php echo esc_html( ! empty( $category['process_kicker'] ) ? $category['process_kicker'] : __( 'Procurement workflow', 'myathletik-child' ) ); ?></p>
				<h2 id="ma-product-procurement-title"><?php echo esc_html( $category['process_heading'] ); ?></h2>
				<?php if ( ! empty( $category['process_intro'] ) ) : ?>
					<p><?php echo esc_html( $category['process_intro'] ); ?></p>
				<?php endif; ?>
			</div>
			<ol class="ma-product-procurement__steps">
				<?php foreach ( $category['process_steps'] as $index => $step ) : ?>
					<li>
						<span class="ma-product-procurement__index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['description'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
			<?php if ( ! empty( $category['process_link']['url'] ) && ! empty( $category['process_link']['label'] ) ) : ?>
				<a class="ma-product-procurement__link" href="<?php echo esc_url( home_url( $category['process_link']['url'] ) ); ?>"><?php echo esc_html( $category['process_link']['label'] ); ?> <span aria-hidden="true">→</span></a>
			<?php endif; ?>
		</div>
	</section>
	<?php else : ?>
	<section class="ma-product-section ma-product-specs">
		<div class="ma-section-inner">
			<div class="ma-product-specs__grid">
				<?php foreach ( $specs as $spec ) : ?>
					<article>
						<span><?php echo esc_html( $spec['label'] ); ?></span>
						<strong>
							<span class="ma-product-specs__value"><?php echo esc_html( $spec['value'] ); ?></span>
							<?php if ( ! empty( $spec['unit'] ) ) : ?>
								<span class="ma-product-specs__unit"><?php echo esc_html( $spec['unit'] ); ?></span>
							<?php endif; ?>
						</strong>
						<p><?php echo esc_html( $spec['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

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
