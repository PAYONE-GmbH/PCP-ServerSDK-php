<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ApplePayPaymentDataHeader
{
    /**
     * Optional. Hash of the applicationData property of the original PKPaymentRequest object
     * for transactions that initiate in apps. For transactions that initiate in Apple Pay on the Web,
     * the value is the hash of applicationData in ApplePayPaymentRequest or of applicationData in ApplePayRequest.
     * This key is omitted if the value of that property is nil.
     *
     * @var string|null SHA-256 hash, hex encoded as a string
     */
    #[SerializedName('applicationData')]
    private ?string $applicationData = null;

    /**
     * Ephemeral public key bytes.
     *
     * @var string|null X.509 encoded key bytes, Base64 encoded as a string
     */
    #[SerializedName('ephemeralPublicKey')]
    private ?string $ephemeralPublicKey;

    /**
     * The symmetric key wrapped using your RSA public key.
     *
     * @var string|null A Base64-encoded string
     */
    #[SerializedName('wrappedKey')]
    private ?string $wrappedKey;

    /**
     * Hash of the X.509 encoded public key bytes of the merchant's certificate.
     *
     * @var string|null SHA-256 hash, Base64 encoded as a string
     */
    #[SerializedName('publicKeyHash')]
    private ?string $publicKeyHash;

    /**
     * Transaction identifier, generated on the device.
     *
     * @var string|null A hexadecimal identifier, as a string
     */
    #[SerializedName('transactionId')]
    private ?string $transactionId;

    public function __construct(
        ?string $applicationData = null,
        ?string $ephemeralPublicKey = null,
        ?string $wrappedKey = null,
        ?string $publicKeyHash = null,
        ?string $transactionId = null
    ) {
        $this->applicationData = $applicationData;
        $this->ephemeralPublicKey = $ephemeralPublicKey;
        $this->wrappedKey = $wrappedKey;
        $this->publicKeyHash = $publicKeyHash;
        $this->transactionId = $transactionId;
    }


    // Add getters and setters for each property as needed
    public function getApplicationData(): ?string
    {
        return $this->applicationData;
    }

    public function setApplicationData(?string $applicationData): void
    {
        $this->applicationData = $applicationData;
    }

    public function getEphemeralPublicKey(): ?string
    {
        return $this->ephemeralPublicKey;
    }

    public function setEphemeralPublicKey(?string $ephemeralPublicKey): void
    {
        $this->ephemeralPublicKey = $ephemeralPublicKey;
    }

    public function getWrappedKey(): ?string
    {
        return $this->wrappedKey;
    }

    public function setWrappedKey(?string $wrappedKey): void
    {
        $this->wrappedKey = $wrappedKey;
    }

    public function getPublicKeyHash(): ?string
    {
        return $this->publicKeyHash;
    }

    public function setPublicKeyHash(?string $publicKeyHash): void
    {
        $this->publicKeyHash = $publicKeyHash;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }
}
