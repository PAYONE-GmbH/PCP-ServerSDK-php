<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
