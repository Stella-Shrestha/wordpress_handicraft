<?php
/**
 * Template Renderer: About Hero Spotlight Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$badge_text = isset($attributes['badgeText']) ? $attributes['badgeText'] : 'OUR STORY • PATAN, NEPAL';
$title_part1 = isset($attributes['titlePart1']) ? $attributes['titlePart1'] : 'Rooted in';
$title_part2 = isset($attributes['titlePart2']) ? $attributes['titlePart2'] : 'Tradition.';
$title_part3 = isset($attributes['titlePart3']) ? $attributes['titlePart3'] : 'Crafted for';
$title_part4 = isset($attributes['titlePart4']) ? $attributes['titlePart4'] : 'Generations.';
$description = isset($attributes['description']) ? $attributes['description'] : "Shrestha Handicraft is a Nepalese atelier dedicated to preserving the art of handcrafted metal sculpture. From the historic streets of Patan, we create bronze, brass, copper and traditional alloy sculptures inspired by Nepal's rich artistic heritage.";

$btn1_text = isset($attributes['btn1Text']) ? $attributes['btn1Text'] : 'DISCOVER OUR STORY';
$btn1_link = isset($attributes['btn1Link']) ? $attributes['btn1Link'] : '#our-story';
$btn2_text = isset($attributes['btn2Text']) ? $attributes['btn2Text'] : 'EXPLORE OUR ATELIER';
$btn2_link = isset($attributes['btn2Link']) ? $attributes['btn2Link'] : '#our-atelier';

$stat1_val = isset($attributes['stat1Val']) ? $attributes['stat1Val'] : '01';
$stat1_lbl = isset($attributes['stat1Lbl']) ? $attributes['stat1Lbl'] : 'PATAN ATELIER';
$stat2_val = isset($attributes['stat2Val']) ? $attributes['stat2Val'] : '04';
$stat2_lbl = isset($attributes['stat2Lbl']) ? $attributes['stat2Lbl'] : 'CORE MATERIALS';
$stat3_val = isset($attributes['stat3Val']) ? $attributes['stat3Val'] : '∞';
$stat3_lbl = isset($attributes['stat3Lbl']) ? $attributes['stat3Lbl'] : 'LIVING TRADITION';

$image_url = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';
if (!$image_url) {
    $image_url = function_exists('shrestha_asset') ? shrestha_asset('green_tara.jpg') : get_template_directory_uri() . '/assets/green_tara.jpg';
}
$hud_text = isset($attributes['hudText']) ? $attributes['hudText'] : 'ICONOMETRIC RATIO 1:1.618 • PATAN ATELIER';
?>

<!-- ABOUT US HERO SPOTLIGHT BLOCK -->
<section class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-24">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">

    <!-- Left Column (Hero Content) -->
    <div class="lg:col-span-7 flex flex-col gap-6">
      <!-- Top Pill Tag -->
      <div
        class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white dark:bg-patina-900 border border-gold/30 text-gold font-mono text-[11px] font-semibold tracking-wider uppercase w-fit shadow-sm">
        <span class="w-2 h-2 rounded-full bg-gold animate-pulse"></span>
        <span><?php echo esc_html($badge_text); ?></span>
      </div>

      <!-- Headline -->
      <h1
        class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-slate-900 dark:text-parchment leading-[1.15]">
        <?php echo esc_html($title_part1); ?> <span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_part2); ?></span><br />
        <?php echo esc_html($title_part3); ?> <span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_part4); ?></span>
      </h1>

      <!-- Body Paragraph -->
      <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base max-w-xl font-sans leading-relaxed">
        <?php echo esc_html($description); ?>
      </p>

      <!-- CTA Action Buttons -->
      <div class="flex flex-wrap items-center gap-4 mt-2">
        <a href="<?php echo esc_url($btn1_link); ?>"
          class="px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center gap-2">
          <span><?php echo esc_html($btn1_text); ?></span>
          <i data-lucide="arrow-down" class="w-3.5 h-3.5"></i>
        </a>
        <a href="<?php echo esc_url($btn2_link); ?>"
          class="px-6 py-3.5 bg-white dark:bg-patina-900 border border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
          <span><?php echo esc_html($btn2_text); ?></span>
        </a>
      </div>

      <!-- Bottom Hero Stats Summary Row -->
      <div class="border-t border-slate-200 dark:border-gold/20 pt-6 mt-4 grid grid-cols-3 gap-4 max-w-lg">
        <div>
          <span class="font-display text-2xl font-bold text-gold"><?php echo esc_html($stat1_val); ?></span>
          <span
            class="block font-mono text-[10px] text-slate-500 dark:text-slate-400 tracking-widest uppercase mt-0.5"><?php echo esc_html($stat1_lbl); ?></span>
        </div>
        <div>
          <span class="font-display text-2xl font-bold text-gold"><?php echo esc_html($stat2_val); ?></span>
          <span
            class="block font-mono text-[10px] text-slate-500 dark:text-slate-400 tracking-widest uppercase mt-0.5"><?php echo esc_html($stat2_lbl); ?></span>
        </div>
        <div>
          <span class="font-display text-2xl font-bold text-gold"><?php echo esc_html($stat3_val); ?></span>
          <span
            class="block font-mono text-[10px] text-slate-500 dark:text-slate-400 tracking-widest uppercase mt-0.5"><?php echo esc_html($stat3_lbl); ?></span>
        </div>
      </div>
    </div>

    <!-- Right Column (Hero Visual Card) -->
    <div class="lg:col-span-5 relative">
      <div
        class="relative bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 shadow-2xl overflow-hidden group">
        <div class="relative w-full h-[460px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title_part1 . ' ' . $title_part2); ?>"
            class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out" />

          <!-- HUD Crosshairs Overlay -->
          <div class="absolute inset-0 border border-gold/20 pointer-events-none">
            <div class="absolute top-3 left-3 w-3 h-3 border-t-2 border-l-2 border-gold"></div>
            <div class="absolute top-3 right-3 w-3 h-3 border-t-2 border-r-2 border-gold"></div>
            <div class="absolute bottom-3 left-3 w-3 h-3 border-b-2 border-l-2 border-gold"></div>
            <div class="absolute bottom-3 right-3 w-3 h-3 border-b-2 border-r-2 border-gold"></div>
            <div class="absolute bottom-3 left-3 right-3 text-center">
              <span
                class="bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30"><?php echo esc_html($hud_text); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
