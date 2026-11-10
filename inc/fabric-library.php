<?php
/** Representative fabric references; separate from the garment Showcase registry. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Owner-supplied Merino selection plus reviewed HY24/HY25/HY26 references.
 * Preserve source fiber names and layer-specific ratios. No stock/performance inference.
 * The existing selection is not overwritten by conflicting workbook records.
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
		$fabrics[ $row[0] ] = array(
			'ref' => $row[0], 'gsm' => $row[1], 'composition' => $row[2],
			'collection' => '2025', 'garment_key' => $row[3] ?? '',
		);
	}
	$recent = array();
	foreach ( require __DIR__ . '/fabric-library-recent.php' as $row ) {
		// Never silently replace an already reviewed reference with another source.
		if ( isset( $fabrics[ $row[0] ] ) ) {
			continue;
		}
		$recent[ $row[0] ] = array(
			'ref' => $row[0], 'gsm' => $row[1], 'composition' => $row[2],
			'collection' => 'recent', 'garment_key' => '',
		);
	}
	$fabrics = $recent + $fabrics;
	foreach ( $fabrics as &$fabric ) {
		$bounds = preg_split( '/[–-]/u', (string) $fabric['gsm'] );
		$fabric['gsm_min'] = (float) $bounds[0];
		$fabric['gsm_max'] = (float) end( $bounds );
		$fabric['materials'] = myathletik_fabric_library_material_tags( $fabric['composition'] );
		$fabric['kind'] = myathletik_fabric_library_kind( $fabric['composition'] );
	}
	unset( $fabric );
	return $fabrics;
}

/** Filters describe fiber content, not tested performance or product suitability. */
function myathletik_fabric_library_material_groups() {
	return array(
		'wool' => __( 'Wool / Merino wool', 'myathletik-child' ),
		'cotton' => __( 'Cotton', 'myathletik-child' ),
		'polyester' => __( 'Polyester', 'myathletik-child' ),
		'nylon' => __( 'Nylon / Polyamide', 'myathletik-child' ),
		'cellulosic' => __( 'Modal / Viscose / Tencel', 'myathletik-child' ),
		'polypropylene' => __( 'Polypropylene', 'myathletik-child' ),
		'acrylic' => __( 'Acrylic', 'myathletik-child' ),
		'hppe' => 'HPPE',
	);
}

/** Blends may appear under multiple filters. Do not infer the fiber behind a trade name. */
function myathletik_fabric_library_material_tags( $composition ) {
	$text = implode( ' ', $composition );
	$patterns = array(
		'wool' => '/wool/i', 'cotton' => '/cotton/i', 'polyester' => '/polyester/i',
		'nylon' => '/nylon|polyamide/i', 'cellulosic' => '/modal|viscose|tencel/i',
		'polypropylene' => '/polypropylene/i', 'acrylic' => '/acrylic/i', 'hppe' => '/\bHPPE\b/i',
	);
	return array_keys( array_filter( $patterns, static function ( $pattern ) use ( $text ) {
		return preg_match( $pattern, $text );
	} ) );
}

/** A compact card label; the full, source-specific composition always remains below. */
function myathletik_fabric_library_kind( $composition ) {
	if ( count( $composition ) > 1 ) {
		return __( 'Layered composition', 'myathletik-child' );
	}
	$text = reset( $composition );
	if ( 0 === strpos( $text, '100% ' ) ) {
		return $text;
	}
	if ( false !== stripos( $text, 'Merino wool' ) ) {
		return __( 'Merino wool blend', 'myathletik-child' );
	}
	// Name the largest declared component, without converting generic wool to Merino.
	preg_match_all( '/([\d.]+)%\s+([^\/]+)/', $text, $matches, PREG_SET_ORDER );
	usort( $matches, static function ( $a, $b ) { return (float) $b[1] <=> (float) $a[1]; } );
	$primary = $matches[0][2] ?? '';
	$labels = array(
		'wool' => __( 'Wool blend', 'myathletik-child' ),
		'cotton' => __( 'Cotton blend', 'myathletik-child' ),
		'polyester' => __( 'Polyester blend', 'myathletik-child' ),
		'nylon' => __( 'Nylon blend', 'myathletik-child' ),
		'polyamide' => __( 'Polyamide blend', 'myathletik-child' ),
		'modal' => __( 'Modal blend', 'myathletik-child' ),
		'viscose' => __( 'Viscose blend', 'myathletik-child' ),
		'tencel' => __( 'Tencel blend', 'myathletik-child' ),
		'polypropylene' => __( 'Polypropylene blend', 'myathletik-child' ),
		'acrylic' => __( 'Acrylic blend', 'myathletik-child' ),
		'hppe' => __( 'HPPE blend', 'myathletik-child' ),
	);
	foreach ( $labels as $fiber => $label ) {
		if ( false !== stripos( $primary, $fiber ) ) {
			return $label;
		}
	}
	return __( 'Blended composition', 'myathletik-child' );
}

/** Load filtering only on the fabric library's owning category, not site-wide. */
add_action( 'wp_enqueue_scripts', static function () {
	if ( is_page( 'knitted-fabrics-manufacturer' ) ) {
		$file = '/assets/js/fabric-library.js';
		wp_enqueue_script( 'myathletik-fabric-library', get_stylesheet_directory_uri() . $file, array(), filemtime( get_stylesheet_directory() . $file ), true );
	}
}, 30 );
