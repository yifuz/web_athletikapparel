<?php
/**
 * About page.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$differentiators = array(
	array(
		'title' => __( 'Vertical Integration', 'myathletik-child' ),
		'copy'  => __( 'Our own fabric mill, with full in-house testing, supplies the performance and thermal knits used in our garments, so quality is controlled from yarn to finished piece.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Technical Construction', 'myathletik-child' ),
		'copy'  => __( 'Specialized in flatlock seam and activeseam production with Yamato and Merrow machines, plus bonded-welded options, refined over 15+ years of technical knitwear.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Performance Fabrics', 'myathletik-child' ),
		'copy'  => __( 'Microfiber, merino wool, power stretch, Genesis fleece, and 4-way stretch, with functional finishes including moisture-wicking, UV-protective, and antimicrobial options.', 'myathletik-child' ),
	),
	array(
		'title' => __( 'Our Own Facility', 'myathletik-child' ),
		'copy'  => __( 'A 4,500+ sq m production facility with the capacity to handle 100,000+ pieces per month, scaling with your order without compromising quality or lead times.', 'myathletik-child' ),
	),
);

$about_hero_image     = get_stylesheet_directory_uri() . '/assets/images/production/%E5%B7%A5%E5%8E%82%E5%85%A8%E6%99%AF.png';
$about_workshop_image = get_stylesheet_directory_uri() . '/assets/images/production/%E8%BD%A6%E9%97%B4.png';

get_header();
?>

<main id="primary" class="site-main ma-about-page">
	<section class="ma-about-hero" aria-labelledby="ma-about-title">
		<div class="ma-section-inner ma-about-hero__grid">
			<div class="ma-about-hero__copy">
				<p class="ma-section-kicker"><?php esc_html_e( 'About Athletik', 'myathletik-child' ); ?></p>
				<h1 id="ma-about-title"><?php esc_html_e( 'About Athletik Clothing', 'myathletik-child' ); ?></h1>
				<p><?php esc_html_e( 'Athletik Clothing is a vertically integrated OEM/ODM manufacturer of technical knitwear, based in the Zhangjiagang / Suzhou area of China. For more than 15 years, we have produced full-package underwear, sportswear, outdoor clothing, and knitted fabrics for performance brands around the world, built on specialized flatlock and activeseam construction.', 'myathletik-child' ); ?></p>
			</div>
			<figure class="ma-about-image-slot">
				<img src="<?php echo esc_url( $about_hero_image ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing facility exterior in Zhangjiagang', 'myathletik-child' ); ?>" loading="lazy">
			</figure>
		</div>
	</section>

	<section class="ma-about-story" aria-labelledby="ma-about-story-title">
		<div class="ma-section-inner ma-about-split">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Our story', 'myathletik-child' ); ?></p>
				<h2 id="ma-about-story-title"><?php esc_html_e( 'Integrated from yarn to shipment', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-about-copy-slot">
				<p><?php esc_html_e( 'What sets us apart is integration. From our own fabric mill to finished-garment construction, we control the process from yarn to shipment, giving brands a single, reliable production partner instead of a chain of separate suppliers. Over 15 years we have refined our technical capabilities around the seams and fabrics that performance apparel depends on.', 'myathletik-child' ); ?></p>
			</div>
		</div>
	</section>

	<section class="ma-about-difference" aria-labelledby="ma-about-difference-title">
		<div class="ma-section-inner">
			<div class="ma-section-heading">
				<p class="ma-section-kicker"><?php esc_html_e( 'What makes us different', 'myathletik-child' ); ?></p>
				<h2 id="ma-about-difference-title"><?php esc_html_e( 'Capability that supports long-term production', 'myathletik-child' ); ?></h2>
			</div>
			<div class="ma-about-difference__grid">
				<?php foreach ( $differentiators as $item ) : ?>
					<article class="ma-about-difference-card">
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ma-about-serve" aria-labelledby="ma-about-serve-title">
		<div class="ma-section-inner ma-about-serve__grid">
			<figure class="ma-about-image-slot ma-about-image-slot--secondary">
				<img src="<?php echo esc_url( $about_workshop_image ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing production workshop', 'myathletik-child' ); ?>" loading="lazy">
			</figure>
			<div class="ma-about-serve__copy">
				<p class="ma-section-kicker"><?php esc_html_e( 'Who we serve', 'myathletik-child' ); ?></p>
				<h2 id="ma-about-serve-title"><?php esc_html_e( 'Built for performance and lifestyle brands', 'myathletik-child' ); ?></h2>
				<p><?php esc_html_e( 'We produce for performance and lifestyle brands across North America, Europe, and the Nordics, including brands in Canada, the USA, the UK, Singapore, Sweden, Norway, and Finland. From established names to growing labels, we work as a long-term production partner.', 'myathletik-child' ); ?></p>
			</div>
		</div>
	</section>

	<section class="ma-about-cta" aria-labelledby="ma-about-cta-title">
		<div class="ma-section-inner ma-about-cta__inner">
			<div>
				<p class="ma-section-kicker"><?php esc_html_e( 'Work with us', 'myathletik-child' ); ?></p>
				<h2 id="ma-about-cta-title"><?php esc_html_e( 'Want to work with us?', 'myathletik-child' ); ?></h2>
				<p><?php esc_html_e( 'Tell us about your project and we will get back to you with the next steps.', 'myathletik-child' ); ?></p>
			</div>
			<a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
