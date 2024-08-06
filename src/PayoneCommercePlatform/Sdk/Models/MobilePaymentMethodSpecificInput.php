<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct302SpecificInput;
use PayoneCommercePlatform\Sdk\Models\AuthorizationMode;

/**
 * @description Object containing the specific input details for mobile payments.
 */
class MobilePaymentMethodSpecificInput
{
    /**
     * @var int|null Payment product identifier - please check product documentation for a full overview of possible values.
     */
    #[SerializedName('paymentProductId')]
    protected ?int $paymentProductId;

    /**
     * @var AuthorizationMode|null Authorization mode.
     */
    #[SerializedName('authorizationMode')]
    protected ?AuthorizationMode $authorizationMode;

    /**
     * @var string|null The payment data if we will do the decryption of the encrypted payment data. Typically you'd use encryptedCustomerInput in the root of the create payment request to provide the encrypted payment data instead.
     */
    #[SerializedName('encryptedPaymentData')]
    protected ?string $encryptedPaymentData;

    /**
     * @var string|null Public Key Hash A unique identifier to retrieve key used by Apple to encrypt information.
     */
    #[SerializedName('publicKeyHash')]
    protected ?string $publicKeyHash;

    /**
     * @var string|null Ephemeral Key A unique generated key used by Apple to encrypt data.
     */
    #[SerializedName('ephemeralKey')]
    protected ?string $ephemeralKey;

    /**
     * @var PaymentProduct302SpecificInput|null Specific input details for payment product 320.
     */
    #[SerializedName('paymentProduct302SpecificInput')]
    protected ?PaymentProduct302SpecificInput $paymentProduct302SpecificInput;

    public function __construct(
        ?int $paymentProductId = null,
        ?AuthorizationMode $authorizationMode = null,
        ?string $encryptedPaymentData = null,
        ?string $publicKeyHash = null,
        ?string $ephemeralKey = null,
        ?PaymentProduct302SpecificInput $paymentProduct302SpecificInput = null
    ) {
        $this->paymentProductId = $paymentProductId;
        $this->authorizationMode = $authorizationMode;
        $this->encryptedPaymentData = $encryptedPaymentData;
        $this->publicKeyHash = $publicKeyHash;
        $this->ephemeralKey = $ephemeralKey;
        $this->paymentProduct302SpecificInput = $paymentProduct302SpecificInput;
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

    public function getAuthorizationMode(): ?AuthorizationMode
    {
        return $this->authorizationMode;
    }

    public function setAuthorizationMode(?AuthorizationMode $authorizationMode): self
    {
        $this->authorizationMode = $authorizationMode;
        return $this;
    }

    public function getEncryptedPaymentData(): ?string
    {
        return $this->encryptedPaymentData;
    }

    public function setEncryptedPaymentData(?string $encryptedPaymentData): self
    {
        $this->encryptedPaymentData = $encryptedPaymentData;
        return $this;
    }

    public function getPublicKeyHash(): ?string
    {
        return $this->publicKeyHash;
    }

    public function setPublicKeyHash(?string $publicKeyHash): self
    {
        $this->publicKeyHash = $publicKeyHash;
        return $this;
    }

    public function getEphemeralKey(): ?string
    {
        return $this->ephemeralKey;
    }

    public function setEphemeralKey(?string $ephemeralKey): self
    {
        $this->ephemeralKey = $ephemeralKey;
        return $this;
    }

    public function getPaymentProduct302SpecificInput(): ?PaymentProduct302SpecificInput
    {
        return $this->paymentProduct302SpecificInput;
    }

    public function setPaymentProduct302SpecificInput(?PaymentProduct302SpecificInput $paymentProduct302SpecificInput): self
    {
        $this->paymentProduct302SpecificInput = $paymentProduct302SpecificInput;
        return $this;
    }
}
