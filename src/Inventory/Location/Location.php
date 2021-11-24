<?php

namespace ConnectProf\App\Model\Ebay\Inventory\Location;

use ConnectProf\App\Model\Ebay\Constants;
use ConnectProf\App\Model\Ebay\Http\Request;

class Location
{
    private $information;
    private $request;

    public function __construct(array $information)
    {
        $this->request = new Request();
        $this->information = $information;
    }

    public function getAllLocation(): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['getAllLocation']['method'], Constants::ENDPOINTS['product']['getAllLocation']['uri'], [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }
}