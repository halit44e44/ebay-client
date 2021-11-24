<?php

namespace ConnectProf\App\Model\Ebay\Account;

use ConnectProf\App\Model\Ebay\Constants;
use ConnectProf\App\Model\Ebay\Http\Request;

class Policy
{
    private $information;
    private $request;

    public function __construct(array $information)
    {
        $this->request = new Request();
        $this->information = $information;
    }

    public function getPaymentPolicy(): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['account']['getPaymentPolicy']['method'], Constants::ENDPOINTS['account']['getPaymentPolicy']['uri'] . '?marketplace_id='. $this->information['marketPlaceId'], [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }

    public function getReturnPolicy(): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['account']['getReturnPolicy']['method'], Constants::ENDPOINTS['account']['getReturnPolicy']['uri'] . '?marketplace_id='. $this->information['marketPlaceId'], [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }

    public function getFulfillmentPolicy(): array
    {
        $response = $this->request->send(Constants::ENDPOINTS['account']['getFulfillmentPolicy']['method'], Constants::ENDPOINTS['account']['getFulfillmentPolicy']['uri'] . '?marketplace_id='. $this->information['marketPlaceId'], [
            'header' => [
                'Authorization:Bearer ' . $this->information['token'],
                'Content-Language:' . $this->information['country'],
                'X-EBAY-C-MARKETPLACE-ID:' . $this->information['marketPlaceId']
            ]
        ]);
        return $response->getArray();
    }
}