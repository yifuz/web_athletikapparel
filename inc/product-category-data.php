<?php
/**
 * Product category page data.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get one related page link.
 *
 * @param string $label Link label.
 * @param string $url   Site-relative URL.
 * @return array
 */
function myathletik_related_link( $label, $url ) {
	return array(
		'label' => $label,
		'url'   => $url,
	);
}

/**
 * Get one gallery image.
 *
 * @param string $image Image path under assets/images.
 * @param string $alt   Image alt text.
 * @return array
 */
function myathletik_gallery_item( $image, $alt ) {
	return array(
		'image' => $image,
		'alt'   => $alt,
	);
}

/**
 * Get an image path from the auxiliary image folder.
 *
 * The folder name is stored as an HTML entity so Windows encoding does not
 * corrupt the non-ASCII path in this PHP source file.
 *
 * @param string $filename Image file name.
 * @return string
 */
function myathletik_aux_image( $filename ) {
	return html_entity_decode( '&#36741;&#22270;', ENT_QUOTES, 'UTF-8' ) . '/' . $filename;
}

/**
 * Get the product category page configuration.
 *
 * @return array
 */
function myathletik_product_category_data() {
	return array(
		'sportswear-manufacturer' => array(
			'title'            => __( 'Sportswear', 'myathletik-child' ),
			'seo_title'        => __( 'Sportswear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Sportswear manufacturer for gym, training, running, and yoga activewear - flatlock and activeseam construction in power-stretch and moisture-wicking knits.', 'myathletik-child' ),
			'h1'               => __( 'Sportswear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/sportswear/',
			'intro'            => __( 'Sportswear programs for gym, training, running, and studio applications, developed around the buyer\'s fit, movement, fabric, finish, and testing requirements. We produce tight, fitted, and compression silhouettes for B2B activewear brands, with specifications confirmed through material selection and approved samples.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Training tops, tanks, and tees', 'myathletik-child' ),
				__( 'Leggings, shorts, and compression pieces', 'myathletik-child' ),
				__( 'Yoga and studio wear', 'myathletik-child' ),
				__( 'Running singlets and performance layers', 'myathletik-child' ),
			),
			// Structured sub-category showcase: image + title + description.
			// When present, the template renders these as alternating detail
			// blocks instead of the plain what_we_make text list.
			'subcategories'    => array(
				array(
					'title'       => __( 'Training tops, tanks, and tees', 'myathletik-child' ),
					'description' => __( 'Close-fit training tops developed for range-of-motion requirements. FLATLOCK construction can be specified for a low-profile seam, while fabric stretch/recovery and wash-performance targets should be confirmed against the selected material, buyer test criteria, and approved sample.', 'myathletik-child' ),
					'image'       => 'sportswear/IMG_3515_4x3.png',
					'image_alt'    => __( 'Model wearing a heathered performance training tank with printed leggings', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'sportswear/training-tops-480-lossless.webp',
						640  => 'sportswear/training-tops-640-lossless.webp',
						800  => 'sportswear/training-tops-800-lossless.webp',
						1024 => 'sportswear/training-tops-1024-lossless.webp',
						1200 => 'sportswear/training-tops-1200-lossless.webp',
						1448 => 'sportswear/training-tops-1448-lossless.webp',
					),
				),
				array(
					'title'       => __( 'Leggings, shorts, and compression pieces', 'myathletik-child' ),
					'description' => __( 'High-stretch leggings, shorts, and compression pieces - including graduated compression programs where specified - can be developed with power-band waistbands, 4-way-stretch, and power-stretch knits. Opacity, including squat-proof targets, compression level, moisture management, and waistband recovery should be specified for the selected material and confirmed during sampling and project-specific testing.', 'myathletik-child' ),
					'image'       => 'sportswear/1U128568_4x3_background_extended_final_v2.png',
					'image_alt'    => __( 'Model demonstrating stretch in black high-rise performance leggings', 'myathletik-child' ),
					'image_width'  => 2732,
					'image_height' => 2049,
					'image_webp'   => array(
						480  => 'sportswear/compression-leggings-shorts-480-lossless.webp',
						640  => 'sportswear/compression-leggings-shorts-640-lossless.webp',
						800  => 'sportswear/compression-leggings-shorts-800-lossless.webp',
						1024 => 'sportswear/compression-leggings-shorts-1024-lossless.webp',
						1200 => 'sportswear/compression-leggings-shorts-1200-lossless.webp',
						1800 => 'sportswear/compression-leggings-shorts-1800-lossless.webp',
					),
				),
				array(
					'title'       => __( 'Yoga and studio wear', 'myathletik-child' ),
					'description' => __( 'Yoga and studio styles can be developed with soft-drape knit options and FLATLOCK construction where a low-profile seam is required. Hand feel, seam placement, stretch/recovery, and next-to-skin comfort should be reviewed on the actual fabric and garment sample.', 'myathletik-child' ),
					'image'       => 'sportswear/1U128579_4X3.png',
					'image_alt'    => __( 'Back view of black yoga leggings with a high-rise waistband and phone pocket', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'sportswear/yoga-studio-wear-480-lossless.webp',
						640  => 'sportswear/yoga-studio-wear-640-lossless.webp',
						800  => 'sportswear/yoga-studio-wear-800-lossless.webp',
						1024 => 'sportswear/yoga-studio-wear-1024-lossless.webp',
						1200 => 'sportswear/yoga-studio-wear-1200-lossless.webp',
						1448 => 'sportswear/yoga-studio-wear-1448-lossless.webp',
					),
				),
				array(
					'title'       => __( 'Running singlets and performance layers', 'myathletik-child' ),
					'description' => __( 'Running singlets and performance layers can be developed with lightweight knits, mesh ventilation zones, and project-specific moisture-wicking or quick-dry options. Required performance depends on the selected fabric and finish and should be confirmed against buyer test criteria.', 'myathletik-child' ),
					'image'       => 'sportswear/IMG_7601_4X3.png',
					'image_alt'    => __( 'Model wearing a red long-sleeve athletic performance layer', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'sportswear/running-singlets-layers-480-lossless.webp',
						640  => 'sportswear/running-singlets-layers-640-lossless.webp',
						800  => 'sportswear/running-singlets-layers-800-lossless.webp',
						1024 => 'sportswear/running-singlets-layers-1024-lossless.webp',
						1200 => 'sportswear/running-singlets-layers-1200-lossless.webp',
						1448 => 'sportswear/running-singlets-layers-1448-lossless.webp',
					),
				),
			),
			'construction'     => __( 'Construction options include FLATLOCK and, where specified for the program, ACTIVESEAM, together with power-stretch and 4-way-stretch knit options. Moisture management, quick-dry, UV protection, and antimicrobial performance can be developed through material selection and finishing options. The required result should be confirmed for the actual fabric and garment against the agreed test method and acceptance criteria.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real sportswear product / production shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'sportswear/flatlock-athletic-800-17.jpg', __( 'Technical sportswear construction sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'sportswear/flatlock-athletic-800-42-1.jpg', __( 'Performance knit sportswear product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'sportswear/IMG_7836-1-scaled.jpg', __( 'Sportswear garment sample for activewear production', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-10.jpg' ), __( 'Flatlock activewear garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-12.jpg' ), __( 'Performance sportswear flatlock detail', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-13.jpg' ), __( 'Technical sportswear OEM/ODM sample', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Underwear Manufacturer', 'myathletik-child' ), '/underwear-manufacturer/' ),
				myathletik_related_link( __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ), '/outdoor-clothing-manufacturer/' ),
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'underwear-manufacturer' => array(
			'title'            => __( 'Underwear', 'myathletik-child' ),
			'seo_title'        => __( 'Underwear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Underwear manufacturer for flatlock, activeseam, bonded-welded, microfiber, merino wool, and technical OEM/ODM underwear programs.', 'myathletik-child' ),
			'h1'               => __( 'Underwear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/underwear/',
			'hero_video'       => 'underwear/underwear-hero-black-white-base-layer.mp4',
			'hero_video_position' => 'center 18%',
			'intro'            => __( 'We specialize in technical and performance underwear - flatlock, activeseam, and bonded-welded construction for a smooth, seamless feel against the skin. A trusted production partner for underwear brands, importers, and private labels worldwide.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Men\'s boxer shorts and briefs', 'myathletik-child' ),
				__( 'Thermal base layers and underwear', 'myathletik-child' ),
				__( '4-way-stretch performance underwear', 'myathletik-child' ),
				__( 'Microfiber and merino wool underwear', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Men\'s boxer shorts and briefs', 'myathletik-child' ),
					'description' => __( 'Classic and trunk-length boxers with flatlock seams that stay smooth against the skin. Contoured pouches and stay-put waistbands engineered for everyday comfort.', 'myathletik-child' ),
					'image'       => 'underwear/boxer-brief-4x3-1600x1200.jpg',
				),
				array(
					'title'       => __( 'Thermal base layers and underwear', 'myathletik-child' ),
					'description' => __( 'Next-to-skin thermal tops and bottoms in brushed-back, fleece-lined, and performance knits. The full base-layer program for cold-weather brands - moisture-moving against the skin, warm without bulk, flatlock seams that stay comfortable under a pack hipbelt or harness.', 'myathletik-child' ),
					'image'       => 'underwear/IMG_7661_4X3.jpg',
				),
				array(
					'title'       => __( '4-way-stretch performance underwear', 'myathletik-child' ),
					'description' => __( 'High-stretch performance underwear that moves with the body during active use. Quick-dry and shape-retentive knits for sport and travel.', 'myathletik-child' ),
					'image'       => 'underwear/IMG_5675_4x3.jpg',
				),
				array(
					'title'       => __( 'Microfiber and merino wool underwear', 'myathletik-child' ),
					'description' => __( 'Ultra-fine microfiber for a silky hand feel, or natural merino wool for odor resistance and temperature regulation. Both available in flatlock or seamless construction.', 'myathletik-child' ),
					'image'       => 'underwear/1U153309_4x3.jpg',
				),
			),
			'construction'     => __( 'Flatlock and activeseam seams for next-to-skin comfort, plus bonded-welded options for a clean seamless finish. Produced in 4-way stretch, microfiber, and merino wool, with moisture-wicking and antimicrobial finishes available.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real underwear product shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'underwear/boxer-brief-n-trunk-boxer-7.jpg', __( 'Boxer brief and trunk underwear sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_4942-scaled.jpg', __( 'Underwear product sample for OEM/ODM production', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_5054-scaled.jpg', __( 'Technical underwear garment construction sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_5173-scaled.jpg', __( 'Close-to-skin underwear OEM/ODM sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_5512-scaled.jpg', __( 'Technical knit underwear product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_4877-scaled.jpg', __( 'Underwear sample for private-label manufacturing', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Sportswear Manufacturer', 'myathletik-child' ), '/sportswear-manufacturer/' ),
				myathletik_related_link( __( 'Merino Wool Manufacturer', 'myathletik-child' ), '/merino-wool-manufacturer/' ),
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'outdoor-clothing-manufacturer' => array(
			'title'            => __( 'Outdoor Clothing', 'myathletik-child' ),
			'seo_title'        => __( 'Outdoor Clothing Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Outdoor clothing manufacturer for hiking, skiing, and cold-weather layering - thermal base layers, mid-layers, and merino-blend knitwear for outdoor brands.', 'myathletik-child' ),
			'h1'               => __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/outdoor-clothing/',
			'intro'            => __( 'Outdoor clothing built for the elements - hiking, skiing, trekking, and cold-weather layering systems where warmth, moisture transport, and abrasion resistance come first. We produce base layers, mid-layers, and performance tops for outdoor brands whose customers push into conditions sportswear was never meant to handle.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Mid-layer tops and hoodies', 'myathletik-child' ),
				__( 'Cold-weather layering pieces', 'myathletik-child' ),
				__( 'Hiking and trekking knitwear', 'myathletik-child' ),
				__( 'Merino-blend and Genesis fleece insulation layers', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Mid-layer tops and hoodies', 'myathletik-child' ),
					'description' => __( 'Insulating mid-layers in Genesis fleece and thermal knits that trap warm air without restricting movement. Hooded and crew options for layering over a base layer and under a shell.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/IMG_7776(1)_4X3.JPG',
				),
				array(
					'title'       => __( 'Cold-weather layering pieces', 'myathletik-child' ),
					'description' => __( 'Heavier-weight knit tops and bottoms designed for stationary and low-output cold-weather use. Brushed interiors for warmth in hunting blinds, ski lifts, and winter commuting.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/IMG_7874(1)_4X3.JPG',
				),
				array(
					'title'       => __( 'Hiking and trekking knitwear', 'myathletik-child' ),
					'description' => __( 'Durable, abrasion-resistant knits built for repeated days on trail. Merino blends and synthetic performance knits that regulate temperature across long ascents and variable conditions.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/1U153835(1)_4X3.JPG',
				),
				array(
					'title'       => __( 'Merino-blend and Genesis fleece insulation layers', 'myathletik-child' ),
					'description' => __( 'Hybrid insulation blending natural merino warmth with synthetic durability. Genesis fleece options add loft and structure for technical layering systems.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/1U153247(1)_4X3.JPG',
				),
			),
			'construction'     => __( 'Same flatlock and activeseam construction as our sportswear, but in fabrics chosen for the outdoors - thermal knits, merino blends, and Genesis fleece that trap warmth and move moisture away from the skin. The seams that prevent chafing in a gym become, in heavier weights, the durability a hiker needs under a pack strap.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real outdoor clothing shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'outdoor clothing/flatlock-athletic-800-4.jpg', __( 'Outdoor clothing flatlock product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'outdoor clothing/flatlock-athletic-800-50-1.jpg', __( 'Outdoor technical knitwear product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'outdoor clothing/flatlock-athletic-800-54.jpg', __( 'Outdoor base layer garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-3-1.jpg' ), __( 'Outdoor flatlock apparel sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-17.jpg', __( 'Outdoor merino base layer product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-18.jpg', __( 'Outdoor performance base layer sample', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Sportswear Manufacturer', 'myathletik-child' ), '/sportswear-manufacturer/' ),
				myathletik_related_link( __( 'Merino Wool Manufacturer', 'myathletik-child' ), '/merino-wool-manufacturer/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'merino-wool-manufacturer' => array(
			'title'            => __( 'Merino Wool Apparel', 'myathletik-child' ),
			'seo_title'        => __( 'Merino Wool Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Merino wool manufacturer for base layers, underwear, jacquard merino apparel, printed merino pieces, and OEM/ODM performance knit programs.', 'myathletik-child' ),
			'h1'               => __( 'Merino Wool Apparel Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/merino-wool-apparel/',
			'hero_video'       => 'merino wool product/merinowool.mp4',
			// object-position for the hero video crop. 'center top' keeps the
			// head in frame when a portrait subject is cropped to a wide hero.
			'hero_video_position' => 'center 20%',
			'intro'            => __( 'We produce premium merino wool apparel - base layers, underwear, and performance pieces that combine natural temperature regulation and breathability with technical knit construction.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Jacquard merino wool apparel', 'myathletik-child' ),
				__( 'Printed merino wool apparel', 'myathletik-child' ),
				__( 'Merino blend performance pieces', 'myathletik-child' ),
				__( 'Merino yarn sourcing and fabric development', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Jacquard merino wool apparel', 'myathletik-child' ),
					'description' => __( 'Jacquard-knit merino with woven-in patterns and structural textures. The design is knit into the fabric - not printed - so it will not crack, fade, or peel over time. A capability unique to merino programs with our gauge range.', 'myathletik-child' ),
					'image'       => 'merino wool product/showcase_4X3.jpeg',
				),
				array(
					'title'       => __( 'Printed merino wool apparel', 'myathletik-child' ),
					'description' => __( 'All-over and placement-printed merino for brands that need custom graphics on natural-fiber knitwear. Prints are developed and tested in-house for color fastness on protein fibers.', 'myathletik-child' ),
					'image'       => 'merino wool product/1U153433_4X3.JPG',
				),
				array(
					'title'       => __( 'Merino blend performance pieces', 'myathletik-child' ),
					'description' => __( 'Merino blended with synthetic fibers for added stretch, durability, and shape retention. The performance of technical knit with the hand feel of natural wool - engineered for brands that need merino warmth without merino fragility.', 'myathletik-child' ),
					'image'       => 'merino wool product/1U153813_4X3.JPG',
				),
				array(
					'title'       => __( 'Merino yarn sourcing and fabric development', 'myathletik-child' ),
					'description' => __( 'The merino capability starts at the yarn - we source fine-micron merino and develop the knit structure, gauge, and finish in-house. Brands can specify micron count, yarn count, and fabric weight, and we produce counter samples from swatches.', 'myathletik-child' ),
					'image'       => 'merino wool product/Merino Yarn Sourcing.png',
				),
			),
			'construction'     => __( 'Natural merino wool engineered for warmth, breathability, and odor resistance, finished with flatlock and activeseam construction. Available in jacquard and printed designs, plain or blended for added stretch and durability.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real merino wool product shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-19.jpg', __( 'Merino wool apparel product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-12.jpg', __( 'Merino wool technical knitwear sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-13.jpg', __( 'Merino wool base layer product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-14.jpg', __( 'Merino wool OEM/ODM garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-15.jpg', __( 'Merino wool outdoor apparel sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-20.jpg', __( 'Merino wool base layer manufacturing sample', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Underwear Manufacturer', 'myathletik-child' ), '/underwear-manufacturer/' ),
				myathletik_related_link( __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ), '/outdoor-clothing-manufacturer/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'silk-wear-manufacturer' => array(
			'title'            => __( 'Silk Wear', 'myathletik-child' ),
			'seo_title'        => __( 'Silk Wear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Silk wear manufacturer for knitted silk base layers, silk underwear, lightweight performance apparel, and OEM/ODM silk-blend knit pieces.', 'myathletik-child' ),
			'h1'               => __( 'Silk Wear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/silk-wear/',
			'intro'            => __( 'We manufacture knitted silk wear - lightweight, breathable base layers and apparel that pair the natural comfort of silk with technical garment construction for premium brands.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Silk base layers and underwear', 'myathletik-child' ),
				__( 'Lightweight silk performance apparel', 'myathletik-child' ),
				__( 'Silk-blend knit pieces', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Silk base layers and underwear', 'myathletik-child' ),
					'description' => __( 'Ultra-lightweight knitted silk base layers unique to silk programs - pack down smaller and feel lighter on the body than any other fiber we work with. Natural temperature regulation for travel and four-season layering.', 'myathletik-child' ),
					'image'       => 'silkwear/IMG_5784.jpg',
				),
				array(
					'title'       => __( 'Lightweight silk performance apparel', 'myathletik-child' ),
					'description' => __( 'Breathable silk tops and bottoms for warm-weather and indoor activity. The natural luster and drape of silk give a finish no synthetic fiber can replicate - for premium brands where hand feel is the differentiator.', 'myathletik-child' ),
					'image'       => 'silkwear/IMG_5393.jpg',
				),
				array(
					'title'       => __( 'Silk-blend knit pieces', 'myathletik-child' ),
					'description' => __( 'Silk blended with cotton, modal, or performance synthetics to add durability and stretch while preserving the silky hand feel. The practical middle ground for brands that want silk character at a more accessible price point.', 'myathletik-child' ),
					'image'       => 'silkwear/IMG_5550.JPG',
				),
			),
			'construction'     => __( 'Soft, breathable knitted silk finished with flatlock and activeseam seams for a smooth, next-to-skin feel. Available plain or blended for added performance.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real silk wear shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'silkwear/IMG_5362.jpg', __( 'Silk wear garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'silkwear/IMG_5393.jpg', __( 'Silk wear product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'silkwear/IMG_5406.jpg', __( 'Silk wear OEM/ODM product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'silkwear/IMG_5424.jpg', __( 'Silk wear garment construction sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'silkwear/IMG_5425.jpg', __( 'Silk wear private-label production sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'silkwear/IMG_5445.jpg', __( 'Silk wear finished garment sample', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Merino Wool Manufacturer', 'myathletik-child' ), '/merino-wool-manufacturer/' ),
				myathletik_related_link( __( 'Underwear Manufacturer', 'myathletik-child' ), '/underwear-manufacturer/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'knitted-fabrics-manufacturer' => array(
			'title'            => __( 'Knitted Fabrics', 'myathletik-child' ),
			'seo_title'        => __( 'Knitted Fabrics Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Knitted fabrics manufacturer for performance, thermal, stretch, Merino wool, and recycled knit programs. Custom development for B2B apparel buyers.', 'myathletik-child' ),
			'h1'               => __( 'Knitted Fabrics Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/knitted-fabrics/',
			'hero_kicker'      => __( 'Custom knit fabric development & supply', 'myathletik-child' ),
			'intro'            => __( 'In addition to finished-garment manufacturing, we support standalone fabric orders and custom development for B2B apparel programs, including performance, thermal, stretch, and functional knits. MOQ varies by fabric and project requirements.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Performance knit fabrics for activewear and underwear', 'myathletik-child' ),
				__( 'Thermal knit fabrics', 'myathletik-child' ),
				__( 'Functional knit options for moisture management, UV protection, antimicrobial requirements, and bamboo charcoal programs', 'myathletik-child' ),
				__( '4-way stretch, power stretch, microfiber, and Merino wool knits', 'myathletik-child' ),
				__( 'Recycled knit programs with project-specific GRS documentation', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Performance knit fabrics for activewear and underwear', 'myathletik-child' ),
					'description' => __( 'Single and double-knit performance fabrics for activewear, underwear, and next-to-skin applications can be developed to target gauge, weight, stretch, and recovery requirements.', 'myathletik-child' ),
					'image'       => 'knitted fabrics/Performance knit fabrics.png',
					'image_alt'    => __( 'Black, navy, grey, and blue performance knit fabric rolls and swatches', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'knitted fabrics/performance-knit-fabrics-480-lossless.webp',
						640  => 'knitted fabrics/performance-knit-fabrics-640-lossless.webp',
						800  => 'knitted fabrics/performance-knit-fabrics-800-lossless.webp',
						1024 => 'knitted fabrics/performance-knit-fabrics-1024-lossless.webp',
						1200 => 'knitted fabrics/performance-knit-fabrics-1200-lossless.webp',
						1448 => 'knitted fabrics/performance-knit-fabrics-1448-lossless.webp',
					),
				),
				array(
					'title'       => __( 'Thermal knit fabrics', 'myathletik-child' ),
					'description' => __( 'Brushed-back and fleece-lined thermal knit options are available in weights suitable for base, mid, and outer layers. Thermal and moisture-management targets must be defined for the selected fabric and confirmed against the agreed test method and acceptance criteria.', 'myathletik-child' ),
					'image'       => 'knitted fabrics/Thermal knit fabrics.png',
					'image_alt'    => __( 'Black, grey, green, and cream thermal knit fabric rolls and swatches', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'knitted fabrics/thermal-knit-fabrics-480-lossless.webp',
						640  => 'knitted fabrics/thermal-knit-fabrics-640-lossless.webp',
						800  => 'knitted fabrics/thermal-knit-fabrics-800-lossless.webp',
						1024 => 'knitted fabrics/thermal-knit-fabrics-1024-lossless.webp',
						1200 => 'knitted fabrics/thermal-knit-fabrics-1200-lossless.webp',
						1448 => 'knitted fabrics/thermal-knit-fabrics-1448-lossless.webp',
					),
				),
				array(
					'title'       => __( 'Functional knit options for moisture management, UV protection, antimicrobial requirements, and bamboo charcoal programs', 'myathletik-child' ),
					'description' => __( 'Functional performance can be developed through fiber or yarn selection, knit construction, or finishing, depending on the project. Required moisture-management, UV-protection, antimicrobial, or odor-control results must be defined for the selected fabric and confirmed against the agreed test method and acceptance criteria.', 'myathletik-child' ),
					'image'       => 'knitted fabrics/Functional Fabrics.png',
					'image_alt'    => __( 'Navy, cream, and grey functional fabric swatches with a surface water droplet', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'knitted fabrics/functional-knit-fabrics-480-lossless.webp',
						640  => 'knitted fabrics/functional-knit-fabrics-640-lossless.webp',
						800  => 'knitted fabrics/functional-knit-fabrics-800-lossless.webp',
						1024 => 'knitted fabrics/functional-knit-fabrics-1024-lossless.webp',
						1200 => 'knitted fabrics/functional-knit-fabrics-1200-lossless.webp',
						1448 => 'knitted fabrics/functional-knit-fabrics-1448-lossless.webp',
					),
				),
				array(
					'title'       => __( '4-way stretch, power stretch, microfiber, and Merino wool knits', 'myathletik-child' ),
					'description' => __( 'High-stretch knit options include power-stretch, microfiber, and fine-gauge Merino wool constructions. Target stretch and recovery, compression, hand feel, and fiber content are specified for the selected fabric and confirmed during development.', 'myathletik-child' ),
					'image'       => 'knitted fabrics/High-stretch performance knits.png',
					'image_alt'    => __( 'Draped navy, black, blue, and beige high-stretch knit fabrics', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'knitted fabrics/high-stretch-performance-knits-480-lossless.webp',
						640  => 'knitted fabrics/high-stretch-performance-knits-640-lossless.webp',
						800  => 'knitted fabrics/high-stretch-performance-knits-800-lossless.webp',
						1024 => 'knitted fabrics/high-stretch-performance-knits-1024-lossless.webp',
						1200 => 'knitted fabrics/high-stretch-performance-knits-1200-lossless.webp',
						1448 => 'knitted fabrics/high-stretch-performance-knits-1448-lossless.webp',
					),
				),
				array(
					'title'       => __( 'Recycled knit programs with project-specific GRS documentation', 'myathletik-child' ),
					'description' => __( 'Recycled polyester and nylon knit programs can be developed when GRS-certified inputs are required. Before a GRS claim is used, certification scope, applicable material, transaction documentation, traceability records, and performance requirements must be confirmed for the specific order.', 'myathletik-child' ),
					'image'       => 'knitted fabrics/recycled fabrics.png',
					'image_alt'    => __( 'Recycled knit fabric rolls with yarn and recycled material samples', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'knitted fabrics/recycled-knit-fabrics-480-lossless.webp',
						640  => 'knitted fabrics/recycled-knit-fabrics-640-lossless.webp',
						800  => 'knitted fabrics/recycled-knit-fabrics-800-lossless.webp',
						1024 => 'knitted fabrics/recycled-knit-fabrics-1024-lossless.webp',
						1200 => 'knitted fabrics/recycled-knit-fabrics-1200-lossless.webp',
						1448 => 'knitted fabrics/recycled-knit-fabrics-1448-lossless.webp',
					),
				),
			),
			'capability_kicker' => __( 'Development & quotation', 'myathletik-child' ),
			'capability_heading' => __( 'Start with a complete fabric brief', 'myathletik-child' ),
			'construction'      => __( 'Send the target composition, yarn and knit structure, GSM, usable width, stretch and recovery, color reference, finish or performance requirement, testing requirement, order quantity, intended application, and delivery destination. Knitting, dyeing, finishing, and testing are coordinated against the approved specification. Swatches, counter samples, lab dips, sample yardage, and approval samples can be arranged as applicable. When certified inputs or third-party testing are required, the applicable standard, documentation, and laboratory scope must be agreed for the selected material and order. Pricing is normally quoted per kg, while other units can be used when required. Final timing, packing, and delivery terms are confirmed in the project quotation.', 'myathletik-child' ),
			'specs'             => array(
				array(
					'label'       => __( 'MOQ', 'myathletik-child' ),
					'value'       => __( 'Varies by fabric and project', 'myathletik-child' ),
					'description' => __( 'Confirmed against the selected fabric specification.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Development', 'myathletik-child' ),
					'value'       => __( 'Typically 2-4 weeks', 'myathletik-child' ),
					'description' => __( 'After a complete brief; sampling scope and approval rounds may change timing.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Bulk lead time', 'myathletik-child' ),
					'value'       => __( 'Typically 4-6 weeks', 'myathletik-child' ),
					'description' => __( 'After specification and color approval; final timing is confirmed in the quotation.', 'myathletik-child' ),
				),
			),
			'image_note'       => __( '[IMAGE: real fabric / knitting shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'knitted fabrics/divazus-fabric-store-FkpXNuifVI0-unsplash.jpg', __( 'Knitted fabric material sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'knitted fabrics/olga-kozachenko-o9dtfshlJ60-unsplash.jpg', __( 'Performance knitted fabric sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'knitted fabrics/engin-akyurt-74OIBwS8cN0-unsplash.jpg', __( 'Knitted textile development sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'knitted fabrics/engin-akyurt-YFsD7DtCy3c-unsplash.jpg', __( 'Fabric development image for knitwear production', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'fabrics-wall.png' ), __( 'Performance fabric wall for knitwear programs', 'myathletik-child' ) ),
				myathletik_gallery_item( 'production/circular-knitting-1-624x417.jpg', __( 'Circular knitting production equipment', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Sportswear Manufacturer', 'myathletik-child' ), '/sportswear-manufacturer/' ),
				myathletik_related_link( __( 'Underwear Manufacturer', 'myathletik-child' ), '/underwear-manufacturer/' ),
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'sports-accessories-manufacturer' => array(
			'title'            => __( 'Sports Accessories', 'myathletik-child' ),
			'seo_title'        => __( 'Sports Accessories Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Sports accessories manufacturer for balaclavas, gloves, liners, technical knit accessories, and OEM/ODM outdoor performance accessory programs.', 'myathletik-child' ),
			'h1'               => __( 'Sports Accessories Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/sports-accessories/',
			'intro'            => __( 'We produce technical knit accessories that complement our apparel range - built with the same flatlock and activeseam construction and performance fabrics as our garments.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Balaclavas', 'myathletik-child' ),
				__( 'Gloves and liners', 'myathletik-child' ),
				__( 'Knit accessories for activewear and outdoor use', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Balaclavas', 'myathletik-child' ),
					'description' => __( 'Full-coverage knit balaclavas in thermal and wind-resistant fabrics. Flatlock and activeseam construction for comfort under a helmet or hood.', 'myathletik-child' ),
					'image'       => 'sports accessories/Balaclavas.png',
				),
				array(
					'title'       => __( 'Gloves and liners', 'myathletik-child' ),
					'description' => __( 'Technical knit glove liners with touchscreen-compatible tips and grip-print palms. Lightweight enough to layer under shell gloves, warm enough to wear alone in mild cold.', 'myathletik-child' ),
					'image'       => 'sports accessories/gloves.png',
				),
				array(
					'title'       => __( 'Knit accessories for activewear and outdoor use', 'myathletik-child' ),
					'description' => __( 'Neck gaiters, headbands, arm sleeves, and other technical knit accessories. Built with the same performance fabrics as our apparel lines - moisture-wicking, thermal, and stretch.', 'myathletik-child' ),
					'image'       => 'sports accessories/sports-accessory-product-category.png',
				),
			),
			'construction'     => __( 'Made with the same technical knit construction and functional fabrics as our apparel - moisture-wicking, thermal, and stretch options for cold-weather and performance use.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real accessories shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'sports accessories/andrew-putman-BzYeoxbJBXI-unsplash.jpg', __( 'Sports accessories program image', 'myathletik-child' ) ),
				myathletik_gallery_item( 'sports accessories/logan-weaver-lgnwvr-IUR1m_NidBQ-unsplash.jpg', __( 'Sports accessory product image', 'myathletik-child' ) ),
				myathletik_gallery_item( 'sports accessories/mieke-campbell-esmxlhT-68w-unsplash.jpg', __( 'Sports accessories OEM/ODM manufacturing image', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-64.jpg' ), __( 'Knit accessory and apparel program sample', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-65.jpg' ), __( 'Technical knit accessory sample', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-66.jpg' ), __( 'Sports accessory private-label sample', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ), '/outdoor-clothing-manufacturer/' ),
				myathletik_related_link( __( 'Sportswear Manufacturer', 'myathletik-child' ), '/sportswear-manufacturer/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
	);
}

/**
 * Get one product category configuration.
 *
 * @param string $slug Category page slug.
 * @return array|null
 */
function myathletik_get_product_category_data( $slug ) {
	$categories = myathletik_product_category_data();

	return isset( $categories[ $slug ] ) ? $categories[ $slug ] : null;
}
