<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object that holds all reference properties that are linked to this transaction.
 */
class References
{
    /**
     * @var string|null Descriptive text that is used towards the customer, either during an online Checkout at a third party and/or on the statement of the customer. For card transactions this is usually referred to as a Soft Descriptor.
     */
    #[SerializedName('descriptor')]
    protected ?string $descriptor;

    /**
     * @var string|null The merchantReference is a unique identifier for a payment and can be used for reporting purposes. The merchantReference is required for the execution of a payment and has to be unique. In case a payment has failed the same merchantReference can be used again. Once a successful payment has been made the same merchantReference can no longer be used and will be rejected.
     */
    #[SerializedName('merchantReference')]
    protected ?string $merchantReference;

    /**
     * @var string|null It allows you to store additional parameters for the transaction in JSON format. This field must not contain any personal data.
     */
    #[SerializedName('merchantParameters')]
    protected ?string $merchantParameters;

    public function __construct(
        ?string $merchantReference = null,
        ?string $descriptor = null,
        ?string $merchantParameters = null
    ) {
        $this->merchantReference = $merchantReference;
        $this->descriptor = $descriptor;
        $this->merchantParameters = $merchantParameters;
    }

    // Getters and Setters
    public function getDescriptor(): ?string
    {
        return $this->descriptor;
    }

    public function setDescriptor(?string $descriptor): self
    {
        $this->descriptor = $descriptor;
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

    public function getMerchantParameters(): ?string
    {
        return $this->merchantParameters;
    }

    public function setMerchantParameters(?string $merchantParameters): self
    {
        $this->merchantParameters = $merchantParameters;
        return $this;
    }
}
