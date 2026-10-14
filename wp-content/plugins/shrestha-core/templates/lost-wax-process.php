<?php
/**
 * Template Renderer: Lost-Wax Casting Method Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$kicker_icon = isset($attributes['kickerIcon']) ? $attributes['kickerIcon'] : 'flame';
$subtitle    = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'OUR PROCESS';
$title_line1 = isset($attributes['title']) ? $attributes['title'] : 'FROM WAX';
$title_line2 = isset($attributes['titleLine2']) ? $attributes['titleLine2'] : 'TO PRESENCE.';
$description = isset($attributes['description']) ? $attributes['description'] : 'Every figure emerging from our Patan foundry follows strict iconometric proportions derived from Sanskrit treatises such as the Sāmāṅgara Sūtradhāra.';

// Default Stats
$default_stats = array(
    array('icon' => 'sparkles', 'value' => '600+',     'label' => "Sacred Icons\nCrafted"),
    array('icon' => 'users',    'value' => '30+',       'label' => "Master Artisans\n& Specialists"),
    array('icon' => 'clock',    'value' => '4-8 WEEKS', 'label' => "Typical Casting\nTimeline"),
);
$stats = (!empty($attributes['stats']) && is_array($attributes['stats'])) ? $attributes['stats'] : $default_stats;

// Default Steps
$default_steps = array(
    array(
        'number'      => '01',
        'title'       => 'WAX MODELLING',
        'description' => 'The sacred figure is modelled in wax according to prescribed proportions and iconometric measurements.',
        'badge'       => 'FORM',
        'icon'        => 'shapes'
    ),
    array(
        'number'      => '02',
        'title'       => 'CLAY INVESTMENT',
        'description' => 'Local Kathmandu Valley clay and rice-husk material gradually encases the wax model in multiple layers.',
        'badge'       => 'SHELL',
        'icon'        => 'layers'
    ),
    array(
        'number'      => '03',
        'title'       => 'SACRED ALLOY',
        'description' => 'The wax is removed and molten Ashtadhatu or selected bronze alloy is introduced into the prepared mould.',
        'badge'       => 'CAST',
        'icon'        => 'flame'
    ),
    array(
        'number'      => '04',
        'title'       => 'CHISELING & GILDING',
        'description' => 'Cold-chiseling, polishing, fire gilding and final hand-painted details complete the sacred image.',
        'badge'       => 'FINISH',
        'icon'        => 'sparkles'
    )
);
$steps = (!empty($attributes['steps']) && is_array($attributes['steps'])) ? $attributes['steps'] : $default_steps;
?>

<!-- THE FOUNDRY METHOD SECTION -->
<section
  class="bg-patina-50 dark:bg-[#0B0C0E] text-slate-800 dark:text-parchment pb-[52px] lg:pb-[110px] transition-colors duration-300">
  <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-12 lg:gap-24">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

      <!-- Left Column: Our Process & Stats -->
      <div class="lg:col-span-5 flex flex-col gap-6">
        <div
          class="flex items-center gap-2.5 font-mono text-xs text-gold tracking-[0.25em] uppercase font-semibold">
          <i data-lucide="<?php echo esc_attr($kicker_icon); ?>" class="w-4 h-4 text-gold"></i>
          <span><?php echo esc_html($subtitle); ?></span>
        </div>

        <h2
          class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl text-slate-900 dark:text-parchment uppercase tracking-tight leading-none">
          <?php echo esc_html($title_line1); ?><br />
          <?php echo esc_html($title_line2); ?>
        </h2>

        <div class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm font-sans leading-relaxed max-w-md">
          <?php echo wp_kses_post(wpautop($description)); ?>
        </div>

        <!-- Dynamic Atelier Stats -->
        <?php if (!empty($stats)): 
          $stats_count = count($stats);
        ?>
        <div class="grid grid-cols-3 gap-3 pt-4 border-t border-slate-200 dark:border-slate-800">
          <?php foreach ($stats as $idx => $st): 
            $s_icon  = !empty($st['icon']) ? $st['icon'] : 'sparkles';
            $s_val   = !empty($st['value']) ? $st['value'] : '';
            $s_label = !empty($st['label']) ? $st['label'] : '';
            $is_last = ($idx === $stats_count - 1);
            $border_class = !$is_last ? 'border-r border-slate-200 dark:border-slate-800' : '';
            $padding_class = ($idx === 0) ? 'pr-3' : ($is_last ? 'pl-3' : 'px-3');
          ?>
          <div class="flex flex-col gap-1 <?php echo esc_attr($padding_class . ' ' . $border_class); ?>">
            <div class="flex items-center gap-1.5">
              <i data-lucide="<?php echo esc_attr($s_icon); ?>" class="w-4 h-4 text-gold shrink-0"></i>
              <span class="counter-number font-display font-bold text-lg sm:text-xl text-slate-900 dark:text-parchment" data-counter="true"><?php echo esc_html($s_val); ?></span>
            </div>
            <span class="font-mono text-[10px] text-slate-500 dark:text-slate-400 leading-tight">
              <?php echo nl2br(esc_html($s_label)); ?>
            </span>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Right Column: Step List -->
      <div
        class="lg:col-span-7 bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-5 sm:p-6 shadow-xl dark:shadow-2xl transition-colors duration-300">
        <div class="grid grid-cols-1 md:grid-cols-10 gap-6 items-center">
          <div class="md:col-span-10 flex flex-col divide-y divide-slate-200 dark:divide-slate-800/80">

            <?php foreach ($steps as $st_idx => $step): 
              $step_num   = !empty($step['number']) ? $step['number'] : sprintf('%02d', $st_idx + 1);
              $step_title = !empty($step['title']) ? $step['title'] : '';
              $step_desc  = !empty($step['description']) ? $step['description'] : '';
              $step_badge = !empty($step['badge']) ? $step['badge'] : 'STEP';
              $step_icon  = !empty($step['icon']) ? $step['icon'] : 'shapes';
            ?>
            <div class="py-3.5 flex items-center justify-between gap-4">
              <div class="flex items-start gap-4">
                <span
                  class="font-display italic text-2xl sm:text-3xl font-light text-gold tracking-tight shrink-0"><?php echo esc_html($step_num); ?></span>
                <div class="flex flex-col gap-0.5">
                  <h4
                    class="font-display font-semibold text-sm sm:text-base text-slate-900 dark:text-parchment uppercase tracking-wide">
                    <?php echo esc_html($step_title); ?>
                  </h4>
                  <p class="text-slate-600 dark:text-slate-400 text-[11px] font-sans leading-relaxed">
                    <?php echo esc_html($step_desc); ?>
                  </p>
                </div>
              </div>
              <div class="flex flex-col items-center gap-1 shrink-0 text-gold">
                <i data-lucide="<?php echo esc_attr($step_icon); ?>" class="w-4 h-4 text-gold"></i>
                <span class="font-mono text-[9px] tracking-widest uppercase font-bold"><?php echo esc_html($step_badge); ?></span>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>

    </div>

  </div>
</section>

