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
              <span class="font-mono text-3xl font-bold text-gold">$<?php echo number_format($price, 2); ?></span>
              <span class="font-mono text-xs text-slate-400">USD • International Insured Freight Included</span>
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
          <div class="flex flex-col sm:flex-row items-stretch gap-4 pt-2">
            <button onclick="addToCartByProdId('<?php echo esc_js($sku); ?>')"
              class="flex-1 py-4 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center justify-center gap-2">
              <i data-lucide="shopping-bag" class="w-4 h-4"></i>
              <span>Acquire This Sacred Specimen</span>
            </button>

            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
              class="px-6 py-4 bg-white dark:bg-patina-900 border border-gold/40 hover:border-gold text-slate-800 dark:text-parchment hover:text-gold font-mono font-semibold text-xs uppercase tracking-wider rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm">
              <i data-lucide="message-circle" class="w-4 h-4"></i>
              <span>Commission Inquiries</span>
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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
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
                  $rel_img   = get_the_post_thumbnail_url($rel_id, 'medium') ?: shrestha_asset(get_post_meta($rel_id, '_specimen_asset_img', true) ?: 'green_tara.jpg');
                  ?>
                  <div class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden p-4 shadow flex flex-col justify-between">
                    <div class="h-48 bg-black rounded-lg flex items-center justify-center overflow-hidden mb-4">
                      <img src="<?php echo esc_url($rel_img); ?>" alt="<?php the_title_attribute(); ?>" class="max-h-full max-w-full object-contain" />
                    </div>
                    <div>
                      <span class="font-mono text-[10px] text-gold"><?php echo esc_html($rel_sku); ?></span>
                      <h4 class="font-display font-bold text-base text-slate-900 dark:text-parchment mt-0.5">
                        <a href="<?php the_permalink(); ?>" class="hover:text-gold"><?php the_title(); ?></a>
                      </h4>
                      <span class="font-mono font-bold text-sm text-gold block mt-2">$<?php echo number_format($rel_price, 2); ?></span>
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
