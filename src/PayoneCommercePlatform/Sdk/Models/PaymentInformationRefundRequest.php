<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PaymentInformationRefundRequest
{
    /**
     * @var PositiveAmountOfMoney
     */
    #[SerializedName('amountOfMoney')]
    protected PositiveAmountOfMoney $amountOfMoney;

    /**
     * @var PaymentReferences|null
     */
    #[SerializedName('references')]
    protected ?PaymentReferences $references;

    /**
     * @var string|null
     */
    #[SerializedName('accountHolder')]
    protected ?string $accountHolder;

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

    public function setAmountOfMoney(PositiveAmountOfMoney $amountOfMoney): self
    {
        $this->amountOfMoney = $amountOfMoney;
        return $this;
    }

    /**
     * @return PaymentReferences|null
     */
    public function getReferences(): ?PaymentReferences
    {
        return $this->references;
    }

    public function setReferences(?PaymentReferences $references): self
    {
        $this->references = $references;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountHolder(): ?string
    {
        return $this->accountHolder;
    }

    public function setAccountHolder(?string $accountHolder): self
    {
        $this->accountHolder = $accountHolder;
        return $this;
    }
}
