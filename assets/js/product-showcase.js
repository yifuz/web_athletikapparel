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
    var pagination = document.getElementById('ma-pl-pagination');
    var previous = document.getElementById('ma-pl-page-prev');
    var next = document.getElementById('ma-pl-page-next');
    var pagesWrap = document.getElementById('ma-pl-page-numbers');
    if (!search || !results || !status || !empty || !reset || typeof window.matchMedia !== 'function') return;

    var categoryButtons = Array.from(filters.querySelectorAll('[data-category]'));
    var materialButtons = Array.from(filters.querySelectorAll('[data-material]'));
    var cards = Array.from(results.querySelectorAll('.ma-pl-product-card'));
    var originalStatus = status.textContent;
    var mobileQuery = window.matchMedia('(max-width: 47.99rem)');
    var reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    var perPage = mobileQuery.matches ? 4 : 6;
    var activeCategory = 'all';
    var activeMaterial = 'all';
    var currentPage = 0;
    var matches = cards.slice();
    var listeners = [];
    var active = false;

    function normalize(value) {
      return String(value || '').toLowerCase().replace(/[’']/g, '').replace(/[^\p{L}\p{N}]+/gu, ' ').trim();
    }

    var records = cards.map(function (card) {
      return {
        card: card,
        category: card.dataset.category || '',
        materials: (card.dataset.material || '').split(' ').filter(Boolean),
        searchText: normalize((card.dataset.search || '') + ' ' + card.textContent)
      };
    });

    var categoryLabels = {};
    categoryButtons.forEach(function (button) {
      categoryLabels[button.dataset.category] = button.dataset.categoryLabel || button.textContent.trim();
    });

    function focusedCard() {
      var focused = document.activeElement;
      if (!focused || !results.contains(focused)) return null;
      return focused.closest('.ma-pl-product-card');
    }

    function scrollFiltersIntoViewIfNeeded() {
      var rect = filters.getBoundingClientRect();
      if (rect.top >= 0) return;
      filters.scrollIntoView({
        block: 'start',
        behavior: reducedMotionQuery.matches ? 'auto' : 'smooth'
      });
    }

    function buildPageButtons(pageCount) {
      if (!pagesWrap) return;
      pagesWrap.textContent = '';
      for (var i = 0; i < pageCount; i++) {
        (function (pageIndex) {
          var button = document.createElement('button');
          button.type = 'button';
          button.className = 'ma-pl-page-btn';
          button.textContent = String(pageIndex + 1);
          button.setAttribute('aria-label', 'Page ' + (pageIndex + 1) + ' of ' + pageCount);
          button.setAttribute('aria-controls', results.id);
          if (pageIndex === currentPage) {
            button.setAttribute('aria-current', 'page');
          }
          button.addEventListener('click', function () {
            if (!active || pageIndex === currentPage) return;
            currentPage = pageIndex;
            render(true);
          });
          pagesWrap.appendChild(button);
        })(i);
      }
    }

    function updateStatus(start, shownCount) {
      var total = matches.length;
      if (!total) {
        status.textContent = '0 matching product examples';
        return;
      }
      var scopeSuffix = activeCategory !== 'all' && categoryLabels[activeCategory]
        ? ' in ' + categoryLabels[activeCategory]
        : '';
      if (total <= perPage) {
        status.textContent = 'Showing ' + total + ' product ' + (total === 1 ? 'example' : 'examples') + scopeSuffix;
      } else {
        status.textContent = 'Showing ' + (start + 1) + '–' + (start + shownCount) + ' of ' + total + ' product examples' + scopeSuffix;
      }
    }

    function render(shouldScroll) {
      var pageCount = Math.ceil(matches.length / perPage);
      currentPage = Math.max(0, Math.min(currentPage, Math.max(0, pageCount - 1)));
      var start = currentPage * perPage;
      var shown = matches.slice(start, start + perPage);
      var shownCards = shown.map(function (record) { return record.card; });
      var focused = focusedCard();
      if (focused && !shownCards.includes(focused)) {
        results.focus({preventScroll: true});
      }

      cards.forEach(function (card) {
        card.hidden = !shownCards.includes(card);
      });

      categoryButtons.forEach(function (button) {
        button.setAttribute('aria-pressed', String(button.dataset.category === activeCategory));
      });
      materialButtons.forEach(function (button) {
        button.setAttribute('aria-pressed', String(button.dataset.material === activeMaterial));
      });

      empty.hidden = matches.length !== 0;
      updateStatus(start, shown.length);

      if (pagination && previous && next && pagesWrap) {
        if (pageCount > 1) {
          pagination.hidden = false;
          previous.setAttribute('aria-disabled', String(currentPage === 0));
          next.setAttribute('aria-disabled', String(currentPage >= pageCount - 1));
          buildPageButtons(pageCount);
        } else {
          pagination.hidden = true;
        }
      }

      if (shouldScroll) {
        scrollFiltersIntoViewIfNeeded();
      }
    }

    function filterProducts() {
      var terms = normalize(search.value).split(/\s+/).filter(Boolean);
      matches = records.filter(function (record) {
        var matchesCategory = activeCategory === 'all' || record.category === activeCategory;
        var matchesMaterial = activeMaterial === 'all' || record.materials.includes(activeMaterial);
        var matchesTerms = terms.every(function (term) { return record.searchText.includes(term); });
        return matchesCategory && matchesMaterial && matchesTerms;
      });
      currentPage = 0;
      render(false);
    }

    function resizePages() {
      var nextSize = mobileQuery.matches ? 4 : 6;
      if (nextSize === perPage) return;
      var focused = focusedCard();
      var anchorIndex = focused
        ? matches.findIndex(function (record) { return record.card === focused; })
        : currentPage * perPage;
      perPage = nextSize;
      currentPage = Math.floor(Math.max(0, anchorIndex) / perPage);
      render(false);
    }

    function restoreFallback() {
      active = false;
      listeners.forEach(function (listener) {
        listener.target.removeEventListener(listener.type, listener.callback);
      });
      cards.forEach(function (card) { card.hidden = false; });
      filters.hidden = true;
      if (pagination) pagination.hidden = true;
      empty.hidden = true;
      status.textContent = originalStatus;
    }

    function listen(target, type, callback) {
      var guarded = function (event) {
        if (!active) return;
        try {
          callback(event);
        } catch (error) {
          restoreFallback();
        }
      };
      target.addEventListener(type, guarded);
      listeners.push({target: target, type: type, callback: guarded});
    }

    try {
      active = true;
      categoryButtons.forEach(function (button) {
        listen(button, 'click', function () {
          var nextCategory = button.dataset.category || 'all';
          if (nextCategory === activeCategory) return;
          activeCategory = nextCategory;
          filterProducts();
        });
      });
      materialButtons.forEach(function (button) {
        listen(button, 'click', function () {
          var nextMaterial = button.dataset.material || 'all';
          if (nextMaterial === activeMaterial) return;
          activeMaterial = nextMaterial;
          filterProducts();
        });
      });
      listen(search, 'input', filterProducts);
      listen(reset, 'click', function () {
        activeCategory = 'all';
        activeMaterial = 'all';
        search.value = '';
        filterProducts();
        search.focus();
      });
      if (previous && next) {
        listen(previous, 'click', function (event) {
          event.preventDefault();
          if (previous.getAttribute('aria-disabled') === 'true') return;
          currentPage -= 1;
          render(true);
        });
        listen(next, 'click', function (event) {
          event.preventDefault();
          if (next.getAttribute('aria-disabled') === 'true') return;
          currentPage += 1;
          render(true);
        });
      }
      listen(mobileQuery, 'change', resizePages);
      filters.hidden = false;
      filterProducts();
    } catch (error) {
      restoreFallback();
    }
  }

  function initializeMedia() {
    var stage = document.getElementById('ma-pl-product-media');
    var image = document.getElementById('ma-pl-main-product-image');
    var video = document.getElementById('ma-pl-product-video');
    var caption = document.getElementById('ma-pl-media-caption');
    var dialog = document.getElementById('ma-pl-video-dialog');
    if (!stage || !image || !caption) return;
    var gallery = stage.closest('.ma-pl-gallery');
    if (!gallery) return;
    var buttons = Array.from(gallery.querySelectorAll('.ma-pl-thumb'));
    var videoButtons = Array.from(gallery.querySelectorAll('[data-media="video"]'));
    var photoButtons = buttons.filter(function (button) { return button.dataset.media === 'image'; });
    var textButton = document.getElementById('ma-pl-show-product-video');
    var hasVideoModal = Boolean(video && dialog);
    var closeButton = hasVideoModal ? dialog.querySelector('[data-ma-pl-video-close]') : null;
    var source = hasVideoModal ? video.querySelector('source') : null;
    var videoTitle = document.getElementById('ma-pl-video-title');
    var fallbackLink = hasVideoModal ? video.querySelector('a') : null;
    var defaultSource = source ? source.getAttribute('src') : '';
    var defaultPoster = hasVideoModal ? video.getAttribute('poster') : '';
    var defaultTitle = videoTitle ? videoTitle.textContent : '';
    var defaultVideoLabel = hasVideoModal ? video.getAttribute('aria-label') : '';
    var loadedSource = null;
    var activeTrigger = null;
    var backdropPointerDown = false;

    function selectPhoto(button) {
      if (hasVideoModal) video.pause();
      var thumbImage = button.querySelector('img');
      // Responsive candidates must change together with src to avoid retaining the front image.
      if (button.dataset.srcset) image.srcset = button.dataset.srcset;
      else image.removeAttribute('srcset');
      image.src = button.dataset.src || (thumbImage ? thumbImage.src : image.src);
      if (button.dataset.sizes) image.sizes = button.dataset.sizes;
      image.alt = button.dataset.alt || '';
      var suffix = button.dataset.captionSuffix || caption.dataset.captionSuffix || 'Frame from the product video';
      caption.textContent = (button.dataset.caption || '') + ' · ' + suffix;
      photoButtons.forEach(function (item) {
        item.setAttribute('aria-pressed', String(item === button));
      });
    }

    function openVideo(trigger) {
      if (!hasVideoModal || !source || !videoTitle) return;
      var nextSource = trigger.dataset.videoSrc || defaultSource;
      var nextPoster = trigger.dataset.videoPoster || defaultPoster;
      var nextTitle = trigger.dataset.videoTitle;
      var nextAspect = trigger.dataset.videoAspect || 'landscape';
      if (typeof dialog.showModal !== 'function') {
        // Older browsers still have a working video destination.
        window.location.assign(nextSource);
        return;
      }
      video.pause();
      dialog.dataset.videoAspect = nextAspect;
      videoTitle.textContent = nextTitle ? defaultTitle + ' · ' + nextTitle : defaultTitle;
      video.setAttribute('aria-label', nextTitle ? defaultVideoLabel + ' — ' + nextTitle : defaultVideoLabel);
      video.poster = nextPoster;
      if (fallbackLink) fallbackLink.href = nextSource;
      activeTrigger = trigger;
      dialog.showModal();
      document.documentElement.classList.add('ma-pl-video-open');
      // The request and playback are initiated only by the visitor's explicit click.
      if (loadedSource !== nextSource) {
        source.src = nextSource;
        video.preload = 'metadata';
        video.load();
        loadedSource = nextSource;
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
    if (hasVideoModal && source && videoTitle) {
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
    }

    photoButtons.forEach(function (button) {
      button.addEventListener('click', function () { selectPhoto(button); });
    });
    if (hasVideoModal) {
      videoButtons.concat(textButton).filter(Boolean).forEach(function (button) {
        if (typeof dialog.showModal !== 'function') {
          button.removeAttribute('aria-haspopup');
          button.removeAttribute('aria-controls');
        }
        button.addEventListener('click', function () { openVideo(button); });
      });
    }
    var thumbs = gallery.querySelector('.ma-pl-thumbs');
    if (thumbs) thumbs.hidden = false;
    var videos = gallery.querySelector('.ma-pl-videos');
    if (videos) videos.hidden = false;
    if (textButton && hasVideoModal) textButton.hidden = false;
  }

  function initializeSeasonalGallery() {
    var root = document.querySelector('[data-seasonal-gallery]');
    if (!root) return;
    var filters = document.getElementById('ma-pl-seasonal-filters');
    var grid = document.getElementById('ma-pl-seasonal-grid');
    var status = document.getElementById('ma-pl-seasonal-count');
    var pagination = document.getElementById('ma-pl-seasonal-pagination');
    var prevPage = document.getElementById('ma-pl-seasonal-prev');
    var nextPage = document.getElementById('ma-pl-seasonal-next');
    var pagesWrap = document.getElementById('ma-pl-seasonal-pages');
    var dialog = document.getElementById('ma-pl-seasonal-dialog');
    var dataEl = document.getElementById('ma-pl-seasonal-data');
    if (!filters || !grid || !status || !dialog || !dataEl || typeof window.matchMedia !== 'function') return;

    var itemsData;
    try {
      itemsData = JSON.parse(dataEl.textContent);
    } catch (e) {
      return;
    }

    var cards = Array.from(grid.querySelectorAll('[data-seasonal-card]'));
    var chips = Array.from(filters.querySelectorAll('[data-seasonal-category]'));
    var originalStatus = status.textContent;
    var mobileQuery = window.matchMedia('(max-width: 47.99rem)');
    var reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    var perPage = mobileQuery.matches ? 4 : 6;
    var activeCategory = 'all';
    var currentPage = 0;
    var matches = cards.slice();
    var listeners = [];
    var active = false;

    var records = cards.map(function (card) {
      return {
        card: card,
        category: card.dataset.seasonalCategory || ''
      };
    });
    var categoryLabels = {};
    chips.forEach(function (chip) {
      categoryLabels[chip.dataset.seasonalCategory] = chip.dataset.seasonalLabel || chip.textContent.trim();
    });

    function focusedCard() {
      var el = document.activeElement;
      if (!el || !grid.contains(el)) return null;
      return el.closest('[data-seasonal-card]');
    }

    function scrollSectionIntoViewIfNeeded() {
      var rect = filters.getBoundingClientRect();
      if (rect.top >= 0) return;
      filters.scrollIntoView({
        block: 'start',
        behavior: reducedMotionQuery.matches ? 'auto' : 'smooth'
      });
    }

    function buildPageButtons(pageCount) {
      if (!pagesWrap) return;
      pagesWrap.textContent = '';
      for (var i = 0; i < pageCount; i++) {
        (function (pageIndex) {
          var btn = document.createElement('button');
          btn.type = 'button';
          btn.className = 'ma-pl-page-btn';
          btn.textContent = String(pageIndex + 1);
          btn.setAttribute('aria-label', 'Seasonal gallery page ' + (pageIndex + 1) + ' of ' + pageCount);
          btn.setAttribute('aria-controls', grid.id);
          if (pageIndex === currentPage) btn.setAttribute('aria-current', 'page');
          btn.addEventListener('click', function () {
            if (!active || pageIndex === currentPage) return;
            currentPage = pageIndex;
            render(true);
          });
          pagesWrap.appendChild(btn);
        })(i);
      }
    }

    function updateStatus(start, shownCount) {
      var total = matches.length;
      if (!total) {
        status.textContent = '0 seasonal samples';
        return;
      }
      var scopeSuffix = activeCategory !== 'all' && categoryLabels[activeCategory]
        ? ' in ' + categoryLabels[activeCategory]
        : '';
      if (total <= perPage) {
        status.textContent = 'Showing ' + total + ' seasonal ' + (total === 1 ? 'sample' : 'samples') + scopeSuffix;
      } else {
        status.textContent = 'Showing ' + (start + 1) + '–' + (start + shownCount) + ' of ' + total + ' seasonal samples' + scopeSuffix;
      }
    }

    function render(shouldScroll) {
      var pageCount = Math.ceil(matches.length / perPage);
      currentPage = Math.max(0, Math.min(currentPage, Math.max(0, pageCount - 1)));
      var start = currentPage * perPage;
      var shown = matches.slice(start, start + perPage);
      var shownCards = shown.map(function (r) { return r.card; });
      var focused = focusedCard();
      if (focused && !shownCards.includes(focused)) {
        grid.focus({preventScroll: true});
      }
      cards.forEach(function (card) {
        card.hidden = !shownCards.includes(card);
      });
      chips.forEach(function (chip) {
        chip.setAttribute('aria-pressed', String(chip.dataset.seasonalCategory === activeCategory));
      });
      updateStatus(start, shown.length);
      if (pagination && prevPage && nextPage && pagesWrap) {
        if (pageCount > 1) {
          pagination.hidden = false;
          prevPage.setAttribute('aria-disabled', String(currentPage === 0));
          nextPage.setAttribute('aria-disabled', String(currentPage >= pageCount - 1));
          buildPageButtons(pageCount);
        } else {
          pagination.hidden = true;
        }
      }
      if (shouldScroll) scrollSectionIntoViewIfNeeded();
    }

    function applyFilter() {
      matches = records.filter(function (record) {
        return activeCategory === 'all' || record.category === activeCategory;
      });
      currentPage = 0;
      render(false);
    }

    function resizePages() {
      var nextSize = mobileQuery.matches ? 4 : 6;
      if (nextSize === perPage) return;
      var focused = focusedCard();
      var anchor = focused ? matches.findIndex(function (r) { return r.card === focused; }) : currentPage * perPage;
      perPage = nextSize;
      currentPage = Math.floor(Math.max(0, anchor) / perPage);
      render(false);
    }

    // Modal state
    var kickerEl = document.getElementById('ma-pl-seasonal-dialog-kicker');
    var titleEl = document.getElementById('ma-pl-seasonal-dialog-title');
    var summaryEl = document.getElementById('ma-pl-seasonal-dialog-summary');
    var inquiryEl = document.getElementById('ma-pl-seasonal-inquiry');
    var stageImg = document.getElementById('ma-pl-seasonal-stage-img');
    var stageCaption = document.getElementById('ma-pl-seasonal-stage-caption');
    var thumbsWrap = document.getElementById('ma-pl-seasonal-thumbs');
    var slidePrev = dialog.querySelector('[data-seasonal-slide-prev]');
    var slideNext = dialog.querySelector('[data-seasonal-slide-next]');
    var closeBtn = dialog.querySelector('[data-seasonal-close]');
    var currentItem = null;
    var slideIndex = 0;
    var activeTrigger = null;
    var backdropDown = false;

    function showSlide(index) {
      if (!currentItem || !currentItem.images || !currentItem.images.length) return;
      var imgs = currentItem.images;
      slideIndex = ((index % imgs.length) + imgs.length) % imgs.length;
      var view = imgs[slideIndex];
      if (stageImg) {
        if (view.srcset) stageImg.srcset = view.srcset;
        else stageImg.removeAttribute('srcset');
        stageImg.sizes = '(max-width: 850px) 92vw, 480px';
        stageImg.src = view.src;
        stageImg.alt = view.alt || '';
      }
      if (stageCaption) {
        stageCaption.textContent = (view.label || '') + ' (' + (slideIndex + 1) + ' of ' + imgs.length + ') · Studio sample photo';
      }
      if (thumbsWrap) {
        Array.from(thumbsWrap.querySelectorAll('button')).forEach(function (btn, idx) {
          btn.setAttribute('aria-pressed', String(idx === slideIndex));
        });
      }
    }

    function openItem(id, trigger) {
      var item = itemsData[id];
      if (!item) return;
      if (typeof dialog.showModal !== 'function') {
        window.location.assign(item.inquiry_url);
        return;
      }
      currentItem = item;
      activeTrigger = trigger;
      if (kickerEl) kickerEl.textContent = item.category_label + ' · ' + item.season;
      if (titleEl) titleEl.textContent = item.title;
      if (summaryEl) summaryEl.textContent = item.summary;
      if (inquiryEl) inquiryEl.href = item.inquiry_url;
      if (thumbsWrap) {
        thumbsWrap.textContent = '';
        (item.images || []).forEach(function (view, idx) {
          var btn = document.createElement('button');
          btn.type = 'button';
          btn.className = 'ma-pl-thumb';
          btn.setAttribute('aria-label', view.label || ('View ' + (idx + 1)));
          btn.setAttribute('aria-pressed', String(idx === 0));
          var im = document.createElement('img');
          im.src = view.thumb;
          im.width = 533;
          im.height = 800;
          im.alt = '';
          im.loading = 'eager';
          im.decoding = 'async';
          btn.appendChild(im);
          btn.addEventListener('click', function () { showSlide(idx); });
          thumbsWrap.appendChild(btn);
        });
      }
      showSlide(0);
      dialog.showModal();
      document.documentElement.classList.add('ma-pl-video-open');
    }

    function isOutside(event) {
      var rect = dialog.getBoundingClientRect();
      return event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom;
    }

    function restoreFallback() {
      active = false;
      listeners.forEach(function (l) { l.target.removeEventListener(l.type, l.cb); });
      cards.forEach(function (c) { c.hidden = false; });
      filters.hidden = true;
      if (pagination) pagination.hidden = true;
      status.textContent = originalStatus;
    }

    function listen(target, type, cb) {
      var guarded = function (e) {
        if (!active) return;
        try { cb(e); } catch (err) { restoreFallback(); }
      };
      target.addEventListener(type, guarded);
      listeners.push({target: target, type: type, cb: guarded});
    }

    try {
      active = true;
      chips.forEach(function (chip) {
        listen(chip, 'click', function () {
          var nextCat = chip.dataset.seasonalCategory || 'all';
          if (nextCat === activeCategory) return;
          activeCategory = nextCat;
          applyFilter();
        });
      });
      if (prevPage && nextPage) {
        listen(prevPage, 'click', function (e) {
          e.preventDefault();
          if (prevPage.getAttribute('aria-disabled') === 'true') return;
          currentPage -= 1;
          render(true);
        });
        listen(nextPage, 'click', function (e) {
          e.preventDefault();
          if (nextPage.getAttribute('aria-disabled') === 'true') return;
          currentPage += 1;
          render(true);
        });
      }
      listen(mobileQuery, 'change', resizePages);

      grid.querySelectorAll('[data-seasonal-open]').forEach(function (btn) {
        listen(btn, 'click', function () {
          openItem(btn.dataset.seasonalOpen, btn);
        });
      });
      if (slidePrev) listen(slidePrev, 'click', function () { showSlide(slideIndex - 1); });
      if (slideNext) listen(slideNext, 'click', function () { showSlide(slideIndex + 1); });
      if (closeBtn) listen(closeBtn, 'click', function () { dialog.close(); });

      listen(dialog, 'pointerdown', function (e) {
        backdropDown = e.target === dialog && isOutside(e);
      });
      listen(dialog, 'click', function (e) {
        if (backdropDown && e.target === dialog && isOutside(e)) dialog.close();
        backdropDown = false;
      });
      listen(dialog, 'keydown', function (e) {
        if (!dialog.open) return;
        if (e.key === 'ArrowLeft') { e.preventDefault(); showSlide(slideIndex - 1); }
        else if (e.key === 'ArrowRight') { e.preventDefault(); showSlide(slideIndex + 1); }
      });
      listen(dialog, 'close', function () {
        document.documentElement.classList.remove('ma-pl-video-open');
        if (activeTrigger && activeTrigger.isConnected) activeTrigger.focus({preventScroll: true});
        activeTrigger = null;
        currentItem = null;
      });

      filters.hidden = false;
      applyFilter();
    } catch (e) {
      restoreFallback();
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initializeLibrary();
      initializeMedia();
      initializeSeasonalGallery();
    }, {once: true});
  } else {
    initializeLibrary();
    initializeMedia();
    initializeSeasonalGallery();
  }
})();
