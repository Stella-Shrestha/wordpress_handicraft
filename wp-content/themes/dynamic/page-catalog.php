<?php
/**
 * Template Name: Catalog / Shop Page Template
 *
 * Dynamic Gutenberg Block Page Template for Catalog / Sacred Specimens
 * Mirrors front-page.php & page-about.php with server-rendered blocks
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <!-- MAIN CATALOG & DYNAMIC GUTENBERG CONTENT -->
  <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <?php
    if (have_posts()):
        while (have_posts()): the_post();
            $content = get_the_content();
            if (!empty(trim($content))) {
                the_content();
            } else {
                echo do_blocks('<!-- wp:shrestha/catalog-hero /-->');
                echo do_blocks('<!-- wp:shrestha/catalog-grid /-->');
                echo do_blocks('<!-- wp:shrestha/catalog-commission /-->');
            }
        endwhile;
    else:
        echo do_blocks('<!-- wp:shrestha/catalog-hero /-->');
        echo do_blocks('<!-- wp:shrestha/catalog-grid /-->');
        echo do_blocks('<!-- wp:shrestha/catalog-commission /-->');
    endif;
    ?>
  </main>

<?php
get_footer();
