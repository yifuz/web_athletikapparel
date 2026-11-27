<?php
/** Compact Merino entry within the existing fabric-development section. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$fabrics = myathletik_fabric_library_data();
$selected = array( 'HY254776', 'HY254955', 'HY254931' );
$library_url = home_url( '/knitted-fabrics-manufacturer/' );
?>
<div class="ma-fabric-preview" aria-label="<?php esc_attr_e( 'Selected 2025 Merino wool fabric references', 'myathletik-child' ); ?>" data-fabric-preview>
	<p class="ma-fabric-preview__label"><?php esc_html_e( 'Selected Merino wool fabrics · 2025', 'myathletik-child' ); ?></p>
	<p class="ma-fabric-preview__scope"><?php esc_html_e( 'A preview of our 2025 selection, not our complete fabric range.', 'myathletik-child' ); ?></p>
	<ul class="ma-fabric-preview__list">
		<?php foreach ( $selected as $ref ) : ?>
			<?php
			$fabric      = $fabrics[ $ref ];
			$composition = $fabric['composition']['Composition'];
			?>
			<li class="ma-fabric-preview__row">
				<?php if ( ! empty( $fabric['has_image'] ) && ! empty( $fabric['image'] ) ) : ?>
					<a
						class="ma-fabric-preview__thumb"
						href="<?php echo esc_url( get_stylesheet_directory_uri() . $fabric['image_large'] ); ?>"
						data-fabric-lightbox-trigger
						data-lightbox-ref="<?php echo esc_attr( $ref ); ?>"
						data-lightbox-gsm="<?php echo esc_attr( $fabric['gsm'] . ' GSM' ); ?>"
						data-lightbox-kind="<?php echo esc_attr( $fabric['kind'] ); ?>"
						data-lightbox-composition="<?php echo esc_attr( $composition ); ?>"
						aria-label="<?php echo esc_attr( sprintf( __( 'Inspect %s macro swatch', 'myathletik-child' ), $ref ) ); ?>"
					>
						<img
							src="<?php echo esc_url( get_stylesheet_directory_uri() . $fabric['image'] ); ?>"
							width="640"
							height="360"
							alt="<?php echo esc_attr( $fabric['image_alt'] ); ?>"
							loading="lazy"
							decoding="async"
						>
					</a>
				<?php endif; ?>
				<a class="ma-fabric-preview__item" href="<?php echo esc_url( $library_url . '#fabric-' . strtolower( $ref ) ); ?>">
					<span><strong><?php echo esc_html( $ref ); ?></strong><span class="ma-fabric-preview__composition"><?php echo esc_html( $composition ); ?></span></span>
					<span class="ma-fabric-preview__weight"><?php echo esc_html( $fabric['gsm'] ); ?> GSM<span aria-hidden="true"> ↗</span></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<a class="ma-fabric-preview__all" href="<?php echo esc_url( $library_url . '#merino-fabric-examples' ); ?>"><?php echo esc_html( sprintf( _n( 'View the %d fabric reference', 'View all %d fabric references', count( $fabrics ), 'myathletik-child' ), count( $fabrics ) ) ); ?><span aria-hidden="true"> →</span></a>
</div>
