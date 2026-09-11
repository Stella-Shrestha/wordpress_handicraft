<?php
/**
 * Template Renderer: Catalog Commission & Custom Order Banner Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$attributes = isset($attributes) ? $attributes : array();

$kicker            = isset($attributes['kicker']) && !empty($attributes['kicker']) ? $attributes['kicker'] : 'BESPOKE COMMISSIONS';
$title             = isset($attributes['title']) && !empty($attributes['title']) ? $attributes['title'] : 'Commission a Sacred Specimen ';
$title_highlight   = isset($attributes['titleHighlight']) && !empty($attributes['titleHighlight']) ? $attributes['titleHighlight'] : 'for Temples & Altars.';
$description       = isset($attributes['description']) && !empty($attributes['description']) ? $attributes['description'] : 'Collaborate directly with our master Newar sculptors to create tailor-made deity manifestations with custom iconometric dimensions, consecrated hollow chambers, and pure 8-metal Ashtadhatu formulations.';
$primary_btn_text  = isset($attributes['primaryBtnText']) && !empty($attributes['primaryBtnText']) ? $attributes['primaryBtnText'] : 'REQUEST BESPOKE COMMISSION';
$primary_btn_url   = isset($attributes['primaryBtnUrl']) && !empty($attributes['primaryBtnUrl']) ? $attributes['primaryBtnUrl'] : (function_exists('home_url') ? home_url('/contact/') : '#');
$secondary_btn_text= isset($attributes['secondaryBtnText']) && !empty($attributes['secondaryBtnText']) ? $attributes['secondaryBtnText'] : 'SPEAK WITH ATELIER';
$secondary_btn_url = isset($attributes['secondaryBtnUrl']) && !empty($attributes['secondaryBtnUrl']) ? $attributes['secondaryBtnUrl'] : (function_exists('home_url') ? home_url('/contact/') : '#');
?>

<!-- BESPOKE COMMISSIONS CALLOUT BANNER -->
<section class="mb-12">
  <div class="bg-gradient-to-r from-[#F6F0E4] via-white to-[#F3ECE2] dark:from-patina-900 dark:via-[#1A1D22] dark:to-patina-900 border border-gold/30 rounded-3xl p-8 sm:p-12 relative overflow-hidden shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">
    
    <!-- Watermark Accent -->
    <div class="absolute right-[-40px] bottom-[-40px] opacity-10 dark:opacity-15 pointer-events-none text-gold">
      <svg width="360" height="360" viewBox="0 0 100 100" fill="currentColor">
        <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="1.5" fill="none" />
        <circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="1" fill="none" />
        <path d="M50,5 L50,95 M5,50 L95,50 M18,18 L82,82 M18,82 L82,18" stroke="currentColor" stroke-width="1" />
      </svg>
    </div>

    <div class="flex flex-col gap-3 max-w-2xl z-10">
      <?php if (!empty($kicker)): ?>
      <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase"><?php echo esc_html($kicker); ?></span>
      <?php endif; ?>

      <h2 class="font-display text-3xl sm:text-4xl font-bold text-slate-900 dark:text-parchment leading-tight">
        <?php echo esc_html($title); ?>
        <?php if (!empty($title_highlight)): ?>
          <span class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_highlight); ?></span>
        <?php endif; ?>
      </h2>

      <?php if (!empty($description)): ?>
      <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed mt-1">
        <?php echo esc_html($description); ?>
      </p>
      <?php endif; ?>
    </div>

    <div class="flex flex-wrap items-center gap-4 shrink-0 z-10">
      <?php if (!empty($primary_btn_text)): ?>
      <a href="<?php echo esc_url($primary_btn_url); ?>"
        class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center gap-2">
        <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
        <span><?php echo esc_html($primary_btn_text); ?></span>
      </a>
      <?php endif; ?>

      <?php if (!empty($secondary_btn_text)): ?>
      <a href="<?php echo esc_url($secondary_btn_url); ?>"
        class="px-6 py-3.5 bg-white/80 dark:bg-patina-950/80 border border-gold/50 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
        <i data-lucide="phone" class="w-3.5 h-3.5"></i>
        <span><?php echo esc_html($secondary_btn_text); ?></span>
      </a>
      <?php endif; ?>
    </div>

  </div>
</section>
