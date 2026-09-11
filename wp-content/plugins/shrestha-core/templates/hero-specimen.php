<?php
/**
 * Template Renderer: Hero Specimen Spotlight Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$badge_text       = isset($attributes['badgeText']) ? $attributes['badgeText'] : 'SPECIMEN #SH-001';
$consecrated_text = isset($attributes['consecratedText']) ? $attributes['consecratedText'] : 'RITUAL CONSECRATED';
$title_highlight  = isset($attributes['titleHighlight']) ? $attributes['titleHighlight'] : 'Green Tara';
$title_subtitle   = isset($attributes['titleSubtitle']) ? $attributes['titleSubtitle'] : 'Mother of Divine Liberation';
$description      = isset($attributes['description']) ? $attributes['description'] : 'Hand-cast using lost-wax iconometry (Cire Perdue) from 8-metal Ashtadhatu alloy. Adorned with 24K gold-leaf fire gilding and cold-chiseled facial symmetry, crafted according to 14th-century Sanskrit treatise canons in Patan, Nepal.';
$specimen_sku     = isset($attributes['specimenSku']) ? $attributes['specimenSku'] : 'SH-001';
$primary_btn_text = isset($attributes['primaryBtnText']) ? $attributes['primaryBtnText'] : 'Acquire Hero Specimen';
$secondary_btn    = isset($attributes['secondaryBtnText']) ? $attributes['secondaryBtnText'] : 'Inspect Technical Spec';
$symmetry_text    = isset($attributes['symmetryText']) ? $attributes['symmetryText'] : 'ICONOMETRIC SYMMETRY: 99.8%';
$image_asset      = isset($attributes['imageAsset']) ? $attributes['imageAsset'] : 'green_tara.jpg';
$image_id         = isset($attributes['imageId']) ? (int)$attributes['imageId'] : 0;

if (!empty($attributes['imageUrl'])) {
    $image_url = esc_url($attributes['imageUrl']);
} elseif ($image_id > 0) {
    $image_url = esc_url(wp_get_attachment_image_url($image_id, 'full'));
} else {
    $image_url = shrestha_core_get_asset_url($image_asset);
}
?>

<div class="grid grid-cols-1 max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 lg:py-[110px] py-[52px] lg:grid-cols-12 gap-10 items-center">

  <!-- Hero Left Column -->
  <div class="lg:col-span-7 flex flex-col gap-6">
    <div
      class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold w-fit shadow-sm">
      <span><?php echo esc_html($badge_text); ?></span>
      <span>•</span>
      <span class="text-emerald-500 font-semibold flex items-center gap-1">
        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> <?php echo esc_html($consecrated_text); ?>
      </span>
    </div>

    <h1
      class="font-display text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-none text-slate-900 dark:text-parchment">
      <span class="bg-gradient-to-r from-gold-bright via-gold to-copper bg-clip-text text-transparent"><?php echo esc_html($title_highlight); ?></span><br />
      <?php echo esc_html($title_subtitle); ?>
    </h1>

    <div class="text-slate-600 dark:text-slate-400 text-base leading-relaxed space-y-3">
      <?php echo wp_kses_post(wpautop($description)); ?>
    </div>

    <!-- CTA Action Buttons -->
    <div class="flex flex-wrap items-center gap-4 mt-2">
      <button type="button"
        data-action="add-to-selection"
        data-sku="<?php echo esc_attr($specimen_sku); ?>"
        onclick="addToCartByProdId('<?php echo esc_js($specimen_sku); ?>', this)"
        class="add-to-cart-btn px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
        <i data-lucide="plus" class="w-4 h-4"></i>
        <?php echo esc_html($primary_btn_text); ?>
      </button>
      <button onclick="openSpecimenModalByProdId('<?php echo esc_js($specimen_sku); ?>')"
        class="px-6 py-3.5 bg-white dark:bg-patina-900 border border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2">
        <i data-lucide="scan" class="w-4 h-4"></i>
        <?php echo esc_html($secondary_btn); ?>
      </button>
    </div>
  </div>

  <!-- Hero Right Column (Visual Card) -->
  <div class="lg:col-span-5 relative">
    <div
      class="relative bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 shadow-2xl overflow-hidden group">
      <div class="relative w-full h-[460px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title_highlight); ?>"
          class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out" />

        <!-- HUD Crosshairs Overlay -->
        <div class="absolute inset-0 border border-gold/20 pointer-events-none">
          <div class="absolute top-3 left-3 w-3 h-3 border-t-2 border-l-2 border-gold"></div>
          <div class="absolute top-3 right-3 w-3 h-3 border-t-2 border-r-2 border-gold"></div>
          <div class="absolute bottom-3 left-3 w-3 h-3 border-b-2 border-l-2 border-gold"></div>
          <div class="absolute bottom-3 right-3 w-3 h-3 border-b-2 border-r-2 border-gold"></div>
          <div class="absolute bottom-3 left-3 right-3 text-center">
            <span
              class="bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30"><?php echo esc_html($symmetry_text); ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Floating Non-Stop Rotating Circular Text Stamp Seal Badge -->
    <div
      class="absolute -right-3 sm:-right-6 top-1/2 -translate-y-1/2 z-20 w-36 h-36 sm:w-44 sm:h-44 rounded-full shadow-2xl transition-transform hover:scale-105 pointer-events-auto flex items-center justify-center">
      <svg viewBox="0 0 200 200" width="100%" height="100%"
        class="w-full h-full filter drop-shadow-xl overflow-visible" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
          <path id="rotatingStampTextPath" d="M 100, 100 m -74, 0 a 74,74 0 1,1 148,0 a 74,74 0 1,1 -148,0" />
        </defs>

        <!-- Base Outer Background & Outer Border Rings -->
        <circle cx="100" cy="100" r="95" fill="#FAF7F2" stroke="#B86B4B" stroke-width="2.5" />
        <circle cx="100" cy="100" r="90" fill="none" stroke="#B86B4B" stroke-width="1" />
        <circle cx="100" cy="100" r="58" fill="none" stroke="#B86B4B" stroke-width="1.5" stroke-dasharray="2 3" />

        <!-- Twin Mountain Peak Line Art -->
        <path d="M 64 114 L 80 90 L 92 107 L 115 94 L 138 114" stroke="#B86B4B" stroke-width="3" fill="none"
          stroke-linecap="round" stroke-linejoin="round" />

        <text x="100" y="133" text-anchor="middle" font-family="'Cinzel', serif" font-style="italic" font-size="12"
          font-weight="600" fill="#B86B4B">
          Verified
        </text>

        <!-- NONSTOP CONTINUOUS ROTATING TEXT RING -->
        <g class="animate-[spin_18s_linear_infinite]" style="transform-origin: 100px 100px;">
          <text font-family="'Plus Jakarta Sans', 'Space Grotesk', sans-serif" font-size="9.5" font-weight="600"
            fill="#B86B4B" letter-spacing="2.2">
            <textPath xlink:href="#rotatingStampTextPath" href="#rotatingStampTextPath" startOffset="0%">
              NEPAL • EST. TOURISM AUTHO • OFFICIALLY REGISTERED •
            </textPath>
          </text>
        </g>
      </svg>
    </div>
  </div>
</div>
