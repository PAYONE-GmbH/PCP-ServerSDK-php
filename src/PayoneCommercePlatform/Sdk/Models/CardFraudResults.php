<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Fraud results contained in the CardFraudResults object.
 */
class CardFraudResults
{
    /**
     * @var AvsResult|null Result of the Address Verification Service checks.
     */
    #[SerializedName('avsResult')]
    protected ?AvsResult $avsResult;

    public function __construct(
        ?AvsResult $avsResult = null,
    ) {
        $this->avsResult = $avsResult;
    }

    // Getters and Setters
    public function getAvsResult(): ?AvsResult
    {
        return $this->avsResult;
    }

    public function setAvsResult(?AvsResult $avsResult): self
    {
        $this->avsResult = $avsResult;
        return $this;
    }
}
