<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class BankAccountInformation
{
    /**
     * @var string IBAN of the end customer's bank account.
     * The IBAN is the International Bank Account Number. It is an internationally agreed format for the BBAN and
     * includes the ISO country code and two check digits.
     */
    #[SerializedName('iban')]
    protected string $iban;

    /**
     * @var string Account holder of the bank account with the given IBAN.
     * Does not necessarily have to be the end customer (e.g. joint accounts).
     */
    #[SerializedName('accountHolder')]
    protected string $accountHolder;

    public function __construct(
        string $iban,
        string $accountHolder
    ) {
        $this->iban = $iban;
        $this->accountHolder = $accountHolder;
    }

    // Getters and Setters
    public function getIban(): string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;
        return $this;
    }

    public function getAccountHolder(): string
    {
        return $this->accountHolder;
    }

    public function setAccountHolder(string $accountHolder): self
    {
        $this->accountHolder = $accountHolder;
        return $this;
    }
}
