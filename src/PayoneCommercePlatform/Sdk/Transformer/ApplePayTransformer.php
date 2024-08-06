<?php

namespace PayoneCommercePlatform\Sdk\Transformer;

use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPayment;
use PayoneCommercePlatform\Sdk\Models\ApplePaymentDataTokenHeaderInformationInput;
use PayoneCommercePlatform\Sdk\Models\ApplePaymentDataTokenInformationInput;
use PayoneCommercePlatform\Sdk\Models\MobilePaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct302SpecificInput;

class ApplePayTransformer
{
    public static function applePayPaymentToMobilePaymentMethodSpecificInput(ApplePayPayment $payment): MobilePaymentMethodSpecificInput
    {
        /** @var string|null */
        $publicKeyHash = null;
        /** @var string|null */
        $ephemeralKey = null;
        /** @var string|null */
        $network = null;
        /** @var string|null */
        $version = null;
        /** @var string|null */
        $signature = null;
        /** @var string|null */
        $transactionId = null;
        /** @var string|null */
        $applicationData = null;

        if ($payment->getToken() !== null && $payment->getToken()->getPaymentData() !== null) {
            $version = $payment->getToken()->getPaymentData()->getVersion();
            $signature = $payment->getToken()->getPaymentData()->getSignature();
        }
        if ($payment->getToken() !== null && $payment->getToken()->getPaymentData() !== null && $payment->getToken()->getPaymentData()->getHeader() !== null) {
            $publicKeyHash = $payment->getToken()->getPaymentData()->getHeader()->getPublicKeyHash();
            $ephemeralKey = $payment->getToken()->getPaymentData()->getHeader()->getEphemeralPublicKey();
            $applicationData = $payment->getToken()->getPaymentData()->getHeader()->getApplicationData();
            $transactionId = $payment->getToken()->getPaymentData()->getHeader()->getTransactionId();
        }
        if ($payment->getToken() !== null && $payment->getToken()->getPaymentMethod() !== null) {
            $network = $payment->getToken()->getPaymentMethod()->getNetwork();
        }

        return new MobilePaymentMethodSpecificInput(
            paymentProductId: 302,
            publicKeyHash: $publicKeyHash,
            ephemeralKey: $ephemeralKey,
            paymentProduct302SpecificInput: new PaymentProduct302SpecificInput(
                network: $network,
                token: new ApplePaymentDataTokenInformationInput(
                    version: $version,
                    signature: $signature,
                    header: new ApplePaymentDataTokenHeaderInformationInput(
                        transactionId: $transactionId,
                        applicationData: $applicationData
                    ),
                )
            )
        );
    }
}
