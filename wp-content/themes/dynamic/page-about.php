<?php
/**
 * Template Name: About Us Page Template
 *
 * Dynamic Gutenberg Block Page Template for About Us
 * Mirrors the front-page.php architecture with server-rendered blocks
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <!-- MAIN ABOUT US & DYNAMIC GUTENBERG CONTENT -->
  <main class="w-full">
    <?php
    if (have_posts()):
        while (have_posts()): the_post();
            $content = get_the_content();
            if (!empty(trim($content))) {
                the_content();
            } else {
                echo do_blocks('<!-- wp:shrestha/about-hero /-->');
                echo do_blocks('<!-- wp:shrestha/about-story /-->');
                echo do_blocks('<!-- wp:shrestha/about-artisans /-->');
                echo do_blocks('<!-- wp:shrestha/about-philosophy /-->');
                echo do_blocks('<!-- wp:shrestha/about-atelier /-->');
                echo do_blocks('<!-- wp:shrestha/why-choose-us /-->');
                echo do_blocks('<!-- wp:shrestha/about-cta /-->');
            }
        endwhile;
    else:
        echo do_blocks('<!-- wp:shrestha/about-hero /-->');
        echo do_blocks('<!-- wp:shrestha/about-story /-->');
        echo do_blocks('<!-- wp:shrestha/about-artisans /-->');
        echo do_blocks('<!-- wp:shrestha/about-philosophy /-->');
        echo do_blocks('<!-- wp:shrestha/about-atelier /-->');
        echo do_blocks('<!-- wp:shrestha/why-choose-us /-->');
        echo do_blocks('<!-- wp:shrestha/about-cta /-->');
    endif;
    ?>
  </main>

<?php
get_footer();
