<?php
/**
 * Services overview page.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$capabilities = array(
	__( 'Full-package OEM/ODM to your designs, samples, or tech packs', 'myathletik-child' ),
	__( 'Vertically integrated from our own fabric mill to finished garment', 'myathletik-child' ),
	__( 'Technical knit construction including flatlock, activeseam, and bonded-welded options', 'myathletik-child' ),
	__( '15+ years serving brands across North America, Europe, and the Nordics', 'myathletik-child' ),
);

$stages = array(
	array(
		'number' => '01',
		'title'  => __( 'Sampling & Prototyping', 'myathletik-child' ),
		'copy'   => __( 'Every project starts with getting the sample right. We develop counter samples, prototypes, and pre-production samples from your tech packs, sketches, or reference garments - typically within 1-2 weeks, depending on complexity. Our sample room is equipped for flatlock, activeseam, and bonded-welded construction, so what you approve is what goes into production.', 'myathletik-child' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Bulk Production', 'myathletik-child' ),
		'copy'   => __( 'Once samples are approved, we move into bulk production in our own facility. With technical knit construction and flexible, scalable capacity, we handle orders from 1,000 pcs per style and scale up without compromising quality or lead times.', 'myathletik-child' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Quality Control', 'myathletik-child' ),
		'copy'   => __( 'Quality is built in at every stage, not just inspected at the end. From our own fabric mill with in-house testing to in-line and final garment inspection, we control quality from yarn to finished piece so every shipment meets the standard your brand depends on.', 'myathletik-child' ),
	),
	array(
		'number' => '04',
		'title'  => __( 'Export & Shipping', 'myathletik-child' ),
		'copy'   => __( 'We handle export and logistics in-house, booking freight directly. We support FOB and DDP terms and prepare the standard export documentation, so your order ships smoothly from our facility to your destination.', 'myathletik-child' ),
	),
);

get_header();

$services_hero_image = get_stylesheet_directory_uri() . '/assets/images/services/hero.png';
?>

<main id="primary" class="site-main ma-services-page">
	<section class="ma-services-hero ma-services-hero--bg" aria-labelledby="ma-services-title">
		<img class="ma-services-hero__bg" src="<?php echo esc_url( $services_hero_image ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing production line for full-package knitwear manufacturing', 'myathletik-child' ); ?>" loading="eager">
		<div class="ma-services-hero__overlay" aria-hidden="true"></div>
		<div class="ma-section-inner">
			<p class="ma-section-kicker"><?php esc_html_e( 'From sample to shipment', 'myathletik-child' ); ?></p>
			<h1 id="ma-services-title"><?php esc_html_e( 'Our Services', 'myathletik-child' ); ?></h1>
			<p><?php esc_html_e( 'From first sample to final shipment, we work as an integrated production partner - handling the full process in-house so performance brands can move from design to delivery with one reliable team. Whether you bring a finished tech pack or an early concept, we will guide it through every stage.', 'myathletik-child' ); ?></p>
		</div>
	</section>

	<section class="ma-services-capabilities" aria-labelledby="ma-services-capabilities-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Capabilities', 'myathletik-child' ); ?></p>
				<h2 id="ma-services-capabilities-title"><?php esc_html_e( 'A full-package production workflow', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-services-capabilities__grid">
				<?php foreach ( $capabilities as $capability ) : ?>
					<article class="ma-services-capability">
						<p><?php echo esc_html( $capability ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-services-process" aria-labelledby="ma-services-process-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'Process', 'myathletik-child' ); ?></p>
				<h2 id="ma-services-process-title"><?php esc_html_e( 'How your order moves through production', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-services-process__list">
				<?php foreach ( $stages as $stage ) : ?>
					<article class="ma-services-stage">
						<div class="ma-services-stage__number" aria-hidden="true"><?php echo esc_html( $stage['number'] ); ?></div>
						<div class="ma-services-stage__copy">
							<h3 class="ma-services-stage__title"><?php echo esc_html( $stage['title'] ); ?></h3>
							<p><?php echo esc_html( $stage['copy'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-services-cta" aria-labelledby="ma-services-cta-title">
		<div class="ma-section-inner ma-services-cta__inner">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Start a project', 'myathletik-child' ); ?></p>
				<h2 id="ma-services-cta-title"><?php esc_html_e( 'Ready to start a project?', 'myathletik-child' ); ?></h2>
				<p><?php esc_html_e( 'Tell us what you are building and our team will get back to you with a quote and next steps.', 'myathletik-child' ); ?></p>
			</div>
			<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
