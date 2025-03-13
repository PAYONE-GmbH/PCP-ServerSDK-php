<?php

namespace PayoneCommercePlatform\Sdk\Models;

class PaymentInstructions
{
    /**
     * @var Payee
     */
    private $payee;

    /**
     * @var string
     */
    private $dueDate;

    /**
     * @var string
     */
    private $referenceNumber;

    /**
     * @var string|null
     */
    private $status;

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

    public function getPayee(): Payee
    {
        return $this->payee;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }
}
