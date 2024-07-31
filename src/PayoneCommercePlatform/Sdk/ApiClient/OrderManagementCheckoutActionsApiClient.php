<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Models\CancelRequest;
use PayoneCommercePlatform\Sdk\Models\CancelResponse;
use PayoneCommercePlatform\Sdk\Models\DeliverRequest;
use PayoneCommercePlatform\Sdk\Models\DeliverResponse;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use PayoneCommercePlatform\Sdk\Models\OrderResponse;
use PayoneCommercePlatform\Sdk\Models\ReturnRequest;
use PayoneCommercePlatform\Sdk\Models\ReturnResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

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
     * @param  \PayoneCommercePlatform\Sdk\Models\CancelRequest $cancelRequest cancelRequest (optional)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CancelResponse
     */
    public function cancelOrder(string $merchantId, string $commerceCaseId, string $checkoutId, ?CancelRequest $cancelRequest = null): CancelResponse
    {
        $request = $this->cancelOrderRequest($merchantId, $commerceCaseId, $checkoutId, $cancelRequest);
        return $this->makeApiCall($request, CancelResponse::class)[0];
    }

    /**
     * Create request for operation 'cancelOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CancelRequest $cancelRequest (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelOrderRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        ?CancelRequest $cancelRequest = null
    ): Request {

        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/cancel';
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

        if ($cancelRequest !== null) {
            $httpBody = $this->serialize($cancelRequest);
        }

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
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
     * @param  \PayoneCommercePlatform\Sdk\Models\OrderRequest $orderRequest orderRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\OrderResponse
     */
    public function createOrder(string $merchantId, string $commerceCaseId, string $checkoutId, OrderRequest $orderRequest): OrderResponse
    {
        $request = $this->createOrderRequest($merchantId, $commerceCaseId, $checkoutId, $orderRequest);
        return $this->makeApiCall($request, OrderResponse::class)[0];
    }

    /**
     * Create request for operation 'createOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\OrderRequest $orderRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createOrderRequest(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        OrderRequest $orderRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/order';
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

        $httpBody = $this->serialize($orderRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
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
     * @param  \PayoneCommercePlatform\Sdk\Models\DeliverRequest $deliverRequest deliverRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\DeliverResponse
     */
    public function deliverOrder(
        string $merchantId,
        string $commerceCaseId,
        string $checkoutId,
        DeliverRequest $deliverRequest
    ): DeliverResponse {
        $request = $this->deliverOrderRequest($merchantId, $commerceCaseId, $checkoutId, $deliverRequest);
        return $this->makeApiCall($request, DeliverResponse::class)[0];
    }

    /**
     * Create request for operation 'deliverOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\DeliverRequest $deliverRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deliverOrderRequest(
        string $merchantId,
        string $commerceCaseId,
        string  $checkoutId,
        DeliverRequest $deliverRequest
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/deliver';
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

        $httpBody = $this->serialize($deliverRequest);

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
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
     * @param  \PayoneCommercePlatform\Sdk\Models\ReturnRequest|null $returnRequest returnRequest (optional)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\ReturnResponse
     */
    public function returnOrder(string $merchantId, string  $commerceCaseId, string $checkoutId, ?ReturnRequest $returnRequest = null): ReturnResponse
    {
        $request = $this->returnOrderRequest($merchantId, $commerceCaseId, $checkoutId, $returnRequest);
        return $this->makeApiCall($request, ReturnResponse::class)[0];
    }

    /**
     * Create request for operation 'returnOrder'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\ReturnRequest $returnRequest (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function returnOrderRequest(
        string $merchantId,
        string  $commerceCaseId,
        string $checkoutId,
        ?ReturnRequest $returnRequest = null
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}/return';
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

        if ($returnRequest !== null) {
            $httpBody = $this->serialize($returnRequest);
        }

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
