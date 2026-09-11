<?php
/**
 * Custom Meta Boxes for Specimens, Artisans, and Reviews
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Meta Boxes
 */
function shrestha_core_add_meta_boxes() {
    // 0. Statue Specifications & Canonical Details (Statues CPT)
    add_meta_box(
        'shrestha_statue_specs',
        __('Sacred Metallurgy & Dimensional Specifications', 'shrestha-core'),
        'shrestha_core_statue_specs_callback',
        'statue',
        'normal',
        'high'
    );
    add_meta_box(
        'shrestha_statue_canonical',
        __('Deity Iconography & Sanskrit Canons', 'shrestha-core'),
        'shrestha_core_statue_canonical_callback',
        'statue',
        'normal',
        'high'
    );
    add_meta_box(
        'shrestha_statue_consecration',
        __('Monastic Consecration & Provenance', 'shrestha-core'),
        'shrestha_core_statue_consecration_callback',
        'statue',
        'normal',
        'default'
    );

    // 1. Specimen Specifications
    add_meta_box(
        'shrestha_specimen_specs',
        __('Sacred Metallurgy & Dimensions', 'shrestha-core'),
        'shrestha_core_specimen_specs_callback',
        'specimen',
        'normal',
        'high'
    );

    // 2. Artisan Details
    add_meta_box(
        'shrestha_artisan_details',
        __('Artisan Lineage & Foundry Credentials', 'shrestha-core'),
        'shrestha_core_artisan_details_callback',
        'artisan',
        'normal',
        'high'
    );

    // 3. Testimonial Details
    add_meta_box(
        'shrestha_testimonial_details',
        __('Patron & Consecration Details', 'shrestha-core'),
        'shrestha_core_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'shrestha_core_add_meta_boxes');

/**
 * 0. Statue Meta Boxes Callbacks (Statues CPT)
 */
function shrestha_core_statue_specs_callback($post) {
    wp_nonce_field('shrestha_statue_meta_nonce', 'shrestha_statue_nonce');

    $sku       = get_post_meta($post->ID, '_statue_sku', true);
    $price     = get_post_meta($post->ID, '_statue_price', true);
    $height    = get_post_meta($post->ID, '_statue_height', true);
    $width     = get_post_meta($post->ID, '_statue_width', true);
    $weight    = get_post_meta($post->ID, '_statue_weight', true);
    $alloy     = get_post_meta($post->ID, '_statue_alloy_desc', true);
    $gilding   = get_post_meta($post->ID, '_statue_gilding', true);
    $symmetry  = get_post_meta($post->ID, '_statue_symmetry', true);
    $angula    = get_post_meta($post->ID, '_statue_angula', true);
    $casting   = get_post_meta($post->ID, '_statue_casting', true);
    $asset     = get_post_meta($post->ID, '_statue_asset_fallback', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="statue_sku"><?php _e('Statue SKU / Code', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_sku" name="statue_sku" value="<?php echo esc_attr($sku ?: ('ST-' . str_pad($post->ID, 3, '0', STR_PAD_LEFT))); ?>" class="regular-text" />
                <p class="description"><?php _e('Unique foundry catalogue identifier (e.g. ST-2026-001)', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="statue_price"><?php _e('Acquisition Price (USD)', 'shrestha-core'); ?></label></th>
            <td>
                <input type="number" step="0.01" id="statue_price" name="statue_price" value="<?php echo esc_attr($price ?: '4200'); ?>" class="regular-text" />
                <p class="description"><?php _e('Price in USD for international collectors (e.g. 4200.00)', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="statue_height"><?php _e('Height (in / cm)', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_height" name="statue_height" value="<?php echo esc_attr($height ?: '24 in / 61 cm'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_width"><?php _e('Base Width / Depth', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_width" name="statue_width" value="<?php echo esc_attr($width ?: '16 in / 41 cm'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_weight"><?php _e('Net Solid Weight', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_weight" name="statue_weight" value="<?php echo esc_attr($weight ?: '18.5 kg / 40.8 lbs'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_alloy_desc"><?php _e('Sacred Alloy Composition', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_alloy_desc" name="statue_alloy_desc" value="<?php echo esc_attr($alloy ?: 'Sacred 8-Metal Ashtadhatu Sacred Alloy'); ?>" class="large-text" />
                <p class="description"><?php _e('e.g. Sacred 8-Metal Ashtadhatu Alloy (Copper, Zinc, Gold, Silver, Lead, Tin, Iron, Mercury)', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="statue_gilding"><?php _e('Fire Gilding & Surface Finish', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_gilding" name="statue_gilding" value="<?php echo esc_attr($gilding ?: '24K Mercury Fire Gilded & Pure Cold Gold Face Painted'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_symmetry"><?php _e('Iconometric Symmetry Ratio', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_symmetry" name="statue_symmetry" value="<?php echo esc_attr($symmetry ?: '99.8%'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_angula"><?php _e('Sanskrit Proportional Angula', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_angula" name="statue_angula" value="<?php echo esc_attr($angula ?: '124 Canonical Angula (10-Tala System)'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_casting"><?php _e('Casting Methodology', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_casting" name="statue_casting" value="<?php echo esc_attr($casting ?: 'Licchavi Lost-Wax Cire Perdue Hand Casting'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_asset_fallback"><?php _e('Fallback Image Filename', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_asset_fallback" name="statue_asset_fallback" value="<?php echo esc_attr($asset ?: 'green_tara.jpg'); ?>" class="regular-text" />
                <p class="description"><?php _e('Used if no Featured Image is selected (e.g. green_tara.jpg, shakyamuni.jpg, mahakala.jpg)', 'shrestha-core'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

function shrestha_core_statue_canonical_callback($post) {
    $sanskrit = get_post_meta($post->ID, '_statue_sanskrit_name', true);
    $mudra    = get_post_meta($post->ID, '_statue_mudra', true);
    $style    = get_post_meta($post->ID, '_statue_art_style', true);
    $canon    = get_post_meta($post->ID, '_statue_canon', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="statue_sanskrit_name"><?php _e('Sanskrit Canonical Name', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_sanskrit_name" name="statue_sanskrit_name" value="<?php echo esc_attr($sanskrit ?: 'Śyāmatārā (आर्य खदिरवनी तारा)'); ?>" class="large-text" />
                <p class="description"><?php _e('Canonical name in Sanskrit IAST transliteration and Devanagari', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="statue_mudra"><?php _e('Iconography, Mudra & Attributes', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_mudra" name="statue_mudra" value="<?php echo esc_attr($mudra ?: 'Varada Mudra (Supreme Boons) & Blue Utpala Lotus'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_art_style"><?php _e('Era & Art Style', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_art_style" name="statue_art_style" value="<?php echo esc_attr($style ?: '14th-Century Early Malla Dynasty Classicism'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_canon"><?php _e('Canonical Treatise & Lineage', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_canon" name="statue_canon" value="<?php echo esc_attr($canon ?: 'Sanskrit Shilpa Shastra & Sāmāṅgara Sūtradhāra'); ?>" class="large-text" />
            </td>
        </tr>
    </table>
    <?php
}

function shrestha_core_statue_consecration_callback($post) {
    $consec   = get_post_meta($post->ID, '_statue_consecrated', true);
    $lama     = get_post_meta($post->ID, '_statue_consecrator', true);
    $place    = get_post_meta($post->ID, '_statue_consecration_place', true);
    $sculptor = get_post_meta($post->ID, '_statue_sculptor', true);
    $avail    = get_post_meta($post->ID, '_statue_availability', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="statue_consecrated"><?php _e('Ritual Consecration Status', 'shrestha-core'); ?></label></th>
            <td>
                <select id="statue_consecrated" name="statue_consecrated">
                    <option value="yes" <?php selected($consec !== 'no', true); ?>><?php _e('Yes - Consecrated with Sacred Rolled Mantras (Zung)', 'shrestha-core'); ?></option>
                    <option value="no" <?php selected($consec, 'no'); ?>><?php _e('No - Unconsecrated Master Foundry Casting', 'shrestha-core'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="statue_consecrator"><?php _e('Consecrating Lama / Master', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_consecrator" name="statue_consecrator" value="<?php echo esc_attr($lama ?: 'Consecrated by Tibetan Monastic Rinpoche'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_consecration_place"><?php _e('Consecration Monastery / Temple', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_consecration_place" name="statue_consecration_place" value="<?php echo esc_attr($place ?: 'Swayambhunath Mahavihara, Kathmandu Valley'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_sculptor"><?php _e('Master Sculptor / Foundry Guild', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="statue_sculptor" name="statue_sculptor" value="<?php echo esc_attr($sculptor ?: 'Patan Hereditary Master Sculptors Guild'); ?>" class="large-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statue_availability"><?php _e('Acquisition Availability', 'shrestha-core'); ?></label></th>
            <td>
                <select id="statue_availability" name="statue_availability">
                    <option value="available" <?php selected($avail == 'available' || empty($avail), true); ?>><?php _e('Available in Atelier (Immediate Insured Dispatch)', 'shrestha-core'); ?></option>
                    <option value="commission" <?php selected($avail, 'commission'); ?>><?php _e('Made to Order / Sacred Commission (6-8 Weeks)', 'shrestha-core'); ?></option>
                    <option value="reserved" <?php selected($avail, 'reserved'); ?>><?php _e('Reserved for Private Patron', 'shrestha-core'); ?></option>
                    <option value="museum" <?php selected($avail, 'museum'); ?>><?php _e('In Institutional / Museum Collection', 'shrestha-core'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Specimen Meta Box Output
 */
function shrestha_core_specimen_specs_callback($post) {
    wp_nonce_field('shrestha_specimen_meta_nonce', 'shrestha_specimen_nonce');

    $sku      = get_post_meta($post->ID, '_specimen_sku', true);
    $price    = get_post_meta($post->ID, '_specimen_price', true);
    $height   = get_post_meta($post->ID, '_specimen_height', true);
    $weight   = get_post_meta($post->ID, '_specimen_weight', true);
    $symmetry = get_post_meta($post->ID, '_specimen_symmetry', true);
    $angula   = get_post_meta($post->ID, '_specimen_angula', true);
    $consec   = get_post_meta($post->ID, '_specimen_consecrated', true);
    $asset    = get_post_meta($post->ID, '_specimen_asset_img', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="specimen_sku"><?php _e('Specimen SKU', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="specimen_sku" name="specimen_sku" value="<?php echo esc_attr($sku ?: 'SH-001'); ?>" class="regular-text" />
                <p class="description"><?php _e('Unique foundry catalogue identifier (e.g. SH-001)', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="specimen_price"><?php _e('Acquisition Price (USD)', 'shrestha-core'); ?></label></th>
            <td>
                <input type="number" step="0.01" id="specimen_price" name="specimen_price" value="<?php echo esc_attr($price ?: '3200'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="specimen_height"><?php _e('Height (in / cm)', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="specimen_height" name="specimen_height" value="<?php echo esc_attr($height ?: '18.5 in / 47 cm'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="specimen_weight"><?php _e('Net Weight', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="specimen_weight" name="specimen_weight" value="<?php echo esc_attr($weight ?: '14.2 kg'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="specimen_symmetry"><?php _e('Iconometric Symmetry', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="specimen_symmetry" name="specimen_symmetry" value="<?php echo esc_attr($symmetry ?: '99.8%'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="specimen_angula"><?php _e('Sanskrit Canonical Angula', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="specimen_angula" name="specimen_angula" value="<?php echo esc_attr($angula ?: '124 Canonical Angula'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="specimen_consecrated"><?php _e('Ritual Consecration Status', 'shrestha-core'); ?></label></th>
            <td>
                <select id="specimen_consecrated" name="specimen_consecrated">
                    <option value="yes" <?php selected($consec !== 'no', true); ?>><?php _e('Yes - Consecrated by Tibetan Monastic Rinpoche', 'shrestha-core'); ?></option>
                    <option value="no" <?php selected($consec, 'no'); ?>><?php _e('No - Unconsecrated Master Casting', 'shrestha-core'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="specimen_asset_img"><?php _e('Fallback Asset Filename', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="specimen_asset_img" name="specimen_asset_img" value="<?php echo esc_attr($asset ?: 'green_tara.jpg'); ?>" class="regular-text" />
                <p class="description"><?php _e('Used if no Featured Image thumbnail is uploaded (e.g. green_tara.jpg, shakyamuni.jpg, mahakala.jpg)', 'shrestha-core'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Artisan Meta Box Output
 */
function shrestha_core_artisan_details_callback($post) {
    wp_nonce_field('shrestha_artisan_meta_nonce', 'shrestha_artisan_nonce');

    $title   = get_post_meta($post->ID, '_artisan_title', true);
    $exp     = get_post_meta($post->ID, '_artisan_experience', true);
    $lineage = get_post_meta($post->ID, '_artisan_lineage', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="artisan_title"><?php _e('Master Specialization Title', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="artisan_title" name="artisan_title" value="<?php echo esc_attr($title ?: 'Master Sculptor & Iconometrist'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="artisan_experience"><?php _e('Foundry Experience', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="artisan_experience" name="artisan_experience" value="<?php echo esc_attr($exp ?: '42 Years Foundry Experience'); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="artisan_lineage"><?php _e('Lineage / Guild Heritage', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="artisan_lineage" name="artisan_lineage" value="<?php echo esc_attr($lineage ?: '8th Generation Patan Newar Master'); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Testimonial Meta Box Output
 */
function shrestha_core_testimonial_details_callback($post) {
    wp_nonce_field('shrestha_testimonial_meta_nonce', 'shrestha_testimonial_nonce');

    $role     = get_post_meta($post->ID, '_testimonial_role', true) ?: get_post_meta($post->ID, '_review_location', true);
    $seal     = get_post_meta($post->ID, '_testimonial_seal', true);
    $specimen = get_post_meta($post->ID, '_testimonial_specimen', true) ?: get_post_meta($post->ID, '_review_specimen', true);
    $rating   = get_post_meta($post->ID, '_testimonial_rating', true) ?: get_post_meta($post->ID, '_review_rating', true);
    $initials = get_post_meta($post->ID, '_testimonial_initials', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="testimonial_role"><?php _e('Reviewer Role / Monastic Affiliation / Location', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="testimonial_role" name="testimonial_role" value="<?php echo esc_attr($role ?: 'Abbot, Drukpa Monastery • Paro, Bhutan'); ?>" class="large-text" />
                <p class="description"><?php _e('e.g. Abbot, Drukpa Monastery • Paro, Bhutan or Curator of Asian Art, Museum Rietberg • Zurich', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_seal"><?php _e('Acquisition Seal Badge', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="testimonial_seal" name="testimonial_seal" value="<?php echo esc_attr($seal ?: 'Monastic Seal'); ?>" class="regular-text" />
                <p class="description"><?php _e('e.g. Monastic Seal, Museum Acquisition, Verified Collector, Private Collection', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_specimen"><?php _e('Acquired Specimen / Sculpture', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="testimonial_specimen" name="testimonial_specimen" value="<?php echo esc_attr($specimen ?: 'Green Tara — 24K Gold (22.5 in)'); ?>" class="regular-text" />
                <p class="description"><?php _e('e.g. Green Tara — 24K Gold (22.5 in) or Mahakala 6-Armed (18 in)', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_initials"><?php _e('Avatar Initials (2 Letters)', 'shrestha-core'); ?></label></th>
            <td>
                <input type="text" id="testimonial_initials" name="testimonial_initials" value="<?php echo esc_attr($initials ?: ''); ?>" class="small-text" maxlength="3" style="text-transform: uppercase;" />
                <p class="description"><?php _e('e.g. LW, DR, KC (leave blank to auto-generate from reviewer name)', 'shrestha-core'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="testimonial_rating"><?php _e('Star Rating (1 to 5 Stars)', 'shrestha-core'); ?></label></th>
            <td>
                <select id="testimonial_rating" name="testimonial_rating">
                    <?php for ($i = 5; $i >= 1; $i--): ?>
                        <option value="<?php echo $i; ?>" <?php selected($rating == $i || (!$rating && $i == 5), true); ?>><?php echo $i; ?> Stars (<?php echo str_repeat('★', $i); ?>)</option>
                    <?php endfor; ?>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function shrestha_core_save_meta_boxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // 0. Statue (Statues CPT)
    if (isset($_POST['shrestha_statue_nonce']) && wp_verify_nonce($_POST['shrestha_statue_nonce'], 'shrestha_statue_meta_nonce')) {
        $statue_fields = array(
            'statue_sku', 'statue_price', 'statue_height', 'statue_width', 'statue_weight',
            'statue_alloy_desc', 'statue_gilding', 'statue_symmetry', 'statue_angula', 'statue_casting', 'statue_asset_fallback',
            'statue_sanskrit_name', 'statue_mudra', 'statue_art_style', 'statue_canon',
            'statue_consecrated', 'statue_consecrator', 'statue_consecration_place', 'statue_sculptor', 'statue_availability'
        );
        foreach ($statue_fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // 1. Specimen
    if (isset($_POST['shrestha_specimen_nonce']) && wp_verify_nonce($_POST['shrestha_specimen_nonce'], 'shrestha_specimen_meta_nonce')) {
        $fields = array('specimen_sku', 'specimen_price', 'specimen_height', 'specimen_weight', 'specimen_symmetry', 'specimen_angula', 'specimen_consecrated', 'specimen_asset_img');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // 2. Artisan
    if (isset($_POST['shrestha_artisan_nonce']) && wp_verify_nonce($_POST['shrestha_artisan_nonce'], 'shrestha_artisan_meta_nonce')) {
        $fields = array('artisan_title', 'artisan_experience', 'artisan_lineage');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // 3. Testimonial
    if (isset($_POST['shrestha_testimonial_nonce']) && wp_verify_nonce($_POST['shrestha_testimonial_nonce'], 'shrestha_testimonial_meta_nonce')) {
        if (isset($_POST['testimonial_role'])) {
            $role_val = sanitize_text_field($_POST['testimonial_role']);
            update_post_meta($post_id, '_testimonial_role', $role_val);
            update_post_meta($post_id, '_review_location', $role_val);
        }
        if (isset($_POST['testimonial_seal'])) {
            update_post_meta($post_id, '_testimonial_seal', sanitize_text_field($_POST['testimonial_seal']));
        }
        if (isset($_POST['testimonial_specimen'])) {
            $spec_val = sanitize_text_field($_POST['testimonial_specimen']);
            update_post_meta($post_id, '_testimonial_specimen', $spec_val);
            update_post_meta($post_id, '_review_specimen', $spec_val);
        }
        if (isset($_POST['testimonial_initials'])) {
            update_post_meta($post_id, '_testimonial_initials', strtoupper(sanitize_text_field($_POST['testimonial_initials'])));
        }
        if (isset($_POST['testimonial_rating'])) {
            $rating_val = intval($_POST['testimonial_rating']);
            update_post_meta($post_id, '_testimonial_rating', $rating_val);
            update_post_meta($post_id, '_review_rating', $rating_val);
        }
    }
}
add_action('save_post', 'shrestha_core_save_meta_boxes');
