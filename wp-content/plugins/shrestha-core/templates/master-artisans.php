<?php
/**
 * Template Renderer: Crafted with Heritage Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$title    = isset($attributes['title']) ? $attributes['title'] : 'Crafted with Heritage, Made to Last';
$subtitle = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'What makes our sacred sculptures different is the craftsmanship, patience and Nepalese heritage behind every piece we create.';

$default_cards = array(
    array(
        'icon'        => 'feather',
        'title'       => 'Authentic Nepalese Craftsmanship',
        'description' => 'Each sculpture is created in Nepal using traditional metalworking techniques shaped by generations of artistic knowledge and heritage.'
    ),
    array(
        'icon'        => 'user',
        'title'       => 'Handcrafted, Never Mass Produced',
        'description' => 'Every statue passes through skilled artisan hands. From wax modeling to finishing, no piece is simply taken from a production line.'
    ),
    array(
        'icon'        => 'timer',
        'title'       => 'Meticulous Detail & Proportion',
        'description' => 'Facial expressions, hand gestures, ornaments and traditional proportions are carefully refined to preserve the character of each deity.'
    ),
    array(
        'icon'        => 'star',
        'title'       => 'Premium Metal & Finishes',
        'description' => 'We work with carefully selected bronze, brass, copper and refined finishes to create sculptures with depth, character and lasting beauty.'
    ),
    array(
        'icon'        => 'crosshair',
        'title'       => 'Custom Commissions',
        'description' => 'From intimate altar pieces to large sacred sculptures, we can create custom dimensions, finishes and specifications for individual commissions.'
    ),
    array(
        'icon'        => 'globe',
        'title'       => 'Worldwide Delivery',
        'description' => 'Your sculpture is carefully inspected, protected and prepared for secure international delivery from our workshop to your collection or sacred space.'
    ),
);
$cards = (!empty($attributes['cards']) && is_array($attributes['cards'])) ? $attributes['cards'] : $default_cards;
?>

<!-- CRAFTED WITH HERITAGE, MADE TO LAST SECTION -->
<section id="heritage-craft"
  class="sm:pb-12 lg:pb-24 relative overflow-hidden bg-patina-50 dark:bg-[#12100C] transition-colors duration-300">

  <div
    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-gold/10 dark:bg-gold/5 blur-[140px] rounded-full pointer-events-none">
  </div>

  <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center max-w-3xl mx-auto mb-6 sm:mb-14">
      <h2
        class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-parchment tracking-tight leading-tight mb-4">
        <?php echo esc_html($title); ?>
      </h2>
      <div class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed">
        <?php echo wp_kses_post(wpautop($subtitle)); ?>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 lg:gap-8">
      <?php foreach ($cards as $c): 
        $c_icon  = !empty($c['icon']) ? $c['icon'] : 'feather';
        $c_title = !empty($c['title']) ? $c['title'] : '';
        $c_desc  = !empty($c['description']) ? $c['description'] : '';
      ?>
      <div
        class="bg-white dark:bg-patina-900/90 border border-slate-200 dark:border-gold/20 hover:border-gold/50 rounded-2xl p-7 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300 group">
        <div>
          <div class="flex items-center justify-between gap-4 mb-6">
            <div
              class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:border-gold transition-colors">
              <i data-lucide="<?php echo esc_attr($c_icon); ?>" class="w-5 h-5"></i>
            </div>
          </div>
          <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
            <?php echo esc_html($c_title); ?>
          </h3>
          <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
            <?php echo esc_html($c_desc); ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

