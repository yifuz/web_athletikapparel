<?php
/**
 * Owner-reviewed real product examples for the local Product Showcase preview.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Keep sample facts, media and approved development options in one place.
 *
 * These entries describe actual samples, not stock availability or tested performance.
 *
 * @return array<string,array> Product records keyed by their stable internal identifier.
 */
function myathletik_product_example_data() {
	$media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/ocean-depth/';
	$images     = array();
	$image_data = array(
		'front'        => array( 'Front view', 'Front view of the blue-green Merino wool-blend top and leggings', 'View front' ),
		'collar-close' => array( 'Neckline detail', 'Neckline of the blue-green Merino wool-blend top', 'View neckline' ),
		'waist-close'  => array( 'Waist detail', 'Waist detail of the blue-green Merino wool-blend leggings', 'View waist detail' ),
		'back-view'    => array( 'Back view', 'Back view of the blue-green Merino wool-blend top and leggings', 'View back' ),
	);

	foreach ( $image_data as $image_key => $image ) {
		$images[ $image_key ] = array(
			'src'       => $media_base . $image_key . '-1280.webp',
			'thumbnail' => $media_base . $image_key . '-640.webp',
			'srcset'    => $media_base . $image_key . '-640.webp 640w, ' . $media_base . $image_key . '-1280.webp 1280w',
			'width'     => 1280,
			'height'    => 720,
			'caption'   => $image[0],
			'alt'       => $image[1],
			'control'   => $image[2],
		);
	}

	return array(
		'ocean-depth' => array(
			'name'           => 'Ocean Depth',
			'title'          => "Women's Merino wool-blend top & leggings",
			'intro'          => "This women's set pairs a long-sleeve top with matching leggings in the same 155 GSM Merino wool-blend fabric. Use the sample as a reference for material, fit and style development.",
			'summary'        => 'A matching set for everyday and cool-weather layering, with the same fabric used for both pieces.',
			'material'       => 'merino',
			'material_label' => 'Merino wool',
			'sample_material'=> 'Merino wool blend',
			'composition'    => '52% Merino wool / 43% Polyester / 5% Spandex',
			'merino_content' => '52%',
			'gsm'            => '155 GSM',
			'fabric_ref'     => 'HY254955',
			'use'            => 'Everyday and cool-weather layering',
			'search'         => "Ocean Depth women's merino wool blend top leggings set everyday cool weather layering HY254955 155 GSM 52 wool 43 polyester 5 spandex",
			'media'          => array(
				'images' => $images,
				'video'  => array(
					'src'    => $media_base . 'ocean-depth-review-1080.mp4',
					'poster' => $images['front']['src'],
				),
			),
			'options'        => array(
				'intro'  => "The top and leggings share the same fabric. These proposed options show how the set could be developed around a buyer's brief.",
				'groups' => array(
					array(
						'title' => 'Top development',
						'intro' => 'Style and fit options to discuss for the top.',
						'items' => array(
							'Neckline'      => 'Crew neck / mock neck',
							'Sleeve length' => 'Full length / three-quarter length',
							'Fit'           => 'Close fit / regular fit',
							'Body length'   => 'Hip length / longline',
						),
					),
					array(
						'title' => 'Leggings development',
						'intro' => 'Waist and length options to discuss for the leggings.',
						'items' => array(
							'Rise'       => 'Mid rise / high rise',
							'Waistband'  => 'Narrow / wide waistband',
							'Leg length' => 'Full length / 7/8 length',
							'Sizing'     => "Buyer's size chart / reference sample",
						),
					),
				),
				'shared' => array(
					'Fabric'              => "One Merino wool-blend fabric for both pieces; alternative composition and GSM reviewed against the buyer's brief.",
					'Colour'              => "Matching colour for the top and leggings, developed to the buyer's colour reference.",
					'Labels and branding' => 'Woven or printed labels, care labels, and logo placement to suit the brand.',
					'Packaging'           => 'Packed together as a set or as individually packed pieces, with buyer-specified hangtags.',
				),
				'note'   => 'Final choices depend on the selected fabric and approved sample; these alternatives are not specifications of the set shown.',
			),
		),
	);
}
