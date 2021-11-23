<?php

namespace ConnectProf\App\Model\Ebay\Inventory;


use ConnectProf\App\Model\Ebay\Constants;
use ConnectProf\App\Model\Ebay\Http\Request;

class Product extends ProductFactory
{
    private $information;
    private $request;

    public function __construct(array $information)
    {
        $this->request = new Request();
        $this->information = $information;
    }

    public function createProduct(): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['bulkCreateOrReplaceInventoryItem']['method'], Constants::ENDPOINTS['product']['bulkCreateOrReplaceInventoryItem']['uri'], [
            'raw' => true,
            'form_data' => $this->getProductModel(),
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId'],
                'Content-Type:application/json',
                'Accept:application/json'
            ]
        ]);
        return $response->getArray();
    }

    public function getAllCategories(int $country): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['getAllCategories']['method'], Constants::ENDPOINTS['product']['getAllCategories']['uri'] . $country, [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }

    public function getCategoryById(int $country, int $categoryId): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['getAllCategories']['method'], Constants::ENDPOINTS['product']['getAllCategories']['uri'] . $country . '/get_category_subtree?category_id=' . $categoryId, [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }

    public function getAllVariants($country, $categoryId): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['getAllCategories']['method'], Constants::ENDPOINTS['product']['getAllCategories']['uri'] . $country . '/get_item_aspects_for_category?category_id=' . $categoryId, [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }
}
