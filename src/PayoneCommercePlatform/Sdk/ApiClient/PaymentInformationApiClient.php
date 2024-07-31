<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PayoneCommercePlatform\Sdk\Models\PaymentInformationRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentInformationResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class PaymentInformationApiClient extends BaseApiClient
{
    /**
     * Operation createPaymentInformation
     *
     * Create a Payment Information
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\PaymentInformationRequest $paymentInformationRequest paymentInformationRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\PaymentInformationResponse
     */
    public function createPaymentInformation(string $merchantId, string $commerceCaseId, string $checkoutId, PaymentInformationRequest $paymentInformationRequest): PaymentInformationResponse
    {
        $request = $this->createPaymentInformationRequest($merchantId, $commerceCaseId, $checkoutId, $paymentInformationRequest);
        list($response) = $this->makeApiCall($request, PaymentInformationResponse::class);
        return $response;
    }

    /**
     * Create request for operation 'createPaymentInformation'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\PaymentInformationRequest $paymentInformationRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createPaymentInformationRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        PaymentInformationRequest $paymentInformationRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-information';
        $httpBody = '';

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            rawurlencode($merchantId),
            $resourcePath
        );
        // path params
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            rawurlencode($commerceCaseId),
            $resourcePath
        );
        // path params
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            rawurlencode($checkoutId),
            $resourcePath
        );


        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($paymentInformationRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPaymentInformation
     *
     * Get a Payment Information
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentInformationId Unique identifier of a paymentInformation (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\PaymentInformationResponse
     */
    public function getPaymentInformation(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentInformationId): PaymentInformationResponse
    {
        $request = $this->getPaymentInformationRequest($merchantId, $commerceCaseId, $checkoutId, $paymentInformationId);
        list($response) = $this->makeApiCall($request, PaymentInformationResponse::class);
        return $response;
    }

    /**
     * Create request for operation 'getPaymentInformation'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentInformationId Unique identifier of a paymentInformation (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPaymentInformationRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentInformationId,
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-information/{paymentInformationId}';

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            rawurlencode($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            rawurlencode($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            rawurlencode($checkoutId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'paymentInformationId' . '}',
            rawurlencode($paymentInformationId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $operationHost = $this->config->getHost();
        return new Request(
            'GET',
            $operationHost . $resourcePath,
            $headers,
        );
    }
}
