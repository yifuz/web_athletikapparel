<?php
/** A source-grounded specification card. No substitute swatch photography. */
if ( ! defined( 'ABSPATH' ) || empty( $args['fabric'] ) ) {
	return;
}
$fabric = $args['fabric'];
?>
<article class="ma-fabric-card" id="fabric-<?php echo esc_attr( strtolower( $fabric['ref'] ) ); ?>" tabindex="-1" data-fabric-card data-ref="<?php echo esc_attr( $fabric['ref'] ); ?>" data-composition="<?php echo esc_attr( implode( ' ', $fabric['composition'] ) ); ?>" data-materials="<?php echo esc_attr( implode( ' ', $fabric['materials'] ) ); ?>" data-gsm="<?php echo esc_attr( $fabric['gsm'] ); ?>" data-gsm-min="<?php echo esc_attr( $fabric['gsm_min'] ); ?>" data-gsm-max="<?php echo esc_attr( $fabric['gsm_max'] ); ?>">
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
