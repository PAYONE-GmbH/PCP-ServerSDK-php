<?php

namespace PayoneCommercePlatform\Sdk\Models;

class PausePaymentResponse
{
    /**
     * @var StatusValue
     */
    private StatusValue $status;

    public function __construct(StatusValue $status)
    {
        $this->status = $status;
    }


    // Getters and Setters
    public function getStatus(): StatusValue
    {
        return $this->status;
    }


    public function setStatus(StatusValue $status): self
    {
        $this->status = $status;
        return $this;
    }
}
