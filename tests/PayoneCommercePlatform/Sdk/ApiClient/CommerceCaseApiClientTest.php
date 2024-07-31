<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\Address;
use PayoneCommercePlatform\Sdk\Models\CommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\ContactDetails;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\Customer;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Queries\GetCommerceCasesQuery;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;
use DateTime;

class CommerceCaseApiClientTest extends TestCase
{
    use TestApiClientTrait;

    private CommerceCaseApiClient $commerceCaseClient;

    public function setUp(): void
    {
        $this->initTestConfig();
        $this->commerceCaseClient = new CommerceCaseApiClient($this->communicatorConfiguration, client: $this->httpClient);
    }

    public function testCreateCommerceCaseSuccessful(): void
    {
        $createCommerceCaseResponse = new CreateCommerceCaseResponse(
            commerceCaseId: '1',
            merchantReference: 'ref',
            customer: new Customer(billingAddress: new Address(
                street: 'Holtenauer Str. 123',
                city: 'Kiel',
                state: 'Schleswig-Holstein',
                countryCode: 'GER',
            )),
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 201, body: BaseApiClient::getSerializer()->serialize($createCommerceCaseResponse, 'json')));

        $payload = new CreateCommerceCaseRequest(
            merchantReference: 'ref',
            customer: new Customer(billingAddress: new Address(
                street: 'Holtenauer Str. 123',
                city: 'Kiel',
                state: 'Schleswig-Holstein',
                countryCode: 'GER',
            )),
        );
        $response = $this->commerceCaseClient->createCommerceCase('1', $payload);

        $this->assertEquals($createCommerceCaseResponse, $response);
    }

    public function testCreateCommerceCaseUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new CreateCommerceCaseRequest(
            merchantReference: 'ref',
            customer: new Customer(billingAddress: new Address(
                street: 'Holtenauer Str. 123',
                city: 'Kiel',
                state: 'Schleswig-Holstein',
                countryCode: 'GER',
            )),
        );
        $this->commerceCaseClient->createCommerceCase('1', $payload);
    }

    public function testCreateCommerceCaseUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new CreateCommerceCaseRequest(
            merchantReference: 'ref',
            customer: new Customer(billingAddress: new Address(
                street: 'Holtenauer Str. 123',
                city: 'Kiel',
                state: 'Schleswig-Holstein',
                countryCode: 'GER',
            )),
        );
        $this->commerceCaseClient->createCommerceCase('1', $payload);
    }

    public function testGetCommerceCaseSuccessful(): void
    {
        $commerceCaseResponse = new CommerceCaseResponse(
            merchantReference: 'ref-test',
            commerceCaseId: '1',
            creationDateTime: new DateTime('2021-01-01T00:00:00+00:00'),
        );
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($commerceCaseResponse, 'json')));

        $response = $this->commerceCaseClient->getCommerceCase('1', '2');

        $this->assertEquals($commerceCaseResponse, $response);
    }

    public function testGetCommerceCaseUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $this->commerceCaseClient->getCommerceCase('1', '2');
    }

    public function testGetCommerceCaseUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $this->commerceCaseClient->getCommerceCase('1', '2');
    }

    public function testGetCommerceCasesSuccessful(): void
    {
        $commerceCasesResponse = [
          new CommerceCaseResponse('ref', 'id1'),
          new CommerceCaseResponse('ref-alt', 'id2')
        ];
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::getSerializer()->serialize($commerceCasesResponse, 'json')));

        $query = (new GetCommerceCasesQuery())
          ->setIncludePaymentChannel([PaymentChannel::POS])
          ->setOffset(100);
        $response = $this->commerceCaseClient->getCommerceCases('1', $query);

        $this->assertEquals($commerceCasesResponse, $response);
    }

    public function testGetCommerceCasesUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $query = (new GetCommerceCasesQuery())
          ->setIncludePaymentChannel([PaymentChannel::ECOMMERCE])
          ->setOffset(100);
        $this->commerceCaseClient->getCommerceCases('1', $query);
    }

    public function testGetCommerceCasesUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $query = (new GetCommerceCasesQuery())
          ->setIncludePaymentChannel([PaymentChannel::ECOMMERCE])
          ->setOffset(100);
        $this->commerceCaseClient->getCommerceCases('1', $query);
    }

    public function testUpdateCommerceCaseSuccessful(): void
    {
        $this->expectNotToPerformAssertions();
        $this->httpClient->method('send')->willReturn(new Response(status: 204, body: null));

        $payload = new Customer(contactDetails: new ContactDetails('mail@mail.com', '+49123456789'));
        $this->commerceCaseClient->updateCommerceCase('1', '2', $payload);
    }

    public function testUpdateCommerceCaseUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body: BaseApiClient::getSerializer()->serialize($errorResponse, 'json')));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);

        $payload = new Customer(contactDetails: new ContactDetails('mail@mail.com', '+49123456789'));
        $this->commerceCaseClient->updateCommerceCase('1', '2', $payload);
    }

    public function testUpdateCommerceCaseUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: null));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);

        $payload = new Customer(contactDetails: new ContactDetails('mail@mail.com', '+49123456789'));
        $this->commerceCaseClient->updateCommerceCase('1', '2', $payload);
    }
}
