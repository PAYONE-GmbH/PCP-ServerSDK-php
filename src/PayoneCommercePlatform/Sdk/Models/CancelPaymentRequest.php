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

    /**
     * @var FundSplit|null Fund split details for this cancellation.
     */
    #[SerializedName('fundSplit')]
    protected ?FundSplit $fundSplit;

    public function __construct(
        ?CancellationReason $cancellationReason = null,
        ?int $amount = null,
        ?FundSplit $fundSplit = null,
    ) {
        $this->cancellationReason = $cancellationReason;
        $this->amount = $amount;
        $this->fundSplit = $fundSplit;
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

    public function getFundSplit(): ?FundSplit
    {
        return $this->fundSplit;
    }

    public function setFundSplit(?FundSplit $fundSplit): self
    {
        $this->fundSplit = $fundSplit;
        return $this;
    }
}
