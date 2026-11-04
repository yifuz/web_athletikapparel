<?php
/** Product Showcase routing and SEO. Pages are created explicitly via admin tools or CLI. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Resolve only pages owned by this feature, using the full hierarchy. */
function myathletik_product_showcase_page( $key = '' ) {
	$hub = myathletik_product_showcase_data();
	$path = $hub['slug'];
	if ( '' !== $key ) {
		$products = myathletik_product_example_data();
		if ( ! isset( $products[ $key ] ) ) {
			return null;
		}
		$path .= '/' . $products[ $key ]['slug'];
	}
	$page = get_page_by_path( $path, OBJECT, 'page' );
	return $page && '1' === get_post_meta( $page->ID, '_ma_product_showcase', true )
		&& $key === get_post_meta( $page->ID, '_ma_product_example_key', true ) ? $page : null;
}

function myathletik_product_showcase_is_public( $page ) {
	return $page && 'publish' === $page->post_status && '' === $page->post_password;
}

function myathletik_product_showcase_enabled() {
	return myathletik_product_showcase_is_public( myathletik_product_showcase_page() );
}

/** Never expose unpublished, password-protected or missing examples in cards. */
function myathletik_product_showcase_products() {
	if ( ! myathletik_product_showcase_enabled() ) {
		return array();
	}
	return array_filter( myathletik_product_example_data(), function ( $key ) {
		return myathletik_product_showcase_is_public( myathletik_product_showcase_page( $key ) );
	}, ARRAY_FILTER_USE_KEY );
}

function myathletik_product_showcase_url() {
	$page = myathletik_product_showcase_page();
	return myathletik_product_showcase_is_public( $page ) ? get_permalink( $page ) : '';
}

function myathletik_product_example_url( $key ) {
	$page = myathletik_product_showcase_page( $key );
	return myathletik_product_showcase_enabled() && myathletik_product_showcase_is_public( $page ) ? get_permalink( $page ) : '';
}

/** null = unrelated page; empty string = hub; otherwise a valid product key. */
function myathletik_product_showcase_current_key() {
	if ( ! is_page() ) {
		return null;
	}
	$id = get_queried_object_id();
	$key = get_post_meta( $id, '_ma_product_example_key', true );
	$page = myathletik_product_showcase_page( $key );
	return myathletik_product_showcase_enabled() && myathletik_product_showcase_is_public( $page ) && $id === $page->ID ? $key : null;
}

/** A marked page is public only at its configured route, under a public hub. */
function myathletik_product_showcase_valid_page_id( $id ) {
	$key = get_post_meta( $id, '_ma_product_example_key', true );
	$page = myathletik_product_showcase_page( $key );
	return myathletik_product_showcase_enabled() && myathletik_product_showcase_is_public( $page ) && (int) $id === (int) $page->ID;
}

/** Non-production pages must stay out of search; production respects WP settings. */
function myathletik_product_showcase_indexing_allowed() {
	return 'production' === wp_get_environment_type() && (bool) get_option( 'blog_public' );
}

add_action( 'template_redirect', function () {
	$id = get_queried_object_id();
	if ( is_page() && '1' === get_post_meta( $id, '_ma_product_showcase', true ) && ! myathletik_product_showcase_valid_page_id( $id ) ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		header( 'X-Robots-Tag: noindex', true );
		nocache_headers();
		return;
	}
	if ( null !== myathletik_product_showcase_current_key() && ! myathletik_product_showcase_indexing_allowed() ) {
		header( 'X-Robots-Tag: noindex, follow', true );
		nocache_headers();
	}
}, 0 );

add_filter( 'template_include', function ( $template ) {
	$key = myathletik_product_showcase_current_key();
	if ( null === $key ) {
		return $template;
	}
	set_query_var( 'ma_product_example_key', $key );
	return get_stylesheet_directory() . ( '' === $key ? '/templates/product-showcase.php' : '/templates/product-example.php' );
}, 90 );

add_filter( 'body_class', function ( $classes ) {
	if ( null !== myathletik_product_showcase_current_key() ) {
		$classes[] = 'ma-pl-page';
	}
	return $classes;
} );
add_filter( 'generate_sidebar_layout', function ( $layout ) {
	return null !== myathletik_product_showcase_current_key() ? 'no-sidebar' : $layout;
} );

add_action( 'wp_enqueue_scripts', function () {
	if ( null !== myathletik_product_showcase_current_key() ) {
		$file = '/assets/js/product-showcase.js';
		wp_enqueue_script( 'myathletik-product-showcase', get_stylesheet_directory_uri() . $file, array(), filemtime( get_stylesheet_directory() . $file ), true );
	}
}, 30 );

add_filter( 'wp_robots', function ( $robots ) {
	if ( null !== myathletik_product_showcase_current_key() && ! myathletik_product_showcase_indexing_allowed() ) {
		unset( $robots['index'] );
		$robots['noindex'] = true;
	}
	return $robots;
}, 99 );
add_filter( 'rank_math/frontend/robots', function ( $robots ) {
	if ( null !== myathletik_product_showcase_current_key() && ! myathletik_product_showcase_indexing_allowed() ) {
		$robots['index'] = 'noindex';
	}
	return $robots;
}, 99 );
add_filter( 'rank_math/sitemap/entry', function ( $url, $type, $object ) {
	if ( 'post' === $type && isset( $object->ID ) && '1' === get_post_meta( $object->ID, '_ma_product_showcase', true ) && ( ! myathletik_product_showcase_indexing_allowed() || ! myathletik_product_showcase_valid_page_id( $object->ID ) ) ) {
		return false;
	}
	return $url;
}, 99, 3 );
add_filter( 'wp_sitemaps_posts_query_args', function ( $args, $type ) {
	if ( 'page' === $type ) {
		$ids = get_posts( array( 'post_type' => 'page', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_key' => '_ma_product_showcase', 'meta_value' => '1' ) );
		$ids = array_filter( $ids, function ( $id ) {
			return ! myathletik_product_showcase_indexing_allowed() || ! myathletik_product_showcase_valid_page_id( $id );
		} );
		$args['post__not_in'] = array_unique( array_merge( $args['post__not_in'] ?? array(), $ids ) );
	}
	return $args;
}, 99, 2 );

/** Metadata is stored by the setup script; canonical follows the real WP URL. */
add_filter( 'rank_math/frontend/canonical', function ( $canonical ) {
	return null !== myathletik_product_showcase_current_key() ? get_permalink( get_queried_object_id() ) : $canonical;
}, 99 );
add_filter( 'rank_math/opengraph/facebook/og_type', function ( $type ) {
	return null !== myathletik_product_showcase_current_key() ? 'website' : $type;
}, 99 );

/** Upload assets are code-managed files, not WordPress attachment IDs. */
function myathletik_product_showcase_social_image( $image ) {
	$key = myathletik_product_showcase_current_key();
	if ( null === $key ) {
		return $image;
	}
	$products = myathletik_product_example_data();
	$record = '' === $key ? myathletik_product_showcase_data() : $products[ $key ];
	$prefix = get_stylesheet_directory_uri() . '/assets/images/';
	$relative = substr( $record['social_image'], strlen( $prefix ) );
	$path = myathletik_images_dir() . '/' . $relative;
	$size = is_readable( $path ) ? getimagesize( $path ) : false;
	if ( ! $size ) {
		return $image;
	}
	return array( 'url' => myathletik_images_uri() . '/' . $relative,
		'width' => $size[0], 'height' => $size[1], 'type' => $size['mime'],
		'alt' => '' === $key ? 'Ocean Depth Merino wool-blend top and leggings' : $record['title'],
	);
}
add_filter( 'rank_math/opengraph/facebook/image_array', 'myathletik_product_showcase_social_image', 99 );
add_filter( 'rank_math/opengraph/twitter/image_array', 'myathletik_product_showcase_social_image', 99 );

/** Collection metadata, not a priced retail offer or an editorial article. */
add_filter( 'rank_math/json_ld', function ( $data ) {
	$key = myathletik_product_showcase_current_key();
	if ( null === $key ) {
		return $data;
	}
	$url = get_permalink( get_queried_object_id() );
	$products = myathletik_product_showcase_products();
	$record = '' === $key ? myathletik_product_showcase_data() : $products[ $key ];
	foreach ( $data as $id => $node ) {
		$types = (array) ( $node['@type'] ?? array() );
		if ( array_intersect( $types, array( 'Article', 'BlogPosting', 'NewsArticle', 'Product', 'BreadcrumbList', 'WebPage', 'CollectionPage', 'ItemPage' ) ) ) {
			unset( $data[ $id ] );
		}
	}
	$data['showcasePage'] = array(
		'@type' => '' === $key ? 'CollectionPage' : 'ItemPage',
		'@id' => $url . '#webpage', 'url' => $url,
		'name' => $record['title'], 'description' => $record['meta_description'],
		'isPartOf' => array( '@id' => home_url( '/' ) . '#website' ),
		'inLanguage' => 'en-US',
	);
	if ( '' === $key ) {
		$items = array();
		foreach ( $products as $product_key => $product ) {
			$items[] = array( '@type' => 'ListItem', 'position' => count( $items ) + 1, 'name' => $product['title'], 'url' => myathletik_product_example_url( $product_key ) );
		}
		$data['showcaseList'] = array( '@type' => 'ItemList', '@id' => $url . '#examples', 'numberOfItems' => count( $items ), 'itemListElement' => $items );
		$data['showcasePage']['mainEntity'] = array( '@id' => $url . '#examples' );
	} else {
		$data['showcaseBreadcrumb'] = array( '@type' => 'BreadcrumbList', '@id' => $url . '#breadcrumb', 'itemListElement' => array(
			array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Product Showcase', 'item' => myathletik_product_showcase_url() ),
			array( '@type' => 'ListItem', 'position' => 2, 'name' => $record['name'], 'item' => $url ),
		) );
		$data['showcasePage']['breadcrumb'] = array( '@id' => $url . '#breadcrumb' );
	}
	return $data;
}, 999 );

/** Add the library only after its real WordPress page has been published. */
add_filter( 'wp_nav_menu_objects', function ( $items, $args ) {
	if ( ! myathletik_product_showcase_enabled() || empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
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
	$item = clone $parent;
	$item->ID = -880001;
	$item->db_id = 0;
	$item->object_id = 0;
	$item->object = 'custom';
	$item->type = 'custom';
	$item->type_label = 'Custom Link';
	$item->menu_item_parent = $parent->ID;
	$item->menu_order = count( $items ) + 1;
	$item->title = $item->post_title = 'Product Showcase';
	$item->url = myathletik_product_showcase_url();
	$item->target = $item->attr_title = $item->description = '';
	$item->classes = array( 'menu-item', 'menu-item-type-custom', 'ma-pl-menu-item' );
	$item->current = '' === myathletik_product_showcase_current_key();
	$item->current_item_parent = null !== myathletik_product_showcase_current_key() && ! $item->current;
	$item->current_item_ancestor = false;
	if ( $item->current || $item->current_item_parent ) {
		$item->classes[] = $item->current ? 'current-menu-item' : 'current-menu-parent';
	}
	$items[] = $item;
	return $items;
}, 99, 2 );

function myathletik_product_example_inquiry_url( $key ) {
	return myathletik_product_example_url( $key )
		? add_query_arg( 'product_example', $key, home_url( '/contact/' ) ) . '#ma-contact-form-title'
		: home_url( '/contact/' );
}

/** Resolve the query client-side so cached Contact HTML never mixes inquiries. */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! is_page( 'contact' ) ) {
		return;
	}
	$context = array();
	foreach ( myathletik_product_showcase_products() as $key => $product ) {
		$context[ $key ] = array(
			'category' => $product['inquiry_category'],
			'message' => 'Product reference: ' . $product['name'] . ' - ' . $product['title'] . "\n"
				. 'Fabric reference: ' . $product['fabric_ref'] . ' (' . $product['gsm'] . ")\n"
				. 'Product page: ' . myathletik_product_example_url( $key ) . "\n\nProject requirements: ",
		);
	}
	if ( ! $context ) {
		return;
	}
	$file = '/assets/js/product-inquiry-context.js';
	wp_enqueue_script( 'myathletik-product-inquiry-context', get_stylesheet_directory_uri() . $file, array(), filemtime( get_stylesheet_directory() . $file ), true );
	wp_localize_script( 'myathletik-product-inquiry-context', 'maProductInquiryContext', $context );
}, 30 );
