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

  function initializeLightbox(root) {
    if (typeof HTMLDialogElement === 'undefined' || typeof HTMLDialogElement.prototype.showModal !== 'function') return;
    var triggers = Array.from(root.querySelectorAll('[data-fabric-lightbox-trigger]'));
    if (!triggers.length) return;

    triggers.forEach(function (trigger) {
      trigger.setAttribute('aria-haspopup', 'dialog');
    });

    var dialog = document.createElement('dialog');
    dialog.className = 'ma-fabric-lightbox';
    dialog.setAttribute('aria-label', 'Fabric macro swatch viewer');
    dialog.innerHTML =
      '<div class="ma-fabric-lightbox__panel">' +
        '<div class="ma-fabric-lightbox__toolbar">' +
          '<div class="ma-fabric-lightbox__title">' +
            '<strong class="ma-fabric-lightbox__ref" data-fabric-lb-ref></strong>' +
            '<span class="ma-fabric-lightbox__gsm" data-fabric-lb-gsm></span>' +
          '</div>' +
          '<div class="ma-fabric-lightbox__actions">' +
            '<p class="ma-fabric-lightbox__count" data-fabric-lb-count aria-live="polite"></p>' +
            '<button type="button" class="ma-fabric-lightbox__close" data-fabric-lb-close aria-label="Close fabric swatch viewer">×</button>' +
          '</div>' +
        '</div>' +
        '<figure class="ma-fabric-lightbox__figure">' +
          '<img class="ma-fabric-lightbox__image" data-fabric-lb-image width="1440" height="810" alt="">' +
          '<figcaption class="ma-fabric-lightbox__meta">' +
            '<span class="ma-fabric-lightbox__kind" data-fabric-lb-kind></span>' +
            '<span class="ma-fabric-lightbox__composition" data-fabric-lb-composition></span>' +
          '</figcaption>' +
        '</figure>' +
        '<div class="ma-fabric-lightbox__nav">' +
          '<button type="button" data-fabric-lb-prev aria-label="Previous swatch">← Previous</button>' +
          '<button type="button" data-fabric-lb-next aria-label="Next swatch">Next →</button>' +
        '</div>' +
      '</div>';
    document.body.appendChild(dialog);

    var panel = dialog.querySelector('.ma-fabric-lightbox__panel');
    var refEl = dialog.querySelector('[data-fabric-lb-ref]');
    var gsmEl = dialog.querySelector('[data-fabric-lb-gsm]');
    var countEl = dialog.querySelector('[data-fabric-lb-count]');
    var closeBtn = dialog.querySelector('[data-fabric-lb-close]');
    var imageEl = dialog.querySelector('[data-fabric-lb-image]');
    var kindEl = dialog.querySelector('[data-fabric-lb-kind]');
    var compEl = dialog.querySelector('[data-fabric-lb-composition]');
    var prevBtn = dialog.querySelector('[data-fabric-lb-prev]');
    var nextBtn = dialog.querySelector('[data-fabric-lb-next]');
    var navEl = dialog.querySelector('.ma-fabric-lightbox__nav');

    var activeTriggers = [];
    var currentIndex = 0;
    var activeTrigger = null;
    var backdropPointerDown = false;

    function visibleTriggers() {
      return Array.from(root.querySelectorAll('[data-fabric-lightbox-trigger]')).filter(function (trigger) {
        var card = trigger.closest('[data-fabric-card]');
        if (card && card.hidden) return false;
        var details = trigger.closest('details[data-fabric-more]');
        if (details && !details.open) return false;
        return true;
      });
    }

    function showAt(index) {
      if (!activeTriggers.length) return;
      currentIndex = Math.max(0, Math.min(index, activeTriggers.length - 1));
      var trigger = activeTriggers[currentIndex];
      var thumb = trigger.querySelector('img');
      refEl.textContent = trigger.dataset.lightboxRef || '';
      gsmEl.textContent = trigger.dataset.lightboxGsm || '';
      kindEl.textContent = trigger.dataset.lightboxKind || '';
      compEl.textContent = trigger.dataset.lightboxComposition || '';
      imageEl.alt = (thumb && thumb.alt) ? thumb.alt : '';
      imageEl.src = trigger.href;
      countEl.textContent = (currentIndex + 1) + ' / ' + activeTriggers.length;
      navEl.hidden = activeTriggers.length <= 1;

      var focused = document.activeElement;
      prevBtn.disabled = currentIndex === 0;
      nextBtn.disabled = currentIndex >= activeTriggers.length - 1;
      if (focused === prevBtn && prevBtn.disabled) {
        (nextBtn.disabled ? closeBtn : nextBtn).focus();
      } else if (focused === nextBtn && nextBtn.disabled) {
        (prevBtn.disabled ? closeBtn : prevBtn).focus();
      }
    }

    root.addEventListener('click', function (event) {
      var trigger = event.target.closest('[data-fabric-lightbox-trigger]');
      if (!trigger || !root.contains(trigger)) return;
      event.preventDefault();
      activeTriggers = visibleTriggers();
      var idx = activeTriggers.indexOf(trigger);
      if (idx === -1) {
        activeTriggers = [trigger];
        idx = 0;
      }
      activeTrigger = trigger;
      showAt(idx);
      dialog.showModal();
      closeBtn.focus();
    });

    closeBtn.addEventListener('click', function () { dialog.close(); });
    prevBtn.addEventListener('click', function () {
      if (currentIndex > 0) showAt(currentIndex - 1);
    });
    nextBtn.addEventListener('click', function () {
      if (currentIndex < activeTriggers.length - 1) showAt(currentIndex + 1);
    });

    dialog.addEventListener('pointerdown', function (event) {
      backdropPointerDown = event.target === dialog && !panel.contains(event.target);
    });
    dialog.addEventListener('click', function (event) {
      if (backdropPointerDown && event.target === dialog && !panel.contains(event.target)) {
        dialog.close();
      }
      backdropPointerDown = false;
    });
    dialog.addEventListener('keydown', function (event) {
      if (event.key === 'ArrowLeft' && currentIndex > 0) {
        event.preventDefault();
        showAt(currentIndex - 1);
      } else if (event.key === 'ArrowRight' && currentIndex < activeTriggers.length - 1) {
        event.preventDefault();
        showAt(currentIndex + 1);
      }
    });
    dialog.addEventListener('close', function () {
      imageEl.removeAttribute('src');
      if (activeTrigger && typeof activeTrigger.focus === 'function') {
        activeTrigger.focus({preventScroll: true});
      }
      activeTrigger = null;
      backdropPointerDown = false;
    });
  }

  function initialize() {
    document.querySelectorAll('[data-fabric-library]').forEach(function (root) {
      initializeLibrary(root);
      initializeLightbox(root);
    });
    document.querySelectorAll('[data-fabric-preview]').forEach(initializeLightbox);
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialize, {once: true});
  } else {
    initialize();
  }
})();
