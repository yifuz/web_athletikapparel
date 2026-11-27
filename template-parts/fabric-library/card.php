<?php
/** A source-grounded specification card with real swatch photography where verified. */
if ( ! defined( 'ABSPATH' ) || empty( $args['fabric'] ) ) {
	return;
}
$fabric    = $args['fabric'];
$has_image = ! empty( $fabric['has_image'] ) && ! empty( $fabric['image'] );

if ( count( $fabric['composition'] ) === 1 && isset( $fabric['composition']['Composition'] ) ) {
	$composition_text = $fabric['composition']['Composition'];
} else {
	$parts = array();
	foreach ( $fabric['composition'] as $label => $value ) {
		$parts[] = $label . ': ' . $value;
	}
	$composition_text = implode( ' · ', $parts );
}
?>
<article class="ma-fabric-card<?php echo $has_image ? ' ma-fabric-card--has-media' : ''; ?>" id="fabric-<?php echo esc_attr( strtolower( $fabric['ref'] ) ); ?>" tabindex="-1" data-fabric-card data-ref="<?php echo esc_attr( $fabric['ref'] ); ?>" data-composition="<?php echo esc_attr( implode( ' ', $fabric['composition'] ) ); ?>" data-materials="<?php echo esc_attr( implode( ' ', $fabric['materials'] ) ); ?>" data-gsm="<?php echo esc_attr( $fabric['gsm'] ); ?>" data-gsm-min="<?php echo esc_attr( $fabric['gsm_min'] ); ?>" data-gsm-max="<?php echo esc_attr( $fabric['gsm_max'] ); ?>">
	<?php if ( $has_image ) : ?>
		<div class="ma-fabric-card__media">
			<a
				class="ma-fabric-card__swatch"
				href="<?php echo esc_url( get_stylesheet_directory_uri() . $fabric['image_large'] ); ?>"
				data-fabric-lightbox-trigger
				data-lightbox-ref="<?php echo esc_attr( $fabric['ref'] ); ?>"
				data-lightbox-gsm="<?php echo esc_attr( $fabric['gsm'] . ' GSM' ); ?>"
				data-lightbox-kind="<?php echo esc_attr( $fabric['kind'] ); ?>"
				data-lightbox-composition="<?php echo esc_attr( $composition_text ); ?>"
				aria-label="<?php echo esc_attr( sprintf( __( 'Inspect %s macro swatch', 'myathletik-child' ), $fabric['ref'] ) ); ?>"
			>
				<img
					src="<?php echo esc_url( get_stylesheet_directory_uri() . $fabric['image'] ); ?>"
					width="640"
					height="360"
					alt="<?php echo esc_attr( $fabric['image_alt'] ); ?>"
					loading="lazy"
					decoding="async"
				>
				<span class="ma-fabric-card__zoom" aria-hidden="true">↗</span>
			</a>
		</div>
	<?php endif; ?>
	<div class="ma-fabric-card__head">
		<div>
			<p class="ma-fabric-card__kind"><?php echo esc_html( $fabric['kind'] ); ?></p>
			<h3><?php echo esc_html( $fabric['ref'] ); ?></h3>
		</div>
		<p class="ma-fabric-card__weight<?php echo $fabric['gsm_min'] !== $fabric['gsm_max'] ? ' ma-fabric-card__weight--range' : ''; ?>"><strong><?php echo esc_html( $fabric['gsm'] ); ?></strong><span>GSM</span></p>
	</div>
	<dl class="ma-fabric-card__composition">
		<?php foreach ( $fabric['composition'] as $label => $value ) : ?>
			<div><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
		<?php endforeach; ?>
	</dl>
</article>
