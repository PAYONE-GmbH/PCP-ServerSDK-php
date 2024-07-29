<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionSpecificInput;

/**
 * @description Request to trigger a payment for a respective Checkout providing the input for a specific payment method. The data from the Commerce case and the Checkout will not be loaded automatically and there is no validation between the data input in place. Depending on the payment method, information of the customer and / or the shopping cart might be required. For more details regarding payment method specific input please check the documentation.
 */
class PaymentExecutionRequest
{
    /**
     * @var PaymentMethodSpecificInput|null Input for the payment for a respective payment method.
     */
    #[SerializedName('paymentMethodSpecificInput')]
    protected ?PaymentMethodSpecificInput $paymentMethodSpecificInput;

    /**
     * @var PaymentExecutionSpecificInput|null The amount of the paymentSpecificInput might differ from the Checkout amount in case of partial payments but cannot be higher. Additionally, the total amount of the provided shopping cart cannot exceed the Checkout amount. If a different currency is provided than in the Checkout, the payment execution will be declined. Provided details of the customer and shipping from the Checkout will be automatically loaded and used in the Payment Execution request. The ShoppingCart might differ from the one provided in the Checkout (e.g., for partial payments) and might be required by the payment provider (e.g., BNPL). If the ShoppingCart elements differ from the data provided in the Checkout, the existing data will not be overwritten.
     */
    #[SerializedName('paymentExecutionSpecificInput')]
    protected ?PaymentExecutionSpecificInput $paymentExecutionSpecificInput;

    public function __construct(
        ?PaymentMethodSpecificInput $paymentMethodSpecificInput = null,
        ?PaymentExecutionSpecificInput $paymentExecutionSpecificInput = null
    ) {
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
        $this->paymentExecutionSpecificInput = $paymentExecutionSpecificInput;
    }

    // Getters and Setters
    public function getPaymentMethodSpecificInput(): ?PaymentMethodSpecificInput
    {
        return $this->paymentMethodSpecificInput;
    }

    public function setPaymentMethodSpecificInput(?PaymentMethodSpecificInput $paymentMethodSpecificInput): self
    {
        $this->paymentMethodSpecificInput = $paymentMethodSpecificInput;
        return $this;
    }

    public function getPaymentExecutionSpecificInput(): ?PaymentExecutionSpecificInput
    {
        return $this->paymentExecutionSpecificInput;
    }

    public function setPaymentExecutionSpecificInput(?PaymentExecutionSpecificInput $paymentExecutionSpecificInput): self
    {
        $this->paymentExecutionSpecificInput = $paymentExecutionSpecificInput;
        return $this;
    }
}
