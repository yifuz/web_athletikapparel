(() => {
  'use strict';

  document.querySelectorAll('[data-ma-product-lightbox]').forEach((section) => {
    const links = Array.from(section.querySelectorAll('[data-ma-lightbox-link]'));
    if (!links.length || typeof HTMLDialogElement === 'undefined' || typeof HTMLDialogElement.prototype.showModal !== 'function') {
      return;
    }

    const dialog = document.createElement('dialog');
    dialog.className = 'ma-product-lightbox';
    dialog.setAttribute('aria-label', 'Sportswear photo viewer');
    dialog.innerHTML = `
      <div class="ma-product-lightbox__toolbar">
        <p class="ma-product-lightbox__count" aria-live="polite"></p>
        <button type="button" data-ma-lightbox-close aria-label="Close larger photo">×</button>
      </div>
      <figure class="ma-product-lightbox__figure">
        <img class="ma-product-lightbox__image" data-ma-lightbox-image alt="" width="800" height="1000" decoding="async">
        <figcaption class="ma-product-lightbox__caption" data-ma-lightbox-caption></figcaption>
      </figure>
      <div class="ma-product-lightbox__navigation">
        <button type="button" data-ma-lightbox-previous aria-label="Previous photo">←</button>
        <button type="button" data-ma-lightbox-next aria-label="Next photo">→</button>
      </div>`;
    document.body.appendChild(dialog);

    const image = dialog.querySelector('[data-ma-lightbox-image]');
    const caption = dialog.querySelector('[data-ma-lightbox-caption]');
    const count = dialog.querySelector('.ma-product-lightbox__count');
    const previous = dialog.querySelector('[data-ma-lightbox-previous]');
    const next = dialog.querySelector('[data-ma-lightbox-next]');
    const close = dialog.querySelector('[data-ma-lightbox-close]');
    let currentIndex = 0;
    let activeTrigger = null;
    let pointerStartX = null;
    let pointerStartY = null;
    let pointerMoved = false;

    const showImage = (index) => {
      currentIndex = index;
      const link = links[index];
      const thumb = link.querySelector('img');
      const label = link.closest('figure')?.querySelector('figcaption');
      image.alt = thumb?.alt || '';
      image.src = link.dataset.maLightboxFull || link.href;
      caption.textContent = label?.textContent?.trim() || image.alt;
      count.textContent = `${index + 1} / ${links.length}`;
      previous.disabled = index === 0;
      next.disabled = index === links.length - 1;
    };

    image.addEventListener('error', () => {
      const fallback = links[currentIndex].href;
      if (image.src !== fallback) {
        image.src = fallback;
      }
    });

    section.querySelectorAll('[data-ma-lightbox-link]').forEach((link) => {
      link.setAttribute('aria-haspopup', 'dialog');
    });

    section.addEventListener('pointerdown', (event) => {
      pointerStartX = event.clientX;
      pointerStartY = event.clientY;
      pointerMoved = false;
    });
    section.addEventListener('pointermove', (event) => {
      if (pointerStartX === null || pointerStartY === null) {
        return;
      }
      if (Math.abs(event.clientX - pointerStartX) > 8 || Math.abs(event.clientY - pointerStartY) > 8) {
        pointerMoved = true;
      }
    });
    section.addEventListener('pointerup', () => {
      pointerStartX = null;
      pointerStartY = null;
    });
    section.addEventListener('pointercancel', () => {
      pointerStartX = null;
      pointerStartY = null;
      pointerMoved = false;
    });

    section.addEventListener('click', (event) => {
      const link = event.target.closest('[data-ma-lightbox-link]');
      if (!link || !section.contains(link)) {
        pointerMoved = false;
        return;
      }
      if (pointerMoved && event.detail !== 0) {
        event.preventDefault();
        pointerMoved = false;
        return;
      }
      pointerMoved = false;
      event.preventDefault();
      activeTrigger = link;
      showImage(links.indexOf(link));
      dialog.showModal();
      close.focus();
    });

    close.addEventListener('click', () => dialog.close());
    previous.addEventListener('click', () => {
      if (currentIndex > 0) {
        showImage(currentIndex - 1);
      }
    });
    next.addEventListener('click', () => {
      if (currentIndex < links.length - 1) {
        showImage(currentIndex + 1);
      }
    });
    dialog.addEventListener('click', (event) => {
      if (event.target === dialog) {
        dialog.close();
      }
    });
    dialog.addEventListener('keydown', (event) => {
      if (event.key === 'ArrowLeft' && currentIndex > 0) {
        event.preventDefault();
        showImage(currentIndex - 1);
      } else if (event.key === 'ArrowRight' && currentIndex < links.length - 1) {
        event.preventDefault();
        showImage(currentIndex + 1);
      }
    });
    dialog.addEventListener('close', () => {
      image.removeAttribute('src');
      activeTrigger?.focus();
      activeTrigger = null;
    });
  });
})();
