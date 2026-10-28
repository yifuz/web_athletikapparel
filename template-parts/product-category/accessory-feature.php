<?php
/**
 * Head and neck accessory product examples and their development briefs.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sub       = $args['sub'];
$secondary = $args['secondary_image'];
$options   = array_values( $sub['development']['options'] );
$examples  = array(
	array(
		'image'       => $sub['image'],
		'alt'         => $args['image_alt'],
		'width'       => $args['image_width'],
		'height'      => $args['image_height'],
		'srcset'      => $args['webp_srcset'],
		'caption'     => $sub['primary_image_caption'],
		'option'      => $options[0],
		'image_class' => 'ma-accessory-feature__image--primary',
	),
	array(
		'image'       => $secondary['image'],
		'alt'         => $secondary['alt'],
		'width'       => $secondary['width'],
		'height'      => $secondary['height'],
		'srcset'      => $args['secondary_srcset'],
		'caption'     => $secondary['caption'],
		'option'      => $options[1],
		'image_class' => 'ma-accessory-feature__image--secondary',
	),
);
?>
<article class="ma-accessory-feature" id="subcat-<?php echo esc_attr( $args['slug'] ); ?>">
	<header class="ma-accessory-feature__intro">
		<span class="ma-subcat__index">01</span>
		<h3><?php echo esc_html( $sub['title'] ); ?></h3>
		<p><?php echo esc_html( $sub['description'] ); ?></p>
	</header>
	<div class="ma-accessory-feature__grid">
		<?php foreach ( $examples as $example ) : ?>
			<section class="ma-accessory-feature__card">
				<figure class="ma-accessory-feature__figure">
					<picture class="ma-accessory-feature__image <?php echo esc_attr( $example['image_class'] ); ?>">
						<?php if ( $example['srcset'] ) : ?>
							<source type="image/webp" srcset="<?php echo esc_attr( implode( ', ', $example['srcset'] ) ); ?>" sizes="<?php echo esc_attr( $args['image_sizes'] ); ?>">
						<?php endif; ?>
						<img src="<?php echo esc_url( $args['image_base'] . $example['image'] ); ?>" width="<?php echo esc_attr( absint( $example['width'] ) ); ?>" height="<?php echo esc_attr( absint( $example['height'] ) ); ?>" alt="<?php echo esc_attr( $example['alt'] ); ?>" loading="lazy" decoding="async">
					</picture>
					<?php if ( $example['caption'] !== $example['option']['label'] ) : ?>
						<figcaption><?php echo esc_html( $example['caption'] ); ?></figcaption>
					<?php endif; ?>
				</figure>
				<div class="ma-accessory-feature__copy">
					<h4><?php echo esc_html( $example['option']['label'] ); ?></h4>
					<p><?php echo esc_html( $example['option']['description'] ); ?></p>
				</div>
			</section>
		<?php endforeach; ?>
	</div>
</article>
