<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CancelResponse
{
    /**
     * @var CancelPaymentResponse|null Response details of the canceled payment.
     */
    #[SerializedName('cancelPaymentResponse')]
    protected ?CancelPaymentResponse $cancelPaymentResponse;

    /**
     * @var ShoppingCartResult|null Details of the shopping cart.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartResult $shoppingCart;

    public function __construct(
        ?CancelPaymentResponse $cancelPaymentResponse = null,
        ?ShoppingCartResult $shoppingCart = null
    ) {
        $this->cancelPaymentResponse = $cancelPaymentResponse;
        $this->shoppingCart = $shoppingCart;
    }

    // Getters and Setters
    public function getCancelPaymentResponse(): ?CancelPaymentResponse
    {
        return $this->cancelPaymentResponse;
    }

    public function setCancelPaymentResponse(?CancelPaymentResponse $cancelPaymentResponse): self
    {
        $this->cancelPaymentResponse = $cancelPaymentResponse;
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
