<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentReferences;

/**
 * @description Object containing details from the created payout.
 */
class PayoutOutput
{
    /**
     * @var AmountOfMoney|null Details of the amount of money.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var PaymentReferences|null Details of the payment references.
     */
    #[SerializedName('references')]
    protected ?PaymentReferences $references;

    /**
     * @var string|null Payment method identifier based on the paymentProductId.
     */
    #[SerializedName('paymentMethod')]
    protected ?string $paymentMethod;

    public function __construct(
        ?AmountOfMoney $amountOfMoney = null,
        ?PaymentReferences $references = null,
        ?string $paymentMethod = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->paymentMethod = $paymentMethod;
    }

    // Getters and Setters
    public function getAmountOfMoney(): ?AmountOfMoney
    {
        return $this->amountOfMoney;
    }

    public function setAmountOfMoney(?AmountOfMoney $amountOfMoney): self
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

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
}
