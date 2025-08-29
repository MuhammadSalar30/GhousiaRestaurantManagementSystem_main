document.addEventListener('DOMContentLoaded', () => {
  const qs = new URLSearchParams(window.location.search);

  // Category checkboxes -> update categories query
  document.querySelectorAll('#all_categories input[type="checkbox"][id^="cat_"]').forEach((cb) => {
    cb.addEventListener('change', () => {
      const selected = Array.from(document.querySelectorAll('#all_categories input[id^="cat_"]:checked'))
        .map((el) => el.id.replace('cat_', ''));
      const min = document.getElementById('minCost')?.value || qs.get('min_price') || '0';
      const max = document.getElementById('maxCost')?.value || qs.get('max_price') || '5000';
      const url = new URL(window.location.href);
      const params = new URLSearchParams(url.search);
      if (selected.length) {
        params.set('categories', selected.join(','));
      } else {
        params.delete('categories');
      }
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
      params.set('min_price', String((document.getElementById('minCost')?.value || '0')).trim());
      params.set('max_price', String((document.getElementById('maxCost')?.value || '5000')).trim());
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
});

