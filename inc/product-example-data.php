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
 * Keep customer-specific tech-pack instructions out of these public records.
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

	// Owner-provided technical PDF + four videos; copy remains a Local review draft.
	$jacquard_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/womens-wool-jacquard-set/';
	$jacquard_images = array();
	$jacquard_image_data = array(
		'front'           => array( 'Full set', 'Front view of the black and grey jacquard quarter-zip top and leggings', 'View full set' ),
		'back-view'       => array( 'Back view', 'Back view of the jacquard top and leggings with dark side panels', 'View back' ),
		'neckline-detail' => array( 'Collar and jacquard detail', 'Close-up of the stand collar, front zip and geometric jacquard pattern', 'View collar detail' ),
		'waist-detail'    => array( 'Waist detail', 'Close-up of the dark elasticated waistband and jacquard leggings', 'View waist detail' ),
	);
	foreach ( $jacquard_image_data as $image_key => $image ) {
		$jacquard_images[ $image_key ] = array(
			'src' => $jacquard_media_base . $image_key . '-1280.webp',
			'thumbnail' => $jacquard_media_base . $image_key . '-640.webp',
			'srcset' => $jacquard_media_base . $image_key . '-640.webp 640w, ' . $jacquard_media_base . $image_key . '-1280.webp 1280w',
			'width' => 1280, 'height' => 720,
			'caption' => $image[0], 'alt' => $image[1], 'control' => $image[2],
		);
	}
	$jacquard_videos = array();
	foreach ( array(
		'overview' => array( 'Full-set overview', 'front' ),
		'back-side' => array( 'Back and side views', 'back-view' ),
		'neckline' => array( 'Top and collar details', 'neckline-detail' ),
		'waist' => array( 'Waist and leggings', 'waist-detail' ),
	) as $video_key => $video ) {
		$jacquard_videos[ $video_key ] = array(
			'src' => $jacquard_media_base . $video_key . '-1080.mp4',
			'poster' => $jacquard_images[ $video[1] ]['src'],
			'thumbnail' => $jacquard_images[ $video[1] ]['thumbnail'],
			'label' => $video[0],
		);
	}

	// Owner-provided product video and fabric specification; Local review draft.
	$fleece_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/mens-half-zip-fleece/';
	$fleece_images = array();
	$fleece_image_data = array(
		'front'             => array( 'Front view', 'Front view of a man wearing an olive half-zip fleece top', 'View front' ),
		'back-view'         => array( 'Back view', 'Back view of the olive long-sleeve fleece top', 'View back' ),
		'collar-zip-detail' => array( 'Collar and zip detail', 'Stand collar and half-zip opening on the olive fleece top', 'View collar detail' ),
		'pocket-detail'     => array( 'Pocket and fleece detail', 'Front pocket and fleece fabric detail on the olive top', 'View pocket detail' ),
	);
	foreach ( $fleece_image_data as $image_key => $image ) {
		$fleece_images[ $image_key ] = array(
			'src'       => $fleece_media_base . $image_key . '-1280.webp',
			'thumbnail' => $fleece_media_base . $image_key . '-640.webp',
			'srcset'    => $fleece_media_base . $image_key . '-640.webp 640w, ' . $fleece_media_base . $image_key . '-1280.webp 1280w',
			'width'     => 1280,
			'height'    => 720,
			'caption'   => $image[0],
			'alt'       => $image[1],
			'control'   => $image[2],
		);
	}

	// Owner-confirmed shared fabric and two supplied clips; Local review draft.
	$set_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/mens-half-zip-tights-set/';
	$set_images = array();
	$set_image_data = array(
		'front'    => array( 'Front view', 'Front view of the dark half-zip top with white sleeve panels', 'View front' ),
		'side'     => array( 'Angled front view', 'Angled view of the dark half-zip top and white sleeve panels', 'View angled front' ),
		'collar'   => array( 'Collar and zip detail', 'Close-up of the collar and contrasting zip on the dark top', 'View collar detail' ),
		'full-set' => array( 'Full set', 'Full-length view of the dark half-zip top and tights', 'View full set' ),
	);
	foreach ( $set_image_data as $image_key => $image ) {
		$set_images[ $image_key ] = array(
			'src'       => $set_media_base . $image_key . '-1280.webp',
			'thumbnail' => $set_media_base . $image_key . '-640.webp',
			'srcset'    => $set_media_base . $image_key . '-640.webp 640w, ' . $set_media_base . $image_key . '-1280.webp 1280w',
			'width'     => 1280,
			'height'    => 720,
			'caption'   => $image[0],
			'alt'       => $image[1],
			'control'   => $image[2],
		);
	}
	$set_videos = array();
	foreach ( array(
		'overview'       => array( 'Top overview', 'front' ),
		'collar-and-fit' => array( 'Collar and full-set views', 'collar' ),
	) as $video_key => $video ) {
		$set_videos[ $video_key ] = array(
			'src'       => $set_media_base . $video_key . '-1080.mp4',
			'poster'    => $set_images[ $video[1] ]['src'],
			'thumbnail' => $set_images[ $video[1] ]['thumbnail'],
			'label'     => $video[0],
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
		'mens-half-zip-fleece' => array(
			'slug'             => 'mens-half-zip-fleece-top',
			'seo_title'        => "Men's Half-Zip Fleece Top | Athletik Clothing",
			'meta_description' => "Explore a men's half-zip fleece top in 250 GSM polyester fabric. View the product video, fabric reference and OEM development options.",
			'inquiry_category' => 'Outdoor Clothing',
			'social_image'     => $fleece_media_base . 'front-social.jpg',
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'outdoor clothing',
			'name'             => 'Half-Zip Fleece Top',
			'title'            => "Men's half-zip fleece top",
			'intro'            => "This men's long-sleeve top uses 250 GSM polyester fleece fabric and features a stand collar, half-zip opening and front pocket. Review the sample's silhouette and fabric as a reference for your own product brief.",
			'summary'          => 'An olive long-sleeve fleece top with a stand collar, half-zip opening and front pocket.',
			'material'         => 'polyester',
			'material_label'   => 'Polyester',
			'sample_material'  => 'Polyester fleece fabric',
			'composition'      => 'Fleece fabric: 100% Polyester',
			'gsm'              => '250 GSM (fleece fabric)',
			'fabric_ref'       => 'HY254900',
			'use'              => 'Outdoor layering',
			'search'           => "men mens fleece half zip top olive polyester outdoor layering HY254900 250 GSM",
			'media'            => array(
				'images' => $fleece_images,
				'video'  => array(
					'src'    => $fleece_media_base . 'fleece-overview-1080.mp4',
					'poster' => $fleece_images['front']['src'],
				),
			),
			'options' => array(
				'intro' => 'Discuss the style and fabric choices against your product brief.',
				'groups' => array(
					array(
						'title' => 'Style and fit',
						'intro' => 'Reference points for the garment.',
						'items' => array(
							'Front opening' => 'Half zip / your opening specification',
							'Collar' => 'Stand collar / your reference',
							'Pockets' => 'Front pocket / your pocket specification',
							'Fit and sizing' => 'Your size chart / reference sample',
						),
					),
					array(
						'title' => 'Fabric and colour',
						'intro' => 'Material targets for the development brief.',
						'items' => array(
							'Fleece fabric' => '100% Polyester sample / your composition',
							'Fabric weight' => '250 GSM reference / your target GSM',
							'Colour' => 'Sample olive / your colour reference',
							'Trims' => 'Your zipper and trim specifications',
						),
					),
				),
				'shared_title' => 'Branding and project details',
				'shared' => array(
					'Labels and branding' => 'Labels and logo placement to suit the brand.',
					'Packaging' => 'Your specified garment packaging and hangtags.',
					'Order brief' => 'Quantity per style, colour breakdown, size range and required timeline.',
					'Testing requirements' => 'Define the required tests and acceptance criteria for the intended market.',
				),
				'note' => 'Final choices depend on the selected fabric and approved sample; alternatives are not specifications of the top shown.',
			),
		),
		'mens-half-zip-top-tights' => array(
			'slug'             => 'mens-half-zip-top-and-tights',
			'seo_title'        => "Men's Half-Zip Top & Tights | Athletik Clothing",
			'meta_description' => "Explore a men's half-zip top and tights in 180 GSM graphene polyester and elastane fabric, with two videos and product development options.",
			'inquiry_category' => 'Outdoor Clothing',
			'social_image'     => $set_media_base . 'front-social.jpg',
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'outdoor clothing',
			'name'             => 'Half-Zip Top & Tights',
			'title'            => "Men's half-zip top & tights",
			'intro'            => "This men's set pairs a half-zip long-sleeve top with full-length tights. Both pieces use the same 180 GSM graphene polyester and elastane fabric. Review the silhouette and contrasting panels as a reference for your product brief.",
			'summary'          => 'A half-zip long-sleeve top and tights in the same 180 GSM graphene polyester and elastane fabric.',
			'state'            => 'Product example · OEM development reference',
			'material'         => 'polyester',
			'material_label'   => 'Polyester',
			'sample_material'  => 'Graphene polyester / elastane',
			'composition'      => '86% Graphene Polyester / 14% Elastane',
			'gsm'              => '180 GSM',
			'fabric_ref'       => 'HY265048',
			'use'              => 'Outdoor layering',
			'search'           => "men mens half zip top tights set graphene polyester elastane HY265048 180 GSM outdoor layering",
			'media'            => array(
				'images' => $set_images,
				'video'  => $set_videos['overview'],
				'videos' => $set_videos,
			),
			'options' => array(
				'intro' => 'Review the top, tights and shared fabric choices against your product brief.',
				'groups' => array(
					array(
						'title' => 'Top development',
						'intro' => 'Style and fit options to discuss for the top.',
						'items' => array(
							'Front opening' => 'Half zip / your opening specification',
							'Fit' => 'Your fit requirements / reference sample',
							'Sleeve length' => 'Full length / your specification',
							'Sizing' => 'Your size chart / reference sample',
						),
					),
					array(
						'title' => 'Tights development',
						'intro' => 'Style and fit options to discuss for the tights.',
						'items' => array(
							'Waistband' => 'Your waistband specification',
							'Leg length' => 'Full length / your specification',
							'Fit' => 'Your fit requirements / reference sample',
							'Sizing' => 'Your size chart / reference sample',
						),
					),
				),
				'shared_title' => 'Shared options for the set',
				'shared' => array(
					'Fabric' => 'One graphene polyester and elastane fabric for both pieces; alternatives reviewed against your brief.',
					'Colour and panels' => 'Your colour references and panel placement, reviewed for production feasibility.',
					'Labels and branding' => 'Labels and logo placement to suit the brand.',
					'Packaging' => 'Your specified garment packaging and hangtags.',
				),
				'note' => 'Final choices depend on the selected fabric and approved sample; alternatives are not specifications of the set shown.',
			),
		),
		'womens-wool-jacquard-set' => array(
			'slug' => 'womens-wool-jacquard-base-layer-set',
			'seo_title' => "Women's Wool Jacquard Base-Layer Set | Athletik Clothing",
			'meta_description' => "Explore a women's jacquard base-layer set with a quarter-zip top and leggings. View four product videos and 240 GSM Merino wool-blend fabric details.",
			'inquiry_category' => 'Merino Wool',
			'social_image' => $jacquard_media_base . 'front-social.jpg',
			'category_slug' => 'merino-wool-manufacturer',
			'category_label' => 'Merino wool',
			'name' => 'Jacquard Merino-Mix Set',
			'title' => "Women's wool jacquard base-layer set",
			'intro' => "This women's set pairs a quarter-zip top with full-length leggings in Merino wool-blend jacquard, with contrasting dark panels. Review the sample's pattern, fit and silhouette as a reference for your own product brief.",
			'summary' => 'A matching quarter-zip top and leggings with geometric Merino wool-blend jacquard and contrasting dark panels.',
			'characteristics' => 'Next-to-skin comfort · Warmth · Breathability',
			'material' => 'merino',
			'material_label' => 'Merino wool',
			'sample_material' => 'Merino wool-blend jacquard',
			'composition' => 'Main jacquard: 65% Polyester / 25% Merino wool / 10% Nylon',
			'merino_content' => '25% in the main jacquard fabric',
			'gsm' => '240 GSM (main jacquard)',
			'fabric_ref' => 'HY254931 (jacquard) / HY254888 (panels)',
			'use' => 'Base layering',
			'search' => "women womens jacquard merino wool mix blend base layer quarter zip top leggings set HY254931 HY254888 240 GSM polyester nylon black grey",
			'media' => array(
				'images' => $jacquard_images,
				'video' => $jacquard_videos['overview'],
				'videos' => $jacquard_videos,
			),
			'options' => array(
				'intro' => 'Use this matching set as a reference. Discuss the style, fit and material choices below against your own product brief.',
				'groups' => array(
					array(
						'title' => 'Top development',
						'intro' => 'Style and fit options to discuss for the top.',
						'items' => array(
							'Front opening' => 'Quarter zip / your opening specification',
							'Fit' => 'Close fit / regular fit',
							'Body length' => 'Hip length / longline',
							'Sizing' => 'Your size chart / reference sample',
						),
					),
					array(
						'title' => 'Leggings development',
						'intro' => 'Waist and length options to discuss for the leggings.',
						'items' => array(
							'Rise' => 'Mid rise / high rise',
							'Waistband' => 'Narrow / wide waistband',
							'Leg length' => 'Full length / 7/8 length',
							'Sizing' => 'Your size chart / reference sample',
						),
					),
				),
				'shared_title' => 'Shared options for the set',
				'shared' => array(
					'Fabric' => 'Merino wool-blend jacquard; composition, GSM and panel fabrics reviewed against your product brief.',
					'Pattern and colour' => 'Your supplied artwork, pattern placement and colour references, reviewed for production feasibility.',
					'Labels and branding' => 'Woven or printed labels, care labels, and logo placement to suit the brand.',
					'Packaging' => 'Packed together as a set or as individually packed pieces, with your specified hangtags.',
				),
				'note' => 'Final choices depend on the selected fabric and approved sample; these alternatives are not specifications of the set shown.',
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
