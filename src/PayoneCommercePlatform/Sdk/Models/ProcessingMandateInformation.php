<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\BankAccountInformation;
use PayoneCommercePlatform\Sdk\Models\MandateRecurrenceType;

/**
 * @description Object containing the relevant information of a SEPA Direct Debit mandate for processing (mandatory fields in pain.008). Renamed from CreateMandateWithReturnUrl to ProcessingMandateInformation.
 */
class ProcessingMandateInformation
{
    /**
     * @var BankAccountInformation|null Bank account IBAN information.
     */
    #[SerializedName('bankAccountIban')]
    protected ?BankAccountInformation $bankAccountIban;

    /**
     * @var MandateRecurrenceType|null Recurrence type of the mandate.
     */
    #[SerializedName('recurrenceType')]
    protected ?MandateRecurrenceType $recurrenceType;

    /**
     * @var string|null The unique identifier of the mandate.
     */
    #[SerializedName('uniqueMandateReference')]
    protected ?string $uniqueMandateReference;

    /**
     * @var string|null The date of signature of the mandate. Format YYYYMMDD.
     */
    #[SerializedName('dateOfSignature')]
    protected ?string $dateOfSignature;

    /**
     * @var string|null Your unique creditor identifier.
     */
    #[SerializedName('creditorId')]
    protected ?string $creditorId;

    public function __construct(
        ?BankAccountInformation $bankAccountIban = null,
        ?MandateRecurrenceType $recurrenceType = null,
        ?string $uniqueMandateReference = null,
        ?string $dateOfSignature = null,
        ?string $creditorId = null,
    ) {
        $this->bankAccountIban = $bankAccountIban;
        $this->recurrenceType = $recurrenceType;
        $this->uniqueMandateReference = $uniqueMandateReference;
        $this->dateOfSignature = $dateOfSignature;
        $this->creditorId = $creditorId;
    }

    // Getters and Setters
    public function getBankAccountIban(): ?BankAccountInformation
    {
        return $this->bankAccountIban;
    }

    public function setBankAccountIban(BankAccountInformation $bankAccountIban): self
    {
        $this->bankAccountIban = $bankAccountIban;
        return $this;
    }

    public function getRecurrenceType(): ?MandateRecurrenceType
    {
        return $this->recurrenceType;
    }

    public function setRecurrenceType(MandateRecurrenceType $recurrenceType): self
    {
        $this->recurrenceType = $recurrenceType;
        return $this;
    }

    public function getUniqueMandateReference(): ?string
    {
        return $this->uniqueMandateReference;
    }

    public function setUniqueMandateReference(string $uniqueMandateReference): self
    {
        $this->uniqueMandateReference = $uniqueMandateReference;
        return $this;
    }

    public function getDateOfSignature(): ?string
    {
        return $this->dateOfSignature;
    }

    public function setDateOfSignature(string $dateOfSignature): self
    {
        $this->dateOfSignature = $dateOfSignature;
        return $this;
    }

    public function getCreditorId(): ?string
    {
        return $this->creditorId;
    }

    public function setCreditorId(string $creditorId): self
    {
        $this->creditorId = $creditorId;
        return $this;
    }
}
