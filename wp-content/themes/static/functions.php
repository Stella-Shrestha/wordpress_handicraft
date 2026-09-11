<?php
/**
 * Shrestha Handicraft Theme Functions
 *
 * @package ShresthaHandicraft
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function shresthahandicraft_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Switch default core markup for search form, comment form, etc. to output valid HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Support custom logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Responsive embedded content
    add_theme_support('responsive-embeds');

    // Register navigation menus
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
add_action('after_setup_theme', 'shresthahandicraft_setup');

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
 * Enqueue scripts and styles.
 */
function shresthahandicraft_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'shresthahandicraft-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main theme stylesheet
    wp_enqueue_style(
        'shresthahandicraft-style',
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
        'shresthahandicraft-lucide',
        get_template_directory_uri() . '/js/lucide.min.js',
        array(),
        '1.0.0',
        false
    );

    // Main Theme JavaScript Engine
    $main_ver = file_exists(get_template_directory() . '/js/main.js') ? filemtime(get_template_directory() . '/js/main.js') : '1.1.0';
    wp_enqueue_script(
        'shresthahandicraft-main',
        get_template_directory_uri() . '/js/main.js',
        array('shresthahandicraft-lucide'),
        $main_ver,
        true
    );

    // Localize script to pass dynamic asset URIs and site paths to JavaScript
    wp_localize_script('shresthahandicraft-main', 'shresthaData', array(
        'themeUri' => get_template_directory_uri(),
        'siteUrl'  => home_url('/'),
        'ajaxUrl'  => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'shresthahandicraft_scripts');

/**
 * Helper function to retrieve asset URI
 */
function shrestha_asset($relative_path) {
    return esc_url(get_template_directory_uri() . '/assets/' . ltrim($relative_path, '/'));
}

/**
 * Add custom body classes for styling
 */
function shresthahandicraft_body_classes($classes) {
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
add_filter('body_class', 'shresthahandicraft_body_classes');
