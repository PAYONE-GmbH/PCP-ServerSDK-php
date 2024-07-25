<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
