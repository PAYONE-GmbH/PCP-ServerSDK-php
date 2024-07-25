<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Order object containing order related data. Please note that this object is required to be able to submit the amount.
 */
class Order
{
    /**
     * @var AmountOfMoney|null The amount of money for the order.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var Customer|null The customer details.
     */
    #[SerializedName('customer')]
    protected ?Customer $customer;

    /**
     * @var References The order references.
     */
    #[SerializedName('references')]
    protected References $references;

    /**
     * @var Shipping|null The shipping details.
     */
    #[SerializedName('shipping')]
    protected ?Shipping $shipping;

    /**
     * @var ShoppingCartInput|null The shopping cart details.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartInput $shoppingCart;

    public function __construct(
        ?AmountOfMoney $amountOfMoney = null,
        ?Customer $customer = null,
        References $references,
        ?Shipping $shipping = null,
        ?ShoppingCartInput $shoppingCart = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->customer = $customer;
        $this->references = $references;
        $this->shipping = $shipping;
        $this->shoppingCart = $shoppingCart;
    }

    // Getters and Setters
    public function getAmountOfMoney(): ?AmountOfMoney
    {
        return $this->amountOfMoney;
    }

    public function setAmountOfMoney(?AmountOfMoney $amountOfMoney): self
    {
        $this->amountOfMoney = $amountOfMoney;
        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function getReferences(): References
    {
        return $this->references;
    }

    public function setReferences(References $references): self
    {
        $this->references = $references;
        return $this;
    }

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function setShipping(?Shipping $shipping): self
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function getShoppingCart(): ?ShoppingCartInput
    {
        return $this->shoppingCart;
    }

    public function setShoppingCart(?ShoppingCartInput $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
        return $this;
    }
}
