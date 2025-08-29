/*
Template Name: Yum - Multipurpose Food Tailwind CSS Template
Version: 1.0
Author: coderthemes
Email: support@coderthemes.com
*/

import noUiSlider from 'nouislider';
import wNumb from 'wnumb';

const slider = document.getElementById('product-price-range');
const minCostInput = document.getElementById('minCost');
const maxCostInput = document.getElementById('maxCost');

// Helper: apply filters by updating URL params and reloading
function applyFilters(min, max) {
  try {
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    params.set('min_price', String(min));
    params.set('max_price', String(max));
    // Keep selected categories
    const selected = Array.from(document.querySelectorAll('#all_categories input[id^="cat_"]:checked']))
      .map((el) => el.id.replace('cat_', ''));
    if (selected.length) params.set('categories', selected.join(','));
    url.search = params.toString();
    window.location.href = url.toString();
  } catch (e) {
    console.error(e);
  }
}

if (slider && minCostInput && maxCostInput) {
  // Read initial values from inputs (provided by server via Blade)
  const initialMin = parseInt(minCostInput.value || '0', 10);
  const initialMax = parseInt(maxCostInput.value || '5000', 10);

  noUiSlider.create(slider, {
    start: [initialMin, initialMax], // Initialize from current query
    step: 50,
    margin: 100,
    connect: true,
    behaviour: 'tap-drag',
    range: { min: 0, max: 5000 },
    format: wNumb({ decimals: 0 })
  });

  // Keep inputs in sync while sliding
  slider.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxCostInput.value = values[handle];
    } else {
      minCostInput.value = values[handle];
    }
  });

  // On finish (user releases handle), apply filters
  slider.noUiSlider.on('change', function (values) {
    const [min, max] = values.map((v) => parseInt(String(v), 10));
    applyFilters(min, max);
  });

  // Inputs update slider and can apply on Enter/blur
  const setFromInputs = () => {
    const min = parseInt(minCostInput.value || '0', 10);
    const max = parseInt(maxCostInput.value || '5000', 10);
    slider.noUiSlider.set([min, max]);
  };

  minCostInput.addEventListener('change', setFromInputs);
  maxCostInput.addEventListener('change', setFromInputs);

  ;['keyup','blur'].forEach((evt) => {
    minCostInput.addEventListener(evt, (e) => {
      if (evt === 'blur' || (e instanceof KeyboardEvent && e.key === 'Enter')) {
        applyFilters(parseInt(minCostInput.value || '0', 10), parseInt(maxCostInput.value || '5000', 10));
      }
    });
    maxCostInput.addEventListener(evt, (e) => {
      if (evt === 'blur' || (e instanceof KeyboardEvent && e.key === 'Enter')) {
        applyFilters(parseInt(minCostInput.value || '0', 10), parseInt(maxCostInput.value || '5000', 10));
      }
    });
  });
}
