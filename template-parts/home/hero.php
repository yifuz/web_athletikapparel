<?php
/**
 * Homepage hero section — left-right layout.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_garment_a  = get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-knitwear-hero-1280-lossless.webp';
$hero_garment_a_srcset = implode(
	', ',
	array(
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-knitwear-hero-480-lossless.webp 480w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-knitwear-hero-640-lossless.webp 640w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-knitwear-hero-720-lossless.webp 720w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-knitwear-hero-960-lossless.webp 960w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-knitwear-hero-1280-lossless.webp 1280w',
	)
);
$hero_sewing = get_stylesheet_directory_uri() . '/assets/images/production/sewing-floor-bento-400-q100.webp';
$hero_sewing_srcset = implode(
	', ',
	array(
		get_stylesheet_directory_uri() . '/assets/images/production/sewing-floor-bento-160-q100.webp 160w',
		get_stylesheet_directory_uri() . '/assets/images/production/sewing-floor-bento-240-q100.webp 240w',
		get_stylesheet_directory_uri() . '/assets/images/production/sewing-floor-bento-320-q100.webp 320w',
		get_stylesheet_directory_uri() . '/assets/images/production/sewing-floor-bento-400-q100.webp 400w',
	)
);
$hero_knitting = get_stylesheet_directory_uri() . '/assets/images/production/circular-knitting-bento-400-q100.webp';
$hero_knitting_srcset = implode(
	', ',
	array(
		get_stylesheet_directory_uri() . '/assets/images/production/circular-knitting-bento-160-q100.webp 160w',
		get_stylesheet_directory_uri() . '/assets/images/production/circular-knitting-bento-240-q100.webp 240w',
		get_stylesheet_directory_uri() . '/assets/images/production/circular-knitting-bento-320-q100.webp 320w',
		get_stylesheet_directory_uri() . '/assets/images/production/circular-knitting-bento-400-q100.webp 400w',
	)
);
$hero_garment_d = get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-garment-bento-400-q100.webp';
$hero_garment_d_srcset = implode(
	', ',
	array(
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-garment-bento-160-q100.webp 160w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-garment-bento-240-q100.webp 240w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-garment-bento-320-q100.webp 320w',
		get_stylesheet_directory_uri() . '/assets/images/sportswear/performance-garment-bento-400-q100.webp 400w',
	)
);
$hero_secondary_sizes = '(max-width: 47.9375rem) calc((100vw - 3rem) / 3), 13rem';
?>

<section class="ma-home-hero" aria-label="<?php esc_attr_e( 'myathletik homepage introduction', 'myathletik-child' ); ?>">
	<div class="ma-home-hero__inner">
		<div class="ma-home-hero__content">
			<p class="ma-home-hero__eyebrow"><?php esc_html_e( 'Yarn-to-Garment Integration', 'myathletik-child' ); ?></p>
			<h1 class="ma-home-hero__title">
				<span><?php esc_html_e( 'Performance Apparel', 'myathletik-child' ); ?></span>
				<span><?php esc_html_e( 'Manufacturer', 'myathletik-child' ); ?></span>
			</h1>
			<p class="ma-home-hero__subhead"><?php esc_html_e( 'From knitted fabric development to finished garments, we support underwear, base layer, sportswear and yoga apparel programs with integrated production, FLATLOCK and ACTIVESEAM construction.', 'myathletik-child' ); ?></p>
			<div class="ma-home-hero__actions" aria-label="<?php esc_attr_e( 'Primary homepage actions', 'myathletik-child' ); ?>">
				<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?>
				</a>
				<a class="ma-button ma-button--outline" href="<?php echo esc_url( home_url( '/#ma-home-categories-title' ) ); ?>">
					<?php esc_html_e( 'View Products', 'myathletik-child' ); ?>
				</a>
			</div>
			<ul class="ma-home-hero__tags" aria-label="<?php esc_attr_e( 'Homepage capability highlights', 'myathletik-child' ); ?>">
				<li><?php esc_html_e( 'Yarn-to-Fabric Development', 'myathletik-child' ); ?></li>
				<li><?php esc_html_e( 'FLATLOCK & ACTIVESEAM', 'myathletik-child' ); ?></li>
				<li><?php esc_html_e( 'In-house Testing', 'myathletik-child' ); ?></li>
				<li><?php esc_html_e( 'Reliable Export', 'myathletik-child' ); ?></li>
			</ul>
		</div>
		<div class="ma-home-hero__visual" aria-hidden="true">
			<div class="ma-home-hero__collage">
				<figure class="ma-bento ma-bento--a">
					<img
						src="<?php echo esc_url( $hero_garment_a ); ?>"
						srcset="<?php echo esc_attr( $hero_garment_a_srcset ); ?>"
						sizes="(max-width: 29.99rem) calc(100vw - 2rem), (max-width: 47.9375rem) 26rem, 22rem"
						alt=""
						width="1280"
						height="2240"
						loading="eager"
						fetchpriority="high"
						decoding="async"
					>
				</figure>
				<figure class="ma-bento ma-bento--b">
					<img
						src="<?php echo esc_url( $hero_sewing ); ?>"
						srcset="<?php echo esc_attr( $hero_sewing_srcset ); ?>"
						sizes="<?php echo esc_attr( $hero_secondary_sizes ); ?>"
						alt=""
						width="400"
						height="400"
						loading="lazy"
						fetchpriority="low"
						decoding="async"
					>
				</figure>
				<figure class="ma-bento ma-bento--c">
					<img
						src="<?php echo esc_url( $hero_knitting ); ?>"
						srcset="<?php echo esc_attr( $hero_knitting_srcset ); ?>"
						sizes="<?php echo esc_attr( $hero_secondary_sizes ); ?>"
						alt=""
						width="400"
						height="400"
						loading="lazy"
						fetchpriority="low"
						decoding="async"
					>
				</figure>
				<figure class="ma-bento ma-bento--d">
					<img
						src="<?php echo esc_url( $hero_garment_d ); ?>"
						srcset="<?php echo esc_attr( $hero_garment_d_srcset ); ?>"
						sizes="<?php echo esc_attr( $hero_secondary_sizes ); ?>"
						alt=""
						width="400"
						height="400"
						loading="lazy"
						fetchpriority="low"
						decoding="async"
					>
				</figure>
			</div>
		</div>
	</div>
</section>
