<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Output that is SEPA Direct Debit specific (i.e. the used mandate).
 */
class PaymentProduct771SpecificOutput
{
    /**
     * @var string|null Unique reference for a SEPA Mandate.
     */
    #[SerializedName('mandateReference')]
    protected ?string $mandateReference;

    public function __construct(
        ?string $mandateReference = null
    ) {
        $this->mandateReference = $mandateReference;
    }

    // Getters and Setters
    public function getMandateReference(): ?string
    {
        return $this->mandateReference;
    }

    public function setMandateReference(?string $mandateReference): self
    {
        $this->mandateReference = $mandateReference;
        return $this;
    }
}
