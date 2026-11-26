<?php
/**
 * Decoupled registry for Seasonal Sample Gallery items on /product-showcase/.
 *
 * Studio photography selections only (title + one-sentence summary).
 * Intentionally omits unconfirmed fiber compositions, GSM weights,
 * fabric codes, and ISO stitch numbers, and does NOT generate standalone SEO pages.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return seasonal sample gallery items ordered for display.
 *
 * Newest seasons sort first automatically; within the same season, add newer
 * items at the top of the array so they appear first.
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

	return array(
		'womens-floral-print-active-set'      => array(
			'id'               => 'womens-floral-print-active-set',
			'title'            => "Women's floral-print mock-neck top & leggings set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Two-piece fitted mock-neck long-sleeve top with thumbholes and full-length leggings in a cream botanical print.',
			'images'           => $build_images(
				'womens-floral-print-active-set',
				array(
					'front' => array( 'Front view', "Front view of the women's cream floral-print mock-neck long-sleeve top and matching leggings set" ),
					'side'  => array( 'Side view', "Side view of the women's floral-print activewear set showing sleeve seam lines and fit" ),
					'back'  => array( 'Back view', "Back view of the women's floral-print mock-neck top and full-length leggings" ),
				)
			),
		),
		'womens-stripe-thumbhole-running-set' => array(
			'id'               => 'womens-stripe-thumbhole-running-set',
			'title'            => "Women's striped thumbhole running top & shorts set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Horizontal magenta-and-rose striped crew-neck top with thumbholes and matching shorts accented with golden-yellow contrast stitching.',
			'images'           => $build_images(
				'womens-stripe-thumbhole-running-set',
				array(
					'front'  => array( 'Front view', "Front view of the women's magenta striped running top and shorts set with contrast yellow stitching" ),
					'detail' => array( 'Cuff & thumbhole detail', "Close-up of the extended thumbhole cuff and contrast yellow seam stitching on the striped running top" ),
					'back'   => array( 'Back view', "Back view of the women's striped long-sleeve top and matching shorts showing contrast panel seams" ),
				)
			),
		),
		'womens-crimson-half-zip-active-set'  => array(
			'id'               => 'womens-crimson-half-zip-active-set',
			'title'            => "Women's striped half-zip top & leggings set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Crimson-and-coral striped stand-collar half-zip top and full-length leggings with golden-yellow contrast panel stitching.',
			'images'           => $build_images(
				'womens-crimson-half-zip-active-set',
				array(
					'front' => array( 'Front view', "Front view of the women's crimson striped half-zip top and leggings set with yellow contrast stitching" ),
					'side'  => array( 'Side view', "Side view of the women's crimson striped half-zip activewear set showing sleeve and leg seam lines" ),
					'back'  => array( 'Back view', "Back view of the women's crimson striped half-zip top and matching full-length leggings" ),
				)
			),
		),
		'womens-bra-biker-shorts-set'         => array(
			'id'               => 'womens-bra-biker-shorts-set',
			'title'            => "Women's colorblock sports bra & biker shorts set",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Two-tone colorblock set pairing a cream U-back longline sports bra with aqua high-rise biker shorts.',
			'images'           => $build_images(
				'womens-bra-biker-shorts-set',
				array(
					'front' => array( 'Front view', "Front view of the women's cream scoop-neck sports bra and bright aqua biker shorts set" ),
					'side'  => array( 'Side view', "Side view of the women's cream sports bra and aqua high-rise biker shorts" ),
					'back'  => array( 'Back view', "Back view of the women's U-back cream sports bra and aqua biker shorts" ),
				)
			),
		),
		'womens-full-zip-training-vest'       => array(
			'id'               => 'womens-full-zip-training-vest',
			'title'            => "Women's reflective full-zip night-running vest",
			'category_slug'    => 'sportswear-manufacturer',
			'category_label'   => 'Sportswear',
			'inquiry_category' => 'Sportswear',
			'season'           => '2026-11 Selection',
			'summary'          => 'Sleeveless stand-collar running vest crafted with reflective fabric for night visibility, paired with a full front zipper, black side gussets, and perforated rear-side panels.',
			'images'           => $build_images(
				'womens-full-zip-training-vest',
				array(
					'front'  => array( 'Front view', "Front view of the women's reflective grey sleeveless full-zip night-running vest layered over a white tee" ),
					'detail' => array( 'Side panel detail', "Side close-up of the reflective running vest showing the black underarm gusset, perforated rear-side panel, and elastic armhole binding" ),
					'back'   => array( 'Back view', "Back view of the women's reflective grey night-running vest showing the upper-back yoke seam and black trim" ),
				)
			),
		),
		'mens-thumbhole-training-top'         => array(
			'id'               => 'mens-thumbhole-training-top',
			'title'            => "Men's cooling UV-protective fishing long-sleeve top",
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'Outdoor Clothing',
			'inquiry_category' => 'Outdoor Clothing',
			'season'           => '2026-11 Selection',
			'summary'          => 'Pale ice-blue tonal-print cooling and UV-protective crewneck fishing top with sage-green contrast side panels and perforated thumbhole cuffs.',
			'images'           => $build_images(
				'mens-thumbhole-training-top',
				array(
					'front'  => array( 'Front view', "Front view of the men's pale ice-blue tonal-print cooling UV-protective fishing long-sleeve top with sage side panels" ),
					'detail' => array( 'Cuff & thumbhole detail', "Close-up of the extended thumbhole cuff with micro-perforated panel detail on the men's cooling UV-protective fishing top" ),
					'back'   => array( 'Back view', "Back view of the men's pale blue tonal-print cooling UV-protective crewneck fishing top" ),
				)
			),
		),
		'mens-printed-quarter-zip-hoodie'     => array(
			'id'               => 'mens-printed-quarter-zip-hoodie',
			'title'            => "Men's cooling UV-protective quarter-zip fishing hoodie",
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'Outdoor Clothing',
			'inquiry_category' => 'Outdoor Clothing',
			'season'           => '2026-11 Selection',
			'summary'          => 'Off-white abstract-camo cooling and UV-protective fishing hoodie with a scuba hood, quarter front zipper, zippered chest pocket, and sage side panels.',
			'images'           => $build_images(
				'mens-printed-quarter-zip-hoodie',
				array(
					'front'  => array( 'Front view', "Front view of the men's cooling UV-protective printed quarter-zip fishing hoodie with zippered chest pocket" ),
					'detail' => array( 'Hood-up front view', "Front view showing the scuba hood up, quarter front zipper, and chest zip pocket on the men's fishing hoodie" ),
					'back'   => array( 'Back view', "Back view of the men's printed cooling UV-protective fishing hoodie showing the curved yoke seam and sage side panels" ),
				)
			),
		),
		'mens-multicolor-print-hoodie'        => array(
			'id'               => 'mens-multicolor-print-hoodie',
			'title'            => "Men's cooling UV-protective multicolor fishing hoodie",
			'category_slug'    => 'outdoor-clothing-manufacturer',
			'category_label'   => 'Outdoor Clothing',
			'inquiry_category' => 'Outdoor Clothing',
			'season'           => '2026-11 Selection',
			'summary'          => 'Multicolor abstract-camo cooling and UV-protective fishing pullover hoodie with a crossover scuba hood, sage underarm contrast panels, and thumbhole cuffs.',
			'images'           => $build_images(
				'mens-multicolor-print-hoodie',
				array(
					'front'  => array( 'Front view', "Front view of the men's multicolor abstract-camo cooling UV-protective fishing hoodie with thumbhole cuffs" ),
					'detail' => array( 'Hood-up side profile', "Side view showing the crossover scuba hood up, set-in sleeve seams, and sage side panel on the men's fishing hoodie" ),
					'back'   => array( 'Back view', "Back view of the men's multicolor-print cooling UV-protective fishing hoodie showing the curved upper-back yoke" ),
				)
			),
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
