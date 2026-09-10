(() => {
  'use strict';

  document.querySelectorAll('[data-ma-product-carousel]').forEach((carousel) => {
    const track = carousel.querySelector('.ma-product-showcase__grid--carousel');
    const previous = carousel.querySelector('[data-ma-carousel-prev]');
    const next = carousel.querySelector('[data-ma-carousel-next]');

    if (!track || !previous || !next) {
      return;
    }

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let dragging = false;
    let dragStartX = 0;
    let dragStartScroll = 0;

    const updateControls = () => {
      const end = track.scrollWidth - track.clientWidth;
      previous.disabled = track.scrollLeft <= 2;
      next.disabled = track.scrollLeft >= end - 2;
    };

    const move = (direction) => {
      track.scrollBy({
        left: direction * track.clientWidth * 0.9,
        behavior: reducedMotion.matches ? 'auto' : 'smooth',
      });
      window.setTimeout(updateControls, reducedMotion.matches ? 0 : 500);
    };

    previous.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));

    track.addEventListener('keydown', (event) => {
      if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') {
        return;
      }

      event.preventDefault();
      move(event.key === 'ArrowLeft' ? -1 : 1);
    });

    track.addEventListener('pointerdown', (event) => {
      if (event.pointerType !== 'mouse' || event.button !== 0) {
        return;
      }

      dragging = true;
      dragStartX = event.clientX;
      dragStartScroll = track.scrollLeft;
      track.classList.add('is-dragging');
      track.setPointerCapture(event.pointerId);
    });

    track.addEventListener('pointermove', (event) => {
      if (!dragging) {
        return;
      }

      event.preventDefault();
      track.scrollLeft = dragStartScroll - (event.clientX - dragStartX);
    });

    const stopDragging = (event) => {
      if (!dragging) {
        return;
      }

      dragging = false;
      track.classList.remove('is-dragging');

      if (track.hasPointerCapture(event.pointerId)) {
        track.releasePointerCapture(event.pointerId);
      }
    };

    track.addEventListener('pointerup', stopDragging);
    track.addEventListener('pointercancel', stopDragging);
    track.addEventListener('dragstart', (event) => event.preventDefault());
    track.addEventListener('scroll', updateControls, { passive: true });
    track.addEventListener('scrollend', updateControls, { passive: true });
    window.addEventListener('resize', updateControls, { passive: true });
    updateControls();
  });
})();
