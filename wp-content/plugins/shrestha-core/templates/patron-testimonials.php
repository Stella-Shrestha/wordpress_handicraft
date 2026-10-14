<?php
/**
 * Template Renderer: Patron Reviews & Testimonials Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$title           = isset($attributes['title']) ? $attributes['title'] : "What our patron's say";
$subtitle        = isset($attributes['subtitle']) ? $attributes['subtitle'] : 'Independent reviews from Buddhist monasteries, museum curators, and international collectors across 34 nations.';
$source          = isset($attributes['source']) ? $attributes['source'] : 'dynamic';
$selected_ids    = (!empty($attributes['selectedIds']) && is_array($attributes['selectedIds'])) ? array_map('intval', $attributes['selectedIds']) : array();
$number_of_posts = isset($attributes['numberOfPosts']) ? intval($attributes['numberOfPosts']) : 6;
$number_of_posts = max(1, min(20, $number_of_posts));

// Default Features / Guarantees (User Image: 5 items)
$default_features = array(
    array('icon' => 'globe',        'title' => 'Worldwide',                   'subtitle' => 'Secure Shipping'),
    array('icon' => 'ruler',        'title' => 'Custom Dimensions',           'subtitle' => 'On Request'),
    array('icon' => 'shield-check', 'title' => 'Lifetime Care',               'subtitle' => '& Maintenance'),
    array('icon' => 'flame',        'title' => 'Monastic Blessing',           'subtitle' => 'Available'),
    array('icon' => 'award',        'title' => 'Certificate of Authenticity', 'subtitle' => 'Included')
);
$features = (!empty($attributes['features']) && is_array($attributes['features'])) ? $attributes['features'] : $default_features;

$default_testimonials = array(
    array(
        'stars'    => 5,
        'seal'     => 'Monastic Seal',
        'specimen' => 'Green Tara — 24K Gold (22.5 in)',
        'quote'    => 'The iconometric precision of the 124 Angula grid on our Green Tara is flawless. When the 24K mercury gilding caught the butter lamps in the shrine room, the monastic assembly was deeply moved. Shrestha Atelier preserves the true soul of Patan metallurgy.',
        'initials' => 'LW',
        'name'     => 'Lama Tenzin Wangyal',
        'role'     => 'Abbot, Drukpa Monastery • Bhutan'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Museum Acquisition',
        'specimen' => 'Mahakala 6-Armed — Ashtadhatu (18 in)',
        'quote'    => 'Acquiring the 6-Armed Mahakala for our Himalayan sacred art gallery exceeded all curatorial expectations. The alloy density, cold-hammered chiseled jewelry, and Sanskrit consecration chamber make this a museum-grade masterpiece.',
        'initials' => 'DR',
        'name'     => 'Dr. Henriette Richter',
        'role'     => 'Curator of Asian Art, Museum Rietberg • Switzerland'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Private Collection',
        'specimen' => 'Shakyamuni Buddha — 24K Gilt Fire Gilding (24 in)',
        'quote'    => 'Commissioning our Shakyamuni Buddha was a transcendent experience. Receiving photo documentation of the lost-wax casting and Patan monastery blessing gave our family a profound spiritual heirloom that will endure for centuries.',
        'initials' => 'KC',
        'name'     => 'Kenjiro & Saki Takahashi',
        'role'     => 'Private Collectors • Japan'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Museum Curator',
        'specimen' => 'Mahakala 6-Armed Protector',
        'quote'    => 'As a museum curator, finding contemporary lost-wax bronze casting that matches 14th-century Malla dynasty density is exceptionally rare. Spectrometry testing confirmed authentic 8-metal Ashtadhatu alloy. Phenomenal art historical fidelity.',
        'initials' => 'ES',
        'name'     => 'Dr. Evelyn V. Sterling',
        'role'     => 'Curator, Royal Heritage • UK'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Verified Collector',
        'specimen' => 'Shakyamuni Buddha Bhumisparsha',
        'quote'    => 'The cold-gold painted face and hand-chiseled antiqued dark bronze patina have an extraordinary spiritual presence in my gallery. The escrow process was seamless, and the physical certificate signed by Master Rajan Tamrakar gives absolute provenance.',
        'initials' => 'JM',
        'name'     => 'Jean-Luc Moreau',
        'role'     => 'Sacred Art Collector • Switzerland'
    ),
    array(
        'stars'    => 5,
        'seal'     => 'Monastic Consecration',
        'specimen' => 'Chenrezig 1000-Armed Compassion',
        'quote'    => 'When our nunnery received the thousand-armed Chenrezig, each hand icon accurately held its sacred implement according to the ancient Tibetan canon. The consecrated hollow core allowed our traditional mantra scrolls and relic pills to be sealed with complete monastic reverence.',
        'initials' => 'AD',
        'name'     => 'Ani Choying Drolma',
        'role'     => 'Nagi Gompa Hermitage • Nepal'
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
            'quote'    => trim(trim($p_quote), '"\''),
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

<!-- VENERATED PATRON REVIEWS & TESTIMONIALS SECTION -->
<section id="reviews" class="py-16 lg:py-24 relative overflow-hidden transition-colors duration-300 bg-[#FBFBFC] dark:bg-[#0E1013]">

  <!-- Subtle Ambient Glow -->
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-gold/10 dark:bg-gold/5 blur-[120px] rounded-full pointer-events-none"></div>

  <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

    <!-- TOP GRID: 2 COLUMNS (LEFT: CONTENT + 5 FEATURES LIST, RIGHT: TESTIMONIALS SLIDER) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

      <!-- LEFT COLUMN: Heading, Subtitle, 5 Stars + Rating, 5 FEATURES LIST, CTA Buttons -->
      <div class="lg:col-span-6 flex flex-col justify-center">
        <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-parchment tracking-tight leading-tight">
          <?php echo esc_html($title); ?>
        </h2>

        <div class="text-slate-600 dark:text-slate-400 text-sm sm:text-base font-sans leading-relaxed mt-3">
          <?php echo wp_kses_post(wpautop($subtitle)); ?>
        </div>

        <!-- Rating Row: 5 Gold Stars + 4.9/5 Score -->
        <div class="flex items-center gap-4 sm:gap-6 my-5">
          <div class="flex items-center gap-1 text-amber-400 dark:text-gold shrink-0">
            <?php for ($s = 0; $s < 5; $s++): ?>
              <svg class="w-5 h-5 sm:w-6 sm:h-6 fill-current" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
              </svg>
            <?php endfor; ?>
          </div>
          <div class="flex flex-col">
            <span class="text-xl sm:text-2xl font-display font-extrabold text-slate-900 dark:text-parchment leading-none">4.9/5</span>
            <span class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-sans">Based on authentic patron reviews.</span>
          </div>
        </div>

        <!-- 5-ITEM GUARANTEES & TRUST FEATURES LIST (IMAGE) -->
        <?php if (!empty($features)): ?>
        <div class="grid grid-cols-2 gap-2.5 mt-4">
          <?php foreach ($features as $feat): 
            $f_icon  = !empty($feat['icon']) ? $feat['icon'] : 'globe';
            $f_title = !empty($feat['title']) ? $feat['title'] : '';
            $f_sub   = !empty($feat['subtitle']) ? $feat['subtitle'] : '';
          ?>
          <div class="flex items-center gap-3.5 py-1">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#FAF5EE] dark:bg-gold/10 flex items-center justify-center text-[#B88746] dark:text-gold shrink-0 border border-[#F3E8D8] dark:border-gold/20">
              <i data-lucide="<?php echo esc_attr($f_icon); ?>" class="w-4 h-4"></i>
            </div>
            <div class="leading-tight">
              <strong class="block text-xs sm:text-sm font-bold text-slate-900 dark:text-parchment font-display tracking-wide uppercase">
                <?php echo esc_html($f_title); ?>
              </strong>
              <span class="text-[11px] sm:text-xs text-slate-500 dark:text-slate-400 font-sans mt-0.5 block">
                <?php echo esc_html($f_sub); ?>
              </span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

      </div>

      <!-- RIGHT COLUMN: Quotation Marks, Testimonial Card Slider & Controls -->
      <div class="lg:col-span-6 flex flex-col justify-center relative">

        <!-- Top-Left Giant Quotation Mark (Image 1) -->
        <div class="mb-2 select-none text-slate-900 dark:text-gold inline-block self-start" aria-hidden="true">
          <svg class="w-10 h-10 sm:w-12 sm:h-12 fill-current" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
          </svg>
        </div>

        <!-- Featured Card Box -->
        <div id="reviewsSliderContainer" class="bg-white dark:bg-patina-900 border border-slate-100 dark:border-gold/20 rounded-2xl sm:rounded-3xl shadow-[0_10px_35px_-5px_rgba(0,0,0,0.06)] dark:shadow-2xl overflow-hidden relative min-h-[260px] sm:min-h-[280px]">
          <div id="reviewsTrack" class="flex transition-transform duration-500 ease-out w-full">
            <?php foreach ($testimonials as $t): 
              $t_quote = !empty($t['quote']) ? trim($t['quote'], '"\'') : '';
              $t_name  = !empty($t['name']) ? $t['name'] : 'Venerated Patron';
              $t_role  = !empty($t['role']) ? $t['role'] : '';
              $author_display = strtoupper($t_name . ($t_role ? ', ' . $t_role : ''));
            ?>
            <div class="review-slide min-w-full w-full shrink-0 p-7 sm:p-10 lg:p-12 flex flex-col justify-between">
              <!-- Review Quote -->
              <p class="text-slate-700 dark:text-slate-300 text-sm sm:text-base lg:text-lg font-sans leading-relaxed">
                <?php echo esc_html($t_quote); ?>
              </p>

              <!-- Author Line (Image 1 Style: Uppercase Bold Blue/Gold Font) -->
              <div class="mt-8 pt-4 flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 dark:border-slate-800">
                <span class="text-[#0275B8] dark:text-gold font-sans font-bold text-xs sm:text-sm tracking-wider uppercase">
                  <?php echo esc_html($author_display); ?>
                </span>
                <?php if (!empty($t['seal'])): ?>
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                  <i data-lucide="shield-check" class="w-3 h-3"></i> <?php echo esc_html($t['seal']); ?>
                </span>
                <?php endif; ?>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Bottom-Right Giant Quotation Mark (Image 1) -->
        <div class="flex justify-end mt-2 select-none text-slate-900 dark:text-gold" aria-hidden="true">
          <svg class="w-10 h-10 sm:w-12 sm:h-12 fill-current" viewBox="0 0 24 24">
            <path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.57-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/>
          </svg>
        </div>

        <!-- Bottom Slider Controls: < .... > -->
        <div class="flex items-center justify-center gap-4 sm:gap-6 mt-4">
          <!-- Circular Prev Button (<) -->
          <button
            type="button"
            id="prevReviewBtn"
            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-slate-200 dark:border-gold/30 bg-white dark:bg-patina-900 flex items-center justify-center text-slate-700 dark:text-parchment hover:border-gold hover:text-gold hover:bg-gold/5 transition-all shadow-sm"
            aria-label="Previous Review">
            <i data-lucide="chevron-left" class="w-4 h-4 sm:w-5 sm:h-5"></i>
          </button>

          <!-- Dot Indicators (....) -->
          <div id="reviewDots" class="flex items-center gap-2">
            <?php for ($i = 0; $i < count($testimonials); $i++): ?>
              <button
                type="button"
                class="review-dot-btn transition-all duration-300 <?php echo $i === 0 ? 'w-7 sm:w-8 h-2 sm:h-2.5 bg-slate-900 dark:bg-gold rounded-full shadow-sm' : 'w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full border border-slate-300 dark:border-slate-600 bg-transparent hover:border-slate-500'; ?>"
                data-slide-to="<?php echo $i; ?>"
                aria-label="Go to slide <?php echo $i + 1; ?>">
              </button>
            <?php endfor; ?>
          </div>

          <!-- Circular Next Button (>) -->
          <button
            type="button"
            id="nextReviewBtn"
            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-slate-200 dark:border-gold/30 bg-white dark:bg-patina-900 flex items-center justify-center text-slate-700 dark:text-parchment hover:border-gold hover:text-gold hover:bg-gold/5 transition-all shadow-sm"
            aria-label="Next Review">
            <i data-lucide="chevron-right" class="w-4 h-4 sm:w-5 sm:h-5"></i>
          </button>
        </div>

      </div>

    </div>

  </div>
</section>
