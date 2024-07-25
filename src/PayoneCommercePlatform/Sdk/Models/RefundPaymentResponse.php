<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description This object has the numeric representation of the current Refund status, timestamp of last status change and performable action on the current Refund resource. In case of a rejected Refund, detailed error information is listed.
 */
class RefundPaymentResponse
{
    /**
     * @var RefundOutput|null The refund output details.
     */
    #[SerializedName('refundOutput')]
    protected ?RefundOutput $refundOutput;

    /**
     * @var StatusValue|null The current status of the refund.
     */
    #[SerializedName('status')]
    protected ?StatusValue $status;

    /**
     * @var PaymentStatusOutput|null The detailed status output of the payment.
     */
    #[SerializedName('statusOutput')]
    protected ?PaymentStatusOutput $statusOutput;

    /**
     * @var string|null Unique payment transaction identifier of the payment gateway.
     */
    #[SerializedName('id')]
    protected ?string $id;

    public function __construct(
        ?RefundOutput $refundOutput = null,
        ?StatusValue $status = null,
        ?PaymentStatusOutput $statusOutput = null,
        ?string $id = null
    ) {
        $this->refundOutput = $refundOutput;
        $this->status = $status;
        $this->statusOutput = $statusOutput;
        $this->id = $id;
    }

    // Getters and Setters
    public function getRefundOutput(): ?RefundOutput
    {
        return $this->refundOutput;
    }

    public function setRefundOutput(?RefundOutput $refundOutput): self
    {
        $this->refundOutput = $refundOutput;
        return $this;
    }

    public function getStatus(): ?StatusValue
    {
        return $this->status;
    }

    public function setStatus(?StatusValue $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusOutput(): ?PaymentStatusOutput
    {
        return $this->statusOutput;
    }

    public function setStatusOutput(?PaymentStatusOutput $statusOutput): self
    {
        $this->statusOutput = $statusOutput;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }
}
