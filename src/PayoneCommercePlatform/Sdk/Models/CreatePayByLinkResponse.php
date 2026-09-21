<?php

namespace PayoneCommercePlatform\Sdk\Models;

use DateTime;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreatePayByLinkResponse
{
    #[SerializedName('expirationDate')]
    protected ?DateTime $expirationDate;
    #[SerializedName('paymentLinkOrder')]
    protected ?PaymentLinkOrder $paymentLinkOrder;
    #[SerializedName('status')]
    protected ?PayLinkStatusValue $status;
    #[SerializedName('redirectionUrl')]
    protected ?string $redirectionUrl;
    #[SerializedName('paymentLinkId')]
    protected ?string $paymentLinkId;

    public function __construct(?DateTime $expirationDate = null, ?PaymentLinkOrder $paymentLinkOrder = null, ?PayLinkStatusValue $status = null, ?string $redirectionUrl = null, ?string $paymentLinkId = null)
    {
        $this->expirationDate = $expirationDate;
        $this->paymentLinkOrder = $paymentLinkOrder;
        $this->status = $status;
        $this->redirectionUrl = $redirectionUrl;
        $this->paymentLinkId = $paymentLinkId;
    }

    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }
    public function setExpirationDate(?DateTime $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
    public function getPaymentLinkOrder(): ?PaymentLinkOrder
    {
        return $this->paymentLinkOrder;
    }
    public function setPaymentLinkOrder(?PaymentLinkOrder $paymentLinkOrder): self
    {
        $this->paymentLinkOrder = $paymentLinkOrder;
        return $this;
    }
    public function getStatus(): ?PayLinkStatusValue
    {
        return $this->status;
    }
    public function setStatus(?PayLinkStatusValue $status): self
    {
        $this->status = $status;
        return $this;
    }
    public function getRedirectionUrl(): ?string
    {
        return $this->redirectionUrl;
    }
    public function setRedirectionUrl(?string $redirectionUrl): self
    {
        $this->redirectionUrl = $redirectionUrl;
        return $this;
    }
    public function getPaymentLinkId(): ?string
    {
        return $this->paymentLinkId;
    }
    public function setPaymentLinkId(?string $paymentLinkId): self
    {
        $this->paymentLinkId = $paymentLinkId;
        return $this;
    }
}
