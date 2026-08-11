<?php
/**
 * Stable homepage entry to the technical-guides content centre.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$articles = myathletik_get_published_technical_articles();
$slug     = array_key_first( $articles );
$article  = $slug ? $articles[ $slug ] : null;

if ( ! $article ) {
	return;
}

$image_url = get_stylesheet_directory_uri() . '/assets/images/' . ltrim( $article['featured_image'], '/' );
?>

<section class="ma-home-guides" aria-labelledby="ma-home-guides-title">
	<div class="ma-section-inner ma-home-guides__layout">
		<div class="ma-home-guides__intro">
			<p class="ma-section-kicker"><?php esc_html_e( 'Technical guides', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-guides-title"><?php esc_html_e( 'Production guidance for performance knitwear buyers', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'Review construction decisions, tech pack requirements, testing considerations and supplier-evaluation criteria for cut-and-sew performance knitwear.', 'myathletik-child' ); ?></p>
			<a class="ma-button ma-button--outline" href="<?php echo esc_url( home_url( '/technical-guides/' ) ); ?>"><?php esc_html_e( 'Explore Technical Guides', 'myathletik-child' ); ?></a>
		</div>

		<article class="ma-home-guides__featured">
			<a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>">
				<div class="ma-home-guides__media">
					<img
						src="<?php echo esc_url( $image_url ); ?>"
						width="<?php echo esc_attr( $article['featured_width'] ); ?>"
						height="<?php echo esc_attr( $article['featured_height'] ); ?>"
						loading="lazy"
						decoding="async"
						sizes="(max-width: 767px) 100vw, 40vw"
						alt="<?php echo esc_attr( $article['featured_alt'] ); ?>"
					>
				</div>
				<div class="ma-home-guides__featured-copy">
					<p><?php echo esc_html( $article['topic'] ); ?></p>
					<h3><?php echo esc_html( $article['title'] ); ?></h3>
					<span><?php esc_html_e( 'Read guide', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></span>
				</div>
			</a>
		</article>
	</div>
</section>
