<?php
/**
 * Template Renderer: About Hero Spotlight Block
 *
 * Visually matched to the homepage hero section layout, typography, proportions, and rotating stamp seal.
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$badge_text = isset($attributes['badgeText']) && !empty($attributes['badgeText'])
    ? $attributes['badgeText']
    : 'ABOUT SHRESTHA HANDICRAFT';

$heritage_text = isset($attributes['consecratedText']) && !empty($attributes['consecratedText'])
    ? $attributes['consecratedText']
    : (isset($attributes['heritagePillText']) && !empty($attributes['heritagePillText'])
        ? $attributes['heritagePillText']
        : 'LIVING HERITAGE');

// Headline resolution: matching homepage hero 2-line structure (Gradient highlight line 1, solid line 2)
if (!empty($attributes['titleHighlight']) && $attributes['titleHighlight'] !== 'Five Generations in Patan.') {
    $title_highlight = $attributes['titleHighlight'];
    $title_subtitle  = !empty($attributes['title']) ? $attributes['title'] : 'Crafted for Generations.';
} elseif (!empty($attributes['titlePart1']) || !empty($attributes['titlePart2'])) {
    $title_highlight = trim(($attributes['titlePart1'] ?? 'Rooted in') . ' ' . ($attributes['titlePart2'] ?? 'Tradition.'));
    $title_subtitle  = trim(($attributes['titlePart3'] ?? 'Crafted for') . ' ' . ($attributes['titlePart4'] ?? 'Generations.'));
} else {
    $title_highlight = 'Rooted in Tradition.';
    $title_subtitle  = 'Crafted for Generations.';
}

$description = isset($attributes['description']) && !empty($attributes['description'])
    ? $attributes['description']
    : 'For over four decades, our family foundry in Patan has preserved the sacred Newar tradition of lost-wax bronze casting — creating authentic, iconometrically precise Buddhist and Hindu deity statues for monasteries, temples, and collectors worldwide.';

// Specimen & Action Buttons (Identical to Homepage Hero Section)
$specimen_sku     = isset($attributes['specimenSku']) ? $attributes['specimenSku'] : 'SH-001';
$primary_btn_text = isset($attributes['primaryBtnText']) && !empty($attributes['primaryBtnText']) && !in_array($attributes['primaryBtnText'], array('EXPLORE OUR STORY', 'DISCOVER OUR STORY', 'Acquire Hero Specimen')) ? $attributes['primaryBtnText'] : 'Add to Cart';
$secondary_btn_text = 'Inquiry';
$tertiary_btn_text  = isset($attributes['secondaryBtnText']) && !empty($attributes['secondaryBtnText']) && $attributes['secondaryBtnText'] !== 'VISIT ATELIER' ? $attributes['secondaryBtnText'] : 'Inspect Technical Spec';

// Resolve specimen permalink for direct next-page inspection
$specimen_link = '';
if (!empty($attributes['inspectUrl'])) {
    $specimen_link = esc_url($attributes['inspectUrl']);
} else {
    $matching_specimens = get_posts(array(
        'post_type'      => array('specimen', 'statue'),
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'meta_query'     => array(
            'relation' => 'OR',
            array('key' => '_specimen_sku', 'value' => $specimen_sku),
            array('key' => '_statue_sku', 'value' => $specimen_sku),
        ),
    ));
    if (!empty($matching_specimens)) {
        $specimen_link = get_permalink($matching_specimens[0]->ID);
    } else {
        $specimen_link = home_url('/specimen/green-tara-mother-of-divine-liberation/');
    }
}

// Image resolution
$image_asset = isset($attributes['imageAsset']) ? $attributes['imageAsset'] : 'green_tara.jpg';
$image_id    = isset($attributes['imageId']) ? (int)$attributes['imageId'] : 0;

if (!empty($attributes['imageUrl'])) {
    $image_url = esc_url($attributes['imageUrl']);
} elseif ($image_id > 0) {
    $image_url = esc_url(wp_get_attachment_image_url($image_id, 'full'));
} elseif (function_exists('shrestha_core_get_asset_url')) {
    $image_url = shrestha_core_get_asset_url($image_asset);
} elseif (function_exists('shrestha_asset')) {
    $image_url = shrestha_asset($image_asset);
} else {
    $image_url = get_template_directory_uri() . '/assets/' . $image_asset;
}

$hud_text = isset($attributes['hudText']) && !empty($attributes['hudText']) 
    ? $attributes['hudText'] 
    : (isset($attributes['symmetryText']) && !empty($attributes['symmetryText']) ? $attributes['symmetryText'] : 'ICONOMETRIC SYMMETRY: 99.8% • PATAN');
?>

<!-- MAIN HERO SECTION: w-[1584px] with mx-auto -->
<section id="about-hero" aria-label="About Shrestha Handicraft Hero" class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 lg:py-[110px] py-[52px]">

  <!-- 2 DIVS WITH JUSTIFY-BETWEEN (IDENTICAL PROPORTIONS TO HOMEPAGE HERO) -->
  <div class="flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-14 xl:gap-16 w-full">

    <!-- Hero Left Column -->
    <div class="w-full lg:w-[56%] xl:w-[58%] flex flex-col gap-6">
      <div
        class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white dark:bg-patina-900 border border-gold/30 font-mono text-[11px] font-semibold tracking-wider uppercase text-gold w-fit shadow-sm">
        <span><?php echo esc_html($badge_text); ?></span>
        <span>•</span>
        <span class="text-emerald-500 font-semibold flex items-center gap-1">
          <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> <?php echo esc_html($heritage_text); ?>
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

      <!-- CTA Action Buttons (Identical to Homepage Hero Section) -->
      <div class="flex flex-wrap items-center gap-4 mt-2">
        <button type="button"
          data-action="add-to-cart"
          data-sku="<?php echo esc_attr($specimen_sku); ?>"
          onclick="addToCartByProdId('<?php echo esc_js($specimen_sku); ?>', this)"
          class="add-to-cart-btn px-6 py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs tracking-wider uppercase rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
          <i data-lucide="shopping-bag" class="w-4 h-4"></i>
          <span><?php echo esc_html($primary_btn_text); ?></span>
        </button>

        <?php
        $specimen_title = trim($title_highlight . ' ' . $title_subtitle);
        $hero_wa_url = function_exists('shrestha_get_whatsapp_inquiry_url') 
            ? shrestha_get_whatsapp_inquiry_url($specimen_sku, $specimen_title) 
            : 'https://wa.me/9779841234567?text=' . rawurlencode('Namaste! I would like to inquire about acquiring "' . $specimen_title . '" (SKU: ' . $specimen_sku . '). Please share details.');
        ?>
        <button type="button"
          data-action="inquiry"
          data-sku="<?php echo esc_attr($specimen_sku); ?>"
          onclick="if(typeof openWhatsAppInquiry==='function'){openWhatsAppInquiry('<?php echo esc_js($specimen_sku); ?>');}else if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($specimen_sku); ?>');}else{window.open('<?php echo esc_url($hero_wa_url); ?>', '_blank');}"
          class="inquiry-btn px-6 py-3.5 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-bold text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
          <i data-lucide="message-square" class="w-4 h-4 text-copper"></i>
          <span><?php echo esc_html($secondary_btn_text); ?></span>
        </button>

        <a href="<?php echo esc_url($specimen_link); ?>"
          class="px-5 py-3.5 bg-slate-100 dark:bg-patina-800/80 hover:bg-gold/10 border border-slate-200 dark:border-gold/20 text-slate-700 dark:text-slate-300 hover:text-gold font-mono font-medium text-xs tracking-wider uppercase rounded-lg transition-colors flex items-center gap-2 shadow-sm">
          <i data-lucide="scan" class="w-4 h-4"></i>
          <span><?php echo esc_html($tertiary_btn_text); ?></span>
        </a>
      </div>
    </div>

    <!-- Hero Right Column (Visual Card) -->
    <div class="w-full lg:w-[40%] xl:w-[38%] relative">
      <div
        class="relative bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 shadow-2xl overflow-hidden group">
        <div class="relative w-full h-[460px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
          <a href="<?php echo esc_url($specimen_link); ?>" class="w-full h-full flex items-center justify-center cursor-pointer" title="<?php echo esc_attr($title_highlight); ?> Specimen Inspection">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title_highlight); ?>"
              class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out" />
          </a>

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
