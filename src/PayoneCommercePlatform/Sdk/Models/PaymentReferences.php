<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Object that holds all reference properties that are linked to this transaction.
 */
class PaymentReferences
{
    /**
     * @var string Unique reference of payment transactions, also returned for reporting and reconciliation purposes.
     * For capture requests, providing this value is recommended to support an end-to-end refund flow.
     * If provided for captures or refunds, it must be unique per Checkout.
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
