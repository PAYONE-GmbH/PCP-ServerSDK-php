<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the details of the created payment.
 */
class PaymentCreationOutput
{
    /**
     * @var string|null The external reference is an identifier for this transaction and can be used for reconciliation purposes.
     */
    #[SerializedName('externalReference')]
    protected ?string $externalReference;

    public function __construct(
        ?string $externalReference = null
    ) {
        $this->externalReference = $externalReference;
    }

    // Getters and Setters
    public function getExternalReference(): ?string
    {
        return $this->externalReference;
    }

    public function setExternalReference(?string $externalReference): self
    {
        $this->externalReference = $externalReference;
        return $this;
    }
}
