<?php

namespace ConnectProf\App\Model\Ebay\Inventory\Offer;

class OfferFactory
{
    public $products = [];

    public function createOfferModel(
        string $sku,
        string $marketplaceId,
        string $format,
        int $availableQuantity,
        string $categoryId,
        string $listingDescription,
        string $merchantLocationKey,
        int $quantityLimitPerBuyer,
        bool $includeCatalogProductDetails
    ): OfferExtra
    {
        $request = [
            'sku' => $sku,
            'marketplaceId' => $marketplaceId,
            'format' => $format,
            'availableQuantity' => $availableQuantity,
            'categoryId' => $categoryId,
            'listingDescription' => $listingDescription,
            'merchantLocationKey' => $merchantLocationKey,
            'quantityLimitPerBuyer' => $quantityLimitPerBuyer,
            'includeCatalogProductDetails' => $includeCatalogProductDetails
        ];
        return new OfferExtra($request, $this);
    }

    public function getOfferModel(): array
    {
        return $this->products;
    }
}