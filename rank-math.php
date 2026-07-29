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
