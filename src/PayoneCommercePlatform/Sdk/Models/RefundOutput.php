<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentReferences;

/**
 * @description Object containing Refund details.
 */
class RefundOutput
{
    /**
     * @var AmountOfMoney|null The amount of money for the refund.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var string|null Additional parameters for the transaction in JSON format. This field must not contain any personal data.
     */
    #[SerializedName('merchantParameters')]
    protected ?string $merchantParameters;

    /**
     * @var PaymentReferences|null The payment references.
     */
    #[SerializedName('references')]
    protected ?PaymentReferences $references;

    /**
     * @var string|null Payment method identifier used by the payment engine.
     */
    #[SerializedName('paymentMethod')]
    protected ?string $paymentMethod;

    public function __construct(
        ?AmountOfMoney $amountOfMoney = null,
        ?string $merchantParameters = null,
        ?PaymentReferences $references = null,
        ?string $paymentMethod = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->merchantParameters = $merchantParameters;
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

    public function getMerchantParameters(): ?string
    {
        return $this->merchantParameters;
    }

    public function setMerchantParameters(?string $merchantParameters): self
    {
        $this->merchantParameters = $merchantParameters;
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
