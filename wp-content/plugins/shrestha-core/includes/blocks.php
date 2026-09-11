<?php
/**
 * Gutenberg Blocks Server-Side Registration & Render Callbacks
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register All Shrestha Gutenberg Blocks
 */
function shrestha_core_register_blocks() {
    /* =========================================================================
       FRONT PAGE BLOCKS
       ========================================================================= */

    // 1. Hero Specimen Spotlight Block
    register_block_type('shrestha/hero-specimen', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_hero_specimen',
        'attributes'      => array(
            'badgeText'        => array('type' => 'string', 'default' => 'SPECIMEN #SH-001'),
            'consecratedText'  => array('type' => 'string', 'default' => 'RITUAL CONSECRATED'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Green Tara'),
            'titleSubtitle'    => array('type' => 'string', 'default' => 'Mother of Divine Liberation'),
            'description'      => array('type' => 'string', 'default' => 'Hand-cast using lost-wax iconometry (Cire Perdue) from 8-metal Ashtadhatu alloy. Adorned with 24K gold-leaf fire gilding and cold-chiseled facial symmetry, crafted according to 14th-century Sanskrit treatise canons in Patan, Nepal.'),
            'specimenSku'      => array('type' => 'string', 'default' => 'SH-001'),
            'primaryBtnText'   => array('type' => 'string', 'default' => 'Acquire Hero Specimen'),
            'secondaryBtnText' => array('type' => 'string', 'default' => 'Inspect Technical Spec'),
            'symmetryText'     => array('type' => 'string', 'default' => 'ICONOMETRIC SYMMETRY: 99.8%'),
            'imageAsset'       => array('type' => 'string', 'default' => 'green_tara.jpg'),
            'imageUrl'         => array('type' => 'string', 'default' => ''),
            'imageId'          => array('type' => 'number', 'default' => 0),
        ),
    ));

    // 2. Infinite Ticker Block
    register_block_type('shrestha/infinite-ticker', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_infinite_ticker',
        'attributes'      => array(
            'items' => array(
                'type'    => 'array',
                'default' => array(
                    array('icon' => 'award',        'text' => 'PATAN MASTER SCULPTORS GUILD'),
                    array('icon' => 'shield-check', 'text' => '99.9% ASHTADHATU ASSAY CERTIFIED'),
                    array('icon' => 'landmark',     'text' => 'SACRED ART INSTITUTE OF KYOTO'),
                    array('icon' => 'scroll-text',  'text' => 'SANSKRIT SHILPA SHASTRA CANON'),
                    array('icon' => 'flame',        'text' => 'LICCHAVI LOST-WAX CIRE PERDUE'),
                    array('icon' => 'badge-check',  'text' => 'MONASTIC CONSECRATION SEALED'),
                ),
            ),
            'item1' => array('type' => 'string', 'default' => ''),
            'item2' => array('type' => 'string', 'default' => ''),
            'item3' => array('type' => 'string', 'default' => ''),
            'item4' => array('type' => 'string', 'default' => ''),
            'item5' => array('type' => 'string', 'default' => ''),
        ),
    ));

    // 3. Consecrated Specimens Grid Block
    register_block_type('shrestha/newly-consecrated', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_newly_consecrated',
        'attributes'      => array(
            'subtitle'      => array('type' => 'string', 'default' => 'A rotating selection of recently completed pieces, cast this season in our Patan workshops.'),
            'title'         => array('type' => 'string', 'default' => 'Newly Consecrated'),
            'source'        => array('type' => 'string', 'default' => 'manual'),
            'selectedIds'   => array('type' => 'array',  'default' => array(20, 22, 21)),
            'numberOfPosts' => array('type' => 'number', 'default' => 3),
            'catalogLink'   => array('type' => 'string', 'default' => ''),
            'catalogText'   => array('type' => 'string', 'default' => 'VIEW ALL PACKAGES & CATALOG'),
        ),
    ));

    // 4. Lost-Wax Casting Method Block
    register_block_type('shrestha/lost-wax-process', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_lost_wax_process',
        'attributes'      => array(
            'kickerIcon'  => array('type' => 'string', 'default' => 'flame'),
            'subtitle'    => array('type' => 'string', 'default' => 'OUR PROCESS'),
            'title'       => array('type' => 'string', 'default' => 'FROM WAX'),
            'titleLine2'  => array('type' => 'string', 'default' => 'TO PRESENCE.'),
            'description' => array('type' => 'string', 'default' => 'Every figure emerging from our Patan foundry follows strict iconometric proportions derived from Sanskrit treatises such as the Sāmāṅgara Sūtradhāra.'),
            'stats'       => array(
                'type'    => 'array',
                'default' => array(
                    array('icon' => 'sparkles', 'value' => '600+',       'label' => "Sacred Icons\nCrafted"),
                    array('icon' => 'users',    'value' => '30+',         'label' => "Master Artisans\n& Specialists"),
                    array('icon' => 'clock',    'value' => '4-8 WEEKS',   'label' => "Typical Casting\nTimeline"),
                ),
            ),
            'steps'       => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'number'      => '01',
                        'title'       => 'WAX MODELLING',
                        'description' => 'The sacred figure is modelled in wax according to prescribed proportions and iconometric measurements.',
                        'badge'       => 'FORM',
                        'icon'        => 'shapes'
                    ),
                    array(
                        'number'      => '02',
                        'title'       => 'CLAY INVESTMENT',
                        'description' => 'Local Kathmandu Valley clay and rice-husk material gradually encases the wax model in multiple layers.',
                        'badge'       => 'SHELL',
                        'icon'        => 'layers'
                    ),
                    array(
                        'number'      => '03',
                        'title'       => 'SACRED ALLOY',
                        'description' => 'The wax is removed and molten Ashtadhatu or selected bronze alloy is introduced into the prepared mould.',
                        'badge'       => 'CAST',
                        'icon'        => 'flame'
                    ),
                    array(
                        'number'      => '04',
                        'title'       => 'CHISELING & GILDING',
                        'description' => 'Cold-chiseling, polishing, fire gilding and final hand-painted details complete the sacred image.',
                        'badge'       => 'FINISH',
                        'icon'        => 'sparkles'
                    ),
                ),
            ),
            'features'    => array(
                'type'    => 'array',
                'default' => array(
                    array('icon' => 'globe',        'title' => 'Worldwide',                   'subtitle' => 'Secure Shipping'),
                    array('icon' => 'ruler',        'title' => 'Custom Dimensions',           'subtitle' => 'On Request'),
                    array('icon' => 'shield-check', 'title' => 'Lifetime Care',               'subtitle' => '& Maintenance'),
                    array('icon' => 'flame',        'title' => 'Monastic Blessing',           'subtitle' => 'Available'),
                    array('icon' => 'award',        'title' => 'Certificate of Authenticity', 'subtitle' => 'Included'),
                ),
            ),
        ),
    ));

    // 5. Master Artisans Block (Crafted with Heritage)
    register_block_type('shrestha/master-artisans', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_master_artisans',
        'attributes'      => array(
            'title'       => array('type' => 'string', 'default' => 'Crafted with Heritage, Made to Last'),
            'subtitle'    => array('type' => 'string', 'default' => 'What makes our sacred sculptures different is the craftsmanship, patience and Nepalese heritage behind every piece we create.'),
            'cards'       => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'icon'        => 'feather',
                        'title'       => 'Authentic Nepalese Craftsmanship',
                        'description' => 'Each sculpture is created in Nepal using traditional metalworking techniques shaped by generations of artistic knowledge and heritage.'
                    ),
                    array(
                        'icon'        => 'user',
                        'title'       => 'Handcrafted, Never Mass Produced',
                        'description' => 'Every statue passes through skilled artisan hands. From wax modeling to finishing, no piece is simply taken from a production line.'
                    ),
                    array(
                        'icon'        => 'timer',
                        'title'       => 'Meticulous Detail & Proportion',
                        'description' => 'Facial expressions, hand gestures, ornaments and traditional proportions are carefully refined to preserve the character of each deity.'
                    ),
                    array(
                        'icon'        => 'star',
                        'title'       => 'Premium Metal & Finishes',
                        'description' => 'We work with carefully selected bronze, brass, copper and refined finishes to create sculptures with depth, character and lasting beauty.'
                    ),
                    array(
                        'icon'        => 'crosshair',
                        'title'       => 'Custom Commissions',
                        'description' => 'From intimate altar pieces to large sacred sculptures, we can create custom dimensions, finishes and specifications for individual commissions.'
                    ),
                    array(
                        'icon'        => 'globe',
                        'title'       => 'Worldwide Delivery',
                        'description' => 'Your sculpture is carefully inspected, protected and prepared for secure international delivery from our workshop to your collection or sacred space.'
                    ),
                ),
            ),
        ),
    ));

    // 6. Patron Reviews Block
    register_block_type('shrestha/patron-testimonials', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_patron_testimonials',
        'attributes'      => array(
            'title'         => array('type' => 'string', 'default' => 'Testimonials from Our Clients'),
            'subtitle'      => array('type' => 'string', 'default' => 'Venerated reviews from Buddhist monasteries, museum curators, international collectors, and sacred art connoisseurs across 34 nations.'),
            'source'        => array('type' => 'string', 'default' => 'manual'),
            'selectedIds'   => array('type' => 'array',  'default' => array(26, 27, 28)),
            'numberOfPosts' => array('type' => 'number', 'default' => 3),
            'testimonials'  => array(
                'type'    => 'array',
                'default' => array(
                    array(
                        'stars'    => 5,
                        'seal'     => 'Monastic Seal',
                        'specimen' => 'Green Tara — 24K Gold (22.5 in)',
                        'quote'    => '"The iconometric precision of the 124 Angula grid on our Green Tara is flawless. When the 24K mercury gilding caught the butter lamps in the shrine room, the monastic assembly was deeply moved. Shrestha Atelier preserves the true soul of Patan metallurgy."',
                        'initials' => 'LW',
                        'name'     => 'Lama Tenzin Wangyal',
                        'role'     => 'Abbot, Drukpa Monastery • Paro, Bhutan'
                    ),
                    array(
                        'stars'    => 5,
                        'seal'     => 'Museum Acquisition',
                        'specimen' => 'Mahakala 6-Armed — Ashtadhatu (18 in)',
                        'quote'    => '"Acquiring the 6-Armed Mahakala for our Himalayan sacred art gallery exceeded all curatorial expectations. The alloy density, cold-hammered chiseled jewelry, and Sanskrit consecration chamber make this a museum-grade masterpiece."',
                        'initials' => 'DR',
                        'name'     => 'Dr. Henriette Richter',
                        'role'     => 'Curator of Asian Art, Museum Rietberg • Zurich, Switzerland'
                    ),
                    array(
                        'stars'    => 5,
                        'seal'     => 'Private Collection',
                        'specimen' => 'Shakyamuni Buddha — 24K Gilt Fire Gilding (24 in)',
                        'quote'    => '"Commissioning our Shakyamuni Buddha was a transcendent experience. Receiving photo documentation of the lost-wax casting and Patan monastery blessing gave our family a profound spiritual heirloom that will endure for centuries."',
                        'initials' => 'KC',
                        'name'     => 'Kenjiro & Saki Takahashi',
                        'role'     => 'Private Collectors of Tantric Iconography • Kyoto, Japan'
                    ),
                ),
            ),
        ),
    ));

    /* =========================================================================
       ABOUT US PAGE BLOCKS
       ========================================================================= */

    // 7. About Hero Block
    register_block_type('shrestha/about-hero', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_hero',
        'attributes'      => array(
            'badgeText'        => array('type' => 'string', 'default' => 'ABOUT SHRESTHA HANDICRAFT'),
            'title'            => array('type' => 'string', 'default' => 'Sacred Bronze Sculpting,'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Five Generations in Patan.'),
            'description'      => array('type' => 'string', 'default' => 'For over four decades, our family foundry in Patan has preserved the sacred Newar tradition of lost-wax bronze casting — creating authentic, iconometrically precise Buddhist and Hindu deity statues for monasteries, temples, and collectors worldwide.'),
            'establishedText'  => array('type' => 'string', 'default' => 'FOUNDED 1982'),
            'locationText'     => array('type' => 'string', 'default' => 'PATAN, NEPAL'),
            'heritagePillText' => array('type' => 'string', 'default' => 'UNESCO HERITAGE CRAFT'),
            'primaryBtnText'   => array('type' => 'string', 'default' => 'EXPLORE OUR STORY'),
            'primaryBtnUrl'    => array('type' => 'string', 'default' => '#our-story'),
            'secondaryBtnText' => array('type' => 'string', 'default' => 'VISIT ATELIER'),
            'secondaryBtnUrl'  => array('type' => 'string', 'default' => '#atelier'),
            'stat1Value'       => array('type' => 'string', 'default' => '40+'),
            'stat1Label'       => array('type' => 'string', 'default' => 'Years of Casting Heritage'),
            'stat2Value'       => array('type' => 'string', 'default' => '50+'),
            'stat2Label'       => array('type' => 'string', 'default' => 'Monasteries & Temples Supplied'),
            'stat3Value'       => array('type' => 'string', 'default' => '100%'),
            'stat3Label'       => array('type' => 'string', 'default' => 'Authentic Lost-Wax Process'),
        ),
    ));

    // 8. About Story Block
    register_block_type('shrestha/about-story', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_story',
        'attributes'      => array(
            'sectionNumber'    => array('type' => 'string', 'default' => '01'),
            'sectionLabel'     => array('type' => 'string', 'default' => 'OUR FOUNDING STORY'),
            'title'            => array('type' => 'string', 'default' => 'Born from Devotion,'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Carried through Fire and Metal.'),
            'introText'        => array('type' => 'string', 'default' => "In 1982, amidst the ancient courtyards of Patan — Nepal's historic epicentre of sacred metallurgy — Master Sculptor Rajendra Shrestha founded our family atelier with a single, uncompromising vision: to preserve the authentic Newar lost-wax casting traditions passed down across generations."),
            'p1'               => array('type' => 'string', 'default' => "What began as a humble one-furnace workshop in the alleys of Gabahal has grown into one of Nepal's most revered sacred art foundries. Today, three generations of the Shrestha family work side by side with more than 30 master artisans, chisellers, gilders, and iconographers."),
            'p2'               => array('type' => 'string', 'default' => "Every statue that leaves our atelier is not simply a decorative object — it is a sacred vessel, created according to strict canonical proportions (Iconometry) set forth in ancient Buddhist and Hindu scriptures. From the initial beeswax sculpture to the final 24K gold mercury gilding, each piece embodies centuries of spiritual dedication."),
            'quoteText'        => array('type' => 'string', 'default' => 'A deity statue is not merely cast; it is invited into existence through reverence, patience, and the sacred fire of Patan.'),
            'quoteAuthor'      => array('type' => 'string', 'default' => 'Rajendra Shrestha'),
            'quoteRole'        => array('type' => 'string', 'default' => 'Founder & Master Sculptor'),
            'founderName'      => array('type' => 'string', 'default' => 'Master Rajendra Shrestha'),
            'founderRole'      => array('type' => 'string', 'default' => 'Founding Master Sculptor • Patan Atelier, 1982'),
            'badgeYears'       => array('type' => 'string', 'default' => '40+'),
            'image1'           => array('type' => 'string', 'default' => ''),
            'image2'           => array('type' => 'string', 'default' => ''),
            'image3'           => array('type' => 'string', 'default' => ''),
        ),
    ));

    // 9. About Heritage & Timeline Block
    register_block_type('shrestha/about-heritage', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_heritage',
        'attributes'      => array(
            'sectionNumber'    => array('type' => 'string', 'default' => '02'),
            'sectionLabel'     => array('type' => 'string', 'default' => 'OUR HERITAGE & TIMELINE'),
            'title'            => array('type' => 'string', 'default' => 'Centuries of Sacred Artistry,'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Four Decades of Foundry Heritage.'),
            'description'      => array('type' => 'string', 'default' => 'Patan — historically known as Lalitpur, the "City of Fine Arts" — has been the heart of Himalayan metal casting since the Licchavi dynasty (400–750 CE). Our foundry carries forward this unbroken lineage.'),
            'p1'               => array('type' => 'string', 'default' => 'The Newar artisans of Patan are celebrated throughout Asia for their mastery of the lost-wax (cire perdue) casting technique. In the 13th century, Patan\'s master artist Araniko was summoned to the court of Kublai Khan, introducing Himalayan iconography and casting techniques across China and Tibet.'),
            'p2'               => array('type' => 'string', 'default' => 'Today, our atelier is one of the few surviving foundries in Patan that maintains every step of this ancient process in-house — from natural beeswax modeling to traditional river-clay investment and 24-karat gold mercury fire gilding.'),
            'timeline'         => array('type' => 'array', 'default' => array()),
        ),
    ));

    // 9b. About Artisans Block (Section 03: The Hands Behind the Art)
    register_block_type('shrestha/about-artisans', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_artisans',
        'attributes'      => array(
            'kicker'        => array('type' => 'string', 'default' => '03 - OUR ARTISANS'),
            'titleLine1'    => array('type' => 'string', 'default' => 'The Hands Behind the'),
            'titleLine2'    => array('type' => 'string', 'default' => 'Art.'),
            'description1'  => array('type' => 'string', 'default' => 'A sculpture carries the character of the hands that create it. Our artisans work patiently through every stage of the process, from the first wax model to the final surface finish.'),
            'description2'  => array('type' => 'string', 'default' => 'We believe that preserving craftsmanship means supporting the knowledge, precision and creativity of the people who continue to practice it.'),
            'stat1Val'      => array('type' => 'string', 'default' => 'Hand'),
            'stat1Lbl'      => array('type' => 'string', 'default' => 'FINISHED DETAILS'),
            'stat2Val'      => array('type' => 'string', 'default' => 'Patan'),
            'stat2Lbl'      => array('type' => 'string', 'default' => 'ARTISAN COMMUNITY'),
            'overlayKicker' => array('type' => 'string', 'default' => 'THE PEOPLE'),
            'overlayTitle'  => array('type' => 'string', 'default' => 'Skilled Hands.'),
            'overlayDesc'   => array('type' => 'string', 'default' => 'Craftsmanship lives through the people who practice it.'),
            'imageUrl'      => array('type' => 'string', 'default' => ''),
        ),
    ));

    // 10. About Materials Block
    register_block_type('shrestha/about-materials', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_materials',
        'attributes'      => array(
            'sectionNumber'    => array('type' => 'string', 'default' => '03'),
            'sectionLabel'     => array('type' => 'string', 'default' => 'SACRED METALLURGY & MATERIALS'),
            'title'            => array('type' => 'string', 'default' => 'Alloys of Divine Resonance,'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Finishes of Eternal Lustre.'),
            'description'      => array('type' => 'string', 'default' => 'Every material used in our atelier is selected for its spiritual significance, physical permanence, and metallurgical authenticity. We do not use commercial shortcuts, synthetic resins, or electroplated imitations.'),
            'materials'        => array('type' => 'array', 'default' => array()),
        ),
    ));

    // 11. About Philosophy Block
    register_block_type('shrestha/about-philosophy', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_philosophy',
        'attributes'      => array(
            'sectionNumber'    => array('type' => 'string', 'default' => '04'),
            'sectionLabel'     => array('type' => 'string', 'default' => 'OUR SACRED PHILOSOPHY'),
            'title'            => array('type' => 'string', 'default' => 'Craft as Meditation,'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Form as Spiritual Truth.'),
            'description'      => array('type' => 'string', 'default' => 'In the Himalayan metallurgical tradition, casting a sacred deity is considered an act of spiritual merit (punya) and deep contemplative devotion (sadhana). Our work is guided by five foundational principles.'),
            'tenets'           => array('type' => 'array', 'default' => array()),
        ),
    ));

    // 12. About Atelier Block
    register_block_type('shrestha/about-atelier', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_atelier',
        'attributes'      => array(
            'sectionNumber'    => array('type' => 'string', 'default' => '06'),
            'sectionLabel'     => array('type' => 'string', 'default' => 'OUR WORKSHOP & COMMUNITY'),
            'title'            => array('type' => 'string', 'default' => 'The Heart of Our Craft:'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'The Patan Atelier.'),
            'description'      => array('type' => 'string', 'default' => 'Located in the historic artisanal quarters of Patan, our multi-level atelier is where ancient fire meets dedicated hands. We are more than a workshop — we are an artisanal family and a living craft school.'),
            'sections'         => array('type' => 'array', 'default' => array()),
        ),
    ));

    // 13. Why Choose Us Block
    register_block_type('shrestha/why-choose-us', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_why_choose_us',
        'attributes'      => array(
            'sectionNumber'    => array('type' => 'string', 'default' => '07'),
            'sectionLabel'     => array('type' => 'string', 'default' => 'WHY CHOOSE SHRESTHA HANDICRAFT'),
            'title'            => array('type' => 'string', 'default' => 'Sacred Heritage,'),
            'titleHighlight'   => array('type' => 'string', 'default' => 'Uncompromising Standards.'),
            'description'      => array('type' => 'string', 'default' => 'From master Newar lost-wax casting and strict iconometric proportions to museum-grade curation and worldwide insured delivery, discover why temples, monasteries, and discerning collectors entrust their sacred acquisitions to our Patan atelier.'),
            'features'         => array('type' => 'array', 'default' => array()),
            'counters'         => array('type' => 'array', 'default' => array()),
        ),
    ));

    // 14. About CTA Block
    register_block_type('shrestha/about-cta', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_about_cta',
        'attributes'      => array(
            'subtitle'         => array('type' => 'string', 'default' => 'CONTINUE YOUR JOURNEY'),
            'title'            => array('type' => 'string', 'default' => 'Discover the Art '),
            'titleHighlight'   => array('type' => 'string', 'default' => 'of Shrestha Handicraft.'),
            'description'      => array('type' => 'string', 'default' => 'Explore our collection of handcrafted sculptures or speak with our atelier team about finding a piece that feels right for you.'),
            'primaryBtnText'   => array('type' => 'string', 'default' => 'EXPLORE COLLECTION +'),
            'primaryBtnUrl'    => array('type' => 'string', 'default' => ''),
            'secondaryBtnText' => array('type' => 'string', 'default' => 'CONTACT OUR ATELIER'),
            'secondaryBtnUrl'  => array('type' => 'string', 'default' => ''),
        ),
    ));

    /* =========================================================================
       CATALOG / SHOP PAGE BLOCKS
       ========================================================================= */

    // 15. Catalog Hero & Controls Block
    register_block_type('shrestha/catalog-hero', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_catalog_hero',
        'attributes'      => array(
            'badgeText'      => array('type' => 'string',  'default' => 'SACRED COLLECTION • PATAN ATELIER'),
            'title'          => array('type' => 'string',  'default' => 'The Consecrated Specimen Catalog'),
            'titleHighlight' => array('type' => 'string',  'default' => ''),
            'description'    => array('type' => 'string',  'default' => 'Each deity statue is individually sculpted in lost-wax, smelted in ritual Ashtadhatu 8-metal alloy, and finished in 24K mercury fire-gilding.'),
            'showSearch'     => array('type' => 'boolean', 'default' => true),
            'showSort'       => array('type' => 'boolean', 'default' => true),
        ),
    ));

    // 16. Catalog Specimen Grid Block
    register_block_type('shrestha/catalog-grid', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_catalog_grid',
        'attributes'      => array(
            'columns'         => array('type' => 'string',  'default' => '3'),
            'showFilterPills' => array('type' => 'boolean', 'default' => true),
            'postsPerPage'    => array('type' => 'number',  'default' => -1),
        ),
    ));

    // 17. Catalog Bespoke Commission Block
    register_block_type('shrestha/catalog-commission', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_catalog_commission',
        'attributes'      => array(
            'kicker'           => array('type' => 'string', 'default' => 'BESPOKE COMMISSIONS'),
            'title'            => array('type' => 'string', 'default' => 'Commission a Sacred Specimen '),
            'titleHighlight'   => array('type' => 'string', 'default' => 'for Temples & Altars.'),
            'description'      => array('type' => 'string', 'default' => 'Collaborate directly with our master Newar sculptors to create tailor-made deity manifestations with custom iconometric dimensions, consecrated hollow chambers, and pure 8-metal Ashtadhatu formulations.'),
            'primaryBtnText'   => array('type' => 'string', 'default' => 'REQUEST BESPOKE COMMISSION'),
            'primaryBtnUrl'    => array('type' => 'string', 'default' => ''),
            'secondaryBtnText' => array('type' => 'string', 'default' => 'SPEAK WITH ATELIER'),
            'secondaryBtnUrl'  => array('type' => 'string', 'default' => ''),
        ),
    ));

    /* =========================================================================
       CONTACT US PAGE BLOCKS
       ========================================================================= */

    // 18. Contact Hero Block
    register_block_type('shrestha/contact-hero', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_contact_hero',
        'attributes'      => array(
            'badgeText'      => array('type' => 'string', 'default' => 'ATELIER CONCIERGE • PATAN SHOWROOM'),
            'title'          => array('type' => 'string', 'default' => 'Commission a Sacred Masterpiece'),
            'titleHighlight' => array('type' => 'string', 'default' => ''),
            'description'    => array('type' => 'string', 'default' => 'Inquire about existing consecrated specimens or initiate a bespoke temple casting with our 8th-generation Newar master sculptors.'),
        ),
    ));

    // 19. Contact Section (Showroom Info & Inquiry Form)
    register_block_type('shrestha/contact-section', array(
        'editor_script'   => 'shrestha-core-editor-js',
        'editor_style'    => 'shrestha-core-editor-css',
        'render_callback' => 'shrestha_core_render_contact_section',
        'attributes'      => array(
            'showroomTitle'   => array('type' => 'string', 'default' => 'Patan Showroom & Foundry'),
            'address'         => array('type' => 'string', 'default' => ''),
            'phone'           => array('type' => 'string', 'default' => ''),
            'whatsapp'        => array('type' => 'string', 'default' => ''),
            'email'           => array('type' => 'string', 'default' => ''),
            'hours'           => array('type' => 'string', 'default' => ''),
            'mapUrl'          => array('type' => 'string', 'default' => ''),
            'formKicker'      => array('type' => 'string', 'default' => 'BESPOKE INQUIRY'),
            'formTitle'       => array('type' => 'string', 'default' => 'Initiate Commission Dialogue'),
            'formDescription' => array('type' => 'string', 'default' => 'Our Master Curator coordinates directly with patrons, temples, and collectors worldwide to design and cast bespoke sacred iconography.'),
            'submitBtnText'   => array('type' => 'string', 'default' => 'Transmit Commission Protocol'),
        ),
    ));
}
add_action('init', 'shrestha_core_register_blocks');

/**
 * Render Callbacks - Front Page
 */
function shrestha_core_render_hero_specimen($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/hero-specimen.php';
    return ob_get_clean();
}

function shrestha_core_render_infinite_ticker($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/infinite-ticker.php';
    return ob_get_clean();
}

function shrestha_core_render_newly_consecrated($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/newly-consecrated.php';
    return ob_get_clean();
}

function shrestha_core_render_lost_wax_process($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/lost-wax-process.php';
    return ob_get_clean();
}

function shrestha_core_render_master_artisans($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/master-artisans.php';
    return ob_get_clean();
}

function shrestha_core_render_patron_testimonials($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/patron-testimonials.php';
    return ob_get_clean();
}

/**
 * Render Callbacks - About Us Page
 */
function shrestha_core_render_about_hero($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-hero.php';
    return ob_get_clean();
}

function shrestha_core_render_about_story($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-story.php';
    return ob_get_clean();
}

function shrestha_core_render_about_heritage($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-heritage.php';
    return ob_get_clean();
}

function shrestha_core_render_about_artisans($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-artisans.php';
    return ob_get_clean();
}

function shrestha_core_render_about_materials($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-materials.php';
    return ob_get_clean();
}

function shrestha_core_render_about_philosophy($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-philosophy.php';
    return ob_get_clean();
}

function shrestha_core_render_about_atelier($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-atelier.php';
    return ob_get_clean();
}

function shrestha_core_render_why_choose_us($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/why-choose-us.php';
    return ob_get_clean();
}

function shrestha_core_render_about_cta($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/about-cta.php';
    return ob_get_clean();
}

/**
 * Render Callbacks - Catalog / Shop Page
 */
function shrestha_core_render_catalog_hero($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/catalog-hero.php';
    return ob_get_clean();
}

function shrestha_core_render_catalog_grid($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/catalog-grid.php';
    return ob_get_clean();
}

function shrestha_core_render_catalog_commission($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/catalog-commission.php';
    return ob_get_clean();
}

/**
 * Render Callbacks - Contact Us Page
 */
function shrestha_core_render_contact_hero($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/contact-hero.php';
    return ob_get_clean();
}

function shrestha_core_render_contact_section($attributes, $content) {
    ob_start();
    include SHRESTHA_CORE_PATH . 'templates/contact-section.php';
    return ob_get_clean();
}


