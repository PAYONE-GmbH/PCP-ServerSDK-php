<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing additional information needed for Apple Pay payment transactions.
 */
class PaymentProduct320SpecificInput
{
    /**
     * @var string|null The card network that was used for an Apple Pay payment transaction.
     */
    #[SerializedName('network')]
    protected ?string $network;

    /**
     * @var ApplePaymentDataTokenInformation|null Additional information about the Apple payment data token.
     */
    #[SerializedName('token')]
    protected ?ApplePaymentDataTokenInformation $token;

    public function __construct(
        ?string $network = null,
        ?ApplePaymentDataTokenInformation $token = null
    ) {
        $this->network = $network;
        $this->token = $token;
    }

    // Getters and Setters
    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): self
    {
        $this->network = $network;
        return $this;
    }

    public function getToken(): ?ApplePaymentDataTokenInformation
    {
        return $this->token;
    }

    public function setToken(?ApplePaymentDataTokenInformation $token): self
    {
        $this->token = $token;
        return $this;
    }
}
