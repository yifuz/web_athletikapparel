<?php
/**
 * Product Showcase CLI 入口；也可在后台 工具 → Product Showcase 发布。
 *
 * 草稿：wp eval-file wp-content/themes/myathletik-child/scripts/setup-product-showcase.php
 * 发布：wp eval-file wp-content/themes/myathletik-child/scripts/setup-product-showcase.php publish
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) || ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_data' ) || ! function_exists( 'myathletik_product_example_data' ) ) {
	WP_CLI::error( 'Activate the current myathletik-child theme before running this script.' );
}
$arguments = isset( $args ) ? $args : array();
if ( count( $arguments ) > 1 || ( $arguments && 'publish' !== $arguments[0] ) ) {
	WP_CLI::error( 'Usage: wp eval-file scripts/setup-product-showcase.php [publish]' );
}
require_once get_stylesheet_directory() . '/inc/product-showcase-setup.php';
$result = myathletik_product_showcase_setup( ! empty( $arguments ) );
if ( is_wp_error( $result ) ) {
	WP_CLI::error( $result->get_error_message() );
}
foreach ( $result['pages'] as $page ) {
	WP_CLI::line( wp_json_encode( $page ) );
}
WP_CLI::success( $result['changed'] ? 'Product Showcase records prepared. Verify rendered pages and indexing settings before release.' : 'Already current; page content and modification dates unchanged.' );
