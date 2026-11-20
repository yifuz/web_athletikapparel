<?php
/**
 * Data-driven hub for published technical guides.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hub            = myathletik_technical_guides_hub_data();
$articles       = myathletik_get_published_technical_articles();
$categories     = myathletik_technical_guide_categories();
$total_articles = count( $articles );
$category_counts = array_fill_keys( array_keys( $categories ), 0 );

foreach ( $articles as $article ) {
	$cat_key = myathletik_get_technical_article_category( $article );
	if ( $cat_key && isset( $category_counts[ $cat_key ] ) ) {
		$category_counts[ $cat_key ]++;
	}
}

$media          = get_stylesheet_directory_uri() . '/assets/images/';
$hero_url       = $media . ltrim( $hub['featured_image'], '/' );
$hero_small_url = $media . ltrim( $hub['featured_small'], '/' );
?>

<main id="primary" class="site-main ma-technical-guides">
	<header class="ma-technical-guides__hero ma-technical-guides__hero--bg">
		<img
			class="ma-technical-guides__hero-bg"
			src="<?php echo esc_url( $hero_url ); ?>"
			srcset="<?php echo esc_attr( $hero_small_url . ' 800w, ' . $hero_url . ' ' . $hub['featured_width'] . 'w' ); ?>"
			sizes="100vw"
			width="<?php echo esc_attr( $hub['featured_width'] ); ?>"
			height="<?php echo esc_attr( $hub['featured_height'] ); ?>"
			loading="eager"
			fetchpriority="high"
			decoding="async"
			alt="<?php echo esc_attr( $hub['featured_alt'] ); ?>"
		>
		<div class="ma-technical-guides__hero-overlay" aria-hidden="true"></div>
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
		</div>
	</header>

	<section class="ma-technical-guides__library" aria-labelledby="ma-technical-guides-library-title" data-guides-library>
		<div class="ma-technical-guides__inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Published guides', 'myathletik-child' ); ?></p>
				<h2 id="ma-technical-guides-library-title"><?php esc_html_e( 'Technical decisions, explained for buyers', 'myathletik-child' ); ?></h2>
			</div>

			<div class="ma-technical-guides__controls" data-guides-controls role="search" aria-label="<?php esc_attr_e( 'Filter technical guides', 'myathletik-child' ); ?>" hidden>
				<div class="ma-technical-guides__topics">
					<span class="ma-technical-guides__control-label" id="ma-guides-topic-label"><?php esc_html_e( 'Topic', 'myathletik-child' ); ?></span>
					<div class="ma-technical-guides__chips" role="group" aria-labelledby="ma-guides-topic-label">
						<button
							type="button"
							class="ma-technical-guides__chip"
							data-guide-category="all"
							data-category-label="<?php esc_attr_e( 'All topics', 'myathletik-child' ); ?>"
							aria-pressed="true"
							aria-controls="ma-technical-guides-results"
						>
							<span><?php esc_html_e( 'All', 'myathletik-child' ); ?></span>
							<span class="ma-technical-guides__chip-count"><?php echo esc_html( (string) $total_articles ); ?></span>
						</button>
						<?php foreach ( $categories as $cat_key => $cat_label ) : ?>
							<?php if ( ! empty( $category_counts[ $cat_key ] ) ) : ?>
								<button
									type="button"
									class="ma-technical-guides__chip"
									data-guide-category="<?php echo esc_attr( $cat_key ); ?>"
									data-category-label="<?php echo esc_attr( $cat_label ); ?>"
									aria-pressed="false"
									aria-controls="ma-technical-guides-results"
								>
									<span><?php echo esc_html( $cat_label ); ?></span>
									<span class="ma-technical-guides__chip-count"><?php echo esc_html( (string) $category_counts[ $cat_key ] ); ?></span>
								</button>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="ma-technical-guides__search">
					<label class="ma-technical-guides__control-label" for="ma-guides-search-input"><?php esc_html_e( 'Search guides', 'myathletik-child' ); ?></label>
					<input
						type="search"
						id="ma-guides-search-input"
						data-guides-search
						placeholder="<?php esc_attr_e( 'Stitch type, tech pack, QC, OEM...', 'myathletik-child' ); ?>"
						aria-controls="ma-technical-guides-results"
						autocomplete="off"
					>
				</div>
			</div>

			<p class="ma-technical-guides__status" data-guides-status role="status" aria-live="polite" aria-atomic="true">
				<?php
				echo esc_html(
					sprintf(
						/* translators: %d: number of published technical guides. */
						_n( 'Showing %d technical guide', 'Showing %d technical guides', $total_articles, 'myathletik-child' ),
						$total_articles
					)
				);
				?>
			</p>

			<div class="ma-technical-guides__grid" id="ma-technical-guides-results" data-guides-grid tabindex="-1">
				<?php foreach ( $articles as $slug => $article ) : ?>
					<?php
					$card_url       = $media . ltrim( $article['featured_image'], '/' );
					$card_small_url = $media . ltrim( $article['featured_small'], '/' );
					$cat_key        = myathletik_get_technical_article_category( $article );
					$cat_label      = $cat_key && isset( $categories[ $cat_key ] ) ? $categories[ $cat_key ] : '';
					$search_parts   = array(
						$article['title'],
						$article['topic'],
						$cat_label,
						$article['summary'],
					);
					if ( ! empty( $article['about'] ) && is_array( $article['about'] ) ) {
						$search_parts[] = implode( ' ', $article['about'] );
					}
					?>
					<article
						class="ma-guide-card"
						data-guide-card
						data-category="<?php echo esc_attr( $cat_key ); ?>"
						data-search="<?php echo esc_attr( implode( ' ', array_filter( $search_parts ) ) ); ?>"
					>
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
										sizes="(max-width: 767px) 100vw, (max-width: 1023px) 50vw, 33vw"
										alt="<?php echo esc_attr( $article['featured_alt'] ); ?>"
									>
								</div>
							<?php endif; ?>
							<div class="ma-guide-card__content">
								<p class="ma-guide-card__topic"><?php echo esc_html( $article['topic'] ); ?></p>
								<h3><?php echo esc_html( $article['title'] ); ?></h3>
								<p class="ma-guide-card__summary"><?php echo esc_html( $article['summary'] ); ?></p>
								<span class="ma-guide-card__link"><?php esc_html_e( 'Read technical guide', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></span>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="ma-technical-guides__empty" data-guides-empty hidden>
				<p><?php esc_html_e( 'No matching technical guides found. Try another keyword or reset the filters.', 'myathletik-child' ); ?></p>
				<button type="button" class="ma-button ma-button--outline" data-guides-reset><?php esc_html_e( 'Show all guides', 'myathletik-child' ); ?></button>
			</div>

			<nav class="ma-technical-guides__pagination" aria-label="<?php esc_attr_e( 'Technical guide pages', 'myathletik-child' ); ?>" data-guides-pagination hidden>
				<button type="button" class="ma-button ma-button--outline" data-guides-prev aria-controls="ma-technical-guides-results">
					<span aria-hidden="true">← </span><?php esc_html_e( 'Previous', 'myathletik-child' ); ?>
				</button>
				<div class="ma-technical-guides__pages" data-guides-pages></div>
				<button type="button" class="ma-button ma-button--outline" data-guides-next aria-controls="ma-technical-guides-results">
					<?php esc_html_e( 'Next', 'myathletik-child' ); ?><span aria-hidden="true"> →</span>
				</button>
			</nav>
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
