<?php
/**
 * Template Renderer: About Atelier Showroom & Foundry Block
 *
 * Converted from 12-column grid to 2-div flexbox layout with justify-between,
 * matching the architecture of the homepage "FROM WAX TO PRESENCE." section.
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) && !empty($attributes['kicker']) ? $attributes['kicker'] : (isset($attributes['sectionLabel']) && $attributes['sectionLabel'] !== 'OUR WORKSHOP & COMMUNITY' && !empty($attributes['sectionLabel']) ? $attributes['sectionLabel'] : '04 — OUR ATELIER');
$title_line1 = isset($attributes['titleLine1']) ? $attributes['titleLine1'] : 'Where the Work';
$title_line2 = isset($attributes['titleLine2']) ? $attributes['titleLine2'] : 'Begins.';
$description = isset($attributes['description']) ? $attributes['description'] : 'Our atelier is the heart of Shrestha Handicraft. It is where designs become wax models, wax models become molten alloy forms, and raw surfaces gradually become consecrated sacred sculptures.';

$address = !empty($attributes['address']) ? $attributes['address'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_address', 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal') : 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal');
$hours   = !empty($attributes['hours']) ? $attributes['hours'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_hours', 'Sun – Fri: 09:00 AM – 06:00 PM NPT') : 'Sun – Fri: 09:00 AM – 06:00 PM NPT');
$phone   = !empty($attributes['phone']) ? $attributes['phone'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_phone', '+977 1 552 1432') : '+977 1 552 1432');
$link_url = isset($attributes['linkUrl']) ? $attributes['linkUrl'] : (function_exists('home_url') ? home_url('/contact/') : '#');
$link_text = isset($attributes['linkText']) ? $attributes['linkText'] : 'SCHEDULE AN ATELIER VISIT';

$image_url = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';
if (!$image_url) {
    $image_url = function_exists('shrestha_asset') ? shrestha_asset('shakyamuni.jpg') : get_template_directory_uri() . '/assets/shakyamuni.jpg';
}
?>

<!-- SECTION 04: OUR ATELIER BLOCK -->
<section id="our-atelier" aria-label="Our Atelier"
  class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-[52px] sm:pb-[110px] border-t border-slate-200/60 dark:border-gold/10">

  <!-- 2 DIVS WITH JUSTIFY-BETWEEN (REPLACING 12-GRID, MATCHING "FROM WAX TO PRESENCE") -->
  <div class="flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-14 xl:gap-16 w-full">

    <!-- Left Column: Visual Card -->
    <div class="w-full lg:w-[46%] xl:w-[45%]">
      <div
        class="w-full h-[380px] sm:h-[460px] rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-gold/20 bg-black relative flex items-center justify-center group">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title_line1 . ' ' . $title_line2); ?>"
          class="max-h-full max-w-full object-contain filter brightness-95 group-hover:scale-105 transition-transform duration-700 ease-out" />
      </div>
    </div>

    <!-- Right Column: Content Column -->
    <div class="w-full lg:w-[50%] xl:w-[51%] flex flex-col gap-6">
      <div class="flex items-center gap-2.5 font-mono text-xs text-gold tracking-[0.25em] uppercase font-semibold">
        <i data-lucide="map-pin" class="w-4 h-4 text-gold"></i>
        <span><?php echo esc_html($kicker); ?></span>
      </div>
      <h2
        class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight tracking-tight">
        <?php echo esc_html($title_line1); ?> <span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_line2); ?></span>
      </h2>
      <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
        <?php echo esc_html($description); ?>
      </p>

      <!-- Location Info List from Customizer -->
      <div class="flex flex-col gap-4 my-2">
        <div class="flex items-start gap-3">
          <div
            class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0 mt-0.5">
            <i data-lucide="map-pin" class="w-4 h-4"></i>
          </div>
          <div>
            <h4 class="font-display font-bold text-sm text-slate-900 dark:text-parchment">Patan Showroom &amp; Foundry</h4>
            <p class="text-slate-500 dark:text-slate-400 text-xs font-sans"><?php echo esc_html($address); ?></p>
          </div>
        </div>

        <div class="flex items-start gap-3">
          <div
            class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0 mt-0.5">
            <i data-lucide="clock" class="w-4 h-4"></i>
          </div>
          <div>
            <h4 class="font-display font-bold text-sm text-slate-900 dark:text-parchment">Atelier Visiting Hours</h4>
            <p class="text-slate-500 dark:text-slate-400 text-xs font-sans"><?php echo esc_html($hours); ?></p>
          </div>
        </div>

        <div class="flex items-start gap-3">
          <div
            class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0 mt-0.5">
            <i data-lucide="phone" class="w-4 h-4"></i>
          </div>
          <div>
            <h4 class="font-display font-bold text-sm text-slate-900 dark:text-parchment">Direct Hotline</h4>
            <p class="text-slate-500 dark:text-slate-400 text-xs font-mono"><?php echo esc_html($phone); ?></p>
          </div>
        </div>
      </div>

      <!-- Visit Link -->
      <a href="<?php echo esc_url($link_url); ?>"
        class="inline-flex items-center gap-2 font-mono text-xs font-bold text-gold hover:text-gold-bright uppercase tracking-wider transition-colors mt-2">
        <span><?php echo esc_html($link_text); ?></span>
        <i data-lucide="arrow-right" class="w-4 h-4"></i>
      </a>
    </div>

  </div>
</section>
