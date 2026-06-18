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

		<form class="ma-inquiry-form" aria-label="<?php esc_attr_e( 'Homepage inquiry form preview', 'myathletik-child' ); ?>">
			<div class="ma-form-row">
				<label for="ma-inquiry-budget"><?php esc_html_e( 'Budget tier', 'myathletik-child' ); ?></label>
				<select id="ma-inquiry-budget" name="budget_tier">
					<option value=""><?php esc_html_e( 'Select a budget range', 'myathletik-child' ); ?></option>
					<option value="10000-25000"><?php esc_html_e( 'USD 10,000-25,000', 'myathletik-child' ); ?></option>
					<option value="25000-50000"><?php esc_html_e( 'USD 25,000-50,000', 'myathletik-child' ); ?></option>
					<option value="50000-plus"><?php esc_html_e( 'USD 50,000+', 'myathletik-child' ); ?></option>
				</select>
			</div>
			<div class="ma-form-row">
				<label for="ma-inquiry-quantity"><?php esc_html_e( 'Estimated order quantity', 'myathletik-child' ); ?></label>
				<input id="ma-inquiry-quantity" name="estimated_quantity" type="text" placeholder="<?php esc_attr_e( 'Example: 500 pcs per style', 'myathletik-child' ); ?>">
			</div>
			<div class="ma-form-row">
				<label for="ma-inquiry-category"><?php esc_html_e( 'Product category', 'myathletik-child' ); ?></label>
				<select id="ma-inquiry-category" name="product_category">
					<option value=""><?php esc_html_e( 'Select a category', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Sportswear', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Underwear', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Outdoor Clothing', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Merino Wool Apparel', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Silk Wear', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Knitted Fabrics', 'myathletik-child' ); ?></option>
					<option><?php esc_html_e( 'Sports Accessories', 'myathletik-child' ); ?></option>
				</select>
			</div>
			<div class="ma-form-row">
				<label for="ma-inquiry-channel"><?php esc_html_e( 'Company / selling channel', 'myathletik-child' ); ?></label>
				<input id="ma-inquiry-channel" name="selling_channel" type="text" placeholder="<?php esc_attr_e( 'Brand, wholesaler, retailer, distributor', 'myathletik-child' ); ?>">
			</div>
			<div class="ma-form-row">
				<label for="ma-inquiry-website"><?php esc_html_e( 'Website', 'myathletik-child' ); ?></label>
				<input id="ma-inquiry-website" name="website" type="url" placeholder="https://">
			</div>
			<div class="ma-form-row ma-form-row--full">
				<label for="ma-inquiry-message"><?php esc_html_e( 'Message', 'myathletik-child' ); ?></label>
				<textarea id="ma-inquiry-message" name="message" rows="4" placeholder="<?php esc_attr_e( 'Tell us the product type, fabric, target market, and timeline.', 'myathletik-child' ); ?>"></textarea>
			</div>
			<div class="ma-form-row ma-form-row--full">
				<label for="ma-inquiry-file"><?php esc_html_e( 'Tech pack upload', 'myathletik-child' ); ?></label>
				<input id="ma-inquiry-file" name="tech_pack" type="file">
			</div>
			<button class="ma-button ma-button--primary" type="button"><?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?></button>
			<p class="ma-inquiry-form__note"><?php esc_html_e( 'Form submission handling will be connected in a later backend task.', 'myathletik-child' ); ?></p>
		</form>
	</div>
</section>
