<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PaymentInstructions
{
    /**
     * @var Payee
     */
    #[SerializedName('payee')]
    private Payee $payee;

    /**
     * @var string
     */
    #[SerializedName('dueDate')]
    private string $dueDate;

    /**
     * @var string
     */
    #[SerializedName('referenceNumber')]
    private string $referenceNumber;

    /**
     * @var string|null
     */
    #[SerializedName('status')]
    private ?string $status;

    public function __construct(
        Payee $payee,
        string $dueDate,
        string $referenceNumber,
        ?string $status = null
    ) {
        $this->payee = $payee;
        $this->dueDate = $dueDate;
        $this->referenceNumber = $referenceNumber;
        $this->status = $status;
    }

    // Getters and Setters
    public function getPayee(): Payee
    {
        return $this->payee;
    }

    public function setPayee(Payee $payee): self
    {
        $this->payee = $payee;
        return $this;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function setDueDate(string $dueDate): self
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(string $referenceNumber): self
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }
}
