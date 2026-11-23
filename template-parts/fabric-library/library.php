<?php
/** Six-card pages with native disclosure fallback; all records are server-rendered. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$fabrics = myathletik_fabric_library_data();
$pages = array_chunk( $fabrics, 6, true );
$material_groups = myathletik_fabric_library_material_groups();
$available_materials = array_unique( array_merge( ...array_column( $fabrics, 'materials' ) ) );
?>
<section class="ma-product-section ma-fabric-library" id="merino-fabric-examples" aria-labelledby="ma-fabric-library-title" data-fabric-library>
	<div id="fabric-library" class="ma-section-inner">
		<header class="ma-fabric-library__heading">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Fabric references', 'myathletik-child' ); ?></p>
				<h2 id="ma-fabric-library-title"><?php esc_html_e( 'Fabric selection library', 'myathletik-child' ); ?></h2>
				<p class="ma-fabric-library__scope"><?php esc_html_e( 'Compare representative fabric references by composition and weight. This selection is not our complete fabric range or a live stock list.', 'myathletik-child' ); ?></p>
			</div>
			<div class="ma-fabric-library__edition">
				<span><?php esc_html_e( 'In this library', 'myathletik-child' ); ?></span>
				<strong><?php echo esc_html( count( $fabrics ) ); ?> <?php esc_html_e( 'references', 'myathletik-child' ); ?></strong>
				<span><?php echo esc_html( min( array_column( $fabrics, 'gsm_min' ) ) . '–' . max( array_column( $fabrics, 'gsm_max' ) ) ); ?> GSM</span>
			</div>
		</header>
		<div class="ma-fabric-library__collections" aria-label="<?php esc_attr_e( 'Collections represented in this library', 'myathletik-child' ); ?>">
			<p class="ma-fabric-library__collections-label"><?php esc_html_e( 'Currently included', 'myathletik-child' ); ?></p>
			<ul class="ma-fabric-library__collection-list">
				<li><strong><?php esc_html_e( 'Recent fabric references', 'myathletik-child' ); ?></strong><span>HY24 · HY25 · HY26</span></li>
				<li><strong><?php esc_html_e( 'Merino wool', 'myathletik-child' ); ?></strong><span><?php esc_html_e( '2025 collection', 'myathletik-child' ); ?></span></li>
			</ul>
		</div>
		<div class="ma-fabric-library__controls" data-fabric-controls role="search" aria-label="<?php esc_attr_e( 'Filter fabric references', 'myathletik-child' ); ?>" hidden>
			<label class="ma-fabric-library__search" for="ma-fabric-search"><span><?php esc_html_e( 'Find a reference', 'myathletik-child' ); ?></span><input type="search" id="ma-fabric-search" placeholder="<?php esc_attr_e( 'Fabric code or fiber', 'myathletik-child' ); ?>" data-fabric-search aria-controls="ma-fabric-results" autocomplete="off"></label>
			<label for="ma-fabric-group"><span><?php esc_html_e( 'Fiber content', 'myathletik-child' ); ?></span><select id="ma-fabric-group" data-fabric-group aria-controls="ma-fabric-results"><option value="all"><?php esc_html_e( 'All fibers', 'myathletik-child' ); ?></option><?php foreach ( $material_groups as $key => $label ) : ?><?php if ( in_array( $key, $available_materials, true ) ) : ?><option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></option><?php endif; ?><?php endforeach; ?></select></label>
			<label for="ma-fabric-weight"><span><?php esc_html_e( 'Fabric weight', 'myathletik-child' ); ?></span><select id="ma-fabric-weight" data-fabric-weight aria-controls="ma-fabric-results"><option value="all"><?php esc_html_e( 'All weights', 'myathletik-child' ); ?></option><option value="under-150">&lt;150 GSM</option><option value="150-199">150–199 GSM</option><option value="200-249">200–249 GSM</option><option value="250-plus">250+ GSM</option></select></label>
			<button type="button" class="ma-button ma-button--outline" data-fabric-reset><?php esc_html_e( 'Reset', 'myathletik-child' ); ?></button>
		</div>
		<p class="ma-fabric-library__status" data-fabric-status role="status" aria-live="polite" aria-atomic="true"><?php esc_html_e( 'Browse the references below; open each group to see more.', 'myathletik-child' ); ?></p>
		<?php foreach ( $pages as $index => $group ) : ?>
			<?php if ( $index > 0 ) : ?>
				<details class="ma-fabric-library__more" data-fabric-more><summary><?php echo esc_html( sprintf( __( 'References %1$d–%2$d', 'myathletik-child' ), $index * 6 + 1, min( ( $index + 1 ) * 6, count( $fabrics ) ) ) ); ?></summary>
			<?php endif; ?>
			<div class="ma-fabric-library__grid"<?php if ( 0 === $index ) : ?> id="ma-fabric-results" data-fabric-grid tabindex="-1" role="group" aria-label="<?php esc_attr_e( 'Fabric reference results', 'myathletik-child' ); ?>"<?php endif; ?>>
				<?php foreach ( $group as $fabric ) : ?>
					<?php get_template_part( 'template-parts/fabric-library/card', null, array( 'fabric' => $fabric ) ); ?>
				<?php endforeach; ?>
			</div>
			<?php if ( $index > 0 ) : ?></details><?php endif; ?>
		<?php endforeach; ?>
		<p class="ma-fabric-library__empty" data-fabric-empty hidden><?php esc_html_e( 'No matching references. Try another fabric code or reset the filters.', 'myathletik-child' ); ?></p>
		<nav class="ma-fabric-library__pagination" aria-label="<?php esc_attr_e( 'Fabric reference pages', 'myathletik-child' ); ?>" data-fabric-pagination hidden>
			<button type="button" class="ma-button ma-button--outline" data-fabric-prev aria-controls="ma-fabric-results"><span aria-hidden="true">← </span><?php esc_html_e( 'Previous', 'myathletik-child' ); ?></button>
			<span data-fabric-page></span>
			<button type="button" class="ma-button ma-button--outline" data-fabric-next aria-controls="ma-fabric-results"><?php esc_html_e( 'Next', 'myathletik-child' ); ?><span aria-hidden="true"> →</span></button>
		</nav>
		<footer class="ma-fabric-library__footer">
			<p><?php esc_html_e( 'Reference specifications only. Confirm current availability and final specifications for your project.', 'myathletik-child' ); ?></p>
			<a class="ma-button ma-button--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss your fabric brief', 'myathletik-child' ); ?></a>
		</footer>
	</div>
</section>
