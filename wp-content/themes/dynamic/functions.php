<?php
/**
 * Shrestha Handicraft Dynamic Theme Functions
 *
 * @package ShresthaHandicraftDynamic
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function shrestha_theme_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Register image sizes
    add_image_size('specimen-card', 600, 750, true);
    add_image_size('specimen-hero', 800, 900, false);
    add_image_size('artisan-portrait', 400, 400, true);

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_theme_support('responsive-embeds');

    register_nav_menus(array(
        'primary'          => esc_html__('Primary Menu', 'shresthahandicraft'),
        'trekking-primary' => esc_html__('Trekking Primary Navigation', 'shresthahandicraft'),
        'footer'           => esc_html__('Footer Menu', 'shresthahandicraft'),
        'footer-1'         => esc_html__('Footer 1', 'shresthahandicraft'),
        'footer-2'         => esc_html__('Footer 2', 'shresthahandicraft'),
        'footer-3'         => esc_html__('Footer 3', 'shresthahandicraft'),
        'footer-4'         => esc_html__('Footer 4', 'shresthahandicraft'),
        'mobile-bottom'    => esc_html__('Mobile Bottom Menu', 'shresthahandicraft'),
    ));
}
add_action('after_setup_theme', 'shrestha_theme_setup');

/**
 * Custom Nav Walker for Footer Menus
 */
class Shrestha_Footer_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"pl-3 mt-1.5 flex flex-col gap-1.5 border-l border-gold/20\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $is_current = in_array('current-menu-item', $classes) || in_array('current_page_item', $classes) || in_array('current-menu-ancestor', $classes);

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target)     .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_url($item->url)        .'"' : '';

        $link_color = $is_current ? 'text-gold font-medium' : 'text-slate-400 hover:text-gold';
        $attributes .= ' class="hover:text-gold transition-colors flex items-center justify-between group ' . esc_attr($link_color) . '"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<li>';
        $output .= '<a' . $attributes . '>';
        $output .= '<span>' . esc_html($title) . '</span>';
        $output .= '<span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span>';
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Custom Nav Walker for Desktop Primary Header Menu
 */
class Shrestha_Primary_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="absolute left-0 top-full mt-2 w-48 bg-patina-900/95 border border-gold/30 rounded-lg p-2 shadow-2xl backdrop-blur-md hidden group-hover:flex flex-col gap-1 z-50">';
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $is_current = in_array('current-menu-item', $classes) || in_array('current_page_item', $classes);
        $has_children = in_array('menu-item-has-children', $classes);

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target)     .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_url($item->url)        .'"' : '';

        $title = apply_filters('the_title', $item->title, $item->ID);

        if ($depth === 0) {
            $active_class = $is_current 
                ? 'font-semibold text-gold bg-gold/10 border border-gold/30' 
                : 'font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-parchment';
            $attributes .= ' class="px-3.5 py-1.5 font-mono text-xs ' . $active_class . ' rounded-md flex items-center gap-1.5 transition-colors uppercase"';
            
            $output .= '<li class="' . ($has_children ? 'relative group' : '') . '">';
            $output .= '<a' . $attributes . '>';
            $output .= esc_html($title);
            if ($has_children) {
                $output .= '<i data-lucide="chevron-down" class="w-3.5 h-3.5 opacity-60"></i>';
            }
            $output .= '</a>';
        } else {
            $attributes .= ' class="px-3 py-2 font-mono text-xs text-slate-300 hover:text-gold hover:bg-gold/10 rounded transition-colors block"';
            $output .= '<li><a' . $attributes . '>' . esc_html($title) . '</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Custom Nav Walker for Mobile Drawer Navigation
 */
class Shrestha_Mobile_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $is_current = in_array('current-menu-item', $classes) || in_array('current_page_item', $classes);

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target)     .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_url($item->url)        .'"' : '';

        $active_class = $is_current 
            ? 'font-semibold text-gold bg-gold/10 border border-gold/30' 
            : 'font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-patina-900';
        $attributes .= ' class="px-4 py-2.5 font-mono text-xs ' . $active_class . ' rounded-lg flex items-center justify-between transition-colors uppercase"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<li>';
        $output .= '<a' . $attributes . '>';
        $output .= '<span>' . esc_html($title) . '</span>';
        $output .= '<i data-lucide="chevron-right" class="w-4 h-4 ' . ($is_current ? 'text-gold' : 'text-slate-400') . '"></i>';
        $output .= '</a>';
        $output .= '</li>';
    }
}

/**
 * Helper to get the assigned menu name for a theme location
 */
function shrestha_get_menu_name($theme_location, $fallback_title = '') {
    $locations = get_nav_menu_locations();
    if (isset($locations[$theme_location]) && $locations[$theme_location] > 0) {
        $menu_obj = wp_get_nav_menu_object($locations[$theme_location]);
        if ($menu_obj && !is_wp_error($menu_obj) && !empty($menu_obj->name)) {
            return $menu_obj->name;
        }
    }
    return $fallback_title;
}

/**
 * Render dynamic footer menu by location with custom walker and fallback
 */
function shrestha_render_footer_menu($location, $fallback_html = '') {
    if (has_nav_menu($location)) {
        wp_nav_menu(array(
            'theme_location' => $location,
            'container'      => false,
            'menu_class'     => 'flex flex-col gap-2.5 text-xs text-slate-400 font-sans',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            'walker'         => new Shrestha_Footer_Nav_Walker(),
            'fallback_cb'    => false,
            'depth'          => 2,
        ));
    } elseif (!empty($fallback_html)) {
        echo $fallback_html;
    }
}

/**
 * Enqueue scripts and styles
 */
function shrestha_theme_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'shrestha-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main Theme Stylesheet
    wp_enqueue_style(
        'shrestha-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );

    // Tailwind CSS CDN Script
    wp_enqueue_script(
        'tailwind-cdn',
        'https://cdn.tailwindcss.com',
        array(),
        null,
        false
    );

    // Tailwind Configuration Script
    $tailwind_config = "
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            patina: {
              950: '#0B0C0E',
              900: '#131518',
              850: '#1A1D22',
              800: '#1F2228',
              50: '#F9F6F0',
              100: '#F3ECE2'
            },
            gold: {
              DEFAULT: '#D49B4B',
              bright: '#F5C77E',
              dark: '#B87A28'
            },
            copper: {
              DEFAULT: '#B86B4B',
              bright: '#E28766'
            },
            parchment: '#F3EED9'
          },
          fontFamily: {
            display: ['Cinzel', 'serif'],
            mono: ['Space Grotesk', 'monospace'],
            sans: ['Plus Jakarta Sans', 'sans-serif']
          },
          keyframes: {
            marquee: {
              '0%': { transform: 'translateX(0%)' },
              '100%': { transform: 'translateX(-50%)' }
            }
          },
          animation: {
            marquee: 'marquee 25s linear infinite'
          }
        }
      }
    };
    ";
    wp_add_inline_script('tailwind-cdn', $tailwind_config, 'after');

    // Lucide Icons (Local Bundle)
    wp_enqueue_script(
        'shrestha-lucide',
        get_template_directory_uri() . '/js/lucide.min.js',
        array(),
        '1.0.0',
        false
    );

    // Main JavaScript Engine
    $main_ver = file_exists(get_template_directory() . '/js/main.js') ? filemtime(get_template_directory() . '/js/main.js') : '1.1.0';
    wp_enqueue_script(
        'shrestha-main',
        get_template_directory_uri() . '/js/main.js',
        array('shrestha-lucide'),
        $main_ver,
        true
    );

    // Dynamic Specimens Data for JS Cart & Modals
    $specimens_data = shrestha_get_all_specimens_js_data();

    // Localize Script
    wp_localize_script('shrestha-main', 'shresthaData', array(
        'themeUri'   => get_template_directory_uri(),
        'siteUrl'    => home_url('/'),
        'ajaxUrl'    => admin_url('admin-ajax.php'),
        'nonce'      => wp_create_nonce('shrestha_ajax_nonce'),
        'specimens'  => $specimens_data,
        'customizer' => array(
            'phone'    => get_theme_mod('shrestha_phone', '+977 1 552 1432'),
            'whatsapp' => get_theme_mod('shrestha_whatsapp', '+977 984 123 4567'),
            'email'    => get_theme_mod('shrestha_email', 'curator@shresthahandicraft.com'),
            'address'  => get_theme_mod('shrestha_address', 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal'),
            'hours'    => get_theme_mod('shrestha_hours', 'Sun – Fri: 09:00 AM – 06:00 PM NPT'),
        )
    ));
}
add_action('wp_enqueue_scripts', 'shrestha_theme_scripts');

/**
 * Add custom body classes
 */
function shrestha_body_classes($classes) {
    $classes[] = 'bg-patina-50';
    $classes[] = 'dark:bg-patina-950';
    $classes[] = 'text-slate-800';
    $classes[] = 'dark:text-parchment';
    $classes[] = 'font-sans';
    $classes[] = 'min-h-screen';
    $classes[] = 'transition-colors';
    $classes[] = 'duration-300';
    $classes[] = 'bg-grid-pattern';
    return $classes;
}
add_filter('body_class', 'shrestha_body_classes');

/**
 * Helper to retrieve theme asset URL
 */
function shrestha_asset($relative_path) {
    return esc_url(get_template_directory_uri() . '/assets/' . ltrim($relative_path, '/'));
}

/**
 * Register Custom Post Types and Taxonomies
 */
function shrestha_register_post_types() {
    // 1. Sacred Specimens CPT
    $specimen_labels = array(
        'name'               => _x('Sacred Specimens', 'post type general name', 'shresthahandicraft'),
        'singular_name'      => _x('Sacred Specimen', 'post type singular name', 'shresthahandicraft'),
        'menu_name'          => _x('Specimens (Shop)', 'admin menu', 'shresthahandicraft'),
        'add_new'            => _x('Add New Specimen', 'specimen', 'shresthahandicraft'),
        'add_new_item'       => __('Add New Sacred Specimen', 'shresthahandicraft'),
        'edit_item'          => __('Edit Specimen', 'shresthahandicraft'),
        'new_item'           => __('New Specimen', 'shresthahandicraft'),
        'view_item'          => __('View Specimen', 'shresthahandicraft'),
        'search_items'       => __('Search Specimens', 'shresthahandicraft'),
        'not_found'          => __('No specimens found', 'shresthahandicraft'),
        'not_found_in_trash' => __('No specimens found in Trash', 'shresthahandicraft'),
    );
    register_post_type('specimen', array(
        'labels'             => $specimen_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'specimen'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-star-filled',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    ));

    // 2. Alloy Type Taxonomy for Specimens
    $alloy_labels = array(
        'name'              => _x('Alloy Types', 'taxonomy general name', 'shresthahandicraft'),
        'singular_name'     => _x('Alloy Type', 'taxonomy singular name', 'shresthahandicraft'),
        'search_items'      => __('Search Alloy Types', 'shresthahandicraft'),
        'all_items'         => __('All Alloy Types', 'shresthahandicraft'),
        'edit_item'         => __('Edit Alloy Type', 'shresthahandicraft'),
        'update_item'       => __('Update Alloy Type', 'shresthahandicraft'),
        'add_new_item'      => __('Add New Alloy Type', 'shresthahandicraft'),
        'new_item_name'     => __('New Alloy Type Name', 'shresthahandicraft'),
        'menu_name'         => __('Alloy Types', 'shresthahandicraft'),
    );
    register_taxonomy('alloy_type', array('specimen'), array(
        'hierarchical'      => true,
        'labels'            => $alloy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'alloy-type'),
        'show_in_rest'      => true,
    ));

    // 3. Master Artisans CPT
    $artisan_labels = array(
        'name'               => _x('Master Artisans', 'post type general name', 'shresthahandicraft'),
        'singular_name'      => _x('Master Artisan', 'post type singular name', 'shresthahandicraft'),
        'menu_name'          => _x('Artisans', 'admin menu', 'shresthahandicraft'),
        'add_new'            => _x('Add New Artisan', 'artisan', 'shresthahandicraft'),
        'add_new_item'       => __('Add New Master Artisan', 'shresthahandicraft'),
        'edit_item'          => __('Edit Artisan', 'shresthahandicraft'),
        'new_item'           => __('New Artisan', 'shresthahandicraft'),
        'view_item'          => __('View Artisan', 'shresthahandicraft'),
        'search_items'       => __('Search Artisans', 'shresthahandicraft'),
    );
    register_post_type('artisan', array(
        'labels'             => $artisan_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'artisan'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    ));

    // 4. Patron Reviews CPT
    $testimonial_labels = array(
        'name'               => _x('Patron Reviews', 'post type general name', 'shresthahandicraft'),
        'singular_name'      => _x('Patron Review', 'post type singular name', 'shresthahandicraft'),
        'menu_name'          => _x('Patron Reviews', 'admin menu', 'shresthahandicraft'),
        'add_new'            => _x('Add New Review', 'testimonial', 'shresthahandicraft'),
        'add_new_item'       => __('Add New Patron Review', 'shresthahandicraft'),
        'edit_item'          => __('Edit Review', 'shresthahandicraft'),
        'search_items'       => __('Search Reviews', 'shresthahandicraft'),
    );
    register_post_type('testimonial', array(
        'labels'             => $testimonial_labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => array('title', 'editor', 'custom-fields'),
        'show_in_rest'       => true,
    ));
}
add_action('init', 'shrestha_register_post_types');

/**
 * Register Theme Customizer Settings
 */
function shrestha_customize_register($wp_customize) {
    // Showroom & Concierge Panel
    $wp_customize->add_section('shrestha_concierge_section', array(
        'title'       => __('Showroom & Concierge Info', 'shresthahandicraft'),
        'priority'    => 30,
        'description' => __('Configure showroom contact details, atelier visiting hours, and concierge information.', 'shresthahandicraft'),
    ));

    // Phone
    $wp_customize->add_setting('shrestha_phone', array(
        'default'           => '+977 1 552 1432',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_phone', array(
        'label'    => __('Foundry Hotline / Phone', 'shresthahandicraft'),
        'section'  => 'shrestha_concierge_section',
        'type'     => 'text',
    ));

    // WhatsApp
    $wp_customize->add_setting('shrestha_whatsapp', array(
        'default'           => '+977 984 123 4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_whatsapp', array(
        'label'    => __('WhatsApp Concierge Number', 'shresthahandicraft'),
        'section'  => 'shrestha_concierge_section',
        'type'     => 'text',
    ));

    // Email
    $wp_customize->add_setting('shrestha_email', array(
        'default'           => 'curator@shresthahandicraft.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('shrestha_email', array(
        'label'    => __('Curator / Inquiry Email', 'shresthahandicraft'),
        'section'  => 'shrestha_concierge_section',
        'type'     => 'email',
    ));

    // Address
    $wp_customize->add_setting('shrestha_address', array(
        'default'           => 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_address', array(
        'label'    => __('Showroom Address', 'shresthahandicraft'),
        'section'  => 'shrestha_concierge_section',
        'type'     => 'text',
    ));

    // Hours
    $wp_customize->add_setting('shrestha_hours', array(
        'default'           => 'Sun – Fri: 09:00 AM – 06:00 PM NPT',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_hours', array(
        'label'    => __('Visiting Hours', 'shresthahandicraft'),
        'section'  => 'shrestha_concierge_section',
        'type'     => 'text',
    ));

    // Google Maps Embed URL
    $wp_customize->add_setting('shrestha_map_embed', array(
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.247164478311!2d85.32486791506148!3d27.678735982804565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19cd9148d94b%3A0xc6b677a284000000!2sPatan%20Durbar%20Square!5e0!3m2!1sen!2snp!4v1650000000000!5m2!1sen!2snp',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('shrestha_map_embed', array(
        'label'    => __('Google Maps Embed Iframe URL', 'shresthahandicraft'),
        'section'  => 'shrestha_concierge_section',
        'type'     => 'url',
    ));

    // About Us Page Panel
    $wp_customize->add_section('shrestha_about_section', array(
        'title'       => __('About Us Page Settings', 'shresthahandicraft'),
        'priority'    => 35,
        'description' => __('Configure headlines, philosophy quote, and foundry statistics for the About Us page.', 'shresthahandicraft'),
    ));

    // Hero Tag
    $wp_customize->add_setting('shrestha_about_hero_badge', array(
        'default'           => 'OUR STORY • PATAN, NEPAL',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_about_hero_badge', array(
        'label'    => __('Hero Tag / Badge', 'shresthahandicraft'),
        'section'  => 'shrestha_about_section',
        'type'     => 'text',
    ));

    // Hero Title
    $wp_customize->add_setting('shrestha_about_hero_title', array(
        'default'           => 'Rooted in Tradition. Crafted for Generations.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_about_hero_title', array(
        'label'    => __('Hero Headline', 'shresthahandicraft'),
        'section'  => 'shrestha_about_section',
        'type'     => 'text',
    ));

    // Philosophy Quote
    $wp_customize->add_setting('shrestha_about_quote_text', array(
        'default'           => '"A meaningful sculpture is not simply made. It is patiently shaped through knowledge, proportion and hand."',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('shrestha_about_quote_text', array(
        'label'    => __('Philosophy Quote Text', 'shresthahandicraft'),
        'section'  => 'shrestha_about_section',
        'type'     => 'textarea',
    ));

    // Philosophy Quote Author
    $wp_customize->add_setting('shrestha_about_quote_author', array(
        'default'           => 'THE SHRESTHA HANDICRAFT PHILOSOPHY',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_about_quote_author', array(
        'label'    => __('Quote Attribution / Subtitle', 'shresthahandicraft'),
        'section'  => 'shrestha_about_section',
        'type'     => 'text',
    ));

    // Counter Stats
    $wp_customize->add_setting('shrestha_stat_years', array(
        'default'           => '40+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_stat_years', array(
        'label'    => __('Years Foundry Heritage', 'shresthahandicraft'),
        'section'  => 'shrestha_about_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('shrestha_stat_countries', array(
        'default'           => '50+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('shrestha_stat_countries', array(
        'label'    => __('Countries Delivered', 'shresthahandicraft'),
        'section'  => 'shrestha_about_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'shrestha_customize_register');

/**
 * Gather JS Data for Specimens (Cart, Filter & Quick Modal)
 */
function shrestha_get_all_specimens_js_data() {
    $specimens = array();
    $query = new WP_Query(array(
        'post_type'      => array('specimen', 'statue'),
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $sku     = get_post_meta($post_id, '_statue_sku', true) ?: (get_post_meta($post_id, '_specimen_sku', true) ?: ('SH-' . str_pad($post_id, 3, '0', STR_PAD_LEFT)));
            $raw_p   = get_post_meta($post_id, '_statue_price', true) ?: (get_post_meta($post_id, '_specimen_price', true) ?: '4200');
            $price   = floatval(str_replace(array('$', ','), '', $raw_p));
            $height  = get_post_meta($post_id, '_statue_height', true) ?: (get_post_meta($post_id, '_specimen_height', true) ?: '18.5 in / 47 cm');
            $weight  = get_post_meta($post_id, '_statue_weight', true) ?: (get_post_meta($post_id, '_specimen_weight', true) ?: '14.2 kg');
            $symm    = get_post_meta($post_id, '_statue_symmetry', true) ?: (get_post_meta($post_id, '_specimen_symmetry', true) ?: '99.8%');
            $angula  = get_post_meta($post_id, '_statue_angula', true) ?: (get_post_meta($post_id, '_specimen_angula', true) ?: '124 Canonical Angula');
            $consec  = get_post_meta($post_id, '_statue_consecrated', true) !== 'no' && get_post_meta($post_id, '_specimen_consecrated', true) !== 'no';
            
            // Image
            $img_url = get_the_post_thumbnail_url($post_id, 'full');
            if (!$img_url) {
                $img_asset = get_post_meta($post_id, '_statue_asset_fallback', true) ?: (get_post_meta($post_id, '_specimen_asset_img', true) ?: 'green_tara.jpg');
                $img_url   = shrestha_asset($img_asset);
            }

            // Alloy taxonomy terms
            $alloy_desc = get_post_meta($post_id, '_statue_alloy_desc', true);
            $terms = get_the_terms($post_id, 'alloy_type');
            $alloy_names = array();
            $alloy_slugs = array();
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $t) {
                    $alloy_names[] = $t->name;
                    $alloy_slugs[] = $t->slug;
                }
            }
            $alloy_str = $alloy_desc ?: (!empty($alloy_names) ? implode(', ', $alloy_names) : '8-Metal Ashtadhatu Alloy');

            $specimens[$sku] = array(
                'id'           => $post_id,
                'sku'          => $sku,
                'name'         => get_the_title(),
                'price'        => $price,
                'alloy'        => $alloy_str,
                'alloy_slugs'  => $alloy_slugs,
                'height'       => $height,
                'weight'       => $weight,
                'symmetry'     => $symm,
                'angula'       => $angula,
                'consecrated'  => $consec,
                'image'        => $img_url,
                'link'         => get_permalink($post_id),
                'excerpt'      => wp_strip_all_tags(get_the_excerpt() ?: get_the_content()),
            );
        }
        wp_reset_postdata();
    }

    // Default fallback if database has no specimens yet
    if (empty($specimens)) {
        $specimens['SH-001'] = array(
            'id'          => 1,
            'sku'         => 'SH-001',
            'name'        => 'Green Tara: Mother of Liberation',
            'price'       => 3200,
            'alloy'       => '8-Metal Ashtadhatu & 24K Gold Leaf',
            'alloy_slugs' => array('ashtadhatu', 'gold-leaf'),
            'height'      => '18.5 in / 47 cm',
            'weight'      => '14.2 kg',
            'symmetry'    => '99.8%',
            'angula'      => '124 Canonical Angula',
            'consecrated' => true,
            'image'       => shrestha_asset('green_tara.jpg'),
            'link'        => '#',
            'excerpt'     => 'Hand-cast using lost-wax iconometry from 8-metal Ashtadhatu alloy with 24K gold-leaf fire gilding.',
        );
    }

    return $specimens;
}

/**
 * AJAX Handler: Submit Commission Inquiry
 */
function shrestha_ajax_submit_inquiry() {
    check_ajax_referer('shrestha_ajax_nonce', 'nonce');

    $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone   = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $alloy   = isset($_POST['alloy']) ? sanitize_text_field($_POST['alloy']) : '';
    $budget  = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
    $details = isset($_POST['details']) ? sanitize_textarea_field($_POST['details']) : '';

    if (empty($name) || empty($email)) {
        wp_send_json_error(array('message' => 'Please provide your full name and valid email address.'));
    }

    // Store inquiry in transients/options or send email
    $inquiry_data = array(
        'time'    => current_time('mysql'),
        'name'    => $name,
        'email'   => $email,
        'phone'   => $phone,
        'alloy'   => $alloy,
        'budget'  => $budget,
        'details' => $details,
    );
    $inquiries = get_option('shrestha_inquiries', array());
    $inquiries[] = $inquiry_data;
    update_option('shrestha_inquiries', $inquiries);

    wp_send_json_success(array(
        'message' => 'Sacred commission inquiry logged successfully. The Master Curator will respond within 24 hours.'
    ));
}
add_action('wp_ajax_shrestha_submit_inquiry', 'shrestha_ajax_submit_inquiry');
add_action('wp_ajax_nopriv_shrestha_submit_inquiry', 'shrestha_ajax_submit_inquiry');

/**
 * AJAX Handler: Submit Patron Review
 */
function shrestha_ajax_submit_review() {
    check_ajax_referer('shrestha_ajax_nonce', 'nonce');

    $name     = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $location = isset($_POST['location']) ? sanitize_text_field($_POST['location']) : 'Kathmandu, Nepal';
    $specimen = isset($_POST['specimen']) ? sanitize_text_field($_POST['specimen']) : 'Sacred Specimen';
    $rating   = isset($_POST['rating']) ? intval($_POST['rating']) : 5;
    $content  = isset($_POST['review']) ? sanitize_textarea_field($_POST['review']) : '';

    if (empty($name) || empty($content)) {
        wp_send_json_error(array('message' => 'Please fill in your name and review details.'));
    }

    $post_id = wp_insert_post(array(
        'post_title'   => $name . ' — ' . $specimen,
        'post_content' => $content,
        'post_type'    => 'testimonial',
        'post_status'  => 'publish',
    ));

    if (!is_wp_error($post_id)) {
        update_post_meta($post_id, '_review_location', $location);
        update_post_meta($post_id, '_review_specimen', $specimen);
        update_post_meta($post_id, '_review_rating', $rating);
        wp_send_json_success(array('message' => 'Your patron testimonial has been consecrated and published.'));
    } else {
        wp_send_json_error(array('message' => 'Unable to record review. Please try again.'));
    }
}
add_action('wp_ajax_shrestha_submit_review', 'shrestha_ajax_submit_review');
add_action('wp_ajax_nopriv_shrestha_submit_review', 'shrestha_ajax_submit_review');

/**
 * Auto-Seed Initial Sacred Metallurgy Data (Runs once if table empty)
 */
function shrestha_auto_seed_content() {
    if (get_option('shrestha_dynamic_seeded_v1')) {
        return;
    }

    // 1. Create Alloy Terms
    $alloys = array(
        'ashtadhatu'      => 'Ashtadhatu (8-Metal)',
        'gold-leaf'       => '24K Gold Leaf',
        'patina-bronze'   => 'Patina Bronze',
        'copper-repousse' => 'Copper Repoussé',
    );
    $term_ids = array();
    foreach ($alloys as $slug => $name) {
        $term = term_exists($slug, 'alloy_type');
        if (!$term) {
            $inserted = wp_insert_term($name, 'alloy_type', array('slug' => $slug));
            if (!is_wp_error($inserted)) {
                $term_ids[$slug] = $inserted['term_id'];
            }
        } else {
            $term_ids[$slug] = is_array($term) ? $term['term_id'] : $term;
        }
    }

    // 2. Seed Sacred Specimens
    $sample_specimens = array(
        array(
            'title'     => 'Green Tara: Mother of Divine Liberation',
            'sku'       => 'SH-001',
            'price'     => 3200,
            'height'    => '18.5 in / 47 cm',
            'weight'    => '14.2 kg',
            'symmetry'  => '99.8%',
            'angula'    => '124 Canonical Angula',
            'image'     => 'green_tara.jpg',
            'alloy'     => array('ashtadhatu', 'gold-leaf'),
            'desc'      => 'Hand-cast using lost-wax iconometry (Cire Perdue) from 8-metal Ashtadhatu alloy. Adorned with 24K gold-leaf fire gilding and cold-chiseled facial symmetry, crafted according to 14th-century Sanskrit treatise canons in Patan, Nepal.',
        ),
        array(
            'title'     => 'Shakyamuni Buddha: Earth-Touching Mudra',
            'sku'       => 'SH-002',
            'price'     => 4500,
            'height'    => '24.0 in / 61 cm',
            'weight'    => '22.8 kg',
            'symmetry'  => '99.9%',
            'angula'    => '140 Canonical Angula',
            'image'     => 'shakyamuni.jpg',
            'alloy'     => array('gold-leaf', 'ashtadhatu'),
            'desc'      => 'Depicting the historical Buddha at the transcendent moment of enlightenment calling the Earth to witness his steadfast realization. Cast in solid Ashtadhatu with 24K mercury fire-gilt finish.',
        ),
        array(
            'title'     => 'Mahakala: Wrathful Guardian of Sacred Dharma',
            'sku'       => 'SH-003',
            'price'     => 5800,
            'height'    => '21.0 in / 53 cm',
            'weight'    => '19.5 kg',
            'symmetry'  => '99.6%',
            'angula'    => '118 Canonical Angula',
            'image'     => 'mahakala.jpg',
            'alloy'     => array('patina-bronze', 'copper-repousse'),
            'desc'      => 'A formidable representation of Dharmapala Mahakala, crowned with skull diadem and standing in warrior posture. Hand-finished with oxidized black-copper patina and vermilion accents.',
        ),
    );

    foreach ($sample_specimens as $sp) {
        $existing = get_posts(array(
            'post_type'   => 'specimen',
            'meta_key'    => '_specimen_sku',
            'meta_value'  => $sp['sku'],
            'post_status' => 'any',
        ));

        if (empty($existing)) {
            $post_id = wp_insert_post(array(
                'post_title'   => $sp['title'],
                'post_content' => $sp['desc'],
                'post_excerpt' => wp_trim_words($sp['desc'], 25),
                'post_type'    => 'specimen',
                'post_status'  => 'publish',
            ));

            if (!is_wp_error($post_id)) {
                update_post_meta($post_id, '_specimen_sku', $sp['sku']);
                update_post_meta($post_id, '_specimen_price', $sp['price']);
                update_post_meta($post_id, '_specimen_height', $sp['height']);
                update_post_meta($post_id, '_specimen_weight', $sp['weight']);
                update_post_meta($post_id, '_specimen_symmetry', $sp['symmetry']);
                update_post_meta($post_id, '_specimen_angula', $sp['angula']);
                update_post_meta($post_id, '_specimen_consecrated', 'yes');
                update_post_meta($post_id, '_specimen_asset_img', $sp['image']);

                if (!empty($sp['alloy'])) {
                    $slugs = array_map(function($s) use ($term_ids) {
                        return isset($term_ids[$s]) ? intval($term_ids[$s]) : null;
                    }, $sp['alloy']);
                    wp_set_object_terms($post_id, array_filter($slugs), 'alloy_type');
                }
            }
        }
    }

    // 3. Seed Master Artisans
    $sample_artisans = array(
        array(
            'name'       => 'Purna Bahadur Shakya',
            'title'      => 'Master Sculptor & Iconometrist',
            'experience' => '42 Years Foundry Experience',
            'lineage'    => '8th Generation Patan Newar Master',
            'bio'        => 'Guardian of the canonical Sanskrit proportional manuscripts. Master Purna has carved over 400 consecrated deities installed in monastic temples across the Himalayas and Southeast Asia.',
        ),
        array(
            'name'       => 'Ratna Jyoti Shrestha',
            'title'      => 'Senior Smelter & Ashtadhatu Alchemist',
            'experience' => '36 Years Foundry Experience',
            'lineage'    => '7th Generation Metallurgy Custodian',
            'bio'        => 'Specializing in high-heat ceramic lost-wax crucible melting. Ratna controls the elemental 8-metal ratios ensuring divine resonance and structural permanence.',
        ),
        array(
            'name'       => 'Devi Prasad Shakya',
            'title'      => 'Chief 24K Fire-Gilding Artisan',
            'experience' => '28 Years Finishing Experience',
            'lineage'    => '6th Generation Patan Chaser',
            'bio'        => 'Master of cold-chisel repoussé chasing and pure 24K gold-leaf mercury fire-gilding, creating the velvet luster characteristic of medieval Newar masterpieces.',
        ),
    );

    foreach ($sample_artisans as $art) {
        $existing_art = get_page_by_title($art['name'], OBJECT, 'artisan');
        if (!$existing_art) {
            $art_id = wp_insert_post(array(
                'post_title'   => $art['name'],
                'post_content' => $art['bio'],
                'post_type'    => 'artisan',
                'post_status'  => 'publish',
            ));
            if (!is_wp_error($art_id)) {
                update_post_meta($art_id, '_artisan_title', $art['title']);
                update_post_meta($art_id, '_artisan_experience', $art['experience']);
                update_post_meta($art_id, '_artisan_lineage', $art['lineage']);
            }
        }
    }

    // 4. Seed Patron Reviews
    $sample_reviews = array(
        array(
            'name'     => 'Dr. Alistair Vance',
            'location' => 'Oxford, United Kingdom',
            'specimen' => 'Green Tara (SH-001)',
            'rating'   => 5,
            'content'  => 'The iconometric proportion and gold-leaf finish on the Green Tara statue exceed museum standards. It radiates serene presence in our collection hall.',
        ),
        array(
            'name'     => 'Tenzin Chokyi',
            'location' => 'Dharamsala, India',
            'specimen' => 'Shakyamuni Buddha (SH-002)',
            'rating'   => 5,
            'content'  => 'Authentic Patan lost-wax casting at its highest level. The facial serenity and cold-chiseled lotus throne detail honor the ancient lineage teachings.',
        ),
        array(
            'name'     => 'Elena Rostova',
            'location' => 'Zurich, Switzerland',
            'specimen' => 'Mahakala (SH-003)',
            'rating'   => 5,
            'content'  => 'A majestic, powerful bronze casting with authentic oxidized patina. Packaging was meticulous and customs documentation was flawless.',
        ),
    );

    foreach ($sample_reviews as $rev) {
        $rev_title = $rev['name'] . ' — ' . $rev['specimen'];
        $existing_rev = get_page_by_title($rev_title, OBJECT, 'testimonial');
        if (!$existing_rev) {
            $rev_id = wp_insert_post(array(
                'post_title'   => $rev_title,
                'post_content' => $rev['content'],
                'post_type'    => 'testimonial',
                'post_status'  => 'publish',
            ));
            if (!is_wp_error($rev_id)) {
                update_post_meta($rev_id, '_review_location', $rev['location']);
                update_post_meta($rev_id, '_review_specimen', $rev['specimen']);
                update_post_meta($rev_id, '_review_rating', $rev['rating']);
            }
        }
    }

    update_option('shrestha_dynamic_seeded_v1', 1);
}
add_action('init', 'shrestha_auto_seed_content', 20);
