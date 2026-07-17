<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentProduct840SpecificOutputData
{
    #[SerializedName('billingAddress')]
    protected ?Address $billingAddress;
    #[SerializedName('customerAccount')]
    protected ?PaymentProduct840CustomerAccount $customerAccount;
    #[SerializedName('payPalTransactionId')]
    protected ?string $payPalTransactionId;

    public function __construct(?Address $billingAddress = null, ?PaymentProduct840CustomerAccount $customerAccount = null, ?string $payPalTransactionId = null)
    {
        $this->billingAddress = $billingAddress;
        $this->customerAccount = $customerAccount;
        $this->payPalTransactionId = $payPalTransactionId;
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
    public function getCustomerAccount(): ?PaymentProduct840CustomerAccount
    {
        return $this->customerAccount;
    }
    public function setCustomerAccount(?PaymentProduct840CustomerAccount $customerAccount): self
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
}
