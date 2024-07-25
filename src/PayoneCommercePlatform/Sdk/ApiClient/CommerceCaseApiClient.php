<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\ApiClient\BaseApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Domain\CommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Domain\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Domain\CreateCommerceCaseResponse;
use PayoneCommercePlatform\Sdk\Domain\Customer;
use PayoneCommercePlatform\Sdk\HeaderSelector;
use PayoneCommercePlatform\Sdk\ObjectSerializer;

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
    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'createCommerceCase' => [
            'application/json',
        ],
        'getCommerceCase' => [
            'application/json',
        ],
        'getCommerceCases' => [
            'application/json',
        ],
        'updateCommerceCase' => [
            'application/json',
        ],
    ];

    /**
     * Operation createCommerceCase
     *
     * Create a Commerce Case
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CreateCommerceCaseRequest $createCommerceCaseRequest createCommerceCaseRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \PayoneCommercePlatform\Sdk\Domain\CreateCommerceCaseResponse
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\CreateCommerceCaseRequest $createCommerceCaseRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createCommerceCase'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createCommerceCaseAsync($merchantId, $createCommerceCaseRequest, string $contentType = self::contentTypes['createCommerceCase'][0])
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\CreateCommerceCaseRequest $createCommerceCaseRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createCommerceCaseRequest(string $merchantId, CreateCommerceCaseRequest $createCommerceCaseRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases';
        $contentType = 'application/json';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        # if Content-Type contains "application/json", json_encode the body
        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($createCommerceCaseRequest));

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
     * Operation getCommerceCase
     *
     * Get Commerce Case Details
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CommerceCaseResponse
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCommerceCaseRequest(string $merchantId, string $commerceCaseId): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}';
        $contentType = 'application/json';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        // path params
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
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
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
        );
    }

    /**
     * Operation getCommerceCases
     *
     * Get a list of Commerce Cases based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  int $offset The offset to load Commerce Cases starting with 0. (optional, default to 0)
     * @param  int $size The number of Commerce Cases loaded per page. (optional, default to 25)
     * @param  \DateTime $fromDate Date and time in ISO 8601 format a Commerce Cases should be included in the request. Excepted formats are:  * YYYY-MM-DDThh:mm:ssZ * YYYY-MM-DDThh:mm:ss+XX:XX All other formats are ignored or may not be handled properly. (optional)
     * @param  \DateTime $toDate Date and time in ISO 8601 format a Commerce Cases should be included in the request. Excepted formats are:  * YYYY-MM-DDThh:mm:ssZ * YYYY-MM-DDThh:mm:ss+XX:XX All other formats are ignored or may not be handled properly. (optional)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (optional)
     * @param  string $merchantReference Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes. (optional)
     * @param  string $merchantCustomerId Unique identifier for the customer. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\StatusCheckout[] $includeCheckoutStatus Filter your results by the Checkout Status. The response will only return Commerce Cases with Checkouts with the provided Checkout Statuses. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentChannel[] $includePaymentChannel Filter your results by Payment Channel. The response will only return Commerce Cases with Checkouts for the provided Payment Channel. (optional)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CommerceCaseResponse[]
     */
    public function getCommerceCases(
        string $merchantId,
        int $offset = 0,
        int $size = 25,
        ?\DateTime $fromDate = null,
        ?\DateTime $toDate = null,
        ?string $commerceCaseId = null,
        ?string $merchantReference = null,
        ?string $merchantCustomerId = null,
        ?array $includeCheckoutStatus = null,
        ?array $includePaymentChannel = null
    ): array {
        $request = $this->getCommerceCasesRequest($merchantId, $offset, $size, $fromDate, $toDate, $commerceCaseId, $merchantReference, $merchantCustomerId, $includeCheckoutStatus, $includePaymentChannel);
        list($response) = $this->makeApiCall($request, CommerceCaseResponse::class . '[]');
        return $response;
    }

    /**
     * Operation getCommerceCasesAsync
     *
     * Get a list of Commerce Cases based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Commerce Case has exactly one merchant. (required)
     * @param  int $offset The offset to load Commerce Cases starting with 0. (optional, default to 0)
     * @param  int $size The number of Commerce Cases loaded per page. (optional, default to 25)
     * @param  \DateTime $fromDate Date and time in ISO 8601 format a Commerce Cases should be included in the request. Excepted formats are:  * YYYY-MM-DDThh:mm:ssZ * YYYY-MM-DDThh:mm:ss+XX:XX All other formats are ignored or may not be handled properly. (optional)
     * @param  \DateTime $toDate Date and time in ISO 8601 format a Commerce Cases should be included in the request. Excepted formats are:  * YYYY-MM-DDThh:mm:ssZ * YYYY-MM-DDThh:mm:ss+XX:XX All other formats are ignored or may not be handled properly. (optional)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (optional)
     * @param  string $merchantReference Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes. (optional)
     * @param  string $merchantCustomerId Unique identifier for the customer. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\StatusCheckout[] $includeCheckoutStatus Filter your results by the Checkout Status. The response will only return Commerce Cases with Checkouts with the provided Checkout Statuses. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentChannel[] $includePaymentChannel Filter your results by Payment Channel. The response will only return Commerce Cases with Checkouts for the provided Payment Channel. (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCommerceCasesAsync(
        string $merchantId,
        int $offset = 0,
        int $size = 25,
        ?\DateTime $fromDate = null,
        ?\DateTime $toDate = null,
        string $commerceCaseId = null,
        string $merchantReference = null,
        string $merchantCustomerId = null,
        array $includeCheckoutStatus = null,
        array $includePaymentChannel = null
    ) {
        $request = $this->getCommerceCasesRequest($merchantId, $offset, $size, $fromDate, $toDate, $commerceCaseId, $merchantReference, $merchantCustomerId, $includeCheckoutStatus, $includePaymentChannel);
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
     * @param  int $offset The offset to load Commerce Cases starting with 0. (optional, default to 0)
     * @param  int $size The number of Commerce Cases loaded per page. (optional, default to 25)
     * @param  \DateTime $fromDate Date and time in ISO 8601 format a Commerce Cases should be included in the request. Excepted formats are:  * YYYY-MM-DDThh:mm:ssZ * YYYY-MM-DDThh:mm:ss+XX:XX All other formats are ignored or may not be handled properly. (optional)
     * @param  \DateTime $toDate Date and time in ISO 8601 format a Commerce Cases should be included in the request. Excepted formats are:  * YYYY-MM-DDThh:mm:ssZ * YYYY-MM-DDThh:mm:ss+XX:XX All other formats are ignored or may not be handled properly. (optional)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (optional)
     * @param  string $merchantReference Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes. (optional)
     * @param  string $merchantCustomerId Unique identifier for the customer. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\StatusCheckout[] $includeCheckoutStatus Filter your results by the Checkout Status. The response will only return Commerce Cases with Checkouts with the provided Checkout Statuses. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentChannel[] $includePaymentChannel Filter your results by Payment Channel. The response will only return Commerce Cases with Checkouts for the provided Payment Channel. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCommerceCases'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCommerceCasesRequest(
        string $merchantId,
        int $offset = 0,
        int $size = 25,
        ?\DateTime $fromDate = null,
        ?\DateTime $toDate = null,
        string $commerceCaseId = null,
        string $merchantReference = null,
        string $merchantCustomerId = null,
        array $includeCheckoutStatus = null,
        array $includePaymentChannel = null
    ): Request {
        $resourcePath = '/v1/{merchantId}/commerce-cases';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $size,
            'size', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromDate,
            'fromDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toDate,
            'toDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $commerceCaseId,
            'commerceCaseId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $merchantReference,
            'merchantReference', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $merchantCustomerId,
            'merchantCustomerId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $includeCheckoutStatus,
            'includeCheckoutStatus', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $includePaymentChannel,
            'includePaymentChannel', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\Customer $customer customer (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\Customer $customer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateCommerceCase'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
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
     * @param  \PayoneCommercePlatform\Sdk\Domain\Customer $customer (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateCommerceCase'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateCommerceCaseRequest(string $merchantId, string $commerceCaseId, Customer $customer): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}';
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


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($customer));

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
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
