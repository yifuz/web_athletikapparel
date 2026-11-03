/* Carry an approved product reference into the existing inquiry; never submit. */
(function () {
  'use strict';
  function fillProductReference() {
    var key = new URLSearchParams(window.location.search).get('product_example');
    var examples = window.maProductInquiryContext;
    if (!key || !examples || !Object.prototype.hasOwnProperty.call(examples, key)) return;
    var form = document.querySelector('form[data-form_id="3"]');
    if (!form) return;
    var message = form.querySelector('textarea[name="description"]');
    var category = form.querySelector('select[name="dropdown"]');
    // Preserve restored form content, drafts and browser autofill.
    if (!message || message.value.trim()) return;
    message.value = examples[key].message;
    message.dispatchEvent(new Event('input', { bubbles: true }));
    if (category && Array.from(category.options).some(function (option) {
      return option.value === examples[key].category;
    }) && Array.from(category.options).some(function (option) {
      return option.defaultSelected && option.value === category.value;
    })) {
      category.value = examples[key].category;
      category.dispatchEvent(new Event('change', { bubbles: true }));
    }
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fillProductReference, { once: true });
  else fillProductReference();
}());
