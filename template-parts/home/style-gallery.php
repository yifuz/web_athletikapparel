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
		array( 'file' => 'merino wool product/merino-wool-base-layer-10.jpg', 'alt' => __( 'Merino wool apparel model sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'sportswear/flatlock-athletic-800-42-1.jpg', 'alt' => __( 'Sportswear model wearing flatlock athletic garment', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5445.jpg', 'alt' => __( 'Technical silk wear model sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'merino wool product/merino-wool-base-layer-11.jpg', 'alt' => __( 'Merino wool base layer model in technical knitwear', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'outdoor clothing/flatlock-athletic-800-50-1.jpg', 'alt' => __( 'Outdoor clothing model product sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5478.jpg', 'alt' => __( 'Silk wear model sample for OEM/ODM apparel', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-12.jpg', 'alt' => __( 'Merino wool apparel model sample for production', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'sportswear/IMG_7836-1-scaled.jpg', 'alt' => __( 'Sportswear model sample in technical knit apparel', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'outdoor clothing/flatlock-athletic-800-54.jpg', 'alt' => __( 'Outdoor knitwear model sample for OEM/ODM manufacturing', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5519.jpg', 'alt' => __( 'Silk wear model apparel sample', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'merino wool product/merino-wool-base-layer-13.jpg', 'alt' => __( 'Merino wool technical base layer model', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'silkwear/IMG_5532.jpg', 'alt' => __( 'Silk wear technical garment model', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'merino wool product/merino-wool-base-layer-14.jpg', 'alt' => __( 'Merino wool base layer model for private label production', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'silkwear/IMG_5542.jpg', 'alt' => __( 'Silk technical garment model lookbook image', 'myathletik-child' ), 'size' => 'medium' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5566.jpg', 'alt' => __( 'Silk apparel model sample for brand development', 'myathletik-child' ), 'size' => 'tall' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-15.jpg', 'alt' => __( 'Merino wool model apparel sample', 'myathletik-child' ), 'size' => 'short' ),
	),
	array(
		array( 'file' => 'merino wool product/merino-wool-base-layer-16.jpg', 'alt' => __( 'Merino wool technical knitwear model sample', 'myathletik-child' ), 'size' => 'short' ),
		array( 'file' => 'silkwear/IMG_5600.jpg', 'alt' => __( 'Silk wear model image for OEM/ODM apparel lookbook', 'myathletik-child' ), 'size' => 'tall' ),
	),
	array(
		array( 'file' => 'silkwear/IMG_5614.jpg', 'alt' => __( 'Silk apparel model garment detail', 'myathletik-child' ), 'size' => 'medium' ),
		array( 'file' => 'merino wool product/merino-wool-base-layer-17.jpg', 'alt' => __( 'Merino wool base layer model garment sample', 'myathletik-child' ), 'size' => 'medium' ),
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
