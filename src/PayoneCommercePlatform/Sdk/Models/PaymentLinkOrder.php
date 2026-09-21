<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentLinkOrder
{
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;
    #[SerializedName('amount')]
    protected ?AmountOfMoney $amount;

    public function __construct(?string $merchantReference = null, ?AmountOfMoney $amount = null)
    {
        $this->merchantReference = $merchantReference;
        $this->amount = $amount;
    }

    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }
    public function setMerchantReference(?string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }
    public function getAmount(): ?AmountOfMoney
    {
        return $this->amount;
    }
    public function setAmount(?AmountOfMoney $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
}
