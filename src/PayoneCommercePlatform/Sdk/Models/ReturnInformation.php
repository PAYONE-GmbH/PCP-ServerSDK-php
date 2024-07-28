<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CartItemInput;

/**
 * @description Return object contains additional information about the return/shipment, which is the basis for the Refund. The amountOfMoney in the cartItem will not be used in the request.
 */
class ReturnInformation
{
    /**
     * @var string|null Reason of the Refund (e.g. communicated by or to the consumer).
     */
    #[SerializedName('returnReason')]
    protected ?string $returnReason;

    /**
     * @var CartItemInput[]|null Items returned.
     */
    #[SerializedName('items')]
    protected ?array $items;

    /**
     * @param string|null $returnReason Reason of the Refund
     * @param CartItemInput[]|null $items Items returned.
     */
    public function __construct(
        ?string $returnReason = null,
        ?array $items = null
    ) {
        $this->returnReason = $returnReason;
        $this->items = $items;
    }

    // Getters and Setters
    public function getReturnReason(): ?string
    {
        return $this->returnReason;
    }

    public function setReturnReason(?string $returnReason): self
    {
        $this->returnReason = $returnReason;
        return $this;
    }

    /**
     * @return CartItemInput[]|null Items returned.
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param CartItemInput[]|null $items Items returned.
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
