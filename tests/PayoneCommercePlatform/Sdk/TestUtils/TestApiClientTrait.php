<?php

namespace PayoneCommercePlatform\Sdk\TestUtils;

use GuzzleHttp\ClientInterface;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PHPUnit\Framework\MockObject\Stub;
use PayoneCommercePlatform\Sdk\Models\APIError;
use PayoneCommercePlatform\Sdk\Models\ErrorResponse;

trait TestApiClientTrait
{
    private CommunicatorConfiguration $communicatorConfiguration;
    private ClientInterface & Stub  $httpClient;
    private String $merchantId = "MY_MERCHANT_ID";

    protected function initTestConfig(): void
    {
        $this->communicatorConfiguration = new CommunicatorConfiguration(
            apiKey: "KEY",
            apiSecret: "SECRET",
            host: "awesome-api.com",
            clientMetaInfo: [],
            serverMetaInfo: []
        );
        $this->httpClient = parent::createStub(ClientInterface::class);
    }

    protected function makeErrorResponse(): ErrorResponse
    {
        return new ErrorResponse(errorId: 'test-id', errors: [new APIError('test-code')]);
    }
}
