<?php

namespace ConnectProf\App\Model\Ebay;

interface Constants
{
    const DEBUG = false;
    const INVENTORY_URL = "https://api.sandbox.ebay.com/sell/inventory/v1/";
    const LOGIN_URL = "https://api.sandbox.ebay.com/identity/v1/oauth2/token";
    const CATEGORY_URL = "https://api.sandbox.ebay.com/commerce/taxonomy/v1/category_tree/";
    const ACCOUNT_URL = "https://api.sandbox.ebay.com/sell/account/v1/";

    const ENDPOINTS = [
        'auth' => [
            'getCode' => [
                'method' => 'GET',
                'uri' => 'https://auth.sandbox.ebay.com/oauth2/authorize'
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
            'getAllCategories' => [ //getCategoryTree - getCategorySubtree or getItemAspectsForCategory
                'method' => 'GET',
                'uri' => self::CATEGORY_URL
            ],
            'inventoryItem' => [
                'method' => 'GET',
                'uri' => self::INVENTORY_URL . 'inventory_item'
            ],
            'bulkCreateOrReplaceInventoryItem' => [
                'method' => 'POST',
                'uri' => self::INVENTORY_URL . 'bulk_create_or_replace_inventory_item'
            ],
            'getAllLocation' => [
                'method' => 'GET',
                'uri' => self::INVENTORY_URL . 'location'
            ],
            'createOffer' => [ //publishOffer
                'method' => 'POST',
                'uri' => self::INVENTORY_URL . 'offer'
            ],
            'updateOffer' => [
                'method' => 'PUT',
                'uri' => self::INVENTORY_URL . 'offer/'
            ],
            'getOffers' => [
                'method' => 'GET',
                'uri' => self::INVENTORY_URL . 'offer'
            ]
        ],

        'account' => [
            'getPaymentPolicy' => [
                'method' => 'GET',
                'uri' => self::ACCOUNT_URL . 'payment_policy',
            ],
            'getReturnPolicy' => [
                'method' => 'GET',
                'uri' => self::ACCOUNT_URL . 'return_policy',
            ],
            'getFulfillmentPolicy' => [
                'method' => 'GET',
                'uri' => self::ACCOUNT_URL . 'fulfillment_policy',
            ]
        ]

    ];
}