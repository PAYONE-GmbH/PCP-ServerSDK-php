<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class FundSplitResponse
{
    #[SerializedName('fundSplitId')]
    protected ?string $fundSplitId;

    #[SerializedName('paymentExecutionId')]
    protected ?string $paymentExecutionId;

    #[SerializedName('eventId')]
    protected ?string $eventId;

    #[SerializedName('fundSplit')]
    protected ?FundSplit $fundSplit;

    public function __construct(
        ?string $fundSplitId = null,
        ?string $paymentExecutionId = null,
        ?string $eventId = null,
        ?FundSplit $fundSplit = null
    ) {
        $this->fundSplitId = $fundSplitId;
        $this->paymentExecutionId = $paymentExecutionId;
        $this->eventId = $eventId;
        $this->fundSplit = $fundSplit;
    }

    public function getFundSplitId(): ?string
    {
        return $this->fundSplitId;
    }

    public function setFundSplitId(?string $fundSplitId): self
    {
        $this->fundSplitId = $fundSplitId;
        return $this;
    }

    public function getPaymentExecutionId(): ?string
    {
        return $this->paymentExecutionId;
    }

    public function setPaymentExecutionId(?string $paymentExecutionId): self
    {
        $this->paymentExecutionId = $paymentExecutionId;
        return $this;
    }

    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    public function setEventId(?string $eventId): self
    {
        $this->eventId = $eventId;
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
