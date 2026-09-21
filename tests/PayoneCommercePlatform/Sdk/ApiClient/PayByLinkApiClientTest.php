<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use PayoneCommercePlatform\Sdk\Models\AuthorizationMode;
use PayoneCommercePlatform\Sdk\Models\CreatePayByLinkRequest;
use PayoneCommercePlatform\Sdk\Models\CreatePayByLinkResponse;
use PayoneCommercePlatform\Sdk\Models\OrderType;
use PayoneCommercePlatform\Sdk\Models\PayLinkStatusValue;
use PayoneCommercePlatform\Sdk\Models\PaymentLinkSpecificInput;
use PayoneCommercePlatform\Sdk\Models\References;
use PayoneCommercePlatform\Sdk\TestUtils\TestApiClientTrait;

class PayByLinkApiClientTest extends TestCase
{
    use TestApiClientTrait;

    private PayByLinkApiClient $client;
    private ClientInterface&MockObject $httpClientMock;

    protected function setUp(): void
    {
        $this->initTestConfig();
        $this->httpClientMock = $this->createMock(ClientInterface::class);
        $this->client = new PayByLinkApiClient($this->communicatorConfiguration, $this->httpClientMock);
    }

    public function testCreatePayByLinkBuildsTheDocumentedRequest(): void
    {
        $this->httpClientMock->expects(self::once())->method('send')->with(
            self::callback(function (RequestInterface $request): bool {
                self::assertSame('POST', $request->getMethod());
                self::assertSame('awesome-api.com/v1/merchant%20id/commerce-cases/case%2Fid/checkouts/checkout%2Fid/pay-by-link', $request->getUri()->getPath());
                self::assertSame('{"paymentLinkSpecificInput":{"authorizationMode":"SALE","paymentMethods":["1","840"]},"orderType":"FULL","orderReferences":{"merchantReference":"order-1"}}', (string) $request->getBody());
                return true;
            }),
            ['http_errors' => false],
        )->willReturn(new Response(201, body: '{}'));

        $response = $this->client->createPayByLink(
            'merchant id',
            'case/id',
            'checkout/id',
            new CreatePayByLinkRequest(
                new PaymentLinkSpecificInput(AuthorizationMode::SALE, ['1', '840']),
                OrderType::FULL,
                new References('order-1'),
            ),
        );

        self::assertEquals(new CreatePayByLinkResponse(), $response);
    }

    public function testCreatePayByLinkDeserializesTheDocumentedResponse(): void
    {
        $this->httpClientMock->method('send')->willReturn(new Response(201, body: '{"expirationDate":"2026-09-21T12:00:00+00:00","paymentLinkOrder":{"merchantReference":"order-1","amount":{"amount":30200,"currencyCode":"EUR"}},"status":"ACTIVE","redirectionUrl":"https://example.test/pay/1","paymentLinkId":"b311ea35-57c9-4118-8712-9a5bd253eb37"}'));

        $response = $this->client->createPayByLink(
            'merchant',
            'case',
            'checkout',
            new CreatePayByLinkRequest(
                new PaymentLinkSpecificInput(AuthorizationMode::SALE, ['840']),
                OrderType::FULL,
                new References('order-1'),
            ),
        );

        self::assertSame('2026-09-21T12:00:00+00:00', $response->getExpirationDate()?->format(DATE_ATOM));
        self::assertSame('order-1', $response->getPaymentLinkOrder()?->getMerchantReference());
        self::assertNotNull($response->getPaymentLinkOrder());
        self::assertNotNull($response->getPaymentLinkOrder()->getAmount());
        self::assertSame(30200, $response->getPaymentLinkOrder()->getAmount()->getAmount());
        self::assertSame(PayLinkStatusValue::ACTIVE, $response->getStatus());
        self::assertSame('https://example.test/pay/1', $response->getRedirectionUrl());
        self::assertSame('b311ea35-57c9-4118-8712-9a5bd253eb37', $response->getPaymentLinkId());
    }
}
