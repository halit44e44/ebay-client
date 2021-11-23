<?php

namespace ConnectProf\App\Model\Ebay;

use ConnectProf\App\Model\Ebay\Account\Policy;
use ConnectProf\App\Model\Ebay\Inventory\Location\Location;
use ConnectProf\App\Model\Ebay\Inventory\Product;
use ConnectProf\App\Model\Ebay\Helpers\Helper;
use ConnectProf\App\Model\Ebay\Http\Request;

class Ebay implements Constants
{
    use Helper;

    protected $information = [
        'loginRequired' => true,
        'grantType' => '',
        'code' => '',
        'country' => '',
        'marketPlaceId' => '',
        'token' => '',
        'refreshToken' => '',
        'expiresIn' => ''
    ];

    public $product;
    public $location;
    public $account;

    /**
     * @param string $grantType
     * @param string $code
     * @param int $country
     * @param string|null $token
     * @param string|null $refreshToken
     * @param int|null $expireIn
     */
    public function __construct(string $grantType, string $code, int $country, string $token = '', string $refreshToken = '', int $expireIn = 0)
    {
        $this->setInformation($grantType, $code, $token, $refreshToken, $expireIn);
        $this->countryCode($country);

        if ($this->information['loginRequired']) {
            $this->getAccessToken();
        }

        $this->product = new Product($this->information);
        $this->location = new Location($this->information);
        $this->account = new Policy($this->information);
    }

    public function getAuthInformation(): array
    {
        return $this->information;
    }

    private function setInformation(string $grantType, string $code, string $token, string $refreshToken, int $expireIn)
    {
        $this->information['grantType'] = $grantType;
        if (!empty($code)) {
            $this->information['code'] = $code;
        }

        if (!empty($token)) {
            $this->information['loginRequired'] = false;
            $this->information['token'] = $token;
            $this->information['refreshToken'] = $refreshToken;
            $this->information['expiresIn'] = $expireIn;
        }
    }

    public function getAccessToken()
    {
        $request = new Request();
        $response = $request->send(self::ENDPOINTS['auth']['getAccessToken']['method'], self::ENDPOINTS['auth']['getAccessToken']['uri'], [
            'single' => true,
            'raw' => true,
            'form_data' => [
                'grant_type' => $this->information['grantType'],
                'code' => $this->information['code'],
                'redirect_uri' => 'Halit_DO_AN-HalitDOA-Connec-wveocptp'
            ],
            'header' => [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic SGFsaXRET0EtQ29ubmVjdFAtU0JYLTIyY2M5NGJkMi05ZjMyYjk3YzpTQlgtMmNjOTRiZDJiYmRiLWU2MDItNDkzMS05ZmEwLTMyNjE='
            ]
        ]);

//        print_r($response->getObject()); die;

        if (empty($response->getObject()->error)) {
            $this->information['loginRequired'] = false;
            $this->information['token'] = $response->getObject()->access_token;
            $this->information['refreshToken'] = $response->getObject()->refresh_token;
            $this->information['expiresIn'] = $response->getObject()->expires_in;
        }
    }

    public function __destruct()
    {
        unset($this->product);
    }

}
