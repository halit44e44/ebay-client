<?php

namespace ConnectProf\App\Model\Ebay\Features;

class ProductFactory
{
    public $products = [
        'requests' => [

        ]
    ];

    public function createProductModel(
        string $sku,
        string $condition,
        string $conditionDescription,
        string $locale
    ): ProductExtra
    {
        $request = [
            'sku' => $sku,
            'condition' => $condition,
            'conditionDescription' => $conditionDescription,
            'locale' => $locale,
        ];
        return new ProductExtra($request, $this);
    }

    public function getProductModel(): array
    {
        return $this->products;
    }
}
