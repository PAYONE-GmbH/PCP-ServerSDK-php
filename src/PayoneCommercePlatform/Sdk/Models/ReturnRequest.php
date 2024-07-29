<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\ReturnType;
use PayoneCommercePlatform\Sdk\Models\ReturnItem;

/**
 * @description Request to mark items of the respective Checkout as returned and to automatically refund a payment for those items. A Return can be created for a full or the partial ShoppingCart of the Checkout. The platform will automatically calculate the respective amount to trigger the Refund. For a partial Return a list of items must be provided. The item details for the Refund will be automatically loaded from the Checkout. The returnReason can be provided for reporting and reconciliation purposes but is not mandatory.
 */
class ReturnRequest
{
    /**
     * @var ReturnType|null The return type.
     */
    #[SerializedName('returnType')]
    protected ?ReturnType $returnType;

    /**
     * @var string|null Reason of the Refund (e.g. communicated by or to the consumer).
     */
    #[SerializedName('returnReason')]
    protected ?string $returnReason;

    /**
     * @var ReturnItem[]|null List of items to return.
     */
    #[SerializedName('returnItems')]
    protected ?array $returnItems;

    /**
     * @param ReturnType|null $returnType The return type.
     * @param string|null $returnReason Reason of the Refund (e.g. communicated by or to the consumer).
     * @param ReturnItem[]|null $returnItems List of items to return.
     */
    public function __construct(
        ?ReturnType $returnType = null,
        ?string $returnReason = null,
        ?array $returnItems = null
    ) {
        $this->returnType = $returnType;
        $this->returnReason = $returnReason;
        $this->returnItems = $returnItems;
    }

    // Getters and Setters
    public function getReturnType(): ?ReturnType
    {
        return $this->returnType;
    }

    public function setReturnType(?ReturnType $returnType): self
    {
        $this->returnType = $returnType;
        return $this;
    }

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
     * @return ReturnItem[]|null List of items to return.
     */
    public function getReturnItems(): ?array
    {
        return $this->returnItems;
    }

    /**
     * @param ReturnItem[]|null $returnItems List of items to return.
     * @return self
     */
    public function setReturnItems(?array $returnItems): self
    {
        $this->returnItems = $returnItems;
        return $this;
    }
}
