<?php
/**
 * Template: About CTA Block
 * Description: Bottom call-to-action banner for the About page
 * 
 * @package Shrestha_Core
 */

$attributes = isset($attributes) ? $attributes : [];

$subtitle           = isset($attributes['subtitle']) && !empty($attributes['subtitle']) ? $attributes['subtitle'] : 'CONTINUE YOUR JOURNEY';
$title              = isset($attributes['title']) && !empty($attributes['title']) ? $attributes['title'] : 'Discover the Art ';
$title_highlight    = isset($attributes['titleHighlight']) && !empty($attributes['titleHighlight']) ? $attributes['titleHighlight'] : 'of Shrestha Handicraft.';
$description        = isset($attributes['description']) && !empty($attributes['description']) ? $attributes['description'] : 'Explore our collection of handcrafted sculptures or speak with our atelier team about finding a piece that feels right for you.';
$primary_btn_text   = isset($attributes['primaryBtnText']) && !empty($attributes['primaryBtnText']) ? $attributes['primaryBtnText'] : 'EXPLORE COLLECTION +';
$primary_btn_url    = isset($attributes['primaryBtnUrl']) && !empty($attributes['primaryBtnUrl']) ? $attributes['primaryBtnUrl'] : home_url('/catalog/');
$secondary_btn_text = isset($attributes['secondaryBtnText']) && !empty($attributes['secondaryBtnText']) ? $attributes['secondaryBtnText'] : 'CONTACT OUR ATELIER';
$secondary_btn_url  = isset($attributes['secondaryBtnUrl']) && !empty($attributes['secondaryBtnUrl']) ? $attributes['secondaryBtnUrl'] : home_url('/contact/');
?>

<!-- BOTTOM CALL TO ACTION BANNER -->
<section id="about-cta" aria-label="Continue Your Journey" class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-20">
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
      <div class="flex items-center gap-2 font-mono text-xs text-gold tracking-[0.25em] uppercase font-semibold">
        <i data-lucide="sparkles" class="w-3.5 h-3.5 text-gold"></i>
        <span><?php echo esc_html($subtitle); ?></span>
      </div>
      <h2 class="font-display text-3xl sm:text-4xl font-bold text-slate-900 dark:text-parchment leading-tight">
        <?php echo esc_html($title); ?><span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_highlight); ?></span>
      </h2>
      <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed mt-1">
        <?php echo esc_html($description); ?>
      </p>
    </div>

    <div class="flex flex-wrap items-center gap-4 shrink-0 z-10">
      <?php if (!empty($primary_btn_text)): ?>
      <a href="<?php echo esc_url($primary_btn_url); ?>"
        class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center gap-2">
        <span><?php echo esc_html($primary_btn_text); ?></span>
      </a>
      <?php endif; ?>
      <?php if (!empty($secondary_btn_text)): ?>
      <a href="<?php echo esc_url($secondary_btn_url); ?>"
        class="px-6 py-3.5 bg-white/80 dark:bg-patina-950/80 border border-gold/50 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
        <span><?php echo esc_html($secondary_btn_text); ?></span>
      </a>
      <?php endif; ?>
    </div>

  </div>
</section>
