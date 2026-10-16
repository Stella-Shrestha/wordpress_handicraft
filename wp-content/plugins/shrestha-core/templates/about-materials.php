<?php
/**
 * Template Renderer: About Materials Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) ? $attributes['kicker'] : '04 - CORE MATERIALS';
$title = isset($attributes['title']) ? $attributes['title'] : 'The Character of Metal.';

$default_materials = array(
    array(
        'num'         => '01',
        'title'       => 'Bronze',
        'description' => 'Valued for its durability and rich depth of tone, bronze is widely used for detailed sculptural work.',
        'link'        => function_exists('home_url') ? home_url('/catalog/?alloy=patina-bronze') : '#',
        'link_text'   => 'Explore Bronze Deities'
    ),
    array(
        'num'         => '02',
        'title'       => 'Brass & Gold',
        'description' => 'Warm and luminous, creates a distinctive golden character across traditional sacred sculptures.',
        'link'        => function_exists('home_url') ? home_url('/catalog/?alloy=gold-leaf') : '#',
        'link_text'   => 'Explore Gold-Leaf Pieces'
    ),
    array(
        'num'         => '03',
        'title'       => 'Copper Repoussé',
        'description' => 'Copper brings a warm reddish tone and has an extensive lineage within medieval Kathmandu Valley casting.',
        'link'        => function_exists('home_url') ? home_url('/catalog/?alloy=copper-repousse') : '#',
        'link_text'   => 'Explore Copper Work'
    ),
    array(
        'num'         => '04',
        'title'       => 'Sacred Ashtadhatu',
        'description' => 'Formulated with sacred 8-metal alloys for deep ritual resonance, durability, and canonical sanctity.',
        'link'        => function_exists('home_url') ? home_url('/catalog/?alloy=ashtadhatu') : '#',
        'link_text'   => 'Explore Ashtadhatu'
    ),
);
$materials = (!empty($attributes['materials']) && is_array($attributes['materials'])) ? $attributes['materials'] : $default_materials;
?>

<!-- SECTION 04: CORE MATERIALS BLOCK -->
<section id="our-materials" aria-label="Core Materials"
  class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-[52px] sm:pb-[110px] border-t border-slate-200/60 dark:border-gold/10">
  <div class="text-center max-w-3xl mx-auto mb-12">
    <div
      class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white dark:bg-patina-900 border border-gold/30 text-gold font-mono text-[11px] font-semibold tracking-wider uppercase mb-4 shadow-sm">
      <i data-lucide="layers" class="w-3.5 h-3.5"></i>
      <span><?php echo esc_html($kicker); ?></span>
    </div>
    <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment">
      The Character of <span
        class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent">Metal.</span>
    </h2>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach ($materials as $m): 
      $m_num   = !empty($m['num']) ? $m['num'] : '01';
      $m_title = !empty($m['title']) ? $m['title'] : '';
      $m_desc  = !empty($m['description']) ? $m['description'] : '';
      $m_link  = !empty($m['link']) ? $m['link'] : '#';
      $m_ltext = !empty($m['link_text']) ? $m['link_text'] : 'Explore';
    ?>
    <a href="<?php echo esc_url($m_link); ?>"
      class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 shadow-md hover:border-gold/60 transition-all flex flex-col justify-between gap-4 group">
      <div>
        <span class="font-mono text-xs font-bold text-gold block mb-2"><?php echo esc_html($m_num); ?></span>
        <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment mb-2 group-hover:text-gold transition-colors"><?php echo esc_html($m_title); ?></h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
          <?php echo esc_html($m_desc); ?>
        </p>
      </div>
      <span class="font-mono text-[11px] text-gold/80 group-hover:text-gold flex items-center gap-1">
        <span><?php echo esc_html($m_ltext); ?></span>
        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
      </span>
    </a>
    <?php endforeach; ?>
  </div>
</section>
