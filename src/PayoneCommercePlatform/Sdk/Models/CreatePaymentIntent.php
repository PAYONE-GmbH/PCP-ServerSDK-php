<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CreatePaymentIntent
{
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;
    #[SerializedName('references')]
    protected PaymentReferencesForPaymentIntent $references;
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartData $shoppingCart;

    public function __construct(PaymentReferencesForPaymentIntent $references, ?AmountOfMoney $amountOfMoney = null, ?ShoppingCartData $shoppingCart = null)
    {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->shoppingCart = $shoppingCart;
    }

    public function getAmountOfMoney(): ?AmountOfMoney
    {
        return $this->amountOfMoney;
    }
    public function setAmountOfMoney(?AmountOfMoney $amountOfMoney): self
    {
        $this->amountOfMoney = $amountOfMoney;
        return $this;
    }
    public function getReferences(): PaymentReferencesForPaymentIntent
    {
        return $this->references;
    }
    public function setReferences(PaymentReferencesForPaymentIntent $references): self
    {
        $this->references = $references;
        return $this;
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
}
