<?php
/**
 * Homepage client logo strip.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_dir      = get_stylesheet_directory() . '/assets/images/brand-partner';
$logo_uri_base = get_stylesheet_directory_uri() . '/assets/images/brand-partner/';
$logo_files    = is_dir( $logo_dir ) ? glob( $logo_dir . '/*.{jpg,jpeg,png,webp,gif,svg}', GLOB_BRACE ) : array();

if ( empty( $logo_files ) ) {
	return;
}

natcasesort( $logo_files );
$logo_files = array_values( $logo_files );
?>

<section class="ma-client-logos" aria-labelledby="ma-client-logos-title">
	<div class="ma-client-logos__inner">
		<p id="ma-client-logos-title" class="ma-client-logos__heading">
			<?php esc_html_e( 'Trusted by leading brands worldwide', 'myathletik-child' ); ?>
		</p>

		<div class="ma-client-logos__viewport" aria-label="<?php esc_attr_e( 'Client brand logo strip', 'myathletik-child' ); ?>">
			<div class="ma-client-logos__track">
				<?php for ( $set = 0; $set < 2; $set++ ) : ?>
					<?php foreach ( $logo_files as $logo_file ) : ?>
						<?php
						$filename   = basename( $logo_file );
						$brand_name = preg_replace( '/\.[^.]+$/', '', $filename );
						$brand_name = preg_replace( '/^\d+[-_]?/', '', $brand_name );
						$brand_name = trim( str_replace( array( '-', '_' ), ' ', $brand_name ) );
						?>
						<figure class="ma-client-logo"<?php echo 0 === $set ? '' : ' aria-hidden="true"'; ?>>
							<img
								src="<?php echo esc_url( $logo_uri_base . rawurlencode( $filename ) ); ?>"
								alt="<?php echo 0 === $set ? esc_attr( $brand_name . ' client logo' ) : ''; ?>"
								loading="lazy"
							>
						</figure>
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>
	</div>
</section>
