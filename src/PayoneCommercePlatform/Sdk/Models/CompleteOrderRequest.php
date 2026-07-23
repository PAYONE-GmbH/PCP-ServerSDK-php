<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CompleteOrderRequest
{
    /**
     * @var CompletePaymentMethodSpecificInput|null Contains the specific input required to complete the payment.
     */
    #[SerializedName('completePaymentMethodSpecificInput')]
    protected ?CompletePaymentMethodSpecificInput $completePaymentMethodSpecificInput;

    public function __construct(?CompletePaymentMethodSpecificInput $completePaymentMethodSpecificInput = null)
    {
        $this->completePaymentMethodSpecificInput = $completePaymentMethodSpecificInput;
    }

    // Getters and Setters
    public function getCompletePaymentMethodSpecificInput(): ?CompletePaymentMethodSpecificInput
    {
        return $this->completePaymentMethodSpecificInput;
    }

    public function setCompletePaymentMethodSpecificInput(?CompletePaymentMethodSpecificInput $completePaymentMethodSpecificInput): self
    {
        $this->completePaymentMethodSpecificInput = $completePaymentMethodSpecificInput;
        return $this;
    }
}
