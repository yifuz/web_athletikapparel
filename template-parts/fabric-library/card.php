<?php
/** A source-grounded specification card. No substitute swatch photography. */
if ( ! defined( 'ABSPATH' ) || empty( $args['fabric'] ) ) {
	return;
}
$fabric = $args['fabric'];
$groups = array( 'pure' => __( '100% Merino wool', 'myathletik-child' ), 'blend' => __( 'Merino wool blend', 'myathletik-child' ), 'layered' => __( 'Layered composition', 'myathletik-child' ) );
?>
<article class="ma-fabric-card" id="fabric-<?php echo esc_attr( strtolower( $fabric['ref'] ) ); ?>" tabindex="-1" data-fabric-card data-ref="<?php echo esc_attr( $fabric['ref'] ); ?>" data-composition="<?php echo esc_attr( implode( ' ', $fabric['composition'] ) ); ?>" data-group="<?php echo esc_attr( $fabric['group'] ); ?>" data-gsm="<?php echo esc_attr( $fabric['gsm'] ); ?>">
	<div class="ma-fabric-card__head">
		<div>
			<p class="ma-fabric-card__kind"><?php echo esc_html( $groups[ $fabric['group'] ] ); ?></p>
			<h3><?php echo esc_html( $fabric['ref'] ); ?></h3>
		</div>
		<p class="ma-fabric-card__weight"><strong><?php echo esc_html( $fabric['gsm'] ); ?></strong><span>GSM</span></p>
	</div>
	<dl class="ma-fabric-card__composition">
		<?php foreach ( $fabric['composition'] as $label => $value ) : ?>
			<div><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div>
		<?php endforeach; ?>
	</dl>
</article>
