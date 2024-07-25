<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing information specific to SEPA Direct Debit
 */
class SepaDirectDebitPaymentProduct771SpecificInput
{
    /**
     * @var string|null The unique reference of the existing mandate to use in this payment.
     */
    #[SerializedName('existingUniqueMandateReference')]
    protected ?string $existingUniqueMandateReference;

    /**
     * @var ProcessingMandateInformation|null Information of a SEPA Direct Debit mandate for processing.
     */
    #[SerializedName('mandate')]
    protected ?ProcessingMandateInformation $mandate;

    public function __construct(
        ?string $existingUniqueMandateReference = null,
        ?ProcessingMandateInformation $mandate = null
    ) {
        $this->existingUniqueMandateReference = $existingUniqueMandateReference;
        $this->mandate = $mandate;
    }

    // Getters and Setters
    public function getExistingUniqueMandateReference(): ?string
    {
        return $this->existingUniqueMandateReference;
    }

    public function setExistingUniqueMandateReference(?string $existingUniqueMandateReference): self
    {
        $this->existingUniqueMandateReference = $existingUniqueMandateReference;
        return $this;
    }

    public function getMandate(): ?ProcessingMandateInformation
    {
        return $this->mandate;
    }

    public function setMandate(?ProcessingMandateInformation $mandate): self
    {
        $this->mandate = $mandate;
        return $this;
    }
}
