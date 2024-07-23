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
        $this->communicatorConfiguration = $this->getMockBuilder(CommunicatorConfiguration::class)->disableOriginalConstructor()->getMock();
        $this->requestHeaderGenerator    = new RequestHeaderGenerator($this->communicatorConfiguration);
    }

    public function testGenerateAdditionalRequestHeadersAuthHeaderHashCheck(): void
    {
        // prepare
        $fullConfig = new CommunicatorConfiguration(apiKey: 'KEY', apiSecret: 'change it', clientMetaInfo: [], integrator: null);
        $fullGenerator = new RequestHeaderGenerator($fullConfig);
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/80809090/commerce-cases?offset=0&size=25', ['Date' => 'Mon, 15 Jul 2024 19:39:17 GMT', 'Content-Type' => 'application/json']);

        // act
        $additionalHeadersRequest = $fullGenerator->generateAdditionalRequestHeaders($request);
        $authHeader = reset($additionalHeadersRequest->getHeaders()['Authorization']);

        // verify
        $this->assertEquals(
            'GCS v1HMAC:KEY:uFcYvdo3akOtJvkMbZOziGvXgM+l4ag3F0vXevDF+9I=',
            $authHeader,
        );
    }
    public function testGenerateAdditionalRequestHeadersAuthHeaderRegexCheck(): void
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json']);
        $this->communicatorConfiguration->method('getApiKey')->willReturn('KEY');
        $this->communicatorConfiguration->method('getApiSecret')->willReturn('SECRET');

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            1,
            preg_match('/^GCS v1HMAC:'.$this->communicatorConfiguration->getApiKey().':[a-zA-Z0-9\/\+]+={0,2}$/', reset($additionalHeadersRequest->getHeaders()['Authorization']))
        );
    }

    public function testGenerateAdditionalRequestHeadersWithoutClientMetaInfo(): void
    {
        // prepare
        $request = new Request('GET', 'https://commerce-api.payone.com/v1/12345/checkouts', ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Date' => 'Wed, 03 Apr 2024 10:02:13 GMT']);
        $this->communicatorConfiguration->method('getApiKey')->willReturn('KEY');
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
                'X-GCS-ServerMetaInfo' => ['eyJwbGF0Zm9ybUlkZW50aWZpZXIiOiJEYXJ3aW4gTUJQLXZvbi1MdWthcy5mcml0ei5ib3ggMjMuNS4wIERhcndpbiBLZXJuZWwgVmVyc2lvbiAyMy41LjA6IFdlZCBNYXkgIDEgMjA6MTQ6MzggUERUIDIwMjQ7IHJvb3Q6eG51LTEwMDYzLjEyMS4zfjUvUkVMRUFTRV9BUk02NF9UNjAyMCBhcm02NDsgcGhwIHZlcnNpb24gOC4zLjkiLCJzZGtJZGVudGlmaWVyIjoiUEhQU2VydmVyU0RLL3YwLjAuMSIsInNka0NyZWF0b3IiOiJQQVlPTkUgR21iSCJ9'],
                'Authorization'        => ['GCS v1HMAC:KEY:sdztnE3Gsfm2Xdlp9UgGhGiVrrjF/mQx4n/YuuS4Iw4=']
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

        // act
        $additionalHeadersRequest = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);

        // verify
        $this->assertEquals(
            [
                'Content-Type'         => ['application/json'],
                'Accept'               => ['application/json'],
                'Host'                 => ['commerce-api.payone.com'],
                'Date'                 => ['Wed, 03 Apr 2024 10:02:13 GMT'],
                'X-GCS-ServerMetaInfo' => ['eyJwbGF0Zm9ybUlkZW50aWZpZXIiOiJEYXJ3aW4gTUJQLXZvbi1MdWthcy5mcml0ei5ib3ggMjMuNS4wIERhcndpbiBLZXJuZWwgVmVyc2lvbiAyMy41LjA6IFdlZCBNYXkgIDEgMjA6MTQ6MzggUERUIDIwMjQ7IHJvb3Q6eG51LTEwMDYzLjEyMS4zfjUvUkVMRUFTRV9BUk02NF9UNjAyMCBhcm02NDsgcGhwIHZlcnNpb24gOC4zLjkiLCJzZGtJZGVudGlmaWVyIjoiUEhQU2VydmVyU0RLL3YwLjAuMSIsInNka0NyZWF0b3IiOiJQQVlPTkUgR21iSCJ9'],
                'X-GCS-ClientMetaInfo' => ['eyJrZXkiOiJ2YWx1ZSJ9'],
                'Authorization'        => ['GCS v1HMAC:KEY:sY+UnSLV8EShnjU4smo+evzCJg3gnjkadY+kv6AfEtI=']
            ],
            $additionalHeadersRequest->getHeaders()
        );
    }
}
