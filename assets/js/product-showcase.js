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
    if (!stage || !image || !video || !caption) return;
    var gallery = stage.closest('.ma-pl-gallery');
    if (!gallery) return;
    var buttons = Array.from(gallery.querySelectorAll('.ma-pl-thumb'));
    var videoButton = buttons.find(function (button) { return button.dataset.media === 'video'; });
    var textButton = document.getElementById('ma-pl-show-product-video');

    function selectMedia(button) {
      var isVideo = button.dataset.media === 'video';
      if (!isVideo) video.pause();
      image.hidden = isVideo;
      video.hidden = !isVideo;
      if (isVideo) {
        // No media bytes are requested until the video is explicitly selected.
        if (video.preload === 'none') {
          video.preload = 'metadata';
          video.load();
        }
        caption.textContent = 'Product video · Use the player controls to watch';
      } else {
        var thumbImage = button.querySelector('img');
        // Responsive candidates must change together with src to avoid retaining the front image.
        if (button.dataset.srcset) image.srcset = button.dataset.srcset;
        else image.removeAttribute('srcset');
        image.src = button.dataset.src || (thumbImage ? thumbImage.src : image.src);
        if (button.dataset.sizes) image.sizes = button.dataset.sizes;
        image.alt = button.dataset.alt || '';
        caption.textContent = (button.dataset.caption || '') + ' · Frame from the product video';
      }
      buttons.forEach(function (item) {
        item.setAttribute('aria-pressed', String(item === button));
      });
    }
    buttons.forEach(function (button) {
      button.addEventListener('click', function () { selectMedia(button); });
    });
    var thumbs = gallery.querySelector('.ma-pl-thumbs');
    if (thumbs) thumbs.hidden = false;
    if (textButton && videoButton) {
      textButton.addEventListener('click', function () {
        selectMedia(videoButton);
        stage.scrollIntoView({block: 'center', behavior: 'instant'});
        video.focus({preventScroll: true});
      });
      textButton.hidden = false;
    }
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
