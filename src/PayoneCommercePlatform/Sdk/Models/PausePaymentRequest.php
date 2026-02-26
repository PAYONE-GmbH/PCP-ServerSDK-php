<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Request to pause a payment for a specific payment method.
 */
class PausePaymentRequest
{
    /**
     * @var RefreshType|null Type of refresh action to be performed.
     */
    #[SerializedName('refreshType')]
    protected ?RefreshType $refreshType;

    public function __construct(?RefreshType $refreshType = null)
    {
        $this->refreshType = $refreshType;
    }

    public function getRefreshType(): ?RefreshType
    {
        return $this->refreshType;
    }

    public function setRefreshType(?RefreshType $refreshType): self
    {
        $this->refreshType = $refreshType;
        return $this;
    }
}
