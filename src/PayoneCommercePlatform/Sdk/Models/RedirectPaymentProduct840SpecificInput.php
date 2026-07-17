<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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

    public function __construct(
        ?bool $addressSelectionAtPayPal = null,
        ?string $fraudNetId = null,
        ?bool $javaScriptSdkFlow = null
    ) {
        parent::__construct($addressSelectionAtPayPal, $javaScriptSdkFlow);
        $this->fraudNetId = $fraudNetId;
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
}
