<?php
/**
 * Single Sacred Specimen Template
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();

while (have_posts()): the_post();
    $post_id = get_the_ID();
    $sku     = get_post_meta($post_id, '_specimen_sku', true) ?: ('SH-' . str_pad($post_id, 3, '0', STR_PAD_LEFT));
    $price   = floatval(get_post_meta($post_id, '_specimen_price', true) ?: 3200);
    $height  = get_post_meta($post_id, '_specimen_height', true) ?: '18.5 in / 47 cm';
    $weight  = get_post_meta($post_id, '_specimen_weight', true) ?: '14.2 kg';
    $symm    = get_post_meta($post_id, '_specimen_symmetry', true) ?: '99.8%';
    $angula  = get_post_meta($post_id, '_specimen_angula', true) ?: '124 Canonical Angula';
    $consec  = get_post_meta($post_id, '_specimen_consecrated', true) !== 'no';

    $img_url = get_the_post_thumbnail_url($post_id, 'full');
    if (!$img_url) {
        $img_asset = get_post_meta($post_id, '_specimen_asset_img', true) ?: 'green_tara.jpg';
        $img_url   = shrestha_asset($img_asset);
    }

    $terms = get_the_terms($post_id, 'alloy_type');
    $alloy_names = array();
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $t) {
            $alloy_names[] = $t->name;
        }
    }
    $alloy_str = !empty($alloy_names) ? implode(', ', $alloy_names) : '8-Metal Ashtadhatu Sacred Alloy';
    ?>

    <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">

      <!-- Breadcrumbs -->
      <nav class="flex items-center gap-2 font-mono text-xs text-slate-400 mb-8">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold transition-colors">Home</a>
        <span>/</span>
        <a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="hover:text-gold transition-colors">Sacred Specimens</a>
        <span>/</span>
        <span class="text-gold"><?php the_title(); ?></span>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

        <!-- Left Column: Visual Presentation -->
        <div class="lg:col-span-6 sticky top-24">
          <div class="bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 sm:p-6 shadow-2xl overflow-hidden relative group">
            <div class="relative w-full h-[520px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
              <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>"
                class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-105 transition-transform duration-700" />
              
              <!-- HUD Crosshairs Overlay -->
              <div class="absolute inset-0 border border-gold/20 pointer-events-none">
                <div class="absolute top-4 left-4 w-4 h-4 border-t-2 border-l-2 border-gold"></div>
                <div class="absolute top-4 right-4 w-4 h-4 border-t-2 border-r-2 border-gold"></div>
                <div class="absolute bottom-4 left-4 w-4 h-4 border-b-2 border-l-2 border-gold"></div>
                <div class="absolute bottom-4 right-4 w-4 h-4 border-b-2 border-r-2 border-gold"></div>
                <div class="absolute bottom-4 left-4 right-4 text-center">
                  <span class="bg-black/80 text-gold font-mono text-xs px-3 py-1.5 rounded border border-gold/30">
                    CANONICAL ICONOMETRY: <?php echo esc_html($symm); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column: Specimen Metadata & Acquisition -->
        <div class="lg:col-span-6 flex flex-col gap-6">
          <div>
            <div class="flex items-center gap-3 mb-3">
              <span class="px-3 py-1 bg-gold/10 border border-gold/30 rounded font-mono text-xs text-gold">
                <?php echo esc_html($sku); ?>
              </span>
              <?php if ($consec): ?>
                <span class="px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 rounded font-mono text-xs text-emerald-400 flex items-center gap-1.5">
                  <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> RITUAL CONSECRATED
                </span>
              <?php endif; ?>
            </div>

            <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
              <?php the_title(); ?>
            </h1>

            <div class="flex items-baseline gap-4 mt-4">
              <span class="font-mono text-3xl font-bold text-gold">NRP <?php echo (floor($price) == $price ? number_format($price) : number_format($price, 2)); ?></span>
              <span class="font-mono text-xs text-slate-400">NRP • International Insured Freight Included</span>
            </div>
          </div>

          <!-- Description & Treatise Notes -->
          <div class="prose dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 font-sans leading-relaxed text-sm">
            <?php the_content(); ?>
          </div>

          <!-- Technical Iconometry Specification Table -->
          <div class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl p-6 shadow-sm">
            <h3 class="font-display font-bold text-base text-slate-900 dark:text-parchment mb-4 flex items-center gap-2 text-gold">
              <i data-lucide="compass" class="w-4 h-4"></i>
              <span>Canonical Metallurgy & Dimensions</span>
            </h3>

            <dl class="grid grid-cols-2 sm:grid-cols-3 gap-4 font-mono text-xs">
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Alloy Composition</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($alloy_str); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Total Height</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($height); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Net Crucible Weight</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($weight); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Sanskrit Iconometry</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($angula); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Gilding Protocol</dt>
                <dd class="font-semibold text-gold mt-0.5">24K Mercury Fire-Gilt</dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Atelier Hallmark</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5">Patan Registered #SH-2026</dd>
              </div>
            </dl>
          </div>

          <!-- Acquisition Action Buttons -->
          <div class="flex flex-col sm:flex-row items-stretch gap-3.5 pt-2">
            <button type="button"
              data-action="add-to-cart"
              data-sku="<?php echo esc_attr($sku); ?>"
              onclick="if(typeof addToCartByProdId==='function'){addToCartByProdId('<?php echo esc_js($sku); ?>', this);}else{alert('Specimen <?php echo esc_js($sku); ?> added to cart.');}"
              class="add-to-cart-btn flex-1 py-4 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center justify-center gap-2 cursor-pointer">
              <i data-lucide="shopping-bag" class="w-4 h-4"></i>
              <span>Add to Cart</span>
            </button>

            <?php
            $specimen_wa_url = function_exists('shrestha_get_whatsapp_inquiry_url') 
                ? shrestha_get_whatsapp_inquiry_url($sku, get_the_title()) 
                : 'https://wa.me/9779841234567?text=' . rawurlencode('Namaste! I would like to inquire about acquiring "' . get_the_title() . '" (SKU: ' . $sku . '). Please share details.');
            ?>
            <button type="button"
              data-action="inquiry"
              data-sku="<?php echo esc_attr($sku); ?>"
              onclick="if(typeof openWhatsAppInquiry==='function'){openWhatsAppInquiry('<?php echo esc_js($sku); ?>');}else if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($sku); ?>');}else{window.open('<?php echo esc_url($specimen_wa_url); ?>', '_blank');}"
              class="inquiry-btn px-6 py-4 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-bold text-xs uppercase tracking-wider rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm">
              <i data-lucide="message-square" class="w-4 h-4 text-copper"></i>
              <span>Inquiry</span>
            </button>

            <a href="<?php echo esc_url(home_url('/contact/?inquiry=commission&sku=' . urlencode($sku))); ?>"
              class="px-5 py-4 bg-slate-100 dark:bg-patina-800/80 hover:bg-gold/10 border border-slate-200 dark:border-gold/20 text-slate-700 dark:text-slate-300 hover:text-gold font-mono font-semibold text-xs uppercase tracking-wider rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm">
              <i data-lucide="message-circle" class="w-4 h-4"></i>
              <span>Contact Curator</span>
            </a>
          </div>

        </div>

      </div>

      <!-- Related Sacred Specimens Query -->
      <div class="mt-24 pt-12 border-t border-slate-200 dark:border-gold/20">
        <div class="flex items-center justify-between mb-8">
          <h2 class="font-display text-2xl sm:text-3xl font-bold text-slate-900 dark:text-parchment">Related Sacred Specimens</h2>
          <a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="font-mono text-xs text-gold flex items-center gap-1">
            <span>View All</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
          <?php
          $related = new WP_Query(array(
              'post_type'      => 'specimen',
              'posts_per_page' => 3,
              'post__not_in'   => array($post_id),
              'post_status'    => 'publish',
          ));

          if ($related->have_posts()):
              while ($related->have_posts()): $related->the_post();
                  $rel_id    = get_the_ID();
                  $rel_sku   = get_post_meta($rel_id, '_specimen_sku', true) ?: ('SH-' . str_pad($rel_id, 3, '0', STR_PAD_LEFT));
                  $rel_price = floatval(get_post_meta($rel_id, '_specimen_price', true) ?: 3200);

                  // Dimensions & Alloy
                  $rel_height = get_post_meta($rel_id, '_specimen_height', true) ?: '22.5 in (57.1 cm)';
                  $rel_angula = get_post_meta($rel_id, '_specimen_angula', true) ?: '';
                  if ($rel_angula && strpos($rel_height, 'Angula') === false) {
                      $rel_height .= ' (' . $rel_angula . ')';
                  }
                  $rel_weight = get_post_meta($rel_id, '_specimen_weight', true) ?: '14.2 kg';

                  $terms = get_the_terms($rel_id, 'alloy_type');
                  $rel_alloy = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : (get_post_meta($rel_id, '_statue_alloy_desc', true) ?: 'Ashtadhatu (8-Metal)');

                  // Badge & Grade
                  $rel_badge = 'ASHTADHATU';
                  if (stripos($rel_alloy, 'Gold') !== false || stripos($rel_alloy, '24K') !== false) {
                      $rel_badge = '24K GOLD LEAF';
                  } elseif (stripos($rel_alloy, 'Bronze') !== false || stripos($rel_alloy, 'Patina') !== false) {
                      $rel_badge = 'PATINA BRONZE';
                  } elseif (stripos($rel_alloy, 'Copper') !== false) {
                      $rel_badge = 'COPPER REPOUSSÉ';
                  }
                  $rel_grade = 'SPECIMEN GRADE';

                  // Image
                  $rel_img = get_the_post_thumbnail_url($rel_id, 'large');
                  if (!$rel_img) {
                      $rel_asset = get_post_meta($rel_id, '_specimen_asset_img', true) ?: 'green_tara.jpg';
                      $rel_img   = function_exists('shrestha_asset') ? shrestha_asset($rel_asset) : (get_template_directory_uri() . '/assets/' . $rel_asset);
                  }
                  ?>
                  <div data-sku="<?php echo esc_attr($rel_sku); ?>" data-name="<?php the_title_attribute(); ?>" data-price="<?php echo esc_attr($rel_price); ?>" data-alloys="<?php echo esc_attr($rel_alloy); ?>"
                    class="specimen-card bg-white dark:bg-patina-900 border border-slate-200/80 dark:border-gold/30 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative w-full h-[380px] sm:h-[430px] overflow-hidden bg-black flex items-center justify-center">
                      <img src="<?php echo esc_url($rel_img); ?>" alt="<?php the_title_attribute(); ?>"
                        class="w-full h-full object-contain sm:object-cover group-hover:scale-105 transition-transform duration-700" />
                      <div
                        class="absolute top-4 right-4 bg-black/90 backdrop-blur-md px-3 py-1 rounded-full border border-gold/40 text-gold font-mono text-[10px] tracking-wider uppercase font-bold shadow-md">
                        <?php echo esc_html($rel_badge); ?>
                      </div>
                    </div>

                    <div class="p-6 flex flex-col justify-between flex-1 gap-5 bg-white dark:bg-patina-900">
                      <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                          <span class="font-mono font-bold text-xl sm:text-2xl text-amber-600 dark:text-gold">
                            NRP <?php echo (floor($rel_price) == $rel_price) ? number_format($rel_price) : number_format($rel_price, 2); ?>
                          </span>
                          <?php
                          $rel_sku_display = !empty($rel_sku) ? ltrim(trim(str_ireplace('SPECIMEN', '', $rel_sku)), '# ') : 'SH-001';
                          ?>
                          <div class="inline-flex items-center px-2.5 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold shadow-sm font-semibold tracking-wider">
                            <span><?php echo esc_html($rel_sku_display); ?></span>
                          </div>
                        </div>

                        <h3
                          class="font-sans font-bold text-xl sm:text-2xl text-slate-900 dark:text-parchment leading-tight pt-1">
                          <a href="<?php the_permalink(); ?>" class="hover:text-gold transition-colors">
                            <?php the_title(); ?>
                          </a>
                        </h3>
                      </div>

                      <div
                        class="flex flex-col text-xs font-mono gap-2.5 py-3 border-y border-dashed border-slate-200 dark:border-slate-800">
                        <div class="flex justify-between items-center text-[11px]">
                          <span class="text-slate-500 dark:text-slate-400">Alloy Grade:</span>
                          <span class="font-bold text-slate-900 dark:text-parchment"><?php echo esc_html($rel_alloy); ?></span>
                        </div>
                        <div class="flex justify-between items-center text-[11px]">
                          <span class="text-slate-500 dark:text-slate-400">Height:</span>
                          <span class="font-bold text-slate-900 dark:text-parchment"><?php echo esc_html($rel_height); ?></span>
                        </div>
                        <div class="flex justify-between items-center text-[11px]">
                          <span class="text-slate-500 dark:text-slate-400">Raw Weight:</span>
                          <span class="font-bold text-slate-900 dark:text-parchment"><?php echo esc_html($rel_weight); ?></span>
                        </div>
                      </div>

                      <div class="flex flex-col gap-2 pt-1">
                        <div class="grid grid-cols-2 gap-2">
                          <button type="button"
                            data-action="add-to-cart"
                            data-sku="<?php echo esc_attr($rel_sku); ?>"
                            onclick="if(typeof addToCartByProdId==='function'){addToCartByProdId('<?php echo esc_js($rel_sku); ?>', this);}else if(typeof window.addToCartByProdId==='function'){window.addToCartByProdId('<?php echo esc_js($rel_sku); ?>', this);}else{alert('Added to cart.');}"
                            class="add-to-cart-btn px-2.5 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer text-center">
                            <i data-lucide="shopping-bag" class="w-3.5 h-3.5 shrink-0"></i>
                            <span>Add to Cart</span>
                          </button>

                          <?php
                          $rel_wa_url = function_exists('shrestha_get_whatsapp_inquiry_url') 
                              ? shrestha_get_whatsapp_inquiry_url($rel_sku, get_the_title()) 
                              : 'https://wa.me/9779841234567?text=' . rawurlencode('Namaste! I would like to inquire about acquiring "' . get_the_title() . '" (SKU: ' . $rel_sku . '). Please share details.');
                          ?>
                          <button type="button"
                            data-action="inquiry"
                            data-sku="<?php echo esc_attr($rel_sku); ?>"
                            onclick="if(typeof openWhatsAppInquiry==='function'){openWhatsAppInquiry('<?php echo esc_js($rel_sku); ?>');}else if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($rel_sku); ?>');}else{window.open('<?php echo esc_url($rel_wa_url); ?>', '_blank');}"
                            class="inquiry-btn px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
                            <i data-lucide="message-square" class="w-3.5 h-3.5 shrink-0 text-copper"></i>
                            <span>Inquiry</span>
                          </button>
                        </div>

                        <a href="<?php the_permalink(); ?>"
                          class="w-full py-2 bg-slate-50 dark:bg-patina-950 hover:bg-slate-100 dark:hover:bg-patina-800 text-slate-600 dark:text-slate-400 hover:text-gold border border-slate-200 dark:border-slate-800 rounded-lg text-center font-mono text-[10px] uppercase tracking-widest transition-colors flex items-center justify-center gap-1">
                          <i data-lucide="scan" class="w-3 h-3"></i>
                          <span>Inspect Spec</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <?php
              endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>

    </main>

    <?php
endwhile;

get_footer();
