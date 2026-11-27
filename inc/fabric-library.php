<?php
/** Representative fabric references; separate from the garment Showcase registry. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Owner-supplied Merino selection (2025 + 2024 batches) plus reviewed HY24/HY25/HY26 references.
 * Preserve source fiber names and layer-specific ratios. No stock/performance inference.
 * Existing photographed references are not overwritten by conflicting workbook records.
 */
function myathletik_fabric_library_data() {
	$rows_2025 = array(
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

	// 2024 photographed batch (P2-P26; P1=HY091231 is deduplicated against 2025 P019).
	$rows_2024 = array(
		array( 'HY091396', 140, array( 'Composition' => '90% Modal / 10% Cashmere' ) ),
		array( 'HY101613', 180, array( 'Composition' => '87% Polyester / 13% Merino wool' ) ),
		array( 'HY132229', 180, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY183348', 200, array( 'Face side' => '70% Merino wool / 30% Polyester', 'Back side' => '100% Polyester' ) ),
		array( 'HY203699', 150, array( 'Composition' => '82% Merino wool / 13% Nylon / 5% Spandex' ) ),
		array( 'HY234315', 150, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY234422', 170, array( 'Composition' => '89% Merino wool / 11% Nylon' ) ),
		array( 'HY234476', 180, array( 'Composition' => '100% Merino wool' ) ),
		array( 'HY234486', 140, array( 'Composition' => '89% Merino wool / 11% Nylon' ) ),
		array( 'HY234489', 170, array( 'Composition' => '53% Merino wool / 43% Cocona Polyester / 4% Spandex' ) ),
		array( 'HY234492', 150, array( 'Composition' => '60% Merino wool / 40% Coolmax Polyester' ) ),
		array( 'HY234493', 150, array( 'Composition' => '50% Merino wool / 50% Coffee Carbon Polyester' ) ),
		array( 'HY234494', 205, array( 'Composition' => '63% Merino wool / 37% Polyester' ) ),
		array( 'HY234503', 175, array( 'Composition' => '77% Modal / 19% Merino wool / 4% Spandex' ) ),
		array( 'HY234509', 190, array( 'Composition' => '70% Merino wool / 25% Nylon / 5% Spandex' ) ),
		array( 'HY234511', 160, array( 'Composition' => '47.5% Merino wool / 47.5% Graphene Polyester / 5% Spandex' ) ),
		array( 'HY234521', 180, array( 'Composition' => '60% Polyester / 40% Merino wool' ) ),
		array( 'HY244586', 180, array( 'Composition' => '100% Mercerized wool' ) ),
		array( 'HY244602', 140, array( 'Composition' => '50% Merino wool / 50% Lyocell' ) ),
		array( 'HY244620', 150, array( 'Composition' => '69% Merino wool / 29% Nylon / 2% Polyester' ) ),
		array( 'HY244661', 190, array( 'Composition' => '75% Polyester / 25% Merino wool' ) ),
		array( 'HY244663', 145, array( 'Composition' => '50% Merino wool / 50% Recycled Polyester' ) ),
		array( 'HY244665', 185, array( 'Composition' => '67% Polyester / 29% Merino wool / 4% Spandex' ) ),
		array( 'HY244667', 180, array( 'Composition' => '88% Modal / 8% Merino wool / 4% Spandex' ) ),
		array( 'HY091344', 220, array( 'Composition' => '55.7% Merino wool / 44.3% Polyester' ) ),
	);

	$fabrics = array();
	foreach ( array( '2025' => $rows_2025, '2024' => $rows_2024 ) as $collection => $rows ) {
		foreach ( $rows as $row ) {
			if ( isset( $fabrics[ $row[0] ] ) ) {
				continue;
			}
			$slug = strtolower( $row[0] );
			$fabrics[ $row[0] ] = array(
				'ref'         => $row[0],
				'gsm'         => $row[1],
				'composition' => $row[2],
				'collection'  => $collection,
				'garment_key' => $row[3] ?? '',
				'has_image'   => true,
				'image'       => '/assets/images/fabrics/merino/' . $slug . '-640.webp',
				'image_large' => '/assets/images/fabrics/merino/' . $slug . '-1440.webp',
			);
		}
	}

	$recent = array();
	foreach ( require __DIR__ . '/fabric-library-recent.php' as $row ) {
		// Never silently replace an already reviewed/photographed reference with another source.
		if ( isset( $fabrics[ $row[0] ] ) ) {
			continue;
		}
		$recent[ $row[0] ] = array(
			'ref'         => $row[0],
			'gsm'         => $row[1],
			'composition' => $row[2],
			'collection'  => 'recent',
			'garment_key' => '',
			'has_image'   => false,
			'image'       => '',
			'image_large' => '',
		);
	}

	// Photographed swatches first (2025 -> 2024), followed by spec-only recent references.
	$fabrics = $fabrics + $recent;

	foreach ( $fabrics as &$fabric ) {
		$bounds = preg_split( '/[–-]/u', (string) $fabric['gsm'] );
		$fabric['gsm_min']   = (float) $bounds[0];
		$fabric['gsm_max']   = (float) end( $bounds );
		$fabric['materials'] = myathletik_fabric_library_material_tags( $fabric['composition'] );
		$fabric['kind']      = myathletik_fabric_library_kind( $fabric['composition'] );
		$fabric['image_alt'] = $fabric['has_image'] ? myathletik_fabric_library_image_alt( $fabric ) : '';
	}
	unset( $fabric );
	return $fabrics;
}

/** Objective alt text for photographed fabric macro swatches; no unverified color/knit claims. */
function myathletik_fabric_library_image_alt( $fabric ) {
	$text = implode( ' ', $fabric['composition'] );
	if ( count( $fabric['composition'] ) > 1 ) {
		$summary = false !== stripos( $text, 'Merino wool' )
			? __( 'layered Merino wool knitted fabric', 'myathletik-child' )
			: __( 'layered knitted fabric', 'myathletik-child' );
	} elseif ( 0 === strpos( $text, '100% ' ) ) {
		$summary = sprintf( '%s knitted fabric', $text );
	} elseif ( false !== stripos( $text, 'Merino wool' ) ) {
		$summary = __( 'Merino wool blend knitted fabric', 'myathletik-child' );
	} elseif ( false !== stripos( $text, 'Cashmere' ) && false !== stripos( $text, 'Modal' ) ) {
		$summary = __( 'Modal and cashmere knitted fabric', 'myathletik-child' );
	} else {
		$summary = sprintf( '%s knitted fabric', strtolower( myathletik_fabric_library_kind( $fabric['composition'] ) ) );
	}

	return sprintf( '%s %s GSM %s macro swatch', $fabric['ref'], $fabric['gsm'], $summary );
}

/** Filters describe fiber content, not tested performance or product suitability. */
function myathletik_fabric_library_material_groups() {
	return array(
		'wool' => __( 'Wool / Merino wool', 'myathletik-child' ),
		'cotton' => __( 'Cotton', 'myathletik-child' ),
		'polyester' => __( 'Polyester', 'myathletik-child' ),
		'nylon' => __( 'Nylon / Polyamide', 'myathletik-child' ),
		'cellulosic' => __( 'Modal / Viscose / Tencel / Lyocell', 'myathletik-child' ),
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
		'nylon' => '/nylon|polyamide/i', 'cellulosic' => '/modal|viscose|tencel|lyocell/i',
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
		'lyocell' => __( 'Lyocell blend', 'myathletik-child' ),
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

/** Load filtering & lightbox only on the fabric library and Merino preview category pages. */
add_action( 'wp_enqueue_scripts', static function () {
	if ( is_page( array( 'knitted-fabrics-manufacturer', 'merino-wool-manufacturer' ) ) ) {
		$file = '/assets/js/fabric-library.js';
		wp_enqueue_script( 'myathletik-fabric-library', get_stylesheet_directory_uri() . $file, array(), filemtime( get_stylesheet_directory() . $file ), true );
	}
}, 30 );
