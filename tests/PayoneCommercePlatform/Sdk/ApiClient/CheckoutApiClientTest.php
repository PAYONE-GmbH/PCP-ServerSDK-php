<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\Stub;
use PayoneCommercePlatform\Sdk\Domain\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Domain\CheckoutResponse;
use PayoneCommercePlatform\Sdk\Domain\CheckoutsResponse;
use PayoneCommercePlatform\Sdk\Domain\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Domain\CreateCheckoutResponse;
use PayoneCommercePlatform\Sdk\Domain\ErrorResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class CheckoutApiClientTest extends TestCase
{
    private CommunicatorConfiguration $communicatorConfiguration;
    private ClientInterface & Stub  $httpClient;
    private CheckoutApiClient $checkoutClient;
    private String $merchantId = "MY_MERCHANT_ID";

    public function setUp(): void
    {
        $this->communicatorConfiguration = new CommunicatorConfiguration(apiKey: "KEY", apiSecret: "SECRET", host: "awesome-api.com", clientMetaInfo: []);
        $this->httpClient = $this->createStub(ClientInterface::class);
        $this->checkoutClient = new CheckoutApiClient($this->communicatorConfiguration, client: $this->httpClient);
    }

    protected function makeCheckoutResponse(): CheckoutResponse
    {
        return new CheckoutResponse([
          'commerceCaseId' => 'ID1',
          'checkoutId' => 'ID2',
          'merchantCustomerId' => 'ID3',
          'amountOfMoney' => 100,
          'references' => null,
          'shipping' => null,
          'shoppingCart' => null,
          'paymentExecutions' => [],
          'checkoutStatus' => null,
          'statusOutput' => null,
          'paymentInformation' => [],
          'creationDateTime' => null,
          'allowedPaymentActions' => [],
        ]);
    }

    protected function makeErrorResponse(): ErrorResponse
    {
        return new ErrorResponse(['errorId' => 'bad', 'errors' => [[
          'errorCode' => '1',
          'category' => 'not so good',
          'id' => 'ID',
          'message' => 'Hi!',
          'propertyName' => '...'
        ]]]);
    }

    public function testCreateCheckout(): void
    {
        $createCheckoutResponse = new CreateCheckoutResponse([
          'amountOfMoney' => new AmountOfMoney(['amount' => 100, 'currencyCode' => 'EUR']),
        ]);
        $this->httpClient->method('send')->willReturn(new Response(status: 201, body: json_encode($createCheckoutResponse->jsonSerialize())));
        $createCheckoutRequest = new CreateCheckoutRequest([
            'amountOfMoney' => new AmountOfMoney(['amount' => 100, 'currencyCode' => 'EUR']),
        ]);

        $response = $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);

        $this->assertEquals($createCheckoutResponse, $response);
    }

    public function testCreateCheckoutUnsuccessful400(): void
    {
        // arrange
        $createCheckoutResponse = new CreateCheckoutResponse([
          'amountOfMoney' => new AmountOfMoney(['amount' => 100, 'currencyCode' => 'EUR']),
        ]);
        $errorResponse = $this->makeErrorResponse();
        $createCheckoutRequest = new CreateCheckoutRequest([
            'amountOfMoney' => new AmountOfMoney(['amount' => 100, 'currencyCode' => 'EUR']),
        ]);
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: json_encode($errorResponse->jsonSerialize())));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        // act
        $response = $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);
    }

    public function testCreateCheckoutUnsuccessful500(): void
    {
        // arrange
        $createCheckoutRequest = new CreateCheckoutRequest([
            'amountOfMoney' => new AmountOfMoney(['amount' => 100, 'currencyCode' => 'EUR']),
        ]);
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: 'invalid'));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        // act
        $response = $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);
    }

    public function testGetCheckoutsSuccessful(): void
    {
        // arrange
        $checkoutsResponse = new CheckoutsResponse([
          'numberOfCheckouts' => 1,
          'checkouts' => [$this->makeCheckoutResponse()],
        ]);
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: json_encode($checkoutsResponse->jsonSerialize())));

        // act
        $response = $this->checkoutClient->getCheckouts($this->merchantId);

        // assert
        $this->assertEquals($checkoutsResponse->getNumberOfCheckouts(), 1);
        $this->assertEquals($checkoutsResponse->getCheckouts()[0], $this->makeCheckoutResponse());
    }

    public function testGetCheckoutsUnsuccessful400(): void
    {
        // arrange
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: json_encode($errorResponse->jsonSerialize())));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        // act
        $response = $this->checkoutClient->getCheckouts($this->merchantId);
    }

    public function testGetCheckoutsUnsuccessful500(): void
    {
        // arrange
        $this->httpClient->method('send')->willThrowException(
            new RequestException(message:"", request: new Request("GET", "/v1"), response: new Response(status: 500))
        );
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        // act
        $response = $this->checkoutClient->getCheckouts($this->merchantId);
    }

    public function testGetCheckoutsWithoutMerchantId(): void
    {
        $this->expectException(\TypeError::class);

        $response = $this->checkoutClient->getCheckouts(merchantId: null);
    }
}
