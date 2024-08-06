<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\ApplePaymentDataTokenHeaderInformationInput;

/**
 * Additional information about the Apple payment data token. This information is needed for checking the validity
 * of the payment data token before decryption.
 *
 * @description Additional information about the Apple payment data token. This information is needed for checking the validity of the payment data token before decryption.
 */
class ApplePaymentDataTokenInformationInput
{
    /**
     * @var string|null Version information about the payment token. Currently only EC_v1 for ECC-encrypted data is supported.
     */
    #[SerializedName('version')]
    protected ?string $version;

    /**
     * @var string|null Detached PKCS #7 signature, Base64 encoded as string. Signature of the payment and header data. The
     * signature includes the signing certificate, its intermediate CA certificate, and information about the
     * signing algorithm.
     */
    #[SerializedName('signature')]
    protected ?string $signature;

    /**
     * @var ApplePaymentDataTokenHeaderInformation|null Additional information about the Apple payment data token header.
     */
    #[SerializedName('header')]
    protected ?ApplePaymentDataTokenHeaderInformationInput $header;

    public function __construct(
        ?string $version = null,
        ?string $signature = null,
        ?ApplePaymentDataTokenHeaderInformationInput $header = null
    ) {
        $this->version = $version;
        $this->signature = $signature;
        $this->header = $header;
    }

    // Getters and Setters
    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;
        return $this;
    }

    public function getHeader(): ?ApplePaymentDataTokenHeaderInformationInput
    {
        return $this->header;
    }

    public function setHeader(?ApplePaymentDataTokenHeaderInformationInput $header): self
    {
        $this->header = $header;
        return $this;
    }
}
