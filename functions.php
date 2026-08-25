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
require_once get_stylesheet_directory() . '/inc/technical-article-data.php';

/**
 * Return the current public garment MOQ per style.
 *
 * Keep this business rule centralized so category, homepage, and services
 * templates cannot drift to different public minimums.
 *
 * @return int MOQ in pieces per style.
 */
function myathletik_public_moq_pieces() {
	return 500;
}

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
 * Preload the responsive editorial cover used above the fold on guide pages.
 */
function myathletik_preload_technical_guide_cover() {
	$image = null;

	if ( is_page( 'technical-guides' ) ) {
		$image = myathletik_technical_guides_hub_data();
	} elseif ( is_page() ) {
		$slug  = get_post_field( 'post_name', get_queried_object_id() );
		$image = $slug ? myathletik_get_technical_article_data( $slug ) : null;
	}

	if ( ! $image || empty( $image['featured_image'] ) || empty( $image['featured_small'] ) ) {
		return;
	}

	$base_url  = myathletik_images_uri() . '/';
	$full_url  = $base_url . ltrim( $image['featured_image'], '/' );
	$small_url = $base_url . ltrim( $image['featured_small'], '/' );
	?>
	<link
		rel="preload"
		as="image"
		href="<?php echo esc_url( $full_url ); ?>"
		imagesrcset="<?php echo esc_attr( $small_url . ' 800w, ' . $full_url . ' ' . $image['featured_width'] . 'w' ); ?>"
		imagesizes="(max-width: 63.99rem) calc(100vw - 3rem), 32rem"
		fetchpriority="high"
	>
	<?php
}
add_action( 'wp_head', 'myathletik_preload_technical_guide_cover', 3 );

/**
 * Preload the responsive Services hero image selected for the current viewport.
 */
function myathletik_preload_services_hero() {
	if ( ! is_page( 'services' ) ) {
		return;
	}

	$base_url = myathletik_images_uri() . '/services/';
	$srcset   = implode(
		', ',
		array(
			$base_url . 'services-production-line-480-lossless.webp 480w',
			$base_url . 'services-production-line-640-lossless.webp 640w',
			$base_url . 'services-production-line-800-lossless.webp 800w',
			$base_url . 'services-production-line-960-lossless.webp 960w',
			$base_url . 'services-production-line-1280-lossless.webp 1280w',
			$base_url . 'services-production-line-1672-lossless.webp 1672w',
		)
	);
	?>
	<link
		rel="preload"
		as="image"
		type="image/webp"
		href="<?php echo esc_url( $base_url . 'services-production-line-1672-lossless.webp' ); ?>"
		imagesrcset="<?php echo esc_attr( $srcset ); ?>"
		imagesizes="100vw"
		fetchpriority="high"
	>
	<?php
}
add_action( 'wp_head', 'myathletik_preload_services_hero', 3 );

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
 * Let this child theme own the child stylesheet enqueue.
 *
 * GeneratePress otherwise enqueues the same style.css as `generate-child`,
 * which duplicates the cache-busted stylesheet registered below.
 */
add_filter( 'generate_load_child_theme_stylesheet', '__return_false' );

/**
 * Enqueue the child stylesheet.
 *
 * GeneratePress owns the parent `generate-style` handle. The dependency keeps
 * the child overrides after the parent without loading the parent's metadata-
 * only style.css or a second copy of the child stylesheet.
 */
function myathletik_enqueue_styles() {
	$child = wp_get_theme();
	$child_style_path = get_stylesheet_directory() . '/style.css';

	// Child stylesheet.
	wp_enqueue_style(
		'myathletik-child-style',
		get_stylesheet_uri(),
		array( 'generate-style' ),
		file_exists( $child_style_path ) ? filemtime( $child_style_path ) : $child->get( 'Version' )
	);

	if ( is_front_page() ) {
		$home_hero_mobile_path = get_stylesheet_directory() . '/assets/css/home-hero-mobile.css';

		wp_enqueue_style(
			'myathletik-home-hero-mobile',
			get_stylesheet_directory_uri() . '/assets/css/home-hero-mobile.css',
			array( 'myathletik-child-style' ),
			file_exists( $home_hero_mobile_path ) ? filemtime( $home_hero_mobile_path ) : $child->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_styles' );

/**
 * Preload the Latin Manrope file used by the above-the-fold heading.
 *
 * The Latin-ext file remains available through unicode-range in style.css and
 * is fetched only when the rendered copy needs those glyphs.
 */
function myathletik_preload_heading_font() {
	$font_path = get_stylesheet_directory() . '/assets/fonts/manrope-latin-600-800.woff2';

	if ( ! file_exists( $font_path ) ) {
		return;
	}
	?>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/fonts/manrope-latin-600-800.woff2' ); ?>" as="font" type="font/woff2" crossorigin>
	<?php
}
add_action( 'wp_head', 'myathletik_preload_heading_font', 2 );

/**
 * Enqueue successful inquiry tracking wherever form 3 is rendered.
 *
 * The event is emitted only after Fluent Forms confirms that form 3 was
 * accepted. Site Kit supplies the Google tag; this script adds the GA4
 * recommended generate_lead event without embedding a measurement ID.
 */
function myathletik_enqueue_inquiry_tracking() {
	$page_slug                = is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '';
	$is_product_category_page = $page_slug && myathletik_get_product_category_data( $page_slug );

	if ( ! is_front_page() && ! is_page( 'contact' ) && ! $is_product_category_page ) {
		return;
	}

	$script_path = get_stylesheet_directory() . '/assets/js/inquiry-tracking.js';

	if ( ! file_exists( $script_path ) ) {
		return;
	}

	wp_enqueue_script(
		'myathletik-inquiry-tracking',
		get_stylesheet_directory_uri() . '/assets/js/inquiry-tracking.js',
		array( 'jquery' ),
		filemtime( $script_path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_inquiry_tracking' );

/**
 * Track deliberate email and WhatsApp contact clicks as secondary GA4 events.
 *
 * These events are diagnostic only. A successful form submission remains the
 * sole generate_lead event and the only website action intended to be used as
 * a primary Google Ads conversion.
 */
function myathletik_enqueue_contact_tracking() {
	$script_path = get_stylesheet_directory() . '/assets/js/contact-tracking.js';

	if ( ! file_exists( $script_path ) ) {
		return;
	}

	wp_enqueue_script(
		'myathletik-contact-tracking',
		get_stylesheet_directory_uri() . '/assets/js/contact-tracking.js',
		array(),
		filemtime( $script_path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_contact_tracking' );

/**
 * Preserve paid-campaign attribution while visitors move between site pages.
 *
 * The inquiry form is not embedded on every landing page, so the first landing
 * page and campaign parameters need to survive the trip to the contact form.
 * Session storage keeps the data limited to the current browser tab/session.
 */
function myathletik_enqueue_attribution_tracking() {
	$script_path = get_stylesheet_directory() . '/assets/js/attribution-tracking.js';

	if ( ! file_exists( $script_path ) ) {
		return;
	}

	wp_enqueue_script(
		'myathletik-attribution-tracking',
		get_stylesheet_directory_uri() . '/assets/js/attribution-tracking.js',
		array(),
		filemtime( $script_path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_attribution_tracking' );

/**
 * Load the Cookiebot consent-settings control when a CBID is configured.
 */
function myathletik_enqueue_consent_controls() {
	if ( ! get_option( 'cookiebot-cbid' ) ) {
		return;
	}

	$script_path = get_stylesheet_directory() . '/assets/js/consent-controls.js';

	if ( ! file_exists( $script_path ) ) {
		return;
	}

	wp_enqueue_script(
		'myathletik-consent-controls',
		get_stylesheet_directory_uri() . '/assets/js/consent-controls.js',
		array(),
		(string) filemtime( $script_path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'myathletik_enqueue_consent_controls' );

/**
 * Add campaign attribution to Fluent Forms inquiry submissions.
 *
 * Fluent Forms removes inputs that are not part of its stored form model. This
 * filter runs after that cleanup and restores only the allowlisted attribution
 * fields after applying server-side sanitization and length limits.
 *
 * @param array $form_data Submitted form values accepted by Fluent Forms.
 * @param int   $form_id   Fluent Forms form ID.
 * @return array
 */
function myathletik_add_inquiry_attribution( $form_data, $form_id ) {
	if ( 3 !== (int) $form_id ) {
		return $form_data;
	}

	$raw_data = array();

	if ( function_exists( 'wpFluentForm' ) ) {
		$request_data = wpFluentForm( 'request' )->get( 'data' );

		if ( is_array( $request_data ) ) {
			$raw_data = $request_data;
		}
	}

	if ( empty( $raw_data ) && isset( $_POST['data'] ) && is_string( $_POST['data'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing -- Fluent Forms validates the submission before this filter runs.
		parse_str( wp_unslash( $_POST['data'] ), $raw_data ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
	}

	$text_fields = array(
		'ma_utm_source',
		'ma_utm_medium',
		'ma_utm_campaign',
		'ma_utm_content',
		'ma_utm_term',
		'ma_gclid',
	);

	foreach ( $text_fields as $field_name ) {
		if ( ! isset( $raw_data[ $field_name ] ) || is_array( $raw_data[ $field_name ] ) ) {
			continue;
		}

		$value = sanitize_text_field( $raw_data[ $field_name ] );
		$value = function_exists( 'mb_substr' ) ? mb_substr( $value, 0, 255 ) : substr( $value, 0, 255 );

		if ( '' !== $value ) {
			$form_data[ $field_name ] = $value;
		}
	}

	$url_fields = array(
		'ma_first_landing_page',
		'ma_original_referrer',
	);

	foreach ( $url_fields as $field_name ) {
		if ( ! isset( $raw_data[ $field_name ] ) || is_array( $raw_data[ $field_name ] ) ) {
			continue;
		}

		$value = esc_url_raw( $raw_data[ $field_name ] );
		$value = function_exists( 'mb_substr' ) ? mb_substr( $value, 0, 2048 ) : substr( $value, 0, 2048 );

		if ( '' !== $value ) {
			$form_data[ $field_name ] = $value;
		}
	}

	return $form_data;
}
add_filter( 'fluentform/insert_response_data', 'myathletik_add_inquiry_attribution', 10, 2 );

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
 * Reserve the source logo's square aspect ratio before CSS is available.
 *
 * @param array $attributes GeneratePress logo image attributes.
 * @return array
 */
function myathletik_header_logo_attributes( $attributes ) {
	$attributes['width']  = 512;
	$attributes['height'] = 512;

	return $attributes;
}
add_filter( 'generate_logo_attributes', 'myathletik_header_logo_attributes' );

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
 * microdata-free output that GeneratePress expects. The wordmark uses a
 * paragraph so the page hero remains the homepage's single H1.
 *
 * @param string $output Default GeneratePress title HTML.
 * @return string
 */
function myathletik_site_title_markup( $output ) {
	$href = esc_url( home_url( '/' ) );

	return sprintf(
		'<p class="main-title ma-brand-title">
			<a href="%1$s" rel="home">
				<span class="ma-brand-title__name">Athletik</span><span class="ma-brand-title__divider" aria-hidden="true"></span><span class="ma-brand-title__desc">Clothing</span>
			</a>
		</p>',
		$href
	);
}
add_filter( 'generate_site_title_output', 'myathletik_site_title_markup', 20 );

/**
 * Build a site-relative URL using the scheme from the 'home' option, not is_ssl().
 *
 * Under LocalWP, nginx terminates SSL so is_ssl() returns true even though the
 * site's siteurl/home option is http. WordPress' home_url() honors is_ssl(),
 * which would emit https URLs that trigger a browser cert warning on the local
 * self-signed cert. This helper keeps the scheme consistent with the 'home'
 * option (http locally, https in production with a real cert) so menu items
 * and other absolute URLs stay uniform.
 *
 * Use only for URLs stored durably (nav menu item URLs). For runtime hrefs
 * that the browser resolves immediately, home_url() is fine.
 *
 * @param string $path Path starting with '/', e.g. '/contact/'.
 * @return string Absolute URL.
 */
function myathletik_home_url( $path = '/' ) {
	$home = untrailingslashit( get_option( 'home' ) );
	$path = '/' . ltrim( $path, '/' );
	return $home . $path;
}

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
				'menu-item-url'    => myathletik_home_url( '/' ),
				'menu-item-status' => 'publish',
			)
		);

		$products_item = wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => 'Products',
				'menu-item-url'    => myathletik_home_url( '/#ma-home-categories-title' ),
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
						'menu-item-url'       => myathletik_home_url( $url ),
						'menu-item-status'    => 'publish',
						'menu-item-parent-id' => (int) $products_item,
					)
				);
			}
		}

		$top_level_items = array(
			'Services'       => '/services/',
			'Guides'         => '/technical-guides/',
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
 * Normalize an internal menu URL for scheme-independent path comparison.
 *
 * @param string $url Menu item URL.
 * @return string Normalized path without a trailing slash.
 */
function myathletik_menu_url_path( $url ) {
	$path = wp_parse_url( $url, PHP_URL_PATH );

	if ( ! is_string( $path ) || '' === $path ) {
		return '/';
	}

	return '/' . trim( $path, '/' );
}

/**
 * Keep Guides available while preserving Contact as the final priority CTA.
 *
 * Existing installations already have an assigned menu. New items are added
 * without rebuilding that menu, then Guides and Contact are moved to the final
 * two top-level positions so the existing last-item CTA styling always belongs
 * to Contact.
 */
function myathletik_ensure_technical_guides_menu_item() {
	$locations = get_nav_menu_locations();

	if ( empty( $locations['primary'] ) ) {
		return;
	}

	$menu = wp_get_nav_menu_object( $locations['primary'] );

	if ( ! $menu ) {
		return;
	}

	$guides_url   = myathletik_home_url( '/technical-guides/' );
	$contact_url  = myathletik_home_url( '/contact/' );
	$guides_path  = myathletik_menu_url_path( $guides_url );
	$contact_path = myathletik_menu_url_path( $contact_url );
	$items         = wp_get_nav_menu_items( $menu->term_id );
	$items         = is_array( $items ) ? $items : array();
	$guides_item   = null;
	$contact_item  = null;

	foreach ( $items as $item ) {
		if ( 0 !== (int) $item->menu_item_parent ) {
			continue;
		}

		$item_path = myathletik_menu_url_path( $item->url );

		if ( $guides_path === $item_path ) {
			$guides_item = $item;
		} elseif ( $contact_path === $item_path ) {
			$contact_item = $item;
		}
	}

	if ( ! $guides_item ) {
		wp_update_nav_menu_item(
			$menu->term_id,
			0,
			array(
				'menu-item-title'  => 'Guides',
				'menu-item-url'    => $guides_url,
				'menu-item-status' => 'publish',
			)
		);
	}

	if ( ! $contact_item ) {
		wp_update_nav_menu_item(
			$menu->term_id,
			0,
			array(
				'menu-item-title'  => 'Contact',
				'menu-item-url'    => $contact_url,
				'menu-item-status' => 'publish',
			)
		);
	}

	$items        = wp_get_nav_menu_items( $menu->term_id );
	$items        = is_array( $items ) ? $items : array();
	$matched      = array(
		$guides_path => array(),
		$contact_path => array(),
	);

	foreach ( $items as $item ) {
		if ( 0 !== (int) $item->menu_item_parent ) {
			continue;
		}

		$item_path = myathletik_menu_url_path( $item->url );

		if ( isset( $matched[ $item_path ] ) ) {
			$matched[ $item_path ][] = $item;
		}
	}

	foreach ( $matched as $duplicates ) {
		if ( count( $duplicates ) < 2 ) {
			continue;
		}

		usort(
			$duplicates,
			static function ( $first, $second ) {
				return (int) $first->ID <=> (int) $second->ID;
			}
		);

		// Preserve the oldest item and remove later duplicates created by a
		// production HTTP-to-HTTPS menu mismatch.
		array_shift( $duplicates );

		foreach ( $duplicates as $duplicate ) {
			wp_delete_post( (int) $duplicate->ID, true );
		}
	}

	$items        = wp_get_nav_menu_items( $menu->term_id );
	$items        = is_array( $items ) ? $items : array();
	$top_level    = array();
	$guides_item  = null;
	$contact_item = null;
	$max_order    = 0;

	foreach ( $items as $item ) {
		$max_order = max( $max_order, (int) $item->menu_order );

		if ( 0 !== (int) $item->menu_item_parent ) {
			continue;
		}

		$top_level[] = $item;
		$item_path   = myathletik_menu_url_path( $item->url );

		if ( $guides_path === $item_path ) {
			$guides_item = $item;
		} elseif ( $contact_path === $item_path ) {
			$contact_item = $item;
		}
	}

	if ( ! $guides_item || ! $contact_item || count( $top_level ) < 2 ) {
		return;
	}

	$last_item        = $top_level[ count( $top_level ) - 1 ];
	$penultimate_item = $top_level[ count( $top_level ) - 2 ];

	if ( (int) $contact_item->ID === (int) $last_item->ID && (int) $guides_item->ID === (int) $penultimate_item->ID ) {
		return;
	}

	wp_update_post(
		array(
			'ID'         => (int) $guides_item->ID,
			'menu_order' => $max_order + 1,
		)
	);

	wp_update_post(
		array(
			'ID'         => (int) $contact_item->ID,
			'menu_order' => $max_order + 2,
		)
	);
}
add_action( 'init', 'myathletik_ensure_technical_guides_menu_item', 21 );

/**
 * Force-correct the "Products" nav menu item URL.
 *
 * The Products parent item was originally seeded with /products/, but that
 * page does not exist (no page-products.php template, no seeded page) and
 * would 404. This runs on every init and rewrites any "Products" menu item's
 * _menu_item_url post meta directly — NOT via wp_update_nav_menu_item(), which
 * can wipe other fields when called with a partial args array.
 *
 * Scheme note: home_url() honors is_ssl(), which returns true under LocalWP
 * (nginx terminates SSL even though the site's siteurl/home option is http).
 * That would write an https URL into the Products item while sibling items
 * stay http — clicking Products then triggers a browser cert warning on the
 * self-signed local cert. We derive the scheme from the 'home' option instead,
 * so local (http) and production (https with a real cert) both stay consistent
 * with the rest of the menu.
 *
 * Uses a transient so the DB write happens at most once per day.
 */
function myathletik_fix_products_menu_url() {
	if ( get_transient( 'myathletik_products_menu_fixed' ) ) {
		return;
	}

	// Build the target URL with the scheme from the 'home' option, not is_ssl().
	$home_option = trailingslashit( get_option( 'home' ) );
	$target_url  = $home_option . '#ma-home-categories-title';
	$menus       = wp_get_nav_menus();

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

/**
 * Seed every owner-approved, code-rendered technical article page.
 */
function myathletik_ensure_technical_article_pages() {
	foreach ( myathletik_get_published_technical_articles() as $slug => $article ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page ) {
			$page_id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_name'    => $slug,
					'post_title'   => wp_strip_all_tags( $article['title'] ),
					'post_content' => '[Theme-rendered technical article]',
				),
				true
			);

			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		} else {
			$page_id = $page->ID;
		}

		update_post_meta( $page_id, 'rank_math_title', $article['seo_title'] );
		update_post_meta( $page_id, 'rank_math_description', $article['meta_description'] );
	}
}
add_action( 'init', 'myathletik_ensure_technical_article_pages', 39 );

/**
 * Seed the code-rendered Technical Guides content centre.
 */
function myathletik_ensure_technical_guides_page() {
	$slug = 'technical-guides';
	$hub  = myathletik_technical_guides_hub_data();

	if ( get_page_by_path( $slug, OBJECT, 'page' ) ) {
		return;
	}

	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => $slug,
			'post_title'   => wp_strip_all_tags( $hub['title'] ),
			'post_content' => '[Theme-rendered technical guides hub]',
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		return;
	}

	update_post_meta( $page_id, 'rank_math_title', $hub['seo_title'] );
	update_post_meta( $page_id, 'rank_math_description', $hub['meta_description'] );
}
add_action( 'init', 'myathletik_ensure_technical_guides_page', 40 );

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
 * Use the approved title for code-rendered technical articles.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_technical_article_document_title( $parts ) {
	if ( ! is_page() ) {
		return $parts;
	}

	$slug    = get_post_field( 'post_name', get_queried_object_id() );
	$article = $slug ? myathletik_get_technical_article_data( $slug ) : null;

	if ( $article && ! empty( $article['seo_title'] ) ) {
		$parts['title'] = wp_strip_all_tags( $article['seo_title'] );
		unset( $parts['site'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_technical_article_document_title', 24 );

/**
 * Use the approved title for the Technical Guides hub.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_technical_guides_document_title( $parts ) {
	if ( is_page( 'technical-guides' ) ) {
		$hub            = myathletik_technical_guides_hub_data();
		$parts['title'] = wp_strip_all_tags( $hub['seo_title'] );
		unset( $parts['site'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_technical_guides_document_title', 25 );

/**
 * Use the service-page-specific document title.
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
 * Use the about-page-specific document title.
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
 * Use homepage-specific document title.
 *
 * @param array $parts Document title parts.
 * @return array
 */
function myathletik_home_document_title( $parts ) {
	if ( is_front_page() ) {
		$parts['title'] = 'Technical Knitwear Manufacturer | Athletik Clothing';
		unset( $parts['site'] );
		unset( $parts['tagline'] );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'myathletik_home_document_title', 28 );

/**
 * Override the final homepage <title> after SEO plugins (e.g. Rank Math,
 * which hooks pre_get_document_title earlier) have run.
 *
 * @param string $title Document title.
 * @return string
 */
function myathletik_home_title_final( $title ) {
	if ( is_front_page() ) {
		return 'Technical Knitwear Manufacturer | Athletik Clothing';
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'myathletik_home_title_final', 99 );

/**
 * Print the homepage meta description.
 *
 * This hardcoded string is the homepage description truth source; keep it in
 * sync with seo-tags.md (Home section). The Rank Math description field for
 * the homepage is intentionally left empty so Rank Math does not print a
 * second, conflicting tag (verified: exactly one meta description in output).
 */
function myathletik_home_meta_description() {
	if ( ! is_front_page() ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr__( 'Vertically integrated OEM manufacturer of FLATLOCK & ACTIVESEAM knitwear — underwear, sportswear & outdoor for global brands. 15+ years. Request a quote.', 'myathletik-child' ); ?>">
	<?php
}
add_action( 'wp_head', 'myathletik_home_meta_description', 2 );

/**
 * Use the sustainability-page-specific document title.
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
 * Return a real 404 for the unused, empty default post category.
 *
 * WordPress otherwise renders the empty archive as a 200 "Nothing Found"
 * response. Keep the rule limited to the default slug and only while it has no
 * posts, so future populated categories are unaffected.
 */
function myathletik_404_empty_uncategorized_archive() {
	if ( ! is_category( 'uncategorized' ) ) {
		return;
	}

	$category = get_queried_object();

	if ( ! $category instanceof WP_Term || 0 < (int) $category->count ) {
		return;
	}

	global $wp_query;

	if ( ! $wp_query instanceof WP_Query ) {
		return;
	}

	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
}
add_action( 'template_redirect', 'myathletik_404_empty_uncategorized_archive', 0 );

/**
 * Render the shared social links used by the homepage header and site footer.
 *
 * @param string $context     Visual context used for modifier classes.
 * @param bool   $show_labels Whether to show the platform names.
 */
function myathletik_social_links( $context = 'footer', $show_labels = false ) {
	$context = sanitize_html_class( $context );
	$classes = array( 'ma-social-links', 'ma-social-links--' . $context );

	if ( 'footer' === $context ) {
		$classes[] = 'ma-site-footer__social';
	}

	$links = array(
		'linkedin'  => array(
			'label'      => __( 'LinkedIn', 'myathletik-child' ),
			'aria_label' => __( 'Athletik Clothing on LinkedIn', 'myathletik-child' ),
			'url'        => 'https://www.linkedin.com/company/athletik-apparel',
		),
		'instagram' => array(
			'label'      => __( 'Instagram', 'myathletik-child' ),
			'aria_label' => __( 'Athletik Clothing on Instagram', 'myathletik-child' ),
			'url'        => 'https://www.instagram.com/athletikclothinginc/',
		),
		'youtube'   => array(
			'label'      => __( 'YouTube', 'myathletik-child' ),
			'aria_label' => __( 'Athletik Clothing on YouTube', 'myathletik-child' ),
			'url'        => 'https://www.youtube.com/@athletikclothinginc',
		),
		'whatsapp'  => array(
			'label'      => __( 'WhatsApp', 'myathletik-child' ),
			'aria_label' => __( 'Athletik Clothing on WhatsApp', 'myathletik-child' ),
			'url'        => 'https://wa.me/16044049819',
		),
	);
	?>
	<ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" aria-label="<?php esc_attr_e( 'Social media links', 'myathletik-child' ); ?>">
		<?php foreach ( $links as $platform => $link ) : ?>
			<li>
				<a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $link['aria_label'] ); ?>">
					<?php if ( 'linkedin' === $platform ) : ?>
						<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<path d="M5.4 8.7H2.3V19h3.1V8.7zM3.8 3.5a1.8 1.8 0 1 0 0 3.6 1.8 1.8 0 0 0 0-3.6zM10.4 8.7H7.5V19h3.1v-5.1c0-1.4.3-2.7 2-2.7 1.7 0 1.7 1.6 1.7 2.8v5h3.1v-5.6c0-2.8-.6-4.9-3.8-4.9-1.5 0-2.6.8-3 1.6h-.1V8.7z"></path>
						</svg>
					<?php elseif ( 'instagram' === $platform ) : ?>
						<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<rect x="4" y="4" width="16" height="16" rx="5"></rect>
							<circle cx="12" cy="12" r="3.4"></circle>
							<circle cx="16.7" cy="7.3" r="0.8"></circle>
						</svg>
					<?php elseif ( 'youtube' === $platform ) : ?>
						<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<rect x="3" y="6.5" width="18" height="11" rx="3"></rect>
							<path d="M10 9.5v5l4.6-2.5z"></path>
						</svg>
					<?php else : ?>
						<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<path d="M5.1 19l1-3.2a7.3 7.3 0 1 1 2.8 2.6z"></path>
							<path d="M9.4 8.6c.2-.4.4-.4.7-.4h.5c.2 0 .4.1.5.4l.7 1.6c.1.2.1.4-.1.6l-.5.6c.6 1.1 1.4 1.9 2.6 2.5l.6-.7c.2-.2.4-.2.6-.1l1.6.8c.3.1.4.3.4.6v.4c0 .4-.1.7-.4.9-.5.4-1.2.6-1.9.4-3.1-.7-5.4-3-6.2-6.1-.2-.7 0-1.5.4-2.1z"></path>
						</svg>
					<?php endif; ?>
					<?php if ( $show_labels ) : ?>
						<span><?php echo esc_html( $link['label'] ); ?></span>
					<?php endif; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Give social channels a prominent, homepage-only entry below the site header.
 */
function myathletik_home_social_bar() {
	if ( ! is_front_page() ) {
		return;
	}
	?>
	<nav class="ma-home-social-bar" aria-label="<?php esc_attr_e( 'Connect with Athletik Clothing', 'myathletik-child' ); ?>">
		<div class="ma-home-social-bar__inner">
			<span class="ma-home-social-bar__prompt"><?php esc_html_e( 'Follow Athletik Clothing', 'myathletik-child' ); ?></span>
			<?php myathletik_social_links( 'header', true ); ?>
		</div>
	</nav>
	<?php
}
add_action( 'generate_after_header', 'myathletik_home_social_bar', 15 );

/**
 * Add utility actions after the primary menu.
 *
 * Language switching is a front-end placeholder until multilingual routing is
 * added. Decision 2026-07-21: go live EN-only, so the switcher is hidden
 * (returns early). Re-enable by removing the early return once Polylang or
 * another multilingual setup is in place.
 */
function myathletik_header_actions() {
	return; // EN-only launch: language switcher hidden (2026-07-21).
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
 * Render a short privacy notice beside an inquiry form.
 *
 * WordPress returns no public Privacy Policy URL while the assigned page is
 * still a draft, so the notice appears only after the policy is published.
 */
function myathletik_inquiry_privacy_notice() {
	$privacy_policy_url = get_privacy_policy_url();

	if ( ! $privacy_policy_url ) {
		return;
	}
	?>
	<p class="ma-inquiry-form__note">
		<?php esc_html_e( 'We use the information you provide to respond to your inquiry.', 'myathletik-child' ); ?>
		<a href="<?php echo esc_url( $privacy_policy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'myathletik-child' ); ?></a>
	</p>
	<?php
}

/**
 * Render the custom footer.
 */
function myathletik_site_footer() {
	$logo_url             = myathletik_header_logo();
	$privacy_policy_url   = get_privacy_policy_url();
	$cookiebot_configured = (bool) get_option( 'cookiebot-cbid' );
	?>
	<div class="ma-site-footer">
		<div class="ma-site-footer__inner">
			<div class="ma-site-footer__brand">
				<a class="ma-site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Athletik Clothing home', 'myathletik-child' ); ?>">
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing', 'myathletik-child' ); ?>" width="512" height="512">
					<span><?php esc_html_e( 'Athletik Clothing', 'myathletik-child' ); ?></span>
				</a>
				<p><?php esc_html_e( 'Technical knitwear OEM/ODM manufacturer.', 'myathletik-child' ); ?></p>
				<?php myathletik_social_links( 'footer', true ); ?>
			</div>

			<nav class="ma-site-footer__nav" aria-labelledby="ma-footer-company-title">
				<h2 id="ma-footer-company-title"><?php esc_html_e( 'Company', 'myathletik-child' ); ?></h2>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About Us', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/sustainability/' ) ); ?>"><?php esc_html_e( 'Sustainability', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#ma-home-categories-title' ) ); ?>"><?php esc_html_e( 'Products', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/technical-guides/' ) ); ?>"><?php esc_html_e( 'Technical Guides', 'myathletik-child' ); ?></a></li>
					<?php if ( $privacy_policy_url ) : ?>
						<li><a href="<?php echo esc_url( $privacy_policy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'myathletik-child' ); ?></a></li>
					<?php endif; ?>
					<?php if ( $cookiebot_configured ) : ?>
						<li><a href="#cookie-settings" data-cookie-settings><?php esc_html_e( 'Cookie Settings', 'myathletik-child' ); ?></a></li>
					<?php endif; ?>
					<li><a href="<?php echo esc_url( home_url( '/wp-sitemap.xml' ) ); ?>"><?php esc_html_e( 'Sitemap', 'myathletik-child' ); ?></a></li>
				</ul>
			</nav>

			<div class="ma-site-footer__contact">
				<h2><?php esc_html_e( 'Contact', 'myathletik-child' ); ?></h2>
				<ul>
					<li><a href="tel:+8613951139696">86-13951139696</a></li>
					<li><a href="mailto:info@athletikapparel.com">info@athletikapparel.com</a></li>
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
					esc_html__( '© %1$s Athletik Clothing. All rights reserved.', 'myathletik-child' ),
					esc_html( gmdate( 'Y' ) )
				);
				?>
			</p>
		</div>
	</div>
	<?php
}
