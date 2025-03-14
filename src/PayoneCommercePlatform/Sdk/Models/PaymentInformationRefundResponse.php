<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PaymentInformationRefundResponse
{
    /**
     * @var PayoutResponse
     */
    #[SerializedName('payment')]
    private PayoutResponse $payment;

    /**
     * @var string
     */
    #[SerializedName('paymentExecutionId')]
    private string $paymentExecutionId;

    public function __construct(
        PayoutResponse $payment,
        string $paymentExecutionId
    ) {
        $this->payment = $payment;
        $this->paymentExecutionId = $paymentExecutionId;
    }

    // Getters and Setters
    public function getPayment(): PayoutResponse
    {
        return $this->payment;
    }

    public function setPayment(PayoutResponse $payment): self
    {
        $this->payment = $payment;
        return $this;
    }


    public function getPaymentExecutionId(): string
    {
        return $this->paymentExecutionId;
    }

    public function setPaymentExecutionId(string $paymentExecutionId): self
    {
        $this->paymentExecutionId = $paymentExecutionId;
        return $this;
    }
}
