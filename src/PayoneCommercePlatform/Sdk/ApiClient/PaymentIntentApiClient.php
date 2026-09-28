<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentIntentRequest;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentIntentResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentIntentResponse;
use PayoneCommercePlatform\Sdk\Models\PatchPaymentIntentRequest;
use PayoneCommercePlatform\Sdk\Models\PatchPaymentIntentResponse;

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

    /**
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     */
    public function patchPaymentIntent(string $merchantId, string $paymentIntentId, PatchPaymentIntentRequest $patchPaymentIntentRequest): PatchPaymentIntentResponse
    {
        return $this->makeApiCall($this->patchPaymentIntentRequest($merchantId, $paymentIntentId, $patchPaymentIntentRequest), PatchPaymentIntentResponse::class)[0];
    }

    protected function patchPaymentIntentRequest(string $merchantId, string $paymentIntentId, PatchPaymentIntentRequest $patchPaymentIntentRequest): Request
    {
        $resourcePath = str_replace(
            ['{merchantId}', '{paymentIntentId}'],
            [rawurlencode($merchantId), rawurlencode($paymentIntentId)],
            '/v1/{merchantId}/payment-intents/{paymentIntentId}',
        );

        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath,
            ['Content-Type' => self::MEDIA_TYPE_JSON],
            self::serializeJson($patchPaymentIntentRequest),
        );
    }
}
