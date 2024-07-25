<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Domain\CancelRequest;
use PayoneCommercePlatform\Sdk\Domain\CancelResponse;
use PayoneCommercePlatform\Sdk\Domain\CompleteOrderRequest;
use PayoneCommercePlatform\Sdk\Domain\CompletePaymentResponse;
use PayoneCommercePlatform\Sdk\Domain\DeliverRequest;
use PayoneCommercePlatform\Sdk\Domain\DeliverResponse;
use PayoneCommercePlatform\Sdk\Domain\OrderRequest;
use PayoneCommercePlatform\Sdk\Domain\OrderResponse;
use PayoneCommercePlatform\Sdk\Domain\ReturnRequest;
use PayoneCommercePlatform\Sdk\Domain\ReturnResponse;
use PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * OrderManagementCheckoutActionsApi Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OrderManagementCheckoutActionsApiClient extends BaseApiClient
{
    /**
     * Operation cancelOrder
     *
     * Mark items of a Checkout as cancelled and automatically cancel the payment for the items
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CancelRequest $cancelRequest cancelRequest (optional)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CancelResponse
     */
    public function cancelOrder(string $merchantId, string $commerceCaseId, string $checkoutId, ?CancelRequest $cancelRequest = null): CancelResponse
    {
        $request = $this->cancelOrderRequest($merchantId, $commerceCaseId, $checkoutId, $cancelRequest);
        list($response) = $this->makeApiCall($request, $cancelRequest);
        return $response;
    }

    /**
     * Operation cancelOrderAsync
     *
     * Mark items of a Checkout as cancelled and automatically cancel the payment for the items
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CancelRequest $cancelRequest (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelOrderAsync(string $merchantId, string $commerceCaseId, string $checkoutId, ?CancelRequest $cancelRequest = null): PromiseInterface
    {
        $request = $this->cancelOrderRequest($merchantId, $commerceCaseId, $checkoutId, $cancelRequest);
        return $this->makeAsyncApiCall($request, CancelResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'cancelOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CancelRequest $cancelRequest (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function cancelOrderRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        ?CancelRequest $cancelRequest = null
    ): Request {

        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/cancel';
        $contentType = $this::MEDIA_TYPE_JSON;
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
            [$this::MEDIA_TYPE_JSON, ],
            $contentType,
            $multipart
        );

        if ($cancelRequest !== null) {
            $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($cancelRequest));
        }
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
     * Operation completeOrder
     *
     * Complete an Order
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CompleteOrderRequest $completeOrderRequest completeOrderRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CompletePaymentResponse
     */
    public function completeOrder(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        CompleteOrderRequest $completeOrderRequest
    ): CompletePaymentResponse {
        $request = $this->completeOrderRequest($merchantId, $commerceCaseId, $checkoutId, $completeOrderRequest);
        list($response) = $this->makeApiCall($request, $completeOrderRequest);
        return $response;
    }

    /**
     * Operation completeOrderAsync
     *
     * Complete an Order
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CompleteOrderRequest $completeOrderRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function completeOrderAsync(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        CompleteOrderRequest $completeOrderRequest
    ): PromiseInterface {
        $request = $this->completeOrderRequest($merchantId, $commerceCaseId, $checkoutId, $completeOrderRequest);
        return $this->makeAsyncApiCall(request, CompletePaymentResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }


    /**
     * Create request for operation 'completeOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CompleteOrderRequest $completeOrderRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function completeOrderRequest(string $merchantId, string $commerceCaseId, string $checkoutId, CompleteOrderRequest $completeOrderRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/complete-order';
        $contentType = $this::MEDIA_TYPE_JSON;
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
            [$this::MEDIA_TYPE_JSON, ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($completeOrderRequest));

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
     * Operation createOrder
     *
     * Creates an Order that will automatially execute a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\OrderRequest $orderRequest orderRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\OrderResponse
     */
    public function createOrder(string $merchantId, string $commerceCaseId, string $checkoutId, OrderRequest $orderRequest): OrderResponse
    {
        $request = $this->createOrderRequest($merchantId, $commerceCaseId, $checkoutId, $orderRequest);
        list($response) = $this->makeApiCall($request, OrderResponse::class);
        return $response;
    }

    /**
     * Operation createOrderAsync
     *
     * Creates an Order that will automatially execute a Payment
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\OrderRequest $orderRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createOrderAsync(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        OrderRequest $orderRequest
    ): PromiseInterface {
        $request = $this->createOrderRequest($merchantId, $commerceCaseId, $checkoutId, $orderRequest);
        return $this->makeAsyncApiCall($request, OrderResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'createOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\OrderRequest $orderRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createOrderRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        OrderRequest $orderRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/order';
        $contentType = $this::MEDIA_TYPE_JSON;
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
            [$this::MEDIA_TYPE_JSON, ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($orderRequest));

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
     * Operation deliverOrder
     *
     * Mark items of a Checkout as delivered and automatically capture the payment for the items
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\DeliverRequest $deliverRequest deliverRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\DeliverResponse
     */
    public function deliverOrder(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        DeliverRequest $deliverRequest
    ): DeliverResponse {
        $request = $this->deliverOrderRequest($merchantId, $commerceCaseId, $checkoutId, $deliverRequest);
        list($response) = $this->makeApiCall($request, DeliverResponse::class);
        return $response;
    }

    /**
     * Operation deliverOrderAsync
     *
     * Mark items of a Checkout as delivered and automatically capture the payment for the items
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\DeliverRequest $deliverRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deliverOrderAsync(string $merchantId, string $commerceCaseId, string $checkoutId, DeliverRequest $deliverRequest): PromiseInterface
    {
        $request = $this->deliverOrderRequest($merchantId, $commerceCaseId, $checkoutId, $deliverRequest);
        return $this->makeAsyncApiCall($request, DeliverResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'deliverOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\DeliverRequest $deliverRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deliverOrderRequest(
        string $merchantId,
        string $commerceCaseId,
        string  $checkoutId,
        DeliverRequest $deliverRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/deliver';
        $contentType = $this::MEDIA_TYPE_JSON;
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
            [$this::MEDIA_TYPE_JSON, ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($deliverRequest));

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
     * Operation returnOrder
     *
     * Mark items of a Checkout as returned and automatically refund the payment for the items
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\ReturnRequest $returnRequest returnRequest (optional)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\ReturnResponse
     */
    public function returnOrder(string $merchantId, string  $commerceCaseId, string $checkoutId, ?ReturnResponse $returnRequest = null): ReturnResponse
    {
        $request = $this->returnOrderRequest($merchantId, $commerceCaseId, $checkoutId, $returnRequest);
        list($response) = $this->makeApiCall($request, $returnRequest);
        return $response;
    }

    /**
     * Operation returnOrderAsync
     *
     * Mark items of a Checkout as returned and automatically refund the payment for the items
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\ReturnRequest $returnRequest (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function returnOrderAsync(
        string $merchantId,
        string  $commerceCaseId,
        string $checkoutId,
        ?ReturnRequest $returnRequest = null
    ): PromiseInterface {
        $request = $this->returnOrderRequest($merchantId, $commerceCaseId, $checkoutId, $returnRequest);
        return $this->makeAsyncApiCall($request, ReturnResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'returnOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\ReturnRequest $returnRequest (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['returnOrder'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function returnOrderRequest(
        string $merchantId,
        string  $commerceCaseId,
        string $checkoutId,
        ?ReturnRequest $returnRequest = null
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/return';
        $contentType = $this::MEDIA_TYPE_JSON;
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
            [$this::MEDIA_TYPE_JSON, ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($returnRequest));

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
