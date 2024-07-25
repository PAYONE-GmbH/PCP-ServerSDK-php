<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Detailed information regarding an occurred payment event.
 */
class CartItemOrderStatus
{
    /**
     * @var CartItemStatus|null Status of the cart item.
     */
    #[SerializedName('cartItemStatus')]
    protected ?CartItemStatus $cartItemStatus;

    /**
     * @var int|null Amount of units for which this status is applicable, should be greater than zero.
     */
    #[SerializedName('quantity')]
    protected ?int $quantity;

    public function __construct(
        ?CartItemStatus $cartItemStatus = null,
        ?int $quantity = null
    ) {
        $this->cartItemStatus = $cartItemStatus;
        $this->quantity = $quantity;
    }

    // Getters and Setters
    public function getCartItemStatus(): ?CartItemStatus
    {
        return $this->cartItemStatus;
    }

    public function setCartItemStatus(?CartItemStatus $cartItemStatus): self
    {
        $this->cartItemStatus = $cartItemStatus;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}
