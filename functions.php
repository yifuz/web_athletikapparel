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
	$child_style_path = get_stylesheet_directory() . '/style.css';

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
		file_exists( $child_style_path ) ? filemtime( $child_style_path ) : $child->get( 'Version' )
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
 * Seed the WordPress primary menu when no menu has been assigned yet.
 *
 * This keeps navigation managed by the WordPress menu system while removing
 * the GeneratePress page-list fallback from the public header.
 */
function myathletik_ensure_primary_menu() {
	$locations = get_nav_menu_locations();

	if ( ! empty( $locations['primary'] ) ) {
		return;
	}

	$menu_name = 'Main Navigation';
	$menu      = wp_get_nav_menu_object( $menu_name );

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
				'menu-item-url'    => home_url( '/products/' ),
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
				<span aria-hidden="true">⌄</span>
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
				<p><?php esc_html_e( '[CONTENT: user to write short footer company positioning]', 'myathletik-child' ); ?></p>
				<ul class="ma-site-footer__social" aria-label="<?php esc_attr_e( 'Social media links', 'myathletik-child' ); ?>">
					<li>
						<a href="#" aria-label="<?php esc_attr_e( 'Instagram [NEEDS INPUT: Instagram URL]', 'myathletik-child' ); ?>">
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<rect x="4" y="4" width="16" height="16" rx="5"></rect>
								<circle cx="12" cy="12" r="3.4"></circle>
								<circle cx="16.7" cy="7.3" r="0.8"></circle>
							</svg>
						</a>
					</li>
					<li>
						<a href="#" aria-label="<?php esc_attr_e( 'YouTube [NEEDS INPUT: YouTube URL]', 'myathletik-child' ); ?>">
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<rect x="3" y="6.5" width="18" height="11" rx="3"></rect>
								<path d="M10 9.5v5l4.6-2.5z"></path>
							</svg>
						</a>
					</li>
					<li>
						<a href="#" aria-label="<?php esc_attr_e( 'WhatsApp [NEEDS INPUT: WhatsApp URL]', 'myathletik-child' ); ?>">
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
					<li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Products', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'myathletik-child' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/sitemap/' ) ); ?>"><?php esc_html_e( 'Sitemap', 'myathletik-child' ); ?></a></li>
				</ul>
			</nav>

			<div class="ma-site-footer__contact">
				<h2><?php esc_html_e( 'Contact', 'myathletik-child' ); ?></h2>
				<ul>
					<li><?php esc_html_e( '[NEEDS INPUT: WhatsApp / phone number]', 'myathletik-child' ); ?></li>
					<li><?php esc_html_e( '[NEEDS INPUT: business email]', 'myathletik-child' ); ?></li>
					<li><?php esc_html_e( '[NEEDS INPUT: factory / office address]', 'myathletik-child' ); ?></li>
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
