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

    public function __construct(
        ?CancellationReason $cancellationReason = null,
    ) {
        $this->cancellationReason = $cancellationReason;
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
}
