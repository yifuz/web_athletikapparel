<?php
/**
 * Homepage partnership trust section.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image = get_stylesheet_directory_uri() . '/assets/images/production/athletik-production-1-scaled.jpg';
?>

<section class="ma-home-partnership" aria-labelledby="ma-home-partnership-title">
	<div class="ma-section-inner ma-home-partnership__layout">
		<div class="ma-home-partnership__image">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Factory production floor for technical knitwear manufacturing', 'myathletik-child' ); ?>" loading="lazy">
		</div>
		<div class="ma-home-partnership__content">
			<p class="ma-section-kicker"><?php esc_html_e( 'Partnership trust', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-partnership-title"><?php esc_html_e( 'Long-term manufacturing relationships need real context', 'myathletik-child' ); ?></h2>
			<!-- [CONTENT + NEEDS INPUT: user to confirm what client or partnership information is shareable] -->
			<a class="ma-text-link" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'Learn about myathletik', 'myathletik-child' ); ?></a>
		</div>
	</div>
</section>
