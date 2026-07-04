<?php
/**
 * Homepage hero section — left-right layout.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image      = get_stylesheet_directory_uri() . '/assets/images/production/%E5%9C%86%E6%9C%BA.png';
$hero_sewing     = get_stylesheet_directory_uri() . '/assets/images/production/%E7%BC%9D%E7%BA%AB.png';
$hero_garment    = get_stylesheet_directory_uri() . '/assets/images/sportswear/flatlock-athletic-800-1.jpg';
?>

<section class="ma-home-hero" aria-label="<?php esc_attr_e( 'myathletik homepage introduction', 'myathletik-child' ); ?>">
	<div class="ma-home-hero__inner">
		<div class="ma-home-hero__content">
			<p class="ma-home-hero__eyebrow"><?php esc_html_e( 'Technical knitwear OEM/ODM partner', 'myathletik-child' ); ?></p>
			<h1 class="ma-home-hero__title">
				<span><?php esc_html_e( 'Technical Knitwear', 'myathletik-child' ); ?></span>
				<span><?php esc_html_e( 'Manufacturing Partner', 'myathletik-child' ); ?></span>
			</h1>
			<p class="ma-home-hero__subhead"><?php esc_html_e( 'From yarn and fabric development to finished garments, we support underwear, sportswear, outdoor, and performance knitwear programs with integrated production and technical sewing capabilities.', 'myathletik-child' ); ?></p>
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
				<li><?php esc_html_e( 'Flatlock & Activeseam', 'myathletik-child' ); ?></li>
				<li><?php esc_html_e( 'In-house Testing', 'myathletik-child' ); ?></li>
				<li><?php esc_html_e( 'Reliable Export', 'myathletik-child' ); ?></li>
			</ul>
		</div>
		<div class="ma-home-hero__visual" aria-hidden="true">
			<div class="ma-home-hero__collage">
				<div class="ma-home-hero__visual-frame">
					<img src="<?php echo esc_url( $hero_image ); ?>" alt="" width="720" height="540" loading="eager">
				</div>
				<img class="ma-home-hero__thumb ma-home-hero__thumb--tl" src="<?php echo esc_url( $hero_sewing ); ?>" alt="" width="160" height="160" loading="eager">
				<img class="ma-home-hero__thumb ma-home-hero__thumb--br" src="<?php echo esc_url( $hero_garment ); ?>" alt="" width="160" height="160" loading="eager">
			</div>
		</div>
	</div>
</section>
