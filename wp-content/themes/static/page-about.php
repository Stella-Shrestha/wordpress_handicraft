<?php
/**
 * Template Name: About Us Page
 *
 * @package ShresthaHandicraft
 */

get_header();
?>

  <!-- MAIN ABOUT US CONTENT -->
  <main class="w-full">

    <!-- HERO SECTION -->
    <section class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-24">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">

        <!-- Left Column (Hero Content) -->
        <div class="lg:col-span-7 flex flex-col gap-6">
          <!-- Top Pill Tag -->
          <div
            class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white dark:bg-patina-900 border border-gold/30 text-gold font-mono text-[11px] font-semibold tracking-wider uppercase w-fit shadow-sm">
            <span class="w-2 h-2 rounded-full bg-gold animate-pulse"></span>
            <span>OUR STORY • PATAN, NEPAL</span>
          </div>

          <!-- Headline -->
          <h1
            class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-slate-900 dark:text-parchment leading-[1.15]">
            Rooted in <span
              class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Tradition.</span><br />
            Crafted for <span
              class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Generations.</span>
          </h1>

          <!-- Body Paragraph -->
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base max-w-xl font-sans leading-relaxed">
            Shrestha Handicraft is a Nepalese atelier dedicated to preserving the art of handcrafted metal sculpture.
            From the historic streets of Patan, we create bronze, brass, copper and traditional alloy sculptures
            inspired by Nepal's rich artistic heritage.
          </p>

          <!-- CTA Action Buttons -->
          <div class="flex flex-wrap items-center gap-4 mt-2">
            <a href="#our-story"
              class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center gap-2">
              <span>DISCOVER OUR STORY</span>
            </a>
            <a href="#our-atelier"
              class="px-6 py-3.5 bg-white dark:bg-patina-900 border border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
              <span>EXPLORE OUR ATELIER</span>
            </a>
          </div>

          <!-- Bottom Hero Stats Summary Row -->
          <div class="border-t border-slate-200 dark:border-gold/20 pt-6 mt-4 grid grid-cols-3 gap-4 max-w-lg">
            <div>
              <span class="font-display text-2xl font-bold text-gold">01</span>
              <span
                class="block font-mono text-[10px] text-slate-500 dark:text-slate-400 tracking-widest uppercase mt-0.5">PATAN
                ATELIER</span>
            </div>
            <div>
              <span class="font-display text-2xl font-bold text-gold">04</span>
              <span
                class="block font-mono text-[10px] text-slate-500 dark:text-slate-400 tracking-widest uppercase mt-0.5">CORE
                MATERIALS</span>
            </div>
            <div>
              <span class="font-display text-2xl font-bold text-gold">∞</span>
              <span
                class="block font-mono text-[10px] text-slate-500 dark:text-slate-400 tracking-widest uppercase mt-0.5">LIVING
                TRADITION</span>
            </div>
          </div>
        </div>

        <!-- Right Column (Hero Visual Card) -->
        <div class="lg:col-span-5 relative">
          <div
            class="relative bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 shadow-2xl overflow-hidden group">
            <div class="relative w-full h-[460px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
              <img src="<?php echo shrestha_asset('green_tara.jpg'); ?>" alt="Green Tara Statue"
                class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out" />

              <!-- HUD Crosshairs Overlay -->
              <div class="absolute inset-0 border border-gold/20 pointer-events-none">
                <div class="absolute top-3 left-3 w-3 h-3 border-t-2 border-l-2 border-gold"></div>
                <div class="absolute top-3 right-3 w-3 h-3 border-t-2 border-r-2 border-gold"></div>
                <div class="absolute bottom-3 left-3 w-3 h-3 border-b-2 border-l-2 border-gold"></div>
                <div class="absolute bottom-3 right-3 w-3 h-3 border-b-2 border-r-2 border-gold"></div>
                <div class="absolute bottom-3 left-3 right-3 text-center">
                  <span
                    class="bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30">ICONOMETRIC
                    RATIO 1:1.618 • PATAN ATELIER</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- SECTION 01: OUR STORY -->
    <section id="our-story"
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start">

        <!-- Left Header -->
        <div class="lg:col-span-5 flex flex-col gap-3">
          <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase">01 - OUR STORY</span>
          <h2
            class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
            A Craft <span
              class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Passed
              Down.</span>
          </h2>
          <div class="w-16 h-0.5 bg-gold/60 mt-2"></div>
        </div>

        <!-- Right Content & Quote Box -->
        <div
          class="lg:col-span-7 flex flex-col gap-6 text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
          <p>
            In the historic artisan quarters of Patan, metalwork is more than a profession. It is a tradition shaped by
            generations of knowledge, patience and devotion.
          </p>
          <p>
            Shrestha Handicraft was established with a simple purpose: to preserve this living tradition while creating
            sculptures that can be appreciated by collectors, devotees and art lovers around the world.
          </p>
          <p>
            Each piece begins as an idea and gradually takes form through modelling, mould preparation, metal casting,
            chasing, polishing and finishing. The process is deliberately detailed because craftsmanship cannot be
            rushed.
          </p>

          <!-- Quote Box -->
          <div
            class="bg-[#F8F4EB] dark:bg-patina-900/90 border-l-4 border-gold p-6 sm:p-8 rounded-r-2xl shadow-sm mt-2">
            <p class="font-display italic text-lg sm:text-xl text-slate-800 dark:text-parchment leading-snug">
              "A meaningful sculpture is not simply made. It is patiently shaped through knowledge, proportion and
              hand."
            </p>
            <span class="font-mono text-[10px] tracking-widest uppercase text-gold font-semibold mt-4 block">
              THE SHRESTHA HANDICRAFT PHILOSOPHY
            </span>
          </div>
        </div>

      </div>
    </section>

    <!-- SECTION 02: OUR HERITAGE -->
    <section
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
      <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase block mb-2">02 - OUR
          HERITAGE</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment mb-4">
          The Living Art of <span
            class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Patan</span>
        </h2>
        <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed">
          Patan has long been celebrated for its metal sculpture and traditional craftsmanship. Our work is inspired by
          this cultural environment and the techniques that continue to define Nepalese sacred art.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-7 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col gap-4">
          <div class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold">
            <i data-lucide="award" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Living Tradition</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            Traditional knowledge continues to influence how each sculpture is designed, shaped and finished.
          </p>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-7 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col gap-4">
          <div class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold">
            <i data-lucide="landmark" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Patan Craftsmanship</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            Our atelier is connected to the artistic communities of the Kathmandu Valley.
          </p>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-7 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col gap-4">
          <div class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold">
            <i data-lucide="sparkles" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Shared Worldwide</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            Our sculptures allow people around the world to experience Nepalese metal craftsmanship.
          </p>
        </div>
      </div>
    </section>

    <!-- SECTION 03: OUR ARTISANS -->
    <section
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

        <!-- Left Image Column with Overlay -->
        <div class="lg:col-span-6 relative">
          <div
            class="relative w-full h-[400px] sm:h-[480px] rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-gold/20 bg-slate-900">
            <img src="<?php echo shrestha_asset('footer_buddha_statue.jpg'); ?>" alt="The Hands Behind the Art"
              class="w-full h-full object-cover filter brightness-95" />
          </div>

          <!-- Floating Dark Overlay Card -->
          <div
            class="absolute bottom-6 right-6 left-6 sm:left-auto sm:max-w-xs bg-[#0E131B]/95 border border-gold/30 backdrop-blur-md p-5 rounded-xl text-white shadow-2xl">
            <span class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold">THE PEOPLE</span>
            <h4 class="font-display font-bold text-base text-parchment mt-0.5">Skilled Hands.</h4>
            <p class="text-slate-300 text-xs mt-1 font-sans leading-relaxed">
              Craftsmanship lives through the people who practice it.
            </p>
          </div>
        </div>

        <!-- Right Content Column -->
        <div class="lg:col-span-6 flex flex-col gap-6">
          <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase">03 - OUR ARTISANS</span>
          <h2
            class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
            The Hands Behind the <span
              class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Art.</span>
          </h2>
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
            A sculpture carries the character of the hands that create it. Our artisans work patiently through every
            stage of the process, from the first wax model to the final surface finish.
          </p>
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
            We believe that preserving craftsmanship means supporting the knowledge, precision and creativity of the
            people who continue to practice it.
          </p>

          <!-- Bottom Info Grid -->
          <div class="border-t border-slate-200 dark:border-gold/20 pt-6 grid grid-cols-2 gap-6 mt-2">
            <div>
              <span class="font-display text-2xl font-bold text-slate-900 dark:text-parchment block">Hand</span>
              <span
                class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold block mt-0.5">FINISHED
                DETAILS</span>
            </div>
            <div>
              <span class="font-display text-2xl font-bold text-slate-900 dark:text-parchment block">Patan</span>
              <span class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold block mt-0.5">ARTISAN
                COMMUNITY</span>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- SECTION 04: CORE MATERIALS -->
    <section
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
      <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase block mb-2">04 - CORE
          MATERIALS</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment">
          The Character of <span
            class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Metal.</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-xs font-bold text-gold block mb-2">01</span>
            <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment mb-2">Bronze</h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Valued for its durability and rich depth of tone, bronze is widely used for detailed sculptural work.
            </p>
          </div>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-xs font-bold text-gold block mb-2">02</span>
            <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment mb-2">Brass</h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Warm and luminous, brass creates a distinctive golden character across traditional and contemporary
              sculptures.
            </p>
          </div>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-xs font-bold text-gold block mb-2">03</span>
            <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment mb-2">Copper</h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Copper brings a warm reddish tone and has a long history within Nepalese metal craftsmanship.
            </p>
          </div>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col justify-between gap-4">
          <div>
            <span class="font-mono text-xs font-bold text-gold block mb-2">04</span>
            <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment mb-2">Traditional Alloys</h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Selected multi-metal alloys can be used where appropriate to the sculpture and its intended tradition.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 05: OUR PHILOSOPHY -->
    <section
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
      <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase block mb-2">05 - OUR
          PHILOSOPHY</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment">
          What We <span
            class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Believe.</span>
        </h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col gap-3">
          <div
            class="w-10 h-10 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-1">
            <i data-lucide="ruler" class="w-5 h-5"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Precision</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            Proportion, symmetry and detail matter at every stage.
          </p>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col gap-3">
          <div
            class="w-10 h-10 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-1">
            <i data-lucide="flame" class="w-5 h-5"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Craftsmanship</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            We value careful hands, patient processes and meaningful detail.
          </p>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col gap-3">
          <div
            class="w-10 h-10 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-1">
            <i data-lucide="award" class="w-5 h-5"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Respect</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            Sacred art deserves cultural awareness, care and responsibility.
          </p>
        </div>

        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col gap-3">
          <div
            class="w-10 h-10 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-1">
            <i data-lucide="shield-check" class="w-5 h-5"></i>
          </div>
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Continuity</h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            Our goal is to keep traditional craftsmanship relevant for future generations.
          </p>
        </div>
      </div>
    </section>

    <!-- SECTION 06: OUR ATELIER -->
    <section id="our-atelier"
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

        <!-- Left Column Visual -->
        <div class="lg:col-span-6">
          <div
            class="w-full h-[380px] sm:h-[450px] rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-gold/20 bg-slate-900 relative">
            <img src="<?php echo shrestha_asset('shakyamuni.jpg'); ?>" alt="Where the Work Begins"
              class="w-full h-full object-cover filter brightness-95" />
          </div>
        </div>

        <!-- Right Content Column -->
        <div class="lg:col-span-6 flex flex-col gap-6">
          <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase">06 - OUR ATELIER</span>
          <h2
            class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
            Where the Work <span
              class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Begins.</span>
          </h2>
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
            Our atelier is the heart of Shrestha Handicraft. It is where designs become wax models, wax models become
            metal forms, and raw surfaces gradually become finished sculptures.
          </p>

          <!-- Location Info List -->
          <div class="flex flex-col gap-4 my-2">
            <div class="flex items-start gap-3">
              <div
                class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0 mt-0.5">
                <i data-lucide="map-pin" class="w-4 h-4"></i>
              </div>
              <div>
                <h4 class="font-display font-bold text-sm text-slate-900 dark:text-parchment">Patan, Lalitpur</h4>
                <p class="text-slate-500 dark:text-slate-400 text-xs font-sans">Kathmandu Valley, Nepal</p>
              </div>
            </div>

            <div class="flex items-start gap-3">
              <div
                class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0 mt-0.5">
                <i data-lucide="clock" class="w-4 h-4"></i>
              </div>
              <div>
                <h4 class="font-display font-bold text-sm text-slate-900 dark:text-parchment">Atelier Visits</h4>
                <p class="text-slate-500 dark:text-slate-400 text-xs font-sans">Available by prior arrangement</p>
              </div>
            </div>
          </div>

          <!-- Visit Link -->
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="inline-flex items-center gap-2 font-mono text-xs font-bold text-gold hover:text-gold-bright uppercase tracking-wider transition-colors mt-2">
            <span>VISIT OUR ATELIER</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- SECTION 07: WHY CHOOSE US -->
    <section id="why-choose-us"
      class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10 relative overflow-hidden">
      
      <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-gold/5 dark:bg-gold/5 blur-[120px] rounded-full pointer-events-none">
      </div>

      <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16 relative z-10">
        <div
          class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white dark:bg-patina-900 border border-gold/30 text-gold font-mono text-[11px] font-semibold tracking-wider uppercase mb-4 shadow-sm">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
          <span>07 — WHY CHOOSE SHRESTHA HANDICRAFT</span>
        </div>
        <h2
          class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment tracking-tight leading-tight mb-4">
          Sacred Heritage, <span
            class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Uncompromising Standards.</span>
        </h2>
        <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
          From master Newar lost-wax casting and strict iconometric proportions to museum-grade curation and worldwide insured delivery, discover why temples, monasteries, and discerning collectors entrust their sacred acquisitions to our Patan atelier.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 mb-12">
        
        <!-- Feature Card 1 -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <div
                class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
                <i data-lucide="flame" class="w-6 h-6"></i>
              </div>
              <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
                Cire Perdue
              </span>
            </div>
            <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
              Authentic Lost-Wax Casting
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Each deity statue is individually sculpted in pure Himalayan beeswax, encased in traditional river-clay moulds, and fire-cast in molten bronze. Never stamped, never mass-produced.
            </p>
          </div>
          <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
            <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
            <span>Singular One-of-a-Kind Casts</span>
          </div>
        </div>

        <!-- Feature Card 2 -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <div
                class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
                <i data-lucide="landmark" class="w-6 h-6"></i>
              </div>
              <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
                Patan Origin
              </span>
            </div>
            <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
              Direct Atelier Sourcing
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Acquire directly from our family atelier in the UNESCO-recognized city of Patan. Every acquisition bypasses intermediaries and directly preserves multi-generational Newar craftsmanship.
            </p>
          </div>
          <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
            <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
            <span>100% Ethical Artisan Support</span>
          </div>
        </div>

        <!-- Feature Card 3 -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <div
                class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
                <i data-lucide="compass" class="w-6 h-6"></i>
              </div>
              <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
                Shilpa Shastra
              </span>
            </div>
            <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
              Strict Canonical Iconometry
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Every curve, posture, mudra hand gesture, and facial feature faithfully adheres to sacred Angula and Tala iconometric proportions specified in ancient Buddhist and Hindu scriptures.
            </p>
          </div>
          <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
            <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
            <span>Exact Consecration Ready</span>
          </div>
        </div>

        <!-- Feature Card 4 -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <div
                class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
                <i data-lucide="award" class="w-6 h-6"></i>
              </div>
              <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
                Sacred Alloys
              </span>
            </div>
            <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
              Ashtadhatu &amp; 24K Fire Gilding
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Formulated with pure 8-metal alloys, hand-burnished 24K gold-leaf fire gilding, semi-precious stone inlays, and master cold-gold painted faces with unyielding lustre across lifetimes.
            </p>
          </div>
          <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
            <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
            <span>Museum-Grade Metallurgy</span>
          </div>
        </div>

        <!-- Feature Card 5 -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <div
                class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
                <i data-lucide="sparkles" class="w-6 h-6"></i>
              </div>
              <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
                Custom Orders
              </span>
            </div>
            <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
              Bespoke Temple Commissions
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Collaborate directly with our master sculptors for tailor-made deity manifestations, custom dimension requirements, sealed hollow consecration cavities, and unique alloy compositions.
            </p>
          </div>
          <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
            <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
            <span>Personalized Atelier Guidance</span>
          </div>
        </div>

        <!-- Feature Card 6 -->
        <div
          class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <div
                class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
              </div>
              <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
                Worldwide Care
              </span>
            </div>
            <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
              Insured White-Glove Dispatch
            </h3>
            <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
              Each specimen is fortified in custom shock-absorbing timber crates with tamper-evident seals, full international transit insurance, and Department of Archaeology export clearances.
            </p>
          </div>
          <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
            <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
            <span>Doorstep Global Delivery</span>
          </div>
        </div>

      </div>

      <!-- Atelier Trust & Assurance Banner -->
      <div
        class="bg-gradient-to-r from-[#F6F0E4] via-white to-[#F3ECE2] dark:from-[#131518] dark:via-[#1A1D22] dark:to-[#131518] border border-gold/30 rounded-2xl p-6 sm:p-8 shadow-xl relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center divide-y sm:divide-y-0 sm:divide-x divide-slate-200 dark:divide-gold/20">
          <div class="flex flex-col items-center justify-center p-2">
            <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="40" data-suffix="+" data-start="0" data-duration="1800">40+</span>
            <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Years Foundry Heritage</span>
            <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Operating in Patan since 1982</span>
          </div>
          <div class="flex flex-col items-center justify-center p-2">
            <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="100" data-suffix="%" data-start="0" data-duration="2000">100%</span>
            <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Hand-Cast Authenticity</span>
            <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Certified lost-wax bronze</span>
          </div>
          <div class="flex flex-col items-center justify-center p-2">
            <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="50" data-suffix="+" data-start="0" data-duration="1800">50+</span>
            <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Countries Delivered</span>
            <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Safe white-glove transit</span>
          </div>
          <div class="flex flex-col items-center justify-center p-2">
            <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="0" data-suffix="" data-start="8" data-duration="1400">0</span>
            <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Intermediaries</span>
            <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Direct to master artisans</span>
          </div>
        </div>
      </div>

    </section>

    <!-- BOTTOM CALL TO ACTION BANNER -->
    <section class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-20">
      <div
        class="bg-[#F6F0E4] dark:bg-patina-900 border border-gold/30 rounded-3xl p-8 sm:p-14 relative overflow-hidden shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">

        <!-- Decorative Floral Watermark Graphic -->
        <div class="absolute right-[-30px] bottom-[-30px] opacity-10 dark:opacity-15 pointer-events-none text-gold">
          <svg width="340" height="340" viewBox="0 0 100 100" fill="currentColor">
            <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="1.5" fill="none" />
            <circle cx="50" cy="50" r="32" stroke="currentColor" stroke-width="1" fill="none" />
            <circle cx="50" cy="50" r="18" stroke="currentColor" stroke-width="1" fill="none" />
            <path d="M50,5 Q55,25 50,50 Q45,25 50,5" />
            <path d="M50,95 Q55,75 50,50 Q45,75 50,95" />
            <path d="M5,50 Q25,55 50,50 Q25,45 5,50" />
            <path d="M95,50 Q75,55 50,50 Q75,45 95,50" />
            <path d="M18,18 Q35,30 50,50 Q30,35 18,18" />
            <path d="M82,82 Q65,70 50,50 Q70,65 82,82" />
            <path d="M82,18 Q70,35 50,50 Q65,30 82,18" />
            <path d="M18,82 Q30,65 50,50 Q35,70 18,82" />
          </svg>
        </div>

        <div class="flex flex-col gap-3 max-w-2xl z-10">
          <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase">CONTINUE YOUR JOURNEY</span>
          <h2 class="font-display text-3xl sm:text-4xl font-bold text-slate-900 dark:text-parchment leading-tight">
            Discover the Art <span
              class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">of Shrestha
              Handicraft.</span>
          </h2>
          <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed mt-1">
            Explore our collection of handcrafted sculptures or speak with our atelier team about finding a piece that
            feels right for you.
          </p>
        </div>

        <div class="flex flex-wrap items-center gap-4 shrink-0 z-10">
          <a href="<?php echo esc_url(home_url('/catalog/')); ?>"
            class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center gap-2">
            <span>EXPLORE COLLECTION +</span>
          </a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="px-6 py-3.5 bg-white/80 dark:bg-patina-950/80 border border-gold/50 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
            <span>CONTACT OUR ATELIER</span>
          </a>
        </div>

      </div>
    </section>

  </main>

<?php
get_footer();
