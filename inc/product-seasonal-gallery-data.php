<?php
/**
 * Decoupled registry for Seasonal Sample Gallery items on /product-showcase/.
 *
 * These entries are studio photography + model fit video selections only.
 * They intentionally omit unconfirmed fiber compositions, GSM weights,
 * fabric codes, and ISO stitch numbers, and do NOT generate standalone SEO pages.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return seasonal sample gallery items ordered for display.
 *
 * @return array<string,array>
 */
function myathletik_product_seasonal_gallery_data() {
	$theme_base = get_stylesheet_directory_uri() . '/assets/images/product-seasonal/';

	$build_images = static function ( $slug, $views ) use ( $theme_base ) {
		$base = $theme_base . $slug . '/';
		$out  = array();
		foreach ( $views as $key => $meta ) {
			$out[ $key ] = array(
				'src'       => $base . $key . '-1200.webp',
				'thumbnail' => $base . $key . '-533.webp',
				'srcset'    => $base . $key . '-533.webp 533w, ' . $base . $key . '-1200.webp 800w',
				'width'     => 800,
				'height'    => 1200,
				'label'     => $meta[0],
				'alt'       => $meta[1],
			);
		}
		return $out;
	};

	$build_video = static function ( $slug, $label ) use ( $theme_base ) {
		$base = $theme_base . $slug . '/';
		return array(
			'src'    => $base . 'fit-video.mp4',
			'poster' => $base . 'fit-video-poster.webp',
			'aspect' => 'portrait',
			'width'  => 720,
			'height' => 1080,
			'label'  => $label,
		);
	};

	return array(
		'womens-floral-print-active-set'      => array(
			'id'               => 'womens-floral-print-active-set',
			'title'            => "Women's floral-print mock-neck top & leggings set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Two-piece fitted long-sleeve mock-neck top and full-length leggings in an all-over warm cream botanical print.',
			'details'          => array(
				'Two-piece fitted set: long-sleeve top and matching full-length ankle leggings',
				'All-over coral, orange-red, magenta, and lilac floral print on a cream base',
				'High mock collar with integrated thumbholes at sleeve cuffs and clean cream flat seam lines',
				'Fabric composition, GSM, colourways, and trim details confirmed per buyer project brief',
			),
			'images'           => $build_images(
				'womens-floral-print-active-set',
				array(
					'front' => array( 'Front view', "Front view of the women's cream floral-print mock-neck long-sleeve top and matching leggings set" ),
					'side'  => array( 'Side view', "Side view of the women's floral-print activewear set showing sleeve seam lines and fit" ),
					'back'  => array( 'Back view', "Back view of the women's floral-print mock-neck top and full-length leggings" ),
				)
			),
			'video'            => $build_video( 'womens-floral-print-active-set', 'Full-set model fit video' ),
		),
		'womens-stripe-thumbhole-running-set' => array(
			'id'               => 'womens-stripe-thumbhole-running-set',
			'title'            => "Women's striped thumbhole running top & shorts set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Horizontal magenta-and-rose striped long-sleeve top with thumbholes and matching shorts accented with golden-yellow contrast stitching.',
			'details'          => array(
				'Two-piece running set: bound crew-neck long-sleeve top and matching fitted mini shorts',
				'Horizontal magenta and rose stripes paired with golden-yellow contrast seam stitching',
				'Extended sleeve cuffs with integrated thumbholes and contoured panel seams',
				'Fabric specification, GSM, short inseam length, and seam construction confirmed per project',
			),
			'images'           => $build_images(
				'womens-stripe-thumbhole-running-set',
				array(
					'front'  => array( 'Front view', "Front view of the women's magenta striped running top and shorts set with contrast yellow stitching" ),
					'detail' => array( 'Cuff & thumbhole detail', "Close-up of the extended thumbhole cuff and contrast yellow seam stitching on the striped running top" ),
					'back'   => array( 'Back view', "Back view of the women's striped long-sleeve top and matching shorts showing contrast panel seams" ),
				)
			),
			'video'            => $build_video( 'womens-stripe-thumbhole-running-set', 'Running set fit video' ),
		),
		'womens-crimson-half-zip-active-set'  => array(
			'id'               => 'womens-crimson-half-zip-active-set',
			'title'            => "Women's striped half-zip top & leggings set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Crimson-and-coral striped half-zip stand-collar top and full-length leggings with golden-yellow contrast panel stitching.',
			'details'          => array(
				'Two-piece set combining a stand-collar half-zip long-sleeve top and full-length leggings',
				'Horizontal crimson and coral-pink stripes with golden-yellow contrast seam lines',
				'Tonal center-front half zipper, fitted cuffs, and contoured front/back leg seams',
				'Fabric weight, stripe repeat, zipper spec, and sizing confirmed against buyer brief',
			),
			'images'           => $build_images(
				'womens-crimson-half-zip-active-set',
				array(
					'front' => array( 'Front view', "Front view of the women's crimson striped half-zip top and leggings set with yellow contrast stitching" ),
					'side'  => array( 'Side view', "Side view of the women's crimson striped half-zip activewear set showing sleeve and leg seam lines" ),
					'back'  => array( 'Back view', "Back view of the women's crimson striped half-zip top and matching full-length leggings" ),
				)
			),
			'video'            => $build_video( 'womens-crimson-half-zip-active-set', 'Full-set model fit video' ),
		),
		'womens-bra-biker-shorts-set'         => array(
			'id'               => 'womens-bra-biker-shorts-set',
			'title'            => "Women's colorblock sports bra & biker shorts set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Two-tone set pairing a cream scoop-neck longline sports bra with aqua high-rise biker shorts.',
			'details'          => array(
				'Cream longline sports bra with deep scoop front, U-back neckline, wide straps, and underbust band',
				'Bright aqua high-rise mid-thigh biker shorts with wide contoured waistband',
				'Clean tonal stitching across waistband, side thigh panels, and twin-needle-style leg hems',
				'Bra support target, fabric opacity, GSM, and colourways confirmed on approved sample',
			),
			'images'           => $build_images(
				'womens-bra-biker-shorts-set',
				array(
					'front' => array( 'Front view', "Front view of the women's cream scoop-neck sports bra and bright aqua biker shorts set" ),
					'side'  => array( 'Side view', "Side view of the women's cream sports bra and aqua high-rise biker shorts" ),
					'back'  => array( 'Back view', "Back view of the women's U-back cream sports bra and aqua biker shorts" ),
				)
			),
			'video'            => $build_video( 'womens-bra-biker-shorts-set', 'Set fit & movement video' ),
		),
		'womens-full-zip-training-vest'       => array(
			'id'               => 'womens-full-zip-training-vest',
			'title'            => "Women's full-zip paneled training vest",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Sleeveless medium-grey stand-collar training vest featuring a full front zipper, black side gussets, and perforated rear-side panels.',
			'details'          => array(
				'Stand collar with full-length black front zipper and black elastic armhole/hem binding',
				'Paneled construction combining solid grey front body, black side gussets, and perforated rear-side panels',
				'Horizontal upper-back yoke seam with tonal topstitching and circular left-chest emblem patch',
				'Shell/mesh material pairing, trim details, and branding developed to buyer specification',
			),
			'images'           => $build_images(
				'womens-full-zip-training-vest',
				array(
					'front'  => array( 'Front view', "Front view of the women's grey sleeveless full-zip training vest layered over a white tee" ),
					'detail' => array( 'Side panel detail', "Side close-up showing the black underarm gusset, perforated rear-side panel, and elastic armhole binding" ),
					'back'   => array( 'Back view', "Back view of the women's grey training vest showing the upper-back yoke seam and black trim" ),
				)
			),
			'video'            => $build_video( 'womens-full-zip-training-vest', 'Vest fit & panel video' ),
		),
		'mens-thumbhole-training-top'         => array(
			'id'               => 'mens-thumbhole-training-top',
			'title'            => "Men's printed thumbhole training top",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Pale ice-blue tonal-print crewneck training top with sage-green contrast side panels and perforated thumbhole cuffs.',
			'details'          => array(
				'Crewneck long-sleeve silhouette with contoured set-in armhole seams and straight hem',
				'Ice-blue all-over tonal print paired with pale sage-green underarm and side contrast panels',
				'Extended sleeve cuffs with integrated thumbholes and micro-perforated lower cuff panels',
				'Print artwork, panel colours, fabric GSM, and custom branding confirmed per project',
			),
			'images'           => $build_images(
				'mens-thumbhole-training-top',
				array(
					'front'  => array( 'Front view', "Front view of the men's pale ice-blue tonal-print long-sleeve training top with sage side panels" ),
					'detail' => array( 'Cuff & thumbhole detail', "Close-up of the extended thumbhole cuff with micro-perforated panel detail on the men's training top" ),
					'back'   => array( 'Back view', "Back view of the men's pale blue tonal-print crewneck training top" ),
				)
			),
			'video'            => $build_video( 'mens-thumbhole-training-top', 'Top fit & cuff video' ),
		),
		'mens-printed-quarter-zip-hoodie'     => array(
			'id'               => 'mens-printed-quarter-zip-hoodie',
			'title'            => "Men's printed quarter-zip outdoor hoodie",
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'Outdoor Clothing',
			'inquiry_category' => 'Outdoor Clothing',
			'season'           => '2026-11 Selection',
			'summary'          => 'Off-white abstract-camo raglan pullover hoodie with a scuba hood, quarter front zipper, zippered chest pocket, and sage side panels.',
			'details'          => array(
				'Scuba-style attached hood with bound opening edge and center-front quarter zipper',
				'Vertical zippered left-chest pocket with pull cord, raglan sleeves, and curved back yoke seam',
				'Off-white and warm-taupe abstract camo print with solid pale sage underarm/side panels',
				'All-over print, pocket trims, fabric weight, and branding developed per OEM brief',
			),
			'images'           => $build_images(
				'mens-printed-quarter-zip-hoodie',
				array(
					'front'  => array( 'Front view', "Front view of the men's printed quarter-zip pullover hoodie with zippered chest pocket" ),
					'detail' => array( 'Hood-up front view', "Front view showing the scuba hood up, quarter front zipper, and chest zip pocket" ),
					'back'   => array( 'Back view', "Back view of the men's printed pullover hoodie showing the curved yoke seam and sage side panels" ),
				)
			),
			'video'            => $build_video( 'mens-printed-quarter-zip-hoodie', 'Hoodie fit & pocket video' ),
		),
		'mens-multicolor-print-hoodie'        => array(
			'id'               => 'mens-multicolor-print-hoodie',
			'title'            => "Men's multicolor-print pullover hoodie",
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'Outdoor Clothing',
			'inquiry_category' => 'Outdoor Clothing',
			'season'           => '2026-11 Selection',
			'summary'          => 'Multicolor abstract-camo pullover hoodie with a crossover scuba hood, sage underarm contrast panels, and thumbhole cuffs.',
			'details'          => array(
				'Crossover-neck scuba hood with cream edge binding, contoured set-in sleeves, and curved back yoke',
				'Cool-grey, terracotta, and slate-grey abstract camo print paired with pale sage side/inner-sleeve panels',
				'Extended sleeve cuffs with integrated thumbholes and clean tonal seam stitching',
				'Print artwork, fabric selection, hood construction, and custom labels confirmed per project',
			),
			'images'           => $build_images(
				'mens-multicolor-print-hoodie',
				array(
					'front'  => array( 'Front view', "Front view of the men's multicolor abstract-camo pullover hoodie with thumbhole cuffs" ),
					'detail' => array( 'Hood-up side profile', "Side view showing the crossover scuba hood up, set-in sleeve seams, and sage side panel" ),
					'back'   => array( 'Back view', "Back view of the men's multicolor-print pullover hoodie showing the curved upper-back yoke" ),
				)
			),
			'video'            => $build_video( 'mens-multicolor-print-hoodie', 'Hoodie fit & hood-up video' ),
		),
	);
}

/**
 * Build a /contact/ prefill URL for a seasonal sample card or modal.
 *
 * @param string $sample_id Registered seasonal sample ID.
 * @return string
 */
function myathletik_product_seasonal_inquiry_url( $sample_id ) {
	$items = myathletik_product_seasonal_gallery_data();
	if ( ! isset( $items[ $sample_id ] ) ) {
		return home_url( '/contact/' );
	}
	return add_query_arg(
		array(
			'category' => $items[ $sample_id ]['inquiry_category'],
			'sample'   => $sample_id,
		),
		home_url( '/contact/' )
	) . '#ma-contact-form-title';
}
