/* Product Showcase enhancement. Cards and destinations exist in server HTML. */
(function () {
  'use strict';

  function initializeLibrary() {
    var filters = document.getElementById('ma-pl-product-filters');
    if (!filters) return;
    var search = document.getElementById('ma-pl-product-search');
    var results = document.getElementById('ma-pl-product-results');
    var status = document.getElementById('ma-pl-result-count');
    var empty = document.getElementById('ma-pl-empty-results');
    var reset = document.getElementById('ma-pl-reset-products');
    if (!search || !results || !status || !empty || !reset) return;

    var buttons = Array.from(filters.querySelectorAll('[data-material]'));
    var cards = Array.from(results.querySelectorAll('.ma-pl-product-card'));
    var activeMaterial = 'all';
    function normalize(value) {
      return value.toLowerCase().replace(/[’']/g, '').replace(/[^\p{L}\p{N}]+/gu, ' ').trim();
    }
    function filterProducts() {
      var terms = normalize(search.value).split(/\s+/).filter(Boolean);
      var count = 0;
      cards.forEach(function (card) {
        var materials = (card.dataset.material || '').split(' ');
        var text = normalize((card.dataset.search || '') + ' ' + card.textContent);
        var matches = (activeMaterial === 'all' || materials.includes(activeMaterial)) &&
          terms.every(function (term) { return text.includes(term); });
        card.hidden = !matches;
        if (matches) count++;
      });
      status.textContent = count + ' product example' + (count === 1 ? '' : 's');
      empty.hidden = count !== 0;
      buttons.forEach(function (button) {
        button.setAttribute('aria-pressed', String(button.dataset.material === activeMaterial));
      });
    }
    buttons.forEach(function (button) {
      button.addEventListener('click', function () {
        activeMaterial = button.dataset.material;
        filterProducts();
      });
    });
    search.addEventListener('input', filterProducts);
    reset.addEventListener('click', function () {
      activeMaterial = 'all';
      search.value = '';
      filterProducts();
      search.focus();
    });
    filters.hidden = false;
  }

  function initializeMedia() {
    var stage = document.getElementById('ma-pl-product-media');
    var image = document.getElementById('ma-pl-main-product-image');
    var video = document.getElementById('ma-pl-product-video');
    var caption = document.getElementById('ma-pl-media-caption');
    var dialog = document.getElementById('ma-pl-video-dialog');
    if (!stage || !image || !video || !caption || !dialog) return;
    var gallery = stage.closest('.ma-pl-gallery');
    if (!gallery) return;
    var buttons = Array.from(gallery.querySelectorAll('.ma-pl-thumb'));
    var videoButton = buttons.find(function (button) { return button.dataset.media === 'video'; });
    var photoButtons = buttons.filter(function (button) { return button.dataset.media === 'image'; });
    var textButton = document.getElementById('ma-pl-show-product-video');
    var closeButton = dialog.querySelector('[data-ma-pl-video-close]');
    var activeTrigger = null;
    var backdropPointerDown = false;

    function selectPhoto(button) {
      video.pause();
      var thumbImage = button.querySelector('img');
      // Responsive candidates must change together with src to avoid retaining the front image.
      if (button.dataset.srcset) image.srcset = button.dataset.srcset;
      else image.removeAttribute('srcset');
      image.src = button.dataset.src || (thumbImage ? thumbImage.src : image.src);
      if (button.dataset.sizes) image.sizes = button.dataset.sizes;
      image.alt = button.dataset.alt || '';
      caption.textContent = (button.dataset.caption || '') + ' · Frame from the product video';
      photoButtons.forEach(function (item) {
        item.setAttribute('aria-pressed', String(item === button));
      });
    }

    function openVideo(trigger) {
      if (typeof dialog.showModal !== 'function') {
        // Older browsers still have a working video destination.
        window.location.assign(video.querySelector('source').src);
        return;
      }
      activeTrigger = trigger;
      dialog.showModal();
      document.documentElement.classList.add('ma-pl-video-open');
      // The request and playback are initiated only by the visitor's explicit click.
      if (video.preload === 'none') {
        video.preload = 'metadata';
        video.load();
      }
      video.play().then(function () {
        if (!dialog.open) video.pause();
      }).catch(function () {
        // Native controls remain available if playback requires another gesture.
      });
    }

    function isOutsideDialog(event) {
      var rect = dialog.getBoundingClientRect();
      return event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom;
    }
    if (closeButton) closeButton.addEventListener('click', function () { dialog.close(); });
    dialog.addEventListener('pointerdown', function (event) {
      backdropPointerDown = event.target === dialog && isOutsideDialog(event);
    });
    dialog.addEventListener('click', function (event) {
      if (backdropPointerDown && event.target === dialog && isOutsideDialog(event)) dialog.close();
      backdropPointerDown = false;
    });
    dialog.addEventListener('close', function () {
      video.pause();
      document.documentElement.classList.remove('ma-pl-video-open');
      if (activeTrigger && activeTrigger.isConnected) activeTrigger.focus({preventScroll: true});
      activeTrigger = null;
    });
    window.addEventListener('pagehide', function () { video.pause(); });

    photoButtons.forEach(function (button) {
      button.addEventListener('click', function () { selectPhoto(button); });
    });
    [videoButton, textButton].filter(Boolean).forEach(function (button) {
      if (typeof dialog.showModal !== 'function') {
        button.removeAttribute('aria-haspopup');
        button.removeAttribute('aria-controls');
      }
      button.addEventListener('click', function () { openVideo(button); });
    });
    var thumbs = gallery.querySelector('.ma-pl-thumbs');
    if (thumbs) thumbs.hidden = false;
    if (textButton) textButton.hidden = false;
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initializeLibrary();
      initializeMedia();
    }, {once: true});
  } else {
    initializeLibrary();
    initializeMedia();
  }
})();
