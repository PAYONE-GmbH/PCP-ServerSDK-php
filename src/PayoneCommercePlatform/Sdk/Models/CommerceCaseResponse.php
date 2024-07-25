<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use DateTime;

/**
 * @description Response object containing details of a Commerce Case.
 */
class CommerceCaseResponse
{
    /**
     * @var string|null Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes.
     */
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;

    /**
     * @var string|null Unique ID reference of the Commerce Case. It can be used to add additional Checkouts to the Commerce Case.
     */
    #[SerializedName('commerceCaseId')]
    protected ?string $commerceCaseId;

    /**
     * @var Customer|null The customer details.
     */
    #[SerializedName('customer')]
    protected ?Customer $customer;

    /**
     * @var CheckoutResponse[]|null List of checkouts associated with the Commerce Case.
     */
    #[SerializedName('checkouts')]
    protected ?array $checkouts;

    /**
     * @var DateTime|null The creation date and time of the Commerce Case in RFC3339 format.
     */
    #[SerializedName('creationDateTime')]
    protected ?DateTime $creationDateTime;

    public function __construct(
        ?string $merchantReference = null,
        ?string $commerceCaseId = null,
        ?Customer $customer = null,
        ?array $checkouts = null,
        ?DateTime $creationDateTime = null
    ) {
        $this->merchantReference = $merchantReference;
        $this->commerceCaseId = $commerceCaseId;
        $this->customer = $customer;
        $this->checkouts = $checkouts;
        $this->creationDateTime = $creationDateTime;
    }

    // Getters and Setters
    public function getMerchantReference(): ?string
    {
        return $this->merchantReference;
    }

    public function setMerchantReference(?string $merchantReference): self
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    public function getCommerceCaseId(): ?string
    {
        return $this->commerceCaseId;
    }

    public function setCommerceCaseId(?string $commerceCaseId): self
    {
        $this->commerceCaseId = $commerceCaseId;
        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCheckouts(): ?array
    {
        return $this->checkouts;
    }

    public function setCheckouts(?array $checkouts): self
    {
        $this->checkouts = $checkouts;
        return $this;
    }

    public function getCreationDateTime(): ?DateTime
    {
        return $this->creationDateTime;
    }

    public function setCreationDateTime(?DateTime $creationDateTime): self
    {
        $this->creationDateTime = $creationDateTime;
        return $this;
    }
}
