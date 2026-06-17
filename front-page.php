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
</main>

<?php
get_footer();
