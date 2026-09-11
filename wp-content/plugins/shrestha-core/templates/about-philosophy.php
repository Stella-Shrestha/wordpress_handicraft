<?php
/**
 * Template Renderer: About Philosophy Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) ? $attributes['kicker'] : '05 - OUR PHILOSOPHY';
$title = isset($attributes['title']) ? $attributes['title'] : 'What We Believe.';

$default_pillars = array(
    array(
        'icon'        => 'ruler',
        'title'       => 'Precision',
        'description' => 'Proportion, symmetry and canonical mudra detail matter at every stage of lost-wax casting.'
    ),
    array(
        'icon'        => 'flame',
        'title'       => 'Craftsmanship',
        'description' => 'We value careful hands, patient processes and meaningful cold-chisel engraving.'
    ),
    array(
        'icon'        => 'award',
        'title'       => 'Respect',
        'description' => 'Sacred art deserves cultural awareness, spiritual reverence and iconometric responsibility.'
    ),
    array(
        'icon'        => 'shield-check',
        'title'       => 'Continuity',
        'description' => 'Our goal is to keep traditional craftsmanship vibrant and relevant for future generations.'
    ),
);
$pillars = (!empty($attributes['pillars']) && is_array($attributes['pillars'])) ? $attributes['pillars'] : $default_pillars;
?>

<!-- SECTION 05: OUR PHILOSOPHY BLOCK -->
<section
  class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10">
  <div class="text-center max-w-3xl mx-auto mb-12">
    <span class="font-mono text-xs text-gold font-semibold tracking-widest uppercase block mb-2"><?php echo esc_html($kicker); ?></span>
    <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment">
      What We <span
        class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Believe.</span>
    </h2>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach ($pillars as $p): 
      $p_icon  = !empty($p['icon']) ? $p['icon'] : 'sparkles';
      $p_title = !empty($p['title']) ? $p['title'] : '';
      $p_desc  = !empty($p['description']) ? $p['description'] : '';
    ?>
    <div
      class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/50 transition-all flex flex-col gap-3">
      <div
        class="w-10 h-10 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-1">
        <i data-lucide="<?php echo esc_attr($p_icon); ?>" class="w-5 h-5"></i>
      </div>
      <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment"><?php echo esc_html($p_title); ?></h3>
      <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
        <?php echo esc_html($p_desc); ?>
      </p>
    </div>
    <?php endforeach; ?>
  </div>
</section>
