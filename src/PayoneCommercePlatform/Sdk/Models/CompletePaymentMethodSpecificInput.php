<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

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

    /**
     * @var CompletePaymentProduct840SpecificInput|null Specific input details for PayPal completions.
     */
    #[SerializedName('paymentProduct840SpecificInput')]
    protected ?CompletePaymentProduct840SpecificInput $paymentProduct840SpecificInput;

    public function __construct(
        ?PaymentProduct3391SpecificInput $paymentProduct3391SpecificInput = null,
        ?CompletePaymentProduct840SpecificInput $paymentProduct840SpecificInput = null
    ) {
        $this->paymentProduct3391SpecificInput = $paymentProduct3391SpecificInput;
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
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

    public function getPaymentProduct840SpecificInput(): ?CompletePaymentProduct840SpecificInput
    {
        return $this->paymentProduct840SpecificInput;
    }

    public function setPaymentProduct840SpecificInput(?CompletePaymentProduct840SpecificInput $paymentProduct840SpecificInput): self
    {
        $this->paymentProduct840SpecificInput = $paymentProduct840SpecificInput;
        return $this;
    }
}
