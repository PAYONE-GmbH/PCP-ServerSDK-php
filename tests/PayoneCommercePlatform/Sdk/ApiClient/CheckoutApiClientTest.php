<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\Stub;
use PayoneCommercePlatform\Sdk\Models\APIError;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CheckoutResponse;
use PayoneCommercePlatform\Sdk\Models\CheckoutsResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutResponse;
use PayoneCommercePlatform\Sdk\Models\ErrorResponse;
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
        return new CheckoutResponse(
            commerceCaseId: 'id1',
            checkoutId: 'id2',
            merchantCustomerId: 'id3',
            amountOfMoney: new AmountOfMoney(amount: 1000, currencyCode: 'EUR')
        );
    }

    protected function makeErrorResponse(): ErrorResponse
    {
        return new ErrorResponse(errorId: 'test-id', errors: [new APIError('test-code')]);
    }

    public function testCreateCheckout(): void
    {
        $createCheckoutResponse = new CreateCheckoutResponse(amountOfMoney: new AmountOfMoney(amount: 1337, currencyCode: 'EUR'));
        $this->httpClient->method('send')->willReturn(new Response(status: 201, body: BaseApiClient::getSerializer()->serialize($createCheckoutResponse, 'json')));
        $createCheckoutRequest = new CreateCheckoutRequest(amountOfMoney: new AmountOfMoney(amount: 100, currencyCode: 'EUR'));

        $response = $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);

        $this->assertEquals($createCheckoutResponse, $response);
    }

    public function testCreateCheckoutUnsuccessful400(): void
    {
        // arrange
        $createCheckoutResponse = new CreateCheckoutResponse(
            amountOfMoney: new AmountOfMoney(400, 'EUR'),
        );
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        // act
        $createCheckoutRequest = new CreateCheckoutRequest(
            amountOfMoney: new AmountOfMoney(400, 'EUR'),
        );
        $response = $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);
    }

    public function testCreateCheckoutUnsuccessful500(): void
    {
        // arrange
        $createCheckoutRequest = new CreateCheckoutRequest();
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: 'invalid'));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        // act
        $response = $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);
    }

    public function testGetCheckoutsSuccessful(): void
    {
        // arrange
        $checkoutsResponse = new CheckoutsResponse(1, [$this->makeCheckoutResponse()]);
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($checkoutsResponse, 'json')));

        // act
        $response = $this->checkoutClient->getCheckouts($this->merchantId);
        $allCheckouts = $response->getCheckouts();
        $checkout = $allCheckouts ? $allCheckouts[0] : null;

        // assert
        $this->assertEquals(1, $checkoutsResponse->getNumberOfCheckouts());
        $this->assertEquals($this->makeCheckoutResponse(), $checkout);
    }

    public function testGetCheckoutsUnsuccessful400(): void
    {
        // arrange
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
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
}
