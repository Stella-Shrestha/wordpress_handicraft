<?php
/**
 * Template Renderer: Newly Consecrated Specimens Grid Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$title           = isset($attributes['title']) ? $attributes['title'] : 'Newly Consecrated';
$subtitle        = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'A rotating selection of recently completed pieces, cast this season in our Patan workshops.';
$source          = isset($attributes['source']) ? $attributes['source'] : 'manual';
$selected_ids    = (!empty($attributes['selectedIds']) && is_array($attributes['selectedIds'])) ? array_map('intval', $attributes['selectedIds']) : array();
$number_of_posts = !empty($attributes['numberOfPosts']) ? intval($attributes['numberOfPosts']) : 3;
$catalog_link    = !empty($attributes['catalogLink']) ? esc_url($attributes['catalogLink']) : home_url('/catalog/');
$catalog_text    = !empty($attributes['catalogText']) ? $attributes['catalogText'] : 'VIEW ALL PACKAGES & CATALOG';

// Build Query Args
$query_args = array(
    'post_type'      => array('statue', 'specimen'),
    'post_status'    => 'publish',
);

if ($source === 'manual' && !empty($selected_ids)) {
    $ids_to_query = !empty($number_of_posts) ? array_slice($selected_ids, 0, $number_of_posts) : $selected_ids;
    $query_args['post__in']       = $ids_to_query;
    $query_args['orderby']        = 'post__in';
    $query_args['posts_per_page'] = count($ids_to_query);
} else {
    $query_args['posts_per_page'] = $number_of_posts;
    $query_args['orderby']        = 'date';
    $query_args['order']          = 'DESC';
}

$specimens_query = new WP_Query($query_args);

$cards = array();

if ($specimens_query->have_posts()) {
    while ($specimens_query->have_posts()) {
        $specimens_query->the_post();
        $pid = get_the_ID();

        // SKU
        $sku = get_post_meta($pid, '_statue_sku', true) ?: (get_post_meta($pid, '_specimen_sku', true) ?: ('SH-' . str_pad($pid, 3, '0', STR_PAD_LEFT)));
        
        // Price
        $raw_p = get_post_meta($pid, '_statue_price', true) ?: (get_post_meta($pid, '_specimen_price', true) ?: '4200');
        $price = is_numeric($raw_p) ? number_format((float)$raw_p) : $raw_p;

        // Dimensions & Alloy
        $height = get_post_meta($pid, '_statue_height', true) ?: (get_post_meta($pid, '_specimen_height', true) ?: '22.5 in (57.1 cm)');
        $angula = get_post_meta($pid, '_statue_angula', true) ?: (get_post_meta($pid, '_specimen_angula', true) ?: '');
        if ($angula && strpos($height, 'Angula') === false) {
            $height .= ' (' . $angula . ')';
        }
        $weight = get_post_meta($pid, '_statue_weight', true) ?: (get_post_meta($pid, '_specimen_weight', true) ?: '14.2 kg');
        $alloy  = get_post_meta($pid, '_statue_alloy_desc', true) ?: 'Ashtadhatu (8-Metal)';
        
        // Badge
        $gilding = get_post_meta($pid, '_statue_gilding', true) ?: '';
        if (stripos($gilding, '24K') !== false || stripos($alloy, 'Gold') !== false) {
            $badge = '24K GOLD LEAF';
        } elseif (stripos($alloy, 'Bronze') !== false || stripos($alloy, 'Patina') !== false) {
            $badge = 'PATINA BRONZE';
        } else {
            $badge = 'ASHTADHATU';
        }

        // Image
        $img_url = get_the_post_thumbnail_url($pid, 'large');
        if (!$img_url) {
            $fallback_asset = get_post_meta($pid, '_statue_asset_fallback', true) ?: (get_post_meta($pid, '_specimen_asset_img', true) ?: 'green_tara.jpg');
            $img_url = shrestha_core_get_asset_url($fallback_asset);
        }

        $cards[] = array(
            'title'    => get_the_title(),
            'sku'      => $sku,
            'price'    => $price,
            'badge'    => $badge,
            'grade'    => 'SPECIMEN GRADE',
            'flames'   => 3,
            'alloy'    => $alloy,
            'height'   => $height,
            'weight'   => $weight,
            'img'      => $img_url,
            'linkUrl'  => get_permalink($pid),
        );
    }
    wp_reset_postdata();
}

// Fallback if no posts found in database
if (empty($cards)) {
    $cards = array(
        array(
            'title'   => 'Green Tara Specimen',
            'sku'     => 'SH-001',
            'price'   => '14,800',
            'badge'   => 'ASHTADHATU',
            'grade'   => 'SPECIMEN GRADE',
            'flames'  => 3,
            'alloy'   => 'Ashtadhatu (8-Metal)',
            'height'  => '22.5 in (57.1 cm) (124 Angulas)',
            'weight'  => '14.2 kg',
            'img'     => shrestha_core_get_asset_url('green_tara.jpg'),
            'linkUrl' => '',
        ),
        array(
            'title'   => 'Mahakala 6-Armed',
            'sku'     => 'SH-108',
            'price'   => '19,500',
            'badge'   => '24K GOLD LEAF',
            'grade'   => 'SPECIMEN GRADE',
            'flames'  => 3,
            'alloy'   => 'Ashtadhatu (8-Metal)',
            'height'  => '18.0 in (45.7 cm) (108 Angulas)',
            'weight'  => '18.6 kg',
            'img'     => shrestha_core_get_asset_url('mahakala.jpg'),
            'linkUrl' => '',
        ),
        array(
            'title'   => 'Shakyamuni Buddha',
            'sku'     => 'SH-042',
            'price'   => '12,400',
            'badge'   => 'PATINA BRONZE',
            'grade'   => 'SPECIMEN GRADE',
            'flames'  => 3,
            'alloy'   => 'High-Copper Patina Bronze',
            'height'  => '24.0 in (60.9 cm) (128 Angulas)',
            'weight'  => '21.0 kg',
            'img'     => shrestha_core_get_asset_url('shakyamuni.jpg'),
            'linkUrl' => '',
        ),
    );
}
?>

<!-- NEWLY CONSECRATED SECTION -->
<section class="max-w-[1584px] mx-auto lg:py-[110px] py-[52px] px-4 sm:px-6 lg:px-8">
  <div class="flex flex-col justify-between text-center items-center mb-12 gap-2">
    <h2
      class="font-display text-4xl sm:text-5xl font-extrabold tracking-wider uppercase text-slate-900 dark:text-parchment">
      <?php echo esc_html($title); ?>
    </h2>
    <p class="text-slate-500 dark:text-slate-400 text-xs sm:text-sm font-sans leading-relaxed max-w-2xl">
      <?php echo esc_html($subtitle); ?>
    </p>
  </div>

  <!-- Dynamic Specimen Cards Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 max-w-[1440px] mx-auto">
    <?php foreach ($cards as $card) : ?>
      <div data-sku="<?php echo esc_attr($card['sku']); ?>" data-name="<?php echo esc_attr($card['title']); ?>" data-price="<?php echo esc_attr(str_replace('$', '', $card['price'])); ?>" data-alloys="<?php echo esc_attr($card['alloy']); ?>"
        class="specimen-card bg-white dark:bg-patina-900 border border-slate-200/80 dark:border-gold/30 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col group">
        <div class="relative w-full h-[380px] sm:h-[430px] overflow-hidden bg-black flex items-center justify-center">
          <img src="<?php echo esc_url($card['img']); ?>" alt="<?php echo esc_attr($card['title']); ?>"
            class="w-full h-full object-contain sm:object-cover group-hover:scale-105 transition-transform duration-700" />
          <div
            class="absolute top-4 right-4 bg-black/90 backdrop-blur-md px-3 py-1 rounded-full border border-gold/40 text-gold font-mono text-[10px] tracking-wider uppercase font-bold shadow-md">
            <?php echo esc_html($card['badge']); ?>
          </div>
        </div>

        <div class="p-6 flex flex-col justify-between flex-1 gap-5 bg-white dark:bg-patina-900">
          <div class="flex flex-col gap-1.5">
            <div
              class="flex items-center gap-1.5 font-mono text-[10px] text-slate-400 dark:text-slate-500 uppercase tracking-widest font-bold">
              <span><?php echo esc_html($card['grade']); ?></span>
              <?php if (!empty($card['flames'])): ?>
                <div class="flex items-center gap-0.5 text-amber-500">
                  <?php for ($f = 0; $f < intval($card['flames']); $f++): ?>
                    <i data-lucide="flame" class="w-3 h-3 fill-amber-500/20"></i>
                  <?php endfor; ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="flex items-baseline justify-between gap-3 pt-1">
              <h3
                class="font-sans font-bold text-xl sm:text-2xl text-slate-900 dark:text-parchment leading-tight truncate">
                <?php if (!empty($card['linkUrl'])): ?>
                  <a href="<?php echo esc_url($card['linkUrl']); ?>" class="hover:text-gold transition-colors">
                    <?php echo esc_html($card['title']); ?>
                  </a>
                <?php else: ?>
                  <?php echo esc_html($card['title']); ?>
                <?php endif; ?>
              </h3>
              <span class="font-mono font-bold text-xl sm:text-2xl text-amber-600 dark:text-gold shrink-0">
                $<?php echo esc_html(str_replace('$', '', $card['price'])); ?>
              </span>
            </div>
          </div>

          <div
            class="flex flex-col text-xs font-mono gap-2.5 py-3 border-y border-dashed border-slate-200 dark:border-slate-800">
            <div class="flex justify-between items-center text-[11px]">
              <span class="text-slate-500 dark:text-slate-400">Alloy Grade:</span>
              <span class="font-bold text-slate-900 dark:text-parchment"><?php echo esc_html($card['alloy']); ?></span>
            </div>
            <div class="flex justify-between items-center text-[11px]">
              <span class="text-slate-500 dark:text-slate-400">Height:</span>
              <span class="font-bold text-slate-900 dark:text-parchment"><?php echo esc_html($card['height']); ?></span>
            </div>
            <div class="flex justify-between items-center text-[11px]">
              <span class="text-slate-500 dark:text-slate-400">Raw Weight:</span>
              <span class="font-bold text-slate-900 dark:text-parchment"><?php echo esc_html($card['weight']); ?></span>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-3 pt-1">
            <?php if (!empty($card['linkUrl'])): ?>
              <a href="<?php echo esc_url($card['linkUrl']); ?>"
                class="px-3 py-3 bg-white dark:bg-patina-900 border border-slate-200 dark:border-slate-700/80 hover:border-gold dark:hover:border-gold text-slate-900 dark:text-parchment hover:text-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg transition-colors shadow-sm text-center">
                INSPECT SPEC
              </a>
            <?php else: ?>
              <button onclick="if(typeof openSpecimenModalByProdId==='function'){openSpecimenModalByProdId('<?php echo esc_js($card['sku']); ?>')}else{alert('Viewing specimen <?php echo esc_js($card['sku']); ?>');}"
                class="px-3 py-3 bg-white dark:bg-patina-900 border border-slate-200 dark:border-slate-700/80 hover:border-gold dark:hover:border-gold text-slate-900 dark:text-parchment hover:text-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg transition-colors shadow-sm text-center">
                TRACK CASTING
              </button>
            <?php endif; ?>
            <button type="button"
              data-action="add-to-selection"
              data-sku="<?php echo esc_attr($card['sku']); ?>"
              onclick="if(typeof addToCartByProdId==='function'){addToCartByProdId('<?php echo esc_js($card['sku']); ?>', this);}else if(typeof window.addToCartByProdId==='function'){window.addToCartByProdId('<?php echo esc_js($card['sku']); ?>', this);}else{alert('<?php echo esc_js($card['title']); ?> added to selection.');}"
              class="add-to-cart-btn px-3 py-3 bg-[#0d131d] hover:bg-slate-800 dark:bg-patina-950 dark:hover:bg-patina-800 border border-transparent text-white font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg transition-colors shadow text-center cursor-pointer">
              ADD TO SELECTION
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- VIEW ALL PACKAGES & CATALOG BUTTON -->
  <div class="flex justify-center mt-12">
    <a href="<?php echo esc_url($catalog_link); ?>"
      class="px-8 py-3.5 bg-gradient-to-r from-amber-600/90 via-gold to-copper hover:from-amber-600 hover:to-copper-bright text-white font-mono font-bold text-xs uppercase tracking-widest rounded-xl shadow-lg hover:shadow-gold/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-3">
      <span><?php echo esc_html($catalog_text); ?></span>
      <i data-lucide="arrow-right" class="w-4 h-4"></i>
    </a>
  </div>
</section>
