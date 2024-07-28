<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CaptureOutput;
use PayoneCommercePlatform\Sdk\Models\StatusValue;
use PayoneCommercePlatform\Sdk\Models\PaymentStatusOutput;

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

    public function __construct(
        ?CaptureOutput $captureOutput = null,
        ?StatusValue $status = null,
        ?PaymentStatusOutput $statusOutput = null,
        ?string $id = null
    ) {
        $this->captureOutput = $captureOutput;
        $this->status = $status;
        $this->statusOutput = $statusOutput;
        $this->id = $id;
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
}
