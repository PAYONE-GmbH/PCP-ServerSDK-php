<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CreatePaymentIntentResponse
{
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartData $shoppingCart;
    #[SerializedName('paymentIntentOutput')]
    protected ?PaymentIntentOutput $paymentIntentOutput;

    public function __construct(?ShoppingCartData $shoppingCart = null, ?PaymentIntentOutput $paymentIntentOutput = null)
    {
        $this->shoppingCart = $shoppingCart;
        $this->paymentIntentOutput = $paymentIntentOutput;
    }

    public function getShoppingCart(): ?ShoppingCartData
    {
        return $this->shoppingCart;
    }
    public function setShoppingCart(?ShoppingCartData $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
        return $this;
    }
    public function getPaymentIntentOutput(): ?PaymentIntentOutput
    {
        return $this->paymentIntentOutput;
    }
    public function setPaymentIntentOutput(?PaymentIntentOutput $paymentIntentOutput): self
    {
        $this->paymentIntentOutput = $paymentIntentOutput;
        return $this;
    }
}
