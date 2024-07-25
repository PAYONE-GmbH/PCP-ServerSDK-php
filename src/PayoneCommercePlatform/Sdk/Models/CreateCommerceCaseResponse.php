<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use DateTime;

/**
 * @description The response contains references to the created Commerce case and the Checkout. It also contains the payment response if the flag 'autoExecuteOrder' was set to true.
 */
class CreateCommerceCaseResponse
{
    /**
     * @var string|null Unique ID of the Commerce Case. It can be used to add additional Checkouts to the Commerce Case.
     */
    #[SerializedName('commerceCaseId')]
    protected ?string $commerceCaseId;

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
     * @var CreateCheckoutResponse|null The checkout response.
     */
    #[SerializedName('checkout')]
    protected ?CreateCheckoutResponse $checkout;

    /**
     * @var DateTime|null Creation date and time of the Commerce Case in RFC3339 format.
     */
    #[SerializedName('creationDateTime')]
    protected ?DateTime $creationDateTime;

    public function __construct(
        ?string $commerceCaseId = null,
        ?string $merchantReference = null,
        ?Customer $customer = null,
        ?CreateCheckoutResponse $checkout = null,
        ?DateTime $creationDateTime = null
    ) {
        $this->commerceCaseId = $commerceCaseId;
        $this->merchantReference = $merchantReference;
        $this->customer = $customer;
        $this->checkout = $checkout;
        $this->creationDateTime = $creationDateTime;
    }

    // Getters and Setters
    public function getCommerceCaseId(): ?string
    {
        return $this->commerceCaseId;
    }

    public function setCommerceCaseId(?string $commerceCaseId): self
    {
        $this->commerceCaseId = $commerceCaseId;
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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCheckout(): ?CreateCheckoutResponse
    {
        return $this->checkout;
    }

    public function setCheckout(?CreateCheckoutResponse $checkout): self
    {
        $this->checkout = $checkout;
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
