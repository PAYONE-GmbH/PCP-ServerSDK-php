<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PaymentProduct840SpecificOutputForIntent extends PaymentProduct840SpecificOutputData
{
    #[SerializedName('shippingAddress')]
    protected ?ShippingAddress $shippingAddress;

    public function __construct(?Address $billingAddress = null, ?PaymentProduct840CustomerAccount $customerAccount = null, ?string $payPalTransactionId = null, ?ShippingAddress $shippingAddress = null)
    {
        parent::__construct($billingAddress, $customerAccount, $payPalTransactionId);
        $this->shippingAddress = $shippingAddress;
    }

    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }
    public function setShippingAddress(?ShippingAddress $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }
}
