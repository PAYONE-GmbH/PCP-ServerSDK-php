<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PayoneCommercePlatform\Sdk\Models\CommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\Customer;
use PayoneCommercePlatform\Sdk\Queries\GetCommerceCasesQuery;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

/**
 * CommerceCaseApi Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CommerceCaseApiClient extends BaseApiClient
{
    /**
     * Operation createCommerceCase
     *
     * Create a Commerce Case
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest $createCommerceCaseRequest createCommerceCaseRequest (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseResponse
     */
    public function createCommerceCase($merchantId, $createCommerceCaseRequest): CreateCommerceCaseResponse
    {
        $request = $this->createCommerceCaseRequest($merchantId, $createCommerceCaseRequest);
        list($response) = $this->makeApiCall($request, CreateCommerceCaseResponse::class);
        return $response;
    }

    /**
     * Operation createCommerceCaseAsync
     *
     * Create a Commerce Case
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest $createCommerceCaseRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createCommerceCaseAsync($merchantId, $createCommerceCaseRequest): PromiseInterface
    {
        $returnType = CreateCommerceCaseResponse::class;
        $request = $this->createCommerceCaseRequest($merchantId, $createCommerceCaseRequest);

        return $this->makeAsyncApiCall($request, $returnType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'createCommerceCase'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest $createCommerceCaseRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createCommerceCaseRequest(string $merchantId, CreateCommerceCaseRequest $createCommerceCaseRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases';
        $httpBody = '';
        $multipart = false;

        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            rawurlencode($merchantId),
            $resourcePath
        );

        /** @var array<string, string> */
        $headers = [];
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;

        $httpBody = self::$serializer->serialize($createCommerceCaseRequest, 'json');

        $operationHost = $this->config->getHost();
        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCommerceCase
     *
     * Get Commerce Case Details
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CommerceCaseResponse
     */
    public function getCommerceCase(string $merchantId, string $commerceCaseId): CommerceCaseResponse
    {
        $request = $this->getCommerceCaseRequest($merchantId, $commerceCaseId);
        list($response) = $this->makeApiCall($request, CommerceCaseResponse::class);
        return $response;
    }

    /**
     * Operation getCommerceCaseAsync
     *
     * Get Commerce Case Details
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCommerceCaseAsync($merchantId, $commerceCaseId): PromiseInterface
    {
        $request = $this->getCommerceCaseRequest($merchantId, $commerceCaseId);
        return $this->makeAsyncApiCall($request, CommerceCaseResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'getCommerceCase'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCommerceCase'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCommerceCaseRequest(string $merchantId, string $commerceCaseId): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}';

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
     * Operation getCommerceCases
     *
     * Get a list of Commerce Cases based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Queries\GetCommerceCasesQuery $query filter parameters (optional)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Models\CommerceCaseResponse[]
     */
    public function getCommerceCases(
        string $merchantId,
        GetCommerceCasesQuery $query = new GetCommerceCasesQuery(),
    ): array {
        $request = $this->getCommerceCasesRequest($merchantId, $query);
        list($response) = $this->makeApiCall($request, CommerceCaseResponse::class . '[]');
        return $response;
    }

    /**
     * Operation getCommerceCasesAsync
     *
     * Get a list of Commerce Cases based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Queries\GetCommerceCasesQuery $query
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCommerceCasesAsync(
        string $merchantId,
        GetCommerceCasesQuery $query = new GetCommerceCasesQuery(),
    ): PromiseInterface {
        $request = $this->getCommerceCasesRequest($merchantId, $query);
        return $this->makeAsyncApiCall($request, CommerceCaseResponse::class . '[]')
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'getCommerceCases'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param \PayoneCommercePlatform\Sdk\Queries\GetCommerceCasesQuery $query
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCommerceCasesRequest(
        string $merchantId,
        GetCommerceCasesQuery $query,
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases';

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            rawurlencode($merchantId),
            $resourcePath
        );


        /** @var array<string, string> */
        $headers = [];
        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }
        $headers['Content-Type'] = self::MEDIA_TYPE_JSON;

        $operationHost = $this->config->getHost();
        $query = http_build_query($query->toQueryMap());
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
        );
    }

    /**
     * Operation updateCommerceCase
     *
     * Modify an existing Commerce Case.
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\Customer $customer customer (required)
     *
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return void
     */
    public function updateCommerceCase($merchantId, $commerceCaseId, $customer): void
    {
        $request = $this->updateCommerceCaseRequest($merchantId, $commerceCaseId, $customer);
        $this->makeApiCall($request, null);
    }

    /**
     * Operation updateCommerceCaseAsync
     *
     * Modify an existing Commerce Case.
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\Customer $customer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateCommerceCase'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateCommerceCaseAsync($merchantId, $commerceCaseId, $customer): PromiseInterface
    {
        $request = $this->updateCommerceCaseRequest($merchantId, $commerceCaseId, $customer);
        return $this->makeAsyncApiCall($request, null)
            ->then(
                function ($response) {
                    return;
                }
            );
    }

    /**
     * Create request for operation 'updateCommerceCase'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\Customer $customer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateCommerceCase'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateCommerceCaseRequest(string $merchantId, string $commerceCaseId, Customer $customer): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}';
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

        $httpBody = self::$serializer->serialize($customer, 'json');

        $operationHost = $this->config->getHost();
        return new Request(
            'PATCH',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
