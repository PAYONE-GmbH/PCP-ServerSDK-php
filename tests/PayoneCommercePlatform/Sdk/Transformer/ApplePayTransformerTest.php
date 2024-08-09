<?php

namespace PayoneCommercePlatform\Sdk\Transformer;

use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPayment;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentContact;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentData;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentMethodType;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentMethod;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentDataHeader;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentToken;
use PayoneCommercePlatform\Sdk\Models\ApplePaymentDataTokenHeaderInformationInput;
use PayoneCommercePlatform\Sdk\Models\ApplePaymentDataTokenInformationInput;
use PayoneCommercePlatform\Sdk\Models\MobilePaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct302SpecificInput;

class ApplePayTransformerTest extends TestCase
{
    public function testApplePayPaymentToMobilePaymentMethodSpecificInput(): void
    {
        /** @var ApplePayPayment */
        $payment = new ApplePayPayment(
            token: new ApplePayPaymentToken(
                paymentData: new ApplePayPaymentData(
                    data: 'data',
                    header: new ApplePayPaymentDataHeader(
                        applicationData: null,
                        publicKeyHash: 'hashhashhash',
                        transactionId: 'transaction-101'
                    )
                ),
                paymentMethod: new ApplePayPaymentMethod(
                    displayName: 'The name is...',
                    network: 'MasterCard',
                    type: ApplePayPaymentMethodType::CREDIT,
                    paymentPass: null,
                    billingContact: null,
                ),
                transactionIdentifier: 'transaction-101-cc'
            ),
            billingContact: new ApplePayPaymentContact(
                phoneNumber: '+1239452324',
                emailAddress: 'mail@imail.com',
                givenName: 'John',
                familyName: 'Michell',
                phoneticGivenName: '',
                phoneticFamilyName: '',
                addressLines: ['Alarichstraße 12'],
                locality: 'Berlin',
                postalCode: '12105',
                subAdministrativeArea: '',
            ),
            shippingContact: null,
        );

        $expected = new MobilePaymentMethodSpecificInput(
            paymentProductId: 302,
            publicKeyHash: 'hashhashhash',
            ephemeralKey: null,
            paymentProduct302SpecificInput: new PaymentProduct302SpecificInput(
                network: 'MasterCard',
                token: new ApplePaymentDataTokenInformationInput(
                    version: null,
                    signature: null,
                    header: new ApplePaymentDataTokenHeaderInformationInput(
                        transactionId: 'transaction-101',
                        applicationData: null
                    ),
                )
            )
        );

        $mobildSpecificInput = ApplePayTransformer::applePayPaymentToMobilePaymentMethodSpecificInput($payment);

        $this->assertEquals($expected, $mobildSpecificInput);
    }
}
