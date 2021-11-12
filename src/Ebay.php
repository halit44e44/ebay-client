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

        if (!empty($token)) {
            $this->information['loginRequired'] = false;
            $this->information['code'] = $code;
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
            'raw' => false,
            'form_data' => [
                'grant_type' => $this->information['grantType'],
                'code' => $this->information['code'],
                'redirect_uri' => 'O_uzcan_zdemir-Ouzcanzd-connec-amsnxgd'
            ]
        ]);

        //[error] => invalid_request
        $this->information['loginRequired'] = false;
        $this->information['token'] = "r32r32";
        $this->information['refreshToken'] = "rewrewrew";
        $this->information['expiresIn'] = 1700;
//
//        $this->information['loginRequired'] = false;
//        $this->information['token'] = $response->getObject()->access_token;
//        $this->information['refreshToken'] = $response->getObject()->refresh_token;
//        $this->information['expiresIn'] = $response->getObject()->expires_in;
    }

    public function __destruct()
    {
        unset($this->product);
    }

}
