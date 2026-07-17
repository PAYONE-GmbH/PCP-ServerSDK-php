<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description PayPal (payment product 840) specific details.
 */
class PaymentProduct840SpecificOutput extends PaymentProduct840SpecificOutputData
{
    /**
     * @var Address|null Shipping address associated with the PayPal account.
     */
    #[SerializedName('shippingAddress')]
    protected ?Address $shippingAddress;

    public function __construct(
        ?Address $billingAddress = null,
        ?PaymentProduct840CustomerAccount $customerAccount = null,
        ?Address $shippingAddress = null,
        ?string $payPalTransactionId = null
    ) {
        parent::__construct($billingAddress, $customerAccount, $payPalTransactionId);
        $this->shippingAddress = $shippingAddress;
    }

    // Getters and Setters
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }
}
