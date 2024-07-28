<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CapturePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartResult;

/**
 * @description Response object for the delivery request, containing the capture payment response and the shopping cart result.
 */
class DeliverResponse
{
    /**
     * @var CapturePaymentResponse|null The response of the capture payment.
     */
    #[SerializedName('capturePaymentResponse')]
    protected ?CapturePaymentResponse $capturePaymentResponse;

    /**
     * @var ShoppingCartResult|null The result of the shopping cart.
     */
    #[SerializedName('shoppingCart')]
    protected ?ShoppingCartResult $shoppingCart;

    public function __construct(
        ?CapturePaymentResponse $capturePaymentResponse = null,
        ?ShoppingCartResult $shoppingCart = null
    ) {
        $this->capturePaymentResponse = $capturePaymentResponse;
        $this->shoppingCart = $shoppingCart;
    }

    // Getters and Setters
    public function getCapturePaymentResponse(): ?CapturePaymentResponse
    {
        return $this->capturePaymentResponse;
    }

    public function setCapturePaymentResponse(?CapturePaymentResponse $capturePaymentResponse): self
    {
        $this->capturePaymentResponse = $capturePaymentResponse;
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
