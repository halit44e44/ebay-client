<?php

namespace ConnectProf\App\Model\Ebay\Features;


use ConnectProf\App\Model\Ebay\Constants;
use ConnectProf\App\Model\Ebay\Http\Request;

class Product
{
    private $information;
    private $request;

    public function __construct(array $information)
    {
        $this->request = new Request();
        $this->information = $information;
    }

    public function getAllInventoryItem(int $country): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['getAllCategory']['method'], Constants::ENDPOINTS['product']['getAllCategory']['uri'] . $country, [
            'header' => [
                'Authorization:Bearer ' . $this->information['token']
            ]
        ]);
        return $response->getArray();
    }

    public function getInventoryItem(int $country, int $id)
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['getAllCategory']['method'], Constants::ENDPOINTS['product']['getAllCategory']['uri'] . $country . '/get_category_subtree?category_id=' . $id, [
            'header' => [
                'Authorization:Bearer ' . $this->information['token']
            ]
        ]);
        return $response->getArray();
    }
}
