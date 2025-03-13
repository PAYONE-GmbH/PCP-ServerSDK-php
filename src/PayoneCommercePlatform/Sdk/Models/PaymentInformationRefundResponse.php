<?php

namespace PayoneCommercePlatform\Sdk\Models;

class PaymentInformationRefundResponse
{
    /**
     * @var PayoutResponse
     */
    private $payment;

    /**
     * @var string
     */
    private $paymentExecutionId;

    public function __construct(
        PayoutResponse $payment,
        string $paymentExecutionId
    ) {
        $this->payment = $payment;
        $this->paymentExecutionId = $paymentExecutionId;
    }

    /**
     * @return PayoutResponse
     */
    public function getPayment(): PayoutResponse
    {
        return $this->payment;
    }

    /**
     * @return string
     */
    public function getPaymentExecutionId(): string
    {
        return $this->paymentExecutionId;
    }
}
