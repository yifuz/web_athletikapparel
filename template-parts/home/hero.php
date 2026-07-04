<?php
/**
 * Homepage hero section — left-right layout.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_garment_a  = get_stylesheet_directory_uri() . '/assets/images/sportswear/hero_bento_a.jpg';
$hero_garment_d  = get_stylesheet_directory_uri() . '/assets/images/sportswear/hero_bento_d.jpg';
$hero_sewing     = get_stylesheet_directory_uri() . '/assets/images/production/hero_bento_b.jpg';
$hero_knitting   = get_stylesheet_directory_uri() . '/assets/images/production/hero_bento_c.jpg';
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
				<figure class="ma-bento ma-bento--a">
					<img src="<?php echo esc_url( $hero_garment_a ); ?>" alt="" width="900" height="787" loading="eager">
				</figure>
				<figure class="ma-bento ma-bento--b">
					<img src="<?php echo esc_url( $hero_sewing ); ?>" alt="" width="600" height="600" loading="eager">
				</figure>
				<figure class="ma-bento ma-bento--c">
					<img src="<?php echo esc_url( $hero_knitting ); ?>" alt="" width="506" height="506" loading="eager">
				</figure>
				<figure class="ma-bento ma-bento--d">
					<img src="<?php echo esc_url( $hero_garment_d ); ?>" alt="" width="600" height="600" loading="eager">
				</figure>
			</div>
		</div>
	</div>
</section>
