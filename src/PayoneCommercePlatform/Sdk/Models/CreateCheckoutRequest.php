<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CheckoutReferences;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartInput;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use DateTime;

/**
 * @description Request to create a Checkout for a Commerce Case. The payment for the Checkout can be directly executed if autoExecuteOrder = true. In this case, the paymentMethodSpecificInput must be provided and only a full order is possible. If no amountOfMoney is provided, the platform will calculate the respective Checkout amount based on the cartItem productPrice and quantity. In case of a payment error, the payment can be retried by providing the respective commerceCaseId and checkoutId to the the Order or Payment Execution endpoint.
 */
class CreateCheckoutRequest
{
    /**
     * @var AmountOfMoney|null The amount of money for the checkout.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var CheckoutReferences|null References for the checkout.
     */
    #[SerializedName('references')]
    protected ?CheckoutReferences $references;

    /**
     * @var Shipping|null Shipping information for the checkout.
     */
    #[SerializedName('shipping')]
    protected ?Shipping $shipping;

    /**
     * @var ShoppingCartInput|null Shopping cart data for the checkout.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartInput $shoppingCart;

    /**
     * @var OrderRequest|null Order request details.
     */
    #[SerializedName('orderRequest')]
    protected ?OrderRequest $orderRequest;

    /**
     * @var DateTime|null Creation date and time of the checkout in RFC3339 format.
     */
    #[SerializedName('creationDateTime')]
    protected ?DateTime $creationDateTime;

    /**
     * @var bool Set this flag to directly execute a payment when creating a Commerce Case or Checkout.
     * If the value for autoExecuteOrder is set to true, the paymentMethodSpecificInput for the order is mandatory and has to be provided. The autoExecuteOrder can only be used for orderType = full.
     * If no shoppingCart information has been provided, a Payment Execution will be created instead of an Order. As a consequence, only Payment Execution endpoints can be used.
     */
    #[SerializedName('autoExecuteOrder')]
    protected bool $autoExecuteOrder;

    public function __construct(
        ?CheckoutReferences $references = null,
        ?AmountOfMoney $amountOfMoney = null,
        ?Shipping $shipping = null,
        ?ShoppingCartInput $shoppingCart = null,
        ?OrderRequest $orderRequest = null,
        ?DateTime $creationDateTime = null,
        bool $autoExecuteOrder = false
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->shipping = $shipping;
        $this->shoppingCart = $shoppingCart;
        $this->orderRequest = $orderRequest;
        $this->creationDateTime = $creationDateTime;
        $this->autoExecuteOrder = $autoExecuteOrder;
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

    public function getReferences(): ?CheckoutReferences
    {
        return $this->references;
    }

    public function setReferences(?CheckoutReferences $references): self
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

    public function getOrderRequest(): ?OrderRequest
    {
        return $this->orderRequest;
    }

    public function setOrderRequest(?OrderRequest $orderRequest): self
    {
        $this->orderRequest = $orderRequest;
        return $this;
    }

    public function getCreationDateTime(): ?DateTime
    {
        return $this->creationDateTime;
    }

    public function setCreationDateTime(?DateTime $creationDateTime): self
    {
        $this->creationDateTime = $creationDateTime;
        return $this;
    }

    public function isAutoExecuteOrder(): bool
    {
        return $this->autoExecuteOrder;
    }

    public function setAutoExecuteOrder(bool $autoExecuteOrder): self
    {
        $this->autoExecuteOrder = $autoExecuteOrder;
        return $this;
    }
}
