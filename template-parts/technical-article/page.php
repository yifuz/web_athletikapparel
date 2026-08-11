<?php
/**
 * Shared layout for code-rendered technical articles.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$article_slug = isset( $args['article_slug'] ) ? sanitize_key( $args['article_slug'] ) : '';
$article      = myathletik_get_technical_article_data( $article_slug );

if ( ! $article ) {
	return;
}

$published_iso     = get_the_date( DATE_W3C );
$published_display = get_the_date( 'F j, Y' );
$reviewed_iso      = $article['reviewed_on'];
$reviewed_display  = wp_date( 'F j, Y', strtotime( $reviewed_iso ) );
?>

<main id="primary" class="site-main ma-technical-article">
	<article aria-labelledby="ma-technical-article-title">
		<header class="ma-technical-article__hero">
			<div class="ma-technical-article__hero-inner">
				<nav class="ma-technical-article__breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'myathletik-child' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'myathletik-child' ); ?></a>
					<span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( home_url( '/technical-guides/' ) ); ?>"><?php esc_html_e( 'Technical Guides', 'myathletik-child' ); ?></a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( $article['title'] ); ?></span>
				</nav>

				<p class="ma-section-kicker"><?php echo esc_html( $article['kicker'] ); ?></p>
				<h1 id="ma-technical-article-title"><?php echo esc_html( $article['title'] ); ?></h1>
				<p class="ma-technical-article__lede"><?php echo esc_html( $article['intro'] ); ?></p>
				<p class="ma-technical-article__meta">
					<?php esc_html_e( 'Published by', 'myathletik-child' ); ?>
					<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'Athletik Clothing', 'myathletik-child' ); ?></a>
					<span aria-hidden="true">·</span>
					<time datetime="<?php echo esc_attr( $published_iso ); ?>"><?php echo esc_html( $published_display ); ?></time>
					<span aria-hidden="true">·</span>
					<?php esc_html_e( 'Technical review completed', 'myathletik-child' ); ?>
					<time datetime="<?php echo esc_attr( $reviewed_iso ); ?>"><?php echo esc_html( $reviewed_display ); ?></time>
				</p>
			</div>
		</header>

		<div class="ma-technical-article__layout">
			<aside class="ma-technical-article__toc" aria-label="<?php esc_attr_e( 'Article contents', 'myathletik-child' ); ?>">
				<p class="ma-technical-article__toc-title"><?php esc_html_e( 'On this page', 'myathletik-child' ); ?></p>
				<ol>
					<?php foreach ( $article['toc'] as $anchor => $label ) : ?>
						<li><a href="#<?php echo esc_attr( $anchor ); ?>"><?php echo esc_html( $label ); ?></a></li>
					<?php endforeach; ?>
				</ol>
			</aside>

			<div class="ma-technical-article__body">
				<?php
				get_template_part(
					'template-parts/technical-article/content',
					$article_slug,
					array( 'article' => $article )
				);
				?>

				<section id="faq" class="ma-technical-article__faq" aria-labelledby="ma-technical-article-faq-title">
					<p class="ma-section-kicker"><?php esc_html_e( 'Buyer questions', 'myathletik-child' ); ?></p>
					<h2 id="ma-technical-article-faq-title"><?php esc_html_e( 'Common buyer questions', 'myathletik-child' ); ?></h2>
					<?php foreach ( $article['faq'] as $item ) : ?>
						<div class="ma-technical-article__faq-item">
							<h3><?php echo esc_html( $item['question'] ); ?></h3>
							<p><?php echo esc_html( $item['answer'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</section>

				<section class="ma-technical-article__references" aria-labelledby="ma-technical-article-references-title">
					<p class="ma-section-kicker"><?php esc_html_e( 'Primary sources', 'myathletik-child' ); ?></p>
					<h2 id="ma-technical-article-references-title"><?php esc_html_e( 'Technical references', 'myathletik-child' ); ?></h2>
					<ul>
						<?php foreach ( $article['references'] as $reference ) : ?>
							<li><a href="<?php echo esc_url( $reference['url'] ); ?>"><?php echo esc_html( $reference['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</section>
			</div>
		</div>

		<footer class="ma-technical-article__cta" aria-labelledby="ma-technical-article-cta-title">
			<div class="ma-technical-article__cta-inner">
				<div>
					<p class="ma-section-kicker"><?php echo esc_html( $article['cta_kicker'] ); ?></p>
					<h2 id="ma-technical-article-cta-title"><?php echo esc_html( $article['cta_title'] ); ?></h2>
					<p><?php echo esc_html( $article['cta_copy'] ); ?></p>
				</div>
				<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Your Project', 'myathletik-child' ); ?></a>
			</div>
		</footer>
	</article>
</main>
