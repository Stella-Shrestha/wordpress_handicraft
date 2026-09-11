<?php
/**
 * Template Name: Contact Us Page Template
 *
 * @package ShresthaHandicraftStatic
 */

get_header();

$phone    = '+977 1 552 1432';
$whatsapp = '+977 984 123 4567';
$email    = 'curator@shresthahandicraft.com';
$address  = 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal';
$hours    = 'Sun – Fri: 09:00 AM – 06:00 PM NPT';
$map_url  = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.247164478311!2d85.32486791506148!3d27.678735982804565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19cd9148d94b%3A0xc6b677a284000000!2sPatan%20Durbar%20Square!5e0!3m2!1sen!2snp!4v1650000000000!5m2!1sen!2snp';
?>

  <!-- MAIN CONTACT CONTENT -->
  <main class="w-full max-w-[1584px] mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- PAGE HEADER -->
    <div class="border-b border-slate-200 dark:border-gold/20 pb-8 mb-12">
      <div class="inline-flex items-center gap-2 px-3 py-1 bg-white dark:bg-patina-900 border border-gold/30 rounded font-mono text-xs text-gold mb-3 shadow-sm">
        <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
        <span>ATELIER CONCIERGE • PATAN SHOWROOM</span>
      </div>
      <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 dark:text-parchment">
        Commission a Sacred Masterpiece
      </h1>
      <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 max-w-2xl font-sans leading-relaxed">
        Inquire about existing consecrated specimens or initiate a bespoke temple casting with our 8th-generation Newar master sculptors.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start mb-16">

      <!-- LEFT: Showroom & Concierge Information Card -->
      <div class="lg:col-span-5 space-y-6">
        <div class="bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-6 sm:p-8 shadow-xl">
          <h3 class="font-display text-2xl font-bold text-slate-900 dark:text-parchment mb-6">Patan Showroom &amp; Foundry</h3>

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
        <div class="rounded-2xl overflow-hidden border border-gold/30 shadow-lg h-64 bg-black">
          <iframe src="<?php echo esc_url($map_url); ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>

      <!-- RIGHT: AJAX Commission Inquiry Form -->
      <div class="lg:col-span-7">
        <div class="bg-white dark:bg-patina-900 border border-gold/30 rounded-2xl p-6 sm:p-10 shadow-2xl">
          <div class="mb-6">
            <span class="font-mono text-xs text-gold tracking-widest uppercase">BESPOKE INQUIRY</span>
            <h2 class="font-display text-2xl sm:text-3xl font-bold text-slate-900 dark:text-parchment mt-1">Initiate Commission Dialogue</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 font-sans leading-relaxed">
              Our Master Curator coordinates directly with patrons, temples, and collectors worldwide to design and cast bespoke sacred iconography.
            </p>
          </div>

          <form id="contactInquiryForm" onsubmit="typeof submitInquiryForm === 'function' && submitInquiryForm(event)" class="space-y-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Full Name *</label>
                <input type="text" name="name" required placeholder="e.g. Tenzin Shakya"
                  class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm" />
              </div>
              <div>
                <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Email Address *</label>
                <input type="email" name="email" required placeholder="patron@example.com"
                  class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm" />
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div>
                <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Phone / WhatsApp</label>
                <input type="text" name="phone" placeholder="+1 (555) 019-2834"
                  class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm" />
              </div>
              <div>
                <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Desired Alloy</label>
                <select name="alloy"
                  class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm cursor-pointer">
                  <option value="Ashtadhatu (8-Metal)">Ashtadhatu (8-Metal Sacred Alloy)</option>
                  <option value="24K Mercury Gold-Leaf Gilt">24K Mercury Gold-Leaf Fire Gilding</option>
                  <option value="Patina Bronze">Oxidized Patina Bronze</option>
                  <option value="Copper Repousse">Copper Repoussé &amp; Chased Metal</option>
                  <option value="Silver Gilt">Solid Silver &amp; Gilded Accents</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Estimated Acquisition Budget</label>
              <select name="budget"
                class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm cursor-pointer">
                <option value="$2,000 - $5,000">$2,000 – $5,000 USD (Cabinet &amp; Home Shrine)</option>
                <option value="$5,000 - $15,000">$5,000 – $15,000 USD (Medium Sanctum Specimen)</option>
                <option value="$15,000 - $50,000+">$15,000 – $50,000+ USD (Monumental Temple Commission)</option>
              </select>
            </div>

            <div>
              <label class="block font-mono text-[11px] text-gold uppercase mb-1.5">Deity Iconography &amp; Requirements *</label>
              <textarea name="details" required rows="4" placeholder="Detail the canonical mudra, deity manifestation, desired dimensions (Angula or cm), and consecration preferences..."
                class="w-full bg-slate-50 dark:bg-patina-950 border border-slate-300 dark:border-gold/30 rounded-lg px-4 py-2.5 text-sm text-slate-800 dark:text-parchment focus:border-gold outline-none shadow-sm"></textarea>
            </div>

            <button type="submit" id="submitInquiryBtn"
              class="w-full py-4 bg-gradient-to-r from-gold to-copper hover:from-gold-bright hover:to-copper-bright text-white dark:text-patina-950 font-mono font-bold text-xs uppercase tracking-wider rounded-lg shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
              <i data-lucide="send" class="w-4 h-4"></i>
              <span>Transmit Commission Protocol</span>
            </button>
          </form>

          <div id="inquiryFeedback" class="hidden mt-4 p-4 rounded-lg font-mono text-xs text-center shadow-md"></div>
        </div>
      </div>

    </div>

  </main>

<?php
get_footer();
