<?php
/**
 * Template Renderer: Contact Hero Banner Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$attributes = isset($attributes) ? $attributes : array();

$badge_text      = isset($attributes['badgeText']) && !empty($attributes['badgeText']) ? $attributes['badgeText'] : 'ATELIER CONCIERGE • PATAN SHOWROOM';
$title           = isset($attributes['title']) && !empty($attributes['title']) ? $attributes['title'] : 'Commission a Sacred Masterpiece';
$title_highlight = isset($attributes['titleHighlight']) && !empty($attributes['titleHighlight']) ? $attributes['titleHighlight'] : '';
$description     = isset($attributes['description']) && !empty($attributes['description']) ? $attributes['description'] : 'Inquire about existing consecrated specimens or initiate a bespoke temple casting with our 8th-generation Newar master sculptors.';
?>

<!-- CONTACT HERO BANNER BLOCK -->
<section class="border-b border-slate-200 dark:border-gold/20 pb-8 mb-12">
  <?php if (!empty($badge_text)): ?>
  <div class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold mb-3 shadow-sm">
    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
    <span><?php echo esc_html($badge_text); ?></span>
  </div>
  <?php endif; ?>

  <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
    <?php echo esc_html($title); ?>
    <?php if (!empty($title_highlight)): ?>
      <span class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_highlight); ?></span>
    <?php endif; ?>
  </h1>

  <?php if (!empty($description)): ?>
  <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 max-w-2xl font-sans leading-relaxed">
    <?php echo esc_html($description); ?>
  </p>
  <?php endif; ?>
</section>
