<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing specific information for PAYONE Secured Installment.
 */
class PaymentProduct3391SpecificInput
{
    /**
     * @var string ID of the selected installment option. Will be provided in the response of the Order / Payment Execution request.
     */
    #[SerializedName('installmentOptionId')]
    protected string $installmentOptionId;

    /**
     * @var BankAccountInformation Bank account information.
     */
    #[SerializedName('bankAccountInformation')]
    protected BankAccountInformation $bankAccountInformation;

    public function __construct(
        string $installmentOptionId,
        BankAccountInformation $bankAccountInformation
    ) {
        $this->installmentOptionId = $installmentOptionId;
        $this->bankAccountInformation = $bankAccountInformation;
    }

    // Getters and Setters
    public function getInstallmentOptionId(): string
    {
        return $this->installmentOptionId;
    }

    public function setInstallmentOptionId(string $installmentOptionId): self
    {
        $this->installmentOptionId = $installmentOptionId;
        return $this;
    }

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
