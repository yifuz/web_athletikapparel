<?php
/**
 * Data-driven hub for published technical guides.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hub      = myathletik_technical_guides_hub_data();
$articles = myathletik_get_published_technical_articles();
$media    = get_stylesheet_directory_uri() . '/assets/images/';
$hero_url = $media . ltrim( $hub['featured_image'], '/' );
$hero_small_url = $media . ltrim( $hub['featured_small'], '/' );
?>

<main id="primary" class="site-main ma-technical-guides">
	<header class="ma-technical-guides__hero">
		<div class="ma-technical-guides__hero-inner">
			<div class="ma-technical-guides__hero-copy">
				<nav class="ma-technical-guides__breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'myathletik-child' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'myathletik-child' ); ?></a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php esc_html_e( 'Technical Guides', 'myathletik-child' ); ?></span>
				</nav>
				<p class="ma-section-kicker"><?php echo esc_html( $hub['kicker'] ); ?></p>
				<h1><?php echo esc_html( $hub['title'] ); ?></h1>
				<p class="ma-technical-guides__lede"><?php echo esc_html( $hub['intro'] ); ?></p>
			</div>
			<figure class="ma-technical-guides__hero-media">
				<img
					src="<?php echo esc_url( $hero_url ); ?>"
					srcset="<?php echo esc_attr( $hero_small_url . ' 800w, ' . $hero_url . ' ' . $hub['featured_width'] . 'w' ); ?>"
					sizes="(max-width: 63.99rem) calc(100vw - 3rem), 32rem"
					width="<?php echo esc_attr( $hub['featured_width'] ); ?>"
					height="<?php echo esc_attr( $hub['featured_height'] ); ?>"
					loading="eager"
					fetchpriority="high"
					decoding="async"
					alt="<?php echo esc_attr( $hub['featured_alt'] ); ?>"
				>
			</figure>
		</div>
	</header>

	<section class="ma-technical-guides__library" aria-labelledby="ma-technical-guides-library-title">
		<div class="ma-technical-guides__inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Published guides', 'myathletik-child' ); ?></p>
				<h2 id="ma-technical-guides-library-title"><?php esc_html_e( 'Technical decisions, explained for buyers', 'myathletik-child' ); ?></h2>
			</div>

			<div class="ma-technical-guides__grid">
				<?php foreach ( $articles as $slug => $article ) : ?>
					<?php
					$card_url       = $media . ltrim( $article['featured_image'], '/' );
					$card_small_url = $media . ltrim( $article['featured_small'], '/' );
					?>
					<article class="ma-guide-card">
						<a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>">
							<?php if ( ! empty( $article['featured_image'] ) ) : ?>
								<div class="ma-guide-card__media">
									<img
										src="<?php echo esc_url( $card_url ); ?>"
										srcset="<?php echo esc_attr( $card_small_url . ' 800w, ' . $card_url . ' ' . $article['featured_width'] . 'w' ); ?>"
										width="<?php echo esc_attr( $article['featured_width'] ); ?>"
										height="<?php echo esc_attr( $article['featured_height'] ); ?>"
										loading="lazy"
										decoding="async"
										sizes="(max-width: 767px) 100vw, 42vw"
										alt="<?php echo esc_attr( $article['featured_alt'] ); ?>"
									>
								</div>
							<?php endif; ?>
							<div class="ma-guide-card__content">
								<p class="ma-guide-card__topic"><?php echo esc_html( $article['topic'] ); ?></p>
								<h3><?php echo esc_html( $article['title'] ); ?></h3>
								<p><?php echo esc_html( $article['summary'] ); ?></p>
								<span class="ma-guide-card__link"><?php esc_html_e( 'Read technical guide', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></span>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-technical-guides__scope" aria-labelledby="ma-technical-guides-scope-title">
		<div class="ma-technical-guides__inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Library scope', 'myathletik-child' ); ?></p>
				<h2 id="ma-technical-guides-scope-title"><?php esc_html_e( 'Built around cut-and-sew performance knitwear', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-technical-guides__scope-grid">
				<?php foreach ( $hub['scope'] as $index => $item ) : ?>
					<article>
						<span aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-technical-guides__cta" aria-labelledby="ma-technical-guides-cta-title">
		<div class="ma-technical-guides__cta-inner">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Project-specific review', 'myathletik-child' ); ?></p>
				<h2 id="ma-technical-guides-cta-title"><?php esc_html_e( 'Apply the guidance to an actual product', 'myathletik-child' ); ?></h2>
				<p><?php esc_html_e( 'Send the intended use, fabric specification, garment drawing or tech pack, order quantity and required testing for a construction review.', 'myathletik-child' ); ?></p>
			</div>
			<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Your Project', 'myathletik-child' ); ?></a>
		</div>
	</section>
</main>
