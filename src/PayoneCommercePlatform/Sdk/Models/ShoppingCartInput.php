<?php

namespace PayoneCommercePlatform\Sdk\Models;

use PayoneCommercePlatform\Sdk\Models\CartItemInput;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Shopping cart data, including items and specific amounts.
 */
class ShoppingCartInput
{
    /**
     * @var CartItemInput[]|null List of items in the shopping cart.
     */
    #[SerializedName('items')]
    protected ?array $items;

    /**
     * @param CartItemInput[]|null $items List of items in the shopping cart.
     */
    public function __construct(
        ?array $items = null
    ) {
        $this->items = $items;
    }

    // Getters and Setters
    /**
     * @return CartItemInput[]|null List of items in the shopping cart.
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param CartItemInput[]|null $items List of items in the shopping cart.
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
