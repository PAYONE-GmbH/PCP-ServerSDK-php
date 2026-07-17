<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class RefreshPaymentRequest
{
    /**
     * @var RefreshType
     */
    #[SerializedName('refreshType')]
    protected RefreshType $refreshType;

    public function __construct(RefreshType $refreshType)
    {
        $this->refreshType = $refreshType;
    }

    // Getters and Setters
    public function getRefreshType(): RefreshType
    {
        return $this->refreshType;
    }

    public function setRefreshType(RefreshType $refreshType): self
    {
        $this->refreshType = $refreshType;
        return $this;
    }
}
