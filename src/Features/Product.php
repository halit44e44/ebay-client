<?php

namespace ConnectProf\App\Model\Ebay\Features;

class Product
{
    private $information;

    public function __construct(array $information)
    {
        $this->information = $information;
    }

    public function getInventoryItem(): array
    {
        return $this->information;
    }
}
