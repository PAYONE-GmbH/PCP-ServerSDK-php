<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Domain\CancelPaymentRequest;
use PayoneCommercePlatform\Sdk\Domain\CancelPaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\CapturePaymentRequest;
use PayoneCommercePlatform\Sdk\Domain\CapturePaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\CompletePaymentRequest;
use PayoneCommercePlatform\Sdk\Domain\CompletePaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\CreatePaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\PausePaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\PaymentExecutionRequest;
use PayoneCommercePlatform\Sdk\Domain\RefundPaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\RefundRequest;
use PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * PaymentExecutionApi Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentExecutionApiClient extends BaseApiClient
{
    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'cancelPaymentExecution' => [
            'application/json',
        ],
        'capturePaymentExecution' => [
            'application/json',
        ],
        'completePayment' => [
            'application/json',
        ],
        'createPayment' => [
            'application/json',
        ],
        'pausePayment' => [
            'application/json',
        ],
        'refundPaymentExecution' => [
            'application/json',
        ],
    ];

    /**
     * Operation cancelPaymentExecution
     *
     * Cancel a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CancelPaymentRequest $cancelPaymentRequest cancelPaymentRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CancelPaymentResponse
     */
    public function cancelPaymentExecution(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CancelPaymentRequest $cancelPaymentRequest
    ): CancelPaymentResponse {
        $request = $this->cancelPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $cancelPaymentRequest);
        list($response) = $this->makeApiCall($request, CancelPaymentResponse::class);
        return $response;
    }

    /**
     * Operation cancelPaymentExecutionAsync
     *
     * Cancel a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CancelPaymentRequest $cancelPaymentRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelPaymentExecutionAsync($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $cancelPaymentRequest): PromiseInterface
    {
        $request = $this->cancelPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $cancelPaymentRequest);
        return $this->makeAsyncApiCall($request, CancelPaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'cancelPaymentExecution'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CancelPaymentRequest $cancelPaymentRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['cancelPaymentExecution'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function cancelPaymentExecutionRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CancelPaymentRequest $cancelPaymentRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/cancel';
        $contentType = 'application/json';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'paymentExecutionId' . '}',
            ObjectSerializer::toPathValue($paymentExecutionId),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($cancelPaymentRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\CapturePaymentRequest $capturePaymentRequest capturePaymentRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CapturePaymentResponse
     */
    public function capturePaymentExecution(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CapturePaymentRequest $capturePaymentRequest
    ): CapturePaymentResponse {
        $request = $this->capturePaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $capturePaymentRequest);
        list($response) = $this->makeApiCall($request, CapturePaymentResponse::class);
        return $response;
    }

    /**
     * Operation capturePaymentExecutionAsync
     *
     * Capture a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CapturePaymentRequest $capturePaymentRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function capturePaymentExecutionAsync(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, CapturePaymentRequest $capturePaymentRequest): PromiseInterface
    {
        $request = $this->capturePaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $capturePaymentRequest);
        return $this->makeAsyncApiCall($request, CapturePaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'capturePaymentExecution'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CapturePaymentRequest $capturePaymentRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function capturePaymentExecutionRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        CapturePaymentRequest $capturePaymentRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/capture';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'paymentExecutionId' . '}',
            ObjectSerializer::toPathValue($paymentExecutionId),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($capturePaymentRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\CompletePaymentRequest $completePaymentRequest completePaymentRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['completePayment'] to see the possible values for this operation
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CompletePaymentResponse
     */
    public function completePayment(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, CompletePaymentRequest $completePaymentRequest): CompletePaymentResponse
    {
        $request = $this->completePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $completePaymentRequest);
        list($response) = $this->makeApiCall($request, CompletePaymentResponse::class);
        return $response;
    }

    /**
     * Operation completePaymentAsync
     *
     * Complete a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CompletePaymentRequest $completePaymentRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function completePaymentAsync(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, CompletePaymentRequest $completePaymentRequest): PromiseInterface
    {
        $request = $this->completePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $completePaymentRequest);
        return $this->makeAsyncApiCall($request, CompletePaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'completePayment'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CompletePaymentRequest $completePaymentRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function completePaymentRequest(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, CompletePaymentRequest $completePaymentRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/complete';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'paymentExecutionId' . '}',
            ObjectSerializer::toPathValue($paymentExecutionId),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($completePaymentRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentExecutionRequest $paymentExecutionRequest paymentExecutionRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CreatePaymentResponse
     */
    public function createPayment(string $merchantId, string $commerceCaseId, string $checkoutId, PaymentExecutionRequest $paymentExecutionRequest): CreatePaymentResponse
    {
        $request = $this->createPaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionRequest);
        list($response) = $this->makeApiCall($request, CreatePaymentResponse::class);
        return $response;
    }

    /**
     * Operation createPaymentAsync
     *
     * Create a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentExecutionRequest $paymentExecutionRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createPayment'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPaymentAsync(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionRequest): PromiseInterface
    {
        $request = $this->createPaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionRequest);
        return $this->makeAsyncApiCall($request, CreatePaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'createPayment'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentExecutionRequest $paymentExecutionRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createPaymentRequest(string $merchantId, string $commerceCaseId, string $checkoutId, PaymentExecutionRequest $paymentExecutionRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($paymentExecutionRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation pausePayment
     *
     * Pause a Payment for selected payment methods
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\PausePaymentResponse
     */
    public function pausePayment(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId): PausePaymentResponse
    {
        $request = $this->pausePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId);
        list($response) = $this->makeApiCall($request, PausePaymentResponse::class);
        return $response;
    }

    /**
     * Operation pausePaymentAsync
     *
     * Pause a Payment for selected payment methods
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pausePaymentAsync(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId): PromiseInterface
    {
        $request = $this->pausePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId);
        return $this->makeAsyncApiCall($request, PausePaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'pausePayment'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function pausePaymentRequest(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/pause';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'paymentExecutionId' . '}',
            ObjectSerializer::toPathValue($paymentExecutionId),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            '',
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\RefundRequest $refundRequest refundRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refundPaymentExecution'] to see the possible values for this operation
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\RefundPaymentResponse
     */
    public function refundPaymentExecution(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, RefundRequest $refundRequest): RefundPaymentResponse
    {
        $request = $this->refundPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $refundRequest);
        list($response) = $this->makeApiCall($request, RefundPaymentResponse::class);
        return $response;
    }

    /**
     * Operation refundPaymentExecutionAsync
     *
     * Refund a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\RefundRequest $refundRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function refundPaymentExecutionAsync(string $merchantId, string $commerceCaseId, string $checkoutId, string $paymentExecutionId, RefundRequest $refundRequest): PromiseInterface
    {
        $request = $this->refundPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $refundRequest);
        return $this->makeAsyncApiCall($request, RefundPaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'refundPaymentExecution'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  string $paymentExecutionId Unique identifier of a paymentExecution (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\RefundRequest $refundRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refundPaymentExecution'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function refundPaymentExecutionRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        string $paymentExecutionId,
        RefundRequest $refundRequest
    ): Request {

        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/payment-executions/{paymentExecutionId}/refund';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'paymentExecutionId' . '}',
            ObjectSerializer::toPathValue($paymentExecutionId),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($refundRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
