<?php

return [
    'username' => env('EBILLING_USERNAME', 'Bamboo Assur Voyage'),
    'email' => env('EBILLING_EMAIL', 'nillscorpoation@gmail.com'),
    #'key' => env('EBILLING_KEY', "Qml6ekRldk9sb2h1Yjo5MjkzYzhlNS0xNTNlLTQzOTMtYWZlNS02ZmMyNjYzZDUyN2E="),
    'key' => env('EBILLING_KEY', "46363079-3caf-4cf9-ba59-dcf40b4cd53a"),
    'url' => env('EBILLING_URL','https://stg.billing-easy.com/api/'),
    'version' => 'v1',
    'endpoints' => [
        'invoice' => [
            'show' => [
                'method' => 'GET',
                'uri' => '/merchant/invoices/{invoice_id}'
            ],
            'list' => [
                'method' => 'GET',
                'uri' => '/merchant/e_bills.json',
            ],
            'create' => [
                'method' => 'POST',
                'uri' => '/merchant/e_bills.json',
            ],
        ],
        'ebill' => [
            'send' => [
                'method' => 'PUT',
                'uri' => '/merchant/e_bills/{bill_id}/send.json',
            ],
            'process' => [
                'method' => 'PUT',
                'uri' => 'merchant/e_bills/{bill_id}/process.json'
            ],
        ],
        'ussd' => [
            'send' => [
                'method' => 'POST',
                'uri' => '/merchant/e_bills/{bill_id}/ussd_push',
            ]
        ],
        'refund' => [
            'send' => [
                'method' => 'POST',
                'uri' => '/merchant/e_bills/{bill_id}/refund',
            ]
        ]
    ],
    'expiry' => 70,
    'callback_url' => "/payment-callback",
    'timeout' => 60,
    'payment_url' => "/checkout",
    'type_paiement' => ['AirtelMoney', 'MoovMoney', 'UBA Visa', 'Orabank Visa'],
    'operator' => ['Airtel Gabon', 'Moov Africa Gabon Telecom'],
    'fees' => 0.02
];

