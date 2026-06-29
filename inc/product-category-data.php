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
			'meta_description' => __( 'Sportswear manufacturer for technical activewear, flatlock sportswear, power-stretch garments, and OEM/ODM performance knit programs.', 'myathletik-child' ),
			'h1'               => __( 'Sportswear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/sportswear/',
			'intro'            => __( 'We produce technical sportswear and activewear for performance brands worldwide. From flatlock and activeseam construction to high-performance knit fabrics, every piece is built for movement, durability, and the demands of athletic use - manufactured to your designs, samples, or tech packs.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Performance athletic wear and activewear', 'myathletik-child' ),
				__( 'Base layers and training tops', 'myathletik-child' ),
				__( 'Power-stretch and 4-way-stretch sportswear', 'myathletik-child' ),
				__( 'Genesis fleece and microfiber sportswear', 'myathletik-child' ),
				__( 'Moisture-wicking, UV-protective, and antimicrobial pieces', 'myathletik-child' ),
			),
			'construction'     => __( 'Built with Yamato flatlock and Merrow activeseam machines for clean, low-bulk, chafe-free seams. Available in microfiber, power stretch, Genesis fleece, and functional knits engineered for moisture management, UV protection, and antimicrobial performance, including bamboo charcoal.', 'myathletik-child' ),
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
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'underwear-manufacturer' => array(
			'title'            => __( 'Underwear', 'myathletik-child' ),
			'seo_title'        => __( 'Underwear Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Underwear manufacturer for flatlock, activeseam, bonded-welded, microfiber, merino wool, and technical OEM/ODM underwear programs.', 'myathletik-child' ),
			'h1'               => __( 'Underwear Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/underwear/',
			'intro'            => __( 'We specialize in technical and performance underwear - flatlock, activeseam, and bonded-welded construction for a smooth, seamless feel against the skin. A trusted production partner for underwear brands, importers, and private labels worldwide.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Men\'s boxer shorts and briefs', 'myathletik-child' ),
				__( 'Thermal / base-layer underwear', 'myathletik-child' ),
				__( '4-way-stretch performance underwear', 'myathletik-child' ),
				__( 'Microfiber and merino wool underwear', 'myathletik-child' ),
				__( 'Seamless bonded-welded underwear', 'myathletik-child' ),
			),
			'construction'     => __( 'Flatlock and activeseam seams for next-to-skin comfort, plus bonded-welded options for a clean seamless finish. Produced in 4-way stretch, microfiber, and merino wool, with moisture-wicking and antimicrobial finishes available.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real underwear product shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'underwear/boxer-brief-n-trunk-boxer-7.jpg', __( 'Boxer brief and trunk underwear sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_4942-scaled.jpg', __( 'Underwear product sample for OEM/ODM production', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_5054-scaled.jpg', __( 'Technical underwear garment construction sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_5173-scaled.jpg', __( 'Close-to-skin underwear OEM/ODM sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/IMG_5512-scaled.jpg', __( 'Technical knit underwear product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'underwear/X-IMG_4877-scaled.jpg', __( 'Underwear sample for private-label manufacturing', 'myathletik-child' ) ),
			),
			'related'          => array(
				myathletik_related_link( __( 'Sportswear Manufacturer', 'myathletik-child' ), '/sportswear-manufacturer/' ),
				myathletik_related_link( __( 'Merino Wool Manufacturer', 'myathletik-child' ), '/merino-wool-manufacturer/' ),
				myathletik_related_link( __( 'Our Services', 'myathletik-child' ), '/services/' ),
			),
		),
		'outdoor-clothing-manufacturer' => array(
			'title'            => __( 'Outdoor Clothing', 'myathletik-child' ),
			'seo_title'        => __( 'Outdoor Clothing Manufacturer | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Outdoor clothing manufacturer for technical base layers, mid-layers, cold-weather apparel, cooling series, and OEM/ODM outdoor knitwear.', 'myathletik-child' ),
			'h1'               => __( 'Outdoor Clothing Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/outdoor-clothing/',
			'intro'            => __( 'We manufacture technical outdoor clothing engineered for the elements - thermal base layers, mid-layers, and performance outerwear built with durable knit construction for outdoor and cold-weather brands.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Thermal base layers and mid-layers', 'myathletik-child' ),
				__( 'Outdoor performance tops and bottoms', 'myathletik-child' ),
				__( 'Cold-weather and technical outdoor apparel', 'myathletik-child' ),
				__( 'Cooling and sun-proof series for warm-weather outdoor use', 'myathletik-child' ),
			),
			'construction'     => __( 'Flatlock and activeseam construction for durability and comfort in the field. Built in thermal knits, merino wool, power stretch, and Genesis fleece, with moisture-wicking and UV-protective finishes for all-condition performance.', 'myathletik-child' ),
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
			'intro'            => __( 'We produce premium merino wool apparel - base layers, underwear, and performance pieces that combine natural temperature regulation and breathability with technical knit construction.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Merino wool base layers and underwear', 'myathletik-child' ),
				__( 'Jacquard merino wool apparel', 'myathletik-child' ),
				__( 'Printed merino wool apparel', 'myathletik-child' ),
				__( 'Merino blend performance pieces', 'myathletik-child' ),
			),
			'construction'     => __( 'Natural merino wool engineered for warmth, breathability, and odor resistance, finished with flatlock and activeseam construction. Available in jacquard and printed designs, plain or blended for added stretch and durability.', 'myathletik-child' ),
			'image_note'       => __( '[IMAGE: real merino wool product shots]', 'myathletik-child' ),
			'gallery'          => array(
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-10.jpg', __( 'Merino wool apparel product sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-12.jpg', __( 'Merino wool technical knitwear sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-13.jpg', __( 'Merino wool base layer product detail', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-14.jpg', __( 'Merino wool OEM/ODM garment sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-15.jpg', __( 'Merino wool outdoor apparel sample', 'myathletik-child' ) ),
				myathletik_gallery_item( 'merino wool product/merino-wool-base-layer-16.jpg', __( 'Merino wool base layer manufacturing sample', 'myathletik-child' ) ),
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
			'meta_description' => __( 'Knitted fabrics manufacturer for performance knits, thermal knits, recycled fabrics, microfiber, merino, power stretch, and functional OEM/ODM fabric programs.', 'myathletik-child' ),
			'h1'               => __( 'Knitted Fabrics Manufacturer', 'myathletik-child' ),
			'old_url'          => '/products/knitted-fabrics/',
			'intro'            => __( 'Beyond finished garments, we produce our own performance and thermal knit fabrics - giving brands true vertical integration from yarn to finished piece, with full in-house testing.', 'myathletik-child' ),
			'what_we_make'     => array(
				__( 'Performance knit fabrics for activewear and underwear', 'myathletik-child' ),
				__( 'Thermal knit fabrics', 'myathletik-child' ),
				__( 'Functional fabrics: moisture-wicking, UV-protective, antimicrobial, bamboo charcoal', 'myathletik-child' ),
				__( '4-way stretch, power stretch, microfiber, and merino knits', 'myathletik-child' ),
				__( 'Recycled fabrics (GRS certified)', 'myathletik-child' ),
			),
			'construction'     => __( 'Our own fabric mill produces the knit fabrics used in our garments, with full in-house testing for quality and performance. Brands can supply swatches for us to develop counter samples, or select from our fabric collections.', 'myathletik-child' ),
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
