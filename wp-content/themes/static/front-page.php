<?php
/**
 * Front Page Template (Home Page)
 *
 * Template Name: Home Page
 * @package ShresthaHandicraft
 */

get_header();
?>

  <!-- MAIN HERO & CONTENT -->
  <main class="w-full">

    <!-- Hero Section -->
    <div
      class="grid grid-cols-1 max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 lg:py-[110px] py-[52px] lg:grid-cols-12 gap-10 items-center">

      <!-- Hero Left Column -->
      <div class="lg:col-span-7 flex flex-col gap-6">
        <div
          class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold w-fit shadow-sm">
          <span>SPECIMEN #SH-001</span>
          <span>•</span>
          <span class="text-emerald-500 font-semibold flex items-center gap-1">
            <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> RITUAL CONSECRATED
          </span>
        </div>

        <h1
          class="font-display text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-none text-slate-900 dark:text-parchment">
          <span class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Green
            Tara</span><br />
          Mother of Divine Liberation
        </h1>

        <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed">
          Hand-cast using lost-wax iconometry (<em>Cire Perdue</em>) from 8-metal Ashtadhatu alloy. Adorned with 24K gold-leaf
          fire gilding and cold-chiseled facial symmetry, crafted according to 14th-century Sanskrit treatise canons in
          Patan, Nepal.
        </p>

        <!-- CTA Action Buttons -->
        <div class="flex flex-wrap items-center gap-4 mt-2">
          <button type="button"
            data-action="add-to-cart"
            data-sku="SH-001"
            onclick="addToCartByProdId('SH-001', this)"
            class="add-to-cart-btn px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
            <i data-lucide="shopping-bag" class="w-4 h-4"></i>
            <span>Add to Cart</span>
          </button>
          <button type="button"
            onclick="bookNowByProdId('SH-001')"
            class="px-6 py-3.5 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-bold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
            <i data-lucide="message-square" class="w-4 h-4 text-copper"></i>
            <span>Inquiry</span>
          </button>
          <a href="<?php echo esc_url(home_url('/specimen/green-tara-mother-of-divine-liberation/')); ?>"
            class="px-5 py-3.5 bg-slate-100 dark:bg-patina-800/80 hover:bg-gold/10 border border-slate-200 dark:border-gold/20 text-slate-700 dark:text-slate-300 hover:text-gold font-mono font-medium text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
            <i data-lucide="scan" class="w-4 h-4"></i>
            <span>Inspect Spec</span>
          </a>
        </div>
      </div>

      <!-- Hero Right Column (Visual Card) -->
      <div class="lg:col-span-5 relative">
        <div
          class="relative bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 shadow-2xl overflow-hidden group">
          <div class="relative w-full h-[460px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
            <a href="<?php echo esc_url(home_url('/specimen/green-tara-mother-of-divine-liberation/')); ?>" class="w-full h-full flex items-center justify-center cursor-pointer" title="Green Tara Specimen Inspection">
              <img src="<?php echo shrestha_asset('green_tara.jpg'); ?>" alt="Green Tara Statue"
                class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out" />
            </a>

            <!-- HUD Crosshairs Overlay -->
            <div class="absolute inset-0 border border-gold/20 pointer-events-none">
              <div class="absolute top-3 left-3 w-3 h-3 border-t-2 border-l-2 border-gold"></div>
              <div class="absolute top-3 right-3 w-3 h-3 border-t-2 border-r-2 border-gold"></div>
              <div class="absolute bottom-3 left-3 w-3 h-3 border-b-2 border-l-2 border-gold"></div>
              <div class="absolute bottom-3 right-3 w-3 h-3 border-b-2 border-r-2 border-gold"></div>
              <div class="absolute bottom-3 left-3 right-3 text-center">
                <span
                  class="bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30">ICONOMETRIC
                  SYMMETRY: 99.8%</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Floating Non-Stop Rotating Circular Text Stamp Seal Badge -->
        <div
          class="absolute -right-3 sm:-right-6 top-1/2 -translate-y-1/2 z-20 w-36 h-36 sm:w-44 sm:h-44 rounded-full shadow-2xl transition-transform hover:scale-105 pointer-events-auto flex items-center justify-center">
          <svg viewBox="0 0 200 200" width="100%" height="100%"
            class="w-full h-full filter drop-shadow-xl overflow-visible" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
              <path id="rotatingStampTextPath" d="M 100, 100 m -74, 0 a 74,74 0 1,1 148,0 a 74,74 0 1,1 -148,0" />
            </defs>

            <!-- Base Outer Background & Outer Border Rings -->
            <circle cx="100" cy="100" r="95" fill="#FAF7F2" stroke="#B86B4B" stroke-width="2.5" />
            <circle cx="100" cy="100" r="90" fill="none" stroke="#B86B4B" stroke-width="1" />
            <circle cx="100" cy="100" r="58" fill="none" stroke="#B86B4B" stroke-width="1.5" stroke-dasharray="2 3" />

            <!-- Twin Mountain Peak Line Art -->
            <path d="M 64 114 L 80 90 L 92 107 L 115 94 L 138 114" stroke="#B86B4B" stroke-width="3" fill="none"
              stroke-linecap="round" stroke-linejoin="round" />

            <text x="100" y="133" text-anchor="middle" font-family="'Cinzel', serif" font-style="italic" font-size="12"
              font-weight="600" fill="#B86B4B">
              Verified
            </text>

            <!-- NONSTOP CONTINUOUS ROTATING TEXT RING -->
            <g class="animate-[spin_18s_linear_infinite]" style="transform-origin: 100px 100px;">
              <text font-family="'Plus Jakarta Sans', 'Space Grotesk', sans-serif" font-size="9.5" font-weight="600"
                fill="#B86B4B" letter-spacing="2.2">
                <textPath xlink:href="#rotatingStampTextPath" href="#rotatingStampTextPath" startOffset="0%">
                  NEPAL • EST. TOURISM AUTHO • OFFICIALLY REGISTERED •
                </textPath>
              </text>
            </g>
          </svg>
        </div>
      </div>
    </div>

    <!-- INFINITE LOGO LOOP TICKER -->
    <div
      class="w-full overflow-hidden bg-white/70 dark:bg-patina-900/60 border-y border-slate-200 dark:border-gold/20 py-4 backdrop-blur-md relative">
      <div class="flex items-center gap-12 whitespace-nowrap animate-marquee">
        <!-- Logo Items Set 1 -->
        <div class="flex items-center gap-12 shrink-0">
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="award" class="w-4 h-4 text-gold"></i>
            <span>PATAN MASTER SCULPTORS GUILD</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i>
            <span>99.9% ASHTADHATU ASSAY CERTIFIED</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="landmark" class="w-4 h-4 text-gold"></i>
            <span>SACRED ART INSTITUTE OF KYOTO</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="scroll-text" class="w-4 h-4 text-copper"></i>
            <span>SANSKRIT SHILPA SHASTRA CANON</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="flame" class="w-4 h-4 text-gold"></i>
            <span>LICCHAVI LOST-WAX CIRE PERDUE</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="badge-check" class="w-4 h-4 text-emerald-500"></i>
            <span>MONASTIC CONSECRATION SEALED</span>
          </div>
        </div>

        <!-- Duplicated Set 2 for infinite loop -->
        <div class="flex items-center gap-12 shrink-0" aria-hidden="true">
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="award" class="w-4 h-4 text-gold"></i>
            <span>PATAN MASTER SCULPTORS GUILD</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i>
            <span>99.9% ASHTADHATU ASSAY CERTIFIED</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="landmark" class="w-4 h-4 text-gold"></i>
            <span>SACRED ART INSTITUTE OF KYOTO</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="scroll-text" class="w-4 h-4 text-copper"></i>
            <span>SANSKRIT SHILPA SHASTRA CANON</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="flame" class="w-4 h-4 text-gold"></i>
            <span>LICCHAVI LOST-WAX CIRE PERDUE</span>
          </div>
          <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
            <i data-lucide="badge-check" class="w-4 h-4 text-emerald-500"></i>
            <span>MONASTIC CONSECRATION SEALED</span>
          </div>
        </div>
      </div>
    </div>

    <!-- NEWLY CONSECRATED SECTION -->
    <section class="max-w-[1584px] mx-auto lg:py-[110px] py-[52px] px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col justify-between text-center items-center mb-12 gap-2">
        <h2
          class="font-display text-4xl sm:text-5xl font-extrabold tracking-wider uppercase text-slate-900 dark:text-parchment">
          Newly Consecrated
        </h2>
        <p class="text-slate-500 dark:text-slate-400 text-xs sm:text-sm font-sans leading-relaxed">
          A rotating selection of recently completed pieces, cast this season in our Patan workshops.
        </p>
      </div>

      <!-- 3 Specimen Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-[1440px] mx-auto">

        <!-- Card 1: Green Tara -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200/80 dark:border-gold/30 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col group">
          <div class="relative w-full h-[380px] sm:h-[430px] overflow-hidden bg-black flex items-center justify-center">
            <img src="<?php echo shrestha_asset('green_tara.jpg'); ?>" alt="Green Tara Specimen"
              class="w-full h-full object-fix group-hover:scale-105 transition-transform duration-700" />
            <div
              class="absolute top-4 right-4 bg-black/90 backdrop-blur-md px-3 py-1 rounded-full border border-gold/40 text-gold font-mono text-[10px] tracking-wider uppercase font-bold shadow-md">
              ASHTADHATU
            </div>
          </div>

          <div class="p-6 flex flex-col justify-between flex-1 gap-5 bg-white dark:bg-patina-900">
            <div class="flex flex-col gap-1.5">
              <div class="flex items-center justify-between">
                <span class="font-mono font-bold text-xl sm:text-2xl text-amber-600 dark:text-gold">
                  $14,800
                </span>
                <div class="inline-flex items-center px-2.5 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold shadow-sm font-semibold tracking-wider">
                  <span>SH-001</span>
                </div>
              </div>

              <h3
                class="font-sans font-bold text-xl sm:text-2xl text-slate-900 dark:text-parchment leading-tight pt-1">
                Green Tara Specimen
              </h3>
            </div>

            <div
              class="flex flex-col text-xs font-mono gap-2.5 py-3 border-y border-dashed border-slate-200 dark:border-slate-800">
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Alloy Grade:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">Ashtadhatu (8-Metal)</span>
              </div>
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Height:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">22.5 in (57.1 cm) (124 Angulas)</span>
              </div>
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Raw Weight:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">14.2 kg</span>
              </div>
            </div>

            <div class="flex flex-col gap-2 pt-1">
              <div class="grid grid-cols-2 gap-2">
                <button type="button"
                  data-action="add-to-cart"
                  data-sku="SH-001"
                  onclick="addToCartByProdId('SH-001', this)"
                  class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                  <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                  <span>Add to Cart</span>
                </button>
                <button type="button"
                  onclick="bookNowByProdId('SH-001')"
                  class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                  <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                  <span>Inquiry</span>
                </button>
              </div>
              <a href="<?php echo esc_url(home_url('/specimen/green-tara-mother-of-divine-liberation/')); ?>"
                class="w-full py-2 bg-slate-50 dark:bg-patina-950 hover:bg-slate-100 dark:hover:bg-patina-800 text-slate-600 dark:text-slate-400 hover:text-gold border border-slate-200 dark:border-slate-800 rounded-lg text-center font-mono text-[10px] uppercase tracking-widest transition-colors flex items-center justify-center gap-1">
                <i data-lucide="scan" class="w-3 h-3"></i>
                <span>Inspect Spec</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Card 2: Chenrezig -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200/80 dark:border-gold/30 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col group">
          <div class="relative w-full h-[380px] sm:h-[430px] overflow-hidden bg-black flex items-center justify-center">
            <img src="<?php echo shrestha_asset('mahakala.jpg'); ?>" alt="Mahakala Specimen"
              class="w-full h-full object-fix group-hover:scale-105 transition-transform duration-700" />
            <div
              class="absolute top-4 right-4 bg-black/90 backdrop-blur-md px-3 py-1 rounded-full border border-gold/40 text-gold font-mono text-[10px] tracking-wider uppercase font-bold shadow-md">
              24K GOLD LEAF
            </div>
          </div>

          <div class="p-6 flex flex-col justify-between flex-1 gap-5 bg-white dark:bg-patina-900">
            <div class="flex flex-col gap-1.5">
              <div class="flex items-center justify-between">
                <span class="font-mono font-bold text-xl sm:text-2xl text-amber-600 dark:text-gold">
                  $19,500
                </span>
                <div class="inline-flex items-center px-2.5 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold shadow-sm font-semibold tracking-wider">
                  <span>SH-108</span>
                </div>
              </div>

              <h3
                class="font-sans font-bold text-xl sm:text-2xl text-slate-900 dark:text-parchment leading-tight pt-1">
                Mahakala 6-Armed
              </h3>
            </div>

            <div
              class="flex flex-col text-xs font-mono gap-2.5 py-3 border-y border-dashed border-slate-200 dark:border-slate-800">
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Alloy Grade:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">Ashtadhatu (8-Metal)</span>
              </div>
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Height:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">18.0 in (45.7 cm) (108 Angulas)</span>
              </div>
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Raw Weight:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">18.6 kg</span>
              </div>
            </div>

            <div class="flex flex-col gap-2 pt-1">
              <div class="grid grid-cols-2 gap-2">
                <button type="button"
                  data-action="add-to-cart"
                  data-sku="SH-108"
                  onclick="addToCartByProdId('SH-108', this)"
                  class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                  <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                  <span>Add to Cart</span>
                </button>
                <button type="button"
                  onclick="bookNowByProdId('SH-108')"
                  class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                  <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                  <span>Inquiry</span>
                </button>
              </div>
              <a href="<?php echo esc_url(home_url('/specimen/mahakala-wrathful-guardian-of-sacred-dharma/')); ?>"
                class="w-full py-2 bg-slate-50 dark:bg-patina-950 hover:bg-slate-100 dark:hover:bg-patina-800 text-slate-600 dark:text-slate-400 hover:text-gold border border-slate-200 dark:border-slate-800 rounded-lg text-center font-mono text-[10px] uppercase tracking-widest transition-colors flex items-center justify-center gap-1">
                <i data-lucide="scan" class="w-3 h-3"></i>
                <span>Inspect Spec</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Card 3: Shakyamuni -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200/80 dark:border-gold/30 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col group">
          <div class="relative w-full h-[380px] sm:h-[430px] overflow-hidden bg-black flex items-center justify-center">
            <img src="<?php echo shrestha_asset('shakyamuni.jpg'); ?>" alt="Shakyamuni Buddha Specimen"
              class="w-full h-full object-fix group-hover:scale-105 transition-transform duration-700" />
            <div
              class="absolute top-4 right-4 bg-black/90 backdrop-blur-md px-3 py-1 rounded-full border border-gold/40 text-gold font-mono text-[10px] tracking-wider uppercase font-bold shadow-md">
              PATINA BRONZE
            </div>
          </div>

          <div class="p-6 flex flex-col justify-between flex-1 gap-5 bg-white dark:bg-patina-900">
            <div class="flex flex-col gap-1.5">
              <div class="flex items-center justify-between">
                <span class="font-mono font-bold text-xl sm:text-2xl text-amber-600 dark:text-gold">
                  $12,400
                </span>
                <div class="inline-flex items-center px-2.5 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold shadow-sm font-semibold tracking-wider">
                  <span>SH-204</span>
                </div>
              </div>

              <h3
                class="font-sans font-bold text-xl sm:text-2xl text-slate-900 dark:text-parchment leading-tight pt-1">
                Shakyamuni Buddha
              </h3>
            </div>

            <div
              class="flex flex-col text-xs font-mono gap-2.5 py-3 border-y border-dashed border-slate-200 dark:border-slate-800">
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Alloy Grade:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">High-Copper Patina Bronze</span>
              </div>
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Height:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">24.0 in (60.9 cm) (128 Angulas)</span>
              </div>
              <div class="flex justify-between items-center text-[11px]">
                <span class="text-slate-500 dark:text-slate-400">Raw Weight:</span>
                <span class="font-bold text-slate-900 dark:text-parchment">21.0 kg</span>
              </div>
            </div>

            <div class="flex flex-col gap-2 pt-1">
              <div class="grid grid-cols-2 gap-2">
                <button type="button"
                  data-action="add-to-cart"
                  data-sku="SH-204"
                  onclick="addToCartByProdId('SH-204', this)"
                  class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                  <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                  <span>Add to Cart</span>
                </button>
                <button type="button"
                  onclick="bookNowByProdId('SH-204')"
                  class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                  <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                  <span>Inquiry</span>
                </button>
              </div>
              <a href="<?php echo esc_url(home_url('/specimen/shakyamuni-buddha-earth-touching-mudra/')); ?>"
                class="w-full py-2 bg-slate-50 dark:bg-patina-950 hover:bg-slate-100 dark:hover:bg-patina-800 text-slate-600 dark:text-slate-400 hover:text-gold border border-slate-200 dark:border-slate-800 rounded-lg text-center font-mono text-[10px] uppercase tracking-widest transition-colors flex items-center justify-center gap-1">
                <i data-lucide="scan" class="w-3 h-3"></i>
                <span>Inspect Spec</span>
              </a>
            </div>
          </div>
        </div>

      </div>

      <!-- VIEW ALL PACKAGES & CATALOG BUTTON -->
      <div class="flex justify-center mt-12">
        <a href="<?php echo esc_url(home_url('/catalog/')); ?>"
          class="px-8 py-3.5 bg-gradient-to-r from-amber-600/90 via-gold to-copper hover:from-amber-600 hover:to-copper-bright text-white font-mono font-bold text-xs uppercase tracking-widest rounded-xl shadow-lg hover:shadow-gold/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-3">
          <span>VIEW ALL PACKAGES &amp; CATALOG</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>
    </section>

    <!-- THE FOUNDRY METHOD SECTION -->
    <section
      class="bg-patina-50 dark:bg-[#0B0C0E] text-slate-800 dark:text-parchment pb-[52px] lg:pb-[110px] transition-colors duration-300">
      <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-12 lg:gap-24">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

          <!-- Left Column: Our Process -->
          <div class="lg:col-span-5 flex flex-col gap-6">
            <div
              class="flex items-center gap-2.5 font-mono text-xs text-gold tracking-[0.25em] uppercase font-semibold">
              <i data-lucide="flame" class="w-4 h-4 text-gold"></i>
              <span>OUR PROCESS</span>
            </div>

            <h2
              class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl text-slate-900 dark:text-parchment uppercase tracking-tight leading-none">
              FROM WAX<br />
              TO PRESENCE<span class="text-gold">.</span>
            </h2>

            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm font-sans leading-relaxed max-w-md">
              Every figure emerging from our Patan foundry follows strict iconometric proportions derived from Sanskrit
              treatises such as the Sāmāṅgara Sūtradhāra.
            </p>

            <div class="grid grid-cols-3 gap-3 pt-4 border-t border-slate-200 dark:border-slate-800">
              <div class="flex flex-col gap-1 pr-3 border-r border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-1.5">
                  <i data-lucide="sparkles" class="w-4 h-4 text-gold shrink-0"></i>
                  <span class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment">600+</span>
                </div>
                <span class="font-mono text-[10px] text-slate-500 dark:text-slate-400 leading-tight">Sacred
                  Icons<br />Crafted</span>
              </div>

              <div class="flex flex-col gap-1 px-3 border-r border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-1.5">
                  <i data-lucide="users" class="w-4 h-4 text-gold shrink-0"></i>
                  <span class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment">30+</span>
                </div>
                <span class="font-mono text-[10px] text-slate-500 dark:text-slate-400 leading-tight">Master
                  Artisans<br />&amp;
                  Specialists</span>
              </div>

              <div class="flex flex-col gap-1 pl-3">
                <div class="flex items-center gap-1.5">
                  <i data-lucide="clock" class="w-4 h-4 text-gold shrink-0"></i>
                  <span class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment">4-8
                    Weeks</span>
                </div>
                <span class="font-mono text-[10px] text-slate-500 dark:text-slate-400 leading-tight">Typical
                  Casting<br />Timeline</span>
              </div>
            </div>
          </div>

          <!-- Right Column: Step List -->
          <div
            class="lg:col-span-7 bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-5 sm:p-6 shadow-xl dark:shadow-2xl transition-colors duration-300">
            <div class="grid grid-cols-1 md:grid-cols-10 gap-6 items-center">
              <div class="md:col-span-10 flex flex-col divide-y divide-slate-200 dark:divide-slate-800/80">

                <!-- Step 01 -->
                <div class="py-3.5 flex items-center justify-between gap-4">
                  <div class="flex items-start gap-4">
                    <span
                      class="font-display italic text-2xl sm:text-3xl font-light text-gold tracking-tight shrink-0">01</span>
                    <div class="flex flex-col gap-0.5">
                      <h4
                        class="font-display font-semibold text-sm sm:text-base text-slate-900 dark:text-parchment uppercase tracking-wide">
                        WAX MODELLING</h4>
                      <p class="text-slate-600 dark:text-slate-400 text-[11px] font-sans leading-relaxed">
                        The sacred figure is modelled in wax according to prescribed proportions and iconometric
                        measurements.
                      </p>
                    </div>
                  </div>
                  <div class="flex flex-col items-center gap-1 shrink-0 text-gold">
                    <i data-lucide="shapes" class="w-4 h-4 text-gold"></i>
                    <span class="font-mono text-[9px] tracking-widest uppercase font-bold">FORM</span>
                  </div>
                </div>

                <!-- Step 02 -->
                <div class="py-3.5 flex items-center justify-between gap-4">
                  <div class="flex items-start gap-4">
                    <span
                      class="font-display italic text-2xl sm:text-3xl font-light text-gold tracking-tight shrink-0">02</span>
                    <div class="flex flex-col gap-0.5">
                      <h4
                        class="font-display font-semibold text-sm sm:text-base text-slate-900 dark:text-parchment uppercase tracking-wide">
                        CLAY INVESTMENT</h4>
                      <p class="text-slate-600 dark:text-slate-400 text-[11px] font-sans leading-relaxed">
                        Local Kathmandu Valley clay and rice-husk material gradually encases the wax model in multiple
                        layers.
                      </p>
                    </div>
                  </div>
                  <div class="flex flex-col items-center gap-1 shrink-0 text-gold">
                    <i data-lucide="layers" class="w-4 h-4 text-gold"></i>
                    <span class="font-mono text-[9px] tracking-widest uppercase font-bold">SHELL</span>
                  </div>
                </div>

                <!-- Step 03 -->
                <div class="py-3.5 flex items-center justify-between gap-4">
                  <div class="flex items-start gap-4">
                    <span
                      class="font-display italic text-2xl sm:text-3xl font-light text-gold tracking-tight shrink-0">03</span>
                    <div class="flex flex-col gap-0.5">
                      <h4
                        class="font-display font-semibold text-sm sm:text-base text-slate-900 dark:text-parchment uppercase tracking-wide">
                        SACRED ALLOY</h4>
                      <p class="text-slate-600 dark:text-slate-400 text-[11px] font-sans leading-relaxed">
                        The wax is removed and molten Ashtadhatu or selected bronze alloy is introduced into the
                        prepared mould.
                      </p>
                    </div>
                  </div>
                  <div class="flex flex-col items-center gap-1 shrink-0 text-gold">
                    <i data-lucide="flame" class="w-4 h-4 text-gold"></i>
                    <span class="font-mono text-[9px] tracking-widest uppercase font-bold">CAST</span>
                  </div>
                </div>

                <!-- Step 04 -->
                <div class="py-3.5 flex items-center justify-between gap-4">
                  <div class="flex items-start gap-4">
                    <span
                      class="font-display italic text-2xl sm:text-3xl font-light text-gold tracking-tight shrink-0">04</span>
                    <div class="flex flex-col gap-0.5">
                      <h4
                        class="font-display font-semibold text-sm sm:text-base text-slate-900 dark:text-parchment uppercase tracking-wide">
                        CHISELING &amp; GILDING</h4>
                      <p class="text-slate-600 dark:text-slate-400 text-[11px] font-sans leading-relaxed">
                        Cold-chiseling, polishing, fire gilding and final hand-painted details complete the sacred
                        image.
                      </p>
                    </div>
                  </div>
                  <div class="flex flex-col items-center gap-1 shrink-0 text-gold">
                    <i data-lucide="sparkles" class="w-4 h-4 text-gold"></i>
                    <span class="font-mono text-[9px] tracking-widest uppercase font-bold">FINISH</span>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>

        <!-- Bottom Features Bar -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 rounded-2xl p-5 shadow-xl dark:shadow-2xl grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-4 divide-y sm:divide-y-0 sm:divide-x divide-slate-200 dark:divide-slate-800/80 transition-colors duration-300">

          <div class="flex items-center gap-3 px-2 py-1">
            <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0">
              <i data-lucide="globe" class="w-5 h-5"></i>
            </div>
            <div class="font-mono leading-snug text-slate-900 dark:text-parchment">
              <strong class="block text-base font-bold">Worldwide</strong>
              <span class="text-xs text-slate-500 dark:text-slate-400">Secure Shipping</span>
            </div>
          </div>

          <div class="flex items-center gap-3 px-2 py-1">
            <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0">
              <i data-lucide="ruler" class="w-5 h-5"></i>
            </div>
            <div class="font-mono leading-snug text-slate-900 dark:text-parchment">
              <strong class="block text-base font-bold">Custom Dimensions</strong>
              <span class="text-xs text-slate-500 dark:text-slate-400">On Request</span>
            </div>
          </div>

          <div class="flex items-center gap-3 px-2 py-1">
            <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0">
              <i data-lucide="shield-check" class="w-5 h-5"></i>
            </div>
            <div class="font-mono leading-snug text-slate-900 dark:text-parchment">
              <strong class="block text-base font-bold">Lifetime Care</strong>
              <span class="text-xs text-slate-500 dark:text-slate-400">&amp; Maintenance</span>
            </div>
          </div>

          <div class="flex items-center gap-3 px-2 py-1">
            <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0">
              <i data-lucide="flame" class="w-5 h-5"></i>
            </div>
            <div class="font-mono leading-snug text-slate-900 dark:text-parchment">
              <strong class="block text-base font-bold">Monastic Blessing</strong>
              <span class="text-xs text-slate-500 dark:text-slate-400">Available</span>
            </div>
          </div>

          <div class="flex items-center gap-3 px-2 py-1">
            <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0">
              <i data-lucide="award" class="w-5 h-5"></i>
            </div>
            <div class="font-mono leading-snug text-slate-900 dark:text-parchment">
              <strong class="block text-base font-bold">Certificate of Authenticity</strong>
              <span class="text-xs text-slate-500 dark:text-slate-400">Included</span>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- CRAFTED WITH HERITAGE, MADE TO LAST SECTION -->
    <section id="heritage-craft"
      class="sm:pb-12 lg:pb-24 relative overflow-hidden bg-patina-50 dark:bg-[#12100C] transition-colors duration-300">

      <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-gold/10 dark:bg-gold/5 blur-[140px] rounded-full pointer-events-none">
      </div>

      <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-6 sm:mb-14">
          <h2
            class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-parchment tracking-tight leading-tight mb-4">
            Crafted with Heritage, Made to Last
          </h2>
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed">
            What makes our sacred sculptures different is the craftsmanship, patience and Nepalese heritage behind every
            piece we create.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 lg:gap-8">

          <!-- CARD 01 -->
          <div
            class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div>
              <div class="flex items-center justify-between gap-4 mb-6">
                <div
                  class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
                  <i data-lucide="feather" class="w-5 h-5"></i>
                </div>
              </div>
              <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
                Authentic Nepalese Craftsmanship
              </h3>
              <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
                Each sculpture is created in Nepal using traditional metalworking techniques shaped by generations of
                artistic knowledge and heritage.
              </p>
            </div>
          </div>

          <!-- CARD 02 -->
          <div
            class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div>
              <div class="flex items-center justify-between gap-4 mb-6">
                <div
                  class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
                  <i data-lucide="user" class="w-5 h-5"></i>
                </div>
              </div>
              <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
                Handcrafted, Never Mass Produced
              </h3>
              <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
                Every statue passes through skilled artisan hands. From wax modeling to finishing, no piece is simply
                taken from a production line.
              </p>
            </div>
          </div>

          <!-- CARD 03 -->
          <div
            class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div>
              <div class="flex items-center justify-between gap-4 mb-6">
                <div
                  class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
                  <i data-lucide="timer" class="w-5 h-5"></i>
                </div>
              </div>
              <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
                Meticulous Detail &amp; Proportion
              </h3>
              <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
                Facial expressions, hand gestures, ornaments and traditional proportions are carefully refined to
                preserve the character of each deity.
              </p>
            </div>
          </div>

          <!-- CARD 04 -->
          <div
            class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div>
              <div class="flex items-center justify-between gap-4 mb-6">
                <div
                  class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
                  <i data-lucide="star" class="w-5 h-5"></i>
                </div>
              </div>
              <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
                Premium Metal &amp; Finishes
              </h3>
              <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
                We work with carefully selected bronze, brass, copper and refined finishes to create sculptures with
                depth, character and lasting beauty.
              </p>
            </div>
          </div>

          <!-- CARD 05 -->
          <div
            class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div>
              <div class="flex items-center justify-between gap-4 mb-6">
                <div
                  class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
                  <i data-lucide="crosshair" class="w-5 h-5"></i>
                </div>
              </div>
              <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
                Custom Commissions
              </h3>
              <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
                From intimate altar pieces to large sacred sculptures, we can create custom dimensions, finishes and
                specifications for individual commissions.
              </p>
            </div>
          </div>

          <!-- CARD 06 -->
          <div
            class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
            <div>
              <div class="flex items-center justify-between gap-4 mb-6">
                <div
                  class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
                  <i data-lucide="globe" class="w-5 h-5"></i>
                </div>
              </div>
              <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
                Worldwide Delivery
              </h3>
              <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
                Your sculpture is carefully inspected, protected and prepared for secure international delivery from our
                workshop to your collection or sacred space.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- VENERATED PATRON REVIEWS & ENDORSEMENTS SLIDER SECTION -->
    <section id="reviews" class="py-12 lg:pb-24 relative overflow-hidden transition-colors duration-300">

      <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-gold/10 dark:bg-gold/5 blur-[120px] rounded-full pointer-events-none">
      </div>

      <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
          <div class="flex flex-col gap-3">
            <h2
              class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-parchment tracking-tight leading-tight">
              Testimonials from Our Clients
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed">
              Venerated reviews from Buddhist monasteries, museum curators, international collectors, and sacred art
              connoisseurs across 34 nations.
            </p>
          </div>

          <div class="flex items-center gap-3 self-start md:self-end shrink-0">
            <div class="flex items-center gap-2">
              <button id="prevReviewBtn"
                class="w-10 h-10 rounded-xl bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-slate-700 dark:text-parchment hover:text-gold hover:border-gold hover:bg-gold/10 transition-colors shadow-sm"
                aria-label="Previous Slide">
                <i data-lucide="chevron-left" class="w-5 h-5"></i>
              </button>
              <button id="nextReviewBtn"
                class="w-10 h-10 rounded-xl bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-slate-700 dark:text-parchment hover:text-gold hover:border-gold hover:bg-gold/10 transition-colors shadow-sm"
                aria-label="Next Slide">
                <i data-lucide="chevron-right" class="w-5 h-5"></i>
              </button>
            </div>
          </div>
        </div>

        <div id="reviewsSliderContainer" class="overflow-hidden relative rounded-2xl py-2 px-1">
          <div id="reviewsTrack" class="flex transition-transform duration-500 ease-out">

            <!-- REVIEW CARD 1 -->
            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
              <div
                class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
                <div>
                  <div class="flex items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                    </div>
                    <span
                      class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                      <i data-lucide="shield-check" class="w-3 h-3"></i> Monastic Seal
                    </span>
                  </div>

                  <div
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                    <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                    <span>Green Tara — 24K Gold (22.5 in)</span>
                  </div>

                  <p
                    class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                    "The iconometric precision of the 124 Angula grid on our Green Tara is flawless. When the 24K
                    mercury gilding caught the butter lamps in the shrine room, the monastic assembly was deeply
                    moved. Shrestha Atelier preserves the true soul of Patan metallurgy."
                  </p>
                </div>

                <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
                  <div
                    class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                    LW
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">Lama
                      Tenzin Wangyal</span>
                    <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">Abbot, Drukpa
                      Monastery • Paro, Bhutan</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- REVIEW CARD 2 -->
            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
              <div
                class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
                <div>
                  <div class="flex items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                    </div>
                    <span
                      class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                      <i data-lucide="award" class="w-3 h-3"></i> Museum Curator
                    </span>
                  </div>

                  <div
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                    <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                    <span>Mahakala 6-Armed Protector</span>
                  </div>

                  <p
                    class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                    "As a museum curator, finding contemporary lost-wax bronze casting that matches 14th-century
                    Malla dynasty density is exceptionally rare. Spectrometry testing confirmed authentic 8-metal
                    Ashtadhatu alloy. Phenomenal art historical fidelity."
                  </p>
                </div>

                <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
                  <div
                    class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                    ES
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">Dr.
                      Evelyn V. Sterling</span>
                    <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">Curator, Royal
                      Heritage • London, UK</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- REVIEW CARD 3 -->
            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
              <div
                class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
                <div>
                  <div class="flex items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                    </div>
                    <span
                      class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                      <i data-lucide="badge-check" class="w-3 h-3"></i> Verified Collector
                    </span>
                  </div>

                  <div
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                    <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                    <span>Shakyamuni Buddha Bhumisparsha</span>
                  </div>

                  <p
                    class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                    "The cold-gold painted face and hand-chiseled antiqued dark bronze patina have an extraordinary
                    spiritual presence in my gallery. The escrow process was seamless, and the physical certificate
                    signed by Master Rajan Tamrakar gives absolute provenance."
                  </p>
                </div>

                <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
                  <div
                    class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                    JM
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">Jean-Luc
                      Moreau</span>
                    <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">Sacred Art
                      Collector • Geneva, Switzerland</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- REVIEW CARD 4 -->
            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
              <div
                class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
                <div>
                  <div class="flex items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                    </div>
                    <span
                      class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                      <i data-lucide="award" class="w-3 h-3"></i> Museum Acquisition
                    </span>
                  </div>

                  <div
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                    <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                    <span>Mahakala 6-Armed — Ashtadhatu (18 in)</span>
                  </div>

                  <p
                    class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                    "Acquiring the 6-Armed Mahakala for our Himalayan sacred art gallery exceeded all curatorial expectations. The alloy density, cold-hammered chiseled jewelry, and Sanskrit consecration chamber make this a museum-grade masterpiece."
                  </p>
                </div>

                <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
                  <div
                    class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                    DR
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">Dr. Henriette Richter</span>
                    <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">Curator of Asian Art, Museum Rietberg • Zurich, Switzerland</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- REVIEW CARD 5 -->
            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
              <div
                class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
                <div>
                  <div class="flex items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                    </div>
                    <span
                      class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                      <i data-lucide="shield-check" class="w-3 h-3"></i> Private Collection
                    </span>
                  </div>

                  <div
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                    <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                    <span>Shakyamuni Buddha — 24K Gilt (24 in)</span>
                  </div>

                  <p
                    class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                    "Commissioning our Shakyamuni Buddha was a transcendent experience. Receiving photo documentation of the lost-wax casting and Patan monastery blessing gave our family a profound spiritual heirloom that will endure for centuries."
                  </p>
                </div>

                <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
                  <div
                    class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                    KC
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">Kenjiro & Saki Takahashi</span>
                    <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">Private Collectors • Kyoto, Japan</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- REVIEW CARD 6 -->
            <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
              <div
                class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
                <div>
                  <div class="flex items-center justify-between gap-2 mb-4">
                    <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                      <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                    </div>
                    <span
                      class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                      <i data-lucide="shield-check" class="w-3 h-3"></i> Monastic Consecration
                    </span>
                  </div>

                  <div
                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                    <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                    <span>Chenrezig 1000-Armed Compassion</span>
                  </div>

                  <p
                    class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                    "When our nunnery received the thousand-armed Chenrezig, each hand icon accurately held its sacred implement according to the ancient Tibetan canon. The consecrated hollow core allowed our traditional mantra scrolls and relic pills to be sealed with complete monastic reverence."
                  </p>
                </div>

                <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
                  <div
                    class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                    AD
                  </div>
                  <div class="flex flex-col min-w-0">
                    <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">Ani Choying Drolma</span>
                    <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">Nagi Gompa Hermitage • Kathmandu, Nepal</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Mobile Slide Indicators -->
        <div class="flex items-center justify-center gap-2 mt-8 md:hidden">
          <?php for ($i = 0; $i < 6; $i++): ?>
            <button class="review-indicator w-2.5 h-2.5 rounded-full <?php echo $i === 0 ? 'bg-gold' : 'bg-slate-300 dark:bg-slate-700'; ?> transition-all duration-300"
              data-slide-to="<?php echo $i; ?>" aria-label="Go to slide <?php echo $i + 1; ?>"></button>
          <?php endfor; ?>
        </div>

      </div>
    </section>

  </main>

<?php
get_footer();
