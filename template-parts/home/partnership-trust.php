<?php
/**
 * Homepage partnership trust section.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image = get_stylesheet_directory_uri() . '/assets/images/production/%E5%AE%A2%E6%88%B7.png';
?>

<section class="ma-home-partnership" aria-labelledby="ma-home-partnership-title">
	<div class="ma-section-inner ma-home-partnership__layout">
		<div class="ma-home-partnership__image">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing team and client partners, technical knitwear manufacturing', 'myathletik-child' ); ?>" loading="lazy">
		</div>
		<div class="ma-home-partnership__content">
			<p class="ma-section-kicker"><?php esc_html_e( 'Partnership trust', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-partnership-title"><?php esc_html_e( 'Long-term manufacturing relationships need real context', 'myathletik-child' ); ?></h2>
			<a class="ma-text-link" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'Learn about myathletik', 'myathletik-child' ); ?></a>
		</div>
	</div>
</section>
