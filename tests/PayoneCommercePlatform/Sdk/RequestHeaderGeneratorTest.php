<?php

namespace PayoneCommercePlatform\Sdk;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RequestHeaderGeneratorTest extends TestCase
{
    private CommunicatorConfiguration & MockObject $communicatorConfiguration;

    private RequestHeaderGenerator $requestHeaderGenerator;

    protected function setUp(): void
    {
        $this->communicatorConfiguration = $this->getMockBuilder(CommunicatorConfiguration::class)
          ->disableOriginalConstructor()
          ->getMock();
        $this->requestHeaderGenerator    = new RequestHeaderGenerator($this->communicatorConfiguration);
    }

    public function testGenerateAdditionalRequestHeadersAuthHeaderHashCheck(): void
    {
        // prepare
        $fullConfig = new CommunicatorConfiguration(
            apiKey: 'KEY',
            apiSecret: 'change it',
            clientMetaInfo: [],
            // server meta info usually depends on the php version and the os, which is bad for ci runs
            serverMetaInfo: ['platformIdentifier' => 'ci'],
            integrator: null
        );
        $fullGenerator = new RequestHeaderGenerator($fullConfig);
        $request = new Request(
            'GET',
            'https://commerce-api.payone.com/v1/80809090/commerce-cases?offset=0&size=25',
            ['Date' => 'Mon, 15 Jul 2024 19:39:17 GMT', 'Content-Type' => 'application/json']
        );

        // act
        $additionalHeadersRequest = $fullGenerator->generateAdditionalRequestHeaders($request);
        $authHeader = reset($additionalHeadersRequest->getHeaders()['Authorization']);

        // verify
        $this->assertEquals(
            'GCS v1HMAC:KEY:1YZigyYNBJVcZweGTuyuYudC7ae8LHtTpdmNBnVg3w8=',
            $authHeader,
        );
    }
    public function testGenerateAdditionalRequestHeadersAuthHeaderRegexCheck(): void
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json']);
        $this->communicatorConfiguration->method('getApiKey')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');
        $this->communicatorConfiguration->method('getServerMetaInfo')->willReturn([]);

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            1,
            // @phpstan-ignore-next-line
            preg_match('/^GCS v1HMAC:'.$this->communicatorConfiguration->getApiKey().':[a-zA-Z0-9\/\+]+={0,2}$/', reset($additionalHeadersRequest->getHeaders()['Authorization']))
        );
    }

    public function testGenerateAdditionalRequestHeadersWithoutClientMetaInfo(): void
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Date' => 'Wed, 03 Apr 2024 10:02:13 GMT']);
        $this->communicatorConfiguration->method('getApiKey')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');
        $this->communicatorConfiguration->method('getServerMetaInfo')->willReturn([]);

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            [
                'Content-Type'         => ['application/json'],
                'Accept'               => ['application/json'],
                'Host'                 => ['commerce-api.payone.com'],
                'Date'                 => ['Wed, 03 Apr 2024 10:02:13 GMT'],
                'X-GCS-ServerMetaInfo' => ['W10='],
                'Authorization'        => ['GCS v1HMAC:KEY:eoweeXWhFJASue4mQJk0oeR0pc1lFVT42yr/gmHC9GQ=']
            ],
            $additionalHeadersRequest->getHeaders()
        );
    }

    public function testGenerateAdditionalRequestHeadersWithClientMetaInfo(): void
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Date' => 'Wed, 03 Apr 2024 10:02:13 GMT']);
        $this->communicatorConfiguration->method('getApiKey')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');
        $this->communicatorConfiguration->method('getClientMetaInfo')->willReturn(['key' => 'value']);
        $this->communicatorConfiguration->method('getServerMetaInfo')->willReturn([]);

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            [
                'Content-Type'         => ['application/json'],
                'Accept'               => ['application/json'],
                'Host'                 => ['commerce-api.payone.com'],
                'Date'                 => ['Wed, 03 Apr 2024 10:02:13 GMT'],
                'X-GCS-ServerMetaInfo' => ['W10='],
                'X-GCS-ClientMetaInfo' => ['eyJrZXkiOiJ2YWx1ZSJ9'],
                'Authorization'        => ['GCS v1HMAC:KEY:JpeByBFvXI3YyDc53UjcKd0M44eo+4mWDaCW777mEz0=']
            ],
            $additionalHeadersRequest->getHeaders()
        );
    }
}
