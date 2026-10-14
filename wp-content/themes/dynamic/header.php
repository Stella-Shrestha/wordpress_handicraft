<?php
/**
 * Shrestha Handicraft Dynamic Header Template
 *
 * @package ShresthaHandicraftDynamic
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
  <script>
    // Immediate dark mode class enforcement to prevent flash
    (function() {
      try {
        var theme = localStorage.getItem('sh_theme') || 'dark';
        if (theme === 'dark') {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch (e) {}
    })();
  </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- STICKY HEADER NAVIGATION -->
  <header
    class="sticky top-0 z-50 bg-white/90 dark:bg-patina-950/90 backdrop-blur-md border-b border-slate-200 dark:border-gold/20 transition-colors duration-300">
    <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between gap-4">

      <!-- Brand Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 sm:gap-3.5 group">
        <?php
        $site_logo = function_exists('shrestha_logo_url') ? shrestha_logo_url() : content_url('/uploads/logo.jpg');
        ?>
        <div
          class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 rounded-xl overflow-hidden bg-white border border-gold/40 flex items-center justify-center text-gold shadow-sm group-hover:border-gold transition-all shrink-0">
          <?php if (!empty($site_logo)): ?>
            <img src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
          <?php else: ?>
            <i data-lucide="flame" class="w-6 h-6"></i>
          <?php endif; ?>
        </div>
        <div class="flex flex-col">
          <span
            class="font-display font-bold text-base sm:text-lg tracking-wider uppercase text-slate-900 dark:text-parchment leading-tight">Shrestha
            Handicraft</span>
          <span class="font-mono text-[10px] sm:text-xs text-gold tracking-widest uppercase mt-0.5">Sacred Metallurgy • Patan</span>
        </div>
      </a>

      <!-- Desktop Navigation Links -->
      <nav class="hidden lg:flex items-center gap-1 p-1.5">
        <?php
        $primary_location = '';
        if (has_nav_menu('primary')) {
            $primary_location = 'primary';
        } elseif (has_nav_menu('trekking-primary')) {
            $primary_location = 'trekking-primary';
        }

        if ($primary_location) {
            wp_nav_menu(array(
                'theme_location' => $primary_location,
                'container'      => false,
                'menu_class'     => 'flex items-center gap-1',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'walker'         => new Shrestha_Primary_Nav_Walker(),
                'fallback_cb'    => false,
            ));
        } else {
            $is_home    = is_front_page() || is_home();
            $is_about   = is_page(array('about', 'about-us', 'aboutus', 'our-story')) || is_page_template('page-templates/template-about.php');
            $is_catalog = is_page(array('catalog', 'shop', 'collection')) || is_page_template('page-templates/template-catalog.php') || is_post_type_archive('specimen');
            $is_contact = is_page(array('contact', 'contact-us', 'contactus', 'inquire')) || is_page_template('page-templates/template-contact.php');

            $about_page   = get_page_by_path('aboutus') ?: get_page_by_path('about');
            $about_url    = $about_page ? get_permalink($about_page) : home_url('/about/');

            $catalog_page = get_page_by_path('catalog') ?: get_page_by_path('shop');
            $catalog_url  = $catalog_page ? get_permalink($catalog_page) : home_url('/catalog/');

            $contact_page = get_page_by_path('contactus') ?: get_page_by_path('contact');
            $contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"
              class="px-3.5 py-1.5 font-mono text-xs <?php echo $is_home ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-parchment'; ?> rounded-md flex items-center gap-1.5 transition-colors">
              HOME
            </a>
            <a href="<?php echo esc_url($about_url); ?>"
              class="px-3.5 py-1.5 font-mono text-xs <?php echo $is_about ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-parchment'; ?> rounded-md flex items-center gap-1.5 transition-colors">
              ABOUT US
            </a>
            <a href="<?php echo esc_url($catalog_url); ?>"
              class="px-3.5 py-1.5 font-mono text-xs <?php echo $is_catalog ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-parchment'; ?> rounded-md flex items-center gap-1.5 transition-colors">
              SHOP
            </a>
            <a href="<?php echo esc_url($contact_url); ?>"
              class="px-3.5 py-1.5 font-mono text-xs <?php echo $is_contact ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-parchment'; ?> rounded-md flex items-center gap-1.5 transition-colors">
              CONTACT US
            </a>
            <?php
        }
        ?>
      </nav>

      <!-- Desktop Actions -->
      <div class="hidden lg:flex items-center gap-3">
        <!-- Theme Toggle Button -->
        <button id="themeToggleIcon" onclick="toggleTheme()"
          class="w-10 h-10 rounded-lg bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-gold hover:border-gold transition-colors"
          title="Toggle Light/Dark Mode" aria-label="Toggle Light/Dark Mode">
          <i data-lucide="sun" class="w-5 h-5"></i>
        </button>

        <!-- Cart Button -->
        <button onclick="toggleCartDrawer()"
          class="flex items-center gap-2.5 px-4 py-2 bg-gradient-to-r from-gold/15 to-copper/15 hover:from-gold/25 hover:to-copper/25 border border-gold rounded-lg text-gold font-mono text-xs font-bold tracking-wider transition-all shadow-sm hover:shadow-gold/20">
          <i data-lucide="shopping-bag" class="w-4 h-4"></i>
          <span>CART</span>
          <span id="cartCount"
            class="cartCount w-5 h-5 rounded-full bg-copper text-white text-[11px] font-bold flex items-center justify-center">0</span>
        </button>
      </div>

      <!-- Mobile & Tablet Actions -->
      <div class="flex lg:hidden items-center gap-3">
        <button id="mobileThemeToggleIcon" onclick="toggleTheme()"
          class="themeToggleBtn w-10 h-10 rounded-lg bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-gold hover:border-gold transition-colors"
          title="Toggle Light/Dark Mode" aria-label="Toggle Light/Dark Mode">
          <i data-lucide="sun" class="w-5 h-5"></i>
        </button>

        <button id="hamburgerBtn" onclick="toggleMobileMenu()"
          class="w-10 h-10 rounded-lg bg-white dark:bg-patina-900 border border-slate-200 dark:border-gold/30 flex items-center justify-center text-gold hover:border-gold transition-colors"
          aria-label="Toggle navigation menu">
          <i id="hamburgerIcon" data-lucide="menu" class="w-5 h-5"></i>
        </button>
      </div>
    </div>

    <!-- Mobile & Tablet Dropdown Navigation Drawer -->
    <div id="mobileMenu"
      class="hidden lg:hidden border-t border-slate-200 dark:border-slate-800 bg-white/95 dark:bg-patina-950/95 backdrop-blur-md transition-all duration-300">
      <div class="max-w-[1584px] mx-auto px-4 sm:px-6 py-4 flex flex-col gap-4">
        <!-- Navigation Links -->
        <nav class="flex flex-col gap-1.5">
          <?php
          if ($primary_location) {
              wp_nav_menu(array(
                  'theme_location' => $primary_location,
                  'container'      => false,
                  'menu_class'     => 'flex flex-col gap-1.5',
                  'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                  'walker'         => new Shrestha_Mobile_Nav_Walker(),
                  'fallback_cb'    => false,
              ));
          } else {
              ?>
              <a href="<?php echo esc_url(home_url('/')); ?>"
                class="px-4 py-2.5 font-mono text-xs <?php echo (is_front_page() || is_home()) ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-patina-900'; ?> rounded-lg flex items-center justify-between transition-colors">
                <span>HOME</span>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gold/60"></i>
              </a>
              <a href="<?php echo esc_url($about_url); ?>"
                class="px-4 py-2.5 font-mono text-xs <?php echo (isset($is_about) && $is_about) ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-patina-900'; ?> rounded-lg flex items-center justify-between transition-colors">
                <span>ABOUT US</span>
                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
              </a>
              <a href="<?php echo esc_url($catalog_url); ?>"
                class="px-4 py-2.5 font-mono text-xs <?php echo (isset($is_catalog) && $is_catalog) ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-patina-900'; ?> rounded-lg flex items-center justify-between transition-colors">
                <span>SHOP</span>
                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
              </a>
              <a href="<?php echo esc_url($contact_url); ?>"
                class="px-4 py-2.5 font-mono text-xs <?php echo (isset($is_contact) && $is_contact) ? 'font-semibold text-gold bg-gold/10 border border-gold/30' : 'font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-patina-900'; ?> rounded-lg flex items-center justify-between transition-colors">
                <span>CONTACT US</span>
                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
              </a>
              <?php
          }
          ?>
        </nav>

        <!-- Section Divider -->
        <div class="h-px bg-slate-200 dark:bg-slate-800 my-0.5"></div>

        <!-- Cart Section inside Drawer -->
        <div class="flex flex-col gap-2">
          <span class="font-mono text-[10px] text-gold tracking-widest uppercase font-semibold px-1">SHOPPING CART</span>
          <button onclick="toggleCartDrawer(); toggleMobileMenu();"
            class="w-full flex items-center justify-between px-4 py-3 bg-gradient-to-r from-gold/15 to-copper/15 hover:from-gold/25 hover:to-copper/25 border border-gold rounded-xl text-gold font-mono text-xs font-bold tracking-wider transition-all shadow-sm hover:shadow-gold/20">
            <div class="flex items-center gap-2.5">
              <i data-lucide="shopping-bag" class="w-4 h-4"></i>
              <span>VIEW CART</span>
            </div>
            <span id="mobileCartCount"
              class="cartCount w-6 h-6 rounded-full bg-copper text-white text-xs font-bold flex items-center justify-center shadow-sm">0</span>
          </button>
        </div>
      </div>
    </div>
  </header>
