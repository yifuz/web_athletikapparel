<?php
/**
 * Add the optional, self-reported discovery field to Fluent Forms form 3.
 *
 * Run with WP-CLI's eval-file command:
 *   preview
 *   apply <expected-home-url> <expected-form-sha256> <private-backup-path>
 *
 * The apply step backs up the current form definition and changes only that
 * definition. It does not change entries, notifications, or other form settings.
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	http_response_code( 404 );
	exit;
}

global $wpdb;

$mode       = $args[0] ?? 'preview';
$form_id    = 3;
$field_name = 'how_did_you_find_us';
$home       = untrailingslashit( home_url() );
$table      = $wpdb->prefix . 'fluentform_forms';

if ( ! in_array( $mode, array( 'preview', 'apply' ), true ) ) {
	WP_CLI::error( 'Use preview or apply.' );
}

$raw = $wpdb->get_var( $wpdb->prepare( "SELECT form_fields FROM `{$table}` WHERE id = %d", $form_id ) );
if ( ! is_string( $raw ) || '' === $raw ) {
	WP_CLI::error( 'Fluent Forms form 3 was not found.' );
}

$form = json_decode( $raw, true );
if ( ! is_array( $form ) || ! isset( $form['fields'] ) || ! is_array( $form['fields'] ) ) {
	WP_CLI::error( 'The current form definition is not readable.' );
}

$defaults_file = WP_PLUGIN_DIR . '/fluentform/app/Services/FormBuilder/DefaultElements.php';
if ( ! is_file( $defaults_file ) ) {
	WP_CLI::error( 'Fluent Forms field defaults are unavailable.' );
}
$defaults = require $defaults_file;
if ( ! isset( $defaults['general']['input_checkbox'] ) ) {
	WP_CLI::error( 'Fluent Forms checkbox defaults are unavailable.' );
}

$options = array(
	'Google or another search engine',
	'ChatGPT, Google AI Mode, or another AI tool',
	'LinkedIn',
	'Instagram',
	'Referral or word of mouth',
	'Other or not sure',
);

$field                                             = $defaults['general']['input_checkbox'];
$field['attributes']['name']                       = $field_name;
$field['settings']['label']                        = 'How did you find us? (Optional — select all that apply)';
$field['settings']['admin_field_label']            = 'How did you find us?';
$field['settings']['container_class']              = 'ma-inquiry-source';
$field['settings']['validation_rules']['required']['value'] = false;
$field['settings']['advanced_options']             = array_map(
	static function ( $option ) {
		return array( 'label' => $option, 'value' => $option, 'calc_value' => '', 'image' => '' );
	},
	$options
);

$matches = array();
$find    = static function ( $node ) use ( &$find, &$matches, $field_name ) {
	if ( ! is_array( $node ) ) {
		return;
	}
	if ( isset( $node['attributes']['name'] ) && $field_name === $node['attributes']['name'] ) {
		$matches[] = $node;
	}
	foreach ( $node as $child ) {
		$find( $child );
	}
};
$find( $form );

if ( $matches ) {
	if ( 1 !== count( $matches ) || $matches[0] !== $field ) {
		WP_CLI::error( 'A different field with this name already exists; review it before changing the form.' );
	}
	WP_CLI::log( wp_json_encode( array( 'status' => 'already-present', 'home' => $home, 'form_id' => $form_id ) ) );
	return;
}

$message_positions = array();
foreach ( $form['fields'] as $index => $candidate ) {
	if ( 'textarea' === ( $candidate['element'] ?? '' ) && 'description' === ( $candidate['attributes']['name'] ?? '' ) ) {
		$message_positions[] = $index;
	}
}
if ( 1 !== count( $message_positions ) ) {
	WP_CLI::error( 'The Message field was not found exactly once; no changes were made.' );
}

array_splice( $form['fields'], $message_positions[0], 0, array( $field ) );
$updated = wp_json_encode( $form, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
if ( ! is_string( $updated ) || '' === $updated ) {
	WP_CLI::error( 'Could not encode the updated form.' );
}

$before_hash = hash( 'sha256', $raw );
$summary     = array(
	'status'        => 'preview',
	'home'          => $home,
	'form_id'       => $form_id,
	'before_sha256' => $before_hash,
	'after_sha256'  => hash( 'sha256', $updated ),
	'field_name'    => $field_name,
	'label'         => $field['settings']['label'],
	'optional'      => true,
	'options'       => $options,
);

if ( 'preview' === $mode ) {
	WP_CLI::log( wp_json_encode( $summary, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) );
	return;
}

$expected_home = $args[1] ?? '';
$expected_hash = $args[2] ?? '';
$backup_path   = $args[3] ?? '';
if ( $expected_home !== $home || $expected_hash !== $before_hash || '' === $backup_path ) {
	WP_CLI::error( 'Apply requires the exact home URL, current form hash, and a private backup path.' );
}

$backup_parent = realpath( dirname( $backup_path ) );
$public_root   = realpath( dirname( WP_CONTENT_DIR ) );
if ( false === $backup_parent || false === $public_root ) {
	WP_CLI::error( 'The backup directory or site root could not be resolved.' );
}
$backup_parent = rtrim( wp_normalize_path( $backup_parent ), '/' );
$public_root   = rtrim( wp_normalize_path( $public_root ), '/' );
if ( 0 === strcasecmp( $backup_parent, $public_root ) || 0 === stripos( $backup_parent . '/', $public_root . '/' ) ) {
	WP_CLI::error( 'The form backup must be outside the public site directory.' );
}

$backup_file = $backup_parent . '/' . basename( $backup_path );
$handle      = @fopen( $backup_file, 'x' );
if ( false === $handle ) {
	WP_CLI::error( 'Could not create the private backup without overwriting a file.' );
}
$written = fwrite( $handle, $raw );
fclose( $handle );
if ( strlen( $raw ) !== $written || hash_file( 'sha256', $backup_file ) !== $before_hash ) {
	WP_CLI::error( 'The private form backup could not be verified; no form changes were made.' );
}

$changed = $wpdb->query(
	$wpdb->prepare(
		"UPDATE `{$table}` SET form_fields = %s, updated_at = %s WHERE id = %d AND SHA2(form_fields, 256) = %s",
		$updated,
		current_time( 'mysql' ),
		$form_id,
		$before_hash
	)
);
if ( 1 !== $changed ) {
	WP_CLI::error( 'The form changed concurrently or could not be saved; the backup was retained.' );
}

$saved = $wpdb->get_var( $wpdb->prepare( "SELECT form_fields FROM `{$table}` WHERE id = %d", $form_id ) );
if ( ! is_string( $saved ) || hash( 'sha256', $saved ) !== hash( 'sha256', $updated ) ) {
	WP_CLI::error( 'The saved form did not match the reviewed definition; the backup was retained.' );
}

$summary['status'] = 'applied';
WP_CLI::log( wp_json_encode( $summary, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) );
