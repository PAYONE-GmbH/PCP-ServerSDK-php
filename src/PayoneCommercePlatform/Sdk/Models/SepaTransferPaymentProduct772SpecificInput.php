<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SepaTransferPaymentProduct772SpecificInput
{
    /**
     * @var BankAccountInformation|null
     */
    #[SerializedName('bankAccountInformation')]
    protected ?BankAccountInformation $bankAccountInformation;

    public function __construct(?BankAccountInformation $bankAccountInformation = null)
    {
        $this->bankAccountInformation = $bankAccountInformation;
    }


    // Getters and Setters
    public function getBankAccountInformation(): ?BankAccountInformation
    {
        return $this->bankAccountInformation;
    }

    public function setBankAccountInformation(?BankAccountInformation $bankAccountInformation): self
    {
        $this->bankAccountInformation = $bankAccountInformation;
        return $this;
    }
}
