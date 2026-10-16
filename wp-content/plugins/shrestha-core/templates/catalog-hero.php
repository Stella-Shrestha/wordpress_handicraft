<?php
/**
 * Template Renderer: Catalog Hero & Search Header Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$attributes = isset($attributes) ? $attributes : array();

$badge_text     = isset($attributes['badgeText']) && !empty($attributes['badgeText']) ? $attributes['badgeText'] : 'SACRED COLLECTION • PATAN ATELIER';
$title          = isset($attributes['title']) && !empty($attributes['title']) ? $attributes['title'] : 'The Consecrated Specimen Catalog';
$title_highlight= isset($attributes['titleHighlight']) && !empty($attributes['titleHighlight']) ? $attributes['titleHighlight'] : '';
$description    = isset($attributes['description']) && !empty($attributes['description']) ? $attributes['description'] : 'Each deity statue is individually sculpted in lost-wax, smelted in ritual Ashtadhatu 8-metal alloy, and finished in 24K mercury fire-gilding.';
$show_search    = !isset($attributes['showSearch']) || $attributes['showSearch'] !== false;
$show_sort      = !isset($attributes['showSort']) || $attributes['showSort'] !== false;
?>

<!-- CATALOG HERO & CONTROLS BLOCK -->
<section class="pb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
  <div>
    <?php if (!empty($badge_text)): ?>
    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold mb-3 shadow-sm">
      <i data-lucide="compass" class="w-3.5 h-3.5"></i>
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
  </div>

  <?php if ($show_search || $show_sort): ?>
  <!-- Live Search & Sort Controls -->
  <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
    <?php if ($show_search): ?>
    <!-- Live Search Box -->
    <div class="relative min-w-[240px]">
      <i data-lucide="search" class="w-4 h-4 text-gold absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
      <input type="text" id="catalogSearchInput" oninput="typeof filterCatalog === 'function' && filterCatalog()"
        onkeydown="if(event.key==='Escape'){this.value='';typeof filterCatalog === 'function' && filterCatalog();}"
        placeholder="Search by deity or SKU..."
        autocomplete="off"
        spellcheck="false"
        class="w-full pl-9 pr-4 py-2.5 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/30 rounded-lg text-xs font-mono text-slate-800 dark:text-parchment placeholder-slate-400 dark:placeholder-slate-500 focus:border-gold outline-none transition-colors shadow-sm" />
    </div>
    <?php endif; ?>

    <?php if ($show_sort): ?>
    <!-- Sort Select -->
    <select id="catalogSortSelect" onchange="typeof filterCatalog === 'function' && filterCatalog()"
      class="px-3 py-2.5 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/30 rounded-lg text-xs font-mono text-slate-800 dark:text-parchment focus:border-gold outline-none cursor-pointer transition-colors shadow-sm">
      <option value="default" class="bg-white dark:bg-patina-900 text-slate-800 dark:text-parchment">Sort: Default Order</option>
      <option value="price-asc" class="bg-white dark:bg-patina-900 text-slate-800 dark:text-parchment">Price: Low to High</option>
      <option value="price-desc" class="bg-white dark:bg-patina-900 text-slate-800 dark:text-parchment">Price: High to Low</option>
      <option value="name-asc" class="bg-white dark:bg-patina-900 text-slate-800 dark:text-parchment">Name: A to Z</option>
    </select>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</section>
