<?php

namespace PayoneCommercePlatform\Sdk\Queries;

use PayoneCommercePlatform\Sdk\Models\ExtendedCheckoutStatus;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\StatusCheckout;
use DateTime;

class GetCheckoutsQuery
{
    private ?int $offset = null;
    private ?int $size = null;
    private ?DateTime $fromDate = null;
    private ?DateTime $toDate = null;
    private ?int $fromCheckoutAmount = null;
    private ?int $toCheckoutAmount = null;
    private ?int $fromOpenAmount = null;
    private ?int $toOpenAmount = null;
    private ?int $fromCollectedAmount = null;
    private ?int $toCollectedAmount = null;
    private ?int $fromCancelledAmount = null;
    private ?int $toCancelledAmount = null;
    private ?int $fromRefundAmount = null;
    private ?int $toRefundAmount = null;
    private ?int $fromChargebackAmount = null;
    private ?int $toChargebackAmount = null;
    private ?string $checkoutId = null;
    private ?string $merchantReference = null;
    private ?string $merchantCustomerId = null;
    /** @type array<string>|null */
    private ?array $includePaymentProductId = null;
    /** @type array<StatusCheckout>|null */
    private ?array $includeCheckoutStatus = null;
    /** @type array<ExtendedCheckoutStatus>|null */
    private ?array $includeExtendedCheckoutStatus = null;
    /** @type array<PaymentChannel>|null */
    private ?array $includePaymentChannel = null;
    private ?string $paymentReference = null;
    private ?string $paymentId = null;
    private ?string $firstName = null;
    private ?string $surname = null;
    private ?string $email = null;
    private ?string $phoneNumber = null;
    private ?string $dateOfBirth = null;
    private ?string $companyInformation = null;

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

    public function setFromCheckoutAmount(?int $fromCheckoutAmount): self
    {
        $this->fromCheckoutAmount = $fromCheckoutAmount;
        return $this;
    }

    public function setToCheckoutAmount(?int $toCheckoutAmount): self
    {
        $this->toCheckoutAmount = $toCheckoutAmount;
        return $this;
    }

    public function setFromOpenAmount(?int $fromOpenAmount): self
    {
        $this->fromOpenAmount = $fromOpenAmount;
        return $this;
    }

    public function setToOpenAmount(?int $toOpenAmount): self
    {
        $this->toOpenAmount = $toOpenAmount;
        return $this;
    }

    public function setFromCollectedAmount(?int $fromCollectedAmount): self
    {
        $this->fromCollectedAmount = $fromCollectedAmount;
        return $this;
    }

    public function setToCollectedAmount(?int $toCollectedAmount): self
    {
        $this->toCollectedAmount = $toCollectedAmount;
        return $this;
    }

    public function setFromCancelledAmount(?int $fromCancelledAmount): self
    {
        $this->fromCancelledAmount = $fromCancelledAmount;
        return $this;
    }

    public function setToCancelledAmount(?int $toCancelledAmount): self
    {
        $this->toCancelledAmount = $toCancelledAmount;
        return $this;
    }

    public function setFromRefundAmount(?int $fromRefundAmount): self
    {
        $this->fromRefundAmount = $fromRefundAmount;
        return $this;
    }

    public function setToRefundAmount(?int $toRefundAmount): self
    {
        $this->toRefundAmount = $toRefundAmount;
        return $this;
    }

    public function setFromChargebackAmount(?int $fromChargebackAmount): self
    {
        $this->fromChargebackAmount = $fromChargebackAmount;
        return $this;
    }

    public function setToChargebackAmount(?int $toChargebackAmount): self
    {
        $this->toChargebackAmount = $toChargebackAmount;
        return $this;
    }

    public function setCheckoutId(?string $checkoutId): self
    {
        $this->checkoutId = $checkoutId;
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

    public function setIncludePaymentProductId(?array $includePaymentProductId): self
    {
        $this->includePaymentProductId = $includePaymentProductId;
        return $this;
    }

    public function setIncludeCheckoutStatus(?array $includeCheckoutStatus): self
    {
        $this->includeCheckoutStatus = $includeCheckoutStatus;
        return $this;
    }

    public function setIncludeExtendedCheckoutStatus(?array $includeExtendedCheckoutStatus): self
    {
        $this->includeExtendedCheckoutStatus = $includeExtendedCheckoutStatus;
        return $this;
    }

    public function setIncludePaymentChannel(?array $includePaymentChannel): self
    {
        $this->includePaymentChannel = $includePaymentChannel;
        return $this;
    }

    public function setPaymentReference(?string $paymentReference): self
    {
        $this->paymentReference = $paymentReference;
        return $this;
    }

    public function setPaymentId(?string $paymentId): self
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function setDateOfBirth(?string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function setCompanyInformation(?string $companyInformation): self
    {
        $this->companyInformation = $companyInformation;
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

    public function getFromCheckoutAmount(): ?int
    {
        return $this->fromCheckoutAmount;
    }

    public function getToCheckoutAmount(): ?int
    {
        return $this->toCheckoutAmount;
    }

    public function getFromOpenAmount(): ?int
    {
        return $this->fromOpenAmount;
    }

    public function getToOpenAmount(): ?int
    {
        return $this->toOpenAmount;
    }

    public function getFromCollectedAmount(): ?int
    {
        return $this->fromCollectedAmount;
    }

    public function getToCollectedAmount(): ?int
    {
        return $this->toCollectedAmount;
    }

    public function getFromCancelledAmount(): ?int
    {
        return $this->fromCancelledAmount;
    }

    public function getToCancelledAmount(): ?int
    {
        return $this->toCancelledAmount;
    }

    public function getFromRefundAmount(): ?int
    {
        return $this->fromRefundAmount;
    }

    public function getToRefundAmount(): ?int
    {
        return $this->toRefundAmount;
    }

    public function getFromChargebackAmount(): ?int
    {
        return $this->fromChargebackAmount;
    }

    public function getToChargebackAmount(): ?int
    {
        return $this->toChargebackAmount;
    }

    public function getCheckoutId(): ?string
    {
        return $this->checkoutId;
    }

    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }

    public function getMerchantCustomerId(): ?string
    {
        return $this->merchantCustomerId;
    }

    /** @return array<string>|null */
    public function getIncludePaymentProductId(): ?array
    {
        return $this->includePaymentProductId;
    }

    /** @return array<StatusCheckout>|null */
    public function getIncludeCheckoutStatus(): ?array
    {
        return $this->includeCheckoutStatus;
    }

    /** @return array<ExtendedCheckoutStatus>|null */
    public function getIncludeExtendedCheckoutStatus(): ?array
    {
        return $this->includeExtendedCheckoutStatus;
    }

    /** @return array<PaymentChannel>|null */
    public function getIncludePaymentChannel(): ?array
    {
        return $this->includePaymentChannel;
    }

    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    public function getCompanyInformation(): ?string
    {
        return $this->companyInformation;
    }

    /** @return array<string, string> */
    protected function toQueryMap(): array
    {
        /** @var array<string, string> */
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
        if ($this->fromCheckoutAmount !== null) {
            $query['fromCheckoutAmount'] = $this->fromCheckoutAmount;
        }
        if ($this->toCheckoutAmount !== null) {
            $query['toCheckoutAmount'] = $this->toCheckoutAmount;
        }
        if ($this->fromOpenAmount !== null) {
            $query['fromOpenAmount'] = $this->fromOpenAmount;
        }
        if ($this->toOpenAmount !== null) {
            $query['toOpenAmount'] = $this->toOpenAmount;
        }
        if ($this->fromCollectedAmount !== null) {
            $query['fromCollectedAmount'] = $this->fromCollectedAmount;
        }
        if ($this->toCollectedAmount !== null) {
            $query['toCollectedAmount'] = $this->toCollectedAmount;
        }
        if ($this->fromCancelledAmount !== null) {
            $query['fromCancelledAmount'] = $this->fromCancelledAmount;
        }
        if ($this->toCancelledAmount !== null) {
            $query['toCancelledAmount'] = $this->toCancelledAmount;
        }
        if ($this->fromRefundAmount !== null) {
            $query['fromRefundAmount'] = $this->fromRefundAmount;
        }
        if ($this->toRefundAmount !== null) {
            $query['toRefundAmount'] = $this->toRefundAmount;
        }
        if ($this->fromChargebackAmount !== null) {
            $query['fromChargebackAmount'] = $this->fromChargebackAmount;
        }
        if ($this->toChargebackAmount !== null) {
            $query['toChargebackAmount'] = $this->toChargebackAmount;
        }
        if ($this->checkoutId !== null) {
            $query['checkoutId'] = $this->checkoutId;
        }
        if ($this->merchantReference !== null) {
            $query['merchantReference'] = $this->merchantReference;
        }
        if ($this->merchantCustomerId !== null) {
            $query['merchantCustomerId'] = $this->merchantCustomerId;
        }
        if ($this->includePaymentProductId !== null) {
            $query['includePaymentProductId'] = implode(',', $this->includePaymentProductId);
        }
        if ($this->includeCheckoutStatus !== null) {
            $query['includeCheckoutStatus'] = implode(',', array_map(fn ($status) => $status->value, $this->includeCheckoutStatus));
        }
        if ($this->includeExtendedCheckoutStatus !== null) {
            $query['includeExtendedCheckoutStatus'] = implode(',', array_map(fn ($status) => $status->value, $this->includeExtendedCheckoutStatus));
        }
        if ($this->includePaymentChannel !== null) {
            $query['includePaymentChannel'] = implode(',', array_map(fn ($channel) => $channel->value, $this->includePaymentChannel));
        }
        if ($this->paymentReference !== null) {
            $query['paymentReference'] = $this->paymentReference;
        }
        if ($this->paymentId !== null) {
            $query['paymentId'] = $this->paymentId;
        }
        if ($this->firstName !== null) {
            $query['firstName'] = $this->firstName;
        }
        if ($this->surname !== null) {
            $query['surname'] = $this->surname;
        }
        if ($this->email !== null) {
            $query['email'] = $this->email;
        }
        if ($this->phoneNumber !== null) {
            $query['phoneNumber'] = $this->phoneNumber;
        }
        if ($this->dateOfBirth !== null) {
            $query['dateOfBirth'] = $this->dateOfBirth;
        }
        if ($this->companyInformation !== null) {
            $query['companyInformation'] = $this->companyInformation;
        }

        return $query;
    }
}
