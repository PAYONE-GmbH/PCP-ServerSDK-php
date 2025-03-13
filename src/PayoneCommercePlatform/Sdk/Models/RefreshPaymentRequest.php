<?php

namespace PayoneCommercePlatform\Sdk\Models;

class RefreshPaymentRequest
{
    /**
     * @var RefreshType
     */
    private $refreshType;

    public function __construct(RefreshType $refreshType)
    {
        $this->refreshType = $refreshType;
    }

    /**
     * @return RefreshType
     */
    public function getRefreshType(): RefreshType
    {
        return $this->refreshType;
    }
}
