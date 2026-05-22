<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Additional information about the Apple payment data token. This information is needed for checking the validity of the payment data token before decryption.
 */
class ApplePaymentDataTokenInformation
{
    /**
     * @var string Version information about the payment token. Currently only EC_v1 for ECC-encrypted data is supported.
     */
    #[SerializedName('version')]
    protected string $version;

    /**
     * @var string Detached PKCS #7 signature, Base64 encoded as string. Signature of the payment and header data.
     */
    #[SerializedName('signature')]
    protected string $signature;

    /**
     * @var ApplePaymentDataTokenHeaderInformation Additional information about the Apple payment data token header.
     */
    #[SerializedName('header')]
    protected ApplePaymentDataTokenHeaderInformation $header;

    public function __construct(
        string $version,
        string $signature,
        ApplePaymentDataTokenHeaderInformation $header
    ) {
        $this->version = $version;
        $this->signature = $signature;
        $this->header = $header;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getSignature(): string
    {
        return $this->signature;
    }

    public function setSignature(string $signature): self
    {
        $this->signature = $signature;
        return $this;
    }

    public function getHeader(): ApplePaymentDataTokenHeaderInformation
    {
        return $this->header;
    }

    public function setHeader(ApplePaymentDataTokenHeaderInformation $header): self
    {
        $this->header = $header;
        return $this;
    }
}
