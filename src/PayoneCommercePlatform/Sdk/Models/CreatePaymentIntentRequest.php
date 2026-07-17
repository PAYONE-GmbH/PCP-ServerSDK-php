<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreatePaymentIntentRequest extends CreatePaymentIntent
{
    #[SerializedName('paymentMethodSpecificInput')]
    protected ?PaymentMethodSpecificInputForIntent $paymentMethodSpecificInput;

    public function __construct(?AmountOfMoney $amountOfMoney = null, ?PaymentReferences $references = null, ?ShoppingCartData $shoppingCart = null, ?PaymentMethodSpecificInputForIntent $paymentMethodSpecificInput = null)
    {
        parent::__construct($amountOfMoney, $references, $shoppingCart);
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
    }

    public function getPaymentMethodSpecificInput(): ?PaymentMethodSpecificInputForIntent
    {
        return $this->paymentMethodSpecificInput;
    }
    public function setPaymentMethodSpecificInput(?PaymentMethodSpecificInputForIntent $paymentMethodSpecificInput): self
    {
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
        return $this;
    }
}
