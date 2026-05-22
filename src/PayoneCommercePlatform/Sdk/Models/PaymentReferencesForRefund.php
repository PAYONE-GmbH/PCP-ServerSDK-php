<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Object that holds all reference properties that are linked to this refund transaction.
 * Extends the standard PaymentReferences with an additional captureReference field to support
 * scenarios where a Checkout may contain multiple partial captures from different sellers.
 */
class PaymentReferencesForRefund extends PaymentReferences
{
    /**
     * @var string|null Merchant-provided reference of the capture that this refund should be applied to.
     * A single Checkout can contain multiple partial captures.
     * By supplying the captureReference the merchant ensures the refund is allocated to the correct
     * capture.
     *
     * This value must match the merchantReference that was provided in the PaymentReferences of the
     * original capture request.
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
