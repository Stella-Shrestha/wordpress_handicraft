<?php
/**
 * Template Renderer: Patron Reviews & Testimonials Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$title           = isset($attributes['title']) ? $attributes['title'] : 'Testimonials from Our Clients';
$subtitle        = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'Venerated reviews from Buddhist monasteries, museum curators, international collectors, and sacred art connoisseurs across 34 nations.';
$source          = isset($attributes['source']) ? $attributes['source'] : 'dynamic';
$selected_ids    = (!empty($attributes['selectedIds']) && is_array($attributes['selectedIds'])) ? array_map('intval', $attributes['selectedIds']) : array();
$number_of_posts = isset($attributes['numberOfPosts']) ? intval($attributes['numberOfPosts']) : 6;
$number_of_posts = max(1, min(20, $number_of_posts));

$default_testimonials = array(
    array(
        'stars'    => 5,
        'seal'     => 'Monastic Seal',
        'specimen' => 'Green Tara — 24K Gold (22.5 in)',
        'quote'    => '"The iconometric precision of the 124 Angula grid on our Green Tara is flawless. When the 24K mercury gilding caught the butter lamps in the shrine room, the monastic assembly was deeply moved. Shrestha Atelier preserves the true soul of Patan metallurgy."',
        'initials' => 'LW',
        'name'     => 'Lama Tenzin Wangyal',
        'role'     => 'Abbot, Drukpa Monastery • Paro, Bhutan'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Museum Acquisition',
        'specimen' => 'Mahakala 6-Armed — Ashtadhatu (18 in)',
        'quote'    => '"Acquiring the 6-Armed Mahakala for our Himalayan sacred art gallery exceeded all curatorial expectations. The alloy density, cold-hammered chiseled jewelry, and Sanskrit consecration chamber make this a museum-grade masterpiece."',
        'initials' => 'DR',
        'name'     => 'Dr. Henriette Richter',
        'role'     => 'Curator of Asian Art, Museum Rietberg • Zurich, Switzerland'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Private Collection',
        'specimen' => 'Shakyamuni Buddha — 24K Gilt Fire Gilding (24 in)',
        'quote'    => '"Commissioning our Shakyamuni Buddha was a transcendent experience. Receiving photo documentation of the lost-wax casting and Patan monastery blessing gave our family a profound spiritual heirloom that will endure for centuries."',
        'initials' => 'KC',
        'name'     => 'Kenjiro & Saki Takahashi',
        'role'     => 'Private Collectors of Tantric Iconography • Kyoto, Japan'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Museum Curator',
        'specimen' => 'Mahakala 6-Armed Protector',
        'quote'    => '"As a museum curator, finding contemporary lost-wax bronze casting that matches 14th-century Malla dynasty density is exceptionally rare. Spectrometry testing confirmed authentic 8-metal Ashtadhatu alloy. Phenomenal art historical fidelity."',
        'initials' => 'ES',
        'name'     => 'Dr. Evelyn V. Sterling',
        'role'     => 'Curator, Royal Heritage • London, UK'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Verified Collector',
        'specimen' => 'Shakyamuni Buddha Bhumisparsha',
        'quote'    => '"The cold-gold painted face and hand-chiseled antiqued dark bronze patina have an extraordinary spiritual presence in my gallery. The escrow process was seamless, and the physical certificate signed by Master Rajan Tamrakar gives absolute provenance."',
        'initials' => 'JM',
        'name'     => 'Jean-Luc Moreau',
        'role'     => 'Sacred Art Collector • Geneva, Switzerland'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Monastic Consecration',
        'specimen' => 'Chenrezig 1000-Armed Compassion',
        'quote'    => '"When our nunnery received the thousand-armed Chenrezig, each hand icon accurately held its sacred implement according to the ancient Tibetan canon. The consecrated hollow core allowed our traditional mantra scrolls and relic pills to be sealed with complete monastic reverence."',
        'initials' => 'AD',
        'name'     => 'Ani Choying Drolma',
        'role'     => 'Nagi Gompa Hermitage • Kathmandu, Nepal'
    ),
);

// Query WordPress Testimonial CPT posts
$testimonials = array();

if ($source === 'manual' && !empty($selected_ids)) {
    $t_query = new WP_Query(array(
        'post_type'      => 'testimonial',
        'post__in'       => $selected_ids,
        'orderby'        => 'post__in',
        'posts_per_page' => $number_of_posts,
        'post_status'    => 'publish',
        'no_found_rows'  => true,
    ));
} else {
    $t_query = new WP_Query(array(
        'post_type'      => 'testimonial',
        'posts_per_page' => $number_of_posts,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
        'no_found_rows'  => true,
    ));
}

if ($t_query->have_posts()) {
    while ($t_query->have_posts()) {
        $t_query->the_post();
        $p_id     = get_the_ID();
        $p_title  = get_the_title();
        $p_quote  = wp_strip_all_tags(get_the_content());
        $p_role   = get_post_meta($p_id, '_testimonial_role', true) ?: (get_post_meta($p_id, '_review_location', true) ?: '');
        $p_seal   = get_post_meta($p_id, '_testimonial_seal', true) ?: 'Verified Patron';
        $p_spec   = get_post_meta($p_id, '_testimonial_specimen', true) ?: (get_post_meta($p_id, '_review_specimen', true) ?: '');
        $p_rating = intval(get_post_meta($p_id, '_testimonial_rating', true) ?: (get_post_meta($p_id, '_review_rating', true) ?: 5));
        $p_init   = get_post_meta($p_id, '_testimonial_initials', true);
        if (empty($p_init)) {
            $words = preg_split('/\s+/', trim($p_title));
            $p_init = (isset($words[0][0]) ? strtoupper($words[0][0]) : '') . (isset($words[1][0]) ? strtoupper($words[1][0]) : '');
        }
        $p_thumb  = get_the_post_thumbnail_url($p_id, 'thumbnail');

        $testimonials[] = array(
            'id'       => $p_id,
            'name'     => $p_title,
            'quote'    => $p_quote,
            'role'     => $p_role,
            'seal'     => $p_seal,
            'specimen' => $p_spec,
            'stars'    => max(1, min(5, $p_rating)),
            'initials' => $p_init ?: 'SA',
            'thumb'    => $p_thumb,
        );
    }
    wp_reset_postdata();
}

// Fallback to static attribute or default if no CPT posts found
if (empty($testimonials)) {
    $testimonials = (!empty($attributes['testimonials']) && is_array($attributes['testimonials'])) ? $attributes['testimonials'] : $default_testimonials;
}
?>

<!-- VENERATED PATRON REVIEWS & ENDORSEMENTS SLIDER SECTION -->
<section id="reviews" class="py-12 lg:pb-24 relative overflow-hidden transition-colors duration-300">

  <div
    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-gold/10 dark:bg-gold/5 blur-[120px] rounded-full pointer-events-none">
  </div>

  <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
      <div class="flex flex-col gap-3">
        <h2
          class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-parchment tracking-tight leading-tight">
          <?php echo esc_html($title); ?>
        </h2>
        <div class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed">
          <?php echo wp_kses_post(wpautop($subtitle)); ?>
        </div>
      </div>

      <div class="flex items-center gap-3 self-start md:self-end shrink-0">
        <div class="flex items-center gap-2">
          <button id="prevReviewBtn"
            class="w-10 h-10 rounded-xl bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-slate-700 dark:text-parchment hover:text-gold hover:border-gold hover:bg-gold/10 transition-colors shadow-sm"
            aria-label="Previous Slide">
            <i data-lucide="chevron-left" class="w-5 h-5"></i>
          </button>
          <button id="nextReviewBtn"
            class="w-10 h-10 rounded-xl bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-slate-700 dark:text-parchment hover:text-gold hover:border-gold hover:bg-gold/10 transition-colors shadow-sm"
            aria-label="Next Slide">
            <i data-lucide="chevron-right" class="w-5 h-5"></i>
          </button>
        </div>
      </div>
    </div>

    <div id="reviewsSliderContainer" class="overflow-hidden relative rounded-2xl py-2 px-1">
      <div id="reviewsTrack" class="flex transition-transform duration-500 ease-out">

        <?php foreach ($testimonials as $t): 
          $t_stars    = !empty($t['stars']) ? intval($t['stars']) : 5;
          $t_seal     = !empty($t['seal']) ? $t['seal'] : 'Verified Patron';
          $t_specimen = !empty($t['specimen']) ? $t['specimen'] : '';
          $t_quote    = !empty($t['quote']) ? $t['quote'] : '';
          $t_init     = !empty($t['initials']) ? $t['initials'] : 'SA';
          $t_name     = !empty($t['name']) ? $t['name'] : 'Venerated Patron';
          $t_role     = !empty($t['role']) ? $t['role'] : '';
        ?>
        <div class="w-full md:w-1/2 lg:w-1/3 shrink-0 px-3 flex">
          <div
            class="w-full bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/25 hover:border-gold/60 rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl transition-all duration-300 relative group">
            <div>
              <div class="flex items-center justify-between gap-2 mb-4">
                <div class="flex items-center gap-1 text-amber-400 dark:text-gold">
                  <?php for ($s = 0; $s < $t_stars; $s++): ?>
                    <i data-lucide="star" class="w-4 h-4 fill-current text-amber-400 dark:text-gold"></i>
                  <?php endfor; ?>
                </div>
                <?php if (!empty($t_seal)): ?>
                <span
                  class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                  <i data-lucide="shield-check" class="w-3 h-3"></i> <?php echo esc_html($t_seal); ?>
                </span>
                <?php endif; ?>
              </div>

              <?php if (!empty($t_specimen)): ?>
              <div
                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 text-[11px] font-mono text-gold font-medium mb-3">
                <i data-lucide="diamond" class="w-3 h-3 text-gold"></i>
                <span><?php echo esc_html($t_specimen); ?></span>
              </div>
              <?php endif; ?>

              <p
                class="text-slate-700 dark:text-slate-300 text-xs sm:text-sm font-sans italic leading-relaxed my-3">
                <?php echo esc_html($t_quote); ?>
              </p>
            </div>

            <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3">
              <?php if (!empty($t['thumb'])): ?>
                <img src="<?php echo esc_url($t['thumb']); ?>" alt="<?php echo esc_attr($t_name); ?>" class="w-11 h-11 rounded-full object-cover shadow-md shrink-0 border border-gold/40" />
              <?php else: ?>
                <div
                  class="w-11 h-11 rounded-full bg-gradient-to-tr from-amber-600 via-gold to-copper text-patina-950 font-display font-bold text-sm flex items-center justify-center shadow-md shrink-0">
                  <?php echo esc_html($t_init); ?>
                </div>
              <?php endif; ?>
              <div class="flex flex-col min-w-0">
                <span class="font-display font-bold text-sm text-slate-900 dark:text-parchment truncate">
                  <?php echo esc_html($t_name); ?>
                </span>
                <?php if (!empty($t_role)): ?>
                <span class="text-[11px] font-mono text-slate-500 dark:text-slate-400 truncate">
                  <?php echo esc_html($t_role); ?>
                </span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <!-- Mobile Slide Indicators -->
    <div class="flex items-center justify-center gap-2 mt-8 md:hidden">
      <?php for ($i = 0; $i < count($testimonials); $i++): ?>
        <button class="review-indicator w-2.5 h-2.5 rounded-full <?php echo $i === 0 ? 'bg-gold' : 'bg-slate-300 dark:bg-slate-700'; ?> transition-all duration-300"
          data-slide-to="<?php echo $i; ?>" aria-label="Go to slide <?php echo $i + 1; ?>"></button>
      <?php endfor; ?>
    </div>

  </div>
</section>
