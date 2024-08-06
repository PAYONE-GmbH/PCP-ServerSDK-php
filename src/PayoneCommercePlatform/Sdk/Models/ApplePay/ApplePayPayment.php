<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * The result of authorizing a payment request that contains payment information.
 *
 * Data in ApplePayPaymentToken is encrypted. Billing and shipping contact data are not encrypted.
*/
class ApplePayPayment
{
    /**
      * An object that contains the user's payment credentials.
      *
      * @var ApplePayPaymentToken|null
      */
    #[SerializedName('token')]
    protected ?ApplePayPaymentToken $token;

    /**
      * The shipping contact selected by the user for this transaction.
      *
      * @var ApplePayPaymentContact|null
      */
    #[SerializedName('billingContact')]
    protected ?ApplePayPaymentContact $billingContact;

    /**
      * The billing contact selected by the user for this transaction.
      * @var ApplePayPaymentContact|null
      */
    #[SerializedName('shippingContact')]
    protected ?ApplePayPaymentContact $shippingContact;

    public function __construct(
        ?ApplePayPaymentToken $token = null,
        ?ApplePayPaymentContact $billingContact = null,
        ?ApplePayPaymentContact $shippingContact = null
    ) {
        $this->token = $token;
        $this->billingContact = $billingContact;
        $this->shippingContact = $shippingContact;
    }

    // Getters and Setters
    public function getToken(): ?ApplePayPaymentToken
    {
        return $this->token;
    }

    public function setToken(?ApplePayPaymentToken $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getBillingContact(): ?ApplePayPaymentContact
    {
        return $this->billingContact;
    }

    public function setBillingContact(?ApplePayPaymentContact $billingContact): self
    {
        $this->billingContact = $billingContact;
        return $this;
    }

    public function getShippingContact(): ?ApplePayPaymentContact
    {
        return $this->shippingContact;
    }

    public function setShippingContact(?ApplePayPaymentContact $shippingContact): self
    {
        $this->shippingContact = $shippingContact;
        return $this;
    }
}
