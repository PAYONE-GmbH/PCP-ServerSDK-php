<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Models\AddressPersonal;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPayment;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentContact;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentData;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentDataHeader;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentMethod;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentMethodType;
use PayoneCommercePlatform\Sdk\Models\ApplePay\ApplePayPaymentToken;
use PayoneCommercePlatform\Sdk\Models\CartItemInput;
use PayoneCommercePlatform\Sdk\Models\CartItemInvoiceData;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use PayoneCommercePlatform\Sdk\Models\ProductType;
use PayoneCommercePlatform\Sdk\Models\OrderLineDetailsInput;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Models\ShoppingCartInput;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class BaseApiClientTest extends TestCase
{
    use TestApiClientTrait;

    public function setUp(): void
    {
        $this->initTestConfig();
    }

    public function testSerializeJson(): void
    {
        $object = new CreateCheckoutRequest(
            // structure, int and string
            amountOfMoney: new AmountOfMoney(amount: 6099, currencyCode: "USD"),
            shipping: new Shipping(
                address: new AddressPersonal(
                    countryCode: "DE",
                    zip: "12105",
                    city: "Berlin",
                    street: "Alarichstraße",
                    houseNumber: "12"
                )
            ),
            shoppingCart: new ShoppingCartInput(
                // array of structures
                items: [new CartItemInput(
                    invoiceData: new CartItemInvoiceData(
                        description: "Learn PHP the hard way - Hardcover",
                    ),
                    orderLineDetails: new OrderLineDetailsInput(
                        productPrice: 6099,
                        quantity: 1,
                        productType: ProductType::GOODS,
                    ),
                )]
            ),
            // empty structure equivalent to {}
            orderRequest: new OrderRequest(),
            // nulls are left out
            creationDateTime: null,
            // boolean
            autoExecuteOrder: false,
        );
        $expected = '{"amountOfMoney":{"amount":6099,"currencyCode":"USD"},"shipping":{"address":{"city":"Berlin","countryCode":"DE","houseNumber":"12","street":"Alarichstra\u00dfe","zip":"12105"}},"shoppingCart":{"items":[{"invoiceData":{"description":"Learn PHP the hard way - Hardcover"},"orderLineDetails":{"productPrice":6099,"productType":"GOODS","quantity":1}}]},"orderRequest":{},"autoExecuteOrder":false}';

        $json = BaseApiClient::serializeJson($object);

        $this->assertEquals($expected, $json);
    }

    public function testDeserializeJson(): void
    {
        $expectedResponse = new ApplePayPayment(
            token: new ApplePayPaymentToken(
                paymentData: new ApplePayPaymentData(
                    data: 'data',
                    header: new ApplePayPaymentDataHeader(
                        applicationData: null,
                        wrappedKey: 'foobar',
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
        // json representation of the applepaypayment response above
        $json = '{"token":{"paymentData":{"data":"data","header":{"wrappedKey":"foobar","transactionId":"transaction-101"}},"paymentMethod":{"displayName":"The name is...","network":"MasterCard","type":"credit","billingContact":null},"transactionIdentifier":"transaction-101-cc"},"billingContact":{"phoneNumber":"+1239452324","emailAddress":"mail@imail.com","givenName":"John","familyName":"Michell","phoneticGivenName":"","phoneticFamilyName":"","addressLines":["Alarichstraße 12"],"locality":"Berlin","postalCode":"12105","subAdministrativeArea":""},"spam":"IGNORE THIS"}';

        $response = BaseApiClient::deserializeJson($json, ApplePayPayment::class);

        $this->assertEquals($expectedResponse, $response);
    }
}
