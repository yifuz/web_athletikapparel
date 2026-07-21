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

require_once get_stylesheet_directory() . '/inc/product-category-data.php';

/**
 * Image storage has been migrated out of the theme/git repo into the
 * WordPress uploads directory. The on-disk tree is preserved 1:1:
 *   <uploads>/myathletik-theme/assets/images/...  (same structure as before)
 *
 * These helpers expose the new locations, and an output-buffer rewrite keeps
 * the existing theme-relative URLs (get_stylesheet_directory_uri() . '/assets/images/...')
 * working without touching the 16 PHP call sites that hard-code that path.
 */

if ( ! defined( 'MYATHLETIK_IMAGES_SUBDIR' ) ) {
	define( 'MYATHLETIK_IMAGES_SUBDIR', '/myathletik-theme/assets/images' );
}

/**
 * Get the uploads filesystem path to the theme image directory.
 *
 * Use this instead of get_stylesheet_directory() . '/assets/images' when code
 * needs to scan the disk (e.g. glob() over the brand-partner folder).
 *
 * @return string Absolute filesystem path, no trailing slash.
 */
function myathletik_images_dir() {
	$uploads = wp_get_upload_dir();
	return untrailingslashit( $uploads['basedir'] ) . MYATHLETIK_IMAGES_SUBDIR;
}

/**
 * Get the public URL to the theme image directory in uploads.
 *
 * @return string Absolute URL, no trailing slash.
 */
function myathletik_images_uri() {
	$uploads = wp_get_upload_dir();
	return untrailingslashit( $uploads['baseurl'] ) . MYATHLETIK_IMAGES_SUBDIR;
}

/**
 * Rewrite theme-relative image URLs in the final HTML to point at uploads.
 *
 * Images were moved out of the theme (and out of git) into
 * wp-content/uploads/myathletik-theme/assets/images/. Existing PHP still emits
 * URLs like <home>/wp-content/themes/myathletik-child/assets/images/...
 * This buffer swaps that prefix for the uploads URL so no call site needs to
 * change. Scoped to the exact theme + assets/images path to avoid collateral.
 *
 * @param string $buffer Full HTML page output.
 * @return string
 */
function myathletik_rewrite_image_urls( $buffer ) {
	$theme_uri  = get_stylesheet_directory_uri() . '/assets/images/';
	$uploads_uri = myathletik_images_uri() . '/';

	if ( false === strpos( $buffer, $theme_uri ) ) {
		return $buffer;
	}

	return str_replace( $theme_uri, $uploads_uri, $buffer );
}

/**
 * Start the output buffer that rewrites theme image URLs to uploads URLs.
 */
function myathletik_start_image_url_buffer() {
	ob_start( 'myathletik_rewrite_image_urls' );
}
add_action( 'template_redirect', 'myathletik_start_image_url_buffer', 1 );

/**
 * Enqueue parent + child stylesheets.
 *
 * GeneratePress loads its own styles; we enqueue the child stylesheet
 * after it so our overrides win.
 */
function myathletik_enqueue_styles() {
	$child = wp_get_theme();
	$child_style_path = get_stylesheet_directory() . '/style.css';

	// Parent (GeneratePress) stylesheet.
	wp_enqueue_style(
		'generatepress-style',
		get_template_directory_uri() . '/style.css',
		array(),
		$child->parent() ? $child->parent()->get( 'Version' ) : null
	);

	// Heading font: only the weights used in this theme, with display=swap.
	wp_enqueue_style(
		'myathletik-google-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&display=swap',
		array(),
		null
	);

	// Child stylesheet.
	wp_enqueue_style(
		'myathletik-child-style',
		get_stylesheet_uri(),
		array( 'generatepress-style', 'myathletik-google-fonts' ),
		file_exists( $child_style_path ) ? filemtime( $child_style_path ) : $child->get( 'Version' )
	);

	// Optional: extra CSS files from /assets/css can be enqueued here as the
	// project grows, e.g. per-template stylesheets.
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_styles' );

/**
 * Add preconnect hints for Google Fonts.
 *
 * @param array  $urls          Resource hint URLs.
 * @param string $relation_type Hint relation type.
 * @return array
 */
function myathletik_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'myathletik_resource_hints', 10, 2 );

/**
 * Theme supports / setup.
 * Add custom image sizes, menus, etc. here as needed.
 */
function myathletik_setup() {
	$menus = get_registered_nav_menus();

	if ( ! isset( $menus['primary'] ) ) {
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'myathletik-child' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'myathletik_setup', 20 );

/**
 * Use the project logo in the GeneratePress header without relying on a
 * Customizer upload in this local rebuild.
 *
 * @return string Logo URL.
 */
function myathletik_header_logo() {
	return get_stylesheet_directory_uri() . '/assets/images/%E8%BE%85%E5%9B%BE/cropped-ATHLETIK_R_512.jpg';
}
add_filter( 'generate_logo', 'myathletik_header_logo' );

/**
 * Disable the default page-list fallback for the primary navigation.
 * The real menu should be managed in Appearance > Menus.
 *
 * @param array $args WordPress nav menu arguments.
 * @return array
 */
function myathletik_primary_menu_args( $args ) {
	if ( isset( $args['theme_location'] ) && 'primary' === $args['theme_location'] ) {
		$args['fallback_cb'] = false;
	}

	return $args;
}
add_filter( 'wp_nav_menu_args', 'myathletik_primary_menu_args', 20 );

/**
 * Use the public company name in the header/site title during the rebuild.
 *
 * @return string
 */
function myathletik_site_title() {
	return 'Athletik Clothing';
}
add_filter( 'option_blogname', 'myathletik_site_title' );
add_filter( 'generate_logo_title', 'myathletik_site_title' );

/**
 * Render the header site title as a two-tone wordmark.
 *
 * Splits "Athletik Clothing" into a bold dark "Athletik" and a lighter
 * terracotta "Clothing" so the brand name carries visual weight while the
 * category descriptor reads as a refined accent. Keeps the <a> wrapper and
 * microdata-free output that GeneratePress expects.
 *
 * @param string $output Default GeneratePress title HTML.
 * @return string
 */
function myathletik_site_title_markup( $output ) {
	$tag   = ( is_front_page() && is_home() ) ? 'h1' : 'p';
	$href  = esc_url( home_url( '/' ) );

	return sprintf(
		'<%1$s class="main-title ma-brand-title">
			<a href="%2$s" rel="home">
				<span class="ma-brand-title__name">Athletik</span><span class="ma-brand-title__divider" aria-hidden="true"></span><span class="ma-brand-title__desc">Clothing</span>
			</a>
		</%1$s>',
		$tag,
		$href
	);
}
add_filter( 'generate_site_title_output', 'myathletik_site_title_markup', 20 );

/**
 * Seed the WordPress primary menu when no menu has been assigned yet.
 *
 * This keeps navigation managed by the WordPress menu system while removing
 * the GeneratePress page-list fallback from the public header.
 */
function myathletik_ensure_primary_menu() {
	$locations = get_nav_menu_locations();
	$menu_name = 'Main Navigation';

	// If a primary menu location is already assigned, verify it still has the
	// expected items. A previous bug deleted the Products item; detect a
	// broken menu and rebuild it from scratch (once).
	if ( ! empty( $locations['primary'] ) ) {
		$menu_obj = wp_get_nav_menu_object( $locations['primary'] );
		if ( $menu_obj ) {
			$items    = wp_get_nav_menu_items( $menu_obj->term_id );
			$titles   = array();
			if ( ! empty( $items ) ) {
				foreach ( $items as $it ) {
					$titles[] = $it->title;
				}
			}
			// If Products (a core nav item) is missing, the menu is broken — rebuild.
			if ( ! in_array( 'Products', $titles, true ) && ! get_transient( 'myathletik_menu_rebuilt' ) ) {
				// Delete the broken menu and fall through to the fresh-build branch.
				wp_delete_nav_menu( $menu_obj->term_id );
				set_transient( 'myathletik_menu_rebuilt', 1, DAY_IN_SECONDS );
				// Clear location so the build branch reassigns it.
				$locations['primary'] = 0;
			}
		}
	}

	if ( ! empty( $locations['primary'] ) ) {
		return;
	}

	$menu = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		if ( is_wp_error( $menu_id ) ) {
			return;
		}
	} else {
		$menu_id = (int) $menu->term_id;
	}

	if ( ! wp_get_nav_menu_items( $menu_id ) ) {
		$home_item = wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => 'Home',
				'menu-item-url'    => home_url( '/' ),
				'menu-item-status' => 'publish',
			)
		);

		$products_item = wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => 'Products',
				'menu-item-url'    => home_url( '/#ma-home-categories-title' ),
				'menu-item-status' => 'publish',
			)
		);

		$product_children = array(
			'Sportswear'          => '/sportswear-manufacturer/',
			'Underwear'           => '/underwear-manufacturer/',
			'Outdoor Clothing'    => '/outdoor-clothing-manufacturer/',
			'Merino Wool'         => '/merino-wool-manufacturer/',
			'Silk Wear'           => '/silk-wear-manufacturer/',
			'Knitted Fabrics'     => '/knitted-fabrics-manufacturer/',
			'Sports Accessories'  => '/sports-accessories-manufacturer/',
		);

		if ( ! is_wp_error( $products_item ) ) {
			foreach ( $product_children as $title => $url ) {
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'     => $title,
						'menu-item-url'       => home_url( $url ),
						'menu-item-status'    => 'publish',
						'menu-item-parent-id' => (int) $products_item,
					)
				);
			}
		}

		$top_level_items = array(
			'Services'       => '/services/',
			'Sustainability' => '/sustainability/',
			'About'          => '/about-us/',
			'Contact'        => '/contact/',
		);

		foreach ( $top_level_items as $title => $url ) {
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'  => $title,
					'menu-item-url'    => home_url( $url ),
					'menu-item-status' => 'publish',
				)
			);
		}
	}

	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}
add_action( 'init', 'myathletik_ensure_primary_menu', 20 );

/**
 * Force-correct the "Products" nav menu item URL.
 *
 * The Products parent item was originally seeded with /products/, but that
 * page does not exist (no page-products.php template, no seeded page) and
 * would 404. This runs on every init and rewrites any "Products" menu item's
 * _menu_item_url post meta directly — NOT via wp_update_nav_menu_item(), which
 * can wipe other fields when called with a partial args array.
 *
 * Uses a transient so the DB write happens at most once per day.
 */
function myathletik_fix_products_menu_url() {
	if ( get_transient( 'myathletik_products_menu_fixed' ) ) {
		return;
	}

	$target_url = home_url( '/#ma-home-categories-title' );
	$menus      = wp_get_nav_menus();

	if ( empty( $menus ) ) {
		return;
	}

	$changed = false;

	foreach ( $menus as $menu ) {
		$items = wp_get_nav_menu_items( $menu->term_id );

		if ( empty( $items ) ) {
			continue;
		}

		foreach ( $items as $item ) {
			if ( 'Products' === $item->title ) {
				// Directly update the URL post-meta. Safe, surgical, no side effects.
				$current = get_post_meta( $item->db_id, '_menu_item_url', true );
				if ( $current !== $target_url ) {
					update_post_meta( $item->db_id, '_menu_item_url', $target_url );
					$changed = true;
				}
			}
		}
	}

	if ( $changed ) {
		set_transient( 'myathletik_products_menu_fixed', 1, DAY_IN_SECONDS );
	}
}
add_action( 'init', 'myathletik_fix_products_menu_url', 30 );

/**
 * Seed empty WordPress pages for the code-rendered category templates.
 *
 * WordPress only loads page-{slug}.php templates when a matching Page exists.
 * The body is intentionally placeholder-only because page content is rendered
 * from theme templates and user-authored copy will be filled later.
 */
function myathletik_ensure_product_category_pages() {
	$categories = myathletik_product_category_data();

	foreach ( $categories as $slug => $category ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( $page ) {
			continue;
		}

		wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_name'    => $slug,
				'post_title'   => wp_strip_all_tags( $category['h1'] ),
				'post_content' => '[CONTENT: rendered by myathletik-child category template]',
			)
		);
	}
}
add_action( 'init', 'myathletik_ensure_product_category_pages', 30 );

/**
 * Seed the Contact page used by page-contact.php.
 */
function myathletik_ensure_contact_page() {
	if ( get_page_by_path( 'contact', OBJECT, 'page' ) ) {
		return;
	}

	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => 'contact',
			'post_title'   => 'Contact Us',
			'post_content' => '',
		)
	);
}
add_action( 'init', 'myathletik_ensure_contact_page', 35 );

/**
 * Seed the Services page used by page-services.php.
 */
function myathletik_ensure_services_page() {
	if ( get_page_by_path( 'services', OBJECT, 'page' ) ) {
		return;
	}

	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => 'services',
			'post_title'   => 'Our Services',
			'post_content' => '',
		)
	);
}
add_action( 'init', 'myathletik_ensure_services_page', 36 );

/**
 * Seed the About page used by page-about-us.php.
 */
function myathletik_ensure_about_page() {
	if ( get_page_by_path( 'about-us', OBJECT, 'page' ) ) {
		return;
	}

	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => 'about-us',
			'post_title'   => 'About Athletik Clothing',
			'post_content' => '',
		)
	);
}
add_action( 'init', 'myathletik_ensure_about_page', 37 );

/**
 * Seed the Sustainability page used by page-sustainability.php.
 */
function myathletik_ensure_sustainability_page() {
	if ( get_page_by_path( 'sustainability', OBJECT, 'page' ) ) {
		return;
	}

	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => 'sustainability',
			'post_title'   => 'Sustainability',
			'post_content' => '',
		)
	);
}
add_action( 'init', 'myathletik_ensure_sustainability_page', 38 );

// Note: the /sustainabilty/ -> /sustainability/ 301 redirect that used to live
// here was removed on 2026-07-21. Decision: no 301 redirects are being done
// (old site is dead, no inbound equity to preserve). See docs/progress.md
// §"301 redirects — NOT being done".

/**
 * Get category data for the current product category page.
 *
 * @return array|null
 */
function myathletik_get_current_product_category() {
	if ( ! is_page() ) {
		return null;
	}

	$slug = get_post_field( 'post_name', get_queried_object_id() );

	return $slug ? myathletik_get_product_category_data( $slug ) : null;
}

/**
 * Use category-specific document titles for product category pages.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_product_category_document_title( $parts ) {
	$category = myathletik_get_current_product_category();

	if ( $category && ! empty( $category['seo_title'] ) ) {
		$parts['title'] = wp_strip_all_tags( $category['seo_title'] );
		unset( $parts['site'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_product_category_document_title', 20 );

/**
 * Print category-specific meta descriptions for product category pages.
 */
function myathletik_product_category_meta_description() {
	$category = myathletik_get_current_product_category();

	if ( ! $category || empty( $category['meta_description'] ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr( $category['meta_description'] ); ?>">
	<?php
}
add_action( 'wp_head', 'myathletik_product_category_meta_description', 1 );

/**
 * Use service-page-specific document title and meta description.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_services_document_title( $parts ) {
	if ( is_page( 'services' ) ) {
		$parts['title'] = 'OEM/ODM Knitwear Services - Sampling to Shipping | Athletik Clothing';
		unset( $parts['site'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_services_document_title', 25 );

/**
 * Print the Services page meta description.
 */
function myathletik_services_meta_description() {
	if ( ! is_page( 'services' ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr__( 'OEM/ODM knitwear services from sampling and prototyping to bulk production, quality control, export support, and shipping coordination.', 'myathletik-child' ); ?>">
	<?php
}
add_action( 'wp_head', 'myathletik_services_meta_description', 2 );

/**
 * Use about-page-specific document title and meta description.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_about_document_title( $parts ) {
	if ( is_page( 'about-us' ) ) {
		$parts['title'] = 'About Us - Vertically Integrated Knitwear Manufacturer | Athletik Clothing';
		unset( $parts['site'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_about_document_title', 26 );

/**
 * Print the About page meta description.
 */
function myathletik_about_meta_description() {
	if ( ! is_page( 'about-us' ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr__( 'Learn about Athletik Clothing, a vertically integrated OEM/ODM technical knitwear manufacturer in the Zhangjiagang / Suzhou area of China.', 'myathletik-child' ); ?>">
	<?php
}
add_action( 'wp_head', 'myathletik_about_meta_description', 3 );

/**
 * Use sustainability-page-specific document title and meta description.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_sustainability_document_title( $parts ) {
	if ( is_page( 'sustainability' ) ) {
		$parts['title'] = 'Sustainability - Responsible OEM/ODM Knitwear Manufacturing | Athletik Clothing';
		unset( $parts['site'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_sustainability_document_title', 27 );

/**
 * Print the Sustainability page meta description.
 */
function myathletik_sustainability_meta_description() {
	if ( ! is_page( 'sustainability' ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr__( 'Responsible OEM/ODM apparel manufacturing with sustainable fabric options, certified materials, traceability support, in-house testing, and documentation support.', 'myathletik-child' ); ?>">
	<?php
}
add_action( 'wp_head', 'myathletik_sustainability_meta_description', 4 );

/**
 * Add utility actions after the primary menu.
 *
 * Language switching is a front-end placeholder until multilingual routing is
 * added.
 */
function myathletik_header_actions() {
	?>
	<div class="ma-header-actions" aria-label="<?php esc_attr_e( 'Header tools', 'myathletik-child' ); ?>">
		<div class="ma-language-menu">
			<button class="ma-language-toggle" type="button" aria-label="<?php esc_attr_e( 'Language selector placeholder', 'myathletik-child' ); ?>">
				<span>EN</span>
				<span aria-hidden="true">?</span>
			</button>
			<ul class="ma-language-options" aria-label="<?php esc_attr_e( 'Language options placeholder', 'myathletik-child' ); ?>">
				<li><button type="button">AR</button></li>
				<li><button type="button">NL</button></li>
				<li><button type="button">FR</button></li>
				<li><button type="button">DE</button></li>
				<li><button type="button">IT</button></li>
				<li><button type="button">ES</button></li>
			</ul>
		</div>
	</div>
	<?php
}
add_action( 'generate_after_primary_menu', 'myathletik_header_actions', 20 );

/**
 * Replace the default GeneratePress footer with the B2B site footer.
 */
function myathletik_replace_footer() {
	remove_action( 'generate_footer', 'generate_construct_footer_widgets', 5 );
	remove_action( 'generate_footer', 'generate_construct_footer', 10 );

	add_action( 'generate_footer', 'myathletik_site_footer', 10 );
}
add_action( 'after_setup_theme', 'myathletik_replace_footer', 30 );

/**
 * Render the custom footer.
 */
function myathletik_site_footer() {
	$logo_url = myathletik_header_logo();
	?>
	<div class="ma-site-footer">
		<div class="ma-site-footer__inner">
			<div class="ma-site-footer__brand">
				<a class="ma-site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Athletik Clothing home', 'myathletik-child' ); ?>">
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing', 'myathletik-child' ); ?>">
					<span><?php esc_html_e( 'Athletik Clothing', 'myathletik-child' ); ?></span>
				</a>
				<p><?php esc_html_e( 'Technical knitwear OEM/ODM manufacturing partner for underwear, sportswear, outdoor clothing, and performance fabrics.', 'myathletik-child' ); ?></p>
				<ul class="ma-site-footer__social" aria-label="<?php esc_attr_e( 'Social media links', 'myathletik-child' ); ?>">
					<li>
						<a href="https://www.instagram.com/athletikclothinginc/" target="_blank" rel="noopener noreferrer" aria-label="Athletik Clothing on Instagram">
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<rect x="4" y="4" width="16" height="16" rx="5"></rect>
								<circle cx="12" cy="12" r="3.4"></circle>
								<circle cx="16.7" cy="7.3" r="0.8"></circle>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/@athletikclothinginc" target="_blank" rel="noopener noreferrer" aria-label="Athletik Clothing on YouTube">
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<rect x="3" y="6.5" width="18" height="11" rx="3"></rect>
								<path d="M10 9.5v5l4.6-2.5z"></path>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://wa.me/16044049819" target="_blank" rel="noopener noreferrer" aria-label="Athletik Clothing on WhatsApp">
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<path d="M5.1 19l1-3.2a7.3 7.3 0 1 1 2.8 2.6z"></path>
								<path d="M9.4 8.6c.2-.4.4-.4.7-.4h.5c.2 0 .4.1.5.4l.7 1.6c.1.2.1.4-.1.6l-.5.6c.6 1.1 1.4 1.9 2.6 2.5l.6-.7c.2-.2.4-.2.6-.1l1.6.8c.3.1.4.3.4.6v.4c0 .4-.1.7-.4.9-.5.4-1.2.6-1.9.4-3.1-.7-5.4-3-6.2-6.1-.2-.7 0-1.5.4-2.1z"></path>
							</svg>
						</a>
					</li>
				</ul>
			</div>

			<nav class="ma-site-footer__nav" aria-labelledby="ma-footer-services-title">
				<h2 id="ma-footer-services-title"><?php esc_html_e( 'Services', 'myathletik-child' ); ?></h2>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Sample Development', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Custom Apparel Production', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Fabric & Trim Sourcing', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Labels & Packaging', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Bulk Manufacturing', 'myathletik-child' ); ?></a></li>
				</ul>
			</nav>

			<nav class="ma-site-footer__nav" aria-labelledby="ma-footer-company-title">
				<h2 id="ma-footer-company-title"><?php esc_html_e( 'Company', 'myathletik-child' ); ?></h2>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About Us', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/sustainability/' ) ); ?>"><?php esc_html_e( 'Sustainability', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#ma-home-categories-title' ) ); ?>"><?php esc_html_e( 'Products', 'myathletik-child' ); ?></a></li>
					
					<li><a href="<?php echo esc_url( home_url( '/wp-sitemap.xml' ) ); ?>"><?php esc_html_e( 'Sitemap', 'myathletik-child' ); ?></a></li>
				</ul>
			</nav>

			<div class="ma-site-footer__contact">
				<h2><?php esc_html_e( 'Contact', 'myathletik-child' ); ?></h2>
				<ul>
					<li><a href="tel:+8613951139696">86-13951139696</a></li>
					<li><a href="mailto:info@athletik.com.cn">info@athletik.com.cn</a></li>
					<li><?php esc_html_e( 'No.25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu, 215699 China', 'myathletik-child' ); ?></li>
				</ul>
				<a class="ma-site-footer__quote" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?></a>
			</div>
		</div>

		<div class="ma-site-footer__bottom">
			<p>
				<?php
				printf(
					/* translators: %1$s: current year. */
					esc_html__( '? %1$s Athletik Clothing. All rights reserved.', 'myathletik-child' ),
					esc_html( gmdate( 'Y' ) )
				);
				?>
			</p>
		</div>
	</div>
	<?php
}
