/**
 * Keep the homepage hero lightweight and motion-safe.
 */
( function () {
	'use strict';

	const video = document.querySelector( '[data-ma-home-hero-video]' );

	if ( ! video ) {
		return;
	}

	const reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' );
	const saveData = Boolean( navigator.connection && navigator.connection.saveData );
	let isVisible = true;

	const showPoster = () => {
		video.pause();
	};

	const playVideo = () => {
		if ( reducedMotion.matches || saveData || ! isVisible || document.hidden ) {
			showPoster();
			return;
		}

		const playback = video.play();

		if ( playback ) {
			playback.catch( showPoster );
		}
	};

	if ( reducedMotion.matches || saveData ) {
		video.removeAttribute( 'autoplay' );
		video.preload = 'none';
		showPoster();
	} else {
		video.addEventListener( 'error', showPoster );
		playVideo();
	}

	if ( 'IntersectionObserver' in window ) {
		const observer = new IntersectionObserver(
			( entries ) => {
				isVisible = entries[ 0 ].isIntersecting;
				playVideo();
			},
			{ threshold: 0.15 }
		);

		observer.observe( video );
	}

	document.addEventListener( 'visibilitychange', playVideo );
	reducedMotion.addEventListener( 'change', playVideo );
}() );
