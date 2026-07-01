<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
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
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutResponse;
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

    public function testHttpClientPriorityLogic(): void
    {
        // Test 1: Default client (no global, no client-specific)
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret');
        $client = new CommerceCaseApiClient($config);

        // We can't directly test the internal client, but we can verify the client works
        $this->assertInstanceOf(CommerceCaseApiClient::class, $client);

        // Test 2: Global HTTP client only
        $globalClient = new Client(['timeout' => 30]);
        $configWithGlobal = new CommunicatorConfiguration(
            apiKey: 'test',
            apiSecret: 'secret',
            httpClient: $globalClient
        );
        $clientWithGlobal = new CommerceCaseApiClient($configWithGlobal);
        $this->assertInstanceOf(CommerceCaseApiClient::class, $clientWithGlobal);

        // Test 3: Client-specific HTTP client (should override global)
        $clientSpecificClient = new Client(['timeout' => 60]);
        $clientWithSpecific = new CommerceCaseApiClient($configWithGlobal, $clientSpecificClient);
        $this->assertInstanceOf(CommerceCaseApiClient::class, $clientWithSpecific);

        // Test 4: Setting client-specific HTTP client via setter
        $anotherClient = new Client(['timeout' => 90]);
        $clientWithSpecific->setHttpClient($anotherClient);
        $this->assertInstanceOf(CommerceCaseApiClient::class, $clientWithSpecific);

        // Test 5: Setting null client-specific HTTP client (should fall back to global)
        $clientWithSpecific->setHttpClient(null);
        $this->assertInstanceOf(CommerceCaseApiClient::class, $clientWithSpecific);
    }

    public function testOnRequestBodyCallbackIsInvoked(): void
    {
        $captured = [];
        $config = new CommunicatorConfiguration(
            apiKey: 'KEY',
            apiSecret: 'SECRET',
            host: 'awesome-api.com',
            serverMetaInfo: [],
            clientMetaInfo: [],
            onRequestBody: static function (string $body) use (&$captured): void {
                $captured[] = $body;
            },
        );

        $responseBody = BaseApiClient::serializeJson(
            new CreateCheckoutResponse(amountOfMoney: new AmountOfMoney(amount: 100, currencyCode: 'EUR'))
        );
        $httpClient = $this->createStub(ClientInterface::class);
        $httpClient->method('send')->willReturn(new Response(status: 201, body: $responseBody));

        $checkoutClient = new CheckoutApiClient($config, client: $httpClient);
        $checkoutClient->createCheckout('merchant1', 'commerce1', new CreateCheckoutRequest());

        $this->assertCount(1, $captured);
        $this->assertIsString($captured[0]);
    }

    public function testOnResponseBodyCallbackIsInvoked(): void
    {
        $captured = [];
        $responseBody = BaseApiClient::serializeJson(
            new CreateCheckoutResponse(amountOfMoney: new AmountOfMoney(amount: 100, currencyCode: 'EUR'))
        );
        $config = new CommunicatorConfiguration(
            apiKey: 'KEY',
            apiSecret: 'SECRET',
            host: 'awesome-api.com',
            serverMetaInfo: [],
            clientMetaInfo: [],
            onResponseBody: static function (string $body) use (&$captured): void {
                $captured[] = $body;
            },
        );

        $httpClient = $this->createStub(ClientInterface::class);
        $httpClient->method('send')->willReturn(new Response(status: 201, body: $responseBody));

        $checkoutClient = new CheckoutApiClient($config, client: $httpClient);
        $checkoutClient->createCheckout('merchant1', 'commerce1', new CreateCheckoutRequest());

        $this->assertCount(1, $captured);
        $this->assertStringContainsString('100', $captured[0]);
    }

    public function testCallbacksReceiveCorrectPayloads(): void
    {
        $capturedRequest  = null;
        $capturedResponse = null;

        $responseBody = BaseApiClient::serializeJson(
            new CreateCheckoutResponse(amountOfMoney: new AmountOfMoney(amount: 500, currencyCode: 'EUR'))
        );
        $config = new CommunicatorConfiguration(
            apiKey: 'KEY',
            apiSecret: 'SECRET',
            host: 'awesome-api.com',
            serverMetaInfo: [],
            clientMetaInfo: [],
            onRequestBody: static function (string $body) use (&$capturedRequest): void {
                $capturedRequest = $body;
            },
            onResponseBody: static function (string $body) use (&$capturedResponse): void {
                $capturedResponse = $body;
            },
        );

        $httpClient = $this->createStub(ClientInterface::class);
        $httpClient->method('send')->willReturn(new Response(status: 201, body: $responseBody));

        $request = new CreateCheckoutRequest(
            amountOfMoney: new AmountOfMoney(amount: 42, currencyCode: 'USD')
        );
        $checkoutClient = new CheckoutApiClient($config, client: $httpClient);
        $checkoutClient->createCheckout('merchant1', 'commerce1', $request);

        $this->assertNotNull($capturedRequest);
        $this->assertIsString($capturedRequest);
        /** @var string $capturedRequest */
        $this->assertStringContainsString('42', $capturedRequest);

        $this->assertNotNull($capturedResponse);
        $this->assertIsString($capturedResponse);
        /** @var string $capturedResponse */
        $this->assertStringContainsString('500', $capturedResponse);
    }

    public function testNoCallbacksDoesNotError(): void
    {
        $config = new CommunicatorConfiguration(
            apiKey: 'KEY',
            apiSecret: 'SECRET',
            host: 'awesome-api.com',
            serverMetaInfo: [],
            clientMetaInfo: [],
        );

        $responseBody = BaseApiClient::serializeJson(
            new CreateCheckoutResponse(amountOfMoney: new AmountOfMoney(amount: 100, currencyCode: 'EUR'))
        );
        $httpClient = $this->createStub(ClientInterface::class);
        $httpClient->method('send')->willReturn(new Response(status: 201, body: $responseBody));

        $checkoutClient = new CheckoutApiClient($config, client: $httpClient);
        $result = $checkoutClient->createCheckout('merchant1', 'commerce1', new CreateCheckoutRequest());

        $this->assertInstanceOf(CreateCheckoutResponse::class, $result);
    }
}
