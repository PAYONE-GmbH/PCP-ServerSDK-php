<?php

namespace PayoneCommercePlatform\Sdk;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

class RequestHeaderGeneratorTest extends TestCase
{
    private CommunicatorConfiguration $communicatorConfiguration;

    private RequestHeaderGenerator $requestHeaderGenerator;

    protected function setUp(): void
    {
        $this->communicatorConfiguration = $this->getMockBuilder(CommunicatorConfiguration::class)->disableOriginalConstructor()->getMock();
        $this->requestHeaderGenerator    = new RequestHeaderGenerator($this->communicatorConfiguration);
    }

    public function testGenerateAdditionalRequestHeadersAuthHeaderRegexCheck()
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json']);
        $this->communicatorConfiguration->method('getApiKeyId')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            1,
            preg_match('/^GCS v1HMAC:'.$this->communicatorConfiguration->getApiKeyId().':[a-zA-Z0-9\/\+]+={0,2}$/', reset($additionalHeadersRequest->getHeaders()['Authorization']))
        );
    }

    public function testGenerateAdditionalRequestHeadersWithoutClientMetaInfo()
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Date' => 'Wed, 03 Apr 2024 10:02:13 GMT']);
        $this->communicatorConfiguration->method('getApiKeyId')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            [
                'Content-Type'         => ['application/json'],
                'Accept'               => ['application/json'],
                'Host'                 => ['commerce-api.payone.com'],
                'Date'                 => ['Wed, 03 Apr 2024 10:02:13 GMT'],
                'X-GCS-ServerMetaInfo' => ['eyJwbGF0Zm9ybUlkZW50aWZpZXIiOiJXaW5kb3dzIE5UIFAxV04wOTE0IDEwLjAgYnVpbGQgMTkwNDUgKFdpbmRvd3MgMTApIEFNRDY0OyBwaHAgdmVyc2lvbiA4LjIuOSIsInNka0lkZW50aWZpZXIiOiJQSFBTZXJ2ZXJTREsvdjAuMC4xIiwic2RrQ3JlYXRvciI6IlBBWU9ORSBHbWJIIn0='],
                'Authorization'        => ['GCS v1HMAC:KEY:QO7wahHzU9PHt8k5rD1FknlGGC9Q/UaQbR7WoPTMhdM=']
            ],
            $additionalHeadersRequest->getHeaders()
        );
    }

    public function testGenerateAdditionalRequestHeadersWithClientMetaInfo()
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Date' => 'Wed, 03 Apr 2024 10:02:13 GMT']);
        $this->communicatorConfiguration->method('getApiKeyId')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');
        $this->communicatorConfiguration->method('getClientMetaInfo')->willReturn(['key' => 'value']);

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            [
                'Content-Type'         => ['application/json'],
                'Accept'               => ['application/json'],
                'Host'                 => ['commerce-api.payone.com'],
                'Date'                 => ['Wed, 03 Apr 2024 10:02:13 GMT'],
                'X-GCS-ServerMetaInfo' => ['eyJwbGF0Zm9ybUlkZW50aWZpZXIiOiJXaW5kb3dzIE5UIFAxV04wOTE0IDEwLjAgYnVpbGQgMTkwNDUgKFdpbmRvd3MgMTApIEFNRDY0OyBwaHAgdmVyc2lvbiA4LjIuOSIsInNka0lkZW50aWZpZXIiOiJQSFBTZXJ2ZXJTREsvdjAuMC4xIiwic2RrQ3JlYXRvciI6IlBBWU9ORSBHbWJIIn0='],
                'X-GCS-ClientMetaInfo' => ['eyJrZXkiOiJ2YWx1ZSJ9'],
                'Authorization'        => ['GCS v1HMAC:KEY:4JY/0vPpluP57xr0BX8g0jsm5g5um+9NlhFEojm8q2g=']
            ],
            $additionalHeadersRequest->getHeaders()
        );
    }
}
