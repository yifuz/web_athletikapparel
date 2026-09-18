/**
 * Load the homepage hero video after the initial page load while keeping the
 * eager poster as the first-render visual.
 */
( function () {
	'use strict';

	const video = document.querySelector( '[data-ma-home-hero-video]' );

	if ( ! video ) {
		return;
	}

	const sources = Array.from( video.querySelectorAll( 'source[data-src]' ) );
	const reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' );
	const saveData = Boolean( navigator.connection && navigator.connection.saveData );
	let hasLoadedSources = false;
	let isVisible = true;
	let hasScheduledLoad = false;

	const showPoster = () => {
		video.pause();
		video.classList.remove( 'is-playing' );
	};

	const mayPlay = () => ! reducedMotion.matches && ! saveData && isVisible && ! document.hidden;

	const loadSources = () => {
		if ( hasLoadedSources || ! mayPlay() ) {
			return;
		}

		sources.forEach( ( source ) => {
			source.src = source.dataset.src;
		} );

		hasLoadedSources = true;
		video.load();
	};

	const playVideo = () => {
		if ( ! mayPlay() ) {
			showPoster();
			return;
		}

		if ( ! hasLoadedSources ) {
			return;
		}

		const playback = video.play();

		if ( playback ) {
			playback.catch( showPoster );
		}
	};

	const activateVideo = () => {
		hasScheduledLoad = false;

		if ( ! mayPlay() ) {
			return;
		}

		loadSources();
		playVideo();
	};

	const scheduleLoad = () => {
		if ( hasScheduledLoad || hasLoadedSources || reducedMotion.matches || saveData ) {
			return;
		}

		hasScheduledLoad = true;

		const queueIdleLoad = () => {
			if ( 'requestIdleCallback' in window ) {
				window.requestIdleCallback( activateVideo, { timeout: 2000 } );
			} else {
				window.setTimeout( activateVideo, 1200 );
			}
		};

		if ( 'complete' === document.readyState ) {
			queueIdleLoad();
		} else {
			window.addEventListener( 'load', queueIdleLoad, { once: true } );
		}
	};

	video.addEventListener( 'playing', () => video.classList.add( 'is-playing' ) );
	video.addEventListener( 'error', showPoster );

	if ( 'IntersectionObserver' in window ) {
		const observer = new IntersectionObserver(
			( entries ) => {
				isVisible = entries[ 0 ].isIntersecting;

				if ( isVisible ) {
					scheduleLoad();
					playVideo();
				} else {
					showPoster();
				}
			},
			{ threshold: 0.15 }
		);

		observer.observe( video );
	}

	document.addEventListener( 'visibilitychange', () => {
		if ( document.hidden ) {
			showPoster();
			return;
		}

		scheduleLoad();
		playVideo();
	} );
	const handleMotionChange = () => {
		if ( reducedMotion.matches ) {
			showPoster();
			return;
		}

		scheduleLoad();
		playVideo();
	};

	if ( 'addEventListener' in reducedMotion ) {
		reducedMotion.addEventListener( 'change', handleMotionChange );
	} else if ( 'addListener' in reducedMotion ) {
		reducedMotion.addListener( handleMotionChange );
	}

	scheduleLoad();
}() );
