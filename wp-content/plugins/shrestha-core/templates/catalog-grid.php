<?php
/**
 * Template Renderer: Catalog Specimen Grid & Taxonomy Filter Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$attributes = isset($attributes) ? $attributes : array();

$show_filter_pills = !isset($attributes['showFilterPills']) || $attributes['showFilterPills'] !== false;
$posts_per_page    = isset($attributes['postsPerPage']) ? intval($attributes['postsPerPage']) : -1;
if ($posts_per_page === 0) {
    $posts_per_page = -1;
}

$columns = isset($attributes['columns']) ? $attributes['columns'] : '3';
$grid_cols_class = 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3';
if ($columns === '4') {
    $grid_cols_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
} elseif ($columns === '2') {
    $grid_cols_class = 'grid-cols-1 md:grid-cols-2';
}
?>

<!-- CATALOG GRID & FILTER BLOCK -->
<section class="mb-16">

  <?php if ($show_filter_pills): ?>
  <!-- ALLOY TAXONOMY FILTER PILLS -->
  <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 scrollbar-none">
    <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('all', this)"
      class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-gold text-white dark:text-patina-950 shadow-sm"
      data-alloy="all">
      All Specimens
    </button>

    <?php
    if (function_exists('get_terms')) {
        $terms = get_terms(array(
            'taxonomy'   => 'alloy_type',
            'hide_empty' => false,
        ));

        if (!empty($terms) && !is_wp_error($terms)):
            foreach ($terms as $term):
                ?>
                <button onclick="typeof setAlloyFilter === 'function' && setAlloyFilter('<?php echo esc_attr($term->slug); ?>', this)"
                  class="alloy-filter-btn px-4 py-2 rounded-lg font-mono text-xs font-semibold uppercase tracking-wider transition-colors bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 text-slate-700 dark:text-slate-300 hover:border-gold"
                  data-alloy="<?php echo esc_attr($term->slug); ?>">
                  <?php echo esc_html($term->name); ?> (<?php echo esc_html($term->count); ?>)
                </button>
                <?php
            endforeach;
        endif;
    }
    ?>
  </div>
  <?php endif; ?>

  <!-- SPECIMEN PRODUCT GRID -->
  <div id="catalogGrid" class="grid <?php echo esc_attr($grid_cols_class); ?> gap-8">
    <?php
    $rendered_any = false;

    if (class_exists('WP_Query')) {
        $specimens = new WP_Query(array(
            'post_type'      => array('specimen', 'statue'),
            'posts_per_page' => $posts_per_page,
            'post_status'    => 'publish',
        ));

        if ($specimens->have_posts()):
            $rendered_any = true;
            while ($specimens->have_posts()): $specimens->the_post();
                $post_id = get_the_ID();
                $sku     = get_post_meta($post_id, '_specimen_sku', true) ?: (get_post_meta($post_id, '_statue_sku', true) ?: ('SH-' . str_pad($post_id, 3, '0', STR_PAD_LEFT)));
                $price   = floatval(get_post_meta($post_id, '_specimen_price', true) ?: (get_post_meta($post_id, '_statue_price', true) ?: 3200));
                $height  = get_post_meta($post_id, '_specimen_height', true) ?: (get_post_meta($post_id, '_statue_height', true) ?: '18.5 in / 47 cm');
                $weight  = get_post_meta($post_id, '_specimen_weight', true) ?: (get_post_meta($post_id, '_statue_weight', true) ?: '14.2 kg');
                $symm    = get_post_meta($post_id, '_specimen_symmetry', true) ?: (get_post_meta($post_id, '_statue_symmetry', true) ?: '99.8%');

                $img_url = get_the_post_thumbnail_url($post_id, 'large');
                if (!$img_url) {
                    $img_asset = get_post_meta($post_id, '_specimen_asset_img', true) ?: (get_post_meta($post_id, '_statue_asset_fallback', true) ?: 'green_tara.jpg');
                    $img_url   = function_exists('shrestha_asset') ? shrestha_asset($img_asset) : (function_exists('get_template_directory_uri') ? get_template_directory_uri() . '/assets/' . $img_asset : $img_asset);
                }

                $terms = get_the_terms($post_id, 'alloy_type');
                $alloy_slugs = array();
                $alloy_name  = 'Ashtadhatu (8-Metal)';
                if (!empty($terms) && !is_wp_error($terms)) {
                    $alloy_name = $terms[0]->name;
                    foreach ($terms as $t) {
                        $alloy_slugs[] = $t->slug;
                    }
                }
                $alloy_slug_str = implode(' ', $alloy_slugs);
                ?>
                <div class="specimen-card bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden shadow-lg hover:border-gold/60 transition-all flex flex-col group"
                  data-sku="<?php echo esc_attr($sku); ?>"
                  data-name="<?php the_title_attribute(); ?>"
                  data-price="<?php echo esc_attr($price); ?>"
                  data-alloys="<?php echo esc_attr($alloy_slug_str); ?>">
                  
                  <div class="relative h-80 bg-black flex items-center justify-center overflow-hidden">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>"
                      class="max-h-full max-w-full object-contain filter drop-shadow-xl group-hover:scale-105 transition-transform duration-500" />
                    
                    <span class="absolute top-3 left-3 bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30 shadow">
                      <?php echo esc_html($sku); ?>
                    </span>

                    <span class="absolute top-3 right-3 bg-patina-900/90 text-emerald-400 font-mono text-[10px] px-2.5 py-1 rounded border border-emerald-500/30 flex items-center gap-1 shadow">
                      <i data-lucide="shield-check" class="w-3 h-3"></i> Consecrated
                    </span>
                  </div>

                  <div class="p-6 flex-1 flex flex-col justify-between gap-4">
                    <div>
                      <span class="font-mono text-[11px] text-gold uppercase tracking-wider font-semibold"><?php echo esc_html($alloy_name); ?></span>
                      <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment mt-1">
                        <a href="<?php the_permalink(); ?>" class="hover:text-gold transition-colors"><?php the_title(); ?></a>
                      </h3>
                      <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
                        <?php echo esc_html(wp_strip_all_tags(get_the_excerpt() ?: get_the_content())); ?>
                      </p>
                    </div>

                    <div class="grid grid-cols-3 gap-2 py-3 border-y border-slate-100 dark:border-gold/10 font-mono text-[11px] text-center">
                      <div>
                        <span class="block text-slate-400 text-[9px] uppercase">Height</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-300"><?php echo esc_html($height); ?></span>
                      </div>
                      <div>
                        <span class="block text-slate-400 text-[9px] uppercase">Weight</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-300"><?php echo esc_html($weight); ?></span>
                      </div>
                      <div>
                        <span class="block text-slate-400 text-[9px] uppercase">Symmetry</span>
                        <span class="font-semibold text-gold"><?php echo esc_html($symm); ?></span>
                      </div>
                    </div>

                    <div class="flex flex-col gap-2.5 pt-2 border-t border-slate-100 dark:border-gold/10">
                      <div class="flex items-center justify-between">
                        <span class="font-mono font-bold text-xl text-gold">NRP <?php echo (floor($price) == $price ? number_format($price) : number_format($price, 2)); ?></span>
                        <button onclick="typeof openSpecimenModalByProdId === 'function' && openSpecimenModalByProdId('<?php echo esc_js($sku); ?>')"
                          class="p-2 bg-slate-100 dark:bg-patina-800 hover:bg-gold/10 text-slate-700 dark:text-parchment hover:text-gold rounded-lg border border-slate-200 dark:border-gold/20 transition-colors shadow-sm text-xs font-mono flex items-center gap-1"
                          title="Inspect Technical Specs">
                          <i data-lucide="scan" class="w-3.5 h-3.5"></i>
                          <span class="hidden sm:inline text-[10px]">Specs</span>
                        </button>
                      </div>
                      
                      <div class="grid grid-cols-2 gap-2">
                        <button type="button"
                          data-action="add-to-cart"
                          data-sku="<?php echo esc_attr($sku); ?>"
                          onclick="addToCartByProdId('<?php echo esc_js($sku); ?>', this)"
                          class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                          <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                          <span>Add to Cart</span>
                        </button>
                        <?php
                        $grid_wa_url = function_exists('shrestha_get_whatsapp_inquiry_url') 
                            ? shrestha_get_whatsapp_inquiry_url($sku, get_the_title()) 
                            : 'https://wa.me/9779841234567?text=' . rawurlencode('Namaste! I would like to inquire about acquiring "' . get_the_title() . '" (SKU: ' . $sku . '). Please share details.');
                        ?>
                        <button type="button"
                          data-action="inquiry"
                          data-sku="<?php echo esc_attr($sku); ?>"
                          onclick="if(typeof openWhatsAppInquiry==='function'){openWhatsAppInquiry('<?php echo esc_js($sku); ?>');}else if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($sku); ?>');}else{window.open('<?php echo esc_url($grid_wa_url); ?>', '_blank');}"
                          class="inquiry-btn px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                          <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                          <span>Inquiry</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
    }

    // Default Fallback Specimens matching static theme when DB query produces 0 posts
    if (!$rendered_any):
      $fallback_specimens = array(
        array(
          'sku'      => 'SH-001',
          'name'     => 'Green Tara: Mother of Divine Liberation',
          'price'    => 14800,
          'alloys'   => 'ashtadhatu gold-leaf',
          'alloy_lbl'=> '8-Metal Ashtadhatu Alloy',
          'img'      => function_exists('shrestha_asset') ? shrestha_asset('green_tara.jpg') : get_template_directory_uri() . '/assets/green_tara.jpg',
          'desc'     => 'Hand-cast using lost-wax iconometry from 8-metal Ashtadhatu alloy with 24K gold-leaf fire gilding and cold-chiseled facial symmetry.',
          'height'   => '22.5 in / 57 cm',
          'weight'   => '14.2 kg',
          'symm'     => '99.8%',
          'link'     => function_exists('home_url') ? home_url('/catalog/') : '#',
        ),
        array(
          'sku'      => 'SH-002',
          'name'     => 'Shakyamuni Buddha: Earth-Touching Mudra',
          'price'    => 16500,
          'alloys'   => 'ashtadhatu gold-leaf',
          'alloy_lbl'=> '24K Fire-Gilded Bronze',
          'img'      => function_exists('shrestha_asset') ? shrestha_asset('shakyamuni.jpg') : get_template_directory_uri() . '/assets/shakyamuni.jpg',
          'desc'     => 'Cast according to 14th-century Licchavi proportions with sealed consecration chamber and traditional cold-gold facial painting.',
          'height'   => '24.0 in / 61 cm',
          'weight'   => '16.5 kg',
          'symm'     => '99.9%',
          'link'     => function_exists('home_url') ? home_url('/catalog/') : '#',
        ),
        array(
          'sku'      => 'SH-108',
          'name'     => 'Mahakala: Wrathful Guardian of Sacred Dharma',
          'price'    => 19500,
          'alloys'   => 'ashtadhatu patina-bronze',
          'alloy_lbl'=> 'Tantric Ashtadhatu Alloy',
          'img'      => function_exists('shrestha_asset') ? shrestha_asset('mahakala.jpg') : get_template_directory_uri() . '/assets/mahakala.jpg',
          'desc'     => 'Wrathful Dharmapala manifestation cast in deep patina alloy with hand-burnished ornaments and Sanskrit consecrated seed syllables.',
          'height'   => '18.0 in / 46 cm',
          'weight'   => '18.6 kg',
          'symm'     => '99.7%',
          'link'     => function_exists('home_url') ? home_url('/catalog/') : '#',
        ),
      );

      foreach ($fallback_specimens as $spec):
        ?>
        <div class="specimen-card bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden shadow-lg hover:border-gold/60 transition-all flex flex-col group"
          data-sku="<?php echo esc_attr($spec['sku']); ?>"
          data-name="<?php echo esc_attr($spec['name']); ?>"
          data-price="<?php echo esc_attr($spec['price']); ?>"
          data-alloys="<?php echo esc_attr($spec['alloys']); ?>">
          <div class="relative h-80 bg-black flex items-center justify-center overflow-hidden">
            <img src="<?php echo esc_url($spec['img']); ?>" alt="<?php echo esc_attr($spec['name']); ?>"
              class="max-h-full max-w-full object-contain filter drop-shadow-xl group-hover:scale-105 transition-transform duration-500" />
            <span class="absolute top-3 left-3 bg-black/80 text-gold font-mono text-[10px] px-2.5 py-1 rounded border border-gold/30 shadow"><?php echo esc_html($spec['sku']); ?></span>
            <span class="absolute top-3 right-3 bg-patina-900/90 text-emerald-400 font-mono text-[10px] px-2.5 py-1 rounded border border-emerald-500/30 flex items-center gap-1 shadow">
              <i data-lucide="shield-check" class="w-3 h-3"></i> Consecrated
            </span>
          </div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <span class="font-mono text-[11px] text-gold uppercase tracking-wider font-semibold"><?php echo esc_html($spec['alloy_lbl']); ?></span>
              <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment mt-1">
                <a href="<?php echo esc_url($spec['link']); ?>" class="hover:text-gold transition-colors"><?php echo esc_html($spec['name']); ?></a>
              </h3>
              <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
                <?php echo esc_html($spec['desc']); ?>
              </p>
            </div>
            <div class="grid grid-cols-3 gap-2 py-3 border-y border-slate-100 dark:border-gold/10 font-mono text-[11px] text-center">
              <div>
                <span class="block text-slate-400 text-[9px] uppercase">Height</span>
                <span class="font-semibold text-slate-700 dark:text-slate-300"><?php echo esc_html($spec['height']); ?></span>
              </div>
              <div>
                <span class="block text-slate-400 text-[9px] uppercase">Weight</span>
                <span class="font-semibold text-slate-700 dark:text-slate-300"><?php echo esc_html($spec['weight']); ?></span>
              </div>
              <div>
                <span class="block text-slate-400 text-[9px] uppercase">Symmetry</span>
                <span class="font-semibold text-gold"><?php echo esc_html($spec['symm']); ?></span>
              </div>
            </div>
            <div class="flex flex-col gap-2.5 pt-2 border-t border-slate-100 dark:border-gold/10">
              <div class="flex items-center justify-between">
                <span class="font-mono font-bold text-xl text-gold">NRP <?php echo (floor($spec['price']) == $spec['price'] ? number_format($spec['price']) : number_format($spec['price'], 2)); ?></span>
                <button onclick="typeof openSpecimenModalByProdId === 'function' && openSpecimenModalByProdId('<?php echo esc_js($spec['sku']); ?>')"
                  class="p-2 bg-slate-100 dark:bg-patina-800 hover:bg-gold/10 text-slate-700 dark:text-parchment hover:text-gold rounded-lg border border-slate-200 dark:border-gold/20 transition-colors shadow-sm text-xs font-mono flex items-center gap-1"
                  title="Inspect Technical Specs">
                  <i data-lucide="scan" class="w-3.5 h-3.5"></i>
                  <span class="hidden sm:inline text-[10px]">Specs</span>
                </button>
              </div>
              
              <div class="grid grid-cols-2 gap-2">
                <button type="button"
                  data-action="add-to-cart"
                  data-sku="<?php echo esc_attr($spec['sku']); ?>"
                  onclick="addToCartByProdId('<?php echo esc_js($spec['sku']); ?>', this)"
                  class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                  <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                  <span>Add to Cart</span>
                </button>
                <?php
                $spec_wa_url = function_exists('shrestha_get_whatsapp_inquiry_url') 
                    ? shrestha_get_whatsapp_inquiry_url($spec['sku'], $spec['title']) 
                    : 'https://wa.me/9779841234567?text=' . rawurlencode('Namaste! I would like to inquire about acquiring "' . $spec['title'] . '" (SKU: ' . $spec['sku'] . '). Please share details.');
                ?>
                <button type="button"
                  data-action="inquiry"
                  data-sku="<?php echo esc_attr($spec['sku']); ?>"
                  onclick="if(typeof openWhatsAppInquiry==='function'){openWhatsAppInquiry('<?php echo esc_js($spec['sku']); ?>');}else if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($spec['sku']); ?>');}else{window.open('<?php echo esc_url($spec_wa_url); ?>', '_blank');}"
                  class="inquiry-btn px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                  <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                  <span>Inquiry</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php
      endforeach;
    endif;
    ?>
  </div>

  <!-- Empty Search State Notice -->
  <div id="noResultsNotice" class="hidden text-center py-20 bg-white dark:bg-patina-900 border border-gold/20 rounded-2xl shadow-xl">
    <div class="w-16 h-16 mx-auto rounded-full bg-gold/10 border border-gold/30 flex items-center justify-center text-gold mb-4">
      <i data-lucide="compass" class="w-8 h-8"></i>
    </div>
    <h3 class="font-display font-bold text-xl text-slate-900 dark:text-parchment">No Sacred Specimens Found</h3>
    <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 max-w-md mx-auto leading-relaxed">
      Try refining your keyword search, or resetting the alloy taxonomy filter above to view all consecrated specimens.
    </p>
  </div>

</section>
