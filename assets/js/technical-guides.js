/* Technical guides hub filtering and pagination. All cards remain server-rendered for crawlers and no-JS fallback. */
(function () {
  'use strict';

  function initializeGuidesHub(root) {
    var controls = root.querySelector('[data-guides-controls]');
    var grid = root.querySelector('[data-guides-grid]');
    var search = root.querySelector('input[data-guides-search]');
    var status = root.querySelector('[data-guides-status]');
    var empty = root.querySelector('[data-guides-empty]');
    var reset = root.querySelector('[data-guides-reset]');
    var pagination = root.querySelector('[data-guides-pagination]');
    var previous = root.querySelector('[data-guides-prev]');
    var next = root.querySelector('[data-guides-next]');
    var pagesWrap = root.querySelector('[data-guides-pages]');
    var chips = Array.from(root.querySelectorAll('[data-guide-category]'));
    var cards = Array.from(root.querySelectorAll('[data-guide-card]'));

    if (!controls || !grid || !search || !status || !empty || !reset ||
        !pagination || !previous || !next || !pagesWrap || !chips.length ||
        !cards.length || typeof window.matchMedia !== 'function') {
      return;
    }

    function normalize(value) {
      return String(value || '')
        .toLowerCase()
        .replace(/[’']/g, '')
        .replace(/[^a-z0-9]+/g, ' ')
        .trim();
    }

    var records = cards.map(function (card) {
      return {
        card: card,
        category: card.dataset.category || '',
        searchText: normalize((card.dataset.search || '') + ' ' + card.textContent)
      };
    });

    var categoryLabels = {};
    chips.forEach(function (chip) {
      categoryLabels[chip.dataset.guideCategory] = chip.dataset.categoryLabel || chip.textContent.trim();
    });

    var originalStatus = status.textContent;
    var mobileQuery = window.matchMedia('(max-width: 47.99rem)');
    var reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    var perPage = mobileQuery.matches ? 4 : 6;
    var activeCategory = 'all';
    var currentPage = 0;
    var matches = records.slice();
    var listeners = [];
    var active = false;

    function focusedCard() {
      var focused = document.activeElement;
      if (!focused || !root.contains(focused)) return null;
      return focused.closest('[data-guide-card]');
    }

    function focusGrid() {
      grid.focus({preventScroll: true});
    }

    function scrollLibraryIntoViewIfNeeded() {
      var rect = controls.getBoundingClientRect();
      if (rect.top >= 0) return;
      controls.scrollIntoView({
        block: 'start',
        behavior: reducedMotionQuery.matches ? 'auto' : 'smooth'
      });
    }

    function buildPageButtons(pageCount) {
      pagesWrap.textContent = '';
      for (var i = 0; i < pageCount; i++) {
        (function (pageIndex) {
          var button = document.createElement('button');
          button.type = 'button';
          button.className = 'ma-technical-guides__page-btn';
          button.textContent = String(pageIndex + 1);
          button.setAttribute('aria-label', 'Page ' + (pageIndex + 1) + ' of ' + pageCount);
          button.setAttribute('aria-controls', grid.id);
          if (pageIndex === currentPage) {
            button.setAttribute('aria-current', 'page');
          }
          button.addEventListener('click', function () {
            if (pageIndex === currentPage) return;
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
        status.textContent = '0 matching technical guides';
        return;
      }
      var scopeSuffix = activeCategory !== 'all' && categoryLabels[activeCategory]
        ? ' in ' + categoryLabels[activeCategory]
        : '';
      if (total <= perPage) {
        status.textContent = 'Showing ' + total + ' technical ' + (total === 1 ? 'guide' : 'guides') + scopeSuffix;
      } else {
        status.textContent = 'Showing ' + (start + 1) + '–' + (start + shownCount) + ' of ' + total + ' technical guides' + scopeSuffix;
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
        focusGrid();
      }

      cards.forEach(function (card) {
        card.hidden = !shownCards.includes(card);
      });

      chips.forEach(function (chip) {
        chip.setAttribute('aria-pressed', String(chip.dataset.guideCategory === activeCategory));
      });

      empty.hidden = matches.length !== 0;
      updateStatus(start, shown.length);

      if (pageCount > 1) {
        pagination.hidden = false;
        previous.setAttribute('aria-disabled', String(currentPage === 0));
        next.setAttribute('aria-disabled', String(currentPage >= pageCount - 1));
        buildPageButtons(pageCount);
      } else {
        pagination.hidden = true;
      }

      if (shouldScroll) {
        scrollLibraryIntoViewIfNeeded();
      }
    }

    function applyFilters() {
      var terms = normalize(search.value).split(/\s+/).filter(Boolean);
      matches = records.filter(function (record) {
        var matchesCategory = activeCategory === 'all' || record.category === activeCategory;
        var matchesTerms = terms.every(function (term) {
          return record.searchText.includes(term);
        });
        return matchesCategory && matchesTerms;
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
      controls.hidden = true;
      pagination.hidden = true;
      empty.hidden = true;
      status.textContent = originalStatus;
      root.removeAttribute('data-guides-enhanced');
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
      chips.forEach(function (chip) {
        listen(chip, 'click', function () {
          var nextCategory = chip.dataset.guideCategory || 'all';
          if (nextCategory === activeCategory) return;
          activeCategory = nextCategory;
          applyFilters();
        });
      });

      listen(search, 'input', applyFilters);

      listen(reset, 'click', function (event) {
        event.preventDefault();
        activeCategory = 'all';
        search.value = '';
        applyFilters();
        search.focus({preventScroll: true});
      });

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

      listen(mobileQuery, 'change', resizePages);

      controls.hidden = false;
      root.setAttribute('data-guides-enhanced', 'true');
      applyFilters();
    } catch (error) {
      restoreFallback();
    }
  }

  function initialize() {
    document.querySelectorAll('[data-guides-library]').forEach(initializeGuidesHub);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialize, {once: true});
  } else {
    initialize();
  }
})();
