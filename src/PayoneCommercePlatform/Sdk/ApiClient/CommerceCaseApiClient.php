<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PayoneCommercePlatform\Sdk\Models\CommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Models\Customer;
use PayoneCommercePlatform\Sdk\Queries\GetCommerceCasesQuery;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

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
     * Create request for operation 'createCommerceCase'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest $createCommerceCaseRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createCommerceCaseRequest(string $merchantId, CreateCommerceCaseRequest $createCommerceCaseRequest): Request
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
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $httpBody = $this->serialize($createCommerceCaseRequest);

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
     * Create request for operation 'getCommerceCase'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCommerceCaseRequest(string $merchantId, string $commerceCaseId): Request
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
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

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
        // The underlying of `makeApiCall` is to strict as it has to be an resolvable class name
        // but the underlying call to symfony/serialize also allows for an array of classes
        // @phpstan-ignore-next-line
        list($response) = $this->makeApiCall($request, CommerceCaseResponse::class . '[]');
        /** @var \PayoneCommercePlatform\Sdk\Models\CommerceCaseResponse[] */
        return $response;
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
    protected function getCommerceCasesRequest(
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
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        $operationHost = $this->config->getHost();
        $query = http_build_query($query->toQueryMap(), '', '&', PHP_QUERY_RFC3986);
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
     * Create request for operation 'updateCommerceCase'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Models\Customer $customer (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateCommerceCaseRequest(string $merchantId, string $commerceCaseId, Customer $customer): Request
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
        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];

        // there was a mismatch between the OpenAPI specification file and the actual api
        //  the customer has to be wrapped in an object containing the customer as the `customer` property
        // to avoid creating another Model to just wrap the customer we inline that stuff
        // see: https://docs.payone.com/pcp/commerce-platform-api?fullwidth=1#tag/CommerceCase/operation/updateCommerceCase
        $httpBody = $this->serialize(["customer" => $customer]);

        $operationHost = $this->config->getHost();
        return new Request(
            'PATCH',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
