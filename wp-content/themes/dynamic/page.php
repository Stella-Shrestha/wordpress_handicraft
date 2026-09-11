<?php
/**
 * Default Page Template
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <main class="w-full max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <?php
    while (have_posts()): the_post();
        ?>
        <article class="bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/20 rounded-2xl p-6 sm:p-12 shadow-xl">
          <header class="mb-8 border-b border-slate-100 dark:border-gold/10 pb-6">
            <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment leading-tight">
              <?php the_title(); ?>
            </h1>
          </header>

          <div class="prose dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 font-sans leading-relaxed">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
    endwhile;
    ?>
  </main>

<?php
get_footer();
