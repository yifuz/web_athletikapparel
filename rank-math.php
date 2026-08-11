<?php
/**
 * Rank Math integrations for the Athletik child theme.
 *
 * @package MyAthletik
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the canonical homepage SEO title.
 *
 * @return string
 */
function myathletik_rank_math_home_title() {
	return 'Technical Knitwear Manufacturer | Athletik Clothing';
}

/**
 * Keep the homepage social title aligned with the document title.
 *
 * @param string $title Rank Math's generated social title.
 * @return string
 */
function myathletik_rank_math_home_social_title( $title ) {
	if ( is_front_page() ) {
		return myathletik_rank_math_home_title();
	}

	return $title;
}
add_filter( 'rank_math/opengraph/facebook/og_title', 'myathletik_rank_math_home_social_title', 20 );
add_filter( 'rank_math/opengraph/twitter/twitter_title', 'myathletik_rank_math_home_social_title', 20 );

/**
 * Return the current technical article record when applicable.
 *
 * @return array|null
 */
function myathletik_rank_math_current_technical_article() {
	if ( ! is_page() ) {
		return null;
	}

	$slug = get_post_field( 'post_name', get_queried_object_id() );

	return $slug ? myathletik_get_technical_article_data( $slug ) : null;
}

/**
 * Return Technical Guides hub metadata when applicable.
 *
 * @return array|null
 */
function myathletik_rank_math_current_technical_guides_hub() {
	return is_page( 'technical-guides' ) ? myathletik_technical_guides_hub_data() : null;
}

/**
 * Keep the technical article title and social title deterministic.
 *
 * @param string $title Rank Math generated title.
 * @return string
 */
function myathletik_rank_math_technical_article_title( $title ) {
	$article = myathletik_rank_math_current_technical_article();
	$hub     = myathletik_rank_math_current_technical_guides_hub();

	if ( $article ) {
		return $article['seo_title'];
	}

	return $hub ? $hub['seo_title'] : $title;
}
add_filter( 'rank_math/frontend/title', 'myathletik_rank_math_technical_article_title', 20 );
add_filter( 'rank_math/opengraph/facebook/og_title', 'myathletik_rank_math_technical_article_title', 21 );
add_filter( 'rank_math/opengraph/twitter/twitter_title', 'myathletik_rank_math_technical_article_title', 21 );

/**
 * Keep the technical article description and social description aligned.
 *
 * @param string $description Rank Math generated description.
 * @return string
 */
function myathletik_rank_math_technical_article_description( $description ) {
	$article = myathletik_rank_math_current_technical_article();
	$hub     = myathletik_rank_math_current_technical_guides_hub();

	if ( $article ) {
		return $article['meta_description'];
	}

	return $hub ? $hub['meta_description'] : $description;
}
add_filter( 'rank_math/frontend/description', 'myathletik_rank_math_technical_article_description', 20 );
add_filter( 'rank_math/opengraph/facebook/og_description', 'myathletik_rank_math_technical_article_description', 20 );
add_filter( 'rank_math/opengraph/twitter/twitter_description', 'myathletik_rank_math_technical_article_description', 20 );

/**
 * Keep the homepage WebPage entity aligned with the document title.
 *
 * Organization and WebSite names intentionally remain the shorter brand name.
 *
 * @param array $data Rank Math JSON-LD entities.
 * @return array
 */
function myathletik_rank_math_home_schema_title( $data ) {
	if ( ! is_front_page() || ! is_array( $data ) || empty( $data['WebPage'] ) || ! is_array( $data['WebPage'] ) ) {
		return $data;
	}

	$data['WebPage']['name'] = myathletik_rank_math_home_title();

	return $data;
}
add_filter( 'rank_math/json_ld', 'myathletik_rank_math_home_schema_title', 100 );

/**
 * Return the appropriate WebPage type for the site's core pages.
 *
 * @return string Empty when the current request is outside the managed pages.
 */
function myathletik_rank_math_core_webpage_type() {
	if ( is_front_page() ) {
		return 'WebPage';
	}

	if (
		is_page(
			array(
				'sportswear-manufacturer',
				'underwear-manufacturer',
				'outdoor-clothing-manufacturer',
				'merino-wool-manufacturer',
				'silk-wear-manufacturer',
				'knitted-fabrics-manufacturer',
				'sports-accessories-manufacturer',
			)
		)
	) {
		return 'CollectionPage';
	}

	if ( is_page( 'about-us' ) ) {
		return 'AboutPage';
	}

	if ( is_page( 'contact' ) ) {
		return 'ContactPage';
	}

	if ( is_page( array( 'services', 'sustainability' ) ) ) {
		return 'WebPage';
	}

	if ( is_page( 'technical-guides' ) ) {
		return 'CollectionPage';
	}

	if ( myathletik_rank_math_current_technical_article() ) {
		return 'WebPage';
	}

	return '';
}

/**
 * Correct the page-level Schema for the site's core business pages.
 *
 * Rank Math's global Page default is Article, which adds an Article and its
 * WordPress author to every static page. These entities are intentionally
 * removed only from the managed business pages; normal Posts are unaffected.
 *
 * @param array $data Rank Math JSON-LD entities.
 * @return array
 */
function myathletik_rank_math_core_page_schema( $data ) {
	$webpage_type = myathletik_rank_math_core_webpage_type();

	if ( '' === $webpage_type || ! is_array( $data ) ) {
		return $data;
	}

	$remove_types = array( 'Article', 'BlogPosting', 'NewsArticle', 'Person' );

	foreach ( $data as $key => $entity ) {
		if ( ! is_array( $entity ) || empty( $entity['@type'] ) ) {
			continue;
		}

		if ( array_intersect( $remove_types, (array) $entity['@type'] ) ) {
			unset( $data[ $key ] );
		}
	}

	if ( ! empty( $data['WebPage'] ) && is_array( $data['WebPage'] ) ) {
		$data['WebPage']['@type'] = $webpage_type;
	}

	return $data;
}
add_filter( 'rank_math/json_ld', 'myathletik_rank_math_core_page_schema', 101 );

/**
 * Keep the publisher entity aligned with the public company details.
 *
 * Unverified opening hours are removed instead of publishing an assumption.
 *
 * @param array $data Rank Math JSON-LD entities.
 * @return array
 */
function myathletik_rank_math_publisher_schema( $data ) {
	if ( ! is_array( $data ) || empty( $data['publisher'] ) || ! is_array( $data['publisher'] ) ) {
		return $data;
	}

	if ( ! empty( $data['publisher']['logo'] ) && is_array( $data['publisher']['logo'] ) ) {
		foreach ( array( 'url', 'contentUrl' ) as $logo_url_key ) {
			if ( ! empty( $data['publisher']['logo'][ $logo_url_key ] ) ) {
				$data['publisher']['logo'][ $logo_url_key ] = set_url_scheme(
					$data['publisher']['logo'][ $logo_url_key ],
					'https'
				);
			}
		}
	}

	$data['publisher']['telephone'] = '+8613951139696';
	$data['publisher']['email']     = 'info@athletikapparel.com';
	// Keep the publisher as the public brand. Do not combine the U.S. entity's
	// legal name with the China production address in one Organization entity.
	unset( $data['publisher']['legalName'] );
	$data['publisher']['sameAs']    = array(
		'https://www.linkedin.com/company/111831319/',
		'https://www.instagram.com/athletikclothinginc/',
		'https://www.youtube.com/@athletikclothinginc',
	);
	$data['publisher']['address']   = array(
		'@type'           => 'PostalAddress',
		'streetAddress'   => 'No.25, Zhongxing Road, Yangshe Town',
		'addressLocality' => 'Zhangjiagang',
		'addressRegion'   => 'Jiangsu',
		'postalCode'      => '215699',
		'addressCountry'  => 'CN',
	);

	unset( $data['publisher']['openingHours'] );

	return $data;
}
add_filter( 'rank_math/json_ld', 'myathletik_rank_math_publisher_schema', 102 );

/**
 * Add Article and FAQPage entities that mirror the approved visible content.
 *
 * The public brand is used as an Organization author because no individual
 * author identity has been supplied. This avoids inventing a Person entity.
 *
 * @param array $data Rank Math JSON-LD entities.
 * @return array
 */
function myathletik_rank_math_technical_article_schema( $data ) {
	$article = myathletik_rank_math_current_technical_article();

	if ( ! $article || ! is_array( $data ) ) {
		return $data;
	}

	$page_id      = get_queried_object_id();
	$page_url     = get_permalink( $page_id );
	$article_id   = $page_url . '#article';
	$webpage_id   = ! empty( $data['WebPage']['@id'] ) ? $data['WebPage']['@id'] : $page_url . '#webpage';
	$publisher_id = ! empty( $data['publisher']['@id'] ) ? $data['publisher']['@id'] : home_url( '/#organization' );
	$image_url    = myathletik_images_uri() . '/' . ltrim( $article['featured_image'], '/' );

	$data['technicalArticle'] = array(
		'@type'            => 'Article',
		'@id'              => $article_id,
		'headline'         => $article['title'],
		'description'      => $article['meta_description'],
		'datePublished'    => get_post_time( DATE_W3C, false, $page_id ),
		'dateModified'     => get_post_modified_time( DATE_W3C, false, $page_id ),
		'inLanguage'       => 'en-US',
		'articleSection'   => $article['article_section'],
		'mainEntityOfPage' => array( '@id' => $webpage_id ),
		'image'            => array(
			'@type'  => 'ImageObject',
			'url'    => $image_url,
			'width'  => (int) $article['featured_width'],
			'height' => (int) $article['featured_height'],
		),
		'author'           => array(
			'@type' => 'Organization',
			'name'  => 'Athletik Clothing',
			'url'   => home_url( '/about-us/' ),
		),
		'publisher'        => array( '@id' => $publisher_id ),
		'about'            => $article['about'],
	);

	$questions = array();
	foreach ( $article['faq'] as $item ) {
		$questions[] = array(
			'@type'          => 'Question',
			'name'           => $item['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $item['answer'],
			),
		);
	}

	$data['technicalArticleFaq'] = array(
		'@type'      => 'FAQPage',
		'@id'        => $page_url . '#faq',
		'mainEntity' => $questions,
	);

	$data['technicalArticleBreadcrumb'] = array(
		'@type'           => 'BreadcrumbList',
		'@id'             => $page_url . '#breadcrumb',
		'itemListElement' => array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => 'Home',
				'item'     => home_url( '/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => 'Technical Guides',
				'item'     => home_url( '/technical-guides/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 3,
				'name'     => $article['title'],
				'item'     => $page_url,
			),
		),
	);

	if ( ! empty( $data['WebPage'] ) && is_array( $data['WebPage'] ) ) {
		$data['WebPage']['name']        = $article['seo_title'];
		$data['WebPage']['description'] = $article['meta_description'];
		$data['WebPage']['mainEntity']  = array( '@id' => $article_id );
		$data['WebPage']['breadcrumb']  = array( '@id' => $page_url . '#breadcrumb' );
	}

	return $data;
}
add_filter( 'rank_math/json_ld', 'myathletik_rank_math_technical_article_schema', 103 );

/**
 * Add the published-guide ItemList and visible breadcrumb trail to the hub.
 *
 * @param array $data Rank Math JSON-LD entities.
 * @return array
 */
function myathletik_rank_math_technical_guides_schema( $data ) {
	$hub = myathletik_rank_math_current_technical_guides_hub();

	if ( ! $hub || ! is_array( $data ) ) {
		return $data;
	}

	$page_url   = get_permalink( get_queried_object_id() );
	$itemlist   = $page_url . '#itemlist';
	$list_items = array();
	$position   = 1;

	foreach ( myathletik_get_published_technical_articles() as $slug => $article ) {
		$list_items[] = array(
			'@type'    => 'ListItem',
			'position' => $position,
			'name'     => $article['title'],
			'url'      => home_url( '/' . $slug . '/' ),
		);
		++$position;
	}

	$data['technicalGuidesItemList'] = array(
		'@type'           => 'ItemList',
		'@id'             => $itemlist,
		'name'            => $hub['title'],
		'numberOfItems'   => count( $list_items ),
		'itemListElement' => $list_items,
	);

	$data['technicalGuidesBreadcrumb'] = array(
		'@type'           => 'BreadcrumbList',
		'@id'             => $page_url . '#breadcrumb',
		'itemListElement' => array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => 'Home',
				'item'     => home_url( '/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => 'Technical Guides',
				'item'     => $page_url,
			),
		),
	);

	if ( ! empty( $data['WebPage'] ) && is_array( $data['WebPage'] ) ) {
		$data['WebPage']['name']        = $hub['seo_title'];
		$data['WebPage']['description'] = $hub['meta_description'];
		$data['WebPage']['mainEntity']  = array( '@id' => $itemlist );
		$data['WebPage']['breadcrumb']  = array( '@id' => $page_url . '#breadcrumb' );
	}

	return $data;
}
add_filter( 'rank_math/json_ld', 'myathletik_rank_math_technical_guides_schema', 104 );

/**
 * Return the last significant update for theme-rendered core pages.
 *
 * The no-argument value is the latest managed-page update and is used by the
 * page Sitemap index. Passing a URL keeps unchanged pages on the previous
 * site-wide baseline while reflecting this guide and its two new inbound links.
 *
 * @param string $url Optional absolute page URL.
 * @return int Unix timestamp in UTC.
 */
function myathletik_rank_math_core_sitemap_baseline( $url = '' ) {
	$latest = strtotime( '2026-08-11 05:00:00 UTC' );

	if ( '' === $url ) {
		return $latest;
	}

	$path = wp_parse_url( $url, PHP_URL_PATH );
	$path = is_string( $path ) ? '/' . trim( $path, '/' ) : '';
	$path = '/' === $path ? $path : trailingslashit( $path );

	if (
		in_array(
			$path,
			array(
				'/',
				'/technical-guides/',
				'/flatlock-vs-overlock-technical-knitwear/',
				'/technical-knitwear-tech-pack-guide/',
				'/evaluate-technical-knitwear-oem/',
			),
			true
		)
	) {
		return $latest;
	}

	if ( in_array( $path, array( '/sportswear-manufacturer/', '/underwear-manufacturer/' ), true ) ) {
		return strtotime( '2026-08-11 02:30:00 UTC' );
	}

	return strtotime( '2026-08-08 02:30:00 UTC' );
}

/**
 * Check whether a Sitemap URL belongs to one of the 16 managed core pages.
 *
 * @param string $url Absolute Sitemap URL.
 * @return bool
 */
function myathletik_rank_math_is_core_sitemap_url( $url ) {
	$path = wp_parse_url( $url, PHP_URL_PATH );

	if ( ! is_string( $path ) ) {
		return false;
	}

	$path = '/' . trim( $path, '/' );
	$path = '/' === $path ? $path : trailingslashit( $path );

	return in_array(
		$path,
		array(
			'/',
			'/technical-guides/',
			'/flatlock-vs-overlock-technical-knitwear/',
			'/technical-knitwear-tech-pack-guide/',
			'/evaluate-technical-knitwear-oem/',
			'/sportswear-manufacturer/',
			'/underwear-manufacturer/',
			'/outdoor-clothing-manufacturer/',
			'/merino-wool-manufacturer/',
			'/silk-wear-manufacturer/',
			'/knitted-fabrics-manufacturer/',
			'/sports-accessories-manufacturer/',
			'/services/',
			'/sustainability/',
			'/about-us/',
			'/contact/',
		),
		true
	);
}

/**
 * Keep core-page Sitemap lastmod values aligned with real rendered changes.
 *
 * Rank Math normally uses only the WordPress database modification time. The
 * site's page bodies are theme-rendered, so that value does not change when a
 * template or the shared structured data changes.
 *
 * @param string $output Rendered XML for one Sitemap URL.
 * @param array  $url    Sitemap URL data.
 * @return string
 */
function myathletik_rank_math_core_sitemap_lastmod( $output, $url ) {
	if (
		! is_string( $output ) ||
		! is_array( $url ) ||
		empty( $url['loc'] ) ||
		! myathletik_rank_math_is_core_sitemap_url( $url['loc'] )
	) {
		return $output;
	}

	$modified = ! empty( $url['mod'] ) ? strtotime( $url['mod'] ) : 0;
	$modified = max( (int) $modified, myathletik_rank_math_core_sitemap_baseline( $url['loc'] ) );
	$lastmod  = '<lastmod>' . esc_html( gmdate( DATE_W3C, $modified ) ) . '</lastmod>';

	if ( false !== strpos( $output, '<lastmod>' ) ) {
		return (string) preg_replace( '#<lastmod>[^<]*</lastmod>#', $lastmod, $output, 1 );
	}

	return (string) preg_replace( '#(\s*</url>\s*)$#', "\n\t\t" . $lastmod . '$1', $output, 1 );
}
add_filter( 'rank_math/sitemap/url', 'myathletik_rank_math_core_sitemap_lastmod', 20, 2 );

/**
 * Keep the Page Sitemap index timestamp aligned with its core-page entries.
 *
 * @param array  $entry       Sitemap index entry.
 * @param string $object_type Entry object type.
 * @param string $sitemap     Sitemap provider name.
 * @return array
 */
function myathletik_rank_math_page_sitemap_index_lastmod( $entry, $object_type, $sitemap ) {
	if ( ! is_array( $entry ) || 'post' !== $object_type || 'page' !== $sitemap ) {
		return $entry;
	}

	$current          = ! empty( $entry['lastmod'] ) ? strtotime( $entry['lastmod'] ) : 0;
	$entry['lastmod'] = gmdate(
		'Y-m-d H:i:s',
		max( (int) $current, myathletik_rank_math_core_sitemap_baseline() )
	);

	return $entry;
}
add_filter( 'rank_math/sitemap/index/entry', 'myathletik_rank_math_page_sitemap_index_lastmod', 20, 3 );
