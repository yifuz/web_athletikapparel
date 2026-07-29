( function () {
	'use strict';

	const inquiryFormId = '3';
	let lastTrackedForm = null;
	let lastTrackedAt = 0;

	/**
	 * Send a GA4 lead only after Fluent Forms confirms a successful submission.
	 *
	 * @param {HTMLElement|Object} formValue Form element or jQuery form object.
	 */
	function trackSuccessfulInquiry( formValue ) {
		const form = formValue && formValue.jquery ? formValue[ 0 ] : formValue;

		if ( ! form || String( form.getAttribute( 'data-form_id' ) ) !== inquiryFormId ) {
			return;
		}

		// Fluent Forms exposes the success through more than one browser event.
		// Prevent duplicate GA events while allowing a later genuine resubmission.
		if ( form === lastTrackedForm && Date.now() - lastTrackedAt < 2000 ) {
			return;
		}

		lastTrackedForm = form;
		lastTrackedAt = Date.now();

		const eventData = {
			lead_source: 'website_contact_form',
			form_id: inquiryFormId,
			form_name: 'B2B inquiry'
		};

		if (
			window._googlesitekit &&
			typeof window._googlesitekit.gtagEvent === 'function'
		) {
			window._googlesitekit.gtagEvent( 'generate_lead', eventData );
			return;
		}

		window.dataLayer = window.dataLayer || [];
		window.gtag = window.gtag || function () {
			window.dataLayer.push( arguments );
		};

		window.gtag( 'event', 'generate_lead', eventData );
	}

	/**
	 * Fluent Forms 6.2.8 triggers this jQuery event after the server accepts
	 * and stores the submission.
	 */
	window.jQuery( document.body ).on(
		'fluentform_submission_success.myathletikLead',
		function ( event, payload ) {
			trackSuccessfulInquiry( payload && payload.form );
		}
	);

	// Keep the native event as a fallback for future Fluent Forms versions.
	document.addEventListener( 'fluentform_submission_success', function ( event ) {
		trackSuccessfulInquiry( event.detail && event.detail.form );
	} );
}() );
