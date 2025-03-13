<?php

namespace PayoneCommercePlatform\Sdk\Models;

class PaymentInformationRefundRequest
{
    /**
     * @var PositiveAmountOfMoney
     */
    private $amountOfMoney;

    /**
     * @var PaymentReferences|null
     */
    private $references;

    /**
     * @var string|null
     */
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
