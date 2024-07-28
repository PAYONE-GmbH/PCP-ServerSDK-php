<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\StatusValue;
use PayoneCommercePlatform\Sdk\Models\CancellationReason;
use PayoneCommercePlatform\Sdk\Models\PaymentType;

/**
 * @description Detailed information regarding an occurred payment event.
 */
class PaymentEvent
{
    /**
     * @var PaymentType|null Type of the payment event.
     */
    #[SerializedName('type')]
    protected ?PaymentType $type;

    /**
     * @var AmountOfMoney|null Amount of money involved in the payment event.
     */
    #[SerializedName('amountOfMoney')]
    protected ?AmountOfMoney $amountOfMoney;

    /**
     * @var StatusValue|null Status of the payment event.
     */
    #[SerializedName('paymentStatus')]
    protected ?StatusValue $paymentStatus;

    /**
     * @var CancellationReason|null Reason for the cancellation, if applicable.
     */
    #[SerializedName('cancellationReason')]
    protected ?CancellationReason $cancellationReason;

    /**
     * @var string|null Reason of the Refund (e.g. communicated by or to the customer).
     */
    #[SerializedName('returnReason')]
    protected ?string $returnReason;

    public function __construct(
        ?PaymentType $type = null,
        ?AmountOfMoney $amountOfMoney = null,
        ?StatusValue $paymentStatus = null,
        ?CancellationReason $cancellationReason = null,
        ?string $returnReason = null
    ) {
        $this->type = $type;
        $this->amountOfMoney = $amountOfMoney;
        $this->paymentStatus = $paymentStatus;
        $this->cancellationReason = $cancellationReason;
        $this->returnReason = $returnReason;
    }

    // Getters and Setters
    public function getType(): ?PaymentType
    {
        return $this->type;
    }

    public function setType(?PaymentType $type): self
    {
        $this->type = $type;
        return $this;
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

    public function getPaymentStatus(): ?StatusValue
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(?StatusValue $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    public function getCancellationReason(): ?CancellationReason
    {
        return $this->cancellationReason;
    }

    public function setCancellationReason(?CancellationReason $cancellationReason): self
    {
        $this->cancellationReason = $cancellationReason;
        return $this;
    }

    public function getReturnReason(): ?string
    {
        return $this->returnReason;
    }

    public function setReturnReason(?string $returnReason): self
    {
        $this->returnReason = $returnReason;
        return $this;
    }
}
