<?php

/** Used for Google Maps “Directions” (opens turn-by-turn from the user’s location). */
$mainBranchMapDestination = '44/35 Melpatti Road, Kamatchiamman Pet, Gudiyatham 632602, Vellore district, Tamil Nadu, India';

return [
    /** Full URL for inner-page hero photo. If empty, `inner_hero_path` under public_html is used when the file exists. */
    'inner_hero_url' => env('SITE_INNER_HERO_URL'),
    /** Relative to public_html, e.g. images/inner-hero.jpg */
    'inner_hero_path' => env('SITE_INNER_HERO_PATH', 'images/inner-hero.jpg'),

    /** Place / map view (main branch). */
    'map_url' => env('SITE_MAP_URL', 'https://goo.gl/app/maps/mnDFkDWzPoZVq8hk7?g_st=aw&_nr=1'),
    /**
     * Opens Google Maps in directions mode (navigation from current location on phone).
     * @see https://developers.google.com/maps/documentation/urls/get-started#directions-action
     */
    'directions_url' => env(
        'SITE_DIRECTIONS_URL',
        'https://www.google.com/maps/dir/?api=1&destination='.rawurlencode($mainBranchMapDestination),
    ),
    /**
     * Google Maps embed `src` for main branch (site footer).
     * Use SITE_MAP_EMBED_URL in .env to override. If the key is missing or empty, the default below is used
     * (env('KEY', 'default') alone does not fall back when .env has SITE_MAP_EMBED_URL= with no value).
     */
    'map_embed_url' => (static function (): string {
        $default = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.493507014545!2d78.85739537572279!3d12.940241815563773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bad6d49f9902989%3A0xd271de2a0178f82b!2s44%2C%20Melpatti%20Rd%2C%20Bosepet%2C%20Gudiyatham%2C%20Tamil%20Nadu%20632602!5e0!3m2!1sen!2sin!4v1774456740782!5m2!1sen!2sin';
        $fromEnv = env('SITE_MAP_EMBED_URL');

        return (is_string($fromEnv) && $fromEnv !== '') ? $fromEnv : $default;
    })(),
    /** Full URL to donation UPI QR image, e.g. https://yoursite.in/storage/donation-qr.png — overrides file in public_html/images */
    'donation_qr_url' => env('SITE_DONATION_QR_URL'),
    'whatsapp' => env('SITE_WHATSAPP', '7200600122'),
    'phone_secondary' => env('SITE_PHONE_SECONDARY', '8838451331'),
    'addresses' => [
        [
            'label' => 'Main branch — Gudiyatham',
            'lines' => [
                '44/35 Melpatti Road',
                'Kamatchiamman Pet',
                'Gudiyatham 632602',
                'Vellore district',
            ],
        ],
        [
            'label' => 'Chennai',
            'lines' => [
                'Block 4, Door no 275',
                'Mugappair West, Chennai 600037',
            ],
        ],
        [
            'label' => 'Cuddalore district',
            'lines' => [
                'K. Govindarasu',
                'Thethampettu, Srimushnam post',
                'Cuddalore district, 608703',
            ],
        ],
        [
            'label' => 'Dindigul',
            'lines' => [
                'R. Manikandan',
                'Nayakkamar Street, 14th Ward',
                'Ayyampalayam, Dindigul (dt) 624204',
                'Mob: 8838451331',
            ],
        ],
        [
            'label' => 'Coimbatore',
            'lines' => [
                'No. 7 G.P. Garden, Kamadenu Nagar',
                'Avalli, Coimbatore 641041',
            ],
        ],
        [
            'label' => 'Tiruchirappalli',
            'lines' => [
                'Magalir Thayyal Payirchi Maiyam',
                '7/143, West Street, Nadupatti',
                'Vaiyampatti Vali, Manaparai Taluk',
                'Tiruchirappalli District, 621315',
            ],
        ],
    ],
];
