<?php
/**
 * Underwear category landing page.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/product-category/page', null, array( 'category_slug' => 'underwear-manufacturer' ) );
get_footer();
