<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing specific input required for PayPal payments (Payment product ID 840)
 */
class RedirectPaymentProduct840SpecificInput
{
    /**
     * @var bool Indicates whether to use PayPal Express Checkout Shortcut.
     * * true = When shortcut is enabled, the consumer can select a shipping address during PayPal checkout.
     * * false = When shortcut is disabled, the consumer cannot change the shipping address.
     * Default value is false.
     * Please note that this field is ignored when order.additionalInput.typeInformation.purchaseType is set to "digital".
     */
    #[SerializedName('addressSelectionAtPayPal')]
    protected bool $addressSelectionAtPayPal;

    /**
     * @var string|null A unique ID determined by the merchant, to link a Paypal transaction to a FraudNet PayPal risk session.
     * Only applicable to customer-initiated transactions, when the FraudNet SDK is used, and to be passed in the API request the same tracking ID value
     * (FraudNet Session Identifier).
     */
    #[SerializedName('fraudNetId')]
    protected ?string $fraudNetId;

    /**
     * @var bool Required parameter which defines how PayPal is being integrated inside the checkout page.
     * * true = the current integration uses PayPal SDK
     * * false = classic usage with PayPal Redirect flow
     */
    #[SerializedName('javaScriptSdkFlow')]
    protected bool $javaScriptSdkFlow = false;

    /**
     * @var string|null Required parameter for a COMPLETE CALL (not only an ORDER CALL) which with value "CONFIRM_ORDER_STATUS" signals process is finished on merchant side.
     */
    #[SerializedName('action')]
    protected ?string $action = null;

    public function __construct(
        bool $addressSelectionAtPayPal = false,
        ?string $fraudNetId = null,
        bool $javaScriptSdkFlow = false,
        ?string $action = null
    ) {
        $this->addressSelectionAtPayPal = $addressSelectionAtPayPal;
        $this->fraudNetId = $fraudNetId;
        $this->javaScriptSdkFlow = $javaScriptSdkFlow;
        $this->action = $action;
    }

    // Getters and Setters
    public function getAddressSelectionAtPayPal(): bool
    {
        return $this->addressSelectionAtPayPal;
    }

    public function setAddressSelectionAtPayPal(bool $addressSelectionAtPayPal): self
    {
        $this->addressSelectionAtPayPal = $addressSelectionAtPayPal;
        return $this;
    }

    public function getFraudNetId(): ?string
    {
        return $this->fraudNetId;
    }

    public function setFraudNetId(?string $fraudNetId): self
    {
        $this->fraudNetId = $fraudNetId;
        return $this;
    }

    public function getJavaScriptSdkFlow(): bool
    {
        return $this->javaScriptSdkFlow;
    }

    public function setJavaScriptSdkFlow(bool $javaScriptSdkFlow): self
    {
        $this->javaScriptSdkFlow = $javaScriptSdkFlow;
        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;
        return $this;
    }
}
