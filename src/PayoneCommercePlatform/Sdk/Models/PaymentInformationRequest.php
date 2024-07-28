<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentType;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;

/**
 * @description Request object for payment information.
 */
class PaymentInformationRequest
{
    /**
     * @var AmountOfMoney The amount of money for the payment.
     */
    #[SerializedName('amountOfMoney')]
    protected AmountOfMoney $amountOfMoney;

    /**
     * @var PaymentType The type of the payment.
     */
    #[SerializedName('type')]
    protected PaymentType $type;

    /**
     * @var PaymentChannel The channel via which the payment is created.
     */
    #[SerializedName('paymentChannel')]
    protected PaymentChannel $paymentChannel;

    /**
     * @var int The payment product identifier.
     */
    #[SerializedName('paymentProductId')]
    protected int $paymentProductId;

    /**
     * @var string|null Unique reference of the PaymentInformation. In case of card present transactions, the reference from the ECR or terminal will be used. It is always the reference for external transactions. (e.g. card present payments, cash payments or payments processed by other payment providers).
     */
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;

    public function __construct(
        AmountOfMoney $amountOfMoney,
        PaymentType $type,
        PaymentChannel $paymentChannel,
        int $paymentProductId,
        ?string $merchantReference = null
    ) {
        $this->amountOfMoney = $amountOfMoney;
        $this->type = $type;
        $this->paymentChannel = $paymentChannel;
        $this->paymentProductId = $paymentProductId;
        $this->merchantReference = $merchantReference;
    }

    // Getters and Setters
    public function getAmountOfMoney(): AmountOfMoney
    {
        return $this->amountOfMoney;
    }

    public function setAmountOfMoney(AmountOfMoney $amountOfMoney): self
    {
        $this->amountOfMoney = $amountOfMoney;
        return $this;
    }

    public function getType(): PaymentType
    {
        return $this->type;
    }

    public function setType(PaymentType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getPaymentChannel(): PaymentChannel
    {
        return $this->paymentChannel;
    }

    public function setPaymentChannel(PaymentChannel $paymentChannel): self
    {
        $this->paymentChannel = $paymentChannel;
        return $this;
    }

    public function getPaymentProductId(): int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }

    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }

    public function setMerchantReference(?string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }
}
