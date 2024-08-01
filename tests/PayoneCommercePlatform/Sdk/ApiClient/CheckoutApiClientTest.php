<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;
use PayoneCommercePlatform\Sdk\Models\AddressPersonal;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CheckoutResponse;
use PayoneCommercePlatform\Sdk\Models\CheckoutsResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\PatchCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\Shipping;
use PayoneCommercePlatform\Sdk\Queries\GetCheckoutsQuery;

class CheckoutApiClientTest extends TestCase
{
    use TestApiClientTrait;
    private CheckoutApiClient $checkoutClient;

    public function setUp(): void
    {
        $this->initTestConfig();
        $this->checkoutClient = new CheckoutApiClient($this->communicatorConfiguration, client: $this->httpClient);
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
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        // act
        $createCheckoutRequest = new CreateCheckoutRequest(
            amountOfMoney: new AmountOfMoney(400, 'EUR'),
        );
        $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);
    }

    public function testCreateCheckoutUnsuccessful500(): void
    {
        // arrange
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: 'invalid'));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        // act
        $createCheckoutRequest = new CreateCheckoutRequest();
        $this->checkoutClient->createCheckout('1', '2', $createCheckoutRequest);
    }

    public function testGetCheckoutsSuccessful(): void
    {
        // arrange
        $checkoutResponse = new CheckoutResponse(
            commerceCaseId: 'id1',
            checkoutId: 'id2',
            merchantCustomerId: 'id3',
            amountOfMoney: new AmountOfMoney(amount: 1000, currencyCode: 'EUR')
        );
        $checkoutsResponse = new CheckoutsResponse(1, [$checkoutResponse]);
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($checkoutsResponse, 'json')));

        // act
        $query = (new GetCheckoutsQuery())->setOffset(0)->setSize(10);
        $response = $this->checkoutClient->getCheckouts($this->merchantId, $query);
        $allCheckouts = $response->getCheckouts();
        $checkout = $allCheckouts ? $allCheckouts[0] : null;

        // assert
        $this->assertEquals(1, $checkoutsResponse->getNumberOfCheckouts());
        $this->assertEquals($checkoutResponse, $checkout);
    }

    public function testGetCheckoutsUnsuccessful400(): void
    {
        // arrange
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        // act
        $this->checkoutClient->getCheckouts($this->merchantId);
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

    public function testDeleteCheckoutSuccessful(): void
    {
        $this->expectNotToPerformAssertions();
        $this->httpClient->method('send')->willReturn(new Response(status: 204, body: ''));

        $this->checkoutClient->deleteCheckout('1', '2', '3');
    }

    public function testDeleteCheckoutUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $this->checkoutClient->deleteCheckout('1', '2', '3');
    }

    public function testDeleteCheckoutUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $this->checkoutClient->deleteCheckout('1', '2', '3');
    }

    public function testGetCheckoutSuccessful(): void
    {
        $checkoutResponse = new CheckoutResponse(
            commerceCaseId: 'id1',
            checkoutId: 'id2',
            merchantCustomerId: 'id3',
            amountOfMoney: new AmountOfMoney(amount: 1000, currencyCode: 'EUR')
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($checkoutResponse, 'json')));

        $response = $this->checkoutClient->getCheckout('1', '2', '3');

        $this->assertEquals($checkoutResponse, $response);
    }

    public function testGetCheckoutUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $this->checkoutClient->getCheckout('1', '2', '3');
    }

    public function testGetCheckoutUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $this->checkoutClient->getCheckout('1', '2', '3');
    }

    public function testUpdateCheckoutSuccessful(): void
    {
        $this->expectNotToPerformAssertions();

        $payload = new PatchCheckoutRequest(
            amountOfMoney: new AmountOfMoney(amount: 1000, currencyCode: 'EUR'),
            shipping: new Shipping(new AddressPersonal(city: 'Hometown')),
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 204, body: ''));
        $this->checkoutClient->updateCheckout('1', '2', '3', $payload);
    }

    public function testUpdateCheckoutUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new PatchCheckoutRequest();
        $this->checkoutClient->updateCheckout('1', '2', '3', $payload);
    }

    public function testUpdateCheckoutUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new PatchCheckoutRequest();
        $this->checkoutClient->updateCheckout('1', '2', '3', $payload);
    }
}
