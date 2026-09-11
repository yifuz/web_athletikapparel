<?php
/**
 * Reusable decorative line icons for compact feature and decision blocks.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icon_name = isset( $args['name'] ) ? sanitize_key( $args['name'] ) : '';

if ( ! in_array( $icon_name, array( 'audience', 'garment', 'commercial', 'customize', 'quality' ), true ) ) {
	return;
}
?>
<svg class="ma-line-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
	<?php if ( 'audience' === $icon_name ) : ?>
		<circle cx="9" cy="8" r="3"></circle>
		<path d="M3.5 20v-1.5A5.5 5.5 0 0 1 9 13a5.5 5.5 0 0 1 5.5 5.5V20"></path>
		<circle cx="17" cy="9" r="2.5"></circle>
		<path d="M15.5 14.5A5 5 0 0 1 20.5 19v1"></path>
	<?php elseif ( 'garment' === $icon_name ) : ?>
		<path d="M9 4h6l2 2 4 2-2 4-2-1v9H7v-9l-2 1-2-4 4-2 2-2Z"></path>
		<path d="M9 4c.5 1.5 1.5 2.25 3 2.25S14.5 5.5 15 4"></path>
	<?php elseif ( 'commercial' === $icon_name ) : ?>
		<rect x="4" y="5" width="16" height="14" rx="2"></rect>
		<path d="M4 9h16M8 13h4M8 16h7M16.5 13h.01"></path>
	<?php elseif ( 'customize' === $icon_name ) : ?>
		<path d="M4 7h6M14 7h6M4 12h10M18 12h2M4 17h3M11 17h9"></path>
		<circle cx="12" cy="7" r="2"></circle>
		<circle cx="16" cy="12" r="2"></circle>
		<circle cx="9" cy="17" r="2"></circle>
	<?php elseif ( 'quality' === $icon_name ) : ?>
		<path d="M12 3 19 6v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3Z"></path>
		<path d="m9 12 2 2 4-4"></path>
	<?php endif; ?>
</svg>
