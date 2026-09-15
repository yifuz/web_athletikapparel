<?php
/**
 * Homepage hero section — layered brand mark, product model, and buyer CTA.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_model_base   = get_stylesheet_directory_uri() . '/assets/images/sportswear/';
$hero_model_png    = $hero_model_base . 'home-hero-baselayer-model.png';
$hero_model_srcset = implode(
	', ',
	array(
		$hero_model_base . 'home-hero-baselayer-model-320.webp 320w',
		$hero_model_base . 'home-hero-baselayer-model-480.webp 480w',
		$hero_model_base . 'home-hero-baselayer-model-560.webp 560w',
	)
);

$hero_brand_mark = get_stylesheet_directory_uri() . '/assets/images/brand/athletik-hero-mark.png';
$hero_badge_base = get_stylesheet_directory_uri() . '/assets/images/audit&certificates/';
$hero_badges     = array(
	'OEKO-100-300x300-150x150-1.png',
	'GRS-300x300-150x150-1.png',
	'audit-bsci-sm-150x150-1.jpg',
	'audit-SMETA-150by150.png',
);
?>

<section class="ma-home-hero" aria-label="<?php esc_attr_e( 'Athletik Clothing homepage introduction', 'myathletik-child' ); ?>">
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

			<a class="ma-home-hero__assurance" href="<?php echo esc_url( home_url( '/#ma-home-certifications-title' ) ); ?>" aria-label="<?php esc_attr_e( 'Review audit and certification program applicability', 'myathletik-child' ); ?>">
				<span class="ma-home-hero__assurance-label"><?php esc_html_e( 'Program references', 'myathletik-child' ); ?></span>
				<span class="ma-home-hero__badges" aria-hidden="true">
					<?php foreach ( $hero_badges as $badge_file ) : ?>
						<span class="ma-home-hero__badge">
							<img
								src="<?php echo esc_url( $hero_badge_base . $badge_file ); ?>"
								alt=""
								width="150"
								height="150"
								loading="lazy"
								decoding="async"
							>
						</span>
					<?php endforeach; ?>
				</span>
			</a>
		</div>

		<div class="ma-home-hero__visual">
			<div class="ma-home-hero__stage">
				<img
					class="ma-home-hero__brand-mark"
					src="<?php echo esc_url( $hero_brand_mark ); ?>"
					alt=""
					width="470"
					height="285"
					loading="eager"
					fetchpriority="low"
					decoding="async"
					aria-hidden="true"
				>
				<picture class="ma-home-hero__model">
					<source
						type="image/webp"
						srcset="<?php echo esc_attr( $hero_model_srcset ); ?>"
						sizes="(max-width: 47.9375rem) 82vw, 32vw"
					>
					<img
						src="<?php echo esc_url( $hero_model_png ); ?>"
						alt="<?php esc_attr_e( 'Female model wearing a charcoal technical base layer and black performance leggings', 'myathletik-child' ); ?>"
						width="560"
						height="942"
						loading="eager"
						fetchpriority="high"
						decoding="async"
					>
				</picture>
			</div>
		</div>
	</div>
</section>
