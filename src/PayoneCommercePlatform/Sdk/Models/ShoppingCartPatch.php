<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CartItemPatch;

/**
 * @description Shopping cart data, including items and specific amounts.
 */
class ShoppingCartPatch
{
    /**
     * @var CartItemPatch[]|null The items in the shopping cart.
     */
    #[SerializedName('items')]
    protected ?array $items;

    /**
      * @param CartItemPatch[]|null $items List of cart items.
      */
    public function __construct(
        ?array $items = null
    ) {
        $this->items = $items;
    }

    // Getters and Setters
    /**
      * @return CartItemPatch[]|null $items List of cart items.
      */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
      * @param CartItemPatch[]|null $items List of cart items.
      * @return self
      */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
