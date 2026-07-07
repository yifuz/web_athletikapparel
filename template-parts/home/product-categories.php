<?php
/**
 * Homepage product categories grid.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_base = get_stylesheet_directory_uri() . '/assets/images/';
$categories = array(
	array(
		'title' => __( 'Sportswear', 'myathletik-child' ),
		'url'   => '/sportswear-manufacturer/',
		'image' => 'sportswear/cat_feature.jpg',
		'alt'   => __( 'Sportswear sample for OEM/ODM knitwear manufacturing', 'myathletik-child' ),
		'area'  => 'feature',
		'position' => '50% 20%',
	),
	array(
		'title' => __( 'Underwear', 'myathletik-child' ),
		'url'   => '/underwear-manufacturer/',
		'image' => 'underwear/boxer-brief-n-trunk-boxer-22.jpg',
		'alt'   => __( 'Technical underwear product sample for OEM/ODM manufacturing', 'myathletik-child' ),
		'area'  => 'c1',
		'position' => '50% 52%',
	),
	array(
		'title' => __( 'Outdoor Clothing', 'myathletik-child' ),
		'url'   => '/outdoor-clothing-manufacturer/',
		'image' => 'outdoor clothing/flatlock-athletic-800-3.jpg',
		'alt'   => __( 'Outdoor clothing technical knitwear sample', 'myathletik-child' ),
		'area'  => 'c2',
		'position' => '50% 22%',
	),
	array(
		'title' => __( 'Merino Wool', 'myathletik-child' ),
		'url'   => '/merino-wool-manufacturer/',
		'image' => 'merino wool product/merino-wool-base-layer-1.jpg',
		'alt'   => __( 'Merino wool base layer OEM/ODM product sample', 'myathletik-child' ),
		'area'  => 'c3',
		'position' => '50% 16%',
	),
	array(
		'title' => __( 'Silk Wear', 'myathletik-child' ),
		'url'   => '/silk-wear-manufacturer/',
		'image' => 'silkwear/IMG_5350.jpg',
		'alt'   => __( 'Silk wear garment sample for OEM/ODM production', 'myathletik-child' ),
		'area'  => 'c4',
		'position' => '50% 18%',
	),
	array(
		'title' => __( 'Knitted Fabrics', 'myathletik-child' ),
		'url'   => '/knitted-fabrics-manufacturer/',
		'image' => 'production/cat_knitted_fabrics.jpg',
		'alt'   => __( 'Warp knitting machine producing technical knitted fabrics', 'myathletik-child' ),
		'area'  => 'c5',
		'position' => '50% 50%',
	),
	array(
		'title' => __( 'Sports Accessories', 'myathletik-child' ),
		'url'   => '/sports-accessories-manufacturer/',
		'image' => 'sports accessories/cat_card.jpg',
		'alt'   => __( 'Sports accessories for OEM/ODM manufacturing programs', 'myathletik-child' ),
		'area'  => 'c6',
		'position' => '50% 36%',
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

		<div class="ma-home-categories__grid">
			<?php foreach ( $categories as $category ) : ?>
				<a class="ma-category-card" href="<?php echo esc_url( home_url( $category['url'] ) ); ?>" style="grid-area: <?php echo esc_attr( $category['area'] ); ?>;">
					<img src="<?php echo esc_url( $image_base . $category['image'] ); ?>" alt="<?php echo esc_attr( $category['alt'] ); ?>" loading="lazy" style="object-position: <?php echo esc_attr( $category['position'] ); ?>;">
					<span><?php echo esc_html( $category['title'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
