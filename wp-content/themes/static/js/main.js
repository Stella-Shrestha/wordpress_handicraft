/* ==========================================================================
   SHRESTHA HANDICRAFT — SACRED METALLURGY ATELIER (PATAN, NEPAL)
   Shared JavaScript Engine (Tailwind & Lucide Icons Integrated)
   ========================================================================== */

function getAssetUrl(path) {
  if (!path) return '';
  if (path.startsWith('http://') || path.startsWith('https://') || path.startsWith('data:')) {
    return path;
  }
  if (typeof window.shresthaData !== 'undefined' && window.shresthaData.themeUri) {
    var base = window.shresthaData.themeUri.replace(/\/$/, '');
    var cleanPath = path.replace(/^\//, '');
    return base + '/' + cleanPath;
  }
  return path;
}

// 1. SPECIMEN PRODUCTS CATALOG DATA
const PRODUCTS = [
  {
    id: 'SH-001',
    name: 'Green Tara — Mother of Liberation',
    alloy: 'Ashtadhatu (8-Metal) & 24K Gold Leaf',
    category: '24K Gold',
    height: '22.5 in (57.1 cm)',
    angula: '124 Angulas',
    weight: '14.2 kg',
    price: 14800,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/green_tara.jpg',
    desc: 'Seated gracefully on a double-lotus throne with right leg extended ready to leap to the aid of all beings. Adorned with turquoise and coral inlays, featuring cold-gold painted face.'
  },
  {
    id: 'SH-002',
    name: 'Shakyamuni Buddha: Earth-Touching Mudra',
    alloy: '24K Fire-Gilded Bronze',
    category: '24K Gold',
    height: '24.0 in (60.9 cm)',
    angula: '128 Angulas',
    weight: '16.5 kg',
    price: 16500,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/shakyamuni.jpg',
    desc: 'Cast according to 14th-century Licchavi proportions with sealed consecration chamber and traditional cold-gold facial painting.'
  },
  {
    id: 'SH-042',
    name: 'Shakyamuni Buddha',
    alloy: 'High-Copper Patina Bronze',
    category: 'Patina Bronze',
    height: '24.0 in (60.9 cm)',
    angula: '128 Angulas',
    weight: '21.0 kg',
    price: 12400,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/shakyamuni.jpg',
    desc: 'Seated in earth-touching mudra at Bodh Gaya. Antique dark patina bronze finish with fire-gilded gold face and incised monastic robes.'
  },
  {
    id: 'SH-108',
    name: 'Mahakala Six-Armed Wrathful Protector',
    alloy: 'Ashtadhatu (8-Metal)',
    category: 'Ashtadhatu',
    height: '18.0 in (45.7 cm)',
    angula: '108 Angulas',
    weight: '18.6 kg',
    price: 19500,
    status: 'FOUNDRY CRUCIBLE ACTIVE',
    img: 'assets/mahakala.jpg',
    desc: 'Wrathful guardian standing upon Ganesha, holding kapala skull cup, trident, and damaru drum. Flaming aura ring with master hand chiseling.'
  },
  {
    id: 'SH-204',
    name: 'Shakyamuni Buddha Bhumisparsha',
    alloy: 'Patina Bronze',
    category: 'Patina Bronze',
    height: '24.0 in (60.9 cm)',
    angula: '128 Angulas',
    weight: '21.0 kg',
    price: 12400,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/shakyamuni.jpg',
    desc: 'Seated in earth-touching mudra at Bodh Gaya. Antique dark patina bronze finish with fire-gilded gold face and incised monastic robes.'
  },
  {
    id: 'SH-305',
    name: 'Vajrasattva — Primordial Purity',
    alloy: '24K Pure Gold Gilded',
    category: '24K Gold',
    height: '16.5 in (41.9 cm)',
    angula: '96 Angulas',
    weight: '11.8 kg',
    price: 16200,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/green_tara.jpg',
    desc: 'Holding five-pointed vajra at heart and ghanta bell at hip. Full mercury fire gilding with burnished agate highlights.'
  },
  {
    id: 'SH-412',
    name: 'Chenrezig 1000-Armed Avalokiteshvara',
    alloy: 'Ashtadhatu (8-Metal)',
    category: 'Ashtadhatu',
    height: '28.0 in (71.1 cm)',
    angula: '144 Angulas',
    weight: '26.5 kg',
    price: 28900,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/mahakala.jpg',
    desc: 'Multi-headed deity of boundless compassion. 1000 arms radiating in a lotus circle, hand-cast using modular lost-wax clay pins.'
  },
  {
    id: 'SH-509',
    name: 'Manjushri Flame Sword of Wisdom',
    alloy: 'Patina Bronze',
    category: 'Patina Bronze',
    height: '14.0 in (35.5 cm)',
    angula: '84 Angulas',
    weight: '8.4 kg',
    price: 9800,
    status: 'AVAILABLE FOR ESCROW',
    img: 'assets/shakyamuni.jpg',
    desc: 'Wielding the flaming sword of discriminating wisdom to sever ignorance, holding the Prajnaparamita sutra text on a lotus.'
  }
];

// 2. DIGITAL LEDGER ORDERS DATABASE
const ORDERS_DB = {
  'SH-108': {
    orderId: 'SH-108',
    client: 'Sacred Art Institute of Kyoto',
    deity: 'Mahakala Six-Armed Wrathful Protector',
    sculptor: 'Master Rajan Tamrakar (42nd Gen)',
    targetDate: 'Sept 18, 2026',
    currentStage: 4,
    stages: [
      {
        num: 1,
        title: 'Beeswax Sculpting & Iconometry',
        desc: 'Formulation of sal resin and beeswax model according to 108 Angula proportion grid.',
        status: 'completed',
        stamp: 'VERIFIED - 108 ANGULAS PASS (May 12, 2026)'
      },
      {
        num: 2,
        title: 'Multi-Layer Clay Shelling',
        desc: '6 layers of Kathmandu red clay & rice husk binder applied over 45 days.',
        status: 'completed',
        stamp: 'PASSED - PATAN CLAY SHELL SEALED (June 28, 2026)'
      },
      {
        num: 3,
        title: 'Molten Ashtadhatu Pouring',
        desc: 'Wax melted out and molten 8-metal alloy poured at 1,080°C crucible temperature.',
        status: 'completed',
        stamp: 'CRUCIBLE TEMP 1,080°C CONFIRMED (July 15, 2026)'
      },
      {
        num: 4,
        title: 'Chiseling & Hand Detailing',
        desc: 'Cold chiseling of facial features, flame halo, and skull crown using 0.5mm tungsten steel punches.',
        status: 'current',
        stamp: 'IN PROGRESS - 82% COMPLETED (Aug 14, 2026)'
      },
      {
        num: 5,
        title: '24K Gold Leaf Gilding & Consecration',
        desc: 'Mercury fire gilding, agate stone burnishing, and monastic scroll sealing ritual.',
        status: 'pending',
        stamp: 'SCHEDULED - SEPT 10, 2026 RITUAL'
      }
    ]
  },
  'SH-109': {
    orderId: 'SH-109',
    client: 'Private Collection, Geneva',
    deity: 'Green Tara — Divine Mother',
    sculptor: 'Master Suresh Tamrakar',
    targetDate: 'Oct 05, 2026',
    currentStage: 2,
    stages: [
      {
        num: 1,
        title: 'Beeswax Sculpting & Iconometry',
        desc: 'Hand-sculpted beeswax model with delicate lotus flower stems.',
        status: 'completed',
        stamp: 'VERIFIED - ANGULA TENSION OK (June 01, 2026)'
      },
      {
        num: 2,
        title: 'Multi-Layer Clay Shelling',
        desc: 'Applying 4th layer of Patan silt and husk slurry.',
        status: 'current',
        stamp: 'IN PROGRESS - LAYER 4 DRYING (Aug 10, 2026)'
      },
      {
        num: 3,
        title: 'Molten Ashtadhatu Pouring',
        desc: 'Crucible casting scheduled.',
        status: 'pending',
        stamp: 'FOUNDRY SLOT #2'
      },
      {
        num: 4,
        title: 'Chiseling & Hand Detailing',
        desc: 'Cold chiseling.',
        status: 'pending',
        stamp: 'PENDING'
      },
      {
        num: 5,
        title: '24K Gold Leaf Gilding & Consecration',
        desc: 'Fire gilding & consecration.',
        status: 'pending',
        stamp: 'PENDING'
      }
    ]
  },
  'SH-204': {
    orderId: 'SH-204',
    client: 'Bodh Gaya Heritage Foundation',
    deity: 'Shakyamuni Buddha Bhumisparsha',
    sculptor: 'Master Rajan Tamrakar',
    targetDate: 'Completed',
    currentStage: 5,
    stages: [
      {
        num: 1,
        title: 'Beeswax Sculpting & Iconometry',
        desc: 'Beeswax modeling.',
        status: 'completed',
        stamp: 'VERIFIED'
      },
      {
        num: 2,
        title: 'Multi-Layer Clay Shelling',
        desc: 'Clay shelling.',
        status: 'completed',
        stamp: 'PASSED'
      },
      {
        num: 3,
        title: 'Molten Ashtadhatu Pouring',
        desc: 'Ashtadhatu pouring.',
        status: 'completed',
        stamp: 'PASSED'
      },
      {
        num: 4,
        title: 'Chiseling & Hand Detailing',
        desc: 'Hand chiseling.',
        status: 'completed',
        stamp: 'PASSED'
      },
      {
        num: 5,
        title: '24K Gold Leaf Gilding & Consecration',
        desc: 'Full consecration completed.',
        status: 'completed',
        stamp: 'CONSECRATED & SEALED'
      }
    ]
  }
};

// 3. LIGHT / DARK THEME SYSTEM (TAILWIND CLASS TOGGLE)
let inMemoryCart = [];
let inMemoryTheme = 'dark';

function safeGetStorage(key, fallback) {
  try {
    const val = localStorage.getItem(key);
    return val !== null ? val : fallback;
  } catch (e) {
    if (key === 'sh_theme') return inMemoryTheme;
    return fallback;
  }
}

function safeSetStorage(key, val) {
  try {
    localStorage.setItem(key, val);
  } catch (e) {
    if (key === 'sh_theme') inMemoryTheme = val;
  }
}

function initTheme() {
  const savedTheme = safeGetStorage('sh_theme', 'dark');
  setTheme(savedTheme);
}

function toggleTheme() {
  const isDark = document.documentElement.classList.contains('dark');
  const newTheme = isDark ? 'light' : 'dark';
  setTheme(newTheme);
}

function setTheme(theme) {
  if (theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  }
  safeSetStorage('sh_theme', theme);

  const iconEls = document.querySelectorAll('#themeToggleIcon, #mobileThemeToggleIcon, .themeToggleBtn');
  iconEls.forEach(iconEl => {
    if (theme === 'light') {
      iconEl.innerHTML = `<i data-lucide="moon" class="w-5 h-5 text-gold-dark"></i>`;
      iconEl.setAttribute('title', 'Switch to Dark Mode');
    } else {
      iconEl.innerHTML = `<i data-lucide="sun" class="w-5 h-5 text-gold"></i>`;
      iconEl.setAttribute('title', 'Switch to Light Mode');
    }
  });
  renderIcons();
}

// 4. PERSISTENT ACQUISITION CART STATE
function getCart() {
  try {
    const raw = localStorage.getItem('sh_cart');
    if (raw) return JSON.parse(raw);
    return inMemoryCart;
  } catch (e) {
    return inMemoryCart;
  }
}

function saveCart(cart) {
  inMemoryCart = cart;
  safeSetStorage('sh_cart', JSON.stringify(cart));
  updateCartUI();
}

// TOAST NOTIFICATION ENGINE
function showToast(message) {
  let toastContainer = document.getElementById('shToastContainer');
  if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.id = 'shToastContainer';
    toastContainer.className = 'fixed top-5 right-5 z-[9999] flex flex-col gap-2 pointer-events-none';
    document.body.appendChild(toastContainer);
  }

  const toast = document.createElement('div');
  toast.className = 'bg-[#0d131d] dark:bg-patina-900 border border-gold/60 text-parchment px-4 py-3 rounded-xl shadow-2xl font-mono text-xs flex items-center gap-3 transform translate-y-[-10px] opacity-0 transition-all duration-300 pointer-events-auto max-w-sm';
  toast.innerHTML = `
    <span class="w-2.5 h-2.5 rounded-full bg-gold animate-ping shrink-0"></span>
    <div class="flex flex-col">
      <span class="font-bold text-gold text-[10px] uppercase tracking-wider">Acquisition Drawer Updated</span>
      <span class="text-slate-200 text-xs">${message}</span>
    </div>
  `;

  toastContainer.appendChild(toast);

  requestAnimationFrame(() => {
    toast.classList.remove('translate-y-[-10px]', 'opacity-0');
    toast.classList.add('translate-y-0', 'opacity-100');
  });

  setTimeout(() => {
    toast.classList.remove('translate-y-0', 'opacity-100');
    toast.classList.add('translate-y-[-10px]', 'opacity-0');
    setTimeout(() => {
      if (toast.parentNode) toast.parentNode.removeChild(toast);
    }, 300);
  }, 3200);
}

function addToCartByProdId(prodId, btnEl) {
  if (!prodId || prodId === 'undefined') prodId = 'SH-001';
  
  // 1. Direct search in PRODUCTS
  let p = PRODUCTS.find(x => x.id === prodId || (x.id && x.id.toLowerCase() === String(prodId).toLowerCase()));

  // 2. Search in localized WordPress backend specimens
  if (!p && typeof window.shresthaData !== 'undefined' && window.shresthaData.specimens) {
    if (window.shresthaData.specimens[prodId]) {
      const sp = window.shresthaData.specimens[prodId];
      p = {
        id: String(sp.sku || prodId),
        name: sp.name || `Sacred Specimen #${prodId}`,
        alloy: sp.alloy || 'Ashtadhatu (8-Metal)',
        price: Number(sp.price) || 4200,
        img: sp.image || 'assets/green_tara.jpg',
        desc: sp.excerpt || '',
        height: sp.height || '22.5 in (57.1 cm)',
        weight: sp.weight || '14.2 kg'
      };
    }
  }

  // 3. Extract from clicking button / card element context
  if (!p && btnEl) {
    const card = btnEl.closest('.specimen-card') || btnEl.closest('[data-sku]') || btnEl.parentElement?.parentElement;
    if (card) {
      const cardTitle = card.getAttribute('data-name') || card.querySelector('h3, h2, h1')?.innerText?.trim() || `Sacred Specimen #${prodId}`;
      const rawPrice = card.getAttribute('data-price') || card.querySelector('.text-gold, .text-amber-600, .font-mono')?.innerText?.replace(/[^0-9.]/g, '') || '4200';
      const cardPrice = parseFloat(rawPrice) || 4200;
      const cardAlloy = card.getAttribute('data-alloys') || card.querySelector('.font-mono')?.innerText?.trim() || '8-Metal Ashtadhatu Alloy';
      const cardImg = card.querySelector('img')?.src || 'assets/green_tara.jpg';

      p = {
        id: String(prodId),
        name: cardTitle,
        alloy: cardAlloy,
        price: cardPrice,
        img: cardImg,
        qty: 1
      };
    }
  }

  // 4. Scrape by querySelector in DOM
  if (!p) {
    const card = document.querySelector(`[data-sku="${prodId}"]`) || 
                 document.querySelector(`.specimen-card[data-sku="${prodId}"]`);
    if (card) {
      const cardTitle = card.getAttribute('data-name') || card.querySelector('h3, h2, h1')?.innerText?.trim() || `Sacred Specimen #${prodId}`;
      const rawPrice = card.getAttribute('data-price') || card.querySelector('.text-gold, .text-amber-600, .font-mono')?.innerText?.replace(/[^0-9.]/g, '') || '4200';
      const cardPrice = parseFloat(rawPrice) || 4200;
      const cardAlloy = card.getAttribute('data-alloys') || card.querySelector('.font-mono')?.innerText?.trim() || '8-Metal Ashtadhatu Alloy';
      const cardImg = card.querySelector('img')?.src || 'assets/green_tara.jpg';

      p = {
        id: String(prodId),
        name: cardTitle,
        alloy: cardAlloy,
        price: cardPrice,
        img: cardImg,
        qty: 1
      };
    } else {
      // Fallback from active page or generic specimen
      const pageTitle = document.querySelector('h1')?.innerText?.trim();
      const pageImg = document.querySelector('.bg-black img, main img, img')?.src;
      const pagePriceEl = document.querySelector('.text-3xl.font-bold.text-gold, .text-gold');
      const pagePrice = pagePriceEl ? (parseFloat(pagePriceEl.innerText.replace(/[^0-9.]/g, '')) || 4200) : 4200;

      p = {
        id: String(prodId),
        name: pageTitle || `Sacred Specimen #${prodId}`,
        alloy: '8-Metal Ashtadhatu Sacred Alloy',
        price: pagePrice,
        img: pageImg || 'assets/green_tara.jpg',
        qty: 1
      };
    }
  }

  const cart = getCart();
  const existing = cart.find(ci => String(ci.id).toLowerCase() === String(p.id).toLowerCase());
  if (existing) {
    existing.qty += 1;
    existing.selected = true;
  } else {
    cart.push({
      id: p.id,
      name: p.name,
      alloy: p.alloy || 'Ashtadhatu (8-Metal)',
      price: Number(p.price) || 0,
      img: getAssetUrl(p.img),
      qty: 1,
      selected: true
    });
  }

  saveCart(cart);

  // Button visual feedback animation
  if (btnEl && btnEl.tagName) {
    const originalText = btnEl.innerHTML;
    btnEl.innerHTML = `<span class="flex items-center justify-center gap-1.5 text-emerald-400 font-bold">✓ ADDED</span>`;
    btnEl.classList.add('ring-2', 'ring-gold');
    setTimeout(() => {
      btnEl.innerHTML = originalText;
      btnEl.classList.remove('ring-2', 'ring-gold');
    }, 1200);
  }

  // Toast confirmation
  showToast(`${p.name} added to acquisitions.`);

  // Open Acquisition Drawer
  const overlay = document.getElementById('cartOverlay');
  if (overlay) {
    overlay.classList.remove('hidden');
    overlay.classList.add('flex');
    overlay.style.display = 'flex';
  }
}

function removeFromCart(id) {
  let cart = getCart();
  cart = cart.filter(item => item.id !== id);
  saveCart(cart);
}

function increaseQty(id) {
  const cart = getCart();
  const item = cart.find(x => x.id === id);
  if (item) {
    item.qty += 1;
    saveCart(cart);
  }
}

function decreaseQty(id) {
  let cart = getCart();
  const item = cart.find(x => x.id === id);
  if (item) {
    if (item.qty > 1) {
      item.qty -= 1;
    } else {
      cart = cart.filter(x => x.id !== id);
    }
    saveCart(cart);
  }
}

function toggleCartItemSelection(id, isSelected) {
  const cart = getCart();
  const item = cart.find(x => String(x.id).toLowerCase() === String(id).toLowerCase());
  if (item) {
    item.selected = !!isSelected;
    saveCart(cart);
  }
}

function toggleSelectAllCart(selectAll) {
  const cart = getCart();
  cart.forEach(item => {
    item.selected = !!selectAll;
  });
  saveCart(cart);
}

function removeSelectedCartItems() {
  const cart = getCart();
  const selectedCount = cart.filter(i => i.selected !== false).length;
  if (selectedCount === 0) return;
  if (confirm(`Remove ${selectedCount} selected item${selectedCount > 1 ? 's' : ''} from acquisition drawer?`)) {
    const remaining = cart.filter(i => i.selected === false);
    saveCart(remaining);
  }
}

function toggleCartDrawer() {
  const overlay = document.getElementById('cartOverlay');
  if (overlay) {
    const isHidden = overlay.classList.contains('hidden') || overlay.style.display === 'none';
    if (isHidden) {
      overlay.classList.remove('hidden');
      overlay.classList.add('flex');
      overlay.style.display = 'flex';
    } else {
      overlay.classList.add('hidden');
      overlay.classList.remove('flex');
      overlay.style.display = 'none';
    }
  }
}

function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  const icon = document.getElementById('hamburgerIcon');
  if (menu) {
    const isHidden = menu.classList.contains('hidden');
    if (isHidden) {
      menu.classList.remove('hidden');
      if (icon) icon.setAttribute('data-lucide', 'x');
    } else {
      menu.classList.add('hidden');
      if (icon) icon.setAttribute('data-lucide', 'menu');
    }
    renderIcons();
  }
}

function closeCartOnOverlay(e) {
  if (e && e.target && e.target.id === 'cartOverlay') {
    const overlay = document.getElementById('cartOverlay');
    if (overlay) {
      overlay.classList.add('hidden');
      overlay.classList.remove('flex');
      overlay.style.display = 'none';
    }
  }
}

function closeSpecimenOnOverlay(e) {
  if (e.target.id === 'specimenModal') {
    closeSpecimenModal();
  }
}

function closeReviewOnOverlay(e) {
  if (e.target.id === 'reviewModal') {
    closeReviewModal();
  }
}

function updateCartUI() {
  const cart = getCart();
  const countEls = document.querySelectorAll('#cartCount, #mobileCartCount, .cartCount');
  const totalQty = cart.reduce((acc, i) => acc + i.qty, 0);
  countEls.forEach(countEl => {
    countEl.innerText = totalQty;
  });

  const bodyEl = document.getElementById('cartBody');
  const toolbarEl = document.getElementById('cartToolbar');
  const selectAllEl = document.getElementById('cartSelectAll');
  const selectedCountEl = document.getElementById('cartSelectedCount');
  const selectedSubtotalCountEl = document.getElementById('cartSelectedSubtotalCount');
  const removeSelectedBtn = document.getElementById('removeSelectedBtn');
  const subtotalEl = document.getElementById('cartSubtotal');
  const totalEl = document.getElementById('cartTotal');
  const checkoutBtn = document.getElementById('cartCheckoutBtn');

  if (cart.length === 0) {
    if (toolbarEl) toolbarEl.style.display = 'none';
    if (bodyEl) {
      bodyEl.innerHTML = `
        <div class="text-center py-12 px-4 text-slate-400 dark:text-slate-500 font-mono text-sm">
          NO STATUARY SPECIMENS IN ACQUISITION DRAWER.
        </div>
      `;
    }
    if (subtotalEl) subtotalEl.innerText = '$0 USD';
    if (totalEl) totalEl.innerText = '$0 USD';
    if (selectedSubtotalCountEl) selectedSubtotalCountEl.innerText = '0';
    if (checkoutBtn) {
      checkoutBtn.disabled = true;
      checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
      checkoutBtn.innerText = 'Acquisition Drawer Empty';
    }
    return;
  }

  if (toolbarEl) toolbarEl.style.display = 'flex';

  const selectedItems = cart.filter(i => i.selected !== false);
  const selectedCount = selectedItems.length;
  const allSelected = cart.length > 0 && selectedCount === cart.length;

  if (selectAllEl) {
    selectAllEl.checked = allSelected;
    selectAllEl.indeterminate = selectedCount > 0 && !allSelected;
  }

  if (selectedCountEl) {
    selectedCountEl.innerText = `(${selectedCount} of ${cart.length} selected)`;
  }
  if (selectedSubtotalCountEl) {
    selectedSubtotalCountEl.innerText = selectedCount;
  }

  if (removeSelectedBtn) {
    if (selectedCount > 0) {
      removeSelectedBtn.classList.remove('hidden');
      removeSelectedBtn.innerText = `Remove Selected (${selectedCount})`;
    } else {
      removeSelectedBtn.classList.add('hidden');
    }
  }

  let selectedSubtotal = 0;
  if (bodyEl) {
    bodyEl.innerHTML = cart.map(item => {
      const isSelected = item.selected !== false;
      const itemTotal = item.price * item.qty;
      if (isSelected) {
        selectedSubtotal += itemTotal;
      }
      const itemImg = getAssetUrl(item.img);
      return `
        <div class="flex items-center gap-3 p-3 bg-white dark:bg-patina-900 border ${isSelected ? 'border-gold/60 shadow-sm ring-1 ring-gold/20' : 'border-slate-200 dark:border-slate-800 opacity-60'} rounded-lg relative transition-all">
          <input type="checkbox"
            class="cart-item-checkbox w-4 h-4 rounded border-slate-300 dark:border-slate-700 text-amber-600 dark:text-gold accent-amber-600 dark:accent-gold cursor-pointer shrink-0"
            data-id="${item.id}"
            ${isSelected ? 'checked' : ''}
            onchange="toggleCartItemSelection('${item.id}', this.checked)"
            aria-label="Select ${item.name}" />
          <img class="w-16 h-16 object-cover rounded bg-black shrink-0" src="${itemImg}" alt="${item.name}" />
          <div class="flex-1 flex flex-col gap-1 min-w-0">
            <div class="font-display font-semibold text-sm text-slate-900 dark:text-parchment truncate">${item.name}</div>
            <div class="font-mono text-xs text-slate-500 dark:text-slate-400 truncate">${item.alloy}</div>
            <div class="flex items-center justify-between mt-1">
              <div class="flex items-center border border-slate-200 dark:border-slate-700 rounded bg-slate-50 dark:bg-patina-950">
                <button onclick="decreaseQty('${item.id}')" class="px-2.5 py-0.5 text-xs text-slate-600 dark:text-slate-300 hover:text-gold font-bold" aria-label="Decrease quantity">-</button>
                <span class="px-2 text-xs font-mono font-bold text-slate-900 dark:text-parchment">${item.qty}</span>
                <button onclick="increaseQty('${item.id}')" class="px-2.5 py-0.5 text-xs text-slate-600 dark:text-slate-300 hover:text-gold font-bold" aria-label="Increase quantity">+</button>
              </div>
              <div class="font-mono font-bold text-sm text-amber-600 dark:text-gold">$${itemTotal.toLocaleString()} USD</div>
            </div>
          </div>
          <button onclick="removeFromCart('${item.id}')" class="text-slate-400 hover:text-red-500 text-xs p-1 transition-colors shrink-0" title="Remove item" aria-label="Remove item">
            <i data-lucide="x" class="w-4 h-4"></i>
          </button>
        </div>
      `;
    }).join('');
  }

  if (subtotalEl) subtotalEl.innerText = `$${selectedSubtotal.toLocaleString()} USD`;
  if (totalEl) totalEl.innerText = `$${selectedSubtotal.toLocaleString()} USD`;

  if (checkoutBtn) {
    if (selectedCount === 0) {
      checkoutBtn.disabled = true;
      checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
      checkoutBtn.innerText = 'Select Specimens to Acquire';
    } else {
      checkoutBtn.disabled = false;
      checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
      checkoutBtn.innerText = `Initiate Escrow Acquisition (${selectedCount})`;
    }
  }

  renderIcons();
}

// 5. SPECIMEN INSPECTION MODAL
function openSpecimenModalByProdId(prodId) {
  if (!prodId) prodId = 'SH-001';
  let p = PRODUCTS.find(x => x.id === prodId || (x.id && x.id.toLowerCase() === String(prodId).toLowerCase()));

  if (!p) {
    const card = document.querySelector(`[data-sku="${prodId}"]`) || 
                 document.querySelector(`.specimen-card[data-sku="${prodId}"]`);
    if (card) {
      const cardTitle = card.getAttribute('data-name') || card.querySelector('h3, h2, h1')?.innerText?.trim() || `Specimen #${prodId}`;
      const rawPrice = card.getAttribute('data-price') || card.querySelector('.text-gold, .text-amber-600')?.innerText?.replace(/[^0-9.]/g, '') || '4200';
      const cardPrice = parseFloat(rawPrice) || 4200;
      const cardAlloy = card.getAttribute('data-alloys') || card.querySelector('.font-mono')?.innerText?.trim() || 'Ashtadhatu (8-Metal)';
      const cardImg = card.querySelector('img')?.src || 'assets/green_tara.jpg';
      const cardDesc = card.querySelector('p')?.innerText?.trim() || 'Hand-cast using lost-wax iconometry from Ashtadhatu alloy with fire gilding.';
      
      p = {
        id: String(prodId),
        name: cardTitle,
        alloy: cardAlloy,
        price: cardPrice,
        img: cardImg,
        desc: cardDesc,
        height: '22.5 in (57.1 cm)',
        angula: '124 Angulas',
        weight: '14.2 kg'
      };
    } else {
      p = {
        id: String(prodId),
        name: `Sacred Specimen #${prodId}`,
        alloy: 'Ashtadhatu (8-Metal)',
        price: 4200,
        img: 'assets/green_tara.jpg',
        desc: 'Hand-cast using lost-wax iconometry from Ashtadhatu alloy with fire gilding.',
        height: '24.0 in (60.9 cm)',
        angula: '128 Angulas',
        weight: '18.5 kg'
      };
    }
  }

  const modal = document.getElementById('specimenModal');
  if (!modal) return;

  const modalImg = document.getElementById('modalImg');
  const modalSpecTag = document.getElementById('modalSpecTag');
  const modalTitle = document.getElementById('modalTitle');
  const modalDesc = document.getElementById('modalDesc');
  const modalAlloy = document.getElementById('modalAlloy');
  const modalHeight = document.getElementById('modalHeight');
  const modalWeight = document.getElementById('modalWeight');
  const modalPrice = document.getElementById('modalPrice');

  if (modalImg) modalImg.src = getAssetUrl(p.img);
  if (modalSpecTag) modalSpecTag.innerText = `SPECIMEN #${p.id}`;
  if (modalTitle) modalTitle.innerText = p.name;
  if (modalDesc) modalDesc.innerText = p.desc || '';
  if (modalAlloy) modalAlloy.innerText = p.alloy || 'Ashtadhatu (8-Metal)';
  if (modalHeight) modalHeight.innerText = p.height ? (p.angula ? `${p.height} (${p.angula})` : p.height) : '24.0 in (61 cm)';
  if (modalWeight) modalWeight.innerText = p.weight || '14.2 kg';
  if (modalPrice) modalPrice.innerText = `$${Number(p.price).toLocaleString()} USD`;

  const acquireBtn = document.getElementById('modalAcquireBtn');
  if (acquireBtn) {
    acquireBtn.onclick = () => {
      addToCartByProdId(p.id);
      closeSpecimenModal();
    };
  }

  const bookBtn = document.getElementById('modalBookBtn');
  if (bookBtn) {
    bookBtn.onclick = () => {
      closeSpecimenModal();
      bookNowByProdId(p.id);
    };
  }

  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeSpecimenModal() {
  const modal = document.getElementById('specimenModal');
  if (modal) {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
}

// 5b. BOOK NOW & ATELIER RESERVATION MODAL
function bookNowByProdId(prodId) {
  if (!prodId) prodId = 'SH-001';
  let p = PRODUCTS.find(x => x.id === prodId || (x.id && x.id.toLowerCase() === String(prodId).toLowerCase()));

  if (!p) {
    const card = document.querySelector(`[data-sku="${prodId}"]`) || 
                 document.querySelector(`.specimen-card[data-sku="${prodId}"]`);
    if (card) {
      const cardTitle = card.getAttribute('data-name') || card.querySelector('h3, h2, h1')?.innerText?.trim() || `Specimen #${prodId}`;
      const cardAlloy = card.getAttribute('data-alloys') || card.querySelector('.font-mono')?.innerText?.trim() || 'Ashtadhatu (8-Metal)';
      p = { id: String(prodId), name: cardTitle, alloy: cardAlloy };
    } else {
      p = { id: String(prodId), name: `Sacred Specimen #${prodId}`, alloy: 'Ashtadhatu (8-Metal)' };
    }
  }

  const bookingModal = document.getElementById('bookingModal');
  if (bookingModal) {
    const skuInput = document.getElementById('bookingSkuInput');
    const deityInput = document.getElementById('bookingDeityInput');
    const titleSpan = document.getElementById('bookingModalDeityName');
    const skuSpan = document.getElementById('bookingModalSku');
    
    if (skuInput) skuInput.value = p.id;
    if (deityInput) deityInput.value = p.name;
    if (titleSpan) titleSpan.innerText = p.name;
    if (skuSpan) skuSpan.innerText = p.id;
    
    bookingModal.classList.remove('hidden');
    bookingModal.classList.add('flex');
    if (typeof renderIcons === 'function') renderIcons();
  } else {
    var siteUrl = (typeof window.shresthaData !== 'undefined' && window.shresthaData.siteUrl) ? window.shresthaData.siteUrl : '';
    window.location.href = (siteUrl ? siteUrl.replace(/\/$/, '') : '') + '/contact/?inquiry=booking&sku=' + encodeURIComponent(p.id);
  }
}

function closeBookingModal() {
  const modal = document.getElementById('bookingModal');
  if (modal) {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
}

function closeBookingOnOverlay(e) {
  if (e && e.target && e.target.id === 'bookingModal') {
    closeBookingModal();
  }
}

function handleBookingSubmit(e) {
  e.preventDefault();
  const form = e.target;
  const deity = document.getElementById('bookingDeityInput')?.value || 'Sacred Specimen';
  showToast(`Inquiry for "${deity}" received. Our Master Curator will contact you shortly.`);
  form.reset();
  closeBookingModal();
}

// 6. CHECKOUT MODAL MOCK
function triggerCheckoutModal() {
  const cart = getCart();
  if (cart.length === 0) {
    alert('Your acquisition drawer is empty.');
    return;
  }
  const selectedItems = cart.filter(i => i.selected !== false);
  if (selectedItems.length === 0) {
    alert('Please select at least one statuary specimen to initiate escrow acquisition.');
    return;
  }
  const total = document.getElementById('cartTotal')?.innerText || '$0 USD';
  const count = selectedItems.length;
  alert(`Escrow Protocol Initiated for ${count} selected acquisition${count > 1 ? 's' : ''} (Total: ${total}).\n\nA Patan Atelier Concierge will issue your bank wire escrow contract & certified SPECTROMETRY assay via email.`);
  const remaining = cart.filter(i => i.selected === false);
  saveCart(remaining);
  toggleCartDrawer();
}

// 7. PATRON REVIEWS SLIDER ENGINE
let reviewCurrentIndex = 0;
let reviewAutoplayInterval = null;

function initReviewsSlider() {
  const track = document.getElementById('reviewsTrack');
  if (!track) return;

  const cards = track.children;
  const totalCards = cards.length;
  if (totalCards === 0) return;

  const prevBtn = document.getElementById('prevReviewBtn');
  const nextBtn = document.getElementById('nextReviewBtn');
  const dotsContainer = document.getElementById('reviewDots');
  const counterEl = document.getElementById('reviewCounter');
  const autoplayBtn = document.getElementById('autoplayReviewBtn');
  const mobileIndicators = document.querySelectorAll('.review-indicator');

  function getCardsPerView() {
    if (window.innerWidth >= 1024) return 3;
    if (window.innerWidth >= 768) return 2;
    return 1;
  }

  function getMaxIndex() {
    const cardsPerView = getCardsPerView();
    return Math.max(0, totalCards - cardsPerView);
  }

  function updateSliderPosition() {
    const cardsPerView = getCardsPerView();
    const maxIdx = getMaxIndex();
    if (reviewCurrentIndex > maxIdx) reviewCurrentIndex = maxIdx;
    if (reviewCurrentIndex < 0) reviewCurrentIndex = 0;

    const percentage = (100 / cardsPerView) * reviewCurrentIndex;
    track.style.transform = `translateX(-${percentage}%)`;

    if (counterEl) {
      const currentFormatted = String(reviewCurrentIndex + 1).padStart(2, '0');
      const totalFormatted = String(totalCards).padStart(2, '0');
      counterEl.innerText = `${currentFormatted} / ${totalFormatted}`;
    }

    if (prevBtn) {
      prevBtn.style.opacity = (maxIdx === 0) ? '0.4' : '1';
      prevBtn.style.pointerEvents = (maxIdx === 0) ? 'none' : 'auto';
    }
    if (nextBtn) {
      nextBtn.style.opacity = (maxIdx === 0) ? '0.4' : '1';
      nextBtn.style.pointerEvents = (maxIdx === 0) ? 'none' : 'auto';
    }

    if (dotsContainer) {
      dotsContainer.innerHTML = '';
      const numDots = maxIdx + 1;
      for (let i = 0; i < numDots; i++) {
        const dot = document.createElement('button');
        dot.className = `h-2 rounded-full transition-all duration-300 ${i === reviewCurrentIndex
            ? 'w-7 bg-gold shadow-sm'
            : 'w-2 bg-slate-300 dark:bg-slate-700 hover:bg-gold/50'
          }`;
        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
        dot.onclick = () => {
          reviewCurrentIndex = i;
          updateSliderPosition();
        };
        dotsContainer.appendChild(dot);
      }
    }

    if (mobileIndicators && mobileIndicators.length > 0) {
      mobileIndicators.forEach((ind, i) => {
        if (i === reviewCurrentIndex) {
          ind.classList.add('bg-gold', 'w-7');
          ind.classList.remove('bg-slate-300', 'dark:bg-slate-700', 'w-2.5');
        } else {
          ind.classList.remove('bg-gold', 'w-7');
          ind.classList.add('bg-slate-300', 'dark:bg-slate-700', 'w-2.5');
        }
      });
    }
  }

  if (mobileIndicators && mobileIndicators.length > 0) {
    mobileIndicators.forEach((ind, i) => {
      ind.onclick = (e) => {
        e.preventDefault();
        const maxIdx = getMaxIndex();
        reviewCurrentIndex = Math.min(i, maxIdx);
        updateSliderPosition();
      };
    });
  }

  if (prevBtn) {
    prevBtn.onclick = (e) => {
      if (e) e.preventDefault();
      const maxIdx = getMaxIndex();
      if (maxIdx <= 0) return;
      if (reviewCurrentIndex > 0) {
        reviewCurrentIndex--;
      } else {
        reviewCurrentIndex = maxIdx;
      }
      updateSliderPosition();
    };
  }

  if (nextBtn) {
    nextBtn.onclick = (e) => {
      if (e) e.preventDefault();
      const maxIdx = getMaxIndex();
      if (maxIdx <= 0) return;
      if (reviewCurrentIndex < maxIdx) {
        reviewCurrentIndex++;
      } else {
        reviewCurrentIndex = 0;
      }
      updateSliderPosition();
    };
  }

  let isAutoplay = true;
  function startAutoplay() {
    stopAutoplay();
    const maxIdx = getMaxIndex();
    if (maxIdx <= 0) return;
    reviewAutoplayInterval = setInterval(() => {
      const max = getMaxIndex();
      if (max <= 0) return;
      reviewCurrentIndex = (reviewCurrentIndex >= max) ? 0 : reviewCurrentIndex + 1;
      updateSliderPosition();
    }, 4500);
  }

  function stopAutoplay() {
    if (reviewAutoplayInterval) clearInterval(reviewAutoplayInterval);
  }

  if (autoplayBtn) {
    autoplayBtn.onclick = () => {
      isAutoplay = !isAutoplay;
      if (isAutoplay) {
        startAutoplay();
        autoplayBtn.innerHTML = `<i data-lucide="pause" class="w-4 h-4"></i>`;
        autoplayBtn.setAttribute('title', 'Pause Autoplay');
      } else {
        stopAutoplay();
        autoplayBtn.innerHTML = `<i data-lucide="play" class="w-4 h-4"></i>`;
        autoplayBtn.setAttribute('title', 'Start Autoplay');
      }
      renderIcons();
    };
  }

  // Touch Swipe Support
  let startX = 0;
  let isDragging = false;

  track.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
    isDragging = true;
    stopAutoplay();
  }, { passive: true });

  track.addEventListener('touchend', (e) => {
    if (!isDragging) return;
    isDragging = false;
    const endX = e.changedTouches[0].clientX;
    const diffX = startX - endX;
    const maxIdx = getMaxIndex();

    if (Math.abs(diffX) > 40 && maxIdx > 0) {
      if (diffX > 0) {
        reviewCurrentIndex = (reviewCurrentIndex < maxIdx) ? reviewCurrentIndex + 1 : 0;
      } else {
        reviewCurrentIndex = (reviewCurrentIndex > 0) ? reviewCurrentIndex - 1 : maxIdx;
      }
      updateSliderPosition();
    }
    if (isAutoplay) startAutoplay();
  }, { passive: true });

  const sliderContainer = document.getElementById('reviewsSliderContainer');
  if (sliderContainer) {
    sliderContainer.addEventListener('mouseenter', stopAutoplay);
    sliderContainer.addEventListener('mouseleave', () => {
      if (isAutoplay) startAutoplay();
    });
  }

  window.addEventListener('resize', updateSliderPosition);
  updateSliderPosition();
  if (isAutoplay) startAutoplay();
}

// 8. PATRON REVIEW MODAL HANDLERS
function openReviewModal() {
  const modal = document.getElementById('reviewModal');
  if (modal) {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }
}

function closeReviewModal() {
  const modal = document.getElementById('reviewModal');
  if (modal) {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
}

function handleReviewSubmit(e) {
  e.preventDefault();
  alert('Thank you! Your patron testimonial has been recorded and submitted for monastic verification into the Patan Atelier Ledger.');
  closeReviewModal();
  if (e.target) e.target.reset();
}

function handleContactSubmit(e) {
  e.preventDefault();
  alert('Thank you! Your atelier inquiry has been received. A senior curator from our Patan foundry will review your specifications and contact you directly.');
  if (e.target) e.target.reset();
}

// 9. CATALOG FILTERING & RENDERING ENGINE
let activeFilter = 'all';

function renderCatalog() {
  const grid = document.getElementById('productGrid');
  if (!grid) return;

  const searchVal = (document.getElementById('searchInput') ? document.getElementById('searchInput').value : '').toLowerCase();

  const filtered = PRODUCTS.filter(p => {
    const matchesFilter = (activeFilter === 'all') || (p.category === activeFilter);
    const matchesSearch = p.name.toLowerCase().includes(searchVal) ||
      p.alloy.toLowerCase().includes(searchVal) ||
      p.id.toLowerCase().includes(searchVal);
    return matchesFilter && matchesSearch;
  });

  if (filtered.length === 0) {
    grid.innerHTML = `
      <div class="col-span-full py-16 text-center text-slate-400 font-mono text-sm border border-dashed border-slate-300 dark:border-slate-800 rounded-2xl">
        NO SPECIMENS MATCHING QUERY IN PATAN LEDGER.
      </div>
    `;
    return;
  }

  grid.innerHTML = filtered.map(p => `
    <div class="bg-white dark:bg-patina-900 border border-slate-200/80 dark:border-gold/30 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col group">
      <div class="relative w-full h-[380px] sm:h-[430px] overflow-hidden bg-black flex items-center justify-center">
        <img src="${getAssetUrl(p.img)}" alt="${p.name}" class="w-full h-full object-fix group-hover:scale-105 transition-transform duration-700" />
        <div class="absolute top-4 right-4 bg-black/90 backdrop-blur-md px-3 py-1 rounded-full border border-gold/40 text-gold font-mono text-[10px] tracking-wider uppercase font-bold shadow-md">
          ${p.category.toUpperCase()}
        </div>
      </div>

      <div class="p-6 flex flex-col justify-between flex-1 gap-5 bg-white dark:bg-patina-900">
        <div class="flex flex-col gap-1.5">
          <div class="flex items-center justify-between">
            <span class="font-mono font-bold text-xl sm:text-2xl text-amber-600 dark:text-gold">
              $${p.price.toLocaleString()}
            </span>
            <div class="inline-flex items-center px-2.5 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold shadow-sm font-semibold tracking-wider">
              <span>${p.id}</span>
            </div>
          </div>

          <h3 class="font-sans font-bold text-xl sm:text-2xl text-slate-900 dark:text-parchment leading-tight pt-1">
            ${p.name}
          </h3>
        </div>

        <div class="flex flex-col text-xs font-mono gap-2.5 py-3 border-y border-dashed border-slate-200 dark:border-slate-800">
          <div class="flex justify-between items-center text-[11px]">
            <span class="text-slate-500 dark:text-slate-400">Alloy Grade:</span>
            <span class="font-bold text-slate-900 dark:text-parchment text-right">${p.alloy}</span>
          </div>
          <div class="flex justify-between items-center text-[11px]">
            <span class="text-slate-500 dark:text-slate-400">Height:</span>
            <span class="font-bold text-slate-900 dark:text-parchment text-right">${p.height} (${p.angula})</span>
          </div>
          <div class="flex justify-between items-center text-[11px]">
            <span class="text-slate-500 dark:text-slate-400">Raw Weight:</span>
            <span class="font-bold text-slate-900 dark:text-parchment text-right">${p.weight}</span>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3 pt-1">
          <button onclick="openSpecimenModalByProdId('${p.id}')"
            class="px-3 py-3 bg-white dark:bg-patina-900 border border-slate-200 dark:border-slate-700/80 hover:border-gold dark:hover:border-gold text-slate-900 dark:text-parchment hover:text-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg transition-colors shadow-sm text-center">
            TRACK CASTING
          </button>
          <button onclick="addToCartByProdId('${p.id}')"
            class="px-3 py-3 bg-[#0d131d] hover:bg-slate-800 dark:bg-patina-950 dark:hover:bg-patina-800 border border-transparent text-white font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg transition-colors shadow text-center">
            ADD TO SELECTION
          </button>
        </div>
      </div>
    </div>
  `).join('');

  renderIcons();
}

function setFilter(filterName, btnEl) {
  activeFilter = filterName;
  document.querySelectorAll('#filterGroup button').forEach(b => {
    b.className = 'filter-btn px-3.5 py-1.5 font-mono text-xs rounded-md bg-slate-50 dark:bg-patina-950 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-800 hover:border-gold/40';
  });
  if (btnEl) {
    btnEl.className = 'filter-btn px-3.5 py-1.5 font-mono text-xs rounded-md bg-gold/15 text-gold border border-gold';
  }
  renderCatalog();
}

function filterCatalog() {
  renderCatalog();
}

// 10. LUCIDE SVG MAP & RENDERING ENGINE
const LUCIDE_SVG_MAP = {
  'sparkles': '<path d="m12 3-1.9 5.8-5.8 1.9 5.8 1.9 1.9 5.8 1.9-5.8 5.8-1.9-5.8-1.9z"/><path d="M5 3v4M3 5h4M19 17v4M17 19h4"/>',
  'pause': '<rect width="4" height="16" x="6" y="4" rx="1"/><rect width="4" height="16" x="14" y="4" rx="1"/>',
  'play': '<polygon points="6 3 20 12 6 21 6 3"/>',
  'chevron-left': '<path d="m15 18-6-6 6-6"/>',
  'chevron-right': '<path d="m9 18 6-6-6-6"/>',
  'star': '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
  'flame': '<path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 3z"/>',
  'shield-check': '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
  'globe': '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
  'diamond': '<path d="M2.7 10.3a2.41 2.41 0 0 0 0 3.4l8.6 8.6a2.41 2.41 0 0 0 3.4 0l8.6-8.6a2.41 2.41 0 0 0 0-3.4l-8.6-8.6a2.41 2.41 0 0 0-3.4 0Z"/>',
  'award': '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
  'badge-check': '<path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.78 4.78 4 4 0 0 1-6.74 0 4 4 0 0 1-4.78-4.78 4 4 0 0 1 0-6.75Z"/><path d="m9 12 2 2 4-4"/>',
  'landmark': '<line x1="3" x2="21" y1="22" y2="22"/><line x1="6" x2="6" y1="18" y2="11"/><line x1="10" x2="10" y1="18" y2="11"/><line x1="14" x2="14" y1="18" y2="11"/><line x1="18" x2="18" y1="18" y2="11"/><polygon points="12 2 20 7 4 7 12 2"/>',
  'message-square': '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
  'message-circle': '<path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z"/>',
  'x': '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
  'menu': '<line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>',
  'sun': '<circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/>',
  'moon': '<path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>',
  'shopping-bag': '<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/>',
  'ruler': '<path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.4 2.4 0 0 1 0-3.4l2.6-2.6a2.4 2.4 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/>',
  'map-pin': '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
  'arrow-right': '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
  'arrow-up-right': '<path d="M7 17 17 7"/><path d="M7 7h10v10"/>',
  'user': '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
  'check': '<path d="m5 12 5 5L20 7"/>',
  'search': '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
  'scan': '<path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/>',
  'plus': '<path d="M5 12h14"/><path d="M12 5v14"/>',
  'message-square-plus': '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M12 7v6"/><path d="M9 10h6"/>',
  'scroll-text': '<path d="M8 21h12a2 2 0 0 0 2-2v-2H10v2a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v3h4"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/><path d="M15 8h-5"/><path d="M15 12h-5"/>',
  'users': '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
  'clock': '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
  'timer': '<line x1="10" x2="14" y1="2" y2="2"/><line x1="12" x2="15" y1="14" y2="11"/><circle cx="12" cy="14" r="8"/>',
  'feather': '<path d="M12.67 19a2 2 0 0 0 1.416-.588l6.154-6.172a6 6 0 0 0-8.49-8.49L5.58 9.92a2 2 0 0 0-.58 1.42V19a2 2 0 0 0 2 2h7.67z"/><path d="m16 8-6 6"/><path d="M17.5 15H9"/>',
  'pen-tool': '<path d="m12 19 7-7 3 3-7 7-3-3z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/>',
  'crosshair': '<circle cx="12" cy="12" r="10"/><line x1="22" x2="18" y1="12" y2="12"/><line x1="6" x2="2" y1="12" y2="12"/><line x1="12" x2="12" y1="6" y2="2"/><line x1="12" x2="12" y1="22" y2="18"/>',
  'target': '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
  'compass': '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
  'shapes': '<path d="M8.3 10a.7.7 0 0 1-.626-1.079l2.7-4.63a.7.7 0 0 1 1.252 0l2.7 4.63A.7.7 0 0 1 13.7 10Z"/><rect width="7" height="7" x="3" y="14" rx="1"/><circle cx="17.5" cy="17.5" r="3.5"/>',
  'layers': '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
  'phone': '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
  'mail': '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
  'send': '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
  'external-link': '<path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>',
  'navigation': '<polygon points="3 11 22 2 13 21 11 13 3 11"/>',
  'gem': '<path d="M6 3h12l4 6-10 12L2 9Z"/><path d="M11 3 8 9l4 12 4-12-3-6"/><path d="M2 9h20"/>',
  'history': '<path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/>',
  'heart': '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
  'infinity': '<path d="M12 12c-2-2.67-4-4-6-4a4 4 0 1 0 0 8c2 0 4-1.33 6-4Zm0 0c2 2.67 4 4 6 4a4 4 0 1 0 0-8c-2 0-4 1.33-6 4Z"/>'
};

function renderIcons() {
  document.querySelectorAll('[data-lucide]').forEach(el => {
    if (el.tagName.toLowerCase() === 'svg') return;

    const name = el.getAttribute('data-lucide');
    const pathContent = LUCIDE_SVG_MAP[name];
    if (!pathContent) return;

    const cls = el.getAttribute('class') || '';
    const isFill = cls.includes('fill-current') || cls.includes('fill-gold') || cls.includes('fill-amber');

    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.setAttribute('viewBox', '0 0 24 24');
    svg.setAttribute('fill', isFill ? 'currentColor' : 'none');
    svg.setAttribute('stroke', 'currentColor');
    svg.setAttribute('stroke-width', '2');
    svg.setAttribute('stroke-linecap', 'round');
    svg.setAttribute('stroke-linejoin', 'round');
    svg.setAttribute('class', `lucide lucide-${name} ${cls}`);
    svg.setAttribute('data-lucide', name);
    if (el.id) svg.id = el.id;

    try {
      if (typeof DOMParser !== 'undefined') {
        const parser = new DOMParser();
        const doc = parser.parseFromString(`<svg xmlns="http://www.w3.org/2000/svg">${pathContent}</svg>`, 'image/svg+xml');
        if (doc.documentElement && doc.documentElement.childNodes) {
          Array.from(doc.documentElement.childNodes).forEach(node => {
            if (node.nodeType === 1) {
              svg.appendChild(document.importNode(node, true));
            }
          });
        }
      } else {
        svg.innerHTML = pathContent;
      }
    } catch (e) {
      svg.innerHTML = pathContent;
    }

    if (el.parentNode) {
      el.parentNode.replaceChild(svg, el);
    }
  });

  if (window.lucide && typeof lucide.createIcons === 'function') {
    try {
      lucide.createIcons();
    } catch (e) {}
  }
}

// 11. INTERACTIVE METRICS NUMBER COUNTER ANIMATION ENGINE
function initAnimatedCounters() {
  const counterElements = document.querySelectorAll('.counter-number, [data-counter], [data-target]');
  if (!counterElements || counterElements.length === 0) return;

  const animateCount = (el) => {
    if (el.dataset.hasAnimated === 'true') return;
    el.dataset.hasAnimated = 'true';

    const rawTarget = el.getAttribute('data-target') || el.innerText.replace(/[^0-9.-]/g, '') || '0';
    const target = parseFloat(rawTarget);
    const start = parseFloat(el.getAttribute('data-start') || '0');
    const prefix = el.getAttribute('data-prefix') || '';
    const suffix = el.getAttribute('data-suffix') || '';
    const duration = parseInt(el.getAttribute('data-duration') || '1600', 10);
    const decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);

    const startTime = performance.now();
    const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

    const updateCounter = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const easedProgress = easeOutCubic(progress);

      const current = start + (target - start) * easedProgress;
      const formattedNumber = decimals > 0 
        ? current.toFixed(decimals) 
        : Math.round(current).toString();

      el.textContent = `${prefix}${formattedNumber}${suffix}`;

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        el.textContent = `${prefix}${decimals > 0 ? target.toFixed(decimals) : target}${suffix}`;
      }
    };

    requestAnimationFrame(updateCounter);
  };

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCount(entry.target);
          obs.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.15,
      rootMargin: '0px 0px -30px 0px'
    });

    counterElements.forEach(el => observer.observe(el));
  } else {
    counterElements.forEach(el => animateCount(el));
  }
}

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  updateCartUI();
  initReviewsSlider();
  initAnimatedCounters();
  renderCatalog();
  renderIcons();
  setTimeout(renderIcons, 50);
  setTimeout(renderIcons, 300);
});

window.addEventListener('load', () => {
  renderIcons();
  initAnimatedCounters();
});

// Global delegated click listener for any Add to Selection / Acquisition button
document.addEventListener('click', (e) => {
  const btn = e.target.closest('button, a');
  if (!btn) return;

  const btnText = btn.innerText ? btn.innerText.trim().toUpperCase() : '';
  const isAddBtn = btn.classList.contains('add-to-cart-btn') || 
                    btn.getAttribute('data-action') === 'add-to-selection' || 
                    btn.getAttribute('data-action') === 'add-to-cart' ||
                    btnText === 'ADD TO SELECTION' || 
                    btnText.includes('ADD TO SELECTION') ||
                    btnText === 'ADD TO CART' ||
                    btnText.includes('ADD TO CART');

  if (isAddBtn) {
    const onclickAttr = btn.getAttribute('onclick') || '';
    // If it doesn't already have inline handler or if it was triggered
    if (!onclickAttr || !onclickAttr.includes('addToCartByProdId')) {
      e.preventDefault();
      const card = btn.closest('.specimen-card') || btn.closest('[data-sku]');
      const sku = btn.getAttribute('data-sku') || card?.getAttribute('data-sku') || 'SH-001';
      addToCartByProdId(sku, btn);
    }
  }
});

// Expose functions globally for inline HTML onclick handlers
if (typeof window !== 'undefined') {
  window.addToCartByProdId = addToCartByProdId;
  window.bookNowByProdId = bookNowByProdId;
  window.inquireByProdId = bookNowByProdId;
  window.closeBookingModal = closeBookingModal;
  window.closeBookingOnOverlay = closeBookingOnOverlay;
  window.handleBookingSubmit = handleBookingSubmit;
  window.showToast = showToast;
  window.removeFromCart = removeFromCart;
  window.increaseQty = increaseQty;
  window.decreaseQty = decreaseQty;
  window.toggleCartDrawer = toggleCartDrawer;
  window.updateCartUI = updateCartUI;
  window.getCart = getCart;
  window.saveCart = saveCart;
  window.closeCartOnOverlay = closeCartOnOverlay;
  window.openSpecimenModalByProdId = openSpecimenModalByProdId;
  window.closeSpecimenModal = closeSpecimenModal;
  window.closeSpecimenOnOverlay = closeSpecimenOnOverlay;
  window.triggerCheckoutModal = triggerCheckoutModal;
  window.toggleCartItemSelection = toggleCartItemSelection;
  window.toggleSelectAllCart = toggleSelectAllCart;
  window.removeSelectedCartItems = removeSelectedCartItems;
  window.toggleMobileMenu = toggleMobileMenu;
  window.toggleTheme = toggleTheme;
  if (typeof filterCatalog === 'function') window.filterCatalog = filterCatalog;
  if (typeof resetCatalogFilters === 'function') window.resetCatalogFilters = resetCatalogFilters;
  if (typeof renderCatalog === 'function') window.renderCatalog = renderCatalog;
  if (typeof openReviewModal === 'function') window.openReviewModal = openReviewModal;
  if (typeof closeReviewModal === 'function') window.closeReviewModal = closeReviewModal;
  if (typeof closeReviewOnOverlay === 'function') window.closeReviewOnOverlay = closeReviewOnOverlay;
  if (typeof submitReviewForm === 'function') window.submitReviewForm = submitReviewForm;
  if (typeof inspectLedgerOrder === 'function') window.inspectLedgerOrder = inspectLedgerOrder;
  if (typeof handleLedgerLookup === 'function') window.handleLedgerLookup = handleLedgerLookup;
  if (typeof trackLedgerQuickOrder === 'function') window.trackLedgerQuickOrder = trackLedgerQuickOrder;
  if (typeof renderIcons === 'function') window.renderIcons = renderIcons;
  if (typeof getAssetUrl === 'function') window.getAssetUrl = getAssetUrl;
  window.PRODUCTS = PRODUCTS;
}
