/* Fabric reference library. Server-rendered cards remain usable without JavaScript. */
(function () {
  'use strict';

  function initializeLibrary(root) {
    var grid = root.querySelector('[data-fabric-grid]');
    var controls = root.querySelector('[data-fabric-controls]');
    var search = root.querySelector('input[data-fabric-search]');
    var group = root.querySelector('select[data-fabric-group]');
    var weight = root.querySelector('select[data-fabric-weight]');
    var reset = root.querySelector('[data-fabric-reset]');
    var status = root.querySelector('[data-fabric-status]');
    var empty = root.querySelector('[data-fabric-empty]');
    var pagination = root.querySelector('[data-fabric-pagination]');
    var previous = root.querySelector('[data-fabric-prev]');
    var next = root.querySelector('[data-fabric-next]');
    var pageLabel = root.querySelector('[data-fabric-page]');
    var cards = Array.from(root.querySelectorAll('[data-fabric-card]'));
    if (!grid || !controls || !search || !group || !weight || !reset || !status ||
        !empty || !pagination || !previous || !next || !pageLabel || !cards.length ||
        typeof window.matchMedia !== 'function') return;

    function normalize(value) {
      return value.toLowerCase().replace(/[^a-z0-9]+/g, ' ').trim();
    }

    // Material options come from the same PHP registry as the cards. A blended
    // reference may match several materials; do not force it into one family.
    var materialValues = Array.from(group.options).map(function (option) { return option.value; });
    if (!materialValues.includes('all') || materialValues.length < 2) return;
    var records = cards.map(function (card) {
      return {
        card: card,
        text: normalize((card.dataset.ref || '') + ' ' + (card.dataset.composition || '')),
        materials: (card.dataset.materials || '').trim().split(/\s+/).filter(Boolean),
        gsmMin: Number(card.dataset.gsmMin),
        gsmMax: Number(card.dataset.gsmMax),
        parent: card.parentNode
      };
    });
    // An incomplete template must retain its original, expandable reference groups.
    if (records.some(function (record) {
      return !record.card.id || !record.card.dataset.ref || !record.card.dataset.composition ||
        !record.materials.length || record.materials.some(function (material) {
          return material === 'all' || !materialValues.includes(material);
        }) || !Number.isFinite(record.gsmMin) || !Number.isFinite(record.gsmMax) ||
        record.gsmMin <= 0 || record.gsmMax < record.gsmMin;
    })) return;

    var moreGroups = Array.from(root.querySelectorAll('[data-fabric-more]')).map(function (node) {
      return {node: node, parent: node.parentNode, next: node.nextSibling};
    });
    var originalStatus = status.textContent;
    var mobile = window.matchMedia('(max-width: 600px)');
    var perPage = mobile.matches ? 3 : 6;
    var currentPage = 0;
    var matches = records.slice();
    var listeners = [];
    var active = false;

    function focusedCard() {
      var focused = document.activeElement;
      if (!focused || !root.contains(focused)) return null;
      return focused.closest('[data-fabric-card]');
    }

    function focusGrid() {
      grid.focus({preventScroll: true});
    }

    function render() {
      var pageCount = Math.ceil(matches.length / perPage);
      currentPage = Math.max(0, Math.min(currentPage, Math.max(0, pageCount - 1)));
      var start = currentPage * perPage;
      var shown = matches.slice(start, start + perPage);
      var shownCards = shown.map(function (record) { return record.card; });
      var focused = focusedCard();
      // Never strand keyboard focus in a card that is about to become hidden.
      if (focused && !shownCards.includes(focused)) focusGrid();
      cards.forEach(function (card) { card.hidden = !shownCards.includes(card); });
      empty.hidden = matches.length !== 0;
      status.textContent = matches.length
        ? 'Showing ' + (start + 1) + '–' + (start + shown.length) + ' of ' + matches.length + ' fabric references'
        : '0 matching fabric references';
      pageLabel.textContent = 'Page ' + (pageCount ? currentPage + 1 : 0) + ' of ' + pageCount;
      previous.setAttribute('aria-disabled', String(currentPage === 0));
      next.setAttribute('aria-disabled', String(!pageCount || currentPage >= pageCount - 1));
    }

    // Preserve source ranges: include a reference wherever its stated GSM
    // interval overlaps the selected band, rather than picking a midpoint.
    function weightMatches(record) {
      switch (weight.value) {
        case 'under-150': return record.gsmMin < 150;
        case '150-199': return record.gsmMax >= 150 && record.gsmMin < 200;
        case '200-249': return record.gsmMax >= 200 && record.gsmMin < 250;
        case '250-plus': return record.gsmMax >= 250;
        default: return true;
      }
    }

    function filterRecords() {
      var terms = normalize(search.value).split(/\s+/).filter(Boolean);
      matches = records.filter(function (record) {
        return (group.value === 'all' || record.materials.includes(group.value)) && weightMatches(record) &&
          terms.every(function (term) { return record.text.includes(term); });
      });
      currentPage = 0;
      render();
    }

    function clearFilters() {
      search.value = '';
      group.value = 'all';
      weight.value = 'all';
      matches = records.slice();
      currentPage = 0;
    }

    function showHashTarget() {
      var id;
      try { id = decodeURIComponent(window.location.hash.slice(1)); }
      catch (error) { return; }
      if (!/^fabric-[a-z0-9-]+$/.test(id)) return;
      var target = document.getElementById(id);
      var index = cards.indexOf(target);
      if (index === -1) return;
      clearFilters();
      currentPage = Math.floor(index / perPage);
      render();
      if (!target.hasAttribute('tabindex')) target.setAttribute('tabindex', '-1');
      target.focus({preventScroll: true});
      target.scrollIntoView({block: 'start', behavior: 'auto'});
    }

    function resizePages() {
      var newSize = mobile.matches ? 3 : 6;
      if (newSize === perPage) return;
      var focused = focusedCard();
      var anchorIndex = focused
        ? matches.findIndex(function (record) { return record.card === focused; })
        : currentPage * perPage;
      perPage = newSize;
      currentPage = Math.floor(Math.max(0, anchorIndex) / perPage);
      render();
    }

    function restoreFallback() {
      active = false;
      listeners.forEach(function (listener) {
        listener.target.removeEventListener(listener.type, listener.callback);
      });
      // Restore details in reverse order so their original next siblings exist.
      moreGroups.slice().reverse().forEach(function (item) {
        item.parent.insertBefore(item.node, item.next && item.next.parentNode === item.parent ? item.next : null);
      });
      records.forEach(function (record) {
        record.parent.appendChild(record.card);
        record.card.hidden = false;
      });
      controls.hidden = true;
      pagination.hidden = true;
      empty.hidden = true;
      status.textContent = originalStatus;
      root.removeAttribute('data-fabric-enhanced');
    }

    function listen(target, type, callback) {
      var guarded = function (event) {
        if (!active) return;
        try { callback(event); }
        catch (error) { restoreFallback(); }
      };
      target.addEventListener(type, guarded);
      listeners.push({target: target, type: type, callback: guarded});
    }

    try {
      // All hooks and source values are checked before changing fallback content.
      cards.forEach(function (card) { grid.appendChild(card); });
      moreGroups.forEach(function (item) { item.node.remove(); });
      grid.setAttribute('tabindex', '-1');
      previous.disabled = false;
      next.disabled = false;
      active = true;
      listen(search, 'input', filterRecords);
      listen(group, 'change', filterRecords);
      listen(weight, 'change', filterRecords);
      listen(reset, 'click', function (event) {
        event.preventDefault();
        clearFilters();
        render();
        search.focus({preventScroll: true});
      });
      [[previous, -1], [next, 1]].forEach(function (entry) {
        listen(entry[0], 'click', function (event) {
          event.preventDefault();
          if (entry[0].getAttribute('aria-disabled') === 'true') return;
          // Keep pagination focus and the reader's viewport in place.
          // Direct fabric links still scroll to their requested card separately.
          currentPage += entry[1];
          render();
        });
      });
      listen(window, 'hashchange', showHashTarget);
      listen(mobile, 'change', resizePages);
      filterRecords();
      controls.hidden = false;
      pagination.hidden = false;
      root.setAttribute('data-fabric-enhanced', 'true');
      showHashTarget();
    } catch (error) {
      restoreFallback();
    }
  }

  function initialize() {
    document.querySelectorAll('[data-fabric-library]').forEach(initializeLibrary);
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialize, {once: true});
  } else {
    initialize();
  }
})();
