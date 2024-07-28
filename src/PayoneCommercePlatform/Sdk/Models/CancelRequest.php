<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CancelItem;
use PayoneCommercePlatform\Sdk\Models\CancelType;
use PayoneCommercePlatform\Sdk\Models\CancellationReason;

/**
 * @description Request to mark items as of the respective Checkout as cancelled and to automatically reverse the associated payment.
 * A Cancel can be created for a full or the partial ShoppingCart of the Checkout.
 * The platform will automatically calculate the respective amount to trigger the Cancel. For a partial Cancel a list of items must be provided.
 *
 * The cancellationReason is mandatory for BNPL payment methods (paymentProductId 3390, 3391 and 3392).
 * For other payment methods the cancellationReason is not mandatory but can be used for reporting and reconciliation purposes.
 */
class CancelRequest
{
    /**
     * @var CancelType|null The type of cancellation.
     */
    #[SerializedName('cancelType')]
    protected ?CancelType $cancelType;

    /**
     * @var CancellationReason|null The reason for cancellation.
     */
    #[SerializedName('cancellationReason')]
    protected ?CancellationReason $cancellationReason;

    /**
     * @var CancelItem[]|null List of items to be cancelled.
     */
    #[SerializedName('cancelItems')]
    protected ?array $cancelItems;

    /**
     * @param CancelType|null $cancelType The type of cancellation.
     * @param CancellationReason|null $cancellationReason The reason for cancellation.
     * @param CancelItem[]|null $cancelItems List of items to be cancelled.
     */
    public function __construct(
        ?CancelType $cancelType = null,
        ?CancellationReason $cancellationReason = null,
        ?array $cancelItems = null
    ) {
        $this->cancelType = $cancelType;
        $this->cancellationReason = $cancellationReason;
        $this->cancelItems = $cancelItems;
    }

    // Getters and Setters
    public function getCancelType(): ?CancelType
    {
        return $this->cancelType;
    }

    public function setCancelType(?CancelType $cancelType): self
    {
        $this->cancelType = $cancelType;
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

    /**
     * @return CancelItem[]|null List of items to be cancelled.
     */
    public function getCancelItems(): ?array
    {
        return $this->cancelItems;
    }

    /**
     * @param CancelItem[]|null $cancelItems List of items to be cancelled.
     * @return self
     */
    public function setCancelItems(?array $cancelItems): self
    {
        $this->cancelItems = $cancelItems;
        return $this;
    }
}
