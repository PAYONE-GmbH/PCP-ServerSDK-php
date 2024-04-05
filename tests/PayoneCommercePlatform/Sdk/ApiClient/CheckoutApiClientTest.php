<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Domain\CheckoutsResponse;
use PayoneCommercePlatform\Sdk\PayoneCommercePlatformTestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class CheckoutApiClientTest extends PayoneCommercePlatformTestCase
{
    public function testGetCheckouts()
    {
        // prepare
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock->method('getContents')->willReturn($this->getFixture('getCheckoutsResponse.json'));

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);

        $this->client->method('send')->willReturn($responseMock);

        // act
        $response = $this->checkoutApiClient->getCheckouts($this->getMerchantId());

        // verify
        $this->assertInstanceOf(CheckoutsResponse::class, $response);
    }
}
