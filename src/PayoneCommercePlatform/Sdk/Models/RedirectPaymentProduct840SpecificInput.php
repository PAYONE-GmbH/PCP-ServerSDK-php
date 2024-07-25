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

    public function __construct(
        bool $addressSelectionAtPayPal = false
    ) {
        $this->addressSelectionAtPayPal = $addressSelectionAtPayPal;
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
}
