<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CancelPaymentResponse
{
    /**
     * @var PaymentResponsePayment related properties.
     */
    #[SerializedName('payment')]
    protected ?PaymentResponse $payment;

    public function __construct(
        PaymentResponse $payment,
    ) {
        $this->payment = $payment;
    }

    // Getters and Setters
    public function getPayment(): PaymentResponse
    {
        return $this->payment;
    }

    public function setPayment(PaymentResponse $payment): self
    {
        $this->payment = $payment;
        return $this;
    }
}
