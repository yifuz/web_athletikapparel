( function () {
	'use strict';

	document.addEventListener( 'click', function ( event ) {
		const control = event.target.closest( '[data-cookie-settings]' );

		if ( ! control ) {
			return;
		}

		event.preventDefault();

		if (
			window.Cookiebot &&
			typeof window.Cookiebot.renew === 'function'
		) {
			window.Cookiebot.renew();
		}
	} );
}() );
