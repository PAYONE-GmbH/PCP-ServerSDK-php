<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AmountOfMoney
{
    /**
     * @var int|null Amount in cents and always having 2 decimals
     */
    #[SerializedName('amount')]
    protected ?int $amount;

    /**
     * @var string|null Three-letter ISO currency code representing the currency for the amount
     */
    #[SerializedName('currencyCode')]
    protected ?string $currencyCode;

    public function __construct(
        ?int $amount = null,
        ?string $currencyCode = null
    ) {
        $this->amount = $amount;
        $this->currencyCode = $currencyCode;
    }

    // Getters and Setters
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }
}
