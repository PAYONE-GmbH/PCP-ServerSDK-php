<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\ClientInterface;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentIntentRequest;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentIntentResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentIntentResponse;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class PaymentIntentApiClientTest extends TestCase
{
    use TestApiClientTrait;

    private PaymentIntentApiClient $paymentIntentClient;
    private ClientInterface&MockObject $httpClientMock;

    protected function setUp(): void
    {
        $this->initTestConfig();
        $this->httpClientMock = $this->createMock(ClientInterface::class);
        $this->paymentIntentClient = new PaymentIntentApiClient($this->communicatorConfiguration, $this->httpClientMock);
    }

    public function testCreatePaymentIntentBuildsTheDocumentedRequest(): void
    {
        $this->httpClientMock->expects(self::once())->method('send')->with(
            self::callback(function (RequestInterface $request): bool {
                self::assertSame('POST', $request->getMethod());
                self::assertSame('awesome-api.com/v1/merchant%20id/payment-intents', $request->getUri()->getPath());
                self::assertSame('{"amountOfMoney":{"amount":1337,"currencyCode":"EUR"}}', (string) $request->getBody());
                return true;
            }),
            ['http_errors' => false],
        )->willReturn(new Response(201, body: '{}'));

        $response = $this->paymentIntentClient->createPaymentIntent('merchant id', new CreatePaymentIntentRequest(new AmountOfMoney(1337, 'EUR')));

        self::assertEquals(new CreatePaymentIntentResponse(), $response);
    }

    public function testGetPaymentIntentBuildsTheDocumentedRequest(): void
    {
        $this->httpClientMock->expects(self::once())->method('send')->with(
            self::callback(function (RequestInterface $request): bool {
                self::assertSame('GET', $request->getMethod());
                self::assertSame('awesome-api.com/v1/merchant%20id/payment-intents/intent%2Fid', $request->getUri()->getPath());
                self::assertSame('', (string) $request->getBody());
                return true;
            }),
            ['http_errors' => false],
        )->willReturn(new Response(200, body: '{}'));

        $response = $this->paymentIntentClient->getPaymentIntent('merchant id', 'intent/id');

        self::assertEquals(new PaymentIntentResponse(), $response);
    }
}
