<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
