<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PositiveAmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentReferences;
use PayoneCommercePlatform\Sdk\Models\ReturnInformation;
use PayoneCommercePlatform\Sdk\Models\FundSplit;

/**
 * @description Request to refund a payment for a Checkout. It is possible to perform multiple partial refunds by providing an amount that is lower than the total captured amount. The returnReason can be provided for reporting and reconciliation purposes but is not mandatory.
 */
class RefundRequest
{
    /**
     * @var PositiveAmountOfMoney|null The amount of money to refund.
     */
    #[SerializedName('amountOfMoney')]
    protected ?PositiveAmountOfMoney $amountOfMoney;

    /**
     * @var PaymentReferences|null The payment references.
     */
    #[SerializedName('references')]
    protected ?PaymentReferences $references;

    /**
     * @var ReturnInformation|null The return information.
     */
    #[SerializedName('return')]
    protected ?ReturnInformation $return;

    /**
     * @var FundSplit|null Fund split details for this refund.
     */
    #[SerializedName('fundSplit')]
    protected ?FundSplit $fundSplit;

    public function __construct(
        ?PositiveAmountOfMoney $amountOfMoney = null,
        ?PaymentReferences $references = null,
        ?ReturnInformation $return = null,
        ?FundSplit $fundSplit = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->return = $return;
        $this->fundSplit = $fundSplit;
    }

    // Getters and Setters
    public function getAmountOfMoney(): ?PositiveAmountOfMoney
    {
        return $this->amountOfMoney;
    }

    public function setAmountOfMoney(?PositiveAmountOfMoney $amountOfMoney): self
    {
        $this->amountOfMoney = $amountOfMoney;
        return $this;
    }

    public function getReferences(): ?PaymentReferences
    {
        return $this->references;
    }

    public function setReferences(?PaymentReferences $references): self
    {
        $this->references = $references;
        return $this;
    }

    public function getReturn(): ?ReturnInformation
    {
        return $this->return;
    }

    public function setReturn(?ReturnInformation $return): self
    {
        $this->return = $return;
        return $this;
    }

    public function getFundSplit(): ?FundSplit
    {
        return $this->fundSplit;
    }

    public function setFundSplit(?FundSplit $fundSplit): self
    {
        $this->fundSplit = $fundSplit;
        return $this;
    }
}
