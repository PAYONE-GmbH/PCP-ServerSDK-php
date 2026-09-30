<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * Details for updating a payment intent.
 */
class PatchPaymentIntentRequest
{
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartData $shoppingCart;

    public function __construct(?AmountOfMoney $amountOfMoney = null, ?ShoppingCartData $shoppingCart = null)
    {
        $this->amountOfMoney = $amountOfMoney;
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
