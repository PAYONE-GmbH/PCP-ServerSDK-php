<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\Stub;
use PayoneCommercePlatform\Sdk\ApiException;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;
use PHPUnit\Framework\TestCase;

class CheckoutApiClientTest extends TestCase
{
    private CommunicatorConfiguration $communicatorConfiguration;
    private RequestHeaderGenerator $requestHeaderGenerator;
    private ClientInterface & Stub  $httpClient;
    private CheckoutApiClient $checkoutClient;
    private String $merchantId = "MY_MERCHANT_ID";

    public function setUp(): void
    {
        $this->communicatorConfiguration = new CommunicatorConfiguration(apiKeyId: "KEY", apiSecret: "SECRET", host: "awesome-api.com", clientMetaInfo: []);
        $this->requestHeaderGenerator = new RequestHeaderGenerator($this->communicatorConfiguration);
        $this->httpClient = $this->createStub(ClientInterface::class);
        $this->checkoutClient = new CheckoutApiClient($this->requestHeaderGenerator, client: $this->httpClient);
    }

    public function testGetCheckouts(): void
    {
        // arrange
        $reponse = new Response(500);
        $this->httpClient->method('send')->willReturn($reponse);
        $this->expectException(ApiException::class);

        // act
        $response = $this->checkoutClient->getCheckouts($this->merchantId);
    }
}
