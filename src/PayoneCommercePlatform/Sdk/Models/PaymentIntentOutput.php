<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentIntentOutput extends PaymentIntentResponseData
{
    #[SerializedName('redirectPaymentMethodSpecificOutput')]
    protected ?RedirectPaymentMethodSpecificOutputForCreateIntent $redirectPaymentMethodSpecificOutput;

    public function __construct(?AmountOfMoney $amountOfMoney = null, ?PaymentReferences $references = null, ?string $paymentIntentId = null, ?string $paymentId = null, ?RedirectPaymentMethodSpecificOutputForCreateIntent $redirectPaymentMethodSpecificOutput = null)
    {
        parent::__construct($amountOfMoney, $references, $paymentIntentId, $paymentId);
        $this->redirectPaymentMethodSpecificOutput = $redirectPaymentMethodSpecificOutput;
    }

    public function getRedirectPaymentMethodSpecificOutput(): ?RedirectPaymentMethodSpecificOutputForCreateIntent
    {
        return $this->redirectPaymentMethodSpecificOutput;
    }
    public function setRedirectPaymentMethodSpecificOutput(?RedirectPaymentMethodSpecificOutputForCreateIntent $redirectPaymentMethodSpecificOutput): self
    {
        $this->redirectPaymentMethodSpecificOutput = $redirectPaymentMethodSpecificOutput;
        return $this;
    }
}
