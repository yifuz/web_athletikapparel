( function () {
	'use strict';

	const inquiryFormId = '3';
	const storageKey = 'myathletik_attribution_v1';
	const campaignFields = {
		utm_source: 'ma_utm_source',
		utm_medium: 'ma_utm_medium',
		utm_campaign: 'ma_utm_campaign',
		utm_content: 'ma_utm_content',
		utm_term: 'ma_utm_term',
		gclid: 'ma_gclid'
	};
	const contextFields = [
		'ma_first_landing_page',
		'ma_original_referrer'
	];
	const attributionFieldNames = Object.values( campaignFields ).concat( contextFields );
	let attribution = {};

	/**
	 * Attribution supports advertising measurement, so require marketing consent.
	 * A missing Consent API is treated as no consent to avoid writing browser
	 * storage before the CMP has initialized.
	 *
	 * @return {boolean} Whether attribution storage is currently allowed.
	 */
	function hasAttributionConsent() {
		return (
			typeof window.wp_has_consent === 'function' &&
			window.wp_has_consent( 'marketing' )
		);
	}

	/**
	 * Remove query strings and fragments from stored page/referrer URLs. Campaign
	 * parameters are captured separately, which avoids retaining unrelated data.
	 *
	 * @param {string} value URL to normalize.
	 * @return {string} Normalized URL, or an empty string when invalid.
	 */
	function normalizeUrl( value ) {
		if ( ! value ) {
			return '';
		}

		try {
			const url = new URL( value, window.location.href );
			url.search = '';
			url.hash = '';
			return url.href.slice( 0, 2048 );
		} catch ( error ) {
			return '';
		}
	}

	/**
	 * Read attribution captured earlier in the same browser tab/session.
	 *
	 * @return {Object} Stored attribution values.
	 */
	function readAttribution() {
		try {
			const storedValue = window.sessionStorage.getItem( storageKey );
			const parsedValue = storedValue ? JSON.parse( storedValue ) : {};

			return parsedValue && typeof parsedValue === 'object' ? parsedValue : {};
		} catch ( error ) {
			return {};
		}
	}

	/**
	 * Save attribution for navigation from a landing page to the inquiry form.
	 *
	 * @param {Object} attribution Attribution values to retain.
	 */
	function writeAttribution( attribution ) {
		try {
			window.sessionStorage.setItem( storageKey, JSON.stringify( attribution ) );
		} catch ( error ) {
			// Continue on the current page when storage is unavailable.
		}
	}

	/**
	 * Capture the current page only after marketing consent has been granted.
	 */
	function captureAttribution() {
		attribution = readAttribution();

		if ( ! Object.prototype.hasOwnProperty.call( attribution, 'ma_first_landing_page' ) ) {
			attribution.ma_first_landing_page = normalizeUrl( window.location.href );
		}

		if ( ! Object.prototype.hasOwnProperty.call( attribution, 'ma_original_referrer' ) ) {
			attribution.ma_original_referrer = normalizeUrl( document.referrer );
		}

		const searchParams = new URLSearchParams( window.location.search );
		const hasCampaignParameter = Object.keys( campaignFields ).some( function ( parameterName ) {
			return searchParams.has( parameterName );
		} );

		if ( hasCampaignParameter ) {
			Object.keys( campaignFields ).forEach( function ( parameterName ) {
				const fieldName = campaignFields[ parameterName ];
				const value = searchParams.has( parameterName )
					? searchParams.get( parameterName ).slice( 0, 255 )
					: '';

				attribution[ fieldName ] = value;
			} );
		}

		writeAttribution( attribution );
	}

	/**
	 * Add or refresh one hidden field before Fluent Forms serializes the form.
	 *
	 * @param {HTMLFormElement} form Form 3 element.
	 * @param {string} name Hidden field name.
	 * @param {string} value Hidden field value.
	 */
	function setHiddenField( form, name, value ) {
		if ( ! value ) {
			return;
		}

		let input = form.querySelector( 'input[type="hidden"][name="' + name + '"]' );

		if ( ! input ) {
			input = document.createElement( 'input' );
			input.type = 'hidden';
			input.name = name;
			form.appendChild( input );
		}

		input.value = value;
	}

	/**
	 * Attach the captured values to every rendered copy of inquiry form 3.
	 */
	function hydrateInquiryForms() {
		const forms = document.querySelectorAll( 'form[data-form_id="' + inquiryFormId + '"]' );

		forms.forEach( function ( form ) {
			attributionFieldNames.forEach( function ( fieldName ) {
				setHiddenField( form, fieldName, attribution[ fieldName ] || '' );
			} );
		} );
	}

	/**
	 * Remove stored and form-bound attribution when consent is absent or revoked.
	 */
	function clearAttribution() {
		attribution = {};

		try {
			window.sessionStorage.removeItem( storageKey );
		} catch ( error ) {
			// Continue when storage is unavailable.
		}

		document.querySelectorAll( 'form[data-form_id="' + inquiryFormId + '"]' ).forEach( function ( form ) {
			attributionFieldNames.forEach( function ( fieldName ) {
				const input = form.querySelector( 'input[type="hidden"][name="' + fieldName + '"]' );

				if ( input ) {
					input.remove();
				}
			} );
		} );
	}

	/**
	 * Apply the current WP Consent API state to attribution storage and fields.
	 */
	function syncAttributionWithConsent() {
		if ( hasAttributionConsent() ) {
			captureAttribution();
			hydrateInquiryForms();
			return;
		}

		clearAttribution();
	}

	function initialize() {
		syncAttributionWithConsent();

		document.addEventListener( 'wp_listen_for_consent_change', syncAttributionWithConsent );
		document.addEventListener( 'wp_consent_type_defined', syncAttributionWithConsent );

		// Refresh immediately before serialization if the form was re-rendered.
		document.addEventListener( 'submit', function ( event ) {
			const form = event.target;

			if (
				form &&
				String( form.getAttribute( 'data-form_id' ) ) === inquiryFormId
			) {
				if ( hasAttributionConsent() ) {
					hydrateInquiryForms();
				} else {
					clearAttribution();
				}
			}
		}, true );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initialize );
	} else {
		initialize();
	}
}() );
