<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Response to a pause payment request.
 */
class PausePaymentResponse
{
    /**
     * @var StatusValue|null Current high-level status of the payment.
     */
    #[SerializedName('status')]
    protected ?StatusValue $status;

    public function __construct(?StatusValue $status = null)
    {
        $this->status = $status;
    }

    // Getters and Setters
    public function getStatus(): ?StatusValue
    {
        return $this->status;
    }

    public function setStatus(?StatusValue $status): self
    {
        $this->status = $status;
        return $this;
    }
}
