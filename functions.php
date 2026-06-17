<?php
/**
 * myathletik Child Theme functions.
 *
 * Code-first GeneratePress child theme for the myathletik.com rebuild.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

/**
 * Enqueue parent + child stylesheets.
 *
 * GeneratePress loads its own styles; we enqueue the child stylesheet
 * after it so our overrides win.
 */
function myathletik_enqueue_styles() {
	$child = wp_get_theme();

	// Parent (GeneratePress) stylesheet.
	wp_enqueue_style(
		'generatepress-style',
		get_template_directory_uri() . '/style.css',
		array(),
		$child->parent() ? $child->parent()->get( 'Version' ) : null
	);

	// Child stylesheet.
	wp_enqueue_style(
		'myathletik-child-style',
		get_stylesheet_uri(),
		array( 'generatepress-style' ),
		$child->get( 'Version' )
	);

	// Optional: extra CSS files from /assets/css can be enqueued here as the
	// project grows, e.g. per-template stylesheets.
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_styles' );

/**
 * Theme supports / setup.
 * Add custom image sizes, menus, etc. here as needed.
 */
function myathletik_setup() {
	// Example placeholders — uncomment/extend when needed:
	// add_image_size( 'ma-card', 600, 400, true );
	// register_nav_menus( array( 'primary' => __( 'Primary Menu', 'myathletik-child' ) ) );
}
add_action( 'after_setup_theme', 'myathletik_setup' );
