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
 * Get one responsive product showcase image.
 *
 * @param string $image   JPEG fallback path under assets/images.
 * @param string $alt     Descriptive image alt text.
 * @param string $caption Short visible product label.
 * @param array  $webp    Responsive WebP paths keyed by pixel width.
 * @return array
 */
function myathletik_product_showcase_item( $image, $alt, $caption, $webp ) {
	return array(
		'image'        => $image,
		'alt'          => $alt,
		'caption'      => $caption,
		'image_width'  => 800,
		'image_height' => 800,
		'image_webp'   => $webp,
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
 * SEO field truth source (SEO-IMP-011): the `seo_title` and `meta_description`
 * values below are NOT the live meta tags. For the six garment categories the
 * production <title> and meta description come from the Rank Math fields in
 * the WordPress admin (canonical text: seo-tags.md); editing the values here
 * does not change production output. The ONLY exception is
 * `knitted-fabrics-manufacturer`, whose `meta_description` is read by the
 * filters in rank-math.php (auto-loaded by the Rank Math plugin itself, not by
 * functions.php) for the frontend/OG/Twitter description and the WebPage
 * schema description.
 *
 * @return array
 */
function myathletik_product_category_data() {
	return array(
		'sportswear-manufacturer' => array(
			'title'            => __( 'Sportswear', 'myathletik-child' ),
			'seo_title'        => __( 'Sportswear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Sportswear manufacturer for gym, training, running, and yoga activewear - FLATLOCK and ACTIVESEAM construction in power-stretch and moisture-wicking knits.', 'myathletik-child' ),
			'h1'               => __( 'Sportswear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/sportswear/',
			'social_image'        => 'sportswear/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Model wearing a red technical sportswear set', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'hero_video'          => 'sportswear/sportswear-mens-olive-training-set-hero.mp4',
			'hero_video_poster'   => 'sportswear/sportswear-mens-olive-training-set-hero-poster.webp',
			'hero_video_position' => 'center center',
			'hero_video_variant'  => 'split',
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
			'assurance_kicker'  => __( 'Program execution', 'myathletik-child' ),
			'assurance_heading' => __( 'Sportswear customization and quality checkpoints', 'myathletik-child' ),
			'assurance_intro'   => __( 'Fit, construction, material, finish, and inspection criteria should be recorded in the current specification and approved sample so bulk production can be reviewed against the same requirements.', 'myathletik-child' ),
			'assurance_cards'   => array(
				array(
					'title'       => __( 'Program customization', 'myathletik-child' ),
					'description' => __( 'Training, running, yoga, and compression programs can be developed around the buyer\'s tech pack, approved reference sample, intended activity, and target fit.', 'myathletik-child' ),
					'items'       => array(
						__( 'FLATLOCK or ACTIVESEAM construction specified by garment location and material', 'myathletik-child' ),
						__( 'Power-band waistbands and mesh ventilation zones where specified', 'myathletik-child' ),
						__( '4-way-stretch and power-stretch knit selection for the intended silhouette', 'myathletik-child' ),
						__( 'Moisture management, quick-dry, UV protection, or antimicrobial targets confirmed for the selected fabric and finish', 'myathletik-child' ),
					),
				),
				array(
					'title'       => __( 'Sportswear quality checkpoints', 'myathletik-child' ),
					'description' => __( 'Inspection criteria are set against the current tech pack or specification, approved sample, and buyer acceptance criteria for the program.', 'myathletik-child' ),
					'items'       => array(
						__( 'Measurements and fit against the approved sample', 'myathletik-child' ),
						__( 'Seam placement, appearance, and extension for the specified construction', 'myathletik-child' ),
						__( 'Waistband attachment and recovery, including specified mesh placement', 'myathletik-child' ),
						__( 'Fabric stretch, recovery, opacity, and agreed performance criteria', 'myathletik-child' ),
					),
					'link'        => myathletik_related_link( __( 'Review the Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				),
			),
			'buyer_questions_heading' => __( 'Questions buyers ask before starting a sportswear program', 'myathletik-child' ),
			'buyer_questions' => array(
				array(
					'question' => __( 'What is the MOQ for sportswear?', 'myathletik-child' ),
					'answer'   => sprintf( __( 'The public garment MOQ is %s pieces per style. Material, color and size allocation, sampling, testing, and final production terms are confirmed in the project quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'question' => __( 'What should a buyer define before sportswear sampling?', 'myathletik-child' ),
					'answer'   => __( 'Provide the product type, intended activity, target market, size range, fit target, tech pack or reference sample, fabric and construction requirements, performance and testing criteria, estimated quantity, and required timing.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'How are sportswear performance targets confirmed?', 'myathletik-child' ),
					'answer'   => __( 'Opacity, compression, moisture management, quick-dry, wash performance, and other targets should be defined for the actual material and garment with an agreed test method and acceptance criteria. The result is then confirmed through approved samples and project-specific testing.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can a program combine technical construction and custom panels?', 'myathletik-child' ),
					'answer'   => __( 'FLATLOCK, ACTIVESEAM, power-band waistbands, mesh ventilation zones, and stretch-knit options can be developed where they suit the design. The final combination is confirmed against the garment location, selected material, tech pack, and approved sample.', 'myathletik-child' ),
				),
			),
			'image_note'       => __( '[IMAGE: real sportswear product / production shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'sportswear/flatlock-athletic-800-17.jpg', __( 'Technical sportswear construction sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'sportswear/flatlock-athletic-800-42-1.jpg', __( 'Performance knit sportswear product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'sportswear/IMG_7836-1-scaled.jpg', __( 'Sportswear garment sample for activewear production', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-10.jpg' ), __( 'FLATLOCK activewear garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-12.jpg' ), __( 'Performance sportswear FLATLOCK detail', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-13.jpg' ), __( 'Technical sportswear OEM/ODM sample', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Underwear Manufacturer', 'myathletik-child' ), '/underwear-manufacturer/' ),
				myathletik_related_link( __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ), '/outdoor-clothing-manufacturer/' ),
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'underwear-manufacturer' => array(
			'title'            => __( 'Underwear', 'myathletik-child' ),
			'seo_title'        => __( 'Underwear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Underwear manufacturer for FLATLOCK, ACTIVESEAM, bonded-welded, microfiber, merino wool, and technical OEM/ODM underwear programs.', 'myathletik-child' ),
			'h1'               => __( 'Underwear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/underwear/',
			'social_image'        => 'underwear/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Model wearing technical boxer briefs', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'hero_video'       => 'underwear/underwear-hero-black-white-base-layer.mp4',
			'hero_video_position' => 'center 18%',
			'hero_kicker'      => __( 'Performance underwear OEM/ODM', 'myathletik-child' ),
			'intro'            => __( 'We manufacture performance underwear, men\'s boxer briefs, and thermal base layers from knitted fabrics for brands, importers, and private-label programs. Development can combine FLATLOCK, ACTIVESEAM, or bonded-welded construction with microfiber, stretch, and Merino wool materials, based on the intended use, fit, and approved specification.', 'myathletik-child' ),
			'overview_heading' => __( 'Performance underwear programs', 'myathletik-child' ),
			'product_range_heading' => __( 'Performance underwear products we manufacture', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Men\'s boxer briefs, trunks, and briefs', 'myathletik-child' ),
				__( 'Thermal base layers and underwear', 'myathletik-child' ),
				__( '4-way-stretch performance underwear', 'myathletik-child' ),
				__( 'Microfiber and Merino wool underwear', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Men\'s boxer briefs, trunks, and briefs', 'myathletik-child' ),
					'description' => __( 'Men\'s boxer briefs, trunks, and briefs developed around the target fit, pouch shape, waistband, leg opening, and fabric stretch. Seam placement and construction, such as FLATLOCK at selected next-to-skin joins, are confirmed against the buyer\'s tech pack and approved sample.', 'myathletik-child' ),
					'image'       => 'underwear/boxer-brief-4x3-1600x1200.jpg',
					'image_alt'    => __( 'Close-up of gray patterned technical boxer briefs with contoured seams', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'underwear/boxer-briefs-480-q85.webp',
						800  => 'underwear/boxer-briefs-800-q85.webp',
						1200 => 'underwear/boxer-briefs-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Thermal base layers and underwear', 'myathletik-child' ),
					'description' => __( 'Long-sleeve tops and full-length bottoms for cold-weather layering, in brushed-back, fleece-lined, or performance knits. Fabric weight, warmth target, stretch, seam map, and layering fit are defined for the end use, then reviewed on material and garment samples.', 'myathletik-child' ),
					'image'       => 'underwear/IMG_7661_4X3.jpg',
					'image_alt'    => __( 'Model wearing a black patterned thermal base-layer set', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'underwear/thermal-base-layers-480-q85.webp',
						800  => 'underwear/thermal-base-layers-800-q85.webp',
						1200 => 'underwear/thermal-base-layers-1200-q85.webp',
					),
				),
				array(
					'title'       => __( '4-way-stretch performance underwear', 'myathletik-child' ),
					'description' => __( 'Close-fitting underwear for training, running, travel, and other active use. Material development can address stretch and recovery, moisture management, hand feel, and drying requirements; the required performance should be confirmed on the selected fabric and finished garment against the buyer\'s criteria.', 'myathletik-child' ),
					'image'       => 'underwear/IMG_5675_4x3.jpg',
					'image_alt'    => __( 'Model wearing a purple long-sleeve performance underwear set', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'underwear/stretch-performance-underwear-480-q85.webp',
						800  => 'underwear/stretch-performance-underwear-800-q85.webp',
						1200 => 'underwear/stretch-performance-underwear-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Microfiber and Merino wool underwear', 'myathletik-child' ),
					'description' => __( 'Microfiber options support a smooth hand and lightweight feel; Merino wool options suit projects prioritizing temperature regulation and odor-management properties. Fiber content, fabric weight, stretch, recovery, and care requirements are specified before sampling, with FLATLOCK, ACTIVESEAM, or other seam construction chosen by application.', 'myathletik-child' ),
					'image'       => 'underwear/1U153309_4x3.jpg',
					'image_alt'    => __( 'Model wearing a pink patterned long underwear set', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'underwear/microfiber-merino-underwear-480-q85.webp',
						800  => 'underwear/microfiber-merino-underwear-800-q85.webp',
						1200 => 'underwear/microfiber-merino-underwear-1200-q85.webp',
					),
				),
			),
			'capability_kicker'  => __( 'Development inputs', 'myathletik-child' ),
			'capability_heading' => __( 'Define fit, fabric, and seam performance before sampling', 'myathletik-child' ),
			'construction'      => sprintf( __( 'Send the product type, intended activity and climate, target market and delivery destination, size range, target fit, garment drawing or tech pack, reference sample, fabric composition and weight, stretch and recovery targets, seam map, waistband and trim requirements, artwork, private-label packaging requirements, target price range, order quantity, and required testing. Our team can coordinate knitted fabric development through our own fabric mill, review FLATLOCK, ACTIVESEAM, and bonded-welded options, develop samples, and use in-house testing to check the agreed material and garment criteria before bulk production. Public garment MOQ is %s pieces per style; final sampling, testing, and production terms are confirmed for the project.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
			'specs'             => array(
				array(
					'label'       => __( 'MOQ', 'myathletik-child' ),
					'value'       => number_format_i18n( myathletik_public_moq_pieces() ),
					'unit'        => __( 'pcs', 'myathletik-child' ),
					'description' => __( 'Per style.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Sampling', 'myathletik-child' ),
					'value'       => __( '1-2', 'myathletik-child' ),
					'unit'        => __( 'weeks', 'myathletik-child' ),
					'description' => __( 'Depending on style complexity and materials.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Construction', 'myathletik-child' ),
					'value'       => __( 'FLATLOCK / ACTIVESEAM', 'myathletik-child' ),
					'description' => __( 'Seamless and bonded-welded options by project.', 'myathletik-child' ),
				),
			),
			'assurance_kicker'  => __( 'Program execution', 'myathletik-child' ),
			'assurance_heading' => __( 'Private-label customization and underwear quality control', 'myathletik-child' ),
			'assurance_intro'   => __( 'Customization and inspection criteria are recorded in the approved specification so the sample and bulk order can be reviewed against the same requirements.', 'myathletik-child' ),
			'assurance_cards'   => array(
				array(
					'title'       => __( 'Private-label customization', 'myathletik-child' ),
					'description' => __( 'Men\'s and women\'s performance underwear and base-layer programs can be developed to the buyer\'s design, tech pack, or approved reference sample.', 'myathletik-child' ),
					'items'       => array(
						__( 'Custom elastic waistbands with woven or printed branding', 'myathletik-child' ),
						__( 'Main labels, care labels, and private-label packaging', 'myathletik-child' ),
						__( 'Supportive pouch development and mesh ventilation panels', 'myathletik-child' ),
						__( 'Artwork, placement, dimensions, and material compatibility confirmed during sampling', 'myathletik-child' ),
					),
				),
				array(
					'title'       => __( 'Underwear quality checkpoints', 'myathletik-child' ),
					'description' => __( 'The inspection plan is set against the approved sample, specification, and buyer acceptance criteria for the program.', 'myathletik-child' ),
					'items'       => array(
						__( 'Fit and measurements against the approved sample', 'myathletik-child' ),
						__( 'Pouch and panel symmetry, including mesh placement', 'myathletik-child' ),
						__( 'Waistband attachment and recovery', 'myathletik-child' ),
						__( 'Seam appearance and elasticity for the specified construction', 'myathletik-child' ),
						__( 'Fabric stretch, recovery, and agreed testing criteria', 'myathletik-child' ),
					),
					'link'        => myathletik_related_link( __( 'Review the Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				),
			),
			'buyer_questions_heading' => __( 'Questions buyers ask before starting a performance underwear program', 'myathletik-child' ),
			'buyer_questions' => array(
				array(
					'question' => __( 'What is the MOQ for performance underwear?', 'myathletik-child' ),
					'answer'   => sprintf( __( 'The public garment MOQ is %s pieces per style. Material, color, size allocation, sampling, and final production terms are confirmed in the project quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'question' => __( 'What should a buyer provide before sampling?', 'myathletik-child' ),
					'answer'   => __( 'Provide the product type, intended activity and climate, target market, delivery destination, size range, fit target, tech pack or reference sample, fabric and performance requirements, testing criteria, artwork, packaging requirements, target price range, and estimated quantity.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Which private-label options can be developed?', 'myathletik-child' ),
					'answer'   => __( 'Options include custom elastic waistbands with woven or printed branding, main and care labels, supportive pouch construction, mesh ventilation panels, and private-label packaging. Final details are confirmed through the approved specification and sample.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'How are performance requirements confirmed?', 'myathletik-child' ),
					'answer'   => __( 'The buyer defines the intended use, material requirement, test method, and acceptance criteria. Fabric and garment development can then be checked through in-house testing and approved samples before bulk production.', 'myathletik-child' ),
				),
			),
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
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'outdoor-clothing-manufacturer' => array(
			'title'            => __( 'Outdoor Clothing', 'myathletik-child' ),
			'seo_title'        => __( 'Outdoor Clothing Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Outdoor clothing manufacturer for hiking, skiing, and cold-weather layering - thermal base layers, mid-layers, and merino-blend knitwear for outdoor brands.', 'myathletik-child' ),
			'h1'               => __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/outdoor-clothing/',
			'social_image'        => 'outdoor clothing/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Cycling apparel and outdoor performance knitwear', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'intro'            => __( 'Outdoor clothing programs for hiking, skiing, trekking, and cold-weather use, developed in knitted and knit-based fabrics. We manufacture base layers, thermal underwear, mid-layers, fleece tops and hoodies, outdoor jackets, hiking pants, and accessories such as balaclavas, neck warmers, and beanies. Material, construction, protection, and testing requirements are defined against the buyer\'s intended activity, climate, and approved specification.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Mid-layer tops and hoodies', 'myathletik-child' ),
				__( 'Cold-weather layering pieces', 'myathletik-child' ),
				__( 'Hiking and trekking knitwear', 'myathletik-child' ),
				__( 'Merino-blend and Genesis fleece insulation layers', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Mid-layer tops and hoodies', 'myathletik-child' ),
					'description' => __( 'Hooded, crew, and zip-front mid-layers can be developed in Genesis fleece, brushed-back fabrics, grid structures, and other thermal knits. Fabric weight, stretch, construction, and warmth targets are selected for the intended layering system and confirmed through sampling.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/IMG_7776(1)_4X3.JPG',
					'image_alt'    => __( 'Model wearing a coral zip-front performance mid-layer', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'outdoor clothing/mid-layer-tops-hoodies-480-q85.webp',
						800  => 'outdoor clothing/mid-layer-tops-hoodies-800-q85.webp',
						1200 => 'outdoor clothing/mid-layer-tops-hoodies-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Cold-weather layering pieces', 'myathletik-child' ),
					'description' => __( 'Knit tops, bottoms, and thermal underwear can be developed for stationary, low-output, or active cold-weather use. Composition, GSM, brushed or fleece surfaces, fit, and layering clearance are specified for the target climate and activity.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/IMG_7874(1)_4X3.JPG',
					'image_alt'    => __( 'Model wearing a gray marl zip-front outdoor mid-layer', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'outdoor clothing/cold-weather-layering-480-q85.webp',
						800  => 'outdoor clothing/cold-weather-layering-800-q85.webp',
						1200 => 'outdoor clothing/cold-weather-layering-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Hiking and trekking knitwear', 'myathletik-child' ),
					'description' => __( 'Knit hiking tops, layers, jackets, and pants can be developed around the required fit, stretch, pocket layout, reinforcement, and weather-protection details. Abrasion, thermal, moisture-management, and recovery requirements are checked against the agreed test method and acceptance criteria.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/1U153835(1)_4X3.JPG',
					'image_alt'    => __( 'Model wearing a blue hooded hiking mid-layer', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'outdoor clothing/hiking-trekking-knitwear-480-q85.webp',
						800  => 'outdoor clothing/hiking-trekking-knitwear-800-q85.webp',
						1200 => 'outdoor clothing/hiking-trekking-knitwear-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Merino-blend and Genesis fleece insulation layers', 'myathletik-child' ),
					'description' => __( 'Merino wool blends, synthetic thermal knits, and Genesis fleece can be specified for next-to-skin, insulation, or mid-layer applications. Composition, structure, loft, hand feel, stretch, and care requirements are confirmed for each program.', 'myathletik-child' ),
					'image'       => 'outdoor clothing/1U153247(1)_4X3.JPG',
					'image_alt'    => __( 'Model wearing a gray thermal base-layer set', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'outdoor clothing/merino-genesis-fleece-layers-480-q85.webp',
						800  => 'outdoor clothing/merino-genesis-fleece-layers-800-q85.webp',
						1200 => 'outdoor clothing/merino-genesis-fleece-layers-1200-q85.webp',
					),
				),
			),
			'construction'     => sprintf( __( 'Send the product type, intended activity and climate, target market, size range, fit, composition, GSM, knit structure, stretch and recovery targets, weather-protection requirements, seam map, trims, artwork, testing criteria, order quantity, and tech pack or reference sample. Buyers can specify single jersey, interlock, rib, fleece, brushed-back or grid structures, together with knit-based lamination or membrane, DWR, and insulation requirements. Construction options include FLATLOCK, ACTIVESEAM, COVERSTITCH, OVERLOCK, seamless, bonded-welded, and taped seams, plus project-specific zippers, thumbholes, pockets, reinforcement, branding, labels, and packaging. Our manufacturing scope is knitted and knit-based outdoor clothing; non-knit fabric constructions are outside this page\'s production scope. Public garment MOQ is %s pieces per style.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
			'process_kicker'    => __( 'Procurement workflow', 'myathletik-child' ),
			'process_heading'   => __( 'From outdoor product brief to delivered order', 'myathletik-child' ),
			'process_intro'     => __( 'Each outdoor program moves through defined material, construction, testing, and approval points. Exact timing, test methods, acceptance criteria, commercial terms, and delivery responsibilities are confirmed in the project quotation.', 'myathletik-child' ),
			'process_steps'     => array(
				array(
					'title'       => __( 'Project Brief & Quotation', 'myathletik-child' ),
					'description' => __( 'Share the product type, target activity and climate, market, material and protection requirements, fit, features, testing needs, quantity, timing, and delivery destination. We review the knitted or knit-based route, missing inputs, and quotation variables.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Material & Sample Development', 'myathletik-child' ),
					'description' => __( 'Composition, GSM, knit structure, color, finish, lamination or membrane requirements, construction, trims, and sample route are developed against the brief. Sampling timing depends on material and style complexity.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Approval & Order Confirmation', 'myathletik-child' ),
					'description' => sprintf( __( 'Approve the material, fit, measurements, construction, test methods, acceptance criteria, and packaging. Confirm final quantity, color and size breakdown, and production terms; public garment MOQ is %s pieces per style.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'title'       => __( 'Bulk Production & Quality Control', 'myathletik-child' ),
					'description' => __( 'Bulk production follows the approved sample and current specification. Incoming material, in-line and final garment checks, together with agreed performance testing, are reviewed before shipment release.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Export & Delivery', 'myathletik-child' ),
					'description' => __( 'Packing instructions, standard export documents, freight booking information, and delivery scope are aligned before dispatch. Final shipping terms are confirmed for the order.', 'myathletik-child' ),
				),
			),
			'process_link'      => myathletik_related_link( __( 'Review the full OEM/ODM service workflow', 'myathletik-child' ), '/services/' ),
			'image_note'       => __( '[IMAGE: real outdoor clothing shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'outdoor clothing/flatlock-athletic-800-4.jpg', __( 'Outdoor clothing FLATLOCK product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'outdoor clothing/flatlock-athletic-800-50-1.jpg', __( 'Outdoor technical knitwear product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'outdoor clothing/flatlock-athletic-800-54.jpg', __( 'Outdoor base layer garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( myathletik_aux_image( 'flatlock-athletic-800-3-1.jpg' ), __( 'Outdoor FLATLOCK apparel sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-17.jpg', __( 'Outdoor merino base layer product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-18.jpg', __( 'Outdoor performance base layer sample', 'myathletik-child' ) ),
			),
			'assurance_kicker'  => __( 'Program execution', 'myathletik-child' ),
			'assurance_heading' => __( 'Outdoor customization and quality checkpoints', 'myathletik-child' ),
			'assurance_intro'   => __( 'Product scope, material, construction, and testing requirements are recorded in the current specification and approved sample so development and bulk production can be reviewed against the same criteria.', 'myathletik-child' ),
			'assurance_cards'   => array(
				array(
					'title'       => __( 'Knit product and construction scope', 'myathletik-child' ),
					'description' => __( 'Outdoor programs are developed in knitted and knit-based fabrics for the buyer\'s intended activity, climate, fit, protection level, and branding requirements.', 'myathletik-child' ),
					'items'       => array(
						__( 'Base layers, thermal underwear, mid-layers, fleece tops, hoodies, outdoor jackets, and hiking pants', 'myathletik-child' ),
						__( 'Balaclavas, neck warmers, beanies, and related knit accessories', 'myathletik-child' ),
						__( 'FLATLOCK, ACTIVESEAM, COVERSTITCH, OVERLOCK, seamless, bonded-welded, and taped-seam options by project', 'myathletik-child' ),
						__( 'Zippers, thumbholes, pockets, reinforced panels, printing, branding, labels, and packaging', 'myathletik-child' ),
					),
				),
				array(
					'title'       => __( 'Outdoor quality and testing checkpoints', 'myathletik-child' ),
					'description' => __( 'The quality plan is set against the approved material and garment specification, sample, test method, and buyer acceptance criteria.', 'myathletik-child' ),
					'items'       => array(
						__( 'Material identity, GSM, color, shrinkage, pilling, stretch, and recovery', 'myathletik-child' ),
						__( 'Construction, measurements, seam placement, trims, workmanship, and packaging', 'myathletik-child' ),
						__( 'Abrasion, thermal, moisture-management, hydrostatic head, and MVTR requirements against the agreed method', 'myathletik-child' ),
						__( 'In-house testing, with customer-specified third-party testing when required', 'myathletik-child' ),
					),
					'link'        => myathletik_related_link( __( 'Review the Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				),
			),
			'buyer_questions_heading'     => __( 'Questions buyers ask before starting an outdoor clothing program', 'myathletik-child' ),
			'buyer_questions_collapsible' => true,
			'buyer_questions'             => array(
				array(
					'question' => __( 'What is the MOQ for outdoor clothing?', 'myathletik-child' ),
					'answer'   => sprintf( __( 'The public garment MOQ is %s pieces per style. Material, color, size allocation, sampling, testing, and final production terms are confirmed in the project quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'question' => __( 'What should a buyer provide before outdoor sampling?', 'myathletik-child' ),
					'answer'   => __( 'Provide the product type, intended activity and climate, target market, size range, fit, composition, GSM, knit structure, stretch and recovery targets, protection requirements, feature and seam details, artwork, testing criteria, quantity, and tech pack or reference sample.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can Athletik produce outdoor jackets, hiking pants, and waterproof styles?', 'myathletik-child' ),
					'answer'   => __( 'Yes, when the program uses knitted or knit-based fabric construction. Jackets, hiking pants, laminated or membrane-based layers, DWR requirements, and taped-seam options are developed against the buyer\'s specification. Non-knit fabric constructions are outside this page\'s production scope.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'How are outdoor performance requirements verified?', 'myathletik-child' ),
					'answer'   => __( 'The buyer defines the intended use, test method, and acceptance criteria. Testing can cover colorfastness, shrinkage, pilling, GSM, fiber composition, stretch/recovery, abrasion, thermal performance, moisture management, hydrostatic head, and MVTR. Customer-specified third-party testing can be arranged when required.', 'myathletik-child' ),
				),
			),
			'related'          => array(
				myathletik_related_link( __( 'Sportswear Manufacturer', 'myathletik-child' ), '/sportswear-manufacturer/' ),
				myathletik_related_link( __( 'Merino Wool Manufacturer', 'myathletik-child' ), '/merino-wool-manufacturer/' ),
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'merino-wool-manufacturer' => array(
			'title'            => __( 'Merino Wool Apparel', 'myathletik-child' ),
			'seo_title'        => __( 'Merino Wool Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Merino wool manufacturer for base layers, underwear, jacquard merino apparel, printed merino pieces, and OEM/ODM performance knit programs.', 'myathletik-child' ),
			'h1'               => __( 'Merino Wool Apparel Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/merino-wool-apparel/',
			'social_image'        => 'merino wool product/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Jacquard Merino wool performance top', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'hero_video'       => 'merino wool product/merinowool.mp4',
			// object-position for the hero video crop. 'center top' keeps the
			// head in frame when a portrait subject is cropped to a wide hero.
			'hero_video_position' => 'center 20%',
			'intro'            => __( 'We manufacture custom Merino wool clothing for base-layer tops and bottoms, underwear, T-shirts, hoodies, mid-layers, balaclavas, neck warmers, and other performance programs. Each project is developed around the buyer\'s composition, micron, yarn, GSM, knit structure, fit, construction, and testing requirements.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Merino wool base layers and underwear', 'myathletik-child' ),
				__( 'Merino wool T-shirts, hoodies, and mid-layers', 'myathletik-child' ),
				__( 'Merino wool balaclavas, neck warmers, and accessories', 'myathletik-child' ),
				__( 'Custom Merino fabrics, blends, prints, and jacquards', 'myathletik-child' ),
			),
			'buying_paths_kicker'  => __( 'Procurement entry points', 'myathletik-child' ),
			'buying_paths_heading' => __( 'Merino wool programs for specific layering needs', 'myathletik-child' ),
			'buying_paths_intro'   => __( 'Start the quotation with the product role and intended climate, then define the composition, micron, GSM, knit structure, fit, construction, and testing requirements for the program.', 'myathletik-child' ),
			'buying_paths_note'    => __( 'The GSM ranges shown are common briefing starting points, not fixed production limits. Final material and garment specifications are confirmed against the buyer\'s requirements and approved sample.', 'myathletik-child' ),
			'buying_paths'         => array(
				array(
					'label'       => __( 'Lightweight program', 'myathletik-child' ),
					'title'       => __( 'Merino Wool Base Layers', 'myathletik-child' ),
					'spec'        => __( 'Common starting brief: 150-170 GSM', 'myathletik-child' ),
					'description' => __( 'Next-to-skin tops and bottoms for outdoor, training, ski, and cold-weather layering programs. The brief should define composition, micron, fit, stretch/recovery, seam placement, target climate, and care requirements.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Thermal program', 'myathletik-child' ),
					'title'       => __( 'Midweight Merino Thermal Layers', 'myathletik-child' ),
					'spec'        => __( 'Common starting brief: 180-210 GSM', 'myathletik-child' ),
					'description' => __( 'Base-layer and light mid-layer tops or bottoms developed for added warmth. Buyers can specify 100% Merino wool or blends, single jersey, interlock, rib, or another project-specific knit structure.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Underwear program', 'myathletik-child' ),
					'title'       => __( 'Merino Wool Performance Underwear', 'myathletik-child' ),
					'spec'        => __( 'Common starting brief: 150-180 GSM', 'myathletik-child' ),
					'description' => __( 'Underwear programs developed around next-to-skin comfort, fit, waistband construction, stretch/recovery, seam selection, care requirements, and the buyer\'s agreed test criteria.', 'myathletik-child' ),
				),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Merino wool base layers and underwear', 'myathletik-child' ),
					'description' => __( 'Base-layer tops and bottoms, thermal underwear, and other next-to-skin styles can be developed in 100% Merino wool or buyer-specified blends. Composition, micron, GSM, fit, seam placement, and care requirements are set for the intended activity and climate.', 'myathletik-child' ),
					'image'       => 'merino wool product/1U153433_4X3.JPG',
					'image_alt'    => __( 'Model wearing a printed camouflage Merino wool base-layer set', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'merino wool product/printed-merino-apparel-480-q85.webp',
						800  => 'merino wool product/printed-merino-apparel-800-q85.webp',
						1200 => 'merino wool product/printed-merino-apparel-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Merino wool T-shirts, hoodies, and mid-layers', 'myathletik-child' ),
					'description' => __( 'Lightweight T-shirts through warmer hooded and mid-layer styles can be developed for outdoor, training, travel, and everyday programs. The fabric and garment are balanced for the required warmth, hand feel, stretch, recovery, and durability.', 'myathletik-child' ),
					'image'       => 'merino wool product/1U153813_4X3.JPG',
					'image_alt'    => __( 'Model wearing a blue Merino-blend hooded performance top', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'merino wool product/merino-blend-performance-480-q85.webp',
						800  => 'merino wool product/merino-blend-performance-800-q85.webp',
						1200 => 'merino wool product/merino-blend-performance-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Jacquard, print, and accessory development', 'myathletik-child' ),
					'description' => __( 'Programs can include knitted-in jacquard patterns, all-over or placement prints, balaclavas, neck warmers, and related performance accessories. A jacquard pattern is built into the fabric rather than applied as a surface print, so there is no print layer to crack or peel.', 'myathletik-child' ),
					'image'       => 'merino wool product/showcase_4X3.jpeg',
					'image_alt'    => __( 'Close-up of a black and white jacquard-patterned Merino wool top', 'myathletik-child' ),
					'image_width'  => 1600,
					'image_height' => 1200,
					'image_webp'   => array(
						480  => 'merino wool product/jacquard-merino-apparel-480-q85.webp',
						800  => 'merino wool product/jacquard-merino-apparel-800-q85.webp',
						1200 => 'merino wool product/jacquard-merino-apparel-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Merino yarn sourcing and fabric development', 'myathletik-child' ),
					'description' => __( 'Buyers can specify composition, micron, yarn count, GSM, and structures such as single jersey, interlock, rib, and jacquard. Finer Merino wool below about 19.5 microns is a common starting point for next-to-skin products, but the final specification is selected for the required hand feel, warmth, durability, stretch, and care performance.', 'myathletik-child' ),
					'image'       => 'merino wool product/Merino Yarn Sourcing.png',
					'image_alt'    => __( 'Merino wool yarn cones, knit swatches, fibers, and gauge tools', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'merino wool product/merino-yarn-fabric-development-480-q85.webp',
						800  => 'merino wool product/merino-yarn-fabric-development-800-q85.webp',
						1200 => 'merino wool product/merino-yarn-fabric-development-1200-q85.webp',
					),
				),
			),
			'capability_kicker'  => __( 'Development inputs', 'myathletik-child' ),
			'capability_heading' => __( 'Define the Merino fiber, fabric, and garment before sampling', 'myathletik-child' ),
			'construction'      => sprintf( __( 'Send the product type, intended activity and climate, target market, composition, micron, yarn count, GSM, knit structure, stretch and recovery targets, fit, seam map, artwork, branding, care requirements, test methods and acceptance criteria, order quantity, and tech pack or reference sample. We can develop 100%% Merino wool and blended programs in single jersey, interlock, rib, jacquard, and other project-specific structures, with FLATLOCK or ACTIVESEAM where appropriate. Colorfastness, shrinkage, pilling, GSM, fiber composition, and stretch/recovery can be checked in-house; customer-specified third-party testing can be arranged when required. Public garment MOQ is %s pieces per style, with final development and testing terms confirmed for the project.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
			'showcase_kicker'    => __( 'Product examples', 'myathletik-child' ),
			'showcase_heading'   => __( 'Merino wool product programs', 'myathletik-child' ),
			'showcase_intro'     => __( 'Representative garment and accessory formats from Merino wool development programs.', 'myathletik-child' ),
			'product_showcase'   => array(
				myathletik_product_showcase_item(
					'merino wool product/merino-printed-half-zip-top-800.jpg',
					__( 'Printed Merino wool long-sleeve half-zip base-layer top', 'myathletik-child' ),
					__( 'Printed Base Layer', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-printed-half-zip-top-480.webp',
						800 => 'merino wool product/merino-printed-half-zip-top-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-long-sleeve-base-layer-800.jpg',
					__( 'Navy Merino wool long-sleeve base-layer top', 'myathletik-child' ),
					__( 'Long-Sleeve Base Layer', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-long-sleeve-base-layer-480.webp',
						800 => 'merino wool product/merino-long-sleeve-base-layer-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-base-layer-bottom-800.jpg',
					__( 'Grey Merino wool base-layer bottom with branded waistband', 'myathletik-child' ),
					__( 'Base-Layer Bottom', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-base-layer-bottom-480.webp',
						800 => 'merino wool product/merino-base-layer-bottom-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-short-sleeve-tshirt-800.jpg',
					__( 'Lavender Merino wool short-sleeve T-shirt', 'myathletik-child' ),
					__( 'Short-Sleeve T-Shirt', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-short-sleeve-tshirt-480.webp',
						800 => 'merino wool product/merino-short-sleeve-tshirt-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-hooded-mid-layer-800.jpg',
					__( 'Burgundy Merino wool hooded half-zip mid-layer', 'myathletik-child' ),
					__( 'Hooded Mid-Layer', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-hooded-mid-layer-480.webp',
						800 => 'merino wool product/merino-hooded-mid-layer-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-neck-warmer-800.jpg',
					__( 'Black Merino wool neck warmer', 'myathletik-child' ),
					__( 'Neck Warmer', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-neck-warmer-480.webp',
						800 => 'merino wool product/merino-neck-warmer-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-knit-beanie-800.jpg',
					__( 'Rust-colored Merino wool knit beanie', 'myathletik-child' ),
					__( 'Knit Beanie', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-knit-beanie-480.webp',
						800 => 'merino wool product/merino-knit-beanie-800.webp',
					)
				),
				myathletik_product_showcase_item(
					'merino wool product/merino-balaclava-800.jpg',
					__( 'Black Merino wool balaclava with face opening', 'myathletik-child' ),
					__( 'Balaclava', 'myathletik-child' ),
					array(
						480 => 'merino wool product/merino-balaclava-480.webp',
						800 => 'merino wool product/merino-balaclava-800.webp',
					)
				),
			),
			'process_kicker'    => __( 'Procurement workflow', 'myathletik-child' ),
			'process_heading'   => __( 'From Merino wool brief to delivered order', 'myathletik-child' ),
			'process_intro'     => __( 'Each program moves through defined review and approval points. Exact timing, testing scope, commercial terms, and delivery responsibilities are confirmed in the project quotation.', 'myathletik-child' ),
			'process_steps'     => array(
				array(
					'title'       => __( 'Project Brief & Quotation', 'myathletik-child' ),
					'description' => __( 'Share the product type, target use, material specification, fit, artwork, testing needs, quantity, timing, and delivery destination. We review feasibility, missing inputs, and quotation variables.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Material & Sample Development', 'myathletik-child' ),
					'description' => __( 'Material, color, knit structure, construction, trims, and the sample route are developed against the brief. Typical sampling is 1-2 weeks after the required inputs are aligned, depending on style and material complexity.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Approval & Order Confirmation', 'myathletik-child' ),
					'description' => sprintf( __( 'Approve the material, fit, measurements, construction, test criteria, and packaging. Confirm final quantity, color and size breakdown, and production terms; public garment MOQ is %s pieces per style.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'title'       => __( 'Bulk Production & Quality Control', 'myathletik-child' ),
					'description' => __( 'Bulk production follows the approved sample and current specification. Incoming material, in-line and final garment checks, together with agreed testing, are reviewed before shipment release.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Export & Delivery', 'myathletik-child' ),
					'description' => __( 'Packing instructions, standard export documents, freight booking information, and delivery scope are aligned before dispatch. FOB and DDP terms are available by project.', 'myathletik-child' ),
				),
			),
			'process_link'      => myathletik_related_link( __( 'Review the full OEM/ODM service workflow', 'myathletik-child' ), '/services/' ),
			'assurance_kicker'  => __( 'Program execution', 'myathletik-child' ),
			'assurance_heading' => __( 'Merino wool customization and quality checkpoints', 'myathletik-child' ),
			'assurance_intro'   => __( 'Material, garment, and test requirements are recorded in the current specification and approved sample so development and bulk production can be reviewed against the same criteria.', 'myathletik-child' ),
			'assurance_cards'   => array(
				array(
					'title'       => __( 'Program customization', 'myathletik-child' ),
					'description' => __( 'Merino wool clothing programs are developed around the buyer\'s end use, target climate, fit, care requirements, and approved specification.', 'myathletik-child' ),
					'items'       => array(
						__( 'Base-layer tops and bottoms, underwear, T-shirts, hoodies, mid-layers, balaclavas, and neck warmers', 'myathletik-child' ),
						__( '100% Merino wool and blended compositions by buyer specification', 'myathletik-child' ),
						__( 'Micron, yarn count, GSM, and knit structure selected for the intended use', 'myathletik-child' ),
						__( 'FLATLOCK, ACTIVESEAM, jacquard, print, branding, and trim options where specified', 'myathletik-child' ),
					),
				),
				array(
					'title'       => __( 'Merino wool quality checkpoints', 'myathletik-child' ),
					'description' => __( 'The quality plan is set against the approved material and garment specification, sample, test method, and buyer acceptance criteria.', 'myathletik-child' ),
					'items'       => array(
						__( 'Fiber composition, GSM, colorfastness, shrinkage, and pilling', 'myathletik-child' ),
						__( 'Stretch and recovery for blended performance fabrics', 'myathletik-child' ),
						__( 'Measurements, seam appearance, and construction against the approved sample', 'myathletik-child' ),
						__( 'Customer-specified third-party testing when required', 'myathletik-child' ),
					),
					'link'        => myathletik_related_link( __( 'Review the Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				),
			),
			'buyer_questions_heading' => __( 'Questions buyers ask before starting a Merino wool program', 'myathletik-child' ),
			'buyer_questions_collapsible' => true,
			'buyer_questions' => array(
				array(
					'question' => __( 'What is the MOQ for Merino wool clothing?', 'myathletik-child' ),
					'answer'   => sprintf( __( 'The public garment MOQ is %s pieces per style. Material, color, size allocation, sampling, testing, and final production terms are confirmed in the project quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'question' => __( 'What should a buyer provide before Merino sampling?', 'myathletik-child' ),
					'answer'   => __( 'Provide the garment type, intended activity and climate, target market, composition, micron, yarn count, GSM, knit structure, fit and seam requirements, artwork and branding, care requirements, testing criteria, estimated quantity, and tech pack or reference sample.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'How should micron and GSM be selected?', 'myathletik-child' ),
					'answer'   => __( 'Finer Merino wool below about 19.5 microns is commonly used for next-to-skin base layers and underwear, but there is no single micron or GSM for every program. The final specification should balance hand feel, warmth, durability, stretch, target climate, and care requirements.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Which Merino wool requirements can be tested?', 'myathletik-child' ),
					'answer'   => __( 'Colorfastness, shrinkage, pilling, GSM, fiber composition, and stretch/recovery can be checked in-house against the agreed method and acceptance criteria. Customer-specified third-party testing can be arranged when required.', 'myathletik-child' ),
				),
			),
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
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'silk-wear-manufacturer' => array(
			'title'            => __( 'Silk Wear', 'myathletik-child' ),
			'seo_title'        => __( 'Silk Wear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Silk wear manufacturer for knitted silk base layers, silk underwear, lightweight performance apparel, and OEM/ODM silk-blend knit pieces.', 'myathletik-child' ),
			'h1'               => __( 'Silk Wear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/silk-wear/',
			'social_image'        => 'silkwear/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Model wearing a silk top and printed scarf', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'hero_kicker'      => __( 'Silk apparel OEM/ODM', 'myathletik-child' ),
			'intro'            => __( 'We manufacture knitted silk base layers, underwear, T-shirts, camisoles, leggings, long underwear, and lightweight apparel for brands and private-label programs. Woven silk garment programs can also be supported by project. Composition, yarn, fabric weight, construction, finish, and testing are developed against the buyer\'s specification and approved samples.', 'myathletik-child' ),
			'overview_heading' => __( 'Knitted silk apparel and supported woven programs', 'myathletik-child' ),
			'product_range_heading' => __( 'Silk apparel products we manufacture', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Knitted silk base-layer tops and bottoms', 'myathletik-child' ),
				__( 'Silk underwear, camisoles, leggings, and long underwear', 'myathletik-child' ),
				__( 'Lightweight silk T-shirts and performance apparel', 'myathletik-child' ),
				__( 'Silk-blend knit pieces and woven silk programs by project', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Knitted silk base layers and underwear', 'myathletik-child' ),
					'description' => __( 'Base-layer tops and bottoms, underwear, leggings, and long underwear developed for lightweight next-to-skin use. Composition, fabric weight, fit, seam placement, stretch, care requirements, and the intended layering system are confirmed before sampling.', 'myathletik-child' ),
					'image'       => 'silkwear/IMG_5784.jpg',
					'image_alt'    => __( 'Close-up of lightweight white silk base-layer leggings', 'myathletik-child' ),
					'image_width'  => 1920,
					'image_height' => 1280,
					'image_webp'   => array(
						480  => 'silkwear/silk-base-layers-underwear-480-q85.webp',
						800  => 'silkwear/silk-base-layers-underwear-800-q85.webp',
						1200 => 'silkwear/silk-base-layers-underwear-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Silk T-shirts and lightweight apparel', 'myathletik-child' ),
					'description' => __( 'T-shirts, camisoles, tops, and lightweight apparel developed around the buyer\'s target hand feel, drape, opacity, fit, color, and end use. Material and garment approval criteria are set for the selected silk construction rather than assumed across every program.', 'myathletik-child' ),
					'image'       => 'silkwear/IMG_5393.jpg',
					'image_alt'    => __( 'Close-up of a lightweight black silk knit top neckline', 'myathletik-child' ),
					'image_width'  => 1920,
					'image_height' => 1280,
					'image_webp'   => array(
						480  => 'silkwear/silk-performance-apparel-480-q85.webp',
						800  => 'silkwear/silk-performance-apparel-800-q85.webp',
						1200 => 'silkwear/silk-performance-apparel-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Silk-blend knit pieces', 'myathletik-child' ),
					'description' => __( 'Silk can be blended with cotton, modal, or performance fibers when the program needs a different balance of hand feel, stretch, recovery, durability, care, or cost. Final composition, yarn, GSM, knit structure, and performance criteria are confirmed in the approved specification.', 'myathletik-child' ),
					'image'       => 'silkwear/IMG_5550.jpg',
					'image_alt'    => __( 'Close-up of a beige silk-blend knit top neckline', 'myathletik-child' ),
					'image_width'  => 1920,
					'image_height' => 1280,
					'image_webp'   => array(
						480  => 'silkwear/silk-blend-knitwear-480-q85.webp',
						800  => 'silkwear/silk-blend-knitwear-800-q85.webp',
						1200 => 'silkwear/silk-blend-knitwear-1200-q85.webp',
					),
				),
			),
			'capability_kicker'  => __( 'Development inputs', 'myathletik-child' ),
			'capability_heading' => __( 'Define the silk material, construction, and approval criteria', 'myathletik-child' ),
			'construction'      => sprintf( __( 'Send the product type, intended use, target market, size range, fit, tech pack or reference sample, silk composition, yarn requirement, GSM, knit or woven construction, color and artwork, seam map, trims, labels, packaging, care requirements, testing criteria, target price range, quantity, timeline, and delivery destination. Knitted silk programs can use FLATLOCK, ACTIVESEAM, and other construction options where suitable; woven silk garments are supported according to the project specification. Public garment MOQ is %s pieces per style, with final material, sampling, testing, and production terms confirmed in the quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
			'assurance_kicker'  => __( 'Program execution', 'myathletik-child' ),
			'assurance_heading' => __( 'Silk apparel customization and quality checkpoints', 'myathletik-child' ),
			'assurance_intro'   => __( 'Material, construction, appearance, and testing requirements are recorded in the current specification and approved sample so development and bulk production can be reviewed against the same criteria.', 'myathletik-child' ),
			'assurance_cards'   => array(
				array(
					'title'       => __( 'Program customization', 'myathletik-child' ),
					'description' => __( 'Knitted silk apparel and supported woven silk programs are developed around the buyer\'s product brief, end use, target market, and approved specification.', 'myathletik-child' ),
					'items'       => array(
						__( 'Base layers, underwear, T-shirts, camisoles, leggings, long underwear, and lightweight apparel', 'myathletik-child' ),
						__( 'Silk composition and blends, yarn, GSM, knit or woven construction, color, and finish by specification', 'myathletik-child' ),
						__( 'FLATLOCK, ACTIVESEAM, printing, trims, labels, and branding where suitable for the design', 'myathletik-child' ),
						__( 'Private-label packaging and care information aligned during development', 'myathletik-child' ),
					),
				),
				array(
					'title'       => __( 'Silk apparel quality checkpoints', 'myathletik-child' ),
					'description' => __( 'The quality plan is set against the approved material and garment specification, sample, test method, and buyer acceptance criteria.', 'myathletik-child' ),
					'items'       => array(
						__( 'Fiber composition, GSM, colorfastness, shrinkage, and pilling', 'myathletik-child' ),
						__( 'Stretch and recovery for applicable knitted silk blends', 'myathletik-child' ),
						__( 'Snagging, seam slippage, seam appearance, measurements, and workmanship where applicable', 'myathletik-child' ),
						__( 'Customer-specified third-party testing when required', 'myathletik-child' ),
					),
					'link'        => myathletik_related_link( __( 'Review the Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				),
			),
			'buyer_questions_heading' => __( 'Questions buyers ask before starting a silk apparel program', 'myathletik-child' ),
			'buyer_questions_collapsible' => true,
			'buyer_questions' => array(
				array(
					'question' => __( 'What is the MOQ for silk apparel?', 'myathletik-child' ),
					'answer'   => sprintf( __( 'The public garment MOQ is %s pieces per style. Material, color, size allocation, sampling, testing, and final production terms are confirmed in the project quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'question' => __( 'What should a buyer provide before silk sampling?', 'myathletik-child' ),
					'answer'   => __( 'Provide the product type, intended use, target market, size range, fit, tech pack or reference sample, composition, yarn and GSM requirements, knit or woven construction, color and artwork, seam and trim details, care requirements, testing criteria, estimated quantity, timeline, and delivery destination.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can Athletik support both knitted and woven silk garments?', 'myathletik-child' ),
					'answer'   => __( 'Yes. Knitted silk apparel is a core part of this category, and woven silk garment programs can also be supported by project. The material construction, garment design, production route, approval criteria, and commercial terms are confirmed for the individual program.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Which silk apparel requirements can be tested?', 'myathletik-child' ),
					'answer'   => __( 'Fiber composition, GSM, colorfastness, shrinkage, pilling, stretch and recovery, snagging, seam slippage, seam appearance, measurements, and workmanship can be checked where applicable against the agreed method and acceptance criteria. Customer-specified third-party testing can be arranged when required.', 'myathletik-child' ),
				),
			),
			'process_kicker'    => __( 'Procurement workflow', 'myathletik-child' ),
			'process_heading'   => __( 'From silk apparel brief to delivered order', 'myathletik-child' ),
			'process_intro'     => __( 'Each program moves through defined review and approval points. Exact timing, testing scope, commercial terms, and delivery responsibilities are confirmed in the project quotation.', 'myathletik-child' ),
			'process_steps'     => array(
				array(
					'title'       => __( 'Project Brief & Quotation', 'myathletik-child' ),
					'description' => __( 'Share the product type, target use, material and construction specification, fit, artwork, testing needs, quantity, timing, and delivery destination. We review feasibility, missing inputs, and quotation variables.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Material & Sample Development', 'myathletik-child' ),
					'description' => __( 'Material, color, knit or woven construction, garment construction, trims, care requirements, and the sample route are developed against the brief. Typical sampling is 1-2 weeks after the required inputs are aligned, depending on style and material complexity.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Approval & Order Confirmation', 'myathletik-child' ),
					'description' => sprintf( __( 'Approve the material, fit, measurements, construction, appearance, test criteria, labels, and packaging. Confirm final quantity, color and size breakdown, and production terms; public garment MOQ is %s pieces per style.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'title'       => __( 'Bulk Production & Quality Control', 'myathletik-child' ),
					'description' => __( 'Bulk production follows the approved sample and current specification. Incoming material, in-line and final garment checks, together with agreed testing, are reviewed before shipment release.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Export & Delivery', 'myathletik-child' ),
					'description' => __( 'Packing instructions, standard export documents, freight booking information, and delivery scope are aligned before dispatch. FOB and DDP terms are available by project.', 'myathletik-child' ),
				),
			),
			'process_link'      => myathletik_related_link( __( 'Review the full OEM/ODM service workflow', 'myathletik-child' ), '/services/' ),
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
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'knitted-fabrics-manufacturer' => array(
			'title'            => __( 'Knitted Fabrics', 'myathletik-child' ),
			'seo_title'        => __( 'Knitted Fabrics Manufacturer | Athletik Clothing', 'myathletik-child' ),
			// Exception: this meta_description IS the live value (rank-math.php filters; see docblock above).
			'meta_description' => __( 'Knitted fabrics manufacturer for performance, thermal, stretch, Merino wool, and recycled knit programs. Custom development for B2B apparel buyers.', 'myathletik-child' ),
			'h1'               => __( 'Knitted Fabrics Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/knitted-fabrics/',
			'social_image'        => 'knitted fabrics/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Performance knitted fabric swatch collection', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'hero_kicker'      => __( 'Custom knit fabric development & supply', 'myathletik-child' ),
			'intro'            => __( 'Through our own fabric mill, we support standalone fabric orders and custom development for B2B apparel programs, including performance, thermal, stretch, and functional knits. Development can be checked through in-house testing against the agreed fabric specification, while MOQ varies by fabric and project requirements.', 'myathletik-child' ),
			'overview_heading' => __( 'Functional knitted fabrics for performance apparel', 'myathletik-child' ),
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
					'description' => __( 'Single- and double-knit performance fabrics for activewear, underwear, and next-to-skin applications, developed around target gauge, weight, stretch, and recovery.', 'myathletik-child' ),
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
					'description' => __( 'Brushed-back and fleece-lined thermal knit fabrics for base, mid, and outer layers, with weight, warmth, and moisture-management options tailored to the application.', 'myathletik-child' ),
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
					'description' => __( 'Functional knit fabrics can combine fiber and yarn selection, knit construction, and finishing to support moisture management, UV protection, antimicrobial, bamboo charcoal, and odor-control requirements.', 'myathletik-child' ),
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
					'description' => __( 'High-stretch knit options include power-stretch, microfiber, and fine-gauge Merino wool constructions, with stretch and recovery, compression, hand feel, and fiber content tailored to the end use.', 'myathletik-child' ),
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
					'description' => __( 'Recycled polyester and nylon knit programs are available with GRS-certified inputs and project-specific traceability documentation for applicable orders.', 'myathletik-child' ),
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
			'capability_heading' => __( 'Develop functional knits against an approved specification', 'myathletik-child' ),
			'construction'      => __( 'Send the target composition, yarn and knit structure, GSM, usable width, stretch and recovery, color reference, finish or performance requirement, testing requirement, order quantity, intended application, and delivery destination. Development is managed through our own fabric mill, with knitting, dyeing, finishing, and in-house testing coordinated against the approved specification. Swatches, counter samples, lab dips, sample yardage, and approval samples are available based on project needs. Third-party testing and supporting documentation can be arranged based on the required standard. Pricing is normally quoted per kg, while other units can be used when required. Final timing, packing, and delivery terms are set in the project quotation.', 'myathletik-child' ),
			'specs'             => array(
				array(
					'label'       => __( 'MOQ', 'myathletik-child' ),
					'value'       => __( 'Varies by fabric and project', 'myathletik-child' ),
					'description' => __( 'Confirmed against the selected fabric specification.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Development', 'myathletik-child' ),
					'value'       => __( 'Based on fabric brief', 'myathletik-child' ),
					'description' => __( 'Sampling and approval steps are planned for each project.', 'myathletik-child' ),
				),
				array(
					'label'       => __( 'Bulk lead time', 'myathletik-child' ),
					'value'       => __( 'Based on order requirements', 'myathletik-child' ),
					'description' => __( 'Production timing is provided with the quotation.', 'myathletik-child' ),
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
			'social_image'        => 'sports accessories/social-share-1200x627.jpg',
			'social_image_width'  => 1200,
			'social_image_height' => 627,
			'social_image_alt'    => __( 'Technical balaclavas for cold-weather sports', 'myathletik-child' ),
			'social_image_type'   => 'image/jpeg',
			'hero_kicker'      => __( 'Technical knit accessories OEM/ODM', 'myathletik-child' ),
			'intro'            => __( 'We manufacture technical knit and textile accessories for sportswear, outdoor, and performance apparel collections. Programs include balaclavas, ski masks, neck gaiters, neck warmers, glove liners, lightweight gloves, headbands, ear warmers, arm and leg sleeves, compression sleeves, beanies, and wristbands, developed to the buyer\'s material, fit, construction, branding, and testing requirements.', 'myathletik-child' ),
			'overview_heading' => __( 'Textile accessories for sportswear and outdoor collections', 'myathletik-child' ),
			'product_range_heading' => __( 'Technical sports accessories we manufacture', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Balaclavas, ski masks, and neckwear', 'myathletik-child' ),
				__( 'Gloves and liners', 'myathletik-child' ),
				__( 'Sleeves and performance knit accessories', 'myathletik-child' ),
			),
			'subcategories'    => array(
				array(
					'title'       => __( 'Balaclavas, ski masks, and neckwear', 'myathletik-child' ),
					'description' => __( 'Balaclavas, ski masks, neck gaiters, and neck warmers developed around the intended activity, climate, face opening, helmet or hood interface, coverage, fit, and material specification. Thermal, stretch, wind-resistant, FLATLOCK, and ACTIVESEAM options are selected and verified by project.', 'myathletik-child' ),
					'image'       => 'sports accessories/Balaclavas.png',
					'image_alt'    => __( 'Black and navy technical balaclavas displayed with a sports helmet', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'sports accessories/technical-balaclavas-480-q85.webp',
						800  => 'sports accessories/technical-balaclavas-800-q85.webp',
						1200 => 'sports accessories/technical-balaclavas-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Gloves and liners', 'myathletik-child' ),
					'description' => __( 'Glove liners and lightweight gloves developed for standalone or layering use according to the buyer\'s warmth, fit, dexterity, stretch, and shell-glove requirements. Touchscreen tips, grip print, reinforcement, and branding are specified and tested when required.', 'myathletik-child' ),
					'image'       => 'sports accessories/gloves.png',
					'image_alt'    => __( 'Technical knit glove liners with grip palms and touchscreen fingertips', 'myathletik-child' ),
					'image_width'  => 1448,
					'image_height' => 1086,
					'image_webp'   => array(
						480  => 'sports accessories/technical-gloves-liners-480-q85.webp',
						800  => 'sports accessories/technical-gloves-liners-800-q85.webp',
						1200 => 'sports accessories/technical-gloves-liners-1200-q85.webp',
					),
				),
				array(
					'title'       => __( 'Sleeves and performance knit accessories', 'myathletik-child' ),
					'description' => __( 'Arm sleeves, hand-cover sleeves, leg and compression sleeves, headbands, ear warmers, beanies, and wristbands developed for the target activity and apparel collection. Fabric, compression, UPF, thermal, moisture-management, grip, and stretch requirements are confirmed in the approved specification.', 'myathletik-child' ),
					'image'       => 'sports accessories/sports-accessory-product-category.png',
					'image_alt'    => __( 'Light blue technical arm sleeve with extended hand coverage', 'myathletik-child' ),
					'image_width'  => 1402,
					'image_height' => 1122,
					'image_webp'   => array(
						480  => 'sports accessories/technical-knit-accessories-480-q85.webp',
						800  => 'sports accessories/technical-knit-accessories-800-q85.webp',
						1200 => 'sports accessories/technical-knit-accessories-1200-q85.webp',
					),
				),
			),
			'capability_kicker'  => __( 'Development inputs', 'myathletik-child' ),
			'capability_heading' => __( 'Define fit, function, and construction before sampling', 'myathletik-child' ),
			'construction'      => sprintf( __( 'Send the accessory type, intended sport or activity, climate, target market, size range, measurements, fit, tech pack or reference sample, composition, GSM, knit structure, stretch and recovery, thermal or wind target, compression or UPF requirement, helmet and face-opening details, touchscreen or grip requirement, seam map, thumbholes and other functional details, color and artwork, labels, packaging, testing criteria, quantity, timeline, and delivery destination. Available construction and decoration include FLATLOCK, ACTIVESEAM, OVERLOCK, COVERSTITCH, seamless and bonded-welded options, sublimation, SCREENPRINT, silicone grip, and reflective details where suitable. Public garment MOQ is %s pieces per style; final material, sampling, testing, and production terms are confirmed in the quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
			'assurance_kicker'  => __( 'Program execution', 'myathletik-child' ),
			'assurance_heading' => __( 'Sports accessory customization and quality checkpoints', 'myathletik-child' ),
			'assurance_intro'   => __( 'Functional details and acceptance criteria are recorded in the current specification and approved sample so material, fit, decoration, and workmanship can be reviewed consistently through bulk production.', 'myathletik-child' ),
			'assurance_cards'   => array(
				array(
					'title'       => __( 'Product and private-label customization', 'myathletik-child' ),
					'description' => __( 'Technical textile accessories are developed around the buyer\'s activity, climate, apparel collection, functional requirements, and brand presentation.', 'myathletik-child' ),
					'items'       => array(
						__( 'Head and neck accessories, gloves and liners, sleeves, beanies, headbands, and wristbands', 'myathletik-child' ),
						__( 'Composition, GSM, knit structure, fit, coverage, compression, stretch, thermal, wind, and UPF targets by specification', 'myathletik-child' ),
						__( 'Touchscreen tips, grip print, silicone grip, thumbholes, reflective details, and reinforcement where required', 'myathletik-child' ),
						__( 'Sublimation, SCREENPRINT, labels, branding, and private-label packaging', 'myathletik-child' ),
					),
				),
				array(
					'title'       => __( 'Accessory quality checkpoints', 'myathletik-child' ),
					'description' => __( 'The quality plan is set against the approved material and product specification, sample, test method, and buyer acceptance criteria.', 'myathletik-child' ),
					'items'       => array(
						__( 'Fiber composition, GSM, colorfastness, shrinkage, and pilling', 'myathletik-child' ),
						__( 'Stretch and recovery, seam strength and elasticity, abrasion, measurements, fit, and workmanship', 'myathletik-child' ),
						__( 'Touchscreen function, grip adhesion, thermal, wind resistance, UPF, and compression where specified', 'myathletik-child' ),
						__( 'Customer-specified third-party testing when required', 'myathletik-child' ),
					),
					'link'        => myathletik_related_link( __( 'Review the Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
				),
			),
			'buyer_questions_heading' => __( 'Questions buyers ask before starting a sports accessory program', 'myathletik-child' ),
			'buyer_questions_collapsible' => true,
			'buyer_questions' => array(
				array(
					'question' => __( 'What is the MOQ for technical sports accessories?', 'myathletik-child' ),
					'answer'   => sprintf( __( 'The public garment MOQ is %s pieces per style. Material, color, size allocation, sampling, testing, and final production terms are confirmed in the project quotation.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'question' => __( 'What should a buyer provide before accessory sampling?', 'myathletik-child' ),
					'answer'   => __( 'Provide the product type, intended activity and climate, target market, size and fit requirements, tech pack or reference sample, material and performance specification, functional details, artwork, labels and packaging, testing criteria, estimated quantity, timeline, and delivery destination.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Which products are included in this sports accessories range?', 'myathletik-child' ),
					'answer'   => __( 'This page covers textile accessories for sportswear and outdoor collections, including balaclavas, ski masks, neck gaiters, neck warmers, glove liners, lightweight gloves, arm and leg sleeves, compression sleeves, headbands, ear warmers, beanies, and wristbands. It does not cover hard sports equipment.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'How are accessory performance requirements confirmed?', 'myathletik-child' ),
					'answer'   => __( 'The buyer defines the intended use, product specification, test method, and acceptance criteria. Applicable material, seam, fit, touchscreen, grip, thermal, wind, UPF, compression, and workmanship requirements can then be checked during development and before shipment. Customer-specified third-party testing can be arranged when required.', 'myathletik-child' ),
				),
			),
			'process_kicker'    => __( 'Procurement workflow', 'myathletik-child' ),
			'process_heading'   => __( 'From sports accessory brief to delivered order', 'myathletik-child' ),
			'process_intro'     => __( 'Each program moves through defined review and approval points. Exact timing, testing scope, commercial terms, and delivery responsibilities are confirmed in the project quotation.', 'myathletik-child' ),
			'process_steps'     => array(
				array(
					'title'       => __( 'Project Brief & Quotation', 'myathletik-child' ),
					'description' => __( 'Share the accessory type, target activity, material and performance specification, fit, functional details, artwork, testing needs, quantity, timing, and delivery destination. We review feasibility, missing inputs, and quotation variables.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Material & Sample Development', 'myathletik-child' ),
					'description' => __( 'Material, color, knit structure, construction, sizing, functional details, decoration, trims, and the sample route are developed against the brief. Typical sampling is 1-2 weeks after the required inputs are aligned, depending on product and material complexity.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Approval & Order Confirmation', 'myathletik-child' ),
					'description' => sprintf( __( 'Approve the material, fit, measurements, construction, functionality, artwork, test criteria, labels, and packaging. Confirm final quantity, color and size breakdown, and production terms; public garment MOQ is %s pieces per style.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
				),
				array(
					'title'       => __( 'Bulk Production & Quality Control', 'myathletik-child' ),
					'description' => __( 'Bulk production follows the approved sample and current specification. Incoming material, in-line and final product checks, together with agreed testing, are reviewed before shipment release.', 'myathletik-child' ),
				),
				array(
					'title'       => __( 'Export & Delivery', 'myathletik-child' ),
					'description' => __( 'Packing instructions, standard export documents, freight booking information, and delivery scope are aligned before dispatch. FOB and DDP terms are available by project.', 'myathletik-child' ),
				),
			),
			'process_link'      => myathletik_related_link( __( 'Review the full OEM/ODM service workflow', 'myathletik-child' ), '/services/' ),
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
				myathletik_related_link( __( 'FLATLOCK vs OVERLOCK Guide', 'myathletik-child' ), '/flatlock-vs-overlock-technical-knitwear/' ),
				myathletik_related_link( __( 'Technical Knitwear Tech Pack Guide', 'myathletik-child' ), '/technical-knitwear-tech-pack-guide/' ),
				myathletik_related_link( __( 'Garment Quality Control Checklist', 'myathletik-child' ), '/garment-quality-control-checklist/' ),
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
