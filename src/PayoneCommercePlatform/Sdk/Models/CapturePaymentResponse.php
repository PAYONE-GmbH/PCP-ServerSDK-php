<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CapturePaymentResponse
{
    /**
     * @var CaptureOutput|null Capture details.
     */
    #[SerializedName('captureOutput')]
    protected ?CaptureOutput $captureOutput;

    /**
     * @var StatusValue|null Current high-level status of the payment in a human-readable form.
     */
    #[SerializedName('status')]
    protected ?StatusValue $status;

    /**
     * @var PaymentStatusOutput|null Payment status output details.
     */
    #[SerializedName('statusOutput')]
    protected ?PaymentStatusOutput $statusOutput;

    /**
     * @var string|null Unique payment transaction identifier of the payment gateway.
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var FundSplit|null Fund split details for this capture.
     */
    #[SerializedName('fundSplit')]
    protected ?FundSplit $fundSplit;

    public function __construct(
        ?CaptureOutput $captureOutput = null,
        ?StatusValue $status = null,
        ?PaymentStatusOutput $statusOutput = null,
        ?string $id = null,
        ?FundSplit $fundSplit = null
    ) {
        $this->captureOutput = $captureOutput;
        $this->status = $status;
        $this->statusOutput = $statusOutput;
        $this->id = $id;
        $this->fundSplit = $fundSplit;
    }

    // Getters and Setters
    public function getCaptureOutput(): ?CaptureOutput
    {
        return $this->captureOutput;
    }

    public function setCaptureOutput(?CaptureOutput $captureOutput): self
    {
        $this->captureOutput = $captureOutput;
        return $this;
    }

    public function getStatus(): ?StatusValue
    {
        return $this->status;
    }

    public function setStatus(?StatusValue $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusOutput(): ?PaymentStatusOutput
    {
        return $this->statusOutput;
    }

    public function setStatusOutput(?PaymentStatusOutput $statusOutput): self
    {
        $this->statusOutput = $statusOutput;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
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
