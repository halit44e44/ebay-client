<?php

require_once 'vendor/autoload.php';
$getCode = 'https://auth.sandbox.ebay.com/oauth2/authorize?client_id=Ouzcanzd-connectp-SBX-4fa91919d-0b5baca4&response_type=code&redirect_uri=O_uzcan_zdemir-Ouzcanzd-connec-amsnxgd&scope=https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.inventory.readonly&prompt=login';


$code = 'v^1.1#i^1#r^1#I^3#p^3#f^0#t^Ul41XzA6MTQ1MTk1OEVCRUUyNThCREExRERENjRCQkRCRDc5N0FfMF8xI0VeMTI4NA==';
$token = 'v^1.1#i^1#I^3#r^0#p^3#f^0#t^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';
$refreshToken = 'v^1.1#i^1#p^3#f^0#I^3#r^1#t^Ul4xMF82OjdFMjQyNTFGMUUyMTZCNDRBQkM4Mzg1M0VFMTQ1OTVBXzFfMSNFXjEyODQ=';

//$ebay = new \ConnectProf\App\Model\Ebay\Ebay('authorization_code', $code, 0);
//print_r($ebay->getAuthInformation());die;


$ebay = new \ConnectProf\App\Model\Ebay\Ebay('authorization_code', $code, 0, $token, $refreshToken, '7200');
//print_r($ebay->product->getAllCategories(0)); die;
//print_r($ebay->product->getCategoryById(0,99)); die;
//print_r($ebay->product->getAllVariants(0,854));
//print_r($ebay->location->getAllLocation()); die;
//print_r($ebay->account->getPaymentPolicy()); die;
//print_r($ebay->account->getReturnPolicy()); die;
//print_r($ebay->account->getFulfillmentPolicy()); die;
//print_r($ebay->offer->getOffers('ConnectProfTr')); die;
print_r($ebay->offer->publishOffer(81868630101)); die;

//$ebay->offer->createOfferModel(
//    'ConnectProfTr',
//    'EBAY_US',
//    'FIXED_PRICE',
//    75,
//    '30120',
//    'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
//    'halitadres',
//    2,
//    true
//)->pricingAndPolicies(
//    '6193630000',
//    '6193635000',
//    '432432432',
//    ['currency' => 'USD', 'value' => '272']
//);
//
//print_r($ebay->offer->createOffer()); die;

//$ebay->offer->createOfferModel(
//    'ConnectProfTr',
//    'EBAY_US',
//    'FIXED_PRICE',
//    75,
//    '30120',
//    'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
//    'halitadres',
//    2,
//    true
//)->pricingAndPolicies(
//    '6193630000',
//    '6193635000',
//    '222222',
//    ['currency' => 'USD', 'value' => '272']
//);
//
//print_r($ebay->offer->updateOffer(8186865010)); die;


//$ebay->product->createProductModel(
//    'REPOHALO',
//    'NEW',
//    'Bu alan açıklama içindir',
//    'en_US'
//)->addAvailability(
//    ["unit" => "DAY", "value" => "10"],
//    'Autoooohooo2',
//    '20',
//    '5'
//)->addPackageWeightAndSize(
//    '5',
//    '5',
//    'CENTIMETER',
//    '10',
//    'LETTER',
//    ['unit' => "KILOGRAM", "value" => "2"]
//)->addProduct(
//    'Go Pro',
//    'Go Pro Description',
//    'ean',
//    'epid',
//    'https://www.pixsy.com/wp-content/uploads/2021/04/ben-sweet-2LowviVHZ-E-unsplash-1.jpeg',
//    'isbn',
//    'mpn',
//    'sub title alanı',
//    'Başlık alanı',
//    'upc'
//);
//
//print_r($ebay->product->createProduct());