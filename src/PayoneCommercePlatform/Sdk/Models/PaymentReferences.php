<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object that holds all reference properties that are linked to this transaction.
 */
class PaymentReferences
{
    /**
     * @var string Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes.
     */
    #[SerializedName('merchantReference')]
    protected string $merchantReference;

    public function __construct(
        string $merchantReference,
    ) {
        $this->merchantReference = $merchantReference;
    }

    // Getters and Setters
    public function getMerchantReference(): string
    {
        return $this->merchantReference;
    }

    public function setMerchantReference(string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }
}
