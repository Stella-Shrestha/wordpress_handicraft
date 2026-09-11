<?php
/**
 * 404 Not Found Template
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
    <div class="max-w-xl mx-auto bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-8 sm:p-12 shadow-2xl">
      <div class="w-16 h-16 rounded-full bg-gold/10 border border-gold/40 flex items-center justify-center text-gold mx-auto mb-6">
        <i data-lucide="compass" class="w-8 h-8"></i>
      </div>
      
      <span class="font-mono text-xs text-gold tracking-widest uppercase">ERROR 404</span>
      <h1 class="font-display text-3xl sm:text-4xl font-bold text-slate-900 dark:text-parchment mt-2">
        Uncharted Sanctum
      </h1>
      <p class="text-sm text-slate-500 dark:text-slate-400 mt-4 leading-relaxed font-sans">
        The sacred specimen or page you seek has either transitioned or does not reside at this location.
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
        <a href="<?php echo esc_url(home_url('/')); ?>"
          class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg transition-all">
          Return to Sanctum Home
        </a>
        <a href="<?php echo esc_url(home_url('/catalog/')); ?>"
          class="px-6 py-3.5 bg-white dark:bg-patina-800 border border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs uppercase tracking-wider rounded-lg transition-colors">
          Browse Specimen Catalog
        </a>
      </div>
    </div>
  </main>

<?php
get_footer();
