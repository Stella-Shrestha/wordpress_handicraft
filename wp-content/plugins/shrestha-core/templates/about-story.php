<?php
/**
 * Template Renderer: About Story & Philosophy Block
 *
 * Converted from 12-column grid to 2-div flexbox layout with justify-between,
 * matching the architecture of the homepage "FROM WAX TO PRESENCE." section.
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) && !empty($attributes['kicker']) ? $attributes['kicker'] : (isset($attributes['sectionLabel']) && $attributes['sectionLabel'] !== 'OUR FOUNDING STORY' && !empty($attributes['sectionLabel']) ? $attributes['sectionLabel'] : '01 — OUR STORY');
$title_line1 = isset($attributes['titleLine1']) ? $attributes['titleLine1'] : (isset($attributes['title']) && $attributes['title'] !== 'Born from Devotion,' ? $attributes['title'] : 'A Craft');
$title_line2 = isset($attributes['titleLine2']) ? $attributes['titleLine2'] : (isset($attributes['titleHighlight']) && $attributes['titleHighlight'] !== 'Carried through Fire and Metal.' ? $attributes['titleHighlight'] : 'Passed Down.');
$p1 = isset($attributes['paragraph1']) ? $attributes['paragraph1'] : (isset($attributes['introText']) && $attributes['introText'] !== "In 1982, amidst the ancient courtyards of Patan — Nepal's historic epicentre of sacred metallurgy — Master Sculptor Rajendra Shrestha founded our family atelier with a single, uncompromising vision: to preserve the authentic Newar lost-wax casting traditions passed down across generations." ? $attributes['introText'] : 'In the historic artisan quarters of Patan, metalwork is more than a profession. It is a tradition shaped by generations of knowledge, patience and devotion.');
$p2 = isset($attributes['paragraph2']) ? $attributes['paragraph2'] : 'Shrestha Handicraft was established with a simple purpose: to preserve this living tradition while creating sculptures that can be appreciated by collectors, devotees and art lovers around the world.';
$p3 = isset($attributes['paragraph3']) ? $attributes['paragraph3'] : 'Each piece begins as an idea and gradually takes form through modelling, mould preparation, metal casting, chasing, polishing and finishing. The process is deliberately detailed because craftsmanship cannot be rushed.';
$quote = isset($attributes['quoteText']) ? $attributes['quoteText'] : 'A deity statue is not merely cast; it is invited into existence through reverence, patience, and the sacred fire of Patan.';
$quote_author = isset($attributes['quoteAuthor']) ? $attributes['quoteAuthor'] : 'Rajendra Shrestha';
?>

<!-- SECTION 01: OUR STORY BLOCK -->
<section id="our-story" aria-label="Our Story"
  class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-[52px] sm:pb-[110px] border-t border-slate-200/60 dark:border-gold/10">

  <!-- 2 DIVS WITH JUSTIFY-BETWEEN (REPLACING 12-GRID, MATCHING "FROM WAX TO PRESENCE") -->
  <div class="flex flex-col lg:flex-row items-start justify-between gap-10 lg:gap-14 xl:gap-16 w-full">

    <!-- Left Column: Header (42%-44% width) -->
    <div class="w-full lg:w-[44%] xl:w-[42%] flex flex-col gap-4 top-32 sticky">
      <div class="flex items-center gap-2.5 font-mono text-xs text-gold tracking-[0.25em] uppercase font-semibold">
        <i data-lucide="feather" class="w-4 h-4 text-gold"></i>
        <span><?php echo esc_html($kicker); ?></span>
      </div>
      <h2
        class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight tracking-tight">
        <?php echo esc_html($title_line1); ?> <span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_line2); ?></span>
      </h2>
      <div class="w-16 h-0.5 bg-gold/60 mt-1"></div>
    </div>

    <!-- Right Column: Content & Quote Box (52%-54% width) -->
    <div
      class="w-full lg:w-[52%] xl:w-[54%] flex flex-col gap-6 text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
      <p><?php echo esc_html($p1); ?></p>
      <p><?php echo esc_html($p2); ?></p>
      <p><?php echo esc_html($p3); ?></p>

      <!-- Quote Box -->
      <div
        class="bg-[#F8F4EB] dark:bg-patina-900/90 border-l-4 border-gold p-6 sm:p-8 rounded-r-2xl shadow-sm mt-2">
        <p class="font-display italic text-lg sm:text-xl text-slate-800 dark:text-parchment leading-snug">
          <?php echo esc_html($quote); ?>
        </p>
        <span class="font-mono text-[10px] tracking-widest uppercase text-gold font-semibold mt-4 block">
          <?php echo esc_html($quote_author); ?>
        </span>
      </div>
    </div>

  </div>
</section>
