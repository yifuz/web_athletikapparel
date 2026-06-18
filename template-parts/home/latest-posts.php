<?php
/**
 * Homepage latest posts section.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$latest_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 2,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	)
);
?>

<section class="ma-home-latest" aria-labelledby="ma-home-latest-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading">
			<p class="ma-section-kicker"><?php esc_html_e( 'Latest from blog', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-latest-title"><?php esc_html_e( 'Manufacturing notes and product updates', 'myathletik-child' ); ?></h2>
		</div>

		<?php if ( $latest_posts->have_posts() ) : ?>
			<div class="ma-home-latest__grid">
				<?php while ( $latest_posts->have_posts() ) : ?>
					<?php $latest_posts->the_post(); ?>
					<article class="ma-post-card">
						<a href="<?php the_permalink(); ?>">
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
							<h3><?php the_title(); ?></h3>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
						</a>
					</article>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p class="ma-home-latest__empty">[CONTENT: user to publish or select latest blog posts]</p>
		<?php endif; ?>
	</div>
</section>
