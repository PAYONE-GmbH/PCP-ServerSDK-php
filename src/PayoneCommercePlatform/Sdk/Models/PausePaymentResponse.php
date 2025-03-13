<?php

namespace PayoneCommercePlatform\Sdk\Models;

class PausePaymentResponse
{
    /**
     * @var StatusValue
     */
    private $status;

    public function __construct(StatusValue $status)
    {
        $this->status = $status;
    }

    /**
     * @return StatusValue
     */
    public function getStatus(): StatusValue
    {
        return $this->status;
    }
}
