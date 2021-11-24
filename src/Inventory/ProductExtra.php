<?php

namespace ConnectProf\App\Model\Ebay\Inventory;

class ProductExtra
{
    public $product;
    public $productFactory;

    public function __construct(array $product, ProductFactory $productFactory)
    {
        $this->productFactory = $productFactory;
        $this->product = $product;
    }

    public function addAvailability(
        array  $fulfillmentTime,
        string $merchantLocationKey,
        int    $quantity,
        int    $packagesQuantity
    ): ProductExtra
    {
        $availabilityDistributions[] = [
            'fulfillmentTime' => $fulfillmentTime,
            'merchantLocationKey' => $merchantLocationKey,
            'quantity' => $quantity
        ];

        $shipToLocationAvailability = [
            'availabilityDistributions' => $availabilityDistributions,
            'quantity' => $packagesQuantity
        ];

        $this->product['availability']['shipToLocationAvailability'] = $shipToLocationAvailability;

        return $this;
    }

    public function addPackageWeightAndSize(
        int    $height,
        int    $length,
        string $unit,
        int    $with,
        string $packageType,
        array  $weight
    ): ProductExtra
    {
        $packageWeightAndSize = [
            'dimensions' => [
                'height' => $height,
                'length' => $length,
                'unit' => $unit,
                'with' => $with
            ],
            'packageType' => $packageType,
            'weight' => $weight
        ];
        $this->product['packageWeightAndSize'] = $packageWeightAndSize;

        return $this;
    }

    public function addProduct(
        string $brand,
        string $description,
        string $ean,
        string $epid,
        string $imageUrls,
        string $isbn,
        string $mpn,
        string $subtitle,
        string $title,
        string $upc
    ): ProductExtra
    {
        $product = [
            'aspects' => [
                'Brand' => [
                    "Apple"
                ]
            ],
            'brand' => $brand,
            'description' => $description,
            'ean' => [
                $ean
            ],
            'epid' => $epid,
            'imageUrls' => [
                $imageUrls
            ],
            'isbn' => [
                $isbn
            ],
            'mpn' => $mpn,
            'subtitle' => $subtitle,
            'title' => $title,
            'upc' => [
                $upc
            ]
        ];
        $this->product['product'] = $product;

        return $this;
    }

    public function __destruct()
    {
        array_push($this->productFactory->products['requests'], $this->product);
    }


}