<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class RedirectPaymentMethodSpecificOutputForIntent
{
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;
    #[SerializedName('paymentProduct840SpecificOutput')]
    protected ?PaymentProduct840SpecificOutputForIntent $paymentProduct840SpecificOutput;

    public function __construct(?int $paymentProductId = null, ?PaymentProduct840SpecificOutputForIntent $paymentProduct840SpecificOutput = null)
    {
        $this->paymentProductId = $paymentProductId;
        $this->paymentProduct840SpecificOutput = $paymentProduct840SpecificOutput;
    }

    public function getPaymentProductId(): ?int
    {
        return $this->paymentProductId;
    }
    public function setPaymentProductId(?int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }
    public function getPaymentProduct840SpecificOutput(): ?PaymentProduct840SpecificOutputForIntent
    {
        return $this->paymentProduct840SpecificOutput;
    }
    public function setPaymentProduct840SpecificOutput(?PaymentProduct840SpecificOutputForIntent $paymentProduct840SpecificOutput): self
    {
        $this->paymentProduct840SpecificOutput = $paymentProduct840SpecificOutput;
        return $this;
    }
}
