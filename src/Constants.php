<?php

namespace ConnectProf\App\Model\Ebay;

interface Constants
{
    const DEBUG = false;
    const BASE_URL = "https://api.sandbox.ebay.com/sell/inventory/v1/";
    const LOGIN_URL = "https://api.sandbox.ebay.com/identity/v1/oauth2/token";

    const ENDPOINTS = [
        'auth'=> [
            'getCode' => [
                'method' => 'GET',
                'uri'  => 'https://auth.sandbox.ebay.com/oauth2/authorize'
            ],
            'getAccessToken' => [
                'method' => 'POST',
                'uri' => self::LOGIN_URL
            ],
            'refreshToken' => [
                'method' => 'POST',
                'uri' => self::LOGIN_URL
            ]
        ],

        'product' => [
            'inventoryItem' => [
                'method' => 'GET',
                'uri' => self::BASE_URL . 'inventory_item'
            ],
            'bulkCreateOrReplaceInventoryItem' => [
                'method' => 'POST',
                'uri' => self::BASE_URL . 'bulk_create_or_replace_inventory_item'
            ]
        ]
    ];
}