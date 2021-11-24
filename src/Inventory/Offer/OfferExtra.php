<?php

namespace ConnectProf\App\Model\Ebay\Inventory\Offer;


class OfferExtra
{
    public $product;
    public $offerFactory;

    public function __construct(array $product, OfferFactory $offerFactory)
    {
        $this->offerFactory = $offerFactory;
        $this->product = $product;
    }

    public function pricingAndPolicies(
        string $fulfillmentPolicyId,
        string $paymentPolicyId,
        string $returnPolicyId,
        array  $currency
    ): OfferExtra
    {
        $listingPolicies = [
            'fulfillmentPolicyId' => $fulfillmentPolicyId,
            'paymentPolicyId' => $paymentPolicyId,
            'returnPolicyId' => $returnPolicyId
        ];

        $pricingSummary = [
            'listingPolicies' => $listingPolicies,
            'pricingSummary' => [
                'price' => $currency
            ]
        ];
        $array = array_merge($this->product, $pricingSummary);
        $this->product = $array;
        return $this;
    }

    public function __destruct()
    {
        array_push($this->offerFactory->products, $this->product);
    }
}