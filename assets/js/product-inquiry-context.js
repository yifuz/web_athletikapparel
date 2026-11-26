/* Carry an approved product reference into the existing inquiry; never submit. */
(function () {
  'use strict';
  function fillProductReference() {
    var params = new URLSearchParams(window.location.search);
    var key = params.get('product_example');
    var sampleKey = params.get('sample');
    var examples = window.maProductInquiryContext;
    var seasonal = window.maSeasonalInquiryContext;
    var record = null;
    if (key && examples && Object.prototype.hasOwnProperty.call(examples, key)) {
      record = examples[key];
    } else if (sampleKey && seasonal && Object.prototype.hasOwnProperty.call(seasonal, sampleKey)) {
      record = seasonal[sampleKey];
    }
    if (!record) return;
    var form = document.querySelector('form[data-form_id="3"]');
    if (!form) return;
    var message = form.querySelector('textarea[name="description"]');
    var category = form.querySelector('select[name="dropdown"]');
    // Preserve restored form content, drafts and browser autofill.
    if (!message || message.value.trim()) return;
    message.value = record.message;
    message.dispatchEvent(new Event('input', { bubbles: true }));
    if (category && Array.from(category.options).some(function (option) {
      return option.value === record.category;
    }) && Array.from(category.options).some(function (option) {
      return option.defaultSelected && option.value === category.value;
    })) {
      category.value = record.category;
      category.dispatchEvent(new Event('change', { bubbles: true }));
    }
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fillProductReference, { once: true });
  else fillProductReference();
}());
