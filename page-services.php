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
	__( 'Technical knit construction including FLATLOCK, ACTIVESEAM, and bonded-welded options', 'myathletik-child' ),
	__( '15+ years serving brands across North America, Europe, and the Nordics', 'myathletik-child' ),
);

$stages = array(
	array(
		'number' => '01',
		'title'  => __( 'Sampling & Prototyping', 'myathletik-child' ),
		'copy'   => __( 'Every project starts with getting the sample right. We develop counter samples, prototypes, and pre-production samples from your tech packs, sketches, or reference garments - typically within 1-2 weeks, depending on complexity. Our sample room is equipped for FLATLOCK, ACTIVESEAM, and bonded-welded construction, so what you approve is what goes into production.', 'myathletik-child' ),
		'decisions' => array(
			__( 'Buyer provides', 'myathletik-child' )              => __( 'Product type, tech pack or drawing, reference sample if available, target fabric, fit, construction, testing requirements, estimated quantity, and required timing.', 'myathletik-child' ),
			__( 'Athletik reviews', 'myathletik-child' )            => __( 'Material and construction feasibility, the sample route, required performance criteria, and any inputs still needed to build the sample.', 'myathletik-child' ),
			__( 'Approval before next stage', 'myathletik-child' ) => __( 'The applicable sample, material, trims, measurements, construction, and test criteria are aligned before bulk production is released.', 'myathletik-child' ),
			__( 'Quotation variables', 'myathletik-child' )         => __( 'Style complexity, fabric and trims, construction, sample requirements, testing scope, order quantity, and required timing.', 'myathletik-child' ),
		),
	),
	array(
		'number' => '02',
		'title'  => __( 'Bulk Production', 'myathletik-child' ),
		/* translators: %s: public MOQ in pieces per style. */
		'copy'   => sprintf( __( 'Once the sample and current specification are approved, the project can move into bulk production in our own facility. Public garment MOQ is %s pieces per style; final production terms depend on the style, material, testing scope, order breakdown, and required timing.', 'myathletik-child' ), number_format_i18n( myathletik_public_moq_pieces() ) ),
		'decisions' => array(
			__( 'Buyer provides', 'myathletik-child' )              => __( 'The approved sample and current specification or tech pack, final quantity, color and size breakdown, packaging requirements, and delivery target.', 'myathletik-child' ),
			__( 'Athletik reviews', 'myathletik-child' )            => __( 'Material and trim readiness, production method, QC checkpoints, order allocation, and schedule assumptions.', 'myathletik-child' ),
			__( 'Approval before next stage', 'myathletik-child' ) => __( 'The current specification, approved sample, materials, order breakdown, packaging, and production terms are aligned before cutting and assembly.', 'myathletik-child' ),
			__( 'Quotation variables', 'myathletik-child' )         => __( 'Quantity by style and color, material and finish, construction, testing, packaging, and production timing.', 'myathletik-child' ),
		),
	),
	array(
		'number' => '03',
		'title'  => __( 'Quality Control', 'myathletik-child' ),
		'copy'   => __( 'Quality control starts with the approved material and production references rather than only the finished shipment. Our workflow can combine fabric checks and in-house testing with in-line and final garment inspection against the current specification, approved sample, and agreed acceptance criteria.', 'myathletik-child' ),
		'decisions' => array(
			__( 'Buyer provides', 'myathletik-child' )              => __( 'The approved sample and specification, measurement tolerances, appearance and defect criteria, test methods, acceptance criteria, and any reporting requirements.', 'myathletik-child' ),
			__( 'Athletik reviews', 'myathletik-child' )            => __( 'Incoming fabric checks, in-line garment inspection, final inspection, and the agreed material and garment criteria.', 'myathletik-child' ),
			__( 'Approval before next stage', 'myathletik-child' ) => __( 'Inspection and test outcomes are reviewed against the agreed acceptance criteria before shipment release.', 'myathletik-child' ),
			__( 'Quotation variables', 'myathletik-child' )         => __( 'Testing, inspection, reporting, and documentation scope required for the project.', 'myathletik-child' ),
		),
	),
	array(
		'number' => '04',
		'title'  => __( 'Export & Shipping', 'myathletik-child' ),
		'copy'   => __( 'We handle export preparation and logistics in-house, including direct freight booking. FOB and DDP terms are available by project, with the standard export documentation and delivery scope confirmed before dispatch.', 'myathletik-child' ),
		'decisions' => array(
			__( 'Buyer provides', 'myathletik-child' )              => __( 'Destination, Incoterm, delivery window, packing and labeling instructions, shipping marks, and consignee or broker details.', 'myathletik-child' ),
			__( 'Athletik reviews', 'myathletik-child' )            => __( 'The packing plan, standard export documents, freight booking information, and the delivery scope included in the quotation.', 'myathletik-child' ),
			__( 'Approval before next stage', 'myathletik-child' ) => __( 'Final packing and shipping instructions are aligned before dispatch.', 'myathletik-child' ),
			__( 'Quotation variables', 'myathletik-child' )         => __( 'FOB or DDP scope, destination, shipment size, packaging, required documentation, and delivery timing.', 'myathletik-child' ),
		),
	),
);

get_header();

$services_hero_image = get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-1672-lossless.webp';
$services_hero_srcset = implode(
	', ',
	array(
		get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-480-lossless.webp 480w',
		get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-640-lossless.webp 640w',
		get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-800-lossless.webp 800w',
		get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-960-lossless.webp 960w',
		get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-1280-lossless.webp 1280w',
		get_stylesheet_directory_uri() . '/assets/images/services/services-production-line-1672-lossless.webp 1672w',
	)
);
?>

<main id="primary" class="site-main ma-services-page">
	<section class="ma-services-hero ma-services-hero--bg" aria-labelledby="ma-services-title">
		<img
			class="ma-services-hero__bg"
			src="<?php echo esc_url( $services_hero_image ); ?>"
			srcset="<?php echo esc_attr( $services_hero_srcset ); ?>"
			sizes="100vw"
			width="1672"
			height="941"
			alt="<?php esc_attr_e( 'Athletik Clothing production line for full-package knitwear manufacturing', 'myathletik-child' ); ?>"
			loading="eager"
			fetchpriority="high"
			decoding="async"
		>
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
						<?php if ( ! empty( $stage['decisions'] ) && is_array( $stage['decisions'] ) ) : ?>
							<dl class="ma-services-stage__decision-grid">
								<?php foreach ( $stage['decisions'] as $label => $detail ) : ?>
									<div class="ma-services-stage__decision">
										<dt><?php echo esc_html( $label ); ?></dt>
										<dd><?php echo esc_html( $detail ); ?></dd>
									</div>
								<?php endforeach; ?>
							</dl>
						<?php endif; ?>
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
