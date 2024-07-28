<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the card payment method details.
 */
class CardPaymentMethodSpecificOutput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var string|null Card Authorization code as returned by the acquirer.
     */
    #[SerializedName('authorisationCode')]
    protected ?string $authorisationCode;

    /**
     * @var CardFraudResults|null Fraud results contained in the CardFraudResults object.
     */
    #[SerializedName('fraudResults')]
    protected ?CardFraudResults $fraudResults;

    /**
     * @var ThreeDSecureResults|null 3D Secure results object.
     */
    #[SerializedName('threeDSecureResults')]
    protected ?ThreeDSecureResults $threeDSecureResults;

    public function __construct(
        ?int $paymentProductId = null,
        ?string $authorisationCode = null,
        ?CardFraudResults $fraudResults = null,
        ?ThreeDSecureResults $threeDSecureResults = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->authorisationCode = $authorisationCode;
        $this->fraudResults = $fraudResults;
        $this->threeDSecureResults = $threeDSecureResults;
    }

    // Getters and Setters
    public function getPaymentProductId(): ?int
    {
        return $this->paymentProductId;
    }

    public function setPaymentProductId(?int $paymentProductId): self
    {
        $this->paymentProductId = $paymentProductId;
        return $this;
    }

    public function getAuthorisationCode(): ?string
    {
        return $this->authorisationCode;
    }

    public function setAuthorisationCode(?string $authorisationCode): self
    {
        $this->authorisationCode = $authorisationCode;
        return $this;
    }

    public function getFraudResults(): ?CardFraudResults
    {
        return $this->fraudResults;
    }

    public function setFraudResults(?CardFraudResults $fraudResults): self
    {
        $this->fraudResults = $fraudResults;
        return $this;
    }

    public function getThreeDSecureResults(): ?ThreeDSecureResults
    {
        return $this->threeDSecureResults;
    }

    public function setThreeDSecureResults(?ThreeDSecureResults $threeDSecureResults): self
    {
        $this->threeDSecureResults = $threeDSecureResults;
        return $this;
    }
}