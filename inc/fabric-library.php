<?php
/** Representative fabric references; separate from the garment Showcase registry. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Owner-supplied 2025 selection, transcribed for Local review on 2026-11-10.
 * Preserve source fiber names and layer-specific ratios. No stock/performance inference.
 * Images, full specifications and future collections require separate confirmation.
 */
function myathletik_fabric_library_data() {
	$rows = array(
		array( 'HY254931', 240, array( 'Composition' => '65% Polyester / 25% Merino wool / 10% Nylon' ), 'womens-wool-jacquard-set' ),
		array( 'HY234257', 160, array( 'Composition' => '75% Polyester / 25% Merino wool' ) ),
		array( 'HY244668', 130, array( 'Composition' => '50% Merino wool / 50% Polyester' ) ),
		array( 'HY254776', 150, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY254785', 250, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY254798', 220, array( 'Outer' => '70% Merino wool / 30% Polyamide', 'Inner' => '100% Polyester' ) ),
		array( 'HY254800', 155, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY254869', 150, array( 'Composition' => '87% Merino wool / 13% Nylon' ) ),
		array( 'HY254888', 210, array( 'Outer' => '70% Merino wool / 30% Nylon', 'Inner' => '100% Polyester' ), 'womens-wool-jacquard-set' ),
		array( 'HY254932', 260, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY254933', 260, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY254938', 235, array( 'Composition' => '77% Tencel / 19% Merino wool / 4% Spandex' ) ),
		array( 'HY254946', 165, array( 'Composition' => '83% Merino wool / 12% Nylon / 5% Spandex' ) ),
		array( 'HY254950', 275, array( 'Composition' => '47% Merino wool / 42% Bamboo Fiber / 9% Nylon / 2% Spandex' ) ),
		array( 'HY254951', 138, array( 'Composition' => '69% Merino wool / 25% Coolmax / 6% Spandex' ) ),
		array( 'HY254952', 190, array( 'Composition' => '70% Tencel / 25% Nylon / 5% Merino wool' ) ),
		array( 'HY254953', 95, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY254955', 155, array( 'Composition' => '52% Merino wool / 43% Polyester / 5% Spandex' ), 'ocean-depth' ),
		array( 'HY091231', 210, array( 'Composition' => '50% Polyester / 35% Merino wool / 15% Nylon' ) ),
		array( 'HY142404', 180, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY142498', 300, array( 'Composition' => '75% Merino wool / 25% Polypropylene' ) ),
		array( 'HY142499', 180, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY193640', 190, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY224184', 330, array( 'Composition' => '85% Polyester / 15% Merino wool' ) ),
	);
	$fabrics = array();
	foreach ( $rows as $row ) {
		$group = isset( $row[2]['Outer'] ) ? 'layered' : ( '100% Merino wool' === $row[2]['Composition'] ? 'pure' : 'blend' );
		$fabrics[ $row[0] ] = array(
			'ref' => $row[0], 'gsm' => $row[1], 'composition' => $row[2],
			'group' => $group, 'collection' => '2025', 'garment_key' => $row[3] ?? '',
		);
	}
	return $fabrics;
}

/** Load filtering only on the fabric library's owning category, not site-wide. */
add_action( 'wp_enqueue_scripts', static function () {
	if ( is_page( 'knitted-fabrics-manufacturer' ) ) {
		$file = '/assets/js/fabric-library.js';
		wp_enqueue_script( 'myathletik-fabric-library', get_stylesheet_directory_uri() . $file, array(), filemtime( get_stylesheet_directory() . $file ), true );
	}
}, 30 );
