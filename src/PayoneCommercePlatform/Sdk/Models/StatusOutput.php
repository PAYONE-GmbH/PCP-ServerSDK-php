<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Contains information about whether the payment of the Checkout has already been completed and how much of the total sum has been collected already.
 */
class StatusOutput
{
    /**
     * @var string|null The payment status of the checkout.
     */
    #[SerializedName('paymentStatus')]
    protected ?string $paymentStatus;

    /**
     * @var bool|null Indicates whether the Checkout can still be modified. False if any payment is already in progress, true otherwise.
     */
    #[SerializedName('isModifiable')]
    protected ?bool $isModifiable;

    /**
     * @var int|null The amount yet to be paid in cents, always having 2 decimals.
     */
    #[SerializedName('openAmount')]
    protected ?int $openAmount;

    /**
     * @var int|null The amount that has already been collected in cents, always having 2 decimals.
     */
    #[SerializedName('collectedAmount')]
    protected ?int $collectedAmount;

    /**
     * @var int|null The amount that has already been cancelled in cents, always having 2 decimals.
     */
    #[SerializedName('cancelledAmount')]
    protected ?int $cancelledAmount;

    /**
     * @var int|null The amount that has been collected but was refunded to the customer in cents, always having 2 decimals.
     */
    #[SerializedName('refundedAmount')]
    protected ?int $refundedAmount;

    /**
     * @var int|null The amount that has been collected but was charged back by the customer in cents, always having 2 decimals.
     */
    #[SerializedName('chargebackAmount')]
    protected ?int $chargebackAmount;

    public function __construct(
        ?string $paymentStatus = null,
        ?bool $isModifiable = null,
        ?int $openAmount = null,
        ?int $collectedAmount = null,
        ?int $cancelledAmount = null,
        ?int $refundedAmount = null,
        ?int $chargebackAmount = null
    ) {
        $this->paymentStatus = $paymentStatus;
        $this->isModifiable = $isModifiable;
        $this->openAmount = $openAmount;
        $this->collectedAmount = $collectedAmount;
        $this->cancelledAmount = $cancelledAmount;
        $this->refundedAmount = $refundedAmount;
        $this->chargebackAmount = $chargebackAmount;
    }

    // Getters and Setters
    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(?string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    public function getIsModifiable(): ?bool
    {
        return $this->isModifiable;
    }

    public function setIsModifiable(?bool $isModifiable): self
    {
        $this->isModifiable = $isModifiable;
        return $this;
    }

    public function getOpenAmount(): ?int
    {
        return $this->openAmount;
    }

    public function setOpenAmount(?int $openAmount): self
    {
        $this->openAmount = $openAmount;
        return $this;
    }

    public function getCollectedAmount(): ?int
    {
        return $this->collectedAmount;
    }

    public function setCollectedAmount(?int $collectedAmount): self
    {
        $this->collectedAmount = $collectedAmount;
        return $this;
    }

    public function getCancelledAmount(): ?int
    {
        return $this->cancelledAmount;
    }

    public function setCancelledAmount(?int $cancelledAmount): self
    {
        $this->cancelledAmount = $cancelledAmount;
        return $this;
    }

    public function getRefundedAmount(): ?int
    {
        return $this->refundedAmount;
    }

    public function setRefundedAmount(?int $refundedAmount): self
    {
        $this->refundedAmount = $refundedAmount;
        return $this;
    }

    public function getChargebackAmount(): ?int
    {
        return $this->chargebackAmount;
    }

    public function setChargebackAmount(?int $chargebackAmount): self
    {
        $this->chargebackAmount = $chargebackAmount;
        return $this;
    }
}
