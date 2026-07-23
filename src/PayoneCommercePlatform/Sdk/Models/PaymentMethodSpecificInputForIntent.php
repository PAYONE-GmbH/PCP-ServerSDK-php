<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentMethodSpecificInputForIntent
{
    #[SerializedName('redirectPaymentMethodSpecificInput')]
    protected ?RedirectPaymentMethodSpecificInputForIntent $redirectPaymentMethodSpecificInput;

    public function __construct(?RedirectPaymentMethodSpecificInputForIntent $redirectPaymentMethodSpecificInput = null)
    {
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
    }
    public function getRedirectPaymentMethodSpecificInput(): ?RedirectPaymentMethodSpecificInputForIntent
    {
        return $this->redirectPaymentMethodSpecificInput;
    }
    public function setRedirectPaymentMethodSpecificInput(?RedirectPaymentMethodSpecificInputForIntent $redirectPaymentMethodSpecificInput): self
    {
        $this->redirectPaymentMethodSpecificInput = $redirectPaymentMethodSpecificInput;
        return $this;
    }
}
