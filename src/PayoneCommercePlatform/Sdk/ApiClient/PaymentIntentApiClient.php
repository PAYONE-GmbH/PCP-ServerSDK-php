<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentIntentRequest;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentIntentResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentIntentResponse;

class PaymentIntentApiClient extends BaseApiClient
{
    /**
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     */
    public function createPaymentIntent(string $merchantId, CreatePaymentIntentRequest $createPaymentIntentRequest): CreatePaymentIntentResponse
    {
        return $this->makeApiCall($this->createPaymentIntentRequest($merchantId, $createPaymentIntentRequest), CreatePaymentIntentResponse::class)[0];
    }

    protected function createPaymentIntentRequest(string $merchantId, CreatePaymentIntentRequest $createPaymentIntentRequest): Request
    {
        $resourcePath = str_replace('{merchantId}', rawurlencode($merchantId), '/v1/{merchantId}/payment-intents');

        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath,
            ['Content-Type' => self::MEDIA_TYPE_JSON],
            self::serializeJson($createPaymentIntentRequest),
        );
    }

    /**
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     */
    public function getPaymentIntent(string $merchantId, string $paymentIntentId): PaymentIntentResponse
    {
        return $this->makeApiCall($this->getPaymentIntentRequest($merchantId, $paymentIntentId), PaymentIntentResponse::class)[0];
    }

    protected function getPaymentIntentRequest(string $merchantId, string $paymentIntentId): Request
    {
        $resourcePath = str_replace(
            ['{merchantId}', '{paymentIntentId}'],
            [rawurlencode($merchantId), rawurlencode($paymentIntentId)],
            '/v1/{merchantId}/payment-intents/{paymentIntentId}',
        );

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath,
            ['Content-Type' => self::MEDIA_TYPE_JSON],
        );
    }
}
