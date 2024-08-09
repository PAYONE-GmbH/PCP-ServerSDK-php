<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Information about the card used in the transaction.
 */
class ApplePayPaymentMethod
{
    /**
      * @var string|null A string, suitable for display, that describes the card.
      */
    #[SerializedName('displayName')]
    protected ?string $displayName;

    /**
      * @var string|null A string, suitable for display, that is the name of the payment network backing the card.
      */
    #[SerializedName('network')]
    protected ?string $network;

    /**
      * @var ApplePayPaymentMethodType|null A string value representing the card's type of payment.
      */
    #[SerializedName('type')]
    protected ?ApplePayPaymentMethodType $type;

    /**
      * @var string|null The payment pass object currently selected to complete the payment.
      */
    #[SerializedName('paymentPass')]
    protected ?string $paymentPass;

    /**
      * @var ApplePayPaymentContact|null The billing contact associated with the card.
      */
    #[SerializedName('billingContact')]
    protected ?ApplePayPaymentContact $billingContact;

    public function __construct(
        ?string $displayName = null,
        ?string $network = null,
        ?ApplePayPaymentMethodType $type = null,
        ?string $paymentPass = null,
        ?ApplePayPaymentContact $billingContact = null
    ) {
        $this->displayName = $displayName;
        $this->network = $network;
        $this->type = $type;
        $this->paymentPass = $paymentPass;
        $this->billingContact = $billingContact;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): self
    {
        $this->network = $network;
        return $this;
    }

    public function getType(): ?ApplePayPaymentMethodType
    {
        return $this->type;
    }

    public function setType(?ApplePayPaymentMethodType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getPaymentPass(): ?string
    {
        return $this->paymentPass;
    }

    public function setPaymentPass(?string $paymentPass): self
    {
        $this->paymentPass = $paymentPass;
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
}
