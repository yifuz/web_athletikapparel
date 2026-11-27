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

	$build_portrait_images = static function ( $base, $items ) {
		$out = array();
		foreach ( $items as $key => $meta ) {
			$out[ $key ] = array(
				'src'          => $base . $key . '-1200.webp',
				'thumbnail'    => $base . $key . '-533.webp',
				'srcset'       => $base . $key . '-533.webp 533w, ' . $base . $key . '-1200.webp 800w',
				'width'        => 800,
				'height'       => 1200,
				'thumb_width'  => 533,
				'thumb_height' => 800,
				'caption'      => $meta[0],
				'alt'          => $meta[1],
				'control'      => $meta[2],
			);
		}
		return $out;
	};

	$silver_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/womens-silver-yarn-thermal-set/';
	$silver_images     = $build_portrait_images(
		$silver_media_base,
		array(
			'front'     => array( 'Front view', "Front view of the sky-blue women's long-sleeve top and leggings set with contrast ACTIVESEAM stitching", 'View front' ),
			'side'      => array( 'Side view', "Side view of the sky-blue women's long-sleeve top and leggings set showing raglan sleeve and side seam lines", 'View side' ),
			'back-view' => array( 'Back view', "Back view of the sky-blue women's long-sleeve top and leggings set", 'View back' ),
		)
	);

	$yoga_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/womens-leaf-jacquard-yoga-set/';
	$yoga_images     = $build_portrait_images(
		$yoga_media_base,
		array(
			'front'     => array( 'Front view', "Front view of the slate-grey leaf-and-line jacquard sports bra and high-rise leggings set", 'View front' ),
			'side'      => array( 'Side view', "Side view of the slate-grey leaf-and-line jacquard yoga set showing contoured leg panel seams", 'View side' ),
			'back-view' => array( 'Back view', "Back view of the slate-grey jacquard racerback keyhole sports bra and high-rise leggings", 'View back' ),
		)
	);

	$cycling_media_base = get_stylesheet_directory_uri() . '/assets/images/product-examples/womens-high-vis-cycling-jacket/';
	$cycling_images     = $build_portrait_images(
		$cycling_media_base,
		array(
			'front'     => array( 'Front view', "Front view of the women's fluorescent lime hi-vis UV-protective cycling top with full front zipper and stand collar", 'View front' ),
			'side'      => array( 'Side view', "Side view of the women's fluorescent lime hi-vis UV-protective cycling top showing black sheer mesh underarm gusset and elastic cuff", 'View side' ),
			'back-view' => array( 'Back view', "Back view of the women's fluorescent lime hi-vis UV-protective cycling top with black sheer mesh ventilation panel and rear zippered pocket", 'View back' ),
		)
	);

	$build_landscape_videos = static function ( $base, $items ) {
		$out = array();
		foreach ( $items as $key => $label ) {
			$out[ $key ] = array(
				'src'          => $base . $key . '-1080.mp4',
				'poster'       => $base . $key . '-poster.webp',
				'thumbnail'    => $base . $key . '-thumb.webp',
				'label'        => $label,
				'aspect'       => 'landscape',
				'thumb_width'  => 640,
				'thumb_height' => 360,
			);
		}
		return $out;
	};

	$silver_videos = $build_landscape_videos(
		$silver_media_base,
		array(
			'overview' => 'Full-set overview',
			'motion'   => 'Movement & stretch',
		)
	);
	$yoga_videos = $build_landscape_videos(
		$yoga_media_base,
		array(
			'overview' => 'Full-set overview',
			'stretch'  => 'Stretch & band detail',
			'jacquard' => 'Back jacquard close-up',
		)
	);
	$cycling_videos = $build_landscape_videos(
		$cycling_media_base,
		array(
			'overview'     => 'Full-body overview',
			'zip-and-mesh' => 'Zipper & mesh panels',
			'rear-pocket'  => 'Rear zip pocket detail',
		)
	);

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
		'womens-silver-yarn-thermal-set' => array(
			'slug'             => 'womens-silver-yarn-thermal-set',
			'seo_title'        => "Women's Silver-Yarn Thermal Set | Athletik Clothing",
			'meta_description' => "Explore a women's long-sleeve top and leggings set in Nylon/Modal/Silver Fiber/Spandex (HY244737) with ACTIVESEAM stitching and OEM development options.",
			'inquiry_category' => 'Sportswear',
			'social_image'     => $silver_media_base . 'front-social.jpg',
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'sportswear',
			'name'             => 'Silver-Yarn Thermal Set',
			'title'            => "Women's silver-yarn thermal top & leggings set",
			'intro'            => "This women's two-piece set pairs a crew-neck long-sleeve top with full-length leggings in a Nylon, Modal, Silver Fiber, and Spandex blend (HY244737) constructed with contrast ACTIVESEAM stitching. Review the silhouette, raglan seam layout, and fit as a reference for your own OEM or ODM program.",
			'summary'          => 'A sky-blue long-sleeve top and leggings set in Nylon/Modal/Silver Fiber/Spandex (HY244737) with contrast ACTIVESEAM stitching.',
			'characteristics'  => 'Micro-rib knit texture · Contrast ACTIVESEAM stitching · Raglan sleeve layout',
			'material'         => 'nylon',
			'material_label'   => 'Nylon / Modal blend',
			'sample_material'  => 'Nylon / Modal / Silver Fiber knit',
			'composition'      => '50.5% Nylon / 38% Modal / 4.3% Silver Fiber / 7% Spandex',
			'gsm'              => '',
			'fabric_ref'       => 'HY244737',
			'style_ref'        => 'S2570-A0297',
			'stitching'        => 'ACTIVESEAM',
			'use'              => 'Cool-weather training and active layering',
			'facts'            => array(
				'Sample material'  => 'Nylon / Modal / Silver Fiber knit',
				'Composition'      => '50.5% Nylon / 38% Modal / 4.3% Silver Fiber / 7% Spandex',
				'Fabric reference' => 'HY244737',
				'Style reference'  => 'S2570-A0297',
				'Stitching'        => 'ACTIVESEAM',
				'Suggested use'    => 'Cool-weather training and active layering',
			),
			'facts_note'       => 'Fabric weight (GSM) is confirmed against the approved yarn and sample lot for each program. This record illustrates an actual sample for OEM/ODM reference and is not a stock availability or lab-tested performance guarantee.',
			'search'           => "women womens silver yarn thermal set activewear sportswear HY244737 S2570-A0297 ACTIVESEAM nylon modal silver fiber spandex long sleeve top leggings",
			'media'            => array(
				'aspect'         => 'portrait',
				'caption_suffix' => 'Studio sample photo',
				'images'         => $silver_images,
				'video'          => $silver_videos['overview'],
				'videos'         => $silver_videos,
			),
			'options'          => array(
				'intro'        => 'The top and leggings are developed around a coordinated fabric and seam layout. Review the options below for your OEM or ODM sportswear brief.',
				'shared_title' => 'Shared options for the set',
				'groups'       => array(
					array(
						'title' => 'Top development',
						'intro' => 'Pattern, sleeve, and seam options to discuss for the top.',
						'items' => array(
							'Neckline'     => 'Crew neck / mock neck',
							'Sleeve style' => 'Raglan sleeve / set-in sleeve',
							'Stitching'    => 'ACTIVESEAM / FLATLOCK / contrast or tonal thread',
							'Sizing'       => 'Your size chart / reference sample',
						),
					),
					array(
						'title' => 'Leggings development',
						'intro' => 'Waistband, panel, and length options for the leggings.',
						'items' => array(
							'Rise'       => 'Mid rise / high rise',
							'Panel seams'=> 'Side and inseam ACTIVESEAM / custom seam lines',
							'Leg length' => 'Full length / 7/8 length',
							'Sizing'     => 'Your size chart / reference sample',
						),
					),
				),
				'shared'       => array(
					'Fabric'              => 'HY244737 Nylon / Modal / Silver Fiber / Spandex blend or alternative target GSM and fiber ratios reviewed per project.',
					'MOQ baseline'        => 'Standard entry starting at 500 pieces per style; custom fabric minimums and colour splits confirmed during review.',
					'Labels and branding' => 'Woven or heat-transfer labels, care labels, and custom packaging developed to buyer specification.',
					'Testing requirements'=> 'Define required wash, shrinkage, or fiber tests and acceptance criteria for the target market.',
				),
				'note'         => 'Final choices depend on the selected fabric and approved sample; these development alternatives are not stock availability or lab-tested performance guarantees.',
			),
		),
		'womens-leaf-jacquard-yoga-set' => array(
			'slug'             => 'womens-leaf-jacquard-yoga-set',
			'seo_title'        => "Women's Leaf Jacquard Yoga Set | Athletik Clothing",
			'meta_description' => "Explore a women's leaf-and-line jacquard sports bra and high-rise leggings set in 270 GSM polyester/spandex (HY265075) with photos, videos, and OEM options.",
			'inquiry_category' => 'Sportswear',
			'social_image'     => $yoga_media_base . 'front-social.jpg',
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'sportswear',
			'name'             => 'Leaf Jacquard Yoga Set',
			'title'            => "Women's leaf-and-line jacquard yoga set",
			'intro'            => "This women's yoga set combines a racerback keyhole sports bra and high-rise leggings in 270 GSM leaf-and-line jacquard knit (HY265075). Review the knit-in jacquard pattern, underbust band, and contoured waistband as a reference for your own sportswear brief.",
			'summary'          => 'A slate-grey sports bra and high-rise leggings set in 270 GSM leaf-and-line jacquard knit (HY265075).',
			'characteristics'  => 'Knit-in leaf-and-line jacquard · Keyhole racerback bra · High-rise contoured waistband',
			'material'         => 'polyester',
			'material_label'   => 'Polyester jacquard',
			'sample_material'  => 'Polyester / Spandex leaf-and-line jacquard',
			'composition'      => '85% Polyester / 15% Spandex',
			'gsm'              => '270 GSM',
			'fabric_ref'       => 'HY265075',
			'use'              => 'Yoga, studio training, and activewear sets',
			'facts_note'       => 'This record describes an actual sample for OEM/ODM reference and is not a stock availability or lab-tested performance guarantee. Opacity, support level, and waistband recovery are confirmed on the approved sample.',
			'search'           => "women womens leaf line jacquard yoga set sports bra high rise leggings HY265075 270 GSM polyester spandex activewear sportswear",
			'media'            => array(
				'aspect'         => 'portrait',
				'caption_suffix' => 'Studio sample photo',
				'images'         => $yoga_images,
				'video'          => $yoga_videos['overview'],
				'videos'         => $yoga_videos,
			),
			'options'          => array(
				'intro'        => 'Use this matching bra and leggings set as a starting point for custom jacquard activewear development.',
				'shared_title' => 'Shared options for the set',
				'groups'       => array(
					array(
						'title' => 'Sports bra development',
						'intro' => 'Support, back opening, and strap options for the bra.',
						'items' => array(
							'Back design'   => 'Racerback keyhole / cross-back / open scoop',
							'Underbust band'=> 'Wide self-fabric band / encased elastic',
							'Padding'       => 'Removable cup pockets / unpadded',
							'Sizing'        => 'Your size chart / reference sample',
						),
					),
					array(
						'title' => 'High-rise leggings development',
						'intro' => 'Waistband, seam, and length options for the leggings.',
						'items' => array(
							'Waistband'  => 'Contoured high-rise V-front / straight band',
							'Leg length' => 'Full length / 7/8 length / biker short',
							'Pockets'    => 'Clean panel / hidden waistband or side pocket',
							'Sizing'     => 'Your size chart / reference sample',
						),
					),
				),
				'shared'       => array(
					'Jacquard fabric'     => 'HY265075 270 GSM 85% Polyester / 15% Spandex jacquard, or custom jacquard artwork and weight reviewed per brief.',
					'MOQ baseline'        => 'Standard entry starting at 500 pieces per style; custom jacquard pattern and colour splits reviewed by project.',
					'Labels and branding' => 'Woven or heat-transfer labels, care labels, and custom packaging developed to suit the brand.',
					'Testing requirements'=> 'Confirm stretch, recovery, colourfastness, and opacity criteria on the approved pre-production sample.',
				),
				'note'         => 'Final choices depend on the selected fabric and approved sample; these development alternatives are not stock availability or lab-tested performance guarantees.',
			),
		),
		'womens-high-vis-cycling-jacket' => array(
			'slug'             => 'womens-high-vis-cycling-jacket',
			'seo_title'        => "Women's Hi-Vis UV-Protective Cycling Top | Athletik Clothing",
			'meta_description' => "Explore a women's hi-vis UV-protective cycling top in 40 GSM 100% nylon (HY265135) with mesh ventilation panels, rear zip pocket, and OEM options.",
			'inquiry_category' => 'Sportswear',
			'social_image'     => $cycling_media_base . 'front-social.jpg',
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'sportswear',
			'name'             => 'Hi-Vis UV-Protective Cycling Top',
			'title'            => "Women's hi-vis UV-protective cycling top",
			'intro'            => "This women's hi-vis UV-protective cycling top pairs a 40 GSM 100% nylon main fabric (HY265135) in high-visibility fluorescent lime with black sheer mesh back and underarm ventilation panels, a stand collar, full front zipper, and a rear zippered pocket.",
			'summary'          => 'A fluorescent lime hi-vis UV-protective cycling top in 40 GSM 100% nylon (HY265135) with sheer mesh ventilation panels and a rear zippered pocket.',
			'characteristics'  => 'Hi-vis UV-protective 40 GSM nylon · Mesh ventilation panels · Rear zippered pocket',
			'material'         => 'nylon',
			'material_label'   => 'Nylon',
			'sample_material'  => 'Lightweight woven nylon shell with mesh panels',
			'composition'      => 'Main shell: 100% Nylon',
			'gsm'              => '40 GSM (main shell)',
			'fabric_ref'       => 'HY265135',
			'use'              => 'Cycling, sun-exposed rides, and high-visibility outdoor training',
			'facts_note'       => 'Composition and 40 GSM apply to the main shell fabric (HY265135), not the sheer mesh panels or trims. UV-protective positioning is verified per the buyer’s specified test method; this record is not a stock availability or lab-tested performance guarantee.',
			'search'           => "women womens ladies hi vis high vis UV protective cycling top jacket shell windbreaker fluorescent lime green 40 GSM 100 nylon HY265135 mesh ventilation rear zip pocket sportswear",
			'media'            => array(
				'aspect'         => 'portrait',
				'caption_suffix' => 'Studio sample photo',
				'images'         => $cycling_images,
				'video'          => $cycling_videos['overview'],
				'videos'         => $cycling_videos,
			),
			'options'          => array(
				'intro'        => 'Review the lightweight shell, ventilation panels, and pocket details below for your OEM or ODM cycling and running outerwear brief.',
				'shared_title' => 'Program and finishing options',
				'groups'       => array(
					array(
						'title' => 'Cycling top & pocket development',
						'intro' => 'Silhouette, closure, and storage choices for the outer shell.',
						'items' => array(
							'Collar & zip'  => 'Stand collar with full-length zipper / garage guard',
							'Ventilation'   => 'Upper-back & underarm mesh panels / laser-perforated zones',
							'Rear pocket'   => 'Lower-back zippered pocket / packable stow pocket',
							'Cuffs & hem'   => 'Elastic binding / dropped curved cycling tail',
						),
					),
					array(
						'title' => 'Shell, mesh & trim development',
						'intro' => 'Material and visibility options to confirm against your brief.',
						'items' => array(
							'Main shell'   => 'HY265135 40 GSM 100% nylon / alternative shell weights',
							'Mesh panels'  => 'Coordinated black or dyed-to-match ventilation mesh',
							'Colourways'   => 'High-visibility fluorescent shades or custom Pantone dye',
							'Sizing'       => 'Your size chart / reference sample',
						),
					),
				),
				'shared'       => array(
					'Testing & UV requirements' => 'UV-protective positioning and seam or abrasion tests verified per the buyer’s specified test method on approved lots.',
					'MOQ baseline'              => 'Standard entry starting at 500 pieces per style; custom dye lots and trim minimums confirmed per program.',
					'Labels and branding'       => 'Reflective transfers, woven labels, care labels, and custom packaging developed to buyer specification.',
					'Packaging'                 => 'Individual polybag or custom retail hangtag and pack-out specifications.',
				),
				'note'         => 'Final choices depend on the selected fabrics, trims, and approved sample; these alternatives are not stock availability or lab-tested performance guarantees.',
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
