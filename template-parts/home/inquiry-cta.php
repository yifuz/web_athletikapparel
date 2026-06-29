<?php
/**
 * Homepage inquiry CTA and front-end form.
 *
 * Form handling is intentionally out of scope for this build step.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="ma-home-inquiry" aria-labelledby="ma-home-inquiry-title">
	<div class="ma-section-inner ma-home-inquiry__layout">
		<div class="ma-home-inquiry__copy">
			<p class="ma-section-kicker"><?php esc_html_e( 'Start a technical order discussion', 'myathletik-child' ); ?></p>
			<h2 id="ma-home-inquiry-title"><?php esc_html_e( 'Send the basics before your tech pack review', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'Have a tech pack or a sample in mind? Tell us about your project - our team will get back to you with a quote and next steps.', 'myathletik-child' ); ?></p>
		</div>

		<div class="ma-inquiry-form ma-inquiry-form--fluent">
			<?php echo do_shortcode( '[fluentform id="3"]' ); ?>
		</div>
	</div>
</section>
