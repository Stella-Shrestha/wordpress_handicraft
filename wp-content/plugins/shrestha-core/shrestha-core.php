<?php
/**
 * Plugin Name: Shrestha Handicraft Core Engine
 * Plugin URI: https://shresthahandicraft.com/
 * Description: Core functionality and custom Gutenberg blocks for Shrestha Handicraft Atelier. Provides sacred specimen post types, metallurgy taxonomies, custom meta boxes, and modular block editor components for the front page.
 * Version: 1.0.0
 * Author: Shrestha Handicraft Atelier
 * Author URI: https://shresthahandicraft.com/
 * Text Domain: shrestha-core
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('SHRESTHA_CORE_VERSION', '1.1.0');
define('SHRESTHA_CORE_PATH', plugin_dir_path(__FILE__));
define('SHRESTHA_CORE_URL', plugin_dir_url(__FILE__));

// 1. Include Custom Post Types & Taxonomies
require_once SHRESTHA_CORE_PATH . 'includes/cpt.php';

// 2. Include Custom Meta Boxes
require_once SHRESTHA_CORE_PATH . 'includes/meta-boxes.php';

// 3. Include Gutenberg Blocks Registration
require_once SHRESTHA_CORE_PATH . 'includes/blocks.php';

/**
 * Register Custom Gutenberg Block Category
 */
function shrestha_core_block_categories($categories, $post) {
    return array_merge(
        array(
            array(
                'slug'  => 'shrestha-blocks',
                'title' => __('Shrestha Handicraft', 'shrestha-core'),
                'icon'  => 'awards',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'shrestha_core_block_categories', 10, 2);

/**
 * Register and Enqueue Gutenberg Block Editor Assets
 */
function shrestha_core_register_editor_assets() {
    $css_ver = file_exists(SHRESTHA_CORE_PATH . 'assets/css/editor-style.css') ? filemtime(SHRESTHA_CORE_PATH . 'assets/css/editor-style.css') : SHRESTHA_CORE_VERSION;
    $js_ver  = file_exists(SHRESTHA_CORE_PATH . 'assets/js/editor-blocks.js') ? filemtime(SHRESTHA_CORE_PATH . 'assets/js/editor-blocks.js') : SHRESTHA_CORE_VERSION;

    // Editor CSS
    wp_register_style(
        'shrestha-core-editor-css',
        SHRESTHA_CORE_URL . 'assets/css/editor-style.css',
        array('wp-edit-blocks'),
        $css_ver
    );

    // Google Fonts for Editor
    wp_register_style(
        'shrestha-core-editor-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Editor JS
    wp_register_script(
        'shrestha-core-editor-js',
        SHRESTHA_CORE_URL . 'assets/js/editor-blocks.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data', 'wp-i18n', 'wp-block-editor', 'media-upload', 'thickbox'),
        $js_ver,
        true
    );

    // Fetch published statues and specimens for easy selection in Gutenberg
    $available_posts = array();
    $posts_query = get_posts(array(
        'post_type'      => array('statue', 'specimen'),
        'posts_per_page' => 100,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ));
    foreach ($posts_query as $p) {
        $sku      = get_post_meta($p->ID, '_statue_sku', true) ?: (get_post_meta($p->ID, '_specimen_sku', true) ?: ('ST-' . str_pad($p->ID, 3, '0', STR_PAD_LEFT)));
        $raw_p    = get_post_meta($p->ID, '_statue_price', true) ?: (get_post_meta($p->ID, '_specimen_price', true) ?: '4200');
        $price    = is_numeric($raw_p) ? number_format((float)$raw_p) : $raw_p;
        $height   = get_post_meta($p->ID, '_statue_height', true) ?: (get_post_meta($p->ID, '_specimen_height', true) ?: '24 in / 61 cm');
        $weight   = get_post_meta($p->ID, '_statue_weight', true) ?: (get_post_meta($p->ID, '_specimen_weight', true) ?: '18.5 kg');
        $alloy    = get_post_meta($p->ID, '_statue_alloy_desc', true) ?: '8-Metal Ashtadhatu';
        $consec   = get_post_meta($p->ID, '_statue_consecrated', true) !== 'no' && get_post_meta($p->ID, '_specimen_consecrated', true) !== 'no';
        $thumb    = get_the_post_thumbnail_url($p->ID, 'medium') ?: '';
        $fallback = get_post_meta($p->ID, '_statue_asset_fallback', true) ?: (get_post_meta($p->ID, '_specimen_asset_img', true) ?: 'green_tara.jpg');
        
        $meta_parts = array();
        if ($height) $meta_parts[] = $height;
        if ($weight) $meta_parts[] = $weight;
        if ($price)  $meta_parts[] = 'NRP ' . $price;
        if ($consec) $meta_parts[] = 'Consecrated';

        $available_posts[] = array(
            'id'       => $p->ID,
            'title'    => $p->post_title,
            'type'     => ($p->post_type === 'statue') ? 'Statue' : 'Specimen',
            'sku'      => $sku,
            'price'    => $price,
            'height'   => $height,
            'weight'   => $weight,
            'alloy'    => $alloy,
            'subtitle' => implode(' | ', $meta_parts),
            'thumb'    => $thumb,
            'fallback' => $fallback,
            'url'      => get_permalink($p->ID),
        );
    }

    // Fetch published testimonials for manual selection in Gutenberg
    $available_testimonials = array();
    $testimonials_query = get_posts(array(
        'post_type'      => 'testimonial',
        'posts_per_page' => 100,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));
    foreach ($testimonials_query as $t_post) {
        $role     = get_post_meta($t_post->ID, '_testimonial_role', true) ?: (get_post_meta($t_post->ID, '_review_location', true) ?: '');
        $specimen = get_post_meta($t_post->ID, '_testimonial_specimen', true) ?: (get_post_meta($t_post->ID, '_review_specimen', true) ?: '');
        $seal     = get_post_meta($t_post->ID, '_testimonial_seal', true) ?: 'Verified Patron';
        $rating   = intval(get_post_meta($t_post->ID, '_testimonial_rating', true) ?: (get_post_meta($t_post->ID, '_review_rating', true) ?: 5));
        $initials = get_post_meta($t_post->ID, '_testimonial_initials', true);
        if (empty($initials)) {
            $words = explode(' ', trim($t_post->post_title));
            $initials = (isset($words[0][0]) ? strtoupper($words[0][0]) : '') . (isset($words[1][0]) ? strtoupper($words[1][0]) : '');
        }
        $thumb    = get_the_post_thumbnail_url($t_post->ID, 'thumbnail') ?: '';
        
        $sub_parts = array();
        if ($role) $sub_parts[] = $role;
        if ($specimen) $sub_parts[] = $specimen;
        if ($seal) $sub_parts[] = $seal;
        $sub_parts[] = str_repeat('★', max(1, min(5, $rating)));

        $available_testimonials[] = array(
            'id'       => $t_post->ID,
            'title'    => $t_post->post_title,
            'subtitle' => implode(' | ', $sub_parts),
            'role'     => $role,
            'specimen' => $specimen,
            'seal'     => $seal,
            'stars'    => $rating,
            'initials' => $initials,
            'quote'    => wp_strip_all_tags($t_post->post_content),
            'thumb'    => $thumb,
        );
    }

    // Pass data to JS Editor
    wp_localize_script('shrestha-core-editor-js', 'shresthaCoreData', array(
        'pluginUrl'             => SHRESTHA_CORE_URL,
        'siteUrl'               => home_url('/'),
        'themeUrl'              => get_template_directory_uri(),
        'availablePosts'        => $available_posts,
        'availableTestimonials' => $available_testimonials,
    ));
}
add_action('init', 'shrestha_core_register_editor_assets', 5);

function shrestha_core_editor_assets() {
    wp_enqueue_media();
    wp_enqueue_style('shrestha-core-editor-fonts');
    wp_enqueue_style('shrestha-core-editor-css');
    
    // Enqueue Lucide Icons for Gutenberg live preview if available
    if (file_exists(get_template_directory() . '/js/lucide.min.js')) {
        wp_enqueue_script('shrestha-core-lucide', get_template_directory_uri() . '/js/lucide.min.js', array(), '0.263.1', true);
    }

    wp_enqueue_script('shrestha-core-editor-js');
}
add_action('enqueue_block_editor_assets', 'shrestha_core_editor_assets');

/**
 * Helper to retrieve image URL (from theme assets or fallback)
 */
function shrestha_core_get_asset_url($filename) {
    if (function_exists('shrestha_asset')) {
        return shrestha_asset($filename);
    }
    return get_template_directory_uri() . '/assets/' . ltrim($filename, '/');
}
