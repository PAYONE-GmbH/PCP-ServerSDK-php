<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Models\CancelPaymentRequest;
use PayoneCommercePlatform\Sdk\Models\CancelPaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CapturePaymentRequest;
use PayoneCommercePlatform\Sdk\Models\CapturePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CompletePaymentRequest;
use PayoneCommercePlatform\Sdk\Models\CompletePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\CreatePaymentResponse;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionRequest;
use PayoneCommercePlatform\Sdk\Models\RefundPaymentResponse;
use PayoneCommercePlatform\Sdk\Models\RefundRequest;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class PaymentExecutionApiClient extends BaseApiClient
{
    /**
     * Operation cancelPaymentExecution
     *
     * Cancel a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CancelPaymentRequest $cancelPaymentRequest cancelPaymentRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CancelPaymentResponse
     */
    public function cancelPaymentExecution(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CancelPaymentRequest $cancelPaymentRequest
    ): CancelPaymentResponse {
        $request = $this->cancelPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $cancelPaymentRequest);
        return $this->makeApiCall($request, CancelPaymentResponse::class)[0];
    }

    /**
     * Create request for operation 'cancelPaymentExecution'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CancelPaymentRequest $cancelPaymentRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelPaymentExecutionRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CancelPaymentRequest $cancelPaymentRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/cancel';
        $httpBody = '';

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
            '{' . 'paymentExecutionId' . '}',
            rawurlencode($paymentExecutionId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($cancelPaymentRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation capturePaymentExecution
     *
     * Capture a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CapturePaymentRequest $capturePaymentRequest capturePaymentRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CapturePaymentResponse
     */
    public function capturePaymentExecution(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CapturePaymentRequest $capturePaymentRequest
    ): CapturePaymentResponse {
        $request = $this->capturePaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $capturePaymentRequest);
        return $this->makeApiCall($request, CapturePaymentResponse::class)[0];
    }

    /**
     * Create request for operation 'capturePaymentExecution'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CapturePaymentRequest $capturePaymentRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function capturePaymentExecutionRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CapturePaymentRequest $capturePaymentRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/capture';
        $httpBody = '';

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
            '{' . 'paymentExecutionId' . '}',
            rawurlencode($paymentExecutionId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($capturePaymentRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation completePayment
     *
     * Complete a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CompletePaymentRequest $completePaymentRequest completePaymentRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CompletePaymentResponse
     */
    public function completePayment(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, CompletePaymentRequest $completePaymentRequest): CompletePaymentResponse
    {
        $request = $this->completePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $completePaymentRequest);
        return $this->makeApiCall($request, CompletePaymentResponse::class)[0];
    }

    /**
     * Create request for operation 'completePayment'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CompletePaymentRequest $completePaymentRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function completePaymentRequest(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, CompletePaymentRequest $completePaymentRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/complete';
        $httpBody = '';

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
            '{' . 'paymentExecutionId' . '}',
            rawurlencode($paymentExecutionId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($completePaymentRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createPayment
     *
     * Create a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\PaymentExecutionRequest $paymentExecutionRequest paymentExecutionRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CreatePaymentResponse
     */
    public function createPayment(string $merchantId, string $commerceCaseId, string $checkoutId, PaymentExecutionRequest $paymentExecutionRequest): CreatePaymentResponse
    {
        $request = $this->createPaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionRequest);
        return $this->makeApiCall($request, CreatePaymentResponse::class)[0];
    }

    /**
     * Create request for operation 'createPayment'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\PaymentExecutionRequest $paymentExecutionRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createPaymentRequest(string $merchantId, string $commerceCaseId, string $checkoutId, PaymentExecutionRequest $paymentExecutionRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions';
        $httpBody = '';

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

        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($paymentExecutionRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation refundPaymentExecution
     *
     * Refund a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\RefundRequest $refundRequest refundRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\RefundPaymentResponse
     */
    public function refundPaymentExecution(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, RefundRequest $refundRequest): RefundPaymentResponse
    {
        $request = $this->refundPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $refundRequest);
        return $this->makeApiCall($request, RefundPaymentResponse::class)[0];
    }

    /**
     * Create request for operation 'refundPaymentExecution'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\RefundRequest $refundRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function refundPaymentExecutionRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        RefundRequest $refundRequest
    ): Request {

        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/refund';
        $httpBody = '';

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
            '{' . 'paymentExecutionId' . '}',
            rawurlencode($paymentExecutionId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($refundRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
