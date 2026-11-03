<?php
/**
 * Product Showcase: local review integration, not a production release.
 *
 * No pages or menus are created on front-end requests. Local review pages are
 * explicitly provisioned in LocalWP; the production theme stays unchanged in
 * behavior even if this code is transferred before approval.
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Check the stored site identity, never the request's spoofable Host header. */
function myathletik_product_showcase_preview_enabled() {
	return 'local' === wp_get_environment_type()
		&& 'myathletik-rebuild-02.local' === wp_parse_url( get_option( 'home' ), PHP_URL_HOST );
}

function myathletik_product_showcase_url() {
	return home_url( '/product-showcase/' );
}

function myathletik_product_example_url( $product_key ) {
	$products = myathletik_product_example_data();
	if ( ! isset( $products[ $product_key ] ) ) {
		return '';
	}
	// Temporary local review route; final public URLs remain subject to review.
	$slugs = array( 'ocean-depth' => 'ocean-depth-merino-wool-blend-set' );
	return isset( $slugs[ $product_key ] )
		? home_url( '/product-showcase/' . $slugs[ $product_key ] . '/' )
		: '';
}

function myathletik_is_product_showcase_review_page() {
	return is_page() && '1' === get_post_meta( get_queried_object_id(), '_ma_product_showcase_preview', true );
}

/** Guard against an accidental copy of the local review database to production. */
function myathletik_guard_product_showcase_review() {
	if ( ! myathletik_is_product_showcase_review_page() ) {
		return;
	}
	header( 'X-Robots-Tag: noindex, nofollow', true );
	nocache_headers();
	if ( ! myathletik_product_showcase_preview_enabled() ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
	}
}
add_action( 'template_redirect', 'myathletik_guard_product_showcase_review', 0 );

function myathletik_product_showcase_review_template( $template ) {
	if ( ! myathletik_product_showcase_preview_enabled() || ! myathletik_is_product_showcase_review_page() ) {
		return $template;
	}
	$product_key = get_post_meta( get_queried_object_id(), '_ma_product_example_key', true );
	if ( $product_key ) {
		$products = myathletik_product_example_data();
		if ( ! isset( $products[ $product_key ] ) ) {
			return $template;
		}
		set_query_var( 'ma_product_example_key', $product_key );
		return get_stylesheet_directory() . '/templates/product-example.php';
	}
	return get_stylesheet_directory() . '/templates/product-showcase.php';
}
add_filter( 'template_include', 'myathletik_product_showcase_review_template', 90 );

function myathletik_product_showcase_review_body_class( $classes ) {
	if ( myathletik_product_showcase_preview_enabled() && myathletik_is_product_showcase_review_page() ) {
		$classes[] = 'ma-pl-preview-page';
	}
	return $classes;
}
add_filter( 'body_class', 'myathletik_product_showcase_review_body_class' );

function myathletik_product_showcase_review_sidebar( $layout ) {
	return myathletik_product_showcase_preview_enabled() && myathletik_is_product_showcase_review_page() ? 'no-sidebar' : $layout;
}
add_filter( 'generate_sidebar_layout', 'myathletik_product_showcase_review_sidebar' );

function myathletik_enqueue_product_showcase_review() {
	if ( ! myathletik_product_showcase_preview_enabled() || ! myathletik_is_product_showcase_review_page() ) {
		return;
	}
	$file = '/assets/js/product-library-preview.js';
	wp_enqueue_script( 'myathletik-product-library-preview', get_stylesheet_directory_uri() . $file, array(), filemtime( get_stylesheet_directory() . $file ), true );
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_product_showcase_review', 30 );

function myathletik_product_showcase_review_robots( $robots ) {
	if ( myathletik_is_product_showcase_review_page() ) {
		unset( $robots['index'], $robots['follow'] );
		$robots['noindex']  = true;
		$robots['nofollow'] = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'myathletik_product_showcase_review_robots', 99 );

function myathletik_product_showcase_rank_math_robots( $robots ) {
	if ( myathletik_is_product_showcase_review_page() ) {
		$robots['index']  = 'noindex';
		$robots['follow'] = 'nofollow';
	}
	return $robots;
}
add_filter( 'rank_math/frontend/robots', 'myathletik_product_showcase_rank_math_robots', 99 );

/** Rank Math XML and HTML sitemaps must not advertise review pages. */
function myathletik_product_showcase_review_sitemap_entry( $url, $type, $object ) {
	if ( 'post' === $type && isset( $object->ID ) && '1' === get_post_meta( $object->ID, '_ma_product_showcase_preview', true ) ) {
		return false;
	}
	return $url;
}
add_filter( 'rank_math/sitemap/entry', 'myathletik_product_showcase_review_sitemap_entry', 99, 3 );

function myathletik_product_showcase_core_sitemap_query( $args, $post_type ) {
	if ( 'page' === $post_type ) {
		$review_ids = get_posts( array( 'post_type' => 'page', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_key' => '_ma_product_showcase_preview', 'meta_value' => '1' ) );
		$args['post__not_in'] = array_unique( array_merge( isset( $args['post__not_in'] ) ? $args['post__not_in'] : array(), $review_ids ) );
	}
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'myathletik_product_showcase_core_sitemap_query', 99, 2 );

/** Add a local-only child under Products without modifying stored menu items. */
function myathletik_product_showcase_preview_menu( $items, $args ) {
	if ( ! myathletik_product_showcase_preview_enabled() || empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $items;
	}
	$parent = null;
	foreach ( $items as $item ) {
		if ( myathletik_product_showcase_url() === $item->url ) {
			return $items;
		}
		if ( 'Products' === $item->title && ! $item->menu_item_parent ) {
			$parent = $item;
		}
	}
	if ( ! $parent ) {
		return $items;
	}
	$preview                     = clone $parent;
	$preview->ID                 = -880001;
	$preview->db_id              = 0;
	$preview->object_id          = 0;
	$preview->object             = 'custom';
	$preview->type               = 'custom';
	$preview->type_label         = 'Custom Link';
	$preview->menu_item_parent   = $parent->ID;
	$preview->menu_order         = count( $items ) + 1;
	$preview->title              = 'Product Showcase';
	$preview->post_title         = 'Product Showcase';
	$preview->url                = myathletik_product_showcase_url();
	$preview->target             = '';
	$preview->attr_title         = '';
	$preview->description        = '';
	$preview->classes            = array( 'menu-item', 'menu-item-type-custom', 'ma-pl-menu-item' );
	$preview->current            = myathletik_is_product_showcase_review_page();
	$preview->current_item_parent = false;
	$preview->current_item_ancestor = false;
	if ( $preview->current ) {
		$preview->classes[] = 'current-menu-item';
	}
	$items[] = $preview;
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'myathletik_product_showcase_preview_menu', 99, 2 );
