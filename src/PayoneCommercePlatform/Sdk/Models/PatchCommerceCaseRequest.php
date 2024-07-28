<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\Customer;

/**
 * @description Update the customer data of the given Commerce Case.
 */
class PatchCommerceCaseRequest
{
    /**
     * @var Customer|null The customer details.
     */
    #[SerializedName('customer')]
    protected ?Customer $customer;

    public function __construct(
        ?Customer $customer = null
    ) {
        $this->customer = $customer;
    }

    // Getters and Setters
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }
}
