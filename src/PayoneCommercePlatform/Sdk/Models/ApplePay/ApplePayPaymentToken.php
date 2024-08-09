<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * An object that contains the user's payment credentials.
 *
 * You access the payment token of an authorized payment request using the token property of the ApplePayPayment object.
 */
class ApplePayPaymentToken
{
    /**
      *
      * This data is used by your e-commerce back-end system, which decrypts it and submits it to your payment processor.
      *  For a full guide on this data, see:
      *  https://developer.apple.com/documentation/passkit_apple_pay_and_wallet/apple_pay/payment_token_format_reference
      *
      *  @var ApplePayPaymentData|null $paymentData
      */
    #[SerializedName('paymentData')]
    protected ?ApplePayPaymentData $paymentData;

    /**
     * @var ApplePayPaymentMethod|null An object that contains the user's payment credentials.
     * You access the payment token of an authorized payment request using the token property of the ApplePayPayment object.
    */
    #[SerializedName('paymentMethod')]
    protected ?ApplePayPaymentMethod $paymentMethod;

    /**
    * @var string|null A unique identifier for this payment.
    * This identifier is suitable for use in a receipt.
    */
    #[SerializedName('transactionIdentifier')]
    protected ?string $transactionIdentifier;

    public function __construct(
        ?ApplePayPaymentData $paymentData = null,
        ?ApplePayPaymentMethod $paymentMethod = null,
        ?string $transactionIdentifier = null
    ) {
        $this->paymentData = $paymentData;
        $this->paymentMethod = $paymentMethod;
        $this->transactionIdentifier = $transactionIdentifier;
    }

    // Getters and Setters
    public function getPaymentData(): ?ApplePayPaymentData
    {
        return $this->paymentData;
    }

    public function setPaymentData(?ApplePayPaymentData $paymentData): self
    {
        $this->paymentData = $paymentData;
        return $this;
    }

    public function getPaymentMethod(): ?ApplePayPaymentMethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?ApplePayPaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getTransactionIdentifier(): ?string
    {
        return $this->transactionIdentifier;
    }

    public function setTransactionIdentifier(?string $transactionIdentifier): self
    {
        $this->transactionIdentifier = $transactionIdentifier;
        return $this;
    }
}
