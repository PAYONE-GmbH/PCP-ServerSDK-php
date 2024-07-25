<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Request to mark items of the respective Checkout as delivered and to automatically execute a Capture. A Deliver can be created for a full or the partial ShoppingCart of the Checkout. The platform will automatically calculate the respective amount to trigger the Capture. For a partial Deliver a list of items must be provided. The item details for the Capture will be automatically loaded from the Checkout. The cancellationReason must be provided if deliverType is set to PARTIAL and isFinal is set to true for BNPL payment methods (paymentProductId 3390, 3391 and 3392). For other payment methods the cancellationReason is not mandatory in this case but can be used for reporting and reconciliation purposes.
 */
class DeliverRequest
{
    /**
     * @var DeliverType|null The type of delivery.
     */
    #[SerializedName('deliverType')]
    protected ?DeliverType $deliverType;

    /**
     * @var bool|null Indicates whether this will be the final operation.
     */
    #[SerializedName('isFinal')]
    protected ?bool $isFinal;

    /**
     * @var CancellationReason|null The reason for cancellation.
     */
    #[SerializedName('cancellationReason')]
    protected ?CancellationReason $cancellationReason;

    /**
     * @var DeliverItem[]|null List of items to be delivered.
     */
    #[SerializedName('deliverItems')]
    protected ?array $deliverItems;

    public function __construct(
        ?DeliverType $deliverType = null,
        ?bool $isFinal = false,
        ?CancellationReason $cancellationReason = null,
        ?array $deliverItems = null
    ) {
        $this->deliverType = $deliverType;
        $this->isFinal = $isFinal;
        $this->cancellationReason = $cancellationReason;
        $this->deliverItems = $deliverItems;
    }

    // Getters and Setters
    public function getDeliverType(): ?DeliverType
    {
        return $this->deliverType;
    }

    public function setDeliverType(?DeliverType $deliverType): self
    {
        $this->deliverType = $deliverType;
        return $this;
    }

    public function getIsFinal(): ?bool
    {
        return $this->isFinal;
    }

    public function setIsFinal(?bool $isFinal): self
    {
        $this->isFinal = $isFinal;
        return $this;
    }

    public function getCancellationReason(): ?CancellationReason
    {
        return $this->cancellationReason;
    }

    public function setCancellationReason(?CancellationReason $cancellationReason): self
    {
        $this->cancellationReason = $cancellationReason;
        return $this;
    }

    public function getDeliverItems(): ?array
    {
        return $this->deliverItems;
    }

    public function setDeliverItems(?array $deliverItems): self
    {
        $this->deliverItems = $deliverItems;
        return $this;
    }
}
