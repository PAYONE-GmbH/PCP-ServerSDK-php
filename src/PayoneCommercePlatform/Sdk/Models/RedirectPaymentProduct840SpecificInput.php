<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Object containing specific input required for PayPal payments (Payment product ID 840)
 */
class RedirectPaymentProduct840SpecificInput extends RedirectPaymentProduct840SpecificInputData
{
    /**
     * @var string|null A unique ID determined by the merchant, to link a Paypal transaction to a FraudNet PayPal risk session.
     * Only applicable to customer-initiated transactions, when the FraudNet SDK is used, and to be passed in the API request the same tracking ID value
     * (FraudNet Session Identifier).
     */
    #[SerializedName('fraudNetId')]
    protected ?string $fraudNetId;

    /**
     * @var string|null Unique payment transaction identifier of the payment gateway. Required for PayPal Express to associate the request with the original payment intent.
     */
    #[SerializedName('paymentId')]
    protected ?string $paymentId;

    public function __construct(
        ?bool $addressSelectionAtPayPal = null,
        ?string $fraudNetId = null,
        ?bool $javaScriptSdkFlow = null,
        ?string $paymentId = null
    ) {
        parent::__construct($addressSelectionAtPayPal, $javaScriptSdkFlow);
        $this->fraudNetId = $fraudNetId;
        $this->paymentId = $paymentId;
    }

    // Getters and Setters
    public function getFraudNetId(): ?string
    {
        return $this->fraudNetId;
    }

    public function setFraudNetId(?string $fraudNetId): self
    {
        $this->fraudNetId = $fraudNetId;
        return $this;
    }

    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    public function setPaymentId(?string $paymentId): self
    {
        $this->paymentId = $paymentId;
        return $this;
    }
}
