<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PaymentIntentResponse extends PaymentIntentResponseData
{
    #[SerializedName('redirectPaymentMethodSpecificOutput')]
    protected ?RedirectPaymentMethodSpecificOutputForIntent $redirectPaymentMethodSpecificOutput;

    public function __construct(?AmountOfMoney $amountOfMoney = null, ?PaymentReferences $references = null, ?string $paymentIntentId = null, ?string $paymentId = null, ?RedirectPaymentMethodSpecificOutputForIntent $redirectPaymentMethodSpecificOutput = null)
    {
        parent::__construct($amountOfMoney, $references, $paymentIntentId, $paymentId);
        $this->redirectPaymentMethodSpecificOutput = $redirectPaymentMethodSpecificOutput;
    }

    public function getRedirectPaymentMethodSpecificOutput(): ?RedirectPaymentMethodSpecificOutputForIntent
    {
        return $this->redirectPaymentMethodSpecificOutput;
    }
    public function setRedirectPaymentMethodSpecificOutput(?RedirectPaymentMethodSpecificOutputForIntent $redirectPaymentMethodSpecificOutput): self
    {
        $this->redirectPaymentMethodSpecificOutput = $redirectPaymentMethodSpecificOutput;
        return $this;
    }
}
