<?php
/**
 * Template Renderer: Contact Showroom Info & AJAX Inquiry Form Section Block
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

$attributes = isset($attributes) ? $attributes : array();

$showroom_title   = isset($attributes['showroomTitle']) && !empty($attributes['showroomTitle']) ? $attributes['showroomTitle'] : 'Patan Showroom & Foundry';
$address          = !empty($attributes['address']) ? $attributes['address'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_address', 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal') : 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal');
$phone            = !empty($attributes['phone']) ? $attributes['phone'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_phone', '+977 1 552 1432') : '+977 1 552 1432');
$whatsapp         = !empty($attributes['whatsapp']) ? $attributes['whatsapp'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_whatsapp', '+977 984 123 4567') : '+977 984 123 4567');
$email            = !empty($attributes['email']) ? $attributes['email'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_email', 'curator@shresthahandicraft.com') : 'curator@shresthahandicraft.com');
$hours            = !empty($attributes['hours']) ? $attributes['hours'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_hours', 'Sun – Fri: 09:00 AM – 06:00 PM NPT') : 'Sun – Fri: 09:00 AM – 06:00 PM NPT');
$map_url          = !empty($attributes['mapUrl']) ? $attributes['mapUrl'] : (function_exists('get_theme_mod') ? get_theme_mod('shrestha_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.247164478311!2d85.32486791506148!3d27.678735982804565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19cd9148d94b%3A0xc6b677a284000000!2sPatan%20Durbar%20Square!5e0!3m2!1sen!2snp!4v1650000000000!5m2!1sen!2snp') : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.247164478311!2d85.32486791506148!3d27.678735982804565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19cd9148d94b%3A0xc6b677a284000000!2sPatan%20Durbar%20Square!5e0!3m2!1sen!2snp!4v1650000000000!5m2!1sen!2snp');

$form_kicker      = isset($attributes['formKicker']) && !empty($attributes['formKicker']) ? $attributes['formKicker'] : 'BESPOKE INQUIRY';
$form_title       = isset($attributes['formTitle']) && !empty($attributes['formTitle']) ? $attributes['formTitle'] : 'Initiate Commission Dialogue';
$form_description = isset($attributes['formDescription']) && !empty($attributes['formDescription']) ? $attributes['formDescription'] : 'Our Master Curator coordinates directly with patrons, temples, and collectors worldwide to design and cast bespoke sacred iconography.';
$submit_btn_text  = isset($attributes['submitBtnText']) && !empty($attributes['submitBtnText']) ? $attributes['submitBtnText'] : 'Transmit Commission Protocol';
?>

<!-- CONTACT 2-COLUMN SECTION -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-16">

  <!-- LEFT: Showroom & Concierge Information Card -->
  <div class="lg:col-span-4 space-y-6">
    <div class="bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-6 sm:p-8 shadow-xl">
      <h3 class="font-display text-2xl font-bold text-slate-900 dark:text-parchment mb-6">
        <?php echo esc_html($showroom_title); ?>
      </h3>

      <div class="space-y-5 text-sm">
        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0">
            <i data-lucide="map-pin" class="w-5 h-5"></i>
          </div>
          <div>
            <span class="font-mono text-xs text-gold uppercase block">Showroom Location</span>
            <p class="text-slate-700 dark:text-slate-300 font-sans mt-0.5"><?php echo esc_html($address); ?></p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0">
            <i data-lucide="phone" class="w-5 h-5"></i>
          </div>
          <div>
            <span class="font-mono text-xs text-gold uppercase block">Direct Foundry Hotline</span>
            <p class="text-slate-700 dark:text-slate-300 font-mono mt-0.5"><?php echo esc_html($phone); ?></p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0">
            <i data-lucide="message-circle" class="w-5 h-5"></i>
          </div>
          <div>
            <span class="font-mono text-xs text-gold uppercase block">WhatsApp Concierge</span>
            <p class="text-slate-700 dark:text-slate-300 font-mono mt-0.5"><?php echo esc_html($whatsapp); ?></p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0">
            <i data-lucide="mail" class="w-5 h-5"></i>
          </div>
          <div>
            <span class="font-mono text-xs text-gold uppercase block">Curator Email</span>
            <p class="text-slate-700 dark:text-slate-300 font-mono mt-0.5"><?php echo esc_html($email); ?></p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="w-10 h-10 rounded-lg bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0">
            <i data-lucide="clock" class="w-5 h-5"></i>
          </div>
          <div>
            <span class="font-mono text-xs text-gold uppercase block">Visiting Hours</span>
            <p class="text-slate-700 dark:text-slate-300 font-sans mt-0.5"><?php echo esc_html($hours); ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Google Maps Embed -->
    <?php if (!empty($map_url)): ?>
    <div class="rounded-2xl overflow-hidden border border-gold/30 shadow-lg h-64 bg-black">
      <iframe src="<?php echo esc_url($map_url); ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <?php endif; ?>
  </div>

  <!-- RIGHT: AJAX Commission Inquiry Form -->
  <div class="lg:col-span-8">
    <div class="bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-6 sm:p-10 shadow-2xl">
      <div class="mb-6">
        <?php if (!empty($form_kicker)): ?>
        <span class="font-mono text-xs text-gold tracking-widest uppercase"><?php echo esc_html($form_kicker); ?></span>
        <?php endif; ?>
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-slate-900 dark:text-parchment mt-1">
          <?php echo esc_html($form_title); ?>
        </h2>
        <?php if (!empty($form_description)): ?>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 leading-relaxed font-sans">
          <?php echo esc_html($form_description); ?>
        </p>
        <?php endif; ?>
      </div>

      <form id="contactInquiryForm" onsubmit="typeof submitInquiryForm === 'function' && submitInquiryForm(event)" class="space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div>
            <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Full Name *</label>
            <input type="text" name="name" required placeholder="e.g. Tenzin Shakya"
              class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none transition-colors shadow-sm" />
          </div>
          <div>
            <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Email Address *</label>
            <input type="email" name="email" required placeholder="patron@example.com"
              class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none transition-colors shadow-sm" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div>
            <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Phone / WhatsApp</label>
            <input type="text" name="phone" placeholder="+1 (555) 019-2834"
              class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none transition-colors shadow-sm" />
          </div>
          <div>
            <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Desired Alloy</label>
            <select name="alloy"
              class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none transition-colors shadow-sm cursor-pointer">
              <option value="Ashtadhatu (8-Metal)">Ashtadhatu (8-Metal Sacred Alloy)</option>
              <option value="24K Mercury Gold-Leaf Gilt">24K Mercury Gold-Leaf Fire Gilding</option>
              <option value="Patina Bronze">Oxidized Patina Bronze</option>
              <option value="Copper Repousse">Copper Repoussé & Chased Metal</option>
              <option value="Silver Gilt">Solid Silver & Gilded Accents</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Estimated Acquisition Budget</label>
          <select name="budget"
            class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none transition-colors shadow-sm cursor-pointer">
            <option value="$2,000 - $5,000">$2,000 – $5,000 USD (Cabinet & Home Shrine)</option>
            <option value="$5,000 - $15,000">$5,000 – $15,000 USD (Medium Sanctum Specimen)</option>
            <option value="$15,000 - $50,000+">$15,000 – $50,000+ USD (Monumental Temple Commission)</option>
          </select>
        </div>

        <div>
          <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Deity Iconography & Requirements *</label>
          <textarea name="details" required rows="4" placeholder="Detail the canonical mudra, deity manifestation, desired dimensions (Angula or cm), and consecration preferences..."
            class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none transition-colors shadow-sm"></textarea>
        </div>

        <button type="submit" id="submitInquiryBtn"
          class="w-full py-4 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
          <i data-lucide="send" class="w-4 h-4"></i>
          <span><?php echo esc_html($submit_btn_text); ?></span>
        </button>
      </form>

      <div id="inquiryFeedback" class="hidden mt-4 p-4 rounded-lg font-mono text-xs text-center shadow-md"></div>
    </div>
  </div>

</section>
