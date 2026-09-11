<?php
/**
 * Template Renderer: About Story & Philosophy Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) ? $attributes['kicker'] : '01 - OUR STORY';
$title_line1 = isset($attributes['titleLine1']) ? $attributes['titleLine1'] : 'A Craft';
$title_line2 = isset($attributes['titleLine2']) ? $attributes['titleLine2'] : 'Passed Down.';
$p1 = isset($attributes['paragraph1']) ? $attributes['paragraph1'] : 'In the historic artisan quarters of Patan, metalwork is more than a profession. It is a tradition shaped by generations of knowledge, patience and devotion.';
$p2 = isset($attributes['paragraph2']) ? $attributes['paragraph2'] : 'Shrestha Handicraft was established with a simple purpose: to preserve this living tradition while creating sculptures that can be appreciated by collectors, devotees and art lovers around the world.';
$p3 = isset($attributes['paragraph3']) ? $attributes['paragraph3'] : 'Each piece begins as an idea and gradually takes form through modelling, mould preparation, metal casting, chasing, polishing and finishing. The process is deliberately detailed because craftsmanship cannot be rushed.';
$quote = isset($attributes['quoteText']) ? $attributes['quoteText'] : '"A meaningful sculpture is not simply made. It is patiently shaped through knowledge, proportion and hand."';
$quote_author = isset($attributes['quoteAuthor']) ? $attributes['quoteAuthor'] : 'THE SHRESTHA HANDICRAFT PHILOSOPHY';
?>

<!-- SECTION 01: OUR STORY BLOCK -->
<section id="our-story"
  class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start">

    <!-- Left Header -->
    <div class="lg:col-span-5 flex flex-col gap-3">
      <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase"><?php echo esc_html($kicker); ?></span>
      <h2
        class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
        <?php echo esc_html($title_line1); ?> <span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_line2); ?></span>
      </h2>
      <div class="w-16 h-0.5 bg-gold/60 mt-2"></div>
    </div>

    <!-- Right Content & Quote Box -->
    <div
      class="lg:col-span-7 flex flex-col gap-6 text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
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
