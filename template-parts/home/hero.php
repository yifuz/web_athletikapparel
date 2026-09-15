<?php
/**
 * Homepage hero section — real garment video, buyer CTA, and trust programs.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_media_base    = get_stylesheet_directory_uri() . '/assets/images/sportswear/';
$hero_video_desktop = $hero_media_base . 'home-hero-black-base-layer-desktop.mp4';
$hero_video_mobile  = $hero_media_base . 'home-hero-black-base-layer-mobile.mp4';
$hero_video_poster  = $hero_media_base . 'home-hero-black-base-layer-poster.webp';
$hero_badge_base = get_stylesheet_directory_uri() . '/assets/images/audit&certificates/hero-transparent/';
$hero_badges     = array(
	array( 'file' => 'hero-bsci.png', 'alt' => __( 'BSCI audit program', 'myathletik-child' ) ),
	array( 'file' => 'hero-oeko-tex.png', 'alt' => __( 'OEKO-TEX Standard 100 program', 'myathletik-child' ) ),
	array( 'file' => 'hero-grs.png', 'alt' => __( 'Global Recycled Standard program', 'myathletik-child' ) ),
	array( 'file' => 'hero-smeta.png', 'alt' => __( 'SMETA audit program', 'myathletik-child' ) ),
	array( 'file' => 'hero-rws.png', 'alt' => __( 'Responsible Wool Standard program', 'myathletik-child' ) ),
	array( 'file' => 'hero-higg.png', 'alt' => __( 'Higg Index assessment program', 'myathletik-child' ) ),
);
?>

<section class="ma-home-hero" aria-label="<?php esc_attr_e( 'Athletik Clothing homepage introduction', 'myathletik-child' ); ?>">
	<video
		class="ma-home-hero__video"
		autoplay
		muted
		loop
		playsinline
		preload="auto"
		poster="<?php echo esc_url( $hero_video_poster ); ?>"
		aria-hidden="true"
		tabindex="-1"
	>
		<source
			media="(max-width: 63.9375rem)"
			src="<?php echo esc_url( $hero_video_mobile ); ?>"
			type="video/mp4"
		>
		<source
			src="<?php echo esc_url( $hero_video_desktop ); ?>"
			type="video/mp4"
		>
	</video>
	<div class="ma-home-hero__video-overlay" aria-hidden="true"></div>

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

			<ul class="ma-home-hero__badges" aria-label="<?php esc_attr_e( 'Audit, certification, and assessment programs', 'myathletik-child' ); ?>">
				<?php foreach ( $hero_badges as $badge ) : ?>
					<li class="ma-home-hero__badge">
						<img
							src="<?php echo esc_url( $hero_badge_base . $badge['file'] ); ?>"
							alt="<?php echo esc_attr( $badge['alt'] ); ?>"
							width="150"
							height="150"
							loading="eager"
							decoding="async"
						>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
