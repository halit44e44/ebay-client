<?php

namespace ConnectProf\App\Model\Ebay;

use ConnectProf\App\Model\Ebay\Features\Product;
use ConnectProf\App\Model\Ebay\Http\Request;

class Ebay implements Constants
{

    protected $information = [
        'loginRequired' => true,
        'grantType' => '',
        'code' => '',
        'token' => '',
        'refreshToken' => '',
        'expiresIn' => ''
    ];

    public $product;

    /**
     * @param string $grantType
     * @param string $code
     * @param string|null $token
     * @param string|null $refreshToken
     * @param int|null $expireIn
     */
    public function __construct(string $grantType, string $code, string $token = '', string $refreshToken = '', int $expireIn = 0)
    {
        $this->setInformation($grantType, $code, $token, $refreshToken, $expireIn);

        if ($this->information['loginRequired']) {
            $this->getAccessToken();
        }

        $this->product = new Product($this->information);
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
            'single' => false,
            'raw' => true,
            'form_data' => [
                'grant_type' => $this->information['grantType'],
                'code' => $this->information['code'],
                'redirect_uri' => 'O_uzcan_zdemir-Ouzcanzd-connec-amsnxgd'
            ],
            'header' => [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic T3V6Y2FuemQtY29ubmVjdHAtU0JYLTRmYTkxOTE5ZC0wYjViYWNhNDpTQlgtZmE5MTkxOWRjZDJmLWViMTEtNDFhMi1hODY4LTA3YzQ='
            ]
        ]);

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
