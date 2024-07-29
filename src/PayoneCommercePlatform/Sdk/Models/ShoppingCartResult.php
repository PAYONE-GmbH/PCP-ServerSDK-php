<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CartItemResult;

/**
 * @description Shopping cart data, including items and specific amounts.
 */
class ShoppingCartResult
{
    /**
     * @var CartItemResult[]|null List of cart items.
     */
    #[SerializedName('items')]
    protected ?array $items;

    /**
      * @param CartItemResult[]|null $items List of cart items.
      */
    public function __construct(
        ?array $items = null
    ) {
        $this->items = $items;
    }

    // Getters and Setters
    /**
      * @return CartItemResult[]|null $items List of cart items.
      */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
      * @param CartItemResult[]|null $items List of cart items.
      * @return self
      */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
