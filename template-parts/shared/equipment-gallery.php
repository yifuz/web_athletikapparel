<?php
/**
 * Shared fabric-production equipment gallery.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$variant = ! empty( $args['variant'] ) ? sanitize_html_class( $args['variant'] ) : 'home';
$configs = array(
	'home'     => array(
		'kicker' => __( 'Fabric production', 'myathletik-child' ),
		'heading' => __( 'From yarn preparation to knitted fabric', 'myathletik-child' ),
		'intro' => __( 'Selected equipment views show the material-production stage behind an integrated technical knitwear program.', 'myathletik-child' ),
		'items' => array( 1, 2, 4 ),
	),
	'about'    => array(
		'kicker' => __( 'Inside fabric production', 'myathletik-child' ),
		'heading' => __( 'Equipment supporting an integrated material workflow', 'myathletik-child' ),
		'intro' => __( 'Yarn preparation, warp feeding, fabric formation, and roll winding are shown as distinct stages within the fabric-making process.', 'myathletik-child' ),
		'items' => array( 0, 1, 2, 3, 4, 5, 6 ),
	),
	'services' => array(
		'kicker' => __( 'Material production', 'myathletik-child' ),
		'heading' => __( 'Fabric production before garment assembly', 'myathletik-child' ),
		'intro' => __( 'Yarn preparation and warp knitting form the material stage before sampling, cutting, and technical sewing.', 'myathletik-child' ),
		'items' => array( 0, 3, 5 ),
	),
	'product'  => array(
		'kicker' => __( 'Integrated fabric capability', 'myathletik-child' ),
		'heading' => __( 'Fabric production behind the product program', 'myathletik-child' ),
		'intro' => __( 'Yarn preparation and warp knitting support material development before sampling and garment construction.', 'myathletik-child' ),
		'items' => array( 4, 2, 6 ),
	),
);

if ( ! isset( $configs[ $variant ] ) ) {
	$variant = 'home';
}

$config = $configs[ $variant ];

if ( ! empty( $args['heading'] ) ) {
	$config['heading'] = wp_strip_all_tags( $args['heading'] );
}

$equipment = array(
	array(
		'file'  => 'yarn-preparation-line-wide',
		'title' => __( 'Yarn preparation line', 'myathletik-child' ),
		'alt'   => __( 'Yarn preparation line feeding multiple warp ends into fabric production equipment', 'myathletik-child' ),
	),
	array(
		'file'  => 'warp-knitting-production-floor',
		'title' => __( 'Warp knitting production floor', 'myathletik-child' ),
		'alt'   => __( 'Warp knitting production floor with yarn packages and fabric rolls', 'myathletik-child' ),
	),
	array(
		'file'  => 'hks-2-se-warp-knitting-machine',
		'title' => __( 'HKS 2-SE warp knitting', 'myathletik-child' ),
		'alt'   => __( 'HKS 2-SE warp knitting machine producing white knitted fabric', 'myathletik-child' ),
	),
	array(
		'file'  => 'warp-knitting-machine-row',
		'title' => __( 'Multi-machine fabric production', 'myathletik-child' ),
		'alt'   => __( 'Rows of warp knitting machines producing white knitted fabric', 'myathletik-child' ),
	),
	array(
		'file'  => 'yarn-feeding-system',
		'title' => __( 'Yarn feeding system', 'myathletik-child' ),
		'alt'   => __( 'Yarn feeding system guiding multiple ends into warp knitting production', 'myathletik-child' ),
	),
	array(
		'file'  => 'warp-knitting-fabric-roll',
		'title' => __( 'Fabric formation and winding', 'myathletik-child' ),
		'alt'   => __( 'Warp knitting machine forming and winding white knitted fabric', 'myathletik-child' ),
	),
	array(
		'file'  => 'yarn-preparation-line-detail',
		'title' => __( 'Yarn preparation detail', 'myathletik-child' ),
		'alt'   => __( 'Close-up of yarn preparation equipment feeding parallel yarn ends', 'myathletik-child' ),
	),
);

$image_base = get_stylesheet_directory_uri() . '/assets/images/production/equipment/';
$title_id   = 'ma-equipment-proof-' . $variant . '-title';
?>

<section class="ma-equipment-proof ma-equipment-proof--<?php echo esc_attr( $variant ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
	<div class="ma-section-inner">
		<div class="ma-equipment-proof__heading">
			<div>
				<p class="ma-section-kicker"><?php echo esc_html( $config['kicker'] ); ?></p>
				<h2 id="<?php echo esc_attr( $title_id ); ?>"><?php echo esc_html( $config['heading'] ); ?></h2>
			</div>
			<p><?php echo esc_html( $config['intro'] ); ?></p>
		</div>

		<div class="ma-equipment-proof__grid">
			<?php foreach ( $config['items'] as $item_index ) : ?>
				<?php
				if ( ! isset( $equipment[ $item_index ] ) ) {
					continue;
				}

				$item   = $equipment[ $item_index ];
				$src    = $image_base . $item['file'] . '-800.webp';
				$srcset = implode(
					', ',
					array(
						$image_base . $item['file'] . '-480.webp 480w',
						$image_base . $item['file'] . '-800.webp 800w',
						$image_base . $item['file'] . '-1536.webp 1536w',
					)
				);
				?>
				<figure class="ma-equipment-proof__card">
					<img
						src="<?php echo esc_url( $src ); ?>"
						srcset="<?php echo esc_attr( $srcset ); ?>"
						sizes="(max-width: 47.99rem) 84vw, (max-width: 63.99rem) calc(50vw - 2.5rem), 24rem"
						width="1536"
						height="1024"
						loading="lazy"
						fetchpriority="low"
						decoding="async"
						alt="<?php echo esc_attr( $item['alt'] ); ?>"
					>
					<figcaption><?php echo esc_html( $item['title'] ); ?></figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
