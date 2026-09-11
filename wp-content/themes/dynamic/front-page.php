<?php
/**
 * Front Page Template (Home Page)
 *
 * Template Name: Home Page
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <!-- MAIN HERO & DYNAMIC GUTENBERG CONTENT -->
  <main class="w-full">
    <?php
    if (have_posts()):
        while (have_posts()): the_post();
            $content = get_the_content();
            if (!empty(trim($content))) {
                the_content();
            } else {
                echo do_blocks('<!-- wp:shrestha/hero-specimen /-->');
                echo do_blocks('<!-- wp:shrestha/infinite-ticker /-->');
                echo do_blocks('<!-- wp:shrestha/newly-consecrated /-->');
                echo do_blocks('<!-- wp:shrestha/lost-wax-process /-->');
                echo do_blocks('<!-- wp:shrestha/master-artisans /-->');
                echo do_blocks('<!-- wp:shrestha/patron-testimonials /-->');
            }
        endwhile;
    else:
        echo do_blocks('<!-- wp:shrestha/hero-specimen /-->');
        echo do_blocks('<!-- wp:shrestha/infinite-ticker /-->');
        echo do_blocks('<!-- wp:shrestha/newly-consecrated /-->');
        echo do_blocks('<!-- wp:shrestha/lost-wax-process /-->');
        echo do_blocks('<!-- wp:shrestha/master-artisans /-->');
        echo do_blocks('<!-- wp:shrestha/patron-testimonials /-->');
    endif;
    ?>
  </main>

<?php
get_footer();
