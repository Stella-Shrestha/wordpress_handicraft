<?php
/**
 * Single Sacred Statue Template
 *
 * @package ShresthaHandicraftStatic
 */

get_header();

while (have_posts()): the_post();
    $post_id    = get_the_ID();
    $sku        = get_post_meta($post_id, '_statue_sku', true) ?: ('ST-' . str_pad($post_id, 3, '0', STR_PAD_LEFT));
    $price      = floatval(get_post_meta($post_id, '_statue_price', true) ?: 4200);
    $height     = get_post_meta($post_id, '_statue_height', true) ?: '24 in / 61 cm';
    $width      = get_post_meta($post_id, '_statue_width', true) ?: '16 in / 41 cm';
    $weight     = get_post_meta($post_id, '_statue_weight', true) ?: '18.5 kg / 40.8 lbs';
    $alloy      = get_post_meta($post_id, '_statue_alloy_desc', true) ?: 'Sacred 8-Metal Ashtadhatu Sacred Alloy';
    $gilding    = get_post_meta($post_id, '_statue_gilding', true) ?: '24K Mercury Fire Gilded & Pure Cold Gold Face Painted';
    $symmetry   = get_post_meta($post_id, '_statue_symmetry', true) ?: '99.8%';
    $angula     = get_post_meta($post_id, '_statue_angula', true) ?: '124 Canonical Angula (10-Tala System)';
    $casting    = get_post_meta($post_id, '_statue_casting', true) ?: 'Licchavi Lost-Wax Cire Perdue Hand Casting';
    $sanskrit   = get_post_meta($post_id, '_statue_sanskrit_name', true) ?: '';
    $mudra      = get_post_meta($post_id, '_statue_mudra', true) ?: 'Varada Mudra (Supreme Boons) & Utpala Lotus';
    $style      = get_post_meta($post_id, '_statue_art_style', true) ?: '14th-Century Early Malla Dynasty Classicism';
    $canon      = get_post_meta($post_id, '_statue_canon', true) ?: 'Sanskrit Shilpa Shastra & Sāmāṅgara Sūtradhāra';
    $consec     = get_post_meta($post_id, '_statue_consecrated', true) !== 'no';
    $lama       = get_post_meta($post_id, '_statue_consecrator', true) ?: 'Consecrated by Tibetan Monastic Rinpoche';
    $place      = get_post_meta($post_id, '_statue_consecration_place', true) ?: 'Swayambhunath Mahavihara, Kathmandu';
    $sculptor   = get_post_meta($post_id, '_statue_sculptor', true) ?: 'Patan Hereditary Master Sculptors Guild';
    $avail      = get_post_meta($post_id, '_statue_availability', true) ?: 'available';

    // Image URL with fallback
    $img_url = get_the_post_thumbnail_url($post_id, 'full');
    if (!$img_url) {
        $fallback_asset = get_post_meta($post_id, '_statue_asset_fallback', true) ?: 'green_tara.jpg';
        $img_url = function_exists('shrestha_asset') ? shrestha_asset($fallback_asset) : (get_template_directory_uri() . '/assets/' . $fallback_asset);
    }

    // Taxonomies
    $categories = get_the_terms($post_id, 'statue_category');
    $category_names = array();
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $cat) {
            $category_names[] = $cat->name;
        }
    }
    $category_str = !empty($category_names) ? implode(', ', $category_names) : 'Sacred Deity Statue';

    $alloys = get_the_terms($post_id, 'alloy_type');
    if (!empty($alloys) && !is_wp_error($alloys)) {
        $alloy = $alloys[0]->name;
    }
    ?>

    <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">

      <!-- Breadcrumbs -->
      <nav class="flex items-center gap-2 font-mono text-xs text-slate-400 mb-8">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold transition-colors">Home</a>
        <span>/</span>
        <a href="<?php echo esc_url(home_url('/statues/')); ?>" class="hover:text-gold transition-colors">Sacred Statues</a>
        <span>/</span>
        <span class="text-gold"><?php the_title(); ?></span>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

        <!-- Left Column: Visual Presentation -->
        <div class="lg:col-span-6 sticky top-24">
          <div class="bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-4 sm:p-6 shadow-2xl overflow-hidden relative group">
            <div class="relative w-full h-[540px] rounded-xl overflow-hidden bg-black flex items-center justify-center">
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
                    CANONICAL ICONOMETRIC SYMMETRY: <?php echo esc_html($symmetry); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column: Statue Details & Acquisition -->
        <div class="lg:col-span-6 flex flex-col gap-6">
          <div>
            <div class="flex flex-wrap items-center gap-2.5 mb-3">
              <span class="px-3 py-1 bg-gold/10 border border-gold/30 rounded font-mono text-xs text-gold font-semibold">
                <?php echo esc_html($sku); ?>
              </span>
              <span class="px-3 py-1 bg-slate-100 dark:bg-patina-800 border border-slate-300 dark:border-gold/20 rounded font-mono text-xs text-slate-700 dark:text-slate-300">
                <?php echo esc_html($category_str); ?>
              </span>
              <?php if ($consec): ?>
                <span class="px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 rounded font-mono text-xs text-emerald-500 font-semibold flex items-center gap-1.5">
                  <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> RITUAL CONSECRATED
                </span>
              <?php endif; ?>
              <?php if ($avail === 'available'): ?>
                <span class="px-3 py-1 bg-amber-500/10 border border-amber-500/30 rounded font-mono text-xs text-amber-500 font-semibold flex items-center gap-1">
                  <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> IN ATELIER
                </span>
              <?php elseif ($avail === 'commission'): ?>
                <span class="px-3 py-1 bg-purple-500/10 border border-purple-500/30 rounded font-mono text-xs text-purple-400 font-semibold flex items-center gap-1">
                  <i data-lucide="hammer" class="w-3.5 h-3.5"></i> MADE TO ORDER
                </span>
              <?php endif; ?>
            </div>

            <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
              <?php the_title(); ?>
            </h1>

            <?php if (!empty($sanskrit)): ?>
              <p class="font-display text-lg text-gold/90 font-medium italic mt-1.5">
                <?php echo esc_html($sanskrit); ?>
              </p>
            <?php endif; ?>

            <div class="flex items-baseline gap-4 mt-4 pt-4 border-t border-slate-200 dark:border-gold/20">
              <span class="font-mono text-3xl font-bold text-gold">$<?php echo number_format($price, 2); ?></span>
              <span class="font-mono text-xs text-slate-400">USD • Includes Insured Global Freight & Atelier Certificate</span>
            </div>
          </div>

          <!-- Description / Treatise Notes -->
          <div class="prose dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 font-sans leading-relaxed text-sm">
            <?php the_content(); ?>
          </div>

          <!-- Technical & Canonical Specifications -->
          <div class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl p-6 shadow-sm">
            <h3 class="font-display font-bold text-base text-slate-900 dark:text-parchment mb-4 flex items-center gap-2 text-gold">
              <i data-lucide="compass" class="w-4 h-4"></i>
              <span>Canonical Specifications & Sacred Metallurgy</span>
            </h3>

            <dl class="grid grid-cols-2 sm:grid-cols-3 gap-4 font-mono text-xs">
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Alloy Composition</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($alloy); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Height / Base</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($height . ' × ' . $width); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Net Solid Weight</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($weight); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Fire Gilding</dt>
                <dd class="font-semibold text-gold mt-0.5"><?php echo esc_html($gilding); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Posture & Mudra</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($mudra); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Era & Art Style</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($style); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Sanskrit Canon</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($angula); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Foundry Lineage</dt>
                <dd class="font-semibold text-slate-800 dark:text-slate-200 mt-0.5"><?php echo esc_html($sculptor); ?></dd>
              </div>
              <div class="border-b border-slate-100 dark:border-gold/10 pb-2">
                <dt class="text-slate-400 text-[10px] uppercase">Consecration Site</dt>
                <dd class="font-semibold text-emerald-500 mt-0.5"><?php echo esc_html($place); ?></dd>
              </div>
            </dl>
          </div>

          <!-- Acquisition Action Buttons -->
          <div class="flex flex-col sm:flex-row items-stretch gap-3.5 pt-2">
            <button type="button"
              data-action="add-to-cart"
              data-sku="<?php echo esc_attr($sku); ?>"
              onclick="if(typeof addToCartByProdId==='function'){addToCartByProdId('<?php echo esc_js($sku); ?>', this);}else{alert('Statue <?php echo esc_js($sku); ?> added to cart.');}"
              class="add-to-cart-btn flex-1 py-4 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center justify-center gap-2 cursor-pointer">
              <i data-lucide="shopping-bag" class="w-4 h-4"></i>
              <span>Add to Cart</span>
            </button>

            <button type="button"
              onclick="if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($sku); ?>');}else{window.location.href='<?php echo esc_url(home_url('/contact/?inquiry=booking&sku=')); ?><?php echo esc_js($sku); ?>';}"
              class="px-6 py-4 bg-white dark:bg-patina-900 border border-slate-300 dark:border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-bold text-xs uppercase tracking-wider rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm">
              <i data-lucide="message-square" class="w-4 h-4 text-copper"></i>
              <span>Inquiry</span>
            </button>

            <a href="<?php echo esc_url(home_url('/contact/?inquiry=curator&sku=' . urlencode($sku))); ?>"
              class="px-5 py-4 bg-slate-100 dark:bg-patina-800/80 hover:bg-gold/10 border border-slate-200 dark:border-gold/20 text-slate-700 dark:text-slate-300 hover:text-gold font-mono font-semibold text-xs uppercase tracking-wider rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm">
              <i data-lucide="message-circle" class="w-4 h-4"></i>
              <span>Contact Curator</span>
            </a>
          </div>

        </div>

      </div>

      <!-- Related Sacred Statues Query -->
      <div class="mt-24 pt-12 border-t border-slate-200 dark:border-gold/20">
        <div class="flex items-center justify-between mb-8">
          <h2 class="font-display text-2xl sm:text-3xl font-bold text-slate-900 dark:text-parchment">More Sacred Statues</h2>
          <a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="font-mono text-xs text-gold flex items-center gap-1 hover:underline">
            <span>Explore All Atelier Works</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
          <?php
          $related = new WP_Query(array(
              'post_type'      => 'statue',
              'posts_per_page' => 3,
              'post__not_in'   => array($post_id),
              'post_status'    => 'publish',
          ));

          if ($related->have_posts()):
              while ($related->have_posts()): $related->the_post();
                  $rel_id    = get_the_ID();
                  $rel_sku   = get_post_meta($rel_id, '_statue_sku', true) ?: ('ST-' . str_pad($rel_id, 3, '0', STR_PAD_LEFT));
                  $rel_price = floatval(get_post_meta($rel_id, '_statue_price', true) ?: 4200);

                  // Dimensions & Alloy
                  $rel_height = get_post_meta($rel_id, '_statue_height', true) ?: '22.5 in (57.1 cm)';
                  $rel_angula = get_post_meta($rel_id, '_statue_angula', true) ?: '';
                  if ($rel_angula && strpos($rel_height, 'Angula') === false) {
                      $rel_height .= ' (' . $rel_angula . ')';
                  }
                  $rel_weight = get_post_meta($rel_id, '_statue_weight', true) ?: '14.2 kg';

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
                      $rel_asset = get_post_meta($rel_id, '_statue_asset_fallback', true) ?: 'green_tara.jpg';
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
                            $<?php echo number_format($rel_price, 2); ?>
                          </span>
                          <?php
                          $rel_sku_display = !empty($rel_sku) ? ltrim(trim(str_ireplace('SPECIMEN', '', $rel_sku)), '# ') : 'ST-001';
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

                          <button type="button"
                            onclick="if(typeof bookNowByProdId==='function'){bookNowByProdId('<?php echo esc_js($rel_sku); ?>');}else{window.location.href='<?php echo esc_url(home_url('/contact/?inquiry=booking&sku=')); ?><?php echo esc_js($rel_sku); ?>';}"
                            class="px-2.5 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono font-bold text-[11px] uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5 text-center">
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
