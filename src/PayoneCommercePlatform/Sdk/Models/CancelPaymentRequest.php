<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CancellationReason;

class CancelPaymentRequest
{
    /**
     * @var CancellationReason|null Reason why an order was cancelled.
     */
    #[SerializedName('cancellationReason')]
    protected ?CancellationReason $cancellationReason;

    /**
     * @var int|null The amount to cancel in cents.
     */
    #[SerializedName('amount')]
    protected ?int $amount;

    public function __construct(
        ?CancellationReason $cancellationReason = null,
        ?int $amount = null,
    ) {
        $this->cancellationReason = $cancellationReason;
        $this->amount = $amount;
    }

    // Getters and Setters
    public function getCancellationReason(): ?CancellationReason
    {
        return $this->cancellationReason;
    }

    public function setCancellationReason(?CancellationReason $cancellationReason): self
    {
        $this->cancellationReason = $cancellationReason;
        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
}
