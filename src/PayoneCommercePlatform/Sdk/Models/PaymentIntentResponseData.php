<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentIntentResponseData
{
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;
    #[SerializedName('references')]
    protected ?PaymentReferences $references;
    #[SerializedName('paymentIntentId')]
    protected ?string $paymentIntentId;
    #[SerializedName('paymentId')]
    protected ?string $paymentId;

    public function __construct(?AmountOfMoney $amountOfMoney = null, ?PaymentReferences $references = null, ?string $paymentIntentId = null, ?string $paymentId = null)
    {
        $this->amountOfMoney = $amountOfMoney;
        $this->references = $references;
        $this->paymentIntentId = $paymentIntentId;
        $this->paymentId = $paymentId;
    }

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
    public function getPaymentIntentId(): ?string
    {
        return $this->paymentIntentId;
    }
    public function setPaymentIntentId(?string $paymentIntentId): self
    {
        $this->paymentIntentId = $paymentIntentId;
        return $this;
    }
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }
    public function setPaymentId(?string $paymentId): self
    {
        $this->paymentId = $paymentId;
        return $this;
    }
}
