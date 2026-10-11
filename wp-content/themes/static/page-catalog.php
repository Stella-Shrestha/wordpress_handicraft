<?php
/**
 * Template Name: Catalog / Shop Page Template
 *
 * @package ShresthaHandicraftStatic
 */

get_header();
?>

  <!-- MAIN CATALOG CONTENT -->
  <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- PAGE HEADER -->
    <div class="border-b border-slate-200 dark:border-gold/20 pb-8 mb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
      <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold mb-3 shadow-sm">
          <i data-lucide="compass" class="w-3.5 h-3.5"></i>
          <span>SACRED COLLECTION • PATAN ATELIER</span>
        </div>
        <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment">
          The Consecrated Specimen Catalog
        </h1>
        <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 max-w-2xl font-sans leading-relaxed">
          Each deity statue is individually sculpted in lost-wax, smelted in ritual Ashtadhatu 8-metal alloy, and finished in 24K mercury fire-gilding.
        </p>
      </div>

      <!-- Live Search & Sort Controls -->
      <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
        <!-- Live Search Box -->
        <div class="relative min-w-[240px]">
          <i data-lucide="search" class="w-4 h-4 text-gold absolute left-3 top-1/2 -translate-y-1/2"></i>
          <input type="text" id="catalogSearchInput" oninput="typeof filterCatalog === 'function' && filterCatalog()"
            placeholder="Search by deity or SKU..."
            class="w-full pl-9 pr-4 py-2.5 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/30 rounded-lg text-xs font-mono text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm" />
        </div>

        <!-- Sort Select -->
        <select id="catalogSortSelect" onchange="typeof filterCatalog === 'function' && filterCatalog()"
          class="px-3 py-2.5 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/30 rounded-lg text-xs font-mono text-slate-800 dark:text-parchment focus:border-gold outline-none cursor-pointer shadow-sm">
          <option value="default">Sort: Default Order</option>
          <option value="price-asc">Price: Low to High</option>
          <option value="price-desc">Price: High to Low</option>
          <option value="name-asc">Name: A to Z</option>
        </select>
      </div>
    </div>

    <!-- ALLOY TAXONOMY FILTER PILLS -->
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 scrollbar-none">
      <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('all', this)"
        class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-gold text-white dark:text-patina-950 shadow-sm"
        data-alloy="all">
        All Specimens
      </button>
      <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('ashtadhatu', this)"
        class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 text-slate-700 dark:text-slate-300 hover:border-gold"
        data-alloy="ashtadhatu">
        Ashtadhatu (8-Metal)
      </button>
      <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('gold-leaf', this)"
        class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 text-slate-700 dark:text-slate-300 hover:border-gold"
        data-alloy="gold-leaf">
        24K Gold Leaf
      </button>
      <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('patina-bronze', this)"
        class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 text-slate-700 dark:text-slate-300 hover:border-gold"
        data-alloy="patina-bronze">
        Patina Bronze
      </button>
      <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('copper-repousse', this)"
        class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 text-slate-700 dark:text-slate-300 hover:border-gold"
        data-alloy="copper-repousse">
        Copper Repoussé
      </button>
    </div>

    <!-- SPECIMEN PRODUCT GRID -->
    <div id="catalogGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Specimen 1 -->
      <div class="specimen-card bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden shadow-lg hover:border-gold/60 transition-all flex flex-col group"
        data-sku="SH-001"
        data-name="Green Tara: Mother of Divine Liberation"
        data-price="14800"
        data-alloys="ashtadhatu gold-leaf">
        <div class="relative h-80 bg-black flex items-center justify-center overflow-hidden">
          <img src="<?php echo shrestha_asset('green_tara.jpg'); ?>" alt="Green Tara: Mother of Divine Liberation"
            class="max-h-full max-w-full object-contain filter drop-shadow-xl group-hover:scale-105 transition-transform duration-500" />
          <span class="absolute top-3 left-3 bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30 shadow">SH-001</span>
          <span class="absolute top-3 right-3 bg-patina-900/90 text-emerald-400 font-mono text-[10px] px-2.5 py-1 rounded border border-emerald-500/30 flex items-center gap-1 shadow">
            <i data-lucide="shield-check" class="w-3 h-3"></i> Consecrated
          </span>
        </div>
        <div class="p-6 flex-1 flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-[11px] text-gold uppercase tracking-wider font-semibold">8-Metal Ashtadhatu Alloy</span>
            <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment mt-1">
              <a href="<?php echo esc_url(home_url('/specimen/green-tara/')); ?>" class="hover:text-gold transition-colors">Green Tara: Mother of Divine Liberation</a>
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
              Hand-cast using lost-wax iconometry from 8-metal Ashtadhatu alloy with 24K gold-leaf fire gilding and cold-chiseled facial symmetry.
            </p>
          </div>
          <div class="grid grid-cols-3 gap-2 py-3 border-y border-slate-100 dark:border-gold/10 font-mono text-[11px] text-center">
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Height</span>
              <span class="font-semibold text-slate-700 dark:text-slate-300">22.5 in / 57 cm</span>
            </div>
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Weight</span>
              <span class="font-semibold text-slate-700 dark:text-slate-300">14.2 kg</span>
            </div>
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Symmetry</span>
              <span class="font-semibold text-gold">99.8%</span>
            </div>
          </div>
          <div class="flex flex-col gap-2.5 pt-2 border-t border-slate-100 dark:border-gold/10">
            <div class="flex items-center justify-between">
              <span class="font-mono font-bold text-xl text-gold">$14,800.00</span>
              <button onclick="typeof openSpecimenModalByProdId === 'function' && openSpecimenModalByProdId('SH-001')"
                class="p-2 bg-slate-100 dark:bg-patina-800 hover:bg-gold/10 text-slate-700 dark:text-parchment hover:text-gold rounded-lg border border-slate-200 dark:border-gold/20 transition-colors shadow-sm text-xs font-mono flex items-center gap-1"
                title="Inspect Technical Specs">
                <i data-lucide="scan" class="w-3.5 h-3.5"></i>
                <span class="hidden sm:inline text-[10px]">Specs</span>
              </button>
            </div>
            <div class="grid grid-cols-2 gap-2">
              <button onclick="typeof addToCartByProdId === 'function' && addToCartByProdId('SH-001')"
                class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                <span>Add to Cart</span>
              </button>
              <button onclick="typeof bookNowByProdId === 'function' ? bookNowByProdId('SH-001') : (window.location.href='<?php echo esc_url(home_url('/contact/?inquiry=booking&sku=SH-001')); ?>')"
                class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                <span>Inquiry</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Specimen 2 -->
      <div class="specimen-card bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden shadow-lg hover:border-gold/60 transition-all flex flex-col group"
        data-sku="SH-002"
        data-name="Shakyamuni Buddha: Earth-Touching Mudra"
        data-price="16500"
        data-alloys="ashtadhatu gold-leaf">
        <div class="relative h-80 bg-black flex items-center justify-center overflow-hidden">
          <img src="<?php echo shrestha_asset('shakyamuni.jpg'); ?>" alt="Shakyamuni Buddha: Earth-Touching Mudra"
            class="max-h-full max-w-full object-contain filter drop-shadow-xl group-hover:scale-105 transition-transform duration-500" />
          <span class="absolute top-3 left-3 bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30 shadow">SH-002</span>
          <span class="absolute top-3 right-3 bg-patina-900/90 text-emerald-400 font-mono text-[10px] px-2.5 py-1 rounded border border-emerald-500/30 flex items-center gap-1 shadow">
            <i data-lucide="shield-check" class="w-3 h-3"></i> Consecrated
          </span>
        </div>
        <div class="p-6 flex-1 flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-[11px] text-gold uppercase tracking-wider font-semibold">24K Fire-Gilded Bronze</span>
            <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment mt-1">
              <a href="<?php echo esc_url(home_url('/specimen/shakyamuni/')); ?>" class="hover:text-gold transition-colors">Shakyamuni Buddha: Earth-Touching Mudra</a>
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
              Cast according to 14th-century Licchavi proportions with sealed consecration chamber and traditional cold-gold facial painting.
            </p>
          </div>
          <div class="grid grid-cols-3 gap-2 py-3 border-y border-slate-100 dark:border-gold/10 font-mono text-[11px] text-center">
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Height</span>
              <span class="font-semibold text-slate-700 dark:text-slate-300">24.0 in / 61 cm</span>
            </div>
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Weight</span>
              <span class="font-semibold text-slate-700 dark:text-slate-300">16.5 kg</span>
            </div>
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Symmetry</span>
              <span class="font-semibold text-gold">99.9%</span>
            </div>
          </div>
          <div class="flex flex-col gap-2.5 pt-2 border-t border-slate-100 dark:border-gold/10">
            <div class="flex items-center justify-between">
              <span class="font-mono font-bold text-xl text-gold">$16,500.00</span>
              <button onclick="typeof openSpecimenModalByProdId === 'function' && openSpecimenModalByProdId('SH-002')"
                class="p-2 bg-slate-100 dark:bg-patina-800 hover:bg-gold/10 text-slate-700 dark:text-parchment hover:text-gold rounded-lg border border-slate-200 dark:border-gold/20 transition-colors shadow-sm text-xs font-mono flex items-center gap-1"
                title="Inspect Technical Specs">
                <i data-lucide="scan" class="w-3.5 h-3.5"></i>
                <span class="hidden sm:inline text-[10px]">Specs</span>
              </button>
            </div>
            <div class="grid grid-cols-2 gap-2">
              <button onclick="typeof addToCartByProdId === 'function' && addToCartByProdId('SH-002')"
                class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                <span>Add to Cart</span>
              </button>
              <button onclick="typeof bookNowByProdId === 'function' ? bookNowByProdId('SH-002') : (window.location.href='<?php echo esc_url(home_url('/contact/?inquiry=booking&sku=SH-002')); ?>')"
                class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                <span>Inquiry</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Specimen 3 -->
      <div class="specimen-card bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden shadow-lg hover:border-gold/60 transition-all flex flex-col group"
        data-sku="SH-108"
        data-name="Mahakala: Wrathful Guardian of Sacred Dharma"
        data-price="19500"
        data-alloys="ashtadhatu patina-bronze">
        <div class="relative h-80 bg-black flex items-center justify-center overflow-hidden">
          <img src="<?php echo shrestha_asset('mahakala.jpg'); ?>" alt="Mahakala: Wrathful Guardian of Sacred Dharma"
            class="max-h-full max-w-full object-contain filter drop-shadow-xl group-hover:scale-105 transition-transform duration-500" />
          <span class="absolute top-3 left-3 bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30 shadow">SH-108</span>
          <span class="absolute top-3 right-3 bg-patina-900/90 text-emerald-400 font-mono text-[10px] px-2.5 py-1 rounded border border-emerald-500/30 flex items-center gap-1 shadow">
            <i data-lucide="shield-check" class="w-3 h-3"></i> Consecrated
          </span>
        </div>
        <div class="p-6 flex-1 flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-[11px] text-gold uppercase tracking-wider font-semibold">Tantric Ashtadhatu Alloy</span>
            <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment mt-1">
              <a href="<?php echo esc_url(home_url('/specimen/mahakala/')); ?>" class="hover:text-gold transition-colors">Mahakala: Wrathful Guardian of Sacred Dharma</a>
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
              Wrathful Dharmapala manifestation cast in deep patina alloy with hand-burnished ornaments and Sanskrit consecrated seed syllables.
            </p>
          </div>
          <div class="grid grid-cols-3 gap-2 py-3 border-y border-slate-100 dark:border-gold/10 font-mono text-[11px] text-center">
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Height</span>
              <span class="font-semibold text-slate-700 dark:text-slate-300">18.0 in / 46 cm</span>
            </div>
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Weight</span>
              <span class="font-semibold text-slate-700 dark:text-slate-300">18.6 kg</span>
            </div>
            <div>
              <span class="block text-slate-400 text-[9px] uppercase">Symmetry</span>
              <span class="font-semibold text-gold">99.7%</span>
            </div>
          </div>
          <div class="flex flex-col gap-2.5 pt-2 border-t border-slate-100 dark:border-gold/10">
            <div class="flex items-center justify-between">
              <span class="font-mono font-bold text-xl text-gold">$19,500.00</span>
              <button onclick="typeof openSpecimenModalByProdId === 'function' && openSpecimenModalByProdId('SH-108')"
                class="p-2 bg-slate-100 dark:bg-patina-800 hover:bg-gold/10 text-slate-700 dark:text-parchment hover:text-gold rounded-lg border border-slate-200 dark:border-gold/20 transition-colors shadow-sm text-xs font-mono flex items-center gap-1"
                title="Inspect Technical Specs">
                <i data-lucide="scan" class="w-3.5 h-3.5"></i>
                <span class="hidden sm:inline text-[10px]">Specs</span>
              </button>
            </div>
            <div class="grid grid-cols-2 gap-2">
              <button onclick="typeof addToCartByProdId === 'function' && addToCartByProdId('SH-108')"
                class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                <span>Add to Cart</span>
              </button>
              <button onclick="typeof bookNowByProdId === 'function' ? bookNowByProdId('SH-108') : (window.location.href='<?php echo esc_url(home_url('/contact/?inquiry=booking&sku=SH-108')); ?>')"
                class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                <span>Inquiry</span>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Empty Search State -->
    <div id="noResultsNotice" class="hidden text-center py-20 bg-white dark:bg-patina-900 border border-gold/20 rounded-2xl shadow-xl mt-8">
      <div class="w-16 h-16 mx-auto rounded-full bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-4">
        <i data-lucide="compass" class="w-8 h-8"></i>
      </div>
      <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment">No Sacred Specimens Found</h3>
      <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 max-w-md mx-auto leading-relaxed">
        Try refining your keyword search, or resetting the alloy filter above to view all consecrated specimens.
      </p>
    </div>

    <!-- BESPOKE COMMISSIONS CALLOUT BANNER -->
    <section class="mt-16 mb-8">
      <div class="bg-gradient-to-r from-[#F6F0E4] via-white to-[#F3ECE2] dark:from-patina-900 dark:via-[#1A1D22] dark:to-patina-900 border border-gold/30 rounded-3xl p-8 sm:p-12 relative overflow-hidden shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">
        
        <div class="flex flex-col gap-3 max-w-2xl z-10">
          <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase">BESPOKE COMMISSIONS</span>
          <h2 class="font-display text-3xl sm:text-4xl font-bold text-slate-900 dark:text-parchment leading-tight">
            Commission a Sacred Specimen <span class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">for Temples &amp; Altars.</span>
          </h2>
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed mt-1">
            Collaborate directly with our master Newar sculptors to create tailor-made deity manifestations with custom iconometric dimensions, consecrated hollow chambers, and pure 8-metal Ashtadhatu formulations.
          </p>
        </div>

        <div class="flex flex-wrap items-center gap-4 shrink-0 z-10">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center gap-2">
            <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
            <span>REQUEST BESPOKE COMMISSION</span>
          </a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="px-6 py-3.5 bg-white/80 dark:bg-patina-950/80 border border-gold/50 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
            <i data-lucide="phone" class="w-3.5 h-3.5"></i>
            <span>SPEAK WITH ATELIER</span>
          </a>
        </div>

      </div>
    </section>

  </main>

<?php
get_footer();
