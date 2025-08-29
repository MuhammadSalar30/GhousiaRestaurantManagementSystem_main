document.addEventListener('DOMContentLoaded', () => {
  const priceEl = document.getElementById('product-price');
  if (!priceEl) return;
  // Pull size-price mapping from dataset embedded on the page if present
  let sizes = {};
  try {
    const data = document.getElementById('product-price')?.dataset?.sizes;
    if (data) sizes = JSON.parse(data);
  } catch (e) {}

  const radios = document.querySelectorAll('input[name="size_option"]');
  radios.forEach((r) => r.addEventListener('change', (ev) => {
    const target = ev.currentTarget;
    const v = target && target.value ? target.value : '';
    if (v && sizes && sizes[v] != null) {
      priceEl.textContent = `PKR ${Number(sizes[v]).toLocaleString('en-PK', { maximumFractionDigits: 0 })}`;
    }
  }));
});

