<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\Address;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct840CustomerAccount;

/**
 * @description PayPal (payment product 840) specific details.
 */
class PaymentProduct840SpecificOutput
{
    /**
     * @var string PayPal transaction ID (required).
     */
    #[SerializedName('payPalTransactionId')]
    protected string $payPalTransactionId;

    /**
     * @var Address|null Billing address associated with the PayPal account.
     */
    #[SerializedName('billingAddress')]
    protected ?Address $billingAddress;

    /**
     * @var PaymentProduct840CustomerAccount|null Customer account details of the PayPal account.
     */
    #[SerializedName('customerAccount')]
    protected ?PaymentProduct840CustomerAccount $customerAccount;

    /**
     * @var Address|null Shipping address associated with the PayPal account.
     */
    #[SerializedName('shippingAddress')]
    protected ?Address $shippingAddress;


    public function __construct(
        ?Address $billingAddress = null,
        ?PaymentProduct840CustomerAccount $customerAccount = null,
        ?Address $shippingAddress = null,
        string $payPalTransactionId
    ) {
        $this->billingAddress = $billingAddress;
        $this->customerAccount = $customerAccount;
        $this->shippingAddress = $shippingAddress;
        $this->payPalTransactionId = $payPalTransactionId;
    }

    // Getters and Setters

    public function getPayPalTransactionId(): string
    {
        return $this->payPalTransactionId;
    }

    public function setPayPalTransactionId(string $payPalTransactionId): self
    {
        $this->payPalTransactionId = $payPalTransactionId;
        return $this;
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
