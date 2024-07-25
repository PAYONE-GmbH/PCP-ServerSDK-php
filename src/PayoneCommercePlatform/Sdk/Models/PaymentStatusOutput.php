<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description This object has the numeric representation of the current payment status, timestamp of last status change and performable action on the current payment resource. In case of failed payments and negative scenarios, detailed error information is listed.
 */
class PaymentStatusOutput
{
    /**
     * @var bool|null Flag indicating if the payment can be cancelled.
     */
    #[SerializedName('isCancellable')]
    protected ?bool $isCancellable;

    /**
     * @var StatusCategoryValue|null High-level status of the payment, payout or refund.
     */
    protected ?StatusCategoryValue $statusCategory;

    /**
     * @var bool|null Indicates if the transaction has been authorized.
     */
    #[SerializedName('isAuthorized')]
    protected ?bool $isAuthorized;

    /**
     * @var bool|null Flag indicating if the payment can be refunded.
     */
    #[SerializedName('isRefundable')]
    protected ?bool $isRefundable;

    public function __construct(
        ?bool $isCancellable = null,
        ?StatusCategoryValue $statusCategory = null,
        ?bool $isAuthorized = null,
        ?bool $isRefundable = null
    ) {
        $this->isCancellable = $isCancellable;
        $this->statusCategory = $statusCategory;
        $this->isAuthorized = $isAuthorized;
        $this->isRefundable = $isRefundable;
    }

    // Getters and Setters
    public function getIsCancellable(): ?bool
    {
        return $this->isCancellable;
    }

    public function setIsCancellable(?bool $isCancellable): self
    {
        $this->isCancellable = $isCancellable;
        return $this;
    }

    public function getStatusCategory(): ?StatusCategoryValue
    {
        return $this->statusCategory;
    }

    public function setStatusCategory(?StatusCategoryValue $statusCategory): self
    {
        $this->statusCategory = $statusCategory;
        return $this;
    }

    public function getIsAuthorized(): ?bool
    {
        return $this->isAuthorized;
    }

    public function setIsAuthorized(?bool $isAuthorized): self
    {
        $this->isAuthorized = $isAuthorized;
        return $this;
    }

    public function getIsRefundable(): ?bool
    {
        return $this->isRefundable;
    }

    public function setIsRefundable(?bool $isRefundable): self
    {
        $this->isRefundable = $isRefundable;
        return $this;
    }
}
