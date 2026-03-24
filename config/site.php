<?php

return [
    'map_url' => env('SITE_MAP_URL', 'https://maps.app.goo.gl/mnDFkDWzPoZVq8hk7'),
    'whatsapp' => env('SITE_WHATSAPP', '7200600122'),
    'phone_secondary' => env('SITE_PHONE_SECONDARY', '8838451331'),
    'addresses' => [
        [
            'label' => 'Chennai (Head office)',
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
