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
