<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PaymentInformationRefundRequest
{
    /**
     * @var PositiveAmountOfMoney
     */
    #[SerializedName('amountOfMoney')]
    private $amountOfMoney;

    /**
     * @var PaymentReferences|null
     */
    #[SerializedName('references')]
    private $references;

    /**
     * @var string|null
     */
    #[SerializedName('accountHolder')]
    private $accountHolder;

    public function __construct(
        PositiveAmountOfMoney $amountOfMoney,
        ?PaymentReferences $references = null,
        ?string $accountHolder = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->accountHolder = $accountHolder;
    }

    /**
     * @return PositiveAmountOfMoney
     */
    public function getAmountOfMoney(): PositiveAmountOfMoney
    {
        return $this->amountOfMoney;
    }

    /**
     * @return PaymentReferences|null
     */
    public function getReferences(): ?PaymentReferences
    {
        return $this->references;
    }

    /**
     * @return string|null
     */
    public function getAccountHolder(): ?string
    {
        return $this->accountHolder;
    }
}
