<?php
/**
 * Template Renderer: Why Choose Shrestha Handicraft Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker = isset($attributes['kicker']) ? $attributes['kicker'] : '07 — WHY CHOOSE SHRESTHA HANDICRAFT';
$title_line1 = isset($attributes['titleLine1']) ? $attributes['titleLine1'] : 'Sacred Heritage,';
$title_line2 = isset($attributes['titleLine2']) ? $attributes['titleLine2'] : 'Uncompromising Standards.';
$subtitle = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'From master Newar lost-wax casting and strict iconometric proportions to museum-grade curation and worldwide insured delivery, discover why temples, monasteries, and discerning collectors entrust their sacred acquisitions to our Patan atelier.';

$stat_years     = !empty($attributes['statYears']) ? $attributes['statYears'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_stat_years', '40+') : '40+');
$stat_countries = !empty($attributes['statCountries']) ? $attributes['statCountries'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_stat_countries', '50+') : '50+');

$default_features = array(
    array(
        'icon'        => 'flame',
        'tag'         => 'Cire Perdue',
        'title'       => 'Authentic Lost-Wax Casting',
        'description' => 'Each deity statue is individually sculpted in pure Himalayan beeswax, encased in traditional river-clay moulds, and fire-cast in molten bronze. Never stamped, never mass-produced.',
        'badge'       => 'Singular One-of-a-Kind Casts'
    ),
    array(
        'icon'        => 'landmark',
        'tag'         => 'Patan Origin',
        'title'       => 'Direct Atelier Sourcing',
        'description' => 'Acquire directly from our family atelier in the UNESCO-recognized city of Patan. Every acquisition bypasses intermediaries and directly preserves multi-generational Newar craftsmanship.',
        'badge'       => '100% Ethical Artisan Support'
    ),
    array(
        'icon'        => 'compass',
        'tag'         => 'Shilpa Shastra',
        'title'       => 'Strict Canonical Iconometry',
        'description' => 'Every curve, posture, mudra hand gesture, and facial feature faithfully adheres to sacred Angula and Tala iconometric proportions specified in ancient Buddhist and Hindu scriptures.',
        'badge'       => 'Exact Consecration Ready'
    ),
    array(
        'icon'        => 'award',
        'tag'         => 'Sacred Alloys',
        'title'       => 'Ashtadhatu & 24K Fire Gilding',
        'description' => 'Formulated with pure 8-metal alloys, hand-burnished 24K gold-leaf fire gilding, semi-precious stone inlays, and master cold-gold painted faces with unyielding lustre across lifetimes.',
        'badge'       => 'Museum-Grade Metallurgy'
    ),
    array(
        'icon'        => 'sparkles',
        'tag'         => 'Custom Orders',
        'title'       => 'Bespoke Temple Commissions',
        'description' => 'Collaborate directly with our master sculptors for tailor-made deity manifestations, custom dimension requirements, sealed hollow consecration cavities, and unique alloy compositions.',
        'badge'       => 'Personalized Atelier Guidance'
    ),
    array(
        'icon'        => 'shield-check',
        'tag'         => 'Worldwide Care',
        'title'       => 'Insured White-Glove Dispatch',
        'description' => 'Each specimen is fortified in custom shock-absorbing timber crates with tamper-evident seals, full international transit insurance, and Department of Archaeology export clearances.',
        'badge'       => 'Doorstep Global Delivery'
    ),
);
$features = (!empty($attributes['features']) && is_array($attributes['features'])) ? $attributes['features'] : $default_features;
?>

<!-- SECTION 07: WHY CHOOSE US BLOCK -->
<section id="why-choose-us"
  class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 sm:pb-24 border-t border-slate-200/60 dark:border-gold/10 relative overflow-hidden">
  
  <div
    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-gold/5 dark:bg-gold/5 blur-[120px] rounded-full pointer-events-none">
  </div>

  <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16 relative z-10">
    <div
      class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white dark:bg-patina-900 border border-gold/30 text-gold font-mono text-[11px] font-semibold tracking-wider uppercase mb-4 shadow-sm">
      <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
      <span><?php echo esc_html($kicker); ?></span>
    </div>
    <h2
      class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment tracking-tight leading-tight mb-4">
      <?php echo esc_html($title_line1); ?> <span
        class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_line2); ?></span>
    </h2>
    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed font-sans">
      <?php echo esc_html($subtitle); ?>
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 relative z-10 mb-12">
    <?php foreach ($features as $f): 
      $f_icon  = !empty($f['icon']) ? $f['icon'] : 'flame';
      $f_tag   = !empty($f['tag']) ? $f['tag'] : 'Authentic';
      $f_title = !empty($f['title']) ? $f['title'] : '';
      $f_desc  = !empty($f['description']) ? $f['description'] : '';
      $f_badge = !empty($f['badge']) ? $f['badge'] : '';
    ?>
    <div
      class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 hover:border-gold/60 dark:hover:border-gold/50 rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl dark:shadow-none hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
      <div>
        <div class="flex items-center justify-between mb-5">
          <div
            class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold group-hover:scale-110 group-hover:bg-gold/20 transition-all">
            <i data-lucide="<?php echo esc_attr($f_icon); ?>" class="w-6 h-6"></i>
          </div>
          <span class="font-mono text-[10px] text-gold/80 dark:text-gold uppercase tracking-widest font-semibold px-2.5 py-1 rounded bg-patina-100 dark:bg-patina-950 border border-gold/20">
            <?php echo esc_html($f_tag); ?>
          </span>
        </div>
        <h3 class="font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment mb-2.5">
          <?php echo esc_html($f_title); ?>
        </h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm leading-relaxed font-sans">
          <?php echo esc_html($f_desc); ?>
        </p>
      </div>
      <?php if ($f_badge): ?>
      <div class="border-t border-slate-100 dark:border-slate-800/80 pt-4 mt-5 flex items-center gap-2 text-gold font-mono text-[11px] font-semibold">
        <i data-lucide="check" class="w-3.5 h-3.5 text-copper"></i>
        <span><?php echo esc_html($f_badge); ?></span>
      </div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Atelier Trust & Assurance Live Stats Banner -->
  <div
    class="bg-gradient-to-r from-[#F6F0E4] via-white to-[#F3ECE2] dark:from-[#131518] dark:via-[#1A1D22] dark:to-[#131518] border border-gold/30 rounded-2xl p-6 sm:p-8 shadow-xl relative z-10">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center divide-y sm:divide-y-0 sm:divide-x divide-slate-200 dark:divide-gold/20">
      <div class="flex flex-col items-center justify-center p-2">
        <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="<?php echo esc_attr(rtrim($stat_years, '+')); ?>" data-suffix="+" data-start="0" data-duration="1800"><?php echo esc_html($stat_years); ?></span>
        <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Years Foundry Heritage</span>
        <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Operating in Patan since 1982</span>
      </div>
      <div class="flex flex-col items-center justify-center p-2">
        <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="100" data-suffix="%" data-start="0" data-duration="2000">100%</span>
        <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Hand-Cast Authenticity</span>
        <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Certified lost-wax bronze</span>
      </div>
      <div class="flex flex-col items-center justify-center p-2">
        <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="<?php echo esc_attr(rtrim($stat_countries, '+')); ?>" data-suffix="+" data-start="0" data-duration="1800"><?php echo esc_html($stat_countries); ?></span>
        <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Countries Delivered</span>
        <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Safe white-glove transit</span>
      </div>
      <div class="flex flex-col items-center justify-center p-2">
        <span class="counter-number font-display text-3xl sm:text-4xl font-bold text-gold" data-target="0" data-suffix="" data-start="8" data-duration="1400">0</span>
        <span class="font-mono text-[11px] text-slate-700 dark:text-slate-300 font-semibold tracking-wider uppercase mt-1">Intermediaries</span>
        <span class="font-sans text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Direct to master artisans</span>
      </div>
    </div>
  </div>

</section>
