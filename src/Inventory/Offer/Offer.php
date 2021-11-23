<?php

namespace ConnectProf\App\Model\Ebay\Inventory\Offer;

use ConnectProf\App\Model\Ebay\Constants;
use ConnectProf\App\Model\Ebay\Http\Request;

class Offer extends OfferFactory
{
    private $information;
    private $request;

    public function __construct(array $information)
    {
        $this->request = new Request();
        $this->information = $information;
    }

    public function createOffer(): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['product']['createOffer']['method'], Constants::ENDPOINTS['product']['createOffer']['uri'], [
            'raw' => true,
            'form_data' => $this->getOfferModel()[0],
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
}