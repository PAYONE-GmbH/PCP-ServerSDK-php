<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Models\CheckoutResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutResponse;
use PayoneCommercePlatform\Sdk\Models\PatchCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\CheckoutsResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Queries\GetCheckoutsQuery;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class CheckoutApiClient extends BaseApiClient
{
    /**
     * Operation createCheckout
     *
     * Add a Checkout to an existing Commerce Case
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest $createCheckoutRequest createCheckoutRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CreateCheckoutResponse
     */
    public function createCheckout(string $merchantId, string $commerceCaseId, CreateCheckoutRequest $createCheckoutRequest): CreateCheckoutResponse
    {
        $request = $this->createCheckoutRequest($merchantId, $commerceCaseId, $createCheckoutRequest);

        list($response) = $this->makeApiCall($request, CreateCheckoutResponse::class);
        return $response;
    }

    /**
     * Create request for operation 'createCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest $createCheckoutRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createCheckoutRequest(
        string $merchantId,
        string $commerceCaseId,
        CreateCheckoutRequest $createCheckoutRequest,
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts';
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


        /** @var array<string, string> */
        $headers = [];
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;

        $httpBody = self::$serializer->serialize($createCheckoutRequest, 'json');

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody,
        );
    }

    /**
     * Operation deleteCheckout
     *
     * Delete a Checkout
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return void
     */
    public function deleteCheckout(string $merchantId, string $commerceCaseId, string $checkoutId): void
    {
        $request = $this->deleteCheckoutRequest($merchantId, $commerceCaseId, $checkoutId);

        $this->makeApiCall($request);
    }

    /**
     * Create request for operation 'deleteCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteCheckoutRequest(string $merchantId, string $commerceCaseId, string $checkoutId): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}';
        $contentType = 'application/json';

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
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            rawurlencode($checkoutId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = [];
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;

        $operationHost = $this->config->getHost();
        return new Request(
            'DELETE',
            $operationHost . $resourcePath,
            $headers,
        );
    }

    /**
     * Operation getCheckout
     *
     * Get Checkout Details
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CheckoutResponse
     */
    public function getCheckout(string $merchantId, string $commerceCaseId, string $checkoutId): CheckoutResponse
    {
        $request = $this->getCheckoutRequest($merchantId, $commerceCaseId, $checkoutId);

        list($response) = $this->makeApiCall($request, CheckoutResponse::class);
        return $response;
    }

    /**
     * Create request for operation 'getCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCheckoutRequest(string $merchantId, string $commerceCaseId, string $checkoutId): Request
    {

        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}';

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
        $headers = [];
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;


        $operationHost = $this->config->getHost();
        return new Request(
            'GET',
            $operationHost . $resourcePath,
            $headers,
        );
    }

    /**
     * Operation getCheckouts
     *
     * Get a list of Checkouts based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param GetCheckoutsQuery $query query parameter to filter checkouts
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CheckoutsResponse
     */
    public function getCheckouts(
        string $merchantId,
        GetCheckoutsQuery $query = new GetCheckoutsQuery(),
    ): CheckoutsResponse {
        $request = $this->getCheckoutsRequest($merchantId, $query);
        list($response) = $this->makeApiCall($request, CheckoutsResponse::class);
        return $response;
    }

    /**
     * Create request for operation 'getCheckouts'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCheckoutsRequest(
        string $merchantId,
        GetCheckoutsQuery $getCheckoutsQuery
    ): Request {
        $resourcePath = '/v1/{merchantId}/checkouts';
        $query = http_build_query($getCheckoutsQuery->toQueryMap(), '', '&', PHP_QUERY_RFC3986);

        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            rawurlencode($merchantId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = [];
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }

        $operationHost = $this->config->getHost();
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
        );
    }

    /**
     * Operation updateCheckout
     *
     * Modify a Checkout
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\PatchCheckoutRequest $patchCheckoutRequest patchCheckoutRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return void
     */
    public function updateCheckout(string $merchantId, string $commerceCaseId, string $checkoutId, PatchCheckoutRequest $patchCheckoutRequest): void
    {
        $request = $this->updateCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $patchCheckoutRequest);

        $this->makeApiCall($request, null);
    }

    /**
     * Create request for operation 'updateCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\PatchCheckoutRequest $patchCheckoutRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateCheckoutRequest(string $merchantId, string $commerceCaseId, string $checkoutId, PatchCheckoutRequest $patchCheckoutRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}';
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
        $headers = [];
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;

        // json_encode the body
        $httpBody = self::$serializer->serialize($patchCheckoutRequest, 'json');

        $operationHost = $this->config->getHost();
        return new Request(
            'PATCH',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
