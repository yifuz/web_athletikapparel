<?php
/**
 * Homepage product categories grid — Bento layout (option A).
 *
 * Two large primary cards (Merino Wool + Knitted Fabrics) anchor the top,
 * three medium cards (Sportswear / Underwear / Outdoor) fill the middle band,
 * and two small cards (Silk Wear / Sports Accessories) close the bottom.
 * Hierarchy is driven by card AREA, not by heading size.
 *
 * Each card has a fixed aspect ratio so images always crop cleanly and the
 * grid stays perfectly aligned across desktop and mobile.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_base = get_stylesheet_directory_uri() . '/assets/images/';

/*
 * Card data. `area` maps to a named grid-area in the CSS grid below; the
 * CSS sets the aspect ratio per area so this file never needs to know the
 * exact pixel size.
 */
$categories = array(
	// Tier 1 — large primary cards (left column, tall 3:4).
	array(
		'title'    => __( 'Merino Wool', 'myathletik-child' ),
		'url'      => '/merino-wool-manufacturer/',
		'image'    => 'merino wool product/cat_merino.jpg',
		'alt'      => __( 'Merino wool base layer OEM/ODM product sample', 'myathletik-child' ),
		'area'     => 'primary-left',
		'position' => '50% 40%',
		'tag'      => __( 'Performance knit', 'myathletik-child' ),
	),
	array(
		'title'    => __( 'Knitted Fabrics', 'myathletik-child' ),
		'url'      => '/knitted-fabrics-manufacturer/',
		'image'    => 'knitted fabrics/cat_knitted_fabrics.png',
		'alt'      => __( 'Performance knitted fabric swatch collection for OEM/ODM programs', 'myathletik-child' ),
		'area'     => 'primary-right',
		'position' => '50% 50%',
		'tag'      => __( 'Own fabric mill', 'myathletik-child' ),
	),
	// Tier 2 — medium cards.
	array(
		'title'    => __( 'Sportswear', 'myathletik-child' ),
		'url'      => '/sportswear-manufacturer/',
		'image'    => 'sportswear/cat_sportswear.jpg',
		'alt'      => __( 'Sportswear sample for OEM/ODM knitwear manufacturing', 'myathletik-child' ),
		'area'     => 'med-1',
		'position' => '50% 30%',
	),
	array(
		'title'    => __( 'Underwear', 'myathletik-child' ),
		'url'      => '/underwear-manufacturer/',
		'image'    => 'underwear/cat_underwear.jpg',
		'alt'      => __( 'Technical underwear product sample for OEM/ODM manufacturing', 'myathletik-child' ),
		'area'     => 'med-2',
		'position' => '50% 45%',
	),
	array(
		'title'    => __( 'Outdoor Clothing', 'myathletik-child' ),
		'url'      => '/outdoor-clothing-manufacturer/',
		'image'    => 'outdoor clothing/cat_outdoor.png',
		'alt'      => __( 'Outdoor clothing technical knitwear sample', 'myathletik-child' ),
		'area'     => 'med-3',
		'position' => '50% 40%',
	),
	// Tier 3 — small closing cards.
	array(
		'title'    => __( 'Silk Wear', 'myathletik-child' ),
		'url'      => '/silk-wear-manufacturer/',
		'image'    => 'silkwear/cat_silkwear.png',
		'alt'      => __( 'Silk wear garment sample for OEM/ODM production', 'myathletik-child' ),
		'area'     => 'small-1',
		'position' => '50% 50%',
	),
	array(
		'title'    => __( 'Sports Accessories', 'myathletik-child' ),
		'url'      => '/sports-accessories-manufacturer/',
		'image'    => 'sports accessories/cat_accessories.png',
		'alt'      => __( 'Sports accessories for OEM/ODM manufacturing programs', 'myathletik-child' ),
		'area'     => 'small-2',
		'position' => '50% 45%',
	),
);
?>
<section class="ma-home-categories" aria-labelledby="ma-home-categories-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading">
			<p class="ma-section-kicker"><?php esc_html_e( 'Product categories', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-categories-title"><?php esc_html_e( 'Technical knitwear categories for B2B buyers', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'We produce full-package underwear, sportswear, outdoor clothing, and knitted fabrics for global brands. Every category is built on technical knit construction and performance fabrics - engineered to your samples, designs, and specifications.', 'myathletik-child' ); ?></p>
		</div>

		<div class="ma-category-bento">
			<?php foreach ( $categories as $category ) : ?>
				<a class="ma-category-card ma-category-card--<?php echo esc_attr( $category['area'] ); ?>" href="<?php echo esc_url( home_url( $category['url'] ) ); ?>" style="grid-area: <?php echo esc_attr( $category['area'] ); ?>;">
					<img src="<?php echo esc_url( $image_base . $category['image'] ); ?>" alt="<?php echo esc_attr( $category['alt'] ); ?>" loading="lazy" style="object-position: <?php echo esc_attr( $category['position'] ); ?>;">
					<span class="ma-category-card__overlay" aria-hidden="true"></span>
					<?php if ( ! empty( $category['tag'] ) ) : ?>
						<span class="ma-category-card__tag"><?php echo esc_html( $category['tag'] ); ?></span>
					<?php endif; ?>
					<span class="ma-category-card__label">
						<span class="ma-category-card__title"><?php echo esc_html( $category['title'] ); ?></span>
						<span class="ma-category-card__arrow" aria-hidden="true">&rarr;</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
