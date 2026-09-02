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
			<h2 id="ma-home-inquiry-title"><?php esc_html_e( 'What helps us review your program', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'Share the commercial and technical inputs available now. A tech pack is useful, but not required for the first review.', 'myathletik-child' ); ?></p>

			<ul class="ma-home-inquiry__brief" aria-label="<?php esc_attr_e( 'Useful inquiry details', 'myathletik-child' ); ?>">
				<li class="ma-home-inquiry__brief-item">
					<span class="ma-home-inquiry__brief-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M7 3h10v4h3v14H4V7h3V3Zm2 4h6V5H9v2Zm-2 4h10M7 15h7" /></svg>
					</span>
					<span>
						<strong><?php esc_html_e( 'Product brief', 'myathletik-child' ); ?></strong>
						<small><?php esc_html_e( 'Product type, construction, fabric or GSM, target market.', 'myathletik-child' ); ?></small>
					</span>
				</li>

				<li class="ma-home-inquiry__brief-item">
					<span class="ma-home-inquiry__brief-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M4 6h16v12H4V6Zm4 4h8M8 14h5" /></svg>
					</span>
					<span>
						<strong><?php esc_html_e( 'Order scope', 'myathletik-child' ); ?></strong>
						<small><?php esc_html_e( 'Quantity per style and required timeline. Garment MOQ: 500 pieces per style.', 'myathletik-child' ); ?></small>
					</span>
				</li>

				<li class="ma-home-inquiry__brief-item">
					<span class="ma-home-inquiry__brief-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M6 3h9l3 3v15H6V3Zm8 0v4h4M9 12h6M9 16h4" /></svg>
					</span>
					<span>
						<strong><?php esc_html_e( 'Tech pack status', 'myathletik-child' ); ?></strong>
						<small><?php esc_html_e( 'Ready to share, in development, or not yet available.', 'myathletik-child' ); ?></small>
					</span>
				</li>

				<li class="ma-home-inquiry__brief-item">
					<span class="ma-home-inquiry__brief-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M3 6h18v12H3V6Zm1 1 8 6 8-6" /></svg>
					</span>
					<span>
						<strong><?php esc_html_e( 'Sales email', 'myathletik-child' ); ?></strong>
						<a href="mailto:info@athletikapparel.com">info@athletikapparel.com</a>
					</span>
				</li>
			</ul>
		</div>

		<div class="ma-inquiry-form ma-inquiry-form--fluent">
			<?php echo do_shortcode( '[fluentform id="3"]' ); ?>
			<?php myathletik_inquiry_privacy_notice(); ?>
		</div>
	</div>
</section>
