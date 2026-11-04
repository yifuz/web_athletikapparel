<?php
/**
 * Real product examples and publishing metadata.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Keep sample facts, media and development options in one place.
 * New local entries require owner review before production publication.
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

	$mens_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/hy265077-mens-merino-tencel/';
	$mens_images     = array();
	$mens_image_data = array(
		'front'        => array( 'Front view', "Front view of the grey men's Tencel and Merino wool long-sleeve T-shirt", 'View front' ),
		'back-view'    => array( 'Back view', 'Back view of the grey Tencel and Merino wool long-sleeve T-shirt', 'View back' ),
		'fabric-close' => array( 'Fabric detail', 'Close-up of the grey mesh fabric and hem on the Tencel and Merino wool T-shirt', 'View fabric detail' ),
		'cuff-close'   => array( 'Cuff detail', 'Thumbhole cuff detail on the grey Tencel and Merino wool long-sleeve T-shirt', 'View cuff detail' ),
	);
	foreach ( $mens_image_data as $image_key => $image ) {
		$mens_images[ $image_key ] = array(
			'src'       => $mens_media_base . $image_key . '-1280.webp',
			'thumbnail' => $mens_media_base . $image_key . '-640.webp',
			'srcset'    => $mens_media_base . $image_key . '-640.webp 640w, ' . $mens_media_base . $image_key . '-1280.webp 1280w',
			'width'     => 1280,
			'height'    => 720,
			'caption'   => $image[0],
			'alt'       => $image[1],
			'control'   => $image[2],
		);
	}

	return array(
		'ocean-depth' => array(
			'slug'           => 'ocean-depth-merino-wool-blend-set',
			'seo_title'      => "Women's Merino Wool-Blend Set | Athletik Clothing",
			'meta_description' => "Explore a real women's top and leggings set in 155 GSM Merino wool-blend fabric. View product photos, video, specifications and OEM development options.",
			'inquiry_category' => 'Merino Wool',
			'social_image'   => $media_base . 'front-social.jpg',
			'category_slug'  => 'merino-wool-manufacturer',
			'category_label' => 'Merino wool',
			'name'           => 'Ocean Depth',
			'title'          => "Women's Merino wool-blend top & leggings",
			'intro'          => "This women's set pairs a long-sleeve top with matching leggings in the same 155 GSM Merino wool-blend fabric. Use the sample as a reference for material, fit and style development.",
			'summary'        => 'A matching set for everyday and cool-weather layering, with the same fabric used for both pieces.',
			'characteristics'=> 'Soft next-to-skin feel · Added stretch · Moisture-absorbing Merino wool',
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
					'src'    => $media_base . 'ocean-depth-1080.mp4',
					'poster' => $images['front']['src'],
				),
			),
			'options'        => array(
				'intro'  => 'The top and leggings share the same fabric. Review the options below for development around your product brief.',
				'shared_title' => 'Shared options for the set',
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
							'Sizing'     => 'Your size chart / reference sample',
						),
					),
				),
				'shared' => array(
					'Fabric'              => 'One Merino wool-blend fabric for both pieces; alternative composition and GSM reviewed against your product brief.',
					'Colour'              => 'Matching colour for the top and leggings, developed to your colour reference.',
					'Labels and branding' => 'Woven or printed labels, care labels, and logo placement to suit the brand.',
					'Packaging'           => 'Packed together as a set or as individually packed pieces, with your specified hangtags.',
				),
				'note'   => 'Final choices depend on the selected fabric and approved sample; these alternatives are not specifications of the set shown.',
			),
		),
		'merino-tencel-mesh-top' => array(
			'slug'             => 'mens-merino-tencel-mesh-long-sleeve-shirt',
			'seo_title'        => "Men's Merino-Tencel Mesh Long-Sleeve Shirt | Athletik Clothing",
			'meta_description' => "Explore a men's mesh long-sleeve T-shirt in 80% Tencel and 20% Merino wool, 115 GSM. View the product video, fabric details and OEM development options.",
			'inquiry_category' => 'Merino Wool',
			'social_image'     => $mens_media_base . 'front-social.jpg',
			'category_slug'    => 'merino-wool-manufacturer',
			'category_label'   => 'Merino wool',
			'name'             => 'Merino-Tencel Mesh Top',
			'title'            => "Men's Merino wool-Tencel mesh long-sleeve T-shirt",
			'intro'            => "This men's long-sleeve T-shirt uses 115 GSM mesh fabric made with 80% Tencel and 20% Merino wool. Review the sample's fit, fabric texture and thumbhole cuffs as a reference for your own development brief.",
			'summary'          => 'A lightweight long-sleeve T-shirt with thumbhole cuffs, in an 80% Tencel and 20% Merino wool blend.',
			'characteristics'  => 'Soft next-to-skin feel · Lightweight mesh · Moisture-absorbing fibers',
			'material'         => 'merino',
			'material_label'   => 'Merino wool',
			'sample_material'  => 'Tencel / Merino wool blend',
			'composition'      => '80% Tencel / 20% Merino wool',
			'merino_content'   => '20%',
			'gsm'              => '115 GSM',
			'fabric_ref'       => 'HY265077',
			'use'              => 'Lightweight layering and everyday wear',
			'search'           => "men men's mens merino tencel mesh long sleeve t-shirt shirt top thumbhole cuff lightweight layering HY265077 115 GSM 80 tencel 20 wool",
			'media'            => array(
				'images' => $mens_images,
				'video'  => array(
					'src'    => $mens_media_base . 'hy265077-owner-approved-video.mp4',
					'poster' => $mens_images['front']['src'],
				),
			),
			'options'          => array(
				'intro' => 'Use this long-sleeve sample as a starting point. Discuss the style and material choices below against your product brief.',
				'groups' => array(
					array(
						'title' => 'Style and fit',
						'intro' => 'Development choices for the long-sleeve top.',
						'items' => array(
							'Neckline'   => 'Crew neck / mock neck',
							'Cuffs'      => 'Plain cuffs / thumbhole cuffs',
							'Fit'        => 'Close fit / regular fit',
							'Body length'=> 'Hip length / longline',
						),
					),
					array(
						'title' => 'Fabric and sizing',
						'intro' => 'Material and size targets for the development brief.',
						'items' => array(
							'Composition' => 'Tencel / Merino wool blend; alternative ratios for review',
							'Fabric weight' => '115 GSM reference / your target GSM',
							'Colour' => 'Sample grey / your colour reference',
							'Sizing' => 'Your size chart / reference sample',
						),
					),
				),
				'shared_title' => 'Branding and project details',
				'shared' => array(
					'Labels and branding' => 'Woven or printed labels, care labels, and logo placement to suit the brand.',
					'Packaging' => 'Your specified hangtags and individual garment packaging.',
					'Order brief' => 'Quantity per style, colour breakdown, size range and required timeline.',
					'Testing requirements' => 'Define the required tests and acceptance criteria for the intended market.',
				),
				'note' => 'Final choices depend on the selected fabric and approved sample; these alternatives are not specifications of the T-shirt shown.',
			),
		),
	);
}

/** Shared library metadata; individual examples retain their own search intent. */
function myathletik_product_showcase_data() {
	return array(
		'slug' => 'product-showcase',
		'title' => 'Product Showcase',
		'seo_title' => 'OEM Apparel Product Showcase | Athletik Clothing',
		'meta_description' => 'Explore real apparel examples from Athletik Clothing, with product photos, videos, fabric specifications and development options for OEM programs.',
		'social_image' => get_stylesheet_directory_uri() . '/assets/images/product-examples/ocean-depth/front-social.jpg',
	);
}
