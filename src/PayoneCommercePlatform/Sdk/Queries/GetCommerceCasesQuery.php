<?php

namespace PayoneCommercePlatform\Sdk\Queries;

use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\StatusCheckout;
use DateTime;

class GetCommerceCasesQuery
{
    private ?int $offset = null;
    private ?int $size = null;
    private ?DateTime $fromDate = null;
    private ?DateTime $toDate = null;
    private ?string $commerceCaseId = null;
    private ?string $merchantReference = null;
    private ?string $merchantCustomerId = null;
    /** @var array<StatusCheckout> */
    private ?array $includeCheckoutStatus = null;
    /** @var array<PaymentChannel> */
    private ?array $includePaymentChannel = null;

    public function setOffset(?int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function setFromDate(?DateTime $fromDate): self
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    public function setToDate(?DateTime $toDate): self
    {
        $this->toDate = $toDate;
        return $this;
    }

    public function setCommerceCaseId(?string $commerceCaseId): self
    {
        $this->commerceCaseId = $commerceCaseId;
        return $this;
    }

    public function setMerchantReference(?string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    public function setMerchantCustomerId(?string $merchantCustomerId): self
    {
        $this->merchantCustomerId = $merchantCustomerId;
        return $this;
    }

    /**
      * @param array<StatusCheckout> $includeCheckoutStatus
      * @return self
      */
    public function setIncludeCheckoutStatus(?array $includeCheckoutStatus): self
    {
        $this->includeCheckoutStatus = $includeCheckoutStatus;
        return $this;
    }

    /**
      * @param array<PaymentChannel> $includePaymentChannel
      * @return self
      */
    public function setIncludePaymentChannel(?array $includePaymentChannel): self
    {
        $this->includePaymentChannel = $includePaymentChannel;
        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getFromDate(): ?DateTime
    {
        return $this->fromDate;
    }

    public function getToDate(): ?DateTime
    {
        return $this->toDate;
    }

    public function getCommerceCaseId(): ?string
    {
        return $this->commerceCaseId;
    }

    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }

    public function getMerchantCustomerId(): ?string
    {
        return $this->merchantCustomerId;
    }

    /** @return array<StatusCheckout> */
    public function getIncludeCheckoutStatus(): ?array
    {
        return $this->includeCheckoutStatus;
    }

    /** @return array<PaymentChannel> */
    public function getIncludePaymentChannel(): ?array
    {
        return $this->includePaymentChannel;
    }

    /** @return array<string, int|string> */
    public function toQueryMap(): array
    {
        /** @var array<string, int|string> */
        $query = [];

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }
        if ($this->size !== null) {
            $query['size'] = $this->size;
        }
        if ($this->fromDate !== null) {
            $query['fromDate'] = $this->fromDate->format(DateTime::ATOM);
        }
        if ($this->toDate !== null) {
            $query['toDate'] = $this->toDate->format(DateTime::ATOM);
        }
        if ($this->commerceCaseId !== null) {
            $query['commerceCaseId'] = $this->commerceCaseId;
        }
        if ($this->merchantReference !== null) {
            $query['merchantReference'] = $this->merchantReference;
        }
        if ($this->merchantCustomerId !== null) {
            $query['merchantCustomerId'] = $this->merchantCustomerId;
        }
        if ($this->includeCheckoutStatus !== null) {
            $query['includeCheckoutStatus'] = implode(',', array_map(fn ($status) => $status->value, $this->includeCheckoutStatus));
        }
        if ($this->includePaymentChannel !== null) {
            $query['includePaymentChannel'] = implode(',', array_map(fn ($channel) => $channel->value, $this->includePaymentChannel));
        }

        return $query;
    }
}
