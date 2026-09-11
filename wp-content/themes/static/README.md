# Shrestha Handicraft — WordPress Theme

A luxury, bespoke WordPress theme designed for **Shrestha Handicraft Atelier** (Patan, Nepal) preserving ancient lost-wax sacred metallurgy, Ashtadhatu 8-metal casting, and 24K gold-leaf fire gilding.

---

## 📁 Theme Folder Structure

```text
shresthahandicraft/
├── style.css                      # Theme header metadata and core styling rules
├── screenshot.png                 # Theme thumbnail in WordPress Admin Themes screen
├── functions.php                  # Theme setup, Tailwind config, Lucide & script enqueueing
├── header.php                     # Sticky header nav, brand logo, dark/light toggle, cart drawer button
├── footer.php                     # Dark footer, mandala background, deity visual, cart drawer, modals
├── front-page.php                 # Home page (Specimen spotlight hero, ticker, process, reviews slider)
├── page-about.php                 # About Us page (Heritage, artisans, materials, metrics counters)
├── page-catalog.php               # Catalog / Shop page (Interactive alloy filters, search, specimen grid)
├── page-contact.php               # Contact Us page (Commission form, showroom hours, interactive map)
├── page.php                       # Generic default page template for custom WP pages
├── single.php                     # Single post / article template
├── index.php                      # Chronicle / Blog archive fallback template
├── archive.php                    # Category and Tag archive template
├── 404.php                        # 404 Not Found error page
├── page-templates/
│   ├── template-about.php         # Selectable "About Us Page Template" in WP Admin
│   ├── template-catalog.php       # Selectable "Catalog / Shop Page Template" in WP Admin
│   └── template-contact.php       # Selectable "Contact Us Page Template" in WP Admin
├── assets/                        # High-resolution specimen imagery and official seals
└── js/
    ├── lucide.min.js              # Lucide iconography bundle
    └── main.js                    # Cart drawer, theme switcher, reviews slider, catalog filtering
```

---

## 🚀 Installation Guide

### Method 1: Direct Folder Copy (Local or FTP)
1. Copy the entire `shresthahandicraft` folder into your WordPress installation:
   ```text
   wp-content/themes/shresthahandicraft
   ```
2. Log in to your WordPress Dashboard.
3. Go to **Appearance → Themes**.
4. Locate **Shrestha Handicraft** and click **Activate**.

### Method 2: Upload via WordPress Admin
1. Zip the `shresthahandicraft` directory into `shresthahandicraft.zip`.
2. Go to **Appearance → Themes → Add New Theme → Upload Theme**.
3. Choose `shresthahandicraft.zip` and click **Install Now**, then **Activate**.

---

## ⚙️ Initial Page Setup

To have all 4 pages set up automatically with their respective designs:

1. **Home Page**:
   - Go to **Pages → Add New**.
   - Title: `Home`
   - In the right sidebar under **Page Attributes → Template**, select **Home Page** (or default).
   - Publish the page.
   - Go to **Settings → Reading**.
   - Under **Your homepage displays**, select **A static page**.
   - Choose `Home` for Homepage. Click **Save Changes**.

2. **About Us Page**:
   - Go to **Pages → Add New**.
   - Title: `About Us` (Slug: `about` or `about-us`)
   - In **Page Attributes → Template**, select **About Us Page Template**.
   - Publish the page.

3. **Shop / Catalog Page**:
   - Go to **Pages → Add New**.
   - Title: `Shop` or `Catalog` (Slug: `catalog` or `shop`)
   - In **Page Attributes → Template**, select **Catalog / Shop Page Template**.
   - Publish the page.

4. **Contact Us Page**:
   - Go to **Pages → Add New**.
   - Title: `Contact Us` (Slug: `contact` or `contact-us`)
   - In **Page Attributes → Template**, select **Contact Us Page Template**.
   - Publish the page.

---

## 🧭 Navigation Menus Setup

1. Go to **Appearance → Menus**.
2. Create a new menu named `Primary Menu`.
3. Add the pages: **Home**, **About Us**, **Shop**, **Contact Us**.
4. Check the display location **Primary Navigation Menu** under Menu Settings.
5. Click **Save Menu**.

---

## 🎨 Key Features & Functionality

- **Luxury Patina & Gold Design**: Bespoke dark & light mode switcher with persistent client preference storage.
- **Acquisitions Cart Drawer**: Slide-over acquisition drawer supporting item quantity adjustments, live subtotal calculations, and escrow checkout simulation.
- **Specimen Quick Inspection**: Technical inspection modal with high-res photography, canonical Angula measurements, and alloy metallurgy details.
- **Interactive Patron Testimonials Slider**: Touch swipe, auto-play toggle, previous/next controls, and review submission modal.
- **Catalog Filtering & Real-Time Search**: Filter deity statues by alloy (Ashtadhatu 8-Metal, 24K Gold Leaf, Patina Bronze) and search instantaneously by title or SKU.
- **Animated Metrics Counters**: Cubic ease-out number counters that trigger smoothly on scroll via IntersectionObserver.
- **Responsive Architecture**: Fully optimized for mobile, tablet, desktop, and ultra-wide displays with custom mobile drawer navigation.
