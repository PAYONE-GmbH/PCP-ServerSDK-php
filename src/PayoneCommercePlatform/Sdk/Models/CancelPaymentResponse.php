<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentResponse;

class CancelPaymentResponse
{
    /**
     * @var PaymentResponse|null related properties.
     */
    #[SerializedName('payment')]
    protected ?PaymentResponse $payment;

    /**
     * @param PaymentResponse $payment Payment related properties.
     */
    public function __construct(
        ?PaymentResponse $payment = null,
    ) {
        $this->payment = $payment;
    }

    // Getters and Setters
    public function getPayment(): ?PaymentResponse
    {
        return $this->payment;
    }

    public function setPayment(?PaymentResponse $payment = null): self
    {
        $this->payment = $payment;
        return $this;
    }
}
