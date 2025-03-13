<?php

namespace PayoneCommercePlatform\Sdk\Models;

class SepaTransferPaymentProduct772SpecificInput
{
    /**
     * @var BankAccountInformation
     */
    private $bankAccountInformation;

    public function __construct(BankAccountInformation $bankAccountInformation)
    {
        $this->bankAccountInformation = $bankAccountInformation;
    }

    /**
     * @return BankAccountInformation
     */
    public function getBankAccountInformation(): BankAccountInformation
    {
        return $this->bankAccountInformation;
    }
}
