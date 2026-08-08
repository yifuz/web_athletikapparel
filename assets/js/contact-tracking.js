( function () {
	'use strict';

	/**
	 * Send an event through Site Kit's Google tag when available.
	 *
	 * Consent Mode remains responsible for applying the visitor's current
	 * consent state; this script does not create or write browser storage.
	 *
	 * @param {string} eventName GA4 event name.
	 * @param {Object} eventData Non-personal diagnostic parameters.
	 */
	function sendEvent( eventName, eventData ) {
		if (
			window._googlesitekit &&
			typeof window._googlesitekit.gtagEvent === 'function'
		) {
			window._googlesitekit.gtagEvent( eventName, eventData );
			return;
		}

		window.dataLayer = window.dataLayer || [];
		window.gtag = window.gtag || function () {
			window.dataLayer.push( arguments );
		};

		window.gtag( 'event', eventName, eventData );
	}

	/**
	 * Identify the visible site area containing the contact link.
	 *
	 * @param {HTMLAnchorElement} link Clicked link.
	 * @return {string} Stable, non-personal location label.
	 */
	function getLinkLocation( link ) {
		if ( link.closest( '.ma-contact-details' ) ) {
			return 'contact_page';
		}

		if ( link.closest( '.ma-home-social-bar' ) ) {
			return 'home_social_bar';
		}

		if ( link.closest( '.ma-site-footer' ) ) {
			return 'site_footer';
		}

		return 'site_content';
	}

	/**
	 * Return whether a link points to an official WhatsApp web entry point.
	 *
	 * @param {string} href Link URL.
	 * @return {boolean} Whether the URL is a WhatsApp link.
	 */
	function isWhatsAppLink( href ) {
		try {
			const hostname = new URL( href, window.location.href ).hostname.toLowerCase();

			return [ 'wa.me', 'api.whatsapp.com', 'web.whatsapp.com' ].includes( hostname );
		} catch ( error ) {
			return false;
		}
	}

	document.addEventListener( 'click', function ( event ) {
		const link = event.target.closest && event.target.closest( 'a[href]' );

		if ( ! link ) {
			return;
		}

		const href = link.getAttribute( 'href' ) || '';
		const eventData = {
			contact_location: getLinkLocation( link )
		};

		if ( href.toLowerCase().startsWith( 'mailto:' ) ) {
			sendEvent( 'contact_email_click', eventData );
			return;
		}

		if ( isWhatsAppLink( href ) ) {
			sendEvent( 'contact_whatsapp_click', eventData );
		}
	}, true );
}() );
