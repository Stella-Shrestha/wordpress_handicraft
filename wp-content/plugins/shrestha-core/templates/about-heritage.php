<?php
/**
 * Template Renderer: About Heritage Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) ? $attributes['kicker'] : '02 - OUR HERITAGE';
$title = isset($attributes['title']) ? $attributes['title'] : 'The Living Art of Patan';
$subtitle = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'Patan has long been celebrated for its metal sculpture and traditional craftsmanship. Our work is inspired by this cultural environment and the techniques that continue to define Nepalese sacred art.';

$default_cards = array(
    array(
        'icon'        => 'award',
        'title'       => 'Living Tradition',
        'description' => 'Traditional knowledge continues to influence how each sculpture is designed, shaped and finished.'
    ),
    array(
        'icon'        => 'landmark',
        'title'       => 'Patan Craftsmanship',
        'description' => 'Our atelier is connected to the artistic communities of the Kathmandu Valley.'
    ),
    array(
        'icon'        => 'sparkles',
        'title'       => 'Shared Worldwide',
        'description' => 'Our sculptures allow people around the world to experience Nepalese metal craftsmanship.'
    ),
);
$cards = (!empty($attributes['cards']) && is_array($attributes['cards'])) ? $attributes['cards'] : $default_cards;
?>

<!-- SECTION 02: OUR HERITAGE BLOCK -->
<section
  class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
  <div class="text-center max-w-3xl mx-auto mb-12">
    <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase block mb-2"><?php echo esc_html($kicker); ?></span>
    <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment mb-4">
      The Living Art of <span
        class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Patan</span>
    </h2>
    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed">
      <?php echo esc_html($subtitle); ?>
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
    <?php foreach ($cards as $c): 
      $c_icon  = !empty($c['icon']) ? $c['icon'] : 'award';
      $c_title = !empty($c['title']) ? $c['title'] : '';
      $c_desc  = !empty($c['description']) ? $c['description'] : '';
    ?>
    <div
      class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-7 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col gap-4">
      <div class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold">
        <i data-lucide="<?php echo esc_attr($c_icon); ?>" class="w-6 h-6"></i>
      </div>
      <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment"><?php echo esc_html($c_title); ?></h3>
      <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
        <?php echo esc_html($c_desc); ?>
      </p>
    </div>
    <?php endforeach; ?>
  </div>
</section>
