<?php
/**
 * Template Name: Contact Us Page Template
 *
 * Dynamic Gutenberg Block Page Template for Contact Us
 * Mirrors front-page.php & page-about.php with server-rendered blocks
 *
 * @package ShresthaHandicraftDynamic
 */

get_header();
?>

  <!-- MAIN CONTACT & DYNAMIC GUTENBERG CONTENT -->
  <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <?php
    if (have_posts()):
        while (have_posts()): the_post();
            $content = get_the_content();
            if (!empty(trim($content))) {
                the_content();
            } else {
                echo do_blocks('<!-- wp:shrestha/contact-hero /-->');
                echo do_blocks('<!-- wp:shrestha/contact-section /-->');
            }
        endwhile;
    else:
        echo do_blocks('<!-- wp:shrestha/contact-hero /-->');
        echo do_blocks('<!-- wp:shrestha/contact-section /-->');
    endif;
    ?>
  </main>

<?php
get_footer();
