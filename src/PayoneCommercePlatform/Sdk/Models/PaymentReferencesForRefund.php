<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object that holds all reference properties that are linked to this transaction.
 *              Extends PaymentReferences with an optional reference to the specific capture to refund.
 */
class PaymentReferencesForRefund extends PaymentReferences
{
    /**
     * @var string|null Reference of the capture that should be used for the refund.
     */
    #[SerializedName('captureReference')]
    protected ?string $captureReference;

    public function __construct(
        string $merchantReference,
        ?string $captureReference = null,
    ) {
        parent::__construct($merchantReference);
        $this->captureReference = $captureReference;
    }

    // Getters and Setters
    public function getCaptureReference(): ?string
    {
        return $this->captureReference;
    }

    public function setCaptureReference(?string $captureReference): self
    {
        $this->captureReference = $captureReference;
        return $this;
    }
}
