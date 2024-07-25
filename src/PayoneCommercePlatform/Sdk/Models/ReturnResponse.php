<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description This object represents the response for a return request, including the payment response and the updated shopping cart.
 */
class ReturnResponse
{
    /**
     * @var RefundPaymentResponse|null The response for the refund payment.
     */
    #[SerializedName('returnPaymentResponse')]
    protected ?RefundPaymentResponse $returnPaymentResponse;

    /**
     * @var ShoppingCartResult|null The updated shopping cart.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartResult $shoppingCart;

    public function __construct(
        ?RefundPaymentResponse $returnPaymentResponse = null,
        ?ShoppingCartResult $shoppingCart = null
    ) {
        $this->returnPaymentResponse = $returnPaymentResponse;
        $this->shoppingCart = $shoppingCart;
    }

    // Getters and Setters
    public function getReturnPaymentResponse(): ?RefundPaymentResponse
    {
        return $this->returnPaymentResponse;
    }

    public function setReturnPaymentResponse(?RefundPaymentResponse $returnPaymentResponse): self
    {
        $this->returnPaymentResponse = $returnPaymentResponse;
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
