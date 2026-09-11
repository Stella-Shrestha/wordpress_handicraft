<?php
/**
 * Template Renderer: About Artisans Block (Section 03: The Hands Behind the Art)
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$attributes = isset($attributes) ? $attributes : array();

$kicker          = isset($attributes['kicker']) && !empty($attributes['kicker']) ? $attributes['kicker'] : '03 - OUR ARTISANS';
$title_line1     = isset($attributes['titleLine1']) && !empty($attributes['titleLine1']) ? $attributes['titleLine1'] : 'The Hands Behind the';
$title_line2     = isset($attributes['titleLine2']) && !empty($attributes['titleLine2']) ? $attributes['titleLine2'] : 'Art.';
$description1    = isset($attributes['description1']) && !empty($attributes['description1']) ? $attributes['description1'] : 'A sculpture carries the character of the hands that create it. Our artisans work patiently through every stage of the process, from the first wax model to the final surface finish.';
$description2    = isset($attributes['description2']) && !empty($attributes['description2']) ? $attributes['description2'] : 'We believe that preserving craftsmanship means supporting the knowledge, precision and creativity of the people who continue to practice it.';

$stat1_val       = isset($attributes['stat1Val']) && !empty($attributes['stat1Val']) ? $attributes['stat1Val'] : 'Hand';
$stat1_lbl       = isset($attributes['stat1Lbl']) && !empty($attributes['stat1Lbl']) ? $attributes['stat1Lbl'] : 'FINISHED DETAILS';
$stat2_val       = isset($attributes['stat2Val']) && !empty($attributes['stat2Val']) ? $attributes['stat2Val'] : 'Patan';
$stat2_lbl       = isset($attributes['stat2Lbl']) && !empty($attributes['stat2Lbl']) ? $attributes['stat2Lbl'] : 'ARTISAN COMMUNITY';

$overlay_kicker  = isset($attributes['overlayKicker']) && !empty($attributes['overlayKicker']) ? $attributes['overlayKicker'] : 'THE PEOPLE';
$overlay_title   = isset($attributes['overlayTitle']) && !empty($attributes['overlayTitle']) ? $attributes['overlayTitle'] : 'Skilled Hands.';
$overlay_desc    = isset($attributes['overlayDesc']) && !empty($attributes['overlayDesc']) ? $attributes['overlayDesc'] : 'Craftsmanship lives through the people who practice it.';

$image_url       = !empty($attributes['imageUrl']) ? $attributes['imageUrl'] : '';
if (!$image_url) {
    $image_url = function_exists('shrestha_asset') ? shrestha_asset('footer_buddha_statue.jpg') : get_template_directory_uri() . '/assets/footer_buddha_statue.jpg';
}
?>

<!-- SECTION 03: OUR ARTISANS BLOCK -->
<section
  class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

    <!-- Left Image Column with Overlay -->
    <div class="lg:col-span-6 relative">
      <div
        class="relative w-full h-[400px] sm:h-[480px] rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-gold/20 bg-slate-900">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title_line1 . ' ' . $title_line2); ?>"
          class="w-full h-full object-cover filter brightness-95" />
      </div>

      <!-- Floating Dark Overlay Card -->
      <div
        class="absolute bottom-6 right-6 left-6 sm:left-auto sm:max-w-xs bg-[#0E131B]/95 border border-gold/30 backdrop-blur-md p-5 rounded-xl text-white shadow-2xl">
        <span class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold"><?php echo esc_html($overlay_kicker); ?></span>
        <h4 class="font-display font-bold text-base text-parchment mt-0.5"><?php echo esc_html($overlay_title); ?></h4>
        <p class="text-slate-300 text-xs mt-1 font-sans leading-relaxed">
          <?php echo esc_html($overlay_desc); ?>
        </p>
      </div>
    </div>

    <!-- Right Content Column -->
    <div class="lg:col-span-6 flex flex-col gap-6">
      <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase"><?php echo esc_html($kicker); ?></span>
      <h2
        class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
        <?php echo esc_html($title_line1); ?> <span
          class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_line2); ?></span>
      </h2>
      <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
        <?php echo esc_html($description1); ?>
      </p>
      <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
        <?php echo esc_html($description2); ?>
      </p>

      <!-- Bottom Info Grid -->
      <div class="border-t border-slate-200 dark:border-gold/20 pt-6 grid grid-cols-2 gap-6 mt-2">
        <div>
          <span class="font-display text-2xl font-bold text-slate-900 dark:text-parchment block"><?php echo esc_html($stat1_val); ?></span>
          <span
            class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold block mt-0.5"><?php echo esc_html($stat1_lbl); ?></span>
        </div>
        <div>
          <span class="font-display text-2xl font-bold text-slate-900 dark:text-parchment block"><?php echo esc_html($stat2_val); ?></span>
          <span class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold block mt-0.5"><?php echo esc_html($stat2_lbl); ?></span>
        </div>
      </div>
    </div>

  </div>
</section>
