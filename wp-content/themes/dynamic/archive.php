<?php
/**
 * Archive Template
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-12 border-b border-slate-200 dark:border-gold/20 pb-6">
      <span class="font-mono text-xs text-gold uppercase tracking-wider block mb-2">ARCHIVE</span>
      <h1 class="font-display text-3xl sm:text-4xl font-bold text-slate-900 dark:text-parchment">
        <?php the_archive_title(); ?>
      </h1>
      <?php the_archive_description('<div class="text-xs text-slate-400 mt-2 font-sans">', '</div>'); ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      if (have_posts()):
          while (have_posts()): the_post();
              ?>
              <article class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-xl overflow-hidden shadow-lg p-6 flex flex-col justify-between">
                <div>
                  <span class="font-mono text-xs text-gold"><?php echo get_the_date(); ?></span>
                  <h2 class="font-display font-bold text-xl text-slate-900 dark:text-parchment mt-2">
                    <a href="<?php the_permalink(); ?>" class="hover:text-gold transition-colors"><?php the_title(); ?></a>
                  </h2>
                  <p class="text-xs text-slate-500 dark:text-slate-400 mt-3 line-clamp-3">
                    <?php echo esc_html(wp_strip_all_tags(get_the_excerpt() ?: get_the_content())); ?>
                  </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-gold/10">
                  <a href="<?php the_permalink(); ?>" class="font-mono text-xs text-gold hover:text-gold-bright flex items-center gap-1">
                    <span>View Entry</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                  </a>
                </div>
              </article>
              <?php
          endwhile;
      endif;
      ?>
    </div>
  </main>

<?php
get_footer();
