<?php
/**
 * Template Renderer: Infinite Metallurgy Ticker Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$default_items = array(
    array('icon' => 'award',        'text' => 'PATAN MASTER SCULPTORS GUILD'),
    array('icon' => 'shield-check', 'text' => '99.9% ASHTADHATU ASSAY CERTIFIED'),
    array('icon' => 'landmark',     'text' => 'SACRED ART INSTITUTE OF KYOTO'),
    array('icon' => 'scroll-text',  'text' => 'SANSKRIT SHILPA SHASTRA CANON'),
    array('icon' => 'flame',        'text' => 'LICCHAVI LOST-WAX CIRE PERDUE'),
    array('icon' => 'badge-check',  'text' => 'MONASTIC CONSECRATION SEALED'),
);

$items = array();

if (!empty($attributes['items']) && is_array($attributes['items'])) {
    foreach ($attributes['items'] as $item) {
        if (!empty($item['text'])) {
            $raw_icon = !empty($item['icon']) ? $item['icon'] : 'award';
            $clean_icon = preg_replace('/[^a-z0-9-]/', '', strtolower(str_replace(' ', '-', trim($raw_icon))));
            if (empty($clean_icon)) {
                $clean_icon = 'award';
            }
            $items[] = array(
                'icon' => $clean_icon,
                'text' => sanitize_text_field($item['text']),
            );
        }
    }
}

// Fallback to individual legacy item keys if items array is empty
if (empty($items)) {
    for ($i = 1; $i <= 5; $i++) {
        if (!empty($attributes["item{$i}"])) {
            $items[] = array(
                'icon' => $default_items[($i - 1) % count($default_items)]['icon'],
                'text' => sanitize_text_field($attributes["item{$i}"]),
            );
        }
    }
}

if (empty($items)) {
    $items = $default_items;
}

// Helper for icon color styling
if (!function_exists('shrestha_ticker_icon_class')) {
    function shrestha_ticker_icon_class($icon) {
        switch ($icon) {
            case 'shield-check':
            case 'badge-check':
            case 'check-circle':
                return 'text-emerald-500';
            case 'scroll-text':
            case 'feather':
                return 'text-copper';
            case 'flame':
            case 'sun':
                return 'text-amber-500';
            case 'sparkles':
            case 'gem':
            case 'crown':
            case 'star':
            case 'award':
            case 'landmark':
            default:
                return 'text-gold';
        }
    }
}
?>

<!-- INFINITE LOGO LOOP TICKER -->
<div
  class="w-full overflow-hidden bg-white/70 dark:bg-patina-900/60 border-y border-slate-200 dark:border-gold/20 py-4 backdrop-blur-md relative">
  <div class="flex items-center gap-12 whitespace-nowrap animate-marquee">
    <!-- Logo Items Set 1 -->
    <div class="flex items-center gap-12 shrink-0">
      <?php foreach ($items as $item) : ?>
        <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
          <i data-lucide="<?php echo esc_attr($item['icon']); ?>" class="w-4 h-4 <?php echo esc_attr(shrestha_ticker_icon_class($item['icon'])); ?>"></i>
          <span><?php echo esc_html($item['text']); ?></span>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Duplicated Set 2 for infinite loop -->
    <div class="flex items-center gap-12 shrink-0" aria-hidden="true">
      <?php foreach ($items as $item) : ?>
        <div class="flex items-center gap-2.5 font-mono text-xs font-semibold text-slate-700 dark:text-slate-300">
          <i data-lucide="<?php echo esc_attr($item['icon']); ?>" class="w-4 h-4 <?php echo esc_attr(shrestha_ticker_icon_class($item['icon'])); ?>"></i>
          <span><?php echo esc_html($item['text']); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
