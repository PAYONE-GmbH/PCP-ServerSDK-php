<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CartItemInput;

/**
 * @description Delivery object contains additional information about the delivery/shipment, which is the basis for the Capture. The amountOfMoney in the cartItem will not be used in the request.
 */
class DeliveryInformation
{
    /**
     * @var CartItemInput[]|null Items delivered.
     */
    #[SerializedName('items')]
    protected ?array $items;

    /**
     * @param CartItemInput[]|null $items Items delivered.
     */
    public function __construct(
        ?array $items = null
    ) {
        $this->items = $items;
    }

    // Getters and Setters
    /**
     * @return CartItemInput[]|null Items delivered.
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param CartItemInput[]|null $items Items delivered.
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
