<?php
/**
 * Shrestha Handicraft Footer Template
 *
 * @package ShresthaHandicraft
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

  <!-- FOOTER SECTION -->
  <footer
    class="bg-[#0B0C0E] text-slate-300 pt-16 pb-10 transition-colors border-t border-slate-200 dark:border-gold/30 duration-300 relative overflow-hidden">

    <!-- Mandala Linework Vector Behind Statue -->
    <div
      class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/4 sm:translate-x-1/6 pointer-events-none opacity-15 sm:opacity-20 text-gold block z-0 select-none">
      <svg class="w-[300px] h-[300px] sm:w-[450px] sm:h-[450px] lg:w-[600px] lg:h-[600px] animate-spin-slow" viewBox="0 0 100 100" fill="none"
        stroke="currentColor" stroke-width="0.35">
        <circle cx="50" cy="50" r="48" stroke-dasharray="1 2" />
        <circle cx="50" cy="50" r="42" />
        <circle cx="50" cy="50" r="36" stroke-dasharray="2 1" />
        <circle cx="50" cy="50" r="28" />
        <path d="M50 2 L50 98 M2 50 L98 50 M16 16 L84 84 M16 84 L84 16" />
        <circle cx="50" cy="50" r="18" />
        <circle cx="50" cy="50" r="10" />
      </svg>
    </div>

    <!-- Far Right Seated Deity Statue Visual (Transparent Cutout) -->
    <div
      class="absolute right-0 bottom-0 pointer-events-none z-10 block w-[220px] sm:w-[300px] md:w-[380px] lg:w-[440px] xl:w-[500px] 2xl:w-[560px] h-[300px] sm:h-[400px] md:h-[500px] lg:h-[580px] xl:h-[640px] select-none opacity-40 sm:opacity-70 md:opacity-95 lg:opacity-100 transition-all duration-700">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/footer_buddha_statue.png'); ?>" alt="Sacred Shakyamuni Buddha Statue"
        class="w-full h-full object-contain object-bottom drop-shadow-[0_15px_35px_rgba(212,155,75,0.25)]" />
    </div>

    <div class="max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 relative z-20">

      <!-- Main Columns Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 pb-8 lg:pr-[320px] xl:pr-[420px]">

        <!-- Column 1: Brand Info & Social Icons -->
        <div class="lg:col-span-4 flex flex-col gap-5">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 rounded-full bg-gold/10 border border-gold/40 flex items-center justify-center text-gold">
              <i data-lucide="flame" class="w-5 h-5"></i>
            </div>
            <div class="flex flex-col">
              <span
                class="font-display font-bold text-base tracking-wider uppercase text-white dark:text-parchment">SHRESTHA
                HANDICRAFT</span>
              <span class="font-mono text-[9px] text-gold tracking-widest uppercase">SACRED METALLURGY • PATAN</span>
            </div>
          </div>

          <p class="text-slate-400 text-xs leading-relaxed font-sans max-w-sm">
            Preserving ancient lost-wax bronze casting, Ashtadhatu alloy smelting, and 24K gold-leaf fire gilding in
            Patan since 1982.
          </p>

          <div class="relative flex items-center py-1 max-w-sm">
            <div class="flex-grow border-t border-slate-800"></div>
            <span class="flex-shrink mx-3 text-gold/60">
              <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
            </span>
            <div class="flex-grow border-t border-slate-800"></div>
          </div>

          <div class="flex flex-col gap-2.5">
            <span class="font-mono text-[10px] text-gold tracking-[0.2em] uppercase font-semibold">FOLLOW OUR
              JOURNEY</span>
            <div class="flex items-center gap-2.5">
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Facebook">f</a>
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Instagram">ig</a>
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="YouTube">yt</a>
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Pinterest">p</a>
              <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Contact">✉</a>
            </div>
          </div>
        </div>

      <!-- Main Columns Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 pb-8 lg:pr-[320px] xl:pr-[420px]">

        <!-- Column 1: Brand Info & Social Icons -->
        <div class="sm:col-span-2 lg:col-span-4 flex flex-col gap-5">
          <div class="flex items-center gap-3">
            <div
              class="w-10 h-10 rounded-full bg-gold/10 border border-gold/40 flex items-center justify-center text-gold">
              <i data-lucide="flame" class="w-5 h-5"></i>
            </div>
            <div class="flex flex-col">
              <span
                class="font-display font-bold text-base tracking-wider uppercase text-white dark:text-parchment">SHRESTHA
                HANDICRAFT</span>
              <span class="font-mono text-[9px] text-gold tracking-widest uppercase">SACRED METALLURGY • PATAN</span>
            </div>
          </div>

          <p class="text-slate-400 text-xs leading-relaxed font-sans max-w-sm">
            Preserving ancient lost-wax bronze casting, Ashtadhatu alloy smelting, and 24K gold-leaf fire gilding in
            Patan since 1982.
          </p>

          <div class="relative flex items-center py-1 max-w-sm">
            <div class="flex-grow border-t border-slate-800"></div>
            <span class="flex-shrink mx-3 text-gold/60">
              <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
            </span>
            <div class="flex-grow border-t border-slate-800"></div>
          </div>

          <div class="flex flex-col gap-2.5">
            <span class="font-mono text-[10px] text-gold tracking-[0.2em] uppercase font-semibold">FOLLOW OUR
              JOURNEY</span>
            <div class="flex items-center gap-2.5">
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Facebook">f</a>
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Instagram">ig</a>
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="YouTube">yt</a>
              <a href="#"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Pinterest">p</a>
              <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="w-9 h-9 rounded-full border border-gold/40 text-gold hover:bg-gold hover:text-patina-950 flex items-center justify-center transition-colors text-xs font-bold" aria-label="Contact">✉</a>
            </div>
          </div>
        </div>

        <!-- Column 2: Footer 1 / Navigation -->
        <div class="sm:col-span-1 lg:col-span-2 flex flex-col gap-3">
          <div class="flex flex-col gap-1 mb-1">
            <h5 class="font-mono text-xs text-gold tracking-[0.25em] uppercase font-bold">
              <?php echo esc_html(shrestha_get_menu_name('footer-1', esc_html__('NAVIGATION', 'shresthahandicraft'))); ?>
            </h5>
            <div class="w-6 h-0.5 bg-gold/50"></div>
          </div>
          <?php
          ob_start();
          ?>
          <ul class="flex flex-col gap-2.5 text-xs text-slate-400 font-sans">
            <li><a href="<?php echo esc_url(home_url('/')); ?>"
                class="hover:text-gold transition-colors flex items-center justify-between group"><span>Home</span>
                <span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>"
                class="hover:text-gold transition-colors flex items-center justify-between group"><span>About Us</span>
                <span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/catalog/')); ?>"
                class="hover:text-gold transition-colors flex items-center justify-between group"><span>Shop</span>
                <span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="hover:text-gold transition-colors flex items-center justify-between group"><span>Contact Us</span>
                <span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
          </ul>
          <?php
          $fallback_nav = ob_get_clean();
          shrestha_render_footer_menu('footer-1', $fallback_nav);
          ?>
        </div>

        <!-- Column 3: Footer 2 / Catalog -->
        <div class="sm:col-span-1 lg:col-span-2 flex flex-col gap-3">
          <div class="flex flex-col gap-1 mb-1">
            <h5 class="font-mono text-xs text-gold tracking-[0.25em] uppercase font-bold">
              <?php echo esc_html(shrestha_get_menu_name('footer-2', esc_html__('CATALOG', 'shresthahandicraft'))); ?>
            </h5>
            <div class="w-6 h-0.5 bg-gold/50"></div>
          </div>
          <?php
          ob_start();
          ?>
          <ul class="flex flex-col gap-2.5 text-xs text-slate-400 font-sans">
            <li><a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="hover:text-gold transition-colors flex items-center justify-between group"><span>Buddhist Deities</span><span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="hover:text-gold transition-colors flex items-center justify-between group"><span>Hindu Deities</span><span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="hover:text-gold transition-colors flex items-center justify-between group"><span>Ritual Objects</span><span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/catalog/')); ?>" class="hover:text-gold transition-colors flex items-center justify-between group"><span>Limited Editions</span><span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hover:text-gold transition-colors flex items-center justify-between group"><span>Custom Commissions</span><span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hover:text-gold transition-colors flex items-center justify-between group"><span>Restoration Services</span><span class="text-gold/40 group-hover:text-gold transition-colors text-[10px]">›</span></a></li>
          </ul>
          <?php
          $fallback_cat = ob_get_clean();
          shrestha_render_footer_menu('footer-2', $fallback_cat);
          ?>
        </div>

        <?php
        $has_footer_3 = has_nav_menu('footer-3');
        $has_footer_4 = has_nav_menu('footer-4');
        ?>

        <?php if ($has_footer_3): ?>
        <!-- Column: Footer 3 -->
        <div class="sm:col-span-1 lg:col-span-2 flex flex-col gap-3">
          <div class="flex flex-col gap-1 mb-1">
            <h5 class="font-mono text-xs text-gold tracking-[0.25em] uppercase font-bold">
              <?php echo esc_html(shrestha_get_menu_name('footer-3', esc_html__('GET IN TOUCH', 'shresthahandicraft'))); ?>
            </h5>
            <div class="w-6 h-0.5 bg-gold/50"></div>
          </div>
          <?php shrestha_render_footer_menu('footer-3'); ?>
        </div>
        <?php endif; ?>

        <?php if ($has_footer_4): ?>
        <!-- Column: Footer 4 -->
        <div class="sm:col-span-1 lg:col-span-2 flex flex-col gap-3">
          <div class="flex flex-col gap-1 mb-1">
            <h5 class="font-mono text-xs text-gold tracking-[0.25em] uppercase font-bold">
              <?php echo esc_html(shrestha_get_menu_name('footer-4', esc_html__('RESOURCES', 'shresthahandicraft'))); ?>
            </h5>
            <div class="w-6 h-0.5 bg-gold/50"></div>
          </div>
          <?php shrestha_render_footer_menu('footer-4'); ?>
        </div>
        <?php endif; ?>

        <!-- Atelier Ledger Newsletter Column -->
        <div class="<?php echo ($has_footer_3 && $has_footer_4) ? 'sm:col-span-2 lg:col-span-12 mt-2' : ($has_footer_3 || $has_footer_4 ? 'sm:col-span-1 lg:col-span-2' : 'sm:col-span-2 lg:col-span-4'); ?> flex flex-col gap-3">
          <div class="flex flex-col gap-1 mb-1">
            <h5 class="font-mono text-xs text-gold tracking-[0.25em] uppercase font-bold">ATELIER LEDGER</h5>
            <div class="w-6 h-0.5 bg-gold/50"></div>
          </div>
          <p class="text-slate-400 text-xs font-sans">Subscribe for rare specimen releases and furnace crucible logs.
          </p>

          <form onsubmit="event.preventDefault(); alert('Subscribed to Shrestha Atelier Ledger.');" class="flex items-center mt-2 max-w-md">
            <input type="email" placeholder="Email address..." required
              class="px-4 py-2.5 bg-slate-900/90 border border-slate-700/80 rounded-l-lg text-white placeholder-slate-500 flex-1 text-xs font-mono focus:outline-none focus:border-gold" />
            <button type="submit"
              class="px-5 py-2.5 bg-gradient-to-r from-amber-600 via-gold to-copper hover:from-amber-600 hover:to-copper text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-r-lg shadow">
              JOIN
            </button>
          </form>
        </div>

        <!-- Spanning Request a Commission Banner Box across columns -->
        <div class="sm:col-span-2 lg:col-span-12 mt-4">
          <div
            class="border border-gold/30 rounded-xl p-5 bg-[#0e131b]/90 backdrop-blur-sm flex flex-col sm:flex-row items-center justify-between gap-4 shadow-xl">
            <div class="flex items-start gap-4">
              <div
                class="w-10 h-10 rounded-full bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0 mt-0.5">
                <i data-lucide="sparkles" class="w-5 h-5"></i>
              </div>
              <div class="flex flex-col gap-1">
                <span class="font-mono text-xs text-gold font-bold tracking-wider uppercase">REQUEST A
                  COMMISSION</span>
                <p class="text-slate-400 text-[11px] font-sans leading-relaxed max-w-xl">
                  Collaborate with our master artisans to create a bespoke sacred piece for your temple, collection or
                  personal practice.
                </p>
              </div>
            </div>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
              class="px-5 py-2.5 border border-gold/60 text-gold hover:bg-gold hover:text-patina-950 font-mono text-[11px] font-bold tracking-wider uppercase rounded-lg transition-all flex items-center gap-2 shrink-0 whitespace-nowrap">
              <span>INQUIRE NOW</span>
              <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
          </div>
        </div>

      </div>

      <!-- Bottom Bar Divider & Copyright -->
      <div
        class="border-t border-slate-800/80 pt-6 mt-6 flex flex-col md:flex-row justify-between items-center text-slate-400 font-mono text-[11px] gap-3 relative">
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#0B0C0E] px-3 text-gold/60">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
        </div>
        <span>© <?php echo date('Y'); ?> Shrestha Handicraft Atelier. All Rights Reserved.</span>
        
        <?php if (has_nav_menu('footer') || has_nav_menu('footer-menu')): ?>
          <nav class="flex flex-wrap items-center justify-center gap-4 text-xs font-mono">
            <?php
            $footer_menu_loc = has_nav_menu('footer') ? 'footer' : 'footer-menu';
            wp_nav_menu(array(
                'theme_location' => $footer_menu_loc,
                'container'      => false,
                'menu_class'     => 'flex flex-wrap items-center justify-center gap-4 text-slate-400',
                'fallback_cb'    => false,
                'depth'          => 1,
            ));
            ?>
          </nav>
        <?php endif; ?>

        <span class="flex items-center gap-1.5 text-gold/90">
          <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
          <span>Made with devotion in Patan, Nepal</span>
        </span>
        <span class="hidden sm:inline">Sanskrit Iconometry Standard / Shilpa Shastra Compliant</span>
      </div>

    </div>
  </footer>

  <?php if (has_nav_menu('mobile-bottom')): ?>
  <!-- Mobile Bottom Sticky Menu Bar -->
  <div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 dark:bg-patina-950/95 backdrop-blur-md border-t border-slate-200 dark:border-gold/20 shadow-2xl py-2.5 px-4">
    <div class="max-w-md mx-auto">
      <?php
      wp_nav_menu(array(
          'theme_location' => 'mobile-bottom',
          'container'      => 'nav',
          'container_class'=> 'w-full',
          'menu_class'     => 'flex items-center justify-around font-mono text-xs text-slate-600 dark:text-slate-300',
          'fallback_cb'    => false,
          'depth'          => 1,
      ));
      ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- SLIDE-OVER ACQUISITION CART DRAWER -->
  <div id="cartOverlay"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[100] hidden items-center justify-end transition-opacity"
    onclick="closeCartOnOverlay(event)">
    <div
      class="w-full max-w-md h-full bg-white dark:bg-patina-950 border-l border-slate-200 dark:border-gold/30 flex flex-col shadow-2xl">
      <div class="p-5 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
        <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Selected Acquisitions</h3>
        <button onclick="toggleCartDrawer()" class="text-slate-500 hover:text-slate-900 dark:hover:text-parchment" aria-label="Close acquisitions drawer">
          <i data-lucide="x" class="w-5 h-5"></i>
        </button>
      </div>

      <!-- SELECT ALL TOOLBAR -->
      <div id="cartToolbar" class="px-5 py-3 border-b border-slate-200 dark:border-slate-800 bg-slate-50/80 dark:bg-patina-900/60 flex items-center justify-between">
        <label class="flex items-center gap-2.5 cursor-pointer select-none">
          <input type="checkbox" id="cartSelectAll" onchange="toggleSelectAllCart(this.checked)"
            class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 text-amber-600 dark:text-gold accent-amber-600 dark:accent-gold cursor-pointer" checked />
          <span class="font-mono font-bold text-xs uppercase tracking-wider text-slate-700 dark:text-parchment">Select All</span>
          <span id="cartSelectedCount" class="font-mono text-[11px] text-slate-400 dark:text-slate-500">(0 selected)</span>
        </label>
        <button type="button" onclick="removeSelectedCartItems()" id="removeSelectedBtn"
          class="font-mono text-[11px] text-slate-400 hover:text-red-500 dark:hover:text-red-400 transition-colors cursor-pointer hidden">
          Remove Selected
        </button>
      </div>

      <div id="cartBody" class="p-5 flex-1 overflow-y-auto flex flex-col gap-4">
        <!-- JS items rendered here -->
      </div>

      <div
        class="p-5 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-patina-900 flex flex-col gap-3">
        <div class="flex justify-between font-mono text-sm text-slate-500 dark:text-slate-400">
          <span>Subtotal (<span id="cartSelectedSubtotalCount">0</span> selected)</span>
          <span id="cartSubtotal">NRP 0</span>
        </div>
        <div class="flex justify-between font-mono text-sm text-slate-500 dark:text-slate-400">
          <span>Escrow Insurance</span>
          <span class="text-emerald-500 font-semibold">INCLUDED</span>
        </div>
        <div
          class="flex justify-between font-mono text-base font-bold text-slate-900 dark:text-parchment pt-2 border-t border-dashed border-slate-300 dark:border-slate-700">
          <span>Total Escrow</span>
          <span id="cartTotal" class="text-gold">NRP 0</span>
        </div>

        <button onclick="triggerCheckoutModal()" id="cartCheckoutBtn"
          class="w-full py-3 bg-gradient-to-r from-gold to-copper text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all mt-2">
          Initiate Escrow Acquisition
        </button>
      </div>
    </div>
  </div>

  <!-- SPECIMEN INSPECTION MODAL -->
  <div id="specimenModal" onclick="closeSpecimenOnOverlay(event)"
    class="fixed inset-0 bg-black/80 backdrop-blur-md z-[200] hidden items-center justify-center p-4">
    <div
      class="bg-white dark:bg-patina-900 border border-gold/40 rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto p-6 relative shadow-2xl grid grid-cols-1 md:grid-cols-2 gap-6">
      <button onclick="closeSpecimenModal()"
        class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 dark:hover:text-parchment" aria-label="Close specimen inspection">
        <i data-lucide="x" class="w-6 h-6"></i>
      </button>

      <div class="bg-black rounded-xl overflow-hidden flex items-center justify-center h-72 md:h-full">
        <img id="modalImg" src="" alt="Specimen Inspection" class="max-h-full max-w-full object-contain" />
      </div>

      <div class="flex flex-col gap-4">
        <div>
          <span id="modalSpecTag" class="font-mono text-xs text-gold">SPECIMEN #SH-000</span>
          <h2 id="modalTitle" class="font-display font-bold text-2xl text-slate-900 dark:text-parchment mt-0.5">Title
          </h2>
        </div>

        <p id="modalDesc" class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">Description...</p>

        <div
          class="bg-slate-50 dark:bg-patina-950 p-3.5 rounded-lg border border-slate-200 dark:border-slate-800 font-mono text-xs">
          <div class="flex justify-between py-1 border-b border-slate-200 dark:border-slate-800">
            <span class="text-slate-500">Alloy Mix:</span>
            <span id="modalAlloy" class="font-semibold text-slate-900 dark:text-parchment">-</span>
          </div>
          <div class="flex justify-between py-1 border-b border-slate-200 dark:border-slate-800">
            <span class="text-slate-500">Canonical Height:</span>
            <span id="modalHeight" class="font-semibold text-slate-900 dark:text-parchment">-</span>
          </div>
          <div class="flex justify-between py-1 border-b border-slate-200 dark:border-slate-800">
            <span class="text-slate-500">Raw Weight:</span>
            <span id="modalWeight" class="font-semibold text-slate-900 dark:text-parchment">-</span>
          </div>
          <div class="flex justify-between py-1">
            <span class="text-slate-500">Consecration:</span>
            <span class="font-semibold text-emerald-500">Patan Monastic Seal</span>
          </div>
        </div>

        <div class="flex items-center justify-between mt-auto pt-3 border-t border-slate-100 dark:border-slate-800 gap-3">
          <span id="modalPrice" class="font-mono font-bold text-xl text-gold">NRP 0</span>
          <div class="flex items-center gap-2">
            <button id="modalBookBtn"
              class="px-4 py-2.5 bg-white dark:bg-patina-800 hover:bg-gold/10 text-slate-800 dark:text-parchment hover:text-gold border border-slate-300 dark:border-gold/30 hover:border-gold font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-sm transition-all flex items-center gap-1.5">
              <i data-lucide="message-square" class="w-3.5 h-3.5 text-copper"></i>
              <span>Inquiry</span>
            </button>
            <button id="modalAcquireBtn"
              class="px-4 py-2.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow hover:shadow-gold/20 transition-all flex items-center gap-1.5">
              <i data-lucide="shopping-bag" class="w-3.5 h-3.5"></i>
              <span>Add to Cart</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ATELIER BOOKING & COMMISSION CONSULTATION MODAL -->
  <div id="bookingModal" onclick="closeBookingOnOverlay(event)"
    class="fixed inset-0 bg-black/80 backdrop-blur-md z-[200] hidden items-center justify-center p-4">
    <div
      class="bg-white dark:bg-patina-900 border border-gold/40 rounded-2xl max-w-lg w-full p-6 sm:p-8 relative shadow-2xl flex flex-col gap-5 max-h-[92vh] overflow-y-auto">
      <button onclick="closeBookingModal()"
        class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 dark:hover:text-parchment transition-colors" aria-label="Close booking modal">
        <i data-lucide="x" class="w-5 h-5"></i>
      </button>

      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-gold/10 border border-gold/40 flex items-center justify-center text-gold shrink-0">
          <i data-lucide="message-square" class="w-5 h-5"></i>
        </div>
        <div class="flex flex-col">
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Sacred Specimen Inquiry</h3>
          <span class="font-mono text-[10px] text-gold tracking-wider uppercase">Direct Patan Foundry Coordination</span>
        </div>
      </div>

      <div class="p-3 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-gold/20 rounded-xl flex items-center justify-between text-xs font-mono">
        <div>
          <span class="text-slate-400 text-[10px] block uppercase">Selected Specimen</span>
          <span id="bookingModalDeityName" class="font-bold text-slate-900 dark:text-parchment">Green Tara Specimen</span>
        </div>
        <span id="bookingModalSku" class="px-2.5 py-1 bg-gold/10 text-gold border border-gold/30 rounded font-bold">SH-001</span>
      </div>

      <form id="bookingForm" onsubmit="handleBookingSubmit(event)" class="flex flex-col gap-4">
        <input type="hidden" id="bookingSkuInput" name="sku" value="SH-001" />
        <input type="hidden" id="bookingDeityInput" name="deity" value="Green Tara Specimen" />

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Your Full Name *</label>
            <input type="text" required placeholder="e.g. Tendhar Rinpoche / Alex Smith"
              class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold" />
          </div>
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Email Address *</label>
            <input type="email" required placeholder="curator@institution.org"
              class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">WhatsApp / Phone *</label>
            <input type="tel" required placeholder="+1 (555) 000-0000"
              class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-mono text-slate-900 dark:text-parchment focus:outline-none focus:border-gold" />
          </div>
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Booking Purpose</label>
            <select
              class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold">
              <option value="viewing">Private Atelier Viewing (Patan)</option>
              <option value="commission">Custom Bespoke Casting Commission</option>
              <option value="consecration">Monastic Consecration Blessing</option>
              <option value="escrow">Immediate Escrow Reservation</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Preferred Date / Commission Notes</label>
          <textarea rows="3"
            placeholder="Specify your preferred consultation date, temple dimension requirements, or special gilding requests..."
            class="w-full px-3.5 py-2.5 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold"></textarea>
        </div>

        <button type="submit"
          class="w-full py-3.5 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg shadow-gold/20 hover:shadow-gold/40 transition-all flex items-center justify-center gap-2 mt-1">
          <i data-lucide="send" class="w-4 h-4"></i>
          <span>Submit Inquiry Request</span>
        </button>
      </form>
    </div>
  </div>

  <!-- PATRON REVIEW SUBMISSION MODAL -->
  <div id="reviewModal" onclick="closeReviewOnOverlay(event)"
    class="fixed inset-0 bg-black/80 backdrop-blur-md z-[200] hidden items-center justify-center p-4">
    <div
      class="bg-white dark:bg-patina-900 border border-gold/40 rounded-2xl max-w-lg w-full p-6 relative shadow-2xl flex flex-col gap-5">
      <button onclick="closeReviewModal()"
        class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 dark:hover:text-parchment transition-colors" aria-label="Close review modal">
        <i data-lucide="x" class="w-5 h-5"></i>
      </button>

      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-gold/10 border border-gold/40 flex items-center justify-center text-gold">
          <i data-lucide="message-square-plus" class="w-5 h-5"></i>
        </div>
        <div class="flex flex-col">
          <h3 class="font-display font-bold text-lg text-slate-900 dark:text-parchment">Submit Patron Endorsement</h3>
          <span class="font-mono text-[10px] text-gold tracking-wider uppercase">Archival into Patan Atelier
            Ledger</span>
        </div>
      </div>

      <form id="reviewForm" onsubmit="handleReviewSubmit(event)" class="flex flex-col gap-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Your Full Name</label>
            <input type="text" required placeholder="e.g. Lama Dorje"
              class="w-full px-3.5 py-2 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold" />
          </div>
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Institution /
              Title</label>
            <input type="text" placeholder="e.g. Monastery Curator"
              class="w-full px-3.5 py-2 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Acquired Specimen /
              Deity</label>
            <input type="text" required placeholder="e.g. Green Tara 24K Gold"
              class="w-full px-3.5 py-2 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold" />
          </div>
          <div>
            <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Rating</label>
            <select
              class="w-full px-3.5 py-2 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-mono text-slate-900 dark:text-parchment focus:outline-none focus:border-gold">
              <option value="5">★★★★★ 5.0 (Flawless Sacred Art)</option>
              <option value="4">★★★★☆ 4.0 (Excellent Craftsmanship)</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-mono text-[11px] text-slate-500 dark:text-slate-400 mb-1">Testimonial &
            Feedback</label>
          <textarea required rows="3"
            placeholder="Share your experience regarding the iconometric precision, lost-wax alloy weight, or gilding quality..."
            class="w-full px-3.5 py-2 bg-slate-50 dark:bg-patina-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs font-sans text-slate-900 dark:text-parchment focus:outline-none focus:border-gold"></textarea>
        </div>

        <button type="submit"
          class="w-full py-3 bg-gradient-to-r from-gold to-copper text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow hover:opacity-90 transition-opacity mt-1">
          Submit for Monastic Verification
        </button>
      </form>
    </div>
  </div>

  <?php wp_footer(); ?>
</body>

</html>
