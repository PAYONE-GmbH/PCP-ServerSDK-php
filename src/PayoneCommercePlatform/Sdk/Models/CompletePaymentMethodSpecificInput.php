<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description To complete the Order the completePaymentMethodSpecificInput has to be provided, containing the selected installmentOptionId as well as the bankAccountInformation of the customer.
 */
class CompletePaymentMethodSpecificInput
{
    /**
     * @var PaymentProduct3391SpecificInput|null Specific input details for PAYONE Secured Installment.
     */
    #[SerializedName('paymentProduct3391SpecificInput')]
    protected ?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput;

    public function __construct(
        ?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput = null
    ) {
        $this->paymentProduct3391SpecificInput = $paymentProduct3391SpecificInput;
    }

    // Getters and Setters
    public function getPaymentProduct3391SpecificInput(): ?PaymentProduct3391SpecificInput
    {
        return $this->paymentProduct3391SpecificInput;
    }

    public function setPaymentProduct3391SpecificInput(?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput): self
    {
        $this->paymentProduct3391SpecificInput = $paymentProduct3391SpecificInput;
        return $this;
    }
}
