<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartResult;

/**
 * @description Object that contains details on the created payment in case one has been created.
 */
class OrderResponse
{
    /**
     * @var CreatePaymentResponse|null Details on the created payment.
     */
    #[SerializedName('createPaymentResponse')]
    protected ?CreatePaymentResponse $createPaymentResponse;

    /**
     * @var ShoppingCartResult|null Details of the shopping cart.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartResult $shoppingCart;

    public function __construct(
        ?CreatePaymentResponse $createPaymentResponse = null,
        ?ShoppingCartResult $shoppingCart = null
    ) {
        $this->createPaymentResponse = $createPaymentResponse;
        $this->shoppingCart = $shoppingCart;
    }

    // Getters and Setters
    public function getCreatePaymentResponse(): ?CreatePaymentResponse
    {
        return $this->createPaymentResponse;
    }

    public function setCreatePaymentResponse(?CreatePaymentResponse $createPaymentResponse): self
    {
        $this->createPaymentResponse = $createPaymentResponse;
        return $this;
    }

    public function getShoppingCart(): ?ShoppingCartResult
    {
        return $this->shoppingCart;
    }

    public function setShoppingCart(?ShoppingCartResult $shoppingCart): self
    {
        $this->shoppingCart = $shoppingCart;
        return $this;
    }
}
