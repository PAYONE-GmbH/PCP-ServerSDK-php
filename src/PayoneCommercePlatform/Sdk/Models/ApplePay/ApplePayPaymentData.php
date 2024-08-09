<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * An object that contains the user's payment credentials.
 * You access the payment token of an authorized payment request using the token property of the ApplePayPayment object.
 */
class ApplePayPaymentData
{
    /**
      * A base64 encoded string that contains custom data with the following structure:
      *
      * Payment Data Keys:
      * The decrypted payment data in the `data` value contains the following keys and values:
      *
      * - **applicationPrimaryAccountNumber** (string): Device-specific account number of the card that funds this transaction.
      * - **applicationExpirationDate** (string, date as a string): Card expiration date in the format YYMMDD.
      * - **currencyCode** (string): ISO 4217 numeric currency code, as a string to preserve leading zeros.
      * - **transactionAmount** (number): Transaction amount.
      * - **cardholderName** (string, optional): Cardholder name.
      * - **deviceManufacturerIdentifier** (string): Hex-encoded device manufacturer identifier.
      * - **paymentDataType** (string): Either "3DSecure" or "EMV".
      * - **paymentData** (dictionary): Detailed payment data; see Detailed Payment Data Keys (3D Secure) and Detailed Payment Data Keys (EMV).
      * - **authenticationResponses** (list): For a multitoken request, a list of submerchant responses that contain cryptograms.
      * - **merchantTokenIdentifier** (string): For a merchant token request, the provisioned merchant token identifier from the payment network.
      * - **merchantTokenMetadata** (MerchantTokenMetadata): For a merchant token request, this data contains card art and the token's last four digits and expiration date.
      *
      * The encoded string must be decoded and parsed according to the expected structure to access the individual values.
      *
      * @var string|null
      */
    #[SerializedName('data')]
    protected ?string $data;

    /**
      * Additional version-dependent information you use to decrypt and verify the payment
      *
      * @var ApplePayPaymentDataHeader|null
      */
    #[SerializedName('header')]
    protected ?ApplePayPaymentDataHeader $header;

    /**
      * detached PKCS #7 signature, Base64 encoded as a string.
      * Signature of the payment and header data.
      * The signature includes the signing certificate, its intermediate CA certificate, and information about the signing algorithm.
      *
      * @var string|null
      */
    #[SerializedName('signature')]
    protected ?string $signature;

    /**
      * Version information about the payment token
      * The token uses EC_v1 for ECC-encrypted data and RSA_v1 for RSA-encrypted data.
      *
      * @var string|null
      */
    #[SerializedName('version')]
    protected ?string $version;

    public function __construct(
        ?string $data = null,
        ?ApplePayPaymentDataHeader $header = null,
        ?string $signature = null,
        ?string $version = null
    ) {
        $this->data = $data;
        $this->header = $header;
        $this->signature = $signature;
        $this->version = $version;
    }


    // Getters and Setters
    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getHeader(): ?ApplePayPaymentDataHeader
    {
        return $this->header;
    }

    public function setHeader(?ApplePayPaymentDataHeader $header): self
    {
        $this->header = $header;
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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;
        return $this;
    }
}
