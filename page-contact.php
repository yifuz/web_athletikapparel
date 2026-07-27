<?php
/**
 * Contact page.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_hero_image = get_stylesheet_directory_uri() . '/assets/images/contact/hero.png';
?>

<main id="primary" class="site-main ma-contact-page">
	<section class="ma-contact-hero ma-contact-hero--bg" aria-labelledby="ma-contact-title">
		<img class="ma-contact-hero__bg" src="<?php echo esc_url( $contact_hero_image ); ?>" alt="<?php esc_attr_e( 'Athletik Clothing sample room with tech packs and knitwear swatches', 'myathletik-child' ); ?>" loading="eager">
		<div class="ma-contact-hero__overlay" aria-hidden="true"></div>
		<div class="ma-section-inner">
			<p class="ma-section-kicker"><?php esc_html_e( 'OEM/ODM inquiry', 'myathletik-child' ); ?></p>
			<h1 id="ma-contact-title"><?php esc_html_e( 'Contact Us', 'myathletik-child' ); ?></h1>
			<p class="ma-contact-hero__intro"><?php esc_html_e( 'Tell us about your project and our team will get back to you with a quote and next steps. Whether you have a finished tech pack or just a concept, we are here to help you move from design to production.', 'myathletik-child' ); ?></p>
		</div>
	</section>

	<section class="ma-contact-main" aria-labelledby="ma-contact-form-title">
		<div class="ma-section-inner ma-contact-main__grid">
			<div class="ma-contact-form-panel">
				<div class="ma-section-heading">
					<p class="ma-section-kicker"><?php esc_html_e( 'Project details', 'myathletik-child' ); ?></p>
					<h2 id="ma-contact-form-title"><?php esc_html_e( 'Send an inquiry', 'myathletik-child' ); ?></h2>
				</div>

				<?php echo do_shortcode( '[fluentform id="3"]' ); ?>
			</div>

			<aside class="ma-contact-details" aria-labelledby="ma-contact-details-title">
				<div class="ma-contact-card">
					<p class="ma-section-kicker"><?php esc_html_e( 'Get in touch', 'myathletik-child' ); ?></p>
					<h2 id="ma-contact-details-title"><?php esc_html_e( 'Company details', 'myathletik-child' ); ?></h2>
					<ul class="ma-contact-list">
						<li>
							<span><?php esc_html_e( 'Email', 'myathletik-child' ); ?></span>
							<a href="mailto:info@athletikapparel.com">info@athletikapparel.com</a>
						</li>
						<li>
							<span><?php esc_html_e( 'Tel', 'myathletik-child' ); ?></span>
							<a href="tel:+8613951139696">86-13951139696</a>
						</li>
					</ul>
				</div>

				<div class="ma-contact-card">
					<p class="ma-section-kicker"><?php esc_html_e( 'Our facility', 'myathletik-child' ); ?></p>
					<h2><?php esc_html_e( 'Zhangjiagang Athletik Clothing Co., Limited', 'myathletik-child' ); ?></h2>
					<address>
						<?php esc_html_e( 'No.25, Zhongxing Road, Yangshe Town, Zhangjiagang, Jiangsu, 215699 China', 'myathletik-child' ); ?>
					</address>
					<a class="ma-contact-map-link" href="https://www.google.com/maps/search/?api=1&query=No.25%2C%20Zhongxing%20Road%2C%20Yangshe%20Town%2C%20Zhangjiagang%2C%20Jiangsu%2C%20215699%20China" target="_blank" rel="noopener noreferrer">
						<?php esc_html_e( 'Open map', 'myathletik-child' ); ?>
					</a>
				</div>
			</aside>
		</div>
	</section>
</main>

<?php
get_footer();
