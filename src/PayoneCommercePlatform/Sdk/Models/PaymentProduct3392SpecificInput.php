<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing specific information for PAYONE Secured Direct Debit.
 */
class PaymentProduct3392SpecificInput
{
    /**
     * @var BankAccountInformation Bank account information.
     */
    #[SerializedName('bankAccountInformation')]
    protected BankAccountInformation $bankAccountInformation;

    public function __construct(
        BankAccountInformation $bankAccountInformation
    ) {
        $this->bankAccountInformation = $bankAccountInformation;
    }

    // Getters and Setters
    public function getBankAccountInformation(): BankAccountInformation
    {
        return $this->bankAccountInformation;
    }

    public function setBankAccountInformation(BankAccountInformation $bankAccountInformation): self
    {
        $this->bankAccountInformation = $bankAccountInformation;
        return $this;
    }
}

