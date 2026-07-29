<?php
/**
 * Homepage product categories grid — Bento layout (v2).
 *
 * Three tiers by card area:
 *   Tier 1  Sportswear (large feature, left, biggest area) + Merino Wool (tall)
 *   Tier 2  Knitted Fabrics + Outdoor Clothing
 *   Tier 3  Silk Wear + Sports Accessories + Underwear
 * Hierarchy is driven by card AREA, not by heading size. Each tier locks an
 * aspect ratio so images always crop cleanly and the grid stays aligned.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_base = get_stylesheet_directory_uri() . '/assets/images/';

$categories = array(
	// Tier 1 — Sportswear is the hero feature card (left, largest area).
	array(
		'title'    => __( 'Sportswear', 'myathletik-child' ),
		'url'      => '/sportswear-manufacturer/',
		'image'    => 'sportswear/cat-sportswear-1527-q100.webp',
		'sources'  => array(
			640  => 'sportswear/cat-sportswear-640-q100.webp',
			900  => 'sportswear/cat-sportswear-900-q100.webp',
			1527 => 'sportswear/cat-sportswear-1527-q100.webp',
		),
		'sizes'    => '(min-width: 64rem) 54rem, (min-width: 48rem) calc(100vw - 4rem), calc(100vw - 2rem)',
		'width'    => 1527,
		'height'   => 1030,
		'alt'      => __( 'Sportswear sample for OEM/ODM knitwear manufacturing', 'myathletik-child' ),
		'area'     => 'feature',
		'position' => '50% 40%',
		'tag'      => __( 'Performance knit', 'myathletik-child' ),
	),
	array(
		'title'    => __( 'Merino Wool', 'myathletik-child' ),
		'url'      => '/merino-wool-manufacturer/',
		'image'    => 'merino wool product/cat-merino-1280-lossless.webp',
		'sources'  => array(
			640  => 'merino wool product/cat-merino-640-lossless.webp',
			960  => 'merino wool product/cat-merino-960-lossless.webp',
			1280 => 'merino wool product/cat-merino-1280-lossless.webp',
		),
		'sizes'    => '(min-width: 64rem) 17rem, (min-width: 48rem) calc(50vw - 2.5rem), calc(100vw - 2rem)',
		'width'    => 1280,
		'height'   => 1920,
		'alt'      => __( 'Merino wool base layer OEM/ODM product sample', 'myathletik-child' ),
		'area'     => 't1-side',
		'position' => '50% 15%',
		'tag'      => __( 'Performance knit', 'myathletik-child' ),
		'subtitle' => __( 'Apparel & base layers', 'myathletik-child' ),
	),
	// Tier 2.
	array(
		'title'    => __( 'Knitted Fabrics', 'myathletik-child' ),
		'url'      => '/knitted-fabrics-manufacturer/',
		'image'    => 'knitted fabrics/cat-knitted-fabrics-1200-q100.webp',
		'sources'  => array(
			640  => 'knitted fabrics/cat-knitted-fabrics-640-q100.webp',
			1200 => 'knitted fabrics/cat-knitted-fabrics-1200-q100.webp',
		),
		'sizes'    => '(min-width: 64rem) 35rem, (min-width: 48rem) calc(50vw - 2.5rem), calc(100vw - 2rem)',
		'width'    => 1200,
		'height'   => 666,
		'alt'      => __( 'Performance knitted fabric swatch collection for OEM/ODM programs', 'myathletik-child' ),
		'area'     => 't2-1',
		'position' => '50% 50%',
	),
	array(
		'title'    => __( 'Outdoor Clothing', 'myathletik-child' ),
		'url'      => '/outdoor-clothing-manufacturer/',
		'image'    => 'outdoor clothing/cat-outdoor-1200-q100.webp',
		'sources'  => array(
			640  => 'outdoor clothing/cat-outdoor-640-q100.webp',
			1200 => 'outdoor clothing/cat-outdoor-1200-q100.webp',
		),
		'sizes'    => '(min-width: 64rem) 35rem, (min-width: 48rem) calc(50vw - 2.5rem), calc(100vw - 2rem)',
		'width'    => 1200,
		'height'   => 600,
		'alt'      => __( 'Outdoor clothing technical knitwear sample', 'myathletik-child' ),
		'area'     => 't2-2',
		'position' => '50% 40%',
	),
	// Tier 3.
	array(
		'title'    => __( 'Silk Wear', 'myathletik-child' ),
		'url'      => '/silk-wear-manufacturer/',
		'image'    => 'silkwear/cat-silk-960-q100.webp',
		'sources'  => array(
			640 => 'silkwear/cat-silk-640-q100.webp',
			960 => 'silkwear/cat-silk-960-q100.webp',
		),
		'sizes'    => '(min-width: 64rem) 17rem, (min-width: 48rem) calc(50vw - 2.5rem), calc(100vw - 2rem)',
		'width'    => 960,
		'height'   => 384,
		'alt'      => __( 'Silk wear garment sample for OEM/ODM production', 'myathletik-child' ),
		'area'     => 't3-1',
		'position' => '50% 50%',
	),
	array(
		'title'    => __( 'Sports Accessories', 'myathletik-child' ),
		'url'      => '/sports-accessories-manufacturer/',
		'image'    => 'sports accessories/cat-sports-accessories-960-q100.webp',
		'sources'  => array(
			640 => 'sports accessories/cat-sports-accessories-640-q100.webp',
			960 => 'sports accessories/cat-sports-accessories-960-q100.webp',
		),
		'sizes'    => '(min-width: 64rem) 17rem, (min-width: 48rem) calc(50vw - 2.5rem), calc(100vw - 2rem)',
		'width'    => 960,
		'height'   => 768,
		'alt'      => __( 'Sports accessories for OEM/ODM manufacturing programs', 'myathletik-child' ),
		'area'     => 't3-2',
		'position' => '50% 45%',
	),
	array(
		'title'    => __( 'Underwear', 'myathletik-child' ),
		'url'      => '/underwear-manufacturer/',
		'image'    => 'underwear/cat-underwear-1200-q100.webp',
		'sources'  => array(
			640  => 'underwear/cat-underwear-640-q100.webp',
			960  => 'underwear/cat-underwear-960-q100.webp',
			1200 => 'underwear/cat-underwear-1200-q100.webp',
		),
		'sizes'    => '(min-width: 64rem) 35rem, (min-width: 48rem) calc(100vw - 4rem), calc(100vw - 2rem)',
		'width'    => 1200,
		'height'   => 632,
		'alt'      => __( 'Technical underwear product sample for OEM/ODM manufacturing', 'myathletik-child' ),
		'area'     => 't3-3',
		'position' => '50% 45%',
	),
);
?>
<section class="ma-home-categories" aria-labelledby="ma-home-categories-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading">
			<p class="ma-section-kicker"><?php esc_html_e( 'Product categories', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-categories-title"><?php esc_html_e( 'What we make', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'Each category is built to your designs, samples, or tech packs - with the same flatlock, activeseam, and performance-knit construction across every program.', 'myathletik-child' ); ?></p>
		</div>

		<div class="ma-category-bento">
			<?php foreach ( $categories as $category ) : ?>
				<?php
				$category_srcset = array();
				foreach ( $category['sources'] as $source_width => $source_path ) {
					$category_srcset[] = esc_url( $image_base . $source_path ) . ' ' . absint( $source_width ) . 'w';
				}
				?>
				<a class="ma-category-card ma-category-card--<?php echo esc_attr( $category['area'] ); ?>" href="<?php echo esc_url( home_url( $category['url'] ) ); ?>" style="grid-area: <?php echo esc_attr( $category['area'] ); ?>;">
					<img
						src="<?php echo esc_url( $image_base . $category['image'] ); ?>"
						srcset="<?php echo esc_attr( implode( ', ', $category_srcset ) ); ?>"
						sizes="<?php echo esc_attr( $category['sizes'] ); ?>"
						width="<?php echo esc_attr( $category['width'] ); ?>"
						height="<?php echo esc_attr( $category['height'] ); ?>"
						alt="<?php echo esc_attr( $category['alt'] ); ?>"
						loading="lazy"
						decoding="async"
						style="object-position: <?php echo esc_attr( $category['position'] ); ?>;"
					>
					<span class="ma-category-card__overlay" aria-hidden="true"></span>
					<?php if ( ! empty( $category['tag'] ) ) : ?>
						<span class="ma-category-card__tag"><?php echo esc_html( $category['tag'] ); ?></span>
					<?php endif; ?>
					<span class="ma-category-card__label">
						<span class="ma-category-card__title">
							<?php echo esc_html( $category['title'] ); ?>
							<?php if ( ! empty( $category['subtitle'] ) ) : ?>
								<span class="ma-category-card__subtitle"><?php echo esc_html( $category['subtitle'] ); ?></span>
							<?php endif; ?>
						</span>
						<span class="ma-category-card__arrow" aria-hidden="true">&rarr;</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
