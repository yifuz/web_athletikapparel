<?php
/** Compact Merino entry within the existing fabric-development section. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$fabrics = myathletik_fabric_library_data();
$selected = array( 'HY254776', 'HY254955', 'HY254931' );
$library_url = home_url( '/knitted-fabrics-manufacturer/' );
?>
<div class="ma-fabric-preview" aria-label="<?php esc_attr_e( 'Selected 2025 fabric references', 'myathletik-child' ); ?>">
	<p class="ma-fabric-preview__label"><?php esc_html_e( 'Selected fabric references · 2025', 'myathletik-child' ); ?></p>
	<ul class="ma-fabric-preview__list">
		<?php foreach ( $selected as $ref ) : ?>
			<?php $fabric = $fabrics[ $ref ]; ?>
			<li><a class="ma-fabric-preview__item" href="<?php echo esc_url( $library_url . '#fabric-' . strtolower( $ref ) ); ?>"><span><strong><?php echo esc_html( $ref ); ?></strong><span class="ma-fabric-preview__composition"><?php echo esc_html( $fabric['composition']['Composition'] ); ?></span></span><span class="ma-fabric-preview__weight"><?php echo esc_html( $fabric['gsm'] ); ?> GSM<span aria-hidden="true"> ↗</span></span></a></li>
		<?php endforeach; ?>
	</ul>
	<a class="ma-fabric-preview__all" href="<?php echo esc_url( $library_url . '#merino-fabric-examples' ); ?>"><?php esc_html_e( 'Explore the fabric selection', 'myathletik-child' ); ?><span aria-hidden="true"> →</span></a>
</div>
