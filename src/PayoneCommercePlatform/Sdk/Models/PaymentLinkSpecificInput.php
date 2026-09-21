<?php

namespace PayoneCommercePlatform\Sdk\Models;

use DateTime;
use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentLinkSpecificInput
{
    #[SerializedName('expirationDate')]
    protected ?DateTime $expirationDate;
    #[SerializedName('authorizationMode')]
    protected AuthorizationMode $authorizationMode;
    /** @var string[] */
    #[SerializedName('paymentMethods')]
    protected array $paymentMethods;
    #[SerializedName('bnplId')]
    protected ?string $bnplId;
    #[SerializedName('returnUrl')]
    protected ?string $returnUrl;
    #[SerializedName('logoUrl')]
    protected ?string $logoUrl;
    #[SerializedName('autoRedirection')]
    protected ?bool $autoRedirection;
    #[SerializedName('termsUrl')]
    protected ?string $termsUrl;
    #[SerializedName('retryNumber')]
    protected ?int $retryNumber;
    #[SerializedName('merchantName')]
    protected ?string $merchantName;
    #[SerializedName('merchantOrigin')]
    protected ?string $merchantOrigin;

    /** @param string[] $paymentMethods */
    public function __construct(AuthorizationMode $authorizationMode, array $paymentMethods, ?DateTime $expirationDate = null, ?string $bnplId = null, ?string $returnUrl = null, ?string $logoUrl = null, ?bool $autoRedirection = null, ?string $termsUrl = null, ?int $retryNumber = null, ?string $merchantName = null, ?string $merchantOrigin = null)
    {
        $this->authorizationMode = $authorizationMode;
        $this->paymentMethods = $paymentMethods;
        $this->expirationDate = $expirationDate;
        $this->bnplId = $bnplId;
        $this->returnUrl = $returnUrl;
        $this->logoUrl = $logoUrl;
        $this->autoRedirection = $autoRedirection;
        $this->termsUrl = $termsUrl;
        $this->retryNumber = $retryNumber;
        $this->merchantName = $merchantName;
        $this->merchantOrigin = $merchantOrigin;
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
    public function getAuthorizationMode(): AuthorizationMode
    {
        return $this->authorizationMode;
    }
    public function setAuthorizationMode(AuthorizationMode $authorizationMode): self
    {
        $this->authorizationMode = $authorizationMode;
        return $this;
    }
    /** @return string[] */
    public function getPaymentMethods(): array
    {
        return $this->paymentMethods;
    }
    /** @param string[] $paymentMethods */
    public function setPaymentMethods(array $paymentMethods): self
    {
        $this->paymentMethods = $paymentMethods;
        return $this;
    }
    public function getBnplId(): ?string
    {
        return $this->bnplId;
    }
    public function setBnplId(?string $bnplId): self
    {
        $this->bnplId = $bnplId;
        return $this;
    }
    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }
    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }
    public function setLogoUrl(?string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;
        return $this;
    }
    public function getAutoRedirection(): ?bool
    {
        return $this->autoRedirection;
    }
    public function setAutoRedirection(?bool $autoRedirection): self
    {
        $this->autoRedirection = $autoRedirection;
        return $this;
    }
    public function getTermsUrl(): ?string
    {
        return $this->termsUrl;
    }
    public function setTermsUrl(?string $termsUrl): self
    {
        $this->termsUrl = $termsUrl;
        return $this;
    }
    public function getRetryNumber(): ?int
    {
        return $this->retryNumber;
    }
    public function setRetryNumber(?int $retryNumber): self
    {
        $this->retryNumber = $retryNumber;
        return $this;
    }
    public function getMerchantName(): ?string
    {
        return $this->merchantName;
    }
    public function setMerchantName(?string $merchantName): self
    {
        $this->merchantName = $merchantName;
        return $this;
    }
    public function getMerchantOrigin(): ?string
    {
        return $this->merchantOrigin;
    }
    public function setMerchantOrigin(?string $merchantOrigin): self
    {
        $this->merchantOrigin = $merchantOrigin;
        return $this;
    }
}
