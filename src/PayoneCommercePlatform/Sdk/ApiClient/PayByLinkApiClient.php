<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\CreatePayByLinkRequest;
use PayoneCommercePlatform\Sdk\Models\CreatePayByLinkResponse;

class PayByLinkApiClient extends BaseApiClient
{
    /** @throws ApiErrorResponseException|ApiResponseRetrievalException */
    public function createPayByLink(string $merchantId, string $commerceCaseId, string $checkoutId, CreatePayByLinkRequest $createPayByLinkRequest): CreatePayByLinkResponse
    {
        return $this->makeApiCall($this->createPayByLinkRequest($merchantId, $commerceCaseId, $checkoutId, $createPayByLinkRequest), CreatePayByLinkResponse::class)[0];
    }

    protected function createPayByLinkRequest(string $merchantId, string $commerceCaseId, string $checkoutId, CreatePayByLinkRequest $createPayByLinkRequest): Request
    {
        $resourcePath = str_replace(['{merchantId}', '{commerceCaseId}', '{checkoutId}'], [rawurlencode($merchantId), rawurlencode($commerceCaseId), rawurlencode($checkoutId)], '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/pay-by-link');

        return new Request('POST', $this->config->getHost() . $resourcePath, ['Content-Type' => self::MEDIA_TYPE_JSON], self::serializeJson($createPayByLinkRequest));
    }
}
