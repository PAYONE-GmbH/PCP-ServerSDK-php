<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentProduct840SpecificOutputForIntent
{
    #[SerializedName('billingAddress')]
    protected ?Address $billingAddress;
    #[SerializedName('customerAccount')]
    protected ?PaymentProduct840CustomerAccountForIntent $customerAccount;
    #[SerializedName('payPalTransactionId')]
    protected ?string $payPalTransactionId;
    #[SerializedName('shippingAddress')]
    protected ?ShippingAddress $shippingAddress;

    public function __construct(?Address $billingAddress = null, ?PaymentProduct840CustomerAccountForIntent $customerAccount = null, ?string $payPalTransactionId = null, ?ShippingAddress $shippingAddress = null)
    {
        $this->billingAddress = $billingAddress;
        $this->customerAccount = $customerAccount;
        $this->payPalTransactionId = $payPalTransactionId;
        $this->shippingAddress = $shippingAddress;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }
    public function setBillingAddress(?Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }
    public function getCustomerAccount(): ?PaymentProduct840CustomerAccountForIntent
    {
        return $this->customerAccount;
    }
    public function setCustomerAccount(?PaymentProduct840CustomerAccountForIntent $customerAccount): self
    {
        $this->customerAccount = $customerAccount;
        return $this;
    }
    public function getPayPalTransactionId(): ?string
    {
        return $this->payPalTransactionId;
    }
    public function setPayPalTransactionId(?string $payPalTransactionId): self
    {
        $this->payPalTransactionId = $payPalTransactionId;
        return $this;
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
