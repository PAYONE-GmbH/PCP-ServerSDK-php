<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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

    public function __construct(
        ?array $items = null
    ) {
        $this->items = $items;
    }

    // Getters and Setters
    public function getItems(): ?array
    {
        return $this->items;
    }

    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
