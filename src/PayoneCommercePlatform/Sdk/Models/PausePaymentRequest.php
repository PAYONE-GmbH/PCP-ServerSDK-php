<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * Request to refresh the payment status of a specific payment.
 */
class PausePaymentRequest
{
    /**
     * Type of refresh action to be performed.
     *
     * @var \PayoneCommercePlatform\Sdk\Models\RefreshType
     */
    public RefreshType $refreshType;

    /**
     * @param RefreshType $refreshType Type of refresh action to be performed.
     */
    public function __construct(RefreshType $refreshType)
    {
        $this->refreshType = $refreshType;
    }

    /**
     * Get the refresh type
     *
     * @return RefreshType
     */
    public function getRefreshType(): RefreshType
    {
        return $this->refreshType;
    }

    /**
     * Set the refresh type
     *
     * @param RefreshType $refreshType Type of refresh action to be performed.
     * @return self
     */
    public function setRefreshType(RefreshType $refreshType): self
    {
        $this->refreshType = $refreshType;
        return $this;
    }
}
