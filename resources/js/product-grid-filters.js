document.addEventListener('DOMContentLoaded', () => {
  const qs = new URLSearchParams(window.location.search);
  const currentMin = parseInt(qs.get('min_price') || '0');
  const currentMax = parseInt(qs.get('max_price') || '5000');

  // Category checkboxes -> update categories query
  document.querySelectorAll('#all_categories input[type="checkbox"][id^="cat_"]').forEach((cb) => {
    cb.addEventListener('change', () => {
      const selected = Array.from(document.querySelectorAll('#all_categories input[id^="cat_"]:checked'))
        .map((el) => el.id.replace('cat_', ''));
      const min = document.getElementById('minCost')?.value || qs.get('min_price') || '0';
      const max = document.getElementById('maxCost')?.value || qs.get('max_price') || '5000';
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      params.set('categories', selected.join(','));
      params.set('min_price', String(min));
      params.set('max_price', String(max));
      url.search = params.toString();
      window.location.href = url.toString();
    });
  });

  // Price inputs -> apply on Enter or blur
  ['minCost','maxCost'].forEach((id) => {
    const el = document.getElementById(id);
    if (!el) return;
    const apply = () => {
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      const minVal = parseInt((document.getElementById('minCost')?.value || '0').trim());
      const maxVal = parseInt((document.getElementById('maxCost')?.value || '5000').trim());
      params.set('min_price', String(minVal));
      params.set('max_price', String(maxVal));
      // Snap radios to matching segment if exact match
      setActiveRadioByRange(minVal, maxVal);
      // keep selected categories
      const selected = Array.from(document.querySelectorAll('#all_categories input[id^="cat_"]:checked'))
        .map((x) => x.id.replace('cat_', ''));
      if (selected.length) params.set('categories', selected.join(','));
      url.search = params.toString();
      window.location.href = url.toString();
    };
    el.addEventListener('keydown', (e) => { if (e.key === 'Enter') apply(); });
    el.addEventListener('blur', apply);
  });

  // Price radio shortcuts
  const ranges = {
    all_price: [0, 5000],
    under_500: [0, 499],
    '500_1500': [500, 1500],
    '1500_3000': [1500, 3000],
    '3000_5000': [3000, 5000],
    '5000_plus': [5001, 1000000],
  };

  Object.entries(ranges).forEach(([id, [min, max]]) => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('change', () => {
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      params.set('min_price', String(min));
      params.set('max_price', String(max));
      // keep selected categories
      const selected = Array.from(document.querySelectorAll('#all_categories input[id^="cat_"]:checked'))
        .map((x) => x.id.replace('cat_', ''));
      if (selected.length) params.set('categories', selected.join(','));
      url.search = params.toString();
      window.location.href = url.toString();
    });
  });

  // Set the active radio based on current min/max on load
  function setActiveRadioByRange(min, max) {
    let matched = null;
    Object.entries(ranges).forEach(([id, [mi, ma]]) => {
      if (min === mi && max === ma) { matched = id; }
    });
    if (matched) {
      const el = document.getElementById(matched);
      if (el) el.checked = true;
    } else {
      // default to custom values → clear radios
      document.querySelectorAll('input[name="radio"]').forEach(r => r.checked = false);
    }
  }
  setActiveRadioByRange(currentMin, currentMax);

  // Search submit
  const searchForm = document.getElementById('gridSearchForm');
  if (searchForm) {
    searchForm.addEventListener('submit', function(e){
      e.preventDefault();
      const q = (document.getElementById('gridSearchInput')?.value || '').trim();
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      if (q) { params.set('q', q); } else { params.delete('q'); }
      params.set('page', '1');
      url.search = params.toString();
      window.location.href = url.toString();
    });
  }

  // Sort change
  window.applySort = function() {
    const el = document.getElementById('sortSelect');
    if (!el) return;
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    params.set('sort', el.value);
    params.set('page', '1');
    url.search = params.toString();
    window.location.href = url.toString();
  }
});

