<?php

namespace ConnectProf\App\Model\Ebay\Features;

trait Helper
{
    public function countryCode(int $country)
    {
        switch ($country) {
            case 100:
            case 0:
                $this->information['country'] = "en-US";
                $this->information['marketPlaceId'] = "EBAY_US";
                break;
            case 2:
                $this->information['country'] = "en-CA";
                $this->information['marketPlaceId'] = "EBAY_CA";
                break;
            case 3:
                $this->information['country'] = "en-GB";
                $this->information['marketPlaceId'] = "EBAY_GB";
                break;
            case 77:
                $this->information['country'] = "de-DE";
                $this->information['marketPlaceId'] = "EBAY_DE";
                break;
            default:
                echo "Country code is incorrect";
        }
    }
}