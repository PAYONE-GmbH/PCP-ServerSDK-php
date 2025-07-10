<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;
use PayoneCommercePlatform\Sdk\Models\AuthenticationToken;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class AuthenticationApiClientTest extends TestCase
{
    use TestApiClientTrait;
    private AuthenticationApiClient $client;

    protected function setUp(): void
    {
        $this->initTestConfig();
        $this->client = new AuthenticationApiClient($this->communicatorConfiguration, client: $this->httpClient);
    }

    public function testGetAuthenticationTokensReturnsToken(): void
    {
        $tokenResponse = new AuthenticationToken(token: 'abc', id: 'id', creationDate: '2024-01-01T00:00:00Z', expirationDate:
            '2024-01-01T01:00:00Z');
        $this->httpClient->method('send')->willReturn(new Response(status: 200, body: BaseApiClient::serializeJson($tokenResponse)));
        $result = $this->client->getAuthenticationTokens($this->merchantId);
        $this->assertInstanceOf(AuthenticationToken::class, $result);
        $this->assertEquals($tokenResponse, $result);
    }

    public function testGetAuthenticationTokensUnsuccessful400(): void
    {
        $errorResponse = $this->makeErrorResponse();
        $this->httpClient->method('send')->willReturn(new Response(status: 400, body:
            BaseApiClient::serializeJson($errorResponse)));
        $this->expectException(ApiErrorResponseException::class);
        $this->expectExceptionCode(400);
        $this->client->getAuthenticationTokens($this->merchantId);
    }

    public function testGetAuthenticationTokensUnsuccessful500(): void
    {
        $this->httpClient->method('send')->willReturn(new Response(status: 500, body: 'invalid'));
        $this->expectException(ApiResponseRetrievalException::class);
        $this->expectExceptionCode(500);
        $this->client->getAuthenticationTokens($this->merchantId);
    }
}