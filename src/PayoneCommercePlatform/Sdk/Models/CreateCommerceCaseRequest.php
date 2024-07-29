<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\Customer;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use DateTime;

/**
 * @description Request to create a Commerce Case.
 */
class CreateCommerceCaseRequest
{
    /**
     * @var string|null Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes.
     */
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;

    /**
     * @var Customer|null The customer details.
     */
    #[SerializedName('customer')]
    protected ?Customer $customer;

    /**
     * @var DateTime|null Creation date and time of the Commerce Case in RFC3339 format.
     */
    #[SerializedName('creationDateTime')]
    protected ?DateTime $creationDateTime;

    /**
     * @var CreateCheckoutRequest|null The checkout request.
     */
    #[SerializedName('checkout')]
    protected ?CreateCheckoutRequest $checkout;

    public function __construct(
        ?string $merchantReference = null,
        ?Customer $customer = null,
        ?DateTime $creationDateTime = null,
        ?CreateCheckoutRequest $checkout = null
    ) {
        $this->merchantReference = $merchantReference;
        $this->customer = $customer;
        $this->creationDateTime = $creationDateTime;
        $this->checkout = $checkout;
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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
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

    public function getCheckout(): ?CreateCheckoutRequest
    {
        return $this->checkout;
    }

    public function setCheckout(?CreateCheckoutRequest $checkout): self
    {
        $this->checkout = $checkout;
        return $this;
    }
}
