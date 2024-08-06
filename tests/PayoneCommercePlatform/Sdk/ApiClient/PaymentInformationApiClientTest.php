<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\PaymentEvent;
use PayoneCommercePlatform\Sdk\Models\PaymentInformationRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentInformationResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentType;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class PaymentInformationApiClientTest extends TestCase
{
    use TestApiClientTrait;

    protected PaymentInformationApiClient $paymentInformationClient;

    public function setUp(): void
    {
        $this->initTestConfig();
        $this->paymentInformationClient = new PaymentInformationApiClient($this->communicatorConfiguration, $this->httpClient);
    }

    public function testCreatePaymentInformationSuccessful(): void
    {
        $paymentInformationResponse = new PaymentInformationResponse(
            commerceCaseId: '1',
            checkoutId: '2',
            merchantCustomerId: '3',
            paymentInformationId: '4',
            paymentProductId: 101010,
            terminalId: '6',
            cardAcceptorId: '7',
            merchantReference: '8',
            paymentChannel: PaymentChannel::POS
        );
        $this->httpClient->method('send')->willReturn(new Response(200, body: PaymentInformationApiClient::serializeJson($paymentInformationResponse)));

        $payload = new PaymentInformationRequest(
            amountOfMoney: new AmountOfMoney(2400, 'USD'),
            type: PaymentType::SALE,
            paymentChannel: PaymentChannel::POS,
            paymentProductId: 1111,
        );
        $response = $this->paymentInformationClient->createPaymentInformation('merchantId', 'commerceCaseId', 'checkoutId', $payload);

        $this->assertEquals($paymentInformationResponse, $response);
    }

    public function testCreatePaymentInformationUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(400, body: PaymentInformationApiClient::serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new PaymentInformationRequest(
            amountOfMoney: new AmountOfMoney(2400, 'USD'),
            type: PaymentType::RESERVATION,
            paymentChannel: PaymentChannel::ECOMMERCE,
            paymentProductId: 1389,
        );
        $this->paymentInformationClient->createPaymentInformation('merchantId', 'commerceCaseId', 'checkoutId', $payload);
    }

    public function testCreatePaymentInformationUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new PaymentInformationRequest(
            amountOfMoney: new AmountOfMoney(1300, 'USD'),
            type: PaymentType::RESERVATION,
            paymentChannel: PaymentChannel::ECOMMERCE,
            paymentProductId: 1389,
        );
        $this->paymentInformationClient->createPaymentInformation('merchantId', 'commerceCaseId', 'checkoutId', $payload);
    }

    public function testGetPaymentInformationSuccessful(): void
    {
        $paymentInformationResponse = new PaymentInformationResponse(
            commerceCaseId: '1',
            checkoutId: '2',
            merchantCustomerId: '3',
            paymentInformationId: '4',
            paymentProductId: 101010,
            terminalId: '6',
            cardAcceptorId: '7',
            merchantReference: '8',
            paymentChannel: PaymentChannel::POS,
            events: [new PaymentEvent()],
        );
        $this->httpClient->method('send')->willReturn(new Response(200, body: PaymentInformationApiClient::serializeJson($paymentInformationResponse)));

        $response = $this->paymentInformationClient->getPaymentInformation('1', '2', '3', '4');

        $this->assertEquals($paymentInformationResponse, $response);
    }

    public function testGetPaymentInformationUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(400, body: PaymentInformationApiClient::serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $this->paymentInformationClient->getPaymentInformation('1', '2', '3', '4');
    }

    public function testGetPaymentInformationUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $this->paymentInformationClient->getPaymentInformation('1', '2', '3', '4');
    }
}
