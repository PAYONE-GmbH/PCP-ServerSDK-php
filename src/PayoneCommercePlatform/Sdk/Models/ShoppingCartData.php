<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class ShoppingCartData
{
    /** @var CartItemData[]|null */
    #[SerializedName('items')]
    protected ?array $items;

    /** @param CartItemData[]|null $items */
    public function __construct(?array $items = null)
    {
        $this->items = $items;
    }
    /** @return CartItemData[]|null */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /** @param CartItemData[]|null $items */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
