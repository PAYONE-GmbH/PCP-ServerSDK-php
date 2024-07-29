<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing all details that are linked to the Checkout.
 */
class CheckoutReferences
{
    /**
     * @var string|null Unique reference of the Checkout that is also returned for reporting and reconciliation purposes.
     */
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;

    /**
     * @var string|null Optional parameter to define the shop or touchpoint where a sale has been realized (e.g. different stores).
     */
    #[SerializedName('merchantShopReference')]
    protected ?string $merchantShopReference;

    public function __construct(
        ?string $merchantReference = null,
        ?string $merchantShopReference = null
    ) {
        $this->merchantReference = $merchantReference;
        $this->merchantShopReference = $merchantShopReference;
    }

    // Getters and Setters
    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }

    public function setMerchantReference(?string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    public function getMerchantShopReference(): ?string
    {
        return $this->merchantShopReference;
    }

    public function setMerchantShopReference(?string $merchantShopReference): self
    {
        $this->merchantShopReference = $merchantShopReference;
        return $this;
    }
}
