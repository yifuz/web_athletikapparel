<?php
/**
 * Homepage scrolling model/product gallery.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image_base = get_stylesheet_directory_uri() . '/assets/images/';
$gallery_columns = array(
	array(
		array( 'file' => 'sportswear/flatlock-athletic-800-17.jpg', 'alt' => __( 'Sportswear model product sample for OEM/ODM knitwear', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'outdoor clothing/flatlock-athletic-800-4.jpg', 'alt' => __( 'Outdoor technical knitwear model sample', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5362.jpg', 'alt' => __( 'Silk wear model garment sample', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-12.jpg', 'alt' => __( 'Merino wool apparel model sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'sportswear/flatlock-athletic-800-42-1.jpg', 'alt' => __( 'Sportswear model wearing flatlock athletic garment', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5445.jpg', 'alt' => __( 'Technical silk wear model sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'underwear/IMG_5512-scaled.jpg', 'alt' => __( 'Technical knit underwear model sample', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'outdoor clothing/flatlock-athletic-800-50-1.jpg', 'alt' => __( 'Outdoor clothing model product sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5478.jpg', 'alt' => __( 'Silk wear model sample for OEM/ODM apparel', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-13.jpg', 'alt' => __( 'Merino wool apparel model sample for production', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'sportswear/IMG_7836-1-scaled.jpg', 'alt' => __( 'Sportswear model sample in technical knit apparel', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'outdoor clothing/flatlock-athletic-800-54.jpg', 'alt' => __( 'Outdoor knitwear model sample for OEM/ODM manufacturing', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5519.jpg', 'alt' => __( 'Silk wear model apparel sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'merino wool product/merino-wool-base-layer-14.jpg', 'alt' => __( 'Merino wool technical base layer model', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'silkwear/IMG_5532.jpg', 'alt' => __( 'Silk wear technical garment model', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'underwear/IMG_5054-scaled.jpg', 'alt' => __( 'Technical underwear construction sample', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5542.jpg', 'alt' => __( 'Silk technical garment model lookbook image', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5566.jpg', 'alt' => __( 'Silk apparel model sample for brand development', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-15.jpg', 'alt' => __( 'Merino wool model apparel sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'sportswear/1U128532.jpg', 'alt' => __( 'Sportswear compression legging model sample', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'silkwear/IMG_5600.jpg', 'alt' => __( 'Silk wear model image for OEM/ODM apparel lookbook', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5614.jpg', 'alt' => __( 'Silk apparel model garment detail', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-17.jpg', 'alt' => __( 'Merino wool base layer model garment sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	// --- Extended section: more variety across all categories ---
	array(
		array( 'file' => 'sportswear/1U128494.jpg', 'alt' => __( 'Sportswear training top model sample', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'outdoor clothing/flatlock-athletic-800-3.jpg', 'alt' => __( 'Outdoor clothing flatlock construction sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'underwear/IMG_5173-scaled.jpg', 'alt' => __( 'Performance underwear model sample', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-18.jpg', 'alt' => __( 'Merino wool base layer model for cold-weather programs', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5500.jpg', 'alt' => __( 'Silk wear lightweight apparel sample', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'sportswear/1U128568.jpg', 'alt' => __( 'Sportswear performance layer model sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'outdoor clothing/men-biking.png', 'alt' => __( 'Outdoor performance apparel on cycling model', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-19.jpg', 'alt' => __( 'Merino wool apparel model sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'underwear/IMG_4942-scaled.jpg', 'alt' => __( 'Underwear OEM/ODM production sample', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'silkwear/IMG_5659.jpg', 'alt' => __( 'Silk wear garment detail for premium programs', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'sportswear/IMG_5836.JPG', 'alt' => __( 'Yoga and studio wear model sample', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'merino wool product/merino-wool-base-layer-20.jpg', 'alt' => __( 'Merino wool technical knitwear model', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5682.jpg', 'alt' => __( 'Silk blend knit piece model sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'underwear/IMG_5575.JPG', 'alt' => __( 'Technical underwear private label sample', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'outdoor clothing/outdoor-men-biking.png', 'alt' => __( 'Outdoor cycling apparel model sample', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5706.jpg', 'alt' => __( 'Silk performance apparel model sample', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-21.jpg', 'alt' => __( 'Merino wool base layer for outdoor brands', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'sportswear/1U128570.jpg', 'alt' => __( 'Sportswear compression piece model sample', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'silkwear/IMG_5737.jpg', 'alt' => __( 'Silk wear knit apparel sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'underwear/IMG_5601.JPG', 'alt' => __( 'Microfiber underwear model sample', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-22.jpg', 'alt' => __( 'Merino wool performance apparel model', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5761.jpg', 'alt' => __( 'Lightweight silk apparel model sample', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'underwear/IMG_5172.JPG', 'alt' => __( 'Technical underwear model sample for private label', 'myathletik-child' ), 'size' => 'short' ),
	),
);
?>

<section class="ma-home-style-gallery" aria-labelledby="ma-home-style-gallery-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading ma-section-heading--center">
			<p class="ma-section-kicker"><?php esc_html_e( 'Product lookbook', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-style-gallery-title"><?php esc_html_e( 'Technical knitwear, built around your brand', 'myathletik-child' ); ?></h2>
		</div>
	</div>

	<div class="ma-style-marquee" aria-label="<?php esc_attr_e( 'Scrolling product and model image gallery', 'myathletik-child' ); ?>">
		<div class="ma-style-marquee__track">
			<?php for ( $set = 0; $set < 3; $set++ ) : ?>
				<?php foreach ( $gallery_columns as $column ) : ?>
					<div class="ma-style-column">
						<?php foreach ( $column as $image ) : ?>
							<figure class="ma-style-card ma-style-card--<?php echo esc_attr( $image['size'] ); ?>">
								<img src="<?php echo esc_url( $image_base . $image['file'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" loading="lazy">
							</figure>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>
