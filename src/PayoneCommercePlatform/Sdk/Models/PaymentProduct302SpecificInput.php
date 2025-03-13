<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\ApplePaymentDataTokenInformationInput;

/**
 * @description Object containing additional information needed for Apple Pay payment transactions.
 */
class PaymentProduct302SpecificInput
{
    /**
     * @var string|null Type of your Apple Pay integration. 
     * - `MERCHANT_CERTIFICATE`: using your own certificate (paid Apple Pay account needed).
     * - `MASS_ENABLEMENT`: using PAYONE certificate.
     */
    #[SerializedName('integrationType')]
    protected ?string $integrationType;

    /**
     * @var string|null The card network that was used for an Apple Pay payment transaction.
     * * Network/Scheme of the card used for the payment.
     * - `MASTERCARD`
     * - `VISA`
     * - `AMEX`
     * - `GIROCARD`
     * - `DISCOVER` (not supported yet)
     * - `JCB` (not supported yet)
     */
    #[SerializedName('network')]
    protected ?string $network;

    /**
     * @var ApplePaymentDataTokenInformationInput|null Additional information about the Apple payment data token.
     */
    #[SerializedName('token')]
    protected ?ApplePaymentDataTokenInformationInput $token;

    /**
     * @var string|null The Domain of your Webshop. Needed for initialization the Apple Pay payment session 
     * when `integrationType` is `MASS_ENABLEMENT`. 
     */
    #[SerializedName('domainName')]
    protected ?string $domainName;

    /**
     * @var string|null The Name of your Store. Needed for initializing the Apple Pay payment session
     * when `integrationType` is `MASS_ENABLEMENT`.
     */
    #[SerializedName('displayName')]
    protected ?string $displayName;

    public function __construct(
        ?string $integrationType = null,
        ?string $network = null,
        ?ApplePaymentDataTokenInformationInput $token = null,
        ?string $domainName = null,
        ?string $displayName = null
    ) {
        $this->integrationType = $integrationType;
        $this->network = $network;
        $this->token = $token;
        $this->domainName = $domainName;
        $this->displayName = $displayName;
    }

    // Getters and Setters
    public function getIntegrationType(): ?string
    {
        return $this->integrationType;
    }

    public function setIntegrationType(?string $integrationType): self
    {
        $this->integrationType = $integrationType;
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

    public function getToken(): ?ApplePaymentDataTokenInformationInput
    {
        return $this->token;
    }

    public function setToken(?ApplePaymentDataTokenInformationInput $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getDomainName(): ?string
    {
        return $this->domainName;
    }

    public function setDomainName(?string $domainName): self
    {
        $this->domainName = $domainName;
        return $this;
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
}
