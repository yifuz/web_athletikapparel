<?php
/**
 * Homepage template.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main ma-home">
	<?php get_template_part( 'template-parts/home/hero' ); ?>
	<?php get_template_part( 'template-parts/home/client-logos' ); ?>
	<?php get_template_part( 'template-parts/home/product-categories' ); ?>
	<?php get_template_part( 'template-parts/home/capability-proof' ); ?>
	<?php get_template_part( 'template-parts/home/why-myathletik' ); ?>
	<?php get_template_part( 'template-parts/home/style-gallery' ); ?>
	<?php get_template_part( 'template-parts/home/numbers-proof' ); ?>
	<?php get_template_part( 'template-parts/home/process-snapshot' ); ?>
	<?php get_template_part( 'template-parts/home/partnership-trust' ); ?>
	<?php get_template_part( 'template-parts/home/certifications' ); ?>
	<?php // Blog temporarily disabled — no posts yet. Re-enable by uncommenting: get_template_part( 'template-parts/home/latest-posts' ); ?>
	<?php get_template_part( 'template-parts/home/inquiry-cta' ); ?>
</main>

<?php
get_footer();
